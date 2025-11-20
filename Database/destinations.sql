-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2025 at 04:26 PM
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
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `image`, `description`) VALUES
(1, 'Santorini, Greece', 'https://plus.unsplash.com/premium_photo-1661964149725-fbf14eabd38c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Explore Santorini, Greece, where white-washed villages, blue-domed churches, and dramatic cliffs overlook the sparkling Aegean Sea. This iconic island invites you to explore its volcanic beaches, romantic sunsets, and charming streets filled with culture, flavor, and unforgettable beauty.'),
(2, 'Kyoto, Japan', 'https://images.unsplash.com/photo-1738814781430-089d4847b81c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Explore Kyoto, Japan, a timeless city where ancient temples, peaceful gardens, and traditional wooden streets create an atmosphere of pure serenity. Discover the beauty of cherry blossoms, sacred shrines, and rich cultural heritage as you wander through this historic heart of Japan.'),
(3, 'Maldives', 'https://images.unsplash.com/photo-1467377791767-c929b5dc9a23?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Stay in the Maldives, where crystal-clear waters, overwater villas, and pristine white-sand beaches create the perfect tropical escape. Enjoy vibrant marine life, serene sunsets, and luxurious experiences that make every moment unforgettable in this island paradise.'),
(4, 'Paris,France', 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?q=80&w=1173&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Visit Paris, France, a city of romance and timeless elegance where iconic landmarks, charming cafés, and world-class art fill every corner. Wander through its historic streets, savor exquisite cuisine, and experience the unforgettable magic of the City of Light.'),
(5, 'Banff, Canada', 'https://plus.unsplash.com/premium_photo-1734414542229-0932b3cb4431?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Witness Banff, Canada, a breathtaking mountain paradise where turquoise lakes, rugged peaks, and endless forests create a scene straight out of a postcard. Immerse yourself in its natural beauty, wildlife, and outdoor adventures that make every moment truly unforgettable.\r\n'),
(6, 'Munnar, India', 'https://plus.unsplash.com/premium_photo-1697730314165-2cd71dc3a6a4?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Relax in Munnar, India, where rolling tea plantations, mist-covered hills, and cool mountain air create a peaceful escape from the busy world. Enjoy serene landscapes, lush greenery, and tranquil viewpoints that make this hill station a perfect retreat.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
