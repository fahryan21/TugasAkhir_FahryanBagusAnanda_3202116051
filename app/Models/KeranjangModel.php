<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'id_keranjang';

    protected $allowedFields = [
        'id_produk', 'nama_produk', 'harga', 'kuantitas'
    ];

    public function getKeranjang($user_id)
    {
        return $this->where(['user_id' => $user_id])->findAll();
    }

    public function getTotal($user_id)
    {
        $this->selectSum('harga');
        return $this->where(['user_id' => $user_id])->first();
    }
}

