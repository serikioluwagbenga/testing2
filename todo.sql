-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 03:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` varchar(250) NOT NULL,
  `userID` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` text NOT NULL DEFAULT 'active',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `userID`, `name`, `status`, `date`) VALUES
('0948kds', '6536560a3db85', 'home', 'active', '2023-10-25 13:22:04'),
('12', '883', 'Tolu', 'active', '2023-10-25 13:46:58'),
('6539099ee23ea', '6536560a3db85', 'home', 'active', '2023-10-25 13:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` varchar(250) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `full_name`, `email`, `password`, `status`, `date`) VALUES
('6536560a3db85', 'seriki_gbenga', 'johnsmith@gmail.com', '$2y$10$fJgK9Xp1u71hYdTK1c5vC.SyzS.zwadYADN8ZFURjzjWZjJzLE5tu', 1, '2023-10-23 12:16:26'),
('653910635eb9a', 'seriki_gbenga', 'serikioluwagbenga@gmail.com', '$2y$10$EcPy.8E9DTFuwUxNJvdcZONkQ8/tLadyEJCDrVcuEHH3Tavztm08e', 1, '2023-10-25 13:56:03'),
('6539134731eb5', 'seriki Oluwagbenga', 'dannyemmy584@gmail.com', '$2y$10$WK60EZhF3LXRAJ3D0m4t8.lTpOC3SytN.TYUcW1xX1DKwBYRcp/v6', 1, '2023-10-25 14:08:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
