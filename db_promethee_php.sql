-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Mar 2015 pada 15.13
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_promethee_php`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE IF NOT EXISTS `alternatif` (
`id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(200) DEFAULT NULL,
  `deskripsi` text
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`, `deskripsi`) VALUES
(1, 'Galaxy', 'Galaxy Galaxy Galaxy Galaxy Galaxy Galaxy Galaxy Galaxy Galaxy Galaxy Galaxy Galaxy \r\n\r\nGalaxy Galaxy Galaxy Galaxy Galaxy Galaxy Galaxy Galaxy Galaxy Galaxy '),
(2, 'Iphone', 'Iphone Iphone Iphone Iphone Iphone Iphone Iphone Iphone Iphone Iphone Iphone Iphone \r\n\r\nIphone Iphone Iphone Iphone Iphone Iphone Iphone Iphone Iphone Iphone Iphone Iphone '),
(3, 'BB', 'BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB \r\n\r\nBB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB BB '),
(4, 'Lumia', 'Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia \r\n\r\nLumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia Lumia ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif_kriteria`
--

CREATE TABLE IF NOT EXISTS `alternatif_kriteria` (
`id_alternatif_kriteria` int(11) NOT NULL,
  `id_alternatif` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif_kriteria`
--

INSERT INTO `alternatif_kriteria` (`id_alternatif_kriteria`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, 3500),
(2, 1, 2, 70),
(3, 1, 3, 10),
(4, 1, 4, 80),
(5, 1, 5, 1),
(6, 1, 6, 36),
(7, 2, 1, 4500),
(8, 2, 2, 90),
(9, 2, 3, 10),
(10, 2, 4, 60),
(11, 2, 5, 5),
(12, 2, 6, 48),
(13, 3, 1, 4000),
(14, 3, 2, 80),
(15, 3, 3, 9),
(16, 3, 4, 90),
(17, 3, 5, 2),
(18, 3, 6, 48),
(19, 4, 1, 4000),
(20, 4, 2, 70),
(21, 4, 3, 8),
(22, 4, 4, 50),
(23, 4, 5, 4),
(24, 4, 6, 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
`id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  `minmaks` varchar(50) DEFAULT NULL,
  `tipe_preferensi` varchar(200) DEFAULT NULL,
  `q` double DEFAULT NULL,
  `p` double DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `minmaks`, `tipe_preferensi`, `q`, `p`) VALUES
(1, 'Harga', 0.2, 'minimasi', 'IV', 500, 1000),
(2, 'Kualitas', 0.25, 'maksimasi', 'III', 0, 20),
(3, 'Fitur', 0.2, 'maksimasi', 'III', 0, 2),
(4, 'Populer', 0.125, 'maksimasi', 'II', 20, 0),
(5, 'Pelayanan Garansi', 0.125, 'minimasi', 'V', 1, 2),
(6, 'Keawetan', 0.1, 'maksimasi', 'I', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
 ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `alternatif_kriteria`
--
ALTER TABLE `alternatif_kriteria`
 ADD PRIMARY KEY (`id_alternatif_kriteria`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`username`);
 
--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `alternatif_kriteria`
--
ALTER TABLE `alternatif_kriteria`
  MODIFY `id_alternatif_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
