-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2015 at 01:59 PM
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
  `sasaran` varchar(300) NOT NULL
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
  `des_detail` varchar(200) DEFAULT NULL
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
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_bidang`
--

CREATE TABLE IF NOT EXISTS `s_bidang` (
  `id` varchar(55) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_jenis_belanja`
--

CREATE TABLE IF NOT EXISTS `s_jenis_belanja` (
  `id` varchar(55) NOT NULL,
  `id_kelompok` varchar(55) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_kelompok_belanja`
--

CREATE TABLE IF NOT EXISTS `s_kelompok_belanja` (
  `id` varchar(55) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_kelompok_kerja`
--

CREATE TABLE IF NOT EXISTS `s_kelompok_kerja` (
  `id` varchar(55) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_kelompok_kerja`
--

INSERT INTO `s_kelompok_kerja` (`id`, `deskripsi`) VALUES
('1.2.5', 'testKK');

-- --------------------------------------------------------

--
-- Table structure for table `s_kepala`
--

CREATE TABLE IF NOT EXISTS `s_kepala` (
  `id` varchar(55) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_objek_belanja`
--

CREATE TABLE IF NOT EXISTS `s_objek_belanja` (
  `id_jenis` varchar(55) NOT NULL,
  `id` varchar(55) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_program`
--

CREATE TABLE IF NOT EXISTS `s_program` (
  `id` varchar(55) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_rincian_belanja`
--

CREATE TABLE IF NOT EXISTS `s_rincian_belanja` (
  `id` varchar(55) NOT NULL,
  `id_objek` varchar(55) NOT NULL,
  `description` int(11) NOT NULL
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
  `no_rekening` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_urusan`
--

CREATE TABLE IF NOT EXISTS `s_urusan` (
  `id` varchar(55) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_user`
--

CREATE TABLE IF NOT EXISTS `s_user` (
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_detail_program`
--
ALTER TABLE `m_detail_program`
 ADD PRIMARY KEY (`id`,`id_bidang`), ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `m_detail_rko`
--
ALTER TABLE `m_detail_rko`
 ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `m_detail_spj`
--
ALTER TABLE `m_detail_spj`
 ADD PRIMARY KEY (`id`), ADD KEY `id_kegiatan` (`id_kegiatan`), ADD KEY `id_rincian` (`id_rincian`);

--
-- Indexes for table `s_bidang`
--
ALTER TABLE `s_bidang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_jenis_belanja`
--
ALTER TABLE `s_jenis_belanja`
 ADD PRIMARY KEY (`id`,`id_kelompok`), ADD KEY `kelompok_jenis` (`id_kelompok`);

--
-- Indexes for table `s_kelompok_kerja`
--
ALTER TABLE `s_kelompok_kerja`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_objek_belanja`
--
ALTER TABLE `s_objek_belanja`
 ADD PRIMARY KEY (`id_jenis`,`id`);

--
-- Indexes for table `s_user`
--
ALTER TABLE `s_user`
 ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `s_jenis_belanja`
--
ALTER TABLE `s_jenis_belanja`
ADD CONSTRAINT `kelompok_jenis` FOREIGN KEY (`id_kelompok`) REFERENCES `s_kelompok_kerja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_objek_belanja`
--
ALTER TABLE `s_objek_belanja`
ADD CONSTRAINT `objek_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `s_jenis_belanja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
