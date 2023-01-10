-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 07:04 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'hassen', 'hassen@gmail.com', '$2y$10$M4qymuK9Powxytb/5Tr7beMLavej0Q1dGDbxeeP6inn0/wA1PTrzO');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'امبرو'),
(2, 'اديداس'),
(3, 'اكتيف'),
(4, 'جهينة'),
(5, 'لمار'),
(6, 'بيتى'),
(7, 'جالاكسى'),
(8, 'كيت كات'),
(9, 'كادبوري');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(7, '127.0.0.1', 0),
(12, '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'كوتشي'),
(2, 'شوكلاته'),
(3, 'عصير');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(8, 3, 1200034818, 10, 1, 'pending'),
(9, 3, 378604530, 10, 1, 'pending'),
(10, 3, 1778511871, 11, 1, 'pending'),
(11, 3, 215147460, 9, 1, 'pending'),
(12, 6, 1715869643, 9, 1, 'pending'),
(13, 6, 1931970045, 2, 1, 'pending'),
(14, 6, 1167298290, 11, 1, 'pending'),
(15, 6, 1203571163, 12, 1, 'pending'),
(16, 6, 2127422551, 6, 2, 'pending'),
(17, 6, 1474445868, 5, 2, 'pending'),
(18, 7, 679253855, 12, 1, 'pending'),
(19, 6, 372692724, 4, 1, 'pending'),
(20, 6, 1966859290, 10, 1, 'pending'),
(21, 6, 615421702, 11, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_price`, `date`, `status`) VALUES
(1, 'كوتشى امبرو ازرق ', 'كوتشى امبرو اصلى لون ازرق ', 1, 1, '0.jpg', '1.jpg', '850', '2022-12-08 13:30:41', 'true'),
(2, 'كوتشى امبرو اسود', 'كوتشى اصلى رائع', 1, 1, '2.jpg', '3.jpg', '900', '2022-11-26 10:08:51', 'true'),
(3, 'كوتشى اديداس', 'كوتشى اصلى رائع', 1, 2, '4.jpg', '5.jpg', '700', '2022-11-26 10:10:16', 'true'),
(4, 'كوتشى اكتيف', 'كوتشى اصلى رائع ', 1, 3, '6.jpg', '7.jpg', '320', '2022-11-26 10:09:45', 'true'),
(5, 'عصير جهينة', 'عصير جهينة فريش', 3, 4, '8.jpg', '9.jpg', '8', '2022-11-26 12:19:50', 'true'),
(6, 'عصير لمار', 'عصير لمار فريش', 3, 5, '10.jpg', '11.jpg', '12', '2022-11-26 12:20:25', 'true'),
(7, 'عصير بيتى', 'عصير بيتى فريش', 3, 6, '12.jpg', '13.jpg', '10', '2022-11-26 12:22:28', 'true'),
(8, 'شكولاته جالكسى', 'شكولاته جالكسى رائعة', 2, 7, '14.jpg', '15.jpg', '11', '2022-11-26 12:24:26', 'true'),
(9, 'شكولاته كيت كات', 'شكولاته كيت كات رائعة', 2, 8, '18.jpg', '19.jpg', '6', '2022-11-26 12:25:01', 'true'),
(10, 'شكولاته جالاكسى flutes', 'شكولاته جالاكسى flutes رائعة', 2, 7, '16.jpg', '17.jpg', '7', '2022-11-26 12:25:44', 'true'),
(11, 'شكولاته كادبورى', ' dairy milk شكولاته كادبورى رائعة', 2, 9, '20.jpg', '21.jpg', '8', '2022-11-26 12:26:27', 'true'),
(12, 'شوكلاته جالاكسى بالمكسرات', 'شوكلاته بالمكسرات رائعة', 2, 7, '777.jpg', '7777.jpg', '14', '2022-12-07 09:26:54', 'true'),
(15, 'شوكلاته كادبورى اوريو', 'شوكلاته كادبورى اوريو رائعة جدا', 2, 9, '666.jpg', '6666.jpg', '10', '2022-12-07 09:31:20', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(15, 6, 15, 1167298290, 2, '2022-12-08 16:03:55', 'complete'),
(16, 6, 914, 1203571163, 2, '2022-12-08 16:09:31', 'complete'),
(17, 6, 24, 2127422551, 1, '2022-12-08 21:55:59', 'complete'),
(18, 6, 16, 1474445868, 1, '2022-12-08 22:05:09', 'complete'),
(19, 7, 14, 679253855, 1, '2022-12-10 21:27:16', 'complete'),
(20, 6, 320, 372692724, 1, '2022-12-11 00:56:53', 'complete'),
(21, 6, 7, 1966859290, 1, '2023-01-02 11:09:23', 'complete'),
(22, 6, 20, 615421702, 2, '2023-01-04 22:15:00', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(5, 15, 1167298290, 15, 'Paypal', '2022-12-08 16:03:55'),
(6, 16, 1203571163, 914, 'Cash on dlivery', '2022-12-08 16:09:31'),
(7, 17, 2127422551, 24, 'pay offline', '2022-12-08 21:55:59'),
(8, 18, 1474445868, 16, 'Paypal', '2022-12-08 22:05:09'),
(9, 19, 679253855, 14, 'UPI', '2022-12-10 21:27:16'),
(10, 20, 372692724, 320, 'Paypal', '2022-12-11 00:56:53'),
(11, 21, 1966859290, 7, 'Select payment mode', '2023-01-02 11:09:23'),
(12, 22, 615421702, 20, 'Netbanking', '2023-01-04 22:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `use_mobil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `use_mobil`) VALUES
(6, 'ali120', 'ali120@gmail.com', '$2y$10$9y8UJpAS6Of0Zl4NoFY.EOmWnT4CFc2GzKINXaLxjHYD8ZqMvQ3em', '0.jpg', '::1', 'vengt alex', '01566774455'),
(7, 'hassen', 'hassen@gmail.com', '$2y$10$lHQPoikBZOo12EciPZEZduXGTH.WniImtXdEv6lnQ0WCWuKR/enMO', '4.jpg', '127.0.0.1', '55 tht ', '01199887766'),
(9, 'said', 'said@gmail.com', '$2y$10$auy6TIPXHYhWNjD4nBFAuOZ9hlkPw9mVE0nHNloqeskJ5OppRICQa', '3.jpg', '::1', '66 nnhy', '01066885533'),
(11, 'www', 'www@gmail.com', '$2y$10$lLHJa2xSaJgspC2Fe9OzWehzl/reH3NKbFLn3277qMDtno1ERI8KS', '10.jpg', '127.0.0.1', 'w33ew', '01155115511');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
