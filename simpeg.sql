-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 21, 2024 at 09:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `nidn` varchar(20) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `jenjang` varchar(100) DEFAULT NULL,
  `gelar` varchar(100) DEFAULT NULL,
  `tahun_masuk` varchar(100) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nis`, `alamat`, `prodi`, `jenjang`, `gelar`, `tahun_masuk`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2342', '87237423', 'PASURUAN', 'Teknik Informatika', 'S1', 'S.Kom', '2020', 2, '2024-07-21 00:16:56', '2024-07-21 00:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_gaji`
--

CREATE TABLE `dosen_gaji` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dosen` varchar(255) NOT NULL,
  `id_matkul` varchar(255) NOT NULL,
  `matkul` varchar(255) NOT NULL,
  `jumlah_sks` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `gajis`
--

CREATE TABLE `gajis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_ngajar` varchar(255) NOT NULL,
  `minimal_mengajar` varchar(255) NOT NULL,
  `jumlah_minggu` varchar(255) NOT NULL,
  `honor_sks` varchar(255) NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_fungsional`
--

CREATE TABLE `jabatan_fungsional` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `kepangkatan` varchar(255) DEFAULT NULL,
  `golongan` varchar(255) DEFAULT NULL,
  `sertifikat` varchar(255) DEFAULT NULL,
  `tgl_sertifikasi` varchar(255) DEFAULT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan_fungsional`
--

INSERT INTO `jabatan_fungsional` (`id`, `jabatan`, `kepangkatan`, `golongan`, `sertifikat`, `tgl_sertifikasi`, `dosen_id`, `created_at`, `updated_at`) VALUES
(1, 'adw', 'awdawd', 'awdawd', 'setifikat/Pjk9ryU47AJR9YAmLaupnCr3f4e6R4cxdwlPrLvZ.pdf', '2024-07-21', 1, '2024-07-21 00:18:50', '2024-07-21 00:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertemuan` varchar(255) NOT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(255) DEFAULT NULL,
  `materi_dosen` text DEFAULT NULL,
  `materi_mhs` text DEFAULT NULL,
  `jml_mhs` int(11) DEFAULT NULL,
  `jml_mhs_masuk` int(11) DEFAULT NULL,
  `matkul_id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `pertemuan`, `kelas`, `tanggal`, `jam`, `materi_dosen`, `materi_mhs`, `jml_mhs`, `jml_mhs_masuk`, `matkul_id`, `dosen_id`, `mahasiswa_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'A', '2024-07-21', '14:24', 'awdawd', 'wadwdwa', 11, 11, 1, 1, 1, '2024-07-21 00:24:20', '2024-07-21 00:25:46'),
