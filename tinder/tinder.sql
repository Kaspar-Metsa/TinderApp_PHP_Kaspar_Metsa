-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 08:25 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `kasparmetsa_action`
--

CREATE TABLE IF NOT EXISTS `kasparmetsa_action` (
`id` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `like` enum('like','nope') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kasparmetsa_action`
--

INSERT INTO `kasparmetsa_action` (`id`, `user1`, `user2`, `like`) VALUES
(2, 7, 6, 'like'),
(3, 6, 7, 'like'),
(4, 1, 2, 'like'),
(5, 2, 1, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `kasparmetsa_message`
--

CREATE TABLE IF NOT EXISTS `kasparmetsa_message` (
`id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `content` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kasparmetsa_message`
--

INSERT INTO `kasparmetsa_message` (`id`, `from`, `to`, `content`, `datetime`) VALUES
(1, 7, 6, 'Hello', '2015-12-06 05:10:48'),
(2, 6, 7, 'Hi there!', '2015-12-06 05:17:39'),
(3, 6, 7, 'Hi,\r\n\r\nIt''s nice to meet you.', '2015-12-06 05:24:04'),
(6, 7, 6, 'Long time no see!', '2015-12-06 08:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `kasparmetsa_user`
--

CREATE TABLE IF NOT EXISTS `kasparmetsa_user` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` date DEFAULT NULL,
  `displayname` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `biography` text NOT NULL,
  `long` float NOT NULL,
  `lat` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kasparmetsa_user`
--

INSERT INTO `kasparmetsa_user` (`id`, `username`, `password`, `email`, `gender`, `birthday`, `displayname`, `avatar`, `biography`, `long`, `lat`) VALUES
(6, 'girl', 'e10adc3949ba59abbe56e057f20f883e', 'girl@gmail.com', 'female', '2015-12-06', 'Julia', 'uploads/1449330621.jpg', 'Hi,\r\n\r\nI am a cute girl!', 106.667, 10.75),
(7, 'boy', 'e10adc3949ba59abbe56e057f20f883e', 'boy@boy.com', 'male', '1988-04-01', 'Boy', 'uploads/1449330588.jpg', 'Hi,\r\n\r\nI am a funny man!\r\n\r\nContact me!', 0, 0),
(8, 'than', 'e10adc3949ba59abbe56e057f20f883e', 'than@gmail.com', 'male', '1988-01-04', 'than', 'uploads/1449386460.jpg', 'I am crazy', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kasparmetsa_action`
--
ALTER TABLE `kasparmetsa_action`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasparmetsa_message`
--
ALTER TABLE `kasparmetsa_message`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kasparmetsa_user`
--
ALTER TABLE `kasparmetsa_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kasparmetsa_action`
--
ALTER TABLE `kasparmetsa_action`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kasparmetsa_message`
--
ALTER TABLE `kasparmetsa_message`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kasparmetsa_user`
--
ALTER TABLE `kasparmetsa_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
