-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-01-27 07:49:33
-- サーバのバージョン： 10.4.22-MariaDB
-- PHP のバージョン: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `rabbithouse`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `sensordata`
--

CREATE TABLE `sensordata` (
  `id` int(6) NOT NULL,
  `sensor` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `value1` float DEFAULT NULL,
  `value2` float DEFAULT NULL,
  `time_act` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mua` text DEFAULT NULL,
  `dudoanmua` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `sensordata`
--

INSERT INTO `sensordata` (`id`, `sensor`, `location`, `value1`, `value2`, `time_act`, `mua`, `dudoanmua`) VALUES
(1, 'DHT11', 'RabbitHouse', 26.1, 88, '2021-09-05 07:52:24', 'Khong co mua', 'CÃ³ mÆ°a'),
(2, 'DHT11', 'RabbitHouse', 26.2, 88, '2021-09-05 07:52:54', 'Khong co mua', 'CÃ³ mÆ°a'),
(3, 'DHT11', 'RabbitHouse', 33.8, 83, '2021-09-05 07:54:39', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(4, 'DHT11', 'RabbitHouse', 33.9, 83, '2021-09-05 07:56:26', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(5, 'DHT11', 'RabbitHouse', 29.9, 71, '2021-09-05 07:57:02', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(6, 'DHT11', 'RabbitHouse', 29.9, 71, '2021-09-05 07:57:44', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(7, 'DHT11', 'RabbitHouse', 29.1, 74, '2021-09-05 07:57:52', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(8, 'DHT11', 'RabbitHouse', 29, 74, '2021-09-05 07:57:59', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(9, 'DHT11', 'RabbitHouse', 28.9, 75, '2021-09-05 07:58:07', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(10, 'DHT11', 'RabbitHouse', 28.7, 76, '2021-09-05 07:58:15', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(11, 'DHT11', 'RabbitHouse', 28.6, 76, '2021-09-05 07:58:23', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(12, 'DHT11', 'RabbitHouse', 28.5, 77, '2021-09-05 07:58:30', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(13, 'DHT11', 'RabbitHouse', 28.4, 77, '2021-09-05 07:58:38', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(14, 'DHT11', 'RabbitHouse', 28.3, 78, '2021-09-05 07:58:46', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(15, 'DHT11', 'RabbitHouse', 28.2, 78, '2021-09-05 07:58:54', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(16, 'DHT11', 'RabbitHouse', 28.1, 78, '2021-09-05 07:59:01', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(17, 'DHT11', 'RabbitHouse', 28, 79, '2021-09-05 07:59:09', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(18, 'DHT11', 'RabbitHouse', 27.9, 79, '2021-09-05 07:59:17', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(19, 'DHT11', 'RabbitHouse', 27.9, 79, '2021-09-05 07:59:25', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(20, 'DHT11', 'RabbitHouse', 27.8, 80, '2021-09-05 07:59:32', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(21, 'DHT11', 'RabbitHouse', 27.7, 80, '2021-09-05 07:59:40', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(22, 'DHT11', 'RabbitHouse', 27.7, 80, '2021-09-05 07:59:48', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(23, 'DHT11', 'RabbitHouse', 27.6, 80, '2021-09-05 07:59:55', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(24, 'DHT11', 'RabbitHouse', 27.5, 80, '2021-09-05 08:00:03', 'Khong co mua', 'KhÃ´ng mÆ°a'),
(25, 'DHT11', 'RabbitHouse', 27.4, 81, '2021-09-05 08:00:11', 'Khong co mua', 'CÃ³ mÆ°a');

-- --------------------------------------------------------

--
-- テーブルの構造 `tblchitiethd`
--

CREATE TABLE `tblchitiethd` (
  `idChiTiet` int(11) NOT NULL,
  `idKhachhang` int(11) DEFAULT NULL,
  `tongSL` int(11) NOT NULL,
  `tongTien` int(11) NOT NULL,
  `ngayThang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `diaChiGH` text DEFAULT NULL,
  `daGH` text DEFAULT NULL,
  `idMon` int(11) DEFAULT NULL,
  `idStaff` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tblchitiethd`
--

INSERT INTO `tblchitiethd` (`idChiTiet`, `idKhachhang`, `tongSL`, `tongTien`, `ngayThang`, `diaChiGH`, `daGH`, `idMon`, `idStaff`) VALUES
(228, 58, 1, 10000, '2022-01-26 03:30:00', 'Osaka, Osaka, Japan', 'X', 23, NULL),
(229, NULL, 1, 10000, '2022-01-27 05:45:52', 'Rabbit House', 'X', 22, 3),
(230, NULL, 1, 20000, '2022-01-27 05:45:52', 'Rabbit House', 'X', 22, 3),
(231, NULL, 1, 10000, '2022-01-27 05:48:02', 'Rabbit House', 'X', 22, 3),
(232, NULL, 1, 10000, '2022-01-27 05:49:59', 'Rabbit House', 'X', 22, 3),
(233, NULL, 1, 100000, '2022-01-27 05:51:37', 'Rabbit House', 'O', 21, 3),
(234, 58, 1, 100000, '2022-01-27 05:57:28', 'Osaka, Osaka, Japan', 'O', 21, NULL),
(235, 58, 1, 110000, '2022-01-27 05:57:28', 'Osaka, Osaka, Japan', 'O', 23, NULL),
(236, 58, 1, 120000, '2022-01-27 05:57:28', 'Osaka, Osaka, Japan', 'O', 23, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `tbldoanhthu`
--

CREATE TABLE `tbldoanhthu` (
  `idDoanhThu` int(11) NOT NULL,
  `idChiTiet` int(11) NOT NULL,
  `ngay` date NOT NULL DEFAULT current_timestamp(),
  `thanhTien` int(11) NOT NULL,
  `tongSL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tbldoanhthu`
--

INSERT INTO `tbldoanhthu` (`idDoanhThu`, `idChiTiet`, `ngay`, `thanhTien`, `tongSL`) VALUES
(1, 180, '0000-00-00', 100000, NULL),
(2, 181, '0000-00-00', 10000, NULL),
(3, 182, '0000-00-00', 10000, NULL),
(4, 2, '0000-00-00', 10000, NULL),
(5, 185, '2021-10-30', 10000, NULL),
(6, 186, '2021-10-30', 10000, NULL),
(7, 187, '2021-10-30', 10000, NULL),
(8, 188, '2021-10-30', 30000, 3),
(9, 189, '2021-11-02', 15000, 1),
(10, 190, '2021-11-02', 500000, 5),
(11, 192, '2021-11-02', 150000, 15),
(12, 192, '2021-11-02', 150000, 15),
(13, 193, '2021-11-06', 60000, 4),
(14, 195, '2021-11-13', 110000, 2),
(15, 197, '2021-11-13', 20000, 2),
(16, 197, '2021-11-13', 20000, 2),
(17, 203, '2021-11-27', 200000, 1),
(18, 207, '2021-11-27', 20000, 1),
(19, 207, '2021-11-27', 20000, 1),
(20, 210, '2021-12-12', 10000, 1),
(21, 219, '2022-01-21', 10000, 1),
(22, 0, '2022-01-21', 100000, 1),
(23, 0, '2022-01-21', 10000, 1),
(24, 0, '2022-01-21', 100000, 1),
(25, 223, '2022-01-22', 10000, 1),
(26, 224, '2022-01-22', 10000, 1),
(27, 2, '2022-01-25', 0, 0),
(28, 227, '2022-01-25', 10000, 1),
(29, 233, '2022-01-27', 100000, 1),
(30, 236, '2022-01-27', 120000, 1),
(31, 236, '2022-01-27', 120000, 1),
(32, 236, '2022-01-27', 120000, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `tblhoadon`
--

CREATE TABLE `tblhoadon` (
  `iHhoadon` int(11) NOT NULL,
  `idKhachhang` int(11) NOT NULL,
  `idMon` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `ThanhTien` double DEFAULT NULL,
  `ngayThang` timestamp NULL DEFAULT NULL,
  `idstaff` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tblhoadon`
--

INSERT INTO `tblhoadon` (`iHhoadon`, `idKhachhang`, `idMon`, `soLuong`, `ThanhTien`, `ngayThang`, `idstaff`) VALUES
(177, 0, 21, 1, 100000, '2021-11-05 17:00:00', NULL),
(196, 3, 22, 1, 10000, '2022-01-19 01:45:35', NULL),
(225, 0, 22, 1, 10000, '2022-01-27 06:33:31', 3),
(226, 58, 23, 1, 10000, '2022-01-27 06:41:16', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `tblkhachhang`
--

CREATE TABLE `tblkhachhang` (
  `idKhachhang` int(11) NOT NULL,
  `tenKH` text NOT NULL,
  `SDT` text DEFAULT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `diachi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tblkhachhang`
--

INSERT INTO `tblkhachhang` (`idKhachhang`, `tenKH`, `SDT`, `username`, `password`, `diachi`) VALUES
(5, 'Kawasaki Sakura', '4547645875', 'Sunny_Sakura', '1111', NULL),
(58, 'Kawasaki Sakura', '0901234567', 'sakura', '1111', 'Osaka, Osaka, Japan'),
(62, 'Ibuki Nagisa', '0901234567', 'nagi_0803', '1111', 'Nagisa'),
(63, 'Ibuki Nagisa', '0901234567', 'nagi', '1111', 'Kabia');

-- --------------------------------------------------------

--
-- テーブルの構造 `tblkho`
--

CREATE TABLE `tblkho` (
  `idKho` int(11) NOT NULL,
  `tenHang` text NOT NULL,
  `soLuongBD` int(11) NOT NULL,
  `soLuongCL` int(11) NOT NULL,
  `thoiGianNK` datetime NOT NULL,
  `thoiGianXK` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tblkho`
--

INSERT INTO `tblkho` (`idKho`, `tenHang`, `soLuongBD`, `soLuongCL`, `thoiGianNK`, `thoiGianXK`, `id_user`) VALUES
(2, 'Cafe xay sẳn', 10, 7, '2022-01-24 08:43:09', '2022-01-25 08:34:35', 1),
(3, 'Bánh tráng', 10, 9, '2022-01-24 09:06:05', '2022-01-25 08:40:34', 1),
(4, 'Trứng cút', 10, 9, '2022-01-24 09:06:17', '2022-01-25 08:26:27', 1),
(5, 'CoCa', 10, 9, '2022-01-24 09:06:34', '2022-01-25 08:26:34', 1),
(6, 'Thịt + đồ nướng', 10, 10, '2022-01-24 09:07:30', '0000-00-00 00:00:00', 1),
(7, 'Muối', 10, 10, '2022-01-24 09:07:42', '0000-00-00 00:00:00', 1),
(8, 'Đường', 10, 10, '2022-01-24 09:07:51', '0000-00-00 00:00:00', 1),
(9, 'Chuối', 10, 10, '2022-01-24 09:08:06', '0000-00-00 00:00:00', 1),
(10, 'Mía', 10, 10, '2022-01-24 09:08:12', '0000-00-00 00:00:00', 1),
(11, 'Dừa', 10, 10, '2022-01-24 09:08:18', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `tblkhuyenmai`
--

CREATE TABLE `tblkhuyenmai` (
  `idKM` int(11) NOT NULL,
  `idKhachhang` int(11) DEFAULT NULL,
  `khuyenMai` int(11) NOT NULL,
  `tichLuy` int(11) DEFAULT NULL,
  `tenKM` text NOT NULL,
  `thoiGianBD` datetime NOT NULL,
  `thoiGianKT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tblkhuyenmai`
--

INSERT INTO `tblkhuyenmai` (`idKM`, `idKhachhang`, `khuyenMai`, `tichLuy`, `tenKM`, `thoiGianBD`, `thoiGianKT`) VALUES
(9, 0, 10, 0, 'Khuyến mãi tất cả khách hàng 10%', '2022-01-24 10:03:00', '2022-01-28 10:04:00'),
(13, NULL, 50, NULL, 'Khuyến mãi tất cả khách hàng 50%', '2022-01-30 13:35:00', '2022-02-05 13:35:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `tbllichsu`
--

CREATE TABLE `tbllichsu` (
  `idlichSu` int(11) NOT NULL,
  `idKhachhang` int(11) DEFAULT NULL,
  `idMon` int(11) NOT NULL,
  `gia` double NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soluong` int(11) DEFAULT NULL,
  `idChitiet` int(11) DEFAULT NULL,
  `idStaff` int(11) DEFAULT NULL,
  `daGH` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tbllichsu`
--

INSERT INTO `tbllichsu` (`idlichSu`, `idKhachhang`, `idMon`, `gia`, `thoigian`, `soluong`, `idChitiet`, `idStaff`, `daGH`) VALUES
(10, 0, 23, 20000, '2021-10-08 06:52:46', 2, NULL, NULL, NULL),
(23, 0, 21, 100000, '2021-10-09 23:53:38', 1, NULL, NULL, NULL),
(24, 0, 21, 100000, '2021-10-10 00:11:07', 1, NULL, NULL, NULL),
(25, 59, 23, 190000, '2021-10-17 10:37:05', 19, NULL, NULL, NULL),
(32, 0, 23, 10000, '2021-10-23 07:33:06', 1, NULL, NULL, NULL),
(37, 0, 19, 10000, '2021-10-24 00:21:55', 0, NULL, NULL, NULL),
(38, 0, 23, 10000, '2021-10-24 00:22:40', 0, NULL, NULL, NULL),
(75, 63, 23, 10000, '2021-11-13 00:48:54', 1, NULL, NULL, NULL),
(76, 63, 21, 100000, '2021-11-13 00:48:54', 1, NULL, NULL, NULL),
(77, 63, 23, 10000, '2021-11-13 00:52:14', 1, NULL, NULL, NULL),
(78, 63, 22, 10000, '2021-11-13 00:52:14', 1, NULL, NULL, NULL),
(79, 63, 20, 10000, '2021-11-13 00:54:18', 1, NULL, NULL, NULL),
(80, 63, 19, 10000, '2021-11-13 00:54:18', 1, NULL, NULL, NULL),
(81, 63, 21, 100000, '2021-11-13 00:58:32', 1, NULL, NULL, NULL),
(82, 63, 24, 15000, '2021-11-13 00:58:32', 1, NULL, NULL, NULL),
(83, 63, 21, 100000, '2021-11-13 01:02:06', 1, NULL, NULL, NULL),
(84, 63, 21, 100000, '2021-11-13 01:02:06', 1, NULL, NULL, NULL),
(85, 58, 23, 20000, '2021-11-27 02:42:13', 2, NULL, NULL, NULL),
(86, 58, 24, 15000, '2021-11-27 02:42:13', 2, NULL, NULL, NULL),
(87, 58, 23, 10000, '2021-11-27 04:28:50', 1, NULL, NULL, NULL),
(88, 58, 23, 10000, '2021-11-27 04:28:50', 1, NULL, NULL, NULL),
(89, 58, 21, 100000, '2021-12-12 00:03:19', 1, NULL, NULL, NULL),
(90, 58, 23, 10000, '2021-12-12 00:03:19', 1, NULL, NULL, NULL),
(91, 58, 20, 10000, '2021-12-12 00:24:52', 1, NULL, NULL, NULL),
(92, 0, 22, 10000, '2022-01-19 01:55:34', 1, NULL, 0, NULL),
(93, 0, 20, 10000, '2022-01-19 01:55:34', 1, NULL, 0, NULL),
(94, 0, 21, 100000, '2022-01-21 01:01:50', 1, NULL, 0, NULL),
(95, 0, 22, 10000, '2022-01-21 01:06:02', 1, NULL, 0, NULL),
(96, 0, 22, 10000, '2022-01-21 01:08:59', 1, NULL, 0, NULL),
(97, 0, 22, 10000, '2022-01-21 01:09:26', 1, NULL, 0, NULL),
(98, 0, 22, 10000, '2022-01-21 01:10:45', 1, NULL, 3, NULL),
(99, 0, 22, 10000, '2022-01-21 01:12:22', 1, NULL, 3, NULL),
(100, 0, 22, 10000, '2022-01-21 01:13:20', 1, NULL, 3, NULL),
(101, NULL, 21, 100000, '2022-01-21 01:21:09', 1, NULL, 3, NULL),
(102, NULL, 23, 10000, '2022-01-21 01:22:23', 1, NULL, 3, NULL),
(103, NULL, 21, 100000, '2022-01-21 02:19:46', 1, NULL, 3, NULL),
(104, NULL, 20, 10000, '2022-01-22 01:42:30', 1, NULL, 3, NULL),
(105, NULL, 23, 10000, '2022-01-22 01:42:48', 1, NULL, 3, NULL),
(106, NULL, 22, 10000, '2022-01-22 06:24:52', 1, NULL, 3, NULL),
(107, NULL, 21, 100000, '2022-01-22 06:25:18', 1, NULL, 3, NULL),
(108, 58, 23, 10000, '2022-01-25 01:42:42', 1, NULL, NULL, NULL),
(109, 58, 23, 10000, '2022-01-26 03:30:00', 1, NULL, NULL, NULL),
(110, NULL, 22, 10000, '2022-01-27 05:45:52', 1, 0, 3, 'X'),
(111, NULL, 22, 10000, '2022-01-27 05:45:52', 1, 0, 3, 'X'),
(112, NULL, 22, 10000, '2022-01-27 05:48:02', 1, 0, 3, 'X'),
(113, NULL, 22, 10000, '2022-01-27 05:49:59', 1, 0, 3, 'X'),
(114, NULL, 21, 100000, '2022-01-27 05:51:51', 1, 233, 3, 'O'),
(115, 58, 21, 100000, '2022-01-27 05:57:28', 1, 234, NULL, 'O'),
(116, 58, 23, 10000, '2022-01-27 05:57:28', 1, 234, NULL, 'O'),
(117, 58, 23, 10000, '2022-01-27 05:57:28', 1, 234, NULL, 'O');

-- --------------------------------------------------------

--
-- テーブルの構造 `tblloai`
--

CREATE TABLE `tblloai` (
  `idLoai` int(11) NOT NULL,
  `tenLoai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tblloai`
--

INSERT INTO `tblloai` (`idLoai`, `tenLoai`) VALUES
(36, 'Nước ngọt'),
(37, 'Ăn vặt'),
(38, 'Cafe'),
(39, 'Kem');

-- --------------------------------------------------------

--
-- テーブルの構造 `tblmon`
--

CREATE TABLE `tblmon` (
  `idMon` int(11) NOT NULL,
  `tenMon` text NOT NULL,
  `gia` double NOT NULL,
  `idLoai` int(11) NOT NULL,
  `hinhAnh` text DEFAULT NULL,
  `moTa` text DEFAULT NULL,
  `goiY` float DEFAULT NULL,
  `conHang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tblmon`
--

INSERT INTO `tblmon` (`idMon`, `tenMon`, `gia`, `idLoai`, `hinhAnh`, `moTa`, `goiY`, `conHang`) VALUES
(19, 'Bánh tráng', 10000, 37, 'thumbcmscn-1200x676-14.jpg', '<p><strong>B&aacute;n tr&aacute;ng </strong>1</p>\r\n\r\n<p><strong>Trứng c&uacute;t</strong> 0.1</p>\r\n\r\n<p><strong>Muối</strong> 0.01</p>\r\n\r\n<p>&nbsp;</p>\r\n', 30, 'Hết'),
(20, 'CoCa', 10000, 36, 'vdf.jpg', '', 30, 'Còn'),
(21, 'Thịt nướng', 100000, 37, '01_bbq_quantity.jpg', '<p>lấy thịth, <strong>rửa sạch, &uacute;p gia vị, nướng l&ecirc;n</strong></p>\r\n', 25, 'Còn'),
(22, 'Nước mía', 10000, 34, 'fnfh.jpg', '', 30, 'Còn'),
(23, 'Sakura Cafe', 10000, 33, 'cafesua.jpg', '', 0, 'Còn'),
(24, 'Kem chuối', 15000, 32, 'kemchuoi.jpg', '', 30, 'Còn'),
(25, 'Bánh tráng cuối', 15000, 37, 'cach-lam-banh-trang-bo-thom-ngon-cuc-de-lam-202107311752194866.jpg', '', 30, 'Còn');

-- --------------------------------------------------------

--
-- テーブルの構造 `tblreport`
--

CREATE TABLE `tblreport` (
  `idReport` int(11) NOT NULL,
  `hoTenNV` text DEFAULT NULL,
  `vanDe` text NOT NULL,
  `thoiGian` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tblreport`
--

INSERT INTO `tblreport` (`idReport`, `hoTenNV`, `vanDe`, `thoiGian`) VALUES
(1, 'ehberg', '<p>hbtrb</p>\r\n', '2022-01-22 07:47:36'),
(2, '', '<p>tfgbdb gvgd</p>\r\n', '2022-01-22 07:47:47'),
(3, '', '<p>&nbsp;bdfbg db fd ds&nbsp;</p>\r\n', '2022-01-27 03:08:31');

-- --------------------------------------------------------

--
-- テーブルの構造 `tblstaff`
--

CREATE TABLE `tblstaff` (
  `idStaff` int(11) NOT NULL,
  `hoTen` text NOT NULL,
  `soDT` int(10) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `diachi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tblstaff`
--

INSERT INTO `tblstaff` (`idStaff`, `hoTen`, `soDT`, `username`, `password`, `diachi`) VALUES
(3, 'Trần Tiến Đú', 101010101, 'dutt', '1111', 'Rabbit House'),
(4, 'Nguyễn Minh Quân', 101010101, 'quannm', 'password', 'Rabbit House');

-- --------------------------------------------------------

--
-- テーブルの構造 `tblusers`
--

CREATE TABLE `tblusers` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `hoTen` text NOT NULL,
  `soDT` int(10) NOT NULL,
  `diachi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tblusers`
--

INSERT INTO `tblusers` (`id_user`, `username`, `password`, `hoTen`, `soDT`, `diachi`) VALUES
(1, 'admin', '1111', 'Nguyễn Văn Bách', 901234567, 'Rabbit House'),
(27, 'hungnv', '1111', 'Nguyễn Văn Hùng', 904567890, 'Rabbit House');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `sensordata`
--
ALTER TABLE `sensordata`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `tblchitiethd`
--
ALTER TABLE `tblchitiethd`
  ADD PRIMARY KEY (`idChiTiet`);

--
-- テーブルのインデックス `tbldoanhthu`
--
ALTER TABLE `tbldoanhthu`
  ADD PRIMARY KEY (`idDoanhThu`);

--
-- テーブルのインデックス `tblhoadon`
--
ALTER TABLE `tblhoadon`
  ADD PRIMARY KEY (`iHhoadon`);

--
-- テーブルのインデックス `tblkhachhang`
--
ALTER TABLE `tblkhachhang`
  ADD PRIMARY KEY (`idKhachhang`);

--
-- テーブルのインデックス `tblkho`
--
ALTER TABLE `tblkho`
  ADD PRIMARY KEY (`idKho`);

--
-- テーブルのインデックス `tblkhuyenmai`
--
ALTER TABLE `tblkhuyenmai`
  ADD PRIMARY KEY (`idKM`);

--
-- テーブルのインデックス `tbllichsu`
--
ALTER TABLE `tbllichsu`
  ADD PRIMARY KEY (`idlichSu`);

--
-- テーブルのインデックス `tblloai`
--
ALTER TABLE `tblloai`
  ADD PRIMARY KEY (`idLoai`);

--
-- テーブルのインデックス `tblmon`
--
ALTER TABLE `tblmon`
  ADD PRIMARY KEY (`idMon`),
  ADD UNIQUE KEY `hinhAnh` (`idMon`);

--
-- テーブルのインデックス `tblreport`
--
ALTER TABLE `tblreport`
  ADD PRIMARY KEY (`idReport`);

--
-- テーブルのインデックス `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`idStaff`);

--
-- テーブルのインデックス `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id_user`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `sensordata`
--
ALTER TABLE `sensordata`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- テーブルの AUTO_INCREMENT `tblchitiethd`
--
ALTER TABLE `tblchitiethd`
  MODIFY `idChiTiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- テーブルの AUTO_INCREMENT `tbldoanhthu`
--
ALTER TABLE `tbldoanhthu`
  MODIFY `idDoanhThu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- テーブルの AUTO_INCREMENT `tblhoadon`
--
ALTER TABLE `tblhoadon`
  MODIFY `iHhoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- テーブルの AUTO_INCREMENT `tblkhachhang`
--
ALTER TABLE `tblkhachhang`
  MODIFY `idKhachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- テーブルの AUTO_INCREMENT `tblkho`
--
ALTER TABLE `tblkho`
  MODIFY `idKho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `tblkhuyenmai`
--
ALTER TABLE `tblkhuyenmai`
  MODIFY `idKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `tbllichsu`
--
ALTER TABLE `tbllichsu`
  MODIFY `idlichSu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- テーブルの AUTO_INCREMENT `tblloai`
--
ALTER TABLE `tblloai`
  MODIFY `idLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- テーブルの AUTO_INCREMENT `tblmon`
--
ALTER TABLE `tblmon`
  MODIFY `idMon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- テーブルの AUTO_INCREMENT `tblreport`
--
ALTER TABLE `tblreport`
  MODIFY `idReport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `idStaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
