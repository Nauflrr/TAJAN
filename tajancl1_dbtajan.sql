-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Agu 2024 pada 20.24
-- Versi server: 8.0.39-cll-lve
-- Versi PHP: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tajancl1_dbtajan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambdatabase`
--

CREATE TABLE `ambdatabase` (
  `id` int NOT NULL,
  `dataservo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `ambdatabase`
--

INSERT INTO `ambdatabase` (`id`, `dataservo`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cobariwayat`
--

CREATE TABLE `cobariwayat` (
  `id` int NOT NULL,
  `point` int DEFAULT NULL,
  `botsar` int DEFAULT NULL,
  `botcil` int DEFAULT NULL,
  `change_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cobariwayat`
--

INSERT INTO `cobariwayat` (`id`, `point`, `botsar`, `botcil`, `change_time`) VALUES
(1, 10, 50, 1, '2024-06-04 13:43:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int NOT NULL,
  `point` int DEFAULT NULL,
  `botsar` int DEFAULT NULL,
  `botcil` int DEFAULT NULL,
  `change_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `change_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `point`, `botsar`, `botcil`, `change_time`, `change_type`, `description`) VALUES
(1, 10, 0, 1, '2024-06-04 13:44:04', 'point', 'poin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `locations`
--

CREATE TABLE `locations` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'TULT'),
(2, 'GKU'),
(3, 'GSG'),
(4, 'DAMAR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_histories`
--

CREATE TABLE `login_histories` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login_histories`
--

INSERT INTO `login_histories` (`id`, `user_id`, `last_login`) VALUES
(1, 1, '2024-06-06 21:40:38'),
(2, 1, '0000-00-00 00:00:00'),
(3, 1, '0000-00-00 00:00:00'),
(4, 1, '0000-00-00 00:00:00'),
(5, 1, '2024-06-06 22:01:38'),
(6, 1, '2024-06-06 22:01:55'),
(7, 1, '2024-06-06 22:03:40'),
(8, 1, '2024-06-06 22:04:13'),
(9, 1, '2024-06-06 22:04:53'),
(10, 1, '0000-00-00 00:00:00'),
(11, 1, '0000-00-00 00:00:00'),
(12, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_history`
--

CREATE TABLE `login_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login_history`
--

INSERT INTO `login_history` (`id`, `user_id`, `login_time`) VALUES
(1, 1, '2024-05-17 08:27:14'),
(2, 1, '2024-05-17 13:51:33'),
(3, 1, '2024-05-17 14:25:12'),
(4, 2, '2024-05-17 14:35:06'),
(5, 1, '2024-05-17 14:35:48'),
(6, 2, '2024-05-21 14:03:33'),
(7, 1, '2024-05-30 07:10:37'),
(8, 1, '2024-05-30 08:42:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int NOT NULL,
  `nama_lokasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `servo` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_lokasi`, `kode`, `servo`) VALUES
(1, 'TULT', 'tult-1', 1),
(2, 'Gedung Kuliah Umum', 'gku-2', 2),
(3, 'Gedung Serba Guna', 'gsg-3', 0),
(4, 'Gd DAMAR', 'damar-4', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `minriwayat`
--

CREATE TABLE `minriwayat` (
  `id` int NOT NULL,
  `a_id` int NOT NULL,
  `waktulogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `minriwayat`
--

INSERT INTO `minriwayat` (`id`, `a_id`, `waktulogin`) VALUES
(1, 1, '2024-07-02 08:55:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `Riwayat`
--

CREATE TABLE `Riwayat` (
  `No` int NOT NULL,
  `Nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Lokasi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Botol` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `Riwayat`
--

INSERT INTO `Riwayat` (`No`, `Nama`, `Lokasi`, `Botol`, `Status`, `Date`) VALUES
(1, 'Javana Adhi', 'tult', 'besar', 'Berhasil', '2024-07-11 12:33:48'),
(2, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-11 16:03:49'),
(3, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-11 16:04:47'),
(4, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-11 16:05:44'),
(5, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-11 16:06:41'),
(6, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-11 16:31:30'),
(7, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-11 16:34:38'),
(8, 'Kristovel Simanullang', 'TULT', 'Tak Sesuai', 'Gagal', '2024-07-12 10:00:23'),
(9, 'Kristovel Simanullang', 'TULT', 'Tak Sesuai', 'Gagal', '2024-07-12 10:04:58'),
(10, 'Javana', 'TULT', 'Kecil', 'Berhasil', '2024-07-12 10:20:21'),
(11, 'Javana', 'TULT', 'Kecil', 'Berhasil', '2024-07-12 10:21:39'),
(12, 'Javana', 'TULT', 'Tak Sesuai', 'Gagal', '2024-07-12 10:22:07'),
(13, 'Javana', 'TULT', 'Tak Sesuai', 'Gagal', '2024-07-12 10:27:22'),
(14, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-12 10:36:14'),
(15, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-12 10:41:21'),
(16, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-12 10:45:07'),
(17, 'Kristovel Simanullang', 'TULT', 'Tak Sesuai', 'Gagal', '2024-07-12 10:46:36'),
(18, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-12 11:34:30'),
(19, 'Kristovel Simanullang', 'TULT', 'Besar', 'Gagal', '2024-07-12 11:35:17'),
(20, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-12 11:54:26'),
(21, 'Kristovel Simanullang', 'TULT', 'Besar', 'Gagal', '2024-07-12 11:56:47'),
(22, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-12 12:16:35'),
(23, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-12 12:18:41'),
(24, 'Kristovel Simanullang', 'TULT', 'Tak Sesuai', 'Gagal', '2024-07-12 12:23:29'),
(25, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-12 12:30:28'),
(26, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-12 12:33:31'),
(27, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-12 12:36:30'),
(28, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-12 12:39:52'),
(29, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-12 15:10:28'),
(30, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-12 15:22:28'),
(31, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-12 15:43:28'),
(32, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-12 15:09:23'),
(33, 'M Naufal Rizal', 'TULT', 'Kecil', 'Berhasil', '2024-07-12 16:11:23'),
(34, 'Bebas', 'TULT', 'Besar', 'Berhasil', '2024-07-12 15:36:52'),
(35, 'Bebas', 'TULT', 'Tak Sesuai', 'Gagal', '2024-07-12 15:37:45'),
(36, 'Bebas', 'TULT', 'Besar', 'Berhasil', '2024-07-12 15:39:04'),
(37, 'Bebas', 'TULT', 'Besar', 'Berhasil', '2024-07-12 15:40:27'),
(38, 'Bebas', 'TULT', 'Besar', 'Berhasil', '2024-07-12 15:41:36'),
(39, 'Bebas', 'TULT', 'Besar', 'Berhasil', '2024-07-12 15:42:47'),
(40, 'Bebas', 'TULT', 'Besar', 'Berhasil', '2024-07-12 15:56:11'),
(41, 'Bebas', 'TULT', 'Tak Sesuai', 'Gagal', '2024-07-12 15:57:01'),
(42, 'Bebas', 'TULT', 'Besar', 'Berhasil', '2024-07-12 15:58:16'),
(43, 'Bebas', 'TULT', 'Tak Sesuai', 'Gagal', '2024-07-12 15:59:10'),
(44, 'Bebas', 'TULT', 'Besar', 'Berhasil', '2024-07-12 16:00:30'),
(45, 'Kristovel Simanullang', 'TULT', 'Tak Sesuai', 'Gagal', '2024-07-15 12:21:29'),
(46, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-15 12:23:38'),
(47, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-15 12:24:49'),
(48, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-07-15 12:25:59'),
(49, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-15 12:27:07'),
(50, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-15 12:28:23'),
(51, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-15 12:30:06'),
(52, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-15 12:31:14'),
(53, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-15 12:32:23'),
(54, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-15 12:33:35'),
(55, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-15 12:34:55'),
(56, 'Putra', 'TULT', 'Kecil', 'Berhasil', '2024-07-15 12:34:55'),
(57, 'M Naufal Rizal', 'TULT', 'Kecil', 'Berhasil', '2024-07-15 12:34:55'),
(58, 'Agung Putra', 'TULT', 'Kecil', 'Berhasil', '2024-07-14 12:34:55'),
(59, 'Agung Putra', 'TULT', 'Besar', 'Berhasil', '2024-07-14 12:34:55'),
(60, 'Agung Putra', 'GKU', 'Kecil', 'Berhasil', '2024-07-15 16:34:55'),
(61, 'Agung Putra', 'GSG', 'Besar', 'Berhasil', '2024-07-15 17:35:55'),
(62, 'Javana', 'TULT', 'Besar', 'Berhasil', '2024-07-20 16:07:22'),
(63, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-07-20 16:26:44'),
(64, 'Javana', 'TULT', 'Kecil', 'Berhasil', '2024-07-20 16:37:31'),
(65, 'Javana', 'TULT', 'Besar', 'Berhasil', '2024-07-20 16:40:58'),
(66, 'Javana', 'TULT', 'Tak Sesuai', 'Gagal', '2024-07-20 16:56:38'),
(67, 'Agung Putra', 'TULT', 'Besar', 'Berhasil', '2024-07-22 16:34:12'),
(68, 'Agung Putra', 'TULT', 'Kecil', 'Berhasil', '2024-07-22 16:37:23'),
(69, 'Agung Putra', 'TULT', 'Besar', 'Gagal', '2024-07-22 16:38:26'),
(70, 'Agung Putra', 'TULT', 'Besar', 'Berhasil', '2024-07-22 16:40:38'),
(71, 'Agung Putra', 'TULT', 'Besar', 'Berhasil', '2024-07-22 16:44:01'),
(72, 'Agung Putra', 'TULT', 'Besar', 'Berhasil', '2024-07-22 16:46:22'),
(73, 'Javana', 'TULT', 'Besar', 'Berhasil', '2024-07-22 17:04:30'),
(74, 'Javana', 'TULT', 'Besar', 'Berhasil', '2024-07-22 17:27:27'),
(75, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-08-01 13:59:46'),
(76, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-08-01 14:02:36'),
(77, 'Kristovel Simanullang', 'TULT', 'Kecil', 'Berhasil', '2024-08-01 14:03:26'),
(78, 'Kristovel Simanullang', 'TULT', 'Besar', 'Berhasil', '2024-08-01 14:04:14'),
(79, 'Agung Putra', 'TULT', 'Besar', 'Berhasil', '2024-08-07 10:58:19'),
(80, 'Agung Putra', 'TULT', 'Besar', 'Berhasil', '2024-08-07 11:01:06'),
(81, 'Agung Putra', 'TULT', 'Tak Sesuai', 'Gagal', '2024-08-07 11:02:21'),
(82, 'Agung Putra', 'TULT', 'Besar', 'Berhasil', '2024-08-07 11:05:37'),
(83, 'M Naufal Rizal', 'TULT', 'Besar', 'Berhasil', '2024-08-07 11:08:48'),
(84, 'M Naufal Rizal', 'TULT', 'Besar', 'Berhasil', '2024-08-07 11:11:31'),
(85, 'Agung Putra', 'TULT', 'Besar', 'Berhasil', '2024-08-07 11:24:34'),
(86, 'Agung Putra', 'TULT', 'Besar', 'Berhasil', '2024-08-07 11:29:31'),
(87, 'M Naufal Rizal', 'TULT', 'Kecil', 'Berhasil', '2024-08-07 11:46:33'),
(88, 'M Naufal Rizal', 'TULT', 'Besar', 'Berhasil', '2024-08-07 11:52:06'),
(89, 'M Naufal Rizal', 'TULT', 'Besar', 'Berhasil', '2024-08-07 11:53:13'),
(90, 'M Naufal Rizal', 'TULT', 'Besar', 'Berhasil', '2024-08-07 12:05:22'),
(91, 'Agung Putra', 'TULT', 'Tak Sesuai', 'Gagal', '2024-08-07 12:09:33'),
(92, 'Agung Putra', 'TULT', 'Tak Sesuai', 'Gagal', '2024-08-07 12:10:08'),
(93, 'M Naufal Rizal', 'TULT', 'Tak Sesuai', 'Gagal', '2024-08-07 13:40:51'),
(94, 'M Naufal Rizal', 'TULT', 'Besar', 'Berhasil', '2024-08-07 13:41:59'),
(95, 'M Naufal Rizal', 'TULT', 'Besar', 'Berhasil', '2024-08-07 13:50:19'),
(96, 'Javana', 'TULT', 'Besar', 'Berhasil', '2024-08-07 13:53:05'),
(97, 'Javana', 'TULT', 'Tak Sesuai', 'Gagal', '2024-08-07 13:59:16'),
(98, 'Javana', 'TULT', 'Besar', 'Berhasil', '2024-08-07 14:00:38'),
(99, 'Javana', 'TULT', 'Tak Sesuai', 'Gagal', '2024-08-07 14:01:23'),
(100, 'Javana', 'TULT', 'Tak Sesuai', 'Gagal', '2024-08-07 14:02:50'),
(101, 'Javana', 'TULT', 'Besar', 'Berhasil', '2024-08-07 14:04:12'),
(102, 'Javana', 'TULT', 'Besar', 'Berhasil', '2024-08-07 14:09:39'),
(103, 'Javana', 'TULT', 'Besar', 'Berhasil', '2024-08-07 14:10:59'),
(104, 'Javana', 'TULT', 'Besar', 'Berhasil', '2024-08-07 14:12:10'),
(105, 'Javana', 'TULT', 'Besar', 'Berhasil', '2024-08-07 14:13:21'),
(106, 'Agung Putra', 'TULT', 'Kecil', 'Berhasil', '2024-08-08 11:08:13'),
(107, 'Agung Putra', 'TULT', 'Tak Sesuai', 'Gagal', '2024-08-08 11:18:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `servo`
--

CREATE TABLE `servo` (
  `id` int NOT NULL,
  `location_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `servo`
--

INSERT INTO `servo` (`id`, `location_id`, `status`) VALUES
(2, 2, 0),
(7, 1, 0),
(9, 3, 0),
(10, 4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_history`
--

CREATE TABLE `status_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `location_id` int NOT NULL,
  `status` int NOT NULL,
  `change_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_history`
--

INSERT INTO `status_history` (`id`, `user_id`, `location_id`, `status`, `change_time`) VALUES
(5, 1, 2, 0, '2024-05-17 13:45:58'),
(8, 1, 4, 0, '2024-05-17 13:47:18'),
(9, 1, 1, 0, '2024-05-17 13:52:05'),
(11, 1, 3, 0, '2024-05-17 13:45:58'),
(26, 2, 1, 0, '2024-05-17 14:35:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanks`
--

CREATE TABLE `tanks` (
  `id` int NOT NULL,
  `location_id` int NOT NULL,
  `capacity` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tanks`
--

INSERT INTO `tanks` (`id`, `location_id`, `capacity`) VALUES
(1, 1, 100),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `updata`
--

CREATE TABLE `updata` (
  `location_id` int NOT NULL,
  `id` int NOT NULL,
  `KODE` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `berat` float NOT NULL,
  `Kapasitas` int NOT NULL,
  `point` int NOT NULL,
  `servo` int NOT NULL,
  `botcil` int NOT NULL,
  `botsar` int NOT NULL,
  `berhascacah` varchar(10) NOT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `updata`
--

INSERT INTO `updata` (`location_id`, `id`, `KODE`, `berat`, `Kapasitas`, `point`, `servo`, `botcil`, `botsar`, `berhascacah`, `tanggal`) VALUES
(1, 1, 'tult-1', -1.48, 59, 165, 1, 10, 13, 'Gagal', '2024-08-08 11:19:05'),
(2, 2, 'gku-2', 18.28, 51, 90, 0, 4, 8, '0', '2024-06-28 12:06:10'),
(3, 3, 'gsg-3', 0, 20, 0, 0, 0, 0, '0', '2024-06-22 18:40:06'),
(4, 4, 'damar-3', 0, 0, 0, 0, 0, 0, '0', '2024-06-22 20:34:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usermin`
--

CREATE TABLE `usermin` (
  `id` int NOT NULL,
  `a_id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `waktulogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `usermin`
--

INSERT INTO `usermin` (`id`, `a_id`, `username`, `password`, `waktulogin`) VALUES
(1, 1, 'admin', '1', '2024-07-02 09:05:30'),
(2, 2, 'palzz', '1', '2024-07-02 09:05:30'),
(4, 4, 'putra', '1', '2024-07-02 09:05:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `userid` int NOT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `oauth_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `point` int NOT NULL DEFAULT '0',
  `servo` int DEFAULT '0',
  `botcil` int DEFAULT '0',
  `botsar` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`userid`, `fullname`, `email`, `password`, `oauth_id`, `last_login`, `created_at`, `point`, `servo`, `botcil`, `botsar`) VALUES
(1, 'Kristovel Simanullang', 'kristovelsimanullang40@gmail.com', '', '109149033908144991685', '2024-03-29 11:36:14', '2024-03-29 04:36:14', 1000, 0, 38, 87),
(13, 'jkt48 ea', 'eajkt320@gmail.com', '', '100150235190481939826', '2024-03-29 11:38:58', '2024-03-29 04:38:58', 10, 0, 0, 1),
(14, 'Javana', 'javanaadhi12@gmail.com', '', '106617120571086219947', '2024-08-07 13:40:12', '2024-03-29 10:18:42', 225, 0, 7, 20),
(15, 'Bebas', 'bebas4120@gmail.com', '', '108956825013209575988', '2024-07-22 17:31:21', '2024-04-01 09:10:38', 10, 0, 0, 8),
(18, 'Steven universe', 'sustevenuniverse1@gmail.com', '', '101624851778953624408', '2024-04-24 14:01:27', '2024-04-24 07:01:27', 0, 0, 0, 0),
(19, 'Agung Putra', 'agungputra.app45@gmail.com', '', '114610625260256537239', '2024-08-08 11:06:48', '2024-04-24 11:21:36', 165, 0, 10, 13),
(20, 'M Naufal Rizal', 'naufalrizal.nr21@gmail.com', '', '113759341949350943972', '2024-08-07 21:09:51', '2024-04-26 15:07:08', 115, 0, 3, 10),
(21, 'Ptr Game', 'ptrgame46@gmail.com', '', '106114955034705175493', '2024-07-15 16:06:09', '2024-04-27 02:38:15', 0, 0, 0, 0),
(22, 'Fathur Rahman', 'fathurrahman26402@gmail.com', '', '116495155888256734971', '2024-04-30 11:36:58', '2024-04-30 04:36:08', 0, 0, 0, 0),
(23, 'Zuper Killer', 'zuperkiller00@gmail.com', '', '100711879363034463029', '2024-07-11 16:54:50', '2024-06-02 07:58:52', 123, 0, 20, 5),
(24, 'Lil Hadim', 'lilhadim0375@gmail.com', '', '115955734211836329198', '2024-07-04 14:58:03', '2024-07-04 07:49:40', 99, 0, 5, 10),
(25, 'Ahmad Saiful Mujab', 'ahmadsaifulmujab85@gmail.com', '', '103438722895286542057', '2024-07-07 14:28:39', '2024-07-06 11:54:22', 100, 0, 5, 9),
(26, 'Ivan Ronaldo Lumbanraja', 'ivan.ronaldolumbanraja@gmail.com', '', '114068579804812638994', '2024-07-13 19:32:09', '2024-07-13 12:32:09', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cobariwayat`
--
ALTER TABLE `cobariwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_histories`
--
ALTER TABLE `login_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `minriwayat`
--
ALTER TABLE `minriwayat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `a_id` (`a_id`);

--
-- Indeks untuk tabel `Riwayat`
--
ALTER TABLE `Riwayat`
  ADD PRIMARY KEY (`No`);

--
-- Indeks untuk tabel `servo`
--
ALTER TABLE `servo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indeks untuk tabel `status_history`
--
ALTER TABLE `status_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indeks untuk tabel `tanks`
--
ALTER TABLE `tanks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `capacity` (`capacity`);

--
-- Indeks untuk tabel `updata`
--
ALTER TABLE `updata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `Kapasitas` (`Kapasitas`);

--
-- Indeks untuk tabel `usermin`
--
ALTER TABLE `usermin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cobariwayat`
--
ALTER TABLE `cobariwayat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `login_histories`
--
ALTER TABLE `login_histories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `Riwayat`
--
ALTER TABLE `Riwayat`
  MODIFY `No` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `servo`
--
ALTER TABLE `servo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `status_history`
--
ALTER TABLE `status_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tanks`
--
ALTER TABLE `tanks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `usermin`
--
ALTER TABLE `usermin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `servo`
--
ALTER TABLE `servo`
  ADD CONSTRAINT `servo_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
