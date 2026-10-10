-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2026 at 02:29 PM
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
-- Database: `account_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Juan Dela Cruz', 'juan@email.com', '09171234567', '2026-09-18 19:47:17'),
(2, 'Maria Libera', 'maria@email.com', '09181234567', '2026-09-18 19:47:17'),
(3, 'Pedro Santos', 'pedro@email.com', '09191234567', '2026-09-18 19:47:17'),
(4, 'Ana Hapon', 'ana@email.com', '09201234567', '2026-09-18 19:47:17'),
(5, 'Carlo Mendoza', 'carlo@email.com', '09211234567', '2026-09-18 19:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `avatar`, `created_at`) VALUES
(1, 'admin', '$2y$10$QwMoIImHECf8wrmAJWEE/OM5vrUadw0VRQdxyozBoskrrinzNJeZ6', 'John Administrator', 'thumb_1791171970_50d5ef1b35cf034a3c44.png', '2026-09-18 19:47:17'),
(2, 'cashier1', '$2y$10$GOqm18iHVp2gtr6kYbiXkOah4mDaLla496N1zt1FmL6oR2.0yykf.', 'Sarah Cruz', '', '2026-09-18 19:47:17'),
(3, 'cashier2', '$2y$10$S5AMHpn3qyLMJbaKOC0ApeliWNruiHzfn7e49nC5v8d6jATBO921.', 'Mark Santos', '', '2026-09-18 19:47:17'),
(4, 'staff1', '$2y$10$KguA1eCtujsEARfGY54/YeNKaBFS/3fu6VayBjsIbXz.zeE/dUyba', 'Jenny Reyes', '', '2026-09-18 19:47:17'),
(5, 'manager1', '$2y$10$6POeISu5T1FQeaBM8ajNFOGBiIePhScR8rZRTevWpfaHjlxCzrHSS', 'Robert Lim', '', '2026-09-18 19:47:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
