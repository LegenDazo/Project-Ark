-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2018 at 04:47 PM
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
  `username` varchar(25) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `bday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `fname`, `mname`, `lname`, `gender`, `age`, `bday`) VALUES
('1', '', 'Jorge', 'Philip', 'Codilla', 'Male', 20, '1997-10-04'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'John', 'Cab', 'Dazo', 'Male', 20, '1997-11-13');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `datepost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `datepost`, `admin_id`, `an_what`, `to_whom`, `date_start`, `date_end`, `time_start`, `time_end`, `description`, `location`) VALUES
(8, '0000-00-00 00:00:00', '1', 'Warning', 'Citizens', '2018-01-01', '2018-01-04', '11:11:00', '14:22:00', 'Lorem Ipsum', 'Metrobank'),
(9, '2018-01-15 10:09:00', '1', 'Bagyo Padulong', 'Residents', '2018-01-01', '2018-01-09', '11:11:00', '14:22:00', 'Lorem Ipsum', 'FOTOJAYA STUDIO');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resident_id` int(11) NOT NULL,
  `evac_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `date`, `resident_id`, `evac_id`, `status`) VALUES
(10, '2018-01-20 10:56:27', 4, 5, 1),
(11, '2018-01-20 10:56:35', 6, 5, 1),
(12, '2018-01-20 10:56:38', 9, 2, 1),
(13, '2018-01-20 10:56:39', 2, 2, 1),
(14, '2018-01-20 10:56:42', 3, 6, 1),
(15, '2018-01-20 10:56:43', 7, 6, 1),
(16, '2018-01-20 10:56:46', 8, 2, 1),
(17, '2018-01-20 10:56:47', 1, 2, 1);

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
  `disease_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`disease_id`, `disease_name`) VALUES
(2, 'colds'),
(3, 'fever');

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
(10, 0, 0, '2018-01-18 04:02:36', NULL),
(12, 1, 3, '2018-01-18 04:02:36', '2018-01-22 15:02:21'),
(13, 2, 2, '2018-01-18 04:02:36', NULL),
(14, 3, 3, '2018-01-18 04:02:36', '2018-01-22 15:02:34'),
(15, 4, 2, '2018-01-18 04:02:36', NULL),
(16, 1, 2, '2018-01-18 04:02:36', '0000-00-00 00:00:00');

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
  `street` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evacuationcenter`
--

