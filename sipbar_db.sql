-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 05:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipbar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(20) NOT NULL,
  `kode_barang_keluar` varchar(100) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kode_pemasok` varchar(50) NOT NULL,
  `pemasok` varchar(50) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `jumlah_keluar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `kode_barang_keluar`, `tgl_keluar`, `kode_barang`, `nama_barang`, `kode_pemasok`, `pemasok`, `satuan`, `jumlah_keluar`) VALUES
(1, '641', '2023-02-22', '456461', 'andi', '001', 'andi', 'hgfg1', 'gfh1');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(12) NOT NULL,
  `kode_barang_masuk` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `kode_pemasok` varchar(100) NOT NULL,
  `nama_pemasok` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `total_harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `kode_barang_masuk`, `tgl_masuk`, `kode_barang`, `nama_barang`, `satuan`, `kode_pemasok`, `nama_pemasok`, `jumlah`, `total_harga`) VALUES
(1, '324', '2023-02-15', '1231', 'Tisu', '1', '12', '12', '1', '12000'),
(2, '32', '2023-02-15', '123', 'Karpet', '1', '12', '12', '1', '12000'),
(3, '22', '2023-02-25', '2312', 'Dodol', '1', '12', '12', '1', '2000'),
(4, '222', '2023-02-12', '3423', 'selendang', '1', '12', '12', '1', '20000'),
(5, '323', '2023-02-15', '32', 'Medanasa', '1', '12', '12', '1', '20000'),
(7, '006', '2023-03-07', '006', 'Gantungan', '1 lusin', '123', 'Dandi', '122', '12000'),
(8, '3241', '2023-02-16', '12311', 'Tisu1', '11', '121', '121', '11', '120001');

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_data_barang` int(12) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `pemasok` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_masuk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id_data_barang`, `kode_barang`, `nama_barang`, `pemasok`, `satuan`, `harga_masuk`) VALUES
(1, '001', 'Kardus', 'Andi', '100 Pack', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_barang_keluar`
--

CREATE TABLE `laporan_barang_keluar` (
  `id_laporan_barang_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_barang_masuk`
--

CREATE TABLE `laporan_barang_masuk` (
  `id_laporan_barang_masuk` int(12) NOT NULL,
  `id_data_barang` int(12) NOT NULL,
  `id_barang_masuk` int(12) NOT NULL,
  `id_barang_keluar` int(12) NOT NULL,
  `tgl_masuk` int(13) NOT NULL,
  `tgl_keluar` int(12) NOT NULL,
  `persediaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_persediaan`
--

CREATE TABLE `laporan_persediaan` (
  `id_laporan_persediaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(12) NOT NULL,
  `kode_pemasok` varchar(100) NOT NULL,
  `pemasok` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id_pemasok`, `kode_pemasok`, `pemasok`, `alamat`, `no_hp`) VALUES
(2, '001', 'Nuning', 'Jl. Nanas123', '081234234323'),
(3, '002', 'Hanif', 'Jl. Dodol', '087459547823'),
(4, '003', 'Andi', 'Jl. Cicak', '082342787234'),
(5, '004', 'Banyu', 'Jl. Kentang', '98723632'),
(6, '005', 'Gayu', 'Jl. Lima', '908976732423'),
(7, '006', 'Neni', 'Jl. Anggur', '08976723'),
(8, '007', 'Jenny', 'Jl. Nangka', '0834732676'),
(9, '008', 'Soeranti', 'Jl. Karet', '087683267'),
(10, '009', 'Roni', 'Jl. Monumen', '0876332'),
(11, '010', 'Gigih', 'Jl. Moo', '0987675162'),
(12, '011', 'Noni', 'Jl. Berdikari', '086666666');

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `id_persediaan` int(13) NOT NULL,
  `kode_persediaan` varchar(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `tahun` year(4) NOT NULL,
  `pemakaian_maksimum` varchar(100) NOT NULL,
  `pemakaian_rata_rata` varchar(100) NOT NULL,
  `lead_time` varchar(100) NOT NULL,
  `safety_stock` varchar(255) NOT NULL,
  `min_stock` int(12) NOT NULL,
  `max_stock` int(12) NOT NULL,
  `reorder_point` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id_persediaan`, `kode_persediaan`, `nama_barang`, `tahun`, `pemakaian_maksimum`, `pemakaian_rata_rata`, `lead_time`, `safety_stock`, `min_stock`, `max_stock`, `reorder_point`) VALUES
(1, 'K1', '001 - Kardus', 2022, '12', '8', '0.032', '0.128', 0, 1, 0),
(2, 'K1', '001 - Kardus', 2022, '12', '9', '2', '6', 24, 36, 12),
(3, 'K1', '001 - Kardus', 2022, '12', '8', '0.2', '0.8', 2, 3, 1),
(4, 'K1', '001 - Kardus', 2022, '12', '8', '0.032', '0.128', 0, 1, 0),
(5, 'K1', '001 - Kardus', 2022, '10', '7', '3', '9', 30, 42, 12),
(6, 'K1', '001 - Kardus', 2022, '12', '8', '0.032', '0.128', 0, 1, 0),
(7, 'K1', '001 - Kardus', 2022, '12', '8', '0.32', '1.28', 4, 5, 1),
(8, 'K1', '001 - Kardus', 2022, '0.4', '0.2', '0.032', '0.0064', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Admin', 'admin@gmail.com', 'default.jpg', '$2y$10$H7FZ/9T40RIwsxKT1d8N2u0gBbT1xCL8SRLDfTtpKDmQb/davx0YK', 1, 1, 1562195518),
(8, 'Manajer', 'manajer@gmail.com', 'default.jpg', '$2y$10$QVn2QBu4LTsTnYDIsunqr.Z0rp6G4RLzzkDCPuoImgFJeVF4.a3jC', 2, 1, 1562902391);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Menu'),
(2, 'Menu Persediaan'),
(3, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'Laporan Barang Masuk', 'lap_barang_masuk', 'fas fa-clipboard-list', 1),
(3, 1, 'Data User', 'Data_user', 'fas fa-fw fa-user-friends', 1),
(4, 1, 'Data Pemasok', 'pemasok', 'fas fa-users', 1),
(5, 1, 'Data Barang', 'data_barang', 'fas fa-cube', 1),
(6, 1, 'Data Barang Masuk', 'barang_masuk', 'fas fa-box', 1),
(7, 1, 'Data Barang Keluar', 'barang_keluar', 'fas fa-box-open', 1),
(8, 3, 'Laporan Barang Keluar', 'lap_barang_keluar', 'fas fa-clipboard-list', 1),
(9, 3, 'Laporan Persediaan', 'lap_persediaan', 'fas fa-clipboard-list', 1),
(10, 2, 'Persediaan', 'persediaan', 'fas fa-hard-hat', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_data_barang`);

--
-- Indexes for table `laporan_barang_keluar`
--
ALTER TABLE `laporan_barang_keluar`
  ADD PRIMARY KEY (`id_laporan_barang_keluar`);

--
-- Indexes for table `laporan_barang_masuk`
--
ALTER TABLE `laporan_barang_masuk`
  ADD PRIMARY KEY (`id_laporan_barang_masuk`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id_persediaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_data_barang` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_barang_keluar`
--
ALTER TABLE `laporan_barang_keluar`
  MODIFY `id_laporan_barang_keluar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_barang_masuk`
--
ALTER TABLE `laporan_barang_masuk`
  MODIFY `id_laporan_barang_masuk` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `persediaan`
--
ALTER TABLE `persediaan`
  MODIFY `id_persediaan` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
