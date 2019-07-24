-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 06:31 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proyekii`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
`id_akun` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_regis` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `tgl_regis`, `status`, `active`) VALUES
(40, 'tomochan', '12345678', '2019-07-08', 'pencaker', 1),
(41, 'bank_mega', '12345678', '2019-07-08', 'Perusahaan', 1),
(42, 'cosmos', '12345678', '2019-07-08', 'Perusahaan', 1),
(43, 'mitsubishi_chemical', '12345678', '2019-07-08', 'Perusahaan', 1),
(44, 'randipp29', 'qwertyuiop', '2019-07-09', 'pencaker', 1),
(45, 'lion_parcel', 'qwertyuiop', '2019-07-09', 'Perusahaan', 1),
(46, 'farhangiff', 'asdfghjkl', '2019-07-09', 'pencaker', 1),
(47, 'cahyogi', '12345678', '2019-07-09', 'pencaker', 1),
(48, 'TEL_U', 'qwertyuiop12', '2019-07-09', 'Perusahaan', 1),
(49, 'ghalib_sasmito', '123456789', '2019-07-09', 'pencaker', 1),
(50, 'admin', 'admin', '2019-07-09', 'admin', 1),
(51, 'adri_matorang', '123456789', '2019-07-13', 'pencaker', 1),
(52, 'arranirym', '123456789', '2019-07-18', 'pencaker', 1);

-- --------------------------------------------------------

--
-- Table structure for table `disnaker`
--

