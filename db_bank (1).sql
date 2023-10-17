-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 03:43 PM
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
-- Database: `db_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `account_id` int(3) NOT NULL,
  `account_name` varchar(50) DEFAULT NULL,
  `balance` decimal(10,0) DEFAULT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `password` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`account_id`, `account_name`, `balance`, `account_type`, `password`) VALUES
(1, 'Jonalyn Maramag', '110', 'Savings and Checking Account', 'jona201012345678'),
(2, 'Shella Marie Gazmen', '105', 'Savings and Checking Account', 'shella1235463758'),
(3, 'Krisha Mae Dalire', '10', 'Savings and Checking Account', 'krisha2342345645'),
(4, 'Reymark Malanot', '5', 'Savings and Checking Account', 'reymark897123456'),
(5, 'Michelle Cabarles', '23', 'Savings and Checking Account', 'mich345612345678'),
(6, 'Nhapple', '1000', 'savings account', 'nhap123'),
(7, 'Nhapple', '1135', 'savings account', 'nhap123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `account_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
