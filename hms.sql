-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 01:43 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hospital_id` bigint(20) UNSIGNED NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `type`, `patient_name`, `patient_id`, `doctor_id`, `location_id`, `hospital_id`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'general physician', 'Bisal Bhatti', 3, 0, 1, 0, '11:53', '2021-07-27 13:53:52', '2021-07-27 13:53:52', NULL),
(2, 'Acupuncturist', 'Bisal Bhatti', 3, 1, 1, 1, 'xyz', '2021-07-28 12:02:17', '2021-07-28 12:02:17', NULL),
(3, 'general physician', 'Bisal Bhatti', 3, 0, 1, 0, 'noed by me', '2021-07-30 03:04:17', '2021-07-30 03:04:17', NULL),
(4, 'Acupuncturist', 'Bisal Bhatti', 3, 1, 1, 1, 'note by doctor appointment', '2021-07-30 03:06:51', '2021-07-30 03:06:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicineName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Paramedical Departments', 'The following laboratories are usually found in the pathology department:\r\n\r\n1. Bacteriology laboratory: This laboratory studies about the bacteria and their toxins.\r\n\r\n\r\n2. Biochemistry : this is concerned with the chemistry of living organisms and of vital process.\r\n\r\n\r\n3. Haematology laboratory : it is responsible for making haemoglobin determinations, coagulation time studies, red and white cell counts and special blood pathology studies for anaemia and leukaemia etc.\r\n\r\n\r\n4. Parasitology laboratory: it studies the presence of parasites, the cyst and ovas of the parasites that are found in the faeces.\r\n\r\n\r\n5. Serology laboratory: it does blood agglutination tests, Wassermann tests, V.D.R.L. etc.\r\n\r\n\r\n6. Blood bank: it has the responsibility for collecting and processing all blood used in the hospital for transfusions. It makes studies on newborn infants who may have haemolytic diseases and does antibody studies on the prenatal client.\r\n\r\n\r\n7. Histopathology department: it prepares tissues for gross and microscopic studies.\r\n\r\nLaboratory services (LAB) must be available day and night. Must be located on the ground floor and should be easily accessible to the outpatients. Space requirement of Lab is:\r\n\r\nPrimary space: Required for technical work.\r\n\r\nSecondary space: space utilized for administrative purpose.\r\n\r\nCirculation space: for unchattered movement of personnel and equipment.\r\n\r\nThere should be sufficient staff and work arrangement for the efficient functioning of the department.', '2021-08-01 06:01:39', '2021-08-01 06:01:39'),
(2, 'Paramedical Departments', 'The following laboratories are usually found in the pathology department:\r\n\r\n1. Bacteriology laboratory: This laboratory studies about the bacteria and their toxins.\r\n\r\n\r\n2. Biochemistry : this is concerned with the chemistry of living organisms and of vital process.\r\n\r\n\r\n3. Haematology laboratory : it is responsible for making haemoglobin determinations, coagulation time studies, red and white cell counts and special blood pathology studies for anaemia and leukaemia etc.\r\n\r\n\r\n4. Parasitology laboratory: it studies the presence of parasites, the cyst and ovas of the parasites that are found in the faeces.\r\n\r\n\r\n5. Serology laboratory: it does blood agglutination tests, Wassermann tests, V.D.R.L. etc.\r\n\r\n\r\n6. Blood bank: it has the responsibility for collecting and processing all blood used in the hospital for transfusions. It makes studies on newborn infants who may have haemolytic diseases and does antibody studies on the prenatal client.\r\n\r\n\r\n7. Histopathology department: it prepares tissues for gross and microscopic studies.\r\n\r\nLaboratory services (LAB) must be available day and night. Must be located on the ground floor and should be easily accessible to the outpatients. Space requirement of Lab is:\r\n\r\nPrimary space: Required for technical work.\r\n\r\nSecondary space: space utilized for administrative purpose.\r\n\r\nCirculation space: for unchattered movement of personnel and equipment.\r\n\r\nThere should be sufficient staff and work arrangement for the efficient functioning of the department.', '2021-08-01 06:01:55', '2021-08-01 06:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visiting_charge` int(10) UNSIGNED NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closing_days` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avater` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `email`, `degree`, `specialist`, `visiting_charge`, `gender`, `phone`, `from`, `to`, `closing_days`, `avater`, `address`, `hospital_id`, `created_at`, `updated_at`) VALUES
(1, 'Ahsan', 'Rajar', 'ahsan@gmail.com', 'D.N.B - Diplomate of national board', '1', 2500, 'male', '03030311333', '17:00', '22:30', 'sunday', '1627455384-Ahsan-Rajar.jpg', 'Doctor Line Sadar Hyderabad', 1, '2021-07-28 01:56:24', '2021-07-28 01:56:24');

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
-- Table structure for table `labtests`
--

