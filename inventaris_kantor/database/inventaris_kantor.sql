-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 07:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_kantor`
--
CREATE DATABASE IF NOT EXISTS `inventaris_kantor` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inventaris_kantor`;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kondisi_barang` varchar(50) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `IS_DELETED` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `kondisi_barang`, `tanggal_beli`, `IS_DELETED`) VALUES
(1, 'Laptop Acer', 'Baru', '2021-07-04', b'0'),
(2, 'Laptop Asus', 'Baru', '2021-07-04', b'0'),
(3, 'Laptop Lenovo', 'Bekas', '2021-07-04', b'0'),
(4, 'Proyecktor Infocus', 'Baru', '2021-06-01', b'0'),
(5, 'Proyektor Epson', 'Bekas', '2021-06-02', b'0'),
(6, 'Kamera Canon', 'Bekas', '2021-10-05', b'0'),
(7, 'Wacom Pen Tablet', 'Baru', '2021-11-07', b'0'),
(8, 'Motor Blade', 'Baru', '2019-01-01', b'0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `barangsd`
-- (See below for the actual view)
--
CREATE TABLE `barangsd` (
`kode_barang` int(20)
,`nama_barang` varchar(50)
,`kondisi_barang` varchar(50)
,`tanggal_beli` date
,`IS_DELETED` bit(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `barang_dipinjam`
-- (See below for the actual view)
--
CREATE TABLE `barang_dipinjam` (
`nama_barang` varchar(50)
,`nama_pj` varchar(50)
,`nama_peminjam` varchar(50)
,`tanggal_pinjam` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `barang_ready`
-- (See below for the actual view)
--
CREATE TABLE `barang_ready` (
`nama_pj` varchar(50)
,`nama_barang` varchar(50)
,`kondisi_barang` varchar(50)
,`kode_barang` int(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `nip_peminjam` int(20) NOT NULL,
  `kode_barang` int(20) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `domisili_peminjam` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `IS_DELETED` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`nip_peminjam`, `kode_barang`, `nama_peminjam`, `domisili_peminjam`, `tanggal_pinjam`, `IS_DELETED`) VALUES
(123, 4, 'Bagas', 'semarang', '2022-08-31', b'0'),
(201, 7, 'begs', 'babi', '2022-09-08', b'0'),
(1022, 2, 'Suneo', 'Depok', '2021-11-02', b'0'),
(1111, 1, 'Hilmi', 'Bekasi', '2021-11-01', b'0'),
(76453, 5, 'Woody', 'Jakarta', '2021-12-16', b'0'),
(2147483647, 8, 'ade', 'true', '2022-09-01', b'0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `peminjamsd`
-- (See below for the actual view)
--
CREATE TABLE `peminjamsd` (
`nip_peminjam` int(20)
,`kode_barang` int(20)
,`nama_peminjam` varchar(50)
,`domisili_peminjam` varchar(50)
,`tanggal_pinjam` date
,`IS_DELETED` bit(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `pj_barang`
--

CREATE TABLE `pj_barang` (
  `nip_pj` int(20) NOT NULL,
  `nama_pj` varchar(50) NOT NULL,
  `kode_barang` int(20) NOT NULL,
  `domisili_pj` varchar(50) NOT NULL,
  `IS_DELETED` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pj_barang`
--

