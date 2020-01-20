-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2020 at 07:55 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lovepoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Sapnų gaudyklės'),
(2, 'Lankeliai'),
(3, 'Pirštinės');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_time` datetime DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE `orders_status` (
  `id` int(11) NOT NULL,
  `status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_status`
--

INSERT INTO `orders_status` (`id`, `status`) VALUES
(1, 'Ruošiamas'),
(2, 'Paruoštas'),
(3, 'Išsiųstas');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `picture_name` varchar(50) NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `picture_name`, `product_id`) VALUES
(1, '10001.jpg', 1),
(2, '10002.jpg', 2),
(3, '10003.jpg', 3),
(4, '10004.jpg', 4),
(5, '10005.jpg', 5),
(6, '10006.jpg', 6),
(7, '10007.jpg', 7),
(8, '10008.jpg', 8),
(9, '10009.jpg', 9),
(10, '10010.jpg', 10),
(11, '10011.jpg', 11),
(12, '10012.jpg', 12),
(13, '10013.jpg', 13);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `product_code` varchar(20) DEFAULT NULL,
  `price` float(7,2) UNSIGNED DEFAULT NULL,
  `material` varchar(300) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `product_code`, `price`, `material`, `description`, `category_id`, `quantity`) VALUES
(1, 'Bordo', '10001', 12.00, 'Dažytas jaspis, medvilniniai siūlai, medinis žiedas.', 'Žiedo skersmuo – 13 cm, visas ilgis – 33 cm.', 1, 1),
(2, 'Pati sau', '10002', 12.00, 'Stiklo karoliukai,medvilniniai siūlai, medinis žiedas.', 'Žiedo skersmuo – 14 cm, visas ilgis – 33 cm.', 2, 1),
(3, 'Tolimam draugui', '10003', 7.00, 'Mėnulio akmuo, stiklo karoliukai, medvilninis siūlas, metalinis žiedelis.', 'Žiedo skersmuo – 7 cm, visas ilgis – 21 cm.', 2, 1),
(4, 'Žvaigždėtas dangus', '10004', 8.00, 'Mediniai karoliukai, medvilninis siūlas, medinis žiedas', 'Žiedo skersmuo – 11 cm, visas ilgis – 29 cm.', 2, 1),
(5, 'Atvirumo', '10005', 15.00, 'Lavos akmuo, agatas, lodalitas, medinis žiedas.', 'Žiedo skersmuo – 21 cm, visas ilgis – 39 cm.', 2, 1),
(6, 'Minčių laisvė', '10006', 7.00, 'Mėnulio akmuo, linas, metalinis žiedas.', 'Žiedo skersmuo – 7 cm, visas ilgis – 23 cm.', 1, 1),
(7, 'Namams', '10007', 10.00, 'Medvilnė, raudonasis jaspis, houlitas, medinis žiedas.', 'Žiedo skersmuo – 12 cm, visas ilgis – 32 cm.', 1, 1),
(8, 'Drąsiai ir lengvai', '10008', 17.00, 'Medvilnė, stiklas, medinis žiedas', 'Žiedo skersmuo – 16 cm, visas ilgis – 37 cm.', 1, 1),
(9, 'Mėta', '10009', 15.00, 'Stiklo, žaliojo aventurino, dūminio kvarco, plastiko karoliukai, medvilninis siūlas, medinis žiedas', 'Žiedo skersmuo – 19 cm, visas ilgis – 42 cm.', 3, 1),
(10, 'Tvirtai ant kojų', '10010', 17.00, 'Raudonasis jaspis, linas, medvilninis siūlas, metalinis žiedas.', 'Žiedo skersmuo – 24 cm, visas ilgis – 44 cm.', 3, 1),
(11, 'Mano saulė', '10011', 17.00, 'Žaliasis aventurinas, linas, medvilninis siūlas', 'Žiedo skersmuo – 24 cm, visas ilgis – 50 cm.', 3, 1),
(12, 'Saulėlydžio ramuma', '10012', 16.00, 'Pajūrio smilgos, stiklo karoliukai, virvė, medinis žiedas', 'Žiedo skersmuo – 20 cm, visas ilgis – 47 cm.', 3, 1),
(13, 'Rožiniai sapnai', '10013', 15.00, 'Stiklo karoliukai,medvilniniai siūlai, metalinis žiedas.', 'Žiedo skersmuo – 16 cm, visas ilgis – 40 cm.', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `lastname`, `email`, `password`, `role`) VALUES
(6, 'Admin', 'Admin', 'admin@admin.lt', '$2y$10$dKwtaIrP3vxPpsonRggGKeq4EAK.xgnDSEYnY3apLrqnuJcJxIOsS', 2),
(12, 'Vardenis', 'Pavardenis', 'vardenis@pavardenis.lt', '$2y$10$R4hEuIcJOZhjVzYzSg2UX.6fsLt4AhHbmFgy4f6LIkdQQeYn8JN7q', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_adresses`
--

CREATE TABLE `users_adresses` (
  `id` int(11) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders_status`
--
ALTER TABLE `orders_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pictures_ibfk_1` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_adresses`
--
ALTER TABLE `users_adresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders_status`
--
ALTER TABLE `orders_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_adresses`
--
ALTER TABLE `users_adresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `orders_status` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users_adresses`
--
ALTER TABLE `users_adresses`
  ADD CONSTRAINT `users_adresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
