/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100139
 Source Host           : localhost:3306
 Source Schema         : app_lola

 Target Server Type    : MySQL
 Target Server Version : 100139
 File Encoding         : 65001

 Date: 18/09/2019 10:05:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_data_keluhan
-- ----------------------------
DROP TABLE IF EXISTS `tb_data_keluhan`;
CREATE TABLE `tb_data_keluhan`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `referensi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_create` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `service_number` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `subject_p` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contact_person` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_pengaduan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `action` enum('open','close') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_data_keluhan
-- ----------------------------
INSERT INTO `tb_data_keluhan` VALUES (5, 'asdsASDASD', 'adsasdsad', 'asdsadsad', 'saddsa', 'asdasasdsad', 'sadsasadsad', 'sadsadasdsad', 'open');

-- ----------------------------
-- Table structure for tb_data_pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `tb_data_pelanggan`;
CREATE TABLE `tb_data_pelanggan`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `no_internet` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_pasang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `segment` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kelurahan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contact_person` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pilihan` enum('update','delete') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_data_pelanggan
-- ----------------------------
INSERT INTO `tb_data_pelanggan` VALUES (11, 'asdsad', 'asdsad', 'asdsa', 'asdsa', 'asdsa', 'asdasdsa', 'asdsad', 'asdsa', 'asds', 'asdasasdasdsaasdasd', 'update');
INSERT INTO `tb_data_pelanggan` VALUES (12, '1sadsad', '1asdasd', 'asdsa', 'asdas', 'asds', 'asd', 'asdsa', 'asdsad', 'asdsad', 'asdasd', 'update');

-- ----------------------------
-- Table structure for tb_menus
-- ----------------------------
DROP TABLE IF EXISTS `tb_menus`;
CREATE TABLE `tb_menus`  (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_menus
-- ----------------------------
INSERT INTO `tb_menus` VALUES (1, 'tambah_menu', 'tambah_menu.php', 1);
INSERT INTO `tb_menus` VALUES (2, 'tambah_user', 'tambah_user.php', 1);
INSERT INTO `tb_menus` VALUES (3, 'all_users', 'all_users.php', 1);

-- ----------------------------
-- Table structure for tb_status_internet
-- ----------------------------
DROP TABLE IF EXISTS `tb_status_internet`;
CREATE TABLE `tb_status_internet`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `no_internet` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_port` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_bayar` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_status_internet
-- ----------------------------
INSERT INTO `tb_status_internet` VALUES (5, 'ok', 'qwewq', 'qwe', 'qwe', 'qwe', 'qwe', 'qwewq');

-- ----------------------------
-- Table structure for tb_tagihan_pelanggan
-- ----------------------------
DROP TABLE IF EXISTS `tb_tagihan_pelanggan`;
CREATE TABLE `tb_tagihan_pelanggan`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `periode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mata_uang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_tagihan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `belum_bayar` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_pembayaran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lokasi_pembayaran` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cicilan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time(3) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tagihan_pelanggan
-- ----------------------------
INSERT INTO `tb_tagihan_pelanggan` VALUES (2, 'lola', 'sdfsdasdasd', 'sdf', 'sdf', 'sdfasdsad', 'sdfasdsa', 'sdfsd', '0000-00-00', '00:00:01.000');

-- ----------------------------
-- Table structure for tb_users
-- ----------------------------
DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` int(3) NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_users
-- ----------------------------
INSERT INTO `tb_users` VALUES (5, 'lola', 'fceeb9b9d469401fe558062c4bd25954', 'amin@gmail.com', 1);

SET FOREIGN_KEY_CHECKS = 1;
