-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2025 pada 21.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pohonkeluarga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_log`
--

CREATE TABLE `activity_log` (
  `id_activity` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `aksi` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `activity_log`
--

INSERT INTO `activity_log` (`id_activity`, `id_user`, `username`, `aksi`, `timestamp`, `ip_address`) VALUES
(474, 25, 'der', 'Membuka tabel user', '2025-06-01 10:04:31', '127.0.0.1'),
(475, 25, 'der', 'Membuka tabel user', '2025-06-01 10:06:24', '127.0.0.1'),
(476, 25, 'der', 'Membuka tabel user', '2025-06-01 10:07:03', '127.0.0.1'),
(477, 25, 'der', 'Membuka tabel user', '2025-06-01 10:13:42', '127.0.0.1'),
(478, 25, 'der', 'Membuka tabel user', '2025-06-01 10:13:45', '127.0.0.1'),
(479, 25, 'der', 'Menghapus user: dadad (ID: 28)', '2025-06-01 10:13:48', '127.0.0.1'),
(480, 25, 'der', 'Membuka tabel user', '2025-06-01 10:13:56', '127.0.0.1'),
(481, 25, 'der', 'Membuka tabel user', '2025-06-01 10:15:23', '127.0.0.1'),
(482, 25, 'der', 'Menghapus user: der (ID: 25)', '2025-06-01 10:15:28', '127.0.0.1'),
(483, 1, 'derius', 'Login ke sistem', '2025-06-01 10:18:03', '127.0.0.1'),
(484, 1, 'derius', 'Membuka tabel user', '2025-06-01 10:18:04', '127.0.0.1'),
(485, 1, 'derius', 'Membuka tabel user', '2025-06-01 10:25:26', '127.0.0.1'),
(486, 1, 'derius', 'Membuka tabel user', '2025-06-01 10:26:09', '127.0.0.1'),
(487, 1, 'derius', 'Membuka tabel user', '2025-06-01 10:28:16', '127.0.0.1'),
(488, 1, 'derius', 'Membuka tabel user', '2025-06-01 10:29:05', '127.0.0.1'),
(489, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 10:29:11', '127.0.0.1'),
(490, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 10:30:21', '127.0.0.1'),
(491, 1, 'derius', 'Melihat semua data marga', '2025-06-01 10:31:44', '127.0.0.1'),
(492, 1, 'derius', 'Membuka tabel user', '2025-06-01 10:31:50', '127.0.0.1'),
(493, 1, 'derius', 'Melihat semua data marga', '2025-06-01 10:32:00', '127.0.0.1'),
(494, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 10:32:02', '127.0.0.1'),
(495, 1, 'derius', 'Membuka tabel user', '2025-06-01 10:32:04', '127.0.0.1'),
(496, 1, 'derius', 'Membuka tabel user', '2025-06-01 10:42:27', '127.0.0.1'),
(497, 1, 'derius', 'Membuka tabel user', '2025-06-01 10:42:36', '127.0.0.1'),
(498, 1, 'derius', 'Melihat semua data marga', '2025-06-01 10:42:39', '127.0.0.1'),
(499, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 10:42:43', '127.0.0.1'),
(500, 1, 'derius', 'Membuka tabel user', '2025-06-01 10:43:02', '127.0.0.1'),
(501, 1, 'derius', 'Membuka tabel user', '2025-06-01 10:43:22', '127.0.0.1'),
(502, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 10:43:28', '127.0.0.1'),
(503, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 10:43:48', '127.0.0.1'),
(504, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 10:43:59', '127.0.0.1'),
(505, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 10:44:47', '127.0.0.1'),
(506, 1, 'derius', 'Melihat semua data marga', '2025-06-01 10:44:53', '127.0.0.1'),
(507, 1, 'derius', 'Melihat semua data marga', '2025-06-01 10:45:04', '127.0.0.1'),
(508, 1, 'derius', 'Melihat semua data marga', '2025-06-01 10:46:04', '127.0.0.1'),
(509, 1, 'derius', 'Membuka tabel user', '2025-06-01 10:46:08', '127.0.0.1'),
(510, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 10:46:11', '127.0.0.1'),
(511, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 10:58:08', '127.0.0.1'),
(512, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 11:00:26', '127.0.0.1'),
(513, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 11:47:31', '127.0.0.1'),
(514, 1, 'derius', 'Melihat detail user ID 1', '2025-06-01 11:47:32', '127.0.0.1'),
(515, 1, 'derius', 'Membuka tabel user', '2025-06-01 11:47:43', '127.0.0.1'),
(516, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 11:48:37', '127.0.0.1'),
(517, 1, 'derius', 'Melihat detail user ID 1', '2025-06-01 11:48:44', '127.0.0.1'),
(518, 1, 'derius', 'Melihat detail user ID 23', '2025-06-01 11:48:48', '127.0.0.1'),
(519, 1, 'derius', 'Melihat detail user ID 24', '2025-06-01 11:48:54', '127.0.0.1'),
(520, 1, 'derius', 'Membuka tabel user', '2025-06-01 11:49:02', '127.0.0.1'),
(521, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 11:49:14', '127.0.0.1'),
(522, 1, 'derius', 'Membuka halaman edit pasangan dengan ID 8', '2025-06-01 11:49:17', '127.0.0.1'),
(523, 1, 'derius', 'Memperbarui data pasangan dengan ID 8', '2025-06-01 11:49:26', '127.0.0.1'),
(524, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 11:49:27', '127.0.0.1'),
(525, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 11:49:28', '127.0.0.1'),
(526, 1, 'derius', 'Melihat detail user ID 1', '2025-06-01 11:49:31', '127.0.0.1'),
(527, 1, 'derius', 'Melihat semua data marga', '2025-06-01 11:49:42', '127.0.0.1'),
(528, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 11:50:07', '127.0.0.1'),
(529, 1, 'derius', 'Melihat detail user ID 1', '2025-06-01 11:50:23', '127.0.0.1'),
(530, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 11:50:55', '127.0.0.1'),
(531, 1, 'derius', 'Melihat detail user ID 23', '2025-06-01 11:50:59', '127.0.0.1'),
(532, 1, 'derius', 'Melihat detail user ID 23', '2025-06-01 11:51:00', '127.0.0.1'),
(533, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 11:51:04', '127.0.0.1'),
(534, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 11:52:49', '127.0.0.1'),
(535, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 11:52:53', '127.0.0.1'),
(536, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 11:54:47', '127.0.0.1'),
(537, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 11:55:03', '127.0.0.1'),
(538, 1, 'derius', 'Melihat semua data marga', '2025-06-01 11:59:33', '127.0.0.1'),
(539, 1, 'derius', 'Melihat semua data marga', '2025-06-01 12:00:04', '127.0.0.1'),
(540, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:00:06', '127.0.0.1'),
(541, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:00:55', '127.0.0.1'),
(542, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:01:35', '127.0.0.1'),
(543, 1, 'derius', 'Menambahkan user baru: daada (ID: 33)', '2025-06-01 12:01:55', '127.0.0.1'),
(544, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:01:56', '127.0.0.1'),
(545, 1, 'derius', 'Melihat detail user ID 29', '2025-06-01 12:02:02', '127.0.0.1'),
(546, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:02:16', '127.0.0.1'),
(547, 1, 'derius', 'Menambahkan user baru: Derpyus (ID: 34)', '2025-06-01 12:02:48', '127.0.0.1'),
(548, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:02:48', '127.0.0.1'),
(549, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:02:53', '127.0.0.1'),
(550, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:03:20', '127.0.0.1'),
(551, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:07:28', '127.0.0.1'),
(552, 1, 'derius', 'Melihat detail user ID 23', '2025-06-01 12:07:31', '127.0.0.1'),
(553, 1, 'derius', 'Melihat detail user ID 23', '2025-06-01 12:07:34', '127.0.0.1'),
(554, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:07:46', '127.0.0.1'),
(555, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:08:13', '127.0.0.1'),
(556, 1, 'derius', 'Melihat detail user ID 23', '2025-06-01 12:08:16', '127.0.0.1'),
(557, 1, 'derius', 'Menghapus user: kevin (ID: 23)', '2025-06-01 12:08:18', '127.0.0.1'),
(558, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:08:19', '127.0.0.1'),
(559, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:09:03', '127.0.0.1'),
(560, 1, 'derius', 'Melihat detail user ID 26', '2025-06-01 12:09:07', '127.0.0.1'),
(561, 1, 'derius', 'Melihat detail user ID 24', '2025-06-01 12:09:10', '127.0.0.1'),
(562, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:09:34', '127.0.0.1'),
(563, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:09:38', '127.0.0.1'),
(564, 1, 'derius', 'Menambahkan user baru: ADAADA (ID: 35)', '2025-06-01 12:10:01', '127.0.0.1'),
(565, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:10:02', '127.0.0.1'),
(566, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:10:04', '127.0.0.1'),
(567, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:11:00', '127.0.0.1'),
(568, 1, 'derius', 'Melihat detail user ID 33', '2025-06-01 12:11:02', '127.0.0.1'),
(569, 1, 'derius', 'Menghapus user: daada (ID: 33)', '2025-06-01 12:11:05', '127.0.0.1'),
(570, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:11:05', '127.0.0.1'),
(571, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:11:08', '127.0.0.1'),
(572, 1, 'derius', 'Melihat detail user ID 35', '2025-06-01 12:11:12', '127.0.0.1'),
(573, 1, 'derius', 'Menghapus user: ADAADA (ID: 35)', '2025-06-01 12:11:14', '127.0.0.1'),
(574, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:11:14', '127.0.0.1'),
(575, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:11:18', '127.0.0.1'),
(576, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:11:40', '127.0.0.1'),
(577, 1, 'derius', 'Melihat semua data marga', '2025-06-01 12:11:43', '127.0.0.1'),
(578, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 12:11:45', '127.0.0.1'),
(579, 1, 'derius', 'Logout dari sistem', '2025-06-01 12:24:09', '127.0.0.1'),
(580, 1, 'derius', 'Login ke sistem', '2025-06-01 12:32:58', '127.0.0.1'),
(581, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:33:47', '127.0.0.1'),
(582, 1, 'derius', 'Melihat semua data marga', '2025-06-01 12:33:51', '127.0.0.1'),
(583, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 12:33:55', '127.0.0.1'),
(584, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:34:00', '127.0.0.1'),
(585, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:34:21', '127.0.0.1'),
(586, 1, 'derius', 'Menghapus user: Nama kami (ID: 24)', '2025-06-01 12:34:30', '127.0.0.1'),
(587, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:34:31', '127.0.0.1'),
(588, 1, 'derius', 'Menghapus user: dadada (ID: 26)', '2025-06-01 12:34:32', '127.0.0.1'),
(589, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:34:33', '127.0.0.1'),
(590, 1, 'derius', 'Menghapus user: Steven ses (ID: 29)', '2025-06-01 12:34:35', '127.0.0.1'),
(591, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:34:35', '127.0.0.1'),
(592, 1, 'derius', 'Menghapus user: Depppeao (ID: 30)', '2025-06-01 12:34:41', '127.0.0.1'),
(593, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:34:42', '127.0.0.1'),
(594, 1, 'derius', 'Menghapus user: Derpyus (ID: 34)', '2025-06-01 12:34:43', '127.0.0.1'),
(595, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:34:43', '127.0.0.1'),
(596, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:34:48', '127.0.0.1'),
(597, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:34:54', '127.0.0.1'),
(598, 1, 'derius', 'Menambahkan user baru: kevin (ID: 36)', '2025-06-01 12:35:13', '127.0.0.1'),
(599, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:35:14', '127.0.0.1'),
(600, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:35:15', '127.0.0.1'),
(601, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 12:35:22', '127.0.0.1'),
(602, 1, 'derius', 'Menghapus data pasangan dengan ID 8', '2025-06-01 12:35:25', '127.0.0.1'),
(603, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 12:35:26', '127.0.0.1'),
(604, 1, 'derius', 'Menghapus data pasangan dengan ID 9', '2025-06-01 12:35:28', '127.0.0.1'),
(605, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 12:35:28', '127.0.0.1'),
(606, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:35:29', '127.0.0.1'),
(607, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 12:35:33', '127.0.0.1'),
(608, 1, 'derius', 'Membuka halaman tambah pasangan', '2025-06-01 12:35:36', '127.0.0.1'),
(609, 1, 'derius', 'Menambahkan pasangan baru', '2025-06-01 12:35:46', '127.0.0.1'),
(610, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 12:35:46', '127.0.0.1'),
(611, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:35:49', '127.0.0.1'),
(612, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:35:53', '127.0.0.1'),
(613, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:36:10', '127.0.0.1'),
(614, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:36:19', '127.0.0.1'),
(615, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:36:40', '127.0.0.1'),
(616, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:36:55', '127.0.0.1'),
(617, 1, 'derius', 'Menghapus user: kevin (ID: 36)', '2025-06-01 12:36:58', '127.0.0.1'),
(618, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:36:59', '127.0.0.1'),
(619, 1, 'derius', 'Menambahkan user baru: kevin (ID: 37)', '2025-06-01 12:37:37', '127.0.0.1'),
(620, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:37:38', '127.0.0.1'),
(621, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 12:37:42', '127.0.0.1'),
(622, 1, 'derius', 'Membuka halaman edit pasangan dengan ID 10', '2025-06-01 12:37:44', '127.0.0.1'),
(623, 1, 'derius', 'Memperbarui data pasangan dengan ID 10', '2025-06-01 12:37:47', '127.0.0.1'),
(624, 1, 'derius', 'Melihat semua data pasangan', '2025-06-01 12:37:48', '127.0.0.1'),
(625, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:37:50', '127.0.0.1'),
(626, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:37:53', '127.0.0.1'),
(627, 1, 'derius', 'Menambahkan user baru: coklat (ID: 38)', '2025-06-01 12:38:14', '127.0.0.1'),
(628, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:38:15', '127.0.0.1'),
(629, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:38:17', '127.0.0.1'),
(630, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:38:26', '127.0.0.1'),
(631, 1, 'derius', 'Menambahkan user baru: dadad (ID: 39)', '2025-06-01 12:38:49', '127.0.0.1'),
(632, 1, 'derius', 'Membuka tabel user', '2025-06-01 12:38:50', '127.0.0.1'),
(633, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:38:52', '127.0.0.1'),
(634, 1, 'derius', 'Melihat pohon keluarga dengan filter marga ID: 6', '2025-06-01 12:38:59', '127.0.0.1'),
(635, 1, 'derius', 'Melihat pohon keluarga tanpa filter', '2025-06-01 12:39:03', '127.0.0.1'),
(636, 1, 'derius', 'Logout dari sistem', '2025-06-01 12:39:25', '127.0.0.1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `marga`
--

CREATE TABLE `marga` (
  `id_marga` int(11) NOT NULL,
  `nama_marga` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `marga`
--

INSERT INTO `marga` (`id_marga`, `nama_marga`, `created_at`, `updated_at`, `created_by`) VALUES
(6, 'daa', '2025-05-31 15:07:19', '2025-05-31 15:07:19', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_25_124643_make_id_ayah_ibu_nullable', 2),
(5, '2025_05_25_124729_make_id_ayah_ibu_nullable', 2),
(6, '2025_06_01_175322_create_settings_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasangan`
--

