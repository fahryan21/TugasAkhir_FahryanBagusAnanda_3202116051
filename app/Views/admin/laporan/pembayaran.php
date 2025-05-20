<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/sb-admin-2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css'); ?>"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Laporan Pembayaran - Admin The Evgift</title>

    <style>
        @media print {
            .no-print {
                display: none;
            }
            .table-responsive {
                border: none;
            }
        }
    </style>
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

                <div class="container-fluid">
                    <h3 class="mb-4">Laporan Pembayaran</h3>
                    <div class="card card-body shadow-sm mb-3">
                        <div class="table-responsive">
                            <button id="printButton" class="btn btn-primary btn-sm mb-3 no-print"><i class="fa fa-print"></i> Cetak</button>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Pelanggan</th>
                                        <th>Jumlah Pembayaran</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>No Pemesanan</th>
                                        <th>Dari Bank</th>
                                        <th>Ke Bank</th>
                                        <th>Bukti</th>
                                        <th>Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($payments) && is_array($payments)) : ?>
                                        <?php foreach ($payments as $payment) : ?>
                                            <tr>
                                                <td><?= esc($payment['nama_pelanggan']); ?></td>
                                                <td><?= esc($payment['jumlah_pembayaran']); ?></td>
                                                <td><?= esc($payment['tanggal_pembayaran']); ?></td>
                                                <td><?= esc($payment['no_pemesanan']); ?></td>
                                                <td><?= esc($payment['dari_bank']); ?></td>
                                                <td><?= esc($payment['ke_bank']); ?></td>
                                                <td>
                                                    <?php if (!empty($payment['bukti'])): ?>
                                                        <img src="<?= base_url('uploads/bukti_transfer/' . $payment['bukti']); ?>" width="60" class="mr-2">
                                                    <?php else: ?>
                                                        No Image
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= esc($payment['catatan']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="8">Tidak ada data pembayaran.</td>
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
    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            window.print();
        });
    </script>
</body>

</html>
