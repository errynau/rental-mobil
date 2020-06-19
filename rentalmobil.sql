-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2018 at 07:06 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id5721383_rentalmobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `tahun` int(4) NOT NULL,
  `plat` varchar(25) NOT NULL,
  `biaya` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `merk`, `tahun`, `plat`, `biaya`, `status`) VALUES
(3, 'AVANZA', 1997, 'H-9031-BC', 0, 1),
(5, 'Kijang Inova', 2008, 'K-4531-HB', 0, 1),
(6, 'Honda Mobilio', 2015, 'K-1716-RF', 0, 1),
(7, 'ELF', 2008, 'K-4465-BG', 0, 1),
(8, 'Pajero Sport', 2018, 'K-1997-FW', 0, 1),
(11, 'Fortuner', 2004, 'B-3012-CH', 0, 1),
(12, 'Ayla', 2009, 'k-2645-CH', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_nota` varchar(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `no_ktp` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `biaya` int(10) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_nota`, `tanggal_transaksi`, `nama_pelanggan`, `no_ktp`, `alamat`, `biaya`, `id_mobil`, `id_user`) VALUES
(18, 'SMD0001', '2018-05-11', 'Moh Suripto', 553377829, 'Tayu,Pati', 750000, 3, 1),
(19, 'SMD0002', '2018-05-11', 'Adi Sucipto', 2147483647, 'Solo,Klaten', 650000, 5, 1),
(20, 'SMD0003', '2018-05-11', 'Heri Wibawa', 2147483647, 'Kendal,Brangsong', 800000, 11, 1),
(21, 'SMD0004', '2018-05-14', 'Holong', 2147483647, 'Mangkang,Semarang', 600000, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'fatta', '2be3bfc5778e7cb0612e9ba4c46f1380', 'Fatta Wijaya', 1),
(2, 'rifa', '4797a79a801d05ef1bc5345edaa69cd6', 'Rifa Afifah', 1),
(7, 'feri', '4c850dbd4128e75d16f407a9188e2aab', 'Feri Aditya', 1),
(9, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir 1', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

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
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
