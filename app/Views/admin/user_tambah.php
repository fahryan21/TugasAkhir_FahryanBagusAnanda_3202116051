<!-- File: app/Views/admin/user_tambah.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/sb-admin-2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <title>Tambah Pengguna - Admin</title>
</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <?= $this->include('template/sidebarA') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <div class="container-fluid">
                    <h3 class="mb-4">Tambah Pengguna Baru</h3>

                    <?php if (isset($validation)): ?>
                        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                    <?php endif; ?>

                    <form action="<?= site_url('admin/simpan-user') ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?= set_value('username') ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="<?= set_value('nama_lengkap') ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?= set_value('email') ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= set_value('alamat') ?>">
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Nomor HP</label>
                            <input type="text" name="nomor_hp" class="form-control" id="nomor_hp" value="<?= set_value('nomor_hp') ?>">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="user" <?= set_select('role', 'user') ?>>User</option>
                                <option value="admin" <?= set_select('role', 'admin') ?>>Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="btn bg-website text-white">Simpan Pengguna</button>
                    </form>

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
