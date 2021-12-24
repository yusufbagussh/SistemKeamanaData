-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 11:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akunsiswa`
--

CREATE TABLE `tb_akunsiswa` (
  `nis` int(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password_md5` varchar(255) NOT NULL,
  `pin_sha1` varchar(255) NOT NULL,
  `enkripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akunsiswa`
--

INSERT INTO `tb_akunsiswa` (`nis`, `nama`, `username`, `email`, `password_md5`, `pin_sha1`, `enkripsi`) VALUES
(11, 'Muadz Varokah', 'MUADZ', 'muadzyo@gmail.com', '41a93a89579ff675601eb96ff2e9b37f', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'NWDHE'),
(12, 'Indra Kusuma Ananta Adimanggala', 'INDRA', 'indra@gmail.com', 'e24f6e3ce19ee0728ff1c443e4ff488d', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'JOESB'),
(13, 'Dito Rizky Maulana', 'DITO', 'dito@gmail.com', 'f6943b8c64042f28124e7c73c62ebde1', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'EJUP'),
(14, 'Nova Widi', 'NOVA', 'nova@gmail.com', '1a9c91f6e0310d4f55b7ee7f22c2c9df', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'OPWB'),
(15, 'Paijo Bin Joko', 'PAIJO', 'paijo@gmail.com', '44529fdc8afb86d58c6c02cd00c02e43', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'QCLNT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akunsiswa`
--
ALTER TABLE `tb_akunsiswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akunsiswa`
--
ALTER TABLE `tb_akunsiswa`
  MODIFY `nis` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
