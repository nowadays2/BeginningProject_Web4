-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2017 at 03:11 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Banbornam`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_user`
--

CREATE TABLE IF NOT EXISTS `category_user` (
  `id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_user`
--

INSERT INTO `category_user` (`id`, `type`) VALUES
('01', 'Admin'),
('02', 'Member'),
('03', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(6) NOT NULL,
  `product_id` text COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_qty` int(5) NOT NULL,
  `product_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_shop_id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `product_category_prodcut_id` int(3) NOT NULL,
  `order_orderNumber` int(6) NOT NULL,
  `order_user_id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `order_user_cateogory_user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_sinkra`
--

CREATE TABLE IF NOT EXISTS `order_sinkra` (
  `orderNumber` int(6) NOT NULL,
  `orderDate` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tracking` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(4) NOT NULL,
  `user_category_user_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `shipping` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `totalPrice` int(5) NOT NULL,
  `bank` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(4) NOT NULL,
  `shows` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `category_prduct_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `detail`, `price`, `shows`, `category_prduct_id`) VALUES
('1', 'ปลาเนื้ออ่อนฉู่ฉี่', 'ปลาเนื้ออ่อนสดๆ จากปากนาย ของจังหวัดน่าน นำไปทอดแล้วผัดด้วยเครื่องเทศของฉู่ฉี่ ..', 280, 'product_1.png', 1),
('2', 'ปลาทับทิมทอดกระเทียม', 'ปลาทับทิมตัวใหญ่ นำไปทอดกระเทียมพริกไทย นำไปทอดทั้งตัว โดยใช้ทุกส่วน เพื่อให้ลูกค้ารู้สึก คุ้มค่าและอร่อยไปทุกส่วน ..', 280, 'product_2.png', 1),
('3', 'ไก่ทอดมะแขว่น', 'ไก่ทอดส่วนปีกและน่องนำมาหมักกับสมุนไพรพื้นบ้านของจังหวัดน่าน นั้นก็คือ มะแขว่น พร้อมส่วนผสมต่างๆ ให้เข้ากันแล้วนำมา ..', 80, 'product_3.png', 1),
('4', 'เห็ดหอมผัดกุ้ง', 'เห็ดหอมสดๆ นำไปผัดกับกุ้งสด พร้อมทั้งปรุงรสด้วยเครื่องปรุง สูตรพิเศษของทางร้าน อร่อย สด ได้ประโยชน์', 100, 'product_4.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `provice` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` int(5) NOT NULL,
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_user_id` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_user`
--
ALTER TABLE `category_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
