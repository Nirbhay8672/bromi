-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2023 at 04:41 PM
-- Server version: 10.6.15-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrwebcoi_bromi`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `user_id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, NULL, 'default', 'created', 'App\\Models\\SuperCity', 1, 'App\\Models\\User', 6, '[]', '2023-08-22 18:14:34', '2023-08-22 18:14:34'),
(2, NULL, 'default', 'created', 'App\\Models\\SuperCity', 2, 'App\\Models\\User', 6, '[]', '2023-08-22 18:14:41', '2023-08-22 18:14:41'),
(3, NULL, 'default', 'created', 'App\\Models\\SuperCity', 3, 'App\\Models\\User', 6, '[]', '2023-08-22 18:14:48', '2023-08-22 18:14:48'),
(4, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-23 03:04:32', '2023-08-23 03:04:32'),
(5, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-23 03:04:32', '2023-08-23 03:04:32'),
(6, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-23 03:04:32', '2023-08-23 03:04:32'),
(7, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-23 03:04:32', '2023-08-23 03:04:32'),
(8, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-23 03:04:32', '2023-08-23 03:04:32'),
(9, NULL, 'default', 'created', 'App\\Models\\City', 6, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Mumbai\"}}', '2023-08-23 03:04:38', '2023-08-23 03:04:38'),
(10, NULL, 'default', 'created', 'App\\Models\\City', 7, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Nashik\"}}', '2023-08-23 03:04:38', '2023-08-23 03:04:38'),
(11, NULL, 'default', 'created', 'App\\Models\\City', 8, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Aurangabad\"}}', '2023-08-23 03:04:38', '2023-08-23 03:04:38'),
(12, NULL, 'default', 'created', 'App\\Models\\City', 9, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Nagpur\"}}', '2023-08-23 03:04:38', '2023-08-23 03:04:38'),
(13, NULL, 'default', 'created', 'App\\Models\\City', 10, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Solapur\"}}', '2023-08-23 03:04:38', '2023-08-23 03:04:38'),
(14, NULL, 'default', 'created', 'App\\Models\\SuperAreas', 1, 'App\\Models\\User', 6, '[]', '2023-08-23 03:07:13', '2023-08-23 03:07:13'),
(15, NULL, 'default', 'created', 'App\\Models\\State', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Kerala\"}}', '2023-08-23 05:31:55', '2023-08-23 05:31:55'),
(16, NULL, 'default', 'created', 'App\\Models\\City', 11, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-23 05:32:19', '2023-08-23 05:32:19'),
(17, 39, 'default', 'created', 'App\\Models\\Projects', 1, 'App\\Models\\User', 39, '[]', '2023-08-23 05:49:41', '2023-08-23 05:49:41'),
(18, 39, 'default', 'created', 'App\\Models\\Enquiries', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Tester\",\"client_mobile\":\"4567987985\",\"client_email\":\"tst@mail.com\",\"is_nri\":\"1\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"21\\\"]\",\"area_from\":\"1000\",\"area_to\":\"5000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"32\",\"furnished_status\":\"[\\\"35\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"8,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"71\",\"area_ids\":\"[]\",\"is_preleased\":\"1\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"Contact \\\",\\\"4567984565\\\",\\\"Contactable\\\",0]]\",\"telephonic_discussion\":null,\"highlights\":null,\"enquiry_city_id\":\"11\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-23 06:35:57', '2023-08-23 06:35:57'),
(19, NULL, 'default', 'created', 'App\\Models\\Areas', 1, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 08:59:05', '2023-08-23 08:59:05'),
(20, NULL, 'default', 'created', 'App\\Models\\Areas', 2, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 08:59:05', '2023-08-23 08:59:05'),
(21, NULL, 'default', 'created', 'App\\Models\\Areas', 3, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 08:59:05', '2023-08-23 08:59:05'),
(22, NULL, 'default', 'created', 'App\\Models\\Areas', 4, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 08:59:05', '2023-08-23 08:59:05'),
(23, NULL, 'default', 'created', 'App\\Models\\Areas', 5, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 08:59:05', '2023-08-23 08:59:05'),
(24, NULL, 'default', 'created', 'App\\Models\\Areas', 6, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 08:59:05', '2023-08-23 08:59:05'),
(25, NULL, 'default', 'created', 'App\\Models\\Areas', 7, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 08:59:05', '2023-08-23 08:59:05'),
(26, NULL, 'default', 'created', 'App\\Models\\Areas', 8, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 08:59:05', '2023-08-23 08:59:05'),
(27, NULL, 'default', 'created', 'App\\Models\\Areas', 9, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 08:59:05', '2023-08-23 08:59:05'),
(28, NULL, 'default', 'created', 'App\\Models\\Areas', 10, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 08:59:05', '2023-08-23 08:59:05'),
(29, NULL, 'default', 'created', 'App\\Models\\City', 12, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-23 12:19:22', '2023-08-23 12:19:22'),
(30, NULL, 'default', 'created', 'App\\Models\\City', 13, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-23 12:19:22', '2023-08-23 12:19:22'),
(31, NULL, 'default', 'created', 'App\\Models\\City', 14, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-23 12:19:22', '2023-08-23 12:19:22'),
(32, NULL, 'default', 'created', 'App\\Models\\City', 15, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-23 12:19:22', '2023-08-23 12:19:22'),
(33, NULL, 'default', 'created', 'App\\Models\\Areas', 11, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 12:19:49', '2023-08-23 12:19:49'),
(34, NULL, 'default', 'created', 'App\\Models\\Areas', 12, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 12:19:49', '2023-08-23 12:19:49'),
(35, NULL, 'default', 'created', 'App\\Models\\Areas', 13, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 12:19:49', '2023-08-23 12:19:49'),
(36, NULL, 'default', 'created', 'App\\Models\\Areas', 14, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 12:19:49', '2023-08-23 12:19:49'),
(37, NULL, 'default', 'created', 'App\\Models\\Areas', 15, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 12:19:49', '2023-08-23 12:19:49'),
(38, NULL, 'default', 'created', 'App\\Models\\Areas', 16, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 12:19:49', '2023-08-23 12:19:49'),
(39, NULL, 'default', 'created', 'App\\Models\\Areas', 17, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 12:19:49', '2023-08-23 12:19:49'),
(40, NULL, 'default', 'created', 'App\\Models\\Areas', 18, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 12:19:49', '2023-08-23 12:19:49'),
(41, NULL, 'default', 'created', 'App\\Models\\Areas', 19, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 12:19:49', '2023-08-23 12:19:49'),
(42, NULL, 'default', 'created', 'App\\Models\\Areas', 20, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 12:19:49', '2023-08-23 12:19:49'),
(43, NULL, 'default', 'created', 'App\\Models\\City', 16, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Jodhpur\"}}', '2023-08-23 15:37:12', '2023-08-23 15:37:12'),
(44, NULL, 'default', 'created', 'App\\Models\\City', 17, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Jaipur\"}}', '2023-08-23 15:37:12', '2023-08-23 15:37:12'),
(45, NULL, 'default', 'created', 'App\\Models\\City', 18, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Udaipur\"}}', '2023-08-23 15:37:12', '2023-08-23 15:37:12'),
(46, NULL, 'default', 'created', 'App\\Models\\City', 19, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Bikaner\"}}', '2023-08-23 15:37:12', '2023-08-23 15:37:12'),
(47, NULL, 'default', 'created', 'App\\Models\\City', 20, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Ajmer\"}}', '2023-08-23 15:37:12', '2023-08-23 15:37:12'),
(48, NULL, 'default', 'created', 'App\\Models\\City', 21, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Kochi\"}}', '2023-08-23 15:43:24', '2023-08-23 15:43:24'),
(49, NULL, 'default', 'created', 'App\\Models\\City', 22, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Kollam\"}}', '2023-08-23 15:43:41', '2023-08-23 15:43:41'),
(50, NULL, 'default', 'created', 'App\\Models\\Areas', 21, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Pimplad\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-23 15:44:19', '2023-08-23 15:44:19'),
(51, NULL, 'default', 'created', 'App\\Models\\Areas', 22, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Wadgaon\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-23 15:44:19', '2023-08-23 15:44:19'),
(52, NULL, 'default', 'created', 'App\\Models\\Areas', 23, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Umrala\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-23 15:44:19', '2023-08-23 15:44:19'),
(53, NULL, 'default', 'created', 'App\\Models\\Areas', 24, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Wadala\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-23 15:44:19', '2023-08-23 15:44:19'),
(54, NULL, 'default', 'created', 'App\\Models\\Areas', 25, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Devlali Bazar\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-23 15:44:19', '2023-08-23 15:44:19'),
(55, NULL, 'default', 'created', 'App\\Models\\Areas', 26, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Ajmer\",\"city_id\":\"15\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-23 15:44:48', '2023-08-23 15:44:48'),
(56, NULL, 'default', 'created', 'App\\Models\\Areas', 27, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Banjari\",\"city_id\":\"15\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-23 15:44:48', '2023-08-23 15:44:48'),
(57, NULL, 'default', 'created', 'App\\Models\\Areas', 28, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Barol\",\"city_id\":\"15\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-23 15:44:48', '2023-08-23 15:44:48'),
(58, NULL, 'default', 'created', 'App\\Models\\Areas', 29, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Delwara\",\"city_id\":\"15\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-23 15:44:48', '2023-08-23 15:44:48'),
(59, NULL, 'default', 'created', 'App\\Models\\Areas', 30, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Fathegarh\",\"city_id\":\"15\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-23 15:44:48', '2023-08-23 15:44:48'),
(60, NULL, 'default', 'created', 'App\\Models\\Areas', 31, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:50:53', '2023-08-23 15:50:53'),
(61, NULL, 'default', 'created', 'App\\Models\\Areas', 32, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:50:53', '2023-08-23 15:50:53'),
(62, NULL, 'default', 'created', 'App\\Models\\Areas', 33, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:50:53', '2023-08-23 15:50:53'),
(63, NULL, 'default', 'created', 'App\\Models\\Areas', 34, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:50:53', '2023-08-23 15:50:53'),
(64, NULL, 'default', 'created', 'App\\Models\\Areas', 35, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:50:53', '2023-08-23 15:50:53'),
(65, NULL, 'default', 'created', 'App\\Models\\Areas', 36, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:50:53', '2023-08-23 15:50:53'),
(66, NULL, 'default', 'created', 'App\\Models\\Areas', 37, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:50:53', '2023-08-23 15:50:53'),
(67, NULL, 'default', 'created', 'App\\Models\\Areas', 38, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:50:53', '2023-08-23 15:50:53'),
(68, NULL, 'default', 'created', 'App\\Models\\Areas', 39, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:50:53', '2023-08-23 15:50:53'),
(69, NULL, 'default', 'created', 'App\\Models\\Areas', 40, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:50:53', '2023-08-23 15:50:53'),
(70, NULL, 'default', 'created', 'App\\Models\\Areas', 1, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:57:52', '2023-08-23 15:57:52'),
(71, NULL, 'default', 'created', 'App\\Models\\Areas', 2, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:57:52', '2023-08-23 15:57:52'),
(72, NULL, 'default', 'created', 'App\\Models\\Areas', 3, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:57:52', '2023-08-23 15:57:52'),
(73, NULL, 'default', 'created', 'App\\Models\\Areas', 4, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:57:52', '2023-08-23 15:57:52'),
(74, NULL, 'default', 'created', 'App\\Models\\Areas', 5, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:57:52', '2023-08-23 15:57:52'),
(75, NULL, 'default', 'created', 'App\\Models\\Areas', 6, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:57:52', '2023-08-23 15:57:52'),
(76, NULL, 'default', 'created', 'App\\Models\\Areas', 7, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:57:52', '2023-08-23 15:57:52'),
(77, NULL, 'default', 'created', 'App\\Models\\Areas', 8, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:57:52', '2023-08-23 15:57:52'),
(78, NULL, 'default', 'created', 'App\\Models\\Areas', 9, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:57:52', '2023-08-23 15:57:52'),
(79, NULL, 'default', 'created', 'App\\Models\\Areas', 10, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 15:57:53', '2023-08-23 15:57:53'),
(80, NULL, 'default', 'created', 'App\\Models\\Areas', 11, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 16:09:43', '2023-08-23 16:09:43'),
(81, NULL, 'default', 'created', 'App\\Models\\Areas', 12, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 16:09:43', '2023-08-23 16:09:43'),
(82, NULL, 'default', 'created', 'App\\Models\\Areas', 13, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 16:09:43', '2023-08-23 16:09:43'),
(83, NULL, 'default', 'created', 'App\\Models\\Areas', 14, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 16:09:43', '2023-08-23 16:09:43'),
(84, NULL, 'default', 'created', 'App\\Models\\Areas', 15, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 16:09:43', '2023-08-23 16:09:43'),
(85, NULL, 'default', 'created', 'App\\Models\\Areas', 16, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 16:09:43', '2023-08-23 16:09:43'),
(86, NULL, 'default', 'created', 'App\\Models\\Areas', 17, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 16:09:43', '2023-08-23 16:09:43'),
(87, NULL, 'default', 'created', 'App\\Models\\Areas', 18, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 16:09:43', '2023-08-23 16:09:43'),
(88, NULL, 'default', 'created', 'App\\Models\\Areas', 19, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 16:09:43', '2023-08-23 16:09:43'),
(89, NULL, 'default', 'created', 'App\\Models\\Areas', 20, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 16:09:43', '2023-08-23 16:09:43'),
(90, NULL, 'default', 'created', 'App\\Models\\Areas', 21, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 17:53:50', '2023-08-23 17:53:50'),
(91, NULL, 'default', 'created', 'App\\Models\\Areas', 22, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 17:53:50', '2023-08-23 17:53:50'),
(92, NULL, 'default', 'created', 'App\\Models\\Areas', 23, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 17:53:50', '2023-08-23 17:53:50'),
(93, NULL, 'default', 'created', 'App\\Models\\Areas', 24, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 17:53:50', '2023-08-23 17:53:50'),
(94, NULL, 'default', 'created', 'App\\Models\\Areas', 25, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 17:53:50', '2023-08-23 17:53:50'),
(95, NULL, 'default', 'created', 'App\\Models\\Areas', 26, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 17:53:50', '2023-08-23 17:53:50'),
(96, NULL, 'default', 'created', 'App\\Models\\Areas', 27, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 17:53:50', '2023-08-23 17:53:50'),
(97, NULL, 'default', 'created', 'App\\Models\\Areas', 28, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 17:53:50', '2023-08-23 17:53:50'),
(98, NULL, 'default', 'created', 'App\\Models\\Areas', 29, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 17:53:50', '2023-08-23 17:53:50'),
(99, NULL, 'default', 'created', 'App\\Models\\Areas', 30, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-23 17:53:50', '2023-08-23 17:53:50'),
(100, NULL, 'default', 'created', 'App\\Models\\Builders', 1, 'App\\Models\\User', 8, '{\"attributes\":{\"name\":\"Safal\"}}', '2023-08-23 18:15:40', '2023-08-23 18:15:40'),
(101, NULL, 'default', 'created', 'App\\Models\\Builders', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ajmera\"}}', '2023-08-23 18:18:58', '2023-08-23 18:18:58'),
(102, NULL, 'default', 'created', 'App\\Models\\Builders', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ajmera\"}}', '2023-08-23 18:18:58', '2023-08-23 18:18:58'),
(103, 39, 'default', 'created', 'App\\Models\\Projects', 2, 'App\\Models\\User', 39, '[]', '2023-08-23 18:24:04', '2023-08-23 18:24:04'),
(104, 39, 'default', 'updated', 'App\\Models\\Projects', 2, 'App\\Models\\User', 39, '[]', '2023-08-23 18:24:34', '2023-08-23 18:24:34'),
(105, 39, 'default', 'updated', 'App\\Models\\Projects', 2, 'App\\Models\\User', 39, '[]', '2023-08-23 18:25:17', '2023-08-23 18:25:17'),
(106, NULL, 'default', 'created', 'App\\Models\\Areas', 31, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:02', '2023-08-24 05:23:02'),
(107, NULL, 'default', 'created', 'App\\Models\\Areas', 32, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:02', '2023-08-24 05:23:02'),
(108, NULL, 'default', 'created', 'App\\Models\\Areas', 33, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:02', '2023-08-24 05:23:02'),
(109, NULL, 'default', 'created', 'App\\Models\\Areas', 34, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:02', '2023-08-24 05:23:02'),
(110, NULL, 'default', 'created', 'App\\Models\\Areas', 35, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:02', '2023-08-24 05:23:02'),
(111, NULL, 'default', 'created', 'App\\Models\\Areas', 36, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:02', '2023-08-24 05:23:02'),
(112, NULL, 'default', 'created', 'App\\Models\\Areas', 37, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:02', '2023-08-24 05:23:02'),
(113, NULL, 'default', 'created', 'App\\Models\\Areas', 38, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:02', '2023-08-24 05:23:02'),
(114, NULL, 'default', 'created', 'App\\Models\\Areas', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:02', '2023-08-24 05:23:02'),
(115, NULL, 'default', 'created', 'App\\Models\\Areas', 40, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:02', '2023-08-24 05:23:02'),
(116, NULL, 'default', 'created', 'App\\Models\\Areas', 41, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:32', '2023-08-24 05:23:32'),
(117, NULL, 'default', 'created', 'App\\Models\\Areas', 42, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:32', '2023-08-24 05:23:32'),
(118, NULL, 'default', 'created', 'App\\Models\\Areas', 43, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:32', '2023-08-24 05:23:32'),
(119, NULL, 'default', 'created', 'App\\Models\\Areas', 44, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:32', '2023-08-24 05:23:32'),
(120, NULL, 'default', 'created', 'App\\Models\\Areas', 45, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:32', '2023-08-24 05:23:32'),
(121, NULL, 'default', 'created', 'App\\Models\\Areas', 46, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:32', '2023-08-24 05:23:32'),
(122, NULL, 'default', 'created', 'App\\Models\\Areas', 47, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:32', '2023-08-24 05:23:32'),
(123, NULL, 'default', 'created', 'App\\Models\\Areas', 48, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:32', '2023-08-24 05:23:32'),
(124, NULL, 'default', 'created', 'App\\Models\\Areas', 49, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:32', '2023-08-24 05:23:32'),
(125, NULL, 'default', 'created', 'App\\Models\\Areas', 50, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 05:23:32', '2023-08-24 05:23:32'),
(126, NULL, 'default', 'created', 'App\\Models\\Areas', 51, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Tragad\",\"city_id\":\"11\",\"state_id\":\"1\",\"status\":\"0\"}}', '2023-08-24 05:24:10', '2023-08-24 05:24:10'),
(127, 39, 'default', 'created', 'App\\Models\\Projects', 3, 'App\\Models\\User', 39, '[]', '2023-08-24 05:27:32', '2023-08-24 05:27:32'),
(128, NULL, 'default', 'updated', 'App\\Models\\Areas', 51, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Tragad\",\"city_id\":\"11\",\"state_id\":\"1\",\"status\":\"1\"},\"old\":{\"name\":\"Tragad\",\"city_id\":\"11\",\"state_id\":\"1\",\"status\":\"0\"}}', '2023-08-24 06:07:08', '2023-08-24 06:07:08'),
(129, NULL, 'default', 'created', 'App\\Models\\Areas', 52, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Kaliyabid\",\"city_id\":\"4\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:36:00', '2023-08-24 07:36:00'),
(130, NULL, 'default', 'created', 'App\\Models\\Areas', 53, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Mahuva\",\"city_id\":\"4\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:36:00', '2023-08-24 07:36:00'),
(131, NULL, 'default', 'created', 'App\\Models\\Areas', 54, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambawadi\",\"city_id\":\"4\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:36:00', '2023-08-24 07:36:00'),
(132, NULL, 'default', 'created', 'App\\Models\\Areas', 55, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Subhashnagar\",\"city_id\":\"4\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:36:00', '2023-08-24 07:36:00'),
(133, NULL, 'default', 'created', 'App\\Models\\Areas', 56, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chitra\",\"city_id\":\"4\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:36:00', '2023-08-24 07:36:00'),
(134, NULL, 'default', 'created', 'App\\Models\\Areas', 57, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Alkapuri\",\"city_id\":\"3\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:36:35', '2023-08-24 07:36:35'),
(135, NULL, 'default', 'created', 'App\\Models\\Areas', 58, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gotri\",\"city_id\":\"3\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:36:35', '2023-08-24 07:36:35'),
(136, NULL, 'default', 'created', 'App\\Models\\Areas', 59, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Akota\",\"city_id\":\"3\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:36:35', '2023-08-24 07:36:35'),
(137, NULL, 'default', 'created', 'App\\Models\\Areas', 60, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Fateganj\",\"city_id\":\"3\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:36:35', '2023-08-24 07:36:35'),
(138, NULL, 'default', 'created', 'App\\Models\\Areas', 61, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Sama\",\"city_id\":\"3\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:36:35', '2023-08-24 07:36:35'),
(139, NULL, 'default', 'created', 'App\\Models\\Areas', 62, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Karelibaug\",\"city_id\":\"3\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:36:35', '2023-08-24 07:36:35'),
(140, NULL, 'default', 'created', 'App\\Models\\Areas', 63, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vesu\",\"city_id\":\"2\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:37:20', '2023-08-24 07:37:20'),
(141, NULL, 'default', 'created', 'App\\Models\\Areas', 64, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Adajan\",\"city_id\":\"2\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:37:20', '2023-08-24 07:37:20'),
(142, NULL, 'default', 'created', 'App\\Models\\Areas', 65, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Pal\",\"city_id\":\"2\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:37:20', '2023-08-24 07:37:20'),
(143, NULL, 'default', 'created', 'App\\Models\\Areas', 66, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Dindoli\",\"city_id\":\"2\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:37:20', '2023-08-24 07:37:20'),
(144, NULL, 'default', 'created', 'App\\Models\\Areas', 67, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Althan\",\"city_id\":\"2\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:37:20', '2023-08-24 07:37:20'),
(145, NULL, 'default', 'created', 'App\\Models\\Areas', 68, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Athwalines\",\"city_id\":\"2\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:37:20', '2023-08-24 07:37:20'),
(146, NULL, 'default', 'created', 'App\\Models\\Areas', 69, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Palanpur\",\"city_id\":\"2\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:37:20', '2023-08-24 07:37:20'),
(147, NULL, 'default', 'created', 'App\\Models\\Areas', 70, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Kamrej\",\"city_id\":\"2\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:37:20', '2023-08-24 07:37:20'),
(148, NULL, 'default', 'created', 'App\\Models\\Areas', 71, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Katargam\",\"city_id\":\"2\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:37:20', '2023-08-24 07:37:20'),
(149, NULL, 'default', 'created', 'App\\Models\\Areas', 72, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Mota Varachha\",\"city_id\":\"2\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-24 07:37:20', '2023-08-24 07:37:20'),
(150, NULL, 'default', 'created', 'App\\Models\\City', 23, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ajmer\"}}', '2023-08-24 07:39:59', '2023-08-24 07:39:59'),
(151, NULL, 'default', 'created', 'App\\Models\\Areas', 73, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ajmer\",\"city_id\":\"15\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:39:59', '2023-08-24 07:39:59'),
(152, NULL, 'default', 'created', 'App\\Models\\City', 24, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ajmer\"}}', '2023-08-24 07:39:59', '2023-08-24 07:39:59'),
(153, NULL, 'default', 'created', 'App\\Models\\Areas', 74, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Banjari\",\"city_id\":\"15\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:39:59', '2023-08-24 07:39:59'),
(154, NULL, 'default', 'created', 'App\\Models\\City', 25, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ajmer\"}}', '2023-08-24 07:39:59', '2023-08-24 07:39:59'),
(155, NULL, 'default', 'created', 'App\\Models\\Areas', 75, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Barol\",\"city_id\":\"15\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:39:59', '2023-08-24 07:39:59'),
(156, NULL, 'default', 'created', 'App\\Models\\City', 26, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ajmer\"}}', '2023-08-24 07:39:59', '2023-08-24 07:39:59'),
(157, NULL, 'default', 'created', 'App\\Models\\Areas', 76, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Delwara\",\"city_id\":\"15\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:39:59', '2023-08-24 07:39:59'),
(158, NULL, 'default', 'created', 'App\\Models\\City', 27, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ajmer\"}}', '2023-08-24 07:39:59', '2023-08-24 07:39:59'),
(159, NULL, 'default', 'created', 'App\\Models\\Areas', 77, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Fathegarh\",\"city_id\":\"15\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:39:59', '2023-08-24 07:39:59'),
(160, NULL, 'default', 'created', 'App\\Models\\City', 28, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Jaipur\"}}', '2023-08-24 07:40:11', '2023-08-24 07:40:11'),
(161, NULL, 'default', 'created', 'App\\Models\\Areas', 78, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Garh\",\"city_id\":\"12\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:40:11', '2023-08-24 07:40:11'),
(162, NULL, 'default', 'created', 'App\\Models\\City', 29, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Jaipur\"}}', '2023-08-24 07:40:11', '2023-08-24 07:40:11'),
(163, NULL, 'default', 'created', 'App\\Models\\Areas', 79, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bapu Nagar\",\"city_id\":\"12\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:40:11', '2023-08-24 07:40:11'),
(164, NULL, 'default', 'created', 'App\\Models\\City', 30, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Jaipur\"}}', '2023-08-24 07:40:11', '2023-08-24 07:40:11'),
(165, NULL, 'default', 'created', 'App\\Models\\Areas', 80, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Phagi\",\"city_id\":\"12\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:40:11', '2023-08-24 07:40:11'),
(166, NULL, 'default', 'created', 'App\\Models\\City', 31, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Jaipur\"}}', '2023-08-24 07:40:11', '2023-08-24 07:40:11'),
(167, NULL, 'default', 'created', 'App\\Models\\Areas', 81, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Sirsi Road\",\"city_id\":\"12\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:40:11', '2023-08-24 07:40:11'),
(168, NULL, 'default', 'created', 'App\\Models\\City', 32, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Jaipur\"}}', '2023-08-24 07:40:11', '2023-08-24 07:40:11'),
(169, NULL, 'default', 'created', 'App\\Models\\Areas', 82, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Tala\",\"city_id\":\"12\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:40:11', '2023-08-24 07:40:11'),
(170, NULL, 'default', 'created', 'App\\Models\\City', 33, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Udaipur\"}}', '2023-08-24 07:40:29', '2023-08-24 07:40:29'),
(171, NULL, 'default', 'created', 'App\\Models\\Areas', 83, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Kotra\",\"city_id\":\"13\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:40:29', '2023-08-24 07:40:29'),
(172, NULL, 'default', 'created', 'App\\Models\\City', 34, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Udaipur\"}}', '2023-08-24 07:40:29', '2023-08-24 07:40:29'),
(173, NULL, 'default', 'created', 'App\\Models\\Areas', 84, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bakhel\",\"city_id\":\"13\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:40:29', '2023-08-24 07:40:29'),
(174, NULL, 'default', 'created', 'App\\Models\\City', 35, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Udaipur\"}}', '2023-08-24 07:40:29', '2023-08-24 07:40:29'),
(175, NULL, 'default', 'created', 'App\\Models\\Areas', 85, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Karda\",\"city_id\":\"13\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:40:29', '2023-08-24 07:40:29'),
(176, NULL, 'default', 'created', 'App\\Models\\City', 36, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Udaipur\"}}', '2023-08-24 07:40:29', '2023-08-24 07:40:29'),
(177, NULL, 'default', 'created', 'App\\Models\\Areas', 86, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Fatehpur\",\"city_id\":\"13\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:40:29', '2023-08-24 07:40:29'),
(178, NULL, 'default', 'created', 'App\\Models\\City', 37, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Udaipur\"}}', '2023-08-24 07:40:29', '2023-08-24 07:40:29'),
(179, NULL, 'default', 'created', 'App\\Models\\Areas', 87, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Kadia\",\"city_id\":\"13\",\"state_id\":\"3\",\"status\":\"1\"}}', '2023-08-24 07:40:29', '2023-08-24 07:40:29'),
(180, NULL, 'default', 'created', 'App\\Models\\City', 38, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Mumbai\"}}', '2023-08-24 07:40:47', '2023-08-24 07:40:47'),
(181, NULL, 'default', 'created', 'App\\Models\\Areas', 88, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bandra\",\"city_id\":\"6\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:40:47', '2023-08-24 07:40:47'),
(182, NULL, 'default', 'created', 'App\\Models\\City', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Mumbai\"}}', '2023-08-24 07:40:47', '2023-08-24 07:40:47'),
(183, NULL, 'default', 'created', 'App\\Models\\Areas', 89, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Juhu\",\"city_id\":\"6\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:40:47', '2023-08-24 07:40:47'),
(184, NULL, 'default', 'created', 'App\\Models\\City', 40, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Mumbai\"}}', '2023-08-24 07:40:47', '2023-08-24 07:40:47'),
(185, NULL, 'default', 'created', 'App\\Models\\Areas', 90, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Worli\",\"city_id\":\"6\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:40:47', '2023-08-24 07:40:47'),
(186, NULL, 'default', 'created', 'App\\Models\\City', 41, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Mumbai\"}}', '2023-08-24 07:40:47', '2023-08-24 07:40:47'),
(187, NULL, 'default', 'created', 'App\\Models\\Areas', 91, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Andheri\",\"city_id\":\"6\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:40:47', '2023-08-24 07:40:47'),
(188, NULL, 'default', 'created', 'App\\Models\\City', 42, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Mumbai\"}}', '2023-08-24 07:40:47', '2023-08-24 07:40:47'),
(189, NULL, 'default', 'created', 'App\\Models\\Areas', 92, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Dadar\",\"city_id\":\"6\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:40:47', '2023-08-24 07:40:47'),
(190, NULL, 'default', 'created', 'App\\Models\\City', 43, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Mumbai\"}}', '2023-08-24 07:40:47', '2023-08-24 07:40:47'),
(191, NULL, 'default', 'created', 'App\\Models\\Areas', 93, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Borivali\",\"city_id\":\"6\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:40:47', '2023-08-24 07:40:47'),
(192, NULL, 'default', 'created', 'App\\Models\\City', 44, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nagpur\"}}', '2023-08-24 07:41:08', '2023-08-24 07:41:08'),
(193, NULL, 'default', 'created', 'App\\Models\\Areas', 94, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Manewada\",\"city_id\":\"9\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:41:08', '2023-08-24 07:41:08'),
(194, NULL, 'default', 'created', 'App\\Models\\City', 45, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nagpur\"}}', '2023-08-24 07:41:08', '2023-08-24 07:41:08'),
(195, NULL, 'default', 'created', 'App\\Models\\Areas', 95, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Koradi Road\",\"city_id\":\"9\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:41:08', '2023-08-24 07:41:08'),
(196, NULL, 'default', 'created', 'App\\Models\\City', 46, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nagpur\"}}', '2023-08-24 07:41:08', '2023-08-24 07:41:08'),
(197, NULL, 'default', 'created', 'App\\Models\\Areas', 96, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Wardha Road\",\"city_id\":\"9\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:41:08', '2023-08-24 07:41:08'),
(198, NULL, 'default', 'created', 'App\\Models\\City', 47, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nagpur\"}}', '2023-08-24 07:41:08', '2023-08-24 07:41:08'),
(199, NULL, 'default', 'created', 'App\\Models\\Areas', 97, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Narendra Nagar\",\"city_id\":\"9\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:41:08', '2023-08-24 07:41:08'),
(200, NULL, 'default', 'created', 'App\\Models\\City', 48, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nagpur\"}}', '2023-08-24 07:41:08', '2023-08-24 07:41:08'),
(201, NULL, 'default', 'created', 'App\\Models\\Areas', 98, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Trimurti Nagar\",\"city_id\":\"9\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:41:08', '2023-08-24 07:41:08'),
(202, NULL, 'default', 'created', 'App\\Models\\City', 49, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nashik\"}}', '2023-08-24 07:41:22', '2023-08-24 07:41:22'),
(203, NULL, 'default', 'created', 'App\\Models\\Areas', 99, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Pimplad\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:41:22', '2023-08-24 07:41:22'),
(204, NULL, 'default', 'created', 'App\\Models\\City', 50, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nashik\"}}', '2023-08-24 07:41:22', '2023-08-24 07:41:22'),
(205, NULL, 'default', 'created', 'App\\Models\\Areas', 100, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Wadgaon\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:41:22', '2023-08-24 07:41:22'),
(206, NULL, 'default', 'created', 'App\\Models\\City', 51, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nashik\"}}', '2023-08-24 07:41:22', '2023-08-24 07:41:22'),
(207, NULL, 'default', 'created', 'App\\Models\\Areas', 101, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Umrala\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:41:22', '2023-08-24 07:41:22'),
(208, NULL, 'default', 'created', 'App\\Models\\City', 52, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nashik\"}}', '2023-08-24 07:41:22', '2023-08-24 07:41:22'),
(209, NULL, 'default', 'created', 'App\\Models\\Areas', 102, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Wadala\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:41:22', '2023-08-24 07:41:22'),
(210, NULL, 'default', 'created', 'App\\Models\\City', 53, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nashik\"}}', '2023-08-24 07:41:22', '2023-08-24 07:41:22'),
(211, NULL, 'default', 'created', 'App\\Models\\Areas', 103, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Devlali Bazar\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-24 07:41:22', '2023-08-24 07:41:22'),
(212, NULL, 'default', 'created', 'App\\Models\\City', 54, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Mumbai\"}}', '2023-08-24 07:43:15', '2023-08-24 07:43:15'),
(213, NULL, 'default', 'created', 'App\\Models\\City', 55, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nashik\"}}', '2023-08-24 07:43:15', '2023-08-24 07:43:15'),
(214, NULL, 'default', 'created', 'App\\Models\\City', 56, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Aurangabad\"}}', '2023-08-24 07:43:15', '2023-08-24 07:43:15'),
(215, NULL, 'default', 'created', 'App\\Models\\City', 57, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nagpur\"}}', '2023-08-24 07:43:15', '2023-08-24 07:43:15'),
(216, NULL, 'default', 'created', 'App\\Models\\City', 58, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Solapur\"}}', '2023-08-24 07:43:15', '2023-08-24 07:43:15'),
(217, NULL, 'default', 'created', 'App\\Models\\City', 59, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Jodhpur\"}}', '2023-08-24 07:43:21', '2023-08-24 07:43:21'),
(218, NULL, 'default', 'created', 'App\\Models\\City', 60, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Jaipur\"}}', '2023-08-24 07:43:21', '2023-08-24 07:43:21'),
(219, NULL, 'default', 'created', 'App\\Models\\City', 61, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Udaipur\"}}', '2023-08-24 07:43:21', '2023-08-24 07:43:21'),
(220, NULL, 'default', 'created', 'App\\Models\\City', 62, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bikaner\"}}', '2023-08-24 07:43:21', '2023-08-24 07:43:21'),
(221, NULL, 'default', 'created', 'App\\Models\\City', 63, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ajmer\"}}', '2023-08-24 07:43:21', '2023-08-24 07:43:21'),
(222, 39, 'default', 'created', 'App\\Models\\Projects', 4, 'App\\Models\\User', 39, '[]', '2023-08-24 07:47:12', '2023-08-24 07:47:12'),
(223, 39, 'default', 'created', 'App\\Models\\Projects', 5, 'App\\Models\\User', 39, '[]', '2023-08-24 07:55:11', '2023-08-24 07:55:11'),
(224, 39, 'default', 'created', 'App\\Models\\Projects', 6, 'App\\Models\\User', 39, '[]', '2023-08-24 08:11:06', '2023-08-24 08:11:06'),
(225, 39, 'default', 'created', 'App\\Models\\Projects', 7, 'App\\Models\\User', 39, '[]', '2023-08-25 05:19:09', '2023-08-25 05:19:09'),
(226, 39, 'default', 'created', 'App\\Models\\Projects', 8, 'App\\Models\\User', 39, '[]', '2023-08-25 05:21:19', '2023-08-25 05:21:19'),
(227, 8, 'default', 'created', 'App\\Models\\Projects', 9, 'App\\Models\\User', 8, '[]', '2023-08-25 09:12:58', '2023-08-25 09:12:58'),
(228, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:00:28', '2023-08-25 15:00:28'),
(229, NULL, 'default', 'created', 'App\\Models\\Areas', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(230, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(231, NULL, 'default', 'created', 'App\\Models\\Areas', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(232, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(233, NULL, 'default', 'created', 'App\\Models\\Areas', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(234, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(235, NULL, 'default', 'created', 'App\\Models\\Areas', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(236, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(237, NULL, 'default', 'created', 'App\\Models\\Areas', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(238, NULL, 'default', 'created', 'App\\Models\\City', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29');
INSERT INTO `activity_log` (`id`, `user_id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(239, NULL, 'default', 'created', 'App\\Models\\Areas', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(240, NULL, 'default', 'created', 'App\\Models\\City', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(241, NULL, 'default', 'created', 'App\\Models\\Areas', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(242, NULL, 'default', 'created', 'App\\Models\\City', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(243, NULL, 'default', 'created', 'App\\Models\\Areas', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(244, NULL, 'default', 'created', 'App\\Models\\City', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(245, NULL, 'default', 'created', 'App\\Models\\Areas', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(246, NULL, 'default', 'created', 'App\\Models\\City', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(247, NULL, 'default', 'created', 'App\\Models\\Areas', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:00:29', '2023-08-25 15:00:29'),
(248, NULL, 'default', 'created', 'App\\Models\\City', 11, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:08:30', '2023-08-25 15:08:30'),
(249, NULL, 'default', 'created', 'App\\Models\\City', 12, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-25 15:08:30', '2023-08-25 15:08:30'),
(250, NULL, 'default', 'created', 'App\\Models\\City', 13, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-25 15:08:30', '2023-08-25 15:08:30'),
(251, NULL, 'default', 'created', 'App\\Models\\City', 14, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-25 15:08:30', '2023-08-25 15:08:30'),
(252, NULL, 'default', 'created', 'App\\Models\\City', 15, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-25 15:08:30', '2023-08-25 15:08:30'),
(253, NULL, 'default', 'created', 'App\\Models\\Areas', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:11:19', '2023-08-25 15:11:19'),
(254, NULL, 'default', 'created', 'App\\Models\\Areas', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:11:19', '2023-08-25 15:11:19'),
(255, NULL, 'default', 'created', 'App\\Models\\Areas', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:11:19', '2023-08-25 15:11:19'),
(256, NULL, 'default', 'created', 'App\\Models\\Areas', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:11:19', '2023-08-25 15:11:19'),
(257, NULL, 'default', 'created', 'App\\Models\\Areas', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:11:19', '2023-08-25 15:11:19'),
(258, NULL, 'default', 'created', 'App\\Models\\Areas', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:11:19', '2023-08-25 15:11:19'),
(259, NULL, 'default', 'created', 'App\\Models\\Areas', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:11:19', '2023-08-25 15:11:19'),
(260, NULL, 'default', 'created', 'App\\Models\\Areas', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:11:19', '2023-08-25 15:11:19'),
(261, NULL, 'default', 'created', 'App\\Models\\Areas', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:11:19', '2023-08-25 15:11:19'),
(262, NULL, 'default', 'created', 'App\\Models\\Areas', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:11:19', '2023-08-25 15:11:19'),
(263, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:16:16', '2023-08-25 15:16:16'),
(264, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-25 15:16:16', '2023-08-25 15:16:16'),
(265, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-25 15:16:16', '2023-08-25 15:16:16'),
(266, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-25 15:16:16', '2023-08-25 15:16:16'),
(267, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-25 15:16:16', '2023-08-25 15:16:16'),
(268, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(269, NULL, 'default', 'created', 'App\\Models\\Areas', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(270, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(271, NULL, 'default', 'created', 'App\\Models\\Areas', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(272, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(273, NULL, 'default', 'created', 'App\\Models\\Areas', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(274, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(275, NULL, 'default', 'created', 'App\\Models\\Areas', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(276, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(277, NULL, 'default', 'created', 'App\\Models\\Areas', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(278, NULL, 'default', 'created', 'App\\Models\\City', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(279, NULL, 'default', 'created', 'App\\Models\\Areas', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(280, NULL, 'default', 'created', 'App\\Models\\City', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(281, NULL, 'default', 'created', 'App\\Models\\Areas', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(282, NULL, 'default', 'created', 'App\\Models\\City', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(283, NULL, 'default', 'created', 'App\\Models\\Areas', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(284, NULL, 'default', 'created', 'App\\Models\\City', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(285, NULL, 'default', 'created', 'App\\Models\\Areas', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(286, NULL, 'default', 'created', 'App\\Models\\City', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(287, NULL, 'default', 'created', 'App\\Models\\Areas', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:00', '2023-08-25 15:22:00'),
(288, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(289, NULL, 'default', 'created', 'App\\Models\\Areas', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(290, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(291, NULL, 'default', 'created', 'App\\Models\\Areas', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(292, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(293, NULL, 'default', 'created', 'App\\Models\\Areas', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(294, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(295, NULL, 'default', 'created', 'App\\Models\\Areas', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(296, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(297, NULL, 'default', 'created', 'App\\Models\\Areas', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(298, NULL, 'default', 'created', 'App\\Models\\City', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(299, NULL, 'default', 'created', 'App\\Models\\Areas', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(300, NULL, 'default', 'created', 'App\\Models\\City', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(301, NULL, 'default', 'created', 'App\\Models\\Areas', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(302, NULL, 'default', 'created', 'App\\Models\\City', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(303, NULL, 'default', 'created', 'App\\Models\\Areas', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(304, NULL, 'default', 'created', 'App\\Models\\City', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(305, NULL, 'default', 'created', 'App\\Models\\Areas', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(306, NULL, 'default', 'created', 'App\\Models\\City', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(307, NULL, 'default', 'created', 'App\\Models\\Areas', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:22:41', '2023-08-25 15:22:41'),
(308, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 15:24:47', '2023-08-25 15:24:47'),
(309, NULL, 'default', 'created', 'App\\Models\\Areas', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:24:47', '2023-08-25 15:24:47'),
(310, NULL, 'default', 'created', 'App\\Models\\Areas', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:24:47', '2023-08-25 15:24:47'),
(311, NULL, 'default', 'created', 'App\\Models\\Areas', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:24:47', '2023-08-25 15:24:47'),
(312, NULL, 'default', 'created', 'App\\Models\\Areas', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:24:47', '2023-08-25 15:24:47'),
(313, NULL, 'default', 'created', 'App\\Models\\Areas', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:24:47', '2023-08-25 15:24:47'),
(314, NULL, 'default', 'created', 'App\\Models\\Areas', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:24:47', '2023-08-25 15:24:47'),
(315, NULL, 'default', 'created', 'App\\Models\\Areas', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:24:47', '2023-08-25 15:24:47'),
(316, NULL, 'default', 'created', 'App\\Models\\Areas', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:24:47', '2023-08-25 15:24:47'),
(317, NULL, 'default', 'created', 'App\\Models\\Areas', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:24:47', '2023-08-25 15:24:47'),
(318, NULL, 'default', 'created', 'App\\Models\\Areas', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 15:24:47', '2023-08-25 15:24:47'),
(319, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-25 15:29:57', '2023-08-25 15:29:57'),
(320, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-25 15:29:57', '2023-08-25 15:29:57'),
(321, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-25 15:29:57', '2023-08-25 15:29:57'),
(322, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-25 15:29:57', '2023-08-25 15:29:57'),
(323, NULL, 'default', 'created', 'App\\Models\\User', 47, NULL, NULL, '{\"attributes\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"82001123212\",\"address\":null,\"status\":\"1\"}}', '2023-08-25 16:34:10', '2023-08-25 16:34:10'),
(324, NULL, 'default', 'updated', 'App\\Models\\User', 47, NULL, NULL, '{\"attributes\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"82001123212\",\"address\":null,\"status\":\"1\"},\"old\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"82001123212\",\"address\":null,\"status\":\"1\"}}', '2023-08-25 16:34:50', '2023-08-25 16:34:50'),
(325, NULL, 'default', 'created', 'App\\Models\\City', 6, NULL, NULL, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 16:34:50', '2023-08-25 16:34:50'),
(326, NULL, 'default', 'created', 'App\\Models\\City', 7, NULL, NULL, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-25 16:34:50', '2023-08-25 16:34:50'),
(327, NULL, 'default', 'created', 'App\\Models\\City', 8, NULL, NULL, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-25 16:34:50', '2023-08-25 16:34:50'),
(328, NULL, 'default', 'created', 'App\\Models\\City', 9, NULL, NULL, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-25 16:34:50', '2023-08-25 16:34:50'),
(329, NULL, 'default', 'created', 'App\\Models\\City', 10, NULL, NULL, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-25 16:34:50', '2023-08-25 16:34:50'),
(330, NULL, 'default', 'created', 'App\\Models\\User', 48, NULL, NULL, '{\"attributes\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"5465465465\",\"address\":null,\"status\":\"1\"}}', '2023-08-25 16:38:11', '2023-08-25 16:38:11'),
(331, NULL, 'default', 'updated', 'App\\Models\\User', 48, NULL, NULL, '{\"attributes\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"5465465465\",\"address\":null,\"status\":\"1\"},\"old\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"5465465465\",\"address\":null,\"status\":\"1\"}}', '2023-08-25 16:43:25', '2023-08-25 16:43:25'),
(332, NULL, 'default', 'created', 'App\\Models\\City', 11, NULL, NULL, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-25 16:43:25', '2023-08-25 16:43:25'),
(333, NULL, 'default', 'created', 'App\\Models\\City', 12, NULL, NULL, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-25 16:43:25', '2023-08-25 16:43:25'),
(334, NULL, 'default', 'created', 'App\\Models\\City', 13, NULL, NULL, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-25 16:43:25', '2023-08-25 16:43:25'),
(335, NULL, 'default', 'created', 'App\\Models\\City', 14, NULL, NULL, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-25 16:43:25', '2023-08-25 16:43:25'),
(336, NULL, 'default', 'created', 'App\\Models\\City', 15, NULL, NULL, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-25 16:43:25', '2023-08-25 16:43:25'),
(337, NULL, 'default', 'updated', 'App\\Models\\User', 48, NULL, NULL, '{\"attributes\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"5465465465\",\"address\":null,\"status\":\"1\"},\"old\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"5465465465\",\"address\":null,\"status\":\"1\"}}', '2023-08-25 16:43:30', '2023-08-25 16:43:30'),
(338, NULL, 'default', 'created', 'App\\Models\\Areas', 11, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 17:04:41', '2023-08-25 17:04:41'),
(339, NULL, 'default', 'created', 'App\\Models\\Areas', 12, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 17:04:41', '2023-08-25 17:04:41'),
(340, NULL, 'default', 'created', 'App\\Models\\Areas', 13, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 17:04:41', '2023-08-25 17:04:41'),
(341, NULL, 'default', 'created', 'App\\Models\\Areas', 14, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 17:04:41', '2023-08-25 17:04:41'),
(342, NULL, 'default', 'created', 'App\\Models\\Areas', 15, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 17:04:41', '2023-08-25 17:04:41'),
(343, NULL, 'default', 'created', 'App\\Models\\Areas', 16, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 17:04:41', '2023-08-25 17:04:41'),
(344, NULL, 'default', 'created', 'App\\Models\\Areas', 17, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 17:04:41', '2023-08-25 17:04:41'),
(345, NULL, 'default', 'created', 'App\\Models\\Areas', 18, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 17:04:41', '2023-08-25 17:04:41'),
(346, NULL, 'default', 'created', 'App\\Models\\Areas', 19, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 17:04:41', '2023-08-25 17:04:41'),
(347, NULL, 'default', 'created', 'App\\Models\\Areas', 20, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-25 17:04:41', '2023-08-25 17:04:41'),
(348, NULL, 'default', 'created', 'App\\Models\\City', 16, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Mumbai\"}}', '2023-08-25 17:48:25', '2023-08-25 17:48:25'),
(349, NULL, 'default', 'created', 'App\\Models\\City', 17, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nashik\"}}', '2023-08-25 17:48:25', '2023-08-25 17:48:25'),
(350, NULL, 'default', 'created', 'App\\Models\\City', 18, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Aurangabad\"}}', '2023-08-25 17:48:25', '2023-08-25 17:48:25'),
(351, NULL, 'default', 'created', 'App\\Models\\City', 19, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Nagpur\"}}', '2023-08-25 17:48:25', '2023-08-25 17:48:25'),
(352, NULL, 'default', 'created', 'App\\Models\\City', 20, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Solapur\"}}', '2023-08-25 17:48:25', '2023-08-25 17:48:25'),
(353, NULL, 'default', 'created', 'App\\Models\\City', 21, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Jodhpur\"}}', '2023-08-25 17:48:30', '2023-08-25 17:48:30'),
(354, NULL, 'default', 'created', 'App\\Models\\City', 22, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Jaipur\"}}', '2023-08-25 17:48:30', '2023-08-25 17:48:30'),
(355, NULL, 'default', 'created', 'App\\Models\\City', 23, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Udaipur\"}}', '2023-08-25 17:48:30', '2023-08-25 17:48:30'),
(356, NULL, 'default', 'created', 'App\\Models\\City', 24, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bikaner\"}}', '2023-08-25 17:48:30', '2023-08-25 17:48:30'),
(357, NULL, 'default', 'created', 'App\\Models\\City', 25, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ajmer\"}}', '2023-08-25 17:48:30', '2023-08-25 17:48:30'),
(358, NULL, 'default', 'created', 'App\\Models\\Areas', 21, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Pimplad\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-25 17:49:02', '2023-08-25 17:49:02'),
(359, NULL, 'default', 'created', 'App\\Models\\Areas', 22, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Wadgaon\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-25 17:49:02', '2023-08-25 17:49:02'),
(360, NULL, 'default', 'created', 'App\\Models\\Areas', 23, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Umrala\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-25 17:49:02', '2023-08-25 17:49:02'),
(361, NULL, 'default', 'created', 'App\\Models\\Areas', 24, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Wadala\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-25 17:49:02', '2023-08-25 17:49:02'),
(362, NULL, 'default', 'created', 'App\\Models\\Areas', 25, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Devlali Bazar\",\"city_id\":\"7\",\"state_id\":\"2\",\"status\":\"1\"}}', '2023-08-25 17:49:02', '2023-08-25 17:49:02'),
(363, NULL, 'default', 'created', 'App\\Models\\City', 26, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Kochi\"}}', '2023-08-25 18:41:41', '2023-08-25 18:41:41'),
(364, NULL, 'default', 'created', 'App\\Models\\City', 27, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Tituvantapuram\"}}', '2023-08-25 18:41:55', '2023-08-25 18:41:55'),
(365, 39, 'default', 'created', 'App\\Models\\Projects', 10, 'App\\Models\\User', 39, '[]', '2023-08-25 18:52:13', '2023-08-25 18:52:13'),
(366, 39, 'default', 'created', 'App\\Models\\Projects', 11, 'App\\Models\\User', 39, '[]', '2023-08-25 19:42:50', '2023-08-25 19:42:50'),
(367, 39, 'default', 'created', 'App\\Models\\Projects', 12, 'App\\Models\\User', 39, '[]', '2023-08-25 19:44:54', '2023-08-25 19:44:54'),
(368, 39, 'default', 'created', 'App\\Models\\Projects', 13, 'App\\Models\\User', 39, '[]', '2023-08-25 19:49:46', '2023-08-25 19:49:46'),
(369, 39, 'default', 'created', 'App\\Models\\Projects', 14, 'App\\Models\\User', 39, '[]', '2023-08-25 20:25:06', '2023-08-25 20:25:06'),
(370, 39, 'default', 'created', 'App\\Models\\Projects', 15, 'App\\Models\\User', 39, '[]', '2023-08-25 20:26:14', '2023-08-25 20:26:14'),
(371, 39, 'default', 'created', 'App\\Models\\Projects', 16, 'App\\Models\\User', 39, '[]', '2023-08-25 20:28:35', '2023-08-25 20:28:35'),
(372, 39, 'default', 'created', 'App\\Models\\Projects', 17, 'App\\Models\\User', 39, '[]', '2023-08-25 20:32:23', '2023-08-25 20:32:23'),
(373, 39, 'default', 'created', 'App\\Models\\Projects', 18, 'App\\Models\\User', 39, '[]', '2023-08-25 20:39:23', '2023-08-25 20:39:23'),
(374, 39, 'default', 'created', 'App\\Models\\Projects', 19, 'App\\Models\\User', 39, '[]', '2023-08-25 20:42:20', '2023-08-25 20:42:20'),
(375, 39, 'default', 'created', 'App\\Models\\Projects', 20, 'App\\Models\\User', 39, '[]', '2023-08-26 05:34:02', '2023-08-26 05:34:02'),
(376, 39, 'default', 'created', 'App\\Models\\Projects', 21, 'App\\Models\\User', 39, '[]', '2023-08-26 05:34:58', '2023-08-26 05:34:58'),
(377, 39, 'default', 'created', 'App\\Models\\Projects', 22, 'App\\Models\\User', 39, '[]', '2023-08-26 05:43:44', '2023-08-26 05:43:44'),
(378, NULL, 'default', 'created', 'App\\Models\\Areas', 26, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Shastri nagar\",\"city_id\":\"11\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-26 06:20:20', '2023-08-26 06:20:20'),
(379, NULL, 'default', 'updated', 'App\\Models\\Areas', 26, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Shastri nagar\",\"city_id\":\"11\",\"state_id\":\"1\",\"status\":\"0\"},\"old\":{\"name\":\"Shastri nagar\",\"city_id\":\"11\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-26 06:20:29', '2023-08-26 06:20:29'),
(380, NULL, 'default', 'created', 'App\\Models\\State', 8, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-26 06:36:59', '2023-08-26 06:36:59'),
(381, NULL, 'default', 'created', 'App\\Models\\State', 9, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Maharashtra\"}}', '2023-08-26 06:42:45', '2023-08-26 06:42:45'),
(382, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-26 06:44:29', '2023-08-26 06:44:29'),
(383, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-26 06:44:29', '2023-08-26 06:44:29'),
(384, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-26 06:44:29', '2023-08-26 06:44:29'),
(385, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-26 06:44:29', '2023-08-26 06:44:29'),
(386, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 48, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-26 06:44:29', '2023-08-26 06:44:29'),
(387, NULL, 'default', 'created', 'App\\Models\\City', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-26 06:58:07', '2023-08-26 06:58:07'),
(388, NULL, 'default', 'created', 'App\\Models\\City', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-26 06:58:07', '2023-08-26 06:58:07'),
(389, NULL, 'default', 'created', 'App\\Models\\City', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-26 06:58:07', '2023-08-26 06:58:07'),
(390, NULL, 'default', 'created', 'App\\Models\\City', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-26 06:58:07', '2023-08-26 06:58:07'),
(391, NULL, 'default', 'created', 'App\\Models\\City', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-26 06:58:07', '2023-08-26 06:58:07'),
(392, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-26 07:32:50', '2023-08-26 07:32:50'),
(393, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-26 07:32:50', '2023-08-26 07:32:50'),
(394, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-26 07:32:50', '2023-08-26 07:32:50'),
(395, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-26 07:32:50', '2023-08-26 07:32:50'),
(396, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-26 07:32:50', '2023-08-26 07:32:50'),
(397, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-26 07:33:32', '2023-08-26 07:33:32'),
(398, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-26 07:33:32', '2023-08-26 07:33:32'),
(399, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-26 07:33:32', '2023-08-26 07:33:32'),
(400, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-26 07:33:32', '2023-08-26 07:33:32'),
(401, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-26 07:33:32', '2023-08-26 07:33:32'),
(402, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-26 07:35:00', '2023-08-26 07:35:00'),
(403, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-26 07:35:00', '2023-08-26 07:35:00'),
(404, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-26 07:35:00', '2023-08-26 07:35:00'),
(405, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-26 07:35:00', '2023-08-26 07:35:00'),
(406, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-26 07:35:00', '2023-08-26 07:35:00'),
(407, NULL, 'default', 'created', 'App\\Models\\State', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gujarat\"}}', '2023-08-26 07:58:03', '2023-08-26 07:58:03'),
(408, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-26 07:58:03', '2023-08-26 07:58:03'),
(409, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-26 07:58:03', '2023-08-26 07:58:03'),
(410, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-26 07:58:03', '2023-08-26 07:58:03'),
(411, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-26 07:58:03', '2023-08-26 07:58:03'),
(412, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-26 07:58:03', '2023-08-26 07:58:03'),
(413, NULL, 'default', 'created', 'App\\Models\\City', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-26 09:21:13', '2023-08-26 09:21:13'),
(414, NULL, 'default', 'created', 'App\\Models\\Areas', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-26 09:21:13', '2023-08-26 09:21:13'),
(415, NULL, 'default', 'created', 'App\\Models\\Areas', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-26 09:21:13', '2023-08-26 09:21:13'),
(416, NULL, 'default', 'created', 'App\\Models\\Areas', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-26 09:21:13', '2023-08-26 09:21:13'),
(417, NULL, 'default', 'created', 'App\\Models\\Areas', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-26 09:21:13', '2023-08-26 09:21:13'),
(418, NULL, 'default', 'created', 'App\\Models\\Areas', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-26 09:21:13', '2023-08-26 09:21:13'),
(419, NULL, 'default', 'created', 'App\\Models\\Areas', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-26 09:21:13', '2023-08-26 09:21:13'),
(420, NULL, 'default', 'created', 'App\\Models\\Areas', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-26 09:21:13', '2023-08-26 09:21:13'),
(421, NULL, 'default', 'created', 'App\\Models\\Areas', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-26 09:21:13', '2023-08-26 09:21:13'),
(422, NULL, 'default', 'created', 'App\\Models\\Areas', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-26 09:21:13', '2023-08-26 09:21:13'),
(423, NULL, 'default', 'created', 'App\\Models\\Areas', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-26 09:21:13', '2023-08-26 09:21:13'),
(424, 39, 'default', 'created', 'App\\Models\\Enquiries', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"bharat\",\"client_mobile\":\"12313123\",\"client_email\":\"bh@mail.com\",\"is_nri\":\"1\",\"enquiry_for\":\"Both\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"12313\",\"area_to\":\"123131\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"32\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"2,31,321\",\"budget_to\":\"1,23,13,132\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"14\\\",\\\"20\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"4\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"sadad\\\",\\\"23131\\\",\\\"Contactable\\\",0]]\",\"telephonic_discussion\":\"q4eqwe\",\"highlights\":null,\"enquiry_city_id\":\"6\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-26 18:15:00', '2023-08-26 18:15:00'),
(425, 39, 'default', 'created', 'App\\Models\\Enquiries', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"nirbhay\",\"client_mobile\":\"342342423\",\"client_email\":\"nir@mail.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Both\",\"requirement_type\":\"85\",\"property_type\":\"260\",\"configuration\":\"[\\\"4\\\"]\",\"area_from\":\"21313132\",\"area_to\":\"2131331\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"32\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"23,13,131\",\"budget_to\":\"23,23,123\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"20\\\"]\",\"enquiry_status\":null,\"project_status\":\"71\",\"area_ids\":\"[\\\"4\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"sadad\\\",\\\"234232\\\",\\\"Contactable\\\",0]]\",\"telephonic_discussion\":\"23qe\",\"highlights\":null,\"enquiry_city_id\":\"4\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-26 18:16:07', '2023-08-26 18:16:07'),
(426, 39, 'default', 'created', 'App\\Models\\Enquiries', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Hema\",\"client_mobile\":\"3123123242\",\"client_email\":\"em@mail.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Both\",\"requirement_type\":\"85\",\"property_type\":\"261\",\"configuration\":\"[\\\"7\\\"]\",\"area_from\":\"2313\",\"area_to\":\"231231\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"2,313\",\"budget_to\":\"24,232\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"15\\\",\\\"11\\\"]\",\"enquiry_status\":null,\"project_status\":\"71\",\"area_ids\":\"[\\\"10\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"dsda\\\",\\\"5675765\\\",\\\"Contactable\\\",0],[\\\"sdsd\\\",\\\"2342424324\\\",\\\"Contactable\\\",0]]\",\"telephonic_discussion\":\"dsadads\",\"highlights\":null,\"enquiry_city_id\":\"2\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-26 18:19:05', '2023-08-26 18:19:05'),
(427, 39, 'default', 'created', 'App\\Models\\Enquiries', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Rishi\",\"client_mobile\":\"23131\",\"client_email\":\"rishi@mail.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"262\",\"configuration\":\"[\\\"10\\\"]\",\"area_from\":\"123131\",\"area_to\":\"231313\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"32\",\"furnished_status\":\"[]\",\"budget_from\":\"34,22,423\",\"budget_to\":\"4,32,42,423\",\"purpose\":\"Investment\",\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"sdada\\\",\\\"3424242\\\",\\\"Contactable\\\",0],[\\\"werrwer\\\",\\\"23131312\\\",\\\"Contactable\\\",0]]\",\"telephonic_discussion\":\"sfdsfds\",\"highlights\":null,\"enquiry_city_id\":\"6\",\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-26 18:23:56', '2023-08-26 18:23:56'),
(428, 39, 'default', 'created', 'App\\Models\\Enquiries', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Shekha\",\"client_mobile\":\"131232323\",\"client_email\":\"sh@mail.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Both\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"22\\\"]\",\"area_from\":\"23131\",\"area_to\":\"2331321\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"32\",\"furnished_status\":\"[\\\"108\\\"]\",\"budget_from\":\"2,31,31,21,33,232\",\"budget_to\":\"1,23,13,131\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"11\\\"]\",\"enquiry_status\":null,\"project_status\":\"71\",\"area_ids\":\"[\\\"10\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"fsdas\\\",\\\"32342343242\\\",\\\"Contactable\\\",0]]\",\"telephonic_discussion\":\"asdad\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-26 18:25:38', '2023-08-26 18:25:38'),
(429, 39, 'default', 'created', 'App\\Models\\Enquiries', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"mhan\",\"client_mobile\":\"32342343242\",\"client_email\":\"mh@mail.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Both\",\"requirement_type\":\"87\",\"property_type\":\"254\",\"configuration\":\"[\\\"13\\\"]\",\"area_from\":\"132311\",\"area_to\":\"123131\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"32\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"23,21,321\",\"budget_to\":\"23,21,31,312\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"20\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"asdds\\\",\\\"32342343242\\\",\\\"Contactable\\\",0]]\",\"telephonic_discussion\":\"dsdsa\",\"highlights\":null,\"enquiry_city_id\":\"2\",\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-26 18:26:40', '2023-08-26 18:26:40'),
(430, 39, 'default', 'created', 'App\\Models\\Enquiries', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Jayesh\",\"client_mobile\":\"32342343242\",\"client_email\":\"jy@mail.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Both\",\"requirement_type\":\"87\",\"property_type\":\"256\",\"configuration\":\"null\",\"area_from\":\"231\",\"area_to\":\"223\",\"area_from_measurement\":\"46\",\"area_to_measurement\":\"46\",\"enquiry_source\":\"32\",\"furnished_status\":\"[\\\"108\\\"]\",\"budget_from\":\"21,31,312\",\"budget_to\":\"23,13,12,313\",\"purpose\":\"Own Use\",\"building_id\":\"[\\\"8\\\"]\",\"enquiry_status\":null,\"project_status\":\"71\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"asda\\\",\\\"32342343242\\\",\\\"Contactable\\\",0]]\",\"telephonic_discussion\":\"werwr\",\"highlights\":null,\"enquiry_city_id\":\"6\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-26 18:27:45', '2023-08-26 18:27:45'),
(431, 39, 'default', 'created', 'App\\Models\\Enquiries', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"john\",\"client_mobile\":\"32342343242\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Both\",\"requirement_type\":\"87\",\"property_type\":\"257\",\"configuration\":\"[\\\"14\\\"]\",\"area_from\":\"231232\",\"area_to\":\"4564\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"2,342\",\"budget_to\":\"2,32,32,323\",\"purpose\":\"Own Use\",\"building_id\":\"[\\\"15\\\",\\\"12\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"dasd\\\",\\\"32342343242\\\",\\\"\\\",0],[\\\"sdasd\\\",\\\"323423432423\\\",\\\"Contactable\\\",0]]\",\"telephonic_discussion\":\"sdad\",\"highlights\":null,\"enquiry_city_id\":\"6\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-26 18:28:37', '2023-08-26 18:28:37'),
(432, 39, 'default', 'created', 'App\\Models\\Projects', 1, 'App\\Models\\User', 39, '[]', '2023-08-28 13:23:55', '2023-08-28 13:23:55'),
(433, 39, 'default', 'created', 'App\\Models\\Enquiries', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Villa\",\"client_mobile\":\"1324567895\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"15\\\"]\",\"area_from\":\"1000\",\"area_to\":\"5000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"106\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"5,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"shyam\\\",\\\"4564564565\\\",\\\"\\\",0]]\",\"telephonic_discussion\":\"2bhk villa\",\"highlights\":null,\"enquiry_city_id\":\"1\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 13:27:21', '2023-08-28 13:27:21'),
(434, 39, 'default', 'created', 'App\\Models\\Enquiries', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"flate\",\"client_mobile\":\"456456455\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"254\",\"configuration\":\"[\\\"16\\\"]\",\"area_from\":\"10000\",\"area_to\":\"5000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"7,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"flat\\\",\\\"1234123421\\\",\\\"\\\",0]]\",\"telephonic_discussion\":\"flate\",\"highlights\":null,\"enquiry_city_id\":\"1\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 13:33:23', '2023-08-28 13:33:23'),
(435, 39, 'default', 'created', 'App\\Models\\Projects', 2, 'App\\Models\\User', 39, '[]', '2023-08-28 13:35:08', '2023-08-28 13:35:08'),
(436, 39, 'default', 'updated', 'App\\Models\\Enquiries', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"flate\",\"client_mobile\":\"456456455\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"254\",\"configuration\":\"[\\\"16\\\"]\",\"area_from\":\"1000\",\"area_to\":\"5000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"7,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"flat\\\",\\\"1234123421\\\",\\\"\\\",0]]\",\"telephonic_discussion\":\"flate\",\"highlights\":null,\"enquiry_city_id\":\"1\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"flate\",\"client_mobile\":\"456456455\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"254\",\"configuration\":\"[\\\"16\\\"]\",\"area_from\":\"10000\",\"area_to\":\"5000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"7,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"flat\\\",\\\"1234123421\\\",\\\"\\\",0]]\",\"telephonic_discussion\":\"flate\",\"highlights\":null,\"enquiry_city_id\":\"1\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 13:35:37', '2023-08-28 13:35:37'),
(437, 39, 'default', 'created', 'App\\Models\\Projects', 3, 'App\\Models\\User', 39, '[]', '2023-08-28 13:39:44', '2023-08-28 13:39:44');
INSERT INTO `activity_log` (`id`, `user_id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(438, 39, 'default', 'created', 'App\\Models\\Enquiries', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"landplot\",\"client_mobile\":\"1231231232\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Both\",\"requirement_type\":\"87\",\"property_type\":\"256\",\"configuration\":\"null\",\"area_from\":\"1000\",\"area_to\":\"7000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"108\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"7,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":\"71\",\"area_ids\":\"[\\\"4\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"qwe\\\",\\\"123\\\",\\\"\\\",0]]\",\"telephonic_discussion\":\"land\",\"highlights\":null,\"enquiry_city_id\":\"6\",\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 13:41:02', '2023-08-28 13:41:02'),
(439, 39, 'default', 'created', 'App\\Models\\Projects', 4, 'App\\Models\\User', 39, '[]', '2023-08-28 15:52:57', '2023-08-28 15:52:57'),
(440, 39, 'default', 'created', 'App\\Models\\Enquiries', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Penthouse\",\"client_mobile\":\"123123122\",\"client_email\":\"pent@mail.com\",\"is_nri\":\"1\",\"enquiry_for\":\"Both\",\"requirement_type\":\"87\",\"property_type\":\"257\",\"configuration\":\"[\\\"18\\\"]\",\"area_from\":\"10000\",\"area_to\":\"80000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"32\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"10,00,000\",\"budget_to\":\"80,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"3\\\"]\",\"enquiry_status\":null,\"project_status\":\"71\",\"area_ids\":\"[\\\"5\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"plot\\\",\\\"123412312\\\",\\\"Contactable\\\",0]]\",\"telephonic_discussion\":\"penthouse\",\"highlights\":null,\"enquiry_city_id\":\"1\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 15:55:18', '2023-08-28 15:55:18'),
(441, 39, 'default', 'created', 'App\\Models\\Projects', 5, 'App\\Models\\User', 39, '[]', '2023-08-28 15:59:33', '2023-08-28 15:59:33'),
(442, 39, 'default', 'created', 'App\\Models\\Enquiries', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"farmhouse\",\"client_mobile\":\"1234123412\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Both\",\"requirement_type\":\"87\",\"property_type\":\"258\",\"configuration\":\"null\",\"area_from\":\"1000\",\"area_to\":\"5000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"5,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"2\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"farm\\\",\\\"1234123412\\\",\\\"Contactable\\\",0]]\",\"telephonic_discussion\":\"farm\",\"highlights\":null,\"enquiry_city_id\":\"6\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 16:00:52', '2023-08-28 16:00:52'),
(443, 39, 'default', 'created', 'App\\Models\\Projects', 6, 'App\\Models\\User', 39, '[]', '2023-08-28 16:12:54', '2023-08-28 16:12:54'),
(444, 39, 'default', 'created', 'App\\Models\\Enquiries', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Office Space\",\"client_mobile\":\"1231231232\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Both\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"5000\",\"area_to\":\"10000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"5,00,000\",\"budget_to\":\"10,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"2\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"asdf\\\",\\\"12341234\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"office space\",\"highlights\":null,\"enquiry_city_id\":\"2\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 16:14:13', '2023-08-28 16:14:13'),
(445, 39, 'default', 'updated', 'App\\Models\\Enquiries', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Office Space\",\"client_mobile\":\"1231231232\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"4000\",\"area_to\":\"10000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"5,00,000\",\"budget_to\":\"10,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"2\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"asdf\\\",\\\"12341234\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"office space\",\"highlights\":null,\"enquiry_city_id\":\"2\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"Office Space\",\"client_mobile\":\"1231231232\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Both\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"5000\",\"area_to\":\"10000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"5,00,000\",\"budget_to\":\"10,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"2\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"asdf\\\",\\\"12341234\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"office space\",\"highlights\":null,\"enquiry_city_id\":\"2\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 16:17:50', '2023-08-28 16:17:50'),
(446, 39, 'default', 'created', 'App\\Models\\Projects', 7, 'App\\Models\\User', 39, '[]', '2023-08-28 16:28:45', '2023-08-28 16:28:45'),
(447, 39, 'default', 'created', 'App\\Models\\Enquiries', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"retail\",\"client_mobile\":\"1231231232\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"85\",\"property_type\":\"260\",\"configuration\":\"[\\\"4\\\"]\",\"area_from\":\"1000\",\"area_to\":\"9000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"9,50,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"2\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"asddf\\\",\\\"1231231232\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"retail 1stfloor\",\"highlights\":null,\"enquiry_city_id\":\"3\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 16:29:48', '2023-08-28 16:29:48'),
(448, 39, 'default', 'created', 'App\\Models\\Projects', 8, 'App\\Models\\User', 39, '[]', '2023-08-28 16:42:53', '2023-08-28 16:42:53'),
(449, 39, 'default', 'created', 'App\\Models\\Enquiries', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Cold Storage\",\"client_mobile\":\"12389089012\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"261\",\"configuration\":\"[\\\"9\\\"]\",\"area_from\":\"5000\",\"area_to\":\"9000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"3,00,000\",\"budget_to\":\"9,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"3\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"asdf\\\",\\\"12367867812\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"cold storage\",\"highlights\":null,\"enquiry_city_id\":\"1\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 16:44:34', '2023-08-28 16:44:34'),
(450, 39, 'default', 'updated', 'App\\Models\\Enquiries', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Cold Storage\",\"client_mobile\":\"12389089012\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"261\",\"configuration\":\"[\\\"9\\\"]\",\"area_from\":\"5000\",\"area_to\":\"9000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"3,00,000\",\"budget_to\":\"9,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"3\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"asdf\\\",\\\"12367867812\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"cold storage\",\"highlights\":null,\"enquiry_city_id\":\"1\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"Cold Storage\",\"client_mobile\":\"12389089012\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"261\",\"configuration\":\"[\\\"9\\\"]\",\"area_from\":\"5000\",\"area_to\":\"9000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"3,00,000\",\"budget_to\":\"9,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"3\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"asdf\\\",\\\"12367867812\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"cold storage\",\"highlights\":null,\"enquiry_city_id\":\"1\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 16:53:48', '2023-08-28 16:53:48'),
(451, 39, 'default', 'updated', 'App\\Models\\Enquiries', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Cold Storage\",\"client_mobile\":\"12389089012\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"261\",\"configuration\":\"[\\\"9\\\"]\",\"area_from\":\"5000\",\"area_to\":\"10000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"3,00,000\",\"budget_to\":\"9,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"3\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"asdf\\\",\\\"12367867812\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"cold storage\",\"highlights\":null,\"enquiry_city_id\":\"1\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"Cold Storage\",\"client_mobile\":\"12389089012\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"261\",\"configuration\":\"[\\\"9\\\"]\",\"area_from\":\"5000\",\"area_to\":\"9000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"3,00,000\",\"budget_to\":\"9,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"3\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"asdf\\\",\\\"12367867812\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"cold storage\",\"highlights\":null,\"enquiry_city_id\":\"1\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 16:56:12', '2023-08-28 16:56:12'),
(452, 39, 'default', 'created', 'App\\Models\\Enquiries', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"Cold Storage 2\",\"client_mobile\":\"1231232131\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"85\",\"property_type\":\"261\",\"configuration\":\"[\\\"8\\\"]\",\"area_from\":\"1000\",\"area_to\":\"9000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"31\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"5,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"2\\\"]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"6\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"cold storage\\\",\\\"1231231232\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"cold storagesame\",\"highlights\":null,\"enquiry_city_id\":\"1\",\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-28 17:18:36', '2023-08-28 17:18:36'),
(453, NULL, 'default', 'updated', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"},\"old\":{\"name\":\"Gandhinagar\"}}', '2023-08-29 12:14:23', '2023-08-29 12:14:23'),
(454, NULL, 'default', 'updated', 'App\\Models\\City', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"},\"old\":{\"name\":\"Ahmedabad\"}}', '2023-08-29 12:14:34', '2023-08-29 12:14:34'),
(455, NULL, 'default', 'updated', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"},\"old\":{\"name\":\"Bhavnagar\"}}', '2023-08-29 12:14:44', '2023-08-29 12:14:44'),
(456, NULL, 'default', 'updated', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"},\"old\":{\"name\":\"Vadodara\"}}', '2023-08-29 12:14:56', '2023-08-29 12:14:56'),
(457, NULL, 'default', 'updated', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"},\"old\":{\"name\":\"Surat\"}}', '2023-08-29 12:15:00', '2023-08-29 12:15:00'),
(458, NULL, 'default', 'updated', 'App\\Models\\Areas', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ambli\",\"city_id\":\"6\",\"state_id\":\"4\",\"status\":\"1\"},\"old\":{\"name\":\"Ambli\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-29 12:15:21', '2023-08-29 12:15:21'),
(459, NULL, 'default', 'updated', 'App\\Models\\Areas', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bopal\",\"city_id\":\"6\",\"state_id\":\"4\",\"status\":\"1\"},\"old\":{\"name\":\"Bopal\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-29 12:15:27', '2023-08-29 12:15:27'),
(460, NULL, 'default', 'updated', 'App\\Models\\Areas', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"CG Road\",\"city_id\":\"6\",\"state_id\":\"4\",\"status\":\"1\"},\"old\":{\"name\":\"CG Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-29 12:15:34', '2023-08-29 12:15:34'),
(461, NULL, 'default', 'updated', 'App\\Models\\Areas', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Chandkheda\",\"city_id\":\"6\",\"state_id\":\"4\",\"status\":\"1\"},\"old\":{\"name\":\"Chandkheda\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-29 12:15:40', '2023-08-29 12:15:40'),
(462, NULL, 'default', 'updated', 'App\\Models\\Areas', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Navrangpura\",\"city_id\":\"6\",\"state_id\":\"4\",\"status\":\"1\"},\"old\":{\"name\":\"Navrangpura\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-29 12:15:52', '2023-08-29 12:15:52'),
(463, NULL, 'default', 'updated', 'App\\Models\\Areas', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"6\",\"state_id\":\"4\",\"status\":\"1\"},\"old\":{\"name\":\"Prahlad Nagar\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-29 12:16:07', '2023-08-29 12:16:07'),
(464, NULL, 'default', 'updated', 'App\\Models\\Areas', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Satellite City\",\"city_id\":\"6\",\"state_id\":\"4\",\"status\":\"1\"},\"old\":{\"name\":\"Satellite City\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-29 12:16:16', '2023-08-29 12:16:16'),
(465, NULL, 'default', 'updated', 'App\\Models\\Areas', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Science City Road\",\"city_id\":\"6\",\"state_id\":\"4\",\"status\":\"1\"},\"old\":{\"name\":\"Science City Road\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-29 12:16:29', '2023-08-29 12:16:29'),
(466, NULL, 'default', 'updated', 'App\\Models\\Areas', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"SG Highway\",\"city_id\":\"6\",\"state_id\":\"4\",\"status\":\"1\"},\"old\":{\"name\":\"SG Highway\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-29 12:16:35', '2023-08-29 12:16:35'),
(467, NULL, 'default', 'updated', 'App\\Models\\Areas', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"6\",\"state_id\":\"4\",\"status\":\"1\"},\"old\":{\"name\":\"Thaltej\",\"city_id\":\"1\",\"state_id\":\"1\",\"status\":\"1\"}}', '2023-08-29 12:16:40', '2023-08-29 12:16:40'),
(468, NULL, 'default', 'updated', 'App\\Models\\Areas', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Thaltej\",\"city_id\":\"6\",\"state_id\":\"4\",\"status\":\"0\"},\"old\":{\"name\":\"Thaltej\",\"city_id\":\"6\",\"state_id\":\"4\",\"status\":\"1\"}}', '2023-08-29 12:16:51', '2023-08-29 12:16:51'),
(469, NULL, 'default', 'created', 'App\\Models\\State', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gujarat\"}}', '2023-08-29 15:37:05', '2023-08-29 15:37:05'),
(470, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-29 15:37:05', '2023-08-29 15:37:05'),
(471, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-29 15:37:05', '2023-08-29 15:37:05'),
(472, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-29 15:37:05', '2023-08-29 15:37:05'),
(473, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-29 15:37:05', '2023-08-29 15:37:05'),
(474, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-29 15:37:05', '2023-08-29 15:37:05'),
(475, NULL, 'default', 'created', 'App\\Models\\State', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gujarat\"}}', '2023-08-29 15:58:53', '2023-08-29 15:58:53'),
(476, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-29 15:59:09', '2023-08-29 15:59:09'),
(477, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-29 15:59:23', '2023-08-29 15:59:23'),
(478, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-29 15:59:23', '2023-08-29 15:59:23'),
(479, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-29 15:59:23', '2023-08-29 15:59:23'),
(480, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-29 15:59:23', '2023-08-29 15:59:23'),
(481, NULL, 'default', 'created', 'App\\Models\\City', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-29 15:59:23', '2023-08-29 15:59:23'),
(482, NULL, 'default', 'created', 'App\\Models\\State', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gujarat\"}}', '2023-08-29 16:03:36', '2023-08-29 16:03:36'),
(483, NULL, 'default', 'created', 'App\\Models\\City', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-08-29 16:03:36', '2023-08-29 16:03:36'),
(484, NULL, 'default', 'created', 'App\\Models\\City', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-08-29 16:03:36', '2023-08-29 16:03:36'),
(485, NULL, 'default', 'created', 'App\\Models\\City', 3, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-08-29 16:03:36', '2023-08-29 16:03:36'),
(486, NULL, 'default', 'created', 'App\\Models\\City', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-08-29 16:03:36', '2023-08-29 16:03:36'),
(487, NULL, 'default', 'created', 'App\\Models\\City', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-08-29 16:03:36', '2023-08-29 16:03:36'),
(488, 39, 'default', 'created', 'App\\Models\\Projects', 2, 'App\\Models\\User', 39, '[]', '2023-08-30 10:27:28', '2023-08-30 10:27:28'),
(489, 39, 'default', 'created', 'App\\Models\\Enquiries', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"teat\",\"client_mobile\":\"1231231232\",\"client_email\":null,\"is_nri\":0,\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"14\\\"]\",\"area_from\":\"1000\",\"area_to\":\"5000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"5,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"2\\\"]\",\"enquiry_status\":null,\"project_status\":\"71\",\"area_ids\":\"[\\\"14\\\"]\",\"is_preleased\":0,\"no_care_customer\":0,\"other_contacts\":\"[[\\\"asd\\\",\\\"12312313\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"asda\",\"highlights\":null,\"enquiry_city_id\":1,\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-08-31 01:45:29', '2023-08-31 01:45:29'),
(490, 39, 'default', 'created', 'App\\Models\\Projects', 3, 'App\\Models\\User', 39, '[]', '2023-09-01 11:45:13', '2023-09-01 11:45:13'),
(491, 39, 'default', 'created', 'App\\Models\\Projects', 4, 'App\\Models\\User', 39, '[]', '2023-09-01 13:05:40', '2023-09-01 13:05:40'),
(492, 39, 'default', 'created', 'App\\Models\\Projects', 5, 'App\\Models\\User', 39, '[]', '2023-09-05 10:23:57', '2023-09-05 10:23:57'),
(493, 39, 'default', 'updated', 'App\\Models\\Enquiries', 1, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"teat\",\"client_mobile\":\"1231231232\",\"client_email\":null,\"is_nri\":0,\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"14\\\"]\",\"area_from\":\"1000\",\"area_to\":\"5000\",\"area_from_measurement\":\"48\",\"area_to_measurement\":\"48\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"5,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"2\\\"]\",\"enquiry_status\":null,\"project_status\":\"71\",\"area_ids\":\"[\\\"14\\\"]\",\"is_preleased\":0,\"no_care_customer\":0,\"other_contacts\":\"[[\\\"asd\\\",\\\"12312313\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"asda\",\"highlights\":null,\"enquiry_city_id\":1,\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"teat\",\"client_mobile\":\"1231231232\",\"client_email\":null,\"is_nri\":0,\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"14\\\"]\",\"area_from\":\"1000\",\"area_to\":\"5000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"5,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"2\\\"]\",\"enquiry_status\":null,\"project_status\":\"71\",\"area_ids\":\"[\\\"14\\\"]\",\"is_preleased\":0,\"no_care_customer\":0,\"other_contacts\":\"[[\\\"asd\\\",\\\"12312313\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"asda\",\"highlights\":null,\"enquiry_city_id\":1,\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-09-05 12:30:07', '2023-09-05 12:30:07'),
(494, 39, 'default', 'created', 'App\\Models\\Enquiries', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"test\",\"client_mobile\":\"123123132\",\"client_email\":\"test@mail.com\",\"is_nri\":0,\"enquiry_for\":\"Buy\",\"requirement_type\":\"85\",\"property_type\":\"260\",\"configuration\":\"[\\\"3\\\"]\",\"area_from\":\"1000\",\"area_to\":\"5000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"5,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"11\\\"]\",\"is_preleased\":0,\"no_care_customer\":0,\"other_contacts\":\"[[\\\"ada\\\",\\\"1231231232\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"test\",\"highlights\":null,\"enquiry_city_id\":15,\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-09-06 12:36:42', '2023-09-06 12:36:42'),
(495, 39, 'default', 'created', 'App\\Models\\Projects', 6, 'App\\Models\\User', 39, '[]', '2023-09-06 23:24:44', '2023-09-06 23:24:44'),
(496, 8, 'default', 'created', 'App\\Models\\User', 49, 'App\\Models\\User', 8, '{\"attributes\":{\"first_name\":\"Zain\",\"last_name\":\"Warner\",\"email\":null,\"mobile_number\":\"1231231232\",\"address\":\"ahmedabad\",\"status\":1}}', '2023-09-07 22:13:26', '2023-09-07 22:13:26'),
(497, 8, 'default', 'updated', 'App\\Models\\User', 49, 'App\\Models\\User', 8, '{\"attributes\":{\"first_name\":\"Zayn\",\"last_name\":\"Warner\",\"email\":\"zayn@info.co.in\",\"mobile_number\":\"1231231232\",\"address\":\"ahmedabad\",\"status\":1},\"old\":{\"first_name\":\"Zain\",\"last_name\":\"Warner\",\"email\":null,\"mobile_number\":\"1231231232\",\"address\":\"ahmedabad\",\"status\":1}}', '2023-09-07 22:14:14', '2023-09-07 22:14:14'),
(498, 8, 'default', 'updated', 'App\\Models\\User', 49, 'App\\Models\\User', 8, '{\"attributes\":{\"first_name\":\"Zayn\",\"last_name\":\"Warner\",\"email\":\"zayn@mrweb.co.in\",\"mobile_number\":\"1231231232\",\"address\":\"ahmedabad\",\"status\":1},\"old\":{\"first_name\":\"Zayn\",\"last_name\":\"Warner\",\"email\":\"zayn@info.co.in\",\"mobile_number\":\"1231231232\",\"address\":\"ahmedabad\",\"status\":1}}', '2023-09-07 22:14:33', '2023-09-07 22:14:33'),
(499, 8, 'default', 'created', 'App\\Models\\Projects', 7, 'App\\Models\\User', 49, '[]', '2023-09-07 22:30:45', '2023-09-07 22:30:45'),
(500, 8, 'default', 'created', 'App\\Models\\Enquiries', 3, 'App\\Models\\User', 49, '{\"attributes\":{\"client_name\":\"asd\",\"client_mobile\":\"231313\",\"client_email\":null,\"is_nri\":0,\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"14\\\"]\",\"area_from\":\"1000\",\"area_to\":\"5000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"5,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"7\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[]\",\"is_preleased\":0,\"no_care_customer\":0,\"other_contacts\":\"[[\\\"asada\\\",\\\"231212\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"wdsada\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":\"1\",\"employee_id\":\"8\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-09-07 22:32:04', '2023-09-07 22:32:04'),
(501, 39, 'default', 'created', 'App\\Models\\User', 50, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Bharat\",\"last_name\":\"Makvana\",\"email\":\"bharat@mrweb.co.in\",\"mobile_number\":null,\"address\":\"ahd\",\"status\":0}}', '2023-09-10 08:36:17', '2023-09-10 08:36:17'),
(502, 39, 'default', 'created', 'App\\Models\\Enquiries', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"asdad\",\"client_mobile\":\"232312\",\"client_email\":null,\"is_nri\":0,\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"15\\\"]\",\"area_from\":\"1231\",\"area_to\":\"234234\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"2,313\",\"budget_to\":\"2,32,323\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"14\\\"]\",\"is_preleased\":0,\"no_care_customer\":0,\"other_contacts\":\"[[\\\"ddas\\\",\\\"234234\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"sds\",\"highlights\":null,\"enquiry_city_id\":14,\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-09-10 09:15:24', '2023-09-10 09:15:24'),
(503, 39, 'default', 'updated', 'App\\Models\\Enquiries', 2, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"test\",\"client_mobile\":\"123123132\",\"client_email\":\"test@mail.com\",\"is_nri\":0,\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"260\",\"configuration\":\"[\\\"3\\\"]\",\"area_from\":\"1000\",\"area_to\":\"5000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"5,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"11\\\"]\",\"is_preleased\":0,\"no_care_customer\":0,\"other_contacts\":\"[[\\\"ada\\\",\\\"1231231232\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"test\",\"highlights\":null,\"enquiry_city_id\":15,\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"test\",\"client_mobile\":\"123123132\",\"client_email\":\"test@mail.com\",\"is_nri\":0,\"enquiry_for\":\"Buy\",\"requirement_type\":\"85\",\"property_type\":\"260\",\"configuration\":\"[\\\"3\\\"]\",\"area_from\":\"1000\",\"area_to\":\"5000\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"1,00,000\",\"budget_to\":\"5,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"11\\\"]\",\"is_preleased\":0,\"no_care_customer\":0,\"other_contacts\":\"[[\\\"ada\\\",\\\"1231231232\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"test\",\"highlights\":null,\"enquiry_city_id\":15,\"enquiry_branch_id\":null,\"employee_id\":\"50\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-09-10 09:16:52', '2023-09-10 09:16:52'),
(504, 39, 'default', 'updated', 'App\\Models\\Enquiries', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"asdad12\",\"client_mobile\":\"232312\",\"client_email\":null,\"is_nri\":0,\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"15\\\"]\",\"area_from\":\"1231\",\"area_to\":\"234234\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"2,313\",\"budget_to\":\"2,32,323\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"14\\\"]\",\"is_preleased\":0,\"no_care_customer\":0,\"other_contacts\":\"[[\\\"ddas\\\",\\\"234234\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"sds\",\"highlights\":null,\"enquiry_city_id\":14,\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"asdad\",\"client_mobile\":\"232312\",\"client_email\":null,\"is_nri\":0,\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"15\\\"]\",\"area_from\":\"1231\",\"area_to\":\"234234\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"2,313\",\"budget_to\":\"2,32,323\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"14\\\"]\",\"is_preleased\":0,\"no_care_customer\":0,\"other_contacts\":\"[[\\\"ddas\\\",\\\"234234\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"sds\",\"highlights\":null,\"enquiry_city_id\":14,\"enquiry_branch_id\":null,\"employee_id\":\"39\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-09-10 09:18:15', '2023-09-10 09:18:15'),
(505, 39, 'default', 'created', 'App\\Models\\Enquiries', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"sada\",\"client_mobile\":\"34234234\",\"client_email\":null,\"is_nri\":0,\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"21312\",\"area_to\":\"2332\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"2,31,312\",\"budget_to\":\"23,13,12,312\",\"purpose\":null,\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"14\\\"]\",\"is_preleased\":0,\"no_care_customer\":0,\"other_contacts\":\"[[\\\"dsada\\\",\\\"213131\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"sdasda\",\"highlights\":null,\"enquiry_city_id\":4,\"enquiry_branch_id\":null,\"employee_id\":\"50\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-09-10 09:20:23', '2023-09-10 09:20:23'),
(506, 39, 'default', 'updated', 'App\\Models\\User', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Admin\",\"last_name\":\"Test\",\"email\":\"bher@mail.com\",\"mobile_number\":\"09988779988\",\"address\":\"Ahmedabad\",\"status\":1},\"old\":{\"first_name\":\"Admin\",\"last_name\":\"Test\",\"email\":\"admin@mrweb.co.in\",\"mobile_number\":\"9988776655\",\"address\":null,\"status\":1}}', '2023-09-14 12:52:06', '2023-09-14 12:52:06'),
(507, 39, 'default', 'updated', 'App\\Models\\User', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Admin\",\"last_name\":\"Test\",\"email\":\"admin@mrweb.co.in\",\"mobile_number\":\"09988779988\",\"address\":\"Ahmedabad\",\"status\":1},\"old\":{\"first_name\":\"Admin\",\"last_name\":\"Test\",\"email\":\"bher@mail.com\",\"mobile_number\":\"09988779988\",\"address\":\"Ahmedabad\",\"status\":1}}', '2023-09-14 12:56:32', '2023-09-14 12:56:32'),
(508, 39, 'default', 'created', 'App\\Models\\Projects', 8, 'App\\Models\\User', 39, '[]', '2023-09-15 11:41:55', '2023-09-15 11:41:55'),
(509, NULL, 'default', 'created', 'App\\Models\\State', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Kerala\"}}', '2023-09-16 11:37:07', '2023-09-16 11:37:07'),
(510, NULL, 'default', 'created', 'App\\Models\\City', 16, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Veraval\"}}', '2023-09-16 11:37:39', '2023-09-16 11:37:39'),
(511, NULL, 'default', 'created', 'App\\Models\\Areas', 22, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"Adri\",\"city_id\":16,\"state_id\":1,\"status\":0}}', '2023-09-16 11:38:54', '2023-09-16 11:38:54'),
(512, NULL, 'default', 'created', 'App\\Models\\Areas', 23, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"sdr\",\"city_id\":16,\"state_id\":1,\"status\":0}}', '2023-09-16 11:39:36', '2023-09-16 11:39:36'),
(513, 39, 'default', 'updated', 'App\\Models\\User', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Admin\",\"last_name\":\"Test\",\"email\":\"admin@mrweb.co.in\",\"mobile_number\":\"09988779988\",\"address\":\"Ahmedabad\",\"status\":\"1\"},\"old\":{\"first_name\":\"Admin\",\"last_name\":\"Test\",\"email\":\"admin@mrweb.co.in\",\"mobile_number\":\"09988779988\",\"address\":\"Ahmedabad\",\"status\":\"1\"}}', '2023-09-17 08:43:29', '2023-09-17 08:43:29'),
(514, 39, 'default', 'updated', 'App\\Models\\User', 50, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Bharat\",\"last_name\":\"Makvana\",\"email\":\"bharat@mrweb.co.in\",\"mobile_number\":\"546645564654\",\"address\":\"ahd\",\"status\":\"0\"},\"old\":{\"first_name\":\"Bharat\",\"last_name\":\"Makvana\",\"email\":\"bharat@mrweb.co.in\",\"mobile_number\":null,\"address\":\"ahd\",\"status\":\"0\"}}', '2023-09-17 14:55:16', '2023-09-17 14:55:16'),
(515, 39, 'default', 'updated', 'App\\Models\\Projects', 5, 'App\\Models\\User', 39, '[]', '2023-09-17 14:58:45', '2023-09-17 14:58:45'),
(516, 39, 'default', 'created', 'App\\Models\\Enquiries', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":null,\"client_mobile\":null,\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":null,\"property_type\":null,\"configuration\":\"null\",\"area_from\":null,\"area_to\":null,\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":null,\"budget_to\":null,\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"\\\",\\\"\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":null,\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-09-18 17:15:10', '2023-09-18 17:15:10'),
(517, NULL, 'default', 'updated', 'App\\Models\\User', 50, NULL, NULL, '{\"attributes\":{\"first_name\":\"Bharat\",\"last_name\":\"Makvana\",\"email\":\"bharat@mrweb.co.in\",\"mobile_number\":\"546645564654\",\"address\":\"ahd\",\"status\":\"0\"},\"old\":{\"first_name\":\"Bharat\",\"last_name\":\"Makvana\",\"email\":\"bharat@mrweb.co.in\",\"mobile_number\":\"546645564654\",\"address\":\"ahd\",\"status\":\"0\"}}', '2023-09-18 18:03:35', '2023-09-18 18:03:35'),
(518, 39, 'default', 'created', 'App\\Models\\Projects', 36, 'App\\Models\\User', 39, '[]', '2023-09-19 07:51:57', '2023-09-19 07:51:57'),
(519, 39, 'default', 'created', 'App\\Models\\Projects', 37, 'App\\Models\\User', 39, '[]', '2023-09-19 12:59:23', '2023-09-19 12:59:23'),
(520, 39, 'default', 'created', 'App\\Models\\Projects', 38, 'App\\Models\\User', 39, '[]', '2023-09-19 13:07:40', '2023-09-19 13:07:40'),
(521, 39, 'default', 'created', 'App\\Models\\Projects', 39, 'App\\Models\\User', 39, '[]', '2023-09-19 16:11:21', '2023-09-19 16:11:21'),
(522, 39, 'default', 'created', 'App\\Models\\Projects', 40, 'App\\Models\\User', 39, '[]', '2023-09-19 16:51:00', '2023-09-19 16:51:00'),
(523, 39, 'default', 'updated', 'App\\Models\\Enquiries', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"sada\",\"client_mobile\":\"34234234\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"21312\",\"area_to\":\"2332\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"2,31,312\",\"budget_to\":\"23,13,12,312\",\"purpose\":null,\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"14\\\",\\\"40\\\",\\\"1\\\",\\\"34\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"dsada\\\",\\\"213131\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"sdasda\",\"highlights\":null,\"enquiry_city_id\":\"4\",\"enquiry_branch_id\":null,\"employee_id\":\"50\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"sada\",\"client_mobile\":\"34234234\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"21312\",\"area_to\":\"2332\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"2,31,312\",\"budget_to\":\"23,13,12,312\",\"purpose\":null,\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"14\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"dsada\\\",\\\"213131\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"sdasda\",\"highlights\":null,\"enquiry_city_id\":\"4\",\"enquiry_branch_id\":null,\"employee_id\":\"50\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-09-20 06:19:49', '2023-09-20 06:19:49'),
(524, NULL, 'default', 'created', 'App\\Models\\User', 51, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"bhavik12@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-09-20 16:39:25', '2023-09-20 16:39:25'),
(525, NULL, 'default', 'updated', 'App\\Models\\User', 51, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"bhavik12@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"},\"old\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"bhavik12@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-09-20 16:39:42', '2023-09-20 16:39:42'),
(526, NULL, 'default', 'created', 'App\\Models\\User', 52, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"admin@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-09-21 17:21:53', '2023-09-21 17:21:53'),
(527, NULL, 'default', 'updated', 'App\\Models\\User', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"QA\",\"last_name\":\"Test\",\"email\":\"admin@mrweb.co.in\",\"mobile_number\":\"2061390703\",\"address\":\"Ahmedabad\",\"status\":\"1\"},\"old\":{\"first_name\":null,\"last_name\":null,\"email\":\"admin@mrweb.co.in\",\"mobile_number\":null,\"address\":null,\"status\":null}}', '2023-09-21 17:28:57', '2023-09-21 17:28:57'),
(528, NULL, 'default', 'updated', 'App\\Models\\User', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"QA\",\"last_name\":\"Test\",\"email\":\"admin@mrweb.co.in\",\"mobile_number\":\"2061390703\",\"address\":\"Ahmedabad\",\"status\":\"1\"},\"old\":{\"first_name\":null,\"last_name\":null,\"email\":\"admin@mrweb.co.in\",\"mobile_number\":null,\"address\":null,\"status\":null}}', '2023-09-21 17:31:29', '2023-09-21 17:31:29'),
(529, NULL, 'default', 'updated', 'App\\Models\\User', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"QA\",\"last_name\":\"Test\",\"email\":\"admin@mrweb.co.in\",\"mobile_number\":\"2061390703\",\"address\":\"Ahmedabad\",\"status\":\"1\"},\"old\":{\"first_name\":null,\"last_name\":null,\"email\":\"admin@mrweb.co.in\",\"mobile_number\":null,\"address\":null,\"status\":null}}', '2023-09-21 17:33:55', '2023-09-21 17:33:55'),
(530, 39, 'default', 'created', 'App\\Models\\Projects', 41, 'App\\Models\\User', 39, '[]', '2023-09-22 05:12:31', '2023-09-22 05:12:31'),
(531, 39, 'default', 'created', 'App\\Models\\Projects', 42, 'App\\Models\\User', 39, '[]', '2023-09-22 05:40:20', '2023-09-22 05:40:20'),
(532, NULL, 'default', 'created', 'App\\Models\\Areas', 41, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"agol\",\"city_id\":\"1\",\"state_id\":\"7\",\"status\":\"1\"}}', '2023-09-22 06:13:47', '2023-09-22 06:13:47'),
(533, 39, 'default', 'created', 'App\\Models\\Projects', 43, 'App\\Models\\User', 39, '[]', '2023-09-23 10:24:17', '2023-09-23 10:24:17'),
(534, 39, 'default', 'created', 'App\\Models\\Projects', 44, 'App\\Models\\User', 39, '[]', '2023-09-23 10:31:34', '2023-09-23 10:31:34'),
(535, 39, 'default', 'created', 'App\\Models\\Projects', 45, 'App\\Models\\User', 39, '[]', '2023-09-23 10:47:29', '2023-09-23 10:47:29'),
(536, 39, 'default', 'created', 'App\\Models\\Projects', 46, 'App\\Models\\User', 39, '[]', '2023-09-23 11:44:40', '2023-09-23 11:44:40'),
(537, 39, 'default', 'created', 'App\\Models\\Projects', 47, 'App\\Models\\User', 39, '[]', '2023-09-23 11:54:37', '2023-09-23 11:54:37'),
(538, 39, 'default', 'created', 'App\\Models\\Projects', 48, 'App\\Models\\User', 39, '[]', '2023-09-23 12:06:39', '2023-09-23 12:06:39'),
(539, 39, 'default', 'created', 'App\\Models\\Projects', 49, 'App\\Models\\User', 39, '[]', '2023-09-23 12:15:36', '2023-09-23 12:15:36'),
(540, 39, 'default', 'updated', 'App\\Models\\Enquiries', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"sada\",\"client_mobile\":\"34234234\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"21312\",\"area_to\":\"2332\",\"area_from_measurement\":\"118\",\"area_to_measurement\":\"118\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"2,31,312\",\"budget_to\":\"23,13,12,312\",\"purpose\":null,\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"14\\\",\\\"40\\\",\\\"1\\\",\\\"34\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"dsada\\\",\\\"213131\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"sdasda\",\"highlights\":null,\"enquiry_city_id\":\"4\",\"enquiry_branch_id\":null,\"employee_id\":\"50\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"sada\",\"client_mobile\":\"34234234\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"21312\",\"area_to\":\"2332\",\"area_from_measurement\":\"45\",\"area_to_measurement\":\"45\",\"enquiry_source\":\"103\",\"furnished_status\":\"[\\\"107\\\"]\",\"budget_from\":\"2,31,312\",\"budget_to\":\"23,13,12,312\",\"purpose\":null,\"building_id\":\"[\\\"1\\\"]\",\"enquiry_status\":null,\"project_status\":\"70\",\"area_ids\":\"[\\\"14\\\",\\\"40\\\",\\\"1\\\",\\\"34\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"dsada\\\",\\\"213131\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"sdasda\",\"highlights\":null,\"enquiry_city_id\":\"4\",\"enquiry_branch_id\":null,\"employee_id\":\"50\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-09-23 18:45:23', '2023-09-23 18:45:23'),
(541, 39, 'default', 'created', 'App\\Models\\Projects', 50, 'App\\Models\\User', 39, '[]', '2023-09-25 07:43:00', '2023-09-25 07:43:00'),
(542, 39, 'default', 'created', 'App\\Models\\Projects', 51, 'App\\Models\\User', 39, '[]', '2023-09-25 08:05:54', '2023-09-25 08:05:54'),
(543, 39, 'default', 'updated', 'App\\Models\\User', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Admin\",\"last_name\":\"Test\",\"email\":\"admin@mrweb.co.in\",\"mobile_number\":\"09988779988\",\"address\":\"Near civil hospital SG , ahmedabad\",\"status\":\"1\"},\"old\":{\"first_name\":null,\"last_name\":null,\"email\":\"admin@mrweb.co.in\",\"mobile_number\":null,\"address\":null,\"status\":null}}', '2023-09-26 04:02:39', '2023-09-26 04:02:39'),
(544, 39, 'default', 'updated', 'App\\Models\\User', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Admin\",\"last_name\":\"Test\",\"email\":\"admin@mrweb.co.in\",\"mobile_number\":\"09988779988\",\"address\":\"Near civil hospital SG , ahmedabad\",\"status\":\"1\"},\"old\":{\"first_name\":null,\"last_name\":null,\"email\":\"admin@mrweb.co.in\",\"mobile_number\":null,\"address\":null,\"status\":null}}', '2023-09-27 03:48:39', '2023-09-27 03:48:39'),
(545, 39, 'default', 'updated', 'App\\Models\\User', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Admin\",\"last_name\":\"Test\",\"email\":\"admin@mrweb.co.in\",\"mobile_number\":\"09988779988\",\"address\":\"Near civil hospital SG S-1 , ahmedabad\",\"status\":\"1\"},\"old\":{\"first_name\":null,\"last_name\":null,\"email\":\"admin@mrweb.co.in\",\"mobile_number\":null,\"address\":null,\"status\":null}}', '2023-09-27 03:48:47', '2023-09-27 03:48:47');
INSERT INTO `activity_log` (`id`, `user_id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(546, 39, 'default', 'updated', 'App\\Models\\User', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Admin\",\"last_name\":\"Test\",\"email\":\"admin@mrweb.co.in\",\"mobile_number\":\"09988779988\",\"address\":\"Near civil hospital SG S-1 , ahmedabad\",\"status\":\"1\"},\"old\":{\"first_name\":null,\"last_name\":null,\"email\":\"admin@mrweb.co.in\",\"mobile_number\":null,\"address\":null,\"status\":null}}', '2023-09-27 03:48:55', '2023-09-27 03:48:55'),
(547, 39, 'default', 'updated', 'App\\Models\\User', 39, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Admin\",\"last_name\":\"Test\",\"email\":\"admin@mrweb.co.in\",\"mobile_number\":\"09988779988\",\"address\":\"Near civil hospital SG S-1 , ahmedabad\",\"status\":\"1\"},\"old\":{\"first_name\":null,\"last_name\":null,\"email\":\"admin@mrweb.co.in\",\"mobile_number\":null,\"address\":null,\"status\":null}}', '2023-09-27 03:49:03', '2023-09-27 03:49:03'),
(548, NULL, 'default', 'created', 'App\\Models\\Areas', 42, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"chhatral\",\"city_id\":\"1\",\"state_id\":\"7\",\"status\":\"1\"}}', '2023-09-27 07:49:03', '2023-09-27 07:49:03'),
(549, 39, 'default', 'created', 'App\\Models\\Enquiries', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"teste\",\"client_mobile\":\"147852369\",\"client_email\":\"test@gmail.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"2500\",\"area_to\":\"2500\",\"area_from_measurement\":\"118\",\"area_to_measurement\":\"118\",\"enquiry_source\":\"104\",\"furnished_status\":\"[\\\"108\\\"]\",\"budget_from\":\"25,800\",\"budget_to\":\"25,80,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"6\\\"]\",\"enquiry_status\":null,\"project_status\":\"142\",\"area_ids\":\"[\\\"27\\\"]\",\"is_preleased\":\"1\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"testing\\\",\\\"225314702\\\",\\\"undefined\\\",1]]\",\"telephonic_discussion\":\"bhsabhbdh\",\"highlights\":null,\"enquiry_city_id\":\"3\",\"enquiry_branch_id\":\"13\",\"employee_id\":\"50\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-09-27 17:32:26', '2023-09-27 17:32:26'),
(550, NULL, 'default', 'created', 'App\\Models\\Areas', 43, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"vastral\",\"city_id\":\"1\",\"state_id\":\"7\",\"status\":\"1\"}}', '2023-09-28 05:18:43', '2023-09-28 05:18:43'),
(551, NULL, 'default', 'created', 'App\\Models\\User', 62, NULL, NULL, '{\"attributes\":{\"first_name\":\"tester\",\"last_name\":\"testing\",\"email\":\"tester@gmail.com\",\"mobile_number\":\"1596324870\",\"address\":null,\"status\":\"1\"}}', '2023-09-28 18:40:06', '2023-09-28 18:40:06'),
(552, NULL, 'default', 'created', 'App\\Models\\User', 63, NULL, NULL, '{\"attributes\":{\"first_name\":\"tester\",\"last_name\":\"testing\",\"email\":\"tester@gmail.com\",\"mobile_number\":\"1596324870\",\"address\":null,\"status\":\"1\"}}', '2023-09-28 18:41:13', '2023-09-28 18:41:13'),
(553, 39, 'default', 'created', 'App\\Models\\Projects', 52, 'App\\Models\\User', 39, '[]', '2023-09-29 09:18:45', '2023-09-29 09:18:45'),
(554, NULL, 'default', 'created', 'App\\Models\\User', 64, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"askerhema8@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-09-29 16:35:09', '2023-09-29 16:35:09'),
(555, NULL, 'default', 'created', 'App\\Models\\Enquiries', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"teste\",\"client_mobile\":\"147852369\",\"client_email\":\"test@gmail.com\",\"is_nri\":\"1\",\"enquiry_for\":\"rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"1\",\"area_from\":\"2500\",\"area_to\":\"2500\",\"area_from_measurement\":null,\"area_to_measurement\":\"118\",\"enquiry_source\":\"104\",\"furnished_status\":\"[108]\",\"budget_from\":\"25,800\",\"budget_to\":\"25,80,000\",\"purpose\":\"Investment\",\"building_id\":\"[6]\",\"enquiry_status\":null,\"project_status\":\"142\",\"area_ids\":\"[27]\",\"is_preleased\":\"1\",\"no_care_customer\":\"0\",\"other_contacts\":null,\"telephonic_discussion\":\"bhsabhbdh\",\"highlights\":null,\"enquiry_city_id\":\"3\",\"enquiry_branch_id\":\"13\",\"employee_id\":\"50\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-02 16:24:03', '2023-10-02 16:24:03'),
(556, 39, 'default', 'created', 'App\\Models\\Projects', 53, 'App\\Models\\User', 39, '[]', '2023-10-02 19:52:05', '2023-10-02 19:52:05'),
(557, 39, 'default', 'created', 'App\\Models\\Projects', 54, 'App\\Models\\User', 39, '[]', '2023-10-03 07:01:48', '2023-10-03 07:01:48'),
(558, 39, 'default', 'created', 'App\\Models\\Projects', 55, 'App\\Models\\User', 39, '[]', '2023-10-03 07:43:04', '2023-10-03 07:43:04'),
(559, 39, 'default', 'created', 'App\\Models\\Projects', 56, 'App\\Models\\User', 39, '[]', '2023-10-03 07:59:19', '2023-10-03 07:59:19'),
(560, 39, 'default', 'created', 'App\\Models\\Projects', 57, 'App\\Models\\User', 39, '[]', '2023-10-03 08:23:29', '2023-10-03 08:23:29'),
(561, NULL, 'default', 'created', 'App\\Models\\Areas', 44, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"gota\",\"city_id\":\"1\",\"state_id\":\"7\",\"status\":\"1\"}}', '2023-10-04 07:19:30', '2023-10-04 07:19:30'),
(562, NULL, 'default', 'created', 'App\\Models\\Areas', 45, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"virar\",\"city_id\":\"4\",\"state_id\":\"8\",\"status\":\"1\"}}', '2023-10-04 07:39:53', '2023-10-04 07:39:53'),
(563, 39, 'default', 'created', 'App\\Models\\Enquiries', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"chandrababu naidu\",\"client_mobile\":\"5412345\",\"client_email\":\"chandu@naidu.com\",\"is_nri\":\"1\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"1900\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":null,\"budget_to\":null,\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"vangdu\\\",\\\"5432345\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"proper office joie che\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-04 07:42:02', '2023-10-04 07:42:02'),
(564, 39, 'default', 'created', 'App\\Models\\User', 65, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"dharmesh\",\"last_name\":\"patel\",\"email\":null,\"mobile_number\":\"4324323432\",\"address\":\"fef v\",\"status\":\"1\"}}', '2023-10-04 13:03:58', '2023-10-04 13:03:58'),
(565, 39, 'default', 'created', 'App\\Models\\User', 66, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"dharmesh\",\"last_name\":\"patel\",\"email\":null,\"mobile_number\":\"4324323432\",\"address\":\"fef v\",\"status\":\"1\"}}', '2023-10-04 13:04:03', '2023-10-04 13:04:03'),
(566, 39, 'default', 'created', 'App\\Models\\User', 67, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"dharmesh\",\"last_name\":\"patel\",\"email\":null,\"mobile_number\":\"4324323432\",\"address\":\"fef v\",\"status\":\"1\"}}', '2023-10-04 13:04:08', '2023-10-04 13:04:08'),
(567, 39, 'default', 'created', 'App\\Models\\User', 68, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"dharmesh\",\"last_name\":\"patel\",\"email\":null,\"mobile_number\":\"4324323432\",\"address\":\"fef v\",\"status\":\"1\"}}', '2023-10-04 13:04:09', '2023-10-04 13:04:09'),
(568, 39, 'default', 'created', 'App\\Models\\User', 69, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"dharmesh\",\"last_name\":\"patel\",\"email\":null,\"mobile_number\":\"4324323432\",\"address\":\"fef v\",\"status\":\"1\"}}', '2023-10-04 13:04:40', '2023-10-04 13:04:40'),
(569, 39, 'default', 'created', 'App\\Models\\User', 70, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"dharmesh\",\"last_name\":\"patel\",\"email\":null,\"mobile_number\":\"4324323432\",\"address\":\"fef v\",\"status\":\"1\"}}', '2023-10-04 13:04:43', '2023-10-04 13:04:43'),
(570, 39, 'default', 'created', 'App\\Models\\User', 71, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"dharmesh\",\"last_name\":\"patel\",\"email\":null,\"mobile_number\":\"4324323432\",\"address\":\"fef v\",\"status\":\"1\"}}', '2023-10-04 13:04:43', '2023-10-04 13:04:43'),
(571, 39, 'default', 'created', 'App\\Models\\User', 72, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"dharmesh\",\"last_name\":\"patel\",\"email\":null,\"mobile_number\":\"4324323432\",\"address\":\"fef v\",\"status\":\"1\"}}', '2023-10-04 13:04:49', '2023-10-04 13:04:49'),
(572, 39, 'default', 'updated', 'App\\Models\\Enquiries', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"chandrababu naidu\",\"client_mobile\":\"5412345\",\"client_email\":\"chandu@naidu.com\",\"is_nri\":\"1\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"1900\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"70,000\",\"budget_to\":\"90,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"vangdu\\\",\\\"5432345\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"proper office joie che\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"chandrababu naidu\",\"client_mobile\":\"5412345\",\"client_email\":\"chandu@naidu.com\",\"is_nri\":\"1\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"1900\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":null,\"budget_to\":null,\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"vangdu\\\",\\\"5432345\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"proper office joie che\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-04 13:08:49', '2023-10-04 13:08:49'),
(573, 39, 'default', 'created', 'App\\Models\\User', 73, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"raviraj\",\"last_name\":\"chudasama\",\"email\":null,\"mobile_number\":null,\"address\":null,\"status\":\"0\"}}', '2023-10-04 13:09:35', '2023-10-04 13:09:35'),
(574, 39, 'default', 'updated', 'App\\Models\\User', 73, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"raviraj\",\"last_name\":\"chudasama\",\"email\":null,\"mobile_number\":null,\"address\":null,\"status\":\"0\"},\"old\":{\"first_name\":\"raviraj\",\"last_name\":\"chudasama\",\"email\":null,\"mobile_number\":null,\"address\":null,\"status\":\"0\"}}', '2023-10-04 13:10:25', '2023-10-04 13:10:25'),
(575, 39, 'default', 'updated', 'App\\Models\\Enquiries', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"chandrababu naidu\",\"client_mobile\":\"5412345\",\"client_email\":\"chandu@naidu.com\",\"is_nri\":\"1\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"1900\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"70,000\",\"budget_to\":\"90,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"vangdu\\\",\\\"5432345\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"proper office joie che\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":\"69\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"chandrababu naidu\",\"client_mobile\":\"5412345\",\"client_email\":\"chandu@naidu.com\",\"is_nri\":\"1\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"1900\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"70,000\",\"budget_to\":\"90,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"vangdu\\\",\\\"5432345\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"proper office joie che\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-04 13:18:54', '2023-10-04 13:18:54'),
(576, 39, 'default', 'updated', 'App\\Models\\Enquiries', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"chandrababu naidu\",\"client_mobile\":\"5412345\",\"client_email\":\"chandu@naidu.com\",\"is_nri\":\"1\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"1900\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"70,000\",\"budget_to\":\"90,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"vangdu\\\",\\\"5432345\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"proper office joie che\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"chandrababu naidu\",\"client_mobile\":\"5412345\",\"client_email\":\"chandu@naidu.com\",\"is_nri\":\"1\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"1900\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"70,000\",\"budget_to\":\"90,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"vangdu\\\",\\\"5432345\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"proper office joie che\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":\"69\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-04 15:52:19', '2023-10-04 15:52:19'),
(577, 39, 'default', 'created', 'App\\Models\\Enquiries', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"lalu yadav\",\"client_mobile\":\"54334343343\",\"client_email\":\"lalu@ydv.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"260\",\"configuration\":\"[\\\"4\\\",\\\"5\\\"]\",\"area_from\":\"2500\",\"area_to\":\"3200\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[\\\"106\\\",\\\"108\\\"]\",\"budget_from\":\"3,00,000\",\"budget_to\":\"10,00,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"\\\",\\\"\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"jai ganesha\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-04 16:01:29', '2023-10-04 16:01:29'),
(578, NULL, 'default', 'created', 'App\\Models\\Enquiries', 11, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"teste\",\"client_mobile\":\"147852369\",\"client_email\":\"test@gmail.com\",\"is_nri\":\"1\",\"enquiry_for\":\"rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\",\\\"2\\\",\\\"3\\\"]\",\"area_from\":\"2500\",\"area_to\":\"2500\",\"area_from_measurement\":null,\"area_to_measurement\":\"118\",\"enquiry_source\":\"104\",\"furnished_status\":\"[\\\"108\\\",\\\"1\\\"]\",\"budget_from\":\"25,800\",\"budget_to\":\"25,80,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"6\\\"]\",\"enquiry_status\":null,\"project_status\":\"142\",\"area_ids\":\"[\\\"27\\\"]\",\"is_preleased\":\"1\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"test\\\",\\\"91082673645\\\",\\\"1\\\"],[\\\"tester\\\",\\\"6789054321\\\",\\\"0\\\"]]\",\"telephonic_discussion\":\"bhsabhbdh\",\"highlights\":null,\"enquiry_city_id\":\"3\",\"enquiry_branch_id\":\"13\",\"employee_id\":\"50\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-04 17:55:06', '2023-10-04 17:55:06'),
(579, NULL, 'default', 'created', 'App\\Models\\User', 74, NULL, NULL, '{\"attributes\":{\"first_name\":\"Nirbhay\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"8200186326\",\"address\":\"Near pragati nagar garden\",\"status\":\"1\"}}', '2023-10-05 03:33:56', '2023-10-05 03:33:56'),
(580, NULL, 'default', 'created', 'App\\Models\\State', 15, NULL, NULL, '{\"attributes\":{\"name\":\"Gujarat\"}}', '2023-10-05 03:33:56', '2023-10-05 03:33:56'),
(581, NULL, 'default', 'created', 'App\\Models\\City', 12, NULL, NULL, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-10-05 03:33:56', '2023-10-05 03:33:56'),
(582, NULL, 'default', 'created', 'App\\Models\\City', 13, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"test\"}}', '2023-10-05 16:34:09', '2023-10-05 16:34:09'),
(583, NULL, 'default', 'deleted', 'App\\Models\\City', 13, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"test\"}}', '2023-10-05 16:34:32', '2023-10-05 16:34:32'),
(584, NULL, 'default', 'created', 'App\\Models\\City', 14, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"test\"}}', '2023-10-05 16:34:44', '2023-10-05 16:34:44'),
(585, NULL, 'default', 'created', 'App\\Models\\State', 16, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"testing\"}}', '2023-10-05 16:34:50', '2023-10-05 16:34:50'),
(586, NULL, 'default', 'updated', 'App\\Models\\User', 74, NULL, NULL, '{\"attributes\":{\"first_name\":\"Nirbhay\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"8200186326\",\"address\":\"Near pragati nagar garden\",\"status\":\"1\"},\"old\":{\"first_name\":\"Nirbhay\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"8200186326\",\"address\":\"Near pragati nagar garden\",\"status\":\"1\"}}', '2023-10-05 16:51:41', '2023-10-05 16:51:41'),
(587, 39, 'default', 'created', 'App\\Models\\User', 77, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliyank7845@gmail.com\",\"mobile_number\":\"8200186326\",\"address\":\"GJHSG\",\"status\":\"1\"}}', '2023-10-05 16:54:30', '2023-10-05 16:54:30'),
(588, 39, 'default', 'created', 'App\\Models\\User', 78, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliya@gmail.com\",\"mobile_number\":\"6546545\",\"address\":\"JHG\",\"status\":\"1\"}}', '2023-10-05 17:17:55', '2023-10-05 17:17:55'),
(589, 39, 'default', 'created', 'App\\Models\\Enquiries', 12, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":null,\"client_mobile\":null,\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"261\",\"configuration\":\"[\\\"8\\\"]\",\"area_from\":\"1700\",\"area_to\":\"2000\",\"area_from_measurement\":\"119\",\"area_to_measurement\":\"119\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":null,\"budget_to\":null,\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"25\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"tej pratap\\\",\\\"654345676543\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"dadar station ni pase\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-06 06:12:41', '2023-10-06 06:12:41'),
(590, 39, 'default', 'updated', 'App\\Models\\Enquiries', 12, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"rabdi devi\",\"client_mobile\":\"987654345678\",\"client_email\":\"rabdi@bihar.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"261\",\"configuration\":\"[\\\"8\\\"]\",\"area_from\":\"1700\",\"area_to\":\"2000\",\"area_from_measurement\":\"119\",\"area_to_measurement\":\"119\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":null,\"budget_to\":null,\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"25\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"tej pratap\\\",\\\"654345676543\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"dadar station ni pase\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":null,\"client_mobile\":null,\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"261\",\"configuration\":\"[\\\"8\\\"]\",\"area_from\":\"1700\",\"area_to\":\"2000\",\"area_from_measurement\":\"119\",\"area_to_measurement\":\"119\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":null,\"budget_to\":null,\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"25\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"tej pratap\\\",\\\"654345676543\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"dadar station ni pase\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-06 06:13:14', '2023-10-06 06:13:14'),
(591, NULL, 'default', 'created', 'App\\Models\\State', 17, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"State test\"}}', '2023-10-06 06:45:49', '2023-10-06 06:45:49'),
(592, 39, 'default', 'created', 'App\\Models\\Enquiries', 13, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"jay lalita\",\"client_mobile\":\"1234567890\",\"client_email\":\"jay@tn.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"262\",\"configuration\":\"[\\\"10\\\"]\",\"area_from\":\"8000\",\"area_to\":\"10000\",\"area_from_measurement\":\"118\",\"area_to_measurement\":\"118\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"12,00,00,000\",\"budget_to\":\"15,00,00,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"stelin\\\",\\\"523452435\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"stelin will change party\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-06 10:02:28', '2023-10-06 10:02:28'),
(593, 39, 'default', 'created', 'App\\Models\\Enquiries', 14, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"MUTTHU SWAMI\",\"client_mobile\":\"765465435432\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"254\",\"configuration\":\"[\\\"16\\\"]\",\"area_from\":\"1800\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[\\\"106\\\",\\\"108\\\"]\",\"budget_from\":\"25,000\",\"budget_to\":\"1,00,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"13\\\",\\\"4\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"NO OTHER\\\",\\\"0000000000000\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"URGENT JOIE CHE\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-06 11:27:07', '2023-10-06 11:27:07'),
(594, NULL, 'default', 'created', 'App\\Models\\Api\\Areas', 46, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"258963\",\"city_id\":\"13\",\"state_id\":\"14\",\"status\":\"1\"}}', '2023-10-06 15:38:20', '2023-10-06 15:38:20'),
(595, NULL, 'default', 'deleted', 'App\\Models\\Api\\Areas', 46, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"258963\",\"city_id\":\"13\",\"state_id\":\"14\",\"status\":\"1\"}}', '2023-10-06 15:48:32', '2023-10-06 15:48:32'),
(596, NULL, 'default', 'created', 'App\\Models\\State', 18, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"testing\"}}', '2023-10-06 17:38:20', '2023-10-06 17:38:20'),
(597, NULL, 'default', 'deleted', 'App\\Models\\State', 18, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"testing\"}}', '2023-10-06 17:41:10', '2023-10-06 17:41:10'),
(598, NULL, 'default', 'created', 'App\\Models\\City', 15, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"test\"}}', '2023-10-06 18:02:18', '2023-10-06 18:02:18'),
(599, NULL, 'default', 'deleted', 'App\\Models\\City', 14, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"test\"}}', '2023-10-06 18:02:50', '2023-10-06 18:02:50'),
(600, NULL, 'default', 'created', 'App\\Models\\City', 16, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":null}}', '2023-10-06 18:59:28', '2023-10-06 18:59:28'),
(601, NULL, 'default', 'deleted', 'App\\Models\\Enquiries', 11, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"teste\",\"client_mobile\":\"147852369\",\"client_email\":\"test@gmail.com\",\"is_nri\":\"1\",\"enquiry_for\":\"rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\",\\\"2\\\",\\\"3\\\"]\",\"area_from\":\"2500\",\"area_to\":\"2500\",\"area_from_measurement\":null,\"area_to_measurement\":\"118\",\"enquiry_source\":\"104\",\"furnished_status\":\"[\\\"108\\\",\\\"1\\\"]\",\"budget_from\":\"25,800\",\"budget_to\":\"25,80,000\",\"purpose\":\"Investment\",\"building_id\":\"[\\\"6\\\"]\",\"enquiry_status\":null,\"project_status\":\"142\",\"area_ids\":\"[\\\"27\\\"]\",\"is_preleased\":\"1\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"test\\\",\\\"91082673645\\\",\\\"1\\\"],[\\\"tester\\\",\\\"6789054321\\\",\\\"0\\\"]]\",\"telephonic_discussion\":\"bhsabhbdh\",\"highlights\":null,\"enquiry_city_id\":\"3\",\"enquiry_branch_id\":\"13\",\"employee_id\":\"50\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-07 15:52:00', '2023-10-07 15:52:00'),
(602, NULL, 'default', 'created', 'App\\Models\\User', 79, NULL, NULL, '{\"attributes\":{\"first_name\":\"Nux\",\"last_name\":\"Nirbhay\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"8200186326\",\"address\":\"Shastrinagar\",\"status\":\"1\"}}', '2023-10-07 17:27:24', '2023-10-07 17:27:24'),
(603, NULL, 'default', 'created', 'App\\Models\\State', 19, NULL, NULL, '{\"attributes\":{\"name\":\"Gujarat\"}}', '2023-10-07 17:27:24', '2023-10-07 17:27:24'),
(604, NULL, 'default', 'created', 'App\\Models\\City', 17, NULL, NULL, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-10-07 17:27:24', '2023-10-07 17:27:24'),
(605, NULL, 'default', 'created', 'App\\Models\\User', 80, NULL, NULL, '{\"attributes\":{\"first_name\":\"Nux\",\"last_name\":\"Nirbhay\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"8200186326\",\"address\":\"HGSHGDHG\",\"status\":\"1\"}}', '2023-10-07 17:30:09', '2023-10-07 17:30:09'),
(606, NULL, 'default', 'created', 'App\\Models\\State', 20, NULL, NULL, '{\"attributes\":{\"name\":\"Gujarat\"}}', '2023-10-07 17:30:09', '2023-10-07 17:30:09'),
(607, NULL, 'default', 'created', 'App\\Models\\City', 18, NULL, NULL, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-10-07 17:30:09', '2023-10-07 17:30:09'),
(608, NULL, 'default', 'created', 'App\\Models\\User', 81, NULL, NULL, '{\"attributes\":{\"first_name\":\"Niru\",\"last_name\":\"Nux\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"8200186326\",\"address\":\"JHKHK\",\"status\":\"1\"}}', '2023-10-07 17:31:59', '2023-10-07 17:31:59'),
(609, NULL, 'default', 'created', 'App\\Models\\State', 21, NULL, NULL, '{\"attributes\":{\"name\":\"Gujarat\"}}', '2023-10-07 17:31:59', '2023-10-07 17:31:59'),
(610, NULL, 'default', 'created', 'App\\Models\\City', 19, NULL, NULL, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-10-07 17:31:59', '2023-10-07 17:31:59'),
(611, NULL, 'default', 'created', 'App\\Models\\User', 82, NULL, NULL, '{\"attributes\":{\"first_name\":\"Niru\",\"last_name\":\"Nux\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"8200186326\",\"address\":\"JHKHK\",\"status\":\"1\"}}', '2023-10-07 17:36:06', '2023-10-07 17:36:06'),
(612, NULL, 'default', 'created', 'App\\Models\\State', 22, NULL, NULL, '{\"attributes\":{\"name\":\"Gujarat\"}}', '2023-10-07 17:36:06', '2023-10-07 17:36:06'),
(613, NULL, 'default', 'created', 'App\\Models\\City', 20, NULL, NULL, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-10-07 17:36:06', '2023-10-07 17:36:06'),
(614, NULL, 'default', 'deleted', 'App\\Models\\User', 82, NULL, NULL, '{\"attributes\":{\"first_name\":\"Niru\",\"last_name\":\"Nux\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"8200186326\",\"address\":\"JHKHK\",\"status\":\"1\"}}', '2023-10-07 17:36:06', '2023-10-07 17:36:06'),
(615, NULL, 'default', 'created', 'App\\Models\\User', 83, NULL, NULL, '{\"attributes\":{\"first_name\":\"JHJK\",\"last_name\":\"klj\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"1234564\",\"address\":\"JHJH\",\"status\":\"1\"}}', '2023-10-07 17:39:10', '2023-10-07 17:39:10'),
(616, NULL, 'default', 'created', 'App\\Models\\State', 23, NULL, NULL, '{\"attributes\":{\"name\":\"Gujarat\"}}', '2023-10-07 17:39:10', '2023-10-07 17:39:10'),
(617, NULL, 'default', 'created', 'App\\Models\\City', 21, NULL, NULL, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-10-07 17:39:10', '2023-10-07 17:39:10'),
(618, NULL, 'default', 'deleted', 'App\\Models\\User', 83, NULL, NULL, '{\"attributes\":{\"first_name\":\"JHJK\",\"last_name\":\"klj\",\"email\":\"hathaliyank@gmail.com\",\"mobile_number\":\"1234564\",\"address\":\"JHJH\",\"status\":\"1\"}}', '2023-10-07 17:39:10', '2023-10-07 17:39:10'),
(619, 39, 'default', 'created', 'App\\Models\\Enquiries', 15, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"sharad pawar\",\"client_mobile\":\"765432345\",\"client_email\":\"sharad@power.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"16\\\"]\",\"area_from\":\"3500\",\"area_to\":\"4500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"50,000\",\"budget_to\":\"5,00,000\",\"purpose\":\"Investment\",\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"no\\\",\\\"6543245\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"bunglow new joie\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-09 05:51:49', '2023-10-09 05:51:49'),
(620, 39, 'default', 'created', 'App\\Models\\Projects', 58, 'App\\Models\\User', 39, '[]', '2023-10-09 06:14:44', '2023-10-09 06:14:44'),
(621, 39, 'default', 'created', 'App\\Models\\Enquiries', 16, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"c r patil\",\"client_mobile\":\"234552323\",\"client_email\":\"cr@patil.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"257\",\"configuration\":\"[\\\"15\\\",\\\"17\\\"]\",\"area_from\":\"3200\",\"area_to\":\"4000\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"40,000\",\"budget_to\":\"50,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"bhopabhai\\\",\\\"6543454345\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"urgent joie che\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-09 06:16:59', '2023-10-09 06:16:59'),
(622, 39, 'default', 'created', 'App\\Models\\Enquiries', 17, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"rana pratap\",\"client_mobile\":\"4858585885\",\"client_email\":\"chetak@rna.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"258\",\"configuration\":\"null\",\"area_from\":\"5500\",\"area_to\":\"6100\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"30,00,000\",\"budget_to\":\"35,00,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"chittod\\\",\\\"5344545440\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"chittodgarh\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-09 06:32:25', '2023-10-09 06:32:25'),
(623, 39, 'default', 'created', 'App\\Models\\Enquiries', 18, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"narendra sinh\",\"client_mobile\":\"0909876789\",\"client_email\":\"narendra@sinh.in\",\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"1100\",\"area_to\":\"1800\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"50,00,000\",\"budget_to\":\"70,00,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"no other \\\",\\\"6545654465\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"get on first priority\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-09 06:48:09', '2023-10-09 06:48:09'),
(624, 39, 'default', 'updated', 'App\\Models\\Enquiries', 18, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"narendra sinh\",\"client_mobile\":\"0909876789\",\"client_email\":\"narendra@sinh.in\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"1100\",\"area_to\":\"1800\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"0\",\"budget_to\":\"70,00,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"no other \\\",\\\"6545654465\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"get on first priority\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"narendra sinh\",\"client_mobile\":\"0909876789\",\"client_email\":\"narendra@sinh.in\",\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"85\",\"property_type\":\"259\",\"configuration\":\"[\\\"1\\\"]\",\"area_from\":\"1100\",\"area_to\":\"1800\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"50,00,000\",\"budget_to\":\"70,00,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"no other \\\",\\\"6545654465\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"get on first priority\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-09 06:48:30', '2023-10-09 06:48:30'),
(625, NULL, 'default', 'created', 'App\\Models\\User', 84, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"abc13@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-10-09 11:02:52', '2023-10-09 11:02:52'),
(626, NULL, 'default', 'created', 'App\\Models\\User', 85, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"abc1345@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-10-09 11:03:07', '2023-10-09 11:03:07'),
(627, NULL, 'default', 'created', 'App\\Models\\User', 86, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"hedge@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-10-09 11:26:43', '2023-10-09 11:26:43'),
(628, NULL, 'default', 'created', 'App\\Models\\User', 87, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"abc1453@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-10-09 17:02:42', '2023-10-09 17:02:42'),
(629, 39, 'default', 'created', 'App\\Models\\Enquiries', 19, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"anna\",\"client_mobile\":\"98765434567\",\"client_email\":\"anna@tambi.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"85\",\"property_type\":\"260\",\"configuration\":\"[\\\"4\\\",\\\"6\\\"]\",\"area_from\":\"2000\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"1,25,00,000\",\"budget_to\":\"1,40,00,000\",\"purpose\":null,\"building_id\":\"[\\\"50\\\",\\\"47\\\"]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"koi nathi\\\",\\\"3434\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"=\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-10 05:07:05', '2023-10-10 05:07:05'),
(630, 39, 'default', 'updated', 'App\\Models\\Enquiries', 19, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"anna\",\"client_mobile\":\"98765434567\",\"client_email\":\"anna@tambi.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"260\",\"configuration\":\"[\\\"4\\\",\\\"6\\\"]\",\"area_from\":\"2000\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"1,25,00,000\",\"budget_to\":\"1,40,00,000\",\"purpose\":null,\"building_id\":\"[\\\"50\\\",\\\"47\\\"]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"koi nathi\\\",\\\"3434\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"=\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"anna\",\"client_mobile\":\"98765434567\",\"client_email\":\"anna@tambi.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"85\",\"property_type\":\"260\",\"configuration\":\"[\\\"4\\\",\\\"6\\\"]\",\"area_from\":\"2000\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"1,25,00,000\",\"budget_to\":\"1,40,00,000\",\"purpose\":null,\"building_id\":\"[\\\"50\\\",\\\"47\\\"]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"koi nathi\\\",\\\"3434\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"=\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-10 05:07:28', '2023-10-10 05:07:28'),
(631, 39, 'default', 'updated', 'App\\Models\\Enquiries', 19, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"anna\",\"client_mobile\":\"98765434567\",\"client_email\":\"anna@tambi.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"85\",\"property_type\":\"260\",\"configuration\":\"[\\\"4\\\",\\\"6\\\"]\",\"area_from\":\"2000\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"1,25,00,000\",\"budget_to\":\"1,40,00,000\",\"purpose\":null,\"building_id\":\"[\\\"50\\\",\\\"47\\\"]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"koi nathi\\\",\\\"3434\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"=\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"anna\",\"client_mobile\":\"98765434567\",\"client_email\":\"anna@tambi.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"85\",\"property_type\":\"260\",\"configuration\":\"[\\\"4\\\",\\\"6\\\"]\",\"area_from\":\"2000\",\"area_to\":\"2500\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"1,25,00,000\",\"budget_to\":\"1,40,00,000\",\"purpose\":null,\"building_id\":\"[\\\"50\\\",\\\"47\\\"]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"koi nathi\\\",\\\"3434\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"=\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-10 05:08:29', '2023-10-10 05:08:29'),
(632, 39, 'default', 'created', 'App\\Models\\Enquiries', 20, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"jignesh\",\"client_mobile\":\"9987654567\",\"client_email\":null,\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"85\",\"property_type\":\"261\",\"configuration\":\"[\\\"8\\\"]\",\"area_from\":\"5500\",\"area_to\":\"6100\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":null,\"budget_to\":null,\"purpose\":\"Investment\",\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"contaat\\\",\\\"456445\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"contact thato nthi\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-10 05:18:00', '2023-10-10 05:18:00'),
(633, 39, 'default', 'created', 'App\\Models\\Enquiries', 21, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"nitin gadkari\",\"client_mobile\":\"23443343234\",\"client_email\":\"nitin@gadk.sg\",\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"85\",\"property_type\":\"262\",\"configuration\":\"[\\\"10\\\"]\",\"area_from\":\"44747\",\"area_to\":\"63636\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"1,00,00,000\",\"budget_to\":\"1,50,00,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"aerrfw\\\",\\\"43232321\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"fi  jvjr chang  gdi\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-10 05:26:46', '2023-10-10 05:26:46'),
(634, 39, 'default', 'created', 'App\\Models\\Enquiries', 22, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"sanjay\",\"client_mobile\":\"45654565\",\"client_email\":\"sanjay@lila.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"87\",\"property_type\":\"254\",\"configuration\":\"[\\\"15\\\"]\",\"area_from\":\"1400\",\"area_to\":\"1600\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[\\\"106\\\",\\\"107\\\",\\\"108\\\",\\\"109\\\"]\",\"budget_from\":\"50,00,000\",\"budget_to\":\"1,00,00,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"bhansali\\\",\\\"3455243\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"ramlila ase\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-10 05:41:18', '2023-10-10 05:41:18'),
(635, 39, 'default', 'created', 'App\\Models\\Enquiries', 23, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"rama kant\",\"client_mobile\":\"65344345\",\"client_email\":\"rama@kant.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"16\\\"]\",\"area_from\":\"300\",\"area_to\":\"800\",\"area_from_measurement\":\"118\",\"area_to_measurement\":\"118\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":null,\"budget_to\":null,\"purpose\":null,\"building_id\":\"[\\\"55\\\",\\\"42\\\"]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"22\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"achrekr\\\",\\\"65434543454\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"sacbin\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-10 05:58:54', '2023-10-10 05:58:54');
INSERT INTO `activity_log` (`id`, `user_id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(636, 39, 'default', 'updated', 'App\\Models\\Enquiries', 23, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"rama kant\",\"client_mobile\":\"65344345\",\"client_email\":\"rama@kant.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"16\\\"]\",\"area_from\":\"300\",\"area_to\":\"800\",\"area_from_measurement\":\"118\",\"area_to_measurement\":\"118\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"1,00,00,000\",\"budget_to\":\"3,00,00,000\",\"purpose\":null,\"building_id\":\"[\\\"55\\\",\\\"42\\\"]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"22\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"achrekr\\\",\\\"65434543454\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"sacbin\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"rama kant\",\"client_mobile\":\"65344345\",\"client_email\":\"rama@kant.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"87\",\"property_type\":\"255\",\"configuration\":\"[\\\"16\\\"]\",\"area_from\":\"300\",\"area_to\":\"800\",\"area_from_measurement\":\"118\",\"area_to_measurement\":\"118\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":null,\"budget_to\":null,\"purpose\":null,\"building_id\":\"[\\\"55\\\",\\\"42\\\"]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"22\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"achrekr\\\",\\\"65434543454\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"sacbin\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-10 05:59:24', '2023-10-10 05:59:24'),
(637, 39, 'default', 'created', 'App\\Models\\Enquiries', 24, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"virat mahendra\",\"client_mobile\":\"234543\",\"client_email\":\"virat@mahi.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"87\",\"property_type\":\"257\",\"configuration\":\"[\\\"17\\\"]\",\"area_from\":\"3400\",\"area_to\":\"5000\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[\\\"106\\\",\\\"107\\\",\\\"108\\\",\\\"109\\\"]\",\"budget_from\":\"75,00,000\",\"budget_to\":\"1,25,00,000\",\"purpose\":\"Own Use\",\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"36\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"dhoni\\\",\\\"432323323432\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"world cup\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-10 06:06:09', '2023-10-10 06:06:09'),
(638, 39, 'default', 'created', 'App\\Models\\Enquiries', 25, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"hardik pandy\",\"client_mobile\":\"243434\",\"client_email\":\"hardik@pandya.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"87\",\"property_type\":\"256\",\"configuration\":\"null\",\"area_from\":\"1500\",\"area_to\":\"2000\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":null,\"budget_to\":null,\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"7\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"\\\",\\\"\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":null,\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-10 06:47:45', '2023-10-10 06:47:45'),
(639, 39, 'default', 'updated', 'App\\Models\\Enquiries', 25, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"hardik pandy\",\"client_mobile\":\"243434\",\"client_email\":\"hardik@pandya.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"87\",\"property_type\":\"256\",\"configuration\":\"null\",\"area_from\":\"1500\",\"area_to\":\"2000\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":\"60,00,000\",\"budget_to\":\"80,00,000\",\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"7\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"krunal \\\",\\\"534343`\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":\"krunal pandya\",\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null},\"old\":{\"client_name\":\"hardik pandy\",\"client_mobile\":\"243434\",\"client_email\":\"hardik@pandya.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Buy\",\"requirement_type\":\"87\",\"property_type\":\"256\",\"configuration\":\"null\",\"area_from\":\"1500\",\"area_to\":\"2000\",\"area_from_measurement\":\"117\",\"area_to_measurement\":\"117\",\"enquiry_source\":null,\"furnished_status\":\"[]\",\"budget_from\":null,\"budget_to\":null,\"purpose\":null,\"building_id\":\"[]\",\"enquiry_status\":null,\"project_status\":null,\"area_ids\":\"[\\\"7\\\"]\",\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":\"[[\\\"\\\",\\\"\\\",\\\"undefined\\\",0]]\",\"telephonic_discussion\":null,\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":null,\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-10 06:48:22', '2023-10-10 06:48:22'),
(640, 39, 'default', 'created', 'App\\Models\\User', 88, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Sachin\",\"last_name\":\"Joshi\",\"email\":\"Asdadasd@gmail.com\",\"mobile_number\":\"A\",\"address\":\"Near avelone hospital\",\"status\":\"1\"}}', '2023-10-11 15:01:58', '2023-10-11 15:01:58'),
(641, 39, 'default', 'updated', 'App\\Models\\User', 78, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliya@gmail.com\",\"mobile_number\":\"6546545\",\"address\":\"JHG\",\"status\":\"1\"},\"old\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliya@gmail.com\",\"mobile_number\":\"6546545\",\"address\":\"JHG\",\"status\":\"1\"}}', '2023-10-11 15:02:17', '2023-10-11 15:02:17'),
(642, NULL, 'default', 'updated', 'App\\Models\\User', 78, NULL, NULL, '{\"attributes\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliya@gmail.com\",\"mobile_number\":\"6546545\",\"address\":\"JHG\",\"status\":\"1\"},\"old\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliya@gmail.com\",\"mobile_number\":\"6546545\",\"address\":\"JHG\",\"status\":\"1\"}}', '2023-10-11 15:02:44', '2023-10-11 15:02:44'),
(643, NULL, 'default', 'created', 'App\\Models\\User', 89, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"abc2453@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-10-11 19:05:37', '2023-10-11 19:05:37'),
(644, NULL, 'default', 'created', 'App\\Models\\Enquiries', 26, 'App\\Models\\User', 39, '{\"attributes\":{\"client_name\":\"test\",\"client_mobile\":\"1478523690\",\"client_email\":\"test@gmail.com\",\"is_nri\":\"0\",\"enquiry_for\":\"Rent\",\"requirement_type\":\"[85]\",\"property_type\":\"[254]\",\"configuration\":\"[402,null]\",\"area_from\":null,\"area_to\":null,\"area_from_measurement\":null,\"area_to_measurement\":null,\"enquiry_source\":\"103\",\"furnished_status\":null,\"budget_from\":\"250000\",\"budget_to\":\"2500000\",\"purpose\":null,\"building_id\":null,\"enquiry_status\":\"Active\",\"project_status\":null,\"area_ids\":null,\"is_preleased\":\"0\",\"no_care_customer\":\"0\",\"other_contacts\":null,\"telephonic_discussion\":null,\"highlights\":null,\"enquiry_city_id\":null,\"enquiry_branch_id\":null,\"employee_id\":\"50\",\"district_id\":null,\"taluka_id\":null,\"village_id\":null}}', '2023-10-12 03:16:25', '2023-10-12 03:16:25'),
(645, NULL, 'default', 'created', 'App\\Models\\User', 90, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"askerhema23238@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-10-12 03:23:45', '2023-10-12 03:23:45'),
(646, 39, 'default', 'updated', 'App\\Models\\User', 78, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliya@gmail.com\",\"mobile_number\":\"6546545\",\"address\":\"JHG\",\"status\":\"1\"},\"old\":{\"first_name\":\"Nux\",\"last_name\":\"Hathaliya\",\"email\":\"hathaliya@gmail.com\",\"mobile_number\":\"6546545\",\"address\":\"JHG\",\"status\":\"1\"}}', '2023-10-12 03:29:11', '2023-10-12 03:29:11'),
(647, NULL, 'default', 'created', 'App\\Models\\State', 24, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Gujarat\"}}', '2023-10-12 03:49:48', '2023-10-12 03:49:48'),
(648, NULL, 'default', 'created', 'App\\Models\\City', 22, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-10-12 03:49:48', '2023-10-12 03:49:48'),
(649, NULL, 'default', 'created', 'App\\Models\\City', 23, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-10-12 03:49:48', '2023-10-12 03:49:48'),
(650, NULL, 'default', 'created', 'App\\Models\\City', 24, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-10-12 03:49:48', '2023-10-12 03:49:48'),
(651, NULL, 'default', 'created', 'App\\Models\\City', 25, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-10-12 03:49:48', '2023-10-12 03:49:48'),
(652, NULL, 'default', 'created', 'App\\Models\\City', 26, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-10-12 03:49:48', '2023-10-12 03:49:48'),
(653, NULL, 'default', 'created', 'App\\Models\\Areas', 47, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Shastrinagar\",\"city_id\":\"22\",\"state_id\":\"24\",\"status\":\"1\"}}', '2023-10-12 03:50:32', '2023-10-12 03:50:32'),
(654, NULL, 'default', 'created', 'App\\Models\\City', 27, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-10-12 03:51:23', '2023-10-12 03:51:23'),
(655, NULL, 'default', 'created', 'App\\Models\\City', 28, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"New\"}}', '2023-10-12 03:51:38', '2023-10-12 03:51:38'),
(656, NULL, 'default', 'created', 'App\\Models\\State', 25, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Rajasthan\"}}', '2023-10-12 03:52:05', '2023-10-12 03:52:05'),
(657, NULL, 'default', 'created', 'App\\Models\\City', 29, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Jodhpur\"}}', '2023-10-12 03:52:05', '2023-10-12 03:52:05'),
(658, NULL, 'default', 'created', 'App\\Models\\City', 30, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Jaipur\"}}', '2023-10-12 03:52:05', '2023-10-12 03:52:05'),
(659, NULL, 'default', 'created', 'App\\Models\\City', 31, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Udaipur\"}}', '2023-10-12 03:52:05', '2023-10-12 03:52:05'),
(660, NULL, 'default', 'created', 'App\\Models\\City', 32, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Bikaner\"}}', '2023-10-12 03:52:05', '2023-10-12 03:52:05'),
(661, NULL, 'default', 'created', 'App\\Models\\City', 33, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Ajmer\"}}', '2023-10-12 03:52:05', '2023-10-12 03:52:05'),
(662, NULL, 'default', 'created', 'App\\Models\\State', 26, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Maharashtra\"}}', '2023-10-12 03:52:09', '2023-10-12 03:52:09'),
(663, NULL, 'default', 'created', 'App\\Models\\City', 34, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Mumbai\"}}', '2023-10-12 03:52:09', '2023-10-12 03:52:09'),
(664, NULL, 'default', 'created', 'App\\Models\\City', 35, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Nashik\"}}', '2023-10-12 03:52:09', '2023-10-12 03:52:09'),
(665, NULL, 'default', 'created', 'App\\Models\\City', 36, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Aurangabad\"}}', '2023-10-12 03:52:09', '2023-10-12 03:52:09'),
(666, NULL, 'default', 'created', 'App\\Models\\City', 37, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Nagpur\"}}', '2023-10-12 03:52:09', '2023-10-12 03:52:09'),
(667, NULL, 'default', 'created', 'App\\Models\\City', 38, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Solapur\"}}', '2023-10-12 03:52:09', '2023-10-12 03:52:09'),
(668, NULL, 'default', 'created', 'App\\Models\\Builders', 4, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"lodha\"}}', '2023-10-12 06:26:34', '2023-10-12 06:26:34'),
(669, NULL, 'default', 'created', 'App\\Models\\Builders', 5, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"sun\"}}', '2023-10-12 06:26:38', '2023-10-12 06:26:38'),
(670, NULL, 'default', 'created', 'App\\Models\\Builders', 6, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"saFal\"}}', '2023-10-12 06:26:43', '2023-10-12 06:26:43'),
(671, NULL, 'default', 'created', 'App\\Models\\Builders', 7, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"shaligram\"}}', '2023-10-12 06:26:52', '2023-10-12 06:26:52'),
(672, NULL, 'default', 'created', 'App\\Models\\Builders', 8, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"nysa\"}}', '2023-10-12 06:26:56', '2023-10-12 06:26:56'),
(673, NULL, 'default', 'created', 'App\\Models\\Builders', 9, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"vienza\"}}', '2023-10-12 06:27:04', '2023-10-12 06:27:04'),
(674, NULL, 'default', 'created', 'App\\Models\\Builders', 10, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"sharnam\"}}', '2023-10-12 06:27:12', '2023-10-12 06:27:12'),
(675, NULL, 'default', 'created', 'App\\Models\\Builders', 11, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"vraj\"}}', '2023-10-12 06:27:23', '2023-10-12 06:27:23'),
(676, NULL, 'default', 'created', 'App\\Models\\Builders', 12, 'App\\Models\\User', 39, '{\"attributes\":{\"name\":\"nakshatra\"}}', '2023-10-12 06:27:27', '2023-10-12 06:27:27'),
(677, 39, 'default', 'created', 'App\\Models\\Projects', 59, 'App\\Models\\User', 39, '[]', '2023-10-12 08:48:08', '2023-10-12 08:48:08'),
(678, 39, 'default', 'updated', 'App\\Models\\Projects', 59, 'App\\Models\\User', 39, '[]', '2023-10-12 08:50:12', '2023-10-12 08:50:12'),
(679, NULL, 'default', 'created', 'App\\Models\\City', 39, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"aadsada\"}}', '2023-10-12 16:25:06', '2023-10-12 16:25:06'),
(680, NULL, 'default', 'created', 'App\\Models\\City', 40, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Ahmedabad\"}}', '2023-10-12 16:25:10', '2023-10-12 16:25:10'),
(681, NULL, 'default', 'created', 'App\\Models\\City', 41, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Surat\"}}', '2023-10-12 16:25:10', '2023-10-12 16:25:10'),
(682, NULL, 'default', 'created', 'App\\Models\\City', 42, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Vadodara\"}}', '2023-10-12 16:25:10', '2023-10-12 16:25:10'),
(683, NULL, 'default', 'created', 'App\\Models\\City', 43, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Bhavnagar\"}}', '2023-10-12 16:25:10', '2023-10-12 16:25:10'),
(684, NULL, 'default', 'created', 'App\\Models\\City', 44, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Gandhinagar\"}}', '2023-10-12 16:25:10', '2023-10-12 16:25:10'),
(685, NULL, 'default', 'created', 'App\\Models\\City', 45, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Mumbai\"}}', '2023-10-12 16:25:14', '2023-10-12 16:25:14'),
(686, NULL, 'default', 'created', 'App\\Models\\City', 46, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Nashik\"}}', '2023-10-12 16:25:14', '2023-10-12 16:25:14'),
(687, NULL, 'default', 'created', 'App\\Models\\City', 47, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Aurangabad\"}}', '2023-10-12 16:25:14', '2023-10-12 16:25:14'),
(688, NULL, 'default', 'created', 'App\\Models\\City', 48, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Nagpur\"}}', '2023-10-12 16:25:14', '2023-10-12 16:25:14'),
(689, NULL, 'default', 'created', 'App\\Models\\City', 49, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Solapur\"}}', '2023-10-12 16:25:14', '2023-10-12 16:25:14'),
(690, NULL, 'default', 'created', 'App\\Models\\City', 50, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Jodhpur\"}}', '2023-10-12 16:25:19', '2023-10-12 16:25:19'),
(691, NULL, 'default', 'created', 'App\\Models\\City', 51, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Jaipur\"}}', '2023-10-12 16:25:19', '2023-10-12 16:25:19'),
(692, NULL, 'default', 'created', 'App\\Models\\City', 52, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Udaipur\"}}', '2023-10-12 16:25:19', '2023-10-12 16:25:19'),
(693, NULL, 'default', 'created', 'App\\Models\\City', 53, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Bikaner\"}}', '2023-10-12 16:25:19', '2023-10-12 16:25:19'),
(694, NULL, 'default', 'created', 'App\\Models\\City', 54, 'App\\Models\\User', 78, '{\"attributes\":{\"name\":\"Ajmer\"}}', '2023-10-12 16:25:19', '2023-10-12 16:25:19'),
(695, NULL, 'default', 'created', 'App\\Models\\User', 91, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"askerhema2325238@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-10-12 16:58:17', '2023-10-12 16:58:17'),
(696, NULL, 'default', 'created', 'App\\Models\\User', 92, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"abc@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-10-12 16:58:42', '2023-10-12 16:58:42'),
(697, NULL, 'default', 'created', 'App\\Models\\User', 93, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"abc1@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-10-13 01:45:22', '2023-10-13 01:45:22'),
(698, 39, 'default', 'updated', 'App\\Models\\Projects', 59, 'App\\Models\\User', 39, '[]', '2023-10-13 03:28:50', '2023-10-13 03:28:50'),
(699, 39, 'default', 'updated', 'App\\Models\\Projects', 15, 'App\\Models\\User', 39, '[]', '2023-10-14 05:29:44', '2023-10-14 05:29:44'),
(700, 39, 'default', 'updated', 'App\\Models\\Projects', 55, 'App\\Models\\User', 39, '[]', '2023-10-14 05:42:24', '2023-10-14 05:42:24'),
(701, 39, 'default', 'updated', 'App\\Models\\Projects', 38, 'App\\Models\\User', 39, '[]', '2023-10-14 05:52:13', '2023-10-14 05:52:13'),
(702, 39, 'default', 'updated', 'App\\Models\\Projects', 59, 'App\\Models\\User', 39, '[]', '2023-10-14 23:24:04', '2023-10-14 23:24:04'),
(703, 39, 'default', 'updated', 'App\\Models\\Projects', 59, 'App\\Models\\User', 39, '[]', '2023-10-14 23:27:17', '2023-10-14 23:27:17'),
(704, 39, 'default', 'updated', 'App\\Models\\Projects', 59, 'App\\Models\\User', 39, '[]', '2023-10-14 23:29:04', '2023-10-14 23:29:04'),
(705, 39, 'default', 'updated', 'App\\Models\\Projects', 59, 'App\\Models\\User', 39, '[]', '2023-10-14 23:41:42', '2023-10-14 23:41:42'),
(706, 39, 'default', 'updated', 'App\\Models\\Projects', 59, 'App\\Models\\User', 39, '[]', '2023-10-15 06:33:30', '2023-10-15 06:33:30'),
(707, 39, 'default', 'updated', 'App\\Models\\Projects', 59, 'App\\Models\\User', 39, '[]', '2023-10-15 06:40:48', '2023-10-15 06:40:48'),
(708, 39, 'default', 'updated', 'App\\Models\\Projects', 59, 'App\\Models\\User', 39, '[]', '2023-10-15 06:40:57', '2023-10-15 06:40:57'),
(709, 39, 'default', 'updated', 'App\\Models\\Projects', 59, 'App\\Models\\User', 39, '[]', '2023-10-15 06:50:04', '2023-10-15 06:50:04'),
(710, 39, 'default', 'updated', 'App\\Models\\Projects', 59, 'App\\Models\\User', 39, '[]', '2023-10-15 08:41:21', '2023-10-15 08:41:21'),
(711, 39, 'default', 'created', 'App\\Models\\Projects', 60, 'App\\Models\\User', 39, '[]', '2023-10-15 09:40:46', '2023-10-15 09:40:46'),
(712, 39, 'default', 'created', 'App\\Models\\Projects', 61, 'App\\Models\\User', 39, '[]', '2023-10-15 10:28:05', '2023-10-15 10:28:05'),
(713, 39, 'default', 'updated', 'App\\Models\\Projects', 61, 'App\\Models\\User', 39, '[]', '2023-10-15 11:00:23', '2023-10-15 11:00:23'),
(714, 39, 'default', 'updated', 'App\\Models\\Projects', 61, 'App\\Models\\User', 39, '[]', '2023-10-15 11:08:41', '2023-10-15 11:08:41'),
(715, 39, 'default', 'created', 'App\\Models\\Projects', 62, 'App\\Models\\User', 39, '[]', '2023-10-15 11:19:41', '2023-10-15 11:19:41'),
(716, 39, 'default', 'updated', 'App\\Models\\Projects', 62, 'App\\Models\\User', 39, '[]', '2023-10-15 11:21:04', '2023-10-15 11:21:04'),
(717, 39, 'default', 'created', 'App\\Models\\Projects', 63, 'App\\Models\\User', 39, '[]', '2023-10-17 22:12:01', '2023-10-17 22:12:01'),
(718, 39, 'default', 'updated', 'App\\Models\\Projects', 63, 'App\\Models\\User', 39, '[]', '2023-10-17 22:14:52', '2023-10-17 22:14:52'),
(719, 39, 'default', 'updated', 'App\\Models\\Projects', 63, 'App\\Models\\User', 39, '[]', '2023-10-17 22:16:03', '2023-10-17 22:16:03'),
(720, 39, 'default', 'updated', 'App\\Models\\Projects', 63, 'App\\Models\\User', 39, '[]', '2023-10-18 10:10:10', '2023-10-18 10:10:10'),
(721, 39, 'default', 'created', 'App\\Models\\Projects', 64, 'App\\Models\\User', 39, '[]', '2023-10-18 11:38:59', '2023-10-18 11:38:59'),
(722, 39, 'default', 'created', 'App\\Models\\User', 94, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"New\",\"last_name\":\"Test\",\"email\":\"asdadada@gmail.com\",\"mobile_number\":\"7979879785\",\"address\":\"Near kalupur\",\"status\":1}}', '2023-10-21 03:45:53', '2023-10-21 03:45:53'),
(723, 39, 'default', 'created', 'App\\Models\\User', 96, 'App\\Models\\User', 39, '{\"attributes\":{\"first_name\":\"New\",\"last_name\":\"Test\",\"email\":\"asdadadad@gmail.com\",\"mobile_number\":\"7979879785\",\"address\":\"Near kalupur\",\"status\":1}}', '2023-10-21 03:46:24', '2023-10-21 03:46:24'),
(724, NULL, 'default', 'created', 'App\\Models\\User', 97, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"eshaesha243@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-10-26 16:41:16', '2023-10-26 16:41:16'),
(725, NULL, 'default', 'updated', 'App\\Models\\User', 97, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"eshaesha243@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"},\"old\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"eshaesha243@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":null}}', '2023-10-26 16:41:16', '2023-10-26 16:41:16'),
(726, NULL, 'default', 'updated', 'App\\Models\\User', 97, NULL, NULL, '{\"attributes\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"eshaesha243@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"},\"old\":{\"first_name\":\"test\",\"last_name\":\"test2\",\"email\":\"eshaesha243@gmail.com\",\"mobile_number\":\"1234567809\",\"address\":null,\"status\":\"1\"}}', '2023-10-26 16:44:10', '2023-10-26 16:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `pincode` varchar(180) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `user_id`, `name`, `city_id`, `pincode`, `state_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 39, 'Thaltej', 1, '380059', 7, 1, '2023-09-01 11:49:17', '2023-09-01 11:49:17', NULL),
(2, 39, 'Satellite City', 1, '380015', 7, 1, '2023-09-01 11:49:17', '2023-09-01 11:49:17', NULL),
(3, 39, 'SG Highway', 1, '380054', 7, 1, '2023-09-01 11:49:17', '2023-09-01 11:49:17', NULL),
(4, 39, 'CG Road', 1, '380009', 7, 1, '2023-09-01 11:49:17', '2023-09-01 11:49:17', NULL),
(5, 39, 'Navrangpura', 1, '380009', 7, 1, '2023-09-01 11:49:17', '2023-09-01 11:49:17', NULL),
(6, 39, 'Bopal', 1, '380058', 7, 1, '2023-09-01 11:49:17', '2023-09-01 11:49:17', NULL),
(7, 39, 'Science City Road', 1, '380060', 7, 1, '2023-09-01 11:49:17', '2023-09-01 11:49:17', NULL),
(8, 39, 'Ambli', 1, '382463', 7, 1, '2023-09-01 11:49:17', '2023-09-01 11:49:17', NULL),
(9, 39, 'Prahlad Nagar', 1, '380015', 7, 1, '2023-09-01 11:49:17', '2023-09-01 11:49:17', NULL),
(10, 39, 'Chandkheda', 1, '382424', 7, 1, '2023-09-01 11:49:17', '2023-09-01 11:49:17', NULL),
(11, 39, 'Kaliyabid', 2, '364002', 7, 1, '2023-09-01 11:49:43', '2023-09-01 11:49:43', NULL),
(12, 39, 'Mahuva', 2, '364290', 7, 1, '2023-09-01 11:49:43', '2023-09-01 11:49:43', NULL),
(13, 39, 'Ambawadi', 2, '364001', 7, 1, '2023-09-01 11:49:43', '2023-09-01 11:49:43', NULL),
(14, 39, 'Subhashnagar', 2, '364001', 7, 1, '2023-09-01 11:49:43', '2023-09-01 11:49:43', NULL),
(15, 39, 'Chitra', 2, '364004', 7, 1, '2023-09-01 11:49:43', '2023-09-01 11:49:43', NULL),
(16, 39, 'Balapur', 3, '431117', 8, 1, '2023-09-01 11:50:27', '2023-09-01 11:50:27', NULL),
(17, 39, 'Deolai', 3, '431002', 8, 1, '2023-09-01 11:50:27', '2023-09-01 11:50:27', NULL),
(18, 39, 'Jalan Nagar', 3, '431002', 8, 1, '2023-09-01 11:50:27', '2023-09-01 11:50:27', NULL),
(19, 39, 'MIDC', 3, '431603', 8, 1, '2023-09-01 11:50:27', '2023-09-01 11:50:27', NULL),
(20, 39, 'Kanchanwadi', 3, '431011', 8, 1, '2023-09-01 11:50:27', '2023-09-01 11:50:27', NULL),
(21, 39, 'Bandra', 4, '400050', 8, 1, '2023-09-01 11:50:54', '2023-09-01 11:50:54', NULL),
(22, 39, 'Juhu', 4, '400049', 8, 1, '2023-09-01 11:50:54', '2023-09-01 11:50:54', NULL),
(23, 39, 'Worli', 4, '400018', 8, 1, '2023-09-01 11:50:54', '2023-09-01 11:50:54', NULL),
(24, 39, 'Andheri', 4, '400047', 8, 1, '2023-09-01 11:50:54', '2023-09-01 11:50:54', NULL),
(25, 39, 'Dadar', 4, '400014', 8, 1, '2023-09-01 11:50:54', '2023-09-01 11:50:54', NULL),
(26, 39, 'Borivali', 4, '400091', 8, 1, '2023-09-01 11:50:54', '2023-09-01 11:50:54', NULL),
(27, 39, 'Alkapuri', 5, '390007', 7, 1, '2023-09-02 10:24:33', '2023-09-02 10:24:33', NULL),
(28, 39, 'Gotri', 5, '390021', 7, 1, '2023-09-02 10:24:33', '2023-09-02 10:24:33', NULL),
(29, 39, 'Akota', 5, '390020', 7, 1, '2023-09-02 10:24:33', '2023-09-02 10:24:33', NULL),
(30, 39, 'Fateganj', 5, '390002', 7, 1, '2023-09-02 10:24:33', '2023-09-02 10:24:33', NULL),
(31, 39, 'Sama', 5, '390008', 7, 1, '2023-09-02 10:24:33', '2023-09-02 10:24:33', NULL),
(32, 39, 'Karelibaug', 5, '390018', 7, 1, '2023-09-02 10:24:33', '2023-09-02 10:24:33', NULL),
(33, 39, 'Bapunagar', 1, '380015', 7, 1, '2023-09-02 10:25:39', '2023-09-02 10:25:39', NULL),
(34, 39, 'thane', 4, '400080', 8, 1, '2023-09-05 05:53:24', '2023-09-05 05:53:24', NULL),
(35, 53, 'Shastrinagar', 6, '380019', 9, 1, '2023-09-11 18:21:27', '2023-09-11 18:21:27', NULL),
(36, 39, 'Garh', 7, '303302', 10, 1, '2023-09-12 05:51:53', '2023-09-12 05:51:53', NULL),
(37, 39, 'Bapu Nagar', 7, '302015', 10, 1, '2023-09-12 05:51:53', '2023-09-12 05:51:53', NULL),
(38, 39, 'Phagi', 7, '303005', 10, 1, '2023-09-12 05:51:53', '2023-09-12 05:51:53', NULL),
(39, 39, 'Sirsi Road', 7, '302012', 10, 1, '2023-09-12 05:51:53', '2023-09-12 05:51:53', NULL),
(40, 39, 'Tala', 7, '303120', 10, 1, '2023-09-12 05:51:53', '2023-09-12 05:51:53', NULL),
(41, 39, 'agol', 1, '382165', 7, 1, '2023-09-22 06:13:47', '2023-09-22 06:13:47', NULL),
(42, 39, 'chhatral', 1, '382715', 7, 1, '2023-09-27 07:49:03', '2023-09-27 07:49:03', NULL),
(43, 39, 'vastral', 1, '380038', 7, 1, '2023-09-28 05:18:43', '2023-09-28 05:18:43', NULL),
(44, 39, 'gota', 1, '380081', 7, 1, '2023-10-04 07:19:30', '2023-10-04 07:19:30', NULL),
(45, 39, 'virar', 4, '400123', 8, 1, '2023-10-04 07:39:53', '2023-10-04 07:39:53', NULL),
(46, 39, '258963', 13, 'testing', 14, 1, '2023-10-06 15:38:20', '2023-10-06 15:48:32', '2023-10-06 15:48:32'),
(47, 39, 'Shastrinagar', 22, '4564564', 24, 1, '2023-10-12 03:50:32', '2023-10-12 03:50:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assign_histories`
--

CREATE TABLE `assign_histories` (
  `id` int(11) NOT NULL,
  `enquiry_id` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `assign_id` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assign_histories`
--

INSERT INTO `assign_histories` (`id`, `enquiry_id`, `user_id`, `assign_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 49, 49, '2023-09-08 04:10:45', '2023-09-09 04:10:45', NULL),
(2, 2, 39, 50, '2023-09-10 14:34:33', '2023-09-10 14:34:33', NULL),
(3, 25, 39, 50, '2023-10-11 17:04:43', '2023-10-11 17:04:43', NULL),
(4, 25, 39, 39, '2023-10-11 17:05:15', '2023-10-11 17:05:15', NULL),
(5, 24, 39, 65, '2023-10-11 17:05:30', '2023-10-11 17:05:30', NULL),
(6, 23, 39, 73, '2023-10-11 17:06:40', '2023-10-11 17:06:40', NULL),
(7, 13, 39, NULL, '2023-10-12 03:01:13', '2023-10-12 03:01:13', NULL),
(8, 13, 39, 50, '2023-10-12 03:01:35', '2023-10-12 03:01:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `name` varchar(180) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `user_id`, `state_id`, `city_id`, `name`, `area_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 8, NULL, 159, 'Gora', NULL, 1, '2023-01-08 07:54:07', '2023-01-08 07:54:07', NULL),
(2, 8, NULL, 159, 'SBR', NULL, 1, '2023-01-08 07:54:21', '2023-01-08 07:54:21', NULL),
(3, 8, NULL, 159, 'nikol', NULL, 1, '2023-01-08 07:54:33', '2023-01-08 07:54:33', NULL),
(13, 39, 7, 1, 'First Branch', 8, 1, '2023-09-17 14:58:31', '2023-09-17 14:58:31', NULL),
(14, 39, 7, 1, 'gota - vande matram', 44, 1, '2023-10-04 07:38:42', '2023-10-04 07:38:42', NULL),
(15, 39, 8, 4, 'maha-virar', 45, 1, '2023-10-04 07:40:33', '2023-10-04 07:40:33', NULL),
(16, 39, 7, 1, 'Shastrinagar', 3, 1, '2023-10-05 17:21:36', '2023-10-05 17:21:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `builders`
--

CREATE TABLE `builders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `builders`
--

INSERT INTO `builders` (`id`, `name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Safal', 8, '2023-08-23 18:15:40', '2023-08-23 18:15:40', NULL),
(2, 'Ajmera', 39, '2023-08-23 18:18:58', '2023-08-23 18:19:00', '2023-08-23 18:19:00'),
(3, 'Ajmera', 39, '2023-08-23 18:18:58', '2023-08-23 18:18:58', NULL),
(4, 'lodha', 39, '2023-10-12 06:26:34', '2023-10-12 06:26:34', NULL),
(5, 'sun', 39, '2023-10-12 06:26:38', '2023-10-12 06:26:38', NULL),
(6, 'saFal', 39, '2023-10-12 06:26:43', '2023-10-12 06:26:43', NULL),
(7, 'shaligram', 39, '2023-10-12 06:26:52', '2023-10-12 06:26:52', NULL),
(8, 'nysa', 39, '2023-10-12 06:26:56', '2023-10-12 06:26:56', NULL),
(9, 'vienza', 39, '2023-10-12 06:27:04', '2023-10-12 06:27:04', NULL),
(10, 'sharnam', 39, '2023-10-12 06:27:12', '2023-10-12 06:27:12', NULL),
(11, 'vraj', 39, '2023-10-12 06:27:23', '2023-10-12 06:27:23', NULL),
(12, 'nakshatra', 39, '2023-10-12 06:27:27', '2023-10-12 06:27:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `builder_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `landmark` text DEFAULT NULL,
  `is_prime` tinyint(4) NOT NULL DEFAULT 0,
  `posession_year` int(11) DEFAULT NULL,
  `floor_count` int(11) DEFAULT NULL,
  `unit_no` int(11) DEFAULT NULL,
  `lift_count` int(11) DEFAULT NULL,
  `property_type` varchar(180) DEFAULT NULL,
  `restrictions` varchar(255) DEFAULT NULL,
  `building_status` int(11) DEFAULT NULL,
  `building_quality` varchar(180) DEFAULT NULL,
  `building_descriptions` text DEFAULT NULL,
  `building_amenities` varchar(180) DEFAULT NULL,
  `contact_details` text DEFAULT NULL,
  `security_details` text DEFAULT NULL,
  `document_images` text DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `added_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `building_images`
--

CREATE TABLE `building_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `building_id` int(11) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image` varchar(180) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'First', NULL, NULL),
(2, 'Second', NULL, NULL),
(3, 'Third', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `user_id`, `name`, `state_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 39, 'Ahmedabad', 7, '2023-09-01 11:49:17', '2023-09-01 11:49:17', NULL),
(2, 39, 'Bhavnagar', 7, '2023-09-01 11:49:43', '2023-09-01 11:49:43', NULL),
(3, 39, 'Aurangabad', 8, '2023-09-01 11:50:27', '2023-09-01 11:50:27', NULL),
(4, 39, 'Mumbai', 8, '2023-09-01 11:50:54', '2023-09-01 11:50:54', NULL),
(5, 39, 'Vadodara', 7, '2023-09-02 10:24:33', '2023-09-02 10:24:33', NULL),
(6, 53, 'Ahmedabad', 9, '2023-09-11 17:16:54', '2023-09-11 17:16:54', NULL),
(7, 39, 'jaipur', 10, '2023-09-12 05:51:09', '2023-09-12 05:51:09', NULL),
(8, 39, 'Jodhpur', 10, '2023-09-12 05:51:22', '2023-09-12 05:51:22', NULL),
(9, 39, 'Udaipur', 10, '2023-09-12 05:51:22', '2023-09-12 05:51:22', NULL),
(10, 39, 'Bikaner', 10, '2023-09-12 05:51:22', '2023-09-12 05:51:22', NULL),
(11, 39, 'Ajmer', 10, '2023-09-12 05:51:22', '2023-09-12 05:51:22', NULL),
(12, 74, 'Ahmedabad', 15, '2023-10-05 03:33:56', '2023-10-05 03:33:56', NULL),
(13, 39, 'test', 14, '2023-10-05 16:34:09', '2023-10-05 16:34:32', '2023-10-05 16:34:32'),
(14, 39, 'test', 14, '2023-10-05 16:34:44', '2023-10-06 18:02:50', '2023-10-06 18:02:50'),
(15, 39, 'test', 14, '2023-10-06 18:02:18', '2023-10-06 18:02:18', NULL),
(16, 39, NULL, NULL, '2023-10-06 18:59:28', '2023-10-06 18:59:28', NULL),
(17, 79, 'Ahmedabad', 19, '2023-10-07 17:27:24', '2023-10-07 17:27:24', NULL),
(18, 80, 'Ahmedabad', 20, '2023-10-07 17:30:09', '2023-10-07 17:30:09', NULL),
(19, 81, 'Ahmedabad', 21, '2023-10-07 17:31:59', '2023-10-07 17:31:59', NULL),
(20, 82, 'Ahmedabad', 22, '2023-10-07 17:36:06', '2023-10-07 17:36:06', NULL),
(21, 83, 'Ahmedabad', 23, '2023-10-07 17:39:10', '2023-10-07 17:39:10', NULL),
(22, 39, 'Ahmedabad', 24, '2023-10-12 03:49:48', '2023-10-12 03:49:48', NULL),
(23, 39, 'Surat', 24, '2023-10-12 03:49:48', '2023-10-12 03:49:48', NULL),
(24, 39, 'Vadodara', 24, '2023-10-12 03:49:48', '2023-10-12 03:49:48', NULL),
(25, 39, 'Bhavnagar', 24, '2023-10-12 03:49:48', '2023-10-12 03:49:48', NULL),
(26, 39, 'Gandhinagar', 24, '2023-10-12 03:49:48', '2023-10-12 03:49:48', NULL),
(27, 78, 'Ahmedabad', 24, '2023-10-12 03:51:23', '2023-10-12 03:51:23', NULL),
(28, 78, 'New', 24, '2023-10-12 03:51:38', '2023-10-12 03:51:38', NULL),
(29, 39, 'Jodhpur', 25, '2023-10-12 03:52:05', '2023-10-12 03:52:05', NULL),
(30, 39, 'Jaipur', 25, '2023-10-12 03:52:05', '2023-10-12 03:52:05', NULL),
(31, 39, 'Udaipur', 25, '2023-10-12 03:52:05', '2023-10-12 03:52:05', NULL),
(32, 39, 'Bikaner', 25, '2023-10-12 03:52:05', '2023-10-12 03:52:05', NULL),
(33, 39, 'Ajmer', 25, '2023-10-12 03:52:05', '2023-10-12 03:52:05', NULL),
(34, 39, 'Mumbai', 26, '2023-10-12 03:52:09', '2023-10-12 03:52:09', NULL),
(35, 39, 'Nashik', 26, '2023-10-12 03:52:09', '2023-10-12 03:52:09', NULL),
(36, 39, 'Aurangabad', 26, '2023-10-12 03:52:09', '2023-10-12 03:52:09', NULL),
(37, 39, 'Nagpur', 26, '2023-10-12 03:52:09', '2023-10-12 03:52:09', NULL),
(38, 39, 'Solapur', 26, '2023-10-12 03:52:09', '2023-10-12 03:52:09', NULL),
(39, 78, 'aadsada', 24, '2023-10-12 16:25:06', '2023-10-12 16:25:06', NULL),
(40, 39, 'Ahmedabad', 24, '2023-10-12 16:25:10', '2023-10-12 16:25:10', NULL),
(41, 39, 'Surat', 24, '2023-10-12 16:25:10', '2023-10-12 16:25:10', NULL),
(42, 39, 'Vadodara', 24, '2023-10-12 16:25:10', '2023-10-12 16:25:10', NULL),
(43, 39, 'Bhavnagar', 24, '2023-10-12 16:25:10', '2023-10-12 16:25:10', NULL),
(44, 39, 'Gandhinagar', 24, '2023-10-12 16:25:10', '2023-10-12 16:25:10', NULL),
(45, 39, 'Mumbai', 26, '2023-10-12 16:25:14', '2023-10-12 16:25:14', NULL),
(46, 39, 'Nashik', 26, '2023-10-12 16:25:14', '2023-10-12 16:25:14', NULL),
(47, 39, 'Aurangabad', 26, '2023-10-12 16:25:14', '2023-10-12 16:25:14', NULL),
(48, 39, 'Nagpur', 26, '2023-10-12 16:25:14', '2023-10-12 16:25:14', NULL),
(49, 39, 'Solapur', 26, '2023-10-12 16:25:14', '2023-10-12 16:25:14', NULL),
(50, 39, 'Jodhpur', 25, '2023-10-12 16:25:19', '2023-10-12 16:25:19', NULL),
(51, 39, 'Jaipur', 25, '2023-10-12 16:25:19', '2023-10-12 16:25:19', NULL),
(52, 39, 'Udaipur', 25, '2023-10-12 16:25:19', '2023-10-12 16:25:19', NULL),
(53, 39, 'Bikaner', 25, '2023-10-12 16:25:19', '2023-10-12 16:25:19', NULL),
(54, 39, 'Ajmer', 25, '2023-10-12 16:25:19', '2023-10-12 16:25:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `company_name` varchar(225) DEFAULT NULL,
  `company_site` varchar(255) DEFAULT NULL,
  `company_contact` varchar(20) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `company_email` varchar(225) DEFAULT NULL,
  `company_logo` varchar(225) DEFAULT NULL,
  `company_gst` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(180) DEFAULT NULL,
  `code` varchar(180) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `amount_off` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `default_measurement`
--

CREATE TABLE `default_measurement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `measure_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `default_measurement`
--

INSERT INTO `default_measurement` (`id`, `userid`, `measure_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 8, 117, '2023-01-21 18:37:53', '2023-03-03 09:20:45', NULL),
(2, 1, 45, '2023-02-01 06:07:54', '2023-02-18 07:02:28', NULL),
(3, 19, 192, '2023-02-03 08:08:24', '2023-02-03 08:08:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(180) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Junagadh', 39, NULL, NULL, NULL),
(2, 'Gir-Somnath', 39, NULL, '2023-08-31 12:16:57', NULL),
(3, 'Jamnagar', 39, '2023-08-31 10:22:39', '2023-08-31 10:47:53', NULL),
(4, 'Rajkot', 39, '2023-08-31 11:10:43', '2023-08-31 11:13:40', NULL),
(5, 'ahmedabad', 39, '2023-09-19 14:06:56', '2023-09-19 14:06:56', NULL),
(6, 'testing', 39, '2023-10-06 15:48:46', '2023-10-06 16:13:03', '2023-10-06 16:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `dropdown_settings`
--

CREATE TABLE `dropdown_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dropdown_for` varchar(100) DEFAULT NULL,
  `name` varchar(180) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `editable` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropdown_settings`
--

INSERT INTO `dropdown_settings` (`id`, `user_id`, `dropdown_for`, `name`, `parent_id`, `editable`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'property_for', 'Rent', NULL, NULL, '2022-10-19 10:12:41', '2023-10-25 17:42:46', '2023-10-25 17:42:46'),
(2, 1, 'property_for', 'Sell', NULL, NULL, '2022-10-19 10:12:48', '2022-10-24 11:35:51', NULL),
(14, 1, 'property_construction_type', 'Industrial', NULL, NULL, '2022-10-24 11:30:25', '2022-10-24 11:30:25', NULL),
(17, 8, 'property_priority_type', 'P1', NULL, NULL, '2022-10-24 11:30:51', '2022-10-24 11:30:51', NULL),
(34, 1, 'property_furniture_type', 'Furnished', NULL, NULL, '2022-10-29 06:33:20', '2022-10-29 06:33:20', '2023-08-26 00:12:18'),
(35, 1, 'property_furniture_type', 'Semi Furnished', NULL, NULL, '2022-10-29 06:33:28', '2022-10-29 06:33:28', '2023-08-26 00:12:18'),
(36, 1, 'property_furniture_type', 'Unfurnished', NULL, NULL, '2022-10-29 06:33:34', '2022-10-29 06:33:34', '2023-08-26 00:12:18'),
(37, 1, 'property_furniture_type', 'Can Furnished', NULL, NULL, '2022-10-29 06:33:43', '2022-10-29 06:33:43', '2023-08-26 00:12:18'),
(58, 1, 'building_restriction', 'Bachelors', NULL, NULL, '2022-11-09 14:46:39', '2022-11-09 14:46:39', NULL),
(59, 1, 'building_restriction', 'Hospital', NULL, NULL, '2022-11-09 14:46:53', '2022-11-09 14:46:53', NULL),
(60, 1, 'building_restriction', 'Restaurant', NULL, NULL, '2022-11-09 14:47:02', '2022-11-09 14:47:02', NULL),
(61, 1, 'building_restriction', 'Company Guest House', NULL, NULL, '2022-11-09 14:47:16', '2022-11-09 14:47:16', NULL),
(62, 1, 'building_restriction', 'Night Call Center', NULL, NULL, '2022-11-09 14:47:28', '2022-11-09 14:47:28', NULL),
(63, 1, 'building_restriction', 'SPA & Massage Parlor', NULL, NULL, '2022-11-09 14:47:39', '2022-11-09 14:47:39', NULL),
(65, 1, 'building_architecture_type', 'Industrial', NULL, NULL, '2022-11-09 14:48:09', '2022-11-09 14:48:09', NULL),
(66, 1, 'building_architecture_type', 'Land', NULL, NULL, '2022-11-09 14:48:24', '2022-11-09 14:48:24', NULL),
(67, 1, 'building_architecture_type', 'Offices', NULL, NULL, '2022-11-09 14:48:29', '2022-11-09 14:48:29', NULL),
(70, 1, 'building_progress', 'Ready Possession', NULL, NULL, '2022-11-09 14:49:08', '2022-11-09 14:49:08', NULL),
(71, 1, 'building_progress', 'Under Construction', NULL, NULL, '2022-11-09 14:49:21', '2022-11-09 14:49:21', NULL),
(83, 8, 'property_for', 'Rent', NULL, NULL, '2022-10-19 10:12:41', '2022-10-19 10:12:41', NULL),
(84, 8, 'property_for', 'Sell', NULL, NULL, '2022-10-19 10:12:48', '2022-10-24 11:35:51', NULL),
(85, 8, 'property_construction_type', 'Commercial', NULL, 1, '2022-10-24 11:30:19', '2022-10-24 11:30:19', NULL),
(86, 8, 'property_construction_type', 'Industrial', NULL, NULL, '2022-10-24 11:30:25', '2023-03-12 06:55:41', '2023-03-12 06:55:41'),
(87, 8, 'property_construction_type', 'Residential', NULL, 1, '2022-10-24 11:30:33', '2022-10-24 11:30:33', NULL),
(88, 8, 'property_construction_type', 'Office & Retail', NULL, NULL, '2022-10-24 11:30:39', '2023-03-12 06:55:38', NULL),
(89, 8, 'property_construction_type', 'Residential & Commercial', NULL, NULL, '2022-10-24 11:30:51', '2022-10-24 11:30:51', NULL),
(90, 8, 'property_priority_type', 'P2', NULL, NULL, '2022-10-24 11:30:56', '2022-10-24 11:30:56', NULL),
(91, 8, 'property_priority_type', 'P3', NULL, NULL, '2022-10-24 11:31:00', '2022-10-24 11:31:00', NULL),
(92, 8, 'property_priority_type', 'P4', NULL, NULL, '2022-10-24 11:31:05', '2022-10-24 11:31:05', NULL),
(93, 8, 'property_specific_type', 'Agriculture Land', 88, NULL, '2022-10-24 11:31:28', '2023-03-12 06:55:11', '2023-03-12 06:55:11'),
(95, 8, 'property_specific_type', 'Godown', 86, NULL, '2022-10-24 11:32:55', '2023-03-12 06:55:14', '2023-03-12 06:55:14'),
(96, 8, 'property_specific_type', 'NA Land', 88, NULL, '2022-10-24 11:33:11', '2023-03-12 06:55:16', '2023-03-12 06:55:16'),
(98, 8, 'property_specific_type', 'Row House', 87, NULL, '2022-10-24 11:33:33', '2023-03-12 06:55:18', '2023-03-12 06:55:18'),
(99, 8, 'property_specific_type', 'Tenament', 87, NULL, '2022-10-24 11:33:51', '2023-03-12 06:55:20', '2023-03-12 06:55:20'),
(101, 8, 'property_specific_type', 'Basement', 85, NULL, '2022-10-24 11:34:27', '2023-03-12 06:55:24', '2023-03-12 06:55:24'),
(102, 8, 'property_specific_type', 'Industrial Shed', 86, NULL, '2022-10-24 11:34:41', '2023-03-12 06:55:26', '2023-03-12 06:55:26'),
(103, 8, 'property_source', 'Advertise', NULL, NULL, '2022-10-24 11:34:57', '2022-10-24 11:34:57', NULL),
(104, 8, 'property_source', 'Reference', NULL, NULL, '2022-10-24 11:35:04', '2022-10-24 11:35:04', NULL),
(105, 8, 'property_source', '99 Acres', NULL, NULL, '2022-10-24 11:35:09', '2022-10-24 11:35:09', NULL),
(106, 8, 'property_furniture_type', 'Furnished', NULL, NULL, '2022-10-29 06:33:20', '2022-10-29 06:33:20', NULL),
(107, 8, 'property_furniture_type', 'Semi Furnished', NULL, NULL, '2022-10-29 06:33:28', '2022-10-29 06:33:28', NULL),
(108, 8, 'property_furniture_type', 'Unfurnished', NULL, NULL, '2022-10-29 06:33:34', '2022-10-29 06:33:34', NULL),
(109, 8, 'property_furniture_type', 'Can Furnished', NULL, NULL, '2022-10-29 06:33:43', '2022-10-29 06:33:43', NULL),
(110, 8, 'property_owner_type', 'Builder', NULL, NULL, '2022-10-29 06:33:55', '2022-10-29 06:33:55', NULL),
(111, 8, 'property_owner_type', 'Individual', NULL, NULL, '2022-10-29 06:34:04', '2022-10-29 06:34:04', NULL),
(112, 8, 'property_owner_type', 'Investor', NULL, NULL, '2022-10-29 06:34:10', '2022-10-29 06:34:10', NULL),
(116, 8, 'property_specific_type', 'Bungalow', 87, NULL, '2022-11-08 15:00:00', '2023-03-12 06:55:31', '2023-03-12 06:55:31'),
(117, 8, 'property_measurement_type', 'Sq.Ft.', NULL, NULL, '2022-11-09 14:42:04', '2022-11-09 14:42:04', NULL),
(118, 8, 'property_measurement_type', 'Sq.Yard', NULL, NULL, '2022-11-09 14:42:16', '2022-11-09 14:42:16', NULL),
(119, 8, 'property_measurement_type', 'Sq.Meter', NULL, NULL, '2022-11-09 14:42:27', '2022-11-09 14:42:27', NULL),
(120, 8, 'property_measurement_type', 'VIGHA', NULL, NULL, '2022-11-09 14:42:43', '2022-11-09 14:42:43', NULL),
(130, 8, 'building_restriction', 'Bachelors', NULL, NULL, '2022-11-09 14:46:39', '2022-11-09 14:46:39', NULL),
(131, 8, 'building_restriction', 'Hospital', NULL, NULL, '2022-11-09 14:46:53', '2022-11-09 14:46:53', NULL),
(132, 8, 'building_restriction', 'Restaurant', NULL, NULL, '2022-11-09 14:47:02', '2022-11-09 14:47:02', NULL),
(133, 8, 'building_restriction', 'Company Guest House', NULL, NULL, '2022-11-09 14:47:16', '2022-11-09 14:47:16', NULL),
(134, 8, 'building_restriction', 'Night Call Center', NULL, NULL, '2022-11-09 14:47:28', '2022-11-09 14:47:28', NULL),
(135, 8, 'building_restriction', 'SPA & Massage Parlor', NULL, NULL, '2022-11-09 14:47:39', '2022-11-09 14:47:39', NULL),
(137, 8, 'building_architecture_type', 'Industrial', NULL, NULL, '2022-11-09 14:48:09', '2022-11-09 14:48:09', NULL),
(138, 8, 'building_architecture_type', 'Land', NULL, NULL, '2022-11-09 14:48:24', '2022-11-09 14:48:24', NULL),
(139, 8, 'building_architecture_type', 'Offices', NULL, NULL, '2022-11-09 14:48:29', '2022-11-09 14:48:29', NULL),
(142, 8, 'building_progress', 'Ready Possession', NULL, NULL, '2022-11-09 14:49:08', '2022-11-09 14:49:08', NULL),
(143, 8, 'building_progress', 'Under Construction', NULL, NULL, '2022-11-09 14:49:21', '2022-11-09 14:49:21', NULL),
(144, 8, 'enquiry_sales_comment', 'Direct Purchased', 5, NULL, '2022-11-09 14:50:46', '2022-11-09 14:50:46', NULL),
(145, 8, 'enquiry_sales_comment', 'Purchase from other Broker', 5, NULL, '2022-11-09 14:51:07', '2022-11-09 14:51:07', NULL),
(146, 8, 'enquiry_sales_comment', 'Office Visit Planned', 3, NULL, '2022-11-09 14:51:22', '2022-11-09 14:51:22', NULL),
(147, 8, 'enquiry_sales_comment', 'Project Discussion', 3, NULL, '2022-11-09 14:51:46', '2022-11-09 14:51:46', NULL),
(148, 8, 'enquiry_sales_comment', 'Already Purchased', 1, NULL, '2022-11-09 14:52:06', '2022-11-09 14:52:06', NULL),
(149, 8, 'enquiry_sales_comment', 'Brochure and details sent', 1, NULL, '2022-11-09 14:52:23', '2022-11-09 14:52:23', NULL),
(150, 8, 'enquiry_sales_comment', 'Phone Switch Off/Not Reachable', 1, NULL, '2022-11-09 14:53:48', '2022-11-09 14:53:48', NULL),
(151, 8, 'enquiry_sales_comment', 'Intrested in Property', 2, NULL, '2022-11-09 14:54:23', '2022-11-09 14:54:23', NULL),
(152, 8, 'enquiry_sales_comment', 'Other Option suggested', 2, NULL, '2022-11-09 14:54:37', '2022-11-09 14:54:37', NULL),
(153, 8, 'enquiry_sales_comment', 'Site Visit Done', 2, NULL, '2022-11-09 14:54:50', '2022-11-09 14:54:50', NULL),
(154, 8, 'enquiry_sales_comment', 'Postpone', 1, NULL, '2022-11-09 14:55:11', '2022-11-09 14:55:11', NULL),
(156, 8, 'property_specific_type', 'Showroom', 85, NULL, '2023-01-07 13:32:31', '2023-03-12 06:55:34', '2023-03-12 06:55:34'),
(158, 19, 'property_for', 'Rent', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(159, 19, 'property_for', 'Sell', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(161, 19, 'property_construction_type', 'Industrial', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(175, 19, 'property_specific_type', 'Villa/Bunglow', 162, NULL, '2023-02-03 07:48:38', '2023-03-05 11:53:19', '2023-08-15 14:56:46'),
(181, 19, 'property_furniture_type', 'Furnished', 162, NULL, '2023-02-03 07:48:38', '2023-02-03 11:16:40', '2023-08-26 00:12:18'),
(182, 19, 'property_furniture_type', 'Semi Furnished', 162, NULL, '2023-02-03 07:48:38', '2023-02-03 11:16:48', '2023-08-26 00:12:18'),
(183, 19, 'property_furniture_type', 'Unfurnished', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', '2023-08-26 00:12:18'),
(184, 19, 'property_furniture_type', 'Can Furnished', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', '2023-08-26 00:12:18'),
(191, 19, 'property_specific_type', 'Bungalow', 162, NULL, '2023-02-03 07:48:38', '2023-03-05 11:56:47', '2023-03-05 11:56:47'),
(205, 19, 'building_restriction', 'Bachelors', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(206, 19, 'building_restriction', 'Hospital', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(207, 19, 'building_restriction', 'Restaurant', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(208, 19, 'building_restriction', 'Company Guest House', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(209, 19, 'building_restriction', 'Night Call Center', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(210, 19, 'building_restriction', 'SPA & Massage Parlor', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(212, 19, 'building_architecture_type', 'Industrial', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(213, 19, 'building_architecture_type', 'Land', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(214, 19, 'building_architecture_type', 'Offices', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(217, 19, 'building_progress', 'Ready Possession', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(218, 19, 'building_progress', 'Under Construction', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(230, 19, 'property_zone', 'Zone A', 163, NULL, '2023-02-03 11:14:29', '2023-02-03 11:14:29', NULL),
(231, 19, 'property_zone', 'Zone B', 163, NULL, '2023-02-03 11:14:38', '2023-02-03 11:14:38', NULL),
(232, 19, 'property_construction_type', 'Residentia l& Commercial', NULL, NULL, '2023-02-05 10:07:28', '2023-02-05 10:07:28', NULL),
(236, 19, 'property_specific_type', 'Farm House', 162, NULL, '2023-03-05 11:54:42', '2023-03-05 11:54:42', '2023-03-05 11:54:42'),
(240, 8, 'property_specific_type', 'Independent House / Villa', 87, NULL, '2023-03-12 06:56:15', '2023-03-15 04:17:38', '2023-03-15 04:17:38'),
(241, 8, 'property_specific_type', 'Independent / Builder Floor', 87, NULL, '2023-03-12 06:56:27', '2023-03-15 04:17:40', '2023-03-15 04:17:40'),
(242, 8, 'property_specific_type', 'Plot/Land', 87, NULL, '2023-03-12 06:56:37', '2023-03-15 04:17:42', '2023-03-15 04:17:42'),
(243, 8, 'property_specific_type', '1 RK / Studio Apartment', 87, NULL, '2023-03-12 06:56:48', '2023-03-15 04:17:44', '2023-03-15 04:17:44'),
(244, 8, 'property_specific_type', 'Serviced Apartment', 87, NULL, '2023-03-12 06:57:01', '2023-03-15 04:17:49', '2023-03-15 04:17:49'),
(245, 8, 'property_specific_type', 'Farmhouse', 87, NULL, '2023-03-12 06:57:11', '2023-03-15 04:17:51', '2023-03-15 04:17:51'),
(246, 8, 'property_specific_type', 'Other', 87, NULL, '2023-03-12 06:57:24', '2023-03-15 04:17:56', '2023-03-15 04:17:56'),
(249, 8, 'property_specific_type', 'Plot/Land', 85, NULL, '2023-03-12 06:58:02', '2023-03-15 04:18:18', '2023-03-15 04:18:18'),
(250, 8, 'property_specific_type', 'Storage', 85, NULL, '2023-03-12 06:58:13', '2023-03-15 04:18:20', '2023-03-15 04:18:20'),
(251, 8, 'property_specific_type', 'Industry', 85, NULL, '2023-03-12 06:58:29', '2023-03-15 04:18:21', '2023-03-15 04:18:21'),
(252, 8, 'property_specific_type', 'Hospitality', 85, NULL, '2023-03-12 06:58:39', '2023-03-15 04:18:23', '2023-03-15 04:18:23'),
(253, 8, 'property_specific_type', 'Other', 85, NULL, '2023-03-12 06:58:49', '2023-03-15 04:18:25', '2023-03-15 04:18:25'),
(254, 8, 'property_specific_type', 'Flat', 87, 1, '2023-03-15 04:18:48', '2023-03-15 04:18:48', NULL),
(255, 8, 'property_specific_type', 'Vila/Bunglow', 87, 1, '2023-03-15 04:18:57', '2023-05-18 06:12:18', NULL),
(256, 8, 'property_specific_type', 'Land/Plot', 87, 1, '2023-03-15 04:19:05', '2023-05-18 06:27:32', NULL),
(257, 8, 'property_specific_type', 'Penthouse', 87, 1, '2023-03-15 04:19:13', '2023-04-11 07:13:52', NULL),
(258, 8, 'property_specific_type', 'Farmhouse', 87, 1, '2023-03-15 04:19:21', '2023-03-15 04:19:21', NULL),
(259, 8, 'property_specific_type', 'Office', 85, 1, '2023-03-15 04:20:49', '2023-03-15 04:20:49', NULL),
(260, 8, 'property_specific_type', 'Retail', 85, 1, '2023-03-15 04:20:56', '2023-03-15 04:20:56', NULL),
(261, 8, 'property_specific_type', 'Storage/industrial', 85, 1, '2023-03-15 04:21:06', '2023-05-18 07:01:14', NULL),
(262, 8, 'property_specific_type', 'Plot/Land', 85, 1, '2023-03-15 04:21:15', '2023-05-18 06:27:39', NULL),
(263, 23, 'property_for', 'Rent', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(264, 23, 'property_for', 'Sell', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(266, 23, 'property_construction_type', 'Industrial', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(276, 23, 'property_furniture_type', 'Furnished', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', '2023-08-26 00:12:18'),
(277, 23, 'property_furniture_type', 'Semi Furnished', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', '2023-08-26 00:12:18'),
(278, 23, 'property_furniture_type', 'Unfurnished', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', '2023-08-26 00:12:18'),
(279, 23, 'property_furniture_type', 'Can Furnished', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', '2023-08-26 00:12:18'),
(287, 23, 'building_restriction', 'Bachelors', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(288, 23, 'building_restriction', 'Hospital', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(289, 23, 'building_restriction', 'Restaurant', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(290, 23, 'building_restriction', 'Company Guest House', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(291, 23, 'building_restriction', 'Night Call Center', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(292, 23, 'building_restriction', 'SPA & Massage Parlor', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(294, 23, 'building_architecture_type', 'Industrial', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(295, 23, 'building_architecture_type', 'Land', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(296, 23, 'building_architecture_type', 'Offices', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(299, 23, 'building_progress', 'Ready Possession', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(300, 23, 'building_progress', 'Under Construction', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(335, 8, 'property_zone', 'INDUSTRIAL 2', NULL, NULL, '2023-05-09 09:50:15', '2023-05-09 09:50:15', NULL),
(339, 8, 'property_specific_type', 'Test', 85, NULL, '2023-05-28 12:40:38', '2023-05-28 12:41:03', '2023-05-28 12:41:03'),
(340, 8, 'property_specific_type', 'test', 85, NULL, '2023-05-28 12:41:08', '2023-05-28 12:41:37', '2023-05-28 12:41:37'),
(341, 8, 'property_specific_type', 'Test', 85, NULL, '2023-05-28 12:41:42', '2023-05-28 12:41:46', '2023-05-28 12:41:46'),
(342, 8, 'property_specific_type', 'xyz', 87, NULL, '2023-05-28 16:23:43', '2023-05-28 16:24:18', '2023-05-28 16:24:18'),
(343, 28, 'property_for', 'Rent', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(344, 28, 'property_for', 'Sell', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(346, 28, 'property_construction_type', 'Industrial', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(356, 28, 'property_furniture_type', 'Furnished', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', '2023-08-26 00:12:18'),
(357, 28, 'property_furniture_type', 'Semi Furnished', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', '2023-08-26 00:12:18'),
(358, 28, 'property_furniture_type', 'Unfurnished', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', '2023-08-26 00:12:18'),
(359, 28, 'property_furniture_type', 'Can Furnished', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', '2023-08-26 00:12:18'),
(367, 28, 'building_restriction', 'Bachelors', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(368, 28, 'building_restriction', 'Hospital', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(369, 28, 'building_restriction', 'Restaurant', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(370, 28, 'building_restriction', 'Company Guest House', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(371, 28, 'building_restriction', 'Night Call Center', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(372, 28, 'building_restriction', 'SPA & Massage Parlor', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(374, 28, 'building_architecture_type', 'Industrial', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(375, 28, 'building_architecture_type', 'Land', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(376, 28, 'building_architecture_type', 'Offices', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(379, 28, 'building_progress', 'Ready Possession', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(380, 28, 'building_progress', 'Under Construction', NULL, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(391, 28, 'property_plan_type', '2 BHK', 15, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(392, 28, 'property_plan_type', '3 BHK', 15, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(397, 28, 'property_plan_type', 'Industrial Land', 14, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(399, 28, 'property_plan_type', 'Land Or Plot', 16, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(400, 28, 'property_plan_type', 'Office Space', 13, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(401, 28, 'property_plan_type', 'Showroom/Shop Ground Floor', 13, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(402, 28, 'property_plan_type', 'Showroom/Shop 1st Floor', 13, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(403, 28, 'property_plan_type', 'Showroom/Shop 2nd Floor', 13, NULL, '2023-05-28 19:29:12', '2023-05-28 19:29:12', NULL),
(415, 30, 'property_for', 'Rent', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(416, 30, 'property_for', 'Sell', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(418, 30, 'property_construction_type', 'Industrial', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(428, 30, 'property_furniture_type', 'Furnished', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', '2023-08-26 00:12:18'),
(429, 30, 'property_furniture_type', 'Semi Furnished', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', '2023-08-26 00:12:18'),
(430, 30, 'property_furniture_type', 'Unfurnished', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', '2023-08-26 00:12:18'),
(431, 30, 'property_furniture_type', 'Can Furnished', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', '2023-08-26 00:12:18'),
(439, 30, 'building_restriction', 'Bachelors', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(440, 30, 'building_restriction', 'Hospital', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(441, 30, 'building_restriction', 'Restaurant', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(442, 30, 'building_restriction', 'Company Guest House', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(443, 30, 'building_restriction', 'Night Call Center', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(444, 30, 'building_restriction', 'SPA & Massage Parlor', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(446, 30, 'building_architecture_type', 'Industrial', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(447, 30, 'building_architecture_type', 'Land', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(448, 30, 'building_architecture_type', 'Offices', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(451, 30, 'building_progress', 'Ready Possession', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(452, 30, 'building_progress', 'Under Construction', NULL, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(463, 30, 'property_plan_type', '2 BHK', 15, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(464, 30, 'property_plan_type', '3 BHK', 15, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(469, 30, 'property_plan_type', 'Industrial Land', 14, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(471, 30, 'property_plan_type', 'Land Or Plot', 16, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(472, 30, 'property_plan_type', 'Office Space', 13, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(473, 30, 'property_plan_type', 'Showroom/Shop Ground Floor', 13, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(474, 30, 'property_plan_type', 'Showroom/Shop 1st Floor', 13, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(475, 30, 'property_plan_type', 'Showroom/Shop 2nd Floor', 13, NULL, '2023-08-05 23:49:06', '2023-08-05 23:49:06', NULL),
(487, 45, 'property_for', 'Rent', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(488, 45, 'property_for', 'Sell', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(490, 45, 'property_construction_type', 'Industrial', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(500, 45, 'property_furniture_type', 'Furnished', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', '2023-08-26 00:12:18'),
(501, 45, 'property_furniture_type', 'Semi Furnished', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', '2023-08-26 00:12:18'),
(502, 45, 'property_furniture_type', 'Unfurnished', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', '2023-08-26 00:12:18'),
(503, 45, 'property_furniture_type', 'Can Furnished', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', '2023-08-26 00:12:18'),
(511, 45, 'building_restriction', 'Bachelors', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(512, 45, 'building_restriction', 'Hospital', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(513, 45, 'building_restriction', 'Restaurant', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(514, 45, 'building_restriction', 'Company Guest House', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(515, 45, 'building_restriction', 'Night Call Center', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(516, 45, 'building_restriction', 'SPA & Massage Parlor', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(518, 45, 'building_architecture_type', 'Industrial', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(519, 45, 'building_architecture_type', 'Land', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(520, 45, 'building_architecture_type', 'Offices', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(523, 45, 'building_progress', 'Ready Possession', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(524, 45, 'building_progress', 'Under Construction', NULL, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(535, 45, 'property_plan_type', '2 BHK', 15, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(536, 45, 'property_plan_type', '3 BHK', 15, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(541, 45, 'property_plan_type', 'Industrial Land', 14, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(543, 45, 'property_plan_type', 'Land Or Plot', 16, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(544, 45, 'property_plan_type', 'Office Space', 13, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(545, 45, 'property_plan_type', 'Showroom/Shop Ground Floor', 13, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(546, 45, 'property_plan_type', 'Showroom/Shop 1st Floor', 13, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(547, 45, 'property_plan_type', 'Showroom/Shop 2nd Floor', 13, NULL, '2023-08-18 18:10:57', '2023-08-18 18:10:57', NULL),
(559, 39, 'property_zone', 'Agri', NULL, NULL, '2023-09-19 13:59:37', '2023-09-19 13:59:37', NULL),
(560, 39, 'property_zone', 'institutional', NULL, NULL, '2023-09-19 13:59:57', '2023-09-19 13:59:57', NULL),
(561, 39, 'property_zone', 'R1', NULL, NULL, '2023-09-19 14:00:07', '2023-09-19 14:00:07', NULL),
(562, 39, 'property_zone', 'C1', NULL, NULL, '2023-09-19 14:00:13', '2023-09-19 14:00:13', NULL),
(563, 39, 'property_zone', 'R2', NULL, NULL, '2023-09-19 14:00:21', '2023-09-19 14:00:21', NULL),
(564, 39, 'property_zone', 'r3', NULL, NULL, '2023-09-19 14:00:32', '2023-09-19 14:00:32', NULL),
(565, 39, 'property_zone', 'agri prime', NULL, NULL, '2023-09-19 14:00:48', '2023-10-25 17:37:08', '2023-10-25 17:37:08'),
(566, 39, 'property_zone', 'New', NULL, NULL, '2023-10-04 16:06:17', '2023-10-04 16:06:21', '2023-10-04 16:06:21'),
(567, 39, 'enquiry_progress', '___#1a1a51', NULL, NULL, '2023-10-05 07:11:04', '2023-10-25 17:29:23', '2023-10-25 17:29:23'),
(568, 39, 'property_zone', 'testing', NULL, NULL, '2023-10-25 16:52:59', '2023-10-25 16:52:59', NULL),
(569, 39, 'building_progress', 'testing', NULL, NULL, '2023-10-25 16:54:11', '2023-10-25 16:54:11', NULL),
(570, 39, 'property_zone', 'testing', NULL, NULL, '2023-10-25 16:55:33', '2023-10-25 16:55:33', NULL),
(571, 39, 'enquiry_progress', 'testing', NULL, NULL, '2023-10-25 17:38:40', '2023-10-25 17:38:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dropdown_settings_copy`
--

CREATE TABLE `dropdown_settings_copy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dropdown_for` varchar(100) DEFAULT NULL,
  `name` varchar(180) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `editable` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropdown_settings_copy`
--

INSERT INTO `dropdown_settings_copy` (`id`, `user_id`, `dropdown_for`, `name`, `parent_id`, `editable`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'property_for', 'Rent', NULL, NULL, '2022-10-19 10:12:41', '2022-10-19 10:12:41', NULL),
(2, 1, 'property_for', 'Sell', NULL, NULL, '2022-10-19 10:12:48', '2022-10-24 11:35:51', NULL),
(13, 1, 'property_construction_type', 'Commercial', NULL, NULL, '2022-10-24 11:30:19', '2022-10-24 11:30:19', NULL),
(14, 1, 'property_construction_type', 'Industrial', NULL, NULL, '2022-10-24 11:30:25', '2022-10-24 11:30:25', NULL),
(15, 1, 'property_construction_type', 'Residential', NULL, NULL, '2022-10-24 11:30:33', '2022-10-24 11:30:33', NULL),
(16, 1, 'property_construction_type', 'Land/Plot', NULL, NULL, '2022-10-24 11:30:39', '2022-10-24 11:30:39', NULL),
(17, 1, 'property_priority_type', 'P1', NULL, NULL, '2022-10-24 11:30:51', '2022-10-24 11:30:51', NULL),
(18, 1, 'property_priority_type', 'P2', NULL, NULL, '2022-10-24 11:30:56', '2022-10-24 11:30:56', NULL),
(19, 1, 'property_priority_type', 'P3', NULL, NULL, '2022-10-24 11:31:00', '2022-10-24 11:31:00', NULL),
(20, 1, 'property_priority_type', 'P4', NULL, NULL, '2022-10-24 11:31:05', '2022-10-24 11:31:05', NULL),
(21, 1, 'property_specific_type', 'Agriculture Land', 16, NULL, '2022-10-24 11:31:28', '2022-10-24 11:31:28', NULL),
(22, 1, 'property_specific_type', 'Corporate House', 13, NULL, '2022-10-24 11:32:40', '2022-10-24 11:32:40', NULL),
(23, 1, 'property_specific_type', 'Godown', 14, NULL, '2022-10-24 11:32:55', '2022-10-24 11:32:55', NULL),
(24, 1, 'property_specific_type', 'NA Land', 16, NULL, '2022-10-24 11:33:11', '2022-10-24 11:33:11', NULL),
(25, 1, 'property_specific_type', 'Pent House', 15, NULL, '2022-10-24 11:33:25', '2022-10-24 11:33:25', NULL),
(26, 1, 'property_specific_type', 'Row House', 15, NULL, '2022-10-24 11:33:33', '2022-10-24 11:33:33', NULL),
(27, 1, 'property_specific_type', 'Tenament', 15, NULL, '2022-10-24 11:33:51', '2022-10-24 11:33:51', NULL),
(28, 1, 'property_specific_type', 'Villa', 15, NULL, '2022-10-24 11:34:01', '2022-10-24 11:34:01', NULL),
(29, 1, 'property_specific_type', 'Basement', 13, NULL, '2022-10-24 11:34:27', '2022-10-24 11:34:27', NULL),
(30, 1, 'property_specific_type', 'Industrial Shed', 14, NULL, '2022-10-24 11:34:41', '2022-10-24 11:34:41', NULL),
(31, 1, 'property_source', 'Advertise', NULL, NULL, '2022-10-24 11:34:57', '2022-10-24 11:34:57', NULL),
(32, 1, 'property_source', 'Reference', NULL, NULL, '2022-10-24 11:35:04', '2022-10-24 11:35:04', NULL),
(33, 1, 'property_source', '99 Acres', NULL, NULL, '2022-10-24 11:35:09', '2022-10-24 11:35:09', NULL),
(34, 1, 'property_furniture_type', 'Furnished', NULL, NULL, '2022-10-29 06:33:20', '2022-10-29 06:33:20', NULL),
(35, 1, 'property_furniture_type', 'Semi Furnished', NULL, NULL, '2022-10-29 06:33:28', '2022-10-29 06:33:28', NULL),
(36, 1, 'property_furniture_type', 'Unfurnished', NULL, NULL, '2022-10-29 06:33:34', '2022-10-29 06:33:34', NULL),
(37, 1, 'property_furniture_type', 'Can Furnished', NULL, NULL, '2022-10-29 06:33:43', '2022-10-29 06:33:43', NULL),
(38, 1, 'property_owner_type', 'Builder', NULL, NULL, '2022-10-29 06:33:55', '2022-10-29 06:33:55', NULL),
(39, 1, 'property_owner_type', 'Individual Owner', NULL, NULL, '2022-10-29 06:34:04', '2022-10-29 06:34:04', NULL),
(40, 1, 'property_owner_type', 'Investor', NULL, NULL, '2022-10-29 06:34:10', '2022-10-29 06:34:10', NULL),
(41, 1, 'property_plan_type', '2 BHK', 15, NULL, '2022-11-08 05:48:24', '2022-11-08 05:48:24', NULL),
(42, 1, 'property_plan_type', '3 BHK', 15, NULL, '2022-11-08 05:48:41', '2022-11-09 14:43:10', NULL),
(43, 1, 'property_specific_type', 'Flat', 15, NULL, '2022-11-08 14:59:44', '2022-11-08 14:59:44', NULL),
(44, 1, 'property_specific_type', 'Bungalow', 15, NULL, '2022-11-08 15:00:00', '2022-11-08 15:00:00', NULL),
(45, 1, 'property_measurement_type', 'Sq.Ft.', NULL, NULL, '2022-11-09 14:42:04', '2022-11-09 14:42:04', NULL),
(46, 1, 'property_measurement_type', 'Sq.Yard', NULL, NULL, '2022-11-09 14:42:16', '2022-11-09 14:42:16', NULL),
(47, 1, 'property_measurement_type', 'Sq.Meter', NULL, NULL, '2022-11-09 14:42:27', '2022-11-09 14:42:27', NULL),
(48, 1, 'property_measurement_type', 'VIGHA', NULL, NULL, '2022-11-09 14:42:43', '2022-11-09 14:42:43', NULL),
(49, 1, 'property_plan_type', 'Basement', 13, NULL, '2022-11-09 14:43:26', '2022-11-09 14:43:26', NULL),
(50, 1, 'property_plan_type', 'Godown', 14, NULL, '2022-11-09 14:43:45', '2022-11-09 14:43:45', NULL),
(51, 1, 'property_plan_type', 'Industrial Land', 14, NULL, '2022-11-09 14:44:02', '2022-11-09 14:44:02', NULL),
(52, 1, 'property_plan_type', 'Industrial Shed', 14, NULL, '2022-11-09 14:44:16', '2022-11-09 14:44:16', NULL),
(53, 1, 'property_plan_type', 'Land Or Plot', 16, NULL, '2022-11-09 14:44:47', '2022-11-09 14:44:47', NULL),
(54, 1, 'property_plan_type', 'Office Space', 13, NULL, '2022-11-09 14:45:07', '2022-11-09 14:45:07', NULL),
(55, 1, 'property_plan_type', 'Showroom/Shop Ground Floor', 13, NULL, '2022-11-09 14:45:37', '2022-11-09 14:45:37', NULL),
(56, 1, 'property_plan_type', 'Showroom/Shop 1st Floor', 13, NULL, '2022-11-09 14:45:43', '2022-11-09 14:45:43', NULL),
(57, 1, 'property_plan_type', 'Showroom/Shop 2nd Floor', 13, NULL, '2022-11-09 14:45:55', '2022-11-09 14:45:55', NULL),
(58, 1, 'building_restriction', 'Bachelors', NULL, NULL, '2022-11-09 14:46:39', '2022-11-09 14:46:39', NULL),
(59, 1, 'building_restriction', 'Hospital', NULL, NULL, '2022-11-09 14:46:53', '2022-11-09 14:46:53', NULL),
(60, 1, 'building_restriction', 'Restaurant', NULL, NULL, '2022-11-09 14:47:02', '2022-11-09 14:47:02', NULL),
(61, 1, 'building_restriction', 'Company Guest House', NULL, NULL, '2022-11-09 14:47:16', '2022-11-09 14:47:16', NULL),
(62, 1, 'building_restriction', 'Night Call Center', NULL, NULL, '2022-11-09 14:47:28', '2022-11-09 14:47:28', NULL),
(63, 1, 'building_restriction', 'SPA & Massage Parlor', NULL, NULL, '2022-11-09 14:47:39', '2022-11-09 14:47:39', NULL),
(64, 1, 'building_architecture_type', 'Basement', NULL, NULL, '2022-11-09 14:47:55', '2022-11-09 14:47:55', NULL),
(65, 1, 'building_architecture_type', 'Industrial', NULL, NULL, '2022-11-09 14:48:09', '2022-11-09 14:48:09', NULL),
(66, 1, 'building_architecture_type', 'Land', NULL, NULL, '2022-11-09 14:48:24', '2022-11-09 14:48:24', NULL),
(67, 1, 'building_architecture_type', 'Offices', NULL, NULL, '2022-11-09 14:48:29', '2022-11-09 14:48:29', NULL),
(68, 1, 'building_architecture_type', 'Residential', NULL, NULL, '2022-11-09 14:48:43', '2022-11-09 14:48:43', NULL),
(69, 1, 'building_architecture_type', 'Retail', NULL, NULL, '2022-11-09 14:48:53', '2022-11-09 14:48:53', NULL),
(70, 1, 'building_progress', 'Ready Possession', NULL, NULL, '2022-11-09 14:49:08', '2022-11-09 14:49:08', NULL),
(71, 1, 'building_progress', 'Under Construction', NULL, NULL, '2022-11-09 14:49:21', '2022-11-09 14:49:21', NULL),
(72, 1, 'enquiry_sales_comment', 'Direct Purchased', 5, NULL, '2022-11-09 14:50:46', '2022-11-09 14:50:46', NULL),
(73, 1, 'enquiry_sales_comment', 'Purchase from other Broker', 5, NULL, '2022-11-09 14:51:07', '2022-11-09 14:51:07', NULL),
(74, 1, 'enquiry_sales_comment', 'Office Visit Planned', 3, NULL, '2022-11-09 14:51:22', '2022-11-09 14:51:22', NULL),
(75, 1, 'enquiry_sales_comment', 'Project Discussion', 3, NULL, '2022-11-09 14:51:46', '2022-11-09 14:51:46', NULL),
(76, 1, 'enquiry_sales_comment', 'Already Purchased', 1, NULL, '2022-11-09 14:52:06', '2022-11-09 14:52:06', NULL),
(77, 1, 'enquiry_sales_comment', 'Brochure and details sent', 1, NULL, '2022-11-09 14:52:23', '2022-11-09 14:52:23', NULL),
(78, 1, 'enquiry_sales_comment', 'Phone Switch Off/Not Reachable', 1, NULL, '2022-11-09 14:53:48', '2022-11-09 14:53:48', NULL),
(79, 1, 'enquiry_sales_comment', 'Intrested in Property', 2, NULL, '2022-11-09 14:54:23', '2022-11-09 14:54:23', NULL),
(80, 1, 'enquiry_sales_comment', 'Other Option suggested', 2, NULL, '2022-11-09 14:54:37', '2022-11-09 14:54:37', NULL),
(81, 1, 'enquiry_sales_comment', 'Site Visit Done', 2, NULL, '2022-11-09 14:54:50', '2022-11-09 14:54:50', NULL),
(82, 1, 'enquiry_sales_comment', 'Postpone', 1, NULL, '2022-11-09 14:55:11', '2022-11-09 14:55:11', NULL),
(83, 8, 'property_for', 'Rent', NULL, NULL, '2022-10-19 10:12:41', '2022-10-19 10:12:41', NULL),
(84, 8, 'property_for', 'Sell', NULL, NULL, '2022-10-19 10:12:48', '2022-10-24 11:35:51', NULL),
(85, 8, 'property_construction_type', 'Commercial', NULL, 1, '2022-10-24 11:30:19', '2022-10-24 11:30:19', NULL),
(86, 8, 'property_construction_type', 'Industrial', NULL, NULL, '2022-10-24 11:30:25', '2023-03-12 06:55:41', '2023-03-12 06:55:41'),
(87, 8, 'property_construction_type', 'Residential', NULL, 1, '2022-10-24 11:30:33', '2022-10-24 11:30:33', NULL),
(88, 8, 'property_construction_type', 'Land/Plot', NULL, NULL, '2022-10-24 11:30:39', '2023-03-12 06:55:38', '2023-03-12 06:55:38'),
(89, 8, 'property_priority_type', 'P1', NULL, NULL, '2022-10-24 11:30:51', '2022-10-24 11:30:51', NULL),
(90, 8, 'property_priority_type', 'P2', NULL, NULL, '2022-10-24 11:30:56', '2022-10-24 11:30:56', NULL),
(91, 8, 'property_priority_type', 'P3', NULL, NULL, '2022-10-24 11:31:00', '2022-10-24 11:31:00', NULL),
(92, 8, 'property_priority_type', 'P4', NULL, NULL, '2022-10-24 11:31:05', '2022-10-24 11:31:05', NULL),
(93, 8, 'property_specific_type', 'Agriculture Land', 88, NULL, '2022-10-24 11:31:28', '2023-03-12 06:55:11', '2023-03-12 06:55:11'),
(94, 8, 'property_specific_type', 'Corporate House', 85, NULL, '2022-10-24 11:32:40', '2023-03-12 06:55:13', '2023-03-12 06:55:13'),
(95, 8, 'property_specific_type', 'Godown', 86, NULL, '2022-10-24 11:32:55', '2023-03-12 06:55:14', '2023-03-12 06:55:14'),
(96, 8, 'property_specific_type', 'NA Land', 88, NULL, '2022-10-24 11:33:11', '2023-03-12 06:55:16', '2023-03-12 06:55:16'),
(97, 8, 'property_specific_type', 'Pent House', 87, NULL, '2022-10-24 11:33:25', '2023-03-12 06:55:17', '2023-03-12 06:55:17'),
(98, 8, 'property_specific_type', 'Row House', 87, NULL, '2022-10-24 11:33:33', '2023-03-12 06:55:18', '2023-03-12 06:55:18'),
(99, 8, 'property_specific_type', 'Tenament', 87, NULL, '2022-10-24 11:33:51', '2023-03-12 06:55:20', '2023-03-12 06:55:20'),
(100, 8, 'property_specific_type', 'Villa', 87, NULL, '2022-10-24 11:34:01', '2023-03-12 06:55:23', '2023-03-12 06:55:23'),
(101, 8, 'property_specific_type', 'Basement', 85, NULL, '2022-10-24 11:34:27', '2023-03-12 06:55:24', '2023-03-12 06:55:24'),
(102, 8, 'property_specific_type', 'Industrial Shed', 86, NULL, '2022-10-24 11:34:41', '2023-03-12 06:55:26', '2023-03-12 06:55:26'),
(103, 8, 'property_source', 'Advertise', NULL, NULL, '2022-10-24 11:34:57', '2022-10-24 11:34:57', NULL),
(104, 8, 'property_source', 'Reference', NULL, NULL, '2022-10-24 11:35:04', '2022-10-24 11:35:04', NULL),
(105, 8, 'property_source', '99 Acres', NULL, NULL, '2022-10-24 11:35:09', '2022-10-24 11:35:09', NULL),
(106, 8, 'property_furniture_type', 'Furnished', NULL, NULL, '2022-10-29 06:33:20', '2022-10-29 06:33:20', NULL),
(107, 8, 'property_furniture_type', 'Semi Furnished', NULL, NULL, '2022-10-29 06:33:28', '2022-10-29 06:33:28', NULL),
(108, 8, 'property_furniture_type', 'Unfurnished', NULL, NULL, '2022-10-29 06:33:34', '2022-10-29 06:33:34', NULL),
(109, 8, 'property_furniture_type', 'Can Furnished', NULL, NULL, '2022-10-29 06:33:43', '2022-10-29 06:33:43', NULL),
(110, 8, 'property_owner_type', 'Builder', NULL, NULL, '2022-10-29 06:33:55', '2022-10-29 06:33:55', NULL),
(111, 8, 'property_owner_type', 'Individual Owner', NULL, NULL, '2022-10-29 06:34:04', '2022-10-29 06:34:04', NULL),
(112, 8, 'property_owner_type', 'Investor', NULL, NULL, '2022-10-29 06:34:10', '2022-10-29 06:34:10', NULL),
(113, 8, 'property_plan_type', '2 BHK', 87, NULL, '2022-11-08 05:48:24', '2022-12-26 15:57:14', NULL),
(114, 8, 'property_plan_type', '3 BHK', 87, NULL, '2022-11-08 05:48:41', '2022-12-26 15:57:19', NULL),
(115, 8, 'property_specific_type', 'Flat', 87, NULL, '2022-11-08 14:59:44', '2023-03-12 06:55:27', '2023-03-12 06:55:27'),
(116, 8, 'property_specific_type', 'Bungalow', 87, NULL, '2022-11-08 15:00:00', '2023-03-12 06:55:31', '2023-03-12 06:55:31'),
(117, 8, 'property_measurement_type', 'Sq.Ft.', NULL, NULL, '2022-11-09 14:42:04', '2022-11-09 14:42:04', NULL),
(118, 8, 'property_measurement_type', 'Sq.Yard', NULL, NULL, '2022-11-09 14:42:16', '2022-11-09 14:42:16', NULL),
(119, 8, 'property_measurement_type', 'Sq.Meter', NULL, NULL, '2022-11-09 14:42:27', '2022-11-09 14:42:27', NULL),
(120, 8, 'property_measurement_type', 'VIGHA', NULL, NULL, '2022-11-09 14:42:43', '2022-11-09 14:42:43', NULL),
(121, 8, 'property_plan_type', 'Basement', 85, NULL, '2022-11-09 14:43:26', '2022-12-26 15:57:25', NULL),
(122, 8, 'property_plan_type', 'Godown', 86, NULL, '2022-11-09 14:43:45', '2022-12-26 15:57:32', NULL),
(123, 8, 'property_plan_type', 'Industrial Land', 88, NULL, '2022-11-09 14:44:02', '2022-12-26 15:57:37', NULL),
(124, 8, 'property_plan_type', 'Industrial Shed', 86, NULL, '2022-11-09 14:44:16', '2022-12-26 15:57:43', NULL),
(125, 8, 'property_plan_type', 'Land Or Plot', 88, NULL, '2022-11-09 14:44:47', '2022-12-26 15:57:48', NULL),
(126, 8, 'property_plan_type', 'Office Space', 85, NULL, '2022-11-09 14:45:07', '2022-12-26 15:57:54', NULL),
(127, 8, 'property_plan_type', 'Showroom/Shop Ground Floor', 85, NULL, '2022-11-09 14:45:37', '2022-12-26 15:58:00', NULL),
(128, 8, 'property_plan_type', 'Showroom/Shop 1st Floor', 85, NULL, '2022-11-09 14:45:43', '2022-12-26 15:58:06', NULL),
(129, 8, 'property_plan_type', 'Showroom/Shop 2nd Floor', 85, NULL, '2022-11-09 14:45:55', '2022-12-26 15:58:12', NULL),
(130, 8, 'building_restriction', 'Bachelors', NULL, NULL, '2022-11-09 14:46:39', '2022-11-09 14:46:39', NULL),
(131, 8, 'building_restriction', 'Hospital', NULL, NULL, '2022-11-09 14:46:53', '2022-11-09 14:46:53', NULL),
(132, 8, 'building_restriction', 'Restaurant', NULL, NULL, '2022-11-09 14:47:02', '2022-11-09 14:47:02', NULL),
(133, 8, 'building_restriction', 'Company Guest House', NULL, NULL, '2022-11-09 14:47:16', '2022-11-09 14:47:16', NULL),
(134, 8, 'building_restriction', 'Night Call Center', NULL, NULL, '2022-11-09 14:47:28', '2022-11-09 14:47:28', NULL),
(135, 8, 'building_restriction', 'SPA & Massage Parlor', NULL, NULL, '2022-11-09 14:47:39', '2022-11-09 14:47:39', NULL),
(136, 8, 'building_architecture_type', 'Basement', NULL, NULL, '2022-11-09 14:47:55', '2022-11-09 14:47:55', NULL),
(137, 8, 'building_architecture_type', 'Industrial', NULL, NULL, '2022-11-09 14:48:09', '2022-11-09 14:48:09', NULL),
(138, 8, 'building_architecture_type', 'Land', NULL, NULL, '2022-11-09 14:48:24', '2022-11-09 14:48:24', NULL),
(139, 8, 'building_architecture_type', 'Offices', NULL, NULL, '2022-11-09 14:48:29', '2022-11-09 14:48:29', NULL),
(140, 8, 'building_architecture_type', 'Residential', NULL, NULL, '2022-11-09 14:48:43', '2022-11-09 14:48:43', NULL),
(141, 8, 'building_architecture_type', 'Retail', NULL, NULL, '2022-11-09 14:48:53', '2022-11-09 14:48:53', NULL),
(142, 8, 'building_progress', 'Ready Possession', NULL, NULL, '2022-11-09 14:49:08', '2022-11-09 14:49:08', NULL),
(143, 8, 'building_progress', 'Under Construction', NULL, NULL, '2022-11-09 14:49:21', '2022-11-09 14:49:21', NULL),
(144, 8, 'enquiry_sales_comment', 'Direct Purchased', 5, NULL, '2022-11-09 14:50:46', '2022-11-09 14:50:46', NULL),
(145, 8, 'enquiry_sales_comment', 'Purchase from other Broker', 5, NULL, '2022-11-09 14:51:07', '2022-11-09 14:51:07', NULL),
(146, 8, 'enquiry_sales_comment', 'Office Visit Planned', 3, NULL, '2022-11-09 14:51:22', '2022-11-09 14:51:22', NULL),
(147, 8, 'enquiry_sales_comment', 'Project Discussion', 3, NULL, '2022-11-09 14:51:46', '2022-11-09 14:51:46', NULL),
(148, 8, 'enquiry_sales_comment', 'Already Purchased', 1, NULL, '2022-11-09 14:52:06', '2022-11-09 14:52:06', NULL),
(149, 8, 'enquiry_sales_comment', 'Brochure and details sent', 1, NULL, '2022-11-09 14:52:23', '2022-11-09 14:52:23', NULL),
(150, 8, 'enquiry_sales_comment', 'Phone Switch Off/Not Reachable', 1, NULL, '2022-11-09 14:53:48', '2022-11-09 14:53:48', NULL),
(151, 8, 'enquiry_sales_comment', 'Intrested in Property', 2, NULL, '2022-11-09 14:54:23', '2022-11-09 14:54:23', NULL),
(152, 8, 'enquiry_sales_comment', 'Other Option suggested', 2, NULL, '2022-11-09 14:54:37', '2022-11-09 14:54:37', NULL),
(153, 8, 'enquiry_sales_comment', 'Site Visit Done', 2, NULL, '2022-11-09 14:54:50', '2022-11-09 14:54:50', NULL),
(154, 8, 'enquiry_sales_comment', 'Postpone', 1, NULL, '2022-11-09 14:55:11', '2022-11-09 14:55:11', NULL),
(155, 8, 'property_specific_type', 'office', 85, NULL, '2023-01-07 13:32:16', '2023-03-12 06:55:32', '2023-03-12 06:55:32'),
(156, 8, 'property_specific_type', 'Showroom', 85, NULL, '2023-01-07 13:32:31', '2023-03-12 06:55:34', '2023-03-12 06:55:34'),
(157, 8, 'property_plan_type', '1 BHK', 87, NULL, '2023-01-08 08:46:25', '2023-01-08 08:46:25', NULL),
(158, 19, 'property_for', 'Rent', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(159, 19, 'property_for', 'Sell', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(160, 19, 'property_construction_type', 'Commercial', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(161, 19, 'property_construction_type', 'Industrial', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(162, 19, 'property_construction_type', 'Residential', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(163, 19, 'property_construction_type', 'Land/Plot', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(164, 19, 'property_priority_type', 'P1', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(165, 19, 'property_priority_type', 'P2', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(166, 19, 'property_priority_type', 'P3', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(167, 19, 'property_priority_type', 'P4', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(168, 19, 'property_specific_type', 'Agriculture Land', 160, NULL, '2023-02-03 07:48:38', '2023-03-05 11:55:05', NULL),
(169, 19, 'property_specific_type', 'Corporate House', 160, NULL, '2023-02-03 07:48:38', '2023-02-03 11:13:35', NULL),
(170, 19, 'property_specific_type', 'Storage', 160, NULL, '2023-02-03 07:48:38', '2023-03-05 11:55:27', NULL),
(171, 19, 'property_specific_type', 'NA Land', 160, NULL, '2023-02-03 07:48:38', '2023-03-05 11:56:16', NULL),
(172, 19, 'property_specific_type', 'Pent House', 162, NULL, '2023-02-03 07:48:38', '2023-02-03 11:13:06', NULL),
(173, 19, 'property_specific_type', 'Row House', 162, NULL, '2023-02-03 07:48:38', '2023-02-03 11:13:47', NULL),
(174, 19, 'property_specific_type', 'Tenament', 162, NULL, '2023-02-03 07:48:38', '2023-02-03 11:13:13', NULL),
(175, 19, 'property_specific_type', 'Villa/Bunglow', 162, NULL, '2023-02-03 07:48:38', '2023-03-05 11:53:19', NULL),
(176, 19, 'property_specific_type', 'Basement', 160, NULL, '2023-02-03 07:48:38', '2023-02-03 11:13:18', NULL),
(177, 19, 'property_specific_type', 'Industrial Shed', 161, NULL, '2023-02-03 07:48:38', '2023-03-05 11:56:38', '2023-03-05 11:56:38'),
(178, 19, 'property_source', 'Advertise', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(179, 19, 'property_source', 'Reference', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(180, 19, 'property_source', '99 Acres', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(181, 19, 'property_furniture_type', 'Furnished', 162, NULL, '2023-02-03 07:48:38', '2023-02-03 11:16:40', NULL),
(182, 19, 'property_furniture_type', 'Semi Furnished', 162, NULL, '2023-02-03 07:48:38', '2023-02-03 11:16:48', NULL),
(183, 19, 'property_furniture_type', 'Unfurnished', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(184, 19, 'property_furniture_type', 'Can Furnished', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(185, 19, 'property_owner_type', 'Builder', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(186, 19, 'property_owner_type', 'Individual Owner', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(187, 19, 'property_owner_type', 'Investor', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(188, 19, 'property_plan_type', '2 BHK', 162, NULL, '2023-02-03 07:48:38', '2023-02-03 11:15:57', NULL),
(189, 19, 'property_plan_type', '3 BHK', 162, NULL, '2023-02-03 07:48:38', '2023-02-03 11:15:52', NULL),
(190, 19, 'property_specific_type', 'Flat/Apartment', 162, NULL, '2023-02-03 07:48:38', '2023-03-05 11:52:56', NULL),
(191, 19, 'property_specific_type', 'Bungalow', 162, NULL, '2023-02-03 07:48:38', '2023-03-05 11:56:47', '2023-03-05 11:56:47'),
(192, 19, 'property_measurement_type', 'Sq.Ft.', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(193, 19, 'property_measurement_type', 'Sq.Yard', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(194, 19, 'property_measurement_type', 'Sq.Meter', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(195, 19, 'property_measurement_type', 'VIGHA', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(196, 19, 'property_plan_type', 'Basement', 160, NULL, '2023-02-03 07:48:38', '2023-02-03 11:16:04', NULL),
(197, 19, 'property_plan_type', 'Godown', 161, NULL, '2023-02-03 07:48:38', '2023-02-03 11:16:09', NULL),
(198, 19, 'property_plan_type', 'Industrial Land', 163, NULL, '2023-02-03 07:48:38', '2023-02-03 11:16:14', NULL),
(199, 19, 'property_plan_type', 'Industrial Shed', 161, NULL, '2023-02-03 07:48:38', '2023-02-03 11:16:19', NULL),
(200, 19, 'property_plan_type', 'Land Or Plot', 163, NULL, '2023-02-03 07:48:38', '2023-02-03 11:16:26', NULL),
(201, 19, 'property_plan_type', 'Office Space', 160, NULL, '2023-02-03 07:48:38', '2023-02-03 11:16:31', NULL),
(202, 19, 'property_plan_type', 'Showroom/Shop Ground Floor', 3, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(203, 19, 'property_plan_type', 'Showroom/Shop 1st Floor', 3, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(204, 19, 'property_plan_type', 'Showroom/Shop 2nd Floor', 3, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(205, 19, 'building_restriction', 'Bachelors', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(206, 19, 'building_restriction', 'Hospital', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(207, 19, 'building_restriction', 'Restaurant', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(208, 19, 'building_restriction', 'Company Guest House', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(209, 19, 'building_restriction', 'Night Call Center', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(210, 19, 'building_restriction', 'SPA & Massage Parlor', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(211, 19, 'building_architecture_type', 'Basement', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(212, 19, 'building_architecture_type', 'Industrial', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(213, 19, 'building_architecture_type', 'Land', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(214, 19, 'building_architecture_type', 'Offices', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(215, 19, 'building_architecture_type', 'Residential', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(216, 19, 'building_architecture_type', 'Retail', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(217, 19, 'building_progress', 'Ready Possession', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(218, 19, 'building_progress', 'Under Construction', NULL, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(219, 19, 'enquiry_sales_comment', 'Direct Purchased', 5, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(220, 19, 'enquiry_sales_comment', 'Purchase from other Broker', 5, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(221, 19, 'enquiry_sales_comment', 'Office Visit Planned', 3, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(222, 19, 'enquiry_sales_comment', 'Project Discussion', 3, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(223, 19, 'enquiry_sales_comment', 'Already Purchased', 1, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(224, 19, 'enquiry_sales_comment', 'Brochure and details sent', 1, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(225, 19, 'enquiry_sales_comment', 'Phone Switch Off/Not Reachable', 1, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(226, 19, 'enquiry_sales_comment', 'Intrested in Property', 2, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(227, 19, 'enquiry_sales_comment', 'Other Option suggested', 2, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(228, 19, 'enquiry_sales_comment', 'Site Visit Done', 2, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(229, 19, 'enquiry_sales_comment', 'Postpone', 1, NULL, '2023-02-03 07:48:38', '2023-02-03 07:48:38', NULL),
(230, 19, 'property_zone', 'Zone A', 163, NULL, '2023-02-03 11:14:29', '2023-02-03 11:14:29', NULL),
(231, 19, 'property_zone', 'Zone B', 163, NULL, '2023-02-03 11:14:38', '2023-02-03 11:14:38', NULL),
(232, 19, 'property_construction_type', 'Residentia l& Commercial', NULL, NULL, '2023-02-05 10:07:28', '2023-02-05 10:07:28', NULL),
(233, 19, 'enquiry_progress', 'Test___#ad721f', NULL, NULL, '2023-02-20 18:12:54', '2023-02-20 18:12:54', NULL),
(234, 19, 'property_specific_type', 'Land/Plot', 162, NULL, '2023-03-05 11:53:52', '2023-03-05 11:53:52', NULL),
(235, 19, 'property_specific_type', 'Land/Plot', 160, NULL, '2023-03-05 11:54:08', '2023-03-05 11:54:08', NULL),
(236, 19, 'property_specific_type', 'Farm House', 162, NULL, '2023-03-05 11:54:42', '2023-03-05 11:54:42', NULL),
(237, 19, 'property_specific_type', 'Office', 160, NULL, '2023-03-05 11:58:31', '2023-03-05 11:58:31', NULL),
(238, 19, 'property_specific_type', 'Retail', 160, NULL, '2023-03-05 11:58:46', '2023-03-05 11:58:46', NULL),
(239, 8, 'property_specific_type', 'Flat/Apartment', 87, NULL, '2023-03-12 06:56:02', '2023-03-15 04:16:57', '2023-03-15 04:16:57'),
(240, 8, 'property_specific_type', 'Independent House / Villa', 87, NULL, '2023-03-12 06:56:15', '2023-03-15 04:17:38', '2023-03-15 04:17:38'),
(241, 8, 'property_specific_type', 'Independent / Builder Floor', 87, NULL, '2023-03-12 06:56:27', '2023-03-15 04:17:40', '2023-03-15 04:17:40'),
(242, 8, 'property_specific_type', 'Plot/Land', 87, NULL, '2023-03-12 06:56:37', '2023-03-15 04:17:42', '2023-03-15 04:17:42'),
(243, 8, 'property_specific_type', '1 RK / Studio Apartment', 87, NULL, '2023-03-12 06:56:48', '2023-03-15 04:17:44', '2023-03-15 04:17:44'),
(244, 8, 'property_specific_type', 'Serviced Apartment', 87, NULL, '2023-03-12 06:57:01', '2023-03-15 04:17:49', '2023-03-15 04:17:49'),
(245, 8, 'property_specific_type', 'Farmhouse', 87, NULL, '2023-03-12 06:57:11', '2023-03-15 04:17:51', '2023-03-15 04:17:51'),
(246, 8, 'property_specific_type', 'Other', 87, NULL, '2023-03-12 06:57:24', '2023-03-15 04:17:56', '2023-03-15 04:17:56'),
(247, 8, 'property_specific_type', 'Office', 85, NULL, '2023-03-12 06:57:35', '2023-03-15 04:17:58', '2023-03-15 04:17:58'),
(248, 8, 'property_specific_type', 'Retail', 85, NULL, '2023-03-12 06:57:50', '2023-03-15 04:18:16', '2023-03-15 04:18:16'),
(249, 8, 'property_specific_type', 'Plot/Land', 85, NULL, '2023-03-12 06:58:02', '2023-03-15 04:18:18', '2023-03-15 04:18:18'),
(250, 8, 'property_specific_type', 'Storage', 85, NULL, '2023-03-12 06:58:13', '2023-03-15 04:18:20', '2023-03-15 04:18:20'),
(251, 8, 'property_specific_type', 'Industry', 85, NULL, '2023-03-12 06:58:29', '2023-03-15 04:18:21', '2023-03-15 04:18:21'),
(252, 8, 'property_specific_type', 'Hospitality', 85, NULL, '2023-03-12 06:58:39', '2023-03-15 04:18:23', '2023-03-15 04:18:23'),
(253, 8, 'property_specific_type', 'Other', 85, NULL, '2023-03-12 06:58:49', '2023-03-15 04:18:25', '2023-03-15 04:18:25'),
(254, 8, 'property_specific_type', 'Flat', 87, 1, '2023-03-15 04:18:48', '2023-03-15 04:18:48', NULL),
(255, 8, 'property_specific_type', 'Vila/Bunglow', 87, 1, '2023-03-15 04:18:57', '2023-05-18 06:12:18', NULL),
(256, 8, 'property_specific_type', 'Land,Plot', 87, 1, '2023-03-15 04:19:05', '2023-05-18 06:27:32', NULL),
(257, 8, 'property_specific_type', 'Penthouse', 87, 1, '2023-03-15 04:19:13', '2023-04-11 07:13:52', NULL),
(258, 8, 'property_specific_type', 'Farmhouse', 87, 1, '2023-03-15 04:19:21', '2023-03-15 04:19:21', NULL),
(259, 8, 'property_specific_type', 'Office', 85, 1, '2023-03-15 04:20:49', '2023-03-15 04:20:49', NULL),
(260, 8, 'property_specific_type', 'Retail', 85, 1, '2023-03-15 04:20:56', '2023-03-15 04:20:56', NULL),
(261, 8, 'property_specific_type', 'Storage/industrial', 85, 1, '2023-03-15 04:21:06', '2023-05-18 07:01:14', NULL),
(262, 8, 'property_specific_type', 'Plot,Land', 85, 1, '2023-03-15 04:21:15', '2023-05-18 06:27:39', NULL),
(263, 23, 'property_for', 'Rent', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(264, 23, 'property_for', 'Sell', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(265, 23, 'property_construction_type', 'Commercial', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(266, 23, 'property_construction_type', 'Industrial', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(267, 23, 'property_construction_type', 'Residential', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(268, 23, 'property_construction_type', 'Land/Plot', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(269, 23, 'property_priority_type', 'P1', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(270, 23, 'property_priority_type', 'P2', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(271, 23, 'property_priority_type', 'P3', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(272, 23, 'property_priority_type', 'P4', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(273, 23, 'property_source', 'Advertise', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(274, 23, 'property_source', 'Reference', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(275, 23, 'property_source', '99 Acres', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(276, 23, 'property_furniture_type', 'Furnished', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(277, 23, 'property_furniture_type', 'Semi Furnished', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(278, 23, 'property_furniture_type', 'Unfurnished', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(279, 23, 'property_furniture_type', 'Can Furnished', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(280, 23, 'property_owner_type', 'Builder', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(281, 23, 'property_owner_type', 'Individual Owner', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(282, 23, 'property_owner_type', 'Investor', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(283, 23, 'property_measurement_type', 'Sq.Ft.', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(284, 23, 'property_measurement_type', 'Sq.Yard', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(285, 23, 'property_measurement_type', 'Sq.Meter', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(286, 23, 'property_measurement_type', 'VIGHA', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(287, 23, 'building_restriction', 'Bachelors', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(288, 23, 'building_restriction', 'Hospital', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(289, 23, 'building_restriction', 'Restaurant', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(290, 23, 'building_restriction', 'Company Guest House', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(291, 23, 'building_restriction', 'Night Call Center', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(292, 23, 'building_restriction', 'SPA & Massage Parlor', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(293, 23, 'building_architecture_type', 'Basement', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(294, 23, 'building_architecture_type', 'Industrial', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(295, 23, 'building_architecture_type', 'Land', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(296, 23, 'building_architecture_type', 'Offices', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(297, 23, 'building_architecture_type', 'Residential', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(298, 23, 'building_architecture_type', 'Retail', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(299, 23, 'building_progress', 'Ready Possession', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(300, 23, 'building_progress', 'Under Construction', NULL, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(301, 23, 'property_specific_type', 'Agriculture Land', 16, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(302, 23, 'property_specific_type', 'Corporate House', 13, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(303, 23, 'property_specific_type', 'Godown', 14, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(304, 23, 'property_specific_type', 'NA Land', 16, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(305, 23, 'property_specific_type', 'Pent House', 15, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(306, 23, 'property_specific_type', 'Row House', 15, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(307, 23, 'property_specific_type', 'Tenament', 15, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(308, 23, 'property_specific_type', 'Villa', 15, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(309, 23, 'property_specific_type', 'Basement', 13, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(310, 23, 'property_specific_type', 'Industrial Shed', 14, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(311, 23, 'property_plan_type', '2 BHK', 15, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(312, 23, 'property_plan_type', '3 BHK', 15, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(313, 23, 'property_specific_type', 'Flat', 15, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(314, 23, 'property_specific_type', 'Bungalow', 15, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(315, 23, 'property_plan_type', 'Basement', 13, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(316, 23, 'property_plan_type', 'Godown', 14, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(317, 23, 'property_plan_type', 'Industrial Land', 14, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(318, 23, 'property_plan_type', 'Industrial Shed', 14, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(319, 23, 'property_plan_type', 'Land Or Plot', 16, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(320, 23, 'property_plan_type', 'Office Space', 13, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(321, 23, 'property_plan_type', 'Showroom/Shop Ground Floor', 13, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(322, 23, 'property_plan_type', 'Showroom/Shop 1st Floor', 13, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(323, 23, 'property_plan_type', 'Showroom/Shop 2nd Floor', 13, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(324, 23, 'enquiry_sales_comment', 'Direct Purchased', 5, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(325, 23, 'enquiry_sales_comment', 'Purchase from other Broker', 5, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(326, 23, 'enquiry_sales_comment', 'Office Visit Planned', 3, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(327, 23, 'enquiry_sales_comment', 'Project Discussion', 3, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(328, 23, 'enquiry_sales_comment', 'Already Purchased', 1, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(329, 23, 'enquiry_sales_comment', 'Brochure and details sent', 1, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(330, 23, 'enquiry_sales_comment', 'Phone Switch Off/Not Reachable', 1, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(331, 23, 'enquiry_sales_comment', 'Intrested in Property', 2, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(332, 23, 'enquiry_sales_comment', 'Other Option suggested', 2, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(333, 23, 'enquiry_sales_comment', 'Site Visit Done', 2, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(334, 23, 'enquiry_sales_comment', 'Postpone', 1, NULL, '2023-03-22 14:01:39', '2023-03-22 14:01:39', NULL),
(335, 8, 'property_zone', 'INDUSTRIAL 2', NULL, NULL, '2023-05-09 09:50:15', '2023-05-09 09:50:15', NULL),
(336, 8, 'property_specific_type', 'corporate house', 85, NULL, '2023-05-09 10:25:44', '2023-05-17 17:03:16', '2023-05-17 17:03:16'),
(339, 8, 'property_specific_type', 'Test', 85, NULL, '2023-05-28 12:40:38', '2023-05-28 12:41:03', '2023-05-28 12:41:03'),
(340, 8, 'property_specific_type', 'test', 85, NULL, '2023-05-28 12:41:08', '2023-05-28 12:41:37', '2023-05-28 12:41:37'),
(341, 8, 'property_specific_type', 'Test', 85, NULL, '2023-05-28 12:41:42', '2023-05-28 12:41:46', '2023-05-28 12:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `dropdown_template`
--

CREATE TABLE `dropdown_template` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dropdown_for` varchar(100) DEFAULT NULL,
  `name` varchar(180) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropdown_template`
--

INSERT INTO `dropdown_template` (`id`, `dropdown_for`, `name`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'property_for', 'Rent', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(2, 'property_for', 'Sell', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(3, 'property_construction_type', 'Commercial', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(4, 'property_construction_type', 'Industrial', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(5, 'property_construction_type', 'Residential', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(6, 'property_construction_type', 'Land/Plot', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(7, 'property_priority_type', 'P1', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(8, 'property_priority_type', 'P2', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(9, 'property_priority_type', 'P3', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(10, 'property_priority_type', 'P4', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(11, 'property_specific_type', 'Agriculture Land', 6, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(12, 'property_specific_type', 'Corporate House', 3, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(13, 'property_specific_type', 'Godown', 4, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(14, 'property_specific_type', 'NA Land', 6, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(15, 'property_specific_type', 'Pent House', 5, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(16, 'property_specific_type', 'Row House', 5, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(17, 'property_specific_type', 'Tenament', 5, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(18, 'property_specific_type', 'Villa', 5, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(19, 'property_specific_type', 'Basement', 3, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(20, 'property_specific_type', 'Industrial Shed', 4, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(21, 'property_source', 'Advertise', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(22, 'property_source', 'Reference', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(23, 'property_source', '99 Acres', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(24, 'property_furniture_type', 'Furnished', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(25, 'property_furniture_type', 'Semi Furnished', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(26, 'property_furniture_type', 'Unfurnished', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(27, 'property_furniture_type', 'Can Furnished', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(28, 'property_owner_type', 'Builder', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(29, 'property_owner_type', 'Individual Owner', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(30, 'property_owner_type', 'Investor', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(31, 'property_plan_type', '2 BHK', 5, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(32, 'property_plan_type', '3 BHK', 5, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(33, 'property_specific_type', 'Flat', 5, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(34, 'property_specific_type', 'Bungalow', 5, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(35, 'property_measurement_type', 'Sq.Ft.', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(36, 'property_measurement_type', 'Sq.Yard', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(37, 'property_measurement_type', 'Sq.Meter', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(38, 'property_measurement_type', 'VIGHA', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(39, 'property_plan_type', 'Basement', 3, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(40, 'property_plan_type', 'Godown', 4, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(41, 'property_plan_type', 'Industrial Land', 4, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(42, 'property_plan_type', 'Industrial Shed', 4, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(43, 'property_plan_type', 'Land Or Plot', 6, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(44, 'property_plan_type', 'Office Space', 3, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(45, 'property_plan_type', 'Showroom/Shop Ground Floor', 3, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(46, 'property_plan_type', 'Showroom/Shop 1st Floor', 3, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(47, 'property_plan_type', 'Showroom/Shop 2nd Floor', 3, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(48, 'building_restriction', 'Bachelors', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(49, 'building_restriction', 'Hospital', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(50, 'building_restriction', 'Restaurant', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(51, 'building_restriction', 'Company Guest House', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(52, 'building_restriction', 'Night Call Center', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(53, 'building_restriction', 'SPA & Massage Parlor', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(54, 'building_architecture_type', 'Basement', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(55, 'building_architecture_type', 'Industrial', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(56, 'building_architecture_type', 'Land', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(57, 'building_architecture_type', 'Offices', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(58, 'building_architecture_type', 'Residential', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(59, 'building_architecture_type', 'Retail', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(60, 'building_progress', 'Ready Possession', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(61, 'building_progress', 'Under Construction', NULL, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(62, 'enquiry_sales_comment', 'Direct Purchased', 5, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(63, 'enquiry_sales_comment', 'Purchase from other Broker', 5, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(64, 'enquiry_sales_comment', 'Office Visit Planned', 3, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(65, 'enquiry_sales_comment', 'Project Discussion', 3, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(66, 'enquiry_sales_comment', 'Already Purchased', 1, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(67, 'enquiry_sales_comment', 'Brochure and details sent', 1, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(68, 'enquiry_sales_comment', 'Phone Switch Off/Not Reachable', 1, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(69, 'enquiry_sales_comment', 'Intrested in Property', 2, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(70, 'enquiry_sales_comment', 'Other Option suggested', 2, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(71, 'enquiry_sales_comment', 'Site Visit Done', 2, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL),
(72, 'enquiry_sales_comment', 'Postpone', 1, '2023-01-12 20:16:21', '2023-01-12 20:16:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_bulk`
--

CREATE TABLE `email_bulk` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `expired_date` varchar(100) NOT NULL,
  `email_balance` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `email_bulk`
--

INSERT INTO `email_bulk` (`id`, `email`, `user_name`, `expired_date`, `email_balance`, `user_id`) VALUES
(1, 'khushaliapatel@gmail.com', 'Khushi 123', '06 Oct 2023', 69163, 39);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `template_type` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_name` varchar(180) DEFAULT NULL,
  `client_mobile` varchar(180) DEFAULT NULL,
  `client_email` varchar(180) DEFAULT NULL,
  `is_nri` int(11) NOT NULL DEFAULT 0,
  `enquiry_for` varchar(50) DEFAULT NULL,
  `requirement_type` varchar(50) DEFAULT NULL,
  `property_type` varchar(50) DEFAULT NULL,
  `configuration` varchar(50) DEFAULT NULL,
  `area_size_from` varchar(50) DEFAULT NULL,
  `area_size_to` varchar(50) DEFAULT NULL,
  `area_measurement` varchar(50) DEFAULT NULL,
  `enquiry_source` varchar(50) DEFAULT NULL,
  `furnished_status` varchar(50) DEFAULT NULL,
  `budget_from` varchar(50) DEFAULT NULL,
  `budget_to` varchar(50) DEFAULT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  `building_id` varchar(180) DEFAULT NULL,
  `enquiry_status` varchar(50) DEFAULT NULL,
  `project_status` varchar(50) DEFAULT NULL,
  `area_ids` text DEFAULT NULL,
  `is_favourite` int(11) DEFAULT NULL,
  `is_preleased` int(11) NOT NULL DEFAULT 0,
  `no_care_customer` int(11) NOT NULL DEFAULT 0,
  `other_contacts` text DEFAULT NULL,
  `telephonic_discussion` text DEFAULT NULL,
  `highlights` text DEFAULT NULL,
  `enquiry_city_id` int(11) DEFAULT NULL,
  `enquiry_branch_id` varchar(100) DEFAULT NULL,
  `employee_id` varchar(100) DEFAULT NULL,
  `transfer_date` datetime DEFAULT NULL,
  `added_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `area_from` varchar(180) DEFAULT NULL,
  `area_to` varchar(180) DEFAULT NULL,
  `area_from_measurement` varchar(180) DEFAULT NULL,
  `area_to_measurement` varchar(180) DEFAULT NULL,
  `district_id` varchar(180) DEFAULT NULL,
  `taluka_id` varchar(180) DEFAULT NULL,
  `village_id` varchar(180) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `user_id`, `client_name`, `client_mobile`, `client_email`, `is_nri`, `enquiry_for`, `requirement_type`, `property_type`, `configuration`, `area_size_from`, `area_size_to`, `area_measurement`, `enquiry_source`, `furnished_status`, `budget_from`, `budget_to`, `purpose`, `building_id`, `enquiry_status`, `project_status`, `area_ids`, `is_favourite`, `is_preleased`, `no_care_customer`, `other_contacts`, `telephonic_discussion`, `highlights`, `enquiry_city_id`, `enquiry_branch_id`, `employee_id`, `transfer_date`, `added_by`, `created_at`, `updated_at`, `deleted_at`, `area_from`, `area_to`, `area_from_measurement`, `area_to_measurement`, `district_id`, `taluka_id`, `village_id`, `zone_id`) VALUES
(2, 39, 'test', '123123132', 'test@mail.com', 0, 'Rent', '85', '260', '[\"3\"]', NULL, NULL, NULL, '103', '[\"107\"]', '1,00,000', '5,00,000', 'Investment', '[\"1\"]', NULL, '70', '[\"11\"]', 0, 0, 0, '[[\"ada\",\"1231231232\",\"undefined\",0]]', 'test', NULL, 15, NULL, '39', '2023-09-06 00:00:00', 39, '2023-09-06 12:36:42', '2023-09-10 09:16:52', NULL, '1000', '5000', '45', '45', NULL, NULL, NULL, NULL),
(3, 8, 'asd', '231313', NULL, 0, 'Rent', '87', '255', '[\"14\"]', NULL, NULL, NULL, '103', '[\"107\"]', '1,00,000', '5,00,000', 'Investment', '[\"7\"]', NULL, '70', '[]', 0, 0, 0, '[[\"asada\",\"231212\",\"undefined\",0]]', 'wdsada', NULL, NULL, '1', '49', NULL, 49, '2023-09-07 22:32:04', '2023-09-07 22:40:45', NULL, '1000', '5000', '45', '45', NULL, NULL, NULL, 231),
(4, 39, 'asdad12', '232312', NULL, 0, 'Rent', '87', '255', '[\"15\"]', NULL, NULL, NULL, '103', '[\"107\"]', '2,313', '2,32,323', 'Investment', '[\"1\"]', NULL, '70', '[\"14\"]', 0, 0, 0, '[[\"ddas\",\"234234\",\"undefined\",0]]', 'sds', NULL, 14, NULL, '39', '2023-09-10 00:00:00', 39, '2023-09-10 09:15:24', '2023-09-10 09:18:15', NULL, '1231', '234234', '45', '45', NULL, NULL, NULL, NULL),
(5, 39, 'sada', '34234234', NULL, 0, 'Rent', '85', '259', '[\"1\"]', NULL, NULL, NULL, '103', '[\"107\"]', '2,31,312', '23,13,12,312', NULL, '[\"1\"]', NULL, '70', '[\"14\",\"40\",\"1\",\"34\"]', 0, 0, 0, '[[\"dsada\",\"213131\",\"undefined\",0]]', 'sdasda', NULL, 4, NULL, '50', '2023-09-10 00:00:00', 39, '2023-09-10 09:20:23', '2023-09-23 18:45:23', NULL, '21312', '2332', '118', '118', NULL, NULL, NULL, 335),
(6, 39, NULL, NULL, NULL, 0, 'Rent', NULL, NULL, 'null', NULL, NULL, NULL, NULL, '[]', NULL, NULL, NULL, '[]', NULL, NULL, '[]', 0, 0, 0, '[[\"\",\"\",\"undefined\",0]]', NULL, NULL, NULL, NULL, NULL, NULL, 39, '2023-09-18 17:15:10', '2023-09-18 17:15:16', '2023-09-18 17:15:16', NULL, NULL, '45', '45', NULL, NULL, NULL, NULL),
(7, 39, 'teste', '147852369', 'test@gmail.com', 0, 'Rent', '85', '259', '[\"1\"]', NULL, NULL, NULL, '104', '[\"108\"]', '25,800', '25,80,000', 'Investment', '[\"6\"]', NULL, '142', '[\"27\"]', 1, 1, 0, '[[\"testing\",\"225314702\",\"undefined\",1]]', 'bhsabhbdh', NULL, 3, '13', '50', NULL, 39, '2023-09-27 17:32:26', '2023-09-27 17:32:26', NULL, '2500', '2500', '118', '118', NULL, NULL, NULL, 559),
(8, NULL, 'teste', '147852369', 'test@gmail.com', 1, 'rent', '85', '259', '1', NULL, NULL, NULL, '104', '[108]', '25,800', '25,80,000', 'Investment', '[6]', NULL, '142', '[27]', NULL, 1, 0, NULL, 'bhsabhbdh', NULL, 3, '13', '50', NULL, 39, '2023-10-02 16:24:03', '2023-10-02 16:24:03', NULL, '2500', '2500', NULL, '118', NULL, NULL, NULL, 559),
(9, 39, 'chandrababu naidu', '5412345', 'chandu@naidu.com', 1, 'Rent', '85', '259', '[\"1\"]', NULL, NULL, NULL, NULL, '[]', '70,000', '90,000', NULL, '[]', NULL, NULL, '[]', 1, 0, 0, '[[\"vangdu\",\"5432345\",\"undefined\",0]]', 'proper office joie che', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-04 07:42:02', '2023-10-04 15:52:19', NULL, '1900', '2500', '117', '117', NULL, NULL, NULL, NULL),
(10, 39, 'lalu yadav', '54334343343', 'lalu@ydv.com', 0, 'Rent', '85', '260', '[\"4\",\"5\"]', NULL, NULL, NULL, NULL, '[\"106\",\"108\"]', '3,00,000', '10,00,000', NULL, '[]', NULL, NULL, '[]', 0, 0, 0, '[[\"\",\"\",\"undefined\",0]]', 'jai ganesha', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-04 16:01:29', '2023-10-04 16:01:29', NULL, '2500', '3200', '117', '117', NULL, NULL, NULL, NULL),
(11, 39, 'teste', '147852369', 'test@gmail.com', 1, 'rent', '85', '259', '[\"1\",\"2\",\"3\"]', NULL, NULL, NULL, '104', '[\"108\",\"1\"]', '25,800', '25,80,000', 'Investment', '[\"6\"]', NULL, '142', '[\"27\"]', NULL, 1, 0, '[[\"test\",\"91082673645\",\"1\"],[\"tester\",\"6789054321\",\"0\"]]', 'bhsabhbdh', NULL, 3, '13', '50', NULL, 39, '2023-10-04 17:55:06', '2023-10-07 15:52:00', '2023-10-07 15:52:00', '2500', '2500', NULL, '118', NULL, NULL, NULL, 559),
(12, 39, 'rabdi devi', '987654345678', 'rabdi@bihar.com', 0, 'Rent', '85', '261', '[\"8\"]', NULL, NULL, NULL, NULL, '[]', NULL, NULL, NULL, '[]', NULL, NULL, '[\"25\"]', 0, 0, 0, '[[\"tej pratap\",\"654345676543\",\"undefined\",0]]', 'dadar station ni pase', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-06 06:12:41', '2023-10-06 06:13:14', NULL, '1700', '2000', '119', '119', NULL, NULL, NULL, NULL),
(13, 39, 'jay lalita', '1234567890', 'jay@tn.com', 0, 'Rent', '85', '262', '[\"10\"]', NULL, NULL, NULL, NULL, '[]', '12,00,00,000', '15,00,00,000', NULL, '[]', NULL, NULL, '[]', 0, 0, 0, '[[\"test\",\"2589631470\",\"1\"],[\"test\",\"2589631470\",\"1\"]]', 'stelin will change party', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-06 10:02:28', '2023-10-13 16:30:47', NULL, '8000', '10000', '118', '118', NULL, NULL, NULL, NULL),
(14, 39, 'MUTTHU SWAMI', '765465435432', 'hathaliyank@gmail.com', 0, 'Rent', '87', '254', '[\"16\"]', NULL, NULL, NULL, NULL, '[\"106\",\"108\"]', '25,000', '1,00,000', NULL, '[]', NULL, NULL, '[\"13\",\"4\"]', 0, 0, 0, '[[\"NO OTHER\",\"0000000000000\",\"undefined\",0]]', 'URGENT JOIE CHE', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-06 11:27:07', '2023-10-06 11:27:07', NULL, '1800', '2500', '117', '117', NULL, NULL, NULL, NULL),
(15, 39, 'sharad pawar', '765432345', 'sharad@power.com', 0, 'Rent', '87', '255', '[\"16\"]', NULL, NULL, NULL, NULL, '[]', '50,000', '5,00,000', 'Investment', '[]', NULL, NULL, '[]', 0, 0, 0, '[[\"no\",\"6543245\",\"undefined\",0]]', 'bunglow new joie', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-09 05:51:49', '2023-10-09 05:51:49', NULL, '3500', '4500', '117', '117', NULL, NULL, NULL, NULL),
(16, 39, 'c r patil', '234552323', 'cr@patil.com', 0, 'Rent', '87', '257', '[\"15\",\"17\"]', NULL, NULL, NULL, NULL, '[]', '40,000', '50,000', NULL, '[]', NULL, NULL, '[]', 0, 0, 0, '[[\"bhopabhai\",\"6543454345\",\"undefined\",0]]', 'urgent joie che', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-09 06:16:59', '2023-10-09 06:16:59', NULL, '3200', '4000', '117', '117', NULL, NULL, NULL, NULL),
(17, 39, 'rana pratap', '4858585885', 'chetak@rna.com', 0, 'Rent', '87', '258', 'null', NULL, NULL, NULL, NULL, '[]', '30,00,000', '35,00,000', NULL, '[]', NULL, NULL, '[]', 0, 0, 0, '[[\"chittod\",\"5344545440\",\"undefined\",0]]', 'chittodgarh', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-09 06:32:25', '2023-10-09 06:32:25', NULL, '5500', '6100', '117', '117', NULL, NULL, NULL, NULL),
(18, 39, 'narendra sinh', '0909876789', 'narendra@sinh.in', 0, 'Rent', '85', '259', '[\"1\"]', NULL, NULL, NULL, NULL, '[]', '0', '70,00,000', NULL, '[]', NULL, NULL, '[]', 0, 0, 0, '[[\"no other \",\"6545654465\",\"undefined\",0]]', 'get on first priority', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-09 06:48:09', '2023-10-09 06:48:30', NULL, '1100', '1800', '117', '117', NULL, NULL, NULL, NULL),
(19, 39, 'anna', '98765434567', 'anna@tambi.com', 0, 'Buy', '85', '260', '[\"4\",\"6\"]', NULL, NULL, NULL, NULL, '[]', '1,25,00,000', '1,40,00,000', NULL, '[\"50\",\"47\"]', NULL, NULL, '[]', 0, 0, 0, '[[\"koi nathi\",\"3434\",\"undefined\",0]]', '=', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-10 05:07:05', '2023-10-10 05:08:29', NULL, '2000', '2500', '117', '117', NULL, NULL, NULL, NULL),
(20, 39, 'jignesh', '9987654567', NULL, 0, 'Buy', '85', '261', '[\"8\"]', NULL, NULL, NULL, NULL, '[]', NULL, NULL, 'Investment', '[]', NULL, NULL, '[]', 0, 0, 0, '[[\"contaat\",\"456445\",\"undefined\",0]]', 'contact thato nthi', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-10 05:18:00', '2023-10-10 05:18:00', NULL, '5500', '6100', '117', '117', NULL, NULL, NULL, NULL),
(21, 39, 'nitin gadkari', '23443343234', 'nitin@gadk.sg', 0, 'Buy', '85', '262', '[\"10\"]', NULL, NULL, NULL, NULL, '[]', '1,00,00,000', '1,50,00,000', NULL, '[]', NULL, NULL, '[]', 0, 0, 0, '[[\"aerrfw\",\"43232321\",\"undefined\",0]]', 'fi  jvjr chang  gdi', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-10 05:26:46', '2023-10-10 05:26:46', NULL, '44747', '63636', '117', '117', NULL, NULL, NULL, NULL),
(22, 39, 'sanjay', '45654565', 'sanjay@lila.com', 0, 'Buy', '87', '254', '[\"15\"]', NULL, NULL, NULL, NULL, '[\"106\",\"107\",\"108\",\"109\"]', '50,00,000', '1,00,00,000', NULL, '[]', NULL, NULL, '[]', 0, 0, 0, '[[\"bhansali\",\"3455243\",\"undefined\",0]]', 'ramlila ase', NULL, NULL, NULL, NULL, NULL, 39, '2023-10-10 05:41:18', '2023-10-10 05:41:18', NULL, '1400', '1600', '117', '117', NULL, NULL, NULL, NULL),
(23, 39, 'rama kant', '65344345', 'rama@kant.com', 0, 'Rent', '87', '255', '[\"16\"]', NULL, NULL, NULL, NULL, '[]', '1,00,00,000', '3,00,00,000', NULL, '[\"55\",\"42\"]', NULL, NULL, '[\"22\"]', 0, 0, 0, '[[\"achrekr\",\"65434543454\",\"undefined\",0]]', 'sacbin', NULL, NULL, NULL, '73', NULL, 39, '2023-10-10 05:58:54', '2023-10-11 17:06:40', NULL, '300', '800', '118', '118', NULL, NULL, NULL, NULL),
(24, 39, 'virat mahendra', '234543', 'virat@mahi.com', 0, 'Buy', '87', '257', '[\"17\"]', NULL, NULL, NULL, NULL, '[\"106\",\"107\",\"108\",\"109\"]', '75,00,000', '1,25,00,000', 'Own Use', '[]', NULL, NULL, '[\"36\"]', 0, 0, 0, '[[\"dhoni\",\"432323323432\",\"undefined\",0]]', 'world cup', NULL, NULL, NULL, '65', NULL, 39, '2023-10-10 06:06:09', '2023-10-11 17:05:30', NULL, '3400', '5000', '117', '117', NULL, NULL, NULL, NULL),
(25, 39, 'hardik pandy', '243434', 'hardik@pandya.com', 0, 'Rent', '87', '256', 'null', NULL, NULL, NULL, NULL, '[]', '60,00,000', '80,00,000', NULL, '[]', NULL, NULL, '[\"7\"]', 0, 0, 0, '[[\"krunal \",\"534343`\",\"undefined\",0]]', 'krunal pandya', NULL, NULL, NULL, '39', NULL, 39, '2023-10-10 06:47:45', '2023-10-11 17:05:15', NULL, '1500', '2000', '117', '117', NULL, NULL, NULL, NULL),
(26, 39, 'test', '1478523690', 'test@gmail.com', 0, 'Rent', '[85]', '[254]', '[402,null]', NULL, NULL, NULL, '103', NULL, '250000', '2500000', NULL, NULL, 'Active', NULL, NULL, NULL, 0, 0, '[[\"test\",\"1478523690\",\"Contactable\",1]]', NULL, NULL, NULL, NULL, '50', NULL, 39, '2023-10-12 03:16:25', '2023-10-23 19:43:15', '2023-10-23 19:43:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_comments`
--

CREATE TABLE `enquiry_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enquiry_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_progress`
--

CREATE TABLE `enquiry_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enquiry_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `progress` varchar(160) DEFAULT NULL,
  `lead_type` varchar(160) DEFAULT NULL,
  `sales_comment_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `nfd` datetime DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiry_progress`
--

INSERT INTO `enquiry_progress` (`id`, `enquiry_id`, `user_id`, `progress`, `lead_type`, `sales_comment_id`, `status`, `nfd`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 39, 'New Lead', NULL, 145, 0, '2023-09-16 00:31:00', 'xa', '2023-08-31 13:31:51', '2023-08-31 13:33:39', NULL),
(2, 1, 39, 'Site Visit Scheduled', NULL, NULL, 1, '2023-09-13 00:33:00', NULL, '2023-08-31 13:33:39', '2023-08-31 13:33:39', NULL),
(3, 2, 39, 'Site Visit Completed', NULL, NULL, 0, '2023-09-16 09:15:00', NULL, '2023-09-07 22:15:38', '2023-09-07 22:28:53', NULL),
(4, 2, 39, 'Discussion', NULL, 145, 1, '2023-09-10 09:28:00', NULL, '2023-09-07 22:28:53', '2023-09-07 22:28:53', NULL),
(5, 3, 49, 'Site Visit Scheduled', NULL, NULL, 1, '2023-09-15 09:32:00', NULL, '2023-09-07 22:32:25', '2023-09-07 22:32:25', NULL),
(6, 5, 39, 'Site Visit Scheduled', NULL, NULL, 0, '2023-02-21 23:38:00', NULL, '2023-09-10 12:35:47', '2023-09-10 12:42:21', NULL),
(7, 5, 39, 'Lead Confirmed', NULL, 144, 0, '2023-12-12 14:42:00', 'date time', '2023-09-10 12:42:21', '2023-09-11 12:07:47', NULL),
(8, 5, 39, 'Lead Confirmed', NULL, 145, 0, '2023-09-16 00:12:00', 'asasasaas', '2023-09-11 12:07:47', '2023-09-12 10:58:23', NULL),
(9, 5, 39, 'Site Visit Scheduled', NULL, NULL, 0, NULL, NULL, '2023-09-12 10:58:23', '2023-09-12 11:05:08', NULL),
(10, 5, 39, 'Discussion', 'Cold Lead', 144, 0, '1099-12-12 00:12:00', 'bharat mak', '2023-09-12 11:05:08', '2023-09-12 12:13:00', NULL),
(11, 5, 39, 'Site Visit Scheduled', NULL, NULL, 0, NULL, NULL, '2023-09-12 12:13:00', '2023-09-12 12:13:46', NULL),
(12, 5, 39, 'Lead Confirmed', NULL, 145, 0, '2023-09-14 23:16:00', 'hhhhhhhhhhhhhhh', '2023-09-12 12:13:46', '2023-09-12 12:23:25', NULL),
(13, 5, 39, 'Discussion', NULL, 146, 0, '2023-09-15 23:26:00', '0000000000000000000000000000000000000000', '2023-09-12 12:23:25', '2023-09-13 11:24:28', NULL),
(14, 5, 39, 'Booked', NULL, NULL, 1, NULL, NULL, '2023-09-13 11:24:28', '2023-09-13 11:24:48', NULL),
(15, 5, 39, 'Lost', NULL, NULL, 1, NULL, NULL, '2023-09-13 11:24:48', '2023-09-13 11:24:48', NULL),
(30, 14, 39, 'New Lead', 'Cold Lead', 144, 0, '2023-10-08 23:29:00', 'asdad', '2023-10-08 18:01:36', '2023-10-08 18:02:17', NULL),
(31, 14, 39, 'New Lead', 'Cold Lead', 144, 0, '2023-10-08 23:29:00', 'asdad', '2023-10-08 18:02:17', '2023-10-08 18:03:55', NULL),
(32, 14, 39, 'Discussion', 'Cold Lead', 145, 0, '2023-10-08 23:33:00', 'sadad', '2023-10-08 18:03:55', '2023-10-09 02:36:47', NULL),
(33, 14, 39, 'Site Visit Completed', NULL, NULL, 0, '2023-10-09 00:00:00', NULL, '2023-10-09 03:29:05', '2023-10-09 03:50:49', NULL),
(34, 14, 39, 'Site Visit Scheduled', NULL, NULL, 0, '2023-10-09 00:00:00', NULL, '2023-10-09 03:50:49', '2023-10-09 15:23:24', NULL),
(35, 14, 39, 'Site Visit Completed', NULL, NULL, 0, '2023-10-09 00:00:00', NULL, '2023-10-09 15:23:24', '2023-10-09 15:24:12', NULL),
(36, 14, 39, 'Site Visit Completed', NULL, NULL, 0, '2023-10-09 00:00:00', NULL, '2023-10-09 15:24:12', '2023-10-09 15:27:54', NULL),
(37, 14, 39, 'Site Visit Completed', NULL, NULL, 0, '2023-10-09 00:00:00', NULL, '2023-10-09 15:27:54', '2023-10-09 15:28:41', NULL),
(38, 14, 39, 'Site Visit Completed', NULL, NULL, 1, '2023-10-09 00:00:00', NULL, '2023-10-09 15:28:41', '2023-10-09 15:28:41', NULL),
(39, 25, 39, NULL, NULL, NULL, 1, NULL, NULL, '2023-10-11 17:34:20', '2023-10-11 17:34:20', NULL),
(40, 26, 50, 'Site Visit Scheduled', NULL, NULL, 1, NULL, 'testing', '2023-10-12 03:16:25', '2023-10-12 03:16:25', NULL);

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
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `form_name` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `user_id`, `form_name`, `created_at`, `updated_at`) VALUES
(1, 0, 'project', '2023-09-07 07:49:14', '2023-09-07 07:49:14'),
(2, 0, 'enquiry', '2023-09-07 07:49:14', '2023-09-07 07:49:14'),
(3, NULL, 'state', '2023-10-05 09:40:03', '2023-10-05 09:40:03'),
(4, NULL, 'city', '2023-10-05 09:40:03', '2023-10-05 09:40:03'),
(5, NULL, 'area', '2023-10-05 09:40:03', '2023-10-05 09:40:03'),
(6, NULL, 'district', '2023-10-05 09:40:03', '2023-10-05 09:40:03'),
(7, NULL, 'taluka', '2023-10-05 09:40:03', '2023-10-05 09:40:03'),
(8, NULL, 'village', '2023-10-05 09:40:03', '2023-10-05 09:40:03'),
(9, NULL, 'builder', '2023-10-05 09:40:03', '2023-10-05 09:40:03'),
(10, NULL, 'branch', '2023-10-05 09:40:03', '2023-10-05 09:40:03'),
(11, NULL, 'dropdown_settings', '2023-10-05 09:40:03', '2023-10-05 09:40:03'),
(12, NULL, 'user', '2023-10-20 16:27:42', '2023-10-20 16:27:42'),
(13, NULL, 'user_role', '2023-10-24 06:28:19', '2023-10-24 06:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `form_fields`
--

CREATE TABLE `form_fields` (
  `id` int(20) NOT NULL,
  `form_id` int(20) NOT NULL,
  `field_type_id` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_fields`
--

INSERT INTO `form_fields` (`id`, `form_id`, `field_type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-09-07 05:48:17', '2023-09-07 05:48:17'),
(2, 1, 2, '2023-09-07 05:48:17', '2023-09-07 05:48:17'),
(3, 1, 3, '2023-09-07 06:32:38', '2023-09-07 06:32:38'),
(4, 1, 4, '2023-09-07 06:32:38', '2023-09-07 06:32:38'),
(5, 1, 5, '2023-09-07 06:32:56', '2023-09-07 06:32:56'),
(6, 1, 6, '2023-09-07 06:32:56', '2023-09-07 06:32:56'),
(7, 1, 7, '2023-09-07 06:33:15', '2023-09-07 06:33:15'),
(8, 1, 8, '2023-09-07 06:33:15', '2023-09-07 06:33:15'),
(9, 1, 9, '2023-09-07 06:33:36', '2023-09-07 06:33:36'),
(10, 1, 10, '2023-09-07 06:33:36', '2023-09-07 06:33:36'),
(11, 1, 11, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(12, 1, 12, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(13, 1, 13, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(14, 1, 14, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(15, 1, 15, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(16, 1, 16, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(17, 1, 17, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(18, 1, 18, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(19, 1, 19, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(20, 1, 20, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(21, 1, 21, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(22, 1, 22, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(23, 1, 23, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(24, 1, 24, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(25, 1, 25, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(26, 1, 26, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(27, 1, 27, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(28, 1, 28, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(29, 1, 29, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(30, 1, 30, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(31, 1, 31, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(32, 1, 32, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(33, 1, 33, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(34, 1, 34, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(35, 1, 35, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(36, 1, 36, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(37, 1, 37, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(38, 1, 38, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(39, 1, 39, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(40, 1, 40, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(41, 1, 41, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(42, 1, 42, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(43, 1, 43, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(44, 1, 44, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(45, 1, 45, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(46, 1, 46, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(47, 1, 47, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(48, 1, 48, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(49, 1, 49, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(50, 1, 50, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(51, 1, 51, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(52, 1, 52, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(53, 1, 53, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(54, 1, 54, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(55, 1, 55, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(56, 1, 56, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(57, 1, 57, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(58, 1, 58, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(59, 1, 59, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(60, 1, 60, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(61, 1, 61, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(62, 1, 62, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(63, 1, 63, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(64, 1, 64, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(65, 1, 65, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(66, 1, 66, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(67, 2, 67, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(68, 2, 68, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(69, 2, 69, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(70, 2, 70, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(71, 2, 71, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(72, 2, 72, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(73, 2, 73, '2023-09-17 06:47:36', '2023-09-17 06:47:36'),
(74, 2, 74, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(75, 2, 75, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(76, 2, 76, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(77, 2, 77, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(78, 2, 78, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(79, 2, 79, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(80, 2, 80, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(81, 2, 81, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(82, 2, 82, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(83, 2, 83, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(84, 2, 84, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(85, 2, 85, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(86, 2, 86, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(87, 2, 87, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(88, 2, 88, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(89, 2, 89, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(90, 2, 90, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(91, 2, 91, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(92, 2, 92, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(93, 2, 93, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(94, 2, 94, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(95, 2, 95, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(96, 2, 96, '2023-09-18 13:00:19', '2023-09-18 13:00:19'),
(97, 2, 97, '2023-10-02 17:55:41', '2023-10-02 17:55:41'),
(98, 2, 98, '2023-10-02 17:55:41', '2023-10-02 17:55:41'),
(99, 2, 99, '2023-10-04 16:51:25', '2023-10-04 16:51:25'),
(100, 3, 124, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(101, 4, 125, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(102, 4, 126, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(103, 5, 127, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(104, 5, 128, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(105, 5, 129, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(106, 5, 130, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(107, 6, 131, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(108, 7, 132, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(109, 7, 133, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(110, 8, 134, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(111, 8, 135, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(112, 8, 136, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(113, 8, 137, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(114, 9, 138, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(115, 10, 139, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(116, 10, 140, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(117, 10, 141, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(118, 10, 142, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(119, 11, 143, '2023-10-05 04:48:03', '2023-10-05 04:48:03'),
(120, 3, 149, '2023-10-05 11:55:08', '2023-10-05 11:55:08'),
(121, 4, 150, '2023-10-05 11:55:16', '2023-10-05 11:55:16'),
(122, 5, 151, '2023-10-05 11:55:16', '2023-10-05 11:55:16'),
(123, 4, 152, '2023-10-05 11:57:10', '2023-10-05 11:57:10'),
(124, 5, 153, '2023-10-05 11:57:10', '2023-10-05 11:57:10'),
(125, 2, 154, '2023-10-07 15:19:16', '2023-10-07 15:19:16'),
(126, 9, 155, '2023-10-16 18:06:04', '2023-10-16 18:06:04'),
(127, 12, 157, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(128, 12, 158, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(129, 12, 159, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(130, 12, 160, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(131, 12, 161, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(132, 12, 162, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(133, 12, 163, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(134, 12, 164, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(135, 12, 165, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(136, 12, 166, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(137, 12, 167, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(138, 12, 168, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(139, 12, 169, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(140, 12, 170, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(141, 12, 171, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(142, 12, 172, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(143, 12, 173, '2023-10-20 09:01:41', '2023-10-20 09:01:41'),
(144, 12, 174, '2023-10-20 15:12:51', '2023-10-20 15:12:51'),
(145, 12, 175, '2023-10-20 15:12:51', '2023-10-20 15:12:51'),
(146, 12, 176, '2023-10-20 15:13:37', '2023-10-20 15:13:37'),
(147, 12, 177, '2023-10-20 15:13:37', '2023-10-20 15:13:37'),
(148, 12, 178, '2023-10-20 15:13:37', '2023-10-20 15:13:37'),
(149, 13, 179, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(150, 13, 180, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(151, 13, 181, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(152, 13, 182, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(153, 13, 183, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(154, 13, 184, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(155, 13, 185, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(156, 13, 186, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(157, 13, 187, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(158, 13, 188, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(159, 13, 189, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(160, 13, 190, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(161, 13, 191, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(162, 13, 192, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(163, 13, 193, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(164, 13, 194, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(165, 13, 195, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(166, 13, 196, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(167, 13, 197, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(168, 13, 198, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(169, 13, 199, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(170, 13, 200, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(171, 13, 201, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(172, 13, 202, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(173, 13, 203, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(174, 13, 204, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(175, 13, 205, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(176, 13, 206, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(177, 13, 207, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(178, 13, 208, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(179, 13, 209, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(180, 13, 210, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(181, 13, 211, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(182, 13, 212, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(183, 13, 213, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(184, 13, 214, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(185, 13, 215, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(186, 13, 216, '2023-10-23 23:01:51', '2023-10-23 23:01:51'),
(187, 13, 217, '2023-10-24 04:32:37', '2023-10-24 04:32:37'),
(188, 13, 218, '2023-10-24 06:43:15', '2023-10-24 06:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `form_types`
--

CREATE TABLE `form_types` (
  `id` int(20) NOT NULL,
  `field_type` varchar(100) NOT NULL,
  `option_type` text DEFAULT NULL,
  `field_name` varchar(100) NOT NULL,
  `parent_id` int(20) DEFAULT NULL,
  `group_name` varchar(200) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_types`
--

INSERT INTO `form_types` (`id`, `field_type`, `option_type`, `field_name`, `parent_id`, `group_name`, `form_id`, `created_at`, `updated_at`) VALUES
(1, 'radio', 'Commercial | Recidential | Office & Retail | Recidential & Commercial', 'property_type', NULL, 'other information', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(2, 'radio', 'Office| Retail | Storage/Industrial | Flat | Vila/Banglow | Land/Plot | Penthouse | Farmhouse', 'category', 1, 'other information', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(3, 'radio', 'office space |  co-working | Ground floor | 1st Floor | 2nd Floor | 3rd Floor | Warehouse | Cold Storage |  Ind Shed | Plotting | 1RK | 1BHK | 2 BHK | 3BHK | 4BHK | 4BHK | 1Bed | 2Bed | 3Bed | 4Bed | 4+Bed | Commercial Land | Agricultural Land / Farm Land | Industrial Land', 'sub_category', 2, 'other information', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(4, 'integer', '-', 'number_of_towers', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(5, 'integer', '-', 'number_of_floor', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(6, 'integer', '-', 'total_unit', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(7, 'integer', '-', 'number_of_unit_each_block', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(8, 'integer', '-', 'number_of_lift', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(9, 'number', ' ft , meter', 'front_road_width', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(10, 'radio', 'radio', 'washroom', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(11, 'text', 'text', 'tower_name', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(12, 'integer', '-', 'total_floor', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(13, 'range', '-', 'saleable_area', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(14, 'boolean', 'true / false', 'add_carpet_size', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(15, 'boolean', 'true / false', 'add_built_size', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(16, 'range', '-', 'carpet_area', 14, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(17, 'range', '-', 'built_up_area', 15, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(18, 'checkbox', '-', 'two_road_corner', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(19, 'radio', '-', 'washroom', NULL, 'tower details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(20, 'text', '-', 'tower_name', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(21, 'dropdown', '-', 'sub_category', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(22, 'range', ' sq.ft | sq.yard | sq.meter | vigha', 'size', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(23, 'number', ' ft | meter', 'front_opening', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(24, 'integer', '-', 'number_of_unit_each_floor', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(25, 'number', 'ft | meter', 'ceiling_height', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(26, 'range', 'sq.ft | sq.yard |  sq.meter | vigha', 'plot_area', NULL, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(27, 'range', ' sq.ft | sq.yard |  sq.meter | vigha', 'constrcted_area', NULL, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(28, 'range', ' sq.ft | sq.yard |  sq.meter | vigha', 'road_width_of_front_side_area', NULL, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(29, 'number', ' ft | meter', 'ceiling_height', NULL, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(30, 'checkbox', '-', 'facilities', NULL, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(31, 'checkbox', '-', 'polution_control_board_checkbox', NULL, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(32, 'text', '-', 'polution_control_board', 31, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(33, 'checkbox', '-', 'ec_checkbox', NULL, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(34, 'text', '-', 'ec', 33, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(35, 'checkbox', '-', 'gas_checkbox', NULL, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(36, 'text', '-', 'gas', 35, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(37, 'checkbox', '-', 'power_checkbox', NULL, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(38, 'text', '-', 'power', 37, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(39, 'checkbox', '-', 'water_checkbox', NULL, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(40, 'text', '-', 'water', 39, 'storage and industrial details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(41, 'text', '-', 'wing_name', NULL, 'wing details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(42, 'number', '-', 'total_unit', NULL, 'wing details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(43, 'number', '-', 'total_floor', NULL, 'wing details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(44, 'dropdown', '1RK | 1BHK | 2BHK | 3BHK | 4BHK | 4+BHK ', 'sub_category', 1, 'wing details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(45, 'text', 'Wing Names', 'wing', 41, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(46, 'number', '-', 'saleable_area', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(47, 'boolean', 'true / false', 'add_carpet_size', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(48, 'boolean', 'true / false', 'add_built_size', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(49, 'range', '-', 'carpet_area', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(50, 'range', '-', 'built_up_area', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(51, 'range', '-', 'wash_area', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(52, 'range', '-', 'balcony_area', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(53, 'integer', 'ft | meter', 'floor_height', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(54, 'boolean', ' true | false', 'terrace_&_penthouse', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(55, 'boolean', ' true | false', 'servent_room', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(56, 'integer', 'sq.ft | sq.yard |  sq.meter | vigha', 'terrace_carpet', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(57, 'integer', 'sq.ft | sq.yard |  sq.meter | vigha', 'constrcted_area', NULL, 'unit details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(58, 'range', ' sq.ft | sq.yard |  sq.meter | vigha', 'total_land_area', NULL, 'land plot details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(59, 'range', ' sq.ft | sq.yard |  sq.meter | vigha', 'total_open_area', NULL, 'land plot details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(60, 'range', ' sq.ft | sq.yard |  sq.meter | vigha', 'common_area', NULL, 'land plot details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(61, 'integer', '-', 'total_number_of_plot', NULL, 'land plot details', NULL, '2023-09-18 12:34:45', '2023-09-18 12:34:45'),
(62, 'boolean', 'true / false', 'Project is with multiple theme/phase', NULL, 'land plot details', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(63, 'text', '-', 'phase_name', 62, 'land plot details', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(64, 'range', ' sq.ft | sq.yard |  sq.meter | vigha', 'saleable_plot_area', 62, 'land plot details', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(65, 'boolean', 'true / false', 'carpet_plot_size', NULL, 'land plot details', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(66, 'range', ' sq.ft | sq.yard |  sq.meter | vigha', 'carpet_plot_area', 65, 'land plot details', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(67, 'checkbox', '0|1', 'nri', NULL, 'customer information', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(68, 'radio', 'commercial / resedential', 'Requirement type', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(69, 'radio', 'office | retail | storage/ind. | plot/land| flat | villa/bunglow | land/plot | penthouse | farmhouse', 'category', 68, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(70, 'radio', 'Redytomove | co-workingoffice-space | GFloor | 1st floor | 2nd floor | 3rd floor | warehouse | ind.shade | plotting| commercial-land | agriculture/farm land', 'Sub category', 69, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(71, 'text', '-', 'area_from', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(72, 'text', '-', 'area_to', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(73, 'dropdown', 'sq.ft , sq.yard, sq.meter, vigha', 'unit', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(74, 'dropdown', 'advertise | reference | 99 acres', 'enquiry source', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(75, 'dropdown', 'Furnishe | semi Furnishe | unfurnished | Can Furnished', 'furnishe status', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(76, 'number', '-', 'Budget From', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(77, 'number', '-', 'Budget To', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(78, 'dropdown', 'Investment | Own Use', 'Purpose', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(79, 'dropdown', '-', 'Project', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(80, 'dropdown', 'Redy Possiosion | Under Construction |', 'Project Status', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(81, 'dropdown', 'Zone A | Zone B | Industrial 2', 'Zone', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(82, 'dropdown', '-', 'Locality', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(83, 'checkbox', '0-1', 'Pre -leased', NULL, 'customer requirement', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(84, 'text', '-', 'Contact Person', NULL, 'other contacts', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(85, 'text', '-', 'Contact Person No.', NULL, 'other contacts', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(86, 'checkbox', '-', 'NRI', NULL, 'other contacts', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(87, 'text', '-', 'Remarks', NULL, 'remarks', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(88, 'dropdown', '-', 'City', NULL, 'Address Information', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(89, 'dropdown', '-', 'branch', NULL, 'Address Information', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(90, 'dropdown', '-', 'employee', NULL, 'Address Information', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(91, 'dropdown', '-', 'District', NULL, 'Address Information', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(92, 'dropdown', '-', 'taluka', 91, 'Address Information', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(93, 'dropdown', '-', 'village', 92, 'Address Information', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(94, 'text', '-', 'client_name', NULL, 'client information', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(95, 'number', '-', 'mobile', NULL, 'client information', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(96, 'text', '-', 'email', NULL, 'client information', NULL, '2023-09-18 12:34:46', '2023-09-18 12:34:46'),
(97, 'text', 'Rent|Byu|Both', 'enquiry_for', NULL, 'client information', NULL, '2023-09-27 18:54:08', '2023-09-27 18:54:08'),
(98, 'text', 'contact person,contact number,nri', 'other_contact', NULL, 'client information', NULL, '2023-10-02 17:54:46', '2023-10-02 17:54:46'),
(99, 'checkbox', 'yes|no', 'favourite', NULL, 'client information', NULL, '2023-10-04 16:50:03', '2023-10-04 16:50:03'),
(124, 'text', '-', 'state', NULL, 'state', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(125, 'text', '-', 'city', NULL, 'city', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(126, 'integer', '-', 'state_id', 100, 'city', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(127, 'integer', '-', 'state_id', NULL, 'locality', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(128, 'integer', '-', 'city_id', 103, 'locality', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(129, 'text', '-', 'Locality', NULL, 'locality', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(130, 'integer', '-', 'pincode', NULL, 'locality', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(131, 'text', '-', 'district', NULL, 'district', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(132, 'text', '-', 'taluka', NULL, 'taluka', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(133, 'integer', '-', 'district_id', NULL, 'taluka', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(134, 'integer', '-', 'district_id', NULL, 'village', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(135, 'integer', '-', 'taluka_id', NULL, 'village', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(136, 'text', '-', 'vilage_name', NULL, 'village', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(137, 'radio', '1|0', 'status', NULL, 'village', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(138, 'text', '-', 'builder_name', NULL, 'builder', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(139, 'integer', '-', 'branch_name', NULL, 'branch', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(140, 'integer', '-', 'state_id', NULL, 'branch', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(141, 'integer', '-', 'city_id', 140, 'branch', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(142, 'text', '-', 'area_id', 141, 'branch', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(143, 'text', '-', 'property_zone_name', NULL, 'property source', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(144, 'text', '-', 'name', NULL, 'amenities', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(145, 'text', '-', 'name', NULL, 'sales comment', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(146, 'text', '-', 'category_id', NULL, 'sales comment', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(147, 'text', '-', 'name', NULL, 'enquiry progress', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(148, 'text', NULL, 'color_picker', NULL, 'color', NULL, '2023-10-05 02:08:32', '2023-10-05 02:08:32'),
(149, 'integer', '-', 'id', NULL, NULL, NULL, '2023-10-05 11:52:36', '2023-10-05 11:52:36'),
(150, 'integer', '-', 'id', NULL, NULL, NULL, '2023-10-05 11:52:58', '2023-10-05 11:52:58'),
(151, 'integer', '-', 'id', NULL, NULL, NULL, '2023-10-05 11:52:58', '2023-10-05 11:52:58'),
(152, 'integer', '-', 'id', NULL, NULL, NULL, '2023-10-05 11:52:58', '2023-10-05 11:52:58'),
(153, 'integer', '-', 'id', NULL, NULL, NULL, '2023-10-05 11:52:58', '2023-10-05 11:52:58'),
(154, 'integer', '-', 'enquiry_id', NULL, NULL, NULL, '2023-10-07 15:18:05', '2023-10-07 15:18:05'),
(155, 'integer', NULL, 'builder_id', NULL, NULL, NULL, '2023-10-16 18:05:20', '2023-10-16 18:05:20'),
(156, 'integer', NULL, 'branch)id', NULL, NULL, NULL, '2023-10-16 19:03:16', '2023-10-16 19:03:16'),
(157, 'text', '-', 'first_name', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(158, 'text', '-', 'middle_name', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(159, 'text', '-', 'last_name', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(160, 'text', '-', 'dob', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(161, 'text', '-', 'hire_date', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(162, 'text', '-', 'driving_lincense', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(163, 'dropdown', '1|0', 'status', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(164, 'checkbox', '1|0', 'currently_working', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(165, 'dropdown', '-', 'specific_type', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(166, 'dropdown', '-', 'project_access', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(167, 'text', '-', 'address', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(168, 'number', '-', 'home_phone_no', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(169, 'dropdown', '-', 'position', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(170, 'dropdown', '-', 'branch', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(171, 'dropdown', '-', 'report_to_person', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(172, 'password', '-', 'password', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(173, 'dropdown', '-', 'role', NULL, NULL, NULL, '2023-10-20 08:55:11', '2023-10-20 08:55:11'),
(174, 'text', '-', 'office_no', NULL, NULL, NULL, '2023-10-20 14:37:13', '2023-10-20 14:37:13'),
(175, 'email', '-', 'email', NULL, NULL, NULL, '2023-10-20 14:37:49', '2023-10-20 14:37:49'),
(176, 'text', 'Rent|Sell|Both', 'property_for', NULL, NULL, NULL, '2023-10-20 14:38:53', '2023-10-20 14:38:53'),
(177, 'integer', 'dropdown', 'property_type', NULL, NULL, NULL, '2023-10-20 15:02:06', '2023-10-20 15:02:06'),
(178, 'integer', '-', 'user_id', NULL, NULL, NULL, '2023-10-20 15:02:06', '2023-10-20 15:02:06'),
(179, 'text', '-', 'role_name', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(180, 'checkbox', '-', 'view_dashboard', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(181, 'checkbox', '-', 'select_all_area', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(182, 'checkbox', '-', 'area_create', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(183, 'checkbox', '-', 'area_edit', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(184, 'checkbox', '-', 'area_list', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(185, 'checkbox', '-', 'area_delete', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(186, 'checkbox', '-', 'select_all_property', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(187, 'checkbox', '-', 'property_create', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(188, 'checkbox', '-', 'property_edit', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(189, 'checkbox', '-', 'property_list', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(190, 'checkbox', '-', 'property_delete', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(191, 'checkbox', '-', 'select_all_enquiry', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(192, 'checkbox', '-', 'enquiry_create', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(193, 'checkbox', '-', 'enquiry_edit', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(194, 'checkbox', '-', 'enquiry_list', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(195, 'checkbox', '-', 'enquiry_delete', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(196, 'checkbox', '-', 'select_all_project', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(197, 'checkbox', '-', 'project_create', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(198, 'checkbox', '-', 'project_edit', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(199, 'checkbox', '-', 'project_list', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(200, 'checkbox', '-', 'project_delete', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(201, 'checkbox', '-', 'select_all_unit', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(202, 'checkbox', '-', 'unit_create', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(203, 'checkbox', '-', 'unit_edit', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(204, 'checkbox', '-', 'unit_list', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(205, 'checkbox', '-', 'unit_delete', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(206, 'checkbox', '-', 'select_all_user', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(207, 'checkbox', '-', 'user_create', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(208, 'checkbox', '-', 'user_edit', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(209, 'checkbox', '-', 'user_list', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(210, 'checkbox', '-', 'user_delete', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(211, 'checkbox', '-', 'search_property', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(212, 'checkbox', '-', 'import_property', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(213, 'checkbox', '-', 'export_property', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(214, 'checkbox', '-', 'share_property', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(215, 'checkbox', '-', 'delete_enquiry_progress', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(216, 'checkbox', '-', 'bulk_enquiry_transfer', NULL, NULL, NULL, '2023-10-23 22:46:01', '2023-10-23 22:46:01'),
(217, 'integer', '-', 'user_role_id', NULL, NULL, NULL, '2023-10-24 05:00:09', '2023-10-24 05:00:09'),
(218, '', '-', 'role_permission', NULL, NULL, NULL, '2023-10-24 06:43:50', '2023-10-24 06:43:50'),
(219, 'text', '-', 'property_name_configration', NULL, NULL, NULL, '2023-10-24 13:57:18', '2023-10-24 13:57:18'),
(220, 'integer', '-', 'property_configration_id', NULL, NULL, NULL, '2023-10-24 13:57:18', '2023-10-24 13:57:18'),
(221, 'text', '-', 'enquiry_name_configration', NULL, NULL, NULL, '2023-10-24 13:57:18', '2023-10-24 13:57:18'),
(222, 'integer', '-', 'enquiry_cofigration_id', NULL, NULL, NULL, '2023-10-24 13:57:18', '2023-10-24 13:57:18'),
(223, 'text', '-', 'builder_name_configration', NULL, NULL, NULL, '2023-10-24 13:57:18', '2023-10-24 13:57:18'),
(224, 'integer', '', 'builder_configration_id', NULL, NULL, NULL, '2023-10-24 13:57:18', '2023-10-24 13:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `industrial_properties`
--

CREATE TABLE `industrial_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_for` varchar(50) DEFAULT NULL,
  `specific_type` varchar(50) DEFAULT NULL,
  `building_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `property_wing` varchar(50) DEFAULT NULL,
  `property_unit_no` varchar(50) DEFAULT NULL,
  `configuration` varchar(50) DEFAULT NULL,
  `property_status` varchar(50) DEFAULT NULL,
  `construction_area` varchar(50) DEFAULT NULL,
  `construction_measurement` varchar(50) DEFAULT NULL,
  `source_of_property` varchar(50) DEFAULT NULL,
  `zone` varchar(50) DEFAULT NULL,
  `plot_area` varchar(50) DEFAULT NULL,
  `plot_measurement` varchar(50) DEFAULT NULL,
  `hot_property` varchar(50) DEFAULT NULL,
  `commission` varchar(50) DEFAULT NULL,
  `pre_leased` int(11) NOT NULL DEFAULT 0,
  `Property_description` text DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `price_remarks` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `owner_details` text DEFAULT NULL,
  `gpcb` int(11) NOT NULL DEFAULT 0,
  `gpcb_remarks` text DEFAULT NULL,
  `ec_noc` int(11) NOT NULL DEFAULT 0,
  `ec_noc_remarks` text DEFAULT NULL,
  `bail` int(11) NOT NULL DEFAULT 0,
  `bail_remarks` text DEFAULT NULL,
  `discharge` int(11) NOT NULL DEFAULT 0,
  `discharge_remarks` text DEFAULT NULL,
  `gujrat_gas` int(11) NOT NULL DEFAULT 0,
  `gujrat_gas_remarks` text DEFAULT NULL,
  `power` int(11) NOT NULL DEFAULT 0,
  `power_remarks` text DEFAULT NULL,
  `water` int(11) NOT NULL DEFAULT 0,
  `water_remarks` text DEFAULT NULL,
  `machinery` int(11) NOT NULL DEFAULT 0,
  `machinery_remarks` text DEFAULT NULL,
  `etl_necpt` int(11) NOT NULL DEFAULT 0,
  `etl_necpt_remarks` text DEFAULT NULL,
  `added_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insta_properties`
--

CREATE TABLE `insta_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_for` varchar(50) DEFAULT NULL,
  `property_type` varchar(50) DEFAULT NULL,
  `specific_type` varchar(50) DEFAULT NULL,
  `building_id` int(11) DEFAULT NULL,
  `property_wing` varchar(50) DEFAULT NULL,
  `property_unit_no` varchar(50) DEFAULT NULL,
  `configuration` varchar(50) DEFAULT NULL,
  `super_builtup_area` varchar(50) DEFAULT NULL,
  `super_builtup_measurement` varchar(50) DEFAULT NULL,
  `plot_area` varchar(50) DEFAULT NULL,
  `plot_measurement` varchar(50) DEFAULT NULL,
  `terrace` varchar(50) DEFAULT NULL,
  `terrace_measuremnt` varchar(50) DEFAULT NULL,
  `hot_property` varchar(50) DEFAULT NULL,
  `furnished_status` varchar(50) DEFAULT NULL,
  `commision` varchar(50) DEFAULT NULL,
  `source_of_property` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `property_remarks` text DEFAULT NULL,
  `is_specific_number` varchar(50) DEFAULT NULL,
  `owner_contact_specific_no` varchar(50) DEFAULT NULL,
  `owner_name` varchar(50) DEFAULT NULL,
  `owner_number` varchar(50) DEFAULT NULL,
  `added_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `land_images`
--

CREATE TABLE `land_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `land_id` int(11) DEFAULT NULL,
  `pro_id` varchar(222) DEFAULT NULL,
  `image` varchar(180) DEFAULT NULL,
  `construction_documents` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_images`
--

INSERT INTO `land_images` (`id`, `user_id`, `land_id`, `pro_id`, `image`, `construction_documents`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 39, 12, '12', 'Screenshot (60)-1693764276.png', NULL, '2023-09-03 12:34:36', '2023-09-03 12:34:36', NULL),
(2, 39, 12, '12', 'Screenshot (61)-1693764276.png', NULL, '2023-09-03 12:34:36', '2023-09-03 12:34:36', NULL),
(3, 39, 12, '12', 'Screenshot (62)-1693764276.png', NULL, '2023-09-03 12:34:36', '2023-09-03 12:34:36', NULL),
(4, 39, 12, '12', 'Abharat-1693764276.pdf', NULL, '2023-09-03 12:34:36', '2023-09-03 12:34:36', NULL),
(5, 39, NULL, '15', 'Warm-lead-1 (1)-1693929237.png', NULL, '2023-09-05 10:23:57', '2023-09-05 10:23:57', NULL),
(6, 39, NULL, '15', 'Abharat-1693929237.pdf', NULL, '2023-09-05 10:23:58', '2023-09-05 10:23:58', NULL),
(7, 39, 12, '12', 'Warm-lead-1 (1)-1693929363.png', NULL, '2023-09-05 10:26:03', '2023-09-05 10:26:03', NULL),
(8, 39, 12, '12', 'Hot-lead-1 (1)-1693930095.png', NULL, '2023-09-05 10:38:15', '2023-09-05 10:38:15', NULL),
(9, 39, 15, '15', 'Warm-lead-1 (1)-1693930148.png', NULL, '2023-09-05 10:39:08', '2023-09-05 10:39:08', NULL),
(10, 39, 12, '12', 'Hot-lead-1 (1)-1693930214.png', NULL, '2023-09-05 10:40:14', '2023-09-05 10:40:14', NULL),
(11, 39, NULL, '2', 'Hot-lead-1 (1)-1694943370.png', NULL, '2023-09-17 09:36:10', '2023-09-17 09:36:10', NULL),
(12, 39, NULL, '61', '22322-1695464657.jpg', NULL, '2023-09-23 10:24:17', '2023-09-23 10:24:17', NULL),
(13, 39, 70, '70', 'Warm-lead-1 (1)-1696185347.png', NULL, '2023-10-01 18:35:47', '2023-10-01 18:35:47', NULL),
(14, 39, 70, '70', '22-9 (1)-1696185347.docx', NULL, '2023-10-01 18:35:47', '2023-10-01 18:35:47', NULL),
(15, 39, NULL, '77', '22322-1696316508.jpg', NULL, '2023-10-03 07:01:48', '2023-10-03 07:01:48', NULL),
(16, 39, NULL, '77', '1-converted-1696316508.pdf', NULL, '2023-10-03 07:01:48', '2023-10-03 07:01:48', NULL),
(17, 39, NULL, '78', '061-1696318985.jpg', NULL, '2023-10-03 07:43:05', '2023-10-03 07:43:05', NULL),
(18, 39, NULL, '78', 'st to amd-1696318985.pdf', NULL, '2023-10-03 07:43:05', '2023-10-03 07:43:05', NULL),
(19, 39, NULL, '79', '061-1696319960.jpg', NULL, '2023-10-03 07:59:20', '2023-10-03 07:59:20', NULL),
(20, 39, NULL, '79', '1-converted-1696319960.pdf', NULL, '2023-10-03 07:59:20', '2023-10-03 07:59:20', NULL),
(21, 39, NULL, '80', '061-1696321410.jpg', NULL, '2023-10-03 08:23:30', '2023-10-03 08:23:30', NULL),
(22, 39, NULL, '80', '1-converted-1696321410.pdf', NULL, '2023-10-03 08:23:30', '2023-10-03 08:23:30', NULL),
(23, 39, NULL, '83', 'Hot-lead-1 (1)-1696609519.png', NULL, '2023-10-06 16:25:19', '2023-10-06 16:25:19', NULL),
(24, 39, NULL, '83', 'project_fields_updated (1)-1696609519.xlsx', NULL, '2023-10-06 16:25:19', '2023-10-06 16:25:19', NULL),
(25, 39, 78, '78', 'IMG_1717.JPG (1)-1696854514.jpg', NULL, '2023-10-09 12:28:34', '2023-10-09 12:28:34', NULL),
(26, 39, 78, '78', 'IMG_1717.JPG (2)-1696854514.jpg', NULL, '2023-10-09 12:28:34', '2023-10-09 12:28:34', NULL),
(27, 39, 78, '78', 'IMG_1717.JPG (3)-1696854514.jpg', NULL, '2023-10-09 12:28:34', '2023-10-09 12:28:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `land_properties`
--

CREATE TABLE `land_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `specific_type` varchar(50) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `taluka_id` int(11) DEFAULT NULL,
  `village_id` int(11) DEFAULT NULL,
  `zone` varchar(50) DEFAULT NULL,
  `fsi` varchar(180) DEFAULT NULL,
  `configuration` int(11) DEFAULT NULL,
  `survey_number` varchar(180) DEFAULT NULL,
  `plot_size` int(11) DEFAULT NULL,
  `plot_measurement` int(11) DEFAULT NULL,
  `price` varchar(160) DEFAULT NULL,
  `tp_number` varchar(180) DEFAULT NULL,
  `fp_number` varchar(180) DEFAULT NULL,
  `plot2_size` int(11) DEFAULT NULL,
  `plot2_measurement` int(11) DEFAULT NULL,
  `price2` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `location_url` text DEFAULT NULL,
  `property_source` int(11) DEFAULT NULL,
  `refrence` varchar(180) DEFAULT NULL,
  `owner_details` text DEFAULT NULL,
  `added_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loggedin`
--

CREATE TABLE `loggedin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `succeed` int(11) NOT NULL DEFAULT 0,
  `ipaddress` varchar(180) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loggedin`
--

INSERT INTO `loggedin` (`id`, `user_id`, `employee_id`, `succeed`, `ipaddress`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 6, 0, '49.34.98.89', '2023-08-22 18:10:39', '2023-08-22 18:10:39', NULL),
(2, NULL, 6, 0, '49.34.98.89', '2023-08-22 18:12:45', '2023-08-22 18:12:45', NULL),
(3, NULL, 6, 0, '49.34.39.119', '2023-08-23 02:58:52', '2023-08-23 02:58:52', NULL),
(4, NULL, 6, 0, '49.34.39.119', '2023-08-23 03:02:31', '2023-08-23 03:02:31', NULL),
(5, 8, 8, 1, '49.34.39.119', '2023-08-23 03:02:42', '2023-08-23 03:02:42', NULL),
(6, NULL, 6, 0, '49.34.39.119', '2023-08-23 03:05:51', '2023-08-23 03:05:51', NULL),
(7, NULL, 39, 1, '106.202.206.99', '2023-08-23 04:11:09', '2023-08-23 04:11:10', NULL),
(8, NULL, 39, 1, '106.202.206.99', '2023-08-23 04:22:36', '2023-08-23 04:22:36', NULL),
(9, NULL, 39, 1, '125.20.97.10', '2023-08-23 05:29:10', '2023-08-23 05:29:10', NULL),
(10, 8, 8, 1, '110.227.231.59', '2023-08-23 08:58:28', '2023-08-23 08:58:28', NULL),
(11, NULL, 39, 1, '49.36.69.202', '2023-08-23 11:19:01', '2023-08-23 11:19:01', NULL),
(12, NULL, 39, 1, '49.36.69.202', '2023-08-23 12:04:14', '2023-08-23 12:04:14', NULL),
(13, 8, 8, 1, '49.34.154.112', '2023-08-23 15:01:19', '2023-08-23 15:01:19', NULL),
(14, 8, 8, 1, '103.161.98.189', '2023-08-23 15:23:09', '2023-08-23 15:23:09', NULL),
(15, 8, 8, 1, '49.34.154.112', '2023-08-23 15:51:08', '2023-08-23 15:51:08', NULL),
(16, NULL, 6, 0, '49.34.154.112', '2023-08-23 15:51:19', '2023-08-23 15:51:19', NULL),
(17, 8, 8, 1, '49.34.154.112', '2023-08-23 15:56:27', '2023-08-23 15:56:27', NULL),
(18, NULL, 39, 1, '49.34.198.107', '2023-08-23 16:03:25', '2023-08-23 16:03:25', NULL),
(19, NULL, 39, 1, '223.236.121.130', '2023-08-23 16:22:41', '2023-08-23 16:22:41', NULL),
(20, NULL, 39, 1, '49.34.154.112', '2023-08-23 17:05:58', '2023-08-23 17:05:59', NULL),
(21, 8, 8, 1, '49.34.155.255', '2023-08-23 18:14:05', '2023-08-23 18:14:05', NULL),
(22, 8, 8, 1, '49.34.155.255', '2023-08-23 18:17:42', '2023-08-23 18:17:42', NULL),
(23, NULL, 39, 0, '49.34.155.255', '2023-08-23 18:18:11', '2023-08-23 18:18:11', NULL),
(24, NULL, 39, 1, '49.34.155.255', '2023-08-23 18:18:21', '2023-08-23 18:18:21', NULL),
(25, NULL, 39, 1, '106.202.206.99', '2023-08-24 03:05:08', '2023-08-24 03:05:08', NULL),
(26, NULL, 39, 1, '223.236.121.130', '2023-08-24 03:22:28', '2023-08-24 03:22:28', NULL),
(27, NULL, 39, 1, '106.202.206.99', '2023-08-24 04:09:02', '2023-08-24 04:09:02', NULL),
(28, NULL, 39, 1, '152.58.60.59', '2023-08-24 06:05:23', '2023-08-24 06:05:23', NULL),
(29, NULL, 39, 1, '49.36.65.190', '2023-08-24 06:09:12', '2023-08-24 06:09:12', NULL),
(30, NULL, 39, 1, '49.36.71.116', '2023-08-24 06:56:42', '2023-08-24 06:56:42', NULL),
(31, NULL, 39, 1, '49.36.71.116', '2023-08-24 12:35:49', '2023-08-24 12:35:49', NULL),
(32, NULL, 39, 1, '49.34.174.248', '2023-08-24 15:08:32', '2023-08-24 15:08:33', NULL),
(33, NULL, 39, 1, '49.34.177.225', '2023-08-24 16:22:06', '2023-08-24 16:22:06', NULL),
(34, NULL, 39, 1, '49.34.133.220', '2023-08-25 03:51:15', '2023-08-25 03:51:15', NULL),
(35, NULL, 39, 1, '125.20.97.10', '2023-08-25 05:13:51', '2023-08-25 05:13:51', NULL),
(36, NULL, 39, 1, '125.20.97.10', '2023-08-25 08:46:25', '2023-08-25 08:46:25', NULL),
(37, NULL, 39, 1, '49.36.71.36', '2023-08-25 09:06:02', '2023-08-25 09:06:02', NULL),
(38, 8, 8, 1, '125.20.97.10', '2023-08-25 09:11:36', '2023-08-25 09:11:36', NULL),
(39, NULL, 39, 1, '125.20.97.10', '2023-08-25 09:13:44', '2023-08-25 09:13:44', NULL),
(40, 8, 8, 1, '125.20.97.10', '2023-08-25 09:16:04', '2023-08-25 09:16:04', NULL),
(41, NULL, 39, 1, '125.20.97.10', '2023-08-25 09:21:30', '2023-08-25 09:21:30', NULL),
(42, NULL, 39, 1, '49.36.71.36', '2023-08-25 13:14:26', '2023-08-25 13:14:26', NULL),
(43, NULL, 39, 1, '49.34.149.229', '2023-08-25 14:52:50', '2023-08-25 14:52:50', NULL),
(44, NULL, 39, 1, '49.34.159.184', '2023-08-25 15:30:09', '2023-08-25 15:30:09', NULL),
(45, NULL, 39, 1, '49.34.149.229', '2023-08-25 16:08:24', '2023-08-25 16:08:24', NULL),
(46, 8, 8, 1, '103.161.98.189', '2023-08-25 16:10:29', '2023-08-25 16:10:29', NULL),
(47, NULL, 39, 1, '49.34.149.229', '2023-08-25 16:33:21', '2023-08-25 16:33:21', NULL),
(48, NULL, 48, 0, '49.34.149.229', '2023-08-25 16:43:27', '2023-08-25 16:43:27', NULL),
(49, NULL, 48, 1, '49.34.149.229', '2023-08-25 16:43:32', '2023-08-25 16:43:32', NULL),
(50, NULL, 39, 1, '103.161.98.189', '2023-08-25 16:43:45', '2023-08-25 16:43:45', NULL),
(51, NULL, 39, 1, '49.34.159.184', '2023-08-25 16:59:15', '2023-08-25 16:59:15', NULL),
(52, NULL, 48, 1, '49.34.149.229', '2023-08-25 17:01:31', '2023-08-25 17:01:31', NULL),
(53, NULL, 39, 1, '103.161.98.189', '2023-08-25 17:11:32', '2023-08-25 17:11:32', NULL),
(54, NULL, 39, 1, '49.34.149.229', '2023-08-25 17:11:46', '2023-08-25 17:11:46', NULL),
(55, NULL, 39, 1, '49.34.159.184', '2023-08-25 17:14:39', '2023-08-25 17:14:39', NULL),
(56, NULL, 39, 1, '49.34.149.229', '2023-08-25 17:22:36', '2023-08-25 17:22:36', NULL),
(57, 8, 8, 1, '49.34.159.184', '2023-08-25 18:31:17', '2023-08-25 18:31:17', NULL),
(58, NULL, 39, 1, '182.77.127.188', '2023-08-26 03:49:44', '2023-08-26 03:49:45', NULL),
(59, NULL, 39, 1, '49.34.207.29', '2023-08-26 03:57:42', '2023-08-26 03:57:42', NULL),
(60, NULL, 39, 1, '49.34.207.29', '2023-08-26 03:57:49', '2023-08-26 03:57:49', NULL),
(61, NULL, 39, 1, '49.34.161.37', '2023-08-26 06:14:50', '2023-08-26 06:14:51', NULL),
(62, NULL, 48, 1, '49.34.161.37', '2023-08-26 06:15:40', '2023-08-26 06:15:40', NULL),
(63, NULL, 48, 1, '49.34.161.37', '2023-08-26 06:43:59', '2023-08-26 06:43:59', NULL),
(64, NULL, 48, 1, '49.34.161.37', '2023-08-26 06:57:35', '2023-08-26 06:57:35', NULL),
(65, NULL, 39, 1, '49.34.161.37', '2023-08-26 06:57:42', '2023-08-26 06:57:42', NULL),
(66, NULL, 39, 1, '182.77.127.188', '2023-08-26 16:31:21', '2023-08-26 16:31:21', NULL),
(67, NULL, 39, 1, '49.34.202.219', '2023-08-26 18:09:54', '2023-08-26 18:09:54', NULL),
(68, NULL, 39, 1, '103.161.98.189', '2023-08-26 18:10:54', '2023-08-26 18:10:54', NULL),
(69, 8, 8, 1, '103.161.98.189', '2023-08-26 18:11:27', '2023-08-26 18:11:27', NULL),
(70, NULL, 39, 1, '103.161.98.189', '2023-08-26 18:11:49', '2023-08-26 18:11:49', NULL),
(71, NULL, 39, 1, '182.77.127.188', '2023-08-26 19:30:38', '2023-08-26 19:30:38', NULL),
(72, NULL, 39, 1, '182.77.127.188', '2023-08-27 03:41:22', '2023-08-27 03:41:22', NULL),
(73, NULL, 39, 1, '49.34.137.191', '2023-08-27 03:57:55', '2023-08-27 03:57:55', NULL),
(74, NULL, 39, 1, '49.34.54.72', '2023-08-27 05:25:11', '2023-08-27 05:25:11', NULL),
(75, NULL, 39, 1, '103.161.98.189', '2023-08-27 06:07:10', '2023-08-27 06:07:10', NULL),
(76, NULL, 39, 1, '49.34.137.191', '2023-08-27 06:27:17', '2023-08-27 06:27:17', NULL),
(77, NULL, 39, 1, '106.201.144.15', '2023-08-27 11:16:04', '2023-08-27 11:16:04', NULL),
(78, NULL, 39, 1, '182.77.127.188', '2023-08-27 11:41:39', '2023-08-27 11:41:39', NULL),
(79, NULL, 39, 1, '49.36.82.135', '2023-08-28 03:43:36', '2023-08-28 03:43:36', NULL),
(80, NULL, 39, 1, '125.20.97.10', '2023-08-28 06:11:53', '2023-08-28 06:11:53', NULL),
(81, NULL, 39, 1, '152.58.61.38', '2023-08-28 06:13:08', '2023-08-28 06:13:08', NULL),
(82, NULL, 39, 1, '125.20.97.10', '2023-08-28 13:20:19', '2023-08-28 13:20:19', NULL),
(83, NULL, 39, 1, '157.32.90.131', '2023-08-28 15:38:35', '2023-08-28 15:38:35', NULL),
(84, NULL, 39, 1, '103.161.98.189', '2023-08-28 17:14:05', '2023-08-28 17:14:05', NULL),
(85, NULL, 39, 1, '106.201.144.15', '2023-08-29 04:37:39', '2023-08-29 04:37:39', NULL),
(86, NULL, 39, 1, '152.58.61.254', '2023-08-29 05:44:52', '2023-08-29 05:44:52', NULL),
(87, NULL, 39, 1, '49.36.71.132', '2023-08-29 08:58:01', '2023-08-29 08:58:01', NULL),
(88, NULL, 39, 1, '49.36.71.132', '2023-08-29 12:10:58', '2023-08-29 12:10:58', NULL),
(89, NULL, 39, 1, '49.34.129.149', '2023-08-29 15:34:38', '2023-08-29 15:34:38', NULL),
(90, NULL, 39, 1, '49.34.129.149', '2023-08-29 15:34:53', '2023-08-29 15:34:53', NULL),
(91, NULL, 39, 1, '157.32.66.192', '2023-08-29 16:09:00', '2023-08-29 16:09:01', NULL),
(92, NULL, 39, 1, '49.34.246.29', '2023-08-30 09:26:07', '2023-08-30 09:26:07', NULL),
(93, NULL, 39, 1, '49.34.244.98', '2023-08-30 15:39:00', '2023-08-30 15:39:01', NULL),
(94, NULL, 39, 1, '49.34.253.64', '2023-08-30 15:39:24', '2023-08-30 15:39:24', NULL),
(95, NULL, 39, 1, '127.0.0.1', '2023-08-30 10:19:14', '2023-08-30 10:19:14', NULL),
(96, NULL, 39, 1, '127.0.0.1', '2023-08-31 01:37:40', '2023-08-31 01:37:41', NULL),
(97, NULL, 39, 1, '127.0.0.1', '2023-08-31 01:39:56', '2023-08-31 01:39:57', NULL),
(98, NULL, 39, 1, '127.0.0.1', '2023-08-31 10:13:23', '2023-08-31 10:13:23', NULL),
(99, NULL, 39, 1, '127.0.0.1', '2023-09-01 11:01:57', '2023-09-01 11:01:57', NULL),
(100, NULL, 39, 1, '127.0.0.1', '2023-09-01 11:42:57', '2023-09-01 11:42:58', NULL),
(101, NULL, 39, 1, '127.0.0.1', '2023-09-01 22:11:32', '2023-09-01 22:11:32', NULL),
(102, NULL, 39, 1, '127.0.0.1', '2023-09-02 05:05:14', '2023-09-02 05:05:14', NULL),
(103, 8, 8, 1, '127.0.0.1', '2023-09-02 11:06:39', '2023-09-02 11:06:39', NULL),
(104, NULL, 39, 1, '127.0.0.1', '2023-09-03 00:53:27', '2023-09-03 00:53:28', NULL),
(105, NULL, 39, 1, '127.0.0.1', '2023-09-03 01:35:49', '2023-09-03 01:35:49', NULL),
(106, NULL, 39, 1, '127.0.0.1', '2023-09-03 01:37:36', '2023-09-03 01:37:37', NULL),
(107, NULL, 39, 1, '127.0.0.1', '2023-09-03 04:51:51', '2023-09-03 04:51:52', NULL),
(108, NULL, 39, 1, '127.0.0.1', '2023-09-03 05:50:08', '2023-09-03 05:50:08', NULL),
(109, NULL, 39, 1, '127.0.0.1', '2023-09-03 08:04:17', '2023-09-03 08:04:17', NULL),
(110, NULL, 39, 1, '127.0.0.1', '2023-09-03 12:11:06', '2023-09-03 12:11:06', NULL),
(111, NULL, 39, 1, '127.0.0.1', '2023-09-04 10:33:08', '2023-09-04 10:33:08', NULL),
(112, NULL, 39, 1, '127.0.0.1', '2023-09-05 09:51:38', '2023-09-05 09:51:38', NULL),
(113, NULL, 39, 1, '127.0.0.1', '2023-09-06 11:43:08', '2023-09-06 11:43:09', NULL),
(114, NULL, 39, 1, '127.0.0.1', '2023-09-06 12:35:31', '2023-09-06 12:35:31', NULL),
(115, NULL, 39, 1, '127.0.0.1', '2023-09-06 23:10:16', '2023-09-06 23:10:16', NULL),
(116, NULL, 39, 1, '127.0.0.1', '2023-09-07 04:14:42', '2023-09-07 04:14:42', NULL),
(117, NULL, 39, 1, '127.0.0.1', '2023-09-07 08:31:43', '2023-09-07 08:31:44', NULL),
(118, 8, 8, 1, '127.0.0.1', '2023-09-07 21:39:48', '2023-09-07 21:39:48', NULL),
(119, NULL, 39, 1, '127.0.0.1', '2023-09-07 21:40:34', '2023-09-07 21:40:34', NULL),
(120, NULL, 39, 1, '127.0.0.1', '2023-09-07 22:14:50', '2023-09-07 22:14:50', NULL),
(121, 8, 49, 1, '127.0.0.1', '2023-09-07 22:29:09', '2023-09-07 22:29:09', NULL),
(122, 8, 49, 1, '127.0.0.1', '2023-09-08 01:46:11', '2023-09-08 01:46:11', NULL),
(123, NULL, 39, 1, '127.0.0.1', '2023-09-08 01:46:50', '2023-09-08 01:46:50', NULL),
(124, NULL, 39, 1, '127.0.0.1', '2023-09-08 11:27:08', '2023-09-08 11:27:08', NULL),
(125, NULL, 39, 1, '127.0.0.1', '2023-09-08 14:12:19', '2023-09-08 14:12:20', NULL),
(126, NULL, 39, 1, '127.0.0.1', '2023-09-10 02:53:17', '2023-09-10 02:53:17', NULL),
(127, NULL, 39, 1, '127.0.0.1', '2023-09-10 08:33:38', '2023-09-10 08:33:38', NULL),
(128, 39, 50, 1, '127.0.0.1', '2023-09-10 08:36:31', '2023-09-10 08:36:31', NULL),
(129, NULL, 39, 1, '127.0.0.1', '2023-09-10 21:40:17', '2023-09-10 21:40:17', NULL),
(130, NULL, 39, 1, '127.0.0.1', '2023-09-11 11:09:42', '2023-09-11 11:09:42', NULL),
(131, NULL, 39, 1, '127.0.0.1', '2023-09-11 22:05:20', '2023-09-11 22:05:20', NULL),
(132, NULL, 39, 1, '127.0.0.1', '2023-09-12 10:49:40', '2023-09-12 10:49:40', NULL),
(133, NULL, 39, 1, '127.0.0.1', '2023-09-13 10:39:02', '2023-09-13 10:39:02', NULL),
(134, NULL, 39, 1, '127.0.0.1', '2023-09-14 12:34:01', '2023-09-14 12:34:01', NULL),
(135, 39, 39, 1, '127.0.0.1', '2023-09-14 12:56:03', '2023-09-14 12:56:04', NULL),
(136, 39, 39, 1, '127.0.0.1', '2023-09-14 12:56:43', '2023-09-14 12:56:44', NULL),
(137, 39, 39, 1, '127.0.0.1', '2023-09-15 10:18:32', '2023-09-15 10:18:32', NULL),
(138, 39, 39, 1, '127.0.0.1', '2023-09-15 10:42:59', '2023-09-15 10:43:00', NULL),
(139, 39, 39, 1, '127.0.0.1', '2023-09-15 23:08:06', '2023-09-15 23:08:06', NULL),
(140, 39, 39, 1, '127.0.0.1', '2023-09-16 07:04:25', '2023-09-16 07:04:25', NULL),
(141, 39, 39, 1, '127.0.0.1', '2023-09-16 09:28:35', '2023-09-16 09:28:35', NULL),
(142, 39, 39, 1, '122.182.191.203', '2023-09-16 18:25:56', '2023-09-16 18:25:56', NULL),
(143, 39, 39, 1, '122.182.191.203', '2023-09-17 01:45:16', '2023-09-17 01:45:16', NULL),
(144, 39, 39, 1, '49.34.129.46', '2023-09-17 07:15:28', '2023-09-17 07:15:28', NULL),
(145, 39, 39, 1, '157.32.107.255', '2023-09-17 07:52:01', '2023-09-17 07:52:01', NULL),
(146, 39, 39, 1, '152.58.36.35', '2023-09-17 10:05:04', '2023-09-17 10:05:04', NULL),
(147, 39, 39, 1, '103.93.9.133', '2023-09-17 12:12:11', '2023-09-17 12:12:11', NULL),
(148, 39, 39, 1, '49.34.160.20', '2023-09-17 12:18:43', '2023-09-17 12:18:43', NULL),
(149, 39, 39, 1, '49.34.123.235', '2023-09-17 14:50:51', '2023-09-17 14:50:51', NULL),
(150, 39, 39, 1, '42.105.166.210', '2023-09-17 15:07:05', '2023-09-17 15:07:06', NULL),
(151, 39, 39, 1, '171.78.196.217', '2023-09-18 04:51:51', '2023-09-18 04:51:51', NULL),
(152, 39, 39, 1, '157.32.127.165', '2023-09-18 08:55:53', '2023-09-18 08:55:54', NULL),
(153, 39, 39, 1, '49.36.71.212', '2023-09-18 13:03:07', '2023-09-18 13:03:08', NULL),
(154, 39, 39, 1, '49.34.70.15', '2023-09-18 16:14:38', '2023-09-18 16:14:38', NULL),
(155, 39, 39, 1, '157.32.110.71', '2023-09-18 16:18:41', '2023-09-18 16:18:41', NULL),
(156, 39, 50, 0, '49.34.70.15', '2023-09-18 18:03:26', '2023-09-18 18:03:26', NULL),
(157, 39, 50, 1, '49.34.70.15', '2023-09-18 18:03:47', '2023-09-18 18:03:47', NULL),
(158, 39, 50, 1, '49.34.70.15', '2023-09-18 18:03:56', '2023-09-18 18:03:56', NULL),
(159, 39, 39, 1, '27.57.165.155', '2023-09-19 04:54:47', '2023-09-19 04:54:47', NULL),
(160, 39, 39, 1, '49.36.69.54', '2023-09-19 05:54:32', '2023-09-19 05:54:33', NULL),
(161, 39, 39, 1, '49.36.71.36', '2023-09-19 12:34:05', '2023-09-19 12:34:05', NULL),
(162, 39, 39, 1, '27.57.165.155', '2023-09-19 12:53:01', '2023-09-19 12:53:01', NULL),
(163, 39, 39, 1, '49.34.176.79', '2023-09-19 14:40:50', '2023-09-19 14:40:50', NULL),
(164, 39, 39, 1, '49.34.83.44', '2023-09-19 17:00:51', '2023-09-19 17:00:51', NULL),
(165, 39, 39, 1, '27.57.165.155', '2023-09-20 03:36:33', '2023-09-20 03:36:33', NULL),
(166, 39, 39, 1, '125.20.97.10', '2023-09-20 04:43:57', '2023-09-20 04:43:58', NULL),
(167, 39, 39, 1, '122.170.67.152', '2023-09-20 05:10:24', '2023-09-20 05:10:25', NULL),
(168, 39, 39, 1, '152.58.36.3', '2023-09-20 05:23:47', '2023-09-20 05:23:47', NULL),
(169, 39, 39, 1, '49.36.91.32', '2023-09-20 05:46:03', '2023-09-20 05:46:03', NULL),
(170, 39, 39, 1, '157.32.74.128', '2023-09-20 15:51:40', '2023-09-20 15:51:40', NULL),
(171, 39, 39, 1, '106.201.113.45', '2023-09-20 17:36:18', '2023-09-20 17:36:18', NULL),
(172, 39, 39, 1, '49.34.229.40', '2023-09-21 16:13:54', '2023-09-21 16:13:54', NULL),
(173, 39, 39, 1, '49.34.166.248', '2023-09-21 16:54:25', '2023-09-21 16:54:25', NULL),
(174, 39, 39, 1, '49.34.92.87', '2023-09-21 19:43:23', '2023-09-21 19:43:23', NULL),
(175, 39, 39, 1, '157.32.109.255', '2023-09-22 04:03:34', '2023-09-22 04:03:35', NULL),
(176, 39, 39, 1, '122.170.77.70', '2023-09-22 04:46:40', '2023-09-22 04:46:40', NULL),
(177, 39, 39, 1, '49.36.71.252', '2023-09-22 06:05:05', '2023-09-22 06:05:05', NULL),
(178, 39, 39, 1, '106.215.41.154', '2023-09-22 15:10:06', '2023-09-22 15:10:06', NULL),
(179, 39, 39, 1, '49.34.186.31', '2023-09-22 15:52:16', '2023-09-22 15:52:16', NULL),
(180, 39, 39, 1, '106.201.113.45', '2023-09-22 16:26:37', '2023-09-22 16:26:37', NULL),
(181, 39, 39, 1, '49.34.228.119', '2023-09-23 02:49:28', '2023-09-23 02:49:28', NULL),
(182, 39, 39, 1, '49.34.194.115', '2023-09-23 04:25:59', '2023-09-23 04:25:59', NULL),
(183, 39, 39, 1, '106.215.41.154', '2023-09-23 07:00:35', '2023-09-23 07:00:35', NULL),
(184, 39, 39, 1, '49.34.219.26', '2023-09-23 07:01:07', '2023-09-23 07:01:08', NULL),
(185, 39, 39, 1, '49.36.71.88', '2023-09-23 15:19:05', '2023-09-23 15:19:05', NULL),
(186, 39, 39, 1, '49.34.249.96', '2023-09-23 15:19:26', '2023-09-23 15:19:26', NULL),
(187, 39, 39, 1, '152.58.60.190', '2023-09-23 15:31:55', '2023-09-23 15:31:55', NULL),
(188, 39, 39, 1, '49.36.71.88', '2023-09-23 15:48:10', '2023-09-23 15:48:10', NULL),
(189, 39, 39, 1, '49.34.183.185', '2023-09-23 17:18:29', '2023-09-23 17:18:29', NULL),
(190, NULL, 6, 0, '106.205.245.192', '2023-09-23 17:49:30', '2023-09-23 17:49:30', NULL),
(191, 39, 39, 1, '49.34.183.185', '2023-09-23 18:48:26', '2023-09-23 18:48:26', NULL),
(192, 39, 39, 1, '49.34.202.231', '2023-09-24 04:32:26', '2023-09-24 04:32:26', NULL),
(193, 39, 39, 1, '49.34.116.189', '2023-09-24 15:11:01', '2023-09-24 15:11:01', NULL),
(194, 39, 39, 1, '49.34.222.201', '2023-09-25 03:01:50', '2023-09-25 03:01:50', NULL),
(195, 39, 39, 1, '106.215.41.154', '2023-09-25 04:04:25', '2023-09-25 04:04:25', NULL),
(196, 39, 39, 1, '49.36.71.48', '2023-09-25 06:10:19', '2023-09-25 06:10:19', NULL),
(197, 39, 39, 1, '106.215.45.202', '2023-09-25 06:32:46', '2023-09-25 06:32:47', NULL),
(198, 39, 39, 1, '49.36.64.32', '2023-09-25 06:41:35', '2023-09-25 06:41:35', NULL),
(199, 39, 39, 1, '106.215.41.154', '2023-09-25 13:16:26', '2023-09-25 13:16:26', NULL),
(200, 39, 39, 1, '157.32.121.197', '2023-09-25 15:54:50', '2023-09-25 15:54:50', NULL),
(201, 39, 39, 1, '49.34.50.86', '2023-09-25 16:02:41', '2023-09-25 16:02:42', NULL),
(202, 39, 39, 1, '152.58.60.29', '2023-09-25 19:58:44', '2023-09-25 19:58:44', NULL),
(203, 39, 39, 1, '49.34.191.205', '2023-09-26 03:43:25', '2023-09-26 03:43:25', NULL),
(204, 39, 39, 1, '122.170.76.0', '2023-09-26 04:31:44', '2023-09-26 04:31:44', NULL),
(205, 39, 39, 1, '49.36.71.184', '2023-09-26 05:25:55', '2023-09-26 05:25:55', NULL),
(206, 39, 39, 1, '122.170.76.0', '2023-09-26 09:27:19', '2023-09-26 09:27:19', NULL),
(207, 39, 39, 1, '49.36.65.190', '2023-09-26 12:33:03', '2023-09-26 12:33:03', NULL),
(208, 39, 39, 1, '49.34.231.166', '2023-09-26 16:29:30', '2023-09-26 16:29:30', NULL),
(209, 39, 39, 0, '122.170.76.0', '2023-09-26 16:31:09', '2023-09-26 16:31:09', NULL),
(210, 39, 39, 1, '122.170.76.0', '2023-09-26 16:31:14', '2023-09-26 16:31:14', NULL),
(211, 39, 39, 1, '49.34.195.10', '2023-09-27 03:48:28', '2023-09-27 03:48:28', NULL),
(212, 39, 39, 1, '49.34.243.188', '2023-09-27 04:01:35', '2023-09-27 04:01:35', NULL),
(213, 39, 39, 1, '49.34.152.35', '2023-09-27 04:40:52', '2023-09-27 04:40:52', NULL),
(214, 39, 39, 0, '49.36.65.190', '2023-09-27 07:47:32', '2023-09-27 07:47:32', NULL),
(215, 39, 39, 1, '49.36.65.190', '2023-09-27 07:47:36', '2023-09-27 07:47:36', NULL),
(216, 39, 39, 1, '49.36.71.36', '2023-09-27 07:56:02', '2023-09-27 07:56:02', NULL),
(217, 39, 39, 1, '49.34.161.202', '2023-09-27 08:19:12', '2023-09-27 08:19:13', NULL),
(218, 39, 39, 1, '122.170.170.240', '2023-09-27 16:20:31', '2023-09-27 16:20:31', NULL),
(219, 39, 39, 1, '157.32.116.23', '2023-09-27 16:20:55', '2023-09-27 16:20:55', NULL),
(220, 39, 39, 1, '103.238.107.86', '2023-09-27 17:27:28', '2023-09-27 17:27:28', NULL),
(221, 39, 39, 1, '157.32.116.23', '2023-09-27 19:30:57', '2023-09-27 19:30:57', NULL),
(222, 39, 39, 1, '49.34.195.228', '2023-09-28 03:47:36', '2023-09-28 03:47:36', NULL),
(223, 39, 39, 1, '122.170.76.0', '2023-09-28 04:22:12', '2023-09-28 04:22:12', NULL),
(224, 39, 39, 1, '49.34.212.100', '2023-09-28 15:48:12', '2023-09-28 15:48:12', NULL),
(225, 39, 39, 1, '49.34.80.67', '2023-09-28 16:19:13', '2023-09-28 16:19:13', NULL),
(226, 39, 39, 1, '122.170.76.0', '2023-09-29 05:27:20', '2023-09-29 05:27:20', NULL),
(227, 39, 39, 1, '122.170.76.0', '2023-09-29 08:57:30', '2023-09-29 08:57:30', NULL),
(228, 39, 39, 1, '103.238.107.86', '2023-09-29 15:50:46', '2023-09-29 15:50:46', NULL),
(229, 39, 39, 1, '49.34.250.159', '2023-09-29 16:22:33', '2023-09-29 16:22:33', NULL),
(230, 39, 39, 1, '49.34.132.199', '2023-09-29 16:55:39', '2023-09-29 16:55:40', NULL),
(231, 39, 39, 1, '49.34.135.46', '2023-09-30 05:17:37', '2023-09-30 05:17:37', NULL),
(232, 39, 39, 1, '49.34.106.40', '2023-09-30 16:34:02', '2023-09-30 16:34:02', NULL),
(233, 39, 39, 1, '122.170.170.240', '2023-09-30 16:52:57', '2023-09-30 16:52:57', NULL),
(234, 39, 39, 1, '49.34.60.12', '2023-10-01 18:31:43', '2023-10-01 18:31:43', NULL),
(235, 39, 39, 1, '125.20.97.10', '2023-10-02 06:18:31', '2023-10-02 06:18:31', NULL),
(236, 39, 39, 0, '49.36.66.250', '2023-10-02 06:19:37', '2023-10-02 06:19:37', NULL),
(237, 39, 39, 0, '49.36.66.250', '2023-10-02 06:19:41', '2023-10-02 06:19:41', NULL),
(238, 39, 39, 1, '49.36.66.250', '2023-10-02 06:19:46', '2023-10-02 06:19:46', NULL),
(239, 39, 39, 1, '110.226.30.127', '2023-10-02 12:06:10', '2023-10-02 12:06:10', NULL),
(240, 39, 39, 1, '49.34.122.2', '2023-10-02 15:25:37', '2023-10-02 15:25:37', NULL),
(241, 39, 39, 1, '49.34.122.94', '2023-10-02 16:10:09', '2023-10-02 16:10:09', NULL),
(242, 39, 39, 1, '124.123.160.63', '2023-10-02 16:42:27', '2023-10-02 16:42:27', NULL),
(243, 39, 39, 1, '103.238.107.86', '2023-10-02 17:24:30', '2023-10-02 17:24:30', NULL),
(244, 39, 39, 1, '49.34.96.108', '2023-10-02 18:25:24', '2023-10-02 18:25:24', NULL),
(245, 39, 39, 1, '223.226.222.202', '2023-10-03 06:17:18', '2023-10-03 06:17:18', NULL),
(246, 39, 39, 1, '152.58.37.44', '2023-10-03 13:56:16', '2023-10-03 13:56:16', NULL),
(247, 39, 39, 1, '49.34.158.142', '2023-10-03 15:38:40', '2023-10-03 15:38:40', NULL),
(248, 39, 39, 1, '157.32.100.190', '2023-10-03 16:19:16', '2023-10-03 16:19:16', NULL),
(249, 39, 39, 1, '49.34.52.62', '2023-10-04 03:34:09', '2023-10-04 03:34:09', NULL),
(250, 39, 39, 1, '49.34.85.206', '2023-10-04 03:51:27', '2023-10-04 03:51:27', NULL),
(251, 39, 39, 1, '223.226.222.202', '2023-10-04 06:42:33', '2023-10-04 06:42:33', NULL),
(252, 39, 39, 1, '202.131.125.122', '2023-10-04 11:04:30', '2023-10-04 11:04:30', NULL),
(253, 39, 39, 1, '223.226.222.202', '2023-10-04 12:56:11', '2023-10-04 12:56:11', NULL),
(254, 39, 39, 1, '49.34.84.1', '2023-10-04 15:52:31', '2023-10-04 15:52:31', NULL),
(255, 39, 39, 1, '103.238.107.86', '2023-10-04 16:35:51', '2023-10-04 16:35:51', NULL),
(256, 39, 39, 1, '152.58.37.227', '2023-10-04 17:18:20', '2023-10-04 17:18:20', NULL),
(257, 39, 39, 1, '152.58.37.227', '2023-10-04 17:19:00', '2023-10-04 17:19:00', NULL),
(258, 39, 39, 1, '152.58.37.227', '2023-10-04 17:26:07', '2023-10-04 17:26:07', NULL),
(259, 39, 39, 1, '103.238.107.86', '2023-10-05 04:23:15', '2023-10-05 04:23:15', NULL),
(260, 39, 39, 1, '103.238.107.86', '2023-10-05 10:37:57', '2023-10-05 10:37:57', NULL),
(261, 39, 39, 1, '49.34.101.103', '2023-10-05 15:20:54', '2023-10-05 15:20:54', NULL),
(262, NULL, 74, 0, '49.34.89.30', '2023-10-05 16:51:34', '2023-10-05 16:51:34', NULL),
(263, NULL, 74, 1, '49.34.89.30', '2023-10-05 16:51:44', '2023-10-05 16:51:44', NULL),
(264, 39, 39, 1, '49.34.89.30', '2023-10-05 16:51:55', '2023-10-05 16:51:55', NULL),
(265, 39, 39, 1, '223.226.222.202', '2023-10-06 03:39:29', '2023-10-06 03:39:29', NULL),
(266, 39, 39, 1, '49.36.69.150', '2023-10-06 06:44:46', '2023-10-06 06:44:46', NULL),
(267, 39, 39, 1, '49.36.64.212', '2023-10-06 09:54:41', '2023-10-06 09:54:41', NULL),
(268, 39, 39, 1, '125.20.97.10', '2023-10-06 11:23:33', '2023-10-06 11:23:33', NULL),
(269, 39, 39, 1, '125.20.97.10', '2023-10-06 11:43:24', '2023-10-06 11:43:24', NULL),
(270, 39, 39, 1, '42.105.168.94', '2023-10-06 16:05:51', '2023-10-06 16:05:51', NULL),
(271, 39, 39, 1, '49.34.111.221', '2023-10-06 16:44:09', '2023-10-06 16:44:09', NULL),
(272, 39, 39, 1, '122.170.170.240', '2023-10-06 17:35:02', '2023-10-06 17:35:02', NULL),
(273, 39, 39, 1, '49.36.64.212', '2023-10-07 07:54:15', '2023-10-07 07:54:15', NULL),
(274, 39, 39, 1, '106.214.148.132', '2023-10-07 08:34:42', '2023-10-07 08:34:42', NULL),
(275, 39, 39, 1, '49.36.69.106', '2023-10-07 12:58:43', '2023-10-07 12:58:43', NULL),
(276, 39, 39, 1, '157.32.92.251', '2023-10-07 13:16:54', '2023-10-07 13:16:54', NULL),
(277, 39, 39, 1, '49.34.100.41', '2023-10-07 14:15:33', '2023-10-07 14:15:33', NULL),
(278, 39, 39, 1, '103.238.107.86', '2023-10-07 15:07:44', '2023-10-07 15:07:44', NULL),
(279, 39, 39, 1, '49.34.100.228', '2023-10-07 16:25:45', '2023-10-07 16:25:45', NULL),
(280, 39, 39, 1, '157.32.68.209', '2023-10-07 17:21:04', '2023-10-07 17:21:04', NULL),
(281, 39, 39, 1, '49.34.237.113', '2023-10-07 18:52:10', '2023-10-07 18:52:10', NULL),
(282, 39, 39, 1, '49.34.111.52', '2023-10-08 04:47:19', '2023-10-08 04:47:19', NULL),
(283, 39, 39, 1, '182.68.21.136', '2023-10-08 05:12:14', '2023-10-08 05:12:14', NULL),
(284, 39, 39, 1, '49.34.98.192', '2023-10-08 11:53:27', '2023-10-08 11:53:27', NULL),
(285, 39, 39, 1, '42.105.168.91', '2023-10-08 16:36:40', '2023-10-08 16:36:40', NULL),
(286, 39, 39, 1, '42.105.168.91', '2023-10-08 17:08:42', '2023-10-08 17:08:43', NULL),
(287, 39, 39, 1, '49.34.166.184', '2023-10-08 17:35:23', '2023-10-08 17:35:23', NULL),
(288, 39, 39, 1, '49.34.216.115', '2023-10-09 02:34:51', '2023-10-09 02:34:52', NULL),
(289, 39, 39, 1, '49.34.216.115', '2023-10-09 03:05:52', '2023-10-09 03:05:53', NULL),
(290, 39, 39, 1, '49.34.90.114', '2023-10-09 03:29:53', '2023-10-09 03:29:53', NULL),
(291, 39, 39, 1, '117.99.110.106', '2023-10-09 04:31:53', '2023-10-09 04:31:53', NULL),
(292, 39, 39, 1, '125.20.97.10', '2023-10-09 12:27:24', '2023-10-09 12:27:24', NULL),
(293, 39, 39, 1, '103.238.107.86', '2023-10-09 14:43:46', '2023-10-09 14:43:46', NULL),
(294, 39, 39, 1, '49.34.223.109', '2023-10-09 15:21:13', '2023-10-09 15:21:13', NULL),
(295, 39, 39, 1, '49.34.239.31', '2023-10-09 16:06:55', '2023-10-09 16:06:56', NULL),
(296, 39, 39, 1, '103.238.107.86', '2023-10-10 01:29:03', '2023-10-10 01:29:03', NULL),
(297, 39, 39, 1, '117.99.110.106', '2023-10-10 04:56:53', '2023-10-10 04:56:53', NULL),
(298, 39, 39, 1, '182.68.21.136', '2023-10-10 05:27:59', '2023-10-10 05:27:59', NULL),
(299, 39, 39, 1, '49.34.226.240', '2023-10-10 05:59:19', '2023-10-10 05:59:20', NULL),
(300, 39, 39, 1, '182.68.21.136', '2023-10-10 06:19:58', '2023-10-10 06:19:58', NULL),
(301, 39, 39, 1, '49.36.71.184', '2023-10-10 13:54:52', '2023-10-10 13:54:52', NULL),
(302, 39, 39, 1, '103.238.107.86', '2023-10-10 15:30:06', '2023-10-10 15:30:06', NULL),
(303, 39, 39, 1, '157.32.120.80', '2023-10-10 16:39:05', '2023-10-10 16:39:05', NULL),
(304, 39, 39, 1, '103.238.107.86', '2023-10-11 02:50:23', '2023-10-11 02:50:23', NULL),
(305, 39, 39, 1, '110.226.21.77', '2023-10-11 05:07:50', '2023-10-11 05:07:50', NULL),
(306, 39, 39, 1, '49.34.144.76', '2023-10-11 14:56:06', '2023-10-11 14:56:06', NULL),
(307, 39, 78, 0, '49.34.144.76', '2023-10-11 15:02:40', '2023-10-11 15:02:40', NULL),
(308, 39, 78, 1, '49.34.144.76', '2023-10-11 15:02:54', '2023-10-11 15:02:54', NULL),
(309, 39, 39, 1, '103.238.107.86', '2023-10-11 15:52:52', '2023-10-11 15:52:52', NULL),
(310, 39, 39, 1, '157.32.67.76', '2023-10-11 16:32:07', '2023-10-11 16:32:07', NULL),
(311, 39, 39, 1, '49.34.144.76', '2023-10-11 16:38:09', '2023-10-11 16:38:09', NULL),
(312, 39, 39, 1, '49.34.144.76', '2023-10-11 16:41:35', '2023-10-11 16:41:35', NULL),
(313, 39, 39, 1, '182.68.21.136', '2023-10-11 16:41:38', '2023-10-11 16:41:38', NULL),
(314, 39, 39, 1, '103.238.107.86', '2023-10-12 02:45:18', '2023-10-12 02:45:18', NULL),
(315, 39, 39, 1, '157.32.120.154', '2023-10-12 03:25:17', '2023-10-12 03:25:17', NULL),
(316, 39, 78, 1, '157.32.120.154', '2023-10-12 03:29:52', '2023-10-12 03:29:52', NULL),
(317, 39, 39, 1, '110.226.21.77', '2023-10-12 06:26:02', '2023-10-12 06:26:02', NULL),
(318, 39, 39, 1, '49.34.111.78', '2023-10-12 08:33:38', '2023-10-12 08:33:38', NULL),
(319, 39, 39, 1, '152.58.37.122', '2023-10-12 08:53:56', '2023-10-12 08:53:56', NULL),
(320, 39, 39, 1, '49.36.89.74', '2023-10-12 10:47:19', '2023-10-12 10:47:19', NULL),
(321, 39, 39, 1, '49.34.95.238', '2023-10-12 16:15:06', '2023-10-12 16:15:06', NULL),
(322, 39, 78, 1, '49.34.95.238', '2023-10-12 16:24:13', '2023-10-12 16:24:13', NULL),
(323, 39, 39, 1, '49.34.100.123', '2023-10-12 16:34:49', '2023-10-12 16:34:50', NULL),
(324, 39, 39, 1, '103.81.92.33', '2023-10-12 16:39:41', '2023-10-12 16:39:41', NULL),
(325, 39, 39, 1, '49.34.127.199', '2023-10-12 17:47:58', '2023-10-12 17:47:58', NULL),
(326, 39, 39, 1, '103.81.92.33', '2023-10-13 02:05:53', '2023-10-13 02:05:53', NULL),
(327, 39, 39, 1, '49.34.123.130', '2023-10-13 02:57:55', '2023-10-13 02:57:55', NULL),
(328, 39, 39, 1, '42.105.168.47', '2023-10-13 03:13:47', '2023-10-13 03:13:47', NULL),
(329, 39, 39, 1, '49.34.245.69', '2023-10-13 03:28:32', '2023-10-13 03:28:32', NULL),
(330, 39, 39, 1, '110.226.21.77', '2023-10-13 10:56:43', '2023-10-13 10:56:43', NULL),
(331, 39, 39, 1, '103.81.92.33', '2023-10-13 15:13:45', '2023-10-13 15:13:45', NULL),
(332, 39, 39, 1, '42.105.164.211', '2023-10-13 17:29:05', '2023-10-13 17:29:05', NULL),
(333, 39, 39, 1, '103.81.92.33', '2023-10-13 17:47:34', '2023-10-13 17:47:34', NULL),
(334, 39, 39, 1, '110.226.21.77', '2023-10-14 04:52:56', '2023-10-14 04:52:56', NULL),
(335, 39, 39, 1, '49.34.117.216', '2023-10-14 05:25:37', '2023-10-14 05:25:37', NULL),
(336, 39, 39, 1, '49.34.129.162', '2023-10-14 08:35:09', '2023-10-14 08:35:09', NULL),
(337, 39, 39, 1, '49.34.128.134', '2023-10-14 12:34:21', '2023-10-14 12:34:21', NULL),
(338, 39, 39, 1, '49.34.165.241', '2023-10-14 17:15:20', '2023-10-14 17:15:21', NULL),
(339, 39, 39, 1, '110.226.31.229', '2023-10-14 18:37:50', '2023-10-14 18:37:50', NULL),
(340, 39, 39, 1, '127.0.0.1', '2023-10-14 22:58:03', '2023-10-14 22:58:03', NULL),
(341, 39, 39, 1, '127.0.0.1', '2023-10-15 06:27:41', '2023-10-15 06:27:41', NULL),
(342, 39, 39, 1, '127.0.0.1', '2023-10-15 22:11:53', '2023-10-15 22:11:53', NULL),
(343, 39, 39, 1, '127.0.0.1', '2023-10-17 21:45:29', '2023-10-17 21:45:29', NULL),
(344, 39, 39, 1, '127.0.0.1', '2023-10-18 09:24:51', '2023-10-18 09:24:51', NULL),
(345, 39, 39, 1, '127.0.0.1', '2023-10-21 00:32:41', '2023-10-21 00:32:41', NULL),
(346, 39, 39, 1, '27.57.168.110', '2023-10-23 07:10:40', '2023-10-23 07:10:40', NULL),
(347, 39, 39, 1, '103.81.94.110', '2023-10-23 16:10:31', '2023-10-23 16:10:31', NULL),
(348, 39, 39, 1, '49.34.76.114', '2023-10-23 17:33:06', '2023-10-23 17:33:06', NULL),
(349, 39, 39, 1, '103.81.94.110', '2023-10-24 05:43:07', '2023-10-24 05:43:07', NULL),
(350, 39, 39, 1, '152.58.104.255', '2023-10-24 08:32:58', '2023-10-24 08:32:58', NULL),
(351, 39, 39, 1, '157.32.202.120', '2023-10-24 09:56:56', '2023-10-24 09:56:56', NULL),
(352, 39, 39, 1, '103.81.94.110', '2023-10-24 12:14:28', '2023-10-24 12:14:28', NULL),
(353, 39, 39, 1, '49.36.65.190', '2023-10-25 08:15:02', '2023-10-25 08:15:02', NULL),
(354, 39, 39, 1, '49.34.126.46', '2023-10-25 15:53:15', '2023-10-25 15:53:16', NULL),
(355, 39, 39, 1, '49.34.193.71', '2023-10-25 16:02:07', '2023-10-25 16:02:07', NULL),
(356, 39, 39, 1, '49.36.65.190', '2023-10-26 09:36:26', '2023-10-26 09:36:26', NULL),
(357, 39, 39, 1, '157.32.124.37', '2023-10-26 16:33:21', '2023-10-26 16:33:21', NULL),
(358, 39, 39, 1, '49.34.188.16', '2023-10-26 16:53:01', '2023-10-26 16:53:01', NULL),
(359, 39, 39, 1, '49.36.65.190', '2023-10-27 09:13:03', '2023-10-27 09:13:03', NULL),
(360, 39, 39, 1, '49.36.65.190', '2023-10-27 11:25:50', '2023-10-27 11:25:50', NULL),
(361, 39, 39, 1, '49.34.46.76', '2023-10-27 16:07:02', '2023-10-27 16:07:02', NULL),
(362, 39, 39, 1, '49.34.230.135', '2023-10-27 17:50:02', '2023-10-27 17:50:02', NULL),
(363, 39, 39, 1, '127.0.0.1', '2023-10-28 06:37:55', '2023-10-28 06:37:55', NULL),
(364, 39, 39, 1, '127.0.0.1', '2023-10-29 01:56:21', '2023-10-29 01:56:21', NULL),
(365, NULL, 6, 0, '49.34.68.234', '2023-10-31 16:22:30', '2023-10-31 16:22:30', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_09_11_104327_create_areas_table', 1),
(10, '2022_09_11_111625_create_state_table', 1),
(11, '2022_09_11_111649_create_builders_table', 1),
(23, '2022_09_15_050537_create_enquiries_table', 3),
(29, '2022_09_21_105018_create_activity_log_table', 5),
(30, '2022_09_22_123308_create_subplans_table', 5),
(33, '2022_10_17_135735_create_dropdown_settings_table', 6),
(43, '2022_10_19_100531_create_notificatios_table', 7),
(44, '2022_10_19_100253_create_coupons_table', 8),
(45, '2022_10_19_100531_create_notifications_table', 8),
(46, '2022_10_19_113049_create_rera_table', 9),
(47, '2022_09_11_104356_create_buildings_table', 10),
(58, '2022_10_23_041508_create_district_table', 12),
(59, '2022_10_23_041517_create_taluka_table', 12),
(60, '2022_10_23_041525_create_village_table', 12),
(63, '2022_09_14_102806_create_properties_table', 15),
(64, '2022_09_14_105724_add_furnished_status_to_properties_table', 15),
(65, '2022_11_11_043419_create_building_images_table', 16),
(66, '2022_10_22_103513_create_industrial_properties_table', 17),
(68, '2022_11_11_103144_create_land_images_table', 19),
(69, '2022_11_01_122649_create_enquiry_progress_table', 20),
(70, '2022_09_11_111609_create_city_table', 21),
(71, '2022_10_23_035313_create_land_properties_table', 22),
(72, '2022_11_17_141820_create_branches_table', 23),
(81, '2014_10_12_000000_create_users_table', 24),
(82, '2022_01_12_173356_create_permission_tables', 24),
(83, '2022_09_20_055808_add_user_id_to_roles_table', 24),
(84, '2022_11_22_040911_create_insta_properties_table', 25),
(86, '2022_12_04_093113_create_projects_table', 26),
(88, '2022_10_23_131301_create_project_units_table', 27);

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
(1, 'App\\Models\\User', 39),
(15, 'App\\Models\\User', 78);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(11) NOT NULL,
  `otp` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `otp`, `user_id`, `updated_at`, `created_at`) VALUES
(3, 116858, 74, '2023-10-05 03:33:56', '2023-10-05 03:33:56'),
(4, 777041, 79, '2023-10-07 17:27:24', '2023-10-07 17:27:24'),
(5, 653831, 80, '2023-10-07 17:30:09', '2023-10-07 17:30:09'),
(6, 650509, 81, '2023-10-07 17:31:59', '2023-10-07 17:31:59'),
(7, 605540, 82, '2023-10-07 17:36:06', '2023-10-07 17:36:06'),
(8, 783951, 83, '2023-10-07 17:39:10', '2023-10-07 17:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test1@example.com', 'aM5ptRd1siTnhKu', '2023-07-29 13:37:49', '2023-07-29 13:38:30', '2023-07-29 13:38:30');

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
(1, 'view-dashboard', 'web', NULL, NULL),
(2, 'area-list', 'web', NULL, NULL),
(3, 'area-create', 'web', NULL, NULL),
(4, 'area-edit', 'web', NULL, NULL),
(5, 'area-delete', 'web', NULL, NULL),
(6, 'property-list', 'web', NULL, NULL),
(7, 'property-create', 'web', NULL, NULL),
(8, 'property-edit', 'web', NULL, NULL),
(9, 'property-delete', 'web', NULL, NULL),
(10, 'search-property', 'web', NULL, NULL),
(11, 'import-property', 'web', NULL, NULL),
(12, 'export-property', 'web', NULL, NULL),
(13, 'building-list', 'web', NULL, NULL),
(14, 'building-create', 'web', NULL, NULL),
(15, 'building-edit', 'web', NULL, NULL),
(16, 'building-delete', 'web', NULL, NULL),
(17, 'enquiry-list', 'web', NULL, NULL),
(18, 'enquiry-create', 'web', NULL, NULL),
(19, 'enquiry-edit', 'web', NULL, NULL),
(20, 'enquiry-delete', 'web', NULL, NULL),
(21, 'delete-enquiry-progress', 'web', NULL, NULL),
(22, 'bulk-enquiry-transfer', 'web', NULL, NULL),
(23, 'project-list', 'web', NULL, NULL),
(24, 'project-create', 'web', NULL, NULL),
(25, 'project-edit', 'web', NULL, NULL),
(26, 'project-delete', 'web', NULL, NULL),
(27, 'unit-list', 'web', NULL, NULL),
(28, 'unit-create', 'web', NULL, NULL),
(29, 'unit-edit', 'web', NULL, NULL),
(30, 'unit-delete', 'web', NULL, NULL),
(31, 'user-list', 'web', NULL, NULL),
(32, 'user-create', 'web', NULL, NULL),
(33, 'user-edit', 'web', NULL, NULL),
(34, 'user-delete', 'web', NULL, NULL),
(35, 'land-property-list', 'web', NULL, NULL),
(36, 'land-property-create', 'web', NULL, NULL),
(37, 'land-property-edit', 'web', NULL, NULL),
(38, 'land-property-delete', 'web', NULL, NULL),
(39, 'export-land-proprerty', 'web', NULL, NULL),
(40, 'search-land-property', 'web', NULL, NULL),
(41, 'import-land-property', 'web', NULL, NULL),
(42, 'industrial-property-list', 'web', NULL, NULL),
(43, 'industrial-property-create', 'web', NULL, NULL),
(44, 'industrial-property-edit', 'web', NULL, NULL),
(45, 'industrial-property-delete', 'web', NULL, NULL),
(46, 'export-industrial-property', 'web', NULL, NULL),
(47, 'search-industrial-property', 'web', NULL, NULL),
(48, 'import-industrial-property', 'web', NULL, NULL),
(49, 'insta-property-list', 'web', NULL, NULL),
(50, 'insta-property-create', 'web', NULL, NULL),
(51, 'insta-property-edit', 'web', NULL, NULL),
(52, 'insta-property-delete', 'web', NULL, NULL),
(53, 'export-insta-property', 'web', NULL, NULL),
(54, 'import-insta-property', 'web', NULL, NULL),
(55, 'search-insta-property', 'web', NULL, NULL),
(56, 'mask-phone-no', 'web', NULL, NULL),
(57, 'report-employee-audit-log', 'web', NULL, NULL),
(58, 'report-employee-by-enquiry', 'web', NULL, NULL),
(59, 'report-enquiry-by-period', 'web', NULL, NULL),
(60, 'logged-in-report', 'web', NULL, NULL),
(61, 'report-enquiry-remarks', 'web', NULL, NULL),
(62, 'report-property-sold', 'web', NULL, NULL),
(63, 'report-property-viewer', 'web', NULL, NULL),
(64, 'shared-property', 'web', NULL, NULL),
(65, 'settings-city', 'web', NULL, NULL),
(66, 'settings-states', 'web', NULL, NULL),
(67, 'settings-builders', 'web', NULL, NULL),
(68, 'settings-branches', 'web', NULL, NULL),
(69, 'settings-property-configuration', 'web', NULL, NULL),
(70, 'settings-building-configuration', 'web', NULL, NULL),
(71, 'settings-enquiry-configuration', 'web', NULL, NULL),
(72, 'role-list', 'web', NULL, NULL),
(73, 'role-create', 'web', NULL, NULL),
(74, 'role-edit', 'web', NULL, NULL),
(75, 'role-delete', 'web', NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 29, 'auth_token', '57a8f18d2b5b226cd9c273b02aecf93187e621f73591e022baa000920716b261', '[\"*\"]', NULL, '2023-06-15 16:22:20', '2023-06-15 16:22:20'),
(2, 'App\\Models\\User', 29, 'auth_token', '42228e2badcef7af5ba8da736e6908f563a071c4cae7c527e5d72868f1c0edee', '[\"*\"]', '2023-06-16 15:33:04', '2023-06-16 15:32:48', '2023-06-16 15:33:04'),
(3, 'App\\Models\\User', 8, 'auth_token', 'b0b8b4c979d17fa8ad4051068bf44ea08ab0f640c5f41cd7e8a2ef89f75c1d88', '[\"*\"]', '2023-06-16 15:45:42', '2023-06-16 15:45:20', '2023-06-16 15:45:42'),
(4, 'App\\Models\\User', 35, 'auth_token', 'dc8af6528496fa3ee7d6ac6b5ca45a327e942e0ca9d950a7f022435820940ca1', '[\"*\"]', NULL, '2023-07-13 18:20:09', '2023-07-13 18:20:09'),
(5, 'App\\Models\\User', 36, 'auth_token', '153db2ba8a4c8f7fd1d223eeaeea5eeddefd11eb1eaed390227a41b1736522bf', '[\"*\"]', NULL, '2023-07-18 16:45:01', '2023-07-18 16:45:01'),
(6, 'App\\Models\\User', 8, 'auth_token', '94d5f8666e654641228687f58f3fddd594ebfb223b41fe4385240be876557751', '[\"*\"]', '2023-07-19 17:48:27', '2023-07-19 17:33:59', '2023-07-19 17:48:27'),
(7, 'App\\Models\\User', 37, 'auth_token', '42284288384137a681d63abac87f2dd1d759f9e22c54b5b5b2049284267101ea', '[\"*\"]', NULL, '2023-07-20 16:35:16', '2023-07-20 16:35:16'),
(8, 'App\\Models\\User', 8, 'auth_token', '9787a4e4ae510edf1fccc250bce1ce2ce7af1e81b95aa3be67bfcf712ba83c38', '[\"*\"]', NULL, '2023-07-20 16:36:30', '2023-07-20 16:36:30'),
(9, 'App\\Models\\User', 38, 'auth_token', '26e594c13c8c1518c69e02d5936db73b54fc97ed2cb2565ea6d293e1fb67f306', '[\"*\"]', NULL, '2023-07-20 16:39:03', '2023-07-20 16:39:03'),
(10, 'App\\Models\\User', 8, 'auth_token', 'e83bd9041a25963313c300bd4bf1c314146fd0c79cb2930039b1bd8f5f266063', '[\"*\"]', NULL, '2023-07-26 17:00:49', '2023-07-26 17:00:49'),
(11, 'App\\Models\\User', 8, 'auth_token', 'b0243ada2db2ceaae3b45db35cbaa01695912b839d4e314ad48c790e9d4f121e', '[\"*\"]', NULL, '2023-07-27 16:08:40', '2023-07-27 16:08:40'),
(12, 'App\\Models\\User', 48, 'auth_token', '790b896d34b46c15188108f26605ddee87f4ca18c097684907b28ba4606d3af9', '[\"*\"]', NULL, '2023-07-27 16:12:02', '2023-07-27 16:12:02'),
(13, 'App\\Models\\User', 49, 'auth_token', '4239d5bc7a45b3fa8090ee4df0efc4f19bc58c0c9285d80465c3f0a3f990c960', '[\"*\"]', NULL, '2023-07-27 16:17:37', '2023-07-27 16:17:37'),
(14, 'App\\Models\\User', 49, 'auth_token', '523d5aaeffc9f8f1555a12a0ff6a167e8380050048f1bc28f5062833273b2812', '[\"*\"]', NULL, '2023-07-27 16:39:59', '2023-07-27 16:39:59'),
(15, 'App\\Models\\User', 49, 'auth_token', 'fd8f519e149578e4557adac00fdce48df622708b4aff52ad58f3880350a20b78', '[\"*\"]', NULL, '2023-07-28 03:20:25', '2023-07-28 03:20:25'),
(16, 'App\\Models\\User', 49, 'auth_token', '41c62c7fe75a9c2b8ffd5fb93f79e6d60a6285199732061096b42b9ff6e70414', '[\"*\"]', NULL, '2023-07-29 13:38:48', '2023-07-29 13:38:48'),
(17, 'App\\Models\\User', 9, 'auth_token', 'fd69440baf0d724338969abf0697b65c127911130484d476debd07c22867e2ad', '[\"*\"]', NULL, '2023-07-31 07:33:43', '2023-07-31 07:33:43'),
(18, 'App\\Models\\User', 10, 'auth_token', 'acf468a26dbc9c629f96a6a6aa15819aeddacf6f540e75ae44332c95201bf95c', '[\"*\"]', NULL, '2023-07-31 07:58:46', '2023-07-31 07:58:46'),
(19, 'App\\Models\\User', 11, 'auth_token', '1486af25ebaa7641cc4d4db579d190d69fb779330a526780f77461f4f637a419', '[\"*\"]', NULL, '2023-07-31 07:59:32', '2023-07-31 07:59:32'),
(20, 'App\\Models\\User', 11, 'auth_token', '9a9a3838076b47ef50880964e28c3d806e7d9df6a4b78fde2b433440c8b071a0', '[\"*\"]', NULL, '2023-07-31 07:59:46', '2023-07-31 07:59:46'),
(21, 'App\\Models\\User', 12, 'auth_token', 'fee77d41e76fff4b896e64ec847f937dd1cead7803d118a84ffe8d020f1e395b', '[\"*\"]', NULL, '2023-07-31 08:38:27', '2023-07-31 08:38:27'),
(22, 'App\\Models\\User', 13, 'auth_token', 'babd3843c4702888f729d0063bc598bcad2b9edefa8a1f184957e5922fbbc16f', '[\"*\"]', NULL, '2023-07-31 08:40:25', '2023-07-31 08:40:25'),
(23, 'App\\Models\\User', 14, 'auth_token', '497901843dbd7135460780cd0ad344c421069dfa52626aaaa6d31f75e7aa4b26', '[\"*\"]', NULL, '2023-07-31 13:17:04', '2023-07-31 13:17:04'),
(24, 'App\\Models\\User', 14, 'auth_token', '1023c86dc47badf7648ed398fc203205b77f74ed8d4f30565d17ce645857c0f6', '[\"*\"]', NULL, '2023-07-31 13:17:33', '2023-07-31 13:17:33'),
(25, 'App\\Models\\User', 15, 'auth_token', 'd63722485765f6a2be9ee025e52829c4bd82edf79551a1332be4d42025be7fc9', '[\"*\"]', NULL, '2023-08-01 02:22:39', '2023-08-01 02:22:39'),
(26, 'App\\Models\\User', 16, 'auth_token', '83b5fad4fd93a8b45baba42e5bd18b77b6a6a0aa942adf33c5ca39747e418dba', '[\"*\"]', NULL, '2023-08-01 02:24:38', '2023-08-01 02:24:38'),
(27, 'App\\Models\\User', 16, 'auth_token', '77d902b6bcf3f78058b05aef78a9a59f9238a4aadfd199701a47edd75d8df3b3', '[\"*\"]', NULL, '2023-08-01 02:25:49', '2023-08-01 02:25:49'),
(28, 'App\\Models\\User', 16, 'auth_token', 'b5df80063466cbdf6d39747f6129d795e52656ed4a25b19e91581ec0fc0ae2f9', '[\"*\"]', '2023-08-20 07:43:50', '2023-08-01 03:25:47', '2023-08-20 07:43:50'),
(29, 'App\\Models\\User', 16, 'auth_token', '54d8b3b76e6eda693e1605ab54f0dd61d9f9433180b36982b9d51f861a1e0b98', '[\"*\"]', '2023-08-22 03:24:04', '2023-08-01 16:09:24', '2023-08-22 03:24:04'),
(30, 'App\\Models\\User', 16, 'auth_token', '2d9bafa4d38fa0cca94aea9ce2a8727c5785718dbcb8d0dc8cdae512ed7cf29d', '[\"*\"]', NULL, '2023-08-02 18:12:39', '2023-08-02 18:12:39'),
(31, 'App\\Models\\User', 16, 'auth_token', '664924e1a109b22f39978abe5b08a10c5c1b8f2874a6e0ae50d5b638557153a8', '[\"*\"]', NULL, '2023-08-04 02:41:46', '2023-08-04 02:41:46'),
(32, 'App\\Models\\User', 16, 'auth_token', 'ca8176278f6ecec6ddc0d6d9877a42aa74946930203565835bb14b3ed315c901', '[\"*\"]', '2023-08-09 15:45:57', '2023-08-04 02:43:12', '2023-08-09 15:45:57'),
(33, 'App\\Models\\User', 16, 'auth_token', '2f6ecef13588c1a329e97a77bc99992d214a3d3256e5c9dda3018a28bd8966cf', '[\"*\"]', NULL, '2023-08-07 18:42:52', '2023-08-07 18:42:52'),
(34, 'App\\Models\\User', 16, 'auth_token', '69451aaa94ae428b33090a20b83dbf40cab28cc6bf530838a48df463de49e841', '[\"*\"]', '2023-08-17 15:23:20', '2023-08-17 15:16:41', '2023-08-17 15:23:20'),
(35, 'App\\Models\\User', 44, 'auth_token', 'abb376f62f823d85eb35e4adb61ef5414d2e49875bc1c1b0e5ee429a67ab6f88', '[\"*\"]', NULL, '2023-08-17 15:17:52', '2023-08-17 15:17:52'),
(36, 'App\\Models\\User', 16, 'auth_token', '181075654c0b58a72eb2d77289bf6895bb6715bf2e32541e4c34aa6e6f238739', '[\"*\"]', NULL, '2023-08-17 17:28:27', '2023-08-17 17:28:27'),
(37, 'App\\Models\\User', 16, 'auth_token', '346175f17f63c31cc17b054b42cce4cc7101fbdbd504158450b14e88641359d5', '[\"*\"]', NULL, '2023-08-20 07:50:21', '2023-08-20 07:50:21'),
(38, 'App\\Models\\User', 16, 'auth_token', '20c7a8e52145e4ce56cca785870bc8a9d597418b6797066a0993aab74575c713', '[\"*\"]', NULL, '2023-08-20 07:51:12', '2023-08-20 07:51:12'),
(39, 'App\\Models\\User', 16, 'auth_token', '2a7d60af3a30798e1963ffcbeb3ce8ba71d4f07c3607ebf1915bd193cef3c1ad', '[\"*\"]', '2023-08-20 07:54:38', '2023-08-20 07:51:50', '2023-08-20 07:54:38'),
(40, 'App\\Models\\User', 16, 'auth_token', '1712ff75d803db7adf8d0094bf7150a4597fbab16f2fe310b662a4b9d781571b', '[\"*\"]', NULL, '2023-08-20 07:53:14', '2023-08-20 07:53:14'),
(41, 'App\\Models\\User', 39, 'auth_token', 'ead5efdeb500098ed6c53a7a1eabf3118c196166c959db9e48992a6a40f54abb', '[\"*\"]', '2023-09-20 16:44:22', '2023-09-17 13:17:40', '2023-09-20 16:44:22'),
(42, 'App\\Models\\User', 51, 'auth_token', 'fece0cd0f05773dddab8ac85c4b355da946ee0dd24d383e065e6823474d003dd', '[\"*\"]', NULL, '2023-09-20 16:39:25', '2023-09-20 16:39:25'),
(43, 'App\\Models\\User', 51, 'auth_token', '354154206f3b5df8781f04cd90f934bc5026c4f32b93b35d954ba822d1165f15', '[\"*\"]', '2023-09-20 16:40:11', '2023-09-20 16:39:49', '2023-09-20 16:40:11'),
(44, 'App\\Models\\User', 39, 'auth_token', '55cd1176de06ddd34d377bbd202cefe55f98786885065efaf6891990996d20de', '[\"*\"]', '2023-10-12 03:03:08', '2023-09-20 16:44:49', '2023-10-12 03:03:08'),
(45, 'App\\Models\\User', 39, 'auth_token', '65a0918ba293d3b6280c2435c13e51878aaecf664d39a73d7e32982705cd7f93', '[\"*\"]', '2023-09-20 16:53:12', '2023-09-20 16:46:56', '2023-09-20 16:53:12'),
(46, 'App\\Models\\User', 39, 'auth_token', 'cfb6920be883107cfd16ef8befb4f36b90f3192c282d6586f844cda125777070', '[\"*\"]', '2023-10-10 17:24:11', '2023-09-21 16:26:13', '2023-10-10 17:24:11'),
(47, 'App\\Models\\User', 52, 'auth_token', '6cacf6ab1f7d3ee130f849a6268cdea64a9bc16893ecb1a795cd8e372aadb19e', '[\"*\"]', NULL, '2023-09-21 17:21:53', '2023-09-21 17:21:53'),
(48, 'App\\Models\\User', 39, 'auth_token', 'aa26c9b6aa03d4e95706c87cdb29feb5f0f9d5a0cb2427924372fcdbd57d72e0', '[\"*\"]', '2023-09-25 17:47:54', '2023-09-21 17:29:16', '2023-09-25 17:47:54'),
(49, 'App\\Models\\User', 39, 'auth_token', 'f188fc996d50f95a25e087f398a498dea16328e5b82dbc980e2740ae34fe0782', '[\"*\"]', NULL, '2023-09-25 19:18:58', '2023-09-25 19:18:58'),
(50, 'App\\Models\\User', 39, 'auth_token', '7e0d92f8987722583f73edf23e3f477d91131e39716e3443aca2ef0cea9057e6', '[\"*\"]', '2023-09-26 19:53:47', '2023-09-26 18:37:30', '2023-09-26 19:53:47'),
(51, 'App\\Models\\User', 39, 'auth_token', '77ea73accd03f35acd6644d7048954eba7a014f052fcc179257979cd881c8768', '[\"*\"]', '2023-09-27 06:44:47', '2023-09-26 18:51:52', '2023-09-27 06:44:47'),
(52, 'App\\Models\\User', 63, 'auth_token', '4840782fafe93e9ea7a2109208fb09ba2713880d5eb0965a3d503ec0b0948b92', '[\"*\"]', NULL, '2023-09-28 18:41:13', '2023-09-28 18:41:13'),
(53, 'App\\Models\\User', 64, 'auth_token', 'ffe2b659b811ca2c172c4525ecd68fbc09048246481b560842c45a3f3c32f166', '[\"*\"]', NULL, '2023-09-29 16:35:09', '2023-09-29 16:35:09'),
(54, 'App\\Models\\User', 39, 'auth_token', 'ea8a7445e6420f482ec385f337639020fdbce9d181dee71eab6548f6eb52d1ef', '[\"*\"]', '2023-10-25 17:57:00', '2023-10-02 16:22:46', '2023-10-25 17:57:00'),
(55, 'App\\Models\\User', 84, 'auth_token', '94a06677b56f4ba4794e44d8cfdb3406c46b688bc4887680abef6567c0c471cd', '[\"*\"]', NULL, '2023-10-09 11:02:52', '2023-10-09 11:02:52'),
(56, 'App\\Models\\User', 85, 'auth_token', '3bd5cc4e5f9574a83a47f572991e4c22316d1dbd189720fbe834e63a8af1ed5f', '[\"*\"]', NULL, '2023-10-09 11:03:07', '2023-10-09 11:03:07'),
(57, 'App\\Models\\User', 39, 'auth_token', '33c0a78a6ad7a394afa064e994e227fe43a49d55fc4fea6ed3b93c7f5c7c4e0f', '[\"*\"]', NULL, '2023-10-09 11:04:04', '2023-10-09 11:04:04'),
(58, 'App\\Models\\User', 86, 'auth_token', 'c38896488a39df9f8c36f2a90cac5e13e6e0e1b2b61329ba8ca26689631b8a96', '[\"*\"]', NULL, '2023-10-09 11:26:43', '2023-10-09 11:26:43'),
(59, 'App\\Models\\User', 87, 'auth_token', '6b20bf6a988ffdbc6bcb736359a9c8af23f9cd1176b7c391da494ee4f021062c', '[\"*\"]', NULL, '2023-10-09 17:02:42', '2023-10-09 17:02:42'),
(60, 'App\\Models\\User', 89, 'auth_token', 'bce8d2728b82a05e30a9eac9d22adf8ce8d4709c796cb8ae131b85e26ab04db8', '[\"*\"]', NULL, '2023-10-11 19:05:37', '2023-10-11 19:05:37'),
(61, 'App\\Models\\User', 90, 'auth_token', '4f15daddd06b189758cf4600644a1ae524184aeefb9c8eaa498675be5b28d3d2', '[\"*\"]', NULL, '2023-10-12 03:23:45', '2023-10-12 03:23:45'),
(62, 'App\\Models\\User', 91, 'auth_token', 'b194201f1e6723ee8739deee40f3100f2a149766c7e985fe38730b4af3442e86', '[\"*\"]', NULL, '2023-10-12 16:58:17', '2023-10-12 16:58:17'),
(63, 'App\\Models\\User', 92, 'auth_token', '8730b8c077e0a2800c449657b8d392bc1fc84f2153813cb2c7ba58ec2bdce28b', '[\"*\"]', NULL, '2023-10-12 16:58:42', '2023-10-12 16:58:42'),
(64, 'App\\Models\\User', 93, 'auth_token', '86631a50a6a7f1b44aaa203549f5983fdf91184234f3a83d80855c9dd1d9708d', '[\"*\"]', NULL, '2023-10-13 01:45:22', '2023-10-13 01:45:22'),
(65, 'App\\Models\\User', 97, 'auth_token', '5bbabf204f4200a323af4c8b61d3703e8b1ddf1711c6d7950046a62a577f3f7c', '[\"*\"]', NULL, '2023-10-26 16:41:16', '2023-10-26 16:41:16'),
(66, 'App\\Models\\User', 97, 'auth_token', 'ac80d6358f1dcbea6ea2efec585f3bef7fb20bb78e0f2e5c65dab7224f0e185d', '[\"*\"]', NULL, '2023-10-26 16:45:01', '2023-10-26 16:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `builder_id` int(11) DEFAULT NULL,
  `website` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `project_name` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `pincode` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_link` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_area` int(11) DEFAULT NULL,
  `land_size_unit` text DEFAULT NULL,
  `rera_number` varchar(100) DEFAULT NULL,
  `project_status` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_status_question` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restrictions` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_category` int(11) DEFAULT NULL,
  `sub_categories` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_single` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tower_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `wing_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `unit_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Tower` text DEFAULT NULL,
  `Unit` text DEFAULT NULL,
  `land_plot_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `storage_industrial_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `storage_industrial_facilities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `extra_facilities` longtext DEFAULT NULL,
  `parking_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `amenities` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catlog_file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_indirectly_store` tinyint(1) DEFAULT 0,
  `remark` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `builder_id`, `website`, `contact_details`, `project_name`, `address`, `area_id`, `state_id`, `city_id`, `pincode`, `location_link`, `land_area`, `land_size_unit`, `rera_number`, `project_status`, `project_status_question`, `restrictions`, `property_type`, `property_category`, `sub_categories`, `sub_category_single`, `tower_details`, `wing_details`, `unit_details`, `Tower`, `Unit`, `land_plot_details`, `storage_industrial_details`, `storage_industrial_facilities`, `extra_facilities`, `parking_details`, `amenities`, `catlog_file`, `document_category`, `document_image`, `added_by`, `is_indirectly_store`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 39, NULL, NULL, NULL, 'Revona', NULL, 26, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-05 05:56:53', '2023-09-05 05:56:53', NULL),
(2, 39, NULL, NULL, NULL, 'rivera luxuria', NULL, 22, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-05 06:03:23', '2023-09-05 06:03:23', NULL),
(3, 39, NULL, NULL, NULL, 'maple county', NULL, 33, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-05 06:22:32', '2023-09-05 06:22:32', NULL),
(4, 39, NULL, NULL, NULL, 'Villa', 'weqw', 29, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-05 06:37:37', '2023-09-05 06:37:37', NULL),
(5, 39, 3, 'asdasd@gmail.com', '[{\"name\":\"Nux\",\"mobile\":\"45646546\",\"email\":\"sgksdfdj@gmail.com\",\"designation\":\"Developer\"},{\"name\":\"asdasd\",\"mobile\":\"6456465465\",\"email\":\"dfasjk@gmail.com\",\"designation\":\"Developer\"}]', 'New Project', 'Atlas SoftWeb, 413, Palladium Business Hub, Visat – Gandhinagar Highway Opp 4D square Mall, Chandkheda, Sabarmati, Ahmedabad, Gujarat 380005', 29, 7, 1, '56464565', 'asdamndbamnbd', 120, '118', '546', '142', '0 To 1 Years', '[\"130\",\"132\"]', '85', 260, '[\"3\"]', NULL, '{\"if_flat_or_penthouse\":\"{\\\"number_of_towers\\\":\\\"\\\",\\\"number_of_floors\\\":\\\"\\\",\\\"total_units\\\":\\\"\\\",\\\"number_of_elevator\\\":\\\"\\\",\\\"service_elevator\\\":\\\"\\\"}\",\"if_office_or_retail\":\"{\\\"number_of_tower\\\":\\\"10\\\",\\\"number_of_floor\\\":\\\"2\\\",\\\"number_of_unit\\\":\\\"1\\\",\\\"number_of_unit_each_block\\\":\\\"20\\\",\\\"number_of_lift\\\":\\\"1\\\",\\\"service_lift\\\":false,\\\"front_road_width\\\":\\\"2\\\",\\\"front_road_width_map_unit\\\":\\\"122\\\",\\\"washroom\\\":\\\"private\\\",\\\"is_two_corner\\\":true}\",\"if_office_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"total_floor\\\":\\\"\\\",\\\"total_unit\\\":\\\"\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"\\\",\\\"saleable_to\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false}]\",\"if_retail_tower_details\":\"[{\\\"tower_name\\\":\\\"Sachin\\\",\\\"sub_category\\\":\\\"First\\\",\\\"size_from\\\":\\\"10\\\",\\\"size_to\\\":\\\"20\\\",\\\"front_opening\\\":\\\"10\\\",\\\"number_of_each_floor\\\":\\\"10\\\",\\\"ceiling_height\\\":\\\"120\\\",\\\"size_from_map_unit\\\":\\\"119\\\",\\\"size_to_map_unit\\\":\\\"\\\",\\\"tower_ceiling_map_unit\\\":\\\"121\\\",\\\"tower_front_opening_map_unit\\\":\\\"122\\\"}]\",\"if_office_tower_details_with_specification\":\"false\"}', '[{\"wing_name\":\"\",\"total_floors\":\"\",\"total_total_units\":\"\",\"sub_categories\":[]}]', '[{\"wing\":\"\",\"saleable\":\"\",\"saleable_to\":\"\",\"built_up\":\"\",\"built_up_to\":\"\",\"carpet_area\":\"\",\"carpet_area_to\":\"\",\"balcony\":\"\",\"balcony_to\":\"\",\"wash_area\":\"\",\"wash_area_to\":\"\",\"terrace_carpet_area\":\"\",\"terrace_carpet_area_to\":\"\",\"terrace_saleable_area_to\":\"\",\"floor_height\":\"\",\"servant_room\":false,\"service_lift\":false,\"has_terrace_and_carpet\":false,\"has_built_up\":false,\"has_carpet\":false,\"saleable_map_unit\":\"117\",\"built_up_map_unit\":\"117\",\"carpet_area_map_unit\":\"117\",\"balcony_area_map_unit\":\"117\",\"wash_area_map_unit\":\"117\",\"terrace_carpet_area_map_unit\":\"117\",\"terrace_saleable_area_map_unit\":\"117\",\"floor_height_map_unit\":\"121\"}]', '[[Sachin,10,20,10,10],]', '', '{\"total_land_area\":\"\",\"total_land_area_to\":\"\",\"total_open_area\":\"\",\"total_open_area_to\":\"\",\"total_number_of_plot\":\"\",\"common_area\":\"\",\"common_area_to\":\"\",\"multiple_theme_phase\":false,\"land_area_map_unit\":\"\",\"open_area_map_unit\":\"\",\"common_area_map_unit\":\"\",\"phase_name\":\"\",\"plot_size_from\":\"\",\"plot_size_to\":\"\",\"plot_size_from_map_unit\":\"\",\"plot_size_to_map_unit\":\"\",\"add_carpet_plot_size\":false,\"add_constructed_carpet_area\":false,\"add_constructed_built_up_area\":false,\"carpet_plot_size\":\"\",\"carpet_plot_size_to\":\"\",\"carpet_plot_size_map_unit\":\"\",\"plot_with_construcation\":false,\"constructed_saleable_area\":\"\",\"constructed_saleable_area_to\":\"\",\"constructed_saleable_area_map_unit\":\"\",\"constructed_carpet_area\":\"\",\"constructed_carpet_area_to\":\"\",\"constructed_carpet_area_map_unit\":\"\",\"constructed_built_up_area_from\":\"\",\"constructed_built_up_area_to\":\"\",\"constructed_built_up_from_map_unit\":\"\",\"constructed_built_up_to_map_unit\":\"\",\"number_of_room\":\"\",\"number_of_bathroom\":\"\",\"number_of_balcony\":\"\",\"number_of_open_side\":\"\",\"servant_room\":false,\"number_of_parking\":\"\"}', '[{\"plot_area_from\":\"\",\"plot_area_to\":\"\",\"construced_area_from\":\"\",\"construced_area_to\":\"\",\"road_width_of_front_side_area_from\":\"\",\"road_width_of_front_side_area_to\":\"\",\"ceiling_height\":\"\",\"carpet_from_to_unit_map\":\"117\",\"constructed_from_to_unit_map\":\"117\",\"road_width_of_front_side_area_from_to_unit_map\":\"117\",\"ceiling_height_unit_map\":\"121\"}]', '{\"gas\":false,\"gas_detail\":\"\",\"power\":false,\"power_detail\":\"\",\"water\":false,\"water_detail\":\"\",\"other\":false,\"other_detail\":\"\"}', '[]', '{\"free_alloted_for_two_wheeler\":\"true\",\"free_alloted_for_four_wheeler\":\"true\",\"available_for_purchase\":\"true\",\"total_number_of_parking\":\"10\",\"total_floor_for_parking\":\"2\",\"parking_details\":\"[{\\\"floor_number\\\":0,\\\"ev_charging_point\\\":\\\"10\\\",\\\"hydraulic_parking\\\":\\\"20\\\",\\\"height_of_basement\\\":\\\"200\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"},{\\\"floor_number\\\":1,\\\"ev_charging_point\\\":\\\"20\\\",\\\"hydraulic_parking\\\":\\\"30\\\",\\\"height_of_basement\\\":\\\"300\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"}]\"}', '[\"service_lift\",\"streature_lift\"]', 'file_16944480712.png', '2', 'file_16944480711.png', NULL, 0, '', '2023-09-08 17:30:38', '2023-09-17 14:58:45', NULL),
(6, 39, NULL, NULL, NULL, 'cold store', 'sdasd', 29, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-08 17:37:31', '2023-09-08 17:37:31', NULL),
(7, 39, NULL, NULL, NULL, 'landplo', 'sadasd', 29, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-10 07:49:23', '2023-09-10 07:49:23', NULL),
(8, 39, NULL, NULL, NULL, 'test', 'asdad', 29, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-10 07:52:42', '2023-09-10 07:52:42', NULL),
(9, 39, NULL, NULL, NULL, 'JB skyline', NULL, 8, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-10 12:25:42', '2023-09-10 12:25:42', NULL),
(10, 39, NULL, NULL, NULL, 'Krishna Bunglows', 'borivali west, nr railway station,', 26, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-10 12:38:04', '2023-09-10 12:38:04', NULL),
(11, 39, NULL, NULL, NULL, 'opulance', NULL, 4, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 05:12:29', '2023-09-12 05:12:29', NULL),
(12, 39, NULL, NULL, NULL, 'sunrise terrace', NULL, 6, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 05:23:20', '2023-09-12 05:23:20', NULL),
(13, 39, NULL, NULL, NULL, 'iris house', NULL, 22, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 05:46:53', '2023-09-12 05:46:53', NULL),
(14, 39, NULL, NULL, NULL, 'glorious gardens', NULL, 8, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 05:59:52', '2023-09-12 05:59:52', NULL),
(15, 39, 3, 'Firstproject', '[{\"name\":\"A\",\"mobile\":\"798789798\",\"email\":\"asdasjd@gmail.com\",\"designation\":\"465\"}]', 'First Project', 'FSDJHD', 8, 7, 1, '382463', 'FSajsfjk', 100, '117', '123456', '142', '0 To 1 Years', '[\"130\"]', '87', 255, '[\"21\"]', NULL, '{\"if_flat_or_penthouse\":\"{\\\"number_of_towers\\\":\\\"\\\",\\\"number_of_floors\\\":\\\"\\\",\\\"total_units\\\":\\\"\\\",\\\"number_of_elevator\\\":\\\"\\\",\\\"service_elevator\\\":\\\"\\\"}\",\"if_office_or_retail\":\"{\\\"number_of_tower\\\":\\\"\\\",\\\"number_of_floor\\\":\\\"\\\",\\\"number_of_unit\\\":\\\"\\\",\\\"number_of_unit_each_block\\\":\\\"\\\",\\\"number_of_lift\\\":\\\"\\\",\\\"service_lift\\\":false,\\\"front_road_width\\\":\\\"\\\",\\\"front_road_width_map_unit\\\":\\\"\\\",\\\"washroom\\\":\\\"private\\\",\\\"is_two_corner\\\":false}\",\"if_office_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"total_floor\\\":\\\"\\\",\\\"total_unit\\\":\\\"\\\",\\\"carpet\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"\\\",\\\"saleable_to\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false}]\",\"if_retail_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"sub_category\\\":\\\"\\\",\\\"size_from\\\":\\\"\\\",\\\"size_to\\\":\\\"\\\",\\\"front_opening\\\":\\\"\\\",\\\"number_of_each_floor\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"size_from_map_unit\\\":\\\"\\\",\\\"size_to_map_unit\\\":\\\"\\\",\\\"tower_ceiling_map_unit\\\":\\\"\\\",\\\"tower_front_opening_map_unit\\\":\\\"\\\"}]\",\"if_office_tower_details_with_specification\":\"false\"}', '[{\"wing_name\":\"NJS\",\"total_floors\":\"1\",\"total_total_units\":\"10\",\"sub_categories\":[]}]', '[{\"wing\":\"NJS\",\"saleable\":\"10\",\"saleable_to\":\"20\",\"built_up\":\"\",\"built_up_to\":\"\",\"carpet_area\":\"\",\"carpet_area_to\":\"\",\"balcony\":\"40\",\"balcony_to\":\"50\",\"wash_area\":\"20\",\"wash_area_to\":\"30\",\"terrace_carpet_area\":\"10\",\"terrace_carpet_area_to\":\"\",\"terrace_saleable_area_to\":\"\",\"floor_height\":\"10\",\"servant_room\":false,\"service_lift\":false,\"has_terrace_and_carpet\":true,\"has_built_up\":false,\"has_carpet\":false,\"saleable_map_unit\":\"117\",\"built_up_map_unit\":\"117\",\"carpet_area_map_unit\":\"117\",\"balcony_area_map_unit\":\"117\",\"wash_area_map_unit\":\"117\",\"terrace_carpet_area_map_unit\":\"117\",\"terrace_saleable_area_map_unit\":\"117\",\"floor_height_map_unit\":\"121\",\"ceiling_height\":\"78\",\"terrace_saleable_area\":\"20\",\"ceiling_height_map_unit\":\"121\"}]', '', '[', '{\"total_land_area\":\"\",\"total_land_area_to\":\"\",\"total_open_area\":\"\",\"total_open_area_to\":\"\",\"total_number_of_plot\":\"\",\"common_area\":\"\",\"common_area_to\":\"\",\"multiple_theme_phase\":false,\"land_area_map_unit\":\"\",\"open_area_map_unit\":\"\",\"common_area_map_unit\":\"\",\"phase_name\":\"\",\"plot_size_from\":\"\",\"plot_size_to\":\"\",\"add_carpet_plot_size\":false,\"add_constructed_carpet_area\":false,\"add_constructed_built_up_area\":false,\"carpet_plot_size\":\"\",\"carpet_plot_size_to\":\"\",\"carpet_plot_size_map_unit\":\"\",\"plot_with_construcation\":false,\"constructed_saleable_area\":\"\",\"constructed_saleable_area_to\":\"\",\"constructed_saleable_area_map_unit\":\"\",\"constructed_carpet_area\":\"\",\"constructed_carpet_area_to\":\"\",\"constructed_carpet_area_map_unit\":\"\",\"constructed_built_up_area_from\":\"\",\"constructed_built_up_area_to\":\"\",\"number_of_room\":\"\",\"number_of_bathroom\":\"\",\"number_of_balcony\":\"\",\"number_of_open_side\":\"\",\"servant_room\":false,\"number_of_parking\":\"\",\"plot_size_from_map_unit\":\"\",\"plot_size_to_map_unit\":\"\",\"constructed_built_up_from_map_unit\":\"\",\"constructed_built_up_to_map_unit\":\"\"}', '[{\"plot_area_from\":\"\",\"plot_area_to\":\"\",\"construced_area_from\":\"\",\"construced_area_to\":\"\",\"road_width_of_front_side_area_from\":\"\",\"road_width_of_front_side_area_to\":\"\",\"ceiling_height\":\"\",\"carpet_from_to_unit_map\":\"117\",\"constructed_from_to_unit_map\":\"117\",\"road_width_of_front_side_area_from_to_unit_map\":\"117\",\"ceiling_height_unit_map\":\"121\"}]', '{\"pcb\":false,\"pcb_detail\":\"\",\"ec\":false,\"ec_detail\":\"\",\"gas\":false,\"gas_detail\":\"\",\"power\":false,\"power_detail\":\"\",\"water\":false,\"water_detail\":\"\"}', '[]', '{\"free_alloted_for_two_wheeler\":\"true\",\"free_alloted_for_four_wheeler\":\"true\",\"available_for_purchase\":\"true\",\"total_number_of_parking\":\"2\",\"total_floor_for_parking\":\"1\",\"parking_details\":\"[{\\\"floor_number\\\":0,\\\"ev_charging_point\\\":\\\"12\\\",\\\"hydraulic_parking\\\":\\\"23\\\",\\\"height_of_basement\\\":\\\"45\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"}]\"}', '[\"swimming_pool\",\"club_house\",\"streature_lift\",\"passenger_lift\"]', 'file_16972613844.txt', '2', 'file_16972613842.jpg', NULL, 0, '', '2023-09-12 06:11:07', '2023-10-14 05:29:44', NULL),
(16, 39, NULL, NULL, NULL, 'the regal plaza', NULL, 33, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 06:20:23', '2023-09-12 06:20:23', NULL),
(17, 39, NULL, NULL, NULL, 'cloud nine', NULL, 25, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 06:23:48', '2023-09-12 06:23:48', NULL),
(18, 39, NULL, NULL, NULL, 'palace park', 'wedf', NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 06:32:21', '2023-09-12 06:32:21', NULL),
(19, 39, NULL, NULL, NULL, 'sahjanand villa', 'iuytreasdfghjkl;', 27, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 06:42:59', '2023-09-12 06:42:59', NULL),
(20, 39, NULL, NULL, NULL, 'shades of nature', 'asdfvgbhnjmk,mjnhbgf', 27, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 06:48:01', '2023-09-12 06:48:01', NULL),
(21, 39, NULL, NULL, NULL, 'empire square', NULL, 24, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 06:53:32', '2023-09-12 06:53:32', NULL),
(22, 39, NULL, NULL, NULL, 'kalhaar greens', NULL, 8, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 06:57:03', '2023-09-12 06:57:03', NULL),
(23, 39, NULL, NULL, NULL, 'flower velly', 'kjhgfdxfghjk,', 33, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 07:06:53', '2023-09-12 07:06:53', NULL),
(24, 39, NULL, NULL, NULL, 'mountain view', 'kfdsawsertfgyhujikl', 26, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 07:35:09', '2023-09-12 07:35:09', NULL),
(25, 39, NULL, NULL, NULL, 'rameshwar crystal', 'sdfgbhnjhgfdsa', 28, 7, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 07:39:49', '2023-09-12 07:39:49', NULL),
(26, 39, NULL, NULL, NULL, 'the osias', 'lkjhgfdsertyhujikl', 34, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 07:43:24', '2023-09-12 07:43:24', NULL),
(27, 39, NULL, NULL, NULL, 'sunshine acres', NULL, 6, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 07:47:44', '2023-09-12 07:47:44', NULL),
(28, 39, NULL, NULL, NULL, 'horizon house', NULL, 12, 7, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 07:56:10', '2023-09-12 07:56:10', NULL),
(29, 39, NULL, NULL, NULL, 'sudarshan tower', 'lkjhgfdsrtyuk', 27, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 08:00:11', '2023-09-12 08:00:11', NULL),
(30, 39, NULL, NULL, NULL, 'nirant villa', 'asdfghjgfdsa', 8, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 08:02:55', '2023-09-12 08:02:55', NULL),
(31, 39, NULL, NULL, NULL, 'shranya skyline', 'kjhvggujsixhgayguiop', 27, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 08:06:19', '2023-09-12 08:06:19', NULL),
(32, 39, NULL, NULL, NULL, 'sunset farms', NULL, 33, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 08:10:18', '2023-09-12 08:10:18', NULL),
(33, 39, NULL, NULL, NULL, 'plaza tower', NULL, 13, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 11:32:52', '2023-09-12 11:32:52', NULL),
(34, 39, NULL, NULL, NULL, 'dev auram', NULL, 8, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 11:36:38', '2023-09-12 11:36:38', NULL),
(35, 39, NULL, NULL, NULL, 'interstellar', NULL, 34, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-12 11:39:27', '2023-09-12 11:39:27', NULL),
(36, 39, NULL, NULL, NULL, 'k s villa', 'ambli char rasta', 8, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-19 07:51:57', '2023-09-19 07:51:57', NULL),
(37, 39, NULL, NULL, NULL, 'suncity', 'bopal chokadi', 6, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-19 12:59:23', '2023-09-19 12:59:23', NULL),
(38, 39, 8, 'asdhasjkd', '[{\"name\":\"Raj\",\"mobile\":\"44564654456\",\"email\":\"fgjdfsfh@gmail.com\",\"designation\":\"DSD\"},{\"name\":\"Keveal\",\"mobile\":\"54654654654\",\"email\":\"sdfhfh@gmail.com\",\"designation\":\"HGJ\"}]', 'birla logistik park', 'dadar west,', 25, 8, 4, '5464654', 'fdsfkskjf', 200, NULL, '30', '143', '465454', '[\"132\"]', '89', NULL, '[\"17\",\"37\"]', NULL, '{\"if_flat_or_penthouse\":\"{\\\"number_of_towers\\\":\\\"10\\\",\\\"number_of_floors\\\":\\\"20\\\",\\\"total_units\\\":\\\"10\\\",\\\"number_of_elevator\\\":\\\"150\\\",\\\"service_elevator\\\":\\\"\\\"}\",\"if_office_or_retail\":\"{\\\"number_of_tower\\\":\\\"\\\",\\\"number_of_floor\\\":\\\"\\\",\\\"number_of_unit\\\":\\\"\\\",\\\"number_of_unit_each_block\\\":\\\"\\\",\\\"number_of_lift\\\":\\\"\\\",\\\"service_lift\\\":false,\\\"front_road_width\\\":\\\"\\\",\\\"front_road_width_map_unit\\\":\\\"121\\\",\\\"washroom\\\":\\\"private\\\",\\\"is_two_corner\\\":false}\",\"if_office_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"total_floor\\\":\\\"\\\",\\\"total_unit\\\":\\\"\\\",\\\"carpet\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"\\\",\\\"saleable_to\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false,\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"117\\\"}]\",\"if_retail_tower_details\":\"[{\\\"tower_name\\\":\\\"10\\\",\\\"sub_category\\\":\\\"First\\\",\\\"size_from\\\":\\\"20\\\",\\\"size_to\\\":\\\"30\\\",\\\"front_opening\\\":\\\"23\\\",\\\"number_of_each_floor\\\":\\\"1\\\",\\\"ceiling_height\\\":\\\"20\\\",\\\"size_from_map_unit\\\":\\\"119\\\",\\\"size_to_map_unit\\\":\\\"\\\",\\\"tower_ceiling_map_unit\\\":\\\"121\\\",\\\"tower_front_opening_map_unit\\\":\\\"121\\\"}]\",\"if_office_tower_details_with_specification\":\"false\"}', '[{\"wing_name\":\"NJH\",\"total_floors\":\"2\",\"total_total_units\":\"10\",\"sub_categories\":[\"4 bhk\"]}]', '[{\"wing\":\"NJH\",\"saleable\":\"10\",\"saleable_to\":\"20\",\"built_up\":\"\",\"built_up_to\":\"\",\"carpet_area\":\"\",\"carpet_area_to\":\"\",\"balcony\":\"12\",\"balcony_to\":\"23\",\"wash_area\":\"45\",\"wash_area_to\":\"56\",\"terrace_carpet_area\":\"10\",\"terrace_carpet_area_to\":\"\",\"terrace_saleable_area_to\":\"\",\"floor_height\":\"10\",\"servant_room\":false,\"service_lift\":false,\"has_terrace_and_carpet\":true,\"has_built_up\":false,\"has_carpet\":false,\"saleable_map_unit\":\"118\",\"built_up_map_unit\":\"117\",\"carpet_area_map_unit\":\"117\",\"balcony_area_map_unit\":\"117\",\"wash_area_map_unit\":\"117\",\"terrace_carpet_area_map_unit\":\"117\",\"terrace_saleable_area_map_unit\":\"117\",\"floor_height_map_unit\":\"121\",\"terrace_saleable_area\":\"20\",\"ceiling_height_map_unit\":\"121\"}]', NULL, NULL, '{\"total_land_area\":\"\",\"total_land_area_to\":\"\",\"total_open_area\":\"\",\"total_open_area_to\":\"\",\"total_number_of_plot\":\"\",\"common_area\":\"\",\"common_area_to\":\"\",\"multiple_theme_phase\":false,\"land_area_map_unit\":\"\",\"open_area_map_unit\":\"\",\"common_area_map_unit\":\"\",\"phase_name\":\"\",\"plot_size_from\":\"\",\"plot_size_to\":\"\",\"add_carpet_plot_size\":false,\"add_constructed_carpet_area\":false,\"add_constructed_built_up_area\":false,\"carpet_plot_size\":\"\",\"carpet_plot_size_to\":\"\",\"carpet_plot_size_map_unit\":\"\",\"plot_with_construcation\":false,\"constructed_saleable_area\":\"\",\"constructed_saleable_area_to\":\"\",\"constructed_saleable_area_map_unit\":\"\",\"constructed_carpet_area\":\"\",\"constructed_carpet_area_to\":\"\",\"constructed_carpet_area_map_unit\":\"\",\"constructed_built_up_area_from\":\"\",\"constructed_built_up_area_to\":\"\",\"number_of_room\":\"\",\"number_of_bathroom\":\"\",\"number_of_balcony\":\"\",\"number_of_open_side\":\"\",\"servant_room\":false,\"number_of_parking\":\"\",\"plot_size_from_map_unit\":\"\",\"plot_size_to_map_unit\":\"\",\"constructed_built_up_from_map_unit\":\"\",\"constructed_built_up_to_map_unit\":\"\"}', '[{\"plot_area_from\":\"\",\"plot_area_to\":\"\",\"construced_area_from\":\"\",\"construced_area_to\":\"\",\"road_width_of_front_side_area_from\":\"\",\"road_width_of_front_side_area_to\":\"\",\"ceiling_height\":\"\",\"carpet_from_to_unit_map\":\"117\",\"constructed_from_to_unit_map\":\"117\",\"road_width_of_front_side_area_from_to_unit_map\":\"117\",\"ceiling_height_unit_map\":\"121\"}]', '{\"pcb\":false,\"pcb_detail\":\"\",\"ec\":false,\"ec_detail\":\"\",\"gas\":false,\"gas_detail\":\"\",\"power\":false,\"power_detail\":\"\",\"water\":false,\"water_detail\":\"\"}', '[]', '{\"free_alloted_for_two_wheeler\":\"true\",\"free_alloted_for_four_wheeler\":\"true\",\"available_for_purchase\":\"true\",\"total_number_of_parking\":\"10\",\"total_floor_for_parking\":\"3\",\"parking_details\":\"[{\\\"floor_number\\\":0,\\\"ev_charging_point\\\":\\\"10\\\",\\\"hydraulic_parking\\\":\\\"20\\\",\\\"height_of_basement\\\":\\\"30\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"},{\\\"floor_number\\\":1,\\\"ev_charging_point\\\":\\\"10\\\",\\\"hydraulic_parking\\\":\\\"20\\\",\\\"height_of_basement\\\":\\\"800\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"},{\\\"floor_number\\\":2,\\\"ev_charging_point\\\":\\\"10\\\",\\\"hydraulic_parking\\\":\\\"20\\\",\\\"height_of_basement\\\":\\\"300\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"}]\"}', '[\"swimming_pool\",\"club_house\",\"streature_lift\",\"passenger_lift\"]', 'file_16972627331.txt', '3', 'file_16972627331.jpg', NULL, 0, '', '2023-09-19 13:07:40', '2023-10-14 05:52:13', NULL),
(39, 39, NULL, NULL, NULL, 'copper stone', NULL, 1, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-19 16:11:21', '2023-09-19 16:11:21', NULL),
(40, 39, NULL, NULL, NULL, 'kalhaar vatika', 'jugaudc', 22, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-19 16:51:00', '2023-09-19 16:51:00', NULL),
(41, 39, 3, 'HGJGH', '[{\"name\":\"J\",\"mobile\":\"4654654654\",\"email\":\"hkdjhfjds@gmail.com\",\"designation\":\"Developer\"},{\"name\":\"JK\",\"mobile\":\"4654654654\",\"email\":\"sdfsf@gmail.com\",\"designation\":\"Developer\"}]', 'New Project Test', 'JKHKJ', 27, 7, 1, '390007', '1231321', 10, '117', '12312', '142', '0 To 1 Years', '[\"133\"]', '85', 259, '[]', '1', '{\"if_flat_or_penthouse\":\"{\\\"number_of_towers\\\":\\\"\\\",\\\"number_of_floors\\\":\\\"\\\",\\\"total_units\\\":\\\"\\\",\\\"number_of_elevator\\\":\\\"\\\",\\\"service_elevator\\\":\\\"\\\"}\",\"if_office_or_retail\":\"{\\\"number_of_tower\\\":\\\"10\\\",\\\"number_of_floor\\\":\\\"1\\\",\\\"number_of_unit\\\":\\\"10\\\",\\\"number_of_unit_each_block\\\":\\\"10\\\",\\\"number_of_lift\\\":\\\"2\\\",\\\"service_lift\\\":false,\\\"front_road_width\\\":\\\"10\\\",\\\"front_road_width_map_unit\\\":\\\"122\\\",\\\"washroom\\\":\\\"private\\\",\\\"is_two_corner\\\":false,\\\"ceiling_height\\\":\\\"150\\\"}\",\"if_office_tower_details\":\"[{\\\"tower_name\\\":\\\"NSHD\\\",\\\"total_floor\\\":\\\"10\\\",\\\"total_unit\\\":\\\"2\\\",\\\"carpet\\\":\\\"10\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"10\\\",\\\"saleable_to\\\":\\\"20\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":true,\\\"is_built_up\\\":false,\\\"carpet_to\\\":\\\"20\\\",\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"118\\\",\\\"ceiling_height_map_unit\\\":\\\"122\\\"}]\",\"if_retail_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"sub_category\\\":\\\"\\\",\\\"size_from\\\":\\\"\\\",\\\"size_to\\\":\\\"\\\",\\\"front_opening\\\":\\\"\\\",\\\"number_of_each_floor\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"size_from_map_unit\\\":\\\"\\\",\\\"size_to_map_unit\\\":\\\"\\\",\\\"tower_ceiling_map_unit\\\":\\\"\\\",\\\"tower_front_opening_map_unit\\\":\\\"\\\"}]\",\"if_office_tower_details_with_specification\":\"false\"}', '[{\"wing_name\":\"\",\"total_floors\":\"\",\"total_total_units\":\"\",\"sub_categories\":[]}]', '[{\"wing\":\"\",\"saleable\":\"\",\"saleable_to\":\"\",\"built_up\":\"\",\"built_up_to\":\"\",\"carpet_area\":\"\",\"carpet_area_to\":\"\",\"balcony\":\"\",\"balcony_to\":\"\",\"wash_area\":\"\",\"wash_area_to\":\"\",\"terrace_carpet_area\":\"\",\"terrace_carpet_area_to\":\"\",\"terrace_saleable_area_to\":\"\",\"floor_height\":\"\",\"servant_room\":false,\"service_lift\":false,\"has_terrace_and_carpet\":false,\"has_built_up\":false,\"has_carpet\":false,\"saleable_map_unit\":\"117\",\"built_up_map_unit\":\"117\",\"carpet_area_map_unit\":\"117\",\"balcony_area_map_unit\":\"117\",\"wash_area_map_unit\":\"117\",\"terrace_carpet_area_map_unit\":\"117\",\"terrace_saleable_area_map_unit\":\"117\",\"floor_height_map_unit\":\"121\"}]', '[[NSHD,10,2,10,10],]', '', '{\"total_land_area\":\"\",\"total_land_area_to\":\"\",\"total_open_area\":\"\",\"total_open_area_to\":\"\",\"total_number_of_plot\":\"\",\"common_area\":\"\",\"common_area_to\":\"\",\"multiple_theme_phase\":false,\"land_area_map_unit\":\"\",\"open_area_map_unit\":\"\",\"common_area_map_unit\":\"\",\"phase_name\":\"\",\"plot_size_from\":\"\",\"plot_size_to\":\"\",\"plot_size_from_map_unit\":\"\",\"plot_size_to_map_unit\":\"\",\"add_carpet_plot_size\":false,\"add_constructed_carpet_area\":false,\"add_constructed_built_up_area\":false,\"carpet_plot_size\":\"\",\"carpet_plot_size_to\":\"\",\"carpet_plot_size_map_unit\":\"\",\"plot_with_construcation\":false,\"constructed_saleable_area\":\"\",\"constructed_saleable_area_to\":\"\",\"constructed_saleable_area_map_unit\":\"\",\"constructed_carpet_area\":\"\",\"constructed_carpet_area_to\":\"\",\"constructed_carpet_area_map_unit\":\"\",\"constructed_built_up_area_from\":\"\",\"constructed_built_up_area_to\":\"\",\"constructed_built_up_from_map_unit\":\"\",\"constructed_built_up_to_map_unit\":\"\",\"number_of_room\":\"\",\"number_of_bathroom\":\"\",\"number_of_balcony\":\"\",\"number_of_open_side\":\"\",\"servant_room\":false,\"number_of_parking\":\"\"}', '[{\"plot_area_from\":\"\",\"plot_area_to\":\"\",\"construced_area_from\":\"\",\"construced_area_to\":\"\",\"road_width_of_front_side_area_from\":\"\",\"road_width_of_front_side_area_to\":\"\",\"ceiling_height\":\"\",\"carpet_from_to_unit_map\":\"117\",\"constructed_from_to_unit_map\":\"117\",\"road_width_of_front_side_area_from_to_unit_map\":\"117\",\"ceiling_height_unit_map\":\"121\"}]', '{\"gas\":false,\"gas_detail\":\"\",\"power\":false,\"power_detail\":\"\",\"water\":false,\"water_detail\":\"\",\"other\":false,\"other_detail\":\"\"}', '[]', '{\"free_alloted_for_two_wheeler\":\"true\",\"free_alloted_for_four_wheeler\":\"true\",\"available_for_purchase\":\"true\",\"total_number_of_parking\":\"10\",\"total_floor_for_parking\":\"2\",\"parking_details\":\"[{\\\"floor_number\\\":0,\\\"ev_charging_point\\\":\\\"10\\\",\\\"hydraulic_parking\\\":\\\"20\\\",\\\"height_of_basement\\\":\\\"200\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"},{\\\"floor_number\\\":1,\\\"ev_charging_point\\\":\\\"20\\\",\\\"hydraulic_parking\\\":\\\"30\\\",\\\"height_of_basement\\\":\\\"300\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"}]\"}', '[\"swimming_pool\",\"club_house\"]', 'file_16954039503.png', '3', 'file_16954039501.png', '39', 0, '', '2023-09-22 12:02:30', '2023-09-22 12:05:09', NULL),
(42, 39, 3, 'NSJDJ', '[{\"name\":\"NJHK\",\"mobile\":\"45654654654\",\"email\":\"skjdadh@gmail.com\",\"designation\":\"Developer\"}]', 'Flat Project', 'dsfsf', 13, 7, 1, '364001', 'GSDGHJ', 200, '118', '879', '142', '1 To 5 Years', '[\"131\",\"133\"]', '87', 254, '[\"13\"]', NULL, '{\"if_flat_or_penthouse\":\"{\\\"number_of_towers\\\":\\\"10\\\",\\\"number_of_floors\\\":\\\"2\\\",\\\"total_units\\\":\\\"3\\\",\\\"number_of_elevator\\\":\\\"15\\\",\\\"service_elevator\\\":\\\"\\\"}\",\"if_office_or_retail\":\"{\\\"number_of_tower\\\":\\\"\\\",\\\"number_of_floor\\\":\\\"\\\",\\\"number_of_unit\\\":\\\"\\\",\\\"number_of_unit_each_block\\\":\\\"\\\",\\\"number_of_lift\\\":\\\"\\\",\\\"service_lift\\\":false,\\\"front_road_width\\\":\\\"\\\",\\\"front_road_width_map_unit\\\":\\\"\\\",\\\"washroom\\\":\\\"private\\\",\\\"is_two_corner\\\":false}\",\"if_office_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"total_floor\\\":\\\"\\\",\\\"total_unit\\\":\\\"\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"\\\",\\\"saleable_to\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false}]\",\"if_retail_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"sub_category\\\":\\\"\\\",\\\"size_from\\\":\\\"\\\",\\\"size_to\\\":\\\"\\\",\\\"front_opening\\\":\\\"\\\",\\\"number_of_each_floor\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"size_from_map_unit\\\":\\\"\\\",\\\"size_to_map_unit\\\":\\\"\\\",\\\"tower_ceiling_map_unit\\\":\\\"\\\",\\\"tower_front_opening_map_unit\\\":\\\"\\\"}]\",\"if_office_tower_details_with_specification\":\"false\"}', '[{\"wing_name\":\"Saroj\",\"total_floors\":\"2\",\"total_total_units\":\"10\",\"sub_categories\":[]}]', '[{\"wing\":\"Saroj\",\"saleable\":\"10\",\"saleable_to\":\"20\",\"built_up\":\"\",\"built_up_to\":\"\",\"carpet_area\":\"\",\"carpet_area_to\":\"\",\"balcony\":\"40\",\"balcony_to\":\"50\",\"wash_area\":\"20\",\"wash_area_to\":\"30\",\"terrace_carpet_area\":\"45\",\"terrace_carpet_area_to\":\"\",\"terrace_saleable_area_to\":\"\",\"floor_height\":\"60\",\"servant_room\":true,\"service_lift\":false,\"has_terrace_and_carpet\":true,\"has_built_up\":false,\"has_carpet\":false,\"saleable_map_unit\":\"119\",\"built_up_map_unit\":\"117\",\"carpet_area_map_unit\":\"117\",\"balcony_area_map_unit\":\"119\",\"wash_area_map_unit\":\"119\",\"terrace_carpet_area_map_unit\":\"117\",\"terrace_saleable_area_map_unit\":\"117\",\"floor_height_map_unit\":\"121\",\"ceiling_height\":\"70\",\"terrace_saleable_area\":\"56\",\"ceiling_height_map_unit\":\"122\"}]', '', '[', '{\"total_land_area\":\"\",\"total_land_area_to\":\"\",\"total_open_area\":\"\",\"total_open_area_to\":\"\",\"total_number_of_plot\":\"\",\"common_area\":\"\",\"common_area_to\":\"\",\"multiple_theme_phase\":false,\"land_area_map_unit\":\"\",\"open_area_map_unit\":\"\",\"common_area_map_unit\":\"\",\"phase_name\":\"\",\"plot_size_from\":\"\",\"plot_size_to\":\"\",\"plot_size_from_map_unit\":\"\",\"plot_size_to_map_unit\":\"\",\"add_carpet_plot_size\":false,\"add_constructed_carpet_area\":false,\"add_constructed_built_up_area\":false,\"carpet_plot_size\":\"\",\"carpet_plot_size_to\":\"\",\"carpet_plot_size_map_unit\":\"\",\"plot_with_construcation\":false,\"constructed_saleable_area\":\"\",\"constructed_saleable_area_to\":\"\",\"constructed_saleable_area_map_unit\":\"\",\"constructed_carpet_area\":\"\",\"constructed_carpet_area_to\":\"\",\"constructed_carpet_area_map_unit\":\"\",\"constructed_built_up_area_from\":\"\",\"constructed_built_up_area_to\":\"\",\"constructed_built_up_from_map_unit\":\"\",\"constructed_built_up_to_map_unit\":\"\",\"number_of_room\":\"\",\"number_of_bathroom\":\"\",\"number_of_balcony\":\"\",\"number_of_open_side\":\"\",\"servant_room\":false,\"number_of_parking\":\"\"}', '[{\"plot_area_from\":\"\",\"plot_area_to\":\"\",\"construced_area_from\":\"\",\"construced_area_to\":\"\",\"road_width_of_front_side_area_from\":\"\",\"road_width_of_front_side_area_to\":\"\",\"ceiling_height\":\"\",\"carpet_from_to_unit_map\":\"117\",\"constructed_from_to_unit_map\":\"117\",\"road_width_of_front_side_area_from_to_unit_map\":\"117\",\"ceiling_height_unit_map\":\"121\"}]', '{\"gas\":false,\"gas_detail\":\"\",\"power\":false,\"power_detail\":\"\",\"water\":false,\"water_detail\":\"\",\"other\":false,\"other_detail\":\"\"}', '[]', '{\"free_alloted_for_two_wheeler\":\"true\",\"free_alloted_for_four_wheeler\":\"true\",\"available_for_purchase\":\"true\",\"total_number_of_parking\":\"2\",\"total_floor_for_parking\":\"1\",\"parking_details\":\"[{\\\"floor_number\\\":0,\\\"ev_charging_point\\\":\\\"10\\\",\\\"hydraulic_parking\\\":\\\"20\\\",\\\"height_of_basement\\\":\\\"200\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"}]\"}', '[\"swimming_pool\",\"streature_lift\",\"central_ac\"]', 'file_16954057464.png', '5', 'file_16954057465.png', '39', 0, '', '2023-09-22 12:32:26', '2023-09-22 12:43:10', NULL),
(43, 39, NULL, NULL, NULL, 'Kalhaar exotika', 'scence city', 7, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-23 10:24:17', '2023-09-23 10:24:17', NULL),
(44, 39, NULL, NULL, NULL, 'Lavish green', 'asdfaf', 3, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-23 10:31:34', '2023-09-23 10:31:34', NULL),
(45, 39, NULL, NULL, NULL, 'Kesar kadamb', NULL, 4, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-23 10:47:29', '2023-09-23 10:47:29', NULL),
(46, 39, NULL, NULL, NULL, 'Titanium 1', 'athanu', 34, 8, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-23 11:44:40', '2023-09-23 11:44:40', NULL),
(47, 39, NULL, NULL, NULL, 'Vienza', 'alka', 27, 7, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-23 11:54:37', '2023-09-23 11:54:37', NULL),
(48, 39, NULL, NULL, NULL, 'Shivam estate', 'bapubhupo', 33, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-23 12:06:39', '2023-09-23 12:06:39', NULL),
(49, 39, NULL, NULL, NULL, 'Titanium square', 'akotu', 29, 7, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-23 12:15:36', '2023-09-23 12:15:36', NULL),
(50, 39, NULL, NULL, NULL, 'Safal retail', 'shambhu ni baju ma', 9, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-25 07:43:00', '2023-09-25 07:43:00', NULL),
(51, 39, NULL, NULL, NULL, 'Shilp ind. park', 'asfasdf', 33, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-25 08:05:54', '2023-09-25 08:05:54', NULL),
(52, 39, NULL, NULL, NULL, 'vasant vihar', 'brts ni baju ma', 10, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-09-29 09:18:45', '2023-09-29 09:18:45', NULL),
(53, 39, NULL, NULL, NULL, 'landplot', NULL, 33, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-10-02 19:52:05', '2023-10-02 19:52:05', NULL),
(54, 39, NULL, NULL, NULL, 'polymer', 'nadi kinare', 28, 7, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-10-03 07:01:48', '2023-10-03 07:01:48', NULL);
INSERT INTO `projects` (`id`, `user_id`, `builder_id`, `website`, `contact_details`, `project_name`, `address`, `area_id`, `state_id`, `city_id`, `pincode`, `location_link`, `land_area`, `land_size_unit`, `rera_number`, `project_status`, `project_status_question`, `restrictions`, `property_type`, `property_category`, `sub_categories`, `sub_category_single`, `tower_details`, `wing_details`, `unit_details`, `Tower`, `Unit`, `land_plot_details`, `storage_industrial_details`, `storage_industrial_facilities`, `extra_facilities`, `parking_details`, `amenities`, `catlog_file`, `document_category`, `document_image`, `added_by`, `is_indirectly_store`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
(55, 39, 4, 'SGGDJgjhgjh', '[{\"name\":\"JHJ\",\"mobile\":\"878978798\",\"email\":\"fdasfgs@gmail.com\",\"designation\":\"Developer\"}]', 'antilia', 'dariya kinare', 22, 8, 4, '464654', 'ffsffsf', 10, '118', '9878', '142', '0 To 1 Years', '[\"130\",\"131\"]', '88', NULL, '[\"37\"]', '35', '{\"if_flat_or_penthouse\":\"{\\\"number_of_towers\\\":\\\"\\\",\\\"number_of_floors\\\":\\\"\\\",\\\"total_units\\\":\\\"\\\",\\\"number_of_elevator\\\":\\\"\\\",\\\"service_elevator\\\":\\\"\\\"}\",\"if_office_or_retail\":\"{\\\"number_of_tower\\\":\\\"10\\\",\\\"number_of_floor\\\":\\\"20\\\",\\\"number_of_unit\\\":\\\"1\\\",\\\"number_of_unit_each_block\\\":\\\"2\\\",\\\"number_of_lift\\\":\\\"10\\\",\\\"service_lift\\\":false,\\\"front_road_width\\\":\\\"200\\\",\\\"front_road_width_map_unit\\\":\\\"121\\\",\\\"washroom\\\":\\\"private\\\",\\\"is_two_corner\\\":true}\",\"if_office_tower_details\":\"[{\\\"tower_name\\\":\\\"First Tower\\\",\\\"total_floor\\\":\\\"10\\\",\\\"total_unit\\\":\\\"1\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"10\\\",\\\"saleable_to\\\":\\\"20\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false,\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"118\\\"},{\\\"tower_name\\\":\\\"Second Tower\\\",\\\"total_floor\\\":\\\"10\\\",\\\"total_unit\\\":\\\"20\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"30\\\",\\\"saleable_to\\\":\\\"40\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false,\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"118\\\"},{\\\"tower_name\\\":\\\"Third Tower\\\",\\\"total_floor\\\":\\\"20\\\",\\\"total_unit\\\":\\\"3\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"40\\\",\\\"saleable_to\\\":\\\"50\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false,\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"117\\\"},{\\\"tower_name\\\":\\\"Forth Tower\\\",\\\"total_floor\\\":\\\"45\\\",\\\"total_unit\\\":\\\"56\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"59\\\",\\\"saleable_to\\\":\\\"63\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false,\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"117\\\"},{\\\"tower_name\\\":\\\"Fifth Tower\\\",\\\"total_floor\\\":\\\"10\\\",\\\"total_unit\\\":\\\"20\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"40\\\",\\\"saleable_to\\\":\\\"50\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false,\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"118\\\"},{\\\"tower_name\\\":\\\"Sixth Tower\\\",\\\"total_floor\\\":\\\"45\\\",\\\"total_unit\\\":\\\"60\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"10\\\",\\\"saleable_to\\\":\\\"20\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false,\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"119\\\"},{\\\"tower_name\\\":\\\"Seven Tower\\\",\\\"total_floor\\\":\\\"50\\\",\\\"total_unit\\\":\\\"60\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"10\\\",\\\"saleable_to\\\":\\\"20\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false,\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"118\\\"},{\\\"tower_name\\\":\\\"Eight Tower\\\",\\\"total_floor\\\":\\\"10\\\",\\\"total_unit\\\":\\\"20\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"10\\\",\\\"saleable_to\\\":\\\"20\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false,\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"117\\\"},{\\\"tower_name\\\":\\\"Nine Tower\\\",\\\"total_floor\\\":\\\"10\\\",\\\"total_unit\\\":\\\"20\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"60\\\",\\\"saleable_to\\\":\\\"70\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false,\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"118\\\"},{\\\"tower_name\\\":\\\"Ten\\\",\\\"total_floor\\\":\\\"10\\\",\\\"total_unit\\\":\\\"20\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"30\\\",\\\"saleable_to\\\":\\\"40\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false,\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"118\\\"}]\",\"if_retail_tower_details\":\"[{\\\"tower_name\\\":\\\"SDDS\\\",\\\"sub_category\\\":\\\"Ground\\\",\\\"size_from\\\":\\\"10\\\",\\\"size_to\\\":\\\"20\\\",\\\"front_opening\\\":\\\"45\\\",\\\"number_of_each_floor\\\":\\\"56\\\",\\\"ceiling_height\\\":\\\"10\\\",\\\"size_from_map_unit\\\":\\\"119\\\",\\\"size_to_map_unit\\\":\\\"\\\",\\\"tower_ceiling_map_unit\\\":\\\"121\\\",\\\"tower_front_opening_map_unit\\\":\\\"121\\\"}]\",\"if_office_tower_details_with_specification\":\"true\"}', '[{\"wing_name\":\"\",\"total_floors\":\"\",\"total_total_units\":\"\",\"sub_categories\":[]}]', '[{\"wing\":\"\",\"saleable\":\"\",\"saleable_to\":\"\",\"built_up\":\"\",\"built_up_to\":\"\",\"carpet_area\":\"\",\"carpet_area_to\":\"\",\"balcony\":\"\",\"balcony_to\":\"\",\"wash_area\":\"\",\"wash_area_to\":\"\",\"terrace_carpet_area\":\"\",\"terrace_carpet_area_to\":\"\",\"terrace_saleable_area_to\":\"\",\"floor_height\":\"\",\"servant_room\":false,\"service_lift\":false,\"has_terrace_and_carpet\":false,\"has_built_up\":false,\"has_carpet\":false,\"saleable_map_unit\":\"117\",\"built_up_map_unit\":\"117\",\"carpet_area_map_unit\":\"117\",\"balcony_area_map_unit\":\"117\",\"wash_area_map_unit\":\"117\",\"terrace_carpet_area_map_unit\":\"117\",\"terrace_saleable_area_map_unit\":\"117\",\"floor_height_map_unit\":\"121\",\"ceiling_height_map_unit\":\"121\"}]', NULL, NULL, '{\"total_land_area\":\"\",\"total_land_area_to\":\"\",\"total_open_area\":\"\",\"total_open_area_to\":\"\",\"total_number_of_plot\":\"\",\"common_area\":\"\",\"common_area_to\":\"\",\"multiple_theme_phase\":false,\"land_area_map_unit\":\"\",\"open_area_map_unit\":\"\",\"common_area_map_unit\":\"\",\"phase_name\":\"\",\"plot_size_from\":\"\",\"plot_size_to\":\"\",\"add_carpet_plot_size\":false,\"add_constructed_carpet_area\":false,\"add_constructed_built_up_area\":false,\"carpet_plot_size\":\"\",\"carpet_plot_size_to\":\"\",\"carpet_plot_size_map_unit\":\"\",\"plot_with_construcation\":false,\"constructed_saleable_area\":\"\",\"constructed_saleable_area_to\":\"\",\"constructed_saleable_area_map_unit\":\"\",\"constructed_carpet_area\":\"\",\"constructed_carpet_area_to\":\"\",\"constructed_carpet_area_map_unit\":\"\",\"constructed_built_up_area_from\":\"\",\"constructed_built_up_area_to\":\"\",\"number_of_room\":\"\",\"number_of_bathroom\":\"\",\"number_of_balcony\":\"\",\"number_of_open_side\":\"\",\"servant_room\":false,\"number_of_parking\":\"\",\"plot_size_from_map_unit\":\"\",\"plot_size_to_map_unit\":\"\",\"constructed_built_up_from_map_unit\":\"\",\"constructed_built_up_to_map_unit\":\"\"}', '[{\"plot_area_from\":\"\",\"plot_area_to\":\"\",\"construced_area_from\":\"\",\"construced_area_to\":\"\",\"road_width_of_front_side_area_from\":\"\",\"road_width_of_front_side_area_to\":\"\",\"ceiling_height\":\"\",\"carpet_from_to_unit_map\":\"117\",\"constructed_from_to_unit_map\":\"117\",\"road_width_of_front_side_area_from_to_unit_map\":\"117\",\"ceiling_height_unit_map\":\"121\"}]', '{\"pcb\":false,\"pcb_detail\":\"\",\"ec\":false,\"ec_detail\":\"\",\"gas\":false,\"gas_detail\":\"\",\"power\":false,\"power_detail\":\"\",\"water\":false,\"water_detail\":\"\"}', '[]', '{\"free_alloted_for_two_wheeler\":\"true\",\"free_alloted_for_four_wheeler\":\"true\",\"available_for_purchase\":\"true\",\"total_number_of_parking\":\"10\",\"total_floor_for_parking\":\"1\",\"parking_details\":\"[{\\\"floor_number\\\":0,\\\"ev_charging_point\\\":\\\"45\\\",\\\"hydraulic_parking\\\":\\\"56\\\",\\\"height_of_basement\\\":\\\"78\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"}]\"}', '[\"swimming_pool\",\"club_house\",\"streature_lift\",\"passenger_lift\"]', 'file_16972621443.jpg', '2', 'file_16972621443.jpg', NULL, 0, '', '2023-10-03 07:43:04', '2023-10-14 05:42:24', NULL),
(56, 39, NULL, NULL, NULL, 'preji vila', 'hava mahel pase', 36, 10, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-10-03 07:59:19', '2023-10-03 07:59:19', NULL),
(57, 39, NULL, NULL, NULL, 'kalarav nest', 'agol', 41, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-10-03 08:23:29', '2023-10-03 08:23:29', NULL),
(58, 39, NULL, NULL, NULL, 'skyvue', 'metro pase', 1, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2023-10-09 06:14:44', '2023-10-09 06:14:44', NULL),
(59, 39, 12, 'ififi@gmail.com', '[{\"name\":\"Abc\",\"mobile\":\"864346788899\",\"email\":\"fsgjj@gmail.com\",\"designation\":\"Dev\"}]', 'Abc', 'Dyhvguh', 41, 7, 1, '382165', 'Offig', 100, '117', 'h45', '142', '0 To 1 Years', '[\"132\"]', '85', 259, '[]', '1', '{\"if_flat_or_penthouse\":\"{\\\"number_of_towers\\\":\\\"\\\",\\\"number_of_floors\\\":\\\"\\\",\\\"total_units\\\":\\\"\\\",\\\"number_of_elevator\\\":\\\"\\\",\\\"service_elevator\\\":\\\"\\\"}\",\"if_office_or_retail\":\"{\\\"number_of_tower\\\":\\\"10\\\",\\\"number_of_floor\\\":\\\"2\\\",\\\"number_of_unit\\\":\\\"4\\\",\\\"number_of_unit_each_block\\\":\\\"6\\\",\\\"number_of_lift\\\":\\\"8\\\",\\\"service_lift\\\":false,\\\"front_road_width\\\":\\\"500\\\",\\\"front_road_width_map_unit\\\":\\\"122\\\",\\\"washroom\\\":\\\"private\\\",\\\"is_two_corner\\\":false,\\\"ceiling_height\\\":\\\"10\\\"}\",\"if_office_tower_details\":\"[{\\\"tower_name\\\":\\\"Tyuh\\\",\\\"total_floor\\\":\\\"6\\\",\\\"total_unit\\\":\\\"9\\\",\\\"carpet\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"2\\\",\\\"saleable_to\\\":\\\"4\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false,\\\"carpet_from_to_map_unit\\\":\\\"117\\\",\\\"built_from_to_map_unit\\\":\\\"117\\\",\\\"saleable_from_to_map_unit\\\":\\\"118\\\",\\\"ceiling_height_map_unit\\\":\\\"122\\\"}]\",\"if_retail_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"sub_category\\\":\\\"\\\",\\\"size_from\\\":\\\"\\\",\\\"size_to\\\":\\\"\\\",\\\"front_opening\\\":\\\"\\\",\\\"number_of_each_floor\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"size_from_map_unit\\\":\\\"\\\",\\\"size_to_map_unit\\\":\\\"\\\",\\\"tower_ceiling_map_unit\\\":\\\"\\\",\\\"tower_front_opening_map_unit\\\":\\\"\\\"}]\",\"if_office_tower_details_with_specification\":\"false\"}', '[{\"wing_name\":\"\",\"total_floors\":\"\",\"total_total_units\":\"\",\"sub_categories\":[]}]', '[{\"wing\":\"\",\"saleable\":\"\",\"saleable_to\":\"\",\"built_up\":\"\",\"built_up_to\":\"\",\"carpet_area\":\"\",\"carpet_area_to\":\"\",\"balcony\":\"\",\"balcony_to\":\"\",\"wash_area\":\"\",\"wash_area_to\":\"\",\"terrace_carpet_area\":\"\",\"terrace_carpet_area_to\":\"\",\"terrace_saleable_area_to\":\"\",\"floor_height\":\"\",\"servant_room\":false,\"service_lift\":false,\"has_terrace_and_carpet\":false,\"has_built_up\":false,\"has_carpet\":false,\"saleable_map_unit\":\"117\",\"built_up_map_unit\":\"117\",\"carpet_area_map_unit\":\"117\",\"balcony_area_map_unit\":\"117\",\"wash_area_map_unit\":\"117\",\"terrace_carpet_area_map_unit\":\"117\",\"terrace_saleable_area_map_unit\":\"117\",\"floor_height_map_unit\":\"121\",\"ceiling_height_map_unit\":\"121\"}]', '[[Tyuh,6,9,,2],]', '', '{\"total_land_area\":\"\",\"total_land_area_to\":\"\",\"total_open_area\":\"\",\"total_open_area_to\":\"\",\"total_number_of_plot\":\"\",\"common_area\":\"\",\"common_area_to\":\"\",\"multiple_theme_phase\":false,\"land_area_map_unit\":\"\",\"open_area_map_unit\":\"\",\"common_area_map_unit\":\"\",\"phase_name\":\"\",\"plot_size_from\":\"\",\"plot_size_to\":\"\",\"plot_size_from_map_unit\":\"\",\"plot_size_to_map_unit\":\"\",\"add_carpet_plot_size\":false,\"add_constructed_carpet_area\":false,\"add_constructed_built_up_area\":false,\"carpet_plot_size\":\"\",\"carpet_plot_size_to\":\"\",\"carpet_plot_size_map_unit\":\"\",\"plot_with_construcation\":false,\"constructed_saleable_area\":\"\",\"constructed_saleable_area_to\":\"\",\"constructed_saleable_area_map_unit\":\"\",\"constructed_carpet_area\":\"\",\"constructed_carpet_area_to\":\"\",\"constructed_carpet_area_map_unit\":\"\",\"constructed_built_up_area_from\":\"\",\"constructed_built_up_area_to\":\"\",\"constructed_built_up_from_map_unit\":\"\",\"constructed_built_up_to_map_unit\":\"\",\"number_of_room\":\"\",\"number_of_bathroom\":\"\",\"number_of_balcony\":\"\",\"number_of_open_side\":\"\",\"servant_room\":false,\"number_of_parking\":\"\"}', '[{\"plot_area_from\":\"\",\"plot_area_to\":\"\",\"construced_area_from\":\"\",\"construced_area_to\":\"\",\"road_width_of_front_side_area_from\":\"\",\"road_width_of_front_side_area_to\":\"\",\"ceiling_height\":\"\",\"carpet_from_to_unit_map\":\"117\",\"constructed_from_to_unit_map\":\"117\",\"road_width_of_front_side_area_from_to_unit_map\":\"117\",\"ceiling_height_unit_map\":\"121\"}]', '{\"gas\":false,\"gas_detail\":\"\",\"power\":false,\"power_detail\":\"\",\"water\":false,\"water_detail\":\"\",\"other\":false,\"other_detail\":\"\"}', '[]', '{\"free_alloted_for_two_wheeler\":\"true\",\"free_alloted_for_four_wheeler\":\"true\",\"available_for_purchase\":\"true\",\"total_number_of_parking\":\"1\",\"total_floor_for_parking\":\"2\",\"parking_details\":\"[{\\\"floor_number\\\":0,\\\"ev_charging_point\\\":\\\"12\\\",\\\"hydraulic_parking\\\":\\\"10\\\",\\\"height_of_basement\\\":\\\"400\\\",\\\"height_of_basement_map_unit\\\":\\\"122\\\"},{\\\"floor_number\\\":1,\\\"ev_charging_point\\\":\\\"23\\\",\\\"hydraulic_parking\\\":\\\"56\\\",\\\"height_of_basement\\\":\\\"45\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"}]\"}', '[\"swimming_pool\",\"garden_and_children_area\",\"passenger_lift\",\"central_ac\"]', 'file_16971004881.jpg', '1', 'file_16971004883.jpg', '39', 0, 'New added project by nux', '2023-10-12 08:48:08', '2023-10-15 08:41:21', NULL),
(60, 39, 12, 'nakshatra.com', '[{\"name\":\"Nux\",\"mobile\":\"8798789798\",\"email\":\"nux@gmail.com\",\"designation\":\"Developer\"},{\"name\":\"USJD\",\"mobile\":\"4987987987\",\"email\":\"jgjhfsd@gmail.com\",\"designation\":\"Developer\"}]', 'Nakshatra Construction', 'DSDJK', 8, 7, 1, '382463', 'fhsdfkjkfsdfj', 100, '117', 'JK987', '143', '4654654', '[\"130\"]', '85', 260, '[\"3\"]', NULL, '{\"if_flat_or_penthouse\":\"{\\\"number_of_towers\\\":\\\"\\\",\\\"number_of_floors\\\":\\\"\\\",\\\"total_units\\\":\\\"\\\",\\\"number_of_elevator\\\":\\\"\\\",\\\"service_elevator\\\":\\\"\\\"}\",\"if_office_or_retail\":\"{\\\"number_of_tower\\\":\\\"10\\\",\\\"number_of_floor\\\":\\\"10\\\",\\\"number_of_unit\\\":\\\"10\\\",\\\"number_of_unit_each_block\\\":\\\"10\\\",\\\"number_of_lift\\\":\\\"2\\\",\\\"service_lift\\\":false,\\\"front_road_width\\\":\\\"3\\\",\\\"front_road_width_map_unit\\\":\\\"121\\\",\\\"washroom\\\":\\\"private\\\",\\\"is_two_corner\\\":true}\",\"if_office_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"total_floor\\\":\\\"\\\",\\\"total_unit\\\":\\\"\\\",\\\"carpet\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"\\\",\\\"saleable_to\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false}]\",\"if_retail_tower_details\":\"[{\\\"tower_name\\\":\\\"NJS\\\",\\\"sub_category\\\":\\\"Ground\\\",\\\"size_from\\\":\\\"10\\\",\\\"size_to\\\":\\\"20\\\",\\\"front_opening\\\":\\\"200\\\",\\\"number_of_each_floor\\\":\\\"20\\\",\\\"ceiling_height\\\":\\\"2\\\",\\\"size_from_map_unit\\\":\\\"117\\\",\\\"size_to_map_unit\\\":\\\"\\\",\\\"tower_ceiling_map_unit\\\":\\\"121\\\",\\\"tower_front_opening_map_unit\\\":\\\"121\\\"}]\",\"if_office_tower_details_with_specification\":\"false\"}', '[{\"wing_name\":\"\",\"total_floors\":\"\",\"total_total_units\":\"\",\"sub_categories\":[]}]', '[{\"wing\":\"\",\"saleable\":\"\",\"saleable_to\":\"\",\"built_up\":\"\",\"built_up_to\":\"\",\"carpet_area\":\"\",\"carpet_area_to\":\"\",\"balcony\":\"\",\"balcony_to\":\"\",\"wash_area\":\"\",\"wash_area_to\":\"\",\"terrace_carpet_area\":\"\",\"terrace_carpet_area_to\":\"\",\"terrace_saleable_area_to\":\"\",\"floor_height\":\"\",\"servant_room\":false,\"service_lift\":false,\"has_terrace_and_carpet\":false,\"has_built_up\":false,\"has_carpet\":false,\"saleable_map_unit\":\"117\",\"built_up_map_unit\":\"117\",\"carpet_area_map_unit\":\"117\",\"balcony_area_map_unit\":\"117\",\"wash_area_map_unit\":\"117\",\"terrace_carpet_area_map_unit\":\"117\",\"terrace_saleable_area_map_unit\":\"117\",\"floor_height_map_unit\":\"121\",\"ceiling_height_map_unit\":\"121\"}]', '[[NJS,10,20,200,20],]', '', '{\"total_land_area\":\"\",\"total_land_area_to\":\"\",\"total_open_area\":\"\",\"total_open_area_to\":\"\",\"total_number_of_plot\":\"\",\"common_area\":\"\",\"common_area_to\":\"\",\"multiple_theme_phase\":false,\"land_area_map_unit\":\"\",\"open_area_map_unit\":\"\",\"common_area_map_unit\":\"\",\"phase_name\":\"\",\"plot_size_from\":\"\",\"plot_size_to\":\"\",\"add_carpet_plot_size\":false,\"add_constructed_carpet_area\":false,\"add_constructed_built_up_area\":false,\"carpet_plot_size\":\"\",\"carpet_plot_size_to\":\"\",\"carpet_plot_size_map_unit\":\"\",\"plot_with_construcation\":false,\"constructed_saleable_area\":\"\",\"constructed_saleable_area_to\":\"\",\"constructed_saleable_area_map_unit\":\"\",\"constructed_carpet_area\":\"\",\"constructed_carpet_area_to\":\"\",\"constructed_carpet_area_map_unit\":\"\",\"constructed_built_up_area_from\":\"\",\"constructed_built_up_area_to\":\"\",\"number_of_room\":\"\",\"number_of_bathroom\":\"\",\"number_of_balcony\":\"\",\"number_of_open_side\":\"\",\"servant_room\":false,\"number_of_parking\":\"\",\"plot_size_from_map_unit\":\"\",\"plot_size_to_map_unit\":\"\",\"constructed_built_up_from_map_unit\":\"\",\"constructed_built_up_to_map_unit\":\"\"}', '[{\"plot_area_from\":\"\",\"plot_area_to\":\"\",\"construced_area_from\":\"\",\"construced_area_to\":\"\",\"road_width_of_front_side_area_from\":\"\",\"road_width_of_front_side_area_to\":\"\",\"ceiling_height\":\"\",\"carpet_from_to_unit_map\":\"117\",\"constructed_from_to_unit_map\":\"117\",\"road_width_of_front_side_area_from_to_unit_map\":\"117\",\"ceiling_height_unit_map\":\"121\"}]', '{\"pcb\":false,\"pcb_detail\":\"\",\"ec\":false,\"ec_detail\":\"\",\"gas\":false,\"gas_detail\":\"\",\"power\":false,\"power_detail\":\"\",\"water\":false,\"water_detail\":\"\"}', '[]', '{\"free_alloted_for_two_wheeler\":\"true\",\"free_alloted_for_four_wheeler\":\"true\",\"available_for_purchase\":\"true\",\"total_number_of_parking\":\"10\",\"total_floor_for_parking\":\"2\",\"parking_details\":\"[{\\\"floor_number\\\":0,\\\"ev_charging_point\\\":\\\"\\\",\\\"hydraulic_parking\\\":\\\"\\\",\\\"height_of_basement\\\":\\\"\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"},{\\\"floor_number\\\":1,\\\"ev_charging_point\\\":\\\"\\\",\\\"hydraulic_parking\\\":\\\"\\\",\\\"height_of_basement\\\":\\\"\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"}]\"}', '[\"club_house\",\"passenger_lift\",\"gym\"]', 'file_16973826460.png', '1', 'file_16973826461.png', '39', 0, 'First Remark', '2023-10-15 09:40:46', '2023-10-15 09:40:46', NULL),
(61, 39, 6, 'safal.com', '[{\"name\":\"MN\",\"mobile\":\"4654654656\",\"email\":\"sdfsjfk@gmail.com\",\"designation\":\"Developer\"}]', 'Safal Construction', 'FJKHSD', 41, 7, 1, '382165', 'sdfdsf4564sfdsf', 500, '117', '15F', '142', '0 To 1 Years', '[\"131\",\"133\"]', '85', 261, '[]', '7', '{\"if_flat_or_penthouse\":\"{\\\"number_of_towers\\\":\\\"\\\",\\\"number_of_floors\\\":\\\"\\\",\\\"total_units\\\":\\\"\\\",\\\"number_of_elevator\\\":\\\"\\\",\\\"service_elevator\\\":\\\"\\\"}\",\"if_office_or_retail\":\"{\\\"number_of_tower\\\":\\\"\\\",\\\"number_of_floor\\\":\\\"\\\",\\\"number_of_unit\\\":\\\"\\\",\\\"number_of_unit_each_block\\\":\\\"\\\",\\\"number_of_lift\\\":\\\"\\\",\\\"service_lift\\\":false,\\\"front_road_width\\\":\\\"\\\",\\\"front_road_width_map_unit\\\":\\\"\\\",\\\"washroom\\\":\\\"private\\\",\\\"is_two_corner\\\":false}\",\"if_office_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"total_floor\\\":\\\"\\\",\\\"total_unit\\\":\\\"\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"\\\",\\\"saleable_to\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false}]\",\"if_retail_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"sub_category\\\":\\\"\\\",\\\"size_from\\\":\\\"\\\",\\\"size_to\\\":\\\"\\\",\\\"front_opening\\\":\\\"\\\",\\\"number_of_each_floor\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"size_from_map_unit\\\":\\\"\\\",\\\"size_to_map_unit\\\":\\\"\\\",\\\"tower_ceiling_map_unit\\\":\\\"\\\",\\\"tower_front_opening_map_unit\\\":\\\"\\\"}]\",\"if_office_tower_details_with_specification\":\"false\"}', '[{\"wing_name\":\"\",\"total_floors\":\"\",\"total_total_units\":\"\",\"sub_categories\":[]}]', '[{\"wing\":\"\",\"saleable\":\"\",\"saleable_to\":\"\",\"built_up\":\"\",\"built_up_to\":\"\",\"carpet_area\":\"\",\"carpet_area_to\":\"\",\"balcony\":\"\",\"balcony_to\":\"\",\"wash_area\":\"\",\"wash_area_to\":\"\",\"terrace_carpet_area\":\"\",\"terrace_carpet_area_to\":\"\",\"terrace_saleable_area_to\":\"\",\"floor_height\":\"\",\"servant_room\":false,\"service_lift\":false,\"has_terrace_and_carpet\":false,\"has_built_up\":false,\"has_carpet\":false,\"saleable_map_unit\":\"117\",\"built_up_map_unit\":\"117\",\"carpet_area_map_unit\":\"117\",\"balcony_area_map_unit\":\"117\",\"wash_area_map_unit\":\"117\",\"terrace_carpet_area_map_unit\":\"117\",\"terrace_saleable_area_map_unit\":\"117\",\"floor_height_map_unit\":\"121\",\"ceiling_height_map_unit\":\"121\"}]', NULL, NULL, '{\"total_land_area\":\"\",\"total_land_area_to\":\"\",\"total_open_area\":\"\",\"total_open_area_to\":\"\",\"total_number_of_plot\":\"\",\"common_area\":\"\",\"common_area_to\":\"\",\"multiple_theme_phase\":false,\"land_area_map_unit\":\"\",\"open_area_map_unit\":\"\",\"common_area_map_unit\":\"\",\"phase_name\":\"\",\"plot_size_from\":\"\",\"plot_size_to\":\"\",\"plot_size_from_map_unit\":\"\",\"plot_size_to_map_unit\":\"\",\"add_carpet_plot_size\":false,\"add_constructed_carpet_area\":false,\"add_constructed_built_up_area\":false,\"carpet_plot_size\":\"\",\"carpet_plot_size_to\":\"\",\"carpet_plot_size_map_unit\":\"\",\"plot_with_construcation\":false,\"constructed_saleable_area\":\"\",\"constructed_saleable_area_to\":\"\",\"constructed_saleable_area_map_unit\":\"\",\"constructed_carpet_area\":\"\",\"constructed_carpet_area_to\":\"\",\"constructed_carpet_area_map_unit\":\"\",\"constructed_built_up_area_from\":\"\",\"constructed_built_up_area_to\":\"\",\"constructed_built_up_from_map_unit\":\"\",\"constructed_built_up_to_map_unit\":\"\",\"number_of_room\":\"\",\"number_of_bathroom\":\"\",\"number_of_balcony\":\"\",\"number_of_open_side\":\"\",\"servant_room\":false,\"number_of_parking\":\"\"}', '[{\"plot_area_from\":\"10\",\"plot_area_to\":\"20\",\"construced_area_from\":\"20\",\"construced_area_to\":\"30\",\"road_width_of_front_side_area_from\":\"40\",\"road_width_of_front_side_area_to\":\"50\",\"ceiling_height\":\"1500\",\"carpet_from_to_unit_map\":\"118\",\"constructed_from_to_unit_map\":\"119\",\"road_width_of_front_side_area_from_to_unit_map\":\"118\",\"ceiling_height_unit_map\":\"122\",\"number_of_units\":\"10\"},{\"plot_area_from\":\"10\",\"plot_area_to\":\"20\",\"construced_area_from\":\"60\",\"construced_area_to\":\"40\",\"road_width_of_front_side_area_from\":\"30\",\"road_width_of_front_side_area_to\":\"50\",\"ceiling_height\":\"100\",\"number_of_units\":\"5\",\"carpet_from_to_unit_map\":\"117\",\"constructed_from_to_unit_map\":\"117\",\"road_width_of_front_side_area_from_to_unit_map\":\"117\",\"ceiling_height_unit_map\":\"121\"}]', '{\"pcb\":true,\"pcb_detail\":\"Pollution control board Ahmedabad\",\"ec\":true,\"ec_detail\":\"EC Ahmedabad \",\"gas\":false,\"gas_detail\":\"\",\"power\":false,\"power_detail\":\"\",\"water\":false,\"water_detail\":\"\"}', '[]', '{\"free_alloted_for_two_wheeler\":\"true\",\"free_alloted_for_four_wheeler\":\"true\",\"available_for_purchase\":\"true\",\"total_number_of_parking\":\"10\",\"total_floor_for_parking\":\"1\",\"parking_details\":\"[{\\\"floor_number\\\":0,\\\"ev_charging_point\\\":\\\"45\\\",\\\"hydraulic_parking\\\":\\\"10\\\",\\\"height_of_basement\\\":\\\"200\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"}]\"}', '[\"club_house\",\"passenger_lift\",\"service_lift\"]', 'file_16973854851.png', '1', 'file_16973854855.png', '39', 0, 'Second Remark', '2023-10-15 10:28:05', '2023-10-15 11:08:41', NULL),
(62, 39, 11, 'sdfsdkjfhs.com', '[{\"name\":\"HJ\",\"mobile\":\"4654654654\",\"email\":\"sdfskjfs@gmail.com\",\"designation\":\"Developer\"}]', 'Akash Construction', 'jdskjad', 17, 8, 3, '431002', 'asdsad', 500, '120', '213JK', '142', '1 To 5 Years', '[\"132\"]', '87', 254, '[\"13\",\"14\",\"15\"]', NULL, '{\"if_flat_or_penthouse\":\"{\\\"number_of_towers\\\":\\\"10\\\",\\\"number_of_floors\\\":\\\"2\\\",\\\"total_units\\\":\\\"10\\\",\\\"number_of_elevator\\\":\\\"2\\\",\\\"service_elevator\\\":\\\"\\\"}\",\"if_office_or_retail\":\"{\\\"number_of_tower\\\":\\\"\\\",\\\"number_of_floor\\\":\\\"\\\",\\\"number_of_unit\\\":\\\"\\\",\\\"number_of_unit_each_block\\\":\\\"\\\",\\\"number_of_lift\\\":\\\"\\\",\\\"service_lift\\\":false,\\\"front_road_width\\\":\\\"\\\",\\\"front_road_width_map_unit\\\":\\\"\\\",\\\"washroom\\\":\\\"private\\\",\\\"is_two_corner\\\":false}\",\"if_office_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"total_floor\\\":\\\"\\\",\\\"total_unit\\\":\\\"\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"\\\",\\\"saleable_to\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false}]\",\"if_retail_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"sub_category\\\":\\\"\\\",\\\"size_from\\\":\\\"\\\",\\\"size_to\\\":\\\"\\\",\\\"front_opening\\\":\\\"\\\",\\\"number_of_each_floor\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"size_from_map_unit\\\":\\\"\\\",\\\"size_to_map_unit\\\":\\\"\\\",\\\"tower_ceiling_map_unit\\\":\\\"\\\",\\\"tower_front_opening_map_unit\\\":\\\"\\\"}]\",\"if_office_tower_details_with_specification\":\"false\"}', '[{\"wing_name\":\"NJNSJ\",\"total_floors\":\"2\",\"total_total_units\":\"10\",\"sub_categories\":[\"2BHK\"]}]', '[{\"wing\":\"NJNSJ\",\"saleable\":\"10\",\"saleable_to\":\"20\",\"built_up\":\"10\",\"built_up_to\":\"20\",\"carpet_area\":\"20\",\"carpet_area_to\":\"30\",\"balcony\":\"10\",\"balcony_to\":\"20\",\"wash_area\":\"40\",\"wash_area_to\":\"50\",\"terrace_carpet_area\":\"50\",\"terrace_carpet_area_to\":\"\",\"terrace_saleable_area_to\":\"\",\"floor_height\":\"10\",\"servant_room\":true,\"service_lift\":false,\"has_terrace_and_carpet\":true,\"has_built_up\":true,\"has_carpet\":true,\"saleable_map_unit\":\"119\",\"built_up_map_unit\":\"117\",\"carpet_area_map_unit\":\"117\",\"balcony_area_map_unit\":\"117\",\"wash_area_map_unit\":\"117\",\"terrace_carpet_area_map_unit\":\"117\",\"terrace_saleable_area_map_unit\":\"117\",\"floor_height_map_unit\":\"121\",\"ceiling_height\":\"30\",\"terrace_saleable_area\":\"60\",\"ceiling_height_map_unit\":\"121\"}]', '', '[', '{\"total_land_area\":\"\",\"total_land_area_to\":\"\",\"total_open_area\":\"\",\"total_open_area_to\":\"\",\"total_number_of_plot\":\"\",\"common_area\":\"\",\"common_area_to\":\"\",\"multiple_theme_phase\":false,\"land_area_map_unit\":\"\",\"open_area_map_unit\":\"\",\"common_area_map_unit\":\"\",\"phase_name\":\"\",\"plot_size_from\":\"\",\"plot_size_to\":\"\",\"plot_size_from_map_unit\":\"\",\"plot_size_to_map_unit\":\"\",\"add_carpet_plot_size\":false,\"add_constructed_carpet_area\":false,\"add_constructed_built_up_area\":false,\"carpet_plot_size\":\"\",\"carpet_plot_size_to\":\"\",\"carpet_plot_size_map_unit\":\"\",\"plot_with_construcation\":false,\"constructed_saleable_area\":\"\",\"constructed_saleable_area_to\":\"\",\"constructed_saleable_area_map_unit\":\"\",\"constructed_carpet_area\":\"\",\"constructed_carpet_area_to\":\"\",\"constructed_carpet_area_map_unit\":\"\",\"constructed_built_up_area_from\":\"\",\"constructed_built_up_area_to\":\"\",\"constructed_built_up_from_map_unit\":\"\",\"constructed_built_up_to_map_unit\":\"\",\"number_of_room\":\"\",\"number_of_bathroom\":\"\",\"number_of_balcony\":\"\",\"number_of_open_side\":\"\",\"servant_room\":false,\"number_of_parking\":\"\"}', '[{\"plot_area_from\":\"\",\"plot_area_to\":\"\",\"construced_area_from\":\"\",\"construced_area_to\":\"\",\"road_width_of_front_side_area_from\":\"\",\"road_width_of_front_side_area_to\":\"\",\"ceiling_height\":\"\",\"carpet_from_to_unit_map\":\"117\",\"constructed_from_to_unit_map\":\"117\",\"road_width_of_front_side_area_from_to_unit_map\":\"117\",\"ceiling_height_unit_map\":\"121\"}]', '{\"gas\":false,\"gas_detail\":\"\",\"power\":false,\"power_detail\":\"\",\"water\":false,\"water_detail\":\"\",\"other\":false,\"other_detail\":\"\"}', '[]', '{\"free_alloted_for_two_wheeler\":\"true\",\"free_alloted_for_four_wheeler\":\"true\",\"available_for_purchase\":\"true\",\"total_number_of_parking\":\"1\",\"total_floor_for_parking\":\"2\",\"parking_details\":\"[{\\\"floor_number\\\":0,\\\"ev_charging_point\\\":\\\"10\\\",\\\"hydraulic_parking\\\":\\\"20\\\",\\\"height_of_basement\\\":\\\"300\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"},{\\\"floor_number\\\":1,\\\"ev_charging_point\\\":\\\"20\\\",\\\"hydraulic_parking\\\":\\\"30\\\",\\\"height_of_basement\\\":\\\"400\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"}]\"}', '[\"club_house\",\"gym\"]', 'file_16973885812.png', '2', 'file_16973885815.png', '39', 0, 'Residences  - flat remark', '2023-10-15 11:19:41', '2023-10-15 11:21:04', NULL),
(63, 39, 9, 'vienza.com', '[{\"name\":\"NJZDH\",\"mobile\":\"8797987987\",\"email\":\"dfdsfs@gmail.com\",\"designation\":\"Developer\"}]', 'Amul Construction', 'Near fun blast ahmedabad', 3, 7, 1, '380054', 'fasdadasd5d56a4sda64d', 1000, '117', 'JKK8789', '142', '0 To 1 Years', '[\"133\"]', '87', 256, '[]', 'null', '{\"if_flat_or_penthouse\":\"{\\\"number_of_towers\\\":\\\"\\\",\\\"number_of_floors\\\":\\\"\\\",\\\"total_units\\\":\\\"\\\",\\\"number_of_elevator\\\":\\\"\\\",\\\"service_elevator\\\":\\\"\\\"}\",\"if_office_or_retail\":\"{\\\"number_of_tower\\\":\\\"\\\",\\\"number_of_floor\\\":\\\"\\\",\\\"number_of_unit\\\":\\\"\\\",\\\"number_of_unit_each_block\\\":\\\"\\\",\\\"number_of_lift\\\":\\\"\\\",\\\"service_lift\\\":false,\\\"front_road_width\\\":\\\"\\\",\\\"front_road_width_map_unit\\\":\\\"\\\",\\\"washroom\\\":\\\"private\\\",\\\"is_two_corner\\\":false}\",\"if_office_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"total_floor\\\":\\\"\\\",\\\"total_unit\\\":\\\"\\\",\\\"carpet\\\":\\\"\\\",\\\"carpet_to\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"\\\",\\\"saleable_to\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false}]\",\"if_retail_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"sub_category\\\":\\\"\\\",\\\"size_from\\\":\\\"\\\",\\\"size_to\\\":\\\"\\\",\\\"front_opening\\\":\\\"\\\",\\\"number_of_each_floor\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"size_from_map_unit\\\":\\\"\\\",\\\"size_to_map_unit\\\":\\\"\\\",\\\"tower_ceiling_map_unit\\\":\\\"\\\",\\\"tower_front_opening_map_unit\\\":\\\"\\\"}]\",\"if_office_tower_details_with_specification\":\"false\"}', '[{\"wing_name\":\"\",\"total_floors\":\"\",\"total_total_units\":\"\",\"sub_categories\":[]}]', '[{\"saleable\":\"\",\"saleable_to\":\"\",\"built_up\":\"\",\"built_up_to\":\"\",\"carpet_area\":\"\",\"carpet_area_to\":\"\",\"balcony\":\"\",\"balcony_to\":\"\",\"wash_area\":\"\",\"wash_area_to\":\"\",\"terrace_carpet_area\":\"\",\"terrace_carpet_area_to\":\"\",\"terrace_saleable_area_to\":\"\",\"floor_height\":\"\",\"servant_room\":false,\"service_lift\":false,\"has_terrace_and_carpet\":false,\"has_built_up\":false,\"has_carpet\":false,\"wing\":\"\",\"saleable_map_unit\":null,\"built_up_map_unit\":null,\"carpet_area_map_unit\":null,\"balcony_area_map_unit\":null,\"wash_area_map_unit\":null,\"terrace_carpet_area_map_unit\":null,\"terrace_saleable_area_map_unit\":null,\"floor_height_map_unit\":null,\"ceiling_height_map_unit\":null}]', '', '[', '{\"total_land_area\":\"10\",\"total_land_area_to\":\"20\",\"total_open_area\":\"20\",\"total_open_area_to\":\"30\",\"total_number_of_plot\":\"10\",\"common_area\":\"20\",\"common_area_to\":\"40\",\"multiple_theme_phase\":true,\"land_area_map_unit\":\"\",\"open_area_map_unit\":\"118\",\"common_area_map_unit\":\"\",\"phase_name\":\"ANNJ\",\"plot_size_from\":\"50\",\"plot_size_to\":\"60\",\"add_carpet_plot_size\":true,\"add_constructed_carpet_area\":false,\"add_constructed_built_up_area\":false,\"carpet_plot_size\":\"20\",\"carpet_plot_size_to\":\"50\",\"carpet_plot_size_map_unit\":\"117\",\"plot_with_construcation\":true,\"constructed_saleable_area\":\"60\",\"constructed_saleable_area_to\":\"80\",\"constructed_saleable_area_map_unit\":\"117\",\"constructed_carpet_area\":\"\",\"constructed_carpet_area_to\":\"\",\"constructed_carpet_area_map_unit\":\"\",\"constructed_built_up_area_from\":\"\",\"constructed_built_up_area_to\":\"\",\"number_of_room\":\"\",\"number_of_bathroom\":\"\",\"number_of_balcony\":\"\",\"number_of_open_side\":\"\",\"servant_room\":false,\"number_of_parking\":\"\",\"plot_size_from_map_unit\":\"117\",\"plot_size_to_map_unit\":\"\",\"constructed_built_up_from_map_unit\":\"\",\"constructed_built_up_to_map_unit\":\"\"}', '[{\"plot_area_from\":\"\",\"plot_area_to\":\"\",\"construced_area_from\":\"\",\"construced_area_to\":\"\",\"road_width_of_front_side_area_from\":\"\",\"road_width_of_front_side_area_to\":\"\",\"ceiling_height\":\"\",\"carpet_from_to_unit_map\":\"117\",\"constructed_from_to_unit_map\":\"117\",\"road_width_of_front_side_area_from_to_unit_map\":\"117\",\"ceiling_height_unit_map\":\"121\"}]', '{\"gas\":false,\"gas_detail\":\"\",\"power\":false,\"power_detail\":\"\",\"water\":false,\"water_detail\":\"\",\"other\":false,\"other_detail\":\"\"}', '[]', '{\"free_alloted_for_two_wheeler\":\"true\",\"free_alloted_for_four_wheeler\":\"true\",\"available_for_purchase\":\"true\",\"total_number_of_parking\":\"10\",\"total_floor_for_parking\":\"2\",\"parking_details\":\"[{\\\"floor_number\\\":0,\\\"ev_charging_point\\\":\\\"20\\\",\\\"hydraulic_parking\\\":\\\"30\\\",\\\"height_of_basement\\\":\\\"50\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"},{\\\"floor_number\\\":1,\\\"ev_charging_point\\\":\\\"10\\\",\\\"hydraulic_parking\\\":\\\"20\\\",\\\"height_of_basement\\\":\\\"60\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"}]\"}', '[\"club_house\",\"gym\"]', 'file_16976005210.png', '3', 'file_16976005215.png', '39', 0, 'Resident land plot', '2023-10-17 22:12:01', '2023-10-18 10:10:10', NULL),
(64, 39, 11, 'vraj.com', '[{\"name\":\"NSH\",\"mobile\":\"7897987987\",\"email\":\"fdfskfjhsjkf@gmail.com\",\"designation\":\"Developer\"}]', 'Ambika supermarket', 'Near shastri nagar', 41, 7, 1, '382165', 'fdsfsfkjsdfsd56fdf4sdf', 500, '117', 'KL45', '142', '0 To 1 Years', '[\"131\",\"133\"]', '87', 258, '[]', NULL, '{\"if_flat_or_penthouse\":\"{\\\"number_of_towers\\\":\\\"\\\",\\\"number_of_floors\\\":\\\"\\\",\\\"total_units\\\":\\\"\\\",\\\"number_of_elevator\\\":\\\"\\\",\\\"service_elevator\\\":\\\"\\\"}\",\"if_office_or_retail\":\"{\\\"number_of_tower\\\":\\\"\\\",\\\"number_of_floor\\\":\\\"\\\",\\\"number_of_unit\\\":\\\"\\\",\\\"number_of_unit_each_block\\\":\\\"\\\",\\\"number_of_lift\\\":\\\"\\\",\\\"service_lift\\\":false,\\\"front_road_width\\\":\\\"\\\",\\\"front_road_width_map_unit\\\":\\\"\\\",\\\"washroom\\\":\\\"private\\\",\\\"is_two_corner\\\":false}\",\"if_office_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"total_floor\\\":\\\"\\\",\\\"total_unit\\\":\\\"\\\",\\\"carpet\\\":\\\"\\\",\\\"built_up\\\":\\\"\\\",\\\"built_up_to\\\":\\\"\\\",\\\"saleable\\\":\\\"\\\",\\\"saleable_to\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"is_carpet\\\":false,\\\"is_built_up\\\":false}]\",\"if_retail_tower_details\":\"[{\\\"tower_name\\\":\\\"\\\",\\\"sub_category\\\":\\\"\\\",\\\"size_from\\\":\\\"\\\",\\\"size_to\\\":\\\"\\\",\\\"front_opening\\\":\\\"\\\",\\\"number_of_each_floor\\\":\\\"\\\",\\\"ceiling_height\\\":\\\"\\\",\\\"size_from_map_unit\\\":\\\"\\\",\\\"size_to_map_unit\\\":\\\"\\\",\\\"tower_ceiling_map_unit\\\":\\\"\\\",\\\"tower_front_opening_map_unit\\\":\\\"\\\"}]\",\"if_office_tower_details_with_specification\":\"false\"}', '[{\"wing_name\":\"\",\"total_floors\":\"\",\"total_total_units\":\"\"}]', '[{\"saleable\":\"\",\"saleable_to\":\"\",\"built_up\":\"\",\"built_up_to\":\"\",\"carpet_area\":\"\",\"carpet_area_to\":\"\",\"balcony\":\"\",\"balcony_to\":\"\",\"wash_area\":\"\",\"wash_area_to\":\"\",\"terrace_carpet_area\":\"\",\"terrace_carpet_area_to\":\"\",\"terrace_saleable_area_to\":\"\",\"floor_height\":\"\",\"servant_room\":false,\"service_lift\":false,\"has_terrace_and_carpet\":false,\"has_built_up\":false,\"has_carpet\":false}]', '', '[', '{\"total_land_area\":\"\",\"total_land_area_to\":\"\",\"total_open_area\":\"10\",\"total_open_area_to\":\"\",\"total_number_of_plot\":\"10\",\"common_area\":\"\",\"common_area_to\":\"\",\"multiple_theme_phase\":true,\"land_area_map_unit\":\"\",\"open_area_map_unit\":\"119\",\"common_area_map_unit\":\"\",\"phase_name\":\"10\",\"plot_size_from\":\"20\",\"plot_size_to\":\"30\",\"add_carpet_plot_size\":true,\"add_constructed_carpet_area\":false,\"add_constructed_built_up_area\":false,\"carpet_plot_size\":\"40\",\"carpet_plot_size_to\":\"50\",\"carpet_plot_size_map_unit\":\"119\",\"plot_with_construcation\":true,\"constructed_saleable_area\":\"60\",\"constructed_saleable_area_to\":\"100\",\"constructed_saleable_area_map_unit\":\"118\",\"constructed_carpet_area\":\"\",\"constructed_carpet_area_to\":\"\",\"constructed_carpet_area_map_unit\":\"\",\"constructed_built_up_area_from\":\"\",\"constructed_built_up_area_to\":\"\",\"number_of_room\":\"\",\"number_of_bathroom\":\"\",\"number_of_balcony\":\"\",\"number_of_open_side\":\"\",\"servant_room\":false,\"number_of_parking\":\"\",\"plot_size_from_map_unit\":\"117\",\"plot_size_to_map_unit\":\"\",\"constructed_built_up_from_map_unit\":\"\",\"constructed_built_up_to_map_unit\":\"\"}', '[{\"plot_area_from\":\"\",\"plot_area_to\":\"\",\"construced_area_from\":\"\",\"construced_area_to\":\"\",\"road_width_of_front_side_area_from\":\"\",\"road_width_of_front_side_area_to\":\"\",\"ceiling_height\":\"\",\"carpet_from_to_unit_map\":\"\",\"constructed_from_to_unit_map\":\"\",\"road_width_of_front_side_area_from_to_unit_map\":\"\",\"ceiling_height_unit_map\":\"\"}]', '{\"pcb\":false,\"pcb_detail\":\"\",\"ec\":false,\"ec_detail\":\"\",\"gas\":false,\"gas_detail\":\"\",\"power\":false,\"power_detail\":\"\",\"water\":false,\"water_detail\":\"\"}', '[]', '{\"free_alloted_for_two_wheeler\":\"true\",\"free_alloted_for_four_wheeler\":\"true\",\"available_for_purchase\":\"true\",\"total_number_of_parking\":\"1\",\"total_floor_for_parking\":\"1\",\"parking_details\":\"[{\\\"floor_number\\\":0,\\\"ev_charging_point\\\":\\\"45\\\",\\\"hydraulic_parking\\\":\\\"62\\\",\\\"height_of_basement\\\":\\\"100\\\",\\\"height_of_basement_map_unit\\\":\\\"121\\\"}]\"}', '[\"club_house\",\"gym\"]', 'file_16976489395.png', '2', 'file_16976489380.png', '39', 0, 'New project', '2023-10-18 11:38:59', '2023-10-18 11:38:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_units`
--

CREATE TABLE `project_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `tower_id` varchar(180) DEFAULT NULL,
  `units_id` varchar(180) DEFAULT NULL,
  `floor_details` text DEFAULT NULL,
  `added_by` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_for` varchar(180) DEFAULT NULL,
  `property_type` varchar(180) DEFAULT NULL,
  `property_category` varchar(180) DEFAULT NULL,
  `office_type` varchar(180) DEFAULT NULL,
  `retail_type` varchar(180) DEFAULT NULL,
  `storage_type` varchar(180) DEFAULT NULL,
  `plot_type` varchar(180) DEFAULT NULL,
  `flat_type` varchar(180) DEFAULT NULL,
  `project_id` varchar(180) DEFAULT NULL,
  `state_id` varchar(20) DEFAULT NULL,
  `city_id` varchar(180) DEFAULT NULL,
  `locality_id` varchar(180) DEFAULT NULL,
  `address` varchar(180) DEFAULT NULL,
  `location_link` varchar(180) DEFAULT NULL,
  `district_id` varchar(180) DEFAULT NULL,
  `taluka_id` varchar(180) DEFAULT NULL,
  `village_id` varchar(180) DEFAULT NULL,
  `zone_id` varchar(180) DEFAULT NULL,
  `constructed_carpet_area` varchar(180) DEFAULT NULL,
  `constructed_salable_area` varchar(180) DEFAULT NULL,
  `constructed_builtup_area` varchar(180) DEFAULT NULL,
  `salable_plot_area` varchar(180) DEFAULT NULL,
  `carpet_plot_area` varchar(180) DEFAULT NULL,
  `salable_area` varchar(180) DEFAULT NULL,
  `carpet_area` varchar(180) DEFAULT NULL,
  `storage_centre_height` varchar(180) DEFAULT NULL,
  `length_of_plot` varchar(180) DEFAULT NULL,
  `width_of_plot` varchar(180) DEFAULT NULL,
  `entrance_width` varchar(180) DEFAULT NULL,
  `ceiling_height` varchar(180) DEFAULT NULL,
  `builtup_area` varchar(180) DEFAULT NULL,
  `plot_area` varchar(180) DEFAULT NULL,
  `terrace` varchar(180) DEFAULT NULL,
  `construction_area` varchar(180) DEFAULT NULL,
  `terrace_carpet_area` varchar(180) DEFAULT NULL,
  `terrace_salable_area` varchar(180) DEFAULT NULL,
  `total_units_in_project` varchar(180) DEFAULT NULL,
  `total_no_of_floor` varchar(180) DEFAULT NULL,
  `total_units_in_tower` varchar(180) DEFAULT NULL,
  `property_on_floors` varchar(180) DEFAULT NULL,
  `no_of_elavators` varchar(180) DEFAULT NULL,
  `no_of_balcony` varchar(180) DEFAULT NULL,
  `total_no_of_units` varchar(180) DEFAULT NULL,
  `no_of_room` varchar(180) DEFAULT NULL,
  `no_of_bathrooms` varchar(180) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `no_of_floors_allowed` varchar(180) DEFAULT NULL,
  `no_of_side_open` varchar(180) DEFAULT NULL,
  `service_elavator` varchar(180) DEFAULT NULL,
  `servant_room` varchar(180) DEFAULT NULL,
  `hot_property` varchar(180) DEFAULT NULL,
  `is_favourite` varchar(180) DEFAULT NULL,
  `front_road_width` varchar(180) DEFAULT NULL,
  `construction_allowed_for` varchar(180) DEFAULT NULL,
  `fsi` varchar(180) DEFAULT NULL,
  `no_of_borewell` varchar(180) DEFAULT NULL,
  `fourwheller_parking` varchar(180) DEFAULT NULL,
  `twowheeler_parking` varchar(180) DEFAULT NULL,
  `is_pre_leased` varchar(180) DEFAULT NULL,
  `pre_leased_remarks` varchar(180) DEFAULT NULL,
  `Property_priority` varchar(180) DEFAULT NULL,
  `source_of_property` varchar(180) DEFAULT NULL,
  `property_source_refrence` varchar(180) DEFAULT NULL,
  `availability_status` varchar(180) DEFAULT NULL,
  `propertyage` varchar(180) DEFAULT NULL,
  `available_from` varchar(180) DEFAULT NULL,
  `amenities` varchar(180) DEFAULT NULL,
  `other_industrial_fields` text DEFAULT NULL,
  `two_road_corner` varchar(180) DEFAULT NULL,
  `unit_details` text DEFAULT NULL,
  `survey_number` varchar(180) DEFAULT NULL,
  `survey_plot_size` varchar(180) DEFAULT NULL,
  `survey_price` varchar(180) DEFAULT NULL,
  `tp_number` varchar(180) DEFAULT NULL,
  `fp_number` varchar(180) DEFAULT NULL,
  `fp_plot_size` varchar(180) DEFAULT NULL,
  `fp_plot_price` varchar(180) DEFAULT NULL,
  `owner_is` varchar(180) DEFAULT NULL,
  `owner_name` varchar(180) DEFAULT NULL,
  `owner_contact` varchar(180) DEFAULT NULL,
  `owner_email` varchar(180) DEFAULT NULL,
  `owner_nri` varchar(180) DEFAULT NULL,
  `contact_details` text DEFAULT NULL,
  `care_taker_name` varchar(180) DEFAULT NULL,
  `care_taker_contact` varchar(180) DEFAULT NULL,
  `key_available_at` varchar(180) DEFAULT NULL,
  `conference_room` varchar(180) DEFAULT NULL,
  `reception_area` varchar(180) DEFAULT NULL,
  `pantry_type` varchar(180) DEFAULT NULL,
  `added_by` varchar(180) DEFAULT NULL,
  `washrooms2_type` varchar(11) DEFAULT NULL,
  `status` varchar(11) DEFAULT '1',
  `configuration` varchar(180) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `is_terrace` varchar(180) DEFAULT NULL,
  `other_name` varchar(200) DEFAULT NULL,
  `other_contact` varchar(200) DEFAULT NULL,
  `position` varchar(200) DEFAULT NULL,
  `other_contact_details` text DEFAULT NULL,
  `prop_status` int(4) DEFAULT NULL,
  `construction_documents` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `property_for`, `property_type`, `property_category`, `office_type`, `retail_type`, `storage_type`, `plot_type`, `flat_type`, `project_id`, `state_id`, `city_id`, `locality_id`, `address`, `location_link`, `district_id`, `taluka_id`, `village_id`, `zone_id`, `constructed_carpet_area`, `constructed_salable_area`, `constructed_builtup_area`, `salable_plot_area`, `carpet_plot_area`, `salable_area`, `carpet_area`, `storage_centre_height`, `length_of_plot`, `width_of_plot`, `entrance_width`, `ceiling_height`, `builtup_area`, `plot_area`, `terrace`, `construction_area`, `terrace_carpet_area`, `terrace_salable_area`, `total_units_in_project`, `total_no_of_floor`, `total_units_in_tower`, `property_on_floors`, `no_of_elavators`, `no_of_balcony`, `total_no_of_units`, `no_of_room`, `no_of_bathrooms`, `created_at`, `updated_at`, `deleted_at`, `no_of_floors_allowed`, `no_of_side_open`, `service_elavator`, `servant_room`, `hot_property`, `is_favourite`, `front_road_width`, `construction_allowed_for`, `fsi`, `no_of_borewell`, `fourwheller_parking`, `twowheeler_parking`, `is_pre_leased`, `pre_leased_remarks`, `Property_priority`, `source_of_property`, `property_source_refrence`, `availability_status`, `propertyage`, `available_from`, `amenities`, `other_industrial_fields`, `two_road_corner`, `unit_details`, `survey_number`, `survey_plot_size`, `survey_price`, `tp_number`, `fp_number`, `fp_plot_size`, `fp_plot_price`, `owner_is`, `owner_name`, `owner_contact`, `owner_email`, `owner_nri`, `contact_details`, `care_taker_name`, `care_taker_contact`, `key_available_at`, `conference_room`, `reception_area`, `pantry_type`, `added_by`, `washrooms2_type`, `status`, `configuration`, `remarks`, `is_terrace`, `other_name`, `other_contact`, `position`, `other_contact_details`, `prop_status`, `construction_documents`) VALUES
(1, 39, 'Both', '87', '255', NULL, NULL, NULL, NULL, NULL, '1', '4', NULL, '9', 'Near sachin tower', 'ahmd', NULL, NULL, NULL, NULL, '2000_-||-_117', '1000_-||-_117', '3000_-||-_117', '5000_-||-_117', '4000_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_null', '_-||-_null', '_-||-_117', '_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, '2', '2', NULL, '2', '2023-08-30 10:24:59', '2023-09-16 18:49:30', NULL, NULL, '2', '0', '1', '1', '1', '_-||-_ft', NULL, NULL, NULL, '2', NULL, '0', NULL, '90', '103', NULL, '1', '3', NULL, '[1,1,0,0,1,1,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"001\",\"Available\",\"\",\"20,000\",\"1,00,000\",\"3,00,000\",\"4,00,000\",\"106\",[\"1\",\"0\",\"1\",\"0\",\"1\",\"0\",\"0\",\"0\"],[1,0,0,0,1,0,0,0,0,0]],[\"\",\"222\",\"Available\",\"\",\"8,00,000\",\"2,00,000\",\"7,00,000\",\"9,00,000\",\"108\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]],[\"\",\"333\",\"Available\",\"\",\"3,24,23,423\",\"2,13,131\",\"2,13,13,12,313\",\"2,13,15,25,444\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'Rutvij', '123131312', NULL, '1', '[]', NULL, NULL, 'Owner', NULL, NULL, NULL, '39', NULL, '1', '14', 'vila', '0', 'aqew,qweqe', '1231313,213131313', 'qeqw,qqew', '[[\"aqew\",\"1231313\",\"qeqw\"],[\"qweqe\",\"213131313\",\"qqew\"]]', 0, NULL),
(7, 39, 'Rent', '87', '255', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-03 01:16:40', '2023-09-03 01:16:40', NULL, NULL, NULL, '0', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, NULL, NULL, NULL, NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', NULL, NULL, '0', '', '', '', '[]', NULL, NULL),
(8, 39, 'Rent', '87', '255', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-03 01:18:39', '2023-09-03 01:18:39', NULL, NULL, NULL, '0', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, NULL, NULL, NULL, NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', NULL, NULL, '0', '', '', '', '[]', NULL, NULL),
(16, 39, 'Rent', '85', '262', NULL, NULL, NULL, NULL, NULL, NULL, '4', '1', '8', 'xX', NULL, NULL, NULL, NULL, '230', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '100_-||-_ft', '500_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-06 12:48:15', '2023-09-18 04:52:56', '2023-09-18 04:52:56', '2', NULL, '0', '0', '0', '0', '2_-||-_ft', 'industrial', '213', NULL, NULL, NULL, '0', NULL, '91', '104', 'das', NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', '1122', '3500_-||-_45', '7,00,000', '123123', '2313112', '4500_-||-_45', '9,00,000', '110', 'sadada', '213123131', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '10', 'das ji', '0', 'asdsad', '213123', 'manager', '[[\"asdsad\",\"213123\",\"manager\"]]', NULL, NULL),
(21, 39, 'Rent', '85', '261', NULL, NULL, NULL, NULL, NULL, '6', '4', '1', '8', 'ahmedabad', 'asdd', NULL, NULL, NULL, NULL, '32_-||-_117', '1000_-||-_117', '_-||-_117', '3242_-||-_117', '23_-||-_117', '_-||-_117', '_-||-_117', '23_-||-_ft', '_-||-_null', '_-||-_null', '_-||-_117', '_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-07 06:01:11', '2023-09-10 03:06:34', NULL, NULL, NULL, '0', '0', '1', '0', '2_-||-_ft', NULL, NULL, NULL, '3', NULL, '1', 'sadad', '17', '103', NULL, '1', '3', NULL, '[0,0,0,0,0,0,0,0]', '[[1,1,1,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"1\",\"213\",\"Available\",\"\",\"2,13,12,312\",\"\",\"\",\"\",\"\",[],[]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '111', 'qweq', '2131231', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '20', 'storage cold streo', '0', 'asad,test', '2131312313,1231321311', 'aas,', '[[\"asad\",\"2131312313\",\"aas\"],[\"test\",\"1231321311\",\"\"]]', NULL, NULL),
(22, 8, 'Rent', '87', '255', NULL, NULL, NULL, NULL, NULL, '7', NULL, NULL, NULL, 'dsas', 'wq', NULL, NULL, NULL, NULL, '_-||-_118', '1000_-||-_118', '_-||-_118', '5000_-||-_118', '7000_-||-_118', '_-||-_118', '_-||-_118', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_118', '_-||-_null', '_-||-_118', '_-||-_118', 'undefined_-||-_undefined', '_-||-_118', '_-||-_118', '_-||-_118', NULL, NULL, NULL, NULL, NULL, '2', '2', NULL, '2', '2023-09-07 22:30:45', '2023-09-07 22:30:45', NULL, NULL, '2', '0', '0', '0', '0', '_-||-_null', NULL, NULL, NULL, '2', NULL, '0', NULL, '91', '103', NULL, '1', '2', NULL, '[0,0,0,0,1,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"11\",\"Available\",\"\",\"5,00,000\",\"\",\"\",\"\",\"107\",[\"1\",\"0\",\"1\",\"0\",\"0\",\"0\",\"0\",\"0\"],[1,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_118', NULL, NULL, NULL, '_-||-_118', NULL, '110', 'qda', '123123123', NULL, '0', '[]', NULL, NULL, 'Owner', NULL, NULL, NULL, '49', NULL, '1', '14', 'villa', '0', 'aasd', '232312312', 'sdad', '[[\"aasd\",\"232312312\",\"sdad\"]]', NULL, NULL),
(23, 39, 'Rent', '85', '262', NULL, NULL, NULL, NULL, NULL, NULL, '4', '1', '8', 'adad', NULL, '2', '2', '3', '231', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '12_-||-_null', '23_-||-_null', '_-||-_117', '_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-08 11:56:30', '2023-09-15 12:43:15', NULL, '12', NULL, '0', '0', '0', '0', '12_-||-_ft', 'commercial', '1231', '1', NULL, NULL, '0', NULL, '91', '103', NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', '21313', '12313_-||-_45', '12,31,233', '213123', '23123232', '213123_-||-_45', '3,42,342', '110', 'weqeqe', '2312312', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '10', 'wewqeq', '0', 'wqeqe', '2131313', 'wqeqeq', '[[\"wqeqe\",\"2131313\",\"wqeqeq\"]]', 1, NULL),
(24, 39, 'Rent', '87', '257', NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, '1', 'qwe', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-08 12:21:16', '2023-09-10 03:33:43', '2023-09-10 03:33:43', NULL, NULL, '0', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, NULL, NULL, NULL, NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '14', 'farm', '0', '', '', '', '[]', NULL, NULL),
(25, 39, 'Rent', '85', '262', NULL, NULL, NULL, NULL, NULL, NULL, '4', '1', '8', NULL, NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-08 12:21:58', '2023-09-10 02:55:20', '2023-09-10 02:55:20', NULL, NULL, '0', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, NULL, NULL, NULL, NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '11', 'landplot', '0', 'asdas', '', '', '[[\"asdas\",\"\",\"\"]]', NULL, NULL),
(26, 39, 'Rent', '87', '255', NULL, NULL, NULL, NULL, NULL, '1', '8', '3', '24', 'Near sachin tower', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '2000_-||-_117', '_-||-_117', '4000_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_null', '_-||-_null', '_-||-_117', '_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-10 03:48:59', '2023-10-06 17:44:23', NULL, NULL, NULL, '0', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '0', NULL, '90', '103', NULL, '1', '2', NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"123`\",\"Available\",\"\",\"4,00,000\",\"\",\"\",\"\",\"108\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]],[\"\",\"67\",\"Available\",\"\",\"50,000\",\"\",\"\",\"\",\"107\",[\"0\",\"1\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]],[\"\",\"333\",\"Available\",\"\",\"21,31,313\",\"\",\"\",\"\",\"108\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', NULL, NULL, NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '15', 'vila', '0', '', '', 'fsdf', '[[\"\",\"\",\"fsdf\"]]', 0, NULL),
(27, 39, 'Rent', '85', '261', NULL, NULL, NULL, NULL, NULL, '2', '4', '1', '8', 'qwe', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '1231_-||-_117', '_-||-_117', '23213_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '21_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-11 11:55:04', '2023-09-11 11:55:04', NULL, NULL, NULL, '0', '0', '0', '0', '21_-||-_ft', NULL, NULL, NULL, '2', '2', '0', NULL, '90', '103', NULL, '1', '2', NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,1,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"23\",\"232\",\"Available\",\"\",\"32,424\",\"\",\"\",\"\",\"\",[],[]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'sfsd', '2342', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '9', 'sadasdasd', '0', 'dasd', '23223', 'wda', '[[\"dasd\",\"23223\",\"wda\"]]', NULL, NULL),
(28, 39, 'Rent', '87', '256', NULL, NULL, NULL, NULL, NULL, '6', '4', '1', '8', 'ahmedabad', NULL, NULL, NULL, NULL, '230', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '23_-||-_ft', '213_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, '2023-09-11 12:01:45', '2023-09-17 04:40:58', '2023-09-17 04:40:58', '2', '2', '0', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '0', NULL, '17', '103', NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"123\",\"Available\",\"\",\"23,13,123\",\"\",\"\",\"\",\"\",[],[]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'ASDDS', '231313', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', NULL, 'DADA', '0', 'ADAS', '231231', 'ADAS', '[[\"ADAS\",\"231231\",\"ADAS\"]]', NULL, NULL),
(29, 39, 'Rent', '87', '254', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, 'adsa', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-11 22:06:05', '2023-09-13 11:23:04', '2023-09-13 11:23:04', NULL, NULL, '0', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, NULL, NULL, NULL, NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '13', NULL, '0', '', '', '', '[]', NULL, NULL),
(30, 39, 'Rent', '87', '255', NULL, NULL, NULL, NULL, NULL, '8', '4', '1', NULL, 'dasd', 'qweqwe', NULL, NULL, NULL, NULL, '_-||-_117', '1231_-||-_117', '_-||-_117', '2313_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, '2', '2', NULL, '2', '2023-09-15 11:41:55', '2023-09-15 11:49:37', NULL, NULL, '2', '0', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, '2', NULL, '0', NULL, '92', '103', NULL, '1', '2', NULL, '[1,0,0,0,1,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"123\",\"Available\",\"\",\"2,33,21,312\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'qweqw', '321313', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '15', 'villa', '0', 'qweqe', '31221123', '', '[[\"qweqe\",\"31221123\",\"\"]]', 0, NULL),
(31, 39, 'Rent', '85', '259', NULL, NULL, NULL, NULL, NULL, '3', '4', '1', NULL, 'adsa', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '123_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '1', '1', '1', '1', '1', NULL, NULL, NULL, NULL, '2023-09-15 11:53:04', '2023-10-06 17:44:12', NULL, NULL, NULL, '0', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, '2', '32', '0', NULL, '91', '103', NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"23\",\"1231\",\"Available\",\"\",\"2,31,312\",\"\",\"\",\"\",\"\",[\"\",\"\",\"\"],[0,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'asda', '21313132', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', '1', '1', '1', 'sad', '0', 'asdad', '231231231', 'adsa', '[[\"asdad\",\"231231231\",\"adsa\"]]', 0, NULL),
(32, 39, 'Rent', '85', '262', NULL, NULL, NULL, NULL, NULL, NULL, '4', '1', NULL, NULL, NULL, NULL, NULL, NULL, '230', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '40_-||-_ft', '60_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-15 23:57:54', '2023-09-18 04:52:54', '2023-09-18 04:52:54', '12', NULL, '0', '0', '0', '0', '23_-||-_ft', 'industrial', '234234', NULL, NULL, NULL, '0', NULL, '91', '104', 'sad', NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', '234242', '3242_-||-_45', '32,43,24,242', '2342423', '324243', '342_-||-_45', '3,24,24,242', NULL, 'dd', '21312313', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '10', 'sadas', '0', 'weqeq', '2131313', 'ssa', '[[\"weqeq\",\"2131313\",\"ssa\"]]', NULL, NULL),
(33, 39, 'Rent', '87', '255', NULL, NULL, NULL, NULL, NULL, '5', '4', '1', '8', 'ewq', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '213123_-||-_117', '_-||-_117', '23232_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, '2', '2', NULL, '2', '2023-09-16 18:45:43', '2023-09-16 18:45:43', NULL, NULL, '2', '0', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, '2', NULL, '0', NULL, '17', '103', NULL, '1', '2', NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"2313\",\"Available\",\"\",\"2,32,323\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'asdad', '231312321', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '14', 'asdsa', '0', 'sadad', '231313123', 'asdasdd', '[[\"sadad\",\"231313123\",\"asdasdd\"]]', NULL, NULL),
(34, 39, 'Rent', '85', '259', NULL, NULL, NULL, NULL, NULL, '2', '7', '1', '4', NULL, 'https://www.google.com/', NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '2000_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '3', '3', '3', '3', '3', NULL, NULL, NULL, NULL, '2023-09-17 04:12:26', '2023-09-17 04:12:26', NULL, NULL, NULL, '0', '0', '1', '0', '_-||-_ft', NULL, NULL, NULL, '44', '4', '0', NULL, '17', '103', NULL, '1', '2', NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"232\",\"234242\",\"Available\",\"\",\"89,999\",\"\",\"\",\"\",\"106\",[\"4\",\"4\",\"4\"],[1,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'dsfsfsf', '2323232', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', '1', '1', '1', 'asffs', '0', 'fhsjkfhk', '3223234324', 'sjs', '[[\"fhsjkfhk\",\"3223234324\",\"sjs\"]]', NULL, NULL),
(35, 39, 'Rent', '85', '260', NULL, NULL, NULL, NULL, NULL, '2', '7', '1', '6', NULL, NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '3000_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '50_-||-_118', '40_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '4', '4', '4', NULL, '4', NULL, NULL, NULL, NULL, '2023-09-17 04:14:07', '2023-09-17 04:14:07', NULL, NULL, NULL, '1', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, '3', '3', '0', NULL, '90', '103', NULL, '1', '2', NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '1', '[[\"2\",\"343\",\"Available\",\"\",\"9,99,999\",\"\",\"\",\"\",\"106\",[],[]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, NULL, 'dfsdfsdf', '232423423', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', '1', '1', '4', 'sdsf', '0', 'sdfsf', '23423423', 'ddfdf', '[[\"sdfsf\",\"23423423\",\"ddfdf\"]]', NULL, NULL),
(36, 39, 'Rent', '85', '260', NULL, NULL, NULL, NULL, NULL, '3', '7', '1', '33', NULL, NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '4000_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '70_-||-_118', '90_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '2', '2', '2', NULL, '4', NULL, NULL, NULL, NULL, '2023-09-17 04:17:16', '2023-09-17 04:17:16', NULL, NULL, NULL, '0', '0', '0', '1', '_-||-_ft', NULL, NULL, NULL, '23', '2', '0', NULL, '90', '103', NULL, '1', '3', NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '1', '[[\"45\",\"343\",\"Available\",\"\",\"7,00,000\",\"\",\"\",\"\",\"106\",[],[]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'dfdgdf', '23423424', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', '1', '1', '3', 'sfds', '0', 'ewrwrwr', '23423424', 'fsds', '[[\"ewrwrwr\",\"23423424\",\"fsds\"]]', NULL, NULL),
(37, 39, 'Both', '87', '254', NULL, NULL, NULL, NULL, NULL, '1', '7', '1', '10', NULL, 'ahmedabad', NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '3000_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '5000_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '3000_-||-_117', '4', '4', '4', '4', '4', NULL, NULL, NULL, '4', '2023-09-17 04:22:33', '2023-09-17 04:22:33', NULL, NULL, NULL, '0', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, '5', '3', '0', NULL, '90', '103', NULL, '0', NULL, '4 years', '[0,1,0,0,0,1,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"23\",\"232\",\"Available\",\"7,78,878\",\"78,79,879\",\"\",\"\",\"\",\"106\",[\"1\",\"0\",\"1\",\"0\",\"1\",\"0\",\"0\",\"0\"],[0,0,0,0,1,0,0,0,1,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'erwer', '3424234', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '14', 'sadada', '1', 'dsdfsd', '2432342', 'fsdff', '[[\"dsdfsd\",\"2432342\",\"fsdff\"]]', NULL, NULL),
(38, 39, 'Both', '85', '261', NULL, NULL, NULL, NULL, NULL, '31', '7', '1', '33', 'kjhvggujsixhgayguiop', 'testere', NULL, NULL, NULL, NULL, '_-||-_117', '4000_-||-_117', '_-||-_117', '6000_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '90_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-17 04:29:12', '2023-09-17 04:29:12', NULL, NULL, NULL, '0', '0', '0', '1', '213_-||-_ft', NULL, NULL, NULL, '2', '2', '0', NULL, '91', '103', NULL, '1', '2', NULL, '[0,0,0,0,0,0,0,0]', '[[1,1,1,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"232\",\"332\",\"Available\",\"\",\"8,00,000\",\"23,12,332\",\"32,42,423\",\"55,54,755\",\"\",[],[]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'dasdas', '322323432', 'fdsf@mail.com', '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '7', 'fsdfs', '0', 'ddgfg', '434242', 'lkjlk', '[[\"ddgfg\",\"434242\",\"lkjlk\"]]', NULL, NULL),
(39, 39, 'Sell', '85', '261', NULL, NULL, NULL, NULL, NULL, '6', '7', '1', '5', 'sdasd', 'navarangpura', NULL, NULL, NULL, NULL, '_-||-_117', '3000_-||-_117', '_-||-_117', '6000_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '90_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-17 04:30:58', '2023-09-17 04:30:58', NULL, NULL, NULL, '0', '0', '1', '0', '23_-||-_ft', NULL, NULL, NULL, '3', '3', '0', NULL, '91', '103', NULL, '1', '4', NULL, '[0,0,0,0,0,0,0,0]', '[[0,1,0,1,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"341\",\"345353\",\"Available\",\"\",\"\",\"5,353\",\"34,53,535\",\"34,58,888\",\"\",[],[]],[\"333\",\"34324\",\"Available\",\"\",\"\",\"34,234\",\"32,42,422\",\"32,76,656\",\"\",[],[]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'gjfj', '478236846', NULL, '0', '[]', NULL, NULL, 'Owner', NULL, NULL, NULL, '39', NULL, '1', '8', 'ewqeqw', '0', 'sfksjfkj E', '423749287', 'sdfskj', '[[\"sfksjfkj E\",\"423749287\",\"sdfskj\"]]', NULL, NULL),
(40, 39, 'Both', '87', '256', NULL, NULL, NULL, NULL, NULL, '7', '7', '1', '4', 'sadasd', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '3000_-||-_117', '_-||-_117', '_-||-_ft', '43_-||-_ft', '78_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, '2023-09-17 04:37:35', '2023-09-18 04:52:51', '2023-09-18 04:52:51', '4', '4', '0', '0', '1', '1', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '1', '34', '90', '103', NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"234\",\"Available\",\"78,979\",\"2,34,242\",\"\",\"\",\"\",\"\",[],[]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '112', 'sdfsf', '232324', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', NULL, 'sfsf', '0', 'dfjskl', '423746', 'jhkjs', '[[\"dfjskl\",\"423746\",\"jhkjs\"]]', NULL, NULL),
(41, 39, 'Rent', '85', '262', NULL, NULL, NULL, NULL, NULL, NULL, '7', '1', '8', NULL, NULL, '2', '2', '3', '335', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '23_-||-_null', '43_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', 'undefined_-||-_undefined', '_-||-_null', '_-||-_null', '_-||-_null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-17 04:39:58', '2023-09-17 04:40:37', NULL, '4', NULL, '0', '0', '1', '0', '23_-||-_null', 'commercial', '2342342', NULL, NULL, NULL, '0', NULL, '17', '103', NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', '3242342', '2342342_-||-_46', '34,53,535', '234242', '234242', '3242_-||-_46', '24,242', '110', 'sdhfushf', '234623784', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '10', 'sdfd', '0', 'sdfhsjkfh', '2348287', 'fhskjfh', '[[\"sdfhsjkfh\",\"2348287\",\"fhskjfh\"]]', NULL, NULL),
(42, 39, 'Sell', '87', '254', NULL, NULL, NULL, NULL, NULL, '4', '7', '1', '33', 'weqw', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '324_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '232_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '5', '5', '5', '5', '5', NULL, NULL, NULL, '5', '2023-09-17 04:43:11', '2023-09-17 15:34:21', '2023-09-17 15:34:21', NULL, NULL, '1', '1', '1', '1', '_-||-_ft', NULL, NULL, NULL, '4', '3', '1', 'dsjfsj', '17', '103', NULL, '0', NULL, '3years', '[0,1,0,1,1,0,1,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"67\",\"231\",\"Available\",\"3,24,242\",\"\",\"\",\"\",\"\",\"106\",[\"1\",\"0\",\"1\",\"0\",\"1\",\"0\",\"1\",\"0\"],[1,0,0,0,1,1,0,0,0,1]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'wreegwqeu', '236267567', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '15', 'sadsadj', '0', 'adsada', '32426452', 'dshdh', '[[\"adsada\",\"32426452\",\"dshdh\"]]', NULL, NULL),
(43, 39, 'Both', '87', '257', NULL, NULL, NULL, NULL, NULL, '2', '7', '1', '4', NULL, 'rhw', NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '23299_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '23_-||-_117', '3', '3', '3', '3', '3', '3', NULL, NULL, '3', '2023-09-17 04:48:28', '2023-09-17 04:48:28', NULL, NULL, NULL, '1', '1', '1', '1', '_-||-_ft', NULL, NULL, NULL, '2', '2', '1', 'sdsad', '92', '103', NULL, '0', NULL, '3yesr', '[0,0,0,1,0,0,0,1]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"22\",\"123\",\"Available\",\"\",\"30,000\",\"2,13,323\",\"2,31,31,312\",\"2,33,44,635\",\"106\",[\"1\",\"0\",\"1\",\"0\",\"1\",\"0\",\"1\",\"0\"],[1,1,0,0,1,1,0,0,0,0]],[\"33\",\"343\",\"Available\",\"\",\"32,424\",\"23,232\",\"23,232\",\"46,464\",\"106\",[\"1\",\"0\",\"1\",\"0\",\"1\",\"0\",\"0\",\"0\"],[1,0,0,0,1,0,0,0,0,0]],[\"44\",\"3242\",\"Available\",\"\",\"32,424\",\"232\",\"23,243\",\"23,475\",\"108\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'sdfsdfjh', '32472642634', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '15', 'sauah', '0', 'fsdff', '342424', 'fsfsd', '[[\"fsdff\",\"342424\",\"fsfsd\"]]', NULL, NULL),
(44, 39, 'Both', '87', '258', NULL, NULL, NULL, NULL, NULL, '23', '7', '1', '33', 'kjhgfdxfghjk,', 'asdsad', '2', '2', '3', '230', '2324_-||-_117', '123131_-||-_117', '34242_-||-_117', '23323_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, '2', '2', '2', '2', '2023-09-17 04:51:56', '2023-10-06 17:52:17', NULL, NULL, '2', '0', '1', '1', '1', '_-||-_ft', NULL, NULL, NULL, '2', NULL, '1', 'sfds', '17', '105', NULL, '1', '2', NULL, '[1,1,0,0,1,1,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"111\",\"Available\",\"\",\"2,32,424\",\"23,242\",\"32,23,424\",\"32,46,666\",\"106\",[\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\"],[1,1,1,1,1,1,1,1,1,1]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '111', 'dsafjhj', '26354623547', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', NULL, 'dsfsdfsd', '0', 'sdfhkjsh', '643726487', 'dsf', '[[\"sdfhkjsh\",\"643726487\",\"dsf\"]]', 1, NULL),
(45, 39, 'Both', '85', '259', NULL, NULL, NULL, NULL, NULL, '2', '7', '1', '10', NULL, 'asdad', NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '2323_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '2', '2', '2', '2', '2', NULL, NULL, NULL, NULL, '2023-09-17 04:55:30', '2023-09-17 15:11:24', NULL, NULL, NULL, '1', '0', '1', '0', '_-||-_ft', NULL, NULL, NULL, '3', '3', '1', 'dsfsf', '17', '103', NULL, '0', NULL, '20yesr', '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"1001\",\"23423424\",\"Rent Out\",\"2,32,13,12,321\",\"3,45,43,535\",\"\",\"\",\"\",\"106\",[\"2\",\"2\",\"2\"],[1,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'fsjfhkj', '23246567523', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', '3', '1', '2', 'fsdf', '0', 'sdbhjh', '234234', 'jdsjj', '[[\"sdbhjh\",\"234234\",\"jdsjj\"]]', NULL, NULL),
(46, 39, 'Sell', '87', '255', NULL, NULL, NULL, NULL, NULL, '34', '7', '1', '8', NULL, NULL, NULL, NULL, NULL, NULL, '300_-||-_117', '1000_-||-_117', '4000_-||-_117', '5000_-||-_117', '4500_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, '2', '2', NULL, '2', '2023-09-17 06:58:32', '2023-09-17 15:50:35', '2023-09-17 15:50:35', NULL, '2', '0', '1', '1', '1', '_-||-_ft', NULL, NULL, NULL, '2', NULL, '0', NULL, '17', '103', NULL, '1', '2', NULL, '[1,1,0,0,1,1,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"222\",\"Available\",\"\",\"\",\"34,52,326\",\"3,242\",\"34,55,568\",\"106\",[\"1\",\"0\",\"1\",\"0\",\"1\",\"0\",\"1\",\"0\"],[1,0,0,0,1,0,0,0,0,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '112', 'sadas', '3423465', NULL, '0', '[]', NULL, NULL, 'Owner', NULL, NULL, NULL, '39', NULL, '1', '14', 'sadas', '0', 'vcxxvas,qwewq', '234324324,232424233', 'manager,sales', '[[\"vcxxvas\",\"234324324\",\"manager\"],[\"qwewq\",\"232424233\",\"sales\"]]', NULL, NULL),
(47, 39, 'Rent', '85', '260', NULL, NULL, NULL, NULL, NULL, '24', '7', '1', '4', 'kfdsawsertfgyhujikl', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '3000_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '50_-||-_118', '34_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '2', '3', '2', NULL, '3', NULL, NULL, NULL, NULL, '2023-09-17 07:02:16', '2023-09-17 07:02:16', NULL, NULL, NULL, '1', '0', '1', '1', '_-||-_ft', NULL, NULL, NULL, '2', '2', '1', 'weawwqw', '90', '103', NULL, '0', NULL, '3year', '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '1', '[[\"111\",\"1011\",\"Available\",\"\",\"23,42,443\",\"\",\"\",\"\",\"106\",[],[]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '111', 'test', '23132111', 'tst@mail.com', '0', '[]', NULL, NULL, 'Owner', NULL, NULL, NULL, '39', '3', '1', '6', 'dfssd', '0', 'wqeeq', '123213111', 'maneger', '[[\"wqeeq\",\"123213111\",\"maneger\"]]', NULL, NULL),
(48, 39, 'Rent', '85', '261', NULL, NULL, NULL, NULL, NULL, '35', '7', '1', '4', NULL, NULL, NULL, NULL, NULL, NULL, '_-||-_117', '3000_-||-_117', '_-||-_117', '5000_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '23_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-17 07:05:18', '2023-09-17 07:05:18', NULL, NULL, NULL, '0', '0', '1', '1', '23_-||-_ft', NULL, NULL, NULL, '2', '2', '1', 'daasd', '90', '103', NULL, '1', '4', NULL, '[0,0,0,0,0,0,0,0]', '[[1,1,1,1,1],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"221\",\"2022\",\"Available\",\"\",\"78,99,999\",\"\",\"\",\"\",\"\",[],[]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '111', 'test', '12312313212', 'test@mqil.com', '1', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '9', 'test', '0', 'testtt', '1231231312', 'mnager', '[[\"testtt\",\"1231231312\",\"mnager\"]]', NULL, NULL),
(49, 39, 'Both', '87', '258', NULL, NULL, NULL, NULL, NULL, '32', '7', '1', '33', NULL, NULL, '2', '2', '3', '230', '_-||-_117', '1000_-||-_117', '_-||-_117', '4000_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, '2', '2', '2', '2', '2023-09-17 15:52:15', '2023-09-17 15:52:15', NULL, NULL, '2', '0', '1', '1', '0', '_-||-_ft', NULL, NULL, NULL, '3', NULL, '0', NULL, '90', '103', NULL, '1', '3', NULL, '[1,1,0,0,1,1,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"111\",\"Available\",\"\",\"30,000\",\"22,333\",\"23,32,232\",\"23,54,565\",\"106\",[\"1\",\"0\",\"1\",\"0\",\"1\",\"0\",\"1\",\"0\"],[1,0,0,0,1,0,0,0,1,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'asddsf', '21321313', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', NULL, 'sdasda', '0', 'safsfsdfsd', '2324234243', 'man', '[[\"safsfsdfsd\",\"2324234243\",\"man\"]]', NULL, NULL),
(50, 39, 'Rent', '87', '258', NULL, NULL, NULL, NULL, NULL, '16', '7', '1', '33', NULL, NULL, '2', '2', '3', '231', '_-||-_117', '2000_-||-_117', '_-||-_117', '6000_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, '4', '3', '2', '1', '2023-09-17 15:53:57', '2023-09-17 15:53:57', NULL, NULL, '2', '0', '1', '0', '0', '_-||-_ft', NULL, NULL, NULL, '2', NULL, '0', NULL, '91', '103', NULL, '1', '2', NULL, '[1,1,0,0,1,1,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"1211\",\"Available\",\"\",\"32,42,433\",\"\",\"\",\"\",\"106\",[\"0\",\"0\",\"1\",\"0\",\"0\",\"0\",\"1\",\"0\"],[1,0,0,0,1,0,0,0,1,0]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '111', 'yuiyiu', '2323442323', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', NULL, 'sdas', '0', 'kjhkj', '2323423423', 'man', '[[\"kjhkj\",\"2323423423\",\"man\"]]', NULL, NULL),
(51, 39, 'Rent', '85', '259', NULL, NULL, NULL, NULL, NULL, '12', '7', '1', '6', NULL, 'testtt', NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '3000_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '2', '2', '2', '21', '1', NULL, NULL, NULL, NULL, '2023-09-17 15:56:33', '2023-09-17 15:56:33', NULL, NULL, NULL, '0', '0', '1', '1', '_-||-_ft', NULL, NULL, NULL, '2', '2', '1', '2yet', '91', '103', NULL, '0', NULL, '5yeasr', '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"222\",\"111\",\"Available\",\"\",\"23,21,333\",\"\",\"\",\"\",\"106\",[\"2\",\"2\",\"1\"],[1,1]]]', NULL, '_-||-_45', NULL, NULL, NULL, '_-||-_45', NULL, '110', 'testtt', '233234234', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', '2', '1', '2', 'testtt', '0', 'testtw', '1231231232', 'manager', '[[\"testtw\",\"1231231232\",\"manager\"]]', NULL, NULL);
INSERT INTO `properties` (`id`, `user_id`, `property_for`, `property_type`, `property_category`, `office_type`, `retail_type`, `storage_type`, `plot_type`, `flat_type`, `project_id`, `state_id`, `city_id`, `locality_id`, `address`, `location_link`, `district_id`, `taluka_id`, `village_id`, `zone_id`, `constructed_carpet_area`, `constructed_salable_area`, `constructed_builtup_area`, `salable_plot_area`, `carpet_plot_area`, `salable_area`, `carpet_area`, `storage_centre_height`, `length_of_plot`, `width_of_plot`, `entrance_width`, `ceiling_height`, `builtup_area`, `plot_area`, `terrace`, `construction_area`, `terrace_carpet_area`, `terrace_salable_area`, `total_units_in_project`, `total_no_of_floor`, `total_units_in_tower`, `property_on_floors`, `no_of_elavators`, `no_of_balcony`, `total_no_of_units`, `no_of_room`, `no_of_bathrooms`, `created_at`, `updated_at`, `deleted_at`, `no_of_floors_allowed`, `no_of_side_open`, `service_elavator`, `servant_room`, `hot_property`, `is_favourite`, `front_road_width`, `construction_allowed_for`, `fsi`, `no_of_borewell`, `fourwheller_parking`, `twowheeler_parking`, `is_pre_leased`, `pre_leased_remarks`, `Property_priority`, `source_of_property`, `property_source_refrence`, `availability_status`, `propertyage`, `available_from`, `amenities`, `other_industrial_fields`, `two_road_corner`, `unit_details`, `survey_number`, `survey_plot_size`, `survey_price`, `tp_number`, `fp_number`, `fp_plot_size`, `fp_plot_price`, `owner_is`, `owner_name`, `owner_contact`, `owner_email`, `owner_nri`, `contact_details`, `care_taker_name`, `care_taker_contact`, `key_available_at`, `conference_room`, `reception_area`, `pantry_type`, `added_by`, `washrooms2_type`, `status`, `configuration`, `remarks`, `is_terrace`, `other_name`, `other_contact`, `position`, `other_contact_details`, `prop_status`, `construction_documents`) VALUES
(52, 39, 'Sell', '87', '254', NULL, NULL, NULL, NULL, NULL, '10', '7', '1', '4', 'borivali west, nr railway station,', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '1231_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '12313_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '2313_-||-_117', '22', '2', '2', '2', '22', NULL, NULL, NULL, '2', '2023-09-18 18:07:09', '2023-10-06 17:15:56', NULL, NULL, NULL, '1', '0', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, '2', '2', '1', 'e', '91', '104', 'wqeqe', '1', '3', NULL, '[1,1,0,0,1,1,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"123\",\"1211212\",\"Rent Out\",\"2,13,21,313\",\"\",\"\",\"\",\"\",\"106\",[\"1\",\"0\",\"1\",\"0\",\"0\",\"0\",\"0\",\"0\"],[1,0,0,0,1,0,0,0,1,1]]]', NULL, '_-||-_null', NULL, NULL, NULL, '_-||-_null', NULL, '112', 'weqw3', '324234322', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '15', 'dasdhk', '1', 'SFHFJKSDH', '2324324242', 'SALES', '[[\"SFHFJKSDH\",\"2324324242\",\"SALES\"]]', NULL, NULL),
(53, 39, 'Rent', '85', '259', NULL, NULL, NULL, NULL, NULL, '36', '7', '1', '8', 'ambli char rasta', 'https://maps.app.goo.gl/4XCTesvnSqyNR1Xv6', NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '2343_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '344', '22', '66', '15', '4', NULL, NULL, NULL, NULL, '2023-09-19 07:51:57', '2023-10-06 17:17:12', NULL, NULL, NULL, '1', '0', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, '1', 'first come', '0', NULL, NULL, NULL, NULL, '0', NULL, 'mar 24', '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"b\",\"1509\",\"Rent Out\",\"\",\"70,000\",\"\",\"\",\"\",\"108\",[\"\",\"\",\"\"],[0,0]]]', NULL, '_-||-_null', NULL, NULL, NULL, '_-||-_null', NULL, '111', 'chandrakasnt', '2422342243', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', '1', '1', '1', NULL, '0', '', '', '', '[]', NULL, NULL),
(54, 39, 'Rent', '85', '260', NULL, NULL, NULL, NULL, NULL, '37', '7', '1', '6', 'bopal chokadi', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '1200_-||-_117', '_-||-_117', '_-||-_null', '_-||-_null', '_-||-_null', '18_-||-_117', '11.5_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '44', '3', '12', NULL, '2', NULL, NULL, NULL, NULL, '2023-09-19 12:59:23', '2023-09-19 15:30:23', NULL, NULL, NULL, '1', '0', '0', '0', '_-||-_null', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '1', '4', NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"32\",\"Available\",\"\",\"3,50,000\",\"\",\"\",\"\",\"\",[],[]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '110', 'vikrant raina', '765476576', 'vikramnt@yahoo.com', '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', '1', '1', '5', NULL, '0', 'chandu', '43343333', 'mali', '[[\"chandu\",\"43343333\",\"mali\"]]', NULL, NULL),
(55, 39, 'Rent', '85', '261', NULL, NULL, NULL, NULL, NULL, '38', '8', '4', '25', 'dadar west,', 'https://maps.app.goo.gl/g7cXJMyAX7uzW5md6', NULL, NULL, NULL, NULL, '_-||-_119', '1250_-||-_119', '_-||-_119', '1800_-||-_119', '_-||-_119', '_-||-_119', '_-||-_119', '20_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_119', '_-||-_119', 'undefined_-||-_undefined', '_-||-_119', '_-||-_119', '_-||-_119', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-19 13:07:40', '2023-09-19 15:10:06', NULL, NULL, NULL, '0', '0', '0', '0', '60_-||-_null', NULL, NULL, NULL, '3', NULL, '0', NULL, '17', NULL, NULL, '1', '2', NULL, '[0,0,0,0,0,0,0,0]', '[[1,1,1,1,0],[\"available till mar 25\",\"\",\"2.5kg line \",\"1200vh\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"25\",\"Available\",\"\",\"4,00,000\",\"\",\"\",\"\",\"\",[],[]]]', NULL, '_-||-_119', NULL, NULL, NULL, '_-||-_119', NULL, '111', 'bachhan pandey', '8765434567', 'pandey@gmail.com', '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '8', NULL, '0', 'chulbul padey', '54343433', 'manager', '[[\"chulbul padey\",\"54343433\",\"manager\"]]', NULL, NULL),
(56, 39, 'Rent', '85', '262', NULL, NULL, NULL, NULL, NULL, NULL, '7', '1', '10', NULL, NULL, '5', '4', '5', '562', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '25_-||-_null', '500_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', 'undefined_-||-_undefined', '_-||-_null', '_-||-_null', '_-||-_null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-19 14:05:39', '2023-09-19 14:17:43', NULL, '14', NULL, '0', '0', '0', '1', '60_-||-_null', 'residential', '4.0', '1- 500ft', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', '443', '3500_-||-_46', '25,00,000', '9-chandkheda', '24', '_-||-_46', '0', '110', 'jayaben', '6543y6', 'jaya@bachhan.com', '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '10', 'property is on prime location', '0', 'kalubhai', '543454545', 'majur', '[[\"kalubhai\",\"543454545\",\"majur\"]]', NULL, NULL),
(57, 39, 'Rent', '87', '254', NULL, NULL, NULL, NULL, NULL, '39', '7', '1', '1', 'nr baghban pp', 'https://maps.app.goo.gl/ZRs5SRKWdJKoxgM67', NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '5322_-||-_117', '_-||-_117', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_117', '_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '500_-||-_117', '321', '21', '66', '12', '4', NULL, NULL, NULL, '6', '2023-09-19 16:11:21', '2023-09-19 16:12:47', NULL, NULL, NULL, '0', '0', '0', '0', '_-||-_null', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '1', '2', NULL, '[1,1,0,1,0,1,1,1]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"b\",\"1212\",\"Available\",\"\",\"80,500\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '110', 'kareena kappor', '24234535', 'karinak@kapoor.in', '0', '[]', NULL, NULL, 'Owner', NULL, NULL, NULL, '39', NULL, '1', '18', 'fineset prop in this area', '1', 'saif', '6543554345', 'assistant', '[[\"saif\",\"6543554345\",\"assistant\"]]', NULL, NULL),
(58, 39, 'Rent', '87', '255', NULL, NULL, NULL, NULL, NULL, '40', '8', '4', '22', 'jugaudc', NULL, NULL, NULL, NULL, NULL, '_-||-_118', '1680_-||-_118', '_-||-_118', '987_-||-_118', '_-||-_118', '_-||-_118', '_-||-_118', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_118', '_-||-_null', '_-||-_118', '_-||-_118', 'undefined_-||-_undefined', '_-||-_118', '_-||-_118', '_-||-_118', NULL, NULL, NULL, NULL, NULL, '4', '77', NULL, '2', '2023-09-19 16:51:00', '2023-09-23 18:18:59', NULL, NULL, '3', '0', '1', '0', '0', '_-||-_null', NULL, NULL, NULL, '3', NULL, '0', NULL, NULL, '103', NULL, '1', '2', NULL, '[1,1,1,1,1,1,1]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"55\",\"Available\",\"\",\"45,000\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_118', NULL, NULL, NULL, '_-||-_118', NULL, '111', 'vicky kaushal', '432323235', 'vicky@kaushal.com', '1', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '14', NULL, '0', 'kat', '658784776', 'wife', '[[\"kat\",\"658784776\",\"wife\"]]', NULL, NULL),
(59, 39, 'Sell', '87', '254', NULL, NULL, NULL, NULL, NULL, '41', '7', '1', '5', 'lake ni same', 'https://maps.app.goo.gl/1iF3EbswuRdpk4Pt5', NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '2534_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_null', '_-||-_null', '_-||-_117', '_-||-_null', '1898_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '160_-||-_117', '333', '14', '67', '12', '4', NULL, NULL, NULL, '3', '2023-09-22 05:12:31', '2023-09-23 08:50:44', NULL, NULL, NULL, '1', '0', '0', '0', '_-||-_ft', NULL, NULL, NULL, '4', 'allowed', '0', NULL, NULL, NULL, NULL, '0', NULL, 'jun 25', '[1,0,0,1,0,0,1]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"d\",\"1204\",\"Available\",\"35,50,000\",\"\",\"\",\"\",\"\",\"108\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]],[\"B\",\"1304\",\"Available\",\"32,50,000\",\"\",\"\",\"\",\"\",\"109\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[1,0,1,0,0,1,1,0,0,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '111', 'bhadresh', '23456543245', 'bhadresh@gmail.com', '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '17', NULL, '1', 'jitendra', '3434344344', 'watchman', '[[\"jitendra\",\"3434344344\",\"watchman\"]]', NULL, NULL),
(60, 39, 'Sell', '87', '255', NULL, NULL, NULL, NULL, NULL, '42', '8', '4', '26', 'borivali west', 'https://maps.app.goo.gl/HEJ3LV4cbJY8XAiU6', NULL, NULL, NULL, NULL, '_-||-_118', '980_-||-_118', '_-||-_118', '1850_-||-_118', '_-||-_118', '_-||-_118', '_-||-_118', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_118', '_-||-_null', '_-||-_118', '_-||-_118', 'undefined_-||-_undefined', '_-||-_118', '_-||-_118', '_-||-_118', NULL, NULL, NULL, NULL, NULL, '3', '88', NULL, '3', '2023-09-22 05:40:20', '2023-09-22 05:54:40', NULL, NULL, '2', '0', '1', '1', '1', '_-||-_null', NULL, NULL, NULL, '3', NULL, '0', NULL, NULL, NULL, NULL, '1', '3', NULL, '[1,0,0,0,1,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"32\",\"Available\",\"\",\"\",\"1,20,00,000\",\"2,40,00,000\",\"3,60,00,000\",\"108\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_118', NULL, NULL, NULL, '_-||-_118', NULL, '110', 'dr. nene', '4323232111', 'dr.nene@gmail.com', '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '16', NULL, '0', 'arin', '', 'care taker', '[[\"arin\",\"\",\"care taker\"]]', NULL, NULL),
(61, 39, 'Sell', '87', '256', NULL, NULL, NULL, NULL, NULL, '43', '7', '1', '7', 'scence city', NULL, NULL, NULL, NULL, NULL, '_-||-_118', '_-||-_118', '_-||-_118', '_-||-_118', '_-||-_118', '1800_-||-_118', '_-||-_118', '_-||-_null', '25_-||-_null', '60_-||-_null', '_-||-_118', '_-||-_null', '_-||-_118', '_-||-_118', 'undefined_-||-_undefined', '_-||-_118', '_-||-_118', '_-||-_118', NULL, NULL, NULL, NULL, NULL, NULL, '112', NULL, NULL, '2023-09-23 10:24:17', '2023-09-23 10:24:17', NULL, 'G+2', '2', '0', '0', '0', '0', '_-||-_null', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, '105', NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"54\",\"Available\",\"65,65,000\",\"\",\"\",\"\",\"\",\"\",[],[]]]', NULL, '_-||-_118', NULL, NULL, NULL, '_-||-_118', NULL, '111', 'ranbir kapoor', '787654356', 'ran@bir.com', '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', NULL, NULL, '0', 'aliaben', '654456654', 'hW', '[[\"aliaben\",\"654456654\",\"hW\"]]', NULL, NULL),
(62, 39, 'Sell', '87', '257', NULL, NULL, NULL, NULL, NULL, '44', '7', '1', '3', 'bapunagar', 'https://maps.app.goo.gl/V8rczqUdbQRnYsbCA', NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '3500_-||-_117', '2256_-||-_117', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '245_-||-_117', '221', '20', '77', '19', '4', '2', NULL, NULL, '3', '2023-09-23 10:31:34', '2023-10-07 18:57:08', NULL, NULL, NULL, '1', '1', '0', 'NaN', '_-||-_null', NULL, NULL, NULL, NULL, NULL, '0', NULL, '91', '103', NULL, '1', '1', NULL, '[0,1,0,0,0,0,1]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"b\",\"1901\",\"Available\",\"\",\"\",\"1,00,00,000\",\"25,00,000\",\"1,25,00,000\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '111', 'DIPIKABEN', '23332323', 'DIP@IKA.GMAIL.COM', '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '17', NULL, '0', 'ranveer', '898088989', 'vhsd', '[[\"ranveer\",\"898088989\",\"vhsd\"]]', 1, NULL),
(63, 39, 'Sell', '87', '258', NULL, NULL, NULL, NULL, NULL, NULL, '7', '1', NULL, NULL, NULL, '1', '1', '2', '559', '_-||-_120', '.2_-||-_120', '_-||-_120', '3_-||-_120', '_-||-_120', '_-||-_120', '_-||-_120', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_120', '_-||-_120', 'undefined_-||-_undefined', '_-||-_120', '_-||-_120', '_-||-_120', NULL, NULL, NULL, NULL, NULL, '2', '443', '3', '2', '2023-09-23 10:47:29', '2023-09-25 14:26:42', NULL, NULL, '1', '0', '0', '0', '0', '_-||-_null', NULL, NULL, NULL, '3', NULL, '0', NULL, NULL, NULL, NULL, '1', '2', NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"345\",\"Available\",\"\",\"\",\"45,00,000\",\"2,00,45,000\",\"2,45,45,000\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_120', NULL, NULL, NULL, '_-||-_120', NULL, '110', 'munna bhaiya', '5433433434', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', NULL, NULL, '0', 'jitu', '44343434', 'mali kaka', '[[\"jitu\",\"44343434\",\"mali kaka\"]]', NULL, NULL),
(64, 39, 'Sell', '85', '259', NULL, NULL, NULL, NULL, NULL, '46', '7', '1', '41', 'athanu', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '1500_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '676', '15', '55', '12', '4', NULL, NULL, NULL, NULL, '2023-09-23 11:44:40', '2023-10-06 17:51:21', NULL, NULL, NULL, '0', '0', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '0', NULL, '90', '104', NULL, '1', '2', NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"1221\",\"Available\",\"66,00,000\",\"\",\"\",\"\",\"\",\"\",[\"\",\"\",\"\"],[0,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, NULL, 'barot', '5343434', 'barot@gmail.com', '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', '1', '1', '1', NULL, '0', 'bachhn', '434343232', 'jebi', '[[\"bachhn\",\"434343232\",\"jebi\"]]', 1, NULL),
(65, 39, 'Sell', '85', '260', NULL, NULL, NULL, NULL, NULL, '47', '7', '5', '27', 'alka', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '2200_-||-_117', '_-||-_117', '_-||-_null', '_-||-_null', '_-||-_null', '18_-||-_117', '11_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '33', '33', '33', NULL, '3', NULL, NULL, NULL, NULL, '2023-09-23 11:54:37', '2023-09-23 11:54:37', NULL, NULL, NULL, '1', '0', '0', '0', '_-||-_null', NULL, NULL, NULL, '2', NULL, '0', NULL, NULL, NULL, NULL, '1', '3', NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '1', '[[\"\",\"13\",\"Available\",\"1,12,00,000\",\"\",\"\",\"\",\"\",\"\",[],[]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '112', 'amitabh', '3332333', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', '1', '1', '6', NULL, '0', 'bachhan', '333333', '', '[[\"bachhan\",\"333333\",\"\"]]', NULL, NULL),
(66, 39, 'Sell', '85', '261', NULL, NULL, NULL, NULL, NULL, '48', '7', '1', '33', 'bapubhupo', NULL, NULL, NULL, NULL, NULL, '_-||-_118', '800_-||-_118', '_-||-_118', '1400_-||-_118', '_-||-_118', '_-||-_118', '_-||-_118', '20_-||-_null', '_-||-_null', '_-||-_null', '_-||-_118', '_-||-_null', '_-||-_118', '_-||-_118', 'undefined_-||-_undefined', '_-||-_118', '_-||-_118', '_-||-_118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-23 12:06:39', '2023-09-23 12:06:39', NULL, NULL, NULL, '0', '0', '1', '0', '60_-||-_null', NULL, NULL, NULL, '2', '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0]', '[[0,1,0,0,0,0],[\"\",\"ec clear\",\"approaching\",\"15kva\",\"\",\"approved\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\",\"railway\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\",\"railway\"]]', '0', '[[\"\",\"44\",\"Available\",\"\",\"\",\"5,00,000\",\"40,00,000\",\"45,00,000\",\"\",[],[]]]', NULL, '_-||-_118', NULL, NULL, NULL, '_-||-_118', NULL, NULL, 'aishwarya', '65433333', 'aish@gmailc.om', '0', '[]', NULL, NULL, 'Owner', NULL, NULL, NULL, '39', NULL, '1', '20', NULL, '0', 'abhu', '4323456654', 'hw', '[[\"abhu\",\"4323456654\",\"hw\"]]', NULL, NULL),
(67, 39, 'Both', '85', '259', NULL, NULL, NULL, NULL, NULL, '49', '7', '5', '29', 'akotu', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '1284_-||-_117', '_-||-_117', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '500_-||-_117', '22', '55', '24', '22', '6', NULL, NULL, NULL, NULL, '2023-09-23 12:15:36', '2023-09-25 07:43:37', NULL, NULL, NULL, '1', '0', '1', '0', '_-||-_null', NULL, NULL, NULL, '1', NULL, '0', NULL, '17', '104', NULL, '1', '2', NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"b\",\"45\",\"Available\",\"50,00,000\",\"25,000\",\"\",\"\",\"\",\"106\",[\"\",\"\",\"\"],[0,0]],[\"b\",\"47\",\"Available\",\"30,00,000\",\"15,000\",\"\",\"\",\"\",\"\",[\"\",\"\",\"\"],[0,0]],[\"a\",\"1212\",\"Available\",\"36,00,000\",\"18,000\",\"\",\"\",\"\",\"109\",[\"\",\"\",\"\"],[0,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '111', 'nishant', '432212345', 'nishant@yahoo.com', '0', '[]', NULL, NULL, 'Owner', NULL, NULL, NULL, '39', '2', '1', '1', 'common wc', '1', 'pawar', '432454323', 'cares', '[[\"pawar\",\"432454323\",\"cares\"]]', NULL, NULL),
(68, 39, 'Sell', '87', '254', NULL, NULL, NULL, NULL, NULL, '9', '7', '1', '8', NULL, 'www.google.com', NULL, NULL, NULL, NULL, '_-||-_118', '_-||-_118', '_-||-_118', '_-||-_118', '_-||-_118', '1000_-||-_118', '_-||-_118', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '500_-||-_ft', '300_-||-_118', '_-||-_118', 'undefined_-||-_undefined', '_-||-_118', '_-||-_118', '3000_-||-_118', '12', '12', '11', '2', '2', NULL, NULL, NULL, NULL, '2023-09-23 18:51:26', '2023-09-23 18:51:26', NULL, NULL, NULL, '1', '1', '1', '1', '_-||-_ft', NULL, NULL, NULL, '2', '2', '0', NULL, '92', '104', 'sadas', '1', '3', NULL, '[1,1,1,0,1,1,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"a\",\"12312\",\"Rent Out\",\"23,123\",\"\",\"\",\"\",\"\",\"106\",[\"1\",\"0\",\"1\",\"0\",\"1\",\"0\",\"1\",\"0\"],[1,0,0,0,1,0,0,0,1,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '110', 'testt', '1231231232', 'tst@mail.com', '0', '[]', NULL, NULL, 'Owner', NULL, NULL, NULL, '39', NULL, '1', '13', 'testing..', '1', 'gjgj', '213131311', 'manager', '[[\"gjgj\",\"213131311\",\"manager\"]]', NULL, NULL),
(69, 39, 'Sell', '85', '262', NULL, NULL, NULL, NULL, NULL, NULL, '7', '1', '41', NULL, NULL, '5', '4', '5', '559', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '50_-||-_mt', '150_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-25 07:11:47', '2023-09-25 07:11:47', NULL, NULL, NULL, '0', '0', '0', '1', '60_-||-_ft', NULL, NULL, '1 - 600ft', NULL, NULL, '0', NULL, '90', '103', NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"Available\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', '236', '2900_-||-_119', '65,00,000', NULL, NULL, '_-||-_117', NULL, '110', 'pankaj udhar', '8529637415', 'pankaj@udhas.in', '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '11', 'fsgwe9954ifjv  4 5 4', '0', 'manhar', '4343432432', 'cares.', '[[\"manhar\",\"4343432432\",\"cares.\"]]', NULL, NULL),
(70, 39, 'Both', '85', '260', NULL, NULL, NULL, NULL, NULL, '50', '7', '1', '9', 'shambhu ni baju ma', 'https://maps.app.goo.gl/DDrSRs1goJmo3XfA7', NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '3500_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_null', '_-||-_null', '20_-||-_null', '13_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '63', '5', '25', NULL, '3', NULL, NULL, NULL, NULL, '2023-09-25 07:43:00', '2023-10-06 17:51:57', NULL, NULL, NULL, '0', '0', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, '1', NULL, '0', NULL, NULL, '105', NULL, '1', '3', NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '1', '[[\"a\",\"14\",\"Available\",\"1,20,00,000\",\"60,000\",\"\",\"\",\"\",\"108\",[],[]],[\"b\",\"18\",\"Available\",\"1,25,00,000\",\"61,00,000\",\"\",\"\",\"\",\"\",[],[]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '110', 'fafda', '852546', 'faf@da.com', '0', '[]', NULL, NULL, 'Owner', NULL, NULL, NULL, '39', '2', '1', '4', '777777777', '0', 'jalebi', '48566', 'marcha', '[[\"jalebi\",\"48566\",\"marcha\"]]', 0, NULL),
(71, 39, 'Both', '85', '261', NULL, NULL, NULL, NULL, NULL, '51', '7', '1', '33', 'asfasdf', 'https://maps.app.goo.gl/DDrSRs1goJmo3XfA7', NULL, NULL, NULL, NULL, '_-||-_118', '670_-||-_118', '_-||-_118', '840_-||-_118', '_-||-_118', '_-||-_118', '_-||-_118', '16_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_118', '_-||-_118', 'undefined_-||-_undefined', '_-||-_118', '_-||-_118', '_-||-_118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-25 08:05:54', '2023-09-25 08:05:54', NULL, NULL, NULL, '0', '0', '0', '0', '18_-||-_mt', NULL, NULL, NULL, '1', '1', '0', NULL, NULL, NULL, NULL, '1', '2', NULL, '[0,0,0,0,0,0,0]', '[[0,1,0,1,0],[\"\",\"approved\",\"\",\"18kva\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"40\",\"Available\",\"\",\"78,000\",\"50,00,000\",\"1,20,50,000\",\"1,70,50,000\",\"\",[],[]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '110', 'akshay', '5152524196', NULL, '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '8', NULL, '0', 'khanna', '7418520', '', '[[\"khanna\",\"7418520\",\"\"]]', NULL, NULL),
(72, 39, 'Both', '85', '262', NULL, NULL, NULL, NULL, NULL, NULL, '7', '5', '32', 'rsfdr', NULL, '1', '1', '1', '562', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '40_-||-_ft', '100_-||-_ft', '_-||-_null', '_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-25 08:17:58', '2023-09-26 17:54:22', NULL, '12', NULL, '0', '0', '0', '0', '60_-||-_ft', 'commercial', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"Available\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', '123', '3800_-||-_119', '52,52,52,000', '5', '10', '2452_-||-_117', '45,00,000', NULL, 'rajesh', '524158282', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '10', 'dfj  sdi  dhirae', '0', 'bhatt', '', '', '[[\"bhatt\",\"\",\"\"]]', NULL, NULL),
(73, 39, 'Both', '87', '254', NULL, NULL, NULL, NULL, NULL, '52', '7', '1', '10', 'brts ni baju ma', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '4500_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_null', '_-||-_null', '_-||-_null', '10_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '100_-||-_117', '33', '33', '33', '33', '33', NULL, NULL, NULL, '3', '2023-09-29 09:18:45', '2023-09-29 09:27:05', NULL, NULL, NULL, '1', '0', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, '2', '2', '0', NULL, '91', NULL, NULL, NULL, NULL, NULL, '[0,1,0,0,0,0,1]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"b\",\"505\",\"Available\",\"90,00,000\",\"45,000\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, NULL, 'kashiba', '678678789', 'nu@kavale.com', '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '17', 'rto thi 10 min . call befire visit', '1', 'athanu', '9494949449', 'swipper', '[[\"athanu\",\"9494949449\",\"swipper\"]]', NULL, NULL),
(74, 39, 'Rent', '87', '255', NULL, NULL, NULL, NULL, NULL, '1', '7', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, '2', '2', NULL, NULL, '2023-10-02 06:19:12', '2023-10-02 06:19:12', NULL, NULL, NULL, '0', '0', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, '2', NULL, '0', NULL, NULL, NULL, NULL, '1', '1', NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"2312\",\"Available\",\"\",\"1,23,123\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, NULL, '123', '123', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '14', 'dsa', '0', '123', '', '', '[[\"123\",\"\",\"\"]]', NULL, NULL),
(75, 39, 'Rent', '85', '262', NULL, NULL, NULL, NULL, NULL, NULL, '7', '1', '41', NULL, 'https://www.google.com/maps', '5', '4', '5', '230', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '123213_-||-_null', '23_-||-_null', '_-||-_null', '_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-02 19:50:07', '2023-10-06 07:07:32', NULL, '2', NULL, '0', '0', '1', 'NaN', '123_-||-_ft', 'commercial', '2132', NULL, NULL, NULL, '0', NULL, '91', '103', NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"a\",\"123\",\"Available\",\"\",\"44,44,221\",\"\",\"\",\"\",\"106\",[\"1\",\"0\",\"1\",\"0\",\"1\",\"0\",\"0\",\"0\"],[1,0,0,0,1,0,0,0,0,0]]]', '1234123', '2222_-||-_118', '4,55,555', '23342', '234444', '2344_-||-_117', NULL, '110', 'testtt', '123123131', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '10', '12313', '0', 'testt22', '1234123421', 'manegr', '[[\"testt22\",\"1234123421\",\"manegr\"]]', NULL, 'non_object'),
(76, 39, 'Rent', '87', '256', NULL, NULL, NULL, NULL, NULL, '53', '7', '1', '33', NULL, 'https://www.google.com/maps', NULL, NULL, NULL, '230', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '1000_-||-_117', '_-||-_117', '_-||-_ft', '5000_-||-_ft', '23_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, '2023-10-02 19:52:05', '2023-10-02 19:52:05', NULL, '2', '2', '0', '0', '1', 'NaN', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '0', NULL, '91', '104', 'wad', NULL, NULL, NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"111\",\"Available\",\"\",\"6,77,778\",\"\",\"\",\"\",\"\",[],[]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '110', 'testtt', '12341234212', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', NULL, 'remark', '0', 'asda', '231231', 'sales', '[[\"asda\",\"231231\",\"sales\"]]', NULL, NULL),
(77, 39, 'Both', '87', '254', NULL, NULL, NULL, NULL, NULL, '54', '7', '5', '28', 'nadi kinare', 'https://maps.app.goo.gl/Agkr5u6rNDtMwfhK7', NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '4400_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '11_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', '555', '23', '54', '12', '3', NULL, NULL, NULL, '3', '2023-10-03 07:01:48', '2023-10-06 17:50:50', NULL, NULL, NULL, '1', '0', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, '4', NULL, '0', NULL, NULL, NULL, NULL, '1', '2', NULL, '[0,1,0,0,0,1,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"b\",\"1212\",\"Available\",\"50,00,000\",\"23,000\",\"\",\"\",\"\",\"107\",[\"0\",\"2\",\"1\",\"1\",\"2\",\"0\",\"1\",\"0\"],[0,0,0,0,1,0,0,0,0,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '110', 'avadh', '6546765434', 'avadh@gmail.com', '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', '15', NULL, '0', 'bhuro', '4434343434', 'ass.', '[[\"bhuro\",\"4434343434\",\"ass.\"]]', 0, NULL),
(78, 39, 'Both', '87', '255', NULL, NULL, NULL, NULL, NULL, '55', '8', '4', '22', 'dariya kinare', 'https://maps.app.goo.gl/Agkr5u6rNDtMwfhK7', NULL, NULL, NULL, NULL, '_-||-_117', '200000_-||-_117', '_-||-_117', '100000_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, '18', '1', NULL, '28', '2023-10-03 07:43:04', '2023-10-09 12:28:31', NULL, NULL, '4', '0', '1', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, '22', NULL, '0', NULL, NULL, NULL, NULL, '1', '4', NULL, '[1,1,1,1,1,1,1]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"5\",\"Available\",\"\",\"1,00,000\",\"45,00,000\",\"1,00,00,000\",\"1,45,00,000\",\"106\",[\"1\",\"2\",\"2\",\"1\",\"3\",\"2\",\"1\",\"2\"],[1,1,1,1,1,1,1,1,1,1]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, NULL, 'mukesh', '543245432', 'rel@gmail.com', '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '17', NULL, '0', 'nitu', '344', 'top', '[[\"nitu\",\"344\",\"top\"]]', 1, NULL),
(79, 39, 'Both', '87', '257', NULL, NULL, NULL, NULL, NULL, '56', '10', '7', '36', 'hava mahel pase', 'https://maps.app.goo.gl/Agkr5u6rNDtMwfhK7', NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '5000_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_null', '_-||-_null', '_-||-_null', '11_-||-_null', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '1000_-||-_117', '333', '33', '33', '33', '3', '3', NULL, NULL, '3', '2023-10-03 07:59:19', '2023-10-06 17:50:42', NULL, NULL, NULL, '1', '0', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, '3', '3', '0', NULL, '17', NULL, NULL, '0', NULL, 'jul 25', '[1,0,0,0,1,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"b\",\"33\",\"Available\",\"\",\"66,666\",\"66,66,666\",\"10,00,000\",\"76,66,666\",\"107\",[\"2\",\"1\",\"2\",\"1\",\"0\",\"1\",\"1\",\"1\"],[1,0,0,1,1,1,1,1,0,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '110', 'buch', '768549303', 'bakul@gail.com', '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '17', '1st prioryty is rent out', '0', 'bakul', '6543554', '44', '[[\"bakul\",\"6543554\",\"44\"]]', 0, NULL),
(80, 39, 'Both', '87', '258', NULL, NULL, NULL, NULL, NULL, '57', '7', '1', '41', 'agol', 'https://maps.app.goo.gl/Agkr5u6rNDtMwfhK7', NULL, NULL, NULL, NULL, '_-||-_117', '11111_-||-_117', '_-||-_117', '111111_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, '1', '111', '3', '1', '2023-10-03 08:23:29', '2023-10-06 17:49:52', NULL, NULL, '1', '0', '1', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, '4', NULL, '0', NULL, '91', NULL, NULL, '0', NULL, 'jun24', '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"5\",\"Available\",\"\",\"4,00,000\",\"5,00,00,000\",\"12,00,00,000\",\"17,00,00,000\",\"106\",[\"2\",\"2\",\"2\",\"1\",\"3\",\"2\",\"1\",\"1\"],[1,1,1,1,1,0,1,0,1,1]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, NULL, 'yogi', '54354343', 'abc@gmail.com', '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '39', NULL, '1', NULL, 'jaldi lai lo', '0', 'adityanath', '76546543', 'cm', '[[\"adityanath\",\"76546543\",\"cm\"]]', 0, NULL),
(81, 39, 'Rent', '85', '262', NULL, NULL, NULL, NULL, NULL, NULL, '7', '1', '41', NULL, NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-04 03:51:55', '2023-10-08 17:36:59', '2023-10-08 17:36:59', NULL, NULL, '0', '0', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"777\",\"\",\"Available\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', '666', '_-||-_117', NULL, '7777', NULL, '_-||-_117', NULL, NULL, NULL, NULL, NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '10', NULL, '0', '', '', '', '[]', NULL, NULL),
(82, 39, 'Rent', '87', '255', NULL, NULL, NULL, NULL, NULL, NULL, '7', '1', '41', NULL, NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-06 11:24:41', '2023-10-06 11:24:41', NULL, NULL, NULL, '0', '0', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"Available\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, NULL, NULL, NULL, NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '15', NULL, '0', '', '', '', '[]', NULL, NULL),
(83, 39, 'Rent', '85', '262', NULL, NULL, NULL, NULL, NULL, NULL, '7', '1', '41', NULL, NULL, NULL, NULL, NULL, '231', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '123_-||-_ft', '123_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-06 16:25:18', '2023-10-08 17:36:59', '2023-10-08 17:36:59', '1', NULL, '0', '0', '0', 'NaN', '1_-||-_ft', 'commercial,industrial', '112233', NULL, NULL, NULL, '0', NULL, '91', '103', NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"123\",\"123\",\"Available\",\"\",\"12,31,231\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', '1231231', '321321_-||-_117', '1,12,23,332', '3322332', '444545', '543_-||-_117', NULL, '110', 'rewree', '1234123412', NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '10', '1111111', '0', 'rssaa', '12341232412', 'manager', '[[\"rssaa\",\"12341232412\",\"manager\"]]', NULL, 'non_object,khata'),
(84, 39, 'Rent', '87', '257', NULL, NULL, NULL, NULL, NULL, '58', '7', '1', '1', 'metro pase', NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '3500_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '11_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '100_-||-_117', '120', '22', '60', '15', '4', '2', NULL, NULL, '4', '2023-10-09 06:14:44', '2023-10-09 06:14:44', NULL, NULL, NULL, '1', '0', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, '4', NULL, '0', NULL, '90', NULL, NULL, NULL, NULL, NULL, '[0,1,0,0,0,1,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"b\",\"1204\",\"Available\",\"\",\"38,000\",\"\",\"\",\"\",\"108\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, NULL, 'vijay dinananth', '65456544', 'vij@skyvue.com', '0', '[]', NULL, NULL, 'Owner', NULL, NULL, NULL, '39', NULL, '1', '17', 'vry prime location', '0', 'chauhan', '542543434', 'caresT', '[[\"chauhan\",\"542543434\",\"caresT\"]]', NULL, NULL),
(85, 39, NULL, '85', '262', NULL, NULL, NULL, NULL, NULL, NULL, '7', '1', '41', NULL, NULL, NULL, NULL, NULL, NULL, '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_117', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_117', '_-||-_117', 'undefined_-||-_undefined', '_-||-_117', '_-||-_117', '_-||-_117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-11 06:25:39', '2023-10-24 10:00:21', '2023-10-24 10:00:21', NULL, NULL, '0', '0', '0', 'NaN', '_-||-_ft', NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"\",\"\",\"Available\",\"\",\"\",\"\",\"\",\"\",\"\",[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],[0,0,0,0,0,0,0,0,0,0]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, NULL, NULL, NULL, NULL, '0', '[]', NULL, NULL, NULL, NULL, NULL, NULL, '39', NULL, '1', '11', NULL, '0', '', '', '', '[]', NULL, NULL);
INSERT INTO `properties` (`id`, `user_id`, `property_for`, `property_type`, `property_category`, `office_type`, `retail_type`, `storage_type`, `plot_type`, `flat_type`, `project_id`, `state_id`, `city_id`, `locality_id`, `address`, `location_link`, `district_id`, `taluka_id`, `village_id`, `zone_id`, `constructed_carpet_area`, `constructed_salable_area`, `constructed_builtup_area`, `salable_plot_area`, `carpet_plot_area`, `salable_area`, `carpet_area`, `storage_centre_height`, `length_of_plot`, `width_of_plot`, `entrance_width`, `ceiling_height`, `builtup_area`, `plot_area`, `terrace`, `construction_area`, `terrace_carpet_area`, `terrace_salable_area`, `total_units_in_project`, `total_no_of_floor`, `total_units_in_tower`, `property_on_floors`, `no_of_elavators`, `no_of_balcony`, `total_no_of_units`, `no_of_room`, `no_of_bathrooms`, `created_at`, `updated_at`, `deleted_at`, `no_of_floors_allowed`, `no_of_side_open`, `service_elavator`, `servant_room`, `hot_property`, `is_favourite`, `front_road_width`, `construction_allowed_for`, `fsi`, `no_of_borewell`, `fourwheller_parking`, `twowheeler_parking`, `is_pre_leased`, `pre_leased_remarks`, `Property_priority`, `source_of_property`, `property_source_refrence`, `availability_status`, `propertyage`, `available_from`, `amenities`, `other_industrial_fields`, `two_road_corner`, `unit_details`, `survey_number`, `survey_plot_size`, `survey_price`, `tp_number`, `fp_number`, `fp_plot_size`, `fp_plot_price`, `owner_is`, `owner_name`, `owner_contact`, `owner_email`, `owner_nri`, `contact_details`, `care_taker_name`, `care_taker_contact`, `key_available_at`, `conference_room`, `reception_area`, `pantry_type`, `added_by`, `washrooms2_type`, `status`, `configuration`, `remarks`, `is_terrace`, `other_name`, `other_contact`, `position`, `other_contact_details`, `prop_status`, `construction_documents`) VALUES
(86, 39, 'Sell', '85', '259', NULL, NULL, NULL, NULL, NULL, '1', '26', NULL, NULL, NULL, '654', NULL, NULL, NULL, NULL, '_-||-_118', '_-||-_118', '_-||-_118', '_-||-_118', '_-||-_118', '100_-||-_118', '_-||-_118', '_-||-_ft', '_-||-_ft', '_-||-_ft', '_-||-_ft', '15_-||-_mt', '_-||-_118', '_-||-_118', 'undefined_-||-_undefined', '_-||-_118', '_-||-_118', '_-||-_118', '10', '20', '3', '10', '2', NULL, NULL, NULL, NULL, '2023-10-12 16:28:07', '2023-10-12 16:28:07', NULL, NULL, NULL, '1', '0', '1', 'NaN', '_-||-_ft', NULL, NULL, NULL, '10', '2', '0', NULL, '17', '104', 'sdfsf', '1', '1', NULL, '[0,0,0,0,0,0,0]', '[[0,0,0,0,0],[\"\",\"\",\"\",\"\",\"\"],[\"pollution_control_board\",\"ec_noc\",\"gujrat_gas\",\"power\",\"water\"],[\"Pollution Control\\n                                                                    Board\",\"EC/NOC\",\"\\n                                                                    Gas\",\"Power\",\"Water\"]]', '0', '[[\"BNSJh\",\"1\",\"Sold Out\",\"10\",\"\",\"\",\"\",\"\",\"106\",[\"10\",\"20\",\"30\"],[1,1]]]', NULL, '_-||-_117', NULL, NULL, NULL, '_-||-_117', NULL, '110', 'NISD', '54646456446', 'adjaksd@gmail.com', '0', '[]', NULL, NULL, 'Office', NULL, NULL, NULL, '78', '2', '1', '1', 'dfasdadad', '0', 'HJHK', '4564654564', 'SDH', '[[\"HJHK\",\"4564654564\",\"SDH\"]]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_partner`
--

CREATE TABLE `property_partner` (
  `user_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `partner_id` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Active','Deactive') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_partner`
--

INSERT INTO `property_partner` (`user_id`, `id`, `partner_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(39, 1, '8', 'Pending', '2023-09-02 11:55:14', '2023-09-02 11:55:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_report`
--

CREATE TABLE `property_report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action_by` int(11) DEFAULT NULL,
  `action_on` int(11) DEFAULT NULL,
  `action` varchar(180) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_report`
--

INSERT INTO `property_report` (`id`, `user_id`, `action_by`, `action_on`, `action`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 39, 39, 1, 'created', '2023-08-23 05:49:41', '2023-08-23 05:49:41', NULL),
(2, 39, 39, 1, 'updated', '2023-08-23 05:50:03', '2023-08-23 05:50:03', NULL),
(3, 39, 39, 2, 'created', '2023-08-23 15:57:36', '2023-08-23 15:57:36', NULL),
(4, 39, 39, 2, 'updated', '2023-08-23 16:10:17', '2023-08-23 16:10:17', NULL),
(5, 39, 39, 2, 'deleted', '2023-08-23 18:25:59', '2023-08-23 18:25:59', NULL),
(6, 39, 39, 3, 'created', '2023-08-24 05:27:32', '2023-08-24 05:27:32', NULL),
(7, 39, 39, 3, 'updated', '2023-08-24 05:28:10', '2023-08-24 05:28:10', NULL),
(8, 39, 39, 4, 'created', '2023-08-24 07:47:12', '2023-08-24 07:47:12', NULL),
(9, 39, 39, 5, 'created', '2023-08-24 07:55:11', '2023-08-24 07:55:11', NULL),
(10, 39, 39, 5, 'updated', '2023-08-24 08:02:14', '2023-08-24 08:02:14', NULL),
(11, 39, 39, 6, 'created', '2023-08-24 08:11:06', '2023-08-24 08:11:06', NULL),
(12, 39, 39, 6, 'updated', '2023-08-24 17:12:29', '2023-08-24 17:12:29', NULL),
(13, 39, 39, 4, 'updated', '2023-08-24 17:25:43', '2023-08-24 17:25:43', NULL),
(14, 39, 39, 7, 'created', '2023-08-25 05:19:09', '2023-08-25 05:19:09', NULL),
(15, 39, 39, 8, 'created', '2023-08-25 05:21:19', '2023-08-25 05:21:19', NULL),
(16, 39, 39, 9, 'created', '2023-08-25 08:48:10', '2023-08-25 08:48:10', NULL),
(17, 39, 39, 9, 'updated', '2023-08-25 08:50:27', '2023-08-25 08:50:27', NULL),
(18, 8, 8, 10, 'created', '2023-08-25 09:12:58', '2023-08-25 09:12:58', NULL),
(19, 8, 8, 10, 'updated', '2023-08-25 09:13:23', '2023-08-25 09:13:23', NULL),
(20, 39, 39, 11, 'created', '2023-08-25 09:15:27', '2023-08-25 09:15:27', NULL),
(21, 39, 39, 12, 'created', '2023-08-25 09:17:10', '2023-08-25 09:17:10', NULL),
(22, 39, 39, 9, 'deleted', '2023-08-25 09:17:33', '2023-08-25 09:17:33', NULL),
(23, 39, 39, 13, 'created', '2023-08-25 09:18:40', '2023-08-25 09:18:40', NULL),
(24, 39, 39, 13, 'updated', '2023-08-25 09:19:14', '2023-08-25 09:19:14', NULL),
(25, 39, 39, 12, 'updated', '2023-08-25 09:20:30', '2023-08-25 09:20:30', NULL),
(26, 39, 39, 6, 'deleted', '2023-08-25 09:21:09', '2023-08-25 09:21:09', NULL),
(27, 39, 39, 5, 'deleted', '2023-08-25 09:21:09', '2023-08-25 09:21:09', NULL),
(28, 39, 39, 4, 'deleted', '2023-08-25 09:21:09', '2023-08-25 09:21:09', NULL),
(29, 39, 39, 3, 'deleted', '2023-08-25 09:21:09', '2023-08-25 09:21:09', NULL),
(30, 39, 39, 1, 'deleted', '2023-08-25 09:21:09', '2023-08-25 09:21:09', NULL),
(31, 39, 39, 14, 'created', '2023-08-25 18:51:21', '2023-08-25 18:51:21', NULL),
(32, 39, 39, 14, 'deleted', '2023-08-25 18:51:27', '2023-08-25 18:51:27', NULL),
(33, 39, 39, 15, 'created', '2023-08-25 18:52:13', '2023-08-25 18:52:13', NULL),
(34, 39, 39, 1, 'created', '2023-08-25 19:42:50', '2023-08-25 19:42:50', NULL),
(35, 39, 39, 2, 'created', '2023-08-25 19:44:54', '2023-08-25 19:44:54', NULL),
(36, 39, 39, 3, 'created', '2023-08-25 19:47:07', '2023-08-25 19:47:07', NULL),
(37, 39, 39, 4, 'created', '2023-08-25 19:49:46', '2023-08-25 19:49:46', NULL),
(38, 39, 39, 5, 'created', '2023-08-25 20:25:06', '2023-08-25 20:25:06', NULL),
(39, 39, 39, 6, 'created', '2023-08-25 20:28:35', '2023-08-25 20:28:35', NULL),
(40, 39, 39, 7, 'created', '2023-08-25 20:32:23', '2023-08-25 20:32:23', NULL),
(41, 39, 39, 8, 'created', '2023-08-25 20:39:23', '2023-08-25 20:39:23', NULL),
(42, 39, 39, 9, 'created', '2023-08-25 20:42:20', '2023-08-25 20:42:20', NULL),
(43, 39, 39, 10, 'created', '2023-08-25 20:47:03', '2023-08-25 20:47:03', NULL),
(44, 39, 39, 11, 'created', '2023-08-25 20:51:22', '2023-08-25 20:51:22', NULL),
(45, 39, 39, 11, 'updated', '2023-08-25 20:51:58', '2023-08-25 20:51:58', NULL),
(46, 39, 39, 12, 'created', '2023-08-25 20:53:33', '2023-08-25 20:53:33', NULL),
(47, 39, 39, 13, 'created', '2023-08-26 04:13:30', '2023-08-26 04:13:30', NULL),
(48, 39, 39, 13, 'deleted', '2023-08-26 04:20:46', '2023-08-26 04:20:46', NULL),
(49, 39, 39, 14, 'created', '2023-08-26 04:21:34', '2023-08-26 04:21:34', NULL),
(50, 39, 39, 15, 'created', '2023-08-26 05:19:11', '2023-08-26 05:19:11', NULL),
(51, 39, 39, 1, 'created', '2023-08-26 05:34:02', '2023-08-26 05:34:02', NULL),
(52, 39, 39, 2, 'created', '2023-08-26 05:34:58', '2023-08-26 05:34:58', NULL),
(53, 39, 39, 1, 'deleted', '2023-08-26 05:35:10', '2023-08-26 05:35:10', NULL),
(54, 39, 39, 3, 'created', '2023-08-26 05:36:50', '2023-08-26 05:36:50', NULL),
(55, 39, 39, 4, 'created', '2023-08-26 05:43:02', '2023-08-26 05:43:02', NULL),
(56, 39, 39, 5, 'created', '2023-08-26 05:43:44', '2023-08-26 05:43:44', NULL),
(57, 39, 39, 5, 'deleted', '2023-08-26 05:43:54', '2023-08-26 05:43:54', NULL),
(58, 39, 39, 6, 'created', '2023-08-27 07:32:26', '2023-08-27 07:32:26', NULL),
(59, 39, 39, 3, 'deleted', '2023-08-27 07:37:46', '2023-08-27 07:37:46', NULL),
(60, 39, 39, 7, 'created', '2023-08-27 07:38:54', '2023-08-27 07:38:54', NULL),
(61, 39, 39, 8, 'created', '2023-08-27 08:09:44', '2023-08-27 08:09:44', NULL),
(62, 39, 39, 1, 'created', '2023-08-28 13:23:55', '2023-08-28 13:23:55', NULL),
(63, 39, 39, 2, 'created', '2023-08-28 13:35:08', '2023-08-28 13:35:08', NULL),
(64, 39, 39, 3, 'created', '2023-08-28 13:39:44', '2023-08-28 13:39:44', NULL),
(65, 39, 39, 4, 'created', '2023-08-28 15:52:57', '2023-08-28 15:52:57', NULL),
(66, 39, 39, 5, 'created', '2023-08-28 15:59:33', '2023-08-28 15:59:33', NULL),
(67, 39, 39, 6, 'created', '2023-08-28 16:12:54', '2023-08-28 16:12:54', NULL),
(68, 39, 39, 7, 'created', '2023-08-28 16:28:45', '2023-08-28 16:28:45', NULL),
(69, 39, 39, 8, 'created', '2023-08-28 16:42:53', '2023-08-28 16:42:53', NULL),
(70, 39, 39, 8, 'updated', '2023-08-28 16:49:32', '2023-08-28 16:49:32', NULL),
(71, 39, 39, 1, 'created', '2023-08-30 10:24:59', '2023-08-30 10:24:59', NULL),
(72, 39, 39, 2, 'created', '2023-08-30 10:27:28', '2023-08-30 10:27:28', NULL),
(73, 39, 39, 3, 'created', '2023-08-30 10:29:43', '2023-08-30 10:29:43', NULL),
(74, 39, 39, 4, 'created', '2023-09-01 11:45:13', '2023-09-01 11:45:13', NULL),
(75, 39, 39, 4, 'deleted', '2023-09-01 12:24:56', '2023-09-01 12:24:56', NULL),
(76, 39, 39, 5, 'created', '2023-09-01 13:05:40', '2023-09-01 13:05:40', NULL),
(77, 39, 39, 5, 'deleted', '2023-09-01 13:06:43', '2023-09-01 13:06:43', NULL),
(78, 39, 39, 6, 'created', '2023-09-01 13:11:17', '2023-09-01 13:11:17', NULL),
(79, 39, 39, 7, 'created', '2023-09-03 01:16:40', '2023-09-03 01:16:40', NULL),
(80, 39, 39, 8, 'created', '2023-09-03 01:18:39', '2023-09-03 01:18:39', NULL),
(81, 39, 39, 9, 'created', '2023-09-03 01:19:53', '2023-09-03 01:19:53', NULL),
(82, 39, 39, 10, 'created', '2023-09-03 01:38:07', '2023-09-03 01:38:07', NULL),
(83, 39, 39, 11, 'created', '2023-09-03 01:59:49', '2023-09-03 01:59:49', NULL),
(84, 39, 39, 12, 'created', '2023-09-03 02:02:43', '2023-09-03 02:02:43', NULL),
(85, 39, 39, 13, 'created', '2023-09-03 04:53:21', '2023-09-03 04:53:21', NULL),
(86, 39, 39, 14, 'created', '2023-09-03 05:28:02', '2023-09-03 05:28:02', NULL),
(87, 39, 39, 15, 'created', '2023-09-05 10:23:57', '2023-09-05 10:23:57', NULL),
(88, 39, 39, 15, 'deleted', '2023-09-05 11:42:11', '2023-09-05 11:42:11', NULL),
(89, 39, 39, 12, 'deleted', '2023-09-05 11:42:47', '2023-09-05 11:42:47', NULL),
(90, 39, 39, 6, 'deleted', '2023-09-05 11:42:55', '2023-09-05 11:42:55', NULL),
(91, 39, 39, 3, 'deleted', '2023-09-05 11:42:55', '2023-09-05 11:42:55', NULL),
(92, 39, 39, 2, 'deleted', '2023-09-05 11:42:55', '2023-09-05 11:42:55', NULL),
(93, 39, 39, 16, 'created', '2023-09-06 12:48:15', '2023-09-06 12:48:15', NULL),
(94, 39, 39, 17, 'created', '2023-09-06 12:49:49', '2023-09-06 12:49:49', NULL),
(95, 39, 39, 18, 'created', '2023-09-06 23:24:44', '2023-09-06 23:24:44', NULL),
(96, 39, 39, 19, 'created', '2023-09-07 04:24:57', '2023-09-07 04:24:57', NULL),
(97, 39, 39, 21, 'created', '2023-09-07 06:01:11', '2023-09-07 06:01:11', NULL),
(98, 39, 39, 21, 'updated', '2023-09-07 08:39:43', '2023-09-07 08:39:43', NULL),
(99, 8, 49, 22, 'created', '2023-09-07 22:30:45', '2023-09-07 22:30:45', NULL),
(100, 39, 39, 23, 'created', '2023-09-08 11:56:30', '2023-09-08 11:56:30', NULL),
(101, 39, 39, 24, 'created', '2023-09-08 12:21:16', '2023-09-08 12:21:16', NULL),
(102, 39, 39, 25, 'created', '2023-09-08 12:21:58', '2023-09-08 12:21:58', NULL),
(103, 39, 39, 23, 'updated', '2023-09-10 02:55:02', '2023-09-10 02:55:02', NULL),
(104, 39, 39, 25, 'deleted', '2023-09-10 02:55:20', '2023-09-10 02:55:20', NULL),
(105, 39, 39, 24, 'deleted', '2023-09-10 03:33:43', '2023-09-10 03:33:43', NULL),
(106, 39, 39, 12, 'deleted', '2023-09-10 03:33:43', '2023-09-10 03:33:43', NULL),
(107, 39, 39, 6, 'deleted', '2023-09-10 03:33:43', '2023-09-10 03:33:43', NULL),
(108, 39, 39, 5, 'deleted', '2023-09-10 03:33:43', '2023-09-10 03:33:43', NULL),
(109, 39, 39, 4, 'deleted', '2023-09-10 03:33:43', '2023-09-10 03:33:43', NULL),
(110, 39, 39, 3, 'deleted', '2023-09-10 03:33:43', '2023-09-10 03:33:43', NULL),
(111, 39, 39, 2, 'deleted', '2023-09-10 03:33:43', '2023-09-10 03:33:43', NULL),
(112, 39, 39, 26, 'created', '2023-09-10 03:48:59', '2023-09-10 03:48:59', NULL),
(113, 39, 39, 26, 'updated', '2023-09-10 04:56:13', '2023-09-10 04:56:13', NULL),
(114, 39, 39, 27, 'created', '2023-09-11 11:55:04', '2023-09-11 11:55:04', NULL),
(115, 39, 39, 28, 'created', '2023-09-11 12:01:45', '2023-09-11 12:01:45', NULL),
(116, 39, 39, 29, 'created', '2023-09-11 22:06:05', '2023-09-11 22:06:05', NULL),
(117, 39, 39, 29, 'deleted', '2023-09-13 11:23:04', '2023-09-13 11:23:04', NULL),
(118, 39, 39, 30, 'created', '2023-09-15 11:41:55', '2023-09-15 11:41:55', NULL),
(119, 39, 39, 31, 'created', '2023-09-15 11:53:04', '2023-09-15 11:53:04', NULL),
(120, 39, 39, 32, 'created', '2023-09-15 23:57:54', '2023-09-15 23:57:54', NULL),
(121, 39, 39, 33, 'created', '2023-09-16 18:45:43', '2023-09-16 18:45:43', NULL),
(122, 39, 39, 1, 'created', '2023-09-17 09:34:38', '2023-09-17 09:34:38', NULL),
(123, 39, 39, 2, 'created', '2023-09-17 09:36:10', '2023-09-17 09:36:10', NULL),
(124, 39, 39, 3, 'created', '2023-09-17 09:39:35', '2023-09-17 09:39:35', NULL),
(125, 39, 39, 1, 'deleted', '2023-09-17 09:50:06', '2023-09-17 09:50:06', NULL),
(126, 39, 39, 42, 'deleted', '2023-09-17 15:34:21', '2023-09-17 15:34:21', NULL),
(127, 39, 39, 46, 'deleted', '2023-09-17 15:50:35', '2023-09-17 15:50:35', NULL),
(128, 39, 39, 49, 'created', '2023-09-17 15:52:15', '2023-09-17 15:52:15', NULL),
(129, 39, 39, 50, 'created', '2023-09-17 15:53:57', '2023-09-17 15:53:57', NULL),
(130, 39, 39, 51, 'created', '2023-09-17 15:56:33', '2023-09-17 15:56:33', NULL),
(131, 39, 39, 40, 'deleted', '2023-09-18 04:52:51', '2023-09-18 04:52:51', NULL),
(132, 39, 39, 32, 'deleted', '2023-09-18 04:52:54', '2023-09-18 04:52:54', NULL),
(133, 39, 39, 16, 'deleted', '2023-09-18 04:52:56', '2023-09-18 04:52:56', NULL),
(134, 39, 39, 52, 'created', '2023-09-18 18:07:09', '2023-09-18 18:07:09', NULL),
(135, 39, 39, 53, 'created', '2023-09-19 07:51:57', '2023-09-19 07:51:57', NULL),
(136, 39, 39, 54, 'created', '2023-09-19 12:59:23', '2023-09-19 12:59:23', NULL),
(137, 39, 39, 55, 'created', '2023-09-19 13:07:40', '2023-09-19 13:07:40', NULL),
(138, 39, 39, 56, 'created', '2023-09-19 14:05:39', '2023-09-19 14:05:39', NULL),
(139, 39, 39, 56, 'updated', '2023-09-19 14:09:07', '2023-09-19 14:09:07', NULL),
(140, 39, 39, 55, 'updated', '2023-09-19 14:23:55', '2023-09-19 14:23:55', NULL),
(141, 39, 39, 54, 'updated', '2023-09-19 15:22:43', '2023-09-19 15:22:43', NULL),
(142, 39, 39, 57, 'created', '2023-09-19 16:11:21', '2023-09-19 16:11:21', NULL),
(143, 39, 39, 57, 'updated', '2023-09-19 16:12:47', '2023-09-19 16:12:47', NULL),
(144, 39, 39, 58, 'created', '2023-09-19 16:51:00', '2023-09-19 16:51:00', NULL),
(145, 39, 39, 59, 'created', '2023-09-22 05:12:31', '2023-09-22 05:12:31', NULL),
(146, 39, 39, 59, 'updated', '2023-09-22 05:15:07', '2023-09-22 05:15:07', NULL),
(147, 39, 39, 60, 'created', '2023-09-22 05:40:20', '2023-09-22 05:40:20', NULL),
(148, 39, 39, 60, 'updated', '2023-09-22 05:40:38', '2023-09-22 05:40:38', NULL),
(149, 39, 39, 61, 'created', '2023-09-23 10:24:17', '2023-09-23 10:24:17', NULL),
(150, 39, 39, 62, 'created', '2023-09-23 10:31:34', '2023-09-23 10:31:34', NULL),
(151, 39, 39, 63, 'created', '2023-09-23 10:47:29', '2023-09-23 10:47:29', NULL),
(152, 39, 39, 64, 'created', '2023-09-23 11:44:40', '2023-09-23 11:44:40', NULL),
(153, 39, 39, 65, 'created', '2023-09-23 11:54:37', '2023-09-23 11:54:37', NULL),
(154, 39, 39, 66, 'created', '2023-09-23 12:06:39', '2023-09-23 12:06:39', NULL),
(155, 39, 39, 67, 'created', '2023-09-23 12:15:36', '2023-09-23 12:15:36', NULL),
(156, 39, 39, 67, 'updated', '2023-09-23 12:30:17', '2023-09-23 12:30:17', NULL),
(157, 39, 39, 58, 'updated', '2023-09-23 18:18:59', '2023-09-23 18:18:59', NULL),
(158, 39, 39, 68, 'created', '2023-09-23 18:51:26', '2023-09-23 18:51:26', NULL),
(159, 39, 39, 69, 'created', '2023-09-25 07:11:47', '2023-09-25 07:11:47', NULL),
(160, 39, 39, 70, 'created', '2023-09-25 07:43:00', '2023-09-25 07:43:00', NULL),
(161, 39, 39, 71, 'created', '2023-09-25 08:05:54', '2023-09-25 08:05:54', NULL),
(162, 39, 39, 72, 'created', '2023-09-25 08:17:58', '2023-09-25 08:17:58', NULL),
(163, 39, 39, 72, 'updated', '2023-09-25 08:19:00', '2023-09-25 08:19:00', NULL),
(164, 39, 39, 63, 'updated', '2023-09-25 14:26:42', '2023-09-25 14:26:42', NULL),
(165, 39, 39, 70, 'updated', '2023-09-26 16:58:02', '2023-09-26 16:58:02', NULL),
(166, 39, 39, 73, 'created', '2023-09-29 09:18:45', '2023-09-29 09:18:45', NULL),
(167, 39, 39, 73, 'updated', '2023-09-29 09:25:12', '2023-09-29 09:25:12', NULL),
(168, 39, 39, 74, 'created', '2023-10-02 06:19:12', '2023-10-02 06:19:12', NULL),
(169, 39, 39, 64, 'updated', '2023-10-02 18:25:53', '2023-10-02 18:25:53', NULL),
(170, 39, 39, 75, 'created', '2023-10-02 19:50:07', '2023-10-02 19:50:07', NULL),
(171, 39, 39, 75, 'updated', '2023-10-02 19:50:48', '2023-10-02 19:50:48', NULL),
(172, 39, 39, 76, 'created', '2023-10-02 19:52:05', '2023-10-02 19:52:05', NULL),
(173, 39, 39, 77, 'created', '2023-10-03 07:01:48', '2023-10-03 07:01:48', NULL),
(174, 39, 39, 78, 'created', '2023-10-03 07:43:04', '2023-10-03 07:43:04', NULL),
(175, 39, 39, 79, 'created', '2023-10-03 07:59:19', '2023-10-03 07:59:19', NULL),
(176, 39, 39, 79, 'updated', '2023-10-03 08:03:08', '2023-10-03 08:03:08', NULL),
(177, 39, 39, 80, 'created', '2023-10-03 08:23:29', '2023-10-03 08:23:29', NULL),
(178, 39, 39, 81, 'created', '2023-10-04 03:51:55', '2023-10-04 03:51:55', NULL),
(179, 39, 39, 82, 'created', '2023-10-06 11:24:41', '2023-10-06 11:24:41', NULL),
(180, 39, 39, 83, 'created', '2023-10-06 16:25:18', '2023-10-06 16:25:18', NULL),
(181, 39, 39, 52, 'updated', '2023-10-06 17:15:56', '2023-10-06 17:15:56', NULL),
(182, 39, 39, 53, 'updated', '2023-10-06 17:17:12', '2023-10-06 17:17:12', NULL),
(183, 39, 39, 62, 'updated', '2023-10-07 18:57:08', '2023-10-07 18:57:08', NULL),
(184, 39, 39, 83, 'deleted', '2023-10-08 17:36:59', '2023-10-08 17:36:59', NULL),
(185, 39, 39, 81, 'deleted', '2023-10-08 17:36:59', '2023-10-08 17:36:59', NULL),
(186, 39, 39, 84, 'created', '2023-10-09 06:14:44', '2023-10-09 06:14:44', NULL),
(187, 39, 39, 78, 'updated', '2023-10-09 12:28:31', '2023-10-09 12:28:31', NULL),
(188, 39, 39, 85, 'created', '2023-10-11 06:25:39', '2023-10-11 06:25:39', NULL),
(189, 39, 78, 86, 'created', '2023-10-12 16:28:07', '2023-10-12 16:28:07', NULL),
(190, 39, 39, 85, 'deleted', '2023-10-24 10:00:21', '2023-10-24 10:00:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_viewer`
--

CREATE TABLE `property_viewer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `visited_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_viewer`
--

INSERT INTO `property_viewer` (`id`, `user_id`, `property_id`, `visited_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 39, 2, 39, '2023-08-23 15:57:58', '2023-08-23 15:57:58', NULL),
(2, 39, 1, 39, '2023-08-23 16:00:02', '2023-08-23 16:00:02', NULL),
(3, 39, 2, 39, '2023-08-23 16:03:47', '2023-08-23 16:03:47', NULL),
(4, 39, 2, 39, '2023-08-23 16:05:22', '2023-08-23 16:05:22', NULL),
(5, 39, 2, 39, '2023-08-23 16:05:35', '2023-08-23 16:05:35', NULL),
(6, 39, 1, 39, '2023-08-23 16:05:44', '2023-08-23 16:05:44', NULL),
(7, 39, 2, 39, '2023-08-23 16:07:31', '2023-08-23 16:07:31', NULL),
(8, 39, 1, 39, '2023-08-23 16:14:24', '2023-08-23 16:14:24', NULL),
(9, 39, 2, 39, '2023-08-23 16:25:25', '2023-08-23 16:25:25', NULL),
(10, 39, 1, 39, '2023-08-24 03:22:57', '2023-08-24 03:22:57', NULL),
(11, 39, 1, 39, '2023-08-24 03:23:24', '2023-08-24 03:23:24', NULL),
(12, 39, 3, 39, '2023-08-24 06:05:50', '2023-08-24 06:05:50', NULL),
(13, 39, 3, 39, '2023-08-24 06:06:10', '2023-08-24 06:06:10', NULL),
(14, 39, 5, 39, '2023-08-24 07:57:10', '2023-08-24 07:57:10', NULL),
(15, 39, 5, 39, '2023-08-24 07:59:38', '2023-08-24 07:59:38', NULL),
(16, 39, 5, 39, '2023-08-24 08:02:17', '2023-08-24 08:02:17', NULL),
(17, 39, 5, 39, '2023-08-24 08:03:02', '2023-08-24 08:03:02', NULL),
(18, 39, 5, 39, '2023-08-24 08:03:18', '2023-08-24 08:03:18', NULL),
(19, 39, 5, 39, '2023-08-24 08:03:50', '2023-08-24 08:03:50', NULL),
(20, 39, 6, 39, '2023-08-24 08:29:55', '2023-08-24 08:29:55', NULL),
(21, 39, 4, 39, '2023-08-24 08:30:47', '2023-08-24 08:30:47', NULL),
(22, 39, 1, 39, '2023-08-24 08:34:27', '2023-08-24 08:34:27', NULL),
(23, 39, 5, 39, '2023-08-24 08:34:57', '2023-08-24 08:34:57', NULL),
(24, 39, 4, 39, '2023-08-24 08:35:04', '2023-08-24 08:35:04', NULL),
(25, 39, 3, 39, '2023-08-24 08:35:10', '2023-08-24 08:35:10', NULL),
(26, 39, 4, 39, '2023-08-24 08:38:02', '2023-08-24 08:38:02', NULL),
(27, 39, 5, 39, '2023-08-24 08:52:25', '2023-08-24 08:52:25', NULL),
(28, 39, 5, 39, '2023-08-24 08:52:58', '2023-08-24 08:52:58', NULL),
(29, 39, 4, 39, '2023-08-24 08:58:32', '2023-08-24 08:58:32', NULL),
(30, 39, 6, 39, '2023-08-24 12:35:57', '2023-08-24 12:35:57', NULL),
(31, 39, 6, 39, '2023-08-24 16:34:34', '2023-08-24 16:34:34', NULL),
(32, 39, 1, 39, '2023-08-24 16:34:50', '2023-08-24 16:34:50', NULL),
(33, 39, 5, 39, '2023-08-24 17:45:26', '2023-08-24 17:45:26', NULL),
(34, 39, 5, 39, '2023-08-24 17:47:13', '2023-08-24 17:47:13', NULL),
(35, 39, 5, 39, '2023-08-24 17:48:12', '2023-08-24 17:48:12', NULL),
(36, 39, 5, 39, '2023-08-24 17:48:18', '2023-08-24 17:48:18', NULL),
(37, 39, 5, 39, '2023-08-25 03:55:00', '2023-08-25 03:55:00', NULL),
(38, 39, 3, 39, '2023-08-25 05:14:03', '2023-08-25 05:14:03', NULL),
(39, 39, 1, 39, '2023-08-25 05:14:04', '2023-08-25 05:14:04', NULL),
(40, 39, 4, 39, '2023-08-25 05:14:05', '2023-08-25 05:14:05', NULL),
(41, 39, 5, 39, '2023-08-25 05:14:06', '2023-08-25 05:14:06', NULL),
(42, 39, 6, 39, '2023-08-25 05:14:07', '2023-08-25 05:14:07', NULL),
(43, 39, 7, 39, '2023-08-25 05:22:05', '2023-08-25 05:22:05', NULL),
(44, 39, 9, 39, '2023-08-25 08:49:43', '2023-08-25 08:49:43', NULL),
(45, 39, 9, 39, '2023-08-25 08:49:54', '2023-08-25 08:49:54', NULL),
(46, 39, 9, 39, '2023-08-25 08:50:29', '2023-08-25 08:50:29', NULL),
(47, 39, 9, 39, '2023-08-25 08:50:50', '2023-08-25 08:50:50', NULL),
(48, 39, 8, 39, '2023-08-25 08:51:20', '2023-08-25 08:51:20', NULL),
(49, 39, 9, 39, '2023-08-25 08:51:23', '2023-08-25 08:51:23', NULL),
(50, 39, 9, 39, '2023-08-25 08:52:06', '2023-08-25 08:52:06', NULL),
(51, 39, 9, 39, '2023-08-25 08:52:34', '2023-08-25 08:52:34', NULL),
(52, 39, 9, 39, '2023-08-25 08:54:18', '2023-08-25 08:54:18', NULL),
(53, 39, 9, 39, '2023-08-25 09:06:27', '2023-08-25 09:06:27', NULL),
(54, 39, 9, 39, '2023-08-25 09:10:42', '2023-08-25 09:10:42', NULL),
(55, 8, 10, 8, '2023-08-25 09:13:00', '2023-08-25 09:13:00', NULL),
(56, 8, 10, 8, '2023-08-25 09:13:25', '2023-08-25 09:13:25', NULL),
(57, 39, 9, 39, '2023-08-25 09:13:56', '2023-08-25 09:13:56', NULL),
(58, 39, 11, 39, '2023-08-25 09:15:30', '2023-08-25 09:15:30', NULL),
(59, 39, 11, 39, '2023-08-25 09:16:07', '2023-08-25 09:16:07', NULL),
(60, 39, 9, 39, '2023-08-25 09:16:12', '2023-08-25 09:16:12', NULL),
(61, 39, 12, 39, '2023-08-25 09:17:13', '2023-08-25 09:17:13', NULL),
(62, 39, 9, 39, '2023-08-25 09:17:25', '2023-08-25 09:17:25', NULL),
(63, 39, 13, 39, '2023-08-25 09:18:42', '2023-08-25 09:18:42', NULL),
(64, 39, 13, 39, '2023-08-25 09:19:16', '2023-08-25 09:19:16', NULL),
(65, 39, 12, 39, '2023-08-25 09:20:32', '2023-08-25 09:20:32', NULL),
(66, 39, 12, 39, '2023-08-25 09:21:16', '2023-08-25 09:21:16', NULL),
(67, 39, 13, 39, '2023-08-25 09:21:28', '2023-08-25 09:21:28', NULL),
(68, 39, 11, 39, '2023-08-25 09:21:33', '2023-08-25 09:21:33', NULL),
(69, 39, 13, 39, '2023-08-25 09:21:36', '2023-08-25 09:21:36', NULL),
(70, 39, 8, 39, '2023-08-25 09:21:39', '2023-08-25 09:21:39', NULL),
(71, 39, 11, 39, '2023-08-25 09:21:40', '2023-08-25 09:21:40', NULL),
(72, 39, 12, 39, '2023-08-25 09:21:44', '2023-08-25 09:21:44', NULL),
(73, 39, 11, 39, '2023-08-25 13:14:49', '2023-08-25 13:14:49', NULL),
(74, 39, 13, 39, '2023-08-25 13:17:48', '2023-08-25 13:17:48', NULL),
(75, 39, 12, 39, '2023-08-25 13:18:11', '2023-08-25 13:18:11', NULL),
(76, 39, 8, 39, '2023-08-25 13:18:22', '2023-08-25 13:18:22', NULL),
(77, 39, 7, 39, '2023-08-25 13:34:07', '2023-08-25 13:34:07', NULL),
(78, 39, 13, 39, '2023-08-25 16:08:59', '2023-08-25 16:08:59', NULL),
(79, 39, 8, 39, '2023-08-25 16:09:16', '2023-08-25 16:09:16', NULL),
(80, 39, 13, 39, '2023-08-25 16:10:00', '2023-08-25 16:10:00', NULL),
(81, 39, 12, 39, '2023-08-25 16:10:13', '2023-08-25 16:10:13', NULL),
(82, 39, 2, 39, '2023-08-25 19:44:59', '2023-08-25 19:44:59', NULL),
(83, 39, 1, 39, '2023-08-25 19:45:01', '2023-08-25 19:45:01', NULL),
(84, 39, 3, 39, '2023-08-25 19:47:20', '2023-08-25 19:47:20', NULL),
(85, 39, 4, 39, '2023-08-25 19:49:51', '2023-08-25 19:49:51', NULL),
(86, 39, 6, 39, '2023-08-25 20:28:45', '2023-08-25 20:28:45', NULL),
(87, 39, 6, 39, '2023-08-25 20:29:00', '2023-08-25 20:29:00', NULL),
(88, 39, 6, 39, '2023-08-25 20:34:22', '2023-08-25 20:34:22', NULL),
(89, 39, 8, 39, '2023-08-25 20:39:33', '2023-08-25 20:39:33', NULL),
(90, 39, 7, 39, '2023-08-25 20:39:34', '2023-08-25 20:39:34', NULL),
(91, 39, 9, 39, '2023-08-25 20:42:36', '2023-08-25 20:42:36', NULL),
(92, 39, 9, 39, '2023-08-25 20:43:32', '2023-08-25 20:43:32', NULL),
(93, 39, 9, 39, '2023-08-25 20:43:56', '2023-08-25 20:43:56', NULL),
(94, 39, 9, 39, '2023-08-25 20:45:15', '2023-08-25 20:45:15', NULL),
(95, 39, 10, 39, '2023-08-25 20:47:15', '2023-08-25 20:47:15', NULL),
(96, 39, 9, 39, '2023-08-25 20:47:29', '2023-08-25 20:47:29', NULL),
(97, 39, 9, 39, '2023-08-25 20:48:50', '2023-08-25 20:48:50', NULL),
(98, 39, 11, 39, '2023-08-25 20:51:29', '2023-08-25 20:51:29', NULL),
(99, 39, 12, 39, '2023-08-25 20:53:38', '2023-08-25 20:53:38', NULL),
(100, 39, 9, 39, '2023-08-25 20:54:39', '2023-08-25 20:54:39', NULL),
(101, 39, 12, 39, '2023-08-25 20:54:55', '2023-08-25 20:54:55', NULL),
(102, 39, 9, 39, '2023-08-25 20:55:53', '2023-08-25 20:55:53', NULL),
(103, 39, 4, 39, '2023-08-26 03:50:07', '2023-08-26 03:50:07', NULL),
(104, 39, 4, 39, '2023-08-26 16:32:23', '2023-08-26 16:32:23', NULL),
(105, 39, 4, 39, '2023-08-26 16:33:14', '2023-08-26 16:33:14', NULL),
(106, 39, 3, 39, '2023-08-26 16:33:20', '2023-08-26 16:33:20', NULL),
(107, 39, 3, 39, '2023-08-26 16:33:52', '2023-08-26 16:33:52', NULL),
(108, 39, 2, 39, '2023-08-26 16:34:33', '2023-08-26 16:34:33', NULL),
(109, 39, 2, 39, '2023-08-26 16:50:04', '2023-08-26 16:50:04', NULL),
(110, 39, 4, 39, '2023-08-27 04:00:32', '2023-08-27 04:00:32', NULL),
(111, 39, 4, 39, '2023-08-27 04:07:33', '2023-08-27 04:07:33', NULL),
(112, 39, 3, 39, '2023-08-27 04:07:44', '2023-08-27 04:07:44', NULL),
(113, 39, 2, 39, '2023-08-27 04:07:45', '2023-08-27 04:07:45', NULL),
(114, 39, 6, 39, '2023-08-27 07:32:32', '2023-08-27 07:32:32', NULL),
(115, 39, 4, 39, '2023-08-27 07:32:54', '2023-08-27 07:32:54', NULL),
(116, 39, 3, 39, '2023-08-27 07:33:00', '2023-08-27 07:33:00', NULL),
(117, 39, 7, 39, '2023-08-27 07:38:59', '2023-08-27 07:38:59', NULL),
(118, 39, 7, 39, '2023-08-27 07:40:09', '2023-08-27 07:40:09', NULL),
(119, 39, 7, 39, '2023-08-27 07:44:09', '2023-08-27 07:44:09', NULL),
(120, 39, 7, 39, '2023-08-27 07:44:49', '2023-08-27 07:44:49', NULL),
(121, 39, 7, 39, '2023-08-27 07:45:37', '2023-08-27 07:45:37', NULL),
(122, 39, 7, 39, '2023-08-27 07:45:55', '2023-08-27 07:45:55', NULL),
(123, 39, 6, 39, '2023-08-27 07:46:12', '2023-08-27 07:46:12', NULL),
(124, 39, 7, 39, '2023-08-27 08:04:54', '2023-08-27 08:04:54', NULL),
(125, 39, 7, 39, '2023-08-27 08:05:03', '2023-08-27 08:05:03', NULL),
(126, 39, 7, 39, '2023-08-27 08:05:10', '2023-08-27 08:05:10', NULL),
(127, 39, 7, 39, '2023-08-27 08:05:33', '2023-08-27 08:05:33', NULL),
(128, 39, 7, 39, '2023-08-27 08:05:36', '2023-08-27 08:05:36', NULL),
(129, 39, 7, 39, '2023-08-27 08:05:47', '2023-08-27 08:05:47', NULL),
(130, 39, 7, 39, '2023-08-27 08:06:59', '2023-08-27 08:06:59', NULL),
(131, 39, 7, 39, '2023-08-27 08:07:26', '2023-08-27 08:07:26', NULL),
(132, 39, 7, 39, '2023-08-27 08:08:28', '2023-08-27 08:08:28', NULL),
(133, 39, 7, 39, '2023-08-27 08:09:01', '2023-08-27 08:09:01', NULL),
(134, 39, 7, 39, '2023-08-27 08:09:10', '2023-08-27 08:09:10', NULL),
(135, 39, 8, 39, '2023-08-27 08:09:47', '2023-08-27 08:09:47', NULL),
(136, 39, 1, 39, '2023-08-30 10:25:07', '2023-08-30 10:25:07', NULL),
(137, 39, 1, 39, '2023-08-30 10:25:21', '2023-08-30 10:25:21', NULL),
(138, 39, 1, 39, '2023-08-30 10:25:58', '2023-08-30 10:25:58', NULL),
(139, 39, 2, 39, '2023-08-30 10:27:33', '2023-08-30 10:27:33', NULL),
(140, 39, 2, 39, '2023-08-30 10:28:43', '2023-08-30 10:28:43', NULL),
(141, 39, 3, 39, '2023-08-30 10:29:50', '2023-08-30 10:29:50', NULL),
(142, 39, 3, 39, '2023-08-31 10:15:27', '2023-08-31 10:15:27', NULL),
(143, 39, 2, 39, '2023-08-31 10:15:38', '2023-08-31 10:15:38', NULL),
(144, 39, 2, 39, '2023-08-31 10:20:47', '2023-08-31 10:20:47', NULL),
(145, 39, 3, 39, '2023-08-31 10:37:49', '2023-08-31 10:37:49', NULL),
(146, 39, 6, 39, '2023-09-02 10:56:58', '2023-09-02 10:56:58', NULL),
(147, 39, 2, 39, '2023-09-02 10:57:12', '2023-09-02 10:57:12', NULL),
(148, 39, 3, 39, '2023-09-02 11:56:30', '2023-09-02 11:56:30', NULL),
(149, 39, 3, 39, '2023-09-02 11:56:38', '2023-09-02 11:56:38', NULL),
(150, 39, 2, 39, '2023-09-02 11:56:45', '2023-09-02 11:56:45', NULL),
(151, 39, 12, 39, '2023-09-03 02:05:13', '2023-09-03 02:05:13', NULL),
(152, 39, 12, 39, '2023-09-03 02:07:02', '2023-09-03 02:07:02', NULL),
(153, 39, 12, 39, '2023-09-03 02:09:29', '2023-09-03 02:09:29', NULL),
(154, 39, 12, 39, '2023-09-03 08:53:21', '2023-09-03 08:53:21', NULL),
(155, 39, 12, 39, '2023-09-03 12:11:07', '2023-09-03 12:11:07', NULL),
(156, 39, 12, 39, '2023-09-03 12:34:49', '2023-09-03 12:34:49', NULL),
(157, 39, 15, 39, '2023-09-05 10:24:08', '2023-09-05 10:24:08', NULL),
(158, 39, 15, 39, '2023-09-05 10:45:06', '2023-09-05 10:45:06', NULL),
(159, 39, 18, 39, '2023-09-06 23:28:44', '2023-09-06 23:28:44', NULL),
(160, 39, 18, 39, '2023-09-07 05:32:46', '2023-09-07 05:32:46', NULL),
(161, 39, 29, 39, '2023-09-13 11:22:52', '2023-09-13 11:22:52', NULL),
(162, 39, 26, 39, '2023-09-13 11:23:07', '2023-09-13 11:23:07', NULL),
(163, 39, 26, 39, '2023-09-15 10:28:24', '2023-09-15 10:28:24', NULL),
(164, 39, 26, 39, '2023-09-15 10:30:54', '2023-09-15 10:30:54', NULL),
(165, 39, 1, 39, '2023-09-15 10:42:15', '2023-09-15 10:42:15', NULL),
(166, 39, 1, 39, '2023-09-15 10:43:27', '2023-09-15 10:43:27', NULL),
(167, 39, 30, 39, '2023-09-15 11:42:11', '2023-09-15 11:42:11', NULL),
(168, 39, 30, 39, '2023-09-15 11:49:12', '2023-09-15 11:49:12', NULL),
(169, 39, 30, 39, '2023-09-15 11:49:29', '2023-09-15 11:49:29', NULL),
(170, 39, 26, 39, '2023-09-15 11:51:25', '2023-09-15 11:51:25', NULL),
(171, 39, 26, 39, '2023-09-15 12:24:14', '2023-09-15 12:24:14', NULL),
(172, 39, 23, 39, '2023-09-15 12:43:08', '2023-09-15 12:43:08', NULL),
(173, 39, 31, 39, '2023-09-15 23:31:18', '2023-09-15 23:31:18', NULL),
(174, 39, 31, 39, '2023-09-16 09:41:00', '2023-09-16 09:41:00', NULL),
(175, 39, 31, 39, '2023-09-16 18:28:11', '2023-09-16 18:28:11', NULL),
(176, 39, 30, 39, '2023-09-16 18:28:21', '2023-09-16 18:28:21', NULL),
(177, 39, 1, 39, '2023-09-16 18:46:17', '2023-09-16 18:46:17', NULL),
(178, 39, 31, 39, '2023-09-16 18:48:34', '2023-09-16 18:48:34', NULL),
(179, 39, 31, 39, '2023-09-16 18:48:45', '2023-09-16 18:48:45', NULL),
(180, 39, 1, 39, '2023-09-16 18:49:26', '2023-09-16 18:49:26', NULL),
(181, 39, 26, 39, '2023-09-16 18:57:02', '2023-09-16 18:57:02', NULL),
(182, 39, 26, 39, '2023-09-16 18:57:08', '2023-09-16 18:57:08', NULL),
(183, 39, 31, 39, '2023-09-16 19:12:56', '2023-09-16 19:12:56', NULL),
(184, 39, 2, 39, '2023-09-17 09:36:14', '2023-09-17 09:36:14', NULL),
(185, 39, 1, 39, '2023-09-17 09:36:15', '2023-09-17 09:36:15', NULL),
(186, 39, 1, 39, '2023-09-17 09:42:47', '2023-09-17 09:42:47', NULL),
(187, 39, 2, 39, '2023-09-17 09:42:50', '2023-09-17 09:42:50', NULL),
(188, 39, 2, 39, '2023-09-17 09:45:18', '2023-09-17 09:45:18', NULL),
(189, 39, 45, 39, '2023-09-17 15:08:15', '2023-09-17 15:08:15', NULL),
(190, 39, 47, 39, '2023-09-17 15:08:15', '2023-09-17 15:08:15', NULL),
(191, 39, 42, 39, '2023-09-17 15:34:12', '2023-09-17 15:34:12', NULL),
(192, 39, 46, 39, '2023-09-17 15:50:30', '2023-09-17 15:50:30', NULL),
(193, 39, 49, 39, '2023-09-17 15:52:25', '2023-09-17 15:52:25', NULL),
(194, 39, 50, 39, '2023-09-17 15:54:03', '2023-09-17 15:54:03', NULL),
(195, 39, 51, 39, '2023-09-18 04:53:06', '2023-09-18 04:53:06', NULL),
(196, 39, 52, 39, '2023-09-18 18:07:14', '2023-09-18 18:07:14', NULL),
(197, 39, 52, 39, '2023-09-18 18:19:08', '2023-09-18 18:19:08', NULL),
(198, 39, 52, 39, '2023-09-18 18:31:57', '2023-09-18 18:31:57', NULL),
(199, 39, 52, 39, '2023-09-18 18:32:08', '2023-09-18 18:32:08', NULL),
(200, 39, 52, 39, '2023-09-18 18:41:19', '2023-09-18 18:41:19', NULL),
(201, 39, 53, 39, '2023-09-19 12:34:28', '2023-09-19 12:34:28', NULL),
(202, 39, 54, 39, '2023-09-19 13:07:44', '2023-09-19 13:07:44', NULL),
(203, 39, 56, 39, '2023-09-19 14:09:30', '2023-09-19 14:09:30', NULL),
(204, 39, 56, 39, '2023-09-19 14:09:54', '2023-09-19 14:09:54', NULL),
(205, 39, 56, 39, '2023-09-19 14:13:15', '2023-09-19 14:13:15', NULL),
(206, 39, 56, 39, '2023-09-19 14:13:47', '2023-09-19 14:13:47', NULL),
(207, 39, 56, 39, '2023-09-19 14:16:16', '2023-09-19 14:16:16', NULL),
(208, 39, 56, 39, '2023-09-19 14:17:52', '2023-09-19 14:17:52', NULL),
(209, 39, 55, 39, '2023-09-19 14:22:12', '2023-09-19 14:22:12', NULL),
(210, 39, 55, 39, '2023-09-19 14:24:16', '2023-09-19 14:24:16', NULL),
(211, 39, 56, 39, '2023-09-19 14:27:01', '2023-09-19 14:27:01', NULL),
(212, 39, 55, 39, '2023-09-19 15:02:43', '2023-09-19 15:02:43', NULL),
(213, 39, 55, 39, '2023-09-19 15:10:23', '2023-09-19 15:10:23', NULL),
(214, 39, 54, 39, '2023-09-19 15:19:44', '2023-09-19 15:19:44', NULL),
(215, 39, 54, 39, '2023-09-19 15:22:55', '2023-09-19 15:22:55', NULL),
(216, 39, 54, 39, '2023-09-19 15:27:56', '2023-09-19 15:27:56', NULL),
(217, 39, 54, 39, '2023-09-19 15:30:29', '2023-09-19 15:30:29', NULL),
(218, 39, 54, 39, '2023-09-19 15:31:42', '2023-09-19 15:31:42', NULL),
(219, 39, 53, 39, '2023-09-19 15:44:10', '2023-09-19 15:44:10', NULL),
(220, 39, 53, 39, '2023-09-19 15:55:12', '2023-09-19 15:55:12', NULL),
(221, 39, 57, 39, '2023-09-19 16:11:37', '2023-09-19 16:11:37', NULL),
(222, 39, 56, 39, '2023-09-19 16:14:05', '2023-09-19 16:14:05', NULL),
(223, 39, 58, 39, '2023-09-19 16:51:11', '2023-09-19 16:51:11', NULL),
(224, 39, 58, 39, '2023-09-20 06:03:23', '2023-09-20 06:03:23', NULL),
(225, 39, 56, 39, '2023-09-20 06:05:53', '2023-09-20 06:05:53', NULL),
(226, 39, 41, 39, '2023-09-20 06:05:58', '2023-09-20 06:05:58', NULL),
(227, 39, 56, 39, '2023-09-20 06:05:59', '2023-09-20 06:05:59', NULL),
(228, 39, 58, 39, '2023-09-20 06:07:02', '2023-09-20 06:07:02', NULL),
(229, 39, 57, 39, '2023-09-20 06:07:26', '2023-09-20 06:07:26', NULL),
(230, 39, 54, 39, '2023-09-20 06:14:04', '2023-09-20 06:14:04', NULL),
(231, 39, 58, 39, '2023-09-20 17:56:44', '2023-09-20 17:56:44', NULL),
(232, 39, 57, 39, '2023-09-20 17:56:51', '2023-09-20 17:56:51', NULL),
(233, 39, 57, 39, '2023-09-20 17:59:32', '2023-09-20 17:59:32', NULL),
(234, 39, 58, 39, '2023-09-20 17:59:39', '2023-09-20 17:59:39', NULL),
(235, 39, 58, 39, '2023-09-20 18:00:00', '2023-09-20 18:00:00', NULL),
(236, 39, 58, 39, '2023-09-20 18:00:11', '2023-09-20 18:00:11', NULL),
(237, 39, 56, 39, '2023-09-20 18:04:51', '2023-09-20 18:04:51', NULL),
(238, 39, 56, 39, '2023-09-20 18:05:10', '2023-09-20 18:05:10', NULL),
(239, 39, 58, 39, '2023-09-20 18:13:47', '2023-09-20 18:13:47', NULL),
(240, 39, 57, 39, '2023-09-20 18:15:35', '2023-09-20 18:15:35', NULL),
(241, 39, 57, 39, '2023-09-20 18:15:39', '2023-09-20 18:15:39', NULL),
(242, 39, 55, 39, '2023-09-20 18:17:43', '2023-09-20 18:17:43', NULL),
(243, 39, 55, 39, '2023-09-20 18:18:09', '2023-09-20 18:18:09', NULL),
(244, 39, 55, 39, '2023-09-20 18:19:41', '2023-09-20 18:19:41', NULL),
(245, 39, 47, 39, '2023-09-20 18:20:13', '2023-09-20 18:20:13', NULL),
(246, 39, 47, 39, '2023-09-20 18:21:01', '2023-09-20 18:21:01', NULL),
(247, 39, 47, 39, '2023-09-20 18:21:07', '2023-09-20 18:21:07', NULL),
(248, 39, 53, 39, '2023-09-20 18:23:53', '2023-09-20 18:23:53', NULL),
(249, 39, 53, 39, '2023-09-20 18:23:58', '2023-09-20 18:23:58', NULL),
(250, 39, 53, 39, '2023-09-20 18:24:11', '2023-09-20 18:24:11', NULL),
(251, 39, 53, 39, '2023-09-20 18:26:14', '2023-09-20 18:26:14', NULL),
(252, 39, 58, 39, '2023-09-20 18:26:22', '2023-09-20 18:26:22', NULL),
(253, 39, 57, 39, '2023-09-20 18:26:28', '2023-09-20 18:26:28', NULL),
(254, 39, 26, 39, '2023-09-20 18:26:40', '2023-09-20 18:26:40', NULL),
(255, 39, 57, 39, '2023-09-20 18:26:56', '2023-09-20 18:26:56', NULL),
(256, 39, 58, 39, '2023-09-20 18:28:03', '2023-09-20 18:28:03', NULL),
(257, 39, 53, 39, '2023-09-21 19:44:01', '2023-09-21 19:44:01', NULL),
(258, 39, 47, 39, '2023-09-21 19:47:30', '2023-09-21 19:47:30', NULL),
(259, 39, 58, 39, '2023-09-22 04:03:41', '2023-09-22 04:03:41', NULL),
(260, 39, 59, 39, '2023-09-22 05:12:54', '2023-09-22 05:12:54', NULL),
(261, 39, 59, 39, '2023-09-22 05:15:11', '2023-09-22 05:15:11', NULL),
(262, 39, 60, 39, '2023-09-22 05:41:07', '2023-09-22 05:41:07', NULL),
(263, 39, 59, 39, '2023-09-22 05:49:00', '2023-09-22 05:49:00', NULL),
(264, 39, 59, 39, '2023-09-22 05:49:33', '2023-09-22 05:49:33', NULL),
(265, 39, 60, 39, '2023-09-22 05:50:49', '2023-09-22 05:50:49', NULL),
(266, 39, 60, 39, '2023-09-22 05:54:43', '2023-09-22 05:54:43', NULL),
(267, 39, 60, 39, '2023-09-22 06:05:16', '2023-09-22 06:05:16', NULL),
(268, 39, 60, 39, '2023-09-22 06:05:55', '2023-09-22 06:05:55', NULL),
(269, 39, 56, 39, '2023-09-22 06:09:40', '2023-09-22 06:09:40', NULL),
(270, 39, 60, 39, '2023-09-22 17:38:35', '2023-09-22 17:38:35', NULL),
(271, 39, 60, 39, '2023-09-22 17:38:39', '2023-09-22 17:38:39', NULL),
(272, 39, 60, 39, '2023-09-22 17:38:39', '2023-09-22 17:38:39', NULL),
(273, 39, 60, 39, '2023-09-22 17:48:13', '2023-09-22 17:48:13', NULL),
(274, 39, 60, 39, '2023-09-22 17:48:28', '2023-09-22 17:48:28', NULL),
(275, 39, 60, 39, '2023-09-23 03:28:22', '2023-09-23 03:28:22', NULL),
(276, 39, 60, 39, '2023-09-23 03:28:30', '2023-09-23 03:28:30', NULL),
(277, 39, 60, 39, '2023-09-23 03:36:51', '2023-09-23 03:36:51', NULL),
(278, 39, 60, 39, '2023-09-23 04:25:59', '2023-09-23 04:25:59', NULL),
(279, 39, 31, 39, '2023-09-23 07:01:20', '2023-09-23 07:01:20', NULL),
(280, 39, 55, 39, '2023-09-23 08:12:20', '2023-09-23 08:12:20', NULL),
(281, 39, 62, 39, '2023-09-23 10:32:24', '2023-09-23 10:32:24', NULL),
(282, 39, 62, 39, '2023-09-23 10:32:51', '2023-09-23 10:32:51', NULL),
(283, 39, 62, 39, '2023-09-23 10:35:03', '2023-09-23 10:35:03', NULL),
(284, 39, 62, 39, '2023-09-23 10:35:33', '2023-09-23 10:35:33', NULL),
(285, 39, 62, 39, '2023-09-23 10:35:40', '2023-09-23 10:35:40', NULL),
(286, 39, 62, 39, '2023-09-23 10:41:30', '2023-09-23 10:41:30', NULL),
(287, 39, 63, 39, '2023-09-23 10:48:05', '2023-09-23 10:48:05', NULL),
(288, 39, 64, 39, '2023-09-23 11:44:46', '2023-09-23 11:44:46', NULL),
(289, 39, 65, 39, '2023-09-23 11:54:46', '2023-09-23 11:54:46', NULL),
(290, 39, 65, 39, '2023-09-23 11:55:48', '2023-09-23 11:55:48', NULL),
(291, 39, 65, 39, '2023-09-23 11:59:13', '2023-09-23 11:59:13', NULL),
(292, 39, 64, 39, '2023-09-23 12:01:20', '2023-09-23 12:01:20', NULL),
(293, 39, 66, 39, '2023-09-23 12:06:55', '2023-09-23 12:06:55', NULL),
(294, 39, 67, 39, '2023-09-23 12:17:09', '2023-09-23 12:17:09', NULL),
(295, 39, 67, 39, '2023-09-23 12:29:37', '2023-09-23 12:29:37', NULL),
(296, 39, 55, 39, '2023-09-23 17:18:30', '2023-09-23 17:18:30', NULL),
(297, 39, 58, 39, '2023-09-23 18:19:04', '2023-09-23 18:19:04', NULL),
(298, 39, 58, 39, '2023-09-23 18:20:28', '2023-09-23 18:20:28', NULL),
(299, 39, 58, 39, '2023-09-23 18:40:40', '2023-09-23 18:40:40', NULL),
(300, 39, 68, 39, '2023-09-23 18:51:29', '2023-09-23 18:51:29', NULL),
(301, 39, 69, 39, '2023-09-25 07:15:36', '2023-09-25 07:15:36', NULL),
(302, 39, 67, 39, '2023-09-25 07:29:01', '2023-09-25 07:29:01', NULL),
(303, 39, 67, 39, '2023-09-25 07:35:14', '2023-09-25 07:35:14', NULL),
(304, 39, 70, 39, '2023-09-25 07:56:08', '2023-09-25 07:56:08', NULL),
(305, 39, 71, 39, '2023-09-25 08:06:04', '2023-09-25 08:06:04', NULL),
(306, 39, 72, 39, '2023-09-25 08:19:36', '2023-09-25 08:19:36', NULL),
(307, 39, 72, 39, '2023-09-25 08:21:55', '2023-09-25 08:21:55', NULL),
(308, 39, 68, 39, '2023-09-25 14:32:15', '2023-09-25 14:32:15', NULL),
(309, 39, 70, 39, '2023-09-25 14:32:31', '2023-09-25 14:32:31', NULL),
(310, 39, 62, 39, '2023-09-25 14:36:06', '2023-09-25 14:36:06', NULL),
(311, 39, 65, 39, '2023-09-25 14:37:03', '2023-09-25 14:37:03', NULL),
(312, 39, 72, 39, '2023-09-25 16:01:28', '2023-09-25 16:01:28', NULL),
(313, 39, 70, 39, '2023-09-26 05:26:02', '2023-09-26 05:26:02', NULL),
(314, 39, 70, 39, '2023-09-26 05:26:14', '2023-09-26 05:26:14', NULL),
(315, 39, 68, 39, '2023-09-26 12:42:35', '2023-09-26 12:42:35', NULL),
(316, 39, 70, 39, '2023-09-26 12:45:55', '2023-09-26 12:45:55', NULL),
(317, 39, 67, 39, '2023-09-26 12:46:48', '2023-09-26 12:46:48', NULL),
(318, 39, 70, 39, '2023-09-26 12:47:20', '2023-09-26 12:47:20', NULL),
(319, 39, 70, 39, '2023-09-26 12:49:10', '2023-09-26 12:49:10', NULL),
(320, 39, 67, 39, '2023-09-26 12:49:18', '2023-09-26 12:49:18', NULL),
(321, 39, 67, 39, '2023-09-26 12:49:36', '2023-09-26 12:49:36', NULL),
(322, 39, 64, 39, '2023-09-26 12:49:49', '2023-09-26 12:49:49', NULL),
(323, 39, 70, 39, '2023-09-26 12:50:16', '2023-09-26 12:50:16', NULL),
(324, 39, 69, 39, '2023-09-26 12:55:02', '2023-09-26 12:55:02', NULL),
(325, 39, 67, 39, '2023-09-26 12:56:09', '2023-09-26 12:56:09', NULL),
(326, 39, 70, 39, '2023-09-26 13:06:51', '2023-09-26 13:06:51', NULL),
(327, 39, 71, 39, '2023-09-26 17:34:05', '2023-09-26 17:34:05', NULL),
(328, 39, 71, 39, '2023-09-26 17:40:52', '2023-09-26 17:40:52', NULL),
(329, 39, 66, 39, '2023-09-26 17:49:08', '2023-09-26 17:49:08', NULL),
(330, 39, 55, 39, '2023-09-26 17:49:11', '2023-09-26 17:49:11', NULL),
(331, 39, 48, 39, '2023-09-26 17:49:13', '2023-09-26 17:49:13', NULL),
(332, 39, 70, 39, '2023-09-26 17:49:49', '2023-09-26 17:49:49', NULL),
(333, 39, 68, 39, '2023-09-26 17:49:50', '2023-09-26 17:49:50', NULL),
(334, 39, 67, 39, '2023-09-26 17:49:51', '2023-09-26 17:49:51', NULL),
(335, 39, 65, 39, '2023-09-26 17:49:52', '2023-09-26 17:49:52', NULL),
(336, 39, 72, 39, '2023-09-26 17:52:49', '2023-09-26 17:52:49', NULL),
(337, 39, 69, 39, '2023-09-26 17:52:50', '2023-09-26 17:52:50', NULL),
(338, 39, 72, 39, '2023-09-26 17:54:29', '2023-09-26 17:54:29', NULL),
(339, 39, 70, 39, '2023-09-26 18:18:30', '2023-09-26 18:18:30', NULL),
(340, 39, 70, 39, '2023-09-26 18:19:14', '2023-09-26 18:19:14', NULL),
(341, 39, 70, 39, '2023-09-27 04:02:13', '2023-09-27 04:02:13', NULL),
(342, 39, 70, 39, '2023-09-27 04:03:11', '2023-09-27 04:03:11', NULL),
(343, 39, 62, 39, '2023-09-27 16:20:51', '2023-09-27 16:20:51', NULL),
(344, 39, 70, 39, '2023-09-27 16:20:55', '2023-09-27 16:20:55', NULL),
(345, 39, 68, 39, '2023-09-27 16:21:51', '2023-09-27 16:21:51', NULL),
(346, 39, 60, 39, '2023-09-27 16:22:06', '2023-09-27 16:22:06', NULL),
(347, 39, 59, 39, '2023-09-27 16:22:18', '2023-09-27 16:22:18', NULL),
(348, 39, 57, 39, '2023-09-27 16:22:27', '2023-09-27 16:22:27', NULL),
(349, 39, 62, 39, '2023-09-27 16:24:07', '2023-09-27 16:24:07', NULL),
(350, 39, 70, 39, '2023-09-27 16:39:55', '2023-09-27 16:39:55', NULL),
(351, 39, 70, 39, '2023-09-27 16:40:33', '2023-09-27 16:40:33', NULL),
(352, 39, 73, 39, '2023-09-29 09:23:54', '2023-09-29 09:23:54', NULL),
(353, 39, 73, 39, '2023-09-29 09:25:17', '2023-09-29 09:25:17', NULL),
(354, 39, 73, 39, '2023-09-29 09:25:50', '2023-09-29 09:25:50', NULL),
(355, 39, 73, 39, '2023-09-29 09:26:48', '2023-09-29 09:26:48', NULL),
(356, 39, 73, 39, '2023-09-29 09:27:28', '2023-09-29 09:27:28', NULL),
(357, 39, 73, 39, '2023-09-29 09:28:08', '2023-09-29 09:28:08', NULL),
(358, 39, 62, 39, '2023-09-29 09:28:18', '2023-09-29 09:28:18', NULL),
(359, 39, 73, 39, '2023-09-29 09:28:27', '2023-09-29 09:28:27', NULL),
(360, 39, 51, 39, '2023-10-01 18:32:15', '2023-10-01 18:32:15', NULL),
(361, 39, 70, 39, '2023-10-01 18:35:57', '2023-10-01 18:35:57', NULL),
(362, 39, 77, 39, '2023-10-03 07:02:26', '2023-10-03 07:02:26', NULL),
(363, 39, 77, 39, '2023-10-03 07:02:40', '2023-10-03 07:02:40', NULL),
(364, 39, 78, 39, '2023-10-03 07:43:26', '2023-10-03 07:43:26', NULL),
(365, 39, 79, 39, '2023-10-03 07:59:39', '2023-10-03 07:59:39', NULL),
(366, 39, 79, 39, '2023-10-03 08:00:17', '2023-10-03 08:00:17', NULL),
(367, 39, 79, 39, '2023-10-03 08:01:08', '2023-10-03 08:01:08', NULL),
(368, 39, 79, 39, '2023-10-03 08:03:12', '2023-10-03 08:03:12', NULL),
(369, 39, 79, 39, '2023-10-03 08:03:30', '2023-10-03 08:03:30', NULL),
(370, 39, 79, 39, '2023-10-03 08:03:41', '2023-10-03 08:03:41', NULL),
(371, 39, 44, 39, '2023-10-03 08:08:39', '2023-10-03 08:08:39', NULL),
(372, 39, 80, 39, '2023-10-03 08:24:15', '2023-10-03 08:24:15', NULL),
(373, 39, 80, 39, '2023-10-03 08:26:20', '2023-10-03 08:26:20', NULL),
(374, 39, 80, 39, '2023-10-03 08:26:30', '2023-10-03 08:26:30', NULL),
(375, 39, 70, 39, '2023-10-04 11:04:56', '2023-10-04 11:04:56', NULL),
(376, 39, 35, 39, '2023-10-04 16:01:50', '2023-10-04 16:01:50', NULL),
(377, 39, 55, 39, '2023-10-06 06:09:37', '2023-10-06 06:09:37', NULL),
(378, 39, 55, 39, '2023-10-06 06:10:52', '2023-10-06 06:10:52', NULL),
(379, 39, 70, 39, '2023-10-06 11:26:36', '2023-10-06 11:26:36', NULL),
(380, 39, 79, 39, '2023-10-06 11:30:29', '2023-10-06 11:30:29', NULL),
(381, 39, 79, 39, '2023-10-06 11:43:34', '2023-10-06 11:43:34', NULL),
(382, 39, 30, 39, '2023-10-06 11:44:03', '2023-10-06 11:44:03', NULL),
(383, 39, 71, 39, '2023-10-06 11:44:31', '2023-10-06 11:44:31', NULL),
(384, 39, 71, 39, '2023-10-06 11:44:43', '2023-10-06 11:44:43', NULL),
(385, 39, 80, 39, '2023-10-06 11:45:10', '2023-10-06 11:45:10', NULL),
(386, 39, 79, 39, '2023-10-06 16:29:33', '2023-10-06 16:29:33', NULL),
(387, 39, 79, 39, '2023-10-06 16:40:57', '2023-10-06 16:40:57', NULL),
(388, 39, 67, 39, '2023-10-06 16:54:38', '2023-10-06 16:54:38', NULL),
(389, 39, 79, 39, '2023-10-06 17:27:26', '2023-10-06 17:27:26', NULL),
(390, 39, 79, 39, '2023-10-06 17:38:59', '2023-10-06 17:38:59', NULL),
(391, 39, 70, 39, '2023-10-06 17:39:07', '2023-10-06 17:39:07', NULL),
(392, 39, 62, 39, '2023-10-06 17:39:08', '2023-10-06 17:39:08', NULL),
(393, 39, 79, 39, '2023-10-06 17:41:03', '2023-10-06 17:41:03', NULL),
(394, 39, 70, 39, '2023-10-06 17:41:04', '2023-10-06 17:41:04', NULL),
(395, 39, 70, 39, '2023-10-06 17:42:00', '2023-10-06 17:42:00', NULL),
(396, 39, 31, 39, '2023-10-06 17:44:07', '2023-10-06 17:44:07', NULL),
(397, 39, 26, 39, '2023-10-06 17:44:19', '2023-10-06 17:44:19', NULL),
(398, 39, 80, 39, '2023-10-06 17:49:29', '2023-10-06 17:49:29', NULL),
(399, 39, 80, 39, '2023-10-06 17:49:40', '2023-10-06 17:49:40', NULL),
(400, 39, 77, 39, '2023-10-06 17:50:26', '2023-10-06 17:50:26', NULL),
(401, 39, 79, 39, '2023-10-06 17:50:37', '2023-10-06 17:50:37', NULL),
(402, 39, 77, 39, '2023-10-06 17:50:46', '2023-10-06 17:50:46', NULL),
(403, 39, 78, 39, '2023-10-06 17:50:59', '2023-10-06 17:50:59', NULL),
(404, 39, 64, 39, '2023-10-06 17:51:17', '2023-10-06 17:51:17', NULL),
(405, 39, 70, 39, '2023-10-06 17:51:52', '2023-10-06 17:51:52', NULL),
(406, 39, 44, 39, '2023-10-06 17:52:14', '2023-10-06 17:52:14', NULL),
(407, 39, 44, 39, '2023-10-06 19:04:00', '2023-10-06 19:04:00', NULL),
(408, 39, 80, 39, '2023-10-06 19:04:02', '2023-10-06 19:04:02', NULL),
(409, 39, 44, 39, '2023-10-06 19:12:07', '2023-10-06 19:12:07', NULL),
(410, 39, 80, 39, '2023-10-06 19:12:16', '2023-10-06 19:12:16', NULL),
(411, 39, 78, 39, '2023-10-07 08:34:54', '2023-10-07 08:34:54', NULL),
(412, 39, 78, 39, '2023-10-07 08:37:07', '2023-10-07 08:37:07', NULL),
(413, 39, 78, 39, '2023-10-07 12:58:56', '2023-10-07 12:58:56', NULL),
(414, 39, 62, 39, '2023-10-07 13:00:44', '2023-10-07 13:00:44', NULL),
(415, 39, 78, 39, '2023-10-07 13:27:14', '2023-10-07 13:27:14', NULL),
(416, 39, 31, 39, '2023-10-07 13:30:52', '2023-10-07 13:30:52', NULL),
(417, 39, 62, 39, '2023-10-07 18:52:56', '2023-10-07 18:52:56', NULL),
(418, 39, 79, 39, '2023-10-07 18:52:56', '2023-10-07 18:52:56', NULL),
(419, 39, 43, 39, '2023-10-07 18:52:57', '2023-10-07 18:52:57', NULL),
(420, 39, 62, 39, '2023-10-07 18:56:27', '2023-10-07 18:56:27', NULL),
(421, 39, 62, 39, '2023-10-07 18:57:12', '2023-10-07 18:57:12', NULL),
(422, 39, 62, 39, '2023-10-07 18:59:22', '2023-10-07 18:59:22', NULL),
(423, 39, 62, 39, '2023-10-07 19:27:32', '2023-10-07 19:27:32', NULL),
(424, 39, 44, 39, '2023-10-08 05:14:36', '2023-10-08 05:14:36', NULL),
(425, 39, 62, 39, '2023-10-08 11:53:28', '2023-10-08 11:53:28', NULL),
(426, 39, 78, 39, '2023-10-08 16:51:06', '2023-10-08 16:51:06', NULL),
(427, 39, 78, 39, '2023-10-08 16:53:36', '2023-10-08 16:53:36', NULL),
(428, 39, 62, 39, '2023-10-08 17:08:43', '2023-10-08 17:08:43', NULL),
(429, 39, 76, 39, '2023-10-09 03:35:43', '2023-10-09 03:35:43', NULL),
(430, 39, 78, 39, '2023-10-09 03:36:07', '2023-10-09 03:36:07', NULL),
(431, 39, 78, 39, '2023-10-09 03:38:42', '2023-10-09 03:38:42', NULL),
(432, 39, 26, 39, '2023-10-09 06:10:42', '2023-10-09 06:10:42', NULL),
(433, 39, 43, 39, '2023-10-09 06:10:45', '2023-10-09 06:10:45', NULL),
(434, 39, 57, 39, '2023-10-09 06:10:51', '2023-10-09 06:10:51', NULL),
(435, 39, 73, 39, '2023-10-09 06:11:04', '2023-10-09 06:11:04', NULL),
(436, 39, 77, 39, '2023-10-09 06:11:07', '2023-10-09 06:11:07', NULL),
(437, 39, 79, 39, '2023-10-09 06:11:09', '2023-10-09 06:11:09', NULL),
(438, 39, 78, 39, '2023-10-09 12:27:35', '2023-10-09 12:27:35', NULL),
(439, 39, 78, 39, '2023-10-09 12:28:42', '2023-10-09 12:28:42', NULL),
(440, 39, 78, 39, '2023-10-09 16:06:56', '2023-10-09 16:06:56', NULL),
(441, 39, 39, 39, '2023-10-10 05:14:14', '2023-10-10 05:14:14', NULL),
(442, 39, 39, 39, '2023-10-10 05:15:37', '2023-10-10 05:15:37', NULL),
(443, 39, 61, 39, '2023-10-10 05:20:18', '2023-10-10 05:20:18', NULL),
(444, 39, 62, 39, '2023-10-10 05:20:37', '2023-10-10 05:20:37', NULL),
(445, 39, 78, 39, '2023-10-10 05:59:38', '2023-10-10 05:59:38', NULL),
(446, 39, 61, 39, '2023-10-10 06:07:29', '2023-10-10 06:07:29', NULL),
(447, 39, 61, 39, '2023-10-10 06:14:49', '2023-10-10 06:14:49', NULL),
(448, 39, 74, 39, '2023-10-10 07:26:00', '2023-10-10 07:26:00', NULL),
(449, 39, 76, 39, '2023-10-10 17:36:20', '2023-10-10 17:36:20', NULL),
(450, 39, 75, 39, '2023-10-10 17:36:43', '2023-10-10 17:36:43', NULL),
(451, 39, 76, 39, '2023-10-10 17:36:45', '2023-10-10 17:36:45', NULL),
(452, 39, 71, 39, '2023-10-13 02:59:14', '2023-10-13 02:59:14', NULL),
(453, 39, 62, 39, '2023-10-14 05:57:30', '2023-10-14 05:57:30', NULL),
(454, 39, 71, 39, '2023-10-23 07:10:58', '2023-10-23 07:10:58', NULL),
(455, 39, 78, 39, '2023-10-23 17:52:03', '2023-10-23 17:52:03', NULL),
(456, 39, 78, 39, '2023-10-23 17:52:30', '2023-10-23 17:52:30', NULL),
(457, 39, 78, 39, '2023-10-23 17:56:49', '2023-10-23 17:56:49', NULL),
(458, 39, 78, 39, '2023-10-23 17:57:00', '2023-10-23 17:57:00', NULL),
(459, 39, 78, 39, '2023-10-23 17:58:43', '2023-10-23 17:58:43', NULL),
(460, 39, 78, 39, '2023-10-23 18:03:06', '2023-10-23 18:03:06', NULL),
(461, 39, 78, 39, '2023-10-23 18:08:36', '2023-10-23 18:08:36', NULL),
(462, 39, 78, 39, '2023-10-23 19:42:41', '2023-10-23 19:42:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quick_schedule_visit`
--

CREATE TABLE `quick_schedule_visit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enquiry_id` int(11) DEFAULT NULL,
  `visit_status` varchar(180) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `visit_date` datetime DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `email_reminder` tinyint(4) DEFAULT 0,
  `sms_reminder` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `schedule_remind` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `property_list` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quick_schedule_visit`
--

INSERT INTO `quick_schedule_visit` (`id`, `enquiry_id`, `visit_status`, `description`, `visit_date`, `assigned_to`, `assigned_by`, `status`, `email_reminder`, `sms_reminder`, `created_at`, `updated_at`, `deleted_at`, `schedule_remind`, `property_list`) VALUES
(1, 1, 'Confirmed', 'sada', '2023-09-13 00:33:00', NULL, 39, 1, NULL, NULL, '2023-08-31 13:33:39', '2023-08-31 13:33:39', NULL, NULL, '[\"2\"]'),
(2, 2, 'Completed', NULL, '2023-09-16 09:15:00', 39, 39, 0, 0, 0, '2023-09-07 22:15:38', '2023-09-07 22:17:09', NULL, '[]', '[\"6\"]'),
(3, 2, NULL, NULL, '2023-09-09 09:17:00', 39, 39, 1, 0, 0, '2023-09-07 22:17:09', '2023-09-07 22:17:09', NULL, '[]', '[\"5\"]'),
(4, 3, 'Confirmed', NULL, '2023-09-15 09:32:00', 49, 49, 0, 0, 0, '2023-09-07 22:32:25', '2023-09-07 22:37:23', NULL, '[]', '[\"7\"]'),
(5, 3, NULL, NULL, '2023-09-15 09:37:00', 49, 49, 1, 0, 0, '2023-09-07 22:37:23', '2023-09-07 22:37:23', NULL, '[]', '[]'),
(6, 5, 'Confirmed', 'sdad', '2023-02-21 23:38:00', 50, 39, 0, 0, 0, '2023-09-10 12:35:47', '2023-09-12 10:58:23', NULL, '[]', '[\"6\"]'),
(7, 5, 'Confirmed', 'bharat makvn', '2023-02-21 23:38:00', 50, 39, 0, 0, 0, '2023-09-12 10:58:23', '2023-09-12 12:13:00', NULL, '[]', '[\"6\"]'),
(8, 5, 'Confirmed', 'ggggggggggggggggg', '2023-02-21 23:38:00', 50, 39, 1, 0, 0, '2023-09-12 12:13:00', '2023-09-12 12:13:00', NULL, '[]', '[\"6\"]'),
(9, 14, 'Completed', 'asda', '2023-10-09 00:00:00', 39, 39, 0, 1, 0, '2023-10-09 03:29:05', '2023-10-09 03:50:49', NULL, '[]', '[\"38\"]'),
(10, 14, 'Confirmed', 'sfsdfds', '2023-10-09 00:00:00', 39, 39, 0, 1, 0, '2023-10-09 03:50:49', '2023-10-09 15:23:24', NULL, '[]', '[\"55\"]'),
(11, 14, 'Completed', 'adasd', '2023-10-09 00:00:00', 66, 39, 0, 1, 0, '2023-10-09 15:23:24', '2023-10-09 15:24:12', NULL, '[]', '[\"55\"]'),
(12, 14, 'Completed', 'dads', '2023-10-09 00:00:00', 50, 39, 0, 1, 0, '2023-10-09 15:24:12', '2023-10-09 15:27:54', NULL, '[]', '[\"38\"]'),
(13, 14, 'Completed', 'dads', '2023-10-09 00:00:00', 50, 39, 0, 1, 0, '2023-10-09 15:27:54', '2023-10-09 15:28:41', NULL, '[]', '[\"38\"]'),
(14, 14, 'Completed', 'dads', '2023-10-09 00:00:00', 50, 39, 1, 1, 0, '2023-10-09 15:28:41', '2023-10-09 15:28:41', NULL, '[]', '[\"38\"]');

-- --------------------------------------------------------

--
-- Table structure for table `rera`
--

CREATE TABLE `rera` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(180) NOT NULL,
  `district` varchar(180) NOT NULL,
  `project_name` varchar(180) NOT NULL,
  `promoter_name` varchar(180) NOT NULL,
  `reg_no` varchar(180) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Admin', 'web', '2022-11-17 22:13:22', '2022-11-17 22:13:22', 8),
(3, 'Super Admin', '', '2023-08-08 10:36:23', '2023-08-08 10:36:31', 8),
(15, 'sales executiev_---_39', 'web', '2023-10-04 12:58:55', '2023-10-04 12:58:55', 39),
(19, 'jewdffvdh_---_39', 'api', '2023-10-25 17:57:00', '2023-10-25 17:57:00', NULL);

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
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 15),
(7, 1),
(7, 15),
(8, 1),
(9, 1),
(10, 1),
(10, 15),
(11, 1),
(11, 15),
(12, 1),
(12, 15),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(23, 15),
(24, 1),
(24, 15),
(25, 1),
(25, 15),
(26, 1),
(26, 15),
(27, 1),
(27, 15),
(28, 1),
(28, 15),
(29, 1),
(29, 15),
(30, 1),
(30, 15),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shared_property`
--

CREATE TABLE `shared_property` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `partner_id` varchar(30) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `accepted` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shared_property`
--

INSERT INTO `shared_property` (`id`, `user_id`, `partner_id`, `property_id`, `accepted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '39', '8', 2, 1, NULL, '2023-09-02 11:57:00', '2023-09-02 11:58:20'),
(2, '39', '8', 78, NULL, NULL, '2023-10-27 16:44:33', '2023-10-27 16:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Gujarat', 6, '2023-08-22 18:18:26', '2023-08-22 18:18:26', NULL),
(2, 'Maharashtra', 6, '2023-08-22 18:18:26', '2023-08-22 18:18:26', NULL),
(3, 'Rajasthan', 6, '2023-08-22 18:19:50', '2023-08-22 18:19:50', NULL),
(7, 'Gujarat', 39, '2023-09-01 11:49:17', '2023-09-01 11:49:17', NULL),
(8, 'Maharashtra', 39, '2023-09-01 11:50:27', '2023-09-01 11:50:27', NULL),
(9, 'Gujarat', 53, '2023-09-11 17:16:54', '2023-09-11 17:16:54', NULL),
(10, 'rajasthan', 39, '2023-09-12 05:49:30', '2023-09-12 05:49:30', NULL),
(11, 'punjab', 39, '2023-09-12 05:49:42', '2023-09-12 05:49:42', NULL),
(12, 'madhyapradesh', 39, '2023-09-12 05:49:53', '2023-09-12 05:49:53', NULL),
(13, 'kerala', 39, '2023-09-12 05:49:58', '2023-09-12 05:49:58', NULL),
(14, 'tamilnadu', 39, '2023-09-12 05:50:06', '2023-09-12 05:50:06', NULL),
(15, 'Gujarat', 74, '2023-10-05 03:33:56', '2023-10-05 03:33:56', NULL),
(16, 'testing', 39, '2023-10-05 16:34:50', '2023-10-06 06:45:14', '2023-10-06 06:45:14'),
(17, 'State test', 39, '2023-10-06 06:45:49', '2023-10-06 06:45:49', NULL),
(18, 'testing', 39, '2023-10-06 17:38:20', '2023-10-06 17:41:10', '2023-10-06 17:41:10'),
(19, 'Gujarat', 79, '2023-10-07 17:27:24', '2023-10-07 17:27:24', NULL),
(20, 'Gujarat', 80, '2023-10-07 17:30:09', '2023-10-07 17:30:09', NULL),
(21, 'Gujarat', 81, '2023-10-07 17:31:59', '2023-10-07 17:31:59', NULL),
(22, 'Gujarat', 82, '2023-10-07 17:36:06', '2023-10-07 17:36:06', NULL),
(23, 'Gujarat', 83, '2023-10-07 17:39:10', '2023-10-07 17:39:10', NULL),
(24, 'Gujarat', 78, '2023-10-12 03:49:48', '2023-10-12 03:49:48', NULL),
(25, 'Rajasthan', 78, '2023-10-12 03:52:05', '2023-10-12 03:52:05', NULL),
(26, 'Maharashtra', 78, '2023-10-12 03:52:09', '2023-10-12 03:52:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(255) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `editable` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `cat_id`, `user_id`, `name`, `editable`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 259, NULL, 'office space', 1, NULL, NULL, NULL),
(2, 259, NULL, 'Co-working', 1, NULL, NULL, NULL),
(3, 260, NULL, 'Ground floor', 1, NULL, NULL, NULL),
(4, 260, NULL, '1st floor', 1, NULL, NULL, NULL),
(5, 260, NULL, '2nd floor', 1, NULL, NULL, NULL),
(6, 260, NULL, '3rd floor', 1, NULL, NULL, NULL),
(7, 261, NULL, 'Warehouse', 1, NULL, NULL, NULL),
(8, 261, NULL, 'Cold Storage', 1, NULL, NULL, NULL),
(9, 261, NULL, 'ind. shed', 1, NULL, NULL, NULL),
(10, 262, NULL, 'Commercial Land', 1, NULL, NULL, NULL),
(11, 262, NULL, 'Agricultural/Farm Land', 1, NULL, NULL, NULL),
(12, 262, NULL, 'Industrial Land', 1, NULL, NULL, NULL),
(13, 254, NULL, '1 rk', 1, NULL, NULL, NULL),
(14, 254, NULL, '1bhk', 1, NULL, NULL, NULL),
(15, 254, NULL, '2bhk', 1, NULL, NULL, NULL),
(16, 254, NULL, '3bhk', 1, NULL, NULL, NULL),
(17, 254, NULL, '4bhk', 1, NULL, NULL, NULL),
(18, 254, NULL, '4+bhk', 1, NULL, NULL, NULL),
(25, 254, 39, '6 bhk', NULL, '2023-09-19 15:57:29', '2023-09-19 15:57:29', NULL),
(26, 255, 39, '5 bhk', NULL, '2023-09-19 16:18:53', '2023-09-19 16:18:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subplans`
--

CREATE TABLE `subplans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subplans`
--

INSERT INTO `subplans` (`id`, `name`, `details`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'First Plan', '\"Test Feature 1_---_Test Feature 2_---_Test Feature 3\"', 5000, '2022-10-11 00:15:11', '2023-08-20 08:52:32', NULL),
(5, 'Second Plan', '\"test feature 1_---_test feature 2_---_test feature 3\"', 2000, '2023-08-20 08:52:51', '2023-08-20 08:52:51', NULL),
(6, 'Third Plan', '\"test feature 1_---_test feature 2_---_test feature 3\"', 1000, '2023-08-20 08:53:12', '2023-08-20 08:53:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `super_areas`
--

CREATE TABLE `super_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `super_city_id` int(11) DEFAULT NULL,
  `pincode` varchar(180) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_areas`
--

INSERT INTO `super_areas` (`id`, `name`, `super_city_id`, `pincode`, `state_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Thaltej', 1, '380059', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(2, 'Satellite City', 1, '380015', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(3, 'SG Highway', 1, '380054', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(4, 'CG Road', 1, '380009', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(5, 'Navrangpura', 1, '380009', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(6, 'Bopal', 1, '380058', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(7, 'Science City Road', 1, '380060', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(8, 'Ambli', 1, '382463', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(9, 'Prahlad Nagar', 1, '380015', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(10, 'Chandkheda', 1, '382424', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(11, 'Vesu', 2, '395007', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(12, 'Adajan', 2, '380058', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(13, 'Pal', 2, '395009', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(14, 'Dindoli', 2, '394210', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(15, 'Althan', 2, '395017', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(16, 'Athwalines', 2, '395001', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(17, 'Palanpur', 2, '395009', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(18, 'Kamrej', 2, '394180', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(19, 'Katargam', 2, '395004', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(20, 'Mota Varachha', 2, '394101', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(21, 'Alkapuri', 3, '390007', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(22, 'Gotri', 3, '390021', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(23, 'Akota', 3, '390020', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(24, 'Fateganj', 3, '390002', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(25, 'Sama', 3, '390008', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(26, 'Karelibaug', 3, '390018', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(27, 'Kaliyabid', 4, '364002', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(28, 'Mahuva', 4, '364290', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(29, 'Ambawadi', 4, '364001', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(30, 'Subhashnagar', 4, '364001', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(31, 'Chitra', 4, '364004', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(32, 'Adalaj', 5, '382421', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(33, 'Sargasan', 5, '382421', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(34, 'Kudasan', 5, '382421', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(35, 'Koba', 5, '382421', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(36, 'Raysan', 5, '382421', 1, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(37, 'Bandra', 6, '400050', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(38, 'Juhu', 6, '400049', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(39, 'Worli', 6, '400018', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(40, 'Andheri', 6, '400047', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(41, 'Dadar', 6, '400014', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(42, 'Borivali', 6, '400091', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(43, 'Pimplad', 7, '422010', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(44, 'Wadgaon', 7, '422203', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(45, 'Umrala', 7, '422003', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(46, 'Wadala', 7, '422006', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(47, 'Devlali Bazar', 7, '422401', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(48, 'Balapur', 8, '431117', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(49, 'Deolai', 8, '431002', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(50, 'Jalan Nagar', 8, '431002', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(51, 'MIDC', 8, '431603', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(52, 'Kanchanwadi', 8, '431011', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(53, 'Manewada', 9, '440024', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(54, 'Koradi Road', 9, '440030', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(55, 'Wardha Road', 9, '440015', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(56, 'Narendra Nagar', 9, '440015', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(57, 'Trimurti Nagar', 9, '440022', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(58, 'Damani Nagar', 10, '413001', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(59, 'Ramling Nagar', 10, '413004', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(60, 'Shelgi', 10, '413006', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(61, 'Soregaon', 10, '413008', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(62, 'Vasant Vihar', 10, '413001', 2, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(63, 'Jhalamand', 11, '342013', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(64, 'Mandore', 11, '342007', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(65, 'Chaukhan', 11, '342001', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(66, 'Gangana Road', 11, '342013', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(67, 'Kabir Nagar', 11, '342001', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(68, 'Garh', 12, '303302', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(69, 'Bapu Nagar', 12, '302015', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(70, 'Phagi', 12, '303005', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(71, 'Sirsi Road', 12, '302012', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(72, 'Tala', 12, '303120', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(73, 'Kotra', 13, '307025', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(74, 'Bakhel', 13, '307025', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(75, 'Karda', 13, '313001', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(76, 'Fatehpur', 13, '313001', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(77, 'Kadia', 13, '313001', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(78, 'Aadsar', 14, '331801', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(79, 'Bandhra', 14, '334803', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(80, 'Chani', 14, '334302', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(81, 'Kharda', 14, '334602', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(82, 'Raisar', 14, '334803', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(83, 'Ajmer', 15, '305001', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(84, 'Banjari', 15, '305926', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(85, 'Barol', 15, '305412', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(86, 'Delwara', 15, '305901', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL),
(87, 'Fathegarh', 15, '305412', 3, '2023-08-23 03:07:13', '2023-08-23 03:07:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `super_cities`
--

CREATE TABLE `super_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_cities`
--

INSERT INTO `super_cities` (`id`, `name`, `state_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ahmedabad', 1, NULL, '2023-08-22 07:08:10', '2023-08-22 07:08:10'),
(2, 'Surat', 1, NULL, '2023-08-22 07:08:10', '2023-08-22 07:08:10'),
(3, 'Vadodara', 1, NULL, '2023-08-22 07:08:10', '2023-08-22 07:08:10'),
(4, 'Bhavnagar', 1, NULL, '2023-08-22 07:08:10', '2023-08-22 07:08:10'),
(5, 'Gandhinagar', 1, NULL, '2023-08-22 07:08:10', '2023-08-22 07:08:10'),
(6, 'Mumbai', 2, NULL, '2023-08-22 12:38:10', '2023-08-22 12:38:10'),
(7, 'Nashik', 2, NULL, '2023-08-22 12:38:10', '2023-08-22 12:38:10'),
(8, 'Aurangabad', 2, NULL, '2023-08-22 12:38:10', '2023-08-22 12:38:10'),
(9, 'Nagpur', 2, NULL, '2023-08-22 12:38:10', '2023-08-22 12:38:10'),
(10, 'Solapur', 2, NULL, '2023-08-22 12:38:10', '2023-08-22 12:38:10'),
(11, 'Jodhpur', 3, NULL, '2023-08-22 12:38:10', '2023-08-22 12:38:10'),
(12, 'Jaipur', 3, NULL, '2023-08-22 12:38:10', '2023-08-22 12:38:10'),
(13, 'Udaipur', 3, NULL, '2023-08-22 12:38:10', '2023-08-22 12:38:10'),
(14, 'Bikaner', 3, NULL, '2023-08-22 12:38:10', '2023-08-22 12:38:10'),
(15, 'Ajmer', 3, NULL, '2023-08-22 12:38:10', '2023-08-22 12:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `taluka`
--

CREATE TABLE `taluka` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `name` varchar(180) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taluka`
--

INSERT INTO `taluka` (`id`, `district_id`, `name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Maliya', 39, NULL, '2023-08-31 12:34:55', NULL),
(2, 2, 'Una', 39, NULL, '2023-08-31 12:34:36', NULL),
(3, 2, 'Veraval', 39, '2023-08-31 12:19:06', '2023-08-31 12:34:36', NULL),
(4, 5, 'bavla', 39, '2023-09-19 14:08:12', '2023-09-19 14:08:12', NULL),
(5, 1, 'testing', 39, '2023-10-06 16:14:55', '2023-10-06 18:25:16', '2023-10-06 18:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tp_schemes`
--

CREATE TABLE `tp_schemes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(180) DEFAULT NULL,
  `villages` varchar(180) DEFAULT NULL,
  `tp_images` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `first_name` varchar(180) DEFAULT NULL,
  `middle_name` varchar(180) DEFAULT NULL,
  `last_name` varchar(180) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `pincode` varchar(180) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `mobile_number` varchar(180) DEFAULT NULL,
  `office_number` varchar(180) DEFAULT NULL,
  `home_number` varchar(180) DEFAULT NULL,
  `company_name` varchar(180) DEFAULT NULL,
  `position` varchar(180) DEFAULT NULL,
  `branch_id` varchar(180) DEFAULT NULL,
  `reporting_to` varchar(180) DEFAULT NULL,
  `property_for_id` varchar(180) DEFAULT NULL,
  `working` int(11) DEFAULT NULL,
  `property_type_id` varchar(180) DEFAULT NULL,
  `specific_properties` text DEFAULT NULL,
  `driving_license` varchar(180) DEFAULT NULL,
  `buildings` text DEFAULT NULL,
  `email` varchar(180) DEFAULT NULL,
  `company_logo` varchar(500) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `otp` text DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT 0,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `vendor_id` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `plan_id` int(11) DEFAULT NULL,
  `subscribed_on` varchar(20) DEFAULT NULL,
  `integer` int(11) DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `verification_token` int(20) DEFAULT NULL,
  `is_verified` int(2) DEFAULT 0,
  `device_type` varchar(220) DEFAULT NULL,
  `device_token` varchar(220) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `first_name`, `middle_name`, `last_name`, `birth_date`, `hire_date`, `pincode`, `city_id`, `state_id`, `mobile_number`, `office_number`, `home_number`, `company_name`, `position`, `branch_id`, `reporting_to`, `property_for_id`, `working`, `property_type_id`, `specific_properties`, `driving_license`, `buildings`, `email`, `company_logo`, `email_verified_at`, `otp`, `email_verified`, `password`, `role_id`, `vendor_id`, `address`, `status`, `plan_id`, `subscribed_on`, `integer`, `remember_token`, `verification_token`, `is_verified`, `device_type`, `device_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, NULL, 'admin', '', 'super', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'superadmin@gmail.com', '', NULL, NULL, 0, '$2y$10$I3faFxToccoy0XV6GN.nDOWBpcqaUGOunJzNWZX90//zFLT5X8f2q', 3, NULL, NULL, 1, 4, NULL, 1, NULL, 0, NULL, NULL, NULL, '2023-01-17 23:33:01', '2023-08-20 08:54:56', NULL),
(8, 8, 'Rishi', 'A', 'Pipaliya', '2023-08-10', '2023-08-07', '546465', 4, 2, '6356357999', '10', '20', 'Bromi', 'Executive', '[]', '[]', NULL, 1, '[]', '[]', '464654654', '[]', 'info@mrweb.co.in', '', NULL, NULL, 0, '$2y$10$TQF3A3lGA0u7vt85Q78VXebmqDH7y8J3muo6o1.cCn//ZTfWvCrSS', 1, 'GNKoxpojDu', 'Near sachin tower', 1, 4, '2023-08-22', 1, NULL, 0, NULL, NULL, NULL, '2022-12-26 07:54:00', '2023-08-22 17:04:28', NULL),
(39, 39, 'Admin', NULL, 'Test', NULL, NULL, '380015', 1, 7, '09988779988', NULL, NULL, 'MrWeb', NULL, '[]', '[]', NULL, 0, '[]', '[]', NULL, '[]', 'admin@mrweb.co.in', 'company_16957865435.png', NULL, NULL, 0, '$2y$10$LRhJyE89Yj7j0DwjSBMrOu/RBlXFRPaSwufFqqTG3R340lVDEURKy', 1, 'G7t2AxpjW8', 'Near civil hospital SG S-1 , ahmedabad', 1, 5, '2023-10-07', 1, NULL, NULL, 1, NULL, NULL, '2023-08-15 12:46:09', '2023-10-07 14:15:53', NULL),
(49, 8, 'Zayn', 'M', 'Warner', '2015-02-05', NULL, '380015', NULL, 4, '1231231232', '222', '1231232', NULL, 'Branch Manager', '[\"3\"]', '[]', NULL, 0, '[]', '[]', NULL, '[]', 'zayn@mrweb.co.in', '', NULL, NULL, 0, '$2y$10$T/OXp6xxmItX5I9JOiriCuxfXyjrOjhELoZBXGEmbUl7lXX6v6Ati', 1, NULL, 'ahmedabad', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, '2023-09-07 22:13:26', '2023-09-07 22:14:33', NULL),
(50, 39, 'Bharat', 'A', 'Makvana', '2005-12-27', '2023-09-18', '46556', 1, 7, '546645564654', '123', '2', NULL, 'Branch Manager', '[]', '[\"50\"]', 'Rent', 0, '[\"87\"]', '[\"255\"]', 'JHJHGJHGJH4654564', '[\"2\"]', 'bharat@mrweb.co.in', '', NULL, NULL, 0, '$2y$10$Q6dEoIg767bftlXGgr0xW.DYrDy4Z4yjFtQQticycnVkUbRyqy5XC', 1, NULL, 'ahd', 0, 4, NULL, 1, NULL, NULL, 1, NULL, NULL, '2023-09-10 08:36:17', '2023-09-18 18:03:35', NULL),
(51, 51, 'test', NULL, 'test2', NULL, NULL, NULL, 1, 1, '1234567809', NULL, NULL, 'test Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bhavik12@gmail.com', '', NULL, NULL, 0, '$2y$10$SN5AfYcb6ypKFkYmZIHRwu7eUUjPrsdHra6NJJRppvnLjt3Qw1ObC', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, '2023-09-20 16:39:25', '2023-09-20 16:39:42', NULL),
(63, 63, 'tester', NULL, 'testing', NULL, NULL, NULL, 7, 1, '1596324870', NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tester@gmail.com', '/tmp/phpQFnkmp', NULL, NULL, 0, '$2y$10$HpFr9uANJVTDlApFHuEaG.DtOdKKraBwIYKVOvBZeUt/vj4aaJNCq', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 5994, 0, NULL, NULL, '2023-09-28 18:41:13', '2023-09-28 18:41:13', NULL),
(64, 64, 'test', NULL, 'test2', NULL, NULL, NULL, 1, 1, '1234567809', NULL, NULL, 'test Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'askerhema8@gmail.com', NULL, NULL, NULL, 0, '$2y$10$KAEmeCd3rEfVAv.2pwGBTOd8064CjQO9Ar6VB4O0wjH/teC1TQFny', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 4358, 0, NULL, NULL, '2023-09-29 16:35:09', '2023-09-29 16:35:09', NULL),
(65, 39, 'dharmesh', 'p', 'patel', '1991-01-01', '2018-12-08', NULL, 1, 7, '4324323432', NULL, NULL, NULL, 'Branch Manager', '[\"14\"]', '[]', 'Rent', 1, '[\"87\"]', '[]', NULL, '[]', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'fef v', 1, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, '2023-10-04 13:03:58', '2023-10-04 13:03:58', NULL),
(66, 39, 'dharmesh', 'p', 'patel', '1991-01-01', '2018-12-08', NULL, 1, 7, '4324323432', NULL, NULL, NULL, 'Branch Manager', '[\"14\"]', '[]', 'Rent', 1, '[\"87\"]', '[]', NULL, '[]', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'fef v', 1, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, '2023-10-04 13:04:03', '2023-10-04 13:04:03', NULL),
(67, 39, 'dharmesh', 'p', 'patel', '1991-01-01', '2018-12-08', NULL, 1, 7, '4324323432', NULL, NULL, NULL, 'Branch Manager', '[\"14\"]', '[]', 'Rent', 1, '[\"87\"]', '[]', NULL, '[]', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'fef v', 1, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, '2023-10-04 13:04:08', '2023-10-04 13:10:04', '2023-10-04 13:10:04'),
(68, 39, 'dharmesh', 'p', 'patel', '1991-01-01', '2018-12-08', NULL, 1, 7, '4324323432', NULL, NULL, NULL, 'Branch Manager', '[\"14\"]', '[]', 'Rent', 1, '[\"87\"]', '[]', NULL, '[]', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'fef v', 1, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, '2023-10-04 13:04:09', '2023-10-04 13:10:01', '2023-10-04 13:10:01'),
(69, 39, 'dharmesh', 'p', 'patel', '1991-01-01', '2018-12-08', NULL, 1, 7, '4324323432', NULL, NULL, NULL, 'Branch Manager', '[\"14\"]', '[]', 'Rent', 1, '[\"87\"]', '[]', NULL, '[]', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'fef v', 1, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, '2023-10-04 13:04:40', '2023-10-04 13:09:59', '2023-10-04 13:09:59'),
(70, 39, 'dharmesh', 'p', 'patel', '1991-01-01', '2018-12-08', NULL, 1, 7, '4324323432', NULL, NULL, NULL, 'Branch Manager', '[\"14\"]', '[]', 'Rent', 1, '[\"87\"]', '[]', NULL, '[]', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'fef v', 1, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, '2023-10-04 13:04:43', '2023-10-04 13:09:57', '2023-10-04 13:09:57'),
(71, 39, 'dharmesh', 'p', 'patel', '1991-01-01', '2018-12-08', NULL, 1, 7, '4324323432', NULL, NULL, NULL, 'Branch Manager', '[\"14\"]', '[]', 'Rent', 1, '[\"87\"]', '[]', NULL, '[]', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'fef v', 1, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, '2023-10-04 13:04:43', '2023-10-04 13:09:54', '2023-10-04 13:09:54'),
(72, 39, 'dharmesh', 'p', 'patel', '1991-01-01', '2018-12-08', NULL, 1, 7, '4324323432', NULL, NULL, NULL, 'Owner', '[\"14\"]', '[]', 'Rent', 1, '[\"87\"]', '[]', NULL, '[]', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, 'fef v', 1, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, '2023-10-04 13:04:49', '2023-10-04 13:09:49', '2023-10-04 13:09:49'),
(73, 39, 'raviraj', NULL, 'chudasama', NULL, NULL, NULL, 1, 7, NULL, NULL, NULL, NULL, NULL, '[]', '[]', 'Rent', 0, '[\"85\"]', '[\"259\"]', NULL, '[]', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, '2023-10-04 13:09:35', '2023-10-04 13:10:25', NULL),
(84, 84, 'test', NULL, 'test2', NULL, NULL, NULL, 1, 1, '1234567809', NULL, NULL, 'test Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc13@gmail.com', NULL, NULL, NULL, 0, '$2y$10$n8MrPxUam3mrRugbYlSUe.jHZtKA14YQMsOwEd98BQ2U/hPEPJfui', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 1683, 0, NULL, NULL, '2023-10-09 11:02:52', '2023-10-09 11:02:52', NULL),
(85, 85, 'test', NULL, 'test2', NULL, NULL, NULL, 1, 1, '1234567809', NULL, NULL, 'test Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc1345@gmail.com', NULL, NULL, NULL, 0, '$2y$10$KPFzyTzwWttH5XJif91yL.FdrFTWHCJhHLL3flSsfE59IF5E5leWO', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 2805, 0, NULL, NULL, '2023-10-09 11:03:07', '2023-10-09 11:03:07', NULL),
(86, 86, 'test', NULL, 'test2', NULL, NULL, NULL, 1, 1, '1234567809', NULL, NULL, 'test Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hedge@gmail.com', NULL, NULL, NULL, 0, '$2y$10$YTcWxnLMbfP9Ggtt1MAVIOv064IcGxeG.P9rWJ8tNNQiOp./X8tte', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 2446, 0, NULL, NULL, '2023-10-09 11:26:43', '2023-10-09 11:26:43', NULL),
(87, 87, 'test', NULL, 'test2', NULL, NULL, NULL, 1, 1, '1234567809', NULL, NULL, 'test Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc1453@gmail.com', NULL, NULL, NULL, 0, '$2y$10$spFh4zny7.HvGAVQ6LP95eoUN/ef8eg0XTwLGNQ2I182U8dS0TBb6', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 8756, 0, NULL, NULL, '2023-10-09 17:02:42', '2023-10-09 17:02:42', NULL),
(88, 39, 'Sachin', 'Bharat', 'Joshi', '1993-07-06', '2023-10-11', '54645465', 1, 7, 'A', '209', '456', NULL, 'Branch Manager', '[\"14\"]', '[\"50\"]', 'Rent', 1, '[\"85\"]', '[\"255\"]', 'HJHSDKJ565+5', '[\"2\"]', 'Asdadasd@gmail.com', NULL, NULL, NULL, 0, '$2y$10$kty6K1jHklEwbLm97UF2B.GkC7Jo/Ce6Xi.Yq55zW/2pnfIT3tixO', 1, NULL, 'Near avelone hospital', 1, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, '2023-10-11 15:01:58', '2023-10-11 15:01:58', NULL),
(89, 89, 'test', NULL, 'test2', NULL, NULL, NULL, 1, 1, '1234567809', NULL, NULL, 'test Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc2453@gmail.com', NULL, NULL, NULL, 0, '$2y$10$yoUJVYtiQJn2dDmUMcqgNOyeplQXm6CNN4oyeHNLB2FEyebqi/IGe', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 9954, 0, NULL, NULL, '2023-10-11 19:05:37', '2023-10-11 19:05:37', NULL),
(90, 90, 'test', NULL, 'test2', NULL, NULL, NULL, 1, 1, '1234567809', NULL, NULL, 'test Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'askerhema23238@gmail.com', NULL, NULL, NULL, 0, '$2y$10$0oQ0gbBoBh.36VJn24ebU.7elFU9hzwcuzAhV/g/cYq5mCfbsgTcy', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 3608, 0, NULL, NULL, '2023-10-12 03:23:45', '2023-10-12 03:23:45', NULL),
(91, 91, 'test', NULL, 'test2', NULL, NULL, NULL, 1, 1, '1234567809', NULL, NULL, 'test Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'askerhema2325238@gmail.com', NULL, NULL, NULL, 0, '$2y$10$vkMebMjNt72OeIODcZofMObahT2w2Jagd5prUYC/WqKsUWVnQCWZq', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 2293, 0, NULL, NULL, '2023-10-12 16:58:17', '2023-10-12 16:58:17', NULL),
(92, 92, 'test', NULL, 'test2', NULL, NULL, NULL, 1, 1, '1234567809', NULL, NULL, 'test Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc@gmail.com', NULL, NULL, NULL, 0, '$2y$10$9KnndwBRsAGuyUvV7wGUOOJDTI5elJbxnWOZdwB/fr1yobiri0MXi', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 5955, 0, NULL, NULL, '2023-10-12 16:58:42', '2023-10-12 16:58:42', NULL),
(93, 93, 'test', NULL, 'test2', NULL, NULL, NULL, 1, 1, '1234567809', NULL, NULL, 'test Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc1@gmail.com', NULL, NULL, NULL, 0, '$2y$10$xNoh7CqFDsNbVXAb1aWjfO7Y5syD5VXebxNrimhzbt0ezDQ/Kvq7W', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, 8893, 0, NULL, NULL, '2023-10-13 01:45:22', '2023-10-13 01:45:22', NULL),
(94, 39, 'New', 'User', 'Test', '2023-10-21', '2023-10-21', '979878', 1, 7, '7979879785', '456', '10', NULL, 'Branch Manager', '[\"14\"]', '[\"50\"]', 'Rent', 1, '[\"87\",\"161\"]', '[\"257\",\"258\"]', 'SSDD', '[\"3\",\"5\"]', 'asdadada@gmail.com', NULL, NULL, NULL, 0, '$2y$10$GGC42Rec/0uoKKi98hGNouM/YHDeT9YAiQltSiZOkFhOtI7LOMucu', 1, NULL, 'Near kalupur', 1, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, '2023-10-21 03:45:53', '2023-10-21 03:45:53', NULL),
(96, 39, 'New', 'User', 'Test', '2023-10-21', '2023-10-21', '979878', 1, 7, '7979879785', '456', '10', NULL, 'Branch Manager', '[\"14\"]', '[\"50\"]', 'Rent', 1, '[\"87\",\"161\"]', '[\"257\",\"258\"]', 'SSDD', '[\"3\",\"5\"]', 'asdadadad@gmail.com', NULL, NULL, NULL, 0, '$2y$10$ZEeLi0gns9LxyhCpIe3e6.vXz7KMhntdFUfFe3qjW0LxBZmwDBBWK', 1, NULL, 'Near kalupur', 1, NULL, NULL, 1, NULL, NULL, 0, NULL, NULL, '2023-10-21 03:46:24', '2023-10-21 03:46:24', NULL),
(97, 97, 'test', NULL, 'test2', NULL, NULL, NULL, 1, 1, '1234567809', NULL, NULL, 'test Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eshaesha243@gmail.com', NULL, NULL, NULL, 0, '$2y$10$ZPuB6F2g1a4OsSsFYBgouOsMIMQWszeUMyl9c9WiUkMOTaLUpsTt6', 1, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, '2023-10-26 16:41:16', '2023-10-26 16:44:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `notification` text DEFAULT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_partners`
--

CREATE TABLE `user_partners` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verification_tokens`
--

CREATE TABLE `verification_tokens` (
  `id` int(20) NOT NULL,
  `token` varchar(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taluka_id` int(11) DEFAULT NULL,
  `name` varchar(180) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`id`, `taluka_id`, `name`, `district_id`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Juthal', 1, 1, 39, '2023-09-01 15:50:27', '2023-09-01 10:20:04', NULL),
(2, 1, 'Gadodar', 1, 1, 39, '2023-09-01 15:50:30', '2023-09-01 10:20:04', NULL),
(3, 2, 'Simar', 2, 1, 39, '2023-09-01 15:50:32', '2023-09-01 10:20:04', NULL),
(4, 3, 'Supashi', 2, 1, 39, '2023-09-01 10:12:01', '2023-09-01 10:19:59', NULL),
(5, 4, 'hadappa', 5, 1, 39, '2023-09-19 14:08:37', '2023-09-19 14:08:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_histories`
--
ALTER TABLE `assign_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiry_id` (`enquiry_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `assign_id` (`assign_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index2` (`state_id`);

--
-- Indexes for table `builders`
--
ALTER TABLE `builders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building_images`
--
ALTER TABLE `building_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_measurement`
--
ALTER TABLE `default_measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropdown_settings`
--
ALTER TABLE `dropdown_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropdown_settings_copy`
--
ALTER TABLE `dropdown_settings_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropdown_template`
--
ALTER TABLE `dropdown_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_bulk`
--
ALTER TABLE `email_bulk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_templates_status_index` (`status`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_comments`
--
ALTER TABLE `enquiry_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_progress`
--
ALTER TABLE `enquiry_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_fields`
--
ALTER TABLE `form_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_types`
--
ALTER TABLE `form_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industrial_properties`
--
ALTER TABLE `industrial_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insta_properties`
--
ALTER TABLE `insta_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_images`
--
ALTER TABLE `land_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_properties`
--
ALTER TABLE `land_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loggedin`
--
ALTER TABLE `loggedin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_units`
--
ALTER TABLE `project_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_partner`
--
ALTER TABLE `property_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_report`
--
ALTER TABLE `property_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_viewer`
--
ALTER TABLE `property_viewer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quick_schedule_visit`
--
ALTER TABLE `quick_schedule_visit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rera`
--
ALTER TABLE `rera`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `shared_property`
--
ALTER TABLE `shared_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subplans`
--
ALTER TABLE `subplans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_areas`
--
ALTER TABLE `super_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_cities`
--
ALTER TABLE `super_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taluka`
--
ALTER TABLE `taluka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_ticket_id_unique` (`ticket_id`);

--
-- Indexes for table `tp_schemes`
--
ALTER TABLE `tp_schemes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_partners`
--
ALTER TABLE `user_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification_tokens`
--
ALTER TABLE `verification_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=727;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `assign_histories`
--
ALTER TABLE `assign_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `builders`
--
ALTER TABLE `builders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `building_images`
--
ALTER TABLE `building_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `default_measurement`
--
ALTER TABLE `default_measurement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dropdown_settings`
--
ALTER TABLE `dropdown_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=572;

--
-- AUTO_INCREMENT for table `dropdown_settings_copy`
--
ALTER TABLE `dropdown_settings_copy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT for table `dropdown_template`
--
ALTER TABLE `dropdown_template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `email_bulk`
--
ALTER TABLE `email_bulk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `enquiry_comments`
--
ALTER TABLE `enquiry_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiry_progress`
--
ALTER TABLE `enquiry_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `form_fields`
--
ALTER TABLE `form_fields`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `form_types`
--
ALTER TABLE `form_types`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `industrial_properties`
--
ALTER TABLE `industrial_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insta_properties`
--
ALTER TABLE `insta_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `land_images`
--
ALTER TABLE `land_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `land_properties`
--
ALTER TABLE `land_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loggedin`
--
ALTER TABLE `loggedin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `project_units`
--
ALTER TABLE `project_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `property_partner`
--
ALTER TABLE `property_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property_report`
--
ALTER TABLE `property_report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `property_viewer`
--
ALTER TABLE `property_viewer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=463;

--
-- AUTO_INCREMENT for table `quick_schedule_visit`
--
ALTER TABLE `quick_schedule_visit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rera`
--
ALTER TABLE `rera`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `shared_property`
--
ALTER TABLE `shared_property`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subplans`
--
ALTER TABLE `subplans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `super_areas`
--
ALTER TABLE `super_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `super_cities`
--
ALTER TABLE `super_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `taluka`
--
ALTER TABLE `taluka`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tp_schemes`
--
ALTER TABLE `tp_schemes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_partners`
--
ALTER TABLE `user_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verification_tokens`
--
ALTER TABLE `verification_tokens`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
