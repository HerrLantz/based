-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2015 at 10:11 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `labb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE IF NOT EXISTS `buyer` (
  `deliverAddress` varchar(256) NOT NULL,
  `buyerMail` varchar(256) NOT NULL,
  `cardInfo` int(11) NOT NULL,
  PRIMARY KEY (`buyerMail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='smh';

-- --------------------------------------------------------

--
-- Table structure for table `confirms`
--

CREATE TABLE IF NOT EXISTS `confirms` (
  `packageID` int(11) NOT NULL,
  `buyermail` int(11) NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`packageID`,`buyermail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `contractID` int(11) NOT NULL AUTO_INCREMENT,
  `sellerMail` varchar(256) NOT NULL,
  `buyerMail` varchar(256) NOT NULL,
  `delivPrice` int(11) NOT NULL,
  `packagePrice` int(11) NOT NULL COMMENT 'priset på paketet',
  PRIMARY KEY (`contractID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100000 ;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contractID`, `sellerMail`, `buyerMail`, `delivPrice`, `packagePrice`) VALUES
(1337, 'sellman@sell.se', 'buyerman@buy.se', 100000, 5555),
(99999, '', '', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `driverID` int(11) NOT NULL AUTO_INCREMENT,
  `brn` int(11) NOT NULL,
  `ban` int(11) NOT NULL,
  PRIMARY KEY (`driverID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverID`, `brn`, `ban`) VALUES
(20, 777, 666);

-- --------------------------------------------------------

--
-- Table structure for table `dropsoff`
--

CREATE TABLE IF NOT EXISTS `dropsoff` (
  `driverID` int(11) NOT NULL,
  `buyermail` varchar(256) NOT NULL,
  `packageID` int(11) NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`driverID`,`buyermail`,`packageID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dropsoff`
--

INSERT INTO `dropsoff` (`driverID`, `buyermail`, `packageID`, `time`) VALUES
(1, 'ski@ski.se', 333333, '2015-04-15 19:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `opens`
--

CREATE TABLE IF NOT EXISTS `opens` (
  `contractID` int(11) NOT NULL AUTO_INCREMENT,
  `sellermail` varchar(256) NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`contractID`,`sellermail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Ett kontrakt skapas och får en tidsstämpel' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `packageID` int(11) NOT NULL AUTO_INCREMENT,
  `contractID` int(11) NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL,
  `length` int(10) unsigned NOT NULL,
  `weight` int(10) unsigned NOT NULL,
  `description` varchar(256) NOT NULL,
  PRIMARY KEY (`packageID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `delivprice` int(11) NOT NULL,
  `packageprice` int(11) NOT NULL,
  `time` timestamp NOT NULL,
  `contractID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`contractID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tid när betalning för ett kontrakt sker' AUTO_INCREMENT=100000 ;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`delivprice`, `packageprice`, `time`, `contractID`) VALUES
(0, 0, '2015-04-12 20:42:22', 1337);

-- --------------------------------------------------------

--
-- Table structure for table `picksup`
--

CREATE TABLE IF NOT EXISTS `picksup` (
  `packageID` int(11) NOT NULL,
  `sellermail` varchar(256) NOT NULL,
  `driverID` int(11) NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`packageID`,`sellermail`,`driverID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picksup`
--

INSERT INTO `picksup` (`packageID`, `sellermail`, `driverID`, `time`) VALUES
(0, 'BAWUS@BAUWS.se', 1, '2015-04-15 19:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE IF NOT EXISTS `seller` (
  `sellerMail` varchar(256) NOT NULL,
  `pickupAddress` varchar(256) NOT NULL,
  `ban` int(11) NOT NULL,
  `brn` int(11) NOT NULL,
  PRIMARY KEY (`sellerMail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='jag vet inte vad jag gör';

-- --------------------------------------------------------

--
-- Table structure for table `settled`
--

CREATE TABLE IF NOT EXISTS `settled` (
  `contractID` int(11) NOT NULL,
  `sellermail` int(11) NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`contractID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabell för när ett köp blir genomfört';

-- --------------------------------------------------------

--
-- Table structure for table `signs`
--

CREATE TABLE IF NOT EXISTS `signs` (
  `contractID` int(11) NOT NULL,
  `sellermail` varchar(256) NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`contractID`,`sellermail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE IF NOT EXISTS `takes` (
  `contractID` int(11) NOT NULL,
  `driverID` int(11) NOT NULL,
  `time` timestamp NOT NULL,
  PRIMARY KEY (`contractID`),
  UNIQUE KEY `contractID` (`contractID`),
  UNIQUE KEY `driverID` (`driverID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `takes`
--

INSERT INTO `takes` (`contractID`, `driverID`, `time`) VALUES
(1337, 1, '2015-04-13 19:48:52'),
(99999, 20, '2015-04-14 22:56:49');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
