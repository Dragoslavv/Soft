-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2018 at 12:27 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Tasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `create-task`
--

CREATE TABLE `create-task` (
  `id` int(11) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create-task`
--

INSERT INTO `create-task` (`id`, `summary`, `date`, `descriptions`, `create_date`) VALUES
(43, 'testa', '2018-09-20', 'teast', '2018-09-20 17:09:22'),
(44, 'Dragoslav', '2018-09-20', 'dwadafaf', '2018-09-20 17:09:45'),
(45, 'drago test sada', '2018-09-20', 'wdafaw', '2018-09-20 17:11:08'),
(46, 'test', '2018-09-19', 'test', '2018-09-20 22:17:36'),
(47, 'test', '2018-09-19', 'test', '2018-09-20 22:23:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create-task`
--
ALTER TABLE `create-task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create-task`
--
ALTER TABLE `create-task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
