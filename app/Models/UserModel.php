<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $allowedFields = [
        'username', 'email', 'password', 'nama_lengkap', 'nomor_hp', 'alamat', 'role'
    ];

    // Mengecek apakah email sudah ada di database
    public function emailExists($email)
    {
        return $this->where('email', $email)->countAllResults() > 0;
    }

    // Hook sebelum insert: pastikan email tidak duplikat
    protected function beforeInsert(array $data)
    {
        if ($this->emailExists($data['data']['email'])) {
            throw new \Exception('Email sudah terdaftar.');
        }
        return $data;
    }

    // Hook sebelum update: pastikan email tidak duplikat dengan selain dirinya sendiri
    protected function beforeUpdate(array $data)
    {
        if (isset($data['data']['email'])) {
            $existingUser = $this->where('email', $data['data']['email'])
                                 ->where('id_user !=', $data['id'])
                                 ->countAllResults();

            if ($existingUser > 0) {
                throw new \Exception('Email sudah digunakan oleh pengguna lain.');
            }
        }
        return $data;
    }
}
