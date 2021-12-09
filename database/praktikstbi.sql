-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 07:35 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktikstbi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbberita`
--

CREATE TABLE `tbberita` (
  `Id` int(11) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Berita` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbberita`
--

INSERT INTO `tbberita` (`Id`, `Judul`, `Berita`) VALUES
(1, 'CR9 Bikin Mourinho Tak Sabar ke Madrid', 'Yang spesial dari rencana kepindahan Jose Mourinho ke Real Madrid adalah pertemuan dia dengan Cristiano Ronaldo. Mengaku tak sabar bertemu rekan senegaranya itu, Mourinho juga berharap banyak gol dari CR9. '),
(2, 'Jepang Mau Sampai Semifinal', 'Kalah atas Korea Selatan tak membuat kepercayaan diri Jepang menyusut. Pelatih \'Samurai Biru\', Takeshi Okada, malah memasang target tinggi dengan menembus babak semifinal. '),
(3, 'Simpati Milito untuk Cambiasso & Zanetti', 'Diego Milito mengungkapkan rasa simpatinya kepada rekannya di Inter Milan. Meski sama-sama meraih treble di Inter namun Esteban Cambiasso dan Javier Zanetti tak masuk skuad Argentina. '),
(4, 'Neville Belum Berencana Pensiun', 'Gary Neville bersikukuh belum mau pensiun dari timnas Inggris. Meskipun sudah jarang dipanggil memperkuat The Three Lions, bek 35 tahun ini mengaku siap bermain saat negerinya membutuhkan jasanya'),
(5, 'Lawan Meksiko, Capello Banyak Belajar', 'Inggris tampil meyakinkan saat mengalahkan Meksiko 3-1. Namun manajer Inggris Fabio Capello mengaku bahwa mendapatkan banyak pelajaran dalam laga ujicoba tersebut.'),
(6, 'Maradona Hapus Kekhawatiran', 'Tanpa diperkuat beberapa bintang besarnya, Argentina sukses menghajar Kanada dengan skor telak 5-0. Atas hasil tersebut Diego Maradona yakin kalau publik negaranya bakal berhenti khawatir.'),
(7, ' Giuseppe Meazza Tak Tidur ', 'Sebuah malam bersejarah telah diraih Inter Milan, ketika mereka kembali menjadi juara Eropa untuk kali pertama dalam 45 tahun. Puluhan ribu tifosinya pun tidak mau melewatkan malam besar itu. '),
(8, 'Cambiasso: Selamat Jalan, Mourinho', 'Rumor hijrahnya Jose Mourinho dari Inter Milan ke Real Madrid sudah kian santer. Esteban Cambiasso pun memberi pernyataan yang secara tak langsung seperti membenarkan spekulasi yang ada.'),
(9, 'Seandainya Ribery Bisa Tampil', 'Franck Ribery terpaksa hanya menonton laga final Liga Champions dari bangku cadangan. Akibatnya, strategi yang dijalankan Bayern Muenchen tidak sesuai yang diharapkan sehingga mereka menelan kekalahan. '),
(10, 'Sneijder: Semua karena Mourinho', 'Trofi pertama Liga Champions sejak 45 tahun silam berhasil diraih oleh skuad terkini Inter Milan. Sukses itu boleh disebabkan oleh banyak hal, tapi sosok Jose Mourinho-lah yang dinilai sebagai aspek terpenting.'),
(11, 'Reina: Torres Bertahan di Anfield', 'Spekulasi masa depan Fernando Torres di Liverpool masih terus menghangat. Namun kiper Pepe Reina yakin rekan senegaranya tersebut akan tetap bertahan di Anfield musim depan. '),
(12, 'Liverpool Buruk karena Dana Minim', 'Musim 2009/2010 boleh disebut sebagai musim paling buruk yang pernah dialami Liverpool. Manajer Rafael Benitez \"mendakwa\" faktor minimnya dana sebagai penyebabnya. '),
(13, 'Fergie: Hargreaves Harus Berani', 'Owen Hargreaves mengalami krisis kepercayaan diri pasca comeback dari cedera panjang. Sir Alex Ferguson menyarankan anak buahnya itu harus memiliki mental baja agar bisa kembali ke permainan terbaiknya. '),
(14, 'Blackpool Raih Tiket Terakhir Premier League', 'Setelah menanti hampir selama empat dasawarsa, Blackpool kembali ke top-flight usai mengalahkan Cardiff di laga playoff penentuan tiket promosi ke Premier League. '),
(15, 'West Ham Bidik Henry', 'Nasib Thierry Henry di Barcelona menjadi tak pasti sejak jawara Spanyol itu mendatangkan David Villa. West Ham United melihat peluang itu dan mencoba menggaetnya. '),
(16, ' \'Liverpool Tetap Kompetitif!\'', 'Rafael Benitez kembali mengungkapkan pembelaan terhadap dirinya, yang dituding gagal memberikan prestasi bagi Liverpool. Manajer Spanyol itu mengatakan Si Merah tetap kompetitif. Buktinya?');

-- --------------------------------------------------------

--
-- Table structure for table `tbcache`
--

CREATE TABLE `tbcache` (
  `Id` int(11) NOT NULL,
  `Query` varchar(100) NOT NULL,
  `DocId` int(11) NOT NULL,
  `Value` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcache`
