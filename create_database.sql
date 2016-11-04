-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2016 at 04:18 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23




/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `359861`
--

-- --------------------------------------------------------

--
-- Table structure for table `ACCOUNT`
--

CREATE TABLE `ACCOUNT` (
  `email` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `is_subscribed_to_newsletter` char(1) NOT NULL,
  `travel_points` int(10) NOT NULL,
  `CUSTOMER_customer_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `AIRPORT`
--

CREATE TABLE `AIRPORT` (
  `airportID` int(7) NOT NULL,
  `abbreviation` varchar(5) NOT NULL,
  `adress` varchar(20) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phonenumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `BOOKING`
--

CREATE TABLE `BOOKING` (
  `bookingID` int(5) NOT NULL,
  `city` varchar(20) NOT NULL,
  `date_of_arrival` date NOT NULL,
  `date_of_departure` date NOT NULL,
  `CUSTOMER_customer_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `BUSRESERVATION`
--

CREATE TABLE `BUSRESERVATION` (
  `reservationID` int(5) NOT NULL,
  `boarding_point` varchar(20) NOT NULL,
  `price` int(6) NOT NULL,
  `BOOKING_bookingID` int(5) NOT NULL,
  `boarding_point_return` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `customer_ID` int(5) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `adress` varchar(20) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phonenumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `FLIGHTRESERVATION`
--

CREATE TABLE `FLIGHTRESERVATION` (
  `flightID` int(5) NOT NULL,
  `seat` int(4) NOT NULL,
  `is_less_mobile` char(1) DEFAULT NULL,
  `allergies` varchar(20) DEFAULT NULL,
  `BOOKING_bookingID` int(5) NOT NULL,
  `departure_time` date NOT NULL,
  `arrival_time` date NOT NULL,
  `price` int(5) NOT NULL,
  `AIRPORT_airportID` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `HOTEL`
--

CREATE TABLE `HOTEL` (
  `hotelID` int(10) NOT NULL,
  `stars` int(5) DEFAULT NULL,
  `rating` int(3) NOT NULL,
  `adress` varchar(20) NOT NULL,
  `contact_person` varchar(20) NOT NULL,
  `phone_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ROOM`
--

CREATE TABLE `ROOM` (
  `roomID` int(5) NOT NULL,
  `beds` int(1) NOT NULL,
  `TYPE` varchar(20) NOT NULL,
  `price` int(5) NOT NULL,
  `HOTEL_hotelID` int(10) NOT NULL,
  `BOOKING_bookingID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ACCOUNT`
--
ALTER TABLE `ACCOUNT`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `AIRPORT`
--
ALTER TABLE `AIRPORT`
  ADD PRIMARY KEY (`airportID`),
  ADD UNIQUE KEY `airportID` (`airportID`);

--
-- Indexes for table `BOOKING`
--
ALTER TABLE `BOOKING`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `bookingID` (`bookingID`);

--
-- Indexes for table `BUSRESERVATION`
--
ALTER TABLE `BUSRESERVATION`
  ADD PRIMARY KEY (`reservationID`),
  ADD UNIQUE KEY `reservationID` (`reservationID`);

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`customer_ID`),
  ADD UNIQUE KEY `customer_ID` (`customer_ID`);

--
-- Indexes for table `FLIGHTRESERVATION`
--
ALTER TABLE `FLIGHTRESERVATION`
  ADD PRIMARY KEY (`flightID`),
  ADD UNIQUE KEY `flightID` (`flightID`);

--
-- Indexes for table `HOTEL`
--
ALTER TABLE `HOTEL`
  ADD PRIMARY KEY (`hotelID`),
  ADD UNIQUE KEY `hotelID` (`hotelID`);

--
-- Indexes for table `ROOM`
--
ALTER TABLE `ROOM`
  ADD PRIMARY KEY (`roomID`),
  ADD UNIQUE KEY `roomID` (`roomID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
