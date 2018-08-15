-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2018 at 05:36 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(30) NOT NULL,
  `operation` bigint(30) NOT NULL,
  `comment` text NOT NULL,
  `user` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `operation`, `comment`, `user`, `time`) VALUES
(1, 15, 'hnhghghgh', 1, '2018-08-14 13:18:04'),
(2, 27, '', 1, '2018-08-15 16:21:24'),
(3, 27, '', 1, '2018-08-15 16:21:24'),
(4, 27, '', 1, '2018-08-15 16:21:50'),
(5, 27, '', 1, '2018-08-15 16:21:52'),
(6, 28, '', 1, '2018-08-15 17:26:09'),
(7, 28, '', 1, '2018-08-15 17:26:09'),
(8, 28, 'I don&amp;#039;t Think so', 1, '2018-08-15 17:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `remarks` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `fext` varchar(20) NOT NULL,
  `classification` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `user` int(11) NOT NULL,
  `poster_level` varchar(50) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id`, `title`, `details`, `remarks`, `attachment`, `fext`, `classification`, `category`, `user`, `poster_level`, `time`) VALUES
(16, 'Nyabarongo Bridge blown up', 'Today   12./8/2018 at 05H00 received info that Nyabarongo bridge at giti cyinyoni has been blown up by yet to be known elements', '-Alert FF in the area to cordon off\r\n-Info RNP to manage traffic\r\n-D/OPs to  deploy   ASAP , keep STN updated ', '', '', 'Restricted', 'Spot', 1, 'HQ', '2018-08-14 10:36:05'),
(24, 'Operation Gasabo', 'Operation map attached ', ' ', '24-904akjlkzv5ia54a0j2d.jpg', 'jpg', 'Confidential', '', 1, 'HQ', '2018-08-14 13:52:49'),
(25, 'Operation Gasabo', 'Audio attached', ' ', '25-rno6v6uroxuy97v9pnpt.mp3', 'mp3', 'Confidential', '', 1, 'HQ', '2018-08-14 13:54:38'),
(26, 'hgjgjngfhj', 'fgjhuhgh', 'ghjhgfghjgfhjk', '26-88ofc0bh0kjwjqlvhf9d.jpg', 'jpg', 'Confidential', '', 1, 'HQ', '2018-08-15 13:40:26'),
(27, 'dbxfbgchvjbgfdshjgfds', 'dfghjgfdsfgh', 'dfghfdghj', '27-y5troz2mbt6up5ayzb2w.mp3', 'mp3', 'Confidential', '', 1, 'HQ', '2018-08-15 13:59:32'),
(28, 'Construction of Gogos Bridge', 'Thi work will take like forever', 'Increase money and manpower', '', '', 'Restricted', '', 1, 'HQ', '2018-08-15 17:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `oname` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `job_position` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `level` varchar(255) NOT NULL DEFAULT '0',
  `avatar` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `oname`, `gender`, `job_position`, `email`, `password`, `address`, `phone`, `active`, `level`, `avatar`, `date_created`, `lastlogin`, `ip`) VALUES
(1, 'Anicet', 'Rushema', '', 'Male', 'Software Dev.', 'rushemaa@gmail.com', 'c227c26957acbc0db8e1c66d69bacd04', '', '0785142113', '1', 'HQ', '', '2016-04-14 02:22:15', '2018-08-15 17:17:32', '192.168.159.1'),
(14, 'Felix', 'KAMANA', '', 'Male', 'Admin', 'fezzopro@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'KN 299', '785634575', '1', 'Admin', '', '2018-08-15 16:09:52', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_view`
--

CREATE TABLE `users_view` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `viev` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_view`
--

INSERT INTO `users_view` (`id`, `user`, `viev`) VALUES
(1, 1, 'Restricted'),
(2, 1, 'Confidential'),
(3, 1, 'Secret'),
(4, 1, 'Top secret'),
(6, 13, 'Restricted'),
(7, 13, 'Confidential'),
(8, 13, 'Secret'),
(9, 13, 'Top secret'),
(10, 14, 'Restricted'),
(11, 14, 'Confidential'),
(12, 14, 'Secret'),
(13, 14, 'Top secret'),
(14, 14, 'None');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_view`
--
ALTER TABLE `users_view`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users_view`
--
ALTER TABLE `users_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
