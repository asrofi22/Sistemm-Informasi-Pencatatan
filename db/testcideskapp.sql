-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 02:16 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testcideskapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` varchar(30) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `jenis_cuti` varchar(30) NOT NULL,
  `alasan` text NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `mulai` date NOT NULL,
  `berakhir` date NOT NULL,
  `id_status_cuti` int(12) NOT NULL,
  `perihal_cuti` varchar(100) NOT NULL,
  `alasan_verifikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_user`, `jenis_cuti`, `alasan`, `tgl_diajukan`, `mulai`, `berakhir`, `id_status_cuti`, `perihal_cuti`, `alasan_verifikasi`) VALUES
('cuti-bcbc5', '394125b4dd6a990d44234aacb50d131a', 'Cuti Sakit', 'wuhkfjsd', '2024-03-07', '2024-03-07', '2024-03-22', 2, 'uhsjkzn', 'bjbm'),
('cuti-f6c23', '394125b4dd6a990d44234aacb50d131a', 'Cuti karena Alasan Penting', 'uygjhbn', '2024-03-20', '2024-03-26', '2024-03-30', 1, 'uhjn', ''),
('cuti-ff285', '70422f658342e9f6ad4b3be9debce4e7', 'Cuti karena Alasan Penting', 'yfuhjb', '2024-03-20', '2024-03-27', '2024-03-30', 1, 'dtyvhjn ', '');

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id_izin` varchar(30) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `alasan` text NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `mulai` time NOT NULL,
  `berakhir` time NOT NULL,
  `id_status_izin` int(12) NOT NULL,
  `perihal_izin` varchar(100) NOT NULL,
  `alasan_verifikasi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`id_izin`, `id_user`, `alasan`, `tgl_diajukan`, `mulai`, `berakhir`, `id_status_izin`, `perihal_izin`, `alasan_verifikasi`) VALUES
('izin-1bb7f', '6', 'menjemput anak', '2024-05-14', '11:30:00', '02:22:00', 2, 'ahnxk', ''),
('izin-27b55', '594', 'fews', '2024-05-28', '13:42:00', '15:42:00', 1, '', NULL),
('izin-28633', '591', 'wtrdfj', '2024-05-28', '12:35:00', '14:35:00', 1, '', NULL),
('izin-37090', '591', 'uhsajkn', '2024-05-28', '13:07:00', '16:07:00', 1, '', NULL),
('izin-3b626', '394125b4dd6a990d44234aacb50d131a', 'Meihat Orang Sakit', '2024-02-12', '12:30:00', '13:00:00', 2, 'Berkunjung Ke Rumah Sakit', 'boleh'),
('izin-3c004', '394125b4dd6a990d44234aacb50d131a', 'ngambil pakaian', '2024-02-09', '12:00:00', '12:30:00', 2, 'ngambil pakaian', 'tak bolehhh\r\n'),
('izin-51243', '594', 'srtdhgvj', '2024-05-28', '12:50:00', '14:50:00', 1, '', NULL),
('izin-54e79', '594', 'das', '2024-05-28', '04:52:00', '09:53:00', 1, '', NULL),
('izin-551e6', '394125b4dd6a990d44234aacb50d131a', 'jskm,', '2024-03-19', '05:28:00', '07:28:00', 1, 'hsajnm', NULL),
('izin-565e0', '5', 'jbas', '2024-05-30', '16:01:00', '18:01:00', 1, '', NULL),
('izin-8fc3b', '596', 'dasjb', '2024-05-28', '12:56:00', '14:56:00', 1, '', NULL),
('izin-94ff6', '589', 'ddrtgh', '2024-05-28', '12:15:00', '15:15:00', 1, '', NULL),
('izin-96b20', '394125b4dd6a990d44234aacb50d131a', 'hqiashkzx', '2024-02-10', '00:50:00', '00:55:00', 2, 'ihwdkaskd', ''),
('izin-971b9', '394125b4dd6a990d44234aacb50d131a', 'Besuk keluarga di rumah sakit', '2024-02-12', '13:00:00', '14:00:00', 2, 'ke Rumah Sakit', 'boleh'),
('izin-a0055', '594', 'askjbc', '2024-05-28', '04:57:00', '07:57:00', 1, '', NULL),
('izin-a798b', '592', 'duA', '2024-05-28', '10:58:00', '12:58:00', 1, '', NULL),
('izin-b08ea', '594', 'dasfesd', '2024-05-28', '04:52:00', '09:53:00', 1, '', NULL),
('izin-ba158', '6', 'hm', '2024-05-15', '10:04:00', '12:04:00', 1, 'hm', NULL),
('izin-ba169', '6', 'kjds', '2024-05-30', '09:17:00', '11:17:00', 1, '', NULL),
('izin-bc577', '594', 'ashjkn', '2024-05-28', '12:59:00', '14:59:00', 1, '', NULL),
('izin-cba76', '49', 'hsdn', '2024-05-30', '08:36:00', '11:36:00', 1, '', NULL),
('izin-d1536', '6', 'yfhg', '2024-05-29', '01:13:00', '05:13:00', 1, '', NULL),
('izin-d6e84', '4', 'dtyfh', '2024-05-30', '08:31:00', '12:31:00', 2, '', 'boleh'),
('izin-d868b', '6', 'menjemput anak', '2024-05-31', '11:04:00', '15:04:00', 1, '', NULL),
('izin-dd415', '6', 'kbkj', '2024-05-15', '11:10:00', '12:10:00', 1, 'bjm', NULL),
('izin-e4630', '589', 'menjemput anak', '2024-05-28', '12:15:00', '15:15:00', 1, '', NULL),
('izin-e6bb6', '594', 'abdjs', '2024-05-28', '05:50:00', '08:50:00', 1, '', NULL),
('izin-ec67f', '594', 'yguhj', '2024-05-28', '05:40:00', '07:40:00', 1, '', NULL),
('izin-f9e83', '6', 'lapat di dinas propinsi', '2024-05-14', '09:12:00', '12:30:00', 1, 'rapat', NULL),
('izin-fb34e', '591', 'acshbj', '2024-05-28', '13:10:00', '16:10:00', 1, '', NULL),
('izin-fe48f', '6', 'sihkj', '2024-05-15', '10:09:00', '12:09:00', 1, 'dbbejm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id_jenis_kelamin`, `jenis_kelamin`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id_log` varchar(30) NOT NULL,
  `status` int(10) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `isi` text NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `file` blob NOT NULL,
  `id_status_log` int(12) NOT NULL,
  `nama_laporan` varchar(200) NOT NULL,
  `nilai` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id_log`, `status`, `id_user`, `isi`, `tgl_diajukan`, `file`, `id_status_log`, `nama_laporan`, `nilai`) VALUES
