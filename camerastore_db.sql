-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 26, 2024 lúc 11:09 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `camerastore_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `day_buy` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `quantity`, `day_buy`, `price`) VALUES
(1, 1, 'Canon 200D', 6, '2024-08-24 16:33:32', 40000.00),
(2, 1, 'Canon 200D', 6, '2024-08-24 16:33:41', 40000.00),
(3, 2, 'Canon 1500D-kit', 3, '2024-08-24 16:33:49', 43000.00),
(4, 2, 'Canon 1500D-kit', 3, '2024-08-24 16:33:55', 43000.00),
(5, 1, 'Canon 200D', 2, '2024-08-24 16:36:36', 40000.00),
(6, 1, 'Canon 200D', 1, '2024-08-24 16:36:45', 40000.00),
(7, 2, 'Canon 1500D-kit', 1, '2024-08-24 16:37:54', 43000.00),
(8, 2, 'Canon 1500D-kit', 1, '2024-08-24 16:38:15', 43000.00),
(9, 2, 'Canon 1500D-kit', 1, '2024-08-24 16:38:29', 43000.00),
(10, 2, 'Canon 1500D-kit', 4, '2024-08-24 16:55:45', 43000.00),
(11, 3, 'Canon 3000D-kit', 1, '2024-08-26 10:14:02', 16000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forget_password`
--

CREATE TABLE `forget_password` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `temp_key` varchar(200) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `forget_password`
--

