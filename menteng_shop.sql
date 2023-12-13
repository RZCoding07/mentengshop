-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 05:05 PM
-- Server version: 8.0.33
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;  -- Change from utf8mb4 to utf8

--
-- Database: `menteng_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `model_payet` int NOT NULL,
  `warna` varchar(50) NOT NULL,
  `banyak_payet` enum('Fullset','Setengah','Pinggiran','') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,  -- Change from utf8mb4 to utf8
  `tanggal_pengambilan` date NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;  -- Change from utf8mb4 to utf8

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `telp`, `email`, `alamat`, `model_payet`, `warna`, `banyak_payet`, `tanggal_pengambilan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', '081229382938', 'test@mail.com', 'jl.test', 8, 'biru', 'Setengah', '2023-12-16', 2, '2023-12-01 13:06:45', '2023-12-01 14:08:51'),
(2, 'test', '081229382938', 'test@mail.com', 'jl.testttt', 7, 'hijau', 'Setengah', '2023-12-22', 0, '2023-12-01 15:27:59', '2023-12-01 15:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `description` text,
  `type` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;  -- Change from utf8mb4 to utf8

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `type`, `created_at`, `updated_at`) VALUES
(7, 'Kebaya payet A', '90000', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem ex mollitia ut cumque? Quisquam autem nemo repellat, libero quos dicta ab molestiae hic quam aspernatur qui excepturi, dolor animi vitae. Lorem ipsum dolor, sit amet consectetur adipisicing elit.', 'fullset', '2023-12-01 12:05:16', '2023-12-01 12:05:16'),
(8, 'Kebaya Payet B', '95000', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea iusto amet quos consequatur consectetur pariatur. Itaque cupiditate nobis eius eos repudiandae, facere repellendus illum dicta atque voluptatum quaerat voluptatem dolores.', 'fullset', '2023-12-01 12:28:55', '2023-12-01 12:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;  -- Change from utf8mb4 to utf8

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(13, 7, 'product_images/rlBvntjo7RNZ1hiyLyBj1yBNNqQws5G1c7PYEtJ7.jpg', '2023-12-01 12:05:16', '2023-12-01 12:05:16'),
(14, 7, 'product_images/saaWJ63FdXAGZjUNVFqBha7Nyxpd1l2lmxl0q4ze.jpg', '2023-12-01 12:05:16', '2023-12-01 12:05:16'),
(15, 8, 'product_images/VZfn3YgWlrhXTt78QDLP6cZRVgIXx05WMlLkHr5Y.jpg', '2023-12-01 12:28:55', '2023-12-01 12:28:55'),
(16, 8, 'product_images/ljthi5AHOJZkgD77UudDrpb7X3QDwJ6WmLsB9T8j.jpg', '2023-12-01 12:28:55', '2023-12-01 12:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `roles` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;  -- Change from utf8mb4 to utf8

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,  -- Change from utf8mb4 to utf8
  `role` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;  -- Change from utf8mb4 to utf8

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `role`, `created_at`, `updated_at`) VALUES
(1, 'test@mail.com', '$2y$12$J3KMlz3LWVQVdmndcKKwX.ECNU2N9TcFxN5BpGLiHln/vquctxVA2', 'test', 2, '2023-11-28 10:58:42', '2023-11-28 10:58:42'),
(2, 'admin@mail.com', '$2y$12$LULRE3ARGX72rgn4ybpvfe6Vabe6mc7WBwPok0BDAMhunIPy4x/O6', 'admin', 1, '2023-12-01 05:57:34', '2023-12-01 05:57:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product.orders` (`model_payet`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_ibfk_1` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users.roles` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `product.orders` FOREIGN KEY (`model_payet`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users.roles` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
