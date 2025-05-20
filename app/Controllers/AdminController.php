<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\PemesananModel;
use App\Models\PengirimanModel;
use App\Models\PembayaranModel;
use App\Models\ReturModel;
use App\Models\PenjualanModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use Config\Database;
use App\Models\NotifikasiModel;

class AdminController extends Controller
{
    protected $produkModel;
    protected $kategoriModel;
    protected $pemesananModel;
    protected $pengirimanModel;
    protected $pembayaranModel;
    protected $returModel;
    protected $penjualanModel;
    protected $transaksiModel;
    protected $userModel;
    protected $db;
    protected $session;
    protected $validation;

    public function __construct()
    {
        helper(['url', 'form']);
        $this->cekLogin();
        if (!session()->has('user_id') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('login'))->with('error', 'Anda tidak memiliki akses.');
            exit;
        }
        
        $this->produkModel = new ProdukModel();
        $this->kategoriModel = new KategoriModel();
        $this->pemesananModel = new PemesananModel();
        $this->pengirimanModel = new PengirimanModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->returModel = new ReturModel();
        $this->penjualanModel = new PenjualanModel();
        $this->transaksiModel = new TransaksiModel();
        $this->userModel = new UserModel();

        $this->session = session();
        $this->validation = \Config\Services::validation();
        $this->db = Database::connect();
    }

    private function cekLogin()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
    }

    public function dashboard()
    {
        if (!session()->has('user_id') || session()->get('role') !== 'admin') {
            return redirect()->to(base_url('login'))->with('error', 'Anda tidak memiliki akses.');
        }
    
        $data['activePage'] = 'dashboard';

        // Ambil data yang diperlukan untuk dashboard
        $data['produkCount'] = $this->produkModel->countAll();
        $data['pemesananCount'] = $this->pemesananModel->countAll();
        $data['pengirimanCount'] = $this->pengirimanModel->countAll();
        $data['pembayaranCount'] = $this->pembayaranModel->countAll();
        $data['returCount'] = $this->returModel->countAll();
        $data['penjualanCount'] = $this->penjualanModel->countAll();
        $data['transaksiCount'] = $this->transaksiModel->countAll();

        return view('admin/dashboard', $data);
    }

    public function produk()
{
    $produkModel = new ProdukModel();
    
    // Mengambil produk dengan kategori tertentu untuk Bouquet dan Hampers
    $bouquet = $produkModel->where('id_kategori', 1)->findAll(); // Misalnya, kategori 1 untuk Bouquet
    $hampers = $produkModel->where('id_kategori', 2)->findAll(); // Misalnya, kategori 2 untuk Hampers

    return view('admin/produk', [
        'bouquet' => $bouquet,
        'hampers' => $hampers
    ]);
}



    public function kategori()
    {
        $data['activePage'] = 'kategori';
        $data['categories'] = $this->kategoriModel->findAll(); // Ambil semua kategori
        return view('admin/kategori', $data);
    }
    
    // Menampilkan form tambah kategori
public function kategoriTambah()
{
    return view('admin/kategori_tambah');
}

