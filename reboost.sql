-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 06:52 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reboost`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kat` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kat`, `cover`, `isbn`, `judul`, `pengarang`, `tahun`, `harga`, `stok`) VALUES
(13, 'K001', '5a4d825c4ab2a.jpg', '123-456-789-1', 'Hujan', 'Tere Liye', '2017', 87000, 28),
(14, 'K002', '5a30dcf91f205.jpg', '123-456-789-2', 'Konspirasi Alam Semesta - Albuk #1', 'Fiersa Besari', '2017', 90000, 27),
(15, 'K001', '5a4d8b76ae1cc.jpg', '123-456-789-3', 'Episode Rasa', 'Suci Indriyani', '2016', 85000, 27),
(16, 'K001', '5a5c7f46d2e6c.jpg', '123-456-789-5', 'Jatuh dan Cinta', 'Boy Candra', '2018', 120000, 38),
(17, 'K001', '5a5c809b66097.jpg', '123-456-789-6', 'RIndu', 'Tere Liye', '2018', 95000, 28),
(18, 'K002', '5a5e9e4bbb2a9.jpg', '123-456-789-4', 'Kala', 'TUMBLR', '2018', 98000, 34);

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id_distributor` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama`, `alamat`, `email`) VALUES
(2, 'Destiarga Husein', 'Kauman', 'arga@yahoo.com'),
(3, 'Kevin Cahyo', 'Tamanan, Tulungagung', 'kevv@gmail.com'),
(4, 'Dhanang Arif', 'Wonokromo, Surabaya', 'dhanang12@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kat` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kat`, `nama_kat`) VALUES
('K001', 'Novel'),
('K002', 'Referensi'),
('K003', 'Agama'),
('K004', 'Self-Improvment');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_harga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE `pasok` (
  `id_pasok` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_distributor` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_buku`, `id_distributor`, `jumlah`, `tanggal`) VALUES
(1, 13, 2, 2, '2018-01-12'),
(2, 13, 2, 5, '2018-01-12'),
(3, 13, 2, 6, '2018-01-12'),
(4, 16, 2, 21, '2018-01-15'),
(5, 17, 2, 32, '2018-01-14'),
(6, 13, 2, 12, '2018-01-16'),
(7, 14, 3, 12, '2018-01-16'),
(8, 16, 2, 23, '2018-01-16'),
(9, 18, 3, 34, '2018-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_harga` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_buku`, `jumlah`, `jumlah_harga`, `tanggal`) VALUES
(2, 15, '12', '1020000', '2018-01-09'),
(3, 14, '2', '180000', '2018-01-09'),
(5, 15, '12', '1020000', '2018-01-09'),
(6, 14, '2', '180000', '2018-01-09'),
(8, 15, '12', '1020000', '2018-01-09'),
(9, 14, '2', '180000', '2018-01-09'),
(11, 15, '12', '1020000', '2018-01-09'),
(12, 14, '2', '180000', '2018-01-09'),
(14, 15, '12', '1020000', '2018-01-09'),
(15, 14, '2', '180000', '2018-01-09'),
(16, 15, '4', '340000', '2018-01-09'),
(17, 14, '3', '270000', '2018-01-09'),
(19, 15, '4', '340000', '2018-01-09'),
(20, 15, '4', '340000', '2018-01-09'),
(21, 15, '4', '340000', '2018-01-09'),
(22, 14, '2', '180000', '2018-01-09'),
(23, 13, '3', '261000', '2018-01-09'),
(24, 15, '6', '510000', '2018-01-09'),
(25, 15, '2', '170000', '2018-01-09'),
(26, 14, '1', '90000', '2018-01-09'),
(28, 13, '1', '87000', '2018-01-09'),
(29, 13, '2', '174000', '2018-01-11'),
(30, 15, '3', '255000', '2018-01-11'),
(31, 15, '3', '255000', '2018-01-11'),
(32, 15, '3', '255000', '2018-01-11'),
(33, 15, '3', '255000', '2018-01-11'),
(34, 13, '1', '87000', '2018-01-11'),
(35, 14, '1', '90000', '2018-01-11'),
(36, 13, '2', '174000', '2018-01-11'),
(37, 15, '3', '255000', '2018-01-11'),
(38, 13, '2', '174000', '2018-01-13'),
(39, 15, '3', '255000', '2018-01-13'),
(40, 13, '2', '174000', '2018-01-15'),
(41, 14, '1', '90000', '2018-01-15'),
(43, 13, '2', '174000', '2018-01-15'),
(44, 15, '4', '340000', '2018-01-15'),
(46, 15, '2', '170000', '2018-01-15'),
(47, 15, '2', '170000', '2018-01-15'),
(48, 15, '3', '255000', '2018-01-15'),
(49, 15, '3', '255000', '2018-01-15'),
(50, 15, '2', '170000', '2018-01-15'),
(51, 13, '1', '87000', '2018-01-15'),
(52, 16, '2', '240000', '2018-01-15'),
(53, 17, '2', '190000', '2018-01-15'),
(54, 16, '1', '120000', '2018-01-15'),
(56, 16, '1', '120000', '2018-01-15'),
(57, 16, '1', '120000', '2018-01-15'),
(58, 15, '2', '170000', '2018-01-16'),
(59, 17, '1', '95000', '2018-01-16'),
(60, 0, '2', '0', '2018-01-17'),
(61, 15, '2', '170000', '2018-01-17'),
(62, 16, '1', '120000', '2018-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`, `email`, `nohp`, `alamat`, `instansi`) VALUES
(1, 'admin', '$2y$10$nS0tCYzfc17fr/jznpjCiu6G53ZwfSr4V67HlZ6wqz4LalQfd9siG', 1, 'admin reboost ind', 'reboostind@gmail.com', '08233567498', 'Jln. Kesumba No. 19', 'REBOOST IND'),
(14, 'reynaldi', '$2y$10$e9OGkglX5446RdHbJw7POeQG.dIQwbWT.5UuZMn4OX5YHYYhzr6Oy', 2, 'Reynaldi Oktino', 'reynaldi.oktino@ymail.com', '085706526558', 'Tanggung, Tulungagung', 'REBOOST IND'),
(17, 'jovian', '$2y$10$cnSMzmmRxzpyy3Skvgptf.1t/nHf6JO3xuaq8UXTxlrWtgHi53mga', 3, 'jovian farel joo', 'jojofarel@gmail.com', '089765342987', 'boyolangu, Tulungagung', 'Politeknik Negeri Malang'),
(18, 'alvin', '$2y$10$GoIMueXi/eIsNy32pUMtaekIO7wKX3H.0YC3ytlMrjoKUxeQBi9RW', 2, 'Alvin Ariyanto', 'alvin123@gmail.com', '08767289227', 'Malang, Jawa Timur', 'REBOOST IND'),
(21, 'rakha', '$2y$10$YFCBvnKWobXfAYfWF8MJm.3MJBscP7LqBvpKv/RCR5vNSwtyHf2yu', 3, 'rakha hendra', 'rakhen@gmail.com', '08767289227', 'Kauman, Tulungagung', 'TOKO BUKU RINGAN'),
(22, 'kasir', '$2y$10$xW7WW/.0jp4/Dxkhxqb7fOt0ou0Ctos4nLdJI0CQhviGgs2S8Mbku', 2, 'kasir satu', 'kasirsatu@gmail.com', '089123234345', 'jln. kesumba no 18', 'REBOOST IND');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kat` (`id_kat`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`id_pasok`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_distributor` (`id_distributor`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pasok`
--
ALTER TABLE `pasok`
  MODIFY `id_pasok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kat`) REFERENCES `kategori_buku` (`id_kat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
