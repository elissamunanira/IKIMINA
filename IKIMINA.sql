-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2023 at 09:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IKIMINA`
--

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `budget_amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budgets`
--

INSERT INTO `budgets` (`id`, `budget_name`, `start_date`, `end_date`, `budget_amount`, `created_at`, `updated_at`) VALUES
(1, '2023-2024', '2023-07-01', '2024-06-30', 60000000000.00, '2023-05-18 09:40:56', '2023-05-19 08:48:04'),
(2, '2024-2025', '2024-07-01', '2025-06-30', 1000000000.00, '2023-05-19 07:14:00', '2023-05-19 07:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `budget_lines`
--

CREATE TABLE `budget_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_id` bigint(20) UNSIGNED NOT NULL,
  `budget_line_name` varchar(255) NOT NULL,
  `budget_line_description` varchar(255) NOT NULL,
  `budget_line_amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budget_lines`
--

INSERT INTO `budget_lines` (`id`, `budget_id`, `budget_line_name`, `budget_line_description`, `budget_line_amount`, `created_at`, `updated_at`) VALUES
(1, 2, 'communication', 'communication money', 200000.00, '2023-07-06 16:39:53', '2023-07-06 16:39:53'),
(3, 2, 'Transport', 'Transportation fees', 300000.00, '2023-07-06 17:08:05', '2023-07-06 17:08:05'),
(5, 2, 'coffee', 'money to buy coffee', 10000.00, '2023-07-06 17:10:48', '2023-07-06 17:10:48'),
(6, 2, 'food', 'money to buy food', 10000.00, '2023-07-06 17:12:05', '2023-07-06 17:12:05'),
(7, 1, 'Communications', 'communication money', 200000.00, '2023-07-06 17:23:02', '2023-07-06 17:23:02'),
(8, 1, 'Transport', 'Transportation fees', 100000.00, '2023-07-06 17:30:19', '2023-07-06 17:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_line_id` bigint(20) UNSIGNED NOT NULL,
  `expense_name` varchar(255) NOT NULL,
  `expense_description` varchar(255) NOT NULL,
  `expense_date` date NOT NULL,
  `expense_amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `budget_line_id`, `expense_name`, `expense_description`, `expense_date`, `expense_amount`, `created_at`, `updated_at`) VALUES
(1, 7, 'calling members', 'Money to  buy aitime for calling members to anounce them for meeting', '2023-03-01', 10000.00, '2023-07-06 17:28:38', '2023-07-06 17:28:38'),
(2, 7, 'calling committee', 'aitime to call the leaders of the IKIMINA', '2023-02-26', 5000.00, '2023-07-06 17:29:42', '2023-07-06 17:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_category` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `loan_amount` decimal(15,2) NOT NULL,
  `interest_amount` decimal(15,2) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `paid_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `status` enum('pending','approved','due','rejected','paid') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `loan_category`, `user_id`, `loan_amount`, `interest_amount`, `total_amount`, `paid_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Emmergency Loan', 1, 120000.00, 24000.00, 144000.00, 0.00, 'rejected', '2023-07-04 08:14:39', '2023-08-16 04:51:38'),
