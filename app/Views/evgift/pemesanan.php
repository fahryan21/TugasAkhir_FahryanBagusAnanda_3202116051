<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">

    <title>Pemesanan - The Evgift</title>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <?= $this->include('template/navbar') ?>

    <!-- Breadcrumb -->
    <div class="nav-scroller bg-white shadow-sm">
        <div class="container-fluid pt-2 pb-2">
            <a href="<?= base_url() ?>">Halaman Utama</a> > Pemesanan
        </div>
    </div>

    <!-- Content -->
    <div class="container my-5">
        <?php if (!empty($pemesanan) && is_array($pemesanan)) : ?>
            <?php foreach ($pemesanan as $item) : ?>
                <div class="list-group shadow-sm mb-3">
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-sm-12 col-lg-4">
                                <p class="mb-0 font-weight-bold text-website">No. Pemesanan: <?= $item['id_pemesanan'] ?></p>
                                <p><?= $item['tanggal_pemesanan'] ?></p>
                                <p class="mt-4 font-weight-bold text-website">Produk</p>
                                <div class="media">
                                    <img src="<?= base_url('assets/img/produk/' . $item['gambar_produk']) ?>" class="mr-2" width="60" alt="<?= $item['nama_produk'] ?>">
                                    <div class="media-body">
                                        <?= $item['nama_produk'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <p class="mb-0 font-weight-bold text-website">Grand Total</p>
                                <p class="h4">Rp<?= number_format($item['total'], 0, ',', '.') ?></p>
                                <p class="mt-4 font-weight-bold text-website">Customer</p>
                                <p class="font-weight-bold"><?= $item['nama_pelanggan'] ?></p>
                                <p><?= $item['alamat'] ?></p>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <p class="mb-0 font-weight-bold text-website">Status Transaksi</p>
                                <p class="badge badge-primary"><?= $item['status_pemesanan'] ?></p>
                                <br />
                                <a href="<?= base_url($item['link_tracking']) ?>">
                                    Lihat Tracking Produk
                                </a>
                            </div>
                            <div class="col-sm-12 col-lg-2">
                                <a href="<?= base_url('evgift/pemesanan/detail/' . $item['id_pemesanan']) ?>">
                                    <button class="btn bg-website btn-sm mt-5 text-white">Lihat Detail</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada pemesanan yang ditemukan.</p>
        <?php endif; ?>
    </div>

    <!-- Footer -->
    <span class="to_top"><i class="fa fa-arrow-up"></i></span>
    <?= $this->include('template/footer') ?>
</body>

</html>
