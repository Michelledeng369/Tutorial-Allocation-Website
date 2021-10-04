-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2020-05-25 19:24:07
-- 服务器版本： 5.5.65-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dengm`
--

-- --------------------------------------------------------

--
-- 表的结构 `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `ID` int(11) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `year` char(4) DEFAULT NULL,
  `language` varchar(128) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `genre` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `movies`
--

INSERT INTO `movies` (`ID`, `title`, `year`, `language`, `rate`, `genre`) VALUES
(1, 'The Godfather', '1972', 'English', 9.2, 'Crime'),
(2, 'Pride and Prejudice', '2005', 'English', 7.8, 'Romance'),
(3, 'Crouching Tiger, Hidden Dragon', '2000', 'Chinese', 7.8, 'Fantasy'),
(4, 'Titanic', '1997', 'English', 7.8, 'Disaster'),
(5, 'The Avengers', '2012', 'English', 8, 'Fantasy'),
(6, 'Parasite', '2019', 'Korean', 8.6, 'Mystery'),
(8, 'Gravity', '2013', 'English', 7.7, 'Science fiction'),
(10, 'Cold War', '2018', 'Polish', 8.5, 'Drama');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `last_name`) VALUES
(2, 'John', 'Smith'),
(3, 'Carol', 'Ferrari'),
(4, 'Darrell', 'Mitten'),
(5, 'Elizbeth', 'Noyes'),
(6, 'Edna', 'William'),
(7, 'Roy', 'Hise'),
(8, 'Sheila', 'Aguinaldo'),
(9, 'Peter', 'Goad'),
(10, 'Kenneth', 'Simons'),
(12, 'William', 'Soliz');

-- --------------------------------------------------------

--
-- 表的结构 `tutorial`
--

