-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 01:12 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contacts`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `idcontact` int(11) NOT NULL,
  `contactName` varchar(45) NOT NULL,
  `numberOfPhone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`idcontact`, `contactName`, `numberOfPhone`) VALUES
(1, 'mohamed', '0115430303'),
(3, 'mostafa ali', '123'),
(26, 'ahmad', '01157126303');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('m','f') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `userName`, `email`, `hash`, `birthday`, `gender`) VALUES
(1, 'mohamed', 'amohamedahmad68@gmail.com', '$2y$10$DbmEEXvQLnAIh2gbLPL2hOJggc3eoNKwrr4ThQ1tzG.ghEuHdXnlq', '2004-11-13', 'm'),
(2, 'ahmad', 'ali@gmail.com', '$2y$10$b6UrsQ2ELvivLYqQDmwZXOco3yeQnTw7z.Ol6f2dSjG9wRkFfuMDS', '2007-10-16', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `usercontacts`
--

CREATE TABLE `usercontacts` (
  `UhasId` int(11) NOT NULL,
  `ChasId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usercontacts`
--

INSERT INTO `usercontacts` (`UhasId`, `ChasId`) VALUES
(1, 1),
(1, 26),
(2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`idcontact`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `usercontacts`
--
ALTER TABLE `usercontacts`
  ADD PRIMARY KEY (`UhasId`,`ChasId`),
  ADD KEY `fk_user_has_contacts_contacts1_idx` (`ChasId`),
  ADD KEY `fk_user_has_contacts_user_idx` (`UhasId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `idcontact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usercontacts`
--
ALTER TABLE `usercontacts`
  ADD CONSTRAINT `fk_user_has_contacts_contacts1` FOREIGN KEY (`ChasId`) REFERENCES `contacts` (`idcontact`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_has_contacts_user` FOREIGN KEY (`UhasId`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
