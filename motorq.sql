-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 08:45 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motorq`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `Name` varchar(20) NOT NULL,
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`Name`, `Latitude`, `Longitude`) VALUES
('CDMM', 79.15518440330392, 12.969224240122253),
('SJT', 79.163976, 12.971139),
('TT', 79.159341, 12.97071);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` varchar(15) NOT NULL,
  `courseCode` varchar(15) NOT NULL,
  `faculty` varchar(20) NOT NULL,
  `building` varchar(20) NOT NULL,
  `day` varchar(15) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `courseCode`, `faculty`, `building`, `day`, `time`) VALUES
('VLR1001', 'CSE1001', 'Nancy Victor', 'SJT', 'Monday', '9am-10am'),
('VLR1002', 'CSE1001', 'Akila Victor', 'CDMM', 'Wednesday', '9am-10am'),
('VLR1003', 'CSE1002', 'Rahul Raman', 'SJT', 'Tuesday', '11am-12am'),
('VLR1004', 'CSE1002', 'Boominathan', 'TT', 'Friday', '1pm-2pm'),
('VLR1005', 'CSE1003', 'Arup Ghosh', 'TT', 'Thursday', '2pm-3pm'),
('VLR1006', 'CSE1003', 'Shely M', 'CDMM', 'Monday', '9am-10am'),
('VLR1007', 'CSE1004', 'Mohan Kumar', 'SJT', 'Tuesday', '11am-12am'),
('VLR1008', 'CSE1004', 'Dinesh Vijan', 'TT', 'Friday', '10am-11am'),
('VLR1009', 'CSE1004', 'Seetha R', 'TT', 'Wednesday', '1pm-2pm'),
('VLR1010', 'CSE1004', 'Senthil Kumar', 'CDMM', 'Monday', '10am-11am'),
('VLR1012', 'CSE1002', 'Prabha S', 'TT', 'Wednesday', '3pm-4pm'),
('VLR1015', 'CSE1004', 'Murali S', 'SJT', 'Wednesday', '2pm-3pm');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`) VALUES
('CSE1001', 'DBMS'),
('CSE1002', 'OS'),
('CSE1003', 'DSA'),
('CSE1004', 'DLD');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `UID` varchar(20) NOT NULL,
  `Pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`FirstName`, `LastName`, `Email`, `DOB`, `UID`, `Pass`) VALUES
('Abhinav', 'Chawla', 'abcd@gmail.com', '2001-05-08', 'abhinav8701', 'Abhinav@123'),
('Admin', 'Admin', 'admin@gmail.com', '2021-08-06', 'admin1', 'Admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Username` varchar(20) NOT NULL,
  `ClassID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseCode` (`courseCode`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`UID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`courseCode`) REFERENCES `course` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
