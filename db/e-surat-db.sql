-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2023 at 07:44 AM
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
-- Table structure for table `mod_penandatangan`
--

CREATE TABLE `mod_penandatangan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `ttd` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod_penandatangan`
--

INSERT INTO `mod_penandatangan` (`id`, `nama`, `jabatan`, `ttd`, `created_at`, `updated_at`) VALUES
(1, 'Abii Hutabarat', 'Ketua PKK', '1673603260_9c9cf82e8ba26af4242e.png', '2023-01-13 16:37:23', '2023-01-13 16:47:40'),
(2, 'Kurnia Candra Wiguna', 'Sekretaris PKK', '1673848747_e6d5c619c02d2fd7ccf8.jpg', '2023-01-16 12:36:37', '2023-01-16 12:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `mod_setting`
--

CREATE TABLE `mod_setting` (
  `id` int(11) NOT NULL,
  `nama_desa` varchar(255) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mod_setting`
--

INSERT INTO `mod_setting` (`id`, `nama_desa`, `nama_kecamatan`, `alamat`, `kode_pos`, `created_at`, `updated_at`) VALUES
(1, 'DESA MANGKAI BARU', 'LIMA PULUH', 'Jalan Besar Dusun V Desa Mangkai Baru', '21255', '2023-01-16 11:47:39', '2023-01-16 13:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `mod_surat_keluar`
--

CREATE TABLE `mod_surat_keluar` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
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

INSERT INTO `mod_surat_keluar` (`id`, `id_user`, `no_surat`, `sifat_surat`, `kategori_surat`, `perihal`, `penandatangan`, `isi`, `jlh_lampiran`, `satuan`, `file_lampiran`, `tujuan`, `pokja`, `created_at`, `updated_at`) VALUES
(1, 7, '220', 'Penting', 'Undangan', 'Undangan Sosialisasi TTE', '1', '<p style=\"text-align:justify\"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>Contrary to popular belief</strong>, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n', 1, 'Lembar', '1673345457_ad93716b4efebced3afc.pdf', 'Pokja II/Anggota', 'Pokja I', '2023-01-10 15:44:01', '2023-01-25 14:02:35'),
(3, 7, '004', 'Biasa', 'Undangan', 'Sosialisasi', '2', '<p style=\"text-align:justify\"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 0, '', NULL, 'Pokja III/Anggota', 'Pokja I', '2023-01-10 17:36:18', '2023-01-16 13:40:32'),
(4, 8, '445', 'Biasa', 'Undangan', 'Undangan', '1', '<p style=\"text-align:justify\">Bersama ini mengharap dengan hormat atas kehadiran Saudara besok pada :</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hari&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Senin&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tanggal&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 07 Februari 2022&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Waktu&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 15:45 WIB s/d selesai&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tempat&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;Command Center<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Acara&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;Sosialisasi</p>\r\n\r\n<p style=\"text-align:justify\">Demikian atas perhatiannya disampaikan terima kasih.</p>\r\n', 1, 'Lembar', '1673497386_3c886f43ecdff23f8ef0.pdf', 'Pokja I/Anggota', 'Pokja II', '2023-01-12 11:23:06', '2023-01-16 12:37:28'),
(5, 6, '567', 'Biasa', 'Undangan', 'Undangan', '1', '<p style=\"text-align:justify\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 0, '', NULL, 'Pokja I/Anggota', NULL, '2023-01-16 13:35:08', '2023-01-16 13:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `mod_surat_masuk`
--

CREATE TABLE `mod_surat_masuk` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
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

INSERT INTO `mod_surat_masuk` (`id`, `id_user`, `no_surat`, `sifat_surat`, `kategori_surat`, `perihal`, `asal_surat`, `file`, `lampiran`, `pokja`, `created_at`, `updated_at`) VALUES
(11, 8, '009', 'Biasa', 'Biasa', 'Permohonan TTE', 'Dinas Komunikasi dan Informatika ', '1673074326_6419ee021a7aeeb76ae0.pdf', '1673074456_f51038265bbebcdc2d05.pdf', 'Pokja II', '2023-01-07 12:18:51', '2023-01-07 13:54:16'),
(13, 7, '20/12/2022', 'Biasa', 'Undangan', 'Undangan', 'Dinas Komunikasi dan Informatika', '1673170637_74431f0b9d51dbe274af.pdf', NULL, 'Pokja I', '2023-01-08 16:37:17', '2023-01-08 16:37:17'),
(14, 6, '54', 'Biasa', 'Biasa', 'sdfsdfsdf', 'asdfsdfsdf', '1673329311_e2d63ef7fb7b26548cc8.pdf', NULL, NULL, '2023-01-10 12:41:51', '2023-01-10 12:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `mod_user`
--

CREATE TABLE `mod_user` (
  `id` int(11) NOT NULL,
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

INSERT INTO `mod_user` (`id`, `nama`, `nohp`, `email`, `username`, `password`, `foto`, `level`, `pokja`, `created_at`, `updated_at`) VALUES
(1, 'Abii Hutabarat', '082274884828', 'abiihutabarat29@gmail.com', 'abiihtb29', '$2y$10$tGG177riRGMY5z57eQ1IH.Lg4t8GVIXDhTpd84Z36q94s3jFuaVjO', '1673177565_bc079020d1002df6ea46.png', 1, NULL, '2022-09-22 10:12:46', '2023-01-08 18:32:45'),
(6, 'Agung Surya Bahari', '082274884828', 'agungsurya@gmail.com', 'agungsurya', '$2y$10$rXqzL3bIGdkng2wgmENG3O.mZTodx8MnbH6b76.A83HUNhdc2VSPK', '1673330616_8dfe7ca77c6c6ddfc5c9.png', 2, NULL, '2023-01-03 16:30:52', '2023-01-10 13:03:36'),
(7, 'Kurnia Candra Wiguna', '082278765600', 'kurniacandra@gmail.com', 'kurniacandra', '$2y$10$DexR0xzv96X3M5UFrcAj/ONKBzbLocPI0PcF7a1mIuNb6Z6/TJbj6', '1673176583_8612bcf1771e8246ee97.png', 3, 'Pokja I', '2023-01-03 17:06:49', '2023-01-08 18:17:24'),
(8, 'Zulfahmi', '082267566554', 'fahmi@gmail.com', 'zulfahmi', '$2y$10$74BdhNqOdbO9tBtxehC1MeE2ajCS9z9i1VKJVEchP53LwgfQew2Ri', '1673242281_09aec04ab9839e57ca3e.png', 3, 'Pokja II', '2023-01-03 17:09:54', '2023-01-09 12:31:21');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `mod_penandatangan`
--
ALTER TABLE `mod_penandatangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mod_setting`
--
ALTER TABLE `mod_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mod_surat_keluar`
--
ALTER TABLE `mod_surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mod_surat_masuk`
--
ALTER TABLE `mod_surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mod_user`
--
ALTER TABLE `mod_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
