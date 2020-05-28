-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2019 at 07:59 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chatting`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_user`
--

CREATE TABLE `active_user` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_user`
--

INSERT INTO `active_user` (`user_id`, `user_name`, `timestamp`) VALUES
(89, 'guri', '2019-10-27 18:44:17'),
(90, 'ram', '2019-10-27 18:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `chatting_session_messages`
--

CREATE TABLE `chatting_session_messages` (
  `message_id` int(8) NOT NULL,
  `to_user` varchar(100) NOT NULL,
  `from_user` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `messages` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatting_session_messages`
--

INSERT INTO `chatting_session_messages` (`message_id`, `to_user`, `from_user`, `timestamp`, `messages`) VALUES
(118, 'ram', 'ravi', '2019-10-27 07:57:59', 'ravi : Hor ki haal hai?'),
(119, 'ravi', 'ram', '2019-10-27 07:58:11', 'ram : main thik han'),
(120, 'ram', 'ravi', '2019-10-27 16:53:40', 'ravi : hello'),
(121, 'ravi', 'ram', '2019-10-27 16:53:50', 'ram : Hi Ravi'),
(122, 'ram', 'ravi', '2019-10-27 16:58:43', 'ravi : goo'),
(123, 'ram', 'ravi', '2019-10-27 16:58:46', 'ravi : '),
(124, 'ram', 'ravi', '2019-10-27 16:58:50', 'ravi : goo'),
(125, 'ravi', 'ram', '2019-10-27 16:59:04', 'ram : what are you doing?'),
(126, 'ram', 'ravi', '2019-10-27 16:59:14', 'ravi : nothing'),
(127, 'ram', 'ravi', '2019-10-27 17:05:52', 'ravi : fdsf'),
(128, 'ram', 'ravi', '2019-10-27 18:00:15', 'ravi : have this image'),
(129, 'ram', 'guri', '2019-10-27 18:19:06', 'guri : Hi Ram'),
(130, 'guri', 'ram', '2019-10-27 18:19:41', 'ram : Hello Guri How Are you?'),
(131, 'ram', 'guri', '2019-10-27 18:20:10', 'guri : Ram are you free now?'),
(132, 'guri', 'ram', '2019-10-27 18:20:25', 'ram : Yes I am free'),
(133, 'ram', 'guri', '2019-10-27 18:20:35', 'guri : fsdfsdfsd'),
(134, 'ram', 'guri', '2019-10-27 18:20:36', 'guri : gdfsgdfg'),
(135, 'ram', 'guri', '2019-10-27 18:20:38', 'guri : gdfgsdfg'),
(136, 'ram', 'guri', '2019-10-27 18:20:40', 'guri : hgfhgfhfg'),
(137, 'ram', 'guri', '2019-10-27 18:20:42', 'guri : jfdjhdfhd'),
(138, 'ram', 'guri', '2019-10-27 18:20:44', 'guri : gsg'),
(139, 'guri', 'ram', '2019-10-27 18:25:31', 'ram : pls receive the image of hut'),
(140, 'ram', 'guri', '2019-10-27 18:58:10', 'guri : hi ram how are you');

-- --------------------------------------------------------

--
-- Table structure for table `chatting_session_request`
--

