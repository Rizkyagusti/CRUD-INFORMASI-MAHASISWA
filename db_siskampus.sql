-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2023 pada 16.57
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siskampus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jumlah_kelas`
--

CREATE TABLE `jumlah_kelas` (
  `id` int(11) NOT NULL,
  `id_jurusans` int(11) NOT NULL,
  `jumlah_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jumlah_kelas`
--

INSERT INTO `jumlah_kelas` (`id`, `id_jurusans`, `jumlah_kelas`) VALUES
(1, 1, 5),
(2, 2, 5),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusans`
--

CREATE TABLE `jurusans` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusans`
--

INSERT INTO `jurusans` (`id`, `nama`, `jumlah_kelas`) VALUES
(1, 'Teknik Elektronika', 5),
(2, 'Teknik Mesin', 5),
(3, 'Teknik Industri', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusans_mata_kuliahs`
--

CREATE TABLE `jurusans_mata_kuliahs` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_mata_kuliah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusans_mata_kuliahs`
--

INSERT INTO `jurusans_mata_kuliahs` (`id`, `id_jurusan`, `id_mata_kuliah`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 3),
(5, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `asal_sekolah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `nim`, `nama`, `gender`, `alamat`, `telepon`, `id_jurusan`, `asal_sekolah`) VALUES
(20, '2202049', 'RIZKY AGUSTI', 'Pria', 'Tangerang', '085691964185', 1, 'SMKN2 Kabupaten Tangerang'),
(21, '2202039', 'Udin', 'Pria', 'cadas', '085691964185', 3, 'SMKN2 Kabupaten Tangerang'),
(22, '220203', 'Udin', 'Pria', 'cadas', '085691964185', 1, 'SMKN2 Kabupaten Tangerang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliahs`
--

CREATE TABLE `mata_kuliahs` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah_sks` int(11) NOT NULL,
  `jumlah_kelas` text NOT NULL,
  `tingkatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_kuliahs`
--

INSERT INTO `mata_kuliahs` (`id`, `kode`, `nama`, `jumlah_sks`, `jumlah_kelas`, `tingkatan`) VALUES
(1, '2 Kelas', 'Algoritma dan Pemrograman', 2, '', ''),
(2, '', 'Basis Data', 2, '', ''),
(3, 'SI', 'Sistem Operasi', 2, '', ''),
(8, 'DPL', 'Desain Perangkat Lunak', 3, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas_pendaftaran') DEFAULT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `gambar`) VALUES
(19, 'aa', 'aa@a.a', '$2y$10$zuNCOIAl.heau5bWoE.QI.Qlk6wHIoQitLes50l3fPlcokNL5f4CS', 'petugas_pendaftaran', ''),
(20, 'ddd', 'ddd@d.d', '$2y$10$nvDtBPrFiqjFxiT/mqjH7edGLF7gYjROIIJDGK5nsy4i2o5ue6v1e', NULL, ''),
(21, 'Emeth', 'golem@gmail.com', '$2y$10$l8JXCShOFewvLE.EOCth1enUBcDAiMimrtnX96lIshRo33hJhNI3K', 'admin', ''),
(22, 'a', 'a@a.a', '$2y$10$7uGjgXeziXOfVxUXChRzxuWMCzhV6MBRZtic89HtxHruxFn60Ze6m', NULL, ''),
(23, 'gintama', 'rizkyagusti7@gmail.com', '$2y$10$8Vw3/7on6K.YyifAvPQR3.qR1EHimWAkmyWjAXy7d.Cx6/9ISuCx2', 'admin', ''),
(24, 'Agusti Rizky', 'rizkyagusti7@gmail.com', '$2y$10$akkTz5EYZWK3RHHj6DkRzuLjYlogJOPvCfnUgB7k.yG0Ob7MtrQie', NULL, ''),
(25, 'Agusti02', 'rizkyagusti7@gmail.com', '$2y$10$mbj8c/ni7Ffrn7CPu6YwYeM0lYn7bDuhb3WGYpjJMKz1gj88rMdAW', NULL, '65748144d491c.jpg'),
(27, 'Agusti04', 'agusti@gmail.com', '$2y$10$wLslSHcuX.42McHWvcE4.eM.rZLkk0VSI41gTvKf3TCyx7QuF8Njq', NULL, '657483bda8f11.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jumlah_kelas`
--
ALTER TABLE `jumlah_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusans_mata_kuliahs`
--
ALTER TABLE `jurusans_mata_kuliahs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mata_kuliah` (`id_mata_kuliah`),
  ADD KEY `jurusans_mata_kuliahs_ibfk_3` (`id_jurusan`);

--
-- Indeks untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jumlah_kelas`
--
ALTER TABLE `jumlah_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `jurusans_mata_kuliahs`
--
ALTER TABLE `jurusans_mata_kuliahs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jurusans_mata_kuliahs`
--
ALTER TABLE `jurusans_mata_kuliahs`
  ADD CONSTRAINT `jurusans_mata_kuliahs_ibfk_2` FOREIGN KEY (`id_mata_kuliah`) REFERENCES `mata_kuliahs` (`id`),
  ADD CONSTRAINT `jurusans_mata_kuliahs_ibfk_3` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
