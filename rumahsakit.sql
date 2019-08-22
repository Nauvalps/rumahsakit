-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 09:56 AM
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
('5a99af1f-7732-4a0d-8b7d-77a2d6ca80bc', 'Dr.Aldi', 'Mata', 'Jl.Dukuh Zamrud Blok R4 No 16 Bekasi', '0892131231232'),
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
('d046252e-ffab-4e7e-9b8f-dc3085161c41', '0980912381', 'Nauval', 'laki-laki', 'Jl.Swadaya VII', '0890821312312');

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
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
