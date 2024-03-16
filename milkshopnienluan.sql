-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 04, 2024 lúc 02:18 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `milkshopnienluan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_12_31_112119_create_tbl_admin_table', 1),
(5, '2024_01_01_121913_create_tbl_category_product', 1),
(6, '2024_01_04_112100_create_tbl_brand_product', 2),
(7, '2024_01_04_120803_create_tbl_product', 3),
(8, '2024_01_11_113019_tbl_customer', 4),
(9, '2024_01_11_122348_tbl_shipping', 5),
(13, '2024_01_14_122821_tbl_payment', 6),
(14, '2024_01_14_122853_tbl_order', 6),
(15, '2024_01_14_122919_tbl_order_details', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'admin', '0356047987', '2024-01-02 12:19:15', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text DEFAULT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(30, 'Vfresh', 'Sữa trái cây Vfresh', 1, NULL, NULL),
(31, 'Nutriboost', 'Sữa trái cây Nutriboost', 1, NULL, NULL),
(32, 'Vinamilk', NULL, 1, NULL, NULL),
(33, 'Cô gái Hà Lan', NULL, 1, NULL, NULL),
(36, 'Vinfruits', 'Trái cây', 1, NULL, NULL),
(38, 'Nutifood', 'Sữa trái cây, sữa chua', 1, NULL, NULL),
(39, 'Love yogurt', NULL, 1, NULL, NULL),
(40, 'Meadow fresh', NULL, 1, NULL, NULL),
(41, 'Meji', NULL, 1, NULL, NULL),
(42, 'NutiMilk', NULL, 1, NULL, NULL),
(44, 'Comebuy', NULL, 1, NULL, NULL),
(55, 'TH True Milk', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text DEFAULT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(34, 'Sữa trái cây', NULL, 1, NULL, NULL),
(35, 'Sữa chua', NULL, 1, NULL, NULL),
(37, 'Sữa tươi', NULL, 1, NULL, NULL),
(38, 'Trà sữa', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_password`, `created_at`, `updated_at`) VALUES
(6, 'user1', 'user1@gmail.com', '123456789', '25f9e794323b453885f5181f1b624d0b', NULL, NULL),
(7, 'user3', 'user3@gmail.com', '1345646', '25f9e794323b453885f5181f1b624d0b', NULL, NULL),
(8, 'user4', 'user4@gmail.com', '35235435', '25f9e794323b453885f5181f1b624d0b', NULL, NULL),
(9, 'Lý thiên mai', 'ltm@gmail.com', '123456789', '25f9e794323b453885f5181f1b624d0b', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` varchar(50) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(113, 6, 98, '62000.00', 'Đang chờ', NULL, NULL),
(114, 9, 99, '465000.00', 'Đang chờ', NULL, NULL),
(115, 9, 100, '180000.00', 'Đang chờ', NULL, NULL),
(116, 9, 101, '3510000.00', 'Đang chờ', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_detail_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(127, 113, 66, 'Sữa tươi nguyên kem', 'sua-tuoi-tiet-trung-nguyen-kem-meadow-fresh-hop-1-lit-san-xuat-tu-uc-20230404162212812473.jpg', '50000', 1, NULL, NULL),
(128, 113, 69, 'Sữa chua trân châu', 'yg65.jpg', '12000', 1, NULL, NULL),
(129, 114, 47, 'Sữa tươi Meji', 'sua_tuoi_thanh_trung_meiji_946ml_c336d8cd84bf4fa4afb9641b6cb8f8ac892.jpg', '15000', 1, NULL, NULL),
(130, 114, 71, 'Sữa chua nha đam', 'scnd1017.jpg', '50000', 5, NULL, NULL),
(131, 114, 46, 'Trà sữa trân châu đen', 'ts_comebuy_cf2fd6cf2b364ee491596767618ca054-removebg-preview6374.png', '50000', 4, NULL, NULL),
(132, 115, 45, 'Sữa trái cây hương cam', 'nuoc-uong-sua-trai-cay-th-cam-chai-300ml8675.jpg', '45000', 4, NULL, NULL),
(133, 116, 45, 'Sữa trái cây hương cam', 'nuoc-uong-sua-trai-cay-th-cam-chai-300ml8675.jpg', '45000', 78, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text DEFAULT NULL,
  `product_content` text DEFAULT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_condition` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_code`, `product_name`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_condition`, `product_status`, `created_at`, `updated_at`) VALUES
