-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 07:07 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_kelas`
--

CREATE TABLE `absen_kelas` (
  `id_absen` int(11) NOT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status_kehadiran` enum('Hadir','Izin','Sakit','Alpha') DEFAULT 'Hadir',
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip_nuptk` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text DEFAULT NULL,
  `golongan` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `mapel_diampu` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `status_guru` enum('Aktif','Pensiun','Cuti') DEFAULT 'Aktif',
  `tahun_masuk` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `tingkat` enum('X','XI','XII') NOT NULL,
  `wali_kelas` varchar(100) DEFAULT NULL,
  `nip_wali` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `status_siswa` enum('Aktif','Lulus','Pindah','Drop Out') DEFAULT 'Aktif',
  `tahun_masuk` year(4) DEFAULT NULL,
  `tahun_keluar` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `penerima` varchar(100) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `sifat_surat` enum('Penting','Biasa','Rahasia') DEFAULT 'Biasa',
  `status` enum('Dikirim','Pending','Selesai') DEFAULT 'Pending',
  `tgl_dikirim` date DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date DEFAULT NULL,
  `pengirim` varchar(100) DEFAULT NULL,
  `perihal` varchar(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `sifat_surat` enum('Penting','Biasa','Rahasia') DEFAULT 'Biasa',
  `status` enum('Diproses','Pending','Selesai') DEFAULT 'Pending',
  `disposisi` varchar(100) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_pindah_siswa`
--

CREATE TABLE `surat_pindah_siswa` (
  `id_surat_pindah` int(11) NOT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `id_surat_keluar` int(11) DEFAULT NULL,
  `tgl_pindah` date DEFAULT NULL,
  `alasan_pindah` varchar(255) DEFAULT NULL,
  `tujuan_sekolah` varchar(100) DEFAULT NULL,
  `alamat_tujuan` text DEFAULT NULL,
  `status_pindah` enum('Proses','Selesai') DEFAULT 'Proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_kelas`
--
ALTER TABLE `absen_kelas`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `fk_absen_siswa` (`nisn`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip_nuptk`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `fk_wali_kelas` (`nip_wali`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `surat_pindah_siswa`
--
ALTER TABLE `surat_pindah_siswa`
  ADD PRIMARY KEY (`id_surat_pindah`),
  ADD KEY `fk_pindah_siswa` (`nisn`),
  ADD KEY `fk_pindah_surat` (`id_surat_keluar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_kelas`
--
ALTER TABLE `absen_kelas`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_pindah_siswa`
--
ALTER TABLE `surat_pindah_siswa`
  MODIFY `id_surat_pindah` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen_kelas`
--
ALTER TABLE `absen_kelas`
  ADD CONSTRAINT `fk_absen_siswa` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_wali_kelas` FOREIGN KEY (`nip_wali`) REFERENCES `guru` (`nip_nuptk`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `surat_pindah_siswa`
--
ALTER TABLE `surat_pindah_siswa`
  ADD CONSTRAINT `fk_pindah_siswa` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pindah_surat` FOREIGN KEY (`id_surat_keluar`) REFERENCES `surat_keluar` (`id_surat`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
