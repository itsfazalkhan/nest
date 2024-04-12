-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2024 at 08:59 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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

DROP TABLE IF EXISTS `child_movement`;
CREATE TABLE IF NOT EXISTS `child_movement` (
  `date` date NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `place` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `purpose` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `acc_person` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `dep_date` date NOT NULL,
  `return_date` date NOT NULL,
  `remark` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `child_sign` blob NOT NULL,
  `person_sign` blob NOT NULL,
  `staff_sign` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_register`
--

DROP TABLE IF EXISTS `child_register`;
CREATE TABLE IF NOT EXISTS `child_register` (
  `date` date NOT NULL,
  `stationary` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `cosmetics` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `clothing` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `toiletry` varchar(300) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_stock`
--

DROP TABLE IF EXISTS `child_stock`;
CREATE TABLE IF NOT EXISTS `child_stock` (
  `date` date NOT NULL,
  `particulars` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `received_from` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `received_quantity` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `issued_quantity` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `balance_quantity` varchar(300) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_stock`
--

DROP TABLE IF EXISTS `medicine_stock`;
CREATE TABLE IF NOT EXISTS `medicine_stock` (
  `medicine_name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `date_purchase` date NOT NULL,
  `expiry_date` date NOT NULL,
  PRIMARY KEY (`medicine_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_used`
--

DROP TABLE IF EXISTS `medicine_used`;
CREATE TABLE IF NOT EXISTS `medicine_used` (
  `child_id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `child_name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `illness` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `medicine_name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `child_sign` blob NOT NULL,
  PRIMARY KEY (`child_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_meeting`
--

DROP TABLE IF EXISTS `parent_meeting`;
CREATE TABLE IF NOT EXISTS `parent_meeting` (
  `date` date NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `remark` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progress_report_aca`
--

DROP TABLE IF EXISTS `progress_report_aca`;
CREATE TABLE IF NOT EXISTS `progress_report_aca` (
  `name` varchar(255) NOT NULL,
  `id` int NOT NULL,
  `photo` blob NOT NULL,
  `lone` varchar(255) NOT NULL,
  `ltwo` varchar(255) NOT NULL,
  `lthree` varchar(255) NOT NULL,
  `ms` varchar(255) NOT NULL,
  `sc` varchar(255) NOT NULL,
  `ss` varchar(255) NOT NULL,
  `pt` varchar(255) NOT NULL,
  `gk` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progress_report_ba`
--

DROP TABLE IF EXISTS `progress_report_ba`;
CREATE TABLE IF NOT EXISTS `progress_report_ba` (
  `name` varchar(255) NOT NULL,
  `id` int NOT NULL,
  `photo` blob NOT NULL,
  `date` date NOT NULL,
  `aa` varchar(255) NOT NULL,
  `com` varchar(255) NOT NULL,
  `es` varchar(255) NOT NULL,
  `hy` varchar(255) NOT NULL,
  `ol` varchar(255) NOT NULL,
  `pnc` varchar(255) NOT NULL,
  `sa` varchar(255) NOT NULL,
  `so` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progress_report_cca`
--

DROP TABLE IF EXISTS `progress_report_cca`;
CREATE TABLE IF NOT EXISTS `progress_report_cca` (
  `name` varchar(255) NOT NULL,
  `id` int NOT NULL,
  `photo` blob NOT NULL,
  `date` date NOT NULL,
  `ar` varchar(255) NOT NULL,
  `as` varchar(255) NOT NULL,
  `cr` varchar(255) NOT NULL,
  `dr` varchar(255) NOT NULL,
  `dc` varchar(255) NOT NULL,
  `de` varchar(255) NOT NULL,
  `drl` varchar(255) NOT NULL,
  `el` varchar(255) NOT NULL,
  `ga` varchar(255) NOT NULL,
  `qz` varchar(255) NOT NULL,
  `sg` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `progress_report_pd`
--

DROP TABLE IF EXISTS `progress_report_pd`;
CREATE TABLE IF NOT EXISTS `progress_report_pd` (
  `name` varchar(255) NOT NULL,
  `id` int NOT NULL,
  `photo` blob NOT NULL,
  `date` date NOT NULL,
  `co` varchar(255) NOT NULL,
  `cu` varchar(255) NOT NULL,
  `in` varchar(255) NOT NULL,
  `ob` varchar(255) NOT NULL,
  `or` varchar(255) NOT NULL,
  `pa` varchar(255) NOT NULL,
  `pe` varchar(255) NOT NULL,
  `rl` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_movement`
--

DROP TABLE IF EXISTS `staff_movement`;
CREATE TABLE IF NOT EXISTS `staff_movement` (
  `date` date NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `place` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `purpose` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `staff_sign` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

DROP TABLE IF EXISTS `volunteer`;
CREATE TABLE IF NOT EXISTS `volunteer` (
  `date` date NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` int NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `time` time NOT NULL,
  `purpose` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `sign` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
