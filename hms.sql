-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 12:42 PM
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
(1, 'General Physician', 'Bisal', 3, 1, 1, 0, 'Emergency', NULL, NULL, NULL),
(2, 'General Physician', 'Bisal', 3, 1, 1, 0, 'Emergency', NULL, NULL, NULL),
(3, 'Acupuncturist', 'zuhaib ali', 4, 1, 1, 1, 'noted by zuhaib ali patient to doctor zuhaib ali', '2021-08-23 04:35:15', '2021-08-23 04:35:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `medicine_name`, `category`, `description`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Pregy', 'Analgesics', 'Drugs that relieve pain. There are two main types: non-narcotic analgesics for mild pain, and narcotic analgesics for severe pain.', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Analgesics', 'Drugs that relieve pain. There are two main types: non-narcotic analgesics for mild pain, and narcotic analgesics for severe pain.', '2021-08-06 01:00:44', '2021-08-06 01:00:44'),
(2, 'Antacids', 'Drugs that relieve indigestion and heartburn by neutralizing stomach acid.', '2021-08-06 01:06:54', '2021-08-06 01:06:54'),
(3, 'Antianxiety Drugs', 'Drugs that suppress anxiety and relax muscles (sometimes called anxiolytics, sedatives, or minor tranquilizers).', '2021-08-06 01:07:18', '2021-08-06 01:07:18'),
(4, 'Antiarrhythmics', 'Drugs used to control irregularities of heartbeat.', '2021-08-06 01:09:02', '2021-08-06 01:09:02'),
(5, 'Antibacterials', 'Drugs used to treat infections.', '2021-08-06 01:09:23', '2021-08-06 01:09:23'),
(6, 'Antibiotics', 'Drugs made from naturally occurring and synthetic substances that combat bacterial infection. Some antibiotics are effective only against limited types of bacteria. Others, known as broad spectrum antibiotics, are effective against a wide range of bacteria.', '2021-08-06 01:09:53', '2021-08-06 01:09:53'),
(7, 'Anticoagulants and Thrombolytics', 'Anticoagulants prevent blood from clotting. Thrombolytics help dissolve and disperse blood clots and may be prescribed for patients with recent arterial or venous thrombosis.', '2021-08-06 01:10:17', '2021-08-06 01:10:17'),
(8, 'Anticonvulsants', 'Drugs that prevent epileptic seizures.', '2021-08-06 01:11:36', '2021-08-06 01:11:36'),
(9, 'Antidepressants', 'There are three main groups of mood-lifting antidepressants: tricyclics, monoamine oxidase inhibitors, and selective serotonin reuptake inhibitors (SSRIs).', '2021-08-06 01:12:24', '2021-08-06 01:12:24'),
(10, 'Antidiarrheals', 'Drugs used for the relief of diarrhea. Two main types of antidiarrheal preparations are simple adsorbent substances and drugs that slow down the contractions of the bowel muscles so that the contents are propelled more slowly.', '2021-08-06 01:15:17', '2021-08-06 01:15:17'),
(11, 'Antiemetics', 'Drugs used to treat nausea and vomiting.', '2021-08-06 01:15:34', '2021-08-06 01:15:34'),
(12, 'Antifungals', 'Drugs used to treat fungal infections, the most common of which affect the hair, skin, nails, or mucous membranes.', '2021-08-06 01:15:59', '2021-08-06 01:15:59'),
(14, 'Antihistamines', 'Drugs used primarily to counteract the effects of histamine, one of the chemicals involved in allergic reactions.', '2021-08-06 01:16:39', '2021-08-06 01:16:39'),
(15, 'Antihypertensives', 'Drugs that lower blood pressure. The types of antihypertensives currently marketed include diuretics, beta-blockers, calcium channel blocker, ACE (angiotensin- converting enzyme) inhibitors, centrally acting antihypertensives and sympatholytics.', '2021-08-06 01:17:10', '2021-08-06 01:17:10'),
(16, 'Anti-Inflammatories', 'Drugs used to reduce inflammation - the redness, heat, swelling, and increased blood flow found in infections and in many chronic noninfective diseases such as rheumatoid arthritis and gout.', '2021-08-06 01:17:50', '2021-08-06 01:17:50'),
(17, 'Antineoplastics', 'Drugs used to treat cancer.', '2021-08-06 01:18:24', '2021-08-06 01:18:24'),
(18, 'Antipsychotics', 'Drugs used to treat symptoms of severe psychiatric disorders. These drugs are sometimes called major tranquilizers.', '2021-08-06 01:20:07', '2021-08-06 01:20:07'),
(19, 'Antipyretics', 'Drugs that reduce fever.', '2021-08-06 01:20:29', '2021-08-06 01:20:29'),
(20, 'Antivirals', 'Drugs used to treat viral infections or to provide temporary protection against infections such as influenza.', '2021-08-06 01:20:50', '2021-08-06 01:20:50'),
(21, 'Barbiturates', 'See \"sleeping drugs.\"', '2021-08-06 01:22:39', '2021-08-06 01:22:39'),
(22, 'Beta-Blockers', 'Beta-adrenergic blocking agents, or beta-blockers for short, reduce the oxygen needs of the heart by reducing heartbeat rate.', '2021-08-06 01:23:39', '2021-08-06 01:23:39'),
(23, 'Bronchodilators', 'Drugs that open up the bronchial tubes within the lungs when the tubes have become narrowed by muscle spasm. Bronchodilators ease breathing in diseases such as asthma.', '2021-08-06 01:24:03', '2021-08-06 01:24:03'),
(24, 'Cold Cures', 'Although there is no drug that can cure a cold, the aches, pains, and fever that accompany a cold can be relieved by aspirin or acetaminophen often accompanied by a decongestant, antihistamine, and sometimes caffeine.', '2021-08-06 01:24:33', '2021-08-06 01:24:33'),
(25, 'Corticosteroids', 'These hormonal preparations are used primarily as anti-inflammatories in arthritis or asthma or as immunosuppressives, but they are also useful for treating some malignancies or compensating for a deficiency of natural hormones in disorders such as Addison\'s disease.', '2021-08-06 01:25:37', '2021-08-06 01:25:37'),
(26, 'Cough Suppressants', 'Simple cough medicines, which contain substances such as honey, glycerine, or menthol, soothe throat irritation but do not actually suppress coughing. They are most soothing when taken as lozenges and dissolved in the mouth. As liquids they are probably swallowed too quickly to be effective. A few drugs are actually cough suppressants. There are two groups of cough suppressants: those that alter the consistency or production of phlegm such as mucolytics and expectorants; and those that suppress the coughing reflex such as codeine (narcotic cough suppressants), antihistamines, dextromethorphan and isoproterenol (non-narcotic cough suppressants).', '2021-08-06 01:26:46', '2021-08-06 01:26:46'),
(27, 'Cytotoxics', 'Drugs that kill or damage cells. Cytotoxics are used as antineoplastics (drugs used to treat cancer) and also as immunosuppressives.', '2021-08-06 01:27:47', '2021-08-06 01:27:47'),
(28, 'Decongestants', 'Drugs that reduce swelling of the mucous membranes that line the nose by constricting blood vessels, thus relieving nasal stuffiness.', '2021-08-06 01:28:16', '2021-08-06 01:28:16'),
(29, 'Diuretics', 'Drugs that increase the quantity of urine produced by the kidneys and passed out of the body, thus ridding the body of excess fluid. Diuretics reduce water logging of the tissues caused by fluid retention in disorders of the heart, kidneys, and liver. They are useful in treating mild cases of high blood pressure.', '2021-08-06 01:28:40', '2021-08-06 01:28:40'),
(30, 'Expectorant', 'A drug that stimulates the flow of saliva and promotes coughing to eliminate phlegm from the respiratory tract.', '2021-08-06 01:29:22', '2021-08-06 01:29:22'),
(31, 'Hormones', 'Chemicals produced naturally by the endocrine glands (thyroid, adrenal, ovary, testis, pancreas, parathyroid). In some disorders, for example, diabetes mellitus, in which too little of a particular hormone is produced, synthetic equivalents or natural hormone extracts are prescribed to restore the deficiency. Such treatment is known as hormone replacement therapy.', '2021-08-06 01:29:48', '2021-08-06 01:29:48'),
(32, 'Hypoglycemics (Oral)', 'Drugs that lower the level of glucose in the blood. Oral hypoglycemic drugs are used in diabetes mellitus if it cannot be controlled by diet alone, but does require treatment with injections of insulin.', '2021-08-06 01:30:28', '2021-08-06 01:30:28'),
(33, 'Immunosuppressives', 'Drugs that prevent or reduce the body\'s normal reaction to invasion by disease or by foreign tissues. Immunosuppressives are used to treat autoimmune diseases (in which the body\'s defenses work abnormally and attack its own tissues) and to help prevent rejection of organ transplants.', '2021-08-06 01:31:24', '2021-08-06 01:31:24'),
(34, 'Laxatives', 'Drugs that increase the frequency and ease of bowel movements, either by stimulating the bowel wall (stimulant laxative), by increasing the bulk of bowel contents (bulk laxative), or by lubricating them (stool-softeners, or bowel movement-softeners). Laxatives may be taken by mouth or directly into the lower bowel as suppositories or enemas. If laxatives are taken regularly, the bowels may ultimately become unable to work properly without them.', '2021-08-06 01:32:58', '2021-08-06 01:32:58'),
(35, 'Muscle Relaxants', 'Drugs that relieve muscle spasm in disorders such as backache. Antianxiety drugs (minor tranquilizers) that also have a muscle-relaxant action are used most commonly.', '2021-08-06 01:33:28', '2021-08-06 01:33:28'),
(36, 'Sedatives', 'Same as Antianxiety drugs.', '2021-08-06 01:33:47', '2021-08-06 01:33:47'),
(37, 'Sex Hormones (Female)', 'There are two groups of these hormones (estrogens and progesterone), which are responsible for development of female secondary sexual characteristics. Small quantities are also produced in males. As drugs, female sex hormones are used to treat menstrual and menopausal disorders and are also used as oral contraceptives. Estrogens may be used to treat cancer of the breast or prostate, progestins (synthetic progesterone to treat endometriosis).', '2021-08-06 01:34:02', '2021-08-06 01:34:02'),
(38, 'Sex Hormones (Male)', 'Androgenic hormones, of which the most powerful is testosterone, are responsible for development of male secondary sexual characteristics. Small quantities are also produced in females. As drugs, male sex hormones are given to compensate for hormonal deficiency in hypopituitarism or disorders of the testes. They may be used to treat breast cancer in women, but either synthetic derivatives called anabolic steroids, which have less marked side- effects, or specific anti-estrogens are often preferred. Anabolic steroids also have a \"body building\" effect that has led to their (usually nonsanctioned) use in competitive sports, for both men and women.', '2021-08-06 01:34:19', '2021-08-06 01:34:19'),
(39, 'Sleeping Drugs', 'The two main groups of drugs that are used to induce sleep are benzodiazepines and barbiturates. All such drugs have a sedative effect in low doses and are effective sleeping medications in higher doses. Benzodiazepines drugs are used more widely than barbiturates because they are safer, the side-effects are less marked, and there is less risk of eventual physical dependence.', '2021-08-06 01:34:39', '2021-08-06 01:34:39'),
(40, 'Tranquilizer', 'This is a term commonly used to describe any drug that has a calming or sedative effect. However, the drugs that are sometimes called minor tranquilizers should be called antianxiety drugs, and the drugs that are sometimes called major tranquilizers should be called antipsychotics.', '2021-08-06 01:34:56', '2021-08-06 01:34:56'),
(41, 'Vitamins', 'Chemicals essential in small quantities for good health. Some vitamins are not manufactured by the body, but adequate quantities are present in a normal diet. People whose diets are inadequate or who have digestive tract or liver disorders may need to take supplementary vitamins.', '2021-08-06 01:35:17', '2021-08-06 01:35:17');

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
(1, 'zuhaib', 'ali', 'salmansoomro523@gmail.com', 'BUMS - Bachelor of Unani medicine and Surgery', '1', 1000, 'male', '03333935454', '09:51', '21:57', 'sunday', '1627825915-zuhaib-ali.jpg', 'hakra muhalla, ali khan, kamber', 1, '2021-08-01 08:51:55', '2021-08-01 08:51:55');

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
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, 'Agha Khan Hyderabad', 'aghakhan@gmail.com', 'Hyderabad', '02233445');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_price` int(10) UNSIGNED NOT NULL,
  `sale_price` int(10) UNSIGNED NOT NULL,
  `store_box` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `generic_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `effects` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `medicine_name`, `category_id`, `purchase_price`, `sale_price`, `store_box`, `quantity`, `generic_name`, `company`, `effects`, `expire_date`, `created_at`, `updated_at`) VALUES
