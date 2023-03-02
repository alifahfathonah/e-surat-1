-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2023 at 04:49 AM
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

--
-- Dumping data for table `mod_laporan`
--

INSERT INTO `mod_laporan` (`id`, `id_desa`, `id_user`, `judul`, `manfaat`, `sasaran`, `tgl_kegiatan`, `foto_kegiatan`, `pokja`, `created_at`, `updated_at`) VALUES
(1, 2, 11, 'test edit', 'test', 'test', '2023-02-15', '1677492748_ceebdc82b60047972a6d.jpg', 'Pokja I', '2023-02-27 17:12:28', '2023-02-27 17:12:41'),
(2, 1, 7, 'test aja', 'dssf', 'sdfsdf', '2023-02-09', '1677493000_b7c8603e54ca05934e4f.jpg', 'Pokja I', '2023-02-27 17:16:40', '2023-02-27 17:16:40'),
(3, 0, 16, 'asa', 'sdsds', 'dsdsdsd', '2023-03-01', '1677664310_d1302d4b5232e9d882ab.jpg', 'Pokja II', '2023-03-01 16:51:50', '2023-03-01 16:51:50');

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

--
-- Dumping data for table `mod_penandatangan`
--

INSERT INTO `mod_penandatangan` (`id`, `id_desa`, `nama`, `jabatan`, `ttd`, `created_at`, `updated_at`) VALUES
(1, 1, 'Abii Hutabarat', 'Ketua PKK', '1673603260_9c9cf82e8ba26af4242e.png', '2023-01-13 16:37:23', '2023-01-13 16:47:40'),
(2, 1, 'Kurnia Candra Wiguna', 'Sekretaris PKK', '1673848747_e6d5c619c02d2fd7ccf8.jpg', '2023-01-16 12:36:37', '2023-01-16 12:59:07'),
(3, 2, 'Test Nama', 'Ketua PKK', '1677489696_26db585968c26d518ff0.jpg', '2023-02-27 16:21:36', '2023-02-27 16:22:42'),
(5, 0, 'testnama', 'Ketua PKK', '1677664049_edc42da80f009eb8096f.jpg', '2023-03-01 16:47:29', '2023-03-01 16:47:29');

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

--
-- Dumping data for table `mod_setting`
--

INSERT INTO `mod_setting` (`id`, `nama_desa`, `id_desa`, `nama_kecamatan`, `alamat`, `kode_pos`, `created_at`, `updated_at`) VALUES
(1, 'Desa Mangkai Baru', 1, 'LIMA PULUH', 'Jalan Besar Dusun V Desa Mangkai Baru', '21255', '2023-01-16 11:47:39', '2023-02-27 12:22:42'),
(2, 'Desa Suka Ramai', 2, 'Sei Balai', 'Sei Balai', '21255', '2023-02-27 16:40:23', '2023-02-27 16:40:23');

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

--
-- Dumping data for table `mod_surat_keluar`
--

INSERT INTO `mod_surat_keluar` (`id`, `id_user`, `id_desa`, `no_surat`, `sifat_surat`, `kategori_surat`, `perihal`, `penandatangan`, `isi`, `jlh_lampiran`, `satuan`, `file_lampiran`, `tujuan`, `pokja`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '220', 'Penting', 'Undangan', 'Undangan Sosialisasi TTE', '1', '<p style=\"text-align:justify\"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Contrary to popular belief</strong>, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n', 1, 'Lembar', '1673345457_ad93716b4efebced3afc.pdf', 'Pokja II/Anggota', 'Pokja I', '2023-01-10 15:44:01', '2023-01-25 14:02:35'),
(2, 11, 2, '55455', 'Biasa', 'Undangan', 'sdfsfsd', '3', '<p>sdfsdf</p>\r\n', 0, NULL, NULL, 'Pokja I/Anggota', 'Pokja I', '2023-02-27 17:11:29', '2023-02-27 17:11:29'),
(3, 16, 0, '454/45', 'Biasa', 'Undangan', 'dsds', '5', '<p>sds</p>\r\n', 1, 'Lembar', '1677664083_9f043b54e2a838a52b77.pdf', 'Pokja II/Anggota', 'Pokja II', '2023-03-01 16:48:03', '2023-03-01 16:48:03');

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

--
-- Dumping data for table `mod_surat_masuk`
--

