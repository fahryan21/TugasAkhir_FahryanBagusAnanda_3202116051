<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <title>Keranjang - The Evgift</title>
    <style>
        .btn-md {
            padding: .75rem 1.25rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .375rem;
        }

        .checkout-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 20px; /* Adjust the gap between total and button */
        }
    </style>
</head>

<body class="bg-light">
    <?= $this->include('template/navbar'); ?>

    <div class="nav-scroller bg-white shadow-sm">
        <div class="container-fluid pt-2 pb-2">
            <a href="<?= base_url() ?>">Halaman Utama</a> > Keranjang
        </div>
    </div>

    <div class="container my-5">
        <div class="list-group shadow-sm mb-4">
            <div class="list-group-item bg-light text-website b">
                <div class="row">
                    <div class="col-sm-12 col-lg-1"></div>
                    <div class="col-sm-12 col-lg-4">Produk</div>
                    <div class="col-sm-12 col-lg-3">Harga Satuan</div>
                    <div class="col-sm-12 col-lg-2">Kuantitas</div>
                    <div class="col-sm-12 col-lg-2">Aksi</div>
                </div>
            </div>
            <?php foreach ($keranjang as $item) : ?>
                <div class="list-group-item">
                    <div class="row my-4">
                        <div class="col-sm-12 col-lg-1 mb-3">
                            <input type="checkbox" name="pilih">
                        </div>
                        <div class="col-sm-12 col-lg-4 mb-3">
                            <a href="<?= base_url('evgift/produk/detail/' . $item['id_produk']) ?>" class="hvnb">
                                <div class="media">
                                    <img src="<?= base_url('assets/img/produk/' . $item['gambar']) ?>" width="60" class="mr-3">
                                    <div class="media-body text-dark">
                                        <?= $item['nama_produk'] ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-12 col-lg-3 mb-3">
                            <h4 class="text-website">Rp<?= number_format($item['harga'], 0, ',', '.') ?></h4>
                        </div>
                        <div class="col-sm-12 col-lg-2 mb-3">
                            <input type="text" class="form-control" value="<?= $item['kuantitas'] ?>" readonly>
                        </div>
                        <div class="col-sm-12 col-lg-2 mb-3">
                            <a href="<?= base_url('evgift/keranjang/hapus/' . $item['id_produk']) ?>" class="b text-website">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Form Input Nama Pemesan dan Alamat -->
        <form action="<?= base_url('/evgift/checkout') ?>" method="post">
            <div class="card card-body shadow-sm">
                <div class="checkout-container">
                    <h5><span class="text-muted">Total Pesanan:</span> <span class="text-website">
                        Rp<?= number_format(array_sum(array_map(function($item) {
                            return $item['harga'] * $item['kuantitas'];
                        }, $keranjang)), 0, ',', '.') ?></span></h5>
                    <button type="submit" class="btn bg-website btn-md text-white">Checkout</button>
                </div>
            </div>
        </form>
    </div>

    <?= $this->include('template/footer') ?>
    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>

</html>
