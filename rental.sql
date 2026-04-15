-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2026 at 10:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `role`) VALUES
(0, 'rubenjhvanberkel@outlook.com', '$2y$14$UmZyptooSYfHc4N8vJzhz.xojufye5byd.lIU6JB3k6fn.KLQVzha', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `licence-plate` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `kleur` varchar(255) NOT NULL,
  `cartype` varchar(255) NOT NULL,
  `gas-tank-volume` varchar(50) NOT NULL,
  `gearbox` varchar(50) NOT NULL,
  `seats` varchar(50) NOT NULL,
  `priceday` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `licence-plate`, `brand`, `model`, `kleur`, `cartype`, `gas-tank-volume`, `gearbox`, `seats`, `priceday`, `img`) VALUES
(1, 'AAA-00-AA', 'Koenigegg', 'CCGT', 'Wit', 'Hypercar', '100L', 'Schakel', '2 Personen', '184', '../assets/images/products/Car (0).svg'),
(2, 'AAA-00-AB', 'Nissan', 'GTR R35', 'Silver Grijs', 'supercar', '74L', 'Automaat', '2 Personen', '80', '../assets/images/products/Car (1).svg'),
(3, 'AAA-00-AC', 'Rolls Royce', 'Phantom', 'Donker Blauw', 'Luxury', '70L', 'Automaat', '4 Personen', '194', '../assets/images/products/Car (2).svg'),
(4, 'AAA-00-AD', 'Nissan', 'GTR R35', 'Grijs', 'Supercar', '74L', 'Automaat', '2 Personen', '80', '../assets/images/products/Car (3).svg'),
(6, 'AAA-00-AE', 'Dacia', 'Duster', 'Grijs', 'SUV', '70L', 'Schakel', '5 Personen', '154', '../assets/images/products/Car (4).svg'),
(7, 'AAA-00-AF', 'Volkswagen', 'X6', 'Bruin', 'SUV', '74L', 'Schakel', '7 Personen', '169', '../assets/images/products/Car (5).svg'),
(8, 'AAA-00-AG', 'Dacia', 'Duster', 'Blauw', 'SUV', '100L', 'Schakel', '7 Personen', '164', '../assets/images/products/Car (6).svg'),
(9, 'AAA-00-AH', 'Volkswagen', 'X6', 'Bruin', 'SUV', '74L', 'Schakel', '7 Personen', '169', '../assets/images/products/Car (7).svg'),
(10, 'AAA-00-AI', 'MG', 'GH', 'Blauw', 'SUV', '70L', 'Automaat', '7 Personen', '135', '../assets/images/products/Car (8).svg'),
(11, 'AAA-00-AJ', 'MG', 'GH', 'Wit', 'Hatchback', '70L', 'Automaat', '7 Personen', '135', '../assets/images/products/Car (9).svg'),
(13, 'AAA-00-AK', 'MG', 'GH EV', 'Blauw', 'SUV', '72W', 'Automaat', '7 Personen', '155', '../assets/images/products/Car (10).svg'),
(15, 'AAA-00-AL', 'MG', 'GH EV', 'Wit', 'Hatchback', '72W', 'Automaat', '7 Personen', '155', '../assets/images/products/Car (11).svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `licence-plate` (`licence-plate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
