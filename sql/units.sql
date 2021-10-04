-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2020 at 07:26 PM
-- Server version: 5.5.65-MariaDB
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
-- Table structure for table `units`
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
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_code`, `unit_name`, `coordinator`, `lecturer`, `lecture_time`, `semester`, `campus`, `description`, `consultation`, `lec_location`) VALUES
(1, 'KIT304', 'Mobile Application Development', 'Tony Gray', 'Lindsay Wells', 'Tuesday, 11:00 - 12:50', 'Semester 2', 'Rivendell', 'The unit will focus on four main topics ofadministration: Unix system administration; Microsoft Windows administration; Network administration; Web andDatabase administration.', 'Tuesday, 15:00 - 16:50', 'Rivendell, Geol229'),
(2, 'KIT606', 'Data Analytics', 'Saurabh Garg', 'Mazino Amuno', 'Wednesday, 09:00 - 09:50', 'Spring', 'Neverland', 'Students will investigate information visualization tools and techniques to represent the big data in forms that more readily convey embedded information. ', 'Wednesday, 15:00 - 15:50 ', 'Pandora, SocSci 312'),
(3, 'KIT312', 'Information Systems Management', 'Son Tran', 'Stuart Smith', 'Thursday, 09:00 - 10:50', 'Semester 2', 'Rivendell', ' The unit delivers fundamentals on IS/IT strategic planning with a view of realising benefits for their IT investment. ', 'Thursday, 14:00 - 15:50', 'Pandora, maths254 '),
(4, 'KIT406', 'Embedded Systems', 'Byeong Kang', 'Renjie Li', 'Monday, 09:00 - 09:50 ', 'Semester 2', 'Neverland', 'Student will be given the great opportunity to learn about real-world embedded system environment by installing, designing, and managing several modules in Arduino.', 'Monday, 15:00 - 15:50', 'Rivendell, UCent LTH1  '),
(5, 'KIT502', 'Web Development', 'Soonja Yeom', 'Neeraj Luke', 'Friday, 10:00 - 11:50', 'Semester 2', 'Pandora', 'This unit introduces the techniques to enable the students to use these tools for managing data, creating information and allowing knowledge development. ', 'Friday, 14:00 - 15:50', 'Rivendell, UCent LTH1'),
(6, 'KIT404', 'Business Process Innovation', 'Erin Roehrer', 'Meredith Castles', 'Monday, 09:00 - 10:50', 'Semester 1', 'Pandora', 'This unit will seek to develop logical thinking, an appreciation for conceptual models, and the capability to understand and deal with complex systems.', 'Monday, 13:00 - 14:50', 'Neverland, HUM346 '),
(67, 'KIT508', 'Virtual and Mixed Reality Technology', 'Winyu Chinthammitt', 'Ali Raza', 'Tuesday,	10:00 - 11:50', 'Winter School', 'Pandora', 'This unit will explore the exciting field of virtual reality, mixed reality and the advanced concepts and technologies for interfacing humans to complex machines. ', 'Thursday, 14:00 - 15:50', 'Neverland, HUM256');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