(44, 'STK05', 'Sữa dâu tây', 34, 38, NULL, NULL, '35000', 'DAU-800x800-1313.png', '1', 1, NULL, NULL),
(45, 'STK04', 'Sữa trái cây hương cam', 34, 55, NULL, NULL, '45000', 'nuoc-uong-sua-trai-cay-th-cam-chai-300ml8675.jpg', '1', 1, NULL, NULL),
(46, 'TS02', 'Trà sữa trân châu đen', 38, 44, NULL, NULL, '50000', 'ts_comebuy_cf2fd6cf2b364ee491596767618ca054-removebg-preview6374.png', '1', 1, NULL, NULL),
(47, 'ST01', 'Sữa tươi Meji', 37, 41, NULL, NULL, '15000', 'sua_tuoi_thanh_trung_meiji_946ml_c336d8cd84bf4fa4afb9641b6cb8f8ac892.jpg', '1', 1, NULL, NULL),
(51, 'SC1', 'Sữa chua việt quất', 35, 55, NULL, 'Sữa chua việt quất là món ăn thơm ngon, mát lành dành cho mùa hè và được nhiều người yêu thích. Món ăn đơn giản dễ thực hiện, nhưng mang lại giá trị dinh dưỡng cao, tốt cho sức khỏe, vừa giúp bổ sung vitamin khoáng chất, vừa giúp làm đẹp da, giữ gìn vóc dáng.', '80000', 'SCUMS-vviet-quat-800x800-142.png', '1', 1, NULL, NULL),
(66, 'ST02', 'Sữa tươi nguyên kem', 37, 40, NULL, 'Sữa tươi nguyên kem Meadow Fresh 1 lít thơm ngon, giàu canxi và các dưỡng chất tốt cho sức khỏe.', '50000', 'sua-tuoi-tiet-trung-nguyen-kem-meadow-fresh-hop-1-lit-san-xuat-tu-uc-2023040416221281247334.jpg', '1', 1, NULL, NULL),
(69, 'SC02', 'Sữa chua trân châu', 35, 39, NULL, NULL, '12000', 'yg65.jpg', '1', 1, NULL, NULL),
(70, 'ST03', 'Sữa tươi sô cô la', 37, 41, NULL, NULL, '70000', 'b9fb2e1a1dba09240c0fdbccc8a8104190.jpg', '1', 1, NULL, NULL),
(71, 'SCND01', 'Sữa chua nha đam', 35, 32, NULL, NULL, '50000', 'scnd1017.jpg', '1', 1, NULL, NULL),
(72, 'SCTC01', 'Sữa chua trân châu', 35, 32, NULL, NULL, '55000', '89346735004327636.png', '1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_email` varchar(255) DEFAULT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_notes` text DEFAULT NULL,
  `shipping_payment` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_email`, `shipping_phone`, `shipping_address`, `shipping_notes`, `shipping_payment`, `created_at`, `updated_at`) VALUES
(98, 'Nguyễn Văn A', NULL, '1234567890', 'Cần thơ', NULL, 1, NULL, NULL),
(99, 'Lý My', 'lm@gmail.com', '0123456', 'Cần thơ', 'Giao lẹ shop ơi', 1, NULL, NULL),
(100, 'Trúc Mai', NULL, '789456123', 'Sốc trăng', NULL, 2, NULL, NULL),
(101, 'Thiên Văn', 'tv@gmail.com', '789456123', 'Thốt nốt', NULL, 3, NULL, NULL),
(102, 'Thiên Văn', 'tv@gmail.com', '789456123', 'Thốt nốt', NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
