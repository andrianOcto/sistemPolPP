-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 30, 2015 at 03:51 AM
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
  `tahun` int(11) NOT NULL,
  `jan` double NOT NULL DEFAULT '0',
  `feb` double NOT NULL DEFAULT '0',
  `mar` double NOT NULL DEFAULT '0',
  `apr` double NOT NULL DEFAULT '0',
  `mei` double NOT NULL DEFAULT '0',
  `jun` double NOT NULL DEFAULT '0',
  `jul` double NOT NULL DEFAULT '0',
  `agu` double NOT NULL DEFAULT '0',
  `sep` double NOT NULL DEFAULT '0',
  `okt` double NOT NULL DEFAULT '0',
  `nov` double NOT NULL DEFAULT '0',
  `des` double NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_detail_rko`
--

INSERT INTO `m_detail_rko` (`id_kegiatan`, `tahun`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`, `updated_at`, `created_at`) VALUES
('.0001', 2015, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015-09-26 05:08:53', '2015-09-26 05:08:53'),
('1.19.1.19.02.01.0001', 2015, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015-09-26 05:27:41', '2015-09-26 05:27:41'),
('1.19.1.19.02.01.0209', 2015, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015-09-26 05:29:22', '2015-09-26 05:29:22'),
('1.19.1.19.02.01.0833', 2015, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015-09-26 05:30:53', '2015-09-26 05:30:53'),
('1.231', 2015, 90, 15, 100, 70, 66, 22, 11, 90, 80, 99, 11, 88, '2015-09-17 10:19:37', '2015-09-16 09:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `m_detail_spj`
--

CREATE TABLE IF NOT EXISTS `m_detail_spj` (
`id` int(11) NOT NULL,
  `id_kegiatan` varchar(55) NOT NULL,
  `id_rincian` varchar(55) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `harga` double NOT NULL,
  `keperluan` varchar(200) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_detail_spj`
--

INSERT INTO `m_detail_spj` (`id`, `id_kegiatan`, `id_rincian`, `tahun`, `jumlah`, `harga`, `keperluan`, `tanggal`, `updated_at`, `created_at`) VALUES
(1, '1.19.1.19.02.01.0001', '5.1.1.01.01', 2015, 10, 2000, 'Amplop', '0000-00-00', '2015-09-26 10:39:21', '2015-09-26 10:39:21'),
(2, '1.19.1.19.02.01.0001', '5.1.1.01.01', 2015, 10, 5000, 'perangko', '0000-00-00', '2015-09-26 10:43:14', '2015-09-26 10:43:14'),
(3, '1.19.1.19.02.01.0001', '5.1.1.01.01', 2015, 40, 5000, 'internet', '0000-00-00', '2015-09-30 01:04:58', '2015-09-26 10:46:36'),
(9, '1.19.1.19.02.01.0001', '5.2.2.03.01', 2015, 5, 50000, 'pesawat telepon', '2015-09-29', '2015-09-30 01:05:01', '2015-09-29 16:51:46');

-- --------------------------------------------------------

--
-- Table structure for table `m_rencana_realisasi`
--

CREATE TABLE IF NOT EXISTS `m_rencana_realisasi` (
  `id_kegiatan` varchar(55) NOT NULL,
  `tahun` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `jumlah` float NOT NULL,
  `harga` double NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_rencana_realisasi`
--

INSERT INTO `m_rencana_realisasi` (`id_kegiatan`, `tahun`, `description`, `jumlah`, `harga`, `updated_at`, `created_at`) VALUES
('1.19.1.19.02.01.0001', 2015, 'Amplop', 100, 1000, '2015-09-26 06:23:27', '2015-09-26 06:23:27'),
('1.19.1.19.02.01.0001', 2015, 'Kertas A5', 5, 50000, '2015-09-26 06:24:03', '2015-09-26 06:24:03'),
('1.19.1.19.02.01.0001', 2015, 'perangko', 100, 2000, '2015-09-26 06:23:36', '2015-09-26 06:23:36');

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
('01', 'TU', 'TATA USAHA', '2015-09-26 06:12:06', '0000-00-00 00:00:00'),
('02', 'BANGTAS', 'PENGEMBANGAN KAPASITAS DAN SARPRAS', '2015-09-26 04:42:57', '2015-08-27 23:59:39'),
('03', 'TRANSMAS', 'KETENTRAMAN MASYARAKAT', '2015-09-26 04:42:33', '2015-09-26 04:42:33'),
('04', 'GAKDA', 'PENEGAKAN PERDA', '2015-09-26 04:43:28', '2015-09-26 04:43:28'),
('05', 'TU RUTIN', 'RUTIN', '2015-09-26 04:43:46', '2015-09-26 04:43:46');

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
('5.1.1', '5.1', 'BELANJA PEGAWAI', '2015-09-26 04:57:45', '2015-09-26 04:57:45'),
('5.2.1', '5.2', 'BELANJA PEGAWAI', '2015-09-26 04:58:29', '0000-00-00 00:00:00'),
('5.2.2', '5.2', 'BELANJA BARANG DAN JASA', '2015-09-26 04:58:49', '2015-09-26 04:58:49'),
('5.2.3', '5.2', 'BELANJA MODAL', '2015-09-26 04:58:59', '2015-09-26 04:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `s_kegiatan`
--

CREATE TABLE IF NOT EXISTS `s_kegiatan` (
  `tahun` int(11) NOT NULL,
  `id` varchar(55) NOT NULL,
  `id_bidang` varchar(55) NOT NULL,
  `nama_bidang` varchar(255) NOT NULL,
  `nama_lengkap_bidang` varchar(255) NOT NULL,
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

INSERT INTO `s_kegiatan` (`tahun`, `id`, `id_bidang`, `nama_bidang`, `nama_lengkap_bidang`, `id_program`, `description`, `anggaran`, `sasaran`, `updated_at`, `created_at`) VALUES
(2015, '1.19.1.19.02.01.0001', '05', 'TU RUTIN', 'RUTIN', '1.19.1.19.02.01', 'penyediaan jasa surat menyurat', 11000000, ' ', '2015-09-26 06:21:25', '2015-09-26 05:27:41'),
(2015, '1.19.1.19.02.01.0209', '05', 'TU RUTIN', 'RUTIN', '1.19.1.19.02.01', 'penyediaan jasa komunikasi, sumber daya air dan listrik', 66000000, ' ', '2015-09-26 06:21:52', '2015-09-26 05:29:22'),
(2015, '1.19.1.19.02.01.0833', '05', 'TU RUTIN', 'RUTIN', '1.19.1.19.02.01', 'penyediaan alat tulis kantor', 82500000, ' ', '2015-09-26 06:22:04', '2015-09-26 05:30:53');

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
('5.1.1.01', '5.1.1', 'HONORARIUM PNS', '2015-09-26 04:59:33', '2015-09-26 04:59:33'),
('5.1.1.02', '5.1.1', 'HONORARIUM NON PNS', '2015-09-26 04:59:46', '2015-09-26 04:59:46'),
('5.2.2.01', '5.2.2', 'BELANJA BAHAN / MATERIAL', '2015-09-26 05:00:29', '2015-09-26 05:00:29'),
('5.2.2.02', '5.2.2', 'BELANJA BAHAN PAKAI HABIS', '2015-09-26 05:00:49', '2015-09-26 05:00:49'),
('5.2.2.03', '5.2.2', 'BELANJA JASA KANTOR', '2015-09-26 05:01:01', '2015-09-26 05:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `s_program`
--

CREATE TABLE IF NOT EXISTS `s_program` (
  `tahun` int(11) NOT NULL,
  `id` varchar(55) NOT NULL,
  `description` varchar(110) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_program`
--

INSERT INTO `s_program` (`tahun`, `id`, `description`, `updated_at`, `created_at`) VALUES
(2015, '1.19.1.19.02.01', 'PROGRAM PELAYANAN ADMINISTRASI PERKANTORAN', '2015-09-26 04:54:27', '2015-09-26 04:54:27'),
(2015, '1.19.1.19.02.02', 'PROGRAM PENINGKATAN SARANA DAN PRASARANA APATUR', '2015-09-26 04:54:11', '2015-09-26 04:54:11'),
(2015, '1.19.1.19.02.03', 'PROGRAM PENINGKATAN DISIPLIN APATUR', '2015-09-26 04:53:51', '2015-09-26 04:53:51'),
(2015, '1.19.1.19.02.15', 'PROGRAM PENINGKATAN KEAMANAN DAN KENYAMANAN LINGKUNGAN', '2015-09-26 04:52:57', '2015-09-26 04:52:57'),
(2015, '1.19.1.19.02.19', 'PROGRAM PEMBERDAYAAN MASYARAKAT UNTUK MENJAGA KETERTIBAN DAN KEAMANAN', '2015-09-26 04:52:08', '2015-09-26 04:49:49'),
(2015, '1.20.1.19.02.05', 'PROGRAM PENINGKATAN KAPASITAS SUMBER DAYA APATUR', '2015-09-26 04:53:27', '2015-09-26 04:53:27'),
(2015, '1.20.1.19.02.15', 'PROGRAM PENATAAN PERATURAN PERUNDANG-UNDANGAN', '2015-09-26 04:49:24', '2015-09-26 04:49:24'),
(2015, '1.20.1.19.02.16', 'PROGRAM PENYELENGGARAAN PEMERINTAHAN UMUM', '2015-09-26 04:48:44', '0000-00-00 00:00:00');

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
('5.1.1.01.01', '5.1.1.01', 'HONORARIUM PANITIA PELAKSANA KEGIATAN', '2015-09-26 05:01:40', '2015-09-26 05:01:40'),
('5.2.2.01.03', '5.2.2.01', 'HONORARIUM PENGELOLA KEUANGAN SKPD', '2015-09-26 05:02:09', '2015-09-26 05:02:09'),
('5.2.2.03.01', '5.2.2.03', 'BELANJA TELEPON', '2015-09-26 05:04:20', '2015-09-26 05:04:20'),
('5.2.2.03.04', '5.2.2.03', 'BELANJA PERANGKO, MATERAI DAN BENDA POS LAINNYA', '2015-09-26 05:03:43', '2015-09-26 05:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `s_role`
--

CREATE TABLE IF NOT EXISTS `s_role` (
`id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_role`
--

INSERT INTO `s_role` (`id`, `description`, `updated_at`, `created_at`) VALUES
(1, 'master', '2015-09-24 18:13:15', '2015-09-24 18:01:01'),
(3, 'TU', '2015-09-24 18:14:46', '2015-09-24 18:13:26'),
(4, 'Tambahan', '2015-09-24 18:41:58', '2015-09-24 18:41:58');

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
('1', '1.01', '2', 'SATUAN POLISI PAMONG PRAJA', 'BENDAHARA', '199999', '19191919', 'BCA', '199919919', '197012129999-1', 'Drs. M, Arief Irwanto, MSi', 'KEPALA SATUAN POLISI PAMONG PRAJA', '2015-09-26 04:45:34', '2015-09-02 11:02:43');

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
('testlagi', 'test', 'eyJpdiI6InNvOTVyQ3RPaEIyMnNMSXJDcEZBUlE9PSIsInZhbHVlIjoiQ2tlSlhiQ0JcL1V4UVFlS2ZNSFMwYlE9PSIsIm1hYyI6ImMzMGQyNjI1MTVjYTA1MDFjMmRjYzkyMmJjODY3ZGZkYjZjNDYyMjQxZThiOThjNGE2MWU3MDRlZGUzZjdmNjAifQ==', 'Tambahan', '2015-09-24 18:42:13', '2015-09-24 18:31:12'),
('valen', 'valentino', 'eyJpdiI6InBLZ1M3Tm9QckZ3bXhCYWhVWFIreFE9PSIsInZhbHVlIjoidmpzaHFGNHJnYzJiWHVzSVBNeXFvUT09IiwibWFjIjoiNDEyMWNjMzhlZmVhZGRhMTZlNGI0ZjlhZjY0YThhZTMwZDgwYmFjYjBlMDJmMWJlMmIwODYyOTcxYzczNjA5NSJ9', 'master', '2015-08-27 20:35:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_realisasi`
--
CREATE TABLE IF NOT EXISTS `v_realisasi` (
`id` varchar(55)
,`id_bidang` varchar(55)
,`nama_bidang` varchar(255)
,`nama_kegiatan` varchar(255)
,`anggaran` double
,`tanggal` date
,`realisasi_keperluan` varchar(200)
,`realisasi_jumlah` double
,`realisasi_harga` double
,`rencana_keperluan` varchar(255)
,`rencana_jumlah` float
,`rencana_harga` double
);
-- --------------------------------------------------------

--
-- Structure for view `v_realisasi`
--
DROP TABLE IF EXISTS `v_realisasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_realisasi` AS select `s_kegiatan`.`id` AS `id`,`s_kegiatan`.`id_bidang` AS `id_bidang`,`s_kegiatan`.`nama_bidang` AS `nama_bidang`,`s_kegiatan`.`description` AS `nama_kegiatan`,`s_kegiatan`.`anggaran` AS `anggaran`,`m_detail_spj`.`tanggal` AS `tanggal`,`m_detail_spj`.`keperluan` AS `realisasi_keperluan`,`m_detail_spj`.`jumlah` AS `realisasi_jumlah`,`m_detail_spj`.`harga` AS `realisasi_harga`,`m_rencana_realisasi`.`description` AS `rencana_keperluan`,`m_rencana_realisasi`.`jumlah` AS `rencana_jumlah`,`m_rencana_realisasi`.`harga` AS `rencana_harga` from ((`s_kegiatan` join `m_detail_spj` on((`s_kegiatan`.`id` = `m_detail_spj`.`id_kegiatan`))) left join `m_rencana_realisasi` on(((`m_detail_spj`.`id_kegiatan` = `m_rencana_realisasi`.`id_kegiatan`) and (`m_detail_spj`.`keperluan` = `m_rencana_realisasi`.`description`))));

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
 ADD PRIMARY KEY (`id_kegiatan`,`tahun`);

--
-- Indexes for table `m_detail_spj`
--
ALTER TABLE `m_detail_spj`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_rencana_realisasi`
--
ALTER TABLE `m_rencana_realisasi`
 ADD PRIMARY KEY (`id_kegiatan`,`tahun`,`description`);

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
 ADD PRIMARY KEY (`tahun`,`id`,`id_bidang`,`id_program`), ADD KEY `kegiatan_bidang` (`id_bidang`), ADD KEY `kegiatan_program` (`id_program`);

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
 ADD PRIMARY KEY (`tahun`,`id`);

--
-- Indexes for table `s_rincian_belanja`
--
ALTER TABLE `s_rincian_belanja`
 ADD PRIMARY KEY (`id`,`id_objek`), ADD KEY `rincian_objek` (`id_objek`);

--
-- Indexes for table `s_role`
--
ALTER TABLE `s_role`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `description` (`description`);

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
 ADD PRIMARY KEY (`username`), ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_detail_spj`
--
ALTER TABLE `m_detail_spj`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `s_role`
--
ALTER TABLE `s_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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

--
-- Constraints for table `s_rincian_belanja`
--
ALTER TABLE `s_rincian_belanja`
ADD CONSTRAINT `rincian_objek` FOREIGN KEY (`id_objek`) REFERENCES `s_objek_belanja` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `s_user`
--
ALTER TABLE `s_user`
ADD CONSTRAINT `user_role` FOREIGN KEY (`role`) REFERENCES `s_role` (`description`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
