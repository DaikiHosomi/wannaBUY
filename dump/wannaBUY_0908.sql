-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 07, 2020 at 11:43 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wannaBUY`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-04-20 02:50:39', '2020-04-20 02:50:39'),
(2, 2, 2, '2020-04-20 02:56:18', '2020-04-20 02:56:18'),
(8, 2, 7, '2020-04-20 12:48:04', '2020-04-20 12:48:04'),
(38, 1, 12, '2020-04-22 12:42:00', '2020-04-22 12:42:00'),
(44, 1, 11, '2020-04-27 03:27:47', '2020-04-27 03:27:47'),
(47, 1, 13, '2020-04-28 15:51:51', '2020-04-28 15:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `name`, `email`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:30:59', '2020-04-22 10:30:59'),
(2, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:36:25', '2020-04-22 10:36:25'),
(3, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:36:37', '2020-04-22 10:36:37'),
(4, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:37:06', '2020-04-22 10:37:06'),
(5, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:37:41', '2020-04-22 10:37:41'),
(6, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:38:18', '2020-04-22 10:38:18'),
(7, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:38:33', '2020-04-22 10:38:33'),
(8, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:43:21', '2020-04-22 10:43:21'),
(9, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:43:27', '2020-04-22 10:43:27'),
(10, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:43:52', '2020-04-22 10:43:52'),
(11, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:44:25', '2020-04-22 10:44:25'),
(12, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:44:53', '2020-04-22 10:44:53'),
(13, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:45:05', '2020-04-22 10:45:05'),
(14, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:46:25', '2020-04-22 10:46:25'),
(15, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:46:49', '2020-04-22 10:46:49'),
(16, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:47:23', '2020-04-22 10:47:23'),
(17, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:48:28', '2020-04-22 10:48:28'),
(18, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:48:43', '2020-04-22 10:48:43'),
(19, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:48:48', '2020-04-22 10:48:48'),
(20, 3, 'test1', 'daikho2021@gmail.com', 'test1', '2020-04-22 10:49:10', '2020-04-22 10:49:10'),
(21, 3, 'test1', 'daikho2021@gmail.com', 'test2', '2020-04-22 10:49:18', '2020-04-22 10:49:18'),
(22, 3, 'Daiki', 'daikho2021@gmail.com', 'iiiiiiiii', '2020-04-22 10:56:46', '2020-04-22 10:56:46'),
(23, 3, 'Daiki', 'daikho2021@gmail.com', 'iiiiiiiii', '2020-04-22 11:00:05', '2020-04-22 11:00:05'),
(24, 3, 'Daiki', 'daikho2021@gmail.com', 'iiiiiiiii', '2020-04-22 11:01:13', '2020-04-22 11:01:13'),
(25, 3, 'Daiki', 'daikho2021@gmail.com', 'tttttttt', '2020-04-22 11:01:47', '2020-04-22 11:01:47'),
(26, 3, 'Daiki', 'daikho2021@gmail.com', 'tttttttt', '2020-04-22 11:09:17', '2020-04-22 11:09:17'),
(27, 3, 'Daiki', 'daikho2021@gmail.com', 'tttttttt', '2020-04-22 11:09:40', '2020-04-22 11:09:40'),
(28, 3, 'Daiki', 'daikho2021@gmail.com', 'Test です！', '2020-04-22 11:20:05', '2020-04-22 11:20:05'),
(29, 3, 'Daiki', 'root@root.com', 'aaaaaaaa', '2020-04-22 11:26:26', '2020-04-22 11:26:26'),
(30, 3, 'test1', 'test2@com', 'aaa', '2020-04-22 11:27:18', '2020-04-22 11:27:18'),
(31, 3, 'test', 'test2@com', 'lll', '2020-04-22 11:27:26', '2020-04-22 11:27:26'),
(32, 3, 'daiki', 'root@root.com', 'c時sfしいsk', '2020-04-22 11:28:44', '2020-04-22 11:28:44'),
(33, 1, 'みのり', 'test2@com', 'aaaaaaaaaaaaaaaaaaaa', '2020-04-24 15:11:26', '2020-04-24 15:11:26'),
(34, 1, 'aaa', 'daikho2021@gmail.com', 'daiii', '2020-04-26 03:20:03', '2020-04-26 03:20:03'),
(35, 3, 'あゝあ', 'root@root.com', 'あゝあゝ', '2020-04-26 15:27:01', '2020-04-26 15:27:01'),
(36, 3, 'ペン', 'test@com', 'aaaa', '2020-04-26 15:37:15', '2020-04-26 15:37:15'),
(37, 3, 'ペン', 'test@com', 'aaaa', '2020-04-26 15:38:32', '2020-04-26 15:38:32'),
(38, 3, 'ペン', 'test@com', 'aaaa', '2020-04-26 15:38:47', '2020-04-26 15:38:47'),
(39, 3, 'ペン', 'test@com', 'aaaa', '2020-04-26 15:40:35', '2020-04-26 15:40:35'),
(40, 3, 'ペン', 'test@com', 'aaaa', '2020-04-26 15:41:49', '2020-04-26 15:41:49'),
(41, 3, 'ペン', 'test@com', 'aaaa', '2020-04-26 15:42:32', '2020-04-26 15:42:32'),
(42, 3, 'ペン', 'test@com', 'aaaa', '2020-04-26 15:42:56', '2020-04-26 15:42:56'),
(43, 3, 'ペン', 'test@com', 'aaaa', '2020-04-26 15:45:27', '2020-04-26 15:45:27'),
(44, 3, 'ペン', 'test@com', 'aaaa', '2020-04-26 15:45:46', '2020-04-26 15:45:46'),
(45, 3, 'ペン', 'test@com', 'aaaa', '2020-04-26 15:47:46', '2020-04-26 15:47:46'),
(46, 3, 'Daiki', 'dddaiki9825@gmail.com', 'aaaaaaaaaooooo', '2020-04-26 16:05:57', '2020-04-26 16:05:57'),
(47, 3, 'aa', 'saidnaidnksjdow@gamil.com', 'aaaa', '2020-04-27 05:59:10', '2020-04-27 05:59:10'),
(48, 3, 'aa', 'saidnaidnksjdow@gamil.com', 'aaaa', '2020-04-27 05:59:26', '2020-04-27 05:59:26'),
(49, 3, 'aa', 'saidnaidnksjdow@gamil.com', 'aaaa', '2020-04-27 05:59:43', '2020-04-27 05:59:43'),
(50, 3, 'aa', 'saidnaidnksjdow@gamil.com', 'aaaa', '2020-04-27 05:59:57', '2020-04-27 05:59:57'),
(51, 3, 'Daiki', 'root@root.com', 'aaaaaa', '2020-04-27 06:10:35', '2020-04-27 06:10:35'),
(52, 3, 'Daiki', 'root@root.com', 'aaaaa', '2020-04-27 09:36:44', '2020-04-27 09:36:44'),
(53, 3, 'aa', 'k@m', 'ss', '2020-04-27 09:40:05', '2020-04-27 09:40:05'),
(54, 3, 'Daiki', 'root@root.com', 'aaa', '2020-04-27 09:41:38', '2020-04-27 09:41:38'),
(55, 3, 'Daiki', 'root@root.com', 'aaa', '2020-04-27 09:41:58', '2020-04-27 09:41:58'),
(56, 3, 'Daiki', 'root@root.com', 'aaa', '2020-04-27 09:42:01', '2020-04-27 09:42:01'),
(57, 1, 'Daiki', 'root@root.com', 'aaa', '2020-04-27 12:48:28', '2020-04-27 12:48:28'),
(58, 1, 'Daiki', 'root@root.com', 'aaaaa', '2020-04-27 12:48:35', '2020-04-27 12:48:35'),
(59, 3, 'Daiki', 'root@root.com', 'aaaaa', '2020-04-28 09:27:53', '2020-04-28 09:27:53'),
(60, 3, 'aaaaa', 'rrr@aa', 'aaaa', '2020-04-28 09:43:02', '2020-04-28 09:43:02'),
(61, 3, 'aaaaa', 'rrr@aa', 'aaaa', '2020-04-28 09:43:06', '2020-04-28 09:43:06'),
(62, 3, 'aa', 'aaaa@a', 'aa', '2020-04-28 11:13:00', '2020-04-28 11:13:00'),
(63, 3, 'aa', 'aaaa@a', 'aa', '2020-04-28 11:13:42', '2020-04-28 11:13:42'),
(64, 3, 'aa', 'aaaa@a', 'aa', '2020-04-28 11:13:43', '2020-04-28 11:13:43'),
(65, 3, 'aa', 'aaaa@a', 'aa', '2020-04-28 11:13:44', '2020-04-28 11:13:44'),
(66, 3, 'aa', 'aaaa@a', 'aa', '2020-04-28 11:14:04', '2020-04-28 11:14:04'),
(67, 3, 'aa', 'aaaa@a', 'aa', '2020-04-28 11:14:20', '2020-04-28 11:14:20'),
(68, 3, 'aa', 'aaaa@a', 'aa', '2020-04-28 11:14:28', '2020-04-28 11:14:28'),
(69, 3, 'aa', 'aaaa@a', 'aa', '2020-04-28 11:19:17', '2020-04-28 11:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `email_resets`
--

CREATE TABLE `email_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'メールアドレスを更新したユーザーID',
  `new_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ユーザーが新規に設定したメールアドレス',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(20, 3, 11, '2020-04-25 12:46:51', '2020-04-25 12:46:51'),
(21, 3, 12, '2020-04-25 12:52:09', '2020-04-25 12:52:09'),
(49, 3, 13, '2020-04-29 14:19:31', '2020-04-29 14:19:31');

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
(3, '2020_04_06_091039_create_posts_table', 1),
(4, '2020_04_06_091425_create_product_categories_table', 1),
(5, '2020_04_06_093853_create_product_conditions_table', 1),
(6, '2020_04_06_093922_create_transaction_ways_table', 1),
(7, '2020_04_07_125419_create_post_comments_table', 1),
(8, '2020_04_11_083548_create_products_table', 1),
(9, '2020_04_11_124831_create_buyers_table', 1),
(10, '2020_04_11_221452_create_favorites_table', 1),
(11, '2020_04_12_005518_create_product_images_table', 1),
(12, '2020_04_12_124811_create_product_comments_table', 1),
(13, '2020_04_20_000741_create_email_resets_table', 1),
(15, '2020_04_22_182911_create_contacts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('daikho2021@gmail.com', '$2y$10$EfK9P/uu0jjlG9D4K4fecu70.w.CTh4qF58r7/uD2L2SBWmO0qTm.', '2020-04-24 07:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `published_at`) VALUES
(15, 1, 'aaaaaaaaaaaaaaa', '2020-04-24 15:49:38'),
(16, 1, 'kdcnkldnfskckldskcldsklkdls', '2020-04-24 15:57:58'),
(19, 3, 'ああああああああ', '2020-04-25 03:11:08'),
(20, 3, 'いいいいい', '2020-04-25 03:14:34'),
(21, 3, 'ppp', '2020-04-25 12:51:31'),
(23, 1, 'aaaaa', '2020-04-27 12:12:26'),
(24, 1, 'aaa', '2020-04-27 12:12:30'),
(25, 1, 'ii', '2020-04-27 12:12:34'),
(26, 1, 'lla', '2020-04-27 12:12:38'),
(27, 1, 'jsns jcd', '2020-04-27 12:12:44'),
(28, 1, 'mcksncksla', '2020-04-27 12:12:48'),
(29, 1, 'pooooa', '2020-04-27 13:00:06'),
(31, 1, 'aaaaaaa', '2020-04-28 15:17:43'),
(32, 1, 'aaahcekhejkajkjascjxkdakfcnjsdckjsdjcscsdbcscbjdsb cdkbcmdzbfmbzmrbjkhfzjcndjbfdznmbdjfnkdjzncjknjkdznfjknxfkjndjz cjbk', '2020-04-29 08:32:39'),
(33, 1, 'aa', '2020-05-10 04:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`, `updated_at`) VALUES
(10, 1, 15, 'aaaaa', '2020-04-24 15:57:24', '2020-04-24 15:57:24'),
(13, 1, 16, 'あああああああ', '2020-04-25 02:23:17', '2020-04-25 02:23:17'),
(14, 1, 16, 'oooooo', '2020-04-25 02:40:34', '2020-04-25 02:40:34'),
(15, 3, 16, 'ooooo', '2020-04-25 02:42:00', '2020-04-25 02:42:00'),
(16, 3, 16, 'aaa', '2020-04-25 02:42:26', '2020-04-25 02:42:26'),
(17, 3, 19, 'いいいいいいい', '2020-04-25 03:11:18', '2020-04-25 03:11:18'),
(18, 3, 20, 'あああああ', '2020-04-25 03:14:43', '2020-04-25 03:14:43'),
(19, 1, 21, 'aaaa', '2020-04-26 14:16:15', '2020-04-26 14:16:15'),
(20, 1, 31, 'aaa', '2020-04-28 15:17:53', '2020-04-28 15:17:53'),
(21, 1, 31, 'aa', '2020-04-28 15:17:57', '2020-04-28 15:17:57'),
(22, 1, 31, 'aa', '2020-04-28 15:23:54', '2020-04-28 15:23:54'),
(23, 1, 32, 'aaa', '2020-04-29 08:42:30', '2020-04-29 08:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sold` int(10) UNSIGNED DEFAULT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_id` bigint(20) UNSIGNED NOT NULL,
  `product_condition_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_way_id` bigint(20) UNSIGNED NOT NULL,
  `published_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `product_name`, `introduction`, `price`, `sold`, `class_name`, `product_category_id`, `product_condition_id`, `transaction_way_id`, `published_at`) VALUES
(1, 1, 'Laravel入門', 'PHPのフレームワーク、Laravelの参考書です', 1500, 1, NULL, 3, 2, 1, '2020-04-20 06:40:25'),
(2, 1, 'test2', 'test2', 99, 1, 'test2', 3, 2, 2, '2020-04-20 06:45:37'),
(7, 1, 'test7', 'test7', 9999, 1, 'test7', 4, 4, 1, '2020-04-20 12:49:23'),
(11, 3, 'test9', 'test9', 876, 1, 'あああああ', 3, 2, 2, '2020-04-27 12:51:54'),
(12, 3, 'test8', 'test8', 887, 1, 'test8', 3, 2, 2, '2020-04-25 15:04:09'),
(13, 3, 'aa', 'aaaa', 22, 1, 'APU', 2, 2, 1, '2020-04-30 03:12:46'),
(14, 1, '国際関係論入門', 'a', 500, NULL, '国際関係論', 5, 1, 1, '2020-07-24 00:54:51'),
(15, 7, 'English', 'aa', 11111, NULL, '国際関係論', 2, 2, 2, '2020-04-30 05:10:03'),
(16, 1, 'dg', 'dg', 1560, NULL, 'fd', 1, 1, 3, '2020-07-24 00:45:04'),
(17, 1, 'ji', 'ji', 1111, NULL, 'ji', 4, 2, 3, '2020-09-05 09:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'APS/環境・開発', NULL, NULL),
(2, 'APS/観光学', NULL, NULL),
(3, 'APS/国際関係', NULL, NULL),
(4, 'APS/文化・社会・メディア', NULL, NULL),
(5, 'APS/その他', NULL, NULL),
(6, 'APM/会計・ファイナンス', NULL, NULL),
(7, 'APM/マーケティング', NULL, NULL),
(8, 'APM/経営戦略と組織', NULL, NULL),
(9, 'APM/イノベーション・経済学', NULL, NULL),
(10, 'APM/その他', NULL, NULL),
(11, '共通教養科目/APUリテラシー', NULL, NULL),
(12, '共通教養科目/世界市民基盤', NULL, NULL),
(13, '共通教養科目/社会ニーズ対応', NULL, NULL),
(14, '言語科目/英語', NULL, NULL),
(15, '言語科目/日本語', NULL, NULL),
(16, '言語科目/AP言語', NULL, NULL),
(17, '資格試験参考書', NULL, NULL),
(18, 'その他', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `user_id`, `buyer_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'aa', '2020-04-20 02:56:21', '2020-04-20 02:56:21'),
(2, 1, 2, 'kakaka', '2020-04-20 06:45:02', '2020-04-20 06:45:02'),
(7, 2, 8, 'こんにちは！', '2020-04-20 12:48:15', '2020-04-20 12:48:15'),
(8, 1, 8, 'aaa', '2020-04-20 12:48:58', '2020-04-20 12:48:58'),
(15, 3, 44, 'aaaaa', '2020-04-27 06:10:06', '2020-04-27 06:10:06'),
(16, 3, 44, 'nnn', '2020-04-27 12:51:41', '2020-04-27 12:51:41'),
(17, 1, 47, 'aaa', '2020-04-30 03:10:35', '2020-04-30 03:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_conditions`
--

CREATE TABLE `product_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_conditions`
--

INSERT INTO `product_conditions` (`id`, `product_condition`, `created_at`, `updated_at`) VALUES
(1, '新品・未使用', NULL, NULL),
(2, '書き込みはほとんどない', NULL, NULL),
(3, '少しの書き込み汚れあり、', NULL, NULL),
(4, 'やや書き込み汚れありあり', NULL, NULL),
(5, '全体的に書き込み汚れありあり', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_number` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_image`, `image_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://webty.jp/staffblog/wp-content/uploads/2019/08/thumbnail_laravel-660x500.png', 1, NULL, NULL),
(2, 2, 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_1250,w_1900/greqstzr28wvydabszcq.png', 1, '2020-04-20 02:55:45', '2020-04-20 02:55:45'),
(7, 7, 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_1217,w_1920/xcelcgp05mr8qdbuicxy.png', 1, '2020-04-20 07:24:04', '2020-04-20 07:24:04'),
(12, 11, 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_1117,w_1920/njt6yhikfkk1jan8quik.png', 1, '2020-04-21 05:54:41', '2020-04-21 05:54:41'),
(13, 12, 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_1250,w_1900/xm9iosybphglujsv8dhs.png', 1, '2020-04-21 06:30:23', '2020-04-21 06:30:23'),
(14, 13, 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_500,w_1500/ssj5bz4ibn7oikngsbim.png', 1, '2020-04-28 11:22:19', '2020-04-28 11:22:19'),
(15, 14, 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_1217,w_1920/afzmtrm79lxusisr8npv.png', 1, '2020-04-30 02:19:11', '2020-04-30 02:19:11'),
(16, 14, 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_1108,w_1478/v8egqkhzwtqcsyu9djoq.png', 2, '2020-04-30 02:19:17', '2020-04-30 02:19:17'),
(17, 15, 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_1108,w_1478/j52p7nww8msyuwec7boz.png', 1, '2020-04-30 05:10:10', '2020-04-30 05:10:10'),
(18, 16, 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_1477,w_1108/kleui8tvfnqtvadikpjz.png', 1, '2020-05-09 17:03:27', '2020-05-09 17:03:27'),
(19, 16, 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_499,w_387/svdixzgvpbqoabybv5ty.png', 2, '2020-05-09 17:03:29', '2020-05-09 17:03:29'),
(20, 17, 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_500,w_500/d33wcde7tgsuwhrxmukl.png', 1, '2020-09-05 09:00:49', '2020-09-05 09:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_ways`
--

CREATE TABLE `transaction_ways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_way` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_ways`
--

INSERT INTO `transaction_ways` (`id`, `transaction_way`, `created_at`, `updated_at`) VALUES
(1, '天空受渡・現金取引', NULL, NULL),
(2, '下界受渡・現金取引', NULL, NULL),
(3, 'その他', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_basis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `introduction`, `department`, `grade`, `gender`, `language_basis`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Daiki', 'root@root.com', NULL, '$2y$10$M82k/XRWTFTCCKhJBEnn5OMlH.J.R1jROfWd/.pK4fn.hKKI.wk4m', 'よろしくお願いします！', 'APM', '４回生', '男子', '日本語', 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_720,w_1280/xraren8csu14sehjqc5y.png', NULL, NULL, '2020-05-08 13:30:32'),
(2, 'test2', 'test2@com', NULL, '$2y$10$aKkLHV2OszWq0PIoduiO0OMkxpX0hx5oCKG43ZPuxI6dEtpXWKYVq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-20 02:50:36', '2020-04-20 02:50:36'),
(3, 'aa', 'daikho2021@gmail.com', NULL, '$2y$10$xLwrHs3tKSl5EfGsuS3P.OneiEynmc/ov1BTNNuPkQ2IzTcjf/9fq', 'よろしくお願いします！', 'APS', '３回生', '男子', 'English', 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_485,w_627/hgxf4zuviwhmp0udgs07.png', 'wlijHbwZbWwPfzyqtKuPZXLaBqhXYcEspDJT2wiwv47EzIhAPo2T5g0YxKXf', '2020-04-20 14:43:38', '2020-04-27 09:01:21'),
(4, 'test4', 'test4@com', NULL, '$2y$10$wJiSnr3x4MrCMoadxUeDOuIUFRlDUX876jF.zwVGklDrzBq/jB9ru', 'aa', 'APM', '２回生', '男子', 'English', 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_1250,w_1900/ykwzxqftgopf0x0wcwin.png', NULL, '2020-04-27 11:32:53', '2020-04-27 11:44:51'),
(5, 'Daiki', 'a@a', NULL, '$2y$10$TBo/lP1z9d74tLxKRCVbde4heCXGVe/Fz2wYmWWPVJqNCKSWadFOG', 'aaaa', 'APS', '２回生', '男子', 'English', NULL, NULL, '2020-04-27 13:04:14', '2020-04-27 13:04:26'),
(6, 'aaa', 'test3@com', NULL, '$2y$10$fhFXOdneB6kvcbPhiv6n7u7XER0731VHJbhQw.MjHw8zyYXLA4eKu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-28 13:09:06', '2020-04-28 13:09:06'),
(7, 'wannaBUYBUY', 'wannabuy.apu@gmail.com', NULL, '$2y$10$UTsUayIVc9fEGj1uJf9nou66PMy8yhE3FnFUQrTsMKnbFkjO.K8ZO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-30 05:09:43', '2020-04-30 05:09:43'),
(8, 'test1', 'test1@com', NULL, '$2y$10$pNOnjMC097hun/zSpQdPpuJe8V0tFz4FIpW5dEgVpls/bw1CazUFW', 'aa', 'APM', '１回生', '男子', '日本語', 'http://res.cloudinary.com/dupdnludz/image/upload/c_fit,h_600,w_600/as9acqktaw9mltwlqeop.png', NULL, '2020-07-09 12:17:01', '2020-07-09 12:19:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `buyers_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `buyers_product_id_foreign` (`product_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `email_resets`
--
ALTER TABLE `email_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_resets_user_id_foreign` (`user_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorites_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `favorites_id_index` (`id`),
  ADD KEY `favorites_user_id_index` (`user_id`),
  ADD KEY `favorites_product_id_index` (`product_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comments_user_id_foreign` (`user_id`),
  ADD KEY `post_comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`),
  ADD KEY `products_product_condition_id_foreign` (`product_condition_id`),
  ADD KEY `products_transaction_way_id_foreign` (`transaction_way_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comments_user_id_foreign` (`user_id`),
  ADD KEY `product_comments_buyer_id_foreign` (`buyer_id`);

--
-- Indexes for table `product_conditions`
--
ALTER TABLE `product_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `transaction_ways`
--
ALTER TABLE `transaction_ways`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `email_resets`
--
ALTER TABLE `email_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_conditions`
--
ALTER TABLE `product_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaction_ways`
--
ALTER TABLE `transaction_ways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyers`
--
ALTER TABLE `buyers`
  ADD CONSTRAINT `buyers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `buyers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_resets`
--
ALTER TABLE `email_resets`
  ADD CONSTRAINT `email_resets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_condition_id_foreign` FOREIGN KEY (`product_condition_id`) REFERENCES `product_conditions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_transaction_way_id_foreign` FOREIGN KEY (`transaction_way_id`) REFERENCES `transaction_ways` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `product_comments_buyer_id_foreign` FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
