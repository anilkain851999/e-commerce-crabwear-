-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2022 at 08:15 AM
-- Server version: 10.5.17-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crabwear_crabwear`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_img` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_img`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(1, 'Anil ken', 'admin@gmail.com', '1234', 'img.jpg', '7828507439', 'India', 'Web Developer', 'Hii I am a professional developer ');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `p_id` int(11) NOT NULL,
  `customer_id` varchar(11) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(3, 'Men', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'),
(4, 'Women', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'),
(5, 'Kids', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'),
(6, 'Others', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) DEFAULT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `State` varchar(255) NOT NULL,
  `Shipping_state` varchar(255) NOT NULL,
  `Shipping_city` varchar(255) NOT NULL,
  `Zip` varchar(11) NOT NULL,
  `Shipping_zip` int(11) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `Shipping_address` varchar(255) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `State`, `Shipping_state`, `Shipping_city`, `Zip`, `Shipping_zip`, `customer_contact`, `customer_address`, `Shipping_address`, `customer_ip`, `code`, `status`) VALUES
(228, 'Ajay', 'ajayken73@gmail.com', '$2y$10$mlShvMiSCb0lhH6KzSd47O.anpav47QmD/lIZDHJwDWRX0hM4CMeG', 'USA', 'Wasingtan', 'Madhya Pradesh', 'Madhya Pradesh', 'Gwalior, Dabra', '475110', 475110, '8847447474', 'West Wasintan ', 'Ayodhya Colony  Jail Road Dabra', '180.151.253.82', 0, 'verified'),
(230, 'Akash Kushwah', 'avtechnologies.it@gmail.com', '$2y$10$GRPuAd/cOIQihvnMLNThsOS2z7GQqZm2vQRtcem2ycisL1EN0K5u2', 'India', 'Gwalior', '', '', '', '', 0, '2134567890', '656', '', '', 0, 'verified'),
(231, 'Paka kara shafeeque', 'shqpk1@gmail.com', '$2y$10$9.8T6ykfR5lNW3meiRAjcem.OwHj5SIcQlGP6.dllBzyofmckOYAe', '', '', '', '', '', '', 0, '', '', '', '', 0, 'verified'),
(232, 'anil ken', 'anilkain851999@gmail.com', '$2y$10$eNhs7jnxpKrhZxPpDARknuBeyXtf2qGJk69ibQTEAD1qELj1TXjcC', 'India', 'gwalior', 'Madhya Pradesh', 'Madhya Pradesh', 'gwalior', '475110', 475110, '7828507439', 'Ayodhya colony jail road', 'Ayodhya colony jail road', '202.83.17.47', 0, 'verified'),
(233, 'Akash Kushwah', 'automotiveakash@gmail.com', '$2y$10$5h73x6hzm0RSismLs3cgge/YNXsSuawARdMyNrTLOrXbmS3WL.ecK', '', '', '', '', '', '', 0, '', '', '', '', 0, 'verified'),
(234, 'Satz', 'satsa7773@gmail.com', '$2y$10$Gv2wYp807FEebiELsfKi7ubD3Rqs92rl/gs0PIi7YcZhwKTGCAfwK', '', '', '', '', '', '', 0, '', '', '', '', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `customers_order`
--

CREATE TABLE `customers_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(100) NOT NULL,
  `invoice_id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(100) NOT NULL,
  `code` int(100) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyword`, `code`) VALUES