CREATE TABLE IF NOT EXISTS `disnaker` (
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `acc` text NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
`id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'PASIRJAMBU'),
(2, 'CIMAUNG'),
(3, 'PANGALENGAN'),
(4, 'KERTASARI'),
(5, 'PACET'),
(6, 'IBUN'),
(7, 'PASEH'),
(8, 'CIKANCUNG'),
(9, 'CICALENGKA'),
(10, 'NAGREG'),
(11, 'RANCAEKEK'),
(12, 'MAJALAYA'),
(13, 'SOLOKAN JERUK'),
(14, 'CIPARAY'),
(15, 'BALEENDAH'),
(16, 'ARJASARI'),
(17, 'BANJARAN'),
(18, 'CANGKUANG'),
(19, 'PAMEUNGPEUK'),
(20, 'KATAPANG'),
(21, 'SOREANG'),
(22, 'KUTAWARINGIN'),
(23, 'MARGAASIH'),
(24, 'MARGAHAYU'),
(25, 'DAYEUHKOLOT'),
(26, 'BOJONGSOANG'),
(27, 'CILENGKRANG'),
(28, 'CILEUNYI'),
(29, 'CIMEUNYAN'),
(30, 'CIWIDEY');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE IF NOT EXISTS `kelurahan` (
`id_kelurahan` int(11) NOT NULL,
  `nama_kelurahan` varchar(255) NOT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `nama_kelurahan`, `id_kecamatan`) VALUES
(1, 'Ancolmekar', 16),
(2, 'Arjasari', 16),
(3, 'Baros', 16),
(4, 'Batukarut', 16),
(5, 'Lebakwangi', 16),
(6, 'Mangunjaya', 16),
(7, 'Mekarjaya', 16),
(8, 'Patrolsari', 16),
(9, 'Pinggirsari', 16),
(10, 'Rancakole', 16),
(11, 'Wargaluyu', 16),
(12, 'Malakasari', 15),
(13, 'Andir', 15),
(14, 'Baleendah', 15),
(15, 'Bojongmalaka', 15),
(16, 'Jelekong', 15),
(17, 'Manggahang', 15),
(18, 'Rancamanyar', 15),
(19, 'Wargamekar', 15),
(20, 'Banjaran Kulon', 17),
(21, 'Banjaran Wetan', 17),
(22, 'Ciapus', 17),
(23, 'Kamasan', 17),
(24, 'Kiangroke', 17),
(25, 'Margahurip', 17),
(26, 'Mekarjaya', 17),
(27, 'Neglasari', 17),
(28, 'Pasirmulya', 17),
(29, 'Sindangpanon', 17),
(30, 'Tarajusari', 17),
(31, 'Buahbatu', 26),
(32, 'Cipagalo', 26),
(33, 'Lengkong', 26),
(34, 'Tegalluar', 26),
(35, 'Bojongsari', 26),
(36, 'Bojongsoang', 26),
(37, 'Bandasari', 18),
(38, 'Cangkuang', 18),
(39, 'Ciluncat', 18),
(40, 'Jatisari', 18),
(41, 'Nagrak', 18),
(42, 'Sindangpanon', 18),
(43, 'Pananjung', 18),
(44, 'Babakan Peuteuy', 9),
(45, 'Cicalengka Kulon', 9),
(46, 'Cicalengka Wetan', 9),
(47, 'Cikuya', 9),
(48, 'Dampit', 9),
(49, 'Margaasih', 9),
(50, 'Nagrog', 9),
(51, 'Narawita', 9),
(52, 'Panenjoan', 9),
(53, 'Tenjolaya', 9),
(54, 'Waluya', 9),
(55, 'Tanjungwangi', 9),
(56, 'Cihanyir', 8),
(57, 'Cikancung', 8),
(58, 'Cikasungka', 8),
(59, 'Ciluluk', 8),
(60, 'Hegarmanah', 8),
(61, 'Mandalasari', 8),
(62, 'Mekarlaksana', 8),
(63, 'Srirahayu', 8),
(64, 'Tanjunglaya', 8),
(65, 'Cilengkrang', 27),
(66, 'Jatiendah', 27),
(67, 'Ciporeat', 27),
(68, 'Cipanjalu', 27),
(69, 'Melatiwangi', 27),
(70, 'Girimekar', 27),
(71, 'Cileunyi Kulon', 28),
(72, 'Cileunyi Wetan', 28),
(73, 'Cimekar', 28),
(74, 'Cinunuk', 28),
(75, 'Cibiru Wetan', 28),
(76, 'Cibiru Hilir', 28),
(77, 'Campakamulya', 2),
(78, 'Cikalong', 2),
(79, 'Cimaung', 2),
(80, 'Cipinang', 2),
(81, 'Jagabaya', 2),
(82, 'Malasari', 2),
(83, 'Pasirhuni', 2),
(84, 'Sukamaju', 2),
(85, 'Mekarsari', 2),
(86, 'Cibeunying', 29),
(87, 'Cikadut', 29),
(88, 'Padasuka', 29),
(89, 'Mandalamekar', 29),
(90, 'Sindanglaya', 29),
(91, 'Mekarmanik', 29),
(92, 'Cimenyan', 29),
(93, 'Ciburial', 29),
(94, 'Mekarsaluyu', 29),
(95, 'Babakan', 14),
(96, 'Bumiwangi', 14),
(97, 'Ciheulang', 14),
(98, 'Cikoneng', 14),
(99, 'Ciparay', 14),
(100, 'Gunungleutik', 14),
(101, 'Manggungharja', 14),
(102, 'Mekar Laksana', 14),
(103, 'Mekarsari', 14),
(104, 'Pakutandang', 14),
(105, 'Sarimahi', 14),
(106, 'Serangmekar', 14),
(107, 'Sigaracipta', 14),
(108, 'Sumbersari', 14),
(109, 'Ciwidey', 30),
(110, 'Lebakmuncang', 30),
(111, 'Nengkelan', 30),
(112, 'Panundaan', 30),
(113, 'Panyocokan', 30),
(114, 'Rawabogo', 30),
(115, 'Sukawening', 30),
(116, 'Cangkuang Wetan', 25),
(117, 'Cangkuang Kulon', 25),
(118, 'Pesawahan', 25),
(119, 'Citeureup', 25),
(120, 'Dayeuhkolot', 25),
(121, 'Sukapura', 25);

-- --------------------------------------------------------

--
-- Table structure for table `kemampuan`
--

CREATE TABLE IF NOT EXISTS `kemampuan` (
`id_kemampuan` int(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_kemampuan` text NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kemampuan`
--

INSERT INTO `kemampuan` (`id_kemampuan`, `nik`, `nama_kemampuan`, `level`) VALUES
(1, '6472021303980001', 'Web Programming', 'Mahir'),
(2, '6472021303980001', 'Pengolahan Database', 'Mahir'),
(3, '6472021303980001', 'Mobile Programming', 'Menengah'),
(4, '6472021303980002', 'Web Programming', 'Mahir'),
(5, '6472021303980002', 'Pengolahan Database', 'Mahir'),
(6, '6472021303980002', 'Mobile Programming', 'Mahir'),
(7, '6472021303980002', 'Data analisis', 'Menengah');

-- --------------------------------------------------------

--
-- Table structure for table `kualifikasi`
--

CREATE TABLE IF NOT EXISTS `kualifikasi` (
`id_kualifikasi` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `pendidikan_minimal` varchar(255) NOT NULL,
  `tahun_pengalaman` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `kualifikasi`
--

INSERT INTO `kualifikasi` (`id_kualifikasi`, `id_lowongan`, `pendidikan_minimal`, `tahun_pengalaman`, `deskripsi`) VALUES
(68, 73, 'D2/D3', '3 Tahun', 'Melakukan pemeriksaan/pengecekan terhadap kebenaran data antara dokumen pengajuan kredit dengan fakta di lapangan, sekaligus melakukan taksasi/penilaian suatu jaminan guna menilai harga jaminan tersebut.'),
(69, 74, 'S1/D4', '1 Tahun', 'Mempelajari konsep-konsep materi Perbankan yang diberikan User/Divisi dan mengubah materi menjadi animasi untuk content e-learning sesuai kebutuhan User/Divisi.'),
(70, 75, 'D2/D3', '1 tahun', 'Bersedia ditempatkan di Cabang atau Group Bank Mega untuk wilayah Jabodetabek,  Bersedia menjalani masa Internship selama maksimal 9 bulan, kemampuan yang harus dimiliki: Komunikasi, Negosiasi, Presentasi, Selling Skill,  lebih disukai Pegawai (non-manajemen & non-supervisor) khusus dalam Sales -   Telesales/Telemarketing atau setara.'),
(71, 76, 'S1/D4', '1 tahun', 'Good looking, Menawarkan produk kepada customer, Melayani costumer dengan cara menjelasakan produk yang ditawarkan, Mengidentifikasi kebutuhan customer, Mencatat dan membuat laporan hasil penjualan'),
(72, 77, 'SMA/Sederajat', '1 tahun', ' Melakukan Penjualan dan mencapai target yang ditetapkan, menjalin hubungan baik dengan customer, melakukan reporting penjualan, mengembangkan penjualan'),
(73, 78, 'SMA/Sederajat', '1 tahun', 'Melakukan Penjualan dan mencapai target yang ditetapkan, menjalin hubungan baik dengan customer, melakukan reporting penjualan, mengembangkan penjualan'),
(74, 79, 'S2', '5 Tahun', 'Programming Language, Tools and Environment (preferable experience in one or more: PHP, .Net, MySql, MS Sql, Version System, web server IIS, '),
(75, 80, 'S1/D4', '2 Tahun', 'The SHE OFFICER has primary responsible for assisting the SHE Manager in implementation of Environment Management System and support others activities.'),
(76, 81, 'S1/D4', '4 Tahun', 'Strong Experience in Incident Management, Problem Management,Capacity Management and Change Management which related TO Oracle DATABASE'),
(77, 82, 'D2/D3', '1 Tahun', 'Installation, configuration & upgrade of the RDBMS (PostgreSQL, MongoDB, NoSQL) and its tools and any other tools that access the databases'),
(78, 83, 'S1/D4', '4 tahun', 'Dicari Dosen Telkom '),
(79, 84, 'S1/D4', '4 tahun', 'Dicari dosen tel-u '),
(80, 85, 'D2/D3', '1 tahun', 'Dapat membuat aplikasi berbasis web'),
(81, 86, 'S1/D4', '3 Tahun', 'Dapat menggunakan React Native, menguasai framework Laravel dan CodeIgniter'),
(84, 89, 'SMA/Sederajat', '1 tahun', 'Menjual produk Cosmos');

-- --------------------------------------------------------

--
-- Table structure for table `list_pendidikan`
--

CREATE TABLE IF NOT EXISTS `list_pendidikan` (
`id_list_pendidikan` int(11) NOT NULL,
  `nama_pendidikan` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `list_pendidikan`
--

INSERT INTO `list_pendidikan` (`id_list_pendidikan`, `nama_pendidikan`, `level`) VALUES
(1, 'SD', 1),
(2, 'SMP/Sederajat', 2),
(3, 'SMA/Sederajat', 3),
(4, 'D2/D3', 4),
(5, 'S1/D4', 5),
(6, 'S2', 6),
(7, 'S3', 7);

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
`id_lowongan` int(11) NOT NULL,
  `no_siup` varchar(255) NOT NULL,
  `nama_lowongan` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `pendidikan` text NOT NULL,
  `pengalaman` varchar(255) NOT NULL,
  `pengupahan` varchar(255) NOT NULL,
  `gaji` text NOT NULL,
  `tanggal_pendaftaran` varchar(255) NOT NULL,
  `batas_waktu` varchar(255) NOT NULL,
  `tipe_ikatan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `posterLowongan` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `no_siup`, `nama_lowongan`, `nama_perusahaan`, `jabatan`, `jenis_kelamin`, `pendidikan`, `pengalaman`, `pengupahan`, `gaji`, `tanggal_pendaftaran`, `batas_waktu`, `tipe_ikatan`, `status`, `level`, `posterLowongan`) VALUES
