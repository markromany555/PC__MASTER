-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2026 at 03:06 PM
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
-- Database: `pc_builder_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Processor (CPU)'),
(2, 'Motherboard'),
(3, 'Graphics Card (GPU)'),
(4, 'Memory (RAM)'),
(5, 'Storage (SSD/HDD)'),
(6, 'Power Supply (PSU)'),
(7, 'PC Case');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT 'Guest User',
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `total_price`, `status`, `created_at`) VALUES
(7, 'Guest User', 65000.00, 'Pending', '2026-04-01 11:43:40'),
(8, 'Guest User', 89500.00, 'Pending', '2026-04-01 14:12:54'),
(9, 'Guest User', 91000.00, 'Pending', '2026-04-01 14:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `socket_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `socket_type`) VALUES
(1, 'i9 / Ryzen 9', 1, 50000.00, 'LGA1700'),
(2, 'i7 / Ryzen 7', 1, 35000.00, 'AM5'),
(3, 'i5 / Ryzen 5', 1, 12000.00, 'LGA1700'),
(4, 'i3 / Ryzen 3', 1, 3000.00, 'LGA1200'),
(5, 'E-ATX (Extended)', 2, 15000.00, 'LGA1700'),
(6, 'Micro-ATX (mATX)', 2, 12000.00, 'LGA1700'),
(7, 'ATX', 2, 6000.00, 'AM5'),
(8, 'Mini-ITX', 2, 6000.00, 'AM5'),
(9, 'Intel (Arc)', 3, 14000.00, 'N/A'),
(10, 'AMD (Radeon)', 3, 4500.00, 'N/A'),
(11, 'NVIDIA (GeForce)', 3, 3000.00, 'N/A'),
(12, 'DDR5', 4, 4500.00, 'N/A'),
(13, 'DDR4', 4, 2500.00, 'N/A'),
(14, 'DDR3', 4, 500.00, 'N/A'),
(15, 'SSD (Solid State Drive)', 5, 13000.00, 'N/A'),
(16, 'HDD (Hard Disk Drive)', 5, 1300.00, 'N/A'),
(17, '80 PLUS Rating', 6, 5500.00, 'N/A'),
(18, 'Wattage', 6, 2500.00, 'N/A'),
(19, 'Modularity', 6, 2000.00, 'N/A'),
(20, 'Silent Case', 7, 15000.00, 'N/A'),
(21, 'Mesh Case (High Airflow)', 7, 7500.00, 'N/A'),
(22, 'Tempered Glass Case', 7, 5500.00, 'N/A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
