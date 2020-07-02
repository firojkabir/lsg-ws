-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2020 at 07:23 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsg`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Computers, Tablets & Laptop', 1, NULL, NULL),
(3, 'Mobile & Gadgets', 1, NULL, NULL),
(4, 'Women\'s Clothing & Access.', 1, NULL, NULL),
(5, 'Men\'s Clothings & Access.', 1, NULL, NULL),
(6, 'Kids Clothing & Access.', 1, NULL, NULL),
(7, 'Food & Beverages', 1, NULL, NULL),
(8, 'Health & Beauty', 1, NULL, NULL),
(9, 'Sports & Leisure', 1, NULL, NULL),
(10, 'Books & Entertainments', 1, NULL, NULL),
(11, 'Others', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `lastname`, `email`, `password`, `phone`, `street`, `city`, `zip`, `country`, `image`, `thumb`, `path`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Ahmed', 'Rimon', 'rimon@informatik.hs-fulda.de', '$2y$10$iWqceDADnyAG/aufym0euehYa93/AZ.y3mJkR1Lf6XXU2l0V1pkVi', '017630169444', 'Lipzieger', 'Fulda', '36043', 'Germany', '1580345752_myself.png', 'thumb_1580345752_myself.png', 'assets/profile/', 1, NULL, '2020-01-16 10:48:25', '2020-01-16 10:48:25'),
(6, 'Angelo', 'Merkel', 'merkel@informatik.hs-fulda.de', '$2y$10$d.rnGgO/6XGu9bQQUTOcZOqCAYmV7MFiFeAPDdmMqbjXuIzQRZh5K', '01794221798', 'Wiesenmühlen 3, Room 3121', 'Main City', '36037', 'Germany', NULL, NULL, NULL, 1, NULL, '2020-01-17 20:59:56', '2020-01-17 20:59:56'),
(7, 'Jhon', 'Doe', 'doe@informatik.hs-fulda.de', '$2y$10$YyfWnlFCs1BRR0jt6yr5..e0oWjfqDDTHPp6qEdw/ABPl1EvfBjoO', '01794221798', 'Wiesenmühlen 3, Room 3121', 'Main City', '36037', 'Germany', NULL, NULL, NULL, 1, NULL, '2020-01-22 21:41:29', '2020-01-22 21:41:29'),
(8, 'Test', 'Abc', 'abc@informatik.hs-fulda.de', '$2y$10$pdleFlnyfCWRK.H4i79IpOQ11Ql3R.CwxfagEgg8iBHEYQKgEAxHW', '01794221798', 'Wiesenmühlen 3, Room 3121', 'Main City', '36037', 'Germany', NULL, NULL, NULL, 1, NULL, '2020-01-23 09:51:25', '2020-01-23 09:51:25'),
(9, 'Jon', 'Smith', 'jsmith@informatik.hs-fulda.de', '$2y$10$HBbK0.2dOTgWa/UT6fwq7e7O8f3Nr6WJhAKPAEDYG.gb35aMt8NmS', '21212121', 'Leipziger str 139', 'Fulda', '36037', 'Germany', NULL, NULL, 'assets/profile/', 1, NULL, '2020-01-30 15:14:56', '2020-01-30 15:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `morelink` varchar(50) DEFAULT NULL,
  `morelinkweb` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `details` text,
  `image` varchar(256) NOT NULL,
  `thumb` varchar(256) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `hstatus` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `title`, `morelink`, `morelinkweb`, `rank`, `details`, `image`, `thumb`, `image_path`, `hstatus`, `status`, `created_at`) VALUES
(11, 'Slider 1', NULL, NULL, 1, NULL, '1575823554_Web_Pic_1.jpg', 'thumb_1575823554_Web_Pic_1.jpg', 'public/assets/home/slider/', 1, 1, '2019-10-14 07:51:30'),
(12, 'Slider 2', NULL, NULL, 2, NULL, '1571723174_Aamar-Account-banner.jpg', 'thumb_1571723174_Aamar-Account-banner.jpg', 'public/assets/home/slider/', 1, 1, '2019-10-14 07:51:59'),
(13, 'Slider 3', NULL, NULL, 3, NULL, '1571723143_IFIC_Aamar-Card.jpg', 'thumb_1571723143_IFIC_Aamar-Card.jpg', 'public/assets/home/slider/', 1, 1, '2019-10-14 07:56:32'),
(14, 'Slider 4', NULL, NULL, 1, NULL, '1575823940_Shohoj_ Website_1920 px X 668 px_4-12-19-01.jpg', 'thumb_1575823940_Shohoj_ Website_1920 px X 668 px_4-12-19-01.jpg', 'public/assets/home/slider/', 1, 1, '2019-10-14 08:00:00'),
(15, 'slider 5', NULL, NULL, 5, NULL, '1571723121_IFIC-Aamar-Bank.jpg', 'thumb_1571723121_IFIC-Aamar-Bank.jpg', 'public/assets/home/slider/', 1, 1, '2019-10-14 08:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_000000_create_users_table', 3),
(13, '2014_10_12_100000_create_password_resets_table', 3),
(11, '2017_09_19_063044_users', 2),
(14, '2017_11_20_051139_admins', 4),
(15, '2017_11_20_051159_password_resets_admin', 4),
(17, '2020_01_10_232021_create_clients_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `total`, `product`, `created_at`) VALUES
(4, 5, '805.00', 'Macbook Air, Bike(Kids), ', '2020-01-23 12:10:33'),
(5, 5, '555.00', 'Macbook Air, ', '2020-01-29 21:28:52'),
(6, 5, '555.00', 'Macbook Air, ', '2020-01-30 11:15:08'),
(7, 9, '1,110.00', 'Macbook Air, ', '2020-01-30 16:15:32'),
(8, 5, '60.00', 'Jacket(Men), ', '2020-01-30 16:21:34'),
(9, 5, '350.00', 'OnePlus 5t, ', '2020-02-06 16:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `status`, `image`, `image1`, `image2`, `thumb`, `path`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(7, 'Macbook Air', 'Mackbook air from Apple.\r\n\r\nRam: 8gb\r\nRom 500 gb SSD\r\nScreen: 13.5\"', 555.00, 1, '1578783770_laptop.jpg', '1578783770_laptop.jpg', '1578783770_laptop.jpg', 'thumb_1578783770_laptop.jpg', 'assets/product/', 5, 2, '2020-01-11 23:00:00', NULL),
(8, 'Bike(Kids)', 'Bike for kids. \r\n\r\nRechargeable and driveable.', 250.00, 1, '1578784969_kids.jpg', '1578784969_kids.jpg', '1578784969_kids.jpg', 'thumb_1578784969_kids.jpg', 'assets/product/', 5, 6, '2020-01-11 23:00:00', NULL),
(9, 'Juice(Grape)', 'Juice made from black grapes. \r\n\r\nNo alcohol.', 2.00, 1, '1578785205_foods.jpg', '1578785205_foods.jpg', '1578785205_foods.jpg', 'thumb_1578785205_foods.jpg', 'assets/product/', 5, 7, '2020-01-11 23:00:00', NULL),
(10, 'Hand Wash(Dettol)', 'Dettol hand wash. \r\n\r\nTo disinfect your hands.', 10.00, 1, '1578785296_Health.jpg', '1578785296_Health.jpg', '1578785296_Health.jpg', 'thumb_1578785296_Health.jpg', 'assets/product/', 5, 8, '2020-01-11 23:00:00', NULL),
(11, 'Basket Ball', 'Wilson basket ball.\r\n\r\nKeep play it will make your body fit.', 45.00, 1, '1578785375_sports.jpg', '1578785375_sports.jpg', '1578785375_sports.jpg', 'thumb_1578785375_sports.jpg', 'assets/product/', 5, 9, '2020-01-11 23:00:00', NULL),
(12, 'Eat That From(1st Edition)', 'Eat that from is a best selling book. \r\n\r\nHelpful for self improvement.', 23.00, 1, '1578785469_books.jpeg', '1578785469_books.jpeg', '1578785469_books.jpeg', 'thumb_1578785469_books.jpeg', 'assets/product/', 5, 10, '2020-01-11 23:00:00', NULL),
(13, 'Shoe(Women)', 'Women\'s converse. \r\nEasy and comfortable to wear.', 48.00, 1, '1578785619_women.jpg', '1578785619_women.jpg', '1578785619_women.jpg', 'thumb_1578785619_women.jpg', 'assets/product/', 5, 4, '2020-01-11 23:00:00', NULL),
(14, 'Xiaomi AirDots', 'Xiaomi airdots\r\n\r\nBlack \r\nBluetooth', 18.00, 1, '1578785723_gadgets.jpg', '1578785723_gadgets.jpg', '1578785723_gadgets.jpg', 'thumb_1578785723_gadgets.jpg', 'assets/product/', 5, 3, '2020-01-11 23:00:00', NULL),
(15, 'Jacket(Men)', 'Winter jacket for men.\r\n\r\nWaterproof', 60.00, 1, '1578785806_men.jpeg', '1578785807_men.jpeg', '1578785807_men.jpeg', 'thumb_1578785806_men.jpeg', 'assets/product/', 5, 5, '2020-01-11 23:00:00', NULL),
(16, 'Macbook', 'Mackbook', 1000.00, 0, '1579193242_sports.jpg', '1579193243_foods.jpg', '1579193243_gadgets.jpg', 'thumb_1579193242_sports.jpg', 'assets/product/', 5, 2, '2020-01-16 16:47:23', '2020-01-16 16:47:23'),
(17, 'OnePlus 5t', 'OnePlus 5T White\r\n8 gb Ram\r\n128 gb Rom', 350.00, 1, '1579299651_oneplus.jpg', '1579299651_oneplus.jpg', '1579299651_oneplus.jpg', 'thumb_1579299651_oneplus.jpg', 'assets/product/', 6, 3, '2020-01-17 22:20:51', '2020-01-17 22:20:51'),
(18, 'Test', 'Test product', 20.00, 1, '1579777431_test.jpg', NULL, NULL, 'thumb_1579777431_test.jpg', 'assets/product/', 8, 5, '2020-01-23 11:03:51', '2020-01-23 11:03:51'),
(19, 'Sample Product abc', 'description', 10.00, 0, '1579780252_43 Years Celebration latest 21219.jpg', NULL, NULL, 'thumb_1579780252_43 Years Celebration latest 21219.jpg', 'assets/product/', 5, 2, '2020-01-23 11:50:52', '2020-01-23 11:50:52'),
(20, 'Mercedes', 'Product Description', 5000.00, 1, '1580401400_fulda.jpg', '1580401400_fulda2.jpg', NULL, 'thumb_1580401400_fulda.jpg', 'assets/product/', 5, 9, '2020-01-30 16:23:20', '2020-01-30 16:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `group`, `password`, `image`, `thumb`, `image_path`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '$2y$10$ameFTO477fqtaQZYG5byFuVYAIzPQEySuVeto2j5XLAR1uHuglF/W', '1579172873_myself.png', 'thumb_1579172873_myself.png', 'assets/user/', 1, 's2CVKalQ31KKa7G3rZL6wmEMoDKDF4WyUQrNLgHvyTFC3vMLWOWXPPZxQFRd', NULL, '2017-09-28 00:23:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
