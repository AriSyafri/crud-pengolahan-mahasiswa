-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2022 at 10:37 PM
-- Server version: 5.7.40
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myarimyi_dbAtolMhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` varchar(12) NOT NULL,
  `nama_dsn` varchar(30) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `Alamat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dsn`, `TanggalLahir`, `Alamat`) VALUES
('110012', 'Yeni Angraeni', '1982-07-14', 'JL dipatiukur 3'),
('110013', 'Ujang Asep', '1992-07-15', 'Jl Setiahati 22'),
('110014', 'Ujang Saepul', '1993-07-21', 'Jl Jalan-jalan'),
('110015', 'Jujun Juniar', '1976-07-14', 'Jl Gahar Jaya 34'),
('110017', 'Sephia Ferjian', '1966-07-19', 'Jl Gahar Jaya 34'),
('150402', 'Ari Syafri', '2002-04-15', 'Jl sukaKaya');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kodeKelas` varchar(12) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `fakultas` varchar(30) DEFAULT NULL,
  `id_dosen` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kodeKelas`, `nama_kelas`, `fakultas`, `id_dosen`) VALUES
('H001', 'Hukum 1', 'FISIP', '110015'),
('H002', 'Hukum 2', 'FISIP', '150402'),
('IF01', 'Teknik Informatika 1', 'FTIK', '110013'),
('IF02', 'Teknik Informatika 2', 'FTIK', '110014'),
('IF03', 'Teknik Informatika 3', 'FTIK', '110015');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `nim` varchar(12) NOT NULL,
  `namaMhs` varchar(30) DEFAULT NULL,
  `JenisKelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahirMhs` date DEFAULT NULL,
  `AlamatMhs` varchar(30) DEFAULT NULL,
  `semester` varchar(5) DEFAULT NULL,
  `kodeKelas` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`nim`, `namaMhs`, `JenisKelamin`, `tanggal_lahirMhs`, `AlamatMhs`, `semester`, `kodeKelas`) VALUES
('1012001', 'Ujang Dayat', 'Laki-laki', '1999-07-25', 'Jl Jalan-jalan', 'II', 'H001'),
('10120021', 'Yeni Nurlika', 'Perempuan', '2003-12-17', 'Jl Setiahati 22', 'II', 'IF03'),
('10120022', 'Asep Jaenudin', 'Laki-laki', '1998-07-17', 'Jl sukaKaya 23', 'IV', 'IF01'),
('10120050', 'Ari Syafri', 'Laki-laki', '2002-04-15', 'Jl SagalaAya 23', 'IV', 'IF02'),
('10120054', 'Ujang asep Deden', 'Laki-laki', '2022-07-18', 'Jl Jalan-jalan', 'I', 'H001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` varchar(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `nama`, `jabatan`, `pass`) VALUES
('1001', 'User1', 'user', '$2a$12$24l89wrhxiQ51V50RHnejuReeALDlMOSngyIx1.oxNtcBmiNB9mQq'),
('aaa', 'fff', 'ff', '$2a$12$24l89wrhxiQ51V50RHnejuReeALDlMOSngyIx1.oxNtcBmiNB9mQq'),
('admin', 'admin', 'admin', '$2a$12$24l89wrhxiQ51V50RHnejuReeALDlMOSngyIx1.oxNtcBmiNB9mQq'),
('admin15', 'ari', 'admin', '$2a$12$24l89wrhxiQ51V50RHnejuReeALDlMOSngyIx1.oxNtcBmiNB9mQq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kodeKelas`),
  ADD KEY `kelas_ibfk_1` (`id_dosen`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `mhs_ibfk_1` (`kodeKelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `mhs_ibfk_1` FOREIGN KEY (`kodeKelas`) REFERENCES `kelas` (`kodeKelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
