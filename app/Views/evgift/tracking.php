<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css'); ?>">
    <title>Tracking Pembayaran - The Evgift</title>
</head>
<body class="bg-light">
    <?= $this->include('template/navbar'); ?>

    <div class="nav-scroller bg-white shadow-sm">
        <div class="container-fluid pt-2 pb-2">
            <a href="<?= base_url(); ?>">Halaman Utama</a> > Tracking Pembayaran
        </div>
    </div>

    <div class="container my-5">
        <div class="card card-body shadow-sm mb-4">
            <h5 class="card-title">Tracking Pembayaran</h5>

            <!-- Form untuk Mencari Pembayaran -->
            <form action="<?= base_url('evgift/tracking'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="no_pemesanan">No. Pemesanan</label>
                    <input type="text" name="no_pemesanan" id="no_pemesanan" class="form-control" value="<?= isset($no_pemesanan) ? esc($no_pemesanan) : ''; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Cari Pembayaran</button>
            </form>

            <hr>

            <!-- Menampilkan Data Pembayaran -->
            <h5>Gambar Pembayaran yang Telah Diupload</h5>
            <?php if (isset($pembayaran) && !empty($pembayaran)): ?>
                <?php if (is_array($pembayaran)): ?>
                    <?php if (count($pembayaran) > 0): ?>
                        <div class="row">
                            <?php foreach ($pembayaran as $item): ?>
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <!-- Menampilkan Gambar Bukti Pembayaran -->
                                        <?php if (!empty($item['bukti'])): ?>
                                            <img src="<?= base_url('uploads/' . esc($item['bukti'])); ?>" class="card-img-top" alt="Bukti Pembayaran">
                                        <?php else: ?>
                                            <p class="card-text">Tidak ada gambar.</p>
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <!-- Menampilkan Detail Pembayaran -->
                                            <h5 class="card-title"><?= esc($item['nama_pelanggan'] ?? 'Nama tidak ditemukan'); ?></h5>
                                            <p class="card-text">No. Pemesanan: <?= esc($item['no_pemesanan'] ?? ''); ?></p>
                                            <p class="card-text">Jumlah Pembayaran: <?= esc($item['jumlah_pembayaran'] ?? ''); ?></p>
                                            <p class="card-text">Tanggal Pembayaran: <?= esc($item['tanggal_pembayaran'] ?? ''); ?></p>
                                            <p class="card-text">Catatan: <?= esc($item['catatan'] ?? ''); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p>Belum ada pembayaran yang diupload.</p>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- Jika $pembayaran bukan array tetapi sebuah item tunggal -->
                    <?php $item = $pembayaran; ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <!-- Menampilkan Gambar Bukti Pembayaran -->
                                <?php if (!empty($item['bukti'])): ?>
                                    <img src="<?= base_url('uploads/' . esc($item['bukti'])); ?>" class="card-img-top" alt="Bukti Pembayaran">
                                <?php else: ?>
                                    <p class="card-text">Tidak ada gambar.</p>
                                <?php endif; ?>
                                <div class="card-body">
                                    <!-- Menampilkan Detail Pembayaran -->
                                    <h5 class="card-title"><?= esc($item['nama_pelanggan'] ?? 'Nama tidak ditemukan'); ?></h5>
                                    <p class="card-text">No. Pemesanan: <?= esc($item['no_pemesanan'] ?? ''); ?></p>
                                    <p class="card-text">Jumlah Pembayaran: <?= esc($item['jumlah_pembayaran'] ?? ''); ?></p>
                                    <p class="card-text">Tanggal Pembayaran: <?= esc($item['tanggal_pembayaran'] ?? ''); ?></p>
                                    <p class="card-text">Catatan: <?= esc($item['catatan'] ?? ''); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <p>Belum ada pembayaran yang diupload.</p>
            <?php endif; ?>
        </div>
    </div>

    <?= $this->include('template/footer'); ?>
    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>
</html>
