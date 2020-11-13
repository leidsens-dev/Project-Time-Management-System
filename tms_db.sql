-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 09:36 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `point_of_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `user_id`, `name`, `created_at`, `updated_at`, `phone_number`, `point_of_contact`, `email`) VALUES
(2, 1, 'Mr. Raven Dave', '2017-10-30 23:54:17', '2017-10-30 23:54:17', '1234567890', 'Hrik Ronn', 'arijitsamaddar21@gmail.com'),
(4, 1, 'Hrik Ronn', '2017-11-01 05:58:12', '2017-11-01 05:58:12', '8976451230', 'Krish cassidy', 'cc@bc.com');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hostname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `port` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `user_id`, `project_id`, `type`, `name`, `hostname`, `username`, `password`, `port`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 1, 'GCart', 'localhost', 'Hrik003', '3210563', 3306, '2017-11-02 07:29:15', '2017-11-02 07:29:15');

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `production` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dev` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `client_id`, `name`, `description`, `created_at`, `updated_at`, `production`, `stage`, `dev`, `github`) VALUES
(1, 1, 2, 'E-Cart Solutions', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2017-10-31 18:30:00', '0000-00-00 00:00:00', '', '', '', ''),
(3, 1, 2, 'Social Share', 'This is a social share platform.', '2017-11-08 01:46:03', '2017-11-08 01:46:03', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 3, 2, '2017-11-08 02:08:22', '2017-11-08 02:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `due_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `project_id`, `name`, `state`, `weight`, `created_at`, `updated_at`, `description`, `due_date`, `priority`) VALUES
(1, 1, 1, 'Home Page Design', 'finish', '4', '2017-11-01 05:01:30', '2017-11-08 03:44:44', 'completed', '24/12/2017', 'medium'),
(3, 1, 1, 'Email Notification', 'developing', '4', '2017-11-08 06:49:44', '2017-11-08 06:49:44', 'Create a email notifications', '26/12/2017', 'high');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(1, 'Arijit Samaddar', 'arijit.wizkraft@gmail.com', '$2y$10$grmiRLTao.2ZuzHzi6911ePRpkSft/Jvznv7zExNq6bZGByaW5tWG', 'hPaC5Jds17fwY80M1iJxntxHjiZVXqIzlRVF58gcoXufCMkIDFXKsTaQhUVI', '2017-10-31 02:05:28', '2017-10-31 02:05:28', 1),
(2, 'Raven Dave', 'arijitsamaddar21@gmail.com', '$2y$10$mIxTC.8Roi8FXz9tUZztKufD0il9MtC0.HiM3bXilBtrRUz9.l0yK', 'KuJlZ7330dbRVURqB2CJLIUg949WpqRC6KrXzZ4v0Wjc8yI5ZHbjzTK3huBa', '2017-11-01 01:24:14', '2017-11-01 01:24:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_tasks`
--

CREATE TABLE `user_tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_tasks`
--

INSERT INTO `user_tasks` (`id`, `user_id`, `client_id`, `project_id`, `task_id`, `start_time`, `end_time`, `created_at`, `updated_at`, `description`, `date`) VALUES
(21, 2, 2, 1, 1, '14:08:23', '14:10:20', '2017-11-08 03:08:48', '2017-11-08 08:40:29', 'Start Of Home Page Design', '2017-11-08'),
(22, 2, 2, 1, 1, '14:10:29', '14:10:47', '2017-11-08 08:40:29', '2017-11-08 08:40:47', NULL, '2017-11-08'),
(23, 2, 2, 1, 1, '14:12:21', '14:25:54', '2017-11-08 03:12:34', '2017-11-08 08:55:54', 'Testing', '2017-11-08'),
(24, 2, 2, 1, 1, '14:35:16', '14:36:12', '2017-11-08 03:36:09', '2017-11-08 09:06:19', 'begining of completion', '2017-11-08'),
(26, 2, 2, 1, 1, '14:38:06', '14:38:55', '2017-11-08 03:38:27', '2017-11-08 09:08:55', 'completion resubmit start....', '2017-11-08'),
(27, 2, 2, 1, 1, '14:39:50', '14:42:51', '2017-11-08 03:40:03', '2017-11-08 09:12:51', 'complettion done', '2017-11-08'),
(28, 2, 2, 1, 1, '14:43:04', '14:43:47', '2017-11-08 03:43:22', '2017-11-08 09:13:47', 'Completion Redone!', '2017-11-08'),
(29, 2, 2, 1, 1, '15:52:24', '15:52:55', '2017-11-08 04:52:40', '2017-11-08 10:23:27', 'redesign start', '2017-11-08'),
(30, 2, 2, 1, 1, '15:53:27', '15:53:47', '2017-11-08 10:23:27', '2017-11-08 10:23:47', NULL, '2017-11-08'),
(31, 2, 2, 1, 1, '17:01:32', '17:01:37', '2017-11-08 06:01:58', '2017-11-08 06:01:58', 'complete', '2017-11-08'),
(32, 2, 2, 1, 3, '17:50:20', '17:50:43', '2017-11-08 06:50:28', '2017-11-08 12:20:46', 'Start', '2017-11-08'),
(33, 2, 2, 1, 3, '17:50:46', '17:51:21', '2017-11-08 12:20:46', '2017-11-08 12:21:21', NULL, '2017-11-08'),
(34, 2, 2, 1, 3, '12:29:26', '12:32:34', '2017-11-09 01:29:39', '2017-11-09 07:02:34', 'Start Email Notification', '2017-11-09'),
(35, 2, 2, 1, 1, '12:37:02', '12:40:19', '2017-11-09 01:37:10', '2017-11-09 07:10:19', 'start home page', '2017-11-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_user_project_id_index` (`project_id`),
  ADD KEY `project_user_user_id_index` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_tasks`
--
ALTER TABLE `user_tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `credentials`
--
ALTER TABLE `credentials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_tasks`
--
ALTER TABLE `user_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
