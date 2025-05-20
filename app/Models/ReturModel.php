<?php namespace App\Models;

use CodeIgniter\Model;

class ReturModel extends Model
{
    protected $table = 'retur';
    protected $primaryKey = 'id_retur';
    protected $allowedFields = ['id_pemesanan', 'keluhan'];

    // Mengambil data retur dengan informasi produk dan pemesanan
    public function getReturWithDetails($id_retur = null)
    {
        return $this->join('pemesanan', 'pemesanan.id_pemesanan = retur.id_pemesanan', 'left')
                    ->join('produk', 'produk.id_produk = pemesanan.id_produk', 'left')
                    ->select('retur.*, pemesanan.no_pemesanan, pemesanan.tanggal_pemesanan, produk.nama_produk, produk.gambar_produk')
                    ->findAll($id_retur);
    }
}
