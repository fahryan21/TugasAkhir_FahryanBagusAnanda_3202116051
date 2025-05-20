<?php

namespace App\Controllers;

use App\Models\PembayaranModel;

class TrackingController extends BaseController
{
    public function index($no_pemesanan = null)
    {
        $model = new PembayaranModel();

        // Jika $no_pemesanan tidak null, ambil data pembayaran berdasarkan no_pemesanan
        if ($no_pemesanan) {
            $data['pembayaran'] = $model->where('nomor_pemesanan', $no_pemesanan)->first();
        } else {
            $data['pembayaran'] = null;
        }

        return view('tracking', $data);
    }
}
