-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2021 pada 04.55
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig_pelayanan_kesehatan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `email`, `password`) VALUES
('admin', 'admin@gmail.com', 'c93ccd78b2076528346216b3b2f701e6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `marker`
--

CREATE TABLE `marker` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `tipe` int(11) NOT NULL,
  `awal_hari` varchar(100) NOT NULL,
  `akhir_hari` varchar(100) NOT NULL,
  `awal_jam` time NOT NULL,
  `akhir_jam` time NOT NULL,
  `note` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `marker`
--

INSERT INTO `marker` (`id`, `nama`, `alamat`, `longitude`, `latitude`, `tipe`, `awal_hari`, `akhir_hari`, `awal_jam`, `akhir_jam`, `note`, `gambar`) VALUES
(1, 'Rumah Sakit Umum Universitas Muhammadiyah Malang', 'Jl. Tlogomas No.45, Dusun Rambaan, Landungsari, Kec. Dau, Kota Malang, Jawa Timur 65144', 112.599167, -7.925790, 1, 'Senin', 'Minggu', '06:00:00', '23:00:00', 'Buka Setiap Hari\r\nPelayanan UGD 24 Jam\r\nMelayani Tes Covid', 'RS-UMM.jpeg'),
(2, 'RSI Unisma', 'Jalan Mayjen Haryono No.139, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', 112.608833, -7.940263, 1, '', '', '00:00:00', '00:00:00', '', ''),
(3, 'Rumah Sakit Permata Bunda', 'Jl. Soekarno - Hatta No.75, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142', 112.624825, -7.938896, 1, '', '', '00:00:00', '00:00:00', '', ''),
(4, 'Rumah Sakit Universitas Brawijaya', 'Jl. Soekarno - Hatta, Lowokwaru, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 112.621536, -7.941227, 1, '', '', '00:00:00', '00:00:00', '', ''),
(5, 'Rumah Sakit Ibu & Anak Galeri Candra', 'Jl. Andong No.3, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 112.619576, -7.947945, 1, '', '', '00:00:00', '00:00:00', '', ''),
(6, 'RSU BRIMEDIKA MALANG', 'Jl. Mayjend Panjaitan No.176, Penanggungan, Kec. Klojen, Kota Malang, Jawa Timur 65113', 112.618401, -7.952293, 1, '', '', '00:00:00', '00:00:00', '', ''),
(7, 'Rumah Bersalin Pemda Malang', 'JL R. Panji Suroso, No. 9, Purwodadi, Kec. Blimbing, Kota Malang, Jawa Timur 65126', 112.650307, -7.931940, 1, '', '', '00:00:00', '00:00:00', '', ''),
(8, 'Rumah Sakit Persada', 'Kompleks Araya Business Centre Kav. 2-4 Jalan Panji Suroso Blimbing Purwodadi Blimbing Kota Malang Jawa Timur 65126 ID, Jl. Raden Panji Suroso No.4, Purwodadi, Kec. Blimbing, Kota Malang, Jawa Timur 65126', 112.650208, -7.934986, 1, '', '', '00:00:00', '00:00:00', '', ''),
(9, 'Rumah Sakit Ibu Dan Anak Puri Bunda', 'Jl. Simpang Sulfat Utara No.60A, Pandanwangi, Kec. Blimbing, Kota Malang, Jawa Timur 65126', 112.655533, -7.958765, 1, '', '', '00:00:00', '00:00:00', '', ''),
(10, 'Rumah Sakit Lavalette', 'Jl. W.R. Supratman No.10, Rampal Celaket, Kec. Klojen, Kota Malang, Jawa Timur 65111', 112.637924, -7.965755, 1, '', '', '00:00:00', '00:00:00', '', ''),
(11, 'RSIA Mutiara Bunda', 'Jl. Ciujung No.19, Purwantoro, Kec. Blimbing, Kota Malang, Jawa Timur 65126', 112.641045, -7.953370, 1, '', '', '00:00:00', '00:00:00', '', ''),
(12, 'RSIA Husada Bunda', 'Malang No. 2, Jl. Pahlawan Trip, Oro-oro Dowo, Klojen, Malang City, East Java 65112', 112.622818, -7.968285, 1, '', '', '00:00:00', '00:00:00', '', ''),
(13, 'RSUD Dr Saiful Anwar Malang', 'Jl. Jaksa Agung Suprapto No.2, Klojen, Kec. Klojen, Kota Malang, Jawa Timur 65111', 112.631546, -7.972567, 1, '', '', '00:00:00', '00:00:00', '', ''),
(14, 'RSIA Puri', 'Jl. Taman Slamet No.20, Gading Kasri, Kec. Klojen, Kota Malang, Jawa Timur 65115', 112.621849, -7.974210, 1, '', '', '00:00:00', '00:00:00', '', ''),
(15, 'Rumah Sakit Hermina Tangkubanprahu', 'Jl. Tangkuban Perahu No.31-33, Kauman, Kec. Klojen, Kota Malang, Jawa Timur 65119', 112.624527, -7.978074, 1, '', '', '00:00:00', '00:00:00', '', ''),
(16, 'Rumah Sakit Ibu dan Anak Mardi Waloeja', 'i, Jl. Kauman No.23, Kauman, Kec. Klojen, Kota Malang, Jawa Timur 65119', 112.627785, -7.982980, 1, '', '', '00:00:00', '00:00:00', '', ''),
(17, 'Rumah Sakit Panti Waluya Sawahan', 'Jl. Nusakambangan No.56, Kasin, Kec. Klojen, Kota Malang, Jawa Timur 65117', 112.624969, -7.986567, 1, '', '', '00:00:00', '00:00:00', '', ''),
(18, 'RSI Aisyiyah Malang', 'Jl. Sulawesi No.16, Kasin, Kec. Klojen, Kota Malang, Jawa Timur 65117', 112.625450, -7.988681, 1, '', '', '00:00:00', '00:00:00', '', ''),
(19, 'Rumah Sakit Tentara Dokter Soepraoen', 'Jl. S. Supriadi No.22, Sukun, Kec. Sukun, Kota Malang, Jawa Timur 65112', 112.620483, -7.989864, 1, '', '', '00:00:00', '00:00:00', '', ''),
(20, 'Rumah Sakit Panti Nirmala', 'Jl. Kebalen Wetan No.2-8, Kotalama, Kec. Kedungkandang, Kota Malang, Jawa Timur 65134', 112.634056, -7.994312, 1, '', '', '00:00:00', '00:00:00', '', ''),
(21, 'RSUD KOTA MALANG', 'Jl. Rajasa No.27, Bumiayu, Kec. Kedungkandang, Kota Malang, Jawa Timur 65116', 112.639397, -8.026348, 1, '', '', '00:00:00', '00:00:00', '', ''),
(22, 'Rumah Sakit Ibu Dan Anak Refa Husada', 'Jl. Mayjend Sungkono No. 9 RT. 005 RW. 004, Tlogowaru, Kedungkandang, Tlogowaru, Kec. Kedungkandang, Kota Malang, Jawa Timur 65132', 112.642685, -8.035723, 1, '', '', '00:00:00', '00:00:00', '', ''),
(23, 'RSIA Mardi Waloeja Rampal', 'Jl. W.R. Supratman No.1, Rampal Celaket, Kec. Klojen, Kota Malang, Jawa Timur 65111', 112.635231, -7.964898, 1, '', '', '00:00:00', '00:00:00', '', ''),
(24, 'Praktek Dokter Nur Laili Susanti', 'Jl. Joyo Suryo, Tlogomas, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', 112.602150, -7.937604, 2, '', '', '00:00:00', '00:00:00', '', ''),
(25, 'Praktek Umum Dr. Dhanti Hermawan', 'Jl. MT Haryono Gg. VIII Jl. MT. Haryono, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', 112.608315, -7.940883, 2, '', '', '00:00:00', '00:00:00', '', ''),
(26, 'Praktek Dr. Rejekining Diah', 'Jalan Mayjend Jl. MT. Haryono No.110, Dinoyo, Lowokwaru, Malang City, East Java 65144', 112.609375, -7.942076, 2, '', '', '00:00:00', '00:00:00', '', ''),
(27, 'Praktek dr. Wahyu Purnomo dan dr. Emmi Wijayanti', 'Jl. Joyo Tambaksari No.30 B, Merjosari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', 112.606384, -7.944394, 2, '', '', '00:00:00', '00:00:00', '', ''),
(28, 'Praktek Umum Dr. Feny Tunjungsari', 'Jl. Soekarno Hatta No.6, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142', 112.631645, -7.939524, 2, '', '', '00:00:00', '00:00:00', '', ''),
(29, 'Praktek Dokter Bersama', 'Jl. Laksda Adi Sucipto No.150, Blimbing, Kec. Blimbing, Kota Malang, Jawa Timur 65126', 112.648605, -7.944106, 2, '', '', '00:00:00', '00:00:00', '', ''),
(30, 'Dokter Anak Dr. Astri. Sp.a', 'Jl. Sigura - Gura, Karangbesuki, Kec. Sukun, Kota Malang, Jawa Timur 65145', 112.605865, -7.957004, 2, '', '', '00:00:00', '00:00:00', '', ''),
(31, 'Praktek Dokter Spesialis Anak dr. Ery Olivianto, SpA', 'ruko kav 6, Jl. Terusan Sulfat, Pandanwangi, Kec. Blimbing, Kota Malang, Jawa Timur', 112.656944, -7.963983, 2, '', '', '00:00:00', '00:00:00', '', ''),
(32, 'Dokter Spesialis Penyakit Dalam Dr. A. Heri Susanto, Sp.PD', 'Alveoli Praktek Dokter Bersama, Jl. Sulfat No.84, Purwantoro, Kec. Blimbing, Kota Malang, Jawa Timur 65122', 112.648476, -7.959348, 2, '', '', '00:00:00', '00:00:00', '', ''),
(33, 'Praktek umum Dr. Frieska', 'Jl. Bend. Nawangan No.5, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', 112.611031, -7.960977, 2, '', '', '00:00:00', '00:00:00', '', ''),
(34, 'Spesialis Kulit Dan Kelamin Dr. Boedhy Setyanto, SpKK', 'Apotek Kimia Farma, Jl. MT. Haryono No.110, Dinoyo, Lowokwaru, Malang City, East Java 65144', 112.609406, -7.941962, 2, '', '', '00:00:00', '00:00:00', '', ''),
(35, 'Dr. L.N Rachma', 'Jl. Joyo Suryo, Merjosari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', 112.601532, -7.940612, 2, '', '', '00:00:00', '00:00:00', '', ''),
(36, 'Praktek Dokter dr. H. Marindra ,FM', 'Jl. Tlk. Grajakan, Pandanwangi, Kec. Blimbing, Kota Malang, Jawa Timur 65125', 112.657600, -7.946532, 2, '', '', '00:00:00', '00:00:00', '', ''),
(37, 'Dr. Chandra Eka AP Praktek Umum', 'Jl. Mayjend Panjaitan No.162, Penanggungan, Kec. Klojen, Kota Malang, Jawa Timur 65113', 112.619675, -7.953441, 2, '', '', '00:00:00', '00:00:00', '', ''),
(38, 'Praktek Umum Dr. Putu Yuda', 'Jl. Setaman No.5, Lowokwaru, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 112.632423, -7.953165, 2, '', '', '00:00:00', '00:00:00', '', ''),
(39, 'Dr. Anton. A. M. MMRS', 'Jl. Raya Candi VD, Karangbesuki, Kec. Sukun, Kota Malang, Jawa Timur 65146', 112.599274, -7.957585, 2, '', '', '00:00:00', '00:00:00', '', ''),
(40, 'Praktek Umum Dr. Emira Darmawati', 'Jl. Raya Cemorokandang, Madyopuro, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139', 112.675018, -7.975287, 2, '', '', '00:00:00', '00:00:00', '', ''),
(41, 'Dokter Umum Dr Qurratul Aini', 'Jl. Raya Cemorokandang, Cemorokandang, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139', 112.681793, -7.978888, 2, '', '', '00:00:00', '00:00:00', '', ''),
(42, 'Praktek Umum dr.HM Sudarto', 'Jl. Kaliurang Bar., Samaan, Kec. Klojen, Kota Malang, Jawa Timur 65112', 112.628815, -7.961278, 2, '', '', '00:00:00', '00:00:00', '', ''),
(43, 'Praktek Dr. dr. Suparno', 'Jl. Letjen Sutoyo No.4, Lowokwaru, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 112.636620, -7.960178, 2, '', '', '00:00:00', '00:00:00', '', ''),
(44, 'Praktek dr. Soemakto,Sp.A(K)', 'Jl. Tambora No.21, Karangbesuki, Kec. Sukun, Kota Malang, Jawa Timur 65146', 112.611206, -7.969442, 2, '', '', '00:00:00', '00:00:00', '', ''),
(45, 'Praktek Dokter Dr. M Kamal Hadi', 'Jl. Galunggung, Gading Kasri, Kec. Klojen, Kota Malang, Jawa Timur 65115', 112.613762, -7.969944, 2, '', '', '00:00:00', '00:00:00', '', ''),
(46, 'Praktek Dokter Olly Indrayani,Sp.PD.', 'Jl. Dempo No.4, Oro-oro Dowo, Kec. Klojen, Kota Malang, Jawa Timur 65119', 112.621323, -7.969298, 2, '', '', '00:00:00', '00:00:00', '', ''),
(47, 'Praktek Dokter Yusuf Ardian', 'Ruko Sawojajar Mas, Jalan Danau Toba, Sawojajar, Kedungkandang, Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139', 112.656754, -7.980369, 2, '', '', '00:00:00', '00:00:00', '', ''),
(48, 'Praktek Dokter Ervina Wijaya', 'Jl. I.R. Rais, Tanjungrejo, Kec. Sukun, Kota Malang, Jawa Timur 65119', 112.614883, -7.983562, 2, '', '', '00:00:00', '00:00:00', '', ''),
(49, 'Dr. Harjono Praktek Umum', 'Jl. Brigjend. Katamso, Kauman, Kec. Klojen, Kota Malang, Jawa Timur 65119', 112.624748, -7.983591, 2, '', '', '00:00:00', '00:00:00', '', ''),
(50, 'Praktek Bersama Dokter Spesialis & Laboratorium Nusakambangan', 'Jl. Nusakambangan, Kasin, Kec. Klojen, Kota Malang, Jawa Timur 65117', 112.625069, -7.987759, 2, '', '', '00:00:00', '00:00:00', '', ''),
(51, 'Praktek Dokter Umum', 'Jl. Kyai Tamin 71, Sukoharjo, Kec. Klojen, Kota Malang, Jawa Timur 65118', 112.633347, -7.988544, 2, '', '', '00:00:00', '00:00:00', '', ''),
(52, 'Praktek Dokter Umum', 'Jl. Raya Sidorahayu, Sidorahayu, Kec. Sukun, Kota Malang, Jawa Timur 65158', 112.598099, -8.003603, 2, '', '', '00:00:00', '00:00:00', '', ''),
(53, 'Puskesmas Kedungkandang', 'Jl. Ki Ageng Gribig No.142 Kedungkandang', 112.648148, -7.993084, 3, '', '', '00:00:00', '00:00:00', '', ''),
(54, 'Puskesmas Gribig', 'Jl. Ki Ageng Gribig No.97 Kedungkandang', 112.665321, -7.980650, 3, '', '', '00:00:00', '00:00:00', '', ''),
(55, 'Puskesmas Arjowinangun', 'Jl. Arjowinangun No.2 Kedungkandang', 112.641838, -8.038589, 3, '', '', '00:00:00', '00:00:00', '', ''),
(56, 'Puskesmas Janti', 'Jl. Janti Barat No.88 Sukun', 112.620583, -8.000975, 3, '', '', '00:00:00', '00:00:00', '', ''),
(57, 'Puskesmas Ciptomulyo', 'Jl. Kol. Sugiyono VIII No.54 Sukun', 112.630005, -8.002010, 3, '', '', '00:00:00', '00:00:00', '', ''),
(58, 'Puskesmas Mulyorejo', 'Jl. Budi Utomo No.18A Sukun', 112.597694, -7.987866, 3, '', '', '00:00:00', '00:00:00', '', ''),
(59, 'Puskesmas Arjuno', 'Jl. Arjuno No.17 Klojen', 112.626671, -7.978121, 3, '', '', '00:00:00', '00:00:00', '', ''),
(60, 'Puskesmas Bareng', 'Jl. Bareng Tebes No.10A Klojen', 112.622849, -7.978190, 3, '', '', '00:00:00', '00:00:00', '', ''),
(61, 'Puskesmas Rampal Celaket', 'Jl. Simpang Kasembon No.5 Klojen', 112.631676, -7.964256, 3, '', '', '00:00:00', '00:00:00', '', ''),
(62, 'Puskesmas Kendalkerep', 'Jl. Sulfat No.100 Blimbing', 112.650879, -7.961204, 3, '', '', '00:00:00', '00:00:00', '', ''),
(63, 'Puskesmas Cisadea', 'Jl. Cisadea No.19 Blimbing', 112.643616, -7.955413, 3, '', '', '00:00:00', '00:00:00', '', ''),
(64, 'Puskesmas Pandanwangi', 'Jl. L.A. Sucipto No.315 Blimbing', 112.655525, -7.947313, 3, '', '', '00:00:00', '00:00:00', '', ''),
(65, 'Puskesmas Dinoyo', 'Jl. Keramik No.2 Lowokwaru', 112.611298, -7.943266, 3, '', '', '00:00:00', '00:00:00', '', ''),
(66, 'Puskesmas Kendalsari', 'Jl. Cengger Ayam No.8 Lowokwaru', 112.630852, -7.946256, 3, '', '', '00:00:00', '00:00:00', '', ''),
(67, 'Puskesmas Mojolangu', 'Jl. Sudimoro No.17A Lowokwaru', 112.632225, -7.938376, 3, '', '', '00:00:00', '00:00:00', '', ''),
(68, 'Puskesmas Polowijen', 'Jl. Panji Suroso No.9 Malang', 112.650291, -7.932147, 3, '', '', '00:00:00', '00:00:00', '', ''),
(69, 'Psychosense Training & Consulting', 'Jl. Arjuna No. 26', 112.627663, -7.977560, 4, '', '', '00:00:00', '00:00:00', '', ''),
(70, 'Rumah Ramah Djiwa', 'Jl. Kembang Sepatu No. 6', 112.630646, -7.949937, 4, '', '', '00:00:00', '00:00:00', '', ''),
(71, 'Divine Consulting', 'Jl. Joyo Utomo V Blk. F No.13', 112.601357, -7.943520, 4, '', '', '00:00:00', '00:00:00', '', ''),
(72, 'Psycho Center Univ. Negeri Malang', 'Jl. Veteran No. 9, Sumbersari', 112.620277, -7.959284, 4, '', '', '00:00:00', '00:00:00', '', ''),
(73, 'Psikologi Clarinta', 'JL. Bandung X, 8600, Penanggungan, Kec. Klojen', 112.622086, -7.960610, 4, '', '', '00:00:00', '00:00:00', '', ''),
(74, 'PT. Talenta Plus', 'Ruko Soekarno Hatta Indah, JL. Soekarno Hatta, Blok D/2', 112.631088, -7.940479, 4, '', '', '00:00:00', '00:00:00', '', ''),
(75, 'dr. Buntoro,Sp.KJ', 'Jl. Semeru No.45, RW.3, Kauman, Klojen', 112.623711, -7.973346, 4, '', '', '00:00:00', '00:00:00', '', ''),
(76, 'Klinik Psikologi dr. Atik S. SH. MPd Psikolog', 'Jl. Kedawung, Tulusrejo, Kec. Lowokwaru', 112.634598, -7.951871, 4, '', '', '00:00:00', '00:00:00', '', ''),
(77, 'Totok Agus Suyono, M.mkes, Psi', 'Jl. Simpang Borobudur Utara, Mojolangu, Kec. Lowokwaru', 112.641083, -7.937615, 4, '', '', '00:00:00', '00:00:00', '', ''),
(78, 'dr. M. Hendrarko,Sp.KJ', 'JL. Tumenggang Suryo, 100-A, Bunulrejo, Kec. Blimbing', 112.639931, -7.964142, 4, '', '', '00:00:00', '00:00:00', '', ''),
(79, 'Apotek Paramita', 'P, A-1, Jl. A. Yani, Purwodadi, Kec. Blimbing, Kota Malang, Jawa Timur 65128', 112.645149, -7.935635, 5, '', '', '00:00:00', '00:00:00', '', ''),
(80, 'Apotek Jingga Farma', 'Ruko Puncak Borobudur, Jalan Terusan Soekarno Hatta No.Kav. 1, Mojolangu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65142', 112.626144, -7.936519, 5, '', '', '00:00:00', '00:00:00', '', ''),
(81, 'Apotek Cempaka', 'Jl. Laksda Adi Sucipto No.54, Blimbing, Kec. Blimbing, Kota Malang, Jawa Timur 65126', 112.645012, -7.942136, 5, '', '', '00:00:00', '00:00:00', '', ''),
(82, 'Apotek Andhika', 'Jl. MT. Haryono, Dinoyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', 112.609756, -7.942356, 5, '', '', '00:00:00', '00:00:00', '', ''),
(83, 'Amanah Husana Apotek', 'Jl. Kalpataru No.18, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 112.631256, -7.950828, 5, '', '', '00:00:00', '00:00:00', '', ''),
(84, 'Apotek Pandanwangi', 'Jl. Simpang Sulfat Utara No.48, Pandanwangi, Kec. Blimbing, Kota Malang, Jawa Timur 65124', 112.655922, -7.957909, 5, '', '', '00:00:00', '00:00:00', '', ''),
(85, 'Apotek Pelita Sari', 'Jl. Letjen Sutoyo No.31A, RW.3, Lowokwaru, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141', 112.636177, -7.961573, 5, '', '', '00:00:00', '00:00:00', '', ''),
(86, 'Apotek Sutami', 'Jl. Bendungan Sutami No.3, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', 112.613342, -7.960759, 5, '', '', '00:00:00', '00:00:00', '', ''),
(87, 'Aptoek Efata', 'Jl. Galunggung, Gading Kasri, Kec. Klojen, Kota Malang, Jawa Timur 65115', 112.613441, -7.968584, 5, '', '', '00:00:00', '00:00:00', '', ''),
(88, 'Kimia Farma No.36 Malang', 'Jl. Ijen No.88, Oro-oro Dowo, Kec. Klojen, Kota Malang, Jawa Timur 65116', 112.625046, -7.963681, 5, '', '', '00:00:00', '00:00:00', '', ''),
(89, 'Apotek Sumber Laris ', 'Jl. Pahlawan Trip No.17, Oro-oro Dowo, Kec. Klojen, Kota Malang, Jawa Timur 65119', 112.620682, -7.967721, 5, '', '', '00:00:00', '00:00:00', '', ''),
(90, 'Pandermen Apotek', 'Jl. Panderman No.6, Gading Kasri, Kec. Klojen, Kota Malang, Jawa Timur 65115', 112.620041, -7.974606, 5, '', '', '00:00:00', '00:00:00', '', ''),
(91, 'Tanjung Apotek ', 'JL. Ihwan Ridwan Rais No.88, Bareng, Kec. Klojen, Kota Malang, Jawa Timur 65116', 112.615051, -7.983274, 5, '', '', '00:00:00', '00:00:00', '', ''),
(92, 'Apotek Sukun Farma', 'Jl. S. Supriadi No.24, Sukun, Kec. Sukun, Kota Malang, Jawa Timur 65147', 112.620148, -7.994191, 5, '', '', '00:00:00', '00:00:00', '', ''),
(93, 'Apotek Deltara', 'Jl. Raya Tumenggung Suryo, Purwantoro, Kec. Blimbing, Kota Malang, Jawa Timur 65126', 112.641060, -7.962595, 5, '', '', '00:00:00', '00:00:00', '', ''),
(94, 'Apotek Sulfat', 'Jl. Terusan Sulfat, Bunulrejo, Kec. Blimbing, Kota Malang, Jawa Timur 65126', 112.659218, -7.966039, 5, '', '', '00:00:00', '00:00:00', '', ''),
(95, 'Apotek Bunul Farma', 'Jalan Hamid Rusdi No.101 G, Kesatrian, Blimbing, Bunulrejo, Kec. Blimbing, Kota Malang, Jawa Timur 65126', 112.644279, -7.971477, 5, '', '', '00:00:00', '00:00:00', '', ''),
(96, 'Apotek Kamilia', 'Jl. Danau Bratan No.A/16, Lesanpuro, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139', 112.663445, -7.976394, 5, '', '', '00:00:00', '00:00:00', '', ''),
(97, 'Apotek Mataram Segar', 'Jalan Danau Toba Ruko Blok B No.16, Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur 65138', 112.656235, -7.980605, 5, '', '', '00:00:00', '00:00:00', '', ''),
(98, 'Apotek Pajajaran', 'Jl. Pajajaran No.12, Klojen, Kec. Klojen, Kota Malang, Jawa Timur 65111', 112.635811, -7.975718, 5, '', '', '00:00:00', '00:00:00', '', ''),
(99, 'Apotek Berlima', 'Jl. Aries Munandar, Kiduldalem, Kec. Klojen, Kota Malang, Jawa Timur 65119', 112.634445, -7.981568, 5, '', '', '00:00:00', '00:00:00', '', ''),
(100, 'Apotek Sejati', 'Jl. Merdeka Timur No.2-10, Sukoharjo, Kec. Klojen, Kota Malang, Jawa Timur 65119', 112.631744, -7.982672, 5, '', '', '00:00:00', '00:00:00', '', ''),
(101, 'Apotek Jaya Sehat', 'Jl. Pasar Besar No.90, Sukoharjo, Kec. Klojen, Kota Malang, Jawa Timur 65118', 112.633995, -7.986412, 5, '', '', '00:00:00', '00:00:00', '', ''),
(102, 'Apotek Airlangga', 'Jl. Kyai Tamin, Sukoharjo, Kec. Klojen, Kota Malang, Jawa Timur 65118', 112.632378, -7.988208, 5, '', '', '00:00:00', '00:00:00', '', ''),
(103, 'Apotek Nusakambangan ', 'Jl. Nusakambangan No.29, Kasin, Kec. Klojen, Kota Malang, Jawa Timur 65117', 112.624252, -7.987233, 5, '', '', '00:00:00', '00:00:00', '', ''),
(104, 'Apotek Sukun Farma', 'Jl. S. Supriadi No.24, Sukun, Kec. Sukun, Kota Malang, Jawa Timur 65147', 112.620148, -7.994191, 5, '', '', '00:00:00', '00:00:00', '', ''),
(105, 'Apotek Merjosari', 'Jl. Joyo Tambaksari No.32 A, Merjosari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65144', 112.605965, -7.944403, 5, '', '', '00:00:00', '00:00:00', '', ''),
(106, 'Apotek K-24 Gajayana', 'Jl. Raya Sumbersari No.Kav. 4, Ketawanggede, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', 112.609116, -7.951851, 5, '', '', '00:00:00', '00:00:00', '', ''),
(107, 'Apotek Medika 24', 'Jl. Bend. Sigura-Gura Barat, Karangbesuki, Kec. Sukun, Kota Malang, Jawa Timur 65149', 112.606110, -7.955689, 5, '', '', '00:00:00', '00:00:00', '', ''),
(108, 'Apotek Telaga Nabi', 'Jl. Raya Sumbersari No.254C, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145', 112.611092, -7.954763, 5, '', '', '00:00:00', '00:00:00', '', ''),
(109, 'Klinik Panti Rahayu', 'Jl. Simp. Borobudur No.1, Malang', 112.638405, -7.946004, 6, '', '', '00:00:00', '00:00:00', '', ''),
(110, 'Klinik Malang Eye Centre', 'Jl. Dr. Cipto No. 3, Malang', 112.644440, -7.983647, 6, '', '', '00:00:00', '00:00:00', '', ''),
(111, 'Klinik Rawat Inap Muhammadiyah Malang', 'Jl. A. Yani No.165, Purwodadi, Kec. Blimbing, Kota Malang', 112.608887, -7.952633, 6, '', '', '00:00:00', '00:00:00', '', ''),
(112, 'Klinik Keluarga Sejahtera', 'Jl. Pattimura No. 14A, Malang', 112.633873, -7.972970, 6, '', '', '00:00:00', '00:00:00', '', ''),
(113, 'Klinik Adi Bungsu', 'Jl. Ki Ageng Gribig No. 1, Malang', 112.658768, -7.983254, 6, '', '', '00:00:00', '00:00:00', '', ''),
(114, 'Klinik Nayaka Husada 01', 'Jl. A. Yani No.20 F', 112.639938, -7.943331, 6, '', '', '00:00:00', '00:00:00', '', ''),
(115, 'Klinik Widya Husada', 'Jl. Sudimoro No. 16', 112.630135, -7.938224, 6, '', '', '00:00:00', '00:00:00', '', ''),
(116, 'Klinik Higina Medical Centre', 'Jl. Ronggowarsito No. 23', 112.634064, -7.976250, 6, '', '', '00:00:00', '00:00:00', '', ''),
(117, 'Klinik Panglima Sudirman', 'Jl. R. Tumenggung Suryo No.22', 112.637039, -7.965925, 6, '', '', '00:00:00', '00:00:00', '', ''),
(118, 'Klinik Karya Nusantara Medika', 'Jl. Maninjau Raya No. 33', 112.654190, -7.976901, 6, '', '', '00:00:00', '00:00:00', '', ''),
(119, 'Klinik Sabilillah Medical Service', 'Jl. Candi Kidal No.6', 112.638741, -7.941617, 6, '', '', '00:00:00', '00:00:00', '', ''),
(120, 'Klinik Telemedika Health Centre', 'Jl. Raya Danau Sentani Blok 4', 112.660759, -7.979566, 6, '', '', '00:00:00', '00:00:00', '', ''),
(121, 'Klinik RN. Klayatan', 'Jl. Klayatan III No. 2', 112.611053, -8.004090, 6, '', '', '00:00:00', '00:00:00', '', ''),
(122, 'Klinik Bhayangkara Polres Kota Malang', 'Jl. Pahlawan Trip No. 1', 112.620476, -7.968700, 6, '', '', '00:00:00', '00:00:00', '', ''),
(123, 'Klinik Wira Husada', 'Jl. S. Supriadi No. 23', 112.586380, -7.990568, 6, '', '', '00:00:00', '00:00:00', '', ''),
(124, 'Klinik Bahrul Maghfiroh Cinta Indonesia', 'Jl. Batu Permata No.1', 112.600998, -7.933755, 6, '', '', '00:00:00', '00:00:00', '', ''),
(125, 'Klinik Rampal Denkesyah', 'Jl. Panglima Sudirman D 9A', 112.636436, -7.975910, 6, '', '', '00:00:00', '00:00:00', '', ''),
(126, 'Klinik Hamid Rusdi', 'Jl. Hamid Rusdi No.45', 112.639244, -7.967903, 6, '', '', '00:00:00', '00:00:00', '', ''),
(127, 'Klinik Universitas Brawijaya', 'Jl. MT. Haryono, Ketawanggede, Kec. Lowokwaru, Kota Malang', 112.613701, -7.950498, 6, '', '', '00:00:00', '00:00:00', '', ''),
(128, 'Klinik Delta', 'Jl. Raya Kepuh No. 47', 112.618065, -8.012545, 6, '', '', '00:00:00', '00:00:00', '', ''),
(129, 'Klinik Kimia Farma Bromo', 'Jl. Bromo No.1', 112.622910, -7.978864, 6, '', '', '00:00:00', '00:00:00', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `nomor`, `pesan`) VALUES
(10, 'Fajar', 'mohammadmalikfajar17@gmail.com', '082244085965', 'Perlu pengembangan lagi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `nama_tipe`) VALUES
(1, 'Rumah Sakit'),
(2, 'Dokter Praktek'),
(3, 'Puskesmas'),
(4, 'Psikiater'),
(5, 'Apotek'),
(6, 'Klinik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `marker`
--
ALTER TABLE `marker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipe` (`tipe`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `marker`
--
ALTER TABLE `marker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `marker`
--
ALTER TABLE `marker`
  ADD CONSTRAINT `tipe` FOREIGN KEY (`tipe`) REFERENCES `tipe` (`id_tipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
