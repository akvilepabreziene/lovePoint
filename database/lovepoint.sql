DROP DATABASE `lovepoint`;

CREATE DATABASE IF NOT EXISTS `lovepoint`;

USE `lovepoint`

CREATE TABLE `users` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `user_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(40),
    `role` INT NOT NULL
);

CREATE TABLE `categories` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `category_name` VARCHAR(100) NOT NULL 
);

CREATE TABLE `customers` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    `name` VARCHAR(100) NOT NULL,
    `lastname` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `adress` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(100)
);

CREATE TABLE `orders_status` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `status` VARCHAR(40) 
);    

CREATE TABLE `products` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(50),
    `product_code` VARCHAR(20),
    `price` FLOAT(7,2) UNSIGNED,
    `material` VARCHAR(300),
    `description` VARCHAR(300),
    `category_id` INT,
    `quantity` INT UNSIGNED,
    FOREIGN KEY (`category_id`) REFERENCES `categories`(id) ON DELETE SET NULL
    ON UPDATE CASCADE
);

CREATE TABLE `pictures` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    `picture_name` VARCHAR(50) NOT NULL, 
    `product_id` INT,
    FOREIGN KEY (`product_id`) REFERENCES `products`(id) ON DELETE SET NULL
    ON UPDATE CASCADE
);

CREATE TABLE `orders` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    `customer_id` INT,
    `order_code` VARCHAR(20),
    `order_time` DATETIME,
    `status_id` INT,
    FOREIGN KEY (`customer_id`) REFERENCES `customers`(id) ON DELETE SET NULL
    ON UPDATE CASCADE,
    FOREIGN KEY (`status_id`) REFERENCES `orders_status`(id) ON DELETE SET NULL
    ON UPDATE CASCADE
);


CREATE TABLE `orders-products` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    `order_id` INT,
    `product_id` INT,
    `quantity` INT UNSIGNED,
    FOREIGN KEY (`order_id`) REFERENCES `orders`(id) ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `products`(id) ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE `users_adresses` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    `adress` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(100),
    `user_id` INT,
    FOREIGN KEY (`user_id`) REFERENCES `users`(id) ON DELETE CASCADE
    ON UPDATE CASCADE
);

