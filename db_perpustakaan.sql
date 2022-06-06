-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 05:47 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `no` int(11) NOT NULL,
  `nis` char(5) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `tp_lahir` varchar(32) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(16) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `kelas` varchar(32) NOT NULL,
  `alamat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`no`, `nis`, `nama`, `tp_lahir`, `tgl_lahir`, `jk`, `no_hp`, `email`, `kelas`, `alamat`) VALUES
(1, '0001', 'Tes Ngetes', 'Madura', '2021-04-06', ' Laki-Laki', '085000111222', 'test@mail.com', 'MIPA', 'Jakarta'),
(11, '00002', 'Pixie', 'NTT', '1995-04-18', ' Perempuan', '085012365478', 'pixie@mail.com', 'Bahasa', 'Surabaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
