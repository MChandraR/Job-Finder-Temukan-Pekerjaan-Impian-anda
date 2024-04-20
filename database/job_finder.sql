-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 06:09 PM
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
-- Database: `job_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` varchar(10) NOT NULL,
  `job_name` varchar(150) DEFAULT NULL,
  `employer_id` varchar(10) DEFAULT NULL,
  `job_type_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `begin` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_name`, `employer_id`, `job_type_id`, `description`, `begin`, `end`) VALUES
('J000000001', 'Web Developer with CI', 'U000000001', 1, 'Minimal punya laptop', '2024-04-14 00:00:00', '2024-05-13 00:00:00'),
('J000000002', 'Web Developer with Laravel', 'U000000001', 1, 'Minimal punya laptop', '2024-04-14 00:00:00', '2024-05-13 00:00:00'),
('J000000003', 'Mobile Developer : Android', 'U000000001', 1, 'Minimal punya laptop', '2024-04-14 00:00:00', '2024-05-13 00:00:00'),
('J000000004', 'Mobile Developer : Flutter', 'U000000001', 1, 'Minimal punya laptop', '2024-04-14 00:00:00', '2024-05-13 00:00:00'),
('U000000011', 'Dev.OPS', 'U000000001', 1, 'Kerja yang betul', '2024-04-24 00:00:00', '2024-04-25 00:00:00'),
('U000000012', '123', 'U000000001', 1, 'Kerja yang betul', '2024-04-11 00:00:00', '2024-04-26 00:00:00'),
('U000000013', 'Dev.OPS', 'U000000001', 1, 'Kerja yang betul', '2024-04-10 00:00:00', '2024-04-26 00:00:00'),
('U000000014', 'It Solution', 'U000000001', 1, 'Kerja yang betul', '2024-04-17 00:00:00', '2024-04-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `job_appeal`
--

CREATE TABLE `job_appeal` (
  `appeal_id` varchar(10) NOT NULL,
  `job_id` varchar(10) DEFAULT NULL,
  `applicant_id` varchar(10) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) DEFAULT NULL,
  `type_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`type_id`, `type_name`, `type_description`) VALUES
(1, 'SOFTWARE DEVELOPER', 'Itu aja');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `context` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`) VALUES
('U000000001', 'users', 'users', 'users@gmail.com', 'user'),
('U000000002', 'users', 'users', 'users@gmail.com', 'user'),
('U000000003', '123', '123', 'mcrcool04@gmail.com', 'user'),
('U000000004', 'user', 'user', 'users', 'user'),
('U000000005', 'user', 'user', 'users', 'user'),
('U000000006', 'mcr', '123', 'mcrcool04@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_appeal`
--
ALTER TABLE `job_appeal`
  ADD PRIMARY KEY (`appeal_id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
