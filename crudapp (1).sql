-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2023 at 10:24 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `no_anggota` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `wajib` int NOT NULL,
  `pokok` int NOT NULL,
  `saldo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`no_anggota`, `nama`, `wajib`, `pokok`, `saldo`) VALUES
(232, 'ramdoni', 900, 20000, 100000),
(3434, 'angela mangunkosmo kapelag kebo', 454345, 3453435, 345435435),
(7878, 'yghg', 767, 67, 6767),
(9442, 'kopi kopyot', 6556, 536, 356),
(34343, 'Ramdoni Ganteng', 6000, 553, 35),
(42442, 'kiop', 94949, 39493, 3543435),
(45354, 'asd', 989, 8989, 8989),
(676575, 'hyhyhyh', 676, 76, 6767),
(5756764, 'sdfdsf', 435345, 34543, 345435);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kasir`
--

CREATE TABLE `tbl_kasir` (
  `kodeksr` int NOT NULL,
  `namaksr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alias` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kasir`
--

INSERT INTO `tbl_kasir` (`kodeksr`, `namaksr`, `alias`, `alamat`, `password`) VALUES
(1, 'admin', '', '', 'admin'),
(2583, 'jokowi', 'joko widodo', 'solo', '1234'),
(7876, 'joki', 'joko widodo', 'kopi keli', '23456'),
(8080, 'webserver', 'erbserperapache', 'localhost1234', '1234'),
(9891, 'donnyg', 'ramdoni', 'kp karet', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `no_pinjam` int NOT NULL,
  `tanggal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_angota` int NOT NULL,
  `jmlpinjam` int NOT NULL,
  `kodeksr` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_simpan`
--

CREATE TABLE `tbl_simpan` (
  `no_simpan` int NOT NULL,
  `tanggal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_anggota` int NOT NULL,
  `jmlsimpan` int NOT NULL,
  `kodeksr` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`no_anggota`);

--
-- Indexes for table `tbl_kasir`
--
ALTER TABLE `tbl_kasir`
  ADD PRIMARY KEY (`kodeksr`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`no_pinjam`),
  ADD KEY `FK_noanggota` (`no_angota`),
  ADD KEY `FK_kdksr` (`kodeksr`);

--
-- Indexes for table `tbl_simpan`
--
ALTER TABLE `tbl_simpan`
  ADD PRIMARY KEY (`no_simpan`),
  ADD KEY `Fk_cashier` (`kodeksr`),
  ADD KEY `fk_angg` (`no_anggota`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD CONSTRAINT `FK_kdksr` FOREIGN KEY (`kodeksr`) REFERENCES `tbl_kasir` (`kodeksr`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_noanggota` FOREIGN KEY (`no_angota`) REFERENCES `tbl_anggota` (`no_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_simpan`
--
ALTER TABLE `tbl_simpan`
  ADD CONSTRAINT `fk_angg` FOREIGN KEY (`no_anggota`) REFERENCES `tbl_anggota` (`no_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Fk_cashier` FOREIGN KEY (`kodeksr`) REFERENCES `tbl_kasir` (`kodeksr`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
