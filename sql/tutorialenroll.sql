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
-- Table structure for table `tutorialenroll`
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
-- Dumping data for table `tutorialenroll`
--

INSERT INTO `tutorialenroll` (`id`, `tid`, `idnumber`, `username`, `unit_code`, `tutor`, `time`, `tlocation`) VALUES
(51, 25, 41234, 'Anna', 'KIT606 ', 'Mazino Amuno', 'Monday, 09:00 - 10:50', 'Rivendell, HUM346'),
(52, 26, 448185, 'Minxi Deng', 'KIT606 ', 'Soonja Yeom', 'Tuesday,	13:00 - 13:50', 'Rivendell, IMAS 315');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tutorialenroll`
--
ALTER TABLE `tutorialenroll`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tutorialenroll`
--
ALTER TABLE `tutorialenroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
