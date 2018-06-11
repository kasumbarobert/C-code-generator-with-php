-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2015 at 01:32 PM
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
-- Table structure for table `cases`
--

CREATE TABLE IF NOT EXISTS `cases` (
  `case_Value` varchar(100) NOT NULL,
  `case_Body` mediumtext,
  `case_Status` int(11) DEFAULT NULL,
  `attached_Switch` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`case_Value`,`attached_Switch`),
  KEY `attached_Switch` (`attached_Switch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `Time_Logged_In` time NOT NULL,
  `Date` date NOT NULL,
  ` Username` varchar(100) NOT NULL,
  `Time_Logged_Out` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`Time_Logged_In`,`Date`,` Username`),
  KEY ` Username` (` Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Time_Logged_In`, `Date`, ` Username`, `Time_Logged_Out`) VALUES
('00:01:41', '2015-07-23', 'n_angella', '01:05:23'),
('00:04:22', '2015-07-24', 'robert', '01:23:06'),
('01:27:21', '2015-07-24', 'jose_nam', '03:23:17'),
('02:52:58', '2015-07-24', 'robert', '03:25:47'),
('03:23:46', '2015-07-24', 'jose_nam', '03:50:36'),
('03:25:58', '2015-07-24', 'robert', '03:53:49'),
('03:26:52', '2015-07-24', 'n_angella', '03:52:51'),
('03:30:08', '2015-07-22', 'n_angella', '00:00:00'),
('03:37:49', '2015-07-22', 'robert', '00:00:00'),
('03:51:34', '2015-07-24', 'jose_nam', '00:00:00'),
('03:53:06', '2015-07-24', 'n_angella', '03:54:51'),
('03:55:03', '2015-07-24', 'n_angella', '06:31:00'),
('03:55:20', '2015-07-24', 'jose_nam', '03:59:11'),
('03:59:22', '2015-07-24', 'robert', '06:30:48'),
('04:44:24', '2015-07-24', 'jose_nam', '00:00:00'),
('06:00:32', '2015-07-24', 'jose_nam', '06:31:34'),
('08:10:47', '2015-07-26', 'robert', '08:58:00'),
('08:46:11', '2015-07-26', 'n_angella', '08:56:43'),
('09:10:20', '2015-07-28', 'robert', '09:17:59'),
('09:17:20', '2015-07-28', 'jose_nam', '09:17:56'),
('09:39:23', '2015-07-28', 'n_angella', '09:59:38'),
('09:43:24', '2015-07-28', 'robert', '00:00:00'),
('09:59:58', '2015-07-28', 'robert', '10:03:13'),
('10:03:02', '2015-07-27', 'robert', '10:50:47'),
('10:03:25', '2015-07-28', 'n_angella', '00:00:00'),
('10:08:59', '2015-07-24', 'n_angella', '10:37:58'),
('10:38:27', '2015-07-24', 'jose_nam', '00:00:00'),
('10:38:35', '2015-07-21', 'robert', '00:00:00'),
('10:47:49', '2015-07-24', 'robert', '00:00:00'),
('10:48:10', '2015-07-24', 'robert', '12:21:27'),
('10:51:06', '2015-07-27', 'robert', '10:51:54'),
('10:52:08', '2015-07-27', 'n_angella', '10:52:18'),
('10:52:32', '2015-07-27', 'jose_nam', '12:14:31'),
('12:06:13', '2015-07-21', 'robert', '12:26:32'),
('12:14:03', '2015-07-27', 'robert', '00:00:00'),
('12:14:45', '2015-07-27', 'robert', '12:15:16'),
('12:23:52', '2015-07-27', 'robert', '00:00:00'),
('12:24:39', '2015-07-27', 'jose_nam', '00:00:00'),
('12:28:14', '2015-07-21', 'robert', '12:28:19'),
('12:36:04', '2015-07-27', 'robert', '12:44:12'),
('12:57:41', '2015-07-21', 'robert', '14:40:52'),
('12:59:26', '2015-07-27', 'robert', '13:00:03'),
('13:00:23', '2015-07-27', 'jose_nam', '00:00:00'),
('13:52:56', '2015-07-22', 'robert', '17:52:53'),
('14:43:31', '2015-07-27', 'n_angella', '00:00:00'),
('14:58:56', '2015-07-23', 'n_angella', '00:00:00'),
('16:16:44', '2015-07-22', 'n_angella', '16:20:21'),
('16:25:39', '2015-07-23', 'robert', '00:00:00'),
('17:53:12', '2015-07-22', 'n_angella', '00:00:00'),
('20:23:40', '2015-07-22', 'robert', '20:37:35'),
('20:23:52', '2015-07-26', 'robert', '00:00:00'),
('20:37:55', '2015-07-22', 'robert', '00:00:00'),
('21:05:46', '2015-07-26', 'robert', '00:00:00'),
('21:08:58', '2015-07-21', 'n_angella', '21:14:18'),
('21:52:00', '2015-07-25', 'robert', '00:00:00'),
('22:05:03', '2015-07-22', 'robert', '00:00:00'),
('22:17:41', '2015-07-25', 'n_angella', '00:00:00'),
('22:32:40', '2015-07-22', 'robert', '00:00:00'),
('22:37:45', '2015-07-22', 'robert', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `SectionName` varchar(50) NOT NULL,
  `sectionHeader` varchar(250) NOT NULL,
  `returnType` varchar(20) NOT NULL,
  `function` mediumtext NOT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `ExecutionNumber` int(11) DEFAULT NULL,
  `Solution_ID` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`SectionName`,`Solution_ID`),
  KEY `Solution_ID` (`Solution_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`SectionName`, `sectionHeader`, `returnType`, `function`, `Date`, `Time`, `ExecutionNumber`, `Solution_ID`) VALUES
