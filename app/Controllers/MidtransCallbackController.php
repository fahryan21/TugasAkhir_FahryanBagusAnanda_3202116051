<?php
// File: app/Controllers/MidtransCallbackController.php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PembayaranModel;

class MidtransCallbackController extends Controller
{
    public function callback()
    {
        $json = $this->request->getBody();  // Mendapatkan body dari callback Midtrans
        $data = json_decode($json, true);   // Mengubah JSON menjadi array

        if (isset($data['transaction_status']) && $data['transaction_status'] == 'settlement') {
            // Jika status transaksi adalah 'settlement', simpan data ke database
            $this->savePaymentData($data);
        }

        // Kirimkan response ke Midtrans (tergantung pada implementasi)
        return $this->response->setStatusCode(200);
    }

    private function savePaymentData($data)
    {
        $pembayaranModel = new PembayaranModel();

        // Menyimpan data transaksi ke tabel pembayaran
        $paymentData = [
            'id_pemesanan' => $data['order_id'],
            'jumlah_pembayaran' => $data['gross_amount'],
            'tanggal_pembayaran' => date('Y-m-d H:i:s'),
            'status_pembayaran' => $data['transaction_status'],
            'nomor_pemesanan' => $data['order_id'],
        ];

        $pembayaranModel->insert($paymentData);
    }
}
