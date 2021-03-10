/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50728
 Source Host           : localhost:3306
 Source Schema         : dewi_fitri

 Target Server Type    : MySQL
 Target Server Version : 50728
 File Encoding         : 65001

 Date: 02/03/2020 21:00:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_dosen
-- ----------------------------
DROP TABLE IF EXISTS `data_dosen`;
CREATE TABLE `data_dosen`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lulusan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_dosen
-- ----------------------------
INSERT INTO `data_dosen` VALUES (1, 'tes', 'tes', '11-11-2019');
INSERT INTO `data_dosen` VALUES (2, 'sfsdfsdfds', '2010', '11-11-2019');
INSERT INTO `data_dosen` VALUES (3, 'sfsdfsdfds', '2010', '11-11-2019');
INSERT INTO `data_dosen` VALUES (4, 'tes', 'tes', '11-11-2019');
INSERT INTO `data_dosen` VALUES (5, 'asdsad', 'asdasd', '11-11-2019');

-- ----------------------------
-- Table structure for data_kelas
-- ----------------------------
DROP TABLE IF EXISTS `data_kelas`;
CREATE TABLE `data_kelas`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_kelas` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_kelas
-- ----------------------------
INSERT INTO `data_kelas` VALUES (4, 'asdasdas', 'adssadsad', '10-10-2019');
INSERT INTO `data_kelas` VALUES (5, 'Kelas A', 'Kelas A', '10-10-2019');
INSERT INTO `data_kelas` VALUES (6, 'Kelas B', 'Kelas B', '10-10-2019');
INSERT INTO `data_kelas` VALUES (7, 'Kelas E', 'Kelas E', '10-10-2019');

-- ----------------------------
-- Table structure for data_komputer
-- ----------------------------
DROP TABLE IF EXISTS `data_komputer`;
CREATE TABLE `data_komputer`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama_komputer` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ruangan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `spesifikasi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_komputer
-- ----------------------------
INSERT INTO `data_komputer` VALUES (1, '1', '2', '3', '10-10-2019');
INSERT INTO `data_komputer` VALUES (2, '1', '1', '1', '11-10-2019');
INSERT INTO `data_komputer` VALUES (3, '1', '1', '1', '12-10-2019');
INSERT INTO `data_komputer` VALUES (4, '1', '1', '1', '12-11-2019');
INSERT INTO `data_komputer` VALUES (5, '1', '1', '1', '12-11-2019');
INSERT INTO `data_komputer` VALUES (6, '1', '1', '1', '13-11-2019');
INSERT INTO `data_komputer` VALUES (7, '1', '1', '1', '14-11-2019');
INSERT INTO `data_komputer` VALUES (8, '1', '1', '1', '14-12-2019');

-- ----------------------------
-- Table structure for data_kurikulum
-- ----------------------------
DROP TABLE IF EXISTS `data_kurikulum`;
CREATE TABLE `data_kurikulum`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_user` int(3) NULL DEFAULT NULL,
  `nama_kurikulum` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `semester` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_kurikulum
-- ----------------------------
INSERT INTO `data_kurikulum` VALUES (2, 1, 'asdsa', 'asdsa', '11-11-2019');

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
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_users
-- ----------------------------
INSERT INTO `tb_users` VALUES (5, 'dewi', 'ed1d859c50262701d92e5cbf39652792', 'amin@gmail.com', 1);

-- ----------------------------
-- View structure for v_data_dosen
-- ----------------------------
DROP VIEW IF EXISTS `v_data_dosen`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_dosen` AS select substr(`data_dosen`.`tahun`,4,2) AS `bulan`,substr(`data_dosen`.`tahun`,7,7) AS `tahun` from `data_dosen`;

-- ----------------------------
-- View structure for v_data_kelas
-- ----------------------------
DROP VIEW IF EXISTS `v_data_kelas`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_kelas` AS select substr(`data_kelas`.`tanggal`,4,2) AS `bulan`,substr(`data_kelas`.`tanggal`,7,7) AS `tahun` from `data_kelas`;

-- ----------------------------
-- View structure for v_data_komputer
-- ----------------------------
DROP VIEW IF EXISTS `v_data_komputer`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_komputer` AS select substr(`data_komputer`.`tanggal`,4,2) AS `bulan`,substr(`data_komputer`.`tanggal`,7,7) AS `tahun` from `data_komputer`;

-- ----------------------------
-- View structure for v_data_kurikulum
-- ----------------------------
DROP VIEW IF EXISTS `v_data_kurikulum`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `v_data_kurikulum` AS select substr(`data_kurikulum`.`tanggal`,4,2) AS `bulan`,substr(`data_kurikulum`.`tanggal`,7,7) AS `tahun` from `data_kurikulum`;

SET FOREIGN_KEY_CHECKS = 1;
