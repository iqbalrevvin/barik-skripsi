-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 11:49 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_hf`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa_hasil`
--

CREATE TABLE `analisa_hasil` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `usia` varchar(10) DEFAULT NULL,
  `kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `apa_yang_dirasakan` varchar(200) NOT NULL,
  `kode_penyakit` varchar(5) NOT NULL,
  `noip` varchar(60) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa_hasil`
--

INSERT INTO `analisa_hasil` (`id`, `nama_pasien`, `usia`, `kelamin`, `alamat`, `apa_yang_dirasakan`, `kode_penyakit`, `noip`, `tanggal`) VALUES
(16, 'fdfgsdf', NULL, 'Perempuan', 'dfgsdg', '', 'P001', '::1', '2018-08-27 14:53:11'),
(17, 'dsdfadf', NULL, 'Laki-Laki', 'dfsafasfd', '', 'P010', '::1', '2018-08-31 21:52:58'),
(18, 'dsfasdf', NULL, 'Perempuan', 'adfasfdsf', '', 'P012', '::1', '2018-08-31 21:58:30'),
(19, 'fdSFASDF', NULL, 'Laki-Laki', 'SDFASDF', '', 'P012', '::1', '2018-08-31 22:00:21'),
(20, 'hfghdfgh', NULL, 'Laki-Laki', 'ghdfgh', '', 'P001', '::1', '2018-09-03 20:43:23'),
(21, 'dfasdf', NULL, 'Perempuan', 'dfasdf', '', 'P002', '::1', '2018-09-18 23:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deskripsi`
--

CREATE TABLE `tbl_deskripsi` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `des_utama` text NOT NULL,
  `des_admin` text NOT NULL,
  `des_superadmin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_deskripsi`
--

INSERT INTO `tbl_deskripsi` (`id`, `judul`, `des_utama`, `des_admin`, `des_superadmin`) VALUES
(1, ' Sistem Pakar Pengobatan Homeopathy', 'Deskripsi aplikasi silahkan di isi di menu super admin.', '<p>Deskripsi untuk admin silahkan di isi melalui akun superadmin</p>', '<p>Deskripsi untuk super admin</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `kode_gejala` varchar(4) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`kode_gejala`, `nama_gejala`) VALUES
('G001', 'Kanker (Kantong Kering)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `kode_pengguna` varchar(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `hak_akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`kode_pengguna`, `nama_pengguna`, `tgl_daftar`, `username`, `pass`, `hak_akses`) VALUES
('53906091255', 'Super Admin', '2016-04-05', 'superadmin', 'Xh3VnxNVkwcQRAvLwNf2blnehgOvy8kUxVlv5GF4HFA=', 'Super Admin'),
('53975975893', 'Administrator', '2016-04-12', 'admin', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyakit`
--

CREATE TABLE `tbl_penyakit` (
  `kode_penyakit` varchar(4) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `nama_latin` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penyakit`
--

INSERT INTO `tbl_penyakit` (`kode_penyakit`, `nama_penyakit`, `nama_latin`, `deskripsi`, `solusi`) VALUES
('P001', 'Batuk Berdahak', '', '<p>\r\n\r\n\r\n\r\n</p><div><p>Batuk berdahak pada anak, berawal dari flu yang menyebabkan hidung menjadi tersumbat atau berair, nafsu makan berkurang, mata berair dan sakit tenggorokan. biasanya saat penyakit ini melanda akan sembuh dalam 1-2 minggu.&nbsp;</p></div><p></p>', '<p>( Aconite + Belladona + Pulsatilla ) 30<br></p><p>ABP. bahan berikut berasal dari .........</p>'),
('P002', 'Batuk Mirip Mengi', '', 'Batuk anak terdengar seperti asma. Mengi adalah suara napas yang mirip siulan bernada tinggi seperti ngik ngik. Penyakit ini umum terjadi pada anak berusia 6 - 3 tahun. batuk ini biasanya akan membaik pada siang hari.<div><br></div><div>Batuk tersebut disebabkan oleh infeksi saluran pernapasan yang mempengaruhi tenggorokan.</div>', '<p>ABP</p>'),
('P003', 'Bearing Kipas Outdoor Rusak', 'Outdoor Fan Bearings Broken', '', '<p></p><ol><li>Bersihkan bearing menggunakan pelumas khusus</li><li>Jika tidak dapat digunakan lagi, ganti bearing dengan yang baru</li></ol><p></p>'),
('P004', 'Sirip-sirip Evaporator kotor', 'Dirty Evaporator Fins', 'Salah satu komponen pada sistem pendingin AC mobil adalah evaporator. Evaporator ini terletak diantara katup ekspansi (expansion valve) dan kompresor AC. Refrigerant atau freon yang telah dikabutkan oleh katup ekspansi akan memiliki temperatur serta tekanan yang rendah. Refirgerant ini lalu akan disalurkan menuju ke evaporator.', '<b></b>Membersihkan sirip-sirip evaporator menggunakan air yang dicampur dengan cairan pembersih khusus, semprotkan menggunakan pompa steam'),
('P005', 'Sirip-Sirip Kondensor Kotor', 'Dirty Condenser Fins', '<p>Sirip-sirip pipa kondensor sangat penting agar perpindahan kalor refigerant tidak terganggu. Jika sirip-sirip kondensor dibiarkan dalam kondisi kotor, akan mengakibatkan turunnya performa konerja AC yang membuat AC menjadi kurang dingin</p>', 'Membersihkan sirip-sirip kondensor menggunakan air yang dicampur dengan cairan pembersih khusus, semprotkan menggunakan pompa steam'),
('P006', 'Kapasitor Kompresor Rusak', ' Broken Compressor Capacitors', '<p>Kapasitor sendiri adalah komponen elektronika yang mempunyai fungsi untuk menyimpan muatan listrik. Dimana komponen ini terbuat dari bahan dasar dua buah lempengan logam yang saling sejajar. dan diantara kedua lempengan logam tersebut terdapat isolator yang biasa disebut dielektrik.</p><p>Karena fungsinya tersebut, kapasitor pada AC digunakan sebagai tenaga cadangan. Dalam arti untuk membantu menghidupkan kompresor saat pertama kali dinyalakan. Hal tersebut juga bisa kenal dengan istilah proses running. Sedangkan nama lain kapasitor bisa kita sebut starting kompresor.</p>', 'Ganti kapasitor sesuai ukurannya'),
('P007', 'Kapasitas Kipas Outdoor Rusak', ' Broken Outdoor Fan Capacity', 'KAPASITOR ini fungsinya sebagai starting pada motor/dinamo kipas ac, jaika alat ini rusak atau mati, maka kipas ac tidak akan berputar, terkecuali kita bantu putar kipas tersebut (maka kipas akan berputar dengan bantuan tangan). kipas ini terdiri dari kipas indoor(blower indoor) ataupun kipas outdoor(blower outdoor), ukuranya kecil, kisaran 1uF/450 v sampe 5uF/450v.', '<p>Ganti kapasitor kipas sesuai ukurannya</p>'),
('P008', 'Spark Pada Terminal Utama Atau Konektor Kompresor', ' Spark On Main Terminal Or Compressor Connector', '', '<ol><li>Mengganti konektor dan kabel yang terbakar</li><li>Kencangkan sambungan terminal dan konektor</li><li>Periksa kekuatan setiap sambungan</li></ol>'),
('P009', 'Kebocoran Refrigerant Pada Sambungan Pipa', ' Refrigerant Leaks on Pipe Joints', '<p>Salah satu permasalahan pada unit pendingin ruangan yang mungkin sering terjadi yaitu AC bocor freon. Sehingga setiap kita mengisi freon pada unit tersebut pasti akan selalu habis, akibatnya AC menjadi tidak dingin sama sekali.</p><p>Berapa lama freon itu akan habis sampai benar-benar pada tekanan NOL PSI biasanya dipengaruhi seberapa parah tingkat kebocorannya. Bisa dalam hitungan bulan, minggu, atau bahkan bulan dari semenjak kita mengisi freon.</p>', '<p></p><ol><li>Periksa setiap sambungan pipa menggunakan air sabun atau leakage detector</li><li>Perbaiki kebocoran pipa dengan cara pengelasan</li><li>Kencangkan setiap sambungan pipa terkoneksi dengan nipple</li><li>Tambahkan refrigerant untuk menggantikan refrigerant yang hilang akibat kebocoran</li></ol><p></p>'),
('P010', 'PCB Kontrol Elektronik Error', 'PCB Electronic Control Error', 'Modul  PCB control unit AC merupakan bagian terpenting dalam system tata udara maupun pendingin  yang mengatur kerja keseluruhan unit AC. Modul PCB control mengatur seluruh proses yang berkaitan dengan kerja kompresor, kontrol suhu, on â€“ off dan kontrol kerja unit. PCB control terdiri atas berbagai komponen utama meliputi sensor, IC program, thermistor, trafo dan relay. Apabila salah satu komponen tersebut mengalami kerusakan maka fungsi PCB sebagai pengontrol kerja AC menyebabkan AC tidak berfungsi secara normal. Oleh karena itu tindakan service ac pada bagian modul PCB harus memperhatikan faktor pengukuran yang tepat.', '<ol><li>Membersihkan PCB Kontrol menggunakan contact cleanr<br></li><li>Reset aliran listrik utama pada MCB dengan cara mematikan aliran listrik, lalu sekitar 2 - 3 menit kemudian, nyalakan kembali.</li></ol>'),
('P011', 'Kerusakan Pada Rangkaian Listrik Atau Power Supply', 'Damage to the electrical circuit or power supply', '', '<p>solusinya adalah........</p>'),
('P012', 'Kerusakan Tidak Diketahui', 'Broken Not Found', '<p>Ac Anda Tidak Terdapat Kerusakan<br></p>', '<p>Mungkin anda sedang tidak fokus!!!!</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyebab`
--

CREATE TABLE `tbl_penyebab` (
  `id` int(11) NOT NULL,
  `kode_penyakit` varchar(5) DEFAULT NULL,
  `kode_gejala` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penyebab`
--

INSERT INTO `tbl_penyebab` (`id`, `kode_penyakit`, `kode_gejala`) VALUES
(279, 'P001', 'G001');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_analisa`
--

CREATE TABLE `tmp_analisa` (
  `noip` varchar(60) NOT NULL,
  `kode_penyakit` varchar(4) NOT NULL,
  `kode_gejala` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `noip` varchar(60) NOT NULL,
  `kode_gejala` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_pasien`
--

CREATE TABLE `tmp_pasien` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `usia` varchar(10) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `apa_yang_dirasakan` varchar(200) DEFAULT NULL,
  `noip` varchar(60) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_pasien`
--

INSERT INTO `tmp_pasien` (`id`, `nama_pasien`, `usia`, `jenkel`, `alamat`, `apa_yang_dirasakan`, `noip`, `tanggal`) VALUES
(4, 'Asep hj', '6', 'Laki-Laki', 'jhhjhjhj', NULL, '192.168.43.61', '2019-09-27 14:26:55'),
(5, 'test rasakan', '3 masehi', 'Laki-Laki', 'fgdsgfdgsdfg', 'Tak punya uang', '::1', '2019-09-27 15:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `noip` varchar(60) NOT NULL,
  `kode_penyakit` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `tbl_deskripsi`
--
ALTER TABLE `tbl_deskripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`kode_pengguna`);

--
-- Indexes for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `tbl_penyebab`
--
ALTER TABLE `tbl_penyebab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_penyakit` (`kode_penyakit`,`kode_gejala`),
  ADD KEY `kode_penyakit_2` (`kode_penyakit`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `tmp_analisa`
--
ALTER TABLE `tmp_analisa`
  ADD KEY `kode_penyakit` (`kode_penyakit`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_penyakit`
--
ALTER TABLE `tmp_penyakit`
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_penyebab`
--
ALTER TABLE `tbl_penyebab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
--
-- AUTO_INCREMENT for table `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  ADD CONSTRAINT `analisa_hasil_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `tbl_penyakit` (`kode_penyakit`);

--
-- Constraints for table `tbl_penyebab`
--
ALTER TABLE `tbl_penyebab`
  ADD CONSTRAINT `tbl_penyebab_ibfk_1` FOREIGN KEY (`kode_gejala`) REFERENCES `tbl_gejala` (`kode_gejala`),
  ADD CONSTRAINT `tbl_penyebab_ibfk_2` FOREIGN KEY (`kode_penyakit`) REFERENCES `tbl_penyakit` (`kode_penyakit`);

--
-- Constraints for table `tmp_analisa`
--
ALTER TABLE `tmp_analisa`
  ADD CONSTRAINT `tmp_analisa_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `tbl_penyakit` (`kode_penyakit`),
  ADD CONSTRAINT `tmp_analisa_ibfk_2` FOREIGN KEY (`kode_gejala`) REFERENCES `tbl_gejala` (`kode_gejala`);

--
-- Constraints for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD CONSTRAINT `tmp_gejala_ibfk_1` FOREIGN KEY (`kode_gejala`) REFERENCES `tbl_gejala` (`kode_gejala`);

--
-- Constraints for table `tmp_penyakit`
--
ALTER TABLE `tmp_penyakit`
  ADD CONSTRAINT `tmp_penyakit_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `tbl_penyakit` (`kode_penyakit`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
