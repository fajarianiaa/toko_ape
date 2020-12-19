-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 02:39 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_ape`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `harga`, `stok`, `gambar`) VALUES
(1, 'Mainan kayu angka', 'Ini mainan dari kayu dengan bentuk angka', 78000, 3, ''),
(2, 'Mainan kayu huruf', 'Ini adalah mainan dari kayu berbentuk huruf', 87000, 3, ''),
(3, 'Ayunan', 'ini mainan ayunan', 3400000, 1, 'Foto000.jpg'),
(4, 'jungkat', 'jungkit', 3400000, 1, ''),
(6, 'Ayunan', 'jungkit', 3400000, 1, 'hero-beauty-21.jpg'),
(7, 'mainan', 'mainan anak-anak', 2300500, 1, 'Foto0001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gambar`
--

CREATE TABLE IF NOT EXISTS `tb_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gambar`
--

INSERT INTO `tb_gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(4, 4, 'Puzzle Fish', 'mysql.png', '2020-09-15 03:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_header_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_header_transaksi` (
  `id_header` int(11) NOT NULL,
  `id_user` int(11) NOT NULL COMMENT 'id_pelanggan',
  `id_pelanggan` int(11) NOT NULL COMMENT 'kode_transaksi',
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(25) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `status_pengiriman` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rek_pembayaran` varchar(255) DEFAULT NULL,
  `rek_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_header_transaksi`
--

INSERT INTO `tb_header_transaksi` (`id_header`, `id_user`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `status_pengiriman`, `jumlah_bayar`, `rek_pembayaran`, `rek_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(1, 0, 1, 'Fajariani Amalia', 'fajarianiamalia@gmail.com', '085789467532', 'Sukabumi', '16092020HUVCJJGF', '2020-09-16 00:00:00', 150000, 'Sudah Bayar', 'Sedang Dikirim', 150000, '26267894', 'Riani Amalia', 'waze_PNG21.png', 1, '27-09-2020', 'BANK BCA', '2020-09-16 20:51:43', '2020-10-13 12:12:29'),
(2, 0, 1, 'Fajariani A', 'fajarianiamalia@gmail.com', '085789467532', 'Cisaat, Sukabumi', '18092020VGDYIBLH', '2020-09-18 00:00:00', 157000, 'Belum Bayar', 'Belum Dikirim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-18 04:23:02', '2020-10-13 12:08:31'),
(3, 0, 1, 'Fajariani Amalia', 'fajarianiamalia@gmail.com', '085789467532', 'Kp. Babakan Jampang 24/08, Cisaat, Sukabumi', '12102020I4ATJ2Q0', '2020-10-12 00:00:00', 200000, 'Belum Bayar', 'Belum Dikirim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-12 15:38:01', '2020-10-13 11:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `deskripsi`, `urutan`, `tanggal_update`) VALUES
(7, 'mainan-luar-ruang', 'Mainan Luar Ruang', 'Mainan ini berbahan dasar besi dan untuk luar ruang.', 2, '2020-10-02 15:09:31'),
(8, 'mainan-kayu', 'Mainan Kayu', 'Mainan ini berbahan dasar kayu.', NULL, '2020-10-02 15:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konfigurasi`
--

CREATE TABLE IF NOT EXISTS `tb_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text,
  `metatext` text,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rek_pembayaran` varchar(255) DEFAULT NULL COMMENT 'tanggal_update',
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konfigurasi`
--

INSERT INTO `tb_konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `whatsapp`, `deskripsi`, `logo`, `icon`, `rek_pembayaran`, `tanggal_update`) VALUES
(1, 'APE Store', 'Mainan Edukasi', 'cv.muaramandiri@gmail.com', 'http://mainan.com', 'mainan edukasi, puzzle', 'mainan ', '0815-6337-3839', 'Jl. Cibogo Kp. Sukajadi Rt. 27/07 Desa Muaradua Kec. Kadudampit\r\nKabupaten Sukabumi', 'http://facebook.com/mainan', 'https://api.whatsapp.com/send?phone=6281563373839', 'Alat Permainan Edukasi', 'logo.jpg', 'logo1.jpg', '12345678', '2020-09-12 17:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, 'Fajariani A', 'fajarianiamalia@gmail.com', '160199', '085789467532', 'Cisaat, Sukabumi', '2020-09-16 15:42:37', '2020-09-17 16:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE IF NOT EXISTS `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL COMMENT 'email',
  `email` varchar(255) NOT NULL COMMENT 'telepon',
  `telepon` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `status_produksi` varchar(25) NOT NULL,
  `status_pengiriman` varchar(25) NOT NULL COMMENT 'tanggal_update',
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `nama_pelanggan`, `email`, `telepon`, `deskripsi`, `status_produksi`, `status_pengiriman`, `tanggal_update`, `gambar`) VALUES
(1, 'Fajariani Amalia', 'fajarianiamalia@gmail.com', '085789467532', 'lahaula', 'Produksi Selesai', 'Sedang Dikirim', '2020-10-23 10:22:07', NULL),
(2, 'Fajariani A', 'angelica@gmail.com', '0815-6337-3839', 'Bismillah bisaa', 'Belum Diproduksi', 'Belum Dikirim', '2020-10-22 14:05:13', NULL),
(3, 'Fajariani', 'fajarianiamalia1@gmail.com', '085789467532', 'ini bisa ga ya semoga bisa', 'Belum Diproduksi', 'Belum Dikirim', '2020-10-22 14:30:05', NULL),
(4, 'Anggi Saparda', 'angelica@gmail.com', '0815-6337-3839', 'saya mau pesan ini', 'Belum Diproduksi', 'Belum Dikirim', '2020-10-23 08:19:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE IF NOT EXISTS `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(4, 3, 8, 'P01', 'Puzzle Lebah', 'puzzle-lebah-p01', '<p>Mainan puzzle berbentuk lebah</p>\r\n', 'puzzle', 50000, 3, 'Puzzle-Lebah-Cat.jpg', 100, '40x50', 'Publish', '2020-09-11 12:34:09', '2020-09-11 10:34:09'),
(5, 3, 7, 'A01', 'Ayunan', 'ayunan-a01', '<p>Mainan luar ruang ayunan anak</p>\r\n', 'ayunan', 2300500, 1, '3578031_4-ayunangandabulatberatapsplr-41.jpg', 200, '40x50', 'Publish', '2020-09-11 12:52:04', '2020-09-11 10:52:04'),
(6, 3, 7, 'P02', 'Seluncuran', 'seluncuran-p02', '<p>mainan bla bla</p>\r\n', 'Seluncuran', 3400000, 1, '1963036_perosotan_01.jpg', 200, '300x50', 'Publish', '2020-09-12 08:27:16', '2020-09-12 06:27:16'),
(7, 3, 8, 'P03', 'Puzzle Pohon', 'puzzle-pohon-p03', '<p>Mainan</p>\r\n', 'Puzzle', 88000, 2, 'Pohon-Hijaiyah-Bolak-Balik.jpg', 200, '300x50', 'Publish', '2020-09-12 08:29:46', '2020-09-12 06:29:46'),
(8, 3, 8, 'P04', 'Puzzle Keluarga', 'puzzle-keluarga-p04', '', 'Puzzle', 125000, 3, 'Puzzle-Keluarga.jpg', 200, '40x50', 'Publish', '2020-09-12 08:31:06', '2020-09-12 06:31:06'),
(9, 3, 8, 'P05', 'Balok Abjad Dan Angka ', 'balok-abjad-dan-angka-p05', '<p>Mainan</p>\r\n', 'Balok', 99000, 4, 'balok-abjad-dan-angka1.jpg', 200, '40x50', 'Publish', '2020-09-12 08:33:39', '2020-09-12 06:33:39'),
(10, 3, 8, 'P06', 'Peralatan Makan', 'peralatan-makan-p06', '<p>Mainan</p>\r\n', 'Peralatan', 75000, 3, 'Peralatan-makan.jpg', 100, '40x50', 'Publish', '2020-09-12 08:34:34', '2020-09-12 06:34:34'),
(11, 3, 8, 'P07', 'Geometri', 'geometri-p07', '<p>Mainan</p>\r\n', 'Geometri', 34500, 2, 'basic-shape-flower1.jpg', 200, '300x50', 'Publish', '2020-09-12 08:35:51', '2020-09-12 06:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekening`
--

CREATE TABLE IF NOT EXISTS `tb_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekening`
--

INSERT INTO `tb_rekening` (`id_rekening`, `nama_bank`, `no_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(1, 'BANK BCA', '23456969', 'Fajariani Amalia', NULL, '2020-09-26 09:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(1, 0, 1, '16092020HUVCJJGF', 4, 50000, 3, 150000, '2020-09-16 00:00:00', '2020-09-16 18:51:43'),
(2, 0, 1, '18092020VGDYIBLH', 7, 88000, 1, 88000, '2020-09-18 00:00:00', '2020-09-18 02:23:02'),
(3, 0, 1, '18092020VGDYIBLH', 11, 34500, 2, 69000, '2020-09-18 00:00:00', '2020-09-18 02:23:02'),
(4, 0, 1, '12102020I4ATJ2Q0', 10, 75000, 1, 75000, '2020-10-12 00:00:00', '2020-10-12 13:38:01'),
(5, 0, 1, '12102020I4ATJ2Q0', 8, 125000, 1, 125000, '2020-10-12 00:00:00', '2020-10-12 13:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role_id` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `username`, `password`, `role_id`, `tanggal_update`) VALUES
(3, 'Nadiva', 'admin@gmail.com', 'admin', 'admin', 'Penjualan', '2020-10-01 04:53:37'),
(4, 'Bagian Penjualan', 'penjualan@gmail.com', 'penjualan', 'penjualan', 'Penjualan', '2020-10-01 03:14:22'),
(5, 'yulje hos', 'yulje@gmail.com', 'produksi', 'produksi', 'Produksi', '2020-10-12 14:34:04'),
(6, 'Angelica Yunia A', 'angelica@gmail.com', 'pengiriman', 'pengiriman', 'Pengiriman', '2020-10-21 07:02:44'),
(7, 'Sinta', 'sinta1@gmail.com', 'sinta', 'sinta', 'Produksi', '2020-10-21 07:04:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tb_header_transaksi`
--
ALTER TABLE `tb_header_transaksi`
  ADD PRIMARY KEY (`id_header`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `no_rekening` (`no_rekening`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_gambar`
--
ALTER TABLE `tb_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_header_transaksi`
--
ALTER TABLE `tb_header_transaksi`
  MODIFY `id_header` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_konfigurasi`
--
ALTER TABLE `tb_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
