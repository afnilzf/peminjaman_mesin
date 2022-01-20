-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 04:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman_mesin`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_mesin`
--

CREATE TABLE `daftar_mesin` (
  `id_mesin` int(10) NOT NULL,
  `nama_mesin` varchar(100) NOT NULL,
  `kondisi_mesin` varchar(100) NOT NULL,
  `jumlah_mesin` int(50) NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `kode_mesin` varchar(50) NOT NULL,
  `id_petugas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_mesin`
--

INSERT INTO `daftar_mesin` (`id_mesin`, `nama_mesin`, `kondisi_mesin`, `jumlah_mesin`, `id_jenis`, `kode_mesin`, `id_petugas`) VALUES
(3, 'MESIN BUBUT AJAX', 'BAIK', 2, 2, 'BU01', 1),
(4, 'MESIN BUBUT AJAX', 'RUSAK', 1, 2, 'BU02', 1),
(5, 'MESIN BUBUT AJAX', 'RUSAK', 1, 2, 'BU03', 1),
(6, 'MESIN BUBUT DOALL', 'PERBAIKAN', 1, 2, 'BU04', 1),
(7, 'MESIN BUBUT DOALL', 'PERBAIKAN', 1, 2, 'BU05', 1),
(8, 'MESIN BUBUT DOALL', 'PERBAIKAN', 1, 5, 'BU06', 1),
(9, 'MESIN BUBUT DOALL', 'PERBAIKAN', 1, 5, 'BU07', 1),
(10, 'MESIN BUBUT DOALL', 'PERBAIKAN', 2, 5, 'BU08', 1),
(11, 'MESIN BUBUT DOALL', 'PERBAIKAN', 1, 5, 'BU09', 1),
(12, 'MESIN BUBUT MAWLTEC', 'PERBAIKAN', 1, 6, 'BU10', 1),
(13, 'MESIN BUBUT MAWLTEC', 'PERBAIKAN', 1, 6, 'BU11', 1),
(14, 'MESIN BUBUT GEMINIS', 'BAIK', 0, 7, 'BU12', 1),
(15, 'MESIN BUBUT GEMINIS', 'BAIK', 0, 7, 'BU13', 1),
(16, 'MESIN BUBUT GEMINIS', 'BAIK', 0, 7, 'BU14', 1),
(17, 'MESIN BUBUT KRISBO', 'PERBAIKAN', 1, 8, 'BU15', 1),
(18, 'MESIN BUBUT KRISBO', 'PERBAIKAN', 1, 8, 'BU16', 1),
(19, 'MESIN BUBUT KRISBO', 'PERBAIKAN', 1, 8, 'BU17', 1),
(20, 'MESIN BUBUT BEMATO', 'PERBAIKAN', 1, 9, 'BU18', 1),
(21, 'MESIN BUBUT BEMATO', 'PERBAIKAN', 1, 9, 'BU19', 1),
(22, 'MESIN BUBUT BEMATO', 'PERBAIKAN', 1, 9, 'BU20', 1),
(23, 'MESIN BUBUT BEMATO', 'PERBAIKAN', 1, 9, 'BU21', 1),
(24, 'MESIN BUBUT BEMATO', 'PERBAIKAN', 1, 9, 'BU22', 1),
(25, 'MESIN BUBUT BEMATO', 'PERBAIKAN', 1, 9, 'BU23', 1),
(26, 'MESIN BUBUT KNUTH', 'BAIK', 0, 10, 'BU24', 1),
(27, 'MESIN BUBUT KNUTH', 'BAIK', 1, 10, 'BU25', 1),
(28, 'MESIN BUBUT KNUTH', 'BAIK', 0, 10, 'BU26', 1),
(29, 'MESIN FREIS (FEHLMANN P 18 S)', 'BAIK', 0, 11, 'FR01', 1),
(30, 'MESIN FREIS (FEHLMANN P 18 S)', 'BAIK', 0, 11, 'FR02', 1),
(31, 'MESIN FREIS (FEHLMANN P 18 S)', 'BAIK', 0, 11, 'FR03', 1),
(32, 'MESIN FREIS (FEHLMANN P 18 S)', 'BAIK', 1, 11, 'FR04', 1),
(33, 'MESIN FREIS (ACIERA F3/ISO 30)', 'BAIK', 1, 12, 'FR05', 1),
(34, 'MESIN FREIS (ACIERA F3/ISO 31)', 'BAIK', 1, 12, 'FR06', 1),
(35, 'MESIN FREIS (ACIERA F3/ISO 32)', 'BAIK', 1, 12, 'FR07', 1),
(36, 'MESIN FREIS (ACIERA F3/ISO 33)', 'RUSAK', 1, 12, 'FR08', 1),
(37, 'MESIN FREIS (AJAX 00 MILL)', 'BAIK', 1, 13, 'FR09', 1),
(38, 'MESIN FREIS (AJAX 00 MILL)', 'BAIK', 1, 13, 'FR10', 1),
(39, 'MESIN FREIS (AJAX V2AMK5)', 'BAIK', 1, 14, 'FR11', 1),
(40, 'MESIN FREIS (AJAX V2AMK5)', 'BAIK', 1, 14, 'FR12', 1),
(41, 'MESIN FREIS (AJAX V2AMK5)', 'BAIK', 1, 14, 'FR13', 1),
(42, 'MESIN FREIS (AJAX V2AMK5)', 'BAIK', 1, 14, 'FR14', 1),
(43, 'MESIN FREIS (AJAX V2AMK5)', 'BAIK', 1, 14, 'FR15', 1),
(44, 'MESIN FREIS (AJAX V2AMK5)', 'BAIK', 1, 14, 'FR16', 1),
(45, 'MESIN FREIS (LAGUN FU 125)', 'BAIK', 1, 15, 'FR17', 1),
(46, 'MESIN FREIS (LAGUN FU 125)', 'BAIK', 1, 15, 'FR18', 1),
(47, 'MESIN FREIS (LAGUN FU 125)', 'BAIK', 1, 15, 'FR19', 1),
(48, 'MESIN FREIS (FEHLMANN PICOMAX 20)', 'BAIK', 1, 16, 'FR20', 1),
(49, 'MESIN FREIS (FEHLMANN PICOMAX 20)', 'BAIK', 1, 16, 'FR21', 1),
(53, 'MESIN BOR (METABO, T 15 ST)', 'RUSAK', 1, 17, 'BO01', 1),
(54, 'MESIN BOR (METABO, T 15 ST)', 'RUSAK', 1, 17, 'BO02', 1),
(55, 'MESIN BOR (METABO, S 24 R)', 'RUSAK', 1, 18, 'BO03', 1),
(56, 'MESIN BOR (METABO, S 24 R)', 'RUSAK', 1, 18, 'BO04', 1),
(57, 'MESIN BOR (METABO, T TBE 5014)', 'RUSAK', 1, 19, 'BO05', 1),
(58, 'MESIN BOR (METABO, T TBE 5014)', 'RUSAK', 1, 19, 'BO06', 1),
(59, 'MESIN BOR (RB 50/16)', 'PERBAIKAN', 1, 20, 'BO07', 1),
(60, 'MESIN BOR (RB 50/16)', 'PERBAIKAN', 1, 20, 'BO08', 1),
(61, 'MESIN BOR (KRISBOW,MODEL KW15-46)', 'BAIK', 1, 21, 'BO09', 1),
(62, 'MESIN BOR (KRISBOW,MODEL KW15-46)', 'PERBAIKAN', 1, 21, 'BO10', 1),
(63, 'MESIN SHIPPING (WENLING B 635-1)', 'PERBAIKAN', 1, 22, 'KE01', 1),
(64, 'MESIN SHIPPING (WENLING B 635-1)', 'PERBAIKAN', 1, 22, 'KE02', 1),
(65, 'MESIN SHIPPING (WENLING BC 6063)', 'RUSAK', 1, 23, 'KE03', 1),
(66, 'MESIN SHIPPING (WENLING BC 6063)', 'PERBAIKAN', 1, 23, 'KE04', 1),
(67, 'mesin baru banget buk', 'BAIK', 3, 2, '3343', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(10) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `kode_jenis` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan`) VALUES
(2, 'MESIN BUBUT AJAX hhh', '01', 'MESIN BUBUT'),
(5, 'MESIN BUBUT DOALL', '02', 'MESIN BUBUT'),
(6, 'MESIN BUBUT MAWLTEC', '03', 'MESIN BUBUT'),
(7, 'MESIN BUBUT GEMINIS', '04', 'MESIN BUBUT'),
(8, 'MESIN BUBUT KRISBO', '05', 'MESIN BUBUT'),
(9, 'MESIN BUBUT BEMATO', '06', 'MESIN BUBUT'),
(10, 'MESIN BUBUT KNUTH', '07', 'MESIN BUBUT'),
(11, 'MESIN FREIS ( FEHLMANN P 18 S)', '08', 'MESIN FREIS'),
(12, 'MESIN FREIS (ACIERA F3/ISO)', '09', 'MESIN FREIS'),
(13, 'MESIN FREIS (AJAX 00 MILL)', '10', 'MESIN FREIS'),
(14, 'MESIN FREIS (AJAX V2AMK5)', '11', 'MESIN FREIS'),
(15, 'MESIN FREIS (LAGUN FU 125)', '12', 'MESIN FREIS'),
(16, 'MESIN FREIS (FEHLMANN PICOMAX 20)', '13', 'MESIN FREIS'),
(17, 'MESIN BOR (METABO, T 15 ST)', '14', 'MESIN BOR'),
(18, 'MESIN BOR (METABO, S 24 R)', '15', 'MESIN BOR'),
(19, 'MESIN BOR (METABO, T TBE 5014', '16', 'MESIN BOR'),
(20, 'MESIN BOR (RB 50/16)', '17', 'MESIN BOR'),
(21, 'MESIN BOR (KRISBOW, MODEL KW15-46)', '18', 'MESIN BOR'),
(22, 'MESIN SHAPPING (WENLING B 635-1)', '19', 'MESIN SHAPPING'),
(23, 'MESIN SHAPPING (WENLING BC 6063)', '20', 'MESIN SHAPPING');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(10) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Operator'),
(5, 'dosen'),
(6, 'mahasiswa'),
(7, 'Kalab'),
(8, 'Kajur');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `nidn_npm` varchar(50) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nidn_npm`, `jurusan`, `alamat`) VALUES
(2, 'abi', '3313123', 'mesin', 'sdsad'),
(18, 'Yang Agita', '13123', 'Elektro', 'sungailiat'),
(19, 'Bacot', '1431', 'Mesin', 'sungailiat'),
(24, 'Indra', '26312', 'elektro', 'jalan mawar JINGA'),
(26, 'Afnil Dwi', '268943', 'mesin', 'lingkungan nelayan 1'),
(28, 'coba', '3442663', 'Elektro', 'lingkungan nelayan 1'),
(30, 'mhs2', '526526', 'Teknik Elektronika dan Informatika', 'Sungailiat'),
(31, 'mhs3', '526526', 'IPS', 'pemali'),
(32, 'mhs4', '8990', 'Teknik Elektronika dan Informatika', 'Sungailiat'),
(33, 'mhs5', '52652689789', 'Teknik Elektronika dan Informatika', 'Sungailiat'),
(34, 'mhs6', '12634134', 'Teknik Elektronika dan Informatika', 'Sungailiat'),
(35, 'mhs7', '5264526534', 'Teknik Elektronika dan Informatika', 'Sungailiat'),
(36, 'mhs8', '265443', 'Teknik Elektronika dan Informatika', 'Sungailiat'),
(37, 'mhs9', '74265264', 'Teknik Elektronika dan Informatika', 'Sungailiat'),
(38, 'mhs11', '19209', 'TRPL', 'Alhidayah');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(10) NOT NULL,
  `id_mesin` int(10) NOT NULL,
  `tanggal_pinjam` varchar(10) NOT NULL,
  `tanggal_kembali` varchar(10) NOT NULL,
  `alasan` text NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `status_peminjaman` enum('-','Menunggu Persetujuan Kalab','Menunggu Persetujuan Kajur','Menunggu Persetujuan PLP','Ditolak','Dipinjamkan','Pengecekan Ulang','Selesai') NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `rating` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_mesin`, `tanggal_pinjam`, `tanggal_kembali`, `alasan`, `kelas`, `status_peminjaman`, `id_pegawai`, `tanggal_dikembalikan`, `rating`) VALUES
(60, 16, '2021-11-25', '2021-11-26', '', '', 'Selesai', 28, '2021-11-25', 1),
(62, 27, '2021-11-23', '2021-11-24', '', '', 'Selesai', 31, NULL, 4),
(63, 14, '2021-11-22', '2021-11-23', '', '', 'Dipinjamkan', 32, NULL, 0),
(64, 29, '2021-11-21', '2021-11-22', '', '', 'Dipinjamkan', 33, NULL, 0),
(65, 34, '2021-11-22', '2021-11-23', '', '', 'Selesai', 34, '2021-12-03', 3),
(66, 31, '2021-11-23', '2021-11-24', '', '', 'Dipinjamkan', 35, NULL, 0),
(67, 15, '2021-11-25', '2021-11-26', '', '', 'Dipinjamkan', 36, NULL, 0),
(68, 15, '2021-11-20', '2021-11-21', '', '', 'Dipinjamkan', 37, NULL, 0),
(72, 27, '2022-01-08', '2022-01-09', 'tes ', '4 TRPL', 'Selesai', 38, '2022-01-08', 4);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `id_level`, `id_pegawai`) VALUES
(1, 'plp', '95ed136f1ff343e42d36fba7b010746f', 1, 2),
(14, 'yang', '57cb5a26334a6c1d5e27c49def4a0f0d', 5, 18),
(15, 'dfdf', '412e6d5575a036cc3c1ce9254b23c28e', 5, 19),
(25, 'indra', 'e24f6e3ce19ee0728ff1c443e4ff488d', 7, 24),
(26, 'afnil', '1498ec603337fe942a805835d9d39991', 8, 26),
(28, 'mhs1', '79f6a8779d6f41d312bcd4d72cf66e0f', 6, 28),
(29, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 5, 29),
(30, 'mhs2', '41f1b79f6392e10a3c4bd10272576826', 6, 30),
(31, 'mhs3', '27971e2ff09a704920d692798c092edc', 6, 31),
(32, 'mhs4', 'c38b5f1f8617dcc03e1a7e054765e4f2', 6, 32),
(33, 'mhs5', '8f36a2cf13ffe1ec07d123cec0dc0e74', 6, 33),
(34, 'mhs6', 'be41ea6b3f8d3a4ab9a6a804505df5b1', 6, 34),
(35, 'mhs7', '9dfd344da1ab49dc0e920c34c1eb7ec3', 6, 35),
(36, 'mhs8', 'def9e0c8d763a0316affe4ef8c17df96', 6, 36),
(37, 'mhs9', 'bb2956ecc0cc18aa38602b74d52ef834', 6, 37),
(38, 'mhs11', 'c5154cc897bf7e1dd2ef8e241393a593', 6, 38);

-- --------------------------------------------------------

--
-- Table structure for table `rek_mesin`
--

CREATE TABLE `rek_mesin` (
  `id_rek` int(30) NOT NULL,
  `nama_mesin` varchar(255) NOT NULL,
  `Deskripsi` mediumtext NOT NULL,
  `id_pegawai` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rek_mesin`
--

INSERT INTO `rek_mesin` (`id_rek`, `nama_mesin`, `Deskripsi`, `id_pegawai`) VALUES
(1, 'Mesin Bubut 4.0', 'Agar Mesinnya keren pak', 34),
(2, 'mesin baru pak', 'asdsad\r\n', 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_mesin`
--
ALTER TABLE `daftar_mesin`
  ADD PRIMARY KEY (`id_mesin`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_mesin` (`id_mesin`) USING BTREE;

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `rek_mesin`
--
ALTER TABLE `rek_mesin`
  ADD PRIMARY KEY (`id_rek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_mesin`
--
ALTER TABLE `daftar_mesin`
  MODIFY `id_mesin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `rek_mesin`
--
ALTER TABLE `rek_mesin`
  MODIFY `id_rek` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_mesin`
--
ALTER TABLE `daftar_mesin`
  ADD CONSTRAINT `daftar_mesin_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `daftar_mesin_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_mesin`) REFERENCES `daftar_mesin` (`id_mesin`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
