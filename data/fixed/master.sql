/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100144
 Source Host           : localhost:3306
 Source Schema         : desalaporcovid

 Target Server Type    : MySQL
 Target Server Version : 100144
 File Encoding         : 65001

 Date: 01/04/2020 14:52:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jenis
-- ----------------------------
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis`  (
  `id_jenis` int(11) NOT NULL,
  `nama` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of jenis
-- ----------------------------
INSERT INTO `jenis` VALUES (1, 'kabupaten');
INSERT INTO `jenis` VALUES (2, 'kota');
INSERT INTO `jenis` VALUES (3, 'kelurahan');
INSERT INTO `jenis` VALUES (4, 'desa');

-- ----------------------------
-- Table structure for jenis_laporan
-- ----------------------------
DROP TABLE IF EXISTS `jenis_laporan`;
CREATE TABLE `jenis_laporan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_laporan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `kode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of jenis_laporan
-- ----------------------------
INSERT INTO `jenis_laporan` VALUES (1, 'Pasien Dalam Pantauan', 'PDP adalah mereka yang memiliki gejala panas badan dan gangguan saluran pernapasan. Gangguan saluran pernapasan itu bisa ringan atau berat, serta pernah berkunjung ke atau tinggal di daerah yang diketahui merupakan daerah penularan Covid-19. Tidak hanya i', 1, 'PDP');
INSERT INTO `jenis_laporan` VALUES (2, 'Orang Dalam Pantauan', 'ODP adalah mereka yang memiliki gejala panas badan atau gangguan saluran pernapasan ringan, dan pernah mengunjungi atau tinggal di daerah yang diketahui merupakan daerah penularan virus tersebut. Artikel ini telah tayang di Kompas.com dengan judul \"Tentan', 1, 'ODP');
INSERT INTO `jenis_laporan` VALUES (3, 'Suspek', 'hasil pemeriksaannya tidak dapat disimpulkan (tidak positif, tetapi juga tidak negatif).', 1, 'SUSPEK');
INSERT INTO `jenis_laporan` VALUES (4, 'Pendatang / Pemudik', 'Orang Datang Dari Luar Kota', 1, 'DATANG');
INSERT INTO `jenis_laporan` VALUES (5, 'Pergi', 'Orang Yang Akan Keluar Kota', 1, 'PERGI');

SET FOREIGN_KEY_CHECKS = 1;
