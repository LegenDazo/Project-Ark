-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2018 at 08:45 AM
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bday` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fname`, `mname`, `lname`, `gender`, `bday`) VALUES
(1, '1', '4acb4bc224acbbe3c2bfdcaa39a4324e', 'Jorge', 'Philip', 'Codilla', 'Male', '1997-10-04'),
(2, 'admin', '4acb4bc224acbbe3c2bfdcaa39a4324e', 'May', 'Chan', 'Dazo', 'Male', '1997-11-13'),
(3, 'admin123', '0192023a7bbd73250516f069df18b500', 'Kent Gwapo', 'CabDazo', 'Virtudazo ', 'male', '2015-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_out` timestamp NULL DEFAULT NULL,
  `resident_id` int(11) NOT NULL,
  `evac_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`attendance_id`),
  KEY `evac_id` (`evac_id`),
  KEY `resident_id` (`resident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
(9, '2018-02-08 15:31:53', '2018-02-08 15:56:01', 22, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `disease` (
  `disease_id` int(11) NOT NULL AUTO_INCREMENT,
  `disease_name` varchar(255) NOT NULL,
  PRIMARY KEY (`disease_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `diseaseacquired` (
  `acquired_id` int(11) NOT NULL AUTO_INCREMENT,
  `resident_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `date_acquired` timestamp NULL DEFAULT NULL,
  `date_cured` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`acquired_id`),
  KEY `resident_id` (`resident_id`),
  KEY `disease_id` (`disease_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `evacuationcenter` (
  `evac_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0',
  `capacity` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `brgy_id` int(11) NOT NULL,
  `house_no` int(11) DEFAULT NULL,
  `street` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`evac_id`),
  KEY `brgy_id` (`brgy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `evacuationcenter`
--

INSERT INTO `evacuationcenter` (`evac_id`, `location_name`, `population`, `capacity`, `latitude`, `longitude`, `brgy_id`, `house_no`, `street`, `status`) VALUES
(1, 'Barangay Talamban Gymnasium', 0, 100, 10.3696, 123.917, 1, 123, 'Gov. M. Cuenco Ave', 'active'),
(3, 'Wlay Forever', 0, 1000, 10, 120, 1, 0, '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `evacuationperiod`
--

CREATE TABLE IF NOT EXISTS `evacuationperiod` (
  `period_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` timestamp NULL DEFAULT NULL,
  `evac_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`period_id`),
  KEY `evac_id` (`evac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `evacuationperiod`
--

INSERT INTO `evacuationperiod` (`period_id`, `date_start`, `date_end`, `evac_id`) VALUES
(1, '2018-02-07 08:21:14', '2018-02-07 08:21:42', 1),
(2, '2018-02-07 08:24:11', '2018-02-08 15:47:35', 1),
(3, '2018-02-08 15:48:58', '2018-02-08 15:56:01', 1),
(4, '2018-02-08 15:56:26', '2018-02-09 05:41:28', 1),
(5, '2018-02-09 05:42:28', NULL, 1),
(6, '2018-02-09 05:42:30', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `household`
--

CREATE TABLE IF NOT EXISTS `household` (
  `household_id` int(11) NOT NULL AUTO_INCREMENT,
  `brgy_id` int(11) NOT NULL,
  `house_no` int(11) DEFAULT NULL,
  `street` varchar(1000) NOT NULL,
  PRIMARY KEY (`household_id`),
  KEY `household_id` (`household_id`),
  KEY `brgy_id` (`brgy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `household`
--

INSERT INTO `household` (`household_id`, `brgy_id`, `house_no`, `street`) VALUES
(1, 2, 1614, 'Nasipit'),
(2, 2, 4547, 'Zamora St.'),
(3, 2, 337852, 'Talisay'),
(4, 2, 4547453, 'Jayme'),
(8, 1, 654, 'Baker'),
(9, 2, 34324, 'HelloHi'),
(10, 1, 963, 'Nasipit'),
(11, 1, 693, 'Nasipit 1');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `item_no` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_type` varchar(25) NOT NULL,
  `package_id` int(11) NOT NULL,
  PRIMARY KEY (`item_no`),
  KEY `package_id` (`package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_no`, `item_name`, `qty`, `item_type`, `package_id`) VALUES
(1, 'Corned Beef', 200, 'Consumable', 1),
(2, 'Corned Beef', 50, 'Consumable', 1),
(3, 'Corned Beef', 200, 'Consumable', 1),
(5, 'Corned Beef', 300, 'Sisig', 1),
(6, 'HASH', 34, 'hi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemdistribution`
--

CREATE TABLE IF NOT EXISTS `itemdistribution` (
  `itemdist_id` int(11) NOT NULL,
  `date_dist` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  KEY `resident_id` (`resident_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newannouncement`
--

CREATE TABLE IF NOT EXISTS `newannouncement` (
  `announce_id` int(11) NOT NULL AUTO_INCREMENT,
  `datepost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int(11) NOT NULL,
  `an_about` varchar(2000) NOT NULL,
  `an_what` varchar(1000) NOT NULL,
  PRIMARY KEY (`announce_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `newannouncement`
--

INSERT INTO `newannouncement` (`announce_id`, `datepost`, `admin_id`, `an_about`, `an_what`) VALUES
(1, '2018-02-07 08:27:59', 2, 'Mount Mayon ', ' The Philippine Institute of Volcanology and Seismology (Phivolcs) has â€œstrongly advisedâ€ the public to be extra vigilant as it warned that a sudden major eruption of the Mayon volcano remains possible.\r\n\r\n\r\n\r\n'),
(4, '2018-02-08 15:41:22', 3, 'Hello', 'Mangamatay ratang tnan');

-- --------------------------------------------------------

--
-- Table structure for table `packagedistribution`
--

CREATE TABLE IF NOT EXISTS `packagedistribution` (
  `packdist_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_dist` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `package_id` int(11) NOT NULL,
  `household_id` int(11) NOT NULL,
  PRIMARY KEY (`packdist_id`),
  KEY `package_id` (`package_id`),
  KEY `household_id` (`household_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `packagedistribution`
--

INSERT INTO `packagedistribution` (`packdist_id`, `date_dist`, `package_id`, `household_id`) VALUES
(1, '2018-02-08 11:07:52', 1, 2),
(2, '2018-02-08 11:07:57', 1, 4),
(3, '2018-02-08 15:38:17', 1, 3),
(4, '2018-02-08 16:13:26', 4, 1),
(5, '2018-02-08 16:13:50', 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `packageditems`
--

CREATE TABLE IF NOT EXISTS `packageditems` (
  `packagedItems_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty_item` int(11) NOT NULL,
  PRIMARY KEY (`packagedItems_id`),
  KEY `package_id` (`package_id`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `packageditems`
--

INSERT INTO `packageditems` (`packagedItems_id`, `package_id`, `item_id`, `qty_item`) VALUES
(2, 4, 6, 20),
(3, 1, 2, 150);

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
(1, 'Sagip Kapuso', 1),
(2, 'Eagle', 3),
(3, 'Flying', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reliefpackage`
--

CREATE TABLE IF NOT EXISTS `reliefpackage` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(255) NOT NULL,
  `operation_id` int(11) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  PRIMARY KEY (`package_id`),
  KEY `sponsor_id` (`sponsor_id`),
  KEY `operation_id` (`operation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `reliefpackage`
--

INSERT INTO `reliefpackage` (`package_id`, `package_name`, `operation_id`, `sponsor_id`) VALUES
(1, 'Food', 1, 1),
(4, 'Relief Goods', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE IF NOT EXISTS `resident` (
  `resident_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `bday` date NOT NULL,
  `admin_id` int(11) NOT NULL,
  `house_memship` varchar(255) NOT NULL,
  `household_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`resident_id`),
  KEY `household_id` (`household_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`resident_id`, `fname`, `mname`, `lname`, `gender`, `bday`, `admin_id`, `house_memship`, `household_id`) VALUES
(1, 'Jon', 'Lukas', 'Doe', 'Male', '1990-04-05', 2, 'head', 1),
(2, 'Jane', 'Styles', 'Doe', 'Female', '1992-01-02', 2, 'head''s spouse', 1),
(3, 'Lia', 'Styles', 'Doe', 'Female', '2016-07-08', 2, 'dependent', 1),
(4, 'Landon', 'Bay', 'Smith', 'Male', '1988-08-09', 2, 'head', 2),
(5, 'Aide', 'Kozel', 'Smith', 'Female', '1990-07-09', 2, 'head''s spouse', 2),
(6, 'Crystal', 'Kozel', 'Smith', 'Female', '2016-06-03', 2, 'dependent', 2),
(7, 'Mark', 'Jain', 'Texada', 'Male', '1970-07-09', 2, 'head', 3),
(8, 'Corrine', 'Ezell', 'Texada', 'Female', '1975-03-04', 2, 'head''s spouse', 3),
(9, 'Jona', 'Ezell', 'Texada', 'Male', '1992-09-05', 2, 'dependent', 3),
(10, 'Cliff', 'Jordan', 'Kinley', 'Male', '1988-04-07', 2, 'head', 4),
(11, 'Sheila', 'Brown', 'Kinley', 'Male', '1991-08-07', 2, 'head''s spouse', 4),
(12, 'Kara', 'Brown', 'Kinley', 'Female', '2014-06-01', 2, 'dependent', 4),
(16, 'Joemarie', 'Cruz', 'Ramos', 'Male', '1990-06-05', 3, 'head', 8),
(17, 'May', 'Delila', 'Ramos', 'Female', '1990-03-02', 3, 'head''s spouse', 8),
(19, 'Jose', '', 'Go', 'Male', '1968-05-06', 3, 'head', 9),
(21, 'Wargreymon', '', 'Digimon', 'Male', '2015-11-28', 3, 'head''s spouse', NULL),
(22, 'Jeni', 'Banks', 'Go', 'Female', '1970-09-29', 3, 'head''s spouse', 9),
(23, 'Raven', 'Banks', 'Go', 'Male', '1998-08-27', 3, 'dependent', 9),
(25, 'Ruth', 'Banks', 'Go', 'Female', '2004-08-15', 3, 'dependent', 9),
(26, 'Mittie', 'Hage', 'Spenser', 'Male', '1970-03-25', 3, 'head', 10),
(27, 'Ashli', 'Snell', 'Spenser', 'Male', '1975-02-05', 3, 'head''s spouse', 10),
(28, 'Derrick', 'Corey', 'Bartolome', 'Male', '1970-03-25', 3, 'head', 11),
(29, 'Ashli', 'Snell', 'Spenser', 'Male', '1975-02-05', 3, 'head''s spouse', NULL),
(30, 'Maya', 'Snell', 'Spenser', 'Female', '1996-09-08', 3, 'dependent', 10),
(31, 'Chuck', 'Deli', 'Ramos', 'Male', '2016-09-08', 3, 'dependent', 8),
(32, 'Stephania', '', 'Bartolome', 'Female', '1975-08-28', 3, 'head''s spouse', 11);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `sms_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `datesent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`sms_id`),
  KEY `admin_id` (`admin_id`),
  KEY `username` (`user_id`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_id`, `sponsor_name`, `sponsor_type`, `address`, `contact_no`) VALUES
(1, 'DOH', 'Govenment Organization', 'Cebu City', '09171152368'),
(5, 'Mylene', 'Annonymous', 'Albay Naga', '054796'),
(6, 'Hey', 'Volunteer', 'USC Summit', '09171152368'),
(9, 'dsadfg', 'Annonymous', 'sadsd', '76'),
(10, 'Selfie', 'Volunteer', 'Puso', '343');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `mname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `contact_no` varchar(12) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `code` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fname`, `mname`, `lname`, `bdate`, `contact_no`, `gender`, `code`) VALUES
(1, 'kinginthenorth', '708436083ce6e9d45bb490aedd4bf0b8', 'dazo', 'legend', 'dary', '1997-11-13', '09994738632', 'Male', NULL),
(2, 'mylenechan', 'd9ed5097b6900ec14d92fdefa8b89de5', 'mylene loves bacolod', 'delima bacolod', 'pepito bacolod', '1996-01-07', '09333392660', 'Female', NULL),
(3, 'abisan', 'b696a142d6472f2361b9f04dfd9c3f32', 'abigail', 'lois', 'velasquez', '1990-01-01', '09333392660', 'Female', NULL);

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
-- Constraints for table `reliefoperation`
--
ALTER TABLE `reliefoperation`
  ADD CONSTRAINT `reliefoperation_ibfk_1` FOREIGN KEY (`evac_id`) REFERENCES `evacuationcenter` (`evac_id`);

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
