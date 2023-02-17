-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2023 at 11:03 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atractiepark`
--

-- --------------------------------------------------------

--
-- Table structure for table `achtbaan`
--

DROP TABLE IF EXISTS `achtbaan`;
CREATE TABLE IF NOT EXISTS `achtbaan` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `NaamAchtbaan` varchar(100) NOT NULL,
  `NaamPretpark` varchar(100) NOT NULL,
  `Land` varchar(100) NOT NULL,
  `Topsnelheid` smallint(100) NOT NULL,
  `Hoogte` int(100) NOT NULL,
  `Datum` varchar(100) NOT NULL,
  `Cijfer` decimal(4,1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `achtbaan`
--

INSERT INTO `achtbaan` (`Id`, `NaamAchtbaan`, `NaamPretpark`, `Land`, `Topsnelheid`, `Hoogte`, `Datum`, `Cijfer`) VALUES
(6, 'Red Force', 'Ferrari Land', 'Spanje', 192, 112, '1968-03-02', '9.2'),
(7, 'Ring Racer', 'Circuit Nürnberg', 'Duitsland', 160, 110, '1974-08-01', '8.7'),
(8, 'Hyperion', 'EnergyLandia', 'Polen', 141, 77, '2009-09-09', '6.3'),
(9, 'Furios Baco', 'PortAventura', 'Spanje', 138, 23, '2018-06-06', '5.5'),
(10, 'Shambhala', 'PortAventura', 'Spanje', 134, 102, '2017-04-03', '9.7');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
