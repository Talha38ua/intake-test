-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2019 at 06:38 AM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intake`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
                       `id` int(10) UNSIGNED NOT NULL,
                       `customer_id` int(11) NOT NULL,
                       `brand` varchar(30) NOT NULL,
                       `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `customer_id`, `brand`, `type`) VALUES
(1, 1, 'Peugeot', '206'),
(2, 1, 'Audi', 'A4'),
(3, 2, 'VW', 'Golf'),
(4, 3, 'VW', 'Golf'),
(5, 3, 'Seat', 'Ibiza'),
(6, 4, 'Mercedes', 'E-klasse'),
(7, 4, 'Mazda', 'MX-5');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
                            `id` int(10) UNSIGNED NOT NULL,
                            `first_name` varchar(30) NOT NULL,
                            `last_name` varchar(30) NOT NULL,
                            `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `age`) VALUES
(1, 'Jaap', 'Jansen', 24),
(2, 'Bert', 'Smit', 34),
(3, 'Annie', 'de Boer', 31),
(4, 'Gert', 'Van der Berg', 65);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
                        `id` int(10) UNSIGNED NOT NULL,
                        `car_id` int(11) NOT NULL,
                        `task` varchar(255) NOT NULL,
                        `status` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `car_id`, `task`, `status`) VALUES
(1, 3, 'Olie vervangen', 2),
(2, 3, 'Deuken wegwerken', 0),
(3, 1, 'Airco fixen', 1),
(4, 2, 'APK', 1),
(5, 2, 'APK', 3),
(6, 7, 'Oliefilter vervangen', 0),
(7, 5, 'lamp vervangen', 0),
(8, 5, 'Banden vervangen', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `id` int(11) NOT NULL,
                        `login` varchar(45) NOT NULL,
                        `password` varchar(45) NOT NULL,
                        `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `last_login`) VALUES
(2, 'jan', '68f6002f53c0f1d5fa2e6648961af6fb', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;