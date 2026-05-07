-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2026 at 11:08 AM
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
-- Database: `klarin_20236025_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_05_07_020338_create_overtimes_table', 1),
(6, '2026_05_07_020344_create_tasks_table', 1),
(7, '2026_05_07_020350_create_task_submissions_table', 1),
(8, '2026_05_07_034044_add_kuota_to_overtimes_table', 1),
(9, '2026_05_07_034057_create_overtime_mahasiswa_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

CREATE TABLE `overtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `judul_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `kuota` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `overtimes`
--

INSERT INTO `overtimes` (`id`, `dosen_id`, `judul_kegiatan`, `tanggal`, `kuota`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mandi', '2026-05-08', 1, '2026-05-06 21:08:58', '2026-05-06 21:08:58'),
(2, 1, 'Mandi', '2026-05-07', 1, '2026-05-06 21:21:17', '2026-05-06 21:21:17'),
(3, 1, 'Membersihkan PC', '2026-05-14', 1, '2026-05-07 04:33:48', '2026-05-07 04:33:48'),
(4, 1, 'Membersihkan PC', '2026-05-08', 1, '2026-05-07 04:35:34', '2026-05-07 04:35:34'),
(5, 1, 'Beli Es Teh', '2026-05-08', 2, '2026-05-07 04:43:15', '2026-05-07 04:43:15'),
(6, 1, 'Memadamkan Api', '2026-05-07', 4, '2026-05-07 04:44:37', '2026-05-07 04:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `overtime_mahasiswa`
--

CREATE TABLE `overtime_mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `overtime_id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('progress','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'progress',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `overtime_mahasiswa`
--

INSERT INTO `overtime_mahasiswa` (`id`, `overtime_id`, `mahasiswa_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'selesai', '2026-05-06 21:09:40', '2026-05-06 21:09:55'),
(2, 2, 2, 'selesai', '2026-05-06 21:21:49', '2026-05-06 21:22:08'),
(3, 3, 2, 'selesai', '2026-05-07 04:34:10', '2026-05-07 04:34:33'),
(4, 4, 2, 'selesai', '2026-05-07 04:36:09', '2026-05-07 04:36:28'),
(5, 5, 2, 'selesai', '2026-05-07 04:43:27', '2026-05-07 04:43:48'),
(6, 6, 2, 'progress', '2026-05-07 04:47:45', '2026-05-07 04:47:45'),
(7, 6, 4, 'selesai', '2026-05-07 07:54:53', '2026-05-07 07:55:07'),
(8, 5, 4, 'selesai', '2026-05-07 07:55:20', '2026-05-07 07:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `overtime_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `overtime_id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ambil handuk', '2026-05-06 21:08:58', '2026-05-06 21:08:58'),
(2, 1, 'Buka pintu kamar mandi', '2026-05-06 21:08:58', '2026-05-06 21:08:58'),
(3, 2, 'Ambil handuk', '2026-05-06 21:21:17', '2026-05-06 21:21:17'),
(4, 3, 'buka casing', '2026-05-07 04:33:48', '2026-05-07 04:33:48'),
(5, 3, 'meminjam kuas', '2026-05-07 04:33:48', '2026-05-07 04:33:48'),
(6, 4, 'meminjam toolkit', '2026-05-07 04:35:34', '2026-05-07 04:35:34'),
(7, 4, 'buka casing', '2026-05-07 04:35:34', '2026-05-07 04:35:34'),
(8, 4, 'pinjam kuas', '2026-05-07 04:35:34', '2026-05-07 04:35:34'),
(9, 5, 'Ijin check out', '2026-05-07 04:43:15', '2026-05-07 04:43:15'),
(10, 5, 'otw wedangan', '2026-05-07 04:43:15', '2026-05-07 04:43:15'),
(11, 6, 'ambil apar', '2026-05-07 04:44:37', '2026-05-07 04:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `task_submissions`
--

CREATE TABLE `task_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_submissions`
--

INSERT INTO `task_submissions` (`id`, `task_id`, `mahasiswa_id`, `is_completed`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1, '2026-05-06 21:22:06', '2026-05-06 21:22:06'),
(2, 4, 2, 1, '2026-05-07 04:34:24', '2026-05-07 04:34:24'),
(3, 5, 2, 1, '2026-05-07 04:34:24', '2026-05-07 04:34:24'),
(4, 6, 2, 1, '2026-05-07 04:36:25', '2026-05-07 04:36:25'),
(5, 7, 2, 1, '2026-05-07 04:36:25', '2026-05-07 04:36:25'),
(6, 8, 2, 1, '2026-05-07 04:36:25', '2026-05-07 04:36:25'),
(7, 9, 2, 1, '2026-05-07 04:43:44', '2026-05-07 04:43:44'),
(8, 10, 2, 1, '2026-05-07 04:43:44', '2026-05-07 04:43:44'),
(9, 11, 4, 1, '2026-05-07 07:55:02', '2026-05-07 07:55:04'),
(10, 9, 4, 1, '2026-05-07 07:55:29', '2026-05-07 07:55:45'),
(11, 10, 4, 1, '2026-05-07 07:55:29', '2026-05-07 07:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('dosen','mahasiswa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_induk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `nomor_induk`, `foto`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'guru1', 'dosen', '1001', NULL, '$2y$12$q6hWhudXVla38XU1npa74edCpCDfKu5pq0LKukqrOJixyWnkktOQi', NULL, '2026-05-06 21:03:14', '2026-05-07 07:28:49'),
(2, 'mhs1', 'mahasiswa', '20236001', NULL, '$2y$12$ZFkFOzVSEfW6GDDBb1Y9EuS5mIkL8uD.Sz2aJ0ncFNhnufU0rkMk.', NULL, '2026-05-06 21:09:34', '2026-05-06 21:09:34'),
(3, 'mhs20', 'mahasiswa', '20232002', 'profile_photos/eqkkPqTcVFIcqPkuZOPk1EeKQ9l1l4QnX6bpvwK2.jpg', '$2y$12$1B2s1C1tYAVQz2aHBjIpHO2BpA5WVMNPJexbxMPMtNCgNxuHEIU4G', NULL, '2026-05-07 04:51:21', '2026-05-07 04:51:21'),
(4, 'hiz', 'mahasiswa', '20236890', 'profile_photos/RexaTyBEuz8ksrWV0ubG5rcsmo6dID8aZtjQfOap.jpg', '$2y$12$CQPce/Z2Do1gucHl6YS5he/dy9dDaO7cPJTnYqM/pq5VFGT2gsSUO', NULL, '2026-05-07 07:54:34', '2026-05-07 07:54:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overtimes_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `overtime_mahasiswa`
--
ALTER TABLE `overtime_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overtime_mahasiswa_overtime_id_foreign` (`overtime_id`),
  ADD KEY `overtime_mahasiswa_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_overtime_id_foreign` (`overtime_id`);

--
-- Indexes for table `task_submissions`
--
ALTER TABLE `task_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_submissions_task_id_foreign` (`task_id`),
  ADD KEY `task_submissions_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nomor_induk_unique` (`nomor_induk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `overtime_mahasiswa`
--
ALTER TABLE `overtime_mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task_submissions`
--
ALTER TABLE `task_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD CONSTRAINT `overtimes_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `overtime_mahasiswa`
--
ALTER TABLE `overtime_mahasiswa`
  ADD CONSTRAINT `overtime_mahasiswa_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `overtime_mahasiswa_overtime_id_foreign` FOREIGN KEY (`overtime_id`) REFERENCES `overtimes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_overtime_id_foreign` FOREIGN KEY (`overtime_id`) REFERENCES `overtimes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_submissions`
--
ALTER TABLE `task_submissions`
  ADD CONSTRAINT `task_submissions_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_submissions_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
