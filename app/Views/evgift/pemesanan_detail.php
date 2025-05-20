<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        h1, h2 {
            color: #333;
        }
        .image-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .image-grid img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }
        .image-grid .image-item {
            background: #fff;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            flex: 1 1 calc(25% - 15px);
        }
        .image-grid .image-item p {
            margin: 10px 0 0;
            font-size: 14px;
            color: #555;
        }
        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Pemesanan</h1>
        
        <h2>Informasi Pemesanan</h2>
        <p><strong>ID Pemesanan:</strong> <?= $pemesanan['id_pemesanan'] ?></p>
        <p><strong>Nama Pelanggan:</strong> <?= $pemesanan['nama_pelanggan'] ?></p>
        <p><strong>Tanggal Pemesanan:</strong> <?= $pemesanan['tanggal_pemesanan'] ?></p>
        <p><strong>Kuantitas:</strong> <?= $pemesanan['kuantitas'] ?></p>
        <p><strong>Status Pemesanan:</strong> <?= $pemesanan['status_pemesanan'] ?></p>
        
        <h2>Informasi Produk</h2>
        <p><strong>Nama Produk:</strong> <?= $produk['nama_produk'] ?></p>

        <h2>Gambar Produk</h2>
        <div class="image-grid">
            <div class="image-item">
                <img src="<?= base_url('uploads/' . $produk['gambar_produk']) ?>" alt="<?= $produk['nama_produk'] ?>">
                <p><?= $produk['nama_produk'] ?></p>
            </div>
        </div>

        <h2>Informasi Pembayaran</h2>
        <?php if ($pembayaran): ?>
            <p><strong>Nomor Pembayaran:</strong> <?= $pembayaran['id_pembayaran'] ?></p>
            <p><strong>Jumlah Pembayaran:</strong> <?= 'IDR ' . number_format($pembayaran['jumlah_pembayaran'], 2, ',', '.') ?></p>
            <p><strong>Dari Bank:</strong> <?= $pembayaran['dari_bank'] ?></p>
            <p><strong>Ke Bank:</strong> <?= $pembayaran['ke_bank'] ?></p>
            <p><strong>Tanggal Pembayaran:</strong> <?= $pembayaran['tanggal_pembayaran'] ?></p>
            <p><strong>Bukti Pembayaran:</strong> 
                <?php if ($pembayaran['bukti']): ?>
                    <img src="<?= base_url('uploads/' . $pembayaran['bukti']) ?>" alt="Bukti Pembayaran">
                <?php else: ?>
                    Tidak ada bukti pembayaran
                <?php endif; ?>
            </p>
            <p><strong>Catatan:</strong> <?= $pembayaran['catatan'] ?? 'Tidak ada catatan' ?></p>
        <?php else: ?>
            <p>Informasi pembayaran tidak tersedia.</p>
        <?php endif; ?>

        <h2>Tracking</h2>
        <p><strong>Link Tracking:</strong> <a href="<?= $pemesanan['link_tracking'] ?>" target="_blank"><?= $pemesanan['link_tracking'] ?></a></p>
        <p><strong>Histori Pengiriman:</strong> <?= $pemesanan['histori_pengiriman'] ?? 'Belum ada histori' ?></p>
    </div>
</body>
</html>

