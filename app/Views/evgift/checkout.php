<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css') ?>">
    <title>Checkout</title>
    <style>
        body {
            background: url('<?= base_url('assets/img/backg.jpg') ?>') no-repeat center center fixed !important;
            background-size: cover !important;
        }
        .checkout-title {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            text-align: center;
            margin-bottom: 40px;
        }
        .cart-summary, .customer-info {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgb(0, 0, 0);
            padding: 20px;
        }
        .payment-button {
            background-color: #28a745;
            color: white;
            font-size: 1.25rem;
            padding: 12px;
            border-radius: 8px;
            text-transform: uppercase;
            border: none;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .payment-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <?= $this->include('template/navbar'); ?>
        <br><br><br><br><br>
        <h2 class="checkout-title">Checkout</h2>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="cart-summary">
                        <h5>Keranjang Belanja</h5>
                        <ul class="list-group">
                            <?php foreach ($keranjang as $item): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong><?= esc($item['nama_produk']) ?></strong> <br>
                                        <small class="text-muted"><?= esc($item['kuantitas']) ?> x <?= esc(number_format($item['harga'], 2)) ?></small>
                                    </div>
                                    <div class="font-weight-bold">
                                        <?= esc(number_format($item['harga'] * $item['kuantitas'], 2)) ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="total-price">
                            <strong>Total: <?= esc(number_format($total, 2)) ?></strong>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="customer-info">
                        <h5>Informasi Pemesan</h5>
                        <p><strong>Nama:</strong> <?= esc(session()->get('nama_lengkap')) ?></p>
                        <p><strong>Alamat:</strong> <?= esc(session()->get('alamat')) ?></p>
                        <p><strong>Telepon:</strong> <?= esc(session()->get('nomor_hp')) ?></p>
                        <p><strong>Email:</strong> <?= esc(session()->get('email')) ?></p>
                    </div>

                    <form id="payment-form" method="POST" action="<?= site_url('retur/simpanPembayaran') ?>" class="mt-4">
                        <input type="hidden" name="snap_token" value="<?= esc($snapToken) ?>">
                        <button type="submit" class="payment-button">Bayar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-kfRg10jN7piWKnOx"></script>
    <script>
document.getElementById('payment-form').addEventListener('submit', function (e) {
    e.preventDefault();
    let namaPelanggan = "<?= session()->get('nama_lengkap') ?>";
    let nomorHP = "<?= session()->get('nomor_hp') ?>";
    let totalHarga = "<?= number_format($total, 2) ?>";
    let daftarProduk = <?php echo json_encode($keranjang); ?>;
    let nomorAdmin = "6285346364756"; // Ganti dengan nomor admin

    snap.pay(document.querySelector('input[name="snap_token"]').value, {
        onSuccess: function (result) {
            console.log(result);

            let pesanWA = `Halo, saya telah melakukan pembayaran untuk pesanan berikut:\n`;
            daftarProduk.forEach(item => {
                pesanWA += `- ${item.nama_produk} x ${item.kuantitas} = Rp ${parseFloat(item.harga * item.kuantitas).toFixed(2)}\n`;
            });
            pesanWA += `Total: Rp ${totalHarga}\nNama: ${namaPelanggan}\nNomor HP: ${nomorHP}\n`;
            pesanWA += `Order ID: ${result.order_id}`;

            let linkWA = `https://wa.me/${nomorAdmin}?text=${encodeURIComponent(pesanWA)}`;
            alert("Pembayaran berhasil! Mengarahkan ke WhatsApp...");
            window.open(linkWA, '_blank');

            // Redirect ke halaman utama setelah 2 detik
setTimeout(function () {
    window.location.href = "<?= base_url('/') ?>";
}, 2000);
        },
        onPending: function (result) {
            console.log(result);
            alert("Pembayaran masih dalam proses. Silakan cek status pembayaran Anda.");
        },
        onError: function (result) {
            console.log(result);
            alert("Terjadi kesalahan saat melakukan pembayaran. Silakan coba lagi.");
        }
    });
});
</script>


</body>
</html>