(73, '6471381465890123457', 'Apprisal Staff', 'Bank Mega', 'Staf Senior', 'Wanita', 'D2/D3', '3 Tahun', 'Bulanan', '7.000.000', '2019-07-04', '2019-07-12', 'Pegawai Tetap', 'Belum berakhir', 4, ''),
(74, '6471381465890123457', 'E Learning Design Graphics Specialist', 'Bank Mega', 'Staf Senior', 'Pria', 'S1/D4', '1 Tahun', 'Bulanan', '6.000.000', '2019-07-08', '2019-07-15', 'Pegawai Tetap', 'Belum berakhir', 5, ''),
(75, '6471381465890123457', 'Young Financial Academy - School Of Banking (YFA)', 'Bank Mega', 'Staf junior', 'Pria', 'D2/D3', '1 tahun', 'Bulanan', '4.000.000', '2019-07-08', '2019-07-16', 'Pegawai Tetap', 'Belum berakhir', 4, ''),
(76, '6471381465890123401', 'SPB(Sales Promotion Boy) di PT Star Cosmos', 'PT. Star Cosmos', 'Staf', 'Pria', 'S1/D4', '1 tahun', 'Bulanan', '4.000.000', '2019-07-09', '2019-07-12', 'Pegawai Tetap', 'Belum berakhir', 5, ''),
(77, '6471381465890123401', 'Sales Bulungan ', 'PT. Star Cosmos', 'Staf Senior', 'Pria', 'SMA/Sederajat', '1 tahun', 'Bulanan', '3.000.000', '2019-07-08', '2019-07-18', 'Pegawai Tetap', 'Belum berakhir', 3, ''),
(78, '6471381465890123401', 'Sales Melak', 'PT. Star Cosmos', 'Staf Senior', 'Pria', 'SMA/Sederajat', '1 tahun', 'Bulanan', '4.000.000', '2019-07-08', '2019-07-16', 'Pegawai Tetap', 'Belum berakhir', 3, ''),
(79, '6471381465890123402', 'IT System Development Officer', 'PT Mitsubishi Chemical Indonesia', 'Senior Manajer', 'Pria', 'S2', '5 Tahun', 'Bulanan', '10.000.000', '2019-07-08', '2019-07-23', 'Pegawai Tetap', 'Belum berakhir', 6, ''),
(80, '6471381465890123402', 'SHE OFFICER', 'PT Mitsubishi Chemical Indonesia', 'Pemula / Staf', 'Pria', 'S1/D4', '2 Tahun', 'Bulanan', '5.000.000', '2019-07-03', '2019-07-19', 'Pegawai Tetap', 'Belum berakhir', 5, ''),
(81, '6471381465890123402', 'Database Administrator', 'PT Mitsubishi Chemical Indonesia', 'Staf Senior', 'Pria', 'S1/D4', '4 Tahun', 'Bulanan', '10.000.000', '2019-07-09', '2019-07-16', 'Pegawai Tetap', 'Belum berakhir', 5, ''),
(82, '6471381465890123403', 'Database Administrator', 'Lion Parcel', 'Staff', 'Pria', 'D2/D3', '1 Tahun', 'Bulanan', '5.000.000', '2019-07-09', '2019-07-18', 'Pegawai Tetap', 'Belum berakhir', 4, ''),
(83, '6471381465890123404', 'Dosen', 'Telkom University', 'Profesional', 'Pria', 'S1/D4', '4 tahun', 'Bulanan', '5.000.000', '2019-07-09', '2019-07-16', 'Pegawai Tetap', 'Belum berakhir', 5, ''),
(84, '6471381465890123404', 'Dosen', 'Telkom University', 'Profesional', 'Pria', 'S1/D4', '4 tahun', 'Bulanan', '5.000.000', '2019-07-20', '2019-07-22', 'Pegawai Tetap', 'Belum berakhir', 5, ''),
(85, '6471381465890123457', 'Junior Programmer PHP', 'Bank Mega', 'Staff', 'Pria', 'D2/D3', '1 tahun', 'Bulanan', '3.000.000', '2019-07-20', '2019-07-22', 'Pegawai Tetap', 'Belum berakhir', 4, ''),
(86, '6471381465890123402', 'Programmer PHP', 'PT Mitsubishi Chemical Indonesia', 'Staf Senior', 'Pria', 'S1/D4', '3 Tahun', 'Bulanan', '7.000.000', '2019-07-18', '2019-07-24', 'Pegawai Tetap', 'Belum berakhir', 5, 'Poster.png'),
(89, '6471381465890123401', 'SPG(Sales Promotion Girl) di PT Star Cosmos', 'PT. Star Cosmos', 'Staf', 'Wanita', 'SMA/Sederajat', '1 tahun', 'Bulanan', '2.000.000', '2019-07-18', '2019-07-24', 'Pegawai Tetap', 'Belum berakhir', 3, 'Poster.png');

