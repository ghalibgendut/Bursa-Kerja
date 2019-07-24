-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 05:45 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proyekakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
`id_akun` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_regis` date NOT NULL,
  `status` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `disnaker`
--

CREATE TABLE IF NOT EXISTS `disnaker` (
  `username` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `acc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE IF NOT EXISTS `keahlian` (
`id_keahlian` int(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_keahlian` varchar(255) NOT NULL,
  `level_keahlian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
`id_kecamatan` int(255) NOT NULL,
  `nama_kecamatan` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Arjasari'),
(2, 'Baleendah'),
(3, 'Banjaran'),
(4, 'Bojongsoang'),
(5, 'Cangkuang'),
(6, 'Cicalengka'),
(7, 'Cikancung'),
(8, 'Cilengkrang'),
(9, 'Cileunyi'),
(10, 'Ibun'),
(11, 'Katapang'),
(12, 'Kertasari'),
(13, 'Kutawaringin'),
(14, 'Majalaya'),
(15, 'Margaasih'),
(16, 'Margahayu'),
(17, 'Nagreg'),
(18, 'Pacet'),
(19, 'Pameungpeuk'),
(20, 'Pangalengan'),
(21, 'Paseh'),
(22, 'Pasirjambu'),
(23, 'Rancabali'),
(24, 'Solokan Jeruk'),
(25, 'Rancaekek'),
(26, 'Soreang');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE IF NOT EXISTS `kelurahan` (
`id_kelurahan` int(255) NOT NULL,
  `nama_kelurahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kualifikasi`
--

CREATE TABLE IF NOT EXISTS `kualifikasi` (
`id_kualifikasi` int(255) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `tahun_pengalaman` varchar(255) NOT NULL,
  `pendidikan_minimal` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
  `no_siup` varchar(255) NOT NULL,
`id_lowongan` int(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `nama_lowongan` varchar(255) NOT NULL,
  `tanggal_pendaftaran` text NOT NULL,
  `tanggal_berakhir` text NOT NULL,
  `gaji` text NOT NULL,
  `nama_bagian` varchar(255) NOT NULL,
  `deskrpisi` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `melamar`
--

CREATE TABLE IF NOT EXISTS `melamar` (
  `nik` varchar(255) NOT NULL,
  `id_lowongan` int(255) NOT NULL,
  `tanggal_melamar` text NOT NULL,
  `status_lamaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pencaker`
--

CREATE TABLE IF NOT EXISTS `pencaker` (
  `nik` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` text NOT NULL,
  `status_pernikahan` text NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_kecamatan` int(255) NOT NULL,
  `id_kelurahan` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `no_siup` varchar(255) NOT NULL,
  `nama_perusahaan` text NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE IF NOT EXISTS `portofolio` (
`id_portofolio` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_pekerjaan` varchar(255) DEFAULT NULL,
  `pengalaman_kerja` varchar(255) DEFAULT NULL,
  `nama_sertifikat` varchar(255) DEFAULT NULL,
  `foto_sertifikat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE IF NOT EXISTS `riwayat_pendidikan` (
`id_pendidikan` int(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_sekolah` text NOT NULL,
  `tingkat` text NOT NULL,
  `jurusan` text NOT NULL,
  `foto_ijazah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
 ADD PRIMARY KEY (`id_akun`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `disnaker`
--
ALTER TABLE `disnaker`
 ADD PRIMARY KEY (`nip`), ADD KEY `username` (`username`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
 ADD PRIMARY KEY (`id_keahlian`), ADD KEY `nik` (`nik`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
 ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
 ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `kualifikasi`
--
ALTER TABLE `kualifikasi`
 ADD PRIMARY KEY (`id_kualifikasi`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
 ADD PRIMARY KEY (`id_lowongan`), ADD KEY `no_siup` (`no_siup`);

--
-- Indexes for table `melamar`
--
ALTER TABLE `melamar`
 ADD KEY `nik` (`nik`), ADD KEY `id_lowongan` (`id_lowongan`);

--
-- Indexes for table `pencaker`
--
ALTER TABLE `pencaker`
 ADD PRIMARY KEY (`nik`), ADD KEY `username` (`username`), ADD KEY `id_kecamatan` (`id_kecamatan`), ADD KEY `id_kelurahan` (`id_kelurahan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
 ADD PRIMARY KEY (`no_siup`), ADD KEY `username` (`username`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
 ADD PRIMARY KEY (`id_portofolio`), ADD KEY `nik` (`nik`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
 ADD PRIMARY KEY (`id_pendidikan`), ADD KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
MODIFY `id_akun` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
MODIFY `id_keahlian` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
MODIFY `id_kecamatan` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
MODIFY `id_kelurahan` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kualifikasi`
--
ALTER TABLE `kualifikasi`
MODIFY `id_kualifikasi` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
MODIFY `id_lowongan` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
MODIFY `id_portofolio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
MODIFY `id_pendidikan` int(255) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `disnaker`
--
ALTER TABLE `disnaker`
ADD CONSTRAINT `disnaker_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

--
-- Constraints for table `keahlian`
--
ALTER TABLE `keahlian`
ADD CONSTRAINT `keahlian_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pencaker` (`nik`);

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`no_siup`) REFERENCES `perusahaan` (`no_siup`);

--
-- Constraints for table `melamar`
--
ALTER TABLE `melamar`
ADD CONSTRAINT `melamar_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pencaker` (`nik`),
ADD CONSTRAINT `melamar_ibfk_2` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`);

--
-- Constraints for table `pencaker`
--
ALTER TABLE `pencaker`
ADD CONSTRAINT `pencaker_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`),
ADD CONSTRAINT `pencaker_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
ADD CONSTRAINT `pencaker_ibfk_3` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id_kelurahan`);

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

--
-- Constraints for table `portofolio`
--
ALTER TABLE `portofolio`
ADD CONSTRAINT `portofolio_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pencaker` (`nik`);

--
-- Constraints for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
ADD CONSTRAINT `riwayat_pendidikan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pencaker` (`nik`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
