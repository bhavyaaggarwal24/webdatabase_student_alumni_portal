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
-- Table structure for table `POSTS`
--

CREATE TABLE `POSTS` (
  `ID` int(11) NOT NULL,
  `AUTHOR_ID` int(11) DEFAULT NULL,
  `CONTENT` text DEFAULT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `TITLE` text DEFAULT NULL,
  `AUTHOR_TYPE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `POSTS`
--

INSERT INTO `POSTS` (`ID`, `AUTHOR_ID`, `CONTENT`, `CREATED_AT`, `TITLE`, `AUTHOR_TYPE`) VALUES
(17, 8, 'hi', '2024-04-09 20:47:36', '', 'student'),
(18, 7, 'good morning\n', '2024-04-09 20:48:28', '', 'alumni'),
(20, 7, 'Hi, My company is hiring.', '2024-04-10 14:14:21', 'Job posting', 'alumni'),
(21, 8, 'Hi, We are hiring. Interested students, kindly email me your resume at aaru@gmail.com.', '2024-04-10 14:18:21', 'Hiring!', 'student'),
(22, 7, 'dfgfghf', '2024-04-10 14:19:20', 'ghfgxhfhf', 'alumni'),
(23, 7, 'Hi', '2024-04-13 16:43:47', 'Hi', 'alumni'),
(24, 7, 'My company is hiring!', '2024-04-14 15:13:56', 'Hiring', 'alumni'),
(25, 10, 'heloo', '2024-04-14 16:30:40', 'hello', 'student'),
(26, 15, 'Need a referral for summer internship 2024', '2024-04-14 21:12:28', 'Internship referral', 'student'),
(27, 7, 'Opening for data analyst role. ', '2024-04-15 15:42:03', 'Hiring!', 'alumni'),
(30, 8, 'My company is hiring Interns.', '2024-04-15 17:32:57', 'Hiring', 'alumni'),
(31, 20, 'Dear Alumni,\n\nCould you please refer me in company ABC? \n\nThanks,', '2024-04-17 15:34:34', 'Need referral!', 'student'),
(32, 20, 'Hello, Need an internship', '2024-04-17 22:29:00', 'Need Internship', 'student'),
(33, 24, 'Meeting on 1st may', '2024-04-17 22:32:15', 'Alumni meet', 'alumni'),
(34, 25, 'Reply with your email id for the opportunity', '2024-04-22 18:47:38', 'Internship Referral', 'alumni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `POSTS`
--
ALTER TABLE `POSTS`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AUTHOR_ID` (`AUTHOR_ID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `POSTS`
--
ALTER TABLE `POSTS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `POSTS`
--
ALTER TABLE `POSTS`
  ADD CONSTRAINT `POSTS_ibfk_1` FOREIGN KEY (`AUTHOR_ID`) REFERENCES `ALUMNI` (`ALUMNIID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
