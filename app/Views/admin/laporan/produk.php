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
    <title>Laporan Produk - Admin Rima Arhyan</title>
    <style>
        @media print {
            .no-print {
                display: none;
            }
            .table-responsive {
                border: none;
            }
            .navbar, .sidebar {
                display: none;
            }
        }
    </style>
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

                <!-- Konten Admin -->
                <div class="container-fluid">
                    <h3 class="mb-4">Laporan Produk</h3>
                    <div class="card card-body shadow-sm mb-3">
                        <button id="printButton" class="btn btn-primary btn-sm mb-3 no-print">
                            <i class="fa fa-print"></i> Cetak
                        </button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Stok Produk</th>
                                        <th>Produk Terjual</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($products) && is_array($products)) : ?>
                                        <?php foreach ($products as $product) : ?>
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <img src="<?= base_url('assets/img/produk/' . $product['gambar_produk']) ?>" width="60" class="mr-2">
                                                        <div class="media-body">
                                                            <?= esc($product['nama_produk']) ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?= esc($product['stok']) ?></td>
                                                <td><?= esc($product['terjual']) ?></td>
                                                <td><?= esc($product['harga']) ?></td>
                                                <td><?= esc($product['status_produk']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="5">Tidak ada data produk.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination bisa dihilangkan atau dikosongkan -->
                        <nav class="d-flex justify-content-center mt-3">
                            <?php if ($pager) : ?>
                                <?= $pager->links() ?>
                            <?php endif; ?>
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
    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            window.print();
        });
    </script>
</body>

</html>
