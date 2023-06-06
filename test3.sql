-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 03:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `date_rt` date NOT NULL,
  `cart_saved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cust_id`, `date_rt`, `cart_saved`) VALUES
(6, 3, '2004-01-11', 0),
(7, 1, '2001-01-11', 0),
(8, 2, '2023-06-14', 0),
(11, 4, '2023-06-29', 0),
(14, 5, '2023-06-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_inv`
--

CREATE TABLE `cart_inv` (
  `cart_inv_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `rental_id` int(11) NOT NULL,
  `cust_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_inv`
--

INSERT INTO `cart_inv` (`cart_inv_id`, `cart_id`, `rental_id`, `cust_qty`) VALUES
(3, 3, 3, 3),
(4, 1, 6, 14),
(5, 3, 5, 14),
(6, 3, 1, 13),
(7, 3, 5, 15),
(8, 1, 7, 12),
(9, 1, 5, 5),
(10, 2, 7, 13),
(11, 4, 4, 16),
(12, 4, 8, 20),
(13, 4, 4, 5),
(14, 4, 3, 6),
(15, 2, 2, 10),
(16, 3, 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `cart_rental_inv`
--

CREATE TABLE `cart_rental_inv` (
  `cart_id` int(11) NOT NULL,
  `rental_id` int(11) NOT NULL,
  `cust_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_rental_inv`
--

INSERT INTO `cart_rental_inv` (`cart_id`, `rental_id`, `cust_qty`) VALUES
(3, 3, 3),
(3, 5, 14),
(3, 3, 3),
(3, 5, 14),
(3, 3, 3),
(3, 5, 14),
(3, 1, 13),
(3, 3, 3),
(3, 5, 14),
(3, 1, 13),
(3, 3, 3),
(3, 5, 14),
(3, 1, 13),
(3, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_fname` varchar(50) NOT NULL,
  `cust_lname` varchar(50) NOT NULL,
  `cust_add` varchar(100) NOT NULL,
  `cust_type` varchar(50) NOT NULL,
  `cust_num` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_fname`, `cust_lname`, `cust_add`, `cust_type`, `cust_num`) VALUES
(1, 'Perell', 'Brown', 'Silay City', 'PWD', 90192010),
(2, 'Armor', 'Espinosa', 'Talisay City', 'Student', 96128771),
(3, 'Kirby', 'Calampinay', 'Bacolod City', 'Regular', 96139371),
(4, 'Romeo', 'Seva', 'Silay City', 'Student', 92183475),
(5, 'Dave', 'Bowie', 'Silay City', 'Student', 94371138);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `Venue` varchar(100) NOT NULL,
  `Event_start` time NOT NULL,
  `Event_end` time NOT NULL,
  `Event_date` date NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `Venue`, `Event_start`, `Event_end`, `Event_date`, `type_id`) VALUES
(38, 'Harold\'s Baby Shower', ' Katipunan Rd. Whiteplains', '12:40:10', '01:15:00', '2023-06-06', 1),
(41, 'Trixie\'s Baby Shower', '106 Esteban Street Legaspi Village 1229', '09:30:45', '18:00:30', '2023-06-30', 1),
(70, 'Calamansi Party', 'Yangco Market 796 Ilaya Street Binondo 1000', '10:20:45', '15:25:30', '2023-06-04', 1),
(71, 'Paul\'s Birthday', 'F. Jaca Street, Inayawan Pardo', '14:30:45', '19:30:30', '2023-06-27', 3),
(72, 'Krystal\'s Debut', 'Bacolod City', '15:00:00', '04:00:00', '2023-06-26', 4),
(73, 'Sam & Cat\'s Wedding', 'Brgy Concepcion', '15:00:00', '13:00:00', '2023-06-03', 2),
(74, 'NomNom', 'Silay City', '17:30:00', '20:30:00', '2023-06-22', 1),
(75, 'Kaye Bday', 'Test', '06:02:00', '17:02:00', '2023-06-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE `eventtype` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `type_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventtype`
--

INSERT INTO `eventtype` (`type_id`, `type_name`, `type_desc`) VALUES
(1, 'Baby Shower', 'A Party Which Is Thrown To Celebrate The Impending'),
(2, 'Wedding', 'A Ceremony Or Act Of Joining Two People In Marriag'),
(3, 'Birthday', 'A Tradition Of Marking The Anniversary Of The Birt'),
(4, 'Debut', ' A Traditional Filipino Coming-of-age Celebration '),
(5, 'After Party', 'A Party After The Event');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `rental_id` int(11) UNSIGNED NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `rent_price` int(100) NOT NULL,
  `item_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`rental_id`, `item_name`, `rent_price`, `item_qty`) VALUES
(1, 'Carpet', 400, 31),
(2, 'Chairs', 500, 50),
(3, 'Table', 300, 30),
(4, 'Balloon Stand', 100, 25),
(5, 'Candelabra', 200, 20),
(6, ' Plastic Flowers', 20, 80),
(7, 'Lights', 150, 50),
(8, 'Party Hats', 10, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `user_id` int(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`user_id`, `user_email`, `user_password`, `user_name`) VALUES
(1, 'admin1', '827ccb0eea8a706c4c34a16891f84e7b', 'admin1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `cart_inv`
--
ALTER TABLE `cart_inv`
  ADD PRIMARY KEY (`cart_inv_id`),
  ADD KEY `cust_id` (`cart_id`),
  ADD KEY `rental_id` (`rental_id`);

--
-- Indexes for table `cart_rental_inv`
--
ALTER TABLE `cart_rental_inv`
  ADD KEY `rental_id` (`rental_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `eventtype`
--
ALTER TABLE `eventtype`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`rental_id`),
  ADD KEY `rental_id` (`rental_id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart_inv`
--
ALTER TABLE `cart_inv`
  MODIFY `cart_inv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `eventtype`
--
ALTER TABLE `eventtype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rental_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
