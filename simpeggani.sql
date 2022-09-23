-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 11:40 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `militer`
--

CREATE TABLE `militer` (
  `nrp` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tangallahir` date NOT NULL,
  `tempatlahir` varchar(100) NOT NULL,
  `agama` enum('ISLAM','KRISTEN','HINDU','BUDHA') NOT NULL,
  `statusperkawinan` enum('MENIKAH','BELUM MENIKAH','','') NOT NULL,
  `pangkat` enum('Kolonel','Letkol','Mayor','Kapten','Lettu','Letda','Peltu','Pelda','Serma','Serka','Sertu','Serda','Kopka','Koptu','Kopda','Praka','Pratu','Prada') NOT NULL,
  `coprs` enum('Ckm','CKU','','') NOT NULL,
  `pendidikanumum` varchar(200) NOT NULL,
  `pendidikanmiliter` varchar(200) NOT NULL,
  `tmttni` date NOT NULL,
  `tmtcoprs` date NOT NULL,
  `jabatan` int(11) NOT NULL,
  `tmtjabatan` date NOT NULL,
  `golongandarah` enum('A','AB','B','O') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pns`
--

CREATE TABLE `pns` (
  `nip` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `tempatlahir` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `agama` enum('ISLAM','KRISTEN','HINDU','BUDHA') NOT NULL,
  `golongan` enum('IV/A','III/D','III/C','III/B','III/A','II/D','II/C','II/B','II/A','I/D','I/C','I/B','I/A','') NOT NULL,
  `tmtgolongan` date NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tmtjabatan` date NOT NULL,
  `latihanjabatan` varchar(200) NOT NULL,
  `tahunjabatan` year(4) NOT NULL,
  `pendidikanumum` varchar(200) NOT NULL,
  `tahunlulus` year(4) NOT NULL,
  `ijazah` varchar(100) NOT NULL,
  `golongandarah` enum('A','AB','B','O') NOT NULL,
  `jeniskelamin` enum('LAKI-LAKI','PEREMPUAN','','') NOT NULL,
  `statuspernikahan` enum('MENIKAH','BELUM MENIKAH','','') NOT NULL,
  `penugasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tks`
--

CREATE TABLE `tks` (
  `nit` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `tempatlahir` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `agama` enum('ISLAM','KRSITEN','HINDU','BUDHA') NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `sprintks` varchar(100) NOT NULL,
  `tmttks` date NOT NULL,
  `tanggalsprin` date NOT NULL,
  `pendidikanumum` varchar(100) NOT NULL,
  `tahunlulus` year(4) NOT NULL,
  `statuspernikahan` enum('MENIKAH','BELUM MENIKAH','','') NOT NULL,
  `jeniskelamin` enum('LAKI-LAKI','PEREMPUAN','','') NOT NULL,
  `kualifikasi` varchar(100) NOT NULL,
  `gologandarah` enum('A','AB','B','O') NOT NULL,
  `penugasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `militer`
--
ALTER TABLE `militer`
  ADD UNIQUE KEY `nrp` (`nrp`);

--
-- Indexes for table `pns`
--
ALTER TABLE `pns`
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `tks`
--
ALTER TABLE `tks`
  ADD UNIQUE KEY `nit` (`nit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
