-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2023 at 08:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `status` int(100) NOT NULL,
  `createdDate` varchar(100) DEFAULT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `UserName`, `Password`, `status`, `createdDate`, `role`) VALUES
(1, 'Teacher', 'admin', '202cb962ac59075b964b07152d234b70', 1, '2023-07-23 14:18:49', 'admin'),
(2, 'Axmed', 'axmed', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00', 'teacher'),
(3, 'maxamed', 'maxamed', '123', 1, '99', ''),
(4, 'EEE', 'eee', '202cb962ac59075b964b07152d234b70', 1, '2023-07-29 07:48:23', ''),
(5, 'WWE', 'WWE', '123', 1, '2023-Jul-Sat 06:22:16', ''),
(6, 'WWW', 'WW', '202cb962ac59075b964b07152d234b70', 1, '', ''),
(7, 'EE', 'EEE', 'aae0f9e435d23f85b08678946f6b5860', 1, '', ''),
(8, 'Maxamed Cali', 'calihayaan', 'a3f95b9284779153fe2b1cc25f677b3d', 1, '2023-08-13 08:05:11', 'registration');

-- --------------------------------------------------------

--
-- Table structure for table `class_table`
--

CREATE TABLE `class_table` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` int(4) NOT NULL,
  `Section` varchar(5) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `class_table`
--

INSERT INTO `class_table` (`id`, `ClassName`, `ClassNameNumeric`, `Section`, `CreationDate`, `UpdationDate`) VALUES
(1, '1aad', 1, 'A', '2023-07-29 11:20:34', '0000-00-00 00:00:00'),
(2, '2aad', 2, 'A', '2023-07-29 11:55:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `result_table`
--

CREATE TABLE `result_table` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `result_table`
--

INSERT INTO `result_table` (`id`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `PostingDate`, `UpdationDate`) VALUES
(1, 1, 1, 4, 100, '2023-07-29 11:26:23', NULL),
(2, 1, 1, 2, 99, '2023-07-29 11:26:23', NULL),
(3, 1, 1, 3, 90, '2023-07-29 11:26:23', NULL),
(4, 1, 1, 1, 50, '2023-07-29 11:26:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students_table`
--

CREATE TABLE `students_table` (
  `StudentId` int(11) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `RollId` varchar(100) NOT NULL,
  `StudentEmail` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students_table`
--

INSERT INTO `students_table` (`StudentId`, `StudentName`, `RollId`, `StudentEmail`, `Gender`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES
(1, 'Saiid Abdullahi ', 'BCS/07777/2023', '', 'on', '2012-03-29', 1, '2023-07-29 11:21:29', '2023-07-29 13:33:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_by_class_table`
--

CREATE TABLE `subject_by_class_table` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject_by_class_table`
--

INSERT INTO `subject_by_class_table` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(1, 1, 1, 1, '2023-07-29 11:25:06', '2023-07-29 11:25:06'),
(2, 1, 2, 1, '2023-07-29 11:25:10', '2023-07-29 11:25:10'),
(3, 1, 3, 1, '2023-07-29 11:25:15', '2023-07-29 11:25:15'),
(4, 1, 4, 1, '2023-07-29 11:25:19', '2023-07-29 11:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `subject_table`
--

CREATE TABLE `subject_table` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject_table`
--

INSERT INTO `subject_table` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Somali', 'SO', '2023-07-29 11:22:17', '0000-00-00 00:00:00'),
(2, 'English', 'EN', '2023-07-29 11:22:24', '0000-00-00 00:00:00'),
(3, 'Math', 'MTH', '2023-07-29 11:22:35', '0000-00-00 00:00:00'),
(4, 'Arabic', 'AR', '2023-07-29 11:22:52', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_table`
--
ALTER TABLE `class_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_table`
--
ALTER TABLE `result_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_table`
--
ALTER TABLE `students_table`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `subject_by_class_table`
--
ALTER TABLE `subject_by_class_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_table`
--
ALTER TABLE `subject_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `class_table`
--
ALTER TABLE `class_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result_table`
--
ALTER TABLE `result_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students_table`
--
ALTER TABLE `students_table`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject_by_class_table`
--
ALTER TABLE `subject_by_class_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject_table`
--
ALTER TABLE `subject_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
