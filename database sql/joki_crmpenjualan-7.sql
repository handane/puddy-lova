-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20240413.a6c56e6e0e
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 10:13 AM
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
  `id_produk` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(55) NOT NULL,
  `riwayat` varchar(55) NOT NULL,
  `tanggal` varchar(55) NOT NULL,
  `waktu` varchar(55) NOT NULL,
  `bukti_transfer` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritik_saran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(111) NOT NULL,
  `tanggal` varchar(55) NOT NULL,
  `isi_kritik_saran` varchar(1000) NOT NULL,
  `balasan` varchar(1111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id_kritik_saran`, `id_user`, `nama`, `tanggal`, `isi_kritik_saran`, `balasan`) VALUES
(5, 3, 'elhamsah', '26-06-2024', 'kok gitu', 'yooaaiii');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `nama_produk` varchar(55) NOT NULL,
  `gambar` varchar(55) NOT NULL,
  `harga` varchar(55) NOT NULL,
  `stok_produk` varchar(11) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_produk`, `nama_produk`, `gambar`, `harga`, `stok_produk`, `deskripsi`) VALUES
(3, 'me389', 'Strawberry', 'f1720014847.05', '10000', '6', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem nam, saepe deleniti vel error debitis vero modi ipsam sunt. Velit ad corrupti nisi fuga nobis, nostrum eligendi quaerat nihil repudiandae quisquam alias, pariatur fugit itaque explicabo tempore inventore dignissimos? Architecto quam molestias in laudantium, eligendi obcaecati id doloribus a repudiandae laborum nesciunt eveniet totam impedit non fugit blanditiis autem voluptatum illum vitae ex ea ipsa est dicta natus. Aut ad alias autem eveniet modi aliquid, veniam doloribus tempore laboriosam! Debitis iste deserunt doloremque! Vel reprehenderit provident molestias excepturi, ab laboriosam officiis similique rem nobis, asperiores vitae mollitia ullam libero aspernatur.'),
(4, 'k3gd6', 'Salted Caramel', 'f1719740442.jpeg', '10000', '6', ''),
(5, 'cmcji', 'Mango', 'f1719740472.jpeg', '10000', '5', ''),
(6, '7f7id', 'Red Velvet', 'f1719740491.jpeg', '10000', '4', ''),
(7, 'bf1a2', 'Taro', 'f1719740535.jpeg', '10000', '8', ''),
(8, '5l2jd', 'Orange', 'f1719740550.jpeg', '10000', '5', ''),
(9, '1c288', 'Lychee', 'f1719740566.jpeg', '10000', '5', ''),
(10, '44e3g', 'Thai Tea', 'f1719740579.jpeg', '10000', '6', ''),
(11, '7aj1i', 'Avocado', 'f1719740598.jpeg', '10000', '3', ''),
(12, '7ggac', 'Bubble Gum', 'f1719740617.jpeg', '10000', '5', ''),
(13, 'b9djc', 'Green Tea', 'f1719740632.jpeg', '10000', '7', ''),
(14, '30b3h', 'Banana', 'f1719740645.jpeg', '10000', '4', ''),
(15, 'iclef', 'Durian', 'f1719740660.jpeg', '10000', '6', ''),
(16, '0k7lj', 'Chocolate', 'f1719740673.jpeg', '10000', '4', ''),
(17, '8db5m', 'Vanilla', 'f1719740684.jpeg', '10000', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `id_promosi_produk` int(11) NOT NULL,
  `id_produk` varchar(55) NOT NULL,
  `promo_lama` varchar(55) NOT NULL,
  `promo_baru` varchar(55) NOT NULL,
  `mulai` varchar(55) NOT NULL,
  `berakhir` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id_promosi_produk`, `id_produk`, `promo_lama`, `promo_baru`, `mulai`, `berakhir`) VALUES
(11, 'me389', '10', '15', '2024-06-30', '2024-07-01'),
(12, 'k3gd6', '0', '0', '2024-06-30', '2024-06-30'),
(13, 'cmcji', '0', '0', '2024-06-30', '2024-06-30'),
(14, '7f7id', '10', '0', '2024-06-30', '2024-06-30'),
(15, 'bf1a2', '0', '0', '2024-06-30', '2024-06-30'),
(16, '5l2jd', '0', '0', '2024-06-30', '2024-06-30'),
(17, '1c288', '0', '0', '2024-06-30', '2024-06-30'),
(18, '44e3g', '0', '0', '2024-06-30', '2024-06-30'),
(19, '7aj1i', '0', '0', '2024-06-30', '2024-06-30'),
(20, '7ggac', '0', '0', '2024-06-30', '2024-06-30'),
(21, 'b9djc', '0', '0', '2024-06-30', '2024-06-30'),
(22, '30b3h', '0', '0', '2024-06-30', '2024-06-30'),
(23, 'iclef', '0', '0', '2024-06-30', '2024-06-30'),
(24, '0k7lj', '0', '0', '2024-06-30', '2024-06-30'),
(25, '8db5m', '0', '0', '2024-06-30', '2024-06-30');

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
  `status` varchar(111) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama`, `produk`, `tanggal`, `waktu`, `promo`, `status`, `id_produk`, `id_user`) VALUES
(28, 'ratu', 'Red Velvet', '30-06-2024', '16:48', '10', 'menunggu pembayaran', '', 0),
(29, 'ratu', 'Strawberry', '01-07-2024', '14:28', '10', 'menunggu pembayaran', '', 0),
(30, 'josua', 'Taro', '01-07-2024', '17:15', '0', 'menunggu pembayaran', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(111) NOT NULL,
  `no_hp` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `frekuensi` int(11) NOT NULL,
  `status` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_hp`, `email`, `password`, `frekuensi`, `status`) VALUES
(3, 'josua', '231131', 'josua@gmail.com', 'josua', 0, 'Pelanggan Baru'),
(4, 'king', '089809231', 'king@gmail.com', 'king', 0, 'Pelanggan Baru'),
(5, 'ratu', '08351673134', 'ratu@gmail.com', 'ratu', 10, 'Pelanggan Lama');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_kritik_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
  MODIFY `id_promosi_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
