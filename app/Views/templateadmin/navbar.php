<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS (optional) -->
    <style>
        .bg-website {
            background-color: #343a40;

            /* Ganti dengan warna latar belakang yang sesuai */
            .nav {
                position: fixed;
            }

            .dropdown-content {
                position: fixed;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-website sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar">
                <div>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <a class="navbar-brand active" href="<?= base_url() ?>">The Evgift</a>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('/evgift/kategori') ?>">Kategori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('/evgift/produk') ?>">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('/evgift/pemesanan') ?>">Pemesanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('testimoni') ?>">About Us</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('notifikasi') ?>">
                                    <i class="fa fa-bell fa-1-5x"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('keranjang') ?>">
                                    <i class="fa fa-shopping-basket fa-1-5x"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle fa-1-5x"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?= base_url('login') ?>">Login</a>
                                    <a class="dropdown-item" href="<?= base_url('mendaftar') ?>">Mendaftar</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('profil') ?>">Profil</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
    </nav>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>