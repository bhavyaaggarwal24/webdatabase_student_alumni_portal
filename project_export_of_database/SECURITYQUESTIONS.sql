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
-- Table structure for table `SECURITYQUESTIONS`
--

CREATE TABLE `SECURITYQUESTIONS` (
  `QUESTION1` varchar(256) NOT NULL,
  `ANSWER1` varchar(256) NOT NULL,
  `QUESTION2` varchar(256) NOT NULL,
  `ANSWER2` varchar(256) NOT NULL,
  `STUDENTUSERNAME` varchar(255) DEFAULT NULL,
  `ALUMNIUSERNAME` varchar(255) DEFAULT NULL,
  `SECURITYID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SECURITYQUESTIONS`
--

INSERT INTO `SECURITYQUESTIONS` (`QUESTION1`, `ANSWER1`, `QUESTION2`, `ANSWER2`, `STUDENTUSERNAME`, `ALUMNIUSERNAME`, `SECURITYID`) VALUES
('You first pet name', 'sheero', 'Your favourite teacher', 'bhavya', 'shubham', NULL, 1),
('You first pet name', 'sheero', 'Your favourite teacher', 'aaru', NULL, 'sonia', 2),
('You first pet name', 'sheero', 'Your favourite teacher', 'aaru', NULL, 'aaru', 3),
('You first pet name', 'gshs', 'Your favourite teacher', 'hejs', NULL, 'RujDesai', 4),
('You first pet name', 'dw', 'You first pet name', 'dwd', 'Charlie', NULL, 5),
('You first pet name', 'rujju', 'Your favourite teacher', 'steve', 'rutwik49', NULL, 6),
('You first pet name', 'bdfdb', 'Your favourite teacher', 'dbfhd', NULL, 'abcdefg', 7),
('You first pet name', 'nnbv', 'Your favourite teacher', 'vds', NULL, 'dbc', 8),
('You first pet name', 'gf', 'Your favourite teacher', 'fhgf', NULL, 'hghj', 9),
('You first pet name', 'gf', 'Your favourite teacher', 'fhgf', NULL, 'hghj7', 10),
('You first pet name', 'hdhj', 'Your favourite teacher', 'bdh', NULL, 'dhj', 11),
('You first pet name', 'hdhj', 'Your favourite teacher', 'bdh', NULL, 'dhj0', 12),
('You first pet name', 'jkjljl', 'Your favourite teacher', 'jkljl', NULL, 'nitishk1', 13),
('You first pet name', 'jkjljl', 'Your favourite teacher', 'jkljl', NULL, 'nitishk12', 14),
('You first pet name', 'jkjljl', 'Your favourite teacher', 'jkljl', NULL, 'nitishk1232', 15),
('You first pet name', 'jkjljl', 'Your favourite teacher', 'jkljl', NULL, 'nitishk123234', 16),
('You first pet name', 'jkjljl', 'Your favourite teacher', 'jkljl', NULL, 'nitishk123267', 17),
('You first pet name', 'ghfdhgav', 'Your favourite teacher', 'sjdgfyuegd', NULL, 'dhv', 18),
('You first pet name', 'mdbfh', 'Your favourite teacher', 'dbf', 'kavi', NULL, 19),
('You first pet name', 'mhgfjh', 'Your favourite teacher', 'fjk', 'ravi', NULL, 20),
('You first pet name', 'nbsdvn', 'Your favourite teacher', 'hdbfhjds', NULL, 'dbvh', 21),
('You first pet name', 'KKK', 'Your favourite teacher', 'KKK', 'Chris', NULL, 22),
('You first pet name', 'kutta', 'Your favourite teacher', 'xyz', 'testUser', NULL, 23),
('You first pet name', 'kutta', 'Your favourite teacher', 'xyz', 'testUser1', NULL, 24),
('You first pet name', 'Sheero', 'Your favourite teacher', 'Nitish', 'divya', NULL, 25),
('You first pet name', 'Raman', 'Your favourite teacher', 'Raman', 'raman', NULL, 26),
('You first pet name', 'Sheero', 'Your favourite teacher', 'Sheero', NULL, 'joseph', 27),
('You first pet name', 'Sheero', 'Your favourite teacher', 'Nitish', 'bhavyaaggarwal', NULL, 28),
('You first pet name', 'kutta', 'Your favourite teacher', 'xyz', NULL, 'testAlm1', 29),
('You first pet name', 'zamu', 'Your favourite teacher', 'Anna', NULL, 'Nathan', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SECURITYQUESTIONS`
--
ALTER TABLE `SECURITYQUESTIONS`
  ADD PRIMARY KEY (`SECURITYID`),
  ADD KEY `SECURITYQUESTION_ibfk_1` (`ALUMNIUSERNAME`),
  ADD KEY `SECURITYQUESTION_ibfk_2` (`STUDENTUSERNAME`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `SECURITYQUESTIONS`
--
ALTER TABLE `SECURITYQUESTIONS`
  ADD CONSTRAINT `SECURITYQUESTION_ibfk_1` FOREIGN KEY (`ALUMNIUSERNAME`) REFERENCES `ALUMNI` (`USERNAME`),
  ADD CONSTRAINT `SECURITYQUESTION_ibfk_2` FOREIGN KEY (`STUDENTUSERNAME`) REFERENCES `STUDENT` (`USERNAME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
