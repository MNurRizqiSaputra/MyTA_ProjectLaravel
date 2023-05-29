-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2023 at 06:07 AM
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
  `nip` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `jurusan_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `nip`, `foto`, `user_id`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(1, '9902717813', 'default.png', 2, 3, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(2, '9959578905', 'default.png', 50, 1, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(3, '9975720858', 'default.png', 15, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(4, '9955940054', 'default.png', 16, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(5, '9928349927', 'default.png', 40, 3, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(6, '9964985992', 'default.png', 12, 1, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(7, '9981510961', 'default.png', 30, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(8, '9973626729', 'default.png', 6, 3, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(9, '9967193792', 'default.png', 48, 3, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(10, '9932794390', 'default.png', 32, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(11, '9974650496', 'default.png', 23, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(12, '9950265131', 'default.png', 4, 1, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(13, '9935699026', 'default.png', 11, 1, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(14, '9996588682', 'default.png', 38, 3, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(15, '9922183331', 'default.png', 43, 3, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(16, NULL, NULL, 59, NULL, '2023-05-25 11:59:26', '2023-05-25 11:59:26'),
(17, NULL, NULL, 60, NULL, '2023-05-25 11:59:39', '2023-05-25 11:59:39');

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
(1, 7, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(2, 15, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(3, 6, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(4, 10, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(5, 8, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(6, 16, '2023-05-26 04:32:39', '2023-05-26 04:32:39'),
(7, 1, '2023-05-26 04:34:11', '2023-05-26 04:34:11'),
(9, 17, '2023-05-26 05:04:47', '2023-05-26 05:04:47');

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
(1, 13, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(2, 3, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(3, 14, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(4, 11, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(5, 1, '2023-05-25 11:16:40', '2023-05-25 11:16:40');

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
(1, 'Multimedia', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(2, 'Sistem Informasi', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(3, 'Teknik Informatika', '2023-05-25 11:16:40', '2023-05-25 11:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint UNSIGNED NOT NULL,
  `nim` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `jurusan_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `nim`, `foto`, `user_id`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(1, '1710302198', 'default.png', 37, 3, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(2, '1745173700', 'default.png', 25, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(3, '1782144727', 'default.png', 39, 3, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(4, '1725734246', 'default.png', 36, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(5, '1721573596', 'default.png', 17, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(6, '1715528813', 'default.png', 29, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(7, '1789996562', 'default.png', 7, 3, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(8, '1702848661', 'default.png', 31, 1, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(9, '1746158030', 'default.png', 18, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(10, '1779544329', 'default.png', 44, 1, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(11, '1728977367', 'default.png', 21, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(12, '1747600361', 'default.png', 27, 1, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(13, '1764626935', 'default.png', 3, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(14, '1739607929', 'default.png', 8, 1, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(15, '1717920576', 'default.png', 10, 1, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(16, '1747119958', 'default.png', 41, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(17, '1713668734', 'default.png', 13, 1, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(18, '1703597196', 'default.png', 33, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(19, '1755317378', 'default.png', 49, 1, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(20, '1771239425', 'default.png', 47, 2, '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(21, NULL, NULL, 58, NULL, '2023-05-25 11:55:18', '2023-05-25 11:55:18');

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
(18, '2023_05_17_190914_create_sidang_akhir_nilai_table', 1);

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
(1, 'App\\Models\\User', 51, 'authToken', '190d4143f63c2aaef37bfc7563157e94012ebbe645e0651b51c6f15a962b3b04', '[\"*\"]', NULL, NULL, '2023-05-25 11:27:19', '2023-05-25 11:27:19'),
(2, 'App\\Models\\User', 51, 'authToken', '5f37b59fde443cffddc6688ebc8a7aaa820a2fb4a4f2799f5b58eaa7747c6eed', '[\"*\"]', '2023-05-25 11:29:00', NULL, '2023-05-25 11:27:41', '2023-05-25 11:29:00');

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
(1, 'dosen', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(2, 'mahasiswa', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(3, 'admin', '2023-05-25 11:29:00', '2023-05-25 11:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_penelitians`
--

CREATE TABLE `seminar_penelitians` (
  `id` bigint UNSIGNED NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `nilai_akhir` int DEFAULT NULL,
  `tugas_akhir_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_penelitians`
--

INSERT INTO `seminar_penelitians` (`id`, `tempat`, `tanggal`, `waktu`, `nilai_akhir`, `tugas_akhir_id`, `created_at`, `updated_at`) VALUES
(1, 'Bukittinggi', '2021-02-14', '01:29:26', 69, 4, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(2, 'Palangka Raya', '1983-06-06', '08:53:37', 37, 1, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(3, 'Sungai Penuh', '1970-07-01', '18:00:21', 22, 5, '2023-05-25 11:16:41', '2023-05-25 11:16:41');

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
(1, 2, 3, 21, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(2, 1, 1, 25, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(3, 3, 5, 58, '2023-05-25 11:16:41', '2023-05-25 11:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_proposals`
--

CREATE TABLE `seminar_proposals` (
  `id` bigint UNSIGNED NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `nilai_akhir` int DEFAULT NULL,
  `tugas_akhir_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_proposals`
--

INSERT INTO `seminar_proposals` (`id`, `tempat`, `tanggal`, `waktu`, `nilai_akhir`, `tugas_akhir_id`, `created_at`, `updated_at`) VALUES
(1, 'Singkawang', '2017-03-17', '03:05:05', 54, 3, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(2, 'Tomohon', '1991-04-27', '01:15:07', 83, 6, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(3, 'Medan', '1998-01-16', '23:13:18', 63, 9, '2023-05-25 11:16:41', '2023-05-25 11:16:41');

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
(1, 3, 5, 25, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(2, 1, 2, 39, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(3, 1, 2, 3, '2023-05-25 11:16:41', '2023-05-25 11:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `sidang_akhirs`
--

CREATE TABLE `sidang_akhirs` (
  `id` bigint UNSIGNED NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `nilai_akhir` int DEFAULT NULL,
  `tugas_akhir_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidang_akhirs`
--

INSERT INTO `sidang_akhirs` (`id`, `tempat`, `tanggal`, `waktu`, `nilai_akhir`, `tugas_akhir_id`, `created_at`, `updated_at`) VALUES
(1, 'Bandar Lampung', '2023-03-10', '05:49:54', 84, 10, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(2, 'Bima', '1983-05-07', '13:09:05', 42, 3, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(3, 'Bandung', '1977-09-23', '02:15:41', 77, 6, '2023-05-25 11:16:41', '2023-05-25 11:16:41');

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
(1, 3, 4, 15, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(2, 2, 2, 77, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(3, 1, 5, 8, '2023-05-25 11:16:41', '2023-05-25 11:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_akhirs`
--

CREATE TABLE `tugas_akhirs` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_persetujuan` enum('Disetujui','Tidak Disetujui','Pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `total_nilai` int DEFAULT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `dosen_pembimbing_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas_akhirs`
--

INSERT INTO `tugas_akhirs` (`id`, `judul`, `file`, `status_persetujuan`, `total_nilai`, `mahasiswa_id`, `dosen_pembimbing_id`, `created_at`, `updated_at`) VALUES
(1, 'Odit non sit labore cumque.', 'Salman Marpaung.pdf', 'Tidak Disetujui', 70, 4, 1, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(2, 'Qui maxime et atque aspernatur.', 'Cawisono Budiyanto S.Gz.pdf', 'Disetujui', 89, 5, 1, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(3, 'Iste provident laudantium autem enim.', 'Ciaobella Haryanti S.Farm.pdf', 'Disetujui', 58, 2, 3, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(4, 'Odit possimus et aliquid sed laborum sit sint labore.', 'Cawisono Mansur.pdf', 'Tidak Disetujui', 87, 17, 1, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(5, 'Esse dicta sapiente suscipit similique laboriosam voluptatem qui.', 'Kamidin Nababan.pdf', 'Disetujui', 88, 9, 3, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(6, 'Pariatur et officia dolorem omnis et et pariatur.', 'Kenari Omar Jailani.pdf', 'Tidak Disetujui', 3, 20, 5, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(7, 'Rerum quam ratione nostrum ut blanditiis.', 'Amalia Usyi Susanti.pdf', 'Tidak Disetujui', 46, 16, 2, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(8, 'Corporis quam optio corporis ullam beatae corporis.', 'Maida Laras Sudiati.pdf', 'Tidak Disetujui', 22, 12, 5, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(9, 'Est amet autem quod soluta libero atque.', 'Dina Hartati.pdf', 'Disetujui', 35, 19, 3, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(10, 'Iste aspernatur accusantium ipsam dicta quo.', 'Paiman Saptono.pdf', 'Tidak Disetujui', 45, 18, 4, '2023-05-25 11:16:41', '2023-05-25 11:16:41'),
(26, 'tugas', 'public/tugas-akhir/21//1685249138_Rama Alfin Baehaqi.pdf', 'Pending', NULL, 21, 6, '2023-05-27 21:45:38', '2023-05-27 21:45:38');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Utama Hutagalung', 'mayasari.garan@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'HDNyI8dJqR', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(2, 'Viman Cager Maulana', 'ysamosir@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'xsLKjDuhTU', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(3, 'Vanya Fitria Aryani S.Pd', 'kasiran87@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'hCcz7oakvz', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(4, 'Paulin Lestari', 'onamaga@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'KjdjsZxEU2', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(5, 'Fitriani Intan Pertiwi S.I.Kom', 'ihalim@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'q8UOLSLmul', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(6, 'Dartono Siregar S.IP', 'uharyanti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'wsqotTn4jA', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(7, 'Aswani Nainggolan', 'karman32@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'nupxenCRed', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(8, 'Kiandra Anggraini M.Pd', 'yriyanti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'IzSXAmjPOS', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(9, 'Gamani Wijaya', 'nasim00@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'viGweTq2Zk', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(10, 'Eva Fitriani Wijayanti', 'haryanti.wardaya@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'Xh0p05CWsR', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(11, 'Kuncara Wijaya S.Psi', 'lili.wijayanti@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', '3Iz2PACpIE', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(12, 'Gatot Permadi', 'putra.anastasia@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'erStCSFKnT', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(13, 'Yance Vivi Uyainah M.Ak', 'amalia.nashiruddin@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'dlgjx4N1eP', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(14, 'Laksana Salahudin', 'halima.waluyo@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'hNEP8rQsZy', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(15, 'Paramita Indah Riyanti M.Pd', 'laila.mandala@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'hB4DpMCsIH', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(16, 'Panca Jailani', 'yharyanto@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'SkpM2tthXO', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(17, 'Jarwadi Situmorang S.H.', 'cakrabirawa.maryati@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'B5G0Zf1k1e', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(18, 'Unjani Nasyidah', 'vsaptono@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', '1M3LUudpnY', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(19, 'Widya Namaga M.Pd', 'rika27@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'F9kOLEbcY6', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(20, 'Dimas Cahyadi Narpati', 'maya14@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'q1Fh34buBH', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(21, 'Rahmi Kamila Hassanah S.Pd', 'nabila84@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'EDTHomWmtq', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(22, 'Kawaca Jinawi Siregar S.H.', 'hasim.budiyanto@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'W8vv66Ddvr', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(23, 'Ade Rosman Nashiruddin', 'zalindra88@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'NKJs0THi6M', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(24, 'Jamal Endra Prayoga S.Kom', 'zulkarnain.novi@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'wnS9GBd4gd', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(25, 'Belinda Melani S.Gz', 'yani26@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', '5P7o9YntjA', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(26, 'Gadang Mahendra', 'pradana.harjaya@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'bdJQjEPpz9', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(27, 'Mursita Rusman Marpaung S.I.Kom', 'mulyani.warji@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'BWwkCWzexQ', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(28, 'Novi Padmi Pratiwi', 'irawan.elma@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'bHTfdYDnjf', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(29, 'Daryani Simanjuntak', 'kuswandari.lutfan@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'AToesfO9fN', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(30, 'Lidya Rahimah', 'harimurti74@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', '56uyYyWKwU', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(31, 'Cahyono Surya Nugroho M.Farm', 'opan.winarsih@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'Iq8Y6c60La', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(32, 'Cakrabuana Widodo', 'dadi.adriansyah@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'ykMdjK0zqp', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(33, 'Lanjar Mustofa', 'amelia.utama@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', '6XlUaJ4kbC', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(34, 'Lega Balijan Prayoga S.E.', 'dewi.najmudin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'kC9dGyOmYk', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(35, 'Gandi Kuncara Nugroho', 'pzulaika@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'HMegFXAOY4', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(36, 'Najib Prasasta', 'tyulianti@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'rdumRHxAoI', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(37, 'Teguh Uwais', 'rangga.sudiati@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'AGyyHVLAYy', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(38, 'Belinda Agustina', 'galih28@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'dh20h6PjIh', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(39, 'Alambana Jatmiko Firgantoro M.Pd', 'zprastuti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'zPzSAEyWks', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(40, 'Indra Tarihoran', 'dsalahudin@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'XPzY4VDbHV', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(41, 'Agnes Laksita S.T.', 'zfarida@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', '8rSoDxrUg5', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(42, 'Jane Alika Haryanti', 'elma.habibi@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'cFYmcaTxeu', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(43, 'Upik Karman Rajasa S.Farm', 'widodo.hairyanto@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'T5sokmnXVr', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(44, 'Uchita Novitasari S.E.', 'permata.hardi@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'HL2WfkDrYr', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(45, 'Ami Padmasari', 'zelda01@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'K3TIKzPFDp', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(46, 'Luhung Santoso', 'nashiruddin.novi@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'sCeI3PHU0i', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(47, 'Adhiarja Saragih', 'nasyidah.queen@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'PvyIzKJQ7O', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(48, 'Samsul Hidayanto', 'firmansyah.laila@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'WTmo2lQwdD', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(49, 'Maida Yolanda', 'cahyono.riyanti@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, '2023-05-25 11:16:40', 'b1G1cQfFo6', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(50, 'Lanjar Latupono', 'amalia.siregar@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2023-05-25 11:16:40', 'cl7qlxsJZE', '2023-05-25 11:16:40', '2023-05-25 11:16:40'),
(51, 'admin', 'admin@gmail.com', '$2y$10$uAj4KoDxWJRUtF3ML.z/u.37amN5rBC80NW1Vp1XOyeQnxZq4Ee.y', 3, NULL, NULL, '2023-05-25 11:27:19', '2023-05-25 11:27:19'),
(58, 'rizki', 'rizki@gmail.com', '$2y$10$hZjC5189x/r1a5x1V1z8I.6GitXKUW0OCqf8.6I.nBk051uuiMT1.', 2, NULL, NULL, '2023-05-25 11:55:18', '2023-05-25 11:55:18'),
(59, 'Agus, S.Kom', 'agus@gmail.com', '$2y$10$v8PAO/rscD/ZH/KZELzONOGuKxDKXIS9pCDIxXU.WVPhXy8Mo8092', 1, NULL, NULL, '2023-05-25 11:59:26', '2023-05-25 11:59:26'),
(60, 'Budi, S.T', 'budi@gmail.com', '$2y$10$IyoCt2x7tVJfpoth6Oq79.VWzbvtLYWXTOwWZrYSiG0SLASDlza6a', 1, NULL, NULL, '2023-05-25 11:59:39', '2023-05-25 11:59:39');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dosen_pembimbings`
--
ALTER TABLE `dosen_pembimbings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dosen_pengujis`
--
ALTER TABLE `dosen_pengujis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seminar_penelitians`
--
ALTER TABLE `seminar_penelitians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seminar_penelitian_nilai`
--
ALTER TABLE `seminar_penelitian_nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seminar_proposals`
--
ALTER TABLE `seminar_proposals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seminar_proposal_nilai`
--
ALTER TABLE `seminar_proposal_nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sidang_akhirs`
--
ALTER TABLE `sidang_akhirs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sidang_akhir_nilai`
--
ALTER TABLE `sidang_akhir_nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas_akhirs`
--
ALTER TABLE `tugas_akhirs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
  ADD CONSTRAINT `dosen_pembimbings_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dosen_pengujis`
--
ALTER TABLE `dosen_pengujis`
  ADD CONSTRAINT `dosen_pengujis_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosens` (`id`) ON UPDATE CASCADE;

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
