-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 09:55 PM
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
-- Database: `seabrook_community`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` date NOT NULL,
  `event` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `comments` int(255) NOT NULL,
  `likes` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventid`, `id`, `title`, `date`, `event`, `image`, `comments`, `likes`) VALUES
(4, 0, '', '0000-00-00', 'This is my post', '', 0, 0),
(8, 0, '', '0000-00-00', 'Hello there', '', 0, 0),
(16, 0, '', '0000-00-00', '', '', 0, 0),
(20, 0, '', '0000-00-00', 'Saturday I have a car service! Is anyone available to pick me up from Cheadle Hulme?', '', 0, 0),
(21, 0, '', '0000-00-00', 'We will be going to London on the 9th of february will have 2 available seats, could get a lift if anyone needs to get to London.', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `confirmPassword` text NOT NULL,
  `phoneNumber` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `username`, `password`, `confirmPassword`, `phoneNumber`) VALUES
(9, 'Valentina', 'Habravan', 'valentina@gmail.com', 'Valentina99', '$2y$10$VUntKxURIOZX1M71oOunrOX/ZL7QLdL0r80unqNEwXY9YTHqmKlPO', '$2y$10$T3lhZMhjXh4gayIVoJYFd.slTIQV6eEqAsgiVoIt41bhTBKb7vB5K', 68754055),
(10, 'Bogdan', 'Coropceanu', 'bogdcor.89@gmail.com', 'Bogdan89', '$2y$10$RwOTAGC52ZgpHDNUe6nC7ei4S/3zod6MUeRKh0WERqFmYWDfUh.Ma', '$2y$10$v24Gk2elX8HKLfqmV3aRwOqeYFlZatXnX6lrrToYmorE1oxrIJQMa', 68754055);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
