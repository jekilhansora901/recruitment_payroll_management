-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2013 at 05:53 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

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
  `admin_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `add_id` int(11) NOT NULL,
  `add_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `add_photo` text NOT NULL,
  `add_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`add_id`, `add_name`, `company_name`, `add_photo`, `add_detail`) VALUES
(2147483647, 'pratik', 'pratik', 'hvjhdf', 'jhbjhfdds'),
(2147483647, 'pratik', 'pratik', 'hvjhdf', 'jhbjhfdds');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE IF NOT EXISTS `country_master` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(30) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department_detail`
--

CREATE TABLE IF NOT EXISTS `department_detail` (
  `dept_code` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(20) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`dept_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department_detail`
--

INSERT INTO `department_detail` (`dept_code`, `dept_name`, `delete_flag`) VALUES
(1, 'Administrator', 0),
(2, 'IT', 0),
(3, 'Electric', 0),
(4, 'System', 0),
(5, 'Clay', 0),
(6, 'Security', 0);

-- --------------------------------------------------------

--
-- Table structure for table `desg_detail`
--

CREATE TABLE IF NOT EXISTS `desg_detail` (
  `desg_code` int(11) NOT NULL AUTO_INCREMENT,
  `desg_name` varchar(30) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`desg_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `desg_detail`
--

INSERT INTO `desg_detail` (`desg_code`, `desg_name`, `delete_flag`) VALUES
(1, 'Chairman', 0),
(2, 'Vice Chairman', 0),
(3, 'Chairman cum Managing Director', 0),
(4, 'Managing Director', 0),
(5, 'Chairman cum Sr. Vice presiden', 0),
(6, 'Vice president', 0),
(7, 'General Manager', 0),
(8, 'Joint General Manager', 0),
(9, 'Deputy General Manager', 0),
(10, 'Asst. General Manager', 0),
(11, 'Chief Manager', 0),
(12, 'Sr. Manager', 0),
(13, 'Manager', 0),
(14, 'Asst. Manager', 0),
(15, 'Sr. Officer', 0),
(16, 'Officer', 0),
(17, 'Jr. Officer', 0),
(18, 'Sr. Associate', 0),
(19, 'Associate', 0),
(20, 'Assistant', 0);

-- --------------------------------------------------------

--
-- Table structure for table `education_detail`
--

CREATE TABLE IF NOT EXISTS `education_detail` (
  `id_no` int(11) NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `file_name` text NOT NULL,
  `passing_year` int(4) NOT NULL,
  `percentage` decimal(4,2) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  `edu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `education_master`
--

CREATE TABLE IF NOT EXISTS `education_master` (
  `edu_id` int(2) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(30) NOT NULL,
  `other` text NOT NULL,
  PRIMARY KEY (`edu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `education_master`
--

INSERT INTO `education_master` (`edu_id`, `course_name`, `other`) VALUES
(1, 'ME', 'Master'),
(2, 'BS', ''),
(3, 'MS', ''),
(4, 'BA', ''),
(5, 'CC', ''),
(6, 'AAC', ''),
(7, 'PhD', ''),
(8, 'BE', ''),
(9, 'Diploma', ''),
(10, '10th', ''),
(11, '12th', ''),
(12, 'ITI', ''),
(13, 'MS', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `emp_personal_detail`
--

INSERT INTO `emp_personal_detail` (`emp_id`, `emp_code`, `first_name`, `middle_name`, `last_name`, `email`, `d_o_b`, `age`, `mobile`, `add1`, `add2`, `blood_grp`, `date_join`, `dept_code`, `desg_code`, `emp_photo`, `edu_id`, `delete_flag`, `active_flag`) VALUES
(34, 'E7015', 'Parth', 'U', 'Davda', 'parth@gmail.com', '1986-04-03', 27, '8147852545', 'Shivkrupa Nagar, B/H Cargo Showroom', 'Bhuj-Kutch 370001', 'A-', '2013-04-09', 5, 13, 'E7015.jpg', 10, 0, 1),
(35, 'E1012', 'Abc', 'Ejf', 'Jhk', 'abc@gmail.com', '1990-04-12', 23, '8454857412', 'Nicc', 'Bhuj-Kutch 370001', 'O-', '2013-04-03', 1, 15, 'E1012.jpg', 9, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE IF NOT EXISTS `event_master` (
  `event_id` int(11) NOT NULL,
  `event` text NOT NULL,
  `date` date NOT NULL,
  `event_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_master`
--

CREATE TABLE IF NOT EXISTS `job_master` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `post` text NOT NULL,
  `vacancy` int(2) NOT NULL,
  `description` text NOT NULL,
  `edu_id` int(11) NOT NULL,
  `interview_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leave_availed`
--

CREATE TABLE IF NOT EXISTS `leave_availed` (
  `emp_id` int(11) NOT NULL,
  `month` varchar(10) NOT NULL,
  `cl_availed` int(11) NOT NULL,
  `weekly_availed` int(11) NOT NULL,
  `half_availed` int(11) NOT NULL,
  `medical_availed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leave_master`
--

CREATE TABLE IF NOT EXISTS `leave_master` (
  `emp_id` int(11) NOT NULL,
  `date_leave` date NOT NULL,
  `days` int(11) NOT NULL,
  `type_leave` varchar(15) NOT NULL,
  `date_resigning` date NOT NULL,
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_availed`
--

CREATE TABLE IF NOT EXISTS `loan_availed` (
  `loan_code` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `date_availed` date NOT NULL,
  `amount_availed` double(10,2) NOT NULL,
  `amount_paid` double(10,2) NOT NULL,
  `amount_per_install` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_master`
--

CREATE TABLE IF NOT EXISTS `loan_master` (
  `loan_id` int(11) NOT NULL,
  `loan_name` varchar(30) NOT NULL,
  `rate_interest` int(11) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `login_master`
--

INSERT INTO `login_master` (`login_id`, `emp_code`, `login_name`, `login_pass`, `security_que_id`, `answer`, `delete_flag`, `active_flag`) VALUES
(70, 'E7015', 'parth', 'MTIzNDU2', 1, 'parth', 0, 1),
(71, 'E1012', 'abcefg', 'MTIzNDU2Nzg5', 1, '12345', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_master`
--

CREATE TABLE IF NOT EXISTS `news_master` (
  `news_id` int(11) NOT NULL,
  `news` text NOT NULL,
  `date` date NOT NULL,
  `news_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `telephone_no` varchar(15) NOT NULL,
  `d_o_b` date NOT NULL,
  `age` int(2) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `login_id` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  `photo` int(11) NOT NULL,
  PRIMARY KEY (`id_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `personal_detail`
--

INSERT INTO `personal_detail` (`id_no`, `first_name`, `middle_name`, `last_name`, `country_id`, `add1`, `add2`, `mobile_no`, `telephone_no`, `d_o_b`, `age`, `email_id`, `login_id`, `gender`, `delete_flag`, `photo`) VALUES
(1, 'Jekil', 'Kishorbhai', 'Hansora', 1, 'bhuj', 'bhuj', '8866248620', '', '1995-01-04', 19, 'youremail901@gmail.com', 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `professional_detail`
--

CREATE TABLE IF NOT EXISTS `professional_detail` (
  `id_no` int(11) NOT NULL,
  `experience_info` varchar(50) NOT NULL,
  `total_experience` char(7) NOT NULL,
  `key_skills` varchar(50) NOT NULL,
  `desired_area` varchar(30) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile_detail`
--

CREATE TABLE IF NOT EXISTS `profile_detail` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `delete_flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `emp_id` int(11) NOT NULL,
  `salary_date` date NOT NULL,
  `basic` double(10,2) NOT NULL,
  `pf` double(10,2) NOT NULL,
  `hra` double(10,2) NOT NULL,
  `da` double(10,2) NOT NULL,
  `medical` double(10,2) NOT NULL,
  `conveyance` double(10,2) NOT NULL,
  `lta` double(10,2) NOT NULL,
  `income_tax` double(10,2) NOT NULL,
  `loan_code` int(11) NOT NULL,
  `gross` double(10,2) NOT NULL,
  `net_salary` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `slideshow_master`
--

INSERT INTO `slideshow_master` (`sr_no`, `img`) VALUES
(1, '1.jpg'),
(2, '2.jpg'),
(3, '3.jpg'),
(4, '4.jpg'),
(5, '5.jpg'),
(6, '6.jpg'),
(7, '7.jpg'),
(8, '8.jpg'),
(9, '9.jpg'),
(10, '10.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
