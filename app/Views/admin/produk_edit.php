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
    <title>Edit Produk - Admin The Evgift</title>
</head>

<body id="page-top">

    <div id="wrapper">
        <?= $this->include('template/sidebarA') ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                    <h3 class="mb-4">Edit Produk</h3>

                    <div class="card card-body shadow-sm mb-3">
                        <form action="<?= site_url('admin/produk-update/' . $produk['id_produk']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" value="<?= old('nama_produk', $produk['nama_produk']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="stok">Stok Produk</label>
                                <input type="number" name="stok" class="form-control" value="<?= old('stok', $produk['stok']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga Produk</label>
                                <input type="number" name="harga" class="form-control" value="<?= old('harga', $produk['harga']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Produk</label>
                                <textarea name="deskripsi" class="form-control" rows="3" required><?= old('deskripsi', $produk['deskripsi']) ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="gambar_produk">Gambar Produk</label>
                                <input type="file" name="gambar_produk" class="form-control">
                                <img src="<?= base_url('assets/img/produk/' . $produk['gambar_produk']) ?>" width="100" class="mt-2">
                            </div>

                            <button type="submit" class="btn bg-website text-white">Update Produk</button>
                            <a href="<?= site_url('admin/produk') ?>" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js') ?>"></script>
</body>

</html>
