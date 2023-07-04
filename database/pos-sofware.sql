-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2018 at 04:08 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos-sofware`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `category_name`) VALUES
(1, 'Other'),
(2, 'Sof Drinks'),
(3, 'Rice');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` bigint(30) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `qty_left` int(11) NOT NULL,
  `price` double NOT NULL,
  `sprice` double NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `cat_id`, `unit`, `image`, `product_name`, `qty_left`, `price`, `sprice`, `status`) VALUES
(17, 2, 'pc', '0f72b48b12098f24a0afe969a12da594.jpg', 'Coke Zero Can', 0, 22, 21, 1),
(18, 2, 'pc', '8484871e7f1d37d5eb84918ceb1de8f7.jpg', 'Coke Zero Can', 10, 35, 30, 1),
(19, 1, 'pc', '5a8c5300f3d433edb26144fc4b206dc1.jpg', 'Coke Can', 0, 35, 34, 1),
(20, 1, 'pc', '', 'test', 0, 12, 2, 1),
(21, 1, 'm', '', 'test', 1, 100, 12, 1),
(22, 1, 'pc', 'abc8063633b003079c51f96f703f1c1c.jpg', '12312', 0, 21, 1, 1),
(23, 1, 'pc', '', '324', 1, 1, 1, 1),
(24, 1, 'kl', 'c1d3ab4c920943a5aab708c1838e39ee.jpg', '12121', 1, 1, 1, 1),
(25, 1, 'pc', '6f621f465cbe33c5ede297790895383f.jpg', '2', 2, 2, 32, 1),
(26, 1, 'pc', '', '423', 234, 423, 422, 1),
(27, 1, 'pc', '', '423', 423, 423, 423, 1),
(28, 1, 'pc', '', 'rwe', 123, 123, 123, 1),
(29, 1, 'pc', '', '234', 423, 423, 423, 1),
(30, 1, 'pc', '', 'rwe', 0, 3, 3, 1),
(31, 1, 'pc', '', '3', 3, 3, 3, 1),
(32, 1, 'pc', '', '423', 234, 234, 234, 1),
(33, 1, 'pc', '', '4234 2343  234234', 3, 3, 3, 1),
(34, 1, 'pc', '', '23432', 2, 2, 2, 1),
(35, 1, 'pc', '0b6fdf354901801369805ba8012b6e7b.jpg', '22', 0, 0, 2, 1),
(36, 1, 'pc', '', '11', 1, 1, 1, 1),
(37, 1, 'pc', '', '11', 1, 1, 1, 1),
(38, 1, 'pc', '', '11', 1, 1, 1, 1),
(39, 1, 'pc', '', '2', 2, 2, 0, 1),
(40, 1, 'pc', '', '2', 2, 2, 2, 1),
(41, 1, 'pc', '', '4234 2343  234234', 23, 432, 423, 1),
(42, 1, 'pc', '', '4234 2343  2342344', 4, 44, 44, 1),
(43, 1, 'pc', '', '43', 4, 4, 4, 1),
(44, 1, 'pc', '013022d2e31ee72737e3180e95bcb617.jpg', 'eqw', 1, 1, 211, 1),
(45, 1, 'pc', '', 'eqw', 3, 3, 123, 1),
(46, 1, 'pc', '', '312', 123, 123, 312, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_full_name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_full_name`, `status`, `username`, `password`, `user_type`) VALUES
(1, 'Admin', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
