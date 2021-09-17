-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 07:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simbengkel`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `access_menu`
-- (See below for the actual view)
--
CREATE TABLE `access_menu` (
`id_user_menu` int(2)
,`id_user_access_menu` int(2)
,`id_level_user` int(1)
,`title` varchar(20)
,`url` varchar(50)
,`icon` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(13) DEFAULT NULL,
  `id_sparepart` int(3) DEFAULT NULL,
  `nama_sparepart` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `kode_transaksi`, `id_sparepart`, `nama_sparepart`, `harga`, `jumlah`, `subtotal`) VALUES
(1, 'TR-2021-00005', 2, 'Oli Castroll', 65000, 1, 65000),
(2, 'TR-2021-00005', 7, 'Gir Depan', 35000, 1, 35000),
(3, 'TR-2021-00006', 8, 'Gir belakang', 63000, 1, 63000),
(4, 'TR-2021-00006', 11, 'Ring Piston', 60000, 1, 60000),
(5, 'TR-2021-00006', 12, 'Piston', 38000, 1, 38000),
(6, 'TR-2021-00001', 6, 'Rantai', 65000, 1, 65000),
(7, 'TR-2021-00001', 7, 'Gir Depan', 35000, 1, 35000),
(8, 'TR-2021-00001', 8, 'Gir belakang', 63000, 1, 63000),
(9, 'TR-2021-00002', 15, 'V Belt', 130000, 1, 130000),
(10, 'TR-2021-00003', 10, 'Spion', 25000, 2, 50000),
(13, 'TR-2021-00007', 5, 'Kampas Rem Belakng', 26000, 1, 26000),
(14, 'TR-2021-00008', 8, 'Gir belakang', 63000, 1, 63000),
(15, 'TR-2021-00011', 13, 'Bohlam Depan', 25000, 1, 25000),
(16, 'TR-2021-00011', 14, 'Bohlam Belakang', 10000, 1, 10000),
(17, 'TR-2021-00012', 2, 'Oli Castroll', 65000, 1, 65000),
(18, 'TR-2021-00012', 3, 'Oli Top One', 40000, 1, 40000),
(19, 'TR-2021-00013', 13, 'Bohlam Depan', 25000, 1, 25000),
(20, 'TR-2021-00014', 12, 'Piston', 38000, 1, 38000),
(21, 'TR-2021-00015', 6, 'Rantai', 65000, 1, 65000),
(22, 'TR-2021-00015', 3, 'Oli Top One', 40000, 1, 40000),
(23, 'TR-2021-00016', 7, 'Gir Depan', 35000, 1, 35000),
(24, 'TR-2021-00017', 4, 'Kampas Rem Depan', 37000, 1, 37000),
(25, 'TR-2021-00018', NULL, 'Ongkir', 10000, 1, 10000),
(26, 'TR-2021-00020', 8, 'Gir belakang', 63000, 5, 315000),
(27, 'TR-2021-00021', 3, 'Oli Top One', 40000, 1, 40000),
(28, 'TR-2021-00021', 4, 'Kampas Rem Depan', 37000, 1, 37000),
(29, 'TR-2021-00021', 8, 'Gir belakang', 63000, 1, 63000),
(30, 'TR-2021-00022', 14, 'Bohlam Belakang', 12000, 1, 12000),
(31, 'TR-2021-00023', 4, 'Kampas Rem Depan', 37000, 1, 37000),
(32, 'TR-2021-00023', 3, 'Oli Top One', 40000, 1, 40000),
(33, 'TR-2021-00023', 8, 'Gir belakang', 63000, 1, 63000),
(34, 'TR-2021-00023', 12, 'Piston', 50000, 1, 50000),
(35, 'TR-2021-00023', 15, 'V Belt', 130000, 1, 130000);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sparepart`
--

CREATE TABLE `jenis_sparepart` (
  `id_jenis_sparepart` int(2) NOT NULL,
  `jenis_sparepart` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_sparepart`
--

INSERT INTO `jenis_sparepart` (`id_jenis_sparepart`, `jenis_sparepart`) VALUES
(1, 'Onderdil'),
(2, 'Aksesoris'),
(3, 'Pelumas');

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id_level_user` int(1) NOT NULL,
  `level_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id_level_user`, `level_user`) VALUES
