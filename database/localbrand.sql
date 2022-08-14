-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 14, 2022 lúc 09:50 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `localbrand`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `level`) VALUES
(3, 'admin', 'admin@gmail.com', '123', 0),
(4, 'superadmin', 'sadmin@gmail.com', '123321', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone_number`, `address`, `token`) VALUES
(1, 'hùng nguyen hung', 'nguyenvanhung0297@gmail.com', '321', '0961919603', 'hoàng mai hà nội', NULL),
(8, 'Quyết Tâm', 'ngotam@gmail.com', '123', '0132323123', '123', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_name` varchar(50) NOT NULL,
  `manufacturer_image` varchar(200) NOT NULL,
  `phone` char(15) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_name`, `manufacturer_image`, `phone`, `address`) VALUES
(4, 'Luis vuiton', 'https://cocotodichvulogonhanh.files.wordpress.com/2019/02/louis-vuitton-monogram-logo-365x365.jpg', '', ''),
(5, 'Gucci', 'https://i.pinimg.com/564x/46/5f/bb/465fbbb978994d00a67c5c1d7c74ccdc.jpg', '', ''),
(6, 'CHANEL', 'http://2.bp.blogspot.com/-Gv3uktl4Uws/VWdb2qk_RNI/AAAAAAAADvw/0nF_yhezKcI/s1600/chanel_logo.gif', '', ''),
(7, 'DIOR', 'https://bloganchoi.com/wp-content/uploads/2020/12/my-pham-dior-3.jpg', '', ''),
(8, 'HERMÈS', 'https://image-us.24h.com.vn/upload/3-2020/images/2020-08-31/9-1598846793-864-width512height512.jpg', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name_receiver` varchar(50) NOT NULL,
  `phone_receiver` varchar(20) NOT NULL,
  `address_receiver` text NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `status`, `created_at`, `total_price`) VALUES
