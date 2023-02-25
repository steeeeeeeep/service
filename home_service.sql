-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 07:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `lastname`, `username`, `email`, `password`, `contact`, `photo`) VALUES
(1, 'Julian', 'Monte', 'Julian', 'Julian@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2147483647, '6368e7c4e5d7a.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer_id` int(20) NOT NULL,
  `info_id` int(20) NOT NULL,
  `age` date NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`customer_id`, `info_id`, `age`, `gender`) VALUES
(1, 1, '2022-11-16', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `provider_info`
--

CREATE TABLE `provider_info` (
  `provider_id` int(20) NOT NULL,
  `info_id` int(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_card` varchar(255) NOT NULL,
  `employment_stat` varchar(255) NOT NULL,
  `age` date NOT NULL,
  `certificate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provider_info`
--

INSERT INTO `provider_info` (`provider_id`, `info_id`, `gender`, `id_type`, `id_card`, `employment_stat`, `age`, `certificate`) VALUES
(4, 1, 'Male', 'id', '6368ddafa6db2.png', 'Unemployed', '2022-11-08', '6368ddafa72a0.jpg'),
(6, 2, 'Male', 'id', '6368e67e33515.jpg', 'Unemployed', '2022-11-18', '6368e67e338e3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_info`
--

CREATE TABLE `service_info` (
  `provider_id` int(20) NOT NULL,
  `service_id` int(20) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `service_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_info`
--

INSERT INTO `service_info` (`provider_id`, `service_id`, `service_type`, `service_fee`) VALUES
(4, 1, 'Cleaning', 1000),
(6, 2, 'Auto Mechanic', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `sp_list`
--

CREATE TABLE `sp_list` (
  `provider_id` int(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `service_type` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sp_list`
--

INSERT INTO `sp_list` (`provider_id`, `firstname`, `lastname`, `username`, `email`, `password`, `contact`, `barangay`, `service_type`, `photo`) VALUES
(3, 'Juan', 'Dela Cruz', 'JuanD', 'Juan@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2147483647, 'Fatima', 'Cleaning', '6368ddafa683d.png'),
(4, 'Juan', 'Dela Cruz', 'JuanD', 'Juan@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2147483647, 'Fatima', 'Cleaning', '6368ddafa683d.png'),
(5, 'Lito', 'Pidla', 'Lito', 'Lito2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2147483647, 'Apopong', 'Auto Mechanic', '6368e67e32cb3.png'),
(6, 'Lito', 'Pidla', 'Lito', 'Lito2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 2147483647, 'Apopong', 'Auto Mechanic', '6368e67e32cb3.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `customer_id` int(20) NOT NULL,
  `provider_id` int(20) NOT NULL,
  `address_id` int(20) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `provider_info`
--
ALTER TABLE `provider_info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `provider_id` (`provider_id`);

--
-- Indexes for table `service_info`
--
ALTER TABLE `service_info`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `provider_id` (`provider_id`);

--
-- Indexes for table `sp_list`
--
ALTER TABLE `sp_list`
  ADD PRIMARY KEY (`provider_id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `provider_id` (`provider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `info_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `provider_info`
--
ALTER TABLE `provider_info`
  MODIFY `info_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_info`
--
ALTER TABLE `service_info`
  MODIFY `service_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sp_list`
--
ALTER TABLE `sp_list`
  MODIFY `provider_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD CONSTRAINT `customer_info_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `provider_info`
--
ALTER TABLE `provider_info`
  ADD CONSTRAINT `provider_info_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `sp_list` (`provider_id`);

--
-- Constraints for table `service_info`
--
ALTER TABLE `service_info`
  ADD CONSTRAINT `service_info_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `sp_list` (`provider_id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `sp_list` (`provider_id`),
  ADD CONSTRAINT `user_address_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
