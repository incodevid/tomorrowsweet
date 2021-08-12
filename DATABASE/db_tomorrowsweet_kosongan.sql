-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Agu 2021 pada 10.44
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tomorrowsweet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE IF NOT EXISTS `tb_akun` (
`id_akun` int(50) NOT NULL,
  `nama_akun` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `nomor_hp` varchar(100) DEFAULT NULL,
  `foto` text,
  `alamat` text,
  `provinsi` varchar(50) DEFAULT NULL,
  `nm_prov` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `nm_kab` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status_akun` enum('Admin','Member','Super') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama_akun`, `jenis_kelamin`, `email`, `nomor_hp`, `foto`, `alamat`, `provinsi`, `nm_prov`, `kabupaten`, `nm_kab`, `kecamatan`, `kelurahan`, `kode_pos`, `username`, `password`, `status_akun`) VALUES
(1, 'Benny Sarmoko', 'Laki - Laki', 'benny54121@gmail.com', '085787744645', 'Benny Sarmoko-UPDATE-215010.jpg', 'Jl.Tingang XV', '14', 'Kalimantan Tengah', '326', 'Palangka Raya', 'Jekan Raya', 'Palangka', '73112', 'alfazza', 'toor123', 'Super'),
(2, 'Triastuti Prabasari', 'Perempuan', '-', '-', 'Triastuti Prabasari-UPDATE-005825.jpg', 'Jl. Tingang XV Palangka Raya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alfazza1', '29januari', 'Super'),
(3, 'Prabasari', 'Perempuan', 'abc@gmail.com', '085292965231', 'Prabasari.jpg', 'Kakap', '14', 'Kalimantan Tengah', '326', 'Palangka Raya', 'Jekan Raya', 'Palangka', '73112', 'sari123', '12345678', 'Member'),
(4, 'Yuli Astuti', 'Perempuan', 'dimas@gmail.com', '088888888888', 'Yuli Astuti.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'didim', 'dimas1', 'Admin'),
(5, 'Sih Winarti', 'Perempuan', 'amoy@gmail.com', '088888888888', 'Sih Winarti.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'amoy', 'amoy12', 'Admin'),
(6, 'Resty Delviana Y', 'Perempuan', 'resty@gmail.com', '085387084712', 'Resty Delviana Y-UPDATE-190122.jpg', 'Jalan Lawu No. 16 C', '14', 'Kalimantan Tengah', '326', 'Palangka Raya', 'Jekan Raya', 'Palangka', '73112', 'resty', 'resty1', 'Admin'),
(7, 'Array', 'Laki - Laki', 'Azman', '085752282522', 'Array.jpg', 'Hanau', '14', 'Kalimantan Tengah', '405', 'Seruyan', 'Hanau', 'Pembuang Hulu', '74271', 'arraycpp', 'gjmptwgjm', 'Member'),
(8, 'Demo', 'Laki - Laki', 'demo@gmail.com', '085787744645', 'Demo.jpg', 'demo', '14', 'Kalimantan Tengah', '326', 'Palangka Raya', 'Jekan Raya', 'Palangka', '73112', 'demo123', '123456', 'Member'),
(9, 'Sufridianson', 'Laki - Laki', 'sufridianson@gmail.com', '081256928646', 'Sufridianson.jpg', 'Jl darung bawan km 10', '14', 'Kalimantan Tengah', '371', 'Pulang Pisau', 'Kahayan hilir', 'Anjir pulang pisau', '74813', 'Sufriman', '160694', 'Member'),
(10, 'Febri Saputra', 'Laki - Laki', 'febrisaputra041996@gmail.com', '081229235921', 'Febri Saputra.jpg', 'Ds. Sumber Mulya', '14', 'Kalimantan Tengah', '221', 'Lamandau', 'Bulik', 'Sumber Mulya', '74662', 'Febri_Saputra', '123456789', 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
`id_barang` int(50) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `id_kategori` int(50) DEFAULT NULL,
  `harga_barang` varchar(100) DEFAULT NULL,
  `status_barang` enum('Ready','Kosong','PO') DEFAULT NULL,
  `deskripsi` text,
  `berat` varchar(100) DEFAULT NULL,
  `foto_barang` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_barang`
--

CREATE TABLE IF NOT EXISTS `tb_detail_barang` (
`id_detail_barang` int(50) NOT NULL,
  `id_barang` int(50) DEFAULT NULL,
  `warna_barang` varchar(100) DEFAULT NULL,
  `ukuran` varchar(100) DEFAULT NULL,
  `stok_barang` varchar(100) DEFAULT NULL,
  `gambar_detail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_foto_barang`
--

CREATE TABLE IF NOT EXISTS `tb_foto_barang` (
`id_foto_barang` int(50) NOT NULL,
  `id_barang` int(50) DEFAULT NULL,
  `foto_barang_kedua` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
`id_kategori` int(50) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `contoh_kat` varchar(100) DEFAULT NULL,
  `foto_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE IF NOT EXISTS `tb_keranjang` (
`id_keranjang` int(50) NOT NULL,
  `id_detail_barang` int(50) DEFAULT NULL,
  `jumlah_stok` int(50) DEFAULT NULL,
  `warna_beli` varchar(100) DEFAULT NULL,
  `ukuran_beli` varchar(50) DEFAULT NULL,
  `id_akun` int(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE IF NOT EXISTS `tb_komentar` (
`id_komentar` int(50) NOT NULL,
  `id_barang` int(50) DEFAULT NULL,
  `text_komentar` text,
  `status_komen` enum('Menunggu','Terlihat','Tersembunyi') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_orderan`
--

CREATE TABLE IF NOT EXISTS `tb_orderan` (
`id_orderan` int(50) NOT NULL,
  `kode_orderan` varchar(255) DEFAULT NULL,
  `jml_beli` int(50) DEFAULT NULL,
  `id_akun` int(50) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `harga_barang` varchar(100) DEFAULT NULL,
  `subtotal_beli` varchar(100) DEFAULT NULL,
  `stok_beli` varchar(100) DEFAULT NULL,
  `warna_beli` varchar(100) DEFAULT NULL,
  `ukuran_beli` varchar(100) DEFAULT NULL,
  `bank_bayar` varchar(50) DEFAULT NULL,
  `jenis_kirim` varchar(50) DEFAULT NULL,
  `ekspedisi` varchar(100) DEFAULT NULL,
  `paket_kurir` varchar(100) DEFAULT NULL,
  `tarif_paket` varchar(100) DEFAULT NULL,
  `berat_barang` varchar(100) DEFAULT NULL,
  `foto_bukti` varchar(100) DEFAULT NULL,
  `no_resi` varchar(225) DEFAULT NULL,
  `status_beli` enum('Menunggu Pembayaran','Pesanan On Proses','Pesanan Dikirim','Selesai') DEFAULT NULL,
  `tgl_pesanan` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_video_barang`
--

CREATE TABLE IF NOT EXISTS `tb_video_barang` (
`id_video` int(50) NOT NULL,
  `id_barang` int(50) DEFAULT NULL,
  `video_barang` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
 ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_detail_barang`
--
ALTER TABLE `tb_detail_barang`
 ADD PRIMARY KEY (`id_detail_barang`);

--
-- Indexes for table `tb_foto_barang`
--
ALTER TABLE `tb_foto_barang`
 ADD PRIMARY KEY (`id_foto_barang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
 ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
 ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_orderan`
--
ALTER TABLE `tb_orderan`
 ADD PRIMARY KEY (`id_orderan`);

--
-- Indexes for table `tb_video_barang`
--
ALTER TABLE `tb_video_barang`
 ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
MODIFY `id_akun` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
MODIFY `id_barang` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_detail_barang`
--
ALTER TABLE `tb_detail_barang`
MODIFY `id_detail_barang` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_foto_barang`
--
ALTER TABLE `tb_foto_barang`
MODIFY `id_foto_barang` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
MODIFY `id_kategori` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
MODIFY `id_keranjang` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
MODIFY `id_komentar` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_orderan`
--
ALTER TABLE `tb_orderan`
MODIFY `id_orderan` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_video_barang`
--
ALTER TABLE `tb_video_barang`
MODIFY `id_video` int(50) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
