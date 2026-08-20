-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.8.8-MariaDB - MariaDB Server
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pos-klara
CREATE DATABASE IF NOT EXISTS `pos-klara` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci */;
USE `pos-klara`;

-- Dumping structure for table pos-klara.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.cache: ~0 rows (approximately)

-- Dumping structure for table pos-klara.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.cache_locks: ~0 rows (approximately)

-- Dumping structure for table pos-klara.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table pos-klara.item_penjualan
CREATE TABLE IF NOT EXISTS `item_penjualan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `penjualan_id` bigint(20) unsigned NOT NULL,
  `produk_id` bigint(20) unsigned NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_penjualan_penjualan_id_foreign` (`penjualan_id`),
  KEY `item_penjualan_produk_id_foreign` (`produk_id`),
  CONSTRAINT `item_penjualan_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`),
  CONSTRAINT `item_penjualan_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.item_penjualan: ~4 rows (approximately)
INSERT INTO `item_penjualan` (`id`, `penjualan_id`, `produk_id`, `kuantitas`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 2, 7, 1, 12000, 12000, '2026-08-20 03:04:41', '2026-08-20 03:04:41'),
	(2, 2, 6, 1, 30000, 30000, '2026-08-20 03:04:46', '2026-08-20 03:04:46'),
	(3, 3, 10, 1, 35000, 35000, '2026-08-20 03:05:00', '2026-08-20 03:05:00'),
	(4, 3, 9, 1, 32000, 32000, '2026-08-20 03:05:02', '2026-08-20 03:05:02');

-- Dumping structure for table pos-klara.jenis
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.jenis: ~5 rows (approximately)
INSERT INTO `jenis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
	(4, 'Makanan', '2026-08-20 02:13:12', '2026-08-20 06:48:55'),
	(5, 'Minuman', '2026-08-20 02:13:18', '2026-08-20 02:13:18'),
	(6, 'Kue & Dessert', '2026-08-20 02:13:31', '2026-08-20 02:13:31'),
	(7, 'Roti & Bakery', '2026-08-20 02:13:49', '2026-08-20 02:13:49'),
	(8, 'Cemilan / Snack', '2026-08-20 02:14:01', '2026-08-20 06:49:10');

-- Dumping structure for table pos-klara.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.jobs: ~0 rows (approximately)

-- Dumping structure for table pos-klara.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.job_batches: ~0 rows (approximately)

-- Dumping structure for table pos-klara.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.migrations: ~9 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_roles_table', 1),
	(2, '0001_01_01_000000_create_users_table', 1),
	(3, '0001_01_01_000001_create_cache_table', 1),
	(4, '0001_01_01_000002_create_jobs_table', 1),
	(5, '2026_07_23_020823_create_produk_table', 1),
	(6, '2026_07_23_021417_create_penjualan_table', 1),
	(7, '2026_07_23_021805_create_item_penjualan_table', 1),
	(8, '2026_08_18_083010_create_jenis_table', 1),
	(9, '2026_08_18_083044_add_jenis_id_to_produk_table', 1);

-- Dumping structure for table pos-klara.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table pos-klara.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `status` enum('OPEN','COMPLETED') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penjualan_user_id_foreign` (`user_id`),
  CONSTRAINT `penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.penjualan: ~2 rows (approximately)
INSERT INTO `penjualan` (`id`, `user_id`, `total_pembayaran`, `metode_pembayaran`, `status`, `created_at`, `updated_at`) VALUES
	(2, 5, 42000, 'CASH', 'COMPLETED', '2026-08-20 03:04:37', '2026-08-20 03:04:51'),
	(3, 5, 67000, 'CASH', 'OPEN', '2026-08-20 03:04:56', '2026-08-20 03:05:02');

-- Dumping structure for table pos-klara.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `jenis_id` bigint(20) unsigned DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produk_user_id_foreign` (`user_id`),
  KEY `produk_nama_index` (`nama`),
  KEY `produk_jenis_id_foreign` (`jenis_id`),
  CONSTRAINT `produk_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id`) ON DELETE SET NULL,
  CONSTRAINT `produk_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.produk: ~6 rows (approximately)
