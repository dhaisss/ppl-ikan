-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Sep 2018 pada 10.31
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikan`
--

CREATE TABLE `ikan` (
  `idIkan` int(11) NOT NULL,
  `tanggalPenawaran` date NOT NULL,
  `idAgen` int(11) NOT NULL,
  `jenisIkan` int(11) NOT NULL,
  `namaIkan` varchar(25) NOT NULL,
  `jumlahIkan` int(11) NOT NULL,
  `hargaIkan` bigint(20) NOT NULL,
  `statusIkan` int(11) NOT NULL DEFAULT '1',
  `kategoriIkan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ikan`
--

INSERT INTO `ikan` (`idIkan`, `tanggalPenawaran`, `idAgen`, `jenisIkan`, `namaIkan`, `jumlahIkan`, `hargaIkan`, `statusIkan`, `kategoriIkan`) VALUES
(1, '2018-09-13', 10, 1, 'Nila', 900, 10000, 1, 1),
(2, '2018-09-13', 10, 1, 'Gurami', 100, 20000, 1, 2),
(3, '2018-09-13', 10, 1, 'Nila', 90, 20000, 1, 1),
(4, '2018-09-13', 10, 2, 'Tongkol', 120, 7000, 1, 2),
(5, '2018-09-13', 11, 1, 'Lele', 300, 8000, 1, 1),
(6, '2018-09-14', 10, 1, 'Hiu', 10, 200000, 1, 1),
(7, '2018-09-14', 10, 1, 'Nila', 100, 50000, 1, 1),
(8, '2018-09-14', 10, 1, 'Nila', 20, 10000, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisikan`
--

