-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 06:22 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(9, 4, 2, 1, '127.0.0.1', 1, '2020-06-08 13:53:56', '2020-06-08 14:03:21'),
(10, 3, 2, 2, '127.0.0.1', 1, '2020-06-08 14:10:01', '2020-06-08 14:10:18'),
(12, 6, 2, 4, '127.0.0.1', 1, '2020-06-08 14:15:59', '2020-06-08 14:16:12'),
(14, 4, 2, 6, '127.0.0.1', 1, '2020-06-09 00:41:48', '2020-06-09 00:42:03'),
(15, 4, 2, 7, '127.0.0.1', 1, '2020-06-09 00:42:10', '2020-06-09 00:42:25'),
(19, 3, 2, 9, '127.0.0.1', 1, '2020-06-10 06:59:57', '2020-06-10 07:00:08'),
(21, 2, 2, 10, '127.0.0.1', 5, '2020-06-10 07:00:16', '2020-06-10 07:00:46'),
(22, 1, 2, 10, '127.0.0.1', 3, '2020-06-10 07:00:19', '2020-06-10 07:00:46'),
(23, 1, 2, 11, '127.0.0.1', 2, '2020-06-10 07:03:18', '2020-06-11 08:28:22'),
(62, 6, NULL, 12, '127.0.0.1', 1, '2020-06-13 01:12:59', '2020-06-13 01:14:02'),
(63, 5, NULL, 12, '127.0.0.1', 1, '2020-06-13 01:13:00', '2020-06-13 01:14:02'),
(64, 4, NULL, 12, '127.0.0.1', 1, '2020-06-13 01:13:04', '2020-06-13 01:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `banner_image`, `icon_image`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Cloth', 'cloth', 'cloth-2020-05-10-5eb839410530c.jpg', 'cloth-2020-05-10-5eb839426340d.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis', NULL, '2020-05-10 11:26:26', '2020-05-10 11:26:26'),
(2, 'Electronics', 'electronics', 'electronics-2020-05-10-5eb839c2c2a58.jpg', 'electronics-2020-05-10-5eb839c35cd4c.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis', NULL, '2020-05-10 11:28:35', '2020-05-10 11:28:35'),
(3, 'T shirt', 't-shirt', 't-shirt-2020-05-10-5eb839fd4b4d9.png', 'default.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis', 1, '2020-05-10 11:29:33', '2020-05-10 11:29:33'),
(4, 'Hat', 'hat', 'default.png', 'default.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis', 1, '2020-05-10 11:30:22', '2020-05-10 11:30:22'),
(5, 'Dressess', 'dressess', 'default.png', 'default.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis', 1, '2020-05-10 11:30:35', '2020-05-10 11:30:35'),
(6, 'Watch', 'watch', 'default.png', 'default.png', NULL, 2, '2020-05-10 11:30:49', '2020-05-10 11:30:49'),
(7, 'Shoes', 'shoes', 'shoes-2020-05-10-5eb83a854fc75.jpg', 'shoes-2020-05-10-5eb83a85685e5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis', NULL, '2020-05-10 11:31:49', '2020-05-10 11:31:49'),
(8, 'Converse', 'converse', 'default.png', 'default.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis', 7, '2020-05-10 11:32:07', '2020-05-10 11:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `slug`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Khulna Shador', 'khulna-shador', '4', '2020-05-09 06:51:21', '2020-05-09 06:51:21'),
(2, 'Dhaka', 'dhaka', '1', '2020-05-09 06:52:43', '2020-05-09 06:52:43'),
(3, 'Jessor', 'jessor', '4', '2020-05-09 06:55:57', '2020-05-09 06:55:57'),
(4, 'Satkhira', 'satkhira', '4', '2020-05-09 06:59:23', '2020-05-09 06:59:23'),
(5, 'Narayongonj', 'narayongonj', '1', '2020-05-09 07:03:57', '2020-05-09 07:03:57'),
(6, 'Cox\'s Bazar', 'coxs-bazar', '3', '2020-05-09 07:15:22', '2020-05-09 07:21:13'),
(8, 'barisal sador', 'barisal-sador', '5', '2020-05-09 07:26:34', '2020-05-09 07:27:19'),
(9, 'Brarisal 23', 'brarisal-23', '5', '2020-05-09 07:27:38', '2020-05-09 07:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `slug`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'dhaka', '1', '2020-05-09 06:09:24', '2020-05-09 06:09:24'),
(2, 'Rajshai', 'rajshai', '2', '2020-05-09 06:10:02', '2020-05-09 06:10:02'),
(3, 'Chittagong', 'chittagong', '3', '2020-05-09 06:10:17', '2020-05-09 06:10:17'),
(4, 'Khulna', 'khulna', '4', '2020-05-09 06:10:29', '2020-05-09 06:10:29'),
(5, 'Barisal', 'barisal', '5', '2020-05-09 06:10:52', '2020-05-09 06:10:52'),
(6, 'Sylhet', 'sylhet', '6', '2020-05-09 06:11:14', '2020-05-09 06:11:14'),
(7, 'Rangpur', 'rangpur', '7', '2020-05-09 06:11:31', '2020-05-09 06:11:31'),
(8, 'Mymensingh', 'mymensingh', '8', '2020-05-09 06:11:58', '2020-05-09 06:11:58'),
(11, 'test', 'test', '12', '2020-05-10 09:40:57', '2020-05-10 09:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featureds`
--

CREATE TABLE `featureds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_12_191055_create_roles_table', 1),
(5, '2020_04_15_151129_create_categories_table', 1),
(6, '2020_04_15_151501_create_products_table', 1),
(7, '2020_05_04_132917_create_brands_table', 1),
(8, '2020_05_04_132949_create_featureds_table', 1),
(9, '2020_05_04_133959_create_admins_table', 1),
(10, '2020_05_04_135147_create_product_images_table', 1),
(11, '2020_05_09_105514_create_divisions_table', 1),
(12, '2020_05_09_105555_create_districts_table', 1),
(21, '2020_06_06_165544_create_settings_table', 4),
(22, '2020_06_06_175411_create_payments_table', 5),
(24, '2020_05_10_174950_create_orders_table', 6),
(27, '2020_05_10_194905_create_carts_table', 7),
(28, '2020_06_11_133730_create_sliders_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT '0',
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `name`, `phone`, `shipping_address`, `email`, `message`, `is_paid`, `is_completed`, `is_seen_by_admin`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '127.0.0.1', 'Mr Customer', '01912761001', 'Holding no 32, Road no 06', 'customer@fixdesignbd.com', 'dfd', 0, 0, 0, NULL, '2020-06-08 14:03:21', '2020-06-08 14:03:21'),
(2, 2, 2, '127.0.0.1', 'Mr Customer', '01912761001', 'Holding no 32, Road no 06', 'customer@fixdesignbd.com', NULL, 0, 0, 0, '86987647646', '2020-06-08 14:10:18', '2020-06-08 14:10:18'),
(4, 2, 1, '127.0.0.1', 'Mr Customer', '01912761001', 'Holding no 32, Road no 06', 'customer@fixdesignbd.com', NULL, 0, 0, 0, NULL, '2020-06-08 14:16:12', '2020-06-08 14:16:12'),
(5, 18, 1, '127.0.0.1', 'Nasrin Sddiika', '01912761056', 'elevant change in my accounts', 'nasrinsiddika518@gmail.com', 'elevant change in my accountselevant change in my accounts', 0, 1, 1, NULL, '2020-06-08 14:37:41', '2020-06-10 11:43:47'),
(6, 2, 1, '127.0.0.1', 'Mr Customer', '01912761001', 'Holding no 32, Road no 06', 'customer@fixdesignbd.com', 'fhfh', 0, 0, 0, NULL, '2020-06-09 00:42:03', '2020-06-09 00:42:03'),
(7, 2, 1, '127.0.0.1', 'Mr Customer', '01912761001', 'Holding no 32, Road no 06', 'customer@fixdesignbd.com', NULL, 0, 0, 0, NULL, '2020-06-09 00:42:25', '2020-06-09 00:42:25'),
(9, 2, 1, '127.0.0.1', 'Mr Customer', '01912761001', 'Holding no 32, Road no 06', 'customer@fixdesignbd.com', NULL, 1, 0, 0, NULL, '2020-06-10 07:00:08', '2020-06-10 12:17:17'),
(10, 2, 1, '127.0.0.1', 'Mr Customer', '01912761001', 'Holding no 32, Road no 06', 'customer@fixdesignbd.com', NULL, 0, 0, 0, NULL, '2020-06-10 07:00:46', '2020-06-10 07:00:46'),
(11, 2, 1, '127.0.0.1', 'Mr Customer', '01912761001', 'Holding no 32, Road no 06', 'customer@fixdesignbd.com', NULL, 0, 1, 1, NULL, '2020-06-10 07:03:26', '2020-06-12 09:06:54'),
(12, 18, 2, '127.0.0.1', 'Nasrin Sddiika', '01912761056', 'ThemesGround, 789 Main rd, Anytown, CA 12345 USA', 'nasrinsiddika518@gmail.com', NULL, 0, 0, 0, 'SAHGA545BHJB', '2020-06-13 01:14:01', '2020-06-13 01:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('roybishwajit06@gmail.com', '$2y$10$AqGVmX4ZY3XsFt8Cdf0CWeXJ58UGOAzjZBE4GKGm7RigOXCzik.8O', '2020-05-09 14:46:22'),
('rojinaakter80@gmail.com', '$2y$10$R1u2Uc/6O1NaL3IFMPY/dul1KxSRl6m1p9YNChzbMeviU67IZBqFu', '2020-05-09 14:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '1',
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment no',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Agent | Personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash in Delivery', 'Cash_in.jpg', 1, 'cash_in', NULL, NULL, '2020-06-06 18:02:50', '2020-06-06 18:02:50'),
(2, 'bKash', 'bkash.jpg', 2, 'bkash', '01911087057', 'Personal', '2020-06-06 18:04:08', '2020-06-06 18:04:08'),
(3, 'Rocket', 'rocket.jpg', 3, 'rocket', '01911087057', 'Agent', '2020-06-06 18:04:54', '2020-06-06 18:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` decimal(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `offer_price` int(11) DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Lorem ipsum dolor s', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis', 'lorem-ipsum-dolor-s', 10, '200.00', 0, NULL, 1, '2020-05-10 11:33:06', '2020-05-10 11:33:06'),
(2, 4, 1, 'assa consequat males', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis aliquam ipsum, vel tincidunt nisi fermentum nec. Maecenas pharetra mauris sit amet porta dictum. Duis interdum consequat mi, eu ultricies urn', 'assa-consequat-males', 20, '500.00', 0, NULL, 1, '2020-05-10 11:33:47', '2020-05-10 11:33:47'),
(3, 6, 1, 'adipiscing elit. Vestibulum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis aliquam ipsum, vel tincidunt nisi fermentum nec. Maecenas pharetra mauris sit amet porta dictum. Duis interdum consequat mi, eu ultricies urn', 'adipiscing-elit-vestibulum', 15, '2000.00', 0, NULL, 1, '2020-05-10 11:34:27', '2020-05-10 11:34:27'),
(4, 5, 1, 'Floral Man Buttoned', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis aliquam ipsum, vel tincidunt nisi fermentum nec. Maecenas pharetra mauris sit amet porta dictum. Duis interdum consequat mi, eu ultricies urn', 'floral-man-buttoned', 25, '300.00', 0, NULL, 1, '2020-05-10 11:35:22', '2020-05-10 11:35:22'),
(5, 8, 1, 'massa consequat malesu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis aliquam ipsum, vel tincidunt nisi fermentum nec. Maecenas pharetra mauris sit amet porta dictum. Duis interdum consequat mi, eu ultricies urn', 'massa-consequat-malesu', 25, '300.00', 0, NULL, 1, '2020-05-10 11:36:07', '2020-05-10 11:36:07'),
(6, 8, 1, 'amet porta dictum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue, libero sit amet molestie suscipit, lectus neque finibus nisi, sed accumsan quam leo ac mi. Sed nec justo in massa consequat malesuada. Morbi egestas malesuada vehicula. Aenean non lacus sapien. Proin lobortis aliquam ipsum, vel tincidunt nisi fermentum nec. Maecenas pharetra mauris sit amet porta dictum. Duis interdum consequat mi, eu ultricies urn', 'amet-porta-dictum', 200, '15000.00', 0, NULL, 1, '2020-05-10 11:36:35', '2020-05-10 11:36:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'lorem-ipsum-dolor-s-2020-05-10-5eb83ad2a945a.jpg', '2020-05-10 11:33:06', '2020-05-10 11:33:06'),
(2, 2, 'assa-consequat-males-2020-05-10-5eb83afb44de1.jpg', '2020-05-10 11:33:47', '2020-05-10 11:33:47'),
(3, 3, 'adipiscing-elit-vestibulum-2020-05-10-5eb83b23b8279.jpg', '2020-05-10 11:34:27', '2020-05-10 11:34:27'),
(4, 4, 'floral-man-buttoned-2020-05-10-5eb83b5a0d2c5.jpg', '2020-05-10 11:35:22', '2020-05-10 11:35:22'),
(5, 5, 'massa-consequat-malesu-2020-05-10-5eb83b87e3463.jpg', '2020-05-10 11:36:08', '2020-05-10 11:36:08'),
(6, 6, 'amet-porta-dictum-2020-05-10-5eb83ba3d2ab0.jpg', '2020-05-10 11:36:36', '2020-05-10 11:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Customer', 'customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` int(10) UNSIGNED NOT NULL DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 'example@gmail.com', '01911087057', 'Khulna 9100, Khulna', 100, '2020-06-06 17:02:23', '2020-06-06 17:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `sub_title`, `description`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'New Collection', 'new-collection-2020-06-11-5ee26dc9d3670.jpg', 'New Trend', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. update', 'Shop Now', 'http://127.0.0.1:8000/shop', 2, '2020-06-11 11:45:45', '2020-06-11 14:27:53'),
(2, 'Women Fasion', 'women-fasion-2020-06-11-5ee271c950123.jpg', 'Spring 2020', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', 'Shop Now', 'http://127.0.0.1:8000/shop', 3, '2020-06-11 12:02:49', '2020-06-11 14:28:01'),
(4, '50 % Discount', '50-discount-2020-06-11-5ee2961399a19.jpg', 'Bumper Offer', 'Composer package for its message implementation of', 'Shop Now', 'http://127.0.0.1:8000/shop', 1, '2020-06-11 14:03:15', '2020-06-11 14:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2' COMMENT '0=Inactive | 1=Admin | 2=Customer',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` int(10) UNSIGNED NOT NULL COMMENT 'Division Table ID',
  `district` int(10) UNSIGNED NOT NULL COMMENT 'District Table ID',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=Inactive | 1=Active | 2=Ban',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `about` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `username`, `email`, `phone`, `email_verified_at`, `password`, `street_address`, `division`, `district`, `status`, `image`, `ip_address`, `shipping_address`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mr', 'Admin', 'admin', 'admin@fixdesignbd.com', '01911087057', NULL, '$2y$10$4/qzM0Lj26T3M.iCW1vflO6w3BTkBdd5nw5vbLSfS4nZjQVchuAv2', '140/10 Nirala R?A', 1, 5, 1, 'default.png', NULL, 'Holding no 23, Road no 100 Khulna', NULL, NULL, NULL, NULL),
(2, 2, 'Mr', 'Customer', 'customer', 'customer@fixdesignbd.com', '01912761001', NULL, '$2y$10$yjMCkjztLqoPiULyPo3N6ec/nWOjVLn0R0mwAGl58c1C2QFB4rp2G', '140/10 Nirala R?A', 2, 3, 1, 'default.png', NULL, 'Holding no 32, Road no 06', NULL, NULL, NULL, NULL),
(4, 2, 'Sudhin', 'Biswas', 'sudhinbishwas', 'sudhinbishwas@gmail.com', '01912883592', NULL, '$2y$10$XFLi065FBjxFNuDjOeWZaeIEL/Yqo6F06jXR8i90BOEkXINufnVIC', '125/20 kaligonj R/a', 4, 3, 1, 'default.png', '127.0.0.1', NULL, NULL, NULL, '2020-05-09 11:23:00', '2020-05-09 11:23:00'),
(17, 2, 'Rozina', 'Akhtar', 'rojinaakter80', 'rojinaakter80@gmail.com', '01912761002', NULL, '$2y$10$W0ve40M.4gZjMnEI50g8MuW.Tl.EspoxDlZVfQTL7tA6hB402woYy', 'fsf', 1, 2, 1, 'default.png', '127.0.0.1', NULL, NULL, NULL, '2020-05-10 06:04:41', '2020-05-10 06:07:02'),
(18, 2, 'Nasrin', 'Sddiika', 'nasrinsddiika', 'nasrinsiddika518@gmail.com', '01912761056', NULL, '$2y$10$KP0cVINlReFBkJpTbyJd5ugOpr3LAwYuPalcr5h50UKFbToXPYRVy', 'Holding no 32, Road no 06', 3, 6, 1, 'default.png', '127.0.0.1', NULL, 'Fix Design BD a leading website development company provides custom website design, Graphic Design and Social Media Marketing services', NULL, '2020-06-08 14:32:10', '2020-06-08 14:34:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featureds`
--
ALTER TABLE `featureds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featureds`
--
ALTER TABLE `featureds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
