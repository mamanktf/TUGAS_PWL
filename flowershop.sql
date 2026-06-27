-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2026 at 11:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`) VALUES
(2, 'Bagas', 'bagas@gmail.com', '08123456789', 'Test', 'Hallo Admin', '2026-06-16 06:23:16'),
(3, 'YUUGYUF', 'GYUYUG@gmail.com', '76575', 'yfgyugy', 'yfgyugkuy', '2026-06-16 08:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `payment` varchar(50) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `fullname`, `phone`, `address`, `payment`, `total`, `created_at`, `status`) VALUES
(11, 'tes', 'USER', '089132456782', 'Bangladesh', 'Transfer Bank', 1549999, '2026-06-25 10:30:57', 'Pending'),
(12, 'tes', 'USER2', '092134516578', 'India', 'COD', 2329999, '2026-06-25 10:33:36', 'Diproses'),
(13, 'tess', 'tess', '081264578934', 'ekuador', 'Transfer Bank', 1303999, '2026-06-27 07:44:04', 'Pending'),
(14, 'tess', 'suma', '081928765437', 'Pakistan', 'COD', 1303999, '2026-06-27 07:46:21', 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `price`, `qty`, `subtotal`) VALUES
(2, 11, 2, 'White Lily', 200000, 1, 200000),
(3, 11, 3, 'Tulip Mix', 175000, 1, 175000),
(4, 11, 4, 'Bunga lawang', 124999, 1, 124999),
(5, 11, 1, 'Red Rose Bouquet', 150000, 7, 1050000),
(6, 12, 7, 'Kecubung', 190000, 9, 1710000),
(7, 12, 4, 'Bunga lawang', 124999, 1, 124999),
(8, 12, 2, 'White Lily', 200000, 1, 200000),
(9, 12, 1, 'Red Rose Bouquet', 150000, 1, 150000),
(10, 12, 5, 'Bunga Kecubung', 145000, 1, 145000),
(11, 13, 1, 'Red Rose Bouquet', 150000, 1, 150000),
(12, 13, 2, 'White Lily', 200000, 1, 200000),
(13, 13, 3, 'Tulip Mix', 175000, 1, 175000),
(14, 13, 4, 'Bunga lawang', 124999, 1, 124999),
(15, 13, 5, 'Bunga Kecubung', 145000, 1, 145000),
(16, 13, 6, 'Bunga Kembang', 130000, 1, 130000),
(17, 13, 7, 'Kecubung', 190000, 1, 190000),
(18, 13, 8, 'Bunga bungi', 189000, 1, 189000),
(19, 14, 1, 'Red Rose Bouquet', 150000, 1, 150000),
(20, 14, 2, 'White Lily', 200000, 1, 200000),
(21, 14, 3, 'Tulip Mix', 175000, 1, 175000),
(22, 14, 4, 'Bunga lawang', 124999, 1, 124999),
(23, 14, 5, 'Bunga Kecubung', 145000, 1, 145000),
(24, 14, 6, 'Bunga Kembang', 130000, 1, 130000),
(25, 14, 7, 'Kecubung', 190000, 1, 190000),
(26, 14, 8, 'Bunga bungi', 189000, 1, 189000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `stock`, `created_at`) VALUES
(1, 'Red Rose Bouquet', 'Fresh red roses', 150000.00, 'product-1.jpg', 20, '2026-06-23 15:55:24'),
(2, 'White Lily', 'Beautiful white lily', 200000.00, 'product-2.jpg', 15, '2026-06-23 15:55:24'),
(3, 'Tulip Mix', 'Colorful tulips', 175000.00, 'product-3.jpg', 10, '2026-06-23 15:55:24'),
(4, 'Bunga lawang', 'Mantapp', 124999.00, 'Carnation.jpg', 13, '2026-06-23 17:07:35'),
(5, 'Bunga Kecubung', 'Josjis', 145000.00, 'matahari.jpg', 23, '2026-06-23 18:44:53'),
(6, 'Bunga Kembang', 'Mantap men', 130000.00, 'BabyBreath.jpg', 12, '2026-06-23 19:00:16'),
(7, 'Kecubung', 'Bikin terbang menn', 190000.00, 'mix.jpg', 90, '2026-06-25 10:32:26'),
(8, 'Bunga bungi', 'SIP MANTAPP', 189000.00, 'Carnation.jpg', 12, '2026-06-27 07:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(12, 'admin', 'admin@gmail.com', '$2y$10$iKQwqFeEUla4AFy4bUYp6uefSUB8q5QF7.3YyaoolY7tDmUV7h1XG', 'admin'),
(16, 'tes', 'tes@mail.com', '$2y$10$0U6i8pzh2RwWM/9rYVQGwudWuFt7r9MLFvst1t5jcoL542fvNSDUC', 'user'),
(17, 'user', 'user@gmail.com', '$2y$10$OW13c/L9YMdLU1Nh7hA.Muc5jUcTpRQPFquDk8CQNydYNrOqvfjIm', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