(0, 'Admin'),
(1, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE `mekanik` (
  `id_mekanik` int(2) NOT NULL,
  `nama_mekanik` varchar(50) NOT NULL,
  `nohp_mekanik` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`id_mekanik`, `nama_mekanik`, `nohp_mekanik`) VALUES
(2, 'Harimurti Suwarno', '+6283172513267'),
(3, 'Nugraha Simanjuntak', '087219586313'),
(4, 'Dwi Waskita', '087689046271'),
(5, 'Galang Setiawan', '+6282953717532'),
(6, 'Hendri Budiman', '082254632473');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(50) DEFAULT NULL,
  `nohp_pembeli` varchar(15) DEFAULT NULL,
  `merk_motor` varchar(50) NOT NULL,
  `plat_nomor` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `nohp_pembeli`, `merk_motor`, `plat_nomor`) VALUES
(1, 'Umum', '-', '-', '-'),
(2, 'Mariadi Putra', '084451777278', 'Mio', 'B 5892 RG'),
(3, 'Sarah Pertiwi', '089816050920', 'Vixion', 'DA 2389 RA'),
(4, 'Dipa Maulana', '088996626841', 'Scoopy', 'DA 8798 PA'),
(5, 'Halim Habibi', '085442374252', 'Aerox', 'B 2549 AQ'),
(6, 'Cahyono Ardianto', '086506047947', 'Vespa', 'DA 1388 IN'),
(7, 'Kadir Prasetyo ', '084728217169', 'PCX', 'B 6678  OP'),
(8, 'Panji Kuswoyo', '+6283460126386', 'Scoopy', 'DA 8520 TL'),
(9, 'Gina Laksmiwati', '085386146201', 'Beat', 'DA 8614 TI'),
(10, 'Vanesa Usamah', '+6288747760062', 'Fino', 'B 9824 AH'),
(11, 'Hamzah Irawan', '089678189644', 'Lexi', 'DA 4301 JK'),
(12, 'Arif', '085386146201', 'Yamaha', 'B 9824 AH');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id_sparepart` int(3) NOT NULL,
  `nama_sparepart` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(3) NOT NULL,
  `id_jenis_sparepart` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id_sparepart`, `nama_sparepart`, `harga_beli`, `harga_jual`, `stok`, `id_jenis_sparepart`) VALUES
