-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 07:51 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sqli`
--

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id` int(11) NOT NULL,
  `path` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `secret` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `path`, `role`, `secret`) VALUES
(1, 'cats/1', 'user', 'I love fat cats'),
(2, 'cats/2', 'user', 'I hate cats'),
(3, 'cats/3', 'user', 'AND_THIS_WAS_A_CRAZY_BLIND_ONE'),
(4, 'cats/4', 'user', 'There is a mouse'),
(5, 'cats/5', 'admin', 'I_AM_YOUR_ADMIN_1337'),
(6, 'cats/6', 'user', 'WHAT_AN_ERROR!'),
(7, 'cats/7', 'user', 'SQL_Injection Master_!'),
(8, 'cats/8', 'user', 'Meow Meow Meow'),
(9, 'cats/9', 'user', 'I am a special agent'),
(10, 'cats/10', 'user', 'I feed cats at 5 am !');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'roman', 'A123456a', 'user'),
(2, 'david', '123123', 'user'),
(3, 'bubu', '123456Aa!', 'user'),
(4, 'niki', 'QAZWSXEDC!', 'user'),
(5, 'admin', 'You_Got_My_Damn_Password', 'admin'),
(6, 'boss', '!QAZ@WSX#EDC123123', 'admin'),
(7, 'leet', '1337', 'nobody');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
