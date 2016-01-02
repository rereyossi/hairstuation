-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 24, 2015 at 06:10 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomer`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `email`, `name`, `comment`, `id_product`, `created_at`, `updated_at`) VALUES
(4, 'dedavinci@gmail.com', 'jond smith', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, mi consequat ornare tempor, ma', 29, '2015-12-20 16:01:52', '2015-12-20 16:01:52'),
(5, 'jonata@gmail.com', 'jonata', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, mi consequat ornare tempor, ma', 29, '2015-12-20 17:16:42', '2015-12-20 17:16:42'),
(6, 'email@gmail.com', 'lkdjflkdsja', 'fjlkajflakjd', 29, '2015-12-22 06:50:13', '2015-12-22 06:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country` varchar(45) DEFAULT NULL,
  `location1` varchar(45) DEFAULT NULL,
  `location2` varchar(45) DEFAULT NULL,
  `id_parent` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`, `location1`, `location2`, `id_parent`, `created_at`, `updated_at`) VALUES
(1, 'Indonesia', '2000', '3000', NULL, NULL, NULL),
(2, 'jawa', '4000', '4000', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

CREATE TABLE `group_users` (
  `id` int(11) unsigned NOT NULL,
  `group_name` varchar(45) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_users`
--

INSERT INTO `group_users` (`id`, `group_name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'your admin', '2015-12-24 10:31:46', '0000-00-00 00:00:00'),
(2, 'member', 'your member', '2015-12-24 10:31:46', '0000-00-00 00:00:00'),
(3, 'visitor', 'your visitor', '2015-12-24 10:31:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL,
  `filename` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `title`, `desc`, `path`, `img_status`, `id_product`, `created_at`, `updated_at`) VALUES
(70, 'Cool.png', 'Mr. Cool Wet Look Gel', '', 'public/uploads/images/original/Cool.png', 'display', 30, '2015-12-20 16:54:04', '2015-12-20 09:54:04'),
(71, 'Dapper.png', 'Mr. Dapper Matte Gel', '', 'public/uploads/images/original/Dapper.png', 'display', 31, '2015-12-20 16:55:37', '2015-12-20 09:55:37'),
(73, 'Mr.-Polished.png', '', '', 'public/uploads/images/original/Mr.-Polished.png', 'display', 32, '2015-12-20 17:03:39', '2015-12-20 10:03:39'),
(74, 'Active.png', '', '', 'public/uploads/images/original/Active.png', 'display', 29, '2015-12-20 17:04:35', '2015-12-20 10:04:35'),
(79, 'Groomed.png', '', '', 'public/uploads/images/original/Groomed.png', 'gallery', 35, '2015-12-21 00:00:11', '2015-12-20 17:00:11'),
(80, 'hair-situation.png', '', '', 'public/uploads/images/original/hair-situation.png', 'display', 35, '2015-12-21 00:00:11', '2015-12-20 17:00:11'),
(81, 'Slick.png', '', '', 'public/uploads/images/original/Slick.png', 'display', 33, '2015-12-21 00:19:02', '2015-12-20 17:19:02'),
(82, 'Mr.-Smooth.png', '', '', 'public/uploads/images/original/Mr.-Smooth.png', 'display', 34, '2015-12-21 00:19:55', '2015-12-20 17:19:55'),
(83, 'Mr.-Radiant.png', '', '', 'public/uploads/images/original/Mr.-Radiant.png', 'display', 36, '2015-12-22 01:09:36', '2015-12-21 18:09:36');

-- --------------------------------------------------------

--
-- Table structure for table `meta_users`
--

CREATE TABLE `meta_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `id_country` varchar(45) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `optionals` varchar(45) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta_users`
--

INSERT INTO `meta_users` (`id`, `firstname`, `lastname`, `id_country`, `street`, `optionals`, `postcode`, `email`, `city`, `state`, `phone`, `note`, `id_user`, `created_at`, `updated_at`) VALUES
(18, 'jont', 'smith', '4', 'jl semolo waru', '', '22002', 'dedavinci@gmail.com', 'surabaya', 'jawa timur', 865554443, NULL, 32, '2015-12-24 03:46:51', '2015-12-24 03:46:51'),
(19, 'sakira', 'jontoh', '3', 'jl sulawesi', 'ciputra', '9909', 'sakira@gmail.com', 'surabaya', 'jawa timur', 852334, NULL, 33, '2015-12-24 04:46:48', '2015-12-24 04:46:48'),
(20, 'nama depan', 'nama belakang', '3', 'jl maguwo', 'ciputra', '99909', 'emailan@gmail.com', 'tarakan', 'kalimantan timur', 988777, NULL, 34, '2015-12-24 07:04:41', '2015-12-24 07:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_12_11_171025_create_product__table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL,
  `id_transaction` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned DEFAULT NULL,
  `subsribe` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_transaction`, `id_product`, `id_user`, `subsribe`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
(11, 13, 29, 33, 7, 6, 12000, '2015-12-24 12:01:23', '0000-00-00 00:00:00'),
(12, 13, 30, 33, 4, 2, 60000, '2015-12-24 11:46:48', '0000-00-00 00:00:00'),
(13, 14, 29, 34, 0, 1, 2000, '2015-12-24 14:04:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pivot_users`
--

CREATE TABLE `pivot_users` (
  `id` int(10) unsigned NOT NULL,
  `id_group` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pivot_users`
--

INSERT INTO `pivot_users` (`id`, `id_group`, `id_user`, `created_at`, `updated_at`) VALUES
(6, 3, 25, '2015-12-24 09:54:31', '0000-00-00 00:00:00'),
(12, 3, 32, '2015-12-24 10:46:51', '0000-00-00 00:00:00'),
(13, 3, 33, '2015-12-24 11:46:48', '0000-00-00 00:00:00'),
(14, 3, 34, '2015-12-24 14:04:41', '0000-00-00 00:00:00'),
(15, 2, 26, '2015-12-24 16:50:54', '0000-00-00 00:00:00'),
(16, 1, 35, '2015-12-24 16:52:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `desc`, `price`, `category`, `created_at`, `updated_at`) VALUES
(29, 'Mr. Active Styling Glue', 'can control the most extreme hair situations. Mold and spike with our alcohol free formula. Infuse your style with water resistant styling glue that can sculpt even the most challenging styles. Whether at the beach or braving the elements, Mr. Active will', 2000, 'styling', '2015-12-20 09:49:25', '2015-12-24 09:24:27'),
(30, 'Mr. Cool Wet Look Gel', 'can control any challenging hair situation. Our alcohol free strong hold formula keeps you looking sleek all day long. Infuse your style with serious shine and enjoy the irresistible fresh masculine scent while you''re at it.\r\n\r\nThe Situation: Super confid', 30000, 'styling', '2015-12-20 09:53:43', '2015-12-24 09:24:34'),
(31, 'Mr. Dapper Matte Gel', 'can control any demanding hair situation. Our alcohol free strong hold formula keeps you looking polished all day long. Infuse your style with a matte look and enjoy the irresistible spiced masculine scent while you''re at it.\r\n\r\nThe Situation: Successful ', 3000, 'styling', '2015-12-20 09:54:57', '2015-12-24 09:25:50'),
(32, 'Mr. Polished Moderate Gel', '', 12, 'styling', '2015-12-20 09:56:55', '2015-12-24 09:25:58'),
(33, ' Mr. Groomed Scuplting Pomade', 'Mr Cool Wet Look Gel\r\nMr. Groomed Scuplting Pomade\r\n\r\nCan control any ambitious hair situation. Our alchohol-free weightless formula keeps you looking sophisticated all day long. infuse your style with pliable pomade and enjoy the refreshing scent. Best', 3445, 'styling', '2015-12-20 10:05:02', '2015-12-24 09:26:07'),
(34, 'Mr. Slick Molding Pomade', 'Can control any outrageous hair situation. Our alcohol free versatile formula keeps you looking slick all day with a high gloss finish. Infuse your style with molding pomade and enjoy the invigorating masculine scent while you are at it. Best of all, Mr S', 324, 'grooming', '2015-12-20 10:08:13', '2015-12-24 09:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `shipping` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `code`, `date`, `subtotal`, `shipping`, `total`, `created_at`, `updated_at`) VALUES
(10, '0BE1rULpXKDNMyZ9', '0000-00-00 00:00:00', NULL, NULL, NULL, '2015-12-24 10:40:14', '0000-00-00 00:00:00'),
(13, 'N5xPyIh2IKJCkbGB', '0000-00-00 00:00:00', 72000, 72000, 144000, '2015-12-24 04:46:48', '2015-12-24 04:46:48'),
(14, 'CzIylkGUBlg9T0lQ', '0000-00-00 00:00:00', 2000, 2000, 4000, '2015-12-24 07:04:41', '2015-12-24 07:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(26, '', 'eDFDSDSfffsdsddfdfasdsdfdfdsDFmassssssil@gmail.comfd', '', NULL, '2015-12-24 02:57:29', '2015-12-24 02:57:29'),
(32, 'jont smith', 'dedavinci@gmail.com', '', NULL, '2015-12-24 03:46:51', '2015-12-24 03:46:51'),
(33, 'sakira jontoh', 'sakira@gmail.com', '', NULL, '2015-12-24 04:46:48', '2015-12-24 04:46:48'),
(34, 'nama depan nama belakang', 'emailan@gmail.com', '', NULL, '2015-12-24 07:04:41', '2015-12-24 07:04:41'),
(35, 'dedavinci', 'admin@gmail.com', '$2y$10$9CLF7b2qZ.urIFhYbmdu/O7nIgMMXO/CpO8wFoVvMhwc1asKhTItu', '9NyyVpeqlPiBXcUKDfrTkOadRsW2U7FtME8mGpw8iBxDuDPwOEcjK1R53bTk', '2015-12-24 09:50:54', '2015-12-24 09:58:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `toProduct_idx` (`id_product`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_users`
--
ALTER TABLE `group_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_product_idx` (`id_product`);

--
-- Indexes for table `meta_users`
--
ALTER TABLE `meta_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meta_user_idx` (`id_user`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_trans_idx` (`id_transaction`),
  ADD KEY `order_product_idx` (`id_product`),
  ADD KEY `order_user_idx` (`id_user`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pivot_users`
--
ALTER TABLE `pivot_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `toUser_idx` (`id_group`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `group_users`
--
ALTER TABLE `group_users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `meta_users`
--
ALTER TABLE `meta_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pivot_users`
--
ALTER TABLE `pivot_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meta_users`
--
ALTER TABLE `meta_users`
  ADD CONSTRAINT `meta_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_trans` FOREIGN KEY (`id_transaction`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
