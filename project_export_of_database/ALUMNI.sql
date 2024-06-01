-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2024 at 06:50 PM
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
-- Table structure for table `ALUMNI`
--

CREATE TABLE `ALUMNI` (
  `ALUMNIID` int(11) NOT NULL,
  `FIRSTNAME` varchar(255) NOT NULL,
  `LASTNAME` varchar(255) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD_HASH` varchar(255) NOT NULL,
  `DEGREEEARNED` varchar(100) NOT NULL,
  `PHONENUMBER` varchar(15) NOT NULL,
  `EMAILID` varchar(256) NOT NULL,
  `ADDRESS` varchar(1000) NOT NULL,
  `JOBTITLE` varchar(256) NOT NULL,
  `INDUSTRY` varchar(256) NOT NULL,
  `GRADUATIONDATE` date NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `EMPLOYER` varchar(255) NOT NULL,
  `EMPLOYMENTSTATUS` varchar(255) NOT NULL,
  `LINKEDINPROFILE` varchar(255) NOT NULL,
  `MENTORSHITPAVAILABILITY` varchar(255) NOT NULL,
  `PRFRDMENTORSHIPAREA` varchar(255) NOT NULL,
  `PREFRDCONTACTMETHOD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ALUMNI`
--

INSERT INTO `ALUMNI` (`ALUMNIID`, `FIRSTNAME`, `LASTNAME`, `DOB`, `USERNAME`, `PASSWORD_HASH`, `DEGREEEARNED`, `PHONENUMBER`, `EMAILID`, `ADDRESS`, `JOBTITLE`, `INDUSTRY`, `GRADUATIONDATE`, `GENDER`, `EMPLOYER`, `EMPLOYMENTSTATUS`, `LINKEDINPROFILE`, `MENTORSHITPAVAILABILITY`, `PRFRDMENTORSHIPAREA`, `PREFRDCONTACTMETHOD`) VALUES
(1, 'Alka', 'Kumari', '1998-06-17', 'alka', '$2y$12$rk5yosABTs6BJjma2VIE0uijKC5l8Y8axXtRijY2EuGaU/fCnbcG6', 'Maters', '135667575645', 'alka@gmail.com', 'canal overlook', 'Developer', 'Consultancy', '2024-01-10', 'Male', 'TCS', 'Employed', 'cbhmsdfhjkgdfngfd', 'Yes', 'None', 'Email'),
(2, 'Bhavya', 'Aggarwal', '2024-02-27', 'bhavya', '$2y$12$3E7QBRn26EEcdMxtrty5lewLBQENlGhBA5TT5mXFB/6Mw2Pzrp.ZO', 'Maters', '53453453453', 'bhavya_goyal@yahoo.co.in', 'Londonerry Lane', 'Developer', 'Consultancy', '2024-04-04', 'Female', 'TCS', 'Employed', 'cbhmsdfhjkgdfngfd', 'No', 'NA', 'Email'),
(3, 'Shyam', 'Bhati', '2024-02-26', 'shyam', '$2y$12$QETfl0kUuSNs7TD9bBnwoO3ykg9i6as3jGEAH7KrLwSKN7sZUHz1u', 'adsfsdf', '12334', 'shyam@gmail.com', '3qwrefsdf', 'Developer', 'Consultancy', '2024-03-26', 'Male', 'TCS', 'Employed', 'fsdfsfsfs', 'Yes', 'fsdfsf', 'Email'),
(4, 'Bhavya', 'Aggarwal', '2024-04-01', 'bhavya1', '$2y$12$haY4ztBCiX4pquBHTSLpKeTWs3uvOOm8J51BT/jxP01bTyyBgqULy', 'adsfsdf', '13176273804', 'bhavya_goyal@yahoo.co.in1', '1127 Londonerry Lane', 'Developer', 'Consultancy', '2024-04-01', 'Male', 'TCS', 'Employed', 'fsdfsfsfs', 'Yes', 'fsdfsf', 'Email'),
(5, 'Bhavya', 'Aggarwal', '2024-04-01', 'bhavya2', '$2y$12$TdHNoRqnMTbP1eozUgMi3e71tsyIb6q1oMUbvLiyL4welt72.IbCK', 'adsfsdf', '1317627380', 'bhavya2_goyal@yahoo.co.in1', '1127 Londonerry Lane', 'Developer', 'Consultancy', '2024-04-01', 'Male', 'TCS', 'Employed', 'fsdfsfsfs', 'Yes', 'fsdfsf', 'Email'),
(6, 'kapil', 'sharma', '2024-04-09', 'kapil', '$2y$12$5gePxF129Cmg1e2BN49bi.00EjKy2VXYQYBccm22corwB8BKLLM8q', 'asdasd', '1234567891', 'kapil_sharma@gmail.com', 'Londonerry Lane', 'sdsad', 'dsadasd', '2024-04-30', 'Male', 'sdasd', 'sadasd', 'dasd', 'Yes', 'sadsad', 'Email'),
(7, 'Sonia', 'Goyal', '2024-04-08', 'sonia', '$2y$12$v.axxMQaDY0l2OOenn7YxO/4JSAX3hqrvZk9MBSAxTbLU/0UOTFgK', 'xxbhjdf', '6574839567', 'sonia@gmail.com', 'vdsdgf', 'dmbndvbsd', 'bvbds', '2024-04-02', 'Female', 'xbvhbs', 'cjdbh', 'mnvbbfbf', 'No', 'xnbvjhds', 'Phone'),
(8, 'aaru', 'Goyal', '2022-01-24', 'aaru', '$2y$12$6x7wyRckrihals3ylr4WEeL8ZJfFgTmIZUciUh7Mst7WsNlFTeG7.', 'Master', '653389743b', 'aaru@gmail.com', 'ottawa', ' cdsnbc', 'bdhcba', '2024-05-08', 'Female', 'bdhfcbfa', 'db', 'db cnbsd', 'Yes', 'abdb', 'Email'),
(9, 'Rujuta', 'Desai', '1996-07-10', 'RujDesai', '$2y$12$djUmwme09hqPo4RjobzNoO8oMGhluslNsIIoykP8Ny15zydawv8OK', 'Masters', '4632560378', 'rujuta.desai.5@gmail.com', '821 hhdjdjd', 'Data Scientist', 'It', '2024-04-09', 'Female', 'Microsoft ', 'Employed', 'Hdhdjdj', 'Yes', 'Any', 'Email'),
(10, 'Nitish', 'Gangwar', '1991-09-05', 'abcdefg', '$2y$12$.qUCd/U7KVsgkMY25uJuj.dOrKzEes0AmetXjGlhEpTIabgmdDGlu', 'bvndsbm', '6482549375', 'abcdefg@gmail.com', 'dbfhs', 'ddv', 'vsdfv', '2024-04-25', 'Male', 'hsddvfhjs', 'dbfh', 'bsdbvfh', 'Yes', 'ndfvhds', 'Email'),
(11, 'Bhavya', 'Aggarwal', '2024-04-01', 'dbc', '$2y$12$c8h557WWWpS1jCCS9GPwxe6Y6aNGKBWNMaII19Ye/sNnKFGxniM16', 'hsbd', '5476835497', 'bhavya_goyal24@yahoo.co.in', 'Londonerry Lane', 'hgdhjd', 'dhfd', '2024-05-04', 'Female', 'sdhv', 'xvbjhd', 'hdvdhv', 'Yes', 'bdvf', 'Email'),
(12, 'Bhavya', 'Aggarwal', '2024-04-24', 'hghj', '$2y$12$nk7t4y7LVXpgA8CUXyfCGO2T/A9eF627tKCf.Tp0id3SZroFSMZBe', 'vfvg', '8740854307', 'bhavya_goyal8@yahoo.co.in', 'Londonerry Lane', 'hfg', 'gdf', '2024-05-11', 'Male', 'fdgf', 'vhjv', 'thfth', 'Yes', 'hfg', 'Email'),
(13, 'Bhavya', 'Aggarwal', '2024-04-24', 'hghj7', '$2y$12$PFPnXhyzl5pIHKgFVW5XHeUZCRDZiDF3ssoD5b95Nbzn4Qf8OF1y6', 'vfvg', '8740857307', 'bhavya_goyal10@yahoo.co.in', 'Londonerry Lane', 'hfg', 'gdf', '2024-05-11', 'Male', 'fdgf', 'vhjv', 'thfth', 'Yes', 'hfg', 'Email'),
(14, 'nscj', 'scb', '2024-12-31', 'dhj', '$2y$12$otFFNl7REUczXUpO5/uRUeCs6nA1Azh4ZxDtNdIdcU0F3HPbGyuJi', 'bhdcb', '5485320987', 'abc@gmail.com', 'hjdcghj', 'bvc', 'cbv', '2024-05-10', 'Male', 'dbcv', 'dcbh', 'cbv', 'Yes', 'dhcv', 'Email'),
(15, 'nscj', 'scb', '2024-12-31', 'dhj0', '$2y$12$saC5TqlYTMS0N4eKp4qlGuye66oTBjg2P1b92CS0y09rkKSZIiYk6', 'bhdcb', '5485320980', 'abcd@gmail.com', 'hjdcghj', 'bvc', 'cbv', '2024-05-10', 'Male', 'dbcv', 'dcbh', 'cbv', 'Yes', 'dhcv', 'Email'),
(16, 'Bhavya', 'Aggarwal', '2024-04-12', 'nitishk1', '$2y$12$BN3fcR7NKtthK9xmA4aGv.ROi7LKa/Fy2Wzfky9fqvCxr15H3CEbK', 'United', '1234352342', 'bhavya_goyal54@yahoo.co.in', 'Londonerry Lane', ' fnmb cfn', 'cbv', '2024-04-19', 'Male', 'TCS', 'db', 'dsfsdfds', 'Yes', 'kljljl', 'Email'),
(17, 'Bhavya', 'Aggarwal', '2024-04-12', 'nitishk12', '$2y$12$7i9O2O.ruHGJTENWT53a2uPYivqSZuGeUW2rWhG2IOFalLMP/70om', 'United', '1234352442', 'bhavya_goyal543@yahoo.co.in', 'Londonerry Lane', ' fnmb cfn', 'cbv', '2024-04-19', 'Male', 'TCS', 'db', 'dsfsdfds', 'Yes', 'kljljl', 'Email'),
(18, 'Bhavya', 'Aggarwal', '2024-04-12', 'nitishk1232', '$2y$12$oqIyAWEuzNL6mxd1B2pdKe0haap1CnK7hJlllZ0yOO.g8MPKK3fRi', 'United', '1234352432', 'bhavya_goyal543453@yahoo.co.in', 'Londonerry Lane', ' fnmb cfn', 'cbv', '2024-04-19', 'Male', 'TCS', 'db', 'dsfsdfds', 'Yes', 'kljljl', 'Email'),
(19, 'Bhavya', 'Aggarwal', '2024-04-12', 'nitishk123234', '$2y$12$sUhBHXdLQ8L1pUfPosLle.Tz66wCF1xhtHf.43DwwTTEXWeAgdUS2', 'United', '1234352419', 'bhavya_goyal532453@yahoo.co.in', 'Londonerry Lane', ' fnmb cfn', 'cbv', '2024-04-19', 'Male', 'TCS', 'db', 'dsfsdfds', 'Yes', 'kljljl', 'Email'),
(20, 'Bhavya', 'Aggarwal', '2024-04-12', 'nitishk123267', '$2y$12$PimYyhbqt1z7AxkjJVp2cuhd0.ZHxx57HFkUV4TbZHi8qDtNhlxFG', 'United', '1234352478', 'bhavya_goyal532498@yahoo.co.in', 'Londonerry Lane', ' fnmb cfn', 'cbv', '2024-04-19', 'Male', 'TCS', 'db', 'dsfsdfds', 'Yes', 'kljljl', 'Email'),
(21, 'cdbs', 'bkhdbc', '2024-04-09', 'dhv', '$2y$12$NXVCpPLS2mYWIlJXEvUZdeSqZzI34fvCWvR213RgXJlAnLtGjCZva', 'vdg', '5647848579', 'vgh@gmail', 'jhgcg', 'fghdfhga', 'vdgfhg', '2024-04-01', 'Male', 'hgdfchg', 'dvjga', 'dvcgdvgh', 'Yes', 'asvdhgasfhg', 'Email'),
(22, 'xfbvxmfb', 'bfxvnbfx', '2024-05-11', 'dbvh', '$2y$12$QArhruD4jGqpXAwoWoNmlOjO2BTOYyCnGOBTXkH4KpHj65kpvkCsa', 'vfjghj', '7643976543', 'sjdgjh@gmail.com', 'hsgfhj', 'sfsvhj', 'fghg', '2024-05-10', 'Male', 'shdgfs', 'hafhagf', 'fgv', 'Yes', 'jhfgsj', 'Email'),
(23, 'Joseph', 'Gill', '2013-06-05', 'joseph', '$2y$12$t418Szc6NRu0K1o2Mmx33uBXIi4Br7Cuk7.Cs/vQSklImjqyQSCCK', 'Masters', '1234567890', 'joseph@gmail.com', 'USA', 'ABC', 'ABC', '2024-02-07', 'Male', 'cummins', 'Employed', 'https://linkedin/joseph', 'Yes', 'Any', 'Email'),
(24, 'Hardik', 'Gangwar', '2003-06-16', 'testAlm1', '$2y$12$UBqYDCvqaa/sa74km5lU9.hkC2Fj9NwDqSxz.GtJ2gj1LqM7eMxiW', 'Masters', '4321678765', 'testAlm@gmail.com', 'USA', 'Developer', 'Consulting', '2002-11-11', 'Male', 'AMC', 'Employed', 'https://linkedin/hardik', 'Yes', 'Any', 'Email'),
(25, 'Nathan', 'G', '2000-07-10', 'Nathan', '$2y$12$uKAMT3JkLdHEEqX95hSRm.XuMHCxrYGOt21vjqlfAsH9JRDdHv3Oi', 'Applied data science', '1526965487', 'nathan@gmail.com', '821 DR MLK JR STREET', 'Developer', 'IT', '2022-01-01', 'Male', 'IBM', 'Employed', 'ferfefef', 'Yes', 'Any', 'Email');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ALUMNI`
--
ALTER TABLE `ALUMNI`
  ADD PRIMARY KEY (`ALUMNIID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD UNIQUE KEY `PHONENUMBER` (`PHONENUMBER`),
  ADD UNIQUE KEY `EMAILID` (`EMAILID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
