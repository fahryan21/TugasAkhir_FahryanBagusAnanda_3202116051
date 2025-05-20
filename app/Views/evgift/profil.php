<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <title>Profil - <?= esc($user['nama_lengkap']) ?></title>
</head>
<body class="bg-light">
    <?= $this->include('template/navbar'); ?>

    <div class="nav-scroller bg-white shadow-sm">
        <div class="container-fluid pt-2 pb-2">
            <a href="<?= base_url('/') ?>">Halaman Utama</a> > Profil
        </div>
    </div>

    <div class="container my-5">
        <div class="card card-body shadow-sm mb-4">
            <h5 class="card-title">Ringkasan Profil</h5>
            <div class="media">
                <i class="fa fa-user-circle fa-3x mr-3"></i>
                <div class="media-body">
                    <h5 class="mt-0"><?= esc($user['nama_lengkap']) ?></h5>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td><?= esc($user['username']) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><?= esc($user['email']) ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Telepon</td>
                                        <td>:</td>
                                        <td><?= esc($user['nomor_hp']) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= esc($user['alamat']) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h5 class="card-title">Lengkapi Data Diri</h5>
            <form action="<?= base_url('evgift/updateProfile') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control mb-4" value="<?= esc($user['username']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control mb-4" value="<?= esc($user['nama_lengkap']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea id="alamat" class="form-control mb-4" name="alamat" required><?= esc($user['alamat']) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" id="email" name="email" class="form-control mb-4" value="<?= esc($user['email']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Nomor Telepon</label>
                            <input type="text" id="nomor_hp" name="nomor_hp" class="form-control" value="<?= esc($user['nomor_hp']) ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password Baru">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Konfirmasi Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control mb-4" placeholder="Konfirmasi Password">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Perbarui Profil</button>
            </form>
        </div>
    </div>

    <?= $this->include('template/footer'); ?>
    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>
