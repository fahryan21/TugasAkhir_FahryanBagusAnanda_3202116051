<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <title>Mendaftar - Rima Arhyan</title>
</head>

<body class="bg-light">
    <?= $this->include('template/navbar'); ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-sm-12 col-lg-8">
                <div class="card card-body shadow-sm">
                    <h4 class="mb-4">Mendaftar</h4>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6 mb-4">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="col-sm-12 col-lg-6 mb-4">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control mb-3">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control mb-3">
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" id="ck1" required>
                                <label class="custom-control-label" for="ck1">Mengikuti syarat dan ketentuan</label>
                            </div>
                            <button type="submit" class="btn bg-website text-white btn-block">Mendaftar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-website mt-5 p-2">
        <div class="container pt-4">
            <div class="row text-white">
                <div class="col-sm-12 col-lg-3">
                    <h5>Informasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fa fa-angle-right"></i> Kontak</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Syarat dan Ketentuan</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Kebijakan Pengguna</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Lokasi Kami</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <h5>Belanja</h5>
                    <ul class="list-unstyled">
                        <li><a href="produk.html"><i class="fa fa-angle-right"></i> Semua Produk</a></li>
                        <li><a href="produk.html"><i class="fa fa-angle-right"></i> Produk Baru</a></li>
                        <li><a href="produk.html"><i class="fa fa-angle-right"></i> Produk Spesial</a></li>
                        <li><a href="kategori.html"><i class="fa fa-angle-right"></i> Semua Kategori</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Customer Care</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <h5>Tentang Kami</h5>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fa fa-map-marker-alt"></i> Jalan Thamrin No.100, Medan Kota, Kota Medan, Indonesia.</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> customer@rima.arhyan.com</a></li>
                    </ul>
                </div>
                <div class="col-sm-12 col-lg-3">
                    <h5>Media Sosial</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://www.facebook.com/rima.arhyan"><i class="fa fa-angle-right"></i> Facebook</a></li>
                        <li><a href="https://twitter.com/rima.arhyan"><i class="fa fa-angle-right"></i> Twitter</a></li>
                        <li><a href="https://www.instagram.com/rima.arhyan"><i class="fa fa-angle-right"></i> Instagram</a></li>
                        <li><a href="https://line.me/@rima.arhyan"><i class="fa fa-angle-right"></i> Line Chat</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>