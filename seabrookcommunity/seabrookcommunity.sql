-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 01:42 AM
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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `parent` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `userid`, `event`, `title`, `comments`, `likes`, `image`, `date`, `parent`) VALUES
(2433, 2, 'Eveniment de pe pagina Bogdan', 'Evenimnet Numarul !', 1, 0, '', '2024-02-15 17:37:59', 0),
(689976, 2, 'tre trei', '', 0, 0, '', '0000-00-00 00:00:00', 0),
(839379, 4, 'Sint aici!', '', 0, 1, '', '2024-02-15 18:16:10', 0),
(5430528, 1, 'Mdaaaa', '', 1, 0, '', '2024-02-15 17:59:10', 2147483647),
(51183863, 4, 'Helooo', 'Titlu', 0, 1, '', '2024-02-15 18:12:38', 0),
(637732864, 2, 'doi doi', 'unu unu', 0, 1, '', '2024-02-15 23:58:22', 0),
(855363992, 3, 'Hello there Manchester!', 'Title text!', 1, 4, '', '2024-02-15 17:39:20', 0),
(898205685, 1, 'Ce sa zic', '', 0, 0, '', '0000-00-00 00:00:00', 5430528),
(2147483647, 1, 'Azi e ultima zi de proiect!', 'Eveniment de 15 februarie', 1, 1, '', '2024-02-15 17:58:22', 0);

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
  `phoneNumber` int(255) NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstName`, `lastName`, `email`, `username`, `password`, `confirmPassword`, `phoneNumber`, `user_role_id`) VALUES
(1, 'Dorina', 'Habravan', 'dorina@gmail.com', 'Dorina92', '$2y$10$lQ2PO.JVhtkzdcOh6jaAHOdobgFWqh4VfEFHewae5yIL156rr4Tqm', '$2y$10$alh4YS5MclcX/q7DNgVFwO3fsfFnvfnCNrplyTXfhnlPEBAGowCOu', 68754055, 1),
(2, 'Bogdan', 'Coropceanu', 'bogdcor.89@gmail.com', 'Bogdan89', '$2y$10$zOgIKYtpv9m33SsU//ExHeRJGzRR.DbPSfBQZ6IM9RUmn0sAt/qXS', '$2y$10$7YGHVfIRocBykjhGHjSmCemRb9nwVo.IhCMntUsi3M51h.hUA2ALW', 68754055, 0),
(3, 'Valentina', 'Habravan', 'valentina@gmail.com', 'Valentina99', '$2y$10$eNIWrffSHrStJzi0w4CWwueVYvRAxHNA41oVSaO.CLo0tvarHBdci', '$2y$10$/Zrs1ah7ay3jRsuBGT9RGOTavukHmrv9NVXWrSf0rEsZqRxe9UH66', 687754055, 0),
(4, 'Rustam', 'Habravan', 'rustam@gmail.com', 'Rustam89', '$2y$10$f3p/XRqpANeNUaa6tfaJaukmYS4r6cMXvpy/QLktrOblJZGCIiYXO', '$2y$10$mohn0gr7xkdVmMdmhO9jaOHs/H/KFKkqGHarMvA9toGsmxhG1p0M.', 68754055, 0),
(11, 'Iurie', 'Coropceanu', 'iurie@gmail.com', 'Iurie92', '$2y$10$DnNY2A7If/zjH6/QvojZT.f0mQK8QKchKwkziXslUnsduEVjZZ5dC', '$2y$10$KPala/KWMr5qirANIXHj8eoE5a4KEl06pTjeZ9AQ4nn5uixPZKCGy', 2147483647, 2),
(12, 'Maria', 'Maria', 'maria@gmal.com', 'Maria92', '$2y$10$ZQkqdZsqi/B7rdNjJ2UDQOqLJ3rt1AYw6rXJTREBx/JBsSDnX6GSm', '$2y$10$sK1SJKbGcNc..vplTEveteRzVWo/oUx/ZHywusI1N1PKzm5qOLqJS', 687754055, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'user');

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
  ADD KEY `date` (`date`),
  ADD KEY `parent` (`parent`);

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
  ADD KEY `username` (`username`),
  ADD KEY `user_role_id` (`user_role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD KEY `id` (`id`);

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
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
