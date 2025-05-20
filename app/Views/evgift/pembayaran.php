<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css'); ?>">
    <title>Pembayaran - The Evgift</title>
    

    <style>
        .garis {
            border-top: 2px solid #f0f0f0;
        }
    </style>
</head>
<body class="bg-light">
    <?= $this->include('template/navbar'); ?>

    <div class="nav-scroller bg-white shadow-sm">
        <div class="container-fluid pt-2 pb-2">
            <a href="<?= base_url(); ?>">Halaman Utama</a> > Konfirmasi Pembayaran
        </div>
    </div>

    <div class="container my-5">
        <div class="card card-body shadow-sm mb-4">
            <center class="mb-4">
                <div class="h5 text-website">
                <?php if (session()->getFlashdata('validation')): ?>
                    <div class="alert alert-danger">
                        <?php foreach (session()->getFlashdata('validation') as $error): ?>
                            <p><?= esc($error) ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif; ?>
                    Selamat Pesanan Anda berhasil, tinggal selangkah lagi<br />
                    Segera lakukan pembayaran pesanan anda ke rekening kami.
                </div>
                <hr class="garis">
                <div class="h6 text-website">
                    <p>Lakukan Konfirmasi transfer Anda agar proses cepat dilakukan.</p>
                    <div class="h5 text-website">No. Pesanan : <?= $no_pemesanan; ?></div>
                </div>
            </center>
            <form action="<?= base_url('evgift/simpanPembayaran'); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="row d-flex justify-content-center mb-4">
        <div class="col-sm-12 col-lg-8">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <input type="text" name="no_pemesanan" class="form-control mb-4" placeholder="No. Pemesanan" value="<?= $no_pemesanan; ?>" readonly>
                    <input type="text" name="nama" class="form-control mb-4" placeholder="Nama Pengirim">
                    <input type="text" name="bank_asal" class="form-control mb-4" placeholder="Bank Asal">
                    <input type="text" name="bank_tujuan" class="form-control mb-4" placeholder="Bank Tujuan">
                </div>
                <div class="col-sm-12 col-lg-6">
                    <input type="number" name="jumlah" class="form-control mb-4" placeholder="Jumlah Pembayaran">
                    <input type="file" name="bukti_transfer" class="form-control mb-4">
                    <textarea name="catatan" class="form-control" placeholder="Catatan"></textarea>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-8">
            <button type="submit" class="btn btn-primary w-100">Konfirmasi Pembayaran</button>
        </div>
    </div>
</form>

        </div>
    </div>

    <?= $this->include('template/footer'); ?>
    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script>
        function validateForm() {
            var nama = document.getElementById('nama').value;
            var bankAsal = document.getElementById('bank_asal').value;
            var bankTujuan = document.getElementById('bank_tujuan').value;
            var jumlah = document.getElementById('jumlah').value;
            var tanggal = document.getElementById('tanggal').value;

            if (!nama || !bankAsal || !bankTujuan || !jumlah || !tanggal) {
                alert("Semua field kecuali catatan harus diisi.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
