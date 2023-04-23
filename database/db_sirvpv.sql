-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2023 at 09:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sirvpv`
--

-- --------------------------------------------------------

--
-- Table structure for table `pv`
--

CREATE TABLE `pv` (
  `id_pv` int(11) NOT NULL,
  `pv_date` date NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pv_detail`
--

CREATE TABLE `pv_detail` (
  `id_pv_detail` int(11) NOT NULL,
  `id_pv` int(10) NOT NULL,
  `drcr` varchar(10) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `no_akun` varchar(100) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rv`
--

CREATE TABLE `rv` (
  `id_rv` int(11) NOT NULL,
  `rv_date` date NOT NULL,
  `deskripsi` text NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rv`
--

INSERT INTO `rv` (`id_rv`, `rv_date`, `deskripsi`, `id_user`) VALUES
(1, '2023-04-23', '<ul>\r\n	<li>Penerimaan Dana Pencairan</li>\r\n	<li>Penerimaan Dana Internal</li>\r\n</ul>\r\n', 1),
(2, '2023-04-24', '<ul>\r\n	<li>Penerimaan Dana 1</li>\r\n	<li>Penerimaan Dana 2</li>\r\n</ul>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rv_detail`
--

CREATE TABLE `rv_detail` (
  `id_rv_detail` int(11) NOT NULL,
  `id_rv` int(10) NOT NULL,
  `drcr` varchar(10) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `no_akun` varchar(100) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rv_detail`
--

INSERT INTO `rv_detail` (`id_rv_detail`, `id_rv`, `drcr`, `nama_akun`, `no_akun`, `jumlah`) VALUES
(1, 2, 'DR', 'Bank 1/11', '32143', 20000000),
(2, 2, 'DR', 'Kas 1/11', '123412', 2900000),
(3, 1, 'CR', 'Kas 1/12', '12345', 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role_id` int(10) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `email`, `password`, `image`, `role_id`, `date_created`, `is_active`) VALUES
(1, 'Neng Satira Syahril Wafa', 'admin', 'nengsatirasyahrilwafa@gmail.com', 'admin', 'default.jpg', 1, '2023-04-23', 1),
(2, 'Eka Anas Jatnika', 'anasberkata', 'ideanasdesain@gmail.com', 'Dean114119', 'default.jpg', 1, '2023-04-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id_role`, `role`) VALUES
(1, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pv`
--
ALTER TABLE `pv`
  ADD PRIMARY KEY (`id_pv`);

--
-- Indexes for table `pv_detail`
--
ALTER TABLE `pv_detail`
  ADD PRIMARY KEY (`id_pv_detail`);

--
-- Indexes for table `rv`
--
ALTER TABLE `rv`
  ADD PRIMARY KEY (`id_rv`);

--
-- Indexes for table `rv_detail`
--
ALTER TABLE `rv_detail`
  ADD PRIMARY KEY (`id_rv_detail`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pv`
--
ALTER TABLE `pv`
  MODIFY `id_pv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pv_detail`
--
ALTER TABLE `pv_detail`
  MODIFY `id_pv_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rv`
--
ALTER TABLE `rv`
  MODIFY `id_rv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rv_detail`
--
ALTER TABLE `rv_detail`
  MODIFY `id_rv_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
