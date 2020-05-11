-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 11, 2020 at 10:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `booking_date` datetime DEFAULT NULL,
  `duration_of_stay` varchar(10) DEFAULT NULL,
  `check_in_date` datetime DEFAULT NULL,
  `check_out_date` datetime DEFAULT NULL,
  `booking_payment_type` varchar(45) DEFAULT NULL,
  `total_rooms_booked` int(11) DEFAULT NULL,
  `hotel_hotel_id` int(11) NOT NULL,
  `guests_guest_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `guest_id` int(11) NOT NULL,
  `guest_first_name` varchar(45) DEFAULT NULL,
  `guest_last_name` varchar(45) DEFAULT NULL,
  `guest_contact_number` varchar(12) DEFAULT NULL,
  `guest_email_address` varchar(45) DEFAULT NULL,
  `guest_credit_card` varchar(45) DEFAULT NULL,
  `guest_id_proof` varchar(45) DEFAULT NULL,
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(45) DEFAULT NULL,
  `hotel_contact_number` varchar(12) DEFAULT NULL,
  `hotel_email_address` varchar(45) DEFAULT NULL,
  `hotel_description` varchar(100) DEFAULT NULL,
  `hotel_floor_count` int(11) DEFAULT NULL,
  `star_ratings_star_rating` int(11) NOT NULL,
  `check_in_time` time DEFAULT NULL,
  `check_out_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='		';

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_number` int(4) DEFAULT NULL,
  `rooms_type_rooms_type_id` int(11) NOT NULL,
  `hotel_hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rooms_booked`
--

CREATE TABLE `rooms_booked` (
  `rooms_booked_id` int(11) NOT NULL,
  `bookings_booking_id` int(11) NOT NULL,
  `rooms_room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(11) NOT NULL,
  `room_type_name` varchar(45) DEFAULT NULL,
  `room_cost` decimal(10,2) DEFAULT NULL,
  `room_type_description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_type_name`, `room_cost`, `room_type_description`) VALUES
(1, 'whatever', '2000.00', 'stfu');

-- --------------------------------------------------------

--
-- Table structure for table `star_ratings`
--

CREATE TABLE `star_ratings` (
  `star_rating` int(11) NOT NULL,
  `star_rating_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`,`hotel_hotel_id`,`guests_guest_id`),
  ADD KEY `fk_bookings_hotel1_idx` (`hotel_hotel_id`),
  ADD KEY `fk_bookings_guests1_idx` (`guests_guest_id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`guest_id`,`hotel_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`,`star_ratings_star_rating`),
  ADD KEY `fk_hotel_star_ratings1_idx` (`star_ratings_star_rating`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`,`rooms_type_rooms_type_id`,`hotel_hotel_id`),
  ADD KEY `fk_rooms_rooms_type1_idx` (`rooms_type_rooms_type_id`),
  ADD KEY `fk_rooms_hotel1_idx` (`hotel_hotel_id`);

--
-- Indexes for table `rooms_booked`
--
ALTER TABLE `rooms_booked`
  ADD PRIMARY KEY (`rooms_booked_id`,`bookings_booking_id`,`rooms_room_id`),
  ADD KEY `fk_rooms_booked_bookings1_idx` (`bookings_booking_id`),
  ADD KEY `fk_rooms_booked_rooms1_idx` (`rooms_room_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `star_ratings`
--
ALTER TABLE `star_ratings`
  ADD PRIMARY KEY (`star_rating`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_bookings_guests1` FOREIGN KEY (`guests_guest_id`) REFERENCES `guests` (`guest_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bookings_hotel1` FOREIGN KEY (`hotel_hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `guests`
--
ALTER TABLE `guests`
  ADD CONSTRAINT `guests_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `fk_hotel_star_ratings1` FOREIGN KEY (`star_ratings_star_rating`) REFERENCES `star_ratings` (`star_rating`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_rooms_hotel1` FOREIGN KEY (`hotel_hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rooms_rooms_type1` FOREIGN KEY (`rooms_type_rooms_type_id`) REFERENCES `room_type` (`room_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rooms_booked`
--
ALTER TABLE `rooms_booked`
  ADD CONSTRAINT `fk_rooms_booked_bookings1` FOREIGN KEY (`bookings_booking_id`) REFERENCES `bookings` (`booking_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rooms_booked_rooms1` FOREIGN KEY (`rooms_room_id`) REFERENCES `rooms` (`room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
