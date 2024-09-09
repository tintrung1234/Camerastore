-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 09, 2024 lúc 11:36 AM
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
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `day_buy` datetime NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `customer_id`, `product_id`, `quantity`, `day_buy`, `total_price`) VALUES
(1, 6, 2, 1, '2024-09-09 10:58:08', 43000.00),
(2, 6, 3, 2, '2024-09-09 10:58:37', 16000.00),
(3, 6, 17, 1, '2024-09-09 11:08:13', 540030.00),
(4, 6, 14, 1, '2024-09-09 11:19:19', 540030.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Trang chủ'),
(2, 'Sản phẩm'),
(3, 'Phụ kiện'),
(4, 'Sửa chữa'),
(5, 'Khuyến mãi'),
(6, 'Liên hệ'),
(7, 'Bảo hành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `address`, `message`, `submitted_at`) VALUES
(6, 'Trung Tin', 'tin@gmail.com', 111111, 'Sai Gon', 'dđ', '2024-09-08 04:41:55'),
(11, 'Trung tin', 'tin@gmail.com', 111111, 'Sai Gon', 'bbbbb', '2024-09-08 04:49:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `district`, `province`, `phone`) VALUES
(6, 'tintrung', 'aaaaaa', 'camau', 'bentre', 0),
(17, 'Minh Kham777', 'Soc Trang', '0', '', 999999),
(18, 'Trung Tin', 'Bạc Liêu1', '0', '', 9999999);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `deliveryaddress`
--

CREATE TABLE `deliveryaddress` (
  `delevery_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` char(11) NOT NULL,
  `province` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `customer_type` tinyint(1) NOT NULL COMMENT '1 la KL, 2 la DK',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `deliveryaddress`
--

INSERT INTO `deliveryaddress` (`delevery_id`, `user_id`, `full_name`, `phone`, `province`, `district`, `address`, `customer_type`, `created_at`) VALUES
(8, 6, 'Huỳnh Trung Tín', '09909090990', 'bentre', 'camau', '0', 1, '2024-09-09 09:30:52'),
(9, 6, 'Huỳnh Trung Tín', '09909090990', 'bentre', 'camau', '0', 1, '2024-09-09 09:35:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forget_password`
--

CREATE TABLE `forget_password` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `temp_key` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_des`
--

CREATE TABLE `images_des` (
  `images_des_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `images_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images_des`
--

INSERT INTO `images_des` (`images_des_id`, `products_id`, `images_description`) VALUES
(3, 1, './img/canon/200D/200D-2.png'),
(4, 1, './img/canon/200D/200D-3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `product_id`, `cart_id`, `order_quantity`, `order_date`, `status`) VALUES
(28, 17, 1, 51, 1, '2024-09-08 00:00:00', 0),
(29, 17, 5, 52, 1, '2024-09-08 00:00:00', 0),
(30, 18, 2, 53, 3, '2024-09-04 00:00:00', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`products_id`, `images`, `type`, `title`, `price`, `quantity`, `discount`, `description`, `category_id`) VALUES
(1, './img/canon/200D/200D.png', 'Canon', 'Canon 200D', 40000.00, 100, '1', 'Mô tả sản phẩm có thể hiểu đơn giản là nội dung tiếp thị, giải thích sản phẩm là gì và tại sao sản phẩm đó đáng mua. Mục đích của mô tả sản phẩm là cung cấp cho khách hàng chi tiết về các tính năng và lợi ích của sản phẩm để từ đó khiến khách hàng muốn mua hàng.\r\n\r\nNhiều người bán hàng thường mắc một sai lầm kinh điển. Đó là hay xem nhẹ và bỏ qua việc viết mô tả sản phẩm hay chỉ viết một cách qua loa, đại khái cho có. Trong khi đây là công đoạn rất quan trọng trong quá trình bán hàng. Thay đổi ngay đi nếu như bạn muốn doanh số bán hàng của bạn tăng trưởng. Hãy tham khảo 9 mẹo viết mô tả sản phẩm đơn giản mà hiệu quả để giúp bạn thu hút khách hàng ngay từ dòng đầu tiên.', 2),
(2, './img/canon/1500D-kit/1500D-kit.png', 'Canon', 'Canon 1500D-kit', 43000.00, 100, '0', 'uu', 2),
(3, './img/canon/3000D-kit/3000D-kit.png', 'Canon', 'Canon 3000D-kit', 16000.00, 100, '1', 'rr', 2),
(4, './img/canon/G7-X-mark/G7-X-mark.png', 'Canon', 'Canon G7-X-mark', 23100.00, 100, '0', 'dd', 2),
(5, './img/canon/phukien/speedlite.png', 'phukienanhsang', 'Đèn speedlite', 5400.00, 100, '1', 'hh', 3),
(6, './img/canon/R7/R7.png', 'Canon', 'Canon R7', 54322.00, 100, '0', 'ii', 2),
(7, './img/canon/R8/R8.png', 'Canon', 'Canon R8', 54323.00, 30, '1', 's', 2),
(8, './img/canon/R50/R50.png', 'Canon', 'Canon R50', 32554.00, 100, '0', 'gg', 2),
(9, './img/canon/R100/R100.png', 'Canon', 'Canon R100', 4325220.00, 100, '1', '3', 2),
(10, './img/canon/SX740-HS/SX740-HS.png', 'Canon', 'Canon SX740-HS', 540030.00, 100, '0', 'f', 2),
(11, './img/Nikon/D780/D780-1.jpg', 'Nikon', 'Nikon D780', 540030.00, 100, '0', 'w', 2),
(12, './img/Nikon/Z30/Z30-1.jpg', 'Nikon', 'Nikon Z30', 540030.00, 100, '0', 'hh', 2),
(13, './img/Nikon/Z9/Z9-1.jpg', 'Nikon', 'Nikon Z9', 540030.00, 100, '0', 'cc', 2),
(14, './img/Nikon/ZFc/ZFc-1.jpg', 'Nikon', 'Nikon Z Fc', 540030.00, 100, '0', 'rr', 2),
(15, './img/Sony/Alpha9III/Alpha9III-1.png', 'Sony', 'Alpha 9 III', 540030.00, 100, '0', 'vv', 2),
(16, './img/Sony/Alpha6100/Alpha6100-1.png', 'Sony', 'Alpha 6100', 540030.00, 100, '0', 'xx', 2),
(17, './img/Sony/AlphaZV-E10II/AlphaZVE10II-1.png', 'Sony', 'Alpha ZV-E10 II', 540030.00, 100, '0', 'hoangquy', 2),
(24, './img/Sony/AlphaZV-E10II/AlphaZVE10II-1.png', 'sony', 'Alpha ZV-E10 II', 540030.00, 100, '0', NULL, NULL),
(25, './img/PhuKien/day-deo.jpg', 'khac', 'Day Đeo', 100.00, 10, '0', NULL, NULL),
(26, './img/PhuKien/day-deo2.jpg', 'khac', 'Day Đeo 2', 120.00, 15, '5', NULL, NULL),
(27, './img/PhuKien/den-led-Ulanzi.png', 'phukienanhsang', 'Đèn Led Ulanzi', 200.00, 5, '10', NULL, NULL),
(28, './img/PhuKien/Dù-phan-bac.jpg', 'phukienanhsang', 'Dù Phản Bạc', 150.00, 8, '0', NULL, NULL),
(29, './img/PhuKien/filterK&F-67mm.jpg', 'boloc', 'Filter K&F 67mm', 250.00, 12, '15', NULL, NULL),
(30, './img/PhuKien/filterK&F.jpg', 'boloc', 'Filter K&F', 230.00, 20, '10', NULL, NULL),
(31, './img/PhuKien/fujifilm-C200-fujicolor.png', 'luutru', 'Film Fujifilm C200', 80.00, 30, '0', NULL, NULL),
(32, './img/PhuKien/gimbal-zhiyun.jpg', 'giado', 'Gimbal Zhiyun', 300.00, 7, '20', NULL, NULL),
(33, './img/PhuKien/hat_sang.jpg', 'khac', 'Hát Sang', 90.00, 25, '5', NULL, NULL),
(34, './img/PhuKien/sandisk-extreme-pro-25.jpg', 'luutru', 'Sandisk Extreme Pro 25GB', 50.00, 50, '0', NULL, NULL),
(35, './img/PhuKien/tripodK&F-MS05.jpg', 'giado', 'Tripod K&F MS05', 180.00, 15, '10', NULL, NULL),
(36, './img/PhuKien/tripodK&F.jpg', 'giado', 'Tripod K&F', 160.00, 20, '5', NULL, NULL),
(37, 'img/Nikon/lens/NikkorZ50/Z50f1.2 -1.png', 'ongkinh', 'Lens Nikon', 12451.00, 124, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL,
  `product_type_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`, `category_id`) VALUES
(1, 'Canon', 2),
(2, 'Sony', 2),
(3, 'Nikon', 2),
(4, 'Fujifilm', 2),
(5, 'Panasonic', 2),
(6, 'Ống kính', 3),
(7, 'Bộ lọc (Filter)', 3),
(8, 'Phụ kiện ánh sáng', 3),
(9, 'Bộ giá đỡ và chân máy', 3),
(10, 'Lưu trữ', 3),
(11, 'Khác', 3);

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
(4, 'tin', 'huynhtrungtin2222@gmail.com', '456', 1),
(6, 'tintrung', 't@gmail.com', '123', 0),
(7, 'hoangquy', 'hoangquyle11@gmail.com', 'honagquy', 0),
(8, 'hoangquy1', 'h@gmail.com', '123456', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `deliveryaddress`
--
ALTER TABLE `deliveryaddress`
  ADD PRIMARY KEY (`delevery_id`);

--
-- Chỉ mục cho bảng `forget_password`
--
ALTER TABLE `forget_password`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `FK_ProductsCategory` (`category_id`);

--
-- Chỉ mục cho bảng `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `deliveryaddress`
--
ALTER TABLE `deliveryaddress`
  MODIFY `delevery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `forget_password`
--
ALTER TABLE `forget_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
