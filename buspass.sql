-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2018 at 03:05 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buspass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_email`, `username`, `password`, `user_type_id`) VALUES
(1, 'admin@admin.com', 'admin', '0192023a7bbd73250516f069df18b500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(150) NOT NULL,
  `created_on` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `created_on`, `status`) VALUES
(1, 'Tambaram', '2018-10-16', 0),
(2, 'Chengalpet', '2018-10-16', 0),
(3, 'Velacherry', '2018-10-16', 0),
(4, 'Mamaballam', '2018-10-16', 0),
(5, 'Central', '2018-10-16', 0),
(6, 'Egmore', '2018-10-16', 0),
(7, 'Perambur', '2018-10-16', 0),
(8, 'Villivakkam', '2018-10-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `month_pass_details`
--

CREATE TABLE `month_pass_details` (
  `id` int(11) NOT NULL,
  `from_city_id` int(11) NOT NULL,
  `to_city_id` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month_pass_details`
--

INSERT INTO `month_pass_details` (`id`, `from_city_id`, `to_city_id`, `amount`, `type`) VALUES
(1, 1, 2, '150', 3),
(2, 2, 1, '150', 3),
(3, 1, 3, '200', 3),
(4, 3, 1, '200', 3),
(5, 4, 5, '100', 3),
(6, 5, 4, '100', 3),
(7, 0, 0, '70', 1),
(8, 0, 0, '1000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(150) NOT NULL,
  `o_user_id` int(11) NOT NULL,
  `o_pass_type_id` int(11) NOT NULL,
  `o_pass_type` varchar(150) NOT NULL,
  `o_govt_proof` varchar(50) NOT NULL,
  `o_govt_proof_val` varchar(150) NOT NULL,
  `o_amount` varchar(50) NOT NULL,
  `o_created_on` date NOT NULL,
  `o_expiry_on` date NOT NULL,
  `o_from_city_id` int(11) NOT NULL,
  `o_from_city_name` varchar(150) NOT NULL,
  `o_to_city_id` int(11) NOT NULL,
  `o_to_city_name` varchar(150) NOT NULL,
  `o_route_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `o_user_id`, `o_pass_type_id`, `o_pass_type`, `o_govt_proof`, `o_govt_proof_val`, `o_amount`, `o_created_on`, `o_expiry_on`, `o_from_city_id`, `o_from_city_name`, `o_to_city_id`, `o_to_city_name`, `o_route_id`, `is_active`) VALUES
(1, 'BP-181018125702', 1, 1, 'One Day', 'PAN', 'BDRPV0101', '70', '2018-10-18', '2018-10-18', 0, '', 0, '', 7, 2),
(2, 'BP-211018125702', 1, 1, 'One Day', 'PAN', 'BDRPV0101', '70', '2018-10-18', '2018-10-18', 0, '', 0, '', 7, 2),
(3, 'BP-181018023119', 1, 2, '1000 Monthly', 'PAN', 'BDRPV0101', '1000', '2018-10-18', '2018-10-17', 0, '', 0, '', 8, 2),
(4, 'BP-181018023342', 1, 3, 'Monthly Route', 'PAN', 'BDRPV0101', '150', '2018-10-18', '2018-10-18', 2, 'Chengalpet', 1, 'Tambaram', 2, 1),
(5, 'BP-181018024837', 1, 3, 'Monthly Route', 'PAN', 'BDRPV0101', '100', '2018-10-18', '2018-11-18', 5, 'Central', 4, 'Mamaballam', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pass_type`
--

CREATE TABLE `pass_type` (
  `id` int(11) NOT NULL,
  `type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pass_type`
--

INSERT INTO `pass_type` (`id`, `type`) VALUES
(1, 'One Day'),
(2, '1000 Monthly'),
(3, 'Monthly Route');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `govt_proof_type` varchar(50) NOT NULL,
  `govt_proof_val` varchar(150) NOT NULL,
  `created_on` varchar(50) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `govt_proof_type`, `govt_proof_val`, `created_on`, `updated_on`, `status`) VALUES
(1, 'Jagadeesh', 'MV', 'jaga8693@gmail.com', 'b762a7bd5cb44d8d0e12396a7fca8620', '9952079455', 'PAN', 'BDRPV0101', '2018-10-13 03:26:14', '2018-10-16 18:56:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month_pass_details`
--
ALTER TABLE `month_pass_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass_type`
--
ALTER TABLE `pass_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `month_pass_details`
--
ALTER TABLE `month_pass_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pass_type`
--
ALTER TABLE `pass_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
