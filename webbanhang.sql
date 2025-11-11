-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 10, 2023 lúc 01:36 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) NOT NULL,
  `makhachhang` int(10) NOT NULL,
  `masanpham` int(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  `thoigian` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `makhachhang`, `masanpham`, `soluong`, `thoigian`) VALUES
(1, 1, 12, 1, '26-10-2022 14:30:08'),
(2, 1, 12, 2, '26-10-2022 14:30:08'),
(3, 1, 9, 1, '26-10-2022 14:34:16'),
(8, 1, 1, 1, '15-11-2022 16:00:07'),
(9, 1, 11, 2, '15-11-2022 16:03:29'),
(10, 1, 11, 1, '28-12-2022 09:27:27'),
(11, 1, 10, 1, '28-12-2022 13:35:26'),
(12, 3, 1, 1, '28-12-2022 13:38:37'),
(13, 6, 1, 1, '28-12-2022 13:42:19'),
(14, 6, 2, 1, '28-12-2022 13:42:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makhachhang` int(10) NOT NULL,
  `tendangnhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makhachhang`, `tendangnhap`, `matkhau`, `sodienthoai`) VALUES
(1, 'huynhthanhphu', '12345', '0987654321'),
(3, 'phanduykhuong', 'dhquyen08', '0389478549'),
(4, 'taikhoan1', '12345', '08887666'),
(6, 'huynhngoctho1', '123456', '134455'),
(8, 'lehuuthua3', 'bethua3', '0968056408');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantri`
--

CREATE TABLE `quantri` (
  `tendangnhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quantri`
--

INSERT INTO `quantri` (`tendangnhap`, `matkhau`) VALUES
('admin', 'admin'),
('admin3', '12345');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masanpham` int(10) NOT NULL,
  `tensanpham` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `thongtinsanpham` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `giatien` int(9) NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matheloai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masanpham`, `tensanpham`, `thongtinsanpham`, `giatien`, `hinhanh`, `matheloai`) VALUES
(1, 'Laptop Acer Aspire 7 Gaming A7', '<p>CPU: Ryzen 55500U2.1GHz</p>\r\n\r\n<p>RAM: 8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời) 3200MHz</p>\r\n\r\n<p>Ổ cứng: 256 GB SSD NVMe</p>\r\n', 16000000, 'aceraspire7gaminga715.jpg', 1),
(2, 'MacBook Pro 16 M1 Max 2021', '<p>CPU: Apple M1 Max400GB/s memory bandwidth</p>\r\n\r\n<p>RAM: 32 GB</p>\r\n\r\n<p>Ổ cứng: 1 TB SSD</p>\r\n', 85990000, 'macbookpro14m1pro2021.jpg', 1),
(3, 'may tinh a', '<p>ram 16</p>\r\n\r\n<p>ssd 200</p>\r\n', 1000000, 'aceraspire7gaminga715.jpg', 1),
(9, 'Chuột Không dây Bluetooth Logi', '<p>Tương th&iacute;ch: MacOS (MacBook, iMac) Windows</p>\r\n\r\n<p>Độ ph&acirc;n giải mặc định: 4000 DPI</p>\r\n', 2500000, 'chuot-khong-day-logitech.jpeg', 3),
(10, 'PC Gaming MSI MAG Infinite', '<p>C&ocirc;ng nghệ CPU: i512400F 2.50 GHz</p>\r\n\r\n<p>RAM: 16 GBDDR4 2 khe (1 khe 8 GB + 1 khe 8 GB) 3200 MHz</p>\r\n\r\n<p>Ổ cứng: 512 GB SSD&nbsp;</p>\r\n', 30000000, 'msi-mag-infinite.jpg', 2),
(11, 'Chuột Có dây Gaming MSI Clutch', '<p>Tương th&iacute;ch: WindowsMacOS (MacBook, iMac)</p>\r\n\r\n<p>Độ ph&acirc;n giải mặc định: 200 - 3200 DPI</p>\r\n\r\n<p>C&aacute;ch kết nối: D&acirc;y cắm USB</p>\r\n', 2000000, 'chuot-khong-day-logitech.jpeg', 3),
(12, 'Dell Vostro 3400 i7 1165G7/8GB', '<p>CPU: i7 1165G7 2.8GHz</p>\r\n\r\n<p>RAM:&nbsp;8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời) 3200 MHz</p>\r\n\r\n<p>Ổ cứng:&nbsp;512 GB SSD NVMe PCIe</p>\r\n', 23000000, 'dell-vostro-3400.jpg', 1),
(13, 'Laptop MSI Gaming GE66 Raider', '<p>CPU: i711800H 2.30 GHz</p>\r\n\r\n<p>RAM: 32 GBDDR4 2 khe (1 khe 16 GB + 1 khe 16 GB)3200 MHz</p>\r\n\r\n<p>Ổ cứng: 2 TB SSD NVMe PCIe</p>\r\n', 77490000, 'msi-gaming-ge66-raider.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `matheloai` int(10) NOT NULL,
  `tentheloai` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`matheloai`, `tentheloai`) VALUES
(1, 'Laptop'),
(2, 'Máy Tính Bàn PC'),
(3, 'Linh kiện');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masanpham` (`masanpham`),
  ADD KEY `makhachhang` (`makhachhang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makhachhang`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masanpham`),
  ADD KEY `matheloai` (`matheloai`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`matheloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makhachhang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masanpham` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `matheloai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`masanpham`) REFERENCES `sanpham` (`masanpham`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`matheloai`) REFERENCES `theloai` (`matheloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
