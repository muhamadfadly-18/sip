/*
Navicat MySQL Data Transfer

Source Server         : Lokal
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_inventory

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-03-01 13:04:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `account`
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `no_account` varchar(50) NOT NULL,
  `nama_account` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of account
-- ----------------------------

-- ----------------------------
-- Table structure for `account_payable`
-- ----------------------------
DROP TABLE IF EXISTS `account_payable`;
CREATE TABLE `account_payable` (
  `id_account_payable` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) DEFAULT NULL,
  `po_date` date NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `date` date DEFAULT NULL,
  `ammount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_account_payable`),
  KEY `po_number` (`po_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of account_payable
-- ----------------------------

-- ----------------------------
-- Table structure for `account_received`
-- ----------------------------
DROP TABLE IF EXISTS `account_received`;
CREATE TABLE `account_received` (
  `id_account_received` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) DEFAULT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `peb_number` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  `ammount` decimal(10,2) DEFAULT NULL,
  `qty` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_account_received`),
  KEY `po_number` (`po_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of account_received
-- ----------------------------

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('756cb5e075462217a4c149218fe4fa30', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', '1614575635', 'a:6:{s:9:\"user_data\";s:0:\"\";s:9:\"logged_in\";s:12:\"Terima Kasih\";s:8:\"username\";s:5:\"admin\";s:12:\"nama_lengkap\";s:13:\"Administrator\";s:5:\"level\";s:11:\"super admin\";s:4:\"foto\";s:10:\"images.png\";}');

-- ----------------------------
-- Table structure for `export`
-- ----------------------------
DROP TABLE IF EXISTS `export`;
CREATE TABLE `export` (
  `id_export` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) NOT NULL,
  `peb_number` varchar(50) DEFAULT NULL,
  `peb_date` date DEFAULT NULL,
  `invoice_no` varchar(11) NOT NULL,
  `no_bukti_pengeluaran_barang` varchar(50) DEFAULT NULL,
  `tanggal_bukti_pengeluaran_barang` date DEFAULT NULL,
  `pembeli_penerima` varchar(11) DEFAULT NULL,
  `negara_tujuan` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `mata_uang` varchar(50) NOT NULL,
  `nilai_barang` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_export`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of export
-- ----------------------------

-- ----------------------------
-- Table structure for `finish_goods`
-- ----------------------------
DROP TABLE IF EXISTS `finish_goods`;
CREATE TABLE `finish_goods` (
  `id_finish_goods` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) DEFAULT NULL,
  `bukti_penerimaan_no` varchar(50) DEFAULT NULL,
  `tanggal_finish_goods` date DEFAULT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `jumlah_dari_produksi` varchar(50) NOT NULL,
  `jumlah_dari_subkontrak` varchar(50) NOT NULL,
  `gudang` varchar(50) NOT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_finish_goods`),
  KEY `po_number` (`po_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of finish_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `import`
-- ----------------------------
DROP TABLE IF EXISTS `import`;
CREATE TABLE `import` (
  `id_import` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) DEFAULT NULL,
  `jenis_doc` varchar(50) NOT NULL,
  `dokumen_pabean_no` varchar(50) NOT NULL,
  `tanggal_dokumen_pabean` date NOT NULL,
  `no_seri_barang` varchar(50) NOT NULL,
  `no_bukti_penerimaan_barang` varchar(50) NOT NULL,
  `tanggal_bukti_penerimaan_barang` date NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `mata_uang` varchar(50) NOT NULL,
  `nilai_barang` varchar(50) NOT NULL,
  `gudang` varchar(50) NOT NULL,
  `penerima_subkontrak` varchar(50) NOT NULL,
  `negara_asal_barang` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `adjustment` decimal(10,2) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_import`),
  KEY `po_number` (`po_number`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of import
-- ----------------------------
INSERT INTO `import` VALUES ('1', '001', 'BC 2.3', '000745', '2020-10-08', '012151', '11214', '2020-10-08', '1211', 'ABC', 'PCE', '2', 'Rp', '100000', 'jaya', '', '', 'admin', '0.00', null, '2020-10-09 00:27:50');
INSERT INTO `import` VALUES ('2', '1', '1', '22', '2020-10-09', '0222', '021', '2020-10-09', '15', 'Soda', 'kg', '200', 'rupiah', '150000000', 'Bahan baku', '1', 'Indonesia', 'admin', '0.00', null, '2020-10-09 20:03:31');

-- ----------------------------
-- Table structure for `jurnal_penyesuaian`
-- ----------------------------
DROP TABLE IF EXISTS `jurnal_penyesuaian`;
CREATE TABLE `jurnal_penyesuaian` (
  `no_jurnal` varchar(20) NOT NULL,
  `tgl_jurnal` date NOT NULL,
  `no_rek` char(10) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tgl_insert` datetime NOT NULL,
  PRIMARY KEY (`no_jurnal`,`no_rek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jurnal_penyesuaian
-- ----------------------------

-- ----------------------------
-- Table structure for `jurnal_umum`
-- ----------------------------
DROP TABLE IF EXISTS `jurnal_umum`;
CREATE TABLE `jurnal_umum` (
  `no_jurnal` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_jurnal` date NOT NULL,
  `ket` varchar(255) NOT NULL,
  `no_bukti` varchar(100) NOT NULL,
  `no_rek` char(10) NOT NULL,
  `debet` double NOT NULL,
  `kredit` double NOT NULL,
  `kurs` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `nilai` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tgl_insert` date NOT NULL,
  PRIMARY KEY (`no_jurnal`,`no_rek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jurnal_umum
-- ----------------------------

-- ----------------------------
-- Table structure for `mutasi_bahan`
-- ----------------------------
DROP TABLE IF EXISTS `mutasi_bahan`;
CREATE TABLE `mutasi_bahan` (
  `id_mutasi_bahan` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) NOT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `saldo_awal` varchar(50) NOT NULL,
  `pemasukan` varchar(50) NOT NULL,
  `pengeluaran` varchar(50) DEFAULT NULL,
  `saldo_akhir` varchar(50) NOT NULL,
  `gudang` varchar(50) NOT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_mutasi_bahan`),
  KEY `po_number` (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mutasi_bahan
-- ----------------------------

-- ----------------------------
-- Table structure for `mutasi_produksi`
-- ----------------------------
DROP TABLE IF EXISTS `mutasi_produksi`;
CREATE TABLE `mutasi_produksi` (
  `id_mutasi_produksi` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) NOT NULL,
  `kode_barang` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `saldo_awal` varchar(50) NOT NULL,
  `pemasukan` varchar(50) NOT NULL,
  `pengeluaran` varchar(50) DEFAULT NULL,
  `saldo_akhir` varchar(50) NOT NULL,
  `gudang` varchar(50) NOT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_mutasi_produksi`),
  KEY `po_number` (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mutasi_produksi
-- ----------------------------

-- ----------------------------
-- Table structure for `production`
-- ----------------------------
DROP TABLE IF EXISTS `production`;
CREATE TABLE `production` (
  `id_production` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) DEFAULT NULL,
  `bukti_pengeluaran_no` varchar(50) DEFAULT NULL,
  `tanggal_production` date DEFAULT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `digunakan` decimal(8,3) NOT NULL,
  `disubkontrakkan` varchar(50) NOT NULL,
  `penerima_subkontrak` varchar(50) NOT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_production`),
  KEY `po_number` (`po_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of production
-- ----------------------------

-- ----------------------------
-- Table structure for `purchase`
-- ----------------------------
DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `id_purchase` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) DEFAULT NULL,
  `raw_material` varchar(50) DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `vendor` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `ammount` int(22) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_purchase`),
  KEY `vendor` (`vendor`),
  KEY `po_number` (`po_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of purchase
-- ----------------------------

-- ----------------------------
-- Table structure for `raw_material`
-- ----------------------------
DROP TABLE IF EXISTS `raw_material`;
CREATE TABLE `raw_material` (
  `id_raw_material` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `desc` varchar(50) DEFAULT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_raw_material`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of raw_material
-- ----------------------------

-- ----------------------------
-- Table structure for `ref_group`
-- ----------------------------
DROP TABLE IF EXISTS `ref_group`;
CREATE TABLE `ref_group` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `name_group` varchar(225) NOT NULL,
  `create_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_group
-- ----------------------------
INSERT INTO `ref_group` VALUES ('1', 'Administrator', '2016-08-21 04:10:11', '0000-00-00 00:00:00');
INSERT INTO `ref_group` VALUES ('2', 'Client', '2020-10-01 13:01:17', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `ref_icon`
-- ----------------------------
DROP TABLE IF EXISTS `ref_icon`;
CREATE TABLE `ref_icon` (
  `id_icon` int(11) NOT NULL AUTO_INCREMENT,
  `name_icon` varchar(225) NOT NULL,
  PRIMARY KEY (`id_icon`)
) ENGINE=InnoDB AUTO_INCREMENT=368 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_icon
-- ----------------------------
INSERT INTO `ref_icon` VALUES ('1', 'adjust');
INSERT INTO `ref_icon` VALUES ('2', 'anchor');
INSERT INTO `ref_icon` VALUES ('3', 'archive');
INSERT INTO `ref_icon` VALUES ('4', 'area-chart');
INSERT INTO `ref_icon` VALUES ('5', 'arrows');
INSERT INTO `ref_icon` VALUES ('6', 'arrows-h');
INSERT INTO `ref_icon` VALUES ('7', 'arrows-v\r\n');
INSERT INTO `ref_icon` VALUES ('8', 'asterisk');
INSERT INTO `ref_icon` VALUES ('9', 'at');
INSERT INTO `ref_icon` VALUES ('10', 'automobile');
INSERT INTO `ref_icon` VALUES ('11', 'ban');
INSERT INTO `ref_icon` VALUES ('12', 'bank');
INSERT INTO `ref_icon` VALUES ('13', 'bar-chart');
INSERT INTO `ref_icon` VALUES ('14', 'bar-chart-o');
INSERT INTO `ref_icon` VALUES ('15', 'barcode');
INSERT INTO `ref_icon` VALUES ('16', 'bars');
INSERT INTO `ref_icon` VALUES ('17', 'bed');
INSERT INTO `ref_icon` VALUES ('18', 'beer');
INSERT INTO `ref_icon` VALUES ('19', 'bell');
INSERT INTO `ref_icon` VALUES ('20', 'bell-o');
INSERT INTO `ref_icon` VALUES ('21', 'bell-slash');
INSERT INTO `ref_icon` VALUES ('22', 'bell-slash-o');
INSERT INTO `ref_icon` VALUES ('23', 'bicycle');
INSERT INTO `ref_icon` VALUES ('24', 'binoculars');
INSERT INTO `ref_icon` VALUES ('25', 'birthday-cake');
INSERT INTO `ref_icon` VALUES ('26', 'bolt');
INSERT INTO `ref_icon` VALUES ('27', 'bomb');
INSERT INTO `ref_icon` VALUES ('28', 'book');
INSERT INTO `ref_icon` VALUES ('29', 'bookmark');
INSERT INTO `ref_icon` VALUES ('30', 'bookmark-o');
INSERT INTO `ref_icon` VALUES ('31', 'briefcase');
INSERT INTO `ref_icon` VALUES ('32', 'bug');
INSERT INTO `ref_icon` VALUES ('33', 'building');
INSERT INTO `ref_icon` VALUES ('34', 'building-o');
INSERT INTO `ref_icon` VALUES ('35', 'bullhorn');
INSERT INTO `ref_icon` VALUES ('36', 'bullseye');
INSERT INTO `ref_icon` VALUES ('37', 'bus');
INSERT INTO `ref_icon` VALUES ('38', 'cab');
INSERT INTO `ref_icon` VALUES ('39', 'calculator');
INSERT INTO `ref_icon` VALUES ('40', 'calendar');
INSERT INTO `ref_icon` VALUES ('41', 'calendar-o');
INSERT INTO `ref_icon` VALUES ('42', 'camera');
INSERT INTO `ref_icon` VALUES ('43', 'camera-retro');
INSERT INTO `ref_icon` VALUES ('44', 'car');
INSERT INTO `ref_icon` VALUES ('45', 'caret-square-o-down');
INSERT INTO `ref_icon` VALUES ('46', 'caret-square-o-left');
INSERT INTO `ref_icon` VALUES ('47', 'caret-square-o-right');
INSERT INTO `ref_icon` VALUES ('48', 'caret-square-o-up');
INSERT INTO `ref_icon` VALUES ('49', 'cart-arrow-down');
INSERT INTO `ref_icon` VALUES ('50', 'cart-plus');
INSERT INTO `ref_icon` VALUES ('51', 'cc');
INSERT INTO `ref_icon` VALUES ('52', 'certificate');
INSERT INTO `ref_icon` VALUES ('53', 'check');
INSERT INTO `ref_icon` VALUES ('54', 'check-circle');
INSERT INTO `ref_icon` VALUES ('55', 'check-circle-o');
INSERT INTO `ref_icon` VALUES ('56', 'check-square');
INSERT INTO `ref_icon` VALUES ('57', 'check-square-o');
INSERT INTO `ref_icon` VALUES ('58', 'child');
INSERT INTO `ref_icon` VALUES ('59', 'circle');
INSERT INTO `ref_icon` VALUES ('60', 'circle-o');
INSERT INTO `ref_icon` VALUES ('61', 'circle-o-notch');
INSERT INTO `ref_icon` VALUES ('62', 'circle-thin');
INSERT INTO `ref_icon` VALUES ('63', 'clock-o');
INSERT INTO `ref_icon` VALUES ('64', 'close');
INSERT INTO `ref_icon` VALUES ('65', 'cloud');
INSERT INTO `ref_icon` VALUES ('66', 'cloud-download');
INSERT INTO `ref_icon` VALUES ('67', 'cloud-upload');
INSERT INTO `ref_icon` VALUES ('68', 'code');
INSERT INTO `ref_icon` VALUES ('69', 'code-fork');
INSERT INTO `ref_icon` VALUES ('70', 'coffee');
INSERT INTO `ref_icon` VALUES ('71', 'cog');
INSERT INTO `ref_icon` VALUES ('72', 'cogs');
INSERT INTO `ref_icon` VALUES ('73', 'comment');
INSERT INTO `ref_icon` VALUES ('74', 'comment-o');
INSERT INTO `ref_icon` VALUES ('75', 'comments');
INSERT INTO `ref_icon` VALUES ('76', 'comments-o');
INSERT INTO `ref_icon` VALUES ('77', 'compass');
INSERT INTO `ref_icon` VALUES ('78', 'copyright');
INSERT INTO `ref_icon` VALUES ('79', 'credit-card');
INSERT INTO `ref_icon` VALUES ('80', 'crop');
INSERT INTO `ref_icon` VALUES ('81', 'crosshairs');
INSERT INTO `ref_icon` VALUES ('82', 'cube');
INSERT INTO `ref_icon` VALUES ('83', 'cubes');
INSERT INTO `ref_icon` VALUES ('84', 'cutlery');
INSERT INTO `ref_icon` VALUES ('85', 'dashboard');
INSERT INTO `ref_icon` VALUES ('86', 'database');
INSERT INTO `ref_icon` VALUES ('87', 'desktop');
INSERT INTO `ref_icon` VALUES ('88', 'diamond');
INSERT INTO `ref_icon` VALUES ('89', 'dot-circle-o');
INSERT INTO `ref_icon` VALUES ('90', 'download');
INSERT INTO `ref_icon` VALUES ('91', 'edit');
INSERT INTO `ref_icon` VALUES ('92', 'ellipsis-h');
INSERT INTO `ref_icon` VALUES ('93', 'ellipsis-v');
INSERT INTO `ref_icon` VALUES ('94', 'envelope');
INSERT INTO `ref_icon` VALUES ('95', 'envelope-o');
INSERT INTO `ref_icon` VALUES ('96', 'envelope-square');
INSERT INTO `ref_icon` VALUES ('97', 'eraser');
INSERT INTO `ref_icon` VALUES ('98', 'exchange');
INSERT INTO `ref_icon` VALUES ('99', 'exclamation');
INSERT INTO `ref_icon` VALUES ('100', 'exclamation-circle');
INSERT INTO `ref_icon` VALUES ('101', 'exclamation-triangle');
INSERT INTO `ref_icon` VALUES ('102', 'external-link');
INSERT INTO `ref_icon` VALUES ('103', 'external-link-square');
INSERT INTO `ref_icon` VALUES ('104', 'eye');
INSERT INTO `ref_icon` VALUES ('105', 'eye-slash');
INSERT INTO `ref_icon` VALUES ('106', 'eyedropper');
INSERT INTO `ref_icon` VALUES ('107', 'fax');
INSERT INTO `ref_icon` VALUES ('108', 'female');
INSERT INTO `ref_icon` VALUES ('109', 'fighter-jet');
INSERT INTO `ref_icon` VALUES ('110', 'file-archive-o');
INSERT INTO `ref_icon` VALUES ('111', 'file-audio-o');
INSERT INTO `ref_icon` VALUES ('112', 'file-code-o');
INSERT INTO `ref_icon` VALUES ('113', 'file-excel-o');
INSERT INTO `ref_icon` VALUES ('114', 'file-image-o');
INSERT INTO `ref_icon` VALUES ('115', 'file-movie-o');
INSERT INTO `ref_icon` VALUES ('116', 'file-pdf-o');
INSERT INTO `ref_icon` VALUES ('117', 'file-photo-o');
INSERT INTO `ref_icon` VALUES ('118', 'file-picture-o');
INSERT INTO `ref_icon` VALUES ('119', 'file-powerpoint-o');
INSERT INTO `ref_icon` VALUES ('120', 'file-sound-o');
INSERT INTO `ref_icon` VALUES ('121', 'file-video-o');
INSERT INTO `ref_icon` VALUES ('122', 'file-word-o');
INSERT INTO `ref_icon` VALUES ('123', 'file-zip-o');
INSERT INTO `ref_icon` VALUES ('124', 'film');
INSERT INTO `ref_icon` VALUES ('125', 'filter');
INSERT INTO `ref_icon` VALUES ('126', 'fire');
INSERT INTO `ref_icon` VALUES ('127', 'fire-extinguisher');
INSERT INTO `ref_icon` VALUES ('128', 'flag');
INSERT INTO `ref_icon` VALUES ('129', 'flag-checkered');
INSERT INTO `ref_icon` VALUES ('130', 'flag-o');
INSERT INTO `ref_icon` VALUES ('131', 'flash');
INSERT INTO `ref_icon` VALUES ('132', 'flask');
INSERT INTO `ref_icon` VALUES ('133', 'folder');
INSERT INTO `ref_icon` VALUES ('134', 'folder-o');
INSERT INTO `ref_icon` VALUES ('135', 'folder-open');
INSERT INTO `ref_icon` VALUES ('136', 'folder-open-o');
INSERT INTO `ref_icon` VALUES ('137', 'frown-o');
INSERT INTO `ref_icon` VALUES ('138', 'futbol-o');
INSERT INTO `ref_icon` VALUES ('139', 'gamepad');
INSERT INTO `ref_icon` VALUES ('140', 'gavel');
INSERT INTO `ref_icon` VALUES ('141', 'gear');
INSERT INTO `ref_icon` VALUES ('142', 'gears');
INSERT INTO `ref_icon` VALUES ('143', 'genderless');
INSERT INTO `ref_icon` VALUES ('144', 'gift');
INSERT INTO `ref_icon` VALUES ('145', 'glass');
INSERT INTO `ref_icon` VALUES ('146', 'globe');
INSERT INTO `ref_icon` VALUES ('147', 'graduation-cap');
INSERT INTO `ref_icon` VALUES ('148', 'group');
INSERT INTO `ref_icon` VALUES ('149', 'hdd-o');
INSERT INTO `ref_icon` VALUES ('150', 'headphones');
INSERT INTO `ref_icon` VALUES ('151', 'heart');
INSERT INTO `ref_icon` VALUES ('152', 'heart-o');
INSERT INTO `ref_icon` VALUES ('153', 'heartbeat');
INSERT INTO `ref_icon` VALUES ('154', 'history');
INSERT INTO `ref_icon` VALUES ('155', 'home');
INSERT INTO `ref_icon` VALUES ('156', 'hotel');
INSERT INTO `ref_icon` VALUES ('157', 'image');
INSERT INTO `ref_icon` VALUES ('158', 'inbox');
INSERT INTO `ref_icon` VALUES ('159', 'info');
INSERT INTO `ref_icon` VALUES ('160', 'info-circle');
INSERT INTO `ref_icon` VALUES ('161', 'institution');
INSERT INTO `ref_icon` VALUES ('162', 'key');
INSERT INTO `ref_icon` VALUES ('163', 'keyboard-o');
INSERT INTO `ref_icon` VALUES ('164', 'language');
INSERT INTO `ref_icon` VALUES ('165', 'laptop');
INSERT INTO `ref_icon` VALUES ('166', 'leaf');
INSERT INTO `ref_icon` VALUES ('167', 'legal');
INSERT INTO `ref_icon` VALUES ('168', 'lemon-o');
INSERT INTO `ref_icon` VALUES ('169', 'level-down');
INSERT INTO `ref_icon` VALUES ('170', 'level-up');
INSERT INTO `ref_icon` VALUES ('171', 'life-bouy');
INSERT INTO `ref_icon` VALUES ('172', 'life-buoy');
INSERT INTO `ref_icon` VALUES ('173', 'life-ring');
INSERT INTO `ref_icon` VALUES ('174', 'life-saver');
INSERT INTO `ref_icon` VALUES ('175', 'lightbulb-o');
INSERT INTO `ref_icon` VALUES ('176', 'line-chart');
INSERT INTO `ref_icon` VALUES ('177', 'location-arrow');
INSERT INTO `ref_icon` VALUES ('178', 'lock');
INSERT INTO `ref_icon` VALUES ('179', 'magic');
INSERT INTO `ref_icon` VALUES ('180', 'magnet');
INSERT INTO `ref_icon` VALUES ('181', 'mail-forward');
INSERT INTO `ref_icon` VALUES ('182', 'mail-reply');
INSERT INTO `ref_icon` VALUES ('183', 'mail-reply-all');
INSERT INTO `ref_icon` VALUES ('184', 'male');
INSERT INTO `ref_icon` VALUES ('185', 'map-marker');
INSERT INTO `ref_icon` VALUES ('186', 'meh-o');
INSERT INTO `ref_icon` VALUES ('187', 'microphone');
INSERT INTO `ref_icon` VALUES ('188', 'microphone-slash');
INSERT INTO `ref_icon` VALUES ('189', 'minus');
INSERT INTO `ref_icon` VALUES ('190', 'minus-circle');
INSERT INTO `ref_icon` VALUES ('191', 'minus-square');
INSERT INTO `ref_icon` VALUES ('192', 'minus-square-o');
INSERT INTO `ref_icon` VALUES ('193', 'mobile');
INSERT INTO `ref_icon` VALUES ('194', 'mobile-phone');
INSERT INTO `ref_icon` VALUES ('195', 'money');
INSERT INTO `ref_icon` VALUES ('196', 'moon-o');
INSERT INTO `ref_icon` VALUES ('197', 'mortar-board');
INSERT INTO `ref_icon` VALUES ('198', 'motorcycle');
INSERT INTO `ref_icon` VALUES ('199', 'music');
INSERT INTO `ref_icon` VALUES ('200', 'navicon');
INSERT INTO `ref_icon` VALUES ('202', 'newspaper-o');
INSERT INTO `ref_icon` VALUES ('203', 'paint-brush');
INSERT INTO `ref_icon` VALUES ('204', 'paper-plane');
INSERT INTO `ref_icon` VALUES ('205', 'paper-plane-o');
INSERT INTO `ref_icon` VALUES ('206', 'paw');
INSERT INTO `ref_icon` VALUES ('207', 'pencil');
INSERT INTO `ref_icon` VALUES ('208', 'pencil-square');
INSERT INTO `ref_icon` VALUES ('209', 'pencil-square-o');
INSERT INTO `ref_icon` VALUES ('210', 'phone');
INSERT INTO `ref_icon` VALUES ('211', 'phone-square');
INSERT INTO `ref_icon` VALUES ('212', 'photo');
INSERT INTO `ref_icon` VALUES ('213', 'picture-o');
INSERT INTO `ref_icon` VALUES ('214', 'pie-chart');
INSERT INTO `ref_icon` VALUES ('215', 'plane');
INSERT INTO `ref_icon` VALUES ('216', 'plug');
INSERT INTO `ref_icon` VALUES ('217', 'plus');
INSERT INTO `ref_icon` VALUES ('218', 'plus-circle');
INSERT INTO `ref_icon` VALUES ('219', 'plus-square');
INSERT INTO `ref_icon` VALUES ('220', 'plus-square-o');
INSERT INTO `ref_icon` VALUES ('221', 'power-off');
INSERT INTO `ref_icon` VALUES ('222', 'print');
INSERT INTO `ref_icon` VALUES ('223', 'puzzle-piece');
INSERT INTO `ref_icon` VALUES ('224', 'qrcode');
INSERT INTO `ref_icon` VALUES ('225', 'question');
INSERT INTO `ref_icon` VALUES ('226', 'question-circle');
INSERT INTO `ref_icon` VALUES ('227', 'quote-left');
INSERT INTO `ref_icon` VALUES ('228', 'quote-right');
INSERT INTO `ref_icon` VALUES ('229', 'random');
INSERT INTO `ref_icon` VALUES ('230', 'recycle');
INSERT INTO `ref_icon` VALUES ('231', 'refresh');
INSERT INTO `ref_icon` VALUES ('232', 'remove');
INSERT INTO `ref_icon` VALUES ('233', 'reorder');
INSERT INTO `ref_icon` VALUES ('234', 'reply');
INSERT INTO `ref_icon` VALUES ('235', 'reply-all');
INSERT INTO `ref_icon` VALUES ('236', 'retweet');
INSERT INTO `ref_icon` VALUES ('237', 'road');
INSERT INTO `ref_icon` VALUES ('238', 'rocket');
INSERT INTO `ref_icon` VALUES ('239', 'rss');
INSERT INTO `ref_icon` VALUES ('240', 'rss-square');
INSERT INTO `ref_icon` VALUES ('241', 'search');
INSERT INTO `ref_icon` VALUES ('242', 'search-minus');
INSERT INTO `ref_icon` VALUES ('243', 'search-plus');
INSERT INTO `ref_icon` VALUES ('244', 'send');
INSERT INTO `ref_icon` VALUES ('245', 'send-o');
INSERT INTO `ref_icon` VALUES ('246', 'server');
INSERT INTO `ref_icon` VALUES ('247', 'share');
INSERT INTO `ref_icon` VALUES ('248', 'share-alt');
INSERT INTO `ref_icon` VALUES ('249', 'share-alt-square');
INSERT INTO `ref_icon` VALUES ('250', 'share-square');
INSERT INTO `ref_icon` VALUES ('251', 'share-square-o');
INSERT INTO `ref_icon` VALUES ('252', 'shield');
INSERT INTO `ref_icon` VALUES ('253', 'ship');
INSERT INTO `ref_icon` VALUES ('254', 'shopping-cart');
INSERT INTO `ref_icon` VALUES ('255', 'sign-in');
INSERT INTO `ref_icon` VALUES ('256', 'sign-out');
INSERT INTO `ref_icon` VALUES ('257', 'signal');
INSERT INTO `ref_icon` VALUES ('258', 'sitemap');
INSERT INTO `ref_icon` VALUES ('259', 'sliders');
INSERT INTO `ref_icon` VALUES ('260', 'smile-o');
INSERT INTO `ref_icon` VALUES ('261', 'soccer-ball-o');
INSERT INTO `ref_icon` VALUES ('262', 'sort');
INSERT INTO `ref_icon` VALUES ('263', 'sort-alpha-asc');
INSERT INTO `ref_icon` VALUES ('264', 'sort-alpha-desc');
INSERT INTO `ref_icon` VALUES ('265', 'sort-amount-asc');
INSERT INTO `ref_icon` VALUES ('266', 'sort-amount-desc');
INSERT INTO `ref_icon` VALUES ('267', 'sort-asc');
INSERT INTO `ref_icon` VALUES ('268', 'sort-desc');
INSERT INTO `ref_icon` VALUES ('269', 'sort-down');
INSERT INTO `ref_icon` VALUES ('270', 'sort-numeric-asc');
INSERT INTO `ref_icon` VALUES ('271', 'sort-numeric-desc');
INSERT INTO `ref_icon` VALUES ('272', 'sort-up');
INSERT INTO `ref_icon` VALUES ('273', 'space-shuttle');
INSERT INTO `ref_icon` VALUES ('274', 'spinner');
INSERT INTO `ref_icon` VALUES ('275', 'spoon');
INSERT INTO `ref_icon` VALUES ('276', 'square');
INSERT INTO `ref_icon` VALUES ('277', 'square-o');
INSERT INTO `ref_icon` VALUES ('278', 'star');
INSERT INTO `ref_icon` VALUES ('279', 'star-half');
INSERT INTO `ref_icon` VALUES ('280', 'star-half-empty');
INSERT INTO `ref_icon` VALUES ('281', 'star-half-full');
INSERT INTO `ref_icon` VALUES ('282', 'star-half-o');
INSERT INTO `ref_icon` VALUES ('283', 'star-o');
INSERT INTO `ref_icon` VALUES ('284', 'street-view');
INSERT INTO `ref_icon` VALUES ('285', 'suitcase');
INSERT INTO `ref_icon` VALUES ('286', 'sun-o');
INSERT INTO `ref_icon` VALUES ('287', 'support');
INSERT INTO `ref_icon` VALUES ('288', 'tablet');
INSERT INTO `ref_icon` VALUES ('289', 'tachometer');
INSERT INTO `ref_icon` VALUES ('290', 'tag');
INSERT INTO `ref_icon` VALUES ('291', 'tags');
INSERT INTO `ref_icon` VALUES ('292', 'tasks');
INSERT INTO `ref_icon` VALUES ('293', 'taxi');
INSERT INTO `ref_icon` VALUES ('294', 'terminal');
INSERT INTO `ref_icon` VALUES ('295', 'thumb-tack');
INSERT INTO `ref_icon` VALUES ('296', 'thumbs-down');
INSERT INTO `ref_icon` VALUES ('297', 'thumbs-o-down');
INSERT INTO `ref_icon` VALUES ('298', 'thumbs-o-up');
INSERT INTO `ref_icon` VALUES ('299', 'thumbs-up');
INSERT INTO `ref_icon` VALUES ('300', 'ticket');
INSERT INTO `ref_icon` VALUES ('301', 'times');
INSERT INTO `ref_icon` VALUES ('302', 'times-circle');
INSERT INTO `ref_icon` VALUES ('303', 'times-circle-o');
INSERT INTO `ref_icon` VALUES ('304', 'tint');
INSERT INTO `ref_icon` VALUES ('305', 'toggle-down');
INSERT INTO `ref_icon` VALUES ('306', 'toggle-left');
INSERT INTO `ref_icon` VALUES ('307', 'toggle-off');
INSERT INTO `ref_icon` VALUES ('308', 'toggle-on');
INSERT INTO `ref_icon` VALUES ('309', 'toggle-right');
INSERT INTO `ref_icon` VALUES ('310', 'toggle-up');
INSERT INTO `ref_icon` VALUES ('311', 'trash');
INSERT INTO `ref_icon` VALUES ('312', 'trash-o');
INSERT INTO `ref_icon` VALUES ('313', 'tree');
INSERT INTO `ref_icon` VALUES ('314', 'trophy');
INSERT INTO `ref_icon` VALUES ('315', 'truck');
INSERT INTO `ref_icon` VALUES ('316', 'tty');
INSERT INTO `ref_icon` VALUES ('317', 'umbrella');
INSERT INTO `ref_icon` VALUES ('318', 'university');
INSERT INTO `ref_icon` VALUES ('319', 'unlock');
INSERT INTO `ref_icon` VALUES ('320', 'unlock-alt');
INSERT INTO `ref_icon` VALUES ('321', 'unsorted');
INSERT INTO `ref_icon` VALUES ('322', 'upload');
INSERT INTO `ref_icon` VALUES ('323', 'user');
INSERT INTO `ref_icon` VALUES ('324', 'user-plus');
INSERT INTO `ref_icon` VALUES ('325', 'user-secret');
INSERT INTO `ref_icon` VALUES ('326', 'user-times');
INSERT INTO `ref_icon` VALUES ('327', 'users');
INSERT INTO `ref_icon` VALUES ('328', 'video-camera');
INSERT INTO `ref_icon` VALUES ('329', 'volume-down');
INSERT INTO `ref_icon` VALUES ('330', 'volume-off');
INSERT INTO `ref_icon` VALUES ('331', 'volume-up');
INSERT INTO `ref_icon` VALUES ('332', 'warning');
INSERT INTO `ref_icon` VALUES ('333', 'wheelchair');
INSERT INTO `ref_icon` VALUES ('334', 'wifi');
INSERT INTO `ref_icon` VALUES ('335', 'cc-amex');
INSERT INTO `ref_icon` VALUES ('336', 'cc-discover');
INSERT INTO `ref_icon` VALUES ('337', 'cc-mastercard');
INSERT INTO `ref_icon` VALUES ('338', 'cc-paypal');
INSERT INTO `ref_icon` VALUES ('339', 'cc-stripe');
INSERT INTO `ref_icon` VALUES ('340', 'cc-visa');
INSERT INTO `ref_icon` VALUES ('341', 'credit-card');
INSERT INTO `ref_icon` VALUES ('342', 'google-wallet');
INSERT INTO `ref_icon` VALUES ('343', 'paypal');
INSERT INTO `ref_icon` VALUES ('344', 'bitcoin');
INSERT INTO `ref_icon` VALUES ('345', 'btc');
INSERT INTO `ref_icon` VALUES ('346', 'cny');
INSERT INTO `ref_icon` VALUES ('347', 'dollar');
INSERT INTO `ref_icon` VALUES ('348', 'eur');
INSERT INTO `ref_icon` VALUES ('349', 'euro');
INSERT INTO `ref_icon` VALUES ('350', 'gbp');
INSERT INTO `ref_icon` VALUES ('351', 'ils');
INSERT INTO `ref_icon` VALUES ('352', 'inr');
INSERT INTO `ref_icon` VALUES ('353', 'jpy');
INSERT INTO `ref_icon` VALUES ('354', 'krw');
INSERT INTO `ref_icon` VALUES ('355', 'money');
INSERT INTO `ref_icon` VALUES ('356', 'th');
INSERT INTO `ref_icon` VALUES ('357', 'th-list');
INSERT INTO `ref_icon` VALUES ('358', 'th-large');
INSERT INTO `ref_icon` VALUES ('359', 'chain-broken');
INSERT INTO `ref_icon` VALUES ('360', 'angle-double-down');
INSERT INTO `ref_icon` VALUES ('361', 'angle-double-left');
INSERT INTO `ref_icon` VALUES ('362', 'angle-double-right');
INSERT INTO `ref_icon` VALUES ('363', 'angle-double-up');
INSERT INTO `ref_icon` VALUES ('364', 'angle-down');
INSERT INTO `ref_icon` VALUES ('365', 'angle-left');
INSERT INTO `ref_icon` VALUES ('366', 'angle-right');
INSERT INTO `ref_icon` VALUES ('367', 'angle-up');

-- ----------------------------
-- Table structure for `ref_module`
-- ----------------------------
DROP TABLE IF EXISTS `ref_module`;
CREATE TABLE `ref_module` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `name_module` varchar(225) NOT NULL,
  `name_controller` varchar(225) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `sort` int(3) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id_module`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_module
-- ----------------------------
INSERT INTO `ref_module` VALUES ('1', '0', 'Konfiigurasi Pengguna', '#', 'cogs', '100', '2016-08-24 00:00:00', '2017-11-07 22:11:58');
INSERT INTO `ref_module` VALUES ('2', '1', 'Kewenangan', 'group', 'sitemap', '2', '2016-08-24 00:00:00', '2017-11-11 18:46:57');
INSERT INTO `ref_module` VALUES ('3', '1', 'Pengguna', 'user', 'users', '3', '2016-08-24 00:00:00', '2017-11-07 22:13:22');
INSERT INTO `ref_module` VALUES ('17', '0', 'Menu', '#', 'database', '1', '2021-03-01 11:00:04', '2021-03-01 11:51:43');
INSERT INTO `ref_module` VALUES ('18', '17', 'Rekening', 'Rekening', 'circle', '1', '2021-03-01 11:01:07', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('19', '17', 'Saldo Awal', 'SaldoAwal', 'circle', '2', '2021-03-01 11:19:27', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('20', '17', 'Jurnal Umum', 'JurnalUmum', 'circle', '3', '2021-03-01 11:48:37', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('21', '17', 'Buku Besar', 'BukuBesar', 'circle', '4', '2021-03-01 11:49:10', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('22', '17', 'Jurnal Penyesuaian', 'JurnalPenyesuaian', 'circle', '5', '2021-03-01 11:49:36', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('23', '0', 'Inventory', '#', 'bars', '2', '2021-03-01 11:52:14', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('24', '23', 'Pemasukan Bahan Baku', 'PemasukanBB', 'circle', '1', '2021-03-01 11:54:22', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('25', '23', 'Pemakaian Bahan Baku', 'PemakaianBB', 'circle', '2', '2021-03-01 11:54:52', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('26', '23', 'Sub Kontrak', 'SubKontrak', 'circle', '3', '2021-03-01 11:55:17', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('27', '23', 'Pemasukan Produksi', 'PemasukanProduksi', 'circle', '4', '2021-03-01 11:55:55', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('28', '23', 'Pengeluaran Produksi', 'PengeluaranProduksi', 'circle', '5', '2021-03-01 11:56:25', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('29', '23', 'Mutasi Bahan', 'MutasiBahan', 'circle', '6', '2021-03-01 11:56:45', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('30', '23', 'Mutasi Hasil Produksi', 'MutasiHP', 'circle', '7', '2021-03-01 11:57:31', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('31', '23', 'Waste/ Scrap', 'Ws', 'circle', '8', '2021-03-01 11:58:29', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('32', '0', 'Laporan', '#', 'folder-open-o', '3', '2021-03-01 12:14:39', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('33', '32', 'Buku Besar', 'LapBB', 'circle', '1', '2021-03-01 12:15:14', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('34', '32', 'Neraca Saldo', 'LapNS', 'circle', '2', '2021-03-01 12:15:42', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('35', '32', 'Neraca Lajur', 'LapNL', 'circle', '3', '2021-03-01 12:16:08', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('36', '32', 'Laba Rugi', 'LapLR', 'circle', '4', '2021-03-01 12:16:31', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('37', '32', 'Neraca', 'Neraca', 'circle', '5', '2021-03-01 12:16:46', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('38', '32', 'Account Payable', 'AP', 'circle', '6', '2021-03-01 12:17:31', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('39', '32', 'Account Received', 'AR', 'circle', '7', '2021-03-01 12:17:53', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('40', '0', 'Grafik', '#', 'tachometer', '4', '2021-03-01 12:18:36', '0000-00-00 00:00:00');
INSERT INTO `ref_module` VALUES ('41', '40', 'Jurnal', 'GfJurnal', 'circle', '1', '2021-03-01 12:19:07', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `ref_user`
-- ----------------------------
DROP TABLE IF EXISTS `ref_user`;
CREATE TABLE `ref_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) NOT NULL,
  `name_user` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_user
-- ----------------------------
INSERT INTO `ref_user` VALUES ('1', '1', 'Admin', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '2016-08-21 00:00:00', '2020-09-30 18:02:42');
INSERT INTO `ref_user` VALUES ('2', '2', 'User', 'user', '0d8d5cd06832b29560745fe4e1b941cf', '2020-10-01 13:01:57', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `ref_user_access`
-- ----------------------------
DROP TABLE IF EXISTS `ref_user_access`;
CREATE TABLE `ref_user_access` (
  `id_user_access` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `akses` int(1) NOT NULL DEFAULT '0',
  `tambah` int(1) NOT NULL DEFAULT '0',
  `lihat` int(1) NOT NULL DEFAULT '0',
  `edit` int(1) NOT NULL DEFAULT '0',
  `hapus` int(1) NOT NULL DEFAULT '0',
  `ex_excel` int(1) NOT NULL DEFAULT '0',
  `ex_pdf` int(1) NOT NULL DEFAULT '0',
  `id_parent` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id_user_access`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_user_access
-- ----------------------------
INSERT INTO `ref_user_access` VALUES ('1', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '2016-08-24 00:00:00', '2021-03-01 12:19:23');
INSERT INTO `ref_user_access` VALUES ('2', '1', '2', '1', '1', '1', '1', '1', '0', '0', '1', '2016-08-24 00:00:00', '2021-03-01 12:19:23');
INSERT INTO `ref_user_access` VALUES ('3', '1', '3', '1', '1', '1', '1', '1', '0', '0', '1', '2016-08-24 00:00:00', '2021-03-01 12:19:23');
INSERT INTO `ref_user_access` VALUES ('4', '2', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0000-00-00 00:00:00', '2020-10-09 03:33:06');
INSERT INTO `ref_user_access` VALUES ('5', '2', '2', '0', '0', '0', '0', '0', '0', '0', '1', '0000-00-00 00:00:00', '2020-10-09 03:33:06');
INSERT INTO `ref_user_access` VALUES ('6', '2', '3', '0', '0', '0', '0', '0', '0', '0', '1', '0000-00-00 00:00:00', '2020-10-09 03:33:06');
INSERT INTO `ref_user_access` VALUES ('107', '1', '17', '1', '0', '0', '0', '0', '0', '0', '0', '0000-00-00 00:00:00', '2021-03-01 12:19:23');
INSERT INTO `ref_user_access` VALUES ('108', '2', '17', '0', '0', '0', '0', '0', '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('110', '1', '18', '1', '1', '1', '1', '1', '1', '1', '17', '0000-00-00 00:00:00', '2021-03-01 12:19:23');
INSERT INTO `ref_user_access` VALUES ('111', '2', '18', '0', '0', '0', '0', '0', '0', '0', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('113', '1', '19', '1', '1', '1', '1', '1', '1', '1', '17', '0000-00-00 00:00:00', '2021-03-01 12:19:23');
INSERT INTO `ref_user_access` VALUES ('114', '2', '19', '0', '0', '0', '0', '0', '0', '0', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('116', '1', '20', '1', '1', '1', '1', '1', '1', '1', '17', '0000-00-00 00:00:00', '2021-03-01 12:19:23');
INSERT INTO `ref_user_access` VALUES ('117', '2', '20', '0', '0', '0', '0', '0', '0', '0', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('119', '1', '21', '1', '1', '1', '1', '1', '1', '1', '17', '0000-00-00 00:00:00', '2021-03-01 12:19:23');
INSERT INTO `ref_user_access` VALUES ('120', '2', '21', '0', '0', '0', '0', '0', '0', '0', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('122', '1', '22', '1', '1', '1', '1', '1', '1', '1', '17', '0000-00-00 00:00:00', '2021-03-01 12:19:23');
INSERT INTO `ref_user_access` VALUES ('123', '2', '22', '0', '0', '0', '0', '0', '0', '0', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('125', '1', '23', '1', '0', '0', '0', '0', '0', '0', '0', '0000-00-00 00:00:00', '2021-03-01 12:19:23');
INSERT INTO `ref_user_access` VALUES ('126', '2', '23', '0', '0', '0', '0', '0', '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('128', '1', '24', '1', '1', '1', '1', '1', '1', '1', '23', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('129', '2', '24', '0', '0', '0', '0', '0', '0', '0', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('131', '1', '25', '1', '1', '1', '1', '1', '1', '1', '23', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('132', '2', '25', '0', '0', '0', '0', '0', '0', '0', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('134', '1', '26', '1', '1', '1', '1', '1', '1', '1', '23', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('135', '2', '26', '0', '0', '0', '0', '0', '0', '0', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('137', '1', '27', '1', '1', '1', '1', '1', '1', '1', '23', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('138', '2', '27', '0', '0', '0', '0', '0', '0', '0', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('140', '1', '28', '1', '1', '1', '1', '1', '1', '1', '23', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('141', '2', '28', '0', '0', '0', '0', '0', '0', '0', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('143', '1', '29', '1', '1', '1', '1', '1', '1', '1', '23', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('144', '2', '29', '0', '0', '0', '0', '0', '0', '0', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('146', '1', '30', '1', '1', '1', '1', '1', '1', '1', '23', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('147', '2', '30', '0', '0', '0', '0', '0', '0', '0', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('149', '1', '31', '1', '1', '1', '1', '1', '1', '1', '23', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('150', '2', '31', '0', '0', '0', '0', '0', '0', '0', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('152', '1', '32', '1', '0', '0', '0', '0', '0', '0', '0', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('153', '2', '32', '0', '0', '0', '0', '0', '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('154', '1', '33', '1', '1', '1', '1', '1', '1', '1', '32', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('155', '2', '33', '0', '0', '0', '0', '0', '0', '0', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('156', '1', '34', '1', '1', '1', '1', '1', '1', '1', '32', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('157', '2', '34', '0', '0', '0', '0', '0', '0', '0', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('158', '1', '35', '1', '1', '1', '1', '1', '1', '1', '32', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('159', '2', '35', '0', '0', '0', '0', '0', '0', '0', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('160', '1', '36', '1', '1', '1', '1', '1', '1', '1', '32', '0000-00-00 00:00:00', '2021-03-01 12:19:24');
INSERT INTO `ref_user_access` VALUES ('161', '2', '36', '0', '0', '0', '0', '0', '0', '0', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('162', '1', '37', '1', '1', '1', '1', '1', '1', '1', '32', '0000-00-00 00:00:00', '2021-03-01 12:19:25');
INSERT INTO `ref_user_access` VALUES ('163', '2', '37', '0', '0', '0', '0', '0', '0', '0', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('164', '1', '38', '1', '1', '1', '1', '1', '1', '1', '32', '0000-00-00 00:00:00', '2021-03-01 12:19:25');
INSERT INTO `ref_user_access` VALUES ('165', '2', '38', '0', '0', '0', '0', '0', '0', '0', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('166', '1', '39', '1', '1', '1', '1', '1', '1', '1', '32', '0000-00-00 00:00:00', '2021-03-01 12:19:25');
INSERT INTO `ref_user_access` VALUES ('167', '2', '39', '0', '0', '0', '0', '0', '0', '0', '32', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('168', '1', '40', '1', '0', '0', '0', '0', '0', '0', '0', '0000-00-00 00:00:00', '2021-03-01 12:19:25');
INSERT INTO `ref_user_access` VALUES ('169', '2', '40', '0', '0', '0', '0', '0', '0', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `ref_user_access` VALUES ('170', '1', '41', '1', '1', '1', '1', '1', '1', '1', '40', '0000-00-00 00:00:00', '2021-03-01 12:19:25');
INSERT INTO `ref_user_access` VALUES ('171', '2', '41', '0', '0', '0', '0', '0', '0', '0', '40', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `rekening`
-- ----------------------------
DROP TABLE IF EXISTS `rekening`;
CREATE TABLE `rekening` (
  `no_rek` varchar(50) NOT NULL DEFAULT '',
  `induk` char(10) NOT NULL DEFAULT '0',
  `level` smallint(6) DEFAULT '0',
  `nama_rek` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no_rek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rekening
-- ----------------------------
INSERT INTO `rekening` VALUES ('01', '0', '0', 'BCA/ 0001');

-- ----------------------------
-- Table structure for `saldo_awal`
-- ----------------------------
DROP TABLE IF EXISTS `saldo_awal`;
CREATE TABLE `saldo_awal` (
  `periode` year(4) NOT NULL,
  `no_rek` char(10) NOT NULL,
  `saldo_akhir` double NOT NULL,
  `debet` decimal(20,2) NOT NULL DEFAULT '0.00',
  `kredit` decimal(20,2) NOT NULL DEFAULT '0.00',
  `tgl_insert` date NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`periode`,`no_rek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of saldo_awal
-- ----------------------------
INSERT INTO `saldo_awal` VALUES ('2020', '01', '0', '250000.00', '250000.00', '2020-10-10', 'admin');

-- ----------------------------
-- Table structure for `subkontrak`
-- ----------------------------
DROP TABLE IF EXISTS `subkontrak`;
CREATE TABLE `subkontrak` (
  `id_subkontrak` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) DEFAULT NULL,
  `bukti_pengeluaran_no` varchar(50) DEFAULT NULL,
  `tanggal_subkontrak` date DEFAULT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `disubkontrakkan` varchar(50) NOT NULL,
  `penerima_subkontrak` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_subkontrak`),
  KEY `po_number` (`po_number`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subkontrak
-- ----------------------------
INSERT INTO `subkontrak` VALUES ('6', '1', '1', '0000-00-00', '', '', '', '', '', 'admin', '2020-10-15 19:29:18', null);

-- ----------------------------
-- Table structure for `warehouse`
-- ----------------------------
DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE `warehouse` (
  `id_warehouse` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) DEFAULT NULL,
  `btb_no` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_warehouse`),
  KEY `po_number` (`po_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of warehouse
-- ----------------------------

-- ----------------------------
-- Table structure for `waste_scrap`
-- ----------------------------
DROP TABLE IF EXISTS `waste_scrap`;
CREATE TABLE `waste_scrap` (
  `id_waste_scrap` int(11) NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) NOT NULL,
  `no_bc` varchar(50) DEFAULT NULL,
  `tanggal_bc` date DEFAULT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `jumlah` varchar(50) NOT NULL,
  `nilai` varchar(50) NOT NULL,
  `activation_date` timestamp NULL DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_waste_scrap`),
  KEY `po_number` (`no_bc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of waste_scrap
-- ----------------------------
