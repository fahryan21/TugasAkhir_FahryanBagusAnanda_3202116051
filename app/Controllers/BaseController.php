<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
    protected $midtransServerKey;
    protected $data = [];

    public function __construct()
    {
        helper('url');
        $this->data['isLoggedIn'] = session()->has('user_id');
        $this->midtransServerKey = 'SB-Mid-server-PLy_6ayyk5PoE0Jque_o5U8W'; // Ganti dengan Server Key Midtrans Anda
    }

    public function getData()
    {
        return $this->data;
    }
    
    /**
     * Fetch transaction data from Midtrans API.
     *
     * @param string $orderId
     * @return array|null
     */
    protected function getMidtransTransaction($orderId)
    {
        // Endpoint Transaction Status API Midtrans
        $url = "https://api.midtrans.com/v2/$orderId/status";

        // Konfigurasi cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Basic ' . base64_encode($this->midtransServerKey . ':'),
            'Content-Type: application/json',
        ]);

        // Eksekusi permintaan
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            // Decode hasil JSON
            return json_decode($response, true);
        } else {
            return null;
        }
    }
    public function viewInvoice($orderId)
{
    // Mendapatkan data transaksi dari Midtrans
    $transaction = $this->getMidtransTransaction($orderId);

    if ($transaction === null) {
        // Tangani jika transaksi tidak ditemukan atau gagal
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Invoice tidak ditemukan');
    }

    // Kirim data transaksi ke view
    return view('invoice_view', ['transaction' => $transaction]);
}

}
