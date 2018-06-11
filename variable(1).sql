-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2015 at 02:48 PM
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
-- Table structure for table `variable`
--

CREATE TABLE IF NOT EXISTS `variable` (
  `variableName` varchar(50) NOT NULL,
  `variableType` varchar(30) NOT NULL,
  `variableScope` varchar(10) NOT NULL DEFAULT 'local',
  `sectionName` varchar(50) NOT NULL,
  `solution_id` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`variableName`,`variableType`,`variableScope`,`sectionName`,`solution_id`),
  KEY `sectionName` (`sectionName`),
  KEY `solution_id` (`solution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `variable`
--
ALTER TABLE `variable`
  ADD CONSTRAINT `variable_ibfk_2` FOREIGN KEY (`solution_id`) REFERENCES `solution` (`solution_id`),
  ADD CONSTRAINT `variable_ibfk_1` FOREIGN KEY (`sectionName`) REFERENCES `logs` (`SectionName`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
