-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 08:37 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `craft`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`) VALUES
(1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `craftsmen`
--

CREATE TABLE `craftsmen` (
  `craftsmen_id` int(11) NOT NULL,
  `craft` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `craftsmen`
--

INSERT INTO `craftsmen` (`craftsmen_id`, `craft`, `city`, `bio`) VALUES
(97, 'كهربجي', 'عمان', ''),
(99, 'كهربجي', 'عمان', ''),
(101, 'حداد', 'عمان', '');

-- --------------------------------------------------------

--
-- Table structure for table `craftsmen_comments`
--

CREATE TABLE `craftsmen_comments` (
  `craftsmen_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `enduser_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `craftsmen_comments`
--

INSERT INTO `craftsmen_comments` (`craftsmen_id`, `comment_id`, `enduser_id`, `comment`, `comment_date`) VALUES
(97, 160, 98, '5', '2018-04-12 17:53:51'),
(97, 161, 98, '1', '2018-04-12 21:02:57'),
(97, 162, 98, '3', '2018-04-12 21:03:01'),
(97, 163, 98, '4', '2018-04-12 21:03:05'),
(97, 164, 98, '2', '2018-04-12 21:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `craftsmen_mobile`
--

CREATE TABLE `craftsmen_mobile` (
  `craftsmen_id` int(11) NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `craftsmen_mobile`
--

INSERT INTO `craftsmen_mobile` (`craftsmen_id`, `mobile`) VALUES
(97, '0788877450'),
(99, '0788877450'),
(101, '0788877450');

-- --------------------------------------------------------

--
-- Table structure for table `end_user`
--

CREATE TABLE `end_user` (
  `enduser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `end_user`
--

INSERT INTO `end_user` (`enduser_id`) VALUES
(98);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `login_time`) VALUES
(101, '2018-04-13 18:19:52'),
(101, '2018-04-13 18:19:57'),
(101, '2018-04-13 18:19:57'),
(101, '2018-04-13 18:19:58'),
(101, '2018-04-13 18:19:58'),
(101, '2018-04-13 18:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `masteruser`
--

CREATE TABLE `masteruser` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0' COMMENT '0 => user,1=> craftsmen',
  `activation_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 => not active',
  `lock_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 => not locked;1=>locked',
  `activation_hash` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `masteruser`
--

INSERT INTO `masteruser` (`user_id`, `email`, `username`, `password`, `first_name`, `last_name`, `image_path`, `user_type`, `activation_status`, `lock_status`, `activation_hash`) VALUES
(97, 'yazan_9526@hotmail.com', 'yazan9526', '$2y$10$nF8ElJEwGvlz.ColbrgxB.uO1CPQQWHsFxNhQXCbktncy7klVCvCC', 'Yazan', 'Ibrahim', '', 1, 0, 1, '141fded8387b387998eeedd6820f3ee3'),
(98, 'user@hotmail.com', 'useryazan9526', '$2y$10$uXUrUY31qM4fGNNQlWRVD.2aRlHFxRLoHHI.GVEGZ/xDsCp0hCsmi', 'user', 'adi', '', 0, 0, 1, '78a6b7fa7ac0d0ba1a26bb825924a2fe'),
(99, 'seocndcraftsmen@hotmail.com', 'second9526', '$2y$10$ATTXJvavRRn6Cqimr.9cuuiv3IEOs1t5swdyhaSCTy2rLvJI0PKEq', 'seocndcraftsmen', 'seocndcraftsmen', '', 1, 0, 1, 'aad2a6557f0f3629abab85720e0990a5'),
(101, 'mikeallano95@gmail.com', 'ahmad9526', '$2y$10$Ck.iVLsBCcoFAYPsgTshpOiYTWd.rX1Kb6nYqn39xwb.wR5aobQBO', 'ahmad', 'ALLAN', '', 1, 0, 1, 'ce5d75028d92047a9ec617acb9c34ce6');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(11) NOT NULL,
  `craftsmen_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL DEFAULT '0',
  `rate_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_id`, `craftsmen_id`, `user_id`, `rate`, `rate_date`) VALUES
(4, 97, 97, 2, '2018-04-12 16:43:57'),
(6, 97, 97, 5, '2018-04-12 16:45:54'),
(9, 97, 97, 3, '2018-04-12 21:13:17'),
(10, 97, 97, 4, '2018-04-12 21:13:24'),
(11, 97, 97, 4, '2018-04-12 21:13:26'),
(12, 97, 97, 4, '2018-04-12 21:13:26'),
(13, 97, 97, 3, '2018-04-12 21:13:26'),
(14, 97, 97, 3, '2018-04-12 21:13:26'),
(15, 97, 97, 4, '2018-04-13 02:31:41'),
(16, 97, 97, 3, '2018-04-13 02:31:47'),
(17, 97, 97, 5, '2018-04-13 02:31:48'),
(18, 97, 97, 4, '2018-04-13 20:10:26'),
(19, 97, 97, 4, '2018-04-13 23:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `reset_token`
--

CREATE TABLE `reset_token` (
  `token_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reset_token`
--

INSERT INTO `reset_token` (`token_id`, `token`, `token_time`, `user_id`) VALUES
(1, '71cc4d5ab7e066c6492f8ad5dafb1dde', '2018-04-13 15:20:01', 101),
(2, '9da7c33ac4e3131c6739be6e8efe8076', '2018-04-13 15:20:06', 101);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `craftsmen`
--
ALTER TABLE `craftsmen`
  ADD PRIMARY KEY (`craftsmen_id`);

--
-- Indexes for table `craftsmen_comments`
--
ALTER TABLE `craftsmen_comments`
  ADD PRIMARY KEY (`craftsmen_id`,`comment_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `enduser_id` (`enduser_id`);

--
-- Indexes for table `craftsmen_mobile`
--
ALTER TABLE `craftsmen_mobile`
  ADD PRIMARY KEY (`craftsmen_id`,`mobile`);

--
-- Indexes for table `end_user`
--
ALTER TABLE `end_user`
  ADD PRIMARY KEY (`enduser_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `masteruser`
--
ALTER TABLE `masteruser`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `craftsmen_id` (`craftsmen_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reset_token`
--
ALTER TABLE `reset_token`
  ADD PRIMARY KEY (`token_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `craftsmen_comments`
--
ALTER TABLE `craftsmen_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `masteruser`
--
ALTER TABLE `masteruser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reset_token`
--
ALTER TABLE `reset_token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `craftsmen_mobile`
--
ALTER TABLE `craftsmen_mobile`
  ADD CONSTRAINT `craftsmen_mobile_ibfk_1` FOREIGN KEY (`craftsmen_id`) REFERENCES `craftsmen` (`craftsmen_id`);

--
-- Constraints for table `end_user`
--
ALTER TABLE `end_user`
  ADD CONSTRAINT `end_user_ibfk_1` FOREIGN KEY (`enduser_id`) REFERENCES `masteruser` (`user_id`);

--
-- Constraints for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD CONSTRAINT `login_attempts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `masteruser` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reset_token`
--
ALTER TABLE `reset_token`
  ADD CONSTRAINT `reset_token_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `masteruser` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
