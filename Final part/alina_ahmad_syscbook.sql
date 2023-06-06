CREATE DATABASE IF NOT EXISTS alina_ahmad_syscbook;
USE alina_ahmad_syscbook;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 05:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alina_ahmad_syscbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_address`
--

CREATE TABLE `users_address` (
  `student_ID` int(10) UNSIGNED NOT NULL,
  `street_number` int(5) DEFAULT NULL,
  `street_name` varchar(150) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `province` char(2) DEFAULT NULL,
  `postal_code` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_address`
--

INSERT INTO `users_address` (`student_ID`, `street_number`, `street_name`, `city`, `province`, `postal_code`) VALUES
(1, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_avatar`
--

CREATE TABLE `users_avatar` (
  `student_ID` int(10) UNSIGNED NOT NULL,
  `avatar` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_avatar`
--

INSERT INTO `users_avatar` (`student_ID`, `avatar`) VALUES
(1, NULL),
(2, NULL),
(3, NULL),
(4, NULL),
(5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `student_ID` int(10) UNSIGNED NOT NULL,
  `student_email` varchar(150) DEFAULT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `DOB` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`student_ID`, `student_email`, `first_name`, `last_name`, `DOB`) VALUES
(1, 'alinaahmad236@gmail.com', 'Alina', 'Ahmad', '2023-04-27'),
(2, 'alinaahmad236@gmail.com', 'Alina', 'Ahmad', '2023-04-05'),
(3, 'alinaahmad236@gmail.com', 'hamza', 'Ahmad', '2023-04-05'),
(4, 'alinaahmad236@gmail.com', 'Alina', 'Ahmad', '2023-04-26'),
(5, 'alinaahmad236@gmail.com', 'hamza', 'Ahmad', '2001-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `users_passwords`
--

CREATE TABLE `users_passwords` (
  `student_ID` int(10) UNSIGNED NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

CREATE TABLE `users_permissions` (
  `student_ID` int(10) UNSIGNED NOT NULL,
  `account_type` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_posts`
--

CREATE TABLE `users_posts` (
  `post_ID` int(10) UNSIGNED NOT NULL,
  `student_ID` int(10) UNSIGNED DEFAULT NULL,
  `new_post` text DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_program`
--

CREATE TABLE `users_program` (
  `student_ID` int(10) UNSIGNED NOT NULL,
  `Program` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_program`
--

INSERT INTO `users_program` (`student_ID`, `Program`) VALUES
(1, 'CSE'),
(2, 'CSE'),
(3, 'EE'),
(4, 'CSE'),
(5, 'BE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`student_ID`);

--
-- Indexes for table `users_avatar`
--
ALTER TABLE `users_avatar`
  ADD PRIMARY KEY (`student_ID`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`student_ID`);

--
-- Indexes for table `users_passwords`
--
ALTER TABLE `users_passwords`
  ADD PRIMARY KEY (`student_ID`);

--
-- Indexes for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD PRIMARY KEY (`student_ID`);

--
-- Indexes for table `users_posts`
--
ALTER TABLE `users_posts`
  ADD PRIMARY KEY (`post_ID`),
  ADD KEY `student_ID` (`student_ID`);

--
-- Indexes for table `users_program`
--
ALTER TABLE `users_program`
  ADD PRIMARY KEY (`student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `student_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_posts`
--
ALTER TABLE `users_posts`
  MODIFY `post_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_address`
--
ALTER TABLE `users_address`
  ADD CONSTRAINT `users_address_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);

--
-- Constraints for table `users_avatar`
--
ALTER TABLE `users_avatar`
  ADD CONSTRAINT `users_avatar_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);

--
-- Constraints for table `users_passwords`
--
ALTER TABLE `users_passwords`
  ADD CONSTRAINT `users_passwords_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);

--
-- Constraints for table `users_permissions`
--
ALTER TABLE `users_permissions`
  ADD CONSTRAINT `users_permissions_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);

--
-- Constraints for table `users_posts`
--
ALTER TABLE `users_posts`
  ADD CONSTRAINT `users_posts_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);

--
-- Constraints for table `users_program`
--
ALTER TABLE `users_program`
  ADD CONSTRAINT `users_program_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `users_info` (`student_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
