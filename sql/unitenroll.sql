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
-- Table structure for table `unitenroll`
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
-- Dumping data for table `unitenroll`
--

INSERT INTO `unitenroll` (`id`, `idnumber`, `username`, `unit_code`, `unit_name`, `lecturer`, `coordinator`, `lecture_time`, `lec_location`, `semester`, `campus`) VALUES
(24, 41234, 'Anna', 'KIT606 ', 'Data Analytics', 'Mazino Amuno', 'Saurabh Garg', 'Wednesday, 09:00 - 09:50', 'Pandora, SocSci 312', 'Spring', 'Neverland'),
(25, 448185, 'Minxi Deng', 'KIT606 ', 'Data Analytics', 'Mazino Amuno', 'Saurabh Garg', 'Wednesday, 09:00 - 09:50', 'Pandora, SocSci 312', 'Spring', 'Neverland');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `unitenroll`
--
ALTER TABLE `unitenroll`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `unitenroll`
--
ALTER TABLE `unitenroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
