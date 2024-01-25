-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 02:13 AM
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
-- Database: `db_sekolah`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetGuruByGender` (IN `gender_param` ENUM('L','P'))   BEGIN
SELECT * FROM guru WHERE jenis_kelamin = gender_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetGuruByHakAkses` (IN `role_param` ENUM('admin','user'))   BEGIN
SELECT * FROM guru WHERE hak_akses = role_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetJadwalByHari` (IN `day_param` VARCHAR(20))   BEGIN
SELECT * FROM jadwal WHERE hari = day_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetKelasByJurusan` (IN `course_param` VARCHAR(50))   BEGIN
SELECT * FROM kelas WHERE jurusan = course_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetSiswaByGender` (IN `gender_param` ENUM('L','P'))   BEGIN
SELECT * FROM siswa WHERE jenis_kelamin = gender_param;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `GetGenderByName` (`nama_param` VARCHAR(255)) RETURNS ENUM('L','P') CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
DECLARE gender ENUM('L', 'P');
SELECT jenis_kelamin INTO gender FROM siswa WHERE nama = nama_param;
RETURN gender;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `GetNamaGuruAccess` (`name_param` VARCHAR(255)) RETURNS ENUM('admin','user') CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
DECLARE access ENUM ('admin', 'user');
SELECT hak_akses INTO access FROM guru WHERE nama = name_param;
RETURN access;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `mata_pelajaran` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `hak_akses` enum('admin','user') NOT NULL,
  `password` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `nama`, `mata_pelajaran`, `email`, `nomor_telepon`, `jenis_kelamin`, `hak_akses`, `password`) VALUES
(10001, 'Aizen Waluyo', 'Sejarah', 'aiwa@gmail.com', '0815780002543', 'L', 'user', 'aizenuser'),
(10002, 'Sucika Chika', 'Matematika Peminatan', 'chikakawai@gmail.com', '082221918223', 'P', 'admin', 'kawaii'),
(10003, 'Suyitno Adminto', 'Informatika', 'adminman@gmail.com', '082220091768', 'L', 'admin', 'adminadmin'),
(10004, 'Felis Siau', 'Biologi', 'felismiau@gmail.com', '085786001004', 'L', 'user', 'kucingmiau'),
(10012, 'Oppenheimer', 'Fisika', 'opp@gmail.com', '085746922112', 'L', 'user', 'nuklir'),
(10013, 'Kelapa Muda', 'Pertanian', 'tani@gmail.com', '0808808881', 'L', 'user', 'tanikeren');

--
-- Triggers `guru`
--
DELIMITER $$
CREATE TRIGGER `access_before_insert` BEFORE INSERT ON `guru` FOR EACH ROW BEGIN
IF NEW.hak_akses NOT IN ('admin', 'user') THEN
SIGNAL SQLSTATE '47000'
SET MESSAGE_TEXT = 'Hak akses harus diisi dengan "admin" atau "user"';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `mata_pelajaran` varchar(255) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `guru_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `kelas_id`, `mata_pelajaran`, `hari`, `jam_mulai`, `jam_selesai`, `guru_id`) VALUES
(200, 1, 'Sejarah', 'Senin', '07:30:00', '08:30:00', 10001),
(201, 3, 'Informatika', 'Senin', '09:30:00', '10:30:00', 10003),
(202, 2, 'Matematika Peminatan', 'Selasa', '07:30:00', '12:00:00', 10002),
(203, 1, 'Biologi', 'Rabu', '12:30:00', '13:00:00', 10004);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `tahun_ajaran` varchar(20) DEFAULT NULL,
  `wali_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `nama_kelas`, `jurusan`, `tahun_ajaran`, `wali_kelas`) VALUES
(1, 'XII MIPA 1', 'MIPA', '2020', 10001),
(2, 'XII MIPA 2', 'MIPA', '2020', 10002),
(3, 'XII IPS 1', 'IPS', '2020', 10003),
(4, 'XII IPS 2', 'IPS', '2020', 10004);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `nama`, `tanggal_lahir`, `alamat`, `kelas_id`, `jenis_kelamin`) VALUES
(2010, 'Jordan Michael', '2003-09-03', 'Surodadi', 1, 'L'),
(2011, 'Hakari Hanazono', '2003-03-19', 'Jakarta', 2, 'P');

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `insert_gender_first` BEFORE INSERT ON `siswa` FOR EACH ROW BEGIN
    IF NEW.jenis_kelamin NOT IN ('L', 'P') THEN
        SIGNAL SQLSTATE '49000'
        SET MESSAGE_TEXT = 'Jenis kelamin tidak diketahui. Mohon masukkan "L" atau "P"!';
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `idx_kelasid` (`kelas_id`),
  ADD KEY `idx_guruid` (`guru_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD KEY `idx_walkel` (`wali_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `fk_kelas` (`kelas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10015;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2014;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`guru_id`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_guru` FOREIGN KEY (`wali_kelas`) REFERENCES `guru` (`guru_id`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
