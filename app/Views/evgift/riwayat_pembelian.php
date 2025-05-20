<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian</title>
    <!-- Tambahkan CSS dan JS jika diperlukan -->
</head>
<body>

<h2>Riwayat Pembelian</h2>

<table border="1">
    <thead>
        <tr>
            <th>No. Invoice</th>
            <th>Nama Pelanggan</th>
            <th>Produk</th>
            <th>Tanggal Pemesanan</th>
            <th>Jumlah</th>
            <th>Status Pembayaran</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($riwayatPembelian)): ?>
            <?php foreach ($riwayatPembelian as $item): ?>
                <tr>
                    <td><?= $item['id_pemesanan']; ?></td>
                    <td><?= $item['nama_pelanggan']; ?></td>
                    <td><?= $item['id_produk']; ?> (Produk terkait)</td> <!-- Tampilkan nama produk -->
                    <td><?= date('d-m-Y', strtotime($item['tanggal_pemesanan'])); ?></td>
                    <td><?= $item['kuantitas']; ?></td>
                    <td><?= $item['status_pemesanan']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Belum ada riwayat pembelian.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
