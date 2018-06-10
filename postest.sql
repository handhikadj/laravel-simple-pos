-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2018 at 03:56 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postest`
--

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
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2018_05_02_130407_create_product_table', 1),
(13, '2018_05_11_112545_create_transaction_table', 1),
(14, '2018_05_27_142929_create_table_transaksi_detail', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `kd_barang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_roti` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `kd_barang`, `nama_roti`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'A-001', 'Roti Daging', 2000, '2018-05-27 19:51:23', '2018-05-27 19:51:23'),
(2, 'A-002', 'Roti Kerbau', 6000, '2018-05-28 21:33:12', '2018-05-28 21:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `total_harga`, `created_at`, `updated_at`) VALUES
('TR1806001', 12000, '2018-06-08 09:58:06', '2018-06-08 09:58:06'),
('TR1806002', 38000, '2018-06-08 09:58:46', '2018-06-08 09:58:46'),
('TR1806003', 1600000, '2018-06-08 09:59:47', '2018-06-08 09:59:47'),
('TR1806004', 0, '2018-06-08 10:01:13', '2018-06-08 10:01:13'),
('TR1806005', 12000, '2018-06-08 10:01:47', '2018-06-08 10:01:47'),
('TR1806006', 60000, '2018-06-08 10:02:26', '2018-06-08 10:02:26'),
('TR1806007', 40000, '2018-06-08 10:08:23', '2018-06-08 10:08:23'),
('TR1806008', 12000, '2018-06-08 10:10:16', '2018-06-08 10:10:16'),
('TR1806009', 80000, '2018-06-08 10:12:53', '2018-06-08 10:12:53'),
('TR1806010', 200000, '2018-06-08 10:13:29', '2018-06-08 10:13:29'),
('TR1806011', 0, '2018-06-08 10:14:43', '2018-06-08 10:14:43'),
('TR1806012', 8000, '2018-06-08 22:53:48', '2018-06-08 22:53:48'),
('TR1806013', 8000, '2018-06-08 22:53:57', '2018-06-08 22:53:57'),
('TR1806014', 8000, '2018-06-08 22:54:03', '2018-06-08 22:54:03'),
('TR1806015', 132000, '2018-06-08 22:57:03', '2018-06-08 22:57:03'),
('TR1806016', 1200000, '2018-06-08 22:57:27', '2018-06-08 22:57:27'),
('TR1806017', 0, '2018-06-08 23:40:55', '2018-06-08 23:40:55'),
('TR1806018', 8000, '2018-06-08 23:42:29', '2018-06-08 23:42:29'),
('TR1806019', 16000, '2018-06-08 23:42:42', '2018-06-08 23:42:42'),
('TR1806020', 8000, '2018-06-08 23:43:14', '2018-06-08 23:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaction_detail_id` int(11) NOT NULL,
  `id_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_barang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaction_detail_id`, `id_transaksi`, `kd_barang`, `jumlah`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 'TR1806001', 'A-001', 2, 4000, '2018-06-08 09:53:11', '2018-06-08 09:53:11'),
