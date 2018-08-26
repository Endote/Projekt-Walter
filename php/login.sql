-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2018 at 05:46 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `Login` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Phone` int(11) NOT NULL,
  `ActivationCode` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `EmailStatus` enum('not verified','verified') NOT NULL,
  `Favourites` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Login`, `Password`, `Email`, `Phone`, `ActivationCode`, `EmailStatus`, `Favourites`) VALUES
(22, 'test4', '1b8xtho0cked1bcazh2xwn0fwgag2zflcb45c671cbc500627ea424eea5f91996221b5935', 'dfdgfd@op.pl', 0, 'e820a45f1dfc7b95282d10b6087e11c0', 'verified', '1.2'),
(23, 'test', 'ygjw9zn7winr8oqb18kp1wp4i7uqr9qscb45c671cbc500627ea424eea5f91996221b5935', 'sdfwseddewger@op.pl', 0, '9de6d14fff9806d4bcd1ef555be766cd', 'not verified', '1'),
(25, 'Rade2', 'cdb03ee189d5676b3d2dea78d520035167d764e6f3e1be2fa9479a7e0df9000a401daf80', 'b1925720@nwytg.net', 123456789, '069d3bb002acd8d7dd095917f9efe4cb', 'verified', '2'),
(26, 'Rade7', '089a232dcc8dd8db3de554134681520e3ee97343c7065d6407a39381f8f02d07340beb67', 'asdfwef@op.pl', 234567891, 'd707329bece455a462b58ce00d1194c9', 'not verified', ''),
(28, 'Rade9', '9722556a0094c9b5d8b3d517271929ee3ee97343c7065d6407a39381f8f02d07340beb67', 'asdasd@op.pl', 234567891, 'e2c420d928d4bf8ce0ff2ec19b371514', 'verified', '1.2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
