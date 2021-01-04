-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 11:03 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelbliss`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(100) NOT NULL,
  `postTitle` varchar(100) NOT NULL,
  `roomName` varchar(100) NOT NULL,
  `roomPrice` int(100) NOT NULL,
  `roomType` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `avail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postTitle`, `roomName`, `roomPrice`, `roomType`, `description`, `tag`, `avail`) VALUES
(2, 'this is room', 'test2', 1000, 'single', 'test24', 'neil', 'test24'),
(3, 'sdf', 'sdf-k', 100, 'sdf', 'sdf', '123', ''),
(4, 'klj', 'kjljk', 1000, 'double', 'kl', 'neil', 'available'),
(5, 'd', 'd', 1, 'd', 'd', '123', ''),
(6, 'kk', 'kk', 1, 'kk', 'kk', 'neil', 'available'),
(7, 'fdf', 'dfdf', 2, 'single', '221', 'neil', '221'),
(8, 'ooo', 'ooo', 0, 'single', 'pp j', 'neil', 'available'),
(12, 'test', 'ddd', 100, 'single', '22', 'neil', '22'),
(13, 'room 3', 'test 3', 100, 'single', 'tets', 'EndermanOfCoding', 'available'),
(14, 'dsd', 'sds', 1000, 'single', 'ff', 'Front3ndNinja', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `jobtitle` varchar(50) NOT NULL,
  `jlocation` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `jobtitle`, `jlocation`, `salary`) VALUES
(7, 'test', 'web developer 2', 'ctg', '1000'),
(8, 'sdfdsf', 'sdfsdf', 'testsdfdsf', '2000'),
(9, '123', '123', '123', '123'),
(11, 'dsfsd', 'dsfsdf', 'sdfdsfsdf', 'sdfdsf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `contactno` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `companyName`, `contactno`, `login`, `password`, `role`) VALUES
(1, 'Fardin Ahmed Niloy', 'Family Travel', '01781850000', 'neil', '123', 'hotelManager'),
(2, 'Xyz', 'kkk', '0000', 'admin', '123', 'admin'),
(22, 'test2', 'test2', '015555555', 'test4', 'test', 'user'),
(23, 'dfsdf', 'sdf', '1000', '123', '123', 'hotelManager'),
(24, 'test3', 'test3', '0000', 'test3', '123', 'hotelManager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
