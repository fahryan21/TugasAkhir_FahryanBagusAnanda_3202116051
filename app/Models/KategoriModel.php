<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori'; // Nama tabel di database
    protected $primaryKey = 'id_kategori'; // Nama kolom primary key di tabel

    protected $returnType = 'array'; // Tipe pengembalian data
    protected $useSoftDeletes = false; // Soft delete (false jika tidak menggunakan soft delete)

    protected $allowedFields = ['nama_kategori', 'gambar']; // Kolom-kolom yang diizinkan untuk diisi

    // Aturan validasi
    protected $validationRules = [
        'nama_kategori' => 'required|min_length[3]|max_length[255]|is_unique[kategori.nama_kategori]',
        'gambar' => 'permit_empty|valid_image' // Jika ada kolom gambar, aturan validasi untuk gambar bisa ditambahkan
    ];

    // Pesan validasi custom
    protected $validationMessages = [
        'nama_kategori' => [
            'required' => 'Nama kategori wajib diisi.',
            'min_length' => 'Nama kategori minimal 3 karakter.',
            'max_length' => 'Nama kategori maksimal 255 karakter.',
            'is_unique' => 'Nama kategori sudah ada, silakan gunakan nama lain.'
        ],
        'gambar' => [
            'valid_image' => 'File yang diunggah harus berupa gambar yang valid.'
        ]
    ];
}
