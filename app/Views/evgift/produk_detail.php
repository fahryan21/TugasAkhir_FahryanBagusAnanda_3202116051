<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">

    <title>The Evgift</title>
</head>

<body class="bg-light">
    <?= $this->include('template/navbar') ?>

    <div class="nav-scroller bg-white shadow-sm mb-4">
        <div class="container-fluid pt-2 pb-2">
            <a href="<?= base_url('/') ?>">Halaman Utama</a> > <a href="<?= base_url('evgift/produk') ?>">Semua Produk</a> > <?= $produk['nama_produk'] ?>
        </div>
    </div>

    <div class="container my-5">
        <div class="row mb-4">
            <div class="col-sm-12 col-lg-5">
                <img src="<?= base_url('assets/img/produk/' . $produk['gambar_produk']) ?>" class="img-fluid">
            </div>
            <div class="col-sm-12 col-lg-7">
                <div class="card card-body shadow-sm">
                    <h4 class="text-website">
                        <?= $produk['nama_produk'] ?>
                    </h4>
                    <h4 class="text-warning">
                        Rp<?= number_format($produk['harga'], 0, ',', '.') ?>
                    </h4>

                    <hr>
                    <p class="b text-muted">Kuantitas</p>
                    <form action="<?= base_url('evgift/tambahKeranjang') ?>" method="post">
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                        <div class="row">
                            <div class="col-sm-12 col-lg-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="input-group-text" type="button" onclick="decrementQuantity()">-</button>
                                    </div>
                                    <input type="number" name="kuantitas" class="form-control" id="quantity" value="1" min="1">
                                    <div class="input-group-append">
                                        <button class="input-group-text" type="button" onclick="incrementQuantity()">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="b text-muted">Stok</p>
                        <p><?= $produk['stok'] ?> pcs</p>
                        <div class="my-2">
                            <div class="row">
                                <div class="col-sm-12 col-lg-5">
                                    <button type="submit" class="btn bg-website text-white btn-block">
                                        Beli Sekarang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <td><i class="fa fa-truck"></i> Pilih Kurir</td>
                                    <td>:</td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <select class="form-control form-control-sm">
                                            <option>COD (2 Hari Kerja)</option>
                                        </select>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-group">
            <div class="list-group-item b text-website">
                Deskripsi Produk
            </div>
            <div class="list-group-item">
                <p><?= $produk['nama_produk'] ?></p>
                <!-- Menampilkan deskripsi produk -->
                <p><?= isset($produk['deskripsi']) && !empty($produk['deskripsi']) ? $produk['deskripsi'] : 'Deskripsi tidak tersedia' ?></p>
                <!-- Menampilkan ukuran produk -->
               
            </div>
        </div>
    </div>
    <?= $this->include('template/footer') ?>
    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script>
        function incrementQuantity() {
            var quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decrementQuantity() {
            var quantityInput = document.getElementById('quantity');
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }
    </script>
</body>

</html>
