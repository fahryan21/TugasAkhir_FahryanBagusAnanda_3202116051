<?php

namespace App\Controllers;

use App\Models\PemesananModel; // Pastikan model yang digunakan sesuai dengan tabel transaksi Anda
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Transaction; // Tambahkan di bagian atas file

class PaymentController extends BaseController
{
    protected $pemesananModel;

    public function __construct()
    {
        $this->pemesananModel = new PemesananModel();

        // Konfigurasi Midtrans
        Config::$serverKey = 'SERVER_KEY_MIDTRANS_ANDA';
        Config::$isProduction = false; // Ubah ke true jika di lingkungan produksi
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    // Menampilkan riwayat transaksi
    public function riwayatTransaksi()
    {
        $userId = session()->get('user_id'); // Ambil ID pengguna dari sesi
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        // Ambil transaksi berdasarkan user_id dari database
        $transaksi = $this->pemesananModel->where('user_id', $userId)->findAll();

        // Periksa status setiap transaksi dengan API Midtrans
        foreach ($transaksi as &$item) {
            $midtransStatus = Snap::status($item['order_id']); // Memanggil API Midtrans
            $item['status_pembayaran'] = $midtransStatus->transaction_status;
        }

        // Kirim data transaksi ke view
        return view('riwayat_transaksi', [
            'transaksi' => $transaksi
        ]);
    }

    // Callback dari Midtrans
    public function callback()
    {
        // Baca data dari callback Midtrans
        $json = file_get_contents('php://input');
        $data = json_decode($json);

        // Contoh: Simpan data ke database
        $updateData = [
            'status_pembayaran' => $data->transaction_status,
            'order_id' => $data->order_id,
            'jumlah_pembayaran' => $data->gross_amount,
            'metode_pembayaran' => $data->payment_type,
            'waktu_pembayaran' => date('Y-m-d H:i:s', strtotime($data->transaction_time)),
        ];

        $this->pemesananModel->updateOrderStatus($data->order_id, $updateData);

        // Berikan respons ke Midtrans
        return $this->response->setJSON(['status' => 'success']);
    }
}