CREATE TABLE `jenisikan` (
  `idJenisIkan` int(11) NOT NULL,
  `jenisIkan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenisikan`
--

INSERT INTO `jenisikan` (`idJenisIkan`, `jenisIkan`) VALUES
(1, 'Ikan Laut'),
(2, 'Ikan Tawar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoriikan`
--

CREATE TABLE `kategoriikan` (
  `idKategori` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategoriikan`
--

INSERT INTO `kategoriikan` (`idKategori`, `kategori`) VALUES
(1, 'Ikan Segar'),
(2, 'Ikan Tidak Segar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `idlevel` int(11) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`idlevel`, `level`) VALUES
(1, 'Agen'),
(2, 'Pengusaha'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusikan`
--

CREATE TABLE `statusikan` (
  `idStatusIkan` int(11) NOT NULL,
  `statusIkan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `statusikan`
--

INSERT INTO `statusikan` (`idStatusIkan`, `statusIkan`) VALUES
(1, 'Ditawarkan'),
(2, 'Terjual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statustransaksi`
--

CREATE TABLE `statustransaksi` (
  `idStatusTransaksi` int(11) NOT NULL,
  `statusTransaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `statustransaksi`
--

INSERT INTO `statustransaksi` (`idStatusTransaksi`, `statusTransaksi`) VALUES
(1, 'Menunggu Persetujuan'),
(2, 'Dinego'),
(3, 'Ditolak'),
(4, 'Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `idIkan` int(11) NOT NULL,
  `idPengusaha` int(11) NOT NULL,
  `tanggalBeli` date NOT NULL,
  `statusTransaksi` int(11) NOT NULL DEFAULT '1',
  `ongkir` bigint(20) DEFAULT NULL,
  `buktiTransfer` varchar(250) DEFAULT NULL,
  `jumlahIkan` int(11) NOT NULL,
  `hargaIkan` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `created_at` date NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `noRek` varchar(20) NOT NULL,
  `noTelepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `alamat`, `kecamatan`, `kabupaten`, `created_at`, `provinsi`, `level`, `remember_token`, `noRek`, `noTelepon`) VALUES
(5, 'Dhais Firmansyah', 'dhaisfirmansyah@gmail.com', '$2y$10$6rva9n8V/ffuz3lQQCfVZuymnoMNjEbzZc.Ktq1QXgKycj5TbptsW', '2018-09-12', 'Perum Muktisari', 'Kaliwates', 'Jember', '2018-09-12', 'Jawa Timur', 1, 'Klz4XkQ9g8VZ3r3T9REK87UMlpp5WkUSNzFkDxJ3A2iqK5iIsBlJMhyoQnDs', '123123123123', '082386199996'),
(6, 'admin', 'admin@admin.com', '$2y$12$.7aUgtP9o952gRtap0svS.eJRcTzTDSXXhP8Shd0.aenWOoYu6Ep6', '2018-09-12', 'Perum Muktisari', 'Kaliwates', 'Jember', '2018-09-12', 'Jawa Timur', 3, 'lwU4PoGdA8XalqHnnl3f90Dlp5rEY1BzZ57uU1U8URfETeOlCCQlbHUB7psy', '123123123123', '082386199996'),
(7, 'Billy', 'billy@gmail.com', '$2y$10$d5lnNlA5Ph2fwP2Izzv1e.o1xGE2.JyOSBM/Hw5hlRQYxQh6M6XpC', '2018-09-12', 'Halmahera', 'Sumbersari', 'Jember', '2018-09-12', 'Jawa Timur', 1, 'U1ySsVf4TG2WhAaAM4swE7wskbHMCtmuoBgOnGb1TE16F25U4CdtqwsNyZAZ', '123123123123', '082386199996'),
(8, 'Wahib Irawan', 'wahib@gmail.com', '$2y$10$GKjFpYQuqg1bncDpwPszjeC./ebUBSTUCc2jGATmiP7L4GBDJe3Hm', '2018-09-12', 'Halmahera', 'Sumbersari', 'Jember', '2018-09-12', 'Jawa Timur', 2, 'Bctf29gO66yTcYYfeB4SoTHw6nR4Gi55H91aLZ5zdbKqvHICbvJg5WeAYLW7', '123123123123', '082386199996'),
(10, 'Devi Putri', 'devi@devi.com', '$2y$10$NbcGPCcZnsE5X27tUr97n.tsNVPOlJLlC8kgOg.iu6qi/V6oOBV.y', '2018-09-13', 'Patrang', 'Patrang', 'Jember', '2018-09-13', 'Jawa Timur', 1, 'Oq22GZRsi9xKSs2jBEga07QrL7p6REUHBl103bNLqdkLu9D2yZAOUERXwGGT', '123123123123', '082386199996'),
(11, 'Dheta Indra', 'dheta@gmail.com', '$2y$10$pKQfXsBvcgeB0AqP1v56l.skhy7v6rwVGVqmPKPEFE9lVkXaamIji', '2018-09-13', 'Perum Pondok Gede', 'Kaliwates', 'Jember', '2018-09-13', 'Jawa Timur', 1, '76CaQk9z1p597z8wV35uOYAZLEM3SW3VVaXPqds0Vuq8lTkwg9lVl4Vv9Fi8', '098098098765', '082386199996'),
(12, 'Hafiz Ardi', 'hafiz@hafiz.com', '$2y$10$wLtnylShqn3Oyaa3N5v9HuEV24ux2bdlDER054JZaf3HMtN0JDbSW', '2018-09-14', 'Jl Jawa IV', 'Sumbersari', 'Jember', '2018-09-14', 'Jawa Timur', 2, 'Q2r0IUsBzCyuCKEKMRCBjXlwzTUhSxwKrZRK6c425CKt7kFvNaRBwgQPfQXx', '098098098765', '082386199996');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`idIkan`);

--
-- Indexes for table `jenisikan`
--
ALTER TABLE `jenisikan`
  ADD PRIMARY KEY (`idJenisIkan`);

--
-- Indexes for table `kategoriikan`
--
ALTER TABLE `kategoriikan`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`idlevel`);

--
-- Indexes for table `statusikan`
--
ALTER TABLE `statusikan`
  ADD PRIMARY KEY (`idStatusIkan`);

--
-- Indexes for table `statustransaksi`
--
ALTER TABLE `statustransaksi`
  ADD PRIMARY KEY (`idStatusTransaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ikan`
--
ALTER TABLE `ikan`
  MODIFY `idIkan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jenisikan`
--
ALTER TABLE `jenisikan`
  MODIFY `idJenisIkan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `idlevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `statustransaksi`
--
ALTER TABLE `statustransaksi`
  MODIFY `idStatusTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
