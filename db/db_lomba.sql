-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql112.byetcluster.com
-- Waktu pembuatan: 27 Bulan Mei 2021 pada 02.44
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
  `total` varchar(10) NOT NULL,
  `status_pesanan` int(1) NOT NULL DEFAULT '0' COMMENT '0 : Belum Lunas 1 : Sedang di vertifikasi 2 : Lunas',
  `user_id` varchar(5) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_invoice`
--

INSERT INTO `t_invoice` (`invoice_id`, `invoice`, `total`, `status_pesanan`, `user_id`, `created`) VALUES
(1, 'ID2105250001', '55000', 0, '1', '2021-05-25 01:08:28'),
(2, 'ID2105250002', '25000', 0, '1', '2021-05-25 01:08:49'),
(3, 'ID2105250003', '25000', 0, '1', '2021-05-25 01:16:12'),
(4, 'ID2105250004', '25000', 0, '2', '2021-05-25 01:24:55'),
(5, 'ID2105250005', '25000', 0, '4', '2021-05-25 01:25:28'),
(6, 'ID2105270001', '55000', 0, '1', '2021-05-27 02:38:06');

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

--
-- Dumping data untuk tabel `t_jarak`
--

INSERT INTO `t_jarak` (`jarak_id`, `jarak_sasaran`, `created`, `updated`) VALUES
(1, '10', '2021-05-15 23:54:54', NULL),
(2, '15', '2021-05-15 23:55:02', NULL),
(3, '18', '2021-05-15 23:56:11', NULL),
(4, '20', '2021-05-15 23:56:11', NULL),
(5, '25', '2021-05-15 23:56:11', NULL),
(6, '33', '2021-05-15 23:56:11', NULL),
(7, '41', '2021-05-15 23:56:11', NULL);

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

--
-- Dumping data untuk tabel `t_kategori`
--

INSERT INTO `t_kategori` (`kategori_id`, `nama_kategori`, `created`, `updated`) VALUES
(1, 'Visir Uklik / PCP', '2021-05-15 23:53:14', NULL),
(2, 'Multirange Uklik', '2021-05-15 23:53:27', NULL),
(3, 'Multirange PCP', '2021-05-15 23:53:53', NULL),
(4, 'Bencreast', '2021-05-15 23:54:30', NULL);

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

--
-- Dumping data untuk tabel `t_lomba`
--

INSERT INTO `t_lomba` (`lomba_id`, `perlombaan_id`, `tanggal_tanding`, `jam_tanding`, `biaya`, `created`, `updated`) VALUES
(1, '13', '2021-06-10', '10:00:00', '25000', '2021-05-21 03:10:23', '2021-05-21 03:53:30'),
(2, '11', '2021-06-01', '13:00:00', '30000', '2021-05-21 03:11:06', '2021-05-21 03:54:20'),
(3, '12', '2021-05-26', '16:11:00', '44000', '2021-05-26 05:12:19', NULL),
(4, '11', '2021-05-26', '16:11:00', '54.000', '2021-05-26 05:12:37', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_order`
--

