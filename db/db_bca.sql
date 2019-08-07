-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2017 at 03:38 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bca`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `kd_bank` char(4) NOT NULL,
  `nm_bank` varchar(50) NOT NULL,
  `alamat_bank` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`kd_bank`, `nm_bank`, `alamat_bank`, `no_telp`) VALUES
('0108', 'KCU Tangerang', 'Tangerang', '02190909090'),
('6890', 'MH Thamrin Tangerang', 'Tangerang', '02111110000'),
('8280', 'Merdeka Mas', 'Tangerang', '02111000011');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_dokumen`
--

CREATE TABLE IF NOT EXISTS `jenis_dokumen` (
  `kd_dokumen` char(3) NOT NULL,
  `nm_dokumen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_dokumen`
--

INSERT INTO `jenis_dokumen` (`kd_dokumen`, `nm_dokumen`) VALUES
('510', 'Tarikan'),
('511', 'Setoran'),
('512', 'Pemindahan'),
('513', 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` char(8) NOT NULL,
  `nm_pegawai` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `kd_bank` char(4) NOT NULL,
  `password` varchar(15) NOT NULL,
  `foto` text NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `no_transaksi` char(13) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nip` char(8) NOT NULL,
  `kd_dokumen` char(3) NOT NULL DEFAULT '',
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`kd_bank`);

--
-- Indexes for table `jenis_dokumen`
--
ALTER TABLE `jenis_dokumen`
  ADD PRIMARY KEY (`kd_dokumen`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`,`kd_bank`),
  ADD KEY `kd_bank` (`kd_bank`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`,`nip`,`kd_dokumen`),
  ADD KEY `kd_dokumen` (`kd_dokumen`),
  ADD KEY `nip` (`nip`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`kd_bank`) REFERENCES `bank` (`kd_bank`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`kd_dokumen`) REFERENCES `jenis_dokumen` (`kd_dokumen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
