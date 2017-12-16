-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 06:13 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gkdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` varchar(20) NOT NULL,
  `appointment_date` date NOT NULL,
  `start_time` varchar(11) NOT NULL,
  `end_time` varchar(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `cust_id` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`appointment_id`,`cust_id`),
  KEY `fk_Appointment_Customer1` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `appointment_date`, `start_time`, `end_time`, `description`, `cust_id`, `status`) VALUES
('APP0000001', '2017-10-27', '1400', '1500', 'Birthday', 'CUS0000001', 'accepted'),
('APP0000002', '2017-10-27', '1800', '2000', 'Award Ceremony', 'CUS0000002', 'accepted'),
('APP0000003', '2017-10-27', '1000', '1130', 'Wedding', 'CUS0000001', 'accepted'),
('APP0000004', '2017-10-26', '1700', '1800', 'Birthday', 'CUS0000003', 'accepted'),
('APP0000005', '2017-10-26', '1300', '1400', 'Farewell Party', 'CUS0000002', 'accepted'),
('APP0000006', '2017-10-26', '0100', '0300', 'Birthday', 'CUS0000004', 'accepted'),
('APP0000007', '2017-10-26', '1500', '1600', 'Birthday', 'CUS0000004', 'rejected'),
('APP0000008', '2017-10-26', '1100', '1130', 'Wedding', 'CUS0000004', 'rejected'),
('APP0000009', '2017-10-27', '0100', '0200', 'Wedding', 'CUS0000005', 'accepted'),
('APP0000010', '2017-11-24', '1300', '1400', 'Birthday', 'CUS0000004', 'accepted'),
('APP0000011', '2017-12-13', '0100', '0200', 'Wedding', 'CUS0000001', 'rejected'),
('APP0000012', '2017-12-14', '1300', '1401', 'Wedding', 'CUS0000001', 'pending'),
('APP0000013', '2017-12-14', '1500', '1600', 'Convocation', 'CUS0000006', 'rejected'),
('APP0000014', '2017-12-14', '1500', '1600', 'Convocation', 'CUS0000006', 'rejected'),
('APP0000015', '2017-12-13', '1400', '1500', 'Convocation', 'CUS0000006', 'accepted'),
('APP0000016', '2017-12-14', '0100', '0200', 'Birthday', 'CUS0000006', 'pending'),
('APP0000017', '2017-12-13', '0100', '0200', 'kajg', 'CUS0000006', 'pending'),
('APP0000018', '2017-12-15', '0100', '0200', 'ajhl\n', 'CUS0000006', 'pending'),
('APP0000019', '2017-12-15', '1300', '1400', 'Wedding', 'CUS0000001', 'pending'),
('APP0000020', '2017-12-16', '1800', '1915', 'Birthday', 'CUS0000001', 'pending'),
('APP0000021', '2017-12-16', '1100', '1200', 'Wedding', 'CUS0000001', 'accepted'),
('APP0000022', '2017-12-15', '0300', '0400', 'Graduation', 'CUS0000001', 'pending'),
('APP0000023', '2017-12-17', '1400', '1500', 'cgm', 'CUS0000006', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_request`
--

