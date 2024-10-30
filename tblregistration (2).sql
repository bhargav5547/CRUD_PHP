-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 30, 2024 at 06:32 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblregistration`
--

DROP TABLE IF EXISTS `tblregistration`;
CREATE TABLE IF NOT EXISTS `tblregistration` (
  `Userid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` varchar(6) NOT NULL,
  `type` varchar(10) NOT NULL,
  `emailid` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`Userid`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblregistration`
--

INSERT INTO `tblregistration` (`Userid`, `name`, `gender`, `type`, `emailid`, `pass`, `status`) VALUES
(1, 'bhargav prajapti', 'male', 'Admin', 'bhargavprajapati57@gmail.com', 'bhargav@123', 1),
(2, 'bhargav prajapati', 'Male', 'Student', 'bhargav@gmail.com', 'B@123', 1),
(3, 'piyush desai', 'Male', 'Student', 'piyush@gmail.com', 'piyush@123', 1),
(4, 'khushali', 'Female', 'Student', 'shah@gmail.com', 'khushali@123', 1),
(5, 'sindhu', 'Male', 'Student', 'sindhu@gmail.com', 'S@123', 1),
(6, 'sindhu', 'Male', 'Student', 'sindhu@gmail.com', 'S@123', 1),
(7, 'payal', 'Female', 'Student', 'payal@gmail.com', 'p@123', 1),
(8, 'sunita', 'Female', 'Student', 'sunita@gmail.com', 's@123', 1),
(9, 'vaishali', 'Female', 'Student', 'vaishali@gmail.com', 'v@123', 1),
(10, 'khushi', 'Female', 'Student', 'khushi@gmail.com', 'k@123', 1),
(11, 'khushali', 'Female', 'Admin', 'shah@gmail.com', 'khushali@123', 1),
(33, 'VIJAY MAKWANA', 'Male', 'Student', 'vijay@gmail.com', 'vijay@123', 1),
(32, 'anant patel', 'Male', 'Student', 'anant@gmail.com', 'A@123', 1),
(31, 'sindhu thakkar', 'Male', 'Student', 'sindhu@gmail.com', 'S@123', 1),
(30, 'bhargav', 'male', 'Student', 'bhargav@gmail.com', 'B@123', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
