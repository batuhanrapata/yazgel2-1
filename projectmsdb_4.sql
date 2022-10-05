-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Nis 2022, 22:21:55
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `projectmsdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','consultant','student') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@localhost.com', 'admin', '$2y$10$iQSlQY8bj3RaJqaVrXwn4OuZokRZr7Zh8ES/Vmf15gEk9I.msmLIS', NULL, '2022-04-02 11:19:25', '2022-04-02 11:19:25'),
(2, 'Consultant', 'consultant@localhost.com', 'consultant', '$2y$10$ZLd4Vv05dQep7eAXdYHGLu.ZekYQYoePkMNtgI6aVhbcb9das4mZO', NULL, '2022-04-02 11:19:25', '2022-04-02 11:19:25'),
(3, 'Student', 'student@localhost.com', 'student', '$2y$10$/RRmMRWlucMXCTDQr.8qL.ibmtzGx83QIpmvRy/c3urFpXvBi1wsm', NULL, '2022-04-02 11:19:25', '2022-04-02 11:19:25'),
(4, 'Onur', '191307004@kocaeli.edu.tr', 'student', '$2y$10$I9kUGoR9iYJgXjCdKfOyfuWH13oUJUxrh3QmCBI3EOOFRiSzZTHMu', NULL, '2022-04-02 15:43:35', '2022-04-02 15:43:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `consultants`
--

CREATE TABLE `consultants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soyad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakulte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bolum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unvan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotograf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `consultants`
--

