-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 07:52 PM
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
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `flavor` varchar(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `product_id`, `user_id`, `size`, `flavor`, `quantity`, `img`, `created_at`) VALUES
(7, 14, 1, 'Medium', 'Plain', 2, 'birdfeed1.jpg', '2024-06-28 17:49:50'),
(8, 13, 1, 'Medium', 'Special', 1, 'dogascorbicacid.jpg', '2024-06-30 02:15:04'),
(9, 15, 1, 'Medium', 'Plain', 2, 'catwetfood2.jpg', '2024-06-30 02:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `size` varchar(30) NOT NULL,
  `flavor` varchar(30) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `payment` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `size`, `flavor`, `quantity`, `total`, `payment`, `status`) VALUES
(1, 'Dog Treats', 'Medium', 'Special', 2, 910, 'gcash', 'Pending'),
(2, 'Dog Medicine', 'Medium', 'Special', 1, 910, 'gcash', 'Pending');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_level` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `number`, `address`, `user_level`) VALUES
(1, 'Dashotz', 'Francis', 'Cruz', 'admin@gmail.com', '$2y$10$LwZrxUulpK15G6FrWvBQkOm8Qc7TK9xlJV.syY4Kn3Q/it/8mIZ.O', '09208040444', 'Tejeros Convention Rosario Cavite', 1),
(2, 'Dashotz1', 'Francis', 'Cruz', 'dashotz14@gmail.com', '$2y$10$d39bgf0uebPnXvKZaniKzu6cB2LglPQ.67bHmHYkU8.TQztkBNIvi', '09208040444', 'Tejeros Convention Rosario Cavite', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