(2, '1', 'B', '2024-07-02', '14:24', 'awdawd', 'aaawdawd', 11, 11, 1, 1, 1, '2024-07-21 00:24:44', '2024-07-21 00:25:41'),
(3, '1', 'A', '2024-07-21', '14:31', 'awdawd', 'awdawd', 11, 11, 2, 1, 1, '2024-07-21 00:31:43', '2024-07-21 00:33:05'),
(4, '1', 'B', '2024-07-21', '14:31', 'awdadw', 'awdawdawd', 11, 11, 2, 1, 1, '2024-07-21 00:31:59', '2024-07-21 00:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `kode_jurusan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `nama_jurusan`, `kode_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Informatika', '991', '2024-07-21 00:22:02', '2024-07-21 00:22:02'),
(2, 'RPL', '992', '2024-07-21 00:22:09', '2024-07-21 00:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `tahun_angkatan` varchar(100) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `alamat`, `prodi`, `tahun_angkatan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2055201001030', 'Qomarus Zamani', 'PASURUAN', 'Teknik Informatika', '2020', 3, '2024-07-21 00:23:45', '2024-07-21 00:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `matkuls`
--

CREATE TABLE `matkuls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `sks` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matkuls`
--

INSERT INTO `matkuls` (`id`, `nama_matkul`, `sks`, `semester`, `jurusan_id`, `created_at`, `updated_at`) VALUES
(1, 'Pemrograman Dasar', '3', '1', 1, '2024-07-21 00:22:19', '2024-07-21 00:22:19'),
(2, 'Kalkulus', '2', '4', 1, '2024-07-21 00:22:28', '2024-07-21 00:22:28'),
(3, 'Matkul RPL 1', '1', '1', 2, '2024-07-21 00:22:46', '2024-07-21 00:22:46'),
(4, 'Matkul RPL 2', '3', '1', 2, '2024-07-21 00:22:59', '2024-07-21 00:22:59');

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
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penelitian_luaran`
--

CREATE TABLE `penelitian_luaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `penelitian` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `bukti_penelitian` varchar(255) DEFAULT NULL,
  `surat_tugas` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penelitian_luaran`
--

INSERT INTO `penelitian_luaran` (`id`, `dosen_id`, `penelitian`, `tanggal`, `bukti_penelitian`, `surat_tugas`, `created_at`, `updated_at`) VALUES
(1, 1, 'adwda', '2024-07-01', 'bukti_penelitian/n1itHOgQYRWN40ZCG07r4BMrx6XSBRZqZCjT0HNx.pdf', 'surat_tugas/eZ200q8GLOq4ZIZ65o6wdpbYntt63Wt4dTszvedS.pdf', '2024-07-21 00:19:43', '2024-07-21 00:19:43');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `tahun_awal` varchar(255) NOT NULL,
  `tahun_akhir` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rjabatans`
--

INSERT INTO `rjabatans` (`id`, `dosen_id`, `nama_jabatan`, `tahun_awal`, `tahun_akhir`, `created_at`, `updated_at`) VALUES
(1, 1, 'awdwd', '2020', '2020', '2024-07-21 00:20:15', '2024-07-21 00:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `rpendidikan`
--

CREATE TABLE `rpendidikan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `nama_institusi` varchar(255) NOT NULL,
  `jenjang` varchar(255) NOT NULL,
  `tahun_masuk` varchar(255) NOT NULL,
  `tahun_keluar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rpendidikan`
--

INSERT INTO `rpendidikan` (`id`, `dosen_id`, `nama_institusi`, `jenjang`, `tahun_masuk`, `tahun_keluar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Unmerpasuruanadwdawd', 'S1', '2020', '2020', '2024-07-21 00:20:36', '2024-07-21 00:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `rpenelitian`
--

CREATE TABLE `rpenelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dosen_id` bigint(20) UNSIGNED NOT NULL,
  `judul_penelitian` varchar(255) NOT NULL,
  `tahun_penelitian` varchar(255) NOT NULL,
  `bukti_penelitian` varchar(255) NOT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `sinta` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rpenelitian`
--

INSERT INTO `rpenelitian` (`id`, `dosen_id`, `judul_penelitian`, `tahun_penelitian`, `bukti_penelitian`, `penerbit`, `sinta`, `created_at`, `updated_at`) VALUES
(1, 1, 'Klasifikasi Kelulusan Mahasiswa', '2020', 'https://youtube.com/?hl=id', 'Gramedia', 'Sinta 3', '2024-07-21 00:17:50', '2024-07-21 00:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `variabel` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','dosen','mahasiswa') NOT NULL DEFAULT 'mahasiswa',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `email`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, 'admin@gmail.com', 'admin', 'active', NULL, '$2y$12$tODDAoUsf.tWouq9JCAvveNcFTG0e0Yw3fBLkYupYrRdeuWizgSOG', NULL, NULL, NULL),
(2, 'Dosen 1', 'dosen1', '088103610246', 'dosen1@gmail.com', 'dosen', 'active', NULL, '$2y$12$CHk5sojrIDFTJsKQNsslX.MQoMvqxZAX9ExDNke3BJqO6mfTdT3Di', NULL, '2024-07-21 00:16:56', '2024-07-21 00:16:56'),
(3, 'Qomarus Zamani', 'qomarus', '088103610246', 'qomaruszamani24@gmail.com', 'mahasiswa', 'active', NULL, '$2y$12$6omeOt5U9iQLP1qn3SSjDu8VowIiQcwq39nNGaFWEuyXWM2UW.KE2', NULL, '2024-07-21 00:23:45', '2024-07-21 00:23:45');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dosen_gaji`
--
ALTER TABLE `dosen_gaji`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gajis`
--
ALTER TABLE `gajis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan_fungsional`
--
ALTER TABLE `jabatan_fungsional`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matkuls`
--
ALTER TABLE `matkuls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penelitian_luaran`
--
ALTER TABLE `penelitian_luaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rjabatans`
--
ALTER TABLE `rjabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rpendidikan`
--
ALTER TABLE `rpendidikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rpenelitian`
--
ALTER TABLE `rpenelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sks`
--
ALTER TABLE `sks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
