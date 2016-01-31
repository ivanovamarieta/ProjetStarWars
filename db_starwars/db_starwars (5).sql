-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 31 Janvier 2016 à 23:07
-- Version du serveur :  10.0.17-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_starwars`
--

-- --------------------------------------------------------

--
-- Structure de la table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` smallint(6) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `status` enum('finalized','unfinalized') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unfinalized',
  `_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `quantity`, `price`, `status`, `_token`, `created_at`, `updated_at`) VALUES
(8, 4, NULL, 1, '200.00', 'unfinalized', 'zMKa5Ad6EMWFpnwTA1HxGao0HTTIHBXR20BeOU1q', '2016-01-31 04:20:06', '2016-01-31 04:20:06'),
(9, 4, NULL, 1, '200.00', 'unfinalized', 'zMKa5Ad6EMWFpnwTA1HxGao0HTTIHBXR20BeOU1q', '2016-01-31 04:23:26', '2016-01-31 04:23:26'),
(10, 4, NULL, 1, '200.00', 'unfinalized', 'zMKa5Ad6EMWFpnwTA1HxGao0HTTIHBXR20BeOU1q', '2016-01-31 04:24:18', '2016-01-31 04:24:18'),
(11, 4, NULL, 1, '200.00', 'unfinalized', 'zMKa5Ad6EMWFpnwTA1HxGao0HTTIHBXR20BeOU1q', '2016-01-31 04:25:22', '2016-01-31 04:25:22'),
(12, 2, NULL, 1, '358.00', 'unfinalized', 'zMKa5Ad6EMWFpnwTA1HxGao0HTTIHBXR20BeOU1q', '2016-01-31 04:26:28', '2016-01-31 04:26:28'),
(13, 5, NULL, 1, '312.00', 'unfinalized', 'zMKa5Ad6EMWFpnwTA1HxGao0HTTIHBXR20BeOU1q', '2016-01-31 04:27:07', '2016-01-31 04:27:07'),
(14, 3, NULL, 1, '380.00', 'unfinalized', 'zMKa5Ad6EMWFpnwTA1HxGao0HTTIHBXR20BeOU1q', '2016-01-31 04:27:54', '2016-01-31 04:27:54'),
(15, 4, NULL, 1, '200.00', 'unfinalized', 's800gHkDhmcYaRNZ2PfJuva1vNNvNYwCG4os62vN', '2016-01-31 08:26:57', '2016-01-31 08:26:57'),
(16, 2, NULL, 1, '358.00', 'unfinalized', 's800gHkDhmcYaRNZ2PfJuva1vNNvNYwCG4os62vN', '2016-01-31 10:17:16', '2016-01-31 10:17:16');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'lasers', '', '', '2016-01-29 10:14:55', '0000-00-00 00:00:00'),
(2, 'casques', '', '', '2016-01-29 10:14:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `number_card` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `number_command` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `address`, `number_card`, `number_command`, `created_at`, `updated_at`) VALUES
(1, 1, '3711 Botsford Inlet\nHaleybury, MO 62285-6110', '4941218866789', 18, '2016-01-29 10:15:01', '2016-01-29 10:15:01'),
(2, 2, '347 Kemmer Rest Apt. 913\nNorth Flavie, NV 68252-2880', '4916182374274752', 172, '2016-01-29 10:15:01', '2016-01-29 10:15:01'),
(3, 3, '87108 Von Flat Suite 389\nNew Ephraim, NH 17764', '5551862114294999', 11, '2016-01-29 10:15:01', '2016-01-29 10:15:01'),
(4, 4, '26430 Zane Roads Suite 394\nHaagfurt, WY 37410', '4929974760687968', 3, '2016-01-29 10:15:01', '2016-01-29 10:15:01');

-- --------------------------------------------------------

--
-- Structure de la table `histories`
--

CREATE TABLE `histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `command_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('finalized','unfinalized') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unfinalized',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `histories`
--

INSERT INTO `histories` (`id`, `product_id`, `customer_id`, `price`, `quantity`, `command_at`, `status`, `created_at`, `updated_at`) VALUES
(2, 11, 1, '1062.40', 2, '2016-01-29 13:44:59', 'finalized', '2016-01-29 13:44:59', '2016-01-29 13:44:59'),
(3, 11, 2, '1062.40', 2, '2016-01-29 13:52:45', 'finalized', '2016-01-29 13:52:45', '2016-01-29 13:52:45'),
(5, 11, 1, '1062.40', 2, '2016-01-29 14:24:55', 'finalized', '2016-01-29 14:24:55', '2016-01-29 14:24:55'),
(6, 11, 1, '1062.40', 2, '2016-01-29 14:28:05', 'finalized', '2016-01-29 14:28:05', '2016-01-29 14:28:05'),
(8, 2, 1, '20509.33', 1, '2016-01-29 14:28:05', 'finalized', '2016-01-29 14:28:05', '2016-01-29 14:28:05'),
(9, 11, 1, '1062.40', 2, '2016-01-29 14:28:09', 'finalized', '2016-01-29 14:28:09', '2016-01-29 14:28:09'),
(11, 2, 1, '20509.33', 1, '2016-01-29 14:28:09', 'finalized', '2016-01-29 14:28:09', '2016-01-29 14:28:09'),
(12, 11, 1, '1062.40', 2, '2016-01-29 14:28:17', 'finalized', '2016-01-29 14:28:17', '2016-01-29 14:28:17'),
(14, 2, 1, '20509.33', 1, '2016-01-29 14:28:17', 'finalized', '2016-01-29 14:28:17', '2016-01-29 14:28:17'),
(15, 11, 1, '1062.40', 2, '2016-01-29 14:29:40', 'finalized', '2016-01-29 14:29:40', '2016-01-29 14:29:40'),
(17, 2, 1, '20509.33', 1, '2016-01-29 14:29:40', 'finalized', '2016-01-29 14:29:40', '2016-01-29 14:29:40'),
(18, 2, 1, '358.00', 1, '2016-01-31 03:58:34', 'finalized', '2016-01-31 03:58:34', '2016-01-31 03:58:34'),
(19, 4, 1, '200.00', 1, '2016-01-31 03:58:34', 'finalized', '2016-01-31 03:58:34', '2016-01-31 03:58:34'),
(20, 4, 1, '200.00', 1, '2016-01-31 03:58:34', 'finalized', '2016-01-31 03:58:34', '2016-01-31 03:58:34'),
(21, 4, 1, '200.00', 1, '2016-01-31 04:16:04', 'finalized', '2016-01-31 04:16:04', '2016-01-31 04:16:04'),
(22, 2, 1, '358.00', 1, '2016-01-31 04:16:04', 'finalized', '2016-01-31 04:16:04', '2016-01-31 04:16:04'),
(23, 2, 1, '358.00', 1, '2016-01-31 04:16:04', 'finalized', '2016-01-31 04:16:04', '2016-01-31 04:16:04'),
(24, 2, 1, '358.00', 1, '2016-01-31 04:16:04', 'finalized', '2016-01-31 04:16:04', '2016-01-31 04:16:04');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_12_30_100719_create_categories_table', 1),
('2015_12_30_102805_create_tags_table', 1),
('2015_12_30_110715_create_products_table', 1),
('2015_12_30_114114_create_pictures_table', 1),
('2015_12_30_115511_create_product_tag_table', 1),
('2015_12_30_133332_create_customers_table', 1),
('2015_12_30_133954_create_histories_table', 1),
('2015_12_30_135533_alter_pictures_table', 1),
('2016_01_12_104708_alter_products_table', 1),
('2016_01_12_112603_alter_categories_table', 1),
('2016_01_21_002713_create_carts_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` smallint(6) NOT NULL,
  `type` enum('png','jpg','gif') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pictures`
--

INSERT INTO `pictures` (`id`, `product_id`, `title`, `uri`, `size`, `type`, `created_at`, `updated_at`) VALUES
(16, 3, 'Laurianne Wolf', 'Phqr5SdIMuoJ.jpg', 32317, 'jpg', '2016-01-30 23:00:59', '2016-01-30 23:00:59'),
(17, 3, 'Casque Clone Trooper', '3FrETUPFPFvP.jpg', 32317, 'jpg', '2016-01-30 23:03:04', '2016-01-30 23:03:04'),
(19, 18, 'RRR', '1Bhsk5NgUxcG.jpg', 31363, 'jpg', '2016-01-30 23:49:55', '2016-01-30 23:49:55'),
(20, 2, 'Mr. Sigmund Kunze Sr.', 'va1jP2sRIP16.jpg', 32767, 'jpg', '2016-01-31 00:06:50', '2016-01-31 00:06:50'),
(21, 4, 'Yasmin Cummerata', 'yOo3MY47VhFS.jpg', 32767, 'jpg', '2016-01-31 00:08:35', '2016-01-31 00:08:35'),
(22, 4, 'Masque Dark Vador', 'PWEuDu7HZaTS.jpg', 32767, 'jpg', '2016-01-31 00:09:25', '2016-01-31 00:09:25'),
(23, 2, 'Masque Kilo Ren ', '7u3CfRSf46qx.jpg', 32767, 'jpg', '2016-01-31 00:09:54', '2016-01-31 00:09:54'),
(24, 15, 'Adele Wisoky', 'fIE9lkcRVHlR.jpg', 30948, 'jpg', '2016-01-31 00:13:04', '2016-01-31 00:13:04'),
(25, 11, 'Arne Abbott', '9dAGnEsK5YKN.jpg', 32767, 'jpg', '2016-01-31 00:14:34', '2016-01-31 00:14:34'),
(26, 11, 'Casque Star Wars Le Pilote', 'OZVHdM2Mbk61.jpg', 32767, 'jpg', '2016-01-31 00:14:48', '2016-01-31 00:14:48'),
(27, 6, 'Mr. Jaydon Torphy DDS', 'owMxKERkQiDm.jpg', 32767, 'jpg', '2016-01-31 00:18:59', '2016-01-31 00:18:59'),
(28, 12, 'Prof. Roderick Christiansen III', 'HC86JEeTQNe8.jpg', 32767, 'jpg', '2016-01-31 00:21:15', '2016-01-31 00:21:15'),
(29, 14, 'Alysa Bosco', 'j6gMBKfW4amS.jpg', 32767, 'jpg', '2016-01-31 00:22:26', '2016-01-31 00:22:26'),
(30, 13, 'Irving Lueilwitz', 'L9UlqmGTX1iX.jpg', 32767, 'jpg', '2016-01-31 00:23:42', '2016-01-31 00:23:42'),
(31, 7, 'Mr. Bill Towne IV', '9zn4cbTWBzgW.jpg', 32767, 'jpg', '2016-01-31 00:24:46', '2016-01-31 00:24:46'),
(32, 5, 'Ismael Bins', 'psWbkXhvX9vf.jpg', 32767, 'jpg', '2016-01-31 00:28:37', '2016-01-31 00:28:37'),
(33, 15, 'Casque Capitaine Phasma', '6Td0dBoFOIMV.jpg', 30948, 'jpg', '2016-01-31 00:29:12', '2016-01-31 00:29:12'),
(34, 10, 'Braxton Lang', 'OOnsrpHeKdfQ.jpg', 32767, 'jpg', '2016-01-31 00:31:18', '2016-01-31 00:31:18'),
(35, 9, 'Mr. Hayley Schinner DDS', 'nNlslJVsDGfw.jpg', 32767, 'jpg', '2016-01-31 00:32:33', '2016-01-31 00:32:33'),
(36, 8, 'Prof. Haylee Kling', 'C1h3J621LxHt.jpg', 32767, 'jpg', '2016-01-31 00:46:24', '2016-01-31 00:46:24'),
(37, 19, 'Casque Helmet-B-Font', 'Q2T6pjGat2Vr.jpg', 32767, 'jpg', '2016-01-31 00:48:09', '2016-01-31 00:48:09'),
(38, 20, 'Sabre Rebel ', 'DePoZfhfWmR9.jpg', 19388, 'jpg', '2016-01-31 00:49:13', '2016-01-31 00:49:13'),
(39, 21, 'Sabre Laser Hasbro', 'GbZLoBTZAVa2.jpg', 32767, 'jpg', '2016-01-31 00:50:55', '2016-01-31 00:50:55'),
(40, 22, 'Sabre Lazer Electronique', 'TwYuZG6jzQfA.jpg', 32767, 'jpg', '2016-01-31 00:53:24', '2016-01-31 00:53:24');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` smallint(5) UNSIGNED NOT NULL,
  `status` enum('opened','closed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'opened',
  `published_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `abstract`, `content`, `price`, `quantity`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(2, 2, 'Masque Kilo Ren ', 'mr-sigmund-kunze-sr', 'Masque Kilo Ren - deux pieces', '', '359.00', 4, 'closed', '2016-01-31 23:01:27', '2016-01-31 22:01:27', '2016-01-31 22:01:27'),
(3, 2, 'Casque Clone Trooper', 'laurianne-wolf', 'Casque Clone Tropper Adulte.', '', '380.00', 5, 'closed', '2016-01-31 01:54:54', '2016-01-31 17:57:13', '2016-01-31 17:57:13'),
(4, 2, 'Masque Dark Vador', 'yasmin-cummerata', 'Masque Dark Vador enfant', '', '200.00', 3, 'opened', '2016-01-31 01:09:25', '2016-01-31 18:24:55', '2016-01-31 18:24:55'),
(5, 1, 'Double Sabre Laser ', 'ismael-bins', 'Double Sabre Laser ', '', '312.00', 4, 'opened', '2016-01-31 01:28:37', '2016-01-31 00:28:37', '2016-01-31 00:28:37'),
(6, 1, 'Sabre Laser basique', 'mr-jaydon-torphy-dds', 'Sabre Laser Dark Vador, basique, rouge', '', '140.00', 8, 'closed', '2016-01-31 01:18:59', '2016-01-31 18:25:01', '2016-01-31 18:25:01'),
(7, 1, 'Mini Sabre Lumineux', 'mr-bill-towne-iv', 'Mini sabre lumineux', '', '261.09', 5, 'opened', '2016-01-31 01:24:46', '2016-01-31 00:24:47', '2016-01-31 00:24:46'),
(8, 1, 'Sabre Laser ', 'prof-haylee-kling', 'Sabre Laser bleu', '', '90.00', 12, 'opened', '2016-01-31 01:46:24', '2016-01-31 00:46:24', '2016-01-31 00:46:24'),
(9, 2, 'Casque Dark Vador', 'mr-hayley-schinner-dds', 'Casque Dark Vador adulte', '', '348.00', 5, 'closed', '2016-01-31 01:32:33', '2016-01-31 18:25:06', '2016-01-31 18:25:06'),
(10, 2, 'Casque Vilain Trooper', 'braxton-lang', 'Masque adulte casque deux pieces Vilain Trooper rouge', '', '580.00', 8, 'opened', '2016-01-31 01:31:18', '2016-01-31 00:31:18', '2016-01-31 00:31:18'),
(11, 2, 'Casque Star Wars Le Pilote', 'arne-abbott', 'Casque Star Wars Le Pilote', '', '450.00', 7, 'opened', '2016-01-31 01:14:48', '2016-01-31 00:14:48', '2016-01-31 00:14:48'),
(12, 2, 'Casque Clone Army', 'prof-roderick-christiansen-iii', 'Costume accessoire casque Clone Army Star Wars', '', '500.00', 4, 'closed', '2016-01-31 01:21:15', '2016-01-31 17:53:40', '2016-01-31 17:53:40'),
(13, 2, 'Rubies Star Wars casque', 'irving-lueilwitz', 'Rubies Star Wars casque', '', '300.00', 9, 'opened', '2016-01-31 01:23:42', '2016-01-31 00:23:42', '2016-01-31 00:23:42'),
(14, 1, 'Sabre Laser Inquisitor', 'alysa-bosco', 'Sabre Laser Inquisitor', '', '250.00', 3, 'opened', '2016-01-31 01:55:38', '2016-01-31 00:55:38', '2016-01-31 00:55:38'),
(15, 2, 'Casque Capitaine Phasma', 'adele-wisoky', 'Casque Capitaine Phasma Star Wars', '', '250.00', 8, 'opened', '2016-01-31 01:29:12', '2016-01-31 00:29:12', '2016-01-31 00:29:12'),
(18, 1, 'Figurine Star Wars', 'rrr', 'Figurine Star Wars ', '', '120.00', 4, 'opened', '2016-01-31 01:11:34', '2016-01-31 00:11:34', '2016-01-31 00:11:34'),
(19, 2, 'Casque Helmet-B-Font', 'casque-helmet-b-font', 'Casque Helmet-B-Font', '', '670.00', 3, 'opened', '2016-01-31 01:48:09', '2016-01-31 00:48:09', '2016-01-31 00:48:09'),
(20, 1, 'Sabre Rebel ', 'sabre-rebel', 'Sabre Rebel', '', '58.00', 8, 'opened', '2016-01-31 01:49:13', '2016-01-31 00:49:13', '2016-01-31 00:49:13'),
(21, 1, 'Sabre Laser Hasbro', 'sabre-laser-hasbro', ' Sabre Laser Hasbro Kit', '', '200.00', 7, 'opened', '2016-01-31 01:50:55', '2016-01-31 00:50:55', '2016-01-31 00:50:55'),
(22, 1, 'Sabre Lazer Electronique', 'sabre-lazer-electronique', 'Sabre Laser Electronique', '', '300.00', 20, 'closed', '2016-01-31 01:53:24', '2016-01-31 18:17:08', '2016-01-31 18:17:08');

-- --------------------------------------------------------

--
-- Structure de la table `product_tag`
--

CREATE TABLE `product_tag` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `product_tag`
--

INSERT INTO `product_tag` (`tag_id`, `product_id`) VALUES
(4, 2),
(4, 3),
(2, 4),
(3, 4),
(4, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(4, 9),
(2, 10),
(3, 10),
(4, 11),
(4, 12),
(2, 13),
(3, 13),
(4, 13),
(3, 14),
(4, 15),
(1, 18),
(4, 19),
(1, 20),
(3, 21),
(1, 22);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'star', '2016-01-29 10:14:55', '0000-00-00 00:00:00'),
(2, 'galaxy', '2016-01-29 10:14:55', '0000-00-00 00:00:00'),
(3, 'laser', '2016-01-29 10:14:55', '0000-00-00 00:00:00'),
(4, 'casque', '2016-01-29 10:14:55', '0000-00-00 00:00:00'),
(5, 'princesse', '2016-01-29 10:14:55', '0000-00-00 00:00:00'),
(6, 'saga', '2016-01-29 10:14:55', '0000-00-00 00:00:00'),
(7, 'star wars 7', '2016-01-29 10:14:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('administrator','visitor') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'visitor',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tony', 'tony@tony.fr', '$2y$10$ROatKZN98oI1Esu15JKBH.Hma7N1/yUmWmPl3xX2cV67Labb/zmWC', 'administrator', 'bWV6XnAFQp94lTDeAJwBM09bU3TTwqMpPGUXsmCzgR0pRTAV9TcL7JxSx97O', '2016-01-31 21:58:02', '2016-01-31 21:58:02'),
(2, 'Mari', 'mari@mari.fr', '$2y$10$WObmu7mbJkr2SAGF/5yjteYlDd1TFm/3DXiYIawQl3wVHNU4eNW6C', 'visitor', 'nOcRoZgUG08sHHmeEB88xyrMKYfEkBIlKPTwfpaC7c1rlyJyOLd8t4llXgXi', '2016-01-31 16:09:08', '2016-01-31 16:09:08'),
(3, 'Toto', 'toto@toto.fr', '$2y$10$bHJicTqK0A/mFOC1vaEROe7lvT.EKhgyB4tM3SzyLd5j4OXAABdb2', 'visitor', NULL, '2016-01-29 10:14:55', '0000-00-00 00:00:00'),
(4, 'Pepe', 'pepe@ppepe.fr', '$2y$10$7DYqyrwfwWq902xsoEeP..XT9LJPtk0cFaby3x7/o9fSSSHJdG8MO', 'visitor', NULL, '2016-01-29 10:14:55', '0000-00-00 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_product_id_foreign` (`product_id`),
  ADD KEY `histories_customer_id_foreign` (`customer_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pictures_product_id_foreign` (`product_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Index pour la table `product_tag`
--
ALTER TABLE `product_tag`
  ADD UNIQUE KEY `product_tag_product_id_tag_id_unique` (`product_id`,`tag_id`),
  ADD KEY `product_tag_tag_id_foreign` (`tag_id`);

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `histories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `product_tag_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
