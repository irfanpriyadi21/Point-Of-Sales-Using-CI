-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 06:41 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rumah_makan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(50) NOT NULL,
  `id_masakan` int(50) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `qty` int(11) NOT NULL,
  `status_detail_order` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_masakan`, `keterangan`, `qty`, `status_detail_order`) VALUES
(32, 15, 23, 'di bungkus', 4, 'Sudah Bayar'),
(33, 16, 21, 'barang rusak', 3, 'Belum Bayar'),
(34, 16, 22, 'seger', 5, 'Belum Bayar'),
(35, 16, 23, 'aselelo', 3, 'Belum Bayar');

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `laporan_transaksi` (
`id_order` int(50)
,`nama_user` varchar(150)
,`tanggal` timestamp
,`total_bayar` int(200)
,`jumlah` int(10)
,`kembalian` int(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Waiter'),
(3, 'Kasir'),
(4, 'Owner'),
(5, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `harga` int(200) NOT NULL,
  `status_masakan` varchar(100) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `nama_masakan`, `harga`, `status_masakan`, `tgl_masuk`) VALUES
(21, 'Bakso Malang Pak Slamet', 10000, 'Ready', '2019-04-04 14:16:49'),
(22, 'Es Dawet Bumiayu', 7000, 'Ready', '2019-04-04 14:17:31'),
(23, 'Sate Babi hj Abbas', 20000, 'Ready', '2019-04-04 14:18:08'),
(24, 'Bakpia Pathuk', 20000, 'Ready', '2019-04-08 14:57:42'),
(25, 'Gudeg Jogja', 21000, 'Not Ready', '2019-04-20 14:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `no_meja` int(20) NOT NULL,
  `keterangan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `no_meja`, `keterangan`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 0),
(8, 8, 0),
(9, 9, 0),
(10, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `no_meja` int(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(50) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `status_order` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `no_meja`, `tanggal`, `id_user`, `keterangan`, `status_order`) VALUES
(15, 2, '2019-04-21 02:10:24', 26, 'Stephenson', 'Lunas'),
(16, 2, '2019-04-21 14:51:25', 26, 'asasasasa', 'Lunas');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pengguna`
-- (See below for the actual view)
--
CREATE TABLE `pengguna` (
`id_user` int(11)
,`username` varchar(150)
,`password` varchar(150)
,`email` varchar(70)
,`nama_user` varchar(150)
,`id_level` int(50)
,`nama_level` varchar(150)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `query_detail_order`
-- (See below for the actual view)
--
CREATE TABLE `query_detail_order` (
`id_detail_order` int(11)
,`id_order` int(50)
,`id_masakan` int(50)
,`nama_masakan` varchar(100)
,`harga` int(200)
,`keterangan` varchar(150)
,`qty` int(11)
,`status_detail_order` varchar(150)
);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(50) NOT NULL,
  `id_order` int(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_bayar` int(200) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `kembalian` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal`, `total_bayar`, `jumlah`, `kembalian`) VALUES
(12, 26, 13, '2019-04-20 13:36:53', 20000, 20000, 0),
(13, 26, 12, '2019-04-20 14:13:57', 65000, 50000, 15000),
(14, 26, 14, '2019-04-21 02:05:15', 75000, 74000, 1000),
(15, 26, 15, '2019-04-21 02:11:02', 90000, 80000, 10000),
(16, 27, 16, '2019-04-21 14:51:25', 130000, 125000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(70) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `id_level` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_user`, `id_level`) VALUES
(26, 'admin', 'YWRtaW4=', 'priyadii1004@gmail.com', 'Irfan Priyadi Nur ', 1),
(27, 'kasir', 'a2FzaXI=', 'nahyaalfina@gmail.com', 'Nahya Alfina', 3),
(34, 'pelanggan', 'cGVsYW5nZ2Fu', 'nahyaalfina@gmail.com', 'Nahya Alfina', 5),
(35, 'waiter', 'd2FpdGVy', 'waiter@gmail.com', 'malik saleh', 2),
(36, 'owner', 'b3duZXI=', 'Radenfatah@gmail.com', 'Raden Fatah', 4);

-- --------------------------------------------------------

--
-- Structure for view `laporan_transaksi`
--
DROP TABLE IF EXISTS `laporan_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_transaksi`  AS  select `transaksi`.`id_order` AS `id_order`,`user`.`nama_user` AS `nama_user`,`transaksi`.`tanggal` AS `tanggal`,`transaksi`.`total_bayar` AS `total_bayar`,`transaksi`.`jumlah` AS `jumlah`,`transaksi`.`kembalian` AS `kembalian` from (`transaksi` join `user` on((`user`.`id_user` = `transaksi`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Structure for view `pengguna`
--
DROP TABLE IF EXISTS `pengguna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pengguna`  AS  select `user`.`id_user` AS `id_user`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`email` AS `email`,`user`.`nama_user` AS `nama_user`,`user`.`id_level` AS `id_level`,`level`.`nama_level` AS `nama_level` from (`user` join `level` on((`user`.`id_level` = `level`.`id_level`))) ;

-- --------------------------------------------------------

--
-- Structure for view `query_detail_order`
--
DROP TABLE IF EXISTS `query_detail_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `query_detail_order`  AS  select `detail_order`.`id_detail_order` AS `id_detail_order`,`detail_order`.`id_order` AS `id_order`,`detail_order`.`id_masakan` AS `id_masakan`,`masakan`.`nama_masakan` AS `nama_masakan`,`masakan`.`harga` AS `harga`,`detail_order`.`keterangan` AS `keterangan`,`detail_order`.`qty` AS `qty`,`detail_order`.`status_detail_order` AS `status_detail_order` from (`detail_order` join `masakan` on((`detail_order`.`id_masakan` = `masakan`.`id_masakan`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
