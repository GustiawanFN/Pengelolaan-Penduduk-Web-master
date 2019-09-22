-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2019 pada 18.35
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa_cipetir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `akses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `akses`) VALUES
(20, 'fajar', '24bc50d85ad8fa9cda686145cf1f8aca', 1),
(22, 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 1),
(50, 'admin', 'admin', 1),
(51, 'supri', 'supri', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelahiran`
--

CREATE TABLE `kelahiran` (
  `id_kelahiran` varchar(100) NOT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `nama_anak` varchar(50) DEFAULT NULL,
  `anak_ke` varchar(2) DEFAULT NULL,
  `jk_anak` varchar(10) DEFAULT NULL,
  `tgl_kelahiran` varchar(10) DEFAULT NULL,
  `tempat_kelahiran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian`
--

CREATE TABLE `kematian` (
  `id_mati` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `tgl_mati` varchar(10) DEFAULT NULL,
  `waktu` varchar(10) DEFAULT NULL,
  `tempat_makam` text,
  `tempat_meninggal` text,
  `penyebab` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kk`
--

CREATE TABLE `kk` (
  `no_kk` varchar(100) NOT NULL,
  `kec` varchar(20) DEFAULT NULL,
  `kab` varchar(20) DEFAULT NULL,
  `provinsi` varchar(20) DEFAULT NULL,
  `kodepos` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kk`
--

INSERT INTO `kk` (`no_kk`, `kec`, `kab`, `provinsi`, `kodepos`) VALUES
('3208070104110004', 'Lebakwangi', 'Kuningan', 'Jawa Barat', '45574');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi_kk`
--

CREATE TABLE `klasifikasi_kk` (
  `id_kla` varchar(100) NOT NULL,
  `no_kk` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `statuskk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klasifikasi_kk`
--

INSERT INTO `klasifikasi_kk` (`id_kla`, `no_kk`, `nik`, `statuskk`) VALUES
('00001', '3208070104110004', '3208070308820007', 'KEPALA_KELUARGA'),
('00002', '3208070104110004', '3208072103110001', 'ANAK'),
('00003', '3208070104110004', '3208075301890008', 'ISTRI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` varchar(50) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `alamat_tujuan` text,
  `alamat_sebelum` text,
  `tanggal_mutasi` varchar(10) DEFAULT NULL,
  `alasan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(100) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(20) DEFAULT NULL,
  `dusun` varchar(20) DEFAULT NULL,
  `rt` varchar(3) DEFAULT NULL,
  `rw` varchar(3) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `alamat` text,
  `status_keluarga` varchar(50) DEFAULT NULL,
  `status_perkawinan` varchar(20) DEFAULT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `ayah` varchar(50) DEFAULT NULL,
  `ibu` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `status_cari` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `dusun`, `rt`, `rw`, `jk`, `golongan_darah`, `alamat`, `status_keluarga`, `status_perkawinan`, `pendidikan`, `pekerjaan`, `kewarganegaraan`, `agama`, `ayah`, `ibu`, `status`, `status_cari`) VALUES
('3208070308820007', 'Toto', 'Kuningan', '03/08/1982', 'Kliwon', '01', '01', 'Laki-laki', '', 'Desa Cipetir', 'KEPALA_KELUARGA', 'KAWIN', 'TAMAT SD/SEDERAJAT', 'WIRASWASTA', 'WNI', 'Islam', 'Suhardi', 'Darni', '1', '1'),
('3208072103110001', 'Galih Tyo Sandria', 'Kuningan', '03/21/2011', 'Kliwon', '01', '01', 'Laki-laki', '', 'Desa Cipetir', 'ANAK', 'BELUM KAWIN', 'TIDAK / BELUM SEKOLAH', 'BELUM / TIDAK BEKERJA', 'WNI', 'Islam', 'Toto', 'Enah', '1', '1'),
('3208075301890008', 'Enah', 'Kuningan', '01/13/1989', 'Kliwon', '01', '01', 'Perempuan', '', 'Desa Cipetir', 'ISTRI', 'KAWIN', 'SLTA/SEDERAJAT', 'MENGURUS RUMAH TANGGA', 'WNI', 'Islam', 'Abas', 'Rati', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`id_mati`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indeks untuk tabel `klasifikasi_kk`
--
ALTER TABLE `klasifikasi_kk`
  ADD PRIMARY KEY (`id_kla`),
  ADD KEY `no_kk` (`no_kk`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD CONSTRAINT `kelahiran_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kematian`
--
ALTER TABLE `kematian`
  ADD CONSTRAINT `kematian_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `klasifikasi_kk`
--
ALTER TABLE `klasifikasi_kk`
  ADD CONSTRAINT `klasifikasi_kk_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `klasifikasi_kk_ibfk_2` FOREIGN KEY (`no_kk`) REFERENCES `kk` (`no_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mutasi`
--
ALTER TABLE `mutasi`
  ADD CONSTRAINT `mutasi_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
