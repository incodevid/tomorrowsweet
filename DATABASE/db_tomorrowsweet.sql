-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Agu 2021 pada 03.30
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `id_kategori`, `harga_barang`, `status_barang`, `deskripsi`, `berat`, `foto_barang`) VALUES
(1, 'Blender Capsule Cutter Quatre', 1, '165000', 'Ready', 'Blender capsule\r\n\r\nBlender capsule  bisa menjadi solusi tepat bagi kamu untuk mempersiapkan masakan dalam waktu yang lebih singkat. Pemakaiannya sangat mudah dan tidak rumit untuk dirawat.\r\n\r\nBlender kekinian yang membuat prosses pengolahan makanan menjadi lebih menyenangkan bun & mom, selain itu juga bisa di pergunakan untuk :\r\nProsses makanan bayi\r\nMembuat Juice\r\nMenggiling daging\r\nMenggiling kacang\r\nMembuat bumbu\r\nKarena menggunakan 4 mata pisau yang tajam dan lebat, sehingga prosses nya lebih cepat di bandingkan blender pada umurnya, selain itu hemat pemakaian listrik lho bun, cuma 120 Watt.\r\n\r\nBlender Bentuk Kapsul Dengan Desain yang unik bisa digunakan untuk memblender Sayuran, Buah buahan, Buah beku, Daging, Kacang, Es batu dll.\r\n\r\nDesain bentuk blender yang unik seperti kapsul dengan warna cantik, sangat membantu kegiatan ibu rumah tangga.\r\nBisa digunakan untuk memblender :\r\n-Sayuran\r\n-Buah buahan\r\n-Buah beku\r\n-Daging\r\n-Kacang\r\n\r\nKelebihan Capsule Cutter Quatre\r\n-4 pisau tajam\r\n-Mudah digunakan\r\n-Mudah dibersihkan\r\n-Bahan Acrylic\r\n-Daya 260 watt (DA*)\r\n-Ukuran : Panjang 23,3 cm x Lebar : 11 cm\r\n-Material : Plastik Food Grade\r\n-Watt : 120 Watt', '1000', 'Blender Capsule Cutter Quatre-UPDATE-220718.jpg'),
(2, 'Blender Shake N Take', 1, '145000', 'Ready', 'Shake and Take 3 New Edition with Extra Cup tampil dengan pilihan warna menarik yang bisa dibawa kemanapun olahraga, bekal minuman, sekolah. mata pisau dapat dilepas dan diganti dengan tutup botol.\r\n\r\nAnda akan mendapatkan Extra Cup, sehingga dapat digunakan bersama dengan pasangan Anda. Setelah Anda Blend Smoothies Buah / Sayuran, Cup tinggal dilepas dan bisa langsung dibawa. Ukuran diameter Cup juga sama dengan Ukuran Gelas pada umunya, bisa ditempatkan di tempat Cup mobil.', '1000', 'Blender Shake N Take.jpg'),
(3, 'Pisau Dapur + Talenan', 1, '35000', 'Ready', 'Satu set pisau dapur dan talenan dengan beragam warna', '500', 'Pisau Dapur + Talenan.jpg'),
(4, 'Baskom Piring Portable', 1, '80000', 'Ready', 'Baskom piring portable terbuat dari bahan karet dan plastik, memudahkan baskom untuk disimpan.', '1000', 'Baskom Piring Portable.jpg'),
(5, 'My Bottle Bulat Pouch', 1, '20000', 'Ready', 'My Bottle bening. Body sewarna tutup. Sudah termasuk pouch busa yang sewarna.\r\n\r\nKualitas import. Botol Eco Friendly, mudah dibawa kemana2. Cocok untuk olahraga,\r\ncamping, ataupun bersantai. Bisa untuk minuman dingin, jus, atau untuk menyimpan\r\nbuah segar.', '500', 'My Bottle Bulat Pouch.jpg'),
(6, 'Spatula Set 6 pcs', 1, '30000', 'Ready', 'Spatula dengan 6 set macam bentuk dan kegunaannya.', '500', 'Spatula Set 6 pcs.jpg'),
(7, 'Blender Portable Bingo', 1, '150000', 'Ready', 'TGB Bingo Portable Juicer Cup / Gelas dan Botol Blender Portable\r\n\r\nPortable Blender Juice Cup Mini Electric 500ML Rechargeable Blender jus buah elektrik yang dapat Anda bawa kemanapun, berbentuk seperti botol minum biasa dan ringan, Anda dapat membuat jus dimanapun Anda berada.', '1000', 'Blender Portable Bingo.jpg'),
(8, 'Blender Juice CUP Portable Elektrik', 1, '100000', 'Ready', 'Portable Blender Juice Cup Mini Electric 380ML Rechargeable Blender jus buah elektrik yang dapat Anda bawa kemanapun, berbentuk seperti botol minum biasa dan ringan, Anda dapat membuat jus dimanapun Anda berada.', '1000', 'Blender Juice CUP Portable Elektrik.jpg'),
(9, 'Rak Gawang Besi (Gantungan Baju)', 1, '195000', 'Ready', 'Dapat digunakan dimana saja di rumah anda, walaupun di area lembap seperti kamar mandi dan dibawah balkon beratap.\r\n\r\nKaki dari plastik melindungi permukaan dari goresan.\r\n\r\nModel standing, bisa untuk gantungan pakaian, tas, jas, topi, dasi dan aksesoris atau apa aja yang bisa digantung.\r\n\r\nModel standing lebih modern dan irit tempat, bisa dipakai di rumah atau di kantor.', '1000', 'Rak Gawang Besi (Gantungan Baju).jpg'),
(10, 'Rak Galon Air', 1, '30000', 'Ready', 'Rak galon air bisa di rakit dimanapun dan disertai kran galon, rak berbahan besi didesain agar kuat menahan beban galon.', '500', 'Rak Galon Air.jpg'),
(11, 'Karpet Bulu Surfet Pillow 160 x 100', 1, '165000', 'Ready', 'keunggulan karpet bulu merk 109 PILLOW:\r\nYang pasti karpet ini memiliki kelebihan pada bahannya yah kak, bulu rasfur yang lembut, empuk, halus dan juga tebal akan membuat anda nyaman dan ruangan anda akan terlihat indah, dengan isi karet silicon lembaran atau rubber silicone sheet, dengan keunggulan Stabilitas pada suhu rendah dan tinggi, Daya elongasi tinggi dan ketahanan sobek.', '1000', 'Karpet Bulu Surfet Pillow 160 x 100.jpg'),
(12, 'Panggangan BBQ Round Grill', 1, '190000', 'PO', 'Yakiniku Round Barberque Grill Pan\r\n- terbuat dari baja\r\n- diameter 32-34 cm\r\n- lapisan teflon antilengket\r\n- di desain khusus agar minyak mengalir, sehingga makanan lebih sehat\r\n- terdapat lubang untuk minyak\r\n- terdapat kaki penompang\r\n- cocok untuk memanggang, barberque, dll\r\n- mudah dibersihkan\r\n- mudah disimpan\r\n- bisa untuk kompor portable\r\n- cocok untuk restoran bbq', '1500', 'Panggangan BBQ Round Grill.jpg'),
(13, 'Pompa Galon Elektrik SX', 1, '55000', 'Ready', 'Dengan alat ini anda tidak perlu lagi repot repot angkat galon atau menuang air galon ke tempat air anda praktis untuk di bawa kemana sja, atau pun di perjalanan Jauh. anda tidak perlu lagi memutar mutar keran atau tidak perlu repot lagi jika ingin minum , hanya dengan 1 jari anda sudah dapat membuat air ini keluar dari dispenser . tidak perlu repot2 menekan dan memuter.', '500', 'Pompa Galon Elektrik SX.jpg'),
(14, 'Kipas Angin Mini Kuping', 1, '35000', 'Ready', '<p>Kipas Angin Mini karakter kuping ini rechargeable dan mudah di bawa kemana pun dengan bentuk yang kecil/mini.</p>\r\n\r\n<p>Angin yang dihasilkan juga lumayan kencang untuk kipas angin berukuran mini/kecil ini.</p>\r\n\r\n<p>BARANG TERMASUK :</p>\r\n\r\n<ul>\r\n	<li>BATTERY</li>\r\n	<li>USB FOR CHARGE</li>\r\n</ul>\r\n', '500', 'Kipas Angin Mini Kuping.jpg'),
(15, 'Kipas Angin Mini', 1, '35000', 'Ready', '<p>Kipas Angin Mini ini rechargeable dan mudah di bawa kemana pun dengan bentuk yang kecil/mini.</p>\r\n\r\n<p>Angin yang dihasilkan juga lumayan kencang untuk kipas angin berukuran mini/kecil ini.</p>\r\n\r\n<p>BARANG TERMASUK :</p>\r\n\r\n<ul>\r\n	<li>BATTERY</li>\r\n	<li>USB FOR CHARGE</li>\r\n</ul>\r\n', '500', 'Kipas Angin Mini.jpg'),
(16, 'Kipas Angin Mini Besi', 1, '40000', 'Ready', '<p>Kipas Angin Mini ini sudah body besi dan mudah di bawa kemana pun dengan bentuk yang kecil/mini.</p>\r\n\r\n<p>Angin yang dihasilkan juga lumayan kencang untuk kipas angin berukuran mini/kecil ini.</p>\r\n\r\n<p>Kipas angin ini hanya support/mendukung dengan adaptor charge hp/handphone dengan slot USB karna kipas ini di desain untuk portable terhadap perangkat keras seperti Power Bank, Laptop, dan Komputer</p>\r\n', '500', 'Kipas Angin Mini Besi.jpg'),
(17, 'Kipas Angin Mini Handy Motif Kartun', 1, '40000', 'Ready', '<p>Kipas Angin Mini Motif Kartun ini rechargeable dan mudah di bawa kemana pun dengan bentuk yang kecil/mini.</p>\r\n\r\n<p>Angin yang dihasilkan juga lumayan kencang untuk kipas angin berukuran mini/kecil ini.</p>\r\n\r\n<p>BARANG TERMASUK :</p>\r\n\r\n<ul>\r\n	<li>BATTERY</li>\r\n	<li>USB FOR CHARGE</li>\r\n</ul>\r\n', '500', 'Kipas Angin Mini Handy Motif Kartun.jpg'),
(18, 'Botol Hello Master', 1, '27000', 'Ready', '<p>Botol minum Hello Master ini cocok untuk anda yang ingin Bepergian Wisata, Ngantor, dan Bersepeda dengan membawa minuman buatan sendiri.</p>\r\n\r\n<p>Motifnya yang modern dan keren hari anda akan merasa sangat lengkap dengan Hello Master.</p>\r\n\r\n<p>BAHAN BOTOL</p>\r\n\r\n<ul>\r\n	<li>BERBAHAN KACA</li>\r\n</ul>\r\n', '500', 'Botol Hello Master.jpg'),
(19, 'Termos Stainless Life', 1, '45000', 'Ready', '<p>Termos Stainless LIFE Tahan Panas dan Dingin</p>\r\n\r\n<p>Kapasitas : 500ml</p>\r\n\r\n<p>Kemasan : Box/Pcs</p>\r\n\r\n<p>Bahan : Stainless 304</p>\r\n', '500', 'Termos Stainless Life.jpg'),
(20, 'Perlengkapan Jahit Sewing', 1, '25000', 'Ready', '<p>warna yang dipilih adalah warna tempat/kotak nya</p>\r\n\r\n<p>Set alat jahit dengan kemasan kotak, cocok untuk perlengkapan jahit saat tambal atau jahit pakaian sobek.&nbsp;</p>\r\n\r\n<p>Dengan kemasan berbentuk kotak plastik, mudah disimpan dan mudah dicari saat dibutuhkan.</p>\r\n\r\n<p>Satu set terdiri dari :<br />\r\n- 10 warna benang (12roll)<br />\r\n- 1 pc alat bantu untuk memasukkan benang ke jarum<br />\r\n- 1 pc gunting<br />\r\n- 2 pcs kancing<br />\r\n- 1 set peniti<br />\r\n- 1 kotak jarum<br />\r\n- 1 pc cincin pelindung jari tangan<br />\r\n- 1 pc meteran</p>\r\n\r\n<p>Size kotak : 14.5 x 7 x 9.5 cm</p>\r\n', '500', 'Perlengkapan Jahit Sewing.jpg'),
(21, 'Meja Lipat Model Koper', 1, '340000', 'PO', '<p>Spesifikasi Produk:<br />\r\n1. Material rangka alumunium alloy &amp; permukaan meja papan HPL<br />\r\n2. Ukuran Terbuka panjang 120cm &amp; lebar 60cm&nbsp;<br />\r\n3. Ukuran dilipat mejadi koper panjang 60cm, lebar 60cm &amp; tebal 10cm<br />\r\n4. Kaki meja bisa diatur 3 ketinggian yaitu 50cm , 60cm &amp; 70cm<br />\r\n5. Kemampuan menahan beban maksimal 70 s/d 80 Kg<br />\r\n6. Kaki meja berbentuk hollo persegi kotak.<br />\r\n7. Istimewanya produk ini adalah ringkas, model menarik, kuat, tahan karat dan fungsi serbaguna</p>\r\n\r\n<p>Mudah Dibawa Kemana-mana dan ringkas adalah kesan yang sangat menonjol dari produk ini. Sangat cocok digunakan untuk camping, piknik, pameran, bazaar, berjualan &amp; bisa digunakan untuk menaruh barang dirumah, kantor, toko dll. Sehingga sangat multifungsi.</p>\r\n', '1000', 'Meja Lipat Model Koper.jpg'),
(22, 'Baskom Talenan Lipat', 1, '45000', 'PO', '<p>Tentang Produk :&nbsp;</p>\r\n\r\n<p>Material : PP plastik&nbsp;</p>\r\n\r\n<p>Ukuran : -/+40cm x 30cm&nbsp;</p>\r\n\r\n<p>Berat : -/+600gram&nbsp;</p>\r\n\r\n<p>Dapat dijadikan baskom Dapat dijadikan talenan Dapat di jadikan apa aja sesuka hati</p>\r\n', '500', 'Baskom Talenan Lipat.jpg'),
(23, 'Panci Goreng Multi Fryer Merk Tri J', 1, '120000', 'PO', '<p>Panci penggorengan dilengkapi dengan saringan penggoreng.</p>\r\n', '1000', 'Panci Goreng Multi Fryer Merk Tri J.jpg'),
(24, 'Rak Jemuran Pakaian Bayi Bundar', 1, '175000', 'PO', '<p>Rak jemuran pakaian bayi bentuk bundar</p>\r\n', '1000', 'Rak Jemuran Pakaian Bayi Bundar.jpg'),
(25, 'Toples Multiguna Calista Jasmine', 1, '50000', 'PO', '<p>Toples Multiguna</p>\r\n', '1000', 'Toples Multiguna Calista Jasmine.jpg'),
(26, 'Teko Teapot', 1, '50000', 'PO', '<p>Teko teapot + 4 gelas kaca sarangan</p>\r\n', '1000', 'Teko Teapot.jpg'),
(27, 'Talenan Baskom Multifungsi 9in1', 1, '110000', 'PO', '<p>Talenan Baskom multifungsi 9in1</p>\r\n', '1000', 'Talenan Baskom Multifungsi 9in1.jpg'),
(28, 'Rak Piring 3 Susun', 1, '125000', 'PO', '<p>Rak piring 3 susun bahan alumunium</p>\r\n', '2000', 'Rak Piring 3 Susun.jpg'),
(29, 'Rak Susun Kamar Mandi', 1, '165000', 'PO', '<p>Rak susun yang bisa diletakkan di kamar mandi, rak susun closet</p>\r\n', '3000', 'Rak Susun Kamar Mandi.jpg'),
(30, 'Keranjang Baju', 1, '55000', 'PO', '<p>Keranjang baju kotor portable</p>\r\n', '1000', 'Keranjang Baju.jpg'),
(31, 'Wadah Prasmanan', 1, '55000', 'Ready', '<p>Wadah prasmanan fast food, bahan stainless steel</p>\r\n', '1000', 'Wadah Prasmanan.jpg'),
(32, 'Gelas Mug Self Stiring', 1, '55000', 'PO', '<p>Gelas mug self stiring kekinian</p>\r\n', '1000', 'Gelas Mug Self Stiring.jpg'),
(33, 'Dispenser Sabun Cuci Piring', 1, '40000', 'PO', '<p>Dispenser sabun cuci piring + spon</p>\r\n', '500', 'Dispenser Sabun Cuci Piring.jpg'),
(34, 'Kompor Portable Mini Merk NIKITA', 1, '225000', 'PO', '<p>Kompor Portable Mini Merk NIKITA</p>\r\n', '2000', 'Kompor Portable Mini Merk NIKITA.jpg'),
(35, 'Rantang Makanan Kaca 3 Susun', 1, '65000', 'PO', '<p>Rantang Makanan Kaca 3 Susun</p>\r\n', '2000', 'Rantang Makanan Kaca 3 Susun.jpg'),
(36, 'Wajan Wookpan Set 2in1 Maxim', 1, '255000', 'PO', '<p>Wajan Wookpan Set 2in1 Maxim</p>\r\n', '3000', 'Wajan Wookpan Set 2in1 Maxim.jpg'),
(37, 'Panci Elektrik Serbaguna', 1, '100000', 'PO', '<p>Panci Elektrik Serbaguna bisa digunakan untuk menggoreng, rebus, kukus.</p>\r\n', '2000', 'Panci Elektrik Serbaguna.jpg'),
(38, 'Rak Bumbu Dapur ', 1, '50000', 'PO', '<p>Rak bumbu dapur elegant</p>\r\n', '2000', 'Rak Bumbu Dapur .jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_barang`
--

INSERT INTO `tb_detail_barang` (`id_detail_barang`, `id_barang`, `warna_barang`, `ukuran`, `stok_barang`, `gambar_detail`) VALUES
(1, 1, 'Pink', NULL, '2', NULL),
(2, 2, 'Biru, Kuning', NULL, '2', NULL),
(3, 3, 'Pink,Ungu,Hijau', NULL, '6', NULL),
(4, 4, 'Putih', NULL, '2', NULL),
(5, 5, 'Hitam,Biru,Hijau', NULL, '4', NULL),
(6, 6, 'Orange', NULL, '3', NULL),
(7, 0, 'Hijau Toska', NULL, '1', NULL),
(8, 7, 'Hijau Toska', NULL, '1', NULL),
(9, 8, 'Pink,Biru', NULL, '2', NULL),
(10, 9, 'Putih,Hitam', NULL, '2', NULL),
(11, 10, 'Hitam', NULL, '3', NULL),
(12, 11, 'Abu-abu, Coklat Tua', NULL, '2', NULL),
(13, 12, 'Hitam', NULL, '3', NULL),
(14, 13, 'Putih', NULL, '2', NULL),
(15, 14, 'Hijau,Putih,Hitam', NULL, '3', NULL),
(16, 15, 'Hijau,Putih', NULL, '2', NULL),
(17, 16, 'Hijau', NULL, '2', NULL),
(18, 17, 'Pink,Biru', NULL, '2', NULL),
(19, 18, 'Putih,Biru,Pink', NULL, '3', NULL),
(20, 19, 'Putih,Biru', NULL, '2', NULL),
(21, 20, 'Pink,Ungu', NULL, '2', NULL),
(22, 21, 'Hitam,Coklat', NULL, '2', NULL),
(23, 22, 'Hijau,Silver', NULL, '2', NULL),
(24, 31, 'Silver', 'Besar', '2', 'gambar-detail_24-UPDATE-162704.jpg'),
(25, 29, 'Putih', NULL, '10', NULL),
(26, 25, 'Biru', NULL, '10', NULL),
(27, 23, 'Silver', NULL, '10', NULL),
(28, 33, 'Abu-abu', NULL, '10', NULL),
(29, 32, 'Hitam', NULL, '10', NULL),
(30, 26, 'Hitam', NULL, '18', NULL),
(31, 27, 'Peach', NULL, '10', NULL),
(32, 28, 'Merah-putih', NULL, '10', NULL),
(33, 24, 'Putih', NULL, '10', NULL),
(34, 30, 'Motif Bangau', 'L', '0', 'gambar-detail_34-UPDATE-140011.jpg'),
(35, 30, 'Motif Bangau', 'M', '1', 'gambar-detail_35-UPDATE-135842.jpg'),
(37, 30, 'Motif Beruang', 'S', '1', 'gambar-detail_143012.jpg'),
(38, 31, 'Black', 'Kecil', '0', 'gambar-detail_162613.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_foto_barang`
--

CREATE TABLE IF NOT EXISTS `tb_foto_barang` (
`id_foto_barang` int(50) NOT NULL,
  `id_barang` int(50) DEFAULT NULL,
  `foto_barang_kedua` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_foto_barang`
--

INSERT INTO `tb_foto_barang` (`id_foto_barang`, `id_barang`, `foto_barang_kedua`) VALUES
(1, 1, 'Foto Barang-Lainnya_1_163947.jpg'),
(2, 1, 'Foto Barang-Lainnya_1_164004.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
`id_kategori` int(50) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `contoh_kat` varchar(100) DEFAULT NULL,
  `foto_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `contoh_kat`, `foto_kategori`) VALUES
(1, 'Perabotan', 'Blender, Panci, Kompor', 'Perabotan-UPDATE-155923.jpg'),
(2, 'Pakaian', 'Gamis, Hijab, Jeans', 'Pakaian-UPDATE-155903.jpg'),
(3, 'Peralatan', 'Gergaji, Obeng, Tang', 'Peralatan.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_orderan`
--

INSERT INTO `tb_orderan` (`id_orderan`, `kode_orderan`, `jml_beli`, `id_akun`, `nama_barang`, `nama_kategori`, `harga_barang`, `subtotal_beli`, `stok_beli`, `warna_beli`, `ukuran_beli`, `bank_bayar`, `jenis_kirim`, `ekspedisi`, `paket_kurir`, `tarif_paket`, `berat_barang`, `foto_bukti`, `no_resi`, `status_beli`, `tgl_pesanan`) VALUES
(8, 'INV-20210808-001', 1, 9, 'Panggangan BBQ Round Grill', 'Perabotan', '190000', '190000', '1', 'Hitam', NULL, 'BCA', 'EKSPEDISI', 'tiki', 'REG', '90000', '1500', NULL, NULL, 'Menunggu Pembayaran', '2021-08-08 18:12:49'),
(9, 'INV-20210808-002', 1, 1, 'My Bottle Bulat Pouch', 'Perabotan', '20000', '20000', '1', 'Hijau', NULL, 'BRI', 'EKSPEDISI', 'tiki', 'REG', '30000', '500', 'INV-20210808-002193121.jpg', NULL, 'Selesai', '2021-08-08 19:27:46'),
(10, 'INV-20210808-002', 2, 1, 'Wadah Prasmanan', 'Perabotan', '55000', '55000', '1', 'Silver', NULL, 'BRI', 'EKSPEDISI', 'tiki', 'REG', '30000', '1000', 'INV-20210808-002193121.jpg', NULL, 'Selesai', '2021-08-08 19:27:46'),
(11, 'INV-20210811-003', 1, 1, 'Wadah Prasmanan', 'Perabotan', '55000', '110000', '2', 'Silver', 'Besar', 'BCA', 'EKSPEDISI', 'jne', 'CTCYES', '44000', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 10:44:41'),
(12, 'INV-20210811-003', 2, 1, 'Wadah Prasmanan', 'Perabotan', '55000', '55000', '1', 'Black', 'Kecil', 'BCA', 'EKSPEDISI', 'jne', 'CTCYES', '44000', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 10:44:41'),
(13, 'INV-20210811-003', 3, 1, 'Keranjang Baju', 'Perabotan', '55000', '275000', '5', 'Motif Bangau', 'M', 'BCA', 'EKSPEDISI', 'jne', 'CTCYES', '44000', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 10:44:41'),
(14, 'INV-20210811-003', 4, 1, 'Keranjang Baju', 'Perabotan', '55000', '55000', '1', 'Motif Beruang', 'S', 'BCA', 'EKSPEDISI', 'jne', 'CTCYES', '44000', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 10:44:41'),
(15, 'INVTK-20210811-004', 1, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '165000', '3', 'Silver', 'Besar', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 14:15:47'),
(16, 'INVTK-20210811-004', 2, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '55000', '1', 'Black', 'Kecil', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 14:15:47'),
(17, 'INVTK-20210811-004', 3, 9, 'Keranjang Baju', 'Perabotan', '55000', '110000', '2', 'Motif Bangau', 'M', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 14:15:47'),
(18, 'INVTK-20210811-004', 4, 9, 'Keranjang Baju', 'Perabotan', '55000', '110000', '2', 'Motif Beruang', 'S', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 14:15:47'),
(19, 'INVTK-20210811-005', 1, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '55000', '1', 'Silver', 'Besar', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 16:15:23'),
(20, 'INVTK-20210811-006', 1, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '55000', '1', 'Silver', 'Besar', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 16:24:55'),
(21, 'INVTK-20210811-007', 1, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '165000', '3', 'Black', 'Kecil', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 17:21:23'),
(22, 'INVTK-20210811-007', 2, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '220000', '4', 'Silver', 'Besar', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 17:21:23'),
(23, 'INVTK-20210811-007', 3, 9, 'Keranjang Baju', 'Perabotan', '55000', '55000', '1', 'Motif Beruang', 'S', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 17:21:23'),
(24, 'INVTK-20210811-008', 1, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '55000', '1', 'Silver', 'Besar', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 20:13:47'),
(25, 'INVTK-20210811-009', 1, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '55000', '1', 'Silver', 'Besar', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 20:19:08'),
(26, 'INVTK-20210811-010', 1, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '165000', '3', 'Silver', 'Besar', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 20:21:09'),
(27, 'INVTK-20210811-010', 2, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '165000', '3', 'Black', 'Kecil', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 20:21:09'),
(28, 'INVTK-20210811-010', 3, 9, 'Keranjang Baju', 'Perabotan', '55000', '55000', '1', 'Motif Beruang', 'S', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 20:21:09'),
(29, 'INVTK-20210811-011', 1, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '110000', '2', 'Silver', 'Besar', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 20:28:35'),
(30, 'INVTK-20210811-011', 2, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '55000', '1', 'Black', 'Kecil', 'BCA', 'AMBIL DI TOKO', '-', '-', '-', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 20:28:35'),
(31, 'INV-20210811-002', 1, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '110000', '2', 'Silver', 'Besar', 'BCA', 'EKSPEDISI', 'tiki', 'REG', '80000', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 20:43:28'),
(32, 'INV-20210811-002', 2, 9, 'Wadah Prasmanan', 'Perabotan', '55000', '55000', '1', 'Black', 'Kecil', 'BCA', 'EKSPEDISI', 'tiki', 'REG', '80000', '1000', NULL, NULL, 'Menunggu Pembayaran', '2021-08-11 20:43:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_video_barang`
--

CREATE TABLE IF NOT EXISTS `tb_video_barang` (
`id_video` int(50) NOT NULL,
  `id_barang` int(50) DEFAULT NULL,
  `video_barang` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_video_barang`
--

INSERT INTO `tb_video_barang` (`id_video`, `id_barang`, `video_barang`) VALUES
(1, 1, 'Video Barang_1_171607.mp4'),
(2, 1, 'Video Barang_1_171624.mp4');

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
MODIFY `id_barang` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tb_detail_barang`
--
ALTER TABLE `tb_detail_barang`
MODIFY `id_detail_barang` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tb_foto_barang`
--
ALTER TABLE `tb_foto_barang`
MODIFY `id_foto_barang` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
MODIFY `id_kategori` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
MODIFY `id_keranjang` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
MODIFY `id_komentar` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_orderan`
--
ALTER TABLE `tb_orderan`
MODIFY `id_orderan` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tb_video_barang`
--
ALTER TABLE `tb_video_barang`
MODIFY `id_video` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
