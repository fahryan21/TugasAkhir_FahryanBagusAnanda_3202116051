<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/sb-admin-2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title><?= $title ?? 'Admin Page' ?></title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('logout') ?>">
                                <i class="fas fa-sign-out-alt fa-fw"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Konten Admin -->
                <div class="container-fluid">
                    <h3 class="mb-4">Laporan Pemesanan</h3>
                    <div class="card card-body shadow-sm mb-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Detail Transaksi</th>
                                        <th>Kuantitas</th>
                                        <th>Nama Customer</th>
                                        <th>Status</th>
                                        <th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Produk Bouquet -->
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img src="../../assets/img/produk/bouquet1.jpg" width="60" class="mr-2">
                                                <div class="media-body">
                                                    <b>Romantic Red Roses Bouquet</b>
                                                    1004105121<br>
                                                    <p>30 Agustus 2024</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>5 Buah</td>
                                        <td>
                                            <b>Maria Clara</b>
                                        </td>
                                        <td>
                                            <p class="badge badge-secondary">Menunggu verifikasi</p><br />
                                        </td>
                                        <td>
                                            <a href="../pembayaran-proses.html">
                                                Lihat
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img src="../../assets/img/produk/bouquet2.jpg" width="60" class="mr-2">
                                                <div class="media-body">
                                                    <b>Elegant Mixed Flowers Bouquet</b>
                                                    1004105122<br>
                                                    <p>30 Agustus 2024</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>3 Buah</td>
                                        <td>
                                            <b>John Doe</b>
                                        </td>
                                        <td>
                                            <p class="badge badge-secondary">Menunggu verifikasi</p><br />
                                        </td>
                                        <td>
                                            <a href="../pembayaran-proses.html">
                                                Lihat
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Produk Hampers -->
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img src="../../assets/img/produk/hampers1.jpg" width="60" class="mr-2">
                                                <div class="media-body">
                                                    <b>Deluxe Chocolate Hampers</b>
                                                    1005106121<br>
                                                    <p>30 Agustus 2024</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>2 Paket</td>
                                        <td>
                                            <b>Lisa Anjani</b>
                                        </td>
                                        <td>
                                            <p class="badge badge-primary">Selesai</p><br />
                                        </td>
                                        <td>
                                            <a href="../pembayaran-proses.html">
                                                Lihat
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img src="../../assets/img/produk/hampers2.jpg" width="60" class="mr-2">
                                                <div class="media-body">
                                                    <b>Luxury Tea Hampers</b>
                                                    1005106122<br>
                                                    <p>30 Agustus 2024</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>4 Paket</td>
                                        <td>
                                            <b>Rina Wulandari</b>
                                        </td>
                                        <td>
                                            <p class="badge badge-secondary">Menunggu verifikasi</p><br />
                                        </td>
                                        <td>
                                            <a href="../pembayaran-proses.html">
                                                Lihat
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

                <!-- Konten Admin -->
            </div>
            <div class="mt-5"></div>
        </div>
    </div>

    <!-- Include JS Files -->
    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js') ?>"></script>
</body>

</html>
