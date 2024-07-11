-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2024 at 03:46 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` bigint UNSIGNED NOT NULL,
  `nidn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenjang` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_masuk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nis`, `alamat`, `prodi`, `jenjang`, `gelar`, `tahun_masuk`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2024-07-10 18:16:14', '2024-07-10 18:16:14'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2024-07-10 18:54:09', '2024-07-10 18:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_gaji`
--

CREATE TABLE `dosen_gaji` (
  `id` bigint UNSIGNED NOT NULL,
  `id_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_sks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `gajis`
--

CREATE TABLE `gajis` (
  `id` bigint UNSIGNED NOT NULL,
  `total_ngajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimal_mengajar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_minggu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `honor_sks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_fungsional`
--

CREATE TABLE `jabatan_fungsional` (
  `id` bigint UNSIGNED NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kepangkatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `golongan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sertifikat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_sertifikasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint UNSIGNED NOT NULL,
  `pertemuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materi_dosen` text COLLATE utf8mb4_unicode_ci,
  `materi_mhs` text COLLATE utf8mb4_unicode_ci,
  `jml_mhs` int DEFAULT NULL,
  `jml_mhs_masuk` int DEFAULT NULL,
  `honor` int DEFAULT NULL,
  `matkul_id` bigint UNSIGNED NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `mahasiswa_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `pertemuan`, `kelas`, `tanggal`, `jam`, `materi_dosen`, `materi_mhs`, `jml_mhs`, `jml_mhs_masuk`, `honor`, `matkul_id`, `dosen_id`, `mahasiswa_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'A1', '2024-07-11', '08:17', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2024-07-10 18:17:40', '2024-07-10 18:17:40'),
(2, '2', 'Aa12', '2024-07-09', '21:40', NULL, NULL, NULL, NULL, NULL, 2, 1, 1, '2024-07-10 18:40:34', '2024-07-10 18:40:34'),
(3, '1', 'wadaw', '2024-07-02', '08:56', 'awdawdawd', 'awdawdwad', 11, 11, 20000, 3, 1, 1, '2024-07-10 18:51:50', '2024-07-10 19:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `nama_jurusan`, `kode_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'TI', '991', '2024-07-10 18:13:44', '2024-07-10 18:13:44'),
(2, 'RPL', '992', '2024-07-10 18:13:53', '2024-07-10 18:13:53'),
(3, 'TEKNIK ELEKTRO', '993', '2024-07-10 18:14:09', '2024-07-10 18:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nim` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_angkatan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `alamat`, `prodi`, `tahun_angkatan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'mahasiswa1', NULL, NULL, NULL, 3, '2024-07-10 18:16:50', '2024-07-10 18:16:50'),
(2, NULL, 'mahasiswa2', NULL, NULL, NULL, 4, '2024-07-10 18:47:03', '2024-07-10 18:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `matkuls`
--

CREATE TABLE `matkuls` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matkuls`
--

INSERT INTO `matkuls` (`id`, `nama_matkul`, `sks`, `semester`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(1, 'Pemrograman Dasar', '3', '1', 1, '2024-07-10 18:14:39', '2024-07-10 18:14:39'),
(2, 'Pemrograman OOP', '2', '2', 1, '2024-07-10 18:15:00', '2024-07-10 18:15:00'),
(3, 'Matktul RPL 1', '2', '1', 2, '2024-07-10 18:15:18', '2024-07-10 18:15:18'),
(4, 'Matktul RPL 2', '3', '2', 2, '2024-07-10 18:15:30', '2024-07-10 18:15:30');

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
(1, '00_2014_10_12_000000_create_users_table', 1),
(2, '00_2024_01_10_140855_dosen', 1),
(3, '00_2024_05_09_141120_mahasiswa', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2024_01_10_153546_create_rjabatans_table', 1),
(8, '2024_01_13_170208_sks', 1),
(9, '2024_01_13_174340_create_matkuls_table', 1),
(10, '2024_01_13_175434_create_jurusans_table', 1),
(11, '2024_01_14_073157_create_jadwals_table', 1),
(12, '2024_01_14_100329_dosen_gaji', 1),
(13, '2024_01_18_050137_create_gajis_table', 1),
(14, '2024_06_16_161127_create_rpenelitian_table', 1),
(15, '2024_06_25_034910_create_rpendidikan_table', 1),
(16, '2024_07_01_022006_jabatan_fungsional', 1),
(17, '2024_07_05_063128_penelitian_luaran', 1),
(18, '2024_07_09_074238_setting', 1);

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
-- Table structure for table `penelitian_luaran`
--

CREATE TABLE `penelitian_luaran` (
  `id` bigint UNSIGNED NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `penelitian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `bukti_penelitian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_tugas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `rjabatans`
--

CREATE TABLE `rjabatans` (
  `id` bigint UNSIGNED NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_awal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_akhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rpendidikan`
--

CREATE TABLE `rpendidikan` (
  `id` bigint UNSIGNED NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `nama_institusi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_keluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rpenelitian`
--

CREATE TABLE `rpenelitian` (
  `id` bigint UNSIGNED NOT NULL,
  `dosen_id` bigint UNSIGNED NOT NULL,
  `judul_penelitian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_penelitian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_penelitian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sinta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint UNSIGNED NOT NULL,
  `variabel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `variabel`, `value`, `created_at`, `updated_at`) VALUES
(1, 'min_sks', 8, NULL, NULL),
(2, 'hargapersks', 10000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sks`
--

CREATE TABLE `sks` (
  `id` bigint UNSIGNED NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','dosen','mahasiswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mahasiswa',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `email`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, 'admin@gmail.com', 'admin', 'active', NULL, '$2y$12$e228FYYqX5CC8nYDPgnYF.sCU8QjZQOA3ThQPHUKpqBXTgawdvTmu', NULL, NULL, NULL),
(2, 'dosen1', 'dosen1', '2171782', 'dosen1@gmail.com', 'dosen', 'active', NULL, '$2y$12$kcHTcCjtF2V.FtKIc8uODe2fOxmOJYjOC/lH/6JsXcZvu6SwwfVXK', NULL, '2024-07-10 18:16:14', '2024-07-10 18:16:14'),
(3, 'mahasiswa1', 'mahasiswa1', '2131312', 'mahasiswa1@gmail.com', 'mahasiswa', 'active', NULL, '$2y$12$rUbI2ehmB3kEp/5EJxkijOgqAnfkZHkqhnk3eGaSX0UPVaaWVO1xy', NULL, '2024-07-10 18:16:50', '2024-07-10 18:16:50'),
(4, 'mahasiswa2', 'mahasiswa2', '78786', 'mahasiswa2@gmail.com', 'mahasiswa', 'active', NULL, '$2y$12$fgQyghe/uzvfvpyrh2ZnXeMAzDhCrX1Ht6ior4jJf../2u2zeBn7q', NULL, '2024-07-10 18:47:03', '2024-07-10 18:47:03'),
(5, 'dosen2', 'dosen2', '23123', 'dosen2@gmail.com', 'dosen', 'active', NULL, '$2y$12$vPTrNyqZNadYOem5.QKSb.DAX3OiHA9IRHQNLHkSGgvO6LubT/rdS', NULL, '2024-07-10 18:54:09', '2024-07-10 18:54:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_user_id_foreign` (`user_id`);

--
-- Indexes for table `dosen_gaji`
--
ALTER TABLE `dosen_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gajis`
--
ALTER TABLE `gajis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan_fungsional`
--
ALTER TABLE `jabatan_fungsional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jabatan_fungsional_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_matkul_id_foreign` (`matkul_id`),
  ADD KEY `jadwals_dosen_id_foreign` (`dosen_id`),
  ADD KEY `jadwals_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_user_id_foreign` (`user_id`);

--
-- Indexes for table `matkuls`
--
ALTER TABLE `matkuls`
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
-- Indexes for table `penelitian_luaran`
--
ALTER TABLE `penelitian_luaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penelitian_luaran_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rjabatans`
--
ALTER TABLE `rjabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rpendidikan`
--
ALTER TABLE `rpendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rpenelitian`
--
ALTER TABLE `rpenelitian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rpenelitian_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sks`
--
ALTER TABLE `sks`
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
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dosen_gaji`
--
ALTER TABLE `dosen_gaji`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gajis`
--
ALTER TABLE `gajis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan_fungsional`
--
ALTER TABLE `jabatan_fungsional`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matkuls`
--
ALTER TABLE `matkuls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penelitian_luaran`
--
ALTER TABLE `penelitian_luaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rjabatans`
--
ALTER TABLE `rjabatans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rpendidikan`
--
ALTER TABLE `rpendidikan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rpenelitian`
--
ALTER TABLE `rpenelitian`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sks`
--
ALTER TABLE `sks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jabatan_fungsional`
--
ALTER TABLE `jabatan_fungsional`
  ADD CONSTRAINT `jabatan_fungsional_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwals_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwals_matkul_id_foreign` FOREIGN KEY (`matkul_id`) REFERENCES `matkuls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penelitian_luaran`
--
ALTER TABLE `penelitian_luaran`
  ADD CONSTRAINT `penelitian_luaran_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`);

--
-- Constraints for table `rpenelitian`
--
ALTER TABLE `rpenelitian`
  ADD CONSTRAINT `rpenelitian_dosen_id_foreign` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
