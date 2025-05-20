<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProdukModel;
use App\Models\PemesananModel;
use App\Models\PembayaranModel;

class ReturController extends Controller
{
    protected $produkModel;
    protected $pemesananModel;
    protected $pembayaranModel;

    public function __construct()
    {
        helper('url');
        $this->produkModel = new ProdukModel();
        $this->pemesananModel = new PemesananModel();
        $this->pembayaranModel = new PembayaranModel();
    }

    public function index()
    {
        $data['produk'] = $this->produkModel->findAll();
        return view('evgift/home', $data);
    }

    public function kategori()
    {
        return view('evgift/kategori');
    }

    public function kategoriDetail($slug)
    {
        $data = ['kategori' => $slug];
        return view('evgift/kategori_detail', $data);
    }

    public function produk()
    {
        $produk = $this->produkModel->findAll();
        $data = ['produk' => $produk];
        return view('evgift/produk', $data);
    }

    public function produkDetail($id)
    {
        $data['produk'] = $this->produkModel->getProduk($id);
        return view('evgift/produk_detail', $data);
    }

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
            $item['alamat'] = $item['alamat'] ?? 'Alamat tidak tersedia';
            $item['link_tracking'] = $item['link_tracking'] ?? '#';
            $item['histori_pengiriman'] = $item['histori_pengiriman'] ?? 'Belum ada histori';
        }
        $data['pemesanan'] = $pemesanan;
        return view('evgift/pemesanan', $data);
    }

    public function keranjang()
    {
        $keranjang = session()->get('keranjang') ?? [];

        // Validasi bahwa keranjang adalah array dari array
        if (!is_array($keranjang) || empty($keranjang)) {
            $data['keranjang'] = [];
            return view('evgift/keranjang', $data);
        }

        $produkIds = array_column($keranjang, 'id_produk');

        if (!empty($produkIds)) {
            $produkList = $this->produkModel->whereIn('id_produk', $produkIds)->findAll();
            foreach ($keranjang as &$item) {
                // Pastikan $item adalah array
                if (is_array($item)) {
                    $product = array_filter($produkList, function ($p) use ($item) {
                        return $p['id_produk'] == $item['id_produk'];
                    });
                    if ($product) {
                        $product = array_shift($product);
                        $item['nama_produk'] = $product['nama_produk'];
                        $item['gambar'] = $product['gambar_produk'] ?? 'default.jpg';
                        $item['harga'] = $product['harga'] ?? 0;
                    } else {
                        $item['nama_produk'] = 'Produk Tidak Ditemukan';
                        $item['gambar'] = 'default.jpg';
                        $item['harga'] = 0;
                    }
                }
            }
        }
        $data['keranjang'] = $keranjang;
        return view('evgift/keranjang', $data);
    }

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
    $keranjang = session()->get('keranjang') ?? [];
    $produkIds = array_column($keranjang, 'id_produk');
    $produkList = [];

    if (!empty($produkIds)) {
        $produkList = $this->produkModel->whereIn('id_produk', $produkIds)->findAll();
    }

    // Inisialisasi total pesanan
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

                // Tambahkan ke total pesanan
                $totalPesanan += $item['total'];
            }
        }
    }

    $data['keranjang'] = $keranjang;
    $data['total'] = $totalPesanan; // Gunakan total yang sudah dihitung
    $data['orderNumber'] = 'ORD' . strtoupper(uniqid()); // Contoh nomor pesanan unik
    $data['nama_pemesan'] = session()->get('nama_pemesan') ?? 'Nama tidak tersedia';
    $data['alamat_pemesan'] = session()->get('alamat_pemesan') ?? 'Alamat tidak tersedia';

    return view('evgift/checkout', $data);
}




    public function login()
    {
        return view('evgift/login');
    }

    public function register()
    {
        return view('evgift/register');
    }

    public function notifikasi()
    {
        return view('evgift/notifikasi');
    }

    public function lupaPassword()
    {
        return view('evgift/lupa_password');
    }

    public function pembayaran()
    {
        $session = session();
    
        // Mendapatkan nomor pemesanan dari sesi atau dari input
        $no_pemesanan = $session->get('no_pemesanan'); // Atau dari input
        $id_pemesanan = $session->get('id_pemesanan'); // Atau dari input
    
        if (!$no_pemesanan) {
            // Jika tidak ada nomor pemesanan di sesi, bisa di-generate atau diambil dari data yang ada
            $lastOrder = $this->pembayaranModel->orderBy('id_pembayaran', 'DESC')->first();
            $nextOrderId = $lastOrder ? $lastOrder['id_pembayaran'] + 1 : 1;
            $no_pemesanan = 'ORD' . str_pad($nextOrderId, 6, '0', STR_PAD_LEFT);
            $session->set('no_pemesanan', $no_pemesanan);
        }
    
        // Set data untuk view
        $data = [
            'no_pemesanan' => $no_pemesanan,
            'id_pemesanan' => $id_pemesanan
        ];
    
        return view('evgift/pembayaran', $data);
    }
    public function simpanPemesanan()
    {
        // Ambil data dari form input
        $nama_pemesan = $this->request->getPost('nama_pemesan');
        $alamat_pemesan = $this->request->getPost('alamat_pemesan');

        // Simpan data ke session
        session()->set('nama_pemesan', $nama_pemesan);
        session()->set('alamat_pemesan', $alamat_pemesan);

        // Redirect ke halaman checkout
        return redirect()->to('/evgift/checkout');
    }

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
            'tanggal' => 'required|valid_date',
            'bukti' => 'uploaded[bukti]|is_image[bukti]|max_size[bukti,2048]'
        ])) {
            // Jika validasi gagal, kembali ke halaman pembayaran dengan error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('bukti');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads', $fileName);
        } else {
            $fileName = null;
        }

        $data = [
            'no_pemesanan' => $this->request->getPost('no_pemesanan'),
            'nama' => $this->request->getPost('nama'),
            'bank_asal' => $this->request->getPost('bank_asal'),
            'bank_tujuan' => $this->request->getPost('bank_tujuan'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal'),
            'catatan' => $this->request->getPost('catatan'),
            'bukti' => $fileName
        ];

        // Simpan data pembayaran ke database
        $model = new PembayaranModel();
        $model->insert($data);

        return redirect()->to(base_url('evgift/tracking'))->with('success', 'Pembayaran berhasil dikirim.');
    }
    
    

    public function pemesananDetail($id)
{
    // Ambil detail pemesanan
    $pemesanan = $this->pemesananModel->find($id);

    if (!$pemesanan) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Pemesanan tidak ditemukan.');
    }

    // Ambil detail produk yang terkait
    $produk = $this->produkModel->getProduk($pemesanan['id_produk']);

    // Ambil informasi pembayaran
    $pembayaran = $this->pembayaranModel->where('id_pemesanan', $id)->first();

    // Siapkan data untuk view
    $data = [
        'pemesanan' => $pemesanan,
        'produk' => $produk,
        'pembayaran' => $pembayaran
    ];

    return view('evgift/pemesanan_detail', $data);
}


    public function profil()
    {
        return view('evgift/profil');
    }

    public function testimoni()
    {
        return view('evgift/testimoni');
    }

    public function tracking()
    {
        $no_pemesanan = $this->request->getPost('no_pemesanan');

        $pembayaranModel = new PembayaranModel();
        $pembayaran = $pembayaranModel->getPembayaran($no_pemesanan);

        return view('evgift/tracking', [
            'pembayaran' => $pembayaran,
            'no_pemesanan' => $no_pemesanan
        ]);
    }

    public function tambahKeranjang()
    {
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

        // Tambahkan produk ke keranjang
        $keranjang[] = [
            'id_produk' => $id_produk,
            'kuantitas' => $kuantitas,
        ];

        // Simpan kembali ke session
        session()->set('keranjang', $keranjang);

        return redirect()->to(base_url('evgift/keranjang'))->with('success', 'Produk berhasil ditambahkan ke keranjang.');
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
    
}
