-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2021 at 04:28 PM
-- Server version: 10.5.9-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eizou_aihsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `image`, `caption`, `caption_id`, `title`, `title_id`, `slug`, `slug_id`, `intro`, `intro_id`, `description`, `description_id`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'article-detail-zyTJx.jpg', 'How will One Health approach protect Indonesia against future pandemics?', 'How will One Health approach protect Indonesia against future pandemics?', 'How will One Health approach protect Indonesia against future pandemics?', 'How will One Health approach protect Indonesia against future pandemics?', 'how-will-one-health-approach-protect-indonesia-against-future-pandemics', 'how-will-one-health-approach-protect-indonesia-against-future-pandemics', 'Emerging infectious diseases (EIDs) at the human-animal-ecosystems interface have been occurring with increasing frequency. The emergence of COVID-19 has resulted in a global pandemic with significant mortality and a global economic recession.', 'Emerging infectious diseases (EIDs) at the human-animal-ecosystems interface have been occurring with increasing frequency. The emergence of COVID-19 has resulted in a global pandemic with significant mortality and a global economic recession.', '<p>Emerging infectious diseases (EIDs) at the human-animal-ecosystems interface have been occurring with increasing frequency. The emergence of COVID-19 has resulted in a global pandemic with significant mortality and a global economic recession.</p>\n\n<p>In addition, zoonoses (diseases transmissible from animals to humans) pose an ongoing threat to human health and a high cost to public health systems. Zoonoses can be spread by direct transmission (plague, anthrax, brucellosis), indirect transmission (leptospirosis, zika) or are food borne (salmonella, E.coli).</p>\n\n<p>Many zoonoses are regarded as &lsquo;neglected diseases&rsquo; and though causing significant ill health and morbidity, the diseases receive little attention from public health authorities (various parasitic diseases in particular, such as hydatids, cysticercosis). In addition to EIDs there is also a growing threat from the increase in antimicrobial resistance (AMR), a problem for both human and animal health.</p>\n\n<p>To address the threats from emerging infectious diseases, food-borne zoonoses, and to reduce the risks from AMR there is a need to take a broad based, holistic approach &ndash; the &lsquo;One Health&rsquo; approach &ndash;, to disease prevention, detection, response and recovery.</p>\n\n<p>The One Health approach identifies the need for the human health, animal health (both domesticated and wild animals) and environmental health sectors to work together using cross-sectoral, multi and inter-disciplinary approaches. Further, One Health needs to work within the social, cultural and economic context of countries adopting a broad approach, including Indonesia. The COVID-19 pandemic has emphasized the need for effective One Health systems to be established nationally and globally.</p>\n\n<p>The Australia Indonesia Health Security Partnership (AIHSP) with the Food and Agriculture Organization (FAO), World Health Organization (WHO) and in close collaboration with the Government of Indonesia, particularly Ministry of Health (MoH), Ministry of Agriculture (MoA) and Ministry of Environment and Forestry (MoEF), is recognizing the importance of One Health, promoting awareness and supporting for the implementation of One Health approach in Indonesia through a series of activities.</p>\n\n<p>One of the key activities was the webinar titled &ldquo;Preventing the next pandemic-the One Health imperative&rsquo; last November 2020.</p>\n', '<p>Emerging infectious diseases (EIDs) at the human-animal-ecosystems interface have been occurring with increasing frequency. The emergence of COVID-19 has resulted in a global pandemic with significant mortality and a global economic recession.</p>\n\n<p>In addition, zoonoses (diseases transmissible from animals to humans) pose an ongoing threat to human health and a high cost to public health systems. Zoonoses can be spread by direct transmission (plague, anthrax, brucellosis), indirect transmission (leptospirosis, zika) or are food borne (salmonella, E.coli).</p>\n\n<p>Many zoonoses are regarded as &lsquo;neglected diseases&rsquo; and though causing significant ill health and morbidity, the diseases receive little attention from public health authorities (various parasitic diseases in particular, such as hydatids, cysticercosis). In addition to EIDs there is also a growing threat from the increase in antimicrobial resistance (AMR), a problem for both human and animal health.</p>\n\n<p>To address the threats from emerging infectious diseases, food-borne zoonoses, and to reduce the risks from AMR there is a need to take a broad based, holistic approach &ndash; the &lsquo;One Health&rsquo; approach &ndash;, to disease prevention, detection, response and recovery.</p>\n\n<p>The One Health approach identifies the need for the human health, animal health (both domesticated and wild animals) and environmental health sectors to work together using cross-sectoral, multi and inter-disciplinary approaches. Further, One Health needs to work within the social, cultural and economic context of countries adopting a broad approach, including Indonesia. The COVID-19 pandemic has emphasized the need for effective One Health systems to be established nationally and globally.</p>\n\n<p>The Australia Indonesia Health Security Partnership (AIHSP) with the Food and Agriculture Organization (FAO), World Health Organization (WHO) and in close collaboration with the Government of Indonesia, particularly Ministry of Health (MoH), Ministry of Agriculture (MoA) and Ministry of Environment and Forestry (MoEF), is recognizing the importance of One Health, promoting awareness and supporting for the implementation of One Health approach in Indonesia through a series of activities.</p>\n\n<p>One of the key activities was the webinar titled &ldquo;Preventing the next pandemic-the One Health imperative&rsquo; last November 2020.</p>\n', 1, NULL, '2021-03-22 00:00:00', NULL, NULL, '2021-03-22 06:39:08', '2021-03-22 06:39:08'),
(2, 1, 'feature-image-2-Tl56W.jpg', 'Australia’s Indo-Pacific health security initiative', 'Australia’s Indo-Pacific health security initiative', 'Australia’s Indo-Pacific health security initiative', 'Australia’s Indo-Pacific health security initiative', 'australias-indo-pacific-health-security-initiative', 'australias-indo-pacific-health-security-initiative', 'Australia’s new health security plan is a strong statement but requires ambitious investment to lock in early gains... ', 'Australia’s new health security plan is a strong statement but requires ambitious investment to lock in early gains... ', '<p>Emerging infectious diseases (EIDs) at the human-animal-ecosystems interface have been occurring with increasing frequency. The emergence of COVID-19 has resulted in a global pandemic with significant mortality and a global economic recession.</p>\n\n<p>In addition, zoonoses (diseases transmissible from animals to humans) pose an ongoing threat to human health and a high cost to public health systems. Zoonoses can be spread by direct transmission (plague, anthrax, brucellosis), indirect transmission (leptospirosis, zika) or are food borne (salmonella, E.coli).</p>\n\n<p>Many zoonoses are regarded as &lsquo;neglected diseases&rsquo; and though causing significant ill health and morbidity, the diseases receive little attention from public health authorities (various parasitic diseases in particular, such as hydatids, cysticercosis). In addition to EIDs there is also a growing threat from the increase in antimicrobial resistance (AMR), a problem for both human and animLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..al health.</p>\n\n<p>To address the threats from emerging infectious diseases, food-borne zoonoses, and to reduce the risks from AMR there is a need to take a broad based, holistic approach &ndash; the &lsquo;One Health&rsquo; approach &ndash;, to disease prevention, detection, response and recovery.</p>\n\n<p>The One Health approach identifies the need for the human health, animal health (both domesticated and wild animals) and environmental health sectors to work together using cross-sectoral, multi and inter-disciplinary approaches. Further, One Health needs to work within the social, cultural and economic context of countries adopting a broad approach, including Indonesia. The COVID-19 pandemic has emphasized the need for effective One Health systems to be established nationally and globally.</p>\n\n<p>The Australia Indonesia Health Security Partnership (AIHSP) with the Food and Agriculture Organization (FAO), World Health Organization (WHO) and in close collaboration with the Government of Indonesia, particularly Ministry of Health (MoH), Ministry of Agriculture (MoA) and Ministry of Environment and Forestry (MoEF), is recognizing the importance of One Health, promoting awareness and supporting for the implementation of One Health approach in Indonesia through a series of activities.</p>\n\n<p>One of the key activities was the webinar titled &ldquo;Preventing the next pandemic-the One Health imperative&rsquo; last November 2020.</p>\n', '<p>Emerging infectious diseases (EIDs) at the human-animal-ecosystems interface have been occurring with increasing frequency. The emergence of COVID-19 has resulted in a global pandemic with significant mortality and a global economic recession.</p>\n\n<p>In addition, zoonoses (diseases transmissible from animals to humans) pose an ongoing threat to human health and a high cost to public health systems. Zoonoses can be spread by direct transmission (plague, anthrax, brucellosis), indirect transmission (leptospirosis, zika) or are food borne (salmonella, E.coli).</p>\n\n<p>Many zoonoses are regarded as &lsquo;neglected diseases&rsquo; and though causing Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..significant ill health and morbidity, the diseases receive little attention from public health authorities (various parasitic diseases in particular, such as hydatids, cysticercosis). In addition to EIDs there is also a growing threat from the increase in antimicrobial resistance (AMR), a problem for both human and animal health.</p>\n\n<p>To address the threats from emerging infectious diseases, food-borne zoonoses, and to reduce the risks from AMR there is a need to take a broad based, holistic approach &ndash; the &lsquo;One Health&rsquo; approach &ndash;, to disease prevention, detection, response and recovery.</p>\n\n<p>The One Health approach identifies the need for the human health, animal health (both domesticated and wild animals) and environmental health sectors to work together using cross-sectoral, multi and inter-disciplinary approaches. Further, One Health needs to work within the social, cultural and economic context of countries adopting a broad approach, including Indonesia. The COVID-19 pandemic has emphasized the need for effective One Health systems to be established nationally and globally.</p>\n\n<p>The Australia Indonesia Health Security Partnership (AIHSP) with the Food and Agriculture Organization (FAO), World Health Organization (WHO) and in close collaboration with the Government of Indonesia, particularly Ministry of Health (MoH), Ministry of Agriculture (MoA) and Ministry of Environment and Forestry (MoEF), is recognizing the importance of One Health, promoting awareness and supporting for the implementation of One Health approach in Indonesia through a series of activities.</p>\n\n<p>One of the key activities was the webinar titled &ldquo;Preventing the next pandemic-the One Health imperative&rsquo; last November 2020.</p>\n', 1, NULL, '2021-03-22 00:00:00', NULL, NULL, '2021-03-22 22:54:27', '2021-03-22 22:55:51'),
(3, 1, 'nature13-MPm4X.jpg', 'Australia, New Zealand say clear evidence of rights abuses in China\'s Xinjiang', 'Australia, New Zealand say clear evidence of rights abuses in China\'s Xinjiang', 'Australia, New Zealand say clear evidence of rights abuses in China\'s Xinjiang', 'Australia, New Zealand say clear evidence of rights abuses in China\'s Xinjiang', 'australia-new-zealand-say-clear-evidence-of-rights-abuses-in-chinas-xinjiang', 'australia-new-zealand-say-clear-evidence-of-rights-abuses-in-chinas-xinjiang', 'Australia’s new health security plan is a strong statement but requires ambitious investment to lock in early gains... ', 'Australia’s new health security plan is a strong statement but requires ambitious investment to lock in early gains... ', '<p>Emerging infectious diseases (EIDs) at the human-animal-ecosystems interface have been occurring with increasing frequency. The emergence of COVID-19 has resulted in a global pandemic with significant mortality and a global economic recession.</p>\n\n<p>In addition, zoonoses (diseases transmissible from animals to humans) pose an ongoing threat to human health and a high cost to public health systems. Zoonoses can be spread by direct transmission (plague, anthrax, brucellosis), indirect transmission (leptospirosis, zika) or are food borne (salmonella, E.coli).</p>\n\n<p>Many zoonoses are regarded as &lsquo;neglected diseases&rsquo; and though causing significant ill health and morbidity, the diseases receive little attention from public health authorities (various parasitic diseases in particular, such as hydatids, cysticercosis). In addition to EIDs there is also a growing threat from the increase in antimicrobial resistance (AMR), a problem for both human and animLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..al health.</p>\n\n<p>To address the threats from emerging infectious diseases, food-borne zoonoses, and to reduce the risks from AMR there is a need to take a broad based, holistic approach &ndash; the &lsquo;One Health&rsquo; approach &ndash;, to disease prevention, detection, response and recovery.</p>\n\n<p>The One Health approach identifies the need for the human health, animal health (both domesticated and wild animals) and environmental health sectors to work together using cross-sectoral, multi and inter-disciplinary approaches. Further, One Health needs to work within the social, cultural and economic context of countries adopting a broad approach, including Indonesia. The COVID-19 pandemic has emphasized the need for effective One Health systems to be established nationally and globally.</p>\n\n<p>The Australia Indonesia Health Security Partnership (AIHSP) with the Food and Agriculture Organization (FAO), World Health Organization (WHO) and in close collaboration with the Government of Indonesia, particularly Ministry of Health (MoH), Ministry of Agriculture (MoA) and Ministry of Environment and Forestry (MoEF), is recognizing the importance of One Health, promoting awareness and supporting for the implementation of One Health approach in Indonesia through a series of activities.</p>\n\n<p>One of the key activities was the webinar titled &ldquo;Preventing the next pandemic-the One Health imperative&rsquo; last November 2020.</p>\n', '<p>Emerging infectious diseases (EIDs) at the human-animal-ecosystems interface have been occurring with increasing frequency. The emergence of COVID-19 has resulted in a global pandemic with significant mortality and a global economic recession.</p>\n\n<p>In addition, zoonoses (diseases transmissible from animals to humans) pose an ongoing threat to human health and a high cost to public health systems. Zoonoses can be spread by direct transmission (plague, anthrax, brucellosis), indirect transmission (leptospirosis, zika) or are food borne (salmonella, E.coli).</p>\n\n<p>Many zoonoses are regarded as &lsquo;neglected diseases&rsquo; and though causing Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..significant ill health and morbidity, the diseases receive little attention from public health authorities (various parasitic diseases in particular, such as hydatids, cysticercosis). In addition to EIDs there is also a growing threat from the increase in antimicrobial resistance (AMR), a problem for both human and animal health.</p>\n\n<p>To address the threats from emerging infectious diseases, food-borne zoonoses, and to reduce the risks from AMR there is a need to take a broad based, holistic approach &ndash; the &lsquo;One Health&rsquo; approach &ndash;, to disease prevention, detection, response and recovery.</p>\n\n<p>The One Health approach identifies the need for the human health, animal health (both domesticated and wild animals) and environmental health sectors to work together using cross-sectoral, multi and inter-disciplinary approaches. Further, One Health needs to work within the social, cultural and economic context of countries adopting a broad approach, including Indonesia. The COVID-19 pandemic has emphasized the need for effective One Health systems to be established nationally and globally.</p>\n\n<p>The Australia Indonesia Health Security Partnership (AIHSP) with the Food and Agriculture Organization (FAO), World Health Organization (WHO) and in close collaboration with the Government of Indonesia, particularly Ministry of Health (MoH), Ministry of Agriculture (MoA) and Ministry of Environment and Forestry (MoEF), is recognizing the importance of One Health, promoting awareness and supporting for the implementation of One Health approach in Indonesia through a series of activities.</p>\n\n<p>One of the key activities was the webinar titled &ldquo;Preventing the next pandemic-the One Health imperative&rsquo; last November 2020.</p>\n', 1, NULL, '2021-03-22 00:00:00', NULL, NULL, '2021-03-22 22:57:24', '2021-03-22 22:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `user_id`, `title`, `title_id`, `intro`, `intro_id`, `description`, `description_id`, `url`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Financial Management Specialist', 'Financial Management Specialist', 'Australia’s new health security plan is a strong statement but requires ambitious investment to lock in early gains.', 'Australia’s new health security plan is a strong statement but requires ambitious investment to lock in early gains.', '<p>AIHSP is looking for a capable Research Officer to assist the Budget Policy Team.</p>\n\n<p>The RO is expected to perform the following:</p>\n\n<ol>\n	<li>Undertake research and data analysis related to the budget policy work area, which includes the evaluation and advice on government expenditure, fiscal risk, and specific program policy</li>\n	<li>Support the preparation of dataset, presentation materials, policy briefs, and reports</li>\n	<li>Assisting on timely requests from counterparts</li>\n</ol>\n', '<p>AIHSP is looking for a capable Research Officer to assist the Budget Policy Team.</p>\n\n<p>The RO is expected to perform the following:</p>\n\n<ol>\n	<li>Undertake research and data analysis related to the budget policy work area, which includes the evaluation and advice on government expenditure, fiscal risk, and specific program policy</li>\n	<li>Support the preparation of dataset, presentation materials, policy briefs, and reports</li>\n	<li>Assisting on timely requests from counterparts</li>\n</ol>\n', 'https://id.linkedin.com/', 1, NULL, '2021-03-24 00:00:00', NULL, NULL, '2021-03-23 19:12:50', '2021-03-23 19:12:50'),
(2, 1, 'Procurement and Contract Management Adviser', 'Procurement and Contract Management Adviser', 'Australia’s new health security plan is a strong statement but requires ambitious investment to lock in early gains.', 'Australia’s new health security plan is a strong statement but requires ambitious investment to lock in early gains.', '<p>AIHSP is looking for a capable Research Officer to assist the Budget Policy Team.</p>\n\n<p>The RO is expected to perform the following:</p>\n\n<ol>\n	<li>Undertake research and data analysis related to the budget policy work area, which includes the evaluation and advice on government expenditure, fiscal risk, and specific program policy</li>\n	<li>Support the preparation of dataset, presentation materials, policy briefs, and reports</li>\n	<li>Assisting on timely requests from counterparts</li>\n</ol>\n', '<p>AIHSP is looking for a capable Research Officer to assist the Budget Policy Team.</p>\n\n<p>The RO is expected to perform the following:</p>\n\n<ol>\n	<li>Undertake research and data analysis related to the budget policy work area, which includes the evaluation and advice on government expenditure, fiscal risk, and specific program policy</li>\n	<li>Support the preparation of dataset, presentation materials, policy briefs, and reports</li>\n	<li>Assisting on timely requests from counterparts</li>\n</ol>\n', 'https://id.linkedin.com/', 1, NULL, '2021-03-24 00:00:00', NULL, NULL, '2021-03-23 19:13:05', '2021-03-23 19:13:18'),
(3, 1, 'Utility Project Planning Coordinator', 'Utility Project Planning Coordinator', 'Australia’s new health security plan is a strong statement but requires ambitious investment to lock in early gains.', 'Australia’s new health security plan is a strong statement but requires ambitious investment to lock in early gains.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tria genera bonorum; Scaevolam M. Cupiditates non Epicuri divisione finiebat, sed sua satietate. Duo Reges: constructio interrete.&nbsp;</p>\n\n<p>Sed eum qui audiebant, quoad poterant, defendebant sententiam suam. At eum nihili facit; Aufert enim sensus actionemque tollit omnem. Omnis enim est natura diligens sui. Quid, quod res alia tota est? Addidisti ad extremum etiam indoctum fuisse. Reguli reiciendam;&nbsp;</p>\n\n<p>Certe, nisi voluptatem tanti aestimaretis. Est, ut dicis, inquit; Sed ea mala virtuti magnitudine obruebantur. Duarum enim vitarum nobis erunt instituta capienda. Scrupulum, inquam, abeunti; Teneo, inquit, finem illi videri nihil dolere.&nbsp;</p>\n\n<p>Primum Theophrasti, Strato, physicum se voluit; Egone quaeris, inquit, quid sentiam? Summus dolor plures dies manere non potest? Qui autem esse poteris, nisi te amor ipse ceperit? Multoque hoc melius nos veriusque quam Stoici. Eaedem res maneant alio modo.&nbsp;</p>\n\n<p>Sin laboramus, quis est, qui alienae modum statuat industriae? Quod autem satis est, eo quicquid accessit, nimium est; Nunc haec primum fortasse audientis servire debemus. Age, inquies, ista parva sunt. Utinam quidem dicerent alium alio beatiorem! Iam ruinas videres. Nihil ad rem! Ne sit sane; Ita prorsus, inquam; Fortasse id optimum, sed ubi illud: Plus semper voluptatis?&nbsp;</p>\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tria genera bonorum; Scaevolam M. Cupiditates non Epicuri divisione finiebat, sed sua satietate. Duo Reges: constructio interrete.&nbsp;</p>\n\n<p>Sed eum qui audiebant, quoad poterant, defendebant sententiam suam. At eum nihili facit; Aufert enim sensus actionemque tollit omnem. Omnis enim est natura diligens sui. Quid, quod res alia tota est? Addidisti ad extremum etiam indoctum fuisse. Reguli reiciendam;&nbsp;</p>\n\n<p>Certe, nisi voluptatem tanti aestimaretis. Est, ut dicis, inquit; Sed ea mala virtuti magnitudine obruebantur. Duarum enim vitarum nobis erunt instituta capienda. Scrupulum, inquam, abeunti; Teneo, inquit, finem illi videri nihil dolere.&nbsp;</p>\n\n<p>Primum Theophrasti, Strato, physicum se voluit; Egone quaeris, inquit, quid sentiam? Summus dolor plures dies manere non potest? Qui autem esse poteris, nisi te amor ipse ceperit? Multoque hoc melius nos veriusque quam Stoici. Eaedem res maneant alio modo.&nbsp;</p>\n\n<p>Sin laboramus, quis est, qui alienae modum statuat industriae? Quod autem satis est, eo quicquid accessit, nimium est; Nunc haec primum fortasse audientis servire debemus. Age, inquies, ista parva sunt. Utinam quidem dicerent alium alio beatiorem! Iam ruinas videres. Nihil ad rem! Ne sit sane; Ita prorsus, inquam; Fortasse id optimum, sed ubi illud: Plus semper voluptatis?&nbsp;</p>\n', 'https://id.linkedin.com/', 1, NULL, '2021-03-24 00:00:00', NULL, NULL, '2021-03-23 19:15:30', '2021-03-25 08:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_inquiry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `embed` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `title`, `title_id`, `description`, `description_id`, `address`, `phone`, `email`, `email_inquiry`, `embed`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Contact', '', '<p>The Australia Indonesia Health Security Partnership Office opens from<br />\nMonday to Friday between the hours of 09.00 - 17.00</p>\n\n<p>If you require any further information, please fill in the inquiry form below :</p>\n', '<p>The Australia Indonesia Health Security Partnership Office opens from<br />\nMonday to Friday between the hours of 09.00 - 17.00</p>\n\n<p>If you require any further information, please fill in the inquiry form below :</p>\n', '<p>International Financial Centre (IFC), Tower 2, Level 18,<br />\nJI. Jenderal Sudirman kaveling 22-23, Jakarta 12920 Indonesia</p>\n', '+62 21 8086 9800', 'info@aihsp.or.id', NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31730.695990202606!2d106.80825604549713!3d-6.219214915993149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa2fb02a07e6f0e62!2sKemitraan%20Indonesia%20Australia%20untuk%20Infrastruktur%20(KIAT)!5e0!3m2!1sen!2sid!4v1615345860497!5m2!1sen!2sid\" height=\"450\" width=\"1024\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>\n                        ', NULL, NULL, '2021-03-22 05:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `user_id`, `image`, `caption`, `caption_id`, `title`, `title_id`, `slug`, `slug_id`, `intro`, `intro_id`, `description`, `description_id`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, 'AIHPS Strategic Direction', 'AIHPS Strategic Direction', 'aihps-strategic-direction', 'aihps-strategic-direction', NULL, NULL, '<h3>Goal</h3>\n\n<p>The Australian Department of Foreign Affairs and Trade (DFAT) supports the strengthening of national and regional systems for prevention, detection and response to human and animal health threats. DFAT supports the Government of Indonesia Australia Indonesia Health Security Partnership (AIHSP) program, is committed to supporting</p>\n\n<p>The AIHSP is a 5-year program (2020-2025) implemented by Cardno. Our overarching goal is to increase national health security in Indonesia. We aim to reduce the risks to women, men, domestic animals and communities from communicable diseases, including emerging infectious diseases (EIDs). By lowering risk, we contribute to Indonesian, Australian, regional and global health security and to sustainable economic development and food security in Indonesia.</p>\n\n<h3>Alignment with Indonesian Government Plans</h3>\n\n<p>AIHSP supports the Government of Indonesia&rsquo;s priorities and plans. We are fully aligned with the RPJMN (national 5-year development plan), Presidential Instruction #4 of 2019 (on health security), the NAPHS (National Action Plan for Health Security) and the strategic plans of the Ministries of Agriculture and Health.</p>\n\n<h3>Promoting One Health Approach</h3>\n\n<p>AIHSP promotes a One Health approach that integrates human, animal and environmental health. To support the achievement of our goal, AIHSP works in partnership with the Indonesian Ministry of Health (MoH), Ministry of Agriculture (MoA) and other relevant agencies, and with the Government of Australia and other Australian institutions to achieve the following end-of-program outcomes:</p>\n\n<ol>\n	<li>Stronger Government of Indonesia systems to prevent, detect and respond to public health and animal health emergencies; and</li>\n	<li>Stronger national coordination of responses to national, regional and global health threats.</li>\n</ol>\n\n<p>AIHSP operates both at the national level and in selected provinces. Immediate areas of focus are:</p>\n\n<ul>\n	<li>Improved policies and procedures;</li>\n	<li>Cross ministerial coordination and information sharing; and</li>\n	<li>The efficiency, effectiveness and interoperability of animal and human health surveillance systems</li>\n	<li>Strengthened laboratory capacity</li>\n</ul>\n', '<h3>Goal</h3>\n\n<p>The Australian Department of Foreign Affairs and Trade (DFAT) supports the strengthening of national and regional systems for prevention, detection and response to human and animal health threats. DFAT supports the Government of Indonesia Australia Indonesia Health Security Partnership (AIHSP) program, is committed to supporting</p>\n\n<p>The AIHSP is a 5-year program (2020-2025) implemented by Cardno. Our overarching goal is to increase national health security in Indonesia. We aim to reduce the risks to women, men, domestic animals and communities from communicable diseases, including emerging infectious diseases (EIDs). By lowering risk, we contribute to Indonesian, Australian, regional and global health security and to sustainable economic development and food security in Indonesia.</p>\n\n<h3>Alignment with Indonesian Government Plans</h3>\n\n<p>AIHSP supports the Government of Indonesia&rsquo;s priorities and plans. We are fully aligned with the RPJMN (national 5-year development plan), Presidential Instruction #4 of 2019 (on health security), the NAPHS (National Action Plan for Health Security) and the strategic plans of the Ministries of Agriculture and Health.</p>\n\n<h3>Promoting One Health Approach</h3>\n\n<p>AIHSP promotes a One Health approach that integrates human, animal and environmental health. To support the achievement of our goal, AIHSP works in partnership with the Indonesian Ministry of Health (MoH), Ministry of Agriculture (MoA) and other relevant agencies, and with the Government of Australia and other Australian institutions to achieve the following end-of-program outcomes:</p>\n\n<ol>\n	<li>Stronger Government of Indonesia systems to prevent, detect and respond to public health and animal health emergencies; and</li>\n	<li>Stronger national coordination of responses to national, regional and global health threats.</li>\n</ol>\n\n<p>AIHSP operates both at the national level and in selected provinces. Immediate areas of focus are:</p>\n\n<ul>\n	<li>Improved policies and procedures;</li>\n	<li>Cross ministerial coordination and information sharing; and</li>\n	<li>The efficiency, effectiveness and interoperability of animal and human health surveillance systems</li>\n	<li>Strengthened laboratory capacity</li>\n</ul>\n', 1, NULL, '2021-03-22 00:00:00', NULL, NULL, '2021-03-22 01:05:15', '2021-03-22 01:06:27'),
(2, 1, NULL, NULL, NULL, 'What we do', 'What we do', 'what-we-do', 'what-we-do', NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi.</p>\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi.</p>\n', 1, NULL, '2021-03-22 00:00:00', NULL, NULL, '2021-03-22 01:05:16', '2021-03-22 01:06:31'),
(3, 1, NULL, NULL, NULL, 'How We Work', 'How We Work', 'how-we-work', 'how-we-work', NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi.</p>\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi.</p>\n', 1, NULL, '2021-03-22 00:00:00', NULL, NULL, '2021-03-22 01:06:06', '2021-03-22 01:06:36'),
(4, 1, NULL, NULL, NULL, 'Governance Structure', 'Governance Structure', 'governance-structure', 'governance-structure', NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi.</p>\n\n<p><img alt=\"\" src=\"/storage/content/governance-structure.png\" width=\"1532\" /></p>\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi.</p>\n\n<p><img alt=\"\" src=\"/storage/content/governance-structure.png\" width=\"1532\" /></p>\n', 1, NULL, '2021-03-22 00:00:00', NULL, NULL, '2021-03-22 01:06:42', '2021-03-22 01:08:54'),
(5, 1, 'who-we-are-jhkl4.jpg', NULL, NULL, 'Who We Are', 'Who We Are', 'who-we-are', 'who-we-are', NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi.</p>\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi.</p>\n', 1, NULL, '2021-03-22 00:00:00', NULL, NULL, '2021-03-22 01:09:12', '2021-03-22 01:09:32'),
(6, 1, NULL, NULL, NULL, 'Response Covid-19', 'Response Covid-19', 'response-covid-19', 'response-covid-19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..</p>\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..</p>\n', 1, NULL, '2021-01-05 00:00:00', NULL, NULL, '2021-03-22 23:46:40', '2021-03-22 23:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `datas`
--

CREATE TABLE `datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'file',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `datas`
--

INSERT INTO `datas` (`id`, `user_id`, `parent_id`, `category_id`, `attachment`, `title`, `title_id`, `file`, `url`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 'file', '2021', '2021', NULL, NULL, 1, '1', '2021-03-23 08:30:35', NULL, NULL, '2021-03-23 01:30:35', '2021-03-24 07:11:55'),
(2, 1, 1, 1, 'url', '2021 Implementation Report', '2021 Implementation Report', NULL, 'https://www.australia.gov.au/', 1, '1', '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 01:44:11', '2021-03-24 07:11:15'),
(3, 1, 1, 1, 'file', '2021 Financial Report', '2021 Financial Report', 'sample-2-A95VL.pdf', NULL, 1, '2', '2021-03-23 08:45:51', NULL, NULL, '2021-03-23 01:45:51', '2021-03-24 07:12:10'),
(4, 1, 0, 6, NULL, '2021', '2021', NULL, NULL, 1, NULL, '2021-03-23 09:00:31', NULL, NULL, '2021-03-23 02:00:31', '2021-03-23 02:00:31'),
(5, 1, 4, 6, 'url', ' AIHSP Monthly Bulletin - March 2021', ' AIHSP Monthly Bulletin - March 2021', NULL, 'https://indonesia.embassy.gov.au/', 1, NULL, '2021-03-23 09:00:52', NULL, NULL, '2021-03-23 02:00:52', '2021-03-23 02:00:52'),
(6, 1, 4, 6, 'url', 'AIHSP Monthly Bulletin - February 2021', 'AIHSP Monthly Bulletin - February 2021', NULL, 'https://indonesia.embassy.gov.au/', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 02:00:58', '2021-03-23 02:01:02'),
(7, 1, 4, 6, 'url', 'AIHSP Monthly Bulletin - January 2021', 'AIHSP Monthly Bulletin - January 2021', NULL, 'https://indonesia.embassy.gov.au/', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 02:01:04', '2021-03-23 02:01:12'),
(8, 1, 0, 6, NULL, '2020', '2020', NULL, NULL, 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 02:02:13', '2021-03-23 02:02:21'),
(9, 1, 0, 7, NULL, '2021', '2021', NULL, NULL, 1, '1', '2021-03-23 09:08:48', NULL, NULL, '2021-03-23 02:08:48', '2021-03-23 02:10:33'),
(10, 1, 9, 7, 'url', 'Kumparan (Online Media) - January 2021', 'Kumparan (Online Media) - January 2021', NULL, 'https://www.pertanian.go.id/', 1, '1', '2021-03-23 09:09:03', NULL, NULL, '2021-03-23 02:09:03', '2021-03-23 02:10:33'),
(11, 1, 9, 7, 'url', 'Tempo (Magazine) - January 2021', 'Tempo (Magazine) - January 2021', NULL, 'https://www.pertanian.go.id/', 1, '3', '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 02:09:05', '2021-03-23 02:10:33'),
(12, 1, 9, 7, 'url', 'Kompas (Newspaper) - January 2021', 'Kompas (Newspaper) - January 2021', NULL, 'https://www.pertanian.go.id/', 1, '2', '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 02:09:29', '2021-03-23 02:10:33'),
(13, 1, 0, 7, NULL, '2020', '2020', NULL, NULL, 1, '1', '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 02:11:26', '2021-03-23 02:11:34'),
(14, 1, 0, 8, NULL, '2021', '2021', NULL, NULL, 1, NULL, '2021-03-23 09:12:37', NULL, NULL, '2021-03-23 02:12:37', '2021-03-23 02:12:37'),
(15, 1, 14, 8, 'url', 'Press Releases February 2021', 'Press Releases February 2021', NULL, 'https://www.akudigital.com/bisnis-tips/press-release-adalah/', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 02:13:06', '2021-03-23 02:13:10'),
(16, 1, 0, 2, NULL, '2017', '2017', NULL, NULL, 1, NULL, '2021-03-24 11:32:06', NULL, NULL, '2021-03-24 04:32:06', '2021-03-24 04:32:06'),
(17, 1, 16, 2, 'url', '2017 Report', '2017 Report', NULL, 'https://indonesia.embassy.gov.au/', 1, NULL, '2021-03-24 11:33:17', NULL, NULL, '2021-03-24 04:33:17', '2021-03-24 04:33:17'),
(18, 1, 0, 5, NULL, '2021', '2021', NULL, NULL, 1, NULL, '2021-03-24 13:42:55', NULL, NULL, '2021-03-24 06:42:55', '2021-03-24 06:42:55'),
(19, 1, 18, 5, 'url', 'Strategies Report', 'Strategies Report', NULL, 'https://indonesia.embassy.gov.au/', 1, NULL, '2021-03-24 13:43:11', NULL, NULL, '2021-03-24 06:43:11', '2021-03-24 06:43:11'),
(20, 1, 0, 1, 'file', '2020', '2020', NULL, NULL, 1, '1', '2021-03-23 00:00:00', NULL, NULL, '2021-03-24 07:12:53', '2021-03-24 07:13:04'),
(21, 1, 20, 1, 'url', ' 2020 Implementation Report', ' 2020 Implementation Report', NULL, 'https://www.nature.com/', 1, NULL, '2021-03-24 14:13:34', NULL, NULL, '2021-03-24 07:13:34', '2021-03-24 07:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `data_categories`
--

CREATE TABLE `data_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_categories`
--

INSERT INTO `data_categories` (`id`, `user_id`, `module`, `title`, `title_id`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'reports', 'Implementation Reports', 'Implementation Reports', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 01:18:49', '2021-03-23 01:26:24'),
(2, 1, 'reports', 'Six Monthly Report', 'Six Monthly Report', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 01:26:26', '2021-03-23 01:26:36'),
(3, 1, 'reports', 'Survey/Review Report', 'Survey/Review Report', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 01:26:37', '2021-03-23 01:26:49'),
(4, 1, 'reports', 'Other Report', 'Other Report', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 01:26:57', '2021-03-23 01:27:01'),
(5, 1, 'strategies', 'Strategies Report', 'Strategies Report', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 01:49:40', '2021-03-23 01:49:40'),
(6, 1, 'bulletins', 'Monthly Bulletins', 'Monthly Bulletins', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 01:57:25', '2021-03-23 01:57:25'),
(7, 1, 'medias', 'Media Coverage', 'Media Coverage', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 02:08:24', '2021-03-23 02:08:24'),
(8, 1, 'releases', 'Press Releases', 'Press Releases', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 02:12:21', '2021-03-23 02:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_at` date DEFAULT NULL,
  `to_at` date DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `type`, `image`, `caption`, `caption_id`, `from_at`, `to_at`, `title`, `title_id`, `slug`, `slug_id`, `intro`, `intro_id`, `description`, `description_id`, `address`, `address_id`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'prev', NULL, NULL, NULL, '2021-03-01', '2021-03-02', 'Australia’s Indo-Pacific health security initiative', 'Australia’s Indo-Pacific health security initiative', 'australias-indo-pacific-health-security-initiative', 'australias-indo-pacific-health-security-initiative', NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.</p>\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.</p>\n', 'Jakarta, Indonesia', 'Jakarta, Indonesia', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 00:50:14', '2021-03-23 00:50:20'),
(2, 1, 'next', NULL, NULL, NULL, '2021-03-05', '2021-03-06', 'Australia’s Indo-Pacific Health Networking Workshop', 'Australia’s Indo-Pacific Health Networking Workshop', 'australias-indo-pacific-health-networking-workshop', 'australias-indo-pacific-health-networking-workshop', NULL, NULL, '<p>Australia&rsquo;s new health security plan is a strong statement but requires ambitious investment to lock in early gains.</p>\n', '<p>Australia&rsquo;s new health security plan is a strong statement but requires ambitious investment to lock in early gains.</p>\n', 'Jakarta, Indonesia', 'Jakarta, Indonesia', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 00:53:06', '2021-03-23 00:53:06');

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
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `unique_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legals`
--

CREATE TABLE `legals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legals`
--

INSERT INTO `legals` (`id`, `user_id`, `title`, `title_id`, `slug`, `slug_id`, `description`, `description_id`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Terms of Use', 'Terms of Use', 'terms-of-use', 'terms-of-use', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..</p>\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..</p>\n', 1, NULL, '2021-03-24 00:00:00', NULL, NULL, '2021-03-23 19:23:03', '2021-03-23 19:23:26'),
(2, 1, 'Privacy Policy', 'Privacy Policy', 'privacy-policy', 'privacy-policy', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..</p>\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..</p>\n', 1, NULL, '2021-03-24 00:00:00', NULL, NULL, '2021-03-23 19:23:04', '2021-03-23 19:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `user_id`, `title`, `title_id`, `url`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Official Australian Government', 'Official Australian Government', 'https://www.australia.gov.au/', 1, '1', '2021-03-22 00:00:00', NULL, NULL, '2021-03-22 06:53:57', '2021-03-22 06:55:15'),
(2, 1, ' Australian Embassy (Jakarta)', ' Australian Embassy (Jakarta)', 'https://indonesia.embassy.gov.au/', 1, '2', '2021-03-22 00:00:00', NULL, NULL, '2021-03-22 06:53:59', '2021-03-22 06:55:15'),
(3, 1, 'Kementerian Kesehatan Republik Indonesia', 'Kementerian Kesehatan Republik Indonesia', 'https://www.kemkes.go.id/', 1, '2', '2021-03-22 00:00:00', NULL, NULL, '2021-03-22 06:55:17', '2021-03-22 06:55:33'),
(4, 1, 'Kementerian Pertanian Republik Indonesia', 'Kementerian Pertanian Republik Indonesia', 'https://www.pertanian.go.id/', 1, NULL, '2021-03-22 13:56:02', NULL, NULL, '2021-03-22 06:56:02', '2021-03-22 06:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `coordinate_y` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinate_x` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id`, `user_id`, `coordinate_y`, `coordinate_x`, `title`, `title_id`, `description`, `description_id`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '82.155', '39.955', 'Bali', 'Bali', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis non odit sordidos, vanos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis non odit sordidos, vanos', 1, NULL, '2021-03-25 00:00:00', NULL, NULL, '2021-03-25 06:07:10', '2021-03-25 06:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'file',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_categories`
--

CREATE TABLE `media_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_12_08_051317_create_sessions_table', 1),
(9, '2020_12_11_095448_create_articles_table', 1),
(10, '2021_02_09_163634_create_navigations_table', 1),
(11, '2021_02_09_164040_create_contents_table', 1),
(12, '2021_02_15_081129_create_overview_table', 1),
(13, '2021_03_22_043936_create_contact_table', 1),
(14, '2021_03_22_131013_create_inquiries_table', 2),
(17, '2021_03_22_133951_create_links_table', 4),
(18, '2021_03_23_051308_create_practices_table', 5),
(19, '2021_03_23_051324_create_events_table', 5),
(21, '2021_03_23_062337_create_videos_table', 5),
(23, '2021_03_23_063005_create_medias_table', 5),
(24, '2021_03_23_063037_create_releases_table', 5),
(25, '2021_03_23_063344_create_careers_table', 5),
(26, '2021_03_23_070624_create_legals_table', 5),
(29, '2021_03_23_080305_create_datas_table', 6),
(30, '2021_03_23_062834_create_photos_table', 7),
(32, '2021_03_23_161347_create_slides_table', 8),
(33, '2021_03_23_163819_create_newsletters_table', 9),
(34, '2021_03_25_110948_alter_keywords_to_articles_table', 10),
(35, '2021_03_25_111117_create_keywords_table', 10),
(36, '2021_03_25_111243_create_maps_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE `navigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uri` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`id`, `user_id`, `parent_id`, `type`, `target`, `title`, `title_id`, `intro`, `intro_id`, `url`, `uri`, `content_id`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'url', '_self', 'Home', 'Beranda', NULL, NULL, '/', NULL, NULL, 1, '1', '2021-03-22 05:10:15', NULL, NULL, '2021-03-21 22:10:15', '2021-03-22 23:35:24'),
(2, 1, 0, 'uri', '_self', 'About AIHSP', 'Tentang  AIHSP', NULL, NULL, '/', '#', NULL, 1, '2', '2021-03-22 00:00:00', NULL, NULL, '2021-03-21 22:10:32', '2021-03-24 02:36:35'),
(3, 1, 2, 'content', '_self', 'AIHSP Strategic Direction', 'Arahan Strategis AIHSP', NULL, NULL, '/', NULL, 1, 1, '1', '2021-03-22 00:00:00', NULL, NULL, '2021-03-21 22:11:35', '2021-03-22 01:10:11'),
(4, 1, 2, 'content', '_self', 'What we do', 'Apa yang kita lakukan', NULL, NULL, '/', NULL, 2, 1, '2', '2021-03-22 00:00:00', NULL, NULL, '2021-03-21 22:50:27', '2021-03-22 01:10:16'),
(5, 1, 2, 'content', '_self', 'How we work', 'Bagaimana kita bekerja', NULL, NULL, '/', NULL, 3, 1, '3', '2021-03-22 00:00:00', NULL, NULL, '2021-03-21 22:51:47', '2021-03-22 01:10:24'),
(6, 1, 2, 'content', '_self', 'Governance Structure', 'Struktur pemerintahan', NULL, NULL, '/', NULL, 4, 1, '4', '2021-03-22 00:00:00', NULL, NULL, '2021-03-21 22:52:25', '2021-03-22 01:10:31'),
(7, 1, 2, 'content', '_self', 'Who we are', 'Siapakah kami', NULL, NULL, '/', NULL, 5, 1, '5', '2021-03-22 00:00:00', NULL, NULL, '2021-03-21 22:53:31', '2021-03-22 01:10:40'),
(8, 1, 2, 'uri', '_self', 'AREA Profile', 'AREA Profil', NULL, NULL, '/area-profile', '/area-profile', NULL, 1, '6', '2021-03-22 00:00:00', NULL, NULL, '2021-03-21 22:54:30', '2021-03-22 19:52:27'),
(9, 1, 2, 'uri', '_self', 'Contact us', 'Kontak kami', NULL, NULL, '/contact', '/contact', NULL, 1, '7', '2021-03-22 00:00:00', NULL, NULL, '2021-03-21 22:54:55', '2021-03-22 19:52:27'),
(10, 1, 0, 'url', '_self', 'Report & Strategies', 'Report & Strategies', NULL, NULL, '', NULL, NULL, 1, '3', '2021-03-23 06:35:04', NULL, NULL, '2021-03-22 23:35:04', '2021-03-22 23:36:20'),
(11, 1, 10, 'uri', '_self', 'Reports', 'Reports', NULL, NULL, NULL, '/reports', NULL, 1, '1', '2021-03-23 06:38:13', NULL, NULL, '2021-03-22 23:38:13', '2021-03-24 06:51:56'),
(12, 1, 10, 'uri', '_self', 'Strategies', 'Strategies', NULL, NULL, NULL, '/strategies', NULL, 1, '2', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:38:14', '2021-03-24 06:51:56'),
(13, 1, 0, 'uri', '_self', 'News & Publications', 'News & Publications', NULL, NULL, '', '#', NULL, 1, '4', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:38:54', '2021-03-24 06:50:47'),
(14, 1, 13, 'uri', '_self', 'Stories from the field', 'Stories from the field', NULL, NULL, NULL, '#', NULL, 1, '1', '2021-03-23 06:40:05', NULL, NULL, '2021-03-22 23:40:05', '2021-03-24 06:50:47'),
(15, 1, 14, 'uri', '_self', 'Best Practice', 'Best Practice', NULL, NULL, NULL, '/best-practices', NULL, 1, '2', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:40:31', '2021-03-24 07:10:37'),
(16, 1, 14, 'uri', '_self', 'Articles', 'Articles', NULL, NULL, NULL, '/articles', NULL, 1, '1', '2021-03-23 06:40:25', NULL, NULL, '2021-03-22 23:40:25', '2021-03-24 07:10:37'),
(17, 1, 14, 'uri', '_self', 'Previous Events', 'Previous Events', NULL, NULL, NULL, '/previous-events', NULL, 1, '3', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:40:55', '2021-03-24 07:10:37'),
(18, 1, 14, 'uri', '_self', 'Upcoming Events', 'Upcoming Events', NULL, NULL, NULL, '/upcoming-events', NULL, 1, '4', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:41:06', '2021-03-24 07:10:37'),
(19, 1, 13, 'uri', '_self', 'Publications', 'Publications', NULL, NULL, NULL, '#', NULL, 1, '2', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:42:13', '2021-03-24 06:50:47'),
(20, 1, 19, 'uri', '_self', 'Monthly Bulletin', 'Monthly Bulletin', NULL, NULL, NULL, '/monthly-bulletins', NULL, 1, '1', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:42:37', '2021-03-25 07:30:18'),
(21, 1, 19, 'uri', '_self', 'Videos', 'Videos', NULL, NULL, NULL, '/videos', NULL, 1, '2', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:42:48', '2021-03-24 07:10:37'),
(22, 1, 19, 'uri', '_self', 'Photos', 'Photos', NULL, NULL, NULL, '/photos', NULL, 1, '3', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:42:49', '2021-03-24 07:10:37'),
(23, 1, 19, 'uri', '_self', 'Media Coverage', 'Media Coverage', NULL, NULL, NULL, '/media-coverages', NULL, 1, '4', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:42:55', '2021-03-24 07:10:37'),
(24, 1, 19, 'uri', '_self', 'Press Releases', 'Press Releases', NULL, NULL, NULL, '/press-releases', NULL, 1, '5', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:42:56', '2021-03-24 07:10:37'),
(25, 1, 0, 'uri', '_self', 'Opportunities', 'Opportunities', NULL, NULL, '', '#', NULL, 1, '5', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:44:16', '2021-03-24 06:50:47'),
(26, 1, 25, 'uri', '_self', 'Careers', 'Careers', NULL, NULL, NULL, '/careers', NULL, 1, '1', '2021-03-23 06:44:43', NULL, NULL, '2021-03-22 23:44:43', '2021-03-24 06:50:47'),
(27, 1, 25, 'uri', '_self', 'Tenders', 'Tenders', NULL, NULL, NULL, '/tenders', NULL, 1, '2', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:44:46', '2021-03-24 06:50:47'),
(28, 1, 25, 'uri', '_self', 'Trainings', 'Trainings', NULL, NULL, NULL, '/trainings', NULL, 1, '3', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:45:05', '2021-03-24 06:50:47'),
(29, 1, 0, 'uri', '_self', 'Links', 'Links', NULL, NULL, '', '/links', NULL, 1, '6', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:45:26', '2021-03-24 06:50:47'),
(30, 1, 0, 'content', '_self', 'Response Covid-19', 'Response Covid-19', NULL, NULL, '', '/links', 6, 1, '7', '2021-03-23 00:00:00', NULL, NULL, '2021-03-22 23:45:42', '2021-03-24 06:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `firstname`, `lastname`, `email`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andry', 'Muharyo', 'andrymuharyo@gmail.com', NULL, NULL, '2020-12-31 17:00:00', '2020-12-31 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `overview`
--

CREATE TABLE `overview` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `overview`
--

INSERT INTO `overview` (`id`, `user_id`, `title`, `title_id`, `description`, `description_id`, `button`, `button_id`, `url`, `target`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'AIHPS Overview', 'AIHPS Overview', '<p>AIHSP is a five-year development assistance program which aims to:</p>\n\n<ol>\n	<li>Strengthen the systems in Indonesia that prevent, detect and respond to public and animal health emergencies that results from emerging infectious diseases; and</li>\n	<li>Improve national coordination of responses to national, regional and global health treats.</li>\n</ol>\n\n<p>AIHSP supports President Widodo&rsquo;s instruction on capacity enhancement in preventing, detecting and responding to outbreaks of disease, global pandemics and other emergencies (INPRES No 4 tahun 2019), as well as Indonesia&rsquo;s National Action Plan for Health Security (NAPHS 2020-2024).</p>\n', '<p>AIHSP is a five-year development assistance program which aims to:</p>\n\n<ol>\n	<li>Strengthen the systems in Indonesia that prevent, detect and respond to public and animal health emergencies that results from emerging infectious diseases; and</li>\n	<li>Improve national coordination of responses to national, regional and global health treats.</li>\n</ol>\n\n<p>AIHSP supports President Widodo&rsquo;s instruction on capacity enhancement in preventing, detecting and responding to outbreaks of disease, global pandemics and other emergencies (INPRES No 4 tahun 2019), as well as Indonesia&rsquo;s National Action Plan for Health Security (NAPHS 2020-2024).</p>\n', 'About AIHSP', 'About AIHSP', 'https://indonesia.embassy.gov.au/', '_self', NULL, NULL, '2021-03-24 00:21:03');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `user_id`, `category_id`, `image`, `caption`, `caption_id`, `title`, `title_id`, `description`, `description_id`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'nature1-xsPbF.jpg', 'Public Health Seminar 2021', 'Public Health Seminar 2021', 'Public Health Seminar 2021', 'Public Health Seminar 2021', 'Global public health security is defined as the activities required, both proactive and reactive, to minimize the danger and impact of acute public health events that endanger people’s health across geographical regions and international boundaries.', 'Global public health security is defined as the activities required, both proactive and reactive, to minimize the danger and impact of acute public health events that endanger people’s health across geographical regions and international boundaries.', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 08:42:16', '2021-03-25 08:18:52'),
(2, 1, 1, 'nature6-bPUAf.jpg', 'Public Health Seminar 2020', 'Public Health Seminar 2020', 'Public Health Seminar 2020', 'Public Health Seminar 2020', 'Global public health security is defined as the activities required, both proactive and reactive, to minimize the danger and impact of acute public health events that endanger people’s health across geographical regions and international boundaries.', 'Global public health security is defined as the activities required, both proactive and reactive, to minimize the danger and impact of acute public health events that endanger people’s health across geographical regions and international boundaries.', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 09:10:13', '2021-03-25 08:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `photo_categories`
--

CREATE TABLE `photo_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_categories`
--

INSERT INTO `photo_categories` (`id`, `user_id`, `image`, `caption`, `caption_id`, `title`, `title_id`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, 'Nature Photos', 'Nature Photos', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 07:18:10', '2021-03-23 07:18:14'),
(2, 1, NULL, NULL, NULL, 'Locale Photos', 'Locale Photos', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 07:18:32', '2021-03-23 07:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `photo_items`
--

CREATE TABLE `photo_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_items`
--

INSERT INTO `photo_items` (`id`, `photo_id`, `image`, `caption`, `caption_id`, `title`, `title_id`, `active`, `ordering_at`, `created_at`, `updated_at`) VALUES
(4, 1, 'nature3-OLiaZ.jpg', 'Public Health Seminar 2021 En 1', 'Public Health Seminar 2021 En 1', 'Public Health Seminar 2021 Id 1', 'Public Health Seminar 2021 Id 1', 1, '1', '2021-03-23 08:59:54', '2021-03-23 09:01:54'),
(7, 1, 'nature11-cA36q.jpg', 'Public Health Seminar 2021 En 1', 'Public Health Seminar 2021 En 1', 'Public Health Seminar 2021 Id 1', 'Public Health Seminar 2021 Id 1', 1, '2', '2021-03-23 09:00:38', '2021-03-23 09:01:58'),
(13, 2, 'nature7-FNBeF.jpg', 'Public Health Seminar 2020', 'Public Health Seminar 2020', 'Public Health Seminar 2020', 'Public Health Seminar 2020', 1, '1', '2021-03-23 19:01:14', '2021-03-23 19:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `practices`
--

CREATE TABLE `practices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `practices`
--

INSERT INTO `practices` (`id`, `user_id`, `image`, `caption`, `caption_id`, `title`, `title_id`, `slug`, `slug_id`, `intro`, `intro_id`, `description`, `description_id`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'nature2-wd043.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing eli', 'Lorem ipsum dolor sit amet, consectetur adipiscing eli', 'Lorem ipsum dolor sit amet, consectetur adipiscing eli', 'Lorem ipsum dolor sit amet, consectetur adipiscing eli', 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-eli', 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-eli', 'Esque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex.', 'Esque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..</p>\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra eu eros. Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel diam enim. Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien. Nam felis mauris, tincidunt at convallis id, tempor molestie libero. Quisque viverra sollicitudin nisl sit amet hendrerit. Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi. Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed, pellentesque non purus. Pellentesque egestas convallis suscipit. Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros. Integer ornare libero quis risus fermentum consequat. Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis ullamcorper cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac dictum. Integer ac consectetur purus, vehicula efficitur urna. Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in. Pellentesque suscipit varius gravida. Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis. Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat. Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl et enim. In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio. Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit rutrum..</p>\n', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 00:25:26', '2021-03-23 00:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `releases`
--

CREATE TABLE `releases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'file',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `release_categories`
--

CREATE TABLE `release_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kKbVehtH7hPP1dP910W70z0CR3x46femJ7hQwQuV', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 11_3_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWGdTTmZLQ3dOWVdqTUJQbkduU0VWeUVkVEJ2OW9aQ2VPNUp5Nlk5ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWloc3AudGVzdC9saW5rcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRtSEJwNlU0bHFLV0FuYWZwZkgwa0EudS9uZzZXdW5OU2VxbkVuOERMNlZJNUREOThXSkE3LiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkbUhCcDZVNGxxS1dBbmFmcGZIMGtBLnUvbmc2V3VuTlNlcW5FbjhETDZWSTVERDk4V0pBNy4iO30=', 1616688525);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `user_id`, `image`, `image_mobile`, `caption`, `caption_id`, `title`, `title_id`, `description`, `description_id`, `button`, `button_id`, `url`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'slide-1-c3zYL.jpg', 'slide-1-mob-04lwy.jpg', 'What is AIHSP', 'What is AIHSP', 'What is AIHSP', 'What is AIHSP', 'The Australian Indonesia Health Security Partnership (AIHSP) was announced by Indonesian President Joko Widodo and Australian Prime Minister Scott Morrison during President Widodo’s state visit to Australia in February 2020.', 'The Australian Indonesia Health Security Partnership (AIHSP) was announced by Indonesian President Joko Widodo and Australian Prime Minister Scott Morrison during President Widodo’s state visit to Australia in February 2020.', 'Learn More', 'Learn More', 'https://www.dfat.gov.au/publications/aid/australia-indonesia-health-security-partnership-aihsp-design-document', 1, NULL, '2021-03-25 00:00:00', NULL, NULL, '2021-03-23 09:34:15', '2021-03-24 00:16:50'),
(2, 1, 'slide-2-a6mIj.jpg', 'slide-2-mob-faWUh.jpg', 'What AIHSP Promotes', 'What AIHSP Promotes', 'What AIHSP Promotes', 'What AIHSP Promotes', 'AIHSP promotes a One Health approach that integrates human, animal and environmental health. ', 'AIHSP promotes a One Health approach that integrates human, animal and environmental health. ', 'Learn More', 'Learn More', 'https://indonesia.embassy.gov.au/', 1, NULL, '2021-03-24 00:00:00', NULL, NULL, '2021-03-23 09:37:41', '2021-03-23 09:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin867\'s Team', 1, '2021-03-21 21:52:02', '2021-03-21 21:52:02'),
(2, 1, 'admin867\'s Team', 1, '2021-03-21 22:21:36', '2021-03-21 22:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `active`, `remember_token`, `current_team_id`, `profile_photo_path`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin867', 'administrator', 'admin@test.com', NULL, '$2y$10$mHBp6U4lqKWAnafpfH0kA.u/ng6WunNSeqnEn8DL6VI5DD98WJA7.', NULL, NULL, 1, NULL, 2, NULL, NULL, '2021-03-21 22:21:36', '2021-03-22 02:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `category_id`, `image`, `caption`, `caption_id`, `title`, `title_id`, `description`, `description_id`, `url`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'landscape2-bbZfc.jpg', NULL, NULL, 'Australia-Indonesia partnership against COVID-19', 'Australia-Indonesia partnership against COVID-19', '#COVID19​ presents an unprecedented global challenge that can’t be faced alone.\n\nAustralia is committed to supporting Indonesia in overcoming the challenge of the pandemic.', '#COVID19​ presents an unprecedented global challenge that can’t be faced alone.\n\nAustralia is committed to supporting Indonesia in overcoming the challenge of the pandemic.', 'https://www.youtube.com/watch?v=Atxinkc2sH8', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 03:34:42', '2021-03-24 00:57:52'),
(2, 1, 2, 'landscape9-zsWJb.jpg', NULL, NULL, 'Sustainable Development Goals - Introduction', 'Sustainable Development Goals - Introduction', 'This video was produced by the EDDS Team of the Pro Vice-Chancellor portfolio in collaboration with UNSW Sustainability.', 'This video was produced by the EDDS Team of the Pro Vice-Chancellor portfolio in collaboration with UNSW Sustainability.', 'https://www.youtube.com/watch?v=5EW5vVCiXlQ', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 06:14:19', '2021-03-24 00:58:08'),
(3, 1, 2, 'landscape3-NV9Zz.jpg', NULL, NULL, 'What if we Drink too much Water?', 'What if we Drink too much Water?', 'This video was produced by the EDDS Team of the Pro Vice-Chancellor portfolio in collaboration with UNSW Sustainability.', 'This video was produced by the EDDS Team of the Pro Vice-Chancellor portfolio in collaboration with UNSW Sustainability.', 'https://www.youtube.com/watch?v=siern7ftofk', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 06:14:26', '2021-03-24 00:58:15'),
(4, 1, 1, 'landscape6-gv8Eo.jpg', NULL, NULL, 'Nature Therapy: Relaxing Full Motion Forestry with Natural Sounds', 'Nature Therapy: Relaxing Full Motion Forestry with Natural Sounds', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien velit, aliquet eget commodo nec, auctor a sapien. Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero. Lorem.', 'https://www.youtube.com/watch?v=Kb8CW3axqRE', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 06:48:39', '2021-03-24 00:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `video_categories`
--

CREATE TABLE `video_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `ordering_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_categories`
--

INSERT INTO `video_categories` (`id`, `user_id`, `title`, `title_id`, `active`, `ordering_at`, `submitted_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Latest Video', 'Latest Video', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 03:00:43', '2021-03-23 03:00:43'),
(2, 1, 'Sustainable development goals', 'Sustainable development goals', 1, NULL, '2021-03-23 00:00:00', NULL, NULL, '2021-03-23 06:11:56', '2021-03-23 06:11:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_categories`
--
ALTER TABLE `data_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legals`
--
ALTER TABLE `legals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_categories`
--
ALTER TABLE `media_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overview`
--
ALTER TABLE `overview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_categories`
--
ALTER TABLE `photo_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_items`
--
ALTER TABLE `photo_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photo_items_photo_id_foreign` (`photo_id`);

--
-- Indexes for table `practices`
--
ALTER TABLE `practices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `releases`
--
ALTER TABLE `releases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `release_categories`
--
ALTER TABLE `release_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_categories`
--
ALTER TABLE `video_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `datas`
--
ALTER TABLE `datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `data_categories`
--
ALTER TABLE `data_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `legals`
--
ALTER TABLE `legals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_categories`
--
ALTER TABLE `media_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `overview`
--
ALTER TABLE `overview`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photo_categories`
--
ALTER TABLE `photo_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photo_items`
--
ALTER TABLE `photo_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `practices`
--
ALTER TABLE `practices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `releases`
--
ALTER TABLE `releases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `release_categories`
--
ALTER TABLE `release_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video_categories`
--
ALTER TABLE `video_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photo_items`
--
ALTER TABLE `photo_items`
  ADD CONSTRAINT `photo_items_photo_id_foreign` FOREIGN KEY (`photo_id`) REFERENCES `photos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
