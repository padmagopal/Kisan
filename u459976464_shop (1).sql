-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 05:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u459976464_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_cart`
--

CREATE TABLE `add_cart` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demand`
--

CREATE TABLE `demand` (
  `sid` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demand`
--

INSERT INTO `demand` (`sid`, `item_name`, `price`, `date`) VALUES
(1, 'potato', 12, '2019-05-25'),
(2, 'potato', 12, '2019-05-25'),
(3, 'tomato', 26, '2019-05-25'),
(4, 'onion', 10, '2019-05-25'),
(5, 'tomato', 26, '2019-05-25'),
(6, 'onion', 10, '2019-05-25'),
(7, 'banana', 56, '2019-05-27'),
(8, 'potato', 45, '2019-05-27'),
(9, 'banana', 56, '2019-05-27'),
(10, 'potato', 45, '2019-05-27'),
(11, 'banana', 23, '2019-05-29'),
(12, 'potato', 21, '2019-05-29'),
(13, 'banana', 23, '2019-05-29'),
(14, 'potato', 21, '2019-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `demand2`
--

CREATE TABLE `demand2` (
  `sno` int(11) NOT NULL,
  `Weather` int(11) NOT NULL,
  `date` date NOT NULL,
  `soil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demand2`
--

INSERT INTO `demand2` (`sno`, `Weather`, `date`, `soil`) VALUES
(1, 45, '2019-06-02', 33);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(30) NOT NULL,
  `company` varchar(255) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `product_id` int(20) NOT NULL,
  `hno` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `seller` varchar(250) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `date`, `time`, `company`, `user_id`, `product_id`, `hno`, `street`, `area`, `landmark`, `city`, `state`, `pincode`, `email`, `phone`, `quantity`, `total`, `seller`, `status`) VALUES
(179, '2020-05-27', '10:33:12 pm', '', '987878989@', 20, 'amity', 'amity', 'amity', 'amity', 'amity', 'amity', 'amity', 'kumar@gmail.com', '', 1, '100', 'farm@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_quant` int(50) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `Product type` varchar(50) NOT NULL,
  `seller` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `product_name`, `product_price`, `product_image`, `product_quant`, `product_category`, `Product type`, `seller`) VALUES
(20, 'rice', 100, 'royal-sona-masoori-raw-rice-500x500.jpg', 1, 'rice', '4', 'farm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hno` varchar(20) NOT NULL,
  `street` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_num` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `pan_name` varchar(255) NOT NULL,
  `pan_num` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `fname`, `lname`, `user_name`, `user_password`, `email`, `hno`, `street`, `area`, `landmark`, `city`, `state`, `pincode`, `mobile`, `account_name`, `account_num`, `bank_name`, `branch_name`, `ifsc`, `pan_name`, `pan_num`, `role`, `date`, `status`) VALUES
(1, '', 'xx', 'xx', 'admin', 'admin123', 'admin@gmail.com', 'xx', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', '', '', '', '', '', '', '', '', 'admin', '2019-06-01', 0),
(95, '987878989@', '', '', 'kumar', '123456789', 'kumar@gmail.com', '', '', '', '', '', '', '', '987878989', '', '', '', '', '', '', '', 'customer', '2020-05-27', 0),
(96, '98765777@', '', '', 'farmer', '123456789', 'farm@gmail.com', '', '', '', '', '', '', '', '98765777', '', '', '', '', '', '', '', 'Farmer', '2020-05-27', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_cart`
--
ALTER TABLE `add_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demand`
--
ALTER TABLE `demand`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `demand2`
--
ALTER TABLE `demand2`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_cart`
--
ALTER TABLE `add_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `demand`
--
ALTER TABLE `demand`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `demand2`
--
ALTER TABLE `demand2`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
