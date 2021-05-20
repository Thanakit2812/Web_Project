-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 03:42 PM
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
('123456', 'web', 3, '6004062616172', 'on'),
('112233', 'computer', 3, '6004062616172', 'on'),
('223344', 'sci', 3, '6004062616172', 'on'),
('552114', 'game', 3, '6004062616172', 'on'),
('555555', 'fun', 3, '6004062616173', 'on'),
('754454', 'eye', 3, '6004062616172', 'on'),
('445552', 'pron', 3, '6004062616172', 'on'),
('668887', 'humman', 3, '6004062616172', 'on'),
('897756', 'fog', 3, '6004062616172', 'on'),
('421566', 'kingkong', 3, '6004062616173', 'on'),
('741256', 'dogger', 3, '6004062616173', 'on');

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
('6004062616172', '123456'),
('6004062616172', '552114'),
('6004062616172', '555555'),
('6004062616173', '123456');

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
('6004062616173', '16656736d2ccb2a99e577a25ccb64243', 'panu', 'Chai', '22/13', 'payamangrai', 'maiya', 57290, 'Chiang Rai', '0887771140'),
('6004062616172', '3335d75c9b80532a9860c898e07865c4', 'panupong', 'chaipanya', '22 m.13', 'Mueang', 'Wiang', 15712, 'Chiang Mai', '0887771141'),
('6004062616177', '80692bff288d4f03068b4df82bff4b5c', 'Temna', 'cubjai', '20/11', 'maeng', 'thong', 57291, 'Chaingrai', '0887771143');

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
('6004062616172', '3335d75c9b80532a9860c898e07865c4', 'Tem', 'Chailpanya', 887771142),
('6004062616173', '16656736d2ccb2a99e577a25ccb64243', 'Panupong', 'Chailpanya', 887771141),
('6004062616176', 'f2dfdfc06906f9dce036d34952604678', 'tamtem', 'Chailpanya', 887771143),
('6004062616177', '80692bff288d4f03068b4df82bff4b5c', 'chaiya', 'katame', 887771149);

-- --------------------------------------------------------

--
-- Structure for view `report_course`
--
DROP TABLE IF EXISTS `report_course`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `report_course`  AS SELECT `course`.`course_id` AS `coursecode`, `course`.`title` AS `name`, `course`.`credit` AS `credit`, `teacher`.`firstname` AS `names`, `teacher`.`surname` AS `Lname` FROM (`course` join `teacher` on(`course`.`teachercode` = `teacher`.`teachercode`)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
