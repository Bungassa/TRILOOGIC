-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Jun 2026 pada 15.23
-- Versi server: 8.0.30
-- Versi PHP: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bungaaa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensis`
--

CREATE TABLE `absensis` (
  `id` bigint UNSIGNED NOT NULL,
  `karyawan_id` bigint UNSIGNED NOT NULL,
  `layanan_id` bigint UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'hadir',
  `keterangan` text,
  `jumlah_paket` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `absensis`
--

INSERT INTO `absensis` (`id`, `karyawan_id`, `layanan_id`, `tanggal`, `jam_masuk`, `jam_pulang`, `status`, `keterangan`, `jumlah_paket`, `created_at`, `updated_at`) VALUES
(4, 11, NULL, '2026-05-01', NULL, NULL, 'hadir', NULL, 0, '2026-05-07 08:32:45', '2026-05-07 08:32:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `activity` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `activity`, `description`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Manual', 'Tinker', NULL, NULL, '2026-05-11 09:19:17', '2026-05-11 09:19:17'),
(2, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:22:32', '2026-05-11 09:22:32'),
(3, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:22:37', '2026-05-11 09:22:37'),
(4, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:22:48', '2026-05-11 09:22:48'),
(5, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:22:59', '2026-05-11 09:22:59'),
(6, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:23:09', '2026-05-11 09:23:09'),
(7, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:23:19', '2026-05-11 09:23:19'),
(8, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:23:30', '2026-05-11 09:23:30'),
(9, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:23:40', '2026-05-11 09:23:40'),
(10, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:23:51', '2026-05-11 09:23:51'),
(11, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:24:01', '2026-05-11 09:24:01'),
(12, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:24:12', '2026-05-11 09:24:12'),
(13, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:24:22', '2026-05-11 09:24:22'),
(14, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:24:33', '2026-05-11 09:24:33'),
(15, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:24:43', '2026-05-11 09:24:43'),
(16, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:24:54', '2026-05-11 09:24:54'),
(17, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:25:04', '2026-05-11 09:25:04'),
(18, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:25:15', '2026-05-11 09:25:15'),
(19, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:25:19', '2026-05-11 09:25:19'),
(20, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:25:30', '2026-05-11 09:25:30'),
(21, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:25:40', '2026-05-11 09:25:40'),
(22, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:25:50', '2026-05-11 09:25:50'),
(23, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:26:01', '2026-05-11 09:26:01'),
(24, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:26:11', '2026-05-11 09:26:11'),
(25, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:26:22', '2026-05-11 09:26:22'),
(26, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:26:32', '2026-05-11 09:26:32'),
(27, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:26:42', '2026-05-11 09:26:42'),
(28, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:26:53', '2026-05-11 09:26:53'),
(29, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:27:03', '2026-05-11 09:27:03'),
(30, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:27:14', '2026-05-11 09:27:14'),
(31, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:27:24', '2026-05-11 09:27:24'),
(32, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 09:27:35', '2026-05-11 09:27:35'),
(33, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:27:45', '2026-05-11 16:27:45'),
(34, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:27:56', '2026-05-11 16:27:56'),
(35, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:38:49', '2026-05-11 16:38:49'),
(36, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:38:49', '2026-05-11 16:38:49'),
(37, 5, 'Login', 'User Baraja Putra masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:39:03', '2026-05-11 16:39:03'),
(38, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:39:03', '2026-05-11 16:39:03'),
(39, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:40:50', '2026-05-11 16:40:50'),
(40, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:40:53', '2026-05-11 16:40:53'),
(41, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:41:18', '2026-05-11 16:41:18'),
(42, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:42:29', '2026-05-11 16:42:29'),
(43, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:42:55', '2026-05-11 16:42:55'),
(44, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:43:17', '2026-05-11 16:43:17'),
(45, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:45:35', '2026-05-11 16:45:35'),
(46, 5, 'Logout', 'User Baraja Putra keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:48:20', '2026-05-11 16:48:20'),
(47, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:48:21', '2026-05-11 16:48:21'),
(48, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:48:28', '2026-05-11 16:48:28'),
(49, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 16:48:28', '2026-05-11 16:48:28'),
(50, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:00:20', '2026-05-11 17:00:20'),
(51, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:00:20', '2026-05-11 17:00:20'),
(52, 5, 'Login', 'User Baraja Putra masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:00:31', '2026-05-11 17:00:31'),
(53, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:00:31', '2026-05-11 17:00:31'),
(54, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:00:34', '2026-05-11 17:00:34'),
(55, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:00:37', '2026-05-11 17:00:37'),
(56, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:03:25', '2026-05-11 17:03:25'),
(57, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:04:55', '2026-05-11 17:04:55'),
(58, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:06:02', '2026-05-11 17:06:02'),
(59, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:06:48', '2026-05-11 17:06:48'),
(60, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:08:20', '2026-05-11 17:08:20'),
(61, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:09:28', '2026-05-11 17:09:28'),
(62, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:12:04', '2026-05-11 17:12:04'),
(63, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:12:16', '2026-05-11 17:12:16'),
(64, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:13:11', '2026-05-11 17:13:11'),
(65, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:13:17', '2026-05-11 17:13:17'),
(66, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:13:20', '2026-05-11 17:13:20'),
(67, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:14:17', '2026-05-11 17:14:17'),
(68, 5, 'Logout', 'User Baraja Putra keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:14:20', '2026-05-11 17:14:20'),
(69, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:14:21', '2026-05-11 17:14:21'),
(70, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:14:26', '2026-05-11 17:14:26'),
(71, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:14:27', '2026-05-11 17:14:27'),
(72, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:14:34', '2026-05-11 17:14:34'),
(73, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:14:45', '2026-05-11 17:14:45'),
(74, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:15:04', '2026-05-11 17:15:04'),
(75, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:15:22', '2026-05-11 17:15:22'),
(76, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:15:32', '2026-05-11 17:15:32'),
(77, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:15:40', '2026-05-11 17:15:40'),
(78, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:18:14', '2026-05-11 17:18:14'),
(79, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:20:03', '2026-05-11 17:20:03'),
(80, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:20:33', '2026-05-11 17:20:33'),
(81, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:20:44', '2026-05-11 17:20:44'),
(82, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:20:54', '2026-05-11 17:20:54'),
(83, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:21:05', '2026-05-11 17:21:05'),
(84, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:21:15', '2026-05-11 17:21:15'),
(85, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:21:25', '2026-05-11 17:21:25'),
(86, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:22:34', '2026-05-11 17:22:34'),
(87, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:22:35', '2026-05-11 17:22:35'),
(88, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:28:56', '2026-05-11 17:28:56'),
(89, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:28:59', '2026-05-11 17:28:59'),
(90, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:30:22', '2026-05-11 17:30:22'),
(91, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:30:22', '2026-05-11 17:30:22'),
(92, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:30:25', '2026-05-11 17:30:25'),
(93, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:31:56', '2026-05-11 17:31:56'),
(94, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:31:59', '2026-05-11 17:31:59'),
(95, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:32:03', '2026-05-11 17:32:03'),
(96, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:32:04', '2026-05-11 17:32:04'),
(97, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:32:27', '2026-05-11 17:32:27'),
(98, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:32:37', '2026-05-11 17:32:37'),
(99, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:32:48', '2026-05-11 17:32:48'),
(100, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:32:51', '2026-05-11 17:32:51'),
(101, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:32:53', '2026-05-11 17:32:53'),
(102, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:32:56', '2026-05-11 17:32:56'),
(103, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:33:02', '2026-05-11 17:33:02'),
(104, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:33:03', '2026-05-11 17:33:03'),
(105, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:33:13', '2026-05-11 17:33:13'),
(106, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:33:14', '2026-05-11 17:33:14'),
(107, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:33:19', '2026-05-11 17:33:19'),
(108, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:33:23', '2026-05-11 17:33:23'),
(109, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:33:25', '2026-05-11 17:33:25'),
(110, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:33:33', '2026-05-11 17:33:33'),
(111, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:33:33', '2026-05-11 17:33:33'),
(112, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', '2026-05-11 17:35:14', '2026-05-11 17:35:14'),
(113, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:38:03', '2026-05-11 17:38:03'),
(114, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:38:40', '2026-05-11 17:38:40'),
(115, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:38:41', '2026-05-11 17:38:41'),
(116, NULL, 'Kunjungan', 'Guest mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-05-11 17:38:53', '2026-05-11 17:38:53'),
(117, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-12 15:49:34', '2026-05-12 15:49:34'),
(118, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-12 15:49:49', '2026-05-12 15:49:49'),
(119, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-12 15:49:50', '2026-05-12 15:49:50'),
(120, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:50:43', '2026-05-15 08:50:43'),
(121, NULL, 'Kunjungan', 'Guest mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:52:45', '2026-05-15 08:52:45'),
(122, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:53:10', '2026-05-15 08:53:10'),
(123, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:53:10', '2026-05-15 08:53:10'),
(124, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:53:39', '2026-05-15 08:53:39'),
(125, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:53:50', '2026-05-15 08:53:50'),
(126, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:54:47', '2026-05-15 08:54:47'),
(127, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:54:48', '2026-05-15 08:54:48'),
(128, 5, 'Login', 'User Baraja Putra masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:54:56', '2026-05-15 08:54:56'),
(129, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:54:57', '2026-05-15 08:54:57'),
(130, 5, 'Logout', 'User Baraja Putra keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:55:22', '2026-05-15 08:55:22'),
(131, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:55:22', '2026-05-15 08:55:22'),
(132, 6, 'Login', 'User Bunga Sabrina masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:56:17', '2026-05-15 08:56:17'),
(133, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:56:17', '2026-05-15 08:56:17'),
(134, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:56:45', '2026-05-15 08:56:45'),
(135, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:57:24', '2026-05-15 08:57:24'),
(136, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:57:28', '2026-05-15 08:57:28'),
(137, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:58:52', '2026-05-15 08:58:52'),
(138, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:59:56', '2026-05-15 08:59:56'),
(139, 6, 'Logout', 'User Bunga Sabrina keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:59:59', '2026-05-15 08:59:59'),
(140, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 08:59:59', '2026-05-15 08:59:59'),
(141, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:00:08', '2026-05-15 09:00:08'),
(142, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:00:09', '2026-05-15 09:00:09'),
(143, 2, 'Update Transaksi', 'Mengubah transaksi #50 (Status: dikerjakan)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:00:19', '2026-05-15 09:00:19'),
(144, 2, 'Update Transaksi', 'Mengubah transaksi #50 (Status: dikerjakan)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:00:27', '2026-05-15 09:00:27'),
(145, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Diva', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:01:06', '2026-05-15 09:01:06'),
(146, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:03:45', '2026-05-15 09:03:45'),
(147, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:07:30', '2026-05-15 09:07:30'),
(148, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:07:31', '2026-05-15 09:07:31'),
(149, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:08:40', '2026-05-15 09:08:40'),
(150, NULL, 'Login', 'User Siti masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:08:50', '2026-05-15 09:08:50'),
(151, NULL, 'Kunjungan', 'Siti membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:08:50', '2026-05-15 09:08:50'),
(152, NULL, 'Logout', 'User Siti keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:08:56', '2026-05-15 09:08:56'),
(153, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:08:56', '2026-05-15 09:08:56'),
(154, 6, 'Login', 'User Bunga Sabrina masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:09:18', '2026-05-15 09:09:18'),
(155, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:09:18', '2026-05-15 09:09:18'),
(156, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 09:10:21', '2026-05-15 09:10:21'),
(157, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 15:36:53', '2026-05-15 15:36:53'),
(158, NULL, 'Login Gagal', 'Percobaan login gagal dengan email: owner@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 15:37:07', '2026-05-15 15:37:07'),
(159, NULL, 'Login Gagal', 'Percobaan login gagal dengan email: owner@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 15:37:12', '2026-05-15 15:37:12'),
(160, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 15:42:53', '2026-05-15 15:42:53'),
(161, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 15:43:04', '2026-05-15 15:43:04'),
(162, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 15:43:04', '2026-05-15 15:43:04'),
(163, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 15:43:20', '2026-05-15 15:43:20'),
(164, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 15:43:20', '2026-05-15 15:43:20'),
(165, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 16:05:00', '2026-05-15 16:05:00'),
(166, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 16:05:07', '2026-05-15 16:05:07'),
(167, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 16:05:07', '2026-05-15 16:05:07'),
(168, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 16:05:13', '2026-05-15 16:05:13'),
(169, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 16:05:33', '2026-05-15 16:05:33'),
(170, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 16:05:41', '2026-05-15 16:05:41'),
(171, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 16:05:46', '2026-05-15 16:05:46'),
(172, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 16:05:46', '2026-05-15 16:05:46'),
(173, 6, 'Login', 'User Bunga Sabrina masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 16:06:05', '2026-05-15 16:06:05'),
(174, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 16:06:57', '2026-05-15 16:06:57'),
(175, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 16:08:58', '2026-05-15 16:08:58'),
(176, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-15 16:09:21', '2026-05-15 16:09:21'),
(177, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:48:13', '2026-05-16 04:48:13'),
(178, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:49:37', '2026-05-16 04:49:37'),
(179, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:49:58', '2026-05-16 04:49:58'),
(180, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:49:59', '2026-05-16 04:49:59'),
(181, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:50:39', '2026-05-16 04:50:39'),
(182, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:50:39', '2026-05-16 04:50:39'),
(183, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:51:51', '2026-05-16 04:51:51'),
(184, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:53:59', '2026-05-16 04:53:59'),
(185, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:54:05', '2026-05-16 04:54:05'),
(186, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:56:58', '2026-05-16 04:56:58'),
(187, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:57:08', '2026-05-16 04:57:08'),
(188, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:57:08', '2026-05-16 04:57:08'),
(189, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:57:16', '2026-05-16 04:57:16'),
(190, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:57:16', '2026-05-16 04:57:16'),
(191, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:57:42', '2026-05-16 04:57:42'),
(192, 2, 'Update Transaksi', 'Mengubah transaksi #53 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:58:04', '2026-05-16 04:58:04'),
(193, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Bunga', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 04:59:26', '2026-05-16 04:59:26'),
(194, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 05:00:43', '2026-05-16 05:00:43'),
(195, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 05:00:54', '2026-05-16 05:00:54'),
(196, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 05:00:59', '2026-05-16 05:00:59'),
(197, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 05:03:16', '2026-05-16 05:03:16'),
(198, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 05:03:16', '2026-05-16 05:03:16'),
(199, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-16 05:06:56', '2026-05-16 05:06:56'),
(200, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 15:40:51', '2026-05-18 15:40:51'),
(201, NULL, 'Login Gagal', 'Percobaan login gagal dengan email: owner@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 15:41:03', '2026-05-18 15:41:03'),
(202, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 15:48:22', '2026-05-18 15:48:22'),
(203, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 15:48:29', '2026-05-18 15:48:29'),
(204, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 15:48:29', '2026-05-18 15:48:29'),
(205, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 15:49:01', '2026-05-18 15:49:01'),
(206, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 15:49:01', '2026-05-18 15:49:01'),
(207, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:04:12', '2026-05-18 16:04:12'),
(208, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:04:21', '2026-05-18 16:04:21'),
(209, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:04:21', '2026-05-18 16:04:21'),
(210, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:09:52', '2026-05-18 16:09:52'),
(211, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:16:35', '2026-05-18 16:16:35');
INSERT INTO `activity_logs` (`id`, `user_id`, `activity`, `description`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(212, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:16:36', '2026-05-18 16:16:36'),
(213, NULL, 'Kunjungan', 'barajapu mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:19:10', '2026-05-18 16:19:10'),
(214, NULL, 'Logout', 'User barajapu keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:19:16', '2026-05-18 16:19:16'),
(215, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:19:16', '2026-05-18 16:19:16'),
(216, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:22:26', '2026-05-18 16:22:26'),
(217, NULL, 'Kunjungan', 'Guest mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:23:20', '2026-05-18 16:23:20'),
(218, NULL, 'Kunjungan', 'Guest mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:23:37', '2026-05-18 16:23:37'),
(219, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:23:53', '2026-05-18 16:23:53'),
(220, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-18 16:24:56', '2026-05-18 16:24:56'),
(221, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:31:09', '2026-05-24 12:31:09'),
(222, NULL, 'Login Gagal', 'Percobaan login gagal dengan email: owner@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:31:54', '2026-05-24 12:31:54'),
(223, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:40:35', '2026-05-24 12:40:35'),
(224, 5, 'Login', 'User Baraja Putra masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:40:47', '2026-05-24 12:40:47'),
(225, 5, 'Kunjungan', 'Baraja Putra mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:40:47', '2026-05-24 12:40:47'),
(226, 5, 'Logout', 'User Baraja Putra keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:41:04', '2026-05-24 12:41:04'),
(227, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:41:05', '2026-05-24 12:41:05'),
(228, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:41:33', '2026-05-24 12:41:33'),
(229, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:41:33', '2026-05-24 12:41:33'),
(230, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:41:59', '2026-05-24 12:41:59'),
(231, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:42:01', '2026-05-24 12:42:01'),
(232, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:45:40', '2026-05-24 12:45:40'),
(233, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:46:54', '2026-05-24 12:46:54'),
(234, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:46:55', '2026-05-24 12:46:55'),
(235, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:57:08', '2026-05-24 12:57:08'),
(236, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 12:58:49', '2026-05-24 12:58:49'),
(237, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 13:01:22', '2026-05-24 13:01:22'),
(238, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 13:01:22', '2026-05-24 13:01:22'),
(239, 2, 'Update Transaksi', 'Mengubah transaksi #52 (Status: dikerjakan)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 13:22:34', '2026-05-24 13:22:34'),
(240, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:11:38', '2026-05-24 15:11:38'),
(241, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:11:42', '2026-05-24 15:11:42'),
(242, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:12:01', '2026-05-24 15:12:01'),
(243, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:12:02', '2026-05-24 15:12:02'),
(244, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:12:15', '2026-05-24 15:12:15'),
(245, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:12:15', '2026-05-24 15:12:15'),
(246, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:12:21', '2026-05-24 15:12:21'),
(247, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:12:25', '2026-05-24 15:12:25'),
(248, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:12:44', '2026-05-24 15:12:44'),
(249, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:12:46', '2026-05-24 15:12:46'),
(250, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:14:26', '2026-05-24 15:14:26'),
(251, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:14:33', '2026-05-24 15:14:33'),
(252, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:14:34', '2026-05-24 15:14:34'),
(253, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:14:41', '2026-05-24 15:14:41'),
(254, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:14:41', '2026-05-24 15:14:41'),
(255, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:15:22', '2026-05-24 15:15:22'),
(256, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:15:22', '2026-05-24 15:15:22'),
(257, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:15:53', '2026-05-24 15:15:53'),
(258, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:15:53', '2026-05-24 15:15:53'),
(259, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:15:57', '2026-05-24 15:15:57'),
(260, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:17:43', '2026-05-24 15:17:43'),
(261, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:17:47', '2026-05-24 15:17:47'),
(262, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:17:47', '2026-05-24 15:17:47'),
(263, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:17:53', '2026-05-24 15:17:53'),
(264, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:17:53', '2026-05-24 15:17:53'),
(265, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:18:13', '2026-05-24 15:18:13'),
(266, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:21:13', '2026-05-24 15:21:13'),
(267, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:21:13', '2026-05-24 15:21:13'),
(268, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:21:39', '2026-05-24 15:21:39'),
(269, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:21:39', '2026-05-24 15:21:39'),
(270, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:21:41', '2026-05-24 15:21:41'),
(271, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:22:03', '2026-05-24 15:22:03'),
(272, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:23:30', '2026-05-24 15:23:30'),
(273, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:24:21', '2026-05-24 15:24:21'),
(274, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:24:49', '2026-05-24 15:24:49'),
(275, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:26:09', '2026-05-24 15:26:09'),
(276, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:27:52', '2026-05-24 15:27:52'),
(277, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:27:52', '2026-05-24 15:27:52'),
(278, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:28:13', '2026-05-24 15:28:13'),
(279, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:28:13', '2026-05-24 15:28:13'),
(280, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:28:40', '2026-05-24 15:28:40'),
(281, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:30:01', '2026-05-24 15:30:01'),
(282, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:30:03', '2026-05-24 15:30:03'),
(283, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:30:04', '2026-05-24 15:30:04'),
(284, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:30:09', '2026-05-24 15:30:09'),
(285, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:30:09', '2026-05-24 15:30:09'),
(286, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:32:25', '2026-05-24 15:32:25'),
(287, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:32:25', '2026-05-24 15:32:25'),
(288, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:32:36', '2026-05-24 15:32:36'),
(289, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:32:46', '2026-05-24 15:32:46'),
(290, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:32:57', '2026-05-24 15:32:57'),
(291, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:33:07', '2026-05-24 15:33:07'),
(292, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:33:18', '2026-05-24 15:33:18'),
(293, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:33:28', '2026-05-24 15:33:28'),
(294, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:33:39', '2026-05-24 15:33:39'),
(295, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:33:49', '2026-05-24 15:33:49'),
(296, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:34:00', '2026-05-24 15:34:00'),
(297, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:34:10', '2026-05-24 15:34:10'),
(298, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:34:21', '2026-05-24 15:34:21'),
(299, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:34:31', '2026-05-24 15:34:31'),
(300, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:34:42', '2026-05-24 15:34:42'),
(301, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:34:52', '2026-05-24 15:34:52'),
(302, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:35:03', '2026-05-24 15:35:03'),
(303, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:35:13', '2026-05-24 15:35:13'),
(304, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:35:24', '2026-05-24 15:35:24'),
(305, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:35:35', '2026-05-24 15:35:35'),
(306, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:35:45', '2026-05-24 15:35:45'),
(307, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:35:56', '2026-05-24 15:35:56'),
(308, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:36:06', '2026-05-24 15:36:06'),
(309, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:36:17', '2026-05-24 15:36:17'),
(310, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:36:27', '2026-05-24 15:36:27'),
(311, 2, 'Kunjungan', 'Admin Ekky mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:44:24', '2026-05-24 15:44:24'),
(312, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:48:38', '2026-05-24 15:48:38'),
(313, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:48:39', '2026-05-24 15:48:39'),
(314, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:48:41', '2026-05-24 15:48:41'),
(315, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:48:56', '2026-05-24 15:48:56'),
(316, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:48:57', '2026-05-24 15:48:57'),
(317, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:49:55', '2026-05-24 15:49:55'),
(318, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:55:36', '2026-05-24 15:55:36'),
(319, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 15:58:31', '2026-05-24 15:58:31'),
(320, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:03:29', '2026-05-24 16:03:29'),
(321, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:04:14', '2026-05-24 16:04:14'),
(322, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:04:19', '2026-05-24 16:04:19'),
(323, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:04:19', '2026-05-24 16:04:19'),
(324, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:04:26', '2026-05-24 16:04:26'),
(325, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:04:26', '2026-05-24 16:04:26'),
(326, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:07:43', '2026-05-24 16:07:43'),
(327, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:07:43', '2026-05-24 16:07:43'),
(328, NULL, 'Login Gagal', 'Percobaan login gagal dengan email: owner@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:07:54', '2026-05-24 16:07:54'),
(329, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:18:46', '2026-05-24 16:18:46'),
(330, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:18:49', '2026-05-24 16:18:49'),
(331, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:19:01', '2026-05-24 16:19:01'),
(332, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:19:01', '2026-05-24 16:19:01'),
(333, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:19:12', '2026-05-24 16:19:12'),
(334, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:19:19', '2026-05-24 16:19:19'),
(335, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:19:19', '2026-05-24 16:19:19'),
(336, NULL, 'Kunjungan', 'Guest mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:19:56', '2026-05-24 16:19:56'),
(337, NULL, 'Login Gagal', 'Percobaan login gagal dengan email: bungasa@gmail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:20:46', '2026-05-24 16:20:46'),
(338, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:20:51', '2026-05-24 16:20:51'),
(339, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:20:51', '2026-05-24 16:20:51'),
(340, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:21:58', '2026-05-24 16:21:58'),
(341, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:22:14', '2026-05-24 16:22:14'),
(342, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:22:15', '2026-05-24 16:22:15'),
(343, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:26:11', '2026-05-24 16:26:11'),
(344, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:27:15', '2026-05-24 16:27:15'),
(345, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-24 16:28:38', '2026-05-24 16:28:38'),
(354, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-25 06:33:40', '2026-05-25 06:33:40'),
(355, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 10:50:48', '2026-05-27 10:50:48'),
(356, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 10:50:59', '2026-05-27 10:50:59'),
(357, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 10:51:00', '2026-05-27 10:51:00'),
(358, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 10:53:18', '2026-05-27 10:53:18'),
(359, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 10:53:28', '2026-05-27 10:53:28'),
(360, 2, 'Kunjungan', 'Admin Ekky mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 11:54:08', '2026-05-27 11:54:08'),
(361, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 11:54:12', '2026-05-27 11:54:12'),
(362, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 11:54:13', '2026-05-27 11:54:13'),
(363, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 11:54:19', '2026-05-27 11:54:19'),
(364, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 11:54:19', '2026-05-27 11:54:19'),
(365, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:13:36', '2026-05-27 12:13:36'),
(366, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:13:36', '2026-05-27 12:13:36'),
(367, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:13:59', '2026-05-27 12:13:59'),
(368, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:14:00', '2026-05-27 12:14:00'),
(369, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:14:05', '2026-05-27 12:14:05'),
(370, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:14:51', '2026-05-27 12:14:51'),
(371, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:14:52', '2026-05-27 12:14:52'),
(372, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:15:48', '2026-05-27 12:15:48'),
(373, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:15:52', '2026-05-27 12:15:52'),
(374, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:15:52', '2026-05-27 12:15:52'),
(375, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:15:59', '2026-05-27 12:15:59'),
(376, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:15:59', '2026-05-27 12:15:59'),
(377, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Bunga Sabrinaaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:16:26', '2026-05-27 12:16:26'),
(378, 2, 'Update Transaksi', 'Mengubah transaksi #62 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:16:29', '2026-05-27 12:16:29'),
(379, 2, 'Update Transaksi', 'Mengubah transaksi #62 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:16:32', '2026-05-27 12:16:32'),
(380, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Bunga Sabrinaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:24:22', '2026-05-27 12:24:22'),
(381, 2, 'Update Transaksi', 'Mengubah transaksi #63 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:24:25', '2026-05-27 12:24:25'),
(382, 2, 'Update Transaksi', 'Mengubah transaksi #63 (Status: selesai)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:24:27', '2026-05-27 12:24:27'),
(383, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:24:30', '2026-05-27 12:24:30'),
(384, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:24:31', '2026-05-27 12:24:31'),
(385, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:24:41', '2026-05-27 12:24:41'),
(386, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:24:41', '2026-05-27 12:24:41'),
(387, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:27:08', '2026-05-27 12:27:08'),
(388, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:27:08', '2026-05-27 12:27:08'),
(389, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:36:37', '2026-05-27 12:36:37'),
(390, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:36:37', '2026-05-27 12:36:37'),
(391, 2, 'Update Transaksi', 'Mengubah transaksi #62 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:37:15', '2026-05-27 12:37:15'),
(392, 2, 'Update Transaksi', 'Mengubah transaksi #62 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:37:23', '2026-05-27 12:37:23'),
(393, 2, 'Update Transaksi', 'Mengubah transaksi #62 (Status: dikerjakan)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:37:25', '2026-05-27 12:37:25'),
(394, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Bunga Sabrinaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 12:39:16', '2026-05-27 12:39:16'),
(395, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 14:41:01', '2026-05-27 14:41:01'),
(396, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 14:41:19', '2026-05-27 14:41:19'),
(397, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 14:41:19', '2026-05-27 14:41:19'),
(398, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 15:03:01', '2026-05-27 15:03:01'),
(399, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 15:03:01', '2026-05-27 15:03:01'),
(400, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 15:03:07', '2026-05-27 15:03:07'),
(401, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 15:03:07', '2026-05-27 15:03:07'),
(402, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-27 15:03:09', '2026-05-27 15:03:09'),
(403, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:21:37', '2026-05-28 15:21:37'),
(404, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:21:50', '2026-05-28 15:21:50'),
(405, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:21:50', '2026-05-28 15:21:50'),
(406, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:25:26', '2026-05-28 15:25:26'),
(407, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:25:27', '2026-05-28 15:25:27'),
(408, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:25:36', '2026-05-28 15:25:36'),
(409, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:25:36', '2026-05-28 15:25:36'),
(410, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:30:31', '2026-05-28 15:30:31'),
(411, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:30:31', '2026-05-28 15:30:31'),
(412, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:30:43', '2026-05-28 15:30:43'),
(413, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:30:43', '2026-05-28 15:30:43'),
(414, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:30:46', '2026-05-28 15:30:46'),
(415, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:31:54', '2026-05-28 15:31:54'),
(416, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:31:57', '2026-05-28 15:31:57'),
(417, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:31:58', '2026-05-28 15:31:58'),
(418, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:32:04', '2026-05-28 15:32:04'),
(419, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:32:05', '2026-05-28 15:32:05'),
(420, 2, 'Update Transaksi', 'Mengubah transaksi #65 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:34:33', '2026-05-28 15:34:33'),
(421, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:37:18', '2026-05-28 15:37:18'),
(422, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:37:18', '2026-05-28 15:37:18'),
(423, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:37:34', '2026-05-28 15:37:34'),
(424, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:37:34', '2026-05-28 15:37:34'),
(425, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:38:22', '2026-05-28 15:38:22'),
(426, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:38:23', '2026-05-28 15:38:23'),
(427, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:39:50', '2026-05-28 15:39:50'),
(428, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:40:11', '2026-05-28 15:40:11'),
(429, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:41:10', '2026-05-28 15:41:10'),
(430, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:41:11', '2026-05-28 15:41:11');
INSERT INTO `activity_logs` (`id`, `user_id`, `activity`, `description`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(431, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:47:29', '2026-05-28 15:47:29'),
(432, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:47:29', '2026-05-28 15:47:29'),
(433, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:52:27', '2026-05-28 15:52:27'),
(434, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:52:27', '2026-05-28 15:52:27'),
(435, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:52:35', '2026-05-28 15:52:35'),
(436, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:52:35', '2026-05-28 15:52:35'),
(437, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:53:24', '2026-05-28 15:53:24'),
(438, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:53:28', '2026-05-28 15:53:28'),
(439, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:53:34', '2026-05-28 15:53:34'),
(440, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:55:45', '2026-05-28 15:55:45'),
(441, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-28 15:55:45', '2026-05-28 15:55:45'),
(442, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 15:37:08', '2026-05-29 15:37:08'),
(443, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 15:37:16', '2026-05-29 15:37:16'),
(444, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 15:37:17', '2026-05-29 15:37:17'),
(445, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 16:44:45', '2026-05-29 16:44:45'),
(446, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 16:58:54', '2026-05-29 16:58:54'),
(447, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 16:59:05', '2026-05-29 16:59:05'),
(448, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 16:59:15', '2026-05-29 16:59:15'),
(449, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 16:59:26', '2026-05-29 16:59:26'),
(450, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 16:59:37', '2026-05-29 16:59:37'),
(451, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 16:59:48', '2026-05-29 16:59:48'),
(452, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 16:59:58', '2026-05-29 16:59:58'),
(453, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:00:09', '2026-05-29 17:00:09'),
(454, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:00:20', '2026-05-29 17:00:20'),
(455, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:00:30', '2026-05-29 17:00:30'),
(456, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:00:41', '2026-05-29 17:00:41'),
(457, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:00:52', '2026-05-29 17:00:52'),
(458, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:01:02', '2026-05-29 17:01:02'),
(459, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:01:13', '2026-05-29 17:01:13'),
(460, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:01:24', '2026-05-29 17:01:24'),
(461, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:01:34', '2026-05-29 17:01:34'),
(462, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:01:45', '2026-05-29 17:01:45'),
(463, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:01:56', '2026-05-29 17:01:56'),
(464, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:02:06', '2026-05-29 17:02:06'),
(465, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:02:17', '2026-05-29 17:02:17'),
(466, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:02:28', '2026-05-29 17:02:28'),
(467, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:02:40', '2026-05-29 17:02:40'),
(468, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:05:04', '2026-05-29 17:05:04'),
(469, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:05:11', '2026-05-29 17:05:11'),
(470, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:05:12', '2026-05-29 17:05:12'),
(471, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:05:44', '2026-05-29 17:05:44'),
(472, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:10:41', '2026-05-29 17:10:41'),
(473, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:10:41', '2026-05-29 17:10:41'),
(474, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:16:25', '2026-05-29 17:16:25'),
(475, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:16:36', '2026-05-29 17:16:36'),
(476, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:16:36', '2026-05-29 17:16:36'),
(477, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:31:18', '2026-05-29 17:31:18'),
(478, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:31:18', '2026-05-29 17:31:18'),
(479, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:34:39', '2026-05-29 17:34:39'),
(480, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:34:45', '2026-05-29 17:34:45'),
(481, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:34:46', '2026-05-29 17:34:46'),
(482, 2, 'Kunjungan', 'Admin Ekky membuka Log Aktivitas', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:34:48', '2026-05-29 17:34:48'),
(483, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:35:25', '2026-05-29 17:35:25'),
(484, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:35:25', '2026-05-29 17:35:25'),
(485, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:36:18', '2026-05-29 17:36:18'),
(486, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:36:26', '2026-05-29 17:36:26'),
(487, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-05-29 17:36:26', '2026-05-29 17:36:26'),
(488, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 15:27:38', '2026-06-01 15:27:38'),
(489, NULL, 'Kunjungan', 'Guest mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 15:27:47', '2026-06-01 15:27:47'),
(490, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 15:27:58', '2026-06-01 15:27:58'),
(491, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 15:27:59', '2026-06-01 15:27:59'),
(492, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 15:28:02', '2026-06-01 15:28:02'),
(493, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 15:28:47', '2026-06-01 15:28:47'),
(494, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:09:51', '2026-06-01 16:09:51'),
(495, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:10:07', '2026-06-01 16:10:07'),
(496, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:10:14', '2026-06-01 16:10:14'),
(497, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:10:14', '2026-06-01 16:10:14'),
(498, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:10:57', '2026-06-01 16:10:57'),
(499, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:11:04', '2026-06-01 16:11:04'),
(500, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:11:05', '2026-06-01 16:11:05'),
(501, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:13:12', '2026-06-01 16:13:12'),
(502, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:13:12', '2026-06-01 16:13:12'),
(503, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:13:24', '2026-06-01 16:13:24'),
(504, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:13:24', '2026-06-01 16:13:24'),
(505, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:14:33', '2026-06-01 16:14:33'),
(506, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:14:37', '2026-06-01 16:14:37'),
(507, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:14:38', '2026-06-01 16:14:38'),
(508, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:14:45', '2026-06-01 16:14:45'),
(509, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:14:45', '2026-06-01 16:14:45'),
(510, 2, 'Update Transaksi', 'Mengubah transaksi #66 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:16:47', '2026-06-01 16:16:47'),
(511, 2, 'Update Transaksi', 'Mengubah transaksi #66 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:21:24', '2026-06-01 16:21:24'),
(512, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Diva Inzyra Praba Saraswati', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:22:53', '2026-06-01 16:22:53'),
(513, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Bunga Sabrinaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:34:55', '2026-06-01 16:34:55'),
(514, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:35:38', '2026-06-01 16:35:38'),
(515, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:35:38', '2026-06-01 16:35:38'),
(516, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:35:48', '2026-06-01 16:35:48'),
(517, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:35:48', '2026-06-01 16:35:48'),
(518, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:35:52', '2026-06-01 16:35:52'),
(519, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:35:55', '2026-06-01 16:35:55'),
(520, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:37:03', '2026-06-01 16:37:03'),
(521, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:37:06', '2026-06-01 16:37:06'),
(522, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:37:06', '2026-06-01 16:37:06'),
(523, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:37:14', '2026-06-01 16:37:14'),
(524, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:37:14', '2026-06-01 16:37:14'),
(525, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-02 05:39:18', '2026-06-02 05:39:18'),
(526, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-02 05:39:18', '2026-06-02 05:39:18'),
(527, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-02 05:39:49', '2026-06-02 05:39:49'),
(528, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-02 05:39:49', '2026-06-02 05:39:49'),
(529, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-02 01:45:14', '2026-06-02 01:45:14'),
(530, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-02 01:45:14', '2026-06-02 01:45:14'),
(531, 2, 'Update Transaksi', 'Mengubah transaksi #66 (Status: dikerjakan)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-02 01:45:35', '2026-06-02 01:45:35'),
(532, 2, 'Update Transaksi', 'Mengubah transaksi #66 (Status: dikerjakan)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-02 01:45:40', '2026-06-02 01:45:40'),
(533, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-02 01:46:29', '2026-06-02 01:46:29'),
(534, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-02 01:46:30', '2026-06-02 01:46:30'),
(535, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:46:51', '2026-06-01 16:46:51'),
(536, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:47:25', '2026-06-01 16:47:25'),
(537, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:47:25', '2026-06-01 16:47:25'),
(538, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:48:56', '2026-06-01 16:48:56'),
(539, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:49:12', '2026-06-01 16:49:12'),
(540, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:49:12', '2026-06-01 16:49:12'),
(541, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:50:12', '2026-06-01 16:50:12'),
(542, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:54:42', '2026-06-01 16:54:42'),
(543, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:54:43', '2026-06-01 16:54:43'),
(544, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:54:54', '2026-06-01 16:54:54'),
(545, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 16:54:54', '2026-06-01 16:54:54'),
(546, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 17:10:13', '2026-06-01 17:10:13'),
(547, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-01 17:10:13', '2026-06-01 17:10:13'),
(548, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:09:01', '2026-06-03 15:09:01'),
(549, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:09:13', '2026-06-03 15:09:13'),
(550, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:09:13', '2026-06-03 15:09:13'),
(551, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:09:40', '2026-06-03 15:09:40'),
(552, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:09:43', '2026-06-03 15:09:43'),
(553, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:09:43', '2026-06-03 15:09:43'),
(554, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:09:56', '2026-06-03 15:09:56'),
(555, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:09:56', '2026-06-03 15:09:56'),
(556, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Bunga Sabrinaa', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:10:56', '2026-06-03 15:10:56'),
(557, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Diva Inzyra Praba Saraswati', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:13:02', '2026-06-03 15:13:02'),
(558, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Bunga Sabrina', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:13:24', '2026-06-03 15:13:24'),
(559, 2, 'Update Transaksi', 'Mengubah transaksi #73 (Status: dikerjakan)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:14:00', '2026-06-03 15:14:00'),
(560, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:14:38', '2026-06-03 15:14:38'),
(561, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:14:38', '2026-06-03 15:14:38'),
(562, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:15:25', '2026-06-03 15:15:25'),
(563, 26, 'Logout', 'User Bunga Arini keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:15:28', '2026-06-03 15:15:28'),
(564, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:15:28', '2026-06-03 15:15:28'),
(565, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:15:34', '2026-06-03 15:15:34'),
(566, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:15:35', '2026-06-03 15:15:35'),
(567, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Bunga Arini', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:16:35', '2026-06-03 15:16:35'),
(568, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:17:07', '2026-06-03 15:17:07'),
(569, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:17:08', '2026-06-03 15:17:08'),
(570, 26, 'Login', 'User Bunga Arini masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:17:19', '2026-06-03 15:17:19'),
(571, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:17:19', '2026-06-03 15:17:19'),
(572, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:17:22', '2026-06-03 15:17:22'),
(573, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:17:27', '2026-06-03 15:17:27'),
(574, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:26:25', '2026-06-03 15:26:25'),
(575, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:26:48', '2026-06-03 15:26:48'),
(576, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:27:08', '2026-06-03 15:27:08'),
(577, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:27:51', '2026-06-03 15:27:51'),
(578, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:28:05', '2026-06-03 15:28:05'),
(579, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-06-03 15:29:02', '2026-06-03 15:29:02'),
(580, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-06-03 15:29:19', '2026-06-03 15:29:19'),
(581, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.0 Mobile/15E148 Safari/604.1', '2026-06-03 15:29:42', '2026-06-03 15:29:42'),
(582, 26, 'Kunjungan', 'Bunga Arini mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:30:48', '2026-06-03 15:30:48'),
(583, 26, 'Logout', 'User Bunga Arini keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:30:52', '2026-06-03 15:30:52'),
(584, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:30:52', '2026-06-03 15:30:52'),
(585, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:30:59', '2026-06-03 15:30:59'),
(586, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:30:59', '2026-06-03 15:30:59'),
(587, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Baraja Putra', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:33:08', '2026-06-03 15:33:08'),
(588, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:33:35', '2026-06-03 15:33:35'),
(589, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:33:36', '2026-06-03 15:33:36'),
(590, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:33:44', '2026-06-03 15:33:44'),
(591, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:33:44', '2026-06-03 15:33:44'),
(592, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:33:57', '2026-06-03 15:33:57'),
(593, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:33:58', '2026-06-03 15:33:58'),
(594, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:33:58', '2026-06-03 15:33:58'),
(595, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:34:14', '2026-06-03 15:34:14'),
(596, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:34:25', '2026-06-03 15:34:25'),
(597, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:34:25', '2026-06-03 15:34:25'),
(598, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:34:34', '2026-06-03 15:34:34'),
(599, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:34:34', '2026-06-03 15:34:34'),
(600, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:35:44', '2026-06-03 15:35:44'),
(601, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:35:44', '2026-06-03 15:35:44'),
(602, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:35:54', '2026-06-03 15:35:54'),
(603, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:35:54', '2026-06-03 15:35:54'),
(604, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:37:58', '2026-06-03 15:37:58'),
(605, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:38:58', '2026-06-03 15:38:58'),
(606, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:39:11', '2026-06-03 15:39:11'),
(607, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:40:34', '2026-06-03 15:40:34'),
(608, 9, 'Logout', 'User Bunga Sabrinaa keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:41:00', '2026-06-03 15:41:00'),
(609, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-03 15:41:00', '2026-06-03 15:41:00'),
(610, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 14:29:32', '2026-06-04 14:29:32'),
(611, 9, 'Login', 'User Bunga Sabrinaa masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 14:29:46', '2026-06-04 14:29:46'),
(612, 9, 'Kunjungan', 'Bunga Sabrinaa mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 14:29:47', '2026-06-04 14:29:47'),
(613, 9, 'Kunjungan', 'Bunga Sabrinaa A mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 14:48:49', '2026-06-04 14:48:49'),
(614, 9, 'Logout', 'User Bunga Sabrinaa A keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 14:48:55', '2026-06-04 14:48:55'),
(615, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 14:48:56', '2026-06-04 14:48:56'),
(616, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 14:49:08', '2026-06-04 14:49:08'),
(617, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 14:49:08', '2026-06-04 14:49:08'),
(618, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 14:49:24', '2026-06-04 14:49:24'),
(619, 2, 'Kunjungan', 'Admin Ekky mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 15:07:20', '2026-06-04 15:07:20'),
(620, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 15:07:27', '2026-06-04 15:07:27'),
(621, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 15:07:27', '2026-06-04 15:07:27'),
(622, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 15:07:35', '2026-06-04 15:07:35'),
(623, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 15:07:35', '2026-06-04 15:07:35'),
(624, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Baraja Putra', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 15:29:18', '2026-06-04 15:29:18'),
(625, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 15:30:09', '2026-06-04 15:30:09'),
(626, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 15:30:10', '2026-06-04 15:30:10'),
(627, NULL, 'Kunjungan', 'Guest mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', '2026-06-04 15:30:15', '2026-06-04 15:30:15'),
(628, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-06 14:58:56', '2026-06-06 14:58:56'),
(629, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-06 14:59:02', '2026-06-06 14:59:02'),
(630, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-06 14:59:03', '2026-06-06 14:59:03'),
(631, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Diva Inzyra Praba Saraswati', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-06 15:00:52', '2026-06-06 15:00:52'),
(632, 2, 'Tambah Transaksi', 'Menambah transaksi baru untuk Bunga Sabrinaa A', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-06 15:01:33', '2026-06-06 15:01:33'),
(633, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:38:10', '2026-06-07 06:38:10'),
(634, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:43:36', '2026-06-07 06:43:36'),
(635, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:45:33', '2026-06-07 06:45:33'),
(636, 6, 'Login', 'User Bunga Sabrina masuk menggunakan Google', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:45:53', '2026-06-07 06:45:53'),
(637, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:45:53', '2026-06-07 06:45:53'),
(638, 6, 'Logout', 'User Bunga Sabrina keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:46:08', '2026-06-07 06:46:08'),
(639, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:46:08', '2026-06-07 06:46:08'),
(640, 27, 'Login', 'User Barajapu masuk menggunakan Google', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:46:49', '2026-06-07 06:46:49'),
(641, 27, 'Kunjungan', 'Barajapu mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:46:49', '2026-06-07 06:46:49');
INSERT INTO `activity_logs` (`id`, `user_id`, `activity`, `description`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(642, 6, 'Login', 'User Bunga Sabrina masuk menggunakan Google', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:51:36', '2026-06-07 06:51:36'),
(643, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:51:36', '2026-06-07 06:51:36'),
(644, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:57:04', '2026-06-07 06:57:04'),
(645, 6, 'Logout', 'User Bunga Sabrina keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:57:40', '2026-06-07 06:57:40'),
(646, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:57:40', '2026-06-07 06:57:40'),
(647, 6, 'Login', 'User Bunga Sabrina masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:58:58', '2026-06-07 06:58:58'),
(648, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:58:58', '2026-06-07 06:58:58'),
(649, 27, 'Logout', 'User Barajapu keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:59:48', '2026-06-07 06:59:48'),
(650, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 06:59:48', '2026-06-07 06:59:48'),
(651, 27, 'Login', 'User Barajapu masuk menggunakan Google', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 07:00:04', '2026-06-07 07:00:04'),
(652, 27, 'Kunjungan', 'Barajapu mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 07:00:05', '2026-06-07 07:00:05'),
(653, 27, 'Logout', 'User Barajapu keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 07:00:15', '2026-06-07 07:00:15'),
(654, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-07 07:00:15', '2026-06-07 07:00:15'),
(655, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:17:20', '2026-06-10 16:17:20'),
(656, NULL, 'Kunjungan', 'Guest mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:17:35', '2026-06-10 16:17:35'),
(657, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:17:40', '2026-06-10 16:17:40'),
(658, NULL, 'Kunjungan', 'Guest mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:18:00', '2026-06-10 16:18:00'),
(659, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:18:50', '2026-06-10 16:18:50'),
(660, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:28:18', '2026-06-10 16:28:18'),
(661, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:28:22', '2026-06-10 16:28:22'),
(662, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:28:33', '2026-06-10 16:28:33'),
(663, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:28:34', '2026-06-10 16:28:34'),
(664, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:28:59', '2026-06-10 16:28:59'),
(665, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:29:00', '2026-06-10 16:29:00'),
(666, 6, 'Login', 'User Bunga Sabrina masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:29:13', '2026-06-10 16:29:13'),
(667, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:29:14', '2026-06-10 16:29:14'),
(668, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:29:36', '2026-06-10 16:29:36'),
(669, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:29:39', '2026-06-10 16:29:39'),
(670, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:30:28', '2026-06-10 16:30:28'),
(671, 6, 'Logout', 'User Bunga Sabrina keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:30:33', '2026-06-10 16:30:33'),
(672, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:30:33', '2026-06-10 16:30:33'),
(673, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:30:41', '2026-06-10 16:30:41'),
(674, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:30:41', '2026-06-10 16:30:41'),
(675, 2, 'Update Transaksi', 'Mengubah transaksi #81 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:31:59', '2026-06-10 16:31:59'),
(676, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:45:13', '2026-06-10 16:45:13'),
(677, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:45:13', '2026-06-10 16:45:13'),
(678, 9, 'Login', 'User Bunga Sabrinaa A masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:45:25', '2026-06-10 16:45:25'),
(679, 9, 'Kunjungan', 'Bunga Sabrinaa A mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:45:25', '2026-06-10 16:45:25'),
(680, 9, 'Logout', 'User Bunga Sabrinaa A keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:45:36', '2026-06-10 16:45:36'),
(681, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:45:36', '2026-06-10 16:45:36'),
(682, 6, 'Login', 'User Bunga Sabrina masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:45:45', '2026-06-10 16:45:45'),
(683, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:45:45', '2026-06-10 16:45:45'),
(684, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:45:55', '2026-06-10 16:45:55'),
(685, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:47:08', '2026-06-10 16:47:08'),
(686, 6, 'Logout', 'User Bunga Sabrina keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:47:12', '2026-06-10 16:47:12'),
(687, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:47:12', '2026-06-10 16:47:12'),
(688, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:47:18', '2026-06-10 16:47:18'),
(689, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:47:18', '2026-06-10 16:47:18'),
(690, 2, 'Update Transaksi', 'Mengubah transaksi #82 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:48:24', '2026-06-10 16:48:24'),
(691, 2, 'Update Transaksi', 'Mengubah transaksi #82 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:48:33', '2026-06-10 16:48:33'),
(692, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 16:48:40', '2026-06-10 16:48:40'),
(693, 2, 'Kunjungan', 'Admin Ekky mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 17:23:02', '2026-06-10 17:23:02'),
(694, 2, 'Kunjungan', 'Admin Ekky mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 17:23:14', '2026-06-10 17:23:14'),
(695, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 17:23:17', '2026-06-10 17:23:17'),
(696, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 17:23:17', '2026-06-10 17:23:17'),
(697, NULL, 'Kunjungan', 'Guest mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 17:23:22', '2026-06-10 17:23:22'),
(698, NULL, 'Kunjungan', 'Guest mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 17:23:36', '2026-06-10 17:23:36'),
(699, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-10 17:23:39', '2026-06-10 17:23:39'),
(700, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-11 12:51:34', '2026-06-11 12:51:34'),
(701, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 14:57:07', '2026-06-12 14:57:07'),
(702, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:06:05', '2026-06-12 15:06:05'),
(703, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:07:28', '2026-06-12 15:07:28'),
(704, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:07:28', '2026-06-12 15:07:28'),
(705, 2, 'Update Transaksi', 'Mengubah transaksi #83 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:08:15', '2026-06-12 15:08:15'),
(706, 2, 'Update Transaksi', 'Mengubah transaksi #84 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:08:17', '2026-06-12 15:08:17'),
(707, 2, 'Update Transaksi', 'Mengubah transaksi #85 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:08:19', '2026-06-12 15:08:19'),
(708, 2, 'Update Transaksi', 'Mengubah transaksi #86 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:08:22', '2026-06-12 15:08:22'),
(709, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:08:40', '2026-06-12 15:08:40'),
(710, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:08:40', '2026-06-12 15:08:40'),
(711, 6, 'Login', 'User Bunga Sabrina masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:08:55', '2026-06-12 15:08:55'),
(712, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:08:55', '2026-06-12 15:08:55'),
(713, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Layanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:09:17', '2026-06-12 15:09:17'),
(714, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:09:19', '2026-06-12 15:09:19'),
(715, 6, 'Kunjungan', 'Bunga Sabrina mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:10:08', '2026-06-12 15:10:08'),
(716, 6, 'Logout', 'User Bunga Sabrina keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:10:12', '2026-06-12 15:10:12'),
(717, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:10:13', '2026-06-12 15:10:13'),
(718, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:10:19', '2026-06-12 15:10:19'),
(719, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:10:19', '2026-06-12 15:10:19'),
(720, 2, 'Update Transaksi', 'Mengubah transaksi #84 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:10:30', '2026-06-12 15:10:30'),
(721, 2, 'Update Transaksi', 'Mengubah transaksi #85 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:10:38', '2026-06-12 15:10:38'),
(722, 2, 'Update Transaksi', 'Mengubah transaksi #86 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:12:17', '2026-06-12 15:12:17'),
(723, 2, 'Update Transaksi', 'Mengubah transaksi #83 (Status: pending)', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:14:40', '2026-06-12 15:14:40'),
(724, 2, 'Logout', 'User Admin Ekky keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:14:50', '2026-06-12 15:14:50'),
(725, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:14:50', '2026-06-12 15:14:50'),
(726, 9, 'Login', 'User Bunga Sabrinaa A masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:15:04', '2026-06-12 15:15:04'),
(727, 9, 'Kunjungan', 'Bunga Sabrinaa A mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:15:04', '2026-06-12 15:15:04'),
(728, 9, 'Kunjungan', 'Bunga Sabrinaa A mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:15:08', '2026-06-12 15:15:08'),
(729, 9, 'Kunjungan', 'Bunga Sabrinaa A mengunjungi halaman Pemesanan', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:16:14', '2026-06-12 15:16:14'),
(730, 9, 'Logout', 'User Bunga Sabrinaa A keluar dari sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:16:35', '2026-06-12 15:16:35'),
(731, NULL, 'Kunjungan', 'Guest mengunjungi halaman Beranda', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:16:35', '2026-06-12 15:16:35'),
(732, 2, 'Login', 'User Admin Ekky masuk ke sistem', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:16:44', '2026-06-12 15:16:44'),
(733, 2, 'Kunjungan', 'Admin Ekky membuka Dashboard Admin', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', '2026-06-12 15:16:44', '2026-06-12 15:16:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `umur` int DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `karyawans`
--

INSERT INTO `karyawans` (`id`, `nama`, `umur`, `jenis_kelamin`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Vanna', 20, 'P', 'aktif', '2026-05-07 06:48:59', '2026-05-07 06:48:59'),
(6, 'Niken', 20, 'P', 'aktif', '2026-05-07 13:52:18', '2026-05-07 13:52:18'),
(7, 'Mei', 35, 'P', 'aktif', '2026-05-07 13:52:18', '2026-05-07 13:52:18'),
(8, 'Iis', 35, 'P', 'aktif', '2026-05-07 13:52:18', '2026-05-07 13:52:18'),
(9, 'Doni', 25, 'L', 'aktif', '2026-05-07 13:52:18', '2026-05-07 13:52:18'),
(10, 'Fajar', 30, 'L', 'aktif', '2026-05-07 13:52:18', '2026-05-07 13:52:18'),
(11, 'Guntur', 20, 'L', 'aktif', '2026-05-07 13:52:18', '2026-05-07 13:52:18'),
(12, 'Bayu', 23, 'L', 'aktif', '2026-05-07 13:52:18', '2026-05-07 13:52:18'),
(13, 'Udin', 22, 'L', 'aktif', '2026-05-15 09:06:39', '2026-05-15 09:06:47'),
(14, 'Mamat', 23, 'L', 'nonaktif', '2026-05-16 05:01:35', '2026-05-16 05:01:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanans`
--

