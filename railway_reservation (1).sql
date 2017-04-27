-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2016 at 09:07 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `railway_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE IF NOT EXISTS `admin_table` (
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`user_name`, `password`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE IF NOT EXISTS `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `train_id` int(11) NOT NULL,
  `stop_number` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `arrival_time` time NOT NULL,
  `departure_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `train_id`, `stop_number`, `station_id`, `arrival_time`, `departure_time`) VALUES
(2, 45, 2, 2, '02:45:30', '08:12:45'),
(3, 1000, 100, 200, '00:00:06', '00:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `staion_id` int(11) NOT NULL,
  `station_name` varchar(30) NOT NULL,
  PRIMARY KEY (`staion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `pnr` int(11) NOT NULL AUTO_INCREMENT,
  `passenger_name` varchar(255) NOT NULL,
  `train_id` int(11) NOT NULL,
  `no_of_seats` int(11) NOT NULL,
  `train_status` varchar(100) NOT NULL,
  `booking_date` datetime NOT NULL,
  PRIMARY KEY (`pnr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2147483647 ;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`pnr`, `passenger_name`, `train_id`, `no_of_seats`, `train_status`, `booking_date`) VALUES
(2147483647, 'nazmul', 45, 2, 'confirm', '2016-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE IF NOT EXISTS `trains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `train_id` int(11) NOT NULL,
  `train_name` varchar(255) NOT NULL,
  `train_type` varchar(255) NOT NULL,
  `source_stn` varchar(255) NOT NULL,
  `destination_stn` varchar(255) NOT NULL,
  `source_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `train_id`, `train_name`, `train_type`, `source_stn`, `destination_stn`, `source_id`, `destination_id`) VALUES
(2, 45, 'jamuna', 'regular', 'noakhali', 'dhaka', 500, 600);

-- --------------------------------------------------------

--
-- Table structure for table `train_status`
--

CREATE TABLE IF NOT EXISTS `train_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `train_id` int(11) NOT NULL,
  `available_date` date NOT NULL,
  `booked_seats` int(11) NOT NULL,
  `available_seats` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `train_status`
--

INSERT INTO `train_status` (`id`, `train_id`, `available_date`, `booked_seats`, `available_seats`) VALUES
(5, 45, '2016-04-01', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `EmailID` varchar(30) NOT NULL,
  `Password` int(11) NOT NULL,
  `Full Name` text NOT NULL,
  `Gender` text NOT NULL,
  `Age` int(11) NOT NULL,
  `Mobile` int(11) NOT NULL,
  `City` text NOT NULL,
  `State` text NOT NULL,
  PRIMARY KEY (`EmailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`EmailID`, `Password`, `Full Name`, `Gender`, `Age`, `Mobile`, `City`, `State`) VALUES
('asif.cstean@gmail.com', 1234, 'Asif', 'male', 22, 1924656681, 'Chittagomg', 'noakhali');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE IF NOT EXISTS `user_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `email_id`, `password`, `fullname`, `gender`, `age`, `mobile`, `city`, `state`) VALUES
(6, 'raju@gmai.com', '1', 'a', 'a', 4, 1823387518, 'Noakhali', 'noakhali'),
(7, 'haji@gmail.com', '1234', 'abc', 'a', 21, 1823387518, 's', 'noakhali'),
(8, 'abc@gmail.com', '1', 'a', 'male', 21, 1823387518, 'Noakhali', 'noakhali'),
(9, 'tuser@gmail.com', 'tusher', 'a', 'male', 21, 1823387518, 'Noakhali', 'noakhali'),
(10, 'asif@gmail.com', 'asif', 'asif', 'female', 21, 2562325, 'noakhali', 'noakhali'),
(11, 'abc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'asd', 'asdf', 21, 1823387518, 'Noakhali', 'noakhali');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
