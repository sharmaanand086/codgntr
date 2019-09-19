-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2019 at 12:48 PM
-- Server version: 5.5.61-cll
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worldsuc_stfaction`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'anand@arfeenkhan.com', '1234', 'anand'),
(2, 'bhavesh@arfeenkhan.com', 'bhavesh', 'bhavesh'),
(3, 'divya@arfeenkhan.com', 'test123', 'divya');

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `pdflink` longtext NOT NULL,
  `stepid` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requestes`
--

CREATE TABLE `requestes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `status` int(20) NOT NULL,
  `reasonreject` text NOT NULL,
  `createdat` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestes`
--

INSERT INTO `requestes` (`id`, `name`, `username`, `contact`, `userid`, `status`, `reasonreject`, `createdat`) VALUES
(1, 'siddhi', 'siddhi@arfeenkhan.com', '8798749874', '2', 1, '', '2019-09-11'),
(2, 'bhavesh', 'bhavesh@arfeenkhan.com', '9897416461', '3', 1, '', '2019-09-11'),
(3, 'anand', 'anand@gmail.com', '2164515264', '1', 1, '', '2019-09-11'),
(6, 'siddhi', 'siddhi@arfeenkhan.com', '9678465154', '2', 2, '', '2019-09-11'),
(7, 'siddhi', 'siddhi@arfeenkhan.com', '564978410', '2', 1, '', '2019-09-11'),
(8, 'siddhi', 'siddhi@arfeenkhan.com', '5648978458', '2', 1, '', '2019-09-12'),
(34, 'bhavesh', 'bhavesh@arfeenkhan.com', '761654981', '3', 1, '', '2019-09-13'),
(33, 'bhavesh', 'bhavesh@arfeenkhan.com', '761654981', '3', 1, '', '2019-09-13'),
(32, 'anand', 'anand@gmail.com', '9874563210', '1', 1, '', '2019-09-13'),
(31, 'divya', 'divya@arfeenkhan.com', '987131560', '4', 1, '', '2019-09-13'),
(46, 'test', 'test@arfeenkhan.com', '123456789', '5', 1, '', '2019-09-19'),
(45, 'akshat', 'akshat@arfeenkhan.com', '123456789', '6', 0, '', '2019-09-19'),
(37, 'divya', 'divya@arfeenkhan.com', '987131560', '4', 1, '', '2019-09-14'),
(38, 'anand', 'anand@gmail.com', '9874563210', '1', 0, '', '2019-09-15'),
(39, 'divya', 'divya@arfeenkhan.com', '987131560', '4', 1, '', '2019-09-18'),
(40, 'divya', 'divya@arfeenkhan.com', '987131560', '4', 0, '', '2019-09-18'),
(42, 'test', 'test@arfeenkhan.com', '123456789', '5', 1, '', '2019-09-19'),
(43, 'test', 'test@arfeenkhan.com', '123456789', '5', 1, '', '2019-09-19'),
(44, 'test', 'test1@arfeenkhan.com', 'tset', '7', 0, '', '2019-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `step`
--

CREATE TABLE `step` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `v_p` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `step`
--

INSERT INTO `step` (`id`, `title`, `description`, `v_p`) VALUES
(3, 'Step 1', 'step one description', 'v'),
(4, 'Step 2', 'Step 2 Description', 'v');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ftime` varchar(50) NOT NULL,
  `attempts` varchar(50) NOT NULL,
  `allowattmpt` varchar(50) NOT NULL,
  `createdat` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `contact`, `password`, `ftime`, `attempts`, `allowattmpt`, `createdat`) VALUES
(1, 'anand@gmail.com', 'anand', '9874563210', '1234', '1', '11', '11', '2019-09-06'),
(2, 'siddhi@arfeenkhan.com', 'siddhi', '6464646940', '1234', '1', '8', '9', '2019-09-06'),
(3, 'bhavesh@arfeenkhan.com', 'bhavesh', '761654981', '1234', '1', '7', '8', '2019-09-06'),
(4, 'divya@arfeenkhan.com', 'divya', '987131560', '1234', '1', '3', '1000', '2019-09-09'),
(7, 'test1@arfeenkhan.com', 'test', 'tset', '1234', '1', '3', '3', '2019-09-19'),
(5, 'test@arfeenkhan.com', 'test', '123456789', '1234', '1', '3', '3', '0000-00-00'),
(6, 'akshat@arfeenkhan.com', 'akshat', '123456789', '1234', '1', '3', '3', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `link` longtext NOT NULL,
  `stepid` varchar(100) NOT NULL,
  `imgurl` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `link`, `stepid`, `imgurl`) VALUES
(1, 'Introduction', 'https://player.vimeo.com/video/359739418', '3', 'no'),
(2, 'Pre-meeting', 'https://player.vimeo.com/video/359740382', '3', 'no'),
(3, 'Preview', 'https://player.vimeo.com/video/359739852', '3', 'no'),
(4, 'Paper work figures and expenses', 'https://player.vimeo.com/video/359739800', '3', 'no'),
(5, 'Rules during the seminar', 'https://player.vimeo.com/video/359740137', '3', 'no'),
(6, 'Conclusion', 'https://player.vimeo.com/video/359739692', '3', 'no'),
(7, 'Round) (Analyzing the day', 'https://player.vimeo.com/video/359739585', '3', 'no'),
(8, 'Session 1', 'https://player.vimeo.com/video/358077381', '4', 'no'),
(9, 'Session 2', 'https://player.vimeo.com/video/358078372', '4', 'no'),
(10, 'Session 3', 'https://player.vimeo.com/video/358079403', '4', 'no'),
(11, 'Session 4', 'https://player.vimeo.com/video/358079973', '4', 'no'),
(12, 'Session 5', 'https://player.vimeo.com/video/358081152', '4', 'no'),
(13, 'Session 6', 'https://player.vimeo.com/video/358076866', '4', 'no'),
(14, 'Session 7', 'https://player.vimeo.com/video/358081667', '4', 'no'),
(15, 'Session 8', 'https://player.vimeo.com/video/358082378', '4', 'no'),
(16, 'Session 9', 'https://player.vimeo.com/video/358083052', '4', 'no'),
(17, 'Session 10', 'https://player.vimeo.com/video/358084423', '4', 'no'),
(18, 'Session 11', 'https://player.vimeo.com/video/358085270', '4', 'no'),
(19, 'Session 12', 'https://player.vimeo.com/video/358085767', '4', 'no'),
(20, 'Session 13', 'https://player.vimeo.com/video/358085767', '4', 'no'),
(21, 'Session 14', 'https://player.vimeo.com/video/358086750', '4', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestes`
--
ALTER TABLE `requestes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `step`
--
ALTER TABLE `step`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requestes`
--
ALTER TABLE `requestes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `step`
--
ALTER TABLE `step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
