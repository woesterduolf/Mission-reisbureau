-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 nov 2016 om 21:34
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

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
-- Tabelstructuur voor tabel `account`
--

CREATE TABLE `account` (
  `email` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `is_subscribed_to_newsletter` char(1) NOT NULL,
  `travel_points` int(10) NOT NULL,
  `CUSTOMER_customer_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `account`
--

INSERT INTO `account` (`email`, `PASSWORD`, `is_subscribed_to_newsletter`, `travel_points`, `CUSTOMER_customer_ID`) VALUES
('aapje@kees.nl', 'hallo', '1', 45, 1),
('boobie@jaap.net', 'dagjesmen', '0', 0, 2),
('juppp@beest.nl', 'jarigejet', '1', 0, 5),
('klarinet@huis.be', 'mzuiek', '0', 367, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `airport`
--

CREATE TABLE `airport` (
  `airportID` int(7) NOT NULL,
  `abbreviation` varchar(5) NOT NULL,
  `adress` varchar(20) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phonenumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `airport`
--

INSERT INTO `airport` (`airportID`, `abbreviation`, `adress`, `zip`, `city`, `phonenumber`) VALUES
(123, 'AMS', 'schiphollaan2', '1234AH', 'Amsterdam', 983747123),
(391, 'KAK', 'typefout 7', '9999AA', 'stijlfout', 765434567),
(432, 'BOB', 'Keesstraat 5', '8719AN', 'Bobbejaanland', 382739582),
(837, 'GRN', 'eemshavenweg 1', '2345GH', 'Groningen', 505123134),
(987, 'UHG', 'Vondellaan 2 ', '6481UH', 'Uhage', 876543212);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(5) NOT NULL,
  `city` varchar(20) NOT NULL,
  `date_of_arrival` date NOT NULL,
  `date_of_departure` date NOT NULL,
  `CUSTOMER_customer_ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `booking`
--

INSERT INTO `booking` (`bookingID`, `city`, `date_of_arrival`, `date_of_departure`, `CUSTOMER_customer_ID`) VALUES
(2347, 'Athene', '2016-11-08', '2016-11-28', 2),
(3415, 'Napels', '2016-10-12', '2016-10-28', 1),
(3457, 'Sneek', '2016-11-02', '2016-11-22', 5),
(23425, 'Rome', '2016-12-01', '2016-12-07', 4),
(23497, 'Groningen', '2016-10-03', '2016-10-19', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `busreservation`
--

CREATE TABLE `busreservation` (
  `reservationID` int(5) NOT NULL,
  `boarding_point` varchar(20) NOT NULL,
  `price` int(6) NOT NULL,
  `BOOKING_bookingID` int(5) NOT NULL,
  `boarding_point_return` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `busreservation`
--

INSERT INTO `busreservation` (`reservationID`, `boarding_point`, `price`, `BOOKING_bookingID`, `boarding_point_return`) VALUES
(423, 'Groningen', 123, 2347, 'Kip'),
(453, 'Groningen', 1235, 3457, 'Heerenveen'),
(983, 'Groningen', 572, 3415, 'Leeuwarden'),
(3454, 'Heerhugowaard', 895, 23425, 'Groningen'),
(9827, 'Hulp', 999, 23497, 'Hel');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customer`
--

CREATE TABLE `customer` (
  `customer_ID` int(5) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `adress` varchar(20) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `phonenumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `customer`
--

INSERT INTO `customer` (`customer_ID`, `last_name`, `first_name`, `adress`, `zipcode`, `city`, `country`, `phonenumber`) VALUES
(1, 'Janssen', 'Piet', 'Heereborg 158', '9736AH', 'Groningen', 'Nederland', 678547619),
(2, 'Wieringa', NULL, 'Fietspompstraat 5', '4718GJ', 'Fietselstijn', 'Fietselgracht', 638562987),
(3, 'visje', 'iglo', 'zeestraat 4', '1234BL', 'Atlantis', 'Atlantica', 737519736),
(4, 'Baba', 'Ali', 'hooipolder', '2748UH', 'Bagdad', 'Duitsland', 472487623),
(5, 'Yuri', 'M', 'Hulpstraat 1', '3784AT', 'Groningen', 'Friesland', 629384753);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `flightreservation`
--

CREATE TABLE `flightreservation` (
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

--
-- Gegevens worden geëxporteerd voor tabel `flightreservation`
--

INSERT INTO `flightreservation` (`flightID`, `seat`, `is_less_mobile`, `allergies`, `BOOKING_bookingID`, `departure_time`, `arrival_time`, `price`, `AIRPORT_airportID`) VALUES
(1, 1, '', '1', 3415, '2016-09-30', '2016-10-01', 24, 123),
(11, 4, '', '', 3457, '2016-10-01', '2016-10-25', 76, 432),
(523, 23, '1', NULL, 2347, '2016-10-04', '2016-10-05', 2345, 391),
(2342, 35, '1', '', 23497, '2016-10-02', '2016-10-09', 555, 987),
(9999, 55, '', '', 23425, '2016-10-05', '2016-10-12', 345, 837);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` int(10) NOT NULL,
  `stars` int(5) DEFAULT NULL,
  `rating` int(3) NOT NULL,
  `adress` varchar(20) NOT NULL,
  `contact_person` varchar(20) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `hotel`
--

INSERT INTO `hotel` (`hotelID`, `stars`, `rating`, `adress`, `contact_person`, `phone_number`, `name`) VALUES
(55, 4, 9, 'Hooidoei 3', 'pikachu', 1827563287, 'Het zoentje'),
(74, 5, 6, 'Mooispullaan 2', 'Piet jansen', 658398575, 'De lachende pul'),
(99, 2, 4, 'schoeleweg 6', '7384AB', 62547616, 'Het biertje'),
(242, 5, 10, 'Duurestraat 1', 'Dagobert Duck', 666666666, 'Hilton'),
(546, 3, 8, 'Rensumaheerd 42', 'Ricardo', 57947410, 'Van der Valk');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `room`
--

CREATE TABLE `room` (
  `roomID` int(5) NOT NULL,
  `beds` int(1) NOT NULL,
  `TYPE` varchar(20) NOT NULL,
  `price` int(5) NOT NULL,
  `HOTEL_hotelID` int(10) NOT NULL,
  `BOOKING_bookingID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `room`
--

INSERT INTO `room` (`roomID`, `beds`, `TYPE`, `price`, `HOTEL_hotelID`, `BOOKING_bookingID`) VALUES
(11134, 1, 'luxe', 567, 55, 2347),
(12345, 2, 'comfort', 500, 242, 23425),
(64627, 2, 'Standard', 123, 74, 3415),
(98765, 2, 'standard', 420, 546, 23497),
(456324, 1, 'wedding', 600, 99, 3457);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexen voor tabel `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`airportID`),
  ADD UNIQUE KEY `airportID` (`airportID`);

--
-- Indexen voor tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD UNIQUE KEY `bookingID` (`bookingID`);

--
-- Indexen voor tabel `busreservation`
--
ALTER TABLE `busreservation`
  ADD PRIMARY KEY (`reservationID`),
  ADD UNIQUE KEY `reservationID` (`reservationID`);

--
-- Indexen voor tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`),
  ADD UNIQUE KEY `customer_ID` (`customer_ID`);

--
-- Indexen voor tabel `flightreservation`
--
ALTER TABLE `flightreservation`
  ADD PRIMARY KEY (`flightID`),
  ADD UNIQUE KEY `flightID` (`flightID`);

--
-- Indexen voor tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`),
  ADD UNIQUE KEY `hotelID` (`hotelID`);

--
-- Indexen voor tabel `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`),
  ADD UNIQUE KEY `roomID` (`roomID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