INSERT INTO `mod_surat_masuk` (`id`, `id_user`, `id_desa`, `no_surat`, `sifat_surat`, `kategori_surat`, `perihal`, `asal_surat`, `file`, `lampiran`, `pokja`, `created_at`, `updated_at`) VALUES
(11, 8, 1, '009', 'Biasa', 'Biasa', 'Permohonan TTE', 'Dinas Komunikasi dan Informatika ', '1673074326_6419ee021a7aeeb76ae0.pdf', '1673074456_f51038265bbebcdc2d05.pdf', 'Pokja II', '2023-01-07 12:18:51', '2023-01-07 13:54:16'),
(13, 7, 1, '20/12/2022', 'Biasa', 'Undangan', 'Undangan', 'Dinas Komunikasi dan Informatika', '1673170637_74431f0b9d51dbe274af.pdf', NULL, 'Pokja I', '2023-01-08 16:37:17', '2023-01-08 16:37:17'),
(14, 11, 2, '894/34/5565', 'Biasa', 'Biasa', 'test', 'PKK', '1677492599_dd53fb1b375b0d698723.pdf', NULL, 'Pokja I', '2023-02-27 17:09:59', '2023-02-27 17:10:17'),
(15, 16, 0, '545/454', 'Biasa', 'Biasa', 'sdfsdfsdf', 'sdfsdfsf', '1677663514_dfbeb698d3f9c7d034a6.pdf', NULL, 'Pokja II', '2023-03-01 16:38:34', '2023-03-01 16:38:34');

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
(1, 1, 'Abii Hutabarat', '082274884828', 'abiihutabarat29@gmail.com', 'abiihtb29', '$2y$10$DFoQSmJXIflOCKafq7RjI.7A9ABHIQAIFh32xsD2ZP7Bhnf5VdzbK', '1673177565_bc079020d1002df6ea46.png', 1, NULL, '2022-09-22 10:12:46', '2023-02-27 15:53:43'),
(6, 1, 'Agung Surya Bahari', '082274884828', 'agungsurya@gmail.com', 'agungsurya', '$2y$10$tPfcsswhWp9heWjy8pIwouTGoQjsOffWzvidP5BjVmnGG.qXtJjIO', '1673330616_8dfe7ca77c6c6ddfc5c9.png', 2, NULL, '2023-01-03 16:30:52', '2023-02-27 16:04:58'),
(7, 1, 'Kurnia Candra Wiguna', '082278765600', 'kurniacandra@gmail.com', 'kurniacandra', '$2y$10$d5iDcPM164HMKmEm78HYbe1XVJo6czHyCPo3e/vR2T0tDd34MRO2y', '1673176583_8612bcf1771e8246ee97.png', 3, 'Pokja I', '2023-01-03 17:06:49', '2023-02-27 16:04:49'),
(8, 1, 'Zulfahmi', '082267566554', 'fahmi@gmail.com', 'zulfahmi', '$2y$10$4k6oPmMJN80A/WNDdHnnfuc.TUUAT1rlx0i2DqXpLTiAq/RHzEhjK', '1673242281_09aec04ab9839e57ca3e.png', 3, 'Pokja II', '2023-01-03 17:09:54', '2023-02-27 16:04:23'),
(9, 0, 'Administrator Kabupaten', '082274884828', 'admkab@gmail.com', 'admkab29', '$2y$10$4QCu33MqdSKDtrPFYAQ.gOftUxh05k/zuVsC1GHE4HKdpENkmUm6G', '1677494595_1b0b3ca645bbaeb7b9ef.png', 4, NULL, '2023-02-27 12:42:27', '2023-02-27 17:43:15'),
(10, 2, 'Admin Suka Ramai', '082278788776', 'sukaramai@gmail.com', 'adm@sukaramai', '$2y$10$CGr6lAmVznqp7BXfjB1n/.ehBxFXk3ZZrkI7PQ1Z5KimSzBCljmn.', 'blank.png', 1, NULL, '2023-02-27 16:00:30', '2023-02-28 11:32:01'),
(11, 2, 'Andika Pratama', '082256677665', 'andika@gmail.com', 'andika22', '$2y$10$zBqQ6OPiDVySBfc6GP9ar.daVumMdRmu1Bj5xe5eXmwk2pnwEgaUi', '1677493050_8c1ad5050699b37150a4.jpg', 3, 'Pokja I', '2023-02-27 16:13:57', '2023-02-27 17:17:30'),
(14, 2, 'sekretaris', '082276766565', 'sek@gmail.com', 'sekretaris', '$2y$10$6XN6Ko2GY5GrQFxofDerTe8dRTjN6NkH6pvAflCgnIZRzFL1WBA8i', 'blank.png', 2, NULL, '2023-02-28 11:54:01', '2023-02-28 11:54:01'),
(15, 0, 'sekretaris', '082265566776', 'sekkab@gmail.com', 'sekretariskab', '$2y$10$LHr9QsfNtwOxnKko8OXuC.zXT2vZX0B5P.vuCn9BG.1m1B/RC6K2.', 'blank.png', 2, NULL, '2023-02-28 11:54:32', '2023-02-28 12:04:48'),
(16, 0, 'testuser', '082265567700', 'testuser@gmail.com', 'usernametestuser', '$2y$10$UME1y3YbMAfr6CCCBNMDputg2DSDOBwELh9I6aEHDex0QdORaL7qC', 'blank.png', 3, 'Pokja II', '2023-02-28 12:00:55', '2023-02-28 12:02:35'),
(17, 9, 'Kecamatan Lima Puluh Pesisir', '082274884829', 'limapuluh@gmail.com', 'ivatestkecamatan', '$2y$10$R.d2qXsLuBMGrfYgC286duzjifqHLrUKGk34Mfg5MmMb8HcOjKNNG', 'blank.png', 1, NULL, '2023-03-02 11:47:02', '2023-03-02 11:47:02');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mod_penandatangan`
--
ALTER TABLE `mod_penandatangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mod_setting`
--
ALTER TABLE `mod_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mod_surat_keluar`
--
ALTER TABLE `mod_surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mod_surat_masuk`
--
ALTER TABLE `mod_surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mod_user`
--
ALTER TABLE `mod_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
