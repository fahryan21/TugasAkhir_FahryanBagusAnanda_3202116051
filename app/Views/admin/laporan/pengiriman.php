<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/sb-admin-2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <title>Laporan Pengiriman - Admin Rima Arhyan</title>
</head>

<body id="page-top">

    <div id="wrapper">
        <?= view('template/sidebarA', ['activePage' => 'laporan_pengiriman']); ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-dark bg-website-alt topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <!-- Logout Button -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('logout') ?>">
                                <i class="fas fa-sign-out-alt fa-fw"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Konten Admin -->
                <div class="container-fluid">
                    <h3 class="mb-4">Pengiriman</h3>
                    <div class="card card-body shadow-sm mb-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Status</th>
                                        <th>Pengiriman</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($shipments as $shipment) : ?>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <img src="<?= base_url('assets/img/produk/' . $shipment['image']) ?>" width="60" class="mr-2">
                                                    <div class="media-body">
                                                        <?= $shipment['product_name'] ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">
                                                    <?= $shipment['status'] ?>
                                                </span>
                                            </td>
                                            <td><?= $shipment['courier'] ?><br />
                                                No. Resi: <?= $shipment['tracking_number'] ?></td>
                                            <td><?= $shipment['quantity'] ?> Pcs</td>
                                        </tr>
                                    <?php endforeach; ?>
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

    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js') ?>"></script>
</body>

</html>
