-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2020 at 12:57 PM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `admin_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `admin_name`, `password`, `email`, `contact_no`, `address`, `admin_created_at`) VALUES
(2, 'Jahid IPTSP', 'e10adc3949ba59abbe56e057f20f883e', 'jahid@gmail.com', '01752365544', 'Uttara', '0000-00-00 00:00:00'),
(3, 'Tanim IPTSP', 'e10adc3949ba59abbe56e057f20f883e', 'tanim@gmail.com', '01752365777', 'Badda', '0000-00-00 00:00:00'),
(4, 'Mosfeck IPTSP', 'e10adc3949ba59abbe56e057f20f883e', 'mosfeckbd@gmail.com', '01720007487', 'Uttara', '2020-11-28 07:55:33'),
(5, 'Raj IPTSP', 'e10adc3949ba59abbe56e057f20f883e', 'raj@gmail.com', '01752365544', 'Dhanmondi', '2020-11-28 07:55:33'),
(6, 'Babu IPTSP', 'e10adc3949ba59abbe56e057f20f883e', 'babu@gmail.com', '01233333333', 'Zigatola', '2020-12-13 09:08:28'),
(7, 'Sahadat IPTSP', 'e10adc3949ba59abbe56e057f20f883e', 'sahadat@gmail.com', '01254444444', 'Beraid', '2020-12-13 09:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `id` int NOT NULL,
  `uname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`id`, `uname`, `email`, `mobile`, `message`) VALUES
(3, 'Mosfeck', 'mosfeck@gmail.com', 1720007487, 'Testing'),
(4, 'Jahid', 'jahid@gmail.com', 1711222334, 'Test 2'),
(5, 'Tanim', 'tanim@gmail.com', 1671123456, 'Test 3'),
(6, 'Sahadat', 'sahadat@gmail.com', 1720007487, 'Test 2'),
(7, 'Uday', 'uday@gmail.com', 1720007487, 'Test 3');

-- --------------------------------------------------------

--
-- Table structure for table `login_activity`
--

CREATE TABLE `login_activity` (
  `id` int NOT NULL,
  `uniid` varchar(32) NOT NULL,
  `agent` varchar(100) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_activity`
--

INSERT INTO `login_activity` (`id`, `uniid`, `agent`, `ip`, `login_time`, `logout_time`) VALUES
(1, '81ce5c28bbf347be4f144bf9bba3bd05', 'Chrome', '::1', '2020-12-20 11:08:33', '0000-00-00 00:00:00'),
(2, '81ce5c28bbf347be4f144bf9bba3bd05', 'Chrome', '::1', '2020-12-20 11:17:56', '2020-12-20 11:30:08'),
(3, '81ce5c28bbf347be4f144bf9bba3bd05', 'Chrome', '::1', '2020-12-20 11:30:14', '2020-12-20 11:30:59'),
(4, '81ce5c28bbf347be4f144bf9bba3bd05', 'Chrome', '::1', '2020-12-20 11:33:45', '2020-12-21 12:49:26'),
(5, '81ce5c28bbf347be4f144bf9bba3bd05', 'Chrome', '::1', '2020-12-21 12:49:34', '2020-12-21 04:21:03'),
(6, '81ce5c28bbf347be4f144bf9bba3bd05', 'Chrome', '::1', '2020-12-21 04:21:10', '2020-12-21 04:46:03'),
(7, '981fda8dcf3a90493243771e93eb2701', 'Chrome', '::1', '2020-12-21 04:46:17', '2020-12-21 06:08:06'),
(8, '81ce5c28bbf347be4f144bf9bba3bd05', 'Chrome', '::1', '2020-12-21 06:08:12', '2020-12-21 06:20:26'),
(9, '981fda8dcf3a90493243771e93eb2701', 'Chrome', '::1', '2020-12-21 06:20:42', '2020-12-21 06:42:34'),
(10, '81ce5c28bbf347be4f144bf9bba3bd05', 'Chrome', '::1', '2020-12-21 06:42:40', '0000-00-00 00:00:00'),
(11, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-27 03:52:08', '2020-12-27 04:26:18'),
(12, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-27 04:29:54', '0000-00-00 00:00:00'),
(13, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-27 04:31:36', '2020-12-27 04:33:16'),
(14, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-27 04:38:01', '0000-00-00 00:00:00'),
(15, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-27 04:41:29', '2020-12-27 05:01:49'),
(16, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-27 05:05:41', '2020-12-27 05:06:54'),
(17, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-27 05:10:38', '2020-12-27 05:39:35'),
(18, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-27 06:47:17', '0000-00-00 00:00:00'),
(19, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-27 10:27:00', '2020-12-27 10:28:59'),
(20, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-27 10:29:08', '2020-12-27 10:30:38'),
(21, '981fda8dcf3a90493243771e93eb2701', 'Firefox', '127.0.0.1', '2020-12-27 10:30:53', '2020-12-28 02:31:12'),
(22, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-28 02:31:47', '2020-12-28 02:32:15'),
(23, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-28 02:37:15', '2020-12-28 02:47:34'),
(24, '981fda8dcf3a90493243771e93eb2701', 'Firefox', '127.0.0.1', '2020-12-28 02:47:50', '2020-12-28 02:59:22'),
(25, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-28 10:10:48', '2020-12-28 10:11:35'),
(26, '981fda8dcf3a90493243771e93eb2701', 'Firefox', '127.0.0.1', '2020-12-28 10:11:44', '2020-12-28 10:15:38'),
(27, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-28 10:15:45', '2020-12-28 10:40:28'),
(28, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-29 12:00:33', '2020-12-29 12:16:14'),
(29, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-29 12:02:27', '2020-12-29 12:38:42'),
(30, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-29 12:16:20', '0000-00-00 00:00:00'),
(31, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-29 01:42:10', '2020-12-29 01:42:22'),
(32, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-29 01:51:25', '2020-12-29 04:02:40'),
(33, '81ce5c28bbf347be4f144bf9bba3bd05', 'Firefox', '127.0.0.1', '2020-12-29 04:02:49', '2020-12-29 04:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'inactive',
  `uniid` varchar(50) NOT NULL,
  `activation_date` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pass`, `mobile`, `profile_pic`, `created_at`, `status`, `uniid`, `activation_date`, `updated_at`) VALUES
