-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 02:36 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id_biodata` bigint(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nisn` bigint(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` bigint(20) NOT NULL,
  `sekolah_asal` varchar(255) NOT NULL,
  `id_ktm` bigint(20) DEFAULT NULL,
  `id_jurusan1` bigint(20) NOT NULL,
  `id_jurusan2` bigint(20) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id_biodata`, `foto`, `nisn`, `nama_lengkap`, `jenis_kelamin`, `tgl_lahir`, `tempat_lahir`, `alamat`, `telepon`, `sekolah_asal`, `id_ktm`, `id_jurusan1`, `id_jurusan2`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'CtQ45f.png', 22342342, 'ucup suherman', 'laki-laki', '2021-03-31', 'Bangkalan', 'jl khmoh cholil III e', 8234334534, 'mts al maarif', 1, 1, 2, 2, '2021-04-30 15:31:54', '2021-05-01 04:16:15'),
(3, 'R7r6H1.jpg', 534365, 'ahmad fasih', 'laki-laki', '2021-03-30', 'Bangkalan', 'jl khmoh cholil III e', 83234243, 'mts al maarif', 1, 1, 4, 4, '2021-05-01 16:47:01', NULL),
(11, '7a596a413661e36036c839314f0314c0.png', 23423234, 'asdasdas', 'laki-laki', '2021-05-12', 'Bangkalan', 'werwerwew', 34534534, 'sdfsdfsdf', 1, 1, 2, 5, '2021-05-18 17:22:52', '2021-05-19 14:43:49'),
(20, '4c62dbeac0fd07a064618c6111e43dac.png', 123123123, 'asdasdas', 'laki-laki', '2021-05-03', 'asdasdasdas', '3242423', 324234234, 'sadsdasdasd', 1, 2, 1, 5, '2021-05-19 10:18:35', NULL),
(22, '0fc04917d8385082415a0c9623ab7130.png', 23423234, 'mahmud', 'laki-laki', '2021-05-03', 'kajjen', 'jl kajjen ', 1253453453, 'smpn 2 kajjen timur', 1, 1, 2, 5, '2021-05-19 14:48:57', NULL),
(23, 'ed553a5bd75f63eeccfef0572a30a4f2.png', 6645343, 'kuncup', 'laki-laki', '2021-05-03', 'sungapura', 'jl singa pura pura', 8643534534, 'smp singapura 1', 1, 2, 3, 5, '2021-05-19 14:50:05', '2021-05-19 14:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` bigint(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `kuota` bigint(20) NOT NULL,
  `rata_rata` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `kuota`, `rata_rata`) VALUES
(1, 'Rekayasa Perangkat Lunak', 40, 81),
(2, 'teknik Komputer Jaringan', 40, 81),
(3, 'teknik sepeda motor', 50, 75),
(4, 'kimia industril', 40, 80);

-- --------------------------------------------------------

--
-- Table structure for table `ktm`
--

CREATE TABLE `ktm` (
  `id_ktm` bigint(11) NOT NULL,
  `nama_ktm` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ktm`
--

INSERT INTO `ktm` (`id_ktm`, `nama_ktm`, `keterangan`) VALUES
(1, 'KIP', 'kartu indonesia pintar'),
(2, 'tidak ada', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `keterangan`) VALUES
(1, 'Admin', 'full access'),
(2, 'User', '');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` bigint(20) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `keterangan`) VALUES
(1, 'Matematika', ''),
(2, 'BHS inggris', ''),
(3, 'Bhs indonesia', ''),
(4, 'Pendidikan Agama', ''),
(5, 'PPKN', 'pendidikan kewarag negaraan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `raport`
--

CREATE TABLE `raport` (
  `id_raport` bigint(20) NOT NULL,
  `id_mapel` bigint(20) NOT NULL,
  `semester1` bigint(20) NOT NULL,
  `semester2` bigint(20) NOT NULL,
  `semester3` bigint(20) NOT NULL,
  `semester4` bigint(20) NOT NULL,
  `semester5` bigint(20) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raport`
--

INSERT INTO `raport` (`id_raport`, `id_mapel`, `semester1`, `semester2`, `semester3`, `semester4`, `semester5`, `id_user`) VALUES
(1, 1, 20, 20, 20, 20, 20, 2),
(2, 2, 20, 20, 20, 20, 20, 2),
(3, 3, 20, 20, 20, 20, 20, 2),
(4, 4, 20, 20, 20, 20, 20, 2),
(5, 5, 20, 20, 20, 20, 20, 2),
(11, 1, 81, 81, 81, 81, 81, 4),
(12, 2, 81, 81, 81, 81, 81, 4),
(13, 3, 81, 81, 81, 81, 81, 4),
(14, 4, 81, 81, 81, 81, 81, 4),
(15, 5, 81, 81, 81, 81, 81, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_level` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `id_level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$6wEeCe8zR.Zzy88Vxv78CuilFJD3hjNNVIwjJGruayybj9n75oaci', 1, '2021-04-29 02:27:05', '2021-04-29 02:27:05'),
(2, 'ucup', 'ucup@gmail.com', '$2y$10$jBvN9Kt.ejU0gr1DCI0J1OvEa7kC7HfEdcx23cYimzF77oFfkXzzu', 2, NULL, NULL),
(3, 'asep', 'asep@gmail.com', '$2y$10$WS5oPP0yyUAMulR1p8s97OqInHMU/m5iur.OVHUzDslNElKbm.NYu', 2, NULL, NULL),
(4, 'ahmad', 'ahmad@gmail.com', '$2y$10$12LnV6NRxTzdiMjUfbo/HuMHX.VXW5xriXxCc939FQmvnMhHam/Qu', 2, NULL, NULL),
(5, 'supriyadi', 'supriyadi@gmail.com', '$2y$10$WS0eyZj/zyFsLYemS8ZQUOixxpCGB88p/hvbJtTZG57Y5aIIMu.Kq', 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_jurusan1` (`id_jurusan1`),
  ADD KEY `id_jurusan2` (`id_jurusan2`),
  ADD KEY `id_ktm` (`id_ktm`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `nama_jurusan` (`nama_jurusan`);

--
-- Indexes for table `ktm`
--
ALTER TABLE `ktm`
  ADD PRIMARY KEY (`id_ktm`),
  ADD KEY `nama_ktm` (`nama_ktm`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `nama_mapel` (`nama_mapel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raport`
--
ALTER TABLE `raport`
  ADD PRIMARY KEY (`id_raport`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ktm`
--
ALTER TABLE `ktm`
  MODIFY `id_ktm` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `raport`
--
ALTER TABLE `raport`
  MODIFY `id_raport` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `biodata_ibfk_1` FOREIGN KEY (`id_jurusan1`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `biodata_ibfk_2` FOREIGN KEY (`id_jurusan2`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `biodata_ibfk_3` FOREIGN KEY (`id_ktm`) REFERENCES `ktm` (`id_ktm`),
  ADD CONSTRAINT `biodata_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `raport`
--
ALTER TABLE `raport`
  ADD CONSTRAINT `raport_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
  ADD CONSTRAINT `raport_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
