-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 05:10 AM
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
-- Database: `iarifbdi_ruet`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentledger`
--

CREATE TABLE `studentledger` (
  `id` int(100) NOT NULL,
  `gdate` date NOT NULL,
  `ldate` date NOT NULL,
  `tdate` date NOT NULL,
  `S_Id` int(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `acctype` varchar(100) DEFAULT NULL,
  `achead` varchar(100) NOT NULL,
  `dr` decimal(10,2) DEFAULT NULL,
  `cr` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `studentledger`
--

INSERT INTO `studentledger` (`id`, `gdate`, `ldate`, `tdate`, `S_Id`, `description`, `acctype`, `achead`, `dr`, `cr`, `balance`, `status`) VALUES
(1, '2024-01-01', '2024-01-31', '0000-00-00', 20241, 'hall', 'Dr', 'HC', 500.00, 0.00, 500.00, 'Paid'),
(2, '2024-01-01', '2024-01-31', '0000-00-00', 20242, 'hall', 'Dr', 'HC', 500.00, 0.00, 500.00, 'Due'),
(3, '2024-01-01', '2024-01-31', '0000-00-00', 20243, 'hall', 'Dr', 'HC', 500.00, 0.00, 500.00, 'Due');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentledger`
--
ALTER TABLE `studentledger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentledger`
--
ALTER TABLE `studentledger`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
