-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2018 at 01:39 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `result_system`
--
CREATE DATABASE `result_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `result_system`;

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE IF NOT EXISTS `course_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(45) NOT NULL,
  `stream_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `stream_id` (`stream_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`id`, `course_name`, `stream_id`) VALUES
(1, 'BCA', 1),
(2, 'BBA', 2),
(3, 'MSCIT', 1);

-- --------------------------------------------------------

--
-- Table structure for table `criteria_details`
--

CREATE TABLE IF NOT EXISTS `criteria_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `criteria_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `criteria_details`
--

INSERT INTO `criteria_details` (`id`, `criteria_name`) VALUES
(1, 'assignment'),
(2, 'attendence'),
(3, 'internal marks'),
(4, 'practical');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_criteria_details`
--

CREATE TABLE IF NOT EXISTS `faculty_criteria_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `criteria_id` int(10) NOT NULL,
  `criteria_marks` int(5) NOT NULL,
  `faculty_sub_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faculty_sub_id` (`faculty_sub_id`),
  KEY `criteria_id` (`criteria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `faculty_criteria_details`
--

INSERT INTO `faculty_criteria_details` (`id`, `criteria_id`, `criteria_marks`, `faculty_sub_id`) VALUES
(19, 1, 10, 1),
(20, 2, 10, 1),
(21, 3, 10, 1),
(22, 4, 10, 1),
(25, 1, 5, 2),
(26, 2, 15, 2),
(27, 3, 10, 2),
(28, 4, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_details`
--

CREATE TABLE IF NOT EXISTS `faculty_details` (
  `faculty_id` varchar(30) NOT NULL,
  `f_name` varchar(45) NOT NULL,
  `m_name` varchar(45) NOT NULL,
  `l_name` varchar(45) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `mob_no` bigint(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_details`
--

INSERT INTO `faculty_details` (`faculty_id`, `f_name`, `m_name`, `l_name`, `full_name`, `father_name`, `gender`, `mob_no`, `email_id`, `dob`) VALUES
('ramesh12', 'ramesh', '', 'chouhan', 'ramesh  chouhan', 'suresh', 'male', 9843789754, 'ramesh@gmail.com', '1999-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_subjects`
--

CREATE TABLE IF NOT EXISTS `faculty_subjects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `faculty_id` varchar(60) NOT NULL,
  `subject_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `faculty_subjects`
--

INSERT INTO `faculty_subjects` (`id`, `faculty_id`, `subject_id`) VALUES
(1, 'ramesh12', 7),
(2, 'ramesh12', 9);

-- --------------------------------------------------------

--
-- Table structure for table `semester_details`
--

CREATE TABLE IF NOT EXISTS `semester_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `semester_name` varchar(45) NOT NULL,
  `course_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `semester_details`
--

INSERT INTO `semester_details` (`id`, `semester_name`, `course_id`) VALUES
(3, 'Semester 1', 1),
(4, 'Semester 2', 1),
(5, 'Semester 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stream_details`
--

CREATE TABLE IF NOT EXISTS `stream_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stream_name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stream_details`
--

INSERT INTO `stream_details` (`id`, `stream_name`) VALUES
(1, 'SCIENCE'),
(2, 'COMMERCE'),
(3, 'ARTS');

-- --------------------------------------------------------

--
-- Table structure for table `student_criteria_details`
--

CREATE TABLE IF NOT EXISTS `student_criteria_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(60) NOT NULL,
  `faculty_criteria_id` int(10) NOT NULL,
  `obt_marks` int(5) NOT NULL,
  `out_marks` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faculty_criteria_id` (`faculty_criteria_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `student_criteria_details`
--

INSERT INTO `student_criteria_details` (`id`, `student_id`, `faculty_criteria_id`, `obt_marks`, `out_marks`) VALUES
(1, '2010bca20', 19, 8, 10),
(2, '2010bca20', 20, 5, 10),
(3, '2010bca20', 21, 8, 10),
(4, '2010bca20', 22, 10, 10),
(5, '2017bca28', 19, 8, 10),
(6, '2017bca28', 20, 7, 10),
(7, '2017bca28', 21, 10, 10),
(8, '2017bca28', 22, 10, 10),
(9, '2017bca28', 25, 4, 5),
(10, '2017bca28', 26, 11, 15),
(11, '2017bca28', 27, 8, 10),
(12, '2017bca28', 28, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
  `student_id` varchar(20) NOT NULL,
  `f_name` varchar(45) NOT NULL,
  `m_name` varchar(45) NOT NULL,
  `l_name` varchar(45) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `mob_no` bigint(11) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `admin_year` year(4) NOT NULL,
  `roll_no` int(3) NOT NULL,
  `course` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`student_id`, `f_name`, `m_name`, `l_name`, `full_name`, `father_name`, `gender`, `mob_no`, `email_id`, `admin_year`, `roll_no`, `course`, `dob`) VALUES
('2010bca20', 'suresh', 'singh', 'chouhan', 'suresh singh chouhan', 'ganesh', 'male', 8768563476, 'suresh@gmail.com', 2010, 20, 'BCA', '1999-07-05'),
('2017bca28', 'aditya', '', 'singh', 'aditya  singh', 'baldev singh', 'male', 9773525612, 'adising09062000@gmail.com', 2017, 28, 'BCA', '2000-06-09'),
('2010bba10', 'suresh', 'singh', 'chouhan', 'suresh singh chouhan', 'dinesh', 'male', 9897886486, 'suresh@gmail.com', 2010, 10, 'BBA', '1996-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_details`
--

CREATE TABLE IF NOT EXISTS `subjects_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `subjects_name` varchar(60) NOT NULL,
  `criteria_marks` int(5) NOT NULL,
  `is_practical` tinyint(1) NOT NULL,
  `semester_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `semester_id` (`semester_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subjects_details`
--

INSERT INTO `subjects_details` (`id`, `subjects_name`, `criteria_marks`, `is_practical`, `semester_id`) VALUES
(7, 'c language', 40, 1, 3),
(9, 'html', 40, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE IF NOT EXISTS `users_details` (
  `user_id` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_ques` enum('favourite teacher','mother name','childhood friend','favourite food') NOT NULL,
  `security_ans` varchar(60) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `status` enum('active','deactive') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`user_id`, `password`, `security_ques`, `security_ans`, `user_type`, `status`) VALUES
('2010bba10', 'Suresh@12', 'favourite teacher', 'heena', 'student', 'active'),
('2010bca20', 'Suresh@12', 'favourite teacher', 'heena', 'student', 'active'),
('2017bca28', 'Shivi%00', 'childhood friend', 'rakesh', 'student', 'active'),
('ramesh12', 'Ramesh@12', 'favourite teacher', 'geeta', 'faculty', 'active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_details`
--
ALTER TABLE `course_details`
  ADD CONSTRAINT `course_details_ibfk_1` FOREIGN KEY (`stream_id`) REFERENCES `stream_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_criteria_details`
--
ALTER TABLE `faculty_criteria_details`
  ADD CONSTRAINT `faculty_criteria_details_ibfk_1` FOREIGN KEY (`faculty_sub_id`) REFERENCES `faculty_subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_criteria_details_ibfk_2` FOREIGN KEY (`criteria_id`) REFERENCES `criteria_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_details`
--
ALTER TABLE `faculty_details`
  ADD CONSTRAINT `faculty_details_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `users_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_subjects`
--
ALTER TABLE `faculty_subjects`
  ADD CONSTRAINT `faculty_subjects_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_details` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semester_details`
--
ALTER TABLE `semester_details`
  ADD CONSTRAINT `semester_details_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_criteria_details`
--
ALTER TABLE `student_criteria_details`
  ADD CONSTRAINT `student_criteria_details_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_details` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_criteria_details_ibfk_3` FOREIGN KEY (`faculty_criteria_id`) REFERENCES `faculty_criteria_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
  ADD CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects_details`
--
ALTER TABLE `subjects_details`
  ADD CONSTRAINT `subjects_details_ibfk_1` FOREIGN KEY (`semester_id`) REFERENCES `semester_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