CREATE TABLE `chatting_session_request` (
  `session_id` int(10) NOT NULL,
  `user1` varchar(60) NOT NULL,
  `user1_confirm` int(1) NOT NULL DEFAULT '0',
  `user2` varchar(60) NOT NULL,
  `user2_confirm` int(1) NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files_details`
--

CREATE TABLE `files_details` (
  `file_id` int(6) NOT NULL,
  `to_user` varchar(60) NOT NULL,
  `from_user` varchar(60) NOT NULL,
  `file` varchar(80) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files_details`
--

INSERT INTO `files_details` (`file_id`, `to_user`, `from_user`, `file`, `timestamp`) VALUES
(3, 'ram', 'ravi', 'uploads/img20191027184638.png', '2019-10-27 17:46:38'),
(4, 'ram', 'ravi', 'uploads/img20191027185030.jpg', '2019-10-27 17:50:30'),
(5, 'ravi', 'ram', 'uploads/img20191027185823.png', '2019-10-27 17:58:23'),
(6, 'ram', 'guri', 'uploads/img20191027192237.jpg', '2019-10-27 18:22:37'),
(7, 'guri', 'ram', 'uploads/img20191027192639.jpg', '2019-10-27 18:26:39'),
(8, 'ram', 'guri', 'uploads/img20191027195236.png', '2019-10-27 18:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(10) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_name`, `last_activity`, `is_type`) VALUES
(31, 'ram', '2019-10-24 18:55:13', 'no'),
(32, 'ravi', '2019-10-24 18:55:23', 'no'),
(33, 'ravi', '2019-10-24 19:04:04', 'no'),
(34, 'ravi', '2019-10-25 00:29:44', 'no'),
(35, 'Ravi', '2019-10-26 00:00:00', 'no'),
(36, 'ram', '2019-10-26 00:03:59', 'no'),
(37, 'ravi', '2019-10-26 00:07:27', 'no'),
(38, 'ram', '2019-10-26 00:07:52', 'no'),
(39, 'ravi', '2019-10-26 00:08:02', 'no'),
(40, 'rr', '2019-10-26 00:10:16', 'no'),
(41, 'ram', '2019-10-26 00:10:36', 'no'),
(42, 'ram', '2019-10-26 01:05:34', 'no'),
(43, 'ravi', '2019-10-26 01:05:48', 'no'),
(44, 'ravi', '2019-10-26 01:09:00', 'no'),
(45, 'ram', '2019-10-26 01:09:25', 'no'),
(46, 'ravi', '2019-10-26 01:26:21', 'no'),
(47, 'ravi', '2019-10-26 01:28:55', 'no'),
(48, 'ram', '2019-10-26 01:29:29', 'no'),
(49, 'ram', '2019-10-26 01:30:29', 'no'),
(50, 'ravi', '2019-10-26 01:32:55', 'no'),
(51, 'ram', '2019-10-26 01:43:03', 'no'),
(52, 'ram', '2019-10-27 04:32:13', 'no'),
(53, 'ram', '2019-10-27 07:16:17', 'no'),
(54, 'ravi', '2019-10-27 17:00:25', 'no'),
(55, 'ram', '2019-10-27 17:00:41', 'no'),
(56, 'ravi', '2019-10-27 18:03:38', 'no'),
(57, 'ram', '2019-10-27 18:04:10', 'no'),
(58, 'guri', '2019-10-27 18:17:54', 'no'),
(59, 'ram', '2019-10-27 18:18:30', 'no'),
(60, 'guri', '2019-10-27 18:25:50', 'no'),
(61, 'guri', '2019-10-27 18:44:17', 'no'),
(62, 'ram', '2019-10-27 18:44:35', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `secret_question` varchar(70) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `secret_question`, `answer`) VALUES
(7, 'guri', '30060066b23320722f802fb533203830', 'nickname', 'guri'),
(5, 'ram', '79cfac6387e0d582f83a29a04d0bcdc4', 'nickname', 'ram'),
(6, 'rr', '514f1b439f404f86f77090fa9edc96ce', 'nickname', 'rr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active_user`
--
ALTER TABLE `active_user`
  ADD UNIQUE KEY `sr_no` (`user_id`);

--
-- Indexes for table `chatting_session_messages`
--
ALTER TABLE `chatting_session_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `chatting_session_request`
--
ALTER TABLE `chatting_session_request`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `files_details`
--
ALTER TABLE `files_details`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active_user`
--
ALTER TABLE `active_user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `chatting_session_messages`
--
ALTER TABLE `chatting_session_messages`
  MODIFY `message_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `chatting_session_request`
--
ALTER TABLE `chatting_session_request`
  MODIFY `session_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `files_details`
--
ALTER TABLE `files_details`
  MODIFY `file_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
