<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/sb-admin-2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Dashboard - Admin</title>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
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

                <!-- Konten dashboard -->
                <div class="container-fluid">
                    <h3 class="mb-4">Dashboard</h3>
                    <div class="row">
                        <div class="col-sm-12 col-lg-3 mb-3">
                            <div class="list-group">
                                <div class="list-group-item shadow-sm b text-website">
                                    Pengunjung
                                </div>
                                <div class="list-group-item shadow-sm">
                                    <?= $pemesananCount ?? 'Data tidak tersedia' ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 mb-3">
                            <div class="list-group">
                                <div class="list-group-item shadow-sm b text-website">
                                    Total Produk
                                </div>
                                <div class="list-group-item shadow-sm">
                                    <?= $produkCount ?? 'Data tidak tersedia' ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-12 col-lg-3 mb-3">
                            <div class="list-group">
                                <div class="list-group-item shadow-sm b text-website">
                                    Produk Terjual
                                </div>
                                <div class="list-group-item shadow-sm">
                                    <?= $produkTerjual ?? 'Data tidak tersedia' ?>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-sm-12 col-lg-3">
                            <div class="list-group">
                                <div class="list-group-item shadow-sm b text-website">
                                    Total Customer
                                </div>
                                <div class="list-group-item shadow-sm">
                                    <?= $pembayaranCount ?? 'Data tidak tersedia' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Konten dashboard -->
            </div>
            <div class="mt-5"></div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js') ?>"></script>
</body>

</html>
