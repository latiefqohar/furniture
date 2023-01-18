-- Adminer 4.8.1 MySQL 10.4.24-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(100) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `periode` varchar(100) NOT NULL,
  `tanggal_invoice` datetime NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `bayar_invoice` datetime DEFAULT NULL,
  `status_invoice` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_perusahaan` (`id_perusahaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `invoice` (`id`, `no_invoice`, `id_perusahaan`, `periode`, `tanggal_invoice`, `jumlah`, `bayar_invoice`, `status_invoice`) VALUES
(8,	'INV/2001311515/2020',	1,	'01-2020',	'2020-01-31 15:15:18',	71000,	'2020-02-01 14:00:23',	'1');

DROP TABLE IF EXISTS `keranjang`;
CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `diskon` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `status_bayar` int(11) NOT NULL DEFAULT 0,
  `id_transaksi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `kupon`;
CREATE TABLE `kupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(80) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `alamat`, `kota`, `kode_pos`, `telpon`, `email`) VALUES
(1,	'PT. Maju Jaya',	'jalan raya serang no 100',	'Tangerang',	15802,	'0213456789',	'cs@majujaya.com'),
(2,	'Maurine.Will12',	'In quae at deleniti consequatur beatae in sed deleniti.',	'Voluptas necessitatibus ex qui inventore quia magnam veniam et ut.',	0,	'247',	'your.email+faker50024@gmail.com');

DROP TABLE IF EXISTS `registration`;
CREATE TABLE `registration` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `registration` (`id`, `nama`, `username`, `role`, `password`) VALUES
(1,	'admin',	'admin',	'Admin',	'21232f297a57a5a743894a0e4a801fc3'),
(2,	'manager',	'manager',	'Manager',	'1d0258c2440a8d19e716292b231e3190');

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `telpon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subtotal` double NOT NULL,
  `subtotal_beli` double NOT NULL,
  `ongkir` varchar(100) NOT NULL,
  `diskon` varchar(100) NOT NULL,
  `total` double NOT NULL,
  `pembayaran` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL,
  `update` datetime DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `status_bayar` int(11) NOT NULL DEFAULT 0,
  `id_invoice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2023-01-18 14:12:23
