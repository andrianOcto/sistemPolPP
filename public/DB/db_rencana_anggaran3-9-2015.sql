-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2015 at 09:24 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_rencana_anggaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_detail_program`
--

CREATE TABLE IF NOT EXISTS `m_detail_program` (
  `id` varchar(55) NOT NULL,
  `id_bidang` varchar(55) NOT NULL,
  `description` int(11) NOT NULL,
  `anggaran` double NOT NULL,
  `sasaran` varchar(300) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_detail_rko`
--

CREATE TABLE IF NOT EXISTS `m_detail_rko` (
  `id_kegiatan` varchar(55) NOT NULL,
  `jan` double DEFAULT NULL,
  `jan_detail` varchar(200) DEFAULT NULL,
  `feb` double DEFAULT NULL,
  `feb_detail` varchar(200) DEFAULT NULL,
  `mar` double DEFAULT NULL,
  `mar_detail` varchar(200) DEFAULT NULL,
  `apr` double DEFAULT NULL,
  `apr_detail` varchar(200) DEFAULT NULL,
  `mei` double DEFAULT NULL,
  `mei_detail` varchar(200) DEFAULT NULL,
  `jun` double DEFAULT NULL,
  `jun_detail` varchar(200) DEFAULT NULL,
  `jul` double DEFAULT NULL,
  `jul_detail` varchar(200) DEFAULT NULL,
  `agu` double DEFAULT NULL,
  `agu_detail` varchar(200) DEFAULT NULL,
  `sep` double DEFAULT NULL,
  `sep_detail` varchar(200) DEFAULT NULL,
  `okt` double DEFAULT NULL,
  `okt_detail` varchar(200) DEFAULT NULL,
  `nov` double DEFAULT NULL,
  `nov_detail` varchar(200) DEFAULT NULL,
  `des` double DEFAULT NULL,
  `des_detail` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_detail_spj`
--

CREATE TABLE IF NOT EXISTS `m_detail_spj` (
  `id` int(11) NOT NULL,
  `id_kegiatan` varchar(55) NOT NULL,
  `id_rincian` varchar(55) NOT NULL,
  `jumlah` double NOT NULL,
  `keperluan` varchar(200) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_bidang`
--

CREATE TABLE IF NOT EXISTS `s_bidang` (
  `id` varchar(55) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_bidang`
--

INSERT INTO `s_bidang` (`id`, `nama`, `nama_lengkap`, `updated_at`, `created_at`) VALUES
('02', 'GADKA', 'test Update', '2015-08-28 00:04:45', '2015-08-27 23:59:39'),
('1', 'TU', 'Tata Usaha', '2015-08-28 06:45:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `s_jenis_belanja`
--

CREATE TABLE IF NOT EXISTS `s_jenis_belanja` (
  `id` varchar(55) NOT NULL,
  `id_kelompok` varchar(155) NOT NULL,
  `description` varchar(110) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_jenis_belanja`
--

INSERT INTO `s_jenis_belanja` (`id`, `id_kelompok`, `description`, `updated_at`, `created_at`) VALUES
('5.1.8', '5.1', 'jenis belanja 2', '2015-08-28 10:30:14', '2015-08-28 10:30:14'),
('5.2.1', '5.2', 'BELANJA MODAL\r\n', '2015-08-28 07:46:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `s_kegiatan`
--

CREATE TABLE IF NOT EXISTS `s_kegiatan` (
  `id` varchar(55) NOT NULL,
  `id_bidang` varchar(55) NOT NULL,
  `id_program` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL,
  `anggaran` double NOT NULL DEFAULT '0',
  `sasaran` varchar(255) NOT NULL DEFAULT ' ',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_kegiatan`
--

INSERT INTO `s_kegiatan` (`id`, `id_bidang`, `id_program`, `description`, `anggaran`, `sasaran`, `updated_at`, `created_at`) VALUES
('1', '1', '2', 'hahashaha', 0, ' ', '2015-09-01 22:33:56', '0000-00-00 00:00:00'),
('1.2', '02', '1', 'ini adalah test', 0, ' ', '2015-09-01 22:34:09', '2015-09-01 14:32:48'),
('999', '1', '2', 'hahahaha', 0, ' ', '2015-09-01 22:34:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `s_kelompok_belanja`
--

CREATE TABLE IF NOT EXISTS `s_kelompok_belanja` (
  `id` varchar(55) NOT NULL,
  `description` varchar(110) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_kelompok_belanja`
--

INSERT INTO `s_kelompok_belanja` (`id`, `description`, `updated_at`, `created_at`) VALUES
('5.1', 'BELANJA TIDAK LANGSUNG', '2015-08-28 07:16:02', '0000-00-00 00:00:00'),
('5.2', 'BELANJA LANGSUNG', '2015-08-28 00:25:17', '2015-08-28 00:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `s_kelompok_kerja`
--

CREATE TABLE IF NOT EXISTS `s_kelompok_kerja` (
  `id` varchar(55) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_kelompok_kerja`
--

INSERT INTO `s_kelompok_kerja` (`id`, `deskripsi`, `updated_at`, `created_at`) VALUES
('1.2.5', 'testKK', '2015-08-27 17:27:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `s_kepala`
--

CREATE TABLE IF NOT EXISTS `s_kepala` (
  `id` varchar(55) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_objek_belanja`
--

CREATE TABLE IF NOT EXISTS `s_objek_belanja` (
  `id` varchar(55) NOT NULL,
  `id_jenis` varchar(55) NOT NULL,
  `description` varchar(110) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_objek_belanja`
--

INSERT INTO `s_objek_belanja` (`id`, `id_jenis`, `description`, `updated_at`, `created_at`) VALUES
('5.1.8.2', '5.1.8', 'obyek belanja 1', '2015-08-29 23:47:23', '2015-08-29 23:47:23'),
('5.2.1.3', '5.1.8', 'belanja lagi 34', '2015-08-30 00:12:27', '2015-08-30 00:11:46');

-- --------------------------------------------------------

--
-- Table structure for table `s_program`
--

CREATE TABLE IF NOT EXISTS `s_program` (
  `id` varchar(55) NOT NULL,
  `description` varchar(110) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_program`
--

INSERT INTO `s_program` (`id`, `description`, `updated_at`, `created_at`) VALUES
('1', 'program 12', '2015-09-01 14:41:50', '2015-09-01 00:55:14'),
('2', 'program 2', '2015-09-01 01:05:08', '2015-09-01 01:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `s_rincian_belanja`
--

CREATE TABLE IF NOT EXISTS `s_rincian_belanja` (
  `id` varchar(55) NOT NULL,
  `id_objek` varchar(55) NOT NULL,
  `description` varchar(110) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_rincian_belanja`
--

INSERT INTO `s_rincian_belanja` (`id`, `id_objek`, `description`, `updated_at`, `created_at`) VALUES
('5.1.8.2.1', '5.1.8.2', 'obyek rincian belanja 9', '2015-08-30 00:09:10', '2015-08-29 23:49:35'),
('5.1.8.2.2', '5.1.8.2', 'rincian obyek belanja 3', '2015-08-30 00:02:43', '2015-08-30 00:02:32'),
('5.1.8.2.4', '5.1.8.2', 'rincian obyek belanja 3', '2015-08-30 00:06:56', '2015-08-30 00:06:56');

-- --------------------------------------------------------

--
-- Table structure for table `s_satuan_kerja`
--

CREATE TABLE IF NOT EXISTS `s_satuan_kerja` (
  `id` varchar(55) NOT NULL,
  `id_urusan` varchar(55) NOT NULL,
  `kode_skpd` varchar(10) NOT NULL,
  `nama_skpd` varchar(100) NOT NULL,
  `nama_bendahara` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `nip_kepala` varchar(50) NOT NULL,
  `nama_kepala` varchar(100) NOT NULL,
  `nama_jabatan` varchar(200) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_satuan_kerja`
--

INSERT INTO `s_satuan_kerja` (`id`, `id_urusan`, `kode_skpd`, `nama_skpd`, `nama_bendahara`, `nip`, `npwp`, `nama_bank`, `no_rekening`, `nip_kepala`, `nama_kepala`, `nama_jabatan`, `updated_at`, `created_at`) VALUES
('1', '3', '', 'asdf', 'asdf', 'sdf', 'sdf', 'sdf', 'asdf', 'sdfasdf', 'asdfasdf', 'asdf', '2015-09-02 11:02:43', '2015-09-02 11:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `s_urusan`
--

CREATE TABLE IF NOT EXISTS `s_urusan` (
  `id` varchar(55) NOT NULL,
  `description` varchar(150) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_urusan`
--

INSERT INTO `s_urusan` (`id`, `description`, `updated_at`, `created_at`) VALUES
('1.01', 'Urusan Wajib Pendidikan', '2015-08-28 04:21:20', '0000-00-00 00:00:00'),
('1.02', 'Urusan Wajib Kesehatan', '2015-08-28 04:21:20', '0000-00-00 00:00:00'),
('1.03', 'Urusan Wajib Pekerjaan Umum', '2015-08-28 04:21:20', '0000-00-00 00:00:00'),
('1.04', 'Urusan Wajib Perumahan\r\n', '2015-08-28 04:21:20', '0000-00-00 00:00:00'),
('1.05', 'Urusan Wajib Penataan Ruan', '2015-08-28 04:21:20', '0000-00-00 00:00:00'),
('1.6', 'hehehe', '2015-09-02 17:04:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `s_user`
--

CREATE TABLE IF NOT EXISTS `s_user` (
  `username` varchar(55) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(55) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_user`
--

INSERT INTO `s_user` (`username`, `nama`, `password`, `role`, `updated_at`, `created_at`) VALUES
('master', 'admin', 'eyJpdiI6IjZHc2RWbVwvY0JKWkRnUUNJUHpLVGpRPT0iLCJ2YWx1ZSI6IlMzVStLb0h5bGsyXC9OMDRJNnhPczJBPT0iLCJtYWMiOiIyYWUzODk0YTk3ZjFiMGVhNzg2OTc1MzlkNjNhYzY5ZWY2NjkwYWM5ODZiOTc3Y2I0ZWNlNDliMWJjN2Y3NGE4In0=', 'master', '2015-08-27 15:14:19', '0000-00-00 00:00:00'),
('test', 'andrian', 'eyJpdiI6Im1xUVJQbXpYTU51SllHUHd2WmFYVEE9PSIsInZhbHVlIjoiaVBXY2E1bWE1ek5haHhEeFwvbjNUeVE9PSIsIm1hYyI6ImM5YWNhMGUyOWU4YmRiZjdmNjZkMzZjNDU2Yjc3MzcxOWViNTU0YTQzZjEyZTgyOTFkNmMxYmNiZjU5YjM2NjAifQ==', 'TU', '2015-08-30 00:14:06', '2015-08-27 09:01:12'),
('valen', 'valentino', 'eyJpdiI6InBLZ1M3Tm9QckZ3bXhCYWhVWFIreFE9PSIsInZhbHVlIjoidmpzaHFGNHJnYzJiWHVzSVBNeXFvUT09IiwibWFjIjoiNDEyMWNjMzhlZmVhZGRhMTZlNGI0ZjlhZjY0YThhZTMwZDgwYmFjYjBlMDJmMWJlMmIwODYyOTcxYzczNjA5NSJ9', 'master', '2015-08-27 20:35:30', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_detail_program`
--
ALTER TABLE `m_detail_program`
 ADD PRIMARY KEY (`id`,`id_bidang`), ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `s_bidang`
--
ALTER TABLE `s_bidang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_jenis_belanja`
--
ALTER TABLE `s_jenis_belanja`
 ADD PRIMARY KEY (`id`,`id_kelompok`), ADD KEY `jenis_kelompok` (`id_kelompok`);

--
-- Indexes for table `s_kegiatan`
--
ALTER TABLE `s_kegiatan`
 ADD PRIMARY KEY (`id`,`id_bidang`,`id_program`), ADD KEY `kegiatan_bidang` (`id_bidang`), ADD KEY `kegiatan_program` (`id_program`);

--
-- Indexes for table `s_kelompok_belanja`
--
ALTER TABLE `s_kelompok_belanja`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_kelompok_kerja`
--
ALTER TABLE `s_kelompok_kerja`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_kepala`
--
ALTER TABLE `s_kepala`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_objek_belanja`
--
ALTER TABLE `s_objek_belanja`
 ADD PRIMARY KEY (`id`,`id_jenis`), ADD KEY `objek_jenis` (`id_jenis`);

--
-- Indexes for table `s_program`
--
ALTER TABLE `s_program`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_rincian_belanja`
--
ALTER TABLE `s_rincian_belanja`
 ADD PRIMARY KEY (`id`,`id_objek`), ADD KEY `rincian_objek` (`id_objek`);

--
-- Indexes for table `s_satuan_kerja`
--
ALTER TABLE `s_satuan_kerja`
 ADD PRIMARY KEY (`id`,`id_urusan`);

--
-- Indexes for table `s_urusan`
--
ALTER TABLE `s_urusan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_user`
--
ALTER TABLE `s_user`
 ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_detail_program`
--
ALTER TABLE `m_detail_program`
ADD CONSTRAINT `m_detail_program_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `s_bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_jenis_belanja`
--
ALTER TABLE `s_jenis_belanja`
ADD CONSTRAINT `jenis_kelompok` FOREIGN KEY (`id_kelompok`) REFERENCES `s_kelompok_belanja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_kegiatan`
--
ALTER TABLE `s_kegiatan`
ADD CONSTRAINT `kegiatan_bidang` FOREIGN KEY (`id_bidang`) REFERENCES `s_bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `kegiatan_program` FOREIGN KEY (`id_program`) REFERENCES `s_program` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_objek_belanja`
--
ALTER TABLE `s_objek_belanja`
ADD CONSTRAINT `objek_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `s_jenis_belanja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_rincian_belanja`
--
ALTER TABLE `s_rincian_belanja`
ADD CONSTRAINT `rincian_objek` FOREIGN KEY (`id_objek`) REFERENCES `s_objek_belanja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
