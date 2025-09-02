-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2025 at 04:09 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bunching_label_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `increments`
--

CREATE TABLE `increments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_number` int(11) DEFAULT '0',
  `machine_number` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `increments`
--

INSERT INTO `increments` (`id`, `last_number`, `machine_number`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2022-09-30 03:56:46', '2022-10-28 07:03:13'),
(2, 4, 221, '2023-01-09 02:33:21', '2025-08-22 02:36:31'),
(3, 1, 223, '2023-01-09 02:34:20', '2025-08-15 04:08:09'),
(4, 1, 222, '2023-01-09 02:42:00', '2025-08-15 04:08:01'),
(5, 4, 230, '2023-01-09 07:05:22', '2025-08-22 02:36:56'),
(6, 3, 225, '2023-01-09 12:33:18', '2025-08-14 23:45:15'),
(7, 1, 227, '2023-01-09 12:38:32', '2025-08-15 04:05:56'),
(8, 4, 231, '2023-01-10 03:10:38', '2025-08-22 02:33:31'),
(9, 3, 226, '2023-01-10 09:58:15', '2025-08-15 04:06:39'),
(10, 4, 217, '2023-01-10 10:17:40', '2025-08-15 04:06:21'),
(11, 3, 229, '2023-01-13 05:57:17', '2025-08-15 04:08:27'),
(12, 3, 224, '2023-01-16 07:01:36', '2025-08-15 04:08:18'),
(13, 1, 228, '2023-01-20 04:22:35', '2025-07-16 02:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lot_number` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formated_lot_number` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` double DEFAULT '0',
  `weight` double DEFAULT '0',
  `shift_date` date DEFAULT NULL,
  `shift` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `machine_number` int(11) DEFAULT '0',
  `pitch` double DEFAULT '0',
  `direction` char(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S',
  `visual` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operator_id` bigint(20) UNSIGNED NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `bobin_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `lot_number`, `formated_lot_number`, `size`, `length`, `weight`, `shift_date`, `shift`, `machine_number`, `pitch`, `direction`, `visual`, `operator_id`, `remark`, `bobin_no`, `created_at`, `updated_at`) VALUES
(1, '2212508213', '221-25-08-21-3', 'CONTOH AJA', 23, 32, '2025-08-21', '1', 221, 20.25, 'S', 'OK', 14, '332', '4', '2025-08-22 02:15:06', '2025-08-22 02:15:06'),
(2, '2212508214', '221-25-08-21-4', 'CONTOH AJA', 233, 3, '2025-08-21', '1', 221, 22.5, 'Z', 'OK', 14, '3', '22', '2025-08-22 02:15:43', '2025-08-22 02:15:43'),
(3, '2312508223', '231-25-08-22-3', 'CONTOH AJA', 13, 32, '2025-08-22', '2', 231, 20.25, 'S', 'OK', 14, '2', '3', '2025-08-22 02:33:31', '2025-08-22 02:33:31'),
(4, '221250822001', '221-25-08-22-001', 'CONTOH AJA', 123, 3233, '2025-08-22', '1', 221, 20.25, 'S', 'OK', 14, 'edadde', '2', '2025-08-22 02:36:31', '2025-08-22 02:36:31'),
(5, '230250822001', '230-25-08-22-001', 'CONTOH AJA', 6, 3233, '2025-08-22', '2', 230, 20.25, 'S', 'OK', 14, '2', '3', '2025-08-22 02:36:56', '2025-08-22 02:36:56');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_08_11_062538_create_labels_table', 1),
(4, '2022_08_26_125652_create_increments_table', 1),
(5, '2022_09_20_080404_change_lot_number_column_from_labels_table', 1),
(6, '2022_09_28_073337_add_formated_lot_number_column_to_labels_table', 1),
(7, '2022_10_11_082527_add_machine_no_column_to_increments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nsk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nsk`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '3286', '$2y$10$I5YW9.qBF5Q0xJTSs5VTm.9AGuycrZa739pZcM3tT/teD5D/uc.wm', 0, NULL, NULL, '2022-10-03 01:04:06'),
(2, 'Eka Ferdiansyah', '3293', '$2y$10$SjVBd6.BKmYfWeXvHh2uoOPxZLx6YTEplKbO2YjrPpj3TuIEvXrqK', 1, NULL, '2022-10-03 01:07:10', '2022-10-03 01:07:10'),
(3, 'Yusuf', '3149', '$2y$10$eIOWWEr8X/IXXXQCmCnk4ehjHxbWktXL8NID/v40ax6e05HQz.YZy', 1, NULL, '2022-10-03 01:19:30', '2022-10-03 01:19:30'),
(4, 'Guntur', '3150', '$2y$10$03g35P/.k9YkZwmort3Steseyc9mYgFa53ICl7Mc4vALjx9sppUUe', 1, NULL, '2022-10-03 01:20:05', '2022-10-03 01:20:05'),
(5, 'Sukma', '3246', '$2y$10$8tPNLtiw67xTbE4rasv77.oWnZG7m4j2.0MvO/ItJLSv67h1PpmwK', 1, NULL, '2022-10-03 01:20:41', '2022-10-03 01:20:41'),
(6, 'Herianto', '3268', '$2y$10$VIQxvT8PwgKbihr5.QzOReIGUt/7vLHmhWK2Z6KRWQZOvtSQV9KDS', 1, NULL, '2022-10-03 01:22:26', '2022-10-03 01:22:26'),
(7, 'Aef Gunawan', '3269', '$2y$10$i8NbQp9I9OyiLD0DY537fOs/AWh4T4RkPeY0oGgD/LusmXF7JDHEm', 1, NULL, '2022-10-03 01:23:00', '2024-10-28 06:57:47'),
(8, 'Naoval', '3324', '$2y$10$MYh02BC4T4XyyJqN.XrYWeilDoUPUfUOY1qScrH/YXLwlV06Whkfq', 1, NULL, '2022-10-03 01:23:30', '2023-08-07 04:05:58'),
(9, 'Sapto', '3288', '$2y$10$SjGjP64.Hxfg3/rL41IZWOCXowC86.qYC5JmBcjC/oO3CJCh3BvZW', 0, NULL, '2022-10-03 01:24:48', '2022-10-03 01:24:48'),
(10, 'Budi P', '2927', '$2y$10$iJoW6Havxcqe2aEGDhlWA.7n/QWp6oLtNbkYVswo5Y9k3zktvpTOe', 0, NULL, '2022-10-03 01:25:29', '2022-10-03 01:25:29'),
(11, 'Hari. S', '3114', '$2y$10$xbjaYGVAHGnQzKyk8UgRE.3paNIESmzPvHyXGpl13V5Bzv.H75bHW', 1, NULL, '2023-03-09 12:27:28', '2023-03-09 12:27:28'),
(12, 'Yories Wirawan', '3175', '$2y$10$Sj34InNVGwb2JMN0h0zHXOsuNBkjfihX.sfmaigdKbNoyJOXij8Le', 1, NULL, '2025-05-21 09:41:28', '2025-05-21 09:41:28'),
(13, 'Ricky Febiantoro', '3378', '$2y$10$lbEYLTqXyMezOf8NUtwh.ed2Mvu1y/XWciQhK1.vSXsCd3NxPuWG2', 1, NULL, '2025-05-21 09:41:55', '2025-05-21 09:41:55'),
(14, 'Faiz', '2005', '$2y$10$w4kLepAiEIbzyiIZpGqK6uMM8mz6zrZaIrJfw77X1YccaKFXOdMXu', 0, NULL, '2025-08-22 02:06:31', '2025-08-22 02:06:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `increments`
--
ALTER TABLE `increments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `labels_lot_number_index` (`lot_number`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nsk_unique` (`nsk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `increments`
--
ALTER TABLE `increments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
