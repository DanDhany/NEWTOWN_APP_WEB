-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2018 at 03:33 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE `tbbarang` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jumlah` double NOT NULL,
  `hbeli` double NOT NULL,
  `hjual` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`kode`, `nama`, `satuan`, `jumlah`, `hbeli`, `hjual`) VALUES
('PAK1', 'Paku Payung', 'Buah', 270, 1600, 1800),
('PAK2', 'Paku Besi', 'Biji', 150, 1800, 1900),
('PAK3', 'Paku Beton', 'Biji', 120, 2000, 2500),
('PIP1', 'Pipa 10 Meter', 'Buah', 60, 12000, 15000),
('PIP2', 'Pipa Paralon 25 Meter', 'Buah', 17, 15650, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `tbldetail`
--

CREATE TABLE `tbldetail` (
  `kodetr` varchar(5) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldetail`
--

INSERT INTO `tbldetail` (`kodetr`, `kode`, `nama`, `satuan`, `jumlah`, `harga`) VALUES
('TR1', 'PAK2', 'Paku Besi', 'Biji', 150, 1800),
('TR1', 'PIP2', 'Pipa Paralon 25 Meter', 'Buah', 17, 15650),
('TR2', 'PAK1', 'Paku Payung', 'Buah', 17, 1600),
('TR3', 'PIP1', 'Pipa 10 Meter', 'Buah', 6, 15000),
('TR4', 'PIP1', 'Pipa 10 Meter', 'Buah', 5, 12000),
('TR5', 'PAK3', 'Paku Beton', 'Biji', 120, 2000),
('TR6', 'PAK1', 'Paku Payung', 'Buah', 10, 1600),
('TR7', 'ACP11', 'Air Conditioner', 'PCS', 3, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tbldetail_jual`
--

CREATE TABLE `tbldetail_jual` (
  `kodetr` varchar(5) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldetail_jual`
--

INSERT INTO `tbldetail_jual` (`kodetr`, `kode`, `nama`, `satuan`, `jumlah`, `harga`) VALUES
('TR1', 'PAK1', 'Paku Payung', 'Buah', 40, 1800),
('TR2', 'PAK1', 'Paku Payung', 'Buah', 3, 1800),
('TR2', 'PAK2', 'Paku Besi', 'Biji', 3, 1900),
('TR3', 'PIP1', 'Pipa 10 Meter', 'Buah', 9, 15000),
('TR3', 'PAK2', 'Paku Besi', 'Biji', 17, 1900),
('TR4', 'PAK1', 'Paku Payung', 'Buah', 3, 1800),
('TR4', 'PAK3', 'Paku Beton', 'Biji', 5, 2500),
('TR5', 'PIP1', 'Pipa 10 Meter', 'Buah', 2, 15000),
('TR6', 'PIP1', 'Pipa 10 Meter', 'Buah', 4, 15000),
('TR7', 'PAK2', 'Paku Besi', 'Biji', 4, 1900),
('TR8', 'PIP2', 'Pipa Paralon 25 Meter', 'Buah', 2, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `tblmaster`
--

CREATE TABLE `tblmaster` (
  `kodetr` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `total` int(9) NOT NULL,
  `diskon` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmaster`
--

INSERT INTO `tblmaster` (`kodetr`, `tanggal`, `supplier`, `alamat`, `telpon`, `total`, `diskon`) VALUES
('TR1', '2018-07-15', 'PT. Bangun Landmark', 'Thailand', '085607293703', 536050, 0),
('TR2', '2018-07-15', 'PT. Bangun Landmark', 'Thailand', '085607293703', 27200, 0),
('TR3', '2018-05-15', 'PT. Bangun Landmark', 'Thailand', '085607293703', 90000, 0),
('TR4', '2018-07-15', 'PT. Bangun Landmark', 'Thailand', '085607293703', 60000, 10),
('TR5', '2018-07-16', 'PT Serba Makmur', 'Deket Rumah', '085607293705', 240000, 0),
('TR6', '2018-07-17', 'PT Serba Makmur', 'Deket Rumah', '085607293705', 16000, 0),
('TR7', '2018-07-17', 'PT. Bangun Landmark', 'Thailand', '085607293703', 300000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblmaster_jual`
--

CREATE TABLE `tblmaster_jual` (
  `kodetr` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `pelanggan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `total` int(9) NOT NULL,
  `diskon` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmaster_jual`
--

INSERT INTO `tblmaster_jual` (`kodetr`, `tanggal`, `pelanggan`, `alamat`, `telpon`, `total`, `diskon`) VALUES
('TR1', '2018-07-15', 'adam', 'Juauh', '085607293705', 72000, 5),
('TR2', '2018-07-16', 'adam', 'Jauh', '085607293703', 11100, 2),
('TR3', '2018-07-16', 'prasta', 'Sidoarjo', '085607293130', 167300, 7),
('TR4', '2018-07-02', 'UIJ', 'IOJ', 'JKN', 17900, 10),
('TR5', '2018-07-17', 'UIJ', 'Gak tau', '085607293790', 30000, 0),
('TR6', '2018-07-16', 'KKKK', 'Disebuah Jalan', '085607293720', 60000, 0),
('TR7', '2018-07-16', 'KKKK', 'Perum. Pondok Jati AU-11', '085607293720', 7600, 0),
('TR8', '2018-07-17', 'wmdwk', 'knk', 'nknk', 34000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbsupplier`
--

CREATE TABLE `tbsupplier` (
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsupplier`
--

INSERT INTO `tbsupplier` (`nama`, `no_telp`, `alamat`) VALUES
('PT Serba Makmur', '085607293705', 'Deket Rumah'),
('PT. Bangun Landmark', '085607293703', 'Thailand');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `NIK` varchar(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` varchar(500) NOT NULL,
  `Telp` float NOT NULL,
  `Sex` varchar(12) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Tgl_lahir` date NOT NULL,
  `Akses` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`NIK`, `Nama`, `Alamat`, `Telp`, `Sex`, `Pass`, `Tgl_lahir`, `Akses`) VALUES
('KAR1', 'Ramadhany Krismaliq Sjamdra', 'jauh juga   ', 587654000000, 'Perempuan', '1101', '1998-11-01', 'A'),
('KAR2', 'Adam Rosyad', 'Jauh ', 85607300000, 'Laki-Laki', 'adamrosyad12', '1998-06-12', 'M'),
('KAR3', 'Orang Baru', 'Jauh Sekali   ', 8574420000, 'Perempuan', '4321', '2018-07-15', 'G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tblmaster`
--
ALTER TABLE `tblmaster`
  ADD PRIMARY KEY (`kodetr`);

--
-- Indexes for table `tblmaster_jual`
--
ALTER TABLE `tblmaster_jual`
  ADD PRIMARY KEY (`kodetr`);

--
-- Indexes for table `tbsupplier`
--
ALTER TABLE `tbsupplier`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`NIK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
