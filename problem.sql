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
-- Table structure for table `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `Problem_ID` varchar(30) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Date_Added` date NOT NULL,
  `Username` varchar(50) NOT NULL,
  PRIMARY KEY (`Problem_ID`),
  KEY `Username` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`Problem_ID`, `Title`, `Description`, `Date_Added`, `Username`) VALUES
('problem_20150720_1', 'Hello world', 'xdrdcgfhjnk ,.\nn\nDEFINING DATA AND INFORMATION\nIt is important to distinguish between data and information. Data is a raw fact and can take the form of a number or statement such as a date or a measurement. It is necessary for businesses to put in place procedures to ensure data are recorded. For example, to ensure  a call center operator include the  postcode  of  every customer this can be written into their script  and the validation check performed to check these data  have been entered   into the system.\n', '2015-07-20', 'geneowak'),
('problem_20150721_1', 'This work is so tiring', 'body{\r\nbackground-color:#F8F8FF;\r\n\r\n}\r\nul {\r\nfont-size:20px;\r\n\r\ntext-align:center;\r\n\r\nposition:absolute;\r\nbackground-color: #474E50;\r\n\r\ncolor:black;\r\n\r\npadding-left:0px;\r\n\r\nleft:340px;\r\ntop: 50px;\r\nwidth: 650px;\r\nheight: 35px;\r\nmargin: 0px;\r\n\r\ntext-align:center;\r\nborder-style:solid; border-width:3px; border-color:#474E50; border-radius:10px;\r\n\r\n}\r\nli {\r\nbackground-color:#effffe;\r\nborder-radius:5px;\r\nwidth: 800px;\r\ndisplay: inline;\r\npadding: 0px;\r\nfont-family:arial, verdana, sans-serif;\r\n}\r\na{\r\ntext-decoration:none;\r\ncolor:#474E50;\r\n}', '2015-07-21', 'geneowak'),
('problem_20150721_2', 'This work', 'body{\r\nbackground-color:#F8F8FF;\r\n\r\n}\r\nul {\r\nfont-size:20px;\r\n\r\ntext-align:center;\r\n\r\nposition:absolute;\r\nbackground-color: #474E50;\r\n\r\ncolor:black;\r\n\r\npadding-left:0px;\r\n\r\nleft:340px;\r\ntop: 50px;\r\nwidth: 650px;\r\nheight: 35px;\r\nmargin: 0px;\r\n\r\ntext-align:center;\r\nborder-style:solid; border-width:3px; border-color:#474E50; border-radius:10px;\r\n\r\n}\r\nli {\r\nbackground-color:#effffe;\r\nborder-radius:5px;\r\nwidth: 800px;\r\ndisplay: inline;\r\npadding: 0px;\r\nfont-family:arial, verdana, sans-serif;\r\n}\r\na{\r\ntext-decoration:none;\r\ncolor:#474E50;\r\n}', '2015-07-21', 'geneowak'),
('problem_20150721_3', 'Printing a bio data card that can be used to identify citizens', 'You are required to write a C program that asks the user to enter their Full nsmes, date of birth, place of birth, polling station, religious and political affiliations.\r\n\r\nYou will then display a print out of the card. You can use any attractive design of your choice.', '2015-07-21', 'geneowak'),
('problem_20150721_4', 'Displaying the first 1000 prime numbers', 'Write a c program that can print out the first 1000 prime numbers. \r\n\r\n', '2015-07-21', 'geneowak'),
('problem_20150721_5', ' Car-Pool Savings Calculator', ' (Car-Pool Savings Calculator) Research several car-pooling websites. Create an application that calculates your daily driving cost, so that you can estimate how much money could be saved by car pooling, which also has other advantages such as reducing carbon emissions and reducing traffic congestion. The application should input the following information and display the user’s cost per day of driving to work:\r\n a) Total miles driven per day.\r\n b) Cost per gallon of gasoline. \r\nc) Average miles per gallon. \r\nd) Parking fees per day. \r\ne) Tolls per day.', '2015-07-21', 'geneowak'),
('problem_20150721_6', '(Enforcing Privacy with Cryptography)', ' (Enforcing Privacy with Cryptography) The explosive growth of Internet communications and data storage on Internet-connected computers has greatly increased privacy concerns. The field of cryptography is concerned with coding data to make it difficult (and hopefully—with the most advanced schemes—impossible) for unauthorized users to read. In this exercise you’ll investigate a simple scheme for encrypting and decrypting data. A company that wants to send data over the Internet has asked you to write a program that will encrypt it so that it may be transmitted more securely. All the data is transmitted as four-digit integers. Your application should read a four-digit integer entered by the user and encrypt it as follows: Replace each digit with the result of adding 7 to the digit and getting the remainder after dividing the new value by 10. Then swap the first digit with the third, and swap the second digit with the fourth. Then print the encrypted integer. Write a separate application that inputs an encrypted four-digit integer and decrypts it (by reversing the encryption scheme) to form the original number. [Optional reading project: Research “public key cryptography” in general and the PGP (Pretty Good Privacy) specific public key scheme. You may also want to investigate the RSA scheme, which is widely used in industrial-strength applications.]', '2015-07-21', 'geneowak'),
('problem_20150721_7', 'Target-Heart-Rate Calculator', ' (Target-Heart-Rate Calculator) While exercising, you can use a heart-rate monitor to see that your heart rate stays within a safe range suggested by your trainers and doctors. According to the American Heart Association (AHA) (www.americanheart.org/presenter.jhtml?identifier=4736), the formula for calculating your maximum heart rate in beats per minute is 220 minus your age in years. Your target heart rate is a range that is 50–85% of your maximum heart rate. [Note: These formulas are estimates provided by the AHA. Maximum and target heart rates may vary based on the health, fitness and gender of the individual. Always consult a physician or qualified health care professional before beginning or modifying an exercise program.] Create a program that reads the user’s birthday and the current day (each consisting of the month, day and year). Your program should calculate and display the person’s age (in years), the person’s maximum heart rate and the person’s target heart rate range. ', '2015-07-21', 'geneowak'),
('problem_20150722_1', 'World Population Growth Calculator', ' Use the web to determine the current world population and the annual world population growth rate. Write an application that inputs these values, then displays the estimated world population after one, two, three, four and five years. ', '2015-07-22', 'robert'),
('problem_20150723_1', 'Sum of two numbers', 'write a program that enters the values of two numbers and then adds them ', '2015-07-23', 'belvedere'),
('problem_20150723_2', 'computing the average', 'write a program to compute the average of two numbers', '2015-07-23', 'belvedere'),
('problem_20150723_3', 'subtraction', 'write a program to find the difference between two numbers', '2015-07-23', 'belvedere'),
('problem_20150723_4', 'compute the age', 'write a program to compute age', '2015-07-23', 'belvedere'),
('problem_20150723_5', 'computation of the salary', 'given the number of hours worked, compute the salary given that the rate per hour worked is 0.005 and the gross pay is 1000', '2015-07-23', 'belvedere'),
('problem_20150723_6', 'uses switch to count the number of each\r\ndifferent letter grade students earned on an exam', 'uses switch to count the number of each\r\ndifferent letter grade students earned on an exam', '2015-07-23', 'belvedere');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `problem`
--
ALTER TABLE `problem`
  ADD CONSTRAINT `problem_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `newaccount` (`Username`);
