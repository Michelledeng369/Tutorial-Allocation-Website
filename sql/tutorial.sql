-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2020 at 07:27 PM
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
-- Table structure for table `tutorial`
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
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`id`, `unitcode`, `tutor`, `time`, `location`, `maxnumber`) VALUES
(22, 'KIT304', 'Tony Gray', 'Monday, 09:00 - 10:50', 'Rivendell, Eng 304', 20),
(23, 'KIT304', 'Stuart Smith', 'Tuesday,	13:00 - 13:50', 'Rivendell, IMAS 215', 25),
(24, 'KIT304', 'Renjie Li', 'Wednesday,	13:00 - 14:50', 'Rivendell, Eng 304', 20),
(25, 'KIT606', 'Mazino Amuno', 'Monday, 09:00 - 10:50', 'Rivendell, HUM346', 20),
(26, 'KIT606', 'Soonja Yeom', 'Tuesday,	13:00 - 13:50', 'Rivendell, IMAS 315', 20),
(27, 'KIT606', 'Lindsay Wells', 'Wednesday,	13:00 - 14:50', 'Rivendell, IMAS 231', 20),
(28, 'KIT304', 'UC', 'Thursday, 12:00 - 13:50', 'Rivendell, Geol229 	', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
