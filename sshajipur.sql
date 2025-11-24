-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 12:28 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sshajipur`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_no` bigint(12) NOT NULL,
  `email` varchar(35) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(35) NOT NULL,
  `state` varchar(35) NOT NULL,
  `dist` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `mobile_no`, `email`, `address`, `city`, `state`, `dist`, `password`) VALUES
(1, 'Ashish', 646, 'Ashish', 'jkhui', 'yuiy', 'MCA', '', 'a'),
(2, 'jkhui', 5456456, 'uityuitg', '', '', '', '', 'guguy'),
(3, 'jkhkjhjk', 25456465, 'jkgjhgjh', '', '', '', '', 'jgjh'),
(4, 'jkhkjhjk', 25456465, 'jkgjhgjh', '', '', '', '', 'jgjh'),
(5, 'ikhuiguy', 56465, 'tuytuy', '', '', '', '', '123'),
(6, 'ikhuiguy', 56465, 'tuytuy', '', '', '', '', '123');

-- --------------------------------------------------------

--
-- Table structure for table `manage_collection`
--

CREATE TABLE `manage_collection` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manage_customer`
--

CREATE TABLE `manage_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile_no` bigint(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_customer`
--

INSERT INTO `manage_customer` (`id`, `name`, `mobile_no`, `email`, `address`, `city`, `state`, `password`) VALUES
(1, 'Ashsih', 1234, 'ak@gm', 'l', 'u', 'MCA', '1'),
(2, 'Rav', 7654, 'Ak@jj', '', '', '', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `manage_distributer`
--

CREATE TABLE `manage_distributer` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `mobile_no` bigint(12) NOT NULL,
  `email` varchar(80) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_category_id` int(11) NOT NULL,
  `membership_id` varchar(10) NOT NULL,
  `product_limit` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_distributer`
--

INSERT INTO `manage_distributer` (`id`, `name`, `mobile_no`, `email`, `address`, `city`, `state`, `password`, `shop_name`, `shop_category_id`, `membership_id`, `product_limit`, `created_at`) VALUES
(30, 'Sudhanshu Shekhar', 620, 's@gm', '', '', '', '620', 'STS', 3, '2', 50, '2022-10-07 15:34:13'),
(31, 'Testin', 432423423, 's@gmail', '', '', '', '222', 'dsfds', 1, '3', 100, '2022-10-07 15:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `manage_product`
--

CREATE TABLE `manage_product` (
  `id` int(11) NOT NULL,
  `distributer_id` int(11) NOT NULL,
  `shop_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `discription` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_product`
--

INSERT INTO `manage_product` (`id`, `distributer_id`, `shop_category_id`, `name`, `price`, `image`, `discription`, `date_time`) VALUES
(42, 30, 3, 'product 1', 2999, 'Desert.jpg', 'This is dsfdsa', '2022-10-05 21:55:19'),
(43, 30, 3, 'Shop Tm', 20, 'Penguins.jpg', 'this is jthis ith kejh kke kshhrh', '2022-10-05 21:55:45'),
(44, 30, 3, 'Sampoo', 2000, 'Penguins.jpg', 'THIS JIS FSDfsdfsdfsdf', '2022-10-05 21:56:11'),
(45, 30, 3, 'IR Rademi', 12000, 'Koala.jpg', 'this is  tradimi phone aned it ia pne', '2022-10-05 21:56:48'),
(46, 30, 3, 'Xomie Re22 Pro', 33000, 'Tulips.jpg', 'thi shi sj xomone th shthia sjin slek oife', '2022-10-05 21:57:29'),
(47, 30, 3, 'Top IRTG', 2999, 'Hydrangeas.jpg', 'hti ajaksdf kl kjasdfkj k jsdakfjl asdf', '2022-10-05 21:57:53'),
(48, 30, 3, 'VIrtual Box', 29999, 'Lighthouse.jpg', 'this i sifsf jf klj flksfj lkfjlsad', '2022-10-05 21:58:25'),
(49, 30, 3, 'X-Box 3356RT', 3992, 'Penguins.jpg', 'adsjfkje kj hefhedf', '2022-10-05 21:58:46'),
(50, 30, 3, 'IPL_Tshirt', 300, 'Chrysanthemum.jpg', 'tijlkdsf lkdsfa ', '2022-10-05 21:59:07'),
(51, 30, 3, 'TLT', 2228, 'Jellyfish.jpg', 'dsfkjdskfh kjdsaf h', '2022-10-05 21:59:23'),
(52, 30, 3, 'Baby Shop', 34, 'Desert.jpg', 'dsafkjhd fkjdh fkjsda fkjsdf', '2022-10-05 22:00:05'),
(53, 30, 3, 'Cake TED', 33332, 'Koala.jpg', 'DSFAHKJH H DKFJAS', '2022-10-05 22:00:21'),
(54, 30, 3, 'I Call mobile', 3565, 'Hydrangeas.jpg', 'sdfsdafsdf', '2022-10-05 22:00:44'),
(55, 30, 3, 'Tsting_cat', 34999, 'Chrysanthemum.jpg', 'Thi sf asfj jflasdf', '2022-10-05 22:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membership_id` int(11) NOT NULL,
  `membership_name` varchar(100) NOT NULL,
  `product_limit` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membership_id`, `membership_name`, `product_limit`, `price`, `status`) VALUES
(1, 'Platinam', 20, 999, 1),
(2, 'Silver', 50, 2000, 1),
(3, 'gold', 100, 3000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE `shop_category` (
  `shop_category_id` int(11) NOT NULL,
  `category_name` varchar(70) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`shop_category_id`, `category_name`, `image`, `date_time`) VALUES
(1, 'mechanical', '', '2022-09-30 23:30:54'),
(2, 'electrical', '', '2022-09-30 23:31:10'),
(3, 'Techicanl', '', '2022-10-01 17:15:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_collection`
--
ALTER TABLE `manage_collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_customer`
--
ALTER TABLE `manage_customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `manage_distributer`
--
ALTER TABLE `manage_distributer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `manage_product`
--
ALTER TABLE `manage_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membership_id`);

--
-- Indexes for table `shop_category`
--
ALTER TABLE `shop_category`
  ADD PRIMARY KEY (`shop_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manage_collection`
--
ALTER TABLE `manage_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_customer`
--
ALTER TABLE `manage_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manage_distributer`
--
ALTER TABLE `manage_distributer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `manage_product`
--
ALTER TABLE `manage_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop_category`
--
ALTER TABLE `shop_category`
  MODIFY `shop_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
