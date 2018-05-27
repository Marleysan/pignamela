-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 27, 2018 alle 10:02
-- Versione del server: 10.1.31-MariaDB
-- Versione PHP: 7.2.4

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
  `cart_address_id` int(11) NOT NULL,
  `cart_costumer_id` int(11) NOT NULL,
  `cart_ordered` tinyint(1) DEFAULT '0',
  `cart_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `cart_element`
--

CREATE TABLE `cart_element` (
  `element_cart_id` int(11) NOT NULL,
  `element_detail_id` int(11) NOT NULL,
  `element_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `costumer`
--

CREATE TABLE `costumer` (
  `costumer_id` int(11) NOT NULL,
  `costumer_firstname` varchar(25) NOT NULL,
  `costumer_lastname` varchar(20) NOT NULL,
  `costumer_email` varchar(40) NOT NULL,
  `costumer_password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `costumer`
--

INSERT INTO `costumer` (`costumer_id`, `costumer_firstname`, `costumer_lastname`, `costumer_email`, `costumer_password`) VALUES
(1, 'User', 'Lastuser', 'user@user.it', '1234567890'),
(2, 'Alessandro', 'Mattivi', 'marleysan.thecan@gmail.com', '1234567890');

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
  `product_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_gender`, `product_price`, `product_type`) VALUES
(1, 'Cool T-Shirt', 'a very nice t-shirt', 'man', 10.99, 'T-Shirt'),
(2, 'very nice hat', 'veri nice fedora', 'unisex', 69.69, 'hat'),
(3, 'awesome skirt ', 'awesome but a little akward', 'woman', 14.16, 'skirt');

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
  ADD KEY `cart_costumer_id` (`cart_costumer_id`),
  ADD KEY `cart_address_id` (`cart_address_id`);

--
-- Indici per le tabelle `cart_element`
--
ALTER TABLE `cart_element`
  ADD PRIMARY KEY (`element_cart_id`,`element_detail_id`),
  ADD KEY `element_detail_id` (`element_detail_id`);

--
-- Indici per le tabelle `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`costumer_id`),
  ADD UNIQUE KEY `costumer_email` (`costumer_email`);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `costumer`
--
ALTER TABLE `costumer`
  MODIFY `costumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cart_costumer_id`) REFERENCES `costumer` (`costumer_id`) ON DELETE CASCADE,
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
