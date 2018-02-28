-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2018 at 04:20 AM
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
(3, 'admin123', '0192023a7bbd73250516f069df18b500', 'Kent', 'Cab', 'Virtudazo ', 'male', '2015-02-28');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
(10, '2018-02-12 09:31:41', '2018-02-28 02:51:49', 22, 1, 1),
(11, '2018-02-12 09:31:41', '2018-02-28 02:51:49', 21, 1, 1),
(12, '2018-02-12 09:31:44', '2018-02-28 02:51:49', 1, 1, 1),
(13, '2018-02-12 09:31:46', '2018-02-28 02:51:49', 2, 1, 1),
(14, '2018-02-12 09:33:05', NULL, 23, 3, 1),
(15, '2018-02-12 09:33:06', NULL, 3, 3, 1),
(16, '2018-02-12 09:33:07', NULL, 5, 3, 1),
(17, '2018-02-12 09:33:08', NULL, 15, 3, 1),
(18, '2018-02-12 09:33:09', NULL, 6, 3, 1),
(19, '2018-02-12 09:33:12', NULL, 9, 3, 1),
(20, '2018-02-12 09:33:12', NULL, 10, 3, 1),
(21, '2018-02-12 09:33:14', NULL, 13, 3, 1),
(22, '2018-02-20 07:53:48', '2018-02-28 02:51:49', 4, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`brgy_id`, `brgy_name`, `city`, `province`) VALUES
(1, 'Talamban', 'Cebu', 'Cebu'),
(2, 'Banilad', 'Cebu', 'Cebu'),
(3, 'Adlaon', 'Cebu', 'Cebu'),
(4, 'Agsungot', 'Cebu', 'Cebu'),
(5, 'Apas', 'Cebu', 'Cebu'),
(6, 'Bacayan', 'Cebu', 'Cebu'),
(7, 'Binaliw', 'Cebu', 'Cebu'),
(8, 'Budlaan', 'Cebu', 'Cebu'),
(9, 'Busay', 'Cebu', 'Cebu'),
(10, 'Cambinocot', 'Cebu', 'Cebu'),
(11, 'Capitol Site', 'Cebu', 'Cebu'),
(12, 'Carreta', 'Cebu', 'Cebu'),
(13, 'Cogonâ€‘Ramos', 'Cebu', 'Cebu'),
(14, 'Dayâ€‘as', 'Cebu', 'Cebu'),
(15, 'Ermita', 'Cebu', 'Cebu'),
(16, 'Guba', 'Cebu', 'Cebu'),
(17, 'Hipodromo', 'Cebu', 'Cebu'),
(18, 'Kalubihan', 'Cebu', 'Cebu'),
(19, 'Kamagayan', 'Cebu', 'Cebu'),
(20, 'Kamputhaw ', 'Cebu', 'Cebu'),
(21, 'Kasambagan', 'Cebu', 'Cebu'),
(22, 'Lahug', 'Cebu', 'Cebu'),
(23, 'Loregaâ€‘San Miguel', 'Cebu', 'Cebu'),
(24, 'Lusaran', 'Cebu', 'Cebu'),
(25, 'Luz', 'Cebu', 'Cebu'),
(26, 'Mabini', 'Cebu', 'Cebu'),
(27, 'Mabolo', 'Cebu', 'Cebu'),
(28, 'Malubog', 'Cebu', 'Cebu'),
(29, 'Pahina Central', 'Cebu', 'Cebu'),
(30, 'Parian', 'Cebu', 'Cebu'),
(31, 'Paril', 'Cebu', 'Cebu'),
(32, 'Pitâ€‘os', 'Cebu', 'Cebu'),
(33, 'Pulangbato', 'Cebu', 'Cebu'),
(34, 'Sambag I', 'Cebu', 'Cebu'),
(35, 'Sambag II', 'Cebu', 'Cebu'),
(36, 'San Antonio', 'Cebu', 'Cebu'),
(37, 'San Jose', 'Cebu', 'Cebu'),
(38, 'San Roque', 'Cebu', 'Cebu'),
(39, 'Santa Cruz', 'Cebu', 'Cebu'),
(40, 'Santo NiÃ±o', 'Cebu', 'Cebu'),
(41, 'Sirao', 'Cebu', 'Cebu'),
(42, 'T. Padilla', 'Cebu', 'Cebu'),
(43, 'Taptap', 'Cebu', 'Cebu'),
(44, 'Tejero ', 'Cebu', 'Cebu'),
(45, 'Tinago', 'Cebu', 'Cebu'),
(46, 'Zapatera', 'Cebu', 'Cebu'),
(47, 'Babag', 'Cebu', 'Cebu'),
(48, 'Basak Pardo', 'Cebu', 'Cebu'),
(49, 'Basak San Nicolas', 'Cebu', 'Cebu'),
(50, 'Bonbon', 'Cebu', 'Cebu'),
(51, 'Buhisan', 'Cebu', 'Cebu'),
(52, 'Bulacao', 'Cebu', 'Cebu'),
(53, 'Buot-Taop', 'Cebu', 'Cebu'),
(54, 'Calamba', 'Cebu', 'Cebu'),
(55, 'Cogon Pardo', 'Cebu', 'Cebu'),
(56, 'Duljo Fatima', 'Cebu', 'Cebu'),
(57, 'Guadalupe', 'Cebu', 'Cebu'),
(58, 'Inayawan ', 'Cebu', 'Cebu'),
(59, 'Kalunasan', 'Cebu', 'Cebu'),
(60, 'Kinasangâ€‘an', 'Cebu', 'Cebu'),
(61, 'Labangon', 'Cebu', 'Cebu'),
(62, 'Mambaling', 'Cebu', 'Cebu'),
(63, 'Pahina San Nicolas', 'Cebu', 'Cebu'),
(64, 'Pamutan', 'Cebu', 'Cebu'),
(65, 'Pasil', 'Cebu', 'Cebu'),
(66, 'Poblacion Pardo', 'Cebu', 'Cebu'),
(67, 'Pungâ€‘ol Sibugay', 'Cebu', 'Cebu'),
(68, 'Punta Princesa', 'Cebu', 'Cebu'),
(69, 'Quiot', 'Cebu', 'Cebu'),
(70, 'San Nicolas Proper', 'Cebu', 'Cebu'),
(71, 'Sapangdaku', 'Cebu', 'Cebu'),
(72, 'Sawang Calero', 'Cebu', 'Cebu'),
(73, 'Sinsin', 'Cebu', 'Cebu'),
(74, 'Suba ', 'Cebu', 'Cebu'),
(75, 'Sudlon I', 'Cebu', 'Cebu'),
(76, 'Sudlon II', 'Cebu', 'Cebu'),
(77, 'Tabunan', 'Cebu', 'Cebu'),
(78, 'Tag-bao', 'Cebu', 'Cebu'),
(79, 'Tisa', 'Cebu', 'Cebu'),
(80, 'Toong', 'Cebu', 'Cebu');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE IF NOT EXISTS `disease` (
  `disease_id` int(11) NOT NULL AUTO_INCREMENT,
  `disease_name` varchar(255) NOT NULL,
  PRIMARY KEY (`disease_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`disease_id`, `disease_name`) VALUES
(1, 'Colds'),
(2, 'Headache'),
(3, 'Tonsillitis'),
(4, 'Nosebleed'),
(5, 'Cough'),
(6, 'Migraine'),
(7, 'Cough'),
(8, 'Chestpain'),
(9, 'Fever'),
(10, 'Allergy'),
(11, 'Conjunctivitis'),
(12, 'Toothache'),
(13, 'Highblood'),
(14, 'Backpain'),
(15, 'Chicken Pox'),
(16, 'Diarrhea'),
(17, 'Flu'),
(18, 'Abdominal Aortic Aneurysm '),
(19, 'Acanthamoeba Infection'),
(20, 'ACE (Adverse Childhood Experiences)'),
(21, 'Acinetobacter Infection'),
(22, 'Acquired Immune Deficiency Syndrome (AIDS)'),
(23, 'Acquired Immunodeficiency Syndrome (AIDS)'),
(24, 'Adenovirus Infection'),
(25, 'Adenovirus Vaccination'),
(26, 'ADHD [Attention Deficit/Hyperactivity Disorder]'),
(27, 'Adult Vaccinations'),
(28, 'Adverse Childhood Experiences (ACE)'),
(29, 'AFib, AF (Atrial fibrillation)'),
(30, 'African Trypanosomiasis '),
(31, 'Agricultural Safety'),
(32, 'AHF (Alkhurma hemorrhagic fever)'),
(33, 'AIDS (Acquired Immune Deficiency Syndrome)'),
(34, 'AIDS (Acquired Immunodeficiency Syndrome)'),
(35, 'Alkhurma hemorrhagic fever (AHF)'),
(36, 'ALS [Amyotrophic Lateral Sclerosis]'),
(37, 'Alzheimer s Disease'),
(38, 'Amebiasis, Intestinal [Entamoeba histolytica infection]'),
(39, 'American Indian and Alaska Native Vaccination'),
(40, 'American Trypanosomiasis'),
(41, 'Amphibians and Fish Infections'),
(42, 'Anaplasmosis, Human'),
(43, 'Ancylostoma duodenale Infection'),
(44, 'B virus Infection [Herpes B virus]'),
(45, 'B. cepacia infection (Burkholderia cepacia Infection)'),
(46, 'Babesia Infection '),
(47, 'Babesiosis [Babesia Infection]'),
(48, 'Bacillus anthracis '),
(49, 'Back Belts '),
(50, 'Bacterial Meningitis'),
(51, 'Animal-Related Diseases');

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
  `brgy_id` int(11) NOT NULL,
  `house_no` int(11) DEFAULT NULL,
  `street` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`evac_id`),
  KEY `brgy_id` (`brgy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `evacuationcenter`
--

INSERT INTO `evacuationcenter` (`evac_id`, `location_name`, `population`, `capacity`, `brgy_id`, `house_no`, `street`, `status`) VALUES
(1, 'Barangay Talamban Gymnasium', 0, 100, 1, 123, 'Gov. M. Cuenco Ave', 'active'),
(3, 'Wlay Forever', 8, 1000, 1, 0, '', 'active'),
(4, 'Metrobank', 0, 200, 1, 0, 'Gov M. Cuenco', 'active'),
(5, 'Ceres Summit Corporation', 0, 500, 1, 10, 'Banilad Rd', 'active');

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
(4, '2018-02-08 15:56:26', '2018-02-28 02:51:49', 1),
(5, '2018-02-28 02:51:59', NULL, 1),
(6, '2018-02-28 02:57:43', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `evacuationshape`
--

CREATE TABLE IF NOT EXISTS `evacuationshape` (
  `shape_id` int(11) NOT NULL AUTO_INCREMENT,
  `evac_id` int(11) NOT NULL,
  `ord` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  PRIMARY KEY (`shape_id`),
  KEY `evac_id` (`evac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `evacuationshape`
--

INSERT INTO `evacuationshape` (`shape_id`, `evac_id`, `ord`, `latitude`, `longitude`) VALUES
(1, 4, 0, 10.369213044005, 123.91686806105),
(2, 4, 1, 10.36926155047, 123.91705313348),
(3, 4, 2, 10.369158940632, 123.91708666109),
(4, 4, 3, 10.369101105981, 123.91690963529),
(5, 5, 0, 10.362932005252, 123.91418275801),
(6, 5, 1, 10.362320064628, 123.91423640219),
(7, 5, 2, 10.362372303508, 123.9146253225),
(8, 5, 3, 10.363021557438, 123.91458508936);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

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
(9, 2, 34324, 'HelloHi'),
(10, 3, 6, 'Talisay'),
(11, 4, 9, 'Zamora'),
(12, 5, 7, 'Cortes'),
(13, 8, 8, 'Jayme'),
(14, 11, 14, 'Cortez'),
(15, 12, 17, 'Sapphire '),
(16, 17, 9, 'P. Gomez'),
(17, 16, 11, 'P. Rama'),
(18, 9, 7, 'S. Ramirez'),
(19, 23, 1, 'T. Padilla'),
(20, 31, 5, 'Emerald'),
(21, 14, 12, 'Pearl'),
(22, 19, 2, 'Baker'),
(23, 70, 1, 'R. Martinez'),
(24, 15, 1, 'R. Janssen'),
(25, 1, 1, 'M. Cuenco'),
(26, 1, 1, 'M. Cuenco'),
(27, 22, 1, 'Edano'),
(28, 13, 1, 'S. Pepito');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_no`, `item_name`, `qty`, `item_type`, `package_id`) VALUES
(7, 'Corned Beef', 0, 'canned goods', 6);

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
(4, '2018-02-08 15:41:22', 3, 'Hello', 'Residents are advised to evacuate as soon as possible.');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `packagedistribution`
--

INSERT INTO `packagedistribution` (`packdist_id`, `date_dist`, `package_id`, `household_id`) VALUES
(10, '2018-02-20 12:39:29', 6, 1),
(11, '2018-02-20 12:39:52', 7, 8),
(12, '2018-02-21 15:29:15', 7, 1),
(13, '2018-02-21 15:29:41', 6, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `packageditems`
--

INSERT INTO `packageditems` (`packagedItems_id`, `package_id`, `item_id`, `qty_item`) VALUES
(4, 6, 7, 50);

-- --------------------------------------------------------

--
-- Table structure for table `reliefoperation`
--

CREATE TABLE IF NOT EXISTS `reliefoperation` (
  `operation_id` int(11) NOT NULL AUTO_INCREMENT,
  `operation_name` varchar(255) NOT NULL,
  PRIMARY KEY (`operation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

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

CREATE TABLE IF NOT EXISTS `reliefpackage` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(255) NOT NULL,
  `operation_id` int(11) NOT NULL,
  `sponsor_id` int(11) NOT NULL,
  PRIMARY KEY (`package_id`),
  KEY `sponsor_id` (`sponsor_id`),
  KEY `operation_id` (`operation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

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
(7, 'Mark', 'Jain', 'Texada', '\n     ', '1970-07-09', 2, 'head', 3),
(8, 'Mary', '', 'Texada', 'Female', '1975-03-04', 2, 'head''s spouse', 3),
(9, 'John', '', 'Texada', 'Male', '2000-09-05', 2, 'dependent', 3),
(10, 'Cliff', 'Jordan', 'Kinley', '', '1995-04-07', 2, 'head', 4),
(11, 'Sheila', 'Brown', 'Kinley', 'Male', '1991-08-07', 2, 'head''s spouse', 4),
(12, 'Kara', 'Brown', 'Kinley', 'Female', '2014-06-01', 2, 'dependent', 4),
(13, 'Jorge', 'Philip', 'Codilla', 'Female', '1990-06-03', 2, 'head', 5),
(14, 'John', 'Kent', 'Virtudazo', 'Male', '1990-07-08', 2, 'head', 6),
(15, 'Norfphine', 'Mae', 'Saberon', 'Female', '1999-07-08', 3, 'head''s spouse', 7),
(16, 'Joemarie', 'Cruz', 'Ramos', 'Male', '1990-06-05', 3, 'head', 8),
(17, 'Mylene', 'Delima', 'Ramos', 'Female', '1990-03-02', 3, 'head''s spouse', 8),
(19, 'Jeni', '', 'Go', 'Male', '2000-05-06', 3, 'head', 9),
(21, 'Wargreymon', '', 'Digimon', 'Male', '2015-11-28', 3, 'head''s spouse', NULL),
(22, 'Jia', 'Banks', 'Go', 'Male', '2015-09-29', 3, 'head''s spouse', 9),
(23, 'Meta', 'Banks', 'Go', 'Male', '2016-08-27', 3, 'dependent', 9),
(24, 'Raven', '', 'Saberon', 'Male', '1990-12-05', 2, 'head', 7),
(25, 'Jorgie', '', 'Codilla', 'Female', '1990-04-08', 2, 'head''s spouse', 5),
(26, 'Jana', '', 'Virtudazo', 'Female', '1990-08-09', 2, 'head''s spouse', 6),
(27, 'Mittie', 'Hage', 'Spenser', 'Male', '1970-03-25', 2, 'head', 10),
(28, 'Ashli', 'Snell', 'Spenser', 'Female', '1975-02-05', 2, 'head''s spouse', 10),
(29, 'Frank', 'Day', 'Silva', 'Male', '1970-07-08', 2, 'head', 11),
(30, 'Britt', 'Cohen', 'Silva', 'Female', '1975-06-09', 2, 'head''s spouse', 11),
(31, 'Jack', '', 'Mcdaniel', 'Male', '1960-06-09', 2, 'head', 12),
(32, 'Carla', 'Doss', 'Mcdaniel', 'Female', '1965-08-09', 2, 'head''s spouse', 12),
(33, 'Wardell', 'Doss', 'Mcdaniel', 'Male', '1995-04-05', 2, 'dependent', 12),
(34, 'Jay', 'Lee', 'Park', 'Male', '1990-10-11', 2, 'head', 13),
(35, 'Sandara', 'Han', 'Park', 'Female', '1992-12-15', 2, 'head''s spouse', 13),
(36, 'Alex', 'Xander', 'Ford', 'Male', '1960-10-15', 2, 'head', 14),
(37, 'Maria', 'Noel', 'Ford', 'Female', '1965-02-11', 2, 'head''s spouse', 14),
(38, 'Brad', 'NoelÂ ', 'Ford', 'Male', '2000-01-01', 2, 'dependent', 14),
(39, 'Rey', 'Vincent', 'Martinez', 'Male', '1990-04-14', 2, 'head', 15),
(40, 'Naila', 'Lou', 'Martinez', 'Female', '1992-08-09', 2, 'head''s spouse', 15),
(41, 'Abby', 'Lou', 'Martinez', 'Female', '2016-12-25', 2, 'dependent', 15),
(42, 'Derrick', 'Corey', 'Bartolome', 'Male', '1971-03-25', 2, 'head', 16),
(43, 'Stephania', '', 'Bartolome', 'Female', '1975-08-28', 2, 'head''s spouse', 16),
(44, 'Bruce', '', 'Conner', 'Male', '1990-06-09', 2, 'head', 17),
(45, 'Carla', '', 'Conner', 'Female', '1992-05-08', 2, 'head''s spouse', 17),
(46, 'Frank', '', 'Mason', 'Male', '1985-10-05', 2, 'head', 18),
(47, 'Anna', '', 'Mason', 'Female', '1990-04-09', 2, 'head''s spouse', 18),
(48, 'Ken', 'Frazier', 'Allen', 'Male', '1970-04-05', 2, 'head', 19),
(49, 'Charisse', '', 'Allen', 'Female', '1975-04-11', 2, 'head''s spouse', 19),
(50, 'Austin', 'Poole', 'Stevenson', 'Male', '1986-05-08', 2, 'head', 20),
(51, 'Charlene', 'Butler', 'Stevenson', 'Female', '1990-07-29', 2, 'head''s spouse', 20),
(52, 'Elmer', '', 'Underwood', 'Male', '1965-10-10', 2, 'head', 21),
(53, 'Alma', 'Mclaughlin', 'Underwood', 'Female', '1970-10-01', 2, 'head''s spouse', 21),
(54, 'Francis', 'Barton', 'Mendez', 'Male', '1970-08-07', 2, 'head', 22),
(55, 'Lora', 'Mills', 'Mendez', 'Female', '1975-08-15', 2, 'head''s spouse', 22),
(56, 'John', '', 'Kromer', 'Male', '1980-12-09', 2, 'head', 23),
(57, 'Elie', 'Inoc', 'Kromer', 'Female', '1985-06-09', 2, 'head''s spouse', 23),
(58, 'Jack', 'Collier', 'Osborne', 'Male', '1990-05-06', 2, 'head', 24),
(59, 'Zara', 'Ferguson', 'Osborne', 'Male', '1995-09-28', 2, 'head''s spouse', 24),
(60, 'Javier', 'Alvarado', 'Clayton', 'Male', '1980-05-06', 2, 'head', 25),
(61, 'Tyler', 'Rodriguez', 'Adams', 'Male', '1980-05-06', 2, 'head', 26),
(62, 'Debra', '', 'Clayton', 'Female', '1985-10-28', 2, 'head''s spouse', 25),
(63, 'Tyra', '', 'Adams', 'Female', '1985-10-28', 2, 'head''s spouse', 26),
(64, 'Gordon', 'Anderson', 'Peters', 'Male', '1986-11-16', 2, 'head', 27),
(65, 'Angela', 'Howell', 'Peters', 'Female', '1990-07-08', 2, 'head''s spouse', 27),
(66, 'Luke', 'Lawson', 'Brady', 'Male', '1970-05-05', 2, 'head', 28),
(67, 'Kerry', '', 'Brady', 'Female', '1980-05-05', 2, 'head''s spouse', 28);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_id`, `sponsor_name`, `sponsor_type`, `address`, `contact_no`) VALUES
(11, 'John Kent Virtudazo', 'Volunteer', 'Brgy. Talamban, Cebu City', '09222315272');

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
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fname`, `mname`, `lname`, `bdate`, `contact_no`, `gender`) VALUES
(1, 'kinginthenorth', '708436083ce6e9d45bb490aedd4bf0b8', 'dazo', 'legend', 'dary', '1997-11-13', '09994738632', 'Male'),
(2, '', 'd9ed5097b6900ec14d92fdefa8b89de5', 'Mylene', 'Delima', 'Pepito', '1996-02-07', '09333392660', 'Female'),
(3, 'abisan123', '8f66c2c5970531e1d2983e3f7fa18283', 'Abigail', 'Lois', 'Velasquez', '1990-04-04', '09333392660', 'Female');

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
