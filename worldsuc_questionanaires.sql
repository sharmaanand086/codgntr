-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2019 at 12:52 PM
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
-- Database: `worldsuc_questionanaires`
--

-- --------------------------------------------------------

--
-- Table structure for table `calander`
--

CREATE TABLE `calander` (
  `id` int(11) NOT NULL,
  `coach_id` int(100) NOT NULL,
  `date` date NOT NULL,
  `dateid` int(100) NOT NULL,
  `apmtime` varchar(200) NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calander`
--

INSERT INTO `calander` (`id`, `coach_id`, `date`, `dateid`, `apmtime`, `time`) VALUES
(1, 1, '2019-09-19', 1, '6:00pm - 6:15pm', '06:00:00'),
(2, 1, '2019-09-19', 1, '6:15pm - 6:30pm', '06:15:00'),
(3, 1, '2019-09-19', 1, '6:30pm - 6:45pm', '06:30:00'),
(4, 1, '2019-09-19', 1, '6:45pm - 7:00pm', '06:45:00'),
(5, 1, '2019-09-19', 1, '7:00pm - 7:15pm', '07:00:00'),
(6, 1, '2019-09-19', 1, '7:15pm - 7:30pm', '07:15:00'),
(7, 1, '2019-09-19', 1, '7:30pm - 7:45pm', '07:30:00'),
(8, 1, '2019-09-19', 1, '7:45pm - 8:00pm', '07:45:00'),
(9, 1, '2019-09-20', 2, '11:00am - 11:15am', '11:00:00'),
(10, 1, '2019-09-20', 2, '11:15am - 11:30am', '11:15:00'),
(11, 1, '2019-09-20', 2, '11:30am - 11:45pm', '11:30:00'),
(12, 1, '2019-09-20', 2, '11:45am - 12:00pm', '11:45:00'),
(13, 1, '2019-09-20', 2, '12:00pm - 12:15pm', '12:00:00'),
(14, 1, '2019-09-20', 2, '12:15pm - 12:30pm', '12:15:00'),
(15, 1, '2019-09-20', 2, '12:30pm - 12:45pm', '12:30:00'),
(16, 1, '2019-09-20', 2, '12:45pm - 1:00pm', '12:45:00'),
(17, 1, '2019-09-20', 2, '1:00pm - 1:15pm', '01:00:00'),
(18, 1, '2019-09-20', 2, '1:15pm - 1:30pm', '01:15:00'),
(19, 1, '2019-09-20', 2, '1:30pm - 1:45pm', '01:30:00'),
(20, 1, '2019-09-20', 2, '1:45pm - 2:00pm', '01:45:00'),
(21, 1, '2019-09-20', 2, '2:00pm - 2:15pm', '02:00:00'),
(22, 1, '2019-09-20', 2, '2:15pm - 2:30pm', '02:15:00'),
(23, 1, '2019-09-20', 2, '2:30pm - 2:45pm', '02:30:00'),
(24, 1, '2019-09-20', 2, '2:45pm - 3:00pm', '02:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `client_registrations`
--

CREATE TABLE `client_registrations` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `session_date` varchar(200) NOT NULL,
  `session_time` varchar(200) NOT NULL,
  `coach_id` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` int(11) NOT NULL,
  `coach_id` int(100) NOT NULL,
  `coach_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `coach_id`, `coach_name`) VALUES
(1, 1, 'Mazhar');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires_info`
--

CREATE TABLE `questionnaires_info` (
  `title` varchar(64) NOT NULL,
  `min_desc` text NOT NULL,
  `date` date NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `per_page` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `minutes` int(11) NOT NULL,
  `seconds` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionnaires_info`
--

INSERT INTO `questionnaires_info` (`title`, `min_desc`, `date`, `questionnaire_id`, `per_page`, `status`, `minutes`, `seconds`) VALUES
('test 2', 'ertgertgertgerg', '2015-02-09', 24, 3, 1, 0, 0),
('Q1', 'q1 q2 q3', '2015-02-09', 26, 3, 1, 0, 0),
('Discover Your Mindset Blueprint', 'Every\nstatement\nmust\nbe\ngraded\nas:\n“No,”\n“Partly,”\nor\n“Yes.”\nHonestly\ngrade\neach\nstatement:\n“Yes,”\nfor\n“yes,\nthis\nis\nreally\nme.”\n“Partly”\nfor\nthis\nis\npartly\nhow\nI\nam,”\nand\n“No”\nfor\n“This\nis\nprobably\nnot\nhow\nI\nam.”\n(If\nyou\ndon’t\nknow\nwhether\nit\napplies,\nit’s\nusually\nbest\nto\ncheck\n“no.”)', '2015-02-12', 27, 10, 0, 0, 0),
('Xxx', 'dsfsdfdf', '2015-02-24', 28, 5, 1, 0, 0),
('Test', 'sssssssssssss', '2015-02-24', 30, 5, 1, 0, 15),
(' Copy Test', 'sssssssssssss', '2015-02-24', 31, 5, 1, 0, 0),
(' Copy Call of Destiny', 'Every\nstatement\nmust\nbe\ngraded\nas:\n“No,”\n“Partly,”\nor\n“Yes.”\nHonestly\ngrade\neach\nstatement:\n“Yes,”\nfor\n“yes,\nthis\nis\nreally\nme.”\n“Partly”\nfor\nthis\nis\npartly\nhow\nI\nam,”\nand\n“No”\nfor\n“This\nis\nprobably\nnot\nhow\nI\nam.”\n(If\nyou\ndon’t\nknow\nwhether\nit\napplies,\nit’s\nusually\nbest\nto\ncheck\n“no.”)', '2015-03-18', 33, 10, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions_info`
--

CREATE TABLE `questions_info` (
  `question_id` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `date` date NOT NULL,
  `ordering` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions_info`
--

INSERT INTO `questions_info` (`question_id`, `questionnaire_id`, `question`, `date`, `ordering`, `category_id`) VALUES
(101, 24, 's3www44ddfd', '2015-02-09', 5, 0),
(102, 24, 's3444', '2015-02-09', 3, 0),
(103, 26, 's1', '2015-02-09', 0, 0),
(105, 26, 's3', '2015-02-09', 0, 0),
(106, 26, 's5', '2015-02-09', 0, 0),
(107, 24, 'test  1', '2015-02-11', 0, 0),
(110, 26, 's3', '2015-02-12', 0, 0),
(111, 26, 's3423423', '2015-02-12', 0, 0),
(112, 26, 's4', '2015-02-12', 0, 0),
(114, 27, 'People are impressed by me', '2015-02-12', 1, 6),
(115, 27, 'Feeling that I “belong” is important to me', '2015-02-12', 2, 3),
(116, 27, 'I need to feel grounded', '2015-02-12', 3, 4),
(117, 27, 'I don’t mind taking risks', '2015-02-12', 4, 5),
(118, 27, 'I don’t fear change', '2015-02-12', 5, 5),
(119, 27, 'A failure is not a failure if you keep trying', '2015-02-12', 6, 2),
(120, 27, 'I believe in giving back', '2015-02-12', 7, 1),
(121, 27, 'I’m good at taking care of people', '2015-02-12', 8, 3),
(122, 27, 'I often worry about what people are saying about me', '2015-02-12', 9, 6),
(123, 27, 'I like to have as much stability in my life as possible', '2015-02-12', 10, 4),
(124, 27, 'It’s important to contribute to your community', '2015-02-12', 11, 1),
(125, 27, 'I like to develop new ideas and projects', '2015-02-12', 12, 5),
(126, 27, 'I’m security conscious', '2015-02-12', 13, 4),
(127, 27, 'I like to be an example to others', '2015-02-12', 14, 1),
(128, 27, 'I’m competitive', '2015-02-12', 15, 6),
(129, 27, 'I hate the feeling of boredom', '2015-02-12', 16, 5),
(130, 27, 'I know how to make connections with people', '2015-02-12', 17, 3),
(131, 27, 'I constantly aspire to improve', '2015-02-12', 18, 2),
(132, 27, 'Danger is never exciting to me', '2015-02-12', 19, 4),
(133, 27, 'In most close relationships I’m usually the giver', '2015-02-12', 20, 3),
(134, 27, 'There is always something new to be learned', '2015-02-12', 21, 2),
(135, 27, 'I need to feel fulfilled', '2015-02-12', 22, 1),
(136, 27, 'I frequently evaluate myself', '2015-02-12', 23, 6),
(137, 27, 'I like for things to be predictable', '2015-02-12', 24, 4),
(138, 27, 'I am more loving than most people', '2015-02-12', 25, 3),
(139, 27, 'Recognition is very important to me', '2015-02-12', 26, 6),
(140, 27, 'I like the feeling of exertion', '2015-02-12', 27, 5),
(141, 27, 'I’m very careful of not over spending', '2015-02-12', 28, 4),
(142, 27, 'Education is important to me', '2015-02-12', 29, 2),
(143, 27, 'I’m a leader', '2015-02-12', 30, 1),
(144, 27, 'I’m always looking for new experiences', '2015-02-12', 31, 5),
(145, 27, 'I sometimes over extend myself in trying to help people', '2015-02-12', 32, 3),
(146, 27, 'My routines and habits are important to me', '2015-02-12', 33, 4),
(147, 27, 'I take pride in who I am', '2015-02-12', 34, 6),
(148, 27, 'I like how learning something new changes my perspective', '2015-02-12', 35, 2),
(149, 27, 'Sometimes the most important work is not what you’re being paid for', '2015-02-12', 36, 1),
(150, 27, 'I’m not an adventurous person', '2015-02-12', 37, 4),
(151, 27, 'No one would say that I’m selfish', '2015-02-12', 38, 3),
(152, 27, 'I tend to spend beyond my limits', '2015-02-12', 39, 5),
(153, 27, 'I like to feel important', '2015-02-12', 40, 6),
(154, 27, 'Every failure is a learning experience', '2015-02-12', 41, 2),
(155, 27, 'I like to learn in order to teach what I learn', '2015-02-12', 42, 1),
(156, 27, 'I seek unity in my relationship', '2015-02-12', 43, 3),
(157, 27, 'I like to make a difference', '2015-02-12', 44, 1),
(158, 27, 'I refrain from acting when I’m not sure about all the consequences of my actions', '2015-02-12', 45, 4),
(159, 27, 'I suffer when I feel blocked', '2015-02-12', 46, 2),
(160, 27, 'I enjoy suspense', '2015-02-12', 47, 5),
(161, 27, 'Prestige is very important to me', '2015-02-12', 48, 6),
(162, 27, 'I’m a romantic', '2015-02-12', 49, 3),
(163, 27, 'I’m constantly learning', '2015-02-12', 50, 2),
(164, 27, 'Giving is more important to me than receiving', '2015-02-12', 51, 3),
(165, 27, 'I like to be Number 1', '2015-02-12', 52, 6),
(166, 27, 'I hate taking risks of any kind', '2015-02-12', 53, 4),
(167, 27, 'I like to constantly develop myself', '2015-02-12', 54, 2),
(168, 27, 'I like to give my time and energy to good causes', '2015-02-12', 55, 1),
(169, 27, 'I like to be admired by others', '2015-02-12', 56, 6),
(170, 27, 'I’m proud of my ability to learn new things', '2015-02-12', 57, 2),
(171, 27, 'We are here to make this world a better place', '2015-02-12', 58, 1),
(172, 27, 'I like to grow and develop in different areas', '2015-02-12', 59, 2),
(173, 27, 'Personal relationships are the most important thing in my life', '2015-02-12', 60, 3),
(174, 27, 'Sometimes I can be intimidating', '2015-02-12', 61, 6),
(175, 27, 'I often look for new forms of entertainment', '2015-02-12', 62, 5),
(176, 27, 'I’m concerned about anything that might be risky', '2015-02-12', 63, 4),
(177, 27, 'Being fulfilled in your work is more important than being admired', '2015-02-12', 64, 1),
(178, 27, 'I strive to improve my skills', '2015-02-12', 65, 2),
(179, 27, 'I get close to people by being generous with money, time and energy', '2015-02-12', 66, 3),
(180, 27, 'I like to think carefully before I go into action', '2015-02-12', 67, 4),
(181, 27, 'Sometimes I like the thrill of experiencing fear', '2015-02-12', 68, 5),
(182, 27, 'I need to feel respected', '2015-02-12', 69, 6),
(183, 27, 'When we stop growing, we die', '2015-02-12', 70, 2),
(184, 27, 'The feeling of togetherness is important to me', '2015-02-12', 71, 3),
(185, 27, 'For life to make sense, you have to leave a mark in the world', '2015-02-12', 72, 1),
(186, 27, 'Feeling comfortable at all times is important to me', '2015-02-12', 73, 4),
(187, 27, 'I enjoy being involved in many different activities', '2015-02-12', 74, 5),
(188, 27, 'I’m always comparing myself to others in terms of success', '2015-02-12', 75, 6),
(189, 27, 'I need to have passion in my relationship', '2015-02-12', 76, 3),
(190, 27, 'If I’m not contributing to others, my life is meaningless', '2015-02-12', 77, 1),
(191, 27, 'When making a decision, I often think about what might be more enjoyable', '2015-02-12', 78, 5),
(192, 27, 'I can’t stand to feel stagnant', '2015-02-12', 79, 2),
(193, 27, 'I need to feel as safe as possible at all times', '2015-02-12', 80, 4),
(194, 27, 'If I commit to something, I worry that something better might come along', '2015-02-12', 81, 5),
(195, 27, 'I never want to be seen as a loser', '2015-02-12', 82, 6),
(196, 27, 'I don’t care about having much stability in my life', '2015-02-12', 83, 5),
(197, 27, 'I have a mission', '2015-02-12', 84, 1),
(198, 28, 's1', '2015-02-24', 1, 1),
(199, 28, 's2', '2015-02-24', 1, 2),
(200, 28, 's3', '2015-02-24', 1, 3),
(201, 28, 's1', '2015-02-24', 2, 1),
(202, 28, 's2', '2015-02-24', 2, 2),
(203, 28, 's3', '2015-02-24', 2, 3),
(204, 28, 's2', '2015-02-24', 3, 2),
(205, 28, 's3', '2015-02-24', 3, 4),
(206, 28, 's1', '2015-02-24', 4, 1),
(207, 28, 's2', '2015-02-24', 4, 2),
(208, 28, 's5', '2015-02-24', 4, 1),
(209, 28, 's6', '2015-02-24', 4, 1),
(210, 28, 's7', '2015-02-24', 4, 3),
(215, 30, 'g1', '2015-02-24', 1, 2),
(216, 30, 'l1', '2015-02-24', 1, 3),
(217, 30, 'l2', '2015-02-24', 1, 3),
(218, 31, 's1', '2015-02-24', 1, 0),
(219, 31, 's3', '2015-02-24', 1, 0),
(220, 31, 's322', '2015-02-24', 1, 0),
(305, 33, 'People are impressed by me', '2015-03-18', 1, 6),
(306, 33, 'Feeling that I “belong” is important to me', '2015-03-18', 2, 3),
(307, 33, 'I need to feel grounded', '2015-03-18', 3, 4),
(308, 33, 'I don’t mind taking risks', '2015-03-18', 4, 5),
(309, 33, 'I don’t fear change', '2015-03-18', 5, 5),
(310, 33, 'A failure is not a failure if you keep trying', '2015-03-18', 6, 2),
(311, 33, 'I believe in giving back', '2015-03-18', 7, 1),
(312, 33, 'I’m good at taking care of people', '2015-03-18', 8, 3),
(313, 33, 'I often worry about what people are saying about me', '2015-03-18', 9, 6),
(314, 33, 'I like to have as much stability in my life as possible', '2015-03-18', 10, 4),
(315, 33, 'It’s important to contribute to your community', '2015-03-18', 11, 1),
(316, 33, 'I like to develop new ideas and projects', '2015-03-18', 12, 5),
(317, 33, 'I’m security conscious', '2015-03-18', 13, 4),
(318, 33, 'I like to be an example to others', '2015-03-18', 14, 1),
(319, 33, 'I’m competitive', '2015-03-18', 15, 6),
(320, 33, 'I hate the feeling of boredom', '2015-03-18', 16, 5),
(321, 33, 'I know how to make connections with people', '2015-03-18', 17, 3),
(322, 33, 'I constantly aspire to improve', '2015-03-18', 18, 2),
(323, 33, 'Danger is never exciting to me', '2015-03-18', 19, 4),
(324, 33, 'In most close relationships I’m usually the giver', '2015-03-18', 20, 3),
(325, 33, 'There is always something new to be learned', '2015-03-18', 21, 2),
(326, 33, 'I need to feel fulfilled', '2015-03-18', 22, 1),
(327, 33, 'I frequently evaluate myself', '2015-03-18', 23, 6),
(328, 33, 'I like for things to be predictable', '2015-03-18', 24, 4),
(329, 33, 'I am more loving than most people', '2015-03-18', 25, 3),
(330, 33, 'Recognition is very important to me', '2015-03-18', 26, 6),
(331, 33, 'I like the feeling of exertion', '2015-03-18', 27, 5),
(332, 33, 'I’m very careful of not over spending', '2015-03-18', 28, 4),
(333, 33, 'Education is important to me', '2015-03-18', 29, 2),
(334, 33, 'I’m a leader', '2015-03-18', 30, 1),
(335, 33, 'I’m always looking for new experiences', '2015-03-18', 31, 5),
(336, 33, 'I sometimes over extend myself in trying to help people', '2015-03-18', 32, 3),
(337, 33, 'My routines and habits are important to me', '2015-03-18', 33, 4),
(338, 33, 'I take pride in who I am', '2015-03-18', 34, 6),
(339, 33, 'I like how learning something new changes my perspective', '2015-03-18', 35, 2),
(340, 33, 'Sometimes the most important work is not what you’re being paid for', '2015-03-18', 36, 1),
(341, 33, 'I’m not an adventurous person', '2015-03-18', 37, 4),
(342, 33, 'No one would say that I’m selfish', '2015-03-18', 38, 3),
(343, 33, 'I tend to spend beyond my limits', '2015-03-18', 39, 5),
(344, 33, 'I like to feel important', '2015-03-18', 40, 6),
(345, 33, 'Every failure is a learning experience', '2015-03-18', 41, 2),
(346, 33, 'I like to learn in order to teach what I learn', '2015-03-18', 42, 1),
(347, 33, 'I seek unity in my relationship', '2015-03-18', 43, 3),
(348, 33, 'I like to make a difference', '2015-03-18', 44, 1),
(349, 33, 'I refrain from acting when I’m not sure about all the consequences of my actions', '2015-03-18', 45, 4),
(350, 33, 'I suffer when I feel blocked', '2015-03-18', 46, 2),
(351, 33, 'I enjoy suspense', '2015-03-18', 47, 5),
(352, 33, 'Prestige is very important to me', '2015-03-18', 48, 6),
(353, 33, 'I’m a romantic', '2015-03-18', 49, 3),
(354, 33, 'I’m constantly learning', '2015-03-18', 50, 2),
(355, 33, 'Giving is more important to me than receiving', '2015-03-18', 51, 3),
(356, 33, 'I like to be Number 1', '2015-03-18', 52, 6),
(357, 33, 'I hate taking risks of any kind', '2015-03-18', 53, 4),
(358, 33, 'I like to constantly develop myself', '2015-03-18', 54, 2),
(359, 33, 'I like to give my time and energy to good causes', '2015-03-18', 55, 1),
(360, 33, 'I like to be admired by others', '2015-03-18', 56, 6),
(361, 33, 'I’m proud of my ability to learn new things', '2015-03-18', 57, 2),
(362, 33, 'We are here to make this world a better place', '2015-03-18', 58, 1),
(363, 33, 'I like to grow and develop in different areas', '2015-03-18', 59, 2),
(364, 33, 'Personal relationships are the most important thing in my life', '2015-03-18', 60, 3),
(365, 33, 'Sometimes I can be intimidating', '2015-03-18', 61, 6),
(366, 33, 'I often look for new forms of entertainment', '2015-03-18', 62, 5),
(367, 33, 'I’m concerned about anything that might be risky', '2015-03-18', 63, 4),
(368, 33, 'Being fulfilled in your work is more important than being admired', '2015-03-18', 64, 1),
(369, 33, 'I strive to improve my skills', '2015-03-18', 65, 2),
(370, 33, 'I get close to people by being generous with money, time and energy', '2015-03-18', 66, 3),
(371, 33, 'I like to think carefully before I go into action', '2015-03-18', 67, 4),
(372, 33, 'Sometimes I like the thrill of experiencing fear', '2015-03-18', 68, 5),
(373, 33, 'I need to feel respected', '2015-03-18', 69, 6),
(374, 33, 'When we stop growing, we die', '2015-03-18', 70, 2),
(375, 33, 'The feeling of togetherness is important to me', '2015-03-18', 71, 3),
(376, 33, 'For life to make sense, you have to leave a mark in the world', '2015-03-18', 72, 1),
(377, 33, 'Feeling comfortable at all times is important to me', '2015-03-18', 73, 4),
(378, 33, 'I enjoy being involved in many different activities', '2015-03-18', 74, 5),
(379, 33, 'I’m always comparing myself to others in terms of success', '2015-03-18', 75, 6),
(380, 33, 'I need to have passion in my relationship', '2015-03-18', 76, 3),
(381, 33, 'If I’m not contributing to others, my life is meaningless', '2015-03-18', 77, 1),
(382, 33, 'When making a decision, I often think about what might be more enjoyable', '2015-03-18', 78, 5),
(383, 33, 'I can’t stand to feel stagnant', '2015-03-18', 79, 2),
(384, 33, 'I need to feel as safe as possible at all times', '2015-03-18', 80, 4),
(385, 33, 'If I commit to something, I worry that something better might come along', '2015-03-18', 81, 5),
(386, 33, 'I never want to be seen as a loser', '2015-03-18', 82, 6),
(387, 33, 'I don’t care about having much stability in my life', '2015-03-18', 83, 5),
(388, 33, 'I have a mission', '2015-03-18', 84, 1),
(390, 30, 'c', '2015-03-30', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_option_info`
--

CREATE TABLE `question_option_info` (
  `option_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `text` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_option_info`
--

INSERT INTO `question_option_info` (`option_id`, `value`, `text`, `question_id`, `questionnaire_id`) VALUES
(178, 1, 'edswedfesw', 0, 26),
(183, 2, 'asdasdas', 0, 26),
(184, 10, 'qq', 105, 0),
(185, 20, 'ee', 105, 0),
(199, 3, 'qq', 101, 0),
(200, 14, 'ee', 101, 0),
(202, 33, 'eeee', 107, 0),
(203, 88, 'dtfgf', 107, 0),
(205, 3, 'ww', 102, 0),
(206, 4, 'sdfcsdfdsf', 0, 24),
(207, 44, 'www', 0, 24),
(208, 22, 'ttt', 107, 0);

-- --------------------------------------------------------

--
-- Table structure for table `results_userinfos`
--

CREATE TABLE `results_userinfos` (
  `userinfo_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `marks` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `mobile` varchar(64) NOT NULL,
  `cat_marks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results_userinfos`
--

INSERT INTO `results_userinfos` (`userinfo_id`, `name`, `email`, `marks`, `date`, `questionnaire_id`, `mobile`, `cat_marks`) VALUES


(23, 'mobin tester', 'mobin.4499@gmail.com', 4, 1424761200, 26, '', ''),
(24, 'mobin tester', 'mobin.4499@gmail.com', 17, 1424761200, 26, '', ''),
(25, 'mobin tester', 'mobin.t3office@gmail.com', 17, 1424761200, 26, '', ''),


--
-- Indexes for dumped tables
--

--
-- Indexes for table `calander`
--
ALTER TABLE `calander`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_registrations`
--
ALTER TABLE `client_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaires_info`
--
ALTER TABLE `questionnaires_info`
  ADD PRIMARY KEY (`questionnaire_id`);

--
-- Indexes for table `questions_info`
--
ALTER TABLE `questions_info`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `question_option_info`
--
ALTER TABLE `question_option_info`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `results_userinfos`
--
ALTER TABLE `results_userinfos`
  ADD PRIMARY KEY (`userinfo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calander`
--
ALTER TABLE `calander`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `client_registrations`
--
ALTER TABLE `client_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questionnaires_info`
--
ALTER TABLE `questionnaires_info`
  MODIFY `questionnaire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `questions_info`
--
ALTER TABLE `questions_info`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT for table `question_option_info`
--
ALTER TABLE `question_option_info`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `results_userinfos`
--
ALTER TABLE `results_userinfos`
  MODIFY `userinfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2059;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
