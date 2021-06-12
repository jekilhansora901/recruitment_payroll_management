-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 19, 2013 at 09:40 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE IF NOT EXISTS `admin_master` (
  `admin_id` varchar(30) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT 'none',
  `mobile` varchar(13) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`admin_id`, `admin_pass`, `email`, `mobile`) VALUES
('admin', 'YWRtaW4=', 'admin@ashapura.com', '9737352848');

-- --------------------------------------------------------

--
-- Table structure for table `basic_sal_master`
--

CREATE TABLE IF NOT EXISTS `basic_sal_master` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(10) NOT NULL,
  `basic` double(10,2) NOT NULL DEFAULT '0.00',
  `da(%)` int(11) NOT NULL DEFAULT '20',
  `hra(%)` int(11) NOT NULL DEFAULT '15',
  `pf(%)` int(11) NOT NULL DEFAULT '12',
  `total_pf` double NOT NULL DEFAULT '0',
  `set_flag` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sr_no`),
  UNIQUE KEY `emp_code` (`emp_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `basic_sal_master`
--

INSERT INTO `basic_sal_master` (`sr_no`, `emp_code`, `basic`, `da(%)`, `hra(%)`, `pf(%)`, `total_pf`, `set_flag`) VALUES
(1, 'E7015', 30000.00, 20, 30, 12, 26000, 1),
(2, 'E1012', 6500.00, 20, 15, 12, 7800, 1),
(3, 'E1043', 15000.00, 20, 15, 12, 21000, 1),
(4, 'E7043', 10000.00, 20, 10, 30, 12000, 1),
(6, 'E7046', 20000.00, 20, 15, 12, 28000, 1),
(7, 'elkj', 10000.00, 20, 15, 12, 12000, 1),
(8, 'lkj', 10000.00, 20, 15, 12, 14000, 1),
(9, 'E7070', 12345.00, 20, 10, 12, 14814, 1),
(10, 'E610', 25000.00, 20, 15, 12, 0, 1),
(11, 'E74003', 30000.00, 20, 15, 12, 0, 1),
(13, 'asdf', 20500.00, 20, 15, 12, 0, 1),
(14, 'E7014', 35000.00, 20, 15, 12, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE IF NOT EXISTS `country_master` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(30) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`country_id`, `country_name`, `delete_flag`) VALUES
(3, 'India', 0),
(4, 'Japan', 0),
(5, 'Pakistan', 0),
(6, 'Australia', 0),
(7, 'America', 0),
(8, 'United Kingdom', 0),
(9, 'United State', 0),
(10, 'Shree Lanka', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department_detail`
--

CREATE TABLE IF NOT EXISTS `department_detail` (
  `dept_code` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(20) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`dept_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `department_detail`
--

INSERT INTO `department_detail` (`dept_code`, `dept_name`, `delete_flag`) VALUES
(1, 'Administrator', 0),
(2, 'IT', 0),
(3, 'Electric', 0),
(4, 'System', 0),
(5, 'Clay', 0),
(6, 'Security', 0),
(7, 'Admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `desg_detail`
--

CREATE TABLE IF NOT EXISTS `desg_detail` (
  `desg_code` int(11) NOT NULL AUTO_INCREMENT,
  `desg_name` varchar(30) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`desg_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `desg_detail`
--

INSERT INTO `desg_detail` (`desg_code`, `desg_name`, `delete_flag`) VALUES
(1, 'Chairman', 0),
(2, 'Vice Chairman', 0),
(4, 'Managing Director', 0),
(6, 'Vice president', 0),
(7, 'General Manager', 0),
(10, 'Asst. General Manager', 0),
(11, 'Chief Manager', 0),
(12, 'Sr. Manager', 0),
(13, 'Manager', 0),
(14, 'Asst. Manager', 0),
(16, 'Officer', 0),
(17, 'Jr. Officer', 0),
(20, 'Assistant', 0),
(21, 'Helper', 0);

-- --------------------------------------------------------

--
-- Table structure for table `education_detail`
--

CREATE TABLE IF NOT EXISTS `education_detail` (
  `id_no` int(11) NOT NULL,
  `edu_id` varchar(10) NOT NULL,
  `passing_year` int(4) NOT NULL,
  `perc` decimal(4,2) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `education_master`
--

CREATE TABLE IF NOT EXISTS `education_master` (
  `edu_id` int(2) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(30) NOT NULL,
  `delete_flag` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`edu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `education_master`
--

INSERT INTO `education_master` (`edu_id`, `course_name`, `delete_flag`) VALUES
(1, 'ME', 0),
(7, 'PhD', 0),
(8, 'BE', 0),
(9, 'Diploma', 0),
(10, '10th', 0),
(11, '12th', 0),
(16, 'Bcom', 0),
(17, 'Mcom', 0);

-- --------------------------------------------------------

--
-- Table structure for table `emp_personal_detail`
--

CREATE TABLE IF NOT EXISTS `emp_personal_detail` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `d_o_b` date NOT NULL,
  `age` int(11) NOT NULL,
  `mobile` text NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `blood_grp` char(4) NOT NULL,
  `date_join` date NOT NULL,
  `dept_code` int(11) NOT NULL,
  `desg_code` int(11) NOT NULL,
  `emp_photo` varchar(110) NOT NULL,
  `edu_id` int(11) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  `active_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `emp_personal_detail`
--

INSERT INTO `emp_personal_detail` (`emp_id`, `emp_code`, `first_name`, `middle_name`, `last_name`, `email`, `d_o_b`, `age`, `mobile`, `add1`, `add2`, `blood_grp`, `date_join`, `dept_code`, `desg_code`, `emp_photo`, `edu_id`, `delete_flag`, `active_flag`) VALUES
(34, 'E7015', 'Parth', 'U', 'Davda', 'parth@gmail.com', '1986-04-03', 27, '8147852545', 'Shivkrupa Nagar, B/H Cargo Showroom', 'Bhuj-Kutch 370001', 'A-', '2013-04-09', 5, 13, 'E7015.jpg', 10, 0, 1),
(35, 'E1012', 'Abc', 'Ejf', 'Jhk', 'abc@gmail.com', '1990-04-12', 23, '8454857412', 'Nicc', 'Bhuj-Kutch 370001', 'O-', '2013-04-03', 1, 15, 'E1012.jpg', 9, 0, 1),
(36, 'E1043', 'Jekil', 'Kishorbhai', 'Hansora', 'jekilhansora901@yahoo.com', '1994-04-04', 19, '8866248620', '9, Unnanti Apartment, Hinglaj Wadi, Bhuj', 'Bhuj', 'O-', '2013-04-01', 5, 2, 'E1043.jpg', 1, 0, 1),
(38, 'E7043', 'Jekil', 'Kishorbhai', 'Hansora', 'jekilhansora901@gmail.com', '1994-04-04', 19, '8866248620', '9, Unanti Appartment, Hinglaj wadi,', 'Bhuj', 'O-', '2013-04-17', 2, 13, 'E7043.jpg', 1, 0, 1),
(39, 'E7046', 'Nayan', 'Chandangiri', 'Goswami', 'nayan@gmail.com', '1994-04-29', 18, '8460608095', 'Mundra', 'Kutch', 'A-', '2013-04-01', 7, 20, 'E7046.jpg', 1, 0, 1),
(40, 'elkj', 'jkill', 'k', 'hansora', 'jekilhansora901@gmail.com', '1994-05-01', 19, '1234567891', 'asdfsdffds', 'dsfdsff', 'O+', '2013-05-01', 7, 20, 'elkj.jpg', 1, 0, 1),
(41, 'lkj', 'lkj', 'lkjlk', 'jlkj', 'sdgd@fsdg.dfg', '1994-05-02', 19, '3516546786', 'gdgsdfg', ' ', 'A+', '2013-05-01', 7, 20, 'lkj.jpg', 1, 0, 1),
(46, 'asdf', 'jkl', 'lkj', 'kjkl', 'fasdf@sdfd.dfg', '1994-05-11', 2013, '7987888888', 'asdf', 'asdf', 'A+', '2013-05-10', 7, 20, 'asdf.jpg', 1, 0, 1),
(49, 'E7014', 'Sangita', 'D', 'Chawda', 'sangita@gmail.com', '1994-05-01', 2013, '5234565347', 'hfmgdnzdgv', 'v czb szrtsrtnjdg', 'AB-', '2013-05-09', 7, 13, 'E7014.jpg', 8, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_image_master`
--

CREATE TABLE IF NOT EXISTS `event_image_master` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `event_photo` text NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `event_image_master`
--

INSERT INTO `event_image_master` (`sr_no`, `event_id`, `event_photo`) VALUES
(34, 6, '6event4.jpg'),
(45, 6, '6event34.jpg'),
(51, 6, '6event50.jpg'),
(55, 2, 'wedsfdf'),
(56, 3, 'wfrsdfsdf'),
(57, 3, 'sdfdsfds'),
(58, 3, 'dfdsfsdfsd'),
(59, 3, 'sdfsdfdsf'),
(60, 2, 'sdfsdf'),
(61, 1, 'sdfsdfdsf'),
(62, 2, 'fdsfsf'),
(63, 4, 'aasqew'),
(64, 2, 'fdsfsf'),
(65, 4, 'aasqew'),
(66, 2, 'fdsfsf'),
(67, 4, 'aasqew'),
(68, 2, 'fdsfsf'),
(69, 4, 'aasqew'),
(70, 2, 'fdsfsf'),
(71, 4, 'aasqew'),
(72, 2, 'fdsfsf'),
(73, 4, 'aasqew'),
(74, 2, 'fdsfsf'),
(75, 4, 'aasqew'),
(76, 2, 'fdsfsf'),
(77, 4, 'aasqew'),
(78, 2, 'fdsfsf'),
(79, 4, 'aasqew'),
(80, 2, 'fdsfsf'),
(81, 4, 'aasqew'),
(82, 2, 'fdsfsf'),
(83, 4, 'aasqew'),
(84, 2, 'fdsfsf'),
(85, 4, 'aasqew'),
(86, 2, 'fdsfsf'),
(87, 4, 'aasqew'),
(88, 2, 'fdsfsf'),
(89, 4, 'aasqew'),
(90, 2, 'fdsfsf'),
(91, 4, 'aasqew'),
(92, 2, 'fdsfsf'),
(93, 4, 'aasqew'),
(94, 2, 'fdsfsf'),
(95, 4, 'aasqew'),
(96, 2, 'fdsfsf'),
(97, 4, 'aasqew'),
(98, 2, 'fdsfsf'),
(99, 4, 'aasqew'),
(100, 2, 'fdsfsf'),
(101, 4, 'aasqew'),
(102, 2, 'fdsfsf'),
(103, 4, 'aasqew'),
(104, 2, 'fdsfsf'),
(105, 4, 'aasqew'),
(106, 2, 'fdsfsf'),
(107, 4, 'aasqew'),
(108, 2, 'fdsfsf'),
(109, 4, 'aasqew'),
(110, 2, 'fdsfsf'),
(111, 4, 'aasqew'),
(112, 2, 'fdsfsf'),
(113, 4, 'aasqew');

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE IF NOT EXISTS `event_master` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` text NOT NULL,
  `date` date NOT NULL,
  `event_desc` text NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`event_id`, `event_name`, `date`, `event_desc`) VALUES
(6, 'Annual Function', '2013-04-30', 'Most Welcome,\r\nIn our Company\r\nPlease Come with Your Family\r\nWe are happy to come you with your familly\r\nPlease Come & Enjoy'),
(7, 'Colaboration for West Indies', '2013-04-23', 'This is Very Beautifull day of our life.\r\nBecause our company was connected with West Indies\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `experience_detail`
--

CREATE TABLE IF NOT EXISTS `experience_detail` (
  `id_no` int(11) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `exp_detail` text NOT NULL,
  `total_exp` varchar(20) NOT NULL,
  `key_skill` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_availed`
--

CREATE TABLE IF NOT EXISTS `leave_availed` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(15) NOT NULL,
  `cl_availed` int(11) NOT NULL DEFAULT '1',
  `pl_availed` int(11) NOT NULL DEFAULT '30',
  `medical_availed` int(11) NOT NULL DEFAULT '20',
  `half_day` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `leave_availed`
--

INSERT INTO `leave_availed` (`sr_no`, `emp_code`, `cl_availed`, `pl_availed`, `medical_availed`, `half_day`) VALUES
(1, 'E7015', 1, 30, 10, 0),
(2, 'E1012', 1, 30, 20, 0),
(3, 'E1043', 0, 30, 20, 2),
(4, 'E7043', 1, 26, 20, 0),
(5, 'E7046', 0, 17, 20, 0),
(8, 'elkj', 1, 20, 20, 0),
(9, 'lkj', 1, 30, 20, 0),
(10, 'E7070', 1, 30, 20, 0),
(11, 'E7070', 1, 30, 20, 0),
(12, 'E7070', 1, 30, 20, 0),
(13, 'E7070', 1, 30, 20, 0),
(14, 'E610', 1, 50, 20, 0),
(15, 'E1043', 1, 30, 20, 0),
(16, 'E7015', 1, 30, 20, 0),
(17, 'E74003', 0, 6, 20, 0),
(18, 'E7015', 1, 30, 20, 0),
(19, 'asdf', 1, 30, 20, 0),
(20, 'E7014', 1, 21, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave_master`
--

CREATE TABLE IF NOT EXISTS `leave_master` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(11) NOT NULL,
  `date_leave` date NOT NULL,
  `days` int(11) NOT NULL,
  `type_leave` varchar(15) NOT NULL,
  `leave_reason` text NOT NULL,
  `approve_flag` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `leave_master`
--

INSERT INTO `leave_master` (`sr_no`, `emp_code`, `date_leave`, `days`, `type_leave`, `leave_reason`, `approve_flag`) VALUES
(1, 'E7043', '2013-04-08', 4, 'pl', 'NO Reason', 1),
(2, 'E7046', '2013-04-30', 0, 'pl', 'For My Doubghter''s marridge', 1),
(6, 'E7046', '2013-04-30', 5, 'pl', 'hjkl', 1),
(8, 'E7046', '2013-04-30', 4, 'cl', 'Hale tane su emaa', 1),
(9, 'E1043', '2013-04-01', 1, 'half_day', 'Gare Kam 6e', 1),
(10, 'E1043', '2013-04-04', 1, 'half_day', 'jkl', 1),
(11, 'E1043', '2013-07-09', 1, 'cl', 'retdfg', 1),
(12, 'E1043', '2013-07-12', 1, 'pl', 'fghdfh', 1),
(13, 'E74003', '2013-05-20', 4, 'pl', 'In Merride', 1),
(14, 'E7014', '2013-05-21', 5, 'pl', 'Health is not well', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_master`
--

CREATE TABLE IF NOT EXISTS `login_master` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(11) NOT NULL,
  `login_name` text NOT NULL,
  `login_pass` text NOT NULL,
  `security_que_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  `active_flag` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`login_id`, `emp_code`, `login_name`, `login_pass`, `security_que_id`, `answer`, `delete_flag`, `active_flag`) VALUES
(70, 'E7015', 'parth davda', 'cGFydGg=', 1, 'parth', 0, 1),
(71, 'E1012', 'abcefg', 'MTIzNDU2Nzg5', 1, '12345', 0, 1),
(72, 'E1043', 'jekil', 'OTczNzM1Mjg0OA==', 1, '9737352848', 0, 1),
(73, 'E7043', 'jekilh', '8866248620', 1, 'jekil', 0, 1),
(74, 'E7046', 'nayan', 'bmF5YW4=', 1, 'nayan', 0, 1),
(75, 'E7070', 'jekilhansora901@gmail.com', 'bXluYW1l', 1, 'myname', 0, 1),
(76, 'E74003', 'hello', 'aGVsbG8=', 1, 'hello', 0, 1),
(77, 'E7014', 'sangita', 'MTIzNDU2', 1, '123456', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `subject`, `body`) VALUES
(1, 'Job Interview Invitation', 'Hell How Are you ????\r\nYou are most welcome in our company.\r\nYou are selected for job please visit our company at 27/apr 2013 at 12.00 PM\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `news_master`
--

CREATE TABLE IF NOT EXISTS `news_master` (
  `news_id` int(5) NOT NULL AUTO_INCREMENT,
  `news_title` text NOT NULL,
  `date` date NOT NULL,
  `news_description` text NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `news_master`
--

INSERT INTO `news_master` (`news_id`, `news_title`, `date`, `news_description`) VALUES
(16, 'Hello', '2013-04-16', 'asdfsdfdsfsdfsdgfgdfg dg'),
(17, 'New Website', '2013-05-02', 'A new Web Site has created by GPBhuj.');

-- --------------------------------------------------------

--
-- Table structure for table `personal_detail`
--

CREATE TABLE IF NOT EXISTS `personal_detail` (
  `id_no` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `bld_grp` varchar(10) NOT NULL,
  `d_o_b` date NOT NULL,
  `age` int(2) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  `photo` text NOT NULL,
  `approve_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `sr_no` int(11) NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(11) NOT NULL,
  `month` varchar(15) NOT NULL,
  `salary_date` date NOT NULL,
  `basic` double(10,2) NOT NULL,
  `hra` double(10,2) NOT NULL,
  `da` double(10,2) NOT NULL,
  `medical` double(10,2) NOT NULL DEFAULT '300.00',
  `conveyance` double(10,2) NOT NULL DEFAULT '800.00',
  `pf` double(10,2) NOT NULL,
  `abs_ded` double(10,2) NOT NULL,
  `gross` double(10,2) NOT NULL,
  `net_salary` double(10,2) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`sr_no`, `emp_code`, `month`, `salary_date`, `basic`, `hra`, `da`, `medical`, `conveyance`, `pf`, `abs_ded`, `gross`, `net_salary`) VALUES
(115, 'E7015', 'May', '2013-05-17', 10000.00, 1500.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14600.00, 12600.00),
(116, 'E1012', 'May', '2013-05-17', 6500.00, 975.00, 1300.00, 300.00, 800.00, 1300.00, 0.00, 9875.00, 8575.00),
(117, 'E1043', 'May', '2013-05-17', 15000.00, 2250.00, 3000.00, 300.00, 800.00, 3000.00, 0.00, 21350.00, 18350.00),
(118, 'E7043', 'May', '2013-05-17', 10000.00, 1000.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14100.00, 12100.00),
(119, 'E7046', 'May', '2013-05-17', 20000.00, 3000.00, 4000.00, 300.00, 800.00, 4000.00, 0.00, 28100.00, 24100.00),
(120, 'elkj', 'May', '2013-05-17', 10000.00, 1500.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14600.00, 12600.00),
(121, 'lkj', 'May', '2013-05-17', 10000.00, 1500.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14600.00, 12600.00),
(122, 'E7070', 'May', '2013-05-17', 12345.00, 1234.50, 2469.00, 300.00, 800.00, 2469.00, 0.00, 17148.50, 14679.50),
(123, 'E7015', 'April', '2013-05-17', 10000.00, 3000.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 16100.00, 14100.00),
(124, 'E1012', 'April', '2013-05-17', 6500.00, 975.00, 1300.00, 300.00, 800.00, 1300.00, 0.00, 9875.00, 8575.00),
(125, 'E1043', 'April', '2013-05-17', 15000.00, 2250.00, 3000.00, 300.00, 800.00, 3000.00, 483.87, 21350.00, 17866.13),
(126, 'E7043', 'April', '2013-05-17', 10000.00, 1000.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14100.00, 12100.00),
(127, 'E7046', 'April', '2013-05-17', 20000.00, 3000.00, 4000.00, 300.00, 800.00, 4000.00, 0.00, 28100.00, 24100.00),
(128, 'elkj', 'April', '2013-05-17', 10000.00, 1500.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14600.00, 12600.00),
(129, 'lkj', 'April', '2013-05-17', 10000.00, 1500.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14600.00, 12600.00),
(130, 'E7070', 'April', '2013-05-17', 12345.00, 1234.50, 2469.00, 300.00, 800.00, 2469.00, 0.00, 17148.50, 14679.50),
(131, 'E7015', 'March', '2013-05-17', 30000.00, 9000.00, 6000.00, 300.00, 800.00, 6000.00, 0.00, 46100.00, 40100.00),
(132, 'E1012', 'March', '2013-05-17', 6500.00, 975.00, 1300.00, 300.00, 800.00, 1300.00, 0.00, 9875.00, 8575.00),
(133, 'E1043', 'March', '2013-05-17', 15000.00, 2250.00, 3000.00, 300.00, 800.00, 3000.00, 0.00, 21350.00, 18350.00),
(134, 'E7043', 'March', '2013-05-17', 10000.00, 1000.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14100.00, 12100.00),
(135, 'E7046', 'March', '2013-05-17', 20000.00, 3000.00, 4000.00, 300.00, 800.00, 4000.00, 0.00, 28100.00, 24100.00),
(136, 'elkj', 'March', '2013-05-17', 10000.00, 1500.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14600.00, 12600.00),
(137, 'lkj', 'March', '2013-05-17', 10000.00, 1500.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14600.00, 12600.00),
(138, 'E7070', 'March', '2013-05-17', 12345.00, 1234.50, 2469.00, 300.00, 800.00, 2469.00, 0.00, 17148.50, 14679.50),
(139, 'E7015', 'February', '2013-05-18', 30000.00, 9000.00, 6000.00, 300.00, 800.00, 6000.00, 0.00, 46100.00, 40100.00),
(140, 'E1012', 'February', '2013-05-18', 6500.00, 975.00, 1300.00, 300.00, 800.00, 1300.00, 0.00, 9875.00, 8575.00),
(141, 'E1043', 'February', '2013-05-18', 15000.00, 2250.00, 3000.00, 300.00, 800.00, 3000.00, 0.00, 21350.00, 18350.00),
(142, 'E7043', 'February', '2013-05-18', 10000.00, 1000.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14100.00, 12100.00),
(143, 'E7046', 'February', '2013-05-18', 20000.00, 3000.00, 4000.00, 300.00, 800.00, 4000.00, 0.00, 28100.00, 24100.00),
(144, 'elkj', 'February', '2013-05-18', 10000.00, 1500.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14600.00, 12600.00),
(145, 'lkj', 'February', '2013-05-18', 10000.00, 1500.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14600.00, 12600.00),
(146, 'E7070', 'February', '2013-05-18', 12345.00, 1234.50, 2469.00, 300.00, 800.00, 2469.00, 0.00, 17148.50, 14679.50),
(147, 'E610', 'February', '2013-05-18', 0.00, 0.00, 0.00, 300.00, 800.00, 0.00, 0.00, 1100.00, 1100.00),
(148, 'E7015', 'January', '2013-05-18', 30000.00, 9000.00, 6000.00, 300.00, 800.00, 6000.00, 0.00, 46100.00, 40100.00),
(149, 'E1012', 'January', '2013-05-18', 6500.00, 975.00, 1300.00, 300.00, 800.00, 1300.00, 0.00, 9875.00, 8575.00),
(150, 'E1043', 'January', '2013-05-18', 15000.00, 2250.00, 3000.00, 300.00, 800.00, 3000.00, 0.00, 21350.00, 18350.00),
(151, 'E7043', 'January', '2013-05-18', 10000.00, 1000.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14100.00, 12100.00),
(152, 'E7046', 'January', '2013-05-18', 20000.00, 3000.00, 4000.00, 300.00, 800.00, 4000.00, 0.00, 28100.00, 24100.00),
(153, 'elkj', 'January', '2013-05-18', 10000.00, 1500.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14600.00, 12600.00),
(154, 'lkj', 'January', '2013-05-18', 10000.00, 1500.00, 2000.00, 300.00, 800.00, 2000.00, 0.00, 14600.00, 12600.00),
(155, 'E7070', 'January', '2013-05-18', 12345.00, 1234.50, 2469.00, 300.00, 800.00, 2469.00, 0.00, 17148.50, 14679.50),
(156, 'E610', 'January', '2013-05-18', 0.00, 0.00, 0.00, 300.00, 800.00, 0.00, 0.00, 1100.00, 1100.00);

-- --------------------------------------------------------

--
-- Table structure for table `security_que`
--

CREATE TABLE IF NOT EXISTS `security_que` (
  `que_id` int(11) NOT NULL AUTO_INCREMENT,
  `que` text NOT NULL,
  PRIMARY KEY (`que_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `security_que`
--

INSERT INTO `security_que` (`que_id`, `que`) VALUES
(1, 'What is the first name of your favorite uncle?'),
(2, 'Where did you meet your spouse?'),
(3, 'What is your oldest cousin''s name?'),
(4, 'What is your youngest child''s nickname?'),
(5, 'What is your best friend\\''s nickname?'),
(6, 'What is the first name of your oldest niece?'),
(7, 'What is the first name of your oldest nephew?'),
(8, 'What is the first name of your favorite aunt?'),
(9, 'what is your first mobile number ?');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow_master`
--

CREATE TABLE IF NOT EXISTS `slideshow_master` (
  `sr_no` int(2) NOT NULL AUTO_INCREMENT,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`sr_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `slideshow_master`
--

INSERT INTO `slideshow_master` (`sr_no`, `img`) VALUES
(14, '4.jpg'),
(18, '8.jpg'),
(20, '4.jpg'),
(21, '5.jpg'),
(22, '6.jpg'),
(23, '7.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
