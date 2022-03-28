-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2020 pada 04.48
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crowncity`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `password`, `alamat`, `no_hp`) VALUES
('anang', 'Anang Maruf ', '0000', 'Patemon', '081335886472'),
('andrmhndr', 'Budiandra Yusuf Mahendra', '11', 'Jl. Sambiroto 04 Rt.06 Rw.02 No.26', '081542992138'),
('laode', 'Laode Hamdi A', '0000', 'Asrama Kodam Jl. Kesatrian-Jatingaleh, Rt.04 Rw. 0', '08132383962');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cash`
--

CREATE TABLE `cash` (
  `id_cash` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `status_pembayaran` varchar(11) NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `tgl_pembelian` date NOT NULL,
  `harga` double NOT NULL,
  `id_admin` varchar(11) DEFAULT NULL,
  `kode_pembayaran` varchar(11) DEFAULT NULL,
  `kode_bukti_pembayaran` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cash`
--

INSERT INTO `cash` (`id_cash`, `id_transaksi`, `status_pembayaran`, `tgl_pembayaran`, `tgl_pembelian`, `harga`, `id_admin`, `kode_pembayaran`, `kode_bukti_pembayaran`) VALUES
(5, 66, 'Lunas', '2019-12-22', '2019-12-22', 8000000000, 'andrmhndr', '1231234', '12314123'),
(6, 69, 'Lunas', '2019-12-23', '2019-12-23', 8000000000, 'laode', 'surpirse', 'surprise'),
(7, 70, 'Lunas', '2019-12-23', '2019-12-23', 8000000000, 'andrmhndr', '93984729834', 'sudah'),
(8, 71, 'Lunas', '2019-12-23', '2019-12-23', 8000000000, 'andrmhndr', 'halojuga', 'halojuga'),
(9, 72, 'Lunas', '2020-01-04', '2020-01-04', 30000000, 'andrmhndr', '09090909', '1340982509w');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cicilan`
--

CREATE TABLE `cicilan` (
  `id_cicilan` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `total_cicilan` int(11) NOT NULL,
  `jumlah_cicilan` int(11) NOT NULL,
  `harga_cicilan` double NOT NULL,
  `status_pembayaran` varchar(11) NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `tahun` int(11) NOT NULL,
  `tgl_penarikan` date DEFAULT NULL,
  `id_admin` varchar(15) DEFAULT NULL,
  `kode_pembayaran` varchar(11) DEFAULT NULL,
  `kode_bukti_pembayaran` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cicilan`
--

INSERT INTO `cicilan` (`id_cicilan`, `id_transaksi`, `total_cicilan`, `jumlah_cicilan`, `harga_cicilan`, `status_pembayaran`, `tgl_pembayaran`, `tahun`, `tgl_penarikan`, `id_admin`, `kode_pembayaran`, `kode_bukti_pembayaran`) VALUES
(19, 68, 18, 1, 22222222.222222, 'Lunas', '2019-12-22', 3, '2019-12-22', 'andrmhndr', '231231', '2341231'),
(21, 68, 18, 2, 22222222.222222, 'Lunas', '2019-12-23', 3, NULL, 'andrmhndr', '324234', '2342'),
(22, 68, 18, 3, 22222222.222222, 'belum lunas', NULL, 3, NULL, 'andrmhndr', '234234', NULL),
(23, 73, 20, 1, 400000000, 'Lunas', '2020-01-06', 5, '2020-01-06', 'andrmhndr', '89723984723', ''),
(24, 73, 20, 2, 400000000, 'belum lunas', NULL, 5, NULL, 'andrmhndr', '345234', NULL),
(25, 74, 18, 1, 444444444.44444, 'belum lunas', NULL, 3, '2020-10-22', 'andrmhndr', '34523425', NULL),
(26, 75, 18, 1, 166666666.66667, 'belum lunas', NULL, 3, '2020-10-22', 'andrmhndr', '234325243', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `password`, `nama`, `alamat`, `no_hp`, `email`) VALUES
('00000', '00000', 'Suyanto Seserehe', 'Jl. Sinisini', '087987498398', '0'),
('123456789', '0000', 'Budiandra', 'sambiroto', '081234556778', 'budiamdra@gmail.com'),
('1234567890', '1234567890', 'gendoeto', 'rumah', '080809876768', 'gendot'),
('2', '1', 'q', 'q', '1', 'q'),
('337410110500000', 'ola', 'Budiandra Yusuf Mahendra', 'Jl. Sambiroto 04 Rt.06 Rw.02 No.26', '081542992138', 'gandrainsan@yahoo.co'),
('3386476585665', 'asd', 'andr', 'hgvjhbvjhgjkgh', '0826875587896', 'fhjbvuhjbgjbvjgf'),
('5302418018', 'halo', 'Taufan', 'patemon', '081665454', 'taufan@yuhu'),
('5302418035', 'halotheo', 'Laode Theo', 'semarang', '081329383962', 'laodetheo@gmail.com'),
('987654213', '0000', 'halo', 'patemon', '08123456789', 'test@gamil.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perumahan`
--

CREATE TABLE `perumahan` (
  `id_perumahan` varchar(11) NOT NULL,
  `tipe_perumahan` varchar(11) NOT NULL,
  `subtipe_perumahan` varchar(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double NOT NULL,
  `terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perumahan`
--

INSERT INTO `perumahan` (`id_perumahan`, `tipe_perumahan`, `subtipe_perumahan`, `jumlah`, `harga`, `terjual`) VALUES
('apartement', 'apartement', 'apartement', 100, 30000000, 0),
('bronze', 'middle', 'low', 100, 400000000, 0),
('diamond', 'elite', 'high', 75, 8000000000, 0),
('gold', 'elite', 'low', 125, 1000000000, 0),
('platinum', 'elite', 'medium', 100, 3000000000, 0),
('silver', 'middle', 'high', 100, 800000000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `total_sewa` int(11) NOT NULL,
  `harga_sewa` double NOT NULL,
  `status_pembayaran` varchar(11) NOT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `id_admin` varchar(15) DEFAULT NULL,
  `kode_pembayaran` varchar(11) DEFAULT NULL,
  `kode_bukti_pembayaran` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_transaksi`, `total_sewa`, `harga_sewa`, `status_pembayaran`, `tgl_pembayaran`, `id_admin`, `kode_pembayaran`, `kode_bukti_pembayaran`) VALUES
(4, 67, 1, 30000000, 'Lunas', '2019-12-22', 'andrmhndr', '213124', '12312432'),
(5, 67, 2, 30000000, 'Lunas', '2019-12-23', 'andrmhndr', '123124', '12434235364'),
(6, 67, 3, 30000000, 'Belum Lunas', NULL, 'andrmhndr', '423523435', NULL),
(7, 76, 1, 30000000, 'Lunas', '2020-10-22', 'andrmhndr', '76989879', '8h89uj9j'),
(8, 76, 2, 30000000, 'Belum Lunas', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_customer` varchar(15) NOT NULL,
  `id_admin` varchar(15) DEFAULT NULL,
  `id_perumahan` varchar(11) NOT NULL,
  `status_pembayaran` varchar(11) NOT NULL,
  `tipe_pembayaran` varchar(10) NOT NULL,
  `tgl_lunas` date DEFAULT NULL,
  `tgl_pembelian` date NOT NULL,
  `nomor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `id_admin`, `id_perumahan`, `status_pembayaran`, `tipe_pembayaran`, `tgl_lunas`, `tgl_pembelian`, `nomor`) VALUES
(66, '00000', NULL, 'diamond', 'Lunas', 'cash', '2019-12-22', '2019-12-22', 1),
(67, '00000', NULL, 'apartement', 'belum lunas', 'sewa', NULL, '2019-12-22', 50),
(68, '00000', NULL, 'bronze', 'belum lunas', 'cicilan', NULL, '2019-12-22', 12),
(69, '5302418035', NULL, 'diamond', 'Lunas', 'cash', '2019-12-23', '2019-12-23', 2),
(70, '5302418018', NULL, 'diamond', 'Lunas', 'cash', '2019-12-23', '2019-12-23', 21),
(71, '987654213', NULL, 'diamond', 'Lunas', 'cash', '2019-12-23', '2019-12-23', 50),
(72, '1234567890', NULL, 'apartement', 'Lunas', 'cash', '2020-01-04', '2020-01-04', 23),
(73, '1234567890', NULL, 'diamond', 'belum lunas', 'cicilan', NULL, '2020-01-06', 24),
(74, '3386476585665', NULL, 'diamond', 'belum lunas', 'cicilan', NULL, '2020-10-22', 66),
(75, '00000', NULL, 'platinum', 'belum lunas', 'cicilan', NULL, '2020-10-22', 50),
(76, '2', NULL, 'apartement', 'belum lunas', 'sewa', NULL, '2020-10-22', 78);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id_cash`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `cicilan`
--
ALTER TABLE `cicilan`
  ADD PRIMARY KEY (`id_cicilan`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `perumahan`
--
ALTER TABLE `perumahan`
  ADD PRIMARY KEY (`id_perumahan`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_perumahan` (`id_perumahan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cash`
--
ALTER TABLE `cash`
  MODIFY `id_cash` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `cicilan`
--
ALTER TABLE `cicilan`
  MODIFY `id_cicilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cash`
--
ALTER TABLE `cash`
  ADD CONSTRAINT `cash_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cicilan`
--
ALTER TABLE `cicilan`
  ADD CONSTRAINT `cicilan_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_perumahan`) REFERENCES `perumahan` (`id_perumahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
