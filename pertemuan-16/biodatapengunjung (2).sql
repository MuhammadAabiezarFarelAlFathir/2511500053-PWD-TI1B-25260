-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 22, 2026 at 04:40 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodatapengunjung`
--

CREATE TABLE `biodatapengunjung` (
  `CCid` int NOT NULL,
  `CKodePengunjung` varchar(20) NOT NULL,
  `CNamaPengunjung` varchar(100) DEFAULT NULL,
  `CAlamatRumah` varchar(100) DEFAULT NULL,
  `CTanggalKunjungan` varchar(100) DEFAULT NULL,
  `CHobi` varchar(100) DEFAULT NULL,
  `CAsalSLTA` varchar(100) DEFAULT NULL,
  `CPekerjaan` varchar(100) DEFAULT NULL,
  `CNamaOrangTua` varchar(100) DEFAULT NULL,
  `CNamaPacar` varchar(100) DEFAULT NULL,
  `CNamaMantan` varchar(100) DEFAULT NULL,
  `DcreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `biodatapengunjung`
--

INSERT INTO `biodatapengunjung` (`CCid`, `CKodePengunjung`, `CNamaPengunjung`, `CAlamatRumah`, `CTanggalKunjungan`, `CHobi`, `CAsalSLTA`, `CPekerjaan`, `CNamaOrangTua`, `CNamaPacar`, `CNamaMantan`, `DcreatedAt`) VALUES
(2, 'test1222', 'testss', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '2026-01-22 04:37:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodatapengunjung`
--
ALTER TABLE `biodatapengunjung`
  ADD PRIMARY KEY (`CCid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodatapengunjung`
--
ALTER TABLE `biodatapengunjung`
  MODIFY `CCid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
