-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 11:08 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ark`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` int(11) NOT NULL,
  `bday` date NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `fname`, `mname`, `lname`, `gender`, `age`, `bday`) VALUES
('1', '', 'Jorge', 'Philip', 'Codilla', 'Male', 20, '1997-10-04'),
('admin', 'admin', 'John Kent', 'Cabanez', 'Virtudazo', 'Male', 20, '2018-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
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
  `location` varchar(1000) NOT NULL,
  PRIMARY KEY (`announcement_id`),
  KEY `admin_id` (`admin_id`)
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

CREATE TABLE IF NOT EXISTS `attendance` (
  `attendance_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resident_id` int(11) NOT NULL,
  `evac_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`attendance_id`),
  UNIQUE KEY `resident_id` (`resident_id`),
  KEY `evac_id` (`evac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `date`, `resident_id`, `evac_id`, `status`) VALUES
(7, '2018-01-10 12:03:56', 4, 2, 0),
(8, '2018-01-14 06:47:42', 1, 2, 0),
(9, '2018-01-14 06:48:56', 3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE IF NOT EXISTS `barangay` (
  `brgy_id` int(11) NOT NULL,
  `brgy_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  PRIMARY KEY (`brgy_id`)
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

CREATE TABLE IF NOT EXISTS `disease` (
  `disease_id` int(11) NOT NULL,
  `disease_name` varchar(255) NOT NULL,
  PRIMARY KEY (`disease_id`)
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

CREATE TABLE IF NOT EXISTS `diseaseacquired` (
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
(10, 0, 0, '2018-01-18 09:48:39', '2018-01-18 10:00:48'),
(12, 1, 3, '2018-01-18 09:48:39', '2018-01-18 10:00:48'),
(13, 2, 2, '2018-01-18 09:48:39', '2018-01-18 10:00:48'),
(14, 3, 3, '2018-01-18 09:48:39', '2018-01-18 10:00:48'),
(15, 4, 2, '2018-01-18 09:48:39', '2018-01-18 10:00:48'),
(16, 1, 2, '2018-01-18 09:48:39', '2018-01-18 10:00:48'),
(10, 0, 0, '2018-01-18 04:02:36', '2018-01-18 10:00:48'),
(12, 1, 3, '2018-01-18 04:02:36', '2018-01-18 10:00:48'),
(13, 2, 2, '2018-01-18 04:02:36', '2018-01-18 10:00:48'),
(14, 3, 3, '2018-01-18 04:02:36', '2018-01-18 10:00:48'),
(15, 4, 2, '0000-00-00 00:00:00', '2018-01-18 10:00:48'),
(16, 1, 2, '2018-01-18 04:02:36', '2018-01-18 10:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `evacuationcenter`
--

CREATE TABLE IF NOT EXISTS `evacuationcenter` (
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

CREATE TABLE IF NOT EXISTS `household` (
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

CREATE TABLE IF NOT EXISTS `item` (
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
(2, 'Neozep', 30, 'medicine', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemdistribution`
--

CREATE TABLE IF NOT EXISTS `itemdistribution` (
  `itemdist_id` int(11) NOT NULL,
  `date_dist` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packagedistribution`
--

CREATE TABLE IF NOT EXISTS `packagedistribution` (
  `packdist_id` int(11) NOT NULL,
  `date_dist` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `package_id` int(11) NOT NULL,
  `household_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packagedistribution`
--

INSERT INTO `packagedistribution` (`packdist_id`, `date_dist`, `package_id`, `household_id`) VALUES
(0, '2018-01-17 16:00:00', 1, 1),
(0, '0000-00-00 00:00:00', 1, 5),
(0, '0000-00-00 00:00:00', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `reliefoperation`
--

CREATE TABLE IF NOT EXISTS `reliefoperation` (
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

CREATE TABLE IF NOT EXISTS `reliefpackage` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `operation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reliefpackage`
--

INSERT INTO `reliefpackage` (`package_id`, `package_name`, `operation_id`) VALUES
(1, 'Medicine', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE IF NOT EXISTS `resident` (
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
(5, '12', '12', '12', '12', '2018-12-31', 7, '', 12, '12', 'head', 1),
(6, 'Max', 'Delante', 'Zuorba', 'Male', '2000-05-06', 7, '', 120, 'Nasipit, Talamban, Cebu', 'head', 5),
(7, 'Monina', 'Garcia', 'So', 'Female', '1998-12-20', 7, '', 120, 'Nasipit, Talamban, Cebu', 'head''s spouse', 5),
(8, 'jon', 'snow', 'kent', 'male', '2018-01-10', 7, '', 2342354, 'dfgdrgd', 'head', 6),
(9, 'emilia', 'clarke', 'sdfse', 'female', '2018-01-01', 7, '', 2342354, 'dfgdrgd', 'head''s spouse', 6);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
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

CREATE TABLE IF NOT EXISTS `smschecker` (
  `checker_id` int(11) NOT NULL,
  `sms_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE IF NOT EXISTS `sponsor` (
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

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `contact_no` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fname`, `mname`, `lname`, `bdate`, `contact_no`) VALUES
('bacolod', 'bacolod', 'Mylene', 'Delima', 'Pepito', '2018-01-16', '639254853869'),
('LegenDazo', 'legend', 'John Kent', 'Cabanez', 'Virtudazo', '2015-08-13', '639994738632'),
('yeloverkill', 'yel', 'Ariel', 'Sarcon', 'Grayda', '1997-09-09', '0910291536');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
