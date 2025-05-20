<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">

    <title>Semua Produk - The Evgift</title>
    <style>
        .gambar-produk {
            background-size: cover;
            background-position: center;
            height: 200px;
        }

        .text-website {
            color: #333;
        }

        .pagination {
            justify-content: center;
        }
    </style>
</head>

<body class="bg-light">
    <?= $this->include('template/navbar') ?>

    <div class="nav-scroller bg-white shadow-sm mb-4">
        <div class="container-fluid pt-2 pb-2">
            <a href="<?= base_url('/') ?>">Halaman Utama</a> > Semua Produk
        </div>
    </div>

    <div class="container mb-5">
        <div class="text-center mb-5">
            <h4 class="text-website">Semua Produk</h4>
            <hr class="garis">
        </div>

        <div class="row">
            <?php if (isset($produk) && is_array($produk)) : ?>
                <?php foreach ($produk as $item) : ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex justify-content-center">
                        <a href="<?= base_url('/evgift/produk/detail/' . $item['id_produk']) ?>" class="hvnb">
                            <div class="list-group shadow-sm">
                                <div class="list-group-item gambar-produk" style="background: url(<?= base_url('assets/img/produk/' . $item['gambar_produk']) ?>);"></div>
                                <div class="list-group-item">
                                    <div class="mb-2">
                                        <span class="active text-website">Rp<?= number_format($item['harga'], 0, ',', '.') ?></span>
                                        <span class="float-right text-muted">Terjual: <?= $item['terjual'] ?> pcs</span>
                                    </div>
                                    <p class="card-text text-dark"><?= $item['nama_produk'] ?></p>
                                </div>
                                <div class="list-group-item btn-outline-success pl-3">
                                    Detail Produk
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Tidak ada produk yang tersedia.</p>
            <?php endif; ?>
        </div>

        <nav>
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

    <?= $this->include('template/footer') ?>

    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>

</html>
