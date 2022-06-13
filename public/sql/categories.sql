-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 10:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Rau củ quả', '0', 'rau-cu-qua', NULL, NULL, NULL),
(2, 'Trái cây', '0', 'trai-cay', NULL, NULL, NULL),
(3, 'Thức uống', '0', 'thuc-uong', NULL, NULL, NULL),
(4, 'Ngũ cốc, Đậu & Hạt', '0', 'ngu-coc-dau-hat', NULL, NULL, NULL),
(5, 'Rau ăn lá', '1', 'rau-an-la', NULL, '2022-05-30 21:48:38', '2022-05-30 21:48:38'),
(6, 'Rau ăn củ', '1', 'rau-an-cu', NULL, NULL, NULL),
(7, 'Rau ăn quả', '1', 'rau-an-qua', NULL, NULL, NULL),
(8, 'Rau ăn hoa', '1', 'rau-an-hoa', NULL, NULL, NULL),
(9, 'Rau gia vị', '1', 'rau-gia-vi', NULL, NULL, NULL),
(10, 'Nấm', '1', 'nam', NULL, NULL, NULL),
(11, 'Trái cây trong nước', '2', 'trai-cay-trong-nuoc', NULL, NULL, NULL),
(12, 'Trái cây nhập khẩu', '2', 'trai-cay-nhap-khau', NULL, NULL, NULL),
(13, 'Trái cây đông lạnh', '2', 'trai-cay-dong-lanh', NULL, NULL, NULL),
(14, 'Trái cây sấy', '2', 'trai-cay-say', NULL, NULL, NULL),
(15, 'Sữa thực vật', '3', 'sua-thuc-vat', NULL, NULL, NULL),
(16, 'Trà, Cà phê & Cacao', '3', 'tra-ca-phe-ca-cao', NULL, NULL, NULL),
(17, 'Nước ép sinh tố', '3', 'nuoc-ep-sinh-to', NULL, NULL, NULL),
(18, 'Thức uống khác', '3', 'thuc-uong-khac', NULL, NULL, NULL),
(19, 'Gạo & Ngũ cốc', '4', 'gao-ngu-coc', NULL, NULL, NULL),
(20, 'Đậu', '4', 'dau', NULL, NULL, NULL),
(21, 'Hạt', '4', 'hat', NULL, NULL, NULL),
(24, 'Ngũ cốc', '4', 'ngu-coc', '2022-06-08 02:11:11', '2022-06-08 02:11:50', '2022-06-08 02:11:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