INSERT INTO `pj_barang` (`nip_pj`, `nama_pj`, `kode_barang`, `domisili_pj`, `IS_DELETED`) VALUES
(1001, 'Rio', 1, 'Bekasi', b'0'),
(1002, 'Amin', 2, 'Bekasi', b'0'),
(1026, 'Jotaro', 6, 'Bekasi', b'0'),
(1043, 'Agung', 3, 'Depok', b'0'),
(1044, 'Ayu', 4, 'Bogor', b'0'),
(4123, 'Ole', 7, 'Depok', b'0'),
(6358, 'Joko', 8, 'Bogor', b'0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pj_barangsd`
-- (See below for the actual view)
--
CREATE TABLE `pj_barangsd` (
`nip_pj` int(20)
,`nama_pj` varchar(50)
,`kode_barang` int(20)
,`domisili_pj` varchar(50)
,`IS_DELETED` bit(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(12, 'admin', '$2y$10$nnbtba1x7YzPGnyDyUceCuI7JmPzZXLQojxtih3OxKiddGlTCcUwS', 'admin'),
(16, 'begs1', '$2y$10$357XB2h21h97v6u0AgIw5OOOs1icqnA3fkD5H/3yFAA/7drwWciXq', 'user');

-- --------------------------------------------------------

--
-- Structure for view `barangsd`
--
DROP TABLE IF EXISTS `barangsd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barangsd`  AS SELECT `barang`.`kode_barang` AS `kode_barang`, `barang`.`nama_barang` AS `nama_barang`, `barang`.`kondisi_barang` AS `kondisi_barang`, `barang`.`tanggal_beli` AS `tanggal_beli`, `barang`.`IS_DELETED` AS `IS_DELETED` FROM `barang` WHERE `barang`.`IS_DELETED` = 00  ;

-- --------------------------------------------------------

--
-- Structure for view `barang_dipinjam`
--
DROP TABLE IF EXISTS `barang_dipinjam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_dipinjam`  AS SELECT `c`.`nama_barang` AS `nama_barang`, `b`.`nama_pj` AS `nama_pj`, `a`.`nama_peminjam` AS `nama_peminjam`, `a`.`tanggal_pinjam` AS `tanggal_pinjam` FROM ((`peminjam` `a` join `pj_barang` `b` on(`a`.`kode_barang` = `b`.`kode_barang`)) join `barang` `c` on(`a`.`kode_barang` = `c`.`kode_barang`)) ORDER BY `a`.`tanggal_pinjam` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `barang_ready`
--
DROP TABLE IF EXISTS `barang_ready`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_ready`  AS SELECT `a`.`nama_pj` AS `nama_pj`, `b`.`nama_barang` AS `nama_barang`, `b`.`kondisi_barang` AS `kondisi_barang`, `b`.`kode_barang` AS `kode_barang` FROM (`pj_barang` `a` join `barang` `b` on(`a`.`kode_barang` = `b`.`kode_barang`)) WHERE !exists(select `x`.`nama_barang` from (`barang_dipinjam` `x` join `barang`) where `x`.`nama_barang` = `b`.`nama_barang` limit 1) ORDER BY `b`.`kode_barang` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `peminjamsd`
--
DROP TABLE IF EXISTS `peminjamsd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `peminjamsd`  AS SELECT `peminjam`.`nip_peminjam` AS `nip_peminjam`, `peminjam`.`kode_barang` AS `kode_barang`, `peminjam`.`nama_peminjam` AS `nama_peminjam`, `peminjam`.`domisili_peminjam` AS `domisili_peminjam`, `peminjam`.`tanggal_pinjam` AS `tanggal_pinjam`, `peminjam`.`IS_DELETED` AS `IS_DELETED` FROM `peminjam` WHERE `peminjam`.`IS_DELETED` = 00  ;

-- --------------------------------------------------------

--
-- Structure for view `pj_barangsd`
--
DROP TABLE IF EXISTS `pj_barangsd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pj_barangsd`  AS SELECT `pj_barang`.`nip_pj` AS `nip_pj`, `pj_barang`.`nama_pj` AS `nama_pj`, `pj_barang`.`kode_barang` AS `kode_barang`, `pj_barang`.`domisili_pj` AS `domisili_pj`, `pj_barang`.`IS_DELETED` AS `IS_DELETED` FROM `pj_barang` WHERE `pj_barang`.`IS_DELETED` = 00  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`nip_peminjam`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `pj_barang`
--
ALTER TABLE `pj_barang`
  ADD PRIMARY KEY (`nip_pj`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
