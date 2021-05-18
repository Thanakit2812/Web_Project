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
('111111', 'code_do', 3, '6004062636202', 'on');

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
('6004062636202', '111111');

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
  `fristname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `subdistrict` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `postal` int(5) NOT NULL,
  `province` varchar(255) NOT NULL,
  `tel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentcode`, `password`, `fristname`, `surname`, `address`, `subdistrict`, `district`, `postal`, `province`, `tel`) VALUES
('6004062636202', '6004062636202', 'metee', 'poyoi', 'kmutnb', 'asd', 'fgh', 10290, 'bangkok', '0616243709');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teachercode` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `password` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `fristname` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `surname` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `tel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teachercode`, `password`, `fristname`, `surname`, `tel`) VALUES
('6004062616202', '6004062616202', 'metee', 'poyoi', 0616243709);

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

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
