-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2025 at 07:53 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `image`) VALUES
(11, '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus id necessitatibus atque quod dicta. Esse perferendis sit vel quam deleniti voluptate. Provident molestias quibusdam recusandae quas illum ratione natus hic.', 'serv-1.png'),
(12, '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus id necessitatibus atque quod dicta. Esse perferendis sit vel quam deleniti voluptate. Provident molestias quibusdam recusandae quas illum ratione natus hic.', 'serv-2.png'),
(13, '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus id necessitatibus atque quod dicta. Esse perferendis sit vel quam deleniti voluptate. Provident molestias quibusdam recusandae quas illum ratione natus hic.', 'serv-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `creator` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `date`, `creator`, `image`) VALUES
(5, 'blog title goes here ...', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed minus, iusto quasi laboriosam voluptatibus at esse maxime quod quae mollitia molestiae magnam aperiam aspernatur eius obcaecati enim eveniet quis fugit!', '2025-10-05', 'By Admin', 'blog-1.jpg'),
(11, 'blog title goes here ...', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed minus, iusto quasi laboriosam voluptatibus at esse maxime quod quae mollitia molestiae magnam aperiam aspernatur eius obcaecati enim eveniet quis fugit!', '2025-10-05', 'By Admin', 'blog-2.jpg'),
(12, 'blog title goes here ...', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed minus, iusto quasi laboriosam voluptatibus at esse maxime quod quae mollitia molestiae magnam aperiam aspernatur eius obcaecati enim eveniet quis fugit!', '2025-10-05', 'By Admin', 'blog-3.jpg'),
(13, 'blog title goes here ...', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed minus, iusto quasi laboriosam voluptatibus at esse maxime quod quae mollitia molestiae magnam aperiam aspernatur eius obcaecati enim eveniet quis fugit!', '2025-10-05', 'By Admin', 'blog-4.jpg'),
(14, 'blog title goes here ...', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed minus, iusto quasi laboriosam voluptatibus at esse maxime quod quae mollitia molestiae magnam aperiam aspernatur eius obcaecati enim eveniet quis fugit!', '2025-10-05', 'By Admin', 'blog-5.jpg'),
(15, 'blog title goes here ...', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed minus, iusto quasi laboriosam voluptatibus at esse maxime quod quae mollitia molestiae magnam aperiam aspernatur eius obcaecati enim eveniet quis fugit!', '2025-10-05', 'By Admin', 'blog-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(26, 'House Sofa', 'icon-1.png'),
(27, 'working table', 'icon-2.png'),
(28, 'corner table', 'icon-3.png'),
(29, 'office chair', 'icon-4.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `message`) VALUES
(1, 'name', '09123456789', 'example@gmail.com', 'Thanks You So Much');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `image`) VALUES
(17, 'modern furniture', 100, 100, 'product-1.png'),
(18, 'modern furniture', 100, 100, 'product-2.png'),
(19, 'modern furniture', 100, 100, 'product-3.png'),
(20, 'modern furniture', 100, 100, 'product-4.png'),
(21, 'modern furniture', 100, 100, 'product-5.png'),
(22, 'modern furniture', 100, 100, 'product-6.png'),
(23, 'modern furniture', 100, 100, 'product-7.png'),
(24, 'modern furniture', 100, 100, 'product-8.png');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `image`, `position`) VALUES
(7, 'john deo', 'team-1.jpg', 'designer'),
(8, 'john deo', 'team-2.jpg', 'designer'),
(9, 'john deo', 'team-3.jpg', 'designer'),
(10, 'john deo', 'team-4.jpg', 'designer'),
(11, 'john deo', 'team-5.jpg', 'designer'),
(12, 'john deo', 'team-6.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