(16, 'Mosfeck', 'mosfeck@office.bdcom.com', '$2y$10$U2AxG3tnFSPdlwExV4qBW.KC8H3raKf8oV3WPsuqqPT9bRXesaVT6', '01720007487', 'http://localhost/Gophp/gophp-29-dec-2020/public/profiles/pp_1.jpg', '2020-12-17 15:23:07', 'active', '81ce5c28bbf347be4f144bf9bba3bd05', '2020-12-17 03:23:07', '2020-12-29 13:33:02'),
(17, 'Mosfeck', 'mosfeck@office.bdcom.com', '$2y$10$P3w28tHk/dO83NxazbRV/.x4uDXOQ1eNw1rHSQrmpMqgxEaRJDnX6', '01720007487', '', '2020-12-17 15:27:12', 'active', '289b8e85d4e629f89e4cf69becaea080', '2020-12-17 03:27:12', '2020-12-28 15:50:32'),
(18, 'Jahid', 'jahid@office.bdcom.com', '$2y$10$xZ3a5AImJotMOC7BIh0OP.ayhmkrfdE1wgVlFSOQcuDRSrjGtzps2', '01720007487', 'http://localhost/Gophp/gophp-29-dec-2020/public/profiles/Raj_1.jpg', '2020-12-17 15:39:58', 'active', '981fda8dcf3a90493243771e93eb2701', '2020-12-17 03:39:58', '2020-12-28 15:50:32'),
(19, 'Sojib', 'mosfeck@office.bdcom.com', '$2y$10$qAsB.V8hITMbKUwd1GfZa.Y8rRSjqnLBfAQhsWq9xuAOM5DdoXQZu', '01720007487', '', '2020-12-28 14:04:40', 'inactive', '7609747e63581ac59087f38102ef11b6', '2020-12-28 02:04:40', '2020-12-28 15:50:32'),
(20, 'Anis', 'mosfeck@office.bdcom.com', '$2y$10$6yrz.gVCjah/2hLMTgxlB.RjyhaCGG/7QDxRvb2qDcYavJRPnnJBm', '01720007487', '', '2020-12-28 14:09:20', 'inactive', '784b982fcd57f6cf37374d7c057c1788', '2020-12-28 02:09:20', '2020-12-28 15:50:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_activity`
--
ALTER TABLE `login_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_activity`
--
ALTER TABLE `login_activity`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