CREATE TABLE `layanans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `layanans`
--

INSERT INTO `layanans` (`id`, `nama`, `deskripsi`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Full Body Reflexyologi & Massage (60 menit)', 'Perawatan pijat seluruh tubuh yang dikombinasikan dengan teknik refleksiologi pada titik-titik tertentu untuk membantu melancarkan peredaran darah, mengurangi pegal-pegal, serta memberikan efek relaksasi dalam durasi 60 menit.', 80000.00, 'assets/img/service_1.jpg', '2026-04-30 18:41:20', '2026-04-30 18:41:20'),
(2, 'Full Body Reflexyologi & Massage (90 menit)', 'Layanan pijat seluruh tubuh dengan tambahan teknik refleksiologi yang dilakukan lebih lama selama 90 menit, sehingga membantu meredakan stres, mengurangi ketegangan otot, dan memberikan relaksasi yang lebih maksimal.', 120000.00, 'assets/img/service_2.jpg', '2026-04-30 18:41:20', '2026-04-30 18:41:20'),
(3, 'Full Body Massage + Totok Wajah', 'Perawatan pijat seluruh tubuh yang dikombinasikan dengan terapi totok wajah, yaitu teknik penekanan pada titik-titik tertentu di wajah untuk melancarkan sirkulasi darah, membantu meremajakan kulit, dan membuat wajah terasa lebih segar.', 110000.00, 'assets/img/service_3.webp', '2026-04-30 18:41:20', '2026-04-30 18:41:20'),
(4, 'Full Body Massage + Lulur/Scrub', 'Layanan pijat seluruh tubuh yang dilengkapi dengan perawatan lulur atau scrub untuk membantu mengangkat sel kulit mati, membersihkan pori-pori, serta membuat kulit terasa lebih halus, bersih, dan cerah.', 130000.00, 'assets/img/service_4.jpg', '2026-04-30 18:41:20', '2026-04-30 18:41:20'),
(5, 'Full Body Massage + Totok Wajah + Scrub', 'Paket perawatan lengkap yang menggabungkan pijat seluruh tubuh, terapi totok wajah, dan lulur atau scrub, sehingga memberikan manfaat relaksasi sekaligus perawatan kulit secara menyeluruh.', 140000.00, 'assets/img/service_5.jpeg', '2026-04-30 18:41:20', '2026-04-30 18:41:20'),
(6, 'Head Shoulder Massage', 'Pijat yang difokuskan pada area kepala, leher, dan bahu untuk membantu mengurangi ketegangan otot, meredakan sakit kepala, serta memberikan rasa nyaman dan relaksasi.', 40000.00, 'assets/img/service_6.jpeg', '2026-04-30 18:41:20', '2026-04-30 18:41:20'),
(7, 'Back Massage', 'Layanan pijat pada area punggung yang bertujuan untuk meredakan nyeri otot, mengurangi pegal-pegal akibat aktivitas sehari-hari, serta membantu memperbaiki sirkulasi darah.', 40000.00, 'assets/img/service_7.jpeg', '2026-04-30 18:41:20', '2026-04-30 18:41:20'),
(8, 'Foot Massage', 'Pijat pada area kaki dengan teknik refleksiologi yang menekan titik-titik tertentu untuk membantu melancarkan peredaran darah, mengurangi kelelahan, dan memberikan efek relaksasi.', 40000.00, 'assets/img/service_8.jpeg', '2026-04-30 18:41:20', '2026-04-30 18:41:20'),
(9, 'Lulur/Scrub Full Body', 'Perawatan lulur atau scrub seluruh tubuh yang bertujuan untuk mengangkat sel kulit mati, membersihkan kulit secara menyeluruh, serta membuat kulit terasa lebih halus, cerah, dan segar.', 50000.00, 'assets/img/service_9.jpeg', '2026-04-30 18:41:20', '2026-04-30 18:41:20'),
(10, 'Totok Wajah Tradisional', 'Teknik perawatan wajah tradisional dengan penekanan pada titik-titik tertentu untuk membantu melancarkan sirkulasi darah, menjaga kesehatan kulit wajah, serta membuat wajah tampak lebih segar.', 30000.00, 'assets/img/service_10.jpeg', '2026-04-30 18:41:20', '2026-04-30 18:41:20'),
(11, 'Kerokan', 'Terapi tradisional dengan teknik gesekan menggunakan alat khusus pada permukaan kulit untuk membantu meredakan masuk angin, pegal-pegal, dan meningkatkan rasa nyaman pada tubuh.', 20000.00, 'assets/img/service_11.jpeg', '2026-04-30 18:41:20', '2026-04-30 18:41:20'),
(12, 'Home Service Massage', 'Layanan pijat yang dilakukan langsung di rumah pelanggan, sehingga memberikan kenyamanan lebih tanpa perlu datang ke lokasi, cocok bagi pelanggan yang ingin relaksasi di tempat sendiri.', 100000.00, 'assets/img/service_12.jpeg', '2026-04-30 18:41:20', '2026-04-30 18:41:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_13_153420_create_karyawans_table', 1),
(5, '2026_04_13_155129_create_layanans_table', 1),
(6, '2026_04_25_143000_create_transaksis_table', 1),
(8, '2026_05_01_223541_add_phone_and_address_to_users_table', 2),
(9, '2026_05_01_224842_modify_karyawans_table_add_payroll_fields', 3),
(10, '2026_05_01_224904_create_absensis_table', 3),
(11, '2026_05_01_230217_remove_jabatan_from_karyawans_table', 4),
(12, '2026_05_02_141258_create_testimonis_table', 5),
(13, '2026_05_07_000000_modify_karyawans_table_simplify_fields', 6),
(14, '2026_05_07_000001_fix_jenis_kelamin_column', 7),
(15, '2026_05_07_000002_create_absensis_table', 8),
(16, '2026_05_07_144928_add_karyawan_id_to_transaksis_table', 9),
(17, '2026_05_07_145408_add_karyawan_id_to_transaksis_table', 10),
(18, '2026_05_11_153836_add_lat_lng_to_users_table', 11),
(19, '2026_05_11_161121_create_activity_logs_table', 12),
(20, '2026_05_11_235719_add_jenis_kelamin_to_users_table', 13),
(22, '2026_05_01_013453_create_penggajians_table', 14),
(23, '2026_05_24_221833_add_lat_lng_to_transaksis_table', 15),
(24, '2026_05_28_225032_add_dibatalkan_to_transaksis_status_enum', 16),
(25, '2026_05_30_000118_add_bed_id_to_transaksis_table', 17),
(26, '2026_06_07_134217_add_google_id_to_users_table', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('owner@gmail.com', '$2y$12$rRHuE4tZgYuTbTP8uy40UunyMK7fMO8vi7UIY0XBWaqx7yUo6zRk.', '2026-05-01 14:17:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajians`
--

