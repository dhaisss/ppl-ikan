-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Okt 2018 pada 08.05
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
  `tanggalPenawaran` datetime NOT NULL,
  `idAgen` int(11) NOT NULL,
  `jenisIkan` int(11) NOT NULL,
  `namaIkan` varchar(25) NOT NULL,
  `jumlahIkan` int(11) NOT NULL,
  `hargaIkan` bigint(20) NOT NULL,
  `statusIkan` int(11) NOT NULL DEFAULT '1',
  `kategoriIkan` int(11) NOT NULL,
  `fotoIkan` varchar(255) NOT NULL DEFAULT 'fish.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ikan`
--

INSERT INTO `ikan` (`idIkan`, `tanggalPenawaran`, `idAgen`, `jenisIkan`, `namaIkan`, `jumlahIkan`, `hargaIkan`, `statusIkan`, `kategoriIkan`, `fotoIkan`) VALUES
(1, '2018-09-13 00:00:00', 10, 1, 'Nila', -200, 10000, 2, 1, 'fish.png'),
(2, '2018-09-13 00:00:00', 11, 1, 'Gurami', 0, 20000, 2, 2, 'fish.png'),
(3, '2018-09-13 00:00:00', 10, 1, 'Nila', 90, 20000, 1, 1, 'fish.png'),
(4, '2018-09-13 00:00:00', 10, 2, 'Tongkol', 120, 7000, 1, 2, 'fish.png'),
(5, '2018-09-13 00:00:00', 11, 1, 'Lele', 300, 8000, 1, 1, 'fish.png'),
(6, '2018-09-14 00:00:00', 10, 1, 'Hiu', 0, 200000, 2, 1, 'fish.png'),
(7, '2018-09-14 00:00:00', 10, 1, 'Nila', 100, 50000, 1, 1, 'fish.png'),
(8, '2018-09-14 00:00:00', 11, 1, 'Nila', 0, 10000, 1, 1, 'fish.png'),
(9, '2018-09-16 00:00:00', 10, 1, 'Nila', 200, 8000, 1, 1, 'fish.png'),
(10, '2018-09-16 00:00:00', 10, 1, 'Nila', 200, 8000, 1, 1, 'fish.png'),
(11, '2018-09-16 00:00:00', 10, 1, 'Gurami', 10, 7000, 1, 1, 'fish.png'),
(12, '2018-09-16 00:00:00', 10, 1, 'Gurami', 10, 7000, 1, 1, 'fish.png'),
(13, '2018-09-16 00:00:00', 10, 1, 'Gurami', 10, 7000, 1, 1, 'fish.png'),
(17, '2018-10-10 05:45:50', 10, 1, 'Nila', 0, 32000, 2, 1, 'ikan-segar_20151230_131514.jpg');

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
(2, 'Ditolak'),
(3, 'Disetujui'),
(4, 'Menunggu Verifikasi'),
(5, 'Menunggu Bukti'),
(6, 'Menunggu Pengiriman'),
(7, 'Dalam Pengiriman'),
(8, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `idIkan` int(11) NOT NULL,
  `idAgen` int(11) NOT NULL,
  `idPengusaha` int(11) NOT NULL,
  `tanggalBeli` datetime NOT NULL,
  `statusTransaksi` int(11) NOT NULL DEFAULT '1',
  `ongkir` bigint(20) DEFAULT NULL,
  `buktiTransfer` varchar(250) DEFAULT NULL,
  `jumlahIkan` int(11) NOT NULL,
  `hargaIkan` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idIkan`, `idAgen`, `idPengusaha`, `tanggalBeli`, `statusTransaksi`, `ongkir`, `buktiTransfer`, `jumlahIkan`, `hargaIkan`) VALUES
(1, 2, 10, 8, '2018-09-16 00:00:00', 7, 90000, 'bukti 2.png', 100, 20000),
(2, 5, 11, 8, '2018-09-18 00:00:00', 3, 1000000, NULL, 200, 8000),
(3, 8, 11, 8, '2018-09-18 00:00:00', 6, 100000, '0', 10, 10000),
(4, 6, 10, 8, '2018-09-18 00:00:00', 8, 90000, 'bukti transfer.jpeg', 5, 200000),
(5, 6, 10, 8, '2018-09-18 00:00:00', 5, 1000000, NULL, 10, 200000),
(6, 6, 10, 8, '2018-09-18 00:00:00', 5, 1000000, NULL, 10, 200000),
(7, 1, 10, 13, '2018-09-22 00:00:00', 4, 1000000, '7', 200, 10000),
(8, 2, 11, 12, '2018-09-22 00:00:00', 4, 1000000, '8', 100, 20000);

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
  `noRek` varchar(20) DEFAULT NULL,
  `noTelepon` varchar(13) DEFAULT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'foto.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `alamat`, `kecamatan`, `kabupaten`, `created_at`, `provinsi`, `level`, `remember_token`, `noRek`, `noTelepon`, `foto`) VALUES
(5, 'Dhais Firmansyah', 'dhaisfirmansyah@gmail.com', '$2y$10$6rva9n8V/ffuz3lQQCfVZuymnoMNjEbzZc.Ktq1QXgKycj5TbptsW', '2018-09-12', 'Perum Muktisari', 'Kaliwates', 'Jember', '2018-09-12', 'Jawa Timur', 1, 'Klz4XkQ9g8VZ3r3T9REK87UMlpp5WkUSNzFkDxJ3A2iqK5iIsBlJMhyoQnDs', '123123123123', '082386199996', 'foto.jpg'),
(6, 'admin', 'admin@admin.com', '$2y$12$.7aUgtP9o952gRtap0svS.eJRcTzTDSXXhP8Shd0.aenWOoYu6Ep6', '2018-10-10', 'Perum Muktisari', 'Kaliwates', 'Jember', '2018-09-12', 'Jawa Timur', 3, '58E1XjnlmIKtb2e1nAf0N2V51z5AF6IF8JxB8iFHq5kArlf8P3MMeWpOjt4g', '123123123123', '082386199996', 'yyy_320320320320320.PNG'),
(7, 'Billy', 'billy@gmail.com', '$2y$10$d5lnNlA5Ph2fwP2Izzv1e.o1xGE2.JyOSBM/Hw5hlRQYxQh6M6XpC', '2018-09-12', 'Halmahera', 'Sumbersari', 'Jember', '2018-09-12', 'Jawa Timur', 1, 'U1ySsVf4TG2WhAaAM4swE7wskbHMCtmuoBgOnGb1TE16F25U4CdtqwsNyZAZ', '123123123123', '082386199996', 'foto.jpg'),
(8, 'Wahib Irawan', 'wahib@gmail.com', '$2y$10$GKjFpYQuqg1bncDpwPszjeC./ebUBSTUCc2jGATmiP7L4GBDJe3Hm', '2018-09-12', 'Halmahera', 'Sumbersari', 'Jember', '2018-09-12', 'Jawa Timur', 2, 'DLtwcGVQASsDJpkM7b88REIkELnC6JeuZDF6Cd713mi5UbpujODiajuCBydW', '123123123123', '082386199996', 'foto.jpg'),
(10, 'Devi Putri', 'devi@devi.com', '$2y$10$NbcGPCcZnsE5X27tUr97n.tsNVPOlJLlC8kgOg.iu6qi/V6oOBV.y', '2018-10-10', 'Patrang', 'Patrang', 'Jember', '2018-09-13', 'Jawa Timur', 1, 'uctmpIyU5stZ7ZDRI7SMWI3yq3yGrz53qyGjlwMtgjcANQCkhsMWpYo0TSEq', '123123123123', '082386199996', '4x6_8888888765674323.jpg'),
(11, 'Dheta Indra', 'dheta@gmail.com', '$2y$10$pKQfXsBvcgeB0AqP1v56l.skhy7v6rwVGVqmPKPEFE9lVkXaamIji', '2018-09-13', 'Perum Pondok Gede', 'Kaliwates', 'Jember', '2018-09-13', 'Jawa Timur', 1, 'ifQLGgJJj0LJ9nnpcTTCTG9b0i3N8jRpiqtlTtF6rpUbciJA9rWDkHm6v2yx', '098098098765', '082386199996', 'foto.jpg'),
(12, 'Hafiz Ardi', 'hafiz@hafiz.com', '$2y$10$wLtnylShqn3Oyaa3N5v9HuEV24ux2bdlDER054JZaf3HMtN0JDbSW', '2018-09-14', 'Jl Jawa IV', 'Sumbersari', 'Jember', '2018-09-14', 'Jawa Timur', 2, 'Em4cGEwtXo3nfLjJrSApNq1FIa9YV5UNeCl0gpODAh92P3G1c8bwChgqduSA', '098098098765', '082386199996', 'foto.jpg'),
(13, 'Deddy Firdaus', 'deddy@deddy.com', '$2y$10$KpkosCT.JmZERLMv2qFWzeBiG0EVwRmnuMdInZ4jsyBo7WAjDrULC', '2018-10-10', 'Halmahera', 'Sumbersari', 'Jember', '2018-09-22', 'Jawa Timur', 2, 'Tc2gzRXPNvDM9lY6uOpGL6xGQSkUGPxn9XP3useWrZUU8iVc6GQbOE7d05xb', '098098098765', '081230175922', 'rei.jpg');

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
  MODIFY `idIkan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
  MODIFY `idStatusTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
