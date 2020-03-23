-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2020 pada 18.53
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `activity_data` text DEFAULT NULL,
  `activity_time` datetime NOT NULL,
  `activity_ip_address` varchar(15) DEFAULT NULL,
  `activity_device` varchar(32) DEFAULT NULL,
  `activity_os` varchar(16) DEFAULT NULL,
  `activity_browser` varchar(16) DEFAULT NULL,
  `activity_location` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `activity_logs`
--

INSERT INTO `activity_logs` (`activity_id`, `user_id`, `company_id`, `activity_type`, `activity_data`, `activity_time`, `activity_ip_address`, `activity_device`, `activity_os`, `activity_browser`, `activity_location`) VALUES
(1, 0, 0, 'Login to system', 'Login via web browser', '2020-03-03 10:43:07', '103.121.18.126', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(2, 0, 0, 'Login to system', 'Login via web browser', '2020-03-04 15:34:27', '103.121.18.38', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(3, 0, 0, 'Login to system', 'Login via web browser', '2020-03-05 18:01:55', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(4, 0, 0, 'Adding data', 'Menambahkan data iklan (IBM Good)', '2020-03-05 18:06:35', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(5, 0, 0, 'Adding data', 'Menambahkan data slider', '2020-03-05 18:52:54', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(6, 0, 0, 'Deleting data', 'Delete data slider', '2020-03-05 18:53:52', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(7, 0, 0, 'Adding data', 'Menambahkan data slider', '2020-03-05 18:54:19', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(8, 0, 0, 'Updating data', 'Memperbarui data iklan ()', '2020-03-05 18:55:57', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(9, 0, 0, 'Updating data', 'Updating data image slider', '2020-03-05 18:56:24', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(10, 0, 0, 'Updating data', 'Updating data image slider', '2020-03-05 18:56:36', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(11, 0, 0, 'Login to system', 'Login via web browser', '2020-03-06 13:42:53', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(12, 0, 0, 'Adding data', 'Menambahkan data berita (Tes berita)', '2020-03-06 14:35:04', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(13, 0, 0, 'Login to system', 'Login via web browser', '2020-03-09 08:43:03', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(14, 0, 0, 'Updating data', 'Updating data image slider', '2020-03-09 08:45:50', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(15, 0, 0, 'Updating data', 'Updating data image slider', '2020-03-09 08:46:19', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(16, 0, 0, 'Updating data', 'Updating data image slider', '2020-03-09 08:46:45', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(17, 0, 0, 'Updating data', 'Memperbarui data cover (Detail of News)', '2020-03-09 08:54:06', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(18, 37, 0, 'Adding data', 'Menambahkan data subscriber', '2020-03-09 17:13:37', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', '-0.789275,113.92132699999999'),
(19, 37, 0, 'Adding data', 'Menambahkan data subscriber', '2020-03-09 17:15:35', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', '-0.789275,113.92132699999999'),
(20, 0, 0, 'Login to system', 'Login via web browser', '2020-03-10 09:27:32', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(21, 0, 0, 'Login to system', 'Login via web browser', '2020-03-11 12:02:36', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(22, 0, 0, 'Login to system', 'Login via web browser', '2020-03-11 12:03:43', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(23, 0, 0, 'Login to system', 'Login via web browser', '2020-03-11 12:29:13', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(24, 0, 0, 'Login to system', 'Login via web browser', '2020-03-11 16:47:49', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(25, 0, 0, 'Login to system', 'Login via web browser', '2020-03-12 08:54:30', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(26, 0, 0, 'Login to system', 'Login via web browser', '2020-03-12 09:31:37', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(27, 0, 0, 'Updating data', 'Memperbarui kata sandi akun (Administrator)', '2020-03-12 09:31:52', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(28, 0, 0, 'Login to system', 'Login via web browser', '2020-03-12 09:31:57', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(29, 0, 0, 'Updating data', 'Memperbarui kata sandi akun (Administrator)', '2020-03-12 09:41:16', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(30, 0, 0, 'Updating data', 'Memperbarui data profil (Administratorr)', '2020-03-12 09:41:21', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(31, 0, 0, 'Updating data', 'Memperbarui data profil (Administrator)', '2020-03-12 09:41:24', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(32, 0, 0, 'Login to system', 'Login via web browser', '2020-03-12 12:41:46', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(33, 0, 0, 'Updating data', 'Memperbarui data profil (Administrator)', '2020-03-12 12:41:57', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(34, 0, 0, 'Updating data', 'Memperbarui data profil (Administrator)', '2020-03-12 12:44:06', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(35, 0, 0, 'Login to system', 'Login via web browser', '2020-03-16 15:27:36', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(36, 0, 0, 'Adding data', 'Menambahkan data partner (Yahoo)', '2020-03-16 15:40:08', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(37, 0, 0, 'Deleting data', 'Deleted partner data (Yahoo)', '2020-03-16 15:42:11', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(38, 0, 0, 'Updating data', 'Memperbarui data partner ()', '2020-03-16 15:52:12', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(39, 0, 0, 'Updating data', 'Memperbarui data partner (TEXT)', '2020-03-16 15:53:28', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(40, 0, 0, 'Login to system', 'Login via web browser', '2020-03-16 16:44:40', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL),
(41, 0, 0, 'Deleting subscriber\'s data', 'Delete subscriber\'s data (m.fakhirrizal@gmail.com)', '2020-03-16 16:52:25', '::1', 'PC', 'Windows 10', 'Chrome 80.0.3987', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(9) NOT NULL,
  `id_kategori_berita` varchar(20) NOT NULL,
  `judul` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `berita` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `tags` text DEFAULT NULL,
  `video_link` text DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `counter` int(9) DEFAULT NULL,
  `created_by` int(9) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori_berita`, `judul`, `berita`, `tags`, `video_link`, `thumbnail`, `counter`, `created_by`, `created_at`) VALUES
(0, '0,1,3,6', 'Great Single Party last Saturday！Best wishes to all lovers!', '', NULL, NULL, '5.jpg', 62, 0, '2020-02-29 08:15:23'),
(1, '0,3', '让浙江和世界一起转动', '', NULL, NULL, '6.jpg', 30, 0, '2020-02-29 08:29:30'),
(2, '0,3', 'Grand Opening Ceremony', '', NULL, NULL, '10.jpg', 34, 0, '2020-02-29 09:00:00'),
(3, '0,1,3', 'Bushfire Fundraising Chinese New Year Dinner by QCF and LCBC', '2019 is going very quickly and we hope this year of the Pig 🐖 has been a great year to you, we are counting down on the days to the New Year of the Rat 🐀 starting on the 25th of January 2020.\r\n\r\nQueensland Chinese Forum (QCF) once again will be partnering up with Lions Club of Brisbane Chinese (LCBC) to celebrate this signature festival.\r\n\r\nThe President of the Queensland Chinese Forum Daniel Wong, on behalf of the QCF executive committee and 20 member associations, and together with the President of the Lions Club of Brisbane Chinese – 布里斯本華人獅子會 MD 201Q1, Lion Kenny MA, we would like to invite your presence at our Chinese New Year Celebration Dinner, details as below:\r\n\r\n🐀 Date: Sunday, 9th February 2020\r\n🐀 Time: 5:30pm for 6:00pm Start\r\n🐀 Venue: Landmark Restaurant, Sunnybank Plaza Shopping Centre\r\n🐀 Dress Code: National or Business Attire\r\n🐀 Cost: $78 per person ($10 will be donated towards bushfire appeal)\r\n🐀 RSVP BY: Monday, 3rd February 2020\r\n\r\nPayment can be made via the below Trybooking link:\r\nhttps://www.trybooking.com/BGVXU', NULL, NULL, '18.jpg', 33, 0, '2020-02-29 09:03:00'),
(4, '0,1,3', 'Final Call！', '', NULL, NULL, '19.jpg', 34, 0, '2020-02-29 09:04:00'),
(5, '0,1,3', 'Happy Chinese New Year and have a great Year of Rooster!', '', NULL, NULL, '20.jpg', 34, 0, '2020-02-29 09:08:00'),
(6, '0,1,3', '澳大利亚浙江侨团联合会成立庆典-2017.11.07@墨尔本', '', NULL, NULL, '37.jpg', 5, 0, '2020-02-28 09:21:14'),
(7, '0,1,3,6', 'Single Party is coming again! Do not miss the chance to meet new friends!', '', NULL, NULL, NULL, NULL, 0, '2020-02-28 09:23:21'),
(8, '0,3', 'General Committee', 'President and Co-Founder: ZHOU Minghu (Ming)<br>\r\nHonorary Advisor: Mayor Luke SMITH, City of Logan<br>\r\nHonorary Advisor: Po-Hsin SHIH (Paul)<br>\r\nMedia Advisor: LU Yiping (David)<br>\r\nStanding Vice President / President of Zhejiang Chamber of Commerce: YU Ruqiang (Jorce)<br>\r\nStanding Vice President: SHEN Kai<br>\r\nPresident of Fellow Provincials: WU Yiyun (William)<br>\r\nTreasury: LIU Ruonan (Jessica)<br>\r\nTreasury Supervisor: REN Gang (Albert)<br>\r\nSecretary General: LIN Huiming<br>\r\nDeputy Secretary: QI Xiaying<br>\r\nSecretary: ZHOU Qian (Sissy)<br>\r\nStanding Vice-President of Fellow Provincials: YU Jie (Sky)<br>\r\nVice President of Zhejiang Chamber of Commerce: CHEN Chao (Vincent)<br>\r\nVice President of Zhejiang Chamber of Commerce: TONG Xingwei (Jay)', 'Organization,Business', NULL, '41.jpg', 3, 0, '2020-02-28 09:14:14'),
(9, '0,3,7', '3rd Anniversary', 'QLD Zhejiang United Association 3rd Anniversary & Cultural Creative Collection Showcase<br>Venue: QLD Parliament House', NULL, 'https://www.youtube.com/watch?v=Dj0am0D1iu0', '11.jpg', 12, 0, '2020-03-04 03:08:14'),
(11, '1', 'sdf', 'sdf', 'HP,Murah', NULL, NULL, NULL, 0, '2020-03-02 10:16:26'),
(12, '1', 'sdfjjj', 'sdfjjj', NULL, NULL, NULL, NULL, 0, '2020-03-02 10:16:30'),
(13, '1', 'fghfg', 'ghfgh', NULL, NULL, NULL, NULL, 0, '2020-03-10 10:16:33'),
(14, '1', 'qq', 'qq', NULL, NULL, NULL, 3, 0, '2020-03-10 10:16:36'),
(15, '1', '5', '5', NULL, NULL, NULL, NULL, 0, '2020-03-09 10:16:39'),
(16, '1', 'h', 'h', '', NULL, NULL, NULL, 0, '2020-03-03 10:16:44'),
(17, '1', 'j', 'j', NULL, NULL, NULL, NULL, 0, '2020-03-03 10:16:46'),
(18, '1', 'l', 'l', NULL, NULL, NULL, 2, 0, '2020-03-26 10:16:55'),
(19, ' 1', '6575', '567', NULL, NULL, NULL, NULL, 0, '2020-03-06 10:16:55'),
(20, '0,7,10', 'Tes berita', '<p>Tes berita<br></p>', 'HP,Second,Technology', 'https://www.youtube.com/watch?v=AMH7ypyl86o', '', 1, 0, '2020-03-06 14:35:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cover`
--

CREATE TABLE `cover` (
  `id_cover` int(9) NOT NULL,
  `page` text NOT NULL,
  `title` text DEFAULT NULL,
  `file` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cover`
--

INSERT INTO `cover` (`id_cover`, `page`, `title`, `file`, `created_at`, `created_by`) VALUES
(0, 'Detail News', 'Detail of News', '7.jpg', '0000-00-00 00:00:00', 0),
(1, 'Contact', 'Contact', '4.jpg', '0000-00-00 00:00:00', 0),
(2, 'Event Detail', 'Detail of Event', '3.jpg', '0000-00-00 00:00:00', 0),
(3, 'News Category', 'Category of News', '2.jpg', '0000-00-00 00:00:00', 0),
(4, 'About Us', 'About Us', '1.jpg', '0000-00-00 00:00:00', 0),
(5, 'Searching', 'Searching Result', '5.jpg', '0000-00-00 00:00:00', 0),
(6, 'Tags', 'Tags', '6.jpg', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(9) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_pelaksanaan` date NOT NULL,
  `tempat` text DEFAULT NULL,
  `penyelenggara` text DEFAULT NULL,
  `poster` text DEFAULT NULL,
  `created_by` int(9) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `judul`, `deskripsi`, `tanggal_pelaksanaan`, `tempat`, `penyelenggara`, `poster`, `created_by`, `created_at`) VALUES
(0, 'HUT Semarang', NULL, '2020-03-18', 'Balaikota', 'Pemkot Semarang', NULL, 0, '2020-03-01 00:00:00'),
(1, 'HUT Jawa Tengah', NULL, '2020-03-04', 'Masjid Agung Jawa Tengah', 'Pemrov Jateng', NULL, 0, '2020-03-01 00:00:00'),
(2, 'Jamda Jogja Vespa Comunity', 'Guyub rukun karo sedelur se-vespa', '2020-03-19', 'Bantul', 'Jogja Vespa Comunity', '21.jpg', 0, '2020-03-01 03:10:11'),
(3, 'Hari Peduli Sampah Nasional', 'Memperingati Hari Sampah Nasional, Earth Hour Indonesia menyelenggarakan pengumpulan sampah di daerah sekitar Monas sebagai wujud cinta Indonesia dan cinta Dunia', '2020-03-19', 'Tugu Monas', 'Earth Hour Indonesia', NULL, 0, '0000-00-00 00:00:00'),
(4, 'Vespa World Days 2020', 'First held in 1954 to 2006 – named the Eurovespa event.\r\n\r\nEurovespa takes place every year from 1954 to 2006 (with a break in the 70s): Vespa lovers from all over Europe and even more come together for the biggest and most famous rally of its kind across the world. The last Eurovespa was held in Turin, Italy in 2006.\r\n\r\nIn 2006 the Piaggio group and the Piaggio Foundation created the Vespa World Club intending to promote, unite, and coordinating all Vespa Clubs throughout the world. In 2007 the name of the event was changed to Vespa World Days.\r\n\r\nVespa World Days 2020 was held at Mertasari Beach in Bali on July 23-26, 2020 and Dewata Scooter Club was the host to host the VWD 2020 Bali.\r\n\r\nFor further information and registration visit vespaworlddays2020.id', '2020-07-22', 'Mertasari Beach Bali', 'Dewata Scooter Club', '21.jpg', 0, '0000-00-00 00:00:00'),
(5, 'Pameran Perhiasan Reino Jewellery', 'Pameran Perhiasan Reino Jewellery. 23 Feb – 8 Mar, di Level 21 Mall – Denpasar. 081399898003 (Telp & Whatsapp) 0361 4747892 (Galeri)\r\n\r\nJangan lewatkan promosi spesial untuk anda selama pameran berlangsung:\r\n• Cicilan 0% hingga 12 Bulan (Dengan BCA & Mandiri\r\n• Super diskon 40% + 10% ALL ITEMS\r\n• Perhiasan Berlian mulai dari Rp 2.800.000,-\r\n• Souvenir exclusive disetiap pembelian\r\n• Gratis konsultasi perhiasan (perhitungan dan pembuatan perhiasan dengan desain anda sendiri)\r\n\r\nReino Jewellery menggunakan berlian eropa (F/VVS) dan emas 18 karat (white / yellow / rose gold). Kunjungi kami segera dan dapatkan perhiasan kesukaan anda denga harga super spesial.', '2020-03-08', 'Level 21 Mall – Denpasar', 'Reino Jewellery', NULL, 0, '2020-03-01 03:07:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE `iklan` (
  `id_iklan` int(9) NOT NULL,
  `advertiser` text NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
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
(0, '', '', NULL, '2.jpg', '1970-01-01', '1970-01-01', NULL, 'displayed', 0, '2020-02-29 07:24:34'),
(1, 'Yahoo', 'Come Join To Our Product!', 'Lets try and enjoy when you choosing yahoo mail to support your daily activity', '1.jpg', '2020-04-01', '2020-04-30', 1000000, 'in the queue', 0, '2020-03-01 03:08:08'),
(2, 'IBM', 'IBM Good', 'IBM Good', '2.jpg', '2020-02-01', '2020-03-31', 800000, 'in the queue', 0, '0000-00-00 00:00:00');

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
(6, 'Lifestyle'),
(7, 'Videos'),
(8, 'Travel'),
(9, 'Foods'),
(10, 'Tech');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_berita`
--

CREATE TABLE `komentar_berita` (
  `id_komentar_berita` int(9) NOT NULL,
  `id_parent_comment` int(9) DEFAULT NULL,
  `id_berita` int(9) NOT NULL,
  `user_id` int(9) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `komentar` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0=Pending,1=Published'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id` int(9) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
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
-- Struktur dari tabel `partner`
--

CREATE TABLE `partner` (
  `id_partner` int(9) NOT NULL,
  `name` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_by` int(9) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `partner`
--

INSERT INTO `partner` (`id_partner`, `name`, `logo`, `start_date`, `end_date`, `created_by`, `created_at`) VALUES
(0, NULL, '5.jpg', '2020-03-01', '2020-03-31', 0, '0000-00-00'),
(1, NULL, '1.jpg', '0000-00-00', '0000-00-00', 0, '0000-00-00'),
(2, 'TEXT', '2.jpg', '2020-11-29', '2020-11-29', 0, '0000-00-00'),
(3, NULL, '3.jpg', '0000-00-00', '0000-00-00', 0, '0000-00-00'),
(4, NULL, '4.jpg', '0000-00-00', '0000-00-00', 0, '0000-00-00'),
(5, NULL, '6.jpg', '0000-00-00', '0000-00-00', 0, '0000-00-00'),
(6, NULL, '7.jpg', '0000-00-00', '0000-00-00', 0, '0000-00-00'),
(7, NULL, '8.jpg', '0000-00-00', '0000-00-00', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(9) NOT NULL,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `file` text NOT NULL,
  `created_by` int(9) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `title`, `description`, `file`, `created_by`, `created_at`) VALUES
(0, 'Party Jokes Startling But Unnecessary', '', '4.jpg', 0, '2020-03-05 18:25:47'),
(1, 'Party Jokes Startling But Unnecessary', '', '5.jpg', 0, '2020-03-05 18:27:34'),
(2, 'Party Jokes Startling But Unnecessary', NULL, '6.jpg', 0, '2020-03-05 18:26:48');

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
(1, 'fakhir_rizal@hotmail.com', 5, '2020-02-26 13:32:16'),
(2, 'bokir.rizal@gmail.com', 2, '2020-02-06 11:18:36'),
(3, 'r@fgh.fghfh', NULL, '2020-03-09 17:13:37'),
(4, 'sdf@sfsd.dfg', NULL, '2020-03-09 17:15:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(9) UNSIGNED NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `fullname` text NOT NULL,
  `photo` text DEFAULT NULL,
  `total_login` int(9) UNSIGNED NOT NULL DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `login_attempts` int(9) UNSIGNED DEFAULT 0,
  `last_login_attempt` datetime DEFAULT NULL,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text DEFAULT NULL,
  `ip_address` text DEFAULT NULL,
  `is_active` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `verification_token` varchar(128) DEFAULT NULL,
  `recovery_token` varchar(128) DEFAULT NULL,
  `unlock_token` varchar(128) DEFAULT NULL,
  `created_by` int(9) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(9) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int(9) UNSIGNED DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `fullname`, `photo`, `total_login`, `last_login`, `last_activity`, `login_attempts`, `last_login_attempt`, `remember_time`, `remember_exp`, `ip_address`, `is_active`, `verification_token`, `recovery_token`, `unlock_token`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`, `deleted`) VALUES
(0, 'admin', '1', 'Administrator', NULL, 37, '2020-03-16 16:44:40', '2020-03-16 16:44:40', 41, '2020-03-16 16:44:40', NULL, NULL, '::1', 1, NULL, NULL, NULL, 0, '2019-12-07 22:15:17', NULL, NULL, NULL, NULL, 0),
(1, 'adm', '1', 'Administrator', NULL, 30, '2020-02-24 11:32:19', '2020-02-24 11:32:19', 30, '2020-02-24 11:32:19', NULL, NULL, '::1', 1, NULL, NULL, NULL, 0, '2019-12-08 23:32:46', NULL, NULL, NULL, NULL, 0);

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
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(9) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int(9) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
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
  `user_id` int(9) UNSIGNED NOT NULL DEFAULT 0,
  `role_id` int(9) UNSIGNED NOT NULL DEFAULT 0
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
  `device` text DEFAULT NULL,
  `os` text DEFAULT NULL,
  `browser` text DEFAULT NULL,
  `counter` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `visitor`
--

INSERT INTO `visitor` (`id_visitor`, `ip_address`, `last_access`, `device`, `os`, `browser`, `counter`) VALUES
(1, '103.121.18.73', '2020-02-27 13:58:54', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 1),
(2, '103.121.18.35', '2020-02-27 13:58:55', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 1),
(3, '180.246.101.104', '2020-02-28 08:37:49', 'PC', 'Android', 'Chrome 80.0.3987.117', 1),
(4, '114.125.108.175', '2020-02-28 09:39:56', 'PC', 'Android', 'Chrome 80.0.3987.117', 1),
(5, '43.229.21.114', '2020-03-05 09:34:49', 'PC', 'Windows 10', 'Opera 66.0.3515.115', 26),
(6, '103.121.18.76', '2020-03-02 18:26:08', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 6),
(7, '103.121.18.24', '2020-03-04 15:47:46', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 6),
(8, '103.121.18.79', '2020-02-28 11:05:42', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 3),
(9, '103.121.18.27', '2020-02-28 11:06:04', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 1),
(10, '103.121.18.67', '2020-02-28 11:32:30', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 2),
(11, '103.121.18.119', '2020-02-28 11:39:41', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 1),
(12, '103.121.18.51', '2020-02-28 11:49:22', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(13, '114.124.161.185', '2020-02-28 23:12:39', 'PC', 'Android', 'Chrome 80.0.3987.119', 3),
(14, '36.80.121.32', '2020-02-29 22:49:38', 'PC', 'Android', 'Chrome 80.0.3987.117', 5),
(15, '115.178.236.45', '2020-03-01 07:09:31', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(16, '180.254.249.228', '2020-03-01 22:14:18', 'PC', 'Android', 'Chrome 80.0.3987.117', 8),
(17, '114.124.199.178', '2020-03-01 20:33:33', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(18, '115.178.236.0', '2020-03-02 01:17:24', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 19),
(19, '103.121.18.126', '2020-03-04 14:47:49', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 10),
(20, '103.121.18.68', '2020-03-02 09:21:13', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(21, '103.121.18.26', '2020-03-05 09:28:04', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 2),
(22, '103.121.18.48', '2020-03-02 13:02:55', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 8),
(23, '103.121.18.107', '2020-03-02 10:59:56', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(24, '103.121.18.55', '2020-03-02 11:09:30', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 3),
(25, '103.121.18.15', '2020-03-02 11:34:45', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 4),
(26, '103.121.18.113', '2020-03-02 11:36:14', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 8),
(27, '103.121.18.21', '2020-03-02 11:35:17', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 3),
(28, '167.172.97.238', '2020-03-02 15:18:54', '', '', ' ', 1),
(29, '103.121.18.8', '2020-03-02 16:13:35', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 5),
(30, '103.121.18.100', '2020-03-02 16:13:33', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(31, '103.121.18.38', '2020-03-03 09:49:18', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 5),
(32, '103.121.18.50', '2020-03-02 16:49:20', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(33, '103.121.18.88', '2020-03-02 16:54:19', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 3),
(34, '103.121.18.122', '2020-03-02 16:55:43', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 3),
(35, '103.121.18.17', '2020-03-02 16:50:33', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(36, '103.121.18.30', '2020-03-02 17:02:57', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(37, '114.124.244.50', '2020-03-03 13:07:20', 'PC', 'Android', 'Chrome 80.0.3987.119', 5),
(38, '103.121.18.77', '2020-03-03 13:53:13', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(39, '103.121.18.91', '2020-03-03 14:00:16', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(40, '103.121.18.39', '2020-03-03 14:00:17', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(41, '204.187.14.76', '2020-03-03 16:35:43', 'PC', 'Linux', 'Chrome 75.0.3770.100', 2),
(42, '182.1.114.55', '2020-03-03 23:07:02', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(43, '103.121.18.105', '2020-03-04 08:26:58', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(44, '103.121.18.2', '2020-03-04 14:47:36', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(45, '173.252.83.22', '2020-03-04 14:48:10', '', 'Unknown Platform', ' ', 1),
(46, '173.252.83.15', '2020-03-04 14:48:16', '', 'Unknown Platform', ' ', 1),
(47, '173.252.83.11', '2020-03-04 14:48:17', '', 'Unknown Platform', ' ', 1),
(48, '103.121.18.62', '2020-03-04 15:00:20', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(49, '103.121.18.110', '2020-03-05 15:30:24', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 5),
(50, '103.121.18.116', '2020-03-04 16:09:23', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(51, '103.121.18.123', '2020-03-04 16:37:08', 'PC', 'Android', 'Chrome 80.0.3987.119', 3),
(52, '114.124.212.230', '2020-03-04 17:37:47', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(53, '114.124.213.199', '2020-03-04 17:37:51', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(54, '114.124.212.86', '2020-03-04 17:38:57', 'PC', 'Linux', 'Chrome 80.0.3987.119', 2),
(55, '114.124.245.119', '2020-03-04 17:39:11', 'PC', 'Linux', 'Chrome 80.0.3987.119', 1),
(56, '103.121.18.66', '2020-03-05 13:06:31', 'PC', 'Android', 'Chrome 80.0.3987.119', 2),
(57, '118.96.168.100', '2020-03-05 08:05:09', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(58, '103.121.18.22', '2020-03-05 09:06:26', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 2),
(59, '::1', '2020-03-20 13:28:54', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 243);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor_detail`
--

CREATE TABLE `visitor_detail` (
  `id_visitor` int(9) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `last_access` time NOT NULL,
  `device` text DEFAULT NULL,
  `os` text DEFAULT NULL,
  `browser` text DEFAULT NULL,
  `counter` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `visitor_detail`
--

INSERT INTO `visitor_detail` (`id_visitor`, `ip_address`, `date`, `last_access`, `device`, `os`, `browser`, `counter`) VALUES
(1, '103.121.18.73', '2020-02-27', '00:00:13', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 1),
(2, '103.121.18.35', '2020-02-27', '00:00:13', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 1),
(3, '180.246.101.104', '2020-02-28', '00:00:08', 'PC', 'Android', 'Chrome 80.0.3987.117', 1),
(4, '114.125.108.175', '2020-02-28', '00:00:09', 'PC', 'Android', 'Chrome 80.0.3987.117', 1),
(5, '43.229.21.114', '2020-02-28', '00:00:10', 'PC', 'Windows 10', 'Opera 66.0.3515.115', 5),
(6, '103.121.18.76', '2020-02-28', '00:00:10', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 4),
(7, '103.121.18.24', '2020-02-28', '00:00:10', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 2),
(8, '103.121.18.79', '2020-02-28', '00:00:11', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 3),
(9, '103.121.18.27', '2020-02-28', '00:00:11', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 1),
(10, '103.121.18.67', '2020-02-28', '00:00:11', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 2),
(11, '103.121.18.119', '2020-02-28', '00:00:11', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 1),
(12, '103.121.18.51', '2020-02-28', '00:00:11', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(13, '114.124.161.185', '2020-02-28', '00:00:23', 'PC', 'Android', 'Chrome 80.0.3987.119', 3),
(14, '36.80.121.32', '2020-02-28', '00:00:20', 'PC', 'Android', 'Chrome 80.0.3987.117', 1),
(15, '43.229.21.114', '2020-02-29', '00:00:19', 'PC', 'Windows 10', 'Opera 66.0.3515.115', 2),
(16, '36.80.121.32', '2020-02-29', '00:00:22', 'PC', 'Android', 'Chrome 80.0.3987.117', 4),
(17, '115.178.236.45', '2020-03-01', '00:00:07', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(18, '180.254.249.228', '2020-03-01', '00:00:22', 'PC', 'Android', 'Chrome 80.0.3987.117', 8),
(19, '114.124.199.178', '2020-03-01', '00:00:20', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(20, '115.178.236.0', '2020-03-02', '00:00:01', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 19),
(21, '103.121.18.126', '2020-03-02', '00:00:09', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 9),
(22, '103.121.18.68', '2020-03-02', '00:00:09', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(23, '103.121.18.26', '2020-03-02', '00:00:10', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(24, '103.121.18.48', '2020-03-02', '00:00:13', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 8),
(25, '103.121.18.107', '2020-03-02', '00:00:10', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(26, '103.121.18.55', '2020-03-02', '00:00:11', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 3),
(27, '103.121.18.15', '2020-03-02', '00:00:11', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 4),
(28, '43.229.21.114', '2020-03-02', '00:00:16', 'PC', 'Windows 10', 'Opera 66.0.3515.115', 10),
(29, '103.121.18.113', '2020-03-02', '00:00:11', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 8),
(30, '103.121.18.21', '2020-03-02', '00:00:11', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 3),
(31, '167.172.97.238', '2020-03-02', '00:00:15', '', '', ' ', 1),
(32, '103.121.18.8', '2020-03-02', '00:00:16', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 5),
(33, '103.121.18.100', '2020-03-02', '00:00:16', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(34, '103.121.18.76', '2020-03-02', '00:00:18', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(35, '103.121.18.24', '2020-03-02', '00:00:16', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(36, '103.121.18.38', '2020-03-02', '00:00:16', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(37, '103.121.18.50', '2020-03-02', '00:00:16', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(38, '103.121.18.88', '2020-03-02', '00:00:16', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 3),
(39, '103.121.18.122', '2020-03-02', '00:00:16', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 3),
(40, '103.121.18.17', '2020-03-02', '00:00:16', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(41, '103.121.18.30', '2020-03-02', '00:00:17', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(42, '114.124.244.50', '2020-03-02', '00:00:19', 'PC', 'Android', 'Chrome 80.0.3987.119', 2),
(43, '114.124.244.50', '2020-03-03', '00:00:13', 'PC', 'Android', 'Chrome 80.0.3987.119', 3),
(44, '103.121.18.38', '2020-03-03', '00:00:09', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 4),
(45, '103.121.18.24', '2020-03-03', '00:00:09', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(46, '43.229.21.114', '2020-03-03', '00:00:14', 'PC', 'Windows 10', 'Opera 66.0.3515.115', 8),
(47, '103.121.18.77', '2020-03-03', '00:00:13', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(48, '103.121.18.91', '2020-03-03', '00:00:14', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(49, '103.121.18.39', '2020-03-03', '00:00:14', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(50, '204.187.14.76', '2020-03-03', '00:00:16', 'PC', 'Linux', 'Chrome 75.0.3770.100', 2),
(51, '182.1.114.55', '2020-03-03', '00:00:23', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(52, '103.121.18.105', '2020-03-04', '00:00:08', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(53, '103.121.18.2', '2020-03-04', '00:00:14', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(54, '103.121.18.126', '2020-03-04', '00:00:14', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(55, '173.252.83.22', '2020-03-04', '00:00:14', '', 'Unknown Platform', ' ', 1),
(56, '173.252.83.15', '2020-03-04', '00:00:14', '', 'Unknown Platform', ' ', 1),
(57, '173.252.83.11', '2020-03-04', '00:00:14', '', 'Unknown Platform', ' ', 1),
(58, '103.121.18.62', '2020-03-04', '00:00:15', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(59, '103.121.18.24', '2020-03-04', '00:00:15', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(60, '103.121.18.110', '2020-03-04', '00:00:16', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 4),
(61, '103.121.18.116', '2020-03-04', '00:00:16', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(62, '103.121.18.123', '2020-03-04', '00:00:16', 'PC', 'Android', 'Chrome 80.0.3987.119', 3),
(63, '114.124.212.230', '2020-03-04', '00:00:17', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(64, '114.124.213.199', '2020-03-04', '00:00:17', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(65, '114.124.212.86', '2020-03-04', '00:00:17', 'PC', 'Linux', 'Chrome 80.0.3987.119', 2),
(66, '114.124.245.119', '2020-03-04', '00:00:17', 'PC', 'Linux', 'Chrome 80.0.3987.119', 1),
(67, '103.121.18.66', '2020-03-04', '00:00:18', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(68, '118.96.168.100', '2020-03-05', '00:00:08', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(69, '103.121.18.22', '2020-03-05', '00:00:09', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 2),
(70, '103.121.18.26', '2020-03-05', '00:00:09', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 1),
(71, '43.229.21.114', '2020-03-05', '00:00:09', 'PC', 'Windows 10', 'Opera 66.0.3515.115', 1),
(72, '103.121.18.66', '2020-03-05', '00:00:13', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(73, '103.121.18.110', '2020-03-05', '00:00:15', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 1),
(74, '::1', '2020-03-05', '00:00:19', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 11),
(75, '::1', '2020-03-06', '00:00:23', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 32),
(76, '::1', '2020-03-07', '00:00:23', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 2),
(77, '::1', '2020-03-09', '00:00:21', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 60),
(78, '::1', '2020-03-10', '00:00:10', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 13),
(79, '::1', '2020-03-14', '00:00:23', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 1),
(80, '::1', '2020-03-15', '00:00:23', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 1),
(81, '::1', '2020-03-16', '00:00:16', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 43),
(82, '::1', '2020-03-17', '00:00:13', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 1),
(83, '::1', '2020-03-19', '00:00:23', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 18),
(84, '::1', '2020-03-20', '00:00:13', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 61);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor_per_day`
--

CREATE TABLE `visitor_per_day` (
  `id_visitor` int(9) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `last_access` datetime NOT NULL,
  `device` text DEFAULT NULL,
  `os` text DEFAULT NULL,
  `browser` text DEFAULT NULL,
  `counter` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `visitor_per_day`
--

INSERT INTO `visitor_per_day` (`id_visitor`, `ip_address`, `last_access`, `device`, `os`, `browser`, `counter`) VALUES
(1, '103.121.18.73', '2020-02-27 13:58:54', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 1),
(2, '103.121.18.35', '2020-02-27 13:58:55', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 1),
(3, '180.246.101.104', '2020-02-28 08:37:49', 'PC', 'Android', 'Chrome 80.0.3987.117', 1),
(4, '114.125.108.175', '2020-02-28 09:39:56', 'PC', 'Android', 'Chrome 80.0.3987.117', 1),
(5, '43.229.21.114', '2020-03-05 09:34:49', 'PC', 'Windows 10', 'Opera 66.0.3515.115', 26),
(6, '103.121.18.76', '2020-03-02 18:26:08', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 6),
(7, '103.121.18.24', '2020-03-04 15:47:46', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 6),
(8, '103.121.18.79', '2020-02-28 11:05:42', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 3),
(9, '103.121.18.27', '2020-02-28 11:06:04', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 1),
(10, '103.121.18.67', '2020-02-28 11:32:30', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 2),
(11, '103.121.18.119', '2020-02-28 11:39:41', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 1),
(12, '103.121.18.51', '2020-02-28 11:49:22', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(13, '114.124.161.185', '2020-02-28 23:12:39', 'PC', 'Android', 'Chrome 80.0.3987.119', 3),
(14, '36.80.121.32', '2020-02-29 22:49:38', 'PC', 'Android', 'Chrome 80.0.3987.117', 5),
(15, '115.178.236.45', '2020-03-01 07:09:31', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(16, '180.254.249.228', '2020-03-01 22:14:18', 'PC', 'Android', 'Chrome 80.0.3987.117', 8),
(17, '114.124.199.178', '2020-03-01 20:33:33', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(18, '115.178.236.0', '2020-03-02 01:17:24', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 19),
(19, '103.121.18.126', '2020-03-04 14:47:49', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 10),
(20, '103.121.18.68', '2020-03-02 09:21:13', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(21, '103.121.18.26', '2020-03-05 09:28:04', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 2),
(22, '103.121.18.48', '2020-03-02 13:02:55', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 8),
(23, '103.121.18.107', '2020-03-02 10:59:56', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(24, '103.121.18.55', '2020-03-02 11:09:30', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 3),
(25, '103.121.18.15', '2020-03-02 11:34:45', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 4),
(26, '103.121.18.113', '2020-03-02 11:36:14', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 8),
(27, '103.121.18.21', '2020-03-02 11:35:17', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 3),
(28, '167.172.97.238', '2020-03-02 15:18:54', '', '', ' ', 1),
(29, '103.121.18.8', '2020-03-02 16:13:35', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 5),
(30, '103.121.18.100', '2020-03-02 16:13:33', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(31, '103.121.18.38', '2020-03-03 09:49:18', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 5),
(32, '103.121.18.50', '2020-03-02 16:49:20', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(33, '103.121.18.88', '2020-03-02 16:54:19', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 3),
(34, '103.121.18.122', '2020-03-02 16:55:43', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 3),
(35, '103.121.18.17', '2020-03-02 16:50:33', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(36, '103.121.18.30', '2020-03-02 17:02:57', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(37, '114.124.244.50', '2020-03-03 13:07:20', 'PC', 'Android', 'Chrome 80.0.3987.119', 5),
(38, '103.121.18.77', '2020-03-03 13:53:13', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(39, '103.121.18.91', '2020-03-03 14:00:16', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(40, '103.121.18.39', '2020-03-03 14:00:17', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(41, '204.187.14.76', '2020-03-03 16:35:43', 'PC', 'Linux', 'Chrome 75.0.3770.100', 2),
(42, '182.1.114.55', '2020-03-03 23:07:02', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(43, '103.121.18.105', '2020-03-04 08:26:58', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(44, '103.121.18.2', '2020-03-04 14:47:36', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 2),
(45, '173.252.83.22', '2020-03-04 14:48:10', '', 'Unknown Platform', ' ', 1),
(46, '173.252.83.15', '2020-03-04 14:48:16', '', 'Unknown Platform', ' ', 1),
(47, '173.252.83.11', '2020-03-04 14:48:17', '', 'Unknown Platform', ' ', 1),
(48, '103.121.18.62', '2020-03-04 15:00:20', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(49, '103.121.18.110', '2020-03-05 15:30:24', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 5),
(50, '103.121.18.116', '2020-03-04 16:09:23', 'PC', 'Windows 10', 'Chrome 80.0.3987.122', 1),
(51, '103.121.18.123', '2020-03-04 16:37:08', 'PC', 'Android', 'Chrome 80.0.3987.119', 3),
(52, '114.124.212.230', '2020-03-04 17:37:47', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(53, '114.124.213.199', '2020-03-04 17:37:51', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(54, '114.124.212.86', '2020-03-04 17:38:57', 'PC', 'Linux', 'Chrome 80.0.3987.119', 2),
(55, '114.124.245.119', '2020-03-04 17:39:11', 'PC', 'Linux', 'Chrome 80.0.3987.119', 1),
(56, '103.121.18.66', '2020-03-05 13:06:31', 'PC', 'Android', 'Chrome 80.0.3987.119', 2),
(57, '118.96.168.100', '2020-03-05 08:05:09', 'PC', 'Android', 'Chrome 80.0.3987.119', 1),
(58, '103.121.18.22', '2020-03-05 09:06:26', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 2),
(59, '::1', '2020-03-20 13:28:54', 'PC', 'Windows 10', 'Chrome 80.0.3987.132', 243);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori_berita` (`id_kategori_berita`),
  ADD KEY `user_id` (`created_by`);

--
-- Indeks untuk tabel `cover`
--
ALTER TABLE `cover`
  ADD PRIMARY KEY (`id_cover`),
  ADD KEY `user_id` (`created_by`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `user_id` (`created_by`);

--
-- Indeks untuk tabel `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id_iklan`),
  ADD KEY `user_id` (`created_by`);

--
-- Indeks untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kategori_berita`);

--
-- Indeks untuk tabel `komentar_berita`
--
ALTER TABLE `komentar_berita`
  ADD PRIMARY KEY (`id_komentar_berita`),
  ADD KEY `id_berita` (`id_berita`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_komentar_berita` (`id_parent_comment`);

--
-- Indeks untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id_partner`),
  ADD KEY `user_id` (`created_by`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`),
  ADD KEY `user_id` (`created_by`);

--
-- Indeks untuk tabel `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id_subscriber`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_index` (`username`),
  ADD KEY `is_active_index` (`is_active`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_index` (`name`),
  ADD KEY `company_id_index` (`company_id`) USING BTREE;

--
-- Indeks untuk tabel `user_to_role`
--
ALTER TABLE `user_to_role`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id_index` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id_visitor`),
  ADD UNIQUE KEY `ip_address` (`ip_address`);

--
-- Indeks untuk tabel `visitor_detail`
--
ALTER TABLE `visitor_detail`
  ADD PRIMARY KEY (`id_visitor`);

--
-- Indeks untuk tabel `visitor_per_day`
--
ALTER TABLE `visitor_per_day`
  ADD PRIMARY KEY (`id_visitor`),
  ADD UNIQUE KEY `ip_address` (`ip_address`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `activity_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `cover`
--
ALTER TABLE `cover`
  MODIFY `id_cover` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id_iklan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori_berita` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `komentar_berita`
--
ALTER TABLE `komentar_berita`
  MODIFY `id_komentar_berita` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `partner`
--
ALTER TABLE `partner`
  MODIFY `id_partner` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id_subscriber` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id_visitor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `visitor_detail`
--
ALTER TABLE `visitor_detail`
  MODIFY `id_visitor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `visitor_per_day`
--
ALTER TABLE `visitor_per_day`
  MODIFY `id_visitor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
