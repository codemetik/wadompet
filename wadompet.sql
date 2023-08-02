-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2023 pada 09.01
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wadompet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet_user`
--

CREATE TABLE `dompet_user` (
  `id_dompet` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `isi_dompet` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dompet_user`
--

INSERT INTO `dompet_user` (`id_dompet`, `id_user`, `isi_dompet`) VALUES
(1, 1, 19000),
(2, 2, 20000),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 0),
(8, 8, 0),
(9, 9, 0),
(10, 10, 0),
(11, 11, 0),
(12, 12, 0),
(13, 13, 0),
(14, 14, 0),
(15, 15, 0),
(16, 16, 0),
(17, 17, 0),
(18, 18, 0),
(19, 19, 0),
(20, 20, 0),
(21, 21, 0),
(22, 22, 0),
(23, 23, 0),
(24, 24, 0),
(25, 25, 0),
(26, 26, 0),
(27, 27, 0),
(28, 28, 0),
(29, 29, 0),
(30, 30, 0),
(31, 31, 0),
(32, 32, 0),
(33, 33, 0),
(34, 34, 0),
(35, 35, 0),
(36, 36, 0),
(37, 37, 0),
(38, 38, 0),
(39, 39, 0),
(40, 40, 0),
(41, 41, 0),
(42, 42, 0),
(43, 43, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_keluar`
--

CREATE TABLE `kas_keluar` (
  `id_kas_keluar` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nominal_kas_keluar` int(10) NOT NULL,
  `tgl_tarik` datetime NOT NULL,
  `deskripsi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kas_keluar`
--

INSERT INTO `kas_keluar` (`id_kas_keluar`, `id_user`, `nominal_kas_keluar`, `tgl_tarik`, `deskripsi`) VALUES
(4, 43, 50000, '2023-08-02 13:46:14', 'Fotocopy'),
(6, 43, 50000, '2023-08-02 13:50:50', 'Fotocopy'),
(7, 43, 2000, '2023-08-02 13:59:20', 'Untuk makan bersama');

--
-- Trigger `kas_keluar`
--
DELIMITER $$
CREATE TRIGGER `kurangi_kas` AFTER INSERT ON `kas_keluar` FOR EACH ROW BEGIN
	UPDATE uang_kas SET total_kas = total_kas - new.nominal_kas_keluar WHERE new.tgl_tarik = new.tgl_tarik;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_user`
--

CREATE TABLE `kas_user` (
  `id_kas_user` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nominal_setor` int(10) NOT NULL,
  `tgl_setor` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kas_user`
--

INSERT INTO `kas_user` (`id_kas_user`, `id_user`, `nominal_setor`, `tgl_setor`) VALUES
(167, 1, 1000, '2023-07-31 10:26:33'),
(168, 2, 1000, '2023-07-31 10:26:33'),
(169, 3, 1000, '2023-07-31 10:26:33'),
(170, 4, 1000, '2023-07-31 10:26:33'),
(171, 5, 1000, '2023-07-31 10:26:33'),
(172, 6, 1000, '2023-07-31 10:26:33'),
(173, 7, 1000, '2023-07-31 10:26:33'),
(174, 8, 1000, '2023-07-31 10:26:33'),
(175, 9, 1000, '2023-07-31 10:26:33'),
(176, 10, 1000, '2023-07-31 10:26:33'),
(177, 11, 1000, '2023-07-31 10:26:33'),
(178, 12, 1000, '2023-07-31 10:26:33'),
(179, 13, 1000, '2023-07-31 10:26:33'),
(180, 14, 1000, '2023-07-31 10:26:33'),
(181, 15, 1000, '2023-07-31 10:26:33'),
(182, 16, 1000, '2023-07-31 10:26:33'),
(183, 17, 1000, '2023-07-31 10:26:33'),
(184, 18, 1000, '2023-07-31 10:26:33'),
(185, 19, 1000, '2023-07-31 10:26:33'),
(186, 20, 1000, '2023-07-31 10:26:33'),
(187, 21, 1000, '2023-07-31 10:26:33'),
(188, 22, 1000, '2023-07-31 10:26:33'),
(189, 23, 1000, '2023-07-31 10:26:33'),
(190, 24, 1000, '2023-07-31 10:26:33'),
(191, 25, 1000, '2023-07-31 10:26:33'),
(192, 26, 1000, '2023-07-31 10:26:33'),
(193, 27, 1000, '2023-07-31 10:26:33'),
(194, 28, 1000, '2023-07-31 10:26:33'),
(195, 29, 1000, '2023-07-31 10:26:33'),
(196, 30, 1000, '2023-07-31 10:26:33'),
(197, 31, 1000, '2023-07-31 10:26:33'),
(198, 32, 1000, '2023-07-31 10:26:33'),
(199, 33, 1000, '2023-07-31 10:26:33'),
(200, 34, 1000, '2023-07-31 10:26:33'),
(201, 35, 1000, '2023-07-31 10:26:33'),
(202, 36, 1000, '2023-07-31 10:26:33'),
(203, 37, 1000, '2023-07-31 10:26:33'),
(204, 38, 1000, '2023-07-31 10:26:33'),
(205, 39, 1000, '2023-07-31 10:26:33'),
(206, 40, 1000, '2023-07-31 10:26:33'),
(207, 41, 1000, '2023-07-31 10:26:33'),
(208, 42, 1000, '2023-07-31 10:26:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `leveluser`
--

CREATE TABLE `leveluser` (
  `id_level` int(10) NOT NULL,
  `name_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `leveluser`
--

INSERT INTO `leveluser` (`id_level`, `name_level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_topup`
--

CREATE TABLE `riwayat_topup` (
  `id_riwayat` int(10) NOT NULL,
  `id_dompet` int(10) NOT NULL,
  `tgl_trx` datetime NOT NULL,
  `saldo_masuk` int(10) NOT NULL,
  `saldo_keluar` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `riwayat_topup`
--

INSERT INTO `riwayat_topup` (`id_riwayat`, `id_dompet`, `tgl_trx`, `saldo_masuk`, `saldo_keluar`, `status`) VALUES
(25, 1, '2023-07-31 02:35:00', 5000, 0, 'DISETUJUI'),
(26, 1, '2023-07-31 09:43:16', 5000, 0, 'DISETUJUI'),
(27, 1, '2023-07-31 09:59:42', 4000, 0, 'DISETUJUI'),
(28, 1, '2023-07-31 10:42:00', 5000, 0, 'DISETUJUI'),
(29, 2, '2023-08-02 01:47:27', 5000, 0, 'DISETUJUI'),
(30, 2, '2023-08-02 01:53:48', 5000, 0, 'DISETUJUI'),
(31, 2, '2023-08-02 02:09:13', 5000, 0, 'DISETUJUI'),
(32, 2, '2023-08-02 02:12:32', 5000, 0, 'DITOLAK'),
(33, 2, '2023-08-02 02:17:44', 5000, 0, 'DITOLAK'),
(34, 2, '2023-08-02 11:16:10', 5000, 0, 'DISETUJUI');

--
-- Trigger `riwayat_topup`
--
DELIMITER $$
CREATE TRIGGER `riwayat_saldo_keluar` AFTER INSERT ON `riwayat_topup` FOR EACH ROW BEGIN
	UPDATE dompet_user SET isi_dompet = isi_dompet - new.saldo_keluar WHERE id_dompet = new.id_dompet;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `riwayat_saldo_masuk` AFTER INSERT ON `riwayat_topup` FOR EACH ROW BEGIN
	UPDATE dompet_user SET isi_dompet = isi_dompet + new.saldo_masuk WHERE id_dompet = new.id_dompet and new.status = 'DISETUJUI';
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `position` varchar(35) NOT NULL,
  `user` char(15) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_whatsapp` varchar(13) NOT NULL,
  `temp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_sekarang` varchar(225) NOT NULL,
  `img_profile` varchar(100) NOT NULL,
  `id_level` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `position`, `user`, `pass`, `email`, `no_whatsapp`, `temp_lahir`, `tgl_lahir`, `alamat_sekarang`, `img_profile`, `id_level`) VALUES
(1, 'ABDILLAH YAHYA', 'SISWA', '400488', '400488', 'email1@gmail.com', '2147483647', 'Pemalang', '2008-01-01', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(2, 'ADITYA WIJAYA', 'SISWA', '400489', '400489', 'email1@gmail.com', '0', 'Pemalang', '2008-01-02', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(3, 'AIRIN NUR HAFIA', 'SISWA', '400490', '400490', 'email1@gmail.com', '0', 'Pemalang', '2008-01-03', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(4, 'ANGGUN KARISMA', 'SISWA', '400491', '400491', 'email1@gmail.com', '0', 'Pemalang', '2008-01-04', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(5, 'ANISA IRNAWATI AGUSTIN', 'SISWA', '400492', '400492', 'email1@gmail.com', '0', 'Pemalang', '2008-01-05', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(6, 'BAGAS RIZKY FEBIANO', 'SISWA', '400493', '400493', 'email1@gmail.com', '0', 'Pemalang', '2008-01-06', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(7, 'BAMBANG PRAYOGO', 'KETUA KELAS', '400494', '400494', 'email1@gmail.com', '0', 'Pemalang', '2008-01-07', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(8, 'BUNGA ZESILIA', 'SISWA', '400495', '400495', 'email1@gmail.com', '0', 'Pemalang', '2008-01-08', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(9, 'CAHYA NIASIH', 'SISWA', '400496', '400496', 'email1@gmail.com', '0', 'Pemalang', '2008-01-09', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(10, 'CALISTA ARGENTINA', 'SEKRETRIS 1', '400497', '400497', 'email1@gmail.com', '0', 'Pemalang', '2008-01-10', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(11, 'CHIKA MAYSA PUTRI', 'SISWA', '400498', '400498', 'email1@gmail.com', '0', 'Pemalang', '2008-01-11', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(12, 'DIAH AYUNINGRUM', 'SISWA', '400499', '400499', 'email1@gmail.com', '0', 'Pemalang', '2008-01-12', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(13, 'DINDA LESTARI', 'SISWA', '400500', '400500', 'email1@gmail.com', '0', 'Pemalang', '2008-01-13', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(14, 'DIVA JUNI ARIYANTI', 'SISWA', '400501', '400501', 'email1@gmail.com', '0', 'Pemalang', '2008-01-14', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(15, 'DIVA SEKAR KEDATHON', 'SISWA', '400502', '400502', 'email1@gmail.com', '0', 'Pemalang', '2008-01-15', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(16, 'DWI NUR AISAH', 'SISWA', '400503', '400503', 'email1@gmail.com', '0', 'Pemalang', '2008-01-16', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(17, 'FADHIL ROSI ALFASICH', 'SISWA', '400504', '400504', 'email1@gmail.com', '0', 'Pemalang', '2008-01-17', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(18, 'FARISCA NELY AGUSTIN', 'SISWA', '400505', '400505', 'email1@gmail.com', '0', 'Pemalang', '2008-01-18', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(19, 'FIKKA EMAY SHERISTI', 'SISWA', '400506', '400506', 'email1@gmail.com', '0', 'Pemalang', '2008-01-19', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(20, 'JESIKA YENI ERIYANTI', 'SISWA', '400507', '400507', 'email1@gmail.com', '0', 'Pemalang', '2008-01-20', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(21, 'KAYLA DWI HASTITI', 'SISWA', '400508', '400508', 'email1@gmail.com', '0', 'Pemalang', '2008-01-21', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(22, 'KHOZINATUL AIS SI', 'SISWA', '400509', '400509', 'email1@gmail.com', '0', 'Pemalang', '2008-01-22', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(23, 'LINTANG DWI CAHYANI', 'SISWA', '400510', '400510', 'email1@gmail.com', '0', 'Pemalang', '2008-01-23', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(24, 'LISA YULIANAH', 'SISWA', '400511', '400511', 'email1@gmail.com', '0', 'Pemalang', '2008-01-24', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(25, 'MAULANA ISHAQ', 'SISWA', '400512', '400512', 'email1@gmail.com', '0', 'Pemalang', '2008-01-25', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(26, 'MUHAMMAD NAZRIL MAULANA', 'SISWA', '400513', '400513', 'email1@gmail.com', '0', 'Pemalang', '2008-01-26', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(27, 'NABILA FILZA', 'SISWA', '400514', '400514', 'email1@gmail.com', '0', 'Pemalang', '2008-01-27', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(28, 'NADIA APRILIANI', 'SISWA', '400515', '400515', 'email1@gmail.com', '0', 'Pemalang', '2008-01-28', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(29, 'NASETIA LAURISTA', 'SISWA', '400516', '400516', 'email1@gmail.com', '0', 'Pemalang', '2008-01-29', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(30, 'PUTRI SAGITA SEPTIANA', 'SISWA', '400517', '400517', 'email1@gmail.com', '0', 'Pemalang', '2008-01-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(31, 'RAHMA AVIFDA', 'SISWA', '400518', '400518', 'email1@gmail.com', '0', 'Pemalang', '2008-01-31', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(32, 'RIZKI RAHMAT DANI', 'SISWA', '400519', '400519', 'email1@gmail.com', '0', 'Pemalang', '2008-02-01', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(33, 'SAFA NURSIAMI', 'BENDAHARA', '400520', '400520', 'email1@gmail.com', '0', 'Pemalang', '2008-02-02', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(34, 'SALWA AISSYABILA', 'SISWA', '400521', '400521', 'email1@gmail.com', '0', 'Pemalang', '2008-02-03', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(35, 'SELVI SEVILATUL AZIZAH', 'SISWA', '400522', '400522', 'email1@gmail.com', '0', 'Pemalang', '2008-02-04', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(36, 'SHERA RAMADHANI', 'SISWA', '400523', '400523', 'email1@gmail.com', '0', 'Pemalang', '2008-02-05', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(37, 'SHILFI BUNGA VANIA', 'SISWA', '400524', '400524', 'email1@gmail.com', '0', 'Pemalang', '2008-02-06', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(38, 'WIDIYANA APRILLIYANI', 'SISWA', '400525', '400525', 'email1@gmail.com', '0', 'Pemalang', '2008-02-07', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(39, 'WIHANI LUTFI HIDAYAH', 'WAKIL KETUA', '400526', '400526', 'email1@gmail.com', '0', 'Pemalang', '2008-02-08', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(40, 'WILDAN AUFA RIZQI', 'SISWA', '400527', '400527', 'email1@gmail.com', '0', 'Pemalang', '2008-02-09', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(41, 'WINARA FALIA PATI MUHID', 'SISWA', '400528', '400528', 'email1@gmail.com', '0', 'Pemalang', '2008-02-10', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(42, 'YENI KUSUMA WARDANI', 'SISWA', '400529', '400529', 'email1@gmail.com', '0', 'Pemalang', '2008-02-11', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 2),
(43, 'administrator', 'ADMIN', 'irfa', 'adminrpl', 'admin@gmail.com', '089643232261', 'Pemalang', '2008-02-12', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket_topup`
--

CREATE TABLE `tiket_topup` (
  `id_tiket` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nominal_topup` int(10) NOT NULL,
  `tgl_tiket` datetime DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang_kas`
--

CREATE TABLE `uang_kas` (
  `id_kas` int(10) NOT NULL,
  `total_kas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `uang_kas`
--

INSERT INTO `uang_kas` (`id_kas`, `total_kas`) VALUES
(1, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_agent`
--

CREATE TABLE `user_agent` (
  `id_agent` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `name_user_agent` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_agent`
--

INSERT INTO `user_agent` (`id_agent`, `id_user`, `name_user_agent`) VALUES
(17, 43, 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36'),
(18, 43, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dompet_user`
--
ALTER TABLE `dompet_user`
  ADD PRIMARY KEY (`id_dompet`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kas_keluar`
--
ALTER TABLE `kas_keluar`
  ADD PRIMARY KEY (`id_kas_keluar`);

--
-- Indeks untuk tabel `kas_user`
--
ALTER TABLE `kas_user`
  ADD PRIMARY KEY (`id_kas_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `leveluser`
--
ALTER TABLE `leveluser`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `riwayat_topup`
--
ALTER TABLE `riwayat_topup`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_dompet` (`id_dompet`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `tiket_topup`
--
ALTER TABLE `tiket_topup`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `uang_kas`
--
ALTER TABLE `uang_kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indeks untuk tabel `user_agent`
--
ALTER TABLE `user_agent`
  ADD PRIMARY KEY (`id_agent`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dompet_user`
--
ALTER TABLE `dompet_user`
  MODIFY `id_dompet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `kas_keluar`
--
ALTER TABLE `kas_keluar`
  MODIFY `id_kas_keluar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kas_user`
--
ALTER TABLE `kas_user`
  MODIFY `id_kas_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT untuk tabel `leveluser`
--
ALTER TABLE `leveluser`
  MODIFY `id_level` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `riwayat_topup`
--
ALTER TABLE `riwayat_topup`
  MODIFY `id_riwayat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `tiket_topup`
--
ALTER TABLE `tiket_topup`
  MODIFY `id_tiket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `uang_kas`
--
ALTER TABLE `uang_kas`
  MODIFY `id_kas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_agent`
--
ALTER TABLE `user_agent`
  MODIFY `id_agent` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dompet_user`
--
ALTER TABLE `dompet_user`
  ADD CONSTRAINT `dompet_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `kas_user`
--
ALTER TABLE `kas_user`
  ADD CONSTRAINT `kas_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `riwayat_topup`
--
ALTER TABLE `riwayat_topup`
  ADD CONSTRAINT `riwayat_topup_ibfk_1` FOREIGN KEY (`id_dompet`) REFERENCES `dompet_user` (`id_dompet`);

--
-- Ketidakleluasaan untuk tabel `tiket_topup`
--
ALTER TABLE `tiket_topup`
  ADD CONSTRAINT `tiket_topup_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
