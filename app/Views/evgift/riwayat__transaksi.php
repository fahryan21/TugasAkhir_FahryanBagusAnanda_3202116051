<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <title>Riwayat Transaksi</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            background: url('<?= base_url('assets/img/backg.jpg') ?>') no-repeat center center fixed;
            background-size: cover;
        }
        .riwayat-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 960px;
            margin: 50px auto;
        }
        h2 {
            font-size: 2rem;
            color: #343a40;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .transaksi-summary {
            border: 1px solid #dee2e6;
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 0.375rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="riwayat-container">
        <?= $this->include('template/navbar'); ?>
        <h2>Riwayat Transaksi</h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="transaksi-summary">
                    <h5>Daftar Transaksi</h5>
                    <?php if (!empty($transaksi)): ?>
                        <ul class="list-group">
                            <?php foreach ($transaksi as $item): ?>
                                <li class="list-group-item">
                                    <div>
                                        <strong>Order ID: <?= esc($item['order_id']) ?></strong> <br>
                                        <small class="text-muted">Status: <?= esc($item['transaction_status']) ?></small>
                                    </div>
                                    <div>
                                        <strong>Nama Pemesan: <?= esc($item['nama_pelanggan']) ?></strong><br>
                                        <strong>Total Pembayaran: Rp<?= esc(number_format($item['gross_amount'], 2)) ?></strong>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-center">Tidak ada riwayat transaksi untuk ditampilkan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
