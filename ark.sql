-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 11:12 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ark`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(25) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `bday` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `datepost` date NOT NULL,
  `admin_id` varchar(25) NOT NULL,
  `an_what` varchar(1000) NOT NULL,
  `to_whom` varchar(1000) NOT NULL,
  `date_start` date NOT NULL DEFAULT '0000-00-00',
  `date_end` date NOT NULL DEFAULT '0000-00-00',
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `description` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resident_id` int(11) NOT NULL,
  `evac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `date`, `resident_id`, `evac_id`) VALUES
(7, '2018-01-10 12:03:56', 4, 2),
(8, '2018-01-14 06:47:42', 1, 2),
(9, '2018-01-14 06:48:56', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `brgy_id` int(11) NOT NULL,
  `brgy_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`brgy_id`, `brgy_name`, `city`, `province`) VALUES
(7, 'Talamban', 'Cebu', 'Cebu'),
(8, 'Banilad', 'Cebu', 'Cebu');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(255) NOT NULL,
  `resident_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evacuationcenter`
--

CREATE TABLE `evacuationcenter` (
  `evac_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `population` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `brgy_id` int(11) NOT NULL,
  `house_no` int(11) NOT NULL,
  `street` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evacuationcenter`
--

INSERT INTO `evacuationcenter` (`evac_id`, `location_name`, `population`, `capacity`, `latitude`, `longitude`, `brgy_id`, `house_no`, `street`) VALUES
(2, 'Metrobank', 1, 100, 10.3692, 123.917, 7, 100, 'Gov. M. Cuenco Ave'),
(3, 'San Isidro Parish School', 0, 200, 10.3691, 123.918, 7, 0, 'Gov. M. Cuenco Ave'),
(4, 'FOTOJAYA STUDIO', 0, 50, 10.3692, 123.916, 7, 0, 'Gov. M. Cuenco Ave'),
(5, 'Barangay Talamban Gymnasium', 0, 300, 10.3696, 123.917, 7, 0, 'Gov. M. Cuenco Ave'),
(6, 'Talamban Christian School', 0, 200, 10.3688, 123.916, 7, 0, 'Gov. M. Cuenco Ave');

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE `household` (
  `household_id` int(11) NOT NULL,
  `membership` varchar(25) NOT NULL,
  `resident_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_no` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_type` varchar(25) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itemdistribution`
--

CREATE TABLE `itemdistribution` (
  `itemdist_id` int(11) NOT NULL,
  `date_dist` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packagedistribution`
--

CREATE TABLE `packagedistribution` (
  `packdist_id` int(11) NOT NULL,
  `date_dist` date NOT NULL,
  `package_id` int(11) NOT NULL,
  `household_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reliefoperation`
--

CREATE TABLE `reliefoperation` (
  `operation_id` int(11) NOT NULL,
  `operation_name` varchar(255) NOT NULL,
  `evac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reliefpackage`
--

CREATE TABLE `reliefpackage` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `operation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `resident_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bday` date NOT NULL,
  `age` int(11) NOT NULL,
  `brgy_id` int(11) NOT NULL,
  `admin_id` varchar(25) NOT NULL,
  `house_no` int(11) NOT NULL,
  `street` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`resident_id`, `fname`, `mname`, `lname`, `gender`, `bday`, `age`, `brgy_id`, `admin_id`, `house_no`, `street`) VALUES
(1, 'Jorge Philip', 'Tarog', 'Codilla', 'Male', '2018-01-01', 0, 0, '', 324, 'V.Rama '),
(2, 'John Kent', 'CabaÃ±ez', 'Virtudazo', 'Male', '2018-01-02', 0, 0, '', 6969, 'Gov. M. Cuenco Ave'),
(3, 'Mylene', 'Delima', 'Pepito', 'Female', '2018-01-04', 0, 0, '', 123, 'Punta'),
(4, 'Abigail', 'Inoc', 'Velasquez', 'Female', '2018-01-10', 0, 0, '', 789, 'Paknaan');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `sms_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `datesent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`sms_id`, `content`, `datesent`, `admin_id`, `status`, `username`) VALUES
(3, 'PROJECTARK ADVISORY! Habang ang bagyo ay papalapit sa Pilipinas! Ang pilipinas naman ay papalayo ng papalayo sa bagyo!!', '2018-01-10 15:55:39', '', 1, 'LegenDazo'),
(4, 'PROJECTARK ADVISORY! Habang ang bagyo ay papalapit sa Pilipinas! Ang pilipinas naman ay papalayo ng papalayo sa bagyo!!', '2018-01-10 15:55:43', '', 1, 'bacolod'),
(7, 'PROJECTARK ADVISORY! ayaw nya ko biraha, basin ma hulog ta sa usa''g usa - dazo', '2018-01-10 16:17:44', '', 1, 'bacolod'),
(8, 'PROJECTARK ADVISORY! ayaw nya ko biraha, basin ma hulog ta sa usa''g usa - dazo', '2018-01-10 16:17:46', '', 1, 'LegenDazo'),
(9, 'PROJECTARK ADVISORY! "wa ka nalipong? ganina rman gud ka si''g tuyok sa ako ulo"', '2018-01-10 16:29:48', '', 1, 'bacolod'),
(10, 'PROJECTARK ADVISORY! "wa ka nalipong? ganina rman gud ka si''g tuyok sa ako ulo"', '2018-01-10 16:29:49', '', 1, 'LegenDazo');

-- --------------------------------------------------------

--
-- Table structure for table `smschecker`
--

CREATE TABLE `smschecker` (
  `checker_id` int(11) NOT NULL,
  `sms_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `sponsor_id` int(11) NOT NULL,
  `sponsor_name` varchar(255) NOT NULL,
  `sponsor_type` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(80) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `contact_no` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `user_type`, `fname`, `mname`, `lname`, `bdate`, `contact_no`) VALUES
('bacolod', 'bacolod', 'resident', 'Mylene', 'Delima', 'Pepito', '2018-01-16', '639254853869'),
('LegenDazo', 'legend', 'user', 'John Kent', 'Cabanez', 'Virtudazo', '2015-08-13', '639994738632');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD UNIQUE KEY `resident_id` (`resident_id`),
  ADD KEY `evac_id` (`evac_id`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`disease_id`),
  ADD KEY `resident_id` (`resident_id`);

--
-- Indexes for table `evacuationcenter`
--
ALTER TABLE `evacuationcenter`
  ADD PRIMARY KEY (`evac_id`),
  ADD KEY `brgy_id` (`brgy_id`);

--
-- Indexes for table `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`household_id`),
  ADD KEY `resident_id` (`resident_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_no`),
  ADD KEY `sponsor_id` (`sponsor_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `itemdistribution`
--
ALTER TABLE `itemdistribution`
  ADD KEY `resident_id` (`resident_id`);

--
-- Indexes for table `packagedistribution`
--
ALTER TABLE `packagedistribution`
  ADD KEY `package_id` (`package_id`),
  ADD KEY `household_id` (`household_id`);

--
-- Indexes for table `reliefoperation`
--
ALTER TABLE `reliefoperation`
  ADD PRIMARY KEY (`operation_id`),
  ADD KEY `evac_id` (`evac_id`);

--
-- Indexes for table `reliefpackage`
--
ALTER TABLE `reliefpackage`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`resident_id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`sms_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `smschecker`
--
ALTER TABLE `smschecker`
  ADD PRIMARY KEY (`checker_id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `evacuationcenter`
--
ALTER TABLE `evacuationcenter`
  MODIFY `evac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `household`
--
ALTER TABLE `household`
  MODIFY `household_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reliefoperation`
--
ALTER TABLE `reliefoperation`
  MODIFY `operation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `resident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `smschecker`
--
ALTER TABLE `smschecker`
  MODIFY `checker_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`evac_id`) REFERENCES `evacuationcenter` (`evac_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`resident_id`) REFERENCES `resident` (`resident_id`);

--
-- Constraints for table `disease`
--
ALTER TABLE `disease`
  ADD CONSTRAINT `disease_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `resident` (`resident_id`);

--
-- Constraints for table `evacuationcenter`
--
ALTER TABLE `evacuationcenter`
  ADD CONSTRAINT `evacuationcenter_ibfk_2` FOREIGN KEY (`brgy_id`) REFERENCES `barangay` (`brgy_id`);

--
-- Constraints for table `household`
--
ALTER TABLE `household`
  ADD CONSTRAINT `household_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `resident` (`resident_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsor` (`sponsor_id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `reliefpackage` (`package_id`);

--
-- Constraints for table `itemdistribution`
--
ALTER TABLE `itemdistribution`
  ADD CONSTRAINT `itemdistribution_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `resident` (`resident_id`);

--
-- Constraints for table `packagedistribution`
--
ALTER TABLE `packagedistribution`
  ADD CONSTRAINT `packagedistribution_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `reliefpackage` (`package_id`),
  ADD CONSTRAINT `packagedistribution_ibfk_2` FOREIGN KEY (`household_id`) REFERENCES `household` (`household_id`);

--
-- Constraints for table `reliefoperation`
--
ALTER TABLE `reliefoperation`
  ADD CONSTRAINT `reliefoperation_ibfk_1` FOREIGN KEY (`evac_id`) REFERENCES `evacuationcenter` (`evac_id`);

--
-- Constraints for table `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `sms_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
