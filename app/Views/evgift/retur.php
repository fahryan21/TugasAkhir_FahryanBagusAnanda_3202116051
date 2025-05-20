<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">


    <title>Pengajuan Retur - Rima Arhyan</title>
</head>
<body class="bg-light">

<?= $this->include('template/navbar') ?>

<div class="nav-scroller bg-white shadow-sm">
    <div class="container-fluid pt-2 pb-2">
        <a href="<?= base_url() ?>">Halaman Utama</a> > Pengajuan Retur
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="card card-body shadow-sm">
                <div class="list-group mb-3">
                    <div class="list-group-item">
                        <div class="media">
                        <img src="<?= base_url('assets/img/produk/1.jpg') ?>" width="60" class="mr-3">

                            <div class="media-body">
                                <b>Talisa Dress Women's Casual Short-Sleeve Premium Dress</b>
                                <div class="table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td>Warna</td>
                                                <td>:</td>
                                                <td>Putih</td>
                                            </tr>
                                            <tr>
                                                <td>Ukuran</td>
                                                <td>:</td>
                                                <td>XL</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Kuantitas</td>
                                                <td>:</td>
                                                <td>1pcs</td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <span class="badge bg-website text-white">BJU001</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <h6>Alamat Pengiriman</h6>
                    Jalan Thamrin No.100, Medan Kota Kota Medan, Sumatera Utara 20215. Indonesia
                </div>
                <div>
                    <h6>Total Pembayaran</h6>
                    <h5 class="text-website">Rp185.000</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="card card-body shadow-sm">
                <h6>Jenis Komplain</h6>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="ck1">
                    <label class="custom-control-label" for="ck1">Barang yang dikirim tidak sesuai pesanan</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="ck2">
                    <label class="custom-control-label" for="ck2">Jumlah produk yang dikirim tidak sesuai</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="ck3">
                    <label class="custom-control-label" for="ck3">Barang yang dikirim cacat</label>
                </div>
                <div class="mt-4">
                    <div class="row">
                        <div class="col-sm-12 col-lg-7">
                            Jumlah barang yang ingin di retur
                        </div>
                        <div class="col-sm-12 col-lg-5">
                            <input type="number" name="total" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <p>Upload gambar produk yang ingin diretur</p>
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="d-flex justify-content-center">
                                <input type="file" name="gambar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <a href="proses.html">
                        <button class="btn bg-website text-white">Retur Produk</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('template/footer') ?>

<script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
<script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>

</body>
</html>
