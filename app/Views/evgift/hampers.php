<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hampers - The Evgift</title>

    <!-- Link ke Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap">

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/slick.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/slick-theme.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/nouislider.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style1.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/icon.png') ?>">

    <style>
        .background {
            background-image: url("<?= base_url('assets/img/backg.jpg') ?>");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1.text-black, p.text-black {
            font-family: 'Playfair Display', serif;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        h1.text-black {
            font-size: 3rem;
            font-weight: 700;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        h1.text-black:hover {
            transform: scale(1.05);
            color: #f0f0f0;
        }

        p.text-black {
            font-size: 1.25rem;
        }

        .gambar-produk {
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .hvnb:hover {
            text-decoration: none;
        }

        .list-group-item {
            padding: 10px;
        }

        .list-group-item .card-text {
            font-size: 16px;
            font-weight: bold;
        }

        .btn-outline-success {
            text-align: center;
            font-weight: bold;
        }

        .pagination {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?= $this->include('template/navbar') ?>

    <div class="background">
        <div class="container text-center text-light py-5">
            <h1 class="text-black">Hampers Collection</h1>
            <p class="text-black">Explore our delightful hampers collection!</p>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row mb-5">
            <?php if (isset($produk) && !empty($produk) && is_array($produk)) : ?>
                <?php foreach ($produk as $item) : ?>
                    <?php if ($item['id_kategori'] == 2) : // Pastikan id_kategori untuk hampers adalah 2 ?>
                        <div class="col-sm-12 col-lg-3 mb-3">
                            <a href="<?= base_url('evgift/produk/detail/' . $item['id_produk']) ?>" class="hvnb">
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
                                        Lihat Produk
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada produk untuk kategori ini.</p>
            <?php endif; ?>
        </div>

        <nav class="d-flex justify-content-center">
            <ul class="pagination shadow-sm">
                <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
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
