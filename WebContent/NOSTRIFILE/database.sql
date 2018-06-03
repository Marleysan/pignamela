DROP DATABASE IF EXISTS awesomefitdb;
CREATE DATABASE awesomefitdb;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Giu 03, 2018 alle 18:12
-- Versione del server: 10.1.26-MariaDB
-- Versione PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awesomefitdb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_description` varchar(160) NOT NULL,
  `product_gender` enum('man','woman','unisex') NOT NULL,
  `product_price` float NOT NULL,
  `product_type` enum('T-Shirt','Pants','Skirt','Hat','Sweater','Hoodie','Socks') NOT NULL,
  `product_season` enum('SS','FW','ND') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_gender`, `product_price`, `product_type`, `product_season`) VALUES
(1, 'Cool T-Shirt', 'a very nice t-shirt', 'man', 10.99, 'Sweater', 'SS'),
(2, 'very nice hat', 'veri nice fedora', 'unisex', 69.69, 'Hat', 'ND'),
(3, 'awesome skirt ', 'awesome but a little akward', 'woman', 14.16, 'Skirt', 'SS'),
(4, 'Rovic Zip 3D Tapered', 'GS Gray', 'man', 99.95, 'Pants', 'FW'),
(5, 'Tapered Cargo Pants', 'Raven', 'man', 99.95, 'Pants', 'FW'),
(6, 'Rovic Zip 3D Tapered', 'Dune', 'man', 99.95, 'Pants', 'FW'),
(7, 'Bronson Slim Chino', 'Mazarine Blue', 'man', 99.95, 'Pants', 'SS'),
(8, 'Doax 3D Sweatpants', 'Gray Heather', 'man', 99.95, 'Pants', 'ND'),
(9, 'Bronson Tapered Chino', 'GS Grey', 'man', 99.95, 'Pants', 'SS'),
(10, 'Tapered Cargo Pants', 'Sartho Blue', 'man', 99.95, 'Pants', 'FW'),
(11, 'Bronson Tapered Chino', 'Dune', 'man', 99.95, 'Pants', 'SS'),
(12, 'Oversized Dutch Camo', 'Bright Rovic Green', 'man', 119.95, 'Pants', 'FW'),
(13, 'Stripe Cropped Sweatpants', 'White Heather', 'man', 99.95, 'Pants', 'ND');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
