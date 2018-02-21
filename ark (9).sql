-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2018 at 07:49 AM
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
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fname`, `mname`, `lname`, `gender`, `bday`) VALUES
(1, '1', '4acb4bc224acbbe3c2bfdcaa39a4324e', 'Jorge', 'Philip', 'Codilla', 'Male', '1997-10-04'),
(2, 'admin', '4acb4bc224acbbe3c2bfdcaa39a4324e', 'May', 'Chan', 'Dazo', 'Male', '1997-11-13'),
(3, 'admin123', '0192023a7bbd73250516f069df18b500', 'Kent', 'Cab', 'Virtudazo ', 'male', '2015-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_out` timestamp NULL DEFAULT NULL,
  `resident_id` int(11) NOT NULL,
  `evac_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `date`, `date_out`, `resident_id`, `evac_id`, `status`) VALUES
(1, '2018-02-08 11:06:50', '2018-02-08 15:56:01', 6, 1, 1),
(2, '2018-02-08 11:06:52', '2018-02-08 15:31:34', 5, 1, 1),
(3, '2018-02-08 11:06:57', '2018-02-08 15:31:41', 4, 1, 1),
(4, '2018-02-08 15:31:22', '2018-02-08 15:31:42', 22, 1, 1),
(5, '2018-02-08 15:31:30', '2018-02-08 15:31:33', 3, 1, 1),
(6, '2018-02-08 15:31:46', '2018-02-08 15:56:01', 7, 1, 1),
(7, '2018-02-08 15:31:49', '2018-02-08 15:56:01', 19, 1, 1),
(8, '2018-02-08 15:31:51', '2018-02-08 15:56:01', 23, 1, 1),
(9, '2018-02-08 15:31:53', '2018-02-08 15:56:01', 22, 1, 1),
(10, '2018-02-12 09:31:41', NULL, 22, 1, 1),
(11, '2018-02-12 09:31:41', NULL, 21, 1, 1),
(12, '2018-02-12 09:31:44', NULL, 1, 1, 1),
(13, '2018-02-12 09:31:46', NULL, 2, 1, 1),
(14, '2018-02-12 09:33:05', NULL, 23, 3, 1),
(15, '2018-02-12 09:33:06', NULL, 3, 3, 1),
(16, '2018-02-12 09:33:07', NULL, 5, 3, 1),
(17, '2018-02-12 09:33:08', NULL, 15, 3, 1),
(18, '2018-02-12 09:33:09', NULL, 6, 3, 1),
(19, '2018-02-12 09:33:12', NULL, 9, 3, 1),
(20, '2018-02-12 09:33:12', NULL, 10, 3, 1),
(21, '2018-02-12 09:33:14', NULL, 13, 3, 1),
(22, '2018-02-20 07:53:48', NULL, 4, 1, 1);

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
(1, 'Talamban', 'Cebu', 'Cebu'),
(2, 'Banilad', 'Cebu', 'Cebu');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`disease_id`, `disease_name`) VALUES
(1, 'colds'),
(2, 'Love'),
(3, 'Valentines');

-- --------------------------------------------------------

--
-- Table structure for table `diseaseacquired`
--

CREATE TABLE `diseaseacquired` (
  `acquired_id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `date_acquired` timestamp NULL DEFAULT NULL,
  `date_cured` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diseaseacquired`
--

INSERT INTO `diseaseacquired` (`acquired_id`, `resident_id`, `disease_id`, `date_acquired`, `date_cured`) VALUES
(1, 1, 1, '2018-01-31 16:00:00', '2018-02-08 15:32:49'),
(2, 22, 1, '2018-02-07 16:00:00', NULL),
(3, 23, 1, '1998-02-05 16:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evacuationcenter`
--

