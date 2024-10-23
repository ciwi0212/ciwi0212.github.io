-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 02:37 PM
-- Server version: 8.0.39
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_user`
--
CREATE DATABASE IF NOT EXISTS `db_user` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_user`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` tinyint NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `age` tinyint NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `age`, `email`, `password`, `picture`, `role`) VALUES
(6, 'zia', 'nugraha', 30, 'celliaauzianugraha@gmail.com', '$2y$10$Tmvo1iXvYY25FL6jKaxNPekqRXip5.1xZcR6F26jRlcRbXSsdAHu2', '24.10.15 17.27.50..jpg', ''),
(11, 'kim', 'hongjoong', 100, 'bighit@gmail.com', '$2y$10$.xAbM9q743omnP.Lgm5WI.ELfeLLIln6w4G24RYC0EuKYoQCF9hM2', '', ''),
(12, 'park', 'seonghwa', 10, 'kqentertaiment@gmail.com', '$2y$10$iCzQPL/IaO2PkSnm2PgwCuTj7KK1NwkyagXFuEZkbIS/EjGUJxJ9K', '', ''),
(13, 'nicholas', 'saputra', 20, 'sembarang@gmail.com', '$2y$10$lQn6QscQ6sZYoAOt0fY9WeTGT/.XptYxeaIBYcMV/VyWmdNXW2bmS', '', ''),
(14, 'song', 'mingi', 30, 'duarduar@gmail.com', '$2y$10$zdUchPeV9jwibXiLsnM4DO0mvASet80EW2Drm2Kr/WYc2Qh4CgyPS', '', ''),
(21, 'indi', 'cahyani', 19, 'oktariaindi@gmail.com', '$2y$10$bE8P7V6xq6Agtjk1mmJH8e/.jLH8Fb/ZHH9fkW/myqWOmk23Ms7dq', '24.10.23 05.20.58..jpg', 'Admin'),
(22, 'yang', 'jungwon', 24, 'beliftlab@gmail.com', '$2y$10$SwR1xcD8l2pK94WNccwgrupZYScErllkLOeZ392V8PQAPBknAvl4e', '24.10.23 09.11.17..jpg', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
