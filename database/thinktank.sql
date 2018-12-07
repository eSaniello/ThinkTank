-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2018 at 05:08 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thinktank`
--
CREATE DATABASE IF NOT EXISTS `thinktank` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `thinktank`;

-- --------------------------------------------------------

--
-- Table structure for table `game_scores`
--

CREATE TABLE `game_scores` (
  `game_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `game_title` varchar(1024) DEFAULT NULL,
  `score` double DEFAULT NULL,
  `played` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_scores`
--

INSERT INTO `game_scores` (`game_id`, `user_id`, `game_title`, `score`, `played`) VALUES
(27, 5, 'Light-reflex-Game', 8, 1),
(28, 5, 'Balloon-math-Game', 63, 1),
(29, 6, 'Light-reflex-Game', 3, 1),
(31, 6, 'Balloon-math-Game', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(512) NOT NULL,
  `lastname` varchar(512) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `password` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `firstname`, `lastname`, `user_name`, `password`) VALUES
(5, 'Shaniel', 'Samadhan', 'esaniello', '$2y$10$8AzyFDaBgnQ/T1oQUYcPmegDYjBVe9ty3Ybs5Iakr2hswtUnYuZFS'),
(6, 'raveena', 'boedhoe', 'ravb', '$2y$10$PuSLwCLy07gJM5m3sZryiepA9GaBt7biWJ8cUuwYf8QJJBlt89KT.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_scores`
--
ALTER TABLE `game_scores`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_scores`
--
ALTER TABLE `game_scores`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_scores`
--
ALTER TABLE `game_scores`
  ADD CONSTRAINT `game_scores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
