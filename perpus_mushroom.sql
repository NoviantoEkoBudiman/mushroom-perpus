-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 12:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_mushroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `penerbit` varchar(25) NOT NULL,
  `penulis` varchar(25) NOT NULL,
  `bookshelf_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0 = dipinjam, 1 = tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `description`, `penerbit`, `penulis`, `bookshelf_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'egrvb', 'ergtvtrv', 'arev', 'eve', 2, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookshelf`
--

CREATE TABLE `bookshelf` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_rak` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookshelf`
--

INSERT INTO `bookshelf` (`id`, `nama_rak`, `created_at`, `updated_at`) VALUES
(1, 'sfverfceedf', NULL, NULL),
(2, 'aiueo', NULL, '2023-02-22 03:16:39'),
(4, 'cihuahua', '2023-02-22 04:32:10', '2023-02-22 04:32:10');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_book`
--

CREATE TABLE `borrowed_book` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `murid_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status_pinjam` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = belum dikembalikan, 1 sudah dikembalikan',
  `jumlah_denda` int(11) DEFAULT NULL COMMENT 'Diisi jika telat mengembalikan dalam waktu seminggu, dengan besaran Rp. 200 perhari',
  `status_denda` enum('0','1') DEFAULT NULL COMMENT '0 = belum lunas, 1 sudah lunas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrowed_book`
--

INSERT INTO `borrowed_book` (`id`, `book_id`, `murid_id`, `staff_id`, `tanggal_pinjam`, `tanggal_kembali`, `status_pinjam`, `jumlah_denda`, `status_denda`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2, '2023-02-01', '2023-02-22', '1', 4200, '1', '2023-02-22 09:03:01', '2023-02-22 10:23:43'),
(2, 2, 1, 2, '2023-02-12', NULL, '0', 1, '1', '2023-02-22 09:27:21', '2023-02-22 09:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_22_080411_create_book_table', 2),
(6, '2023_02_22_080944_create_bookshelf_table', 3),
(7, '2023_02_22_080945_create_bookshelf_table', 4),
(8, '2023_02_22_080946_create_bookshelf_table', 5),
(9, '2023_02_22_080947_create_bookshelf_table', 6),
(10, '2023_02_22_080412_create_book_table', 7),
(11, '2023_02_22_080413_create_book_table', 8),
(12, '2023_02_22_133235_create_borrowed_book_table', 9),
(13, '2023_02_22_133236_create_borrowed_book_table', 10),
(14, '2023_02_22_133237_create_borrowed_book_table', 11),
(15, '2023_02_22_133238_create_borrowed_book_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `expires_at`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '30ebe1ae235706023cec5134856b9bf95ac7cebb070f5159afe085624785a6c7', '[\"*\"]', NULL, NULL, '2023-02-22 00:15:57', '2023-02-22 00:15:57'),
(2, 'App\\Models\\User', 3, 'auth_token', 'f6343eb9f4be6550d687a491e462aeb79b1cc69c41e2a103b24bb0c3013609a4', '[\"*\"]', NULL, NULL, '2023-02-22 00:17:27', '2023-02-22 00:17:27'),
(3, 'App\\Models\\User', 3, 'auth_token', 'df079ae7512d3d5fabe9484a6c2fc7caa88050b899d0bf39e82e858fa472a045', '[\"*\"]', NULL, NULL, '2023-02-22 10:49:19', '2023-02-22 10:49:19'),
(4, 'App\\Models\\User', 3, 'auth_token', 'd9799bc157daa45a2c08ab168701361e336f47af78b8d3baed3a32736d18635e', '[\"*\"]', NULL, NULL, '2023-02-22 10:49:38', '2023-02-22 10:49:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('0','1') NOT NULL COMMENT '0 = staff, 1 = murid',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bbb', 'bbb@mail.com', NULL, '$2y$10$5KDqXXs3fMspDjHdsBdkcOWEgW7vO4x7lhyzvIOe9RPxG.uF4k80K', '1', NULL, '2023-02-22 00:15:57', '2023-02-22 00:15:57'),
(3, '111', 'abc@mail.com', NULL, '$2y$10$li37Vb4A7EmPuzfpYx4ueeB4fw.PsW1wE0k9kYYAI6TWgTqrktPFm', '0', NULL, '2023-02-22 00:17:27', '2023-02-22 00:17:27'),
(4, 'aiueo', 'aiueo@aiueo.com', NULL, '$2y$10$5KDqXXs3fMspDjHdsBdkcOWEgW7vO4x7lhyzvIOe9RPxG.uF4k80K', '0', NULL, '2023-02-22 00:17:27', '2023-02-22 00:54:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_bookshelf_id_foreign` (`bookshelf_id`);

--
-- Indexes for table `bookshelf`
--
ALTER TABLE `bookshelf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowed_book`
--
ALTER TABLE `borrowed_book`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookshelf`
--
ALTER TABLE `bookshelf`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `borrowed_book`
--
ALTER TABLE `borrowed_book`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_bookshelf_id_foreign` FOREIGN KEY (`bookshelf_id`) REFERENCES `bookshelf` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
