-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2021 at 04:03 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`, `created_at`, `updated_at`) VALUES
(1, '11-RPL-1', '2021-06-15 03:57:39', '2021-06-15 03:57:39'),
(3, '11-RPL-2', '2021-06-17 09:53:52', '2021-06-17 09:53:52');

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
(46, '2014_10_12_000000_create_users_table', 1),
(47, '2014_10_12_100000_create_password_resets_table', 1),
(48, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(49, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(50, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(51, '2016_06_01_000004_create_oauth_clients_table', 1),
(52, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(53, '2019_08_19_000000_create_failed_jobs_table', 1),
(54, '2021_03_14_115815_create_students_table', 1),
(55, '2021_03_14_120555_create_presences_table', 1),
(56, '2021_05_22_172653_add_password_to_students_table', 1),
(57, '2021_06_02_154406_add_photo_to_students_table', 1),
(58, '2021_06_07_134951_create_class_table', 1),
(59, '2021_06_08_110011_create_posts_table', 1),
(60, '2021_06_13_115805_create_times_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('080be4f848e6cff0192b25a6947b513ffab5f8c43359e4ebdc8bc8d8c59d661f6280b9b1480507ed', 3320404, 1, 'Presensi', '[]', 1, '2021-06-17 09:18:50', '2021-06-17 09:18:50', '2022-06-17 16:18:50'),
('5243bab95dd36a368b2d05a10a007f93744d28f68b9cd9b14fe8eb1ddf250479adfc83d79fe3e5da', 3230144, 1, 'Presensi', '[]', 0, '2021-06-17 09:00:58', '2021-06-17 09:00:58', '2022-06-17 16:00:58'),
('750a0c1bdaa763da81169887db4e7eedb39734467dddceef9c02ff401010f97c853a5245d3bda1b7', 3230144, 1, 'Presensi', '[]', 0, '2021-06-17 05:20:14', '2021-06-17 05:20:14', '2022-06-17 12:20:14'),
('8ddefd4538edc11869a9c53b1b4ea015b9701c88cde2285ded28d5f926f0d624958ce1ec0f22f753', 3320404, 1, 'Presensi', '[]', 0, '2021-06-17 09:04:15', '2021-06-17 09:04:15', '2022-06-17 16:04:15'),
('908540c5a2c80c750fb92240f480d6282015b471bdc87f0bdfecdee3765eeeae443b5445b409cca7', 3230144, 1, 'Presensi', '[]', 1, '2021-06-17 05:17:40', '2021-06-17 05:17:40', '2022-06-17 12:17:40'),
('a26d8fb082f48ebbc424ddbed2008c628d2e83d416a7bfc35a983684b8f984a8b58c56614beacbb0', 3320404, 1, 'Presensi', '[]', 1, '2021-06-17 05:19:46', '2021-06-17 05:19:46', '2022-06-17 12:19:46'),
('b3c82e164d47999fe9ae1b5654462896d30bcb43efa4bb2932d0184905b72021c57297140f50bfb3', 3230144, 1, 'Presensi', '[]', 1, '2021-06-17 05:05:02', '2021-06-17 05:05:02', '2022-06-17 12:05:02'),
('ba4c87c17c19c726750232402b119e23200c6ac590a8843522bbcd1b1805bcedfd9f2bb3d41ea293', 3320404, 1, 'Presensi', '[]', 0, '2021-06-17 08:59:54', '2021-06-17 08:59:54', '2022-06-17 15:59:54'),
('c2e05edcfa56482ddf36d3d0aa12105d8638a32a6c819e41516d8385e8e8069448ab2ae113bb647f', 3320404, 1, 'Presensi', '[]', 0, '2021-06-17 10:03:18', '2021-06-17 10:03:18', '2022-06-17 17:03:18'),
('c3b3369eb67da3f95c1cb754e8250b9150dfc76d168bb880eceed44152bece7bb6b604651dedccf6', 3230144, 1, 'Presensi', '[]', 1, '2021-06-17 09:00:32', '2021-06-17 09:00:32', '2022-06-17 16:00:32'),
('d52285f7f375af79baa0e42e8a7857c63f60a5a2ab4f50518a1eb6198e1d2631898fbb8cbdf798dd', 3230144, 1, 'Presensi', '[]', 1, '2021-06-17 05:18:44', '2021-06-17 05:18:44', '2022-06-17 12:18:44'),
('e5756386c355c571181ee642c6f236e3cfd563f2b1e93071d1bdca1af500ddee823204f0d47b9fa0', 3320404, 1, 'Presensi', '[]', 0, '2021-06-17 06:28:34', '2021-06-17 06:28:34', '2022-06-17 13:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'yuNuRZ5nZd3If4er0Sg8VbB19F8IoXgLSjHU0l1b', NULL, 'http://localhost', 1, 0, 0, '2021-06-14 02:23:23', '2021-06-14 02:23:23'),
(2, NULL, 'Laravel Password Grant Client', 'KGxjBhnWE8PRP3YWBd0nsRhwBiLM6w9GlNLJ9ffr', 'users', 'http://localhost', 0, 1, 0, '2021-06-14 02:23:23', '2021-06-14 02:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-06-14 02:23:23', '2021-06-14 02:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `thumbnail`, `author`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Lokasi Wifi Gratis untuk Peserta Didik SMK Negeri 1 Subang', '<p style=\"color: rgb(119, 119, 119); font-family: &quot;DM Sans&quot;, sans-serif; font-size: 16px;\">Pandemi Covid-19 masih belum menunjukan penurunan, termasuk di Jawa Barat khususnya di Kabupaten Subang. Alasan itulah yang membuat pemerintah masih melarang adanya kegiatan tatap muka di lingkungan sekolah. Pembelajaran dilakukan dengan cara daring (dalam jaringan) mulai dari pemberian bahan ajar sampai tugas yang harus dikerjakan sebagai salah satu syarat aktivitas peserta didik di rumah.&nbsp;&nbsp; Pemindahan kegiatan belajar dari&nbsp; sekolah ke rumah ini adalah sebagai upaya untuk menjaga jarak sosial, mau tidak mau harus dilaksanakan. Dengan segala keterbatasan yang ada, mulai dari jaringan data yang tidak dimiliki peserta didik dan terbatasnya kemampuan orang tua membuat banyaknya peserta didik yang terhambat dalam melaksanakan tugasnya.</p><p style=\"color: rgb(119, 119, 119); font-family: &quot;DM Sans&quot;, sans-serif; font-size: 16px;\">&nbsp;Dari persoalan yang sulit terurai tersebut, SMK Negeri 1 Subang meluncurkan program ”WIFI GRATIS UNTUK PESERTA DIDIK” Program tersebut merupakan salah satu dari program ”CEREN’ yang di usung Bapak Deden Suryanto, M.Pd. selaku kepala SMK Negeri 1 Subang. Program wifi gratis ini dilaksanakan untuk membantu peserta didik yang kesulitan dan terkendala jaringan internet. Seluruh peserta didik yang tedaftar di SMK Negeri 1 Subang memilik hak akses untuk jaringan tersebut.&nbsp; Saat ini sudah terpasang puluhan titik Wifi di seluruh wilayah di kabupaten Subang mulai dari wilayah Utara, tengah sampai wilayah selatan sesuai dengan pemetaan zonasi peserta didik. Selain untuk&nbsp; membuka aplikasi BDR (Belajar dari Rumah), Video pembelajaran, mencari materi tugas, Wifi ini juga digunakan peserta didik untuk melaksanakan PTS (Penilaian Tengah Semester)</p>', 'assets/photo/dVE1jZzlo54lTyj1B9yBzwHQCcxgb6QIUSdSwLAH.jpg', 'Iin Solihin, S.Pd.', 'lokasi-wifi-gratis-untuk-peserta-didik-smk-negeri-1-subang', '2021-06-13 12:27:21', '2021-06-17 13:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `presences`
--

CREATE TABLE `presences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rfid_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time DEFAULT NULL,
  `kehadiran` enum('Tepat Waktu','Terlambat','Pulang Duluan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` enum('Masuk','Pulang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presences`
--

INSERT INTO `presences` (`id`, `rfid_id`, `tanggal`, `jam`, `kehadiran`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '0003320404', '2021-06-17', '16:55:01', 'Tepat Waktu', 'Pulang', '2021-06-17 09:55:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rfid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'assets/photo/avatar.png',
  `gender` tinyint(1) NOT NULL,
  `id_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parents_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nis`, `nisn`, `rfid`, `password`, `name`, `photo`, `gender`, `id_class`, `address`, `parents_phone`, `created_at`, `updated_at`) VALUES
(1, '11901616', '1312232', '0003320404', '$2b$10$0QtalW0mQRwJwNv1o.zPteViouSMV.VcvdHOvHnDjSrGKugW.M9n2', 'Thalal Atha Nabil', 'assets/photo/G5i9s2IQIOw6Tt0htlfZ8G8d2WAWgib1mTW07N9Q.jpg', 0, '3', 'BTN Griya Pesona Praja, No.4-5, E11, 019/006, Cinangsi, Cibogo, Subang, Jawa Barat', '08821337879', '2021-06-17 03:09:32', '2021-06-17 09:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `jam_masuk`, `jam_pulang`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', '15:00:00', NULL, '2021-06-15 02:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'madfariz', 'admin@gmail.com', NULL, '$2b$10$0QtalW0mQRwJwNv1o.zPteViouSMV.VcvdHOvHnDjSrGKugW.M9n2', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `presences`
--
ALTER TABLE `presences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_nis_unique` (`nis`),
  ADD UNIQUE KEY `students_nisn_unique` (`nisn`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `presences`
--
ALTER TABLE `presences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
