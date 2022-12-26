-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 26, 2022 lúc 01:06 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `giaylily`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `idhd` int(11) NOT NULL,
  `id_tk` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `timeorder` datetime NOT NULL,
  `amount` int(11) NOT NULL,
  `totalmoney` double NOT NULL,
  `deliveryaddress` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`idhd`, `id_tk`, `id_sp`, `timeorder`, `amount`, `totalmoney`, `deliveryaddress`, `status`) VALUES
(3, 2, 42, '0000-00-00 00:00:00', 2, 800000, '21ngusyts-kahgs-12h', 'TrongGio'),
(5, 2, 42, '2022-12-11 12:43:19', 2, 800000, '21ngusyts-kahgs-12h', 'TrongGio'),
(6, 2, 42, '2022-12-11 10:44:34', 1, 400000, '21ngusyts-kahgs-12h', 'TrongGio'),
(7, 2, 26, '2022-12-11 10:45:35', 2, 6000000, '21ngusyts-kahgs-12h', 'TrongGio'),
(8, 42, 26, '2022-12-12 22:16:33', 1, 3000000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(9, 42, 26, '2022-12-12 22:16:33', 1, 3000000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(10, 42, 26, '2022-12-12 22:16:33', 1, 3000000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(13, 42, 26, '2022-12-12 22:16:33', 1, 3000000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(14, 42, 26, '2022-12-12 22:09:05', 1, 3000000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(15, 2, 26, '0000-00-00 00:00:00', 1, 3000000, '21ngusyts-kahgs-12h', 'TrongGio'),
(16, 2, 26, '0000-00-00 00:00:00', 1, 3000000, '21ngusyts-kahgs-12h', 'TrongGio'),
(18, 2, 26, '0000-00-00 00:00:00', 1, 3000000, '21ngusyts-kahgs-12h', 'TrongGio'),
(19, 2, 56, '0000-00-00 00:00:00', 1, 50000, '21ngusyts-kahgs-12h', 'TrongGio'),
(20, 42, 26, '2022-12-13 20:48:58', 1, 3000000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(22, 42, 42, '2022-12-13 22:33:23', 1, 400000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(23, 42, 42, '2022-12-13 21:59:59', 2, 800000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(24, 42, 42, '2022-12-26 07:05:21', 1, 400000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(25, 42, 43, '2022-12-26 07:05:28', 1, 800000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(26, 42, 43, '2022-12-13 22:13:52', 1, 800000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(27, 42, 56, '2022-12-13 22:22:30', 1, 50000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(28, 42, 42, '2022-12-13 22:23:05', 2, 800000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(29, 42, 53, '2022-12-13 22:24:54', 1, 200000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(30, 42, 55, '2022-12-13 22:27:03', 1, 130000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(31, 42, 55, '2022-12-13 22:29:13', 5, 650000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(32, 42, 55, '2022-12-13 22:30:48', 3, 390000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(33, 42, 55, '2022-12-13 22:31:38', 1, 130000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(34, 42, 55, '2022-12-13 22:33:42', 2, 260000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(35, 42, 55, '2022-12-13 22:38:05', 2, 260000, '82 Đặng Văn Ngữ-Hà Nội', 'DaDat'),
(36, 2, 53, '2022-12-16 10:53:07', 1, 200000, '30 Ngõ 7, Đ. Lê Đức Thọ, Mỹ Đình, Cầu Giấy, Hà Nội', 'DaDat'),
(37, 2, 52, '2022-12-16 10:53:03', 1, 399000, '30 Ngõ 7, Đ. Lê Đức Thọ, Mỹ Đình, Cầu Giấy, Hà Nội', 'DaDat'),
(38, 2, 50, '2022-12-16 17:08:16', 1, 190000, '30 Ngõ 7, Đ. Lê Đức Thọ, Mỹ Đình, Cầu Giấy, Hà Nội', 'DaDat'),
(39, 2, 45, '0000-00-00 00:00:00', 1, 550000, '30 Ngõ 7, Đ. Lê Đức Thọ, Mỹ Đình, Cầu Giấy, Hà Nội', 'TrongGio'),
(40, 7, 56, '0000-00-00 00:00:00', 1, 50000, '42 P. Nguyên Hồng,Láng Hạ', 'TrongGio'),
(41, 7, 53, '0000-00-00 00:00:00', 1, 200000, '42 P. Nguyên Hồng,Láng Hạ', 'TrongGio'),
(44, 7, 67, '2022-12-19 09:34:27', 2, 24, '42 P. Nguyên Hồng,Láng Hạ', 'DaDat'),
(46, 7, 68, '2022-12-19 21:07:52', 1, 12, '42 P. Nguyên Hồng,Láng Hạ', 'DaDat'),
(49, 43, 52, '0000-00-00 00:00:00', 2, 798000, 'Quan Thổ 3 - Tôn Đức Thắng - Đống Đa - Hà Nội', 'TrongGio'),
(50, 43, 53, '0000-00-00 00:00:00', 1, 200000, 'Quan Thổ 3 - Tôn Đức Thắng - Đống Đa - Hà Nội', 'TrongGio'),
(54, 2, 50, '0000-00-00 00:00:00', 1, 190000, '30 Ngõ 7, Đ. Lê Đức Thọ, Mỹ Đình, Cầu Giấy, Hà Nội', 'TrongGio'),
(56, 2, 52, '2022-12-24 21:16:58', 2, 798000, '30 Ngõ 7, Đ. Lê Đức Thọ, Mỹ Đình, Cầu Giấy, Hà Nội', 'DaDat'),
(64, 2, 52, '2022-12-22 09:42:38', 1, 399000, '30 Ngõ 7, Đ. Lê Đức Thọ, Mỹ Đình, Cầu Giấy, Hà Nội', 'DaDat'),
(68, 2, 52, '0000-00-00 00:00:00', 1, 399000, '30 Ngõ 7, Đ. Lê Đức Thọ, Mỹ Đình, Cầu Giấy, Hà Nội', 'TrongGio');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `id_loai` int(11) NOT NULL,
  `ten_loai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`id_loai`, `ten_loai`) VALUES
(1, 'Giày thể thao'),
(2, 'Giày cao gót'),
(3, 'Scandal'),
(4, 'Boot');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id_sp` int(11) NOT NULL,
  `ten_sp` varchar(30) NOT NULL,
  `hinh_anh` text NOT NULL,
  `so_luong` int(11) NOT NULL,
  `thuong_hieu` varchar(30) NOT NULL,
  `gia_goc` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `id_loai` int(11) NOT NULL,
  `mau` varchar(30) NOT NULL,
  `trang_thai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id_sp`, `ten_sp`, `hinh_anh`, `so_luong`, `thuong_hieu`, `gia_goc`, `gia`, `id_loai`, `mau`, `trang_thai`) VALUES
(1, 'GIÀY BOOT AG0056', 'boot6.jpg', 200, 'Nike', 350000, 300000, 4, 'Đen', 'dangban'),
(26, 'Giày chạy bộ nam ARHS043-3', 'giaythethao6.jpg', 43, 'Puma', 360000, 3000000, 1, 'Trắng', 'dangban'),
(42, 'GIÀY BÍT AA0349', 'giaycaogot3.jpg', 2, 'BTT', 435000, 400000, 2, 'Kem', 'dangban'),
(43, 'GIÀY BOOT AG0054', 'boot3.jpg', 12, 'Hidan', 839000, 800000, 4, 'Trắng', 'dangban'),
(45, 'GIÀY BOOT AG0052', 'boot1.jpg', 11, 'mỹ tho', 580000, 550000, 4, 'tím', 'dangban'),
(48, 'SCANDAL AJ22', 'scandal3.jpg', 123, 'Natalil', 1350000, 1200000, 3, 'Tím', 'dangban'),
(50, 'Giày Sneaker AG0040', 'giaythethao7.jpg', 7, 'ANADAS', 200000, 190000, 1, 'xanh', 'dangban'),
(51, 'GIÀY SANDAL AA0358', 'scandal4.jpg', 12, 'a', 150000, 120000, 3, 'xanh', 'dangban'),
(52, 'Giày Sneaker AG0033', 'giaythethao3.jpg', 124, 'Danni', 410000, 399000, 1, 'xanh', 'dangban'),
(53, 'GIÀY BÍT AA0374', 'giaycaogot4.jpg', 200, 'Misa', 250000, 200000, 2, 'Trắng', 'dangban'),
(54, 'GIÀY BÍT AA0375', 'giaycaogot2.jpg', 12, 'Nana', 269000, 200000, 2, 'Đen', 'dangban'),
(55, 'GIÀY BÍT AA0376', 'giaycaogot1.jpg', 230, 'XAS', 150000, 130000, 2, 'Đen', 'dangban'),
(56, 'GIÀY SANDAL AA0355', 'scandal1.jpg', 22, 'MS', 66000, 50000, 3, 'Trắng', 'dangban'),
(57, 'GIÀY SANDAL AA0356', 'scandal2.jpg', 12, 'FS', 176000, 150000, 3, 'Đen', 'dangban'),
(58, 'GIÀY SANDAL AA0366', 'scandal3.jpg', 50, 'FS', 60000, 55000, 3, 'Hồng', 'dangban'),
(59, 'Giày Sneaker AG0047', 'giaythethao6.jpg', 21, 'df', 250000, 200000, 1, 'Xám', 'dangban'),
(60, 'Giày Sneaker AG0033', 'giaythethao7.jpg', 0, 'dfasi', 599000, 500000, 1, 'Trắng', 'dangban'),
(61, 'GIÀY BOOT AG0054', 'boot5.jpg', 20, 'DLMI', 600000, 560000, 4, 'Kem', 'dangban'),
(64, 'GTTAGT00987', 'giaythethao8.jpg', 12, 'DELI', 210000, 199000, 1, 'Trắng', 'ngungban'),
(65, 'hoài', '3.jpg', 12, 'a', 250000, 200000, 1, 'g', 'ngungban'),
(66, 'hoài2', '4.jpg', 12, 'a', 1, 1, 1, 'q', 'ngungban'),
(67, 'hoài', '1.jpg', 12, 'a', 250000, 12, 1, 'g', 'ngungban'),
(68, 'hoài', '2.jpg', 12, 'a', 250000, 12, 1, 'q', 'ngungban'),
(71, 'hoài', '3.jpg', 1, 'a', 250000, 12, 1, 'xanh', 'ngungban');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id_tk` int(11) NOT NULL,
  `ten_dn` varchar(30) NOT NULL,
  `ten` varchar(30) NOT NULL,
  `sdt` int(11) NOT NULL,
  `mk` varchar(30) NOT NULL,
  `roles` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `trang_thai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`id_tk`, `ten_dn`, `ten`, `sdt`, `mk`, `roles`, `address`, `trang_thai`) VALUES
(1, 'admin', 'Dương Khánh Hoài', 2147483647, '1', 'admin', '130 Ngõ 8, Đ. Lê Đức Thọ, Mỹ Đình, Cầu Giấy, Hà Nội', 'hoatdong'),
(2, 'KH1', 'Nguyễn Văn A', 2147483647, '1', 'khách', '30 Ngõ 7, Đ. Lê Đức Thọ, Mỹ Đình, Cầu Giấy, Hà Nội', 'hoatdong'),
(3, 'KH2', 'Lê Thị B', 334421554, '1', 'khách', '16 Thanh Xuân, Hà Nội', 'hoatdong'),
(4, 'KH3', 'Phạm Văn C', 334987553, '1', 'khách', '45 P. Nguyên Hồng, Láng Hạ', 'hoatdong'),
(7, 'KH4', 'Hoàng Văn D', 555657335, '1', 'khách', '42 P. Nguyên Hồng,Láng Hạ', 'hoatdong'),
(9, 'KH5', 'Trần Thị  Trang', 355888777, '1', 'khách', '75 P. Nguyên Hồng,Láng Hạ', 'hoatdong'),
(39, 'KH6', 'Nguyễn Thị H', 334421554, '1', 'khách', 'Quan Thổ 3 - Tôn Đức Thắng - Đống Đa - Hà Nộ', 'hoatdong'),
(40, 'KH10', 'Phạm Văn A', 334421554, '1', 'khách', 'Quan Thổ 3 - Tôn Đức Thắng - Đống Đa - Hà Nội', 'hoatdong'),
(41, 'KH11', 'Phạm Thị B', 55565432, '1', 'khách', '192 Lê Trọng Tấn-Hoàng Mai-Hà Nội', 'hoatdong'),
(42, 'KH20', 'Nguyễn Văn D', 555644544, '1', 'khách', '82 Đặng Văn Ngữ-Hà Nội', 'hoatdong'),
(43, 'H', 'NGUYỄN THỊ HƯỜNG ', 334421554, '1', 'khách', 'Quan Thổ 3 - Tôn Đức Thắng - Đống Đa - Hà Nội', 'ngung'),
(50, 'KH75', 'Nguyễn Văn AK', 334421554, '1', 'khách', '130 Ngõ 8, Đ. Lê Đức Thọ, Mỹ Đình, Cầu Giấy, Hà Nội', 'ngung'),
(52, 'KH266', 'Phạm Văn A', 334421554, '1', 'khách', '130 Ngõ 8, Đ. Lê Đức Thọ, Mỹ Đình, Cầu Giấy, Hà Nội', 'ngung');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idhd`),
  ADD KEY `id_tk` (`id_tk`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`id_loai`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_loai` (`id_loai`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id_tk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `idhd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `id_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_tk`) REFERENCES `tai_khoan` (`id_tk`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id_sp`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`id_loai`) REFERENCES `loai` (`id_loai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
