-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Mar 2019 pada 16.57
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistempakar_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `analisa_hasil`
--

CREATE TABLE `analisa_hasil` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kode_penyakit` varchar(5) NOT NULL,
  `noip` varchar(60) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `analisa_hasil`
--

INSERT INTO `analisa_hasil` (`id`, `nama_pasien`, `kelamin`, `alamat`, `kode_penyakit`, `noip`, `tanggal`) VALUES
(16, 'fdfgsdf', 'Perempuan', 'dfgsdg', 'P001', '::1', '2018-08-27 14:53:11'),
(17, 'dsdfadf', 'Laki-Laki', 'dfsafasfd', 'P010', '::1', '2018-08-31 21:52:58'),
(18, 'dsfasdf', 'Perempuan', 'adfasfdsf', 'P012', '::1', '2018-08-31 21:58:30'),
(19, 'fdSFASDF', 'Laki-Laki', 'SDFASDF', 'P012', '::1', '2018-08-31 22:00:21'),
(20, 'hfghdfgh', 'Laki-Laki', 'ghdfgh', 'P001', '::1', '2018-09-03 20:43:23'),
(21, 'dfasdf', 'Perempuan', 'dfasdf', 'P002', '::1', '2018-09-18 23:10:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_deskripsi`
--

CREATE TABLE `tbl_deskripsi` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `des_utama` text NOT NULL,
  `des_admin` text NOT NULL,
  `des_superadmin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_deskripsi`
--