CREATE TABLE `t_order` (
  `order_id` int(11) NOT NULL,
  `lomba_id` varchar(4) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_order`
--

INSERT INTO `t_order` (`order_id`, `lomba_id`, `user_id`, `invoice`, `created`) VALUES
(18, '2', '1', 'ID2105270001', '2021-05-26 09:29:17'),
(16, '1', '1', 'ID2105270001', '2021-05-26 06:18:42'),
(15, '1', '4', 'ID2105250005', '2021-05-25 01:25:22'),
(14, '1', '2', 'ID2105250004', '2021-05-25 01:24:47'),
(13, '1', '1', 'ID2105250003', '2021-05-25 01:16:01'),
(12, '1', '1', 'ID2105250002', '2021-05-25 01:08:45'),
(11, '2', '1', 'ID2105250001', '2021-05-25 01:08:23'),
(10, '1', '1', 'ID2105250001', '2021-05-25 01:08:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_penilaian`
--

CREATE TABLE `t_penilaian` (
  `penilaian_id` int(11) NOT NULL,
  `kategori_id` int(4) NOT NULL,
  `jarak_id` int(4) NOT NULL,
  `sasaran_id` int(4) NOT NULL,
  `point` varchar(4) NOT NULL,
  `keterangan` text NOT NULL,
  `durasi` varchar(4) NOT NULL,
  `jumlah_line` varchar(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_penilaian`
--

INSERT INTO `t_penilaian` (`penilaian_id`, `kategori_id`, `jarak_id`, `sasaran_id`, `point`, `keterangan`, `durasi`, `jumlah_line`, `created`, `updated`) VALUES
(0, 2, 2, 0, '10', 'Ghjv ', '10', '5', '2021-05-09 01:26:02', '2021-05-09 02:57:01'),
(3, 2, 3, 2, '1', 'ipsum Ab', '2', '3', '2021-05-09 10:16:10', '2021-05-09 05:42:00'),
(4, 2, 2, 2, '15', 'EFG', '35', '55', '2021-05-09 10:46:43', '2021-05-09 05:47:09'),
(0, 2, 2, 0, '10', 'Ghjv ', '10', '5', '2021-05-09 00:11:23', '2021-05-09 02:57:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_perlombaan`
--

CREATE TABLE `t_perlombaan` (
  `perlombaan_id` int(11) NOT NULL,
  `kategori_id` int(4) NOT NULL,
  `jarak_id` int(4) NOT NULL,
  `sasaran_id` int(4) NOT NULL,
  `point` varchar(4) NOT NULL,
  `keterangan` text NOT NULL,
  `durasi` varchar(4) NOT NULL,
  `jumlah_line` varchar(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_perlombaan`
--

INSERT INTO `t_perlombaan` (`perlombaan_id`, `kategori_id`, `jarak_id`, `sasaran_id`, `point`, `keterangan`, `durasi`, `jumlah_line`, `created`, `updated`) VALUES
(12, 2, 4, 1, '20', '20X Tembak', '15', '3', '2021-05-15 23:58:26', NULL),
(13, 2, 2, 3, '20', '20X Tembak', '15', '3', '2021-05-16 00:05:07', NULL),
(11, 1, 1, 2, '15', '15X Tembak', '15', '3', '2021-05-15 23:57:35', NULL);

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

--
-- Dumping data untuk tabel `t_sasaran`
--

INSERT INTO `t_sasaran` (`sasaran_id`, `nama_sasaran`, `created`, `updated`) VALUES
(1, 'kertas', '2021-05-16 00:02:34', NULL),
(2, 'WRABF', '2021-05-16 00:02:34', '2021-05-21 03:52:49'),
(3, 'Metsil (Ayam, Babi, Kalkun, Domba)', '2021-05-16 00:02:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nik` int(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `phone`, `password`, `level`, `created`) VALUES
(1, 1234, 'Stepen Chow', 'Sukabumi', '2021-05-07', 'Sukabumi', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, '2021-05-07 11:06:33'),
(2, 2147483647, 'Japar sidik', 'Sukabumi', '2005-05-07', 'Kp', '085871788812', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 2, '2021-05-07 11:21:47'),
(3, 1980, 'Harpin', 'Sukabumi', '2021-05-07', 'Kadudampit', '085723369119', 'c09bde11554bc626f751011a2d57f2054436faf7', 2, '2021-05-07 15:41:25'),
(4, 4444, 'Anwar Saepul', 'Sukabumi', '2021-05-11', 'Cisaat', '4444', '92f2fd99879b0c2466ab8648afb63c49032379c1', 2, '2021-05-11 14:44:11'),
(5, 123, '654321', 'Sukabumi', '2021-05-20', 'Sukabumi', '0808', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', 2, '2021-05-21 04:01:16');

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
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `keranjang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `t_lomba`
--
ALTER TABLE `t_lomba`
  MODIFY `lomba_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_order`
--
ALTER TABLE `t_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `t_perlombaan`
--
ALTER TABLE `t_perlombaan`
  MODIFY `perlombaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `t_sasaran`
--
ALTER TABLE `t_sasaran`
  MODIFY `sasaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
