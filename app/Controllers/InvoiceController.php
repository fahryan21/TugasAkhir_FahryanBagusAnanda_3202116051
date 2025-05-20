<!-- <?php

// namespace App\Controllers;

// class InvoiceController extends BaseController
// {
//     /**
//      * Tampilkan halaman invoice.
//      *
//      * @param string $orderId
//      * @return \CodeIgniter\HTTP\Response|string
//      */
//     public function view($orderId)
//     {
//         // Ambil data transaksi dari Midtrans
//         $midtransData = $this->getMidtransTransaction($orderId);

//         if (!$midtransData) {
//             throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Invoice tidak ditemukan.");
//         }

//         // Strukturkan data untuk invoice
//         $invoice = [
//             'order_id' => $midtransData['order_id'],
//             'tanggal' => date('Y-m-d H:i:s', strtotime($midtransData['transaction_time'])),
//             'nama_pelanggan' => $midtransData['customer_details']['first_name'] . ' ' . $midtransData['customer_details']['last_name'],
//             'email' => $midtransData['customer_details']['email'],
//             'nomor_hp' => $midtransData['customer_details']['phone'],
//             'produk' => $midtransData['item_details'],
//             'total' => $midtransData['gross_amount'],
//         ];

//         // Tampilkan halaman invoice
//         return view('invoice', ['invoice' => $invoice]);
//     }
//     public function download($orderId)
// {
//     $midtransData = $this->getMidtransTransaction($orderId);

//     if (!$midtransData) {
//         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Invoice tidak ditemukan.");
//     }

//     $invoiceHtml = view('invoice', ['invoice' => $midtransData]);
    
//     // Gunakan library dompdf untuk membuat PDF
//     $dompdf = new \Dompdf\Dompdf();
//     $dompdf->loadHtml($invoiceHtml);
//     $dompdf->setPaper('A4', 'portrait');
//     $dompdf->render();

//     // Unduh file PDF
//     $dompdf->stream("Invoice_{$orderId}.pdf", ['Attachment' => true]);
// }

// } -->
