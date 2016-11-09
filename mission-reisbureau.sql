-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 07:44 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mission-reisbureau`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `e-mail` varchar(256) NOT NULL,
  `password` varchar(20) NOT NULL,
  `is_subscribed_to_newsletter` tinyint(1) DEFAULT NULL,
  `travel_points` int(100) DEFAULT NULL,
  `customer_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` varchar(32) NOT NULL,
  `city` varchar(100) NOT NULL,
  `date_of_arrival` date NOT NULL,
  `date_of_departure` date NOT NULL,
  `customer_id` varchar(32) NOT NULL,
  `room_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus_reservation`
--

CREATE TABLE `bus_reservation` (
  `bus_reservation_id` varchar(32) NOT NULL,
  `boarding_point` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `boarding_point_return` varchar(50) NOT NULL,
  `booking_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `phonenumber` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `hotel_id` int(10) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `breakfast` tinyint(1) NOT NULL,
  `swimmingpool` tinyint(1) NOT NULL,
  `private_parking` tinyint(1) NOT NULL,
  `television` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fligth`
--

CREATE TABLE `fligth` (
  `fligth_id` varchar(10) NOT NULL,
  `departure_airport_code` varchar(5) NOT NULL,
  `destination_airport_code` varchar(5) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fligth_reservation`
--

CREATE TABLE `fligth_reservation` (
  `fligth_reservation_id` varchar(32) NOT NULL,
  `seat` varchar(4) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `booking_id` varchar(32) NOT NULL,
  `fligth_id` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(10) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `stars` int(1) DEFAULT NULL,
  `rating` int(3) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `phonenumber` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `beds` int(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `hotel_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`e-mail`),
  ADD UNIQUE KEY `e-mail` (`e-mail`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `customer_id_2` (`customer_id`);

--
-- Indexes for table `bus_reservation`
--
ALTER TABLE `bus_reservation`
  ADD PRIMARY KEY (`bus_reservation_id`),
  ADD KEY `customer_id` (`booking_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `fligth`
--
ALTER TABLE `fligth`
  ADD PRIMARY KEY (`fligth_id`,`departure_date`,`departure_time`);

--
-- Indexes for table `fligth_reservation`
--
ALTER TABLE `fligth_reservation`
  ADD PRIMARY KEY (`fligth_reservation_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `fligthid` (`fligth_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `customer_account` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bus_reservation`
--
ALTER TABLE `bus_reservation`
  ADD CONSTRAINT `bus_reservation_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fligth_reservation`
--
ALTER TABLE `fligth_reservation`
  ADD CONSTRAINT `fligth_reservation_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fligth_reservation_ibfk_2` FOREIGN KEY (`fligth_id`) REFERENCES `fligth` (`fligth_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
