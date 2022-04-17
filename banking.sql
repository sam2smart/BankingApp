-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 01:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransID` int(11) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Phone` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `accNum` varchar(25) NOT NULL,
  `WithDraw` varchar(25) NOT NULL,
  `Ball` varchar(25) NOT NULL,
  `WtdrDate` varchar(25) NOT NULL,
  `Treated` varchar(25) NOT NULL,
  `TreatedDate` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransID`, `FirstName`, `LastName`, `Phone`, `Email`, `accNum`, `WithDraw`, `Ball`, `WtdrDate`, `Treated`, `TreatedDate`, `state`) VALUES
(27, 'james', 'smart', '08168439371', 'admin@gmail.com', '9780010744', '', '40000', '', '', '', ''),
(28, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '42', '42', '22-04-12 11:35:28am', 'Processing..', '', 'Credited'),
(34, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '50', '92', '22-04-12 12:28:08pm', 'Processing..', '', 'Credited'),
(35, 'james', 'smart', '08168439371', 'admin@gmail.com', '9780010744', '50', '39950', '22-04-12 12:28:08pm', 'Processing..', '', 'withdrawal'),
(36, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '50', '92', '22-04-12 01:02:03pm', 'Processing..', '', 'Credited'),
(37, 'james', 'smart', '08168439371', 'admin@gmail.com', '9780010744', '50', '39950', '22-04-12 01:02:03pm', 'Processing..', '', 'withdrawal'),
(38, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '43', '85', '22-04-12 07:50:31pm', 'Processing..', '', 'Credited'),
(39, 'james', 'smart', '08168439371', 'admin@gmail.com', '9780010744', '43', '39957', '22-04-12 07:50:31pm', 'Processing..', '', 'withdrawal'),
(40, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '34', '76', '22-04-13 08:32:59am', 'Successful', '', 'Credited'),
(41, 'james', 'smart', '08168439371', 'admin20@gmail.com', '9780010744', '34', '39966', '22-04-13 08:32:59am', 'Successful', '', 'withdrawal'),
(42, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '51', '93', '22-04-13 09:00:42am', 'Successful', '', 'Credited'),
(43, 'james', 'smart', '08168439371', 'admin20@gmail.com', '9780010744', '51', '39949', '22-04-13 09:00:42am', 'Successful', '', 'withdrawal'),
(44, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '50', '92', '22-04-13 09:55:57am', 'Successful', '', 'Credited'),
(45, 'james', 'smart', '08168439371', 'admin20@gmail.com', '9780010744', '50', '39950', '22-04-13 09:55:57am', 'Successful', '', 'withdrawal'),
(46, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '50', '92', '22-04-13 10:25:49am', 'Successful', '', 'Credited'),
(47, 'james', 'smart', '08168439371', 'admin20@gmail.com', '9780010744', '50', '39950', '22-04-13 10:25:49am', 'Successful', '', 'withdrawal'),
(48, 'james', 'smart', '08168439371', 'admin20@gmail.com', '9780010744', '50', '40050', '22-04-13 11:51:55am', 'Successful', '', 'Credited'),
(49, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '50', '-8', '22-04-13 11:51:55am', 'Successful', '', 'withdrawal'),
(50, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '500', '542', '22-04-13 01:35:42pm', 'Successful', '', 'Credited'),
(51, 'james', 'smart', '08168439371', 'admin20@gmail.com', '9780010744', '500', '39500', '22-04-13 01:35:42pm', 'Successful', '', 'withdrawal'),
(52, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '50', '92', '22-04-13 01:40:00pm', 'Successful', '', 'Credited'),
(53, 'james', 'smart', '08168439371', 'admin20@gmail.com', '9780010744', '50', '39950', '22-04-13 01:40:00pm', 'Successful', '', 'withdrawal'),
(54, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '80', '122', '22-04-13 01:41:56pm', 'Successful', '', 'Credited'),
(55, 'james', 'smart', '08168439371', 'admin20@gmail.com', '9780010744', '80', '39920', '22-04-13 01:41:56pm', 'Successful', '', 'withdrawal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `LastName` varchar(25) NOT NULL,
  `Phone` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `accNum` varchar(25) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `otps` varchar(5) NOT NULL,
  `admin` varchar(6) NOT NULL,
  `Ball` varchar(26) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `FirstName`, `LastName`, `Phone`, `Email`, `accNum`, `upass`, `otps`, `admin`, `Ball`) VALUES
(1, 'sammy', 'james', '493534593459', 'samuel@gmail.com', '9780010722', '$2y$10$UVXz.Tjnt0ogB2Aqt/iBrOdMGr1GJMk4h0FdkHg8Q3yNxH3NdD9C6', '', '', '122'),
(6, 'james', 'smart', '08168439371', 'admin20@gmail.com', '9780010744', '$2y$10$YkL9Im8hDzTML/nuL0snvu5q0cUxW9eQci5Xx3Dcd10qSCqkEjmiW', '', '', '39920'),
(9, 'adewale', 'james', '9932993439', 'admin@gmail.com', '6811533386', '$2y$10$XQ4rklp2FzcChtRTqRAfOeh3rTPu.rlqWVJzK/ujCpbO6KuC728wG', '', 'admin', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TransID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
