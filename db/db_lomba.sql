-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql112.byetcluster.com
-- Waktu pembuatan: 03 Sep 2021 pada 23.41
-- Versi server: 5.6.48-88.0
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28343599_db_lomba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_invoice`
--

CREATE TABLE `t_invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `total` varchar(10) DEFAULT NULL,
  `status_pesanan` int(1) NOT NULL DEFAULT '0' COMMENT '0 : Belum Lunas 1 : Sedang di vertifikasi 2 : Lunas',
  `user_id` varchar(5) NOT NULL,
  `created_invoice` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_invoice`
--

INSERT INTO `t_invoice` (`invoice_id`, `invoice`, `total`, `status_pesanan`, `user_id`, `created_invoice`, `updated`) VALUES
(40, 'ID2108290002', NULL, 0, '3', '2021-08-29 05:32:12', NULL),
(39, 'ID2108290001', NULL, 0, '3', '2021-08-29 03:31:06', NULL),
(38, 'ID2108190001', NULL, 0, '1', '2021-08-19 03:22:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jarak`
--

CREATE TABLE `t_jarak` (
  `jarak_id` int(11) NOT NULL,
  `jarak_sasaran` varchar(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategori`
--

CREATE TABLE `t_kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_keranjang`
--

CREATE TABLE `t_keranjang` (
  `keranjang_id` int(11) NOT NULL,
  `lomba_id` varchar(4) NOT NULL,
  `user_id` varchar(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_lomba`
--

CREATE TABLE `t_lomba` (
  `lomba_id` int(11) NOT NULL,
  `perlombaan_id` varchar(4) NOT NULL,
  `tanggal_tanding` date NOT NULL,
  `jam_tanding` time NOT NULL,
  `biaya` varchar(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_order`
--

CREATE TABLE `t_order` (
  `order_id` int(11) NOT NULL,
  `perlombaan_id` varchar(4) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_order`
--

INSERT INTO `t_order` (`order_id`, `perlombaan_id`, `user_id`, `invoice`, `created`) VALUES
(59, '26', '3', 'ID2108290002', '2021-08-29 05:32:12'),
(58, '26', '3', 'ID2108290001', '2021-08-29 03:31:06'),
(57, '25', '1', 'ID2108190001', '2021-08-19 03:22:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pembayaran`
--

CREATE TABLE `t_pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `invoice_id` varchar(6) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `user_id` varchar(6) NOT NULL,
  `catatan` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_penilaian`
--

CREATE TABLE `t_penilaian` (
  `penilaian_id` int(11) NOT NULL,
  `invoiceid` int(11) NOT NULL,
  `jam_perlombaan` time DEFAULT NULL,
  `gelombang` varchar(10) NOT NULL,
  `lajur` varchar(10) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_perlombaan`
--

CREATE TABLE `t_perlombaan` (
  `perlombaan_id` int(11) NOT NULL,
  `nama_kategori` varchar(150) NOT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `jarak_sasaran` varchar(100) NOT NULL,
  `sasaran` varchar(100) NOT NULL,
  `point` varchar(4) NOT NULL,
  `keterangan` text NOT NULL,
  `durasi` varchar(4) NOT NULL,
  `jumlah_line` varchar(4) NOT NULL,
  `tanggal_tanding` date DEFAULT NULL,
  `jam_tanding` time DEFAULT NULL,
  `biaya` varchar(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sasaran`
--

CREATE TABLE `t_sasaran` (
  `sasaran_id` int(11) NOT NULL,
  `nama_sasaran` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nik` int(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `komunitas` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `nik`, `nama_lengkap`, `komunitas`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `phone`, `password`, `level`, `created`, `updated`) VALUES
(1, 1234, 'Admin', 'Tembak jitu', 'Bandung', '1990-10-10', 'Cisaat', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, '2021-05-07 11:06:33', '2021-08-19 13:55:04'),
(2, 2147483647, 'Japar sidik', 'Umum', 'Sukabumi', '2005-05-07', 'Kp', '085871788812', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 2, '2021-05-07 11:21:47', NULL),
(3, 1980, 'Harpin', 'Umum', 'Sukabumi', '2021-05-07', 'Kadudampit', '085723369119', 'c09bde11554bc626f751011a2d57f2054436faf7', 2, '2021-05-07 15:41:25', NULL),
(4, 4444, 'Anwar Saepul', 'Umum', 'Sukabumi', '2021-05-11', 'Cisaat', '4444', '92f2fd99879b0c2466ab8648afb63c49032379c1', 2, '2021-05-11 14:44:11', NULL),
(5, 123, '654321', 'Umum', 'Sukabumi', '2021-05-20', 'Sukabumi', '0808', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', 2, '2021-05-21 04:01:16', NULL),
(6, 12, 'aa', 'ap', 'sukabumi', '2021-06-19', 'cirurey', '11344', '3acd0be86de7dcccdbf91b20f94a68cea535922d', 2, '2021-06-19 05:53:56', NULL),
(7, 1213, 'japar', 'Umum', 'sukabumi', '2021-07-25', 'Sukabumi', '12345', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '2021-07-25 06:27:03', NULL),
(8, 2147483647, 'Yudi Setiadi', 'Umum', 'Sukabumi', '2021-07-26', 'Jl. Syamsudin SH no 5', '081322054466', 'ecb0a80d9aa1154b52bd9d4f15ad06556538184d', 2, '2021-07-26 07:39:41', NULL),
(9, 123456, 'Abdul Ahmad', 'Suka Nembak', 'Sukabumi', '2016-05-18', 'Perum Karang Kencana Gunung Puyuh Kota Sukabumi', '081525354555', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '2021-08-18 13:09:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_invoice`
--
ALTER TABLE `t_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indeks untuk tabel `t_jarak`
--
ALTER TABLE `t_jarak`
  ADD PRIMARY KEY (`jarak_id`);

--
-- Indeks untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `t_keranjang`
--
ALTER TABLE `t_keranjang`
  ADD PRIMARY KEY (`keranjang_id`);

--
-- Indeks untuk tabel `t_lomba`
--
ALTER TABLE `t_lomba`
  ADD PRIMARY KEY (`lomba_id`);

--
-- Indeks untuk tabel `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indeks untuk tabel `t_penilaian`
--
ALTER TABLE `t_penilaian`
  ADD PRIMARY KEY (`penilaian_id`);

--
-- Indeks untuk tabel `t_perlombaan`
--
ALTER TABLE `t_perlombaan`
  ADD PRIMARY KEY (`perlombaan_id`);

--
-- Indeks untuk tabel `t_sasaran`
--
ALTER TABLE `t_sasaran`
  ADD PRIMARY KEY (`sasaran_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_invoice`
--
ALTER TABLE `t_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `t_jarak`
--
ALTER TABLE `t_jarak`
  MODIFY `jarak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_keranjang`
--
ALTER TABLE `t_keranjang`
  MODIFY `keranjang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `t_lomba`
--
ALTER TABLE `t_lomba`
  MODIFY `lomba_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `t_order`
--
ALTER TABLE `t_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `t_pembayaran`
--
ALTER TABLE `t_pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `t_penilaian`
--
ALTER TABLE `t_penilaian`
  MODIFY `penilaian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_perlombaan`
--
ALTER TABLE `t_perlombaan`
  MODIFY `perlombaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `t_sasaran`
--
ALTER TABLE `t_sasaran`
  MODIFY `sasaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
