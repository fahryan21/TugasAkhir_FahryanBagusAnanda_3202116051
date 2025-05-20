<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Floral Theme</title>
    
    <!-- Google Fonts (Floral Theme) -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        @font-face {
            font-family: 'LovelyHome';
            src: url('assets/fonts/LovelyHome.ttf') format('truetype');
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('assets/images/flower-bg.jpg'); /* Background bunga */
            background-size: cover;
            background-attachment: fixed;
        }

        .bg-website {
            background: linear-gradient(135deg, #ffb6c1, #ff69b4); /* Warna pink floral */
        }

        .navbar-brand {
            font-family: 'Great Vibes', cursive;
            font-size: 2rem;
            font-weight: bold;
            color: white !important;
        }

        .nav-link {
            font-family: 'LovelyHome', sans-serif;
            font-size: 1.2rem;
            font-weight: 400;
            transition: color 0.3s ease-in-out;
            color: white !important;
        }

        .nav-link:hover {
            color: #fef2f4 !important;
        }

        @media (min-width: 992px) {
            .nav-item.dropdown:hover .dropdown-menu {
                display: block;
                margin-top: 0;
            }
        }

        .dropdown-menu {
            background: #ffe4e1; /* Warna floral lembut */
        }

        .dropdown-item {
            font-family: 'LovelyHome', sans-serif;
            color: #d63384;
        }

        .dropdown-item:hover {
            background: #ff69b4;
            color: white;
        }

        .icon-nav {
            color: white;
            transition: color 0.3s ease-in-out;
        }

        .icon-nav:hover {
            color: #ffe4e1;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-website fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url() ?>">Evgift</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="kategoriDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kategori
                        </a>
                        <div class="dropdown-menu" aria-labelledby="kategoriDropdown">
                            <a class="dropdown-item" href="<?= base_url('/evgift/bouquet') ?>">Bouquet</a>
                            <a class="dropdown-item" href="<?= base_url('/evgift/hampers') ?>">Hampers</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/evgift/testimoni') ?>">Tentang Kami</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link icon-nav" href="<?= base_url('/evgift/riwayat_transaksi') ?>">
                            <i class="fa fa-bell fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link icon-nav" href="<?= base_url('/evgift/keranjang') ?>">
                            <i class="fa fa-shopping-basket fa-lg"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link icon-nav" href="https://wa.me/+6285346364756" target="_blank">
                            <i class="fab fa-whatsapp fa-lg"></i>
                        </a>
                    </li>

                    <?php if (session()->get('user_id')): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle icon-nav" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle fa-lg"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url('profil') ?>">Profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link icon-nav" href="<?= base_url('login') ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-nav" href="<?= base_url('register') ?>">Mendaftar</a>
                        </li>
                    <?php endif; ?>
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
