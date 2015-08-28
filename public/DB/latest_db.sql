-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2015 at 12:29 PM
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
('5.1.1', '5.1', 'BELANJA PEGAWAI', '2015-08-28 07:46:49', '0000-00-00 00:00:00'),
('5.2.1', '5.2', 'BELANJA MODAL\r\n', '2015-08-28 07:46:49', '0000-00-00 00:00:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `s_satuan_kerja`
--

CREATE TABLE IF NOT EXISTS `s_satuan_kerja` (
  `id` varchar(55) NOT NULL,
  `id_urusan` varchar(55) NOT NULL,
  `nama_skpd` varchar(100) NOT NULL,
  `nama_bendahara` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('1.05', 'Urusan Wajib Penataan Ruan', '2015-08-28 04:21:20', '0000-00-00 00:00:00');

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
('test', 'dewi', 'eyJpdiI6ImJtZFdRd2F4Q25RWTJSaHZTQUJCYVE9PSIsInZhbHVlIjoibmpkSDZIMjZPd0RGMThGNSs1MTVZdz09IiwibWFjIjoiYWRmNTE4NWM4NDYxODhmNmE5YmE2ZmRlMGVlNDI3YTYyMGMzYmY2NzhmMGYzZGVmMzE2NzhiODUyYmU0NTAxZSJ9', 'TU', '2015-08-27 10:12:40', '2015-08-27 09:01:12'),
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
-- Indexes for table `s_kelompok_belanja`
--
ALTER TABLE `s_kelompok_belanja`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_objek_belanja`
--
ALTER TABLE `s_objek_belanja`
 ADD PRIMARY KEY (`id`,`id_jenis`), ADD KEY `objek_jenis` (`id_jenis`);

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
-- Constraints for table `s_objek_belanja`
--
ALTER TABLE `s_objek_belanja`
ADD CONSTRAINT `objek_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `s_jenis_belanja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;