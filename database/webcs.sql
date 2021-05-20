-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 06:42 PM
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
  `tel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentcode`, `password`, `firstname`, `surname`, `address`, `subdistrict`, `district`, `postal`, `province`, `tel`) VALUES
('6004062616173', '16656736d2ccb2a99e577a25ccb64243', 'panu', 'Chai', '22/13', 'payamangrai', 'maiya', 57290, 'Chiang Rai', '0887771140'),
('6004062616172', '3335d75c9b80532a9860c898e07865c4', 'panupong', 'chaipanya', '22 m.13', 'Mueang', 'Wiang', 15712, 'Chiang Mai', '0887771141'),
('6004062616177', '80692bff288d4f03068b4df82bff4b5c', 'Temna', 'cubjai', '20/11', 'maeng', 'thong', 57291, 'Chaingrai', '0887771143'),
('6004062616202', '19ce41b70e6b57ca4ac9950383064d55', 'metee', 'poyoi', 'kmutnb', 'bangsee', 'vingsavang', 10290, 'ktm', '0616243709'),
('6004062616120', 'f05c81660cb060aad40a5621120aee31', 'papan', 'koprason', '20/15', 'deelok', 'dee', 10056, 'bankok', '0683312258'),
('6004062616326', '8d3cb75317ebd076ccd90eab09e4a13e', 'chelsae', 'natpapas', 'tansumrid', 'baengsee', 'tansumrid', 10290, 'nonburee', '0687795585'),
('6004062616237', '10cd0d747fe40c21db39a8a40f4c9099', 'warakorn', 'chatwasnon', 'param2', 'param2', 'param2', 10250, 'bankok', '0689963700'),
('6004062616146', '012eb6f4610733e1d754015c3f8f9558', 'oangsumarin', 'wichianchotikarn', '99/65 &#3617;.6', 'tongkao', 'tongkao', 10280, 'samutprakarn', '0689968575'),
('6004062616800', '98c32be84341ab3d406ccb5a31b180f4', 'chayatorn', 'mongkolkrut', 'sarood', 'pajak', 'sarood', 19620, 'lobbury', '0663320001'),
('6004062616387', '367f08b8a19555ce3f4a497c55609b99', 'anawat', 'klaysood', 'sasak', 'sasak', 'pooji', 10698, 'cheanmai', '0932212398'),
('6004062616897', '53e0a56bf03b6fd999c29254ce0e5f2c', 'kittanai', 'benhasun', '36/98', 'vongsavong', 'vongsavong', 10369, 'nonburee', '0879568755'),
('6004062616545', '8033e402d9438df9750eeb54c15eb433', 'bigg', 'wikraicherdcharoen', 'iodaruk', 'daruk', 'iodaruk', 12006, 'pijid', '0645879963'),
('6004062616256', '934334bc6dd2b147cff0dae0b9a9239f', 'chananrat', 'prasimonthon', '879/3569', 'meejon', 'moohuya', 10069, 'bankok', '0879648878'),
('6004062616989', 'ad78a5dbbffc4815bde7326d1b1a4d36', 'kunut', 'watanachai', '87/520', 'meng', 'meng', 10290, 'samutprakarn', '0869963022'),
('6004062616156', '9e87ae87679c0293d64df37f4f34347c', 'guitarsolo', 'Bwk', '6 ', 'meedee', 'tumma', 16007, 'bankok', '0865598700'),
('6004062616365', '821a75da912469d8c798988583c2fc59', 'rattapol', 'peapaiboon', 'poomme', 'poommaya', 'poommaya', 16320, 'samutsakorn', '0689856300'),
('6004062616108', '9313c307161403a2e27ad315e6c7958d', 'sumalee', 'St', 'pomata', 'poomin', 'poomin', 13009, 'bankok', '0684658500'),
('6004062616580', '71368980ca8f4d279ac15a27abf2de04', 'JP', 'pitchapa', '559/963', 'gusadin', 'jinma', 19875, 'trand', '0879665454'),
('6004062616870', '9f69736373f89b7dbb7beee33e2faf9b', 'anan', 'vasinsittichok', '68/8', 'kominna', 'rajuma', 13690, 'samui', '0968874008'),
('6004062616398', 'e0cbdc3d42f330f49330d714cba7fb28', 'chakrit', 'disakul', 'appin', 'amadon', 'loko', 10399, 'bankok', '0896687454'),
('6004062616555', 'c671b9a0877791567d422b91f8716894', 'maylee', 'leetaemin', 'susano', 'noso', 'itachi', 10300, 'kyotoo', '0665523301'),
('6004062616300', 'b56c9b31fff35f408069f776e61b1863', 'yenrudee', 'petchwong', '123/20', 'kimna', 'matana', 19000, 'bankok', '086654895'),
('6004062616900', 'f374b086c8d0f0b0de47cef16bfbe1c1', 'unchaleeporn', 'jamsang', '4568/1', 'teacha', 'teachadum', 18008, 'bankok', '0864478000'),
('6004062616700', 'ea23ef784f669afdb04c743a6ece7637', 'sasivimol', 'hongsing', 'osama', 'osamaya', 'osamayakita', 89658, 'samutprakarn', '0897549965'),
('6004062616310', '2a0187a71593ecf95e8a6906307b88f6', 'phanueat', 'leelasakultham', 'robin', 'borinson', 'son', 15000, 'bankok', '0687745898'),
('6004062616785', '8004f3782ebf24ed473c3eac79b3e791', 'athiwat', 'onton', '800/80', 'ginggin', 'ging', 19870, 'bankok', '0874458956'),
('6004062616111', '918c7c121c42c9bff6048d81ea5a9a80', 'kungking', 'thanancha', '78/8', 'admodo', 'admonitor', 13080, 'bankok', '0869954588'),
('6004062616600', 'd72b2b498bc84c2b81678b471565e015', 'aou', ' settiwat', '3000/123', 'bangseefai', 'bangseefai', 12102, 'pijid', '0896587554');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teachercode` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `password` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `firstname` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `surname` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `tel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teachercode`, `password`, `firstname`, `surname`, `tel`) VALUES
('6004062616172', '3335d75c9b80532a9860c898e07865c4', 'Tem', 'Chailpanya', '0887771142'),
('6004062616173', '16656736d2ccb2a99e577a25ccb64243', 'Panupong', 'Chailpanya', '0887771141'),
('6004062616176', 'f2dfdfc06906f9dce036d34952604678', 'tamtem', 'Chailpanya', '0887771143'),
('6004062616177', '80692bff288d4f03068b4df82bff4b5c', 'chaiya', 'katame', '0887771149'),
('6004062616130', '5eadbdc651185212086b21c3a38a7882', 'prapinvich', 'hommak', '0616243709'),
('6004062616202', '19ce41b70e6b57ca4ac9950383064d55', 'metee', 'poyoi', '0616243709'),
('6004062616963', '13dbf4b24205d62936b667eb526fdc59', 'meebun', 'kundee', '0625998477'),
('6004062616852', '936523605675f02bdf985d30ab85c58e', 'kasin', 'kooko', '0687748523'),
('6004062616999', '097baad5aa6a9d11f97d4d245d0cfff5', 'charaem', 'bunmee', '0668520014'),
('6004062616000', '11432b0820b3c9d8e50755a2752702e4', 'nuttapong', 'jinbuya', '0885203369'),
('6004062616123', '483bf88fc48dbf6670c1fdf0dcb19e17', 'danunai', 'sornjun', '0664770025'),
('6004062616300', '483bf88fc48dbf6670c1fdf0dcb19e17', 'danupon', 'onoima', '0986588456'),
('6004062616987', '689ff46169067c1a867261da09916a93', 'dechachan', 'jomtong', '0876693100'),
('6004062616456', 'e3e56a2f5eccc5a26bc559191a85ea6d', 'tewaruk', 'janyim', '0996540099'),
('6004062616321', 'f4c932f154446acf17b0a708417d33d7', 'nutus', 'yangtakoon', '0997774500'),
('6004062616258', '4196e06de3461254dd6e001b86c1b778', 'pongsatorn', 'tumpituk', '0668453302'),
('6004062616147', '6a715f5bce2dfcef54e834e39b1a1df5', 'passakorn', 'soongnean', '0998851110'),
('6004062616200', '0b55b07cbb377e0f9ad24f03c501f1d4', 'yossatorn', 'kunjina', '0668779549'),
('6004062616568', 'd2623f63cc99db6e837c2d6f4d6353ef', 'wattanachai', 'jamseang', '0668459933'),
('6004062616996', '30f1e3aacf025a8db662059e6ac91d58', 'ponnapa', 'jipata', '0668456988'),
('6004062616401', '3c9d9724acffd15368b867b2cdcbce1c', 'sumat', 'puraneng', '0668543300'),
('6004062616105', '51032275a5ab99fd8e449e56a07b408a', 'tanakit', 'meangsri', '0668756997'),
('6004062616858', '4a723d117a92b2d55ea11f7f1bd1f19e', 'pornpan', 'yangdee', '0998870368'),
('6004062616966', '82432d73d826c5ea06c086206185dd14', 'pakjira', 'ounjon', '0996584471');

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
