/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : servicedeskgroup

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-08-30 09:47:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for anggota
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `npm` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_atasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anggota_user_id_foreign` (`user_id`),
  CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO `anggota` VALUES ('1', '1', '10000353', 'Admin GC', 'Banjarmasin', '2018-01-01', 'L', 'TI', '2020-08-08 03:30:58', '2020-08-08 03:30:58', null);
INSERT INTO `anggota` VALUES ('2', '2', '10000375', 'User GC', 'Banjarmasin', '2019-01-01', 'L', 'TI', '2020-08-08 03:30:58', '2020-08-08 03:30:58', null);
INSERT INTO `anggota` VALUES ('3', '4', '234', 'atasan unit', 'adfadsf', '1988-12-04', 'L', 'SI', '2020-08-09 10:05:27', '2020-08-09 10:05:27', 'andrataris@sidistributor.com');
INSERT INTO `anggota` VALUES ('4', '5', '235', 'atasan it', 'adfadsf', '1988-12-04', 'L', 'SI', '2020-08-09 10:05:27', '2020-08-09 10:05:27', null);
INSERT INTO `anggota` VALUES ('5', '6', '236', 'petugas it', 'adfadsf', '1988-12-04', 'L', 'SI', '2020-08-09 10:05:27', '2020-08-09 10:05:27', null);

-- ----------------------------
-- Table structure for buku
-- ----------------------------
DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengarang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `lokasi` enum('rak1','rak2','rak3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of buku
-- ----------------------------
INSERT INTO `buku` VALUES ('1', 'Belajar Pemrograman Java', '9920392749', 'Abdul Kadir', 'PT. Restu Ibu', '2018', '12', 'Buku Pertama Belajar Pemrograman Java Utk Pemula', 'rak1', 'buku_java.jpg', '2020-08-08 03:30:58', '2020-08-28 08:33:49');
INSERT INTO `buku` VALUES ('2', 'Pemrograman Android', '9920395559', 'Muhammad Nurhidayat', 'PT. Restu Guru', '2018', '12', 'Jurus Rahasia Menguasai Pemrograman Android', 'rak2', 'jurus_rahasia.jpg', '2020-08-08 03:30:58', '2020-08-11 07:15:21');
INSERT INTO `buku` VALUES ('3', 'Android Application', '9920392000', 'Dina Aulia', 'PT. Restu Ayah', '2018', '1', 'Buku Pertama Belajar Pemrograman Java Utk Pemula', 'rak2', 'create_your.jpg', '2020-08-08 03:30:58', '2020-08-09 13:28:01');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2018_06_17_070037_create_anggotas_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_06_17_130244_create_bukus_table', '1');
INSERT INTO `migrations` VALUES ('4', '2018_06_18_014155_create_transaksis_table', '1');

-- ----------------------------
-- Table structure for m_layanan
-- ----------------------------
DROP TABLE IF EXISTS `m_layanan`;
CREATE TABLE `m_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_layanan` varchar(255) DEFAULT NULL,
  `nama_layanan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_layanan
-- ----------------------------
INSERT INTO `m_layanan` VALUES ('1', 'LI', 'Layanan IT');
INSERT INTO `m_layanan` VALUES ('2', 'LU', 'Layanan Umum ');
INSERT INTO `m_layanan` VALUES ('3', 'LB', 'Layanan Bendahara');

-- ----------------------------
-- Table structure for ticket_service
-- ----------------------------
DROP TABLE IF EXISTS `ticket_service`;
CREATE TABLE `ticket_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServiceName` varchar(255) DEFAULT NULL,
  `ServiceStatus` int(11) DEFAULT NULL,
  `DateActive` date DEFAULT NULL,
  `DateNonActive` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_layanan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ticket_service
