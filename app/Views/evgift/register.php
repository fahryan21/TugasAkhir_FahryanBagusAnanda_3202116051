<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: url('assets/img/backg.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .register-container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .form-group {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        .text-center a {
            font-size: 14px;
            color: #2575fc;
        }
    </style>
</head>

<body>

    <div class="register-container">
        <h2 class="text-center mb-4">Register</h2>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?= implode('<br>', session()->getFlashdata('errors')) ?>
            </div>
        <?php endif; ?>
        <form action="<?= site_url('register/submit') ?>" method="post" onsubmit="return validateForm()" novalidate>
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required minlength="6">
                    <div class="input-group-append">
                        <span class="input-group-text toggle-password" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="password_confirm">Konfirmasi Password</label>
                <div class="input-group">
                    <input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="Konfirmasi Password" required>
                    <div class="input-group-append">
                        <span class="input-group-text toggle-password" onclick="togglePassword('password_confirm')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group">
                <label for="nomor_hp">Nomor HP</label>
                <input type="text" id="nomor_hp" name="nomor_hp" class="form-control" placeholder="081234567890" pattern="^08[0-9]{8,11}$" required>
                <small class="text-muted">Format: 08xxxxxxxxxx (tanpa spasi)</small>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <p class="text-center mt-3"><a href="<?= site_url('login') ?>">Sudah punya akun? Login</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function togglePassword(id) {
            var input = document.getElementById(id);
            var icon = input.nextElementSibling.querySelector('i');
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }

        function validateForm() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('password_confirm').value;
            if (password !== confirmPassword) {
                alert("Password dan konfirmasi password tidak cocok.");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
