-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2017 at 03:33 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `support`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `user_id`, `zone_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sonargaon Janapoth', 1, 1, '2017-03-31 08:33:31', '2017-04-08 07:14:31', '2017-04-08 07:14:31'),
(3, '11 sector', 1, 1, '2017-04-08 06:46:33', '2017-04-08 06:46:33', NULL),
(4, 'jp branch', 4, 3, '2017-04-08 07:19:31', '2017-04-08 08:59:51', NULL),
(5, 'comilla branch', 4, 4, '2017-04-08 07:19:31', '2017-04-08 08:59:51', NULL),
(6, 'chitagongbranch', 4, 5, '2017-04-15 06:14:50', '2017-04-15 06:14:50', NULL);

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
(1, '2017_02_19_121803_create_regions_table', 1),
(2, '2017_02_19_122010_create_zones_table', 1),
(3, '2017_02_19_122159_create_branches_table', 1),
(4, '2017_02_19_122260_create_users_table', 1),
(5, '2017_02_19_122261_create_password_resets_table', 1),
(6, '2017_02_26_114216_create_status_table', 1),
(7, '2017_02_27_100816_add_column_to_regions_table', 1),
(8, '2017_02_27_101622_add_column_to_zones_table', 1),
(9, '2017_02_27_101839_add_column_to_branches_table', 1),
(10, '2017_03_07_123020_create_requests_table', 1),
(11, '2017_03_22_073354_add_column_to_requests_table', 1),
(12, '2017_03_27_152526_again_add_column_to_requests_table', 1),
(13, '2017_03_29_114351_make_user_profile_table', 1),
(14, '2017_03_29_184643_create_super_admin_table', 1),
(15, '2017_06_14_123701_add_colums_to_users_table', 2);

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
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dhaka', 1, '2017-03-31 08:33:31', '2017-03-31 08:33:31', NULL),
(2, 'Comilla', 1, '2017-03-31 08:34:32', '2017-03-31 08:34:32', NULL),
(3, 'Rajshahi', 1, '2017-03-31 08:34:52', '2017-03-31 08:34:52', NULL),
(4, 'Barishal', 1, '2017-03-31 08:35:05', '2017-03-31 08:35:05', NULL),
(5, 'Bogra', 1, '2017-03-31 08:37:23', '2017-03-31 08:37:23', NULL),
(6, 'Chitagonj', 1, '2017-03-31 08:41:39', '2017-03-31 08:41:39', NULL),
(7, 'Chitagonj', 1, '2017-06-21 07:32:24', '2017-06-21 07:35:45', '2017-06-21 07:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documentt` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem_member_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem_member_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem_samity_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem_date` timestamp NULL DEFAULT NULL,
  `problem_amount` decimal(12,2) DEFAULT NULL,
  `problem_details` varchar(750) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_member_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_member_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_samity_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_amount` decimal(12,2) DEFAULT NULL,
  `right_details` varchar(750) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(10) UNSIGNED DEFAULT NULL,
  `seen_by_id` int(10) UNSIGNED DEFAULT NULL,
  `assign_by_id` int(10) UNSIGNED DEFAULT NULL,
  `assign_given_by_id` int(10) UNSIGNED DEFAULT NULL,
  `assign_by_seen` tinyint(1) DEFAULT NULL,
  `accomplished_by_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `contact_name`, `branchcode`, `branch_name`, `contact_number`, `problem_type`, `documentt`, `module_type`, `problem_name`, `problem_member_name`, `problem_member_id`, `problem_samity_code`, `problem_date`, `problem_amount`, `problem_details`, `voucher_code`, `right_member_name`, `right_member_id`, `right_samity_code`, `right_amount`, `right_details`, `status_id`, `seen_by_id`, `assign_by_id`, `assign_given_by_id`, `assign_by_seen`, `accomplished_by_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'withoutImage', 'withoutImage', 'jp branch', 'withoutImage', 'MIS', NULL, NULL, 'withoutImagewithoutImage', 'withoutImage', 'withoutImage', 'withoutImage', '2017-06-21 07:00:00', '99.00', 'withoutImagewithoutImagewithoutImage', NULL, 'withoutImagewithoutImage', 'withoutImage', 'withoutImage', '99.00', 'withoutImagewithoutImagewithoutImage', 2, 4, NULL, NULL, NULL, NULL, 30, '2017-06-21 22:03:40', '2017-07-12 09:42:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_details`
--