('getSquare', 'float getSquare (float number_to_square ) {\r\n', 'float', 'float getSquare (float number_to_square ) {\r\n\nreturn number_to_square*number_to_square ;}', '2015-07-28', '10:20:11', NULL, 'problem_20150728_1_n_angella'),
('main', 'int main(void) {', 'void', 'int main(void) {\nfloat sum1;\r\n\nfloat square1;\r\n', '2015-07-25', '22:19:12', NULL, 'problem_20150723_1_n_angella'),
('main', 'int main(void) {', 'void', 'int main(void) {\nfloat sum1;\r\n\nfloat square1;\r\n', '2015-07-24', '00:44:59', NULL, 'problem_20150723_2_robert'),
('main', 'int main(void) {', 'void', 'int main(void) {\nfloat sum1;\r\n\nfloat square1;\r\n', '2015-07-25', '22:08:59', NULL, 'problem_20150723_3_robert'),
('main', 'int main(void) {', 'void', 'int main(void) {\nfloat sum1;\r\n\nfloat square1;\r\n', '2015-07-28', '10:22:41', NULL, 'problem_20150728_1_n_angella'),
('ReadNumber', 'void ReadNumber (){\r\n', 'int', 'void ReadNumber (){\r\n\nint num1;\r\n\nprintf("Enter the number test: ");\nscanf("%d",&num1);\nreturn num1 ;}}', '2015-07-26', '20:25:15', NULL, 'problem_20150721_4_robert'),
('ReadNumbers', 'float ReadNumbers (){\r\n', 'float', 'float ReadNumbers (){\r\n\nfloat num1;\r\n\nfloat num2;\r\n\nfloat num3;\r\n\nprintf("Enter the first Number:");\nscanf("%f",&num1);\nprintf("Enter the second Number");\nscanf("%f",&num2);\nprintf("Enter the third(last) number ");\nscanf("%f",&num3);\nreturn num1+num2+num3 ;}', '2015-07-28', '10:09:53', NULL, 'problem_20150728_1_n_angella');

-- --------------------------------------------------------

--
-- Table structure for table `newaccount`
--

