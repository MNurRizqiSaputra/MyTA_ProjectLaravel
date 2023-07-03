-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2023 at 06:13 AM
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
-- Database: `myta_project_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `jurusan_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `nip`, `foto`, `user_id`, `jurusan_id`, `created_at`, `updated_at`, `nohp`) VALUES
(2, '9123813293', 'public/fotos/dosen//1686665667_rama.png', 10, 2, '2023-06-08 06:39:29', '2023-06-16 08:45:24', '0812312332'),
(3, '9824234231', 'public/fotos/dosen//1686319329_pas_poto.jpg', 11, 1, '2023-06-08 06:39:38', '2023-06-09 07:02:09', NULL),
(11, '9192319238', 'public/fotos/dosen//1686667805_rama.png', 12, 1, '2023-06-08 09:33:03', '2023-06-13 07:50:05', NULL),
(12, NULL, NULL, 17, NULL, '2023-06-08 23:34:21', '2023-06-08 23:34:21', NULL),
(13, '9123490123', 'public/fotos/dosen//1686319361_rama.png', 18, 2, '2023-06-08 23:34:49', '2023-06-09 07:02:41', NULL),
(33, NULL, NULL, 33, NULL, '2023-06-16 09:28:12', '2023-06-16 09:28:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_pembimbings`
--

CREATE TABLE `dosen_pembimbings` (
  `id` bigint UNSIGNED NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen_pembimbings`
--

INSERT INTO `dosen_pembimbings` (`id`, `dosen_id`, `created_at`, `updated_at`) VALUES
(5, 13, '2023-06-09 06:31:46', '2023-06-09 06:31:46'),
(6, 2, '2023-06-10 08:21:14', '2023-06-10 08:21:14'),
(7, 3, '2023-06-10 08:21:21', '2023-06-10 08:21:21'),
(10, 12, '2023-06-13 10:40:08', '2023-06-13 10:40:08'),
(11, 11, '2023-06-13 10:40:17', '2023-06-13 10:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_pengujis`
--

CREATE TABLE `dosen_pengujis` (
  `id` bigint UNSIGNED NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen_pengujis`
--

INSERT INTO `dosen_pengujis` (`id`, `dosen_id`, `created_at`, `updated_at`) VALUES
(1, 11, '2023-06-08 23:35:17', '2023-06-08 23:35:17'),
(2, 12, '2023-06-08 23:35:23', '2023-06-08 23:35:23'),
(3, 13, '2023-06-08 23:35:28', '2023-06-08 23:35:28'),
(5, 2, '2023-06-13 10:41:14', '2023-06-13 10:41:14'),
(7, 3, '2023-06-25 19:10:49', '2023-06-25 19:10:49');

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
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Sistem Informasi', '2023-06-08 06:04:38', '2023-06-08 06:04:38'),
(2, 'Teknik Informatika', '2023-06-08 06:04:46', '2023-06-08 06:04:46'),
(3, 'Sastra Inggris', '2023-06-08 06:04:54', '2023-06-08 06:04:54'),
(4, 'Teknik Kimia', '2023-06-08 06:05:05', '2023-06-08 06:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint UNSIGNED NOT NULL,
  `nim` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `jurusan_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `nim`, `foto`, `user_id`, `jurusan_id`, `created_at`, `updated_at`, `nohp`) VALUES
(1, '17200477', 'public/fotos/mahasiswa//1686294077_rama.png', 14, 1, '2023-06-08 07:00:17', '2023-06-09 00:01:17', NULL),
(21, NULL, NULL, 22, NULL, '2023-06-11 03:05:08', '2023-06-11 03:05:08', NULL),
(27, NULL, NULL, 30, NULL, '2023-06-16 08:59:20', '2023-06-16 08:59:20', NULL);

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_16_035055_create_jurusans_table', 1),
(6, '2023_05_16_063819_create_roles_table', 1),
(7, '2023_05_17_032938_create_users_table', 1),
(8, '2023_05_17_033644_create_dosens_table', 1),
(9, '2023_05_17_033656_create_mahasiswas_table', 1),
(10, '2023_05_17_053106_create_dosen_pengujis_table', 1),
(11, '2023_05_17_053115_create_dosen_pembimbings_table', 1),
(12, '2023_05_17_070801_create_tugas_akhirs_table', 1),
(13, '2023_05_17_081015_create_seminar_proposals_table', 1),
(14, '2023_05_17_152613_create_seminar_proposal_nilai_table', 1),
(15, '2023_05_17_185028_create_seminar_penelitians_table', 1),
(16, '2023_05_17_185525_create_seminar_penelitian_nilai_table', 1),
(17, '2023_05_17_190435_create_sidang_akhirs_table', 1),
(18, '2023_05_17_190914_create_sidang_akhir_nilai_table', 1),
(19, '2023_05_31_024413_update_column_nullable_in_seminar_proposals_table', 1),
(20, '2023_06_02_122857_update_column_nullable_in_seminar_penelitians_table', 1),
(21, '2023_06_02_122903_update_column_nullable_in_sidang_akhirs_table', 1),
(22, '2023_06_09_121054_remove_dosen_pembimbing_id_from_tugas_akhirs', 2),
(23, '2023_06_09_121630_drop_foreign_key_constraint_from_tugas_akhirs', 3),
(24, '2023_06_09_130254_modify_dosen_pembimbing_id_nullable_in_tugas_akhirs', 4),
(25, '2023_06_13_120914_drop_column_waktu_in_sidang_akhirs', 5),
(26, '2023_06_13_120939_drop_column_waktu_in_seminar_penelitians', 5),
(27, '2023_06_13_120954_drop_column_waktu_in_seminar_proposals', 5),
(28, '2023_06_13_121413_add_column_waktu_awal_and_waktu_akhir_in_sidang_akhirs', 6),
(29, '2023_06_13_121422_add_column_waktu_awal_and_waktu_akhir_in_seminar_penelitians', 6),
(30, '2023_06_13_121427_add_column_waktu_awal_and_waktu_akhir_in_seminar_proposals', 6),
(34, '2023_06_13_122936_drop_column_waktu_add_column_waktu_mulai_waktu_selesai_in_seminar_proposals', 7),
(35, '2023_06_13_122952_drop_column_waktu_add_column_waktu_mulai_waktu_selesai_in_seminar_penelitians', 7),
(36, '2023_06_13_123012_drop_column_waktu_add_column_waktu_mulai_waktu_selesai_in_sidang_akhirs', 7),
(37, '2023_06_15_033824_add_column_tanggal_lahir_in_users', 8),
(40, '2023_06_15_114804_add_column_nohp_in_dosens', 9),
(41, '2023_06_15_114816_add_column_nohp_in_mahasiswas', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 6, 'authToken', 'f995da19eac907d761599716dbc4f09021bceea38c0003df026dd7f99a9d43da', '[\"*\"]', NULL, NULL, '2023-06-08 05:14:16', '2023-06-08 05:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(3, 'mahasiswa', '2023-06-08 05:25:56', '2023-06-08 05:25:56'),
(4, 'dosen', '2023-06-08 05:59:14', '2023-06-15 04:17:13'),
(8, 'test', '2023-06-24 05:32:47', '2023-06-24 05:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_penelitians`
--

CREATE TABLE `seminar_penelitians` (
  `id` bigint UNSIGNED NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nilai_akhir` int DEFAULT NULL,
  `tugas_akhir_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_penelitians`
--

INSERT INTO `seminar_penelitians` (`id`, `tempat`, `tanggal`, `nilai_akhir`, `tugas_akhir_id`, `created_at`, `updated_at`, `waktu_mulai`, `waktu_selesai`) VALUES
(4, 'Gedung A', '2023-06-13', 90, 29, '2023-06-13 09:34:49', '2023-06-13 09:45:02', '23:40:00', '00:40:00'),
(5, 'Gedung B', '2023-06-13', NULL, 30, '2023-06-13 19:27:33', '2023-06-13 19:40:19', '00:36:00', '01:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_penelitian_nilai`
--

CREATE TABLE `seminar_penelitian_nilai` (
  `id` bigint UNSIGNED NOT NULL,
  `seminar_penelitian_id` bigint UNSIGNED NOT NULL,
  `dosen_penguji_id` bigint UNSIGNED NOT NULL,
  `nilai` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_penelitian_nilai`
--

INSERT INTO `seminar_penelitian_nilai` (`id`, `seminar_penelitian_id`, `dosen_penguji_id`, `nilai`, `created_at`, `updated_at`) VALUES
(8, 4, 2, 90, '2023-06-13 09:40:18', '2023-06-13 09:43:06'),
(9, 4, 1, 90, '2023-06-13 09:40:18', '2023-06-13 09:45:02'),
(11, 5, 2, NULL, '2023-06-13 19:37:08', '2023-06-13 19:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_proposals`
--

CREATE TABLE `seminar_proposals` (
  `id` bigint UNSIGNED NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nilai_akhir` int DEFAULT NULL,
  `tugas_akhir_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_proposals`
--

INSERT INTO `seminar_proposals` (`id`, `tempat`, `tanggal`, `nilai_akhir`, `tugas_akhir_id`, `created_at`, `updated_at`, `waktu_mulai`, `waktu_selesai`) VALUES
(8, 'Gedung A', '2023-06-13', 86, 29, '2023-06-13 09:02:24', '2023-06-13 09:34:23', '23:02:00', '00:03:00'),
(9, 'Gedung A', '2023-06-14', 90, 30, '2023-06-13 18:19:25', '2023-06-13 18:56:02', '08:54:00', '09:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_proposal_nilai`
--

CREATE TABLE `seminar_proposal_nilai` (
  `id` bigint UNSIGNED NOT NULL,
  `seminar_proposal_id` bigint UNSIGNED NOT NULL,
  `dosen_penguji_id` bigint UNSIGNED NOT NULL,
  `nilai` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_proposal_nilai`
--

INSERT INTO `seminar_proposal_nilai` (`id`, `seminar_proposal_id`, `dosen_penguji_id`, `nilai`, `created_at`, `updated_at`) VALUES
(19, 8, 2, 90, '2023-06-13 09:02:54', '2023-06-13 09:09:26'),
(20, 8, 1, 80, '2023-06-13 09:02:54', '2023-06-13 09:10:05'),
(21, 8, 3, 88, '2023-06-13 09:02:54', '2023-06-13 09:34:23'),
(22, 9, 5, 90, '2023-06-13 18:54:50', '2023-06-13 18:55:15'),
(23, 9, 2, 90, '2023-06-13 18:54:50', '2023-06-13 18:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `sidang_akhirs`
--

CREATE TABLE `sidang_akhirs` (
  `id` bigint UNSIGNED NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nilai_akhir` int DEFAULT NULL,
  `tugas_akhir_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidang_akhirs`
--

INSERT INTO `sidang_akhirs` (`id`, `tempat`, `tanggal`, `nilai_akhir`, `tugas_akhir_id`, `created_at`, `updated_at`, `waktu_mulai`, `waktu_selesai`) VALUES
(3, 'Gedung A', '2023-06-14', 83, 29, '2023-06-13 09:48:00', '2023-06-13 11:03:22', '00:00:00', '01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sidang_akhir_nilai`
--

CREATE TABLE `sidang_akhir_nilai` (
  `id` bigint UNSIGNED NOT NULL,
  `sidang_akhir_id` bigint UNSIGNED NOT NULL,
  `dosen_penguji_id` bigint UNSIGNED NOT NULL,
  `nilai` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidang_akhir_nilai`
--

INSERT INTO `sidang_akhir_nilai` (`id`, `sidang_akhir_id`, `dosen_penguji_id`, `nilai`, `created_at`, `updated_at`) VALUES
(9, 3, 2, 80, '2023-06-13 10:00:58', '2023-06-13 11:03:22'),
(10, 3, 1, 85, '2023-06-13 10:00:59', '2023-06-13 10:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_akhirs`
--

CREATE TABLE `tugas_akhirs` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` blob NOT NULL,
  `status_persetujuan` enum('Disetujui','Tidak Disetujui','Pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `total_nilai` int DEFAULT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dosen_pembimbing_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas_akhirs`
--

INSERT INTO `tugas_akhirs` (`id`, `judul`, `file`, `status_persetujuan`, `total_nilai`, `mahasiswa_id`, `created_at`, `updated_at`, `dosen_pembimbing_id`) VALUES
(29, 'tugas akhir rizki', 0x7075626c69632f74756761732d616b6869722f312f313638363636393530335f4d6167616e675f52616d615f416c66696e5f426165686171692e706466, 'Disetujui', 86, 1, '2023-06-13 07:12:42', '2023-06-13 11:03:22', 6),
(30, 'test', 0x7075626c69632f74756761732d616b6869722f32312f313638363637393830325f4d6167616e675f52616d615f416c66696e5f426165686171692e706466, 'Disetujui', NULL, 21, '2023-06-13 11:10:02', '2023-06-13 11:22:08', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `tanggal_lahir`) VALUES
(6, 'admin', 'admin@gmail.com', '$2y$10$19ZvKcs2BYsFSDh18/TrL.WkLexMq8plNra5e/lWsFJ6rcEsVmXbC', 1, NULL, NULL, '2023-06-08 05:14:16', '2023-06-08 05:14:16', NULL),
(10, 'Agus, S.Kom', 'agus@gmail.com', '$2y$10$ijvxxNe4Olkj0rvR5pX8tujluGaZRxHFmlVR3tiT6v6vvZ3M9xZ/.', 4, NULL, NULL, '2023-06-08 06:39:29', '2023-06-16 09:31:32', '2001-12-12'),
(11, 'Budi, S.T', 'budi@gmail.com', '$2y$10$954BGG4aYcKn0RlAsP9ZuOSjjk.HnlSvSlLhUpD8GuLXBSSsGqA6u', 4, NULL, NULL, '2023-06-08 06:39:38', '2023-06-08 06:39:38', NULL),
(12, 'Eka, S.T', 'eka@gmail.com', '$2y$10$HoUmrZ20GGvFgkiB5/18uuHrN3f3LZ8zzfAaXfQQZH8fcUzGO08C6', 4, NULL, NULL, '2023-06-08 06:39:49', '2023-06-10 04:21:34', NULL),
(14, 'rizki', 'rizki@gmail.com', '$2y$10$fyiKoTCiJhBbjt37YUbETODADybUZN.PjtIEykriGl2EnaEUoGEne', 3, NULL, NULL, '2023-06-08 07:00:17', '2023-06-08 07:00:17', NULL),
(17, 'Dewi, S.Kom', 'dewi@gmail.com', '$2y$10$ZqR/BHa/r4PkFp37LEm05OypK1U8lOWGR1f/PTiL0/.4moUak5OHi', 4, NULL, NULL, '2023-06-08 23:34:21', '2023-06-08 23:34:21', NULL),
(18, 'Fauzan, M.Kom', 'fauzan@gmail.com', '$2y$10$HJDHNz9p213MIw946SqohOBKZrg6LDtHRgLsouy6vGdEVb.IroVa.', 4, NULL, NULL, '2023-06-08 23:34:49', '2023-06-08 23:34:49', NULL),
(22, 'rama', 'ramaalfin7@gmail.com', '$2y$10$v2yg4yBnnQtVpLFa16j1e.ZCfEdb04wmb5s0b1f7SaLbbQydRQxNi', 3, NULL, NULL, '2023-06-11 02:32:37', '2023-06-13 01:58:55', NULL),
(30, 'dwi', 'dwi@gmail.com', '$2y$10$HMpbTRv/xWNiDsmorQOxcOf/nffh29Z9Bwg1HvFKWWBqyg3hv4E/S', 3, NULL, NULL, '2023-06-15 06:06:48', '2023-06-16 08:59:20', '2001-12-12'),
(33, 'test', 'test@gmail.com', '$2y$10$8Wckra.1OKM4ZsGcW5frYutpxUDJHcFtaOFYF3fSmqNM2m9OTEHQi', 4, NULL, NULL, '2023-06-16 09:28:12', '2023-06-16 09:28:12', '2001-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosens_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `dosens_nip_unique` (`nip`),
  ADD KEY `dosens_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `dosen_pembimbings`
--
ALTER TABLE `dosen_pembimbings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_pembimbings_dosen_id_unique` (`dosen_id`);

--
-- Indexes for table `dosen_pengujis`
--
ALTER TABLE `dosen_pengujis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosen_pengujis_dosen_id_unique` (`dosen_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswas_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `mahasiswas_nim_unique` (`nim`),
  ADD KEY `mahasiswas_jurusan_id_foreign` (`jurusan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminar_penelitians`
--
ALTER TABLE `seminar_penelitians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seminar_penelitians_tugas_akhir_id_unique` (`tugas_akhir_id`);

--
-- Indexes for table `seminar_penelitian_nilai`
--
ALTER TABLE `seminar_penelitian_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seminar_penelitian_nilai_seminar_penelitian_id_foreign` (`seminar_penelitian_id`),
  ADD KEY `seminar_penelitian_nilai_dosen_penguji_id_foreign` (`dosen_penguji_id`);

--
-- Indexes for table `seminar_proposals`
--
ALTER TABLE `seminar_proposals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seminar_proposals_tugas_akhir_id_unique` (`tugas_akhir_id`);

--
-- Indexes for table `seminar_proposal_nilai`
--
ALTER TABLE `seminar_proposal_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seminar_proposal_nilai_seminar_proposal_id_foreign` (`seminar_proposal_id`),
  ADD KEY `seminar_proposal_nilai_dosen_penguji_id_foreign` (`dosen_penguji_id`);

--
-- Indexes for table `sidang_akhirs`
--
ALTER TABLE `sidang_akhirs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sidang_akhirs_tugas_akhir_id_unique` (`tugas_akhir_id`);

--
-- Indexes for table `sidang_akhir_nilai`
--
ALTER TABLE `sidang_akhir_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sidang_akhir_nilai_sidang_akhir_id_foreign` (`sidang_akhir_id`),
  ADD KEY `sidang_akhir_nilai_dosen_penguji_id_foreign` (`dosen_penguji_id`);

--
-- Indexes for table `tugas_akhirs`
--
ALTER TABLE `tugas_akhirs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tugas_akhirs_mahasiswa_id_unique` (`mahasiswa_id`),
  ADD UNIQUE KEY `tugas_akhirs_judul_unique` (`judul`),
  ADD KEY `tugas_akhirs_dosen_pembimbing_id_foreign` (`dosen_pembimbing_id`);

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
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `dosen_pembimbings`
--
ALTER TABLE `dosen_pembimbings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dosen_pengujis`
--
ALTER TABLE `dosen_pengujis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seminar_penelitians`
--
ALTER TABLE `seminar_penelitians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seminar_penelitian_nilai`
--
ALTER TABLE `seminar_penelitian_nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seminar_proposals`
--
ALTER TABLE `seminar_proposals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `seminar_proposal_nilai`
--
ALTER TABLE `seminar_proposal_nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sidang_akhirs`
--
ALTER TABLE `sidang_akhirs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sidang_akhir_nilai`
--
ALTER TABLE `sidang_akhir_nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tugas_akhirs`
--
ALTER TABLE `tugas_akhirs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosens`
--
ALTER TABLE `dosens`
  ADD CONSTRAINT `dosens_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dosens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dosen_pembimbings`
--
ALTER TABLE `dosen_pembimbings`
  ADD CONSTRAINT `dosen_pembimbings_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen_pengujis`
--
ALTER TABLE `dosen_pengujis`
  ADD CONSTRAINT `dosen_pengujis_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `seminar_penelitians`
--
ALTER TABLE `seminar_penelitians`
  ADD CONSTRAINT `seminar_penelitians_tugas_akhir_id_foreign` FOREIGN KEY (`tugas_akhir_id`) REFERENCES `tugas_akhirs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `seminar_penelitian_nilai`
--
ALTER TABLE `seminar_penelitian_nilai`
  ADD CONSTRAINT `seminar_penelitian_nilai_dosen_penguji_id_foreign` FOREIGN KEY (`dosen_penguji_id`) REFERENCES `dosen_pengujis` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seminar_penelitian_nilai_seminar_penelitian_id_foreign` FOREIGN KEY (`seminar_penelitian_id`) REFERENCES `seminar_penelitians` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `seminar_proposals`
--
ALTER TABLE `seminar_proposals`
  ADD CONSTRAINT `seminar_proposals_tugas_akhir_id_foreign` FOREIGN KEY (`tugas_akhir_id`) REFERENCES `tugas_akhirs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `seminar_proposal_nilai`
--
ALTER TABLE `seminar_proposal_nilai`
  ADD CONSTRAINT `seminar_proposal_nilai_dosen_penguji_id_foreign` FOREIGN KEY (`dosen_penguji_id`) REFERENCES `dosen_pengujis` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seminar_proposal_nilai_seminar_proposal_id_foreign` FOREIGN KEY (`seminar_proposal_id`) REFERENCES `seminar_proposals` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sidang_akhirs`
--
ALTER TABLE `sidang_akhirs`
  ADD CONSTRAINT `sidang_akhirs_tugas_akhir_id_foreign` FOREIGN KEY (`tugas_akhir_id`) REFERENCES `tugas_akhirs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `sidang_akhir_nilai`
--
ALTER TABLE `sidang_akhir_nilai`
  ADD CONSTRAINT `sidang_akhir_nilai_dosen_penguji_id_foreign` FOREIGN KEY (`dosen_penguji_id`) REFERENCES `dosen_pengujis` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sidang_akhir_nilai_sidang_akhir_id_foreign` FOREIGN KEY (`sidang_akhir_id`) REFERENCES `sidang_akhirs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tugas_akhirs`
--
ALTER TABLE `tugas_akhirs`
  ADD CONSTRAINT `tugas_akhirs_dosen_pembimbing_id_foreign` FOREIGN KEY (`dosen_pembimbing_id`) REFERENCES `dosen_pembimbings` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_akhirs_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
