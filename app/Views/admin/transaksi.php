<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/sb-admin-2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Transaksi - Admin The Evgift</title>
</head>

<body id="page-top">

    <div id="wrapper">
        <?= $this->include('template/sidebarA') ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?= $this->include('template/navbar') ?>

                <!-- konten admin -->
                <div class="container-fluid">
                    <div class="text-website b mb-5">
                        <h5 class="text-website mt-5">Pemesanan</h5>
                        <hr class="garis-full">
                    </div>

                    <div class="card card-body shadow-sm">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Detail Transaksi</th>
                                        <th>Quantity</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Ongkir</th>
                                        <th>Grand&nbsp;Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($transactions)) : ?>
                                        <?php foreach ($transactions as $transaction) : ?>
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <img src="<?= base_url('assets/img/produk/' . $transaction['image']) ?>" width="60" class="mr-2">
                                                        <div class="media-body">
                                                            <b><?= esc(isset($transaction['customer_name']) ? $transaction['customer_name'] : 'N/A') ?></b><br />
                                                            <?= esc(isset($transaction['product_name']) ? $transaction['product_name'] : 'N/A') ?><br />
                                                            <span class="badge bg-website text-white"><?= esc(isset($transaction['product_code']) ? $transaction['product_code'] : 'N/A') ?></span> |
                                                            <span class="badge bg-primary text-white"><?= esc(isset($transaction['order_number']) ? $transaction['order_number'] : 'N/A') ?></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?= esc(isset($transaction['quantity']) ? $transaction['quantity'] : 0) ?>x</td>
                                                <td>Rp<?= number_format(isset($transaction['price']) ? $transaction['price'] : 0, 0, ',', '.') ?></td>
                                                <td>Rp<?= number_format(isset($transaction['total']) ? $transaction['total'] : 0, 0, ',', '.') ?></td>
                                                <td>Rp<?= number_format(isset($transaction['shipping']) ? $transaction['shipping'] : 0, 0, ',', '.') ?></td>
                                                <td>Rp<?= number_format(isset($transaction['grand_total']) ? $transaction['grand_total'] : 0, 0, ',', '.') ?></td>
                                                <td>
                                                    <span class="badge badge-<?= isset($transaction['status_class']) ? $transaction['status_class'] : 'secondary' ?>"><?= esc(isset($transaction['status']) ? $transaction['status'] : 'N/A') ?></span>
                                                    <a href="<?= base_url('transaksi/detail/' . (isset($transaction['id']) ? $transaction['id'] : '')) ?>" class="badge badge-primary text-white mt-2">Lihat Detail</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data transaksi</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <nav class="d-flex justify-content-center mt-4">
                            <?php if (isset($pager)) : ?>
                                <?= $pager->links() ?>
                            <?php else : ?>
                                <p>Tidak ada data untuk dipaginasi.</p>
                            <?php endif; ?>
                        </nav>
                    </div>
                </div>
                <!-- konten admin -->
            </div>
            <div class="mt-5"></div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/sb-admin-2.min.js') ?>"></script>
</body>

</html>