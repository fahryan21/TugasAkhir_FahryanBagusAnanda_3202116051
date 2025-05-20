<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/sb-admin-2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css'); ?>">
    <title>Laporan Retur - Admin The Evgift</title>
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
                                <h6 class="p-3 bg-website-alt text-white mb-0">Notifikasi</h6>
                            </div>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <h3 class="mb-4">Laporan Retur</h3>
                    <div class="card card-body shadow-sm mb-3">
                        <div class="table-responsive">
                            <button class="btn btn-primary btn-sm mb-3"><i class="fa fa-print"></i> Cetak</button>
                            <table class="table table-striped table-bordered">
                            <thead>
        <tr>
            <th>Produk</th>
            <th>Nomor Pesanan</th>
            <th>Tanggal Pesanan</th>
            <th>Keluhan</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($retur)) : ?>
            <?php foreach ($retur as $item) : ?>
                <tr>
                    <td>
                        <div class="media">
                            <!-- Menggunakan kolom gambar yang ada di tabel pemesanan -->
                            <?php if (isset($item['gambar']) && !empty($item['gambar'])): ?>
                                <img src="<?= base_url('assets/img/produk/' . esc($item['gambar'])); ?>" width="60" class="mr-2">
                            <?php else: ?>
                                <img src="<?= base_url('assets/img/produk/default.png'); ?>" width="60" class="mr-2">
                            <?php endif; ?>
                            <div class="media-body">
                                <b><?= esc($item['nama_produk']); ?></b><br>
                                <?= isset($item['no_pemesanan']) ? esc($item['no_pemesanan']) : 'N/A'; ?><br>
                                <p><?= isset($item['tanggal_pemesanan']) ? esc($item['tanggal_pemesanan']) : 'N/A'; ?></p>
                            </div>
                        </div>
                    </td>
                    <td><?= isset($item['no_pemesanan']) ? esc($item['no_pemesanan']) : 'N/A'; ?></td>
                    <td><?= isset($item['tanggal_pemesanan']) ? esc($item['tanggal_pemesanan']) : 'N/A'; ?></td>
                    <td><?= isset($item['keluhan']) ? esc($item['keluhan']) : 'N/A'; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4">Tidak ada data retur.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
</body>

</html>