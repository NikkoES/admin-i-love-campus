-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2018 at 06:00 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ilovekampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `username` varchar(34) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_extras`
--

CREATE TABLE `tb_extras` (
  `slider_1` text,
  `slider_2` text,
  `slider_3` text,
  `slider_4` text,
  `slider_5` text,
  `visi` text,
  `misi` text,
  `tentang` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_extras`
--

INSERT INTO `tb_extras` (`slider_1`, `slider_2`, `slider_3`, `slider_4`, `slider_5`, `visi`, `misi`, `tentang`) VALUES
('39611-slider-1.jpg', '36600-slider-2.jpg', '62203-slider-3.jpg', '30887-slider-4.jpg', '31450-slider-5.jpg', '<p>ini visi kampusnya yaa</p>', '<p>ini misi kampusnya</p>', '<p>kampus ini adalah yaa kan yaa</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_maps`
--

CREATE TABLE `tb_maps` (
  `id_member` int(8) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_maps`
--

INSERT INTO `tb_maps` (`id_member`, `latitude`, `longitude`) VALUES
(87654321, '2', '3'),
(44332211, '-6.921658', '107.606512'),
(87654321, '-6.898952', '107.585126'),
(11112211, '-6.900733', '107.625904');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(8) NOT NULL,
  `nama_member` varchar(34) NOT NULL,
  `detail_ruang` varchar(16) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(16) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama_member`, `detail_ruang`, `id_ruang`, `no_hp`, `email`, `alamat`, `password`, `status`) VALUES
(11111111, 'Muhammad Farid', 'detail juga', 3, '089812213', 'farid@gmail.com', 'Kuningan', 'farid', 0),
(11112211, 'Tes', 'detail', 5, '0890991318', 'tes@gmail.com', 'Bandung', 'tes', 1),
(11112222, 'Mislahul Umam', 'detail', 1, '0290991318', 'umam@gmail.com', 'Makasar', 'umam', 0),
(11223344, 'Aditya Permana', 'detail', 4, '090991318', 'adit@gmail.com', 'Jakarta', 'adit', 1),
(11888888, 'Saputra Eka', 'detail juga', 1, '0893812213', 'farid@gmail.com', 'Bandung', 'saputra', 1),
(12345678, 'Nikko Eka Saputra', 'ini detail', 5, '089812213', 'nikkoeka04@gmail.com', 'Jakarta', 'nikko', 1),
(44332211, 'Muhammad Rafif', 'detail ruang nya', 4, '0889113764', 'rafif@gmail.com', 'Bandung', 'rafif', 1),
(87654321, 'Ivanka Tri Agustin', 'percobaan detail', 3, '0891828937', 'ivanka@gmail.com', 'Bandung', 'ivanka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id_ruang` int(11) NOT NULL,
  `tipe_ruang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id_ruang`, `tipe_ruang`) VALUES
(1, 'Regular'),
(3, 'Umum I'),
(4, 'Umum II'),
(5, 'Eksekutif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_maps`
--
ALTER TABLE `tb_maps`
  ADD KEY `tb_maps_ibfk_1` (`id_member`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_maps`
--
ALTER TABLE `tb_maps`
  ADD CONSTRAINT `tb_maps_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`) ON DELETE CASCADE;

--
-- Constraints for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD CONSTRAINT `tb_member_ibfk_1` FOREIGN KEY (`id_ruang`) REFERENCES `tb_ruang` (`id_ruang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
