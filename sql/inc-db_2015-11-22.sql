-- phpMyAdmin SQL Dump
-- version 4.4.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2015 at 06:42 AM
-- Server version: 5.5.44
-- PHP Version: 5.4.42

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inc`
--

-- --------------------------------------------------------

--
-- Table structure for table `sentence`
--

CREATE TABLE `sentence` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `score` float NOT NULL,
  `subreddit` varchar(64) NOT NULL,
  `author` varchar(64) NOT NULL,
  `jsonID` varchar(32) NOT NULL,
  `created_utc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `controversiality` float NOT NULL,
  `ups` int(11) NOT NULL,
  `downs` int(11) NOT NULL,
  `sentiment` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sentence`
--
ALTER TABLE `sentence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `score` (`score`),
  ADD KEY `redditor` (`author`),
  ADD KEY `subreddit` (`subreddit`),
  ADD KEY `timestamp` (`created_utc`),
  ADD KEY `contro` (`controversiality`),
  ADD KEY `ups` (`ups`),
  ADD KEY `downs` (`downs`),
  ADD FULLTEXT KEY `lol` (`body`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sentence`
--
ALTER TABLE `sentence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