CREATE TABLE `labtests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `patient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refered_by_doctor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labtests`
--

INSERT INTO `labtests` (`id`, `date`, `patient`, `refered_by_doctor`, `template`, `report`, `created_at`, `updated_at`) VALUES
(1, '2021-07-31', 'zuhaib patient', 'Ahsan Rajar', NULL, 'report 1', '2021-07-31 06:39:54', '2021-07-31 06:39:54'),
(2, '2021-07-31', 'salman soomro', 'Ahsan Rajar', NULL, 'report 2', '2021-07-31 06:40:49', '2021-07-31 13:52:09'),
(3, '2021-07-31', 'zeeshan soomro', 'Ahsan Rajar', NULL, 'report 3', '2021-07-31 06:41:33', '2021-07-31 08:14:55'),
(4, '2021-07-31', 'ahmed kahn', 'Ahsan Rajar', NULL, 'report 4', '2021-07-31 07:03:23', '2021-07-31 07:03:23'),
(6, '2021-07-31', 'sallu bhai', 'Ahsan Rajar', NULL, 'this is repost that is im gonna check it through testing my web application.\r\n\r\nso...\r\n\r\nLet\'s chekc it', '2021-07-31 12:17:54', '2021-07-31 12:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `email`, `address`, `phone`) VALUES
(1, 'Aagha Khan Hospital', 'hyd@gmail.com', 'Hyderaabd', '1231231231'),
(2, 'Casuality Hospital', 'hospital@gmail.com', 'D.I.G road, near doctor line, larkana', '03030303033');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `composition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2021_05_26_073242_add_username_to_users_table', 1),
(5, '2021_06_02_063849_create_patients_table', 1),
(6, '2021_06_03_064305_change_number_datatype_in_patients_table', 1),
(7, '2021_06_03_070943_add_status_to_patients_table', 1),
(8, '2021_06_05_050005_create_appointments_table', 1),
(9, '2021_06_07_063941_add_role_to_users_table', 1),
(10, '2021_06_07_165141_create_locations_table', 1),
(11, '2021_06_07_171350_remove_logo_from_locations_table', 1),
(12, '2021_06_14_113538_add_city_to_locations_table', 1),
(13, '2021_06_19_062128_create_templates_table', 1),
(14, '2021_06_19_062545_remove_city_from_locations_table', 1),
(15, '2021_06_19_070801_add_timestamp_to_templates_table', 1),
(16, '2021_06_20_111413_create_pharmacists_table', 1),
(17, '2021_06_20_114149_create_categories_table', 1),
(18, '2021_06_20_181941_create_medicines_table', 1),
(19, '2021_07_03_092151_create_carts_table', 1),
(20, '2021_07_13_091345_create_doctors_table', 1),
(21, '2021_07_19_104401_create_specializations_table', 1),
(22, '2021_07_31_094550_create_labtests_table', 2),
(23, '2021_08_01_095323_create_departments_table', 3);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bed_no` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacists`
--

CREATE TABLE `pharmacists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Acupuncturist', 'A practitioner specialising in acupuncture therapy, which is a form of traditional Chinese medicine. In this system of therapy, fine needles are inserted at specific points in the body to cure ailments and adverse health conditions. At times, the acupuncturist may manipulate the needles for better efficacy.', '2021-07-19 07:00:35', '2021-07-19 07:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Appointment Reminder From HMS', 'Hi Mr.[[Full_name]] we\'re informing you that your appointment has fixed, Here\'s the address [[Location]] please visit us as soon as possible..!!\r\nIf you\'ve any confusion or You want to reschedule your appointment just contact us via [[Phone]] or [[Email]]..!!\r\nThank you..!!', '2021-06-19 02:10:08', '2021-06-19 02:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `age` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NA',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile`, `cnic`, `age`, `blood_group`, `address`, `password`, `dob`, `gender`, `profile_img`, `email_verified_at`, `remember_token`, `username`, `role`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '03030312343', '4120426112932', 22, 'b-', 'sindh', '$2y$10$0bugvwYpTwHq0gRA9upe5uLdb5ZukdSYdbIErcrAQ6aHT3acVdoay', '2021-06-04', 'male', '1623048322-admin.jpg', NULL, NULL, 'admin', 'admin'),
(2, 'Bilal', 'Ali', 'bilal.jessar@gmail.com', '03488305189', '4120426112931', 24, 'o-', 'Pakistan', 'bilal', '2021-06-09', 'Male', '1623257936.JPG', NULL, NULL, 'bilal', 'admin'),
(3, 'Bisal', 'Bhatti', 'bisalbhatti4@gmail.com', '03030326416', '4120426112935', 23, 'ab+', 'Sindh', '$2y$10$kJHvX0FzmjLFEQBg51Ks3urksmIQp9jW8RDaonYTVPTj/i6SlO476', '2021-06-08', 'male', '1623259086-Bisal.jpg', NULL, NULL, 'bisal', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `labtests`
--
ALTER TABLE `labtests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacists`
--
ALTER TABLE `pharmacists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cnic_unique` (`cnic`),
  ADD UNIQUE KEY `users_password_unique` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labtests`
--
ALTER TABLE `labtests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacists`
--
ALTER TABLE `pharmacists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