INSERT INTO `produk` (`id`, `user_id`, `jenis_id`, `foto`, `nama`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
	(6, 5, 6, 'products/qCvrquKLxiP3221ixGoUpcbRFkfy4ubO9v4ypsyi.jpg', 'Mochi', 26000, 30000, 24, '2026-08-20 02:39:40', '2026-08-20 03:04:46'),
	(7, 5, 6, 'products/247gzpCLxq0RYytbEstnqimwa0Hbqx5oVkz6xgFU.jpg', 'Bolu', 9000, 12000, 29, '2026-08-20 02:40:30', '2026-08-20 03:04:41'),
	(8, 5, 7, 'products/ElilrbO36aJwdcdQMQpnI1U0JtRqB7hlBOlHCT1M.jpg', 'Roti', 8000, 10000, 20, '2026-08-20 02:40:59', '2026-08-20 02:40:59'),
	(9, 5, 6, 'products/Yq4l790pWk3ZlBHwccHetGWqYsAOBY0jlnbqXKLZ.jpg', 'Macaron', 28000, 32000, 34, '2026-08-20 02:41:35', '2026-08-20 03:05:02'),
	(10, 5, 6, 'products/ABVN9uAsnHvAGI1cN8IZrEOrLQ6oo6y67XVXQY2P.jpg', 'Donat', 30000, 35000, 27, '2026-08-20 02:42:17', '2026-08-20 03:05:00'),
	(11, 5, 6, 'products/zzRx7t7NoMNKKxtUEJBlDDvkfQt6E036ddXOihuX.jpg', 'Pancake', 18000, 20000, 20, '2026-08-20 02:42:49', '2026-08-20 02:42:49'),
	(12, 4, 5, 'products/zgKpzCQc6j4Uhv0DUz34hgRHxtJOK2LsVHHtEJUL.jpg', 'Strawberry Matcha', 18000, 22000, 45, '2026-08-20 06:38:59', '2026-08-20 06:38:59'),
	(13, 4, 5, 'products/ug9wpeSXqpgl2Qv5UPSr44kPT3Go40O9vktvN7QL.jpg', 'Matcha', 12000, 18000, 20, '2026-08-20 06:40:07', '2026-08-20 06:50:47'),
	(14, 4, 5, 'products/fhLmbxCysdK711uP0Tu9b7C3luuZCAPQ3Gwauz9Z.jpg', 'Ice Coffe', 23000, 25000, 50, '2026-08-20 06:42:07', '2026-08-20 06:42:07'),
	(15, 4, 4, 'products/Jh22KmAUhV3niBMXs3xEYqq5dn17iyeGFsti3YlL.jpg', 'Onigiri', 16000, 19000, 17, '2026-08-20 06:52:13', '2026-08-20 06:53:35');

-- Dumping structure for table pos-klara.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2026-08-18 02:50:56', '2026-08-18 02:50:56'),
	(2, 'kasir', '2026-08-18 02:50:56', '2026-08-18 02:50:56');

-- Dumping structure for table pos-klara.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('bYwaBigFN0L3mHEuBUvkRqTYQSYqaK7gzkMY5g4k', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMzloaklGUFl3ZWk5RXJncGxiMUw4WHFNaG8xNWdmUFJ4RG9SVDQzUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9kdWsiO3M6NToicm91dGUiO3M6MTI6InByb2R1ay5pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1787211543);

-- Dumping structure for table pos-klara.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  FULLTEXT KEY `users_name_email_fulltext` (`name`,`email`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table pos-klara.users: ~6 rows (approximately)
INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Andreanne Kuhn', 'jody94@example.net', '2026-08-18 02:50:56', '$2y$12$VpeGS14p/yscLgPXOxvDOeWx6cMd8xFW7wTtjBm1lb7rKYwUbvE/y', 'nudJzzLVGM', '2026-08-18 02:50:56', '2026-08-18 02:50:56'),
	(2, 2, 'Elinore McLaughlin', 'ethan.kunze@example.net', '2026-08-18 02:50:56', '$2y$12$VpeGS14p/yscLgPXOxvDOeWx6cMd8xFW7wTtjBm1lb7rKYwUbvE/y', 'mfo4ywTiWz', '2026-08-18 02:50:57', '2026-08-18 02:50:57'),
	(3, 2, 'Dr. Adrien Bernier MD', 'asha53@example.com', '2026-08-18 02:50:56', '$2y$12$VpeGS14p/yscLgPXOxvDOeWx6cMd8xFW7wTtjBm1lb7rKYwUbvE/y', 'CWvFlweDvd', '2026-08-18 02:50:57', '2026-08-18 02:50:57'),
	(4, 1, 'Dr. Dina Mayer', 'yschaden@example.net', '2026-08-18 02:50:56', '$2y$12$VpeGS14p/yscLgPXOxvDOeWx6cMd8xFW7wTtjBm1lb7rKYwUbvE/y', '8HhN1enowMGfD1sKKNZT0rGFUnO0eI3lHmUnXgwujBYs2hdWjMsWop15F2Mz', '2026-08-18 02:50:57', '2026-08-18 02:50:57'),
	(5, 1, 'Emily Cummings Jr.', 'werner.steuber@example.net', '2026-08-18 02:50:56', '$2y$12$VpeGS14p/yscLgPXOxvDOeWx6cMd8xFW7wTtjBm1lb7rKYwUbvE/y', 'vDhmXM1uXYgQgyDMyqSosJ9U6klHpgWZ20jTWUGYW6jkIRnR31SrWbVyCHhK', '2026-08-18 02:50:57', '2026-08-18 02:50:57'),
	(6, 2, 'Test User', 'test@example.com', '2026-08-18 02:50:57', '$2y$12$VpeGS14p/yscLgPXOxvDOeWx6cMd8xFW7wTtjBm1lb7rKYwUbvE/y', '99UougHpRSV4u1ndATzqUmTng7D0rkqsq3FAdZxvCRRe4LqD2yhyhRQZrCyZ', '2026-08-18 02:50:57', '2026-08-18 02:50:57');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
