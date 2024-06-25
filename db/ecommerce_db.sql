-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 05:15 AM
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
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `variation` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `added` date NOT NULL,
  `img` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `variation_type` varchar(50) NOT NULL,
  `weight` int(20) DEFAULT NULL,
  `height` int(20) DEFAULT NULL,
  `length` int(20) DEFAULT NULL,
  `width` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `variation`, `stock`, `price`, `status`, `added`, `img`, `description`, `variation_type`, `weight`, `height`, `length`, `width`) VALUES
(11, 'Dog Treats', '21212121', 'Dog', 8, 200.00, '', '2024-06-24', 'dogtreats1.jpg', 'yummy tummy yummy tummy', 'Treats', 12, 12, 12, 12),
(13, 'Dog Medicine', '21212121', 'Dog', 10, 500.00, '', '2024-06-24', 'dogascorbicacid.jpg', 'healing for everyone', 'Medicine', 50, 50, 50, 50),
(14, 'Bird Feed', '3123123', 'Bird', 11, 150.00, '', '2024-06-24', 'birdfeed1.jpg', 'chick peas', 'Dry Food', 12, 12, 12, 12),
(15, 'Cat Food', '123123', 'Cat', 11, 150.00, '', '2024-06-26', 'catwetfood2.jpg', 'yummy wet', 'Wet Food', 12, 12, 12, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
