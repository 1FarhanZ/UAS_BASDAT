-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 05:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mylestyle`
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
(1, 'Screamous Long Pants Chino DEMON MEDIUM BEIGE', 'Celana Panjang', 'Pakaian Pria', 475000, 16, 'c_cream.jpg'),
(2, 'Screamous T-Shirt HTP FORCE WHITE', 'Kaos', 'Pakaian Pria', 185000, 6, 'k_hpwhite.jpg'),
(4, 'Screamous T-Shirt HTP PULL BLACK', 'Kaos', 'Pakaian Pria', 185000, 20, 's_htpb.jpg'),
(7, ' Playstation 5 Sony - Digital INA', 'Barang Baru', 'Elektronik', 10789000, 5, 'ps5.jpg'),
(8, 'ORKIDS Baju Kaos Anak Spot', 'Kaos', 'Pakaian Anak', 89000, 15, 'b_orkids.jpg'),
(9, 'Lakawa flutter dress anak purple unicorn ', 'Kaos', 'Pakaian Anak', 60000, 13, 'lakawa_p.jpg'),
(10, 'TUNIK MALIKA BIG SIZE', 'Batik', 'Pakaian Wanita', 135000, 21, 'TM_Jumbo.jpg'),
(11, 'Daster encana ungu label biru', 'Daster', 'Pakaian Wanita', 60000, 16, 'd_kencana.jpg'),
(12, 'MILLS Timnas Baju Latihan Garuda Training 1013GR (R,W,T,Go,Gr,Fy) - WHITE, XS', 'Jersey', 'Peralatan Olahraga', 216750, 9, 'garuda_white.jpg'),
(13, 'Pull up Bar Pull up Door Chinning Bar Iron Gym Gym alat pull up Speeds', 'Untuk Kesehatan', 'Peralatan Olahraga', 70000, 27, 'pull_up.jpg'),
(15, 'Nintendo Switch Console Red Blue Limited Edition Switch', 'Barang Baru', 'Elektronik', 5215000, 8, 'n_switchv21.jpg');

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
(12, 'Sahab', 'Jln.Dipatiukur no.96', '2021-08-14 19:45:36', '2021-08-16 07:45:36'),
(13, '', '', '2022-01-02 21:00:17', '2022-01-04 09:00:17');

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
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(11, 12, 7, ' Playstation 5 Sony - Digital INA', 1, 10789000, ''),
(12, 13, 13, 'Pull up Bar Pull up Door Chinning Bar Iron Gym Gym alat pull', 1, 70000, '');

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
(5, 'Sahab', '', 'farhaaan', '12345', 2);

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
(15, 'ridwanokim112@gmail.com', 'NrUhzlw3ZsFc6LLdNZ1G7Qu4bf7Gl6vxfA3n7Q6OvV8=', '1643125936');

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
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
