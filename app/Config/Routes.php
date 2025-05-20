<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// Rute untuk halaman utama
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');

// Rute untuk halaman produk
$routes->get('produk', 'Home::produk');
$routes->get('produk/(:num)', 'Home::produkDetail/$1');

// Rute untuk kategori produk
$routes->get('kategori', 'Home::kategori');
$routes->get('kategori/(:segment)', 'Home::kategoriDetail/$1');

// Rute untuk halaman pemesanan
$routes->get('pemesanan', 'Home::pemesanan');

// Rute untuk halaman keranjang
$routes->get('keranjang', 'Home::keranjang');
$routes->post('keranjang/tambah', 'Home::tambahKeranjang');
$routes->get('keranjang/hapus/(:num)', 'Home::hapusKeranjang/$1');

// Rute untuk halaman checkout
$routes->get('checkout', 'Home::checkout');
$routes->post('checkout/simpan', 'Home::simpanPemesanan');

// Rute untuk halaman pembayaran
$routes->get('pembayaran', 'Home::pembayaran');
$routes->post('pembayaran/simpan', 'Home::simpanPembayaran');
$routes->post('retur/simpanPembayaran', 'ReturController::simpanPembayaran');
$routes->get('evgift/checkout', 'Home::checkout');
$routes->get('evgift/notifikasi', 'Home::notifikasi');
$routes->get('evgift/notifikasi', 'Home::notifikasi');
$routes->get('evgift/baca-notifikasi/(:num)', 'Home::bacaNotifikasi/$1');
$routes->post('notifikasi-midtrans', 'Home::notifikasiMidtrans');
$routes->get('/riwayat-pembayaran', 'Home::riwayatPembayaran');
$routes->post('notifikasi', 'Home::notifikasi');
$routes->get('halaman-notifikasi', 'Home::halamanNotifikasi');
$routes->get('admin/notifikasi', 'AdminController::notifikasi');
$routes->get('evgift/riwayat-transaksi', 'Home::riwayatTransaksi');
$routes->get('evgift/riwayat_transaksi', 'Home::riwayatTransaksiUser');





// Rute untuk halaman sukses
$routes->get('sukses', 'Home::sukses');
// Rute untuk login, register, dan profil pengguna
$routes->get('login', 'AuthController::login');
$routes->post('login/submit', 'AuthController::loginSubmit');
$routes->get('register', 'AuthController::register');
$routes->post('register/submit', 'AuthController::registerSubmit');
$routes->get('profil', 'AuthController::profil');
$routes->post('profil/update', 'AuthController::updateProfile');
$routes->get('logout', 'AuthController::logout');
$routes->post('evgift/updateProfile', 'AuthController::updateProfile');
$routes->get('admin/user-management/add', 'AdminController::addUser');
$routes->get('admin/tambah-user', 'AdminController::tambahUser');
$routes->post('admin/simpan-user', 'AdminController::simpanUser');
$routes->post('admin/simpan-user', 'AdminController::addUser');
$routes->post('update-profile', 'AuthController::updateProfile');
$routes->post('update-password', 'AuthController::updatePassword');
$routes->get('admin/user-management/add', 'AdminController::addUser');
$routes->post('admin/user-management/add', 'AdminController::saveUser');
$routes->get('admin/user-management/edit/(:num)', 'AdminController::editUser/$1');
$routes->post('admin/user-management/update', 'AdminController::updateUser');

// Contoh metode untuk menghapus pengguna
$routes->get('admin/user-management/delete/(:num)', 'AdminController::deleteUser/$1');

