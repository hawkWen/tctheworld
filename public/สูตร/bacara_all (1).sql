-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 10:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bacara_all`
--

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `credit` int(11) NOT NULL DEFAULT '0',
  `create_by` varchar(255) NOT NULL,
  `create_date` int(11) NOT NULL DEFAULT '0',
  `code_use` int(11) NOT NULL DEFAULT '0',
  `use_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fml_allbet`
--

CREATE TABLE `fml_allbet` (
  `id` int(11) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `idea` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fml_allbet`
--

INSERT INTO `fml_allbet` (`id`, `fm`, `an`, `idea`) VALUES
(3, 'BBBB', 'B', 1),
(4, 'BBBP', 'B', 1),
(5, 'BBPP', 'B', 1),
(6, 'BPPP', 'B', 1),
(7, 'PPPP', 'P', 1),
(8, 'PPPB', 'P', 1),
(9, 'PPBB', 'B', 1),
(10, 'PBBB', 'P', 1),
(11, 'BPBB', 'B', 1),
(12, 'BBPB', 'P', 1),
(13, 'BBPB', 'P', 1),
(14, 'BPBP', 'B', 1),
(15, 'PBPP', 'B', 1),
(16, 'PPBP', 'P', 1),
(17, 'PBBP', 'P', 1),
(18, 'PBPB', 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fml_asia`
--

CREATE TABLE `fml_asia` (
  `id` int(11) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `idea` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fml_asia`
--

INSERT INTO `fml_asia` (`id`, `fm`, `an`, `idea`) VALUES
(55, 'BPBB', 'B', 1),
(56, 'PBBB', 'B', 1),
(61, 'BBBP', 'B', 1),
(63, 'BPBP', 'P', 1),
(64, 'PBPP', 'B', 1),
(65, 'BPPB', 'P', 1),
(66, 'PPBP', 'P', 1),
(67, 'PBPP', 'B', 1),
(88, 'PPBB', 'B', 1),
(89, 'PPPP', 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fml_bggaming`
--

CREATE TABLE `fml_bggaming` (
  `id` int(11) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `idea` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fml_bggaming`
--

INSERT INTO `fml_bggaming` (`id`, `fm`, `an`, `idea`) VALUES
(55, 'BPBB', 'B', 1),
(56, 'PBBB', 'B', 1),
(59, 'BBBB', 'B', 1),
(61, 'BBBP', 'B', 1),
(63, 'BPBP', 'P', 1),
(64, 'PBPP', 'B', 1),
(65, 'BPPB', 'P', 1),
(66, 'PPBP', 'P', 1),
(67, 'PBPP', 'B', 1),
(88, 'PPBB', 'B', 1),
(89, 'PPPP', 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fml_dg`
--

CREATE TABLE `fml_dg` (
  `id` int(11) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `idea` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fml_dg`
--

INSERT INTO `fml_dg` (`id`, `fm`, `an`, `idea`) VALUES
(3, 'BBPBP', 'B', 1),
(4, 'BPBBB', 'B', 1),
(5, 'BPBBP', 'P', 1),
(6, 'BPBPB', 'P', 1),
(7, 'BPPBP', 'B', 1),
(8, 'BPPBB', 'B', 1),
(9, 'BPPPB', 'P', 1),
(10, 'BPPPP', 'P', 1),
(11, 'PBBBB', 'B', 1),
(12, 'PBBPB', 'P', 1),
(13, 'BPBBB', 'B', 1),
(14, 'PBPBP', 'B', 1),
(15, 'PBPPB', 'P', 1),
(16, 'PPPBP', 'B', 1),
(26, 'PPPBB', 'B', 1),
(28, 'BBBBB', 'B', 1),
(29, 'PBBBP', 'B', 1),
(30, 'PPBBB', 'P', 1),
(31, 'TTTTT', 'P', 1),
(32, 'BBPPP', 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fml_ebet`
--

CREATE TABLE `fml_ebet` (
  `id` int(11) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `idea` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fml_ebet`
--

INSERT INTO `fml_ebet` (`id`, `fm`, `an`, `idea`) VALUES
(55, 'BPBB', 'B', 1),
(56, 'PBBB', 'B', 1),
(59, 'BBBB', 'B', 1),
(61, 'BBBP', 'B', 1),
(62, 'BBPB', 'P', 1),
(63, 'BPBP', 'P', 1),
(64, 'PBPP', 'B', 1),
(65, 'BPPB', 'P', 1),
(66, 'PPBP', 'P', 1),
(67, 'PBPP', 'B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fml_gclub`
--

CREATE TABLE `fml_gclub` (
  `id` int(11) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `idea` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fml_gclub`
--

INSERT INTO `fml_gclub` (`id`, `fm`, `an`, `idea`) VALUES
(4, 'BBBP', 'B', 1),
(5, 'BBPP', 'B', 1),
(6, 'BPPP', 'B', 1),
(7, 'PPPP', 'P', 1),
(8, 'PPPB', 'P', 1),
(9, 'PPBB', 'B', 1),
(10, 'PBBB', 'P', 1),
(11, 'BPBB', 'B', 1),
(12, 'BBPB', 'P', 1),
(13, 'BBPB', 'P', 1),
(14, 'BPBP', 'B', 1),
(15, 'PBPP', 'B', 1),
(16, 'PPBP', 'P', 1),
(17, 'PBBP', 'P', 1),
(18, 'PBPB', 'P', 1),
(19, 'PPBB', 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fml_sagame`
--

CREATE TABLE `fml_sagame` (
  `id` int(11) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `idea` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fml_sagame`
--

INSERT INTO `fml_sagame` (`id`, `fm`, `an`, `idea`) VALUES
(55, 'BPBB', 'B', 1),
(56, 'PBBB', 'B', 1),
(59, 'BBBB', 'B', 1),
(61, 'BBBP', 'B', 1),
(63, 'BPBP', 'P', 1),
(64, 'PBPP', 'B', 1),
(65, 'BPPB', 'P', 1),
(66, 'PPBP', 'P', 1),
(67, 'PBPP', 'B', 1),
(88, 'PPBB', 'B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fml_sexy`
--

CREATE TABLE `fml_sexy` (
  `id` int(11) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `idea` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fml_sexy`
--

INSERT INTO `fml_sexy` (`id`, `fm`, `an`, `idea`) VALUES
(149, 'PPBB', 'P', 1),
(150, 'BPBP', 'B', 1),
(151, 'PBPB', 'P', 1),
(152, 'PPPB', 'P', 1),
(153, 'BPPB', 'P', 1),
(154, 'PBBP', 'B', 1),
(155, 'Bà¸ªà¸¹à¸•à¸£ 2à¸ªà¸¹à¸•à¸£ 3à¸ªà¸¹à¸•à¸£ 4', 'à¸œà¸¥à¸¥à¸±à¸žà¸—à¹Œ', 1),
(156, 'BPà¸ªà¸¹à¸•à¸£ 3à¸ªà¸¹à¸•à¸£ 4', 'à¸œà¸¥à¸¥à¸±à¸žà¸—à¹Œ', 1),
(157, 'à¸ªà¸¹à¸•à¸£ 2à¸ªà¸¹à¸•à¸£ 3à¸ªà¸¹à¸•à¸£ 4', 'à¸œà¸¥à¸¥à¸±à¸žà¸—à¹Œ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fml_venus`
--

CREATE TABLE `fml_venus` (
  `id` int(11) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `idea` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fml_venus`
--

INSERT INTO `fml_venus` (`id`, `fm`, `an`, `idea`) VALUES
(3, 'BBBB', 'B', 1),
(4, 'BBBP', 'B', 1),
(5, 'BBPP', 'B', 1),
(6, 'BPPP', 'B', 1),
(7, 'PPPP', 'P', 1),
(8, 'PPPB', 'P', 1),
(9, 'PPBB', 'B', 1),
(10, 'PBBB', 'P', 1),
(11, 'BPBB', 'B', 1),
(12, 'BBPB', 'P', 1),
(13, 'BBPB', 'P', 1),
(14, 'BPBP', 'B', 1),
(15, 'PBPP', 'B', 1),
(16, 'PPBP', 'P', 1),
(17, 'PBBP', 'P', 1),
(18, 'PBPB', 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fml_wm`
--

CREATE TABLE `fml_wm` (
  `id` int(11) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `idea` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fml_wm`
--

INSERT INTO `fml_wm` (`id`, `fm`, `an`, `idea`) VALUES
(3, 'BBPBP', 'B', 1),
(4, 'BPBBB', 'B', 1),
(5, 'BPBBP', 'P', 1),
(6, 'BPBPB', 'P', 1),
(7, 'BPPBP', 'B', 1),
(8, 'BPPBB', 'B', 1),
(9, 'BPPPB', 'P', 1),
(10, 'BPPPP', 'P', 1),
(11, 'PBBBB', 'B', 1),
(12, 'PBBPB', 'P', 1),
(13, 'BPBBB', 'B', 1),
(14, 'PBPBP', 'B', 1),
(15, 'PBPPB', 'P', 1),
(16, 'PPPBP', 'B', 1),
(26, 'PPPBB', 'B', 1),
(28, 'BBBBB', 'B', 1),
(29, 'PBBBP', 'B', 1),
(30, 'PPBBB', 'P', 1),
(31, 'TTTTT', 'P', 1),
(32, 'BBPPP', 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `idline` varchar(255) NOT NULL,
  `titleweb` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `background_headers` varchar(255) NOT NULL,
  `text_headers1` varchar(255) NOT NULL,
  `text_headers2` varchar(255) NOT NULL,
  `background_login` varchar(255) NOT NULL,
  `txtstatus_register` varchar(255) NOT NULL,
  `credit_register` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `idline`, `titleweb`, `logo`, `background_headers`, `text_headers1`, `text_headers2`, `background_login`, `txtstatus_register`, `credit_register`) VALUES
(1, 'Aditep2541', 'Hack Full Casino&Sport', 'https://www.img.in.th/images/f1ae3932a743acc9879aa43ccf19a247.png', 'https://www.img.in.th/images/f0dcb7c55e819fd9012b886bff7c8091.jpg', 'à¸ªà¸¹à¸•à¸£à¸šà¸²à¸„à¸²à¸£à¹ˆà¸² à¸ªà¸¥à¹Šà¸­à¸• à¸—à¸µà¹€à¸”à¹‡à¸”à¸šà¸­à¸¥', 'à¹‚à¸›à¸£à¹à¸à¸£à¸¡à¸ªà¸¹à¸•à¸£à¸”à¸µà¸—à¸µà¹ˆà¸ªà¸¸à¸”2021', 'https://www.img.in.th/images/ecee09f6e8f1f90cfada45a5b522b700.jpg', '1', 10);

-- --------------------------------------------------------

--
-- Table structure for table `statisctic_allbet`
--

CREATE TABLE `statisctic_allbet` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statisctic_asia`
--

CREATE TABLE `statisctic_asia` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statisctic_bggaming`
--

CREATE TABLE `statisctic_bggaming` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statisctic_dg`
--

CREATE TABLE `statisctic_dg` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statisctic_ebet`
--

CREATE TABLE `statisctic_ebet` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statisctic_gclub`
--

CREATE TABLE `statisctic_gclub` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statisctic_sagame`
--

CREATE TABLE `statisctic_sagame` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statisctic_sexy`
--

CREATE TABLE `statisctic_sexy` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statisctic_venus`
--

CREATE TABLE `statisctic_venus` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statisctic_wm`
--

CREATE TABLE `statisctic_wm` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `fm` varchar(255) NOT NULL,
  `an` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `genkey_login` varchar(255) NOT NULL DEFAULT '0',
  `credit` double(64,2) NOT NULL DEFAULT '0.00',
  `ip` varchar(255) NOT NULL,
  `reg` int(11) NOT NULL,
  `lobby` int(11) NOT NULL DEFAULT '0',
  `online` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL DEFAULT 'member',
  `line` varchar(255) NOT NULL DEFAULT 'null',
  `phone` varchar(255) NOT NULL DEFAULT 'null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `email`, `genkey_login`, `credit`, `ip`, `reg`, `lobby`, `online`, `rank`, `line`, `phone`) VALUES
(1, 'oilhackzone', 'oilhackzone', 'oilhackzone@oilhackzone', 'NvnCeRFBJw', 9999823.00, '', 0, 1, '0', 'admin', 'null', 'null'),
(2, 'admin', '123456', 'admin@admin', 'ThNoCPyATU', 100000.00, '', 0, 1, '0', 'admin', 'null', 'null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fml_allbet`
--
ALTER TABLE `fml_allbet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fml_asia`
--
ALTER TABLE `fml_asia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fml_bggaming`
--
ALTER TABLE `fml_bggaming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fml_dg`
--
ALTER TABLE `fml_dg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fml_ebet`
--
ALTER TABLE `fml_ebet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fml_gclub`
--
ALTER TABLE `fml_gclub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fml_sagame`
--
ALTER TABLE `fml_sagame`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fml_sexy`
--
ALTER TABLE `fml_sexy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fml_venus`
--
ALTER TABLE `fml_venus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fml_wm`
--
ALTER TABLE `fml_wm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statisctic_allbet`
--
ALTER TABLE `statisctic_allbet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statisctic_asia`
--
ALTER TABLE `statisctic_asia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statisctic_bggaming`
--
ALTER TABLE `statisctic_bggaming`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statisctic_dg`
--
ALTER TABLE `statisctic_dg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statisctic_ebet`
--
ALTER TABLE `statisctic_ebet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statisctic_gclub`
--
ALTER TABLE `statisctic_gclub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statisctic_sagame`
--
ALTER TABLE `statisctic_sagame`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statisctic_sexy`
--
ALTER TABLE `statisctic_sexy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statisctic_venus`
--
ALTER TABLE `statisctic_venus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statisctic_wm`
--
ALTER TABLE `statisctic_wm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fml_allbet`
--
ALTER TABLE `fml_allbet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fml_asia`
--
ALTER TABLE `fml_asia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `fml_bggaming`
--
ALTER TABLE `fml_bggaming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `fml_dg`
--
ALTER TABLE `fml_dg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `fml_ebet`
--
ALTER TABLE `fml_ebet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `fml_gclub`
--
ALTER TABLE `fml_gclub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `fml_sagame`
--
ALTER TABLE `fml_sagame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `fml_sexy`
--
ALTER TABLE `fml_sexy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `fml_venus`
--
ALTER TABLE `fml_venus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fml_wm`
--
ALTER TABLE `fml_wm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statisctic_allbet`
--
ALTER TABLE `statisctic_allbet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statisctic_asia`
--
ALTER TABLE `statisctic_asia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statisctic_bggaming`
--
ALTER TABLE `statisctic_bggaming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statisctic_dg`
--
ALTER TABLE `statisctic_dg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statisctic_ebet`
--
ALTER TABLE `statisctic_ebet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statisctic_gclub`
--
ALTER TABLE `statisctic_gclub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statisctic_sagame`
--
ALTER TABLE `statisctic_sagame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statisctic_sexy`
--
ALTER TABLE `statisctic_sexy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statisctic_venus`
--
ALTER TABLE `statisctic_venus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statisctic_wm`
--
ALTER TABLE `statisctic_wm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