-- ----------------------------
INSERT INTO `ticket_service` VALUES ('1', 'INSTALASI HARDWARE', '1', '2019-11-01', null, '2020-08-28 15:48:37', '2020-08-28 15:48:37', '1');
INSERT INTO `ticket_service` VALUES ('2', 'PERBAIKAN HARDWARE', '1', '2019-11-01', null, '2020-08-28 15:48:41', '2020-08-28 15:48:41', '1');
INSERT INTO `ticket_service` VALUES ('3', 'INSTALASI SOFTWARE', '1', '2019-11-01', null, '2020-08-28 15:48:41', '2020-08-28 15:48:41', '1');
INSERT INTO `ticket_service` VALUES ('4', 'PERBAIKAN SOFTWARE', '1', '2019-11-01', null, '2020-08-28 15:48:41', '2020-08-28 15:48:41', '1');
INSERT INTO `ticket_service` VALUES ('5', 'USER ACCOUNT BARU', null, null, null, '2020-08-28 15:48:41', '2020-08-28 15:48:41', '1');
INSERT INTO `ticket_service` VALUES ('6', 'MODIFIKASI USER ACCOUNT', null, null, null, '2020-08-28 15:48:41', '2020-08-28 15:48:41', '1');
INSERT INTO `ticket_service` VALUES ('7', 'HAPUS USER ACCOUNT', null, null, null, '2020-08-28 15:48:41', '2020-08-28 15:48:41', '1');
INSERT INTO `ticket_service` VALUES ('8', 'PENARIKAN DATA', null, null, null, '2020-08-28 15:48:41', '2020-08-28 15:48:41', '1');
INSERT INTO `ticket_service` VALUES ('9', 'PERBAIKAN DATA', null, null, null, '2020-08-28 15:48:42', '2020-08-28 15:48:42', '1');
INSERT INTO `ticket_service` VALUES ('10', 'KONEKSI JARINGAN', null, null, null, '2020-08-28 15:48:42', '2020-08-28 15:48:42', '1');
INSERT INTO `ticket_service` VALUES ('11', 'DEVELOP APLIKASI BARU', null, null, null, '2020-08-28 15:48:42', '2020-08-28 15:48:42', '1');
INSERT INTO `ticket_service` VALUES ('12', 'MODIFIKASI APLIKASI', null, null, null, '2020-08-28 15:48:42', '2020-08-28 15:48:42', '1');
INSERT INTO `ticket_service` VALUES ('13', 'DEVELOP REPORT BARU', null, null, null, '2020-08-28 15:48:42', '2020-08-28 15:48:42', '1');
INSERT INTO `ticket_service` VALUES ('14', 'MODIFIKASI REPORT', null, null, null, '2020-08-28 15:48:42', '2020-08-28 15:48:42', '1');

-- ----------------------------
-- Table structure for ticket_service_sub
-- ----------------------------
DROP TABLE IF EXISTS `ticket_service_sub`;
CREATE TABLE `ticket_service_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServiceIDf` int(11) DEFAULT NULL,
  `ServiceSubName` varchar(255) DEFAULT NULL,
  `ServiceSubStatus` int(11) DEFAULT NULL,
  `DateActive` date DEFAULT NULL,
  `DateNonActive` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ticket_service_sub
