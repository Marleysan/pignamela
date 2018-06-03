DROP DATABASE IF EXISTS awesomefitdb;
CREATE DATABASE awesomefitdb;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Giu 03, 2018 alle 18:15
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
-- Struttura della tabella `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `address_state` varchar(30) NOT NULL,
  `address_city` varchar(45) NOT NULL,
  `address_zip` int(10) NOT NULL,
  `address_street` varchar(45) NOT NULL,
  `address_civic_number` int(11) DEFAULT '1',
  `address_note` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `address`
--

INSERT INTO `address` (`address_id`, `address_state`, `address_city`, `address_zip`, `address_street`, `address_civic_number`, `address_note`) VALUES
(2, 'Italy', 'Bolzano', 39100, 'Via Torino', 14, 'ciaone ghira');

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(25) NOT NULL,
  `admin_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_address_id` int(11) DEFAULT NULL,
  `cart_customer_id` int(11) NOT NULL,
  `cart_ordered` tinyint(1) DEFAULT '0',
  `cart_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_address_id`, `cart_customer_id`, `cart_ordered`, `cart_date`) VALUES
(12, NULL, 1, 0, '2018-06-03 08:25:44');

-- --------------------------------------------------------

--
-- Struttura della tabella `cart_element`
--

CREATE TABLE `cart_element` (
  `element_cart_id` int(11) NOT NULL,
  `element_detail_id` int(11) NOT NULL,
  `element_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cart_element`
--

INSERT INTO `cart_element` (`element_cart_id`, `element_detail_id`, `element_quantity`) VALUES
(12, 1, 4),
(12, 5, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_firstname` varchar(25) NOT NULL,
  `customer_lastname` varchar(20) NOT NULL,
  `customer_email` varchar(40) NOT NULL,
  `customer_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_firstname`, `customer_lastname`, `customer_email`, `customer_password`) VALUES
(1, 'User', 'Lastuser', 'user@user.it', '$2y$10$G8Pc7PewVHf4v2/688EDPuuINlPOHB2IN4nTsUf6DdKtEbs0SEhsS'),
(2, 'Alessandro', 'Mattivi', 'marleysan.thecan@gmail.com', '$2y$10$G8Pc7PewVHf4v2/688EDPuuINlPOHB2IN4nTsUf6DdKtEbs0SEhsS'),
(3, 'silvia', 'silvi', 'silf@fdsa.it', '$2y$10$G8Pc7PewVHf4v2/688EDPuuINlPOHB2IN4nTsUf6DdKtEbs0SEhsS');

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

-- --------------------------------------------------------

--
-- Struttura della tabella `product_detail`
--

CREATE TABLE `product_detail` (
  `detail_id` int(11) NOT NULL,
  `detail_product_id` int(11) NOT NULL,
  `detail_size` varchar(5) NOT NULL,
  `detail_quantity` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `product_detail`
--

INSERT INTO `product_detail` (`detail_id`, `detail_product_id`, `detail_size`, `detail_quantity`) VALUES
(1, 1, 'M', 3),
(2, 1, 'L', 2),
(3, 1, 'S', 2),
(4, 1, 'XS', 1),
(5, 1, 'XL', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indici per le tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indici per le tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_customer_id` (`cart_customer_id`),
  ADD KEY `cart_address_id` (`cart_address_id`);

--
-- Indici per le tabelle `cart_element`
--
ALTER TABLE `cart_element`
  ADD PRIMARY KEY (`element_cart_id`,`element_detail_id`),
  ADD KEY `element_detail_id` (`element_detail_id`);

--
-- Indici per le tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indici per le tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indici per le tabelle `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `detail_product_id` (`detail_product_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cart_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cart_address_id`) REFERENCES `address` (`address_id`);

--
-- Limiti per la tabella `cart_element`
--
ALTER TABLE `cart_element`
  ADD CONSTRAINT `cart_element_ibfk_1` FOREIGN KEY (`element_cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `cart_element_ibfk_2` FOREIGN KEY (`element_detail_id`) REFERENCES `product_detail` (`detail_id`);

--
-- Limiti per la tabella `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`detail_product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
