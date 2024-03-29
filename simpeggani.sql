-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2022 at 03:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpeggani`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti_militer`
--

CREATE TABLE `cuti_militer` (
  `id` int(5) NOT NULL,
  `nrp` varchar(50) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cuti_pns`
--

CREATE TABLE `cuti_pns` (
  `id` int(5) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cuti_tks`
--

CREATE TABLE `cuti_tks` (
  `id` int(5) NOT NULL,
  `nit` varchar(50) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `militer`
--

CREATE TABLE `militer` (
  `id` int(5) NOT NULL,
  `nrp` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `agama` enum('ISLAM','KRISTEN','HINDU','BUDHA') NOT NULL,
  `status_perkawinan` enum('MENIKAH','BELUM MENIKAH') NOT NULL,
  `pangkat` enum('Kolonel','Letkol','Mayor','Kapten','Lettu','Letda','Peltu','Pelda','Serma','Serka','Sertu','Serda','Kopka','Koptu','Kopda','Praka','Pratu','Prada') NOT NULL,
  `corps` varchar(200) NOT NULL,
  `pendidikan_umum` varchar(200) NOT NULL,
  `pendidikan_militer` varchar(200) NOT NULL,
  `tmt_tni` date NOT NULL,
  `tmt_corps` date NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `gol_darah` enum('A','AB','B','O') NOT NULL,
  `jenis_kelamin` enum('LAKI-LAKI','PEREMPUAN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `militer`
--

INSERT INTO `militer` (`id`, `nrp`, `nama`, `tanggal_lahir`, `tempat_lahir`, `agama`, `status_perkawinan`, `pangkat`, `corps`, `pendidikan_umum`, `pendidikan_militer`, `tmt_tni`, `tmt_corps`, `jabatan`, `tmt_jabatan`, `gol_darah`, `jenis_kelamin`) VALUES
(12, '111111231', 'test', '2022-10-28', 'asdad', 'HINDU', 'BELUM MENIKAH', 'Kapten', 'cc', 'sss', 'sadjhauis', '2022-10-22', '2022-11-05', '5', '2022-10-28', 'B', 'LAKI-LAKI'),
(13, '9912134', 'Test', '2022-10-25', 'Palembang', 'KRISTEN', 'MENIKAH', 'Kolonel', 'Ckm', 'SMA', 'SCABA', '2022-10-25', '2022-10-25', 'provos', '2022-10-25', 'O', 'LAKI-LAKI'),
(14, '1122334455', 'AK Gani', '2022-10-27', 'ewqq', 'ISLAM', 'BELUM MENIKAH', 'Mayor', 'cku', 'SMA', 'SCABA', '2022-10-27', '2022-10-25', 'sadas', '2022-10-26', 'B', 'PEREMPUAN');

-- --------------------------------------------------------

--
-- Table structure for table `pns`
--

CREATE TABLE `pns` (
  `id` int(5) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('ISLAM','KRISTEN','HINDU','BUDHA') NOT NULL,
  `golongan` enum('IV/A','III/D','III/C','III/B','III/A','II/D','II/C','II/B','II/A','I/D','I/C','I/B','I/A','') NOT NULL,
  `tmt_golongan` date NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `latihan_jabatan` varchar(200) NOT NULL,
  `tahun_jabatan` year(4) NOT NULL,
  `pendidikan_umum` varchar(200) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `ijazah` varchar(100) NOT NULL,
  `golongan_darah` enum('A','AB','B','O') NOT NULL,
  `jenis_kelamin` enum('LAKI-LAKI','PEREMPUAN','','') NOT NULL,
  `status_perkawinan` enum('MENIKAH','BELUM MENIKAH','','') NOT NULL,
  `penugasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pns`
--

INSERT INTO `pns` (`id`, `nip`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `golongan`, `tmt_golongan`, `jabatan`, `tmt_jabatan`, `latihan_jabatan`, `tahun_jabatan`, `pendidikan_umum`, `tahun_lulus`, `ijazah`, `golongan_darah`, `jenis_kelamin`, `status_perkawinan`, `penugasan`) VALUES
(2, '1122334455', 'Ryan Andri', 'Bingin Teluk  MURA', '2022-12-28', 'ISLAM', 'III/A', '2022-12-29', 'Tes', '2022-12-29', 'Tes', 2022, 'Teknik Informatika', 2022, 'S1', 'A', 'LAKI-LAKI', 'BELUM MENIKAH', 'Infokes');

-- --------------------------------------------------------

--
-- Table structure for table `tks`
--

CREATE TABLE `tks` (
  `id` int(5) NOT NULL,
  `nit` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('ISLAM','KRSITEN','HINDU','BUDHA') NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `sprin_tks` varchar(255) NOT NULL,
  `tmt_tks` date NOT NULL,
  `tanggal_sprin` date NOT NULL,
  `pendidikan_umum` varchar(255) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `status_perkawinan` enum('MENIKAH','BELUM MENIKAH','','') NOT NULL,
  `jenis_kelamin` enum('LAKI-LAKI','PEREMPUAN','','') NOT NULL,
  `kualifikasi` varchar(100) NOT NULL,
  `golongan_darah` enum('A','AB','B','O') NOT NULL,
  `penugasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tks`
--

INSERT INTO `tks` (`id`, `nit`, `nama`, `tempat_lahir`, `tanggal_lahir`, `agama`, `golongan`, `sprin_tks`, `tmt_tks`, `tanggal_sprin`, `pendidikan_umum`, `tahun_lulus`, `status_perkawinan`, `jenis_kelamin`, `kualifikasi`, `golongan_darah`, `penugasan`) VALUES
(2, '123456', 'Ryan aaaaaa', 'asda', '2022-11-04', 'ISLAM', 'III', 'asdadsa', '2022-10-26', '2022-10-19', 'asda', 2022, 'BELUM MENIKAH', 'LAKI-LAKI', 'test', 'O', 'Infokes'),
(3, '1231', 'asda', 'ASDA', '2022-10-14', '', '3', 'asdadsa', '2022-10-13', '2022-10-20', 'asda', 2022, 'MENIKAH', 'PEREMPUAN', 'NON-MEDIS', 'O', 'Infokes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti_militer`
--
ALTER TABLE `cuti_militer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nrp` (`nrp`);

--
-- Indexes for table `cuti_pns`
--
ALTER TABLE `cuti_pns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `cuti_tks`
--
ALTER TABLE `cuti_tks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nit` (`nit`);

--
-- Indexes for table `militer`
--
ALTER TABLE `militer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nrp` (`nrp`);

--
-- Indexes for table `pns`
--
ALTER TABLE `pns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `tks`
--
ALTER TABLE `tks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nit` (`nit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti_militer`
--
ALTER TABLE `cuti_militer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cuti_pns`
--
ALTER TABLE `cuti_pns`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cuti_tks`
--
ALTER TABLE `cuti_tks`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `militer`
--
ALTER TABLE `militer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pns`
--
ALTER TABLE `pns`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tks`
--
ALTER TABLE `tks`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
