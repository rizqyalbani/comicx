-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 17 Jul 2021 pada 17.57
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `old_comic`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `route`, `created_at`, `updated_at`) VALUES
(1, 1, 'home', '2021-07-17 15:44:31', '2021-07-17 15:44:31'),
(2, 1, 'app.competitor.index', '2021-07-17 15:44:34', '2021-07-17 15:44:34'),
(3, 1, 'app.competitor.create', '2021-07-17 15:44:43', '2021-07-17 15:44:43'),
(4, 1, 'app.competitor.createTeam', '2021-07-17 15:45:28', '2021-07-17 15:45:28'),
(5, 1, 'app.competitor.createTeam', '2021-07-17 15:46:01', '2021-07-17 15:46:01'),
(6, 1, 'app.competitor.create', '2021-07-17 15:46:08', '2021-07-17 15:46:08'),
(7, 1, 'app.upload.index', '2021-07-17 15:46:11', '2021-07-17 15:46:11'),
(8, 2, 'home', '2021-07-17 15:46:48', '2021-07-17 15:46:48'),
(9, 2, 'home', '2021-07-17 15:47:12', '2021-07-17 15:47:12'),
(10, 2, 'app.competitor.index', '2021-07-17 15:47:32', '2021-07-17 15:47:32'),
(11, 2, 'app.competitor.create', '2021-07-17 15:47:35', '2021-07-17 15:47:35'),
(12, 2, 'app.competitor.store', '2021-07-17 15:47:49', '2021-07-17 15:47:49'),
(13, 2, 'app.competitor.create', '2021-07-17 15:47:49', '2021-07-17 15:47:49'),
(14, 2, 'app.payment.index', '2021-07-17 15:47:51', '2021-07-17 15:47:51'),
(15, 2, 'app.payment.create', '2021-07-17 15:47:53', '2021-07-17 15:47:53'),
(16, 2, 'admin.index', '2021-07-17 15:48:21', '2021-07-17 15:48:21'),
(17, 2, 'app.payment.index', '2021-07-17 15:48:26', '2021-07-17 15:48:26'),
(18, 2, 'admin.index', '2021-07-17 15:51:44', '2021-07-17 15:51:44'),
(19, 2, 'admin.competition.index', '2021-07-17 15:51:45', '2021-07-17 15:51:45'),
(20, 2, 'admin.competitionType.index', '2021-07-17 15:51:47', '2021-07-17 15:51:47'),
(21, 2, 'admin.payment.index', '2021-07-17 15:51:48', '2021-07-17 15:51:48'),
(22, 2, 'admin.competitor.index', '2021-07-17 15:51:49', '2021-07-17 15:51:49'),
(23, 2, 'admin.user.index', '2021-07-17 15:51:50', '2021-07-17 15:51:50'),
(24, 2, 'admin.question.index', '2021-07-17 15:51:51', '2021-07-17 15:51:51'),
(25, 2, 'admin.sponsor.index', '2021-07-17 15:51:52', '2021-07-17 15:51:52'),
(26, 2, 'admin.paymentMethod.index', '2021-07-17 15:51:53', '2021-07-17 15:51:53'),
(27, 2, 'admin.panduan.index', '2021-07-17 15:51:53', '2021-07-17 15:51:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `banks`
--

INSERT INTO `banks` (`id`, `name`, `bank_logo`, `kode`, `created_at`, `updated_at`) VALUES
(1, 'Bank Rakyat Indonesia', 'bri.png', '002', '2020-09-28 01:15:36', '2020-09-28 01:15:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `competition_categories`
--

CREATE TABLE `competition_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competition_type_id` int(11) DEFAULT NULL,
  `competition_level_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competition_gender_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `isOnline` int(11) DEFAULT 1,
  `isTeam` int(11) DEFAULT 0,
  `min_member` int(11) DEFAULT 1,
  `member` int(11) DEFAULT 1,
  `teamMember` int(11) DEFAULT 0,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `competition_categories`
--

INSERT INTO `competition_categories` (`id`, `competition_type_id`, `competition_level_id`, `competition_gender_id`, `code`, `class`, `quota`, `isOnline`, `isTeam`, `min_member`, `member`, `teamMember`, `price`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'SD', 'U', 'A', '1,2,3', 30, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(2, 1, 'SD', 'U', 'B', '4,5,6', 35, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(3, 2, 'SD', 'U', 'A', '1,2,3', 30, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(4, 2, 'SD', 'U', 'B', '4,5,6', 36, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(5, 2, 'SMP', 'U', '', '7,8,9', 30, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(6, 2, 'SMA', 'U', '', '10,11,12', 30, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(7, 3, 'SMP', 'U', '', '7,8,9', 25, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(8, 3, 'SMA', 'U', '', '10,11,12', 25, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(9, 4, 'SMP', 'PA', '', '7,8,9', 20, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(10, 4, 'SMP', 'PI', '', '7,8,9', 20, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(11, 4, 'SMA', 'PA', '', '10,11,12', 20, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(12, 4, 'SMA', 'PI', '', '10,11,12', 20, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(13, 5, 'SMP', 'U', '', '7,8,9', 30, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(14, 5, 'SMA', 'U', '', '10,11,12', 30, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(15, 6, 'SMA', 'U', '', '10,11,12', 10, 1, 1, 3, 3, 0, 100000, NULL, NULL, 1),
(16, 7, 'SMA', 'U', '', '10,11,12', 30, 1, 0, 1, 1, 0, 35000, NULL, NULL, 1),
(17, 8, 'Sekolah', 'U', '', '1,2,3,4,5,6,7,8,9,10,11,12', 30, 1, 1, 1, 10, 0, 200000, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `competition_genders`
--

CREATE TABLE `competition_genders` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `competition_genders`
--

INSERT INTO `competition_genders` (`id`, `name`, `show`, `created_at`, `updated_at`) VALUES
('PA', 'Putra', 1, '2020-09-28 00:52:52', '2020-09-28 00:52:52'),
('PI', 'Putri', 1, '2020-09-28 00:52:52', '2020-09-28 00:52:52'),
('U', 'Semua gender', 0, '2020-09-28 00:52:52', '2020-09-28 00:52:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `competition_levels`
--

CREATE TABLE `competition_levels` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `competition_levels`
--

INSERT INTO `competition_levels` (`id`, `name`, `show`, `created_at`, `updated_at`) VALUES
('SD', 'SD/MI', 1, '2020-09-28 00:52:48', '2020-09-28 00:52:48'),
('Sekolah', 'Umum', 0, '2020-09-28 00:52:48', '2020-09-28 00:52:48'),
('SMA', 'SMA/SMK/MA', 1, '2020-09-28 00:52:48', '2020-09-28 00:52:48'),
('SMP', 'SMP/Mts', 1, '2020-09-28 00:52:48', '2020-09-28 00:52:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `competition_types`
--

CREATE TABLE `competition_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tm_video` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tm_file` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `competition_types`
--

INSERT INTO `competition_types` (`id`, `name`, `code`, `description`, `status`, `created_at`, `updated_at`, `image`, `slug`, `class`, `tm_video`, `tm_file`, `date_start`, `date_end`) VALUES
(1, 'Adzan', 'ADZAN', '<h5>Kategori Lomba</h5>\r\n\r\n<ul>\r\n	<li>SD/MI Putra A ( kelas, 1,2&nbsp;dan 3)</li>\r\n	<li>SD/ MI Putra B ( kelas 4,5&nbsp;dan 6)</li>\r\n</ul>\r\n\r\n<h5>Kuota peserta</h5>\r\n\r\n<ul>\r\n	<li>SD/MI Putra A : 30 Peserta</li>\r\n	<li>SD/MI Putra B : 30 Peserta</li>\r\n</ul>\r\n\r\n<h5>Teknis Lomba</h5>\r\n\r\n<ul>\r\n	<li>Peserta diharuskan mengupload video ke Google Drive masing - masing, kemudian mengupload Link Google Drive tersebut ke Website COMIC IX. Untuk penjelasan lebih jelas, bisa melihat video via YouTube, Instagram, dan Website COMIC IX.</li>\r\n	<li>Video di awali perkenalan peserta (Nama_No urut_Asal sekolah)</li>\r\n	<li>Peserta diharapkan mengumpulkan video dengan tepat waktu.</li>\r\n</ul>\r\n\r\n<h5>Point dan Presentase Penilaian</h5>\r\n\r\n<ul>\r\n	<li>Makhraj &amp; Tajwid</li>\r\n	<li>Irama dan Suara</li>\r\n</ul>\r\n\r\n<h5>Peraturan</h5>\r\n\r\n<ul>\r\n	<li>Dilarang lipsync saat membuat video</li>\r\n	<li>Kualitas video yang dikirim harus jelas, disarankan video berkualitas 720p/HD atau 1080/FULL HD.</li>\r\n	<li>Diharuskan menggunakan ADZAN SUBUH</li>\r\n	<li>Menggunakan pakaian yang rapi</li>\r\n	<li>Di larang menggunakan background yang tidak senonoh/ tidak sopan (Contoh : ada botol bir di background dll)</li>\r\n	<li>Peserta diharapkan mengambil video dalam One Take Shot (sekali pengambilan video). Peserta dilarang mengedit video (seperti di cut, dsb).</li>\r\n	<li>Peserta diperbolehkan menggunakan alat pengeras suara, seperti Microphone, dsb.</li>\r\n</ul>', 1, '2020-10-21 07:34:07', '2020-11-27 15:02:31', 'adzan.jpg', 'adzan', 'SD', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/YGJHaRgmooU\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'https://drive.google.com/file/d/1pdP_mApYvsqwZU2G6QQGrFDVCTT1yM2x/view?usp=sharing', '2021-02-07 00:00:00', '2021-02-12 00:00:00'),
(2, 'Da\'i', 'DAI', '<h5>Kategori Peserta</h5>\r\n\r\n<ul>\r\n	<li>SD/MI (Kelas 1, 2&nbsp;dan 3)</li>\r\n	<li>SD/MI (Kelas 4, 5&nbsp;dan 6)</li>\r\n	<li>SMP/MTs</li>\r\n	<li>SMA/SMK/MA</li>\r\n</ul>\r\n\r\n<h5>Kuota Peserta</h5>\r\n\r\n<ul>\r\n	<li>SD/MI (Kelas 1, 2&nbsp;dan 3) : 25 Peserta</li>\r\n	<li>SD/MI (Kelas 4, 5&nbsp;dan 6) : 25 Peserta</li>\r\n	<li>SMP/MTs : 25 Peserta</li>\r\n	<li>SMA/SMK/MA : 25 Peserta</li>\r\n</ul>\r\n\r\n<h5>Tema</h5>\r\n\r\n<ul>\r\n	<li>SD/MI (Kelas 1, 2&nbsp;dan 3) : Wujudkan generasi cinta Al-Qur&rsquo;an.</li>\r\n	<li>SD/MI (Kelas 4, 5&nbsp;dan 6) :Jalankan Sunnah Rasulullah dalam setiap langkahmu.</li>\r\n	<li>SMP/MTs : Menjadi generasi millennial yang berakhlak mulia.</li>\r\n	<li>SMA/SMK/MA : Peran pemuda muslim untuk pemimpin masa depan.</li>\r\n</ul>\r\n\r\n<h5>Teknis Lomba</h5>\r\n\r\n<ul>\r\n	<li>Peserta sudah melakukan registrasi COMIC IX secara lengkap.</li>\r\n	<li>Peserta diharapkan mengikuti semua aturan yang berlaku di COMIC IX.</li>\r\n	<li>Peserta wajib mengikuti TM (Technical Meeting) sesuai dengan jadwal yang diinformasikan. Semua pertanyaan di setiap lomba akan dijawab langsung oleh Penanggung Jawab lomba di Technical Meeting.</li>\r\n	<li>Peserta diharapkan paham dan mengikuti semua peraturan di Lomba Da&rsquo;i.</li>\r\n	<li>Jika peserta melanggar peraturan yang sudah tertulis, maka akan dilakukan pengurangan point.</li>\r\n	<li>Peserta diharapkan mengumpulkan video dengan tepat waktu.</li>\r\n	<li>Video yang dikirimkan ke Website COMIC IX akan mutlak menjadi hak milik Panitia.</li>\r\n	<li>Kualitas video yang dikirim harus jelas, disarankan video berkualitas 720p/HD atau 1080p/FULL HD.</li>\r\n	<li>Peserta diharuskan mengupload video ke Google Drive masing - masing, kemudian mengupload Link Google Drive tersebut ke Website COMIC IX. Untuk penjelasan lebih jelas, bisa melihat video via YouTube, Instagram, dan Website COMIC IX.</li>\r\n</ul>\r\n\r\n<h5>Point dan Presentasi Penilaian</h5>\r\n\r\n<ol>\r\n	<li>Isi : 20 point</li>\r\n	<li>Mimik &amp; Intonasi : 25 point</li>\r\n	<li>Penguasaan Materi : 30 point</li>\r\n	<li>Tata Krama &amp; Pembawaan : 10 point</li>\r\n	<li>Aksentuasi : 15 point</li>\r\n</ol>\r\n\r\n<h5>Peraturan</h5>\r\n\r\n<ol>\r\n	<li>Peserta tampil dengan menggunakan Bahasa Indonesia yang baik dan benar.</li>\r\n	<li>Peserta dilarang menggunakan konten yang bersifat rasis dan sara.</li>\r\n	<li>Durasi berdakwah maksimal 6 menit.</li>\r\n	<li>Batas waktu tidak boleh lebih dari 6 menit</li>\r\n	<li>Waktu 6 menit yang diawali dengan Perkenalan peserta (Nama, Nomor urut, Asal Sekolah, Kategori, dan Tema). Selanjutnya dakwah bisa dimulai.</li>\r\n	<li>Untuk teks dakwah, peserta diperbolehkan untuk membuat teks orisinil sesuai tema dan kemampuan peserta sendiri. Peserta diperbolehkan untuk mencari referensi di Google, namun dilarang untuk menjiplak karya orang lain.</li>\r\n	<li>Peserta dilarang membawa teks atau membaca teks selama berdakwah.</li>\r\n	<li>Peserta diharapkan mengambil video dalam One Take Shot (sekali pengambilan video). Peserta dilarang mengedit video (seperti di cut, dsb).</li>\r\n	<li>Peserta diperbolehkan menggunakan alat penjelas suara, seperti Microphone, dsb.</li>\r\n	<li>Audio harus terdengar dengan jelas.</li>\r\n	<li>Peserta dilarang lipsync.</li>\r\n</ol>', 1, '2020-10-21 07:34:07', '2020-11-27 15:03:13', 'dai.jpg', 'dai', 'SD, SMP, SMA', NULL, NULL, '2021-02-07 00:00:00', '2021-02-12 00:00:00'),
(3, 'Pop Religi', 'POP', '<h5>Kategori Peserta</h5>\r\n\r\n<ul>\r\n	<li>Kategori SMP : 25 Peserta (Mencakup Putra dan Putri)</li>\r\n	<li>Kategori SMA : 25 Peserta (Mencakup Putra dan Putri)</li>\r\n</ul>\r\n\r\n<h5>Teknis Pelaksanaan Lomba Pop Religi</h5>\r\n\r\n<ol>\r\n	<li>Peserta sudah melakukan registrasi secara lengkap.</li>\r\n	<li>Peserta diharapkan mengikuti semua aturan yang berlaku di COMIC IX.</li>\r\n	<li>Peserta Perlombaan Pop Religi melakukan perlombaan secara virtual berupa hasil Karya Video</li>\r\n	<li>Kualitas video harus jelas, disarankan 720p/HD atau 1080HD/FULL HD dan Audio harus terdengar jelas.</li>\r\n	<li>Peserta diwajibkan melakukan video tampak seluruh bagian anggota badan dari atas kepala sampai alas kaki.</li>\r\n	<li>Peserta Menggunakan Bahasa Indonesia yang baik dan sopan.</li>\r\n	<li>Peserta menggunakan pakaian bebas rapi dan sesuai dengan ketentuan perlombaan.</li>\r\n	<li>Peserta Dilarang Menggunakan Konten yang bersifat rasis dan sara.</li>\r\n	<li>Peserta dilarang lipsync atau membawa teks selama perlombaan.</li>\r\n	<li>Panitia menyediakan 50 list lagu untuk kemudian dipilih oleh peserta untuk dinyanyikan pada saat perlombaan.</li>\r\n	<li>Satu judul lagu maximal dipilih oleh 3 orang peserta, jika ada peserta lain memilih judul lagu yang sama, maka peserta diharapkan bersedia untuk mengganti pilihannya.</li>\r\n	<li>Durasi video 7 menit per peserta.</li>\r\n	<li>Peserta diharuskan mengupload video ke Google Drive masing-masing.Kemudian mengupload link Google Drive tersebut ke Website COMIC IX. Untuk lebih jelas bisa melihat video penjelasannya di YouTube,Instagram dan Website COMIC IX.</li>\r\n</ol>\r\n\r\n<h5>List Lagu Lomba Pop Religi</h5>\r\n\r\n<ol>\r\n	<li>Ya Maulana &ndash; Nissa Sabyan</li>\r\n	<li>Jalan Cinta &ndash; Sherina</li>\r\n	<li>Takdir Cinta &ndash; Rossa</li>\r\n	<li>Insha Allah &ndash; Maher Zain feat Padi (Indonesia + English)</li>\r\n	<li>Ibu &ndash; Opick</li>\r\n	<li>Taubat &ndash; Opick</li>\r\n	<li>Maha Melihat - Opick</li>\r\n	<li>Ketika Tangan dan Kaki Berbicara &ndash; Chrisye</li>\r\n	<li>Assalamu&rsquo;alaika &ndash; Maher Zain</li>\r\n	<li>Doa &ndash; D&rsquo;Masiv Feat Shakira Jasmine</li>\r\n	<li>Malam Lailatul Qodar &ndash; Gigi</li>\r\n	<li>Keagungan Tuhan &ndash; Gigi</li>\r\n	<li>Munafik &ndash; Gigi</li>\r\n	<li>Deen Salam &ndash; Nissa Sabyan</li>\r\n	<li>Ya Asyqol &ndash; Nissa Sabyan / Mohamed Yousef VVersin</li>\r\n	<li>Cahaya Ramadhan &ndash; Nidji</li>\r\n	<li>Jalan Lurus &ndash; Gita Gutawa</li>\r\n	<li>Taman Surgamu &ndash; D&rsquo;Masiv</li>\r\n	<li>Kekasihmu &ndash; Fatin Shidqia Lubis</li>\r\n	<li>Kembali di Jalanmu &ndash; Bintang</li>\r\n	<li>Keagunganmu &ndash; Whindy Ghemary</li>\r\n	<li>Tobat Maksiat &ndash; Wali</li>\r\n	<li>Alangkah Indahnya Hidup Ini &ndash; Al Habib Syech Assegaf</li>\r\n	<li>Kisah Sang Rasul &ndash; Al Habib Syech Assegaf</li>\r\n	<li>Sholawat Ahbabul Mustofa &ndash; Al Habib Syech Assegaf</li>\r\n	<li>Andai Ku Tau &ndash; Ungu</li>\r\n	<li>Dengan Nafasmu &ndash; Ungu</li>\r\n	<li>Kebesaranmu &ndash; ST12</li>\r\n	<li>Dunia Pasti Berputar &ndash; ST12</li>\r\n	<li>Memujamu &ndash; ST12</li>\r\n	<li>Pintu Taubat &ndash; Zivilia</li>\r\n	<li>Doa Untuk Orang Tua &ndash; Aura Gutawa</li>\r\n	<li>Atuna Tufuli &ndash; Nissa Sabyan</li>\r\n	<li>Ketika Cinta Bertasbih &ndash; Melly Goeslow</li>\r\n	<li>Solat Malam &ndash; Setia Band</li>\r\n	<li>Sepanjang Hidup (for the rest of my life) &ndash; Maher Zain</li>\r\n	<li>Tak Pantas Di Surga &ndash; Dadali</li>\r\n	<li>Sajadah Panjang &ndash; Noah</li>\r\n	<li>Bidadari Syurga &ndash; Ustadz Jefri Al-Buchori</li>\r\n	<li>Tiada Duka Yang Abadi - Opick</li>\r\n	<li>Denganmu Aku Hidup - Opick</li>\r\n	<li>Ayat - Ayat Cinta &ndash; Rossa</li>\r\n	<li>Cahaya Hati &ndash; Opick</li>\r\n	<li>Dua Kalimat Syahadat &ndash; Caramel</li>\r\n	<li>Untuk Kita Renungkan &ndash; Ebiet G Ade feat Adera</li>\r\n	<li>Tuhanku &ndash; Geisha</li>\r\n	<li>Save Me From Myself &ndash; Harris J</li>\r\n	<li>You Are My Live &ndash; Harris J</li>\r\n	<li>Tuhan Maha Cinta &ndash; Nidji</li>\r\n	<li>Ya Jamalu &ndash; Nissa Sabyan</li>\r\n</ol>\r\n\r\n<h5>Ketentuan Kostum Peserta</h5>\r\n\r\n<p><b>Putri :</b></p>\r\n\r\n<ol>\r\n	<li>Menutup Aurat</li>\r\n	<li>Tidak di perkenankan menggunakan celana jeans ketat</li>\r\n	<li>Tidak diperkenankan menggunakan kostum yang menerawang (transparan)</li>\r\n</ol>\r\n\r\n<p><b>Putra :</b></p>\r\n\r\n<ol>\r\n	<li>Menutup Aurat</li>\r\n	<li>Tidak diperkenankan menggunakan celana yang ketat (press body)</li>\r\n	<li>Tidak di perkenankan menggunakan baju kaos ketat (press body)</li>\r\n</ol>\r\n\r\n<h5>Sistem Penilaian Lomba Pop Religi</h5>\r\n\r\n<ol>\r\n	<li>Vokal : 30 % ( Max 30 Poin )</li>\r\n	<li>Penghayatan/Penjiwaan : 20 % ( Max 20 Poin )</li>\r\n	<li>Teknik/Skill : 25 % ( Max 25 Poin )</li>\r\n	<li>Penguasaan Panggung : 10 % ( Max 10 Poin )</li>\r\n	<li>Penampilan/Kostum : 15 % ( Max 15 Poin )</li>\r\n</ol>\r\n\r\n<h5>Peraturan</h5>\r\n\r\n<ol>\r\n	<li>Peserta diminta untuk membuat kualitas video dan audio dengan jelas, disarankan menggunakan mic.</li>\r\n	<li>Peserta melakukan salam, perkenalan diri,membacakan kategori dan judul lagu di awal video .</li>\r\n	<li>Peserta dapat memulai lagu yang dipilih dan melakukan lomba.</li>\r\n	<li>Waktu Perlombaan berdurasi 7 menit.</li>\r\n	<li>Peserta diharapkan mengambil video dalam One Take Shot (Sekali Pengambilan Video).</li>\r\n	<li>Peserta dilarang mengedit video seperti cut dan sebagainya.</li>\r\n	<li>Setelah selesai, peserta dapat mengakhiri dengan salam.</li>\r\n</ol>', 1, '2020-10-21 07:34:07', '2020-11-27 14:48:25', 'pop-religi.jpg', 'pop-religi', 'SMP, SMA', NULL, NULL, '2021-02-07 00:00:00', '2021-02-12 00:00:00'),
(4, 'Tilawah', 'TILAWAH', '<h5>1. Kategori Peserta</h5>\r\n\r\n<ul>\r\n	<li>SMP/MTs Putra</li>\r\n	<li>SMP/MTs Putri</li>\r\n	<li>SMA/SMK/MA Putra</li>\r\n	<li>SMA/SMK/MA Putri</li>\r\n</ul>\r\n\r\n<h5>2. Kuota Peserta</h5>\r\n\r\n<ul>\r\n	<li>SMP/MTs Putra : 20 Peserta</li>\r\n	<li>SMP/MTs Putri : 20 Peserta</li>\r\n	<li>SMA/SMK/MA Putra : 20 Peserta</li>\r\n	<li>SMA/SMK/MA Putri : 20 Peserta</li>\r\n</ul>\r\n\r\n<h5>3. Tema</h5>\r\n\r\n<ul>\r\n	<li>SMP dari juz 1-10 juz</li>\r\n	<li>SMA dari juz 1 &ndash; 20 juz</li>\r\n</ul>\r\n\r\n<h5>4. Teknis Lomba</h5>\r\n\r\n<ul>\r\n	<li>Para peserta sudah melakukan registrasi COMIC IX secara lengkap.</li>\r\n	<li>Peserta diharapkan mengikuti semua aturan yang berlaku di COMIC IX.</li>\r\n	<li>Peserta wajib mengikuti TM (Technical Meeting) sesuai dengan jadwal yang diinformasikan. Semua pertanyaan di setiap lomba akan dijawab langsung oleh Penanggung Jawab lomba di Technical Meeting.</li>\r\n	<li>Peserta diharapkan paham dan mengikuti semua peraturan di Lomba Tilawah.</li>\r\n	<li>Peserta diharapkan mengumpulkan video dengan tepat waktu.</li>\r\n	<li>Video yang dikirimkan ke Website COMIC IX akan mutlak menjadi hak milik Panitia.</li>\r\n	<li>Kualitas video yang dikirim harus jelas, disarankan video berkualitas 720p/HD atau 1080p/full HD</li>\r\n	<li>Peserta diharuskan mengupload video ke Google Drive masing - masing, kemudian mengupload link Google Drive tersebut ke Website COMIC IX. Untuk lebih jelas bisa melihat video penjelasannya via Youtube, Instagram, dan website COMIC IX.</li>\r\n</ul>\r\n\r\n<h5>5. Kriteria penilaian</h5>\r\n\r\n<ul>\r\n	<li>Tajwid (makharijul huruf, shifatul huruf, ahkamul huruf, ahkamul maddi wal qasr, dan ahkamul waqaf wal ibtida&rsquo;).</li>\r\n	<li>Fashahah (Kefasihan)</li>\r\n	<li>Lagu, suara, dan irama</li>\r\n</ul>\r\n\r\n<h5>6. Point Penilaian</h5>\r\n\r\n<ul>\r\n	<li>Tajwid : 30 Point</li>\r\n	<li>Fashohah : 30 Point</li>\r\n	<li>Lagu dan irama : 25 Point</li>\r\n	<li>Suara : 15 Point</li>\r\n</ul>\r\n\r\n<h5>7. Peraturan Lomba</h5>\r\n\r\n<ol>\r\n	<li>Lomba Tilawah atau yang biasa kita kenal dengan MTQ (Musabaqah Tilawatil Qur&#39;an) adalah bidang lomba membaca Al-Qur&rsquo;an dengan bacaan mujawwad, yaitu bacaan Al-Qur&rsquo;an yang mengandung nilai ilmu membaca (tajwid), seni (lagu dan suara), dan etika (adab) membaca.</li>\r\n	<li>Durasi lomba 6 menit yang diawali dengan perkenalan peserta (Nama, Nomor urut, Asal Sekolah, dan sebutkan Surat serta ayat yang dibaca) selanjutnya lomba bisa dimulai.</li>\r\n	<li>Peserta bersifat perorangan.</li>\r\n	<li>Peserta diharapkan mengambil video dalam One Take Shot (sekali pengambilan video). Peserta dilarang mengedit video (seperti di cut, dsb).</li>\r\n	<li>Peserta diperbolehkan menggunakan alat pengeras suara, seperti Microphone, dsb.</li>\r\n	<li>Maqro&rsquo; akan di bagikan H-1 TM (Technical Meeting).</li>\r\n	<li>Audio harus terdengar dengan jelas.</li>\r\n	<li>Peserta dilarang lipsync.</li>\r\n	<li>Peserta wajib berpakaian syar&rsquo;i\r\n	<ol>\r\n		<li>Laki &ndash; laki : rapi memakai peci</li>\r\n		<li>Perempuan : rok, kerudung</li>\r\n	</ol>\r\n	</li>\r\n	<li>Semua Peralatan Lomba seperti Al-Quran, Kalam, dll disiapkan oleh peserta masing - masing.</li>\r\n</ol>', 1, '2020-10-21 07:34:07', '2020-11-27 14:52:53', 'tilawah.jpg', 'tilawah', 'SMP, SMA', NULL, NULL, '2021-02-07 00:00:00', '2021-02-12 00:00:00'),
(5, 'Puisi Islami', 'PUISI', '<h5>a. Kategori Peserta</h5>\r\n\r\n<ul>\r\n	<li>SMP/Mts</li>\r\n	<li>SMA/SMK/MA</li>\r\n</ul>\r\n\r\n<h5>b. Kuota Peserta</h5>\r\n\r\n<ul>\r\n	<li>SMP/Mts : 30 peserta ( mencakup peserta putra, putri )</li>\r\n	<li>SMA/SMK/MA : 30 peserta ( mencakup peserta putra, putri )</li>\r\n</ul>\r\n\r\n<h5>c. Tema</h5>\r\n\r\n<ul>\r\n	<li>SMP/Mts : Pentingnya Menjalin Hubungan Sesama umat</li>\r\n	<li>SMA/SMK/MA : Memohon Pengampunanmu.</li>\r\n</ul>\r\n\r\n<h5>d. Teknis Perlombaan</h5>\r\n\r\n<ol>\r\n	<li>Peserta sudah melakukan registrasi COMIC IX secara lengkap.</li>\r\n	<li>Peserta diharapkan mengikuti semua aturan yang berlaku di COMIC IX.</li>\r\n	<li>Peserta wajib mengikuti TM (Technical Meeting) sesuai dengan jadwal yang diinformasikan. Semua pertanyaan di setiap lomba akan dijawab langsung oleh Penanggung Jawab lomba di Technical Meeting.</li>\r\n	<li>Peserta diharapkan mengumpulkan video dengan tepat waktu.</li>\r\n	<li>Kualitas video yang dikirim harus jelas, disarankan video berkualitas 720p/HD atau 1080p/full HD.</li>\r\n	<li>Peserta dilarang lipsync.</li>\r\n	<li>Audio harus terdengar dengan jelas.</li>\r\n	<li>Peserta diharuskan mengupload video ke Google Drive masing - masing, kemudian mengupload Link Google Drive tersebut ke Website COMIC IX. Untuk penjelasan lebih jelas, bisa melihat video via YouTube, Instagram, dan Website COMIC IX.</li>\r\n</ol>\r\n\r\n<h5>e. Point - Point Penilaian Perlombaan</h5>\r\n\r\n<ol>\r\n	<li>Penghayatan : Penghayatan seorang pembaca puisi dapat dilihat dari penggunaan ekspresi&nbsp;menyesuaikan makna dari tiap kata dalam puisi yang ia bawakan. Penempatan mimik wajah yang tepat untuk setiap makna kata dalam puisi merupakan bagian dari penilaian dalam pembacaan puisi.</li>\r\n	<li>Penampilan : Penampilan dari segi busana yang rapi dan sikap percaya diri di dalam video</li>\r\n	<li>Intonasi : Intonasi yang tepat saat membacakan puisi akan memberikan penekanan pada makna yang hendak disampaikan dengan puisi. Naik - turun nada menyesuaikan makna kata dalam setiap bait puisi menjadikan puisi lebih hidup.</li>\r\n	<li>Mimik : Mimik menjadi syarat wajib yang nilainya cukup tinggi, tanpa mimik atau ekspresi muka penghayatan kurang maksimal.</li>\r\n</ol>\r\n\r\n<h5>f. Kategori Penilaian</h5>\r\n\r\n<ul>\r\n	<li>Penghayatan : 20%</li>\r\n	<li>Penampilan : 15%</li>\r\n	<li>Intonasi : 15%</li>\r\n	<li>Mimik : 20%</li>\r\n	<li>Kesesuaian dengan tema : 30%</li>\r\n	<li>Perkategori penilaian skor dari 10-100, skor akhir dijumlah dari semua skor kategori.</li>\r\n</ul>\r\n\r\n<h5>g. Peraturan Lomba</h5>\r\n\r\n<ol>\r\n	<li>Diharapkan peserta menggunakan pakaian rapi dan sopan ( untuk ukhti bisa menggunakan gamis dan berhijab, untuk akhi tidak diperbolehkan menggunakan celana jeans atau sejenisnya ).</li>\r\n	<li>Durasi waktu 5 menit / Peserta</li>\r\n	<li>Waktu 5 menit yang diawali dengan Perkenalan peserta (Nama, Nomor urut, Asal Sekolah, Kategori, dan Tema).</li>\r\n	<li>Audio harus terdengar dengan jelas.</li>\r\n	<li>Peserta dilarang lipsync.</li>\r\n	<li>Peserta diperbolehkan menggunakan alat penjelas suara, seperti Microphone, dsb.</li>\r\n	<li>Peserta diperbolehkan membaca teks</li>\r\n	<li>Peserta dilarang memakai kata - kata yang berbau rasis &amp; SARA.</li>\r\n</ol>', 1, '2020-10-21 07:34:07', '2020-11-27 14:54:56', 'puisi-islami.jpg', 'puisi-islami', 'SMP, SMA', NULL, NULL, '2021-02-07 00:00:00', '2021-02-13 00:00:00'),
(6, 'Short Movie Islami', 'MOVIE', '<h5>Kategori Peserta</h5>\r\n\r\n<ul>\r\n	<li>SMK/MI</li>\r\n</ul>\r\n\r\n<h5>Kuota Peserta</h5>\r\n\r\n<ul>\r\n	<li>SMK/MA : 12 team</li>\r\n</ul>\r\n\r\n<h5>Tema Lomba</h5>\r\n\r\n<ul>\r\n	<li>Pemuda Pemudi yang Mencintai Islam di Zaman Milenial</li>\r\n</ul>\r\n\r\n<h5>Durasi Lomba</h5>\r\n\r\n<ul>\r\n	<li>12 menit</li>\r\n</ul>\r\n\r\n<h5>Teknis lomba</h5>\r\n\r\n<ul>\r\n	<li>Para peserta sudah melakukan registrasi lengkap</li>\r\n	<li>Peserta mengikuti semua aturan yang berlaku di COMIC IX</li>\r\n	<li>Peserta Dilarang menggunakan konten yang bersifat rasis dan sara</li>\r\n	<li>Durasi Short movie 12 menit sudah termasuk credit title</li>\r\n	<li>Kualitas video harus jelas, disarankan video berkualitas 720p/HD atau full HD</li>\r\n	<li>Peserta diharuskan mengupload video ke google drive masing - masing, kemudian mengupload link Google Drive tersebut ke Website COMIC IX. Untuk lebih jelas bisa melihat video penjelasannya di Youtube ,Instagram, dan Website COMIC IX</li>\r\n</ul>\r\n\r\n<h5>Poin dan persentase penilaian</h5>\r\n\r\n<ul>\r\n	<li>Ketepatan Tema (1-100) 30%</li>\r\n	<li>Teknik pengambilan gambar (1-100) 25%</li>\r\n	<li>Selarasan actor (1-100) 20%</li>\r\n	<li>Kualitas audio dan video (1-100) 25%</li>\r\n</ul>\r\n\r\n<h5>Peraturan</h5>\r\n\r\n<ul>\r\n	<li>Film berisi Himbauan,seruan atau informasi sesuai tema yang ditentukan</li>\r\n	<li>Film dikemas menarik, komunikatif, dan kreatif</li>\r\n	<li>Tidak mengandung pesan negatif atau menyimpang dari norma dan tidak bersifat radikal</li>\r\n	<li>Film tidak mengandung unsur rasisme dan sarkasme</li>\r\n	<li>Film belum pernah diikutsertakan dalam kompetisi apapun (original)</li>\r\n	<li>Menggunakan subtitle Bahasa Indonesia jika (jika film menggunakan bahasa asing/daerah)</li>\r\n	<li>Satu team berisikan 3 orang</li>\r\n	<li>Diperbolehkan memakai actor diluar team</li>\r\n</ul>', 1, '2020-10-21 07:34:07', '2020-11-27 15:25:06', 'short-movie-islami-OhRC.png', 'short-movie-islami', 'SMA', NULL, NULL, '2021-02-07 00:00:00', '2021-02-13 00:00:00'),
(7, 'Desain Poster Islami', 'POSTER', '<h5>Kategori Peserta</h5>\r\n\r\n<ul>\r\n	<li>SMA/SMK/MA</li>\r\n</ul>\r\n\r\n<h5>Kuota Peserta</h5>\r\n\r\n<ul>\r\n	<li>SMA/SMK/MA : 30 Peserta</li>\r\n</ul>\r\n\r\n<h5>Tema</h5>\r\n\r\n<ul>\r\n	<li>Peran Pemuda Islam Dalam Menghadapi Tantangan Wabah COVID-19</li>\r\n</ul>\r\n\r\n<h5>Sub Tema</h5>\r\n\r\n<ul>\r\n	<li>Kesehatan</li>\r\n	<li>Ekonomi</li>\r\n	<li>Edukasi COVID-19</li>\r\n</ul>\r\n\r\n<h5>Teknis Lomba</h5>\r\n\r\n<ul>\r\n	<li>Peserta sudah melakukan registrasi COMIC IX secara lengkap.</li>\r\n	<li>Peserta diharapkan mengikuti semua aturan yang berlaku di COMIC IX.</li>\r\n	<li>Peserta wajib mengikuti TM (Technical Meeting) sesuai dengan jadwal yang diinformasikan.</li>\r\n	<li>Semua pertanyaan di setiap lomba akan dijawab langsung oleh Penanggung Jawab lomba di Technical Meeting.</li>\r\n	<li>Peserta diharapkan paham dan mengikuti semua peraturan di Lomba Desain Poster Islami.</li>\r\n	<li>Jika peserta melanggar peraturan yang sudah tertulis, maka akan dilakukan pengurangan point.</li>\r\n	<li>Peserta diharapkan mengumpulkan hasil karya dengan tepat waktu.</li>\r\n	<li>Peserta wajib mengunggah hasil karya posternya di akun media social Instagram dengan caption :\r\n	<ul>\r\n		<li>Nama : Monik Fitriyani</li>\r\n		<li>Asal Sekolah : MAN 1 Karangasem</li>\r\n		<li>Tagar : #dpicomic2021 #comic2021 #comicmcos2021</li>\r\n		<li>Mention : @comicstikomali @mcosbali</li>\r\n	</ul>\r\n	</li>\r\n	<li>Peserta wajib mengunggah hasil karyanya di akun Instagram pribadi paling lambat Hari Sabtu, 13 Februari 2020. !!! tolong dicek lagi.</li>\r\n	<li>Karya dibuat dengan ketentuan :\r\n	<ul>\r\n		<li>Resolusi : 300ppi</li>\r\n		<li>Ukuran : A4</li>\r\n		<li>Format : JPEG (Hasil Akhir)</li>\r\n		<li>Format : PSD, CDR, AI (Hasil Mentah)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Peserta mengumpul 2 file, yaitu file mentah(PSD,CDR,AI) dan file hasil akhir(JPEG)</li>\r\n	<li>File disimpan dalam 1 folder dengan nama folder (DPI)_(sekolah asal)_( nama lengkap peserta). Contoh : DPI_ MAN 1 Karangasem_Monik Fitriyani</li>\r\n	<li>Hasil karya yang dikirimkan ke Website COMIC IX akan mutlak menjadi hak milik Panitia.</li>\r\n	<li>Peserta diharuskan mengupload hasil karyanya ke Google Drive masing - masing, kemudian mengupload Link Google Drive tersebut ke Website COMIC IX. Untuk penjelasan lebih jelas, bisa melihat video via YouTube, Instagram, dan Website COMIC IX.</li>\r\n</ul>\r\n\r\n<h5>Point dan Presentasi Penilaian</h5>\r\n\r\n<ul>\r\n	<li>Originalitas (1-100) 20%</li>\r\n	<li>Konsep Ide Desain (1-100) 15%</li>\r\n	<li>Teknik Penggunaan Software (1-100) 20%</li>\r\n	<li>Nilai Estetika dan Komunikatif (1-100) 30%</li>\r\n	<li>Kesesuaian Tema (1-100) 15%</li>\r\n</ul>\r\n\r\n<h5>Peraturan</h5>\r\n\r\n<ul>\r\n	<li>Peserta merupakan perorangan.</li>\r\n	<li>Peserta hanya diperkenankan mengirim karya 1 buah poster saja.</li>\r\n	<li>Software yang digunakan adalah Adobe Photoshop, CorelDraw, dan Adobe Illustrator.</li>\r\n	<li>Desain dapat dibuat hanya dengan ilustrasi atau menggabungkan antara ilustrasi dengan foto (catatan: foto merupakan karya sendiri bukan karya orang lain).</li>\r\n	<li>Karya desain tidak boleh mengandung unsur yang bertentangan dengan peraturan perundang - undangan yang berlaku di Indonesia: kesusilaan, moral, kekerasan dan tidak mengandung unsur pornografi, serta bertentangan dengan SARA (Suku, Agama, dan RAS).</li>\r\n	<li>Karya yang dilombakan merupakan karya asli peserta dan belum pernah diikutsertakan atau dipublikasikan untuk keperluan yang bersifat komersil serta harus bebas dari setiap kontrak atau ikatan lain.</li>\r\n	<li>Apabila dikemudian hari terdapat gugatan hak cipta, pihak Panitia tidak bertanggung jawab atas hal tersebut, Panitia akan berasumsi bahwa seluruh desain yang diikutsertakan merupakan karya orisinil peserta.</li>\r\n	<li>Apabila ditemukan kecurangan dalam pelaksanaan lomba, maka peserta yang bersangkutan dinyatakan gugur.</li>\r\n</ul>', 1, '2020-10-21 07:34:07', '2020-11-27 14:57:37', 'desain-poster-islami.jpg', 'desain-poster-islami', 'SMA', NULL, NULL, '2021-02-07 00:00:00', '2021-02-13 00:00:00'),
(8, 'Hadrah', 'HADRAH', '<h5>Kategori Peserta</h5>\r\n\r\n<ul>\r\n	<li>SD/MI</li>\r\n	<li>SMP/MTs</li>\r\n	<li>SMA/SMK/MA</li>\r\n</ul>\r\n\r\n<h5>Kuota Peserta</h5>\r\n\r\n<ul>\r\n	<li>Jumlah grup Hadrah terbatas (20 Grup)</li>\r\n</ul>\r\n\r\n<h5>Teknis Lomba</h5>\r\n\r\n<ul>\r\n	<li>Peserta berpakaian rapi dan sopan (muslim)</li>\r\n	<li>Para peserta telah melakukan registrasi secara lengkap</li>\r\n	<li>Peserta wajib mengikuti semua aturan yang berlaku di COMIC IX</li>\r\n	<li>Peserta wajib mengikuti Technical Meeting sesuai jadwal yang telah ditentukan</li>\r\n	<li>Sebelum dimulai melantunkan sholawat, peserta terlebih dahulu menyebutkan (nama majelis/grup, judul sholawat)</li>\r\n	<li>Kualitas video yang dikirim harus jelas, baik itu gambar maupun audionya, disarankan 720p/HD atau 1080p/FULL HD</li>\r\n	<li>Video yang dikirim peserta adalah Video Asli/Bukan Editan</li>\r\n	<li>Peserta mengirim/mengupload hasil videonya ke Google drive masing - masing, kemudian mengupload Link Google Drive tersebut ke website COMIC IX. Untuk lebih jelas bisa melihat video penjelasannya di Youtube, Instagram, dan Website COMIC IX</li>\r\n</ul>\r\n\r\n<h5>Point Dan Presentase Penilaian</h5>\r\n\r\n<ol>\r\n	<li>Vokal : 40</li>\r\n	<li>Adab dan Syair : 30</li>\r\n	<li>Variasi Banjari : 30</li>\r\n</ol>\r\n\r\n<h5>Peraturan</h5>\r\n\r\n<ol>\r\n	<li>Lomba ini diberlakukan untuk umum diwajibkan masih sekolah</li>\r\n	<li>Durasi peserta membuat video yaitu 8 menit</li>\r\n	<li>Jumlah grup hadrah terbatas (20)</li>\r\n	<li>Jumlah pemain hadrah dalam satu grup yaitu maksimal 10 orang</li>\r\n	<li>Alat yang digunakan adalah alat hadrah Murni/Clasican (Terbangan dan Bass)</li>\r\n	<li>Peserta grup hadrah wajib membawakan 1 buah lagu Sholawat yang ditentukan oleh panitia</li>\r\n	<li>Lagu sholawat yang harus dibawakan berjudul &ldquo;MAULA YA SHOLLI WA SALLIM&rdquo; (Banyak Versi nadanya)</li>\r\n	<li>Peserta dilarang membaca teks ketika melantunkan sholawat nanti (Dihafal)</li>\r\n	<li>Peserta diwajibkan mengenakan busana muslim</li>\r\n	<li>Peserta harus memasangkan Mic pada alat-alat hadrah, Vokal, dan Backing Vokal, agar suaranya terdengar jelas di rekaman videonya, apabila ada yang lipsync maka point dikurangi</li>\r\n	<li>Peserta diharapkan mengambil video dalam sekali pengambilan video, dan di larang keras mengedit hasil video hadrah tersebut, jika ketahuan mengedit maka pointnya akan dikurangi</li>\r\n	<li>Pada setiap lagu harus ada irama dasar banjari dan diawali melantunkan Suluk</li>\r\n	<li>Kualitas video hadrah haruslah jelas (HD/FULL HD)</li>\r\n	<li>Peserta Tidak boleh menggunakan alat elektronik (harus alat hadrah murni)</li>\r\n</ol>', 1, '2020-10-21 07:34:07', '2020-11-27 15:07:12', 'hadrah.jpg', 'hadrah', 'Anak Sekolah', NULL, NULL, '2021-02-07 00:00:00', '2021-02-13 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `competitors`
--

CREATE TABLE `competitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competition_category_id` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `competition_number` int(11) DEFAULT NULL,
  `invoice_number` int(11) DEFAULT NULL,
  `competitor_status` int(11) DEFAULT 0,
  `lock` int(11) DEFAULT 0,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` int(11) DEFAULT 0,
  `submission_status` int(11) DEFAULT 0,
  `submission_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submission_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submission_time` datetime DEFAULT NULL,
  `submission_approved_time` datetime DEFAULT NULL,
  `submission_approved_by` int(11) DEFAULT NULL,
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `songs_id` int(11) DEFAULT NULL,
  `surah_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `competitors`
--

INSERT INTO `competitors` (`id`, `competition_category_id`, `invoice_id`, `user_id`, `competition_number`, `invoice_number`, `competitor_status`, `lock`, `phone`, `phone_wa`, `total`, `submission_status`, `submission_url`, `submission_description`, `created_at`, `updated_at`, `uuid`, `submission_time`, `submission_approved_time`, `submission_approved_by`, `team_name`, `songs_id`, `surah_id`) VALUES
(1, 1, NULL, 2, NULL, NULL, 0, 0, '081558737080', NULL, 35000, 0, NULL, NULL, '2021-07-17 15:47:49', '2021-07-17 15:47:49', '2268ee88-2cc0-4dbf-b1d6-3452c2e300fa', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `competitor_auths`
--

CREATE TABLE `competitor_auths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competitor_id` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_decrypt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `competitor_auths`
--

INSERT INTO `competitor_auths` (`id`, `competitor_id`, `username`, `password`, `password_decrypt`, `created_at`, `updated_at`) VALUES
(1, 1, '20210717586', '$2y$10$ofigtiJmTxarNFalSfGHsuF0fhOkIvs8BFNSnRxxyL70nlCbk8v6O', '20210717389password', '2021-07-17 15:47:49', '2021-07-17 15:47:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `competitor_details`
--

CREATE TABLE `competitor_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competitor_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_identity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_lock` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `competitor_details`
--

INSERT INTO `competitor_details` (`id`, `competitor_id`, `name`, `from`, `birth_place`, `birth_date`, `class`, `image`, `student_identity`, `gender`, `created_at`, `updated_at`, `uuid`, `identity_lock`) VALUES
(1, 1, 'Ryan', 'ITB', NULL, NULL, '2', NULL, NULL, 'L', '2021-07-17 15:47:49', '2021-07-17 15:47:49', 'b902c34a-a1f4-424b-b177-b4dff863c830', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `competition_type_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `answer_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT 0,
  `approved_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `subtotal` int(11) DEFAULT 0,
  `total` int(11) DEFAULT 0,
  `payment_method_id` int(11) DEFAULT 0,
  `proof_of_transfer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uuid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unique_number` int(11) DEFAULT NULL,
  `approved_time` datetime DEFAULT NULL,
  `due_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `competitor_id` int(11) DEFAULT NULL,
  `competition_category_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kwitansis`
--

CREATE TABLE `kwitansis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `competitor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_message` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `isMain` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `type_message`, `target_id`, `isMain`, `user_id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 0, 1, 'Pemberitahuan', 'Halo calon peserta COMIC IX ', 1, '2020-11-11 16:01:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `message_logs`
--

CREATE TABLE `message_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2020_09_27_230451_create_faqs_table', 1),
(19, '2020_09_27_231135_create_competition_types_table', 1),
(20, '2020_09_27_231151_create_competition_levels_table', 1),
(21, '2020_09_27_231157_create_competition_genders_table', 1),
(22, '2020_09_27_231723_create_competition_categories_table', 1),
(23, '2020_09_28_081537_create_competitors_table', 1),
(24, '2020_09_28_081540_create_competitor_details_table', 1),
(25, '2020_09_28_081612_create_payment_methods_table', 1),
(26, '2020_09_28_081627_create_invoices_table', 1),
(27, '2020_09_28_083113_create_banks_table', 1),
(28, '2020_09_28_083254_create_sponsors_table', 1),
(29, '2020_10_09_112300_add_status', 2),
(31, '2020_10_10_055829_add_image', 3),
(32, '2020_10_12_084202_add_status_comp', 4),
(33, '2020_10_13_041945_add_status_del', 5),
(34, '2020_10_21_152603_add_class_at_competition_type', 6),
(35, '2020_10_24_015343_create_competitor_auths_table', 7),
(36, '2020_10_24_015636_add_competitor_uuid', 7),
(38, '2020_10_24_084055_create_submission_logs_table', 8),
(39, '2020_10_24_191347_add_video_and_file_tm', 9),
(40, '2020_10_24_210917_create_panduans_table', 10),
(41, '2020_10_25_003201_create_telegram_notifications_table', 11),
(42, '2020_10_26_174021_add_status_time', 12),
(43, '2020_10_26_205835_add_approve_time_and_ref', 13),
(44, '2020_10_27_080726_create_invoice_details_table', 14),
(45, '2020_11_10_113659_create_messages_table', 15),
(46, '2020_11_10_113702_create_message_logs_table', 15),
(47, '2020_11_10_123030_add_deadline', 16),
(48, '2020_11_14_023605_add_slug_competitor_detail', 17),
(49, '2020_11_14_072744_create_kwitansis_table', 18),
(50, '2020_11_14_094550_add_team_name', 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panduans`
--

CREATE TABLE `panduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_desktop` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_mobile` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aqshaltata.matt@gmail.com', '$2y$10$oiiB3vDnqjRSiXg3hj.rzeRRFSWjETJxCw8i/ggVClGBm1RVBiAD2', '2020-11-19 09:09:50'),
('ryanadhitama2@gmail.com', '$2y$10$Bg6ztvVuL6a7FWoIIRCEbuNtyUeGDX8hZE2lqEoi/IHFgwo5W5BTK', '2020-11-29 17:39:42'),
('endy.insanyf@gmail.com', '$2y$10$ssgiu3Q7Eu38l6FiJOXS2e2mggr3/pLHODquFwuWkgExYuJqhw0Ki', '2021-01-25 07:11:28'),
('safiah525afi@gmail.com', '$2y$10$M0CGEHt5fzg2e51iPOvxvu6TcMvwjhCj5sEqALq6V/bJE/uVxSk6K', '2021-01-28 04:45:13'),
('fitrinurayu.alfiani@gmail.com', '$2y$10$ER4izGs7T5ajyRvYdhyIMOIitZb4wj1aernFAjhLDovAca56.8Bea', '2021-02-04 02:56:18'),
('cuupayyubi@gmail.com', '$2y$10$o4rh7sNzjZ2/R.Mb2L8hNO.Rz08zy0smNFJuAcUoTkOpF2072Oq.u', '2021-02-05 02:47:43'),
('dwiseptisepti98@gmail.com', '$2y$10$UVcZRQbUrJ7yLy8u3kn2G.3Fur61a71QDdFSt3ZFaMvpUn.3Fqd9W', '2021-02-05 05:00:06'),
('rahmimaulidya13017@gmail.com', '$2y$10$UlqUSdeKLYIPIyQeb/EpxOu8ebF6jbSPT9PkRn3BQYKwzzdzRMgFm', '2021-02-07 03:13:21'),
('nurfitra832@gmail.com', '$2y$10$kyO8qa8oVwV33YKnVVEyCOfS/4JuIM39ITb5hFNBUoQMQDS8Q.hQC', '2021-02-12 11:34:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `ref_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isShow` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `type`, `bank_id`, `ref_name`, `ref_number`, `isShow`, `created_at`, `updated_at`) VALUES
(1, 'Transfer Bank', 1, 'Tiwi Anjelina', '036801053845506', '1', '2020-09-28 01:17:22', '2020-09-28 01:17:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `songs`
--

CREATE TABLE `songs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `main` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `submission_logs`
--

CREATE TABLE `submission_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competitor_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surahs`
--

CREATE TABLE `surahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ayat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `halaman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `competition_category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `telegram_notifications`
--

CREATE TABLE `telegram_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `telegram_notifications`
--

INSERT INTO `telegram_notifications` (`id`, `name`, `description`, `url`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, '[USER BARU]', 'user berhasil mendaftar di web COMIC IX', NULL, 0, 1, '2021-07-17 15:44:31', '2021-07-17 15:44:31'),
(2, '[USER BARU]', 'admin berhasil mendaftar di web COMIC IX', NULL, 0, 1, '2021-07-17 15:46:48', '2021-07-17 15:46:48'),
(3, '[PESERTA BARU]', 'Adzan SD/MI A', NULL, 0, 3, '2021-07-17 15:47:49', '2021-07-17 15:47:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decrypt_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAdmin` int(11) DEFAULT 0,
  `isAccounting` int(11) DEFAULT 0,
  `isSchool` int(11) DEFAULT 0,
  `isUser` int(11) DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `decrypt_password`, `phone`, `image`, `isAdmin`, `isAccounting`, `isSchool`, `isUser`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'user', 'user@comic.com', NULL, '$2y$10$oNj2FV/MuqxzqhgsS41tGu0pNt5mXOw/ppjsIOcFPb8B9a6B6dS8q', NULL, '081558737080', NULL, 0, 0, 0, 1, NULL, '2021-07-17 15:44:31', '2021-07-17 15:44:31', 1),
(2, 'admin', 'admin@comic.com', NULL, '$2y$10$7IW7MsI4u6yLe0x093OQsOkRRgVPK9ch.1WMKZiC6umUo1XBhBFh6', NULL, '081558737080', NULL, 1, 0, 0, 1, NULL, '2021-07-17 15:46:48', '2021-07-17 15:46:48', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `competition_categories`
--
ALTER TABLE `competition_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `competition_genders`
--
ALTER TABLE `competition_genders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `competition_levels`
--
ALTER TABLE `competition_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `competition_types`
--
ALTER TABLE `competition_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `competitors`
--
ALTER TABLE `competitors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `competitor_auths`
--
ALTER TABLE `competitor_auths`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `competitor_details`
--
ALTER TABLE `competitor_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kwitansis`
--
ALTER TABLE `kwitansis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `message_logs`
--
ALTER TABLE `message_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `panduans`
--
ALTER TABLE `panduans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `submission_logs`
--
ALTER TABLE `submission_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surahs`
--
ALTER TABLE `surahs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `telegram_notifications`
--
ALTER TABLE `telegram_notifications`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `competition_categories`
--
ALTER TABLE `competition_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `competition_types`
--
ALTER TABLE `competition_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `competitors`
--
ALTER TABLE `competitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `competitor_auths`
--
ALTER TABLE `competitor_auths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `competitor_details`
--
ALTER TABLE `competitor_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kwitansis`
--
ALTER TABLE `kwitansis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `message_logs`
--
ALTER TABLE `message_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `panduans`
--
ALTER TABLE `panduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `songs`
--
ALTER TABLE `songs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `submission_logs`
--
ALTER TABLE `submission_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surahs`
--
ALTER TABLE `surahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `telegram_notifications`
--
ALTER TABLE `telegram_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
