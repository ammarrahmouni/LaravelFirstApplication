-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 10:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firstproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_tr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name_en`, `name_ar`, `name_tr`, `created_at`, `updated_at`) VALUES
(1, 'Food', 'طعام', 'Yemek', NULL, NULL),
(2, 'Policy', 'سياسة', 'Siyaset', NULL, NULL),
(3, 'Entertaining', 'ترفيهي', 'Eğlenceli', NULL, NULL),
(4, 'News', 'أخبار', 'Haberller', NULL, NULL),
(5, 'Sport', 'رياضة', 'Spor', NULL, NULL),
(6, 'Cultural', 'ثقافي', 'Kültürel', NULL, NULL),
(7, 'Technology', 'تكنولوجيا', 'teknoloji', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `like_post` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `like_post`, `created_at`, `updated_at`) VALUES
(129, 50, 1, 1, NULL, NULL),
(130, 55, 5, 1, NULL, NULL),
(131, 54, 5, 1, NULL, NULL),
(132, 63, 5, 1, NULL, NULL),
(135, 61, 5, 1, NULL, NULL),
(144, 52, 1, 1, NULL, NULL),
(146, 63, 1, 1, NULL, NULL),
(165, 123, 1, 1, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_22_111856_create_posts_table', 1),
(6, '2021_12_22_141548_create_categorys_table', 1),
(7, '2021_12_27_141859_create_post_translations_table', 1),
(8, '2022_01_06_235129_create_likes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(46, 'yKva0jLCWTX1bSmgMJpfAmmkjOs6t1n1sI6DfwaM.jpg', 1, 1, '2022-01-11 21:29:13', '2022-01-11 21:29:13'),
(47, 'eXIkafuzYYuJYSlkrytLTFiN8YZeFRwLuq1QwjlS.jpg', 1, 1, '2022-01-11 21:30:18', '2022-01-11 21:30:18'),
(48, 'PzRAFjEEZqfKEBwBYHNW9HiGIQ2Vc3stzBwyHeZr.jpg', 1, 1, '2022-01-11 21:31:04', '2022-01-11 21:31:04'),
(49, 'PtW3gcgblSHafNTiyyfcwr8PXKW5IPREuUlW1M1Y.jpg', 1, 1, '2022-01-11 21:32:30', '2022-01-11 21:32:30'),
(50, 'ckAjXbTAAw4UBk4LJhb6jzU3dhFNCoJF4HWkD9xJ.jpg', 1, 1, '2022-01-11 21:33:58', '2022-01-11 21:33:58'),
(51, '0C8QQepIlowLUr8zU3wxbFGoWWX3A985at1gNSCc.jpg', 2, 1, '2022-01-11 22:02:02', '2022-01-11 22:02:02'),
(52, 'CF9SBqp222vwo2TtH98UCetbuRZH6g6yctrobrd9.jpg', 2, 1, '2022-01-11 22:03:42', '2022-01-11 22:03:42'),
(53, 'h7kYhUim5Pbdo7aSuPZxDKgIFM7C10Wj389vZT1w.png', 2, 1, '2022-01-11 22:06:48', '2022-01-11 22:06:48'),
(54, 'KzddDZizpfF00n8gkeQhH58OBcxfGqxHa0jqjevx.png', 2, 1, '2022-01-11 22:11:53', '2022-01-11 22:11:53'),
(55, 'zYO69Ps0NhvdMeXeIHMjumaebyalrrhgO8Bsi1Ii.png', 2, 1, '2022-01-11 22:13:39', '2022-01-17 07:08:44'),
(56, 'jCCBGmcwORnVLqbBniHH4LkAtBdY4jZssEMbyFVS.jpg', 5, 5, '2022-01-11 22:38:41', '2022-01-11 22:38:41'),
(57, '0QxX9BpXy1FoLjMZ75SC0cx1QJAZmXV4E10HzotS.png', 5, 5, '2022-01-12 14:08:05', '2022-01-12 14:08:05'),
(58, '4rP4L6h5YN97IWOHTVuJfjBmLMTyPwNdbPP5E5MY.jpg', 5, 5, '2022-01-12 14:10:12', '2022-01-12 14:10:12'),
(59, 'SMPFX19UrwpBKWdo324HGCMBlZAwXEL3DEk3VjvV.png', 5, 5, '2022-01-12 14:19:42', '2022-01-12 14:20:11'),
(60, 'qcMgIMkOEmuV7noFdSrikGAMnVtNUQcNmqUTlF1f.jpg', 5, 5, '2022-01-12 14:25:46', '2022-01-12 14:25:46'),
(61, 'xmMRultIR6btIxV8sBoSb4wxUo1Bljeiw0JvL73L.jpg', 7, 5, '2022-01-12 14:55:30', '2022-01-12 14:55:30'),
(62, '1OVZItKfLyx6JyCfUbb5mdne4sZBKIpfNk1ECE2b.jpg', 7, 5, '2022-01-12 14:58:29', '2022-01-12 22:58:38'),
(63, '4Jpw4JzanCOgGCCYs8wPBMoGY56O7XOf3i5VfY2R.jpg', 7, 5, '2022-01-12 14:59:49', '2022-01-12 14:59:49'),
(64, '11Kv0hPjl9wMrt0Z0AWDgfEWGK2Cc3AUu9mVbHWk.jpg', 7, 5, '2022-01-12 15:01:43', '2022-01-12 15:01:43'),
(65, 'wfuWVmkD2CMojYJXoBqK7KEgToksorR1R74Gwy5g.jpg', 7, 5, '2022-01-12 15:02:41', '2022-01-12 15:02:41'),
(122, 'WnsIqdHliwruQoqBguvC0pHpZz26iZZ5RKujVTBH.png', 1, 2, '2022-01-18 13:16:07', '2022-01-18 13:16:07'),
(123, 'NZqKm7qqua1fTFZlmI3RcEMPWQfjlpuXHSNiKjrH.jpg', 6, 4, '2022-01-18 14:21:11', '2022-01-18 14:21:11'),
(126, 'st7aTJk39hQr7rPNe32zKzBGVJ2BSfmiZPIyg9T1.jpg', 4, 1, '2022-01-26 13:30:14', '2022-01-26 13:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `post_translations`
--

CREATE TABLE `post_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_translations`
--

INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `title`, `description`, `created_at`, `updated_at`) VALUES
(124, 46, 'en', 'SOSHOT', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL),
(125, 46, 'ar', 'صوصيجو', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &#34;ليتراسيت&#34; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &#34;ألد', NULL, NULL),
(126, 46, 'tr', 'SOS', 'orem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960&#39;larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', NULL, NULL),
(127, 47, 'en', 'FISH', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL),
(128, 47, 'ar', 'سمك', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &#34;ليتراسيت&#34; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشراَ مع ظهور برامج النشر الإلكتروني مثل &#34;ألد', NULL, NULL),
(129, 47, 'tr', 'BALIK', 'orem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960&#39;larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', NULL, NULL),
(130, 48, 'en', 'HAMBURGER', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL),
(131, 48, 'ar', 'همبرغر', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &#34;ليتراسيت&#34; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &#34;ألد', NULL, NULL),
(132, 48, 'tr', 'BURGER', 'orem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960&#39;larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', NULL, NULL),
(133, 49, 'en', 'POTATO', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL),
(134, 49, 'ar', 'بطاطا مقلية', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق &#34;ليتراسيت&#34; (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل &#34;ألد', NULL, NULL),
(135, 49, 'tr', 'PATATES', 'orem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960&#39;larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', NULL, NULL),
(136, 50, 'en', 'meat with dough', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL),
(137, 50, 'ar', 'لحم بعجين', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم .', NULL, NULL),
(138, 50, 'tr', 'LAHMACEN', 'orem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500&#39;lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960&#39;larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', NULL, NULL),
(139, 51, 'en', 'Syria', 'Syria Policy', NULL, NULL),
(140, 51, 'ar', 'سوريا', 'السياسة السورية الحرة', NULL, NULL),
(141, 51, 'tr', 'SURİYE', 'SURİYE SİYASATI', NULL, NULL),
(142, 52, 'en', 'Algeria', 'Algeria Policy', NULL, NULL),
(143, 52, 'ar', 'الجزائر', 'السياسة في دولة الجزائر', NULL, NULL),
(144, 52, 'tr', 'Cezayir', 'Cezayir Siyasyti', NULL, NULL),
(145, 53, 'en', 'Iraq', 'Iraq Policy', NULL, NULL),
(146, 53, 'ar', 'العراق', 'العِرَاقُ رسمِيّاً جُمْهُوريَّة العِرَاق  دولة عربية، وتعد جمهورية برلمانية اتحادية وفقاً لدستور العراق، وتتكون من ثمانية عشر محافظة رسمياً، وتسعة عشر محافظة بحكم الأمر الواقع (المحافظة التاسعة عشر هي محافظة حلبجة)، عاصمته بغداد. تقع في غرب آسيا مطلة على الخليج العربي. يحده من الجنوب الكويت و المملكة العربية السعودية، ومن الشمال تركيا، ومن الغرب سوريا والأردن، ومن الشرق إيران، وهو عضو مؤسس في جامعة الدول العربية ومنظمة المؤتمر الإسلامي ومنظمة أوبك. معظم أراضي الدولة حاليًا تقع في منطقة بلاد الرافدين، وحَوت المنطقة على أولى المراكز الحضارية', NULL, NULL),
(147, 53, 'tr', 'Irak', 'Irak Siyasatı', NULL, NULL),
(148, 54, 'en', 'Saudi Arabiar', 'Saudi Arabia (or officially: the Kingdom of Saudi Arabia ) is an Arab country , and is the largest country in the Middle East by area, located specifically in the southwest of the continent of Asia and constitutes the largest part of the Arabian Peninsula, with an area of ​​about two million square kilometers. It is bordered on the north by the Republic of Iraq and Jordan, and on the north-east by the State of Kuwait , on the east by the State of Qatar and the United Arab Emirates, in addition to the Kingdom of Bahrain, which is linked to Saudi Arabia through the King Fahd Causeway located onf', NULL, NULL),
(149, 54, 'ar', 'المملكة العربية السعودية', 'السعودية (أو رَسْمِيًّا: المملكة العربية السعودية) هي دولة عربية، وتعد أكبر دول الشرق الأوسط مساحة، وتقع تحديدًا في الجنوب الغربي من قارة آسيا وتشكل الجزء الأكبر من شبه الجزيرة العربية إذ تبلغ مساحتها حوالي مليوني كيلومتر مربع. يحدها من الشمال جمهورية العراق والأردن وتحدها دولة الكويت من الشمال الشرقي، ومن الشرق تحدها كل من دولة قطر والإمارات العربية المتحدة بالإضافة إلى مملكة البحرين التي ترتبط بالسعودية من خلال جسر الملك فهد الواقع على مياه الخليج العربي، ومن الجنوب تحدها اليمن، وسلطنة عُمان من الجنوب الشرقي، كما يحدها البحر الأحمر من جهة الغرب.', NULL, NULL),
(150, 54, 'tr', 'Suudi Arabistan', 'Suudi Arabistan (resmen ya: Suudi Arabistan Krallığı ) &#39;dir Bir Arap ülkesi ve en büyük ülkesidir tarafından Ortadoğu&#39;da kıtasının güneybatısındaki özellikle bulunduğu bölgede, Asya ve en büyük kısmını oluşturmaktadır , Arap Yarımadası&#39;nın ile yaklaşık iki milyon kilometrekarelik bir alan. Bu kuzeyde sınırlanmıştır Irak ve Cumhuriyeti Ürdün, ve kuzey-doğuda tarafından Kuveyt Devleti tarafından doğuda Katar ve Devleti Birleşik Arap Emirlikleri, ek olarak Bahreyn Krallığı, olduğu Basra Körfezi sularında yer alan Kral Fahd Geçidi ile Suudi Arabistan&#39;a bağlanmakta ve güneyden Yeme', NULL, NULL),
(151, 55, 'en', 'Lebanon', 'Mediterranean Sea; its location at the crossroads of the Mediterranean Basin and the Arabian hinterland has contributed to its rich history and shaped a cultural identity of religious diversity.[16] Lebanon is home to roughly six million people and covers an area of 10,452 square kilometres (4,036 sq mi), making it one of the smallest countries in the world. The official language of the state is Arabic, while French is also formally recognized; the Lebanese dialect of Arabic is used alongside Modern Standard Arabic throughout the country.The earliest evidence of civilization in Lebanon date', NULL, NULL),
(152, 55, 'ar', 'لبنان', 'لبنان أو (رسميًّا: الجُمْهُورِيَّة اللبنانيَّة)، هي دولة عربيّة واقِعَة في الشَرق الأوسط في غرب القارة الآسيويّة. تَحُدّها سوريا من الشمال و‌الشرق، و‌فلسطين المحتلة - إسرائيل من الجنوب، وتطل من جهة الغرب على البحر الأبيض المتوسط. هو بلد ديمقراطي جمهوري طوائفي. مُعظم سكانه من العرب المسلمين و‌المسيحيين. وبخلاف غالبيّة الدول العربيّة هناك وجود فعّال للمسيحيين في الحياة العامّة والسياسيّة. هاجر وانتشر أبناؤه حول العالم منذ أيام الفينيقيين، وحاليًّا فإن عدد اللبنانيين المهاجرين يُقدَّر بضعف عدد اللبنانيين المقيمين.', NULL, NULL),
(153, 55, 'tr', 'Lübnan', 'Lübnan Cumhuriyeti, (Arapça: الجمهورية اللبنانية, el-Cumhûriyyetü&#39;l-Lübnâniyye) Doğu Akdeniz kıyısında bir Arap ve Orta Doğu ülkesi. Başkenti Beyrut&#39;tur.[7] Tarihteki Fenike uygarlığının vatanı Lübnan ve kıyılarıdır. Güneyinde bulunan İsrail ile 81, ve kuzeyinde bulunan Suriye ile 403 kilometre sınıra sahip Lübnan, Yüzölçümü 10.452 km2, nüfusu yaklaşık olarak 4.224.000&#39;dir. Lübnan&#39;ın ulusal ve resmî dili Arapçadır. 1970&#39;lere kadar Lübnan, farklı dinlerden insanların bir arada yaşadığı ve özellikle başkenti Beyrut&#39;taki finansal sektörün sayesinde Ortadoğu&#39;nun gelişmi', NULL, NULL),
(154, 56, 'en', 'Real Madrid', 'Real Madrid ( Spanish : Real Madrid Club de Fútbol, ​​meaning the Royal Madrid Football Team )  is a Spanish professional football team founded in 1902 , based in the Spanish capital, Madrid . The team plays in the Spanish League and was chosen as the best football team of the twentieth century . It has won the Spanish League 34 times (a record), and nineteen times the King of Spain’s Cup and scored a record 13 titles in the Champions League .  He is also a member of the G-14 leading clubs in EuropeCurrently abolished and replaced with the European Club Association .', NULL, NULL),
(155, 56, 'ar', 'ريال مدريد', 'ريال مدريد (بالإسبانية: Real Madrid Club de Fútbol، وتعني فريق مدريد الملكي لكرة القدم) هو فريق كرة قدم محترف إسباني أُسس عام 1902، مقره العاصمة الإسبانية مدريد. يلعب الفريق في الدوري الإسباني واختير كأفضل فريق كرة قدم في القرن العشرين، وقد فاز بالدوري الإسباني 34 مرة (رقم قياسي)، وتسعة عشر مرة بكأس ملك إسبانيا وأحرز رقمًا قياسيًا بحيازته 13 بطولة في دوري أبطال أوروبا. وهو أيضا أحد أعضاء جي–14 للأندية القيادية في أوروبا التي تم إلغاؤها حاليًا واستبدلت بـرابطة الأندية الأوروبية.\r\nظهر النادي بقوة على ساحة كرة القدم الأوروبية والإسبانية خلال عقد الخمسينيات من القرن العشرين، وبحلول عقد الثمانينيات', NULL, NULL),
(156, 56, 'tr', 'Real Madrid', 'Şablon belgelerine bakın\r\nReal Madrid ( İspanyolca : anlam Real Madrid Club de Fútbol, Kraliyet Madrid Futbol Takımı )  olan bir İspanyol profesyonel futbol takımı kuruldu 1902 , İspanya&#39;nın başkenti merkezli, Madrid . İspanya Ligi&#39;nde oynayan ve yirminci yüzyılın en iyi futbol takımı seçilen takım , İspanya Ligi&#39;ni 34 kez (rekor), on dokuz kez İspanya Kral Kupası&#39;nı kazandı ve Şampiyonlar&#39;da 13 şampiyonluk rekoru', NULL, NULL),
(157, 57, 'en', 'Barcalona', 'Barcalona Tem Barcelona (/ˌbɑːrsəˈloʊnə/ BAR-sə-LOH-nə, Catalan: [bəɾsəˈlonə], Spanish: [baɾθeˈlona]) is a city on the coast of northeastern Spain. It is the capital and largest city of the autonomous community of Catalonia, as well as the second most populous municipality of Spain. With a population of 1.6 million within city limits,[7] its urban area extends to numerous neighbouring municipalities within the Province of Barcelona and is home to around 4.8 million people,[3] making it the fifth most populous urban area in the European Union after Paris, the Ruhr area, Madrid, and Milan.[3] It', NULL, NULL),
(158, 57, 'ar', 'برشلونة', 'ي مدينة على ساحل شمال شرق اسبانيا . إنها عاصمة وأكبر مدينة في منطقة الحكم الذاتي لكاتالونيا ، بالإضافة إلى ثاني أكبر بلدية في إسبانيا من حيث عدد السكان. يبلغ عدد سكانها 1.6 مليون داخل حدود المدينة ، [7] تمتد منطقتها الحضرية إلى العديد من البلديات المجاورة داخل مقاطعة برشلونةوتعد موطنا لحوالي 4.8 مليون نسمة، [3] مما يجعلها المنطقة الحضرية الخامس من حيث عدد السكان في الاتحاد الأوروبي بعد باريس ، و الرور المنطقة، و مدريد ، و ميلان . [3] وهي واحدة من أكبر المدن الكبرى على البحر الأبيض المتوسط ، وتقع على الساحل بين مصبات نهري Llobregat و Besòs ، وتحدها من الغرب سلسلة جبال Serra de Collserola ، والت', NULL, NULL),
(159, 57, 'tr', 'Barşalona', 'Barşalona zeydoğu kıyısında bir şehir İspanya . Katalonya özerk topluluğunun başkenti ve en büyük şehri ve aynı zamanda İspanya&#39;nın en kalabalık ikinci belediyesidir. Şehir sınırları içinde 1,6 milyonluk nüfusuyla [7] kentsel alanı Barselona İli içindeki çok sayıda komşu belediyeye kadar uzanmaktadır.ve yaklaşık 4,8 milyon kişiye ev sahipliği yapmaktadır [3] o hale beşinci en kalabalık kentsel alanı içinde Avrupa Birliği sonrasında Paris , Ruhr alanı, Madrid ve Milan . [3] Akdeniz&#39;in en büyük metropollerinden biridir, Llobregat ve Besòs nehirlerinin ağızları arasındaki kıyıda bulunur ve batıda', NULL, NULL),
(160, 58, 'en', 'Manchester City', 'Manchester City Manchester City Football Club is an English football club based in Manchester that competes in the Premier League, the top flight of English football. Founded in 1880 as St. Mark&#39;s (West Gorton), it became Ardwick Association Football Club in 1887 and Manchester City in 1894. The club&#39;s home ground is the Etihad Stadium in east Manchester, to which it moved in 2003, having played at Maine Road since 1923. The club adopted their sky blue home shirts in 1894 in the first season of the club&#39;s current iteration, that have been used ever since.[4] They Manchester City Ma', NULL, NULL),
(161, 58, 'ar', 'مانشيستر سيتي', 'ادي مانشستر سيتي لكرة القدم هو نادي كرة قدم إنجليزي مقره في مانشستر ويتنافس في الدوري الإنجليزي الممتاز ، دوري كرة القدم الإنجليزية. تأسس في عام 1880 باسم سانت مارك (ويست جورتون) ، وأصبح نادي أردويك لكرة القدم في عام 1887 ومانشستر سيتي في عام 1894. ملعب الاتحاد في شرق مانشستر ، والذي انتقل إليه في عام 2003 ، بعد أن لعب في طريق مين. منذ عام 1923. اعتمد النادي قمصانهم ذات اللون الأزرق السماوي في عام 1894 في الموسم الأول من النسخة الحالية للنادي ، والتي تم استخدامها منذ ذلك الحين. [4]تم تصنيفهم حاليًا في المرتبة السادسة في جدول', NULL, NULL),
(162, 58, 'tr', 'Manchester City', 'Manchester City Futbol Kulübü , İngiliz futbolunun en üst seviyesi olan Premier Lig&#39;de mücadele eden Manchester merkezli bir İngiliz futbol kulübüdür . Olarak 1880 yılında kurulan St. Mark (Batı Gorton&#39;da) , bu oldu Ardwick Derneği Futbol Kulübü kulübün ev alanıdır 1894 yılında 1887 yılında ve Manchester City Etihad Stadium de oynadıktan sonra, 2003 yılında taşındı hangi doğu Manchester, Maine Yolu 1923&#39;ten beri. Kulüp , o zamandan beri kullanılan gök mavisi iç saha formalarını 1894&#39;te kulübün mevcut yinelemesinin ilk', NULL, NULL),
(163, 59, 'en', 'Inter Milan', 'Football Club Internazionale Milano, commonly referred to as Internazionale (pronounced [ˌinternattsjoˈnaːle]) or simply Inter, and known as Inter Milan outside Italy,[8][9] is an Italian professional football club based in Milan, Lombardy. Inter is the only Italian side to have always competed in the top flight of Italian football since its debut in 1909.\r\n\r\nFounded in 1908 following a schism within the Milan Cricket and Football Club (now AC Milan), Inter won its first championship in 1910. Since its formation, the club has won 31 domestic trophies, including 19', NULL, NULL),
(164, 59, 'ar', 'إنتر ميلان', 'و ببساطة إنتر ، والمعروف باسم إنتر ميلان خارج إيطاليا ، [8] [9] هو نادي كرة قدم إيطالي محترف مقره في ميلانو ، لومباردي . إنتر هو الفريق الإيطالي الوحيد الذي شارك دائمًا في دوري الدرجة الأولى لكرة القدم الإيطالية منذ بدايته في عام 1909.\r\n\r\nتأسس في عام 1908 بعد انشقاق داخل نادي ميلان للكريكيت وكرة القدم (الآن ميلان ) ، وفاز إنتر بأول بطولة له في عام 1910. منذ تشكيله ، فاز النادي بـ 31 لقبًا محليًا ، بما في ذلك 19 لقبًا للدوري ، و 7 كأس إيطاليا و 5 كأس السوبر إيطاليانا . من عام 2006 إلى عام 2010 ، فاز النادي بخمسة ألقاب متتالية في الدوري ، مساويًا الرقم في ذلك الوقت. [10] فازوا بدوري أبطال ان', NULL, NULL),
(165, 59, 'tr', 'Inter Milan', 'Futbol Kulübü Internazionale Milano , yaygın olarak Internazionale ( [ˌinternattsjoˈnaːle] olarak telaffuz edilir  ) veya sadece Inter olarak anılır ve İtalya dışında Inter Milan olarak bilinir , [8] [9] Milano , Lombardiya merkezli bir İtalyan profesyonel futbol kulübüdür . Inter, 1909&#39;daki ilk çıkışından bu yana İtalyan futbolunun en üst kanadında her zaman yarışan tek İtalyan tarafı.', NULL, NULL),
(166, 60, 'en', 'Juventus', 'Juventus Juventus Football Club (from Latin: iuventūs, &#39;youth&#39;; Italian pronunciation: [juˈvɛntus]), colloquially known as Juventus and Juve (pronounced [ˈjuːve]),[3] is a professional football club based in Turin, Piedmont, Italy, that competes in the Serie A, the top tier of the Italian football league system. Founded in 1897 by a group of Torinese students, the club has worn a black and white striped home kit since 1903 and has played home matches in different grounds around its city, the latest being the 41,507-capacity Juventus Stadium. Nicknamed Vecchia Signora (&#34;the Old Lady&#34;), the club', NULL, NULL),
(167, 60, 'ar', 'يوفينتوس', 'المعروف بالعامية يوفنتوس و يوفنتوس ( وضوحا  [يوفنتوس] )، [3] هي المهنية لكرة القدم نادي مقرها في تورينو ، بييمونتي ، إيطاليا، الذي ينافس في الدوري الإيطالي ، الدرجة الأولى في نظام الدوري الإيطالي لكرة القدم. تأسس النادي عام 1897 من قبل مجموعة من طلاب تورينيزي ، وقد ارتدى النادي طقمًا منزليًا مخططًا بالأبيض والأسود منذ عام 1903 ولعب مباريات على أرضه في ملاعب مختلفة حول مدينته ، وكان آخرها ملعب يوفنتوس الذي يتسع لـ 41507 متفرجًا . الملقب بـ Vecchia Signora (&#34;السيدة العجوز&#34;) ، فاز النادي بـ 36 لقبًا رسميًا في الدوري ، و 14 لقبًا في كأس إيطاليا ، وتسعة ألقاب Supercoppa Italiana ، وهو صاحب الرقم ال', NULL, NULL),
(168, 60, 'tr', 'Juventus', 'Juventus Futbol Kulübü ( Latince : iuventūs , &#39;gençlik&#39;; İtalyanca telaffuz:  [juˈvɛntus] ), halk dilinde Juventus ve Juve ( [juːve] olarak telaffuz edilir  ), [3] merkezli profesyonel bir futbol kulübüdür Torino , Piedmont , İtalya, ki rekabet edecek Serie A&#39;da , üst katman İtalyan futbol ligi sisteminin. 1897&#39;de bir grup Torineli öğrenci tarafından kurulan kulüp, 1903&#39;ten beri siyah beyaz çizgili bir iç saha forması giyiyor ve en son 41.507 kapasiteli Juventus Stadyumu olmak üzere şehrinin farklı sahalarında iç saha maçları oynadı . Takma adı Vecchia Signora (&#34;Yaşlı Kadın&#34;) olan kulüp, tüm b', NULL, NULL),
(169, 61, 'en', 'Asus', 'electronics company headquartered in Beitou District, Taipei, Taiwan. Its products include desktop computers, laptops, netbooks, mobile phones, networking equipment, monitors, wi-fi routers, projectors, motherboards, graphics cards, optical storage, multimedia products, peripherals, wearables, servers, workstations, and tablet PCs. The company is also an original equipment manufacturer (OEM).', NULL, NULL),
(170, 61, 'ar', 'لابتوب أسوس', 'لوب منمق كما سيصل سعر أو ASUS ) هو تايوانية [3] كمبيوتر متعدد الجنسيات وأجهزة الهاتف و شركة إلكترونيات مقرها في منطقة بيتو ، تايبيه ، تايوان . وتشمل منتجاتها أجهزة الكمبيوتر المكتبية ، أجهزة الكمبيوتر المحمولة ، نتبووكس ، والهواتف المحمولة، ومعدات الشبكات ، والشاشات ، وأجهزة توجيه wi-fi ، وأجهزة العرض ، واللوحات الأم ، وبطاقات الرسوميات ، والتخزين البصري ، ومنتجات الوسائط المتعددة ، والأجهزة الطرفية ، والأجهزة القابلة للارتداء ، والخوادم ، ومحطات العمل ، وأجهزة الكمبيوتر اللوحية. كما أن الشركة مُصنِّعة أصلية للمعدات (OEM).', NULL, NULL),
(171, 61, 'tr', 'Asus', ', bir Tayvan [3] uluslu bir bilgisayar telefon donanım ve merkezi Beitou Bölgesi , Taipei , Tayvan&#39;da bulunan elektronik şirketi . Ürünleri arasında masaüstü bilgisayarlar , dizüstü bilgisayarlar , netbook&#39;lar , cep telefonları bulunmaktadır., ağ donanımları, monitörler, wi-fi yönlendiriciler , projektörler , anakartlar , grafik kartları , optik depolama , multimedya ürünleri, çevre birimleri, giyilebilir cihazlar , sunucular , iş istasyonları ve tablet PC&#39;ler. Şirket ayrıca bir orijinal ekipman üreticisidir (OEM).', NULL, NULL),
(172, 62, 'en', 'Msi', 'Micro-Star International Co., Ltd (MSI; Chinese: 微星科技股份有限公司) is a Taiwanese multinational information technology corporation headquartered in New Taipei City, Taiwan. It designs, develops and provides computer hardware, related products and services, including laptops, desktops, motherboards, graphics cards, All-in-One PCs, servers, industrial computers, PC peripherals, car infotainment products, etc.', NULL, NULL),
(173, 62, 'ar', 'لابتوب MSI', 'Micro-Star International Co. ، Ltd ( MSI ؛ الصينية :微星 科技 股份有限公司) هي شركة تايوانية متعددة الجنسيات لتكنولوجيا المعلومات ومقرها في مدينة تايبيه الجديدة ، تايوان . تقوم بتصميم وتطوير وتوفير أجهزة الكمبيوتر والمنتجات والخدمات ذات الصلة ، بما في ذلك أجهزة الكمبيوتر المحمولة وأجهزة الكمبيوتر المكتبية واللوحات الأم وبطاقات الرسومات وأجهزة الكمبيوتر الكل في واحد والخوادم وأجهزة الكمبيوتر الصناعية وملحقات الكمبيوتر ومنتجات الترفيه في السيارة وما إلى ذلك.', NULL, NULL),
(174, 62, 'tr', 'Msi', 'merkezi New Taipei City , Tayvan&#39;da bulunan Tayvanlı çok uluslu bir bilgi teknolojisi şirketidir . Dizüstü bilgisayarlar, masaüstü bilgisayarlar, anakartlar, grafik kartları, Hepsi Bir Arada PC&#39;ler, sunucular , endüstriyel bilgisayarlar , PC çevre birimleri , araba bilgi-eğlence ürünleri vb. dahil olmak üzere bilgisayar donanımı, ilgili ürünler ve hizmetler tasarlar, geliştirir ve sağl', NULL, NULL),
(175, 63, 'en', 'Lenovo', 'novo Group Limited, often shortened to Lenovo (/ləˈnoʊvoʊ/ lə-NOH-voh, Chinese: 联想), is a Chinese-American [7]multinational technology company specializing in designing, manufacturing, and marketing consumer electronics, personal computers, software, business solutions, and related services. Products manufactured by the company includes desktop computers, laptops, tablet computers, smartphones, workstations, servers, supercomputers, electronic storage devices, IT management software, and smart televisions. Its best-known brands include IBM&#39;s ThinkPad business line of laptop computers, th', NULL, NULL),
(176, 63, 'ar', 'لابتوب لينوفو', 'ي الصينية-الأمريكية [7] متعددة الجنسيات شركة تكنولوجيا متخصصة في تصميم وتصنيع وتسويق الالكترونيات الاستهلاكية ، الحواسيب الشخصية ، والبرمجيات، وحلول الأعمال، والخدمات ذات الصلة. تشمل المنتجات التي تصنعها الشركة أجهزة كمبيوتر سطح المكتب ، وأجهزة الكمبيوتر المحمولة ، وأجهزة الكمبيوتر اللوحية ،الهواتف الذكية ، محطات العمل ، خوادم ، أجهزة الكمبيوتر العملاقة ، تخزين إلكترونية أجهزة، إدارة تقنية المعلومات، و أجهزة التلفزيون الذكية . تشمل أشهر علاماتها التجارية خط أعمال ThinkPad الخاص بأجهزة الكمبيوتر المحمولة من IBM ، وخطوط IdeaPad و Yoga و Legion لأجهزة الكمبيوتر المحمولة ، وخطوط IdeaCentre و Think', NULL, NULL),
(177, 63, 'tr', 'Lenovo', 'Lenovo Group Limited çoğunlukla kısaltılmış, Lenovo ( / lt ə n oʊ v oʊ / lə- NOH -voh , Çince :联想), bir Çinli-Amerikalı olduğunu [7] uluslu teknoloji şirketi tasarımı konusunda uzmanlaşmış, imalat ve pazarlama tüketici elektroniği , kişisel bilgisayarlar , yazılım, iş çözümleri ve ilgili hizmetler. Şirketin ürettiği ürünler arasında masaüstü bilgisayarlar , dizüstü bilgisayarlar , tablet bilgisayarlar ,akıllı telefonlar , iş istasyonları , sunucular , süper bilgisayarlar , elektronik depolama cihazları, BT yönetim yazılımı ve akıllı televizyonlar . Onun en iyi bilinen markalar şunlardır IBM &', NULL, NULL),
(178, 64, 'en', 'HP', 'The Hewlett-Packard Company, commonly shortened to Hewlett-Packard (/ˈhjuːlɪt ˈpækərd/ HEW-lit PAK-ərd) or HP, was an American multinational information technology company headquartered in Palo Alto, California. HP developed and provided a wide variety of hardware components, as well as software and related services to consumers, small and medium-sized businesses (SMBs), and large enterprises, including customers in the government, health, and education sectors. The company was founded in a one-car garage in Palo Alto by Bill Hewlett and David Packard in 1939, and initially produced a line of', NULL, NULL),
(179, 64, 'ar', 'لابتوب HP', 'و HP ، كان أمريكية متعددة الجنسيات تكنولوجيا المعلومات شركة مقرها في بالو ألتو، كاليفورنيا . طورت HP وقدمت مجموعة متنوعة من مكونات الأجهزة ، بالإضافة إلى البرامج والخدمات ذات الصلة للعملاء والشركات الصغيرة والمتوسطة الحجم ( SMBs) والمؤسسات الكبيرة ، بما في ذلك العملاء في قطاعات الحكومة والصحة والتعليم. تأسست الشركة في مرآب سيارة واحدة في بالو ألتو التي كتبها بيل هيوليت و ديفيد باكارد في عام 1939، وفي البداية إنتاج خط من الاختبار الإلكترونية ومعدات القياس. تم تعيين HP Garage في 367 Addison Avenue الآن كمعلم تاريخي رسمي في كاليفورنيا ، وتم تمييزه بلوحة تسميها &#34;مسقط رأس&#34; وادي السيليكون &#34;.', NULL, NULL),
(180, 64, 'tr', 'HP', 'Hewlett-Packard Company yaygın kısaltılmış, Hewlett-Packard ( / h ju l ɪ t p æ k ər d / HEW -lit PAK -ərd ) veya HP , bir Amerikan çok uluslu oldu bilgi teknolojisi merkezi şirketi Palo Alto, California . HP, tüketicilere, küçük ve orta ölçekli işletmelere ( KOBİ&#39;ler) çok çeşitli donanım bileşenlerinin yanı sıra yazılım ve ilgili hizmetler geliştirdi ve sağladı.) ve hükümet, sağlık ve eğitim sektörlerindeki müşteriler de dahil olmak üzere büyük işletmeler. Şirket, 1939&#39;da Bill Hewlett ve David Packard tarafından Palo Alto&#39;da tek arabalık bir garajda kuruldu ve başlangıçta bir dizi elektronik t', NULL, NULL),
(181, 65, 'en', 'Samsung', 'The Samsung Group[3] (or simply Samsung, stylized in logo as SΛMSUNG) (Korean: 삼성 [samsʌŋ]) is a South Korean multinational manufacturing conglomerate headquartered in Samsung Town, Seoul, South Korea.[1] It comprises numerous affiliated businesses,[1] most of them united under the Samsung brand, and is the largest South Korean chaebol (business conglomerate). As of 2020, Samsung has the 8th highest global brand value.[', NULL, NULL),
(182, 65, 'ar', 'لابتوب سامسونغ', 'في مجموعة سامسونج [3] (أو ببساطة سامسونج ، منمنمة في الشعار كما SΛMSUNG ) ( الكورية : 삼성[samsʌŋ] ) هو كوريا الجنوبيةمتعددة الجنسياتالتصنيعتكتلمقرها فيمدينة سامسونج،سيول، كوريا الجنوبية. [1] ويضم العديد من الشركات التابعة، [1] ومعظمهم من متحدين تحتسامسونجالعلامة التجارية، وتعد أكبر كوريا الجنوبية تشايبول chaebol (الائتلاف التجاري). اعتبارًا من عام 2020 ، حصلتSamsung على ثامن أعلىقيمة للعلامة التجاريةالعالمية. [4]', NULL, NULL),
(183, 65, 'tr', 'Samsung', 'Samsung Grubu [3] (veya basitçe Samsung olarak logosu stilize, SΛMSUNG ) ( Korece : 삼성[samsʌŋ] ),merkeziSamsung Town,Seul, Güney Kore&#39;debulunanGüney Koreliçok uluslu birüretimholdingidir. [1] ÇoğuSamsungmarkasıaltında birleşmiş [1] sayısız bağlı işletmeden oluşurve en büyük Güney Kore chaebol&#39;udur (iş holdingi). 2020 yılı itibarıylaSamsung, en yüksek 8. küreselmarka değerine sahiptir. [4]', NULL, NULL),
(352, 122, 'en', 'Sambusek', 'Sambusek Description', NULL, NULL),
(353, 122, 'ar', 'سمبوسك', 'سمبوسك مشكل', NULL, NULL),
(354, 122, 'tr', 'Sambusek', 'Sambusek Açıklaması', NULL, NULL),
(355, 123, 'en', 'Man With Support', 'Man With Support By @rami', NULL, NULL),
(356, 123, 'ar', 'منشور عن رامي', 'تم نشر هذا المنشور بواسطة @رامي', NULL, NULL),
(357, 123, 'tr', 'Man With Support', 'Man With Support By @rami', NULL, NULL),
(364, 126, 'en', 'asd', 'asd', NULL, NULL),
(365, 126, 'ar', 'qwe', 'qweq', NULL, NULL),
(366, 126, 'tr', 'asd', 'asd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AMMAR RAHMOUNI', 'ammarrahmouni8@gmail.com', '0546546578', 'gaziantep turkeydsds', 'O1Fw6SUc0je9AbiRsVgHLWyG58HWeQmDtsZx63Yw.jpg', '2022-01-08 15:59:27', '$2y$10$cbajOY.oUfwhjKT8t09lFuYPKQWgB3eCQh7KTkxIIJIj1fmSiX./m', 'DNySc9JkvaiBtbFD7ZifT4m3PDRJe4mP2Ri6VOdOChXDncxw67bo93m10U0a', '2022-01-08 15:58:52', '2022-01-18 08:19:54'),
(2, 'Abdullah', 'asdlsadklj@asdasd.asdasd', '05366398858', 'ajkdah kjsh djaskhd ksajhd', '6cpkFS14ELGHcbcT8r6n8vEAvpLPTOci6tkOjIef.jpg', '2022-01-04 14:24:56', '$2y$10$Nv1HbRZKFhQHUJFnRw2OYeagDa3IKpsj1Ata2XWv9.PldGkp9kOU.', NULL, '2022-01-09 14:22:32', '2022-01-18 13:14:25'),
(3, 'Belal', 'asdasdasdas@asdasd.asdsadasdas', 'alert(&#39;s&#39;)', 'alert(&#39;sadsad&#39;)', 'UdQOCJsonUfRFAlcTvMSYKnoYME8LkTJ1INbgaji.jpg', '2022-01-02 21:03:41', '$2y$10$FI8KqwyelG6SuuExj/dwAeAFH9avDQhwqMcEwkjQYO9RM7uwi7giq', NULL, '2022-01-09 21:02:48', '2022-01-24 21:07:59'),
(4, 'rami', 'qwewqewqe@asdasd.assad', '05366394478', 'gaziantep turkey', 'lEq4Tu2EXz9YXzIveJfDcA2OGzdypaR8dPM3bReP.jpg', '2022-01-02 21:16:17', '$2y$10$0/wf6Lo/joI8hOhJto6aZ.1s.hnsCf1QetOeR2NlS93R.Mv8N5vpG', NULL, '2022-01-10 21:15:51', '2022-01-18 13:24:03'),
(5, 'mohammed', 'ammar@gmail.com', '05366398857', 'gaziantep turkey', 'j7i9vhBmQHumcGzF3kqXz3bRQUsv5EfF4hDCg2N6.jpg', '2022-01-11 08:22:28', '$2y$10$opQ90mDg4wc/nPYgO42b9ewzbargkWhqg8VLts4D1muGNeEajuG6y', 'qJnKaBV3GNU4VciY4RJu9pVZmjMzSgrXTOP53mo5727jAWujVoNbxu5gGV9U', '2022-01-11 08:00:41', '2022-01-12 21:02:16'),
(6, 'mohammed', 'mohammed123@gmail.com', '53663988778', 'gaziantep turkey', 'mj2Xn6qAx2aYZttRoIcwiahxWtyxO4xYEIpdvIbY.jpg', '2022-01-11 08:23:21', '$2y$10$YPGUSMqd1bH5zVIbXIU1IOZuf43UFrleqFvXS9aO.B0xsFEEY3aOW', '4lEiq805jueRU62bfJPreO1ROgy7a8ovWLFkl4f9aCv8ikog3h8h32TRz4gQ', '2022-01-11 08:19:30', '2022-01-11 09:00:07'),
(7, 'Mustafa', 'asasads@asdasd.asdd', '21321321312312', 'asdd sds ads asdasdsdada', 'WlHW7n1F0Uxbk76xiu0LIhIYbpl0tmZk8Mu0fHbl.jpg', '2022-01-16 12:38:43', '$2y$10$.4BIczB48YwF.cIiotK86.BOEEWTvCqA6DB/IB58pkiPMeyv378Vq', NULL, '2022-01-16 12:38:30', '2022-01-16 12:38:43'),
(8, 'Ahmed ', '16061577@stu.omu.edu.tr', '2312321321321312aa', 'ajksd kjsahdjks ahjkdh akjshdkja', 'mXwiybDiy4M2loap6FZoFtA8t8CwCaTVj2xjsF6q.jpg', '2022-01-16 12:42:10', '$2y$10$qvJdDUlwYINGJ4dKWYdCh./PWRLSw6fvqdPUF/3bGVYMV3n/t.xHm', 'ZpTUHpY53DBta1h3XxAHEcKLLbcWx28zsHuAS9wbytbwIMXyBB6FeatWqicQ', '2022-01-16 12:41:06', '2022-01-16 12:42:10'),
(9, 'asdgsjah dg', 'ajhsghjsadghjas2@skjahdjk.asdsa', '4655656465564', 'jagsfdhgafsdghsfdghafhdggsfhdashgd', 'PxKmVMyNUF0ChbC8YDdjtHW8mDuHc8smG47oJ7UF.jpg', '2022-01-17 10:13:54', '$2y$10$kj1DdvhXerIIhxKzv2OIa.0BSrmaie3vRHUI5i15rbHAHBKDdlkqO', 'aOLDnN30CFUwDOLmNBXgAj66RAZLIt1LJdgoxw4FI18F7kK1dcAt2486eKXL', '2022-01-17 10:13:41', '2022-01-17 10:14:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `likes_post_id_user_id_unique` (`post_id`,`user_id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_translations_post_id_locale_unique` (`post_id`,`locale`),
  ADD KEY `post_translations_locale_index` (`locale`);

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
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `post_translations`
--
ALTER TABLE `post_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
