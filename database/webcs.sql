-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 11:20 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webcs`
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
('111111', 'code_do', 3, '6004062636202', 'off'),
('222222', 'code_tem', 3, '6004062636172', 'on'),
('333333', 'code_king', 3, '6004062636105', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `studentcode` varchar(255) NOT NULL,
  `course_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`studentcode`, `course_id`) VALUES
('6004062636172', '111111'),
('6004062636105', '333333'),
('6004062636202', '222222');

-- --------------------------------------------------------

--
-- Stand-in structure for view `report_counregister`
-- (See below for the actual view)
--
CREATE TABLE `report_counregister` (
`name` varchar(50)
,`code` varchar(50)
,`num` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentcode` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `subdistrict` varchar(255) NOT NULL,
  `postal` int(5) NOT NULL,
  `province` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentcode`, `password`, `firstname`, `surname`, `address`, `district`, `subdistrict`, `postal`, `province`, `tel`) VALUES
('6004062636202', '6004062636202', 'metee', 'poyoi', 'kmutnb', 'asd', 'fgh', 10290, 'bangkok', '0616243709');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teachercode` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `tel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teachercode`, `password`, `firstname`, `surname`, `tel`) VALUES
('6004062636033', '305bf8a31edc9559de750e2d7e72e8a1', 'Kiatpaisan', 'Chantra', 860304195),
('6004062636035', '0c042eaa418b14d0363f8e36cf014e44', 'Kiatpaisan', 'Chantra', 860304195);

-- --------------------------------------------------------

--
-- Structure for view `report_counregister`
--
DROP TABLE IF EXISTS `report_counregister`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_counregister`  AS  select `course`.`title` AS `name`,`course`.`course_id` AS `code`,count(`course`.`course_id`) AS `num` from (`register` join `course` on(`register`.`course_id` = `course`.`course_id`)) group by `course`.`course_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `teachercode` (`teachercode`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD KEY `course_id` (`course_id`),
  ADD KEY `studentcode` (`studentcode`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentcode`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teachercode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`teachercode`) REFERENCES `teacher` (`teachercode`);

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `register_ibfk_2` FOREIGN KEY (`studentcode`) REFERENCES `student` (`studentcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
