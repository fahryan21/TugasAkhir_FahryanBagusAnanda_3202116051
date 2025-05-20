<?php namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';

    protected $allowedFields = [
        'id_pemesanan', 
        'jumlah_pembayaran', 
        'tanggal_pembayaran', 
        'nama_pelanggan', 
        'no_pemesanan', 
        'dari_bank', 
        'ke_bank', 
        'bukti', 
        'catatan'
    ];

    // Enable timestamps if using created_at and updated_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPembayaran($noPemesanan = null)
    {
        if ($noPemesanan) {
            return $this->where('no_pemesanan', $noPemesanan)->findAll();
        }
        return $this->findAll();
    }

    public function getPembayaranById($id)
    {
        return $this->where('id_pembayaran', $id)->first();
    }
}
