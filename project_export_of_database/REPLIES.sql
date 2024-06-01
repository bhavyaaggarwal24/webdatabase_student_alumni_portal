-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2024 at 06:51 PM
-- Server version: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baggarwa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `REPLIES`
--

CREATE TABLE `REPLIES` (
  `REPLY_ID` int(11) NOT NULL,
  `POST_ID` int(11) NOT NULL,
  `AUTHOR_ID` int(11) DEFAULT NULL,
  `CONTENT` text NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `AUTHOR_TYPE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `REPLIES`
--

INSERT INTO `REPLIES` (`REPLY_ID`, `POST_ID`, `AUTHOR_ID`, `CONTENT`, `CREATED_AT`, `AUTHOR_TYPE`) VALUES
(1, 23, 7, 'Hi', '2024-04-13 17:32:45', 'student'),
(2, 23, 7, 'hbsdfhbsd', '2024-04-13 17:52:30', 'author'),
(3, 23, 7, 'bhjdsbfds', '2024-04-13 17:53:49', 'student'),
(4, 21, 7, 'I am interested', '2024-04-13 18:12:47', 'student'),
(5, 20, 7, 'please send me your email id', '2024-04-13 18:18:00', 'alumni'),
(6, 21, 7, 'Thanks', '2024-04-13 18:18:29', 'student'),
(7, 18, 7, 'Good morning\n', '2024-04-14 15:09:59', 'student'),
(8, 24, 7, 'Hi', '2024-04-14 15:23:26', 'student'),
(9, 24, 7, 'Hi', '2024-04-14 15:23:39', 'alumni'),
(10, 24, 8, 'Hello', '2024-04-14 15:27:15', 'student'),
(11, 24, 8, 'Hello', '2024-04-14 15:27:27', 'alumni'),
(12, 24, 10, 'Hello', '2024-04-14 15:31:09', 'student'),
(13, 24, 10, 'Hello', '2024-04-14 15:32:18', 'student'),
(14, 25, 10, 'Hello', '2024-04-14 16:30:55', 'student'),
(15, 25, 7, 'Hello', '2024-04-14 16:31:21', 'alumni'),
(16, 17, 7, 'Hi', '2024-04-14 17:35:39', 'alumni'),
(17, 17, 10, 'Hi', '2024-04-14 17:36:04', 'student'),
(18, 25, 10, 'Hello', '2024-04-14 19:25:34', 'student'),
(19, 22, 10, 'Hi', '2024-04-14 19:57:25', 'student'),
(20, 25, 7, 'Hello', '2024-04-14 19:59:58', 'alumni'),
(21, 25, 15, 'Heya', '2024-04-14 21:13:00', 'student'),
(22, 26, 10, 'Please send me your resume.', '2024-04-15 15:39:09', 'student'),
(23, 27, 19, 'I am interested!', '2024-04-15 16:45:15', 'student'),
(24, 26, 20, 'Please send me your resume @bhavya@gmail.com.', '2024-04-17 15:33:28', 'student'),
(25, 31, 24, 'Hi,\n\nYes, please send me your resume.\n\nThanks', '2024-04-17 15:39:48', 'alumni'),
(26, 30, 20, 'I am interested!', '2024-04-17 18:00:07', 'student'),
(27, 31, 24, 'hey', '2024-04-17 22:32:37', 'alumni'),
(28, 34, 15, 'Hey Nathan I am interested.\nEmail : Chris@gmail.com\n\nThank you \nHope you are having a wonderfulday!', '2024-04-22 18:48:54', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `REPLIES`
--
ALTER TABLE `REPLIES`
  ADD PRIMARY KEY (`REPLY_ID`),
  ADD KEY `POST_ID` (`POST_ID`),
  ADD KEY `AUTHOR_id` (`AUTHOR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `REPLIES`
--
ALTER TABLE `REPLIES`
  MODIFY `REPLY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `REPLIES`
--
ALTER TABLE `REPLIES`
  ADD CONSTRAINT `REPLIES_ibfk_1` FOREIGN KEY (`POST_ID`) REFERENCES `POSTS` (`ID`),
  ADD CONSTRAINT `REPLIES_ibfk_2` FOREIGN KEY (`AUTHOR_ID`) REFERENCES `ALUMNI` (`ALUMNIID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