// Rute untuk halaman admin
$routes->get('admin', 'AdminController::index');
$routes->get('admin/dashboard', 'AdminController::dashboard');
$routes->get('admin/produk', 'AdminController::produk');
$routes->get('admin/kategori', 'AdminController::kategori');
$routes->get('admin/kategori-tambah', 'AdminController::kategoriTambah');
$routes->get('admin/kategori-tambah', 'AdminController::kategoriTambah');
$routes->post('admin/simpan-kategori', 'AdminController::simpanKategori');
$routes->post('admin/produk/update', 'AdminController::produkUpdate');
$routes->get('admin/produk/edit/(:num)', 'AdminController::produkEdit/$1');
$routes->post('admin/produk/update', 'AdminController::produkUpdate');


// Rute untuk laporan di halaman admin
$routes->get('admin/laporan/produk', 'AdminController::laporanProduk');
$routes->get('admin/laporan/pemesanan', 'AdminController::laporanPemesanan');
$routes->get('admin/laporan/pengiriman', 'AdminController::laporanPengiriman');
$routes->get('admin/laporan/pembayaran', 'AdminController::laporanPembayaran');
$routes->get('admin/laporan/retur', 'AdminController::laporanRetur');
$routes->get('admin/laporan/penjualan', 'AdminController::laporanPenjualan');
$routes->get('admin/transaksi', 'AdminController::laporanTransaksi');

// Rute untuk menambah, mengedit, dan menghapus produk di halaman admin
$routes->get('admin/produk-tambah', 'AdminController::produkTambah');
$routes->post('admin/produk/simpan', 'AdminController::simpanProduk');
$routes->get('admin/produk-edit/(:num)', 'AdminController::produkEdit/$1');
$routes->post('admin/produk-update/(:num)', 'AdminController::produkUpdate/$1');
$routes->delete('admin/produk-hapus/(:num)', 'AdminController::produkHapus/$1');
$routes->post('admin/simpan-produk', 'AdminController::simpanProduk');

$routes->get('admin/produk-hapus/(:num)', 'AdminController::produkHapus/$1');

// Rute untuk mengelola pengguna admin
$routes->get('admin/manage-users', 'AdminController::userManagement');
$routes->get('admin/edit-user/(:num)', 'AdminController::editUser/$1');
$routes->post('admin/update-user/(:num)', 'AdminController::updateUser/$1');
$routes->get('admin/delete-user/(:num)', 'AdminController::deleteUser/$1');
$routes->get('admin/user-management', 'AdminController::userManagement');
$routes->get('admin/user-management/delete/(:num)', 'AdminController::deleteUser/$1');
$routes->get('admin/user-management/edit/(:num)', 'AdminController::editUser/$1');
$routes->put('admin/user-management/update/(:num)', 'AdminController::updateUser/$1');


// Rute untuk produk evgift
$routes->get('evgift/produk/detail/(:num)', 'Home::produkDetail/$1');
$routes->post('evgift/tambahKeranjang', 'Home::tambahKeranjang');
$routes->get('evgift/keranjang', 'Home::keranjang');
$routes->post('evgift/simpanPembayaran', 'Home::simpanPembayaran');
$routes->post('evgift/checkout', 'Home::checkout');
$routes->get('evgift/bouquet', 'Home::bouquet');
$routes->get('evgift/hampers', 'Home::hampers');
$routes->get('evgift/testimoni', 'Home::testimoni');
$routes->get('evgift/keranjang/hapus/(:num)', 'Home::hapusKeranjang/$1');

// Rute untuk pembayaran
$routes->get('pembayaran', 'PaymentController::index');
$routes->post('simpan-pembayaran', 'PaymentController::store');

// Rute untuk halaman invoice
$routes->get('invoice', 'Home::invoice');
$routes->get('evgift/invoice', 'Home::invoice'); // Jika menggunakan namespace evgift


// File: app/Config/Routes.php
$routes->post('/midtrans/callback', 'MidtransCallbackController::callback');
$routes->post('/midtrans/callback', 'PaymentController::handleCallback');


// Rute untuk mengunduh invoice dalam format PDF
$routes->get('evgift/invoice/download/(:segment)', 'InvoiceController::download/$1');

$routes->post('home/hitungOngkir', 'Home::hitungOngkir');
