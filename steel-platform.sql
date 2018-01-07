-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2017 at 03:21 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `steel-platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `steelplatform_question`
--

CREATE TABLE `steelplatform_question` (
  `question_id` bigint(255) NOT NULL,
  `question` varchar(50000) NOT NULL,
  `testcase_input` varchar(500) NOT NULL,
  `testcase_output` varchar(500) NOT NULL,
  `course` varchar(100) NOT NULL,
  `question_name` varchar(50) NOT NULL,
  `contestid` varchar(500) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `question_lifetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steelplatform_question`
--

INSERT INTO `steelplatform_question` (`question_id`, `question`, `testcase_input`, `testcase_output`, `course`, `question_name`, `contestid`, `uid`, `question_lifetime`) VALUES
(4, 'print n numbers', '5,2,4,3', '0\r\n1\r\n2\r\n3\r\n4\r\n,0\r\n1\r\n,0\r\n1\r\n2\r\n3\r\n,0\r\n1\r\n2\r\n', 'C', 'print n numbers', 'c', '', '2017-09-18 12:30:05'),
(13, 'hai the first program test write it on screen Hello World!', '', 'Hello world', 'C', 'hello world 2!', 'c', '', '2017-09-18 12:30:05'),
(14, 'different print hi', 'hi', 'hi', 'python', 'hi in python', 'python', '', '2017-09-18 12:30:05'),
(17, '2', '2', '2', 'daily', '2', 'dailychallenge', '', '2017-09-19 16:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `steelplatform_track`
--

CREATE TABLE `steelplatform_track` (
  `question_id` varchar(50) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `answer` longtext,
  `score` int(3) DEFAULT NULL,
  `completion_details` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `contestid` varchar(500) DEFAULT NULL,
  `compilation_time` int(11) DEFAULT NULL,
  `memory_used` int(25) DEFAULT NULL,
  `lang` varchar(10) DEFAULT NULL,
  `question_lifetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steelplatform_track`
--

INSERT INTO `steelplatform_track` (`question_id`, `uid`, `answer`, `score`, `completion_details`, `contestid`, `compilation_time`, `memory_used`, `lang`, `question_lifetime`) VALUES
('14', 'W0FUXObWeEV19NMIsHQk6W4pdO83', 'import+sys%0A%0Asys.stdout.write%28%22hi%22%29%0A%09%09%09%09%09%09%09%09%09%09%09%09%09', 1, '2017-08-24 15:47:29', 'python', 0, 6791168, '5', '0000-00-00 00:00:00'),
('13', 'W0FUXObWeEV19NMIsHQk6W4pdO83', '%23include+%3Cstdio.h%3E%0Aint+main%28%29%0A%7B%0A+++%2F%2F+printf%28%29+displays+the+string+inside+quotation%0A+++printf%28%22Hello+world%22%29%3B%0A+++return+0%3B%0A%7D%0A%09%09%09%09%09%09%09%09%09%09%09%09%09', 1, '2017-08-24 15:49:23', 'c', 0, 41877504, '1', '0000-00-00 00:00:00'),
('14', 'FG7F919HOCSm7iFmHJezV8N406n1', 'import+sys%0Asys.stdout.write%28%22nhi%22%29%3B%0A%09%09%09%09%09%09%09%09%09%09%09%09%09', 1, '2017-08-24 15:50:42', 'python', 0, 5971968, '5', '0000-00-00 00:00:00'),
('16', 'W0FUXObWeEV19NMIsHQk6W4pdO83', 'print+%22hello%22%09%09%09%09%09%09%09%09%09%09%09', 1, '2017-08-24 15:57:37', 'python', 0, 8183808, '5', '0000-00-00 00:00:00'),
('14', 'vHKzgpmv0VOXIyoWQG39Jyngj2u2', 'import+%0A%09%09%09%09%09%09%09%09%09%09%09%09%09', 0, '2017-08-26 19:42:27', 'python', NULL, NULL, '5', '0000-00-00 00:00:00'),
('13', 'FG7F919HOCSm7iFmHJezV8N406n1', '%23include+%3Cstdio.h%3E%0Aint+main%28%29%0A%7B%0A+++%2F%2F+printf%28%29+displays+the+string+inside+quotation%0A+++printf%28%22Hello+world%22%29%3B%0A+++return+0%3B%0A%7D%0A%09%09%09%09%09%09%09%09%09%09%09%09%09', 1, '2017-08-29 13:11:17', 'c', 0, 8585216, '1', '0000-00-00 00:00:00'),
('17', 'WcYrYbMQ0LeSov9bM1wWbtgCdOx1', 'import+sys%0Asys.stdout.write%28%272%27%29%3B', 1, '2017-09-19 00:50:14', 'dailychallenge', 0, 9916416, '5', '2017-09-13 00:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `steelplatform_user`
--

CREATE TABLE `steelplatform_user` (
  `uid` varchar(50) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steelplatform_user`
--

INSERT INTO `steelplatform_user` (`uid`, `role`, `name`, `email`) VALUES
('BIadHy79uIc5IMmSgYdeCTl7xxz2', NULL, 'DHINESH KUMAR B UIT14115', 'dhin14115.it@rmkec.ac.in'),
('FG7F919HOCSm7iFmHJezV8N406n1', 'admin', 'MUHAMED SALIH S I UIT15125', 'muha15125.it@rmkec.ac.in'),
('hJ58YuCEZxdDRl7plIFnMy3XnuD3', NULL, 'AHILESH A UIT14101', 'ahil14101.it@rmkec.ac.in'),
('nPTzLhtZqrSMhNV6p7VTmBqxODB2', NULL, 'Lakshmanan S', 'slakshmanan1698@gmail.com'),
('sdfdgwefg', 'student', 'daniel', 'cajcjsc'),
('sPGnFI5sJkNbO4L13Nr5bta5Ty82', NULL, 'LAKSHMANAN S UIT15120', 'laks15120.it@rmkec.ac.in'),
('vHKzgpmv0VOXIyoWQG39Jyngj2u2', '', 'Muhamed Salih', 'muhamedsalih21@gmail.com'),
('W0FUXObWeEV19NMIsHQk6W4pdO83', NULL, 'Christopher Daniel', 'chri14112.it@rmkec.ac.in'),
('WcYrYbMQ0LeSov9bM1wWbtgCdOx1', 'admin', 'MUHAMED SALIH S I UIT15125', 'muha15125.it@rmkec.ac.in');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `steelplatform_question`
--
ALTER TABLE `steelplatform_question`
  ADD PRIMARY KEY (`question_id`),
  ADD UNIQUE KEY `question_number` (`question_id`);

--
-- Indexes for table `steelplatform_track`
--
ALTER TABLE `steelplatform_track`
  ADD PRIMARY KEY (`completion_details`);

--
-- Indexes for table `steelplatform_user`
--
ALTER TABLE `steelplatform_user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `steelplatform_question`
--
ALTER TABLE `steelplatform_question`
  MODIFY `question_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
