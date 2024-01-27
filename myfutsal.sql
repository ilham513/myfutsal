-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2024 at 10:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myfutsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(255) NOT NULL,
  `nama_penyewa` varchar(255) NOT NULL,
  `waktu_sewa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nama_penyewa`, `waktu_sewa`) VALUES
(1, 'Buyung Bujang FC', 'Senin, 08:00 - 12:00'),
(2, 'Galang and Friend', 'Rabu, 11:00 - 13:30'),
(3, 'Pahwalan Patriot FC', 'Kamis, 08:00 - 10:30'),
(4, 'Futsal Harapan Indah', 'Selasa, 11:00 - 13:30'),
(5, 'Warga 07', 'Senin, 19:00 - 21:30 '),
(6, 'Gatot FC', 'Senin, 11:00 - 13:30'),
(7, 'SSB Dewanata', 'Rabu, 08:00 - 10:30'),
(8, 'Mekar Sari FC', 'Jumat, 08:00 - 10:30'),
(9, 'Football 88', 'Selasa, 08:00 - 10:30'),
(10, 'Bekasi Jaya', 'Senin, 14:00 - 16:30'),
(11, 'Duren Jaya CLub', 'Sabtu, 08:00 - 10:30');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `id_penyewa` int(255) NOT NULL,
  `nama_penyewa` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id_penyewa`, `nama_penyewa`, `no_telp`) VALUES
(3, 'Buyung Bujang FC', '081204197641'),
(4, 'Gatot FC', '081354726722'),
(5, 'Bekasi Jaya', '081497326218'),
(6, 'Warga 07', '085705665696'),
(7, 'Football 88', '089236441689'),
(8, 'SSB Dewanata', '081552963242'),
(11, 'Pahwalan Patriot FC', '-'),
(13, 'Mekar Sari FC', '089986647267'),
(14, 'Duren Jaya CLub', '08994775636'),
(15, 'Futsal Harapan Indah', '089987152236'),
(16, 'Galang and Friend', '08998995738');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_sewa`
--

CREATE TABLE `waktu_sewa` (
  `id_waktu_sewa` int(255) NOT NULL,
  `nama_hari` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `waktu_sewa`
--

INSERT INTO `waktu_sewa` (`id_waktu_sewa`, `nama_hari`, `jam`) VALUES
(1, 'Senin', '08:00 - 12:00'),
(2, 'Senin', '11:00 - 13:30'),
(3, 'Senin', '14:00 - 16:30'),
(4, 'Senin', '19:00 - 21:30 '),
(5, 'Selasa', '08:00 - 10:30'),
(6, 'Rabu', '08:00 - 10:30'),
(7, 'Kamis', '08:00 - 10:30'),
(8, 'Jumat', '08:00 - 10:30'),
(9, 'Sabtu', '08:00 - 10:30'),
(10, 'Selasa', '11:00 - 13:30'),
(11, 'Rabu', '11:00 - 13:30'),
(12, 'Kamis', '11:00 - 13:30'),
(13, 'Jumat', '11:00 - 13:30'),
(14, 'Sabtu', '11:00 - 13:30'),
(15, 'Selasa', '14:00 - 16:30'),
(16, 'Rabu', '14:00 - 16:30'),
(17, 'Kamis', '14:00 - 16:30'),
(18, 'Jumat', '14:00 - 16:30'),
(19, 'Sabtu', '14:00 - 16:30'),
(20, 'Selasa', '19:00 - 21:30'),
(21, 'Rabu', '19:00 - 21:30'),
(22, 'Kamis', '19:00 - 21:30'),
(23, 'Jumat', '19:00 - 21:30'),
(24, 'Sabtu', '19:00 - 21:30'),
(25, 'Minggu', '20:00 - 22:30'),
(27, 'Minggu', '22:00 - 23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD UNIQUE KEY `waktu_sewa` (`waktu_sewa`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indexes for table `waktu_sewa`
--
ALTER TABLE `waktu_sewa`
  ADD PRIMARY KEY (`id_waktu_sewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `waktu_sewa`
--
ALTER TABLE `waktu_sewa`
  MODIFY `id_waktu_sewa` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
