-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2022 at 08:32 PM
-- Server version: 5.7.37-log
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milestyl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(17, 'Ontelino', 'Kaos', 'Pakaian Pria', 80000, 10, 'kaos2.jpeg'),
(18, 'Cutty Panda', 'Kaos', 'Pakaian Wanita', 75000, 15, 'panda.png'),
(19, 'Ghosttt', 'Kaos', 'Pakaian Pria', 80000, 10, 'kaos3.jpeg'),
(21, 'Aector Amma Coco 1 Set', 'Kaos Anak Pria', 'Pakaian Anak', 100000, 28, 'bajuanak1.jpg'),
(22, 'New York 1 Set', 'Kaos Anak Pria', 'Pakaian Anak', 100000, 52, 'bajuanak2.jpg'),
(23, 'L.A Sport 1 Set', 'Kaos Anak Pria', 'Pakaian Anak', 120000, 21, 'bajuanak4.jpg'),
(24, 'Japan Vibes', 'Kaos', 'Pakaian Pria', 90000, 10, 'kaos4.jpeg'),
(25, 'Abstrak Woman', 'Kaos', 'Pakaian Wanita', 75000, 12, 'No.png'),
(26, 'Wildnature', 'Kaos', 'Pakaian Pria', 80000, 10, 'kaos5.jpeg'),
(27, 'Dress Tutu Tulle 1 Set', 'Kaos Anak Wanita', 'Pakaian Anak', 150000, 34, 'bajuanak41.jpg'),
(28, 'YESBABY Dress Anak Casual 1 Set', 'Kaos Anak Wanita', 'Pakaian Anak', 150000, 12, 'bajuanak5.jpg'),
(29, 'Old Gamer', 'Kaos', 'Pakaian Wanita', 75000, 11, 'Game.png'),
(30, 'Rocket', 'Kaos', 'Pakaian Wanita', 75000, 10, 'plane.png'),
(31, 'Eat Is Everything', 'Kaos', 'Pakaian Wanita', 75000, 8, 'makan.png'),
(32, 'Milestyle', 'Kaos', 'Pakaian Pria', 80000, 5, 'makan1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id_invoice`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(24, 'DINA ROCHMATIN UTAMI', 'JL. LEUWI PANJANG GG. KEBONLEGA II', '2022-07-28 19:37:38', '2022-07-30 07:37:38'),
(25, 'icas', 'Bandung', '2022-07-29 00:13:49', '2022-07-30 12:13:49'),
(26, 'Muhammad Farhan', 'Unikom', '2022-07-29 15:41:02', '2022-07-31 03:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(60) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga` int(12) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `gambar`) VALUES
(20, 24, 4, 'Screamous T-Shirt HTP PULL BLACK', 1, 185000, 'logo_baru_sc_tanpa_bayangan1.png'),
(21, 25, 7, ' Playstation 5 Sony - Digital INA', 1, 10789000, 'Antarmuka-DetailBarang-alamat_drawio.png'),
(22, 25, 1, 'Screamous Long Pants Chino DEMON MEDIUM BEIGE', 1, 475000, 'Antarmuka-DetailBarang-alamat_drawio.png'),
(23, 26, 16, 'Afro Boy', 1, 80000, 'MS_(2).jpg');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `username`, `password`, `role_id`) VALUES
(1, 'admin', '', 'admin', 'admin', 1),
(2, 'Muhammad Farhan', 'ridwanokim112@gmail.com', 'farhan', 'gajah', 2),
(4, 'farhan', '', 'safar', '12345', 2),
(5, 'Sahab', '', 'farhaaan', '12345', 2),
(6, 'Muhammad Farhan', 'farhan201404@gmail.com', 'farhan', 'abcde', 2),
(7, 'icas', 'ularcobra278@gmail.com', 'icasss', 'icas123', 2),
(8, 'Muhammad Farhan', 'farhan201404@gmail.com', 'farhan', 'abcde', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `no` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` text NOT NULL,
  `date_created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`no`, `email`, `token`, `date_created`) VALUES
(1, 'ridwanokim112@gmail.com', 'iEUiRWWRIiJ8AI+TVrikfyJtfohnYfCcPet7NwDxXww=', '1643124649'),
(2, 'ridwanokim112@gmail.com', 'hI50pmkfa00a4CZGorkNF4OlVvOY/zyqjScX794F24g=', '1643124749'),
(3, 'ridwanokim112@gmail.com', 'p9uqgIw8b3FbPo+cJdqxkNEqlPB/4/Pn4A/PLcQmXj0=', '1643124751'),
(4, 'ridwanokim112@gmail.com', 'LT/Jep/88MqBcyODlYeG3hXLuwtCt7GPAKfZCOhV1eI=', '1643124795'),
(5, 'ridwanokim112@gmail.com', 'psS5AMkhl/bGvtMOYGSA7oQ0J4vjjsn/cmLRXeUvhZQ=', '1643124854'),
(6, 'ridwanokim112@gmail.com', 'JesHMDycg+DM0zPK/+eDHGLkXdd/gK2D4hCVxlrDL6w=', '1643124913'),
(7, 'ridwanokim112@gmail.com', 'zZyW7vkAyUz2REoCox7JOV5WFVAniYcJENlgX8kJWrk=', '1643124965'),
(8, 'ridwanokim112@gmail.com', '8pDYrK914/Se0n5GnmDszp4Bj73tB00dQDpxp14JFDI=', '1643125000'),
(9, 'ridwanokim112@gmail.com', 'X4JFJfuifzOGa0xZ+De7OVu86tIh8n7WOJvyZZJF9Q4=', '1643125047'),
(10, 'ridwanokim112@gmail.com', 'eYyXsQ3FM3NB29aOObUGol8gbCAlx9Bv0yrw+5cTwyk=', '1643125090'),
(11, 'ridwanokim112@gmail.com', 'd7jl1rJ8rvhrHOLtuJcnsbI6lhHb8qGFzdk9sducCjs=', '1643125103'),
(12, 'ridwanokim112@gmail.com', 'D3f3tf4f1yK6K5PTbm6QsOUkVRnqUekJuMyBP9UR7as=', '1643125106'),
(13, 'ridwanokim112@gmail.com', 'klU933bpzPerLl9Sc8aX8FF2ZpmWGsVF4gnm6vIH+m0=', '1643125116'),
(14, 'ridwanokim112@gmail.com', 'mZdzmDcomOZdJmie5kZeyq1k2XUPBG+nanCrWUVzdA8=', '1643125392'),
(15, 'ridwanokim112@gmail.com', 'NrUhzlw3ZsFc6LLdNZ1G7Qu4bf7Gl6vxfA3n7Q6OvV8=', '1643125936'),
(16, 'farhan201404@gmail.com', 'RC3S4/DtsIRh1FszEJ12XvTDdir/GWSmQxIGnTlDT+o=', '1643389952'),
(17, 'farhan201404@gmail.com', 'Ocoz3Ha30qVfgep+cCCGT+KRInXKVujEZNNK3TFUFgM=', '1643390947'),
(18, 'farhan201404@gmail.com', 'rJeVfMEbMmuMxgUcWkCIKoCp+qi1dXa1GnnP4DIaGv4=', '1643445239');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
