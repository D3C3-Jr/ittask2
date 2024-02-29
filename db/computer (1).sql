-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 06:05 AM
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
-- Database: `ittask2`
--

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

CREATE TABLE `computer` (
  `id_computer` int(11) NOT NULL,
  `asset_number` varchar(100) NOT NULL,
  `device_id` varchar(100) NOT NULL,
  `login_user` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `os` varchar(50) NOT NULL,
  `serial_number` varchar(100) NOT NULL,
  `mac_address` varchar(100) NOT NULL,
  `prosesor` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `rom` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `plant` varchar(50) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `computer`
--

INSERT INTO `computer` (`id_computer`, `asset_number`, `device_id`, `login_user`, `jenis`, `nama_produk`, `os`, `serial_number`, `mac_address`, `prosesor`, `ram`, `rom`, `user`, `plant`, `id_departemen`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TJFI-C00239', 'GPI0004', '3314080162', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '2FBVMG3', 'D4-54-8B-ED-C7-9F', 'Intel i5-1135G7', '8 GB', '500 GB', 'Eksi Romiasih', 'Plant 1', 4, 1, '2023-09-15 04:39:52', '2024-02-07 01:19:45', '0000-00-00 00:00:00'),
(2, 'TJFI-C00240', 'GPI0005', '3316040425', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'J6BVMG3', 'D4-54-8B-FE-3E-7C', 'Intel i5-1135G7', '8 GB', '500 GB', 'Adnan Hasyim', 'Plant 1', 4, 1, '2023-09-15 04:41:49', '2024-02-07 01:19:53', '0000-00-00 00:00:00'),
(6, 'TJFI-C00241', 'GPI0006', '3318070700', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'G8BVMG3', 'D4-54-8B-FE-3D-B9', 'Intel i5-1135G7', '8 GB', '500 GB', 'Yudha Pratama', 'Plant 1', 4, 1, '2023-09-15 09:19:06', '2024-02-07 01:20:10', '0000-00-00 00:00:00'),
(7, 'TJFI-C00242', 'GPI0007', '3320120906', 'Laptop', 'Dell Latitude 3420 ', 'Windows 10', '2DBVMG3', 'D4-54-8B-ED-C8-9E', 'Intel i5-1135G7', '8 GB', '500 GB', 'Heni Priyanti', 'Plant 1', 4, 1, '2023-09-15 09:28:57', '2024-02-07 01:20:02', '0000-00-00 00:00:00'),
(8, 'TJFI-C00243', 'GPI0008', '3321111027', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'J8BVMG3', 'D4-54-8B-ED-C8-A8', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ageng Tirto', 'Plant 1', 4, 1, '2023-09-15 09:33:47', '2024-02-07 01:20:18', '0000-00-00 00:00:00'),
(9, 'TJFI-C00244', 'GPI0009', '3323091221', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '8CBVMG3', 'D4-54-8B-E2-E9-51', 'Intel i5-1135G7', '8 GB', '500 GB', 'Haerudinsyah', 'Plant 1', 5, 1, '2023-09-15 09:36:46', '2024-02-07 01:20:32', '0000-00-00 00:00:00'),
(10, 'TJFI-C00245', 'GPI0010', '3316010414', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'FDBVMG3', 'D4-54-8B-ED-C9-3E', 'Intel i5-1135G7', '8 GB', '500 GB', 'Agung Prasojo', 'Plant 1', 11, 1, '2023-09-15 09:40:10', '2024-02-07 01:20:48', '0000-00-00 00:00:00'),
(11, 'TJFI-C00246', 'GPI0011', '3314090181', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'HDBVMG3', 'D4-54-8B-FF-22-60', 'Intel i5-1135G7', '8 GB', '500 GB', 'Mahfudz', 'Plant 1', 9, 1, '2023-09-15 09:41:42', '2024-02-07 01:21:00', '0000-00-00 00:00:00'),
(12, 'TJFI-C00248', 'GPI0012', '3316070437', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '68BVMG3', 'D4-54-8B-FE-56-C8', 'Intel i5-1135G7', '8 GB', '500 GB', 'Sumardi', 'Plant 1', 13, 1, '2023-09-15 09:44:20', '2024-02-07 01:21:08', '0000-00-00 00:00:00'),
(13, 'TJFI-C00249', 'GPI0013', '3316090452', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '98BVMG3', 'B4-45-06-3E-0E-2E', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ali Nurdin', 'Plant 1', 13, 1, '2023-09-15 09:45:39', '2024-02-07 01:21:15', '0000-00-00 00:00:00'),
(14, 'TJFI-C00250', 'GPI0014', '3318030687', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'F7BVMG3', 'D4-54-8B-E2-DB-55', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ilham Aditya', 'Plant 1', 13, 1, '2023-09-15 09:47:10', '2024-02-07 01:21:28', '0000-00-00 00:00:00'),
(15, 'TJFI-C00251', 'GPI0015', '3316090453', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '7CBVMG3', 'd4-54-8b-e2-e9-1a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Anang Kuncoro', 'Plant 1', 13, 1, '2023-09-18 01:25:33', '2024-02-07 01:21:39', '0000-00-00 00:00:00'),
(16, 'TJFI-C00252', 'GPI0016', '3316100461', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'CCBVMG3', 'd4-54-8b-ed-c8-a3', 'Intel i5-1135G7', '8 GB', '500 GB', 'Rochmat', 'Plant 1', 5, 1, '2023-09-18 01:26:40', '2024-02-07 01:21:49', '0000-00-00 00:00:00'),
(17, 'TJFI-C00253', 'GPI0017', '3313050007', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'DCBVMG3', 'd4-54-8b-e2-e8-d9', 'Intel i5-1135G7', '8 GB', '500 GB', 'Chorridatul Mahmudah', 'Plant 1', 5, 1, '2023-09-18 01:27:49', '2024-02-07 01:22:06', '0000-00-00 00:00:00'),
(18, 'TJFI-C00254', 'GPI0018', '3313110046', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '3FBVMG3', 'd4-54-8b-b8-f7-4f', 'Intel i5-1135G7', '8 GB', '500 GB', 'Nandang Lukmansyah', 'Plant 1', 5, 1, '2023-09-18 01:29:35', '2024-02-07 01:22:24', '0000-00-00 00:00:00'),
(19, 'TJFI-C00255', 'GPI0019', '3314070150', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '2GBVMG3', 'd4-54-8b-fe-3a-58', 'Intel i5-1135G7', '8 GB', '500 GB', 'Iman Ramdhana', 'Plant 1', 5, 1, '2023-09-18 01:30:58', '2024-02-07 01:22:37', '0000-00-00 00:00:00'),
(20, 'TJFI-C00256', 'GPI0020', '3314090180', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'H6BVMG3', 'd4-54-8b-fe-3a-58', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ida Rusdiansyah', 'Plant 1', 8, 1, '2023-09-18 01:32:38', '2024-02-07 01:22:50', '0000-00-00 00:00:00'),
(21, 'TJFI-C00258', 'GPI0022', '3314110221', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '8DBVMG3', 'd4-54-8b-e2-e9-6a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Janiar Usman', 'Plant 1', 6, 1, '2023-09-18 01:34:06', '2024-02-07 01:23:14', '0000-00-00 00:00:00'),
(22, 'TJFI-C00260', 'GPI0024', '3314080153', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '5CBVMG3', 'd4-54-8b-ed-c9-7a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Muhamad Syaifulloh', 'Plant 1', 6, 1, '2023-09-18 01:35:21', '2024-02-07 01:23:39', '0000-00-00 00:00:00'),
(23, 'TJFI-C00261', 'GPI0025', '3316010413', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'D8BVMG3', 'd4-54-8b-fe-47-6e', 'Intel i5-1135G7', '8 GB', '500 GB', 'Vani Rovalina', 'Plant 1', 4, 1, '2023-09-18 01:37:44', '2024-02-07 01:23:52', '0000-00-00 00:00:00'),
(24, 'TJFI-C00262', 'GPI0026', '3314050107', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '67BVMG3', 'd4-54-8b-fe-48-0e', 'Intel i5-1135G7', '8 GB', '500 GB', 'Wasis Utomo', 'Plant 1', 7, 1, '2023-09-18 01:42:49', '2024-02-07 01:24:06', '0000-00-00 00:00:00'),
(25, 'TJFI-C00263', 'GPI0027', '3317070586', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '79BVMG3', 'd4-54-8b-fe-56-aa', 'Intel i5-1135G7', '8 GB', '500 GB', 'Serli Rismawati', 'Plant 1', 7, 1, '2023-09-18 01:44:21', '2024-02-07 01:24:19', '0000-00-00 00:00:00'),
(26, 'TJFI-C00264', 'GPI0028', '3318010645', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '88BVMG3', 'd4-54-8b-fe-56-b4', 'Intel i5-1135G7', '8 GB', '500 GB', 'M Aris Mamun', 'Plant 1', 8, 1, '2023-09-18 01:45:12', '2024-02-07 01:24:30', '0000-00-00 00:00:00'),
(27, 'TJFI-C00265', 'GPI0029', '3318030688', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '6CBVMG3', 'd4-54-8b-e2-db-46', 'Intel i5-1135G7', '8 GB', '500 GB', 'Nani Pratiwi', 'Plant 1', 8, 1, '2023-09-18 01:49:33', '2024-02-07 01:24:44', '0000-00-00 00:00:00'),
(28, 'TJFI-C00266', 'GPI0030', '3313090039', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '19BVMG3', 'd4-54-8b-fe-56-96', 'Intel i5-1135G7', '8 GB', '500 GB', 'Sigit Purwoko', 'Plant 1', 12, 1, '2023-09-18 01:51:02', '2024-02-07 01:24:56', '0000-00-00 00:00:00'),
(29, 'TJFI-C00267', 'GPI0031', '3314010057', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'H7BVMG3', 'd4-54-8b-fe-56-9b', 'Intel i5-1135G7', '8 GB', '500 GB', 'Pian Sopian', 'Plant 1', 12, 1, '2023-09-18 01:52:23', '2024-02-07 01:26:28', '0000-00-00 00:00:00'),
(30, 'TJFI-C00268', 'GPI0032', '3314040084', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'B8BVMG3', 'd4-54-8b-fe-5e-a7', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ruki Fauzan', 'Plant 1', 12, 1, '2023-09-18 01:53:09', '2024-02-07 01:26:45', '0000-00-00 00:00:00'),
(31, 'TJFI-C00269', 'GPI0033', 'administrator', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'F6BVMG3', 'd4-54-8b-fe-30-a3', 'Intel i5-1135G7', '8 GB', '500 GB', 'Spare Rusak (Ex. Didin Saripudin)', 'Plant 1', 14, 0, '2023-09-18 01:54:37', '2024-02-07 01:27:03', '0000-00-00 00:00:00'),
(32, 'TJFI-C00337', 'GPI0034', '3314050104', 'PC Desktop', 'Dell OptiPlex 5090', 'Windows 10', '76M2ZL3', '60-a5-e2-fd-48-46', 'Intel i5-11500', '8 GB', '500 GB', 'Rian Ardianto', 'Plant 1', 12, 1, '2023-09-18 01:56:27', '2024-02-07 01:27:13', '0000-00-00 00:00:00'),
(33, 'TJFI-C00270', 'GPI0035', '3313110047', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '8BBVMG3', 'd4-54-8b-e2-e8-f7', 'Intel i5-1135G7', '8 GB', '500 GB', 'Prapto', 'Plant 1', 9, 1, '2023-09-18 01:57:32', '2024-02-07 01:27:25', '0000-00-00 00:00:00'),
(34, 'TJFI-C00271', 'GPI0036', '3313110050', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '17BVMG3', 'd4-54-8b-fe-47-a0', 'Intel i5-1135G7', '8 GB', '500 GB', 'M Usup Supriyatna', 'Plant 1', 9, 1, '2023-09-18 02:17:32', '2024-02-07 01:27:43', '0000-00-00 00:00:00'),
(35, 'TJFI-C00272', 'GPI0037', '3314040080', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'CBBVMG3', 'd4-54-8b-e2-d5-42', 'Intel i5-1135G7', '8 GB', '500 GB', 'Anowo Idris', 'Plant 1', 9, 1, '2023-09-18 02:18:34', '2024-02-07 01:27:58', '0000-00-00 00:00:00'),
(36, 'TJFI-C00273', 'GPI0038', '3320120910', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'G6BVMG3', 'd4-54-8b-fe-4a-6b', 'Intel i5-1135G7', '8 GB', '8 GB', 'Zulfy Triyoga', 'Plant 1', 14, 1, '2023-09-18 02:20:09', '2024-02-07 01:28:08', '0000-00-00 00:00:00'),
(37, 'TJFI-C00274', 'GPI0039', '3314100182', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '59BVMG3', 'd4-54-8b-ff-08-20', 'Intel i5-1135G7', '8 GB', '500 GB', 'Septian Kurniawan', 'Plant 1', 9, 1, '2023-09-18 03:03:24', '2024-02-07 01:28:20', '0000-00-00 00:00:00'),
(38, 'TJFI-C00275', 'GPI0040', '3314100201', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '39BVMG3', 'd4-54-8b-fe-3a-67', 'Intel i5-1135G7', '8 GB', '500 GB', 'Trianjaya Saputra', 'Plant 1', 9, 1, '2023-09-18 03:10:13', '2024-02-07 01:28:31', '0000-00-00 00:00:00'),
(39, 'TJFI-C00276', 'GPI0041', '3313050009', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'JFBVMG3', 'd4-54-8b-b9-82-73', 'Intel i5-1135G7', '8 GB', '500 GB', 'Adung Suwela', 'Plant 1', 9, 1, '2023-09-18 03:12:10', '2024-02-07 01:28:48', '0000-00-00 00:00:00'),
(40, 'TJFI-C00277', 'GPI0042', '3313090041', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '6FBVMG3', 'd4-54-8b-e2-db-14', 'Intel i5-1135G7', '8 GB', '500 GB', 'Nandang Supriyadi', 'Plant 1', 9, 1, '2023-09-18 03:16:01', '2024-02-07 01:29:02', '0000-00-00 00:00:00'),
(41, 'TJFI-C00278', 'GPI0043', '3313120051', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '9DBVMG3', 'd4-54-8b-e2-e9-10', 'Intel i5-1135G7', '8 GB', '500 GB', 'Nanang Triana', 'Plant 1', 9, 1, '2023-09-18 03:19:23', '2024-02-07 01:29:13', '0000-00-00 00:00:00'),
(42, 'TJFI-C00279', 'GPI0044', '3317070584', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'GDBVMG3', 'b4-45-06-3e-04-88', 'Intel i5-1135G7', '8 GB', '500 GB', 'Muhamad Faqih', 'Plant 1', 9, 1, '2023-09-18 03:20:04', '2024-02-07 01:29:23', '0000-00-00 00:00:00'),
(43, 'TJFI-C00338', 'GPI0045', '3314030073', 'PC Desktop', 'Dell OptiPlex 5090', 'Windows 10', 'D6M2ZL3', '20-c1-9b-00-d4-49', 'Intel i5-11500', '8 GB', '500 GB', 'Toto Sukma', 'Plant 1', 9, 1, '2023-09-18 03:20:59', '2024-02-07 01:29:33', '0000-00-00 00:00:00'),
(44, 'TJFI-C00339', 'GPI0046', '3314060123', 'PC Desktop', 'Dell OptiPlex 5090', 'Windows 10', '86M2ZL3', '60-a5-e2-fd-39-e6', 'Intel i5-11500', '8 GB', '500 GB', 'Asep Supriatna', 'Plant 1', 9, 1, '2023-09-18 03:21:55', '2024-02-07 01:29:48', '0000-00-00 00:00:00'),
(45, 'TJFI-C00340', 'GPI0047', '3314010058', 'PC Desktop', 'Dell OptiPlex 5090', 'Windows 10', '66M2ZL3', 'c0-25-a5-a8-d8-7b', 'Intel i5-11500', '8 GB', '500 GB', 'Abdul Syukri', 'Plant 1', 9, 1, '2023-09-18 03:24:50', '2024-02-07 01:29:58', '0000-00-00 00:00:00'),
(46, 'TJFI-C00280', 'GPI0048', '3318020671', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'F8BVMG3', 'd4-54-8b-fe-5e-9d', 'Intel i5-1135G7', '8 GB', '500 GB', 'Siti Ulfah Solihah', 'Plant 1', 9, 1, '2023-09-18 03:34:42', '2024-02-07 01:30:13', '0000-00-00 00:00:00'),
(47, 'TJFI-C00341', 'GPI0049', '3313050008', 'PC Desktop', 'Dell OptiPlex 5090', 'Windows 10', '96M2ZL3', '20-c1-9b-00-6d-38', 'Intel i5-11500', '8 GB', '500 GB', 'Ruli Kristian Masudianto', 'Plant 1', 9, 1, '2023-09-18 03:37:13', '2024-02-07 01:41:27', '0000-00-00 00:00:00'),
(48, 'TJFI-C00281', 'GPI0050', '3313110049', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '4GBVMG3', 'd4-54-8b-b8-f7-2c', 'Intel i5-1135G7', '8 GB', '500 GB', 'Muh Muklis', 'Plant 1', 10, 1, '2023-09-18 03:41:15', '2024-02-07 01:41:40', '0000-00-00 00:00:00'),
(49, 'TJFI-C00282', 'GPI0051', '3313120052', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'BBBVMG3', 'd4-54-8b-e2-da-bf', 'Intel i5-1135G7', '8 GB', '500 GB', 'Budi Riyanto', 'Plant 1', 10, 1, '2023-09-18 06:00:38', '2024-02-07 01:41:54', '0000-00-00 00:00:00'),
(50, 'TJFI-C00283', 'GPI0052', '3314010059', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '89BVMG3', 'd4-54-8b-fe-4a-3e', 'Intel i5-1135G7', '8 GB', '500 GB', 'Minal Muttaqin', 'Plant 1', 15, 1, '2023-09-18 06:02:24', '2024-02-07 01:42:06', '0000-00-00 00:00:00'),
(51, 'TJFI-C00284', 'GPI0053', '3315070373', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '78BVMG3', 'd4-54-8b-fe-52-f9', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ibnu Saputra', 'Plant 1', 10, 1, '2023-09-18 06:03:02', '2024-02-07 01:42:26', '0000-00-00 00:00:00'),
(52, 'TJFI-C00285', 'GPI0054', '3317070585', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'HBBVMG3', 'd4-54-8b-ed-c8-fd', 'Intel i5-1135G7', '8 GB', '500 GB', 'Trisno Susilo', 'Plant 1', 10, 1, '2023-09-18 06:03:40', '2024-02-07 01:42:37', '0000-00-00 00:00:00'),
(53, 'TJFI-C00286', 'GPI0055', '3314060118', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '1FBVMG3', 'd4-54-8b-ed-c8-f8', 'Intel i5-1135G7', '8 GB', '500 GB', 'Yogi Tri Laksono', 'Plant 1', 10, 1, '2023-09-18 06:04:25', '2024-02-07 01:42:47', '0000-00-00 00:00:00'),
(54, 'TJFI-C00287', 'GPI0056', '3313070025', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'H8BVMG3', 'd4-54-8b-fe-53-58', 'Intel i5-1135G7', '8 GB', '500 GB', 'Agus Mukhotib', 'Plant 1', 10, 1, '2023-09-18 06:05:01', '2024-02-07 01:42:58', '0000-00-00 00:00:00'),
(55, 'TJFI-C00288', 'GPI0057', '3314040095', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'C9BVMG3', 'b4-45-06-3d-f7-82', 'Intel i5-1135G7', '8 GB', '500 GB', 'Joni Irawan', 'Plant 1', 10, 1, '2023-09-18 06:05:40', '2024-02-07 01:43:07', '0000-00-00 00:00:00'),
(56, 'TJFI-C00289', 'GPI0058', '3314110207', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'BCBVMG3', 'd4-54-8b-e2-e8-c0', 'Intel i5-1135G7', '8 GB', '500 GB', 'Diaris Anka', 'Plant 1', 11, 1, '2023-09-18 06:06:27', '2024-02-07 01:43:18', '0000-00-00 00:00:00'),
(57, 'TJFI-C00290', 'GPI0059', '3313090038', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'DDBVMG3', 'd4-54-8b-ed-c8-8a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Surya Hadinata', 'Plant 1', 11, 1, '2023-09-18 06:07:13', '2024-02-07 01:43:27', '0000-00-00 00:00:00'),
(58, 'TJFI-C00291', 'GPI0060', '3314060122', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '9BBVMG3', 'd4-54-8b-ed-c9-2a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Daryanto', 'Plant 1', 11, 1, '2023-09-18 06:08:00', '2024-02-07 01:43:38', '0000-00-00 00:00:00'),
(59, 'TJFI-C00292', 'GPI0061', '3314040082', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'G7BVMG3', 'b4-45-06-3e-08-5e', 'Intel i5-1135G7', '8 GB', '500 GB', 'M Sohibul Faizin', 'Plant 1', 11, 1, '2023-09-18 06:11:27', '2024-02-07 01:43:48', '0000-00-00 00:00:00'),
(60, 'TJFI-C00293', 'GPI0062', '3313050013', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'FCBVMG3', 'd4-54-8b-ed-c8-e4', 'Intel i5-1135G7', '8 GB', '500 GB', 'Eddie Rainaldi', 'Plant 1', 11, 1, '2023-09-18 06:13:54', '2024-02-07 01:43:58', '0000-00-00 00:00:00'),
(61, 'TJFI-C00342', 'GPI0063', 'administrator', 'PC Desktop', 'Dell OptiPlex 5090', 'Windows 10', 'C6M2ZL3', '60-a5-e2-fd-48-69', 'Intel i5-11500', '8 GB', '500 GB', 'Spare (Ex. Jarot Koerniawan)', 'Plant 1', 14, 0, '2023-09-18 06:15:53', '2024-02-07 01:44:07', '0000-00-00 00:00:00'),
(62, 'TJFI-C00294', 'GPI0064', '3317040552', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '6DBVMG3', 'b4-45-06-3d-f2-e4', 'Intel i5-1135G7', '8 GB', '500 GB', 'Rullianto', 'Plant 1', 11, 1, '2023-09-18 06:16:51', '2024-02-07 01:44:15', '0000-00-00 00:00:00'),
(63, 'TJFI-C00295', 'GPI0065', '3314050105', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'C8BVMG3', 'd4-54-8b-ff-41-c8', 'Intel i5-1135G7', '8 GB', '500 GB', 'Imam Sonjaya', 'Plant 1', 11, 1, '2023-09-18 06:17:37', '2024-02-07 01:44:24', '0000-00-00 00:00:00'),
(64, 'TJFI-C00296', 'GPI0066', '3314020066', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '5DBVMG3', 'b4-45-06-3e-0a-f8', 'Intel i5-1135G7', '8 GB', '500 GB', 'Rio Romadhona', 'Plant 1', 11, 1, '2023-09-18 06:19:49', '2024-02-07 01:44:47', '0000-00-00 00:00:00'),
(65, 'TJFI-C00297', 'GPI0068', '3314080161', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '3DBVMG3', 'd4-54-8b-ed-c8-5d', 'Intel i5-1135G7', '8 GB', '500 GB', 'Iswanto', 'Plant 1', 15, 1, '2023-09-18 06:20:57', '2024-02-07 01:45:32', '0000-00-00 00:00:00'),
(66, 'TJFI-C00298', 'GPI0069', '3313060017', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '2CBVMG3', 'd4-54-8b-e2-e9-65', 'Intel i5-1135G7', '8 GB', '500 GB', 'Hadi Handoko', 'Plant 1', 15, 1, '2023-09-18 06:21:36', '2024-02-07 01:45:43', '0000-00-00 00:00:00'),
(67, 'TJFI-C00299', 'GPI0070', '3317110614', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '4CBVMG3', 'd4-54-8b-e2-e9-0b', 'Intel i5-1135G7', '8 GB', '500 GB', 'Aris Yulianto', 'Plant 1', 15, 1, '2023-09-18 06:22:18', '2024-02-07 01:46:29', '0000-00-00 00:00:00'),
(68, 'TJFI-C00300', 'GPI0071', '3314040087', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'D7BVMG3', 'd4-54-8b-fe-5e-b6', 'Intel i5-1135G7', '8 GB', '500 GB', 'Hasian/Ongki', 'Plant 1', 15, 1, '2023-09-18 06:25:21', '2024-02-07 01:46:38', '0000-00-00 00:00:00'),
(69, 'TJFI-C00301', 'GPI0072', '3313070029', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '5GBVMG3', 'd4-54-8b-b6-fb-2f', 'Intel i5-1135G7', '8 GB', '500 GB', 'Aji/Triyanto', 'Plant 1', 15, 1, '2023-09-18 06:26:01', '2024-02-07 01:46:48', '0000-00-00 00:00:00'),
(70, 'TJFI-C00302', 'GPI0073', '3313070028', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '3CBVMG3', 'd4-54-8b-ed-c9-34', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dian/Abdul', 'Plant 1', 15, 1, '2023-09-18 06:26:44', '2024-02-07 01:46:59', '0000-00-00 00:00:00'),
(71, 'TJFI-C00303', 'GPI0074', '3313090035', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '1GBVMG3', 'b4-45-06-3d-f5-c6', 'Intel i5-1135G7', '8 GB', '500 GB', 'Yulianto/Daud', 'Plant 1', 15, 1, '2023-09-18 06:27:33', '2024-02-07 01:47:08', '0000-00-00 00:00:00'),
(72, 'TJFI-C00304', 'GPI0075', '3314110210', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '87BVMG3', 'd4-54-8b-fe-4a-43', 'Intel i5-1135G7', '8 GB', '500 GB', 'Denny Soemarno', 'Plant 1', 3, 1, '2023-09-18 06:31:07', '2024-02-07 01:47:19', '0000-00-00 00:00:00'),
(73, 'TJFI-C00305', 'GPI0076', ' 3313050014', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '28BVMG3', 'd4-54-8b-fe-53-5d', 'Intel i5-1135G7', '8 GB', '500 GB', 'Jong Bernart', 'Plant 1', 4, 1, '2023-09-18 06:45:04', '2024-02-07 01:47:28', '0000-00-00 00:00:00'),
(74, 'TJFI-C00306', 'GPI0077', '3316020420', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'B6BVMG3', 'd4-54-8b-fe-4a-61', 'Intel i5-1135G7', '8 GB', '500 GB', 'Cahyanto Hari W', 'Plant 1', 12, 1, '2023-09-18 06:46:11', '2024-02-07 01:47:38', '0000-00-00 00:00:00'),
(75, 'TJFI-C00307', 'GPI0078', '3316110463', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'DBBVMG3', 'd4-54-8b-ed-c9-6b', 'Intel i5-1135G7', '8 GB', '500 GB', 'Agus Purnomo', 'Plant 1', 12, 1, '2023-09-18 06:47:16', '2024-02-07 01:47:48', '0000-00-00 00:00:00'),
(76, 'TJFI-C00308', 'GPI0079', '3317080589', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'C6BVMG3', 'd4-54-8b-ff-07-e9', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dewita Budiarti', 'Plant 1', 12, 1, '2023-09-18 06:50:39', '2024-02-07 01:47:58', '0000-00-00 00:00:00'),
(77, 'TJFI-C00309', 'GPI0080', '3315020260', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '7BBVMG3', 'd4-54-8b-e2-db-0f', 'Intel i5-1135G7', '8 GB', '500 GB', 'Sri Endahni', 'Plant 1', 12, 1, '2023-09-18 06:51:16', '2024-02-07 01:48:07', '0000-00-00 00:00:00'),
(78, 'TJFI-C00310', 'GPI0081', '3315120412', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '6GBVMG3', 'd4-54-8b-b8-f7-13', 'Intel i5-1135G7', '8 GB', '500 GB', 'Aurum Mayta', 'Plant 1', 6, 1, '2023-09-18 06:52:13', '2024-02-07 01:48:17', '0000-00-00 00:00:00'),
(79, 'TJFI-C00311', 'GPI0082', 'administrator', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '58BVMG3', 'd4-54-8b-fe-5e-a2', 'Intel i5-1135G7', '8 GB', '500 GB', 'Spare', 'Plant 1', 14, 0, '2023-09-18 06:54:08', '2024-02-23 02:46:34', '0000-00-00 00:00:00'),
(80, 'TJFI-C00312', 'GPI0083', '3314110220', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '57BVMG3', 'd4-54-8b-fe-4a-16', 'Intel i5-1135G7', '8 GB', '500 GB', 'Sukarmin Raddin', 'Plant 1', 10, 1, '2023-09-18 06:57:04', '2024-02-07 01:48:37', '0000-00-00 00:00:00'),
(81, 'TJFI-C00313', 'GPI0084', 'MAINTENANCE P1', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '37BVMG3', 'd4-54-8b-fe-53-67', 'Intel i5-1135G7', '8 GB', '500 GB', 'MAINTENANCE P1', 'Plant 1', 11, 1, '2023-09-18 07:04:33', '2024-02-07 01:48:45', '0000-00-00 00:00:00'),
(82, 'TJFI-C00314', 'GPI0085', '3314100200', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '47BVMG3', 'd4-54-8b-fe-53-3f', 'Intel i5-1135G7', '8 GB', '500 GB', 'Zico Bastian', 'Plant 1', 10, 1, '2023-09-18 07:08:30', '2024-02-07 01:48:57', '0000-00-00 00:00:00'),
(83, 'TJFI-C00315', 'GPI0086', '3314070148', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '49BVMG3', 'd4-54-8b-fe-3a-76', 'Intel i5-1135G7', '8 GB', '500 GB', 'Yanyan Mulyana', 'Plant 1', 10, 1, '2023-09-18 07:09:47', '2024-02-07 01:49:07', '0000-00-00 00:00:00'),
(84, 'TJFI-C00316', 'GPI0087', '3314060109', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '3GBVMG3', 'd4-54-8b-b9-e8-67', 'Intel i5-1135G7', '8 GB', '500 GB', 'Agung Laksono', 'Plant 1', 10, 1, '2023-09-18 07:10:25', '2024-02-07 01:49:20', '0000-00-00 00:00:00'),
(85, 'TJFI-C00317', 'GPI0088', '3318010650', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'FBBVMG3', 'd4-54-8b-ed-c7-cc', 'Intel i5-1135G7', '8 GB', '500 GB', 'Cecep Hidayat', 'Plant 1', 10, 1, '2023-09-18 07:11:20', '2024-02-07 01:49:31', '0000-00-00 00:00:00'),
(86, 'TJFI-C00318', 'GPI0089', '3314020067', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '4DBVMG3', 'd4-54-8b-e2-e8-f2', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dedi Yusuf', 'Plant 1', 10, 1, '2023-09-18 07:11:54', '2024-02-07 01:49:42', '0000-00-00 00:00:00'),
(87, 'TJFI-C00319', 'GPI0090', '3314110217', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '29BVMG3', 'd4-54-8b-fe-5e-ac', 'Intel i5-1135G7', '8 GB', '500 GB', 'Mochamad Junaedi', 'Plant 1', 3, 1, '2023-09-18 07:12:37', '2024-02-07 01:49:51', '0000-00-00 00:00:00'),
(88, 'TJFI-C00320', 'GPI0091', '3320020852', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '4FBVMG3', 'd4-54-8b-ed-c7-e0', 'Intel i5-1135G7', '8 GB', '500 GB', 'Mustofa Farris', 'Plant 1', 17, 1, '2023-09-18 07:13:34', '2024-02-07 01:50:04', '0000-00-00 00:00:00'),
(89, 'TJFI-C00321', 'GPI0092', '3318010649', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'C7BVMG3', 'd4-54-8b-ff-41-f5', 'Intel i5-1135G7', '8 GB', '500 GB', 'Cipto Widiyanto', 'Plant 1', 17, 1, '2023-09-18 07:14:13', '2024-02-07 01:50:13', '0000-00-00 00:00:00'),
(90, 'TJFI-C00322', 'GPI0093', '3314080152', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'CDBVMG3', 'd4-54-8b-ed-c7-e5', 'Intel i5-1135G7', '8 GB', '500 GB', 'Suryadi', 'Plant 1', 17, 1, '2023-09-18 07:15:34', '2024-02-07 01:51:57', '0000-00-00 00:00:00'),
(91, 'TJFI-C00323', 'GPI0094', '3318010648', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'D6BVMG3', 'd4-54-8b-fe-4a-70', 'Intel i5-1135G7', '8 GB', '500 GB', 'Widiyanto', 'Plant 1', 17, 1, '2023-09-18 07:21:50', '2024-02-07 01:52:23', '0000-00-00 00:00:00'),
(92, 'TJFI-C00324', 'GPI0095', '3314070149', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'B7BVMG3', 'd4-54-8b-fe-47-eb', 'Intel i5-1135G7', '8 GB', '500 GB', 'Yulianto', 'Plant 1', 17, 1, '2023-09-18 07:22:37', '2024-02-07 01:52:42', '0000-00-00 00:00:00'),
(93, 'TJFI-C00325', 'GPI0096', '3314070140', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '7FBVMG3', 'd4-54-8b-ed-c6-87', 'Intel i5-1135G7', '8 GB', '500 GB', 'Subarna', 'Plant 1', 17, 1, '2023-09-18 07:23:28', '2024-02-07 01:52:49', '0000-00-00 00:00:00'),
(94, 'TJFI-C00326', 'GPI0097', '3314070131', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'GBBVMG3', 'd4-54-8b-e2-da-ce', 'Intel i5-1135G7', '8 GB', '500 GB', 'Muhamad Taufik', 'Plant 1', 17, 1, '2023-09-18 07:24:09', '2024-02-07 01:52:59', '0000-00-00 00:00:00'),
(95, 'TJFI-C00327', 'GPI0098', '3314110205', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '27BVMG3', '0a-68-dd-22-8f-f6', 'Intel i5-1135G7', '8 GB', '500 GB', 'Samsudin', 'Plant 1', 17, 1, '2023-09-18 07:25:19', '2024-02-07 01:53:08', '0000-00-00 00:00:00'),
(96, 'TJFI-C00328', 'GPI0099', '3318010646', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '7DBVMG3', 'd4-54-8b-ed-c9-16', 'Intel i5-1135G7', '8 GB', '500 GB', 'Budiyanto', 'Plant 1', 15, 1, '2023-09-18 07:25:58', '2024-02-07 01:53:21', '0000-00-00 00:00:00'),
(97, 'TJFI-C00329', 'GPI0100', '3314070129', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '1DBVMG3', 'd4-54-8b-ed-c8-08', 'Intel i5-1135G7', '8 GB', '500 GB', 'Syaiful Hidayat', 'Plant 1', 15, 1, '2023-09-18 07:27:42', '2024-02-07 01:54:13', '0000-00-00 00:00:00'),
(98, 'TJFI-C00330', 'GPI0101', '3314100190', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '9CBVMG3', 'd4-54-8b-e2-e8-cf', 'Intel i5-1135G7', '8 GB', '500 GB', 'Amin Rois', 'Plant 1', 15, 1, '2023-09-18 07:29:01', '2024-02-07 01:54:23', '0000-00-00 00:00:00'),
(99, 'TJFI-C00331', 'GPI0102', '3314060112', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '48BVMG3', 'd4-54-8b-ff-42-36', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dede Marjuki', 'Plant 1', 11, 1, '2023-09-18 07:30:21', '2024-02-07 01:54:32', '0000-00-00 00:00:00'),
(100, 'TJFI-C00333', 'GPI0103', '3314060116', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '99BVMG3', 'd4-54-8b-ed-c9-4d', 'Intel i5-1135G7', '8 GB', '500 GB', 'Setyawan', 'Plant 1', 11, 1, '2023-09-18 07:31:06', '2024-02-07 01:54:40', '0000-00-00 00:00:00'),
(101, 'TJFI-C00332', 'GPI0104', '3314060113', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'JBBVMG3', 'd4-54-8b-fe-56-82', 'Intel i5-1135G7', '8 GB', '500 GB', 'Aris Zaenuddin', 'Plant 1', 11, 1, '2023-09-18 07:32:07', '2024-02-07 01:54:51', '0000-00-00 00:00:00'),
(102, 'TJFI-C00334', 'GPI0105', '3317040553', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '77BVMG3', 'b4-45-06-3e-09-5a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Hendri Sudrajat', 'Plant 1', 11, 1, '2023-09-18 07:32:43', '2024-02-07 01:55:00', '0000-00-00 00:00:00'),
(103, 'TJFI-C00335', 'GPI0106', '3314060111', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '38BVMG3', 'd4-54-8b-fe-56-cd', 'Intel i5-1135G7', '8 GB', '500 GB', 'Andri Irawan', 'Plant 1', 11, 1, '2023-09-18 07:33:26', '2024-02-07 01:55:08', '0000-00-00 00:00:00'),
(104, 'TJFI-C00336', 'GPI0107', '3315010257', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'JDBVMG3', 'd4-54-8b-ed-c8-d0', 'Intel i5-1135G7', '8 GB', '500 GB', 'Rachmat Afriansyah', 'Plant 1', 11, 1, '2023-09-18 07:34:07', '2024-02-07 01:56:03', '0000-00-00 00:00:00'),
(105, 'TJFI-C00247', 'GPI0108', '3322061120', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'GCBVMG3', 'd4-54-8b-ed-c8-85', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dwi Cahyono', 'Plant 1', 14, 1, '2023-09-18 07:34:46', '2024-02-07 01:56:22', '0000-00-00 00:00:00'),
(106, 'TJFI-C00343', 'GPI0110', 'administrator', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '6BBVMG3', 'b4-45-06-3e-08-1a', 'Intel i5-1135G7', '8 GB', '500 GB', 'Matsumoto Kazuya', 'Plant 1', 13, 1, '2023-09-18 07:42:14', '2024-02-07 01:57:03', '0000-00-00 00:00:00'),
(107, 'TJFI-C00344', 'GPI0111', '3322111158', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '97BVMG3', 'd4-54-8b-fe-56-af', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dita Kresawulandari', 'Plant 1', 10, 1, '2023-09-18 07:45:06', '2024-02-07 01:57:12', '0000-00-00 00:00:00'),
(108, 'TJFI-C00238', 'GPI0112', '3314060128', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'B9BVMG3', 'd4-54-8b-fe-48-09', 'Intel i5-1135G7', '8 GB', '500 GB', 'Ai Fitria Wijayanti', 'Plant 1', 4, 1, '2023-09-18 07:45:54', '2024-02-07 01:57:24', '0000-00-00 00:00:00'),
(109, 'TJFI-C00257', 'GPI0115', '3317110616', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'HCBVMG3', 'd4-54-8b-e2-d5-ba', 'Intel i5-1135G7', '8 GB', '500 GB', 'Andry Mulyadi', 'Plant 1', 12, 1, '2023-09-18 07:46:44', '2024-02-07 01:57:56', '0000-00-00 00:00:00'),
(110, 'TJFI-C00233', 'GPI0002', 'administrator', 'Laptop', 'HP 240 G8', 'Windows 10', '5CG1319ZFR', '90-0f-0c-b1-8e-51', 'Intel i7-1065G7', '8 GB', '500 GB', 'Spare Old PC (Ex. Ai Fitria)', 'Plant 1', 14, 0, '2023-09-18 07:50:22', '2024-02-22 08:53:57', '0000-00-00 00:00:00'),
(111, 'TJFI-C00235', 'GPI0003', '3323101235', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '1CBVMG3', 'd4-54-8b-e2-e9-4c', 'Intel i5-1135G7', '8 GB', '500 GB', 'Rindi Meldania', 'Plant 1', 5, 1, '2023-09-18 07:52:28', '2024-02-07 01:19:38', '0000-00-00 00:00:00'),
(112, 'TJFI-C00234', 'GPI0114', '3317010490', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'J7BVMG3', 'd4-54-8b-ff-41-dc', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dicky Herlambang', 'Plant 1', 4, 1, '2023-09-18 07:54:34', '2024-02-07 01:57:47', '0000-00-00 00:00:00'),
(113, 'TJFI-C00259', 'GPI0023', '3313110048', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'J7BVMG3', 'd4-54-8b-ff-41-cd', 'Intel i5-1135G7', '8 GB', '500 GB', 'Rinaldi Budiawan', 'Plant 1', 12, 1, '2023-09-18 07:56:11', '2024-02-07 01:23:26', '0000-00-00 00:00:00'),
(114, 'TJFI-C00345', 'GPI0113', '3323051186', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '69BVMG3', 'd4-54-8b-fe-4a-0c', 'Intel i5-1135G7', '8 GB', '500 GB', 'Dita Indah Rahutami', 'Plant 1', 5, 1, '2023-09-18 08:02:09', '2024-02-07 01:57:33', '0000-00-00 00:00:00'),
(115, 'TJFI-C00346', 'GPI0117', '3315060370', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '5FBVMG3', 'd4-54-8b-ed-c7-c7', 'Intel i5-1135G7', '8 GB', '500 GB', 'Didin Saripudin', 'Plant 1', 12, 1, '2023-09-18 08:09:48', '2024-02-07 01:58:17', '0000-00-00 00:00:00'),
(116, 'TJFI-C00348', 'GPI0109', 'administrator', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'JCBVMG3', 'd4-54-8b-ed-c8-8f', 'Intel i5-1135G7', '8 GB', '500 GB', 'Spare', 'Plant 1', 14, 0, '2023-09-18 08:10:37', '2024-02-07 01:56:40', '0000-00-00 00:00:00'),
(117, 'TJFI-C00347', 'GPI0116', 'administrator', 'Laptop', 'Dell Latitude 3420', 'Windows 10', 'BDBVMG3', 'd4-54-8b-ed-c8-cb', 'Intel i5-1135G7', '8 GB', '500 GB', 'Support KDDI (Teddy)', 'Plant 1', 14, 1, '2023-09-18 08:14:39', '2024-02-07 01:58:04', '0000-00-00 00:00:00'),
(118, 'TJFI-C00232', 'GPI0001', 'admin', 'Laptop', 'HP 240 G8', 'Windows 10', '5CG1319ZF0', '90-0f-0c-b1-a8-95', 'Intel i7-1065G7', '8 GB', '500 GB', 'MAINTENANCE P2', 'Plant 1', 11, 1, '2023-09-18 08:18:37', '2024-02-23 02:46:07', '0000-00-00 00:00:00'),
(119, 'TJFI-C00350', 'GPI0021', 'administrator', 'Laptop', 'HP ProBook 440 G5', 'Windows 10', '5CD748BT6H', '28-c6-3f-a6-fa-31', 'Intel i7-8550U', '16 GB', '500 GB', 'Spare Old (Ex. Andry Mulyadi)', 'Plant 1', 14, 0, '2023-09-18 08:27:37', '2024-02-07 01:23:00', '0000-00-00 00:00:00'),
(120, 'TJFI-C00351', 'GPI0118', '3313050015', 'PC Desktop', 'Dell OptiPlex 5090', 'Windows 10', 'B6M2ZL3', '60-a5-e2-fd-82-fc', 'Intel i5-11500', '8 GB', '500 GB', 'Jarot Koerniawan', 'Plant 1', 11, 1, '2023-09-19 02:28:39', '2024-02-07 01:58:26', '0000-00-00 00:00:00'),
(122, 'TJFI-C00352', 'GPI0067', '3313050012', 'Laptop', 'HP 240 G6', 'Windows 10', '5CD8047FQV', '9c-30-5b-3a-15-05', 'Intel i3-6006U', '4 GB', '500GB', 'Gun Gun', 'Plant 1', 9, 1, '2023-10-11 07:56:38', '2024-02-07 01:45:22', '0000-00-00 00:00:00'),
(123, 'TJFI-C00353', 'GPI0119', '332205003M', 'Laptop', 'Dell Latitude 3420', 'Windows 10', '7PM0HX3', '30-05-05-50-25-49', 'intel i5-1145G7', '8 GB', '500 GB', 'Kazuyoshi Takeshima', 'Plant 1', 16, 1, '2023-10-13 03:21:58', '2024-02-07 01:58:34', '0000-00-00 00:00:00'),
(125, '----', 'GPI0120', 'administrator', 'PC Desktop', 'Dell OptoPlex Tower 7010', 'Windows 10', 'H4X3B04', '28-C5-D2-13-01-78', 'Intel i5-13500', '8 GB', '512 GB', 'ASAKAI P1', 'Plant 1', 10, 1, '2023-12-05 06:03:54', '2024-02-07 01:58:58', '0000-00-00 00:00:00'),
(126, '-', 'GPI0121', 'administrator', 'PC Desktop', 'Dell Optiplex Tower 7010', 'Windows 10', 'CDFHSY3', '74-3a-f4-6b-d6-18', 'intel i5-13500', '8 GB', '512 GB', 'ASAKAI P2', 'Plant 1', 10, 1, '2023-12-12 06:10:04', '2024-02-07 01:59:14', '0000-00-00 00:00:00'),
(127, '--', 'GPI0122', 'administrator', 'Laptop', 'Dell Latitude 3430', 'Windows 10', '4XVJJX3', '00-41-0e-59-57-93', 'Intel Core i5-1245U', '8 GB', '512 GB', 'Spare', 'Plant 1', 14, 0, '2023-12-13 03:39:31', '2024-02-07 01:59:24', '0000-00-00 00:00:00'),
(128, '-----', 'GPI0123', 'administrator', 'Laptop', 'Dell Latitude 3430', 'Windows 10', '3XVJJX3', '00-41-0e-59-57-b3', 'Intel i5-1245U', '8 GB', '500 GB', 'Spare', 'Plant 1', 14, 0, '2023-12-28 07:15:00', '2024-02-07 01:59:33', '0000-00-00 00:00:00'),
(129, '------', 'GPI0124', '332205005M', 'Laptop', 'Dell Latitude 3440', 'Windows 10', '6PJCPX3', 'a8-3b-76-aa-73-a7', 'Intel i5-1345U', '8 GB', '500 GB', 'Kazuki Uehara', 'Plant 1', 16, 1, '2024-01-19 01:55:40', '2024-02-07 01:59:41', '0000-00-00 00:00:00'),
(130, '-------', 'GPI0125', '332205004M', 'Laptop', 'Dell Latitude 3440', 'Windows 10', '5PJCPX3', 'a8-3b-76-aa-73-bb', 'Intel i5-1345U', '8 GB', '500 GB', 'Takatoshi Yamada', 'Plant 1', 16, 1, '2024-01-19 01:57:23', '2024-02-07 02:00:07', '0000-00-00 00:00:00'),
(131, '--------', 'GPI0126', '332201002M', 'Laptop', 'Dell Latitude 3440', 'Windows 10', '4PJCPX3', 'a8-3b-76-aa-73-8b', 'Intel i5-1345U', '8 GB', '500 GB', 'Yutaka Saito', 'Plant 1', 16, 1, '2024-01-19 01:58:39', '2024-02-07 02:00:24', '0000-00-00 00:00:00'),
(132, '---.--', 'CADMEISTER-01', 'administrator', 'PC Desktop', 'HP Z420 Workstation', 'Windows 10', 'SGH405RXD1', 'a0-48-1c-79-c3-83', 'Intel Xeon E5-1650', '8 GB', '500 GB', 'Muhamad Faqih', 'Plant 1', 9, 1, '2024-02-05 08:39:30', '2024-02-07 01:30:34', '0000-00-00 00:00:00'),
(133, '--.--', 'CUSTOMS_PC', 'usercustom', 'PC Desktop', 'HP Pro 3330 MT ', 'Windows 10', 'SGH346SPNH', '2c-44-fd-1b-3e-15', 'Intel i3-3220', '4 GB', '250 GB', 'IT Server', 'Plant 1', 14, 1, '2024-02-05 09:02:53', '2024-02-19 09:22:07', '0000-00-00 00:00:00'),
(134, '--.---', 'ICADSX-01', 'administrator', 'PC Desktop', 'HP Z230 SFF Workstation', 'Windows 10', 'SGH405RXK1', 'f0-92-1c-f0-f6-c4', 'Intel i5-4570', '4 GB', '500 GB', 'Mahfudz', 'Plant 1', 9, 1, '2024-02-05 09:05:16', '2024-02-07 02:05:07', '0000-00-00 00:00:00'),
(135, '.--.', 'PURCHASE-PC', 'PURCHASE', 'PC Desktop', 'HP Pro 3330 MT ', 'Windows 10', 'SGH346SPKX', '2c-44-fd-1b-fd-c5', 'Intel i3-3220', '2 GB', '250 GB', 'Magang Purchasing', 'Plant 1', 6, 1, '2024-02-05 09:07:16', '2024-02-07 02:05:21', '0000-00-00 00:00:00'),
(136, '..--', 'TJFI-PC022', 'admin', 'PC Desktop', 'HP Z240 SFF Workstation', 'Windows 10', 'SGH744R27M', '3c-52-82-60-c8-24', 'Intel i7-6700', '8 GB', '500 GB', 'Muhamad Faqih', 'Plant 1', 9, 1, '2024-02-05 09:09:03', '2024-02-07 02:05:34', '0000-00-00 00:00:00'),
(137, '...-', 'WORKNC-01', 'administrator', 'PC Desktop', 'HP Z420 Workstation', 'Windows 10', 'SGH405RXK2', 'f0-92-1c-e0-6f-ae', 'Intel Xeon E5-1620', '16 GB', '500 GB', 'Anowo Idris', 'Plant 1', 9, 1, '2024-02-05 09:13:37', '2024-02-07 02:05:48', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`id_computer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `computer`
--
ALTER TABLE `computer`
  MODIFY `id_computer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
