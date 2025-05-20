<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class ProdukController extends BaseController
{
    public function index()
    {
        $model = new ProdukModel();
        $data['produk'] = $model->getProduk(); // Menampilkan 4 produk

        return view('evgift/home', $data);
    }
}
