-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2022 at 02:49 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_active`) VALUES
(10, 'ahmed ammine', 'ammine@gmail.com', '$2y$10$nn7WAqh8AOI.9ln27jZFeeGBj3IlyQbxOki2rva/CRGRCmjm6fs5G', '0');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'Sony'),
(6, 'OnePlus+'),
(12, 'dell'),
(13, 'JBL'),
(15, 'Asus'),
(16, 'Acer'),
(17, 'Huawei');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(35, 48, '127.0.0.1', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(12, 'Mobiles'),
(15, 'Casques'),
(16, 'ordinateurs portables'),
(17, 'tablettes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `date_cmd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`, `date_cmd`) VALUES
(1, 1, 1, 1, '9L434522M7706801A', 'Completed', '2022-06-07 08:55:23'),
(2, 1, 2, 1, '9L434522M7706801A', 'Completed', '2022-06-07 08:55:23'),
(3, 1, 3, 1, '9L434522M7706801A', 'Completed', '2022-06-07 08:55:23'),
(4, 1, 1, 1, '8AT7125245323433N', 'Completed', '2022-06-07 08:55:23'),
(7, 7, 27, 1, 'B5M1TEQE8OPJKXURB', 'Completed', '2022-06-07 08:04:18'),
(8, 7, 2, 1, 'QPS1YC8XVMWYKQFQP', 'Completed', '2022-06-07 08:11:07'),
(13, 7, 29, 1, 'VVHW1L34HCS3YA1QK', 'Completed', '2022-06-28 10:48:19'),
(14, 7, 1, 1, 'VVHW1L34HCS3YA1QK', 'Completed', '2022-06-28 10:48:19'),
(15, 21, 4, 1, 'D9OLS2EQJBDAEBJ89', 'Completed', '2022-06-28 10:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_product_cat` (`product_cat`),
  KEY `fk_product_brand` (`product_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 12, 2, 'Samsung Galaxy Z Fold 2', 3000, 5, 'Le Samsung Galaxy Z Fold 2 est la seconde iteration du premier smartphone pliable de Samsung. Il est equipe d un ecran de 7,6 pouces pliable sur lui meme avec un second ecran de 6,23 pouces sur sa face gauche. Il aurait egalement une nouvelle solution photo avec un triple capteur de 12+12+12 megapixels et une batterie de 4500 mAh.', '1616500092_sm-zfold.jpg', 'samsung, mobile, galaxy fold'),
(2, 12, 3, 'Iphone 12 Pro Max', 4500, 7, 'iPhone 12 Pro Max est le modele grand format haut de gamme de la 14e generation de smartphone d Apple annonce le 13 octobre 2020. Il est equipe d un ecran de 6,7 pouces OLED HDR 60 Hz, d un triple capteur photo avec ultra grand angle et teleobjectif (x5 optique) et d un SoC Apple A14 Bionic compatible 5G (sub-6 GHz).', '1616499931_iph12pm.jpg', 'apple, iphone'),
(4, 12, 2, 'Samsung Galaxy S21 Ultra', 3500, 10, 'Le Samsung Galaxy S21 Ultra est le fleuron de la marque en 2021 qui succede au S20 Ultra. Il est equipe du SoC maison Exynos 2100 grave en 5 nm, d un ecran WQHD+ en 120 Hz adaptatif, d une batterie de 5000 mAh compatible charge rapide et sans fil et de 4 capteurs photo', '1616492395_Samsung-Galaxy-S21-Ultra-1608287647-0-0.jpg', 'samsung, s21, s21 ultra'),
(5, 12, 6, 'OnePlus 8T', 3000, 13, 'Le OnePlus 8T est un smartphone haut de gamme equipe d un SoC Qualcomm Snapdragon 865 couple a 8 ou 12 Go de RAM et 128 ou 256 Go de stockage. Il a un bloc de 4 modules photos a l arriere : le principal a 48 megapixels, un ultra grand angle de 16 megapixels, une macro et un capteur de profondeur de 5 et 2 megapixels. Il possede une batterie de 4500 mAh compatible charge rapide de 65 W.', '1616500410_OnePlus-8T-5G-Lunar-Silver-8GB-RAM-128GB-Storage-image-4.jpg', 'one plus, oneplus8'),
(27, 16, 15, 'asus-zenbook-14-oled-ux3402-frandroid-2022', 4000, 10, 'Le Zenbook 14 OLED (UX3402) d Asus est un laptop polyvalent annonce en 2022 possedant un ecran tactile OLED au format 16:10 de 14 pouces avec un taux de rafraichissement de 90 Hz, anime par un processeur Intel de 12eme generation, le tout couple a 16 Go de RAM et 1 To de SSD.', '1654155755_asus-zenbook-14-oled-ux3402-frandroid-2022.png', 'azuz,2022'),
(28, 12, 3, 'iphone-xr-2018', 4000, 10, 'iPhone XR d Apple a ete annonce le 12 septembre 2018. Il propose un ecran de 6,1 pouces LCD avec une definition de 1792 x 828 pixels, un objectif photo de 12 megapixels et un SoC Apple A12 Bionic epaule par 3 Go de RAM.', '1654768791_iphone-xr-2018.png', 'iphone,XR,2018'),
(43, 17, 2, 'samsung-galaxy-tab-a8-frandroid-2021', 2000, 10, 'Le Samsung Galaxy Tab A8, successeur du Galaxy Tab A7 est un modele entree de gamme qui possede un ecran de 10.5 pouces et possedant jusqua 4 Go de RAM et 128 Go de stockage, extensible jusqu a 1 To via microSD', '1656405950_samsung-galaxy-tab-a8-frandroid-2021.png', 'samsung'),
(45, 16, 16, 'acer-chromebook-cb317-2021-frandroid-2021', 4000, 5, 'L Acer Chromebook CB317 annonce en 2021 est le premier Chromebook au format 17 pouces. Son ecran LCD peut etre tactile selon la version choisie. Cote autonomie, la marque assure 10 heures d utilisation. Cote connectique il dispose de 2 ports USB 3.2 Type C ainsi que d autres ports supplementaires pour diversifier son utilisation.', '1656409884_acer-chromebook-cb317-2021-frandroid-2021.png', 'Acer, pc portable, 2021'),
(46, 15, 3, 'apple-airpods-max-frandroid-2020', 1000, 15, 'Le AirPods Max est le premier casque sans fil d Apple annonce le 8 decembre 2020. Annonce au prix de 629 euros, il adresse un segment haut de gamme avec une reduction de bruit et des fonctionnalites de son spacial dans les contenus compatibles', '1656410006_apple-airpods-max-frandroid-2020.png', 'Airpods,apple'),
(47, 16, 1, 'hp-chromebook-14-1', 3500, 5, 'Le HP Chromebook 14 est un ordinateur portable au format 14 pouces qui fonctionne sous Chrome OS et qui profite donc de toutes les applications de Chrome. Il est equipe d un processeur NIVIDIA Tegra K1 cadence a 1.1 GHz epaule par 4 Go de RAM et dispose de 16 Go de stockage interne', '1656410970_hp-chromebook-14-1.png', 'HP, ordinateur portable, 14'),
(48, 15, 13, 'jbl-live-460nc-2021', 500, 13, 'Le JBL Live 460NC est un casque sans fil supra-auriculaire, plus abordable que son grand frere le Live 660NC. Il est equipe egalement de la reduction de bruit adaptative', '1656411708_jbl-live-460nc-frandroid-2021.png', 'JBL, Casque'),
(49, 15, 13, 'jbl-tour-one-2021', 1200, 10, 'Annonce en 2021, le JBL Tour One est un casque au format circum-auriculaire annoncant une autonomie maximale de 50 heures (avec le bluetooth seulement). Il est compatible charge rapide (10 minutes de charge pour 2 heures d ecoute). Il beneficie de la reduction de bruit active et la compatibilite Hi-Res Audio.', '1656411815_jbl-tour-one-frandroid-2021.png', 'JBL,casque, tour one, 2021'),
(50, 17, 3, 'Apple iPad Air 2020', 3999, 19, 'L iPad Air 2020 reprend la formule introduite par l iPad Pro 2018 dans une solution plus accessible. Annoncee le 15 septembre 2020, il s agit du premier produit de la marque a etre equipe d un SoC Apple A14 Bionic', '1656411939_apple-ipad-air-2020-frandroid.png', 'Apple, Tablette,2022'),
(51, 16, 15, 'ASUS ROG Zephyrus G14 2022 (GA402R)', 8000, 20, 'Annonce au CES 2022 de Las Vegas, le PC portable ASUS ROG Zephyrus G14 (2022) possede un ecran WQUXGA (3840 x 2400 pixels) de 14 pouces avec un taux de rafraichissement de 120 Hz. Il est alimente par un processeur AMD Ryzen 9 et un GPU AMD Radeon RX 6800S, le tout couple jusqua 32 Go de RAM et 1 To de SSD', '1656412093_asus-rog-zephyrus-g14-2022-frandroid-2022.png', 'ASUS, Zephurus, 2022'),
(52, 16, 12, 'dell-xps-17-9710-2021', 5000, 10, 'Le PC portable Dell XPS 17 9710 possede des caracteristiques le rendant polyvalent, mais oriente surtout pour des createurs de contenus que pour les gamers. Il se dote d un ecran LCD tactile de 17 pouces, anime par un processeur Intel de 11eme generation (Intel Core i9-11900H) et un GPU NVIDIA GeForce RTX 3060, le tout couple a 32 Go de RAM et 1 To de SSD.', '1656412223_dell-xps-17-9710-frandroid-2021.png', 'DELL, xps, 2021'),
(53, 16, 3, 'apple-macbook-air-2020-m1', 6000, 5, 'Le MacBook Air 2020 avec M1 est l un des premiers avec un SoC Apple Silicon (ARM) M1 annonce le 10 novembre 2020. Il embarque macOS 11 Big Sur et offre un mode compatibilite pouvant executer des applications x86 (Intel). Il est annonce a partir de 11965 MAD.', '1656412850_apple-macbook-air-2020-m1-frandroid.png', 'Apple, Macbook Air, 2020'),
(54, 12, 17, 'huawei-mate-40-pro-2020', 3000, 25, 'La Huawei Mate 40 Pro est un smartphone haut de gamme annonce le 22 octobre 2020. Il est equipe d un ecran OLED de 6,76 pouces, d un SoC Kirin 9000 epaule et d un triple capteur photo polyvalent avec TOF a l arriere. Il fait tourner a son lancement Android 10 avec l interface EMUI sans les applications Google dont le Play Store.', '1656413418_huawei-mate-40-pro-frandroid-2020.png', 'Huawei,2020');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

DROP TABLE IF EXISTS `product_review`;
CREATE TABLE IF NOT EXISTS `product_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` varchar(20) CHARACTER SET latin1 NOT NULL,
  `review` text CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `user_id`, `rating`, `review`, `status`, `added_on`) VALUES
(1, 1, 7, 'Very Good', 'good product', 1, '2022-06-11 12:19:10'),
(2, 2, 7, 'Bien', 'est un beau produit', 1, '2022-06-11 07:45:01'),
(3, 4, 21, 'Bien', 'Ce produit est beau', 1, '2022-06-28 10:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(7, 'ammine', 'belhadj', 'belhadj@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0628400989', 'nablous1', 'hhh2'),
(21, 'taha', 'miri', 'taha@gmail.com', '6ebe76c9fb411be97b3b0d48b791a7c9', '0628400971', 'street1', 'street2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
