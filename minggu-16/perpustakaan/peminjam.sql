-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 10:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `namasiswa` varchar(255) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `judulbuku` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'dipinjam',
  `tglpinjam` datetime NOT NULL DEFAULT current_timestamp(),
  `tglkembali` varchar(30) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id`, `id_peminjam`, `namasiswa`, `kelas`, `judulbuku`, `status`, `tglpinjam`, `tglkembali`) VALUES
(1, 1, 'maulana', 'IPS4', 'matematika', 'dikembalikan', '2023-11-23 06:47:00', '2023-11-23 10:58'),
(7, 1, 'maulana', 'IPS4', 'kamus inggris-indonesia', 'dikembalikan', '2023-11-23 08:35:00', '2023-11-23 10:58'),
(15, 1, 'maulana', 'IPS4', 'kamus inggris-indonesia', 'dikembalikan', '2023-11-23 10:36:00', '2023-11-23 10:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
