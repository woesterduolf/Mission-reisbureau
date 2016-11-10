-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2016 at 01:06 PM
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
  `address` varchar(100) NOT NULL,
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

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`hotel_id`, `wifi`, `breakfast`, `swimmingpool`, `private_parking`, `television`) VALUES
(1, 1, 1, 0, 0, 1),
(2, 0, 1, 0, 1, 1),
(3, 1, 1, 1, 0, 1),
(4, 0, 0, 1, 1, 1),
(5, 1, 1, 1, 1, 1),
(6, 0, 1, 0, 0, 0),
(7, 1, 0, 1, 0, 1),
(8, 0, 1, 1, 0, 1),
(9, 1, 1, 0, 1, 1),
(10, 1, 1, 0, 0, 1),
(11, 1, 0, 0, 1, 0),
(12, 1, 0, 0, 1, 1),
(13, 1, 0, 1, 1, 0),
(14, 1, 0, 1, 1, 0),
(15, 1, 1, 1, 1, 0),
(16, 0, 1, 0, 1, 1),
(17, 0, 1, 1, 0, 1),
(18, 1, 1, 0, 0, 0),
(19, 1, 1, 0, 1, 1),
(20, 0, 1, 1, 1, 1),
(21, 1, 0, 1, 1, 0),
(22, 1, 1, 0, 0, 1),
(23, 1, 0, 0, 0, 1),
(24, 1, 1, 1, 1, 1),
(25, 0, 1, 1, 0, 0),
(26, 0, 1, 0, 0, 1),
(27, 1, 0, 0, 1, 1),
(28, 1, 1, 1, 0, 1),
(29, 1, 0, 0, 0, 0),
(30, 1, 1, 0, 0, 0),
(31, 0, 0, 1, 0, 0),
(32, 1, 0, 1, 1, 1),
(33, 0, 1, 1, 1, 0),
(34, 1, 1, 1, 1, 0),
(35, 1, 0, 1, 1, 0),
(36, 1, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` varchar(10) NOT NULL,
  `departure_airport_code` varchar(5) NOT NULL,
  `destination_airport_code` varchar(5) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flight_reservation`
--

CREATE TABLE `flight_reservation` (
  `flight_reservation_id` varchar(32) NOT NULL,
  `seat` varchar(4) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `booking_id` varchar(32) NOT NULL,
  `flight_id` varchar(32) NOT NULL
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

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `stars`, `rating`, `adress`, `zipcode`, `city`, `country`, `contact_person`, `phonenumber`) VALUES
(1, 'Moonlight hotel', 4, 58, 'Hallostraat 2', '2838AH', 'Rome', 'Italy', 'Mr Pizza', 612385726),
(2, 'Big bad wolf', 3, 29, 'Oligopolistraat 29', '2938 UM', 'Rome', 'Italy', 'Mr Tobby', 627361828),
(3, 'Hotel het kleintje', 3, 95, 'Ujlalaan 59', '7481UW', 'Rome', 'Italy', 'Mr tjopp', 638128592),
(4, 'De drijvende koe', 4, 85, 'Naplestraat 58', '9285UH', 'Napels', 'Italy', 'Ms Sandra', 672638182),
(5, 'The golden nugget', 2, 55, 'Utrechtstraat 92', '9284UU', 'Napels', 'Italy', 'Booy', 627187722),
(6, 'Grand amsterdam', 5, 85, 'Treintjesstraat 28', '2052QQ', 'Napels', 'Italy', 'Mr Bonjouno', 627365577),
(7, 'Het biertje', 4, 85, 'Doeistraat 59', '2837UH', 'Athens', 'Italy', 'Mr Uaos', 627385817),
(8, 'Royal palace', 2, 59, 'Palaclaan 22', '9283UU', 'Athens', 'Italy', 'Yoep', 627175928),
(9, 'Henk jan hotel', 5, 99, 'HJlaan 598', '8285QW', 'Athens', 'Italy', 'Mr Henk jan', 628375822),
(10, 'De zinkende koe', 2, 58, 'Bollestraat 228', '8661KM', 'Argos', 'Greece', 'Ulther', 628375927),
(11, 'Flying dog hotel', 4, 78, 'Doggylane 28', '7165QA', 'Argos', 'Greece', 'Ms Yulla', 628485920),
(12, 'Tobias hotel', 5, 95, 'Tobiasstraat 29', '5928UH', 'Argos', 'Greece', 'Tobias', 627656231),
(13, 'De bossche bol', 3, 85, 'Lollastraat 212', '9284UU', 'Thebes', 'Greece', 'Mr Miyagi', 623859293),
(14, 'The overcompensation', 2, 22, 'Kleinedinglaan 1', '2985QO', 'Thebes', 'Greece', 'Mr dooda', 628375929),
(15, 'Hotel klein zwitserland', 4, 59, 'Ulalalaan 782', '9841UT', 'Thebes', 'Greece', 'Mr Toot', 638371828),
(16, 'Sander hotel', 5, 94, 'Sanderstraat 29', '9485JJ', 'Lisbon', 'Portugal', 'Mr Sander', 628519366),
(17, 'Collegehotel', 3, 59, 'Yugolkaan 123', '9581', 'Lisbon', 'Portugal', 'Mr Jizol', 628385888),
(18, 'De lachende pul', 2, 62, 'Jizollaan 59', '8572WE', 'Lisbon', 'Portugal', 'Yummerz', 623591922),
(19, 'Lenovo', 5, 82, 'Lenovostraat 2851', '9280SS', 'Cadiz', 'Spain', 'Mr Spain', 623759277),
(20, 'Sinas perfekt hotel', 2, 95, 'Sinaslaan 225', '9582UU', 'Cadiz', 'Spain', 'Jaap', 628375828),
(21, 'Sanderonium', 4, 56, 'Straat 92', '1122IU', 'Cadiz', 'Spain', 'Azzer', 628375722),
(22, 'Hilton', 2, 81, 'Rensumaheerd 29', '9736HE', 'Groningen', 'Netherlands', 'Joop ', 617284927),
(23, 'Kust hotel', 4, 91, 'Rensumaheerd 42b', '9736AB', 'Groningen', 'Netherlands', 'Ricardo', 657947410),
(24, 'Het hotel', 2, 30, 'Bajesstraat 29', '8478YG', 'Groningen', 'The Netherlands', 'Jop', 627375522),
(25, 'Van der valk', 3, 57, 'Jeholastraat 1238', '9851UH', 'Chalcis', 'Greece', 'Mr Bobo', 627371122),
(26, 'Hampshire hotel', 2, 51, 'Raggestraat 228', '5618UM', 'Chalcis', 'Greece', 'Yoep', 628371828),
(27, 'Rudolf hotel', 5, 95, 'Rudulfstraat 124', '5710QN', 'Chalcis', 'Greece', 'Rudolf', 617824912),
(28, 'Ricardo hotel', 5, 92, 'Ricardostraat 238', '6877QT', 'Larnaca', 'Cyprus', 'Ricardo', 628375811),
(29, 'World wide web', 2, 59, 'Totterstraat 20', '9252EM', 'Larnaca', 'Cyprus', 'Tjabbie', 628381275),
(30, 'Biertent', 4, 98, 'bierhierstraat 291', '1831QA', 'Larnaca', 'Cyprus', 'Mr Arie', 612395224),
(31, 'Critical hotel', 3, 61, 'Hololensstraat 21', '9190SS', 'Kutaisi', 'Georgia', 'Mr George', 618284411),
(32, 'Hotel de fietsbel', 1, 11, 'Luilakstraat 298', '1199II', 'Kutaisi', 'Georgia', 'Ms George', 672592110),
(33, 'Standard', 4, 85, 'Straatjestraat 124', '8122TT', 'Kutaisi', 'Georgia', 'Sneep', 671825722),
(34, 'Hanza', 4, 51, 'Zernikeplein 51', '2985UH', 'Amsterdam', 'Netherlands', 'Piet', 618235911),
(35, 'The red lobster', 1, 100, 'Waterstraat 83', '9511UA', 'Amsterdam', 'Netherlands', 'Kees', 618372286),
(36, 'Het zoentje', 5, 51, 'Slippendewegstraat 281', '9411YY', 'Amsterdam', 'Netherlands', 'Boer jans', 618275511);

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
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `beds`, `type`, `price`, `hotel_id`) VALUES
(1, 1, 'standard', '123', 1),
(2, 2, 'wedding', '259', 1),
(3, 1, 'swek', '12', 1),
(4, 1, 'comfort', '124', 2),
(5, 2, 'wedding', '1255', 2),
(6, 2, 'luxe', '551', 3),
(7, 1, 'standard', '1253', 3),
(8, 2, 'swek', '728', 3),
(9, 2, 'luxe', '1239', 4),
(10, 1, 'wedding', '999', 4),
(11, 1, 'swek', '512', 5),
(12, 2, 'wedding', '6234', 5),
(13, 1, 'luxe', '518', 5),
(14, 2, 'standard', '127', 6),
(15, 1, 'comfort', '216', 6),
(16, 2, 'wedding', '1512', 7),
(17, 2, 'swek', '171', 7),
(18, 1, 'luxe', '1412', 7),
(19, 2, 'swek', '152', 8),
(20, 1, 'standard', '11', 8),
(21, 1, 'wedding', '195', 9),
(22, 1, 'comfort', '184', 9),
(23, 2, 'standard', '121', 9),
(24, 1, 'luxe', '111', 10),
(25, 2, 'comfort', '24', 10),
(26, 2, 'wedding', '1838', 11),
(27, 2, 'swek', '551', 11),
(28, 1, 'luxe', '928', 11),
(29, 2, 'swek', '110', 12),
(30, 2, 'comfort', '109', 12),
(31, 2, 'standard', '150', 13),
(32, 1, 'luxe', '195', 13),
(33, 2, 'wedding', '1929', 13),
(34, 1, 'comfort', '111', 14),
(35, 2, 'luxe', '551', 14),
(36, 2, 'standard', '513', 15),
(37, 1, 'swek', '612', 15),
(38, 2, 'swek', '211', 15),
(39, 1, 'swek', '1239', 16),
(40, 1, 'wedding', '2581', 16),
(41, 2, 'standard', '150', 17),
(42, 2, 'comfort', '221', 17),
(43, 1, 'wedding', '511', 17),
(44, 2, 'standard', '300', 18),
(45, 1, 'wedding', '5151', 18),
(46, 2, 'standard', '511', 19),
(47, 2, 'swek', '610', 19),
(48, 1, 'wedding', '811', 19),
(49, 1, 'standard', '215', 20),
(50, 2, 'comfort', '315', 20),
(51, 2, 'standard', '123', 21),
(52, 2, 'luxe', '245', 21),
(53, 1, 'wedding', '512', 21),
(54, 1, 'standard', '231', 22),
(55, 2, 'comfort', '412', 22),
(56, 1, 'wedding', '5112', 23),
(57, 2, 'standard', '123', 23),
(58, 2, 'comfort', '2151', 23),
(59, 1, 'standard', '512', 24),
(60, 2, 'swek', '612', 24),
(61, 2, 'standard', '123', 25),
(62, 2, 'comfort', '234', 25),
(63, 2, 'luxe', '345', 25),
(64, 1, 'standard', '678', 26),
(65, 1, 'wedding', '1245', 26),
(66, 2, 'luxe', '235', 27),
(67, 2, 'swek', '351', 27),
(68, 1, 'wedding', '1591', 27),
(69, 1, 'standard', '245', 28),
(70, 2, 'comfort', '541', 28),
(71, 2, 'standard', '216', 29),
(72, 2, 'swek', '311', 29),
(73, 1, 'wedding', '512', 29),
(74, 2, 'standard', '451', 30),
(75, 2, 'comfort', '612', 30),
(76, 2, 'comfort', '1522', 31),
(77, 2, 'swek', '1721', 31),
(78, 1, 'wedding', '4512', 31),
(79, 2, 'comfort', '124', 32),
(80, 2, 'luxe', '215', 32),
(81, 2, 'standard', '123', 33),
(82, 2, 'luxe', '512', 33),
(83, 1, 'wedding', '911', 33),
(84, 1, 'standard', '123', 34),
(85, 2, 'comfort', '214', 34),
(86, 2, 'luxe', '1231', 35),
(87, 2, 'swek', '1402', 35),
(88, 1, 'wedding', '2131', 35),
(89, 2, 'comfort', '512', 36),
(90, 1, 'wedding', '925', 36);

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
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`,`departure_date`,`departure_time`);

--
-- Indexes for table `flight_reservation`
--
ALTER TABLE `flight_reservation`
  ADD PRIMARY KEY (`flight_reservation_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `fligthid` (`flight_id`);

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
-- Constraints for table `flight_reservation`
--
ALTER TABLE `flight_reservation`
  ADD CONSTRAINT `flight_reservation_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_reservation_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
