-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2025 at 12:09 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `humanresourceapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` bigint UNSIGNED NOT NULL,
  `karyawan_id` bigint UNSIGNED NOT NULL,
  `jenis_cuti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `karyawan_id`, `jenis_cuti`, `mulai`, `selesai`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'sakit', '2023-09-20', '2023-09-23', 'tolak', '2025-10-19 21:32:50', '2025-10-31 04:48:26', NULL),
(2, 2, 'liburan', '2023-09-20', '2023-09-21', 'Pending', '2025-10-19 21:32:50', '2025-10-19 21:32:50', NULL),
(3, 3, 'sakit', '2023-09-22', '2023-09-23', 'terima', '2025-10-19 21:32:50', '2025-10-31 04:48:22', NULL),
(4, 2, 'liburan', '2025-11-01', '2025-11-14', 'Pending', '2025-10-31 03:23:44', '2025-10-31 04:48:38', '2025-10-31 04:48:38'),
(5, 2, 'sakit', '2025-11-01', '2025-11-14', 'Pending', '2025-11-01 03:33:18', '2025-11-01 03:33:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `nama`, `deskripsi`, `status`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'IT', 'Departemen IT', 'Aktif', 'Jakarta', '2025-10-19 21:32:50', '2025-10-19 21:32:50', NULL),
(2, 'HRD', 'Departemen HRD', 'nonaktif', 'Jakarta', '2025-10-19 21:32:50', '2025-10-29 07:46:48', NULL),
(3, 'Keuangan', 'Departemen Keuangan', 'Aktif', 'Jakarta', '2025-10-19 21:32:50', '2025-10-19 21:32:50', NULL),
(4, 'a', 'aa', 'nonaktif', 'a', '2025-10-29 01:43:01', '2025-10-29 07:41:49', '2025-10-29 07:41:49'),
(5, 'ssss', 'aaaa', 'nonaktif', 'ssss', '2025-10-29 01:43:29', '2025-10-29 01:43:29', NULL),
(6, 'xxxz', 'xxx', 'nonaktif', 'ssss', '2025-10-29 01:45:06', '2025-10-29 01:45:06', NULL),
(7, 'kkk', 'kkkk', 'nonaktif', 'kkkk', '2025-10-29 01:48:56', '2025-10-29 01:48:56', NULL),
(8, 'ayayayay', 'ayayaya', 'nonaktif', 'ayayayya', '2025-10-29 02:17:53', '2025-10-29 07:46:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_rekrutment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen_id` bigint UNSIGNED NOT NULL,
  `roles_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `email`, `nomor_hp`, `alamat`, `tgl_lahir`, `tgl_rekrutment`, `departemen_id`, `roles_id`, `status`, `gaji`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ms. Bridgette Wilderman III', 'donnie83@example.com', '475.773.3672', '16746 Berge Circles\nCollierville, SC 14459', '1994-09-28 14:33:28', '2025-10-20 04:32:50', 1, 1, 'aktif', 3000000, '2025-10-19 21:32:50', '2025-10-19 21:32:50', NULL),
(2, 'Delta Runte', 'ryleigh.kessler@example.net', '563-606-9365', '644 Kuvalis Brooks\nHermanville, AL 82387', '1996-09-03 03:17:02', '2025-10-20 04:32:50', 2, 2, 'nonaktif', 2800000, '2025-10-19 21:32:50', '2025-10-28 07:57:24', NULL),
(3, 'Mr. Alexzander Glover', 'georgette.ohara@example.org', '+1 (847) 301-1268', '8465 Orie River\nEast Colin, AK 47769', '1995-12-11 19:05:38', '2025-10-20 04:32:50', 3, 3, 'non-acitve', 2700000, '2025-10-19 21:32:50', '2025-10-28 09:08:45', NULL),
(4, 'aditya', 'septiadit@example.com', '1112222', 'yogya', '2025-10-22', '2025-10-31', 3, 3, 'aktif', 1200000, '2025-10-28 05:00:43', '2025-10-28 07:51:27', '2025-10-28 07:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` bigint UNSIGNED NOT NULL,
  `karyawan_id` bigint UNSIGNED NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `karyawan_id`, `check_in`, `check_out`, `date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2023-09-23 00:00:00', '2023-09-23 00:00:00', '2023-09-23', 'hadir', '2025-10-19 21:32:50', '2025-10-19 21:32:50', NULL),
(2, 2, '2023-09-23 00:00:00', '2023-09-23 00:00:00', '2023-09-23', 'hadir', '2025-10-19 21:32:50', '2025-10-19 21:32:50', NULL),
(3, 3, '2023-09-23 00:00:00', '2023-09-23 00:00:00', '2023-09-23', 'hadir', '2025-10-19 21:32:50', '2025-10-19 21:32:50', NULL),
(4, 1, '2025-10-30 06:00:00', '2025-10-30 17:00:00', '2025-10-30', 'sakit', '2025-10-30 05:20:02', '2025-10-30 05:38:30', '2025-10-30 05:38:30'),
(5, 2, '2025-10-30 12:00:00', '2025-10-30 17:00:00', '2025-10-30', 'hadir', '2025-10-30 05:24:50', '2025-10-30 05:38:41', '2025-10-30 05:38:41'),
(6, 2, '2025-10-31 17:20:19', '2025-10-31 17:20:19', '2025-10-31', 'hadir', '2025-10-31 10:20:19', '2025-10-31 10:20:19', NULL),
(7, 2, '2025-10-31 17:20:49', '2025-10-31 17:20:49', '2025-10-31', 'hadir', '2025-10-31 10:20:49', '2025-10-31 10:20:49', NULL),
(8, 2, '2025-10-31 17:21:08', '2025-11-01 01:21:08', '2025-10-31', 'hadir', '2025-10-31 10:21:08', '2025-10-31 10:21:08', NULL),
(9, 2, '2025-11-01 12:00:00', '2025-11-01 16:00:00', '2025-11-01', 'sakit', '2025-11-01 01:59:36', '2025-11-01 01:59:36', NULL),
(10, 2, '2025-11-01 09:37:41', '2025-11-01 09:44:06', '2025-11-01', 'hadir', '2025-11-01 02:37:41', '2025-11-01 02:44:06', NULL),
(11, 2, '2025-11-01 09:45:28', '2025-11-01 09:45:48', '2025-11-01', 'hadir', '2025-11-01 02:45:28', '2025-11-01 02:45:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_19_153723_create_human_resource_app', 1),
(5, '2025_10_19_162334_alter_table_users', 1);

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
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` bigint UNSIGNED NOT NULL,
  `karyawan_id` bigint UNSIGNED NOT NULL,
  `gaji` int NOT NULL,
  `bonus` int DEFAULT NULL,
  `potongan` int DEFAULT NULL,
  `gaji_bersih` int NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `karyawan_id`, `gaji`, `bonus`, `potongan`, `gaji_bersih`, `tgl_pembayaran`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 851, 838, 303, 83, '2023-09-23', '2025-10-19 21:32:50', '2025-10-30 07:32:24', '2025-10-30 07:32:24'),
