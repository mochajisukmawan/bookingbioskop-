-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2019 pada 09.08
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelbus1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursi`
--

CREATE TABLE `kursi` (
  `kursi_id` varchar(3) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `berangkat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_transaksi` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tgl` date NOT NULL,
  `jalur` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `jml_kursi` int(5) NOT NULL,
  `tmpt_ddk` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE `penumpang` (
  `no` int(100) NOT NULL,
  `nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `jalur` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tmpt_ddk` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rutetravel`
--

CREATE TABLE `rutetravel` (
  `id` int(11) NOT NULL,
  `jalur` varchar(11) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rutetravel`
--

INSERT INTO `rutetravel` (`id`, `jalur`) VALUES
(1, 'Semarang'),
(2, 'Brebes');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`kursi_id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `rutetravel`
--
ALTER TABLE `rutetravel`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
