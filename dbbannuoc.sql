-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2022 at 12:14 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbannuoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

DROP TABLE IF EXISTS `baiviet`;
CREATE TABLE IF NOT EXISTS `baiviet` (
  `id_bv` varchar(15) NOT NULL,
  `tenbaiviet` varchar(100) NOT NULL,
  `noidung` varchar(100) NOT NULL,
  `ngayviet` date NOT NULL,
  `gioviet` time NOT NULL,
  `id_nguoidung` varchar(15) NOT NULL,
  PRIMARY KEY (`id_bv`),
  KEY `ngd_bv` (`id_nguoidung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`id_bv`, `tenbaiviet`, `noidung`, `ngayviet`, `gioviet`, `id_nguoidung`) VALUES
('bv1', 'mùa xuân', '123', '2021-09-01', '15:04:00', 'ngd2'),
('bv5', 'mùa xuân', '<p>hane</p>\r\n', '2022-01-02', '17:46:00', 'ngd42');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `id_dh` varchar(15) NOT NULL,
  `id_sp` varchar(15) NOT NULL,
  `gia` double NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`id_dh`,`id_sp`),
  KEY `ctdh_sp` (`id_sp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_dh`, `id_sp`, `gia`, `soluong`) VALUES
('dh9400', 'sp2', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `id_dm` varchar(15) NOT NULL,
  `tendanhmuc` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `tendanhmuc`) VALUES
('dm1', 'Trà'),
('dm2', 'Coffee'),
('dm3', 'Bánh');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `id_dh` varchar(15) NOT NULL,
  `ngaylap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `giogiao` time NOT NULL,
  `tennguoinhan` varchar(50) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `noigiao` varchar(100) NOT NULL,
  `thanhtien` double NOT NULL,
  `trangthaithanhtoan` tinyint(1) NOT NULL,
  `hinhthucthanhtoan` tinyint(1) NOT NULL,
  `id_nguoidung` varchar(15) NOT NULL,
  PRIMARY KEY (`id_dh`),
  KEY `nguoidung_dh` (`id_nguoidung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id_dh`, `ngaylap`, `giogiao`, `tennguoinhan`, `sdt`, `noigiao`, `thanhtien`, `trangthaithanhtoan`, `hinhthucthanhtoan`, `id_nguoidung`) VALUES
('dh9400', '2022-01-11 21:57:10', '14:57:10', 'Hoàng Ngọc Hà', '0399161596', 'hcm', 1.8, 0, 0, 'ngd42');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `id_ngd` varchar(15) NOT NULL,
  `tennguoidung` varchar(50) NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sdt` char(11) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `hoatdong` tinyint(1) NOT NULL DEFAULT '1',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `maxacthuc` varchar(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ngd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id_ngd`, `tennguoidung`, `gioitinh`, `email`, `password`, `sdt`, `diachi`, `hoatdong`, `admin`, `maxacthuc`) VALUES
('ngd2', 'Lê Thịnh', 1, 'thinhbk00@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '112345678', 'Cần Giờ', 1, 1, '0'),
('ngd42', 'Hoàng Hà', 1, 'rescuesweetsilbi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0399161596', 'Hồ Chí Minh', 1, 0, '0'),
('ngd5', 'Hoàng Hà', 1, 'ngocha1999.hh@gmail.com', 'bdff99119c31715c47449e2996b04f87', '0399161596', 'HCM', 1, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id_sp` varchar(15) NOT NULL,
  `hinh` varchar(20) NOT NULL,
  `tensanpham` varchar(50) NOT NULL,
  `thongtin` text NOT NULL,
  `gia` double NOT NULL,
  `id_danhmuc` varchar(15) NOT NULL,
  PRIMARY KEY (`id_sp`),
  KEY `dm_sp` (`id_danhmuc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `hinh`, `tensanpham`, `thongtin`, `gia`, `id_danhmuc`) VALUES
('sp1', 'img-02.jpg', 'Trà Đào', '<p><em>Vị thanh ngọt của đ&agrave;o Hy Lạp, vị chua dịu của Cam V&agrave;ng nguy&ecirc;n vỏ, vị ch&aacute;t của tr&agrave; đen tươi được ủ mới mỗi 4 tiếng, c&ugrave;ng hương thơm nồng đặc trưng của sả ch&iacute;nh l&agrave; điểm s&aacute;ng l&agrave;m n&ecirc;n sức hấp dẫn của thức uống n&agrave;y.</em></p>\r\n', 2, 'dm1'),
('sp2', 'img-08.jpg', 'Capuchino', '<p><em>Một sự kết hợp tinh tế giữa vị đắng c&agrave; ph&ecirc; Espresso nguy&ecirc;n chất h&ograve;a quyện c&ugrave;ng vị sữa n&oacute;ng ngọt ng&agrave;o, b&ecirc;n tr&ecirc;n l&agrave; một lớp kem mỏng nhẹ tạo n&ecirc;n một t&aacute;ch c&agrave; ph&ecirc; ho&agrave;n hảo về hương vị lẫn nh&atilde;n quan.</em></p>\r\n', 2, 'dm2'),
('sp3', 'img-01.jpg', 'Bánh Tiramisu Trà Xanh', '<p><em>B&aacute;nh tiramisu tr&agrave; xanh c&oacute; cốt b&aacute;nh b&ocirc;ng lan mềm mịn, đậm vị v&agrave; thơm m&ugrave;i đặc trưng từ bột tr&agrave; xanh. Điểm cộng lớn nhất phải n&oacute;i đến đ&oacute; ch&iacute;nh l&agrave; lớp kem ph&ocirc; mai mướt mịn, ăn v&agrave;o b&eacute;o ngọt, cực kỳ ngon miệng.</em></p>\r\n', 2.5, 'dm3'),
('sp4', 'img-04.jpg', 'Cà Phê Đen', '<p><em>100% hạt cafe robusta, hương vị đậm đ&agrave; thuần Việt. C&aacute;c hạt cafe robusta được TH Coffee chọn để phục vụ tới qu&yacute; kh&aacute;ch h&agrave;ng l&agrave; những hạt đ&atilde; được chọn lọc v&agrave; xử l&yacute; rang xay ở mức độ ph&ugrave; hợp với ti&ecirc;u ch&iacute; mạnh mẽ, đậm đ&agrave;. 100% cafe nguy&ecirc;n chất tr&ograve;n vị.</em></p>\r\n', 1, 'dm2'),
('sp5', 'img-05.jpg', 'Bánh Mì Chà Bông', '<p><em>Chiếc b&aacute;nh với lớp ph&ocirc; mai v&agrave;ng s&aacute;nh mịn b&ecirc;n trong, được bọc ngo&agrave;i lớp vỏ xốp mềm thơm lừng. Th&ecirc;m lớp ch&agrave; b&ocirc;ng mằn mặn hấp dẫn b&ecirc;n tr&ecirc;n.</em></p>\r\n', 2, 'dm3'),
('sp6', 'img-03.jpg', 'Trà Phúc Bồn Tử', '<p><em>Tr&agrave; ph&uacute;c bồn tử, c&ograve;n gọi l&agrave;&nbsp;tr&agrave;&nbsp;m&acirc;m x&ocirc;i, l&agrave; một loại thức uống kết hợp giữa&nbsp;tr&agrave;&nbsp;v&agrave;&nbsp;ph&uacute;c bồn tử. Ch&uacute;ng c&oacute; hương vị chua hoặc ngọt đậm hơn t&ugrave;y theo những quả&nbsp;ph&uacute;c bồn tử</em></p>\r\n', 1.5, 'dm1'),
('sp7', 'img-06.jpg', 'Trà Đào Sữa', '<p><em>M&oacute;n tr&agrave; sữa đ&agrave;o thơm lừng m&agrave;u sắc thật đẹp. Miếng đ&agrave;o gi&ograve;n gi&ograve;n, ăn k&egrave;m thạch rau c&acirc;u m&aacute;t lạnh, nước tr&agrave; sữa thơm b&eacute;o. Thức uống giải nhiệt m&ugrave;a h&egrave; cực kỳ hiệu quả&nbsp;</em></p>\r\n', 1.5, 'dm1'),
('sp8', 'img-07.jpg', 'Bánh Bông Lan', '<p><em>B&aacute;nh b&ocirc;ng lan trứng muối l&agrave; sự kết hợp ho&agrave;n hảo đến kh&ocirc;ng ngờ, l&agrave; sự ho&agrave; quyện giữa vị ngọt dịu của vỏ b&aacute;nh b&ocirc;ng lan với vị mằn mặn của trứng muối.</em></p>\r\n', 2, 'dm3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `ngd_bv` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_ngd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `ctdh_dh` FOREIGN KEY (`id_dh`) REFERENCES `donhang` (`id_dh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctdh_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `nguoidung_dh` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_ngd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `dm_sp` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_dm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
