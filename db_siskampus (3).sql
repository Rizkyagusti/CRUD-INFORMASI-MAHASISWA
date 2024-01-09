-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2024 pada 13.06
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
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar` text NOT NULL,
  `headline` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `tanggal`, `gambar`, `headline`, `deskripsi`) VALUES
(1, '2024-01-07 11:01:12', '659a847884b2a.jpg', 'Izin Sudah Bisa', 'Mahasiswa Politeknik Gajah Tunggal kini sudah bisa melakukan izin di aplikasi edu PGT'),
(2, '2024-01-07 11:01:39', '659a84935af34.jpg', 'Mahasiswa perlu pengajuan data', 'Mahasiswa yang baru melakukan login perlu melakukan pengajuan data '),
(3, '2024-01-07 11:02:57', '659a84e16213f.jpg', 'Informasi Mahasiswa', 'Mahasiswa yang merasa sudah terdaftar silahkan cek halaman informasi mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_izin_1`
--

CREATE TABLE `data_izin_1` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` text NOT NULL,
  `nim` int(11) NOT NULL,
  `kelas` text NOT NULL,
  `jurusan` text NOT NULL,
  `keperluan` text NOT NULL,
  `persetujuan1` text NOT NULL,
  `persetujuan2` text NOT NULL,
  `jam_keluar` time NOT NULL,
  `jam_masuk` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_izin_1`
--

