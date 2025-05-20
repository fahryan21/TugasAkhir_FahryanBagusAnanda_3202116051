<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">

    <title>Lupa Password - Rima Arhyan</title>
</head>

<body class="bg-light">
    <?= $this->include('template/navbar'); ?>

    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-lg-8">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-primary" id="basic-addon1">
                            <i class="fa fa-info-circle text-white"></i>
                        </span>
                    </div>
                    <span class="card card-body p-2">Lupa password akun? Kami akan mengirim ke email anda</span>
                </div>
                <div class="card card-body shadow-sm">
                    <center class="mb-4">
                        <h4>Lupa Password</h4>
                    </center>
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-12 col-lg-7 mb-4">
                            <input type="text" name="email" class="form-control mb-4" placeholder="Email">
                            <button class="btn bg-website text-white btn-block mb-3">Reset Password</button>
                            <a href="login.html">Login</a>
                            <a href="mendaftar.html" class="float-right">Belum punya akun?</a>
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