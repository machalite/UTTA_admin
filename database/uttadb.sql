-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 13, 2017 at 07:54 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uttadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `activity` varchar(50) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`id`, `user`, `activity`, `timestamp`) VALUES
(1, 1, 'Logged in', '2017-06-10 12:54:30'),
(2, 1, 'Logged in', '2017-06-10 12:56:29'),
(3, 19, 'Logged in', '2017-06-10 17:04:58'),
(4, 1, 'Logged in', '2017-06-10 17:05:30'),
(5, 19, 'Logged in', '2017-06-10 18:07:08'),
(6, 1, 'Logged in', '2017-06-10 18:09:41'),
(7, 19, 'Logged in', '2017-06-10 18:16:30'),
(8, 1, 'Logged in', '2017-06-10 18:18:49'),
(9, 1, 'Logged in', '2017-06-10 18:19:29'),
(10, 19, 'Logged in', '2017-06-10 18:20:38'),
(11, 19, 'Logged out', '2017-06-10 18:20:44'),
(12, 1, 'Logged in', '2017-06-10 18:21:03'),
(13, 1, 'Logged in', '2017-06-11 11:23:22'),
(14, 1, 'Logged out', '2017-06-11 11:23:58'),
(15, 1, 'Logged in', '2017-06-11 11:24:11'),
(16, 1, 'Logged in', '2017-06-12 16:55:02'),
(17, 1, 'Logged out', '2017-06-12 17:21:36'),
(18, 19, 'Logged in', '2017-06-12 17:22:07'),
(19, 1, 'Logged in', '2017-06-12 17:25:02'),
(20, 19, 'Logged in', '2017-06-12 17:26:00'),
(21, 1, 'Logged in', '2017-06-12 17:32:49'),
(22, 1, 'Logged in', '2017-06-12 17:35:10'),
(23, 1, 'Logged in', '0000-00-00 00:00:00'),
(24, 19, 'Logged in', '2017-06-12 17:43:14'),
(25, 1, 'Logged out', '2017-06-12 19:13:09'),
(26, 1, 'Logged in', '0000-00-00 00:00:00'),
(27, 1, 'Logged out', '2017-06-12 19:14:13'),
(28, 19, 'Logged in', '0000-00-00 00:00:00'),
(29, 19, 'Logged out', '2017-06-12 19:15:19'),
(30, 1, 'Logged in', '2017-06-12 19:15:23'),
(31, 1, 'Logged out', '2017-06-12 19:15:33'),
(32, 1, 'Logged in', '2017-06-12 19:58:26'),
(33, 1, 'Created newUser20', '2017-06-12 20:48:31'),
(34, 1, 'Created newUser21', '2017-06-12 20:48:49'),
(35, 1, 'Logged out', '2017-06-12 20:49:15'),
(36, 19, 'Logged in', '2017-06-12 20:49:20'),
(37, 19, 'Logged out', '2017-06-12 20:56:57'),
(38, 1, 'Logged in', '2017-06-12 20:57:03'),
(39, 1, 'Created new User ', '2017-06-12 20:57:29'),
(40, 1, 'Deleted User 22', '2017-06-12 20:57:47'),
(41, 1, 'Logged out', '2017-06-12 20:57:50'),
(42, 19, 'Logged in', '2017-06-12 21:01:23'),
(43, 19, 'Created new User Hola', '2017-06-12 21:03:17'),
(44, 19, 'Deleted User 23', '2017-06-12 21:03:46'),
(45, 19, 'Updated User Machalite', '2017-06-12 22:22:22'),
(46, 1, 'Logged in', '2017-06-13 07:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `startclass` time NOT NULL,
  `endclass` time NOT NULL,
  `course` int(11) DEFAULT NULL,
  `room` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `faculty` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `lecturer` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `faculty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `building` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `faculty` int(11) DEFAULT NULL,
  `department` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastlogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `lastlogin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-06-13 07:01:43'),
(19, 'Machalite', '2e3817293fc275dbee74bd71ce6eb056', '2017-06-12 21:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course` (`course`),
  ADD KEY `room` (`room`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `faculty` (`faculty`),
  ADD KEY `department` (`department`),
  ADD KEY `lecturer` (`lecturer`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `faculty` (`faculty`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `building` (`building`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `faculty` (`faculty`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD CONSTRAINT `activitylog_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`);

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`course`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`room`) REFERENCES `room` (`id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`department`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `course_ibfk_3` FOREIGN KEY (`lecturer`) REFERENCES `lecturer` (`id`),
  ADD CONSTRAINT `course_ibfk_4` FOREIGN KEY (`year`) REFERENCES `year` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`building`) REFERENCES `building` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`department`) REFERENCES `department` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