(2, 'Special Loan', 1, 25000.00, 2750.00, 27750.00, 0.00, 'approved', '2023-07-04 08:20:45', '2023-08-21 04:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `loan_categories`
--

CREATE TABLE `loan_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `principal` decimal(10,2) NOT NULL,
  `interest_rate` decimal(5,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_categories`
--

INSERT INTO `loan_categories` (`id`, `name`, `principal`, `interest_rate`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Special Loan', 200000.00, 11.00, 20, '2023-05-05 12:59:38', '2023-05-17 12:35:10'),
(2, 'Emmergency Loan', 200000.00, 20.00, 4, '2023-05-08 13:38:11', '2023-05-15 08:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `loan_loan_category`
--

CREATE TABLE `loan_loan_category` (
  `loan_category_id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_loan_category`
--

INSERT INTO `loan_loan_category` (`loan_category_id`, `loan_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_10_184422_create_permission_tables', 1),
(6, '2014_10_12_000000_create_users_table', 2),
(8, '2023_04_21_064903_create_savings_table', 3),
(11, '2023_05_05_112750_create_loan_categories_table', 4),
(12, '2023_05_05_124847_create_category_loan_table', 4),
(13, '2023_05_08_103529_create_loan_loan_category_table', 5),
(20, '2023_05_10_120010_create_penalties_table', 7),
(21, '2023_05_10_112419_create_rules_table', 8),
(27, '2023_05_16_092843_create_budgets_table', 12),
(29, '2023_04_21_141140_create_loans_table', 13),
(31, '2023_05_18_101436_create_budget_lines_table', 14),
(32, '2023_05_16_102945_create_expenses_table', 15),
(34, '2023_06_21_142433_create_mituelle_table', 16),
(35, '2023_08_16_193840_create_fines_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `mituelles`
--

CREATE TABLE `mituelles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mituelle_amount` decimal(15,2) NOT NULL,
  `mituelle_month` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mituelles`
--

INSERT INTO `mituelles` (`id`, `user_id`, `mituelle_amount`, `mituelle_month`, `created_at`, `updated_at`) VALUES
(1, 2, 30000.00, '2023-07-01', '2023-07-28 13:31:12', '2023-08-10 14:11:40'),
(2, 2, 5000.00, '2023-07-01', '2023-07-28 13:32:38', '2023-07-28 13:32:38'),
(3, 2, 5000.00, '2023-07-01', '2023-07-28 13:33:26', '2023-07-28 13:33:26'),
(4, 2, 20000.00, '2023-08-01', '2023-08-10 14:20:38', '2023-08-10 14:20:38'),
(5, 2, 2000.00, '2023-08-01', '2023-08-10 14:21:21', '2023-08-11 11:56:51'),
(6, 1, 45000.00, '2023-08-01', '2023-08-11 11:50:15', '2023-08-14 13:25:41'),
(7, 1, 40000.00, '2023-07-01', '2023-08-11 11:50:40', '2023-08-11 11:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penalties`
--

CREATE TABLE `penalties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rule_id` bigint(20) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penalties`
--

INSERT INTO `penalties` (`id`, `user_id`, `rule_id`, `description`, `paid`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'I just want to mean that you didn\'t attend the last meetings', 0, '2023-05-15 09:57:49', '2023-05-15 13:28:21'),
(2, 2, 2, 'You didn\'t pay the last monthly contribution', 0, '2023-05-17 06:31:52', '2023-07-28 13:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'users-list', 'web', '2023-04-17 07:23:36', '2023-04-17 07:23:36'),
(2, 'users-create', 'web', '2023-04-17 07:23:36', '2023-04-17 07:23:36'),
(3, 'users-edit', 'web', '2023-04-17 07:23:37', '2023-04-17 07:23:37'),
(4, 'users-delete', 'web', '2023-04-17 07:23:37', '2023-04-17 07:23:37'),
(5, 'role-list', 'web', '2023-04-17 07:23:37', '2023-04-17 07:23:37'),
(6, 'role-create', 'web', '2023-04-17 07:23:37', '2023-04-17 07:23:37'),
(7, 'role-edit', 'web', '2023-04-17 07:23:37', '2023-04-17 07:23:37'),
(8, 'role-delete', 'web', '2023-04-17 07:23:37', '2023-04-17 07:23:37'),
(9, 'loan-request', 'web', '2023-04-17 07:23:37', '2023-04-17 07:23:37'),
(10, 'loan-approval', 'web', '2023-04-17 07:23:38', '2023-04-17 07:23:38'),
(11, 'membership-approval', 'web', '2023-04-17 07:23:38', '2023-04-17 07:23:38'),
(12, 'savings-recording', 'web', '2023-04-17 07:23:38', '2023-04-17 07:23:38'),
(13, 'penalities-recording', 'web', '2023-04-17 07:23:38', '2023-04-17 07:23:38'),
(14, 'budget-record', 'web', '2023-04-17 07:23:38', '2023-04-17 07:23:38'),
(15, 'budget-approval', 'web', '2023-04-17 07:23:38', '2023-04-17 07:23:38'),
(16, 'expenses', 'web', '2023-04-17 07:23:38', '2023-04-17 07:23:38'),
(17, 'mituelle-recording', 'web', '2023-04-17 07:23:38', '2023-04-17 07:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-04-17 07:18:04', '2023-04-17 07:18:04'),
(2, 'Accountant', 'web', '2023-04-18 12:03:14', '2023-04-18 12:03:14'),
(3, 'Membership', 'web', '2023-04-22 07:59:51', '2023-04-22 07:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(11, 1),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `rule_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `name`, `description`, `rule_amount`, `created_at`, `updated_at`) VALUES
(1, 'Meeting', 'No one of the member is allowed to miss the meeting attend that has been scheduled on the right time.', 20000.00, '2023-05-15 09:54:42', '2023-05-17 06:26:08'),
(2, 'Contribution payment', 'No member is allowed to not pay for the contribution at a time', 1000.00, '2023-05-17 06:30:59', '2023-07-28 13:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `month` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `user_id`, `amount`, `month`, `created_at`, `updated_at`) VALUES
(1, 2, 20000.00, '2023-04-01', '2023-04-21 07:48:02', '2023-04-21 07:48:02'),
(2, 1, 30000.00, '2023-04-01', '2023-04-21 08:20:08', '2023-08-11 13:00:37'),
(3, 1, 40000.00, '2023-05-01', '2023-04-21 08:20:36', '2023-05-19 08:58:55'),
(4, 2, 20000.00, '2023-05-06', '2023-04-24 07:40:43', '2023-04-24 07:40:43'),
(5, 1, 40000.00, '2023-06-01', '2023-05-19 08:04:39', '2023-05-19 09:00:02'),
(6, 2, 40000.00, '2023-06-01', '2023-05-19 08:05:34', '2023-05-19 08:52:49'),
(7, 2, 30000.00, '2023-07-01', '2023-05-19 08:06:35', '2023-05-19 08:53:14'),
(8, 1, 30000.00, '2023-07-01', '2023-05-19 08:54:30', '2023-05-19 08:54:30'),
(9, 1, 30000.00, '2023-08-01', '2023-05-19 08:54:55', '2023-05-19 09:00:18'),
(10, 2, 25000.00, '2023-08-01', '2023-05-19 09:02:28', '2023-05-19 09:02:28'),
(11, 1, 30000.00, '2023-08-01', '2023-08-11 11:47:58', '2023-08-11 11:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `gender`, `telephone`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MUNANIRA', 'ELISSA', 'MALE', '+250788565520', 'munanira64@gmail.com', '1', NULL, '$2y$10$81XPOczcCP6vjbKAKe4Mm.W1qbyv4Tjqd/l8VsM61zn0oC/iHZDl.', NULL, '2023-04-21 05:09:40', '2023-04-21 13:24:15'),
(2, 'Simplisce', 'NIYONZIMA', 'MALE', '+250783325515', 'simplisce@gmail.com', '0', NULL, '$2y$10$qqlAc33Fcu1bmxrhJDEzreDutVdPy0dE4jwZd3HIeYrfpkNpLWE7u', NULL, '2023-04-21 05:52:31', '2023-07-04 07:14:24'),
(3, 'KIMENYI', 'honore', 'MALE', '+250783325515', 'honore.kimenyi@gmail.com', '1', NULL, '$2y$10$iSmNtLkBHKINz.1IZ742hOY9eDn7d.E.rJ/lyad3DBk5cWmAg.UTm', NULL, '2023-08-11 11:44:50', '2023-08-16 13:07:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget_lines`
--
ALTER TABLE `budget_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budget_lines_budget_id_foreign` (`budget_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_budget_line_id_foreign` (`budget_line_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fines_user_id_foreign` (`user_id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_user_id_foreign` (`user_id`);

--
-- Indexes for table `loan_categories`
--
ALTER TABLE `loan_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_loan_category`
--
ALTER TABLE `loan_loan_category`
  ADD PRIMARY KEY (`loan_category_id`,`loan_id`),
  ADD KEY `loan_loan_category_loan_id_foreign` (`loan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mituelles`
--
ALTER TABLE `mituelles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mituelles_user_id_foreign` (`user_id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penalties`
--
ALTER TABLE `penalties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penalties_user_id_foreign` (`user_id`),
  ADD KEY `penalties_rule_id_foreign` (`rule_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rules_name_unique` (`name`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `savings_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `budget_lines`
--
ALTER TABLE `budget_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_categories`
--
ALTER TABLE `loan_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mituelles`
--
ALTER TABLE `mituelles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penalties`
--
ALTER TABLE `penalties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budget_lines`
--
ALTER TABLE `budget_lines`
  ADD CONSTRAINT `budget_lines_budget_id_foreign` FOREIGN KEY (`budget_id`) REFERENCES `budgets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_budget_line_id_foreign` FOREIGN KEY (`budget_line_id`) REFERENCES `budget_lines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `loan_loan_category`
--
ALTER TABLE `loan_loan_category`
  ADD CONSTRAINT `loan_loan_category_loan_category_id_foreign` FOREIGN KEY (`loan_category_id`) REFERENCES `loan_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loan_loan_category_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mituelles`
--
ALTER TABLE `mituelles`
  ADD CONSTRAINT `mituelles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penalties`
--
ALTER TABLE `penalties`
  ADD CONSTRAINT `penalties_rule_id_foreign` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penalties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `savings`
--
ALTER TABLE `savings`
  ADD CONSTRAINT `savings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