CREATE TABLE `request_details` (
  `id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Open', 1, '2017-03-31 08:33:31', '2017-03-31 08:33:31', NULL),
(2, 'Pending', 1, '2017-03-31 08:33:31', '2017-03-31 08:33:31', NULL),
(3, 'Cancel', 1, '2017-03-31 08:33:31', '2017-03-31 08:33:31', NULL),
(4, 'Complete', 1, '2017-03-31 08:33:32', '2017-03-31 08:33:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `super`
--

CREATE TABLE `super` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super`
--

INSERT INTO `super` (`id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2017-03-31 08:33:32', '2017-03-31 08:33:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
  `branch_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `officeaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `address`, `role`, `status`, `branch_id`, `branch_name`, `user_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `department`, `designation`, `pin`, `office`, `officeaddress`) VALUES
(1, 'adminTest', 'admin@email.com', '$2y$10$7TCe7.TH32YiaPAx2O/WreFp3cXu3G5sTccO6C2TZO94aO8GQMuOm', NULL, NULL, 'admin', 'Active', 1, '', 4, 'NI0BJ3OYki8peWLLSuTEF1ltbWbn1JSjvbXlbm5B25VZ7v8z0Ja7CrY1BYmd', '2017-03-31 08:33:30', '2017-04-03 09:47:27', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'SuperAdmin', 'tushar@email.com', '$2y$10$I4peXoP3/B3.n86Aht.gnOYaWiuGR4ANv4X5eFuIAW6eqGdCL0g3y', '123456789', NULL, 'superadmin', 'Active', NULL, '', 4, 'ewpfhn3DdTo3ejWFxW5TzPZZGa7AKBZx9ADfA4mtB21J9Gp3BqUpsbSw22jm', '2017-04-01 12:06:13', '2017-04-01 12:06:13', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Sayed', 's@a.com', '$2y$10$bN1/Hj1bW3x8J/BvueCfA.CeEil7nfLEeCqyZz19LO9TIURrwDQa6', '123', 'dzrftg', 'admin', 'Active', 5, '', 4, 'gkfSnUNQLBCdKUmVZibyIOvP7g4mOvcsDwE1qCbaIjc0gKsiFM511pJi0cO0', '2017-04-15 18:01:59', '2017-04-15 18:01:59', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'tushar', 'tsr@gmail.com', '$2y$10$/dC5xU9kR0QnAQCeOBo8q.inmuCC8QM2l7XPHPwGRiZbd.GQIGtMO', '1234566778', 'dhaka bd', 'admin', 'Active', 4, '', 4, '$2y$10$yjP/uUGAwbLHpzXrJk46jun6BZG886GwmplGJubAA6VGbAecEHU1y', '2017-06-14 07:05:57', '2017-06-14 07:26:04', NULL, 'software', 'software eng', 'wp12345', 'Head Office', 'fsdgdhgn hgfhjngh fgjhnjhg fhnjgnmgh'),
(27, 'partho', 'p@email.com', '$2y$10$rM0KDbbiU/W2ptRpe9ZbZOEoGzdwFHu8vDM6qtLHyMSPj5y58ZMNq', '32424234', 'dfdfsdf', 'user', 'Active', 4, '{"3":"11 sector","4":"jp branch","5":"comilla branch","6":"chitagongbranch"}', 1, '$2y$10$G3iZcmj5OI8m3SH3QAZ0p.NH70AqUE/mDcmonnU8udu8e5Qy8crxi', '2017-06-18 21:38:37', '2017-06-19 11:52:29', '2017-06-19 11:52:29', 'zsffdfsdfsdf', 'programmer', '12345678', 'Branch Office', 'dzfxcvc'),
(28, 'text', 'text@email.com', '$2y$10$SlxjxAbPAX1sLoMmim3lzOFKRknOH7rsjcm9gdvq9Z7qV5JMouDvq', '3221344324', 'dfsdfsdfsdf', 'user', 'Active', 4, '4', 1, '$2y$10$YtZJ59EUeFLcH9FfjKEPzupfexZ0aXEQ7n6xQ4zP8x4VuLnM9eeye', '2017-06-19 11:00:35', '2017-06-19 11:52:26', '2017-06-19 11:52:26', 'dfsdfsdfsd', 'dfgfddf', '2313123', 'Branch Office', 'dfxcvcxvcx'),
(29, 'zxvxcv', 'w@email.com', '$2y$10$wvplSX9ayzUFIyEZsW5Y3eS/GW7D8z0NBddXGpNoGa.qqU28clJU6', '43214134', 'xvbxvc', 'user', 'Active', 4, '["11 sector","jp branch","comilla branch","chitagongbranch"]', 1, '$2y$10$CZlGr0ps1nOJ3uv0R026JuFxThUEcgX4yzpFMCS8g2TSXly/T7snm', '2017-06-19 11:45:35', '2017-06-19 11:52:21', '2017-06-19 11:52:21', 'cxvxcvxcv', 'xcvxcvcxv', '1234', 'Branch Office', 'cvccxvcx'),
(30, 'sdfsdf', 'b@email.com', '$2y$10$xU7VPsD7pmRyCbPaAIjxsOSS8G/sg7mxsiOsN.G5YQnHKCZBsBOV6', '325235', 'fgfgfgfg', 'user', 'Deactive', 4, NULL, 1, 'Qv0myAxDiHEoWmCmOV2jmm1qqw6dj6hMCz5AWxBgvkx0xWixdXqCMp7kGKRG', '2017-06-21 10:55:06', '2017-07-12 09:49:22', '2017-07-12 09:49:22', 'sdfsdfdsf', 'dfsdfsdfds', '342234', 'Branch Office', 'dfsdfsdfsdf'),
(31, 'Tit', 'ti@email.com', '$2y$10$w.G9VEOJSBnuwT6Yqi3E9uSW5Newg88bkScqQegOgTgi7AO3jLm2K', '32542354', 'gfhgfhfghgf', 'user', 'Deactive', 5, NULL, 1, 'vLudAbenaqSPfYuvRf6iEkkDBKZMlGeJUwk4eQGF2dyvJTHFtJSPzgqoqDO2', '2017-07-01 06:09:36', '2017-07-12 09:49:27', '2017-07-12 09:49:27', 'treter', 'bcvgbf', '2134214', 'Head Office', 'fdsxgfdgdg'),
(35, 'partho kar', 'par@email.com', '$2y$10$DJp/hAdOkxliddVjz6VX8uvVYDskTwxPC39wPaLCtUZ2qbjcNkS6m', '342342', 'fdgdfgfdg', 'user', 'Deactive', 4, NULL, 1, 'gC2VxDNRUy9RKjXW9eGCs1IIOs1NpvNkaZBSQITZq8Ln57ny1Cby4YsoG94V', '2017-07-02 09:45:53', '2017-07-12 09:49:29', '2017-07-12 09:49:29', 'fdgdfgfd', 'fgdfgdfg', '342424', 'Branch Office', 'gdfgdfgfdg'),
(36, 'Partho kar titu', 'part@email.com', '$2y$10$p1MXHsHVKPxznAcpz1Grk.AXmZrMinAsk6Ucxa8cpvgNUVF2UU6f.', '35345', 'rtertert', 'admin', 'Active', 4, NULL, 4, 'yOtEni07w4R44nCzz2tbGpeLjVNJHppDAEfjaHHD2tRWZequB4ka1zoSkar3', '2017-07-09 05:35:40', '2017-07-09 05:35:40', NULL, 'tretret', 'rterter', '34234', 'Head Office', 'gfyhfhgfh'),
(37, 'test', 'test@email.com', '$2y$10$WoDHpif1Z9MaVLl0F8skd.ucja66oP9XovEs/K.u.QnzsYx03YtZa', '643634', 'dhdhh', 'user', 'Active', 4, NULL, 1, 'i5otMyczIhTMY5OstOjQEwU0GY2ZQJSk63KdVIpOvAOizp6tuZnh6xk6Tz6S', '2017-07-12 09:50:32', '2017-07-12 09:52:14', NULL, 'hgfhfg', 'hghgfh', '235235', 'Branch Office', 'fgdfgdfgdfg');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`, `user_id`, `region_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Uttara', 1, 3, '2017-03-31 08:33:31', '2017-04-08 08:44:47', NULL),
(2, 'kutbari', 4, 2, '2017-04-08 05:02:46', '2017-04-08 06:40:32', '2017-04-08 06:40:32'),
(3, 'jps zone', 1, 1, '2017-04-08 07:49:25', '2017-04-08 07:49:25', NULL),
(4, 'comilla zone', 4, 2, '2017-04-08 11:46:07', '2017-04-08 11:46:07', NULL),
(5, 'chitagonzone', 4, 6, '2017-04-15 06:14:27', '2017-04-15 06:14:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_zone_id_foreign` (`zone_id`),
  ADD KEY `branches_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regions_user_id_foreign` (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_status_id_foreign` (`status_id`),
  ADD KEY `requests_seen_by_id_foreign` (`seen_by_id`),
  ADD KEY `requests_assign_by_id_foreign` (`assign_by_id`),
  ADD KEY `requests_accomplished_by_id_foreign` (`accomplished_by_id`),
  ADD KEY `requests_user_id_foreign` (`user_id`),
  ADD KEY `requests_assign_given_by_id_foreign` (`assign_given_by_id`);

--
-- Indexes for table `request_details`
--
ALTER TABLE `request_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_user_id_foreign` (`user_id`);

--
-- Indexes for table `super`
--
ALTER TABLE `super`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_branch_id_foreign` (`branch_id`),
  ADD KEY `users_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zones_region_id_foreign` (`region_id`),
  ADD KEY `zones_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `request_details`
--
ALTER TABLE `request_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `branches_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`);

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_accomplished_by_id_foreign` FOREIGN KEY (`accomplished_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `requests_assign_by_id_foreign` FOREIGN KEY (`assign_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `requests_assign_given_by_id_foreign` FOREIGN KEY (`assign_given_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `requests_seen_by_id_foreign` FOREIGN KEY (`seen_by_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `requests_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `super`
--
ALTER TABLE `super`
  ADD CONSTRAINT `super_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `zones`
--
ALTER TABLE `zones`
  ADD CONSTRAINT `zones_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `zones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
