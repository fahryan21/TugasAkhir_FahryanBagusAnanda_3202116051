<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\TransaksiModel;

class TransaksiController extends Controller
{
    
    protected $TransaksiModel;

    public function __construct()

    {
        $this->session = session();
        $this->TransaksiModel = new TransaksiModel();
    }

    public function index()
    {
        $data['transactions'] = $this->TransaksiModel->findAll();
        return view('admin/transaksi', $data);
    }

    public function tambahTransaksi()
    {
        return view('admin/tambah_transaksi');
    }

    public function simpanTransaksi()
    {
        $input = $this->request->getPost();
        $this->TransaksiModel->save([
            'nama_produk' => $input['nama_produk'],
            'gambar' => $input['gambar'],
            'nama_pelanggan' => $input['nama_pelanggan'],
            'kode_produk' => $input['kode_produk'],
            'nomor_pemesanan' => $input['nomor_pemesanan'],
            'kuantitas' => $input['kuantitas'],
            'harga' => $input['harga'],
            'total' => $input['total'],
            'pengiriman' => $input['pengiriman'],
            'grand_total' => $input['grand_total'],
            'status' => $input['status'],
            'status_class' => $input['status_class']
        ]);

        return redirect()->to('/admin/laporan_transaksi');
    }
}
