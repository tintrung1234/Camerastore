-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 24, 2024 lúc 04:59 PM
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
(10, 2, 'Canon 1500D-kit', 4, '2024-08-24 16:55:45', 43000.00);

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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
