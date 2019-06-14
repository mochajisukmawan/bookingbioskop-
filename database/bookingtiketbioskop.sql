-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2019 at 10:26 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookingtiketbioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `judul_film` varchar(50) NOT NULL,
  `durasi` int(11) NOT NULL,
  `kategori_film` enum('2D','3D') DEFAULT '2D',
  PRIMARY KEY (`id_film`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `judul_film`, `durasi`, `kategori_film`) VALUES
(1, 'Bumblebee', 113, '3D'),
(2, 'Aquaman', 143, '2D'),
(3, 'SPIDER-MAN : INTO THE SPIDER-VERSE', 116, '2D'),
(4, 'MILLY & MAMET', 101, '2D'),
(5, 'ASAL KAU BAHAGIA', 88, '2D');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `id_film` int(11) NOT NULL,
  `id_studio` enum('1','2','3','4','5') NOT NULL,
  `id_jam_tayang` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_film`, `id_studio`, `id_jam_tayang`) VALUES
(1, 1, '1', 1),
(2, 1, '1', 4),
(3, 1, '1', 8),
(4, 1, '1', 12),
(5, 3, '2', 1),
(6, 3, '2', 4),
(7, 5, '3', 3),
(8, 5, '3', 5),
(9, 2, '4', 2),
(10, 2, '4', 7);

-- --------------------------------------------------------

--
-- Table structure for table `jam_tayang`
--

CREATE TABLE IF NOT EXISTS `jam_tayang` (
  `id_jam_tayang` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_jam_tayang` varchar(25) NOT NULL,
  PRIMARY KEY (`id_jam_tayang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jam_tayang`
--

INSERT INTO `jam_tayang` (`id_jam_tayang`, `waktu_jam_tayang`) VALUES
(1, '08.00 - 10.00'),
(2, '10.00 - 12.00 ');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE IF NOT EXISTS `kursi` (
  `kursiid` varchar(3) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`kursiid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`kursiid`, `judul`, `jam`) VALUES
('B3', 'Aquaman', '00:00:00'),
('B4', 'Aquaman', '00:00:00'),
('D1', 'ASAL KAU BAHAGIA', '00:00:00'),
('E1', 'ASAL KAU BAHAGIA', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_transaksi` int(100) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jalur` varchar(30) NOT NULL,
  `jml_kursi` int(5) NOT NULL,
  `tmp_duduk` varchar(100) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_transaksi`, `id_jadwal`, `tgl`, `jalur`, `jml_kursi`, `tmp_duduk`) VALUES
(24, 9, '0000-00-00', 'Aquaman', 2, 'B3,B4'),
(25, 9, '0000-00-00', 'Aquaman', 2, 'B3,B4'),
(26, 9, '0000-00-00', 'Aquaman', 2, 'B3,B4'),
(27, 9, '0000-00-00', 'Aquaman', 2, 'B3,B4'),
(28, 9, '0000-00-00', 'Aquaman', 2, 'B3,B4'),
(29, 9, '0000-00-00', 'Aquaman', 2, 'B3,B4'),
(30, 9, '0000-00-00', 'Aquaman', 2, 'B3,B4'),
(31, 9, '0000-00-00', 'Aquaman', 2, 'B3,B4'),
(32, 9, '0000-00-00', 'Aquaman', 2, 'B3,B4'),
(33, 9, '0000-00-00', 'Aquaman', 2, 'B3,B4'),
(34, 9, '0000-00-00', 'Aquaman', 2, 'B3,B4'),
(35, 9, '0000-00-00', 'Aquaman', 2, 'B3,B4'),
(36, 7, '0000-00-00', 'ASAL KAU BAHAGIA', 2, 'D1,E1'),
(37, 7, '0000-00-00', 'ASAL KAU BAHAGIA', 2, 'D1,E1');

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE IF NOT EXISTS `penumpang` (
  `no` int(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jalur` varchar(30) NOT NULL,
  `tmp_duduk` varchar(100) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE IF NOT EXISTS `studio` (
  `id_studio` int(11) NOT NULL AUTO_INCREMENT,
  `nama_studio` varchar(30) NOT NULL,
  `jumlah_kursi` int(3) NOT NULL,
  PRIMARY KEY (`id_studio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`id_studio`, `nama_studio`, `jumlah_kursi`) VALUES
(1, 'A', 40),
(2, 'B', 35),
(3, 'C', 50),
(4, 'D', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jml_kursi` int(5) NOT NULL,
  PRIMARY KEY (`id_tiket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'bk', 'bk', '7e7ec59d1f4b21021577ff562dc3d48b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
