-- phpMyAdmin SQL Dump
-- Version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 08:18 AM
-- Server Version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

-- Set SQL mode and time zone
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Store old character set and collation settings
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- Use utf8mb4 character set
/*!40101 SET NAMES utf8mb4 */;

-- Database: `cricketweb`

-- Table structure for `matchtable`
CREATE TABLE `matchtable` (
  `mid` int(11) NOT NULL,
  `playerName` varchar(255) NOT NULL,
  `mdescription` varchar(255) NOT NULL,
  `overs` decimal(10,0) NOT NULL,
  `runs` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for `users`
CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uName` varchar(20) NOT NULL,
  `uRole` varchar(20) NOT NULL,
  `uPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert data into `users`
INSERT INTO `users` (`uid`, `uName`, `uRole`, `uPassword`) VALUES
(1, 'Diluka', 'admin', 'admin'),
(2, 'user', 'user', 'user'),
(3, 'admin', 'admin', 'admin');

-- Indexes for `matchtable`
ALTER TABLE `matchtable`
  ADD PRIMARY KEY (`mid`);

-- Indexes for `users`
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

-- Auto increment settings for `matchtable`
ALTER TABLE `matchtable`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

-- Auto increment settings for `users`
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- Commit the transaction
COMMIT;

-- Restore old character set and collation settings
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
