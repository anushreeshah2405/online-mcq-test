-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2017 at 11:15 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `anssy`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `emp_id_UNIQUE` (`emp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `role_id`, `emp_id`, `name`, `password`, `dob`, `gender`, `contact`, `email`, `status`) VALUES
(1, 1, 'AD17CO001', 'Komal Sawant', 'Qwerty1234!', '1992-04-11', 'F', 8765432190, 'komal@gmail.com', 1),
(2, 2, 'TC17CO001', 'Siddhant Mane', 'Qwerty1234!', '1990-04-07', 'M', 7654321980, 'sid@gmail.com', 1),
(3, 2, 'TC17CO002', 'Shraddha Jadhav', 'Asdfg1234!', '1987-04-12', 'F', 7098123487, 'shrad@gmail.com', 1),
(4, 2, 'TC17CO003', 'Ashish Shah', 'Zxcvb1234!', '1985-03-11', 'M', 9876543210, 'ashish.shah@yahoo.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qb`
--

CREATE TABLE IF NOT EXISTS `qb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(45) DEFAULT 'sc1101',
  `teacher_id` varchar(45) DEFAULT 'tc1',
  `question` varchar(300) DEFAULT NULL,
  `a` varchar(100) DEFAULT NULL,
  `b` varchar(100) DEFAULT NULL,
  `c` varchar(100) DEFAULT NULL,
  `d` varchar(100) DEFAULT NULL,
  `correctans` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `qb`
--

INSERT INTO `qb` (`id`, `subject_id`, `teacher_id`, `question`, `a`, `b`, `c`, `d`, `correctans`) VALUES
(3, 'SC1101', 'tc1', 'What is the value of x^0 ?', 'zero', 'x', 'one', 'None of the above', 'a'),
(4, 'SC1101', 'tc1', 'An acute angle is ... ?', '90 degree', 'less than 90 degree', 'more than 90 degree', 'None of these', 'b'),
(5, 'SC1101', 'tc1', 'Name a triangle whose two angles are equal.', 'Right angle triangle', 'Isosceles triangle.', 'Scalene triangle', 'None of these', 'b'),
(6, 'SC1101', 'tc1', 'When we multiply an exact number by zero what will be the exact answer?', 'the exact number', 'cannot be multiplied', 'zero', 'None of the above', 'c'),
(7, 'SC1101', 'tc1', 'What is 999 times 100.0?', '199.0', '999.0', '9990', '99900', 'd'),
(8, 'SC1101', 'tc1', 'What is the unit of volume?', 'square units', 'cubic units', 'Only units', 'No unit', 'b'),
(9, 'SC1101', 'tc1', 'How many times 1000 is bigger than 1?', '1000 times', '100 times', '99 times', '10 times', 'a'),
(10, 'SC1101', 'tc1', 'How many months have 30 days ?', '2 months', '4 months', '11 months', '12 months', 'c'),
(11, 'SC1101', 'tc1', 'What is squareroot of 256?', '16', '17', '15', '19', 'a'),
(12, 'SC1101', 'tc1', 'what is cot ?', 'sin/cos', 'cos/sin', 'tan/cot', '1/sin', 'b'),
(13, 'SC1101', 'tc1', 'what is tan?', 'sin/cos', 'cos/sin', '1/sin', '1/cos', 'a'),
(14, 'SC1102', 'tc1', 'Which device is used to convert solar energy into electricity?', 'Danial Cell ', 'Solar cell', 'Electrochemical cell', 'Vectorscope', 'd'),
(15, 'SC1102', 'tc1', 'Which Instrument is used to measure blood pressure?', 'Sphygmomanometer', 'Thermometer', 'Hygrometer', 'Barometer', 'a'),
(16, 'SC1102', 'tc1', 'Cause of Rainbow formation is :', 'Refraction,Reflection and Dispresion', 'Refraction,reflection and dispersion', 'Refraction and Scattering ', 'Diffraction and Reflection ', 'a'),
(17, 'SC1102', 'tc1', 'Decibel unit is used to measure :', 'Speed of Light', 'Intensity of Heat', 'Intensity of Sound', 'Radio wave frequency', 'c'),
(18, 'SC1102', 'tc1', 'In which temperature the density of water is maximum?', '1000c', '0c', '40c', '2730c', 'c'),
(19, 'SC1102', 'tc1', 'Loudness of sound depends upon _____ of the sound wave.', 'Frequency', 'Wavelength', 'Amplitude', 'pitch', 'c'),
(20, 'SC1102', 'tc1', 'The SI unit of electric charge is :', 'Ampere', 'Coulomb', 'Ohm', 'kelvin', 'b'),
(21, 'SC1102', 'tc1', 'Good conductor of electricity is :', 'Kerosene', 'Paper', 'Dry air', ' Graphite', 'd'),
(22, 'SC1102', 'tc1', ' Pure water is poor conductor of electricity because it is :', 'A non-polar solvent', 'A very good solvent', 'Not volatile', 'Feebly ionized', 'd'),
(23, 'SC1102', 'tc1', 'The filament of electric bulb is made up of :', 'Copper', 'Lead', 'Tungsten', 'None of the above', 'c'),
(24, 'SC1102', 'tc1', 'The sound production by a bat is :', 'Subsonic', 'Audible', 'Infrasonic', 'Ultrasonic', 'd'),
(25, 'SC1102', 'tc1', 'Heat from the Sun reaches the Earth by :', 'Radiation', ' Convection', 'Reflection', 'Conduction', 'a'),
(26, 'SC1102', 'tc1', ' Which of the following light rays is used for eliminating bacteria ?', 'Alpha rays', ' Infrared rays', 'Ultra-violet radiation', 'Microwave radiation', 'c'),
(27, 'SC1103', 'tc1', 'For which of the following disciplines is Nobel Prize awarded?', 'Physics and Chemisty', 'Physiology or Medicine', 'Literature, Peace and Economics', 'All of the above', 'd'),
(28, 'SC1102', 'tc1', 'Which of the following is used in pencils?', 'Graphite', 'Silicon', 'Charcoal', 'Phospophorous', 'a'),
(29, 'SC1102', 'tc1', 'Washing soda is common name for?', 'Sodium Carbonate', 'Calcium Bicarbonate', 'Sodium Bicarbonate', 'Calcium carbonate', 'a'),
(30, 'SC1103', 'tc1', 'Hitler party which came into power in 1933 is known as :', 'Labour Party', 'Nazi Party', 'Ku-Klux-Klan', 'Democratic Party', 'b'),
(32, 'SC1103', 'tc1', 'In which year of First World War Germany declared war on Russia and France?', '1914', '1915', '1916', '1917', 'a'),
(33, 'SC1103', 'tc1', 'How many players are there on each side in the game of Basketball?', '4', '5', '6', '7', 'b'),
(34, 'SC1103', 'tc1', 'What is part of a database that holds only one type of information?', 'Report', 'Field', 'Record', 'File', 'b'),
(35, 'SC1103', 'tc1', ' OS  computer abbreviation usually means ?', 'Order of Significance', 'Open Software', 'Operating System', 'Optical Sensor', 'c'),
(37, 'SC1103', 'tc1', '".MOV" extension refers usually to what kind of file?', 'Image file', 'Animation/movie file', 'Audio file', 'MS Office document', 'c'),
(38, 'SC1103', 'tc1', '".MPG" extension refers usually to what kind of file?', 'Word Perfect ', 'Document file', 'MS Office document', 'Animation/movie file', 'd'),
(40, 'SC1103', 'tc1', '"DB" computer abbreviation usually means ?', 'Database', 'Double Byte', 'Data Block', 'Driver Boot', 'a'),
(41, 'SC1103', 'tc1', 'How many bits is a byte?', '4', '8', '16', '32', 'b'),
(42, 'SC1103', 'tc1', 'Computers calculate numbers in what mode?', 'Decimal', 'Octal', 'Binary', 'None of the above', 'c'),
(43, 'SC1103', 'tc1', 'The "desktop" of a computer refers to:', 'The visible screen', 'The area around the monitor', 'The area around the monitor', 'The inside of a folder', 'b'),
(44, 'SC1103', 'tc1', 'Which of these is a search engine?', 'FTP', ' Google', 'Archie', 'ARPANET', 'b'),
(45, 'SC1103', 'tc1', 'Which of the gas is not known as green house gas?', 'Methane', 'Nitrous Oxide', 'Carbon Oxide', 'Hydrogen', 'd'),
(46, 'SC1103', 'tc1', 'The hardest substance available on earth is ', 'Gold', 'Iron', 'Dimond', 'platinum', 'c'),
(54, 'SC1101', 'tc1', 'What is 1004 divided by 2?', '52', '502', '520', '5020', 'b'),
(55, 'SC1101', 'tc1', 'Which of the following numbers gives 240 when added to its own square?', '15', '16', '20', '18', 'a'),
(56, 'SC1101', 'tc1', 'What is three fifth of 100?', '3', '5', '20', '60', 'd'),
(57, 'SC1101', 'tc1', 'What is the remainder of 21 divided by 7?', '7', '3', '0', '1', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_code` varchar(10) NOT NULL,
  `enroll_no` varchar(20) NOT NULL DEFAULT 'fs14co053',
  `marks` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enroll_no` varchar(20) DEFAULT NULL,
  `role_id` int(11) DEFAULT '4',
  `semester_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `enroll_no_UNIQUE` (`enroll_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `enroll_no`, `role_id`, `semester_id`, `name`, `password`, `dob`, `gender`, `contact`, `email`) VALUES
(1, 'FS14CO001', 4, 1, 'Aditya Narkar', 'Qwerty1234!', '1997-05-14', 'M', 9876512340, 'adi.n@gmail.com'),
(2, 'FS14CO002', 4, 3, 'Aditi Jadhav', 'Asdfg1234!', '1999-09-21', 'F', 9871234560, 'aditi_j@gmail.com'),
(3, 'FS14CO003', 4, 5, 'Aryan Mehta', 'Zxcvb1234!', '1998-11-21', 'M', 8765123901, 'aryan@gmail.com'),
(4, 'FS14CO004', 4, 1, 'Gautam Dixit', 'Ironman123', '1999-04-20', 'M', 9876453121, 'gautam_dixit@gmail.com'),
(5, 'FS14CO005', 4, 6, 'Neeta Gawade', 'Poiuyt123', '1998-11-20', 'F', 7908645312, 'neeta.g@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_answers`
--

CREATE TABLE IF NOT EXISTS `student_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) NOT NULL,
  `subject_id` varchar(10) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student_answers` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_registration`
--

CREATE TABLE IF NOT EXISTS `sub_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_code` varchar(100) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `semester` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subcode_UNIQUE` (`sub_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `sub_registration`
--

INSERT INTO `sub_registration` (`id`, `sub_code`, `sub_name`, `semester`, `status`, `active`, `created_by`, `created_date`, `modified_date`) VALUES
(1, 'SC1101', 'Mathematics', 1, 1, 1, 'AD17CO001', '2017-03-25 00:00:00', '2017-04-18 10:59:05'),
(15, 'SC1102', 'Science', 1, 1, 1, 'AD17CO001', '2017-04-18 13:07:20', '2017-04-18 13:07:20'),
(16, 'SC1103', 'General Knowledge', 1, 1, 1, 'AD17CO001', '2017-04-18 13:08:04', '2017-04-18 13:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_login_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_login_admin`
--

INSERT INTO `tbl_login_admin` (`id`, `role_id`, `username`, `password`, `last_login`) VALUES
(1, 1, 'AD17CO001', 'Qwerty1234!', '2017-04-17 12:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_student`
--

CREATE TABLE IF NOT EXISTS `tbl_login_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '4',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_login_student`
--

INSERT INTO `tbl_login_student` (`id`, `role_id`, `username`, `password`, `last_login`) VALUES
(1, 4, 'FS14CO001', 'Qwerty1234!', '2017-04-18 21:01:28'),
(2, 4, 'FS14CO002', 'Asdfg1234!', '2017-04-18 21:01:35'),
(3, 4, 'FS14CO003', 'Zxcvb1234!', '2017-04-18 21:01:41'),
(4, 4, 'FS14CO004', '!1234Qwerty', '2017-04-18 21:02:37'),
(5, 4, 'FS14CO005', '!1234Asdfg', '2017-04-18 21:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_teacher`
--

CREATE TABLE IF NOT EXISTS `tbl_login_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_login_teacher`
--

INSERT INTO `tbl_login_teacher` (`id`, `role_id`, `username`, `password`, `last_login`) VALUES
(1, 2, 'TC17CO001', 'Qwerty1234!', '2017-04-17 12:34:49'),
(2, 2, 'TC17CO002', 'Asdfg1234!', '2017-04-17 16:10:14'),
(3, 2, 'TC17CO003', 'Zxcvb1234!', '2017-04-18 06:32:17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
