-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 12:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir-gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `deskripsi`, `stok`) VALUES
(10, 'Kuningan', 'Logam', 4550);

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_mandor` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qty_keluar` int(11) NOT NULL,
  `tanggal_keluar` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan_keluar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id`, `id_barang`, `id_mandor`, `id_user`, `qty_keluar`, `tanggal_keluar`, `keterangan_keluar`) VALUES
(1, 10, 1, 1, 250, '2022-08-14 14:52:41', ''),
(2, 10, 1, 1, 1200, '2022-08-29 08:12:49', '');

-- --------------------------------------------------------

--
-- Table structure for table `mandor`
--

CREATE TABLE `mandor` (
  `id` int(11) NOT NULL,
  `nama_mandor` varchar(25) NOT NULL,
  `keterangan_mandor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mandor`
--

INSERT INTO `mandor` (`id`, `nama_mandor`, `keterangan_mandor`) VALUES
(1, 'Agus', 'Divisi Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qty_masuk` int(11) NOT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan_masuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id`, `id_barang`, `id_supplier`, `id_user`, `qty_masuk`, `tanggal_masuk`, `keterangan_masuk`) VALUES
(1, 10, 10, 1, 1000, '2022-08-14 14:50:34', ''),
(2, 10, 10, 1, 5000, '2022-08-29 08:12:37', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `keterangan_supplier` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat`, `telp`, `keterangan_supplier`) VALUES
(10, 'Samuel', 'Jl. Pembangunan Iman No. 02, Jakarta Pusat', '081327318899', 'Mitra');

-- --------------------------------------------------------

--
-- Table structure for table `trx_log`
--

CREATE TABLE `trx_log` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `current_stok` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trx_log`
--

INSERT INTO `trx_log` (`id`, `id_barang`, `tipe`, `qty`, `current_stok`, `tanggal`) VALUES
(1, 10, 1, 1000, 1000, '2022-08-14 14:50:34'),
(2, 10, 2, 250, 750, '2022-08-14 14:52:41'),
(3, 10, 1, 5000, 5750, '2022-08-29 08:12:37'),
(4, 10, 2, 1200, 4550, '2022-08-29 08:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_user`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_supplier` (`id_mandor`),
  ADD KEY `id_mandor` (`id_mandor`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mandor`
--
ALTER TABLE `mandor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trx_log`
--
ALTER TABLE `trx_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mandor`
--
ALTER TABLE `mandor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trx_log`
--
ALTER TABLE `trx_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