CREATE TABLE IF NOT EXISTS `tutorial` (
  `id` int(11) NOT NULL,
  `unitcode` varchar(32) NOT NULL,
  `tutor` varchar(32) NOT NULL,
  `time` varchar(32) NOT NULL,
  `location` varchar(32) NOT NULL,
  `maxnumber` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tutorial`
--

INSERT INTO `tutorial` (`id`, `unitcode`, `tutor`, `time`, `location`, `maxnumber`) VALUES
(22, 'KIT304', 'Tony Gray', 'Monday, 09:00 - 10:50', 'Rivendell, Eng 304', 20),
(23, 'KIT304', 'Stuart Smith', 'Tuesday,	13:00 - 13:50', 'Rivendell, IMAS 215', 25),
(24, 'KIT304', 'Renjie Li', 'Wednesday,	13:00 - 14:50', 'Rivendell, Eng 304', 20),
(25, 'KIT606', 'Mazino Amuno', 'Monday, 09:00 - 10:50', 'Rivendell, HUM346', 20),
(26, 'KIT606', 'Soonja Yeom', 'Tuesday,	13:00 - 13:50', 'Rivendell, IMAS 315', 20),
(27, 'KIT606', 'Lindsay Wells', 'Wednesday,	13:00 - 14:50', 'Rivendell, IMAS 231', 20),
(28, 'KIT304', 'UC', 'Thursday, 12:00 - 13:50', 'Rivendell, Geol229 	', 20);

-- --------------------------------------------------------

--
-- 表的结构 `tutorialenroll`
--

CREATE TABLE IF NOT EXISTS `tutorialenroll` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `unit_code` varchar(32) NOT NULL,
  `tutor` varchar(32) NOT NULL,
  `time` varchar(32) NOT NULL,
  `tlocation` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tutorialenroll`
--

INSERT INTO `tutorialenroll` (`id`, `tid`, `idnumber`, `username`, `unit_code`, `tutor`, `time`, `tlocation`) VALUES
(51, 25, 41234, 'Anna', 'KIT606 ', 'Mazino Amuno', 'Monday, 09:00 - 10:50', 'Rivendell, HUM346'),
(52, 26, 448185, 'Minxi Deng', 'KIT606 ', 'Soonja Yeom', 'Tuesday,	13:00 - 13:50', 'Rivendell, IMAS 315');

-- --------------------------------------------------------

--
-- 表的结构 `unitenroll`
--

CREATE TABLE IF NOT EXISTS `unitenroll` (
  `id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `unit_code` varchar(32) NOT NULL,
  `unit_name` varchar(32) NOT NULL,
  `lecturer` varchar(32) NOT NULL,
  `coordinator` varchar(32) NOT NULL,
  `lecture_time` varchar(32) NOT NULL,
  `lec_location` varchar(32) NOT NULL,
  `semester` varchar(32) NOT NULL,
  `campus` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `unitenroll`
--

INSERT INTO `unitenroll` (`id`, `idnumber`, `username`, `unit_code`, `unit_name`, `lecturer`, `coordinator`, `lecture_time`, `lec_location`, `semester`, `campus`) VALUES
(24, 41234, 'Anna', 'KIT606 ', 'Data Analytics', 'Mazino Amuno', 'Saurabh Garg', 'Wednesday, 09:00 - 09:50', 'Pandora, SocSci 312', 'Spring', 'Neverland'),
(25, 448185, 'Minxi Deng', 'KIT606 ', 'Data Analytics', 'Mazino Amuno', 'Saurabh Garg', 'Wednesday, 09:00 - 09:50', 'Pandora, SocSci 312', 'Spring', 'Neverland');

-- --------------------------------------------------------

--
-- 表的结构 `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL,
  `unit_code` varchar(128) NOT NULL,
  `unit_name` varchar(128) NOT NULL,
  `coordinator` varchar(128) NOT NULL,
  `lecturer` varchar(32) NOT NULL,
  `lecture_time` varchar(32) NOT NULL,
  `semester` varchar(128) NOT NULL,
  `campus` varchar(32) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `consultation` varchar(32) NOT NULL,
  `lec_location` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `units`
--

INSERT INTO `units` (`id`, `unit_code`, `unit_name`, `coordinator`, `lecturer`, `lecture_time`, `semester`, `campus`, `description`, `consultation`, `lec_location`) VALUES
(1, 'KIT304', 'Mobile Application Development', 'Tony Gray', 'Lindsay Wells', 'Tuesday, 11:00 - 12:50', 'Semester 2', 'Rivendell', 'The unit will focus on four main topics ofadministration: Unix system administration; Microsoft Windows administration; Network administration; Web andDatabase administration.', 'Tuesday, 15:00 - 16:50', 'Rivendell, Geol229'),
(2, 'KIT606', 'Data Analytics', 'Saurabh Garg', 'Mazino Amuno', 'Wednesday, 09:00 - 09:50', 'Spring', 'Neverland', 'Students will investigate information visualization tools and techniques to represent the big data in forms that more readily convey embedded information. ', 'Wednesday, 15:00 - 15:50 ', 'Pandora, SocSci 312'),
(3, 'KIT312', 'Information Systems Management', 'Son Tran', 'Stuart Smith', 'Thursday, 09:00 - 10:50', 'Semester 2', 'Rivendell', ' The unit delivers fundamentals on IS/IT strategic planning with a view of realising benefits for their IT investment. ', 'Thursday, 14:00 - 15:50', 'Pandora, maths254 '),
(4, 'KIT406', 'Embedded Systems', 'Byeong Kang', 'Renjie Li', 'Monday, 09:00 - 09:50 ', 'Semester 2', 'Neverland', 'Student will be given the great opportunity to learn about real-world embedded system environment by installing, designing, and managing several modules in Arduino.', 'Monday, 15:00 - 15:50', 'Rivendell, UCent LTH1  '),
(5, 'KIT502', 'Web Development', 'Soonja Yeom', 'Neeraj Luke', 'Friday, 10:00 - 11:50', 'Semester 2', 'Pandora', 'This unit introduces the techniques to enable the students to use these tools for managing data, creating information and allowing knowledge development. ', 'Friday, 14:00 - 15:50', 'Rivendell, UCent LTH1'),
(6, 'KIT404', 'Business Process Innovation', 'Erin Roehrer', 'Meredith Castles', 'Monday, 09:00 - 10:50', 'Semester 1', 'Pandora', 'This unit will seek to develop logical thinking, an appreciation for conceptual models, and the capability to understand and deal with complex systems.', 'Monday, 13:00 - 14:50', 'Neverland, HUM346 '),
(67, 'KIT508', 'Virtual and Mixed Reality Technology', 'Winyu Chinthammitt', 'Ali Raza', 'Tuesday,	10:00 - 11:50', 'Winter School', 'Pandora', 'This unit will explore the exciting field of virtual reality, mixed reality and the advanced concepts and technologies for interfacing humans to complex machines. ', 'Thursday, 14:00 - 15:50', 'Neverland, HUM256');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `idnumber` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `access` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `address` varchar(32) NOT NULL,
  `dob` varchar(32) NOT NULL,
  `pnumber` varchar(32) NOT NULL,
  `qualification` varchar(32) NOT NULL,
  `expertise` varchar(32) NOT NULL,
  `unavailability` varchar(32) NOT NULL,
  `title` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `idnumber`, `username`, `password`, `access`, `email`, `address`, `dob`, `pnumber`, `qualification`, `expertise`, `unavailability`, `title`) VALUES
(122, 1, 'DC', 'A+8oIGc9tKr8I', 1, 'dc@udw.com', '', '', '123456', 'PhD', 'Information Systems', '', 'Lecture'),
(123, 2, 'UC', '9gl/JDEFlrwc6', 2, 'uc@udw.com', '', '', '123456', 'PhD', 'Information Systems', '', 'Lecture, Tutor'),
(124, 3, 'Soonja Yeom', 'b/Bh97pNA0eg2', 3, 'soonja@udw.com', '', '', '123456', 'PhD', 'Information Systems', '', 'Lecture, Tutor'),
(125, 4, 'Tony Gray', '1JXqNLOWn/zWk', 4, 'tonyg@udw.com', '', '', '123456', 'Master', 'Network Administration', '', 'Lecture, Tutor'),
(126, 448185, 'Minxi Deng', 'NVpJYmLLqkU9E', 5, 'dengm@udw.com', '', '2020-12-02', '', '', '', '', ''),
(128, 41234, 'Anna', 'Ztiue2B6DwcfY', 5, 'anna1@udw.com', '', '', '', '', '', '', ''),
(129, 5, 'Lindsay Wells', 'pOfHLyYwPsjbo', 3, 'wells@udw.com', '', '', '123456', 'Master', 'Network Administration', '', 'Lecture, Tutor'),
(130, 6, 'Mazino Amuno', '95Y9HICj6lCqM', 3, 'maz@udw.com', '', '', '123456', 'Master', 'Human Computer Interaction', '', 'Lecture, Tutor'),
(131, 7, 'Stuart Smith', 'au/AfAO5qZFfM', 3, 'ssmi@udw.com', '', '', '123456', 'PhD', 'Information Systems', '', 'Lecture, Tutor'),
(132, 8, 'Renjie Li', '/QgOpmoOvStQ.', 3, 'renj@udw.com', '', '', '123456', 'PhD', 'Network Administration', '', 'Lecture, Tutor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorialenroll`
--
ALTER TABLE `tutorialenroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unitenroll`
--
ALTER TABLE `unitenroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tutorialenroll`
--
ALTER TABLE `tutorialenroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `unitenroll`
--
ALTER TABLE `unitenroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=134;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
