-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2021 at 11:03 AM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeland`
--

-- --------------------------------------------------------

--
-- Table structure for table `bolgates`
--

CREATE TABLE `bolgates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuel_capacity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bolgates`
--

INSERT INTO `bolgates` (`id`, `name`, `size`, `owner`, `phone`, `address`, `fuel_capacity`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Allahr Dan', 'High', 'MR ABC', '04930903975', 'Dhk', '4000 FT', 'djfldfldfjldj', '2021-03-29 13:16:54', '2021-03-29 21:35:23'),
(2, 'Darbare Habibia', '8000', 'Habibia', '01821660066', 'kkljkljklj', '450', 'Darbare Habibia', '2021-03-31 06:22:42', '2021-03-31 06:22:42'),
(3, 'Rashed Co.', '7000', 'Rashed', '01680139540', 'Patiya', '500', 'Rashed Co.', '2021-03-31 06:23:53', '2021-03-31 06:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_bank_account` text COLLATE utf8mb4_unicode_ci,
  `bank_account` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `company`, `address`, `mobile_bank_account`, `bank_account`, `created_at`, `updated_at`) VALUES
(1, 'Samrat Khan', '01680139540', 'Tritiyo Limited', NULL, NULL, NULL, '2021-03-30 11:56:54', '2021-03-30 11:56:54'),
(2, 'Nipun', '01677618199', 'nai', 'ght', 'Bkash 01677618199', 'Islami Bank', '2021-03-30 12:17:18', '2021-03-30 12:55:20'),
(3, 'Shifat Khan', '039203920302', 'Shifat Company', NULL, NULL, NULL, '2021-03-31 04:23:21', '2021-03-31 04:23:21'),
(4, 'Rayaat Khan', '20293023023', 'Rayaat Enterprise', NULL, NULL, NULL, '2021-03-31 04:26:34', '2021-03-31 04:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `description`, `is_group`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Accounts & Admin', 'Accounts & Admin', 'Top Management', 1, NULL, NULL),
(2, 'Admin & Support', 'Admin & Support', 'Top Management', 1, NULL, NULL),
(3, 'CFO', 'CFO', 'Top Management', 1, NULL, NULL),
(4, 'CTO', 'CTO', 'Top Management', 1, NULL, NULL),
(5, 'CEO', 'CEO', 'Top Management', 1, NULL, NULL),
(6, 'HR & Admin', 'HR & Admin', 'Top Management', 1, NULL, NULL),
(7, 'BDM', 'BDM', 'Top Management', 1, NULL, NULL),
(8, 'Chef', 'Chef', 'Support Team', 1, NULL, NULL),
(9, 'Driver', 'Driver', 'Support Team', 1, NULL, NULL),
(10, 'Office Assistance', 'Office Assistance', 'Support Team', 1, NULL, NULL),
(11, 'Security Guard', 'Security Guard', 'Support Team', 1, NULL, NULL),
(12, 'Resort Boy', 'Resort Boy', 'Tourism Team', 1, NULL, NULL),
(13, 'Resort Manager', 'Resort Manager', 'Tourism Team', 1, NULL, NULL),
(14, 'Executive Tourism', 'Executive Tourism', 'Tourism Team', 1, NULL, NULL),
(15, 'Engineer', 'Engineer', 'Technical Team', 1, NULL, NULL),
(16, 'Executive Sourcing', 'Executive Sourcing', 'Technical Team', 1, NULL, NULL),
(17, 'Jr Engineer', 'Jr Engineer', 'Technical Team', 1, NULL, NULL),
(18, 'Project Admin', 'Project Admin', 'Technical Team', 1, NULL, NULL),
(19, 'Project Manager', 'Project Manager', 'Technical Team', 1, NULL, NULL),
(20, 'Sr System Engineer', 'Sr System Engineer', 'Technical Team', 1, NULL, NULL),
(21, 'Sr Technician', 'Sr Technician', 'Technical Team', 1, NULL, NULL),
(22, 'Splicing Executive', 'Splicing Executive', 'Technical Team', 1, NULL, NULL),
(23, 'Sr Implementation Manager', 'Sr Implementation Manager', 'Technical Team', 1, NULL, NULL),
(24, 'System Engineer', 'System Engineer', 'Technical Team', 1, NULL, NULL),
(25, 'Team Leader', 'Team Leader', 'Technical Team', 1, NULL, NULL),
(26, 'Technical Manager', 'Technical Manager', 'Technical Team', 1, NULL, NULL),
(27, 'Technician', 'Technician', 'Technical Team', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ledger_id` int(11) NOT NULL,
  `transaction_with_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_with` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `ledger_id`, `transaction_with_type`, `transaction_with`, `reference`, `amount`, `payment_type`, `date`, `note`, `created_at`, `updated_at`) VALUES
(1, 2, 'bolgate', '1', '04930903975', NULL, 'bkash', NULL, NULL, '2021-03-29 21:47:14', '2021-03-29 21:47:14'),
(2, 2, 'bolgate', '1', '04930903975', NULL, 'bkash', NULL, NULL, '2021-03-29 21:51:15', '2021-03-29 21:51:15'),
(3, 2, 'bolgate', '1', '04930903975', NULL, 'bkash', NULL, NULL, '2021-03-29 21:52:06', '2021-03-29 21:52:06'),
(5, 2, 'staff', '22', '+8801844217302', NULL, 'bkash', NULL, NULL, '2021-03-29 21:53:31', '2021-03-29 21:53:31'),
(6, 2, 'bolgate', '1', '04930903975', NULL, 'bank', NULL, NULL, '2021-03-29 21:54:19', '2021-03-29 21:54:19'),
(7, 2, 'staff', '1', '01680139540', NULL, 'bkash', NULL, NULL, '2021-03-29 22:30:56', '2021-03-29 22:30:56'),
(8, 2, 'other', 'invoice', '673782322', NULL, 'bank', NULL, NULL, '2021-03-29 22:31:26', '2021-03-29 23:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ledger_id` int(11) NOT NULL,
  `transaction_with_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_with` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `per_unit_amount` double(8,2) DEFAULT NULL,
  `qty` double(8,2) DEFAULT NULL,
  `actual_amount` double(8,2) DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `truck_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `date`, `ledger_id`, `transaction_with_type`, `transaction_with`, `per_unit_amount`, `qty`, `actual_amount`, `discount`, `amount`, `payment_type`, `truck_number`, `token_number`, `note`, `created_at`, `updated_at`) VALUES
(5, '2021-03-30', 7, 'customer', '2', 6.00, 500.00, 3000.00, '100.00', 2900.00, 'bkash', '323', '5454545', NULL, '2021-03-30 12:29:32', '2021-03-30 12:29:55'),
(6, '2021-03-31', 7, 'customer', '3', 5.00, 290.00, 1363.00, '100.00', 1263.00, 'bank', '303', '30303', NULL, '2021-03-31 04:23:21', '2021-03-31 04:23:21'),
(7, '2021-03-31', 5, 'customer', '3', 5.00, 251.00, 1280.10, '10.00', 1270.00, 'cash', '303', '30303', NULL, '2021-03-31 04:24:19', '2021-03-31 04:24:19'),
(8, '2021-03-31', 7, 'customer', '2', 4.00, 310.00, 1116.00, '0.00', 1116.00, 'cash', '401', '401401', NULL, '2021-03-31 04:25:24', '2021-03-31 04:25:24'),
(9, '2021-03-31', 5, 'customer', '4', 5.00, 300.00, 1350.00, '0.00', 1350.00, 'bkash', '302', '302302', NULL, '2021-03-31 04:26:34', '2021-03-31 04:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `name`, `description`, `type`, `created_at`, `updated_at`) VALUES
(2, 'Electricity Bill', 'Electriv mfnkf', 'pay', '2021-03-29 21:51:01', '2021-03-29 21:51:01'),
(3, 'Salary', 'Salary', 'pay', '2021-03-30 06:36:33', '2021-03-30 06:36:33'),
(4, 'Electric Equipment', 'Electric Equipment', 'pay', '2021-03-30 06:37:14', '2021-03-30 06:37:14'),
(5, 'Red Sand Sale', 'Red Sand Sale', 'receive', '2021-03-30 06:37:32', '2021-03-30 11:00:15'),
(6, 'Scrape Equipment Sale', 'Scrape Equiment', 'receive', '2021-03-30 06:38:03', '2021-03-30 06:38:03'),
(7, 'Black Sand Sale', 'Black Sand Sale', 'receive', '2021-03-30 11:00:41', '2021-03-30 11:00:41');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(6, '2020_12_15_224823_create_routelists_table', 2),
(8, '2021_01_13_163214_create_designations_table', 3),
(9, '2021_01_13_210550_create_settings_table', 4),
(15, '2021_01_20_202935_create_roles_table', 7),
(17, '2021_01_21_184827_create_permissions_table', 8),
(23, '2021_02_22_195401_create_bolegates_table', 9),
(24, '2021_02_22_195401_create_bolgates_table', 10),
(26, '2021_02_22_195401_create_ledgers_table', 11),
(27, '2021_02_22_195401_create_expenses_table', 12),
(30, '2021_02_22_195401_create_customers_table', 13),
(31, '2021_02_22_195401_create_incomes_table', 14),
(32, '2021_02_22_195401_create_purchases_table', 15);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `checked` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `route_id`, `user_id`, `checked`, `created_at`, `updated_at`) VALUES
(5, 1, 3, 'off', '2021-01-21 13:41:59', '2021-01-21 14:52:50'),
(6, 4, 3, 'off', '2021-01-21 13:41:59', '2021-01-21 14:50:55'),
(7, 5, 3, 'off', '2021-01-21 13:41:59', '2021-01-21 14:50:55'),
(8, 6, 3, 'off', '2021-01-21 13:42:19', '2021-01-21 14:50:55'),
(9, 11, 3, 'off', '2021-01-21 13:44:17', '2021-01-21 14:50:55'),
(10, 10, 3, 'off', '2021-01-21 14:00:31', '2021-01-21 14:50:55'),
(11, 20, 3, 'on', '2021-01-21 14:59:48', '2021-01-21 14:59:48'),
(12, 20, 2, 'on', '2021-01-21 15:00:01', '2021-01-21 15:00:01'),
(13, 1, 1, 'on', '2021-01-21 15:00:51', '2021-01-21 15:00:51'),
(14, 4, 1, 'on', '2021-01-21 15:00:51', '2021-01-21 15:00:51'),
(15, 5, 1, 'on', '2021-01-21 15:00:51', '2021-01-21 15:00:51'),
(16, 6, 1, 'on', '2021-01-21 15:00:51', '2021-01-21 15:00:51'),
(17, 7, 1, 'on', '2021-01-21 15:00:51', '2021-01-21 15:00:51'),
(18, 8, 1, 'on', '2021-01-21 15:00:52', '2021-01-21 15:00:52'),
(19, 9, 1, 'on', '2021-01-21 15:00:52', '2021-01-21 15:00:52'),
(20, 10, 1, 'on', '2021-01-21 15:00:52', '2021-01-21 15:00:52'),
(21, 11, 1, 'on', '2021-01-21 15:00:52', '2021-01-21 15:00:52'),
(22, 12, 1, 'on', '2021-01-21 15:00:52', '2021-01-21 15:00:52'),
(23, 13, 1, 'on', '2021-01-21 15:00:52', '2021-01-21 15:00:52'),
(24, 14, 1, 'on', '2021-01-21 15:00:52', '2021-01-21 15:00:52'),
(25, 15, 1, 'on', '2021-01-21 15:00:52', '2021-01-21 15:00:52'),
(26, 16, 1, 'on', '2021-01-21 15:00:52', '2021-01-21 15:00:52'),
(27, 19, 13, 'on', '2021-01-21 19:16:41', '2021-01-21 19:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sand_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bolgate_id` int(11) DEFAULT NULL,
  `per_unit_amount` double(8,2) DEFAULT NULL,
  `loading_cost` double(8,2) DEFAULT NULL,
  `bolgate_cost` double(8,2) DEFAULT NULL,
  `unloading_cost` double(8,2) DEFAULT NULL,
  `actual_amount` double(8,2) DEFAULT NULL,
  `qty` double(8,2) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `target_sale_amount` double(8,2) DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `date`, `sand_type`, `bolgate_id`, `per_unit_amount`, `loading_cost`, `bolgate_cost`, `unloading_cost`, `actual_amount`, `qty`, `amount`, `target_sale_amount`, `note`, `created_at`, `updated_at`) VALUES
