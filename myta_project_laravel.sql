-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 07:16 PM
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
-- Database: `myta_project_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` char(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `nip`, `nohp`, `foto`, `user_id`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(1, '9902717813', NULL, 'default.png', 2, 3, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(2, '9959578905', NULL, 'default.png', 50, 1, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(3, '9975720858', NULL, 'default.png', 15, 2, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(4, '9955940054', NULL, 'default.png', 16, 2, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(5, '9928349927', NULL, 'default.png', 40, 3, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(6, '9964985992', NULL, 'default.png', 12, 1, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(7, '9981510961', NULL, 'default.png', 30, 2, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(8, '9973626729', NULL, 'default.png', 6, 3, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(9, '9967193792', NULL, 'default.png', 48, 3, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(10, '9932794390', NULL, 'default.png', 32, 2, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(11, '9974650496', NULL, 'default.png', 23, 2, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(12, '9950265131', NULL, 'default.png', 4, 1, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(13, '9935699026', NULL, 'default.png', 11, 1, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(14, '9996588682', NULL, 'default.png', 38, 3, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(15, '9922183331', NULL, 'default.png', 43, 3, '2023-06-09 03:46:47', '2023-06-09 03:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_pembimbings`
--

CREATE TABLE `dosen_pembimbings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen_pembimbings`
--

INSERT INTO `dosen_pembimbings` (`id`, `dosen_id`, `created_at`, `updated_at`) VALUES
(1, 7, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(2, 15, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(3, 6, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(4, 10, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(5, 8, '2023-06-09 03:46:48', '2023-06-09 03:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_pengujis`
--

CREATE TABLE `dosen_pengujis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen_pengujis`
--

INSERT INTO `dosen_pengujis` (`id`, `dosen_id`, `created_at`, `updated_at`) VALUES
(1, 13, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(2, 3, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(3, 14, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(4, 11, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(5, 1, '2023-06-09 03:46:48', '2023-06-09 03:46:48');

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
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Multimedia', '2023-06-09 03:46:46', '2023-06-09 03:46:46'),
(2, 'Sistem Informasi', '2023-06-09 03:46:46', '2023-06-09 03:46:46'),
(3, 'Teknik Informatika', '2023-06-09 03:46:46', '2023-06-09 03:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` char(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `nim`, `nohp`, `foto`, `user_id`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(1, '1710302198', NULL, 'default.png', 37, 3, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(2, '1745173700', NULL, 'default.png', 25, 2, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(3, '1782144727', NULL, 'default.png', 39, 3, '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(4, '1725734246', NULL, 'default.png', 36, 2, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(5, '1721573596', NULL, 'default.png', 17, 2, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(6, '1715528813', NULL, 'default.png', 29, 2, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(7, '1789996562', NULL, 'default.png', 7, 3, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(8, '1702848661', NULL, 'default.png', 31, 1, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(9, '1746158030', NULL, 'default.png', 18, 2, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(10, '1779544329', NULL, 'default.png', 44, 1, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(11, '1728977367', NULL, 'default.png', 21, 2, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(12, '1747600361', NULL, 'default.png', 27, 1, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(13, '1764626935', NULL, 'default.png', 3, 2, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(14, '1739607929', NULL, 'default.png', 8, 1, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(15, '1717920576', NULL, 'default.png', 10, 1, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(16, '1747119958', NULL, 'default.png', 41, 2, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(17, '1713668734', NULL, 'default.png', 13, 1, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(18, '1703597196', NULL, 'default.png', 33, 2, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(19, '1755317378', NULL, 'default.png', 49, 1, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(20, '1771239425', NULL, 'default.png', 47, 2, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(21, '2010651141', '085749737999', 'public/fotos/mahasiswa//1686308340_skull-stars-hd-4k-images-space.jpg', 52, 3, '2023-06-09 03:57:13', '2023-06-09 03:59:00'),
(22, NULL, NULL, NULL, 53, NULL, '2023-06-09 04:35:15', '2023-06-09 04:35:15');

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
(21, '2023_06_02_122903_update_column_nullable_in_sidang_akhirs_table', 1);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'dosen', '2023-06-09 03:46:46', '2023-06-09 03:46:46'),
(2, 'mahasiswa', '2023-06-09 03:46:46', '2023-06-09 03:46:46'),
(3, 'admin', '2023-06-09 10:54:03', '2023-06-09 10:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_penelitians`
--

CREATE TABLE `seminar_penelitians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `nilai_akhir` int(11) DEFAULT NULL,
  `tugas_akhir_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_penelitians`
--

INSERT INTO `seminar_penelitians` (`id`, `tempat`, `tanggal`, `waktu`, `nilai_akhir`, `tugas_akhir_id`, `created_at`, `updated_at`) VALUES
(1, 'Bukittinggi', '2021-02-28', '18:54:22', 69, 4, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(2, 'Palangka Raya', '1983-06-09', '05:40:02', 37, 1, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(3, 'Sungai Penuh', '1970-07-01', '18:21:09', 22, 5, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(4, NULL, NULL, NULL, NULL, 12, '2023-06-09 05:05:31', '2023-06-09 05:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_penelitian_nilai`
--

CREATE TABLE `seminar_penelitian_nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seminar_penelitian_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_penguji_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_penelitian_nilai`
--

INSERT INTO `seminar_penelitian_nilai` (`id`, `seminar_penelitian_id`, `dosen_penguji_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 21, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(2, 1, 1, 25, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(3, 3, 5, 58, '2023-06-09 03:46:48', '2023-06-09 03:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_proposals`
--

CREATE TABLE `seminar_proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `nilai_akhir` int(11) DEFAULT NULL,
  `tugas_akhir_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_proposals`
--

INSERT INTO `seminar_proposals` (`id`, `tempat`, `tanggal`, `waktu`, `nilai_akhir`, `tugas_akhir_id`, `created_at`, `updated_at`) VALUES
(1, 'Singkawang', '2017-03-30', '11:18:26', 54, 3, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(2, 'Tomohon', '1991-05-02', '01:48:58', 83, 6, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(3, 'Medan', '1998-01-24', '09:37:01', 63, 9, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(4, NULL, NULL, NULL, NULL, 11, '2023-06-09 04:04:47', '2023-06-09 04:04:47'),
(5, 'Gedung A', '2023-05-09', '10:00:00', 65, 12, '2023-06-09 04:39:11', '2023-06-09 04:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_proposal_nilai`
--

CREATE TABLE `seminar_proposal_nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seminar_proposal_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_penguji_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminar_proposal_nilai`
--

INSERT INTO `seminar_proposal_nilai` (`id`, `seminar_proposal_id`, `dosen_penguji_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 25, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(2, 1, 2, 39, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(3, 1, 2, 3, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(4, 5, 1, 50, '2023-06-09 04:41:46', '2023-06-09 04:59:08'),
(5, 5, 2, 80, '2023-06-09 04:41:46', '2023-06-09 04:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `sidang_akhirs`
--

CREATE TABLE `sidang_akhirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `nilai_akhir` int(11) DEFAULT NULL,
  `tugas_akhir_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidang_akhirs`
--

INSERT INTO `sidang_akhirs` (`id`, `tempat`, `tanggal`, `waktu`, `nilai_akhir`, `tugas_akhir_id`, `created_at`, `updated_at`) VALUES
(1, 'Bandar Lampung', '2023-03-24', '18:59:54', 84, 10, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(2, 'Bima', '1983-05-10', '05:27:39', 42, 3, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(3, 'Bandung', '1977-09-25', '13:56:37', 77, 6, '2023-06-09 03:46:48', '2023-06-09 03:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `sidang_akhir_nilai`
--

CREATE TABLE `sidang_akhir_nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_akhir_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_penguji_id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidang_akhir_nilai`
--

INSERT INTO `sidang_akhir_nilai` (`id`, `sidang_akhir_id`, `dosen_penguji_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 15, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(2, 2, 2, 77, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(3, 1, 5, 8, '2023-06-09 03:46:48', '2023-06-09 03:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_akhirs`
--

CREATE TABLE `tugas_akhirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` blob NOT NULL,
  `status_persetujuan` enum('Disetujui','Tidak Disetujui','Pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `total_nilai` int(11) DEFAULT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_pembimbing_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas_akhirs`
--

INSERT INTO `tugas_akhirs` (`id`, `judul`, `file`, `status_persetujuan`, `total_nilai`, `mahasiswa_id`, `dosen_pembimbing_id`, `created_at`, `updated_at`) VALUES
(1, 'Odit non sit labore cumque.', 0x53616c6d616e204d61727061756e672e706466, 'Tidak Disetujui', 70, 4, 1, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(2, 'Qui maxime et atque aspernatur.', 0x43617769736f6e6f204275646979616e746f20532e477a2e706466, 'Disetujui', 89, 5, 1, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(3, 'Iste provident laudantium autem enim.', 0x4369616f62656c6c612048617279616e746920532e4661726d2e706466, 'Disetujui', 58, 2, 3, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(4, 'Odit possimus et aliquid sed laborum sit sint labore.', 0x43617769736f6e6f204d616e7375722e706466, 'Tidak Disetujui', 87, 17, 1, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(5, 'Esse dicta sapiente suscipit similique laboriosam voluptatem qui.', 0x4b616d6964696e204e61626162616e2e706466, 'Disetujui', 88, 9, 3, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(6, 'Pariatur et officia dolorem omnis et et pariatur.', 0x4b656e617269204f6d6172204a61696c616e692e706466, 'Tidak Disetujui', 3, 20, 5, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(7, 'Rerum quam ratione nostrum ut blanditiis.', 0x416d616c6961205573796920537573616e74692e706466, 'Tidak Disetujui', 46, 16, 2, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(8, 'Corporis quam optio corporis ullam beatae corporis.', 0x4d61696461204c6172617320537564696174692e706466, 'Tidak Disetujui', 22, 12, 5, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(9, 'Est amet autem quod soluta libero atque.', 0x44696e6120486172746174692e706466, 'Disetujui', 35, 19, 3, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(10, 'Iste aspernatur accusantium ipsam dicta quo.', 0x5061696d616e20536170746f6e6f2e706466, 'Tidak Disetujui', 45, 18, 4, '2023-06-09 03:46:48', '2023-06-09 03:46:48'),
(11, 'Lorem ipsum dolor sit amet.', 0x7075626c69632f74756761732d616b6869722f32312f313638363330383431385f3661303863343534353363333232373065656364303131396465306233373839393533632e706466, 'Disetujui', NULL, 21, 3, '2023-06-09 04:00:18', '2023-06-09 04:01:52'),
(12, 'Lorem ipsum, dolor sit amet consectetur adipisicing.', 0x7075626c69632f74756761732d616b6869722f32322f313638363331323435375f3661303863343534353363333232373065656364303131396465306233373839393533632e706466, 'Disetujui', NULL, 22, 2, '2023-06-09 04:36:18', '2023-06-09 05:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `tanggal_lahir`, `role_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Utama Hutagalung', 'mayasari.garan@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', 'jO4Qku0DsDtSO12IAca3P8SHFP6Vb2mRHndxfUDuWsOGliVWmiWAFuw0zNVY', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(2, 'Viman Cager Maulana', 'ysamosir@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', 'kHBKW6jRfW2Oml5HvqWI1jlt2st8luW5e3jjy79UtRrqRIexUmBbt5ifGZyH', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(3, 'Vanya Fitria Aryani S.Pd', 'kasiran87@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:46', 'RrKXYVcLbG', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(4, 'Paulin Lestari', 'onamaga@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', 'lWdmI630Cm', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(5, 'Fitriani Intan Pertiwi S.I.Kom', 'ihalim@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', 'HgCowAv1KO', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(6, 'Dartono Siregar S.IP', 'uharyanti@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', 'FAwhVacptF', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(7, 'Aswani Nainggolan', 'karman32@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:46', 'SVjrQkoX56', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(8, 'Kiandra Anggraini M.Pd', 'yriyanti@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:46', '8Q76ZVRPW4', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(9, 'Gamani Wijaya', 'nasim00@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', 'ZZJG1LXrWR', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(10, 'Eva Fitriani Wijayanti', 'haryanti.wardaya@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:46', 'xGW8xKywye', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(11, 'Kuncara Wijaya S.Psi', 'lili.wijayanti@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', 'rV2YnS7om8JTMAWvr3au2Yn03CDcVb1PhoMPPi9GHseyNyqSqavht6T6zXWR', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(12, 'Gatot Permadi', 'putra.anastasia@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', 'NGoZxSkjPQAZuXg2Yg0SdukT3K3mGhXOHD57XrBncTzSXsaWnMSt3EVTPhBe', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(13, 'Yance Vivi Uyainah M.Ak', 'amalia.nashiruddin@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:46', 'aoSL2h8ffx', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(14, 'Laksana Salahudin', 'halima.waluyo@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', 'Is0hYgUi8O', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(15, 'Paramita Indah Riyanti M.Pd', 'laila.mandala@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', '1N7afdry1UMoq8anU2ngDxFkjT8Dww5d9GmVN2zVvB6MmqTNwczRh4jcdpBn', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(16, 'Panca Jailani', 'yharyanto@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', 'TEHWOw3r4V', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(17, 'Jarwadi Situmorang S.H.', 'cakrabirawa.maryati@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:46', 'p1FLKhcZkB', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(18, 'Unjani Nasyidah', 'vsaptono@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:46', 'SqrYKD8Pwf', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(19, 'Widya Namaga M.Pd', 'rika27@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', 'z6AuHvm7ub', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(20, 'Dimas Cahyadi Narpati', 'maya14@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:46', 'n3JJoW7x4d', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(21, 'Rahmi Kamila Hassanah S.Pd', 'nabila84@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:46', 's1mp8zIyeJ', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(22, 'Kawaca Jinawi Siregar S.H.', 'hasim.budiyanto@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', 'H3ojb0rbdu', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(23, 'Ade Rosman Nashiruddin', 'zalindra88@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', '2KkVsZH9Xp', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(24, 'Jamal Endra Prayoga S.Kom', 'zulkarnain.novi@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', 'XfUuGH8bfl', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(25, 'Belinda Melani S.Gz', 'yani26@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:47', '5uw8wDmbjN', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(26, 'Gadang Mahendra', 'pradana.harjaya@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', '23tplzfv7H', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(27, 'Mursita Rusman Marpaung S.I.Kom', 'mulyani.warji@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:47', 'lmoNAJSyWO', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(28, 'Novi Padmi Pratiwi', 'irawan.elma@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', 'GNDTR9t5Ua', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(29, 'Daryani Simanjuntak', 'kuswandari.lutfan@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:47', 'aFyunAI7Kl', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(30, 'Lidya Rahimah', 'harimurti74@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', '9VIyGIw19o', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(31, 'Cahyono Surya Nugroho M.Farm', 'opan.winarsih@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:47', 'OmTh1mORWU', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(32, 'Cakrabuana Widodo', 'dadi.adriansyah@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', 'QLcohBNUaV', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(33, 'Lanjar Mustofa', 'amelia.utama@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:47', 'Ul5MLeFpKr', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(34, 'Lega Balijan Prayoga S.E.', 'dewi.najmudin@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', 'zS4WJeabR0', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(35, 'Gandi Kuncara Nugroho', 'pzulaika@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', 'n5Eiic6IDh', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(36, 'Najib Prasasta', 'tyulianti@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:47', 'sDK9eVGwWE', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(37, 'Teguh Uwais', 'rangga.sudiati@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:47', 'TQhaXdgJdA', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(38, 'Belinda Agustina', 'galih28@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', '8mNYyMDVMF', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(39, 'Alambana Jatmiko Firgantoro M.Pd', 'zprastuti@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:47', '0bIVjc1PQF', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(40, 'Indra Tarihoran', 'dsalahudin@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', '1tEGDYSZZ3', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(41, 'Agnes Laksita S.T.', 'zfarida@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:47', 'ykR2gR7IKQ', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(42, 'Jane Alika Haryanti', 'elma.habibi@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', 'XK8cOYOjjv', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(43, 'Upik Karman Rajasa S.Farm', 'widodo.hairyanto@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', 'XEeqBSsUMP8ZUmfEQVu4Pl3z8aZrG4UW147pB5FFJBJq9o6LM2kGArH0AYQq', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(44, 'Uchita Novitasari S.E.', 'permata.hardi@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:47', 'izlBJ7xH44', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(45, 'Ami Padmasari', 'zelda01@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', 'W6ccke8FSU', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(46, 'Luhung Santoso', 'nashiruddin.novi@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', 'j65NrQqzkH', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(47, 'Adhiarja Saragih', 'nasyidah.queen@example.net', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:47', 'lzqFcDiDmk', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(48, 'Samsul Hidayanto', 'firmansyah.laila@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', '41iN1vudGq', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(49, 'Maida Yolanda', 'cahyono.riyanti@example.org', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 2, '2023-06-09 03:46:47', 'FUAFzRV16H', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(50, 'Lanjar Latupono', 'amalia.siregar@example.com', '$2y$10$ELkUYZlfIkmI2MN5jPVUeO/82PfFGvO3qBFqfjIQ023WkbycRRONO', '2001-12-12', 1, '2023-06-09 03:46:47', 'cg3xnIi4J1', '2023-06-09 03:46:47', '2023-06-09 03:46:47'),
(51, 'admin', 'admin@gmail.com', '$2y$10$uAj4KoDxWJRUtF3ML.z/u.37amN5rBC80NW1Vp1XOyeQnxZq4Ee.y', NULL, 3, NULL, NULL, '2023-06-09 10:54:26', '2023-06-09 10:54:26'),
(52, 'Rizqy Arniza', 'rizqy@gmail.com', '$2y$10$DfLwMfQqPYsTzN5I6X3FqOJ3aRXAHqaR2W58vH7QnpO3eWkhKrlGy', '2000-12-21', 2, NULL, NULL, '2023-06-09 03:57:13', '2023-06-09 03:57:13'),
(53, 'Putri', 'putri@gmail.com', '$2y$10$f920ADiRW9gXuS9HRxVCjuzUjqyBtPYLZ9FAz2SRZyxz7o4ktZjKm', '2001-12-12', 2, NULL, NULL, '2023-06-09 04:35:15', '2023-06-09 04:35:15');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dosen_pembimbings`
--
ALTER TABLE `dosen_pembimbings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dosen_pengujis`
--
ALTER TABLE `dosen_pengujis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seminar_penelitians`
--
ALTER TABLE `seminar_penelitians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seminar_penelitian_nilai`
--
ALTER TABLE `seminar_penelitian_nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seminar_proposals`
--
ALTER TABLE `seminar_proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seminar_proposal_nilai`
--
ALTER TABLE `seminar_proposal_nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sidang_akhirs`
--
ALTER TABLE `sidang_akhirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sidang_akhir_nilai`
--
ALTER TABLE `sidang_akhir_nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas_akhirs`
--
ALTER TABLE `tugas_akhirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
