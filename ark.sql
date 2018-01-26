-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 09:20 AM
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
  `password` varchar(80) NOT NULL,
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
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Mylene', 'Cab', 'Dazo', 'Male', 20, '1997-11-13'),
('admin123', '0192023a7bbd73250516f069df18b500', 'Kent', 'Cab', 'Virtudazo', 'male', 20, '2016-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `datepost`, `admin_id`, `an_what`, `to_whom`, `date_start`, `date_end`, `time_start`, `time_end`, `description`, `location`) VALUES
(8, '0000-00-00 00:00:00', '1', 'Warning', 'Citizens', '2018-01-01', '2018-01-04', '11:11:00', '14:22:00', 'Lorem Ipsum', 'Metrobank'),
(9, '2018-01-15 10:09:00', '1', 'Bagyo Padulong', 'Residents', '2018-01-01', '2018-01-09', '11:11:00', '14:22:00', 'Lorem Ipsum', 'FOTOJAYA STUDIO'),
(10, '2018-01-25 09:28:59', '1', 'Typhoon Virtz', 'John Kent Virtudazo', '2018-01-25', '2018-01-26', '01:00:00', '00:00:00', 'Kini nga bagyo delikado, gikinahanglan ang tanan nga mo-evacuate dayon.', 'FOTOJAYA STUDIO'),
(11, '2018-01-25 16:58:01', '1', 'What: Lorem ipsum dolor sit amet, consectetur adipiscing elit\r\nWhen: Ut enim ad minim veniam\r\nWhere: Duis aute irure dolor in reprehenderit \r\nPurpose: Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', '', ''),
(12, '2018-01-25 16:59:13', '1', 'What: Lorem ipsum dolor sit amet, consectetur adipiscing elit\r\nWhen: Ut enim ad minim veniam\r\nWhere: Duis aute irure dolor in reprehenderit \r\nPurpose: Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', '', ''),
(13, '2018-01-25 17:43:27', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', '', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resident_id` int(11) NOT NULL,
  `evac_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`attendance_id`),
  UNIQUE KEY `resident_id` (`resident_id`),
  KEY `evac_id` (`evac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `date`, `resident_id`, `evac_id`, `status`) VALUES
(11, '2018-01-20 10:56:35', 6, 5, 1),
(13, '2018-01-20 10:56:39', 2, 2, 1),
(14, '2018-01-20 10:56:42', 3, 6, 1),
(15, '2018-01-20 10:56:43', 7, 6, 1),
(16, '2018-01-20 10:56:46', 8, 2, 1),
(23, '2018-01-25 09:16:10', 40, 7, 1),
(24, '2018-01-26 06:57:24', 4, 5, 1),
(25, '2018-01-26 06:57:25', 47, 5, 1),
(26, '2018-01-26 06:57:27', 33, 5, 1),
(27, '2018-01-26 06:57:28', 29, 5, 1),
(28, '2018-01-26 07:02:49', 13, 5, 1),
(29, '2018-01-26 07:02:50', 17, 5, 1),
(30, '2018-01-26 07:02:51', 10, 5, 1),
(31, '2018-01-26 07:02:52', 26, 5, 1),
(32, '2018-01-26 07:09:30', 31, 5, 1),
(33, '2018-01-26 07:09:31', 41, 5, 1),
(34, '2018-01-26 07:09:33', 45, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE IF NOT EXISTS `barangay` (
  `brgy_id` int(11) NOT NULL AUTO_INCREMENT,
  `brgy_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  PRIMARY KEY (`brgy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
  `disease_id` int(11) NOT NULL AUTO_INCREMENT,
  `disease_name` varchar(255) NOT NULL,
  PRIMARY KEY (`disease_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`disease_id`, `disease_name`) VALUES
(2, 'colds'),
(3, 'fever'),
(4, 'lbm'),
(5, 'cough'),
(6, 'amaw');

-- --------------------------------------------------------

--
-- Table structure for table `diseaseacquired`
--

CREATE TABLE IF NOT EXISTS `diseaseacquired` (
  `acquired_id` int(11) NOT NULL AUTO_INCREMENT,
  `resident_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `date_acquired` timestamp NULL DEFAULT NULL,
  `date_cured` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`acquired_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `diseaseacquired`
--

INSERT INTO `diseaseacquired` (`acquired_id`, `resident_id`, `disease_id`, `date_acquired`, `date_cured`) VALUES
(10, 0, 0, '2018-01-18 04:02:36', NULL),
(12, 1, 3, '2018-01-18 04:02:36', '2018-01-22 15:02:21'),
(13, 2, 2, '2018-01-18 04:02:36', '2018-01-25 09:37:55'),
(14, 3, 3, '2018-01-18 04:02:36', '2018-01-22 15:02:34'),
(15, 4, 2, '2018-01-18 04:02:36', NULL),
(16, 1, 2, '2018-01-18 04:02:36', '0000-00-00 00:00:00'),
(17, 1, 4, '2018-01-24 16:00:00', NULL),
(18, 3, 3, '2018-01-24 16:00:00', '2018-01-26 04:57:21'),
(19, 27, 5, '2017-11-10 16:00:00', NULL),
(20, 31, 3, '2018-01-15 16:00:00', NULL),
(21, 31, 4, '2018-01-19 16:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evacuationcenter`
--

CREATE TABLE IF NOT EXISTS `evacuationcenter` (
  `evac_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) NOT NULL,
  `population` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `brgy_id` int(11) NOT NULL,
  `house_no` int(11) NOT NULL,
  `street` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`evac_id`),
  KEY `brgy_id` (`brgy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `evacuationcenter`
--

INSERT INTO `evacuationcenter` (`evac_id`, `location_name`, `population`, `capacity`, `latitude`, `longitude`, `brgy_id`, `house_no`, `street`, `status`) VALUES
(2, 'Metrobank', 4, 100, 10.3692, 123.917, 7, 100, 'Gov. M. Cuenco Ave', 'active'),
(3, 'San Isidro Parish School', 0, 200, 10.3691, 123.918, 7, 0, 'Gov. M. Cuenco Ave', 'active'),
(4, 'FOTOJAYA STUDIO', 0, 50, 10.3692, 123.916, 7, 0, 'Gov. M. Cuenco Ave', 'active'),
(5, 'Barangay Talamban Gymnasium', 13, 300, 10.3696, 123.917, 7, 0, 'Gov. M. Cuenco Ave', 'active'),
(6, 'Talamban Christian School', 2, 200, 10.3688, 123.916, 7, 0, 'Gov. M. Cuenco Ave', 'active'),
(7, 'Evac2', 1, 300, 10.3698, 123.918, 7, 0, 'Talamban', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE IF NOT EXISTS `household` (
  `household_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`household_id`),
  KEY `household_id` (`household_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`household_id`) VALUES
(1),
(5),
(6),
(7),
(8);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_no` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_type` varchar(25) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  PRIMARY KEY (`item_no`),
  KEY `sponsor_id` (`sponsor_id`),
  KEY `package_id` (`package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `itemdistribution` (
  `itemdist_id` int(11) NOT NULL,
  `date_dist` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  KEY `resident_id` (`resident_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newannouncement`
--

CREATE TABLE IF NOT EXISTS `newannouncement` (
  `announce_id` int(11) NOT NULL AUTO_INCREMENT,
  `datepost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` varchar(25) NOT NULL,
  `an_about` varchar(2000) NOT NULL,
  `an_what` varchar(1000) NOT NULL,
  PRIMARY KEY (`announce_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `newannouncement`
--

INSERT INTO `newannouncement` (`announce_id`, `datepost`, `admin_id`, `an_about`, `an_what`) VALUES
(1, '2018-01-26 03:22:21', '1', '', 'Mangamatay ra tang tanan'),
(2, '2018-01-26 07:55:09', '1', 'Forever', 'Way forever'),
(3, '2018-01-26 08:07:04', 'admin', 'EDI WEH!', 'Lorem ipsum dolor sit amet');

-- --------------------------------------------------------

--
-- Table structure for table `packagedistribution`
--

CREATE TABLE IF NOT EXISTS `packagedistribution` (
  `packdist_id` int(11) NOT NULL,
  `date_dist` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `package_id` int(11) NOT NULL,
  `household_id` int(11) NOT NULL,
  KEY `package_id` (`package_id`),
  KEY `household_id` (`household_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packagedistribution`
--

INSERT INTO `packagedistribution` (`packdist_id`, `date_dist`, `package_id`, `household_id`) VALUES
(0, '2018-01-18 04:13:16', 1, 1),
(0, '2018-01-18 07:59:26', 1, 5),
(0, '2018-01-25 09:19:15', 1, 6),
(0, '2018-01-25 09:20:43', 1, 7),
(0, '2018-01-26 06:56:36', 4, 5),
(0, '2018-01-26 06:58:06', 4, 6),
(0, '2018-01-26 07:02:07', 4, 1),
(0, '2018-01-26 07:02:13', 1, 8),
(0, '2018-01-26 07:08:07', 2, 1),
(0, '2018-01-26 07:08:12', 2, 5),
(0, '2018-01-26 07:08:35', 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `reliefoperation`
--

CREATE TABLE IF NOT EXISTS `reliefoperation` (
  `operation_id` int(11) NOT NULL AUTO_INCREMENT,
  `operation_name` varchar(255) NOT NULL,
  `evac_id` int(11) NOT NULL,
  PRIMARY KEY (`operation_id`),
  KEY `evac_id` (`evac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `reliefoperation`
--

INSERT INTO `reliefoperation` (`operation_id`, `operation_name`, `evac_id`) VALUES
(1, 'sagip capstone', 2),
(2, 'doh', 5),
(3, 'doh', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reliefpackage`
--

CREATE TABLE IF NOT EXISTS `reliefpackage` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `operation_id` int(11) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reliefpackage`
--

INSERT INTO `reliefpackage` (`package_id`, `package_name`, `operation_id`) VALUES
(1, 'Medicine', 1),
(2, 'Foodie', 1),
(3, 'Drink', 1),
(4, 'Clothes', 1),
(5, 'All in', 2);

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE IF NOT EXISTS `resident` (
  `resident_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `household_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`resident_id`),
  KEY `household_id` (`household_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`resident_id`, `fname`, `mname`, `lname`, `gender`, `bday`, `brgy_id`, `admin_id`, `house_no`, `street`, `house_memship`, `household_id`) VALUES
(1, 'Jorge Philip', 'Tarog', 'Codilla', 'Male', '2018-01-01', 0, '', 324, 'V.Rama ', '', 1),
(2, 'John Kent', 'CabaÃ±ez', 'Virtudazo', 'Male', '2018-01-02', 0, '', 6969, 'Gov. M. Cuenco Ave', '', 1),
(3, 'Mylene', 'Delima', 'Pepito', 'Female', '2018-01-04', 0, '', 123, 'Punta', '', 1),
(4, 'Abigail', 'Inoc', 'Velasquez', 'Female', '2018-01-10', 0, '', 789, 'Paknaan', '', 1),
(6, 'Jo', 'Mar', 'Rie', 'Male', '2000-05-06', 7, '', 120, 'Nasipit, Talamban, Cebu', 'head', 5),
(7, 'Monina', 'Garcia', 'So', 'Female', '1998-12-20', 7, '', 120, 'Nasipit, Talamban, Cebu', 'head''s spouse', NULL),
(8, 'jon', 'snow', 'kent', 'male', '2018-01-10', 7, '', 2342354, 'dfgdrgd', 'head', 6),
(9, 'emilia', 'clarke', 'sdfse', 'female', '2018-01-01', 7, '', 2342354, 'dfgdrgd', 'dependent', 6),
(10, 'resident', 'zxvzx', 'tasdfasd', 'female', '2018-01-01', 7, '', 654, 'Nasipit', 'head', 7),
(12, 'spouse', 'test', 'testing', 'female', '2018-01-01', 7, '', 654, 'Nasipit', 'head''s spouse', 7),
(13, 'person', 'person', 'kjlkj', 'male', '2018-01-03', 0, '', 0, '', 'dependent', NULL),
(14, '', '', '', '', '0000-00-00', 0, '', 0, '', 'dependent', NULL),
(15, 'null', 'null', 'null', 'female', '2018-01-03', 0, '', 0, '', 'dependent', NULL),
(16, '', '', '', '', '0000-00-00', 0, '', 0, '', 'dependent', NULL),
(17, 'qwer', 'qwe', 'werw', '', '2018-01-03', 0, '', 0, '', 'dependent', NULL),
(22, 'sdfasdf', 'adfgad', 'adfgaer', 'adfa', '2018-01-11', 0, '', 0, '', 'dependent', NULL),
(23, '', '', '', '', '0000-00-00', 0, '', 0, '', 'dependent', NULL),
(24, 'tao', 'sdgs', 'ZDXCS', 'female', '2018-01-10', 0, '', 0, '', 'head''s spouse', NULL),
(25, '', '', '', '', '0000-00-00', 0, '', 0, '', 'dependent', NULL),
(26, 'sakura', 'sdfs', 'sdss', 'female', '2016-10-05', 0, '', 0, '', 'dependent', NULL),
(27, 'norf', 'phine', 'sa', '', '2018-01-03', 0, '', 0, '', 'dependent', NULL),
(28, 'may', 'may', 'sett', 'female', '2018-01-09', 0, '', 0, '', 'dependent', NULL),
(29, 'bacolod', '', '', '', '0000-00-00', 0, '', 0, '', 'dependent', NULL),
(30, 'mylene', 'd', '', '', '0000-00-00', 0, '', 0, '', 'dependent', NULL),
(31, 'horhe', 'dfgsd', 'sdfgsdg', 'male', '2018-01-01', 0, '', 0, '', 'dependent', NULL),
(32, 'Maymay', 'Mylene', 'Delima', 'Female', '2018-01-01', 8, '', 126, 'Talisay', 'head''s spouse', 8),
(33, 'Bacolod', 'B', 'Reyes', 'Male', '2018-01-01', 8, '', 126, 'Talisay', 'head', 8),
(34, 'Sure ka?', 'Sure', 'Hello', 'Helico', '2016-11-29', 8, '', 126, 'Talisay', 'dependent', NULL),
(38, 'Maymay 2', 'May Love Bacolod', 'Broken H', 'Double', '1985-10-29', 8, '', 126, 'Talisay', 'dependent', 8),
(39, 'Maymay loves u', 'may i love', 'love', 'love', '2016-11-30', 8, '', 126, 'Talisay', 'dependent', 8),
(40, 'george', 'haha', 'haha', 'lol', '2016-11-30', 8, '', 126, 'Talisay', 'dependent', NULL),
(41, 'I WAIT', 'day6', 'irene', 'hehe', '1970-12-12', 8, '', 126, 'Talisay', 'dependent', NULL),
(42, 'May', 'Loves', 'Bacolod', 'Pancit', '1900-05-05', 8, '', 126, 'Talisay', 'dependent', 8),
(43, 'Mylene', 'Loves', 'Mr.Bacolod', 'Vice G', '1978-05-04', 8, '', 126, 'Talisay', 'dependent', 8),
(44, 'MYLENE', 'BACOLOD', 'BACOLOD', 'LOVE', '2000-01-01', 8, '', 126, 'Talisay', 'dependent', 8),
(45, 'Maria', 'Flor', 'De Luna', 'Female', '2000-06-06', 7, '', 120, 'Nasipit, Talamban, Cebu', 'dependent', 5),
(46, 'My', 'Lene', 'Delima', 'Female', '2000-05-08', 7, '', 120, 'Nasipit, Talamban, Cebu', 'head''s spouse', 5),
(47, 'asawa', 'niÂ ', 'jon', 'female', '2016-09-01', 7, '', 2342354, 'dfgdrgd', 'head''s spouse', 6);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `sms_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `datesent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  PRIMARY KEY (`sms_id`),
  KEY `admin_id` (`admin_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smschecker`
--

CREATE TABLE IF NOT EXISTS `smschecker` (
  `checker_id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`checker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE IF NOT EXISTS `sponsor` (
  `sponsor_id` int(11) NOT NULL AUTO_INCREMENT,
  `sponsor_name` varchar(255) NOT NULL,
  `sponsor_type` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  PRIMARY KEY (`sponsor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_id`, `sponsor_name`, `sponsor_type`, `address`, `contact_no`) VALUES
(1, 'Philippine Government', 'Govenment Organization', 'hhdhsf', '9ye3y3'),
(2, 'Mylene ', 'Annonymous', 'Albay Naga', '6854054');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `mname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `contact_no` varchar(12) NOT NULL,
  `gender` varchar(6) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fname`, `mname`, `lname`, `bdate`, `contact_no`, `gender`) VALUES
('AlphaDog', 'c0f5a2169ee33f27623573afbe0433bf', 'Kevin ', 'Luardo', 'Cubillo', '1999-09-30', '09257336637', 'Male'),
('amrafeeler', '563299f71f47f1230fb7fc85eafca888', 'Amrafel John', 'Guardiana', 'Tulingin', '1999-01-18', '09333392660', 'Male'),
('EevieTachi69', '058049fad40b9368a5bfad678b5db3bf', 'Geneveve', 'Alatraca', 'Bacalso', '1998-07-26', '09154374633', 'Female'),
('Jon Snow', '694a1e7cf5570a6587cda63eb639267a', 'marchell', 'suico', 'martirez', '1997-02-05', '09158408532', 'Male'),
('kentoy123', '1ca8a4c262a2a3f2856b24775facf0f8', 'Kent', 'Cabanez', 'Virtudazo', '1997-11-13', '09994738632', 'Male'),
('norfphine', '198eecd3f0e748d7327fbcd9f09b3b8b', 'Norfphine', 'C', 'Saberon', '1998-01-29', '09420409523', 'Female'),
('sheenahespiritu', 'df10ef8509dc176d733d59549e7dbfaf', 'Sheenah Mae', 'Cabico', 'Espiritu', '1997-03-05', '09238416200', 'Female'),
('theprincessofthestars', 'df93c9d4a03ca3818ad391e96955ebdc', 'Elizabeth Hope', 'Velasquez', 'Soberano', '1999-01-19', '09055488757', 'Female'),
('tinytietay', 'dcf2146e0150334db7a61025a4e3a40a', 'Harvestyne Marie', 'Maraya', 'Auxillo', '1998-10-13', '09157589504', 'Female');

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