('259c4e5075b3ae0783c681b283603c', 0, '10', 'acsh', '2024-05-30', 0x54756761735f506572736f6e615f4173726f66692e706466, 1, 'asj', NULL),
('27c2663a1a6106dd14d9697855a77d', 0, '597', 'sajkn\r\ndasbjnm', '2024-05-28', 0x4c616d706972616e5f6b6f64696e675f6d656d6f732e646f6378, 1, 'dqywghj', NULL),
('361315c505d16f1ac40cc1b214dcc7', 1, '001', 'deiwnkas', '2024-04-22', 0x3133333535353639373135343035353338332e6a7067, 1, 'shaj', NULL),
('47699fb91421d8f6aa343f6ab7247b', 0, '10', 'absjm', '2024-05-30', 0x57686174734170705f496d6167655f323032332d30322d30385f61745f32305f31315f33332e6a706567, 1, 'uhabhsj', NULL),
('681b6aaa58a57df607dad11eb455c1', 1, '6', 'whdjk\r\ndbjska\r\ndwxjknas\r\nwxjbkasm', '2024-05-07', 0x522e706e67, 1, 'Logbook Harian', NULL),
('7e36b00e13d9ff0aee3559f1b99e5c', 1, '6', 'sbwkj', '2024-05-13', 0x4e6f74696369612d322d312e6a7067, 1, 'wsh', NULL),
('8c9914a6dea3858d2862b83bb7f900', 0, '1', 'sdvj', '2024-05-28', 0x57686174734170705f496d6167655f323032322d31302d32375f61745f31365f30365f3532312e6a706567, 1, 'as', NULL),
('aded5d3a8c7999493b54c9623b9a95', 2, '6', 'dijsk\r\ncwsnkmc]\r\nckjbws,\r\nxkjsnm\r\nckjsmn', '2024-05-07', 0x57686174734170705f496d6167655f323032322d31302d32345f61745f31315f33315f34342e6a706567, 2, 'Logbook Bulanan', 90),
('b181b80657e7bb83722d1e99dbb525', 1, '001', 'eytfugkj\r\nredfijo\r\nroij\r\nsoiejflkmr\r\nsrooigj', '2024-04-18', 0x4261625f322e706466, 1, 'Logbook Harian', NULL),
('b831c7f5786f7794a66e067551b98b', 2, '6', 'fbkjdsm\r\ncknklnds\r\ncsk', '2024-05-13', 0x57686174734170705f496d6167655f323032322d31322d30345f61745f31385f32315f34342e6a706567, 1, 'dsjk', NULL),
('cd811dab5dc82aea74b9d6b625eb0b', 1, '001', 'dwkasm', '2024-04-22', 0x313333353535363937313534303535333833312e6a7067, 1, 'ehds', NULL),
('d4b6b9b2a43f5d5e70ede1b6751560', 1, '001', 'sytdcgvjhm ', '2024-04-22', 0x4173726f66695f3730313231303136395f50656d776562322e706466, 1, 'dtyhvj', NULL),
('e2cc35a99dd1b84e11f265a629f4af', 0, '10', 'Membersihkan halaman kantor', '2024-06-04', 0x44657361696e5f74616e70615f6a7564756c312e706e67, 1, 'Kebersihan', NULL),
('f715d95bbc3eec7a885ab19f8cbe15', 1, '001', 'dtfvhb', '2024-04-22', 0x3133333531313736353632373336373938382e6a7067, 1, 'vvjh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logbookbulanan`
--

CREATE TABLE `logbookbulanan` (
  `id_log` varchar(30) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `isi` text NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `file` blob NOT NULL,
  `id_status_log` int(12) NOT NULL,
  `nama_laporan` varchar(200) NOT NULL,
  `nilai` int(100) DEFAULT NULL,
  `verifikasi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbookbulanan`
--

INSERT INTO `logbookbulanan` (`id_log`, `id_user`, `isi`, `tgl_diajukan`, `file`, `id_status_log`, `nama_laporan`, `nilai`, `verifikasi`) VALUES
('0bf1141692229e3c134d57106218e7', '10', 'daj', '2024-05-30', 0x4f49505f2831292e6a706567, 2, 'auisdj', 80, NULL),
('230437aa66cfb7b07171e0385f8ce7', '597', 'ftyghj\r\nbbjkn\r\nkjbk', '2024-05-28', 0x57686174734170705f496d6167655f323032322d31302d32345f61745f31315f32355f3433312e6a706567, 1, 'tyfgh', NULL, NULL),
('3ed0c7d4464e3cd0ac4c8f9fa8f01e', '2', '12', '2024-05-30', 0x6876, 0, '1', NULL, NULL),
('578e476cf67f984b0dad8c2451408d', '10', 'cqekj\r\nfechj\r\naekfkjs', '2024-05-24', 0x57686174734170705f496d6167655f323032322d31312d30385f61745f30375f32305f3332312e6a706567, 2, 'ygujkas', 70, 'jelaskan lebih detail'),
('aa6f0df84b8a289ab1735fe2cbe41b', '2', '12', '2024-05-30', 0x6a7668, 0, '1', NULL, NULL),
('c71f97be6530290b14799d1f8c41ff', '10', 'dabj\r\ndak', '2024-05-28', 0x4b656c61735f434f494c5f616e746172615f4d53555f64616e5f55494e5f5354535f4a616d62695f6b656d62616c695f64696164616b616e5f7365636172615f5a6f6f6d5f756e74756b5f4d656d62616861735f50726f6a656b5f416b6869722e646f6378, 2, 'dajbks', 90, 'ok'),
('c9e2a7959b8518f13a6f5a1ada558e', '10', 'Membersihkan halaman kantorr', '2024-06-04', 0x57686174734170705f496d6167655f323032322d31322d30375f61745f31395f35385f33372e6a706567, 1, 'Kebersihan', NULL, NULL),
('d35f1f84a9abb1741f99d9ce2ba7c6', '2', '12', '2024-05-30', 0x6a6876, 0, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `dibaca` tinyint(1) NOT NULL DEFAULT 0,
  `tanggal_waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perbaikanbmn`
--

CREATE TABLE `perbaikanbmn` (
  `id_perbaikanbmn` varchar(50) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `spesifikasi_brg` varchar(100) NOT NULL,
  `lokasi_brg` varchar(256) NOT NULL,
  `kerusakan` text NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `id_status_perbaikanbmn` int(12) NOT NULL,
  `alasan_verifikasi` text DEFAULT NULL,
  `id_status_perbaikan` int(20) NOT NULL,
  `estimasi` varchar(100) DEFAULT NULL,
  `verifikasi_kaurrt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perbaikanbmn`
--

INSERT INTO `perbaikanbmn` (`id_perbaikanbmn`, `id_user`, `nama_brg`, `spesifikasi_brg`, `lokasi_brg`, `kerusakan`, `tgl_diajukan`, `id_status_perbaikanbmn`, `alasan_verifikasi`, `id_status_perbaikan`, `estimasi`, `verifikasi_kaurrt`) VALUES
('perbaikanbmn-02bf2', '6', 'AC', 'Panasinic', 'Ruang ppppn', 'jsd', '2024-05-31', 2, 'dsikh', 2, '5 hari', 'aiojdkm\r\nasnkd'),
('perbaikanbmn-0ad39', '594', 'iuswjdnm', 'auidhs', 'aujk', 'cayusj', '2024-05-29', 2, 'xas', 2, NULL, NULL),
('perbaikanbmn-11ccd', '49', 'dah', 'jnas', 'ajs', 'jsabk', '2024-05-29', 2, 'ok', 2, NULL, NULL),
('perbaikanbmn-128a9', '594', 'dtyh]k', 'xcg', 'cgh', 'gch', '2024-05-29', 2, 'sx', 2, NULL, NULL),
('perbaikanbmn-196e9', '10', 'AC', 'Panasonic', 'Ruang PE', 'tidak mau menyala', '2024-05-31', 2, 'y', 3, NULL, 'sabar'),
('perbaikanbmn-22cfa', '6', 'daiu', 'a', 'J', 'S', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-2d51f', '117e7d72393c00572998de701c28b057', 'tdyvhjbk', 'srxcghvjm ', 'rcvhbj', 'rsrdtyuj', '2024-03-20', 1, NULL, 3, NULL, NULL),
('perbaikanbmn-31b92', '594', 'dtyhvj', 'xcgh', 'cgh', 'gch', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-3afb5', '594', 'dqiuas', 'klndas', 'jdbkwa', 'vjads', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-40041', '6', 'ac', 'Panasoonic', 'Ruang PPNPN', 'AC tidak mau menyala', '2024-05-31', 2, 'skjd', 2, NULL, ''),
('perbaikanbmn-4cd7f', '6', 'kursi', 'kursi', 'kursi', 'kursi', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-5caf6', '394125b4dd6a990d44234aacb50d131a', 'iducxkjm', 'sucjxk', 'ihxzk', 'ijxzkm', '2024-03-19', 2, 'eyashzxkm,', 3, NULL, 'cuasjknmz'),
('perbaikanbmn-60256', '10', 'dqwvhb', 'dabhwj', 'dbkja', 'ahvdb', '2024-05-28', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-60d96', '4', 'ghb', 'cfgvbn', 'fgcvh', 'cfgfh', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-652ea', '594', 'easkj', 'kajs', 'j', 'askj', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-67d40', '50', 'adshj', 'jhds', 'asb', 'asjb', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-6a9e9', '6', 'ac', 'Panasonic', 'Ruang Penyuluh', 'AC tidak panas', '2024-05-30', 2, 'asd', 2, NULL, ''),
('perbaikanbmn-8a18d', '594', 'ftygbjkn', 'xcvhjbkn ,', 'fcgv', 'rdtfghbj', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-8cda8', '599', 'fgdh', 'srgch', 'sgf', 'fssg', '2024-05-28', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-8d917', '602', 'AC', 'Panasonic', 'Ruang Penyuluh', 'AC tidak hidup', '2024-05-31', 2, 'fthg', 2, NULL, NULL),
('perbaikanbmn-9aa3d', '394125b4dd6a990d44234aacb50d131a', 'AC', 'Panasonic', 'Ruang Penyuluh', 'tidak mau hidup', '2024-04-01', 2, 'iya', 4, NULL, NULL),
('perbaikanbmn-9b990', '6', 'AC', 'ac dinding', 'ruangan penyuluh', 'ga dingin', '2024-05-14', 2, 'ya', 3, NULL, 'y'),
('perbaikanbmn-a0dfa', '10', 'Mic', 'Y', 'Aula Agrostandar', 'tidak mau hidup', '2024-06-04', 2, 'ok', 3, '10 hari', '-'),
('perbaikanbmn-a21c3', '594', 'dtyh]', 'xcgh', 'cgh', 'gch', '2024-05-29', 3, 'i', 1, NULL, NULL),
('perbaikanbmn-a3a03', '594', 'meja2', 'meja', 'meja', 'meja', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-a49a4', '594', 'easkjfyhj', 'kajs', 'j', 'askj', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-aae1c', '394125b4dd6a990d44234aacb50d131a', 'dsgyzxuhjbn', 'gywuashknm', 'yguhjknm', 'ftgyuhbjknml', '2024-03-20', 2, 'duyfgkjb', 2, NULL, NULL),
('perbaikanbmn-b23ec', '6', 'lampu', 'semua lampu', 'ruang ppnpn', 'tidak mau hidup', '2024-05-14', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-b34e4', '594', 'dtyhv', 'xcgh', 'cgh', 'gch', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-b3ec9', '594', 'hdabs', 'xas', 'caksjzamcs', 'jks,x', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-bae53', '10', 'jkxas', 'aug', 'dih', 'jhas', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-c78a1', '4', 'jka', 'kajs', 'mands', 'ajd', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-d0175', '594', 'iuswjdnmdwjbsanm', 'auidhs', 'aujk', 'cayusj', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-d3f85', '594', 'mej', 'mej', 'mej', 'jajskn', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-d41d8', '', '', '', '', '', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-d43a6', '12', 'askj', 'aj', 's', 's', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-d5fb8', '594', 'meja', 'meja', 'meja', 'meja', '2024-05-29', 3, 'ftygubjh', 1, NULL, NULL),
('perbaikanbmn-e1287', '594', 'dtyh', 'xcgh', 'cgh', 'gch', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-e4191', '12', 'askbj', 'akdsj', 'adsn', 'asbm', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-e7827', '594', 'uhj', 'daj', 'asbkjd', 'dabj', '2024-05-29', 1, NULL, 1, NULL, NULL),
('perbaikanbmn-ff7f9', '394125b4dd6a990d44234aacb50d131a', 'AC', 'Panasonic', 'Ruang Kepegawaian', 'Kurang dingin', '2024-04-30', 2, 'wefsd', 2, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `status_cuti`
--

CREATE TABLE `status_cuti` (
  `id_status_cuti` int(11) NOT NULL,
  `status_cuti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_izin`
--

CREATE TABLE `status_izin` (
  `id_status_izin` int(11) NOT NULL,
  `status_izin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_izin`
--

INSERT INTO `status_izin` (`id_status_izin`, `status_izin`) VALUES
(1, 'Menunggu Konfirmasi'),
(2, 'Izin Cuti Diterima'),
(3, 'Izin Cuti Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `status_logbook`
--

CREATE TABLE `status_logbook` (
  `id_status_logbook` int(11) NOT NULL,
  `status_logbook` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_perbaikan`
--

CREATE TABLE `status_perbaikan` (
  `id_status_perbaikan` int(20) NOT NULL,
  `status_perbaikan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_perbaikan`
--

INSERT INTO `status_perbaikan` (`id_status_perbaikan`, `status_perbaikan`) VALUES
(1, 'Belum ada'),
(2, 'Menunggu teknisi'),
(3, 'Sedang dikerjakan'),
(4, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `status_perbaikanbmn`
--

CREATE TABLE `status_perbaikanbmn` (
  `id_status_perbaikanbmn` int(11) NOT NULL,
  `status_perbaikanbmn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_perbaikanbmn`
--

INSERT INTO `status_perbaikanbmn` (`id_status_perbaikanbmn`, `status_perbaikanbmn`) VALUES
(1, 'Menunggu Konfirmasi'),
(2, 'Pengajuan Diterima'),
(3, 'Pengajuan Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id_suratmasuk` varchar(50) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `sifat` varchar(50) NOT NULL,
  `indeks` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `id_status_surat` varchar(50) NOT NULL,
  `diteruskan` varchar(255) DEFAULT NULL,
  `isi_disposisi` varchar(255) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suratmasuk`
--

INSERT INTO `suratmasuk` (`id_suratmasuk`, `id_user`, `sifat`, `indeks`, `perihal`, `no_surat`, `asal_surat`, `tgl_surat`, `tgl_diterima`, `file`, `id_status_surat`, `diteruskan`, `isi_disposisi`, `catatan`) VALUES
('04ca4adbb836f68a7ae54b82658be2e2', '12', 'Biasa', '-', 'Narasumber', '02', 'UIN Jambi', '2024-06-12', '2024-06-21', 'MR_32.pdf', '1', NULL, NULL, NULL),
('77e2e830c5d5ed5c21cc5cb0d5a11712', '12', 'Biasa', '-', 'kunjungan ', '098', 'uin', '2024-05-21', '2024-05-30', 'MR_3.pdf', '2', 'Pj Fungsional/Pelaksana Kerjasama', 'Untuk Diketahui', 'Segera tidak lanjuti'),
('d0bc3b0b4d3d05dc147ae53424988653', '12', 'Biasa', '-', 'Narasumber', '01', 'Karatina', '2024-05-14', '2024-06-01', 'MR_31.pdf', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id` bigint(11) NOT NULL,
  `nosurat` varchar(50) NOT NULL,
  `tglsurat` date NOT NULL,
  `tglteri` date NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `file_surat` varchar(100) NOT NULL,
  `ditujukan` varchar(25) DEFAULT NULL,
  `ditujukan1` varchar(20) DEFAULT NULL,
  `ditujukan2` varchar(20) DEFAULT NULL,
  `ditujukan3` varchar(20) DEFAULT NULL,
  `ditujukan4` varchar(20) DEFAULT NULL,
  `balas` text DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `cat_kap` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `status_kap` int(11) NOT NULL DEFAULT 0,
  `stat` int(11) DEFAULT NULL,
  `stat_balas` int(11) NOT NULL DEFAULT 0,
  `track1` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tracking`
--

CREATE TABLE `tb_tracking` (
  `id` bigint(20) NOT NULL,
  `id_surat` bigint(20) DEFAULT NULL,
  `nosurat` varchar(50) NOT NULL,
  `track2` text DEFAULT NULL,
  `track3` text DEFAULT NULL,
  `track4` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `profile_picture` blob NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `id_jenis_kelamin` int(11) DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `masa_kerja` varchar(50) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL,
  `id_user_detail` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `divisi`, `id_user_level`, `profile_picture`, `nama_lengkap`, `id_jenis_kelamin`, `no_telp`, `nip`, `masa_kerja`, `jabatan`, `unit_kerja`, `id_user_detail`) VALUES
(1, 'lip', 'lip', 'lip', '', 7, '', 'lip', 1, '879', NULL, NULL, NULL, NULL, ''),
(4, 'admin', 'admin', 'admin@admin.com', '', 2, '', 'adjks', 1, 'akbsj', 'ams', 'ajks', 'akjas', 'nasd', '134e349e4f50a051d8ca3687d6a7de1a'),
(6, 'asrofi', 'asrofi', 'asrofi@gmail.com', '', 1, '', 'Asrofi', 1, '091324264098', '098765', '', 'Kepala DSIP', 'BPSIP Jambi', '394125b4dd6a990d44234aacb50d131a'),
(7, 'Ilham', 'ilham', 'ilham@gmail.com', '', 1, '', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'fbe1eea143ccd2f542487e251441c85a'),
(8, 'super_admin', 'super_admin', 'kepalabalai@gmail.com', '', 3, '', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'f5972fbf4ef53843c1e12c3ae99e5005'),
(9, 'ktu', 'ktu', 'ktu', '', 5, '', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'b322bacba3ce23249e3a5aeb01464cf6'),
(10, 'acok', 'acok', 'PPNPN', '', 7, '', 'Acok', 1, '828', '23y1y78', 'asjkn', 'jkads', 'ashkj', '80e125876fbe1b85f1b0b44dbe671d63'),
(11, 'ropi', 'ropi', 'ropi', '', 6, '', NULL, 1, NULL, NULL, NULL, NULL, NULL, '117e7d72393c00572998de701c28b057'),
(12, 'sekretariat', 'sekretariat', 'sekretariat', '', 6, '', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'b78f9102fe10f22cfea310826337ac80'),
(28, 'coba3', 'coba3', 'coba3', '', 6, '', NULL, 1, NULL, NULL, NULL, NULL, NULL, '28f5f10a839c14074993d03704cecfc3'),
(45, 'ggg', 'ggg', 'ggg', '', 7, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45dd9abbacf37b2049c446fc6186e27d'),
(48, 'cobaa', 'cobs', 'coba', '', 17, '', 'cob', 2, '2weq', NULL, NULL, NULL, NULL, '0f1f5d7fd0128706da75d915935e410f'),
(49, 'coba2', 'coba2', 'coba2', '', 2, '', 'coba2', 1, '7823', '127938', '2', '21', '21', '00a47c4838d72b29b1831be1a2612841'),
(50, 'kabal', 'kabal', 'kabal', '', 3, '', NULL, 1, NULL, NULL, NULL, NULL, NULL, 'a71443cdd0a021e214a5055fe3c4c8aa'),
(588, 'dul', 'dul', 'dul', '', 7, '', NULL, 1, NULL, NULL, NULL, NULL, NULL, '588edbb51e7d0743b64c9ed9415bc57a'),
(589, 'gyuh', 'gyuh', 'cjhds', '', 1, '', 'cjads', 1, 'casjb', NULL, NULL, NULL, NULL, ''),
(590, 'ropi', 'ropi', 'ropi@gmail.com', '', 1, '', 'ropi', 2, '154', NULL, NULL, NULL, NULL, ''),
(591, 'fahri', 'fahri', 'fahri', '', 9, '', 'fahri', 1, '29873', NULL, NULL, NULL, NULL, ''),
(592, 'fahridgfhvbn', 'fahridgfhvbn', 'fahridgfhvbn', '', 1, '', 'fahridgfhvbn', 1, 'fahridgfhvbn', NULL, NULL, NULL, NULL, ''),
(593, 'wqqw', 'qwwq', 'ascsa', '', 14, '', 's', 2, '21', NULL, NULL, NULL, NULL, ''),
(594, 'jjj', 'jjj', 'jjj', '', 1, '', 'jjj', 1, '132', '3ee', 'kjnamds', 'kjbadn', 'adjkn', ''),
(598, 'try', 'try', 'try', '', 7, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fbe8ca2f069f63a4d8e3d58d7638c8d0'),
(599, 'retdfghj', 'retdfghj', 'm', '', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f821db2e50ea1e689cfa9e0e7e8a37b4'),
(600, 'lll', 'lll', 'lll', '', 2, '', 'lll', 1, '87', NULL, NULL, NULL, NULL, ''),
(601, 'arsyad', 'arsyad', 'arsyad', '', 4, '', 'arsyad', 1, '81290', NULL, NULL, NULL, NULL, ''),
(602, 'alip', 'alip', 'alip', '', 7, '', 'alip', 1, '923', NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id_user_detail` varchar(256) NOT NULL,
  `profil` blob NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `id_jenis_kelamin` int(12) DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `masa_kerja` varchar(256) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `unit_kerja` varchar(256) DEFAULT NULL,
  `divisi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id_user_detail`, `profil`, `nama_lengkap`, `id_jenis_kelamin`, `no_telp`, `nip`, `masa_kerja`, `jabatan`, `unit_kerja`, `divisi`) VALUES
('00a47c4838d72b29b1831be1a2612841', '', 'coba2', 1, '098', NULL, NULL, NULL, NULL, NULL),
('096a3725a3cdd014c8bbe6913936684f', '', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL),
('0f1f5d7fd0128706da75d915935e410f', '', 'coba', 1, '098', NULL, NULL, NULL, NULL, NULL),
('117e7d72393c00572998de701c28b057', '', 'ropi', 1, '6789', NULL, NULL, NULL, NULL, ''),
('134e349e4f50a051d8ca3687d6a7de1a', '', NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('1fa8fa966597dca71039b51d1e5a4f43', '', 'alip', 1, '09', NULL, NULL, NULL, NULL, NULL),
('28f5f10a839c14074993d03704cecfc3', '', 'coba3', 1, '098', NULL, NULL, NULL, NULL, NULL),
('2d0323357f989f5f37f7ad36472987d5', '', 'Zaki Agus Saputra', 1, '089876765672', NULL, NULL, NULL, '', ''),
('394125b4dd6a990d44234aacb50d131a', '', 'Asrofi', 1, '081324264098', '09348092389', '2023', 'Kepala Diseminasi', 'BPSIP Jambi', ''),
('45dd9abbacf37b2049c446fc6186e27d', '', 'ggg', 1, '76', NULL, NULL, NULL, NULL, NULL),
('47bce5c74f589f4867dbd57e9ca9f808', '', 'a', 1, '09', NULL, NULL, NULL, NULL, NULL),
('588edbb51e7d0743b64c9ed9415bc57a', '', 'dul', 1, '000', NULL, NULL, NULL, NULL, NULL),
('70422f658342e9f6ad4b3be9debce4e7', '', 'Arsyad Sanusi', 1, '098', NULL, NULL, NULL, NULL, NULL),
('80e125876fbe1b85f1b0b44dbe671d63', '', 'Acok', 1, '0987', NULL, NULL, NULL, NULL, NULL),
('92554894f0d3c73f2357f4c2aa825703', '', '1', NULL, '1', NULL, NULL, NULL, NULL, NULL),
('98eb4077470a60a0fe0f7b9d01755557', '', NULL, 1, NULL, NULL, NULL, NULL, '', ''),
('a71443cdd0a021e214a5055fe3c4c8aa', '', 'kabal', 1, '098', NULL, NULL, NULL, NULL, NULL),
('b322bacba3ce23249e3a5aeb01464cf6', '', 'ktu', 1, '09', NULL, NULL, NULL, NULL, ''),
('b78f9102fe10f22cfea310826337ac80', '', 'sekretariat', 1, '098', NULL, NULL, NULL, NULL, ''),
('ceb97eff1f4bd4abd02c1d19bc75f8fa', '', 'melki1', 1, '098', NULL, NULL, NULL, NULL, NULL),
('dd658341e44d2b14e81e6515dc2e278f', '', 'asss', 1, '098', NULL, NULL, NULL, NULL, NULL),
('e812f2bdaa27f798a9842cb44ad1dc7c', '', 'hmmm', 1, '098', NULL, NULL, NULL, NULL, NULL),
('f5972fbf4ef53843c1e12c3ae99e5005', '', NULL, 0, NULL, NULL, NULL, NULL, '', ''),
('f821db2e50ea1e689cfa9e0e7e8a37b4', '', 'h', 1, '7', NULL, NULL, NULL, NULL, NULL),
('fbe1eea143ccd2f542487e251441c85a', '', 'M. Ilham', 0, '1', NULL, NULL, NULL, NULL, NULL),
('fbe8ca2f069f63a4d8e3d58d7638c8d0', '', 'try', 1, '38092', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'pegawai'),
(2, 'admin'),
(3, 'super admin'),
(4, 'kaurrt'),
(5, 'ktu'),
(6, 'sekretariat'),
(8, 'dsip'),
(9, 'jabatan bpsip'),
(10, 'kepegawaian'),
(11, 'keuangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `logbookbulanan`
--
ALTER TABLE `logbookbulanan`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `perbaikanbmn`
--
ALTER TABLE `perbaikanbmn`
  ADD PRIMARY KEY (`id_perbaikanbmn`);

--
-- Indexes for table `status_cuti`
--
ALTER TABLE `status_cuti`
  ADD PRIMARY KEY (`id_status_cuti`);

--
-- Indexes for table `status_izin`
--
ALTER TABLE `status_izin`
  ADD PRIMARY KEY (`id_status_izin`);

--
-- Indexes for table `status_logbook`
--
ALTER TABLE `status_logbook`
  ADD PRIMARY KEY (`id_status_logbook`);

--
-- Indexes for table `status_perbaikan`
--
ALTER TABLE `status_perbaikan`
  ADD PRIMARY KEY (`id_status_perbaikan`);

--
-- Indexes for table `status_perbaikanbmn`
--
ALTER TABLE `status_perbaikanbmn`
  ADD PRIMARY KEY (`id_status_perbaikanbmn`);

--
-- Indexes for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`);

--
-- Indexes for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tracking`
--
ALTER TABLE `tb_tracking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_surat` (`id_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id_user_detail`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_izin`
--
ALTER TABLE `status_izin`
  MODIFY `id_status_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tracking`
--
ALTER TABLE `tb_tracking`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=603;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