(2, 'Oli Castroll', 60000, 65000, 14, 3),
(3, 'Oli Top One', 39000, 45000, 12, 3),
(4, 'Kampas Rem Depan', 32000, 37000, 17, 1),
(5, 'Kampas Rem Belakng', 21000, 26000, 14, 1),
(6, 'Rantai', 60000, 65000, 6, 1),
(7, 'Gir Depan', 30000, 35000, 7, 1),
(8, 'Gir belakang', 58000, 63000, 0, 1),
(9, 'Kampas Kopling', 138000, 148000, 8, 1),
(10, 'Spion', 20000, 25000, 10, 2),
(11, 'Ring Piston', 55000, 60000, 12, 1),
(12, 'Piston', 45000, 50000, 14, 1),
(13, 'Bohlam Depan', 20000, 25000, 16, 2),
(14, 'Bohlam Belakang', 7500, 10000, 21, 2),
(15, 'V Belt', 90000, 130000, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(13) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_total` int(11) NOT NULL,
  `id_user` int(2) DEFAULT NULL,
  `id_mekanik` int(2) DEFAULT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `tanggal`, `harga_total`, `id_user`, `id_mekanik`, `id_pembeli`, `keterangan`) VALUES
('TR-2021-00001', '2021-06-21', 163000, 5, 6, 9, ''),
('TR-2021-00002', '2021-06-21', 130000, 5, 4, 1, ''),
('TR-2021-00003', '2021-06-21', 50000, 6, 3, 3, ''),
('TR-2021-00005', '2021-06-21', 100000, 4, 3, 2, ''),
('TR-2021-00006', '2021-06-21', 161000, 4, 4, 6, 'DP 100000'),
('TR-2021-00007', '2021-06-28', 26000, 5, 3, 3, ''),
('TR-2021-00008', '2021-06-28', 63000, 5, 2, 1, ''),
('TR-2021-00011', '2021-06-30', 35000, 4, 4, 1, 'Lunas'),
('TR-2021-00012', '2021-07-09', 105000, 4, 2, 1, ''),
('TR-2021-00013', '2021-07-14', 25000, 4, 3, 1, ''),
('TR-2021-00014', '2021-07-14', 38000, 4, 4, 1, ''),
('TR-2021-00015', '2021-07-14', 105000, 4, 3, 2, 'Lunas'),
('TR-2021-00016', '2021-07-14', 35000, 4, 4, 2, ''),
('TR-2021-00017', '2021-07-14', 37000, 4, 4, 1, ''),
('TR-2021-00018', '2021-07-14', 10000, 4, 3, 3, ''),
('TR-2021-00019', '2021-05-01', 100000, 4, 3, 11, 'Lunas'),
('TR-2021-00020', '2021-07-14', 315000, 4, 4, 4, ''),
('TR-2021-00021', '2021-08-06', 140000, 4, 3, 1, 'Lunas'),
('TR-2021-00022', '2021-08-06', 12000, 4, 2, 1, ''),
('TR-2021-00023', '2021-08-07', 320000, 7, 3, 12, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `nohp_user` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `id_level_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `gambar`, `nohp_user`, `jenis_kelamin`, `id_level_user`) VALUES
(1, 'admin', '$2y$10$M9Z778yYeR4rnTG5wQdzp./DpuMPL0D.0030cY8rQdGJ8tvqnScMu', 'Admin', 'pp_new1.jpg', '089681135563', 'Laki-Laki', 0),
(4, 'bellawari', '$2y$10$.l/IyWGLWoP0d8NsIG5QweFQRkuDSCMJ7zGkstzfulWhg8LjKZs/y', 'Bella Wulandari', '07.jpg', '+6287693447021', 'Perempuan', 1),
(5, 'tamiti', '$2y$10$VXv4hy3sjHKO8FaCPY4XquuxFIsxx8XjiDXVjWbsT/GvmW49SgRk6', 'Tami Sudiati', '08.jpg', '+6283627943978', 'Perempuan', 1),
(6, 'micheata', '$2y$10$AGnxZAF4.wk9Z0Z7grQc3.56rs5Ad8oEd5DnnWUh9XRQ1qQDIf61C', 'Michelle Permata', '30.jpg', '+6285064840240', 'Perempuan', 1),
(7, 'ryanbagus', '$2y$10$VgOR6KRkR8lIE/ddXkjF1uT3k4l.YaRQzH.Z8Zv3vaJ1zoi3pVoc.', 'Ryan Bagus', 'default.jpg', '085332624169', 'Laki-Laki', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_user_access_menu` int(2) NOT NULL,
  `id_level_user` int(1) NOT NULL,
  `id_user_menu` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_user_access_menu`, `id_level_user`, `id_user_menu`) VALUES
(1, 0, 1),
(2, 0, 2),
(3, 0, 3),
(4, 0, 4),
(5, 0, 5),
(6, 0, 6),
(0, 1, 0),
(8, 1, 3),
(10, 1, 4),
(9, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_user_menu` int(2) NOT NULL,
  `title` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_user_menu`, `title`, `url`, `icon`) VALUES