INSERT INTO `data_izin_1` (`id`, `tanggal`, `nama`, `nim`, `kelas`, `jurusan`, `keperluan`, `persetujuan1`, `persetujuan2`, `jam_keluar`, `jam_masuk`) VALUES
(1, '2023-01-01', 'John Doe', 1234567890, '', '', 'Pembayaran', 'Disetujui', 'Di Izinkan', '18:30:00', '08:00:00'),
(2, '2023-01-02', 'Jane Doe', 2147483647, '', '', 'Izin Sakit', 'Disetujui', 'Di Izinkan', '12:45:00', '10:30:00'),
(3, '2023-01-03', 'Alice Smith', 1122334455, '', '', 'Studi Lapangan', 'Menunggu', 'Di Izinkan', '14:15:00', '11:00:00'),
(8, '2023-12-22', 'Udin', 2202029, '', '', 'Mau berak', 'Menunggu', 'Di Izinkan', '22:02:00', '22:07:00'),
(9, '2023-12-23', 'Rizky Agusti', 2202049, '1 Elektronika A', '1', 'Mau Futsal', 'Menunggu', 'Di Izinkan', '22:04:00', '22:08:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_izin_2`
--

CREATE TABLE `data_izin_2` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama` text NOT NULL,
  `nim` int(11) NOT NULL,
  `kelas` text NOT NULL,
  `jurusan` text NOT NULL,
  `tanggal_izin` date NOT NULL,
  `keperluan` text NOT NULL,
  `bukti` text NOT NULL,
  `persetujuan2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_izin_2`
--

INSERT INTO `data_izin_2` (`id`, `tanggal`, `nama`, `nim`, `kelas`, `jurusan`, `tanggal_izin`, `keperluan`, `bukti`, `persetujuan2`) VALUES
(1, '2022-12-31 17:00:00', 'John Doe', 1234567890, 'A1', '', '2023-01-02', 'Sakit', 'Disetujui', 'Menunggu'),
(2, '2023-01-02 17:00:00', 'Jane Doe', 2147483647, 'B2', '', '2023-01-04', 'Studi Lapangan', 'Menunggu', 'Menunggu'),
(3, '2023-01-04 17:00:00', 'Alice Smith', 1122334455, 'C3', '', '2023-01-06', 'Kegiatan Mahasiswa', 'Disetujui', 'Di Tolak'),
(5, '2023-12-19 12:29:27', 'RIZKY AGUSTI2', 2202049, '2 Elektronika A', '', '2023-12-30', 'Sakit', '65818ca75f61e.pdf', ''),
(6, '2023-12-19 12:31:17', 'RIZKY AGUSTI3', 2202049, '2 Elektronika A', '', '2023-12-20', 'Sakit', '65818d156e919.pdf', ''),
(7, '2024-01-01 12:48:57', 'RIZKY AGUSTI4', 2202049, '2 Elektronika A', '1', '2023-12-22', 'Sakit', '6592b4b98a532.pdf', 'Di Izinkan');

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
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `kelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `id_jurusan`, `kelas`) VALUES
(1, 1, '3 Elektronika A'),
(2, 1, '2 Elektronika B'),
(3, 1, '2 Elektronika A'),
(4, 1, '1 Elektronika B'),
(5, 1, '1 Elektronika A'),
(6, 2, '3 Mesin'),
(7, 2, '2 Mesin B'),
(8, 2, '2 Mesin A'),
(9, 2, '1 Mesin B'),
(10, 2, '1 Mesin A'),
(11, 3, '1 Teknologi Industri'),
(12, 3, '2 Teknologi Industri'),
(13, 3, '3 Teknologi Industri');

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
(0, '2202020', 'REZA WAHYU RAMADHAN', 'Pria', '1', '2 Elektronika A', 'SMKN2 Kabupaten Tangerang', '2023', '085691964185', 'rezawahyuramadhan@gmail.com'),
(4, '2202012', 'Kuningan', 'Pria', '1', '1 Elektronika A', 'asdas', '2023', '22222', 'backupnyagus@gmail.com'),
(8, '2202043', 'July', 'Pria', '1', '2 Elektronika A', 'SMAN 14 Tangerang', '2023', '85691964183', 'gintama@gmail.com'),
(9, '2202047', 'farid', 'Pria', '1', '1 Elektronika A', 'SMAN 14 Tangerang', '2023', '85691964183', 'gintama@gmail.com'),
(10, '2202049', 'RIZKY AGUSTI', 'Pria', '1', '2 Elektronika A', 'SMKN2 Kabupaten Tangerang', '2023', '085691964185', 'rizkyagusti7@gmail.com'),
(11, '2202021', 'Finnan', 'Pria', '1', '2 Elektronika A', 'SMAN 14 Tangerang', '2023', '085691964185', 'rizkyagusti7@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_pengajuan_1`
--

CREATE TABLE `mahasiswa_pengajuan_1` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `jurusan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kelas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `asal_sekolah` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tahun_ajaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_pengajuan_2`
--

CREATE TABLE `mahasiswa_pengajuan_2` (
  `id_mahasiswa_pribadi` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `agama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nik` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nama_ibu_kandung` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `npwp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `no_bpjs` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `golongan_darah` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(0, NULL, 'REZA WAHYU RAMADHAN', 'Islam', '3671022808040002', 'slamet', '000', '000', 'rajeg', 'a'),
(4, 4, 'Nama_4', 'Islam', '0000000000619297', 'Ibu_4', '0000405392', '0000169068', 'Alamat_4', 'A'),
(7, 8, NULL, 'Islam', '229922', 'Yeni', '20220202', '202020', 'anjay udah', 'a'),
(8, 9, 'farid', 'Islam', '229922', 'Yeni', '20220202', '202020', 'anjay', 'a'),
(9, NULL, NULL, 'Islam', '3671022808040002', 'Eti Purnamasari', '000', '000', 'cadas', 'a'),
(10, NULL, NULL, 'Islam', '3671022808040002', 'ga tau2', '000', '000', 'rajeg', 'a');

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
  `role` enum('admin','petugas_pendaftaran','Mahasiswa') DEFAULT 'Mahasiswa',
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `gambar`) VALUES
(27, 'admin', 'admin@gmail.com', '$2y$10$dlB4zqWC.66QN0TuBODIFeGA6UulHTQK15g7EVXhnQqp0cCGNHiGK', 'admin', NULL),
(31, '2202049', 'agusti@gmail.com', '$2y$10$3WW46qnKgfHYHw7QpkDmKuf82HXj5Uh609EQggQaEW/7edY5J9.h.', 'Mahasiswa', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_izin_1`
--
ALTER TABLE `data_izin_1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_izin_2`
--
ALTER TABLE `data_izin_2`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `mahasiswa_pengajuan_1`
--
ALTER TABLE `mahasiswa_pengajuan_1`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `mahasiswa_pengajuan_2`
--
ALTER TABLE `mahasiswa_pengajuan_2`
  ADD PRIMARY KEY (`id_mahasiswa_pribadi`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

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
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_izin_1`
--
ALTER TABLE `data_izin_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_izin_2`
--
ALTER TABLE `data_izin_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jumlah_kelas`
--
ALTER TABLE `jumlah_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `jurusans_mata_kuliahs`
--
ALTER TABLE `jurusans_mata_kuliahs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
