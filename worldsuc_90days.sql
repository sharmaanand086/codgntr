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
-- Database: `worldsuc_90days`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin-data`
--

CREATE TABLE `admin-data` (
  `id` int(11) NOT NULL,
  `logo` text NOT NULL,
  `name` text NOT NULL,
  `info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin-data`
--

INSERT INTO `admin-data` (`id`, `logo`, `name`, `info`) VALUES
(1, 'assets/images/p.png', 'Profile', 'Write the pointers in short that you\'ll elaborate in your profile (e.g. about you, your story, your programs, your books, mission etc.)'),
(2, 'assets/images/b.png', 'Books', 'Make a list of the possible names you can give to your books'),
(3, 'assets/images/bc.png\r\n', 'Book chapters', 'Write names of the chapters you’ll write in your book\r\n'),
(4, 'assets/images/v.png\r\n', 'Videos', 'Write the kind of videos you\'ll like to make and write the list of titles for your videos\r\n'),
(5, 'assets/images/m.png\r\n', 'Magazines', 'Write the names of the possible magazines you can write your articles in and write titles of the articles you’ll write\r\n'),
(6, 'assets/images/smp.png\r\n', 'Social Media Posts', 'Write the kind of posts you can upload on your social media pages\r\n'),
(7, 'assets/images/fse.png\r\n\r\n', 'Free Speaking Engagements', 'Make a list of places where you can go and give FREE talks.\r\n'),
(8, 'assets/images/a.png\r\n', 'Articles', 'Write titles of the articles you’ll write in magazines or newspapers'),
(9, 'assets/images/ap.png\r\n', 'Audio Products', 'Make a list of the possible audios you can make and give titles to each of the audios'),
(10, 'assets/images/vp.png\r\n', 'Video Products', 'Make a list of the possible videos you can make and give titles to each of the videos\r\nMake a list of the possible video products you can make and give titles to each of the videos'),
(11, 'assets/images/i.png\r\n', 'Conversations', 'Write the names of the possible personalities you\'d like to interview and write what questions can you ask them.\r\n'),
(12, 'assets/images/msc.png\r\n', 'Miscellaneous', 'Make a list of ways other than the ones mentioned above to build your credibility\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `answr_profileb`
--

CREATE TABLE `answr_profileb` (
  `id` int(11) NOT NULL,
  `uid` int(100) NOT NULL,
  `question` text NOT NULL,
  `ans` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answr_profileb`
--

INSERT INTO `answr_profileb` (`id`, `uid`, `question`, `ans`) VALUES
(84, 169, '7', 'http://www.speaktofortune.com/profileblueprint/ 1234'),
(83, 169, '6', 'test123'),
(82, 169, '5', 'test13'),
(81, 169, '4', 'test123'),
(80, 169, '3', 'test13'),
(79, 169, '2', 'test13'),
(78, 169, '1', 'test1234'),
(35, 0, '7', 'dropbox.com'),
(34, 0, '6', 'hjkhjkhj'),
(33, 0, '5', 'hjkhjkhjkhjkhjk'),
(31, 0, '3', 'hk'),
(32, 0, '4', 'hkj'),
(30, 0, '2', 'hjkkj'),
(29, 0, '1', 'hjkhjkhjk'),
(85, 167, '1', 'test'),
(86, 167, '2', 'est'),
(87, 167, '3', 'est'),
(88, 167, '4', 'est'),
(89, 167, '5', 'ste'),
(90, 167, '6', 'est'),
(91, 167, '7', 'esedadads');

-- --------------------------------------------------------

--
-- Table structure for table `coachassign`
--

CREATE TABLE `coachassign` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `assigned` varchar(100) NOT NULL DEFAULT '0',
  `client_name` varchar(30) NOT NULL,
  `client_username` varchar(50) NOT NULL,
  `client_phone` varchar(20) NOT NULL,
  `client_cont_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coachassign`
--