// Menyimpan kategori baru
public function simpanKategori()
{
    $namaKategori = $this->request->getPost('nama_kategori');

    // Validasi input
    if (!$this->validate([
        'nama_kategori' => 'required|is_unique[kategori.nama_kategori]'
    ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Simpan ke database
    $this->kategoriModel->save([
        'nama_kategori' => $namaKategori
    ]);

    return redirect()->to('/admin/kategori')->with('success', 'Kategori berhasil ditambahkan.');
}

    public function produkByKategori($id_kategori)
    {
        $data['activePage'] = 'produk';
        $data['produk'] = $this->produkModel->getProdukByKategori($id_kategori);
        return view('admin/produk_by_kategori', $data);
    }

    public function editKategori($id)
    {
        $data['kategori'] = $this->kategoriModel->find($id);

        if ($this->request->getMethod() === 'post') {
            $kategoriData = $this->request->getPost();
            $this->kategoriModel->update($id, $kategoriData);
            return redirect()->to('/admin/kategori');
        }

        return view('admin/edit_kategori', $data);
    }

    public function deleteKategori($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/admin/kategori');
    }

    public function laporanProduk()
{
    $data['products'] = $this->produkModel->findAll();
    $data['pager'] = null; // Tidak menggunakan pagination
    $data['activePage'] = 'laporan_produk';
    return view('admin/laporan/produk', $data);
}


    public function produkTambah()
    {
        $data['activePage'] = 'produk';
        return view('admin/produk_tambah', $data);
    }

    public function simpanProduk()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'id_kategori' => 'required|numeric',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'gambar_produk' => 'uploaded[gambar_produk]|is_image[gambar_produk]|mime_in[gambar_produk,image/jpg,image/jpeg,image/png]|max_size[gambar_produk,2048]', // Batasi ukuran file maksimal 2MB
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        // Ambil data dari form
        $fileGambar = $this->request->getFile('gambar_produk');
        $namaGambar = $fileGambar->getName(); // Gunakan nama asli file
    
        // Pindahkan file ke folder yang diinginkan
        if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $fileGambar->move('assets/img/produk', $namaGambar);
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar.');
        }
    
        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'kategori' => $this->request->getPost('kategori'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'stok' => $this->request->getPost('stok'),
            'harga' => $this->request->getPost('harga'),
            'gambar_produk' => $namaGambar, // Simpan nama asli file
        ];
    
        // Simpan data ke database
        $this->produkModel->save($data);
    
        return redirect()->to(site_url('admin/produk'))->with('success', 'Produk berhasil ditambahkan.');
    }

    public function laporanPemesanan()
    {
        $data['pemesanan'] = $this->pemesananModel->findAll();
        $data['pager'] = null; // Tidak menggunakan pagination
        $data['activePage'] = 'laporan_pemesanan';
        return view('admin/laporan/pemesanan', $data);
    }

    public function laporanPengiriman()
{
    $data['shipments'] = $this->pengirimanModel->findAll(); // Mengambil semua data pengiriman
    $data['pager'] = null; // Tidak menggunakan pagination
    $data['activePage'] = 'laporan_pengiriman';
    return view('admin/laporan/pengiriman', $data);
}


public function laporanPembayaran()
{
    $data['payments'] = $this->pembayaranModel->findAll(); // Mengambil semua data pembayaran
    $data['pager'] = null; // Jika menggunakan pagination
    $data['activePage'] = 'laporan_pembayaran';
    return view('admin/laporan/pembayaran', $data);
}

public function laporanRetur()
{
    $data['retur'] = $this->returModel->getReturWithDetails();
    $data['activePage'] = 'laporan_retur';
    return view('admin/laporan/retur', $data);
}


    public function laporanPenjualan()
    {
        $data['penjualan'] = $this->penjualanModel->findAll();
        $data['activePage'] = 'laporan_penjualan';
        return view('admin/laporan/penjualan', $data);
    }

    public function laporanTransaksi()
    {
        $data['transaksi'] = $this->transaksiModel->findAll();
        $data['pager'] = null; // Tidak menggunakan pagination
        $data['activePage'] = 'laporan_transaksi';
        return view('admin/laporan/transaksi', $data);
    }

    public function login()
{
    $session = session();
    $model = new UserModel();

    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $user = $model->where('email', $email)->first();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            // Set session setelah login berhasil
            $session->set('nama_user', $user['nama']);
            $session->set('role', $user['role']); // Jika ada peran seperti 'admin' atau 'user'

            return redirect()->to('/dashboard'); // Ubah sesuai halaman setelah login
        } else {
            return redirect()->back()->with('error', 'Password salah!');
        }
    } else {
        return redirect()->back()->with('error', 'Email tidak ditemukan!');
    }
}

    public function hapusPemesanan($id_pemesanan)
{
    $this->returModel->where('id_pemesanan', $id_pemesanan)->delete(); // Hapus data terkait di tabel retur
    $this->pemesananModel->delete($id_pemesanan); // Hapus data dari tabel pemesanan
}


    public function editUser($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);
        $data['activePage'] = 'user_management';

        return view('admin/user_edit', $data);
    }

    public function updateUser($id)
    {
        $validation =  \Config\Services::validation();

        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[20]',
            'nama_lengkap' => 'required|max_length[50]',
            'email' => 'required|valid_email',
            'alamat' => 'required|max_length[255]',
            'nomor_hp' => 'required|numeric',
            'password' => 'permit_empty|min_length[6]',
            'role' => 'required|in_list[admin,user]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'role' => $this->request->getPost('role'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/admin/manage-users')->with('success', 'Akun berhasil diperbarui.');
    }
    
    public function saveUser()
    {
        // Validasi input
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username,id,{id}]',
            'nama_lengkap' => 'required|max_length[100]',
            'email' => 'required|valid_email|is_unique[users.email,id,{id}]',
            'alamat' => 'required|max_length[255]',
            'nomor_hp' => 'required|numeric',
            'role' => 'required|in_list[admin,user]',
        ];

        // Jika password diisi (untuk tambah user), tambahkan rule
        if (!$this->request->getPost('id')) {
            $rules['password'] = 'required|min_length[6]';
        } else {
            if ($this->request->getPost('password')) {
                $rules['password'] = 'min_length[6]';
            }
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validation);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'role' => $this->request->getPost('role'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        if ($this->request->getPost('id')) {
            // Update user
            $this->userModel->update($this->request->getPost('id'), $data);
            $this->session->setFlashdata('success', 'Pengguna berhasil diperbarui.');
        } else {
            // Tambah user
            $this->userModel->insert($data);
            $this->session->setFlashdata('success', 'Pengguna berhasil ditambahkan.');
        }

        return redirect()->to('/admin/manage-users');
    }

    public function manageUsers()
    {
        $data = [
            'activePage' => 'manage_users',
            'users' => $this->userModel->findAll(),
            'validation' => $this->validation
        ];

        return view('admin/manage_users', $data);
    }

    public function deleteUser($id)
    {
        if ($this->userModel->delete($id)) {
            $this->session->setFlashdata('success', 'Pengguna berhasil dihapus.');
        } else {
            $this->session->setFlashdata('error', 'Gagal menghapus pengguna.');
        }

        return redirect()->to('/admin/manage-users');
    }
    public function userManagement()
{
    $data = [
        'activePage' => 'user_management',
        'users' => $this->userModel->findAll(),
        'validation' => $this->validation
    ];

    return view('admin/user_management', $data);
}
public function hapusProduk($id_produk)
{
    $model = new \App\Models\ProdukModel();

    // Menghapus produk dari database
    if ($model->delete($id_produk)) {
        return redirect()->to('/admin/produk')->with('success', 'Produk berhasil dihapus.');
    } else {
        return redirect()->to('/admin/produk')->with('error', 'Produk gagal dihapus.');
    }
}
public function produkHapus($id_produk)
    {
        // Hapus data di tabel 'retur' yang terkait dengan produk
        $this->db->table('retur')->where('id_pemesanan', $id_produk)->delete();

        // Hapus produk dari tabel 'produk'
        $this->db->table('produk')->where('id_produk', $id_produk)->delete();

        // Redirect atau beri pesan sukses
        return redirect()->to('/admin/produk');
    }

