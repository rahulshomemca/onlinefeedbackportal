-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 09:07 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(50) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
('1', 'Rahul Shome', 'rahulshome.mca17@rvce.edu.in', '$2y$10$lIWGgIcGu4S5Hcwc0LkQG.E9jal.9DUkVTotpL5Uu8KCFEZw');

-- --------------------------------------------------------

--
-- Table structure for table `facultty`
--

CREATE TABLE `facultty` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `order_id` int(11) NOT NULL,
  `active` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `desig` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `dept` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultty`
--

INSERT INTO `facultty` (`id`, `name`, `order_id`, `active`, `email`, `mobile`, `desig`, `image`, `dept`, `password`) VALUES
(10, 'MANJUNATH ', 0, 'Inactive', 'manjunath@rvce.edu.in', '', '', '', '', 'manjunath'),
(13, 'Krishnan R', 0, 'Inactive', 'krishnan@rvce.edu.in', '', '', '', '', 'welcome123*');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `faculty_id` varchar(225) NOT NULL,
  `faculty_name` varchar(225) NOT NULL,
  `usn` varchar(225) NOT NULL,
  `student_name` varchar(225) NOT NULL,
  `question` varchar(225) NOT NULL,
  `answar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `q_no` int(11) NOT NULL,
  `question` varchar(225) NOT NULL,
  `choice1` varchar(225) NOT NULL,
  `choice2` varchar(225) NOT NULL,
  `choice3` varchar(225) NOT NULL,
  `choice4` varchar(225) NOT NULL,
  `choice5` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `q_no`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `choice5`) VALUES
(5, 1, 'How well teaching of this faculty is understood by you?', 'satisfactory ', 'Good ', 'Very Good ', 'Excellent', ''),
(6, 2, 'How does the faculty explain the topic in class?', 'Satisfactory ', 'Good ', 'Very Good ', 'Excellent', ''),
(10, 3, 'How much he/she clears the concept?', 'Excellent', 'Very Well', 'Well', 'Average', 'Satisfacroty');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `id` int(11) NOT NULL,
  `f_name` varchar(225) NOT NULL,
  `s_name` varchar(225) NOT NULL,
  `usn` varchar(225) NOT NULL,
  `question` varchar(225) NOT NULL,
  `answar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `usn` varchar(255) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facultty`
--
ALTER TABLE `facultty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`,`usn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facultty`
--
ALTER TABLE `facultty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
