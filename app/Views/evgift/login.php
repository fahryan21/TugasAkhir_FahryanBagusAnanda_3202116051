<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
      
        body {
            margin: 0;
            height: 100vh;
            background: url('assets/img/backg.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: auto;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        .brand-text {
            font-size: 3rem;
            color: white;
            font-weight: bold;
            text-align: center;
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
        
    </style>
</head>
<body>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5 text-center">
        <div class="brand-text">THE EVGIFT</div>
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 login-container">
      <h2 class="text-center login-title">Login</h2>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('login/submit') ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-outline mb-4">
        <input type="text" id="username" name="username" class="form-control form-control-lg" required>
        <label class="form-label" for="username">Username</label>
    </div>
    <div class="form-outline mb-3">
        <input type="password" id="password" name="password" class="form-control form-control-lg" required>
        <label class="form-label" for="password">Password</label>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <div class="form-check mb-0">
            <input class="form-check-input me-2" type="checkbox" value="" id="rememberMe" />
            <label class="form-check-label" for="rememberMe">
                Remember me
            </label>
        </div>
        <a href="#!" class="text-body">Forgot password?</a>
    </div>
    <div class="text-center text-lg-start mt-4 pt-2">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
        <p class="small fw-bold mt-2 pt-1 mb-0">Belum punya akun? <a href="<?= base_url('register') ?>"
            class="link-danger">Daftar sekarang</a></p>
    </div>
</form>
      </div>
    </div>
  </div>
  <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2024 All rights reserved.
    </div>
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <!-- <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a> -->
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>