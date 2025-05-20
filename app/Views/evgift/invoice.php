<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - <?= $invoice['id_pemesanan']; ?></title>
</head>
<body>
    <h1>Invoice Pemesanan</h1>
    <p><strong>ID Pemesanan:</strong> <?= $invoice['id_pemesanan']; ?></p>
    <p><strong>Nama Pelanggan:</strong> <?= $invoice['nama_pelanggan']; ?></p>
    <p><strong>Tanggal Pemesanan:</strong> <?= $invoice['tanggal_pemesanan']; ?></p>
    <p><strong>Total Pembayaran:</strong> <?= number_format($invoice['total'], 0, ',', '.'); ?></p>
</body>
</html>
