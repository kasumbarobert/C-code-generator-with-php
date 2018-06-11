-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2015 at 03:35 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c`
--

-- --------------------------------------------------------

--
-- Table structure for table `solution`
--

CREATE TABLE IF NOT EXISTS `solution` (
  `solution_id` varchar(30) NOT NULL,
  `FileName` varchar(30) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Problem_ID` varchar(30) NOT NULL,
  `MarksAwarded` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `teacher_id` varchar(30) NOT NULL,
  PRIMARY KEY (`solution_id`),
  UNIQUE KEY `solution_id` (`solution_id`),
  KEY `Problem_ID` (`Problem_ID`),
  KEY `teacher_id` (`teacher_id`),
  KEY `username_2` (`username`),
  KEY `username_4` (`username`),
  KEY `username_5` (`username`),
  KEY `username` (`username`),
  KEY `username_3` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solution`
--

INSERT INTO `solution` (`solution_id`, `FileName`, `Date`, `Problem_ID`, `MarksAwarded`, `username`, `teacher_id`) VALUES
('problem_20150720_1_mbabazi', 'code files/helloWorld.c', '2015-07-23', 'problem_20150720_1', NULL, 'mbabazi', ''),
('problem_20150721_1_belvedere', 'code files/average1.c', '2015-07-23', 'problem_20150721_1', NULL, 'belvedere', ''),
('problem_20150721_2_belvedere', 'code files/subt.c', '2015-07-23', 'problem_20150721_2', NULL, 'belvedere', ''),
('problem_20150721_3_belvedere', 'code files/.c', '2015-07-23', 'problem_20150721_3', NULL, 'belvedere', ''),
('problem_20150721_4_belvedere', 'code files/test.c', '2015-07-23', 'problem_20150721_4', NULL, 'belvedere', ''),
('problem_20150721_4_mbabazi', 'code files/fake.c', '2015-07-23', 'problem_20150721_4', NULL, 'mbabazi', ''),
('problem_20150721_5_belvedere', 'code files/print1.c', '2015-07-23', 'problem_20150721_5', NULL, 'belvedere', ''),
('problem_20150721_6_belvedere', 'code files/g.c', '2015-07-23', 'problem_20150721_6', NULL, 'belvedere', ''),
('problem_20150721_7_belvedere', 'code files/nnn.c', '2015-07-23', 'problem_20150721_7', NULL, 'belvedere', ''),
('problem_20150721_7_robert', 'code files/testNumber1.c', '2015-07-22', 'problem_20150721_7', NULL, 'robert', ''),
('problem_20150722_1_belvedere', 'code files/useless.c', '2015-07-23', 'problem_20150722_1', NULL, 'belvedere', ''),
('problem_20150723_1_belvedere', 'code files/sum.c', '2015-07-23', 'problem_20150723_1', NULL, 'belvedere', ''),
('problem_20150723_2_belvedere', 'code files/average.c', '2015-07-23', 'problem_20150723_2', NULL, 'belvedere', ''),
('problem_20150723_3_belvedere', 'code files/subtraction.c', '2015-07-23', 'problem_20150723_3', NULL, 'belvedere', ''),
('problem_20150723_4_belvedere', 'code files/age1.c', '2015-07-23', 'problem_20150723_4', NULL, 'belvedere', ''),
('problem_20150723_5_belvedere', 'code files/salary.c', '2015-07-23', 'problem_20150723_5', NULL, 'belvedere', ''),
('problem_20150723_6_belvedere', 'code files/cflkmg1.c', '2015-07-23', 'problem_20150723_6', NULL, 'belvedere', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `solution`
--
ALTER TABLE `solution`
  ADD CONSTRAINT `solution_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `newaccount` (`IdentificationNumber`),
  ADD CONSTRAINT `solution_ibfk_1` FOREIGN KEY (`Problem_ID`) REFERENCES `problem` (`Problem_ID`),
  ADD CONSTRAINT `solution_ibfk_2` FOREIGN KEY (`username`) REFERENCES `newaccount` (`Username`);
