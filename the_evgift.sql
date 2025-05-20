-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 07:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_evgift`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `gambar_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar_kategori`) VALUES
(1, 'Bouquet', 'bouquet_bunga.jpg'),
(2, 'Hampers', 'hampers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-08-18-102332', 'App\\Database\\Migrations\\CreatePembayaranTable', 'default', 'App', 1723978257, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `jumlah_pembayaran` decimal(10,2) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `no_pemesanan` varchar(255) NOT NULL,
  `dari_bank` varchar(255) NOT NULL,
  `ke_bank` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bukti` varchar(255) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `jumlah_pembayaran`, `tanggal_pembayaran`, `nama_pelanggan`, `no_pemesanan`, `dari_bank`, `ke_bank`, `created_at`, `updated_at`, `bukti`, `catatan`) VALUES
(24, NULL, 0.00, '0000-00-00', '', '', '', '', '2024-08-28 05:34:31', '2024-08-28 05:34:31', '1724823271_3e87cfef977517a487bf.jpg', 'adawd'),
(25, NULL, 0.00, '0000-00-00', '', '', '', '', '2024-08-28 05:48:21', '2024-08-28 05:48:21', '1724824101_24b84246e03859bd5552.jpg', 'adawd');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `status_pemesanan` enum('Menunggu verifikasi','Proses','Selesai','Gagal') DEFAULT 'Menunggu verifikasi',
  `alamat` text DEFAULT NULL,
  `link_tracking` varchar(255) DEFAULT NULL,
  `no_pemesanan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_produk`, `nama_pelanggan`, `tanggal_pemesanan`, `kuantitas`, `status_pemesanan`, `alamat`, `link_tracking`, `no_pemesanan`) VALUES
(13, 1, 'Asep Ahmad', '2024-08-01', 2, 'Selesai', 'Rasau Jaya', NULL, NULL),
(14, 2, 'Budi Santoso', '2024-08-02', 1, 'Proses', 'Sungai jawi jl. karet', NULL, NULL),
(15, 1, 'Citra Dewi', '2024-08-03', 3, 'Selesai', NULL, NULL, NULL),
(16, 1, 'Dewi Sari', '2024-08-04', 1, 'Gagal', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `tanggal_pengiriman` datetime NOT NULL,
  `status_pengiriman` enum('sedang diproses','dalam perjalanan','dikirim','diterima') NOT NULL,
  `metode_pengiriman` varchar(50) NOT NULL,
  `biaya_pengiriman` decimal(10,2) NOT NULL,
  `link_tracking` varchar(255) DEFAULT NULL,
  `catatan_pengiriman` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah_penjualan` varchar(50) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `jumlah_pendapatan` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_produk`, `jumlah_penjualan`, `tanggal_penjualan`, `jumlah_pendapatan`) VALUES
(1, 1, '10', '2024-08-01', 1500000.00),
(2, 2, '5', '2024-08-02', 1000000.00),
(3, 1, '2', '2024-08-03', 600000.00),
(4, 1, '8', '2024-08-04', 400000.00);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `gambar_produk` varchar(255) DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `status_produk` enum('Tersedia','Tidak Tersedia') DEFAULT 'Tersedia',
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `gambar_produk`, `stok`, `terjual`, `harga`, `status_produk`, `deskripsi`) VALUES
(1, 1, 'Bouquet Bunga Mawar', 'bouquet_mawar_merah.jpg', 8, 10, 60000.00, 'Tersedia', NULL),
(2, 1, 'Bouquet Bunga Edelweis', 'bouquet_edelweis.jpg', 7, 5, 100000.00, 'Tersedia', NULL),
(3, 2, 'Hampers Jajan', 'hampers_jajan.jpg', 5, 3, 65000.00, 'Tersedia', NULL),
(4, 1, 'Bouquet Mawar Hitam', 'Mawar_Hitam.jpg', 2, 4, 100000.00, 'Tersedia', NULL),
(5, 1, 'Bouquet Uang 1 Juta', 'Bouquet3.jpg', 2, 2, 1700000.00, 'Tersedia', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','guest') NOT NULL,
  `status` enum('active','inactive','suspend') DEFAULT 'active',
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `id_retur` int(11) NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `keluhan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`id_retur`, `id_pemesanan`, `keluhan`) VALUES
(1, 13, 'Produk tidak sesuai dengan gambar'),
(2, 14, 'Barang rusak saat diterima'),
(3, 15, 'Kuantitas kurang dari yang dipesan'),
(4, 16, 'Pengiriman terlambat');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `harga` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `ongkos_kirim` decimal(15,2) NOT NULL,
  `total_keseluruhan` decimal(15,2) NOT NULL,
  `status_transaksi` enum('Menunggu verifikasi','Proses','Selesai','Gagal') DEFAULT 'Menunggu verifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `id_pemesanan`, `harga`, `total`, `ongkos_kirim`, `total_keseluruhan`, `status_transaksi`) VALUES
(1, 1, 13, 150000.00, 300000.00, 20000.00, 320000.00, 'Selesai'),
(2, 2, 14, 200000.00, 200000.00, 15000.00, 215000.00, 'Selesai'),
(3, 1, 15, 300000.00, 900000.00, 30000.00, 930000.00, 'Selesai'),
(4, 1, 16, 50000.00, 50000.00, 10000.00, 60000.00, 'Gagal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user','guest') NOT NULL,
  `status` enum('active','inactive','banned') DEFAULT 'active',
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `email`, `password`, `role`, `status`, `nama_lengkap`, `alamat`, `nomor_hp`) VALUES
(1, 'bagus', 'fahryan.ian21@gmail.com', '$2y$10$sbu15SDx5z99qdb6IiOLHeYvoJHitnxNXLif1qbUyaEYrKeYP6hjK', 'user', 'active', 'Fahryan Bagus Ananda', 'Rasau Jaya', '089521735090'),
(2, '', 'fahryan.ian6@gmail.com', '', 'admin', 'active', 'fahryan bagus', 'rasau', '7887585674'),
(3, '', 'pai@gmail.com', '', 'admin', 'active', 'paiiiii', 'wadidaw', '234567890'),
(4, '', 'pai99@gmail.com', '', 'admin', 'active', 'paiiiii', 'wadidaw', '234567890'),
(5, '', 'pai991@gmail.com', '', 'admin', 'active', 'paiiiii', 'wadidaw', '234567890'),
(6, '', 'pai9291@gmail.com', '', 'admin', 'active', 'paiiiii', 'wadidaw', '234567890'),
(7, '', 'fai211@gmail.com', '', 'admin', 'active', 'faii', 'rasau', '456775445'),
(8, '', 'fahryan.ian212@gmail.com', '', 'admin', 'active', 'fahryan', 'rasau', '31852112');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD UNIQUE KEY `pembayaran_ibfk_1` (`id_pemesanan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id_retur`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
  MODIFY `id_retur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `retur`
--
ALTER TABLE `retur`
  ADD CONSTRAINT `retur_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
