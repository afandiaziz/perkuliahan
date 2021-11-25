-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 09:12 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2_uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `logo`, `name`, `slug`, `address`, `description`) VALUES
(4, 'assets/img/2021110461559.png', 'PT Kereta Api Indonesia', 'pt-kereta-api-indonesia', 'Bandung', 'Satu-satunya operator perkeretaapian umum di Indonesia. '),
(5, 'assets/img/2021110454058.png', 'PT Garuda Indonesia', 'pt-garuda-indonesia', 'Tangerang', 'PT Garuda Indonesia Tbk adalah maskapai penerbangan nasional Indonesia'),
(6, 'assets/img/2021110454207.png', 'PT Bukaka Teknik Utama', 'pt-bukaka-teknik-utama', 'Jakarta', 'Merupakan sebuah perusahaan multinasional yang bermarkas di Jakarta, Indonesia.'),
(7, 'assets/img/2021110473235.png', 'PT Wijaya Karya', 'pt-wijaya-karya', 'Jakarta', 'Sebuah badan usaha milik negara Indonesia yang bergerak di bidang konstruksi.'),
(8, 'assets/img/2021110473524.png', 'PT Kimia Farma Tbk.', 'pt-kimia-farma-tbk-', 'Jakarta', 'Perusahaan industri farmasi di Indonesia yang didirikan sejak tahun 1817.'),
(9, 'assets/img/2021110474230.png', 'PT Indofood Sukses Makmur Tbk', 'pt-indofood-sukses-makmur-tbk', 'Jakarta', 'Produsen berbagai jenis makanan dan minuman'),
(10, 'assets/img/2021110474341.png', 'PT Pelayaran Nasional Indonesia', 'pt-pelayaran-nasional-indonesia', 'Jakarta', 'Maskapai pelayaran nasional Indonesia.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