private function getIdPemesananFromProduk($id_produk)
{
    // Logika untuk mendapatkan ID pemesanan terkait
    // Misalnya, jika ada relasi produk ke pemesanan
    return $this->db->table('pemesanan')->where('id_produk', $id_produk)->get()->getRow()->id_pemesanan;
}


public function tambahUser()
{
    $data['activePage'] = 'user_management';
    return view('admin/user_tambah', $data);
}

public function simpanUser()
{
    $validation = \Config\Services::validation();

    $rules = [
        'username' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
        'nama_lengkap' => 'required|max_length[100]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'alamat' => 'required|max_length[255]',
        'nomor_hp' => 'required|numeric',
        'role' => 'required|in_list[admin,user]',
        'password' => 'required|min_length[6]'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    $data = [
        'username' => $this->request->getPost('username'),
        'nama_lengkap' => $this->request->getPost('nama_lengkap'),
        'email' => $this->request->getPost('email'),
        'alamat' => $this->request->getPost('alamat'),
        'nomor_hp' => $this->request->getPost('nomor_hp'),
        'role' => $this->request->getPost('role'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
    ];

    $this->userModel->save($data);

    return redirect()->to('/admin/manage-users')->with('success', 'Pengguna baru berhasil ditambahkan.');
}
public function addUser()
    {
        // Validasi inputan
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        if (!$this->validate($validation->getRules())) {
            return view('admin/user_tambah', [
                'validation' => $this->validator
            ]);
        }

        // Simpan data pengguna baru ke database
        $userModel = new UserModel();
        $userModel->save([
            'username' => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'role' => $this->request->getPost('role'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to(site_url('admin/users'));
    }
    public function produkEdit($id)
    {
        $model = new ProdukModel();
        $data['produk'] = $model->find($id);

        if (!$data['produk']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan');
        }

        return view('admin/produk_edit', $data);
    }

    public function produkUpdate($id = null)
    {
        $model = new ProdukModel();

        // Pastikan ID ada
        if (!$id) {
            throw new \Exception('ID produk tidak ditemukan.');
        }

        // Ambil data dari form
        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'stok' => $this->request->getPost('stok'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        // Cek apakah ada file gambar yang diupload
        if ($this->request->getFile('gambar_produk')->isValid()) {
            $file = $this->request->getFile('gambar_produk');
            $file->move(WRITEPATH . 'uploads/produk', $file->getName());
            $data['gambar_produk'] = $file->getName();
        }

        // Update data produk dengan ID
        $model->update($id, $data);

        // Set flashdata dan redirect
        session()->setFlashdata('success', 'Produk berhasil diperbarui');
        return redirect()->to('admin/produk');
    }
}
