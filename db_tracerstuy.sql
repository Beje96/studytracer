-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 08:00 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tracerstuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pertanyaan`
--

CREATE TABLE `jawaban_pertanyaan` (
  `id` int(10) NOT NULL,
  `id_pertanyaan` int(10) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  `penjelasan` text NOT NULL,
  `id_survei` int(10) NOT NULL,
  `id_grup_pertanyaan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loker`
--

CREATE TABLE `loker` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(10) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `pekerjaan`) VALUES
(1, 'Bidang IT'),
(2, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `sub_pekerjaan`
--

CREATE TABLE `sub_pekerjaan` (
  `id` int(10) NOT NULL,
  `id_pekerjaan` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_pekerjaan`
--

INSERT INTO `sub_pekerjaan` (`id`, `id_pekerjaan`, `nama`) VALUES
(1, 1, 'ManajemenData'),
(2, 1, 'Jaringan'),
(3, 1, 'Security');

-- --------------------------------------------------------

--
-- Table structure for table `survei`
--

CREATE TABLE `survei` (
  `id` int(10) NOT NULL,
  `nama_survei` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_berahkir` date NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_grup_pertanyaan`
--

CREATE TABLE `tabel_grup_pertanyaan` (
  `id` int(10) NOT NULL,
  `id_pertanyaan` int(10) NOT NULL,
  `id_survei` int(10) NOT NULL,
  `nama_grup` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `perintah` varchar(50) NOT NULL,
  `tgl_buat` date NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pertanyaan`
--

CREATE TABLE `tabel_pertanyaan` (
  `id` int(10) NOT NULL,
  `id_grup_pertanyaan` int(10) NOT NULL,
  `pertanyaan` varchar(200) NOT NULL,
  `pilihan` varchar(50) NOT NULL,
  `butuh_penjelasan` varchar(200) NOT NULL,
  `tgl_buat` date NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `id_user_grup` int(10) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tahun_lulus` varchar(30) NOT NULL,
  `mulai_kerja` varchar(30) NOT NULL,
  `angkatan` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `bidang_pekerjaan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat_kerja` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_user_grup`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `tgl_lahir`, `telp`, `email`, `alamat`, `username`, `password`, `tahun_lulus`, `mulai_kerja`, `angkatan`, `pekerjaan`, `bidang_pekerjaan`, `jabatan`, `alamat_kerja`, `kota`, `foto`, `status`) VALUES
(1, 1, 'Bagja septian', 'munawar', 'L', '2020-06-01', '083821354485', 'bagja672@gmail.com', '', 'bagjaseptian', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-25', '2020-06-25', '', '', '', '', '', '0', '', ''),
(2, 3, 'Sergi Apriatna', 'Djumantara', 'L', '1996-04-08', '087823354485', 'sergi@gmail.com', 'CIparay', 'sergi', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-25', '2021-06-25', '2016', '', 'Programmer', '', 'Karapitan', 'Bandung', 'bj.jpg', 'nonaktif'),
(3, 3, 'Lora', 'pradita', 'P', '1996-04-08', '0827362272', 'lora@gmail.com', 'bandung', 'lora', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-25', '2021-06-25', '2016', '', 'SPG', '', 'Karapitan', 'bandung', '', 'nonaktif'),
(4, 2, 'Bagja septian', 'Munawar', 'L', '1996-04-08', '08821354485', 'beje4355@gmail.com', 'Jl. KH. SYAHDAN RT 07', 'beje', '81dc9bdb52d04dc20036dbd8313ed055', '0000-00-00', '0000-00-00', '', '', '', '', '', '', 'Untitled_Diagram_(2).png', ''),
(15, 3, 'Bagja septian', 'arief rahman', 'L', '09 06 2020', '08821354485', 'beje4355@gmail.com', 'Jl. KH. SYAHDAN RT 07', 'beje', 'b59c67bf196a4758191e42f76670ceba', '2020', '2020', '2016', '1', 'ManajemenData', 'Programmer', 'jl haji daslim', 'bandung', 'IMG_8568.jpg', 'nonaktif'),
(16, 3, 'fahri', 'pantau', 'L', '03 06 2020', '08821354485', 'elsa@gmail.com', 'Jl. KH. SYAHDAN RT 07', 'rudi', 'c5fe25896e49ddfe996db7508cf00534', '2020', '2020', '2014', '2', 'PNS', 'Staff Kementrian', 'jl haji daslim', 'bandung', 'IMG_8568.jpg', 'nonaktif'),
(17, 3, 'Bagja septian', 'arief rahman', 'L', '09 06 2020', '08821354485', 'beje4355@gmail.com', 'Caringin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2027', '2023', '2020', '1', 'ManajemenData', 'Network enginer', 'jl haji daslim', 'bandung', 'excellence_delivery_shiping_transportation_car_travel-128.png', 'nonaktif'),
(18, 3, 'jon', 'Munawar12', 'L', '09 07 2020', '08821354485', 'adminbiobses@gmail.com', 'Caringin', 'admin', '4a7d1ed414474e4033ac29ccb8653d9b', '2020', '2020', '2020', '2', 'Pilih', 'Bos', 'jl haji daslim', 'bandung', 'images.jpg', 'nonaktif'),
(19, 3, 'irwin', 'supriadi', 'L', '20 05 2000', '08821354485', 'beje4355@gmail.com', 'ciwidey', 'irwin', '202cb962ac59075b964b07152d234b70', '2027', '2023', '2013', '1', 'Jaringan', 'Dosen UNLA', 'Bandung', 'bandung', 'WhatsApp_Image_2020-01-28_at_19_16_50.jpeg', 'nonaktif'),
(20, 3, 'aria', 'wiguna', 'L', '28 07 2020', '08821354485', 'ariawira@gmail.com', 'Caringin', 'arai', '81dc9bdb52d04dc20036dbd8313ed055', '2027', '2020', '2015', '2', 'Wirausaha', 'Owner', 'Bandung', 'Bandung', 'Logo-Alfabeta.png', 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `user_grup`
--

CREATE TABLE `user_grup` (
  `id` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `Deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_grup`
--

INSERT INTO `user_grup` (`id`, `status`, `Deskripsi`) VALUES
(1, 'Admin', 'administrator'),
(2, 'panitia', 'panitia tracer'),
(3, 'alumni', 'Alumni informatika Unla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loker`
--
ALTER TABLE `loker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_pekerjaan`
--
ALTER TABLE `sub_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_grup_pertanyaan`
--
ALTER TABLE `tabel_grup_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_pertanyaan`
--
ALTER TABLE `tabel_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_grup`
--
ALTER TABLE `user_grup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loker`
--
ALTER TABLE `loker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_pekerjaan`
--
ALTER TABLE `sub_pekerjaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survei`
--
ALTER TABLE `survei`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_grup_pertanyaan`
--
ALTER TABLE `tabel_grup_pertanyaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_pertanyaan`
--
ALTER TABLE `tabel_pertanyaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_grup`
--
ALTER TABLE `user_grup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
