-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 06:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerceapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_active`) VALUES
(5, 'Bruno', 'brunoadmin@gmail.com', '$2y$10$qZ0OoyX8bhAVxDFM/fx8leZSZwlyq15c1C/KTnaqDLSx6eCDJ0VpC', '0'),
(8, 'Harry Den', 'harryden@gmail.com', '$2y$10$YKSDtra7v2wH6ORYfry8Ue9t49pk1AvQvdJGuq4lDvFLEcx.kP6Mq', '0'),
(9, 'amine bel', 'amine@gmail.com', '$2y$10$u7WCsrywKLhCcdj7liNVU.jaqh9VXJTi98Es5TXZGRADllPXuVquO', '0');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Apple'),
(6, 'OnePlus+'),
(8, 'Aduro'),
(11, 'Sans fil'),
(12, 'dell'),
(13, 'asus');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(1, 4, '::1', 4, 1),
(9, 4, '127.0.0.1', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'watches'),
(6, 'headphones'),
(12, 'smartphones'),
(13, 'tablettes'),
(14, 'pc ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 1, 1, 1, '9L434522M7706801A', 'Completed'),
(2, 1, 2, 1, '9L434522M7706801A', 'Completed'),
(3, 1, 3, 1, '9L434522M7706801A', 'Completed'),
(4, 1, 1, 1, '8AT7125245323433N', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 12, 2, 'Samsung Galaxy Z Fold 2', 2000, 5, 'Le Samsung Galaxy Z Fold 2 est la seconde itération du premier smartphone pliable de Samsung. Il est équipé d\'un écran de 7,6 pouces pliable sur lui-même avec un second écran de 6,23 pouces sur sa face gauche. Il aurait également une nouvelle solution photo avec un triple capteur de 12+12+12 mégapixels et une batterie de 4500 mAh', '1616500092_sm-zfold.jpg', 'samsung, mobile, galaxy fold'),
(2, 12, 3, 'Iphone 12 Pro Max', 5000, 7, 'L\'iPhone 12 Pro Max est le modèle grand-format haut de gamme de la 14e génération de smartphone d\'Apple annoncé le 13 octobre 2020. Il est équipé d\'un écran de 6,7 pouces OLED HDR 60 Hz, d\'un triple capteur photo avec ultra grand-angle et téléobjectif (x5 optique) et d\'un SoC Apple A14 Bionic compatible 5G (sub-6 GHz', '1616499931_iph12pm.jpg', 'apple, iphone'),
(4, 12, 2, 'Samsung Galaxy S21 Ultra', 3000, 10, 'Le Samsung Galaxy S21 Ultra est le fleuron de la marque en 2021 qui succède au S20 Ultra. Il est équipé du SoC maison Exynos 2100 gravé en 5 nm, d\'un écran WQHD+ en 120 Hz adaptatif, d\'une batterie de 5000 mAh compatible charge rapide et sans fil et de 4 capteurs photo : le principal à 108 mégapixels (de deuxième génération) capable de filmer jusqu\'en 8K, un ultra grand-angle de 12 mégapixels et deux téléobjectifs de 10 mégapixels pour des zooms optiques x3 et x10', '1616492395_Samsung-Galaxy-S21-Ultra-1608287647-0-0.jpg', 'samsung, s21, s21 ultra'),
(5, 12, 6, 'OnePlus 8T', 3500, 13, 'Le OnePlus 8T est un smartphone haut de gamme équipé d\'un SoC Qualcomm Snapdragon 865 couplé à 8 ou 12 Go de RAM et 128 ou 256 Go de stockage. Il a un bloc de 4 modules photos à l\'arrière : le principal à 48 mégapixels, un ultra grand angle de 16 mégapixels, une macro et un capteur de profondeur de 5 et 2 mégapixels. Il possède une batterie de 4500 mAh compatible charge rapide de 65 W', '1616500410_OnePlus-8T-5G-Lunar-Silver-8GB-RAM-128GB-Storage-image-4.jpg', 'one plus, oneplus8'),
(10, 6, 8, 'Aduro Wireless Headphones', 500, 6, 'Amazing Bluetooth headphones sound with aptX technology. High-quality built-in microphone with Bluetooth 5.0 technology', '1616502854_hdphn.jpg', 'headphone, aduro'),
(21, 12, 3, 'apple', 300, 4, 'hjhjdshfdhfkljdskfjdlkjkfldsjfkldc', 'c07961184.png', 'apple'),
(22, 2, 1, 'headphone', 500, 6, 'csdcsdcdscdsc', 'el_hover_img1.jpg', 'ddd'),
(23, 6, 11, 'Philips PH805', 1000, 10, 'Le Philips ph805 est un casque circum-aural sans fil compatible Hi-Res audio, qui peut se replier et possédant une autonomie annoncée de 31 heures. Sa recharge complète prend environ 2 heures et dem', 'philips-ph805-frandroid-2020.webp', 'philips,android'),
(24, 6, 8, 'adurooo', 3002, 8, 'dkkskdksdks', 'soundcore-life-q30-frandroid-2021.webp', 'aduro');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL,
  `userName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `userPassword`, `mobile`, `address1`, `address2`, `userName`) VALUES
(5, 'Steeve', 'Rogers', 'steeve1@gmail.com', '305e4f55ce823e111a46a9d500bcb86c', '9876547770', '573  Pinewood Avenue', 'MN', ''),
(6, 'Melissa', 'Gilbert', 'gilbert@gmail.com', '305e4f55ce823e111a46a9d500bcb86c', '7845554582', '1711  McKinley Avenue', 'MA', ''),
(7, 'amine', 'annns', 'amine@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0644335533', 'hello1', 'hello2', ''),
(8, 'amine', 'belhadj', 'b@gmail.com', '6ebe76c9fb411be97b3b0d48b791a7c9', '0987654321', 'dwhd', 'jhskjd', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_cat` (`product_cat`),
  ADD KEY `fk_product_brand` (`product_brand`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_brand` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
