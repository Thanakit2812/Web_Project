-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 02:06 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enroll_in`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `credit` int(50) NOT NULL,
  `teachercode` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `credit`, `teachercode`, `status`) VALUES
('111111', 'code_do', 3, '6004062616202', 'on'),
('222222', 'code_tem', 3, '6004062616172', 'on'),
('333333', 'code_king', 0, '6004062616105', 'off'),
('111111', 'code_do', 3, '6004062616202', 'on'),
('222222', 'code_tem', 3, '6004062616172', 'on'),
('333333', 'code_king', 0, '6004062616105', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `studentcode` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `course_id` varchar(50) CHARACTER SET armscii8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`studentcode`, `course_id`) VALUES
('6004062616202', '111111'),
('6004062616172', '222222'),
('6004062616105', '333333'),
('6004062616202', '111111'),
('6004062616172', '222222'),
('6004062616105', '333333');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentcode` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fristname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `subdistrict` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `postal` int(5) NOT NULL,
  `province` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentcode`, `password`, `fristname`, `surname`, `address`, `subdistrict`, `district`, `postal`, `province`, `tel`) VALUES
('6004062616202', '6004062616202', 'metee', 'poyoi', 'kmutnb', 'kmutnb', 'kmutnb', 10290, 'bankok', '0616243709'),
('6004062616202', '6004062616202', 'metee', 'poyoi', 'kmutnb', 'kmutnb', 'kmutnb', 10290, 'bankok', '0616243709');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teachercode` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `password` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `fristname` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `surname` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `tel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teachercode`, `password`, `fristname`, `surname`, `tel`) VALUES
('6004062616202', '6004062616202', 'metee', 'poyoi', 616243709),
('6004062616202', '6004062616202', 'metee', 'poyoi', 616243709),
('6004062616202', '6004062616202', 'metee', 'poyoi', 616243709);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
