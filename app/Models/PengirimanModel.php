<?php

namespace App\Models;

use CodeIgniter\Model;

class PengirimanModel extends Model
{
    protected $table = 'pengiriman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_produk', 'gambar', 'status', 'kurir', 'nomor_resi', 'jumlah'];
}