-- --------------------------------------------------------

--
-- Table structure for table `melamar`
--

CREATE TABLE IF NOT EXISTS `melamar` (
  `nik` varchar(255) NOT NULL,
  `tgl_melamar` date NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `status_lamaran` text NOT NULL,
  `status_notifikasi` int(11) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `melamar`
--

INSERT INTO `melamar` (`nik`, `tgl_melamar`, `id_lowongan`, `status_lamaran`, `status_notifikasi`, `catatan`) VALUES
('6472021303980001', '2019-07-09', 77, 'Belum Diterima', 0, ''),
('6472021303980001', '2019-07-09', 78, 'Panggil Wawancara', 1, 'Silakan datang ke kantor kami pada tanggal 3 Agustus 2019'),
('6472021303980002', '2019-07-09', 81, 'Belum Diterima', 0, ''),
('6472021303980002', '2019-07-09', 74, 'Belum Diterima', 0, ''),
('6472021303980003', '2019-07-09', 0, 'Belum Diterima', 0, ''),
('6472021303980005', '2019-07-09', 0, 'Belum Diterima', 0, ''),
('6472021303980005', '2019-07-09', 83, 'Panggil Wawancara', 1, 'silahkan datang ke kantor kami tanggal 20-09-2019 di gedung tokong nanas'),
('6472021303980005', '2019-07-20', 84, 'Belum Diterima', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pencaker`
--

CREATE TABLE IF NOT EXISTS `pencaker` (
  `nik` varchar(255) NOT NULL,
  `namaLengkap` varchar(255) NOT NULL,
  `tempatLahir` varchar(255) NOT NULL,
  `tglLahir` date NOT NULL,
  `jenisKelamin` varchar(255) NOT NULL,
  `statusPernikahan` text NOT NULL,
  `agama` text NOT NULL,
  `alamat` text NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `noTel` varchar(255) NOT NULL,
  `pendidikan` text NOT NULL,
  `jurusan` text,
  `tglIjazah` date NOT NULL,
  `status_WN` text NOT NULL,
  `foto` text NOT NULL,
  `qr_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencaker`
--

INSERT INTO `pencaker` (`nik`, `namaLengkap`, `tempatLahir`, `tglLahir`, `jenisKelamin`, `statusPernikahan`, `agama`, `alamat`, `id_kecamatan`, `id_kelurahan`, `username`, `email`, `noTel`, `pendidikan`, `jurusan`, `tglIjazah`, `status_WN`, `foto`, `qr_code`) VALUES
('6472021303980001', 'Wahyu Utomo Putra', 'purbalingga', '1998-03-17', 'Pria', 'Lajang', 'Islam', 'Griya Bandung Asri Blok B 14', 26, 36, 'tomochan', 'wahyuutomoputra@gmail.com', '081347055461', 'D2/D3', 'Sistem Informasi', '2019-07-09', 'WNI', 'Tomo.jpg', '6472021303980001.png'),
('6472021303980002', 'Randi Pratama Putra', 'Lampung', '1996-08-27', 'Pria', 'Lajang', 'Islam', 'GBA 1 blok B14', 26, 36, 'randipp29', 'randipp29@gmail.com', '089602647631', 'S3', 'Sistem Informasi', '2019-07-25', 'WNI', 'Randi.jpg', '6472021303980002.png'),
('6472021303980003', 'Farhan Giffari', 'Purwakarta', '1998-02-14', 'Pria', 'Lajang', 'Islam', 'Griya Bandung Asri Blok B 14', 26, 36, 'farhangiff', 'farhangiffari4@gmail.com', '081347055461', 'S1/D4', 'Sistem Informasi', '2019-07-16', 'WNI', 'Farhan.jpg', '6472021303980003.png'),
('6472021303980004', 'Muhammad Cahyogi', 'Depok', '1996-08-28', 'Pria', 'Lajang', 'Islam', 'Griya Bandung Asri Blok B 14', 26, 36, 'cahyogi', 'cahyogi@gmail.com', '081347055461', 'D2/D3', 'Sistem Informasi', '2019-06-12', 'WNI', 'Igoy.jpg', '6472021303980004.png'),
('6472021303980005', 'Ghalib Sasmito', 'Bekasi', '1998-09-04', 'Pria', 'Lajang', 'Islam', 'Griya Bandung Asri 1 Blok B 14', 26, 36, 'ghalib_sasmito', 'ghalibsasmito@gmail.com', '087722581840', 'S1/D4', 'Sistem Informasi', '2019-07-09', 'WNI', 'Ghalib.jpg', '6472021303980005.png'),
('6472021303980006', 'Adri Farhan Matorang', 'Baubau', '1998-07-13', 'Pria', 'Lajang', 'Islam', 'Griya Bandung Asri Blok B 14', 26, 36, 'adri_matorang', 'adri_matorang77@gmail.com', '087722581840', '', NULL, '2019-07-18', 'WNI', 'Adri.jpg', '6472021303980006.png'),
('6472021303980007', 'Ar-Raniry Muhammad', 'Bekasi', '1998-06-10', 'Pria', 'Lajang', 'Islam', 'Griya Bandung Asri Blok B 14', 26, 36, 'arranirym', 'ghalibsasmito@gmail.com', '087722581840', 'D2/D3', 'Sistem Informasi', '2019-07-16', 'WNI', 'Ar-raniry.jpg', '6472021303980007.png');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `no_siup` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`no_siup`, `nama_perusahaan`, `email`, `alamat`, `username`) VALUES
('6471381465890123401', 'PT. Star Cosmos', 'cosmos@gmail.com', 'Jalan Kyai Haji Agus Salim No.6, Poris Plawad, Cipondoh, Poris Plawad, Kec. Cipondoh, Kota Tangerang, Banten 15141', 'cosmos'),
('6471381465890123402', 'PT Mitsubishi Chemical Indonesia', 'mitsubishi_chemical@gmail.com', 'Jl. Raya Merak KM 117 Kelurahan Gerem, Grogol, Cilegon', 'mitsubishi_chemical'),
('6471381465890123403', 'Lion Parcel', 'ghalibgendut@gmail.com', '6471381465890123402', 'lion_parcel'),
('6471381465890123404', 'Telkom University', 'farhangiffari4@gmail.com', 'Jln.Telekomunikasi', 'TEL_U'),
('6471381465890123457', 'Bank Mega', 'mega_bank@gmail.com', 'Jl. Kapten P. Tendean No.12-14A Jakarta 12790 ', 'bank_mega');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE IF NOT EXISTS `portofolio` (
`id_portofolio` int(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_pekerjaan` text NOT NULL,
  `lama_bekerja` text NOT NULL,
  `nama_sertifikat` varchar(255) DEFAULT NULL,
  `foto_sertifikat` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id_portofolio`, `nik`, `nama_pekerjaan`, `lama_bekerja`, `nama_sertifikat`, `foto_sertifikat`) VALUES
(3, '6472021303980002', 'Database Administrator', '3 Tahun', '', ''),
(4, '6472021303980002', 'Web Programmer', '3 Tahun', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE IF NOT EXISTS `riwayat_pendidikan` (
`id_pendidikan` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tingkat` varchar(255) NOT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `tgl_lulus` date NOT NULL,
  `fotoIjazah` varchar(255) NOT NULL,
  `id_list_pendidikan` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`id_pendidikan`, `nik`, `tingkat`, `jurusan`, `nama_sekolah`, `alamat_sekolah`, `tgl_lulus`, `fotoIjazah`, `id_list_pendidikan`) VALUES
(48, '6472021303980001', 'SD', '', 'SD Muhammadiyah 3', 'Samarinda seberang', '2010-06-09', 'SD.jpg', 1),
(49, '6472021303980001', 'SMP/Sederajat', '', 'SMPN 3 Samarinda', 'Samarinda seberang', '2013-07-10', 'SMP.jpg', 2),
(50, '6472021303980001', 'SMA/Sederajat', 'IPS', 'SMAN 1 Bukateja', 'Purwandaru, Purbalingga', '2016-05-10', 'SMA.jpg', 3),
(51, '6472021303980001', 'D2/D3', 'Sistem Informasi', 'Telkom University', 'Jln.Telekomunikasi', '2019-06-19', 'D3.jpg', 4),
(52, '6472021303980002', 'SD', '', 'SDN 2 Bojong Kulur', 'Jl. Raya Letda Nasir No.38, Bojong Kulur, Kec. Gn. Putri, Bogor, Jawa Barat 16965', '2009-07-22', 'SD.jpg', 1),
(53, '6472021303980002', 'SMP/Sederajat', '', 'SMPN 9 Bogor', 'Empang, Bogor Selatan, Bogor City, West Java 16132', '2012-07-12', 'SMP.jpg', 2),
(54, '6472021303980002', 'SMA/Sederajat', 'IPS', 'SMA Advent Bogor', 'Padjadjaran Road No.39, Sukasari, Bogor Timur, Bogor City, West Java 16142', '2015-07-08', 'SMA.jpg', 3),
(55, '6472021303980002', 'D2/D3', 'Sistem Informasi', 'Telkom University', 'Jln.Telekomunikasi', '2019-07-11', 'D3.jpg', 4),
(57, '6472021303980002', 'S1/D4', 'Sistem Informasi', 'Institut Teknologi Bandung', 'Jl. Ganesha No.10, Lb. Siliwangi, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132', '2021-07-14', 'S1.jpg', 5),
(58, '6472021303980002', 'S2', 'Teknik Informatika', 'Universitas Sumatra Utara', 'Jl. Abdul Hakim No.1, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20222', '2023-07-12', 'S2.jpg', 6),
(59, '6472021303980002', 'S3', 'Doktor Ilmu Komputer', 'Universitas Gajah Mada', 'Jl. Farmako Sekip Utara, Senolowo, Sinduadi, Mlati, Sleman Regency, Special Region of Yogyakarta 55281', '2025-07-16', 'S3.JPG', 7),
(60, '6472021303980003', 'SD', '', 'SDN 2 Ciseurueuh', 'Jl. Raya Sadang-Subang No.9, Ciwangi, Kec. Bungursari, Kabupaten Purwakarta, Jawa Barat 41118', '2010-12-08', 'SD.jpg', 1),
(61, '6472021303980003', 'SMP/Sederajat', '', 'SMP 5 Purwakarta', 'Jl. Ipik Gandamanah No.19, Ciseureuh, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41118', '2013-06-12', 'SMP.jpg', 2),
(62, '6472021303980003', 'SMA/Sederajat', 'TKJ', 'SMK Daarut Tauhid', 'Jl. Gegerkalong Girang Baru No.11', '2016-06-23', 'SMA.jpg', 3),
(63, '6472021303980003', 'D2/D3', 'Sistem Informasi', 'Telkom University', 'Jln.Telekomunikasi', '2019-07-09', 'D3.jpg', 4),
(64, '6472021303980005', 'SD', '', 'SDN Jakasmpurna III', 'Jakasampurna, Bekasi Barat', '2010-06-06', 'SD.jpg', 1),
(65, '6472021303980005', 'SMP/Sederajat', '', 'SMPN 4 Bekasi', 'Perumna 1, Bekasi Barat', '2013-06-08', 'SMP.jpg', 2),
(66, '6472021303980005', 'SMA/Sederajat', 'IPA', 'SMAN 12 Bekasi', 'Jl.I Gusti Ngurah rai', '2016-05-07', 'SMA.jpg', 3),
(67, '6472021303980005', 'S1/D4', 'Sistem Informasi', 'Telkom University', 'Jl. Telekomunikasi', '2019-07-09', 'S1.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
 ADD PRIMARY KEY (`id_akun`), ADD UNIQUE KEY `username` (`username`);

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
-- Indexes for table `kemampuan`
--
ALTER TABLE `kemampuan`
 ADD PRIMARY KEY (`id_kemampuan`);

--
-- Indexes for table `kualifikasi`
--
ALTER TABLE `kualifikasi`
 ADD PRIMARY KEY (`id_kualifikasi`);

--
-- Indexes for table `list_pendidikan`
--
ALTER TABLE `list_pendidikan`
 ADD PRIMARY KEY (`id_list_pendidikan`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
 ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `pencaker`
--
ALTER TABLE `pencaker`
 ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
 ADD PRIMARY KEY (`no_siup`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
 ADD PRIMARY KEY (`id_portofolio`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
 ADD PRIMARY KEY (`id_pendidikan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `kemampuan`
--
ALTER TABLE `kemampuan`
MODIFY `id_kemampuan` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kualifikasi`
--
ALTER TABLE `kualifikasi`
MODIFY `id_kualifikasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `list_pendidikan`
--
ALTER TABLE `list_pendidikan`
MODIFY `id_list_pendidikan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
MODIFY `id_portofolio` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
