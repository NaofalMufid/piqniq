-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2019 at 10:25 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piknik`
--

-- --------------------------------------------------------

--
-- Table structure for table `grup`
--

CREATE TABLE `grup` (
  `grup_id` int(11) NOT NULL,
  `nama_grup` varchar(10) NOT NULL,
  `tujuan_id` int(11) NOT NULL,
  `pendamping` varchar(50) NOT NULL,
  `seat` int(4) DEFAULT '0',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grup`
--

INSERT INTO `grup` (`grup_id`, `nama_grup`, `tujuan_id`, `pendamping`, `seat`, `keterangan`) VALUES
(1, 'Bus 1', 5, 'Pak A', 50, 'Grup untuk Prodi Arsitektur'),
(2, 'Bus 2', 6, 'Pak B', 50, 'Grup untuk Prodi Teknik Sipil'),
(3, 'Bus 4', 3, 'Pak D', 50, 'Grup untuk Prodi Manajemen Informatika '),
(4, 'Bus 5', 2, 'Pak E', 50, 'Grup untuk Prodi Teknik Informatika'),
(5, 'Bus 6', 1, 'Pak F', 50, 'Grup untuk Prodi Teknik Informatika'),
(6, 'Bus 3', 7, 'Pak C', 50, 'Grup untuk Prodi Teknik Sipil'),
(7, 'Bus 7', 8, 'Pak G', 50, 'Grup untuk Prodi Teknik Sipil');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `kamar_id` int(11) NOT NULL,
  `nama_kamar` varchar(50) NOT NULL,
  `isi` int(4) DEFAULT '0',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kamar_id`, `nama_kamar`, `isi`, `keterangan`) VALUES
(1, 'Kamar HP-1', 4, 'Kamar perempuan antara HP-1 sampai HP-10'),
(2, 'Kamar HP-2', 4, 'Kamar perempuan antara HP-1 sampai HP-10'),
(3, 'Kamar HP-3', 4, 'Kamar perempuan antara HP-1 sampai HP-10'),
(4, 'Kamar HP-4', 4, 'Kamar perempuan antara HP-1 sampai HP-10'),
(5, 'Kamar HP-5', 4, 'Kamar perempuan antara HP-1 sampai HP-10'),
(6, 'Kamar HP-6', 4, 'Kamar perempuan antara HP-1 sampai HP-10'),
(7, 'Kamar HP-7', 4, 'Kamar perempuan antara HP-1 sampai HP-10'),
(8, 'Kamar HP-8', 4, 'Kamar perempuan antara HP-1 sampai HP-10'),
(9, 'Kamar HP-9', 4, 'Kamar perempuan antara HP-1 sampai HP-10'),
(10, 'Kamar HP-10', 4, 'Kamar perempuan antara HP-1 sampai HP-10'),
(11, 'Kamar HL-1', 4, 'Kamar laki antara HL-1 sampai HL-10'),
(12, 'Kamar HL-2', 4, 'Kamar laki antara HL-1 sampai HL-10'),
(13, 'Kamar HL-3', 4, 'Kamar laki antara HL-1 sampai HL-10'),
(14, 'Kamar HL-4', 4, 'Kamar laki antara HL-1 sampai HL-10'),
(15, 'Kamar HL-5', 4, 'Kamar laki antara HL-1 sampai HL-10'),
(16, 'Kamar HL-6', 4, 'Kamar laki antara HL-1 sampai HL-10'),
(17, 'Kamar HL-7', 4, 'Kamar laki antara HL-1 sampai HL-10'),
(18, 'Kamar HL-8', 4, 'Kamar laki antara HL-1 sampai HL-10'),
(19, 'Kamar HL-9', 4, 'Kamar laki antara HL-1 sampai HL-10'),
(20, 'Kamar HL-10', 4, 'Kamar laki antara HL-1 sampai HL-10');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `peserta_id` int(10) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `kelas` enum('A','B') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `tiket_id` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `grup_id` int(11) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `tujuan_id` int(11) NOT NULL,
  `nama_tujuan` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`tujuan_id`, `nama_tujuan`, `prodi`, `image`, `keterangan`) VALUES
(1, 'Tokopedia Office', 'Teknik Informatika', '305927767.jpg', 'Tokopedia merupakan perusahaan teknologi Indonesia dengan misi mencapai pemerataan ekonomi secara digital. Sejak didirikan pada tahun 2009, Tokopedia telah bertransformasi menjadi sebuah unicorn yang berpengaruh tidak hanya di Indonesia tetapi juga di Asia Tenggara'),
(2, 'Bukalapak Office', 'Teknik Informatika', '749951807.jpg', 'Bukalapak merupakan salah satu pusat perbelanjaan daring di Indonesia yang dimiliki dan dijalankan oleh PT. Bukalapak. Bukalapak didirikan pada 10 Januari 2010 oleh Achmad Zaky, Nugroho Herucahyono, dan Fajrin Rasyid di sebuah rumah kos di Bandung, Jawa Barat.'),
(3, 'Shopee Office', 'Manajemen Informatika', '534754791.jpeg', 'Shopee Indonesia punya kantor baru di kawasan SCBD, yakni di Pacific Century Place Tower.'),
(5, 'Agung Podomoro Land', 'Arsitek', '1211243616.jpg', 'PT Agung Podomoro Land merupakan konsorsium dari tujuh pengembang properti. Mereka dikenal telah membangun delapan proyek prestisius di Jakarta dan Bandung'),
(6, 'Sinar Mas Land', 'Teknik Sipil', '1351702288.jpg', ''),
(7, 'MRT DKI Jakarta', 'Teknik Sipil', '1203649290.jpg', 'MRT Jakarta, singkatan dari Mass Rapid Transit Jakarta, Moda Raya Terpadu atau Angkutan Cepat Terpadu Jakarta adalah sebuah sistem transportasi transit cepat menggunakan kereta rel listrik yang sedang dibangun di Jakarta'),
(8, 'PT. Pindad', 'Teknik Mesin', '1635522955.jpg', 'PT Pindad adalah perusahaan industri dan manufaktur yang bergerak dalam pembuatan produk militer dan komersial di Indonesia dan memperkerjakan sekitar 3000 karyawan.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`grup_id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kamar_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`peserta_id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`tiket_id`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`tujuan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `grup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `kamar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `peserta_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `tiket_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `tujuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