CREATE TABLE `pasangan` (
  `id_pasangan` int(11) NOT NULL,
  `id_suami` int(11) NOT NULL,
  `id_istri` int(11) NOT NULL,
  `tanggal_menikah` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasangan`
--

INSERT INTO `pasangan` (`id_pasangan`, `id_suami`, `id_istri`, `tanggal_menikah`, `status`, `created_at`, `updated_at`, `created_by`) VALUES
(10, 1, 37, '2025-06-18', 'menikah', '2025-06-01 19:35:46', '2025-06-01 19:37:47', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gH0A0MOzSxGFcQwlHcvJExhlj7Oy0AjqZ60bA8V5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 OPR/118.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1A1MnhWZHFKZzNrWDJIS1lXVGxxSGcxNHJTajJKZDdxclh1MXF2ZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1748806765);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'Pohon keluarga', '2025-06-01 11:00:59', '2025-06-01 11:00:59'),
(2, 'header_title', 'PK', '2025-06-01 11:00:59', '2025-06-01 11:00:59'),
(3, 'logo_path', 'logos/V8dOgKqxIVDi19u4ZcmtwU86IWPfOTC1gzkHxfOV.jpg', '2025-06-01 11:00:59', '2025-06-01 11:00:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` enum('superadmin','admin','user','kp') NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_ayah` int(10) DEFAULT NULL,
  `id_ibu` int(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_marga` int(11) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` timestamp NULL DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `name`, `level`, `email`, `id_ayah`, `id_ibu`, `password`, `foto`, `id_marga`, `reset_token`, `reset_token_expiry`, `jenis_kelamin`, `created_at`, `updated_at`) VALUES
(1, 'derius', 'superadmin', 'der@gmail.com', 0, 0, '$2y$12$IC2HQOjNa2.3K79EVObX6uuEF69lQjj5bQaRPSX0TgZLJj4TZprC2', 'da', 1, NULL, NULL, 'laki-laki', NULL, '2025-06-01 10:17:22'),
(37, 'kevin', 'user', 'de11r@gmail.com', NULL, NULL, '$2y$12$KW7oUK913VO4.a25GXPH4ebezGUDv2T.Sx9M5XFMyYPbWThynRFcS', 'foto_user/GVqo5v2zlnKxObHQFv5VrEtXL9GYV4VKsAQS4Ksj.jpg', 6, NULL, NULL, 'perempuan', '2025-06-01 12:37:37', '2025-06-01 12:37:37'),
(38, 'coklat', 'user', 'cdda@gmail.com', 1, 37, '$2y$12$zrasTlopPUtOzTU7rT9/4.OkYhuh4KhAcx2iNn4KWnr6WcForH0Xi', 'foto_user/KFnkbzWDtfoAtt2MB5EAMFBBenKTrFlQb6tCGHiL.jpg', 6, NULL, NULL, 'laki-laki', '2025-06-01 12:38:14', '2025-06-01 12:38:14'),
(39, 'dadad', 'user', 'dadad@gmail.com', 1, 37, '$2y$12$BWOKOAszpwaCehLye4E95eTkcx3fmJCw1QGugBx9O4jwBqZ2Bc47e', 'foto_user/59322ZJl9XVS8gkHnUKTlY8CvPdr05PcraEM6Jzf.jpg', 6, NULL, NULL, 'laki-laki', '2025-06-01 12:38:49', '2025-06-01 12:38:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id_activity`);

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
-- Indeks untuk tabel `marga`
--
ALTER TABLE `marga`
  ADD PRIMARY KEY (`id_marga`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasangan`
--
ALTER TABLE `pasangan`
  ADD PRIMARY KEY (`id_pasangan`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=637;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `marga`
--
ALTER TABLE `marga`
  MODIFY `id_marga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pasangan`
--
ALTER TABLE `pasangan`
  MODIFY `id_pasangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
