-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Mei 2018 pada 10.07
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_final`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detsurat`
--

CREATE TABLE `tbl_detsurat` (
  `idsurat` int(15) NOT NULL,
  `detsurat` int(15) NOT NULL,
  `nik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detsurat`
--

INSERT INTO `tbl_detsurat` (`idsurat`, `detsurat`, `nik`) VALUES
(5, 2, '9282938123'),
(6, 3, '9282938123'),
(7, 4, '2344321'),
(8, 5, '2344321'),
(9, 6, '2344321'),
(10, 7, '2344321'),
(11, 8, '2344321'),
(12, 9, '1234112113'),
(13, 10, '1234112113'),
(14, 11, '1234112113'),
(15, 12, '9282938123'),
(16, 13, '9282938123'),
(17, 14, '29283928291'),
(18, 15, '29283928291'),
(19, 16, '29283928291'),
(20, 17, '2344321'),
(21, 18, 'aasda'),
(22, 19, '2344321'),
(23, 20, '827283727122'),
(24, 21, '827283727122'),
(25, 22, '21313'),
(26, 23, '1124'),
(27, 24, '12313'),
(28, 25, '827283727122'),
(29, 26, '827283727122'),
(30, 27, '827283727122'),
(31, 28, '827283727122'),
(32, 29, '2344321'),
(33, 30, '2344321'),
(34, 31, 'asdasd'),
(35, 32, 'asdsad'),
(36, 33, '234sdsd'),
(37, 34, 'asdasd'),
(38, 35, '827283727122'),
(39, 36, '827283727122'),
(40, 37, 'asdasd'),
(41, 38, '827283727122'),
(42, 39, '827283727122');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_groups`
--

CREATE TABLE `tbl_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_groups`
--

INSERT INTO `tbl_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'editor', 'Editor CRUD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_headsurat`
--

CREATE TABLE `tbl_headsurat` (
  `idsurat` int(15) NOT NULL,
  `jenissurat` varchar(40) NOT NULL,
  `nosurat` varchar(30) NOT NULL,
  `tglsurat` date NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `ket` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_headsurat`
--

INSERT INTO `tbl_headsurat` (`idsurat`, `jenissurat`, `nosurat`, `tglsurat`, `tempat`, `alamat`, `ket`) VALUES
(1, '', '', '2018-05-19', '', '', ''),
(2, '', '', '2018-05-19', '', '', ''),
(3, '', '', '2018-05-19', '', '', ''),
(4, '', '', '2018-05-19', '', '', ''),
(5, '', '', '2018-05-19', '', '', ''),
(6, '', '', '2018-05-19', '', '', ''),
(7, '', '', '2018-05-19', '', '', ''),
(8, '', '', '2018-05-19', '', '', ''),
(9, '', '', '2018-05-19', '', '', ''),
(10, '', '', '2018-05-19', '', '', ''),
(11, '', '', '2018-05-20', '', '', ''),
(12, 'surat', '', '2018-05-20', 'ya', 'yao', 'yai'),
(13, 'asd', '', '2018-05-20', 'asdasd', 'asdads', 'asdad'),
(14, 'asdad', '', '2018-05-20', 'asdad', 'asdads', 'asdads'),
(15, 'Surat Keterangan', '', '2018-05-20', 'Depok', 'Jl.Koja', 'Membuat Surat keterangan ingin membuat bangunan'),
(16, 'Surat Keterangan', '', '2018-05-20', 'Depok', 'Jl.Koja', 'Membuat Surat keterangan ingin membuat bangunan'),
(17, 'Surat Lahir', '', '2018-05-21', 'Depok', 'Jawabarat', 'Anak lahiran'),
(18, 'asda', '', '2018-05-21', 'asdads', 'adads', 'asdasdasd'),
(19, 'fdsfdf', '', '2018-05-21', 'dfsfs', 'sdfsdff', 'sdfsdfs'),
(20, '', '', '2018-05-21', '', '', ''),
(21, '', '', '2018-05-21', '', '', ''),
(22, '', '', '2018-05-21', '', '', ''),
(23, '', '', '2018-05-21', '', '', ''),
(24, '', '', '2018-05-21', '', '', ''),
(25, '', '', '2018-05-21', '', '', ''),
(26, '', '', '2018-05-21', '', '', ''),
(27, '', '', '2018-05-21', '', '', ''),
(28, '', '', '2018-05-21', '', '', ''),
(29, 'nikah ke 2', '', '2018-05-21', 'bogor puncak', 'bogor', 'penget cepet'),
(30, 'Nikah', '', '2018-05-21', 'Dekat Sini', 'Jauh ', 'pengen cepet2'),
(31, 'Jalan', '', '2018-05-21', '', '', 'Mau ke puncak'),
(32, 'IZIN USAHA', '', '2018-05-21', 'DI Pasar', 'Koja', 'USAHA DAGANG LELE'),
(33, 'PENGANTAR', '', '2018-05-21', '', '', ''),
(34, 'PENGANTAR', '', '2018-05-21', '', '', ''),
(35, 'PENGANTAR', '', '2018-05-21', '', '', ''),
(36, 'PENGANTAR', '', '2018-05-21', 'adasd', 'asdas', 'dasd'),
(37, 'PENGANTAR', '', '2018-05-21', '', '', ''),
(38, 'PENGANTAR', '', '2018-05-21', 'depok', 'jauh', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the '),
(39, 'PENGANTAR', '', '2018-05-21', 'udin', 'yakan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen '),
(40, 'PENGANTAR', '', '2018-05-21', '', '', ''),
(41, 'PENGANTAR', '', '2018-05-21', '', '', ''),
(42, 'PENGANTAR', '', '2018-05-21', 'bogor puncak', 'bogor', 'd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login_attempts`
--

CREATE TABLE `tbl_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penduduk`
--

CREATE TABLE `tbl_penduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `golongan_darah` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `berlaku_hingga` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `thumb_foto` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `date_modify` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penduduk`
--

INSERT INTO `tbl_penduduk` (`id`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `golongan_darah`, `alamat`, `rt`, `rw`, `wilayah`, `kelurahan`, `kecamatan`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `berlaku_hingga`, `email`, `foto`, `thumb_foto`, `date_created`, `date_modify`) VALUES
(32, '827283727122', 'izumi kato', 'bogor', '1992-12-02', 'Perempuan', 'B', 'deket sini', '2', '3', 'deket', 'banget', 'malah', 'matahari', 'belum menikah', 'pawang ujan', 'WNA', '2030-12-03', 'suka@gmail.com', '', '6435f03c6f8a2980cb23ba002d584bc7_thumb.jpg', '2018-05-21', '0000-00-00'),
(24, '2344321', 'Umar Fathih', 'Jakartaaaa', '2012-07-13', 'Laki-laki', 'A', 'Depok', '04', '03', 'Koja', 'Cisalak Pasar', 'cimanggis', 'Islam', 'belum menikah', 'Son', 'WNI', '2017-03-30', 'umar@gmail.com', '616eb46194737dd044767d85ac917acd.jpg', '616eb46194737dd044767d85ac917acd_thumb.jpg', '2017-03-04', '2018-05-21'),
(25, '1234112113', 'Hamka ZF', 'Jakarta', '2015-05-03', 'Laki-laki', 'A', 'Jl. apel', '12', '21', 'Jombang', 'jonggol', 'klimata', 'Islam', 'belum menikah', 'Son 2', 'WNI', '2017-03-22', 'hamka@gmail.com', 'd7027677d15d09dbfd17e1f3a14df1bb.jpg', 'd7027677d15d09dbfd17e1f3a14df1bb_thumb.jpg', '2017-03-04', '2018-05-21'),
(27, '72622873', 'udin', 'depok', '1997-06-28', 'Laki-laki', 'A', 'jl. jauh tak sampai', '21', '21', 'Sini', 'sana', 'asik', 'islam', 'belum menikah', 'proplayer', 'WNI', '2018-05-31', 'cometopapah@gmail.com', 'aaaebe31b2cf0ba146acabe7b519ca9f.jpg', 'aaaebe31b2cf0ba146acabe7b519ca9f_thumb.jpg', '2018-05-16', '2018-05-21'),
(28, '9282938123', 'Muhammad Fauzi', 'Bogor', '1997-11-21', 'Laki-laki', 'B', 'Jl.koja', '04', '03', 'Koja', 'Cisalak Pasar', 'cimanggis Depok', 'Islam', 'belum menikah', 'Mahasiswa', 'WNI', '2019-02-28', 'Fauzi.Hiba@gmail.com', '1a5251136891a1e9dfc559334a2b40da.jpg', '1a5251136891a1e9dfc559334a2b40da_thumb.jpg', '2018-05-17', '0000-00-00'),
(30, '29283928291', 'Ayase Sakuno', 'Nippon', '1970-01-01', 'Perempuan', 'A', 'Akihabara street', '2', '3', 'Fukouka', 'gulsho', 'yakiniku', 'Budha', 'belum menikah', 'Artis JAV', 'WNA', '1970-01-01', 'Ayase@rocket.com', '', '548f4da827905d413a4e6af76c7d1592_thumb.jpg', '2018-05-21', '0000-00-00'),
(29, '12312392', 'jamilah', 'bogor', '1970-01-01', 'Laki-laki', 'A', 'jl.sorong', '23', '3', 'ciputat', 'deket', 'jauh', 'islam', 'belum menikah', 'tukang galikubur', 'WNI', '1970-01-01', 'aa@gmail.com', '', 'acfbf417943d3c8c5375ae390f5ecb62_thumb.jpg', '2018-05-19', '0000-00-00'),
(33, '029382941', 'Makise Suparto', 'Tanggerang', '1992-04-04', 'Laki-laki', 'A', 'Jl. Soka', '03', '02', 'Suzuran', 'Distrik 2', 'Cipayung', 'Islam', 'belum menikah', 'Kang bubur', 'WNI', '2019-08-09', 'kang@apa.com', '', '2f352854d5367be2ade6d7d3c506d8d2_thumb.jpg', '2018-05-21', '0000-00-00'),
(34, '0923921', 'Suparno udin', 'Depok', '1970-01-01', 'Laki-laki', 'A', 'Jl. NTR', '12', '2', 'Jauh', 'yah', 'gaksampe', 'Buddha', 'belum menikah', 'Tukang Es Cendol', 'WNI', '1970-01-01', 'Gmailmail@aa.com', '', '9a8a654fff2e1392806fbe4eb6bfacdf_thumb.jpg', '2018-05-21', '2018-05-21'),
(35, '923921212', 'Suparno Sopo', 'Depok', '1970-01-01', 'Laki-laki', 'A', 'Jl. NTR', '12', '2', 'Jauh', 'yah', 'gaksampe', 'Buddha', 'belum menikah', 'Tukang Es Cendol', 'WNI', '1970-01-01', 'Gmailmail@aaaaa.com', '', 'c05c056c3d2548fd9c45b4e217e531d0_thumb.jpg', '2018-05-21', '0000-00-00'),
(36, '029203910', 'Nama Saya Siapa', 'Jekardah', '1970-01-01', 'Laki-laki', 'A', 'jl. kenangan', '02', '02', 'depok', 'yah', 'yuh', 'Wakanda', 'belum menikah', 'jaga tower', 'WNI', '2030-12-02', 'yakali@yakali.com', '', '1ad4aaba3e2b03a062bdc39ca1f07985_thumb.jpg', '2018-05-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$Rz0YTDta8JJcw9YTGvUjSeNLMHBbHkusd/z2zGOyOJCEuEWGA0VHG', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1526884758, 1, 'Super', 'Admin', '', '081802798002'),
(2, '::1', 'member@gmail.com', '$2y$08$WmwGt9ZzG7epQ8JTr2hIROFQ8x4dTeiRqpu4457NGeffkiI8wEljC', NULL, 'member@gmail.com', NULL, NULL, NULL, NULL, 1488635218, 1526461171, 1, 'Member', '', '', '085717527494'),
(3, '::1', 'editor@gmail.com', '$2y$08$YVoywUBKdld3hPLSKJw3AuQT9RrOWXoAAX1ui/VaVPk/1USoNEr9S', NULL, 'editor@gmail.com', NULL, NULL, NULL, NULL, 1488635475, NULL, 1, 'Editor', '', '', '085719206091');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users_groups`
--

CREATE TABLE `tbl_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users_groups`
--

INSERT INTO `tbl_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_detsurat`
--
ALTER TABLE `tbl_detsurat`
  ADD PRIMARY KEY (`detsurat`) USING BTREE,
  ADD KEY `idsurat` (`idsurat`);

--
-- Indexes for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_headsurat`
--
ALTER TABLE `tbl_headsurat`
  ADD PRIMARY KEY (`idsurat`) USING BTREE;

--
-- Indexes for table `tbl_login_attempts`
--
ALTER TABLE `tbl_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_groups`
--
ALTER TABLE `tbl_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detsurat`
--
ALTER TABLE `tbl_detsurat`
  MODIFY `detsurat` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_headsurat`
--
ALTER TABLE `tbl_headsurat`
  MODIFY `idsurat` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_login_attempts`
--
ALTER TABLE `tbl_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_users_groups`
--
ALTER TABLE `tbl_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_detsurat`
--
ALTER TABLE `tbl_detsurat`
  ADD CONSTRAINT `tbl_detsurat_ibfk_1` FOREIGN KEY (`idsurat`) REFERENCES `tbl_headsurat` (`idsurat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_users_groups`
--
ALTER TABLE `tbl_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `tbl_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
