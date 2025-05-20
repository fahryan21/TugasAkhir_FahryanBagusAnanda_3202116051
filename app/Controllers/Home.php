<?php namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\PemesananModel;
use App\Models\PembayaranModel;
use App\Models\UserModel;
use App\Models\NotifikasiModel;
use Midtrans\Config;
use Midtrans\Notification;
use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Midtrans\Transaction;
use CodeIgniter\HTTP\Client;

class Home extends BaseController


{   
    protected $produkModel;
    protected $pemesananModel;
    protected $pembayaranModel;
    protected $notifikasiModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->pemesananModel = new PemesananModel();
        $this->pembayaranModel = new PembayaranModel();
       

        // Konfigurasi Midtrans
    Config::$serverKey = 'SB-Mid-server-PLy_6ayyk5PoE0Jque_o5U8W';  // Ganti dengan server key Anda
    Config::$isProduction = false; // Atur ke true jika di environment production
    Config::$isSanitized = true;
    Config::$is3ds = true;
    }

    // Fungsi untuk halaman utama
    public function index()
    {
        $data = [
            'produk' => $this->produkModel->findAll(),
        ];

        return view('evgift/home', $data);
    }
    
    // Fungsi untuk halaman kategori
    public function kategori()
    {
        return view('evgift/kategori');
    }

    // Fungsi untuk detail kategori berdasarkan slug
    public function kategoriDetail($slug)
    {
        $data = ['kategori' => $slug];
        return view('evgift/kategori_detail', $data);
    }

    // Fungsi untuk halaman produk
    public function produk()
    {
        $produk = $this->produkModel->findAll();
        $data = ['produk' => $produk];
        return view('evgift/produk', $data);
    }

    // Fungsi untuk detail produk berdasarkan ID
    public function produkDetail($id)
    {
        $data['produk'] = $this->produkModel->getProduk($id);
        return view('evgift/produk_detail', $data);
    }

    // Fungsi untuk halaman pemesanan
    public function pemesanan()
{
    $pemesanan = $this->pemesananModel->findAll();
    foreach ($pemesanan as &$item) {
        $produk = $this->produkModel->getProduk($item['id_produk']);
        if ($produk) {
            $item['gambar_produk'] = $produk['gambar_produk'];
            $item['nama_produk'] = $produk['nama_produk'];
            $item['total'] = $produk['harga'] * $item['kuantitas'];
        } else {
            $item['gambar_produk'] = 'default.jpg';
            $item['nama_produk'] = 'Produk Tidak Ditemukan';
            $item['total'] = 0;
        }

        // Mengambil data pembayaran jika ada
        $pembayaran = $this->pembayaranModel->where('id_pemesanan', $item['id_pemesanan'])->first();
        $item['jumlah_pembayaran'] = $pembayaran['jumlah_pembayaran'] ?? 0;
        $item['status_pembayaran'] = $pembayaran['status_pembayaran'] ?? 'Belum Dibayar';

        // Data tambahan
        $item['alamat'] = $item['alamat'] ?? 'Alamat tidak tersedia';
        $item['link_tracking'] = $item['link_tracking'] ?? '#';
        $item['histori_pengiriman'] = $item['histori_pengiriman'] ?? 'Belum ada histori';
    }
    $data['pemesanan'] = $pemesanan;
    return view('evgift/pemesanan', $data);
}

    // Fungsi untuk halaman keranjang   
    public function keranjang()
    {
        $keranjang = session()->get('keranjang') ?? [];
        $produkIds = array_column($keranjang, 'id_produk');
        $produkList = [];

        if (!empty($produkIds)) {
            $produkList = $this->produkModel->whereIn('id_produk', $produkIds)->findAll();
        }

        foreach ($keranjang as &$item) {
            if (is_array($item)) {
                $product = array_filter($produkList, function ($p) use ($item) {
                    return $p['id_produk'] == $item['id_produk'];
                });
                if ($product) {
                    $product = array_shift($product);
                    $item['nama_produk'] = $product['nama_produk'];
                    $item['gambar'] = $product['gambar_produk'] ?? 'default.jpg';
                    $item['harga'] = $product['harga'] ?? 0;
                    $item['total'] = $item['harga'] * $item['kuantitas'];
                }
            }
        }

        $data['keranjang'] = $keranjang;
        return view('evgift/keranjang', $data);
    }

    // Fungsi untuk menghapus item dari keranjang berdasarkan ID produk
    public function hapusKeranjang($id_produk)
    {
        // Ambil data keranjang dari sesi
        $keranjang = session()->get('keranjang') ?? [];

        // Filter keranjang untuk menghapus produk dengan ID tertentu
        $keranjang = array_filter($keranjang, function($item) use ($id_produk) {
            return $item['id_produk'] != $id_produk;
        });

        // Simpan kembali ke session
        session()->set('keranjang', array_values($keranjang));
        // Arahkan kembali ke halaman keranjang
        return redirect()->to(base_url('evgift/keranjang'));
    }

    public function checkout()
{
    // Mengambil data dari session
    $email = session()->get('email');
    
    // Pastikan pengguna telah login, jika tidak, arahkan ke halaman login
    if (!$email) {
        return redirect()->to(base_url('login'))->with('message', 'Anda telah login.');
    }

    // Mengambil data keranjang belanja dari session
    $keranjang = session()->get('keranjang') ?? [];
    $produkIds = array_column($keranjang, 'id_produk');
    $produkList = [];

    // Menyusun data produk yang ada di keranjang
    if (!empty($produkIds)) {
        $produkList = $this->produkModel->whereIn('id_produk', $produkIds)->findAll();
    }

    // Inisialisasi total pesanan
    $totalPesanan = 0;

    foreach ($keranjang as $index => $item) {
        if (is_array($item)) {
            $product = array_filter($produkList, function ($p) use ($item) {
                return $p['id_produk'] == $item['id_produk'];
            });
    
            if (!empty($product)) {
                $product = array_values($product)[0];
    
                $keranjang[$index]['nama_produk'] = $product['nama_produk'];
                $keranjang[$index]['gambar'] = $product['gambar_produk'] ?? 'default.jpg';
                $keranjang[$index]['harga'] = $product['harga'] ?? 0;
                $keranjang[$index]['total'] = $keranjang[$index]['harga'] * $keranjang[$index]['kuantitas'];
    
                $totalPesanan += $keranjang[$index]['total'];
            }
        }
    }

    // Konfigurasi Midtrans
    \Midtrans\Config::$serverKey = 'SB-Mid-server-PLy_6ayyk5PoE0Jque_o5U8W';
    \Midtrans\Config::$isProduction = false; // Ganti ke true jika sudah di produksi
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    // Persiapan parameter untuk Midtrans
    $params = [
        'transaction_details' => [
            'order_id' => 'ORD' . strtoupper(uniqid()), // Membuat order ID unik
            'gross_amount' => $totalPesanan, // Total jumlah yang harus dibayar
        ],
        'customer_details' => [
            'first_name' => session()->get('nama_lengkap'),
            'last_name' => '',
            'email' => $email,  // Mengambil email dari session
            'phone' => session()->get('nomor_hp'),
            'billing_address' => [
                'first_name' => session()->get('nama_pemesan'),
                'last_name' => '',
                'address' => session()->get('alamat_pemesan'),
                'city' => session()->get('kota_pemesan'),
                'postal_code' => session()->get('kode_pos_pemesan'),
                'phone' => session()->get('nomor_hp'),
                'country_code' => 'IDN',
            ],
            'shipping_address' => [
                'first_name' => session()->get('nama_pemesan'),
                'last_name' => '',
                'address' => session()->get('alamat_pengiriman'),
                'city' => session()->get('kota_pemesan'),
                'postal_code' => session()->get('kode_pos_pemesan'),
                'phone' => session()->get('nomor_hp'),
                'country_code' => 'IDN',
            ],
        ],
        'item_details' => [], // Ini diisi dengan data produk
    ];

    // Menambahkan data item dari keranjang ke item_details
    foreach ($keranjang as $item) {
        $params['item_details'][] = [
            'id' => $item['id_produk'],
            'price' => $item['harga'],
            'quantity' => $item['kuantitas'],
            'name' => $item['nama_produk'],
        ];
    }

    // Mendapatkan Snap Token dari Midtrans
    $snapToken = \Midtrans\Snap::getSnapToken($params);

    // Menyiapkan data untuk ditampilkan di halaman checkout
    $data = [
        'keranjang' => $keranjang,
        'total' => $totalPesanan,
        'snapToken' => $snapToken,
        'email' => $email, // Menambahkan email ke data yang akan diteruskan ke view
    ];

    // Render halaman checkout
    return view('evgift/checkout', $data);
}


  

    public function tambahKeranjang()
{
    if (!session()->has('user_id')) {
        return redirect()->to(base_url('login'))->with('message', 'Anda telah perlu login.');

    } else {
        $id_produk = $this->request->getPost('id_produk');
        $kuantitas = $this->request->getPost('kuantitas');

        if (!$id_produk || !$kuantitas) {
            return redirect()->back()->with('error', 'Produk atau kuantitas tidak valid.');
        }

        $produkModel = new \App\Models\ProdukModel();
        $produk = $produkModel->find($id_produk);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        if ($kuantitas > $produk['stok']) {
            return redirect()->back()->with('error', 'Kuantitas melebihi stok yang tersedia.');
        }

        // Ambil keranjang yang ada di session
        $keranjang = session()->get('keranjang') ?? [];

        // Cek apakah produk sudah ada di keranjang
        $found = false;
        foreach ($keranjang as &$item) {
            if ($item['id_produk'] == $id_produk) {
                // Produk sudah ada di keranjang, tambah kuantitas
                $item['kuantitas'] += $kuantitas;
                $found = true;
                break;
            }
        }

        // Jika produk belum ada di keranjang, tambahkan sebagai item baru
        if (!$found) {
            $keranjang[] = [
                'id_produk' => $id_produk,
                'kuantitas' => $kuantitas,
            ];
        }

        // Simpan kembali ke session
        session()->set('keranjang', $keranjang);

        return redirect()->to(base_url('evgift/keranjang'))->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }
}
    


    
    // Fungsi untuk menyimpan pemesanan ke sesi
    public function simpanPemesanan()
    {
        // Ambil data dari form input
        $nama_pemesan = $this->request->getPost('nama_pemesan');
        $alamat_pemesan = $this->request->getPost('alamat_pemesan');
        $email_pemesanan = $this->request->getPost('email_pemesanan');
        $nomor_hp = $this->request->getPost('nomor_hp');
    
        // Simpan data ke session
        session()->set('nama_pemesan', $nama_pemesan);
        session()->set('alamat_pemesan', $alamat_pemesan);
        session()->set('email_pemesanan', $email_pemesanan);
        session()->set('nomor_hp', $nomor_hp);
    
        // Redirect ke halaman checkout
        return redirect()->to('/evgift/checkout');
    }
    





    // Fungsi untuk menyimpan data pembayaran
    public function simpanPembayaran()
    {
        $validation = \Config\Services::validation();
    
        // Validasi input
        if (!$this->validate([
            'no_pemesanan' => 'required',
            'nama' => 'required',
            'bank_asal' => 'required',
            'bank_tujuan' => 'required',
            'jumlah' => 'required|numeric',
            'bukti_transfer' => 'uploaded[bukti_transfer]|max_size[bukti_transfer,2048]',
        ])) {
            return redirect()->back()->withInput()->with('validation', $validation->getErrors());
        }
    
        // Ambil data dari input
        $no_pemesanan = $this->request->getPost('no_pemesanan');
        $nama = $this->request->getPost('nama');
        $bank_asal = $this->request->getPost('bank_asal');
        $bank_tujuan = $this->request->getPost('bank_tujuan');
        $jumlah = $this->request->getPost('jumlah');
        $bukti_transfer = $this->request->getFile('bukti_transfer');
    
        // Simpan bukti transfer
        $bukti_transfer_name = '';
        if ($bukti_transfer->isValid() && !$bukti_transfer->hasMoved()) {
            $bukti_transfer_name = $bukti_transfer->getRandomName();
            $bukti_transfer->move('uploads/bukti_transfer', $bukti_transfer_name);
        }
    
        // Simpan data ke database
        try {
            $this->pembayaranModel->insert([
                'no_pemesanan' => $no_pemesanan,
                'nama_pelanggan' => $nama,
                'dari_bank' => $bank_asal,
                'ke_bank' => $bank_tujuan,
                'jumlah_pembayaran' => $jumlah,
                'bukti' => $bukti_transfer_name,
                'catatan' => $this->request->getPost('catatan'),
            ]);
    
            // Set flashdata untuk pesan sukses
            session()->setFlashdata('success', 'Pembayaran berhasil disimpan.');
    
            // Redirect ke halaman home
            return redirect()->to('/');
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
    
            // Tetap di halaman pembayaran dan beri pesan kesalahan
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }
    
// Fungsi untuk memproses pembayaran dengan Midtrans dan menyimpan transaksi
public function prosesPembayaran()
{
    $keranjang = session()->get('keranjang') ?? [];
    $produkIds = array_column($keranjang, 'id_produk');
    $produkList = [];

    if (!empty($produkIds)) {
        $produkList = $this->produkModel->whereIn('id_produk', $produkIds)->findAll();
    }

    $totalPesanan = 0;
    foreach ($keranjang as &$item) {
        if (is_array($item)) {
            $product = array_filter($produkList, function ($p) use ($item) {
                return $p['id_produk'] == $item['id_produk'];
            });

            if ($product) {
                $product = array_shift($product);
                $item['nama_produk'] = $product['nama_produk'];
                $item['gambar'] = $product['gambar_produk'] ?? 'default.jpg';
                $item['harga'] = $product['harga'] ?? 0;
                $item['total'] = $item['harga'] * $item['kuantitas'];
                $totalPesanan += $item['total'];
            }
        }
    }

    // Simpan pemesanan ke database
    $orderId = 'ORD' . strtoupper(uniqid());
    $pemesananData = [
        'order_id' => $orderId,
        'nama_pemesan' => session()->get('nama_pemesan'),
        'alamat_pemesan' => session()->get('alamat_pemesan'),
        'email_pemesan' => session()->get('email_pemesan'),
        'nomor_hp' => session()->get('nomor_hp'),
        'total' => $totalPesanan,
        'status_pembayaran' => 'Menunggu Pembayaran',
        'tanggal_pemesanan' => date('Y-m-d H:i:s'),
    ];

    $this->pemesananModel->save($pemesananData);
    $id_pemesanan = $this->pemesananModel->getInsertID();

    // Simpan detail produk pemesanan
    foreach ($keranjang as $item) {
        $this->pemesananModel->save([
            'id_pemesanan' => $id_pemesanan,
            'id_produk' => $item['id_produk'],
            'kuantitas' => $item['kuantitas'],
        ]);
    }

    // Kirim data transaksi ke Midtrans
    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => $totalPesanan,
        ],
        'customer_details' => [
            'first_name' => session()->get('nama_pemesan'),
            'last_name' => '',
            'email' => session()->get('email_pemesan'),
            'phone' => session()->get('nomor_hp'),
        ],
    ];

    // Mendapatkan Snap Token
    $snapToken = \Midtrans\Snap::getSnapToken($params);

    return view('evgift/checkout', ['snapToken' => $snapToken]);
}
 


    public function bouquet()
    {
        $model = new ProdukModel();
        // Filter produk dengan id_kategori = 1 untuk bouquet
        $data['produk'] = $model->where('id_kategori', 1)->findAll();
        
        return view('evgift/bouquet', $data);
    }

    public function hampers()
    {
        $model = new ProdukModel();
        // Filter produk dengan id_kategori = 2 untuk hampers
        $data['produk'] = $model->where('id_kategori', 2)->findAll();
        
        return view('evgift/hampers', $data);
    }
    public function testimoni()
    {
        return view('evgift/testimoni');
    } 
    public function updateProfile()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[50]',
            'nama_lengkap' => 'required|min_length[3]|max_length[100]',
            'alamat' => 'required|max_length[255]',
            'email' => 'required|valid_email|max_length[100]',
            'nomor_hp' => 'required|min_length[10]|max_length[15]',
            'password' => 'permit_empty|min_length[6]',
            'confirm_password' => 'matches[password]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('validation', $validation->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'password' => $this->request->getPost('password')
        ];

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $userId = session()->get('user_id');
        $userModel = new UserModel();
        $userModel->update($userId, $data);

        return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui');
    }
    public function profile()
    {
        // Ambil data pengguna dari model atau layanan
        $userModel = new UserModel();
        $userId = session()->get('user_id'); // Asumsi user_id disimpan di session
        $user = $userModel->find($userId);

        // Tampilkan halaman profil dengan data pengguna
        return view('evgift/profil', [
            'user' => $user
        ]);
        
    }
    
    
}