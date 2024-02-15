-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 11:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seabrookcommunity`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `title` varchar(25) NOT NULL,
  `comments` int(255) NOT NULL,
  `likes` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `userid`, `event`, `title`, `comments`, `likes`, `image`, `date`) VALUES
(4607120, 2, 'Astazi a fost 14 februarie!!!!', 'Incercarea numarul 1!', 0, 20, '', '2024-02-15 07:13:57'),
(740968782, 1, 'Good night!', 'My Title!', 0, 3, '', '2024-02-15 07:14:13'),
(855363992, 3, 'Hello there Manchester!', 'Title text!', 0, 0, '', '2024-02-15 02:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `likes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmPassword` varchar(255) NOT NULL,
  `phoneNumber` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstName`, `lastName`, `email`, `username`, `password`, `confirmPassword`, `phoneNumber`) VALUES
(1, 'Dorina', 'Habravan', 'dorina@gmail.com', 'Dorina92', '$2y$10$lQ2PO.JVhtkzdcOh6jaAHOdobgFWqh4VfEFHewae5yIL156rr4Tqm', '$2y$10$alh4YS5MclcX/q7DNgVFwO3fsfFnvfnCNrplyTXfhnlPEBAGowCOu', 68754055),
(2, 'Bogdan', 'Coropceanu', 'bogdcor.89@gmail.com', 'Bogdan89', '$2y$10$zOgIKYtpv9m33SsU//ExHeRJGzRR.DbPSfBQZ6IM9RUmn0sAt/qXS', '$2y$10$7YGHVfIRocBykjhGHjSmCemRb9nwVo.IhCMntUsi3M51h.hUA2ALW', 68754055),
(3, 'Valentina', 'Habravan', 'valentina@gmail.com', 'Valentina99', '$2y$10$eNIWrffSHrStJzi0w4CWwueVYvRAxHNA41oVSaO.CLo0tvarHBdci', '$2y$10$/Zrs1ah7ay3jRsuBGT9RGOTavukHmrv9NVXWrSf0rEsZqRxe9UH66', 687754055);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventid`),
  ADD KEY `eventid` (`eventid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `title` (`title`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contentid` (`contentid`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
