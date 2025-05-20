<?php 
namespace App\Controllers;

use App\Models\PemesananModel;

class RiwayatController extends BaseController
{
    public function index()
    {
        // Ambil ID pengguna dari session
        $session = session();
        $userId = $session->get('user_id'); // Pastikan user_id ada dalam session

        // Inisialisasi model Pemesanan
        $pemesananModel = new PemesananModel();
        
        // Ambil riwayat pembelian dari database
        $riwayatPembelian = $pemesananModel->getRiwayatPembelian($userId);

        // Ambil status transaksi dari Midtrans untuk setiap pemesanan
        $serverKey = 'your-server-key'; // Ganti dengan server key Anda
        foreach ($riwayatPembelian as &$order) {
            $transactionId = $order['nomor_pemesanan']; // Ambil nomor pemesanan atau id transaksi
            $status = $this->getMidtransTransactionStatus($transactionId, $serverKey);
            $order['status_transaksi'] = $status['transaction_status']; // Menyimpan status transaksi di array
        }

        // Kirim data riwayat pembelian beserta status transaksi ke tampilan
        return view('riwayat_pembelian', [
            'riwayatPembelian' => $riwayatPembelian
        ]);
    }

    // Fungsi untuk mengambil status transaksi dari Midtrans
    private function getMidtransTransactionStatus($transactionId, $serverKey)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.midtrans.com/v2/' . $transactionId . '/status'); // URL API Midtrans
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode($serverKey . ':') // Autentikasi menggunakan server key
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        // Mengembalikan hasil respons API dalam bentuk array
        return json_decode($response, true);
    }
}
