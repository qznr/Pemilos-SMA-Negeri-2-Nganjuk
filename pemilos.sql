-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 08:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemilos`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapemilihan`
--

CREATE TABLE `datapemilihan` (
  `idpemilihan` int(5) NOT NULL,
  `tipe` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `idpemilih` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `idkandidat` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(9) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `memilih` varchar(1) NOT NULL,
  `aktif` enum('Y','T') NOT NULL DEFAULT 'T',
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `username`, `password`, `nama`, `memilih`, `aktif`, `foto`) VALUES
('12', 'testguru', md5('testing'), 'TestGuru', '', 'Y', '');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `idkandidat` int(2) NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nokandidat` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `jumlahsuara` varchar(4) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `visi` varchar(256) COLLATE latin1_general_ci NOT NULL,
  `misi` varchar(1024) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`idkandidat`, `nama`, `nokandidat`, `jumlahsuara`, `visi`, `misi`, `foto`) VALUES
(1, 'Simulasi 1', '1', '0', 'Meningkatkan kualitas SMAN 2 Nganjuk dengan membangun kapasitas siswa-siswi SMAN 2 Nganjuk yang berprinsip SMART (Sigap, Musyawarah, Aktif, Religius, dan Tertib).', '<ol><li>Menciptakan kondisi lingkungan organisasi untuk menghasilkan siswa yang berkompetensi , sigap, dan mandiri.</li><li>Menampung aspirasi seluruh warga SMAN 2 Nganjuk yang berprinsip musyawarah mufakat.</li><li>Berperan dalam meningkatkan parsitipasi siswa secara aktif dalam kegiatan akademik maupun non-akademik.Mendukung serta memajukan seluruh kegiatan siswa yang bersifat positif berlandaskan iman dan taqwa.</li><li>Membudayakan siswa SMAN 2 Nganjuk untuk selalu menaati peraturan di SMAN 2 Nganjuk.</li></ol>', '0.jpg'),
(2, 'Simulasi 2', '2', '0', 'Terwujudnya OSIS sebagai wadah kolaborasi siswa untuk berkontribusi pada SMA Negeri 2 Nganjuk dengan profesionalitas, kreatifitas, inovatif, dan berkarakter.', '<ol><li>Menengakkan aspirasi siswa sebagai dasar penentu kebijakan di SMA Negeri 2 Nganjuk.</li><li>Mengadakan program yang memanfaatkan kemajuan teknologi.</li><li>Menjadi role model dalam berperilaku kepada siapapun.</li><li>Mengembangkan kreatifitas dalam pengolahan dan pemanfaatan limbah demi mewujudkan program adiwiyata.</li><li>Mengembangkan kreatifitas dalam pengolahan dan pemanfaatan limbah demi mewujudkan program adiwiyata.</li></ol>', '0.jpg'),
(3, 'Simulasi 3', '3', '0', 'Mejadikan sekolah ini sebagai SMA terbaik se-kabupaten Nganjuk', '<ol><li>Tahun ini ......</li><li>\r\nMenjadikan bla..bla...</li><li>\r\n.....</li><li>\r....</li><li>\r\n.....</li></ol>', '0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `aktif` enum('Y','T') NOT NULL DEFAULT 'T',
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `username`, `password`, `nama`, `jabatan`, `hp`, `email`, `aktif`, `foto`) VALUES
(1, 'qznr_', 'd1fe8d7a11aa17aff826b11d3f80e24d', 'Moch. Gustav Ali Rafsandjani', 'Website Creator', '', 'mgustav.penting@gmail.com', 'Y', ''),
(2, 'MPK', md5('segeragantisetelahlogin'), 'MPK', 'Website Administrator '', '', 'Y', '');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `profil` varchar(128) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `idkelas` varchar(15) NOT NULL,
  `aktif` enum('Y','T') NOT NULL DEFAULT 'Y',
  `memilih` varchar(1) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`profil`, `username`, `password`, `nama`, `jk`, `idkelas`, `aktif`, `memilih`, `foto`) VALUES
('493123', 'siswatest', md5('testing'), 'testsiswa', 'L', 'mencoba', 'Y', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapemilihan`
--
ALTER TABLE `datapemilihan`
  ADD PRIMARY KEY (`idpemilihan`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`idkandidat`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`profil`),
  ADD UNIQUE KEY `pengguna` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datapemilihan`
--
ALTER TABLE `datapemilihan`
  MODIFY `idpemilihan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `idkandidat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
