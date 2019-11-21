-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 02:13 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stid` int(11) NOT NULL,
  `stName` varchar(150) NOT NULL,
  `stEmail` varchar(200) NOT NULL,
  `stPassword` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `stDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stid`, `stName`, `stEmail`, `stPassword`, `status`, `stDate`) VALUES
(4, 'divya', 'lad@gmail.com', '123456', 0, '2019-11-21 08:18:35'),
(5, 'anand  again', 'sharma@gmail.com', '123', 0, '2019-11-21 08:18:42'),
(8, 'bhavesh', 'sharmaanand086@gmail.com', '12afdsf', 0, '2019-11-21 12:47:23'),
(11, 'dfsaf', 'sharmaanand086@gmail.com', '12', 0, '2019-11-21 01:29:39'),
(12, 'fdasf', 'sharmaanand086@gmail.com', '12', 0, '2019-11-21 02:03:43'),
(13, 'adfsaf', 'sharmaanand086@gmail.com', '12', 0, '2019-11-21 02:04:06'),
(14, 'sfasfsdadf', 'sharmaanand086@gmail.com', '12', 0, '2019-11-21 02:07:16'),
(15, 'asdfafaf', 'sharmaanand086@gmail.com', '12', 0, '2019-11-21 02:08:17'),
(16, 'sdafasf', 'sharmaanand086@gmail.com', '12', 0, '2019-11-21 02:11:14'),
(17, 'fadsfasf', 'sharmaanand086@gmail.com', '12', 0, '2019-11-21 02:12:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
