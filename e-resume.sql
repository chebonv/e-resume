-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 01:18 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-resume`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_of_study` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_study` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `years` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree_obtained` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `any_specialisation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `name_of_study`, `place_of_study`, `years`, `degree_obtained`, `any_specialisation`, `career_option`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bachelor of science in IT', 'Kabarak University', '2016 - Current', 'No', 'PHP, JAVA Programming', '1', '2018-07-31 07:50:32', '2018-07-31 07:50:32'),
(2, 1, 'Diploma in IT', 'Kabarak University', '2014-2016', 'Yes', 'Programming', '1', '2018-08-16 08:49:13', '2018-08-16 08:49:13'),
(3, 4, 'Some School', 'Nairobi', '2010 -2018', 'No', 'Accounting', '5', '2019-03-13 11:43:43', '2019-03-13 11:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `extra_spaces`
--

CREATE TABLE `extra_spaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `extra` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, '2018_07_30_115927_create_summaries_table', 1),
(4, '2018_07_30_120125_create_skills_table', 1),
(5, '2018_07_30_120704_create_educations_table', 1),
(6, '2018_07_30_121048_create_work_experiences_table', 1),
(7, '2018_07_30_121533_create_extra_spaces_table', 1),
(8, '2018_07_31_090922_create_profession_table', 1);

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
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `id` int(10) UNSIGNED NOT NULL,
  `profession` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `profession`, `created_at`, `updated_at`) VALUES
(1, 'IT', '2018-07-31 06:40:12', '2018-07-31 06:40:12'),
(2, 'Business Management', '2018-07-31 06:41:30', '2018-07-31 06:41:30'),
(5, 'Finance', '2018-07-31 06:54:11', '2018-07-31 06:54:11'),
(6, 'Medicine', '2018-08-16 08:44:43', '2018-08-16 08:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `skill`, `career_option`, `created_at`, `updated_at`) VALUES
(1, 1, 'PHP', '1', '2018-07-31 06:38:23', '2018-07-31 06:38:23'),
(2, 1, 'Cisco Networking', '1', '2018-07-31 06:40:12', '2018-07-31 06:40:12'),
(3, 1, 'Table Banking', '2', '2018-07-31 06:41:30', '2018-07-31 06:41:30'),
(4, 1, 'JAVA', '1', '2018-07-31 06:42:05', '2018-07-31 06:42:05'),
(5, 1, 'Python', '1', '2018-07-31 06:44:25', '2018-07-31 06:44:25'),
(6, 1, 'C Programming', '1', '2018-07-31 06:48:27', '2018-07-31 06:48:27'),
(7, 1, 'Finanace', '2', '2018-07-31 06:48:49', '2018-07-31 06:48:49'),
(8, 1, 'Accounts', '5', '2018-07-31 06:54:11', '2018-07-31 06:54:11'),
(9, 1, 'Nursing', '6', '2018-08-16 08:44:43', '2018-08-16 08:44:43'),
(10, 4, 'Accounting', '5', '2019-03-13 11:42:19', '2019-03-13 11:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `summaries`
--

CREATE TABLE `summaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `summaries`
--

INSERT INTO `summaries` (`id`, `user_id`, `summary`, `created_at`, `updated_at`) VALUES
(1, 1, 'My summary is awesome and great.', '2018-07-31 07:48:31', '2018-07-31 07:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image.png',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `mobile`, `address`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'image.png', 'Chebon Vincent', 'chebonv@gmail.com', '0719619092', 'PO Box 1480 - 20100', '$2y$10$Ew5TW0vbMZ78mgqkPgKNseo6Xwl5ncje9K1r8sv2MKfz05Dx1zkYa', 'applicant', 'RwT8eH1vxTJNNf0zEjoBob9yqksMYrtPqBoWRiHSStQpdEp6gz8iBdAb9BYY', '2018-07-31 06:26:52', '2018-07-31 06:26:52'),
(2, '1533401528.jpg', 'New User', 'new@gmail.com', '0712909090', 'PO BOX 12345', '$2y$10$qd1XFx4cloznB7fg8iVVmuG8abg/qllodZzn5sHsTlRYIuK4vPYDu', 'applicant', 'aD2RClcDT7l8D2XfjaQlwt3m7bYdbOYfSQqiQJEY4lEsBxeusXIhChaSS9Xb', '2018-08-04 16:52:08', '2018-08-04 16:52:08'),
(3, '1533808469.jpg', 'wilfred chege', 'wilychege90@gmail.com', '0748188111', 'nakuru', '$2y$10$YHFY4MWM4WEBKDkIeUP5oeFmvI2edwww2aNOuHKmXLTNxuSlCKGty', 'applicant', NULL, '2018-08-09 09:54:32', '2018-08-09 09:54:32'),
(4, '1552477094.png', 'new accunt', 'me@g.com', '0727788777', 'po box 1234', '$2y$10$mk7ysjxXEA6j913sM0PYMOCj2Py4UOuxg1looCJPbFRPdzmfvsK6.', 'applicant', NULL, '2019-03-13 11:38:15', '2019-03-13 11:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title_of_position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_the_company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_of_the_position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `years` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career_option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`id`, `user_id`, `title_of_position`, `name_of_the_company`, `description_of_the_position`, `years`, `career_option`, `created_at`, `updated_at`) VALUES
(1, 1, 'Freelance', 'Freelance', 'Working on individual projects', '2015 - Current', '1', '2018-07-31 07:54:00', '2018-07-31 07:54:00'),
(2, 4, 'CEO', 'Northfront', '<p>sadsd&nbsp;</p>\r\n<p>asds</p>\r\n<p>dasd</p>', '2002 - 2019', '5', '2019-03-13 11:44:55', '2019-03-13 11:44:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_spaces`
--
ALTER TABLE `extra_spaces`
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
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summaries`
--
ALTER TABLE `summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `extra_spaces`
--
ALTER TABLE `extra_spaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `summaries`
--
ALTER TABLE `summaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
