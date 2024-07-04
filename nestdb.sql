-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 09:22 AM
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
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `english` char(1) NOT NULL,
  `maths` char(1) NOT NULL,
  `science` char(1) NOT NULL,
  `social_science` char(1) NOT NULL,
  `physical_training` char(1) NOT NULL,
  `general_knowledge` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`id`, `child_id`, `child_name`, `english`, `maths`, `science`, `social_science`, `physical_training`, `general_knowledge`) VALUES
(1, 6, 'ibrahim', 'A', 'A', 'A', 'A', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `behaviour_attitude`
--

CREATE TABLE `behaviour_attitude` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `accommodating_adjusting` char(1) NOT NULL,
  `compassion` char(1) NOT NULL,
  `emotional_stability` char(1) NOT NULL,
  `hygiene` char(1) NOT NULL,
  `overcoming_lures` char(1) NOT NULL,
  `punctuality` char(1) NOT NULL,
  `social_awareness` char(1) NOT NULL,
  `secular_outlook` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `behaviour_attitude`
--

INSERT INTO `behaviour_attitude` (`id`, `child_id`, `child_name`, `accommodating_adjusting`, `compassion`, `emotional_stability`, `hygiene`, `overcoming_lures`, `punctuality`, `social_awareness`, `secular_outlook`) VALUES
(1, 6, 'ibrahim', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `child_details`
--

CREATE TABLE `child_details` (
  `id` int(11) NOT NULL,
  `admission_number` varchar(50) NOT NULL,
  `date_of_admission` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `aadhaar_number` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_details`
--

INSERT INTO `child_details` (`id`, `admission_number`, `date_of_admission`, `name`, `age`, `sex`, `religion`, `language`, `permanent_address`, `present_address`, `phone_number`, `aadhaar_number`, `photo`) VALUES
(1, '875', '2024-05-16', '0', 8, 'Male', 'Islam', 'hindi', '46cc', 'ddc', '98562', '89562598', ''),
(2, '463', '2024-05-01', '0', 9, 'Female', 'hindu', 'kannada', '87ff', 'sd2d5', '87855', '996965', ''),
(3, '5522', '0000-00-00', '0', 10, 'Male', 'christian', 'urdu', 'dd3443', 'n5', '22', '88', ''),
(4, '447', '0000-00-00', '0', 58, 'Male', 'hindu', 'j', 'uubn', 'njnn', '555', '75319', ''),
(5, '7575', '2024-05-10', '0', 55, 'Male', 'fd', 'fbfb', 'ttty', 'yjuk', '888', '222', ''),
(6, '9789', '2024-05-03', 'ibrahim', 595, 'Other', 'fgfb', 'fbf', 'cbf', 'dbf', '484', '9595', ''),
(7, '007', '2024-06-14', 'Priya', 33, 'Female', 'Atheist', 'Odiya', 'Odisha', 'Kerela', '9594', '599', NULL),
(8, '966462', '2024-07-13', 'Simon', 255, 'Male', 'fgfb', 'urdu', 'blr', 'blr', '665282', '85812', ''),
(9, '875', '2024-07-13', 'Building', 9999, 'Male', 'christian', 'urdu', 'bltl', 'blrt', 'dfgg', '996965', 'uploads/Time-Table.png');

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
  `child_sign` varchar(255) NOT NULL,
  `person_sign` varchar(255) NOT NULL,
  `staff_sign` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_movement`
--

INSERT INTO `child_movement` (`date`, `name`, `place`, `purpose`, `acc_person`, `dep_date`, `return_date`, `remark`, `child_sign`, `person_sign`, `staff_sign`) VALUES
('2024-05-17', 'Simon', 'bg', 'st', 'hz', '2024-05-14', '2024-05-29', 'bm', '', '', ''),
('2024-06-19', 'Rohh', 'TN', 'family', 'brother', '2024-06-10', '2024-06-27', 'enjoy', '', '', ''),
('2024-07-06', 'Simon', 'DD', 'uu', 'brother', '2024-07-04', '2024-07-20', 'ddsh', 'uploads/Time-Table.png', 'uploads/Capture.PNG', 'uploads/dd.PNG'),
('2024-07-06', 'Floor', 'khmy', '999', 'brother', '2024-07-04', '2024-07-04', 'ddsh', 'uploads/Capture.PNG', 'uploads/Screenshot (108).png', 'uploads/Screenshot (1).png');

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

--
-- Dumping data for table `child_register`
--

INSERT INTO `child_register` (`date`, `stationary`, `cosmetics`, `clothing`, `toiletry`) VALUES
('2024-05-18', '5536', '151', '5151', '51'),
('2024-06-19', '74', '33', '6', '3');

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

--
-- Dumping data for table `child_stock`
--

INSERT INTO `child_stock` (`date`, `particulars`, `received_from`, `received_quantity`, `issued_quantity`, `balance_quantity`) VALUES
('2024-05-12', 'xksms', 'xmvsl', '9', '2', ''),
('2024-05-23', 'books', 'ganesh', '4', '-2', ''),
('2024-06-28', 'bags', 'me', '200', '10', ''),
('2024-06-19', 'pens', 'rohan', '500', '200', ''),
('2024-06-15', 'paperrr', 'fans', '460', '310', '150');

-- --------------------------------------------------------

--
-- Table structure for table `co_curricular_activities`
--

CREATE TABLE `co_curricular_activities` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `art` char(1) NOT NULL,
  `assembly` char(1) NOT NULL,
  `craft` char(1) NOT NULL,
  `drama` char(1) NOT NULL,
  `dance` char(1) NOT NULL,
  `debate` char(1) NOT NULL,
  `drill` char(1) NOT NULL,
  `games` char(1) NOT NULL,
  `quiz` char(1) NOT NULL,
  `singing` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co_curricular_activities`
--

INSERT INTO `co_curricular_activities` (`id`, `child_id`, `child_name`, `art`, `assembly`, `craft`, `drama`, `dance`, `debate`, `drill`, `games`, `quiz`, `singing`) VALUES
(1, 6, 'ibrahim', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `family_constellation`
--

CREATE TABLE `family_constellation` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `relation` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `alive_dead` varchar(10) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_constellation`
--

INSERT INTO `family_constellation` (`id`, `child_id`, `name`, `relation`, `age`, `occupation`, `education`, `alive_dead`, `remarks`) VALUES
(1, 2, 'Simon2', 'father', 55, 'labour', '10', 'alive', 'good'),
(2, 3, 'a', 'b', 1, 'c', 'd', 'e', 'f'),
(3, 3, 'g', 'h', 2, 'i', 'j', 'k', 'l'),
(4, 7, 'Kannu', 'Sister', 55, 'SL', 'BA', 'Alive', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `name` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `password`) VALUES
('admin', '123456');

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

--
-- Dumping data for table `medicine_stock`
--

INSERT INTO `medicine_stock` (`medicine_name`, `quantity`, `date_purchase`, `expiry_date`) VALUES
('chloroform', 67, '2024-06-06', '2024-08-15'),
('ethyl', 52, '2024-05-11', '2024-06-07');

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
  `child_sign` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine_used`
--

INSERT INTO `medicine_used` (`child_id`, `date`, `child_name`, `illness`, `medicine_name`, `child_sign`) VALUES
(1, '2024-05-03', 'leo', 'schizophrenia', 'chloroform', ''),
(58, '2024-07-13', 'fggg', 'yfcu', 'ify', ''),
(88, '2024-07-13', 'leo', 'myophia', 'drops', ''),
(549, '2024-07-23', 'fggg', 'bbsybs', 'bbaa', 'uploads/Data Mining .jpg');

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

--
-- Dumping data for table `parent_meeting`
--

INSERT INTO `parent_meeting` (`date`, `name`, `contact`, `remark`) VALUES
('2024-03-09', 'knm ', 'hbhvb', 'jubhub'),
('2024-03-09', 'knm ', 'hbhvb', 'jubhub'),
('2024-03-09', 'knm ', 'hbhvb', 'jubhub'),
('2024-02-26', 'ffgf', '2222', 'mmmm'),
('2024-03-02', 'dddd', '33333', 'trr'),
('2024-02-25', 'dvdvd', '0000000000', 'dddfff'),
('2024-03-02', 'Floor', '23455', 'vvff'),
('2024-02-28', 'c', '22334', 'cvfbfbfb'),
('2024-02-25', 'gfg', 'hbhvb', '55555'),
('2024-02-26', 'Simon', '1478', '2ss'),
('2024-03-14', 'Simon', '53535', 'Good'),
('2024-05-24', 'Duu', '2333', 'Fu'),
('2024-05-24', 'Duu', '2333', 'Fu'),
('2024-04-30', 'III', '009', 'But'),
('2024-05-11', 'ibrahimb556-scale', '877', 'yu');

-- --------------------------------------------------------

--
-- Table structure for table `personality_development`
--

CREATE TABLE `personality_development` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `child_name` varchar(255) NOT NULL,
  `concentration` char(1) NOT NULL,
  `curiosity` char(1) NOT NULL,
  `initiative` char(1) NOT NULL,
  `observation` char(1) NOT NULL,
  `originality` char(1) NOT NULL,
  `participation` char(1) NOT NULL,
  `perseverance` char(1) NOT NULL,
  `relationship` char(1) NOT NULL,
  `responsibility` char(1) NOT NULL,
  `self_confidence` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personality_development`
--

INSERT INTO `personality_development` (`id`, `child_id`, `child_name`, `concentration`, `curiosity`, `initiative`, `observation`, `originality`, `participation`, `perseverance`, `relationship`, `responsibility`, `self_confidence`) VALUES
(1, 6, 'ibrahim', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `staff_movement`
--

CREATE TABLE `staff_movement` (
  `date` date NOT NULL,
  `name` varchar(300) NOT NULL,
  `place` varchar(300) NOT NULL,
  `purpose` varchar(300) NOT NULL,
  `staff_sign` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_movement`
--

INSERT INTO `staff_movement` (`date`, `name`, `place`, `purpose`, `staff_sign`) VALUES
('2024-05-16', 'Floor', 'khmy', 'dod', ''),
('2024-06-20', 'bindu', 'kerela', 'teach', ''),
('2024-07-23', 'Floor', 'khmy', 'eee', 'uploads/Capture.PNG');

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
  `sign` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`date`, `name`, `contact`, `email`, `time`, `purpose`, `sign`) VALUES
('2024-05-30', 'Simon', 53535, 'hbb@fvffv.com', '21:55:00', 'yy', ''),
('2024-07-11', 'admin', 96558521, 'hbb@fvffv.com', '20:50:00', 'dod', 'uploads/1166130.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`);

--
-- Indexes for table `behaviour_attitude`
--
ALTER TABLE `behaviour_attitude`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`);

--
-- Indexes for table `child_details`
--
ALTER TABLE `child_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co_curricular_activities`
--
ALTER TABLE `co_curricular_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`);

--
-- Indexes for table `family_constellation`
--
ALTER TABLE `family_constellation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`);

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
-- Indexes for table `personality_development`
--
ALTER TABLE `personality_development`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `behaviour_attitude`
--
ALTER TABLE `behaviour_attitude`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `child_details`
--
ALTER TABLE `child_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `co_curricular_activities`
--
ALTER TABLE `co_curricular_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `family_constellation`
--
ALTER TABLE `family_constellation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine_used`
--
ALTER TABLE `medicine_used`
  MODIFY `child_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550;

--
-- AUTO_INCREMENT for table `personality_development`
--
ALTER TABLE `personality_development`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academic`
--
ALTER TABLE `academic`
  ADD CONSTRAINT `academic_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `child_details` (`id`);

--
-- Constraints for table `behaviour_attitude`
--
ALTER TABLE `behaviour_attitude`
  ADD CONSTRAINT `behaviour_attitude_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `child_details` (`id`);

--
-- Constraints for table `co_curricular_activities`
--
ALTER TABLE `co_curricular_activities`
  ADD CONSTRAINT `co_curricular_activities_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `child_details` (`id`);

--
-- Constraints for table `family_constellation`
--
ALTER TABLE `family_constellation`
  ADD CONSTRAINT `family_constellation_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `child_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `personality_development`
--
ALTER TABLE `personality_development`
  ADD CONSTRAINT `personality_development_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `child_details` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