(2, 2, 117, 545, 578, 202, '2023-09-23', '2025-10-19 21:32:50', '2025-10-30 07:21:50', '2025-10-30 07:21:50'),
(3, 3, 417, 375, 124, 516, '2023-09-23', '2025-10-19 21:32:50', '2025-10-30 07:21:54', '2025-10-30 07:21:54'),
(4, 2, 2800000, 50000, 75000, 2775000, '2025-10-30', '2025-10-30 07:18:31', '2025-10-30 07:32:59', NULL),
(5, 3, 2700000, 120000, 20000, 2800000, '2025-10-30', '2025-10-30 07:32:41', '2025-10-30 07:32:41', NULL),
(6, 2, 2800000, 100000, 20000, 2880000, '2025-10-30', '2025-10-30 07:33:24', '2025-10-30 07:33:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HR', 'Kelola Sumber Daya', '2025-10-19 21:32:50', '2025-10-19 21:32:50', NULL),
(2, 'IT', 'Teknologi dan Sistem', '2025-10-19 21:32:50', '2025-10-19 21:32:50', NULL),
(3, 'Keuangan', 'Aturan Aliran Dana', '2025-10-19 21:32:50', '2025-10-19 21:32:50', NULL),
(4, 'ahahahah', 'ahahahaha', '2025-10-29 09:56:57', '2025-10-29 23:45:30', '2025-10-29 23:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('QPqY5Vr4Mig9UeZf0fg8NqWRI7JNP3bknfYcdMSb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36 Edg/141.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieUJGRkF0Wk03M0tCaTU1cGd6Z0NUa0xJSXRsSk5kTWxsbml1eEE4WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1761998405);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `penugasan` bigint UNSIGNED NOT NULL,
  `tenggat_waktu` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `nama`, `deskripsi`, `penugasan`, `tenggat_waktu`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Quidem commodi consequatur error.', 'Non doloremque ipsum aut voluptatem praesentium voluptatem. Non eum accusantium impedit accusamus omnis voluptatibus iste. Molestias officia est laudantium temporibus quod. Suscipit vitae quas omnis porro. Molestiae sequi a suscipit mollitia repellendus commodi.', 1, '2023-12-31', 'selesai', '2025-10-19 21:32:50', '2025-10-27 04:45:59', NULL),
(2, 'Vel autem perspiciatis consequuntur.', 'Sit sit sint aut nam. Sed neque ad eum quas cumque. Quasi pariatur rerum dolore voluptatem.', 2, '2023-12-23', 'selesai', '2025-10-19 21:32:50', '2025-10-19 21:32:50', NULL),
(3, 'Et blanditiis odio.', 'Est veniam et voluptate nemo officiis illo. Nam minus sed illo beatae et voluptatem voluptatem. Temporibus hic qui assumenda. Enim aliquam soluta aut aperiam rerum consequatur.', 3, '2023-09-23', 'Pending', '2025-10-19 21:32:50', '2025-10-27 04:07:36', '2025-10-27 04:07:36'),
(4, 'kuli ah yaa part 2', 'kuliah', 3, '2025-10-31', 'selesai', '2025-10-22 09:58:56', '2025-10-27 04:30:36', NULL),
(5, 'test', 'test', 3, '2025-10-27', 'pending', '2025-10-26 05:28:45', '2025-10-27 04:46:01', NULL),
(6, 'test1', 'test11', 2, '2025-10-26', 'Pending', '2025-10-26 05:56:06', '2025-10-27 04:09:11', '2025-10-27 04:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `karyawan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `karyawan_id`) VALUES
(1, 'test', 'test@example.com', NULL, '$2y$12$s28KyIwGovXepRiZrrAGouUMmGRzIs7aTo.eskz/UDw3iWWyW57hy', NULL, '2025-10-19 22:14:45', '2025-10-19 22:14:45', '1'),
(2, 'Delta Runte', 'test2@example.com', NULL, '$2y$12$s28KyIwGovXepRiZrrAGouUMmGRzIs7aTo.eskz/UDw3iWWyW57hy', NULL, '2025-10-19 22:14:45', '2025-10-19 22:14:45', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `karyawan_email_unique` (`email`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
