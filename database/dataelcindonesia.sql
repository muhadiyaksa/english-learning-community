-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2021 pada 17.51
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataelcindonesia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataidpwuser`
--

CREATE TABLE `dataidpwuser` (
  `iduser` varchar(30) NOT NULL,
  `pwuser` varchar(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tanggallahir` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `jeniskelamin` varchar(30) DEFAULT NULL,
  `alasan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dataidpwuser`
--

INSERT INTO `dataidpwuser` (`iduser`, `pwuser`, `nama`, `notelp`, `email`, `tanggallahir`, `alamat`, `kota`, `provinsi`, `jeniskelamin`, `alasan`) VALUES
('ayas', 'qwerty1212', 'Muhamad Adi Ayas', '87893319999', 'ayas@gmail.com', '', 'Jl. Mustika Ratu ,Gn. Masjid No 39', 'Jakarta Timur', 'DKI Jakarta', 'Laki-Laki', 'Ingin lancar berbahasa inggris dan memiliki teman yang membantu dalam belajar '),
('yaksa', 'yaksa123', 'Muhamad Adi Yaksa', '87898984343', 'muhadiyaksa@gmail.com', '', 'Jl. Mustika Ratu , Gn. Masjid Nurul Hidayah RT04/R', 'Jakarta Timur', 'DKI Jakarta', 'Laki-Laki', 'Ingin bisa berbahasa inggris dan menguasainya dengan orang-orang yang sama-sama mau');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
