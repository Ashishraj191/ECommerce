-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2022 at 05:30 PM
-- Server version: 10.5.17-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u123064143_uchhalAds`
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
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `mobile_no`, `email`, `password`) VALUES
(7, 'Admin', 8873149623, 'sksadmin@uchhalads.in', '123456');

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
  `password` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_customer`
--

INSERT INTO `manage_customer` (`id`, `name`, `mobile_no`, `email`, `address`, `city`, `state`, `password`, `token`, `created_at`) VALUES
(8, 'sanjeevan singh', 9958759366, 'sanjeevansingh123@rediffmail.c', '', '', '', 'Aryan@123', '', '2022-10-23 10:48:20'),
(13, 'Santosh Singh', 6202254450, 'stseducationindia@gmail.com', 'Hajipur, Vaishali', 'Hajipur', 'Bihar', '81dc9bdb52d04dc20036dbd8313ed055', '', '2022-10-23 10:48:20'),
(16, 'Rahul Kumar', 7348252120, 'Ak47.lko73@gmail.com', '', '', '', 'Khiladi@123', '', '2022-10-29 07:30:04'),
(18, 'shivam jha', 9717440232, 'shivamjha2204@gmail.com', '', '', '', 'Myself@10', '', '2022-10-29 15:55:18'),
(23, 'ss', 7363737283728, 'speedtosucces.india@gmail.com', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '47ed7c4cd93040e2af88dadb64b08d', '2022-11-06 13:51:19'),
(26, 'Demo ', 9234066486, 'user@gmail.com', '', '', '', '3ae7656be907a72d65648aeb4b9e4ce0', '', '2022-11-19 10:05:51');

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
  `token` varchar(50) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_category_id` int(11) NOT NULL,
  `membership_id` varchar(10) NOT NULL,
  `product_limit` int(11) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `date_of_activate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_distributer`
--

INSERT INTO `manage_distributer` (`id`, `name`, `mobile_no`, `email`, `address`, `city`, `state`, `password`, `token`, `shop_name`, `shop_category_id`, `membership_id`, `product_limit`, `payment_status`, `payment_amount`, `created_at`, `date_of_activate`) VALUES
(34, 'Sarvesh Mishra ', 8273670360, 'ndjsj@gmail.com', 'Uttar Pradesh ', 'Ghiejke', 'Dadar and Nagar Haveli', '202cb962ac59075b964b07152d234b70', '', 'Mishra and co', 1, '1', 20, 'success', 999, '2022-10-08 17:07:08', '0000-00-00'),
(36, 'Amit Kumar', 9661555306, '843413amitkumar1998@gmail.com', 'dd', 'ss', 'Arunachal Pradesh', '202cb962ac59075b964b07152d234b70', '', 'Megasoft', 3, '1', 5, '', 0, '2022-10-18 14:55:27', '0000-00-00'),
(37, 'Jyoti singh', 9958759366, 'sanjeevansingh123@rediffmail.com', '1883/16 top  floor Govind puri ext', 'South Delhi', '', '323df', '', 'Hat Bazar ', 3, '2', 50, 'success', 1, '2022-10-19 02:51:09', '0000-00-00'),
(46, 'Rahul kumar', 7348252120, 'ak47.lko73@gmail.com', 'Para devp', 'Lucknow', 'Uttar Pradesh', '1298815fd9e0a06860203eefd188c354', '', 'Studio photo', 2, '1', 5, 'success', 1, '2022-10-29 07:46:26', '2022-10-29'),
(51, 'Ashish Jaiswal', 8381941186, 'ashujais1186@gmail.com', 'Devour mod Rajaji puram Lucknow near para old chauki 226017', 'Lucknow', 'Uttar Pradesh', '3d2262ed66ab460c107a74e7c9a326aa', '', 'Shubh Fashion ', 2, '1', 5, 'success', 100, '2022-11-02 10:19:52', '2022-11-02'),
(52, 'Aditya', 9919391625, 'anveshastudio@gmail.com', 'Behind Old ParaThana, Hardoi Ring Road Para Lucknow 226017', 'Lucknow', 'Uttar Pradesh', '687dc37171ea06cea452324f25f5ab4d', '', 'Anvesha Photo Studio', 2, '1', 5, 'success', 100, '2022-11-03 08:25:47', '2022-11-03'),
(53, 'Vikash Kumar', 9807945702, 'vkanojia702@gmail.com', 'Behind old para chauki 226011', 'Lucknow ', 'Uttar Pradesh', '956192bd978f0f9ed83f2e2593ae82d4', '', 'The Secure Pathology center', 4, '1', 5, 'success', 100, '2022-11-03 12:19:35', '2022-11-03'),
(54, 'Anand Agarwal', 9264992688, 'anandtayal1974@gmail.com', 'Bajrang vihaar, mohan road, buddeswar chauraha 226017', 'Lucknow', 'Uttar Pradesh', 'e78c7dd01cadb78585c7f17b98669f8f', '', 'Dev cycles', 5, '1', 5, 'success', 100, '2022-11-04 10:20:06', '2022-11-04'),
(55, 'Vinay soni Soni', 8787061976, 'vinaysoni0122@gmail.com', 'Para rajajipuram 226017', 'Lucknow', 'Uttar Pradesh', '9e4e1b3cc6325594c89fd72271688edd', '', 'S s jewellers ', 14, '1', 5, 'success', 100, '2022-11-04 12:11:00', '2022-11-04'),
(56, 'Vinay soni Soni', 8787061977, 'stseducationindia@gmail.com', 'Para rajajipuram 226017', 'Lucknow', 'Uttar Pradesh', '9e4e1b3cc6325594c89fd72271688edd', '416bd70710bf06ad6178f8a11150f9', 'S s jewellers ', 14, '1', 5, 'success', 100, '2022-11-04 12:11:00', '2022-11-04'),
(57, 'Sanjay Singh', 9811805651, 'sanjay071979@gmail.com', 'Shop no-24, Central Mini Market,DDA Flats, kalkaji', 'New Delhi', 'Delhi', 'db7a0e34f6404d4a07553ba4063106a9', '', 'Fcs international', 15, '1', 5, 'success', 100, '2022-11-08 14:11:39', '2022-11-08'),
(58, 'Demo', 9234066486, 'seller@gmail.com', '', '', '', '3ae7656be907a72d65648aeb4b9e4ce0', '', 'Testng Shop', 6, '2', 25, '', 0, '2022-11-19 10:00:33', '0000-00-00');

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
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_product`
--

