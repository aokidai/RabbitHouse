DROP TABLE IF EXISTS backupdata;

CREATE TABLE `backupdata` (
  `idBackup` int(11) NOT NULL AUTO_INCREMENT,
  `tenFile` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idBackup`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO backupdata VALUES("1","db-backup-1647737554-cbb0c0211b0e052851619816754c0426.sql"),
("2","db-backup-1647738474-cbb0c0211b0e052851619816754c0426.sql"),
("3","db-backup-1648166970-cbb0c0211b0e052851619816754c0426.sql"),
("4","db-backup-1648166991-cbb0c0211b0e052851619816754c0426.sql"),
("5","db-backup-1648167048-cbb0c0211b0e052851619816754c0426.sql");



DROP TABLE IF EXISTS sensordata;

CREATE TABLE `sensordata` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `sensor` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `value1` float DEFAULT NULL,
  `value2` float DEFAULT NULL,
  `time_act` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mua` text DEFAULT NULL,
  `dudoanmua` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO sensordata VALUES("1","DHT11","RabbitHouse","26.1","88","2021-09-05 14:52:24","Khong co mua","CÃ³ mÆ°a"),
("2","DHT11","RabbitHouse","26.2","88","2021-09-05 14:52:54","Khong co mua","CÃ³ mÆ°a"),
("3","DHT11","RabbitHouse","33.8","83","2021-09-05 14:54:39","Khong co mua","KhÃ´ng mÆ°a"),
("4","DHT11","RabbitHouse","33.9","83","2021-09-05 14:56:26","Khong co mua","KhÃ´ng mÆ°a"),
("5","DHT11","RabbitHouse","29.9","71","2021-09-05 14:57:02","Khong co mua","KhÃ´ng mÆ°a"),
("6","DHT11","RabbitHouse","29.9","71","2021-09-05 14:57:44","Khong co mua","KhÃ´ng mÆ°a"),
("7","DHT11","RabbitHouse","29.1","74","2021-09-05 14:57:52","Khong co mua","KhÃ´ng mÆ°a"),
("8","DHT11","RabbitHouse","29","74","2021-09-05 14:57:59","Khong co mua","KhÃ´ng mÆ°a"),
("9","DHT11","RabbitHouse","28.9","75","2021-09-05 14:58:07","Khong co mua","KhÃ´ng mÆ°a"),
("10","DHT11","RabbitHouse","28.7","76","2021-09-05 14:58:15","Khong co mua","KhÃ´ng mÆ°a"),
("11","DHT11","RabbitHouse","28.6","76","2021-09-05 14:58:23","Khong co mua","KhÃ´ng mÆ°a"),
("12","DHT11","RabbitHouse","28.5","77","2021-09-05 14:58:30","Khong co mua","KhÃ´ng mÆ°a"),
("13","DHT11","RabbitHouse","28.4","77","2021-09-05 14:58:38","Khong co mua","KhÃ´ng mÆ°a"),
("14","DHT11","RabbitHouse","28.3","78","2021-09-05 14:58:46","Khong co mua","KhÃ´ng mÆ°a"),
("15","DHT11","RabbitHouse","28.2","78","2021-09-05 14:58:54","Khong co mua","KhÃ´ng mÆ°a"),
("16","DHT11","RabbitHouse","28.1","78","2021-09-05 14:59:01","Khong co mua","KhÃ´ng mÆ°a"),
("17","DHT11","RabbitHouse","28","79","2021-09-05 14:59:09","Khong co mua","KhÃ´ng mÆ°a"),
("18","DHT11","RabbitHouse","27.9","79","2021-09-05 14:59:17","Khong co mua","KhÃ´ng mÆ°a"),
("19","DHT11","RabbitHouse","27.9","79","2021-09-05 14:59:25","Khong co mua","KhÃ´ng mÆ°a"),
("20","DHT11","RabbitHouse","27.8","80","2021-09-05 14:59:32","Khong co mua","KhÃ´ng mÆ°a"),
("21","DHT11","RabbitHouse","27.7","80","2021-09-05 14:59:40","Khong co mua","KhÃ´ng mÆ°a"),
("22","DHT11","RabbitHouse","27.7","80","2021-09-05 14:59:48","Khong co mua","KhÃ´ng mÆ°a"),
("23","DHT11","RabbitHouse","27.6","80","2021-09-05 14:59:55","Khong co mua","KhÃ´ng mÆ°a"),
("24","DHT11","RabbitHouse","27.5","80","2021-09-05 15:00:03","Khong co mua","KhÃ´ng mÆ°a"),
("25","DHT11","RabbitHouse","27.4","81","2021-09-05 15:00:11","Khong co mua","CÃ³ mÆ°a");



DROP TABLE IF EXISTS tblchamcong;

CREATE TABLE `tblchamcong` (
  `idChamCong` int(11) NOT NULL AUTO_INCREMENT,
  `idNhanVien` int(11) NOT NULL,
  `TGVao` datetime NOT NULL,
  `TGRa` datetime DEFAULT NULL,
  `TongLuong` int(11) NOT NULL,
  `tongTG` int(11) DEFAULT NULL,
  PRIMARY KEY (`idChamCong`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tblchamcong VALUES("8","3","2022-02-24 07:09:33","2022-02-24 07:09:41","6667","0"),
("9","3","2022-02-24 07:14:28","0000-00-00 00:00:00","0","0"),
("10","3","2022-03-15 14:35:00","0000-00-00 00:00:00","0","0"),
("11","3","2022-03-16 06:54:22","2022-03-16 07:29:18","1746667","35"),
("12","3","2022-03-16 07:29:23","2022-03-16 07:45:15","793333","16"),
("13","3","2022-03-16 07:47:12","2022-03-16 07:48:06","45000","1"),
("14","3","2022-03-17 06:53:54","2022-03-17 07:16:23","1124167","22"),
("15","3","2022-03-17 07:16:33","2022-03-17 07:40:02","1174167","23"),
("16","3","2022-03-17 08:08:30","0000-00-00 00:00:00","0","0"),
("17","3","2022-03-17 08:11:08","2022-03-17 08:14:19","159167","3"),
("18","3","2022-03-19 09:07:43","0000-00-00 00:00:00","0","0"),
("19","3","2022-03-20 20:53:54","0000-00-00 00:00:00","0","0"),
("20","3","2022-03-20 21:01:01","2022-03-20 21:03:13","110000","2"),
("21","3","2022-03-21 18:56:08","0000-00-00 00:00:00","0","0"),
("22","3","2022-03-21 19:14:43","0000-00-00 00:00:00","0","0"),
("23","3","2022-03-22 08:03:39","2022-03-22 08:03:59","0","0"),
("24","3","2022-03-22 08:33:12","0000-00-00 00:00:00","0","0"),
("25","3","2022-03-23 07:42:46","0000-00-00 00:00:00","0","0");



DROP TABLE IF EXISTS tblchitiethd;

CREATE TABLE `tblchitiethd` (
  `idChiTiet` int(11) NOT NULL AUTO_INCREMENT,
  `idKhachhang` int(11) DEFAULT NULL,
  `tongSL` int(11) NOT NULL,
  `tongTien` int(11) NOT NULL,
  `ngayThang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `diaChiGH` text DEFAULT NULL,
  `daGH` text DEFAULT NULL,
  `idMon` int(11) DEFAULT NULL,
  `idStaff` int(11) DEFAULT NULL,
  PRIMARY KEY (`idChiTiet`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblchitiethd VALUES("228","58","1","10000","2022-01-26 10:30:00","Osaka, Osaka, Japan","X","23","0"),
("229","0","1","10000","2022-01-27 12:45:52","Rabbit House","X","22","3"),
("230","0","1","20000","2022-02-09 08:31:13","Rabbit House","O","22","3"),
("231","0","1","10000","2022-02-09 08:31:13","Rabbit House","O","22","3"),
("232","0","1","10000","2022-02-09 08:31:13","Rabbit House","O","22","3"),
("233","0","1","100000","2022-01-27 12:51:37","Rabbit House","O","21","3"),
("234","58","1","100000","2022-01-27 12:57:28","Osaka, Osaka, Japan","O","21","0"),
("235","58","1","110000","2022-01-27 12:57:28","Osaka, Osaka, Japan","O","23","0"),
("236","58","1","120000","2022-01-27 12:57:28","Osaka, Osaka, Japan","O","23","0"),
("237","58","1","10000","2022-03-15 10:01:25","Osaka, Osaka, Japan","X","23","0"),
("238","58","1","20000","2022-03-15 10:01:25","Osaka, Osaka, Japan","X","23","0"),
("239","58","1","10000","2022-03-15 14:25:39","Osaka, Osaka, Japan","X","23","0"),
("240","58","1","20000","2022-03-15 14:25:39","Osaka, Osaka, Japan","X","23","0"),
("241","0","1","10000","2022-03-16 07:31:36","Rabbit House","O","22","3"),
("242","0","1","110000","2022-03-16 07:31:36","Rabbit House","O","21","3"),
("243","0","1","210000","2022-03-16 07:31:36","Rabbit House","O","21","3"),
("244","58","1","100000","2022-03-16 07:46:36","Osaka, Osaka, Japan","X","21","0"),
("245","58","1","200000","2022-03-16 07:46:36","Osaka, Osaka, Japan","X","21","0"),
("246","0","1","100000","2022-03-16 07:47:20","Rabbit House","X","19","3"),
("247","0","1","100000","2022-03-16 07:47:20","Rabbit House","X","21","3"),
("248","58","1","100000","2022-03-16 07:50:07","Osaka, Osaka, Japan","X","22","0"),
("249","58","1","100000","2022-03-16 07:50:07","Osaka, Osaka, Japan","X","21","0"),
("250","58","1","100000","2022-03-21 19:14:56","Osaka, Osaka, Japan","O","21","0");



DROP TABLE IF EXISTS tbldoanhthu;

CREATE TABLE `tbldoanhthu` (
  `idDoanhThu` int(11) NOT NULL AUTO_INCREMENT,
  `idChiTiet` int(11) NOT NULL,
  `ngay` date NOT NULL DEFAULT current_timestamp(),
  `thanhTien` int(11) NOT NULL,
  `tongSL` int(11) DEFAULT NULL,
  `ngayXK` datetime DEFAULT NULL,
  `tongTienXK` float DEFAULT NULL,
  PRIMARY KEY (`idDoanhThu`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbldoanhthu VALUES("1","180","0000-00-00","100000","0","0000-00-00 00:00:00","0"),
("2","181","0000-00-00","10000","0","0000-00-00 00:00:00","0"),
("3","182","0000-00-00","10000","0","0000-00-00 00:00:00","0"),
("4","2","0000-00-00","10000","0","0000-00-00 00:00:00","0"),
("5","185","2021-10-30","10000","0","0000-00-00 00:00:00","0"),
("6","186","2021-10-30","10000","0","0000-00-00 00:00:00","0"),
("7","187","2021-10-30","10000","0","0000-00-00 00:00:00","0"),
("8","188","2021-10-30","30000","3","0000-00-00 00:00:00","0"),
("9","189","2021-11-02","15000","1","0000-00-00 00:00:00","0"),
("10","190","2021-11-02","500000","5","0000-00-00 00:00:00","0"),
("11","192","2021-11-02","150000","15","0000-00-00 00:00:00","0"),
("12","192","2021-11-02","150000","15","0000-00-00 00:00:00","0"),
("13","193","2021-11-06","60000","4","0000-00-00 00:00:00","0"),
("14","195","2021-11-13","110000","2","0000-00-00 00:00:00","0"),
("15","197","2021-11-13","20000","2","0000-00-00 00:00:00","0"),
("16","197","2021-11-13","20000","2","0000-00-00 00:00:00","0"),
("17","203","2021-11-27","200000","1","0000-00-00 00:00:00","0"),
("18","207","2021-11-27","20000","1","0000-00-00 00:00:00","0"),
("19","207","2021-11-27","20000","1","0000-00-00 00:00:00","0"),
("20","210","2021-12-12","10000","1","0000-00-00 00:00:00","0"),
("21","219","2022-01-21","10000","1","0000-00-00 00:00:00","0"),
("22","0","2022-01-21","100000","1","0000-00-00 00:00:00","0"),
("23","0","2022-01-21","10000","1","0000-00-00 00:00:00","0"),
("24","0","2022-01-21","100000","1","0000-00-00 00:00:00","0"),
("25","223","2022-01-22","10000","1","0000-00-00 00:00:00","0"),
("26","224","2022-01-22","10000","1","0000-00-00 00:00:00","0"),
("27","2","2022-01-25","0","0","0000-00-00 00:00:00","0"),
("28","227","2022-01-25","10000","1","0000-00-00 00:00:00","0"),
("29","233","2022-01-27","100000","1","0000-00-00 00:00:00","0"),
("30","236","2022-01-27","120000","1","0000-00-00 00:00:00","0"),
("31","236","2022-01-27","120000","1","0000-00-00 00:00:00","0"),
("32","236","2022-01-27","120000","1","0000-00-00 00:00:00","0"),
("33","230","2022-02-09","120000","1","0000-00-00 00:00:00","0"),
("34","231","2022-02-09","120000","1","0000-00-00 00:00:00","0"),
("35","232","2022-02-09","120000","1","0000-00-00 00:00:00","0"),
("36","241","2022-03-16","210000","1","0000-00-00 00:00:00","0"),
("37","242","2022-03-16","210000","1","0000-00-00 00:00:00","0"),
("38","243","2022-03-16","210000","1","0000-00-00 00:00:00","0"),
("39","250","2022-03-21","100000","1","0000-00-00 00:00:00","0");



DROP TABLE IF EXISTS tbldoanhthukho;

CREATE TABLE `tbldoanhthukho` (
  `idDTK` int(11) NOT NULL AUTO_INCREMENT,
  `ngayXK` date NOT NULL,
  `thanhTien` float NOT NULL,
  `idKho` int(11) NOT NULL,
  PRIMARY KEY (`idDTK`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbldoanhthukho VALUES("29","2022-03-16","1000","30"),
("31","2022-03-16","1000","31"),
("33","2022-03-19","100000","2"),
("34","2022-03-19","10000","3");



DROP TABLE IF EXISTS tblhoadon;

CREATE TABLE `tblhoadon` (
  `iHhoadon` int(11) NOT NULL AUTO_INCREMENT,
  `idKhachhang` int(11) NOT NULL,
  `idMon` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `ThanhTien` double DEFAULT NULL,
  `ngayThang` timestamp NULL DEFAULT NULL,
  `idstaff` int(11) DEFAULT NULL,
  PRIMARY KEY (`iHhoadon`)
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblhoadon VALUES("177","0","21","1","100000","2021-11-06 00:00:00","0"),
("196","3","22","1","10000","2022-01-19 08:45:35","0"),
("238","0","21","1","100000","2022-03-20 00:00:00","0"),
("240","58","23","1","10000","2022-03-22 08:27:00","0"),
("241","58","19","1","10000","2022-03-22 08:27:14","0"),
("242","58","24","2","30000","2022-03-22 08:27:25","0"),
("243","0","22","2","20000","2022-03-22 08:52:40","3"),
("244","0","19","1","10000","2022-03-22 08:52:49","3");



DROP TABLE IF EXISTS tblkhachhang;

CREATE TABLE `tblkhachhang` (
  `idKhachhang` int(11) NOT NULL AUTO_INCREMENT,
  `tenKH` text NOT NULL,
  `SDT` text DEFAULT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `diachi` text DEFAULT NULL,
  PRIMARY KEY (`idKhachhang`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblkhachhang VALUES("5","Kawasaki Sakura","4547645875","Sunny_Sakura","1111",""),
("58","Kawasaki Sakura","0901234567","sakura","1111","Osaka, Osaka, Japan"),
("62","Ibuki Nagisa","0901234567","nagi_0803","1111","Nagisa");



DROP TABLE IF EXISTS tblkho;

CREATE TABLE `tblkho` (
  `idKho` int(11) NOT NULL AUTO_INCREMENT,
  `tenHang` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soLuongBD` int(11) NOT NULL,
  `soLuongCL` int(11) NOT NULL,
  `thoiGianNK` datetime NOT NULL,
  `thoiGianXK` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `soTien` int(11) DEFAULT NULL,
  PRIMARY KEY (`idKho`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblkho VALUES("2","Cafe xay sẳn","10","8","2022-01-24 08:43:09","2022-03-19 10:36:53","1","110000"),
("3","Bánh tráng","10","9","2022-01-24 09:06:05","2022-03-19 10:36:53","1","100000"),
("4","Trứng cút","10","10","2022-01-24 09:06:17","2022-02-24 07:26:10","1","100000"),
("5","CoCa","10","10","2022-01-24 09:06:34","2022-02-24 07:26:10","1","1000000"),
("6","Thịt + đồ nướng","10","10","2022-01-24 09:07:30","2022-02-24 07:29:31","1","1000000"),
("7","Muối","10","10","2022-01-24 09:07:42","0000-00-00 00:00:00","1","100000"),
("8","Đường","10","10","2022-01-24 09:07:51","0000-00-00 00:00:00","1","100000"),
("9","Chuối","10","10","2022-01-24 09:08:06","0000-00-00 00:00:00","1","100000"),
("10","Mía","10","10","2022-01-24 09:08:12","0000-00-00 00:00:00","1","100000"),
("11","Dừa","10","10","2022-01-24 09:08:18","0000-00-00 00:00:00","1","100000"),
("12","hạt nêm","10","10","2022-02-11 09:31:50","0000-00-00 00:00:00","1","100000"),
("13","mì chính","10","10","2022-02-11 09:35:25","0000-00-00 00:00:00","1","100000"),
("14","Nước ngọt","10","10","2022-02-13 11:30:46","0000-00-00 00:00:00","1","100000"),
("95","Hạt tiêu\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00","1","10000"),
("96","Rau nguồi tây\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00","1","10000"),
("97","Đường thẻ\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00","1","10000"),
("98","Sửa đặt\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00","1","100000"),
("99","Cafe xay sẳn","10","8","2022-01-24 08:43:09","2022-03-19 10:36:53","0",""),
("100","Bánh tráng","10","9","2022-01-24 09:06:05","2022-03-19 10:36:53","0",""),
("101","Trứng cút","10","10","2022-01-24 09:06:17","2022-02-24 07:26:10","0",""),
("102","CoCa","10","10","2022-01-24 09:06:34","2022-02-24 07:26:10","0",""),
("103","Thịt + đồ nướng","10","10","2022-01-24 09:07:30","2022-02-24 07:29:31","0",""),
("104","Muối","10","10","2022-01-24 09:07:42","0000-00-00 00:00:00","0",""),
("105","Đường","10","10","2022-01-24 09:07:51","0000-00-00 00:00:00","0",""),
("106","Chuối","10","10","2022-01-24 09:08:06","0000-00-00 00:00:00","0",""),
("107","Mía","10","10","2022-01-24 09:08:12","0000-00-00 00:00:00","0",""),
("108","Dừa","10","10","2022-01-24 09:08:18","0000-00-00 00:00:00","0",""),
("109","hạt nêm","10","10","2022-02-11 09:31:50","0000-00-00 00:00:00","0",""),
("110","mì chính","10","10","2022-02-11 09:35:25","0000-00-00 00:00:00","0",""),
("111","Nước ngọt","10","10","2022-02-13 11:30:46","0000-00-00 00:00:00","0",""),
("112","Hạt tiêu\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00","0",""),
("113","Rau nguồi tây\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00","0",""),
("114","Đường thẻ\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00","0",""),
("115","Sửa đặt\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00","0","");



DROP TABLE IF EXISTS tblkhotmp;

CREATE TABLE `tblkhotmp` (
  `idkhotmp` int(11) NOT NULL AUTO_INCREMENT,
  `tenFile` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idkhotmp`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS tblkhuyenmai;

CREATE TABLE `tblkhuyenmai` (
  `idKM` int(11) NOT NULL AUTO_INCREMENT,
  `idKhachhang` int(11) DEFAULT NULL,
  `khuyenMai` int(11) NOT NULL,
  `tichLuy` int(11) DEFAULT NULL,
  `tenKM` text NOT NULL,
  `thoiGianBD` datetime NOT NULL,
  `thoiGianKT` datetime NOT NULL,
  PRIMARY KEY (`idKM`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;




DROP TABLE IF EXISTS tbllichsu;

CREATE TABLE `tbllichsu` (
  `idlichSu` int(11) NOT NULL AUTO_INCREMENT,
  `idKhachhang` int(11) DEFAULT NULL,
  `idMon` int(11) NOT NULL,
  `gia` double NOT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `soluong` int(11) DEFAULT NULL,
  `idChitiet` int(11) DEFAULT NULL,
  `idStaff` int(11) DEFAULT NULL,
  `daGH` text DEFAULT NULL,
  PRIMARY KEY (`idlichSu`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbllichsu VALUES("10","0","23","20000","2021-10-08 13:52:46","2","0","0",""),
("23","0","21","100000","2021-10-10 06:53:38","1","0","0",""),
("24","0","21","100000","2021-10-10 07:11:07","1","0","0",""),
("25","59","23","190000","2021-10-17 17:37:05","19","0","0",""),
("32","0","23","10000","2021-10-23 14:33:06","1","0","0",""),
("37","0","19","10000","2021-10-24 07:21:55","0","0","0",""),
("38","0","23","10000","2021-10-24 07:22:40","0","0","0",""),
("75","63","23","10000","2021-11-13 07:48:54","1","0","0",""),
("76","63","21","100000","2021-11-13 07:48:54","1","0","0",""),
("77","63","23","10000","2021-11-13 07:52:14","1","0","0",""),
("78","63","22","10000","2021-11-13 07:52:14","1","0","0",""),
("79","63","20","10000","2021-11-13 07:54:18","1","0","0",""),
("80","63","19","10000","2021-11-13 07:54:18","1","0","0",""),
("81","63","21","100000","2021-11-13 07:58:32","1","0","0",""),
("82","63","24","15000","2021-11-13 07:58:32","1","0","0",""),
("83","63","21","100000","2021-11-13 08:02:06","1","0","0",""),
("84","63","21","100000","2021-11-13 08:02:06","1","0","0",""),
("92","0","22","10000","2022-01-19 08:55:34","1","0","0",""),
("93","0","20","10000","2022-01-19 08:55:34","1","0","0",""),
("94","0","21","100000","2022-01-21 08:01:50","1","0","0",""),
("95","0","22","10000","2022-01-21 08:06:02","1","0","0",""),
("96","0","22","10000","2022-01-21 08:08:59","1","0","0",""),
("97","0","22","10000","2022-01-21 08:09:26","1","0","0",""),
("98","0","22","10000","2022-01-21 08:10:45","1","0","3",""),
("99","0","22","10000","2022-01-21 08:12:22","1","0","3",""),
("100","0","22","10000","2022-01-21 08:13:20","1","0","3",""),
("101","0","21","100000","2022-01-21 08:21:09","1","0","3",""),
("102","0","23","10000","2022-01-21 08:22:23","1","0","3",""),
("103","0","21","100000","2022-01-21 09:19:46","1","0","3",""),
("104","0","20","10000","2022-01-22 08:42:30","1","0","3",""),
("105","0","23","10000","2022-01-22 08:42:48","1","0","3",""),
("106","0","22","10000","2022-01-22 13:24:52","1","0","3",""),
("107","0","21","100000","2022-01-22 13:25:18","1","0","3",""),
("110","0","22","10000","2022-01-27 12:45:52","1","0","3","X"),
("111","0","22","10000","2022-01-27 12:45:52","1","0","3","X"),
("112","0","22","10000","2022-01-27 12:48:02","1","0","3","X"),
("113","0","22","10000","2022-01-27 12:49:59","1","0","3","X"),
("114","0","21","100000","2022-01-27 12:51:51","1","233","3","O"),
("115","58","21","100000","2022-01-27 12:57:28","1","234","0","O"),
("116","58","23","10000","2022-01-27 12:57:28","1","234","0","O"),
("117","58","23","10000","2022-01-27 12:57:28","1","234","0","O"),
("118","58","23","10000","2022-03-15 10:01:25","1","237","0","X"),
("119","58","23","10000","2022-03-15 10:01:25","1","237","0","X"),
("120","58","23","10000","2022-03-15 14:25:39","1","239","0","X"),
("121","58","23","10000","2022-03-15 14:25:39","1","239","0","X"),
("122","0","22","10000","2022-03-16 07:31:36","1","241","3","O"),
("123","0","21","100000","2022-03-16 07:31:36","1","241","3","O"),
("124","0","21","100000","2022-03-16 07:31:36","1","241","3","O"),
("125","58","21","100000","2022-03-16 07:46:36","1","244","0","X"),
("126","58","21","100000","2022-03-16 07:46:36","1","244","0","X"),
("127","0","19","10000","2022-03-16 07:47:20","1","246","3","X"),
("128","0","21","100000","2022-03-16 07:47:20","1","246","3","X"),
("129","58","22","10000","2022-03-16 07:50:07","1","248","0","X"),
("130","58","21","100000","2022-03-16 07:50:07","1","248","0","X"),
("131","58","21","100000","2022-03-21 19:14:56","1","250","0","O");



DROP TABLE IF EXISTS tblloai;

CREATE TABLE `tblloai` (
  `idLoai` int(11) NOT NULL AUTO_INCREMENT,
  `tenLoai` text NOT NULL,
  PRIMARY KEY (`idLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblloai VALUES("36","Nước ngọt"),
("37","Ăn vặt"),
("38","Cafe"),
("39","Kem"),
("40","");



DROP TABLE IF EXISTS tblluongnv;

CREATE TABLE `tblluongnv` (
  `idLuong` int(11) NOT NULL AUTO_INCREMENT,
  `luongCB` int(11) NOT NULL,
  `ngayLap` datetime NOT NULL,
  PRIMARY KEY (`idLuong`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tblluongnv VALUES("1","50000","2022-03-20 21:24:56");



DROP TABLE IF EXISTS tblmon;

CREATE TABLE `tblmon` (
  `idMon` int(11) NOT NULL AUTO_INCREMENT,
  `tenMon` text NOT NULL,
  `gia` double NOT NULL,
  `idLoai` int(11) NOT NULL,
  `hinhAnh` text DEFAULT NULL,
  `moTa` text DEFAULT NULL,
  `goiY` float DEFAULT NULL,
  `conHang` text NOT NULL,
  PRIMARY KEY (`idMon`),
  UNIQUE KEY `hinhAnh` (`idMon`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblmon VALUES("19","Bánh tráng","10000","37","thumbcmscn-1200x676-14.jpg","<p><strong>B&aacute;n tr&aacute;ng </strong>1</p>\n\n<p><strong>Trứng c&uacute;t</strong> 0.1</p>\n\n<p><strong>Muối</strong> 0.01</p>\n\n<p>&nbsp;</p>\n","30","O"),
("20","CoCa","10000","36","vdf.jpg","","30","X"),
("21","Thịt nướng","100000","37","01_bbq_quantity.jpg","<p>lấy thịth, <strong>rửa sạch, &uacute;p gia vị, nướng l&ecirc;n</strong></p>\n","25","O"),
("22","Nước mía","10000","36","fnfh.jpg","","30","O"),
("23","Sakura Cafe","10000","38","cafesua.jpg","","0","O"),
("24","Kem chuối","15000","39","kemchuoi.jpg","","30","O"),
("25","Bánh tráng cuối","15000","37","cach-lam-banh-trang-bo-thom-ngon-cuc-de-lam-202107311752194866.jpg","","30","O");



DROP TABLE IF EXISTS tblreport;

CREATE TABLE `tblreport` (
  `idReport` int(11) NOT NULL AUTO_INCREMENT,
  `hoTenNV` text DEFAULT NULL,
  `vanDe` text NOT NULL,
  `thoiGian` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idReport`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblreport VALUES("1","ehberg","<p>hbtrb</p>\n","2022-01-22 07:47:36"),
("2","","<p>tfgbdb gvgd</p>\n","2022-01-22 07:47:47"),
("3","","<p>&nbsp;bdfbg db fd ds&nbsp;</p>\n","2022-01-27 03:08:31");



DROP TABLE IF EXISTS tblstaff;

CREATE TABLE `tblstaff` (
  `idStaff` int(11) NOT NULL AUTO_INCREMENT,
  `hoTen` text NOT NULL,
  `soDT` int(10) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `diachi` text DEFAULT NULL,
  `tongTG` int(11) DEFAULT NULL,
  `tongLuong` int(11) DEFAULT NULL,
  PRIMARY KEY (`idStaff`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblstaff VALUES("3","Trần Tiến Đạt","101010101","dutt","1111","Rabbit House","102","5159168"),
("4","Nguyễn Minh Quân","101010101","quannm","password","Rabbit House","0","0");



DROP TABLE IF EXISTS tblusers;

CREATE TABLE `tblusers` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `hoTen` text NOT NULL,
  `soDT` int(10) NOT NULL,
  `diachi` text DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

INSERT INTO tblusers VALUES("1","admin","1111","Nguyễn Văn Bách","901234567","Rabbit House"),
("27","hungnv","1111","Nguyễn Văn Hùng","904567890","Rabbit House");



DROP TABLE IF EXISTS view_kho;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_kho` AS select `tblkho`.`tenHang` AS `tenHang`,`tblkho`.`soLuongBD` AS `soLuongBD`,`tblkho`.`soLuongCL` AS `soLuongCL`,`tblkho`.`thoiGianNK` AS `thoiGianNK`,`tblkho`.`thoiGianXK` AS `thoiGianXK` from `tblkho`;

INSERT INTO view_kho VALUES("Cafe xay sẳn","10","8","2022-01-24 08:43:09","2022-03-19 10:36:53"),
("Bánh tráng","10","9","2022-01-24 09:06:05","2022-03-19 10:36:53"),
("Trứng cút","10","10","2022-01-24 09:06:17","2022-02-24 07:26:10"),
("CoCa","10","10","2022-01-24 09:06:34","2022-02-24 07:26:10"),
("Thịt + đồ nướng","10","10","2022-01-24 09:07:30","2022-02-24 07:29:31"),
("Muối","10","10","2022-01-24 09:07:42","0000-00-00 00:00:00"),
("Đường","10","10","2022-01-24 09:07:51","0000-00-00 00:00:00"),
("Chuối","10","10","2022-01-24 09:08:06","0000-00-00 00:00:00"),
("Mía","10","10","2022-01-24 09:08:12","0000-00-00 00:00:00"),
("Dừa","10","10","2022-01-24 09:08:18","0000-00-00 00:00:00"),
("hạt nêm","10","10","2022-02-11 09:31:50","0000-00-00 00:00:00"),
("mì chính","10","10","2022-02-11 09:35:25","0000-00-00 00:00:00"),
("Nước ngọt","10","10","2022-02-13 11:30:46","0000-00-00 00:00:00"),
("Hạt tiêu\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00"),
("Rau nguồi tây\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00"),
("Đường thẻ\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00"),
("Sửa đặt\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00"),
("Cafe xay sẳn","10","8","2022-01-24 08:43:09","2022-03-19 10:36:53"),
("Bánh tráng","10","9","2022-01-24 09:06:05","2022-03-19 10:36:53"),
("Trứng cút","10","10","2022-01-24 09:06:17","2022-02-24 07:26:10"),
("CoCa","10","10","2022-01-24 09:06:34","2022-02-24 07:26:10"),
("Thịt + đồ nướng","10","10","2022-01-24 09:07:30","2022-02-24 07:29:31"),
("Muối","10","10","2022-01-24 09:07:42","0000-00-00 00:00:00"),
("Đường","10","10","2022-01-24 09:07:51","0000-00-00 00:00:00"),
("Chuối","10","10","2022-01-24 09:08:06","0000-00-00 00:00:00"),
("Mía","10","10","2022-01-24 09:08:12","0000-00-00 00:00:00"),
("Dừa","10","10","2022-01-24 09:08:18","0000-00-00 00:00:00"),
("hạt nêm","10","10","2022-02-11 09:31:50","0000-00-00 00:00:00"),
("mì chính","10","10","2022-02-11 09:35:25","0000-00-00 00:00:00"),
("Nước ngọt","10","10","2022-02-13 11:30:46","0000-00-00 00:00:00"),
("Hạt tiêu\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00"),
("Rau nguồi tây\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00"),
("Đường thẻ\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00"),
("Sửa đặt\n","10","10","2022-03-21 08:56:17","0000-00-00 00:00:00");