(5, 4, 3, '2022-07-17 05:50:57', ' Symbol Men Sweatshirt Bright Key', '61RsqJNLt-L._UL1500_.jpg', '61ul1AXNL2L._UL1500_.jpg', '81jwDeGj5dL._UL1500_.jpg', 899, '<p>An Amazon brand, Symbol is built on the pillars of quality, reliability and affordability, offering a range of lifestyle essentials that help you look good every day. Choose from a range of modern colours for this crew neck sweatshirt in comfy blended cotton fleece. An effortlessly urban piece to see you through the season. Fetch a casual and stylish look for yourself by teaming it with a pair of jeans and sneakers.</p>', '<p>Symbol Men Sweatshirt Bright Key</p>', ''),
(6, 4, 3, '2022-07-17 05:53:31', ' Symbol Men Sweatshirt Poseidon Blue', '717o98pmMHL._UL1500_.jpg', '71ABsyLg8qL._UL1500_.jpg', 'A1837LFyiWL._UL1500_.jpg', 899, '<p>An Amazon brand, Symbol is built on the pillars of quality, reliability and affordability, offering a range of lifestyle essentials that help you look good every day. Choose from a range of modern colours for this crew neck sweatshirt in comfy blended cotton fleece. An effortlessly urban piece to see you through the season. Fetch a casual and stylish look for yourself by teaming it with a pair of jeans and sneakers.</p>', '<p>Symbol Men Sweatshirt Poseidon Blue</p>', ''),
(7, 4, 3, '2022-07-17 05:57:26', ' Symbol Men Sweatshirt Post Green', '81IRA9wGn0L._UL1500_.jpg', '71vknaWR4lL._UL1500_.jpg', '71pHtMRLQVL._UL1500_.jpg', 799, '<p>Amazon brand, Symbol is built on the pillars of quality, reliability and affordability, offering a range of lifestyle essentials that help you look good every day. Choose from a range of modern colours for this crew neck sweatshirt in comfy blended cotton fleece. An effortlessly urban piece to see you through the season. Fetch a casual and stylish look for yourself by teaming it with a pair of jeans and sneakers.</p>', '<p>Symbol Men Sweatshirt Post Green</p>', ''),
(8, 4, 3, '2022-07-17 05:59:00', ' Symbol Men Sweatshirt Symbol Men Sweatshirt', '81c5xeRZyVL._UL1500_.jpg', '81DSg3Wn+DL._UL1500_.jpg', '81GDtlDqUvL._UL1500_.jpg', 999, '<p>An Amazon brand, Symbol is built on the pillars of quality, reliability and affordability, offering a range of lifestyle essentials that help you look good every day. Choose from a range of modern colours for this crew neck sweatshirt in comfy blended cotton fleece. An effortlessly urban piece to see you through the season. Fetch a casual and stylish look for yourself by teaming it with a pair of jeans and sneakers.</p>', '<p>Symbol Men Sweatshirt Symbol Men Sweatshirt</p>', ''),
(9, 4, 3, '2022-07-17 06:00:50', ' Symbol Men Sweatshirt Aqua Blue', '71dnSP7IKbL._UL1500_.jpg', '71xPZ0Fo-6L._UL1500_.jpg', '91c5QNZyE4L._UL1500_.jpg', 499, '<p>An Amazon brand, Symbol is built on the pillars of quality, reliability and affordability, offering a range of lifestyle essentials that help you look good every day. Choose from a range of modern colours for this crew neck sweatshirt in comfy blended cotton fleece. An effortlessly urban piece to see you through the season. Fetch a casual and stylish look for yourself by teaming it with a pair of jeans and sneakers</p>', '<p>Symbol Men Sweatshirt Aqua Blue</p>', ''),
(10, 4, 3, '2022-07-17 06:04:12', ' Symbol Men Sweatshirt Orange', '81kmr4apNtL._UL1500_.jpg', '81owm+BSOrL._UL1500_.jpg', '81agW3G-s5L._UL1500_.jpg', 999, '<p>An Amazon brand, Symbol is built on the pillars of quality, reliability and affordability, offering a range of lifestyle essentials that help you look good every day. Choose from a range of modern colours for this crew neck sweatshirt in comfy blended cotton fleece. An effortlessly urban piece to see you through the season. Fetch a casual and stylish look for yourself by teaming it with a pair of jeans and sneakers.</p>', '<p>Symbol Men Sweatshirt Orange</p>', ''),
(11, 5, 3, '2022-07-18 00:25:49', ' Ben Martin Men Jeans', '616xchp1ECL._UL1440_.jpg', '61W0Ucal3hL._UL1440_.jpg', '81rlLrgobLL._UL1440_.jpg', 4999, '<p>Ben Martin Men Jeans</p>', '<p>Ben Martin Men Jeans</p>', ''),
(12, 4, 4, '2022-07-18 02:28:09', ' Shoppers Stop Solid Cotton Round Neck ', '51H4hT3zksL._UL1000_.jpg', '51H4hT3zksL._UL1000_.jpg', '51H4hT3zksL._UL1000_.jpg', 500, '<p>et GST invoice and save up to 28% on business purchas</p>', '<p>et GST invoice and save up to 28% on business purchas</p>', ''),
(13, 7, 3, '2022-07-19 00:32:24', ' Crab Shorts for Men', '01.jpeg', '01.jpeg', '01.jpeg', 499, '<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\">Country of Origin</td>\r\n<td>India</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\">Length</td>\r\n<td>Knee length</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\">Pack Of</td>\r\n<td>Pack of 1</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\">Fabric</td>\r\n<td>Cotton Blend</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\">Pattern</td>\r\n<td>Solid</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\">Fit</td>\r\n<td>Regular</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\">Occasion</td>\r\n<td>Casual Wear</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<p>Solid Cotton Blend Regular Fit Mens Regular Shorts</p>', ''),
(15, 7, 3, '2022-07-19 00:36:42', ' Crab Shorts for Men', '03.jpeg', '03.jpeg', '03.jpeg', 499, '<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 50.5943%;\">Country of Origin</td>\r\n<td style=\"width: 49.4258%;\">India</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 50.54%;\">Length</td>\r\n<td style=\"width: 49.4801%;\">Knee length</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 50.1868%;\">Pack Of</td>\r\n<td style=\"width: 49.8333%;\">Pack of 1</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 50.1664%;\">Fabric</td>\r\n<td style=\"width: 49.8538%;\">Cotton Blend</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 50.2054%;\">Pattern</td>\r\n<td style=\"width: 49.8147%;\">Solid</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 50.438%;\">Fit</td>\r\n<td style=\"width: 49.5821%;\">Regular</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 50.4264%;\">Occasion</td>\r\n<td style=\"width: 49.5937%;\">Casual Wear</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<p>Solid Cotton Blend Regular Fit Mens Regular Shorts</p>', ''),
(16, 7, 3, '2022-07-19 00:38:30', ' Crab Shorts for Men', '04.jpeg', '04.jpeg', '04.jpeg', 499, '<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 54.0128%;\">Country of Origin</td>\r\n<td style=\"width: 46.0074%;\">India</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 53.9547%;\">Length</td>\r\n<td style=\"width: 46.0655%;\">Knee length</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 54.0893%;\">Pack Of</td>\r\n<td style=\"width: 45.9309%;\">Pack of 1</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 54.2237%;\">Fabric</td>\r\n<td style=\"width: 45.7964%;\">Cotton Blend</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 53.9803%;\">Pattern</td>\r\n<td style=\"width: 46.0398%;\">Solid</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 53.572%;\">Fit</td>\r\n<td style=\"width: 46.4482%;\">Regular</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrib\" style=\"width: 54.0849%;\">Occasion</td>\r\n<td style=\"width: 45.9352%;\">Casual Wear</td>\r\n</tr>\r\n</tbody>\r\n</table>', '<p>Solid Cotton Blend Regular Fit Mens Regular Shorts</p>', ''),
(19, 12, 3, '2022-07-31 05:35:59', ' Full Sleeve Colorblock Men Sports Jacket', 'Mu-Yuan-Yang-Casual-Ultralight-Mens-Duck-Down-Jackets-Autumn-Winter-Coat-Men-Lightweight-Duck-Down.jpg_Q90.jpg_.webp', 'Mu-Yuan-Yang-Casual-Ultralight-Mens-Duck-Down-Jackets-Autumn-Winter-Coat-Men-Lightweight-Duck-Down.jpg_Q90.jpg_ (1).webp', 'Mu-Yuan-Yang-Casual-Ultralight-Mens-Duck-Down-Jackets-Autumn-Winter-Coat-Men-Lightweight-Duck-Down.jpg_Q90.jpg_ (2).webp', 999, '<p>Full Sleeve Colorblock Men Sports Jacket crab Brand</p>', '<p>Full Sleeve Colorblock Men Sports Jacket crab Brand</p>', ''),
(20, 6, 4, '2022-07-19 01:41:23', ' Pure Wool Solid Coat For Women', 'coats_01.webp', 'coats_02.webp', 'coats_03.webp', 3020, '<p>Pure Wool Solid Coat For Women Crab Brand</p>', '<p>Pure Wool Solid Coat For Women Crab Brand</p>', ''),
(22, 4, 5, '2022-07-30 20:35:04', ' VENTRA BOTTOM SPRAY T-SHIRT-BLUE', 'kids.webp', 'kida_1.webp', '02-BottomBlue_648x.webp', 399, '<p>Every day is special with little boys. That&rsquo;s why we made this T-shirt for boys &ndash; the design makes it feel like a treat. And versatile colours mean you can wear it with anything. How about pairing with a skirt for a party, or under dungarees or with denims when the great outdoors calls?</p>', 'VENTRA BOTTOM SPRAY T-SHIRT-BLUE', ''),
(28, 4, 4, '2022-08-22 09:36:56', ' BRAND NEW T-SHIRT', '1.jpg', '2.jpg', '3.jpg', 349, '<div class=\"part\">\r\n<h4 class=\"inner-title mb-2\">Give You A Complete Account Of The System</h4>\r\n<p class=\"font-light\">Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure.</p>\r\n</div>\r\n<div class=\"row g-3 align-items-center\">\r\n<div class=\"col-lg-8\">\r\n<p class=\"font-light\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, autem nemo? Tempora vitae assumenda laudantium unde magni, soluta repudiandae quam, neque voluptate deleniti consequatur laboriosam veritatis? Tempore dolor molestias voluptatum! Minima possimus, pariatur sed, quasi provident dolorum unde molestias, assumenda consequuntur odit magni blanditiis obcaecati? Ea corporis odit dolorem fuga, fugiat soluta consequuntur magni.</p>\r\n</div>\r\n</div>', '<h2>BRAND NEW T-SHIRT</h2>', ''),
(29, 12, 3, '2022-08-28 23:52:57', ' Slim Fit Plastic Coat', '1 (1).jpg', '1 (2).jpg', '1 (1).jpg', 1999, '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', '<p>Slim Fit Plastic Coat</p>', ''),
(30, 12, 4, '2022-08-28 23:55:09', ' Full Jacket Ladies', '5.jpg', '5 (1).jpg', '5.jpg', 1899, '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences</p>', '<p>Full Jacket Ladies</p>', ''),
(31, 4, 3, '2022-08-28 23:57:24', ' Full Slive Black T-Shirt', '6.jpg', '6 (1).jpg', '6.jpg', 499, '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', '<p>Full Slive Black T-Shirt</p>', ''),
(32, 4, 4, '2022-08-29 00:00:17', ' Latest Fashion Cloth', '7.jpg', '7 (1).jpg', '7 (1).jpg', 1499, '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', '<p>Latest Fashion Cloth</p>', ''),
(33, 12, 3, '2022-08-29 00:02:25', ' Blue Leather Jacket', '2 (1).jpg', '2 (2).jpg', '2 (1).jpg', 1999, '<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>', '<p>Blue Leather Jacket</p>', ''),
(34, 4, 4, '2022-09-04 13:53:20', ' Black High Neck Cropped Top', 'd7ae3065-98d4-42d0-b244-d2b18802ff101601959656577-SASSAFRAS-Women-Black-Solid-High-Neck-Cropped-Top-4441601959-1.webp', '7e3f0bf1-2517-4c35-b3e2-d806322972461601959656454-SASSAFRAS-Women-Black-Solid-High-Neck-Cropped-Top-4441601959-3.webp', '4e6fc0b7-c8c6-4ede-9fb2-c1120983a44b1601959656406-SASSAFRAS-Women-Black-Solid-High-Neck-Cropped-Top-4441601959-4.webp', 569, '<div class=\"meta-info\">\r\n<div class=\"meta-desc\">100% Original Products</div>\r\n</div>\r\n<div class=\"meta-info\">\r\n<div class=\"meta-desc\">Pay on delivery might be available</div>\r\n</div>\r\n<div class=\"meta-info\">\r\n<div class=\"meta-desc\">Easy 30 days returns and exchanges</div>\r\n</div>\r\n<div class=\"meta-info\">\r\n<div class=\"meta-desc\">Try &amp; Buy might be available</div>\r\n</div>', '<p>Black High Neck Cropped Top</p>', ''),
(36, 20, 4, '2022-09-06 15:38:40', ' Women Off-White & Blue Quirky Printed A-Line Kurta', 'fd5504ae-55e5-4842-a217-01412c4b29fd1611035470405-Anouk-Women-Off-White--Blue-Quirky-Printed-A-Line-Kurta-2981-1.webp', '2476d421-db68-439d-a067-541d6a32e2431611035470438-Anouk-Women-Off-White--Blue-Quirky-Printed-A-Line-Kurta-2981-3.webp', '52e8f55f-9bad-4a49-92b3-7b5e04de22f71611035470420-Anouk-Women-Off-White--Blue-Quirky-Printed-A-Line-Kurta-2981-4.webp', 599, '<p>Off-White and blue printed A-line kurta, has a round neck, three-quarter sleeves bell sleeves and flared hem<br>This kurta can also be worn as a dress.</p>', '<div class=\"meta-info\">\r\n<div class=\"meta-desc\">Women Off-White &amp; Blue Quirky Printed A-Line Kurta</div>\r\n</div>', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_categeories`
--

CREATE TABLE `product_categeories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categeories`
--

INSERT INTO `product_categeories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(2, 'Accessories', 'The top was clean except for accessories and a few letters standing upright in a sorter.\n\nA large number of minerals may occur as accessories, e.g.'),
(4, 'T-shirt', 'A T-shirt, or tee, is a style of fabric shirt named after the T shape of its body and sleeves. Traditionally, it has short sleeves and a round neckline, known as a crew neck, which lacks a collar. T-shirts are generally made of a stretchy, light, and inexpensive fabric and are easy to clean.'),
(5, 'Jeans', 'Jeans are a type of pants traditionally made from denim (a kind of cotton fabric). The word most commonly refers to denim blue jeans. Jeans can be other colors, but they\'re most commonly blue. The defining feature of most jeans is that they\'re made out of some kind of denim or denim-like fabric.'),
(6, 'Coats', 'A coat typically is an outer garment for the upper body as worn by either gender for warmth or fashion. Coats typically have long sleeves and are open down the front and closing by means of buttons, zippers, hook-and-loop fasteners, toggles, a belt, or a combination of some of these.'),
(7, 'Shorts', 'STAY COOL, COMFORTABLE AND CHIC WITH SHORTS FROM CRAB'),
(12, 'Jackets', 'A jacket is a garment for the upper body, usually extending below the hips. ... A jacket typically has sleeves, and fastens in the front or slightly on the side. '),
(20, 'Kurtas', 'Women Clothing Kurta ');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_name`, `slider_img`) VALUES
(1, 'slider_one', 'banner-crab.jpg'),
(3, 'slider02', 'slider2-h16.jpg'),
(4, 'slider03', 'banner_hero_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_user`
--

CREATE TABLE `subscribe_user` (
  `subs_id` int(255) NOT NULL,
  `subsc_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe_user`
--

INSERT INTO `subscribe_user` (`subs_id`, `subsc_email`) VALUES
(1, 'test@gmail.com'),
(3, ''),
(4, ''),
(5, ''),
(6, '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `customer_id`, `product_id`, `size`) VALUES
(347, 232, 33, 'M'),
(348, 232, 32, 'L'),
(350, 232, 31, 'S'),
(351, 232, 20, 'XL'),
(352, 232, 16, 'XL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customers_order`
--
ALTER TABLE `customers_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categeories`
--
ALTER TABLE `product_categeories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe_user`
--
ALTER TABLE `subscribe_user`
  ADD PRIMARY KEY (`subs_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `customers_order`
--
ALTER TABLE `customers_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_categeories`
--
ALTER TABLE `product_categeories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribe_user`
--
ALTER TABLE `subscribe_user`
  MODIFY `subs_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
