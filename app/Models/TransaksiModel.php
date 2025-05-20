<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id';

    protected $allowedFields = ['order_id', 'user_email', 'nama_pelanggan', 'gross_amount', 'transaction_status', 'transaction_time'];

    protected $useTimestamps = true;
}
