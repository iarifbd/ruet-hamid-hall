-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2024 at 06:11 AM
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
-- Table structure for table `hostel_sit_plan`
--

CREATE TABLE `hostel_sit_plan` (
  `id` int(11) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `room_num` varchar(100) NOT NULL,
  `sit_num` varchar(100) NOT NULL,
  `S_Id` int(100) NOT NULL,
  `adate` date NOT NULL,
  `vdate` date NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'vacant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_sit_plan`
--

INSERT INTO `hostel_sit_plan` (`id`, `floor`, `room_num`, `sit_num`, `S_Id`, `adate`, `vdate`, `status`) VALUES
(1, '1', '104', '1', 20241, '2024-11-04', '0000-00-00', 'occupy'),
(2, '1', '104', '2', 20242, '2024-11-04', '0000-00-00', 'occupy'),
(3, '1', '104', '3', 0, '2024-11-04', '0000-00-00', 'vacant'),
(4, '1', '104', '4', 0, '2024-11-04', '0000-00-00', 'vacant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hostel_sit_plan`
--
ALTER TABLE `hostel_sit_plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hostel_sit_plan`
--
ALTER TABLE `hostel_sit_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
