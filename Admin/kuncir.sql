-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.26-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for kuncir
CREATE DATABASE IF NOT EXISTS `kuncir` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kuncir`;

-- Dumping structure for table kuncir.peminjam_terdaftar_v3
CREATE TABLE IF NOT EXISTS `peminjam_terdaftar_v3` (
  `nrp` varchar(20) NOT NULL,
  `pin` varchar(60) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `nohp` varchar(45) NOT NULL,
  `angkatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table kuncir.peminjam_v3
CREATE TABLE IF NOT EXISTS `peminjam_v3` (
  `idpeminjam` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_pinjam` datetime NOT NULL,
  `waktu_kembali` datetime NOT NULL,
  `picture` blob NOT NULL,
  `peminjam_terdaftar_NRP` varchar(20) NOT NULL,
  PRIMARY KEY (`idpeminjam`),
  KEY `fk_peminjam_peminjam_terdaftar_idx` (`peminjam_terdaftar_NRP`),
  CONSTRAINT `fk_peminjam_v3_1` FOREIGN KEY (`peminjam_terdaftar_NRP`) REFERENCES `peminjam_terdaftar_v3` (`nrp`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
