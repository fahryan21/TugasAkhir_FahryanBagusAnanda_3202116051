<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Include CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/sb-admin-2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <style>
        body {
            background-color: #f8f9fa;
            color: #495057;
        }
        .container {
            max-width: 900px;
            margin-top: 30px;
        }
        h2 {
            color: #343a40;
        }
        .form-control {
            border-radius: .25rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .alert {
            border-radius: .25rem;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            padding: 20px;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand {
            color: #ffffff;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
        }
        .navbar-nav .nav-link:hover {
            color: #e2e6ea;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-white">Admin Dashboard</h4>
        <a href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
        <a href="<?= base_url('admin/user-management') ?>">User Management</a>
        <a href="<?= base_url('admin/settings') ?>">Settings</a>
        <!-- Add more links as needed -->
    </div>

    <!-- Page Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-light">
            <a class="navbar-brand" href="#">Dashboard</a>
        </nav>

        <div class="container mt-4">
            <h2>Edit User</h2>
            <?php if (session()->getFlashdata('validation')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('validation')['username'] ?? '' ?>
                    <?= session()->getFlashdata('validation')['nama_lengkap'] ?? '' ?>
                    <?= session()->getFlashdata('validation')['email'] ?? '' ?>
                    <?= session()->getFlashdata('validation')['alamat'] ?? '' ?>
                    <?= session()->getFlashdata('validation')['nomor_hp'] ?? '' ?>
                    <?= session()->getFlashdata('validation')['password'] ?? '' ?>
                    <?= session()->getFlashdata('validation')['role'] ?? '' ?>
                </div>
            <?php endif; ?>
            <?= $this->include('template/sidebarA') ?>
            <form action="<?= base_url('admin/user-management/update/' . $user['id_user']); ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= old('username', $user['username']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap', $user['nama_lengkap']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email', $user['email']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= old('alamat', $user['alamat']); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?= old('nomor_hp', $user['nomor_hp']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password (kosongkan jika tidak ingin diubah)</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="admin" <?= old('role', $user['role']) == 'admin' ? 'selected' : ''; ?>>Admin</option>
                        <option value="user" <?= old('role', $user['role']) == 'user' ? 'selected' : ''; ?>>User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>

    <!-- Include JS Files -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js') ?>"></script>
</body>
</html>
