-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2019 at 07:47 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `spesialis` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `telp`) VALUES
('30fc0874-d24e-4b34-8b19-e04ac9c78736', 'Dr.Restu', 'Penyakit Dalam', 'Jl.Pangeran I Bekasi', '0871231721391'),
('57ac2c53-3aa4-4f17-8f2f-da36a9514572', 'Dr.ilham', 'Kecantikan', 'Mutiara Gading Timur', '081231231231'),
('5a99af1f-7732-4a0d-8b7d-77a2d6ca80bc', 'Dr.Aldi', 'Mata', 'Jl.Dukuh Zamrud Blok R4 No 16 Bekasi', '0892131231232'),
('5efc2c4b-7b15-4ac9-a48d-4d9f35b972e3', 'Dr.Faza', 'Umum', 'Jatimulya', '089123123123'),
('6e4e8702-adbc-418c-8fb5-6326df773762', 'Dr.Stephen', 'Gigi', 'Jl.Swadaya VII RT02/RW06 Jatimulya', '09821371231');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
('07ce054a-80c6-4a46-a2b4-29be8e22b339', 'Panadol', 'Untuk demam, nyeri, sakit kepala'),
('1473f0a3-277b-4355-bd54-e7e53bbb3954', 'Neourobion', 'Untuk mengurangi pegal-pegal'),
('1810afa8-95df-4f50-8afe-551b1071cef2', 'Hansaplast', 'Untuk luka kecil'),
('37b0dfd9-54f6-43f5-b6f0-afa31046b197', 'Vit-C', 'Vitamin untuk daya tahan tubuh'),
('7ce1ba9c-12c0-48d5-adcf-2f35a237e397', 'Betadin', 'Untuk mencegah infeksi'),
('80ffd082-c7fd-4df6-b696-be53bdc1fc83', 'Alkohol', 'Untuk pembersih luka'),
('838b821f-a48f-4a3b-937d-124d8a4f1e98', 'Balsem', 'Untuk nyeri otot, keseleo, encok'),
('b722b3c9-2650-4489-a278-745c696ea966', 'Rivanol', 'Untuk kompres luka yang membengkak'),
('f2b1f300-57b1-4455-b3fc-77881d383c13', 'Oskadon', 'Untuk pening, sakit gigi, sakit kepala, haid');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `nama_pasien` varchar(40) NOT NULL,
  `jns_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `no_identitas`, `nama_pasien`, `jns_kelamin`, `alamat`, `no_telp`) VALUES
('1a836f9d-ab10-47d3-a474-178d21767423', '88129312311', 'Tegar', 'laki-laki', 'Tambun Kp.Bulu', '08912312312'),
('22f83d93-2630-4dc3-b14a-a76fa306f1be', '0213819231', 'Reynaldi', 'laki-laki', 'gatau dimana', '0891231231'),
('2337b415-6269-4163-be42-98b60b0c3980', '09812938112123', 'Ardhan', 'laki-laki', 'Depok', '082137123123123'),
('2c381908-e632-42cb-b469-b5e2d605a11d', '1263871627311', 'Rudi', 'perempuan', 'Bantar Gebang', '08121312312313'),
('2fef8afe-648c-4a53-9fd6-3269a07959eb', '011238913123', 'Ginyong', 'laki-laki', 'Margahayu', '08581231231'),
('5700b29c-7357-4692-8b3d-b0d8f7678ec5', '0921380917', 'Agung', 'perempuan', 'Cikarang', '0891231231231'),
('947a009f-e413-45b8-a021-a29158ba5b47', '0981902381123', 'Nasrul', 'laki-laki', 'Tambun', '08778123123123'),
('9c5fbd2f-f48f-4484-9004-3d6fa9168d9e', '1231091311231', 'Bagas', 'laki-laki', 'Cibitung', '089012311231'),
('b4edb379-f336-401f-8f86-0506d41f4a3a', '018239182931', 'Heriyanto', 'laki-laki', 'Jababeka', '091823901823132'),
('c2435782-7973-40b4-9eb1-7765f11b312e', '123123191211231', 'Daffa', 'perempuan', 'Cibitung', '12219388912123'),
('d046252e-ffab-4e7e-9b8f-dc3085161c41', '0980912381', 'Nauval Purnomo Sidi', 'laki-laki', 'Jl.Dukuh Zamrud Blok R-4 No.16 Bekasi', '0890821312312'),
('fdc05f35-0d16-4729-900c-1998fbd46a77', '09213912312', 'Emon', 'laki-laki', 'Perum 3', '0989021839812');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poli`
--

CREATE TABLE `tb_poli` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `gedung` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_poli`
--

INSERT INTO `tb_poli` (`id_poli`, `nama_poli`, `gedung`) VALUES
('1342b87d-0a1e-4b6f-bd10-a42f12eddca4', 'Poli 1', 'A.LT.I'),
('6764ac04-cc25-48cc-ac42-827dc3003e29', 'Poli 5', 'B.LT.II'),
('80009d32-32a7-4d03-9ee0-5271adc18094', 'Poli 2', 'A.LT.II'),
('8b692f41-07c8-48d0-8bb0-d31edf832126', 'Poli 4', 'B.LT.I'),
('b8269db3-bf43-400c-97bc-6c8f63410051', 'Poli 3', 'A.LT.II');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rm_obat`
--

CREATE TABLE `tb_rm_obat` (
  `id` int(8) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('b0f8c98e-b95d-11e9-a939-e03f49367587', 'Nauval Purnomo Sidi', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_poli`
--
ALTER TABLE `tb_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_rm` (`id_rm`),
  ADD UNIQUE KEY `id_obat` (`id_obat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `tb_poli` (`id_poli`);

--
-- Constraints for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD CONSTRAINT `tb_rm_obat_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rm_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
