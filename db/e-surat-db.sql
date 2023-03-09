-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2023 at 02:29 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-surat-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mod_desa`
--

CREATE TABLE `mod_desa` (
  `id` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama_desa` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod_desa`
--

INSERT INTO `mod_desa` (`id`, `kode`, `nama_desa`, `created_at`, `updated_at`) VALUES
(1, '0401', 'Mangkai Baru', '2023-02-27 13:15:59', '2023-02-27 13:21:11'),
(2, '0705', 'Suka Ramai', '2023-02-27 13:21:01', '2023-02-27 13:21:01'),
(3, '0607', 'Bandar Rahmat', '2023-02-27 13:21:29', '2023-02-27 13:21:29'),
(4, '0202', 'Simodong', '2023-02-27 13:21:52', '2023-02-27 13:21:52'),
(5, '0118', 'Sei Raja', '2023-02-27 13:22:08', '2023-02-27 13:22:08'),
(6, '1101', 'Sumber Tani', '2023-02-27 13:22:52', '2023-02-27 13:22:52'),
(7, '1209', 'Pematang Rambai', '2023-02-27 13:23:21', '2023-02-27 13:23:21'),
(8, '1006', 'Pulau Sejuk', '2023-02-27 13:23:34', '2023-02-27 13:23:34'),
(9, '0001', 'Ivatest', '2023-02-27 15:10:11', '2023-02-27 15:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `mod_laporan`
--

CREATE TABLE `mod_laporan` (
  `id` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `manfaat` varchar(255) NOT NULL,
  `sasaran` varchar(255) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `foto_kegiatan` varchar(255) NOT NULL,
  `pokja` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mod_penandatangan`
--

CREATE TABLE `mod_penandatangan` (
  `id` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `ttd` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mod_setting`
--

CREATE TABLE `mod_setting` (
  `id` int(11) NOT NULL,
  `nama_desa` varchar(255) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mod_surat_keluar`
--

CREATE TABLE `mod_surat_keluar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `sifat_surat` varchar(255) NOT NULL,
  `kategori_surat` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `penandatangan` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  `jlh_lampiran` int(11) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `file_lampiran` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) NOT NULL,
  `pokja` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mod_surat_masuk`
--

CREATE TABLE `mod_surat_masuk` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `sifat_surat` varchar(255) NOT NULL,
  `kategori_surat` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `lampiran` varchar(225) DEFAULT NULL,
  `pokja` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mod_user`
--

CREATE TABLE `mod_user` (
  `id` int(11) NOT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `pokja` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mod_user`
--

INSERT INTO `mod_user` (`id`, `id_desa`, `nama`, `nohp`, `email`, `username`, `password`, `foto`, `level`, `pokja`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin Mangkai Baru', '082274884828', 'mangkai@gmail.com', 'adm@mangkai', '$2y$10$DFoQSmJXIflOCKafq7RjI.7A9ABHIQAIFh32xsD2ZP7Bhnf5VdzbK', '1673177565_bc079020d1002df6ea46.png', 1, NULL, '2022-09-22 10:12:46', '2023-02-27 15:53:43'),
(9, 0, 'Administrator Kabupaten', '082274884828', 'admkab@gmail.com', 'admkab29', '$2y$10$4QCu33MqdSKDtrPFYAQ.gOftUxh05k/zuVsC1GHE4HKdpENkmUm6G', '1677494595_1b0b3ca645bbaeb7b9ef.png', 4, NULL, '2023-02-27 12:42:27', '2023-02-27 17:43:15'),
(10, 2, 'Admin Suka Ramai', '082278788776', 'sukaramai@gmail.com', 'adm@sukaramai', '$2y$10$CGr6lAmVznqp7BXfjB1n/.ehBxFXk3ZZrkI7PQ1Z5KimSzBCljmn.', 'blank.png', 1, NULL, '2023-02-27 16:00:30', '2023-02-28 11:32:01'),
(17, 9, 'Kecamatan Lima Puluh Pesisir', '082274884829', 'limapuluh@gmail.com', 'adm@ivatest', '$2y$10$R.d2qXsLuBMGrfYgC286duzjifqHLrUKGk34Mfg5MmMb8HcOjKNNG', 'blank.png', 1, NULL, '2023-03-02 11:47:02', '2023-03-02 11:47:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mod_desa`
--
ALTER TABLE `mod_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_laporan`
--
ALTER TABLE `mod_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_penandatangan`
--
ALTER TABLE `mod_penandatangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_setting`
--
ALTER TABLE `mod_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_surat_keluar`
--
ALTER TABLE `mod_surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_surat_masuk`
--
ALTER TABLE `mod_surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mod_user`
--
ALTER TABLE `mod_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mod_desa`
--
ALTER TABLE `mod_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mod_laporan`
--
ALTER TABLE `mod_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mod_penandatangan`
--
ALTER TABLE `mod_penandatangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mod_setting`
--
ALTER TABLE `mod_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mod_surat_keluar`
--
ALTER TABLE `mod_surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mod_surat_masuk`
--
ALTER TABLE `mod_surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mod_user`
--
ALTER TABLE `mod_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
