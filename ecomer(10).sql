-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 17, 2016 at 02:36 PM
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
  `rating` int(11) DEFAULT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countrys`
--

CREATE TABLE `countrys` (
  `id` int(11) NOT NULL,
  `country` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countrys`
--

INSERT INTO `countrys` (`id`, `country`, `code`) VALUES
(15, 'Alaska', 'AK'),
(16, 'Alabama', 'AL'),
(17, 'American Samoa', 'AS'),
(18, 'Arizona', 'AZ'),
(19, 'Arkansas', 'AR'),
(20, 'California', 'CA'),
(21, 'Colorado', 'CO'),
(22, 'Connecticut', 'CT'),
(23, 'Delaware', 'DE'),
(24, 'District of Columbia', 'DC'),
(25, 'Federated ', 'FM'),
(26, 'Florida', 'FL'),
(27, 'Georgia', 'GA'),
(28, 'Guam', 'GU'),
(29, 'Hawaii', 'HI'),
(30, 'Idaho', 'ID'),
(31, 'Illinois', 'IL'),
(32, 'Indiana', 'IN'),
(33, 'Iowa', 'IA'),
(34, 'Kansas', 'KS'),
(35, 'Kentucky', 'KY'),
(36, 'Louisiana', 'LA'),
(37, 'Maine', 'ME'),
(38, 'Marshall Islands', 'MH'),
(39, 'Maryland', 'MD'),
(40, 'Massachusetts', 'MA'),
(41, 'Michigan', 'MI'),
(42, 'Minnesota', 'MN'),
(43, 'Mississippi', 'MS'),
(44, 'Missouri', 'MO'),
(45, 'Montana', 'MT'),
(46, 'Nebraska', 'NE'),
(47, 'Nevada', 'NV'),
(48, 'New Hampshire', 'NH'),
(49, 'New Jersey', 'NJ'),
(50, 'New Mexico', 'NM'),
(51, 'New York', 'NY'),
(52, 'North Carolina', 'NC'),
(53, 'North Dakota', 'ND'),
(54, 'Northern Mariana Islands', 'MP'),
(55, 'Ohio', 'OH'),
(56, 'Oklahoma', 'OK'),
(57, 'Oregon', 'OR'),
(58, 'Palau', 'PW'),
(59, 'Pennsylvania', 'PA'),
(60, 'Puerto Rico', 'PR'),
(61, 'Rhode Island', 'RI'),
(62, 'South Carolina', 'SC'),
(63, 'South Dakota', 'SD'),
(64, 'Tennessee', 'TN'),
(65, 'Texas', 'TX'),
(66, 'Utah', 'UT'),
(67, 'Vermont', 'VT'),
(68, 'Virgin Islands', 'VI'),
(69, 'Virginia', 'VA'),
(70, 'Washington', 'WA'),
(71, 'West Virginia', 'WV'),
(72, 'Wisconsin', 'WI'),
(73, 'Wyoming', 'WY'),
(74, 'Armed Forces Africa', 'AE'),
(75, 'Armed Forces Americas (except Canada)', 'AA'),
(76, 'Armed Forces Canada', 'AE'),
(77, 'Armed Forces Europe', 'AE'),
(78, 'Armed Forces Middle East', 'AE'),
(79, 'Armed Forces Pacific', 'AP');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_users`
--

INSERT INTO `group_users` (`id`, `group_name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'your superadmin', '2016-01-09 08:33:21', '0000-00-00 00:00:00'),
(2, 'admin', 'your admin', '2016-01-09 08:33:21', '0000-00-00 00:00:00'),
(3, 'member', 'your member', '2016-01-09 08:33:21', '0000-00-00 00:00:00'),
(4, 'visitor', 'your visitor', '2016-01-09 08:33:21', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `title`, `desc`, `path`, `img_status`, `id_product`, `created_at`, `updated_at`) VALUES
(104, 'Slick.png', '', '', 'public/uploads/images/original/Slick.png', 'display', 6, '2016-01-10 05:40:45', '2016-01-09 02:46:54'),
(105, 'Groomed.png', '', '', 'public/uploads/images/original/Groomed.png', 'display', 5, '2016-01-10 05:40:45', '2016-01-09 02:46:45'),
(106, 'Mr.-Polished.png', '', '', 'public/uploads/images/original/Mr.-Polished.png', 'display', 4, '2016-01-10 05:40:45', '2016-01-09 02:50:33'),
(107, 'Dapper.png', '', '', 'public/uploads/images/original/Dapper.png', 'display', 3, '2016-01-10 05:40:45', '2016-01-09 02:52:03'),
(108, 'Cool.png', '', '', 'public/uploads/images/original/Cool.png', 'display', 2, '2016-01-10 05:40:45', '2016-01-09 02:52:57'),
(109, 'Active.png', '', '', 'public/uploads/images/original/Active.png', 'display', 1, '2016-01-10 05:40:45', '2016-01-09 02:53:43'),
(110, 'Mr.-Vibrant.png', '', '', 'public/uploads/images/original/Mr.-Vibrant.png', 'display', 10, '2016-01-10 05:43:34', '2016-01-09 02:54:51'),
(111, 'Mr.-Smooth.png', '', '', 'public/uploads/images/original/Mr.-Smooth.png', 'display', 9, '2016-01-10 05:43:34', '2016-01-09 02:55:54'),
(112, 'Mr.-Radiant.png', '', '', 'public/uploads/images/original/Mr.-Radiant.png', 'display', 8, '2016-01-10 05:43:34', '2016-01-09 02:56:31'),
(113, 'Mr.-Fresh.png', '', '', 'public/uploads/images/original/Mr.-Fresh.png', 'display', 7, '2016-01-10 05:43:34', '2016-01-09 02:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `meta_users`
--

CREATE TABLE `meta_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta_users`
--

INSERT INTO `meta_users` (`id`, `firstname`, `lastname`, `country`, `street`, `optionals`, `postcode`, `email`, `city`, `state`, `phone`, `note`, `id_user`, `created_at`, `updated_at`) VALUES
(24, 'reret', 'yosyanto', NULL, 'address', 'dkfal', 'kdsfjak', 'dedavinci999@gmail.com', 'ksdfjkal', 'Alaska', 2147483647, '', 97, '2016-01-17 00:53:19', '2016-01-17 00:53:19'),
(25, 'nama', 'fasdfasd', NULL, 'stress/address', 'office', '34234', 'dedavinci99@gmail.com', 'fasdf', 'Alaska', 2147483647, '', 98, '2016-01-17 00:59:25', '2016-01-17 00:59:25');

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
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_transaction`, `id_product`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
(43, 33, 1, 2, 7, '2016-01-17 07:53:19', '0000-00-00 00:00:00'),
(44, 33, 2, 1, 10, '2016-01-17 07:53:19', '0000-00-00 00:00:00'),
(45, 34, 1, 2, 7, '2016-01-17 07:53:19', '0000-00-00 00:00:00'),
(46, 35, 1, 2, 7, '2016-01-17 07:59:25', '0000-00-00 00:00:00'),
(47, 35, 2, 1, 10, '2016-01-17 07:59:25', '0000-00-00 00:00:00'),
(48, 36, 1, 2, 7, '2016-01-17 07:59:25', '0000-00-00 00:00:00');

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
  `id_user` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pivot_users`
--

INSERT INTO `pivot_users` (`id`, `id_group`, `id_user`, `created_at`, `updated_at`) VALUES
(50, 1, 69, '2015-12-29 06:17:14', '0000-00-00 00:00:00'),
(78, 3, 97, '2016-01-17 07:53:19', '0000-00-00 00:00:00'),
(79, 3, 98, '2016-01-17 07:59:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) DEFAULT NULL,
  `color` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `desc`, `price`, `category`, `count`, `color`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Active Styling Glue', 'Can control the most extreme hair situations. Mold and spike with our alcohol free formula. Infuse your style with water resistant styling glue that can sculpt even the most challenging styles. Whether at the beach or braving the elements, Mr. Active will', 7, 'styling', 134, '#F00', 5, '2016-01-06 17:00:00', '2016-01-17 01:37:30'),
(2, 'Mr. Cool Wet Look Gel', 'Can control any challenging hair situation. Our alcohol free strong hold formula keeps you looking sleek all day long. Infuse your style with serious shine and enjoy the irresistible fresh masculine scent while you''re at it.\r\n\r\nThe Situation: Super confid', 10, 'styling', 115, '#0F65CA', 5, '2016-01-06 17:00:00', '2016-01-17 01:36:08'),
(3, 'Mr. Dapper Matte Gel', 'Can control any demanding hair situation. Our alcohol free strong hold formula keeps you looking polished all day long. Infuse your style with a matte look and enjoy the irresistible spiced masculine scent while you''re at it.\r\n\r\nThe Situation: Successful ', 10, 'styling', 102, '#FFF400', 5, '2016-01-06 17:00:00', '2016-01-16 23:08:18'),
(4, 'Mr. Polished Moderate Gel', 'Can control the most common hair situation. Our alcohol free strong hold formula keeps you looking polished all day long. Infuse your style with mild shine and enjoy the irresistible fresh masculine scent while you''re at it.', 10, 'styling', 100, '#F15922', 5, '2016-01-06 17:00:00', '2016-01-06 17:00:00'),
(5, 'Mr. Groomed Scuplting Pomade', 'Can control any ambitious hair situation. Our alchohol-free weightless formula keeps you looking sophisticated all day long. infuse your style with pliable pomade and enjoy the refreshing scent. Best of all, Mr. Groomed is filled with ingredients that moi', 7, 'styling', 100, '#008641', 5, '2016-01-06 17:00:00', '2016-01-06 17:00:00'),
(6, 'Mr. Slick Molding Pomade', 'Can control any outrageous hair situation. Our alcohol free versatile formula keeps you looking slick all day with a high gloss finish. Infuse your style with molding pomade and enjoy the invigorating masculine scent while you are at it. Best of all, Mr S', 7, 'styling', 100, '#812A8F', 5, '2016-01-06 17:00:00', '2016-01-06 17:00:00'),
(7, 'Mr. Fresh', 'Designed for the man on the go, Hair Situation Mr. Fresh invigorates and refreshes as it deeply cleanses. Use it for a smooth shave, whether at the sink or in the shower AND as a shampoo to eliminate impurities and reduce oils. Enjoy the fresh minty scent', 0, 'grooming', 1, '#0C5860', 1, '2016-01-06 17:00:00', '2016-01-06 17:00:00'),
(8, 'Mr. Radiant', 'Designed for the man on the go, Hair Situation Mr. Radiant invigorates and refreshes as it deeply cleanses. Use it for a sophisticated shave, whether at the sink or in the shower AND as a shampoo to eliminate impurities while moisturizing and nourishing y', 0, 'grooming', 1, '#F15922', 1, '2016-01-06 17:00:00', '2016-01-06 17:00:00'),
(9, 'Mr. Smooth', 'Designed for the man on the go, Hair Situation Mr. Smooth invigorates and refreshes as it deeply cleanses. Use it for a smooth shave, whether at the sink or in the shower AND as a shampoo to eliminate impurities for cleaner hair. Enjoy the irresistible sp', 0, 'grooming', 1, '#C19473', 1, '2016-01-06 17:00:00', '2016-01-06 17:00:00'),
(10, 'Mr. Vibrant', 'Designed for the man on the go, Hair Situation Mr. Vibrant Invigorates and refreshes as it deeply cleanses. This shampoo eliminates impurities and volumizes hair. Enjoy the fresh scent while fighting the enzyme that contributes to thinning hair, to leave ', 0, 'grooming', 1, '#D3EB8C', 1, '2016-01-06 17:00:00', '2016-01-06 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `shipping` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `subsribe` int(11) DEFAULT NULL,
  `subsribe_status` varchar(45) DEFAULT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `code`, `date`, `subtotal`, `shipping`, `total`, `subsribe`, `subsribe_status`, `id_user`, `created_at`, `updated_at`) VALUES
(33, 'hr-012016-1', '2016-01-17', 17, 9, 26, 0, 'regular', 97, '2016-01-17 07:58:26', '2016-01-17 00:53:19'),
(34, 'hr-012016-1-3', '2016-01-17', 7, 7, 14, 3, 'active', 97, '2016-01-17 00:53:19', '2016-01-17 00:53:19'),
(35, 'hr-012016-3', '2016-01-17', 17, 9, 26, 0, NULL, 98, '2016-01-17 00:59:25', '2016-01-17 00:59:25'),
(36, 'hr-012016-3-3', '2016-01-17', 7, 7, 14, 3, 'active', 98, '2016-01-17 00:59:25', '2016-01-17 00:59:25');

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
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(69, 'jontata alexa', 'dedavinci99@gmail.com', '$2y$10$DH1pMwU3.fbXycWt2WgMFOm7x0W9LaDbJ4j23ffLlRtY6PJgMd7ki', 'Kf3l1r4jgcQY8IwonhoYfA6fthD8IibSQoxUphbO7wdnm8N7QPh5RRxHkMzU', '2015-12-28 23:16:40', '2016-01-09 07:21:35'),
(97, 'reret yosyanto', 'dedavinci999@gmail.com', '', NULL, '2016-01-17 00:53:19', '2016-01-17 00:53:19'),
(98, 'nama fasdfasd', 'dedavinci99@gmail.com', '', NULL, '2016-01-17 00:59:25', '2016-01-17 00:59:25');

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
-- Indexes for table `countrys`
--
ALTER TABLE `countrys`
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
  ADD KEY `order_product_idx` (`id_product`);

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
  ADD KEY `toUser_idx` (`id_group`),
  ADD KEY `pivot_user_to_user_idx` (`id_user`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_user_idx` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countrys`
--
ALTER TABLE `countrys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `group_users`
--
ALTER TABLE `group_users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `meta_users`
--
ALTER TABLE `meta_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `pivot_users`
--
ALTER TABLE `pivot_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
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
  ADD CONSTRAINT `order_trans` FOREIGN KEY (`id_transaction`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pivot_users`
--
ALTER TABLE `pivot_users`
  ADD CONSTRAINT `pivots_to_group` FOREIGN KEY (`id_group`) REFERENCES `group_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pivots_to_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `trans_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
