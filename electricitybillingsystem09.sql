-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 11:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electricitybillingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `consumption` int(11) DEFAULT NULL,
  `bill_amount` decimal(10,2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `user_id`, `consumption`, `bill_amount`, `date`) VALUES
(1, 8, 20, 200.00, '2024-12-06 05:26:57'),
(2, 8, 60, 600.00, '2024-12-06 05:27:24'),
(3, 8, 200, 3200.00, '2024-12-07 15:22:22'),
(4, 8, 90, 900.00, '2024-12-07 15:22:31'),
(5, 8, 91, 920.00, '2024-12-07 15:43:00'),
(6, 8, 20, 200.00, '2024-12-07 16:29:56'),
(7, 8, 60, 600.00, '2024-12-08 06:30:22'),
(8, 8, 90, 900.00, '2024-12-08 06:31:37'),
(9, 13, 150, 2100.00, '2024-12-12 09:44:58'),
(10, 8, 600, 15200.00, '2024-12-13 00:59:20'),
(11, 8, 250, 4700.00, '2025-01-28 23:20:50'),
(12, 8, 250, 4700.00, '2025-01-28 23:23:36'),
(13, 8, 250, 4700.00, '2025-01-28 23:25:03'),
(14, 8, 120, 1500.00, '2025-02-25 12:12:51'),
(15, 8, 30, 300.00, '2025-02-25 15:31:48'),
(16, 8, 85, 850.00, '2025-02-25 15:39:46'),
(17, 8, 150, 2100.00, '2025-02-25 15:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(8, 'eeren', 'eeren@gmail.com', '$2y$10$0JHbWPlOag8EkcirYeBOp.nWKSfq6vaDX.MaBtXUdwsLG.Xf04iJC'),
(9, 'Gayan', 'gayan@gmail.com', '$2y$10$eo1AbBWKXu6/F3C.lUseZeoD8.JckKiDxBgDP9hQasf2wrJ72ZnaW'),
(10, 'Dulan', 'dulan@gmail.com', '$2y$10$kZ3QR7wkMcqZx0G0IyHjA.qudTTUvSdtL/u8qJMopU4KlHXkbxyNe'),
(11, 'Gajan', 'gajan@gmail.com', '$2y$10$xe4hIB7.mMSraEdpAKjAW.QWYyilSiVPMepFz4AMUGtwrlrmrAV4W'),
(12, 'Manjari', 'manji@gmail.com', '$2y$10$GVyj9bGziP7/bJyYTmTELuuiALpXgQ/TmLWMWTbL.smMsC0zpv5Zu'),
(13, 'Manodya', 'manodya@gmail.com', '$2y$10$.yrbpPXecmz6W.117iqL4OmtKHdSor3dAI.5jSqpCksZOpQSTAAYu'),
(15, 'ihshan', 'ihshan@gmail.com', '$2y$10$wWiJMHx6C87le8rBN9N0veSZCnJXoCYpMDOS0UMFgo8LX6u2pxDxa'),
(16, 'Tom', 'tom@gmail.com', '$2y$10$E5VnN/JR6ATT0LgLtvyIauVXMqoAKaTfUK2g7V8hvM/bUNkKfYzB2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
