-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 06:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nestdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `child_movement`
--

CREATE TABLE `child_movement` (
  `date` date NOT NULL,
  `name` varchar(300) NOT NULL,
  `place` varchar(300) NOT NULL,
  `purpose` varchar(300) NOT NULL,
  `acc_person` varchar(300) NOT NULL,
  `dep_date` date NOT NULL,
  `return_date` date NOT NULL,
  `remark` varchar(300) NOT NULL,
  `child_sign` blob NOT NULL,
  `person_sign` blob NOT NULL,
  `staff_sign` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_register`
--

CREATE TABLE `child_register` (
  `date` date NOT NULL,
  `stationary` varchar(300) NOT NULL,
  `cosmetics` varchar(300) NOT NULL,
  `clothing` varchar(300) NOT NULL,
  `toiletry` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_stock`
--

CREATE TABLE `child_stock` (
  `date` date NOT NULL,
  `particulars` varchar(300) NOT NULL,
  `received_from` varchar(300) NOT NULL,
  `received_quantity` varchar(300) NOT NULL,
  `issued_quantity` varchar(300) NOT NULL,
  `balance_quantity` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_stock`
--

CREATE TABLE `medicine_stock` (
  `medicine_name` varchar(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date_purchase` date NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_used`
--

CREATE TABLE `medicine_used` (
  `child_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `child_name` varchar(200) NOT NULL,
  `illness` varchar(200) NOT NULL,
  `medicine_name` varchar(250) NOT NULL,
  `child_sign` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_meeting`
--

CREATE TABLE `parent_meeting` (
  `date` date NOT NULL,
  `name` varchar(300) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `remark` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_movement`
--

CREATE TABLE `staff_movement` (
  `date` date NOT NULL,
  `name` varchar(300) NOT NULL,
  `place` varchar(300) NOT NULL,
  `purpose` varchar(300) NOT NULL,
  `staff_sign` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `date` date NOT NULL,
  `name` varchar(250) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `time` time NOT NULL,
  `purpose` varchar(300) NOT NULL,
  `sign` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicine_stock`
--
ALTER TABLE `medicine_stock`
  ADD PRIMARY KEY (`medicine_name`);

--
-- Indexes for table `medicine_used`
--
ALTER TABLE `medicine_used`
  ADD PRIMARY KEY (`child_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicine_used`
--
ALTER TABLE `medicine_used`
  MODIFY `child_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
