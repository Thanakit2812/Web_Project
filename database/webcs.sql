-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 09:39 AM
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
('6004062616202', '111111');

-- --------------------------------------------------------

--
-- Stand-in structure for view `report_course`
-- (See below for the actual view)
--
CREATE TABLE `report_course` (
`coursecode` varchar(50)
,`name` varchar(50)
,`credit` int(50)
,`names` varchar(255)
,`Lname` varchar(255)
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
  `subdistrict` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `postal` int(5) NOT NULL,
  `province` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentcode`, `password`, `firstname`, `surname`, `address`, `subdistrict`, `district`, `postal`, `province`, `tel`) VALUES
('6004062616202', '6004062616202', 'metee', 'poyoi', 'kmutnb', 'kmutnb', 'kmutnb', 10290, 'bankok', '0616243709'),
('6004062616202', '6004062616202', 'metee', 'poyoi', 'kmutnb', 'kmutnb', 'kmutnb', 10290, 'bankok', '0616243709'),
('6004062616172', '3335d75c9b80532a9860c898e07865c4', 'price', 'ja', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'sasd', 'asd', 57290, 'chaimeing', '0887771141'),
('6004062616173', '16656736d2ccb2a99e577a25ccb64243', 'price', 'ja', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'sasd', 'asd', 57290, 'chaimeing', '0887771141'),
('6004062616177', '80692bff288d4f03068b4df82bff4b5c', 'paaaaaa', 'ja', 'aaaaaaaaaaaa', 'sasd', 'asd', 57290, 'Chaingrai', '0887771141');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teachercode` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `password` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `firstname` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `surname` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `tel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teachercode`, `password`, `firstname`, `surname`, `tel`) VALUES
('', '3335d75c9b80532a9860c898e07865c4', '', '', ''),
('6004062616172', '3335d75c9b80532a9860c898e07865c4', 'Tem', 'ja', 887771141),
('6004062616173', '16656736d2ccb2a99e577a25ccb64243', 'Tem', 'ja', 887771141),
('6004062616176', 'f2dfdfc06906f9dce036d34952604678', 'paaaaaa', 'ja', 887771141);

-- --------------------------------------------------------

--
-- Structure for view `report_course`
--
DROP TABLE IF EXISTS `report_course`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_course`  AS  select `course`.`course_id` AS `coursecode`,`course`.`title` AS `name`,`course`.`credit` AS `credit`,`teacher`.`firstname` AS `names`,`teacher`.`surname` AS `Lname` from (`course` join `teacher` on(`course`.`teachercode` = `teacher`.`teachercode`)) ;

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