INSERT INTO `evacuationcenter` (`evac_id`, `location_name`, `population`, `capacity`, `latitude`, `longitude`, `brgy_id`, `house_no`, `street`, `status`) VALUES
(2, 'Metrobank', 6, 100, 10.3692, 123.917, 7, 100, 'Gov. M. Cuenco Ave', 'active'),
(3, 'San Isidro Parish School', 0, 200, 10.3691, 123.918, 7, 0, 'Gov. M. Cuenco Ave', 'active'),
(4, 'FOTOJAYA STUDIO', 0, 50, 10.3692, 123.916, 7, 0, 'Gov. M. Cuenco Ave', 'active'),
(5, 'Barangay Talamban Gymnasium', 3, 300, 10.3696, 123.917, 7, 0, 'Gov. M. Cuenco Ave', 'active'),
(6, 'Talamban Christian School', 2, 200, 10.3688, 123.916, 7, 0, 'Gov. M. Cuenco Ave', 'active'),
(7, 'Evac2', 0, 300, 10.3698, 123.918, 7, 0, 'Talamban', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE `household` (
  `household_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`household_id`) VALUES
(1),
(5),
(6);

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

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_no`, `item_name`, `qty`, `item_type`, `sponsor_id`, `package_id`) VALUES
(2, 'Neozep', 30, 'medicine', 1, 1),
(3, 'Corned Beef', 5, 'canned good', 1, 2);

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
  `date_dist` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `package_id` int(11) NOT NULL,
  `household_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packagedistribution`
--

INSERT INTO `packagedistribution` (`packdist_id`, `date_dist`, `package_id`, `household_id`) VALUES
(0, '2018-01-18 04:13:16', 1, 1),
(0, '2018-01-18 07:59:26', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reliefoperation`
--

CREATE TABLE `reliefoperation` (
  `operation_id` int(11) NOT NULL,
  `operation_name` varchar(255) NOT NULL,
  `evac_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reliefoperation`
--

INSERT INTO `reliefoperation` (`operation_id`, `operation_name`, `evac_id`) VALUES
(1, 'sagip capstone', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reliefpackage`
--

CREATE TABLE `reliefpackage` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `operation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reliefpackage`
--

INSERT INTO `reliefpackage` (`package_id`, `package_name`, `operation_id`) VALUES
(1, 'Medicine', 1),
(2, 'Foodie', 1);

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
  `brgy_id` int(11) NOT NULL,
  `admin_id` varchar(25) NOT NULL,
  `house_no` int(11) NOT NULL,
  `street` varchar(1000) NOT NULL,
  `house_memship` varchar(255) NOT NULL,
  `household_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`resident_id`, `fname`, `mname`, `lname`, `gender`, `bday`, `brgy_id`, `admin_id`, `house_no`, `street`, `house_memship`, `household_id`) VALUES
(1, 'Jorge Philip', 'Tarog', 'Codilla', 'Male', '2018-01-01', 0, '', 324, 'V.Rama ', '', 1),
(2, 'John Kent', 'CabaÃ±ez', 'Virtudazo', 'Male', '2018-01-02', 0, '', 6969, 'Gov. M. Cuenco Ave', '', 1),
(3, 'Mylene', 'Delima', 'Pepito', 'Female', '2018-01-04', 0, '', 123, 'Punta', '', 1),
(4, 'Abigail', 'Inoc', 'Velasquez', 'Female', '2018-01-10', 0, '', 789, 'Paknaan', '', 1),
(6, 'Max', 'Delante', 'Zuorba', 'Male', '2000-05-06', 7, '', 120, 'Nasipit, Talamban, Cebu', 'head', 5),
(7, 'Monina', 'Garcia', 'So', 'Female', '1998-12-20', 7, '', 120, 'Nasipit, Talamban, Cebu', 'head''s spouse', 5),
(8, 'jon', 'snow', 'kent', 'male', '2018-01-10', 7, '', 2342354, 'dfgdrgd', 'head', 6),
(9, 'emilia', 'clarke', 'sdfse', 'female', '2018-01-01', 7, '', 2342354, 'dfgdrgd', 'head''s spouse', 6);

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

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_id`, `sponsor_name`, `sponsor_type`, `address`, `contact_no`) VALUES
(1, 'Philippine Government', 'Govenment Organization', 'hhdhsf', '9ye3y3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `mname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `contact_no` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fname`, `mname`, `lname`, `bdate`, `contact_no`) VALUES
('Dazolater', 'c8dce89a1fd0b76ddc588dc2a4f10feb', 'Kentoy', 'Kentoy', 'Kentoy', '1997-12-12', '09224165592'),
('dazolator', 'dazolator21', 'kent', 'cab', 'virtz', '2018-01-01', '09159294204'),
('legendazo', 'a21aaacde7e7d39e551dc0dd58ffe950', 'John Kent', 'Cabanez', 'Virtudazo', '1997-11-13', '09994738632');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

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
  ADD PRIMARY KEY (`disease_id`);

--
-- Indexes for table `diseaseacquired`
--
ALTER TABLE `diseaseacquired`
  ADD PRIMARY KEY (`acquired_id`);

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
  ADD KEY `household_id` (`household_id`);

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
  ADD PRIMARY KEY (`resident_id`),
  ADD KEY `household_id` (`household_id`);

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
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `brgy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `disease_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `diseaseacquired`
--
ALTER TABLE `diseaseacquired`
  MODIFY `acquired_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `evacuationcenter`
--
ALTER TABLE `evacuationcenter`
  MODIFY `evac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `household`
--
ALTER TABLE `household`
  MODIFY `household_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reliefoperation`
--
ALTER TABLE `reliefoperation`
  MODIFY `operation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `resident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `smschecker`
--
ALTER TABLE `smschecker`
  MODIFY `checker_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`username`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`evac_id`) REFERENCES `evacuationcenter` (`evac_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`resident_id`) REFERENCES `resident` (`resident_id`);

--
-- Constraints for table `evacuationcenter`
--
ALTER TABLE `evacuationcenter`
  ADD CONSTRAINT `evacuationcenter_ibfk_2` FOREIGN KEY (`brgy_id`) REFERENCES `barangay` (`brgy_id`);

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
-- Constraints for table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `household` FOREIGN KEY (`household_id`) REFERENCES `household` (`household_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `sms_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
