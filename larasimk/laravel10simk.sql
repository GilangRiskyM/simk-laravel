-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 03:51 AM
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
-- Database: `laravel10simk`
--

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
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_bbm` bigint(20) UNSIGNED NOT NULL,
  `nopol` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id`, `id_bbm`, `nopol`, `jenis_kendaraan`, `nama_pegawai`, `nip`, `jabatan`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 2, 'AA 126 D', 'Roda 4 (empat)', 'Drs. H. BAMBANG WIDADI', '19650528 199203 1 007', 'CAMAT', '10', '2023-11-28 08:35:20', '2023-11-29 05:13:28'),
(2, 1, 'AA 6037 XD', 'Roda 2 (dua)', 'SUPARYO, S. Sos', '19651124 198812 1 001', 'SEKRETARIS CAMAT', '10', '2023-11-28 08:35:46', '2023-11-29 04:15:13'),
(4, 1, 'AA 9883 SD', 'Roda 2 (dua)', 'NUR FATIMAH, S.IP', '19750210 200701 2 028', 'Kasubag Umum dan Kepegawaian', '5', '2023-11-30 01:18:37', '2023-12-01 01:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nopol` varchar(255) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nopol`, `merek`, `jenis_kendaraan`, `nama_pegawai`, `nip`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'AA 126 D', 'TOYOTA', 'Roda 4 (empat)', 'Drs. H. BAMBANG WIDADI', '19650528 199203 1 007', 'CAMAT', '2023-11-17 19:29:31', '2023-11-18 13:11:44'),
(2, 'AA 6037 XD', 'YAMAHA JUPITER CW', 'Roda 2 (dua)', 'SUPARYO, S. Sos', '19651124 198812 1 001', 'SEKRETARIS CAMAT', '2023-11-17 19:32:34', '2023-11-17 19:32:34'),
(4, 'AA 9883 SD', 'YAMAHA VEGA', 'Roda 2 (dua)', 'NUR FATIMAH, S.IP', '19750210 200701 2 028', 'Kasubag Umum dan Kepegawaian', '2023-11-28 07:38:54', '2023-11-28 07:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_bbm` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id`, `id_bbm`, `keterangan`, `jumlah`, `created_at`, `updated_at`) VALUES
(7, 1, '2023', '120', '2023-11-22 06:08:08', '2023-12-01 02:27:03'),
(8, 2, '2023', '50', '2023-11-22 06:08:19', '2023-11-22 06:08:19');

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_11_16_124929_create_kendaraan_table', 1),
(13, '2023_11_20_043218_create_stok_bbm_table', 2),
(14, '2023_11_20_043434_create_masuk_table', 2),
(16, '2023_11_20_044616_add_id_bbm_column_to_masuk_table', 3),
(17, '2023_11_28_131447_create_keluar_table', 4),
(19, '2023_11_28_133222_add_id_bbm_column_to_keluar_table', 5),
(22, '2023_12_01_152907_create_surat_tugas_table', 6),
(29, '2023_12_08_153710_create_role_table', 7),
(30, '2023_12_08_154249_add_role_id_column_to_users_table', 7),
(33, '2023_12_09_082516_create_pajak_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pajak`
--

CREATE TABLE `pajak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merek` varchar(255) NOT NULL,
  `nopol` varchar(255) NOT NULL,
  `tahun_kendaraan` varchar(255) NOT NULL,
  `jatuh_tempo` varchar(255) NOT NULL,
  `lima_tahun_awal` varchar(255) NOT NULL,
  `lima_tahun_akhir` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pajak`
--

INSERT INTO `pajak` (`id`, `merek`, `nopol`, `tahun_kendaraan`, `jatuh_tempo`, `lima_tahun_awal`, `lima_tahun_akhir`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'TOYOTA', 'AA 126 D', '2019', '2024-04-26', '2024', '2029', NULL, '2023-12-09 02:39:53', '2023-12-09 02:39:53');

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
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-12-08 01:31:27', '2023-12-08 01:31:27');

-- --------------------------------------------------------

--
-- Table structure for table `stok_bbm`
--

CREATE TABLE `stok_bbm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_bbm`
--

INSERT INTO `stok_bbm` (`id`, `jenis_kendaraan`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Roda 2 (dua)', '105', '2023-11-20 04:44:03', '2023-12-01 02:26:50'),
(2, 'Roda 4 (empat)', '40', '2023-11-20 04:44:03', '2023-11-29 05:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nopol` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `keperluan_2` varchar(255) DEFAULT NULL,
  `penumpang` varchar(255) NOT NULL,
  `nama_camat` varchar(255) DEFAULT NULL,
  `nip_camat` varchar(255) DEFAULT NULL,
  `tanggal` varchar(255) NOT NULL,
  `waktu_huruf` varchar(255) NOT NULL,
  `waktu_angka` varchar(255) NOT NULL,
  `nama_kasubbag` varchar(255) NOT NULL,
  `nilai_voucher` varchar(255) NOT NULL,
  `jumlah_bbm` varchar(255) NOT NULL,
  `harga_bbm` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_tugas`
--

INSERT INTO `surat_tugas` (`id`, `nopol`, `jenis_kendaraan`, `nama_pegawai`, `nip`, `jabatan`, `keperluan`, `keperluan_2`, `penumpang`, `nama_camat`, `nip_camat`, `tanggal`, `waktu_huruf`, `waktu_angka`, `nama_kasubbag`, `nilai_voucher`, `jumlah_bbm`, `harga_bbm`, `created_at`, `updated_at`) VALUES
(1, 'AA 126 D', 'Roda 4 (empat)', 'Drs. H. BAMBANG WIDADI', '19650528 199203 1 007', 'CAMAT', 'Menyetorkan Usulan Tamsil November', NULL, '2', 'Drs. H. Fulani', '11 3333 555555', '2023-12-02', 'Tiga', '3', 'Fulan', '135000', '10', '13500', '2023-12-01 11:43:33', '2023-12-02 05:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Demo', 'admin@demo.co.id', 1, NULL, '$2y$10$ye0oWmmO2IRCYWjCFlfYre9mGqzCUZJhHBojVOyQc1340thdEVcRC', NULL, '2023-12-08 01:33:26', '2023-12-08 01:33:36');

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
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keluar_id_bbm_foreign` (`id_bbm`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masuk_id_bbm_foreign` (`id_bbm`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pajak`
--
ALTER TABLE `pajak`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_bbm`
--
ALTER TABLE `stok_bbm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pajak`
--
ALTER TABLE `pajak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stok_bbm`
--
ALTER TABLE `stok_bbm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluar`
--
ALTER TABLE `keluar`
  ADD CONSTRAINT `keluar_id_bbm_foreign` FOREIGN KEY (`id_bbm`) REFERENCES `stok_bbm` (`id`);

--
-- Constraints for table `masuk`
--
ALTER TABLE `masuk`
  ADD CONSTRAINT `masuk_id_bbm_foreign` FOREIGN KEY (`id_bbm`) REFERENCES `stok_bbm` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
