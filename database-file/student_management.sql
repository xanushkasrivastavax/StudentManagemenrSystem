-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2022 at 12:26 PM
-- Server version: 5.7.36
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anushka Srivastava', 'anushkasrivastavax@gmail.com', 'Student', 1, '$2y$10$.KXh.bjbRQwfRjsF7CcaaeTbu8nv/BmoeGkOaXHrQOcAtm5tnWAc6', 'MXnZZ5vTEHFJWPSy8ewJlfYaZESC7Mst9pIj1L6AxkL9D5X21KXJKzmlsNaC', '2022-03-23 04:42:36', '2022-03-23 04:42:36'),
(2, 'Shivang Goria', 'shivanggoria1@gmail.com', 'Student', 0, '$2y$10$7vDLWRGw5dgwtmO2MMuav.qETx.z2iF6kCGrxcix9TdrWSSs2pG1O', 'NCrxsRiN6OJnoRzTk149LzBXpVlQLsfl1d62wG4riJU9zmZaSQLAQVLIKEPR', '2022-03-23 06:39:42', '2022-03-23 06:39:42'),
(3, 'Bajrang Bansal', 'bajrangibansal@gmail.com', 'Teacher', 0, '$2y$10$L4aEP7xjFBbiL8X9reX0s.fNEsvXY0tiMD.9dVM40eMuOHJbINAHG', 'vXvjMoJm0X7hVkatW2v8NhmrlCi6q0IjcBtKjHxQBiCMk9nafnS9AvlBuagL', '2022-03-23 06:41:49', '2022-03-23 06:41:49'),
(4, 'Chandra Shekhar', 'chandra@gmail.com', 'teacher', 0, '$2y$10$P45BJtStSWODiDjVjkQdj.U6g2dWOvxevtM1cnmQdJj5ed4qBkJpO', NULL, '2022-03-23 06:44:42', '2022-03-23 06:44:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
