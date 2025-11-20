-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2025 at 01:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(3, 'kavyaa', 'kavya123@gmail.com', '$2y$10$7oCZd2VnZPLhgBv14VIUCuTIfBEWOf/OO9y8w.c/l6SLSVvJO0PQ.', '2025-07-11 14:08:10'),
(5, 'dayanand mahto', 'dayanandmahto026@gmail.com', '$2y$10$IdnJXtenOzUV7JnoCVCT0eupRjjBduLerkk5PDwbjcdA1NT7rpFGS', '2025-07-12 04:35:24'),
(6, 'AYUSH', 'pushparajfire55@gmail.com', '$2y$10$1fwNAUIMQoumUJqvi.hQ.e4fOP9J.0NUFSQH0rrRzkDwQSyRugYAm', '2025-07-12 04:39:39'),
(7, 'harshk kr', 'harshkr07@gmail.com', '$2y$10$oM0udoZulF4BmRjAIqqZJ.tvMXskSaIaqRUPuAIlV6ezzvB.BQ3nu', '2025-07-12 05:52:04'),
(8, 'ravi kumar sahu', 'ravi45@gmail.com', '$2y$10$HL9CCERzthGeNTlXthz5YOA4Q/z7mCOQAnuYG8f29OVBJ08CDUw3G', '2025-07-12 06:08:05'),
(9, 'Ranjeet kumar verma', 'ranjeetkr661@gmail.com', '$2y$10$ZpTUxanYgELNQUlflJRtA.0OfHLcqjgNf03BvCNwaAGpITjaueAZi', '2025-07-12 07:15:38'),
(10, 'Harsh Singh', 'harsh213@gmail.com', '$2y$10$XNOEc7qR6bAW8CmtZS5VQemeySV/DfumZ0xo3n9MeLGZOBvoBD3NW', '2025-07-12 11:12:28');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