CREATE TABLE `evacuationcenter` (
  `evac_id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0',
  `capacity` int(11) NOT NULL,
  `brgy_id` int(11) NOT NULL,
  `house_no` int(11) DEFAULT NULL,
  `street` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evacuationcenter`
--

INSERT INTO `evacuationcenter` (`evac_id`, `location_name`, `population`, `capacity`, `brgy_id`, `house_no`, `street`, `status`) VALUES
(1, 'Barangay Talamban Gymnasium', 5, 100, 1, 123, 'Gov. M. Cuenco Ave', 'active'),
(3, 'Wlay Forever', 8, 1000, 1, 0, '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `evacuationperiod`
--

CREATE TABLE `evacuationperiod` (
  `period_id` int(11) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` timestamp NULL DEFAULT NULL,
  `evac_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evacuationperiod`
--

INSERT INTO `evacuationperiod` (`period_id`, `date_start`, `date_end`, `evac_id`) VALUES
(1, '2018-02-07 08:21:14', '2018-02-07 08:21:42', 1),
(2, '2018-02-07 08:24:11', '2018-02-08 15:47:35', 1),
(3, '2018-02-08 15:48:58', '2018-02-08 15:56:01', 1),
(4, '2018-02-08 15:56:26', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `evacuationshape`
--

CREATE TABLE `evacuationshape` (
  `shape_id` int(11) NOT NULL,
  `evac_id` int(11) NOT NULL,
  `ord` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE `household` (
  `household_id` int(11) NOT NULL,
  `brgy_id` int(11) NOT NULL,
  `house_no` int(11) DEFAULT NULL,
  `street` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`household_id`, `brgy_id`, `house_no`, `street`) VALUES
(1, 2, 1614, 'Nasipit'),
(2, 2, 4547, 'Zamora St.'),
(3, 2, 337852, 'Talisay'),
(4, 2, 4547453, 'Jayme'),
(5, 2, 654, 'P.Del Rosario'),
(6, 2, 2342, 'Elmo'),
(7, 2, 2342, 'Street 1'),
(8, 1, 654, 'Baker'),
(9, 2, 34324, 'HelloHi');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_no` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_type` varchar(25) NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_no`, `item_name`, `qty`, `item_type`, `package_id`) VALUES
(7, 'Corned Beef', 0, 'canned goods', 6);

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
-- Table structure for table `newannouncement`
--

CREATE TABLE `newannouncement` (
  `announce_id` int(11) NOT NULL,
  `datepost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int(11) NOT NULL,
  `an_about` varchar(2000) NOT NULL,
  `an_what` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newannouncement`
--

INSERT INTO `newannouncement` (`announce_id`, `datepost`, `admin_id`, `an_about`, `an_what`) VALUES
(1, '2018-02-07 08:27:59', 2, 'Mount Mayon ', ' The Philippine Institute of Volcanology and Seismology (Phivolcs) has â€œstrongly advisedâ€ the public to be extra vigilant as it warned that a sudden major eruption of the Mayon volcano remains possible.\r\n\r\n\r\n\r\n'),
(4, '2018-02-08 15:41:22', 3, 'Hello', 'Residents are advised to evacuate as soon as possible.');

-- --------------------------------------------------------

--
-- Table structure for table `packagedistribution`
--

CREATE TABLE `packagedistribution` (
  `packdist_id` int(11) NOT NULL,
  `date_dist` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `package_id` int(11) NOT NULL,
  `household_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packagedistribution`
--

INSERT INTO `packagedistribution` (`packdist_id`, `date_dist`, `package_id`, `household_id`) VALUES
(10, '2018-02-20 12:39:29', 6, 1),
(11, '2018-02-20 12:39:52', 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `packageditems`
--

CREATE TABLE `packageditems` (
  `packagedItems_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packageditems`
--

INSERT INTO `packageditems` (`packagedItems_id`, `package_id`, `item_id`, `qty_item`) VALUES
(4, 6, 7, 50);

-- --------------------------------------------------------

--
-- Table structure for table `reliefoperation`
--

CREATE TABLE `reliefoperation` (
  `operation_id` int(11) NOT NULL,
  `operation_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reliefoperation`
--

INSERT INTO `reliefoperation` (`operation_id`, `operation_name`) VALUES
(5, 'Sagip Casptone'),
(6, 'Sagip Kababayan');

-- --------------------------------------------------------

--
-- Table structure for table `reliefpackage`
--

CREATE TABLE `reliefpackage` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `operation_id` int(11) NOT NULL,
  `sponsor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reliefpackage`
--

INSERT INTO `reliefpackage` (`package_id`, `package_name`, `operation_id`, `sponsor_id`) VALUES
(6, 'Hatag-Hatag', 5, 11),
(7, 'Foodies', 5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `resident_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bday` date NOT NULL,
  `admin_id` int(11) NOT NULL,
  `house_memship` varchar(255) NOT NULL,
  `household_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`resident_id`, `fname`, `mname`, `lname`, `gender`, `bday`, `admin_id`, `house_memship`, `household_id`) VALUES
(1, 'Jon', 'Lukas', 'Doe', 'Male', '1990-04-05', 2, 'head', 1),
(2, 'Jane', 'Styles', 'Doe', 'Female', '1992-01-02', 2, 'head''s spouse', 1),
(3, 'Lia', 'Styles', 'Doe', 'Female', '2016-07-08', 2, 'dependent', 1),
(4, 'a', 'b', 'c', 'Male', '1988-08-09', 2, 'head', 2),
(5, 'd', 'e', 'f', 'Female', '1990-07-09', 2, 'head''s spouse', 2),
(6, 'g', 'h', 'i', 'Female', '2016-06-03', 2, 'dependent', 2),
(7, 'mark', 'marky', 'marcus', '\n     ', '1970-07-09', 2, 'head', 3),
(8, 'ma', 'may', 'mayy', 'Female', '1975-03-04', 2, 'head''s spouse', 3),
(9, 'jo', 'ma', 'rie', 'Male', '2000-09-05', 2, 'dependent', 3),
(10, 'ka', 'the', 'rin', 'male', '1995-04-07', 2, 'head', 4),
(11, 'dee', 'jay', 'pi', 'Male', '1991-08-07', 2, 'head''s spouse', 4),
(12, 'kar', 'la', 'lou', 'Female', '2014-06-01', 2, 'dependent', 4),
(13, 'bea', 'st', 'ty', 'Female', '1990-06-03', 2, 'head', 5),
(14, 'virt', 'virt', 'virt', 'Female', '1990-07-08', 2, 'head', 6),
(15, 'ken', 'deee', 'gorro', 'Female', '1999-07-08', 3, 'head', 7),
(16, 'joemarie', 'ra', 'mos', 'Male', '1990-06-05', 3, 'head', 8),
(17, 'mylene', 'deli', 'ma', 'Female', '1990-03-02', 3, 'head''s spouse', 8),
(19, 'Max', '', 'Zuorba', 'Male', '2000-05-06', 3, 'head', 9),
(21, 'Wargreymon', '', 'Digimon', 'Male', '2015-11-28', 3, 'head''s spouse', NULL),
(22, 'Wargreymon', '', 'Courage', 'Male', '2015-09-29', 3, 'head''s spouse', 9),
(23, 'Metalgarurumon', '', 'Friendship', 'Male', '2016-08-27', 3, 'dependent', 9);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `sms_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `datesent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
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

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_id`, `sponsor_name`, `sponsor_type`, `address`, `contact_no`) VALUES
(11, 'John Kent Virtudazo', 'Volunteer', 'Brgy. Talamban, Cebu City', '09222315272');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `mname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `contact_no` varchar(12) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fname`, `mname`, `lname`, `bdate`, `contact_no`, `gender`) VALUES
(1, 'kinginthenorth', '708436083ce6e9d45bb490aedd4bf0b8', 'dazo', 'legend', 'dary', '1997-11-13', '09994738632', 'Male'),
(2, 'mylenechan', 'd9ed5097b6900ec14d92fdefa8b89de5', 'Mylene', 'Delima', 'Pepito', '1996-01-07', '09333392660', 'Female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `evac_id` (`evac_id`),
  ADD KEY `resident_id` (`resident_id`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`brgy_id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `diseaseacquired`
--
ALTER TABLE `diseaseacquired`
  ADD PRIMARY KEY (`acquired_id`),
  ADD KEY `resident_id` (`resident_id`),
  ADD KEY `disease_id` (`disease_id`);

--
-- Indexes for table `evacuationcenter`
--
ALTER TABLE `evacuationcenter`
  ADD PRIMARY KEY (`evac_id`),
  ADD KEY `brgy_id` (`brgy_id`);

--
-- Indexes for table `evacuationperiod`
--
ALTER TABLE `evacuationperiod`
  ADD PRIMARY KEY (`period_id`),
  ADD KEY `evac_id` (`evac_id`);

--
-- Indexes for table `evacuationshape`
--
ALTER TABLE `evacuationshape`
  ADD PRIMARY KEY (`shape_id`),
  ADD KEY `evac_id` (`evac_id`);

--
-- Indexes for table `household`
--
ALTER TABLE `household`
  ADD PRIMARY KEY (`household_id`),
  ADD KEY `household_id` (`household_id`),
  ADD KEY `brgy_id` (`brgy_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_no`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `itemdistribution`
--
ALTER TABLE `itemdistribution`
  ADD KEY `resident_id` (`resident_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `newannouncement`
--
ALTER TABLE `newannouncement`
  ADD PRIMARY KEY (`announce_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `packagedistribution`
--
ALTER TABLE `packagedistribution`
  ADD PRIMARY KEY (`packdist_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `household_id` (`household_id`);

--
-- Indexes for table `packageditems`
--
ALTER TABLE `packageditems`
  ADD PRIMARY KEY (`packagedItems_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `reliefoperation`
--
ALTER TABLE `reliefoperation`
  ADD PRIMARY KEY (`operation_id`);

--
-- Indexes for table `reliefpackage`
--
ALTER TABLE `reliefpackage`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `sponsor_id` (`sponsor_id`),
  ADD KEY `operation_id` (`operation_id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`resident_id`),
  ADD KEY `household_id` (`household_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`sms_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `username` (`user_id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `diseaseacquired`
--
ALTER TABLE `diseaseacquired`
  MODIFY `acquired_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `evacuationcenter`
--
ALTER TABLE `evacuationcenter`
  MODIFY `evac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `evacuationperiod`
--
ALTER TABLE `evacuationperiod`
  MODIFY `period_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `evacuationshape`
--
ALTER TABLE `evacuationshape`
  MODIFY `shape_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `household`
--
ALTER TABLE `household`
  MODIFY `household_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `newannouncement`
--
ALTER TABLE `newannouncement`
  MODIFY `announce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `packagedistribution`
--
ALTER TABLE `packagedistribution`
  MODIFY `packdist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `packageditems`
--
ALTER TABLE `packageditems`
  MODIFY `packagedItems_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reliefoperation`
--
ALTER TABLE `reliefoperation`
  MODIFY `operation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reliefpackage`
--
ALTER TABLE `reliefpackage`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `resident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`evac_id`) REFERENCES `evacuationcenter` (`evac_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`resident_id`) REFERENCES `resident` (`resident_id`);

--
-- Constraints for table `diseaseacquired`
--
ALTER TABLE `diseaseacquired`
  ADD CONSTRAINT `diseaseacquired_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `resident` (`resident_id`),
  ADD CONSTRAINT `diseaseacquired_ibfk_2` FOREIGN KEY (`disease_id`) REFERENCES `disease` (`disease_id`);

--
-- Constraints for table `evacuationcenter`
--
ALTER TABLE `evacuationcenter`
  ADD CONSTRAINT `evacuationcenter_ibfk_2` FOREIGN KEY (`brgy_id`) REFERENCES `barangay` (`brgy_id`);

--
-- Constraints for table `evacuationperiod`
--
ALTER TABLE `evacuationperiod`
  ADD CONSTRAINT `evacuationperiod_ibfk_1` FOREIGN KEY (`evac_id`) REFERENCES `evacuationcenter` (`evac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `evacuationshape`
--
ALTER TABLE `evacuationshape`
  ADD CONSTRAINT `evacuationshape_ibfk_1` FOREIGN KEY (`evac_id`) REFERENCES `evacuationcenter` (`evac_id`);

--
-- Constraints for table `household`
--
ALTER TABLE `household`
  ADD CONSTRAINT `household_ibfk_1` FOREIGN KEY (`brgy_id`) REFERENCES `barangay` (`brgy_id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `reliefpackage` (`package_id`);

--
-- Constraints for table `itemdistribution`
--
ALTER TABLE `itemdistribution`
  ADD CONSTRAINT `itemdistribution_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `resident` (`resident_id`),
  ADD CONSTRAINT `itemdistribution_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_no`);

--
-- Constraints for table `newannouncement`
--
ALTER TABLE `newannouncement`
  ADD CONSTRAINT `newannouncement_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `packagedistribution`
--
ALTER TABLE `packagedistribution`
  ADD CONSTRAINT `packagedistribution_ibfk_2` FOREIGN KEY (`household_id`) REFERENCES `household` (`household_id`),
  ADD CONSTRAINT `packagedistribution_ibfk_3` FOREIGN KEY (`package_id`) REFERENCES `reliefpackage` (`package_id`);

--
-- Constraints for table `packageditems`
--
ALTER TABLE `packageditems`
  ADD CONSTRAINT `packageditems_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `reliefpackage` (`package_id`),
  ADD CONSTRAINT `packageditems_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_no`);

--
-- Constraints for table `reliefpackage`
--
ALTER TABLE `reliefpackage`
  ADD CONSTRAINT `reliefpackage_ibfk_1` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsor` (`sponsor_id`),
  ADD CONSTRAINT `reliefpackage_ibfk_2` FOREIGN KEY (`operation_id`) REFERENCES `reliefoperation` (`operation_id`);

--
-- Constraints for table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `household` FOREIGN KEY (`household_id`) REFERENCES `household` (`household_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `sms_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `sms_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
