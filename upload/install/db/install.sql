-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2017 at 11:42 AM
-- Server version: 5.7.12-log
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expressgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(120) COLLATE utf8_bin NOT NULL,
  `password` varchar(150) COLLATE utf8_bin NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`login`, `password`, `id`) VALUES
('admin', 'admin', 1);


 CREATE TABLE `ci_sessions` (
    `id` varchar(40) NOT NULL,
    `ip_address` varchar(45) NOT NULL,
    `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
    `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


-- --------------------------------------------------------

--
-- Table structure for table `agreements`
--

CREATE TABLE `agreements` (
  `id` int(11) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `branch_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `agreement_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deposit_method` varchar(255) COLLATE utf8_bin NOT NULL,
  `deposit_amount` int(11) NOT NULL,
  `fuel` varchar(255) COLLATE utf8_bin NOT NULL,
  `odometer` varchar(255) COLLATE utf8_bin NOT NULL,
  `one_day` varchar(255) COLLATE utf8_bin NOT NULL,
  `weekly` varchar(255) COLLATE utf8_bin NOT NULL,
  `monthly` varchar(255) COLLATE utf8_bin NOT NULL,
  `monthly_desc` varchar(255) COLLATE utf8_bin NOT NULL,
  `weekly_desc` varchar(255) COLLATE utf8_bin NOT NULL,
  `daily_desc` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `branch` (`id`, `name`) 
VALUES (1, 'Head office');
-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `passport_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `birth_date` date DEFAULT NULL,
  `place_of_birth` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `home_address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `home_phone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `work_phone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `local_phone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `cell_phone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `e_mail` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `flight_number` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `pickup` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dropoff` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `driving_license` varchar(255) COLLATE utf8_bin NOT NULL,
  `license_category` varchar(255) COLLATE utf8_bin NOT NULL,
  `license_exp` date NOT NULL,
  `first_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `agr_id` int(11) NOT NULL,
  `tax` varchar(255) COLLATE utf8_bin NOT NULL,
  `subtotal` float NOT NULL,
  `total` float NOT NULL,
  `vehicle_status` int(11) NOT NULL,
  `sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `amount` float NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `after_add` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `setup`
--

CREATE TABLE `setup` (
  `id` int(11) NOT NULL,
  `parameter` varchar(255) COLLATE utf8_bin NOT NULL,
  `value` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `setup`
--

INSERT INTO `setup` (`id`, `parameter`, `value`) VALUES
(1, 'tax', ''),
(3, 'company_name', ''),
(4, 'address', ''),
(5, 'city', ''),
(6, 'country', ''),
(9, 'phone', ''),
(10, 'language', 'english'),
(11, 'currency', 'USD'),
(12, 'install', '0');


--
-- Table structure for table `vehicle_class`
--

CREATE TABLE `vehicle_class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vehicle_class`
--

INSERT INTO `vehicle_class` (`id`, `name`) VALUES
(2, 'Economy'),
(3, 'Fullsize'),
(4, 'Sport Utilty'),
(5, 'Compact'),
(6, 'Midsize'),
(7, 'Minivan'),
(8, 'Convertible'),
(9, 'Luxury'),
(10, 'Fullsize Van'),
(13, 'Pickup');


-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `license_plate` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `vin` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `make` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `class` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `transmission` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `engine` int(11) DEFAULT NULL,
  `fuel_type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `1day` int(11) DEFAULT NULL,
  `weekly` int(11) DEFAULT NULL,
  `monthly` int(11) DEFAULT NULL,
  `available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agreements`
--
ALTER TABLE `agreements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agr_id` (`agr_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `setup`
--
ALTER TABLE `setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`);


ALTER TABLE `ci_sessions` 
    ADD PRIMARY KEY (`id`),
    ADD KEY `ci_sessions_timestamp` (`timestamp`);


ALTER TABLE `vehicle_class`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

ALTER TABLE `vehicle_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `agreements`
--
ALTER TABLE `agreements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setup`
--
ALTER TABLE `setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;


ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
