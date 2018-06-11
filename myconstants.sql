-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2015 at 04:26 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c`
--

-- --------------------------------------------------------

--
-- Table structure for table `myconstants`
--

CREATE TABLE IF NOT EXISTS `myconstants` (
  `const_id` int(11) NOT NULL,
  `const_value` varchar(100) NOT NULL,
  `solution_id` varchar(250) NOT NULL,
  `const_name` varchar(50) NOT NULL,
  PRIMARY KEY (`const_id`,`const_value`,`solution_id`),
  KEY `solution_id` (`solution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myconstants`
--

INSERT INTO `myconstants` (`const_id`, `const_value`, `solution_id`, `const_name`) VALUES
(0, '#DEFINE PI 3.1428;', 'problem_20150723_3_jose_nam', 'PI'),
(0, '#DEFINE PI 3.14823;', 'problem_20150729_1_robert', 'PI');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `myconstants`
--
ALTER TABLE `myconstants`
  ADD CONSTRAINT `myconstants_ibfk_1` FOREIGN KEY (`solution_id`) REFERENCES `solution` (`solution_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
