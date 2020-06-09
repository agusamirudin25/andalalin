/*
 Navicat Premium Data Transfer

 Source Server         : kominfo
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : db_andalalin

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 09/06/2020 20:17:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pemohon
-- ----------------------------
DROP TABLE IF EXISTS `pemohon`;
CREATE TABLE `pemohon`  (
  `nik` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat_lahir` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `agama` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_npwp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ktp` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `npwp` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `katasandi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_daftar` date NOT NULL,
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemohon
-- ----------------------------
INSERT INTO `pemohon` VALUES ('3210122508960001', 'Agus Amirudin', 'Karawang', '1996-08-25', 'L', 'Gandu', 'islam', '21283932723837', 'ktp_3210122508960001.pdf', 'npwp_3210122508960001.pdf', 'c4ca4238a0b923820dcc509a6f75849b', '2019-11-09');
INSERT INTO `pemohon` VALUES ('3210122508960002', 'Agung Gumilar', 'Majalengka', '2019-12-03', 'P', 'Karawang Indah', 'islam', '21283932723333', 'ktp_3210122508960002.pdf', 'npwp_3210122508960002.pdf', 'c4ca4238a0b923820dcc509a6f75849b', '2019-12-05');

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `nip` varchar(22) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `katasandi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`nip`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES ('1111', 'Agus Amirudin', 'staff admin', 'c4ca4238a0b923820dcc509a6f75849b', 'admin');
INSERT INTO `pengguna` VALUES ('196808161989031007', 'Arief Bijaksana Maryugo, S.IP', 'kepala dinas', 'c4ca4238a0b923820dcc509a6f75849b', 'kadis');
INSERT INTO `pengguna` VALUES ('1977206021994031006', 'Ade Safrudin P, SE., MM', 'kepala bidang lalu lintas', 'c4ca4238a0b923820dcc509a6f75849b', 'kabid');

-- ----------------------------
-- Table structure for perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan`  (
  `no_registrasi` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_nib` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_perusahaan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_akte` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_akte` date NOT NULL,
  `akte_perusahaan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_npwp_perusahaan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_npwp_perusahaan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_npwp_perusahaan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `npwp_perusahaan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_surat_bpn` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_bpn` date NOT NULL,
  `nama_pembangunan_bpn` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_lokasi_bpn` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `luas_lahan_bpn` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `surat_bpn` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_alih_fungsi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_alih_fungsi` date NOT NULL,
  `perihal_alih_fungsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_izin_lokasi` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_izin_lokasi` date NOT NULL,
  `kriteria_pembangunan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_pembangunan` int(5) NOT NULL,
  `jumlah_ruang_terbangun` int(5) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  PRIMARY KEY (`no_registrasi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perusahaan
-- ----------------------------
INSERT INTO `perusahaan` VALUES ('R191209001', '3253736256736', '3210122508960001', 'PT Pusaka Abadi', '83929282', '2019-11-06', 'akte_R191209001.pdf', '32234839283383', 'PT Pusaka Abadi', 'Rawamerta', 'npwp_R191209001.pdf', '24', '2019-11-14', 'Ruko Mas', 'Kedungwaringin', '20', 'bpn_R191209001.pdf', '23', '2019-11-19', 'djsahdjhasdhsdj', '22', '2019-11-13', 'kriteria_R191209001.pdf', 12, 3, '0000-00-00');
INSERT INTO `perusahaan` VALUES ('R191209002', '2317363728', '3210122508960002', 'PT Makmur Sentosa', 'A/20-2019', '2019-12-02', 'akte_R191209002.pdf', '237327627626', 'PT Makmur Sentosa', 'Jl Rengasdengklok No 5', 'npwp_R191209002.pdf', '7', '2019-12-01', 'Pemukiman', 'Rengasdengklok', '23', 'bpn_R191209002.pdf', '3', '2019-12-01', 'Pemukiman warga', '23', '2019-12-02', 'kriteria_R191209002.pdf', 62, 6, '2019-12-09');
INSERT INTO `perusahaan` VALUES ('R191210003', '2333323333', '3210122508960001', 'PT Makmur Sentosa', '38272837625', '2019-12-02', 'akte_R191210003.pdf', '233333433333', 'PT Makmur Sentosa', 'Jl Rengasdengklok No 5', 'npwp_R191210003.pdf', '7', '2019-12-02', 'Pemukiman', 'Rengasdengklok', '2', 'bpn_R191210003.pdf', '23', '2019-12-03', 'Pemukiman warga', '344', '2019-12-03', 'kriteria_R191210003.pdf', 34, 2, '2019-12-10');
INSERT INTO `perusahaan` VALUES ('R191210004', '2333', '3210122508960001', 'PT Perwira Merah Merpati', 'A/20-2019', '2019-10-16', 'akte_R191210004.pdf', '3324242424242', 'PT Perwira Merah Merpati', 'Jl Rengasdengklok No 45', 'npwp_R191210004.pdf', '72', '2019-11-13', 'Pemukiman', 'Rengasdengklok', '23', 'bpn_R191210004.pdf', '23', '2019-09-18', 'Pemukiman warga', '32', '2019-12-04', 'kriteria_R191210004.pdf', 23, 2, '2019-12-10');

-- ----------------------------
-- Table structure for rekomendasi
-- ----------------------------
DROP TABLE IF EXISTS `rekomendasi`;
CREATE TABLE `rekomendasi`  (
  `kode_rekomendasi` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_tinjauan` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_registrasi` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nip` varchar(22) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  PRIMARY KEY (`kode_rekomendasi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rekomendasi
-- ----------------------------
INSERT INTO `rekomendasi` VALUES ('R0001', 'T0001', '3210122508960001', 'R191209001', '196808161989031007', 'sesuai', '2019-12-10 19:57:46');

-- ----------------------------
-- Table structure for saran
-- ----------------------------
DROP TABLE IF EXISTS `saran`;
CREATE TABLE `saran`  (
  `id_saran` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `komentar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  PRIMARY KEY (`id_saran`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of saran
-- ----------------------------
INSERT INTO `saran` VALUES ('S0001', 'Agus Amirudin', 'aamirudinkom@gmail.com', 'Ini adalah komentar pertama saya. Saya mencoba menggunakan aplikasi perizinan analisis dampak lalulintas', '2019-11-09 14:54:26');
INSERT INTO `saran` VALUES ('S0002', 'Agung Gumilar', 'bemstmikkharisma92@gmail.com', 'Bagaimana cara menggunakan aplikasi ini di HP ?', '2019-11-09 21:37:33');

-- ----------------------------
-- Table structure for tinjauan
-- ----------------------------
DROP TABLE IF EXISTS `tinjauan`;
CREATE TABLE `tinjauan`  (
  `kode_tinjauan` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_registrasi` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nip` varchar(22) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  PRIMARY KEY (`kode_tinjauan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tinjauan
-- ----------------------------
INSERT INTO `tinjauan` VALUES ('T0001', '3210122508960001', 'R191209001', '1977206021994031006', 'sesuai', '2019-12-10 12:12:36');
INSERT INTO `tinjauan` VALUES ('T0003', '3210122508960002', 'R191209002', '1977206021994031006', 'sesuai', '2019-12-10 17:14:23');
INSERT INTO `tinjauan` VALUES ('T0004', '3210122508960001', 'R191210003', '1977206021994031006', 'sesuai', '2019-12-11 00:14:39');

SET FOREIGN_KEY_CHECKS = 1;
