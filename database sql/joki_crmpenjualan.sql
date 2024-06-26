-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20240413.a6c56e6e0e
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 09:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joki_crmpenjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(55) NOT NULL,
  `riwayat` varchar(55) NOT NULL,
  `tanggal` varchar(55) NOT NULL,
  `waktu` varchar(55) NOT NULL,
  `bukti_transfer` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `id_user`, `jumlah`, `total`, `riwayat`, `tanggal`, `waktu`, `bukti_transfer`) VALUES
(34, 5, 3, 3, 666, 'menunggu pembayaran', '26-06-2024', '09:06', 'f1719385945.51'),
(35, 3, 3, 4, 355556, 'sudah bayar', '26-06-2024', '09:06', 'f1719385999.jpg'),
(36, 5, 3, 1, 222, 'menunggu pembayaran', '26-06-2024', '09:06', '');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritik_saran` int(11) NOT NULL,
  `nama` varchar(111) NOT NULL,
  `tanggal` varchar(55) NOT NULL,
  `isi_kritik_saran` varchar(1000) NOT NULL,
  `balasan` varchar(1111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(55) NOT NULL,
  `gambar` varchar(55) NOT NULL,
  `harga` varchar(55) NOT NULL,
  `stok_produk` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `gambar`, `harga`, `stok_produk`) VALUES
(3, 'kotak', 'f1718647070.png', '88889', '5'),
(5, 'asbak', 'f1718691085.png', '222', '9'),
(6, 'kacang', 'f1718900263.png', '90000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `id_promosi_produk` int(11) NOT NULL,
  `id_produk` int(55) NOT NULL,
  `promo` varchar(55) NOT NULL,
  `mulai` varchar(55) NOT NULL,
  `berakhir` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id_promosi_produk`, `id_produk`, `promo`, `mulai`, `berakhir`) VALUES
(3, 3, '44', '2024-06-05', '2024-06-21'),
(4, 6, '15', '2024-06-21', '2024-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama` varchar(111) NOT NULL,
  `produk` varchar(111) NOT NULL,
  `tanggal` varchar(55) NOT NULL,
  `waktu` varchar(55) NOT NULL,
  `promo` varchar(11) NOT NULL,
  `status` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama`, `produk`, `tanggal`, `waktu`, `promo`, `status`) VALUES
(8, 'josua', 'asbak', '26-06-2024', '06:06', '', 'selesai'),
(9, 'josua', 'asbak', '26-06-2024', '07:06', '', 'selesai'),
(10, 'josua', 'asbak', '26-06-2024', '07:06', '', 'selesai'),
(11, 'josua', 'asbak', '26-06-2024', '07:06', '', 'selesai'),
(12, 'josua', 'kotak', '26-06-2024', '07:06', '44', 'selesai'),
(13, 'josua', 'kotak', '26-06-2024', '07:06', '44', 'selesai'),
(14, 'josua', 'asbak', '26-06-2024', '08:06', '', 'selesai'),
(15, 'josua', 'asbak', '26-06-2024', '08:06', '', 'menunggu pembayaran'),
(16, 'josua', 'kotak', '26-06-2024', '08:06', '44', 'menunggu pembayaran'),
(17, 'josua', 'asbak', '26-06-2024', '09:06', '', 'menunggu pembayaran'),
(18, 'josua', 'asbak', '26-06-2024', '09:06', '', 'menunggu pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(111) NOT NULL,
  `no_hp` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_hp`, `email`, `password`) VALUES
(3, 'josua', '231131', 'josua@gmail.com', 'josua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_kritik_saran`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`id_promosi_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_kritik_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
  MODIFY `id_promosi_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
