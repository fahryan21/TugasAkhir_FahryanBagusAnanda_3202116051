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
    <title>Produk - Admin The Evgift</title>
</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <?= $this->include('template/sidebarA') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
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
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3>Produk Bouquet</h3>
                        <a href="<?= site_url('admin/produk-tambah') ?>">
                            <button class="btn bg-website text-white">Tambah Produk</button>
                        </a>
                    </div>

                    <div class="card card-body shadow-sm mb-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Stok Produk</th>
                                        <th>Status Produk</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop Produk Bouquet -->
                                    <?php foreach ($bouquet as $item): ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img src="<?= base_url('assets/img/produk/'.$item['gambar_produk']) ?>" width="60" class="mr-2">
                                                <div class="media-body">
                                                    <?= $item['nama_produk'] ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $item['stok'] ?> Pcs</td>
                                        <td><span class="badge badge-success btn-block"><?= $item['status_produk'] ?></span></td>
                                        <td>Rp<?= number_format($item['harga'], 0, ',', '.') ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/produk-edit/'.$item['id_produk']) ?>" class="badge badge-primary">Edit</a>
                                            <form action="<?= site_url('admin/produk-hapus/' . $item['id_produk']) ?>" method="post" style="display:inline;">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="badge badge-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3>Produk Hampers</h3>
                    </div>
                    
                    <div class="card card-body shadow-sm mb-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Stok Produk</th>
                                        <th>Status Produk</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop Produk Hampers -->
                                    <?php foreach ($hampers as $item): ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img src="<?= base_url('assets/img/produk/'.$item['gambar_produk']) ?>" width="60" class="mr-2">
                                                <div class="media-body">
                                                    <?= $item['nama_produk'] ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $item['stok'] ?> Pcs</td>
                                        <td><span class="badge badge-success btn-block"><?= $item['status_produk'] ?></span></td>
                                        <td>Rp<?= number_format($item['harga'], 0, ',', '.') ?></td>
                                        <td>
                                            <a href="<?= site_url('admin/produk-edit/'.$item['id_produk']) ?>" class="badge badge-primary">Edit</a>
                                            <form action="<?= site_url('admin/produk-hapus/' . $item['id_produk']) ?>" method="post" style="display:inline;">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="badge badge-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- Konten Admin -->
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js') ?>"></script>
</body>

</html>