-- ----------------------------
INSERT INTO `ticket_service_sub` VALUES ('1', '1', 'CPU\r\n', '0', '2019-11-01', null, '2020-08-28 15:51:11', '2020-08-28 15:51:11');
INSERT INTO `ticket_service_sub` VALUES ('2', '2', 'MONITOR\r\n', '1', '2019-11-01', null, '2020-08-28 15:51:21', '2020-08-28 15:51:21');
INSERT INTO `ticket_service_sub` VALUES ('3', '3', 'KEYBOARD\r\n', '1', '2019-11-01', null, '2020-08-28 15:51:23', '2020-08-28 15:51:23');
INSERT INTO `ticket_service_sub` VALUES ('4', '4', 'MOUSE\r\n', '1', '2019-11-01', null, '2020-08-28 15:51:26', '2020-08-28 15:51:26');
INSERT INTO `ticket_service_sub` VALUES ('5', '1', 'PRINTER\r\n', '1', '2019-11-01', null, '2020-08-28 15:51:28', '2020-08-28 15:51:28');
INSERT INTO `ticket_service_sub` VALUES ('7', '3', 'SCANNER\r\n', '1', '2019-11-01', null, '2020-08-28 15:51:31', '2020-08-28 15:51:31');
INSERT INTO `ticket_service_sub` VALUES ('8', '4', 'MODEM\r\n', '1', '2019-11-01', null, '2020-08-28 15:51:33', '2020-08-28 15:51:33');
INSERT INTO `ticket_service_sub` VALUES ('9', '2', 'CD ROM/RW\r\n', '1', '2019-11-01', null, '2020-08-28 15:51:34', '2020-08-28 15:51:34');
INSERT INTO `ticket_service_sub` VALUES ('10', '1', 'WINDOWS\r\n', '1', '2019-11-01', null, '2020-08-28 15:51:46', '2020-08-28 15:51:46');
INSERT INTO `ticket_service_sub` VALUES ('11', '1', 'ANTIVIRUS\r\n', '1', '2019-11-01', null, '2020-08-28 15:51:49', '2020-08-28 15:51:49');
INSERT INTO `ticket_service_sub` VALUES ('12', '1', 'OFFICE\r\n', '1', '2019-11-01', null, '2020-08-28 15:51:52', '2020-08-28 15:51:52');
INSERT INTO `ticket_service_sub` VALUES ('13', '1', 'WEB BROWSER\r\n', '1', '2019-11-01', null, '2020-08-28 15:51:55', '2020-08-28 15:51:55');
INSERT INTO `ticket_service_sub` VALUES ('14', '1', 'DESAIN\r\n', '1', '2019-11-01', null, '2020-08-28 15:51:57', '2020-08-28 15:51:57');
INSERT INTO `ticket_service_sub` VALUES ('15', '1', 'ACTS\r\n', '1', '2019-11-01', null, '2020-08-28 15:52:00', '2020-08-28 15:52:00');
INSERT INTO `ticket_service_sub` VALUES ('16', '1', 'SID MOBILE\r\n', '1', '2019-11-01', null, '2020-08-28 15:52:04', '2020-08-28 15:52:04');
INSERT INTO `ticket_service_sub` VALUES ('17', '1', 'JDE\r\n', '1', '2019-11-01', null, '2020-08-28 15:52:07', '2020-08-28 15:52:07');
INSERT INTO `ticket_service_sub` VALUES ('18', '1', 'SIWA\r\n', '1', '2019-11-01', null, '2020-08-28 15:52:09', '2020-08-28 15:52:09');
INSERT INTO `ticket_service_sub` VALUES ('19', '1', 'EMAIL SILOG\r\n', '1', '2019-11-01', null, '2020-08-28 15:52:15', '2020-08-28 15:52:15');
INSERT INTO `ticket_service_sub` VALUES ('20', '1', 'SISIL\r\n', '1', '2019-11-01', null, '2020-08-28 15:52:19', '2020-08-28 15:52:19');
INSERT INTO `ticket_service_sub` VALUES ('21', '1', 'EMAIL SID\r\n', '1', '2020-04-18', null, '2020-08-28 15:52:39', '2020-08-28 15:52:39');
INSERT INTO `ticket_service_sub` VALUES ('22', '1', 'JDE', '1', '2020-08-01', null, null, null);
INSERT INTO `ticket_service_sub` VALUES ('23', '1', 'ACTS', '1', '2020-08-01', null, null, null);
INSERT INTO `ticket_service_sub` VALUES ('25', null, 'PORTAL\r\n', null, null, null, '2020-08-28 15:52:44', '2020-08-28 15:52:44');
INSERT INTO `ticket_service_sub` VALUES ('26', null, 'MOBILE\r\n', null, null, null, '2020-08-28 15:52:59', '2020-08-28 15:52:59');
INSERT INTO `ticket_service_sub` VALUES ('28', null, 'JARINGAN\r\n', null, null, null, '2020-08-28 15:53:16', '2020-08-28 15:53:16');
INSERT INTO `ticket_service_sub` VALUES ('31', null, 'VPN\r\n', null, null, null, '2020-08-28 15:53:18', '2020-08-28 15:53:18');
INSERT INTO `ticket_service_sub` VALUES ('32', null, 'EXT TELP BARU\r\n', null, null, null, null, null);
INSERT INTO `ticket_service_sub` VALUES ('33', null, 'LAIN\r\n', null, null, null, null, null);

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggota_id` int(10) unsigned NOT NULL,
  `buku_id` int(10) unsigned NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('pinjam','kembali') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaksi_anggota_id_foreign` (`anggota_id`),
  KEY `transaksi_buku_id_foreign` (`buku_id`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES ('1', 'TR00001', '2', '3', '2020-08-08', '2020-08-13', 'kembali', 'tes', '2020-08-08 03:44:03', '2020-08-08 09:41:12');
INSERT INTO `transaksi` VALUES ('2', 'TR00002', '2', '1', '2020-08-08', '2020-08-13', 'kembali', 'ok', '2020-08-08 10:10:09', '2020-08-09 08:48:17');
INSERT INTO `transaksi` VALUES ('3', 'TR00003', '1', '1', '2020-08-09', '2020-08-14', 'pinjam', 'sdsds', '2020-08-09 08:45:58', '2020-08-09 08:45:58');
INSERT INTO `transaksi` VALUES ('4', 'TR00004', '2', '3', '2020-08-09', '2020-08-14', 'pinjam', 'eeeeeeeeeeeeeee', '2020-08-09 08:46:26', '2020-08-09 08:46:26');
INSERT INTO `transaksi` VALUES ('5', 'TR00005', '2', '1', '2020-08-09', '2020-08-14', 'pinjam', 'tes3', '2020-08-09 08:47:39', '2020-08-09 08:47:39');
INSERT INTO `transaksi` VALUES ('6', 'TR00005', '2', '1', '2020-08-09', '2020-08-14', 'pinjam', '3333333333', '2020-08-09 08:47:47', '2020-08-09 08:47:47');
INSERT INTO `transaksi` VALUES ('7', 'TR00007', '2', '3', '2020-08-09', '2020-08-14', 'pinjam', 'User GCsssss', '2020-08-09 12:41:42', '2020-08-09 12:41:42');
INSERT INTO `transaksi` VALUES ('8', 'TR00008', '3', '3', '2020-08-09', '2020-08-14', 'pinjam', 'dddddddddd', '2020-08-09 13:02:04', '2020-08-09 13:02:04');
INSERT INTO `transaksi` VALUES ('9', 'TR00009', '3', '1', '2020-08-09', '2020-08-14', 'pinjam', 'ssssssssssssssssss', '2020-08-09 13:07:03', '2020-08-09 13:07:03');
INSERT INTO `transaksi` VALUES ('10', 'TR00010', '2', '3', '2020-08-09', '2020-08-14', 'pinjam', 'aaaaaaaaaaaaaaaaaaaabc', '2020-08-09 13:28:01', '2020-08-09 13:28:01');
INSERT INTO `transaksi` VALUES ('11', 'TR00011', '2', '1', '2020-08-10', '2020-08-15', 'pinjam', 'wwwwwwwwww', '2020-08-10 03:05:08', '2020-08-10 03:05:08');
INSERT INTO `transaksi` VALUES ('12', 'TR00012', '1', '1', '2020-08-10', '2020-08-15', 'pinjam', 'tesr', '2020-08-10 03:33:24', '2020-08-10 03:33:24');
INSERT INTO `transaksi` VALUES ('13', 'TR00013', '2', '1', '2020-08-10', '2020-08-15', 'pinjam', 'jjjjjjjjj', '2020-08-10 07:53:04', '2020-08-10 07:53:04');
INSERT INTO `transaksi` VALUES ('14', 'TR00014', '2', '2', '2020-08-11', '2020-08-16', 'pinjam', 'sssssssssssssaaasa', '2020-08-11 06:53:59', '2020-08-11 06:53:59');
INSERT INTO `transaksi` VALUES ('15', 'TR00015', '2', '2', '2020-08-11', '2020-08-16', 'pinjam', 'ikut', '2020-08-11 07:15:20', '2020-08-11 07:15:20');
INSERT INTO `transaksi` VALUES ('16', 'TR00016', '3', '1', '2020-08-28', '2020-09-02', 'pinjam', 'cccccccccc', '2020-08-28 08:33:49', '2020-08-28 08:33:49');

-- ----------------------------
-- Table structure for transaksi_ticket
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_ticket`;
CREATE TABLE `transaksi_ticket` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `subservice_id` int(10) unsigned NOT NULL,
  `tgl_open` date NOT NULL,
  `tgl_close` date DEFAULT NULL,
  `status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL,
  `case` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `anggota_id` int(10) DEFAULT NULL,
  `atasan_id` int(10) DEFAULT NULL,
  `status_ticket` int(10) DEFAULT NULL COMMENT '1: open\r\n2: belum approve atasan\r\n3: belum approve atasan IT\r\n4: belum proses \r\n5: close\r\n7: tolakoleh atasan IT\r\n',
  `atasan_it` int(10) DEFAULT NULL,
  `petugas_it` int(10) DEFAULT NULL,
  `tglappatasanunit` timestamp NULL DEFAULT NULL,
  `tglappatasanit` timestamp NULL DEFAULT NULL,
  `tglapppetugasit` timestamp NULL DEFAULT NULL,
  `catpetugasit` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaksi_anggota_id_foreign` (`service_id`),
  KEY `transaksi_buku_id_foreign` (`subservice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of transaksi_ticket
-- ----------------------------
INSERT INTO `transaksi_ticket` VALUES ('1', 'TICKET00001', '1', '1', '2020-08-10', '0000-00-00', 'close', 'email error', null, '2020-08-24 07:55:58', null, '3', '7', '5', null, '2020-08-19 02:58:40', '2020-08-24 07:55:58', null, null, '4');
INSERT INTO `transaksi_ticket` VALUES ('4', 'TICKET00002', '2', '4', '2020-08-11', null, 'open', null, '2020-08-11 06:07:00', '2020-08-24 08:19:06', null, '3', '6', null, null, '2020-08-24 08:19:06', null, null, null, '4');
INSERT INTO `transaksi_ticket` VALUES ('5', 'TICKET00005', '4', '4', '2020-08-11', null, 'open', null, '2020-08-11 06:11:24', '2020-08-24 08:21:00', null, '3', '6', null, null, '2020-08-24 08:21:00', null, null, null, null);
INSERT INTO `transaksi_ticket` VALUES ('6', 'TICKET00006', '4', '4', '2020-08-11', null, 'open', 'tolong buatkan email baru', '2020-08-11 06:14:08', '2020-08-24 07:54:19', null, '3', '3', '5', '6', '2020-08-21 07:42:45', '2020-08-24 07:54:19', null, null, null);
INSERT INTO `transaksi_ticket` VALUES ('7', 'TICKET00007', '4', '22', '2020-08-11', null, 'open', 'ccccccccccc', '2020-08-11 06:19:58', '2020-08-24 08:27:47', null, '3', '6', null, null, '2020-08-24 08:27:47', null, null, null, null);
INSERT INTO `transaksi_ticket` VALUES ('8', 'TICKET00008', '1', '7', '2020-08-11', null, 'open', 'wwwwwwwwwwwww', '2020-08-11 06:27:54', '2020-08-11 06:27:54', null, '3', '1', null, null, null, null, null, null, null);
INSERT INTO `transaksi_ticket` VALUES ('9', 'TICKET00009', '2', '13', '2020-08-11', null, 'open', 'jjjjjjjjjjjjjjjjjjjjj', '2020-08-11 06:42:07', '2020-08-11 06:42:07', null, '3', '1', null, null, null, null, null, null, null);
INSERT INTO `transaksi_ticket` VALUES ('10', 'TICKET00010', '4', '12', '2020-08-11', null, 'open', 'ok', '2020-08-11 06:48:49', '2020-08-11 06:48:49', null, '3', '1', null, null, null, null, null, null, null);
INSERT INTO `transaksi_ticket` VALUES ('11', 'TICKET00011', '2', '7', '2020-08-11', null, 'open', 'tes6', '2020-08-11 06:50:20', '2020-08-11 06:50:20', null, '3', '1', null, null, null, null, null, null, null);
INSERT INTO `transaksi_ticket` VALUES ('12', 'TICKET00012', '5', '22', '2020-08-11', null, 'open', 'jkhkjhkjhk', '2020-08-11 06:59:24', '2020-08-11 06:59:24', null, '3', '1', null, null, null, null, null, null, null);
INSERT INTO `transaksi_ticket` VALUES ('13', 'TICKET00013', '1', '7', '2020-08-11', null, 'open', 'tes', '2020-08-11 07:10:42', '2020-08-21 07:14:20', null, '3', '4', '5', '6', '2020-08-18 04:06:12', '2020-08-18 23:57:13', '2020-08-21 07:14:20', 'sudah selesai tes nya', null);
INSERT INTO `transaksi_ticket` VALUES ('14', 'TICKET00014', '2', '1', '2020-08-11', null, 'open', 'eeeeewww', '2020-08-11 07:12:15', '2020-08-17 08:59:45', null, '3', '4', '5', '6', '2020-08-17 08:58:01', '2020-08-17 08:59:23', '2020-08-17 08:59:45', null, null);
INSERT INTO `transaksi_ticket` VALUES ('15', 'TICKET00015', '4', '8', '2020-08-11', null, 'open', 'tolong di konfirgurasi', '2020-08-11 07:18:40', '2020-08-18 03:49:54', null, '3', '4', '5', '6', '2020-08-18 03:48:31', '2020-08-18 03:48:58', '2020-08-18 03:49:54', 'selesai cek kembali', null);
INSERT INTO `transaksi_ticket` VALUES ('16', 'TICKET00016', '2', '2', '2020-08-11', null, 'open', 'laptopnya error', '2020-08-11 07:21:04', '2020-08-17 08:55:00', null, '3', '4', '5', '6', '2020-08-17 08:52:03', '2020-08-17 08:52:51', '2020-08-17 08:55:00', null, null);
INSERT INTO `transaksi_ticket` VALUES ('17', 'TICKET00017', '3', '8', '2020-08-11', null, 'open', 'sdfsdfs', '2020-08-11 07:42:38', '2020-08-17 15:50:16', null, '3', '4', '5', '6', '2020-08-17 14:45:35', '2020-08-17 14:45:35', '2020-08-17 15:50:16', null, null);
INSERT INTO `transaksi_ticket` VALUES ('18', 'TICKET00018', '3', '7', '2020-08-11', null, 'open', 'okte', '2020-08-11 08:40:18', '2020-08-18 03:46:30', null, '3', '4', '5', '6', null, null, '2020-08-18 03:46:30', 'sudah selesai silahkan cek ekmbali', null);
INSERT INTO `transaksi_ticket` VALUES ('19', 'TICKET00019', '1', '22', '2020-08-11', null, 'open', 'asdasdas', '2020-08-11 08:41:33', '2020-08-17 08:56:09', null, '3', '4', '5', '6', null, '2020-08-17 08:55:37', '2020-08-17 08:56:09', null, null);
INSERT INTO `transaksi_ticket` VALUES ('20', 'TICKET00020', '1', '12', '2020-08-11', null, 'open', 'asdasdsssss', '2020-08-11 08:43:35', '2020-08-17 03:25:35', null, '3', '4', '5', '6', null, null, '2020-08-17 08:56:09', null, null);
INSERT INTO `transaksi_ticket` VALUES ('21', 'TICKET00021', '4', '4', '2020-08-11', null, 'open', 'bbbbbbbbbbbbbbbbb', '2020-08-11 08:46:44', '2020-08-17 03:25:31', null, '3', '4', '5', '6', null, null, '2020-08-17 08:56:09', null, null);
INSERT INTO `transaksi_ticket` VALUES ('22', 'TICKET00022', '3', '12', '2020-08-11', null, 'open', 'ok bismillah', '2020-08-11 08:48:45', '2020-08-17 03:25:26', null, '3', '4', '5', '6', null, null, '2020-08-17 08:56:09', null, null);
INSERT INTO `transaksi_ticket` VALUES ('23', 'TICKET00023', '1', '1', '2020-08-11', null, 'open', 'BIsmillah', '2020-08-11 08:49:52', '2020-08-17 03:25:20', null, '3', '4', '5', '6', null, null, '2020-08-17 08:56:09', null, null);
INSERT INTO `transaksi_ticket` VALUES ('24', 'TICKET00024', '3', '7', '2020-08-12', null, 'open', 'jhjhjhjhjhjhjhjhjh', '2020-08-12 02:03:00', '2020-08-17 03:25:15', null, '3', '4', '5', '6', null, null, '2020-08-17 08:56:09', null, null);
INSERT INTO `transaksi_ticket` VALUES ('25', 'TICKET00025', '1', '12', '2020-08-12', null, 'open', 'antivirus g update', '2020-08-12 04:45:48', '2020-08-17 03:25:10', null, '3', '4', '5', '6', null, null, '2020-08-17 08:56:09', null, null);
INSERT INTO `transaksi_ticket` VALUES ('26', 'TICKET00026', '1', '12', '2020-08-12', null, 'open', 'antivirusnya tidak update minta tolong', '2020-08-12 05:16:38', '2020-08-17 02:49:42', null, '3', '4', '5', '6', null, null, '2020-08-17 08:56:09', null, null);
INSERT INTO `transaksi_ticket` VALUES ('27', 'TICKET00027', '4', '4', '2020-08-17', null, 'open', 'tolong buatkan email baru untuk user xxx', '2020-08-17 02:51:41', '2020-08-17 02:59:29', null, '3', '4', '5', '6', null, null, '2020-08-17 08:56:09', null, null);
INSERT INTO `transaksi_ticket` VALUES ('28', 'TICKET00028', '2', '2', '2020-08-17', null, 'open', 'tidak bisa nge print dan sering trouble printernya ke laptop', '2020-08-17 03:05:01', '2020-08-17 03:10:59', null, '3', '4', '5', '6', null, null, '2020-08-17 08:56:09', null, null);
INSERT INTO `transaksi_ticket` VALUES ('29', 'TICKET00029', '3', '7', '2020-08-18', null, 'open', 'tidak bisa konek ke internet', '2020-08-18 04:41:04', '2020-08-21 07:43:10', null, '3', '3', '5', '6', '2020-08-18 04:42:03', '2020-08-21 07:43:10', null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('30', 'TICKET00030', '1', '12', '2020-08-18', null, 'open', 'tidak bisa view', '2020-08-18 07:15:06', '2020-08-18 07:15:06', null, '3', '1', null, null, null, null, null, null, null);
INSERT INTO `transaksi_ticket` VALUES ('31', 'TICKET00031', '4', '7', '2020-08-18', null, 'open', 'g bisa koneksi ke internet', '2020-08-18 07:17:05', '2020-08-18 07:17:05', null, '3', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('32', 'TICKET00032', '4', '22', '2020-08-21', null, 'open', 'tolong buat email', '2020-08-21 01:24:00', '2020-08-21 01:24:00', null, '5', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('33', 'TICKET00033', '3', '7', '2020-08-21', null, 'open', 'koneksi internetnya lemot', '2020-08-21 02:02:45', '2020-08-21 02:02:45', null, '3', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('34', 'TICKET00034', '1', '12', '2020-08-21', null, 'open', 'tolong diupdate antivirusnya', '2020-08-21 02:42:28', '2020-08-21 02:42:28', null, '3', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('35', 'TICKET00035', '1', '12', '2020-08-21', null, 'open', 'konfigurasi antivirusnya error', '2020-08-21 02:49:16', '2020-08-21 02:49:16', null, '3', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('36', 'TICKET00036', '3', '7', '2020-08-21', null, 'open', 'g bisa internet an', '2020-08-21 02:56:09', '2020-08-21 02:56:09', null, '5', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('37', 'TICKET00037', '4', '7', '2020-08-21', null, 'open', 'g bisa internet an sama maintenance jaringan', '2020-08-21 02:56:50', '2020-08-21 02:56:50', null, '3', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('38', 'TICKET00038', '4', '8', '2020-08-21', null, 'open', 'xxxxxxxxxxxxxxxxx', '2020-08-21 02:58:30', '2020-08-21 02:58:30', null, '3', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('39', 'TICKET00039', '2', '2', '2020-08-21', null, 'open', 'laptopnya butuh bantuan', '2020-08-21 03:27:51', '2020-08-21 03:27:51', null, '3', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('40', 'TICKET00040', '3', '2', '2020-08-21', null, 'open', 'tes123', '2020-08-21 08:24:12', '2020-08-21 08:24:12', null, '3', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('41', 'TICKET00041', '4', '8', '2020-08-21', null, 'open', 'tolong emailnya di konfigurasi', '2020-08-21 08:26:41', '2020-08-21 08:26:41', null, '3', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('42', 'TICKET00042', '2', '2', '2020-08-21', null, 'open', 'tidak bisa print', '2020-08-21 08:31:46', '2020-08-21 08:31:46', null, '3', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('43', 'TICKET00043', '1', '22', '2020-08-21', null, 'open', 'tidak bisa login jde', '2020-08-21 08:34:46', '2020-08-24 07:57:31', null, '3', '7', '5', null, '2020-08-24 07:57:04', '2020-08-24 07:57:31', null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('44', 'TICKET00044', '2', '2', '2020-08-21', null, 'open', 'laptopnya restart', '2020-08-21 08:36:35', '2020-08-24 07:50:03', null, '3', '3', '5', '6', '2020-08-21 08:39:00', '2020-08-24 07:50:03', null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('45', 'TICKET00045', '2', '2', '2020-08-24', null, 'open', 'ada yang error', '2020-08-24 03:47:29', '2020-08-24 03:59:23', null, '3', '4', '5', '6', '2020-08-24 03:48:37', '2020-08-24 03:49:21', '2020-08-24 03:59:23', 'Itu sudah ditarik ke SIDMbile mas\r\n\r\nAtas FJ itu ada di BT/004/202008/0138\r\nNah dari BT itu sudah dikirim dari SIDMobile satu FJ/004/202008/0461 sehungga membentuk TK/004/202008/0136\r\n\r\nNah atas FJ/004/202006/0240\r\nFJ/004/202007/0374\r\nFJ/004/202007/0117\r\nFJ/004/202008/0204\r\nFJ/004/202007/0279\r\nFJ/004/202007/0389\r\nFJ/004/202007/0045\r\nFJ/004/202007/0202\r\nFJ/004/202007/0204\r\nFJ/004/202006/0539\r\n\r\nFJ tersebut dicek juga di SIDMobile dan dilakukan pembayaran di SIDMobile\r\nKemudian dikirim ke SIWA', '8');
INSERT INTO `transaksi_ticket` VALUES ('46', 'TICKET00046', '3', '9', '2020-08-24', null, 'open', 'jaringannya g bisa untuk internet', '2020-08-24 07:04:04', '2020-08-24 07:07:02', null, '3', '3', '5', '6', '2020-08-24 07:06:00', '2020-08-24 07:07:02', null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('47', 'TICKET00047', '4', '8', '2020-08-28', null, 'open', 'tolong buatkan email', '2020-08-28 08:22:32', '2020-08-28 08:22:32', null, '3', '1', null, null, null, null, null, null, '8');
INSERT INTO `transaksi_ticket` VALUES ('48', 'TICKET00048', '10', '19', '2020-08-28', null, 'open', 'tesssssssssssssssssssss', '2020-08-28 09:15:17', '2020-08-28 09:15:17', null, '3', '1', null, null, null, null, null, null, '8');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('admin','atasan_bidang','user','atasan_it','client','petugas_it') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Akses- Admin', 'admin123', '123456@gilacoding.com', '$2y$10$CggFyKbs1nhnSRZ9cF3wxOp0fHT4raI5x6.KlPSxzyq7TigAmDoYG', null, 'admin', 'tAPTgEkg1BIeqWpVnH5HDwEB2Ks9A92riRZ8w7gH6XFs8vtSqPmhvGXzUCLO', '2020-08-08 03:30:58', '2020-08-08 03:30:58');
INSERT INTO `users` VALUES ('2', 'Akses - User', 'user123', '654321@gilacoding.com', '$2y$10$7WBogunsbIQNg/ahy64USO3bXZb3TQOOMFwk4VFbh2NxMeDG1MDs6', null, 'user', 'NiyqJSuo4MyVO5tM1jTLVNZH2iyT9MU9XdcUlCGuF8ld37vN2lp333qLUATE', '2020-08-08 03:30:58', '2020-08-08 03:30:58');
INSERT INTO `users` VALUES ('3', 'andrataris', 'andra', 'andraresmi@gmail.com', '$2y$10$9DaEekL22gCL3IKRSqnU0e.UMqU0Q3Cpfwvmz.V8Enfj0zD9sl5qi', '36499-2020-08-08-09-24-39.jpg', 'admin', 'LFFhnYAjkDbQ6Q3k3yJgIOsaXdfwIjhSWOCYJiu0HRv051npQmyONEkySqMO', '2020-08-08 09:24:39', '2020-08-08 09:24:39');
INSERT INTO `users` VALUES ('4', 'oke', 'ok1', 'ok1@sidistributor.com', '$2y$10$6DUYUD0s17T2LrFy9IGnHubmbdU.9kBdL/LfIShvfGoCqHFdULZhi', '75595-2020-08-08-09-38-01.jpg', 'atasan_bidang', 'NNvn6bR21vlLGsQ1pfnyV1eSxevpwyOfuLWTRV9pAKcxadKDNQXHIJpCW0sx', '2020-08-08 09:38:01', '2020-08-08 09:38:01');
INSERT INTO `users` VALUES ('5', 'atasanit', 'atasanit123', 'atasanit123@gmail.com', '$2y$10$6AigiPh6pwLZmrnj9OqN2.jTODTnYyV788IVzy19bhH9QhB4VSaHC', '73886-2020-08-08-11-01-07.jpg', 'atasan_it', 'soRWGGg5lscquVKs3qn70JdXqaURphcOrbOYohfGSlv0gL6TOBnumApouqfY', '2020-08-08 11:01:07', '2020-08-08 11:01:07');
INSERT INTO `users` VALUES ('6', 'petugas', 'petugasit123', 'petugasit123@gmail.com', '$2y$10$ACai6WksAWfqKDHY.YeIyuWOKPCMr7NJog5y0dhnPY3xg/RLdA83m', '27161-2020-08-08-11-02-07.jpg', 'petugas_it', 'SQry33kF4D9BRJwXYfZzllHOZPFTrBIoWQnUtMl2ZBqBbqQXUdCbcjwLkbY1', '2020-08-08 11:02:07', '2020-08-08 11:02:07');
INSERT INTO `users` VALUES ('7', 'client', 'client123', 'client@gmail.com', '$2y$10$AYnCbTC8n/0BRwubkQdiouvEHG.HXIevVDiSQkemaAgOsqSTGhFBS', '96433-2020-08-11-07-40-17.jpg', 'user', 'aLd978K0ANBlqgxhg4nIaKy6QCDZXsobDo9bhR17Pp7SgQf3BJXROo7n1juZ', '2020-08-11 07:40:17', '2020-08-11 07:40:17');
INSERT INTO `users` VALUES ('8', 'clientbaru', 'clientbaru', 'clientbaru@gmail.com', '$2y$10$PWaMZigoUNtaGRjNsnytue.Q8Qgg5wP33lb.czK5b0Au8NxFHmeIC', '44562-2020-08-11-07-52-19.jpg', 'client', 'Xm5VYn86SEKmAQtlYY8h9TfoHVVDXJmFKV4D2BwOyOTPT0gQtLOmXOQB9lbX', '2020-08-11 07:52:19', '2020-08-11 07:52:19');
