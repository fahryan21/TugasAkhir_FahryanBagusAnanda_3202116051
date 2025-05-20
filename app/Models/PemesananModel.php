<?php namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $allowedFields = ['no_pemesanan', 'nama_pelanggan', 'tanggal_pemesanan', 'kuantitas', 'status_pemesanan', 'alamat', 'link_tracking'];

    // Fungsi untuk mendapatkan data pemesanan berdasarkan ID
    public function getPemesananById($id)
    {
        return $this->where('id_pemesanan', $id)->first();
    }
}
