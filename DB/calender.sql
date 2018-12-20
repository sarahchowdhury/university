-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2018 at 10:56 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE IF NOT EXISTS `calender` (
  `SL` int(20) NOT NULL,
  `Timester` varchar(20) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `Day` varchar(20) NOT NULL,
  `Details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calender`
--

INSERT INTO `calender` (`SL`, `Timester`, `Date`, `Day`, `Details`) VALUES
(1, 'Summer-2018', '2018-05-1', 'Tuesday', ' Holiday: May Day'),
(2, 'Summer-2018', '2018-05-2', 'Wednesday', ' Holiday: *Shab-e-Barat'),
(3, 'Summer-2018', '2018-05-10', 'Thursday', ' Make-up class: Regular Wednesday Classes'),
(4, 'Summer-2018', '2018-05-10', 'Thursday', ' A further amount of Tk. 1000/- will be imposed as late fine if students fail to make payment of Tuition Fee and Trimester Fee within this date.'),
(5, 'Summer-2018', '2018-05-13', 'Sunday', ' Course advising & section selection start..'),
(6, 'Summer-2018', '2018-05-16', 'Tuesday', 'Last day of section selection'),
(7, 'Spring-2019', '2018-05-20', 'Sunday', ' Final Exam'),
(7, 'Summer-2018', '2018-05-31', 'Thursday', 'Last day of Grade Submission (including Self-Study courses)');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
