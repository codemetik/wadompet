-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2023 pada 20.51
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
-- Struktur dari tabel `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(10) NOT NULL,
  `isi` text NOT NULL,
  `tgl_waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `isi`, `tgl_waktu`) VALUES
(12, 'Tgl 11-08-2023 /Semua anggota sudah melakukan topup kas dan tabungan.', '2023-08-08 00:43:41'),
(13, 'Aplikasi ini dibuat untuk Kelas X PPLG/RPL 2, Bertujuan untuk pengelolaan dana tabungan dan dana kas kelas.', '2023-08-08 01:45:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chatgroup`
--

CREATE TABLE `chatgroup` (
  `id_chat` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tgl_chat` datetime NOT NULL,
  `isi_chat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1, 0),
(2, 2, 0),
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
(43, 43, 0),
(44, 45, 0);

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
-- Struktur dari tabel `notifikasi_catatan`
--

CREATE TABLE `notifikasi_catatan` (
  `id_notifcat` int(10) NOT NULL,
  `isi_chat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi_catatan`
--

INSERT INTO `notifikasi_catatan` (`id_notifcat`, `isi_chat`) VALUES
(1, 'Aplikasi ini dibuat untuk Kelas X PPLG/RPL 2, Bertujuan untuk pengelolaan dana tabungan dan dana kas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_tariktunai`
--

CREATE TABLE `riwayat_tariktunai` (
  `id_riwayattarik` int(10) NOT NULL,
  `id_dompet` int(10) NOT NULL,
  `tgl_trxtarik` datetime NOT NULL,
  `saldo_keluar` int(10) NOT NULL,
  `saldo_awal` int(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `riwayat_tariktunai`
--
DELIMITER $$
CREATE TRIGGER `kirim_dana_keluar` AFTER INSERT ON `riwayat_tariktunai` FOR EACH ROW BEGIN
	UPDATE dompet_user SET isi_dompet = isi_dompet - new.saldo_keluar WHERE id_dompet = new.id_dompet AND new.status = 'SENDSALDO';
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `riwayat_saldo_keluar` AFTER INSERT ON `riwayat_tariktunai` FOR EACH ROW BEGIN
	UPDATE dompet_user SET isi_dompet = isi_dompet - new.saldo_keluar WHERE id_dompet = new.id_dompet AND new.status = 'DISETUJUI';
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_topup`
--

CREATE TABLE `riwayat_topup` (
  `id_riwayat` int(10) NOT NULL,
  `id_dompet` int(10) NOT NULL,
  `tgl_trx` datetime NOT NULL,
  `saldo_masuk` int(10) NOT NULL,
  `saldo_awal` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `riwayat_topup`
--
DELIMITER $$
CREATE TRIGGER `kirim_dana_masuk` AFTER INSERT ON `riwayat_topup` FOR EACH ROW BEGIN
	UPDATE dompet_user SET isi_dompet = isi_dompet + new.saldo_masuk WHERE id_dompet = new.id_dompet AND new.status = 'SENDSALDO';
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
-- Struktur dari tabel `sendsaldo`
--

CREATE TABLE `sendsaldo` (
  `id_sendsaldo` int(10) NOT NULL,
  `id_dompet_1` int(10) NOT NULL,
  `id_dompet_2` int(10) NOT NULL,
  `tgl_trxsensaldo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sendsaldo`
--

INSERT INTO `sendsaldo` (`id_sendsaldo`, `id_dompet_1`, `id_dompet_2`, `tgl_trxsensaldo`) VALUES
(1, 1, 400489, '2023-08-07 17:37:52'),
(2, 1, 2, '2023-08-07 17:40:13');

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
(1, 'ABDILLAH YAHYA', 'SISWA', '400488', '400488', '400488@gmail.com', '2147483647', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(2, 'ADITYA WIJAYA', 'SISWA', '400489', '400489', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(3, 'AIRIN NUR HAFIA', 'SISWA', '400490', '400490', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(4, 'ANGGUN KARISMA', 'SISWA', '400491', '400491', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(5, 'ANISA IRNAWATI AGUSTIN', 'SISWA', '400492', '400492', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(6, 'BAGAS RIZKY FEBIANO', 'SISWA', '400493', '400493', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(7, 'BAMBANG PRAYOGO', 'KETUA KELAS', '400494', '400494', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(8, 'BUNGA ZESILIA', 'SISWA', '400495', '400495', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(9, 'CAHYA NIASIH', 'SISWA', '400496', '400496', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(10, 'CALISTA ARGENTINA', 'SEKRETRIS 1', '400497', '400497', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(11, 'CHIKA MAYSA PUTRI', 'SISWA', '400498', '400498', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(12, 'DIAH AYUNINGRUM', 'SISWA', '400499', '400499', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(13, 'DINDA LESTARI', 'SISWA', '400500', '400500', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(14, 'DIVA JUNI ARIYANTI', 'SISWA', '400501', '400501', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(15, 'DIVA SEKAR KEDATHON', 'SISWA', '400502', '400502', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(16, 'DWI NUR AISAH', 'SISWA', '400503', '400503', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(17, 'FADHIL ROSI ALFASICH', 'SISWA', '400504', '400504', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(18, 'FARISCA NELY AGUSTIN', 'SISWA', '400505', '400505', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(19, 'FIKKA EMAY SHERISTI', 'SISWA', '400506', '400506', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(20, 'JESIKA YENI ERIYANTI', 'SISWA', '400507', '400507', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(21, 'KAYLA DWI HASTITI', 'SISWA', '400508', '400508', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(22, 'KHOZINATUL AIS SI', 'SISWA', '400509', '400509', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(23, 'LINTANG DWI CAHYANI', 'SISWA', '400510', '400510', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(24, 'LISA YULIANAH', 'SISWA', '400511', '400511', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(25, 'MAULANA ISHAQ', 'SISWA', '400512', '400512', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(26, 'MUHAMMAD NAZRIL MAULANA', 'SISWA', '400513', '400513', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(27, 'NABILA FILZA', 'SISWA', '400514', '400514', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(28, 'NADIA APRILIANI', 'SISWA', '400515', '400515', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(29, 'NASETIA LAURISTA', 'SISWA', '400516', '400516', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(30, 'PUTRI SAGITA SEPTIANA', 'SISWA', '400517', '400517', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(31, 'RAHMA AVIFDA', 'SISWA', '400518', '400518', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(32, 'RIZKI RAHMAT DANI', 'SISWA', '400519', '400519', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(33, 'SAFA NURSIAMI', 'BENDAHARA', '400520', '400520', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(34, 'SALWA AISSYABILA', 'SISWA', '400521', '400521', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(35, 'SELVI SEVILATUL AZIZAH', 'SISWA', '400522', '400522', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(36, 'SHERA RAMADHANI', 'SISWA', '400523', '400523', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(37, 'SHILFI BUNGA VANIA', 'SISWA', '400524', '400524', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(38, 'WIDIYANA APRILLIYANI', 'SISWA', '400525', '400525', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(39, 'WIHANI LUTFI HIDAYAH', 'WAKIL KETUA', '400526', '400526', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(40, 'WILDAN AUFA RIZQI', 'SISWA', '400527', '400527', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(41, 'WINARA FALIA PATI MUHID', 'SISWA', '400528', '400528', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(42, 'YENI KUSUMA WARDANI', 'SISWA', '400529', '400529', '400488@gmail.com', '0', 'Pemalang', '2011-09-30', 'Ds. Iser, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                                                                                            ', '', 2),
(43, 'administrator', 'ADMIN', 'admin', 'adminrpl', 'administrator@gmail.com', '089643232261', 'Pemalang', '0000-00-00', 'Ds. Tegalmlati, Kec. Petarukan, Kab. Pemalang, Jawa Tengah', '', 1),
(45, 'M. Irfa NKH', 'Walikelas', '031192', '031192', 'codemetik@gmail.com', '089643232261', 'Pemalang', '1992-11-03', 'Ds. Tegalmlati, Kec. Petarukan, Kab. Pemalang, Jawa Tengah                                    ', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket_tariktunai`
--

CREATE TABLE `tiket_tariktunai` (
  `id_tikettarik` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nominal_tarik` int(10) NOT NULL,
  `tgl_tariktunai` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_agent`
--

CREATE TABLE `user_agent` (
  `id_agent` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tgl_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `name_user_agent` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `user_agent`
--
DELIMITER $$
CREATE TRIGGER `delete_chatgroup` AFTER DELETE ON `user_agent` FOR EACH ROW BEGIN
	delete from chatgroup where id_user = old.id_user;
    END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`);

--
-- Indeks untuk tabel `chatgroup`
--
ALTER TABLE `chatgroup`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_user` (`id_user`);

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
-- Indeks untuk tabel `notifikasi_catatan`
--
ALTER TABLE `notifikasi_catatan`
  ADD PRIMARY KEY (`id_notifcat`);

--
-- Indeks untuk tabel `riwayat_tariktunai`
--
ALTER TABLE `riwayat_tariktunai`
  ADD PRIMARY KEY (`id_riwayattarik`);

--
-- Indeks untuk tabel `riwayat_topup`
--
ALTER TABLE `riwayat_topup`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_dompet` (`id_dompet`);

--
-- Indeks untuk tabel `sendsaldo`
--
ALTER TABLE `sendsaldo`
  ADD PRIMARY KEY (`id_sendsaldo`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `tiket_tariktunai`
--
ALTER TABLE `tiket_tariktunai`
  ADD PRIMARY KEY (`id_tikettarik`);

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
  ADD PRIMARY KEY (`id_agent`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `chatgroup`
--
ALTER TABLE `chatgroup`
  MODIFY `id_chat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `dompet_user`
--
ALTER TABLE `dompet_user`
  MODIFY `id_dompet` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `kas_keluar`
--
ALTER TABLE `kas_keluar`
  MODIFY `id_kas_keluar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kas_user`
--
ALTER TABLE `kas_user`
  MODIFY `id_kas_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT untuk tabel `leveluser`
--
ALTER TABLE `leveluser`
  MODIFY `id_level` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `notifikasi_catatan`
--
ALTER TABLE `notifikasi_catatan`
  MODIFY `id_notifcat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `riwayat_tariktunai`
--
ALTER TABLE `riwayat_tariktunai`
  MODIFY `id_riwayattarik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `riwayat_topup`
--
ALTER TABLE `riwayat_topup`
  MODIFY `id_riwayat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `sendsaldo`
--
ALTER TABLE `sendsaldo`
  MODIFY `id_sendsaldo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tiket_tariktunai`
--
ALTER TABLE `tiket_tariktunai`
  MODIFY `id_tikettarik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tiket_topup`
--
ALTER TABLE `tiket_topup`
  MODIFY `id_tiket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `uang_kas`
--
ALTER TABLE `uang_kas`
  MODIFY `id_kas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_agent`
--
ALTER TABLE `user_agent`
  MODIFY `id_agent` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

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