INSERT INTO `tbl_deskripsi` (`id`, `judul`, `des_utama`, `des_admin`, `des_superadmin`) VALUES
(1, ' Sistem Pakar Diagnosa Kerusakan AC', 'Aplikasi <b>Sistem Pakar</b> ini meniru cara berpikir seorang teknisi AC dalam melakukan diagnosis suatu kasus kerusakan. Aplikasi ini membantu dalam mencari kesimpulan akan kerusakan yang di terjadi beserta pencegahan dan perawatan yang sesuai. Perancangan sistem pakar ini menggunakan metode inferensi forward chaining, yaitu proses inferensi yang memulai pencarian dari premis menuju pada konklusi.', '<p>\r\n\r\nSelamat Datang Administrator, di halaman ini anda dapat menambah, manghapus, dan memperbarui data-data seperti&nbsp; Basis Pengetahuan mencangkup Data Gejala, Data Penyebab dan Data Kerusakan serta menentukan aturan yang ditentukan dalam diagnosa kerusakan.\r\n\r\n<br></p><p><b>DATA GEJALA<br>-&nbsp;\r\n\r\n</b>Data Gejala adalah data yang akan menjadi pertanyaan yang di ajukan kepada pengguna untuk mngetahui lebih lanjut kerusakan yang terdapat pada AC (Air Conditioner)</p><p><b>DATA PENYEBAB<br>\r\n\r\n</b>- Data Penyebab adalah data yang dihasilkan dari inputan gejala oleh pengguna. Tentukan penyebab apa saja yang terjadi sesuai dengan gejala-gejala yang sudah ditentukan<b><br></b></p><p><b>DATA KERUSAKAN<br>\r\n\r\n</b>- Data Kerusakan adalah data hasil dari output yang dihasilkan oleh penyebab. Tentukan kerusakan apa saja yang akan terjadi sesuai dengan gejala dan penyebab yang sudah di tentukan<b><br></b></p><p><b>BASIS PENGETAHUAN<br>\r\n\r\n\r\n\r\n</b>- Basis pengetahuan adalah sebuah hasil pengaturan penyesuaian aturan antara gejala dan kerusakan.<b>\r\n\r\n\r\n\r\n<br></b></p>', 'Aplikasi <b>Sistem Pakar</b> ini meniru cara berpikir seorang teknisi AC dalam melakukan diagnosis suatu kasus kerusakan. Aplikasi ini membantu dalam mencari kesimpulan akan kerusakan yang di terjadi beserta pencegahan dan perawatan yang sesuai. Perancangan sistem pakar ini menggunakan metode inferensi forward chaining, yaitu proses inferensi yang memulai pencarian dari premis menuju pada konklusi.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `kode_gejala` varchar(4) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`kode_gejala`, `nama_gejala`) VALUES
('G001', 'AC Mati Total'),
('G002', 'MCB Trip'),
('G003', 'Suara kompresor Berdengung dan Bergetar Keras Sebelum AC Mati Total'),
('G004', 'LED Indikator Unit Indoor Berkedip-Kedip'),
('G005', 'Tidak Ada Hembusan Udara Yang Keluar Dari Blower AC'),
('G006', 'Blower Tidak Bekerja Sama Sekali'),
('G007', 'Lilitan Motor Blower Putus'),
('G008', 'Ruangan AC Tidak Dingin'),
('G009', 'Suara Kipas Outdoor Berisik'),
('G010', 'Putaran Kipas Outdoor Tidak Lancar'),
('G011', 'Terdapat Pembekuan Pada Pipa Kecil'),
('G012', 'Ruangan AC Kurang Dingin'),
('G013', 'Hembusan Blower Terhambat dan Tidak Merata'),
('G014', 'Sirip-Sirip Evaporator Tersumbat'),
('G015', 'Coil Kondensor Terasa Sangat Panas'),
('G016', 'Sirip-Sirip Kondensor Tersumbat'),
('G017', 'Kompresor Tidak Bekerja'),
('G018', 'Kapasitor Kompresor Tampak Gembung/Pecah'),
('G019', 'Putaran Kipas Outdoor Lemah/Kipas Tidak Bekerja Sama Sekali'),
('G020', 'Tidak Ada Kerusakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
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
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`kode_pengguna`, `nama_pengguna`, `tgl_daftar`, `username`, `pass`, `hak_akses`) VALUES
('53906091255', 'Super Admin', '2016-04-05', 'superadmin', 'Xh3VnxNVkwcQRAvLwNf2blnehgOvy8kUxVlv5GF4HFA=', 'Super Admin'),
('53975975893', 'Administrator', '2016-04-12', 'admin', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penyakit`
--

CREATE TABLE `tbl_penyakit` (
  `kode_penyakit` varchar(4) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `nama_latin` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penyakit`
--

INSERT INTO `tbl_penyakit` (`kode_penyakit`, `nama_penyakit`, `nama_latin`, `deskripsi`, `solusi`) VALUES
('P001', 'Kompresor Rusak', 'Broken Compressor', '<p>\r\n\r\nKompresor AC rusak menyebabkan unit AC tidak bekerja menghasilkan pendinginan ruangan atau dengan kata lain ac mati atau ac panas.\r\n\r\n<br></p>', 'Ganti kompresor dengan yang baru'),
('P002', 'Motor Blower Rusak', 'Broken Blower Motor', 'Motor blower merupakan motor penggerak blower sehingga blower dapat berputar.&nbsp;\r\n\r\nkerusakan motor blower yang sering terjadi adalah kapasitor mati/lemah, laher/bearing aus, dan lilitan', '<p>Ganti Motor Blower dengan yang baru</p>'),
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
-- Struktur dari tabel `tbl_penyebab`
--

CREATE TABLE `tbl_penyebab` (
  `id` int(11) NOT NULL,
  `kode_penyakit` varchar(5) DEFAULT NULL,
  `kode_gejala` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penyebab`
--

INSERT INTO `tbl_penyebab` (`id`, `kode_penyakit`, `kode_gejala`) VALUES
(229, 'P001', 'G001'),
(230, 'P001', 'G002'),
(231, 'P001', 'G003'),
(233, 'P002', 'G005'),
(234, 'P002', 'G006'),
(235, 'P002', 'G007'),
(237, 'P003', 'G008'),
(238, 'P003', 'G009'),
(239, 'P003', 'G010'),
(253, 'P004', 'G012'),
(254, 'P004', 'G013'),
(255, 'P004', 'G014'),
(257, 'P005', 'G012'),
(258, 'P005', 'G015'),
(259, 'P005', 'G016'),
(261, 'P006', 'G008'),
(262, 'P006', 'G017'),
(263, 'P006', 'G018'),
(265, 'P007', 'G008'),
(266, 'P007', 'G019'),
(268, 'P008', 'G001'),
(269, 'P008', 'G002'),
(271, 'P009', 'G008'),
(272, 'P009', 'G011'),
(274, 'P010', 'G001'),
(275, 'P010', 'G004'),
(276, 'P011', 'G001'),
(278, 'P012', 'G020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_analisa`
--

CREATE TABLE `tmp_analisa` (
  `noip` varchar(60) NOT NULL,
  `kode_penyakit` varchar(4) NOT NULL,
  `kode_gejala` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `noip` varchar(60) NOT NULL,
  `kode_gejala` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_pasien`
--

CREATE TABLE `tmp_pasien` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `noip` varchar(60) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_penyakit`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  ADD CONSTRAINT `analisa_hasil_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `tbl_penyakit` (`kode_penyakit`);

--
-- Ketidakleluasaan untuk tabel `tbl_penyebab`
--
ALTER TABLE `tbl_penyebab`
  ADD CONSTRAINT `tbl_penyebab_ibfk_1` FOREIGN KEY (`kode_gejala`) REFERENCES `tbl_gejala` (`kode_gejala`),
  ADD CONSTRAINT `tbl_penyebab_ibfk_2` FOREIGN KEY (`kode_penyakit`) REFERENCES `tbl_penyakit` (`kode_penyakit`);

--
-- Ketidakleluasaan untuk tabel `tmp_analisa`
--
ALTER TABLE `tmp_analisa`
  ADD CONSTRAINT `tmp_analisa_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `tbl_penyakit` (`kode_penyakit`),
  ADD CONSTRAINT `tmp_analisa_ibfk_2` FOREIGN KEY (`kode_gejala`) REFERENCES `tbl_gejala` (`kode_gejala`);

--
-- Ketidakleluasaan untuk tabel `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD CONSTRAINT `tmp_gejala_ibfk_1` FOREIGN KEY (`kode_gejala`) REFERENCES `tbl_gejala` (`kode_gejala`);

--
-- Ketidakleluasaan untuk tabel `tmp_penyakit`
--
ALTER TABLE `tmp_penyakit`
  ADD CONSTRAINT `tmp_penyakit_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `tbl_penyakit` (`kode_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
