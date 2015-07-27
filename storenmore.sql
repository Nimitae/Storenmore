-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2015 at 04:11 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `storenmore`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
`id` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `contactType` int(11) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equiptags`
--

CREATE TABLE IF NOT EXISTS `equiptags` (
`id` int(11) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eyeballs`
--

CREATE TABLE IF NOT EXISTS `eyeballs` (
`id` int(11) NOT NULL,
  `eyeballType` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `imageURL` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) NOT NULL,
  `fromUser` varchar(20) NOT NULL,
  `toUser` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `goodsID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `orderType` int(11) NOT NULL,
  `priceType` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `orderTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `statusTimestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personalisation`
--

CREATE TABLE IF NOT EXISTS `personalisation` (
  `username` varchar(20) NOT NULL,
  `avatarURL` varchar(100) NOT NULL,
  `biography` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reputation`
--

CREATE TABLE IF NOT EXISTS `reputation` (
`id` int(11) NOT NULL,
  `fromUser` varchar(20) NOT NULL,
  `toUser` varchar(20) NOT NULL,
  `message` varchar(500) DEFAULT NULL,
  `value` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tagging`
--

CREATE TABLE IF NOT EXISTS `tagging` (
  `tagID` int(11) NOT NULL,
  `equipID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded`
--

CREATE TABLE IF NOT EXISTS `uploaded` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `imageURL` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `priceType` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `uploadTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `statusTimestamp` int(11) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `referrer` varchar(20) DEFAULT NULL,
  `referlink` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`);

--
-- Indexes for table `equiptags`
--
ALTER TABLE `equiptags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eyeballs`
--
ALTER TABLE `eyeballs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`), ADD KEY `fromUser` (`fromUser`), ADD KEY `toUser` (`toUser`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `goodsID` (`goodsID`), ADD KEY `username` (`username`);

--
-- Indexes for table `personalisation`
--
ALTER TABLE `personalisation`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `reputation`
--
ALTER TABLE `reputation`
 ADD PRIMARY KEY (`id`), ADD KEY `fromUser` (`fromUser`), ADD KEY `toUser` (`toUser`);

--
-- Indexes for table `tagging`
--
ALTER TABLE `tagging`
 ADD PRIMARY KEY (`tagID`,`equipID`), ADD KEY `equipID` (`equipID`);

--
-- Indexes for table `uploaded`
--
ALTER TABLE `uploaded`
 ADD PRIMARY KEY (`id`), ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`username`), ADD KEY `referrer` (`referrer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equiptags`
--
ALTER TABLE `equiptags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eyeballs`
--
ALTER TABLE `eyeballs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reputation`
--
ALTER TABLE `reputation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uploaded`
--
ALTER TABLE `uploaded`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`fromUser`) REFERENCES `users` (`username`),
ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`toUser`) REFERENCES `users` (`username`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`goodsID`) REFERENCES `goods` (`id`),
ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `personalisation`
--
ALTER TABLE `personalisation`
ADD CONSTRAINT `personalisation_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `reputation`
--
ALTER TABLE `reputation`
ADD CONSTRAINT `reputation_ibfk_1` FOREIGN KEY (`fromUser`) REFERENCES `users` (`username`),
ADD CONSTRAINT `reputation_ibfk_2` FOREIGN KEY (`toUser`) REFERENCES `users` (`username`);

--
-- Constraints for table `tagging`
--
ALTER TABLE `tagging`
ADD CONSTRAINT `tagging_ibfk_1` FOREIGN KEY (`tagID`) REFERENCES `equiptags` (`id`),
ADD CONSTRAINT `tagging_ibfk_2` FOREIGN KEY (`equipID`) REFERENCES `uploaded` (`id`);

--
-- Constraints for table `uploaded`
--
ALTER TABLE `uploaded`
ADD CONSTRAINT `uploaded_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`referrer`) REFERENCES `users` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
