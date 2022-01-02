-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jan 02, 2022 at 08:18 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdiskusi`
--

-- --------------------------------------------------------

--
-- Table structure for table `blokir`
--

CREATE TABLE `blokir` (
  `id_blokir` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statusku`
--

CREATE TABLE `statusku` (
  `id_status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `argumen` text NOT NULL,
  `sumber` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statusku`
--

INSERT INTO `statusku` (`id_status`, `id_user`, `argumen`, `sumber`) VALUES
(2, 14, 'Jadi gini, dalam membuat sebuah studi yang diperlakukan haknya maka dalam hal ini begini.', 'www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(250) NOT NULL,
  `nama_belakang` varchar(250) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_depan`, `nama_belakang`, `username`, `password`, `foto`) VALUES
(13, 'Lugas', 'Alhawariy', 'lugasdev', '$2y$10$B6AH1qvyQ9Yf1UBgrA3EX.u/U5kyJePF1D0E9He1moyhK9bVAmWyq', '61d15c5a7748d.jpeg'),
(14, 'Hatake', 'Kakashi', 'kakashi', '$2y$10$gTc9mxbDV1ixDJKz/wyxiOI1yIG8Pflm5wcY7hzmvbqqGlbcw2dmG', '61d15ca5ec75e.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blokir`
--
ALTER TABLE `blokir`
  ADD PRIMARY KEY (`id_blokir`);

--
-- Indexes for table `statusku`
--
ALTER TABLE `statusku`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blokir`
--
ALTER TABLE `blokir`
  MODIFY `id_blokir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statusku`
--
ALTER TABLE `statusku`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
