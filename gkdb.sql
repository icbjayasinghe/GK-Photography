-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2017 at 08:25 AM
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
('APP0000017', '2017-12-13', '0100', '0200', 'kajg', 'CUS0000006', 'accepted'),
('APP0000018', '2017-12-15', '0100', '0200', 'ajhl\n', 'CUS0000006', 'pending'),
('APP0000019', '2017-12-15', '1300', '1400', 'Wedding', 'CUS0000001', 'pending'),
('APP0000020', '2017-12-16', '1800', '1915', 'Birthday', 'CUS0000001', 'rejected'),
('APP0000021', '2017-12-16', '1100', '1200', 'Wedding', 'CUS0000001', 'accepted'),
('APP0000022', '2017-12-15', '0300', '0400', 'Graduation', 'CUS0000001', 'rejected'),
('APP0000023', '2017-12-17', '1400', '1500', 'cgm', 'CUS0000006', 'rejected'),
('APP0000025', '2017-12-17', '1600', '1700', 'Farewell Party', 'CUS0000006', 'rejected');

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
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY ` cust_phone_UNIQUE` (`cust_phone`),
  UNIQUE KEY `cust_email_UNIQUE` (`cust_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `first_name`, `last_name`, `cust_phone`, `cust_address`, `cust_email`, `date_joined`, `password`, `is_deleted`) VALUES
('CUS0000001', 'Isuru', 'Jayasinghe', '0714859658', 'Kandy', 'isuru@gmail.com', '0000-00-00', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1),
('CUS0000002', 'Lachini', 'Roshika', '0714898565', 'Colombo', 'lachini@gmail.com', '0000-00-00', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0),
('CUS0000003', 'Nesarasa', 'Angathan', '0714589657', 'Jaffna', 'anga@gmail.com', '0000-00-00', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0),
('CUS0000004', 'Peter', 'Pan', '0771589654', 'Ratnapura', 'peter@gmail.com', '0000-00-00', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0),
('CUS0000005', 'Harry ', 'Potter', '0772080786', 'abc', 'harry@gmail.com', '0000-00-00', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0),
('CUS0000006', 'Ama', 'Gamage', '0775748965', 'Moratuwa', 'wasurawattearachchi@gmail.com', '0000-00-00', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `path`, `date_added`) VALUES
(41, '5a369121f12632.93804339.jpg', '2017-12-17 15:45:37.000000'),
(38, '5a3690ea75a143.15729713.jpg', '2017-12-17 15:44:42.000000'),
(39, '5a3690f6882055.46880736.jpg', '2017-12-17 15:44:54.000000'),
(40, '5a36910ac50136.83077389.jpg', '2017-12-17 15:45:14.000000'),
(33, '5a3690c94c9a45.22645941.jpg', '2017-12-17 15:44:09.000000'),
(34, '5a3690cfe32676.06124685.jpg', '2017-12-17 15:44:15.000000'),
(35, '5a3690d48ccc67.93700495.jpg', '2017-12-17 15:44:20.000000'),
(36, '5a3690dba2ca06.96243696.jpg', '2017-12-17 15:44:27.000000'),
(37, '5a3690e2272bb9.32216725.jpg', '2017-12-17 15:44:34.000000');

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joinus_tbl`
--

INSERT INTO `joinus_tbl` (`joinus_id`, `name`, `email`, `phone`, `address`, `skill`, `works`, `cv_name`) VALUES
(5, 'Thilakshika Udyani', 'thilakshika@gmail.com', '0774456456', 'Panadura', 'Photographing', 'Video Editiing Expertise.. ', NULL),
(6, 'Isuru Jayasinghe ', 'icbjayasinghe@gmial.com', '0772080786', 'no.119/4th lane', 'Videographing', 'Good photographer', NULL),
(7, 'Isuru Jayasinghe ', 'icbjayasinghe@gmial.com', '0774456456', 'Moratuwa', 'Videographing', 'good photographer', NULL),
(8, 'Isuru Jayasinghe ', 'isur@gmail.com', '0774456456', 'Colombo', 'Videographing', 'good videographer', NULL),
(9, 'Isuru Jayasinghe ', 'uru@gmail.com', '0774456456', 'Mt. Lavania', 'Videographing', 'video', NULL),
(10, 'Thilakshika Udyani', 'thilakshikasff@gmail.com', '0774456456', 'Kandy', 'Photographing', '5 year experiance', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

DROP TABLE IF EXISTS `suggestions`;
CREATE TABLE IF NOT EXISTS `suggestions` (
  `suggestion_id` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idea` text NOT NULL,
  PRIMARY KEY (`suggestion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`suggestion_id`, `date`, `name`, `email`, `idea`) VALUES
('SUG0000001', '2017-12-18', 'Isuru Jayasinghe ', 'isuru@gmail.com', 'Great Work!');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `first_name`, `last_name`, `email`, `password`, `last_login`, `is_deleted`, `type`) VALUES
(1, 'ADM0000001', 'Wasura', 'Wattearachchi', 'wasuradananjith@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2017-12-18 06:51:51', 0, 'Administrator'),
(28, 'CUS0000001', 'Isuru', 'Jayasinghe', 'isuru@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 0, 'Customer'),
(29, 'CUS0000002', 'Lachini', 'Roshika', 'lachini@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 0, 'Customer'),
(30, 'CUS0000003', 'Nesarasa', 'Angathan', 'anga@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 0, 'Customer'),
(31, 'CUS0000004', 'Peter', 'Pan', 'peter@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 0, 'Customer'),
(32, 'CUS0000005', 'Harry ', 'Potter', 'harry@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, 0, 'Customer'),
(33, 'CUS0000006', 'Ama', 'Gamage', 'wasurawattearachchi@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2017-12-18 06:49:43', 0, 'Customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
