-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 07:56 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `bid` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`bid`, `brand_name`, `status`) VALUES
(1, 'samsung', '1'),
(5, 'xaomi', '1'),
(8, 'Nissan', '1'),
(10, 'Huawei', '1'),
(19, 'DASSAULT', '1'),
(20, 'HONDA', '1'),
(22, 'Fighter Jets', '1'),
(25, 'Euro Fighter', '1'),
(26, 'Suzuki', '1'),
(27, 'MI', '1'),
(28, 'BlackBerry', '1'),
(29, 'RFL', '1');

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `cid` int(11) NOT NULL,
  `parent_cat` int(11) NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`cid`, `parent_cat`, `catagory_name`, `status`) VALUES
(1, 0, 'Electronics', '1'),
(5, 1, 'Phone', '1'),
(6, 5, 'Apple', '1'),
(14, 0, 'Plane', '1'),
(19, 0, 'Bike', '1'),
(20, 1, 'Miter', '1'),
(21, 0, 'Plastic', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `Revenue%` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL,
  `total_profit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `Phone`, `order_date`, `sub_total`, `Revenue%`, `net_total`, `paid`, `due`, `payment_type`, `total_profit`) VALUES
(53, 'Nishad', '', '2019-11-28', 350000, 2, 357000, 357000, 0, 'Cash', 7000),
(54, 'check_profit', '', '2019-11-29', 52000, 2, 53040, 53040, 0, 'Cash', 1040),
(55, 'test t profit', '', '2019-11-29', 3150000, 0, 3150000, 3150000, 0, 'Cash', 0),
(56, 'Alvi2', '', '2019-11-29', 35000, 0, 35000, 35000, 0, 'Cash', 0),
(57, 'Nishad', '', '2019-11-29', 34000, 2, 34680, 34680, 0, 'Cash', 680),
(59, 'check', '', '2019-12-01', 350000, 0, 350000, 350000, 0, 'Cash', 0),
(60, 'check', '', '2019-12-01', 350000, 0, 350000, 35000, 315000, 'Cash', 0),
(63, 'check_print', '', '2019-12-01', 17000, 2, 17340, 17340, 0, 'Cash', 340),
(64, 'check_print', '', '2019-12-01', 350000, 1, 353500, 352500, 1000, 'Cash', 3500),
(65, 'final_print', '', '2019-12-01', 350000, 2, 357000, 350000, 7000, 'Cash', 7000),
(66, 'check_print_10', '', '2019-12-01', 350000, 2, 357000, 357000, 0, 'Cash', 7000),
(67, 'Abir', '', '2019-12-01', 17000, 0, 17000, 17000, 0, 'Cash', 0),
(68, 'Faruque', '', '2019-12-02', 35000, 1.5, 35525, 35525, 0, 'Cash', 525),
(69, 'Abir2', '', '2019-12-02', 385000, 1, 388850, 388850, 0, 'Cash', 3850),
(70, 'Kawsar', '', '2019-12-02', 17000, 2, 17340, 17340, 0, 'Cash', 340),
(72, 'Nishad', '01728897264', '2019-12-02', 17000, 3, 17510, 17510, 0, 'Cash', 510),
(73, 'check_number', '01728897264', '2019-12-02', 17000, 3, 17510, 17510, 0, 'Cash', 510),
(74, 'AKib', '01728897255', '2019-12-02', 350000, 2, 357000, 357000, 0, 'Cash', 7000),
(75, 'gt', '01728845454', '2019-12-02', 34000, 1.5, 34510, 34510, 0, 'Cash', 510),
(84, 'check33', '01728845454', '2019-12-02', 17000, 0, 17000, 19550, -2550, 'Cash', 0),
(85, 'kamal', '01728845454', '2019-12-03', 700000, 1.5, 710500, 710500, 0, 'Bkash', 10500),
(86, 'Alvi ', '01728845454', '2019-12-04', 350000, 2, 357000, 357000, 0, 'Cash', 7000),
(87, 'Abir', '01876588', '2019-12-04', 1050000, 1.7, 1067850, 1050000, 17850, 'Cash', 17850),
(88, 'Bohemain', '01728845454', '2019-12-15', 17000, 2, 17340, 17340, 0, 'Card', 340);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `price`, `qty`) VALUES
(1, 53, 'Typhoon', 350000, 1),
(2, 54, 'Note Pro', 17000, 1),
(3, 54, 'Rafale', 35000, 1),
(4, 55, 'Samsung Galaxy 10', 350000, 9),
(5, 56, 'Rafale', 35000, 1),
(6, 57, 'Note Pro', 17000, 1),
(7, 57, 'Note Pro', 17000, 1),
(8, 59, 'Samsung Galaxy 10', 350000, 1),
(9, 63, 'Note Pro', 17000, 1),
(10, 64, 'Typhoon', 350000, 1),
(11, 65, 'Samsung Galaxy 10', 350000, 1),
(12, 66, 'Samsung Galaxy 10', 350000, 1),
(13, 67, 'Note Pro', 17000, 1),
(14, 68, 'Gixer', 35000, 1),
(15, 69, 'Gixer', 35000, 1),
(16, 69, 'Samsung Galaxy 10', 350000, 1),
(17, 70, 'GT-500', 17000, 1),
(19, 72, 'GT-500', 17000, 1),
(20, 73, 'GT-500', 17000, 1),
(21, 74, 'F-16', 350000, 1),
(22, 75, 'GT-500', 17000, 1),
(23, 75, 'GT-500', 17000, 1),
(24, 84, 'GT-500', 17000, 1),
(25, 85, 'Samsung Galaxy 10', 350000, 2),
(26, 86, 'Samsung Galaxy 10', 350000, 1),
(27, 87, 'Samsung Galaxy 10', 350000, 3),
(28, 88, 'GT-500', 17000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `p_status` enum('1','0') DEFAULT NULL,
  `stock_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`, `stock_price`) VALUES
(2, 14, 25, 'Typhoon', 350000, 1, '2019-12-04', '1', 0),
(3, 5, 5, 'Note Pro', 17000, 0, '2019-12-03', '1', 0),
(4, 5, 1, 'Samsung Galaxy 10', 350000, 1, '2019-12-01', '1', 0),
(5, 14, 19, 'Rafale', 35000, 8, '2019-11-28', '1', 0),
(7, 5, 1, 'GT-500', 17000, 993, '2019-11-29', '1', 0),
(8, 19, 26, 'Gixer', 35000, 3, '2019-12-02', '1', 0),
(9, 14, 8, 'F-16', 350000, 4, '2019-12-02', '1', 0),
(10, 21, 29, 'Chair', 800, 10, '2019-12-02', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `usertype` enum('Admin','Other') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES
(8, 'Kh Nishad', 'kkhnishad@gmail.com', '$2y$08$eE.lphrTj1FyiKbQvzkUsOEmYLQna7a60eIQ1DlQISEAqlDMdY/US', 'Admin', '2019-10-26', '2019-12-15 06:12:02', ''),
(21, 'faruque', 'faruque@gmail.com', '$2y$08$tKwaNJWGOV1ltyPUvJCibO/Li/iNRr2aJEYwe8UYuniZzfVCtDISW', 'Admin', '2019-12-02', '2019-12-02 08:12:28', ''),
(34, 'Abdus Sattar', 'abdsattar@gmail.com', '$2y$08$Zt4u6rWdeWEfnW8uJALSLeQa531KrkM6/FW87OtRmujatSYMsvPwy', 'Admin', '2019-12-03', '2019-12-03 00:00:00', ''),
(39, 'toma', 'momtarintoma@gmail.com', '$2y$08$6LfAQk5r/tKMWxXContHZ.BnCqMUh0vIjUx.CcKXX6P/uTKioPPia', 'Admin', '2019-12-03', '2019-12-03 11:12:43', ''),
(45, 'toma', 'toma@gmail.com', '$2y$08$OvXbkMhi0jgfKq2QFlTrHeLJPkzbc09.wFlhWli/AvSeRGMlK6NRq', 'Admin', '2019-12-03', '2019-12-03 06:12:22', ''),
(46, 'Adnan', 'adnan@gmail.com', '$2y$08$6sIcpmh7AbvPwsMPorRTo.JEURDqsa1iXcIyik20lh7SYNRuEpnfS', 'Admin', '2019-12-04', '2019-12-04 00:00:00', ''),
(47, 'toma', 'toma1@gmail.com', '$2y$08$3kvfJ2Dl.s7pi4rfLOtUD.1fsPu78m.vt1g6f1mZ6q52cFpQO81/O', 'Admin', '2019-12-04', '2019-12-04 06:12:19', ''),
(48, 'mumu', 'mumu@gmail.com', '$2y$08$6uhFXFrUDDLuNOAUR6qud.m8d1qxCVobsltg/tGs8O/Cgk4XYoUwO', 'Admin', '2019-12-04', '2019-12-04 09:12:45', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `catagory_name` (`catagory_name`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `cid` (`cid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `catagories` (`cid`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `brands` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