INSERT INTO `forget_password` (`id`, `email`, `temp_key`, `created`) VALUES
(0, 'huynhtrungtin2222@gmail.com', '11a9f4e074617d45bba381de5a1026b6', '2024-08-26 04:49:34'),
(0, 'huynhtrungtin2222@gmail.com', '48dd4f483a4e11f6e7dd2bf75a6480b2', '2024-08-26 05:07:49'),
(0, 'huynhtrungtin2222@gmail.com', 'd4a184d88cf4f00c52c0e68df1a7577c', '2024-08-26 06:23:45'),
(0, 'huynhtrungtin1506@gmail.com', 'dd356bcd8c3f2438d91556a2ffb5a6b0', '2024-08-26 06:26:48'),
(0, 'huynhtrungtin1506@gmail.com', 'e971491dafed1b9f7e01a647ca468d70', '2024-08-26 06:31:11'),
(0, 'huynhtrungtin1506@gmail.com', '65182e9afe06530eec1f788ed76f2256', '2024-08-26 06:31:20'),
(0, 'huynhtrungtin2222@gmail.com', 'b97b3b56659c585be9ec66c3cd1a1ba4', '2024-08-26 06:32:46'),
(0, 'huynhtrungtin2222@gmail.com', '030781b8421b1023cc99ea9d1aa14130', '2024-08-26 06:52:49'),
(0, 'huynhtrungtin2222@gmail.com', '6d2ff679bd4992e7d7b876e2a7d3c203', '2024-08-26 06:53:38'),
(0, 'huynhtrungtin2222@gmail.com', 'cb6f1449ed5a276124ce2e6285168bc5', '2024-08-26 06:53:45'),
(0, 'huynhtrungtin2222@gmail.com', '52c08b2d6381338eb3857e95fd8cfddd', '2024-08-26 07:15:04'),
(0, 'huynhtrungtin1506@gmail.com', '03579c3a9ca33269e91c1b6191c463a5', '2024-08-26 07:17:54'),
(0, 'huynhtrungtin1506@gmail.com', '6d906c2ec05c45e1542a6b595e1d6e4c', '2024-08-26 07:21:07'),
(0, 'huynhtrungtin2222@gmail.com', '9a7dfec1be49b29278ce0a0b41b4bd92', '2024-08-26 07:52:56'),
(0, 'huynhtrungtin2222@gmail.com', 'a140f43ffc42ad9bafcfe71056a5ba06', '2024-08-26 07:55:08'),
(0, 'huynhtrungtin1506@gmail.com', '944159946a24b2fd636ed358421e2539', '2024-08-26 08:14:28'),
(0, 'huynhtrungtin1506@gmail.com', '9b759da151860fae2a056ae1886d637c', '2024-08-26 08:15:35'),
(0, 'huynhtrungtin1506@gmail.com', '1da8263abd0112b88b798f951a81a907', '2024-08-26 08:15:39'),
(0, 'huynhtrungtin1506@gmail.com', 'b5a1d4fabd98f9a8d231969ae0b58eeb', '2024-08-26 08:15:46'),
(0, 'huynhtrungtin1506@gmail.com', '8c2b2eafd702268c076519eecca5ef26', '2024-08-26 08:17:18'),
(0, 'huynhtrungtin2222@gmail.com', '128430b7f4ff7fc9a2c099e3e8920a51', '2024-08-26 08:38:07'),
(0, 'huynhtrungtin2222@gmail.com', '9adbde8ee92858b879f3bf0f5611c2d6', '2024-08-26 08:38:45'),
(0, 'huynhtrungtin2222@gmail.com', '67592b8b3cc9896f0a9fa09aaa1ea5f9', '2024-08-26 09:01:33'),
(0, 'huynhtrungtin2222@gmail.com', 'be6cce436da6f9ef6f483fa0013586a9', '2024-08-26 09:02:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `images` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `images`, `type`, `title`, `price`, `quantity`, `discount`) VALUES
(1, '[\"./img/canon/200D/200D.png\", \"./img/canon/200D/200D-2.png\", \"./img/canon/200D/200D-3.png\"]', 'canon', 'Canon 200D', 40000.00, 100, 1),
(2, '[\"./img/canon/1500D-kit/1500D-kit.png\", \"./img/canon/1500D-kit/1500D-kit-2.png\", \"./img/canon/1500D-kit/1500D-kit-3.png\"]', 'canon', 'Canon 1500D-kit', 43000.00, 100, 0),
(3, '[\"./img/canon/3000D-kit/3000D-kit.png\", \"./img/canon/3000D-kit/3000D-kit-2.png\", \"./img/canon/3000D-kit/3000D-kit-3.png\"]', 'canon', 'Canon 3000D-kit', 16000.00, 100, 1),
(4, '[\"./img/canon/G7-X-mark/G7-X-mark.png\", \"./img/canon/G7-X-mark/G7-X-mark-2.png\", \"./img/canon/G7-X-mark/G7-X-mark-3.png\"]', 'canon', 'Canon G7-X-mark', 23100.00, 100, 0),
(5, '[\"./img/canon/phukien/speedlite.png\"]', 'phu kien', 'Đèn speedlite', 5400.00, 100, 1),
(6, '[\"./img/canon/R7/R7.png\", \"./img/canon/R7/R7-2.png\", \"./img/canon/R7/R7-3.png\"]', 'canon', 'Canon R7', 54322.00, 100, 0),
(7, '[\"./img/canon/R8/R8.png\", \"./img/canon/R8/R8-2.png\", \"./img/canon/R8/R8-3.png\"]', 'canon', 'Canon R8', 54323.00, 30, 1),
(8, '[\"./img/canon/R50/R50.png\", \"./img/canon/R50/R50-2.png\", \"./img/canon/R50/R50-3.png\"]', 'canon', 'Canon R50', 32554.00, 100, 0),
(9, '[\"./img/canon/R100/R100.png\", \"./img/canon/R100/R100-2.png\", \"./img/canon/R100/R100-3.png\"]', 'canon', 'Canon R100', 4325220.00, 100, 1),
(10, '[\"./img/canon/SX740-HS/SX740-HS.png\", \"./img/canon/SX740-HS/SX740-HS-2.png\", \"./img/canon/SX740-HS/SX740-HS-3.png\"]', 'canon', 'Canon SX740-HS', 540030.00, 100, 0),
(11, '[\"./img/Nikon/D780/D780-1.jpg\"]', 'nikon', 'Nikon D780', 540030.00, 100, 0),
(12, '[\"./img/Nikon/Z30/Z30-1.jpg\"]', 'nikon', 'Nikon Z30', 540030.00, 100, 0),
(13, '[\"./img/Nikon/Z9/Z9-1.jpg\"]', 'nikon', 'Nikon Z9', 540030.00, 100, 0),
(14, '[\"./img/Nikon/ZFc/ZFc-1.jpg\"]', 'nikon', 'Nikon Z Fc', 540030.00, 100, 0),
(15, '[\"./img/Sony/Alpha9III/Alpha9III-1.png\"]', 'sony', 'Alpha 9 III', 540030.00, 100, 0),
(16, '[\"./img/Sony/Alpha6100/Alpha6100-1.png\"]', 'sony', 'Alpha 6100', 540030.00, 100, 0),
(17, '[\"./img/Sony/AlphaZV-E10II/AlphaZVE10II-1.png\"]', 'sony', 'Alpha ZV-E10 II', 540030.00, 100, 0),
(18, '[\"./img/Sony/AlphaZV-E10II/AlphaZVE10II-1.png\"]', 'sony', 'Alpha ZV-E10 II', 540030.00, 100, 0),
(19, '[\"./img/Sony/AlphaZV-E10II/AlphaZVE10II-1.png\"]', 'sony', 'Alpha ZV-E10 II', 540030.00, 100, 0),
(20, '[\"./img/Sony/AlphaZV-E10II/AlphaZVE10II-1.png\"]', 'sony', 'Alpha ZV-E10 II', 540030.00, 100, 0),
(21, '[\"./img/Sony/AlphaZV-E10II/AlphaZVE10II-1.png\"]', 'sony', 'Alpha ZV-E10 II', 540030.00, 100, 0),
(22, '[\"./img/Sony/AlphaZV-E10II/AlphaZVE10II-1.png\"]', 'sony', 'Alpha ZV-E10 II', 540030.00, 100, 0),
(23, '[\"./img/Sony/AlphaZV-E10II/AlphaZVE10II-1.png\"]', 'sony', 'Alpha ZV-E10 II', 540030.00, 100, 0),
(24, '[\"./img/Sony/AlphaZV-E10II/AlphaZVE10II-1.png\"]', 'sony', 'Alpha ZV-E10 II', 540030.00, 100, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`) VALUES
(4, 'tin', 'huynhtrungtin2222@gmail.com', '456', 0),
(5, 'tin2', 'huynhtrungtin1506@gmail.com', '123', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
