-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 04, 2020 at 07:48 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wfm`
--
CREATE DATABASE IF NOT EXISTS `wfm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wfm`;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `city`, `state`) VALUES
(1, 'DOW', 'McAllen', 'Texas'),
(2, 'BMW', 'McAllen', 'Texas (TX)'),
(3, 'Fiesta Chevrolet', 'Mission', 'Texas (TX)');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `item_code` varchar(45) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `in_stock` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `price`, `item_code`, `category`, `in_stock`) VALUES
(1, 'Bike', '250', 'BK250IE','Bicicles & Parts',5),
(2, 'Tire', '25', 'TR25IE','Bicicles & Parts', 15),
(3, 'Handle Bar', '100', 'HB100ER','Bicicles & Parts',1);
(4, 'Gear Shaft', '30', 'GS30RT','Bicicles & Parts',1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `fullName` varchar(45) DEFAULT NULL,
  `isDOW` int(11) DEFAULT NULL,
  `stores_ID` int(11) DEFAULT NULL,
  `SMS` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullName`, `isDOW`, `stores_ID`, `SMS`, `email`, `role`) VALUES
(1, 'admin', '1234', 'Human Customer', 1, 1, NULL, NULL, 5),
(2, 'bmwservicewriter', '1234', 'BMW SW', 0, 2, '1234564321', 'test@test.com', 3),
(3, 'bmwtransporter', '1234', 'BMW Transporter', 0, 2, NULL, NULL, 1),
(4, 'bmwwasher', '1234', 'BMW Washer', 0, 2, NULL, NULL, 2),
(5, 'bmwmanager', '1234', 'BMW Manager', 0, 2, NULL, NULL, 4),
(6, 'fcservicewriter', '1234', 'FC Service Writer', 0, 3, NULL, NULL, 3),
(7, 'fctransporter', '1234', 'FC Transporter', 0, 3, NULL, NULL, 1),
(8, 'fcwasher', '1234', 'FC Washer', 0, 3, '1113334321', 'no@email.com', 2),
(9, 'fcmanager', '1234', 'FC Manager', 0, 3, '', '', 4),
(10, 'fctransporter2', '1234', 'FC Transporter2', 0, 3, '9569849345', 'no@email.com', 1),
(11, 'fctransporter3', '1234', 'FC Transporter3', 0, 3, '1233214321', 'no@email.com', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
