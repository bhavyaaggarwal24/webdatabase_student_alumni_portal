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
-- Table structure for table `STUDENT`
--

CREATE TABLE `STUDENT` (
  `STUDENTID` int(11) NOT NULL,
  `FIRSTNAME` varchar(255) NOT NULL,
  `LASTNAME` varchar(255) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD_HASH` varchar(255) NOT NULL,
  `PROGRAM` varchar(100) NOT NULL,
  `PHONENUMBER` varchar(15) NOT NULL,
  `EMAILID` varchar(256) NOT NULL,
  `ADDRESS` varchar(1000) NOT NULL,
  `ENROLLMENTDATE` date NOT NULL,
  `EXPECTEDGRADUATIONDATE` date NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `GPA` varchar(10) NOT NULL,
  `STATUS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `STUDENT`
--

INSERT INTO `STUDENT` (`STUDENTID`, `FIRSTNAME`, `LASTNAME`, `DOB`, `USERNAME`, `PASSWORD_HASH`, `PROGRAM`, `PHONENUMBER`, `EMAILID`, `ADDRESS`, `ENROLLMENTDATE`, `EXPECTEDGRADUATIONDATE`, `GENDER`, `GPA`, `STATUS`) VALUES
(2, 'Nitish', 'Kumar', '2024-02-26', 'nitish', '$2y$12$z30/3Tigyk2wL/MKlj/pLuHyN8XD1aSsdIdePkcKDKwDliyVBBA22', 'Masters', '123456789976', 'nitish@gmail.com', 'Londonerry Lane', '2023-08-15', '2025-02-06', 'Male', '4', 'Active'),
(3, 'Rujuta', 'Desai', '1996-07-10', 'RujutaDesai', '$2y$12$pxR3.2lNNHnAJs32WmGKEe98Z.ZmDsyx2L9tM4NiEMkuOwgyM5tOq', 'ADS', '9673344258', 'rujdesai@iu.edu', '821 DR MLK JR STREET', '2022-05-15', '2024-12-01', 'Female', '3.9', 'Active'),
(4, 'Bhavya', 'Aggarwal', '2024-02-27', 'bhavya1', '$2y$12$VlGoPKuxpT.HXhhNBHmZM.WR06VzPr4uxBi4YYJyhjlBcvwRFKgo6', 'nkdsbfsd', '1234567890', 'bhavya_goyal@gmail.com', 'ry Lane', '2024-03-05', '2024-03-26', 'Male', '2', 'Active'),
(5, 'Nitish', 'Kumar', '2024-02-27', 'nitish1', '$2y$12$Bz/B5ZOL/RFvwSVnMlP0/uZEs2xVo10ksJKqQZRyh0Xyy7Th5GosO', 'sfdgdrg', '1325374765', 'nitish1@gmail.com', 'ssgdgf', '2024-03-13', '2024-03-26', 'Male', '4', 'Active'),
(6, 'Nitish', 'Kumar', '2024-02-27', 'nitish2', '$2y$12$vERml6uoZURxT454zM06MOGWYN4c0t2utG7LoZnRbLGhxGDEjMo2a', 'sfdgdrg', '1325374763', 'nitish12@gmail.com', 'ssgdgf', '2024-03-13', '2024-03-26', 'Male', '4', 'Active'),
(7, 'Anshul', 'Saxena', '2024-03-05', 'anshul1', '$2y$12$1FYp6w73kNQJD2k598hKX.35u4IkP.07jrzXGF/XhWSY2PY/LwS26', 'hfghsgfhd', '1456435352', 'anshul@gmail.com', 'dfdsgffhgf', '2024-03-20', '2024-04-03', 'Male', '3', 'Active'),
(8, 'Bhavya', 'Aggarwal', '2024-03-31', 'abc', '$2y$12$jc3Rp5t7wcdmR9bOJPPcYOSewHD6szJtE1Y.bfiC4.fonOxkX360u', 'nkdsbfsd', '1234567899', 'bhavya_goyal@com', 'ry Lane', '2024-04-04', '2024-05-08', 'Male', '2', 'Active'),
(9, 'Uma', 'Aggarwal', '2024-04-01', 'uma', '$2y$12$jQ3ufKWUX7PU4tjdJQZg..lVVYnPHwIA597AX6gg37xe3gNWhd.yq', 'dcsdv', '1234667890', 'Uma@gmail.com', 'Londonerry La', '2024-04-09', '2024-05-02', 'Female', '4', 'Active'),
(10, 'Shubham', 'Goyal', '1990-04-08', 'shubham', '$2y$12$n3yQrIxcVx9nwrSilmSifeVnXqe70IahY/zNHnP4jmmEyCbnkrDsy', 'Master', '6305736388', 'shubham@gmail.com', 'canada', '2024-04-09', '2024-05-01', 'Male', '3.8', 'Onleave'),
(11, 'Charlie', 'Harper', '1998-10-13', 'Charlie', '$2y$12$JgCYlLm4xD.ThJBfTamIzOJjR.4F535QlRTeBEpGr3Bngdgffl2Uu', 'kdwhkdhw', '5214639874', 'gdjwhdjk@gmail.com', 'hdkwhjfk', '2024-04-02', '2024-05-07', 'Male', '3.2', 'Active'),
(12, 'rutwik', 'gudipati', '1998-09-08', 'rutwik49', '$2y$12$9yWHAc3LhQLLOKzsybsS9u2NU3CsrgO2998WPU7UvM1jgUf9Phlwm', 'ads', '3174923159', 'rutwik123@gmail.com', 'egw', '2023-01-01', '2025-01-01', 'Male', '3.7', 'Active'),
(13, 'kavi', 'singh', '2024-04-09', 'kavi', '$2y$12$A2gtfC.EBCnvUghzPxTBbeSYv6DsLd2SC4NG.klsuiP7dMM9eK6Lq', 'fndbf', '8549765324', 'kavi@gmail.com', 'hdhg', '2024-05-03', '2024-05-09', 'Male', '3', 'Active'),
(14, 'ravi', 'singh', '2024-04-08', 'ravi', '$2y$12$vCiKJWp49D1oAylaqjNVceqikOMBrVGQAk8qSYfK7U74VdxdPaToy', 'mdsfjjhg', '8757086543', 'ravi@gmail.com', 'bhjdgjy', '2024-05-04', '2024-05-10', 'Male', '4', 'Active'),
(15, 'Chris', 'Gill', '2000-02-15', 'Chris', '$2y$12$psl1f3LkM5oqAypw4CBX4.wUvNkpQdINtwJBNviMYXA/uvcZxJjc2', 'ADS', '1542036654', 'c@g.c', 'jjj', '2023-01-01', '2025-12-12', 'Male', '3.2', 'Active'),
(16, 'Hardik', 'Gangwar', '1960-10-10', 'testUser', '$2y$12$Il0SRp3uuVRxBl2QAiLBbeV.UcoAK5BTruw9YTRFLR1r995jJGa16', 'Masters', '3178797982', 'testUser@gmail.com', 'xyz lane Apt 1432', '2012-01-23', '2012-01-23', 'Male', '3.4', 'Active'),
(17, 'Hardik', 'Gangwar', '2003-10-10', 'testUser1', '$2y$12$52zWHeWryzZyjv/VMuOGBeY6RE72kEnkfvCJ5aHfja4vPfDfGyohm', 'sdhfkjh', '3924728472', 'testUser1@gmail.com', 'fhskfhs', '2012-01-23', '2025-12-27', 'Male', '3', 'Onleave'),
(18, 'Divya', 'Aggarwal', '2024-04-01', 'divya', '$2y$12$gldfYLQcVKtNgDhIl/veYOYTGFD/0SY0Oaz.lYMWou16yHFwJWME6', 'Masters', '8765439756', 'divya@yahoo.co.in', 'Londonerry Lane', '2024-04-02', '2028-01-15', 'Female', '2.9', 'Active'),
(19, 'Raman', 'Sharma', '2008-01-16', 'raman', '$2y$12$pL5U/ha8r4MyLW3LYxG2N.kBosgc5Kf2HdyNS9CkB3CY7Cuwv.i2G', 'Phd', '6547496459', 'raman@gmail.com', 'Greenwood', '2023-10-31', '2024-05-10', 'Male', '3.4', 'Active'),
(20, 'Bhavya', 'Aggarwal', '1994-06-24', 'bhavyaaggarwal', '$2y$12$ORQDHEVY.giMr3JxGbq3z.kP4jbUjT1o1jWchrTcrY6d0KDuWiVL6', 'Master\'s', '3174569875', 'bhavya_goyal@yahoo.co.in', 'Londonerry Lane', '2023-01-09', '2024-06-30', 'Female', '3.9', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `STUDENT`
--
ALTER TABLE `STUDENT`
  ADD PRIMARY KEY (`STUDENTID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD UNIQUE KEY `PHONENUMBER` (`PHONENUMBER`),
  ADD UNIQUE KEY `EMAILID` (`EMAILID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
