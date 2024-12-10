-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 11:55 AM
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
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(18, '3X SAMEER', '3xsameer@gmail.com', '2024-11-13 10:26:05', '$2y$12$nSqlnEvHrt9fomTgBmbn6.kQC2QevgFvr3MGiaRbjM7m5/yWTOvAu', NULL, '2024-11-13 10:26:05', '2024-11-13 10:26:05', 1),
(19, 'M Asim', 'masim@gmail.com', '2024-11-13 10:33:37', '$2y$12$K75oK6H0QSwyX6LeULkpleYmB0NiFNM5/FP/vyMzQfeLO4Yip3EW2', NULL, '2024-11-13 10:33:37', '2024-11-13 10:33:37', 2),
(20, 'Usman Raja', 'usmanraja@gmail.com', '2024-11-13 10:36:38', '$2y$12$WZ1P8nwODefNZJ/hXUbGyezV0lgieawwxjOPQ3gQiViU6q/E6BLJy', NULL, '2024-11-13 10:36:38', '2024-11-13 10:36:38', 2),
(21, 'Akash Bajwa', 'akashbajwa@gmail.com', '2024-11-13 10:39:43', '$2y$12$9NDnmjsRRB4dwKDlD.S57.e3h0zrPUuchyktRm96GMB.IS6xQnmDC', NULL, '2024-11-13 10:39:43', '2024-11-13 10:39:43', 2),
(22, 'jksdf', 'jabara9868@gianes.com', '2024-11-14 14:06:19', '$2y$12$FqFGpjC4VEIoxZIxU2OXyOya9CR4ebMjhmxC/lkFT7WbTOrBQI7nW', NULL, '2024-11-14 14:05:55', '2024-11-14 14:06:19', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
