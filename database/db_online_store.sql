-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 09:10 AM
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
-- Database: `db_online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `username`, `email`, `password`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'Admin One', 'adminone', 'admin1@example.com', 'adminpassword1', '08123456789', '2024-04-25 12:07:55', '2024-04-25 12:07:55'),
(2, 'Admin Two', 'admintwo', 'admin2@example.com', 'adminpassword2', '08234567890', '2024-04-25 12:07:55', '2024-04-25 12:07:55'),
(3, 'Admin Three', 'adminthree', 'admin3@example.com', 'adminpassword3', '08345678901', '2024-04-25 12:07:55', '2024-04-25 12:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `username`, `email`, `password`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'johndoe', 'john@example.com', 'password123', '08123456789', 'Jl. Ahmad Yani No. 123', '2024-04-25 12:07:55', '2024-04-25 12:07:55'),
(2, 'Jane Smith', 'janesmith', 'jane@example.com', 'password456', '08234567890', 'Jl. Sudirman No. 456', '2024-04-25 12:07:55', '2024-04-25 12:07:55'),
(3, 'Adam Green', 'adamgreen', 'adam@example.com', 'password789', '08345678901', 'Jl. Gatot Subroto No. 789', '2024-04-25 12:07:55', '2024-04-25 12:07:55'),
(4, 'Sarah White', 'sarahwhite', 'sarah@example.com', 'passwordabc', '08456789012', 'Jl. MH Thamrin No. 890', '2024-04-25 12:07:55', '2024-04-25 12:07:55'),
(5, 'Michael Brown', 'michaelbrown', 'michael@example.com', 'passworddef', '08567890123', 'Jl. Jendral Sudirman No. 901', '2024-04-25 12:07:55', '2024-04-25 12:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 0.00, '2024-04-25 12:27:39', '2024-04-25 12:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category`, `description`, `price`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Indomie Goreng', 'indomie-goreng', 'Makanan', 'Mi instan rasa ayam goreng yang lezat', 2500.00, 90, 'https://example.com/images/indomie.jpg', '2024-04-25 12:10:09', '2024-04-26 06:45:08'),
(2, 'Susu SGM', 'susu-sgm', 'Minuman', 'Susu formula untuk pertumbuhan anak', 15000.00, 50, 'https://example.com/images/susu.jpg', '2024-04-25 12:10:09', '2024-04-25 12:10:09'),
(3, 'Oreo', 'oreo', 'Snack', 'Biskuit cokelat dengan krim vanilla di tengahnya', 10000.00, 80, 'https://example.com/images/oreo.jpg', '2024-04-25 12:10:09', '2024-04-25 12:10:09'),
(4, 'Chitato', 'chitato', 'Snack', 'Keripik kentang dengan berbagai rasa', 5000.00, 70, 'https://example.com/images/chitato.jpg', '2024-04-25 12:10:09', '2024-04-25 12:10:09'),
(5, 'Teh Botol', 'teh-botol', 'Minuman', 'Minuman teh botol dalam kemasan praktis', 5000.00, 60, 'https://example.com/images/tehbotol.jpg', '2024-04-25 12:10:09', '2024-04-25 12:10:09'),
(7, 'Kue Bolu', 'kue-bolu', 'Kue', 'Kue tradisional yang lezat dan lembut', 5000.00, 100, 'https://example.com/images/kuebolu.jpg', '2024-04-25 12:10:09', '2024-04-25 12:10:09'),
(8, 'Kacang Garuda', 'kacang-garuda', 'Snack', 'Kacang renyah dengan berbagai pilihan rasa', 2000.00, 120, 'https://example.com/images/kacanggaruda.jpg', '2024-04-25 12:10:09', '2024-04-25 12:10:09'),
(9, 'Es Teh Manis', 'es-teh-manis', 'Minuman', 'Es teh manis dengan tambahan es batu', 3000.00, 20, 'https://example.com/images/esteh.jpg', '2024-04-25 12:10:09', '2024-04-26 06:45:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
