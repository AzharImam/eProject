-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2023 at 07:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agent`
--

CREATE TABLE `tbl_agent` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `branch` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Not working'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_agent`
--

INSERT INTO `tbl_agent` (`id`, `name`, `email`, `phone_no`, `address`, `city`, `branch`, `user_name`, `password`, `image`, `status`) VALUES
(1, 'Waiz Ali', 'waiz@gmail.com', '01234', '', '', 1, 'waizali', '1234', '', 'Not working'),
(2, 'Maaz Khan', 'maaz@gmail.com', '01234', '', '', 2, 'maazkhan', '1234', '', 'Not working'),
(3, 'Saleem Khan', 'saleem@gmail.com', '01234', '', '', 3, 'saleemkhan', '1234', '', 'Not Working'),
(4, 'Ahmed Khan', 'ahmed@gmail.com', '03123', '', '', 2, 'ahmedkhan', '1234', 'assassin-s-creed-iv-black-flag.jpg', 'Not working');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `name`, `city`, `address`, `contact_no`) VALUES
(1, 'HBL 1', 'Karachi', 'sector 11-a', '01234'),
(2, 'HBL 2', 'Lahore', 'sector 15/a-2', '01234'),
(3, 'HBL 3', 'Islamabad', 'sector-9', '01234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Waiz Ali', 'waiz@gmail.com', 'checking', 'Hello world');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courier`
--

CREATE TABLE `tbl_courier` (
  `id` int(11) NOT NULL,
  `track_number` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `shipment_date` date NOT NULL,
  `sender_name` varchar(25) NOT NULL,
  `sender_city` varchar(15) NOT NULL,
  `sender_address` varchar(255) NOT NULL,
  `sender_phone_no` varchar(13) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `receiver_name` varchar(25) NOT NULL,
  `receiver_city` varchar(15) NOT NULL,
  `receiver_address` varchar(255) NOT NULL,
  `receiver_phone_no` varchar(13) NOT NULL,
  `receiver_email` varchar(50) NOT NULL,
  `shipment_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `no_of_parcel` varchar(15) NOT NULL,
  `parcel_length` varchar(50) NOT NULL,
  `parcel_width` varchar(50) NOT NULL,
  `parcel_height` varchar(50) NOT NULL,
  `parcel_weight` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `delivery_charges` varchar(50) NOT NULL,
  `total_charges` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_courier`
--

INSERT INTO `tbl_courier` (`id`, `track_number`, `branch_id`, `shipment_date`, `sender_name`, `sender_city`, `sender_address`, `sender_phone_no`, `sender_email`, `receiver_name`, `receiver_city`, `receiver_address`, `receiver_phone_no`, `receiver_email`, `shipment_status`, `no_of_parcel`, `parcel_length`, `parcel_width`, `parcel_height`, `parcel_weight`, `description`, `delivery_charges`, `total_charges`) VALUES
(1, 775, 0, '0000-00-00', 'asdasd', 'Karachi', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'Karachi', 'sdasd', 'asda', 'asdasd', 'Pending', '121', '212', '112', '1212', '12', 'eqwe', '150', '1212');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `name`, `description`, `money`) VALUES
(1, 'Fast service', 'deliver in 1 day', 500),
(2, 'Normal service', 'deliver in 3 days', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch` (`branch`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_agent`
--
ALTER TABLE `tbl_agent`
  ADD CONSTRAINT `tbl_agent_ibfk_1` FOREIGN KEY (`branch`) REFERENCES `tbl_branch` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
