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

 Date: 01/04/2020 14:54:13
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

-- ----------------------------
-- Table structure for negara
-- ----------------------------
DROP TABLE IF EXISTS `negara`;
CREATE TABLE `negara`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_negara` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 247 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of negara
-- ----------------------------
INSERT INTO `negara` VALUES (1, 'AF', 'Afghanistan');
INSERT INTO `negara` VALUES (2, 'AL', 'Albania');
INSERT INTO `negara` VALUES (3, 'DZ', 'Algeria');
INSERT INTO `negara` VALUES (4, 'DS', 'American Samoa');
INSERT INTO `negara` VALUES (5, 'AD', 'Andorra');
INSERT INTO `negara` VALUES (6, 'AO', 'Angola');
INSERT INTO `negara` VALUES (7, 'AI', 'Anguilla');
INSERT INTO `negara` VALUES (8, 'AQ', 'Antarctica');
INSERT INTO `negara` VALUES (9, 'AG', 'Antigua and Barbuda');
INSERT INTO `negara` VALUES (10, 'AR', 'Argentina');
INSERT INTO `negara` VALUES (11, 'AM', 'Armenia');
INSERT INTO `negara` VALUES (12, 'AW', 'Aruba');
INSERT INTO `negara` VALUES (13, 'AU', 'Australia');
INSERT INTO `negara` VALUES (14, 'AT', 'Austria');
INSERT INTO `negara` VALUES (15, 'AZ', 'Azerbaijan');
INSERT INTO `negara` VALUES (16, 'BS', 'Bahamas');
INSERT INTO `negara` VALUES (17, 'BH', 'Bahrain');
INSERT INTO `negara` VALUES (18, 'BD', 'Bangladesh');
INSERT INTO `negara` VALUES (19, 'BB', 'Barbados');
INSERT INTO `negara` VALUES (20, 'BY', 'Belarus');
INSERT INTO `negara` VALUES (21, 'BE', 'Belgium');
INSERT INTO `negara` VALUES (22, 'BZ', 'Belize');
INSERT INTO `negara` VALUES (23, 'BJ', 'Benin');
INSERT INTO `negara` VALUES (24, 'BM', 'Bermuda');
INSERT INTO `negara` VALUES (25, 'BT', 'Bhutan');
INSERT INTO `negara` VALUES (26, 'BO', 'Bolivia');
INSERT INTO `negara` VALUES (27, 'BA', 'Bosnia and Herzegovina');
INSERT INTO `negara` VALUES (28, 'BW', 'Botswana');
INSERT INTO `negara` VALUES (29, 'BV', 'Bouvet Island');
INSERT INTO `negara` VALUES (30, 'BR', 'Brazil');
INSERT INTO `negara` VALUES (31, 'IO', 'British Indian Ocean Territory');
INSERT INTO `negara` VALUES (32, 'BN', 'Brunei Darussalam');
INSERT INTO `negara` VALUES (33, 'BG', 'Bulgaria');
INSERT INTO `negara` VALUES (34, 'BF', 'Burkina Faso');
INSERT INTO `negara` VALUES (35, 'BI', 'Burundi');
INSERT INTO `negara` VALUES (36, 'KH', 'Cambodia');
INSERT INTO `negara` VALUES (37, 'CM', 'Cameroon');
INSERT INTO `negara` VALUES (38, 'CA', 'Canada');
INSERT INTO `negara` VALUES (39, 'CV', 'Cape Verde');
INSERT INTO `negara` VALUES (40, 'KY', 'Cayman Islands');
INSERT INTO `negara` VALUES (41, 'CF', 'Central African Republic');
INSERT INTO `negara` VALUES (42, 'TD', 'Chad');
INSERT INTO `negara` VALUES (43, 'CL', 'Chile');
INSERT INTO `negara` VALUES (44, 'CN', 'China');
INSERT INTO `negara` VALUES (45, 'CX', 'Christmas Island');
INSERT INTO `negara` VALUES (46, 'CC', 'Cocos (Keeling) Islands');
INSERT INTO `negara` VALUES (47, 'CO', 'Colombia');
INSERT INTO `negara` VALUES (48, 'KM', 'Comoros');
INSERT INTO `negara` VALUES (49, 'CD', 'Democratic Republic of the Congo');
INSERT INTO `negara` VALUES (50, 'CG', 'Republic of Congo');
INSERT INTO `negara` VALUES (51, 'CK', 'Cook Islands');
INSERT INTO `negara` VALUES (52, 'CR', 'Costa Rica');
INSERT INTO `negara` VALUES (53, 'HR', 'Croatia (Hrvatska)');
INSERT INTO `negara` VALUES (54, 'CU', 'Cuba');
INSERT INTO `negara` VALUES (55, 'CY', 'Cyprus');
INSERT INTO `negara` VALUES (56, 'CZ', 'Czech Republic');
INSERT INTO `negara` VALUES (57, 'DK', 'Denmark');
INSERT INTO `negara` VALUES (58, 'DJ', 'Djibouti');
INSERT INTO `negara` VALUES (59, 'DM', 'Dominica');
INSERT INTO `negara` VALUES (60, 'DO', 'Dominican Republic');
INSERT INTO `negara` VALUES (61, 'TP', 'East Timor');
INSERT INTO `negara` VALUES (62, 'EC', 'Ecuador');
INSERT INTO `negara` VALUES (63, 'EG', 'Egypt');
INSERT INTO `negara` VALUES (64, 'SV', 'El Salvador');
INSERT INTO `negara` VALUES (65, 'GQ', 'Equatorial Guinea');
INSERT INTO `negara` VALUES (66, 'ER', 'Eritrea');
INSERT INTO `negara` VALUES (67, 'EE', 'Estonia');
INSERT INTO `negara` VALUES (68, 'ET', 'Ethiopia');
INSERT INTO `negara` VALUES (69, 'FK', 'Falkland Islands (Malvinas)');
INSERT INTO `negara` VALUES (70, 'FO', 'Faroe Islands');
INSERT INTO `negara` VALUES (71, 'FJ', 'Fiji');
INSERT INTO `negara` VALUES (72, 'FI', 'Finland');
INSERT INTO `negara` VALUES (73, 'FR', 'France');
INSERT INTO `negara` VALUES (74, 'FX', 'France, Metropolitan');
INSERT INTO `negara` VALUES (75, 'GF', 'French Guiana');
INSERT INTO `negara` VALUES (76, 'PF', 'French Polynesia');
INSERT INTO `negara` VALUES (77, 'TF', 'French Southern Territories');
INSERT INTO `negara` VALUES (78, 'GA', 'Gabon');
INSERT INTO `negara` VALUES (79, 'GM', 'Gambia');
INSERT INTO `negara` VALUES (80, 'GE', 'Georgia');
INSERT INTO `negara` VALUES (81, 'DE', 'Germany');
INSERT INTO `negara` VALUES (82, 'GH', 'Ghana');
INSERT INTO `negara` VALUES (83, 'GI', 'Gibraltar');
INSERT INTO `negara` VALUES (84, 'GK', 'Guernsey');
INSERT INTO `negara` VALUES (85, 'GR', 'Greece');
INSERT INTO `negara` VALUES (86, 'GL', 'Greenland');
INSERT INTO `negara` VALUES (87, 'GD', 'Grenada');
INSERT INTO `negara` VALUES (88, 'GP', 'Guadeloupe');
INSERT INTO `negara` VALUES (89, 'GU', 'Guam');
INSERT INTO `negara` VALUES (90, 'GT', 'Guatemala');
INSERT INTO `negara` VALUES (91, 'GN', 'Guinea');
INSERT INTO `negara` VALUES (92, 'GW', 'Guinea-Bissau');
INSERT INTO `negara` VALUES (93, 'GY', 'Guyana');
INSERT INTO `negara` VALUES (94, 'HT', 'Haiti');
INSERT INTO `negara` VALUES (95, 'HM', 'Heard and Mc Donald Islands');
INSERT INTO `negara` VALUES (96, 'HN', 'Honduras');
INSERT INTO `negara` VALUES (97, 'HK', 'Hong Kong');
INSERT INTO `negara` VALUES (98, 'HU', 'Hungary');
INSERT INTO `negara` VALUES (99, 'IS', 'Iceland');
INSERT INTO `negara` VALUES (100, 'IN', 'India');
INSERT INTO `negara` VALUES (101, 'IM', 'Isle of Man');
INSERT INTO `negara` VALUES (102, 'ID', 'Indonesia');
INSERT INTO `negara` VALUES (103, 'IR', 'Iran (Islamic Republic of)');
INSERT INTO `negara` VALUES (104, 'IQ', 'Iraq');
INSERT INTO `negara` VALUES (105, 'IE', 'Ireland');
INSERT INTO `negara` VALUES (106, 'IL', 'Israel');
INSERT INTO `negara` VALUES (107, 'IT', 'Italy');
INSERT INTO `negara` VALUES (108, 'CI', 'Ivory Coast');
INSERT INTO `negara` VALUES (109, 'JE', 'Jersey');
INSERT INTO `negara` VALUES (110, 'JM', 'Jamaica');
INSERT INTO `negara` VALUES (111, 'JP', 'Japan');
INSERT INTO `negara` VALUES (112, 'JO', 'Jordan');
INSERT INTO `negara` VALUES (113, 'KZ', 'Kazakhstan');
INSERT INTO `negara` VALUES (114, 'KE', 'Kenya');
INSERT INTO `negara` VALUES (115, 'KI', 'Kiribati');
INSERT INTO `negara` VALUES (116, 'KP', 'Korea, Democratic People\'s Republic of');
INSERT INTO `negara` VALUES (117, 'KR', 'Korea, Republic of');
INSERT INTO `negara` VALUES (118, 'XK', 'Kosovo');
INSERT INTO `negara` VALUES (119, 'KW', 'Kuwait');
INSERT INTO `negara` VALUES (120, 'KG', 'Kyrgyzstan');
INSERT INTO `negara` VALUES (121, 'LA', 'Lao People\'s Democratic Republic');
INSERT INTO `negara` VALUES (122, 'LV', 'Latvia');
INSERT INTO `negara` VALUES (123, 'LB', 'Lebanon');
INSERT INTO `negara` VALUES (124, 'LS', 'Lesotho');
INSERT INTO `negara` VALUES (125, 'LR', 'Liberia');
INSERT INTO `negara` VALUES (126, 'LY', 'Libyan Arab Jamahiriya');
INSERT INTO `negara` VALUES (127, 'LI', 'Liechtenstein');
INSERT INTO `negara` VALUES (128, 'LT', 'Lithuania');
INSERT INTO `negara` VALUES (129, 'LU', 'Luxembourg');
INSERT INTO `negara` VALUES (130, 'MO', 'Macau');
INSERT INTO `negara` VALUES (131, 'MK', 'North Macedonia');
INSERT INTO `negara` VALUES (132, 'MG', 'Madagascar');
INSERT INTO `negara` VALUES (133, 'MW', 'Malawi');
INSERT INTO `negara` VALUES (134, 'MY', 'Malaysia');
INSERT INTO `negara` VALUES (135, 'MV', 'Maldives');
INSERT INTO `negara` VALUES (136, 'ML', 'Mali');
INSERT INTO `negara` VALUES (137, 'MT', 'Malta');
INSERT INTO `negara` VALUES (138, 'MH', 'Marshall Islands');
INSERT INTO `negara` VALUES (139, 'MQ', 'Martinique');
INSERT INTO `negara` VALUES (140, 'MR', 'Mauritania');
INSERT INTO `negara` VALUES (141, 'MU', 'Mauritius');
INSERT INTO `negara` VALUES (142, 'TY', 'Mayotte');
INSERT INTO `negara` VALUES (143, 'MX', 'Mexico');
INSERT INTO `negara` VALUES (144, 'FM', 'Micronesia, Federated States of');
INSERT INTO `negara` VALUES (145, 'MD', 'Moldova, Republic of');
INSERT INTO `negara` VALUES (146, 'MC', 'Monaco');
INSERT INTO `negara` VALUES (147, 'MN', 'Mongolia');
INSERT INTO `negara` VALUES (148, 'ME', 'Montenegro');
INSERT INTO `negara` VALUES (149, 'MS', 'Montserrat');
INSERT INTO `negara` VALUES (150, 'MA', 'Morocco');
INSERT INTO `negara` VALUES (151, 'MZ', 'Mozambique');
INSERT INTO `negara` VALUES (152, 'MM', 'Myanmar');
INSERT INTO `negara` VALUES (153, 'NA', 'Namibia');
INSERT INTO `negara` VALUES (154, 'NR', 'Nauru');
INSERT INTO `negara` VALUES (155, 'NP', 'Nepal');
INSERT INTO `negara` VALUES (156, 'NL', 'Netherlands');
INSERT INTO `negara` VALUES (157, 'AN', 'Netherlands Antilles');
INSERT INTO `negara` VALUES (158, 'NC', 'New Caledonia');
INSERT INTO `negara` VALUES (159, 'NZ', 'New Zealand');
INSERT INTO `negara` VALUES (160, 'NI', 'Nicaragua');
INSERT INTO `negara` VALUES (161, 'NE', 'Niger');
INSERT INTO `negara` VALUES (162, 'NG', 'Nigeria');
INSERT INTO `negara` VALUES (163, 'NU', 'Niue');
INSERT INTO `negara` VALUES (164, 'NF', 'Norfolk Island');
INSERT INTO `negara` VALUES (165, 'MP', 'Northern Mariana Islands');
INSERT INTO `negara` VALUES (166, 'NO', 'Norway');
INSERT INTO `negara` VALUES (167, 'OM', 'Oman');
INSERT INTO `negara` VALUES (168, 'PK', 'Pakistan');
INSERT INTO `negara` VALUES (169, 'PW', 'Palau');
INSERT INTO `negara` VALUES (170, 'PS', 'Palestine');
INSERT INTO `negara` VALUES (171, 'PA', 'Panama');
INSERT INTO `negara` VALUES (172, 'PG', 'Papua New Guinea');
INSERT INTO `negara` VALUES (173, 'PY', 'Paraguay');
INSERT INTO `negara` VALUES (174, 'PE', 'Peru');
INSERT INTO `negara` VALUES (175, 'PH', 'Philippines');
INSERT INTO `negara` VALUES (176, 'PN', 'Pitcairn');
INSERT INTO `negara` VALUES (177, 'PL', 'Poland');
INSERT INTO `negara` VALUES (178, 'PT', 'Portugal');
INSERT INTO `negara` VALUES (179, 'PR', 'Puerto Rico');
INSERT INTO `negara` VALUES (180, 'QA', 'Qatar');
INSERT INTO `negara` VALUES (181, 'RE', 'Reunion');
INSERT INTO `negara` VALUES (182, 'RO', 'Romania');
INSERT INTO `negara` VALUES (183, 'RU', 'Russian Federation');
INSERT INTO `negara` VALUES (184, 'RW', 'Rwanda');
INSERT INTO `negara` VALUES (185, 'KN', 'Saint Kitts and Nevis');
INSERT INTO `negara` VALUES (186, 'LC', 'Saint Lucia');
INSERT INTO `negara` VALUES (187, 'VC', 'Saint Vincent and the Grenadines');
INSERT INTO `negara` VALUES (188, 'WS', 'Samoa');
INSERT INTO `negara` VALUES (189, 'SM', 'San Marino');
INSERT INTO `negara` VALUES (190, 'ST', 'Sao Tome and Principe');
INSERT INTO `negara` VALUES (191, 'SA', 'Saudi Arabia');
INSERT INTO `negara` VALUES (192, 'SN', 'Senegal');
INSERT INTO `negara` VALUES (193, 'RS', 'Serbia');
INSERT INTO `negara` VALUES (194, 'SC', 'Seychelles');
INSERT INTO `negara` VALUES (195, 'SL', 'Sierra Leone');
INSERT INTO `negara` VALUES (196, 'SG', 'Singapore');
INSERT INTO `negara` VALUES (197, 'SK', 'Slovakia');
INSERT INTO `negara` VALUES (198, 'SI', 'Slovenia');
INSERT INTO `negara` VALUES (199, 'SB', 'Solomon Islands');
INSERT INTO `negara` VALUES (200, 'SO', 'Somalia');
INSERT INTO `negara` VALUES (201, 'ZA', 'South Africa');
INSERT INTO `negara` VALUES (202, 'GS', 'South Georgia South Sandwich Islands');
INSERT INTO `negara` VALUES (203, 'SS', 'South Sudan');
INSERT INTO `negara` VALUES (204, 'ES', 'Spain');
INSERT INTO `negara` VALUES (205, 'LK', 'Sri Lanka');
INSERT INTO `negara` VALUES (206, 'SH', 'St. Helena');
INSERT INTO `negara` VALUES (207, 'PM', 'St. Pierre and Miquelon');
INSERT INTO `negara` VALUES (208, 'SD', 'Sudan');
INSERT INTO `negara` VALUES (209, 'SR', 'Suriname');
INSERT INTO `negara` VALUES (210, 'SJ', 'Svalbard and Jan Mayen Islands');
INSERT INTO `negara` VALUES (211, 'SZ', 'Swaziland');
INSERT INTO `negara` VALUES (212, 'SE', 'Sweden');
INSERT INTO `negara` VALUES (213, 'CH', 'Switzerland');
INSERT INTO `negara` VALUES (214, 'SY', 'Syrian Arab Republic');
INSERT INTO `negara` VALUES (215, 'TW', 'Taiwan');
INSERT INTO `negara` VALUES (216, 'TJ', 'Tajikistan');
INSERT INTO `negara` VALUES (217, 'TZ', 'Tanzania, United Republic of');
INSERT INTO `negara` VALUES (218, 'TH', 'Thailand');
INSERT INTO `negara` VALUES (219, 'TG', 'Togo');
INSERT INTO `negara` VALUES (220, 'TK', 'Tokelau');
INSERT INTO `negara` VALUES (221, 'TO', 'Tonga');
INSERT INTO `negara` VALUES (222, 'TT', 'Trinidad and Tobago');
INSERT INTO `negara` VALUES (223, 'TN', 'Tunisia');
INSERT INTO `negara` VALUES (224, 'TR', 'Turkey');
INSERT INTO `negara` VALUES (225, 'TM', 'Turkmenistan');
INSERT INTO `negara` VALUES (226, 'TC', 'Turks and Caicos Islands');
INSERT INTO `negara` VALUES (227, 'TV', 'Tuvalu');
INSERT INTO `negara` VALUES (228, 'UG', 'Uganda');
INSERT INTO `negara` VALUES (229, 'UA', 'Ukraine');
INSERT INTO `negara` VALUES (230, 'AE', 'United Arab Emirates');
INSERT INTO `negara` VALUES (231, 'GB', 'United Kingdom');
INSERT INTO `negara` VALUES (232, 'US', 'United States');
INSERT INTO `negara` VALUES (233, 'UM', 'United States minor outlying islands');
INSERT INTO `negara` VALUES (234, 'UY', 'Uruguay');
INSERT INTO `negara` VALUES (235, 'UZ', 'Uzbekistan');
INSERT INTO `negara` VALUES (236, 'VU', 'Vanuatu');
INSERT INTO `negara` VALUES (237, 'VA', 'Vatican City State');
INSERT INTO `negara` VALUES (238, 'VE', 'Venezuela');
INSERT INTO `negara` VALUES (239, 'VN', 'Vietnam');
INSERT INTO `negara` VALUES (240, 'VG', 'Virgin Islands (British)');
INSERT INTO `negara` VALUES (241, 'VI', 'Virgin Islands (U.S.)');
INSERT INTO `negara` VALUES (242, 'WF', 'Wallis and Futuna Islands');
INSERT INTO `negara` VALUES (243, 'EH', 'Western Sahara');
INSERT INTO `negara` VALUES (244, 'YE', 'Yemen');
INSERT INTO `negara` VALUES (245, 'ZM', 'Zambia');
INSERT INTO `negara` VALUES (246, 'ZW', 'Zimbabwe');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `authKey` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `accessToken` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `userType` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kelurahan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_telepon` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'andrinugroho', '', '2e79592c5e4777ead6ac683ae114288f', '', '', 'posko', 1, 10, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (2, 'teknosuper', NULL, '2e79592c5e4777ead6ac683ae114288f', 'teknosuper@gmail.com', NULL, 'admin', 2, 10, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, 'andriune', NULL, '2e79592c5e4777ead6ac683ae114288f', NULL, NULL, 'admin', 1, 10, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (4, 'warga1', NULL, '2e79592c5e4777ead6ac683ae114288f', NULL, NULL, 'pengguna', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (5, 'warga2', NULL, '2e79592c5e4777ead6ac683ae114288f', NULL, NULL, 'pengguna', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (6, 'warga3', NULL, '2e79592c5e4777ead6ac683ae114288f', NULL, NULL, 'pengguna', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (7, 'warga4', NULL, '2e79592c5e4777ead6ac683ae114288f', NULL, NULL, 'pengguna', NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (8, 'andriyunianto', 'y5KI2ncb4FA1b6DJZ6a4p085_PIeyAp6', '1a1b7f4f646f870b3fdbc545fc090e13', 'andriuneyunianto@gmail.com', NULL, 'posko', 6, 10, 'Andri Yunianto', '3308022011', 'Cawangsari RT 3 RW 3 Borobudur', NULL, '2020-03-31 07:24:32', NULL);
INSERT INTO `users` VALUES (9, 'hatma', 'LfLLhxYdpC1FGWgDvgdYv8T2_TykcF2m', 'e10adc3949ba59abbe56e057f20f883e', 'hatma@gmail.com', NULL, 'pengguna', NULL, 10, 'Hatma', '3308022011', 'Cawangsari RT 3 RW 3', NULL, '2020-03-31 07:39:45', NULL);
INSERT INTO `users` VALUES (10, 'wargacontoh1', 'f8FRDGNnx1lU5EjFAC-QKxw4KpyZqLQ-', '2e79592c5e4777ead6ac683ae114288f', 'wargacontoh@gmail.com', NULL, 'pengguna', NULL, 10, 'Warga contoh', '3326112016', 'gh totogan RT 1 rw 1 no.37', NULL, '2020-03-31 12:22:11', NULL);
INSERT INTO `users` VALUES (11, 'ernissetya', 'QswSOqek_cdJnv51adBIpBjR3nzC7HwS', 'c2867b1d6d2662ba5e02220bf26cc989', 'erni.setya9394@gmail.com', NULL, 'pengguna', NULL, 10, 'Erni Setyawati', '3308022011', 'Gejagan RT 01/11 Borobudur', NULL, '2020-03-31 13:17:41', NULL);
INSERT INTO `users` VALUES (12, 'budi', 'wLiA5bRdVJM-SW10HYY6uiApplEL0Tip', '02973fedc2ac6bed51f9788ca5889d4e', 'budijonjang@gmail.com', NULL, 'pengguna', NULL, 10, 'Listya budi', '3326112016', 'Rt 04/01', NULL, '2020-03-31 14:22:06', NULL);
INSERT INTO `users` VALUES (13, 'Jeruk', 'KNYvlENNXQHpls5r5StrXJGtAy50EwM6', '39d13cb922745c56bb0a8e5f1226d01f', 'Mashurisukendar976@gmail.com', NULL, 'pengguna', NULL, 10, 'Mashuri Sukendar', '3326112016', 'Rt012/rw003', NULL, '2020-03-31 14:26:56', NULL);
INSERT INTO `users` VALUES (14, 'fazalmuttaqun', 'A0pDTEqwf4sk__jr8gjMdf9uOC81dkWY', 'e24bf113fdc24b84a09c234fae6f93d7', 'muttaqunfazal@gmail.com', NULL, 'pengguna', NULL, 10, 'Fazal Muttaqun', '3326112016', 'RT 11 RW 03', NULL, '2020-03-31 14:30:32', NULL);
INSERT INTO `users` VALUES (15, 'syaiful', 'dKYzNJdLpMKagTU_BBGc9mU09jrhTAC1', 'd98a58955aa6a79d0b600b929d11821f', 'sarjanamuda@yahoo.co.id', NULL, 'pengguna', NULL, 10, 'Syaiful bahri', '3326112016', 'rt03 rw01', NULL, '2020-03-31 19:45:40', NULL);

SET FOREIGN_KEY_CHECKS = 1;
