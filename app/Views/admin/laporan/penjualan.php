<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/sb-admin-2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css'); ?>">

    <title>Laporan Penjualan - Admin The Evgift</title>
</head>

<body id="page-top">

    <div id="wrapper">
        <?= $this->include('template/sidebarA') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-dark bg-website-alt topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw fa-1-5x"></i>
                                <span class="badge badge-danger">3+</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow-sm" aria-labelledby="alertsDropdown">
                                <h6 class="p-3 bg-website-alt text-white mb-0">
                                    Notifikasi
                                </h6>

                                <a class="hvnb" href="<?= base_url('pembayaran'); ?>">
                                    <div class="media p-3">
                                        <img src="<?= base_url('assets/img/produk/1.jpg'); ?>" width="60" class="mr-2">
                                        <div class="media-body">
                                            <div class="b text-website">Pesanan Baru</div>
                                            <span class="text-dark">Lakukan verifikasi pembayaran.</span><br />
                                            <span class="text-muted">27 Juni 2019</span>
                                        </div>
                                    </div>
                                </a>
                                <hr class="sidebar-divider my-0">
                                <a class="hvnb" href="<?= base_url('testimoni'); ?>">
                                    <div class="media p-3">
                                        <img src="<?= base_url('assets/img/produk/2.jpg'); ?>" width="60" class="mr-2">
                                        <div class="media-body">
                                            <div class="b text-website">Testimoni dari Bustomer</div>
                                            <span class="text-dark">Customer memberi penilaian.</span><br />
                                            <span class="text-muted">30 Juni 2019</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- konten admin -->

                <div class="container-fluid">
                    <h3 class="mb-4">Laporan Penjualan</h3>
                    <div class="card card-body shadow-sm mb-3">
                        <div class="table-responsive">
                            <button class="btn btn-primary btn-sm mb-3"><i class="fa fa-print"></i> Cetak</button>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Customer</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img src="<?= base_url('assets/img/produk/1.jpg'); ?>" width="60" class="mr-2">
                                                <div class="media-body">
                                                    Talisa Dress Women's Casual Short-Sleeve Premium Dress
                                                </div>
                                            </div>
                                        </td>
                                        <td>Angga Lesmana</td>
                                        <td>60Pcs</td>
                                        <td>Rp150.000</td>
                                        <td>26 Juni 2019</td>
                                        <td>
                                            <a href="#">
                                                <span class="badge badge-primary">sukses</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img src="<?= base_url('assets/img/produk/2.jpg'); ?>" width="60" class="mr-2">
                                                <div class="media-body">
                                                    Talisa Dress Women's Casual Short-Sleeve Premium Dress
                                                </div>
                                            </div>
                                        </td>
                                        <td>Angga Lesmana</td>
                                        <td>60Pcs</td>
                                        <td>Rp150.000</td>
                                        <td>26 Juni 2019</td>
                                        <td>
                                            <a href="#">
                                                <span class="badge badge-primary">sukses</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img src="<?= base_url('assets/img/produk/3.jpg'); ?>" width="60" class="mr-2">
                                                <div class="media-body">
                                                    Talisa Dress Women's Casual Short-Sleeve Premium Dress
                                                </div>
                                            </div>
                                        </td>
                                        <td>Angga Lesmana</td>
                                        <td>60Pcs</td>
                                        <td>Rp150.000</td>
                                        <td>26 Juni 2019</td>
                                        <td>
                                            <a href="#">
                                                <span class="badge badge-primary">sukses</span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav class="d-flex justify-content-center mt-3">
                            <ul class="pagination shadow-sm">
                                <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- konten admin -->
            </div>
            <div class="mt-5"></div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js'); ?>"></script>
</body>

</html>