-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 11:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ittask2`
--
CREATE DATABASE IF NOT EXISTS `ittask2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ittask2`;

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE IF NOT EXISTS `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', '1360f9e547810fd3c6a14c4bcccf2dff', '2023-10-21 01:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE IF NOT EXISTS `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Super User'),
(2, 'Guest', 'Common User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE IF NOT EXISTS `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `id_group_users` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_group_users`),
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id_group_users`, `group_id`, `user_id`) VALUES
(1, 1, 1),
(16, 1, 2),
(17, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=347 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 03:47:53', 0),
(2, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 03:48:23', 1),
(3, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 03:52:57', 1),
(4, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 03:57:47', 1),
(5, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 04:01:08', 1),
(6, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 04:04:08', 1),
(7, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 04:09:17', 1),
(8, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 04:12:42', 1),
(9, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-10-20 04:16:24', 0),
(10, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-10-20 04:17:37', 1),
(11, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 04:28:15', 1),
(12, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-10-20 04:35:45', 1),
(13, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 04:43:03', 1),
(14, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-10-20 05:39:17', 1),
(15, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-10-20 05:40:07', 1),
(16, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 05:41:57', 1),
(17, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 05:53:52', 1),
(18, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 06:05:14', 1),
(19, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-10-20 06:07:35', 1),
(20, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-10-20 06:08:40', 1),
(21, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 06:12:12', 1),
(22, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 06:15:56', 1),
(23, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 06:57:58', 1),
(24, '192.168.175.227', 'zulfy@ijtt-id.com', NULL, '2023-10-20 06:58:42', 0),
(25, '192.168.175.227', 'dwicahyono374@gmail.com', NULL, '2023-10-20 07:11:03', 0),
(26, '192.168.175.227', 'dwicahyono374@gmail.com', NULL, '2023-10-20 07:11:51', 0),
(27, '192.168.175.227', 'dwicahyono374@gmail.com', NULL, '2023-10-20 07:12:19', 0),
(28, '192.168.175.227', 'dwicahyono374@gmail.com', NULL, '2023-10-20 07:13:14', 0),
(29, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', NULL, '2023-10-20 07:13:26', 0),
(30, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 07:13:48', 1),
(31, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', NULL, '2023-10-20 07:14:14', 0),
(32, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 07:18:03', 1),
(33, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-10-20 08:38:54', 1),
(34, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 08:44:01', 1),
(35, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-10-20 08:44:15', 1),
(36, '192.168.175.227', 'ayurahayu@gmail.com', 5, '2023-10-20 08:52:06', 1),
(37, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-20 09:02:06', 1),
(38, '192.168.175.227', 'ayurahayu@gmail.com', 5, '2023-10-20 09:03:59', 1),
(39, '192.168.175.227', 'ayurahayu@gmail.com', 5, '2023-10-21 01:44:55', 1),
(40, '::1', 'dwicahyono374@gmail.com', 9, '2023-10-21 01:59:26', 1),
(41, '192.168.175.227', 'dwicahyono374@gmail.com', 10, '2023-10-21 02:02:29', 0),
(42, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-21 02:05:29', 1),
(43, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-21 03:56:04', 1),
(44, '192.168.174.190', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-21 06:10:32', 1),
(45, '192.168.174.190', 'ayurahayu@gmail.com', 5, '2023-10-21 06:10:50', 1),
(46, '192.168.174.190', 'zulfy@ijtt-id.com', 2, '2023-10-21 06:11:11', 1),
(47, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-21 08:23:26', 1),
(48, '192.168.174.190', 'zulfy@ijtt-id.com', 2, '2023-10-21 08:33:52', 1),
(49, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-23 00:57:56', 1),
(50, '192.168.175.130', 'zulfy@ijtt-id.com', NULL, '2023-10-23 01:16:40', 0),
(51, '192.168.175.130', 'zulfy@ijtt-id.com', NULL, '2023-10-23 01:16:58', 0),
(52, '192.168.175.130', 'zulfy@ijtt-id.com', NULL, '2023-10-23 01:19:31', 0),
(53, '192.168.175.130', 'zulfy@ijtt-id.com', NULL, '2023-10-23 01:19:49', 0),
(54, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-10-23 01:20:36', 1),
(55, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-23 06:09:17', 1),
(56, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-10-23 07:32:25', 1),
(57, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-24 01:20:20', 1),
(58, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-25 02:21:48', 1),
(59, '192.168.174.183', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-25 03:00:10', 1),
(60, '192.168.175.130', 'zulfy@ijtt-id.com', NULL, '2023-10-25 03:30:37', 0),
(61, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-10-25 03:30:48', 1),
(62, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-25 05:50:55', 1),
(63, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-26 02:53:55', 1),
(64, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-26 09:39:22', 1),
(65, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-27 01:31:48', 1),
(66, '192.168.174.120', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-27 01:58:10', 1),
(67, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-30 01:04:09', 1),
(68, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-10-30 01:38:10', 1),
(69, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-30 03:58:05', 1),
(70, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-30 07:23:25', 1),
(71, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-30 09:34:25', 1),
(72, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-31 01:03:11', 1),
(73, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-10-31 04:20:37', 1),
(74, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-01 01:48:50', 1),
(75, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-02 01:13:25', 1),
(76, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-03 02:35:10', 1),
(77, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', NULL, '2023-11-03 06:26:42', 0),
(78, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-03 06:26:53', 1),
(79, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-04 08:58:08', 1),
(80, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-06 01:08:55', 1),
(81, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-06 03:58:57', 1),
(82, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-07 01:14:48', 1),
(83, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-11-07 02:32:11', 1),
(84, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-07 07:14:10', 1),
(85, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-07 11:09:27', 1),
(86, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-08 00:57:05', 1),
(87, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-08 04:35:59', 1),
(88, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-11-08 07:00:02', 1),
(89, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-09 01:29:09', 1),
(90, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-09 07:29:28', 1),
(91, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-10 01:06:15', 1),
(92, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-10 07:14:45', 1),
(93, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-13 01:13:18', 1),
(94, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-11-13 04:03:17', 1),
(95, '::1', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-13 06:50:17', 1),
(96, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-11-13 08:21:30', 1),
(97, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-13 08:41:24', 1),
(98, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-11-13 08:41:51', 1),
(99, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-13 08:46:24', 1),
(100, '192.168.175.227', 'ayurahayu@gmail.com', 5, '2023-11-13 08:49:58', 1),
(101, '192.168.175.227', 'ayurahayu@gmail.com', 5, '2023-11-13 09:03:22', 1),
(102, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-14 00:55:48', 1),
(103, '192.168.175.227', 'ayurahayu@gmail.com', 5, '2023-11-14 00:59:38', 1),
(104, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-14 01:00:43', 1),
(105, '192.168.175.227', 'ayurahayu@gmail.com', 5, '2023-11-14 01:34:07', 1),
(106, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-14 01:38:28', 1),
(107, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-14 09:13:43', 1),
(108, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-15 01:31:49', 1),
(109, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-15 06:46:50', 1),
(110, '192.168.175.227', 'ayurahayu@gmail.com', NULL, '2023-11-15 07:52:58', 0),
(111, '192.168.175.227', 'ayurahayu@gmail.com', NULL, '2023-11-15 07:53:19', 0),
(112, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-15 07:53:30', 1),
(113, '192.168.175.227', 'ayurahayu@gmail.com', 5, '2023-11-15 07:59:29', 1),
(114, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-15 07:59:56', 1),
(115, '192.168.175.227', 'nabilah@gmail.com', NULL, '2023-11-15 08:14:52', 0),
(116, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-15 08:15:06', 1),
(117, '192.168.175.227', 'nabilah@gmail.com', 11, '2023-11-15 08:15:40', 1),
(118, '192.168.175.227', 'nabilah@gmail.com', 11, '2023-11-15 08:17:07', 1),
(119, '192.168.175.227', 'nabilah@gmail.com', 11, '2023-11-15 08:17:58', 1),
(120, '192.168.175.227', 'ayurahayu@gmail.com', 5, '2023-11-15 08:19:16', 1),
(121, '192.168.175.227', 'nabilah@gmail.com', 11, '2023-11-15 08:20:37', 1),
(122, '192.168.175.227', 'ayurahayu@gmail.com', 5, '2023-11-15 08:21:44', 1),
(123, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-15 08:22:49', 1),
(124, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-15 08:31:20', 1),
(125, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-16 01:37:54', 1),
(126, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-16 07:59:05', 1),
(127, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-11-16 08:15:28', 1),
(128, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-17 01:14:02', 1),
(129, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-11-17 04:26:53', 1),
(130, '192.168.175.227', 'nabilah@gmail.com', NULL, '2023-11-17 06:11:51', 0),
(131, '192.168.175.227', 'nabilah@gmail.com', 11, '2023-11-17 06:11:59', 1),
(132, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-17 06:14:51', 1),
(133, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-20 02:15:30', 1),
(134, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-11-20 02:48:22', 1),
(135, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-20 06:06:28', 1),
(136, '192.168.175.130', 'zulfy@ijtt-id.com', NULL, '2023-11-20 06:41:37', 0),
(137, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-11-20 06:41:47', 1),
(138, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-20 09:43:31', 1),
(139, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-21 00:57:59', 1),
(140, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-11-22 01:53:32', 1),
(141, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-22 01:56:39', 1),
(142, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-22 09:24:57', 1),
(143, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-23 01:05:03', 1),
(144, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-23 03:32:14', 1),
(145, '192.168.175.227', 'nabilah@gmail.com', 12, '2023-11-23 04:34:21', 1),
(146, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-23 04:35:07', 1),
(147, '192.168.175.227', 'nabilah@gmail.com', 14, '2023-11-23 04:55:22', 1),
(148, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-23 04:55:44', 1),
(149, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-23 04:55:44', 1),
(150, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-11-23 06:13:36', 1),
(151, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-23 06:14:57', 1),
(152, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-11-23 07:33:26', 1),
(153, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-23 07:33:39', 1),
(154, '192.168.175.227', 'ayurahayu@gmail.com', NULL, '2023-11-23 07:51:10', 0),
(155, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-23 07:51:20', 1),
(156, '192.168.175.227', 'ayurahayu@gmail.com', 5, '2023-11-23 07:51:50', 1),
(157, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-23 07:52:25', 1),
(158, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-11-23 07:54:29', 1),
(159, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', NULL, '2023-11-23 07:57:00', 0),
(160, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', NULL, '2023-11-23 07:57:11', 0),
(161, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-23 08:34:42', 1),
(162, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-24 01:04:27', 1),
(163, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-24 03:51:11', 1),
(164, '192.168.175.227', 'zulfy@ijtt-id.com', 2, '2023-11-24 03:52:25', 1),
(165, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-24 03:53:24', 1),
(166, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-11-24 03:55:05', 1),
(167, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-24 06:05:39', 1),
(168, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-27 01:01:11', 1),
(169, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-27 05:46:32', 1),
(170, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-11-27 07:10:44', 1),
(171, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-28 00:57:49', 1),
(172, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-11-28 06:16:35', 1),
(173, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-11-28 09:38:10', 1),
(174, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-28 09:43:48', 1),
(175, '192.168.175.227', 'dummy@gmail.com', 17, '2023-11-28 09:44:39', 1),
(176, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-29 01:31:42', 1),
(177, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-29 09:39:03', 1),
(178, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-11-30 00:59:28', 1),
(179, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-01 01:07:28', 1),
(180, '192.168.175.130', 'zulfy@ijtt-id.com', 2, '2023-12-01 04:22:37', 1),
(181, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-01 05:49:45', 1),
(182, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-04 01:00:55', 1),
(183, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-04 04:17:04', 1),
(184, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-04 07:08:28', 1),
(185, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-05 01:01:07', 1),
(186, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-05 05:43:08', 1),
(187, '192.168.175.175', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-05 05:59:57', 1),
(188, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-05 08:34:37', 1),
(189, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', NULL, '2023-12-06 01:03:29', 0),
(190, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-06 01:03:45', 1),
(191, '192.168.175.172', 'zulfy@ijtt-id.com', 2, '2023-12-06 03:37:14', 1),
(192, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-06 08:47:46', 1),
(193, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-07 06:57:45', 1),
(194, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-08 00:51:54', 1),
(195, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-08 06:22:03', 1),
(196, '192.168.174.248', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-08 06:40:02', 1),
(197, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-08 09:31:05', 1),
(198, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-08 09:31:06', 1),
(199, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-11 01:01:02', 1),
(200, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-12 01:14:24', 1),
(201, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-12 03:20:20', 1),
(202, '192.168.175.172', 'zulfy@ijtt-id.com', 2, '2023-12-12 06:06:14', 1),
(203, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-12 09:34:43', 1),
(204, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-13 01:15:54', 1),
(205, '192.168.161.14', 'dwi.cahyono@ijttt-id.com', NULL, '2023-12-13 03:18:02', 0),
(206, '192.168.161.14', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-13 03:18:33', 1),
(207, '192.168.161.14', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-13 03:19:35', 1),
(208, '192.168.161.14', 'guest@guest.com', NULL, '2023-12-13 03:20:46', 0),
(209, '192.168.161.14', 'dummy@gmail.com', 17, '2023-12-13 03:21:25', 1),
(210, '192.168.174.248', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-13 03:33:03', 1),
(211, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-13 07:30:58', 1),
(212, '192.168.176.153', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-13 08:05:38', 1),
(213, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-14 01:00:06', 1),
(214, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', NULL, '2023-12-14 06:05:37', 0),
(215, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-14 06:05:44', 1),
(216, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-15 01:20:57', 1),
(217, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-18 03:35:53', 1),
(218, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-18 06:12:17', 1),
(219, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-19 01:26:27', 1),
(220, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-19 09:02:24', 1),
(221, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', NULL, '2023-12-20 01:03:48', 0),
(222, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-20 01:03:55', 1),
(223, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-20 08:23:30', 1),
(224, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-21 01:47:06', 1),
(225, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-22 07:39:05', 1),
(226, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-26 01:16:50', 1),
(227, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-26 04:26:41', 1),
(228, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-26 06:50:00', 1),
(229, '192.168.175.110', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-27 01:33:52', 1),
(230, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-27 01:41:27', 1),
(231, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-27 06:57:00', 1),
(232, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-28 01:13:38', 1),
(233, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-28 05:57:05', 1),
(234, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-28 06:53:05', 1),
(235, '192.168.175.110', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-28 08:54:21', 1),
(236, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-28 09:44:10', 1),
(237, '192.168.175.227', 'dwi.cahyono@ijtt-id.com', 1, '2023-12-29 01:08:30', 1),
(238, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-04 02:52:03', 1),
(239, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-04 06:08:09', 1),
(240, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-05 01:08:52', 1),
(241, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-05 01:46:35', 1),
(242, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-05 03:18:09', 1),
(243, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-05 08:58:03', 1),
(244, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-08 08:18:48', 1),
(245, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 01:22:31', 1),
(246, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-09 06:19:54', 1),
(247, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-10 01:08:35', 1),
(248, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-10 02:58:05', 1),
(249, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-10 03:06:29', 1),
(250, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-10 06:15:33', 1),
(251, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-11 02:22:21', 1),
(252, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-11 04:32:14', 1),
(253, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-11 08:53:04', 1),
(254, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-12 01:23:35', 1),
(255, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-12 02:02:23', 1),
(256, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-12 04:15:59', 1),
(257, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-12 05:49:58', 1),
(258, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-12 08:13:15', 1),
(259, '192.168.174.186', 'dummy@dummy.com', NULL, '2024-01-12 08:13:38', 0),
(260, '192.168.174.186', 'dummy@gmail.com', 17, '2024-01-12 08:13:57', 1),
(261, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-12 08:15:09', 1),
(262, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-15 01:29:06', 1),
(263, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-15 03:08:38', 1),
(264, '192.168.174.186', 'dummy@gmail.com', 17, '2024-01-15 04:22:52', 1),
(265, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-15 04:23:39', 1),
(266, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-15 06:01:34', 1),
(267, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-15 06:40:13', 1),
(268, '192.168.174.186', 'dummy@gmail.com', 17, '2024-01-15 06:40:31', 1),
(269, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-15 06:42:48', 1),
(270, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-15 07:45:27', 1),
(271, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-15 08:39:09', 1),
(272, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-15 08:44:39', 1),
(273, '192.168.177.104', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-16 04:20:47', 1),
(274, '192.168.177.104', 'ppic@ijtt-id.com', 18, '2024-01-16 04:51:20', 1),
(275, '192.168.177.104', 'sales@ijtt-id.com', 19, '2024-01-16 04:52:05', 1),
(276, '192.168.177.104', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-16 04:52:44', 1),
(277, '192.168.177.104', 'ppic@ijtt-id.com', 18, '2024-01-16 04:53:30', 1),
(278, '192.168.177.104', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-16 04:54:04', 1),
(279, '192.168.177.104', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-16 07:27:22', 1),
(280, '192.168.175.105', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-17 08:28:14', 1),
(281, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-17 08:32:27', 1),
(282, '192.168.175.172', 'zulfy@ijtt-id.com', NULL, '2024-01-17 09:38:01', 0),
(283, '192.168.175.172', 'zulfy@ijtt-id.com', 2, '2024-01-17 09:40:27', 1),
(284, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-18 03:48:26', 1),
(285, '192.168.175.105', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-18 06:48:15', 1),
(286, '192.168.175.110', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-18 08:25:29', 1),
(287, '192.168.175.110', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-18 08:46:10', 1),
(288, '192.168.175.105', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-18 09:10:01', 1),
(289, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-19 00:55:19', 1),
(290, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-19 01:50:04', 1),
(291, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-19 03:24:58', 1),
(292, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-22 01:38:30', 1),
(293, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-22 04:25:55', 1),
(294, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-22 05:46:32', 1),
(295, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-22 07:30:01', 1),
(296, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-22 08:07:22', 1),
(297, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-22 09:17:43', 1),
(298, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-23 02:25:35', 1),
(299, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-23 03:00:57', 1),
(300, '192.168.161.14', 'dwi.cahyono@ijttt-id.com', NULL, '2024-01-23 03:35:48', 0),
(301, '192.168.161.14', 'dwi.cahyono@ijttt-id.com', NULL, '2024-01-23 03:35:58', 0),
(302, '192.168.161.14', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-23 03:36:20', 1),
(303, '192.168.161.14', 'dummy@gmail.com', 17, '2024-01-23 03:37:13', 1),
(304, '192.168.161.14', 'dwi.cahyono@ijttt-id.com', NULL, '2024-01-23 03:38:38', 0),
(305, '192.168.161.14', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-23 03:38:48', 1),
(306, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-23 06:05:23', 1),
(307, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-23 08:27:22', 1),
(308, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-23 09:29:26', 1),
(309, '192.168.175.172', 'zulfy@ijtt-id.com', 2, '2024-01-24 03:30:59', 1),
(310, '192.168.175.172', 'zulfy@ijtt-id.com', 2, '2024-01-24 04:54:40', 1),
(311, '192.168.175.172', 'zulfy@ijtt-id.com', NULL, '2024-01-24 05:57:34', 0),
(312, '192.168.175.172', 'zulfy@ijtt-id.com', 2, '2024-01-24 05:57:43', 1),
(313, '192.168.175.172', 'zulfy@ijtt-id.com', 2, '2024-01-24 08:30:41', 1),
(314, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-25 01:48:48', 1),
(315, '192.168.175.110', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-25 02:12:17', 1),
(316, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-25 03:14:12', 1),
(317, '192.168.175.110', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-25 04:07:56', 1),
(318, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-25 04:09:59', 1),
(319, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-25 07:30:32', 1),
(320, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-25 09:34:30', 1),
(321, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-26 01:47:08', 1),
(322, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-26 02:46:51', 1),
(323, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-26 03:44:31', 1),
(324, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-26 05:51:41', 1),
(325, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-26 06:33:12', 1),
(326, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-29 01:07:07', 1),
(327, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-29 03:04:04', 1),
(328, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-29 04:01:06', 1),
(329, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-29 06:16:59', 1),
(330, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-29 07:49:12', 1),
(331, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-29 08:43:44', 1),
(332, '192.168.175.110', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-30 01:54:52', 1),
(333, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-30 02:16:46', 1),
(334, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-31 01:10:23', 1),
(335, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-31 02:30:07', 1),
(336, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-31 03:47:38', 1),
(337, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-01-31 09:44:22', 1),
(338, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-02-01 01:39:51', 1),
(339, '192.168.175.172', 'zulfy@ijtt-id.com', 2, '2024-02-01 04:00:10', 1),
(340, '192.168.175.172', 'zulfy@ijtt-id.com', 2, '2024-02-01 04:00:10', 1),
(341, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-02-01 05:46:51', 1),
(342, '192.168.174.186', 'dwi.cahyono@ijtt-id.com', 1, '2024-02-02 00:58:45', 1),
(343, '192.168.174.192', 'dwi.cahyono@ijtt-id.com', 1, '2024-02-05 04:35:01', 1),
(344, '192.168.174.192', 'dwi.cahyono@ijtt-id.com', 1, '2024-02-06 01:06:42', 1),
(345, '192.168.175.172', 'zulfy@ijtt-id.com', 2, '2024-02-06 02:45:25', 1),
(346, '192.168.175.172', 'zulfy@ijtt-id.com', 2, '2024-02-06 06:07:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE IF NOT EXISTS `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE IF NOT EXISTS `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE IF NOT EXISTS `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

CREATE TABLE IF NOT EXISTS `computer` (
  `id_computer` int(11) NOT NULL AUTO_INCREMENT,
  `asset_number` varchar(100) NOT NULL,
  `device_id` varchar(100) NOT NULL,
  `login_user` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `mac_address` varchar(100) NOT NULL,
  `prosesor` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `rom` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id_computer`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `computer`
--

INSERT INTO `computer` (`id_computer`, `asset_number`, `device_id`, `login_user`, `jenis`, `nama_produk`, `serial_number`, `mac_address`, `prosesor`, `ram`, `rom`, `user`, `id_departemen`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TJFI-C00239', 'GPI0004', '3314080162', 'Laptop', 'Dell Latitude 3420', '2FBVMG3', 'D4-54-8B-ED-C7-9F', 'Intel i5-1135G7', '8 GB', '500 GB', 'Eksi Romiasih', 0, 1, '2023-09-15 04:39:52', '2023-09-18 03:13:58', '0000-00-00 00:00:00'),
(2, 'TJFI-C00240', 'GPI0005', '3316040425', 'Laptop', 'Dell Latitude 3420', 'J6BVMG3', 'D4-54-8B-FE-3E-7C', 'Intel i5-1135G7', '8 GB', '500 GB', 'Adnan Hasyim', 0, 1, '2023-09-15 04:41:49', '2023-09-15 04:41:49', '0000-00-00 00:00:00'),
(6, 'TJFI-C00241', 'GPI0006', '3318070700', 'Laptop', 'Dell Latitude 3420', 'G8BVMG3', 'D4-54-8B-FE-3D-B9', 'Intel i5-1135G7', '8 GB', '500 GB', 'Yudha Pratama', 0, 1, '2023-09-15 09:19:06', '2023-09-15 09:19:36', '0000-00-00 00:00:00'),
(7, 'TJFI-C00242', 'GPI0007', '3320120906', 'Laptop', 'Dell Latitude 3420 ', '2DBVMG3', 'D4-54-8B-ED-C8-9E', 'Intel i5-1135G7', '8 GB', '500 GB', 'Heni Priyanti', 0, 1, '2023-09-15 09:28:57', '2023-09-18 02:23:38', '0000-00-00 00:00:00'),
(8, 'TJFI-C00243', 'GPI0008', '3321111027', 'Laptop', 'Dell Latitude 3420', 'J8BVMG3', 'D4-54-8B-ED-C8-A8', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ageng Tirto', 0, 1, '2023-09-15 09:33:47', '2023-09-15 09:34:18', '0000-00-00 00:00:00'),
(9, 'TJFI-C00244', 'GPI0009', '3323091221', 'Laptop', 'Dell Latitude 3420', '8CBVMG3', 'D4-54-8B-E2-E9-51', 'Intel i5-1135G7', '8 GB', '500 GB', 'Haerudinsyah', 0, 1, '2023-09-15 09:36:46', '2023-09-15 09:36:46', '0000-00-00 00:00:00'),
(10, 'TJFI-C00245', 'GPI0010', '3316010414', 'Laptop', 'Dell Latitude 3420', 'FDBVMG3', 'D4-54-8B-ED-C9-3E', 'Intel i5-1135G7', '8 GB', '500 GB', 'Agung Prasojo', 0, 1, '2023-09-15 09:40:10', '2023-09-15 09:40:24', '0000-00-00 00:00:00'),
(11, 'TJFI-C00246', 'GPI0011', '3314090181', 'Laptop', 'Dell Latitude 3420', 'HDBVMG3', 'D4-54-8B-FF-22-60', 'Intel i5-1135G7', '8 GB', '500 GB', 'Mahfudz', 0, 1, '2023-09-15 09:41:42', '2023-09-15 09:41:42', '0000-00-00 00:00:00'),
(12, 'TJFI-C00248', 'GPI0012', '3316070437', 'Laptop', 'Dell Latitude 3420', '68BVMG3', 'D4-54-8B-FE-56-C8', 'Intel i5-1135G7', '8 GB', '500 GB', 'Sumardi', 0, 1, '2023-09-15 09:44:20', '2023-09-15 09:44:20', '0000-00-00 00:00:00'),
(13, 'TJFI-C00249', 'GPI0013', '3316090452', 'Laptop', 'Dell Latitude 3420', '98BVMG3', 'B4-45-06-3E-0E-2E', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ali Nurdin', 0, 1, '2023-09-15 09:45:39', '2023-09-18 01:29:59', '0000-00-00 00:00:00'),
(14, 'TJFI-C00250', 'GPI0014', '3318030687', 'Laptop', 'Dell Latitude 3420', 'F7BVMG3', 'D4-54-8B-E2-DB-55', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ilham Aditya', 0, 1, '2023-09-15 09:47:10', '2023-09-15 09:47:10', '0000-00-00 00:00:00'),
(15, 'TJFI-C00251', 'GPI0015', '3316090453', 'Laptop', 'Dell Latitude 3420', '7CBVMG3', 'd4-54-8b-e2-e9-1a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Anang Kuncoro', 0, 1, '2023-09-18 01:25:33', '2023-09-18 01:45:30', '0000-00-00 00:00:00'),
(16, 'TJFI-C00252', 'GPI0016', '3316100461', 'Laptop', 'Dell Latitude 3420', 'CCBVMG3', 'd4-54-8b-ed-c8-a3', 'Intel i5-1135G7', '8 GB', '500 GB', 'Rochmat', 0, 1, '2023-09-18 01:26:40', '2023-09-18 01:45:40', '0000-00-00 00:00:00'),
(17, 'TJFI-C00253', 'GPI0017', '3313050007', 'Laptop', 'Dell Latitude 3420', 'DCBVMG3', 'd4-54-8b-e2-e8-d9', 'Intel i5-1135G7', '8 GB', '500 GB', 'Chorridatul Mahmudah', 0, 1, '2023-09-18 01:27:49', '2023-09-18 01:45:56', '0000-00-00 00:00:00'),
(18, 'TJFI-C00254', 'GPI0018', '3313110046', 'Laptop', 'Dell Latitude 3420', '3FBVMG3', 'd4-54-8b-b8-f7-4f', 'Intel i5-1135G7', '8 GB', '500 GB', 'Nandang Lukmansyah', 0, 1, '2023-09-18 01:29:35', '2023-09-18 01:46:10', '0000-00-00 00:00:00'),
(19, 'TJFI-C00255', 'GPI0019', '3314070150', 'Laptop', 'Dell Latitude 3420', '2GBVMG3', 'd4-54-8b-fe-3a-58', 'Intel i5-1135G7', '8 GB', '500 GB', 'Iman Ramdhana', 0, 1, '2023-09-18 01:30:58', '2023-09-18 01:46:23', '0000-00-00 00:00:00'),
(20, 'TJFI-C00256', 'GPI0020', '3314090180', 'Laptop', 'Dell Latitude 3420', 'H6BVMG3', 'd4-54-8b-fe-3a-58', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ida Rusdiansyah', 0, 1, '2023-09-18 01:32:38', '2023-09-18 08:26:25', '0000-00-00 00:00:00'),
(21, 'TJFI-C00258', 'GPI0022', '3314110221', 'Laptop', 'Dell Latitude 3420', '8DBVMG3', 'd4-54-8b-e2-e9-6a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Janiar Usman', 0, 1, '2023-09-18 01:34:06', '2023-09-18 01:46:51', '0000-00-00 00:00:00'),
(22, 'TJFI-C00260', 'GPI0024', '3314080153', 'Laptop', 'Dell Latitude 3420', '5CBVMG3', 'd4-54-8b-ed-c9-7a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Muhamad Syaifulloh', 0, 1, '2023-09-18 01:35:21', '2023-10-19 08:52:44', '0000-00-00 00:00:00'),
(23, 'TJFI-C00261', 'GPI0025', '3316010413', 'Laptop', 'Dell Latitude 3420', 'D8BVMG3', 'd4-54-8b-fe-47-6e', 'Intel i5-1135G7', '8 GB', '500 GB', 'Vani Rovalina', 0, 1, '2023-09-18 01:37:44', '2023-09-18 01:47:19', '0000-00-00 00:00:00'),
(24, 'TJFI-C00262', 'GPI0026', '3314050107', 'Laptop', 'Dell Latitude 3420', '67BVMG3', 'd4-54-8b-fe-48-0e', 'Intel i5-1135G7', '8 GB', '500 GB', 'Wasis Utomo', 0, 1, '2023-09-18 01:42:49', '2023-09-18 01:47:32', '0000-00-00 00:00:00'),
(25, 'TJFI-C00263', 'GPI0027', '3317070586', 'Laptop', 'Dell Latitude 3420', '79BVMG3', 'd4-54-8b-fe-56-aa', 'Intel i5-1135G7', '8 GB', '500 GB', 'Serli Rismawati', 0, 1, '2023-09-18 01:44:21', '2023-09-18 01:47:47', '0000-00-00 00:00:00'),
(26, 'TJFI-C00264', 'GPI0028', '3318010645', 'Laptop', 'Dell Latitude 3420', '88BVMG3', 'd4-54-8b-fe-56-b4', 'Intel i5-1135G7', '8 GB', '500 GB', 'M Aris Mamun', 0, 1, '2023-09-18 01:45:12', '2023-10-03 08:26:31', '0000-00-00 00:00:00'),
(27, 'TJFI-C00265', 'GPI0029', '3318030688', 'Laptop', 'Dell Latitude 3420', '6CBVMG3', 'd4-54-8b-e2-db-46', 'Intel i5-1135G7', '8 GB', '500 GB', 'Nani Pratiwi', 0, 1, '2023-09-18 01:49:33', '2023-09-18 01:49:33', '0000-00-00 00:00:00'),
(28, 'TJFI-C00266', 'GPI0030', '3313090039', 'Laptop', 'Dell Latitude 3420', '19BVMG3', 'd4-54-8b-fe-56-96', 'Intel i5-1135G7', '8 GB', '500 GB', 'Sigit Purwoko', 0, 1, '2023-09-18 01:51:02', '2023-09-18 01:51:02', '0000-00-00 00:00:00'),
(29, 'TJFI-C00267', 'GPI0031', '3314010057', 'Laptop', 'Dell Latitude 3420', 'H7BVMG3', 'd4-54-8b-fe-56-9b', 'Intel i5-1135G7', '8 GB', '500 GB', 'Pian Sopian', 0, 1, '2023-09-18 01:52:23', '2023-09-18 01:53:25', '0000-00-00 00:00:00'),
(30, 'TJFI-C00268', 'GPI0032', '3314040084', 'Laptop', 'Dell Latitude 3420', 'B8BVMG3', 'd4-54-8b-fe-5e-a7', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ruki Fauzan', 0, 1, '2023-09-18 01:53:09', '2023-09-18 01:53:39', '0000-00-00 00:00:00'),
(31, 'TJFI-C00269', 'GPI0033', 'administrator', 'Laptop', 'Dell Latitude 3420', 'F6BVMG3', 'd4-54-8b-fe-30-a3', 'Intel i5-1135G7', '8 GB', '500 GB', 'Spare Rusak (Ex. Didin Saripudin)', 0, 0, '2023-09-18 01:54:37', '2023-12-28 07:12:23', '0000-00-00 00:00:00'),
(32, 'TJFI-C00337', 'GPI0034', '3314050104', 'PC Desktop', 'Dell OptiPlex 5090', '76M2ZL3', '60-a5-e2-fd-48-46', 'Intel i5-11500', '8 GB', '500 GB', 'Rian Ardianto', 0, 1, '2023-09-18 01:56:27', '2023-10-04 07:37:13', '0000-00-00 00:00:00'),
(33, 'TJFI-C00270', 'GPI0035', '3313110047', 'Laptop', 'Dell Latitude 3420', '8BBVMG3', 'd4-54-8b-e2-e8-f7', 'Intel i5-1135G7', '8 GB', '500 GB', 'Prapto', 0, 1, '2023-09-18 01:57:32', '2023-09-18 01:57:32', '0000-00-00 00:00:00'),
(34, 'TJFI-C00271', 'GPI0036', '3313110050', 'Laptop', 'Dell Latitude 3420', '17BVMG3', 'd4-54-8b-fe-47-a0', 'Intel i5-1135G7', '8 GB', '500 GB', 'M Usup Supriyatna', 0, 1, '2023-09-18 02:17:32', '2023-09-18 02:19:12', '0000-00-00 00:00:00'),
(35, 'TJFI-C00272', 'GPI0037', '3314040080', 'Laptop', 'Dell Latitude 3420', 'CBBVMG3', 'd4-54-8b-e2-d5-42', 'Intel i5-1135G7', '8 GB', '500 GB', 'Anowo Idris', 0, 1, '2023-09-18 02:18:34', '2023-09-18 02:18:34', '0000-00-00 00:00:00'),
(36, 'TJFI-C00273', 'GPI0038', '3320120910', 'Laptop', 'Dell Latitude 3420', 'G6BVMG3', 'd4-54-8b-fe-4a-6b', 'Intel i5-1135G7', '8 GB', '8 GB', 'Zulfy Triyoga', 0, 1, '2023-09-18 02:20:09', '2023-09-18 02:20:27', '0000-00-00 00:00:00'),
(37, 'TJFI-C00274', 'GPI0039', '3314100182', 'Laptop', 'Dell Latitude 3420', '59BVMG3', 'd4-54-8b-ff-08-20', 'Intel i5-1135G7', '8 GB', '500 GB', 'Septian Kurniawan', 0, 1, '2023-09-18 03:03:24', '2023-09-18 03:10:31', '0000-00-00 00:00:00'),
(38, 'TJFI-C00275', 'GPI0040', '3314100201', 'Laptop', 'Dell Latitude 3420', '39BVMG3', 'd4-54-8b-fe-3a-67', 'Intel i5-1135G7', '8 GB', '500 GB', 'Trianjaya Saputra', 0, 1, '2023-09-18 03:10:13', '2023-09-18 03:10:47', '0000-00-00 00:00:00'),
(39, 'TJFI-C00276', 'GPI0041', '3313050009', 'Laptop', 'Dell Latitude 3420', 'JFBVMG3', 'd4-54-8b-b9-82-73', 'Intel i5-1135G7', '8 GB', '500 GB', 'Adung Suwela', 0, 1, '2023-09-18 03:12:10', '2023-09-18 03:12:10', '0000-00-00 00:00:00'),
(40, 'TJFI-C00277', 'GPI0042', '3313090041', 'Laptop', 'Dell Latitude 3420', '6FBVMG3', 'd4-54-8b-e2-db-14', 'Intel i5-1135G7', '8 GB', '500 GB', 'Nandang Supriyadi', 0, 1, '2023-09-18 03:16:01', '2023-09-18 03:16:01', '0000-00-00 00:00:00'),
(41, 'TJFI-C00278', 'GPI0043', '3313120051', 'Laptop', 'Dell Latitude 3420', '9DBVMG3', 'd4-54-8b-e2-e9-10', 'Intel i5-1135G7', '8 GB', '500 GB', 'Nanang Triana', 0, 1, '2023-09-18 03:19:23', '2023-09-18 03:26:14', '0000-00-00 00:00:00'),
(42, 'TJFI-C00279', 'GPI0044', '3317070584', 'Laptop', 'Dell Latitude 3420', 'GDBVMG3', 'b4-45-06-3e-04-88', 'Intel i5-1135G7', '8 GB', '500 GB', 'Muhamad Faqih', 0, 1, '2023-09-18 03:20:04', '2023-09-18 03:26:31', '0000-00-00 00:00:00'),
(43, 'TJFI-C00338', 'GPI0045', '3314030073', 'PC Desktop', 'Dell OptiPlex 5090', 'D6M2ZL3', '20-c1-9b-00-d4-49', 'Intel i5-11500', '8 GB', '500 GB', 'Toto Sukma', 0, 1, '2023-09-18 03:20:59', '2023-09-18 03:26:45', '0000-00-00 00:00:00'),
(44, 'TJFI-C00339', 'GPI0046', '3314060123', 'PC Desktop', 'Dell OptiPlex 5090', '86M2ZL3', '60-a5-e2-fd-39-e6', 'Intel i5-11500', '8 GB', '500 GB', 'Asep Supriatna', 0, 1, '2023-09-18 03:21:55', '2023-09-18 03:26:59', '0000-00-00 00:00:00'),
(45, 'TJFI-C00340', 'GPI0047', '3314010058', 'PC Desktop', 'Dell OptiPlex 5090', '66M2ZL3', 'c0-25-a5-a8-d8-7b', 'Intel i5-11500', '8 GB', '500 GB', 'Abdul Syukri', 0, 1, '2023-09-18 03:24:50', '2023-09-18 03:27:24', '0000-00-00 00:00:00'),
(46, 'TJFI-C00280', 'GPI0048', '3318020671', 'Laptop', 'Dell Latitude 3420', 'F8BVMG3', 'd4-54-8b-fe-5e-9d', 'Intel i5-1135G7', '8 GB', '500 GB', 'Siti Ulfah Solihah', 0, 1, '2023-09-18 03:34:42', '2023-09-18 03:35:58', '0000-00-00 00:00:00'),
(47, 'TJFI-C00341', 'GPI0049', '3313050008', 'PC Desktop', 'Dell OptiPlex 5090', '96M2ZL3', '20-c1-9b-00-6d-38', 'Intel i5-11500', '8 GB', '500 GB', 'Ruli Kristian Masudianto', 0, 1, '2023-09-18 03:37:13', '2023-09-18 06:01:03', '0000-00-00 00:00:00'),
(48, 'TJFI-C00281', 'GPI0050', '3313110049', 'Laptop', 'Dell Latitude 3420', '4GBVMG3', 'd4-54-8b-b8-f7-2c', 'Intel i5-1135G7', '8 GB', '500 GB', 'Muh Muklis', 0, 1, '2023-09-18 03:41:15', '2023-09-18 06:01:16', '0000-00-00 00:00:00'),
(49, 'TJFI-C00282', 'GPI0051', '3313120052', 'Laptop', 'Dell Latitude 3420', 'BBBVMG3', 'd4-54-8b-e2-da-bf', 'Intel i5-1135G7', '8 GB', '500 GB', 'Budi Riyanto', 0, 1, '2023-09-18 06:00:38', '2023-09-18 06:01:27', '0000-00-00 00:00:00'),
(50, 'TJFI-C00283', 'GPI0052', '3314010059', 'Laptop', 'Dell Latitude 3420', '89BVMG3', 'd4-54-8b-fe-4a-3e', 'Intel i5-1135G7', '8 GB', '500 GB', 'Minal Muttaqin', 0, 1, '2023-09-18 06:02:24', '2023-09-20 02:26:41', '0000-00-00 00:00:00'),
(51, 'TJFI-C00284', 'GPI0053', '3315070373', 'Laptop', 'Dell Latitude 3420', '78BVMG3', 'd4-54-8b-fe-52-f9', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ibnu Saputra', 0, 1, '2023-09-18 06:03:02', '2023-09-20 02:27:16', '0000-00-00 00:00:00'),
(52, 'TJFI-C00285', 'GPI0054', '3317070585', 'Laptop', 'Dell Latitude 3420', 'HBBVMG3', 'd4-54-8b-ed-c8-fd', 'Intel i5-1135G7', '8 GB', '500 GB', 'Trisno Susilo', 0, 1, '2023-09-18 06:03:40', '2023-09-20 02:27:38', '0000-00-00 00:00:00'),
(53, 'TJFI-C00286', 'GPI0055', '3314060118', 'Laptop', 'Dell Latitude 3420', '1FBVMG3', 'd4-54-8b-ed-c8-f8', 'Intel i5-1135G7', '8 GB', '500 GB', 'Yogi Tri Laksono', 0, 1, '2023-09-18 06:04:25', '2023-09-20 02:27:59', '0000-00-00 00:00:00'),
(54, 'TJFI-C00287', 'GPI0056', '3313070025', 'Laptop', 'Dell Latitude 3420', 'H8BVMG3', 'd4-54-8b-fe-53-58', 'Intel i5-1135G7', '8 GB', '500 GB', 'Agus Mukhotib', 0, 1, '2023-09-18 06:05:01', '2023-09-20 02:28:20', '0000-00-00 00:00:00'),
(55, 'TJFI-C00288', 'GPI0057', '3314040095', 'Laptop', 'Dell Latitude 3420', 'C9BVMG3', 'b4-45-06-3d-f7-82', 'Intel i5-1135G7', '8 GB', '500 GB', 'Joni Irawan', 0, 1, '2023-09-18 06:05:40', '2023-09-20 02:28:36', '0000-00-00 00:00:00'),
(56, 'TJFI-C00289', 'GPI0058', '3314110207', 'Laptop', 'Dell Latitude 3420', 'BCBVMG3', 'd4-54-8b-e2-e8-c0', 'Intel i5-1135G7', '8 GB', '500 GB', 'Diaris Anka', 0, 1, '2023-09-18 06:06:27', '2023-09-20 02:28:56', '0000-00-00 00:00:00'),
(57, 'TJFI-C00290', 'GPI0059', '3313090038', 'Laptop', 'Dell Latitude 3420', 'DDBVMG3', 'd4-54-8b-ed-c8-8a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Surya Hadinata', 0, 1, '2023-09-18 06:07:13', '2023-09-20 02:40:12', '0000-00-00 00:00:00'),
(58, 'TJFI-C00291', 'GPI0060', '3314060122', 'Laptop', 'Dell Latitude 3420', '9BBVMG3', 'd4-54-8b-ed-c9-2a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Daryanto', 0, 1, '2023-09-18 06:08:00', '2023-09-20 02:40:55', '0000-00-00 00:00:00'),
(59, 'TJFI-C00292', 'GPI0061', '3314040082', 'Laptop', 'Dell Latitude 3420', 'G7BVMG3', 'b4-45-06-3e-08-5e', 'Intel i5-1135G7', '8 GB', '500 GB', 'M Sohibul Faizin', 0, 1, '2023-09-18 06:11:27', '2023-09-20 02:25:43', '0000-00-00 00:00:00'),
(60, 'TJFI-C00293', 'GPI0062', '3313050013', 'Laptop', 'Dell Latitude 3420', 'FCBVMG3', 'd4-54-8b-ed-c8-e4', 'Intel i5-1135G7', '8 GB', '500 GB', 'Eddie Rainaldi', 0, 1, '2023-09-18 06:13:54', '2023-09-20 02:41:19', '0000-00-00 00:00:00'),
(61, 'TJFI-C00342', 'GPI0063', 'administrator', 'PC Desktop', 'Dell OptiPlex 5090', 'C6M2ZL3', '60-a5-e2-fd-48-69', 'Intel i5-11500', '8 GB', '500 GB', 'Spare (Ex. Jarot Koerniawan)', 0, 0, '2023-09-18 06:15:53', '2023-12-06 09:47:01', '0000-00-00 00:00:00'),
(62, 'TJFI-C00294', 'GPI0064', '3317040552', 'Laptop', 'Dell Latitude 3420', '6DBVMG3', 'b4-45-06-3d-f2-e4', 'Intel i5-1135G7', '8 GB', '500 GB', 'Rullianto', 0, 1, '2023-09-18 06:16:51', '2023-09-20 02:41:35', '0000-00-00 00:00:00'),
(63, 'TJFI-C00295', 'GPI0065', '3314050105', 'Laptop', 'Dell Latitude 3420', 'C8BVMG3', 'd4-54-8b-ff-41-c8', 'Intel i5-1135G7', '8 GB', '500 GB', 'Imam Sonjaya', 0, 1, '2023-09-18 06:17:37', '2023-09-19 02:16:22', '0000-00-00 00:00:00'),
(64, 'TJFI-C00296', 'GPI0066', '3314020066', 'Laptop', 'Dell Latitude 3420', '5DBVMG3', 'b4-45-06-3e-0a-f8', 'Intel i5-1135G7', '8 GB', '500 GB', 'Rio Romadhona', 0, 1, '2023-09-18 06:19:49', '2023-09-20 02:40:30', '0000-00-00 00:00:00'),
(65, 'TJFI-C00297', 'GPI0068', '3314080161', 'Laptop', 'Dell Latitude 3420', '3DBVMG3', 'd4-54-8b-ed-c8-5d', 'Intel i5-1135G7', '8 GB', '500 GB', 'Iswanto', 0, 1, '2023-09-18 06:20:57', '2023-09-20 02:41:49', '0000-00-00 00:00:00'),
(66, 'TJFI-C00298', 'GPI0069', '3313060017', 'Laptop', 'Dell Latitude 3420', '2CBVMG3', 'd4-54-8b-e2-e9-65', 'Intel i5-1135G7', '8 GB', '500 GB', 'Hadi Handoko', 0, 1, '2023-09-18 06:21:36', '2023-09-20 02:42:10', '0000-00-00 00:00:00'),
(67, 'TJFI-C00299', 'GPI0070', '3317110614', 'Laptop', 'Dell Latitude 3420', '4CBVMG3', 'd4-54-8b-e2-e9-0b', 'Intel i5-1135G7', '8 GB', '500 GB', 'Aris Yulianto', 0, 1, '2023-09-18 06:22:18', '2023-09-20 02:42:47', '0000-00-00 00:00:00'),
(68, 'TJFI-C00300', 'GPI0071', '3314040087', 'Laptop', 'Dell Latitude 3420', 'D7BVMG3', 'd4-54-8b-fe-5e-b6', 'Intel i5-1135G7', '8 GB', '500 GB', 'Hasian/Ongki', 0, 1, '2023-09-18 06:25:21', '2023-09-20 02:44:56', '0000-00-00 00:00:00'),
(69, 'TJFI-C00301', 'GPI0072', '3313070029', 'Laptop', 'Dell Latitude 3420', '5GBVMG3', 'd4-54-8b-b6-fb-2f', 'Intel i5-1135G7', '8 GB', '500 GB', 'Aji/Triyanto', 0, 1, '2023-09-18 06:26:01', '2023-09-20 02:45:14', '0000-00-00 00:00:00'),
(70, 'TJFI-C00302', 'GPI0073', '3313070028', 'Laptop', 'Dell Latitude 3420', '3CBVMG3', 'd4-54-8b-ed-c9-34', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dian/Abdul', 0, 1, '2023-09-18 06:26:44', '2023-09-18 06:28:19', '0000-00-00 00:00:00'),
(71, 'TJFI-C00303', 'GPI0074', '3313090035', 'Laptop', 'Dell Latitude 3420', '1GBVMG3', 'b4-45-06-3d-f5-c6', 'Intel i5-1135G7', '8 GB', '500 GB', 'Yulianto/Daud', 0, 1, '2023-09-18 06:27:33', '2023-09-18 06:27:59', '0000-00-00 00:00:00'),
(72, 'TJFI-C00304', 'GPI0075', '3314110210', 'Laptop', 'Dell Latitude 3420', '87BVMG3', 'd4-54-8b-fe-4a-43', 'Intel i5-1135G7', '8 GB', '500 GB', 'Denny Soemarno', 0, 1, '2023-09-18 06:31:07', '2023-09-20 02:42:26', '0000-00-00 00:00:00'),
(73, 'TJFI-C00305', 'GPI0076', ' 3313050014', 'Laptop', 'Dell Latitude 3420', '28BVMG3', 'd4-54-8b-fe-53-5d', 'Intel i5-1135G7', '8 GB', '500 GB', 'Jong Bernart', 0, 1, '2023-09-18 06:45:04', '2023-09-20 02:45:31', '0000-00-00 00:00:00'),
(74, 'TJFI-C00306', 'GPI0077', '3316020420', 'Laptop', 'Dell Latitude 3420', 'B6BVMG3', 'd4-54-8b-fe-4a-61', 'Intel i5-1135G7', '8 GB', '500 GB', 'Cahyanto Hari W', 0, 1, '2023-09-18 06:46:11', '2023-09-20 02:45:51', '0000-00-00 00:00:00'),
(75, 'TJFI-C00307', 'GPI0078', '3316110463', 'Laptop', 'Dell Latitude 3420', 'DBBVMG3', 'd4-54-8b-ed-c9-6b', 'Intel i5-1135G7', '8 GB', '500 GB', 'Agus Purnomo', 0, 1, '2023-09-18 06:47:16', '2023-09-20 02:46:07', '0000-00-00 00:00:00'),
(76, 'TJFI-C00308', 'GPI0079', '3317080589', 'Laptop', 'Dell Latitude 3420', 'C6BVMG3', 'd4-54-8b-ff-07-e9', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dewita Budiarti', 0, 1, '2023-09-18 06:50:39', '2023-09-20 02:46:22', '0000-00-00 00:00:00'),
(77, 'TJFI-C00309', 'GPI0080', '3315020260', 'Laptop', 'Dell Latitude 3420', '7BBVMG3', 'd4-54-8b-e2-db-0f', 'Intel i5-1135G7', '8 GB', '500 GB', 'Sri Endahni', 0, 1, '2023-09-18 06:51:16', '2023-09-20 02:46:39', '0000-00-00 00:00:00'),
(78, 'TJFI-C00310', 'GPI0081', '3315120412', 'Laptop', 'Dell Latitude 3420', '6GBVMG3', 'd4-54-8b-b8-f7-13', 'Intel i5-1135G7', '8 GB', '500 GB', 'Aurum Mayta', 0, 1, '2023-09-18 06:52:13', '2023-09-20 02:47:06', '0000-00-00 00:00:00'),
(79, 'TJFI-C00311', 'GPI0082', 'MAINTENANCE P2', 'Laptop', 'Dell Latitude 3420', '58BVMG3', 'd4-54-8b-fe-5e-a2', 'Intel i5-1135G7', '8 GB', '500 GB', 'MAINTENANCE P2', 0, 1, '2023-09-18 06:54:08', '2023-09-18 07:04:50', '0000-00-00 00:00:00'),
(80, 'TJFI-C00312', 'GPI0083', '3314110220', 'Laptop', 'Dell Latitude 3420', '57BVMG3', 'd4-54-8b-fe-4a-16', 'Intel i5-1135G7', '8 GB', '500 GB', 'Sukarmin Raddin', 0, 1, '2023-09-18 06:57:04', '2023-09-20 02:47:26', '0000-00-00 00:00:00'),
(81, 'TJFI-C00313', 'GPI0084', 'MAINTENANCE P1', 'Laptop', 'Dell Latitude 3420', '37BVMG3', 'd4-54-8b-fe-53-67', 'Intel i5-1135G7', '8 GB', '500 GB', 'MAINTENANCE P1', 0, 1, '2023-09-18 07:04:33', '2023-09-18 07:04:33', '0000-00-00 00:00:00'),
(82, 'TJFI-C00314', 'GPI0085', '3314100200', 'Laptop', 'Dell Latitude 3420', '47BVMG3', 'd4-54-8b-fe-53-3f', 'Intel i5-1135G7', '8 GB', '500 GB', 'Zico Bastian', 0, 1, '2023-09-18 07:08:30', '2023-09-20 02:47:42', '0000-00-00 00:00:00'),
(83, 'TJFI-C00315', 'GPI0086', '3314070148', 'Laptop', 'Dell Latitude 3420', '49BVMG3', 'd4-54-8b-fe-3a-76', 'Intel i5-1135G7', '8 GB', '500 GB', 'Yanyan Mulyana', 0, 1, '2023-09-18 07:09:47', '2023-09-20 02:47:56', '0000-00-00 00:00:00'),
(84, 'TJFI-C00316', 'GPI0087', '3314060109', 'Laptop', 'Dell Latitude 3420', '3GBVMG3', 'd4-54-8b-b9-e8-67', 'Intel i5-1135G7', '8 GB', '500 GB', 'Agung Laksono', 0, 1, '2023-09-18 07:10:25', '2023-09-20 02:48:14', '0000-00-00 00:00:00'),
(85, 'TJFI-C00317', 'GPI0088', '3318010650', 'Laptop', 'Dell Latitude 3420', 'FBBVMG3', 'd4-54-8b-ed-c7-cc', 'Intel i5-1135G7', '8 GB', '500 GB', 'Cecep Hidayat', 0, 1, '2023-09-18 07:11:20', '2023-09-20 02:53:16', '0000-00-00 00:00:00'),
(86, 'TJFI-C00318', 'GPI0089', '3314020067', 'Laptop', 'Dell Latitude 3420', '4DBVMG3', 'd4-54-8b-e2-e8-f2', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dedi Yusuf', 0, 1, '2023-09-18 07:11:54', '2023-12-11 02:51:29', '0000-00-00 00:00:00'),
(87, 'TJFI-C00319', 'GPI0090', '3314110217', 'Laptop', 'Dell Latitude 3420', '29BVMG3', 'd4-54-8b-fe-5e-ac', 'Intel i5-1135G7', '8 GB', '500 GB', 'Mochamad Junaedi', 0, 1, '2023-09-18 07:12:37', '2023-09-20 02:53:51', '0000-00-00 00:00:00'),
(88, 'TJFI-C00320', 'GPI0091', '3320020852', 'Laptop', 'Dell Latitude 3420', '4FBVMG3', 'd4-54-8b-ed-c7-e0', 'Intel i5-1135G7', '8 GB', '500 GB', 'Mustofa Farris', 0, 1, '2023-09-18 07:13:34', '2023-09-20 02:54:08', '0000-00-00 00:00:00'),
(89, 'TJFI-C00321', 'GPI0092', '3318010649', 'Laptop', 'Dell Latitude 3420', 'C7BVMG3', 'd4-54-8b-ff-41-f5', 'Intel i5-1135G7', '8 GB', '500 GB', 'Cipto Widiyanto', 0, 1, '2023-09-18 07:14:13', '2023-09-20 02:54:24', '0000-00-00 00:00:00'),
(90, 'TJFI-C00322', 'GPI0093', '3314080152', 'Laptop', 'Dell Latitude 3420', 'CDBVMG3', 'd4-54-8b-ed-c7-e5', 'Intel i5-1135G7', '8 GB', '500 GB', 'Suryadi', 0, 1, '2023-09-18 07:15:34', '2023-09-20 02:54:34', '0000-00-00 00:00:00'),
(91, 'TJFI-C00323', 'GPI0094', '3318010648', 'Laptop', 'Dell Latitude 3420', 'D6BVMG3', 'd4-54-8b-fe-4a-70', 'Intel i5-1135G7', '8 GB', '500 GB', 'Widiyanto', 0, 1, '2023-09-18 07:21:50', '2023-09-20 02:54:53', '0000-00-00 00:00:00'),
(92, 'TJFI-C00324', 'GPI0095', '3314070149', 'Laptop', 'Dell Latitude 3420', 'B7BVMG3', 'd4-54-8b-fe-47-eb', 'Intel i5-1135G7', '8 GB', '500 GB', 'Yulianto', 0, 1, '2023-09-18 07:22:37', '2023-09-20 02:55:08', '0000-00-00 00:00:00'),
(93, 'TJFI-C00325', 'GPI0096', '3314070140', 'Laptop', 'Dell Latitude 3420', '7FBVMG3', 'd4-54-8b-ed-c6-87', 'Intel i5-1135G7', '8 GB', '500 GB', 'Subarna', 0, 1, '2023-09-18 07:23:28', '2023-09-20 02:55:19', '0000-00-00 00:00:00'),
(94, 'TJFI-C00326', 'GPI0097', '3314070131', 'Laptop', 'Dell Latitude 3420', 'GBBVMG3', 'd4-54-8b-e2-da-ce', 'Intel i5-1135G7', '8 GB', '500 GB', 'Muhamad Taufik', 0, 1, '2023-09-18 07:24:09', '2023-09-20 02:55:37', '0000-00-00 00:00:00'),
(95, 'TJFI-C00327', 'GPI0098', '3314110205', 'Laptop', 'Dell Latitude 3420', '27BVMG3', '0a-68-dd-22-8f-f6', 'Intel i5-1135G7', '8 GB', '500 GB', 'Samsudin', 0, 1, '2023-09-18 07:25:19', '2023-12-11 03:54:16', '0000-00-00 00:00:00'),
(96, 'TJFI-C00328', 'GPI0099', '3318010646', 'Laptop', 'Dell Latitude 3420', '7DBVMG3', 'd4-54-8b-ed-c9-16', 'Intel i5-1135G7', '8 GB', '500 GB', 'Budiyanto', 0, 1, '2023-09-18 07:25:58', '2023-09-20 02:56:00', '0000-00-00 00:00:00'),
(97, 'TJFI-C00329', 'GPI0100', '3314070129', 'Laptop', 'Dell Latitude 3420', '1DBVMG3', 'd4-54-8b-ed-c8-08', 'Intel i5-1135G7', '8 GB', '500 GB', 'Syaiful Hidayat', 0, 1, '2023-09-18 07:27:42', '2023-09-20 02:56:15', '0000-00-00 00:00:00'),
(98, 'TJFI-C00330', 'GPI0101', '3314100190', 'Laptop', 'Dell Latitude 3420', '9CBVMG3', 'd4-54-8b-e2-e8-cf', 'Intel i5-1135G7', '8 GB', '500 GB', 'Amin Rois', 0, 1, '2023-09-18 07:29:01', '2023-09-20 02:56:28', '0000-00-00 00:00:00'),
(99, 'TJFI-C00331', 'GPI0102', '3314060112', 'Laptop', 'Dell Latitude 3420', '48BVMG3', 'd4-54-8b-ff-42-36', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dede Marjuki', 0, 1, '2023-09-18 07:30:21', '2023-09-25 05:56:09', '0000-00-00 00:00:00'),
(100, 'TJFI-C00333', 'GPI0103', '3314060116', 'Laptop', 'Dell Latitude 3420', '99BVMG3', 'd4-54-8b-ed-c9-4d', 'Intel i5-1135G7', '8 GB', '500 GB', 'Setyawan', 0, 1, '2023-09-18 07:31:06', '2023-11-23 08:37:30', '0000-00-00 00:00:00'),
(101, 'TJFI-C00332', 'GPI0104', '3314060113', 'Laptop', 'Dell Latitude 3420', 'JBBVMG3', 'd4-54-8b-fe-56-82', 'Intel i5-1135G7', '8 GB', '500 GB', 'Aris Zaenuddin', 0, 1, '2023-09-18 07:32:07', '2023-09-25 07:42:56', '0000-00-00 00:00:00'),
(102, 'TJFI-C00334', 'GPI0105', '3317040553', 'Laptop', 'Dell Latitude 3420', '77BVMG3', 'b4-45-06-3e-09-5a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Hendri Sudrajat', 0, 1, '2023-09-18 07:32:43', '2023-09-25 07:43:12', '0000-00-00 00:00:00'),
(103, 'TJFI-C00335', 'GPI0106', '3314060111', 'Laptop', 'Dell Latitude 3420', '38BVMG3', 'd4-54-8b-fe-56-cd', 'Intel i5-1135G7', '8 GB', '500 GB', 'Andri Irawan', 0, 1, '2023-09-18 07:33:26', '2023-09-25 07:43:31', '0000-00-00 00:00:00'),
(104, 'TJFI-C00336', 'GPI0107', '3315010257', 'Laptop', 'Dell Latitude 3420', 'JDBVMG3', 'd4-54-8b-ed-c8-d0', 'Intel i5-1135G7', '8 GB', '500 GB', 'Rachmat Afriansyah', 0, 1, '2023-09-18 07:34:07', '2023-11-23 08:47:22', '0000-00-00 00:00:00'),
(105, 'TJFI-C00247', 'GPI0108', '3322061120', 'Laptop', 'Dell Latitude 3420', 'GCBVMG3', 'd4-54-8b-ed-c8-85', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dwi Cahyono', 0, 1, '2023-09-18 07:34:46', '2023-09-25 07:45:06', '0000-00-00 00:00:00'),
(106, 'TJFI-C00343', 'GPI0110', 'administrator', 'Laptop', 'Dell Latitude 3420', '6BBVMG3', 'b4-45-06-3e-08-1a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Matsumoto Kazuya', 0, 1, '2023-09-18 07:42:14', '2024-01-29 04:07:07', '0000-00-00 00:00:00'),
(107, 'TJFI-C00344', 'GPI0111', '3322111158', 'Laptop', 'Dell Latitude 3420', '97BVMG3', 'd4-54-8b-fe-56-af', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dita Kresawulandari', 0, 1, '2023-09-18 07:45:06', '2023-09-25 07:43:47', '0000-00-00 00:00:00'),
(108, 'TJFI-C00238', 'GPI0112', '3314060128', 'Laptop', 'Dell Latitude 3420', 'B9BVMG3', 'd4-54-8b-fe-48-09', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ai Fitria Wijayanti', 0, 1, '2023-09-18 07:45:54', '2023-09-25 07:44:09', '0000-00-00 00:00:00'),
(109, 'TJFI-C00257', 'GPI0115', '3317110616', 'Laptop', 'Dell Latitude 3420', 'HCBVMG3', 'd4-54-8b-e2-d5-ba', 'Intel i5-1135G7', '8 GB', '500 GB', 'Andry Mulyadi', 0, 1, '2023-09-18 07:46:44', '2023-09-25 07:44:28', '0000-00-00 00:00:00'),
(110, 'TJFI-C00236', 'GPI0002', 'administrator', 'Laptop', 'HP 240 G8', '5CG1319ZFR', '90-0f-0c-b1-8e-51', 'Intel i7-1065G7', '8 GB', '500 GB', 'Spare Old PC (Ex. Ai Fitria)', 0, 0, '2023-09-18 07:50:22', '2023-12-05 06:06:38', '0000-00-00 00:00:00'),
(111, 'TJFI-C00235', 'GPI0003', '3323101235', 'Laptop', 'Dell Latitude 3420', '1CBVMG3', 'd4-54-8b-e2-e9-4c', 'Intel i5-1135G7', '8 GB', '500 GB', 'Rindi Meldania', 0, 1, '2023-09-18 07:52:28', '2023-12-28 07:08:26', '0000-00-00 00:00:00'),
(112, 'TJFI-C00234', 'GPI0114', '3317010490', 'Laptop', 'Dell Latitude 3420', 'J7BVMG3', 'd4-54-8b-ff-41-dc', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dicky Herlambang', 0, 1, '2023-09-18 07:54:34', '2023-09-26 08:13:31', '0000-00-00 00:00:00'),
(113, 'TJFI-C00259', 'GPI0023', '3313110048', 'Laptop', 'Dell Latitude 3420', 'J7BVMG3', 'd4-54-8b-ff-41-cd', 'Intel i5-1135G7', '8 GB', '500 GB', 'Rinaldi Budiawan', 0, 1, '2023-09-18 07:56:11', '2023-09-18 08:21:41', '0000-00-00 00:00:00'),
(114, 'TJFI-C00345', 'GPI0113', '3323051186', 'Laptop', 'Dell Latitude 3420', '69BVMG3', 'd4-54-8b-fe-4a-0c', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dita Indah Rahutami', 0, 1, '2023-09-18 08:02:09', '2023-11-09 01:39:40', '0000-00-00 00:00:00'),
(115, 'TJFI-C00346', 'GPI0117', '3315060370', 'Laptop', 'Dell Latitude 3420', '5FBVMG3', 'd4-54-8b-ed-c7-c7', 'Intel i5-1135G7', '8 GB', '500 GB', 'Didin Saripudin', 0, 1, '2023-09-18 08:09:48', '2023-09-29 08:40:50', '0000-00-00 00:00:00'),
(116, 'TJFI-C00348', 'GPI0109', 'administrator', 'Laptop', 'Dell Latitude 3420', 'JCBVMG3', 'd4-54-8b-ed-c8-8f', 'Intel i5-1135G7', '8 GB', '500 GB', 'Spare', 0, 0, '2023-09-18 08:10:37', '2023-09-19 02:30:38', '0000-00-00 00:00:00'),
(117, 'TJFI-C00347', 'GPI0116', 'administrator', 'Laptop', 'Dell Latitude 3420', 'BDBVMG3', 'd4-54-8b-ed-c8-cb', 'Intel i5-1135G7', '8 GB', '500 GB', 'Support KDDI (Teddy)', 0, 1, '2023-09-18 08:14:39', '2023-10-21 02:43:29', '0000-00-00 00:00:00'),
(118, 'TJFI-C00349', 'GPI0001', 'administrator', 'Laptop', 'HP 240 G8', '5CG1319ZF0', '-', 'Intel i7-1065G7', '8 GB', '500 GB', 'Spare Old (Ex. Pak Haris)', 0, 0, '2023-09-18 08:18:37', '2024-01-24 03:46:47', '0000-00-00 00:00:00'),
(119, 'TJFI-C00350', 'GPI0021', 'administrator', 'Laptop', 'HP ProBook 440 G5', '5CD748BT6H', '28-c6-3f-a6-fa-31', 'Intel i7-8550U', '16 GB', '500 GB', 'Spare Old (Ex. Andry Mulyadi)', 0, 0, '2023-09-18 08:27:37', '2023-12-28 07:24:19', '0000-00-00 00:00:00'),
(120, 'TJFI-C00351', 'GPI0118', '3313050015', 'PC Desktop', 'Dell OptiPlex 5090', 'B6M2ZL3', '60-a5-e2-fd-82-fc', 'Intel i5-11500', '8 GB', '500 GB', 'Jarot Koerniawan', 0, 1, '2023-09-19 02:28:39', '2023-09-19 02:28:39', '0000-00-00 00:00:00'),
(122, 'TJFI-C00352', 'GPI0067', '3313050012', 'Laptop', 'HP 240 G6', '5CD8047FQV', '9c-30-5b-3a-15-05', 'Intel i3-6006U', '4 GB', '500GB', 'Gun Gun', 0, 1, '2023-10-11 07:56:38', '2023-12-28 07:09:21', '0000-00-00 00:00:00'),
(123, 'TJFI-C00353', 'GPI0119', '332205003M', 'Laptop', 'Dell Latitude 3420', '7PM0HX3', '30-05-05-50-25-49', 'intel i5-1145G7', '8 GB', '500 GB', 'Kazuyoshi Takeshima', 0, 1, '2023-10-13 03:21:58', '2024-01-19 03:38:04', '0000-00-00 00:00:00'),
(125, '----', 'GPI0120', 'administrator', 'PC Desktop', 'Dell OptoPlex Tower 7010', 'H4X3B04', '28-C5-D2-13-01-78', 'Intel i5-13500', '8 GB', '512 GB', 'ASAKAI P1', 0, 1, '2023-12-05 06:03:54', '2024-01-29 03:04:54', '0000-00-00 00:00:00'),
(126, '-', 'GPI0121', 'administrator', 'PC Desktop', 'Dell Optiplex Tower 7010', 'CDFHSY3', '74-3a-f4-6b-d6-18', 'intel i5-13500', '8 GB', '512 GB', 'ASAKAI P2', 0, 1, '2023-12-12 06:10:04', '2024-01-29 03:05:01', '0000-00-00 00:00:00'),
(127, '--', 'GPI0122', 'administrator', 'Laptop', 'Dell Latitude 3430', '4XVJJX3', '00-41-0e-59-57-93', 'Intel Core i5-1245U', '8 GB', '512 GB', 'Spare', 0, 0, '2023-12-13 03:39:31', '2023-12-13 03:39:44', '0000-00-00 00:00:00'),
(128, '-----', 'GPI0123', 'administrator', 'Laptop', 'Dell Latitude 3430', '3XVJJX3', '00-41-0e-59-57-b3', 'Intel i5-1245U', '8 GB', '500 GB', 'Spare', 0, 0, '2023-12-28 07:15:00', '2024-01-30 01:58:14', '0000-00-00 00:00:00'),
(129, '------', 'GPI0124', '332205005M', 'Laptop', 'Dell Latitude 3440', '6PJCPX3', 'a8-3b-76-aa-73-a7', 'Intel i5-1345U', '8 GB', '500 GB', 'Kazuki Uehara', 0, 1, '2024-01-19 01:55:40', '2024-01-29 08:55:12', '0000-00-00 00:00:00'),
(130, '-------', 'GPI0125', '332205004M', 'Laptop', 'Dell Latitude 3440', '5PJCPX3', 'a8-3b-76-aa-73-bb', 'Intel i5-1345U', '8 GB', '500 GB', 'Takatoshi Yamada', 0, 0, '2024-01-19 01:57:23', '2024-01-30 01:57:50', '0000-00-00 00:00:00'),
(131, '--------', 'GPI0126', '332201002M', 'Laptop', 'Dell Latitude 3440', '4PJCPX3', 'a8-3b-76-aa-73-8b', 'Intel i5-1345U', '8 GB', '500 GB', 'Yutaka Saito', 0, 0, '2024-01-19 01:58:39', '2024-01-30 01:57:28', '0000-00-00 00:00:00'),
(132, '---.--', 'CADMEISTER-01', 'CADMEISTER-01\\Administrator', 'PC Desktop', 'HP Z420 Workstation', 'SGH405RXD1', 'a0-48-1c-79-c3-83', 'Intel Xeon E5-1650', '8 GB', '500 GB', 'Muhamad Faqih', 9, 1, '2024-02-05 08:39:30', '2024-02-06 09:00:05', '0000-00-00 00:00:00'),
(133, '--.--', 'CUSTOMS_PC', 'CUSTOMS_PC\\USERCUSTOM', 'PC Desktop', 'HP Pro 3330 MT ', 'SGH346SPNH', '2c-44-fd-1b-3e-15', 'Intel i3-3220', '4 GB', '250 GB', 'IT Server', 14, 1, '2024-02-05 09:02:53', '2024-02-06 09:41:19', '0000-00-00 00:00:00'),
(134, '--.---', 'ICADSX-01', 'ICADSX-01\\Administrator', 'PC Desktop', 'HP Z230 SFF Workstation', 'SGH405RXK1', 'f0-92-1c-f0-f6-c4', 'Intel i5-4570', '4 GB', '500 GB', 'Mahfudz', 0, 1, '2024-02-05 09:05:16', '2024-02-05 09:05:16', '0000-00-00 00:00:00'),
(135, '.--.', 'PURCHASE-PC', 'PURCHASE-PC\\PURCHASE', 'PC Desktop', 'HP Pro 3330 MT ', 'SGH346SPKX', '2c-44-fd-1b-fd-c5', 'Intel i3-3220', '2 GB', '250 GB', 'Magang Purchasing', 0, 1, '2024-02-05 09:07:16', '2024-02-05 09:07:16', '0000-00-00 00:00:00'),
(136, '..--', 'TJFI-PC022', 'TJFI-PC022\\admin', 'PC Desktop', 'HP Z240 SFF Workstation', 'SGH744R27M', '3c-52-82-60-c8-24', 'Intel i7-6700', '8 GB', '500 GB', 'Muhamad Faqih', 0, 1, '2024-02-05 09:09:03', '2024-02-05 09:11:53', '0000-00-00 00:00:00'),
(137, '...-', 'WORKNC-01', 'WORKNC-01\\administrator', 'PC Desktop', 'HP Z420 Workstation', 'SGH405RXK2', 'f0-92-1c-e0-6f-ae', 'Intel Xeon E5-1620', '16 GB', '500 GB', 'Anowo Idris', 0, 1, '2024-02-05 09:13:37', '2024-02-05 09:13:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE IF NOT EXISTS `departemen` (
  `id_departemen` int(11) NOT NULL AUTO_INCREMENT,
  `kode_departemen` varchar(50) NOT NULL,
  `nama_departemen` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id_departemen`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `kode_departemen`, `nama_departemen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '0100', 'Corporate Planning', '2023-10-10 06:55:42', '2023-10-10 06:55:42', '0000-00-00 00:00:00'),
(4, '0200', 'HR & GA', '2023-10-10 06:56:09', '2023-10-10 06:56:09', '0000-00-00 00:00:00'),
(5, '0300', 'Accounting', '2023-10-10 06:56:40', '2023-10-11 02:03:39', '0000-00-00 00:00:00'),
(6, '0400', 'Purchasing', '2023-10-10 06:56:56', '2023-10-10 06:56:56', '0000-00-00 00:00:00'),
(7, '0500', 'EXIM', '2023-10-10 06:57:33', '2023-10-10 06:57:33', '0000-00-00 00:00:00'),
(8, '0600', 'Sales', '2023-10-10 06:57:43', '2023-10-10 06:57:43', '0000-00-00 00:00:00'),
(9, '1100', 'Forging', '2023-10-10 06:58:12', '2023-10-10 06:58:12', '0000-00-00 00:00:00'),
(10, '2000', 'QA & QC', '2023-10-10 06:58:22', '2023-10-10 06:58:22', '0000-00-00 00:00:00'),
(11, '3000', 'Maintenance', '2023-10-10 06:58:33', '2023-10-10 06:58:33', '0000-00-00 00:00:00'),
(12, '4000', 'PPIC', '2023-10-10 06:58:40', '2023-10-10 06:58:40', '0000-00-00 00:00:00'),
(13, '7000', 'PE', '2023-10-10 06:59:02', '2023-11-24 09:46:55', '0000-00-00 00:00:00'),
(14, '0250', 'IT', '2023-10-10 07:11:19', '2023-10-10 07:11:19', '0000-00-00 00:00:00'),
(15, '1500', 'Machining', '2023-10-12 02:28:59', '2023-10-12 02:28:59', '0000-00-00 00:00:00'),
(16, '1111', 'EXPAT', '2024-01-15 09:08:59', '2024-01-15 09:08:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lisensi`
--

CREATE TABLE IF NOT EXISTS `lisensi` (
  `id_lisensi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_lisensi` varchar(250) NOT NULL,
  `nama_produk` varchar(250) NOT NULL,
  `product_key` varchar(250) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `valid_until` date DEFAULT NULL,
  `status` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id_lisensi`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lisensi`
--

INSERT INTO `lisensi` (`id_lisensi`, `kode_lisensi`, `nama_produk`, `product_key`, `jenis`, `valid_until`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '67163857', 'Office 2007 Applications', 'CM898-YP7GF-HT229-3X9W2-4Y94G', 'VL Key', '2030-01-01', 1, '0000-00-00 00:00:00', '2024-01-25 02:02:13', '0000-00-00 00:00:00'),
(2, '65320773', 'Office 2007 Suites', 'TK73F-4BYJ3-RRK3Q-3XT8R-4Y6JG', 'VL Key', NULL, 1, '0000-00-00 00:00:00', '2024-01-12 06:27:15', '0000-00-00 00:00:00'),
(3, '67163857', 'Office 2007 Suites', 'GJM7B-7BW7H-DKDPX-9WDYH-WTDRT', 'VL Key', NULL, 1, '0000-00-00 00:00:00', '2024-01-12 06:27:21', '0000-00-00 00:00:00'),
(4, '67573740', 'Office 2007 Suites', 'J9XCR-YK66J-PCTRC-Q8TKV-JJ3RW', 'VL Key', NULL, 1, '0000-00-00 00:00:00', '2024-01-12 06:27:30', '0000-00-00 00:00:00'),
(5, '68385860', 'Office 2007 Suites', 'H3VFT-BMMF9-M9WXQ-QV8KB-XTPWJ', 'VL Key', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '69339734', 'Office 2007 Suites', 'TRRDP-GVFR6-XQ4DM-K964W-47FPB', 'VL Key', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '67163857', 'Office Professional Plus 2010', 'PQDRH-YB6FC-F2W9W-F8YGR-P2F76', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '67163857', 'Office Professional Plus 2010 with SP1', 'PQDRH-YB6FC-F2W9W-F8YGR-P2F76', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '67163857', 'Office Professional Plus 2013', 'HFFN2-R79GQ-HPWWC-MXR3H-2R2DH', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '67163857', 'Office Professional Plus 2013 with SP1', 'HFFN2-R79GQ-HPWWC-MXR3H-2R2DH', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '67163857', 'Office Professional Plus 2016', 'NW99F-YRCJD-4WB4V-HDP4Y-3GPQY', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '65320773', 'Office Standard 2010', '6J2TJ-Q84XB-RCT92-99JGV-T6R9Y', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '67163857', 'Office Standard 2010', '6QCHD-FFQFB-WV34B-CJMJX-R8V6P', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '67573740', 'Office Standard 2010', '7KXHQ-482H9-G396M-YTX76-PKJRF', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '68385860', 'Office Standard 2010', 'BKRK2-64WKF-YRX37-6YQBG-K8H83', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '69339734', 'Office Standard 2010', 'DY2PY-JJBXQ-FVJMH-JRG39-2XWPP', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '87262872', 'Office Standard 2010', 'HW8BY-XV4VC-JX4P8-YV2MV-MFRCJ', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '87360230', 'Office Standard 2010', 'MPDG3-2J3KG-4T9TH-M4M2Q-GWDVK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '87399547', 'Office Standard 2010', 'WYJCF-WQBW9-7WWB9-X42VM-GDJJ3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '65320773', 'Office Standard 2010 with SP1', '6J2TJ-Q84XB-RCT92-99JGV-T6R9Y', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '67163857', 'Office Standard 2010 with SP1', '6QCHD-FFQFB-WV34B-CJMJX-R8V6P', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '67573740', 'Office Standard 2010 with SP1', '7KXHQ-482H9-G396M-YTX76-PKJRF', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '68385860', 'Office Standard 2010 with SP1', 'BKRK2-64WKF-YRX37-6YQBG-K8H83', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '69339734', 'Office Standard 2010 with SP1', 'DY2PY-JJBXQ-FVJMH-JRG39-2XWPP', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '87262872', 'Office Standard 2010 with SP1', 'HW8BY-XV4VC-JX4P8-YV2MV-MFRCJ', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '87360230', 'Office Standard 2010 with SP1', 'MPDG3-2J3KG-4T9TH-M4M2Q-GWDVK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '87399547', 'Office Standard 2010 with SP1', 'WYJCF-WQBW9-7WWB9-X42VM-GDJJ3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '64444667', 'Office Standard 2013', '4YKX7-NX9WH-RXFPK-FX6FB-B4D7T', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '65320773', 'Office Standard 2013', 'DNPCM-44QY9-XH8FK-QXCHV-4CXMG', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '67163857', 'Office Standard 2013', 'NKFGJ-Y8J4W-XDTGF-3H8RC-DC8Q6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '67573740', 'Office Standard 2013', '7KDNQ-8XP96-XDMRK-2PVJQ-9737T', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '68385860', 'Office Standard 2013', '7NGKT-9XHT3-CQD26-7G9JW-82MHT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '69339734', 'Office Standard 2013', '3YP8X-88N3V-B2DXF-9Y4D2-Q3TYG', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '87262872', 'Office Standard 2013', 'N9CJW-69F32-Y3DMG-397DR-367VT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '87360230', 'Office Standard 2013', 'N2KXY-7CD9M-DRMB8-VHX2W-2GWQ6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '87399547', 'Office Standard 2013', '8P7RN-YJM7K-M6BGC-DRKVX-M96YG', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '64444667', 'Office Standard 2013 with SP1', '4YKX7-NX9WH-RXFPK-FX6FB-B4D7T', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '65320773', 'Office Standard 2013 with SP1', 'DNPCM-44QY9-XH8FK-QXCHV-4CXMG', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '67163857', 'Office Standard 2013 with SP1', 'NKFGJ-Y8J4W-XDTGF-3H8RC-DC8Q6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '67573740', 'Office Standard 2013 with SP1', '7KDNQ-8XP96-XDMRK-2PVJQ-9737T', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '68385860', 'Office Standard 2013 with SP1', '7NGKT-9XHT3-CQD26-7G9JW-82MHT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '69339734', 'Office Standard 2013 with SP1', '3YP8X-88N3V-B2DXF-9Y4D2-Q3TYG', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, '87262872', 'Office Standard 2013 with SP1', 'N9CJW-69F32-Y3DMG-397DR-367VT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '87360230', 'Office Standard 2013 with SP1', 'N2KXY-7CD9M-DRMB8-VHX2W-2GWQ6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '87399547', 'Office Standard 2013 with SP1', '8P7RN-YJM7K-M6BGC-DRKVX-M96YG', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, '67163857', 'Office Standard 2016', '7DKPH-8NGF2-4MTK7-TKPBR-WFHB2', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '67573740', 'Office Standard 2016', 'WHHXN-MC93B-7XMWH-KXCK9-WTYWC', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '68385860', 'Office Standard 2016', 'QGBJ7-XN394-FCV6K-V2398-4VV8C', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, '69339734', 'Office Standard 2016', '6K3XN-V9YV7-36CTD-DK3JR-X2FJC', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '87262872', 'Office Standard 2016', 'T9KNW-3RC4H-RV9P7-2F2BH-T3BWC', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '87360230', 'Office Standard 2016', 'QNH34-R3B3V-CVGMC-Y9CYY-K77B2', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, '87399547', 'Office Standard 2016', '7DQG6-NX2K3-B9TKT-CGK8K-GJGFP', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, '87262872', 'Office Standard 2019', '9VNF3-KR7VB-3HVJ9-C4XVR-KBWKY', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, '87360230', 'Office Standard 2019', 'QF92Y-GNJ73-KHK8H-QRFXF-9W4XY', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '87399547', 'Office Standard 2019', 'YMN7W-XR6MY-Y26DQ-4HHJV-3J4XY', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, '74139683', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional', 'BGTN9-F2Y3R-97FTG-94MCP-9QBQB', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '67163857', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional', 'NJYG9-HQBWT-Y4G9X-968D7-BDWXM', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, '68385860', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional', '9BWNW-VKDGF-Q92H4-BF8JD-KKXTY', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, '69339734', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional', 'XQ2HC-NQ9YM-HKP8X-XFCY3-B98XM', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, '87360225', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional', 'NK22P-CM3YD-892C6-PT6MQ-8K8XM', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, '87399546', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional', '2XH6W-NGP2G-QTKM3-V99X3-9766Y', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, '74139683', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'N3D3C-JHBJK-FPFVM-7KH7C-BTFH9', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '74139683', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'DN4PK-B83K3-JW7X4-TXPQP-P9YWG', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, '74139683', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'BGTN9-F2Y3R-97FTG-94MCP-9QBQB', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, '67163857', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'NJYG9-HQBWT-Y4G9X-968D7-BDWXM', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, '67163857', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'PCHNH-WTTHD-YTW7G-4CBKT-P7KYX', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, '67163857', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'T8NGB-KK6HX-R96V4-TKRKD-YBJ4T', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, '68385860', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'RDJNK-C6YHK-TJJ8M-BC47Y-88HBX', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, '68385860', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'PHNCX-Y62GQ-PXM2R-7PQQB-RC3M6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, '68385860', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', '9BWNW-VKDGF-Q92H4-BF8JD-KKXTY', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, '69339734', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', '94BNP-CQ6PX-T3W8M-PJB3H-CYV79', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, '69339734', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', '6B3HN-7X28F-4XYKX-RV3Q4-4X9Y6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, '69339734', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'XQ2HC-NQ9YM-HKP8X-XFCY3-B98XM', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, '87360225', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'VW9K4-M4NT3-TMJMX-2MKXT-VCGFT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, '87360225', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'NK22P-CM3YD-892C6-PT6MQ-8K8XM', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, '87360225', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'B879N-2C98G-XDV9H-YBRKQ-GF6FK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, '87399546', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', 'QJKP8-HNM6G-TJ6BJ-J6MGQ-FM7BX', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, '87399546', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', '2XH6W-NGP2G-QTKM3-V99X3-9766Y', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, '87399546', 'Windows 10 Pro / Windows 10 Pro for Workstations - Windows 10 Professional/Windows 10 Pro for Workstations', '6V4HF-NT4GX-P9K6P-CC7FW-78TFT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, '74139683', 'Windows 10 Pro N / Windows 10 Pro N for Workstations - Windows 10 Professional N', 'NVCM8-VMXM7-7QKHG-3JDC3-8K8XY', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, '67163857', 'Windows 10 Pro N / Windows 10 Pro N for Workstations - Windows 10 Professional N', 'NHW28-XJQQH-RXDQB-Q4GX8-F3KVB', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, '68385860', 'Windows 10 Pro N / Windows 10 Pro N for Workstations - Windows 10 Professional N', '3VWK6-NBD6W-C989B-V72F4-TVJXY', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, '69339734', 'Windows 10 Pro N / Windows 10 Pro N for Workstations - Windows 10 Professional N', 'HHJXP-7CNM8-CVFBK-67G79-JXCKY', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, '87360225', 'Windows 10 Pro N / Windows 10 Pro N for Workstations - Windows 10 Professional N', '6N8XY-6HB9F-C9QJ8-2FQ6J-9TPKY', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, '87399546', 'Windows 10 Pro N / Windows 10 Pro N for Workstations - Windows 10 Professional N', 'FXWVM-NFC96-XCPH4-8VTGM-VQWXY', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, '74139683', 'Windows 7 Professional', 'MDPBW-G4XWG-VRJ6Q-3KJC4-KMHV8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, '67163857', 'Windows 7 Professional', 'XCBR7-FVHYG-3VH3M-TCBXP-TR4M3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, '68385860', 'Windows 7 Professional', '488PV-FF3MR-D8YGB-R9D8J-YXBV6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, '69339734', 'Windows 7 Professional', '6BJKF-XQ972-DHK3D-VHKQT-BTMVT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, '87360225', 'Windows 7 Professional', '22B9K-M4HR2-C6J3Q-KD287-Y43Y8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, '87399546', 'Windows 7 Professional', 'GFB4H-96HYY-89KHM-3YQ6X-VF4VK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, '74139683', 'Windows 7 Professional K', 'MDPBW-G4XWG-VRJ6Q-3KJC4-KMHV8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, '67163857', 'Windows 7 Professional K', 'XCBR7-FVHYG-3VH3M-TCBXP-TR4M3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, '68385860', 'Windows 7 Professional K', '488PV-FF3MR-D8YGB-R9D8J-YXBV6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, '69339734', 'Windows 7 Professional K', '6BJKF-XQ972-DHK3D-VHKQT-BTMVT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, '87360225', 'Windows 7 Professional K', '22B9K-M4HR2-C6J3Q-KD287-Y43Y8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, '87399546', 'Windows 7 Professional K', 'GFB4H-96HYY-89KHM-3YQ6X-VF4VK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, '74139683', 'Windows 7 Professional K Upgrade - Windows 7 Professional K', 'MDPBW-G4XWG-VRJ6Q-3KJC4-KMHV8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, '67163857', 'Windows 7 Professional K Upgrade - Windows 7 Professional K', 'XCBR7-FVHYG-3VH3M-TCBXP-TR4M3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, '68385860', 'Windows 7 Professional K Upgrade - Windows 7 Professional K', '488PV-FF3MR-D8YGB-R9D8J-YXBV6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, '69339734', 'Windows 7 Professional K Upgrade - Windows 7 Professional K', '6BJKF-XQ972-DHK3D-VHKQT-BTMVT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, '87360225', 'Windows 7 Professional K Upgrade - Windows 7 Professional K', '22B9K-M4HR2-C6J3Q-KD287-Y43Y8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, '87399546', 'Windows 7 Professional K Upgrade - Windows 7 Professional K', 'GFB4H-96HYY-89KHM-3YQ6X-VF4VK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, '74139683', 'Windows 7 Professional K Upgrade with SP1 - Windows 7 Professional K with Service Pack 1', 'MDPBW-G4XWG-VRJ6Q-3KJC4-KMHV8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, '67163857', 'Windows 7 Professional K Upgrade with SP1 - Windows 7 Professional K with Service Pack 1', 'XCBR7-FVHYG-3VH3M-TCBXP-TR4M3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, '68385860', 'Windows 7 Professional K Upgrade with SP1 - Windows 7 Professional K with Service Pack 1', '488PV-FF3MR-D8YGB-R9D8J-YXBV6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, '69339734', 'Windows 7 Professional K Upgrade with SP1 - Windows 7 Professional K with Service Pack 1', '6BJKF-XQ972-DHK3D-VHKQT-BTMVT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, '87360225', 'Windows 7 Professional K Upgrade with SP1 - Windows 7 Professional K with Service Pack 1', '22B9K-M4HR2-C6J3Q-KD287-Y43Y8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, '87399546', 'Windows 7 Professional K Upgrade with SP1 - Windows 7 Professional K with Service Pack 1', 'GFB4H-96HYY-89KHM-3YQ6X-VF4VK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, '74139683', 'Windows 7 Professional K with SP1 - Windows 7 Professional K with Service Pack 1', 'MDPBW-G4XWG-VRJ6Q-3KJC4-KMHV8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, '67163857', 'Windows 7 Professional K with SP1 - Windows 7 Professional K with Service Pack 1', 'XCBR7-FVHYG-3VH3M-TCBXP-TR4M3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, '68385860', 'Windows 7 Professional K with SP1 - Windows 7 Professional K with Service Pack 1', '488PV-FF3MR-D8YGB-R9D8J-YXBV6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, '69339734', 'Windows 7 Professional K with SP1 - Windows 7 Professional K with Service Pack 1', '6BJKF-XQ972-DHK3D-VHKQT-BTMVT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, '87360225', 'Windows 7 Professional K with SP1 - Windows 7 Professional K with Service Pack 1', '22B9K-M4HR2-C6J3Q-KD287-Y43Y8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, '87399546', 'Windows 7 Professional K with SP1 - Windows 7 Professional K with Service Pack 1', 'GFB4H-96HYY-89KHM-3YQ6X-VF4VK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, '74139683', 'Windows 7 Professional N', 'MDPBW-G4XWG-VRJ6Q-3KJC4-KMHV8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, '67163857', 'Windows 7 Professional N', 'XCBR7-FVHYG-3VH3M-TCBXP-TR4M3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, '68385860', 'Windows 7 Professional N', '488PV-FF3MR-D8YGB-R9D8J-YXBV6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, '69339734', 'Windows 7 Professional N', '6BJKF-XQ972-DHK3D-VHKQT-BTMVT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, '87360225', 'Windows 7 Professional N', '22B9K-M4HR2-C6J3Q-KD287-Y43Y8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, '87399546', 'Windows 7 Professional N', 'GFB4H-96HYY-89KHM-3YQ6X-VF4VK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, '74139683', 'Windows 7 Professional N Upgrade - Windows 7 Professional N', 'MDPBW-G4XWG-VRJ6Q-3KJC4-KMHV8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, '67163857', 'Windows 7 Professional N Upgrade - Windows 7 Professional N', 'XCBR7-FVHYG-3VH3M-TCBXP-TR4M3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, '68385860', 'Windows 7 Professional N Upgrade - Windows 7 Professional N', '488PV-FF3MR-D8YGB-R9D8J-YXBV6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, '69339734', 'Windows 7 Professional N Upgrade - Windows 7 Professional N', '6BJKF-XQ972-DHK3D-VHKQT-BTMVT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, '87360225', 'Windows 7 Professional N Upgrade - Windows 7 Professional N', '22B9K-M4HR2-C6J3Q-KD287-Y43Y8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, '87399546', 'Windows 7 Professional N Upgrade - Windows 7 Professional N', 'GFB4H-96HYY-89KHM-3YQ6X-VF4VK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, '74139683', 'Windows 7 Professional N Upgrade with SP1 - Windows 7 Professional N with Service Pack 1', 'MDPBW-G4XWG-VRJ6Q-3KJC4-KMHV8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, '67163857', 'Windows 7 Professional N Upgrade with SP1 - Windows 7 Professional N with Service Pack 1', 'XCBR7-FVHYG-3VH3M-TCBXP-TR4M3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, '68385860', 'Windows 7 Professional N Upgrade with SP1 - Windows 7 Professional N with Service Pack 1', '488PV-FF3MR-D8YGB-R9D8J-YXBV6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, '69339734', 'Windows 7 Professional N Upgrade with SP1 - Windows 7 Professional N with Service Pack 1', '6BJKF-XQ972-DHK3D-VHKQT-BTMVT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, '87360225', 'Windows 7 Professional N Upgrade with SP1 - Windows 7 Professional N with Service Pack 1', '22B9K-M4HR2-C6J3Q-KD287-Y43Y8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, '87399546', 'Windows 7 Professional N Upgrade with SP1 - Windows 7 Professional N with Service Pack 1', 'GFB4H-96HYY-89KHM-3YQ6X-VF4VK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, '74139683', 'Windows 7 Professional N with SP1 - Windows 7 Professional N with Service Pack 1', 'MDPBW-G4XWG-VRJ6Q-3KJC4-KMHV8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, '67163857', 'Windows 7 Professional N with SP1 - Windows 7 Professional N with Service Pack 1', 'XCBR7-FVHYG-3VH3M-TCBXP-TR4M3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, '68385860', 'Windows 7 Professional N with SP1 - Windows 7 Professional N with Service Pack 1', '488PV-FF3MR-D8YGB-R9D8J-YXBV6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, '69339734', 'Windows 7 Professional N with SP1 - Windows 7 Professional N with Service Pack 1', '6BJKF-XQ972-DHK3D-VHKQT-BTMVT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, '87360225', 'Windows 7 Professional N with SP1 - Windows 7 Professional N with Service Pack 1', '22B9K-M4HR2-C6J3Q-KD287-Y43Y8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, '87399546', 'Windows 7 Professional N with SP1 - Windows 7 Professional N with Service Pack 1', 'GFB4H-96HYY-89KHM-3YQ6X-VF4VK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, '74139683', 'Windows 7 Professional Upgrade - Windows 7 Professional', 'MDPBW-G4XWG-VRJ6Q-3KJC4-KMHV8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, '67163857', 'Windows 7 Professional Upgrade - Windows 7 Professional', 'XCBR7-FVHYG-3VH3M-TCBXP-TR4M3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, '68385860', 'Windows 7 Professional Upgrade - Windows 7 Professional', '488PV-FF3MR-D8YGB-R9D8J-YXBV6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, '69339734', 'Windows 7 Professional Upgrade - Windows 7 Professional', '6BJKF-XQ972-DHK3D-VHKQT-BTMVT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, '87360225', 'Windows 7 Professional Upgrade - Windows 7 Professional', '22B9K-M4HR2-C6J3Q-KD287-Y43Y8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, '87399546', 'Windows 7 Professional Upgrade - Windows 7 Professional', 'GFB4H-96HYY-89KHM-3YQ6X-VF4VK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, '74139683', 'Windows 7 Professional Upgrade with SP1 - Windows 7 Professional with Service Pack 1', 'MDPBW-G4XWG-VRJ6Q-3KJC4-KMHV8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, '67163857', 'Windows 7 Professional Upgrade with SP1 - Windows 7 Professional with Service Pack 1', 'XCBR7-FVHYG-3VH3M-TCBXP-TR4M3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, '68385860', 'Windows 7 Professional Upgrade with SP1 - Windows 7 Professional with Service Pack 1', '488PV-FF3MR-D8YGB-R9D8J-YXBV6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, '69339734', 'Windows 7 Professional Upgrade with SP1 - Windows 7 Professional with Service Pack 1', '6BJKF-XQ972-DHK3D-VHKQT-BTMVT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, '87360225', 'Windows 7 Professional Upgrade with SP1 - Windows 7 Professional with Service Pack 1', '22B9K-M4HR2-C6J3Q-KD287-Y43Y8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, '87399546', 'Windows 7 Professional Upgrade with SP1 - Windows 7 Professional with Service Pack 1', 'GFB4H-96HYY-89KHM-3YQ6X-VF4VK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, '74139683', 'Windows 7 Professional with SP1 - Windows 7 Professional with Service Pack 1', 'MDPBW-G4XWG-VRJ6Q-3KJC4-KMHV8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, '67163857', 'Windows 7 Professional with SP1 - Windows 7 Professional with Service Pack 1', 'XCBR7-FVHYG-3VH3M-TCBXP-TR4M3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, '68385860', 'Windows 7 Professional with SP1 - Windows 7 Professional with Service Pack 1', '488PV-FF3MR-D8YGB-R9D8J-YXBV6', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, '69339734', 'Windows 7 Professional with SP1 - Windows 7 Professional with Service Pack 1', '6BJKF-XQ972-DHK3D-VHKQT-BTMVT', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, '87360225', 'Windows 7 Professional with SP1 - Windows 7 Professional with Service Pack 1', '22B9K-M4HR2-C6J3Q-KD287-Y43Y8', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, '87399546', 'Windows 7 Professional with SP1 - Windows 7 Professional with Service Pack 1', 'GFB4H-96HYY-89KHM-3YQ6X-VF4VK', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, '74139683', 'Windows 8.1 Pro - Windows 8.1 Professional', 'GQC4G-NGC8T-72X3M-XFMWT-KTMDQ', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, '67163857', 'Windows 8.1 Pro - Windows 8.1 Professional', 'YXQ6K-CN6X6-X4WFC-HYFPB-MY33Q', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, '68385860', 'Windows 8.1 Pro - Windows 8.1 Professional', 'YY6N4-BK6HX-RY8FD-FM3FC-27HQQ', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, '69339734', 'Windows 8.1 Pro - Windows 8.1 Professional', '6WN4G-RBVTR-XFDR2-VRH7X-3RQ3Q', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, '87360225', 'Windows 8.1 Pro - Windows 8.1 Professional', 'DR4XN-XJFHM-RV88H-BJPPQ-7T8K3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, '87399546', 'Windows 8.1 Pro - Windows 8.1 Professional', 'JBYNB-9W4YW-3X6DC-8K4D8-WB33Q', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, '74139683', 'Windows 8.1 Pro K - Windows 8.1 Professional K', 'GQC4G-NGC8T-72X3M-XFMWT-KTMDQ', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, '67163857', 'Windows 8.1 Pro K - Windows 8.1 Professional K', 'YXQ6K-CN6X6-X4WFC-HYFPB-MY33Q', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, '68385860', 'Windows 8.1 Pro K - Windows 8.1 Professional K', 'YY6N4-BK6HX-RY8FD-FM3FC-27HQQ', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, '69339734', 'Windows 8.1 Pro K - Windows 8.1 Professional K', '6WN4G-RBVTR-XFDR2-VRH7X-3RQ3Q', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, '87360225', 'Windows 8.1 Pro K - Windows 8.1 Professional K', 'DR4XN-XJFHM-RV88H-BJPPQ-7T8K3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, '87399546', 'Windows 8.1 Pro K - Windows 8.1 Professional K', 'JBYNB-9W4YW-3X6DC-8K4D8-WB33Q', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, '74139683', 'Windows 8.1 Pro N - Windows 8.1 Professional N', 'GQC4G-NGC8T-72X3M-XFMWT-KTMDQ', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, '67163857', 'Windows 8.1 Pro N - Windows 8.1 Professional N', 'YXQ6K-CN6X6-X4WFC-HYFPB-MY33Q', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, '68385860', 'Windows 8.1 Pro N - Windows 8.1 Professional N', 'YY6N4-BK6HX-RY8FD-FM3FC-27HQQ', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, '69339734', 'Windows 8.1 Pro N - Windows 8.1 Professional N', '6WN4G-RBVTR-XFDR2-VRH7X-3RQ3Q', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, '87360225', 'Windows 8.1 Pro N - Windows 8.1 Professional N', 'DR4XN-XJFHM-RV88H-BJPPQ-7T8K3', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, '87399546', 'Windows 8.1 Pro N - Windows 8.1 Professional N', 'JBYNB-9W4YW-3X6DC-8K4D8-WB33Q', 'MAK', NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(11, '2023-09-04-082654', 'App\\Database\\Migrations\\ComputerMigration', 'default', 'App', 1696228678, 1),
(12, '2023-09-04-082703', 'App\\Database\\Migrations\\PrinterMigration', 'default', 'App', 1696228678, 1),
(13, '2023-09-04-082712', 'App\\Database\\Migrations\\ProyektorMigration', 'default', 'App', 1696228678, 1),
(14, '2023-09-21-024410', 'App\\Database\\Migrations\\OtherMigration', 'default', 'App', 1696228678, 1),
(15, '2023-10-02-045532', 'App\\Database\\Migrations\\Task', 'default', 'App', 1696228679, 1),
(16, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1697772832, 2),
(17, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'App', 1699519719, 3);

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE IF NOT EXISTS `other` (
  `id_other` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `serial_number` varchar(150) NOT NULL,
  `plant` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id_other`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`id_other`, `device_id`, `jenis`, `nama_produk`, `serial_number`, `plant`, `lokasi`, `ip`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'MCDI0001', 'Pocker Wifi', 'Telkomsel', '-', 'Plant 1', '-', '-', '-', '2023-09-25 02:17:32', '2023-12-06 02:59:06', '0000-00-00 00:00:00'),
(7, 'MCDI0002', 'Pocket Wifi', 'Prolink', '249201224902676', 'Plant 1', '-', '-', 'Saito San', '2023-09-25 02:18:54', '2023-10-11 02:21:54', '0000-00-00 00:00:00'),
(8, 'MCDI0003', 'Pocket Wifi', 'Prolink', '249201224904575', 'Plant 1', 'Saito', '-', '-', '2023-09-25 02:19:36', '2023-09-25 02:19:36', '0000-00-00 00:00:00'),
(9, 'USMIH0001', 'Flashdisk', 'Sandisk 3.2 Gen 1', '010156F08F2442DBCD46F9A3B7C5EE518C7F68437473973C92640696E8CC4DA5BA90000000000000000000000092A040009873009155810736AF4481', 'Plant 1', 'QC', '-', 'Agung Laksono', '2023-09-25 02:20:39', '2023-09-25 02:23:24', '0000-00-00 00:00:00'),
(10, 'USMIH0002', 'Flashdisk', 'Sandisk 3.2 Gen 1', '0401669689CE17D93FB496DADE6468D072092486E91F253290E1EB76BDCBB2554CEC000000000000000000001AD904E0FF060618915581071FAEF4F9', 'Plant 1', 'Dies Maker', '-', 'Anowo Idris', '2023-09-25 02:21:33', '2023-09-25 02:23:45', '0000-00-00 00:00:00'),
(11, 'USMIH0003', 'Flashdisk', 'Sandisk 3.2 Gen 1', '04011306CDE0F88A7D34229E542CE2EC38077A2D17B1CD9B51B985A11EEF7C7A0B23000000000000000000005BDD26F5FF800518915581071FAEF4F3', 'Plant 2', 'Maintenance', '-', 'Dede Marjuki', '2023-09-25 02:24:37', '2023-09-25 02:24:37', '0000-00-00 00:00:00'),
(12, 'USMIH0004', 'Flashdisk', 'Sandisk 3.2 Gen 1', '01012B79573E23BF6B9C0DB92AFF068D9A0BB1BD7F22EBDAE10F3CB5D4DC9344F8D200000000000000000000F4695624008873009155810736AF4470', 'Plant 1', '-', '-', '-', '2023-09-25 02:25:34', '2023-11-07 01:33:52', '0000-00-00 00:00:00'),
(13, 'USMIH0005', 'Flashdisk', 'Sandisk 3.2 Gen 1', '01014D6B6EE85A7062CBD985223AC9290776B690F6F4076DCB46C9CD2F05A7F5C838000000000000000000005510B767009973009155810736AF4482', 'Plant 1', '-', '-', '-', '2023-09-25 02:26:03', '2023-11-07 01:34:22', '0000-00-00 00:00:00'),
(14, 'USMIH0006', 'Flashdisk', 'Sandisk 3.2 Gen 1', '040171072E2991CDA0D3A3DF4A4BDC1204FE271870666B21A41AC8D9DDF8A774A68100000000000000000000FB59EAFBFF150618915581071FAEF4E6', 'Plant 2', 'Tooling', '-', 'Agung Prasojo', '2023-09-25 02:26:42', '2023-09-25 02:26:42', '0000-00-00 00:00:00'),
(15, 'USMIH0007', 'Flashdisk', 'Sandisk 3.2 Gen 1', '040147DD67CD8A1F10DE701B4E31A53ECDCBAFFBE7245AD8772B31B3666645A96F1B00000000000000000000DA1BFB8DFF8D0518915581071FAEF524', 'Plant 1', 'QC', '-', 'Muh Muklis', '2023-09-25 02:27:09', '2023-09-25 02:27:09', '0000-00-00 00:00:00'),
(16, 'USMIH0008', 'Flashdisk', 'Sandisk 3.2 Gen 1', '04015030DB27BF8412A98559AC85CA57F4D2049892E32FE6CA222609A4B26BE6D2410000000000000000000060A3314B00930518915581071FAEF505', 'Plant 1', '-', '-', '-', '2023-09-25 02:27:37', '2023-09-25 02:27:37', '0000-00-00 00:00:00'),
(17, 'USMIH0009', 'Flashdisk', 'Sandisk 3.2 Gen 1', '0101B114E6C16AAC7519C6B6D3662DC3E3E758D4B05AB23EF20125D3FF58B47412600000000000000000000018C4B0A1FF9673009155810736AF4474', 'Plant 1', 'PE', '-', 'Anang Kuncoro', '2023-09-25 02:28:06', '2023-09-27 07:06:37', '0000-00-00 00:00:00'),
(18, 'USMIH0010', 'Flashdisk', 'Sandisk 3.2 Gen 1', '0101288F0657A092C42799B4F1DD47FF27D56362D15A9634A04834E54A8E450A0F9200000000000000000000968D81D1FF0C74009155810736AF444A', 'Plant 1', 'PE', '-', 'Ilham Aditya', '2023-09-25 02:28:25', '2023-11-21 02:08:43', '0000-00-00 00:00:00'),
(20, 'HCI0001', 'Server', 'Dell Server', '-', 'Plant 1', 'Data Center', '192.168.162.35', 'Accounting/HR Server', '2023-11-07 03:42:10', '2023-11-07 03:52:43', '0000-00-00 00:00:00'),
(21, 'HCI0002', 'Server', 'Dell Server', '-', 'Plant 1', 'Data Center', '192.168.162.36', 'Purchasing Server', '2023-11-07 03:43:02', '2023-11-07 03:52:49', '0000-00-00 00:00:00'),
(22, 'HCI0003', 'Server', 'Dell Server', '-', 'Plant 1', 'Data Center', '192.168.162.34', 'Odoo Server', '2023-11-07 03:43:32', '2023-11-07 03:52:59', '0000-00-00 00:00:00'),
(23, 'RTI0001', 'Router', 'Cisco 4321', '-', 'Plant 1', 'Server Room', '192.168.174.2', 'Main Router', '2023-11-07 03:51:59', '2023-11-07 03:53:07', '0000-00-00 00:00:00'),
(24, 'RTI0002', 'Router', 'Cisco 4321', '-', 'Plant 1', 'Server Room', '192.168.174.3', 'Sub Router', '2023-11-07 03:53:54', '2023-11-07 03:53:54', '0000-00-00 00:00:00'),
(25, 'LSI0001', 'Switch', 'CISCO 9300 NM-8X', '-', 'Plant 1', 'Server Room', '192.168.174.1', 'Main Switch', '2023-11-07 03:56:03', '2023-11-07 03:56:45', '0000-00-00 00:00:00'),
(26, 'LSI0002', 'Switch', 'CISCO 9300 NM-8X', '-', 'Plant 1', 'Server Room', '192.168.174.1', 'Sub Switch', '2023-11-07 03:56:34', '2023-11-07 03:56:54', '0000-00-00 00:00:00'),
(27, 'LSI0003', 'Switch', 'CISCO 1000 Series', '-', 'Plant 1', 'Server Room', '192.168.174.4', 'L2 Switch', '2023-11-07 03:58:19', '2023-11-07 03:58:19', '0000-00-00 00:00:00'),
(28, 'LSI0004', 'Switch', 'CISCO 1000 Series', '-', 'Plant 1', 'Server Room', '192.168.174.5', 'L2 Switch', '2023-11-07 04:00:07', '2023-11-07 04:00:07', '0000-00-00 00:00:00'),
(29, 'IPS0001', 'IPScan', 'Scope PROBE 100X', '-', 'Plant 1', 'Server Room', '192.168.174.10', 'IP Scan ', '2023-11-07 04:01:25', '2023-11-07 04:01:25', '0000-00-00 00:00:00'),
(30, 'KPI0001', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 1', 'Office Lantai 2', '192.168.174.20', 'Access Point Wifi', '2023-11-07 04:02:43', '2023-11-07 04:06:57', '0000-00-00 00:00:00'),
(31, 'KPI0002', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 1', 'Office Lantai 2', '192.168.174.21', 'Access Point Wifi', '2023-11-07 04:06:50', '2023-11-07 04:06:50', '0000-00-00 00:00:00'),
(32, 'KPI0003', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 1', 'Office Lantai 2', '192.168.174.22', 'Access Point Wifi', '2023-11-07 04:07:49', '2023-11-07 04:07:49', '0000-00-00 00:00:00'),
(33, 'KPI0004', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 1', 'Office Lantai 2', '192.168.174.23', 'Access Point Wifi', '2023-11-07 04:08:17', '2023-11-07 04:08:17', '0000-00-00 00:00:00'),
(34, 'KPI0005', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 1', 'Office Lantai 2', '192.168.174.24', 'Access Point Wifi', '2023-11-07 04:08:46', '2023-11-07 04:08:46', '0000-00-00 00:00:00'),
(35, 'KPI0006', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 1', 'Office Lantai 2', '192.168.174.25', 'Access Point Wifi', '2023-11-07 04:09:35', '2023-11-07 04:09:35', '0000-00-00 00:00:00'),
(36, 'KPI0007', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 1', 'Genba', '192.168.174.26', 'Access Point Wifi', '2023-11-07 04:10:19', '2023-11-07 04:10:19', '0000-00-00 00:00:00'),
(37, 'KPI0008', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 1', 'Genba', '192.168.174.27', 'Access Point Wifi', '2023-11-07 04:11:34', '2023-11-07 04:11:34', '0000-00-00 00:00:00'),
(38, 'KPI0009', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 1', 'Genba', '192.168.174.28', 'Access Point Wifi', '2023-11-07 04:12:01', '2023-11-07 04:12:01', '0000-00-00 00:00:00'),
(39, 'RTI0003', 'Router', 'CISCO 4321', '-', 'Plant 2', 'Server Rack', '192.168.176.2', 'Main Router', '2023-11-07 04:13:22', '2023-11-07 04:13:22', '0000-00-00 00:00:00'),
(40, 'RTI0004', 'Router', 'CISCO 4321', '-', 'Plant 2', 'Server Rack', '192.168.176.3', 'Sub Router', '2023-11-07 04:14:08', '2023-11-07 04:14:08', '0000-00-00 00:00:00'),
(41, 'LSI0005', 'Switch', 'CISCO 9300 NM-8X', '-', 'Plant 2', 'Server Rack', '192.168.176.1', 'Main Switch', '2023-11-07 04:15:26', '2023-11-07 04:15:26', '0000-00-00 00:00:00'),
(42, 'LSI0006', 'Switch', 'CISCO 9300 NM-8X', '-', 'Plant 2', 'Server Rack', '192.168.176.1', 'Sub Switch', '2023-11-07 04:16:04', '2023-11-07 04:16:04', '0000-00-00 00:00:00'),
(43, 'LSI0007', 'Switch', 'CISCO 1000 Series', '-', 'Plant 2', 'Server Rack', '192.168.176.4', 'L2 Switch', '2023-11-07 04:16:49', '2023-11-07 04:16:49', '0000-00-00 00:00:00'),
(44, 'LSI0008', 'Switch', 'CISCO 1000 Series', '-', 'Plant 2', 'Server Rack', '192.168.176.5', 'L2 Switch', '2023-11-07 04:17:36', '2023-11-07 04:17:36', '0000-00-00 00:00:00'),
(45, 'IPS0002', 'IPScan', 'Scope PROBE 100X', '-', 'Plant 2', 'Server Rack', '192.168.176.10', 'IP Scan ', '2023-11-07 04:18:59', '2023-11-07 04:18:59', '0000-00-00 00:00:00'),
(46, 'KPI0010', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 2', 'Office Lantai 2', '192.168.176.20', 'Access Point Wifi', '2023-11-07 04:19:46', '2023-11-07 04:19:46', '0000-00-00 00:00:00'),
(47, 'KPI0011', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 2', 'Office Lantai 2', '192.168.176.21', 'Access Point Wifi', '2023-11-07 04:20:12', '2023-11-07 04:20:12', '0000-00-00 00:00:00'),
(48, 'KPI0012', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 2', 'Office Lantai 2', '192.168.176.22', 'Access Point Wifi', '2023-11-07 04:20:53', '2023-11-07 04:20:53', '0000-00-00 00:00:00'),
(49, 'KPI0013', 'Access Point', 'CISCO 9100 AX', '-', 'Plant 2', 'Genba', '192.168.176.23', 'Access Point Wifi', '2023-11-07 04:21:36', '2023-11-07 04:21:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `printer`
--

CREATE TABLE IF NOT EXISTS `printer` (
  `id_printer` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `mac_sn` varchar(100) NOT NULL,
  `plant` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id_printer`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `printer`
--

INSERT INTO `printer` (`id_printer`, `device_id`, `jenis`, `merk`, `model`, `mac_sn`, `plant`, `lokasi`, `ip_address`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'JPI0001', 'INK', 'EPSON', 'L1455', '44:D2:44:FB:D7:E3', 'Plant 1', 'Ruang Sacho', '192.168.174.53', 1, '2023-09-19 06:26:36', '2024-01-25 03:34:12', '0000-00-00 00:00:00'),
(5, 'JPI0002', 'INK', 'EPSON', 'L14150', '50:57:9C:6C:11:7E', 'Plant 1', 'Belakang EXPAT', '192.168.174.54', 1, '2023-09-19 06:27:10', '2024-01-25 03:34:33', '0000-00-00 00:00:00'),
(6, 'JPI0003', 'INK', 'EPSON', 'L1300', '-', 'Plant 1', 'Server', '-', 0, '2023-09-19 06:27:49', '2024-01-25 02:15:10', '0000-00-00 00:00:00'),
(7, 'JPI0004', 'INK', 'EPSON', 'L1300', '-', 'Plant 1', 'Server', '-', 0, '2023-09-19 06:28:31', '2024-01-25 03:15:55', '0000-00-00 00:00:00'),
(8, 'JPI0005', 'INK', 'EPSON', 'L3210', '-', 'Plant 1', 'Machining', '-', 1, '2023-09-19 06:29:20', '2024-01-25 03:34:49', '0000-00-00 00:00:00'),
(9, 'JPI0006', 'INK', 'EPSON', 'L3110', '-', 'Plant 1', 'Tooling', '-', 1, '2023-09-19 06:30:00', '2024-01-25 03:35:02', '0000-00-00 00:00:00'),
(10, 'JPI0007', 'INK', 'EPSON', 'l3110', '-', 'Plant 1', 'Warehouse', '-', 1, '2023-09-19 07:01:21', '2024-01-25 03:35:27', '0000-00-00 00:00:00'),
(11, 'JPI0008', 'INK', 'EPSON', 'L360', '-', 'Plant 1', 'Server', '-', 0, '2023-09-19 07:01:59', '2024-01-25 02:15:38', '0000-00-00 00:00:00'),
(12, 'JPI0009', 'INK', 'EPSON', 'L3110', '-', 'Plant 1', 'Heat Treatment', '-', 1, '2023-09-19 07:04:01', '2024-01-25 03:35:49', '0000-00-00 00:00:00'),
(13, 'JPI0010', 'INK', 'EPSON', 'L360', '-', 'Plant 1', 'Server', '-', 0, '2023-09-19 07:04:54', '2024-01-25 02:16:28', '0000-00-00 00:00:00'),
(14, 'JPI0011', 'INK', 'EPSON', 'L360', '-', 'Plant 1', 'Maintenance', '-', 1, '2023-09-19 07:05:38', '2024-01-25 03:36:00', '0000-00-00 00:00:00'),
(15, 'JPI0012', 'INK', 'EPSON', 'L3210', '-', 'Plant 1', 'Dies Maker', '-', 1, '2023-09-19 07:27:13', '2024-01-25 03:36:13', '0000-00-00 00:00:00'),
(16, 'JPI0013', 'INK', 'EPSON', 'L1300', '-', 'Plant 2', 'Assembly', '-', 1, '2023-09-19 07:28:11', '2024-01-25 03:36:23', '0000-00-00 00:00:00'),
(17, 'JPI0014', 'INK', 'EPSON', 'L3210', '-', 'Plant 1', 'Tooling', '192.168.174.57', 1, '2023-09-19 07:29:13', '2024-01-25 03:36:49', '0000-00-00 00:00:00'),
(18, 'RPI0001', 'LASER', 'FUJIFILM', 'APEOS C2060', '1C:7D:22:55:8E:4F', 'Plant 1', 'Office Lantai 2', '192.168.174.59', 1, '2023-09-19 07:45:21', '2024-01-25 03:37:50', '0000-00-00 00:00:00'),
(19, 'RPI0002', 'LASER', 'FUJIFILM', 'APEOS 2560', '1C:7D:22:55:FC:71', 'Plant 1', 'Office Lantai 2', '192.168.174.58', 1, '2023-09-20 02:59:02', '2024-01-25 03:37:57', '0000-00-00 00:00:00'),
(20, 'RPI0003', 'LASER', 'FUJIXEROX', 'DOCU 2260', '08:00:37:D2:24:64', 'Plant 1', 'Produksi', '192.168.174.52', 1, '2023-09-20 02:59:57', '2024-01-25 03:38:05', '0000-00-00 00:00:00'),
(21, 'RPI0004', 'LASER', 'FUJIXEROX', 'DOCU 2260', '08:00:37:DE:0A:60', 'Plant 2', 'Produksi', '192.168.176.31', 1, '2023-09-20 03:00:38', '2024-01-25 03:38:12', '0000-00-00 00:00:00'),
(22, 'RPI0005', 'LASER', 'HP', 'LASERJET M651', '-', 'Plant 2', 'Office Lantai 2', '192.168.176.34', 1, '2023-09-20 03:01:53', '2024-01-25 03:38:20', '0000-00-00 00:00:00'),
(23, 'RPI0006', 'LASER', 'FUJIFILM', 'APEOS C2060', '1c:7d:22:55:8e:4b', 'Plant 2', 'Office Lantai 2', '192.168.176.59', 1, '2023-09-20 03:03:08', '2024-01-25 03:38:29', '0000-00-00 00:00:00'),
(24, 'RPI0007', 'LASER', 'HP', 'LASERJET M553', '-', 'Plant 2', 'Office Lantai 2', '192.168.176.33', 1, '2023-09-20 03:04:11', '2024-01-25 03:38:37', '0000-00-00 00:00:00'),
(25, 'RPI0008', 'LASER', 'FUJIXEROX', 'DOCUWIDE 2055', '00:26:73:64:9C:72', 'Plant 1', 'Office Lantai 2', '192.168.174.55', 1, '2023-09-20 03:05:39', '2024-01-25 03:39:00', '0000-00-00 00:00:00'),
(26, 'RPI0009', 'LASER', 'HP', 'LASERJET M5200', '68:B5:99:90:7A:83', 'Plant 1', 'Machining', '192.168.174.56', 1, '2023-09-20 03:10:03', '2024-01-25 03:39:08', '0000-00-00 00:00:00'),
(27, 'SPI0001', 'IMPACT', 'EPSON', 'LX-310', '-', 'Plant 1', 'Office Lantai 2', '-', 1, '2023-09-20 03:11:23', '2024-01-25 03:39:16', '0000-00-00 00:00:00'),
(28, 'SPI0002', 'IMPACT', 'SATO', 'CL4NX', '-', 'Plant 2', 'Office Lantai 2', '192.168.176.32', 1, '2023-09-20 03:12:20', '2024-01-25 03:39:22', '0000-00-00 00:00:00'),
(29, 'SPI0003', 'IMPACT', 'EPSON', 'LX-310', '80:3f:5d:08:d6:4b', 'Plant 1', 'Office Lantai 2', '192.168.174.61', 1, '2023-09-20 03:14:40', '2024-01-25 03:40:13', '0000-00-00 00:00:00'),
(30, 'SPI0004', 'IMPACT', 'FUJITSU', 'DL3850+', '-', 'Plant 1', 'Office Lantai 2', '-', 1, '2023-09-20 03:15:20', '2024-01-25 03:40:20', '0000-00-00 00:00:00'),
(31, 'JPI0015', 'INK', 'EPSON', 'L1300', '80:3f:5d:08:d6:27', 'Plant 1', 'Machining', '192.168.174.62', 1, '2023-09-20 03:17:01', '2024-01-25 03:36:56', '0000-00-00 00:00:00'),
(32, 'SPI0005', 'IMPACT', 'EPSON', 'LX-310', '-', 'Plant 2', 'Warehouse', '-', 1, '2023-09-20 03:17:55', '2024-01-25 03:40:27', '0000-00-00 00:00:00'),
(33, 'SPI0006', 'IMPACT', 'FUJITSU', 'DL3850+', '-', 'Plant 2', 'Office Lantai 2', '-', 1, '2023-09-20 03:18:38', '2024-01-25 03:40:32', '0000-00-00 00:00:00'),
(34, 'JPI0016', 'INK', 'EPSON', 'L14150', 'F8:25:51:C2:F5:D1 / X6QU035154', 'Plant 1', 'Office Lantai 2', '192.168.174.57', 1, '2023-10-18 02:06:32', '2024-01-25 03:37:05', '0000-00-00 00:00:00'),
(35, 'JPI0017', 'INK', 'EPSON', 'L3210', 'XAGKB07770', 'Plant 1', 'QC FINISHING', '-', 1, '2024-01-25 02:13:37', '2024-01-25 03:37:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `proyektor`
--

CREATE TABLE IF NOT EXISTS `proyektor` (
  `id_proyektor` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `plant` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id_proyektor`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `proyektor`
--

INSERT INTO `proyektor` (`id_proyektor`, `device_id`, `jenis`, `nama_produk`, `serial_number`, `plant`, `lokasi`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'PJI0001', 'Proyektor', 'EPSON EB-X500', 'X89B2300783', 'Plant 1', 'Meeting Room 1', 1, '2023-09-20 07:52:11', '2024-01-25 07:34:56', '0000-00-00 00:00:00'),
(4, 'PJI0002', 'Proyektor', 'EPSON EB-X300', 'WD6K6X01155', 'Plant 1', 'Meeting Room 2', 1, '2023-09-20 07:52:55', '2024-01-25 07:35:04', '0000-00-00 00:00:00'),
(5, 'PJI0003', 'Proyektor', 'EPSON EB-X450', 'X4HZ9300256', 'Plant 1', 'Guest Room', 1, '2023-09-20 07:54:38', '2024-01-25 07:35:14', '0000-00-00 00:00:00'),
(6, 'PJI0004', 'Proyektor', 'EPSON EB-U42', 'X4JS9200014', 'Plant 1', 'Conference Room', 1, '2023-09-20 07:55:06', '2024-01-25 07:35:19', '0000-00-00 00:00:00'),
(7, 'PJI0005', 'Proyektor', 'EPSON EB-X200', 'TVJK4401235', 'Plant 2', 'Conference Room', 1, '2023-09-20 07:56:12', '2024-01-25 07:35:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE IF NOT EXISTS `stok` (
  `id_stok` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `tanggal`, `kode_barang`, `nama_barang`, `jenis_barang`, `stok`, `satuan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, '2024-01-15', '0030', 'Tinta Epson 003 Cyan', 'Cair', 2, 'pcs', '2023-10-12 03:02:47', '2024-01-25 02:27:39', '0000-00-00 00:00:00'),
(6, '2024-01-15', '0031', 'Tinta Epson 003 Magenta', 'Cair', 0, 'pcs', '2023-10-12 03:03:34', '2024-01-25 02:27:46', '0000-00-00 00:00:00'),
(7, '2024-01-15', '0032', 'Tinta Epson 003 Yellow', 'Cair', 0, 'pcs', '2023-10-12 03:03:57', '2024-01-25 02:27:52', '0000-00-00 00:00:00'),
(8, '2024-01-15', '0033', 'Tinta Epson 003 Black', 'Cair', 0, 'pcs', '2023-10-12 03:04:26', '2024-01-25 02:27:58', '0000-00-00 00:00:00'),
(9, '2024-01-15', '6640', 'Tinta Epson 664 Cyan', 'Cair', 5, 'pcs', '2023-10-12 03:05:12', '2024-01-15 03:54:14', '0000-00-00 00:00:00'),
(10, '2024-01-15', '6641', 'Tinta Epson 664 Magenta', 'Cair', 5, 'pcs', '2023-10-12 03:05:40', '2024-01-15 03:54:26', '0000-00-00 00:00:00'),
(11, '2024-01-15', '6642', 'Tinta Epson 664 Yellow', 'Cair', 4, 'pcs', '2023-10-12 03:08:21', '2024-01-15 03:54:42', '0000-00-00 00:00:00'),
(12, '2024-01-15', '6643', 'Tinta Epson 664 Black', 'Cair', 3, 'pcs', '2023-10-12 03:08:44', '2024-01-25 02:28:13', '0000-00-00 00:00:00'),
(13, '2024-01-15', '0010', 'Tinta Epson 001 Cyan', 'Cair', 4, 'pcs', '2023-10-12 03:10:22', '2024-01-15 03:51:11', '0000-00-00 00:00:00'),
(14, '2024-01-15', '0011', 'Tinta Epson 001 Magenta', 'Cair', 4, 'pcs', '2023-10-12 03:10:49', '2024-01-15 03:51:20', '0000-00-00 00:00:00'),
(15, '2024-01-15', '0013', 'Tinta Epson 001 Yellow', 'Cair', 4, 'pcs', '2023-10-12 03:12:33', '2024-01-15 03:51:29', '0000-00-00 00:00:00'),
(16, '2024-01-15', '0014', 'Tinta Epson 001 Black', 'Cair', 5, 'pcs', '2023-10-12 03:13:08', '2024-01-15 03:51:38', '0000-00-00 00:00:00'),
(17, '2024-01-15', '3100', 'Ribbon Epson LX-310', 'Padat', 5, 'pcs', '2023-10-12 03:13:45', '2024-01-15 03:55:22', '0000-00-00 00:00:00'),
(18, '2024-01-15', '3500', 'Ribbon Fujitsu DL-3850+', 'Padat', 3, 'pcs', '2023-10-12 03:14:14', '2024-01-15 03:55:43', '0000-00-00 00:00:00'),
(19, '2023-10-17', '4500', 'Connector RJ45', 'Padat', 59, 'pcs', '2023-10-17 01:37:02', '2023-10-17 01:37:02', '0000-00-00 00:00:00'),
(20, '2023-10-17', '1100', 'Connector RJ11', 'Padat', 44, 'pcs', '2023-10-17 01:58:35', '2023-10-17 01:58:35', '0000-00-00 00:00:00'),
(21, '2023-10-18', '2200', 'Kabel HDMI', 'Padat', 4, 'pcs', '2023-10-18 02:43:51', '2023-10-31 07:53:42', '0000-00-00 00:00:00'),
(22, '2023-10-18', '2201', 'Kabel VGA', 'Padat', 20, 'pcs', '2023-10-18 02:44:12', '2023-10-18 02:44:12', '0000-00-00 00:00:00'),
(23, '2023-10-18', '2202', 'Converter VGA to HDMI', 'Padat', 2, 'pcs', '2023-10-18 02:44:43', '2023-10-18 02:44:43', '0000-00-00 00:00:00'),
(24, '2023-10-18', '2203', 'Kabel Console', 'Padat', 2, 'pcs', '2023-10-18 02:45:00', '2023-10-18 02:45:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `plant` varchar(20) NOT NULL,
  `masalah` varchar(255) NOT NULL,
  `penyelesaian` text NOT NULL,
  `status` int(11) NOT NULL,
  `frekuensi` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id_task`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `id_user`, `tanggal`, `id_departemen`, `plant`, `masalah`, `penyelesaian`, `status`, `frekuensi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 1, '2023-10-14', 14, 'Plant 2', 'Pasang Monitor CCTV', 'Pasang Monitor CCTV Plant 2', 2, 'Event', '2023-10-10 09:18:56', '2023-10-20 02:24:39', '0000-00-00 00:00:00'),
(14, 1, '2023-10-10', 14, 'Plant 1', 'Meeting IJTT', 'Meeting IJTT', 2, 'Weekly', '2023-10-10 09:19:44', '2023-10-20 02:23:50', '0000-00-00 00:00:00'),
(15, 1, '2023-10-11', 5, 'Plant 1', 'User baru', 'Buat ITRS untuk user baru', 2, 'Event', '2023-10-11 02:02:52', '2023-10-20 02:24:15', '0000-00-00 00:00:00'),
(16, 1, '2023-10-11', 8, 'Plant 1', 'Ga bisa print via Adobe Reader', 'Update Adobe Reader', 2, 'Event', '2023-10-11 02:15:59', '2023-10-20 02:25:22', '0000-00-00 00:00:00'),
(17, 1, '2023-10-11', 5, 'Plant 1', 'Setting laptop user baru', 'Pasang Krishdand, Ligatta, Office', 2, 'Event', '2023-10-11 07:52:15', '2023-10-20 02:25:58', '0000-00-00 00:00:00'),
(18, 1, '2023-10-11', 11, 'Plant 2', 'Ekpor email Lama ke email Baru', 'Menggunakan metode tembak ekpor dari laptop IT', 2, 'Event', '2023-10-11 07:53:30', '2023-10-20 02:27:08', '0000-00-00 00:00:00'),
(19, 1, '2023-10-12', 15, 'Plant 1', 'Toner printer tidak terbaca', 'Cabut pasang Toner', 2, 'Event', '2023-10-12 02:02:27', '2023-10-20 02:27:30', '0000-00-00 00:00:00'),
(20, 1, '2023-10-12', 4, 'Plant 1', 'Email eksternal tidak masuk', 'Buat ITRS untuk ganti konfigurasi email', 2, 'Event', '2023-10-12 02:23:33', '2023-10-20 02:27:55', '0000-00-00 00:00:00'),
(21, 1, '2023-10-12', 9, 'Plant 1', 'Ganti harddisk Laptop Forging', 'Ganti harddisk Laptop Forging', 2, 'Event', '2023-10-12 02:24:59', '2023-10-12 08:07:34', '0000-00-00 00:00:00'),
(22, 1, '2023-10-13', 14, 'Plant 1', 'Penggunaan Kertas', 'Buat grafik penggunaan kertas', 2, 'Weekly', '2023-10-13 03:13:07', '2023-10-20 02:34:30', '0000-00-00 00:00:00'),
(23, 2, '2023-10-13', 5, 'Plant 1', 'Install Stravis', 'Install Stravis', 2, 'Event', '2023-10-13 07:45:28', '2023-10-20 02:34:42', '0000-00-00 00:00:00'),
(24, 1, '2023-10-13', 4, 'Plant 1', 'Mesin finger tidak bisa tarik data', 'Cek jaringan, cek database', 2, 'Event', '2023-10-13 07:46:30', '2023-10-20 02:35:26', '0000-00-00 00:00:00'),
(25, 1, '2023-10-14', 14, 'Plant 1', 'Narik kabel Telkom', 'Narik kabel Telkom', 2, 'Event', '2023-10-14 01:30:27', '2023-10-20 02:35:39', '0000-00-00 00:00:00'),
(26, 1, '2023-10-16', 14, 'Plant 1', 'Backup email', 'Backup email user yang keluar', 2, 'Event', '2023-10-16 01:44:02', '2023-10-20 02:35:57', '0000-00-00 00:00:00'),
(27, 1, '2023-10-16', 14, 'Plant 1', 'Update Website', 'Update News website ', 2, 'Event', '2023-10-16 01:57:40', '2023-11-06 04:10:57', '0000-00-00 00:00:00'),
(28, 1, '2023-10-16', 10, 'Plant 2', 'Install software Dinolite 2', 'Install software Dinolite 2', 2, 'Event', '2023-10-16 06:31:23', '2023-10-20 02:36:29', '0000-00-00 00:00:00'),
(29, 1, '2023-10-17', 11, 'Plant 1', 'Printer tidak bisa Scan to PC', 'Ganti destinasi server', 2, 'Event', '2023-10-17 03:24:30', '2023-10-20 02:36:49', '0000-00-00 00:00:00'),
(30, 1, '2023-10-17', 14, 'Plant 1', 'Publish pembaruan Website', 'Publish News website', 2, 'Event', '2023-10-17 03:25:29', '2023-10-20 02:37:14', '0000-00-00 00:00:00'),
(31, 1, '2023-10-17', 14, 'Plant 1', 'Setting Scan Printer', 'Setting Scan dari SMB menjadi FTP', 2, 'Event', '2023-10-17 04:05:21', '2023-10-20 02:37:56', '0000-00-00 00:00:00'),
(32, 2, '2023-10-17', 14, 'Plant 1', 'Meeting IT IJTT', 'Meeting IT IJTT', 2, 'Weekly', '2023-10-17 07:41:35', '2023-10-20 02:38:05', '0000-00-00 00:00:00'),
(33, 1, '2023-10-17', 5, 'Plant 1', 'Krishand tidak bisa di buka', 'Cek Microsoft Access', 2, 'Event', '2023-10-17 08:52:08', '2023-10-20 02:38:29', '0000-00-00 00:00:00'),
(34, 1, '2023-10-18', 11, 'Plant 1', 'Ganti printer Tooling', 'Ganti printer Tooling', 2, 'Event', '2023-10-17 09:14:19', '2023-10-20 02:38:39', '0000-00-00 00:00:00'),
(35, 1, '2023-10-18', 12, 'Plant 1', 'Setting printer PR', 'Setting printer PR', 2, 'Event', '2023-10-18 02:08:39', '2023-10-20 02:38:47', '0000-00-00 00:00:00'),
(36, 2, '2023-10-19', 14, 'Plant 1', 'Windows Update', 'Windows Update GPI0084', 2, 'Monthly', '2023-10-18 02:09:14', '2023-10-24 04:31:23', '0000-00-00 00:00:00'),
(37, 1, '2023-10-23', 15, 'Plant 1', 'Setting Meeting Jump Up', 'Setting Kamera, Proyektor dan Jaringan', 2, 'Event', '2023-10-18 07:37:10', '2023-10-23 02:59:50', '0000-00-00 00:00:00'),
(38, 1, '2023-10-19', 4, 'Plant 1', 'Narik data fingerprint', 'Narik data fingerprint', 2, 'Event', '2023-10-19 03:02:09', '2023-10-20 02:39:37', '0000-00-00 00:00:00'),
(39, 1, '2023-10-19', 5, 'Plant 1', 'Install Ligatta', 'Install Ligatta', 2, 'Event', '2023-10-19 03:09:12', '2023-10-20 02:39:45', '0000-00-00 00:00:00'),
(40, 1, '2023-10-19', 11, 'Plant 1', 'setting printer Tooling', 'setting printer Tooling', 2, 'Event', '2023-10-19 04:15:37', '2023-11-06 04:11:10', '0000-00-00 00:00:00'),
(41, 1, '2023-10-19', 14, 'Plant 1', 'Setting Scan printer', 'Setting Scan printer Fujifilm', 2, 'Event', '2023-10-19 07:26:31', '2023-10-20 02:45:33', '0000-00-00 00:00:00'),
(42, 1, '2023-10-20', 14, 'Plant 2', 'Toner printer habis', 'Ganti toner printer', 2, 'Event', '2023-10-20 02:13:28', '2023-10-21 02:10:30', '0000-00-00 00:00:00'),
(43, 2, '2023-10-20', 14, 'Plant 1', 'Report CCTV', 'Report CCTV', 2, 'Event', '2023-10-20 02:58:40', '2023-10-23 07:32:51', '0000-00-00 00:00:00'),
(44, 1, '2023-10-20', 14, 'Plant 1', 'Kerta nyangkut di printer Fujifilm', 'Buka Tray A, cabut kertas', 2, 'Event', '2023-10-20 07:25:13', '2023-10-21 02:14:33', '0000-00-00 00:00:00'),
(45, 1, '2023-10-20', 14, 'Plant 1', 'Buat laporan penggunaan kertas', 'Buat laporan penggunaan kertas', 2, 'Event', '2023-10-20 07:26:05', '2023-10-20 07:26:05', '0000-00-00 00:00:00'),
(46, 2, '2023-10-21', 14, 'Plant 1', 'Relokasi Odoo', 'Relokasi server Odoo ke Data Center', 2, 'Event', '2023-10-21 02:06:11', '2023-10-21 09:45:26', '0000-00-00 00:00:00'),
(47, 1, '2023-10-21', 14, 'Plant 1', 'Server 3 penuh', 'Hapus File tidak terpakai', 2, 'Event', '2023-10-21 06:37:40', '2023-10-23 00:58:41', '0000-00-00 00:00:00'),
(49, 1, '2023-10-23', 10, 'Plant 2', 'Install Software', 'Install Dino Lite v2', 2, 'Event', '2023-10-23 03:38:07', '2023-10-23 07:34:08', '0000-00-00 00:00:00'),
(50, 1, '2023-10-23', 14, 'Plant 1', 'Jaringan Printer tidak stabil', 'Ganti kabel LAN', 2, 'Event', '2023-10-23 09:13:07', '2023-10-23 09:13:07', '0000-00-00 00:00:00'),
(51, 1, '2023-10-24', 14, 'Plant 1', 'Rename CCTV', 'Rename CCTV', 2, 'Event', '2023-10-24 02:34:08', '2023-10-24 02:34:08', '0000-00-00 00:00:00'),
(52, 1, '2023-10-24', 14, 'Plant 1', 'Meeting IJTT', 'Meeting IT IJTT', 2, 'Weekly', '2023-10-24 05:50:40', '2023-10-24 05:50:40', '0000-00-00 00:00:00'),
(53, 2, '2023-10-25', 5, 'Plant 1', 'Install Ligatta', 'Install Ligatta di laptop Pa Iman dan Pa Haer', 2, 'Event', '2023-10-25 02:23:02', '2023-10-26 02:54:42', '0000-00-00 00:00:00'),
(54, 2, '2023-10-25', 12, 'Plant 2', 'update akses file server P1 Pak Pian (read only) ', 'file server akses', 2, 'Event', '2023-10-25 03:32:34', '2023-11-02 01:15:21', '0000-00-00 00:00:00'),
(55, 2, '2023-11-13', 14, 'Plant 1', 'Trial slip gaji kirim by email', 'setting di aplikasi krishand', 0, 'Event', '2023-10-25 03:36:35', '2024-01-15 04:36:22', '0000-00-00 00:00:00'),
(56, 1, '2023-10-26', 4, 'Plant 1', 'Setting Printer', 'Setting printer slip gaji', 2, 'Monthly', '2023-10-26 09:39:59', '2023-10-26 09:39:59', '0000-00-00 00:00:00'),
(57, 1, '2023-10-30', 11, 'Plant 1', 'Mesin Tooling tidak bisa di Remote', 'Ganti IP Address', 2, 'Event', '2023-10-27 01:33:00', '2023-10-30 07:23:41', '0000-00-00 00:00:00'),
(58, 1, '2023-10-27', 8, 'Plant 1', 'Hasil scan tidak sampai ke Server', 'Ganti destinasi ke Laptop', 2, 'Event', '2023-10-27 01:33:47', '2023-10-27 01:33:47', '0000-00-00 00:00:00'),
(59, 1, '2023-10-27', 14, 'Plant 1', 'Buat Laporan penggunaan kertas', 'Buat Laporan penggunaan kertas', 2, 'Weekly', '2023-10-27 01:34:15', '2023-10-27 07:27:59', '0000-00-00 00:00:00'),
(60, 1, '2023-10-27', 12, 'Plant 1', 'Import Email', 'Import Email pa Sigit ke Email baru', 2, 'Event', '2023-10-27 01:51:09', '2023-10-30 03:59:23', '0000-00-00 00:00:00'),
(61, 1, '2023-10-27', 12, 'Plant 2', 'Setting Barcode Scanner', 'Setting Barcode Scanner', 2, 'Monthly', '2023-10-27 01:59:09', '2023-10-27 06:09:22', '0000-00-00 00:00:00'),
(62, 2, '2023-10-26', 14, 'Plant 1', 'quotation penggantian laptop user jepang', 'info Yano san untuk membuat quotation', 2, 'Event', '2023-10-30 01:40:00', '2023-10-30 01:40:00', '0000-00-00 00:00:00'),
(63, 1, '2023-10-30', 14, 'Plant 1', 'Tidak bisa telpon ke luar', 'Cek PABX dan jaringan Telkom', 2, 'Event', '2023-10-30 07:31:23', '2023-10-30 07:31:23', '0000-00-00 00:00:00'),
(64, 1, '2023-10-31', 12, 'Plant 2', 'Trial Barcode Scanner', 'Trial Barcode Scanner PPIC', 2, 'Event', '2023-10-31 01:04:05', '2023-10-31 04:21:12', '0000-00-00 00:00:00'),
(65, 1, '2023-10-31', 14, 'Plant 1', 'Buat Welcome Board', 'Buat Welcome Board untuk Tamu', 2, 'Event', '2023-10-31 01:30:04', '2023-10-31 07:54:18', '0000-00-00 00:00:00'),
(66, 1, '2023-10-31', 14, 'Plant 1', 'Scan tidak masuk ke Server', 'Pindah Port LAN', 2, 'Event', '2023-10-31 01:42:30', '2023-11-06 04:10:41', '0000-00-00 00:00:00'),
(67, 1, '2023-10-31', 10, 'Plant 2', 'Trial laptop untuk Asakai', 'Trial laptop untuk Asakai', 2, 'Event', '2023-10-31 01:44:08', '2023-10-31 04:22:12', '0000-00-00 00:00:00'),
(68, 2, '2023-11-05', 14, 'Plant 2', 'Aktivasi Line Telkom TJFI2', 'Aktivasi Line Telkom TJFI2', 2, 'Event', '2023-10-31 04:32:32', '2023-11-06 04:09:54', '0000-00-00 00:00:00'),
(69, 2, '2023-11-18', 14, 'Plant 1', 'instalasi backup line Telkom TJFI1', 'setup KDDI', 2, 'Event', '2023-10-31 04:33:02', '2023-11-20 02:16:32', '0000-00-00 00:00:00'),
(70, 1, '2023-11-02', 4, 'Plant 1', 'Download laporan absen lambat', 'Edit Database', 2, 'Event', '2023-11-02 01:29:56', '2023-11-03 02:36:03', '0000-00-00 00:00:00'),
(71, 1, '2023-11-03', 14, 'Plant 1', 'Buat laporan penggunaan kertas', 'Buat laporan penggunaan kertas', 2, 'Weekly', '2023-11-03 02:36:32', '2023-11-03 06:27:48', '0000-00-00 00:00:00'),
(72, 1, '2023-11-03', 11, 'Plant 2', 'Import Email lama Setiawan', 'Import Email lama ke email baru', 2, 'Event', '2023-11-03 03:11:51', '2023-11-03 06:27:58', '0000-00-00 00:00:00'),
(73, 1, '2023-11-03', 9, 'Plant 1', 'Import email lama Faqih', 'Import email lama ke email Baru', 2, 'Event', '2023-11-03 03:12:26', '2023-11-06 04:09:46', '0000-00-00 00:00:00'),
(74, 1, '2023-11-04', 14, 'Plant 1', 'Cleaning Server Room', 'Cleaning Server Room', 2, 'Event', '2023-11-04 09:00:40', '2023-11-04 09:00:40', '0000-00-00 00:00:00'),
(75, 1, '2023-11-06', 10, 'Plant 1', 'Printer tidak keluar tinta', 'Head Cleaning', 2, 'Event', '2023-11-06 03:59:44', '2023-11-06 03:59:44', '0000-00-00 00:00:00'),
(76, 1, '2023-11-06', 9, 'Plant 1', 'Tinta Dies hitam tidak keluar', 'Refill tinta ', 2, 'Event', '2023-11-06 04:00:28', '2023-11-06 04:00:28', '0000-00-00 00:00:00'),
(77, 1, '2023-11-06', 14, 'Plant 1', 'Update Stok', 'Update Stok Tinta/Toner/Ribbon', 2, 'Weekly', '2023-11-07 08:51:44', '2023-11-07 08:51:44', '0000-00-00 00:00:00'),
(78, 2, '2023-11-06', 14, 'Plant 1', 'Meeting IT', 'Meeting IT IJTT', 2, 'Event', '2023-11-07 08:52:20', '2023-11-07 08:52:20', '0000-00-00 00:00:00'),
(79, 1, '2023-11-07', 14, 'Plant 1', 'Update Web IT', 'Tambah fitur Ekspor Excel', 2, 'Event', '2023-11-07 08:53:18', '2023-11-07 08:53:18', '0000-00-00 00:00:00'),
(80, 1, '2023-11-07', 5, 'Plant 1', 'Laptop sering restart sendiri', 'Install Ulang Windows', 2, 'Event', '2023-11-07 08:55:15', '2023-11-08 00:57:51', '0000-00-00 00:00:00'),
(81, 1, '2023-11-08', 10, 'Plant 1', 'Nama karyawan tidak muncul di mesin Fingerprint', 'Tambahkan nama manual di Mesin', 2, 'Event', '2023-11-07 09:21:51', '2023-11-08 09:42:29', '0000-00-00 00:00:00'),
(82, 1, '2023-11-08', 5, 'Plant 1', 'Install Software Accounting (ITRS)', 'Install E-Tax', 2, 'Event', '2023-11-08 06:06:47', '2023-11-08 08:09:00', '0000-00-00 00:00:00'),
(83, 1, '2023-11-08', 10, 'Plant 1', 'Tinta habis', 'Ganti Cartridge ', 2, 'Event', '2023-11-08 06:33:13', '2023-11-08 06:33:13', '0000-00-00 00:00:00'),
(84, 2, '2023-11-08', 14, 'Plant 1', 'Tinta 951XL Habis', 'Order ke Purchasing', 2, 'Event', '2023-11-08 06:38:08', '2023-11-08 06:38:08', '0000-00-00 00:00:00'),
(85, 1, '2023-11-08', 9, 'Plant 1', 'Printer tidak terdeteksi', 'Ganti kabel USB', 2, 'Event', '2023-11-08 06:38:47', '2023-11-08 07:20:41', '0000-00-00 00:00:00'),
(86, 1, '2023-11-08', 4, 'Plant 1', 'Copy Fingerprint ke Plant 2', 'Copy Fingerprint dari Plant 1 ke Plant 2', 2, 'Event', '2023-11-08 08:53:35', '2023-11-08 08:53:35', '0000-00-00 00:00:00'),
(88, 1, '2023-11-09', 4, 'Plant 1', 'Buat Grafik Excel', 'Buat Grafik Excel', 2, 'Event', '2023-11-09 01:32:25', '2023-11-09 01:32:25', '0000-00-00 00:00:00'),
(89, 1, '2023-11-09', 15, 'Plant 1', 'Report penggunaan printer Machining', 'Report penggunaan printer Machining', 2, 'Weekly', '2023-11-09 01:36:45', '2023-11-09 01:36:45', '0000-00-00 00:00:00'),
(90, 2, '2023-11-09', 14, 'Plant 1', 'Meeting Odoo', 'Meeting Odoo bersama Vendor', 2, 'Event', '2023-11-09 01:48:58', '2023-11-09 02:31:57', '0000-00-00 00:00:00'),
(91, 1, '2023-11-09', 14, 'Plant 1', 'Install Software di PC Spare', 'Install SQL Express di PC Spare', 2, 'Event', '2023-11-09 03:17:26', '2023-11-09 04:30:53', '0000-00-00 00:00:00'),
(92, 1, '2023-11-09', 4, 'Plant 1', 'NIK di data Fingerprint tidak ada', 'Tambahkan NIK di Database', 2, 'Event', '2023-11-09 07:30:12', '2023-11-09 07:30:12', '0000-00-00 00:00:00'),
(93, 1, '2023-11-09', 12, 'Plant 1', 'Email tjforge tidak ada', 'Upload ulang di Outlook', 2, 'Event', '2023-11-09 07:30:47', '2023-11-09 08:34:29', '0000-00-00 00:00:00'),
(94, 1, '2023-11-09', 9, 'Plant 1', 'Tidak bisa print PR', 'Reconnect Jaringan Wifi', 2, 'Event', '2023-11-09 07:31:28', '2023-11-09 07:31:28', '0000-00-00 00:00:00'),
(95, 1, '2023-11-10', 9, 'Plant 1', 'Port USB printer rusak', 'Ganti printer', 2, 'Event', '2023-11-09 07:47:19', '2023-11-10 07:15:19', '0000-00-00 00:00:00'),
(96, 1, '2023-11-10', 14, 'Plant 1', 'Data Counter Printer berantakan', 'Rapihkan Data', 2, 'Event', '2023-11-10 01:31:54', '2023-11-10 03:18:28', '0000-00-00 00:00:00'),
(97, 1, '2023-11-10', 14, 'Plant 1', 'Hapus Data Server 3', 'Hapus Data Server 3', 2, 'Event', '2023-11-10 01:32:30', '2023-11-14 02:48:46', '0000-00-00 00:00:00'),
(98, 1, '2023-11-10', 14, 'Plant 1', 'Buat Report Counter Printer', 'Buat Report Counter Printer', 2, 'Weekly', '2023-11-10 01:32:57', '2023-11-10 03:18:37', '0000-00-00 00:00:00'),
(99, 2, '2023-11-10', 11, 'Plant 2', 'Buat User Rahmat di AD', 'Buat User Rahmat di AD', 2, 'Event', '2023-11-10 01:47:44', '2023-11-16 02:08:48', '0000-00-00 00:00:00'),
(100, 1, '2023-12-29', 14, 'Plant 1', 'Upload Email tjforge', 'Upload Email tjforge ke ijtt', 1, 'Event', '2023-11-10 03:21:08', '2023-11-28 09:45:39', '0000-00-00 00:00:00'),
(101, 1, '2023-11-10', 8, 'Plant 1', 'Scan tidak terkirim ke Laptop', 'Atur ulang destinasi', 2, 'Event', '2023-11-10 08:52:36', '2023-11-10 08:52:36', '0000-00-00 00:00:00'),
(102, 1, '2023-11-10', 11, 'Plant 1', 'Flashdisk tidak terbaca', 'Register Flashdisk di KCI', 2, 'Event', '2023-11-10 08:53:04', '2023-11-10 08:53:04', '0000-00-00 00:00:00'),
(103, 1, '2023-11-13', 15, 'Plant 1', 'Printer Error', 'Cabut Pasang Toner Cartridge', 2, 'Event', '2023-11-13 02:17:43', '2023-11-13 04:10:05', '0000-00-00 00:00:00'),
(104, 1, '2023-11-13', 10, 'Plant 1', 'Printer Error', 'Swtich Printer', 2, 'Event', '2023-11-13 04:10:29', '2023-11-13 04:10:29', '0000-00-00 00:00:00'),
(105, 2, '2023-11-13', 10, 'Plant 1', 'Proyektor ruang asakai kedip hasil display nya', 'cek proyektor (Kabel Power, Kabel HDMI, Lensa, Light Hour)', 2, 'Event', '2023-11-13 04:25:20', '2023-11-23 08:56:46', '0000-00-00 00:00:00'),
(106, 2, '2023-11-13', 14, 'Plant 1', 'WIndows Update', 'Windows Update', 2, 'Monthly', '2023-11-13 06:53:57', '2023-11-20 09:44:12', '0000-00-00 00:00:00'),
(113, 1, '2023-11-14', 4, 'Plant 1', 'Keyboard tidak berfungsi di Browser', 'Restart Browser', 2, 'Event', '2023-11-14 01:26:33', '2023-11-14 01:26:33', '0000-00-00 00:00:00'),
(116, 1, '2023-11-14', 4, 'Plant 1', 'Border Excel tidak berfungsi', 'Gunakan custom Border dan restart Excel', 2, 'Event', '2023-11-14 02:48:29', '2023-11-14 02:48:29', '0000-00-00 00:00:00'),
(117, 1, '2023-11-14', 14, 'Plant 1', 'Meeting Odoo', 'Meeting Fungsional Odoo', 2, 'Event', '2023-11-14 09:14:14', '2023-11-14 09:14:14', '0000-00-00 00:00:00'),
(118, 1, '2023-11-14', 4, 'Plant 1', 'Laptop Blank hitam', 'Rum Explorer.exe', 2, 'Event', '2023-11-14 09:14:43', '2023-11-14 09:14:43', '0000-00-00 00:00:00'),
(119, 1, '2023-11-14', 5, 'Plant 1', 'Download Report Odoo', 'Download Report BoM', 2, 'Event', '2023-11-14 09:26:17', '2023-11-14 09:26:17', '0000-00-00 00:00:00'),
(120, 1, '2023-11-14', 4, 'Plant 1', 'Tarik report absensi Lambat', 'Modifikasi Database, Hapus karyawan yang sudah tidak ada, Hapus Log Presensi di Mesin', 2, 'Event', '2023-11-14 09:38:30', '2023-11-24 01:25:38', '0000-00-00 00:00:00'),
(121, 1, '2023-11-15', 12, 'Plant 2', 'Install Driver Printer', 'Install Driver Printer Fujitsu', 2, 'Event', '2023-11-15 01:32:47', '2023-11-15 06:47:06', '0000-00-00 00:00:00'),
(122, 1, '2023-11-16', 15, 'Plant 1', 'Report penggunaan kertas Printer Machining', 'Report penggunaan kertas Printer Machining', 2, 'Weekly', '2023-11-15 01:33:27', '2023-11-16 08:04:05', '0000-00-00 00:00:00'),
(123, 1, '2023-11-15', 14, 'Plant 1', 'Cek Stok Toner/Tinta', 'Cek Stok Toner/Tinta', 2, 'Weekly', '2023-11-15 01:33:55', '2023-11-15 06:47:12', '0000-00-00 00:00:00'),
(124, 1, '2023-11-15', 7, 'Plant 1', 'Buat GDrive', 'Buat GDrive untuk EXIM', 2, 'Event', '2023-11-15 01:38:39', '2023-11-15 01:51:09', '0000-00-00 00:00:00'),
(125, 1, '2023-11-15', 15, 'Plant 1', 'Buat Email Baru Leader', 'Buat form ITRS (sitio_hasian & rusdiana_dian)', 2, 'Event', '2023-11-15 06:48:01', '2023-11-23 08:55:34', '0000-00-00 00:00:00'),
(126, 1, '2023-11-15', 9, 'Plant 1', 'Tidak bisa Print PR', 'Ubah jaringan Wifi', 2, 'Event', '2023-11-15 07:01:14', '2023-11-15 07:01:14', '0000-00-00 00:00:00'),
(129, 1, '2023-11-15', 8, 'Plant 1', 'Buat Fungsi Link di Excel', 'Buat Fungsi Link di Excel', 2, 'Event', '2023-11-15 08:32:31', '2023-11-15 08:32:31', '0000-00-00 00:00:00'),
(130, 1, '2023-11-16', 12, 'Plant 2', 'Tidak bisa akses Odoo di Scanner', 'Ganti IP Address Odoo', 2, 'Event', '2023-11-16 08:00:03', '2023-11-16 08:00:03', '0000-00-00 00:00:00'),
(131, 1, '2023-11-16', 4, 'Plant 2', 'Install Printer', 'Install Driver printer', 2, 'Event', '2023-11-16 08:03:15', '2023-11-16 08:03:15', '0000-00-00 00:00:00'),
(132, 2, '2023-11-20', 14, 'Plant 1', 'troubleshot PABX TJFI1', 'info vendor, Ganti IP Address, Hapus Greating', 2, 'Event', '2023-11-16 09:05:55', '2023-11-22 02:07:47', '0000-00-00 00:00:00'),
(133, 1, '2023-11-17', 4, 'Plant 1', 'Hasil cetak Belang', 'Head Cleaning', 2, 'Event', '2023-11-17 01:15:02', '2023-11-17 01:15:02', '0000-00-00 00:00:00'),
(134, 1, '2023-11-17', 14, 'Plant 1', 'Buat Report penggunaan kertas', 'Buat Report penggunaan kertas', 2, 'Weekly', '2023-11-17 01:15:35', '2023-11-17 03:06:06', '0000-00-00 00:00:00'),
(135, 1, '2023-11-17', 9, 'Plant 1', 'Backup FIle Server Forging', 'Backup File Forging ke Server 3', 2, 'Event', '2023-11-17 01:31:00', '2023-11-22 02:34:30', '0000-00-00 00:00:00'),
(136, 2, '2023-11-17', 15, 'Plant 1', 'add email di account AD dian dan hasian machining', 'add email di account AD', 2, 'Event', '2023-11-17 04:28:24', '2023-11-17 04:28:24', '0000-00-00 00:00:00'),
(137, 1, '2023-11-20', 14, 'Plant 1', 'Buat Report Instalasi Backup Telkom', 'Buat Report Instalasi Backup Telkom', 2, 'Event', '2023-11-20 02:17:14', '2023-11-20 02:17:14', '0000-00-00 00:00:00'),
(138, 1, '2023-11-20', 9, 'Plant 1', 'Tidak bisa print', 'Ena/Dis Jaringan, Restart PC, Open Bitlocker', 2, 'Event', '2023-11-20 02:18:13', '2023-11-20 02:18:13', '0000-00-00 00:00:00'),
(139, 1, '2023-11-20', 12, 'Plant 1', 'Setting Odoo', 'Setting Odoo laptop pa Budiawan', 2, 'Event', '2023-11-20 02:47:19', '2023-11-20 02:47:19', '0000-00-00 00:00:00'),
(140, 2, '2023-11-22', 11, 'Plant 2', 'Setting Laptop Maintenance', 'Setting Email rahmat, setting laptop Setiawan', 2, 'Event', '2023-11-20 02:49:13', '2023-11-22 09:27:10', '0000-00-00 00:00:00'),
(141, 1, '2023-11-20', 6, 'Plant 1', 'Buka Akses Purchasing laptop Mayta', 'Buka akses server purchasing', 2, 'Event', '2023-11-20 03:24:17', '2023-11-20 03:48:48', '0000-00-00 00:00:00'),
(142, 1, '2023-11-21', 11, 'Plant 2', 'Pindah data Email', 'Pindah data email Warehouse ke Rahmat', 2, 'Event', '2023-11-20 09:45:34', '2023-11-22 09:27:17', '0000-00-00 00:00:00'),
(143, 1, '2023-11-21', 6, 'Plant 1', 'Akses CCTV', 'Bea cukai minta screenshoot Live dan Playback CCTV Linex dan P2', 2, 'Event', '2023-11-22 02:09:57', '2023-11-22 02:09:57', '0000-00-00 00:00:00'),
(144, 1, '2023-11-22', 15, 'Plant 2', 'Tidak bisa install keybord Jepang', 'Edit di Group Policy', 2, 'Event', '2023-11-22 09:26:25', '2023-11-22 09:26:25', '0000-00-00 00:00:00'),
(145, 1, '2023-11-22', 11, 'Plant 2', 'Setyawan tidak bisa print', 'Buat User baru di printer', 2, 'Event', '2023-11-22 09:27:00', '2023-11-22 09:27:00', '0000-00-00 00:00:00'),
(146, 1, '2023-11-23', 11, 'Plant 2', 'Harga dan Qty di Ligatta tidak sesuai', 'Ganti format number, Decimal Symbol (,), Digit Grouping Symbol (.)', 2, 'Event', '2023-11-23 08:36:24', '2023-11-23 08:36:37', '0000-00-00 00:00:00'),
(147, 1, '2023-11-24', 14, 'Plant 1', 'Report penggunaan Kertas', 'buat rincian penggunaan per Printer/Departement', 2, 'Weekly', '2023-11-24 01:06:55', '2023-11-24 08:25:23', '0000-00-00 00:00:00'),
(148, 1, '2023-11-24', 7, 'Plant 1', 'Akses IT Inventory (Odoo)', 'Buat Form ITRS untuk akses IT Inventory (KITE) di Odoo', 2, 'Event', '2023-11-24 01:46:03', '2023-11-24 01:46:03', '0000-00-00 00:00:00'),
(150, 1, '2023-11-24', 5, 'Plant 1', 'Install Aplikasi', 'Install aplikasi Pajak (eSindo)', 2, 'Event', '2023-11-24 08:00:46', '2023-11-24 08:00:46', '0000-00-00 00:00:00'),
(151, 1, '2023-11-24', 13, 'Plant 1', 'Install Printer PR', 'Install Driver printer PR Form (192.168.174.58)', 2, 'Event', '2023-11-24 09:46:30', '2023-11-24 09:46:30', '0000-00-00 00:00:00'),
(152, 1, '2023-11-27', 15, 'Plant 1', 'Nama tidak muncul di mesin finger', 'Tambahkan Nama Karyawan di Mesin', 2, 'Event', '2023-11-27 01:02:32', '2023-11-27 06:12:10', '0000-00-00 00:00:00'),
(153, 1, '2023-11-27', 14, 'Plant 1', 'Cek Stok Toner/Tinta', 'Cek ketersediaan tinta/Toner Printer', 2, 'Weekly', '2023-11-27 01:04:42', '2023-11-27 06:17:52', '0000-00-00 00:00:00'),
(154, 1, '2023-11-27', 11, 'Plant 2', 'Backup Email Nada', 'Backup Email IJTT Nada', 2, 'Event', '2023-11-27 05:47:24', '2023-11-27 08:08:22', '0000-00-00 00:00:00'),
(155, 1, '2023-11-27', 4, 'Plant 1', 'Setting Printer', 'Setting printer slip gaji', 2, 'Monthly', '2023-11-28 01:02:38', '2023-11-28 01:02:38', '0000-00-00 00:00:00'),
(156, 1, '2023-11-28', 11, 'Plant 2', 'Tidak bisa Scan to PC', 'Setting IP Address dan Password Laptop', 2, 'Event', '2023-11-28 01:17:27', '2023-11-28 06:17:05', '0000-00-00 00:00:00'),
(157, 2, '2023-11-30', 4, 'Plant 2', 'mesin absen tidak connect, ping RTO', 'kabel LAN tidak terhubung dengan switch', 2, 'Event', '2023-11-28 06:18:44', '2024-01-22 08:07:42', '0000-00-00 00:00:00'),
(158, 17, '2023-11-28', 9, 'Plant 1', 'pinjem seratus', '', 2, 'Event', '2023-11-28 09:45:10', '2023-11-28 09:46:39', '0000-00-00 00:00:00'),
(159, 1, '2023-11-29', 4, 'Plant 1', 'Buat Rumus menghitung warna Excel', 'Buat di Makro', 2, 'Event', '2023-11-29 01:32:26', '2023-11-29 01:32:26', '0000-00-00 00:00:00'),
(160, 1, '2023-11-30', 15, 'Plant 1', 'Buat report Printer Machining', 'Buat report penggunaan kertas Printer Machining', 2, 'Weekly', '2023-11-30 01:01:12', '2023-12-01 05:50:10', '0000-00-00 00:00:00'),
(161, 1, '2023-11-30', 15, 'Plant 1', 'Toner Printer Machining tidak terbaca', 'Cabut Pasang Toner', 2, 'Event', '2023-11-30 01:04:52', '2023-11-30 02:39:56', '0000-00-00 00:00:00'),
(162, 1, '2023-11-30', 14, 'Plant 1', 'Buat Manual Guide', 'Buat manual guide untuk penggunaan Aplikasi Fingerprint', 2, 'Event', '2023-11-30 02:40:46', '2023-12-08 01:39:24', '0000-00-00 00:00:00'),
(163, 1, '2023-11-30', 5, 'Plant 1', 'Tombol arah Bawah tidak Responsive', 'Hubungi Vendor', 2, 'Event', '2023-11-30 04:18:55', '2023-12-06 04:11:16', '0000-00-00 00:00:00'),
(164, 1, '2023-12-01', 14, 'Plant 1', 'Buat report Penggunaan Kertas', 'Buat report Penggunaan Kertas', 2, 'Weekly', '2023-12-01 01:08:18', '2023-12-01 05:50:03', '0000-00-00 00:00:00'),
(165, 2, '2023-11-30', 13, 'Plant 1', 'ganti akun email autocad 2020 LT', 'informasi ke supplier untuk penggantian email lama ke email baru', 2, 'Event', '2023-12-01 04:24:40', '2023-12-01 04:24:40', '0000-00-00 00:00:00'),
(166, 2, '2023-11-30', 13, 'Plant 1', 'setting license autocad 2020 LT pakai email barudi laptop PE', 'buat account baru menggunakan email baru di web manage.autodesk.com', 2, 'Event', '2023-12-01 04:27:29', '2023-12-01 04:27:29', '0000-00-00 00:00:00'),
(167, 1, '2023-12-01', 4, 'Plant 1', 'Laptop tiba tiba mati', 'Ganti kabel Power', 2, 'Event', '2023-12-01 07:24:13', '2023-12-01 07:24:13', '0000-00-00 00:00:00'),
(168, 1, '2023-12-01', 9, 'Plant 1', 'Printer DocuWide 2055 tidak tersambung', 'Restart Printer', 2, 'Event', '2023-12-01 07:25:12', '2023-12-01 07:25:12', '0000-00-00 00:00:00'),
(169, 1, '2023-12-04', 14, 'Plant 1', 'Buat Report penggunaan Kertas', 'Buat Report jumlah penggunaan kertas Printer FujiFIlm', 2, 'Monthly', '2023-12-04 04:17:50', '2023-12-04 04:17:50', '0000-00-00 00:00:00'),
(170, 1, '2023-12-04', 14, 'Plant 2', 'Buat Report penggunaan kertas', 'Buat Report jumlah penggunaan kertas Printer FujiFIlm', 2, 'Monthly', '2023-12-04 04:18:15', '2023-12-04 04:18:15', '0000-00-00 00:00:00'),
(171, 1, '2023-12-04', 4, 'Plant 1', 'Paper Jam', 'Kertas nyangkut di printer Epson L14150, Buka Cover belakang, ambil kertas nyangkut ', 2, 'Event', '2023-12-04 04:19:19', '2023-12-04 04:19:19', '0000-00-00 00:00:00'),
(172, 1, '2023-12-04', 9, 'Plant 1', 'Tidak bisa Print PR', 'Cek jaringan Laptop dan jaringan Printer', 2, 'Event', '2023-12-04 04:19:49', '2023-12-04 04:19:49', '0000-00-00 00:00:00'),
(173, 1, '2023-12-04', 14, 'Plant 1', 'Cek Stok Tinta/Toner', 'Cek ketersediaan Tinta dan Toner', 2, 'Weekly', '2023-12-04 04:20:50', '2023-12-06 04:22:20', '0000-00-00 00:00:00'),
(174, 1, '2023-12-05', 10, 'Plant 1', 'Trial Asakai', 'Trial Asakai pakai Laptop Spare dan Switch', 2, 'Event', '2023-12-04 04:34:06', '2023-12-06 04:10:50', '0000-00-00 00:00:00'),
(175, 1, '2023-12-04', 15, 'Plant 1', 'Toner Printer Machining habis', 'Ganti Toner', 2, 'Event', '2023-12-04 08:23:02', '2023-12-04 08:23:02', '0000-00-00 00:00:00'),
(176, 1, '2023-12-04', 11, 'Plant 1', 'Hasil cetak Printer Tooling berbayang', 'Realignment Printer', 2, 'Event', '2023-12-04 08:24:01', '2023-12-04 08:24:01', '0000-00-00 00:00:00'),
(177, 1, '2023-12-04', 11, 'Plant 1', 'Tidak bisa Akses TMS', 'Ganti password Anydesk', 2, 'Event', '2023-12-04 08:24:35', '2023-12-15 01:22:39', '0000-00-00 00:00:00'),
(178, 1, '2023-12-04', 13, 'Plant 1', 'Teams tidak bisa connect jaringan', 'Sign Out laptop', 2, 'Event', '2023-12-05 01:01:57', '2023-12-05 01:01:57', '0000-00-00 00:00:00'),
(179, 1, '2023-12-05', 9, 'Plant 1', 'Hapus Data Forging di server', 'Hapus data forging di server yang sudah di backup', 2, 'Event', '2023-12-05 01:37:09', '2023-12-05 09:48:05', '0000-00-00 00:00:00'),
(180, 1, '2023-12-05', 10, 'Plant 1', 'Setting PC Asakai', 'Install KCI, Crowd Strike, Office 2016', 2, 'Event', '2023-12-05 01:40:29', '2023-12-05 06:26:29', '0000-00-00 00:00:00'),
(181, 1, '2023-12-06', 4, 'Plant 1', 'Setting Meeting HSE', 'Setting Meeting HSE', 2, 'Event', '2023-12-06 04:09:32', '2023-12-06 04:09:32', '0000-00-00 00:00:00'),
(182, 1, '2023-12-06', 10, 'Plant 2', 'Pasang PC Asakai', 'Setting Laptop untuk Asakai, Install Office, Install KCI, Install Crowd Strike', 2, 'Event', '2023-12-06 04:10:35', '2023-12-14 01:00:52', '0000-00-00 00:00:00'),
(183, 1, '2023-12-07', 14, 'Plant 1', 'Internet Down', 'Biznet FO Cut, Ganti perangkat Biznet (Modem)', 2, 'Event', '2023-12-07 06:58:56', '2023-12-07 06:58:56', '0000-00-00 00:00:00'),
(184, 1, '2023-12-08', 14, 'Plant 1', 'Report penggunaan Kertas', 'Report penggunaan kertas ', 2, 'Weekly', '2023-12-08 00:52:35', '2023-12-08 09:31:34', '0000-00-00 00:00:00'),
(185, 1, '2023-12-11', 5, 'Plant 1', 'Ganti Laptop Rindi', 'Ganti Laptop HP ke Dell', 2, 'Event', '2023-12-08 09:32:31', '2023-12-12 02:18:07', '0000-00-00 00:00:00'),
(186, 1, '2023-12-10', 14, 'Plant 2', 'Final Test Backup Line', 'Test Jaringan ', 2, 'Event', '2023-12-11 01:03:14', '2023-12-11 01:03:14', '0000-00-00 00:00:00'),
(187, 1, '2023-12-11', 4, 'Plant 1', 'Edit deskripsi Kalender Kerja 2024', 'Edit deskripsi Kalender 2024', 2, 'Event', '2023-12-11 02:24:15', '2023-12-11 02:24:15', '0000-00-00 00:00:00'),
(188, 1, '2023-12-12', 4, 'Plant 1', 'Buat grafik Working Accident', 'Buat grafik Working Accident', 2, 'Event', '2023-12-12 09:35:55', '2023-12-12 09:35:55', '0000-00-00 00:00:00'),
(189, 1, '2023-12-13', 14, 'Plant 1', 'Drum Cartdige Penuh', 'Ganti Drum Cartridge R1', 2, 'Event', '2023-12-13 01:40:27', '2023-12-13 01:40:27', '0000-00-00 00:00:00'),
(190, 1, '2023-12-15', 14, 'Plant 1', 'Buat Welcome Board', 'Buat Welcome Board untuk Tamu', 2, 'Event', '2023-12-15 01:22:11', '2023-12-15 01:22:11', '0000-00-00 00:00:00'),
(191, 1, '2023-12-15', 14, 'Plant 1', 'Buat Report penggunaan Kertas', 'Buat Report penggunaan Kertas', 2, 'Weekly', '2023-12-15 01:24:42', '2023-12-18 03:36:08', '0000-00-00 00:00:00'),
(192, 1, '2023-12-18', 10, 'Plant 2', 'Buat Welcome Board', 'Buat Welcome Board tamu', 2, 'Event', '2023-12-18 03:36:36', '2023-12-18 03:36:36', '0000-00-00 00:00:00'),
(193, 1, '2023-12-18', 14, 'Plant 2', 'Jam Mesin Fingerprint tidak sesuai', 'Sinkronisasi Jam', 2, 'Event', '2023-12-18 03:37:38', '2023-12-18 03:37:38', '0000-00-00 00:00:00'),
(194, 1, '2023-12-18', 5, 'Plant 1', 'Meeting Odoo', 'Meeting Odoo untuk membuat Report Accounting', 2, 'Event', '2023-12-19 01:27:07', '2023-12-19 01:27:07', '0000-00-00 00:00:00'),
(195, 1, '2023-12-19', 10, 'Plant 1', 'Buat Welcome Board', 'Buat Welcome Board untuk Tamu', 2, 'Event', '2023-12-19 01:27:33', '2023-12-19 01:27:33', '0000-00-00 00:00:00'),
(196, 1, '2023-12-19', 4, 'Plant 1', 'Setting Printer Slip Gaji', 'Setting Printer Slip Gaji', 2, 'Monthly', '2023-12-19 02:25:21', '2023-12-19 02:25:21', '0000-00-00 00:00:00'),
(197, 1, '2023-12-19', 14, 'Plant 1', 'Update Windows', 'Update Windows Security', 2, 'Monthly', '2023-12-19 09:07:52', '2023-12-22 09:01:52', '0000-00-00 00:00:00'),
(198, 1, '2023-12-20', 10, 'Plant 2', 'Install Font', 'Install Font Harveys Ball', 2, 'Event', '2023-12-20 08:24:17', '2023-12-20 08:24:17', '0000-00-00 00:00:00'),
(199, 1, '2023-12-20', 10, 'Plant 2', 'Icon Bluetooth tidak muncul', 'Setting di Pengaturan Bluetotth', 2, 'Event', '2023-12-20 08:26:36', '2023-12-20 08:26:36', '0000-00-00 00:00:00'),
(200, 1, '2023-12-20', 14, 'Plant 1', 'Cek Stok', 'Cek Ketersediaan Toner dan Tinta', 2, 'Weekly', '2023-12-20 08:54:26', '2023-12-20 08:54:26', '0000-00-00 00:00:00'),
(201, 1, '2023-12-21', 14, 'Plant 1', 'Paper Cassete Rusak', 'Kertas tidak mau narik lewat Paper Cassete (A4)', 2, 'Event', '2023-12-21 03:11:24', '2023-12-22 07:40:27', '0000-00-00 00:00:00'),
(202, 1, '2023-12-21', 11, 'Plant 1', 'Install Ulang Laptop Spare', 'Install ulang laptop spare untuk Maintenance Machining', 2, 'Event', '2023-12-21 03:12:14', '2024-01-05 08:59:32', '0000-00-00 00:00:00'),
(203, 1, '2023-12-22', 14, 'Plant 1', 'Buat Report penggunaan kertas', 'Buat Report penggunaan kertas', 2, 'Weekly', '2023-12-22 09:02:18', '2023-12-22 09:02:18', '0000-00-00 00:00:00'),
(204, 1, '2023-12-26', 11, 'Plant 2', 'Hasil Scan tidak masuk ke Komputer', 'Ganti IP Address di Printer', 2, 'Event', '2023-12-26 04:27:15', '2023-12-26 04:27:15', '0000-00-00 00:00:00'),
(205, 1, '2023-12-26', 10, 'Plant 1', 'Hasil cetak naik terus', 'Ubah Margin Top', 2, 'Event', '2023-12-26 06:50:44', '2023-12-27 06:57:30', '0000-00-00 00:00:00'),
(206, 1, '2023-12-26', 11, 'Plant 2', 'Lupa Password', 'Reset di AD Server', 2, 'Event', '2023-12-26 07:30:47', '2023-12-26 07:30:47', '0000-00-00 00:00:00'),
(207, 1, '2023-12-26', 14, 'Plant 2', 'LCD Printer error', 'Ganti LCD Backup Plant 1', 2, 'Event', '2023-12-26 08:47:15', '2023-12-26 08:47:15', '0000-00-00 00:00:00'),
(208, 1, '2023-12-27', 15, 'Plant 1', 'Laptop blank hitam', 'Tekan tombol Power 15 detik', 2, 'Event', '2023-12-27 02:01:48', '2023-12-27 02:01:48', '0000-00-00 00:00:00'),
(209, 1, '2024-01-04', 14, 'Plant 1', 'Buat report penggunaan kertas', 'Buat report penggunaan kertas', 2, 'Monthly', '2024-01-04 02:52:41', '2024-01-04 06:14:47', '0000-00-00 00:00:00'),
(210, 1, '2024-01-04', 14, 'Plant 1', 'Install font Harvey Balls', 'Install font Harvey Balls di Asakai PC', 2, 'Event', '2024-01-04 02:53:14', '2024-01-05 08:59:06', '0000-00-00 00:00:00'),
(211, 1, '2024-01-05', 12, 'Plant 2', 'Akun laptop Pian Sopian terkunci (locked)', 'Unlock di server AD', 2, 'Event', '2024-01-05 01:58:16', '2024-01-05 01:58:16', '0000-00-00 00:00:00'),
(212, 1, '2024-01-05', 5, 'Plant 1', 'Install Forticlient', 'Install Fortuclient di laptop DIta', 2, 'Event', '2024-01-05 08:58:45', '2024-01-05 08:58:45', '0000-00-00 00:00:00'),
(213, 1, '2024-01-08', 15, 'Plant 1', 'Report penggunaan Printer HP', 'Report penggunaan printer HP Machining', 2, 'Weekly', '2024-01-08 08:20:04', '2024-01-12 08:22:56', '0000-00-00 00:00:00'),
(214, 1, '2024-01-08', 11, 'Plant 1', 'Tidak bisa print PR', 'Ganti IP Address Printer', 2, 'Event', '2024-01-08 08:21:36', '2024-01-12 08:23:04', '0000-00-00 00:00:00'),
(215, 1, '2024-01-08', 14, 'Plant 2', 'Mesin Finger tidak konek', 'Ganti Connector', 2, 'Event', '2024-01-08 08:22:28', '2024-01-08 08:22:28', '0000-00-00 00:00:00'),
(216, 1, '2024-01-11', 14, 'Plant 1', 'Buat Fitur Renewal Lisensi', 'Buat Fitur Renewal Lisensi', 2, 'Event', '2024-01-11 09:08:34', '2024-01-12 08:24:22', '0000-00-00 00:00:00'),
(217, 1, '2024-01-15', 14, 'Plant 1', 'Report penggunaan kertas', 'Report penggunaan kertas', 2, 'Weekly', '2024-01-12 01:27:13', '2024-01-15 02:17:23', '0000-00-00 00:00:00'),
(218, 1, '2024-01-12', 4, 'Plant 1', 'Install Adobe Acrobat', 'Install Adobe Acrobat', 2, 'Event', '2024-01-12 09:20:00', '2024-01-29 07:49:32', '0000-00-00 00:00:00'),
(219, 1, '2024-01-16', 4, 'Plant 2', 'Pasang Telepon HRGA', 'Tarik kabel telepon untuk HRGA', 2, 'Event', '2024-01-15 01:58:13', '2024-01-25 07:34:24', '0000-00-00 00:00:00'),
(220, 1, '2024-01-15', 3, 'Plant 1', 'Speaker tidak bersuara saat Meeting', 'Uninstall Driver Speaker', 2, 'Event', '2024-01-15 03:09:21', '2024-01-15 03:09:21', '0000-00-00 00:00:00'),
(221, 1, '2024-01-15', 6, 'Plant 1', 'PC Purchasing tidak bisa akses Server', 'Update Password Login', 2, 'Event', '2024-01-15 03:41:52', '2024-01-15 03:41:52', '0000-00-00 00:00:00'),
(222, 1, '2024-01-15', 14, 'Plant 1', 'Reschedule Meeting', 'Reschedule Meeting Invosa jadi hari Jumat', 2, 'Event', '2024-01-15 03:42:24', '2024-01-16 04:21:13', '0000-00-00 00:00:00'),
(223, 1, '2024-02-02', 16, 'Plant 1', 'Ganti Laptop Jepang (Uehara San)', 'Ganti Laptop Jepang dengan laptop Baru', 2, 'Event', '2024-01-15 08:39:54', '2024-01-29 07:49:25', '0000-00-00 00:00:00'),
(224, 1, '2024-01-16', 10, 'Plant 2', 'Buat Welcome Board', 'Buat Welcome Board untuk Tamu', 2, 'Event', '2024-01-15 08:45:17', '2024-01-15 08:55:48', '0000-00-00 00:00:00'),
(225, 1, '2024-01-16', 10, 'Plant 2', 'Nama di mesin finger tidak sesuai', 'Ganti nama di Mesin', 2, 'Event', '2024-01-16 04:21:54', '2024-01-16 04:21:54', '0000-00-00 00:00:00'),
(228, 1, '2024-01-16', 14, 'Plant 2', 'Pasang Wirelock di PC', 'Pasang Wirelock PC Asakai', 2, 'Event', '2024-01-16 07:28:20', '2024-01-16 07:28:20', '0000-00-00 00:00:00'),
(229, 1, '2024-01-17', 3, 'Plant 1', 'Speaker laptop tidak bersuara', 'Update Driver', 2, 'Event', '2024-01-17 08:50:12', '2024-01-17 08:50:12', '0000-00-00 00:00:00'),
(230, 1, '2024-01-18', 14, 'Plant 1', 'Setting Laptop (Matsumoto)', 'Install Office 365, KCI, GSOC', 2, 'Event', '2024-01-18 03:49:53', '2024-01-22 01:39:40', '0000-00-00 00:00:00'),
(231, 1, '2024-01-19', 5, 'Plant 1', 'Speaker laptop tidak bersuara', 'Install ulang Driver Speaker', 2, 'Event', '2024-01-19 03:25:40', '2024-01-19 03:25:40', '0000-00-00 00:00:00'),
(232, 1, '2024-01-22', 14, 'Plant 1', 'Report penggunaan kertas', 'Buat Report penggunaan kertas', 2, 'Weekly', '2024-01-22 01:40:32', '2024-01-22 06:21:58', '0000-00-00 00:00:00'),
(233, 1, '2024-01-22', 16, 'Plant 1', 'Laptop MatsumotoTidak bisa print', 'Tambah User ID di Printer', 2, 'Event', '2024-01-22 05:47:37', '2024-01-22 05:47:37', '0000-00-00 00:00:00'),
(234, 1, '2024-01-22', 14, 'Plant 1', 'KCI Over Capacity', 'Hapus laptop yang sudah tidak terpakai', 2, 'Event', '2024-01-22 06:24:34', '2024-01-22 07:36:05', '0000-00-00 00:00:00'),
(235, 1, '2024-01-22', 10, 'Plant 1', 'Setting Printer', 'Setting Printer baru Maintenance QC', 2, 'Event', '2024-01-22 07:36:58', '2024-01-25 07:34:32', '0000-00-00 00:00:00'),
(236, 1, '2024-01-22', 9, 'Plant 1', 'Laptop Blank', 'Restart Paksa Laptop, tekan tombol Power 20 detik', 2, 'Event', '2024-01-22 08:10:45', '2024-01-22 08:10:45', '0000-00-00 00:00:00'),
(237, 1, '2024-01-22', 4, 'Plant 1', 'Buat Auto Rename File', 'Sub RenameFiles()\n\'Updateby20141124\nDim xDir As String\nDim xFile As String\nDim xRow As Long\nWith Application.FileDialog(msoFileDialogFolderPicker)\n    .AllowMultiSelect = False\nIf .Show = -1 Then\n    xDir = .SelectedItems(1)\n    xFile = Dir(xDir & Application.PathSeparator & \"*\")\n    Do Until xFile = \"\"\n        xRow = 0\n        On Error Resume Next\n        xRow = Application.Match(xFile, Range(\"A:A\"), 0)\n        If xRow > 0 Then\n            Name xDir & Application.PathSeparator & xFile As _\n            xDir & Application.PathSeparator & Cells(xRow, \"B\").Value\n        End If\n        xFile = Dir\n    Loop\nEnd If\nEnd With\nEnd Sub', 2, 'Event', '2024-01-22 09:18:16', '2024-01-22 09:22:32', '0000-00-00 00:00:00'),
(238, 2, '2024-01-24', 13, 'Plant 1', 'tidak bisa akses menggunakan forticlient (Pak ALi)', 'ganti ip remote gateway di aplikasi masih menggunakan ip remote gateway yang lama', 2, 'Event', '2024-01-24 06:01:23', '2024-01-24 06:01:23', '0000-00-00 00:00:00'),
(239, 1, '2024-01-26', 4, 'Plant 1', 'Krishand Payroll tidak bisa Preview Gaji', 'Jadikan Printer LX-310 Default', 2, 'Event', '2024-01-26 01:52:02', '2024-01-26 01:52:02', '0000-00-00 00:00:00'),
(240, 1, '2024-01-26', 4, 'Plant 2', 'Laptop Vani di P2 Tidak bisa masuk jaringan', 'Register MAC Address', 2, 'Event', '2024-01-26 01:52:42', '2024-01-26 01:52:42', '0000-00-00 00:00:00'),
(241, 1, '2024-01-26', 14, 'Plant 1', 'Order Tinta', 'Buat PR dan BA ke bagian GA', 2, 'Event', '2024-01-26 02:47:52', '2024-01-29 01:14:37', '0000-00-00 00:00:00'),
(242, 1, '2024-01-26', 4, 'Plant 1', 'Setting Printer Slip Gaji', 'Setting Printer Slip Gaji', 2, 'Monthly', '2024-01-26 02:50:50', '2024-01-26 02:50:50', '0000-00-00 00:00:00'),
(243, 1, '2024-01-26', 11, 'Plant 2', 'Aplikasi Excel untuk mesin tidak bisa di pakai', 'Downgrade Office Laptop MTC P2', 2, 'Event', '2024-01-26 03:45:41', '2024-02-05 04:35:20', '0000-00-00 00:00:00'),
(244, 1, '2024-01-29', 14, 'Plant 1', 'Windows Update', 'Windows Update', 2, 'Monthly', '2024-01-29 01:14:02', '2024-02-06 04:22:21', '0000-00-00 00:00:00'),
(245, 1, '2024-01-29', 3, 'Plant 1', 'Setting Meeting Plant Riview', 'Setting Meeting (Laptop, Camera, Proyektor)', 2, 'Event', '2024-01-29 04:34:41', '2024-01-29 06:17:14', '0000-00-00 00:00:00'),
(246, 1, '2024-01-29', 5, 'Plant 1', 'Setting Laptop untuk tarik Report', 'Setting Laptop untuk tarik Report Krishand tahun 2023 (April - Desember)', 2, 'Event', '2024-01-29 04:35:50', '2024-01-29 07:49:50', '0000-00-00 00:00:00'),
(247, 1, '2024-01-30', 16, 'Plant 1', 'Setting Laptop Jepang (Saito San)', 'Pindah data laptop lama ke laptop Baru', 2, 'Event', '2024-01-29 08:44:47', '2024-01-30 08:58:35', '0000-00-00 00:00:00'),
(248, 1, '2024-01-30', 3, 'Plant 1', 'Setting laptop jepang (Yamada)', 'Setting laptop baru (pindah data)', 2, 'Event', '2024-01-30 08:59:47', '2024-01-31 09:44:53', '0000-00-00 00:00:00'),
(249, 1, '2024-01-31', 6, 'Plant 1', 'Restore Data', 'Restore data tanggal 29 Januari 2024\r\nH:\\05. PURCHASING\\03. Export Import\\23. Laporan SIINAS\\2023\\Jan-Jun 2023\r\nnama file : Data PIB Jan-Jun 2023 IMA', 2, 'Event', '2024-01-31 03:37:42', '2024-01-31 09:44:45', '0000-00-00 00:00:00'),
(250, 1, '2024-02-01', 14, 'Plant 2', 'Proyektor P2 sering mati', 'Switch Proyektor', 0, 'Event', '2024-02-01 01:40:58', '2024-02-01 01:40:58', '0000-00-00 00:00:00'),
(251, 1, '2024-02-01', 9, 'Plant 1', 'Charger laptop mati (Usup)', 'Ganti kabel Power', 2, 'Event', '2024-02-01 02:34:54', '2024-02-01 03:12:21', '0000-00-00 00:00:00'),
(252, 1, '2024-02-02', 11, 'Plant 2', 'Tidak bisa remote ke TMS (Pak Henri)', 'Cek/ganti password Anydesk TMS', 0, 'Event', '2024-02-02 03:48:49', '2024-02-06 02:47:41', '0000-00-00 00:00:00'),
(253, 1, '2024-02-05', 8, 'Plant 1', 'Buat layout Company Profile', 'Buat layout Company Profile', 2, 'Event', '2024-02-05 04:35:48', '2024-02-05 04:35:48', '0000-00-00 00:00:00'),
(254, 1, '2024-02-05', 14, 'Plant 1', 'Report penggunaan kertas', 'Report penggunaan kertas', 2, 'Monthly', '2024-02-05 06:19:18', '2024-02-05 06:19:18', '0000-00-00 00:00:00'),
(255, 1, '2024-02-29', 12, 'Plant 1', 'Pasang AP di Area PPIC P2', 'Pasang AP di Area PPIC P2', 0, 'Event', '2024-02-05 06:43:09', '2024-02-05 06:43:09', '0000-00-00 00:00:00'),
(256, 1, '2024-02-06', 14, 'Plant 1', 'Cover A Printer terbuka', 'Cover Printer FUjiXerox Produksi sering terbuka, Lakban', 0, 'Event', '2024-02-06 01:37:16', '2024-02-06 01:37:16', '0000-00-00 00:00:00'),
(257, 1, '2024-02-06', 14, 'Plant 2', 'Hasil printer FujiXerox Produksi bergaris', 'Ganti Drum Cartridge', 2, 'Event', '2024-02-06 01:38:07', '2024-02-06 04:22:14', '0000-00-00 00:00:00'),
(258, 2, '2024-02-05', 10, 'Plant 1', 'tidak bisa Scan printer epson', 'instal aplikasi scan epson L3210', 2, 'Event', '2024-02-06 02:46:50', '2024-02-06 02:46:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dwi.cahyono@ijtt-id.com', 'Dwi Cahyono', '$2y$10$Md2nRu0JMllJ.8f1ngexYOpGfykB3c5xd7QEKeF8B6s.mMQQCfeD2', NULL, NULL, NULL, '2ef4c444205cf3fd32675d95398d0b65', NULL, NULL, 1, 0, '2023-10-20 03:43:56', '2023-10-20 03:43:56', NULL),
(2, 'zulfy@ijtt-id.com', 'Zulfy Triyoga', '$2y$10$n6RUArGEWhgEW0mwubzyUeL/Wd.e8v4NYobAI.Go8Zmk6xIN0T1ye', NULL, NULL, NULL, 'de61f0ba11ca56023736ddb5a5eb2f33', NULL, NULL, 1, 0, '2023-10-20 04:15:16', '2023-10-20 04:15:16', NULL),
(17, 'dummy@gmail.com', 'Dummy', '$2y$10$bEQHlvq0ICYg/NrHo1yv5Onqb7w51pLTxeIpN2Sej59ek6FVoreZW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-11-28 09:44:14', '2023-11-28 09:44:14', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
