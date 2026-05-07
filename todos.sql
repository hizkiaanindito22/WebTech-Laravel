-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2026 at 11:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todoapp_20236025_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selesai` tinyint(1) NOT NULL DEFAULT 0,
  `tanggal_target` date DEFAULT NULL,
  `tanggal_penyelesaian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `judul`, `keterangan`, `selesai`, `tanggal_target`, `tanggal_penyelesaian`, `created_at`, `updated_at`) VALUES
(1, 'Menanak Nasi', 'Menanak nasi untuk makan malam jam 17.00', 1, '2026-05-13', '2026-05-06', '2026-05-06 02:38:48', '2026-05-06 02:43:48'),
(2, 'Mengisi LogBOOK Pemrograman', 'Hari rabu', 0, '2026-05-06', NULL, '2026-05-06 02:40:17', '2026-05-06 02:40:17'),
(3, 'Edit video aftermovie', NULL, 0, '2026-05-11', NULL, '2026-05-06 02:44:11', '2026-05-06 02:44:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
