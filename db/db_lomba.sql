-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Bulan Mei 2021 pada 05.52
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lomba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jarak`
--

CREATE TABLE `t_jarak` (
  `jarak_id` int(11) NOT NULL,
  `jarak_sasaran` varchar(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_jarak`
--

INSERT INTO `t_jarak` (`jarak_id`, `jarak_sasaran`, `created`, `updated`) VALUES
(2, '20', '2021-05-08 13:39:47', NULL),
(3, '25', '2021-05-09 09:47:26', NULL),
(4, '50', '2021-05-09 10:14:24', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kategori`
--

CREATE TABLE `t_kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_kategori`
--

INSERT INTO `t_kategori` (`kategori_id`, `nama_kategori`, `created`, `updated`) VALUES
(2, 'ABCD', '2021-05-09 09:30:42', NULL);

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
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_penilaian`
--

INSERT INTO `t_penilaian` (`penilaian_id`, `kategori_id`, `jarak_id`, `sasaran_id`, `point`, `keterangan`, `durasi`, `jumlah_line`, `created`, `updated`) VALUES
(2, 2, 4, 2, '50', 'Lorem KI', '100', '150', '2021-05-09 10:01:04', '2021-05-09 05:41:10'),
(3, 2, 3, 2, '1', 'ipsum Ab', '2', '3', '2021-05-09 10:16:10', '2021-05-09 05:42:00'),
(4, 2, 2, 2, '15', 'EFG', '35', '55', '2021-05-09 10:46:43', '2021-05-09 05:47:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sasaran`
--

CREATE TABLE `t_sasaran` (
  `sasaran_id` int(11) NOT NULL,
  `nama_sasaran` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_sasaran`
--

INSERT INTO `t_sasaran` (`sasaran_id`, `nama_sasaran`, `created`, `updated`) VALUES
(2, 'Kertas', '2021-05-08 14:11:18', NULL);

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
  `phone` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin 2:peserta',
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `nik`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `phone`, `password`, `level`, `created`) VALUES
(1, 123456789, 'Admin Saepul', 'Sukabumi', '0000-00-00', 'Cisaat, Sukabumi', '2345', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '2021-05-07 09:46:49'),
(10, 222, 'Bagus Setiawan', 'Sukabumi', '2000-01-01', 'Cibadak', '1234', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '2021-05-07 10:14:28'),
(9, 1234, 'admin', 'Sukabumi', '2021-05-07', 'ccx', '1235', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '2021-05-07 10:01:47');

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `t_penilaian`
--
ALTER TABLE `t_penilaian`
  ADD PRIMARY KEY (`penilaian_id`);

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
-- AUTO_INCREMENT untuk tabel `t_jarak`
--
ALTER TABLE `t_jarak`
  MODIFY `jarak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_kategori`
--
ALTER TABLE `t_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_penilaian`
--
ALTER TABLE `t_penilaian`
  MODIFY `penilaian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_sasaran`
--
ALTER TABLE `t_sasaran`
  MODIFY `sasaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
