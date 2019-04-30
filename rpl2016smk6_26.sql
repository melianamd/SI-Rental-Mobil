-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2016 at 03:26 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rpl2016smk6_26`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_service`
--

CREATE TABLE IF NOT EXISTS `jenis_service` (
  `IDJENISSERVICE` varchar(5) NOT NULL,
  `NMJenisService` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDJENISSERVICE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_service`
--

INSERT INTO `jenis_service` (`IDJENISSERVICE`, `NMJenisService`) VALUES
('JS001', 'servis berat'),
('JS002', 'servis ringan');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `NIK` varchar(50) NOT NULL,
  `NMKARYAWAN` varchar(50) DEFAULT NULL,
  `ALMTKARYAWAN` varchar(100) DEFAULT NULL,
  `TELPKARYAWAN` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`NIK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`NIK`, `NMKARYAWAN`, `ALMTKARYAWAN`, `TELPKARYAWAN`) VALUES
('09.5103.190573.9765', 'Faisal Ridho', 'Sumber Baru', '081234567878'),
('09.9999.190573.3456', 'Dinda Madifatul', 'Sumber Baru', '085754076554'),
('11.222.3333', 'Meliana Monica Devi', 'Ajung', '085745657900'),
('31.7102.231069.0396', 'Tan Tjun Ching', 'Sawah Besar  Jakarta', '085959995999'),
('31.7304.300394.0543', 'Rita Suhartati', 'Ambulu desa Karang A', '081234234567'),
('32.1606.420289.0782', 'Dwi Yulian Maulida', 'Ambulu', '081234567878'),
('32.7205.250987.0390', 'Yuda Septian', 'Sukorambi', '089990765543'),
('33.0302.420675.0912', 'Frengky Firnandes', 'Kalisat', '081311777777');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE IF NOT EXISTS `kendaraan` (
  `NOPLAT` varchar(20) NOT NULL,
  `IDTYPE` varchar(5) NOT NULL,
  `KODEPEMILIK` varchar(5) NOT NULL,
  `TAHUN` varchar(15) DEFAULT NULL,
  `TARIFPERJAMKENDARAAN` decimal(8,0) DEFAULT NULL,
  `STATUSRENTAL` varchar(20) DEFAULT NULL,
  `FOTO` varchar(50) NOT NULL,
  `KAPASITAS` varchar(30) NOT NULL,
  PRIMARY KEY (`NOPLAT`),
  KEY `FK_MEMPUNYA` (`IDTYPE`),
  KEY `FK_MEMPUNYAI3` (`KODEPEMILIK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`NOPLAT`, `IDTYPE`, `KODEPEMILIK`, `TAHUN`, `TARIFPERJAMKENDARAAN`, `STATUSRENTAL`, `FOTO`, `KAPASITAS`) VALUES
('B 369 TG', 'TP010', 'PM003', '2013-2014', 5000, 'Tersedia', 'bmw.jpg', '10 orang'),
('B 9901 TP', 'TP001', 'PM001', '2004-2005', 5000, 'Dipakai', 'p1.jpg', '5 orang'),
('DK 345 BT', 'TP006', 'PM001', '2014-2015', 1000, 'Tersedia', 'Front-Side-Variant-Color-White.png', '5 orang'),
('DK 345 PL', 'TP003', 'PM002', '2015-2016', 7000, 'Tersedia', 'etios valco.png', '5 orang');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `USERNAME` varchar(20) NOT NULL,
  `NIK` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `TYPEUSER` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`USERNAME`),
  KEY `FK_MEMPUNYAI` (`NIK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`USERNAME`, `NIK`, `PASSWORD`, `TYPEUSER`) VALUES
('admin', '09.5103.190573.9765', 'admin', 'admin'),
('karyawan', '09.9999.190573.3456', 'karyawan', 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE IF NOT EXISTS `merk` (
  `KODEMERK` varchar(5) NOT NULL,
  `NMMERK` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`KODEMERK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`KODEMERK`, `NMMERK`) VALUES
('KD001', 'Toyota'),
('KD002', 'Honda'),
('KD003', 'Suzuki'),
('KD004', 'Mercedes'),
('KD005', 'Kia'),
('KD006', 'Mitsubishi'),
('KD007', 'Daihatsu'),
('KD008', 'BMW '),
('KD009', 'Infiniti'),
('KD010', 'Lexus');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `NOKTP` varchar(20) NOT NULL,
  `NAMAPEL` varchar(50) DEFAULT NULL,
  `ALAMATPEL` varchar(100) DEFAULT NULL,
  `TELPPEL` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`NOKTP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`NOKTP`, `NAMAPEL`, `ALAMATPEL`, `TELPPEL`) VALUES
('31.7403.010354.0886', 'Dwi Tiya', 'Pondok Waluh', '082134545679'),
('32.1606.420289.0534', 'Lutfa Ainul Hasanah', 'Kramat Sukoharjo', '082134545679'),
('36.0324.640479.0753', 'Deasy Brilliana Novita .S', 'Pondok Waluh', '0899677865');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik`
--

CREATE TABLE IF NOT EXISTS `pemilik` (
  `KODEPEMILIK` varchar(5) NOT NULL,
  `NMPEMILIK` varchar(50) DEFAULT NULL,
  `ALMTPEMILIK` varchar(100) DEFAULT NULL,
  `TELPPEMILIK` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`KODEPEMILIK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilik`
--

INSERT INTO `pemilik` (`KODEPEMILIK`, `NMPEMILIK`, `ALMTPEMILIK`, `TELPPEMILIK`) VALUES
('PM001', 'Aditya Eko Prasetyo', 'Tanggul Wetan', '087757675321'),
('PM002', 'Hilmi Al Mahabah', 'Banyuputih', '089965342122'),
('PM003', 'Ahmat Makruf', 'Tanggul Kulon', '087757453123'),
('PM004', 'Aldiano Yoga', 'Pondok Waluh', '087757453126');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `KODESERVICE` varchar(5) NOT NULL,
  `NOPLAT` varchar(20) NOT NULL,
  `IDJENISSERVICE` varchar(5) NOT NULL,
  `TGLSERVICE` date DEFAULT NULL,
  `BIAYASERVICE` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`KODESERVICE`),
  KEY `FK_JENIS_PERAWATAN` (`IDJENISSERVICE`),
  KEY `FK_MELAKUKAN2` (`NOPLAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`KODESERVICE`, `NOPLAT`, `IDJENISSERVICE`, `TGLSERVICE`, `BIAYASERVICE`) VALUES
('SR001', 'B 369 TG', 'JS001', '2016-02-14', 8000),
('SR002', 'B 9901 TP', 'JS002', '2016-02-15', 2000),
('SR003', 'DK 345 BT', 'JS001', '2016-02-16', 8000),
('SR004', 'DK 345 PL', 'JS002', '2016-02-17', 2000),
('SR005', 'B 369 TG', 'JS001', '2016-02-20', 1000),
('SR006', 'B 9901 TP', 'JS002', '2016-02-20', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `setoran`
--

CREATE TABLE IF NOT EXISTS `setoran` (
  `NOSETORAN` varchar(5) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `KODEPEMILIK` varchar(5) NOT NULL,
  `TGLSETORAN` date DEFAULT NULL,
  `JUMLAH` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`NOSETORAN`),
  KEY `FK_MENCATAT` (`NIK`),
  KEY `FK_MENERIMA` (`KODEPEMILIK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setoran`
--

INSERT INTO `setoran` (`NOSETORAN`, `NIK`, `KODEPEMILIK`, `TGLSETORAN`, `JUMLAH`) VALUES
('STR01', '09.5103.190573.9765', 'PM001', '2016-02-19', 90000),
('STR02', '09.9999.190573.3456', 'PM002', '2016-02-18', 70000),
('STR03', '11.222.3333', 'PM004', '2016-02-21', 4000),
('STR04', '11.222.3333', 'PM004', '2016-02-21', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE IF NOT EXISTS `sopir` (
  `IDSOPIR` varchar(5) NOT NULL,
  `NMSOPIR` varchar(50) DEFAULT NULL,
  `ALMTSOPIR` varchar(100) DEFAULT NULL,
  `TELPSOPIR` varchar(12) DEFAULT NULL,
  `NOSIM` varchar(50) DEFAULT NULL,
  `TARIFPERJAMSOPIR` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`IDSOPIR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sopir`
--

INSERT INTO `sopir` (`IDSOPIR`, `NMSOPIR`, `ALMTSOPIR`, `TELPSOPIR`, `NOSIM`, `TARIFPERJAMSOPIR`) VALUES
('S0001', 'Dimas Bagus Adi S. ', 'Paleran', '089976654456', '790709201391', 3000),
('S0002', 'Meydiana Eka', 'Sidorejo', '087757453123', '70098909876', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `NAMA` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `KOTA` varchar(20) NOT NULL,
  `TESTIMONI` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`NAMA`, `EMAIL`, `KOTA`, `TESTIMONI`) VALUES
('Nuraeni', 'nuraeni@gmail.com', 'Cirebon', 'merekomendasikan rental ini'),
('Maria', 'mariapuspita@yahoo.com', 'Jember', 'mantapp...'),
('Siti Badriah', 'sibad12@gmail.com', 'Banjarmasin', 'sangat menyukai desainya'),
('Lana Maulidia', 'lanacimcim123@yahoo.co.id', 'Lumajang', 'web responsive'),
('Nuri Alvyana', 'UcuzMoci@yahoo.com', 'Pondok waluh', 'sangat menarik'),
('Alfan Firdaus', 'wulandariwitasari@yahoo.co.id', 'Tanggul', 'membantu usaha');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_sewa`
--

CREATE TABLE IF NOT EXISTS `transaksi_sewa` (
  `NOTRANSAKSI` varchar(5) NOT NULL,
  `NOKTP` varchar(50) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `NOPLAT` varchar(20) NOT NULL,
  `IDSOPIR` varchar(5) NOT NULL,
  `TGLPESAN` date DEFAULT NULL,
  `TGLPINJAM` date DEFAULT NULL,
  `JAMPINJAM` time DEFAULT NULL,
  `TGLKEMBALIRENCANA` date DEFAULT NULL,
  `JAMKEMBALIRENCANA` time DEFAULT NULL,
  `TGLKEMBALIREALISASI` date DEFAULT NULL,
  `JAMKEMBALIREAL` time DEFAULT NULL,
  `DENDA` decimal(8,0) DEFAULT NULL,
  `KILOMETERPINJAM` decimal(8,0) DEFAULT NULL,
  `KILOMETERKEMBALI` decimal(8,0) DEFAULT NULL,
  `BBMPINJAM` decimal(8,0) DEFAULT NULL,
  `BBMKEMBALI` decimal(8,0) DEFAULT NULL,
  `KONDISIMOBILPINJAM` varchar(20) DEFAULT NULL,
  `KONDISIMOBILKEMBALI` varchar(20) DEFAULT NULL,
  `KERUSAKAN` varchar(20) DEFAULT NULL,
  `BIAYAKERUSAKAN` decimal(8,0) DEFAULT NULL,
  `BIAYABBM` decimal(8,0) DEFAULT NULL,
  `BIAYAKENDARAANTOTAL` int(11) NOT NULL,
  `BIAYASOPIR` int(11) NOT NULL,
  PRIMARY KEY (`NOTRANSAKSI`),
  KEY `FK_MELAKUKAN` (`NOKTP`),
  KEY `FK_MELAYANI` (`NIK`),
  KEY `FK_MEMILIH` (`NOPLAT`),
  KEY `FK_MENGGUNAKAN` (`IDSOPIR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `IDTYPE` varchar(5) NOT NULL,
  `KODEMERK` varchar(5) NOT NULL,
  `NMTYPE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`IDTYPE`),
  KEY `FK_MEMPUNYAI2` (`KODEMERK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`IDTYPE`, `KODEMERK`, `NMTYPE`) VALUES
('TP001', 'KD001', 'Starlet'),
('TP002', 'KD001', 'Yaris'),
('TP003', 'KD001', 'Etios'),
('TP004', 'KD002', 'New Jazz'),
('TP005', 'KD001', 'Agya'),
('TP006', 'KD002', 'Brio'),
('TP007', 'KD003', 'Swift'),
('TP008', 'KD004', 'A Class'),
('TP009', 'KD006', 'Galant Sigma'),
('TP010', 'KD008', 'Serie 5 E34');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `FK_MEMPUNYA` FOREIGN KEY (`IDTYPE`) REFERENCES `type` (`IDTYPE`),
  ADD CONSTRAINT `FK_MEMPUNYAI3` FOREIGN KEY (`KODEPEMILIK`) REFERENCES `pemilik` (`KODEPEMILIK`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FK_MEMPUNYAI` FOREIGN KEY (`NIK`) REFERENCES `karyawan` (`NIK`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_JENIS_PERAWATAN` FOREIGN KEY (`IDJENISSERVICE`) REFERENCES `jenis_service` (`IDJENISSERVICE`),
  ADD CONSTRAINT `FK_MELAKUKAN2` FOREIGN KEY (`NOPLAT`) REFERENCES `kendaraan` (`NOPLAT`);

--
-- Constraints for table `setoran`
--
ALTER TABLE `setoran`
  ADD CONSTRAINT `FK_MENCATAT` FOREIGN KEY (`NIK`) REFERENCES `karyawan` (`NIK`),
  ADD CONSTRAINT `FK_MENERIMA` FOREIGN KEY (`KODEPEMILIK`) REFERENCES `pemilik` (`KODEPEMILIK`);

--
-- Constraints for table `transaksi_sewa`
--
ALTER TABLE `transaksi_sewa`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`NOKTP`) REFERENCES `pelanggan` (`NOKTP`),
  ADD CONSTRAINT `FK_MELAYANI` FOREIGN KEY (`NIK`) REFERENCES `karyawan` (`NIK`),
  ADD CONSTRAINT `FK_MEMILIH` FOREIGN KEY (`NOPLAT`) REFERENCES `kendaraan` (`NOPLAT`),
  ADD CONSTRAINT `FK_MENGGUNAKAN` FOREIGN KEY (`IDSOPIR`) REFERENCES `sopir` (`IDSOPIR`);

--
-- Constraints for table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `FK_MEMPUNYAI2` FOREIGN KEY (`KODEMERK`) REFERENCES `merk` (`KODEMERK`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
