-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 15, 2020 at 05:42 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `foto`, `email`, `password`) VALUES
(1, 'Anji', '7feff4d8cd38a4e59aad242e2227d3de.jpg', 'zakariabintang25@gmail.com', '123'),
(2, 'Akun Baru', '7feff4d8cd38a4e59aad242e2227d3de.jpg', 'ikhwan@gmail.com', 'aku'),
(3, 'admin', 'sniper bambu.jpg', 'admin@admin.admin', 'admin'),
(4, 'Neptuunia', 'Teknik Informatika.jpg', 'hentai@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `armada`
--

CREATE TABLE `armada` (
  `id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `kota_asal` varchar(50) NOT NULL,
  `kota_tujuan` varchar(50) NOT NULL,
  `waktu_keberangkatan` varchar(20) NOT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `harga_tiket` int(11) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `kursi_tersedia` int(11) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `armada`
--

INSERT INTO `armada` (`id`, `driver_id`, `kota_asal`, `kota_tujuan`, `waktu_keberangkatan`, `kelas`, `harga_tiket`, `jumlah_kursi`, `kursi_tersedia`, `catatan`) VALUES
(1, 15, 'Pekanbaru', 'Rengat', '1597824426000', 'Eksekutif', 160000, 5, 0, ''),
(2, 15, 'Pekanbaru', 'Rengat', '1597824426000', 'Eksekutif', 160000, 5, 2, ''),
(3, 15, 'Pekanbaru', 'Rengat', '1597824426300', 'Ekonomi', 120000, 7, 4, ''),
(4, 15, 'Pekanbaru', 'Rengat', '1597824426303', 'Ekonomi', 120000, 7, 2, ''),
(10, 15, 'Pekanbaru', 'Rengat', '1597899000000', '', 150000, 5, 3, 'oke'),
(11, 15, 'Pekanbaru', 'Rengat', '1597899000000', '', 150000, 5, 4, 'oke'),
(12, 15, 'Pekanbaru', 'Rengat', '1597899540000', '', 100000, 7, 3, ''),
(13, 15, 'Pekanbaru', 'Rengat', '1597899960000', '', 100000, 10, 3, ''),
(14, 15, 'Rengat', 'Pekanbaru', '1597824426444', 'Ekonomi', 360000, 7, 7, ''),
(15, 15, 'Rengat', 'Pekanbaru', '1600103700000', '', 200000, 5, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(10) NOT NULL,
  `nama_driver` varchar(1000) NOT NULL,
  `foto_driver` varchar(1000) NOT NULL,
  `foto_sim` varchar(1000) NOT NULL,
  `foto_stnk` varchar(1000) NOT NULL,
  `foto_skck` varchar(1000) NOT NULL,
  `no_handphone` varchar(30) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `nama_mobil` varchar(100) DEFAULT NULL,
  `mobil` varchar(1000) NOT NULL,
  `tim_travel` varchar(1000) NOT NULL,
  `tempat_duduk` varchar(10) NOT NULL,
  `kelas` varchar(1000) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `nama_driver`, `foto_driver`, `foto_sim`, `foto_stnk`, `foto_skck`, `no_handphone`, `no_rekening`, `nama_mobil`, `mobil`, `tim_travel`, `tempat_duduk`, `kelas`, `email`, `password`) VALUES
(15, 'Tio Indria Yusman', 'Fairy Tail - 2.jpg', 'Fairy Tail - 2.jpg', 'Fairy Tail - 3.jpg', 'Fairy Tail - 4.jpg', '082288419155', '123123123', 'Toyota Innova Reborn', 'Fairy Tail - 6.png', 'Neptuunia', '10', 'Super VVIP', 'tio@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanantiket`
--

CREATE TABLE `pemesanantiket` (
  `kode_pemesanan` varchar(25) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `armada_id` int(11) NOT NULL,
  `kursi_pesanan` int(11) NOT NULL,
  `catatan` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanantiket`
--

INSERT INTO `pemesanantiket` (`kode_pemesanan`, `user_id`, `armada_id`, `kursi_pesanan`, `catatan`, `latitude`, `longitude`, `status`) VALUES
('1597845298445', 1, 1, 2, '', '12', '15', 'ACCEPTED'),
('1597937670827', 2, 2, 2, '', '0', '0', 'ACCEPTED'),
('1597938009629', 2, 3, 2, '', '0', '0', 'ACCEPTED'),
('1597938106739', 2, 13, 3, '', '0', '0', 'ACCEPTED'),
('1597940828243', 1, 4, 5, 'Gas', '0', '0', 'ACCEPTED'),
('1597940949198', 1, 13, 4, 'Catatan', '0', '0', 'ACCEPTED'),
('1598079668297', 4, 12, 1, 'Pick up location updated', '-6.29467047626077', '106.62762321531773', 'ACCEPTED'),
('1598079917272', 4, 12, 1, 'one more', '-6.2966253', '106.6279269', 'ACCEPTED'),
('1598084002728', 3, 3, 2, '', '-6.15399338437951', '106.63362499326468', 'REJECTED'),
('1598092941544', 2, 13, 3, '', '0.0', '0.0', 'REJECTED'),
('1598095010293', 2, 13, 4, '', '0.0', '0.0', 'ACCEPTED'),
('1598108357680', 2, 10, 1, '', '0.0', '0.0', 'REJECTED'),
('1598119555214', 4, 11, 1, '', '-6.2966374', '106.6279126', 'PENDING'),
('1598119619509', 4, 3, 1, '', '-6.296624', '106.6279261', 'PENDING'),
('1598119816141', 4, 10, 1, '', '-6.2966241', '106.6279255', 'PENDING'),
('1598160062633', 4, 12, 2, 'Edit note', '-6.2966253', '106.6279277', 'PENDING'),
('1598160237059', 2, 10, 1, '', '0.0', '0.0', 'PENDING'),
('1598160265243', 2, 1, 3, '', '0.0', '0.0', 'PENDING'),
('1598160370676', 2, 2, 1, '', '0.0', '0.0', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(15) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_user`, `email`, `password`, `phone_number`) VALUES
(1, 'Guin', 'guin@gmail.com', '12345', '080876891243'),
(2, 'VSCode', 'vscode@gmail.com', '12345', '085567879021'),
(3, 'Android', 'android@gmail.com', '12345', '085798653265'),
(4, 'iOS', 'ios@gmail.com', '12345', '085732145698');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanantiket`
--
ALTER TABLE `pemesanantiket`
  ADD UNIQUE KEY `kode_pemesanan` (`kode_pemesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `armada`
--
ALTER TABLE `armada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
