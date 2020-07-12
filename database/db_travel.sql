-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2020 pada 09.44
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `foto`, `email`, `password`) VALUES
(1, 'Anji', '7feff4d8cd38a4e59aad242e2227d3de.jpg', 'zakariabintang25@gmail.com', '123'),
(2, 'Akun Baru', '7feff4d8cd38a4e59aad242e2227d3de.jpg', 'ikhwan@gmail.com', 'aku'),
(3, 'admin', 'sniper bambu.jpg', 'admin@admin.admin', 'admin'),
(4, 'Neptuunia', 'Vol21-01.jpg', 'hentai@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver`
--

CREATE TABLE `driver` (
  `id` int(10) NOT NULL,
  `nama_driver` varchar(1000) NOT NULL,
  `foto_driver` varchar(1000) NOT NULL,
  `foto_sim` varchar(1000) NOT NULL,
  `foto_stnk` varchar(1000) NOT NULL,
  `foto_skck` varchar(1000) NOT NULL,
  `no_handphone` varchar(30) NOT NULL,
  `mobil` varchar(1000) NOT NULL,
  `tempat_duduk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `driver`
--

INSERT INTO `driver` (`id`, `nama_driver`, `foto_driver`, `foto_sim`, `foto_stnk`, `foto_skck`, `no_handphone`, `mobil`, `tempat_duduk`) VALUES
(14, 'Tio Indria Yusman', 'PAK DWI 1.png', 'PAK DWI 2.png', 'PAK DWI 3.png', 'PAK DWI 4.png', '082288419146', 'PAK DWI 5.png', '5'),
(15, 'Neptuunia', 'Eromanga Sensei - 6.png', 'Eromanga Sensei - 5.png', 'Eromanga Sensei - 4.png', 'Eromanga Sensei - 3.png', '085217317931', 'Eromanga Sensei - 2.png', '5'),
(16, 'KuroZanaGi', 'Fairy Tail - 2.jpg', 'Fairy Tail - 3.jpg', 'Fairy Tail - 4.jpg', 'Fairy Tail - 5.jpg', '1234567890', 'Fairy Tail - 6.png', '8'),
(17, 'IzHinNa', 'Zero No Tsukaima - 1.PNG', 'Zero No Tsukaima - 2.PNG', 'Zero No Tsukaima - 3.PNG', 'Zero No Tsukaima - 4.PNG', '1273817230170', 'Zero No Tsukaima - 5.PNG', '5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
