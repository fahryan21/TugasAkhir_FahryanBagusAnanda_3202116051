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
    <title>Kategori - Admin The Evgift</title>
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

                <div class="container-fluid">
                    <h3 class="mb-4">Kategori</h3>
                    <div class="row mt-5">
                        <?php foreach ($categories as $category) : ?>
                            <div class="col-sm-12 col-lg-2">
                                <!-- Menggunakan 'gambar' sesuai dengan nama kolom di model -->
                                <?php if (isset($category['gambar']) && !empty($category['gambar'])) : ?>
                                    <img src="<?= base_url('assets/img/kategori/' . $category['gambar']) ?>" class="img-fluid rounded-circle border-gambar">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/img/kategori/default.jpg') ?>" class="img-fluid rounded-circle border-gambar">
                                <?php endif; ?>
                                <center>
                                    <p class="b my-3 h5"><?= esc($category['nama_kategori']) ?></p>
                                    <p class="b">
                                        <a href="<?= base_url('admin/kategori-edit/' . $category['id_kategori']) ?>" class="btn btn-primary btn-sm btn-block">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                    </p>
                                </center>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="mt-5">
                        <a href="<?= base_url('admin/kategori-tambah') ?>">
                            <button class="btn bg-website text-white">Tambah Kategori</button>
                        </a>
                    </div>
                </div>
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