(1, 'Pregy', 1, 250, 300, 30, 100, 'Pregabalin', 'Lyrica, Lyrica CR', '100 mg; 150 mg; 200 mg; 225 mg; 25 mg; 300 mg; 50 mg; 75 mg); oral solution (20 mg/mL); oral tablet, extended release (165 mg; 330 mg; 82.5 mg', '2021-08-06', '2021-08-06 05:50:10', '2021-08-06 05:50:10');

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
(6, '2021_06_05_050005_create_appointments_table', 1),
(7, '2021_06_07_063941_add_role_to_users_table', 1),
(8, '2021_06_07_165141_create_locations_table', 1),
(9, '2021_06_07_171350_remove_logo_from_locations_table', 1),
(10, '2021_06_14_113538_add_city_to_locations_table', 1),
(11, '2021_06_19_062128_create_templates_table', 1),
(12, '2021_06_19_062545_remove_city_from_locations_table', 1),
(13, '2021_06_19_070801_add_timestamp_to_templates_table', 1),
(14, '2021_06_20_111413_create_pharmacists_table', 1),
(15, '2021_06_20_114149_create_categories_table', 1),
(16, '2021_06_20_181941_create_medicines_table', 1),
(17, '2021_07_03_092151_create_carts_table', 1),
(18, '2021_07_13_091345_create_doctors_table', 1),
(19, '2021_07_19_104401_create_specializations_table', 1),
(20, '2021_07_31_094550_create_labtests_table', 1),
(21, '2021_08_01_095323_create_departments_table', 1),
(22, '2021_08_03_071435_create_labs_table', 1);

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
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `name`, `email`, `address`, `phone`, `sex`, `age`, `date_of_birth`, `blood_group`, `doctor_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'zeeshan soomro', 'zuhaibsoomro25@gmail.com', 'hakra muhalla, ali khan, kamber', '03333333333', 'male', '21', '2021-08-11', 'o+', 1, '1628663332-zeeshan-soomro-jpg', 'discharged', NULL, NULL),
(2, 3, 'Bisal Bhatti', 'bisalbhatti4@gmail.com', 'Sindh', '03030326416', 'male', '23', '2021-06-08', 'ab+', 1, '1628663441-Bisal-Bhatti-png', 'admitted', NULL, NULL),
(3, NULL, 'Bilal Ali', 'bilal.jessar11@gmail.com', 'kotri', '03488305189', 'male', '24', '1997-06-24', 'o-', 1, '1628749170-Bilal-Ali-jpg', 'admitted', NULL, NULL);

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
(1, 'Appointment Reminder From HMS', 'Hi Mr.[[Full_name]] we\'re informing you that your appointment has confirmed, Here\'s the address [[Location]] please visit us..!!\r\nIf you\'ve any confusion or You want to reschedule your appointment just contact us via [[Phone]] or [[Email]]..!!\r\nThank You..!!', '2021-08-21 00:05:23', '2021-08-21 00:05:23');

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
(1, 'Bilal', 'Ali', 'admin@gmail.com', '03030312343', '4120426112932', 22, 'b-', 'sindh', '$2y$10$0bugvwYpTwHq0gRA9upe5uLdb5ZukdSYdbIErcrAQ6aHT3acVdoay', '2021-06-04', 'male', '1623048322-admin.jpg', NULL, NULL, 'admin', 'admin'),
(2, 'Bilal', 'Ali', 'bilal.jessar@gmail.com', '03488305189', '4120426112931', 24, 'o-', 'Pakistan', 'bilal', '2021-06-09', 'Male', '1623257936.JPG', NULL, NULL, 'bilal', 'user'),
(3, 'Bisal', 'Bhatti', 'bilal.jessar11@gmail.com', '03030326416', '4120426112935', 23, 'ab+', 'Sindh', '$2y$10$kJHvX0FzmjLFEQBg51Ks3urksmIQp9jW8RDaonYTVPTj/i6SlO476', '2021-06-08', 'male', '1623259086-Bisal.jpg', NULL, NULL, 'bisal', 'user'),
(4, 'zuhaib', 'ali', 'salmansoomro523@gmail.com', '03333936465', '4320269682403', 21, 'o+', 'Harka muhalla, ali khan, kamber', '$2y$10$v/alG4.OdxSzeebVBRG6WuA6/UA4OoIXuoazo4t6BX5H/.Pvzk9QG', '2021-08-23', 'male', '1629711260-zuhaib.jpg', NULL, NULL, 'zuhaib ali', 'user');

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
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labtests`
--
ALTER TABLE `labtests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