CREATE TABLE IF NOT EXISTS `newaccount` (
  `Name` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Username` varchar(30) NOT NULL,
  `IdentificationNumber` varchar(30) NOT NULL,
  `Category` text NOT NULL,
  `Password` varchar(50) NOT NULL,
  `ConfirmPassword` int(50) NOT NULL,
  PRIMARY KEY (`Username`),
  UNIQUE KEY `IdentificationNumber_2` (`IdentificationNumber`),
  KEY `IdentificationNumber` (`IdentificationNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newaccount`
--

INSERT INTO `newaccount` (`Name`, `DateOfBirth`, `Username`, `IdentificationNumber`, `Category`, `Password`, `ConfirmPassword`) VALUES
('Mbabazi Kirabo', '0000-00-00', 'belvedere', '', '', '15521531cb3ab3ac5b63bee7fb107aa0', 0),
('Eugene Owak', '0000-00-00', 'geneowak', 'g001', 'Teacher', 'welcome', 0),
('Namulondo Josephine', '1997-10-21', 'jose_nam', '21405738353', 'Teacher', '4e9a8ec3f992537e136ce24d2f8f69c5', 0),
('Ainembazi Kirabo', '2015-07-01', 'mbabazi', '34567890', 'Student', 'ghjvkl;,', 0),
('Najjuuko Angella', '1997-07-25', 'n_angella', '123435767', 'Student', '15521531cb3ab3ac5b63bee7fb107aa0', 0),
('Kasumba Robert', '1992-07-25', 'robert', '21400750', 'Student', 'e44f14f68b35bf35c2bfc677d3a3932d', 0);

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
('problem_20150721_3', 'Printing a bio data card that can be used to identify citizens', 'You are required to write a C program that asks the user to enter their Full nsmes, date of birth, place of birth, polling station, religious and political affiliations.\r\n\r\nYou will then display a print out of the card. You can use any attractive design of your choice.', '2015-07-21', 'robert'),
('problem_20150721_4', 'Displaying the first 1000 prime numbers', 'Write a c program that can print out the first 1000 prime numbers. \r\n\r\n', '2015-07-21', 'geneowak'),
('problem_20150721_5', ' Car-Pool Savings Calculator', ' (Car-Pool Savings Calculator) Research several car-pooling websites. Create an application that calculates your daily driving cost, so that you can estimate how much money could be saved by car pooling, which also has other advantages such as reducing carbon emissions and reducing traffic congestion. The application should input the following information and display the user’s cost per day of driving to work:\r\n a) Total miles driven per day.\r\n b) Cost per gallon of gasoline. \r\nc) Average miles per gallon. \r\nd) Parking fees per day. \r\ne) Tolls per day.', '2015-07-21', 'geneowak'),
('problem_20150721_6', '(Enforcing Privacy with Cryptography)', ' (Enforcing Privacy with Cryptography) The explosive growth of Internet communications and data storage on Internet-connected computers has greatly increased privacy concerns. The field of cryptography is concerned with coding data to make it difficult (and hopefully—with the most advanced schemes—impossible) for unauthorized users to read. In this exercise you’ll investigate a simple scheme for encrypting and decrypting data. A company that wants to send data over the Internet has asked you to write a program that will encrypt it so that it may be transmitted more securely. All the data is transmitted as four-digit integers. Your application should read a four-digit integer entered by the user and encrypt it as follows: Replace each digit with the result of adding 7 to the digit and getting the remainder after dividing the new value by 10. Then swap the first digit with the third, and swap the second digit with the fourth. Then print the encrypted integer. Write a separate application that inputs an encrypted four-digit integer and decrypts it (by reversing the encryption scheme) to form the original number. [Optional reading project: Research “public key cryptography” in general and the PGP (Pretty Good Privacy) specific public key scheme. You may also want to investigate the RSA scheme, which is widely used in industrial-strength applications.]', '2015-07-21', 'geneowak'),
('problem_20150721_7', 'Target-Heart-Rate Calculator', ' (Target-Heart-Rate Calculator) While exercising, you can use a heart-rate monitor to see that your heart rate stays within a safe range suggested by your trainers and doctors. According to the American Heart Association (AHA) (www.americanheart.org/presenter.jhtml?identifier=4736), the formula for calculating your maximum heart rate in beats per minute is 220 minus your age in years. Your target heart rate is a range that is 50–85% of your maximum heart rate. [Note: These formulas are estimates provided by the AHA. Maximum and target heart rates may vary based on the health, fitness and gender of the individual. Always consult a physician or qualified health care professional before beginning or modifying an exercise program.] Create a program that reads the user’s birthday and the current day (each consisting of the month, day and year). Your program should calculate and display the person’s age (in years), the person’s maximum heart rate and the person’s target heart rate range. ', '2015-07-21', 'robert'),
('problem_20150722_1', 'World Population Growth Calculator', ' Use the web to determine the current world population and the annual world population growth rate. Write an application that inputs these values, then displays the estimated world population after one, two, three, four and five years. ', '2015-07-22', 'robert'),
('problem_20150723_1', 'Sum of two numbers', 'write a program that enters the values of two numbers and then adds them ', '2015-07-23', 'belvedere'),
('problem_20150723_2', 'computing the average', 'write a program to compute the average of two numbers', '2015-07-23', 'robert'),
('problem_20150723_3', 'subtraction', 'write a program to find the difference between two numbers', '2015-07-23', 'belvedere'),
('problem_20150723_4', 'compute the age', 'write a program to compute age', '2015-07-23', 'belvedere'),
('problem_20150723_5', 'computation of the salary', 'given the number of hours worked, compute the salary given that the rate per hour worked is 0.005 and the gross pay is 1000', '2015-07-23', 'belvedere'),
('problem_20150723_6', 'uses switch to count the number of each\r\ndifferent letter grade students earned on an exam', 'uses switch to count the number of each\r\ndifferent letter grade students earned on an exam', '2015-07-23', 'belvedere'),
('problem_20150728_1', 'Calculate the sum and square of three numbers', 'Write a C function with at least two functions that can request for input of three numbers, computes and displays the sum. It should then compute and display the square of the sum got.', '2015-07-28', 'robert');

-- --------------------------------------------------------

--
-- Table structure for table `solution`
--

CREATE TABLE IF NOT EXISTS `solution` (
  `solution_id` varchar(30) NOT NULL,
  `FileName` varchar(250) DEFAULT NULL,
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
('problem_20150721_1_belvedere', 'code files/average1.c', '2015-07-23', 'problem_20150721_1', 20, 'belvedere', '21405738353'),
('problem_20150721_2_belvedere', 'code files/subt.c', '2015-07-23', 'problem_20150721_2', 40, 'robert', '21405738353'),
('problem_20150721_3_belvedere', 'code files/.c', '2015-07-23', 'problem_20150721_3', 76, 'robert', '21405738353'),
('problem_20150721_4_belvedere', 'code files/test.c', '2015-07-23', 'problem_20150721_4', 69, 'belvedere', '21405738353'),
('problem_20150721_4_mbabazi', 'code files/fake.c', '2015-07-23', 'problem_20150721_4', 23, 'n_angella', '21405738353'),
('problem_20150721_4_robert', NULL, '2015-07-26', 'problem_20150721_4', NULL, 'robert', ''),
('problem_20150721_5_belvedere', 'code files/print1.c', '2015-07-23', 'problem_20150721_5', NULL, 'belvedere', ''),
('problem_20150721_6_belvedere', 'code files/g.c', '2015-07-23', 'problem_20150721_6', 43, 'jose_nam', '21405738353'),
('problem_20150721_7_belvedere', 'code files/nnn.c', '2015-07-23', 'problem_20150721_7', 67, 'belvedere', '21405738353'),
('problem_20150721_7_robert', 'code files/testNumber1.c', '2015-07-22', 'problem_20150721_7', NULL, 'robert', ''),
('problem_20150722_1_belvedere', 'code files/useless.c', '2015-07-23', 'problem_20150722_1', 32, 'belvedere', '21405738353'),
('problem_20150723_1_belvedere', 'code files/sum.c', '2015-07-23', 'problem_20150723_1', NULL, 'belvedere', ''),
('problem_20150723_1_n_angella', 'code files/addNumbers.c', '2015-07-25', 'problem_20150723_1', NULL, 'n_angella', ''),
('problem_20150723_2_belvedere', 'code files/average.c', '2015-07-23', 'problem_20150723_2', 45, 'belvedere', '21405738353'),
('problem_20150723_2_robert', 'code files/average_of_numbers.c', '2015-07-24', 'problem_20150723_2', NULL, 'robert', ''),
('problem_20150723_3_belvedere', 'code files/subtraction.c', '2015-07-23', 'problem_20150723_3', 71, 'belvedere', '21405738353'),
('problem_20150723_3_n_angella', NULL, '2015-07-28', 'problem_20150723_3', NULL, 'n_angella', ''),
('problem_20150723_3_robert', 'code files/file2.c', '2015-07-25', 'problem_20150723_3', NULL, 'robert', ''),
('problem_20150723_4_belvedere', 'code files/age1.c', '2015-07-23', 'problem_20150723_4', NULL, 'mbabazi', ''),
('problem_20150723_5_belvedere', 'code files/salary.c', '2015-07-23', 'problem_20150723_5', 32, 'belvedere', '21405738353'),
('problem_20150723_6_belvedere', 'code files/cflkmg1.c', '2015-07-23', 'problem_20150723_6', 12, 'belvedere', '21405738353'),
('problem_20150728_1_n_angella', NULL, '2015-07-28', 'problem_20150728_1', NULL, 'n_angella', '');

-- --------------------------------------------------------

--
-- Table structure for table `switch`
--

CREATE TABLE IF NOT EXISTS `switch` (
  `id` varchar(100) NOT NULL,
  `pass_Value` varchar(250) NOT NULL,
  `header` longtext NOT NULL,
  `dataType` varchar(30) NOT NULL,
  `attached_Section` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attached_Section` (`attached_Section`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Dumping data for table `variable`
--

INSERT INTO `variable` (`variableName`, `variableType`, `variableScope`, `sectionName`, `solution_id`) VALUES
('number_to_square', 'float', 'argument', 'getSquare', 'problem_20150728_1_n_angella'),
('square1', 'float', 'local', 'main', 'problem_20150728_1_n_angella'),
('sum1', 'float', 'local', 'main', 'problem_20150728_1_n_angella'),
('num1', 'int', 'local', 'ReadNumber', 'problem_20150721_4_robert'),
('num1', 'float', 'local', 'ReadNumbers', 'problem_20150728_1_n_angella'),
('num2', 'float', 'local', 'ReadNumbers', 'problem_20150728_1_n_angella'),
('num3', 'float', 'local', 'ReadNumbers', 'problem_20150728_1_n_angella');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_ibfk_1` FOREIGN KEY (`attached_Switch`) REFERENCES `switch` (`id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (` Username`) REFERENCES `newaccount` (`Username`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`Solution_ID`) REFERENCES `solution` (`solution_id`);

--
-- Constraints for table `problem`
--
ALTER TABLE `problem`
  ADD CONSTRAINT `problem_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `newaccount` (`Username`);

--
-- Constraints for table `solution`
--
ALTER TABLE `solution`
  ADD CONSTRAINT `solution_ibfk_1` FOREIGN KEY (`Problem_ID`) REFERENCES `problem` (`Problem_ID`),
  ADD CONSTRAINT `solution_ibfk_2` FOREIGN KEY (`username`) REFERENCES `newaccount` (`Username`),
  ADD CONSTRAINT `solution_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `newaccount` (`IdentificationNumber`);

--
-- Constraints for table `switch`
--
ALTER TABLE `switch`
  ADD CONSTRAINT `switch_ibfk_1` FOREIGN KEY (`attached_Section`) REFERENCES `logs` (`SectionName`);

--
-- Constraints for table `variable`
--
ALTER TABLE `variable`
  ADD CONSTRAINT `variable_ibfk_1` FOREIGN KEY (`sectionName`) REFERENCES `logs` (`SectionName`),
  ADD CONSTRAINT `variable_ibfk_2` FOREIGN KEY (`solution_id`) REFERENCES `solution` (`solution_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