--

INSERT INTO `tbcache` (`Id`, `Query`, `DocId`, `Value`) VALUES
(1, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(2, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(3, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(4, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(5, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(6, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(7, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(8, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(9, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(10, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(11, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(12, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(13, 'SELECT Count(*) as n FROM tbvektor', 0, 0),
(14, 'SELECT Count(*) as n FROM tbvektor', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbindex`
--

CREATE TABLE `tbindex` (
  `Id` int(11) NOT NULL,
  `Term` varchar(30) NOT NULL,
  `DocId` int(11) NOT NULL,
  `Count` int(11) NOT NULL,
  `Bobot` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbindex`
--

INSERT INTO `tbindex` (`Id`, `Term`, `DocId`, `Count`, `Bobot`) VALUES
(1, 'spesial', 1, 1, 0),
(2, 'rencana', 1, 1, 0),
(3, 'pindahan', 1, 1, 0),
(4, 'jose', 1, 1, 0),
(5, 'mourinho', 1, 2, 0),
(6, 'real', 1, 1, 0),
(7, 'madrid', 1, 1, 0),
(8, 'temu', 1, 2, 0),
(9, 'cristiano', 1, 1, 0),
(10, 'ronaldo', 1, 1, 0),
(11, 'mengaku', 1, 1, 0),
(12, 'tak', 1, 1, 0),
(13, 'sabar', 1, 1, 0),
(14, 'rekan', 1, 1, 0),
(15, 'senegaranya', 1, 1, 0),
(16, 'berharap', 1, 1, 0),
(17, 'banyak', 1, 1, 0),
(18, 'gol', 1, 1, 0),
(19, 'cr9', 1, 1, 0),
(20, 'kalah', 2, 1, 0),
(21, 'atas', 2, 1, 0),
(22, 'korea', 2, 1, 0),
(23, 'selatan', 2, 1, 0),
(24, 'tak', 2, 1, 0),
(25, 'membuat', 2, 1, 0),
(26, 'percayaan', 2, 1, 0),
(27, 'diri', 2, 1, 0),
(28, 'jepang', 2, 1, 0),
(29, 'menyusut', 2, 1, 0),
(30, 'pelatih', 2, 1, 0),
(31, 'samurai', 2, 1, 0),
(32, 'biru', 2, 1, 0),
(33, 'tashi', 2, 1, 0),
(34, 'okada', 2, 1, 0),
(35, 'malah', 2, 1, 0),
(36, 'memasang', 2, 1, 0),
(37, 'target', 2, 1, 0),
(38, 'tinggi', 2, 1, 0),
(39, 'menembus', 2, 1, 0),
(40, 'babak', 2, 1, 0),
(41, 'semifinal', 2, 1, 0),
(42, 'diego', 3, 1, 0),
(43, 'milito', 3, 1, 0),
(44, 'mengungkapkan', 3, 1, 0),
(45, 'rasa', 3, 1, 0),
(46, 'simpatinya', 3, 1, 0),
(47, 'rekannya', 3, 1, 0),
(48, 'di', 3, 2, 0),
(49, 'inter', 3, 2, 0),
(50, 'milan', 3, 1, 0),
(51, 'meski', 3, 1, 0),
(52, 'sama', 3, 2, 0),
(53, 'meraih', 3, 1, 0),
(54, 'treble', 3, 1, 0),
(55, 'namun', 3, 1, 0),
(56, 'esteban', 3, 1, 0),
(57, 'cambiasso', 3, 1, 0),
(58, 'javier', 3, 1, 0),
(59, 'zanetti', 3, 1, 0),
(60, 'tak', 3, 1, 0),
(61, 'masuk', 3, 1, 0),
(62, 'skuad', 3, 1, 0),
(63, 'argentina', 3, 1, 0),
(64, 'gary', 4, 1, 0),
(65, 'neville', 4, 1, 0),
(66, 'bersikukuh', 4, 1, 0),
(67, 'belum', 4, 1, 0),
(68, 'mau', 4, 1, 0),
(69, 'pensiun', 4, 1, 0),
(70, 'timnas', 4, 1, 0),
(71, 'inggris', 4, 1, 0),
(72, 'meskipun', 4, 1, 0),
(73, 'sudah', 4, 1, 0),
(74, 'jarang', 4, 1, 0),
(75, 'dipanggil', 4, 1, 0),
(76, 'memperkuat', 4, 1, 0),
(77, 'the', 4, 1, 0),
(78, 'three', 4, 1, 0),
(79, 'lions', 4, 1, 0),
(80, 'bek', 4, 1, 0),
(81, '35', 4, 1, 0),
(82, 'tahun', 4, 1, 0),
(83, 'mengaku', 4, 1, 0),
(84, 'siap', 4, 1, 0),
(85, 'bermain', 4, 1, 0),
(86, 'saat', 4, 1, 0),
(87, 'negerinya', 4, 1, 0),
(88, 'membutuhkan', 4, 1, 0),
(89, 'jasanya', 4, 1, 0),
(90, 'inggris', 5, 2, 0),
(91, 'tampil', 5, 1, 0),
(92, 'meyakinkan', 5, 1, 0),
(93, 'saat', 5, 1, 0),
(94, 'mengalahkan', 5, 1, 0),
(95, 'meksiko', 5, 1, 0),
(96, '3', 5, 1, 0),
(97, '1', 5, 1, 0),
(98, 'namun', 5, 1, 0),
(99, 'manajer', 5, 1, 0),
(100, 'fabio', 5, 1, 0),
(101, 'capello', 5, 1, 0),
(102, 'mengaku', 5, 1, 0),
(103, 'bahwa', 5, 1, 0),
(104, 'mendapatkan', 5, 1, 0),
(105, 'banyak', 5, 1, 0),
(106, 'pelajaran', 5, 1, 0),
(107, 'dalam', 5, 1, 0),
(108, 'laga', 5, 1, 0),
(109, 'ujicoba', 5, 1, 0),
(110, 'tanpa', 6, 1, 0),
(111, 'diperkuat', 6, 1, 0),
(112, 'beberapa', 6, 1, 0),
(113, 'bintang', 6, 1, 0),
(114, 'besarnya', 6, 1, 0),
(115, 'argentina', 6, 1, 0),
(116, 'sukses', 6, 1, 0),
(117, 'menghajar', 6, 1, 0),
(118, 'kanada', 6, 1, 0),
(119, 'skor', 6, 1, 0),
(120, 'telak', 6, 1, 0),
(121, '5', 6, 1, 0),
(122, '0', 6, 1, 0),
(123, 'atas', 6, 1, 0),
(124, 'hasil', 6, 1, 0),
(125, 'diego', 6, 1, 0),
(126, 'maradona', 6, 1, 0),
(127, 'yakin', 6, 1, 0),
(128, 'kalau', 6, 1, 0),
(129, 'publik', 6, 1, 0),
(130, 'negaranya', 6, 1, 0),
(131, 'bakal', 6, 1, 0),
(132, 'berhenti', 6, 1, 0),
(133, 'khawatir', 6, 1, 0),
(134, 'sebuah', 7, 1, 0),
(135, 'malam', 7, 2, 0),
(136, 'bersejarah', 7, 1, 0),
(137, 'telah', 7, 1, 0),
(138, 'diraih', 7, 1, 0),
(139, 'inter', 7, 1, 0),
(140, 'milan', 7, 1, 0),
(141, 'tika', 7, 1, 0),
(142, 'mereka', 7, 1, 0),
(143, 'mbali', 7, 1, 0),
(144, 'menjadi', 7, 1, 0),
(145, 'juara', 7, 1, 0),
(146, 'eropa', 7, 1, 0),
(147, 'untuk', 7, 1, 0),
(148, 'kali', 7, 1, 0),
(149, 'pertama', 7, 1, 0),
(150, 'dalam', 7, 1, 0),
(151, '45', 7, 1, 0),
(152, 'tahun', 7, 1, 0),
(153, 'puluhan', 7, 1, 0),
(154, 'ribu', 7, 1, 0),
(155, 'tifosinya', 7, 1, 0),
(156, 'pun', 7, 1, 0),
(157, 'tidak', 7, 1, 0),
(158, 'mau', 7, 1, 0),
(159, 'melewatkan', 7, 1, 0),
(160, 'besar', 7, 1, 0),
(161, 'rumor', 8, 1, 0),
(162, 'hijrahnya', 8, 1, 0),
(163, 'jose', 8, 1, 0),
(164, 'mourinho', 8, 1, 0),
(165, 'inter', 8, 1, 0),
(166, 'milan', 8, 1, 0),
(167, 'real', 8, 1, 0),
(168, 'madrid', 8, 1, 0),
(169, 'sudah', 8, 1, 0),
(170, 'kian', 8, 1, 0),
(171, 'santer', 8, 1, 0),
(172, 'esteban', 8, 1, 0),
(173, 'cambiasso', 8, 1, 0),
(174, 'pun', 8, 1, 0),
(175, 'memberi', 8, 1, 0),
(176, 'pernyataan', 8, 1, 0),
(177, 'secara', 8, 1, 0),
(178, 'tak', 8, 1, 0),
(179, 'langsung', 8, 1, 0),
(180, 'seperti', 8, 1, 0),
(181, 'membenarkan', 8, 1, 0),
(182, 'spekulasi', 8, 1, 0),
(183, 'ada', 8, 1, 0),
(184, 'franck', 9, 1, 0),
(185, 'ribery', 9, 1, 0),
(186, 'terpaksa', 9, 1, 0),
(187, 'hanya', 9, 1, 0),
(188, 'menonton', 9, 1, 0),
(189, 'laga', 9, 1, 0),
(190, 'final', 9, 1, 0),
(191, 'liga', 9, 1, 0),
(192, 'champions', 9, 1, 0),
(193, 'bangku', 9, 1, 0),
(194, 'cagan', 9, 1, 0),
(195, 'akibatnya', 9, 1, 0),
(196, 'strategi', 9, 1, 0),
(197, 'dijalankan', 9, 1, 0),
(198, 'bayern', 9, 1, 0),
(199, 'muenchen', 9, 1, 0),
(200, 'tidak', 9, 1, 0),
(201, 'sesuai', 9, 1, 0),
(202, 'diharapkan', 9, 1, 0),
(203, 'sehingga', 9, 1, 0),
(204, 'mereka', 9, 1, 0),
(205, 'menelan', 9, 1, 0),
(206, 'kalahan', 9, 1, 0),
(207, 'trofi', 10, 1, 0),
(208, 'pertama', 10, 1, 0),
(209, 'liga', 10, 1, 0),
(210, 'champions', 10, 1, 0),
(211, 'sejak', 10, 1, 0),
(212, '45', 10, 1, 0),
(213, 'tahun', 10, 1, 0),
(214, 'silam', 10, 1, 0),
(215, 'berhasil', 10, 1, 0),
(216, 'diraih', 10, 1, 0),
(217, 'oleh', 10, 2, 0),
(218, 'skuad', 10, 1, 0),
(219, 'terk', 10, 1, 0),
(220, 'inter', 10, 1, 0),
(221, 'milan', 10, 1, 0),
(222, 'sukses', 10, 1, 0),
(223, 'boleh', 10, 1, 0),
(224, 'disebabkan', 10, 1, 0),
(225, 'banyak', 10, 1, 0),
(226, 'hal', 10, 1, 0),
(227, 'tapi', 10, 1, 0),
(228, 'sosok', 10, 1, 0),
(229, 'jose', 10, 1, 0),
(230, 'mourinho', 10, 1, 0),
(231, 'lah', 10, 1, 0),
(232, 'dlai', 10, 1, 0),
(233, 'sebagai', 10, 1, 0),
(234, 'aspek', 10, 1, 0),
(235, 'terpenting', 10, 1, 0),
(236, 'spekulasi', 11, 1, 0),
(237, 'masa', 11, 1, 0),
(238, 'depan', 11, 2, 0),
(239, 'fernando', 11, 1, 0),
(240, 'torres', 11, 1, 0),
(241, 'di', 11, 2, 0),
(242, 'liverpool', 11, 1, 0),
(243, 'masih', 11, 1, 0),
(244, 'terus', 11, 1, 0),
(245, 'menghangat', 11, 1, 0),
(246, 'namun', 11, 1, 0),
(247, 'kiper', 11, 1, 0),
(248, 'pepe', 11, 1, 0),
(249, 'reina', 11, 1, 0),
(250, 'yakin', 11, 1, 0),
(251, 'rekan', 11, 1, 0),
(252, 'senegaranya', 11, 1, 0),
(253, 'akan', 11, 1, 0),
(254, 'tetap', 11, 1, 0),
(255, 'bertahan', 11, 1, 0),
(256, 'anfield', 11, 1, 0),
(257, 'musim', 11, 1, 0),
(258, 'musim', 12, 2, 0),
(259, '2009', 12, 1, 0),
(260, '2010', 12, 1, 0),
(261, 'boleh', 12, 1, 0),
(262, 'disebut', 12, 1, 0),
(263, 'sebagai', 12, 2, 0),
(264, 'paling', 12, 1, 0),
(265, 'buruk', 12, 1, 0),
(266, 'pernah', 12, 1, 0),
(267, 'lami', 12, 1, 0),
(268, 'liverpool', 12, 1, 0),
(269, 'manajer', 12, 1, 0),
(270, 'rafael', 12, 1, 0),
(271, 'benitez', 12, 1, 0),
(272, 'mendakwa', 12, 1, 0),
(273, 'faktor', 12, 1, 0),
(274, 'mmnya', 12, 1, 0),
(275, 'a', 12, 1, 0),
(276, 'penyebabnya', 12, 1, 0),
(277, 'owen', 13, 1, 0),
(278, 'hargreaves', 13, 1, 0),
(279, 'mengalami', 13, 1, 0),
(280, 'krisis', 13, 1, 0),
(281, 'percayaan', 13, 1, 0),
(282, 'diri', 13, 1, 0),
(283, 'pasca', 13, 1, 0),
(284, 'comeback', 13, 1, 0),
(285, 'cedera', 13, 1, 0),
(286, 'panjang', 13, 1, 0),
(287, 'sir', 13, 1, 0),
(288, 'alex', 13, 1, 0),
(289, 'ferguson', 13, 1, 0),
(290, 'menyarankan', 13, 1, 0),
(291, 'anak', 13, 1, 0),
(292, 'buahnya', 13, 1, 0),
(293, 'harus', 13, 1, 0),
(294, 'memiliki', 13, 1, 0),
(295, 'mental', 13, 1, 0),
(296, 'baja', 13, 1, 0),
(297, 'agar', 13, 1, 0),
(298, 'bisa', 13, 1, 0),
(299, 'mbali', 13, 1, 0),
(300, 'permainan', 13, 1, 0),
(301, 'terbaiknya', 13, 1, 0),
(302, 'setelah', 14, 1, 0),
(303, 'menanti', 14, 1, 0),
(304, 'hampir', 14, 1, 0),
(305, 'selama', 14, 1, 0),
(306, 'empat', 14, 1, 0),
(307, 'dasawarsa', 14, 1, 0),
(308, 'blackpool', 14, 1, 0),
(309, 'mbali', 14, 1, 0),
(310, 'top', 14, 1, 0),
(311, 'flight', 14, 1, 0),
(312, 'usai', 14, 1, 0),
(313, 'mengalahkan', 14, 1, 0),
(314, 'cardiff', 14, 1, 0),
(315, 'di', 14, 1, 0),
(316, 'laga', 14, 1, 0),
(317, 'playoff', 14, 1, 0),
(318, 'penentuan', 14, 1, 0),
(319, 'tit', 14, 1, 0),
(320, 'promosi', 14, 1, 0),
(321, 'premier', 14, 1, 0),
(322, 'league', 14, 1, 0),
(323, 'nasib', 15, 1, 0),
(324, 'thierry', 15, 1, 0),
(325, 'henry', 15, 1, 0),
(326, 'di', 15, 1, 0),
(327, 'barcelona', 15, 1, 0),
(328, 'menjadi', 15, 1, 0),
(329, 'tak', 15, 1, 0),
(330, 'pasti', 15, 1, 0),
(331, 'sejak', 15, 1, 0),
(332, 'jawara', 15, 1, 0),
(333, 'spanyol', 15, 1, 0),
(334, 'mendatangkan', 15, 1, 0),
(335, 'david', 15, 1, 0),
(336, 'villa', 15, 1, 0),
(337, 'west', 15, 1, 0),
(338, 'ham', 15, 1, 0),
(339, 'united', 15, 1, 0),
(340, 'melihat', 15, 1, 0),
(341, 'peluang', 15, 1, 0),
(342, 'mencoba', 15, 1, 0),
(343, 'menggaetnya', 15, 1, 0),
(344, 'rafael', 16, 1, 0),
(345, 'benitez', 16, 1, 0),
(346, 'mbali', 16, 1, 0),
(347, 'mengungkapkan', 16, 1, 0),
(348, 'pembelaan', 16, 1, 0),
(349, 'terhadap', 16, 1, 0),
(350, 'dirinya', 16, 1, 0),
(351, 'dding', 16, 1, 0),
(352, 'gagal', 16, 1, 0),
(353, 'memberikan', 16, 1, 0),
(354, 'prestasi', 16, 1, 0),
(355, 'bagi', 16, 1, 0),
(356, 'liverpool', 16, 1, 0),
(357, 'manajer', 16, 1, 0),
(358, 'spanyol', 16, 1, 0),
(359, 'mengatakan', 16, 1, 0),
(360, 'si', 16, 1, 0),
(361, 'merah', 16, 1, 0),
(362, 'tetap', 16, 1, 0),
(363, 'kompetitif', 16, 1, 0),
(364, 'buktinya', 16, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbstem`
--

CREATE TABLE `tbstem` (
  `Id` int(11) NOT NULL,
  `Term` varchar(30) NOT NULL,
  `Stem` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbstem`
--

INSERT INTO `tbstem` (`Id`, `Term`, `Stem`) VALUES
(1, 'pertemuan', 'temu'),
(2, 'bertemu', 'temu');

-- --------------------------------------------------------

--
-- Table structure for table `tbvektor`
--

CREATE TABLE `tbvektor` (
  `DocId` int(11) NOT NULL,
  `Panjang` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbvektor`
--

INSERT INTO `tbvektor` (`DocId`, `Panjang`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbberita`
--
ALTER TABLE `tbberita`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbcache`
--
ALTER TABLE `tbcache`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbindex`
--
ALTER TABLE `tbindex`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbstem`
--
ALTER TABLE `tbstem`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbvektor`
--
ALTER TABLE `tbvektor`
  ADD PRIMARY KEY (`DocId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbberita`
--
ALTER TABLE `tbberita`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbcache`
--
ALTER TABLE `tbcache`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbindex`
--
ALTER TABLE `tbindex`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT for table `tbstem`
--
ALTER TABLE `tbstem`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