INSERT INTO `coachassign` (`id`, `name`, `username`, `assigned`, `client_name`, `client_username`, `client_phone`, `client_cont_id`) VALUES
(1, 'Susree Subhra Nanda', 'susree.subhra@gmail.com', '1', 'anand sharma', 'anand@arfeenkhan.com', '+918882298643', '779609'),
(2, 'Hemant nag', 'hnag74@yahoo.com', '1', 'bhavesh', 'bhavesh@arfeenkhan.com', '+919874563210', '591258'),
(3, 'Indira Pandit', 'ind.pandit@gmail.com', '1', 'bhavesh', 'anandasdfa@arfeenkhan.com', '+918882298643', '927149'),
(4, 'Rekha Shah', 'rekhaashah27@gmail.com', '1', 'bhavesh', 'bhavesh@arfeenkhan.com', '+919874563210', '591258'),
(5, 'M.L.Saboo', 'mlsflight@hotmail.com', '1', 'bhavesh', 'bhavesh@arfeenkhan.com', '+919874563210', '591258'),
(6, 'Umamahesh Kummari', 'Mahesh.sabi@yahoo.co.in', '1', 'bhavesh', 'bhavesh@arfeenkhan.com', '+919874563210', '591258'),
(7, 'Nilam Doctor', 'nilamdoc@gmail.com', '1', 'bhavesh', 'bhavesh@arfeenkhan.com', '+919874563210', '591258'),
(8, 'Ruchi Nilam Doctor', 'prowess.house@gmail.com', '1', 'anand sharma', 'anand@arfeenkhan.com', '+918882298643', '779609'),
(9, 'Preeti V Tolani', 'preetitolani03@gmail.com', '1', 'anand sharma', 'anand@arfeenkhan.com', '+918882298643', '779609'),
(10, 'Ajay Kumar Ambati', 'ajay.ambati@gmail.com', '1', 'bhavesh', 'abcfd@arfeenkhan.com', '+919874563210', '927157'),
(11, 'DEEPTI PARIHAR', 'minaydeep@gmail.com', '1', 'bhavesh', 'abcfd@arfeenkhan.com', '+919874563210', '927157'),
(12, 'Apurva Desai', 'apu3108@gmail.com', '1', 'siddhi', 'siddhihatle@ymail.com', '9789237289', '927167'),
(13, 'Sandeep Patel', 'sandeep.rns@gmail.com', '1', 'divyalad', 'lad@ymail.com', '9875632410', '927171'),
(14, 'Manoj Chhablani', 'manoj@webgility.com', '1', 'lad ji', 'ladji@gmail.com', '97979799855', '927173'),
(15, 'Satwinder Singh', 'blazing.sattu@gmail.com', '1', 'siddhih', 'hatlesiddhi@ymail.com', '97897461611', '927175'),
(16, 'Joshika Sharma', 'joshikasharma9@gmail.com', '1', 'ajusdf', 'anujssss@arfeenkhan.com', '365265489002', '927205'),
(17, 'Rahul Srivastava', 'rahul.srivastava0304@gmail.com', '1', 'anand sharma', 'anandsharma@arfeenkhan.com', '+91824235356', '927213'),
(18, 'Kshitij Goel', 'kshitijgoel92@gmail.com', '1', 'anujsdfa', 'asfdaf@arfeenkhan.com', '+9185463465463', '927215'),
(19, 'Manila kabra', 'manila.kabra@gmail.com', '1', 'anujsdfa', 'asfdaf@arfeenkhan.com', '+9185463465463', '927215'),
(20, 'Luna Bose', 'brc.luna@gmail.com', '1', 'bhavesh', 'bhaveshdgdf1212@arfeenkhan.com', '9874563210', '929559'),
(21, 'D.R. Singh', 'dsingh120460@gmail.com', '1', 'bhavesh', 'bhavesh6544@arfeenkhan.com', '+919874563210', '929693'),
(22, 'NARAYAN SHANKAR RAO', 'nsrao43@gmail.com', '1', 'bhavesh', 'bhavesh6544@arfeenkhan.com', '+919874563210', '929693'),
(23, 'margaret xavier', 'anjana_23@yahoo.com', '1', 'bhavesh', 'bhavesh454@arfeenkhan.com', '+919874563210', '929695'),
(24, 'Ashwani Bhardwaj', 'ashwynbhardwaj@gmail.com', '1', 'anand sharma', 'anand1222@arfeenkhan.com', '+918882298643', '929733'),
(25, 'Gaurav maheshwari', 'entc.gaurav@gmail.com', '0', '', '', '', ''),
(26, 'Venkant Rama Subramaniam', 'venky1965@gmail.com', '0', '', '', '', ''),
(27, 'Juhi Saxena', 'saxenajuhi.js@gmail.com', '0', '', '', '', ''),
(28, 'Ketan Krishna', 'ketan.krishna@gmail.com', '0', '', '', '', ''),
(29, 'Prita Dheer', 'Prita.dheer@gmail.com', '0', '', '', '', ''),
(30, 'Reetu Verma', 'verma.reetu@gmail.com', '0', '', '', '', ''),
(31, 'Shika Saboo', 'shikhasaboo@gmail.com', '0', '', '', '', ''),
(32, 'Praful Karambelkar', 'prafulk2003@gmail.com', '0', '', '', '', ''),
(33, 'Astha Chandra', 'asthachandra@gmail.com', '0', '', '', '', ''),
(34, 'Kavita Agarwal', 'ativak76@gmail.com', '0', '', '', '', ''),
(35, 'Dr.Kuljeit Uppaal', 'ceo@krea.co.in', '0', '', '', '', ''),
(36, 'G.Praneet Raja', 'prajag@indianoil.in', '0', '', '', '', ''),
(37, 'Urmi Thakker', 'drurmi87@gmail.com', '0', '', '', '', ''),
(38, 'Praveen Sethi', 'sethipraveen2000@yahoo.com', '0', '', '', '', ''),
(39, 'Vikas Yadav', 'vikas.dcian@gmail.com', '0', '', '', '', ''),
(40, 'Rajkumar Bargah', 'rajkumarbargah@gmail.com', '0', '', '', '', ''),
(41, 'Anannya Thomas', 'ams.anannya@gmail.com', '0', '', '', '', ''),
(42, 'Jaya Shetty', 'jivs25.shetty@gmail.com', '0', '', '', '', ''),
(43, 'Benhur Rao', 'benhur_92@hotmail.com', '0', '', '', '', ''),
(44, 'Sunjoy Podaar', 'sunwithjoy@gmail.com', '0', '', '', '', ''),
(45, 'Praneeta', 'rjpraneeta@gmail.com', '0', '', '', '', ''),
(46, 'Pushpa Kallianpur', 'blush.push@gmail.com', '0', '', '', '', ''),
(47, 'Mushahid Ali', 'mushahidaleez@gmail.com', '0', '', '', '', ''),
(48, 'Neena George', 'georgeneena90@gmail.com', '0', '', '', '', ''),
(49, 'AKSHITA SANGHVI', 'akshita.sanghvi26@gmail.com', '0', '', '', '', ''),
(50, 'Rohit Jethmal Bhandari', 'rohit_bhandari27@yahoo.com', '0', '', '', '', ''),
(51, 'Sarojkumar Girijashankar Tiwari', 'saroj_tiwari1969@yahoo.co.in', '0', '', '', '', ''),
(52, 'JITHENDER KUMAR', 'Jithender.kumar@gmail.com', '0', '', '', '', ''),
(53, 'Shweta Pandey', 'shwetapanday@gmail.com', '0', '', '', '', ''),
(54, 'Shahid Shaikh', 'shahid150@gmail.com', '0', '', '', '', ''),
(55, 'Payal Vani', 'payalvani444@gmail.com', '0', '', '', '', ''),
(56, 'Krunal Shah', 'shahkrunala@gmail.com', '0', '', '', '', ''),
(57, 'Aishwarya', 'meetaishwaryagoel@gmail.com', '0', '', '', '', ''),
(58, 'Ram Anand', 'abhiramsinghal@gmail.com', '0', '', '', '', ''),
(59, 'Shahnwaz Alam', 'shahnwaz2010@gmail.com', '0', '', '', '', ''),
(60, 'Mohan sutradhar', 'sutradhar.mohan@gmail.com', '0', '', '', '', ''),
(61, 'Sapna Khandewal', 'khandelwal.sapna@gmail.com', '0', '', '', '', ''),
(62, 'Josh Kalpesh', 'joshkalpesh@yahoo.com', '0', '', '', '', ''),
(63, 'Suman S D', 'Sumansd@hotmail.com', '0', '', '', '', ''),
(64, 'Dilvinder Singh Taluja', 'contact.dilvinder@gmail.com', '0', '', '', '', ''),
(65, 'Steffy Gregory Rozario', 'steffyjrozario@gmail.com', '0', '', '', '', ''),
(66, 'Shadab Khan', 'shadab211@gmail.com', '0', '', '', '', ''),
(67, 'Virr saxenaa', 'Virr_saxenaa@hotmail.com', '0', '', '', '', ''),
(68, 'Vinay Acharya', 'acharyavinay@yahoo.com', '0', '', '', '', ''),
(69, 'Shilpa singh', 'shilpaneemasingh@gmail.com', '0', '', '', '', ''),
(70, 'Nisha Verma', 'vermanisha@msn.com', '0', '', '', '', ''),
(71, 'Anannya Bhattacharjee', 'anannya48@gmail.com', '0', '', '', '', ''),
(72, 'Mamta Chandani', 'mamtachandani66@gmail.com', '0', '', '', '', ''),
(73, 'Mohan Lal Singhal', 'Singhal.mohanlal@gmail.com', '0', '', '', '', ''),
(74, 'SHRUTI DUTT', 'shrutiddutt@gmail.com', '0', '', '', '', ''),
(75, 'Varsha Shah', 'rkcmyschool@gmail.com', '0', '', '', '', ''),
(76, 'Seema', 'seemaranaware@yahoo.com', '0', '', '', '', ''),
(77, 'Mohsin Chand Mulani', 'mohsinmulani17@rediffmail.com', '0', '', '', '', ''),
(78, 'Srikumar Pillai', 'spillai@familyvision.info', '0', '', '', '', ''),
(79, 'Shashwati Pillutla', 'sidhulinux@yahoo.co.in', '0', '', '', '', ''),
(80, 'Siddhartha Pillutla', 'sidhulinux@yahoo.co.in', '0', '', '', '', ''),
(81, 'Sapna Agarwal', 'agarwalsapna95@gmail.com', '0', '', '', '', ''),
(82, 'Sangeeeta', 'sangeetasharma001@gmail.com', '0', '', '', '', ''),
(83, 'Nina Sanyal', 'nnsanyal3@gmail.com', '0', '', '', '', ''),
(84, 'Divyadeep Kaur', 'divyadeepbhatia58@gmail.com', '0', '', '', '', ''),
(85, 'Pratyusha', 'Pratyusha.mangalagiri@gmail.com', '0', '', '', '', ''),
(86, 'Gurudath Kamath', 'gurudathkamath14@gmail.com', '0', '', '', '', ''),
(87, 'Aashish Gautam', 'lounge.gunsnroses@gmail.com', '0', '', '', '', ''),
(88, 'Manish Monga', 'man_mon@hotmail.com', '0', '', '', '', ''),
(89, 'Santosh', 'santosh_kaware@rediffmail.com', '0', '', '', '', ''),
(90, 'Anjali Ahuja', 'anjalipersonal@hotmail.com', '0', '', '', '', ''),
(91, 'Madhu Punjabi', 'madhu_1310@ymail.com', '0', '', '', '', ''),
(92, 'Chitra Sen', 'chitrapips@gmail.com', '0', '', '', '', ''),
(93, 'Shika Nagar', 'myra.hope.faith@gmail.com', '0', '', '', '', ''),
(94, 'Suchitra Nair', 'sdn2130@gmail.com', '0', '', '', '', ''),
(95, 'Dr M R S Raju', 'dr.mudduluri@gmail.com', '0', '', '', '', ''),
(96, 'Dr. Rekha Desai', 'kalakruti19@gmail.com', '0', '', '', '', ''),
(97, 'Anurag Jambhulkar', 'anuragjambhulkar@gmail.com', '0', '', '', '', ''),
(98, 'Rudrakshi Warikoo', 'rudrakshi_warikoo@hotmail.com', '0', '', '', '', ''),
(99, 'Sanjay Govind Anand', 'anand_sanjay1@yahoo.co.in', '0', '', '', '', ''),
(100, 'Sangeeta Patil.', 'sangeeta.patil@hotmail.ca', '0', '', '', '', ''),
(101, 'Ashish Pal', 'ashishpal2702@gmail.com', '0', '', '', '', ''),
(102, 'Neelam Mankar', 'neelam_19m@rediffmail.com', '0', '', '', '', ''),
(103, 'Sreeti Amonkar', 'sreetia@gmail.com', '0', '', '', '', ''),
(104, 'Bhijal Kabra', 'kabra.bijal@gmail.com', '0', '', '', '', ''),
(105, 'Veena Sinha', 'sinhaveenacs@gmail.com', '0', '', '', '', ''),
(106, 'Roopa', 'roopa.b.a@gmail.com', '0', '', '', '', ''),
(107, 'Maria Pontes', 'mariap@niit.com', '0', '', '', '', ''),
(108, 'Craig Goodwin', 'craigkgoodwin@gmail.com', '0', '', '', '', ''),
(109, 'MAMTA SAIGAL', 'mamta10@gmail.com', '0', '', '', '', ''),
(110, 'Kriti Kulshresha', 'kritik19@gmail.com', '0', '', '', '', ''),
(111, 'Sanjay Jaiswal', 'sanjayjaiswal911@gmail.com', '0', '', '', '', ''),
(112, 'Mohammed Mujahid', 'mohammed@mujahid.in', '0', '', '', '', ''),
(113, 'Muneer Al busaidi', 'muneer@muneer.com', '0', '', '', '', ''),
(114, 'Nivedita Tiwari', 'nivedita1220@gmail.com', '0', '', '', '', ''),
(115, 'Meghana Gandhi', 'eduhorizon.meghana@gmail.com', '0', '', '', '', ''),
(116, 'Swapnil Pardeshi', 'gripel@gmail.com', '0', '', '', '', ''),
(118, 'Suchitra Pareekh', 'spareekh@gmail.com', '0', '', '', '', ''),
(119, 'Archana Seth', 'arc.seth@gmail.com', '0', '', '', '', ''),
(120, 'Surili Gupta', 'suriligupta@gmail.com', '0', '', '', '', ''),
(121, 'Ajeet George', 'ajeetgeorge@gmail.com', '0', '', '', '', ''),
(122, 'Jitendra', 'jitendrarajendragupta@gmail.com', '0', '', '', '', ''),
(123, 'Vanita Singh', 'vanitasingh825@gmail.com', '0', '', '', '', ''),
(124, 'Mehul shanghvi', 'Mehulshanghvi42@gmail.com', '0', '', '', '', ''),
(125, 'Deepali narula', 'deepalinarula18@gmail.com', '0', '', '', '', ''),
(126, 'Surjeet Singh', 'smileindia66@gmail.com', '0', '', '', '', ''),
(127, 'Sanjana', 'sanjana.jhunjhunwala@hotmail.com', '0', '', '', '', ''),
(128, 'Dripta Sarkar', 'driptasarkar500@gmail.com', '0', '', '', '', ''),
(129, 'Charu Ahuja', 'charug1820@gmail.com', '0', '', '', '', ''),
(130, 'Shradha Shetty', 'shettyshradhacounselor@gmail.com', '0', '', '', '', ''),
(131, 'Shipra Kaul', 'sumbly.shipra@gmail.com', '0', '', '', '', ''),
(132, 'Neelu Juneja', 'pam_juneja@yahoo.com', '0', '', '', '', ''),
(133, 'Anvita Malhotra', 'anvitamalhotra@gmail.com', '0', '', '', '', ''),
(134, 'Farah Khan Pethe', 'farah3151@yahoo.co.in', '0', '', '', '', ''),
(135, 'D Venkateswara Reddy', 'knowvenki@gmail.com', '0', '', '', '', ''),
(136, 'Rashmi Shekhar', 'dolly347@gmail.com', '0', '', '', '', ''),
(137, 'Kalyan s Hatti', 'kalyanhatti@gmail.com', '0', '', '', '', ''),
(138, 'Chitranjan Kumar', 'chitranjankumarsingh@gmail.com', '0', '', '', '', ''),
(139, 'Sebastian Coutinho', 'saby.coutinho@gmail.com', '0', '', '', '', ''),
(140, 'Saroj Tiwari', 'saroj_tiwari1969@yahoo.co.in', '0', '', '', '', ''),
(141, 'Rakhee', 'rakheesingh72@gmail.com', '0', '', '', '', ''),
(142, 'Geeta Mithaiwala', 'geetamithaiwala@gmail.com', '0', '', '', '', ''),
(143, 'Praveen Singh', 'munips77@gmail.com', '0', '', '', '', ''),
(144, 'Vasantha Kumari', 'dvasanthakumari@rediffmail.com', '0', '', '', '', ''),
(145, 'Arunim Das', 'arunim22@gmail.com', '0', '', '', '', ''),
(146, 'Sridhar Bellamkonda', 'sridharbellamkonda.lic@gmail.com', '0', '', '', '', ''),
(147, 'Shubham Agarwal', 'shubham8401@yahoo.co.in', '0', '', '', '', ''),
(148, 'Hema Goyal', 'hemasays237@gmail.com', '0', '', '', '', ''),
(149, 'Sanjeev', 'sanjeev@casgr.com', '0', '', '', '', ''),
(150, 'David Nair', 'david.nair@gmail.com', '0', '', '', '', ''),
(151, 'REETA SHAH', 'drreetacoach@gmail.com', '0', '', '', '', ''),
(152, 'Unnati Shah', 'uhshah19@gmail.com', '0', '', '', '', ''),
(153, 'Aarzoo Shah', 'aarzoorshah@gmail.com', '0', '', '', '', ''),
(154, 'Kamalneet Singh', 'kamalneetsingh88@gmail.com', '0', '', '', '', ''),
(155, 'Subhash', 'subashsequeira@gmail.com', '0', '', '', '', ''),
(156, 'IRFAN NOORANI', 'irfan5in@rediffmail.com', '0', '', '', '', ''),
(157, 'Smita Nair', 'dietician.smita@gmail.com', '0', '', '', '', ''),
(158, 'Gemini Dhar', 'gemini.dhar@gmail.com', '0', '', '', '', ''),
(159, 'Dinaaz', 'dinaz19@hotmail.com', '0', '', '', '', ''),
(160, 'Priya', 'priyatawde09@gmail.com', '0', '', '', '', ''),
(161, 'Iffat', 'iffat.khanam01@gmail.com', '0', '', '', '', ''),
(162, 'Dinesh', 'dinesh4finance@gmail.com', '0', '', '', '', ''),
(164, 'test2', 'test2', '0', '', '', '', ''),
(165, 'test3', 'test3', '0', '', '', '', ''),
(166, 'test', 'test', '0', '', '', '', ''),
(167, 'admin', 'admin@arfeenkhan.com', '0', '', '', '', ''),
(168, 'admin', 'admin@arfeenkhan.com', '0', '', '', '', ''),
(169, 'test', 'test@arfeenkhan.com', '0', '', '', '', ''),
(170, 'Ruchi Nilam Doctor', 'prowess.house@gmail.com', '1', 'anand sharma', 'anand@arfeenkhan.com', '+918882298643', '779609'),
(171, 'Rakhee', 'rakheesingh72@gmail.com', '0', '', '', '', ''),
(172, 'Meghana Gandhi', 'eduhorizon.meghana@gmail.com', '0', '', '', '', ''),
(173, 'Manali Pardeshi', 'manali.teli@gmail.com', '0', '', '', '', ''),
(174, 'Anvita Malhotra', 'anvitammalhotra@gmail.com', '0', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(7) NOT NULL DEFAULT '#3a87ad',
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `allDay` varchar(50) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `color`, `start`, `end`, `allDay`) VALUES
(1, 'Bc-Book chapters', '164', '#13b5f2', '2019-08-25 00:00:00', '2019-08-25 00:00:00', 'true'),
(2, 'P-Profile', '164', '#13b5f2', '2019-08-25 00:00:00', '2019-08-25 00:00:00', 'true'),
(3, 'M-Magazines', '164', '#13b5f2', '2019-08-25 00:00:00', '2019-08-25 00:00:00', 'true'),
(4, 'P-Profile', '166', '#13b5f2', '2019-10-28 00:00:00', '2019-10-28 00:00:00', 'true'),
(5, 'AP-Audio Products', '167', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(6, 'Bc-Book chapters', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(7, 'V-Videos', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(8, 'V-Videos', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(9, 'V-Videos', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(10, 'V-Videos', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(11, 'V-Videos', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(12, 'V-Videos', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(13, 'V-Videos', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(14, 'V-Videos', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(15, 'V-Videos', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(16, 'M-Magazines', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(17, 'M-Magazines', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(18, 'M-Magazines', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(19, 'M-Magazines', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(20, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(21, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(22, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(23, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(24, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(25, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(26, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(27, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(28, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(29, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(30, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(31, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(32, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(33, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(34, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(35, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(36, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(37, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(38, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(39, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(40, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(41, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(42, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(43, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-05 00:00:00', '2019-09-05 00:00:00', 'true'),
(44, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-05 00:00:00', '2019-09-05 00:00:00', 'true'),
(45, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-05 00:00:00', '2019-09-05 00:00:00', 'true'),
(46, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-04 00:00:00', '2019-09-04 00:00:00', 'true'),
(47, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-04 00:00:00', '2019-09-04 00:00:00', 'true'),
(48, 'Bc-Book chapters', '169', '#13b5f2', '2019-09-04 00:00:00', '2019-09-04 00:00:00', 'true'),
(49, 'B-Books', '169', '#13b5f2', '2019-08-31 00:00:00', '2019-08-31 00:00:00', 'true'),
(50, 'B-Books', '169', '#13b5f2', '2019-08-31 00:00:00', '2019-08-31 00:00:00', 'true'),
(51, 'B-Books', '169', '#13b5f2', '2019-08-31 00:00:00', '2019-08-31 00:00:00', 'true'),
(52, 'B-Books', '169', '#13b5f2', '2019-08-31 00:00:00', '2019-08-31 00:00:00', 'true'),
(53, 'B-Books', '169', '#13b5f2', '2019-08-31 00:00:00', '2019-08-31 00:00:00', 'true'),
(54, 'B-Books', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(55, 'V-Videos', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(56, 'V-Videos', '168', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(57, 'V-Videos', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(58, 'V-Videos', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(59, 'SMP-Social Media Posts', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(60, 'Bc-Book chapters', '169', '#13b5f2', '2019-08-31 00:00:00', '2019-08-31 00:00:00', 'true'),
(61, 'Bc-Book chapters', '169', '#13b5f2', '2019-08-30 00:00:00', '2019-08-30 00:00:00', 'true'),
(62, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(63, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(64, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(65, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(66, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(67, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(68, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(69, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(70, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(71, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(72, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(73, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(74, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(75, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(76, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(77, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(78, 'Bc-Book chapters', '168', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(79, 'P-Profile', '168', '#13b5f2', '2019-08-29 00:00:00', '2019-08-29 00:00:00', 'true'),
(80, 'V-Videos', '168', '#13b5f2', '2019-09-05 00:00:00', '2019-09-05 00:00:00', 'true'),
(81, 'V-Videos', '168', '#13b5f2', '2019-09-07 00:00:00', '2019-09-07 00:00:00', 'true'),
(82, 'FSE-Free Speaking Engagements', '169', '#13b5f2', '2019-09-07 00:00:00', '2019-09-07 00:00:00', 'true'),
(83, 'A-Articles', '169', '#13b5f2', '2019-09-17 00:00:00', '2019-09-17 00:00:00', 'true'),
(84, 'B-Books', '169', '#13b5f2', '2019-09-02 00:00:00', '2019-09-02 00:00:00', 'true'),
(86, 'P-Profile', '6', '#13b5f2', '2019-09-06 00:00:00', '2019-09-06 00:00:00', 'true'),
(87, 'B-Books', '76', '#13b5f2', '2019-09-10 00:00:00', '2019-09-10 00:00:00', 'true'),
(88, 'Bc-Book chapters', '76', '#13b5f2', '2019-09-11 00:00:00', '2019-09-11 00:00:00', 'true'),
(89, 'Bc-Book chapters', '76', '#13b5f2', '2019-09-30 00:00:00', '2019-09-30 00:00:00', 'true'),
(93, 'V-Videos', '116', '#13b5f2', '2019-09-11 00:00:00', '2019-09-11 00:00:00', 'true'),
(94, 'M-Magazines', '116', '#13b5f2', '2019-09-24 00:00:00', '2019-09-24 00:00:00', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `infodata`
--

CREATE TABLE `infodata` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ans` longtext NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infodata`
--

INSERT INTO `infodata` (`id`, `userid`, `ans`, `qid`) VALUES
(1, 163, 'zdfcxc', 1),
(2, 163, 'fvxv ', 2),
(3, 163, 'fdgdfg', 3),
(4, 163, 'dfgfdg', 4),
(5, 163, 'dfgdfgd', 5),
(6, 163, 'dfgdfg', 6),
(7, 163, 'dfg', 7),
(8, 163, 'dfgdfgdfg', 8),
(9, 163, 'dfgdfgdfg', 9),
(10, 163, 'dfgdfgdfg', 10),
(11, 163, 'dfgdfgdgdf', 11),
(12, 163, 'dfgdfgdfg', 12),
(13, 164, 'sdfsdf', 1),
(14, 164, 'dfgdfg', 2),
(15, 164, 'dfgdfgdfg', 3),
(16, 164, 'dfgdfgdfg', 4),
(17, 164, 'dfgdfgdg', 5),
(18, 164, 'dfgdfgdfg', 6),
(19, 164, 'dfgdfgdfg', 7),
(20, 164, 'dfgdfggf', 8),
(21, 164, 'dfgdfg', 9),
(22, 164, 'dfgdfg', 10),
(23, 164, 'dfgdfgdg', 11),
(24, 164, 'dgdfgdfg', 12),
(25, 166, 'kgkg', 1),
(26, 166, 'kkj', 2),
(27, 166, 'hkj', 3),
(28, 166, 'kj', 4),
(29, 166, 'ghkjg', 5),
(30, 166, 'kj', 6),
(31, 166, 'gkjg', 7),
(32, 166, 'kjg', 8),
(33, 166, 'kjg', 9),
(34, 166, 'kj', 10),
(35, 166, 'gkj', 11),
(36, 166, 'gkj', 12),
(37, 167, 'test', 1),
(38, 167, 'tete', 2),
(39, 167, 't', 3),
(40, 167, 't', 4),
(41, 167, 't', 5),
(42, 167, 't', 6),
(43, 167, 't', 7),
(44, 167, 't', 8),
(45, 167, 't', 9),
(46, 167, 't', 10),
(47, 167, 't', 11),
(48, 167, 't', 12),
(83, 169, 'vj', 11),
(82, 169, 'j', 10),
(81, 169, 'vvhj', 9),
(80, 169, 'vj', 8),
(79, 169, 'vj', 7),
(78, 169, 'vj', 6),
(77, 169, 'vj', 5),
(76, 169, 'vj', 4),
(75, 169, 'jvj', 3),
(74, 169, 'jv', 2),
(73, 169, 'sdfsdf', 1),
(107, 168, 'kg', 11),
(106, 168, 'kg', 10),
(105, 168, 'kg', 9),
(104, 168, 'kg', 8),
(103, 168, 'kjg', 7),
(102, 168, 'kjg', 6),
(101, 168, 'gkg', 5),
(100, 168, 'gkj', 4),
(99, 168, 'jkj', 3),
(98, 168, 'kjhk', 2),
(84, 169, 'v', 12),
(97, 168, 'zdfdsf', 1),
(108, 168, 'kjg', 12),
(109, 37, 'My story of changing my field of a doctor to coaching.\r\nI m comjn frm a small town n once didnt hav the confidence to order coffee in CCD and now I can tak in front of crowd of hundreds, denying and ignoring my passion and my calling.My program My life My choice\r\n My book - My life my choice.\r\nMy mission to coach 50 women in one year who hav stayed at home for a long time and now want to start workin at a job or as an entrepreneur. My mission to impact 10000 lives through my program, videos, book to com out of their shell and explore the world.\r\nMy client\'s testimonials', 1),
(110, 37, 'My life my choice\r\nComing out of shell\r\nWhat is stopping you\r\n', 2),
(111, 37, 'How high can u fly?\r\nWhat is stopping you?\r\nWhy is it important for you to come out?\r\nNow or Never\r\nWay to freedom\r\nFrom No to Yo!\r\nChoosing your work\r\nBuilding up yourself\r\nFacing whatever comes once u start\r\nJoy of Being You!', 3),
(112, 37, 'What is stopping you?\r\nWill my family support me if I work?\r\nDo I matter?\r\nWhat not to do aftr sebatical!\r\nWhy taking sebatical is the best thing u can ever do?\r\nHow sebatical will helo u to grow?\r\nWhat if I cant work like before?\r\nWhat am I teachin my kid if I am working?', 4),
(113, 37, 'Femina\r\nWomens era', 5),
(114, 37, 'Stories of women who started aftr leave and made a difference.\r\nPictures and drawings that giv strong msg to encourage women to follow their heart.', 6),
(115, 37, 'Inner Wheel Club\r\nSociety women\'s clubs.', 7),
(116, 37, 'How women are coming out of their shell and contributing i the society!', 8),
(117, 37, 'How high can u fly\r\nMeditation to become more confident\r\nMeditation for clarity\r\nTake the decision now.\r\n', 9),
(118, 37, 'How high can u fly?\r\nWhat is stopping you?\r\nWhy is it important for you to come out?\r\nNow or Never\r\nWay to freedom\r\nFrom No to Yo!\r\nChoosing your work\r\nBuilding up yourself\r\nFacing whatever comes once u start\r\nJoy of Being You!', 10),
(119, 37, 'Deepali Khedkar\r\nDr Kuljeet\r\nKavita Sangvhi\r\nPrita\r\nRitu', 11),
(120, 37, 'Sharing my work on fb, IMA etc', 12),
(134, 6, '1.Journey from Impossible to possible \r\n2.Think and Transform your life', 2),
(135, 6, '.', 3),
(136, 6, '.', 4),
(137, 6, '.', 5),
(138, 6, 'My transformational Quotes,YouTube videos ', 6),
(133, 6, '1.Software Engineer having 20 yrs of Experience\r\n2.Master of meditation last 24  years...travelled all over India mainly Telugu states\r\n3.Took thousands of Meditation sessions\r\n4.Impacted lacks of people\r\n5.Written 3000 Telugu quotes, 300 Youtube videos ', 1),
(139, 6, 'Technical colleges, Meditation centres,Clubs', 7),
(140, 6, '.', 8),
(141, 6, '.', 9),
(142, 6, '.', 10),
(143, 6, '.', 11),
(144, 6, '.', 12),
(145, 76, 'test', 1),
(146, 76, 'test', 2),
(147, 76, 'test', 3),
(148, 76, 'test', 4),
(149, 76, 'test', 5),
(150, 76, 'test', 6),
(151, 76, 'test', 7),
(152, 76, 'test', 8),
(153, 76, 'test', 9),
(154, 76, 'test', 10),
(155, 76, 'test', 11),
(156, 76, 'test', 12),
(191, 116, 'C', 11),
(189, 116, 'Ap', 9),
(190, 116, 'Vp', 10),
(188, 116, 'A\r\nA1\r\nA2', 8),
(187, 116, 'Fse', 7),
(186, 116, 'Smp', 6),
(185, 116, 'M', 5),
(184, 116, 'V', 4),
(183, 116, 'C', 3),
(182, 116, 'B', 2),
(181, 116, 'P', 1),
(192, 116, 'Msc', 12),
(193, 15, 'a', 1),
(194, 15, 'a', 2),
(195, 15, 'a', 3),
(196, 15, 'a', 4),
(197, 15, 'a', 5),
(198, 15, 'a', 6),
(199, 15, 'a', 7),
(200, 15, 'a', 8),
(201, 15, 'a', 9),
(202, 15, 'a', 10),
(203, 15, 'a', 11),
(204, 15, 'a', 12),
(205, 22, 'I am Narayan Rao worked for a navratna ONGC for 33 years.', 1),
(206, 22, 'Unleashing The GiantYou Within\r\nHow to Befriend Life?\r\nThe 7 Secrets Of Life No Monk Ever Told Anyone \r\nWhy You Do Not Have To Be A Monk To Understand Life\r\nGod Was So Intoxicated That He spilled All The Secrets To Me', 2),
(207, 22, 'XXXX', 3),
(208, 22, 'YYYY', 4),
(209, 22, 'ZZZZ', 5),
(210, 22, 'ZZZZ', 6),
(211, 22, 'AAAA', 7),
(212, 22, 'BBBB', 8),
(213, 22, 'CCCC', 9),
(214, 22, 'DDDDD', 10),
(215, 22, 'EEEEE', 11),
(216, 22, 'FFFFF', 12),
(217, 42, 'Jaya Shetty,writer-The white rose.Game changer-transformation within 90 days,Program-Inner speak Power to transform ,\r\nMy story is I completed CTF and my life changed for the better,My mission is to impact  at least 2000 lives in 5 years by my own transformation,published my book and am a successful coach', 1),
(218, 42, 'Inner Speak\r\nInner warrior', 2),
(219, 42, 'Journey begins,Issues-physical,mental,emotional,Desires.Breakthroughs,Consequences,Mandala completed', 3),
(220, 42, 'Happy times.Exploring situations,Experiences which are teachers,Lessons learned, ', 4),
(221, 42, 'local magazine of Pune-Citadel\r\nFemina,Life positive,Good living', 5),
(222, 42, 'encouraging posts,Thought provoking,Action taking,life,nature', 6),
(223, 42, 'Rotary Aundh\r\nMy classmates,', 7),
(224, 42, 'What my day looks like', 8),
(225, 42, 'life\'s lessons,resilience,Facing patriarchy', 9),
(226, 42, 'Strife and resilience,Being a single parent,My journey', 10),
(227, 42, 'Neelam-What is the takeaway for her children from her life', 11),
(228, 42, 'FB page,Instagram,Testimonials of friends ', 12),
(229, 131, 'My profile will consist of my career graph with some brief points, a few of my highs and lows, achievements and failures, significant learnings from the life\'s situations and my mission of how I wanted to be a coach to pass on my knowledge to the people I get in touch with , giving an avenue and guidance form my learnings.', 1),
(230, 131, 'The Leadership DNA\r\nThe other point of View\r\n', 2),
(231, 131, 'Yet to decide', 3),
(232, 131, 'You tube channel with conversation with varied Industry leaders on the expectations of the next generation of leaders, core values and performances.', 4),
(233, 131, 'Articles in the Hospitality Industry magazines specifically which will focus on the new generation, manager expectation and leadership gaps and how to cover them.', 5),
(234, 131, 'Will start blog on - The leadership DNA and the The Millennial Leader - which will be clearly articulate the expectations and the deliveries , the gaps in understanding and performance. Communication will be the main key ingredient in all of them.', 6),
(235, 131, 'College fests and seminars, All Ladies league, Rotary Clubs and BNI', 7),
(236, 131, 'Articles in the Hospitality Industry magazines specifically which will focus on the new generation, manager expectation and leadership gaps and how to cover them.', 8),
(237, 131, 'No audio products as of now, will try podcasts once the above is established', 9),
(238, 131, 'You tube channel - which will feature the conversations with varied Industry leaders.', 10),
(239, 131, 'Industry leaders and their take on leadership expecations from the new generation and the current gaps.', 11),
(240, 131, 'Will be planning the same shortly', 12),
(254, 75, 'Roar to Success; Raising a Champion; Seed to Succeed', 2),
(255, 75, 'The seed to succeed\r\nThe storm\r\nGone with the wind\r\nFinding the soil\r\nThe roots to wings\r\nFly High', 3),
(256, 75, 'series of stories to unleash the power within ', 4),
(257, 75, 'outlook; femina; ', 5),
(258, 75, 'posts on success stories', 6),
(259, 75, 'rotary; schools; other social clubs', 7),
(253, 75, '1.  I am an educator, author, entrepreneur, and a success coach in goal setting, self improvement, interpersonal skills, decision making, public speaking, and business. \r\n2. I believe  Roar of your Success can be heard only when you take a Decision and follow it up with persistent Action. I have fallen and have got up many a times in life, with severe set backs on personal and professional front. I believe when you cant see God, it means he is within you and guiding you through your actions, and God has always kept me on a mission to contribute in whatever way I can, so my set backs always appeared smaller than the satisfaction of adding value to someones life. \r\n3. Roar to Success -- helps you become successful in all areas of your life, not only your business and dreams, but also develop successfully in your personal level as well.  Who keeps you away from Success?  Its YOU...once you are sorted, everything around gets right. Your zeal to succeed in life, your urge to make it big, your desire to Roar and unleash the power within you, the feeling of being the person you always wanted to be. The Decision to convert the desired Dreams in a Reality, begins when you acknowledge the missing piece and seek guidance to fix the life puzzle. \r\n4. Mission --To teach what I learnt, to live life fearlessly, unleash the power within self, be the change I want to see around me. ', 1),
(260, 75, 'Seed to Succeed', 8),
(261, 75, 'Seed to Succeed series', 9),
(262, 75, 'Seed to Succeed series', 10),
(263, 75, 'kiran bedi; Arfeen Khan; Tony Robbins; Amitabh Bachhan ', 11),
(264, 75, 'endorsing a good brand', 12);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `ftime` int(11) NOT NULL DEFAULT '0',
  `ltime` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `username`, `password`, `start`, `end`, `active`, `ftime`, `ltime`) VALUES
(1, 'Susree Subhra Nanda', 'susree.subhra@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(2, 'Hemant nag', 'hnag74@yahoo.com', 'stf@2019', '2019-09-01 00:00:00', '2019-11-30 00:00:00', 1, 1, 0),
(3, 'Indira Pandit', 'ind.pandit@gmail.com', 'arfeenkhan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(4, 'Rekha Shah', 'rekhaashah27@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(5, 'M.L.Saboo', 'mlsflight@hotmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(6, 'Umamahesh Kummari', 'Mahesh.sabi@yahoo.co.in', 'Sabi@123', '2019-09-06 00:00:00', '2019-12-05 00:00:00', 1, 1, 1),
(7, 'Nilam Doctor', 'nilamdoc@gmail.com', 'stf@2019', '2019-08-28 00:00:00', '2019-11-26 00:00:00', 1, 1, 0),
(8, 'Ruchi Nilam Doctor', 'prowess.house@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(9, 'Preeti V Tolani', 'preetitolani03@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(10, 'Ajay Kumar Ambati', 'ajay.ambati@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(11, 'DEEPTI PARIHAR', 'minaydeep@gmail.com', 'stf@2019', '2019-09-15 00:00:00', '2019-12-14 00:00:00', 1, 1, 0),
(12, 'Apurva Desai', 'apu3108@gmail.com', 'stf@2019', '2019-09-02 00:00:00', '2019-12-01 00:00:00', 1, 1, 0),
(13, 'Sandeep Patel', 'sandeep.rns@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(14, 'Manoj Chhablani', 'manoj@webgility.com', 'stf@2019', '2019-09-02 00:00:00', '2019-12-01 00:00:00', 1, 1, 0),
(15, 'Satwinder Singh', 'blazing.sattu@gmail.com', 'sato16ah', '2019-09-09 00:00:00', '2019-12-08 00:00:00', 1, 1, 1),
(16, 'Joshika Sharma', 'joshikasharma9@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(17, 'Rahul Srivastava', 'rahul.srivastava0304@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(18, 'Kshitij Goel', 'kshitijgoel92@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(19, 'Manila kabra', 'manila.kabra@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(20, 'Luna Bose', 'brc.luna@gmail.com', 'stf@2019', '2020-11-02 00:00:00', '2021-01-31 00:00:00', 1, 1, 0),
(21, 'D.R. Singh', 'dsingh120460@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(22, 'NARAYAN SHANKAR RAO', 'nsrao43@gmail.com', 'stf@2019', '2019-09-11 00:00:00', '2019-12-10 00:00:00', 1, 1, 1),
(23, 'margaret xavier', 'anjana_23@yahoo.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(24, 'Ashwani Bhardwaj', 'ashwynbhardwaj@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(25, 'Gaurav maheshwari', 'entc.gaurav@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(26, 'Venkant Rama Subramaniam', 'venky1965@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(27, 'Juhi Saxena', 'saxenajuhi.js@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(28, 'Ketan Krishna', 'ketan.krishna@gmail.com', 'stf@2019', '2019-08-30 00:00:00', '2019-11-28 00:00:00', 1, 1, 0),
(29, 'Prita Dheer', 'Prita.dheer@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(30, 'Reetu Verma', 'verma.reetu@gmail.com', 'stf@2019', '2019-09-15 00:00:00', '2019-12-14 00:00:00', 1, 1, 0),
(31, 'Shika Saboo', 'shikhasaboo@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(32, 'Praful Karambelkar', 'prafulk2003@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(33, 'Astha Chandra', 'asthachandra@gmail.com', 'stf@2019', '2019-09-04 00:00:00', '2019-12-03 00:00:00', 1, 1, 0),
(34, 'Kavita Agarwal', 'ativak76@gmail.com', 'stf@2019', '2019-09-03 00:00:00', '2019-12-02 00:00:00', 1, 1, 0),
(35, 'Dr.Kuljeit Uppaal', 'ceo@krea.co.in', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(36, 'G.Praneet Raja', 'prajag@indianoil.in', 'stf@2019', '2019-09-09 00:00:00', '2019-12-08 00:00:00', 1, 1, 0),
(37, 'Urmi Thakker', 'drurmi87@gmail.com', 'stf@2019', '2019-08-30 00:00:00', '2019-11-28 00:00:00', 1, 1, 1),
(38, 'Praveen Sethi', 'sethipraveen2000@yahoo.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(39, 'Vikas Yadav', 'vikas.dcian@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(40, 'Rajkumar Bargah', 'rajkumarbargah@gmail.com', 'mihir2695', '2019-08-30 00:00:00', '2019-11-28 00:00:00', 1, 1, 0),
(41, 'Anannya Thomas', 'ams.anannya@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(42, 'Jaya Shetty', 'jivs25.shetty@gmail.com', 'stf@2019', '2019-09-14 00:00:00', '2019-12-13 00:00:00', 1, 1, 1),
(43, 'Benhur Rao', 'benhur_92@hotmail.com', 'stf@2019', '2019-08-28 00:00:00', '2019-11-26 00:00:00', 1, 1, 0),
(44, 'Sunjoy Podaar', 'sunwithjoy@gmail.com', 'stf@2019', '2019-09-15 00:00:00', '2019-12-14 00:00:00', 1, 1, 0),
(45, 'Praneeta', 'rjpraneeta@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(46, 'Pushpa Kallianpur', 'blush.push@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(47, 'Mushahid Ali', 'mushahidaleez@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(48, 'Neena George', 'georgeneena90@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(49, 'AKSHITA SANGHVI', 'akshita.sanghvi26@gmail.com', 'stf@2019', '2019-09-01 00:00:00', '2019-11-30 00:00:00', 1, 1, 0),
(50, 'Rohit Jethmal Bhandari', 'rohit_bhandari27@yahoo.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(51, 'Sarojkumar Girijashankar Tiwari', 'saroj_tiwari1969@yahoo.co.in', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(52, 'JITHENDER KUMAR', 'Jithender.kumar@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(53, 'Shweta Pandey', 'shwetapanday@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(54, 'Shahid Shaikh', 'shahid150@gmail.com', 'stf@2019', '2019-09-14 00:00:00', '2019-12-13 00:00:00', 1, 1, 0),
(55, 'Payal Vani', 'payalvani444@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(56, 'Krunal Shah', 'shahkrunala@gmail.com', 'Mahavir@9', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0),
(57, 'Aishwarya', 'meetaishwaryagoel@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(58, 'Ram Anand', 'abhiramsinghal@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(59, 'Shahnwaz Alam', 'shahnwaz2010@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(60, 'Mohan sutradhar', 'sutradhar.mohan@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(61, 'Sapna Khandewal', 'khandelwal.sapna@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(62, 'Josh Kalpesh', 'joshkalpesh@yahoo.com', 'Open1@34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(63, 'Suman S D', 'Sumansd@hotmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(64, 'Dilvinder Singh Taluja', 'contact.dilvinder@gmail.com', 'Lucky1God19', '2019-09-20 00:00:00', '2019-12-19 00:00:00', 1, 1, 0),
(65, 'Steffy Gregory Rozario', 'steffyjrozario@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(66, 'Shadab Khan', 'shadab211@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(67, 'Virr saxenaa', 'Virr_saxenaa@hotmail.com', 'stf@2019', '2019-09-07 00:00:00', '2019-12-06 00:00:00', 1, 1, 0),
(68, 'Vinay Acharya', 'acharyavinay@yahoo.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(69, 'Shilpa singh', 'shilpaneemasingh@gmail.com', 'stf@2019', '2019-12-03 00:00:00', '2020-03-02 00:00:00', 1, 1, 0),
(70, 'Nisha Verma', 'vermanisha@msn.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(71, 'Anannya Bhattacharjee', 'anannya48@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(72, 'Mamta Chandani', 'mamtachandani66@gmail.com', 'stf@2019', '2019-09-09 00:00:00', '2019-12-08 00:00:00', 1, 1, 0),
(73, 'Mohan Lal Singhal', 'Singhal.mohanlal@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(74, 'SHRUTI DUTT', 'shrutiddutt@gmail.com', 'stf@2019', '2019-09-01 00:00:00', '2019-11-30 00:00:00', 1, 1, 0),
(75, 'Varsha Shah', 'rkcmyschool@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 1),
(76, 'Seema', 'seemaranaware@yahoo.com', 'stf@2019', '2019-09-01 00:00:00', '2019-11-30 00:00:00', 1, 1, 1),
(77, 'Mohsin Chand Mulani', 'mohsinmulani17@rediffmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(78, 'Srikumar Pillai', 'spillai@familyvision.info', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(79, 'Shashwati Pillutla', 'sidhulinux@yahoo.co.in', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(80, 'Siddhartha Pillutla', 'sidhulinux@yahoo.co.in', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(81, 'Sapna Agarwal', 'agarwalsapna95@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(82, 'Sangeeeta', 'sangeetasharma001@gmail.com', 'stf@2019', '2019-11-30 00:00:00', '2020-02-28 00:00:00', 1, 1, 0),
(83, 'Nina Sanyal', 'nnsanyal3@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(84, 'Divyadeep Kaur', 'divyadeepbhatia58@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(85, 'Pratyusha', 'Pratyusha.mangalagiri@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(86, 'Gurudath Kamath', 'gurudathkamath14@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(87, 'Aashish Gautam', 'lounge.gunsnroses@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(88, 'Manish Monga', 'man_mon@hotmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(89, 'Santosh', 'santosh_kaware@rediffmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(90, 'Anjali Ahuja', 'anjalipersonal@hotmail.com', 'stf@2019', '2019-09-10 00:00:00', '2019-12-09 00:00:00', 1, 1, 0),
(91, 'Madhu Punjabi', 'madhu_1310@ymail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(92, 'Chitra Sen', 'chitrapips@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(93, 'Shika Nagar', 'myra.hope.faith@gmail.com', 'stf@2019', '2019-09-07 00:00:00', '2019-12-06 00:00:00', 1, 1, 0),
(94, 'Suchitra Nair', 'sdn2130@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(95, 'Dr M R S Raju', 'dr.mudduluri@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, 0),
(96, 'Dr. Rekha Desai', 'kalakruti19@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(97, 'Anurag Jambhulkar', 'anuragjambhulkar@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(98, 'Rudrakshi Warikoo', 'rudrakshi_warikoo@hotmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(99, 'Sanjay Govind Anand', 'anand_sanjay1@yahoo.co.in', 'Siddharth90$', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(100, 'Sangeeta Patil.', 'sangeeta.patil@hotmail.ca', 'stf@2019', '2019-09-03 00:00:00', '2019-12-02 00:00:00', 1, 1, 0),
(101, 'Ashish Pal', 'ashishpal2702@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(102, 'Neelam Mankar', 'neelam_19m@rediffmail.com', 'stf@2019', '2019-09-05 00:00:00', '2019-12-04 00:00:00', 1, 1, 0),
(103, 'Sreeti Amonkar', 'sreetia@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(104, 'Bhijal Kabra', 'kabra.bijal@gmail.com', 'stf@2019', '2019-09-08 00:00:00', '2019-12-07 00:00:00', 1, 1, 0),
(105, 'Veena Sinha', 'sinhaveenacs@gmail.com', 'Mylife12*', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(106, 'Roopa', 'roopa.b.a@gmail.com', 'stf@2019', '2019-08-30 00:00:00', '2019-11-28 00:00:00', 1, 1, 0),
(107, 'Maria Pontes', 'mariap@niit.com', 'stf@2019', '2019-08-30 00:00:00', '2019-11-28 00:00:00', 1, 1, 0),
(108, 'Craig Goodwin', 'craigkgoodwin@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(109, 'MAMTA SAIGAL', 'mamta10@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(110, 'Kriti Kulshresha', 'kritik19@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(111, 'Sanjay Jaiswal', 'sanjayjaiswal911@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(112, 'Mohammed Mujahid', 'mohammed@mujahid.in', 'stf@2019', '2020-08-10 00:00:00', '2020-11-08 00:00:00', 1, 1, 0),
(113, 'Muneer Al busaidi', 'muneer@muneer.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(114, 'Nivedita Tiwari', 'nivedita1220@gmail.com', 'stf@2019', '2019-09-03 00:00:00', '2019-12-02 00:00:00', 1, 1, 0),
(115, 'Meghana Gandhi', 'eduhorizon.meghana@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(116, 'Swapnil Pardeshi', 'gripel@gmail.com', 'stf@2019', '2019-09-11 00:00:00', '2019-12-10 00:00:00', 1, 1, 1),
(118, 'Suchitra Pareekh', 'spareekh@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(119, 'Archana Seth', 'arc.seth@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(120, 'Surili Gupta', 'suriligupta@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(121, 'Ajeet George', 'ajeetgeorge@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(122, 'Jitendra', 'jitendrarajendragupta@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(123, 'Vanita Singh', 'vanitasingh825@gmail.com', 'stf@2019', '2019-09-02 00:00:00', '2019-12-01 00:00:00', 1, 1, 0),
(124, 'Mehul shanghvi', 'Mehulshanghvi42@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(125, 'Deepali narula', 'deepalinarula18@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(126, 'Surjeet Singh', 'smileindia66@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(127, 'Sanjana', 'sanjana.jhunjhunwala@hotmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(128, 'Dripta Sarkar', 'driptasarkar500@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(129, 'Charu Ahuja', 'charug1820@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(130, 'Shradha Shetty', 'shettyshradhacounselor@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(131, 'Shipra Kaul', 'sumbly.shipra@gmail.com', 'stf@2019', '2019-09-03 00:00:00', '2019-12-02 00:00:00', 1, 1, 1),
(132, 'Neelu Juneja', 'pam_juneja@yahoo.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(133, 'Anvita Malhotra', 'anvitamalhotra@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(134, 'Farah Khan Pethe', 'farah3151@yahoo.co.in', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(135, 'D Venkateswara Reddy', 'knowvenki@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(136, 'Rashmi Shekhar', 'dolly347@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(137, 'Kalyan s Hatti', 'kalyanhatti@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(138, 'Chitranjan Kumar', 'chitranjankumarsingh@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(139, 'Sebastian Coutinho', 'saby.coutinho@gmail.com', 'Impact@123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(140, 'Saroj Tiwari', 'saroj_tiwari1969@yahoo.co.in', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(141, 'Rakhee', 'singhirakhee1@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(142, 'Geeta Mithaiwala', 'geetamithaiwala@gmail.com', 'stf@2019', '2019-09-15 00:00:00', '2019-12-14 00:00:00', 1, 1, 0),
(143, 'Praveen Singh', 'munips77@gmail.com', 'stf123@', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(144, 'Vasantha Kumari', 'dvasanthakumari@rediffmail.com', 'stf@2019', '2019-09-11 00:00:00', '2019-12-10 00:00:00', 1, 1, 0),
(145, 'Arunim Das', 'arunim22@gmail.com', 'stf@2019', '2019-08-29 00:00:00', '2019-11-27 00:00:00', 1, 1, 0),
(146, 'Sridhar Bellamkonda', 'sridharbellamkonda.lic@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(147, 'Shubham Agarwal', 'shubham8401@yahoo.co.in', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(148, 'Hema Goyal', 'hemasays237@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(149, 'Sanjeev', 'sanjeev@casgr.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(150, 'David Nair', 'david.nair@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(151, 'REETA SHAH', 'drreetacoach@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(152, 'Unnati Shah', 'uhshah19@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(153, 'Aarzoo Shah', 'aarzoorshah@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(154, 'Kamalneet Singh', 'kamalneetsingh88@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(155, 'Subhash', 'subashsequeira@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(156, 'IRFAN NOORANI', 'irfan5in@rediffmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(157, 'Smita Nair', 'dietician.smita@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(158, 'Gemini Dhar', 'gemini.dhar@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(159, 'Dinaaz', 'dinaz19@hotmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(160, 'Priya', 'priyatawde09@gmail.com', 'priya@7179', '2019-09-01 00:00:00', '2019-11-30 00:00:00', 1, 1, 0),
(161, 'Iffat', 'iffat.khanam01@gmail.com', 'stf@2019', '2019-09-03 00:00:00', '2019-12-02 00:00:00', 1, 1, 0),
(162, 'Dinesh', 'dinesh4finance@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(164, 'test2', 'test2', 'stf@2019', '2019-08-25 00:00:00', '2019-11-23 00:00:00', 1, 1, 1),
(165, 'test3', 'test3', 'stf@2019', '2019-08-27 00:00:00', '2019-11-25 00:00:00', 1, 1, 0),
(166, 'test', 'test', 'stf@2019', '2019-08-27 00:00:00', '2019-11-25 00:00:00', 1, 1, 1),
(167, 'admin', 'admin@arfeenkhan.com', 'stf@2019', '2019-08-29 00:00:00', '2019-11-27 00:00:00', 1, 1, 1),
(168, 'admin', 'admin@arfeenkhan.com', 'admin', '2019-08-30 00:00:00', '2019-11-28 00:00:00', 1, 1, 1),
(169, 'test', 'test@arfeenkhan.com', '123456', '2019-08-30 00:00:00', '2019-11-28 00:00:00', 1, 1, 1),
(170, 'Ruchi Nilam Doctor', 'prowess.house@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(172, 'Meghana Gandhi', 'eduhorizon.meghana@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(173, 'Manali Pardeshi', 'manali.teli@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0),
(174, 'Anvita Malhotra', 'anvitammalhotra@gmail.com', 'stf@2019', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`) VALUES
(1, 'Write down your ETR. This will consist of your story in short. It includes the number of years you\'ve been in this profession, places on earth you\'ve visited, number of people you\'ve impacted, how you started and what you do now. Write numbers and if you do not have that much experience, just write down what you would like to do in future. What kind of story would you like to create'),
(2, 'What is your mission? What kind of transformation do you expect the world to experience? Think big, think global, think like a superman / superwoman. How many people do you want to impact over the next 5 years? Be ambitious.'),
(3, 'Write about your program, what is the outcome of your program, what will people learn, the duration, the benefits, etc.\r\n\r\n'),
(4, 'Write down testimonials below that you got from people. Ordinary people or celebrities, write one or two lines of each testimonial you got along with the name of the person who gave the testimonial.\r\n\r\n'),
(5, 'Mention the names of books that you have written or you are planning to write. Also mention names of any products you have created or are planning to create. Pictures of these things can be uploaded as instructed below.\r\n\r\n'),
(6, 'Write down names of corporate companies you have worked with. If you have not worked with any corporates, leave it blank.\r\n\r\n'),
(7, 'Upload your high resolution photographs on dropbox and add the dropbox link above.\r\n\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin-data`
--
ALTER TABLE `admin-data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answr_profileb`
--
ALTER TABLE `answr_profileb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coachassign`
--
ALTER TABLE `coachassign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infodata`
--
ALTER TABLE `infodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin-data`
--
ALTER TABLE `admin-data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `answr_profileb`
--
ALTER TABLE `answr_profileb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `coachassign`
--
ALTER TABLE `coachassign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `infodata`
--
ALTER TABLE `infodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