CREATE TABLE `penggajians` (
  `id` bigint UNSIGNED NOT NULL,
  `karyawan_id` bigint UNSIGNED NOT NULL,
  `layanan_id` bigint UNSIGNED NOT NULL,
  `transaksi_id` bigint UNSIGNED NOT NULL,
  `upah_karyawan` decimal(15,2) NOT NULL,
  `pendapatan_owner` decimal(15,2) NOT NULL,
  `status_pembayaran` enum('pending','dibayar') NOT NULL DEFAULT 'pending',
  `tanggal_bayar` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `penggajians`
--

INSERT INTO `penggajians` (`id`, `karyawan_id`, `layanan_id`, `transaksi_id`, `upah_karyawan`, `pendapatan_owner`, `status_pembayaran`, `tanggal_bayar`, `created_at`, `updated_at`) VALUES
(1, 11, 5, 6, 70000.00, 70000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:05:59'),
(2, 12, 2, 10, 70000.00, 70000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:06:07'),
(3, 5, 8, 11, 30000.00, 30000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(4, 5, 5, 12, 70000.00, 70000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(5, 5, 10, 13, 15000.00, 15000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(6, 6, 12, 14, 50000.00, 50000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(7, 7, 7, 15, 20000.00, 20000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(8, 8, 2, 16, 60000.00, 60000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(9, 9, 5, 17, 70000.00, 70000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:05:46'),
(10, 9, 1, 18, 40000.00, 40000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:05:46'),
(11, 10, 1, 19, 40000.00, 40000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(12, 10, 8, 20, 20000.00, 20000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(13, 11, 1, 21, 40000.00, 40000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:05:59'),
(14, 12, 8, 22, 20000.00, 20000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:06:07'),
(15, 12, 5, 23, 70000.00, 70000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:06:07'),
(16, 5, 2, 24, 60000.00, 60000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(17, 5, 5, 25, 70000.00, 70000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(18, 6, 5, 26, 70000.00, 70000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(19, 6, 4, 27, 65000.00, 65000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(20, 7, 10, 28, 15000.00, 15000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(21, 7, 4, 29, 65000.00, 65000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(22, 8, 1, 30, 40000.00, 40000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(23, 9, 7, 31, 20000.00, 20000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:05:46'),
(24, 9, 11, 32, 10000.00, 10000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:05:46'),
(25, 10, 10, 33, 15000.00, 15000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(26, 10, 10, 34, 15000.00, 15000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(27, 11, 3, 35, 55000.00, 55000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:05:59'),
(28, 12, 11, 36, 10000.00, 10000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:06:07'),
(29, 5, 6, 39, 20000.00, 20000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(30, 6, 2, 40, 60000.00, 60000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(31, 7, 2, 41, 60000.00, 60000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(32, 8, 12, 42, 50000.00, 50000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(33, 8, 1, 43, 40000.00, 40000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(34, 9, 6, 44, 20000.00, 20000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:05:46'),
(35, 10, 1, 45, 40000.00, 40000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(36, 11, 8, 46, 20000.00, 20000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:05:59'),
(37, 11, 10, 47, 15000.00, 15000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:05:59'),
(38, 12, 10, 48, 15000.00, 15000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:06:07'),
(39, 12, 8, 49, 20000.00, 20000.00, 'dibayar', '2026-05-16', '2026-05-15 15:53:38', '2026-05-16 05:06:07'),
(40, 7, 4, 50, 75000.00, 75000.00, 'pending', NULL, '2026-05-15 15:53:38', '2026-05-15 15:53:58'),
(41, 9, 3, 63, 50000.00, 50000.00, 'pending', NULL, '2026-05-27 12:24:27', '2026-05-27 12:24:27'),
(42, 7, 5, 71, 65000.00, 65000.00, 'pending', NULL, '2026-06-03 15:33:33', '2026-06-03 15:33:33'),
(43, 6, 2, 72, 55000.00, 55000.00, 'pending', NULL, '2026-06-06 15:01:04', '2026-06-06 15:01:04'),
(44, 8, 5, 74, 65000.00, 65000.00, 'pending', NULL, '2026-06-06 15:01:06', '2026-06-06 15:01:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NHU7tk72kpvcp0euAh7WJ1acPRQOoEIgJB6rcv7Y', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZGRkUVNLUDhSNlA3dXJ5eXZEbjljbkdYM2RkOEVKd3NwWW5VTlNoSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9vd25lci9sYXBvcmFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1781182622),
('ts2dapkLd0rAzcKaKYQtt8wdTIDvRDilBB8buHBa', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRkVTNFl6ckJGeGtmd0RCTHZTVHVDQWRqVHZOVHF1ZzFsbzdWVHNjTSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMSI7fX0=', 1781112220),
('ZBtCmluP4b2LmEZI92T3c5csDSrmOZyJxYQkNsZc', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVVoyTlhab2RNS1ltNG95M0xMWklSZFl1WXBSN2txYXZnR1p3aUhSNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9hZG1pbi9wZXNhbmFuP2RhdGU9MjAyNi0wNi0xMyI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9wZW1lc2FuYW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1781277431);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `transaksi_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `pesan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `testimonis`
--

INSERT INTO `testimonis` (`id`, `user_id`, `transaksi_id`, `rating`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 5, 6, 5, 'Mantap', '2026-05-02 07:25:48', '2026-05-02 07:25:48'),
(2, 6, 10, 5, 'Pelayanannys Sangat Baik dan Terapisnya sangat ramah , recomendeddd banget', '2026-05-02 07:23:27', '2026-05-02 07:23:27'),
(3, 6, 9, 5, 'terbaik', '2026-05-15 08:57:19', '2026-05-15 08:57:19'),
(4, 6, 52, 4, 'puas banget treatment disini', '2026-05-15 16:06:27', '2026-05-15 16:06:27'),
(5, 6, 50, 5, 'pelayanannya baikk, karyawan ramah', '2026-05-15 16:06:50', '2026-05-15 16:06:50'),
(6, 9, 53, 5, 'pelayanannya memuaskan', '2026-05-24 12:41:53', '2026-05-24 12:41:53'),
(7, 9, 55, 5, 'puas sama pelayanannya', '2026-05-27 12:14:22', '2026-05-27 12:14:22'),
(8, 9, 60, 5, 'puas sama pelayanannya', '2026-05-27 12:14:28', '2026-05-27 12:14:28'),
(9, 9, 58, 5, 'puas sama pelayanannya', '2026-05-27 12:14:34', '2026-05-27 12:14:34'),
(10, 9, 59, 5, 'puas sama pelayanannya', '2026-05-27 12:14:39', '2026-05-27 12:14:39'),
(11, 9, 57, 5, 'puas sama pelayanannya', '2026-05-27 12:14:44', '2026-05-27 12:14:44'),
(12, 9, 56, 5, 'puas sama pelayanannya', '2026-05-27 12:14:49', '2026-05-27 12:14:49'),
(13, 9, 63, 5, 'puas sama pelayanannya', '2026-05-27 12:27:02', '2026-05-27 12:27:02'),
(14, 9, 64, 5, 'pelayanannya puas', '2026-05-27 15:02:56', '2026-05-27 15:02:56'),
(15, 9, 8, 5, 'Pelayanannya puas', '2026-05-28 15:47:49', '2026-05-28 15:47:49'),
(16, 9, 65, 5, 'goksssssssssssssssssss', '2026-06-01 15:28:14', '2026-06-01 15:28:14'),
(17, 9, 61, 5, 'mantappp', '2026-06-01 15:28:28', '2026-06-01 15:28:28'),
(18, 9, 69, 5, 'Pelayanan sangat memuaskan, terapis profesional.', '2026-06-01 16:54:25', '2026-06-01 16:54:25'),
(19, 9, 70, 5, 'Badan jadi segar kembali, sangat direkomendasikan!', '2026-06-01 16:54:32', '2026-06-01 16:54:32'),
(20, 9, 67, 5, 'Terapis ramah dan sangat ahli di bidangnya.', '2026-06-03 15:09:29', '2026-06-03 15:09:29'),
(21, 9, 66, 5, 'Badan jadi segar kembali, sangat direkomendasikan!', '2026-06-03 15:09:35', '2026-06-03 15:09:35'),
(22, 9, 71, 5, 'Pelayanan sangat memuaskan, terapis profesional.', '2026-06-03 15:33:54', '2026-06-03 15:33:54'),
(23, 6, 73, 5, 'Badan jadi segar kembali, sangat direkomendasikan!', '2026-06-10 16:29:27', '2026-06-10 16:29:27'),
(24, 6, 80, 5, 'Terapis ramah dan sangat ahli di bidangnya. Badan jadi segar kembali, sangat direkomendasikan!', '2026-06-10 16:29:33', '2026-06-10 16:29:33'),
(25, 9, 77, 5, 'Badan jadi segar kembali, sangat direkomendasikan!', '2026-06-10 16:45:33', '2026-06-10 16:45:33'),
(26, 6, 81, 5, 'Badan jadi segar kembali, sangat direkomendasikan!', '2026-06-12 15:09:05', '2026-06-12 15:09:05'),
(27, 6, 82, 5, 'Terapis ramah dan sangat ahli di bidangnya.', '2026-06-12 15:09:12', '2026-06-12 15:09:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `layanan_id` bigint UNSIGNED DEFAULT NULL,
  `lokasi` enum('tempat','rumah') NOT NULL,
  `alamat` text,
  `lat` decimal(10,8) DEFAULT NULL,
  `lng` decimal(11,8) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `catatan` text,
  `total_harga` decimal(10,2) NOT NULL,
  `status` enum('pending','dikerjakan','selesai','dibatalkan') DEFAULT 'pending',
  `status_pembayaran` enum('belum_bayar','lunas') NOT NULL DEFAULT 'belum_bayar',
  `snap_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `karyawan_id` bigint UNSIGNED DEFAULT NULL,
  `bed_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `user_id`, `nama`, `jenis_kelamin`, `telepon`, `layanan_id`, `lokasi`, `alamat`, `lat`, `lng`, `tanggal`, `jam`, `catatan`, `total_harga`, `status`, `status_pembayaran`, `snap_token`, `created_at`, `updated_at`, `karyawan_id`, `bed_id`) VALUES
(1, NULL, 'Budi Santoso', 'L', '081234567890', 1, 'tempat', NULL, NULL, NULL, '2026-05-02', '10:00:00', 'Mohon dikerjakan oleh terapis laki-laki', 80000.00, 'selesai', 'belum_bayar', NULL, '2026-04-30 18:41:20', '2026-05-11 16:51:45', NULL, NULL),
(2, NULL, 'Siti Aminah', 'P', '082198765432', 3, 'rumah', 'Jl. Merdeka No. 123, Subang', NULL, NULL, '2026-05-03', '14:00:00', 'Rumah warna hijau', 110000.00, 'selesai', 'belum_bayar', NULL, '2026-04-30 18:41:20', '2026-05-11 16:51:45', NULL, NULL),
(3, NULL, 'Agus Hermawan', 'L', '085678901234', 7, 'tempat', NULL, NULL, NULL, '2026-04-30', '16:00:00', NULL, 40000.00, 'selesai', 'lunas', NULL, '2026-04-30 18:41:20', '2026-04-30 18:41:20', NULL, NULL),
(4, NULL, 'Dewi Lestari', 'P', '087812345678', 5, 'tempat', NULL, NULL, NULL, '2026-05-01', '11:00:00', 'Ingin terapis yang sudah senior', 140000.00, 'selesai', 'lunas', NULL, '2026-04-30 18:41:20', '2026-05-11 16:51:45', NULL, NULL),
(5, NULL, 'Rizky Pratama', 'L', '081299887766', 11, 'rumah', 'Perumahan Asri Blok C4, Subang', NULL, NULL, '2026-05-04', '19:00:00', 'Sedang masuk angin parah', 20000.00, 'selesai', 'belum_bayar', NULL, '2026-04-30 18:41:20', '2026-05-11 16:51:45', NULL, NULL),
(6, 5, 'Bunga', 'P', '082315957278', 5, 'tempat', NULL, NULL, NULL, '2026-05-01', '22:02:00', NULL, 140000.00, 'selesai', 'lunas', '05ad1216-2a18-4bc3-a699-b643c1e70b10', '2026-05-01 15:01:17', '2026-05-07 08:30:41', 11, NULL),
(7, NULL, 'Baraja Putra', 'L', '082315957278', 5, 'tempat', NULL, NULL, NULL, '2026-05-09', '08:25:00', NULL, 140000.00, 'selesai', 'lunas', '07c8a54a-9941-4d39-bcba-7c9c365a87bc', '2026-05-01 15:24:32', '2026-05-07 08:30:36', NULL, NULL),
(8, 6, 'Bunga Sabrina', 'P', '089699663056', 4, 'rumah', 'seoul, south korea', NULL, NULL, '2026-05-19', '20:19:00', 'apa aja', 150000.00, 'selesai', 'belum_bayar', NULL, '2026-05-02 06:16:06', '2026-05-24 15:11:38', NULL, NULL),
(9, 6, 'Bunga Sabrina', 'P', '089699663056', 3, 'rumah', 'seoul, south korea', NULL, NULL, '2026-05-02', '23:10:00', 'apa aja', 130000.00, 'selesai', 'belum_bayar', 'b1502861-46e2-4d0d-a675-fca937509954', '2026-05-02 07:03:24', '2026-05-11 17:12:04', NULL, NULL),
(10, 6, 'Bunga Sabrina', 'P', '089699663056', 2, 'rumah', 'seoul, south korea', NULL, NULL, '2026-05-03', '12:30:00', 'apa aja', 140000.00, 'selesai', 'lunas', 'd6cc1579-77b7-4605-bcf2-ab0cbb0807e1', '2026-05-02 07:13:23', '2026-05-07 08:18:25', 12, NULL),
(11, 7, 'diva inzyra', 'P', '0888888888', 8, 'rumah', 'haurgeulis', NULL, NULL, '2026-05-15', '12:00:00', 'gaada', 60000.00, 'selesai', 'lunas', '355bcd24-a702-42d7-af08-bef893b17b1f', '2026-05-07 06:03:40', '2026-05-07 08:16:10', 5, NULL),
(12, NULL, 'Dewi 1', 'L', '081234567995', 5, 'tempat', NULL, NULL, NULL, '2026-05-11', '11:00:00', 'Seeded for testing absensi', 140000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:42', '2026-05-11 16:28:42', 5, NULL),
(13, NULL, 'Joko 1', 'P', '081234567311', 10, 'tempat', NULL, NULL, NULL, '2026-05-11', '14:00:00', 'Seeded for testing absensi', 30000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:42', '2026-05-11 16:28:42', 5, NULL),
(14, NULL, 'Joko 2', 'L', '081234567426', 12, 'tempat', NULL, NULL, NULL, '2026-05-11', '11:00:00', 'Seeded for testing absensi', 100000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:42', '2026-05-11 16:28:42', 6, NULL),
(15, NULL, 'Siti 3', 'P', '081234567748', 7, 'tempat', NULL, NULL, NULL, '2026-05-11', '15:00:00', 'Seeded for testing absensi', 40000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:42', '2026-05-11 16:28:42', 7, NULL),
(16, NULL, 'Budi 4', 'L', '081234567221', 2, 'tempat', NULL, NULL, NULL, '2026-05-11', '17:00:00', 'Seeded for testing absensi', 120000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:42', '2026-05-11 16:28:42', 8, NULL),
(17, NULL, 'Dewi 5', 'L', '081234567644', 5, 'tempat', NULL, NULL, NULL, '2026-05-11', '12:00:00', 'Seeded for testing absensi', 140000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:42', '2026-05-11 16:28:42', 9, NULL),
(18, NULL, 'Dewi 5', 'L', '081234567947', 1, 'tempat', NULL, NULL, NULL, '2026-05-11', '10:00:00', 'Seeded for testing absensi', 80000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:42', '2026-05-11 16:28:42', 9, NULL),
(19, NULL, 'Budi 6', 'L', '081234567552', 1, 'tempat', NULL, NULL, NULL, '2026-05-11', '18:00:00', 'Seeded for testing absensi', 80000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:42', '2026-05-11 16:28:42', 10, NULL),
(20, NULL, 'Dewi 6', 'L', '081234567601', 8, 'tempat', NULL, NULL, NULL, '2026-05-11', '11:00:00', 'Seeded for testing absensi', 40000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:42', '2026-05-11 16:28:42', 10, NULL),
(21, NULL, 'Dewi 7', 'L', '081234567419', 1, 'tempat', NULL, NULL, NULL, '2026-05-11', '13:00:00', 'Seeded for testing absensi', 80000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:42', '2026-05-11 16:28:42', 11, NULL),
(22, NULL, 'Agus 8', 'P', '081234567791', 8, 'tempat', NULL, NULL, NULL, '2026-05-11', '12:00:00', 'Seeded for testing absensi', 40000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:42', '2026-05-11 16:28:42', 12, NULL),
(23, NULL, 'Dewi 8', 'L', '081234567402', 5, 'tempat', NULL, NULL, NULL, '2026-05-11', '13:00:00', 'Seeded for testing absensi', 140000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:42', '2026-05-11 16:28:42', 12, NULL),
(24, NULL, 'Budi 1', 'P', '081234567865', 2, 'tempat', NULL, NULL, NULL, '2026-05-11', '16:00:00', 'Seeded for testing absensi', 120000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 5, NULL),
(25, NULL, 'Siti 1', 'P', '081234567245', 5, 'tempat', NULL, NULL, NULL, '2026-05-11', '13:00:00', 'Seeded for testing absensi', 140000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 5, NULL),
(26, NULL, 'Siti 2', 'P', '081234567601', 5, 'tempat', NULL, NULL, NULL, '2026-05-11', '17:00:00', 'Seeded for testing absensi', 140000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 6, NULL),
(27, NULL, 'Agus 2', 'L', '081234567895', 4, 'tempat', NULL, NULL, NULL, '2026-05-11', '19:00:00', 'Seeded for testing absensi', 130000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 6, NULL),
(28, NULL, 'Agus 3', 'L', '081234567801', 10, 'tempat', NULL, NULL, NULL, '2026-05-11', '10:00:00', 'Seeded for testing absensi', 30000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 7, NULL),
(29, NULL, 'Joko 3', 'P', '081234567782', 4, 'tempat', NULL, NULL, NULL, '2026-05-11', '14:00:00', 'Seeded for testing absensi', 130000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 7, NULL),
(30, NULL, 'Joko 4', 'L', '081234567354', 1, 'tempat', NULL, NULL, NULL, '2026-05-11', '19:00:00', 'Seeded for testing absensi', 80000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 8, NULL),
(31, NULL, 'Siti 5', 'L', '081234567244', 7, 'tempat', NULL, NULL, NULL, '2026-05-11', '18:00:00', 'Seeded for testing absensi', 40000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 9, NULL),
(32, NULL, 'Dewi 5', 'L', '081234567808', 11, 'tempat', NULL, NULL, NULL, '2026-05-11', '19:00:00', 'Seeded for testing absensi', 20000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 9, NULL),
(33, NULL, 'Agus 6', 'P', '081234567111', 10, 'tempat', NULL, NULL, NULL, '2026-05-11', '19:00:00', 'Seeded for testing absensi', 30000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 10, NULL),
(34, NULL, 'Budi 6', 'L', '081234567131', 10, 'tempat', NULL, NULL, NULL, '2026-05-11', '14:00:00', 'Seeded for testing absensi', 30000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 10, NULL),
(35, NULL, 'Siti 7', 'L', '081234567313', 3, 'tempat', NULL, NULL, NULL, '2026-05-11', '18:00:00', 'Seeded for testing absensi', 110000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 11, NULL),
(36, NULL, 'Dewi 8', 'P', '081234567733', 11, 'tempat', NULL, NULL, NULL, '2026-05-11', '16:00:00', 'Seeded for testing absensi', 20000.00, 'selesai', 'lunas', NULL, '2026-05-11 16:28:51', '2026-05-11 16:28:51', 12, NULL),
(37, 5, 'Baraja Putra', 'L', '082315957278', 2, 'rumah', 'Kelurahan Pasirkareumbi, Subang, Jawa Barat, Jawa, 41231, Indonesia', NULL, NULL, '2026-05-13', '16:15:00', NULL, 140000.00, 'selesai', 'lunas', '5fa61b5a-212b-4282-8ae1-df9a53d305ae', '2026-05-11 17:12:43', '2026-05-15 15:36:53', NULL, NULL),
(38, 5, 'Baraja Putra', 'L', '082315957278', 1, 'rumah', 'Kelurahan Pasirkareumbi, Subang, Jawa Barat, Jawa, 41231, Indonesia', NULL, NULL, '2026-05-12', '15:15:00', NULL, 100000.00, 'selesai', 'lunas', '95032603-bc28-4dc1-9fe5-f394278fcba5', '2026-05-11 17:13:47', '2026-05-12 15:49:34', NULL, NULL),
(39, NULL, 'Diva Inzyra 1', 'L', '081234567372', 6, 'tempat', NULL, NULL, NULL, '2026-05-12', '10:00:00', 'Seeded for testing absensi', 40000.00, 'selesai', 'lunas', NULL, '2026-05-11 17:18:08', '2026-05-11 17:18:08', 5, NULL),
(40, NULL, 'Diva Inzyra 2', 'L', '081234567689', 2, 'tempat', NULL, NULL, NULL, '2026-05-12', '11:00:00', 'Seeded for testing absensi', 120000.00, 'selesai', 'lunas', NULL, '2026-05-11 17:18:08', '2026-05-11 17:18:08', 6, NULL),
(41, NULL, 'Diana 3', 'P', '081234567580', 2, 'tempat', NULL, NULL, NULL, '2026-05-12', '18:00:00', 'Seeded for testing absensi', 120000.00, 'selesai', 'lunas', NULL, '2026-05-11 17:18:08', '2026-05-11 17:18:08', 7, NULL),
(42, NULL, 'Diana 4', 'L', '081234567337', 12, 'tempat', NULL, NULL, NULL, '2026-05-12', '14:00:00', 'Seeded for testing absensi', 100000.00, 'selesai', 'lunas', NULL, '2026-05-11 17:18:08', '2026-05-11 17:18:08', 8, NULL),
(43, NULL, 'Diva Inzyra 4', 'P', '081234567855', 1, 'tempat', NULL, NULL, NULL, '2026-05-12', '17:00:00', 'Seeded for testing absensi', 80000.00, 'selesai', 'lunas', NULL, '2026-05-11 17:18:08', '2026-05-11 17:18:08', 8, NULL),
(44, NULL, 'Bunga 5', 'P', '081234567763', 6, 'tempat', NULL, NULL, NULL, '2026-05-12', '13:00:00', 'Seeded for testing absensi', 40000.00, 'selesai', 'lunas', NULL, '2026-05-11 17:18:08', '2026-05-11 17:18:08', 9, NULL),
(45, NULL, 'Bunga 6', 'P', '081234567868', 1, 'tempat', NULL, NULL, NULL, '2026-05-12', '13:00:00', 'Seeded for testing absensi', 80000.00, 'selesai', 'lunas', NULL, '2026-05-11 17:18:08', '2026-05-11 17:18:08', 10, NULL),
(46, NULL, 'Diana 7', 'P', '081234567685', 8, 'tempat', NULL, NULL, NULL, '2026-05-12', '13:00:00', 'Seeded for testing absensi', 40000.00, 'selesai', 'lunas', NULL, '2026-05-11 17:18:08', '2026-05-11 17:18:08', 11, NULL),
(47, NULL, 'Diva Inzyra 7', 'P', '081234567376', 10, 'tempat', NULL, NULL, NULL, '2026-05-12', '15:00:00', 'Seeded for testing absensi', 30000.00, 'selesai', 'lunas', NULL, '2026-05-11 17:18:08', '2026-05-11 17:18:08', 11, NULL),
(48, NULL, 'Dezan 8', 'L', '081234567302', 10, 'tempat', NULL, NULL, NULL, '2026-05-12', '11:00:00', 'Seeded for testing absensi', 30000.00, 'selesai', 'lunas', NULL, '2026-05-11 17:18:08', '2026-05-11 17:18:08', 12, NULL),
(49, NULL, 'Diva Inzyra 8', 'L', '081234567726', 8, 'tempat', NULL, NULL, NULL, '2026-05-12', '16:00:00', 'Seeded for testing absensi', 40000.00, 'selesai', 'lunas', NULL, '2026-05-11 17:18:08', '2026-05-11 17:18:08', 12, NULL),
(50, 6, 'Bunga Sabrina', 'P', '089699663056', 4, 'rumah', 'Cibogo', NULL, NULL, '2026-05-15', '17:00:00', NULL, 150000.00, 'selesai', 'lunas', '80d688cd-bd88-474a-a974-bb9fc73b74e2', '2026-05-15 08:58:16', '2026-05-15 15:36:53', 7, NULL),
(51, NULL, 'Diva', 'P', '08238912832', 2, 'tempat', NULL, NULL, NULL, '2026-05-15', '17:00:00', NULL, 120000.00, 'selesai', 'belum_bayar', 'ee272d46-12e2-4954-8e60-a07a5557a0cc', '2026-05-15 09:01:06', '2026-05-15 15:36:53', NULL, NULL),
(52, 6, 'Udin', 'L', '089699663056', 8, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', NULL, NULL, '2026-05-15', '17:10:00', NULL, 40000.00, 'selesai', 'lunas', '59811dab-67ee-41be-901c-cf7365c9611f', '2026-05-15 09:09:56', '2026-05-24 13:22:34', NULL, NULL),
(53, 9, 'Diva', 'P', '089699663056', 5, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', NULL, NULL, '2026-05-16', '14:00:00', 'blablalbla', 140000.00, 'selesai', 'lunas', 'c4c14a6b-c6bd-4f7c-951e-af92e84ab845', '2026-05-16 04:56:21', '2026-05-18 15:40:51', 9, NULL),
(54, NULL, 'Bunga', 'P', '08238912832', 2, 'tempat', NULL, NULL, NULL, '2026-05-17', '10:00:00', NULL, 120000.00, 'selesai', 'belum_bayar', '8692563e-a969-4237-b5b6-13130d38b4f4', '2026-05-16 04:59:25', '2026-05-18 15:40:51', NULL, NULL),
(55, 9, 'Bunga Sabrinaa', 'P', '085861708569', 2, 'rumah', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', NULL, NULL, '2026-05-25', '14:00:00', NULL, 140000.00, 'selesai', 'lunas', 'a3e7c36a-9ea5-43ca-93e4-690bf79375ef', '2026-05-24 15:13:26', '2026-05-27 10:50:48', NULL, NULL),
(56, 9, 'Putra', 'L', '082315957278', 2, 'rumah', 'Kelurahan Pasirkareumbi, Subang, Jawa Barat, Jawa, 41231, Indonesia', NULL, NULL, '2026-05-26', '15:00:00', NULL, 140000.00, 'selesai', 'lunas', 'b56173d4-f0f0-46a2-8f42-20c3c834b321', '2026-05-24 15:17:22', '2026-05-27 10:50:48', NULL, NULL),
(57, 9, 'Bunga Sabrinaa', 'P', '085861708569', 2, 'tempat', NULL, NULL, NULL, '2026-05-25', '16:30:00', NULL, 120000.00, 'selesai', 'belum_bayar', '5ee418e5-0a97-44c6-9542-c6bba50fb9df', '2026-05-24 15:24:41', '2026-05-27 10:50:48', NULL, NULL),
(58, 9, 'Bunga Sabrinaa', 'P', '085861708569', 3, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55794741, 107.79482603, '2026-05-26', '16:28:00', NULL, 110000.00, 'selesai', 'belum_bayar', '368f550c-3d7e-4850-b400-5b562719db24', '2026-05-24 15:29:36', '2026-05-27 10:50:48', NULL, NULL),
(59, 9, 'Bunga Sabrinaa', 'P', '085861708569', 3, 'rumah', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55794741, 107.79482603, '2026-05-26', '16:28:00', NULL, 130000.00, 'selesai', 'lunas', '47d1b391-9301-4962-8905-3d9fba8b21f4', '2026-05-24 15:29:44', '2026-05-27 10:50:48', NULL, NULL),
(60, 9, 'Diva', 'P', '08965535351', 4, 'rumah', 'Padaasih Permai, Cibogo, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55538933, 107.81838655, '2026-05-27', '18:05:00', NULL, 150000.00, 'selesai', 'lunas', '061685d6-1aea-4a35-89a6-3de64ec7da4a', '2026-05-24 16:03:46', '2026-05-27 12:10:37', NULL, NULL),
(61, 9, 'Bunga Sabrinaa', 'P', '085861708569', 5, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55794741, 107.79482603, '2026-05-29', '19:15:00', NULL, 140000.00, 'selesai', 'lunas', '9923fafd-7520-431d-8733-40b347e730dd', '2026-05-27 12:15:18', '2026-05-29 15:37:08', NULL, NULL),
(62, NULL, 'Bunga Sabrinaaa', 'P', '08965535351', 2, 'tempat', NULL, NULL, NULL, '2026-05-27', '19:20:00', NULL, 120000.00, 'selesai', 'lunas', '341a1df9-fc3c-45d7-b10c-caa9249afbf7', '2026-05-27 12:16:25', '2026-05-27 14:41:01', 8, NULL),
(63, 9, 'Bunga Sabrinaa', 'P', '085861708569', 3, 'tempat', NULL, NULL, NULL, '2026-05-27', '19:25:00', NULL, 110000.00, 'selesai', 'lunas', '1a47353a-533e-4102-8e50-dc9e8aca0c7e', '2026-05-27 12:24:21', '2026-05-27 12:24:27', 9, NULL),
(64, 9, 'Bunga Sabrinaa', 'P', '085861708569', 2, 'tempat', NULL, NULL, NULL, '2026-05-27', '19:40:00', NULL, 120000.00, 'selesai', 'belum_bayar', '9ce59a8f-ae13-4895-a830-81bc64c6db42', '2026-05-27 12:39:16', '2026-05-27 14:41:01', 7, NULL),
(65, 9, 'Bunga Sabrinaa', 'P', '089699663056', 3, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55794741, 107.79482603, '2026-05-29', '16:15:00', NULL, 110000.00, 'selesai', 'lunas', '13956586-ab29-4c97-bd7c-1905d5c246bc', '2026-05-28 15:31:21', '2026-05-29 15:37:08', 7, NULL),
(66, 9, 'Bunga Sabrinaa', 'P', '089699663056', 6, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55794741, 107.79482603, '2026-06-02', '12:00:00', NULL, 40000.00, 'selesai', 'belum_bayar', '568f9848-122a-4908-8c4f-9fef2b357a40', '2026-06-01 16:13:58', '2026-06-01 17:02:11', 6, 5),
(67, 9, 'Bunga Sabrinaa', 'P', '089699663056', 6, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55794741, 107.79482603, '2026-06-02', '12:00:00', NULL, 40000.00, 'selesai', 'lunas', '4ae364c7-1d8d-4434-be87-022428a42708', '2026-06-01 16:14:06', '2026-06-01 17:02:11', NULL, NULL),
(69, 9, 'Bunga Sabrinaa', 'P', '089699663056', 5, 'tempat', NULL, NULL, NULL, '2026-06-02', '10:45:00', NULL, 140000.00, 'selesai', 'lunas', NULL, '2026-06-01 16:34:55', '2026-06-02 05:39:10', 6, NULL),
(70, 9, 'Bunga Sabrinaa', 'P', '089699663056', 3, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55794741, 107.79482603, '2026-06-02', '11:38:00', NULL, 110000.00, 'selesai', 'lunas', '9797b4d9-e3ac-47e4-9038-8fca41c6d5fa', '2026-06-01 16:36:39', '2026-06-02 05:39:10', NULL, NULL),
(71, 9, 'Bunga Sabrinaa', 'P', '089699663056', 5, 'tempat', NULL, NULL, NULL, '2026-06-03', '22:10:00', NULL, 140000.00, 'selesai', 'lunas', NULL, '2026-06-03 15:10:56', '2026-06-03 15:33:33', 7, NULL),
(72, 7, 'Diva Inzyra Praba Saraswati', 'P', '0888888888', 2, 'tempat', NULL, NULL, NULL, '2026-06-03', '22:13:00', NULL, 120000.00, 'selesai', 'lunas', NULL, '2026-06-03 15:13:02', '2026-06-06 15:01:04', 6, NULL),
(73, 6, 'Bunga Sabrina', 'P', '089699663056', 2, 'tempat', NULL, NULL, NULL, '2026-06-03', '22:14:00', NULL, 120000.00, 'selesai', 'lunas', NULL, '2026-06-03 15:13:24', '2026-06-10 16:17:20', 5, 7),
(74, 26, 'Bunga Arini', 'P', '085861708659', 5, 'tempat', NULL, NULL, NULL, '2026-06-03', '22:16:00', NULL, 140000.00, 'selesai', 'lunas', NULL, '2026-06-03 15:16:35', '2026-06-06 15:01:06', 8, NULL),
(75, 26, 'Bunga Arini', 'P', '085861708659', 4, 'tempat', NULL, NULL, NULL, '2026-06-03', '22:20:00', NULL, 130000.00, 'selesai', 'belum_bayar', '6d9417e1-db8d-49a8-8114-91779e52b01e', '2026-06-03 15:17:50', '2026-06-10 16:28:18', NULL, NULL),
(76, 5, 'Baraja Putra', 'L', '082315957278', 8, 'tempat', NULL, NULL, NULL, '2026-06-03', '22:35:00', NULL, 40000.00, 'selesai', 'lunas', NULL, '2026-06-03 15:33:08', '2026-06-10 16:42:02', 11, NULL),
(77, 9, 'Bunga Sabrinaa', 'P', '089699663056', 6, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55794741, 107.79482603, '2026-06-03', '22:40:00', NULL, 40000.00, 'selesai', 'belum_bayar', '2cb7646d-57bd-481b-af5a-68db0d207308', '2026-06-03 15:38:18', '2026-06-10 16:42:02', NULL, NULL),
(78, 5, 'Baraja Putra', 'L', '082315957278', 4, 'tempat', NULL, NULL, NULL, '2026-06-04', '22:30:00', NULL, 130000.00, 'selesai', 'lunas', NULL, '2026-06-04 15:29:18', '2026-06-10 16:30:05', 10, NULL),
(79, 7, 'Diva Inzyra Praba Saraswati', 'P', '0888888888', 3, 'tempat', NULL, NULL, NULL, '2026-06-06', '22:00:00', NULL, 110000.00, 'selesai', 'lunas', NULL, '2026-06-06 15:00:52', '2026-06-10 16:17:20', 7, NULL),
(80, 9, 'Bunga Sabrinaa A', 'P', '089699663056', 3, 'tempat', NULL, NULL, NULL, '2026-06-06', '22:10:00', NULL, 110000.00, 'selesai', 'lunas', NULL, '2026-06-06 15:01:33', '2026-06-10 16:17:20', 6, NULL),
(81, 6, 'Bunga Sabrina', 'P', '089699663056', 3, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55800071, 107.79481530, '2026-06-11', '15:30:00', NULL, 110000.00, 'selesai', 'lunas', '3dbbfd1f-a906-47c6-b85d-8faf26128da7', '2026-06-10 16:30:06', '2026-06-11 12:51:34', 5, NULL),
(82, 6, 'Bunga Sabrina', 'P', '089699663056', 3, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55800071, 107.79481530, '2026-06-12', '19:00:00', NULL, 110000.00, 'selesai', 'lunas', 'a2c1e85d-fd47-477b-ad7c-b6cb6c9024e4', '2026-06-10 16:46:15', '2026-06-12 14:57:07', NULL, NULL),
(83, 1, 'Test Full Booking 1', 'L', '081234567891', 1, 'tempat', NULL, NULL, NULL, '2026-06-13', '16:00:00', NULL, 50000.00, 'pending', 'lunas', NULL, '2026-06-12 15:07:11', '2026-06-12 15:14:40', 13, NULL),
(84, 1, 'Test Full Booking 2', 'L', '081234567892', 1, 'tempat', NULL, NULL, NULL, '2026-06-13', '16:00:00', NULL, 50000.00, 'pending', 'lunas', NULL, '2026-06-12 15:07:11', '2026-06-12 15:10:30', 9, NULL),
(85, 1, 'Test Full Booking 3', 'L', '081234567893', 1, 'tempat', NULL, NULL, NULL, '2026-06-13', '16:00:00', NULL, 50000.00, 'pending', 'lunas', NULL, '2026-06-12 15:07:11', '2026-06-12 15:10:38', 11, NULL),
(86, 1, 'Test Full Booking 4', 'L', '081234567894', 1, 'tempat', NULL, NULL, NULL, '2026-06-13', '16:00:00', NULL, 50000.00, 'pending', 'lunas', NULL, '2026-06-12 15:07:11', '2026-06-12 15:12:17', 12, NULL),
(87, 6, 'Bunga Sabrina', 'P', '089699663056', 2, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55800071, 107.79481530, '2026-06-13', '15:00:00', NULL, 120000.00, 'pending', 'lunas', 'e24c1cbd-cc17-44ee-b87e-412e015be923', '2026-06-12 15:09:46', '2026-06-12 15:10:06', NULL, NULL),
(88, 9, 'Bunga Sabrinaa A', 'P', '089699663056', 9, 'tempat', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', -6.55794741, 107.79482603, '2026-06-13', '16:00:00', NULL, 50000.00, 'pending', 'belum_bayar', 'dd5f54a2-b481-45df-9ea6-f9c203431d50', '2026-06-12 15:15:41', '2026-06-12 15:15:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` enum('admin','owner','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` decimal(10,8) DEFAULT NULL,
  `lng` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `google_id`, `avatar`, `jenis_kelamin`, `email_verified_at`, `password`, `phone`, `address`, `role`, `remember_token`, `created_at`, `updated_at`, `lat`, `lng`) VALUES
(1, 'Test User', 'test@example.com', NULL, NULL, NULL, '2026-04-30 18:41:20', '$2y$12$gW8XhWQ0LSY6fBBglRP3pucI2iJOTXLbmcDCsyPCJHH613ra8tIuG', NULL, NULL, 'user', 'kGg2jILPX3', '2026-04-30 18:41:20', '2026-04-30 18:41:20', NULL, NULL),
(2, 'Admin Ekky', 'admin@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$KXFKIlzakcgVBNgIQTH2u.jq7NPAZ9hnTgaKaIiQTaolKiS96GKZG', NULL, NULL, 'admin', NULL, '2026-04-30 18:41:20', '2026-04-30 18:41:20', NULL, NULL),
(3, 'Owner Ekky', 'owner@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$89rf9GGo/m.qYaN8XsBmaOFmzHQ/93Zf.ITeAMngJ9O46npaWD1Di', NULL, NULL, 'owner', NULL, '2026-04-30 18:41:20', '2026-05-01 16:05:28', NULL, NULL),
(5, 'Baraja Putra', 'b@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$t4pKwP8xJQVJ5AxnK4u90.PXSsFxJVFJ8PkS5y.srg8bckROCxCcC', '082315957278', 'Kelurahan Pasirkareumbi, Subang, Jawa Barat, Jawa, 41231, Indonesia', 'user', NULL, '2026-05-01 15:37:22', '2026-05-11 16:40:44', -6.57347147, 107.75597692),
(6, 'Bunga Sabrina', 'bungassaa7@gmail.com', '110612366301816089711', 'https://lh3.googleusercontent.com/a/ACg8ocKOR2Dv9dK8h_rTwi_PHhIvUDI7Qr1fjg3MwFwchyCc5Y2iJK4=s96-c', NULL, NULL, '$2y$12$KdbpaVmPGzKrXZvNAL8amumCb9PeC20uX3YkQLHOIMNWjo3gwJ2.y', '089699663056', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', 'user', NULL, '2026-05-02 06:10:04', '2026-06-07 06:59:19', -6.55800071, 107.79481530),
(7, 'Diva Inzyra Praba Saraswati', 'diva@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$g4iY0FUTRgpPCDWmnJtGr.Abe9jy94bDE979XgPxlN4nzsjFmEUFu', '0888888888', NULL, 'user', NULL, '2026-05-07 06:02:00', '2026-05-07 06:02:00', NULL, NULL),
(9, 'Bunga Sabrinaa A', 'bungasa@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$zFd6nBiTPJPLor5CkrBPNuaURFHBFRgv0zE3vmE3TmefMcBN8UB0.', '089699663056', 'Cinangsi, Subang, Jawa Barat, Jawa, 41285, Indonesia', 'user', NULL, '2026-05-16 04:49:36', '2026-06-04 14:30:14', -6.55794741, 107.79482603),
(26, 'Bunga Arini', 'arini@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$brloq5YF/FZQZP8HUgQ.Su3xOFGLQgjklq6tsASoOS5QYBkz4QdF.', '085861708659', NULL, 'user', NULL, '2026-06-03 15:15:24', '2026-06-03 15:15:24', NULL, NULL),
(27, 'Barajapu', 'barajapu23@gmail.com', '103790793128672657948', 'https://lh3.googleusercontent.com/a/ACg8ocL_malUxjw5HIVvkAS9Nu6O1NsoNRrKK7iPpfDO4iuv0vK84qw=s96-c', NULL, NULL, '$2y$12$bUAwQ/O3VYEPFr2qsV0r9O.zeU.yuc6eAnOD64U4ItTLHgGhd.J06', NULL, NULL, 'user', NULL, '2026-06-07 06:46:49', '2026-06-07 07:01:13', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensis_karyawan_id_foreign` (`karyawan_id`),
  ADD KEY `absensis_layanan_id_foreign` (`layanan_id`);

--
-- Indeks untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanans`
--
ALTER TABLE `layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penggajians`
--
ALTER TABLE `penggajians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penggajians_karyawan_id_foreign` (`karyawan_id`),
  ADD KEY `penggajians_layanan_id_foreign` (`layanan_id`),
  ADD KEY `penggajians_transaksi_id_foreign` (`transaksi_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonis_user_id_foreign` (`user_id`),
  ADD KEY `testimonis_transaksi_id_foreign` (`transaksi_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`),
  ADD KEY `transaksis_layanan_id_foreign` (`layanan_id`),
  ADD KEY `transaksis_karyawan_id_foreign` (`karyawan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensis`
--
ALTER TABLE `absensis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=734;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `layanans`
--
ALTER TABLE `layanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `penggajians`
--
ALTER TABLE `penggajians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensis`
--
ALTER TABLE `absensis`
  ADD CONSTRAINT `absensis_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensis_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanans` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `penggajians`
--
ALTER TABLE `penggajians`
  ADD CONSTRAINT `penggajians_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penggajians_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penggajians_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `testimonis`
--
ALTER TABLE `testimonis`
  ADD CONSTRAINT `testimonis_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `testimonis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transaksis_layanan_id_foreign` FOREIGN KEY (`layanan_id`) REFERENCES `layanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
