-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2020 at 07:25 PM
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
-- Table structure for table `users`
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
-- Dumping data for table `users`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=134;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
