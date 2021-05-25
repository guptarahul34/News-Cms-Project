-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 01:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_img` varchar(200) NOT NULL,
  `p_size` varchar(10) NOT NULL,
  `p_qty` int(10) NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `p_id`, `p_name`, `p_img`, `p_size`, `p_qty`, `subtotal`) VALUES
(1, 11, 'orange', 'o.jpg', '70', 1, 70),
(2, 10, 'Carrot', 'caro.jpg', '40', 1, 40),
(3, 4, 'onion', 'on.jpg', '40', 5, 200),
(4, 7, 'Gourd', 'Gor.jpg', 'kg', 1, 45);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(10) NOT NULL,
  `product_name` varchar(30) NOT NULL DEFAULT 'unique',
  `p_price` int(20) NOT NULL,
  `p_size` varchar(10) NOT NULL,
  `p_img` varchar(10000) NOT NULL,
  `p_details` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `product_name`, `p_price`, `p_size`, `p_img`, `p_details`, `quantity`) VALUES
(4, 'onion', 40, 'kg', 'on.jpg', 'An onion is a round vegetable with a brown skin that grows underground', 12),
(5, 'Broccoli', 30, 'kg', 'bo.jpg', 'Broccoli, Brassica oleracea, is an herbaceous annual or biennial grown for its edible flower heads w', 10),
(6, 'Broccoli', 30, 'kg', 'bo.jpg', 'Broccoli, Brassica oleracea, is an herbaceous annual or biennial grown for its edible flower heads w', 10),
(7, 'Gourd', 45, 'kg', 'Gor.jpg', 'A gourd is a squash-like plant with a hard, colorful skin', 12),
(8, 'Spinach', 120, 'kg', 'spa.jpg', 'Spinach, Spinacia oleracea, is a leafy herbaceous annual plant in the family Amaranthaceae grown for', 10),
(9, 'Peas', 40, 'kg', 'pe.jpg', 'PEAS stands for Performance measure, Environment, Actuator, Sensor', 10),
(10, 'Carrot', 40, 'kg', 'caro.jpg', 'Carrot, (Daucus carota), herbaceous, generally biennial plant of the Apiaceae family that produces a', 10),
(11, 'orange', 70, 'kg', 'o.jpg', 'An orange is a type of citrus fruit that people often eat. Oranges are a very good source of vitamin', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `s_no` int(10) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT 'unique',
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`s_no`, `username`, `email`, `password`) VALUES
(9, 'rahul4486', 'dwjgaek@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(10, 'simran ', 'simram@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(11, 'pooja', 'a@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(12, 'abc', 'b@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `s_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