(1, '2021-03-31', 'red', 1, 1.00, 0.60, 1.60, 0.80, 4.00, 5000.00, 20000.00, NULL, NULL, '2021-03-31 05:59:26', '2021-03-31 05:59:26'),
(2, '2021-03-31', 'black', 1, 1.00, 0.80, 1.50, 1.00, 4.30, 4700.00, 20210.00, NULL, NULL, '2021-03-31 06:21:50', '2021-03-31 06:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Administrator', 1, NULL, NULL),
(2, 'Resource', 'All employees will stored under this role', 1, NULL, NULL),
(3, 'Project Manager', 'Project Manager', 1, NULL, NULL),
(4, 'CFO', 'Chief Financial Officer', 1, NULL, NULL),
(5, 'Accountant', 'Accountant', 1, NULL, NULL),
(6, 'Member', 'Member', 1, NULL, NULL),
(7, 'Human Resource', 'Human Resource', 1, NULL, NULL),
(8, 'Approval', 'Approval', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `routelists`
--

CREATE TABLE `routelists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_note` text COLLATE utf8mb4_unicode_ci,
  `route_grouping` int(11) DEFAULT NULL,
  `to_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_menu_id` int(11) DEFAULT NULL,
  `show_menu` tinyint(1) DEFAULT NULL,
  `skip_sub` tinyint(1) DEFAULT NULL,
  `dashboard_menu` tinyint(1) DEFAULT NULL,
  `font_awesome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulma_class_icon_bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routelists`
--

INSERT INTO `routelists` (`id`, `route_name`, `route_url`, `route_hash`, `route_description`, `route_note`, `route_grouping`, `to_role`, `parent_menu_id`, `show_menu`, `skip_sub`, `dashboard_menu`, `font_awesome`, `bulma_class_icon_bg`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Users', 'users.index', '$2y$10$dfyk0z6c6LMhMEmpZ5fgf.rbmYhtD/zFJI0ySlp3BgOQrKj1w5YKG', 'All users will show on this page.', 'users', NULL, '1,7', NULL, 1, NULL, 1, 'fas fa-users', 'is-success', 1, '2021-01-13 11:34:50', '2021-01-24 12:56:26'),
(7, 'Route Lists', 'routelists.index', '$2y$10$TUtF7tgc8uUQvEuXXQLhKuzkEyMQ4GNvUfR3rHDESv.gLLIBoGg4O', 'Routelists', 'Routelists', NULL, '1', NULL, 1, 1, 1, 'fas fa-link', 'is-warning', 1, '2021-01-22 17:59:59', '2021-01-27 20:12:24'),
(8, 'Ledger', 'ledgers.index', '$2y$10$iHt72/K6KRaHdX6kp90lT.2GZMekr52uD/oFdjC76CTXJQ7kFoNsy', 'All ledgers will show on this page.', 'All ledgers will show on this page.', NULL, '1', NULL, 1, NULL, 1, 'fas fa-book', 'has-background-warning-dark', 1, '2021-03-29 11:30:09', '2021-03-31 06:37:06'),
(9, 'Bolgate', 'bolgates.index', '$2y$10$F15kiOMvfx8Q0dFvW9GwhOhGULKI7Sr/ymLvi6SCtBrRGzQadz2DS', 'All bolgates will show on this page.', 'All bolgates will show on this page.', NULL, '1', NULL, 1, NULL, 1, 'fas fa-ship', 'is-info', 1, '2021-03-29 11:31:16', '2021-03-30 06:22:10'),
(10, 'Expense', 'expenses.index', '$2y$10$.1NfEQ5yzjyTGmIlmofOLOt/39.xGwlC3oRUBia/CWtGMVLQNnU3S', 'Expenses', 'Expenses', NULL, '1', NULL, 1, 1, 1, 'fas fa-money-bill', 'is-primary', 1, '2021-03-30 06:30:11', '2021-03-30 06:35:21'),
(11, 'Income', 'incomes.index', '$2y$10$kwIrs7e64FBYHjE0TDnW5eAWifiH8Q9UcPAmi0Xy/vLzZVrLwupVu', 'Income', 'Income', NULL, '1', NULL, 1, 1, 1, 'fas fa-dollar-sign', 'is-danger', 1, '2021-03-30 06:58:00', '2021-03-30 06:58:00'),
(12, 'Customer', 'customers.index', '$2y$10$qTD949UP75mTbMAumNFqu.oHHZTBG/N4x1RgGKsmjomX5FCzhACRW', 'All customer here', 'All customer here', NULL, '1', NULL, 1, NULL, 1, 'fa fa-user', 'is-lightgreen', 1, '2021-03-30 13:58:59', '2021-03-30 13:58:59'),
(13, 'Purchase', 'purchases.index', '$2y$10$PQa.Xx1.WB6uu3FQSqQ3b.UFQvtl57YybjWT4nb1wNrSg0cB0ofju', 'purchase', 'purchase', NULL, '1', NULL, 1, 1, 1, 'fas fa-cart-plus', 'has-background-primary-dark', 1, '2021-03-31 06:26:02', '2021-03-31 06:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` json NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `settings`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Samrat Khan', '{\"address\": \"L-41, R # 8, South Banasree, Rampura, Dhaka\", \"company_name\": \"Tritiyo Limited\", \"company_email\": \"info@tritiyo.com\", \"company_phone\": \"01680139540\", \"company_slogan\": \"valid reason, dynamic solution\", \"company_website\": \"http://www.tritiyo.com\"}', 1, NULL, '2021-01-23 16:48:18'),
(2, 'Payment Settings', '{\"bill_end\": null, \"time_zone\": null, \"bill_start\": null, \"requisition_end\": null, \"bill_approval_end\": null, \"requisition_start\": null, \"bill_approval_start\": null, \"requisition_approval_end\": null, \"requisition_approval_start\": null}', 1, NULL, '2021-01-23 16:49:05'),
(3, 'Time Settings', '{\"bill_end\": \"5 pm\", \"time_zone\": \"Asia/Dhaka\", \"bill_start\": \"1 am\", \"requisition_end\": \"12 pm\", \"bill_approval_end\": \"5 pm\", \"requisition_start\": \"1 am\", \"bill_approval_start\": \"1 am\", \"requisition_approval_end\": \"12 pm\", \"requisition_approval_start\": \"1 am\"}', 1, NULL, '2021-01-13 16:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `company_address` mediumtext COLLATE utf8mb4_unicode_ci,
  `basic_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_information` text COLLATE utf8mb4_unicode_ci,
  `mbanking_information` text COLLATE utf8mb4_unicode_ci,
  `alternative_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_status` enum('Current','Terminate','Long Leave') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `employee_no`, `username`, `role`, `birthday`, `gender`, `marital_status`, `father`, `mother`, `address`, `district`, `postcode`, `phone`, `emergency_phone`, `company`, `designation`, `join_date`, `company_address`, `basic_salary`, `avatar`, `signature`, `bank_information`, `mbanking_information`, `alternative_email`, `employee_status`, `is_active`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Samrat Khan', 'info@tritiyo.com', '10001', 'u001', 1, '1987-12-10', 'Male', 'Married', 'Md Badruzzaman Khan', 'Shahinazzaman', 'Hajipur, Chonkhola, Ghatail, Tangail', 'Married', '1980', '01680139540', '01821660066', 'Tritiyo Limited', '1', '2013-01-01', 'Banasree', '40000', NULL, NULL, NULL, 'bKash: 01821660066,\r\nNagad: 01680139540', 'takeitkhan@gmail.com', 'Current', 0, NULL, '$2y$10$u4iDAoSbBmwJFFXKAzJ3tuzFMV9gS7ZScaTTGOHGc.w75yIuwOasO', NULL, NULL, NULL, '2020-12-15 16:18:26', '2021-01-20 15:42:38'),
(18, 'Zakia Akhter', 'accountant@tritiyo.com', '095', 'u095', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+8801844217303', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$Q8fPKjNB5/eozLbgn8lauecwGduXbtpm37lvhU47xg7fCtrDnZc6G', NULL, NULL, NULL, '2021-01-29 23:35:43', '2021-01-29 23:35:43'),
(19, 'Nazmul Hoque', 'manager@tritiyo.com', '103', 'u103', 3, '1987-10-12', 'Male', 'Married', 'NA', 'NA', 'NA', 'Married', 'NA', '+8801844217301', NULL, 'NA', '19', '2020-01-01', 'NA', '16500', NULL, NULL, NULL, NULL, 'NA@mtsbd.net', 'Current', 0, NULL, '$2y$10$8/fUue7VkW1sLfsFh.KcpOQpLiReJEPdm33SRpaRCKOIH9j6oMq56', NULL, NULL, NULL, '2021-01-29 23:36:33', '2021-01-29 23:54:27'),
(20, 'Abdul Ohab', 'resource@tritiyo.com', '231', 'u231', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+8801715179905', NULL, NULL, '15', NULL, NULL, NULL, NULL, NULL, NULL, 'bKash: 01821660066,\r\nNagad: 01680139540', NULL, NULL, 0, NULL, '$2y$10$fB67hDVPYTB/uC8L8TjmHejjslsQptPgQFlYh1aS0hwIzNtDUVSsm', NULL, NULL, NULL, '2021-01-29 23:37:50', '2021-01-29 23:37:50'),
(21, 'Anowarul Hoque', 'cfo@tritiyo.com', '002', 'u002', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+8801844217300', NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$J7/Nc/0XlEf03MaHuih/JepHdLXBmsUlppN7nloFJSAhHKNjLOU0e', NULL, NULL, NULL, '2021-01-29 23:38:17', '2021-01-29 23:38:17'),
(22, 'Tahrima Tarin', 'hr@tritiyo.com', '131', 'u131', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+8801844217302', NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$4BI7GR.ggbhtxm1iELh0Y.iHsE1C9O0Kbls0XWeqWYF2Oobnpem2e', NULL, NULL, NULL, '2021-01-29 23:40:13', '2021-01-29 23:40:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bolgates`
--
ALTER TABLE `bolgates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routelists`
--
ALTER TABLE `routelists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `route_url` (`route_url`),
  ADD UNIQUE KEY `route_hash` (`route_hash`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_employee_no_unique` (`employee_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bolgates`
--
ALTER TABLE `bolgates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `routelists`
--
ALTER TABLE `routelists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