(0, 'Halaman Kasir', 'kelola_transaksi/halaman_kasir', 'fas fa-fw fa-cash-register'),
(1, 'Dashboard', 'dashboard', 'fas fa-fw fa-tachometer-alt'),
(2, 'Kasir', 'kelola_kasir', 'fas fa-fw fa-cash-register'),
(3, 'Sparepart', 'kelola_sparepart', 'fas fa-fw fa-tools'),
(4, 'Pembeli', 'kelola_pembeli', 'fas fa-fw fa-users'),
(5, 'Mekanik', 'kelola_mekanik', 'fas fa-fw fa-wrench'),
(6, 'Transaksi', 'kelola_transaksi', 'fas fa-fw fa-cog');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detail_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_detail_transaksi` (
`kode_transaksi` varchar(13)
,`id_sparepart` int(3)
,`nama_sparepart` varchar(50)
,`harga` int(11)
,`jumlah` int(11)
,`subtotal` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi` (
`kode_transaksi` varchar(13)
,`tanggal` date
,`nama_user` varchar(50)
,`nama_mekanik` varchar(50)
,`nama_pembeli` varchar(50)
,`nohp_pembeli` varchar(15)
,`merk_motor` varchar(50)
,`plat_nomor` varchar(15)
,`harga_total` int(11)
,`keterangan` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `access_menu`
--
DROP TABLE IF EXISTS `access_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `access_menu`  AS  select `user_access_menu`.`id_user_menu` AS `id_user_menu`,`user_access_menu`.`id_user_access_menu` AS `id_user_access_menu`,`user_access_menu`.`id_level_user` AS `id_level_user`,`user_menu`.`title` AS `title`,`user_menu`.`url` AS `url`,`user_menu`.`icon` AS `icon` from (`user_access_menu` join `user_menu` on(`user_access_menu`.`id_user_menu` = `user_menu`.`id_user_menu`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_detail_transaksi`
--
DROP TABLE IF EXISTS `view_detail_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detail_transaksi`  AS  select `detail_transaksi`.`kode_transaksi` AS `kode_transaksi`,`detail_transaksi`.`id_sparepart` AS `id_sparepart`,`detail_transaksi`.`nama_sparepart` AS `nama_sparepart`,`detail_transaksi`.`harga` AS `harga`,`detail_transaksi`.`jumlah` AS `jumlah`,`detail_transaksi`.`subtotal` AS `subtotal` from ((`detail_transaksi` left join `transaksi` on(`detail_transaksi`.`kode_transaksi` = `transaksi`.`kode_transaksi`)) left join `sparepart` on(`detail_transaksi`.`id_sparepart` = `sparepart`.`id_sparepart`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS  select `transaksi`.`kode_transaksi` AS `kode_transaksi`,`transaksi`.`tanggal` AS `tanggal`,`user`.`nama_user` AS `nama_user`,`mekanik`.`nama_mekanik` AS `nama_mekanik`,`pembeli`.`nama_pembeli` AS `nama_pembeli`,`pembeli`.`nohp_pembeli` AS `nohp_pembeli`,`pembeli`.`merk_motor` AS `merk_motor`,`pembeli`.`plat_nomor` AS `plat_nomor`,`transaksi`.`harga_total` AS `harga_total`,`transaksi`.`keterangan` AS `keterangan` from (((`transaksi` left join `user` on(`transaksi`.`id_user` = `user`.`id_user`)) left join `mekanik` on(`transaksi`.`id_mekanik` = `mekanik`.`id_mekanik`)) left join `pembeli` on(`transaksi`.`id_pembeli` = `pembeli`.`id_pembeli`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_service` (`kode_transaksi`,`id_sparepart`),
  ADD KEY `id_sparepart` (`id_sparepart`);

--
-- Indexes for table `jenis_sparepart`
--
ALTER TABLE `jenis_sparepart`
  ADD PRIMARY KEY (`id_jenis_sparepart`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id_sparepart`),
  ADD KEY `id_jenis_sparepart` (`id_jenis_sparepart`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_mekanik` (`id_mekanik`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level_user` (`id_level_user`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_user_access_menu`),
  ADD KEY `id_level_user` (`id_level_user`,`id_user_menu`),
  ADD KEY `id_user_menu` (`id_user_menu`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_user_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `jenis_sparepart`
--
ALTER TABLE `jenis_sparepart`
  MODIFY `id_jenis_sparepart` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `id_mekanik` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `id_sparepart` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_user_access_menu` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_4` FOREIGN KEY (`id_sparepart`) REFERENCES `sparepart` (`id_sparepart`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_5` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD CONSTRAINT `sparepart_ibfk_1` FOREIGN KEY (`id_jenis_sparepart`) REFERENCES `jenis_sparepart` (`id_jenis_sparepart`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_mekanik`) REFERENCES `mekanik` (`id_mekanik`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_6` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level_user`) REFERENCES `level_user` (`id_level_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`id_level_user`) REFERENCES `level_user` (`id_level_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`id_user_menu`) REFERENCES `user_menu` (`id_user_menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
