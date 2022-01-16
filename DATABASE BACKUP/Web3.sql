-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 12:41 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Web3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(9) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Gurung Janga Bir Lama', 'jangabirlama30@gmail.com', 'janga', 'b92154187431a2e1f853cfc9b3fceed1'),
(2, 'Janga Bir Lama..', 'jangabirlama30@gmail.com', 'jang', 'd92db81c5b5bbd6d68911d01a8d15e91'),
(3, 'gurung', 'gurung@gmail.com', 'gurung', '88ed132ed816c4d93f5aa5b6356137e3'),
(4, 'Jagan', 'jagan@gmail.com', 'jagan', 'b92154187431a2e1f853cfc9b3fceed1'),
(5, 'jangas', 'jangas@gmail.com', 'JANGA LAMA', '6d5f9f9212b7d0ee7d936b92d625dfa1'),
(6, 'jangaa', 'jangaa@gmail.com', 'jangaaa', 'd763f7914a4cb695572d68a94338ee82'),
(7, 'TABUCHI SENSEI KYOTO JAPAN', 'TABUCHI SENSEI', 'TABUCHIS', '177111b98a4d6ccff911c41204b4cfc2'),
(8, 'janga', 'janga', 'janga', 'b92154187431a2e1f853cfc9b3fceed1'),
(9, 'Atsushi Tabuchi', 'Atsushi Tabuchi@gmail.com', 'Atsushi Tabuchi', 'a046f506e3b002cc101ca8f5e8db6d77'),
(10, 'test5', 'test5', 'test5', 'e3d704f3542b44a621ebed70dc0efe13'),
(11, 'lama', 'lama', 'lama', '25873e159d36d8c7218c74bbfd3d7e02');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `subject` varchar(129) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `subject`, `body`, `author`, `modified`) VALUES
(13, 'BIT', 'The bit is a basic unit of information in computing and digital communications. The name is a portmanteau of binary digit. The bit represents a logical state with ...', 60, '2021-01-29 23:39:00'),
(14, 'Eneterprises', 'Business communication', 63, '2021-01-27 22:40:00'),
(15, 'Business communication1', 'Japanese business communication is in many ways quite different from the ... Subtle body language cues are the bread and butter of Japanese ...', 63, '2021-01-28 07:09:00'),
(16, 'Business communication1', 'Japanese business communication is in many ways quite different from the **Subtle body language cues are the bread and butter of Japanese ...', 50, '2021-01-28 07:09:00'),
(17, 'Business communication2', 'to improve japanese language', 63, '2021-01-27 22:13:00'),
(18, 'Php article tutorial learning', 'PHP is a general-purpose scripting language especially suited to web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.', 49, '2021-01-27 23:58:00'),
(19, 'Java article..', 'Java is a class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', 49, '2021-01-28 20:58:00'),
(20, 'Lama Gurung Products', 'Wel-Come To Gurung Lama Company Pvt.Ltd. ', 49, '2021-01-28 00:56:00'),
(21, 'Web Programming 3', 'Web development\r\nWeb development is the work involved in developing a Web site for the Internet or an intranet. Web development can range from developing a simple single static page of plain text to complex Web-based Internet applications, electronic businesses, and social network services.\r\n', 50, '2021-01-28 03:51:00'),
(25, 'IT Supports.', 'Welcome to Lama IT Company PVT.LTD', 49, '2021-01-29 14:11:00'),
(26, 'Religious.', 'Buddisima...', 68, '2021-01-27 20:44:00'),
(27, 'Namaste!', 'welcome', 68, '2021-01-28 20:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `userID` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` char(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userID`, `password`, `name`) VALUES
(49, 'lamasan', 'lamasan', 'GURUNG JANGA BIR LAMA...'),
(50, 'TABUCHISIR', 'TABUCHISIR', 'TABUCHISIR'),
(54, 'Nepal123', 'nepal123', 'Nepal123'),
(58, 'test123', 'test123', 'test123'),
(60, 'Arjun', 'Arjun', 'Arjun'),
(61, 'david', 'David', 'David'),
(63, 'subas', 'subas', 'Subas'),
(65, 'Atsushi Tabuchi1', 'Atsushi Tabuchi1', 'Atsushi Tabuchi1'),
(68, 'M.Tezuka', 'M.Tezuka', 'M.Tezuka'),
(74, 'test987', 'Test1234', 'test1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
