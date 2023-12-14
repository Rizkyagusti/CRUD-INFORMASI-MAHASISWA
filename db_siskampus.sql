-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Des 2023 pada 14.42
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

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
(1, 'Teknik Elektronika1', 5),
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
(4, 2, 3),
(5, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `id_jurusan`, `id_kelas`, `kelas`) VALUES
(1, 1, 11, '1 Elektronika A'),
(2, 1, 12, '1 Elektronika B'),
(3, 1, 21, '2 Elektronika A'),
(4, 1, 22, '2 Elektronika B'),
(5, 1, 31, '3 Elektronika');

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
-- Struktur dari tabel `mahasiswa_kampus`
--

CREATE TABLE `mahasiswa_kampus` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` text NOT NULL,
  `nama` text NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `jurusan` text NOT NULL,
  `kelas` text NOT NULL,
  `asal_sekolah` text NOT NULL,
  `tahun_ajaran` text NOT NULL,
  `no_hp` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `mahasiswa_kampus`
--

INSERT INTO `mahasiswa_kampus` (`id_mahasiswa`, `nim`, `nama`, `jenis_kelamin`, `jurusan`, `kelas`, `asal_sekolah`, `tahun_ajaran`, `no_hp`, `email`) VALUES
(1, '2202049', 'RIZKY AGUSTI', 'Pria', '1', '2 Elektronika A', 'SMAN 14 Tangerang', '2023', '085691964185', 'gintama@gmail.com'),
(2, '2202039', 'Yanto', 'Pria', '1', '2 Elektronika A', 'SMKN2 Kabupaten Tangerang', '2023', '2202048', '111@gmail.com'),
(4, '2202012', 'Kuningan', 'Pria', '1', '1 Elektronika A', 'asdas', '2023', '22222', 'backupnyagus@gmail.com'),
(8, '2202043', 'July', 'Pria', '1', '2 Elektronika A', 'SMAN 14 Tangerang', '2023', '85691964183', 'gintama@gmail.com'),
(9, '2202047', 'farid', 'Pria', '1', '1 Elektronika A', 'SMAN 14 Tangerang', '2023', '85691964183', 'gintama@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_pribadi`
--

CREATE TABLE `mahasiswa_pribadi` (
  `id_mahasiswa_pribadi` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama_ibu_kandung` varchar(255) DEFAULT NULL,
  `npwp` varchar(20) DEFAULT NULL,
  `no_bpjs` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `mahasiswa_pribadi`
--

INSERT INTO `mahasiswa_pribadi` (`id_mahasiswa_pribadi`, `id_mahasiswa`, `nama`, `agama`, `nik`, `nama_ibu_kandung`, `npwp`, `no_bpjs`, `alamat`, `golongan_darah`) VALUES
(1, 2, 'Nama_2', 'Kristen', '0000000000953352', 'Ibu_2', '0000725981', '0000769852', 'Alamat_2', 'A'),
(3, 1, 'Nama_1', 'Kristen', '0000000000041171', 'Ibu_5', '0000197426', '0000863617', 'Alamat_1', 'A'),
(4, 4, 'Nama_4', 'Islam', '0000000000619297', 'Ibu_4', '0000405392', '0000169068', 'Alamat_4', 'A'),
(7, 8, NULL, 'Islam', '229922', 'Yeni', '20220202', '202020', 'anjay udah', 'a'),
(8, 9, 'farid', 'Islam', '229922', 'Yeni', '20220202', '202020', 'anjay', 'a');

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
(27, 'Agusti04', 'agusti@gmail.com', '$2y$10$wLslSHcuX.42McHWvcE4.eM.rZLkk0VSI41gTvKf3TCyx7QuF8Njq', NULL, '657483bda8f11.png'),
(28, 'Agussti', 'agusti@gmail.com', '$2y$10$idBiSXB9l5IkyYt4pHvUNO37ZQY2XkQxRyU3WXsk7jDWiVlqB1zdK', NULL, '657a52a2d4692.png');

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
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `mahasiswa_kampus`
--
ALTER TABLE `mahasiswa_kampus`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `mahasiswa_pribadi`
--
ALTER TABLE `mahasiswa_pribadi`
  ADD PRIMARY KEY (`id_mahasiswa_pribadi`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `jurusans_mata_kuliahs`
--
ALTER TABLE `jurusans_mata_kuliahs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_kampus`
--
ALTER TABLE `mahasiswa_kampus`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_pribadi`
--
ALTER TABLE `mahasiswa_pribadi`
  MODIFY `id_mahasiswa_pribadi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliahs`
--
ALTER TABLE `mata_kuliahs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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

--
-- Ketidakleluasaan untuk tabel `mahasiswa_pribadi`
--
ALTER TABLE `mahasiswa_pribadi`
  ADD CONSTRAINT `mahasiswa_pribadi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa_kampus` (`id_mahasiswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
