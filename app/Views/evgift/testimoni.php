<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kontak Kami - The Evgift</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap">
    
    <!-- Bootstrap & FontAwesome -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/css/aos.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/icon.png') ?>">

    <style>
        /* Efek Animasi */
        [data-aos] {
            transition: all 0.6s ease-in-out;
        }

        /* Header */
        header h1 {
            margin-top: 20px;
            margin-bottom: 40px;
            font-size: 2.5rem;
            color: #4caf50;
        }

        /* Social Icons */
        .social-icons i {
            font-size: 2em;
            transition: 0.3s;
        }

        .social-icons i:hover {
            transform: scale(1.2);
            transition: 0.3s;
        }

        /* Map Hover Effect */
        iframe {
            transition: transform 0.3s ease-in-out;
        }

        iframe:hover {
            transform: scale(1.02);
        }

        /* Floating WhatsApp Button */
        .wa-floating {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #25D366;
            padding: 12px;
            border-radius: 50%;
            box-shadow: 2px 2px 10px rgba(0,0,0,0.2);
        }

        .wa-floating i {
            font-size: 24px;
            color: white;
        }

        .wa-floating:hover {
            transform: scale(1.1);
            background: #1eb742;
        }
    </style>
</head>

<body class="bg-light">
    <?= $this->include('template/navbar'); ?>

    <!-- Navigasi -->
    <div class="nav-scroller bg-white shadow-sm">
        <div class="container-fluid pt-2 pb-2">
            <a href="./">Halaman Utama</a> > About Us
        </div>
    </div>

    <!-- Header -->
    <header class="text-center" data-aos="fade-up">
        <br>
        <br>
        <h1>📍Tentang Kami📍</h1>
    </header>

    <!-- Peta Google -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center" data-aos="zoom-in">
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1651.6073084391078!2d109.40190114008291!3d-0.10156196417395788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMMKwMDYnMDQuNSJTIDEwOcKwMjQnMDguMiJF!5e1!3m2!1sid!2sid!4v1722316393475!5m2!1sid!2sid" 
                    width="100%" 
                    height="500" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <!-- Media Sosial -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 text-center" data-aos="fade-up">
                <h5>Ikuti Kami di Sosial Media</h5>
                <p class="social-icons">
                    <a href="https://www.instagram.com/the.evgift" class="text-dark" target="_blank">
                        <i class="fab fa-instagram instagram"></i>
                    </a>
                    &nbsp;|&nbsp;
                    <a href="https://wa.me/+6285346364756" class="text-dark" target="_blank">
                        <i class="fab fa-whatsapp whatsapp"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>

    <!-- Sejarah -->
    <div class="container">
        <h5 class="text-website mt-5" data-aos="fade-left">Sejarah The Evgift</h5>
        <hr class="garis-full">

        <div class="my-5">
            <div class="row">
                <div class="col-sm-12" data-aos="fade-up">
                    <p>
                        Toko The Evgift didirikan pada tahun 2021 dengan visi untuk menyediakan produk-produk bouquet dan hampers
                        berkualitas yang dapat memuaskan para pelanggannya. Seiring dengan perkembangan e-commerce,
                        The Evgift juga meluncurkan platform belanja online yang memungkinkan pelanggan untuk membeli 
                        produk bouquet secara mudah dan cepat melalui website resmi. Dengan komitmen terhadap kualitas dan 
                        kepuasan pelanggan, The Evgift terus berinovasi dan menawarkan berbagai produk bunga yang sesuai dengan tren terbaru.
                    </p>
                    <p>
                        The Evgift bangga menjadi bagian dari momen-momen spesial pelanggan, baik itu wisuda,
                        ulang tahun, atau acara penting lainnya. Dengan dedikasi dan kerja keras, toko ini terus
                        bertumbuh dan menjadi salah satu penyedia produk terkemuka di Indonesia.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating WhatsApp -->
    <a href="https://wa.me/+6285346364756" class="wa-floating" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <?= $this->include('template/footer'); ?>

    <!-- JavaScript Libraries -->
    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/aos.js') ?>"></script>

    <!-- Script Animasi -->
    <script>
        AOS.init();
    </script>
</body>
</html>
