-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 02:29 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shamcentercontactsso`
--

-- --------------------------------------------------------

--
-- Table structure for table `shamcenter`
--

CREATE TABLE `shamcenter` (
  `ContactID` int(20) NOT NULL,
  `FirstName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PersNum` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Adress` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PostNum` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MobNum` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Date` datetime NOT NULL,
  `Money` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shamcenter`
--

INSERT INTO `shamcenter` (`ContactID`, `FirstName`, `LastName`, `PersNum`, `Adress`, `PostNum`, `MobNum`, `Email`, `Date`, `Money`) VALUES
(12, 'Omar ', 'Abdallah', '1234567890', 'OxieNÃ¥gonstans', '255 25', '0708060402', 'omar@gnail.la7me', '2019-03-16 00:00:00', 75),
(13, 'Salam ', 'muhialdeen', '0111290078', 'Ekgatan 27 ', '213 63 ', '3', 'slome.lord123@gmail.com', '2019-04-13 00:00:00', 100),
(33, '', '', '', '', '', '', '', '2019-03-29 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shamcenter`
--
ALTER TABLE `shamcenter`
  ADD PRIMARY KEY (`ContactID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shamcenter`
--
ALTER TABLE `shamcenter`
  MODIFY `ContactID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
