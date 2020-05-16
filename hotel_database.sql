-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 12:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

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
  `guest_email` varchar(45) DEFAULT NULL,
  `hotel_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `guest_pass` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`guest_id`, `guest_first_name`, `guest_last_name`, `guest_email`, `hotel_id`, `username`, `guest_pass`) VALUES
(1, 'emri', 'mbiemri', 'ennis.k@live.com', 1, 'ewf', '$2y$10$DBDJ7MJb9xN/0LxEcdihNeyvM4vMofX6nqcZ7KgKK7MCUdIVas1iu'),
(2, 'emri', 'mbiemri', 'kewod!@kfwd.com', 1, '21', '$2y$10$K1b0KC24bEt0wa4/Hsh.8uOr7ggV.wzOUnzOtp/X8BQkeGuCujth6'),
(3, 'emri', 'mbiemri', 'r@gmail.com', 1, '31w', '$2y$10$/04dymZzxsFLkXeygXpjGeS8uOvYVXxBumtrTW.ENCBQ3ghYjwDcW');

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
  `check_in_time` time DEFAULT NULL,
  `check_out_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='		';

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `hotel_contact_number`, `hotel_email_address`, `hotel_description`, `hotel_floor_count`, `check_in_time`, `check_out_time`) VALUES
(1, 'Hotel Tekniku i leshit', NULL, 'fefwef@rkjwe.com', NULL, NULL, NULL, NULL);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `fk_bookings_hotel1_idx` (`hotel_hotel_id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`guest_id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `fk_rooms_rooms_type1_idx` (`rooms_type_rooms_type_id`),
  ADD KEY `fk_rooms_hotel1_idx` (`hotel_hotel_id`);

--
-- Indexes for table `rooms_booked`
--
ALTER TABLE `rooms_booked`
  ADD PRIMARY KEY (`rooms_booked_id`),
  ADD KEY `fk_rooms_booked_bookings1_idx` (`bookings_booking_id`),
  ADD KEY `fk_rooms_booked_rooms1_idx` (`rooms_room_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms_booked`
--
ALTER TABLE `rooms_booked`
  MODIFY `rooms_booked_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_bookings_hotel1` FOREIGN KEY (`hotel_hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `guests`
--
ALTER TABLE `guests`
  ADD CONSTRAINT `guests_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`hotel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
