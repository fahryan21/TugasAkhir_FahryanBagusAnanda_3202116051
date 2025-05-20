<?php

namespace App\Controllers;

use App\Models\PemesananModel;

class PemesananController extends BaseController
{
    public function index()
    {
        $model = new PemesananModel();
        $data['pemesanan'] = $model->getPemesanan();

        return view('evgift/pemesanan', $data);
    }
}
