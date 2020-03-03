-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Mar 2020 pada 10.40
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_logs`
--

CREATE TABLE `activity_logs` (
  `activity_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `company_id` int(11) UNSIGNED NOT NULL,
  `activity_type` varchar(64) NOT NULL,
  `activity_data` text,
  `activity_time` datetime NOT NULL,
  `activity_ip_address` varchar(15) DEFAULT NULL,
  `activity_device` varchar(32) DEFAULT NULL,
  `activity_os` varchar(16) DEFAULT NULL,
  `activity_browser` varchar(16) DEFAULT NULL,
  `activity_location` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `activity_logs`
--

INSERT INTO `activity_logs` (`activity_id`, `user_id`, `company_id`, `activity_type`, `activity_data`, `activity_time`, `activity_ip_address`, `activity_device`, `activity_os`, `activity_browser`, `activity_location`) VALUES
(1, 0, 0, 'Login to system', 'Login via web browser', '2020-02-27 10:11:59', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(2, 0, 0, 'Updating data', 'Memperbarui data profil (Administratorrr)', '2020-02-27 11:25:56', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(3, 0, 0, 'Updating data', 'Memperbarui data profil (Administrator)', '2020-02-27 11:26:10', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(4, 0, 0, 'Updating data', 'Memperbarui data profil (Administrator)', '2020-02-27 11:26:23', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(5, 0, 0, 'Updating data', 'Memperbarui data profil (Administrator)', '2020-02-27 11:58:53', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(6, 0, 0, 'Updating data', 'Memperbarui kata sandi akun (Administrator)', '2020-02-27 12:00:53', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(7, 0, 0, 'Login to system', 'Login via web browser', '2020-02-27 14:24:40', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(8, 0, 0, 'Adding data', 'Menambahkan data berita (fd)', '2020-02-27 15:30:27', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(9, 0, 0, 'Adding data', 'Menambahkan data berita (ghf)', '2020-02-27 15:55:35', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(10, 0, 0, 'Updating data', 'Memperbarui data berita (ghf)', '2020-02-27 16:25:14', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(11, 0, 0, 'Updating data', 'Memperbarui data berita (jh)', '2020-02-27 16:25:44', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(12, 0, 0, 'Updating data', 'Memperbarui data berita (hk)', '2020-02-27 16:26:20', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(13, 0, 0, 'Login to system', 'Login via web browser', '2020-02-27 17:10:20', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(14, 0, 0, 'Updating data', 'Memperbarui data berita (jh)', '2020-02-27 17:12:56', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(15, 0, 0, 'Updating data', 'Memperbarui data berita (jh)', '2020-02-27 17:13:44', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(16, 0, 0, 'Updating data', 'Memperbarui data berita (jh)', '2020-02-27 17:14:03', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(17, 0, 0, 'Updating data', 'Memperbarui data berita (jh)', '2020-02-27 17:15:03', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(18, 0, 0, 'Updating data', 'Memperbarui data berita (jh)', '2020-02-27 17:18:07', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(19, 0, 0, 'Updating data', 'Memperbarui data berita (jh)', '2020-02-27 17:18:39', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(20, 0, 0, 'Login to system', 'Login via web browser', '2020-02-28 14:46:56', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(21, 0, 0, 'Deleting data', 'Menghapus data komentar berita (oleh df)', '2020-02-28 16:45:17', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(22, 0, 0, 'Deleting data', 'Menghapus data komentar berita (oleh fg)', '2020-02-28 16:47:45', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(23, 0, 0, 'Updating data', 'Menyetujui komentar (dari sdf)', '2020-02-28 16:52:51', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(9) NOT NULL,
  `id_kategori_berita` varchar(20) NOT NULL,
  `judul` text NOT NULL,
  `berita` text NOT NULL,
  `thumbnail` text,
  `counter` int(9) DEFAULT NULL,
  `created_by` int(9) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori_berita`, `judul`, `berita`, `thumbnail`, `counter`, `created_by`, `created_at`) VALUES
(0, '3', '0', '<h4><a href="dfgdfg" target="_blank">d</a>fgdfgdfg<b>d</b><img k=" data-filename=" xss="removed"></h4><ol><li>dfgdfg</li><li>dfg</li><li>dfg</li><li>dfgfdgdffd</li><li>dfg</li></ol><p>gdfg</p><ul><li>dfgdfg</li><li>dfg</li><li>dfg</li><li xss="removed">dfgdfgdfg</li><li xss="removed">fdg</li><li xss="removed">dfg</li><li xss="removed">fdg</li><li xss="removed">dfg</li></ul><h1>fdg<span xss="removed">dfgdfg</span><span xss="removed">dfgdfg</span><span xss="removed">?dfgdfgdfg</span><span xss="removed">?dfgdfg</span><span xss="removed">?dfgdfgdfgdfg</span></h1><h1><span xss="removed">dfdf<span xss="removed">dfgdfg</span><span xss="removed">dfgdfg</span></span></h1><pre><span xss="removed"><span xss="removed">fdfgdfgdfdfgdfg</span></span></pre><pre><span xss="removed"><span xss="removed"><a href="http://dfgdg" target="_blank">dfgd</a></span></span>&lt;iframe frameborder="0" src="//www.youtube.com/embed/FcZjiJfBkF8" width="640" height="360" class="note-video-clip"&gt;&lt;/iframe&gt;<span xss="removed"><span xss="removed"><a href="http://dfgdg" target="_blank">fg</a></span></span></pre><pre><span xss="removed"><span xss="removed">fdgdfg</span></span><img src="https://lh3.googleusercontent.com/proxy/CV4UTkV1te_Z8rnUIDF7Y7bYcgaf0JkQk3W6wWmmLyFyraW5JqKpApW8ARtSHJTn_WyekuM3Z6qtJvYMaOQGJELUB0qR8u7Z74BMYcmvkP0_" xss=removed></pre>', NULL, 1, 0, '2020-02-03 07:15:13'),
(1, '2', '1', '<p><img src="https://pbs.twimg.com/profile_images/823569976342773760/c2RLAG7h_400x400.jpg" xss=removed><br></p>', NULL, 2, 0, '2020-02-11 04:11:14'),
(2, '0,1', 'Semarang Kota Terbersih Se-ASEAN', 'sd', '', NULL, 0, '2020-02-27 15:30:24'),
(3, '0,1', '3', '<p><a>d</a><b>d</b></p><p><b>fgbhfg</b></p><p>dfvfdv<span xss=removed>dfvdfvdfv</span></p><table class="table table-bordered"><tbody><tr><td>df</td><td>fdv</td></tr><tr><td><br></td><td>fdv</td></tr><tr><td><br></td><td><br></td></tr></tbody></table><p><span xss=removed><br></span></p>', '', NULL, 0, '2020-02-27 15:55:32'),
(4, '3', '4', 'fdg', NULL, 3, 0, '2020-03-01 05:00:00'),
(5, '4', '5', 'fng', NULL, 2, 0, '2020-02-04 04:14:17'),
(6, '1', '6', 'President and Co-Founder: ZHOU Minghu (Ming)<br>\nHonorary Advisor: Mayor Luke SMITH, City of Logan<br>\nHonorary Advisor: Po-Hsin SHIH (Paul)<br>\nMedia Advisor: LU Yiping (David)<br>\nStanding Vice President / President of Zhejiang Chamber of Commerce: YU Ruqiang (Jorce)<br>\nStanding Vice President: SHEN Kai<br>\nPresident of Fellow Provincials: WU Yiyun (William)<br>\nTreasury: LIU Ruonan (Jessica)<br>\nTreasury Supervisor: REN Gang (Albert)<br>\nSecretary General: LIN Huiming<br>\nDeputy Secretary: QI Xiaying<br>\nSecretary: ZHOU Qian (Sissy)<br>\nStanding Vice-President of Fellow Provincials: YU Jie (Sky)<br>\nVice President of Zhejiang Chamber of Commerce: CHEN Chao (Vincent)<br>\nVice President of Zhejiang Chamber of Commerce: TONG Xingwei (Jay)', '18.jpg', 3, 0, '2020-03-17 00:00:00'),
(7, '2', '7', 'fng', NULL, 4, 0, '2020-03-09 00:00:00'),
(8, '2', '8', 'fng', NULL, 3, 0, '2020-03-01 04:00:00'),
(9, '2', '9', 'fdg', NULL, 4, 0, '2020-03-01 05:13:00'),
(10, '2', '10', 'fd', NULL, 3, 0, '2020-03-01 04:00:00'),
(11, '2', '11', 'e', NULL, 3, 0, '2020-03-01 04:00:00'),
(12, '0', '12', 'jjo', NULL, 5, 0, '2020-03-01 04:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(9) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text,
  `tanggal_pelaksanaan` date NOT NULL,
  `tempat` text,
  `penyelenggara` text,
  `poster` text,
  `created_by` int(9) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `judul`, `deskripsi`, `tanggal_pelaksanaan`, `tempat`, `penyelenggara`, `poster`, `created_by`, `created_at`) VALUES
(0, 'HUT Semarang', NULL, '2020-03-18', 'Balaikota', 'Pemkot Semarang', NULL, 0, '2020-03-01 00:00:00'),
(1, 'HUT Jawa Tengah', NULL, '2020-03-04', 'Masjid Agung Jawa Tengah', 'Pemrov Jateng', NULL, 0, '2020-03-01 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE `iklan` (
  `id_iklan` int(9) NOT NULL,
  `advertiser` text NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text,
  `banner` text NOT NULL,
  `start_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `price` int(11) DEFAULT NULL,
  `status` enum('in the queue','displayed','expired') NOT NULL,
  `created_by` int(9) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `iklan`
--

INSERT INTO `iklan` (`id_iklan`, `advertiser`, `judul`, `deskripsi`, `banner`, `start_date`, `expired_date`, `price`, `status`, `created_by`, `created_at`) VALUES
(1, 'Google', 'Google Ads', 'Google Ads', 'ads.jpg', '2020-03-01', '2020-03-31', 1000000, 'displayed', 0, '2020-02-29 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id_kategori_berita` int(9) NOT NULL,
  `kategori_berita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_berita`
--

INSERT INTO `kategori_berita` (`id_kategori_berita`, `kategori_berita`) VALUES
(0, 'News'),
(1, 'Social'),
(2, 'Sport'),
(3, 'Business'),
(4, 'Politic'),
(5, 'Health'),
(6, 'df'),
(7, 'sdf'),
(8, 'dsf'),
(9, 'dfs'),
(10, 'dfs'),
(11, 'dfs'),
(12, 'dd'),
(13, 'sdf'),
(14, 'zsdf'),
(15, 'zsdf'),
(16, 'zsdf'),
(17, 'zsdfvgvbgbb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_berita`
--

CREATE TABLE `komentar_berita` (
  `id_komentar_berita` int(9) NOT NULL,
  `id_parent_comment` int(9) DEFAULT NULL,
  `id_berita` int(9) NOT NULL,
  `user_id` int(9) DEFAULT NULL,
  `nama` text,
  `email` text,
  `komentar` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=Pending,1=Published'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar_berita`
--

INSERT INTO `komentar_berita` (`id_komentar_berita`, `id_parent_comment`, `id_berita`, `user_id`, `nama`, `email`, `komentar`, `created_at`, `status`) VALUES
(0, NULL, 2, NULL, 'Sharfina Aulia Puspasari', 'fina@hotmail.com', 'Bagus beritanya', '2020-02-28 14:48:30', '1'),
(1, NULL, 2, NULL, 'Dea Ayu Vindias Permata', 'dea@gmail.com', 'Admin lebih semangat buat posting berita ya!!!', '2020-02-28 15:00:00', '1'),
(2, 1, 2, NULL, 'Riyan A.', 'riyan@gmail.com', 'Masak?', '2020-03-02 04:12:12', '1'),
(3, NULL, 2, NULL, 'Fakhir Rizal', 'fakhir_rizal@hotmail.com', 'Keren', '2020-03-02 11:25:38', '0'),
(4, 0, 2, NULL, 'Imam', 'imam@gmail.com', 'Enggak', '2020-03-02 11:51:38', '0'),
(5, NULL, 2, NULL, 'Serra', 'serra@gmail.com', 'Bagus', '2020-03-02 11:52:04', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id` int(9) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscriber`
--

CREATE TABLE `subscriber` (
  `id_subscriber` int(9) NOT NULL,
  `email` text NOT NULL,
  `counter` int(9) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subscriber`
--

INSERT INTO `subscriber` (`id_subscriber`, `email`, `counter`, `created_at`) VALUES
(0, 'm.fakhirrizal@gmail.com', 5, '2020-02-13 08:27:10'),
(1, 'fakhir_rizal@hotmail.com', 6, '2020-02-26 13:32:16'),
(2, 'bokir.rizal@gmail.com', 3, '2020-02-06 11:18:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(9) UNSIGNED NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `fullname` text NOT NULL,
  `photo` text,
  `total_login` int(9) UNSIGNED NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `login_attempts` int(9) UNSIGNED DEFAULT '0',
  `last_login_attempt` datetime DEFAULT NULL,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `ip_address` text,
  `is_active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `verification_token` varchar(128) DEFAULT NULL,
  `recovery_token` varchar(128) DEFAULT NULL,
  `unlock_token` varchar(128) DEFAULT NULL,
  `created_by` int(9) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(9) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int(9) UNSIGNED DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `fullname`, `photo`, `total_login`, `last_login`, `last_activity`, `login_attempts`, `last_login_attempt`, `remember_time`, `remember_exp`, `ip_address`, `is_active`, `verification_token`, `recovery_token`, `unlock_token`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `deleted`) VALUES
(0, 'admin', 'g', 'Administrator', '', 25, '2020-02-28 14:46:56', '2020-02-28 14:46:56', 30, '2020-02-28 14:46:56', NULL, NULL, '::1', 1, NULL, NULL, NULL, 0, '2019-12-07 22:15:17', NULL, NULL, NULL, NULL, 0),
(1, 'adm', '1234', 'Administrator', NULL, 30, '2020-02-24 11:32:19', '2020-02-24 11:32:19', 30, '2020-02-24 11:32:19', NULL, NULL, '::1', 1, NULL, NULL, NULL, 0, '2019-12-08 23:32:46', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `company_id` int(9) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `definition` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `route` varchar(32) DEFAULT NULL,
  `created_by` int(9) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(9) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int(9) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `company_id`, `name`, `definition`, `description`, `route`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `deleted`) VALUES
(0, NULL, 'Super Admin', 'Super Administrator', NULL, 'admin_side/beranda', 0, '2018-10-27 17:52:08', NULL, NULL, NULL, NULL, 0),
(1, NULL, 'Admin', 'Administrator (Owner)', NULL, 'admin_side/beranda', 0, '2017-03-06 01:19:26', 2, '2018-10-27 18:55:37', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_to_role`
--

CREATE TABLE `user_to_role` (
  `user_id` int(9) UNSIGNED NOT NULL DEFAULT '0',
  `role_id` int(9) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_to_role`
--

INSERT INTO `user_to_role` (`user_id`, `role_id`) VALUES
(0, 0),
(1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `id_visitor` int(9) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `last_access` datetime NOT NULL,
  `device` text,
  `os` text,
  `browser` text,
  `counter` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `visitor`
--

INSERT INTO `visitor` (`id_visitor`, `ip_address`, `last_access`, `device`, `os`, `browser`, `counter`) VALUES
(0, '::1', '2020-03-02 16:37:51', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 184),
(1, '192.168.123.8', '2020-03-02 13:55:41', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(2, '192.168.123.7', '2020-03-02 13:54:41', 'PC', 'iOS', 'Safari 604.1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor_detail`
--

CREATE TABLE `visitor_detail` (
  `id_visitor` int(9) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `last_access` time NOT NULL,
  `device` text,
  `os` text,
  `browser` text,
  `counter` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `visitor_detail`
--

INSERT INTO `visitor_detail` (`id_visitor`, `ip_address`, `date`, `last_access`, `device`, `os`, `browser`, `counter`) VALUES
(0, '::1', '2020-02-27', '00:00:17', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 3),
(9, '::1', '2020-02-28', '00:00:14', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 15),
(10, '::1', '2020-03-01', '00:00:23', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 74),
(11, '::1', '2020-03-02', '00:00:16', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 88),
(12, '192.168.123.8', '2020-03-02', '00:00:13', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(13, '192.168.123.7', '2020-03-02', '00:00:13', 'PC', 'iOS', 'Safari 604.1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor_per_day`
--

CREATE TABLE `visitor_per_day` (
  `id_visitor` int(9) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `last_access` datetime NOT NULL,
  `device` text,
  `os` text,
  `browser` text,
  `counter` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `visitor_per_day`
--

INSERT INTO `visitor_per_day` (`id_visitor`, `ip_address`, `last_access`, `device`, `os`, `browser`, `counter`) VALUES
(0, '::1', '2020-03-02 16:37:51', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 181),
(1, '192.168.123.8', '2020-03-02 13:55:41', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(2, '192.168.123.7', '2020-03-02 13:54:41', 'PC', 'iOS', 'Safari 604.1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori_berita` (`id_kategori_berita`),
  ADD KEY `user_id` (`created_by`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `user_id` (`created_by`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id_iklan`),
  ADD KEY `user_id` (`created_by`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kategori_berita`);

--
-- Indexes for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  ADD PRIMARY KEY (`id_komentar_berita`),
  ADD KEY `id_berita` (`id_berita`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_komentar_berita` (`id_parent_comment`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id_subscriber`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_index` (`username`),
  ADD KEY `is_active_index` (`is_active`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_index` (`name`),
  ADD KEY `company_id_index` (`company_id`) USING BTREE;

--
-- Indexes for table `user_to_role`
--
ALTER TABLE `user_to_role`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id_index` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id_visitor`),
  ADD UNIQUE KEY `ip_address` (`ip_address`);

--
-- Indexes for table `visitor_detail`
--
ALTER TABLE `visitor_detail`
  ADD PRIMARY KEY (`id_visitor`);

--
-- Indexes for table `visitor_per_day`
--
ALTER TABLE `visitor_per_day`
  ADD PRIMARY KEY (`id_visitor`),
  ADD UNIQUE KEY `ip_address` (`ip_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `activity_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id_iklan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori_berita` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  MODIFY `id_komentar_berita` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id_subscriber` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id_visitor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `visitor_detail`
--
ALTER TABLE `visitor_detail`
  MODIFY `id_visitor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `visitor_per_day`
--
ALTER TABLE `visitor_per_day`
  MODIFY `id_visitor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
