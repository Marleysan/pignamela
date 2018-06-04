DROP DATABASE IF EXISTS awesomefitdb;
CREATE DATABASE awesomefitdb;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Giu 04, 2018 alle 11:34
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
  `product_price` float(5,2) NOT NULL,
  `product_type` enum('T-Shirt','Pants','Skirt','Shirt','Eyewear') NOT NULL,
  `product_season` enum('SS','FW','ND') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_gender`, `product_price`, `product_type`, `product_season`) VALUES
(1, 'Dunda Polo', 'Black', 'man', 49.95, 'T-Shirt', 'SS'),
(4, 'Rovic Zip 3D Tapered', 'GS Gray', 'man', 99.95, 'Pants', 'FW'),
(5, 'Tapered Cargo Pants', 'Raven', 'man', 99.95, 'Pants', 'FW'),
(6, 'Rovic Zip 3D Tapered', 'Dune', 'man', 99.95, 'Pants', 'FW'),
(7, 'Bronson Slim Chino', 'Mazarine Blue', 'man', 99.95, 'Pants', 'SS'),
(8, 'Doax 3D Sweatpants', 'Gray Heather', 'man', 99.95, 'Pants', 'ND'),
(9, 'Bronson Tapered Chino', 'GS Grey', 'man', 99.95, 'Pants', 'SS'),
(10, 'Tapered Cargo Pants', 'Sartho Blue', 'man', 99.95, 'Pants', 'FW'),
(11, 'Bronson Tapered Chino', 'Dune', 'man', 99.95, 'Pants', 'SS'),
(12, 'Oversized Dutch Camo', 'Bright Rovic Green', 'man', 119.95, 'Pants', 'FW'),
(13, 'Stripe Cropped Sweatpants', 'White Heather', 'man', 99.95, 'Pants', 'ND'),
(14, 'Base T-Shirt', 'White', 'man', 35, 'T-Shirt', 'ND'),
(15, 'Cadulor T-Shirt', 'Sartho Blue Heather', 'man', 29.95, 'T-Shirt', 'SS'),
(16, 'Raw Correct Core Polo', 'Sartho Blue', 'man', 49.95, 'T-Shirt', 'SS'),
(17, 'Base V-Neck T-Shirt', 'White', 'man', 35, 'T-Shirt', 'ND'),
(18, 'Base Round Neck T-Shirt', 'Grey Heather', 'man', 35, 'T-Shirt', 'ND'),
(19, 'Base Heather T-Shirt', 'White Solid', 'man', 35, 'T-Shirt', 'ND'),
(20, 'Landoh Shirt', 'Rinsed', 'man', 89.95, 'Shirt', 'FW'),
(21, 'Combo Daixen Sunglasses', 'Black', 'unisex', 139.95, 'Eyewear', 'ND'),
(22, 'Metal Hoym Sunglasses', '179.95', 'unisex', 179.95, 'Eyewear', 'ND'),
(23, 'Metal Brycan Sunglasses', 'Silver Matte', 'unisex', 179.95, 'Eyewear', 'SS'),
(24, 'Combo Daixen Sunglasses', 'Havana', 'unisex', 139.95, 'Eyewear', 'ND'),
(25, 'Racewood A-Line Skirt', 'Rinsed', 'woman', 89.95, 'Skirt', 'FW'),
(26, 'Voleska Knit shirt', 'Dark Black', 'woman', 109.95, 'Skirt', 'FW'),
(27, 'Tendric high Waist Skirt', 'Khaki/Praline', 'woman', 99.95, 'Skirt', 'SS'),
(28, 'Elwood Tone-Mix A-Line Skirt', 'Combat', 'woman', 69.95, 'Skirt', 'SS'),
(29, 'Tendric High Pleated Skirt', 'Light Hunter', 'woman', 99.95, 'Skirt', 'SS'),
(30, 'Arc Wrap Skirt', 'Medium Aged Painted', 'woman', 89.95, 'Skirt', 'FW'),
(31, 'Tendric High Waist Skirt', 'Light Liquid Pink', 'woman', 99.95, 'Skirt', 'SS'),
(32, 'Rovic Mid Waist Skinny Cargo Pants', 'Forest Night', 'woman', 99.95, 'Pants', 'FW'),
(33, 'Bronson Low Waist Boyfriend Chino', 'Raw Pressed', 'woman', 99.95, 'Pants', 'FW'),
(34, 'Bronson Mid Waist Skinny Chino', 'Mazarine Blue', 'woman', 99.95, 'Pants', 'FW'),
(35, 'Tendric 3D Mid Boyfriend Pants', 'Milk', 'woman', 119.95, 'Pants', 'SS'),
(36, 'Raw Correct Slim Sleeve Polo', 'Fresh cote', 'woman', 49.95, 'T-Shirt', 'SS'),
(37, 'Raw Correct Slim Sleeve Polo', 'Sartho Blue', 'woman', 49.95, 'T-Shirt', 'SS'),
(38, 'Raw Correct Slim Sleeve Polo', 'White', 'woman', 49.95, 'T-Shirt', 'SS'),
(39, 'Core Sleeveless Singlet', 'Shadow', 'woman', 89.95, 'Shirt', 'SS'),
(40, 'Lynn Slim Shirt', 'Medium Aged', 'woman', 119.95, 'Shirt', 'FW'),
(41, 'Core 3D Shell Shirt', 'White', 'woman', 79.95, 'Shirt', 'ND'),
(42, 'Core Polo', 'White', 'woman', 79.95, 'Shirt', 'SS');

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
(5, 1, 'XL', 1),
(6, 14, 'M', 3),
(7, 14, 'L', 2),
(8, 14, 'S', 2),
(9, 14, 'XS', 1),
(10, 14, 'XL', 1),
(11, 15, 'M', 3),
(12, 15, 'L', 2),
(13, 15, 'S', 2),
(14, 15, 'XS', 1),
(15, 15, 'XL', 1),
(16, 16, 'M', 3),
(17, 16, 'L', 2),
(18, 16, 'S', 2),
(19, 16, 'XS', 1),
(20, 16, 'XL', 1),
(21, 17, 'M', 3),
(22, 17, 'L', 2),
(23, 17, 'S', 2),
(24, 17, 'XS', 1),
(25, 17, 'XL', 1),
(26, 18, 'M', 3),
(27, 18, 'L', 2),
(28, 18, 'S', 2),
(29, 18, 'XS', 1),
(30, 18, 'XL', 1),
(31, 19, 'M', 3),
(32, 19, 'L', 2),
(33, 19, 'S', 2),
(34, 19, 'XS', 1),
(35, 19, 'XL', 1),
(36, 20, 'M', 3),
(37, 20, 'L', 2),
(38, 20, 'S', 2),
(39, 20, 'XS', 1),
(40, 20, 'XL', 1),
(41, 36, 'M', 3),
(42, 36, 'L', 2),
(43, 36, 'S', 2),
(44, 36, 'XS', 1),
(45, 36, 'XL', 1),
(46, 37, 'M', 3),
(47, 37, 'L', 2),
(48, 37, 'S', 2),
(49, 37, 'XS', 1),
(50, 37, 'XL', 1),
(51, 38, 'M', 3),
(52, 38, 'L', 2),
(53, 38, 'S', 2),
(54, 38, 'XS', 1),
(55, 38, 'XL', 1),
(56, 39, 'M', 3),
(57, 39, 'L', 2),
(58, 39, 'S', 2),
(59, 39, 'XS', 1),
(60, 39, 'XL', 1),
(61, 40, 'M', 3),
(62, 40, 'L', 2),
(63, 40, 'S', 2),
(64, 40, 'XS', 1),
(65, 40, 'XL', 1),
(66, 41, 'M', 3),
(67, 41, 'L', 2),
(68, 41, 'S', 2),
(69, 41, 'XS', 1),
(70, 41, 'XL', 1),
(71, 42, 'M', 3),
(72, 42, 'L', 2),
(73, 42, 'S', 2),
(74, 42, 'XS', 1),
(75, 42, 'XL', 1),
(76, 4, '46', 1),
(77, 4, '48', 1),
(78, 4, '50', 3),
(79, 4, '52', 2),
(80, 5, '46', 1),
(81, 5, '48', 1),
(82, 5, '50', 3),
(83, 5, '52', 2),
(84, 6, '46', 1),
(85, 6, '48', 1),
(86, 6, '50', 3),
(87, 6, '52', 2),
(88, 7, '46', 1),
(89, 7, '48', 1),
(90, 7, '50', 3),
(91, 7, '52', 2),
(92, 8, '46', 1),
(93, 8, '48', 1),
(94, 8, '50', 3),
(95, 8, '52', 2),
(96, 9, '46', 1),
(97, 9, '48', 1),
(98, 9, '50', 3),
(99, 9, '52', 2),
(100, 10, '46', 1),
(101, 10, '48', 1),
(102, 10, '50', 3),
(103, 10, '52', 2),
(104, 11, '46', 1),
(105, 11, '48', 1),
(106, 11, '50', 3),
(107, 11, '52', 2),
(108, 12, '46', 1),
(109, 12, '48', 1),
(110, 12, '50', 3),
(111, 12, '52', 2),
(112, 13, '46', 1),
(113, 13, '48', 1),
(114, 13, '50', 3),
(115, 13, '52', 2),
(116, 25, '40', 1),
(117, 25, '42', 1),
(118, 25, '44', 3),
(119, 25, '46', 2),
(120, 26, '40', 1),
(121, 26, '42', 1),
(122, 26, '44', 3),
(123, 26, '46', 2),
(124, 27, '40', 1),
(125, 27, '42', 1),
(126, 27, '44', 3),
(127, 27, '46', 2),
(128, 28, '40', 1),
(129, 28, '42', 1),
(130, 28, '44', 3),
(131, 28, '46', 2),
(132, 29, '40', 1),
(133, 29, '42', 1),
(134, 29, '44', 3),
(135, 29, '46', 2),
(136, 30, '40', 1),
(137, 30, '42', 1),
(138, 30, '44', 3),
(139, 30, '46', 2),
(140, 31, '40', 1),
(141, 31, '42', 1),
(142, 31, '44', 3),
(143, 31, '46', 2),
(144, 32, '40', 1),
(145, 32, '42', 1),
(146, 32, '44', 3),
(147, 32, '46', 2),
(148, 33, '40', 1),
(149, 33, '42', 1),
(150, 33, '44', 3),
(151, 33, '46', 2),
(152, 34, '40', 1),
(153, 34, '42', 1),
(154, 34, '44', 3),
(155, 34, '46', 2),
(156, 35, '40', 1),
(157, 35, '42', 1),
(158, 35, '44', 3),
(159, 35, '46', 2),
(160, 21, '49-21', 1),
(161, 22, '51-22', 1),
(162, 23, '51-22', 3),
(163, 24, '51-21', 2);



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
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
