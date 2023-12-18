-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 03:43 AM
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
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `user_id`) VALUES
(1, 'Addidas', '', 2),
(2, 'PUMA', '', 2),
(3, 'Convers', 'e-commerce657bb8ab50b119.42669060.png', 1),
(4, 'Nike', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`) VALUES
(1, 'Baker', 'bakersabbagh', '123456B', NULL, NULL),
(2, 'Aya', 'bakeralsabbagh@gmthdthail.com', '12345678B', '0790300263', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `shipping` int(11) NOT NULL,
  `products_id` text NOT NULL,
  `products_quantity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `total_amount`, `customer_id`, `shipping`, `products_id`, `products_quantity`) VALUES
(1, '2023-12-17', 2000.00, 1, 5, '1,2,3', '1,2,1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `price_after_sale` double NOT NULL,
  `is_on_sale` int(11) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `stock_quantity`, `price`, `price_after_sale`, `is_on_sale`, `description`, `category_id`, `user_id`, `created_at`) VALUES
(1, 'Product 1', 'admin-panel\\img\\p1.jpg', 10, 50, 40, 1, 'Description 1', 1, 1, '2023-12-17 08:02:40'),
(2, 'Product 2', 'admin-panel\\img\\p2.jpg', 15, 60, 50, 1, 'Description 2', 1, 1, '2023-12-17 08:02:40'),
(3, 'Product 3', 'admin-panel\\img\\p3.jpg', 20, 70, 60, 1, 'Description 3', 2, 2, '2023-12-17 08:02:40'),
(4, 'Product 4', 'admin-panel\\img\\p4.jpg', 60, 45.23, 36.18, 1, 'Description for Product 4', 4, 6, '2023-12-17 08:02:40'),
(5, 'Product 5', 'admin-panel\\img\\p5.jpg', 96, 68.47, 54.78, 0, 'Description for Product 5', 1, 3, '2023-12-17 08:02:40'),
(6, 'Product 6', 'admin-panel\\img\\p6.jpg', 54, 64.17, 51.34, 1, 'Description for Product 6', 2, 6, '2023-12-17 08:02:40'),
(7, 'Product 7', 'admin-panel\\img\\p7.jpg', 21, 65.81, 52.65, 1, 'Description for Product 7', 3, 2, '2023-12-17 08:02:40'),
(8, 'Product 8', 'admin-panel\\img\\p8.jpg', 38, 58.16, 46.53, 1, 'Description for Product 8', 4, 2, '2023-12-17 08:02:40'),
(9, 'Product 9', 'admin-panel\\img\\p1.jpg', 71, 46.08, 36.86, 0, 'Description for Product 9', 1, 2, '2023-12-17 08:02:40'),
(10, 'Product 10', 'admin-panel\\img\\p2.jpg', 83, 84.64, 67.71, 0, 'Description for Product 10', 2, 5, '2023-12-17 08:02:40'),
(11, 'Product 11', 'admin-panel\\img\\p3.jpg', 42, 29.11, 23.29, 0, 'Description for Product 11', 3, 3, '2023-12-17 08:02:40'),
(12, 'Product 12', 'admin-panel\\img\\p4.jpg', 98, 99.89, 79.91, 1, 'Description for Product 12', 4, 4, '2023-12-17 08:02:40'),
(13, 'Product 13', 'admin-panel\\img\\p5.jpg', 99, 30.4, 24.32, 1, 'Description for Product 13', 1, 8, '2023-12-17 08:02:40'),
(14, 'Product 14', 'admin-panel\\img\\p6.jpg', 78, 63.85, 51.08, 1, 'Description for Product 14', 2, 10, '2023-12-17 08:02:40'),
(15, 'Product 15', 'admin-panel\\img\\p7.jpg', 30, 31.09, 24.87, 0, 'Description for Product 15', 3, 10, '2023-12-17 08:02:40'),
(16, 'Product 16', 'admin-panel\\img\\p8.jpg', 19, 75.37, 60.3, 0, 'Description for Product 16', 4, 4, '2023-12-17 08:02:40'),
(17, 'Product 17', 'admin-panel\\img\\p1.jpg', 79, 61.47, 49.18, 1, 'Description for Product 17', 1, 4, '2023-12-17 08:02:40'),
(18, 'Product 18', 'admin-panel\\img\\p2.jpg', 25, 83.69, 66.95, 1, 'Description for Product 18', 2, 10, '2023-12-17 08:02:40'),
(19, 'Product 19', 'admin-panel\\img\\p3.jpg', 67, 24.21, 19.37, 0, 'Description for Product 19', 3, 6, '2023-12-17 08:02:40'),
(20, 'Product 20', 'admin-panel\\img\\p1.jpg', 15, 32.5, 26, 1, 'Description for Product 20', 1, 5, '2023-12-17 08:02:40'),
(21, 'Product 21', 'admin-panel\\img\\p5.jpg', 34, 56.1, 44.88, 1, 'Description for Product 21', 1, 10, '2023-12-17 08:02:40'),
(22, 'Product 22', 'admin-panel\\img\\p6.jpg', 25, 92.1, 73.68, 0, 'Description for Product 22', 2, 5, '2023-12-17 08:02:40'),
(23, 'Product 23', 'admin-panel\\img\\p7.jpg', 14, 41.47, 33.18, 1, 'Description for Product 23', 3, 3, '2023-12-17 08:02:40'),
(24, 'Product 24', 'admin-panel\\img\\p8.jpg', 40, 29.44, 23.55, 1, 'Description for Product 24', 4, 9, '2023-12-17 08:02:40'),
(25, 'Product 25', 'admin-panel\\img\\p1.jpg', 44, 82.3, 65.84, 0, 'Description for Product 25', 1, 7, '2023-12-17 08:02:40'),
(26, 'Product 26', 'admin-panel\\img\\p2.jpg', 95, 21.93, 17.54, 0, 'Description for Product 26', 2, 8, '2023-12-17 08:02:40'),
(27, 'Product 27', 'admin-panel\\img\\p3.jpg', 19, 36.66, 29.33, 0, 'Description for Product 27', 3, 1, '2023-12-17 08:02:40'),
(28, 'Product 28', 'admin-panel\\img\\p4.jpg', 79, 11.43, 9.14, 1, 'Description for Product 28', 4, 9, '2023-12-17 08:02:40'),
(29, 'Product 29', 'admin-panel\\img\\p5.jpg', 90, 39.36, 31.49, 0, 'Description for Product 29', 1, 7, '2023-12-17 08:02:40'),
(30, 'Product 30', 'admin-panel\\img\\p6.jpg', 83, 18.33, 14.66, 1, 'Description for Product 30', 2, 4, '2023-12-17 08:02:40'),
(31, 'Product 31', 'admin-panel\\img\\p7.jpg', 33, 87.87, 70.3, 0, 'Description for Product 31', 3, 8, '2023-12-17 08:02:40'),
(32, 'Product 32', 'admin-panel\\img\\p8.jpg', 54, 29.73, 23.78, 1, 'Description for Product 32', 4, 2, '2023-12-17 08:02:40'),
(33, 'Product 33', 'admin-panel\\img\\p1.jpg', 32, 49.8, 39.84, 0, 'Description for Product 33', 1, 6, '2023-12-17 08:02:40'),
(34, 'Product 34', 'admin-panel\\img\\p2.jpg', 46, 70.04, 56.03, 1, 'Description for Product 34', 2, 5, '2023-12-17 08:02:40'),
(35, 'Product 35', 'admin-panel\\img\\p3.jpg', 18, 81.14, 64.91, 0, 'Description for Product 35', 3, 2, '2023-12-17 08:02:40'),
(36, 'Product 36', 'admin-panel\\img\\p4.jpg', 46, 21.77, 17.42, 0, 'Description for Product 36', 4, 3, '2023-12-17 08:02:40'),
(37, 'Product 37', 'admin-panel\\img\\p5.jpg', 90, 39.45, 31.56, 1, 'Description for Product 37', 1, 8, '2023-12-17 08:02:40'),
(38, 'Product 38', 'admin-panel\\img\\p6.jpg', 68, 85.89, 68.71, 1, 'Description for Product 38', 2, 10, '2023-12-17 08:02:40'),
(39, 'Product 39', 'admin-panel\\img\\p7.jpg', 100, 22.11, 17.69, 0, 'Description for Product 39', 3, 3, '2023-12-17 08:02:40'),
(40, 'Product 40', 'admin-panel\\img\\p8.jpg', 29, 43.95, 35.16, 0, 'Descri\r\nption for Product 40', 4, 2, '2023-12-17 08:02:40'),
(41, 'Product 41', 'admin-panel\\img\\p1.jpg', 62, 63.72, 50.98, 0, 'Description for Product 41', 1, 6, '2023-12-17 08:02:40'),
(42, 'Product 42', 'admin-panel\\img\\p2.jpg', 13, 33.98, 27.18, 1, 'Description for Product 42', 2, 1, '2023-12-17 08:02:40'),
(43, 'Product 43', 'admin-panel\\img\\p3.jpg', 38, 97.12, 77.7, 0, 'Description for Product 43', 3, 5, '2023-12-17 08:02:40'),
(44, 'Product 44', 'admin-panel\\img\\p4.jpg', 47, 17.38, 13.9, 1, 'Description for Product 44', 4, 3, '2023-12-17 08:02:40'),
(45, 'Product 45', 'admin-panel\\img\\p5.jpg', 91, 69.49, 55.59, 0, 'Description for Product 45', 1, 7, '2023-12-17 08:02:40'),
(46, 'Product 46', 'admin-panel\\img\\p6.jpg', 48, 30.35, 24.28, 1, 'Description for Product 46', 2, 7, '2023-12-17 08:02:40'),
(47, 'Product 47', 'admin-panel\\img\\p7.jpg', 78, 63.82, 51.06, 0, 'Description for Product 47', 3, 7, '2023-12-17 08:02:40'),
(48, 'Product 48', 'admin-panel\\img\\p8.jpg', 70, 83.58, 66.86, 0, 'Description for Product 48', 4, 2, '2023-12-17 08:02:40'),
(49, 'Product 49', 'admin-panel\\img\\p1.jpg', 17, 41.67, 33.34, 0, 'Description for Product 49', 1, 2, '2023-12-17 08:02:40'),
(50, 'Product 50', 'admin-panel\\img\\p2.jpg', 83, 11.33, 9.06, 1, 'Description for Product 50', 2, 10, '2023-12-17 08:02:40'),
(51, 'Product 51', 'admin-panel\\img\\p3.jpg', 38, 61.63, 49.3, 0, 'Description for Product 51', 3, 5, '2023-12-17 08:02:40'),
(52, 'Product 52', 'admin-panel\\img\\p4.jpg', 74, 76.05, 60.84, 1, 'Description for Product 52', 4, 9, '2023-12-17 08:01:44'),
(53, 'Product 53', 'admin-panel\\img\\p5.jpg', 20, 74.38, 59.5, 0, 'Description for Product 53', 1, 2, '2023-12-17 08:01:44'),
(54, 'Product 54', 'admin-panel\\img\\p6.jpg', 29, 83.57, 66.86, 1, 'Description for Product 54', 2, 3, '2023-12-17 08:01:44'),
(55, 'Product 55', 'admin-panel\\img\\p7.jpg', 35, 29.76, 23.81, 0, 'Description for Product 55', 3, 1, '2023-12-17 09:09:40'),
(56, 'Product 56', 'admin-panel\\img\\p8.jpg', 65, 73.01, 58.41, 0, 'Description for Product 56', 4, 4, '2023-12-17 09:10:01'),
(57, 'Product 57', 'admin-panel\\img\\p1.jpg', 54, 53.25, 42.6, 1, 'Description for Product 57', 1, 1, '2022-12-31 18:00:00'),
(58, 'Product 58', 'admin-panel\\img\\p2.jpg', 59, 34.83, 27.86, 0, 'Description for Product 58', 2, 5, '2022-12-31 18:00:00'),
(59, 'Product 59', 'admin-panel\\img\\p3.jpg', 91, 23.84, 19.07, 1, 'Description for Product 59', 3, 4, '2022-12-31 18:00:00'),
(60, 'Product 60', 'admin-panel\\img\\p4.jpg', 36, 56.75, 45.4, 0, 'Description for Product 60', 4, 2, '2022-12-31 18:00:00'),
(61, 'Product 61', 'admin-panel\\img\\p5.jpg', 99, 40.16, 32.13, 1, 'Description for Product 61', 1, 2, '2023-12-17 09:10:20'),
(62, 'Product 62', 'admin-panel\\img\\p6.jpg', 27, 42.96, 34.37, 1, 'Description for Product 62', 2, 9, '2022-12-31 18:00:00'),
(63, 'Product 63', 'admin-panel\\img\\p7.jpg', 48, 11.46, 9.17, 1, 'Description for Product 63', 3, 3, '2022-12-31 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role_id`, `created_at`) VALUES
(1, 'ayaTweme', 'ayaatweme@yahoo.com', 'aya_tweme', 'PoIPfvt0fk446', 0, '2023-12-10 17:32:14'),
(2, 'abdallah', 'abdallah@yahoo.com', 'abd', 'PodFqe4ybrEog', 0, '2023-12-14 10:31:25'),
(3, 'Baker', 'bakersabbagh@ass.com', 'Bik', '3190&wise', NULL, '2023-12-15 14:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_meta_tags`
--

CREATE TABLE `user_meta_tags` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_meta_tags`
--
ALTER TABLE `user_meta_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_meta_tags`
--
ALTER TABLE `user_meta_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `user_meta_tags`
--
ALTER TABLE `user_meta_tags`
  ADD CONSTRAINT `user_meta_tags_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
