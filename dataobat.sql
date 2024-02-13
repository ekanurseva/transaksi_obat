-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2024 pada 04.33
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataobat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `iddetail_transaksi` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `transaksi_idtransaksi` int(11) NOT NULL,
  `obat_idobat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`iddetail_transaksi`, `qty`, `subtotal`, `transaksi_idtransaksi`, `obat_idobat`) VALUES
(1, 1, 20000, 1, 7),
(2, 3, 45000, 1, 9),
(3, 5, 75000, 1, 3),
(4, 6, 210000, 2, 8),
(5, 2, 30000, 2, 9),
(6, 1, 12000, 2, 6),
(7, 10, 200000, 3, 7),
(8, 7, 105000, 3, 9),
(9, 10, 100000, 4, 11),
(10, 12, 48000, 4, 2),
(11, 90, 720000, 5, 10),
(12, 3, 24000, 6, 5),
(13, 6, 90000, 7, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_obat`
--

INSERT INTO `kategori_obat` (`idkategori`, `kategori`) VALUES
(2, 'Vitamin dan Suplemen'),
(3, 'Analgesik (Pereda Nyeri)'),
(4, 'Antipiretik (Penurun Demam)'),
(5, 'Antibiotik'),
(7, 'Antasida'),
(8, 'Antihistamin'),
(9, 'Antilipidemia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `idobat` int(11) NOT NULL,
  `kode_obat` varchar(45) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `dosis` varchar(45) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `expired` date NOT NULL,
  `kemasan` varchar(50) NOT NULL,
  `idkategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`idobat`, `kode_obat`, `nama_obat`, `deskripsi`, `dosis`, `harga`, `stok`, `expired`, `kemasan`, `idkategori`) VALUES
(2, 'A0010', 'Parasetamol', 'Mengurangi nyeri kepala', '500 mg', 4000, 8, '2024-12-12', 'tablet', 4),
(3, 'AM0012', 'Amoxicillin', 'Antibiotik untuk mengatasi infeksi bakteri', '250 mg', 15000, 39, '0000-00-00', 'kapsul', 5),
(4, 'OMP012', 'Omeprazol', 'Obat untuk mengurangi produksi asam lambung', '20 mg', 7000, 60, '2025-06-09', 'botol', 7),
(5, 'DD0891', 'Diphenhydramine', 'Obat antihistamin untuk alergi dan pilek', '25 mg', 8000, 67, '2025-07-16', 'botol', 8),
(6, 'SV671', 'Simvastatin', 'Obat penurun kolesterol', '10 mg', 12000, 49, '2025-12-16', 'tablet', 9),
(7, 'VC8321', 'Vitamin C', 'Vitamin C merupakan suplemen yang penting untuk meningkatkan sistem kekebalan tubuh dan menjaga kesehatan kulit.', '500 mg', 20000, 989, '2025-12-23', 'botol', 2),
(8, 'SO3210', 'Suplemen Omega-3', 'Suplemen Omega-3 mengandung asam lemak yang penting untuk kesehatan jantung dan fungsi otak.', '1000 mg', 35000, 994, '2025-10-29', 'botol', 2),
(9, 'Z03821', 'Suplemen Zink', 'Suplemen zink membantu meningkatkan sistem kekebalan tubuh dan mempercepat penyembuhan luka.', '15 mg', 15000, 988, '2025-04-30', 'botol', 2),
(10, 'IP0217', 'Ibuprofen', 'Ibuprofen adalah analgesik, antipiretik, dan antiinflamasi nonsteroid (NSAID) yang digunakan untuk meredakan nyeri dan peradangan, seperti sakit gigi, sakit menstruasi, dan nyeri sendi.', '200 mg', 8000, 710, '2026-01-07', 'botol', 3),
(11, 'NP02171', 'Naproksen', 'Naproksen adalah analgesik, antipiretik, dan antiinflamasi nonsteroid (NSAID) yang digunakan untuk meredakan nyeri ringan hingga sedang, seperti nyeri sendi, nyeri otot, dan nyeri punggung.', '250 mg', 10000, 10, '2025-08-20', 'botol', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `kode_transaksi` varchar(45) NOT NULL,
  `user_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `tanggal`, `kode_transaksi`, `user_iduser`) VALUES
(1, '2024-02-13 02:42:23', 'T-20240213-1', 5),
(2, '2024-02-13 02:42:53', 'T-20240213-2', 5),
(3, '2024-02-13 02:54:52', 'T-20240213-3', 5),
(4, '2024-02-13 02:56:31', 'T-20240213-4', 5),
(5, '2024-02-13 03:08:11', 'T-20240213-5', 5),
(6, '2024-02-13 03:09:55', 'T-20240213-6', 5),
(7, '2024-02-13 03:31:35', 'T-20240213-7', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `email`, `username`, `password`, `level`) VALUES
(4, 'Diwa', 'diwa@gmail.com', 'diwa', '$2y$10$q/RVY66g0TAVE3I5zcclrOI3Ae4frcWCxDNi.wUnGsAITtTFkO.EK', 'kasir'),
(5, 'Diwe', 'lafadzdhiwa69@gmail.com', 'diwe', '$2y$10$z/SSjG2b7QPt.cszdccnLOtS5Wnr50KPjk8bV5w746KVRFbp8Jh6G', 'admin'),
(7, 'Eka', 'ekanursevas@gmail.com', 'eka', '$2y$10$iBdKQmfIZcJZS2B40PryZOsBQVC8ACbp5j7CDpxjB7JrbgpfIUteG', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`iddetail_transaksi`),
  ADD KEY `obat_idobat` (`obat_idobat`),
  ADD KEY `transaksi_idtransaksi` (`transaksi_idtransaksi`);

--
-- Indeks untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`idobat`),
  ADD KEY `obat_ibfk_1` (`idkategori`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `iddetail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `idobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`obat_idobat`) REFERENCES `obat` (`idobat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`transaksi_idtransaksi`) REFERENCES `transaksi` (`idtransaksi`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `kategori_obat` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
