<?php 
namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table = 'pemesanan'; // Nama tabel pemesanan
    protected $primaryKey = 'id_pemesanan';
    protected $allowedFields = ['id_pemesanan', 'id_produk', 'nama_pelanggan', 'tanggal_pemesanan', 'kuantitas', 'status_pemesanan'];
    
    // Method untuk mengambil riwayat pembelian berdasarkan id pengguna
    public function getRiwayatPembelian($userId)
    {
        return $this->where('id_pelanggan', $userId) // Ganti dengan kolom yang sesuai jika menggunakan sistem login
                    ->findAll();
    }
    
}

