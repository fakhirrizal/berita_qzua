-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Feb 2020 pada 07.03
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
(0, 0, 0, 'Login to system', 'Login via web browser', '2020-02-24 11:29:58', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(0, 1, 0, 'Login to system', 'Login via web browser', '2020-02-24 11:32:19', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(0, 0, 0, 'Login to system', 'Login via web browser', '2020-02-24 11:32:27', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(0, 0, 0, 'Login to system', 'Login via web browser', '2020-02-24 11:44:54', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(0, 0, 0, 'Adding data', 'Menambahkan data kategori berita', '2020-02-24 11:55:52', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL),
(0, 0, 0, 'Adding data', 'Menambahkan data subscriber', '2020-02-24 14:56:39', '::1', 'PC', 'Windows 10', 'Chrome 79.0.3945', NULL);

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
  `created_at` datetime NOT NULL,
  `created_by` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori_berita`, `judul`, `berita`, `thumbnail`, `counter`, `created_at`, `created_by`) VALUES
(0, '1,2,0', 'Lomba Futsal Tingkat Provinsi Jawa Tengah', '<div>\n								<p><strong>Futsal Competition KSE UNS 2020 Se-Jateng<br>\nTanggal :</strong> 20 – 21 Maret 2020<br>\n<strong>Tempat :</strong> GOR Wirayudha, Solo</p>\n<p><strong>Deskripsi Event :<br>\n</strong>KSE UNS memeriahkan dunia futsal Jateng dengan mengadakan turnamen futsal antar SMA sederajat se-Jateng. Turnamen ini diperuntukan untuk *siswa dalam Tahun ajaran 2019-2020* guna menumbuhkan sportifitas dan meningkatkan prestasi melalui semangat berkompetisi sehingga dapat terjalinnya keakraban antar siswa se-Jateng</p>\n<p><strong>Tema :</strong> Show Your Skill and Make Story, To Be Your History</p>\n<p><strong>Pendaftaran : </strong></p>\n<ul>\n<li>Tanggal Pendaftaran : 27 Januari – 28 Februari 2020</li>\n<li>Biaya Pendaftaran : Rp 350.000\n<ul>\n<li>WO : Rp 50.000</li>\n</ul>\n</li>\n<li>Link Pendaftaran : <a href="http://bit.ly/regist_FCKSEUNS">http://ly/regist_FCKSEUNS</a></li>\n</ul>\n<p><strong>Hadiah : </strong></p>\n<ul>\n<li>Juara 1 : Uang Pembinaan + Trofi + E-Sertifikat</li>\n<li>Juara 2 : Uang Pembinaan + Trofi + E-Sertifikat</li>\n<li>Juara 3 : Uang Pembinaan + Trofi + E-Sertifikat</li>\n</ul>\n<p><strong>More Information : </strong></p>\n<ul>\n<li>Shavira : 0896 7671 4199</li>\n</ul>							</div>', NULL, NULL, '2020-02-24 07:36:37', 0),
(1, '3,0', 'Cara Jitu Sukses Jualan Online', '<article class="article-post">\r\n<p>Ini eranya jualan online. Kebutuhan dari ujung rambut sampai ujung kaki, bisa Anda temukan di internet. Dengan kata lain, apa saja bisa Anda jual secara online.</p>\r\n<p>Namun, Anda tentunya tahu. Meski ada banyak kesempatan, tak semua orang punya kisah sukses jualan online. Tak sedikit online shop yang tutup di tengah jalan. Cerita-cerita macam inilah yang mungkin membuat anda keder berusaha.</p>\r\n<p>Tapi kami percaya, sukses adalah hak semua. Kami juga siap menemani Anda untuk #BuildSuccessOnline. Maka dari itu, kami akan bocorkan tips sukses berjualan online versi Niagahoster.</p>\r\n<p>Singkatnya, berikut adalah 10 tips untuk jualan online terlaris:</p>\r\n<ol><li><strong>Kenali nilai unik produk;</strong></li><li><strong>Ciptakan website toko online;</strong></li><li><strong>Pelajari data penjualan;</strong></li><li><strong>Eksekusi content marketing;</strong></li><li><strong>Aktifkan sosial media;</strong></li><li><strong>Coba strategi email marketing;</strong></li><li><strong>Optimalkan </strong><strong><em>word of mouth</em></strong><strong>;</strong></li><li><strong>Beriklan di channel media sosial;</strong></li><li><strong>Tarik pelanggan dengan promo;</strong></li><li><strong>Pikat pelanggan dengan deskripsi produk yang menarik;</strong></li></ol><p>Artikel ini akan membahas masing-masing poin tips dengan lengkap. Dengan begitu, Anda bisa dapat info dan pengetahuan baru soal <em>best practice </em>berjualan secara online.&nbsp;</p>\r\n<div class="lwptoc lwptoc-autoWidth lwptoc-baseItems lwptoc-light lwptoc-notInherit" data-smooth-scroll="1" data-smooth-scroll-offset="24" data-lwptoc-initialized="1"><div class="lwptoc_i">\r\n<div class="lwptoc_items" data-lwptoc-animation-request-id="18" style="display: none;">\r\n<div class="lwptoc_itemWrap"><div class="lwptoc_item"> <a href="#10_Tips_Jualan_Online_Bagi_Pemula" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1</span>\r\n<span class="lwptoc_item_label">10 Tips Jualan Online Bagi Pemula</span>\r\n</a>\r\n<div class="lwptoc_itemWrap"><div class="lwptoc_item"> <a href="#1_Kenali_Nilai_Jual_Produk_Unique_Selling_Points" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.1</span>\r\n<span class="lwptoc_item_label">1. Kenali Nilai Jual Produk (Unique Selling Points)</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#2_Buat_Website_Toko_Online_Sendiri" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.2</span>\r\n<span class="lwptoc_item_label">2. Buat Website Toko Online Sendiri</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#3_Pelajari_dan_Pahami_Data" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.3</span>\r\n<span class="lwptoc_item_label">3. Pelajari dan Pahami Data</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#4_Pakai_Strategi_Content_Marketing" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.4</span>\r\n<span class="lwptoc_item_label">4. Pakai Strategi Content Marketing</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#5_Aktif_di_Media_Sosial" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.5</span>\r\n<span class="lwptoc_item_label">5. Aktif di Media Sosial &nbsp;</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#6_Jajal_strategi_email_marketing_untuk_kumpulkan_leads" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.6</span>\r\n<span class="lwptoc_item_label">6. Jajal strategi email marketing untuk kumpulkan leads</span>\r\n</a>\r\n<div class="lwptoc_itemWrap"><div class="lwptoc_item"> <a href="#Langkah_Pertama_Membuat_Landing_Page" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.6.1</span>\r\n<span class="lwptoc_item_label">Langkah Pertama: Membuat Landing Page</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#Langkah_Kedua_Membuat_Newsletter" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.6.2</span>\r\n<span class="lwptoc_item_label">Langkah Kedua: Membuat Newsletter</span>\r\n</a>\r\n</div></div></div><div class="lwptoc_item"> <a href="#7_Manfaatkan_Word_of_Mouth_Marketing" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.7</span>\r\n<span class="lwptoc_item_label">7. Manfaatkan Word of Mouth Marketing</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#8_Coba_Iklankan_Bisnis_Lewat_Facebook_Youtube_dan_Instagram" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.8</span>\r\n<span class="lwptoc_item_label">8. Coba Iklankan Bisnis Lewat Facebook, Youtube, dan Instagram</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#9_Promo_Promo_Promo" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.9</span>\r\n<span class="lwptoc_item_label">9. Promo, Promo, Promo</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#10_Buat_Deskripsi_Produk_yang_Unik_dan_Menarik" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.10</span>\r\n<span class="lwptoc_item_label">10. Buat Deskripsi Produk yang Unik dan Menarik</span>\r\n</a>\r\n<div class="lwptoc_itemWrap"><div class="lwptoc_item"> <a href="#Tentukan_Target_Persona_Anda_dan_Apa_Produk_Anda" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.10.1</span>\r\n<span class="lwptoc_item_label">Tentukan Target Persona Anda dan Apa Produk Anda</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#Gunakan_Bahasa_dan_Tone_yang_Natural" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.10.2</span>\r\n<span class="lwptoc_item_label">Gunakan Bahasa dan Tone yang Natural</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#Ceritakan_Bagaimana_Produk_bisa_Membantu_Pelanggan" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.10.3</span>\r\n<span class="lwptoc_item_label">Ceritakan Bagaimana Produk bisa Membantu Pelanggan</span>\r\n</a>\r\n</div></div></div><div class="lwptoc_item"> <a href="#Daftar_Produk_Jualan_Online_Terlaris_2020" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.11</span>\r\n<span class="lwptoc_item_label">Daftar Produk Jualan Online Terlaris 2020</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#Gadget" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.12</span>\r\n<span class="lwptoc_item_label">Gadget</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#Makanan" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.13</span>\r\n<span class="lwptoc_item_label">Makanan</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#Pakaian" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.14</span>\r\n<span class="lwptoc_item_label">Pakaian</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#Elektronik" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.15</span>\r\n<span class="lwptoc_item_label">Elektronik</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#Aksesoris" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.16</span>\r\n<span class="lwptoc_item_label">Aksesoris</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#Produk_Herbal" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.17</span>\r\n<span class="lwptoc_item_label">Produk Herbal</span>\r\n</a>\r\n</div><div class="lwptoc_item"> <a href="#Produk_Kecantikan" class="lwptoc_item">\r\n<span class="lwptoc_item_number">1.18</span>\r\n<span class="lwptoc_item_label">Produk Kecantikan</span>\r\n</a>\r\n</div></div></div><div class="lwptoc_item"> <a href="#Akhir_Kata_Siap_Jualan_Online_Paling_Laris" class="lwptoc_item">\r\n<span class="lwptoc_item_number">2</span>\r\n<span class="lwptoc_item_label">Akhir Kata, Siap Jualan Online Paling Laris?</span>\r\n</a>\r\n</div></div></div>\r\n</div></div><h2><span id="10_Tips_Jualan_Online_Bagi_Pemula">10 Tips Jualan Online Bagi Pemula</span></h2>\r\n<p>Buah manggis, buah kedondong. Mau jualannya manis, simak tips di bawah ini dong.</p>\r\n<h3><span id="1_Kenali_Nilai_Jual_Produk_Unique_Selling_Points">1. Kenali Nilai Jual Produk (<em>Unique Selling Points</em>)</span></h3>\r\n<p>Apa kelebihan produk bisnis Anda? Jawaban yang terlintas di kepala bisa jadi: harga terjangkau, kualitas super, atau pertama di kelasnya. Pertanyaan semacam ini cenderung mudah dijawab.</p>\r\n<p>Bagaimana kalau saya ubah pertanyaannya jadi: apa kelebihan produk yang tak dimiliki kompetitor Anda?</p>\r\n<p>Saya percaya lebih banyak dari Anda yang tiba-tiba diam dan berpikir.&nbsp;</p>\r\n<p>Tidak apa-apa. Tak jadi masalah.</p>\r\n<p>Pertanyaan itu seharusnya memang membuat Anda termenung. Sebab, di situlah Anda sedang mencari jawaban <em>unique selling points </em>(USP) atau nilai jual produk.</p>\r\n<p>Berbeda dengan kelebihan produk yang jumlahnya bisa banyak, USP biasanya hanya satu saja. Satu poin inilah yang nantinya jadi kunci untuk membedakan bisnis Anda dari kompetitor.&nbsp;</p>\r\n<p>Mengapa hanya satu saja? Sebab ketika Anda menginginkan orang tahu semua kelebihan produk Anda, seringkali calon pelanggan tak mengingat apapun soal bisnis Anda.</p>\r\n<p>Menyedihkan, bukan?&nbsp;</p>\r\n<div class="wp-block-image"><figure class="aligncenter"><img src="https://www.niagahoster.co.id/blog/wp-content/uploads/2018/06/contoh-usaha-kecil-menengah-produk-fashion.jpg" alt="contoh usaha kecil menengah fashion" class="wp-image-7985" srcset="https://www.niagahoster.co.id/blog/wp-content/uploads/2018/06/contoh-usaha-kecil-menengah-produk-fashion.jpg 565w, https://www.niagahoster.co.id/blog/wp-content/uploads/2018/06/contoh-usaha-kecil-menengah-produk-fashion-300x200.jpg 300w, https://www.niagahoster.co.id/blog/wp-content/uploads/2018/06/contoh-usaha-kecil-menengah-produk-fashion-500x334.jpg 500w, https://www.niagahoster.co.id/blog/wp-content/uploads/2018/06/contoh-usaha-kecil-menengah-produk-fashion-400x267.jpg 400w, https://www.niagahoster.co.id/blog/wp-content/uploads/2018/06/contoh-usaha-kecil-menengah-produk-fashion-200x133.jpg 200w, https://www.niagahoster.co.id/blog/wp-content/uploads/2018/06/contoh-usaha-kecil-menengah-produk-fashion-50x33.jpg 50w" sizes="(max-width: 565px) 100vw, 565px"><figcaption>Setiap produk harusnya memiliki nilai kelebihan dan keunikan tersendiri agar bisa dilirik pasar.</figcaption></figure></div>\r\n<p>Untuk menemukan USP, Anda perlu memposisikan diri sebagai calon pelanggan. Coba pikirkan, apa yang benar-benar dibutuhkan calon pelanggan Anda? Apakah itu soal produk? Apakah lebih ke pelayanannya?</p>\r\n<p><strong>Baca juga <a href="https://www.niagahoster.co.id/blog/strategi-pemasaran-produk/">6+ Checklist Strategi Pemasaran Produk yang Wajib Anda Coba</a></strong></p>\r\n<p>Supaya Anda lebih mudah membayangkan USP yang menarik, berikut adalah contoh USP yang dimiliki produk bisnis kelas dunia:</p>\r\n<ul><li><strong>TOMS Shoes</strong> ? memberikan sepasang sepatu untuk anak tidak mampu setiap pembelian sepasang sepatu;</li><li><strong>Starbucks </strong>? berbagai pilihan minuman kopi dengan kualitas premium;</li><li><strong>Zappos </strong>? kebijakan penukaran barang yang sangat ramah untuk pelanggan;</li><li><strong>FedEx </strong>? jaminan paket sampai dalam semalam;</li><li><strong>Domino’s Pizza </strong>? pizza gratis jika tidak sampai dalam 30 menit.</li></ul><p>Ketika Anda sudah temukan beberapa calon USP yang oke, coba godok lagi. Kali ini sesuaikan USP dengan selera calon pelanggan, kebiasaan pelanggan, trend, keputusan beli, dan tokoh panutan pelanggan.</p>\r\n<p>Dengan kata lain, coba kombinasikan calon USP dengan buyer persona yang mungkin sudah Anda buat. Inilah kemudian membuat USP produk Anda benar-benar diingat dan tepat menyasar pelanggan.</p>\r\n<h3><span id="2_Buat_Website_Toko_Online_Sendiri">2. Buat Website Toko Online Sendiri</span></h3>\r\n<p>Mengapa perlu membuat website? Itu pertanyaan yang sering muncul ketika sebuah bisnis disarankan untuk memiliki website.&nbsp;</p>\r\n<p>Padahal kan, ada banyak <a href="https://www.niagahoster.co.id/blog/marketplace-adalah/">marketplace</a> yang lebih mudah dipakai. Mulai dari Tokopedia, Bukalapak, Blibli, Shopee, Lazada, dan lain sebagainya. Jadi, mengapa Anda masih perlu membuat website?</p>\r\n<p>Marketplace memang jauh lebih mudah digunakan. Tak butuh waktu lama untuk membuat akun dan mulai menjalankan usaha Anda.&nbsp;</p>\r\n<p>Ditambah lagi, marketplace sudah memiliki trafik tinggi dan user yang banyak. Pastinya, akan jauh lebih mudah bagi Anda untuk menemukan pelanggan.</p>\r\n<p>Namun, hal itu justru yang membuat <strong>marketplace memiliki tingkat persaingan yang sangat tinggi</strong>. Anda harus berebut calon pelanggan dengan memasang harga murah, memberikan pelayanan cepat, dan membangun reputasi lewat rating serta review.</p>\r\n<p>Akan tetapi, setelah melakukan semua usaha itu, brand Anda tidak akan dikenal dengan baik. Pelanggan hanya akan mengingat marketplace yang digunakan <em>instead of </em>merek. Jika Anda memang bermaksud <a href="https://www.niagahoster.co.id/blog/brand-awareness/">membangun brand awareness</a>, Anda perlu paham konsekuensi ini.</p>\r\n<figure class="wp-block-image"><img src="https://www.niagahoster.co.id/blog/wp-content/uploads/2019/08/10-Tips-Sukses-Jualan-Online-2019-02-1024x547.png" alt="kelebihan kekuranga website toko online dan marketplace" class="wp-image-15843" srcset="https://www.niagahoster.co.id/blog/wp-content/uploads/2019/08/10-Tips-Sukses-Jualan-Online-2019-02-1024x547.png 1024w, https://www.niagahoster.co.id/blog/wp-content/uploads/2019/08/10-Tips-Sukses-Jualan-Online-2019-02-300x160.png 300w, https://www.niagahoster.co.id/blog/wp-content/uploads/2019/08/10-Tips-Sukses-Jualan-Online-2019-02-768x410.png 768w, https://www.niagahoster.co.id/blog/wp-content/uploads/2019/08/10-Tips-Sukses-Jualan-Online-2019-02.png 1111w" sizes="(max-width: 1024px) 100vw, 1024px"></figure><p>Berbeda halnya dengan website toko online. Memang di awal-awal, <a href="https://www.niagahoster.co.id/blog/membuat-toko-online/">membuat website toko online</a> terbilang rumit. Ada banyak hal teknis yang perlu dilakukan sebelum bisa <em>go online</em>.</p>\r\n<p>Hanya saja, <strong>toko online sangat strategis untuk membangun brand</strong>. Anda bisa mendesain website agar sesuai dengan <a href="https://www.niagahoster.co.id/blog/apa-itu-branding-dan-strategi-branding/">branding</a> yang diinginkan. Dengan begitu, USP dan kelebihan produk bisa ditonjolkan dengan baik.</p>\r\n<p>Tak cuma itu saja, lewat toko online sendiri Anda memiliki kendali atas data. Pertama, data penjualan. Anda dengan mudahnya bisa tahu tren penjualan dari waktu ke waktu, demografi pembeli, serta model produk yang disukai pelanggan.</p>\r\n<p>Kedua, data yang berisi kontak online calon pelanggan. Melalui data inilah, Anda bisa melakukan retargeting. Bahasa sederhananya, Anda bisa kirimkan notifikasi promo atau produk baru ke pelanggan lewat email. Anda tinggal buat landing page berisi form untuk kumpulkan data yang diinginkan.</p>\r\n<p>Segala upaya marketing bisa dilakukan secara terpusat. Poin itu juga perlu diingat sebagai kelebihan lain dari memiliki toko online sendiri. Dalam satu halaman dashboard, Anda punya kontrol untuk membuat promo, merilis kontes, memberikan layanan konsumen, memanajemen inventori produk, dan mengatur reseller.</p>\r\n<p>Bagaimana? Kini Anda sudah yakin dengan kelebihan toko online?</p>\r\n<p>Jika sudah, Anda tinggal ikuti langkah-langkah ini untuk buat toko online sendiri:</p>\r\n<ol><li>Pesan hosting dan domain <a href="https://www.niagahoster.co.id/hosting-indonesia">di sini</a>;</li><li>Instal WordPress;</li><li>Pilih CMS atau platform toko online. Misalnya, <a href="https://www.niagahoster.co.id/blog/cms-toko-online/">WooCommerce, Shopify, PrestaShop atau lainnya</a>;</li><li>Lakukan pengaturan web dan input produk;</li><li>Download ebook <a href="https://www.niagahoster.co.id/ebook/tutorial-toko-online-woocommerce"><strong>Panduan Membuat Toko Online untuk Pemula</strong></a>. Di ebook, Anda akan dapatkan semua <em>insight</em> yang diperlukan. Mulai dari membuat menu, menetapkan <em>shipping classes</em>, membuat aktivasi kode kupon, otomatisasi pembayaran, reports, dan sebagainya.</li></ol><h3><span id="3_Pelajari_dan_Pahami_Data">3. Pelajari dan Pahami Data</span></h3>\r\n<figure class="wp-block-image size-large"><img src="https://www.niagahoster.co.id/blog/wp-content/uploads/2019/12/ilustrasi-google-analytics-1024x540.jpg" alt="Jualan online - ilustrasi Google Analytics" class="wp-image-19549" srcset="https://www.niagahoster.co.id/blog/wp-content/uploads/2019/12/ilustrasi-google-analytics-1024x540.jpg 1024w, https://www.niagahoster.co.id/blog/wp-content/uploads/2019/12/ilustrasi-google-analytics-300x158.jpg 300w, https://www.niagahoster.co.id/blog/wp-content/uploads/2019/12/ilustrasi-google-analytics-768x405.jpg 768w, https://www.niagahoster.co.id/blog/wp-content/uploads/2019/12/ilustrasi-google-analytics.jpg 1280w" sizes="(max-width: 1024px) 100vw, 1024px"></figure><p>“Menyimpulkan sesuatu tanpa disertai data adalah kesalahan besar,” begitu kata Sherlock Holmes. Meski tokoh yang bilang fiktif, jangan remehkan apa yang dikatakan.</p>\r\n<p>Data merupakan hal penting dalam bisnis. Bahkan saking pentingnya, Peter Sondergaard mengatakan bahwa data adalah minyak di abad 21. Lalu, <em>analytics</em> atau analisa data merupakan mesin pembakarannya.</p>\r\n<p>Jadi, singkat saja, Anda harus pintar-pintar mempelajari data yang berkaitan dengan bisnis. Terutama data soal penjualan dan data yang berhubungan dengan upaya promosi.</p>\r\n<p><em>Pertama</em>, data soal penjualan. Biasanya data ini otomatis bisa didapat dari fitur report di CMS yang digunakan. Dari data ini, Anda bisa tahu produk jualan online paling laris, produk macam apa yang disukai pelanggan, kapan penjualan meroket, dan kapan penjualan sedang lesu-lesunya.</p>\r\n<p>Dari kelompok data pertama, Anda bisa melakukan riset produk dan selera pasar. Lalu membuat produk-produk baru untuk dirilis ke pasaran. Bisa juga, Anda mengantisipasi <em>high season </em>dan <em>low season</em> dengan mengeksekusi strategi marketing yang pas.</p>\r\n<p>Kedua, data yang berhubungan dengan promosi dan marketing. Untuk yang satu ini, pastikan Anda sudah menginstal Google Analytics di website. Jika belum, kami menyediakan tutorial <a href="https://www.niagahoster.co.id/blog/cara-memasang-google-analytics-di-wordpress/">memasang Google Analytics</a> di website berbasis WordPress.</p>\r\n<p>Lewat Analytics dari Google, Anda bisa memantau performa website secara keseluruhan. Siapa calon pelanggan Anda? Di mana mereka tinggal? Halaman mana saja yang paling banyak dibuka oleh pelanggan di toko online? Channel marketing apa yang paling efektif? Bagaimana caranya? Baca artikel <a href="https://www.niagahoster.co.id/blog/cara-menggunakan-google-analytics/">Cara Menggunakan Google Analytics untuk Pemula</a>.</p>\r\n<p>Tak cuma perkara itu saja. Google Analytics juga bisa melakukan <em>tracking </em>data khusus untuk bisnis. Anda bisa <em>kepo </em>performa website kompetitor dalam satu industri yang sama, mengetahui kata kunci populer, mengetahui faktor yang menyebabkan user meninggalkan web, dan mengetahui waktu tepat untuk mengirimkan email.</p>\r\n<p>Untuk tahu cara mencari dan membaca metrik Google Analytics khusus bisnis, Anda bisa baca artikel <a href="https://www.niagahoster.co.id/blog/google-analytics-adalah/">Google Analytics untuk Meningkatkan Bisnis Anda</a>.</p>\r\n<h3><span id="4_Pakai_Strategi_Content_Marketing">4. Pakai Strategi Content Marketing</span></h3>\r\n<p>Sudah pernah dengar istilah <a href="https://www.niagahoster.co.id/blog/apa-itu-content-marketing/">content marketing</a>? Kalau belum, saya akan coba jelaskan secara ringkas.</p>\r\n<p>Content marketing adalah sebuah teknik promosi yang bertumpu pada pembuatan konten. Bukan sembarang konten yang dibuat. Melainkan konten relevan, penting, bermanfaat, dan bisa menarik audiens dalam jangka panjang.&nbsp;</p>\r\n<p>Semakin bagus dan bermanfaat konten yang Anda buat, semakin besar kemungkinan usaha Anda ditemukan oleh calon pelanggan lewat Google. Artinya, semakin besar pula kemungkinan Anda mendapatkan cuan lewat strategi ini.</p>\r\n<p>Namun, Anda jangan sampai terjebak untuk membuat konten foto atau video saja. Keduanya memang menarik. Apalagi jika tampilannya estetis dan memanjakan mata.</p>\r\n<p>Hanya saja, Anda perlu tetap strategis dalam mengeksekusi content marketing. Alih-alih membuat konten visual dan hanya menyebarkannya lewat media sosial, Anda perlu mempertimbangkan untuk membuat blog dalam web toko online.</p>\r\n<p>Blog bisnis merupakan investasi jangka panjang. Lewat blog Anda bisa menunjukkan sisi <em>friendly</em> bisnis, membangun hubungan dekat dengan calon pelanggan, mengumpulkan data calon pelanggan, dan meningkatkan reputasi bisnis.</p>\r\n<p class="has-text-align-left"><strong>Baca Juga <a href="https://www.niagahoster.co.id/blog/manfaat-blog-untuk-bisnis/">6+ Alasan Mengapa Blog Penting Untuk Bisnis</a></strong></p>\r\n<p>Bicara soal teknis, blog juga bisa jadi tempat untuk mengumpulkan semua materi promosi. Dengan begitu, konten promosi Anda lebih mudah diakses oleh calon pelanggan. Mereka pun tak perlu kerepotan <em>scroll </em>akun Instagram, Twitter, atau Facebook Page.</p>\r\n<p>Lalu apakah membuat blog saja cukup? Sayangnya, tidak.</p>\r\n<p>Anda juga masih perlu menerapkan prinsip-prinsip SEO dalam blog. <a href="https://www.niagahoster.co.id/blog/apa-itu-seo/">SEO</a> adalah aturan main yang ditetapkan oleh Google. Ketika blog memenuhi semua aturan yang dikeluarkan Google, semakin besar blog menempati posisi teratas dalam hasil pencarian.&nbsp;</p>\r\n<p>Sedikit membingungkan? Tak usah khawatir. Kami merangkum langkah-langkah optimasi blog agar SEO friendly dalam bentuk ebook. Jadi, Anda bisa ikuti langkah-langkah optimasi tersebut dengan mudah. Download ebook <a href="https://www.niagahoster.co.id/ebook/langkah-ampuh-optimasi-seo">di sini</a>.&nbsp;</p>\r\n<h3><span id="5_Aktif_di_Media_Sosial">5. Aktif di Media Sosial &nbsp;</span></h3>\r\n<p>Meskipun sudah ada website dan blog, tolong jangan pernah lupakan sosial media. Sosial media masih jadi channel penting untuk mempromosikan produk atau layanan bisnis. Dari sosial media pula lah, pintu pertama perkenalan dibuka pada calon pelanggan.</p>\r\n<p>Baru setelah mengetahui dan mengenal bisnis lebih dekat, mereka tertarik untuk lebih <em>engage</em>. Entah itu nanti dalam bentuk mem-follow akun, komentar, membagikan konten yang Anda buat, ataupun mengunjungi URL yang Anda berikan (termasuk di dalamnya website, blog, dan YouTube).</p>\r\n<p>Pernyataan di atas bukan sekedar kira-kira. Faktanya, sebanyak <a href="https://www.marketingsherpa.com/article/chart/demographics-why-customer-follow-brands-social-media" target="_blank" rel="nofollow">95 persen</a> pengguna sosial media dengan kisaran umur 18-34 tahun mengikuti akun sosial media bisnis. Lalu sebanyak <a href="https://www.smartinsights.com/customer-relationship-management/customer-service-and-support/rise-social-media-customer-care/" target="_blank" rel="nofollow">93 persen</a> user menjadikan sosial media sebagai cara berkomunikasi dengan brand (customer service).&nbsp;</p>\r\n<p>Ketika Anda berhasil mewujudkan interaksi sosmed yang menyenangkan, sebanyak <a href="https://www.getambassador.com/blog/social-customer-service-infographic" target="_blank" rel="nofollow">71 persen</a> pengguna akan merekomendasikan bisnis Anda pada orang-orang terdekat. Jadi, sudah jelaskan mengapa sosmed ikut jadi bagian penting dalam<a href="https://www.niagahoster.co.id/blog/cara-promosi/"> promosi bisnis</a>?</p>\r\n<p>Supaya Anda bisa lebih paham jalannya social media marketing, silakan baca <a href="https://www.niagahoster.co.id/blog/social-media-marketing/">Panduan Lengkap Social Media Marketing 2019</a>. Di artikel itu, kami bahas langkah-langkah strategis menjalankan promosi lewat media sosial.</p>\r\n<p>Di sana, ada beberapa poin yang bisa Anda pelajari:</p>\r\n<ul><li>Meriset audiens;</li><li>Membuat tujuan / goals yang jelas;</li><li>Menentukan metrik yang sesuai;</li><li>Meriset saingan bisnis;</li><li>Membuat konten menarik;</li><li>Menentukan waktu post yang tepat;</li><li>Memanfaatkan fitur iklan;</li><li>Mengevaluasi strategi marketing sosial media.</li></ul><p>Kalau Anda butuh informasi yang lebih mengarah ke jualan online, Anda juga bisa baca artikel tips jualan online via medsos <a href="https://www.niagahoster.co.id/blog/media-sosial-untuk-bisnis/">di sini</a>. Artikel tersebut lebih banyak membahas teknik <em>bulls eye</em> dan tips praktikal pengelolaan sosmed.</p>\r\n<h3><span id="6_Jajal_strategi_email_marketing_untuk_kumpulkan_leads">6. Jajal strategi email marketing untuk kumpulkan <em>leads</em></span></h3>\r\n<p>Sedikit fakta menarik: Anda punya kemungkinan <a href="https://www.clickz.com/are-ecommerce-customer-retention-strategies-improving/105454/" target="_blank" rel="nofollow">60-70 persen</a> untuk menjual produk ke pelanggan lama. Lalu hanya 5-20 persen kemungkinan Anda untuk menjual produk ke pelanggan baru.&nbsp;</p>\r\n<p>Dengan kata lain, <a href="http://www.slideshare.net/custthermometer/22-customer-retention-stats" target="_blank" rel="nofollow">80 persen</a> keuntungan bisnis Anda didapat dari 20 persen pelanggan lama. Maka dari itu, sangat penting bagi Anda untuk bisa merawat hubungan dengan pelanggan.</p>\r\n<p>Bagaimana caranya?&nbsp;</p>\r\n<p>Apalagi kan, ada begitu banyak faktor di luar sana yang menganggu hubungan Anda dengan pelanggan. Mulai dari promo dan diskon dari saingan bisnis, ada kompetitor baru, sampai dengan algoritme medsos yang tak berpihak pada Anda.</p>\r\n<p>Jadi, bagaimana caranya untuk menjaga hubungan dengan pelanggan?</p>\r\n<p>Cobalah strategi email marketing. Lewat strategi ini, Anda akan mengirimkan update terbaru serta promo melalui email.</p>\r\n<p>Lantas, bagaimana eksekusinya?&nbsp;</p>\r\n<p>Untuk itu, saya perlu bicara mengenai dua hal. Pertama, mengatur landing page untuk mengumpulkan kontak pelanggan. Lalu, kedua, membuat newsletter atau konten yang akan dikirimkan pada mereka.</p>\r\n<figure class="wp-block-image"><img src="https://www.niagahoster.co.id/blog/wp-content/uploads/2019/07/contoh-landing-page-airbnb-1024x497.png" alt="" class="wp-image-15048" srcset="https://www.niagahoster.co.id/blog/wp-content/uploads/2019/07/contoh-landing-page-airbnb-1024x497.png 1024w, https://www.niagahoster.co.id/blog/wp-content/uploads/2019/07/contoh-landing-page-airbnb-300x146.png 300w, https://www.niagahoster.co.id/blog/wp-content/uploads/2019/07/contoh-landing-page-airbnb-768x373.png 768w, https://www.niagahoster.co.id/blog/wp-content/uploads/2019/07/contoh-landing-page-airbnb.png 1349w" sizes="(max-width: 1024px) 100vw, 1024px"><figcaption>Salah satu contoh landing page menarik milik Airbnb.</figcaption></figure><h4><span id="Langkah_Pertama_Membuat_Landing_Page"><strong>Langkah Pertama: </strong>Membuat Landing Page</span></h4>\r\n<p><a href="https://www.niagahoster.co.id/blog/apa-itu-landing-page/">Landing page</a> merupakan halaman pada web yang didedikasikan untuk tujuan komersial. Nilai komersil yang dimaksud bisa diwujudkan dalam bentuk <strong><em>lead generation landing page</em>. </strong>Dengan kata lain, landing page yang bisa digunakan untuk mengumpulkan data pelanggan.&nbsp;</p>\r\n<p>Sekali Anda bisa mengantongi data tersebut, Anda bisa dengan leluasa berkabar dengan pelanggan. Tak peduli apakah ada kompetitor yang sedang gencar memasuki pasar ataukah pelanggan tak sengaja unfollow akun sosial media.</p>\r\n<p>Untuk bisa mengumpulkan data, Anda perlu membuat halaman yang menarik. Prinsipnya, Anda perlu mengombinasikan kata-kata promosi yang meyakinkan dengan tampilan yang ciamik.</p>\r\n<p>Tak perlu banyak teori, Anda bisa cek inspirasi landing page di artikel <a href="https://www.niagahoster.co.id/blog/contoh-landing-page">7+ Contoh Landing Page Menarik untuk Website Anda</a>. Di situ, kami menganalisis desain landing pages yang dimiliki bisnis kelas dunia. Kami menilai mana-mana saja elemen yang bisa Anda tiru. Begitu pula hal yang bisa Anda kembangkan lagi.</p>\r\n<p>Baru setelah itu, Anda bisa langsung praktik sendiri <a href="https://www.niagahoster.co.id/blog/cara-membuat-landing-page/">membuat landing page</a>. Ada begitu banyak <a href="https://www.niagahoster.co.id/blog/plugin-wordpress-page-builder-terbaik/">plugin page builder</a> yang bisa dipilih untuk membuat landing page. Salah satu yang paling banyak digunakan adalah <a href="https://www.niagahoster.co.id/blog/panduan-lengkap-menggunakan-elementor/">Elementor</a>.&nbsp;</p>\r\n<h4><span id="Langkah_Kedua_Membuat_Newsletter"><strong>Langkah Kedua: </strong>Membuat Newsletter</span></h4>\r\n<p>Semua konten bisnis yang Anda buat perlu punya nilai manfaat. Begitu pula patokannya untuk email marketing atau newsletter.&nbsp;</p>\r\n<p>Untuk membuatnya lebih menarik, Anda perlu menambahkan bonus pada strategi ini. Terutama bonus-bonus yang sifatnya praktis dan bisa digunakan oleh pelanggan. Apalagi kalau bukan akses premium untuk promo dan diskon, serta downloadables atau freebies.</p>\r\n<p>Anggap saja promo dan konten ekslusif ini sebagai imbalan. Sebab, pelanggan sudah rela memberikan data pribadinya kepada Anda. Data adalah barang mahal, <em>you know? </em>Masih ingat istilah “data adalah minyak abad 21”, kan?</p>\r\n<p>Nah, coba baca artikel <a href="https://www.niagahoster.co.id/blog/email-marketing">[Terlengkap] Panduan Membuat Email Marketing Efektif 2019</a>. Di sanalah, Anda bisa temukan semua detil informasi serta <em>to do list</em> strategi promosi lewat email.</p>\r\n<p>Kalau Anda tertarik tahu <em>best practice</em>-nya, jangan lewatkan pula untuk mengecek <a href="https://www.niagahoster.co.id/blog/contoh-newsletter/">5+ Contoh Newsletter untuk Email Marketing Anda</a>. Seperti biasa, di situlah kami mengulas newsletter milik berbagai lembaga non-profit dan bisnis. Tak ketinggalan, ada berbagai tips dan trik yang bisa diterapkan untuk newsletter bikinan Anda.</p>\r\n<p>Ketika kesemua konsep ini sudah dipahami, barulah Anda beranjak ke hal-hal yang lebih praktis. Seperti mendesain newsletter dengan <a href="https://www.niagahoster.co.id/blog/cara-menggunakan-mailchimp/">Mailchimp</a> atau menginstal <a href="https://www.niagahoster.co.id/blog/plugin-email-marketing-wordpress/">plugin email marketing</a> yang tepat.</p>\r\n<h3><span id="7_Manfaatkan_Word_of_Mouth_Marketing">7. Manfaatkan <em>Word of Mouth Marketing</em></span></h3>\r\n<p>Percaya tak percaya, apa kata orang sangat berpengaruh pada sebuah bisnis. Anda kira, mengapa pebisnis rela membayar mahal selebgram dan <em>key opinion leader </em>untuk bicara bagus soal bisnisnya?</p>\r\n<p>Jika Anda memang punya budget, tak ada salahnya untuk mencoba promo lewat selebram atau micro influencer lainnya. Seketika, bisnis Anda bisa dikenal oleh audiens dalam jumlah lebih banyak. Pun, jangkauan audiens bisa bertambah luas.</p>\r\n<p>Lain halnya, kalau Anda tak bisa menganggarkan budget untuk promosi macam ini. Anda perlu mencari cara agar bisa mempengaruhi pelanggan dengan lebih efektif.</p>\r\n<p>Lalu, bagaimana caranya? Mudah saja, pastikan Anda menyediakan kolom review pelanggan di website Anda.</p>\r\n<p>Lewat review inilah, calon pelanggan bisa menilai kualitas barang serta pelayanan bisnis Anda. Cara seperti ini menunjukkan bahwa Anda cukup <em>fair </em>dan transparan soal bisnis. Di saat yang sama, Anda akan meyakinkan calon pelanggan bahwa praktik bisnis Anda nyata dan bukan penipuan.</p>\r\n<p>Toh, faktanya, teknik marketing macam ini masih terbilang efektif. Word of mouth marketing dikatakan <a href="https://www.invespcro.com/blog/word-of-mouth-marketing/" target="_blank" rel="nofollow">5x lebih menghasilkan</a> dibandingkan paid marketing. Karena itu pula, 70 persen pebisnis mengaku bermaksud meningkatkan word of mouth marketing secara online.&nbsp;</p>\r\n<p>Anda pun tak boleh ketinggalan. Cara termudahnya, lagi-lagi, dengan menambahkan kolom review di website. Anda bisa baca <a href="https://www.niagahoster.co.id/blog/cara-membuat-review-di-wordpress/">Cara Membuat Review di WordPress</a>. Di artikel itu, kami membahas beberapa opsi plugin yang oke untuk ditambahkan ke website WordPres.</p>\r\n<h3><span id="8_Coba_Iklankan_Bisnis_Lewat_Facebook_Youtube_dan_Instagram">8. Coba Iklankan Bisnis Lewat Facebook, Youtube, dan Instagram</span></h3>\r\n<p>Tips jualan online berikutnya masih berkaitan dengan sosial media. Karena sosial media sangat penting pengaruhnya dalam berbisnis, kami dedikasikan satu bagian lagi soal bagaimana sosmed bisa membantu toko online Anda.</p>\r\n<p>Berbeda dengan bahasan sebelumnya, di bagian ini, kami akan membahas secara spesifik tentang beriklan di sosial media. Beriklan di sosial media tak hanya meningkatkan exposure dan brand awareness produk Anda. Iklan juga membuka kesempatan besar untuk meningkatkan sales Anda.&nbsp;</p>\r\n<p>Secara spesifik, beriklan di medsos merupakan langkah strategis dan lebih menghasilkan. Bahkan, yang didapat bisa jadi lebih besar daripada beriklan lewat Google Ads. Bagaimana mungkin?</p>\r\n<p>Pertama, perhatikan bagaimana sistem Google Ads dan Sosial Media Ads bekerja. Google Ads bekerja ketika konsumen sudah tahu apa yang mereka inginkan. Di dalam customer journey, konsumen sudah melewati tahapan awareness. Mereka sudah di tahap consideration dan sedang mempertimbangkan brand mana yang menyediakan produk terbaik untuk mereka.</p>\r\n<p>Namun, sosial media ads bekerja di tahapan yang berbeda. Sosial media ads menyasar pelanggan bahkan sebelum pelanggan tahu apa yang mereka inginkan. Iklan produk akan ditampilkan menurut segmentasi pasar yang Anda buat.</p>\r\n<p>Dengan kata lain, sosial media ads menuntun pelanggan dari tahap awareness hingga purchase. Dengan begitu, Anda bisa menghadirkan bisnis Anda di tiap <em>customer journey. </em>Lalu, akibatnya pangsa pasar Anda akan jauh lebih luas.</p>\r\n<p>Kedua, sosial modia menawarkan opsi targeting yang lebih advanced. Anda tak perlu repot – repot untuk mencari pelanggan satu per satu seperti sales door to door. Sosial media ads yang akan bekerja keras. Anda hanya tinggal duduk bersantai sambil menikmati angka penjualan Anda meningkat drastis.<br><br>Kira – kira, ada empat opsi targeting yang bisa disediakan sosial media ads:</p>\r\n<ul><li><strong>Interest targeting:</strong> Mirip dengan keyword targeting yang ada di Google Ads. Sosial media tempat Anda beriklan akan menganalisis pengguna yang sebelumnya menggunakan keyword yang Anda pasang.</li><li><strong>Connection/behaviour targeting:</strong> Jangkau calon pelanggan tertentu berdasarkan kebiasaan dan intensi belanja mereka atau bagaimana mereka pernah terkoneksi ke salah satu halaman spesifik di website Anda sebelumnya.</li><li><strong>Custom targeting: </strong>Dengan opsi ini Anda bisa menjangkau pelanggan dengan data leads yang Anda miliki seperti alamat email, nomor telepon,&nbsp;</li><li><strong>Lookalike targeting: </strong>Jangkau pelanggan baru dengan karakteristik yang hampir sama dengan pelanggan yang Anda miliki sekarang.&nbsp;</li></ul><p>Penawaran yang menggiurkan bukan? Tentu Anda sudah tidak sabar untuk mencoba mengiklankan bisnis online Anda. Sebelum Anda terburu-buru menjajal dan mengeluarkan banyak uang, Anda bisa lebih dahulu membaca panduan <a href="https://www.niagahoster.co.id/blog/cara-membuat-facebook-ads/">Facebook ads</a> dan <a href="https://www.niagahoster.co.id/blog/cara-membuat-instagram-ads/">Instagram ads</a> di blog kami.</p>\r\n<p>Dengan begitu, Anda bisa memperkecil kesalahan ketika melakukan strategi ini. Anda juga tak ingin membuang uang percuma, kan?</p>\r\n<h3><span id="9_Promo_Promo_Promo">9. Promo, Promo, Promo</span></h3>\r\n<p>Coba sebutkan siapa orang di dunia ini yang tak suka promo? Hmm… Tidak ada?</p>\r\n<p>Jadi, jelas sudah semua orang menyukai promo. Itu pula alasannya, Anda perlu memasukkan promo dan diskon dalam strategi marketing Anda.&nbsp;</p>\r\n<p>Apalagi jika usaha Anda masih berumur jagung, perlu mengambil perhatian calon pelanggan, dan mau mengganggu kompetitor usaha yang sudah cukup <em>settle</em>. Toh, faktanya, <a href="https://www.business.com/articles/how-retailers-are-dominating-with-online-promotions/" target="_blank" rel="nofollow">91 persen</a> orang mengunjungi retail atau usaha baru karena promosi yang ditawarkan.&nbsp;</p>\r\n<p class="has-text-align-left"><strong>Baca juga: <a href="https://www.niagahoster.co.id/blog/strategi-b2c-marketing">Tips Ampuh B2C Marketing untuk Mengembangkan Bisnis Anda</a></strong></p>\r\n<p>Hanya saja, Anda perlu juga berhati-hati dalam menyebarkan promo. Jangan sampai pelanggan hanya membeli saat-saat promo saja.&nbsp;</p>\r\n<p>Sebab kalau kasusnya begitu, bukannya untung, Anda dapat buntung. Biaya promo di awal terlalu besar, tapi Anda tak punya cukup keuntungan untuk menutup biaya promo tadi.&nbsp;</p>\r\n<p>Seperti halnya Niagahoster, Niagahoster juga memberikan <strong><a rel="noreferrer noopener" aria-label="promo domain hosting (opens in a new tab)" href="https://www.niagahoster.co.id/promosi" target="_blank">promo domain hosting</a></strong> yang tentunya akan menarik minat konsumen untuk <strong><a rel="noreferrer noopener" aria-label="membeli  domain (opens in a new tab)" href="https://www.niagahoster.co.id/domain-murah" target="_blank">membeli domain</a></strong> dan <strong><a href="https://www.niagahoster.co.id/hosting-murah" target="_blank" rel="noreferrer noopener" aria-label="hosting murah (opens in a new tab)">hosting murah</a></strong> dari promo yang diberikan.</p>\r\n<p>Maka dari itu, pastikan kualitas produk yang Anda tawarkan memang jempolan. Atau setidaknya, punya kelebihan dan daya tawar dibandingkan produk-produk serupa.&nbsp;</p>\r\n<h3><span id="10_Buat_Deskripsi_Produk_yang_Unik_dan_Menarik">10. Buat Deskripsi Produk yang Unik dan Menarik</span></h3>\r\n<p>Hal-hal teknis seputar teknologi tak melulu jadi cara menggenjot keuntungan jualan online. Hal yang nampak sepele dan remeh seperti deskripsi produk bisa juga mempengaruhi laris tidaknya jualan online Anda.</p>\r\n<p>Ya, di sini kami bicara tentang teknik persuasi. Lebih tepatnya tentang copywriting.&nbsp;</p>\r\n<p>Copywriting akan jadi pelengkap semua usaha promosi yang sudah Anda lakukan. Dengan kalimat promosi atau copy yang persuasif, Anda dengan mudah menjangkau sisi emosional pelanggan. Dari situ, tuntunlah pelanggan potensial ke halaman check out untuk selesaikan transaksi.</p>\r\n<p>Lalu, bagaimana cara menulis copy yang berhasil menyentuh sisi emosi? Anda bisa temukan jawabannya di bawah ini:</p>\r\n<h4><span id="Tentukan_Target_Persona_Anda_dan_Apa_Produk_Anda">Tentukan Target Persona Anda dan Apa Produk Anda</span></h4>\r\n<p>Kunci sukses bisnis, salah duanya adalah mengetahui siapa Anda dan siapa konsumen Anda. Karena keduanya tak bisa dipisahkan, jangan heran kalau kami bahas keduanya sekaligus di sini.</p>\r\n<p>Memiliki gambaran jelas soal siapa pelanggan Anda akan sangat bermanfaat bagi bisnis. Berbekal buyer persona, Anda bisa dapat menyesuaikan copy agar dekat dan sesuai dengan keseharian mereka.</p>\r\n<p>Misalnya, menulis copy untuk segmen pasar anak muda. Tentunya Anda akan memakai bahasa yang lebih santai dan disertai slang. Berbeda halnya, dengan segmen pasar orang tua yang bahasanya lebih umum.&nbsp;</p>\r\n<p>Selain profil pelanggan, jenis produk pun ikut mempengaruhi bentuk copy. Contohnya lagi, copy untuk aksesoris atau kaos anak muda. Selipan humor di deskripsi akan jadi poin keunikan tersendiri.&nbsp;</p>\r\n<p>Lain halnya, copy untuk alat-alat kesehatan atau produk keselamatan. Selipan humor tak membuat produk jadi unik. Justru, copy macam itu bisa menyiratkan Anda tak serius dengan bisnis yang dijalankan. Bahasa lainnya, elemen yang tak sesuai bisa jadi bumerang yang menghancurkan reputasi bisnis.</p>\r\n<h4><span id="Gunakan_Bahasa_dan_Tone_yang_Natural">Gunakan Bahasa dan Tone yang Natural</span></h4>\r\n<p>Deskripsi yang baik tak harus menurut pada kaidah Ejaan Yang Disempurnakan (EYD). Semakin komunikatif dan natural bahasa yang digunakan, semakin ia terdengar seperti diucapkan teman sendiri. Hasilnya, Anda sukses menyentuh sisi emosional pembaca.</p>\r\n<p>Ciri-ciri bahasa yang natural adalah mudah dibaca. Ketika copy memakai bahasa yang natural, calon pembeli tak perlu membaca deskripsi produk berkali-kali untuk tahu apa yang Anda jual. Cukup sekali saja, mereka sudah tahu kelebihan produk yang ditawarkan.&nbsp;</p>\r\n<h4><span id="Ceritakan_Bagaimana_Produk_bisa_Membantu_Pelanggan">Ceritakan Bagaimana Produk bisa Membantu Pelanggan</span></h4>\r\n<p>Produk Anda punya keunggulan yang tak dimiliki kompetitor? Hebat! Pastinya Anda perlu ceritakan ini ke dalam deskripsi produk.&nbsp;</p>\r\n<p>Namun, ingatlah. Terlalu fokus pada fitur dan kehebatan produk punya konsekuensi fatal: Anda takkan menyentuh sisi emosional pelanggan potensial.&nbsp;</p>\r\n<p>Sebagai gantinya, fokuslah pada target konsumen. Gunakan cara pandang dan gunakan “sepatu” mereka. Ceritakan siapa diri mereka, masalah apa yang mereka hadapi, dan bagaimana produk Anda memberikan solusi serta menjadikan diri mereka lebih baik lagi.</p>\r\n<h3><span id="Daftar_Produk_Jualan_Online_Terlaris_2020">Daftar Produk Jualan Online Terlaris 2020</span></h3>\r\n<p>Setelah mengetahui berbagai tips jualan online bagi pemula, apalagi yang perlu dipelajari?</p>\r\n<p>Jawabannya, mengetahui apa produk jualan online terlaris. Hal ini dapat membantu Anda menentukan jenis bisnis yang tepat.&nbsp;</p>\r\n<p>Anda bisa melakukan riset sendiri. Baik menggunakan Google Trends atau riset keyword. Namun, kami sudah merangkumkan daftarnya untuk Anda berikut ini:</p>\r\n<h3><span id="Gadget">Gadget</span></h3>\r\n<p>Indonesia merupakan pangsa pasar gadget yang besar. Bahkan menurut sebuah <a href="https://www.slideshare.net/DataReportal/digital-2019-indonesia-january-2019-v01" target="_blank" rel="nofollow">data</a>, setiap orang memiliki hingga 2 perangkat. Artinya, gadget masih menjadi produk yang potensial untuk dijual.</p>\r\n<p>Data dari Google Trends juga menunjukkan bahwa pencarian “gadget” pada kategori “Shopping” pernah menembus angka tertinggi di tahun ini.&nbsp;</p>\r\n<h3><span id="Makanan">Makanan</span></h3>\r\n<p>Google Trends memang tidak menunjukkan tren yang tinggi untuk pencarian makanan. Hasil yang cenderung stabil tentu dapat dipahami mengingat makanan adalah kebutuhan utama.&nbsp;</p>\r\n<p>Faktanya, berbagai bisnis produk makanan bermunculan dan tak pernah sepi pembeli. Tidak hanya pada produk makanan utama, berbagai variasi snack juga laris.&nbsp;&nbsp;</p>\r\n<p>Kesuksesan bisnis makanan terutama ditentukan oleh kualitas makanan dan pemasaran yang efektif. Dengan potensi ini, memulai <a href="https://www.niagahoster.co.id/blog/memulai-bisnis-kuliner/">bisnis kuliner</a> bisa menjadi ide bisnis yang menarik.</p>\r\n<h3><span id="Pakaian">Pakaian</span></h3>\r\n<p>Anda tentu pernah berbelanja pakaian online, bukan? Kemudahan menemukan penjual pakaian melalui <a href="https://www.niagahoster.co.id/blog/ecommerce-vs-marketplace-vs-online-shop/">toko online, marketplace dan online shop</a> menjadi alasan berkembangnya bisnis tersebut.</p>\r\n<p>Selain itu, pilihan produk yang beragam juga menjadi kunci larisnya penjualan produk pakaian. Mulai dari pakaian untuk pria dan wanita dewasa, hingga pakaian bayi dan&nbsp; anak-anak.&nbsp;</p>\r\n<h3><span id="Elektronik">Elektronik</span></h3>\r\n<p>Seperti halnya gadget, masyarakat Indonesia gemar berbelanja produk elektronik. Data dari Kemenperin menyebutkan peningkatan transaksi penjualan diprediksi mencapai hingga <a href="https://kemenperin.go.id/artikel/20306/Penjualan-Elektronik-Berpotensi-Bangkit" target="_blank" rel="nofollow">10%</a>.</p>\r\n<p>Pangsa pasar produk elektronik sendiri cukup luas. Tidak hanya pada produk baru saja. Beberapa marketplace juga menampilkan produk elektronik bekas untuk dijual.&nbsp;</p>\r\n<p>Apalagi perkembangan teknologi memunculkan produk baru seperti TV Curved, Go Pro, dan lainnya. Artinya, produk elektronik tidak akan sepi pembeli.&nbsp;&nbsp;</p>\r\n<h3><span id="Aksesoris">Aksesoris</span></h3>\r\n<p>Saat ini produk aksesoris juga banyak diminati. Mulai dari aksesoris ponsel, mobil hingga pernik rumah.&nbsp;</p>\r\n<p>Keinginan masyarakat untuk dapat tampil beda membuat bisnis aksesoris berkembang. Jika ingin terjun di bisnis ini, kuncinya adalah kejelian melihat peluang dan kreatifitas menciptakan produk.</p>\r\n<h3><span id="Produk_Herbal">Produk Herbal</span></h3>\r\n<p>Kesadaran gaya hidup sehat masyarakat kian meningkat. Hal ini berdampak pada tingkat penjualan produk kesehatan yang tanpa efek samping. Tak heran, berbagai produk herbal kian digemari.&nbsp;</p>\r\n<p>Data dari Google Trends menunjukkan bahwa pencarian produk herbal <a href="https://trends.google.com/trends/explore?cat=18&amp;geo=ID&amp;q=herbal" target="_blank" rel="nofollow">cukup tinggi</a>. Dengan demikian potensi untuk jualan online produk herbal masih cukup menjanjikan.&nbsp;&nbsp;</p>\r\n<h3><span id="Produk_Kecantikan">Produk Kecantikan</span></h3>\r\n<p>Produk kecantikan tak mungkin terlewatkan dari daftar produk jualan online terlaris kami.&nbsp;</p>\r\n<p>Faktanya, permintaan terhadap produk kecantikan memang tinggi. Hal ini disebabkan dua hal: kemudahan pembelian barang secara online dan banyaknya&nbsp; influencer kecantikan untuk merek produk tertentu.</p>\r\n<p>Anda bisa mempertimbangkan terjun ke bisnis ini dengan potensi pendapatan yang menggiurkan.&nbsp;</p>\r\n<h2><span id="Akhir_Kata_Siap_Jualan_Online_Paling_Laris">Akhir Kata, Siap Jualan Online Paling Laris?</span></h2>\r\n<p>Ya! Kini Anda sudah lebih siap untuk wujudkan jualan online paling laris. Semoga semua tips di atas membantu Anda melancarkan <a href="https://www.niagahoster.co.id/blog/cara-memulai-bisnis-online/">bisnis online</a> Anda.</p></p>\r\n</article>', NULL, NULL, '2020-02-24 09:27:25', 0),
(2, '3,1', 'Judul berita', 'Isi berita', NULL, NULL, '2020-02-24 07:38:24', 0);

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
(1, 'Event'),
(2, 'Sport'),
(3, 'Business'),
(4, 'Politic'),
(5, 'Social');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_berita`
--

CREATE TABLE `komentar_berita` (
  `id_komentar_berita` int(9) NOT NULL,
  `id_berita` int(9) NOT NULL,
  `user_id` int(9) DEFAULT NULL,
  `nama` text,
  `email` text,
  `komentar` text NOT NULL,
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
-- Struktur dari tabel `subscriber`
--

CREATE TABLE `subscriber` (
  `id_subscriber` int(9) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subscriber`
--

INSERT INTO `subscriber` (`id_subscriber`, `email`) VALUES
(0, 'm.fakhirrizal@gmail.com'),
(1, 'fakhir_rizal@hotmail.com'),
(2, 'bokir.rizal@gmail.com');

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
(0, 'admin', '1', 'Administrator', NULL, 12, '2020-02-24 11:44:54', '2020-02-24 11:44:54', 13, '2020-02-24 11:44:54', NULL, NULL, '::1', 1, NULL, NULL, NULL, 0, '2019-12-07 22:15:17', NULL, NULL, NULL, NULL, 0),
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
(0, '::1', '2020-02-24 16:54:08', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 4);

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
(0, '::1', '2020-02-24 16:54:08', 'PC', 'Windows 10', 'Chrome 79.0.3945.130', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kategori_berita` (`id_kategori_berita`),
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
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `visitor_per_day`
--
ALTER TABLE `visitor_per_day`
  ADD PRIMARY KEY (`id_visitor`),
  ADD UNIQUE KEY `ip_address` (`ip_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori_berita` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  MODIFY `id_komentar_berita` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id_subscriber` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id_visitor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `visitor_per_day`
--
ALTER TABLE `visitor_per_day`
  MODIFY `id_visitor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