(2, 'TR1806001', 'A-001', 2, 4000, '2018-06-08 09:53:17', '2018-06-08 09:53:17'),
(3, 'TR1806001', 'A-001', 2, 4000, '2018-06-08 09:53:19', '2018-06-08 09:53:19'),
(4, 'TR1806002', 'A-001', 2, 4000, '2018-06-08 09:58:33', '2018-06-08 09:58:33'),
(5, 'TR1806002', 'A-001', 2, 4000, '2018-06-08 09:58:35', '2018-06-08 09:58:35'),
(6, 'TR1806002', 'A-001', 5, 10000, '2018-06-08 09:58:39', '2018-06-08 09:58:39'),
(7, 'TR1806002', 'A-001', 10, 20000, '2018-06-08 09:58:44', '2018-06-08 09:58:44'),
(8, 'TR1806003', 'A-001', 100, 200000, '2018-06-08 09:59:31', '2018-06-08 09:59:31'),
(9, 'TR1806003', 'A-001', 100, 200000, '2018-06-08 09:59:33', '2018-06-08 09:59:33'),
(10, 'TR1806003', 'A-001', 600, 1200000, '2018-06-08 09:59:38', '2018-06-08 09:59:38'),
(11, 'TR1806005', 'A-001', 2, 4000, '2018-06-08 10:01:42', '2018-06-08 10:01:42'),
(12, 'TR1806005', 'A-001', 2, 4000, '2018-06-08 10:01:43', '2018-06-08 10:01:43'),
(13, 'TR1806005', 'A-001', 2, 4000, '2018-06-08 10:01:45', '2018-06-08 10:01:45'),
(14, 'TR1806006', 'A-001', 10, 20000, '2018-06-08 10:02:21', '2018-06-08 10:02:21'),
(15, 'TR1806006', 'A-001', 10, 20000, '2018-06-08 10:02:22', '2018-06-08 10:02:22'),
(16, 'TR1806006', 'A-001', 10, 20000, '2018-06-08 10:02:24', '2018-06-08 10:02:24'),
(17, 'TR1806007', 'A-001', 10, 20000, '2018-06-08 10:08:19', '2018-06-08 10:08:19'),
(18, 'TR1806007', 'A-001', 10, 20000, '2018-06-08 10:08:20', '2018-06-08 10:08:20'),
(19, 'TR1806008', 'A-001', 2, 4000, '2018-06-08 10:09:09', '2018-06-08 10:09:09'),
(20, 'TR1806008', 'A-001', 2, 4000, '2018-06-08 10:09:11', '2018-06-08 10:09:11'),
(21, 'TR1806008', 'A-001', 2, 4000, '2018-06-08 10:09:12', '2018-06-08 10:09:12'),
(22, 'TR1806009', 'A-001', 20, 40000, '2018-06-08 10:12:48', '2018-06-08 10:12:48'),
(23, 'TR1806009', 'A-001', 20, 40000, '2018-06-08 10:12:50', '2018-06-08 10:12:50'),
(24, 'TR1806010', 'A-001', 50, 100000, '2018-06-08 10:13:25', '2018-06-08 10:13:25'),
(25, 'TR1806010', 'A-001', 50, 100000, '2018-06-08 10:13:27', '2018-06-08 10:13:27'),
(26, 'TR1806012', 'A-001', 2, 4000, '2018-06-08 22:53:44', '2018-06-08 22:53:44'),
(27, 'TR1806012', 'A-001', 2, 4000, '2018-06-08 22:53:46', '2018-06-08 22:53:46'),
(28, 'TR1806013', 'A-001', 2, 4000, '2018-06-08 22:53:51', '2018-06-08 22:53:51'),
(29, 'TR1806013', 'A-001', 2, 4000, '2018-06-08 22:53:53', '2018-06-08 22:53:53'),
(30, 'TR1806014', 'A-001', 2, 4000, '2018-06-08 22:53:59', '2018-06-08 22:53:59'),
(31, 'TR1806014', 'A-001', 2, 4000, '2018-06-08 22:54:01', '2018-06-08 22:54:01'),
(32, 'TR1806015', 'A-001', 2, 4000, '2018-06-08 22:56:46', '2018-06-08 22:56:46'),
(33, 'TR1806015', 'A-001', 2, 4000, '2018-06-08 22:56:48', '2018-06-08 22:56:48'),
(34, 'TR1806015', 'A-001', 2, 4000, '2018-06-08 22:56:50', '2018-06-08 22:56:50'),
(35, 'TR1806015', 'A-001', 10, 20000, '2018-06-08 22:56:55', '2018-06-08 22:56:55'),
(36, 'TR1806015', 'A-001', 50, 100000, '2018-06-08 22:56:59', '2018-06-08 22:56:59'),
(37, 'TR1806016', 'A-002', 50, 300000, '2018-06-08 22:57:15', '2018-06-08 22:57:15'),
(38, 'TR1806016', 'A-002', 50, 300000, '2018-06-08 22:57:17', '2018-06-08 22:57:17'),
(39, 'TR1806016', 'A-002', 100, 600000, '2018-06-08 22:57:22', '2018-06-08 22:57:22'),
(40, 'TR1806018', 'A-001', 2, 4000, '2018-06-08 23:42:22', '2018-06-08 23:42:22'),
(41, 'TR1806018', 'A-001', 2, 4000, '2018-06-08 23:42:26', '2018-06-08 23:42:26'),
(42, 'TR1806019', 'A-001', 2, 4000, '2018-06-08 23:42:31', '2018-06-08 23:42:31'),
(43, 'TR1806019', 'A-001', 2, 4000, '2018-06-08 23:42:36', '2018-06-08 23:42:36'),
(44, 'TR1806019', 'A-001', 2, 4000, '2018-06-08 23:42:38', '2018-06-08 23:42:38'),
(45, 'TR1806019', 'A-001', 2, 4000, '2018-06-08 23:42:40', '2018-06-08 23:42:40'),
(46, 'TR1806020', 'A-001', 2, 4000, '2018-06-08 23:43:10', '2018-06-08 23:43:10'),
(47, 'TR1806020', 'A-001', 2, 4000, '2018-06-08 23:43:12', '2018-06-08 23:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$ENr5pXpGKskNPUmrsArmT.XEjK3Wc/AjGhT9dBAULifHSKE7Yvsa.', 'MfyQtNw2UBcvPU7INttIsFefQH2GYu9KdcHVWLzH8N0U4P59lnd5ihWt2TFF', '2018-05-27 19:51:12', '2018-05-27 19:51:12');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_kd_barang_unique` (`kd_barang`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaction_detail_id`),
  ADD KEY `transaksi_detail_kd_barang_foreign` (`kd_barang`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_kd_barang_foreign` FOREIGN KEY (`kd_barang`) REFERENCES `product` (`kd_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