(17, 1, 'hùng nguyen hung', '961919603', 'hoàng mai hà nội', '1', '2022-08-13 18:44:04', 400000),
(18, 1, 'hùng nguyen hung', '0961919603', 'hoàng mai hà nội', '0', '2022-08-14 05:41:02', 200000),
(19, 1, 'hùng nguyen hung', '0961919603', 'hoàng mai hà nội', '0', '2022-08-14 05:42:19', 200000),
(20, 8, 'Quyết Tâm', '0132323123', '123', '0', '2022-08-14 07:46:45', 750000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`, `size_product_id`) VALUES
(17, 9, 1, 1),
(17, 10, 1, 1),
(18, 10, 1, 4),
(19, 11, 1, 3),
(20, 11, 2, 1),
(20, 12, 1, 1),
(20, 15, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `manufacturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `description`, `manufacturer_id`) VALUES
(9, 'Áo croptop', '1659348852.jpg', 200000, '- Thành phần: Cotton 100% co giãn 4c \r\n- Xuất sứ: Việt nam\r\n- Form dáng: Slimfit vừa vặn, trẻ trung, lịch lãm\r\n- Màu sắc: (5 màu) Đen / Trắng / Xanh vỏ đậu/ Cam đỏ / Nâu/ xanh đen \r\n- Chọn màu và Size bằng cách nhắn tin cho shop or ghi chú nhé\r\n- BẢNG SIZE:\r\n+ Size M:  Chiều cao: 1m50-1m70, Cân nặng: 50-60kg, Dài: 68cm Vòng 1: 92-96cm, Vòng bụng: 83-85cm\r\n+ Size L:   Chiều cao: 1m65-1m75, Cân nặng: 61-69kg, Dài: 68cm Vòng 1: 95-99cm, Vòng bụng: 86-90cm\r\n+ Size XL: Chiều cao: 1m50-1m70, Cân nặng: 70-80kg, Dài: 70cm Vòng 1: 98-102cm, Vòng bụng: 91-95cm\r\n- Hướng dẫn bảo quản\r\n+ Giặt máy với chu kỳ trung bình và vòng quay ngắn\r\n+ Giặt với nhiệt độ tối đa 30 độ C\r\n+ Sấy ở nhiệt độ thường\r\n+ Là ủi ở nhiệt độ thấp', 6),
(10, 'Áo bee', '1659348802.jpg', 200000, '- Thành phần: Cotton 100% co giãn 4c \r\n- Xuất sứ: Việt nam\r\n- Form dáng: Slimfit vừa vặn, trẻ trung, lịch lãm\r\n- Màu sắc: (5 màu) Đen / Trắng / Xanh vỏ đậu/ Cam đỏ / Nâu/ xanh đen \r\n- Chọn màu và Size bằng cách nhắn tin cho shop or ghi chú nhé\r\n- BẢNG SIZE:\r\n+ Size M:  Chiều cao: 1m50-1m70, Cân nặng: 50-60kg, Dài: 68cm Vòng 1: 92-96cm, Vòng bụng: 83-85cm\r\n+ Size L:   Chiều cao: 1m65-1m75, Cân nặng: 61-69kg, Dài: 68cm Vòng 1: 95-99cm, Vòng bụng: 86-90cm\r\n+ Size XL: Chiều cao: 1m50-1m70, Cân nặng: 70-80kg, Dài: 70cm Vòng 1: 98-102cm, Vòng bụng: 91-95cm\r\n- Hướng dẫn bảo quản\r\n+ Giặt máy với chu kỳ trung bình và vòng quay ngắn\r\n+ Giặt với nhiệt độ tối đa 30 độ C\r\n+ Sấy ở nhiệt độ thường\r\n+ Là ủi ở nhiệt độ thấp', 4),
(11, 'Áo Gấu hồng', '1659348893.jpg', 200000, '- Thành phần: Cotton 100% co giãn 4c \r\n- Xuất sứ: Việt nam\r\n- Form dáng: Slimfit vừa vặn, trẻ trung, lịch lãm\r\n- Màu sắc: (5 màu) Đen / Trắng / Xanh vỏ đậu/ Cam đỏ / Nâu/ xanh đen \r\n- Chọn màu và Size bằng cách nhắn tin cho shop or ghi chú nhé\r\n- BẢNG SIZE:\r\n+ Size M:  Chiều cao: 1m50-1m70, Cân nặng: 50-60kg, Dài: 68cm Vòng 1: 92-96cm, Vòng bụng: 83-85cm\r\n+ Size L:   Chiều cao: 1m65-1m75, Cân nặng: 61-69kg, Dài: 68cm Vòng 1: 95-99cm, Vòng bụng: 86-90cm\r\n+ Size XL: Chiều cao: 1m50-1m70, Cân nặng: 70-80kg, Dài: 70cm Vòng 1: 98-102cm, Vòng bụng: 91-95cm\r\n- Hướng dẫn bảo quản\r\n+ Giặt máy với chu kỳ trung bình và vòng quay ngắn\r\n+ Giặt với nhiệt độ tối đa 30 độ C\r\n+ Sấy ở nhiệt độ thường\r\n+ Là ủi ở nhiệt độ thấp', 4),
(12, 'áo phông thụng', '1659349716.jpg', 200000, '- Thành phần: Cotton 100% co giãn 4c \r\n- Xuất sứ: Việt nam\r\n- Form dáng: Slimfit vừa vặn, trẻ trung, lịch lãm\r\n- Màu sắc: (5 màu) Đen / Trắng / Xanh vỏ đậu/ Cam đỏ / Nâu/ xanh đen \r\n- Chọn màu và Size bằng cách nhắn tin cho shop or ghi chú nhé\r\n- BẢNG SIZE:\r\n+ Size M:  Chiều cao: 1m50-1m70, Cân nặng: 50-60kg, Dài: 68cm Vòng 1: 92-96cm, Vòng bụng: 83-85cm\r\n+ Size L:   Chiều cao: 1m65-1m75, Cân nặng: 61-69kg, Dài: 68cm Vòng 1: 95-99cm, Vòng bụng: 86-90cm\r\n+ Size XL: Chiều cao: 1m50-1m70, Cân nặng: 70-80kg, Dài: 70cm Vòng 1: 98-102cm, Vòng bụng: 91-95cm\r\n- Hướng dẫn bảo quản\r\n+ Giặt máy với chu kỳ trung bình và vòng quay ngắn\r\n+ Giặt với nhiệt độ tối đa 30 độ C\r\n+ Sấy ở nhiệt độ thường\r\n+ Là ủi ở nhiệt độ thấp', 4),
(14, 'Áo croptop', '1659349732.jpg', 200000, '- Thành phần: Cotton 100% co giãn 4c \r\n- Xuất sứ: Việt nam\r\n- Form dáng: Slimfit vừa vặn, trẻ trung, lịch lãm\r\n- Màu sắc: (5 màu) Đen / Trắng / Xanh vỏ đậu/ Cam đỏ / Nâu/ xanh đen \r\n- Chọn màu và Size bằng cách nhắn tin cho shop or ghi chú nhé\r\n- BẢNG SIZE:\r\n+ Size M:  Chiều cao: 1m50-1m70, Cân nặng: 50-60kg, Dài: 68cm Vòng 1: 92-96cm, Vòng bụng: 83-85cm\r\n+ Size L:   Chiều cao: 1m65-1m75, Cân nặng: 61-69kg, Dài: 68cm Vòng 1: 95-99cm, Vòng bụng: 86-90cm\r\n+ Size XL: Chiều cao: 1m50-1m70, Cân nặng: 70-80kg, Dài: 70cm Vòng 1: 98-102cm, Vòng bụng: 91-95cm\r\n- Hướng dẫn bảo quản\r\n+ Giặt máy với chu kỳ trung bình và vòng quay ngắn\r\n+ Giặt với nhiệt độ tối đa 30 độ C\r\n+ Sấy ở nhiệt độ thường\r\n+ Là ủi ở nhiệt độ thấp', 4),
(15, 'Áo croptop xanh ngắn tay ', '1659349760.jpg', 150000, '- Thành phần: Cotton 100% co giãn 4c \r\n- Xuất sứ: Việt nam\r\n- Form dáng: Slimfit vừa vặn, trẻ trung, lịch lãm\r\n- Màu sắc: (5 màu) Đen / Trắng / Xanh vỏ đậu/ Cam đỏ / Nâu/ xanh đen \r\n- Chọn màu và Size bằng cách nhắn tin cho shop or ghi chú nhé\r\n- BẢNG SIZE:\r\n+ Size M:  Chiều cao: 1m50-1m70, Cân nặng: 50-60kg, Dài: 68cm Vòng 1: 92-96cm, Vòng bụng: 83-85cm\r\n+ Size L:   Chiều cao: 1m65-1m75, Cân nặng: 61-69kg, Dài: 68cm Vòng 1: 95-99cm, Vòng bụng: 86-90cm\r\n+ Size XL: Chiều cao: 1m50-1m70, Cân nặng: 70-80kg, Dài: 70cm Vòng 1: 98-102cm, Vòng bụng: 91-95cm\r\n- Hướng dẫn bảo quản\r\n+ Giặt máy với chu kỳ trung bình và vòng quay ngắn\r\n+ Giặt với nhiệt độ tối đa 30 độ C\r\n+ Sấy ở nhiệt độ thường\r\n+ Là ủi ở nhiệt độ thấp', 4),
(16, 'Áo phông dáng thụng', '1659349780.jpg', 200000, '- Thành phần: Cotton 100% co giãn 4c \r\n- Xuất sứ: Việt nam\r\n- Form dáng: Slimfit vừa vặn, trẻ trung, lịch lãm\r\n- Màu sắc: (5 màu) Đen / Trắng / Xanh vỏ đậu/ Cam đỏ / Nâu/ xanh đen \r\n- Chọn màu và Size bằng cách nhắn tin cho shop or ghi chú nhé\r\n- BẢNG SIZE:\r\n+ Size M:  Chiều cao: 1m50-1m70, Cân nặng: 50-60kg, Dài: 68cm Vòng 1: 92-96cm, Vòng bụng: 83-85cm\r\n+ Size L:   Chiều cao: 1m65-1m75, Cân nặng: 61-69kg, Dài: 68cm Vòng 1: 95-99cm, Vòng bụng: 86-90cm\r\n+ Size XL: Chiều cao: 1m50-1m70, Cân nặng: 70-80kg, Dài: 70cm Vòng 1: 98-102cm, Vòng bụng: 91-95cm\r\n- Hướng dẫn bảo quản\r\n+ Giặt máy với chu kỳ trung bình và vòng quay ngắn\r\n+ Giặt với nhiệt độ tối đa 30 độ C\r\n+ Sấy ở nhiệt độ thường\r\n+ Là ủi ở nhiệt độ thấp', 5),
(17, 'Áo phông freesize', '1659349800.jpg', 200000, '- Thành phần: Cotton 100% co giãn 4c \r\n- Xuất sứ: Việt nam\r\n- Form dáng: Slimfit vừa vặn, trẻ trung, lịch lãm\r\n- Màu sắc: (5 màu) Đen / Trắng / Xanh vỏ đậu/ Cam đỏ / Nâu/ xanh đen \r\n- Chọn màu và Size bằng cách nhắn tin cho shop or ghi chú nhé\r\n- BẢNG SIZE:\r\n+ Size M:  Chiều cao: 1m50-1m70, Cân nặng: 50-60kg, Dài: 68cm Vòng 1: 92-96cm, Vòng bụng: 83-85cm\r\n+ Size L:   Chiều cao: 1m65-1m75, Cân nặng: 61-69kg, Dài: 68cm Vòng 1: 95-99cm, Vòng bụng: 86-90cm\r\n+ Size XL: Chiều cao: 1m50-1m70, Cân nặng: 70-80kg, Dài: 70cm Vòng 1: 98-102cm, Vòng bụng: 91-95cm\r\n- Hướng dẫn bảo quản\r\n+ Giặt máy với chu kỳ trung bình và vòng quay ngắn\r\n+ Giặt với nhiệt độ tối đa 30 độ C\r\n+ Sấy ở nhiệt độ thường\r\n+ Là ủi ở nhiệt độ thấp', 5),
(18, 'Áo frezee', '1659349816.jpg', 200000, '- Thành phần: Cotton 100% co giãn 4c \r\n- Xuất sứ: Việt nam\r\n- Form dáng: Slimfit vừa vặn, trẻ trung, lịch lãm\r\n- Màu sắc: (5 màu) Đen / Trắng / Xanh vỏ đậu/ Cam đỏ / Nâu/ xanh đen \r\n- Chọn màu và Size bằng cách nhắn tin cho shop or ghi chú nhé\r\n- BẢNG SIZE:\r\n+ Size M:  Chiều cao: 1m50-1m70, Cân nặng: 50-60kg, Dài: 68cm Vòng 1: 92-96cm, Vòng bụng: 83-85cm\r\n+ Size L:   Chiều cao: 1m65-1m75, Cân nặng: 61-69kg, Dài: 68cm Vòng 1: 95-99cm, Vòng bụng: 86-90cm\r\n+ Size XL: Chiều cao: 1m50-1m70, Cân nặng: 70-80kg, Dài: 70cm Vòng 1: 98-102cm, Vòng bụng: 91-95cm\r\n- Hướng dẫn bảo quản\r\n+ Giặt máy với chu kỳ trung bình và vòng quay ngắn\r\n+ Giặt với nhiệt độ tối đa 30 độ C\r\n+ Sấy ở nhiệt độ thường\r\n+ Là ủi ở nhiệt độ thấp', 5),
(19, 'váy cute', '1659349834.jpg', 200000, '- Thành phần: Cotton 100% co giãn 4c \r\n- Xuất sứ: Việt nam\r\n- Form dáng: Slimfit vừa vặn, trẻ trung, lịch lãm\r\n- Màu sắc: (5 màu) Đen / Trắng / Xanh vỏ đậu/ Cam đỏ / Nâu/ xanh đen \r\n- Chọn màu và Size bằng cách nhắn tin cho shop or ghi chú nhé\r\n- BẢNG SIZE:\r\n+ Size M:  Chiều cao: 1m50-1m70, Cân nặng: 50-60kg, Dài: 68cm Vòng 1: 92-96cm, Vòng bụng: 83-85cm\r\n+ Size L:   Chiều cao: 1m65-1m75, Cân nặng: 61-69kg, Dài: 68cm Vòng 1: 95-99cm, Vòng bụng: 86-90cm\r\n+ Size XL: Chiều cao: 1m50-1m70, Cân nặng: 70-80kg, Dài: 70cm Vòng 1: 98-102cm, Vòng bụng: 91-95cm\r\n- Hướng dẫn bảo quản\r\n+ Giặt máy với chu kỳ trung bình và vòng quay ngắn\r\n+ Giặt với nhiệt độ tối đa 30 độ C\r\n+ Sấy ở nhiệt độ thường\r\n+ Là ủi ở nhiệt độ thấp', 6),
(20, 'áo đẹp free style', '1659871849.jpg', 150000, '- Thành phần: Cotton 100% co giãn 4c - Xuất sứ: Việt nam - Form dáng: Slimfit vừa vặn, trẻ trung, lịch lãm - Màu sắc: (5 màu) Đen / Trắng / Xanh vỏ đậu/ Cam đỏ / Nâu/ xanh đen - Chọn màu và Size bằng cách nhắn tin cho shop or ghi chú nhé - BẢNG SIZE: + Size M: Chiều cao: 1m50-1m70, Cân nặng: 50-60kg, Dài: 68cm Vòng 1: 92-96cm, Vòng bụng: 83-85cm + Size L: Chiều cao: 1m65-1m75, Cân nặng: 61-69kg, Dài: 68cm Vòng 1: 95-99cm, Vòng bụng: 86-90cm + Size XL: Chiều cao: 1m50-1m70, Cân nặng: 70-80kg, Dài: 70cm Vòng 1: 98-102cm, Vòng bụng: 91-95cm - Hướng dẫn bảo quản + Giặt máy với chu kỳ trung bình và vòng quay ngắn + Giặt với nhiệt độ tối đa 30 độ C + Sấy ở nhiệt độ thường + Là ủi ở nhiệt độ thấp', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_size`
--

CREATE TABLE `product_size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_size`
--

INSERT INTO `product_size` (`size_id`, `size_name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`customer_id`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `size_product_id` (`size_product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- Chỉ mục cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`size_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `product_size`
--
ALTER TABLE `product_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`manufacturer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