INSERT INTO `manage_product` (`id`, `distributer_id`, `shop_category_id`, `name`, `price`, `image`, `discription`, `date_time`) VALUES
(64, 46, 2, 'Photo with Frame', 250, 'WhatsApp Image 2022-10-29 at 9.57.23 AM.jpeg', 'Designed with every occasion and style in mind, Futures photo frames and borders will add the perfect touch to your pics.\r\n', '2022-10-30 05:18:04'),
(65, 51, 2, 'DAYZ FOOTWEAR (Lady shoes)', 379, 'WhatsApp Image 2022-11-02 at 4.35.47 PM.jpeg', 'DAYZ FOOTWEAR (Lady shoes)\r\nPrice ..379\r\nDiscount : 20%\r\n', '2022-11-02 11:39:43'),
(66, 51, 2, 'Lancer Footwear  (MAN) Color black', 1299, 'WhatsApp Image 2022-11-02 at 4.38.53 PM.jpeg', 'Lancer Footwear  (MAN)\r\nPrice ..1299\r\nDiscount : 20%\r\nColor black', '2022-11-02 12:46:23'),
(67, 51, 2, 'Lancer Footwear  (MAN) Color white ', 1299, 'WhatsApp Image 2022-11-02 at 4.38.12 PM.jpeg', 'Lancer Footwear (MAN) \r\nPrice ..1299 \r\nDiscount : 20% \r\nColor white ', '2022-11-02 12:49:29'),
(68, 51, 2, 'Lancer Footwear  (MAN) ', 1299, 'WhatsApp Image 2022-11-02 at 4.38.40 PM.jpeg', 'Lancer Footwear (MAN) \r\nPrice ..1299 \r\nDiscount : 20% \r\nColor ', '2022-11-02 12:50:10'),
(69, 51, 2, 'Lancer Footwear (MAN) Color Black ', 1499, 'WhatsApp Image 2022-11-02 at 4.37.49 PM.jpeg', 'Lancer Footwear (MAN) \r\nPrice ..1499\r\nDiscount : 20% \r\nColor Black ', '2022-11-02 12:51:25'),
(70, 46, 2, 'Photo Frem with photo & light sistem', 900, '1667465186021659406787447489875.jpg', 'Studio visit\r\nLed frem photo with lighting ', '2022-11-03 08:49:07'),
(71, 46, 2, 'Photo Frem with photo & light sistem', 900, '1667465186021659406787447489875.jpg', 'Studio visit\r\nLed frem photo with lighting ', '2022-11-03 08:49:15'),
(72, 52, 2, 'Wedding Photography', 450, '71 copy.jpg', 'Photography\r\n videography \r\nCandid Photography\r\nCinematic Video \r\nAll Type photography\r\nAnvesha Studio \r\nContact No 9919391625 8354951795 ', '2022-11-03 09:18:13'),
(73, 53, 4, 'CBC Complete blood  count ', 400, '20220706_182251.jpg', '10% ', '2022-11-03 14:08:59'),
(74, 53, 4, 'The Secure Diagnostic center', 1200, 'IMG_20221103_205329.jpg', 'Dengue \r\nDiscount 10%', '2022-11-03 17:31:16'),
(75, 53, 4, 'The Secure Diagnostic center', 450, 'IMG-20221103-WA0030.jpg', 'L.F.T  Test Price 500\r\nDiscount 10%', '2022-11-03 17:48:38'),
(76, 53, 4, 'Kidney function test (KFT )', 600, 'Screenshot_20220516-212901_Facebook.jpg', '10% Discount ', '2022-11-04 04:31:31'),
(77, 54, 5, 'Cycles', 4000, '16675577806286971206463245909230.jpg', 'Dev cycles\r\n400 to 10000 \r\nExchange offer available', '2022-11-04 10:30:14'),
(78, 54, 5, 'Moter cycle and activa service center', 199, '16675579797698099617894555504038.jpg', 'Service Moter cycle and activa \r\n', '2022-11-04 10:33:29'),
(79, 54, 5, 'Dev Cycle ', 400, '16675582400486328711033140326604.jpg', 'All type cycle Available\r\nMinimum and maximum price with service ', '2022-11-04 10:38:20'),
(80, 54, 5, 'Cycle', 10000, '16675583460811248692653075194496.jpg', 'All type cycle \r\nMinimum Price 4000 to Maximum Price 10000', '2022-11-04 10:41:35'),
(81, 54, 5, 'Cycle', 2300, '16675585653806093339443295405618.jpg', ' Children Cycle\r\n1year to 2 year \r\nDiscount 10%\r\n', '2022-11-04 10:45:42'),
(82, 55, 14, 'Silver anklate ', 3000, '16675640519208093616855289524330.jpg', 'Discount 5 %', '2022-11-04 12:16:11'),
(83, 52, 2, 'All Type Photography', 0, '1.jpg', 'photography \r\nvideography 4k\r\ncinematic video\r\ncandid photography \r\netc\r\n	 Anvesha Studio Behind Old Para Thana, Para, Rajajipuram, Contact No 9919391625/ 8354951795', '2022-11-07 14:33:07'),
(84, 53, 4, 'CBC Test', 400, 'IMG-20221107-WA0016.jpg', 'CBC \r\nDiscount 10%', '2022-11-08 08:53:33'),
(85, 57, 15, 'Cargo & courier service ', 0, '20221108_200644.jpg', 'Mobile :-9958011356\r\nFCS International Courier And Cargo Services Are The Best Leading Same Day Courier Service Provider In New Delhi. We Have The Best Deals Considering Trackon, Delhivery, DHL, TNT, Aramex, Blue Dart For Worldwide Shipping. Our Specialties I.E., 24×7 Working Hours, Doorstep Pickup And Same Day Courier Service Delivery, Hassle-Free Transportation, Personalized Customer Support And More, Make Us A Unique Express Delivery Service Provider In Delhi/NCR. Best Same Day Courier Service E-Commerce Shipping Solutions. Fcsinternational.in', '2022-11-08 14:48:15');

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
(1, 'Platinam', 5, 100, 1),
(2, 'Silver', 25, 500, 1),
(3, 'gold', 100, 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `distributer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `distributer_id`, `name`, `email`, `mobile`, `amount`, `payment_status`, `payment_id`, `date_time`) VALUES
(15, 30, 'Sudhanshu Shekhar', 's@gm', '620', 1, 'success', 'pay_KVT4ev06SRheY0', '2022-10-19 02:38:31'),
(16, 37, 'Jyoti singh', 'sanjeevansingh123@rediffmail.com', '99587', 1, 'success', 'pay_KVTKGQ82El9PvP', '2022-10-19 02:52:56'),
(17, 40, 'Anju Devi', 'flp@gmail.com', '9188737080', 1, 'success', 'pay_KW06RclyfAFe2A', '2022-10-20 10:56:58'),
(18, 34, 'Sarvesh Mishra ', 'ndjsj@gmail.com', '8273670360', 999, 'success', 'pay_KYRNnGMHfGzdwt', '2022-10-26 14:55:58'),
(19, 45, 'STS', '000sudhanshushekhar@gmail.com', '6202254455', 1, 'success', 'pay_KZ9woc6KN1bcvU', '2022-10-28 10:31:13'),
(20, 46, 'Rahul kumar', 'ak47.lko73@gmail.com', '7348252120', 1, 'success', 'pay_KZYEBMZgYX7kY3', '2022-10-29 10:17:08'),
(21, 51, 'Ashish Jaiswal', 'ashujais1186@gmail.com', '8381941186', 100, 'success', 'pay_Kb92IGY5ilKyUk', '2022-11-02 10:56:16'),
(22, 52, 'Aditya', 'anveshastudio@gmail.com', '9919391625', 100, 'success', 'pay_KbVaZSQxB7btEP', '2022-11-03 08:59:38'),
(23, 53, 'Vikash Kumar', 'vkanojia702@gmail.com', '9807945702', 100, 'success', 'pay_KbZU1v6L9kXrnF', '2022-11-03 12:48:23'),
(24, 54, 'Anand Agarwal', 'anandtayal1974@gmail.com', '9264992688', 100, 'success', 'pay_KbvWfQCkq8oEZ3', '2022-11-04 10:22:28'),
(25, 55, 'Vinay soni Soni', 'vinaysoni0122@gmail.com', '8787061976', 100, 'success', 'pay_KbxOoGHAT086LE', '2022-11-04 12:12:08'),
(26, 57, 'Sanjay Singh', 'sanjay071979@gmail.com', '9811805651', 100, 'success', 'pay_KdZgbtXjsIx0RN', '2022-11-08 14:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_enquiry`
--

CREATE TABLE `product_enquiry` (
  `product_enquiry_id` int(11) NOT NULL,
  `requested_by_customer_id` int(11) NOT NULL,
  `requested_by_distributer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `distributer_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_enquiry`
--

INSERT INTO `product_enquiry` (`product_enquiry_id`, `requested_by_customer_id`, `requested_by_distributer_id`, `product_id`, `distributer_id`, `date_time`) VALUES
(5, 1, 0, 59, 34, '2022-10-12 14:41:50'),
(6, 1, 0, 45, 30, '2022-10-12 14:43:20'),
(7, 1, 0, 45, 30, '2022-10-12 14:43:23'),
(8, 0, 30, 45, 30, '2022-10-17 03:51:14'),
(9, 0, 40, 63, 40, '2022-10-20 10:58:54'),
(10, 15, 0, 59, 34, '2022-10-26 17:12:10'),
(11, 15, 0, 62, 37, '2022-10-26 17:12:52'),
(12, 0, 48, 64, 46, '2022-11-01 09:45:51'),
(13, 0, 48, 64, 46, '2022-11-01 09:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE `shop_category` (
  `shop_category_id` int(11) NOT NULL,
  `category_name` varchar(70) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`shop_category_id`, `category_name`, `image`, `date_time`) VALUES
(1, 'Agriculture', 'Agriculture.png', '2022-09-30 23:30:54'),
(2, 'Apparel & Fashion', 'ApparelandFashion.png', '2022-09-30 23:31:10'),
(3, 'Chemical', 'chemical.png', '2022-10-01 17:15:22'),
(4, 'Medicine', 'medicine.png', '2022-10-01 17:15:22'),
(5, 'Automobile', 'automobile.png', '2022-10-01 17:15:22'),
(6, 'Techinical ', 'techinical.png', '2022-10-28 09:43:42'),
(7, 'Iron & Hardware', 'iron.jpg', '2022-10-28 09:44:58'),
(8, 'Food & Beverages', 'food.png', '2022-10-28 09:44:58'),
(9, 'Beauty & Fashion', 'beauty.png', '2022-10-28 09:45:20'),
(10, 'Electrical & Electronic', 'electrical.png', '2022-10-28 09:46:23'),
(11, 'Fire & Sefty', 'fireandsefty.png', '2022-10-28 09:46:43'),
(12, 'Grocery', 'grocery.png', '2022-10-31 13:46:38'),
(13, 'Book & Toy', 'bookandtoy.png', '2022-10-31 13:46:38'),
(14, 'Jewellery and Gold', 'jewelleryandgold.jpg', '2022-10-31 13:47:06'),
(15, 'Service', 'service.jpg', '2022-11-02 15:19:13'),
(16, 'Tour and Travels', 'tourandtravel.png', '2022-11-02 15:19:38'),
(17, 'Pest Control', 'pestcontrol.jpg', '2022-11-02 15:22:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`),
  ADD UNIQUE KEY `email` (`email`);

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
  ADD PRIMARY KEY (`product_enquiry_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manage_collection`
--
ALTER TABLE `manage_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_customer`
--
ALTER TABLE `manage_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `manage_distributer`
--
ALTER TABLE `manage_distributer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `manage_product`
--
ALTER TABLE `manage_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_enquiry`
--
ALTER TABLE `product_enquiry`
  MODIFY `product_enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shop_category`
--
ALTER TABLE `shop_category`
  MODIFY `shop_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
