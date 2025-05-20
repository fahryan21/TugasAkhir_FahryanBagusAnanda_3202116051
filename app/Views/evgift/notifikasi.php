<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Notifikasi</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Notifikasi</h1>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Order ID</th>
                    <th>Status Pembayaran</th>
                    <th>Waktu Notifikasi</th>
                    <th>Payload</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($notifikasi)) : ?>
                    <?php foreach ($notifikasi as $key => $item) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= esc($item['order_id']); ?></td>
                            <td><?= esc($item['status_pembayaran']); ?></td>
                            <td><?= esc($item['waktu_notifikasi']); ?></td>
                            <td>
                                <pre><?= esc($item['payload']); ?></pre>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data notifikasi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