DROP TABLE IF EXISTS `appointment_request`;
CREATE TABLE IF NOT EXISTS `appointment_request` (
  `request_id` varchar(20) NOT NULL,
  `appointment_date` date NOT NULL,
  `start_time` varchar(11) NOT NULL,
  `end_time` varchar(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `cust_id` varchar(20) NOT NULL,
  PRIMARY KEY (`request_id`,`cust_id`),
  KEY `fk_Appointment_Customer1` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `cust_phone` varchar(12) NOT NULL,
  `cust_address` varchar(60) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `date_joined` date NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY ` cust_phone_UNIQUE` (`cust_phone`),
  UNIQUE KEY `cust_email_UNIQUE` (`cust_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `first_name`, `last_name`, `cust_phone`, `cust_address`, `cust_email`, `date_joined`, `password`) VALUES
('CUS0000001', 'Isuru', 'Jayasinghe', '0714859658', 'Kandy', 'isuru@gmail.com', '0000-00-00', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('CUS0000002', 'Lachini', 'Roshika', '0714898565', 'Colombo', 'lachini@gmail.com', '0000-00-00', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('CUS0000003', 'Nesarasa', 'Angathan', '0714589657', 'Jaffna', 'anga@gmail.com', '0000-00-00', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('CUS0000004', 'Peter', 'Pan', '0771589654', 'Ratnapura', 'peter@gmail.com', '0000-00-00', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('CUS0000005', 'Harry ', 'Potter', '0772080786', 'abc', 'harry@gmail.com', '0000-00-00', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('CUS0000006', 'Ama', 'Gamage', '0775748965', 'Moratuwa', 'wasurawattearachchi@gmail.com', '0000-00-00', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_phone` varchar(12) NOT NULL,
  `emp_address` varchar(60) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `emp_type` varchar(20) DEFAULT NULL,
  `emp_gender` varchar(10) NOT NULL,
  `is_user` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `emp_email_UNIQUE` (`emp_email`),
  UNIQUE KEY `emp_phone_UNIQUE` (`emp_phone`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `first_name`, `last_name`, `emp_email`, `emp_phone`, `emp_address`, `username`, `password`, `emp_type`, `emp_gender`, `is_user`) VALUES
('EMP0000001', 'Wasura', 'Wattearachchi', 'wasuradananjith@gmail.com', '0775706398', 'Moratuwa', NULL, NULL, 'Administrator', 'Male', 1),
('EMP0000002', 'Thilakshika', 'Udyani', 'thilakshika@gmail.com', '0771236547', 'Panadura', NULL, NULL, 'Receptionist', 'Female', 1),
('EMP0000003', 'Dharana', 'Weerawarna', 'wdharana@gmail.com', '0714589656', 'Moratuwa', NULL, NULL, 'Beautician', 'Male', 0),
('EMP0000004', 'Elankumaran', 'Thanga', 'elankumaran@gmail.com', '0774565456', 'Jaffna', NULL, NULL, 'Administrator', 'Male', 0),
('EMP0000005', 'Avishka', 'Perera', 'avishka@gmail.com', '0774589653', 'Rathmalana', NULL, NULL, 'Beautician', 'Male', 0),
('EMP0000006', 'Sachini', 'Fernando', 'sachini@gmail.com', '0714589652', 'Rajagiriya', NULL, NULL, 'Beautician', 'Female', 0),
('EMP0000007', 'Surangi', 'De Silva', 'surangi@gmail.com', '0778965412', 'Moratuwa', NULL, NULL, 'Beautician', 'Female', 0),
('EMP0000008', 'Mohammed', 'Imdad', 'imdad@gmail.com', '0789655412', 'Jaffna', NULL, NULL, 'Beautician', 'Male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `date_added` datetime(6) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `path`, `date_added`) VALUES
(22, '5a336ac551c5a0.07322139.jpg', '2017-12-15 06:32:45.000000'),
(21, '5a336ab560f7c5.02080782.jpg', '2017-12-15 06:24:53.000000'),
(23, '5a336c0ada1793.35243293.jpg', '2017-12-15 06:32:08.000000'),
(24, '5a336c11c11414.16782102.jpg', '2017-12-15 06:32:27.000000'),
(25, '5a336c18f19774.75733904.jpg', '2017-12-15 06:32:14.000000'),
(26, '5a336c253f1867.41969909.jpg', '2017-12-15 06:31:01.000000'),
(27, '5a336c2a4202f8.50730522.jpg', '2017-12-15 06:31:06.000000'),
(28, '5a336c2fda10f2.52598786.jpg', '2017-12-15 06:31:11.000000'),
(29, '5a336c3510a8c4.27327959.jpg', '2017-12-15 06:31:17.000000');

-- --------------------------------------------------------

--
-- Table structure for table `joinus_tbl`
--

DROP TABLE IF EXISTS `joinus_tbl`;
CREATE TABLE IF NOT EXISTS `joinus_tbl` (
  `joinus_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `skill` varchar(50) DEFAULT NULL,
  `works` varchar(255) DEFAULT NULL,
  `cv_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`joinus_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joinus_tbl`
--

INSERT INTO `joinus_tbl` (`joinus_id`, `name`, `email`, `phone`, `address`, `skill`, `works`, `cv_name`) VALUES
(4, 'icbjayasinghe', 'i@gmail.com', '0770368954', 'no.119/4,jayamalapura', 'Photographing', 'afdsd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

DROP TABLE IF EXISTS `suggestions`;
CREATE TABLE IF NOT EXISTS `suggestions` (
  `suggestion_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idea` text NOT NULL,
  PRIMARY KEY (`suggestion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`suggestion_id`, `date`, `name`, `email`, `idea`) VALUES
('SUG0000001', '0000-00-00 00:00:00', 'Lachini Roshika', 'lachini@gmail.com', '22d4253681406c4a1347d76f39d16c2cd724fa43'),
('SUG0000002', '0000-00-00 00:00:00', 'Wasura', 'wasuradananjith@gmail.com', '67ea91920a7269540acc4387735dc9547d6640d1'),
('SUG0000003', '0000-00-00 00:00:00', 'Wasura', 'wasuradananjith@gmail.com', 'e2fe15a61dec29ad3b10c60022b62666c16fe94f'),
('SUG0000004', '0000-00-00 00:00:00', 'isuru', 'ieee-2b6ca904e@csacademy.com', '017844fe24b64f539cf588342d131eb10b43b8cb'),
('SUG0000005', '0000-00-00 00:00:00', 'isuru', 'ieee-2b6ca904e@csacademy.com', '4b9698a153932731b91f4377fbc07e561ae34b0b'),
('SUG0000006', '0000-00-00 00:00:00', 'isuru', 'isuru@gmail.com', '27f42d65cdb13f9d4ef63d34bfb8b34536c46395'),
('SUG0000007', '0000-00-00 00:00:00', 'Lachini Roshika', 'lachiniroshika@gmail.com', '53d72904d27cd2f158c420e5fd75a457b97cffbe'),
('SUG0000008', '0000-00-00 00:00:00', 'Isuru  Jayasinghe', 'icbjayasinghe@gmail.com', '957526a112201239a60560bcf4bf05f18e79eb60'),
('SUG0000009', '0000-00-00 00:00:00', 'venuka Ashan', 'n.venuahan@gmail.com', 'c03859978e097b4f0787d4ee57d8c1e2c7ae364e'),
('SUG0000010', '0000-00-00 00:00:00', 'isuru', 'icbjayasinghe@gmail.com', 'cac83cc2ac3984fb363f680adf23b70a8f156855'),
('SUG0000011', '0000-00-00 00:00:00', 'angathan', 'anga@gmail.com', '5859427af242904a94ac9fda4f420cf2ea0b9e1e'),
('SUG0000012', '0000-00-00 00:00:00', 'ljsddfad', 'lachini@gmail.com', '931772f6a9cd7ce7d700a9d452a3642e880c711c');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `first_name`, `last_name`, `email`, `password`, `last_login`, `is_deleted`, `type`) VALUES
(1, 'ADM0000001', 'Wasura', 'Wattearachchi', 'wasuradananjith@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2017-09-09 20:04:30', 0, 'Administrator'),
(28, 'CUS0000001', 'Isuru', 'Jayasinghe', 'isuru@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 0, 'Customer'),
(29, 'CUS0000002', 'Lachini', 'Roshika', 'lachini@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 0, 'Customer'),
(30, 'CUS0000003', 'Nesarasa', 'Angathan', 'anga@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 0, 'Customer'),
(31, 'CUS0000004', 'Peter', 'Pan', 'peter@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 0, 'Customer'),
(32, 'CUS0000005', 'Harry ', 'Potter', 'harry@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 0, 'Customer'),
(33, 'CUS0000006', 'Ama', 'Gamage', 'wasurawattearachchi@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 0, 'Customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
