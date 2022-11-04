/*
 Navicat MySQL Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MariaDB
 Source Server Version : 100803 (10.8.3-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : dbWMS

 Target Server Type    : MariaDB
 Target Server Version : 100803 (10.8.3-MariaDB)
 File Encoding         : 65001

 Date: 04/11/2022 23:12:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for item_in_detail
-- ----------------------------
DROP TABLE IF EXISTS `item_in_detail`;
CREATE TABLE `item_in_detail` (
  `id_item_in` varchar(5) NOT NULL,
  `no_order` varchar(5) NOT NULL,
  `no_item` varchar(50) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `id_locate` varchar(50) NOT NULL,
  KEY `fk_item_in_detail_id_item_in` (`id_item_in`),
  CONSTRAINT `fk_item_in_detail_id_item_in` FOREIGN KEY (`id_item_in`) REFERENCES `item_in_header` (`id_item_in`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of item_in_detail
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for item_in_header
-- ----------------------------
DROP TABLE IF EXISTS `item_in_header`;
CREATE TABLE `item_in_header` (
  `id_item_in` varchar(50) NOT NULL,
  `no_order` varchar(50) NOT NULL,
  `price_buy_total` double NOT NULL,
  `username` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id_item_in`),
  KEY `fk_item_in_header_username` (`username`),
  CONSTRAINT `fk_item_in_header_username` FOREIGN KEY (`username`) REFERENCES `master_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of item_in_header
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for log_price_item
-- ----------------------------
DROP TABLE IF EXISTS `log_price_item`;
CREATE TABLE `log_price_item` (
  `log_id` int(11) NOT NULL,
  `no_item` varchar(5) DEFAULT NULL,
  `price_buy_old` double DEFAULT NULL,
  `price_buy_new` double DEFAULT NULL,
  `price_sell_old` double DEFAULT NULL,
  `price_sell_new` double DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of log_price_item
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for master_item
-- ----------------------------
DROP TABLE IF EXISTS `master_item`;
CREATE TABLE `master_item` (
  `no_item` varchar(10) NOT NULL,
  `name_item` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price_buy` double NOT NULL,
  `price_sell` double NOT NULL,
  `unit` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`no_item`),
  KEY `fk_master_item_username` (`username`),
  CONSTRAINT `fk_master_item_username` FOREIGN KEY (`username`) REFERENCES `master_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of master_item
-- ----------------------------
BEGIN;
INSERT INTO `master_item` (`no_item`, `name_item`, `merk`, `type`, `price_buy`, `price_sell`, `unit`, `username`, `timestamp`) VALUES ('IT001', 'Kaos Anak Ukuran 1B', 'Mother Care', 'Pakaian Anak', 25000, 30000, 'Pcs', 'fauzan.n08', '2022-11-04 02:39:55');
INSERT INTO `master_item` (`no_item`, `name_item`, `merk`, `type`, `price_buy`, `price_sell`, `unit`, `username`, `timestamp`) VALUES ('IT002', 'Kaos Anak Ukuran 2B', 'Mother Care', 'Pakaian Anak', 26000, 31000, 'Pcs', 'fauzan.n08', '2022-11-04 02:41:03');
INSERT INTO `master_item` (`no_item`, `name_item`, `merk`, `type`, `price_buy`, `price_sell`, `unit`, `username`, `timestamp`) VALUES ('IT003', 'Kaos Anak Ukuran 3B', 'Mother Care', 'Pakaian Anak', 27000, 32000, 'Pcs', 'fauzan.n08', '2022-11-04 02:41:20');
INSERT INTO `master_item` (`no_item`, `name_item`, `merk`, `type`, `price_buy`, `price_sell`, `unit`, `username`, `timestamp`) VALUES ('IT004', 'Kaos Anak Ukuran 4B', 'Mother Care', 'Pakaian Anak', 28000, 33000, 'Pcs', 'fauzan.n08', '2022-11-04 02:42:15');
INSERT INTO `master_item` (`no_item`, `name_item`, `merk`, `type`, `price_buy`, `price_sell`, `unit`, `username`, `timestamp`) VALUES ('IT005', 'Sweeter Anak Ukuran 1B', 'Mother Care', 'Pakaian Anak', 57000, 61000, 'Pcs', 'fauzan.n08', '2022-11-04 16:34:59');
INSERT INTO `master_item` (`no_item`, `name_item`, `merk`, `type`, `price_buy`, `price_sell`, `unit`, `username`, `timestamp`) VALUES ('IT006', 'Sweeter Anak Ukuran 2B', 'Mother Care', 'Pakaian Anak', 58000, 62000, 'Pcs', 'fauzan.n08', '2022-11-04 16:35:16');
INSERT INTO `master_item` (`no_item`, `name_item`, `merk`, `type`, `price_buy`, `price_sell`, `unit`, `username`, `timestamp`) VALUES ('IT007', 'Sweeter Anak Ukuran 3B', 'Mother Care', 'Pakaian Anak', 59000, 63000, 'Pcs', 'fauzan.n08', '2022-11-04 16:37:22');
INSERT INTO `master_item` (`no_item`, `name_item`, `merk`, `type`, `price_buy`, `price_sell`, `unit`, `username`, `timestamp`) VALUES ('IT008', 'Kaos Dewasa Ukuran S', 'Polo', 'Pakaian Pria', 100000, 120000, 'Pcs', 'fauzan.n08', '2022-11-04 23:03:05');
INSERT INTO `master_item` (`no_item`, `name_item`, `merk`, `type`, `price_buy`, `price_sell`, `unit`, `username`, `timestamp`) VALUES ('IT009', 'Kaos Dewasa Ukuran M', 'Polo', 'Pakaian Pria', 100000, 120000, 'Pcs', 'fauzan.n08', '2022-11-04 23:03:11');
INSERT INTO `master_item` (`no_item`, `name_item`, `merk`, `type`, `price_buy`, `price_sell`, `unit`, `username`, `timestamp`) VALUES ('IT010', 'Kaos Dewasa Ukuran L', 'Polo', 'Pakaian Anak', 100000, 120000, 'Pcs', 'fauzan.n08', '2022-11-04 23:03:16');
INSERT INTO `master_item` (`no_item`, `name_item`, `merk`, `type`, `price_buy`, `price_sell`, `unit`, `username`, `timestamp`) VALUES ('IT011', 'Kaos Dewasa Ukuran XL', 'Polo', 'Pakaian Pria', 110000, 121000, 'Pcs', 'fauzan.n08', '2022-11-04 23:03:48');
COMMIT;

-- ----------------------------
-- Table structure for master_location
-- ----------------------------
DROP TABLE IF EXISTS `master_location`;
CREATE TABLE `master_location` (
  `id_loc` varchar(10) NOT NULL,
  `name_loc` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `capacity` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id_loc`),
  KEY `fk_master_location_username` (`username`),
  CONSTRAINT `fk_master_location_username` FOREIGN KEY (`username`) REFERENCES `master_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of master_location
-- ----------------------------
BEGIN;
INSERT INTO `master_location` (`id_loc`, `name_loc`, `description`, `pic`, `capacity`, `username`, `timestamp`) VALUES ('RA001', 'Rak A. No 001', 'Sebelah Atas Pojok Kiri', '2246rakbaju.jpeg', 180, 'fauzan.n08', '2022-11-04 02:28:05');
INSERT INTO `master_location` (`id_loc`, `name_loc`, `description`, `pic`, `capacity`, `username`, `timestamp`) VALUES ('RA002', 'Rak A No. 002', 'Sebelah Kanan Rak A No. 001', '7192rakbaju.jpeg', 215, 'fauzan.n08', '2022-11-04 02:28:23');
INSERT INTO `master_location` (`id_loc`, `name_loc`, `description`, `pic`, `capacity`, `username`, `timestamp`) VALUES ('RA003', 'Rak A No. 003', 'Sebelah Kanan Rak A No. 002', '7509rakbaju.jpeg', 193, 'fauzan.n08', '2022-11-04 02:28:33');
INSERT INTO `master_location` (`id_loc`, `name_loc`, `description`, `pic`, `capacity`, `username`, `timestamp`) VALUES ('RA004', 'Rak A No. 004', 'Sebelah Kanan Rak A No. 003', '9378rakbaju.jpeg', 122, 'fauzan.n08', '2022-11-04 02:35:46');
INSERT INTO `master_location` (`id_loc`, `name_loc`, `description`, `pic`, `capacity`, `username`, `timestamp`) VALUES ('RA005', 'Rak A No. 005', 'Dibawah Rak A No. 001', '4771rakbaju.jpeg', 141, 'fauzan.n08', '2022-11-04 02:34:15');
INSERT INTO `master_location` (`id_loc`, `name_loc`, `description`, `pic`, `capacity`, `username`, `timestamp`) VALUES ('RA006', 'Rak A No. 006', 'Dibawah Rak A No. 002', '5435rakbaju.jpeg', 200, 'fauzan.n08', '2022-11-04 02:35:21');
INSERT INTO `master_location` (`id_loc`, `name_loc`, `description`, `pic`, `capacity`, `username`, `timestamp`) VALUES ('RA007', 'Rak A No. 007', 'Dibawah Rak A No. 003', '8843rakbaju.jpeg', 137, 'fauzan.n08', '2022-11-04 02:36:44');
COMMIT;

-- ----------------------------
-- Table structure for master_stock
-- ----------------------------
DROP TABLE IF EXISTS `master_stock`;
CREATE TABLE `master_stock` (
  `id_stock` varchar(20) NOT NULL,
  `no_item` varchar(20) NOT NULL,
  `id_loc` varchar(20) NOT NULL,
  `qty_awal` bigint(20) NOT NULL,
  `qty_in` bigint(20) NOT NULL,
  `qty_out` bigint(20) NOT NULL,
  `qty_now` bigint(20) NOT NULL,
  `qty_actual` bigint(20) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id_stock`),
  KEY `fk_master_stock_id_loc` (`id_loc`),
  KEY `fk_master_stock_no_item` (`no_item`),
  KEY `fk_master_stock` (`username`),
  CONSTRAINT `fk_master_stock` FOREIGN KEY (`username`) REFERENCES `master_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_master_stock_id_loc` FOREIGN KEY (`id_loc`) REFERENCES `master_location` (`id_loc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_master_stock_no_item` FOREIGN KEY (`no_item`) REFERENCES `master_item` (`no_item`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of master_stock
-- ----------------------------
BEGIN;
INSERT INTO `master_stock` (`id_stock`, `no_item`, `id_loc`, `qty_awal`, `qty_in`, `qty_out`, `qty_now`, `qty_actual`, `status`, `username`, `timestamp`) VALUES ('202209IT001', 'IT001', 'RA001', 0, 30, 20, 10, 10, 'off', 'fauzan.n08', '2022-09-30 13:32:03');
INSERT INTO `master_stock` (`id_stock`, `no_item`, `id_loc`, `qty_awal`, `qty_in`, `qty_out`, `qty_now`, `qty_actual`, `status`, `username`, `timestamp`) VALUES ('202210IT001', 'IT001', 'RA001', 10, 20, 5, 25, 25, 'on', 'fauzan.n08', '2022-11-04 10:37:03');
INSERT INTO `master_stock` (`id_stock`, `no_item`, `id_loc`, `qty_awal`, `qty_in`, `qty_out`, `qty_now`, `qty_actual`, `status`, `username`, `timestamp`) VALUES ('202211IT002', 'IT002', 'RA001', 25, 0, 0, 25, 0, 'on', 'fauzan.n08', '2022-11-04 01:59:33');
INSERT INTO `master_stock` (`id_stock`, `no_item`, `id_loc`, `qty_awal`, `qty_in`, `qty_out`, `qty_now`, `qty_actual`, `status`, `username`, `timestamp`) VALUES ('202211IT003', 'IT003', 'RA001', 25, 0, 0, 25, 0, 'on', 'fauzan.n08', '2022-11-04 02:43:29');
INSERT INTO `master_stock` (`id_stock`, `no_item`, `id_loc`, `qty_awal`, `qty_in`, `qty_out`, `qty_now`, `qty_actual`, `status`, `username`, `timestamp`) VALUES ('202211IT004', 'IT004', 'RA001', 25, 0, 0, 25, 0, 'on', 'fauzan.n08', '2022-11-04 02:18:16');
INSERT INTO `master_stock` (`id_stock`, `no_item`, `id_loc`, `qty_awal`, `qty_in`, `qty_out`, `qty_now`, `qty_actual`, `status`, `username`, `timestamp`) VALUES ('202211IT005', 'IT005', 'RA002', 20, 0, 0, 20, 0, 'on', 'fauzan.n08', '2022-11-04 02:24:51');
INSERT INTO `master_stock` (`id_stock`, `no_item`, `id_loc`, `qty_awal`, `qty_in`, `qty_out`, `qty_now`, `qty_actual`, `status`, `username`, `timestamp`) VALUES ('202211IT006', 'IT006', 'RA002', 20, 0, 0, 20, 0, 'on', 'fauzan.n08', '2022-11-04 23:05:00');
INSERT INTO `master_stock` (`id_stock`, `no_item`, `id_loc`, `qty_awal`, `qty_in`, `qty_out`, `qty_now`, `qty_actual`, `status`, `username`, `timestamp`) VALUES ('202211IT007', 'IT007', 'RA002', 40, 0, 0, 40, 0, 'on', 'fauzan.n08', '2022-11-04 23:05:57');
COMMIT;

-- ----------------------------
-- Table structure for master_user
-- ----------------------------
DROP TABLE IF EXISTS `master_user`;
CREATE TABLE `master_user` (
  `id_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `id_create` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL,
  `stat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`,`username`) USING BTREE,
  KEY `id_user` (`id_user`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of master_user
-- ----------------------------
BEGIN;
INSERT INTO `master_user` (`id_user`, `username`, `password`, `name`, `level`, `no_telp`, `id_create`, `timestamp`, `stat`) VALUES ('US001', 'superadmin', '$2y$10$WHBoycpHJHU/Ke1R7VjHL.AGjAjvJ035XdQNQYOy.B2A4Jw9Pwy8e', 'superadmin', 'admin', '081280880874', 'superadmin', '2022-11-01 21:11:48', 'aktif');
INSERT INTO `master_user` (`id_user`, `username`, `password`, `name`, `level`, `no_telp`, `id_create`, `timestamp`, `stat`) VALUES ('US002', 'fauzan.n08', '$2y$10$UhEWySrTJP3Ooump3lnEp.8OJ.nNWlWdjAcqeCUYTX/PapI2cqF1u', 'Fauzan Nurrachman', 'admin', '081280880874', 'superadmin', '2022-11-02 08:28:52', 'aktif');
INSERT INTO `master_user` (`id_user`, `username`, `password`, `name`, `level`, `no_telp`, `id_create`, `timestamp`, `stat`) VALUES ('US003', 'picker', '$2y$10$DFifWzLIG/462Sgrjn7OBeaWmuVsaWayKT5/vgMTdatb46WyLqvpq', 'Picker', 'picker', '081280880874', 'superadmin', '2022-11-02 08:52:09', 'aktif');
INSERT INTO `master_user` (`id_user`, `username`, `password`, `name`, `level`, `no_telp`, `id_create`, `timestamp`, `stat`) VALUES ('US004', 'auditor', '$2y$10$Ry32NSiHVBowBsLFvqIGTegqyt0HoCgvyl8jC3OEaAhJEPQbaxKsi', 'Auditor', 'auditor', '081280880874', 'superadmin', '2022-11-02 08:52:20', 'aktif');
INSERT INTO `master_user` (`id_user`, `username`, `password`, `name`, `level`, `no_telp`, `id_create`, `timestamp`, `stat`) VALUES ('US005', 'qualitycontrol', '$2y$10$cnoXFZgzwJVGo5gODvOtt..jy8oRzia5fomdjKPCb9Cnx.RRXfD1.', 'Quality Control', 'quality control', '081280880874', 'superadmin', '2022-11-02 08:54:34', 'aktif');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
