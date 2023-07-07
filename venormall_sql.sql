-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 11:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `venormall`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `userid`, `category`) VALUES
(1, 'e9vrQRqugz', 'clothes'),
(2, 'e9vrQRqugz', 'bags'),
(3, 'e9vrQRqugz', 'prov'),
(4, 'e9vrQRqugz', 'perf'),
(5, '7npC1ZBhHa', 'Shoes'),
(6, 'e9vrQRqugz', 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(4, 'ikechukwupip45@gmail.com'),
(5, 'obi@gmail.com'),
(6, 'ikechukwuphilip45@gmail.com'),
(7, 'ikechukwuphilip45@gmail.com'),
(8, 'ikechukwuphilip45@gmail.com'),
(9, 'ikechukwuphilip45@gmail.com'),
(10, 'ikechukwuphilip45@gmail.com'),
(11, 'philipnation54@gmail.com'),
(12, 'obi@gmail.com'),
(13, 'obi@gmail.com'),
(14, 'ikechukwuphilip45@gmail.com'),
(15, 'ikechukwuphilip4@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `ordername` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `street_address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `delivery_note` varchar(100) DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `product_quantity_total` varchar(100) NOT NULL,
  `order_total` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `selling_price` varchar(1000) NOT NULL,
  `delivery_fee` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `ordername`, `firstname`, `lastname`, `country`, `street_address`, `city`, `state`, `phone_number`, `email`, `payment_method`, `delivery_note`, `product_name`, `product_price`, `product_quantity`, `product_quantity_total`, `order_total`, `product_image`, `date`, `order_date`, `selling_price`, `delivery_fee`, `action`) VALUES
(29, 'e9vrQRqugz', 'order7628049', 'PHILIP', 'IKECHUKWU', 'Nigeria', 'No. 29 St. Stephen\'s drive F.H.E', 'Onitsha', 'Anambra', '09157078097', 'ikechukwuphilip45@gmail.com', 'Payment on delivery', 'Fast delivery please', 'tshirt,blue shorts,big brother', '3000,2400,900', '32,15,20', '96000,36000,18000', '150000', 'short.jpg,46750.jpg,bigbrother.jpeg', '7th July, 2023', '2023-07-07', '118000', '200', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_report`
--

CREATE TABLE `order_report` (
  `id` int(10) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `price_sold` varchar(100) NOT NULL,
  `price_gained` varchar(100) NOT NULL,
  `delivery_fee` varchar(100) NOT NULL,
  `date_ordered` varchar(100) NOT NULL,
  `date_delivered` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `paid_date` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `amount_in_stock` varchar(100) NOT NULL,
  `product_description` varchar(9000) NOT NULL,
  `cost_price` varchar(100) NOT NULL,
  `selling_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `userid`, `category`, `product_code`, `product_name`, `product_price`, `product_image`, `amount_in_stock`, `product_description`, `cost_price`, `selling_price`) VALUES
(1, 'e9vrQRqugz', 'clothes', '1234', 'tshirt', '3000', 'short.jpg', '30', 'A very nice product. Always suit any weather condition.A very nice product. Always suit any weather.A very nice product. Always suit any weather condition.A very nice product. Always suit any weather condition.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice product.A very nice productA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather conditionA very nice product. Always suit any weather condition', '2500', '3000'),
(2, 'e9vrQRqugz', 'prov', '2468', 'big brother', '900', 'bigbrother.jpeg', '10', 'Big brother is a very sweet bread that tastes so so nice that you can eat it every morning and never to get tired.', '400', '900'),
(3, 'e9vrQRqugz', 'clothes', 'BxKQwyZEmD', 'blue shorts', '2400', '46750.jpg', '20', 'A very easy and simple shorts. You can wear it for any occasion and for anything.', '2000', '2400'),
(4, 'e9vrQRqugz', 'Accessories', 'KVQll4G6qG', 'X box full set', '45000', '26349.jpg', '20', 'Full Xbox set. Ready to be played.', '25000', '45000');

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `ref_code` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`id`, `userid`, `ref_code`, `action`) VALUES
(5, '45zHM77v5L', 'fOB0D0H2NB', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(100) NOT NULL,
  `userid` varchar(300) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `userid`, `name`, `link`) VALUES
(1, 'e9vrQRqugz', 'facebook', 'https://facebook.com/invite.php?id=383837'),
(2, 'e9vrQRqugz', 'instagram', 'https://instagram.com/philip_nation01'),
(3, 'e9vrQRqugz', 'whatsapp', 'https://wa.com'),
(4, 'e9vrQRqugz', 'twitter', 'https://twitter.com');

-- --------------------------------------------------------

--
-- Table structure for table `store_setting`
--

CREATE TABLE `store_setting` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `store_name` varchar(100) NOT NULL,
  `store_description` varchar(500) NOT NULL,
  `pixel_code` varchar(1000) DEFAULT NULL,
  `keyword` varchar(300) DEFAULT NULL,
  `delivery_note` varchar(100) DEFAULT NULL,
  `delivery_fee` varchar(100) DEFAULT NULL,
  `services` varchar(500) DEFAULT NULL,
  `about` varchar(400) NOT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `store_color` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_setting`
--

INSERT INTO `store_setting` (`id`, `userid`, `store_name`, `store_description`, `pixel_code`, `keyword`, `delivery_note`, `delivery_fee`, `services`, `about`, `tel`, `logo`, `discount`, `store_color`) VALUES
(14, 'e9vrQRqugz', 'philip', 'a very nice store to sell clothes', '21', 'e-commerce, sales, selling', NULL, '200', NULL, 'clothing store', '08120188577', 'logo43221.png', NULL, '#4e759c'),
(15, '7npC1ZBhHa', 'lishoes', 'Lishoes is a shoe company that deals on shoes of high quality.', '', '', NULL, 'Free', NULL, 'Lishoes provides the best type of shoes to use', '08120188577', 'logo79243.jpg', NULL, '#a65b5b');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `reg_date` varchar(100) NOT NULL,
  `venorcredit` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL,
  `ref_code` varchar(100) NOT NULL,
  `template` varchar(100) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `name`, `email`, `password`, `phone_number`, `business_name`, `reg_date`, `venorcredit`, `status`, `action`, `ref_code`, `template`, `plan`, `active`) VALUES
(35, 'e9vrQRqugz', 'philip ikechukwu', 'ikechukwuphilip45@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '08120188577', 'philipshoes', '22nd June, 2023', '0', 'unpaid', 'active', 'GJdsg53G42', '1', 'starter', '1'),
(36, '7npC1ZBhHa', 'John ali', 'philipnation54@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '09157078097', 'lishoe', '4th July, 2023', '0', 'unpaid', 'active', 'RVsOMTS1uH', '1', 'starter', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_report`
--
ALTER TABLE `order_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_setting`
--
ALTER TABLE `store_setting`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_report`
--
ALTER TABLE `order_report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store_setting`
--
ALTER TABLE `store_setting`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