INSERT INTO `consultants` (`id`, `semester_id`, `ad`, `soyad`, `fakulte`, `bolum`, `email`, `unvan`, `telefon`, `fotograf`, `created_at`, `updated_at`) VALUES
(1, 2, 'Seda', 'BALTA', 'Teknoloji', 'Bilişim', 'seda.balta@kocaeli.edu.tr', 'Arş. Gör.', '05349264789', 'uploads/default.jpg', '2022-03-27 19:43:27', '2022-03-27 19:43:27'),
(2, 2, 'Zeynep', 'SARI', 'Teknoloji', 'Bilişim', 'zeynep.sari@kocaeli.edu.tr', 'Arş. Gör.', '05349264789', 'uploads/default.jpg', '2022-03-27 19:44:23', '2022-03-27 19:44:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
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
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(30, '2022_03_27_173320_create_semesters_table', 2),
(31, '2022_03_27_210628_create_consultants_table', 2),
(32, '2022_03_27_210735_create_students_table', 2),
(52, '2022_04_01_212938_create_suggestions_table', 3),
(53, '2022_04_01_213004_create_reports_table', 3),
(54, '2022_04_02_095256_create_theses_table', 3),
(55, '2014_10_12_000000_create_users_table', 4),
(56, '2014_10_12_100000_create_password_resets_table', 4),
(57, '2019_08_19_000000_create_failed_jobs_table', 4),
(58, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(59, '2022_03_24_211228_create_admins_table', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED NOT NULL,
  `word_dosyasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_dosyasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durum` enum('onaylandı','reddedildi','bekleniyor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bekleniyor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `reports`
--

INSERT INTO `reports` (`id`, `student_id`, `consultant_id`, `word_dosyasi`, `pdf_dosyasi`, `durum`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'uploads/word/1648896277.Yeni Zengin Metin Belgesi.docx', 'uploads/pdf/1648896277.YazGelLabII-Birinci-Proje-isterleri.pdf', 'reddedildi', '2022-04-02 07:44:37', '2022-04-02 07:44:37'),
(2, 1, 1, 'uploads/word/1648896302.Yeni Zengin Metin Belgesi.docx', 'uploads/pdf/1648896302.YazGelLabII-Birinci-Proje-isterleri.pdf', 'onaylandı', '2022-04-02 07:45:02', '2022-04-02 07:45:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `semesters`
--

INSERT INTO `semesters` (`id`, `donem`, `created_at`, `updated_at`) VALUES
(1, '2021 - Güz', '2022-03-27 19:41:17', '2022-03-27 19:41:17'),
(2, '2021 - Bahar', '2022-03-27 19:41:20', '2022-03-27 19:41:20');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `ad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soyad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numarasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fakulte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bolum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinif` int(11) NOT NULL,
  `fotograf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `students`
--

INSERT INTO `students` (`id`, `consultant_id`, `semester_id`, `ad`, `soyad`, `numarasi`, `fakulte`, `bolum`, `sinif`, `fotograf`, `telefon`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Recep', 'Çakır', '191307002', 'Teknoloji', 'Bilişim', 3, 'uploads/1648400603.37de94f6-5372-4fb0-8092-bde3952c7854.jpg', '05349264789', '191307002@kocaeli.edu.tr', '2022-03-27 19:46:02', '2022-03-27 19:46:02'),
(2, 2, 2, 'Berk', 'Akın', '191307007', 'Teknoloji', 'Bilişim', 3, 'uploads/1748400603.37de94f6-5372-4fb0-8092-bde3952c7854.jpg', '05349264789', '191307007@kocaeli.edu.tr', '2022-03-27 19:47:46', '2022-03-27 19:47:46'),
(6, 1, 2, 'Onur', 'Akyıldız', '191307004', 'Teknoloji', 'Bilişim', 3, 'uploads/default.jpg', '05349264789', '191307004@kocaeli.edu.tr', '2022-04-02 15:43:35', '2022-04-02 15:43:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `suggestions`
--

CREATE TABLE `suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED NOT NULL,
  `baslik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amac` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `anahtar_kelimeler` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `yontem` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `durum` enum('onaylandı','reddedildi','bekleniyor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bekleniyor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `suggestions`
--

INSERT INTO `suggestions` (`id`, `student_id`, `consultant_id`, `baslik`, `amac`, `anahtar_kelimeler`, `yontem`, `durum`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kurumsal Yazılım Projesi', 'Proje Gruplarının Oluşturulması: Öğrenciler grupları dörderli olarak kendi aralarında\r\noluşturacaktır. 21-24 Şubat 2022 tarihine kadar aşağıda linki verilen Excel dosyasından grup\r\narkadaşlarınızı belirleyebilirsiniz. İlgili tarihten sonra kalan öğrenciler, boş kalan gruplara rastgele\r\nolacak şekilde eşleştirilecektir. 25 Şubat 2022’de Grupların son kez düzenlemesi için liste\r\ngüncellenecektir. Son itiraz, Listede/Gruplarda yanlışlık olduğunu düşünenler 27 Şubat 2022\r\n23:59’a kadar seda.balta@kocaeli.edu.tr hesabına dönüş yapsınlar. Bu tarihten sonra listede\r\nhiçbir şekilde değişiklik yapılmayacaktır. 28 Şubat 2022 Pazartesi Günü Grup listenin son hali\r\nedestek3 sistemi üzerinden paylaşılacaktır.\r\n', 'kurumsal firma yazılımı, otomasyon , kurumsal, proje ', 'Proje Gruplarının Oluşturulması: Öğrenciler grupları dörderli olarak kendi aralarında\r\noluşturacaktır. 21-24 Şubat 2022 tarihine kadar aşağıda linki verilen Excel dosyasından grup\r\narkadaşlarınızı belirleyebilirsiniz. İlgili tarihten sonra kalan öğrenciler, boş kalan gruplara rastgele\r\nolacak şekilde eşleştirilecektir. 25 Şubat 2022’de Grupların son kez düzenlemesi için liste\r\ngüncellenecektir. Son itiraz, Listede/Gruplarda yanlışlık olduğunu düşünenler 27 Şubat 2022\r\n23:59’a kadar seda.balta@kocaeli.edu.tr hesabına dönüş yapsınlar. Bu tarihten sonra listede\r\nhiçbir şekilde değişiklik yapılmayacaktır. 28 Şubat 2022 Pazartesi Günü Grup listenin son hali\r\nedestek3 sistemi üzerinden paylaşılacaktır.\r\n', 'reddedildi', '2022-04-01 18:38:43', '2022-04-01 18:38:43'),
(2, 1, 1, 'Proje Takip Sistemi', 'Proje Gruplarının Oluşturulması: Öğrenciler grupları dörderli olarak kendi aralarında\r\noluşturacaktır. 21-24 Şubat 2022 tarihine kadar aşağıda linki verilen Excel dosyasından grup\r\narkadaşlarınızı belirleyebilirsiniz. İlgili tarihten sonra kalan öğrenciler, boş kalan gruplara rastgele\r\nolacak şekilde eşleştirilecektir. 25 Şubat 2022’de Grupların son kez düzenlemesi için liste\r\ngüncellenecektir. Son it', 'proje takip , otomasyon , takip , proje , öğrenci', 'Proje Gruplarının Oluşturulması: Öğrenciler grupları dörderli olarak kendi aralarında\r\noluşturacaktır. 21-24 Şubat 2022 tarihine kadar aşağıda linki verilen Excel dosyasından grup\r\narkadaşlarınızı belirleyebilirsiniz. İlgili tarihten sonra kalan öğrenciler, boş kalan gruplara rastgele\r\nolacak şekilde eşleştirilecektir. 25 Şubat 2022’de Grupların son kez düzenlemesi için liste\r\ngüncellenecektir. Son it', 'onaylandı', '2022-04-02 07:43:43', '2022-04-02 07:43:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `theses`
--

CREATE TABLE `theses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED NOT NULL,
  `word_dosyasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_dosyasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durum` enum('aktif','pasif','bekleniyor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bekleniyor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `theses`
--

INSERT INTO `theses` (`id`, `student_id`, `consultant_id`, `word_dosyasi`, `pdf_dosyasi`, `durum`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'uploads/word/1648896376.Yeni Zengin Metin Belgesi.docx', 'uploads/pdf/1648896376.YazGelLabII-Birinci-Proje-isterleri.pdf', 'bekleniyor', '2022-04-02 07:46:16', '2022-04-02 07:46:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Tablo için indeksler `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `consultants_email_unique` (`email`),
  ADD KEY `consultants_semester_id_foreign` (`semester_id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_student_id_foreign` (`student_id`),
  ADD KEY `reports_consultant_id_foreign` (`consultant_id`);

--
-- Tablo için indeksler `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_numarasi_unique` (`numarasi`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_consultant_id_foreign` (`consultant_id`),
  ADD KEY `students_semester_id_foreign` (`semester_id`);

--
-- Tablo için indeksler `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suggestions_student_id_foreign` (`student_id`),
  ADD KEY `suggestions_consultant_id_foreign` (`consultant_id`);

--
-- Tablo için indeksler `theses`
--
ALTER TABLE `theses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theses_student_id_foreign` (`student_id`),
  ADD KEY `theses_consultant_id_foreign` (`consultant_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `consultants`
--
ALTER TABLE `consultants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `theses`
--
ALTER TABLE `theses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `consultants`
--
ALTER TABLE `consultants`
  ADD CONSTRAINT `consultants_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`);

--
-- Tablo kısıtlamaları `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `consultants` (`id`),
  ADD CONSTRAINT `reports_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Tablo kısıtlamaları `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `consultants` (`id`),
  ADD CONSTRAINT `students_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`);

--
-- Tablo kısıtlamaları `suggestions`
--
ALTER TABLE `suggestions`
  ADD CONSTRAINT `suggestions_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `consultants` (`id`),
  ADD CONSTRAINT `suggestions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Tablo kısıtlamaları `theses`
--
ALTER TABLE `theses`
  ADD CONSTRAINT `theses_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `consultants` (`id`),
  ADD CONSTRAINT `theses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
