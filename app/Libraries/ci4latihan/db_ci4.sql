-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 20.20
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ci4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`) VALUES
(5, 'Bagas', '1312'),
(6, 'Bagas Widiyanto ', 'Mahasiswa'),
(7, 'Bagas', 'eqw'),
(8, 'Product 12312312', '12312321'),
(9, 'Product 12312312', '1231231sada'),
(10, 'Udin', '1231231sada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `harga`, `stok`) VALUES
(1, 'Sari Roti', 5000, 20),
(2, 'Buku Gambar', 15000, 200),
(3, 'Pulpen', 5000, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_fakultas`
--

INSERT INTO `tbl_fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Ilmu Komputer'),
(2, 'Pendidikan'),
(3, 'Ekonomi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeries`
--

CREATE TABLE `tbl_galeries` (
  `id` int(11) NOT NULL,
  `id_upload` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_galeries`
--

INSERT INTO `tbl_galeries` (`id`, `id_upload`, `gambar`) VALUES
(9, 711, '1624353301_8cbaa4cfb7e49a974c2b.jpeg'),
(10, 711, '1624353301_9dd6c9d088346cd5ec8f.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Teknik Informatika'),
(2, 'Guru SMK'),
(3, 'Akuntansi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id` int(11) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id`, `nama_mhs`, `id_fakultas`, `id_jurusan`, `alamat`) VALUES
(1, 'Bagas', 1, 1, 'Bogor'),
(2, 'Udin', 2, 2, 'Cibinong'),
(3, 'Hendrik', 3, 3, 'Depok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `id` int(11) NOT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`id`, `tahun`, `jumlah`) VALUES
(1, '2010', 100),
(2, '2011', 150),
(3, '2012', 200),
(4, '2013', 250),
(5, '2014', 50),
(6, '2015', 300),
(2017, '1111', 11111222);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `foto_siswa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis`, `nama`, `email`, `foto_siswa`) VALUES
(1, '2131231', 'Bagas Widiyanto', 'alchemist@gmail.com', '1604893075_27cd6f2ce4b6a417804c.jpg'),
(2, '2017100019', 'Bagas Widiyanto', 'bagaswidiyanto123@gmail.com', '1604894293_d54f592da21f65d81dc6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_upload`
--

CREATE TABLE `tbl_upload` (
  `id` int(11) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_upload`
--

INSERT INTO `tbl_upload` (`id`, `ket`, `gambar`) VALUES
(5, 'asasdas', 'IMG_20190607_170445.jpg'),
(6, 'Bagas', 'aasdas.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_uploads`
--

CREATE TABLE `tbl_uploads` (
  `id_upload` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_uploads`
--

INSERT INTO `tbl_uploads` (`id_upload`, `judul`) VALUES
(711, 'Album 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Bagas', 'admin', 'admin', 1),
(2, 'Widiyanto', 'user', 'user', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `tbl_galeries`
--
ALTER TABLE `tbl_galeries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tbl_upload`
--
ALTER TABLE `tbl_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_galeries`
--
ALTER TABLE `tbl_galeries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2018;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_upload`
--
ALTER TABLE `tbl_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=712;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
