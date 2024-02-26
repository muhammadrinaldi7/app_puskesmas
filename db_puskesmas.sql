-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2023 pada 15.26
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_puskesmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `no_antrian` varchar(20) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_diagnosa` int(11) NOT NULL,
  `kode_diagnosa` varchar(10) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `ciri_ciri_penyakit` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `ciri_ciri_umum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `kode_diagnosa`, `nama_penyakit`, `ciri_ciri_penyakit`, `keterangan`, `ciri_ciri_umum`) VALUES
(1, '001', 'Diabetes', 'Rasa haus dan lapar meningkat, kulit dan mulut mengering', 'Penyakit pada darah', 'Sakit kepala, badan letih dan lesu'),
(2, '002', 'Gigi Berlubang', 'Sakit gigi dan bau mulut', 'Penyakit Bagian Mulut', 'Sakit gigi'),
(4, '003', 'Kurap', 'Kulit gatal bersisik, pecah - pecah dan bercak kemerahan pada kulit', 'Penyakit bagian kulit', 'Gatal - Gatal'),
(5, '004', 'Demam', 'Nyeri kepala, keringat dingin dan menggigil', 'Penyakit bagian kepala', 'Lemas dan hilang rasa nafsu makan'),
(6, '005', 'Magh', 'Nyeri ulu hati dan perut kembung', 'Penyakit pada lambung', 'Mual hingga muntah'),
(7, '006', 'Anemia', 'sakit kepala dan rambut rontok', 'Penyakit pada darah', 'Kuku rapuh dan kekurangan sel darah merah'),
(8, '007', 'Pengeroposan Tulang', 'Penyusutan gigi dan nyeri punggung tiba tiba', 'Penyakit pada tulang', 'Pelemahan kekuatan tulang'),
(9, '008', 'Hipertensi', 'Sakit kepala parah', 'Penyakit bagian kepala', 'Telinga berdenging dan mual'),
(10, '009', 'Sembelit', 'Buang air besar terus menerus', 'Penyakit pada lambung', 'Kotoran terasa keras/kering, mulas dan nyeri perut'),
(11, '010', 'Keputihan', 'Jumlah keputihan keluar terlalu banyak', 'Penyakit pada kelamin', 'Berbau tidak sedap'),
(12, '011', 'Preeklamsia', 'Gangguan fungsi hati  dan produksi urine menurun', 'Mual dan muntah', 'Penurunan jumlah trombosit'),
(13, '012', 'Gusi Bernanah', 'Bau mulut berlebihan', 'Penyakit pada gigi', 'Sakit gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `nomor_induk_dokter` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `jenis_kelamin`, `nomor_induk_dokter`, `tempat_lahir`, `tgl_lahir`, `alamat`, `id_poli`, `tanggal_masuk`) VALUES
(1, 'dr. Ferihan', 'Laki-Laki', '001', 'Banjarmasin', '1999-02-12', 'Jl. Sultan Adam', 2, '2022-02-12'),
(2, 'dr. Muhammad Jali S.Kg', 'Laki-Laki', '002', 'Banjarmasin', '1993-02-14', 'Jl. Anggur', 1, '2022-02-13'),
(3, 'dr. Parlina Sp.OG', 'Perempuan', '003', 'Banjarbaru', '1977-04-04', 'Jl. Kemuning', 3, '2020-08-08'),
(4, 'dr.  Mustofa SpPD-Kger', 'Laki-Laki', '004', 'Banjarbaru', '1988-07-07', 'Jl. Bina Putera', 4, '2009-08-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `kode_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `kode_obat`, `nama_obat`, `jenis_obat`, `satuan`, `stok`) VALUES
(2, '001', 'Anexsamol', 'Kapsul', 'Tablet', 20),
(3, '002', 'Paracetamol', 'Tablet', 'Strip', 17),
(4, '003', 'Antasida ', 'Cair', 'Botol', 54),
(5, '004', 'Asam Folat', 'Tablet', 'Strip', 36),
(6, '005', 'Betametason Cream', 'Cream', 'Tube', 24),
(7, '006', 'Ibuprofen', 'Tablet', 'Strip', 49),
(8, '007', 'Betametason ', 'Cream', 'Tube', 38),
(9, '008', 'Amlodipin', 'Tablet', 'Strip', 48),
(10, '009', 'Termorex', 'Cair', 'Botol', 45),
(11, '010', 'Ambeven', 'Tablet', 'Strip', 50),
(12, '011', 'Ambroxol', 'Tablet', 'Strip', 23),
(13, '012', 'Anastan', 'Tablet', 'Strip', 36),
(14, '013', 'Alumy', 'Cair', 'Botol', 48),
(15, '014', 'Asam Mefenamat', 'Tablet', 'Strip', 47),
(16, '015', 'Betahistin', 'Tablet', 'Strip', 32),
(17, '016', 'Burnazin Salp', 'Cream', 'Tube', 18),
(18, '017', 'Callusol', 'Cair', 'Botol', 20),
(19, '018', 'Colesterol', 'Tablet', 'Strip', 40),
(20, '019', 'Demacolin', 'Tablet', 'Strip', 23),
(21, '020', 'Diapet', 'Tablet', 'Strip', 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `no_rekamedis` varchar(10) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `status_pasien` varchar(20) NOT NULL,
  `no_bpjs` varchar(30) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenkel` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_rekamedis`, `no_ktp`, `status_pasien`, `no_bpjs`, `nama_pasien`, `jenkel`, `tempat_lahir`, `tanggal_lahir`, `alamat`) VALUES
(4, '003', '6372050807000001', 'BPJS', '6372050806546', 'Muhammad Kamal', 'Laki-Laki', 'Banjarbaru', '2007-12-05', 'Jl. Kelurahan Gg. Keruing II'),
(6, '004', '6312564587756459', 'BPJS', '0002154786512', 'Muhammad Luthfi Maulidin', 'Laki-Laki', 'Banjarmasin', '2000-02-02', 'Jl.  Kemuning'),
(8, '006', '6320002158775632', 'UMUM', '', 'Novia Indriani', 'Perempuan', 'Barabai', '2002-02-02', 'Jl. Pandu RT.07 RW. 09'),
(9, '007', '630215789654123', 'BPJS', '0056985555456', 'Waini Rahmah', 'Perempuan', 'Bangkal', '2000-10-08', 'Jl. Mandiri RT.09  RW.09'),
(10, '008', '630222545685421', 'UMUM', '', 'Fikri Anshari', 'Laki-Laki', 'Banjarbaru', '2000-01-01', 'Jl. Pandu RT.01 RW.01'),
(11, '009', '6302589645555212', 'UMUM', '', 'Ahmad Abdullah Majidi', 'Laki-Laki', 'Rantau', '2000-08-05', 'Jl, Sungai Besar RT.09 RW.02'),
(12, '010', '6302154698546213', 'UMUM', '', 'Siti Rahmah', 'Perempuan', 'Banjarbaru', '2005-02-02', 'Jl. Kemuning RT.04 RW.04'),
(13, '011', '6325222202122225', 'UMUM', '', 'Resha Noor Hafida', 'Perempuan', 'Balangan', '2000-05-06', 'Jl. Pandu RT.04 RW.09'),
(14, '012', '6345556676543212', 'BPJS', '0003456654434', 'Nor Awfa Azizah', 'Perempuan', 'Banjarbaru', '1997-02-02', 'Jl. Keruing 2 RT.05 RW.05'),
(15, '013', '6309000098887777', 'BPJS', '0009898889764', 'Dona Sukma Agustiani', 'Perempuan', 'Rantau', '2000-03-01', 'Jl. Bunga RT.01 RW.01'),
(16, '014', '6309889884123334', 'BPJS', '0009899889876', 'Fia Endriantika', 'Perempuan', 'Rantau', '2000-01-01', 'Jl.Bunga RT.01 RW.01'),
(17, '015', '6398988888987677', 'BPJS', '0009898888789', 'Roni Setiawan', 'Laki-Laki', 'Banjarmasin', '1998-01-01', 'Jl.Pandu RT.09 RW.09'),
(18, '016', '6309090909888000', 'BPJS', '0009898989000', 'Muhammad Tamimy', 'Laki-Laki', 'Kandangan', '1997-01-01', 'Jl. Kenanga RT.01 RW.01'),
(19, '017', '634565555541112', 'UMUM', '', 'Muhammad Faisal', 'Laki-Laki', 'Banjarbaru', '1999-08-08', 'Jl. Kenanga RT.01 RW.01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberian_resep_obat`
--

CREATE TABLE `pemberian_resep_obat` (
  `id_pemberian_resep_obat` int(11) NOT NULL,
  `id_riwayat_tindakan` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `dosis_aturan_obat` varchar(100) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal_pemberian_resep` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemberian_resep_obat`
--

INSERT INTO `pemberian_resep_obat` (`id_pemberian_resep_obat`, `id_riwayat_tindakan`, `id_obat`, `dosis_aturan_obat`, `jumlah_obat`, `keterangan`, `tanggal_pemberian_resep`) VALUES
(3, 5, 15, '3x1 ', 2, 'Diminum sebelum makan', '2023-02-10'),
(4, 6, 3, '3x1', 5, 'diminum sebelu makan', '2023-02-09'),
(6, 8, 5, '3x1', 1, 'Diminum sebelum makan', '2023-02-10'),
(7, 9, 13, '2x1', 2, 'Diminum sebelum makan', '2023-02-10'),
(8, 10, 3, '3x1', 1, 'Diminum sebelum makan', '2023-02-10'),
(9, 11, 15, '3x1', 1, 'Diminum sebelum makan', '2023-02-10'),
(10, 11, 3, '3x1', 1, 'Diminum sebelum makan', '2023-02-10'),
(11, 12, 21, '2x1', 1, 'Diminum sebelum makan', '2023-02-10'),
(12, 13, 16, '1x1', 1, 'Diminum sebelum makan', '2023-02-10'),
(13, 14, 9, '2x1', 1, 'Diminum sebelum makan', '2023-02-11'),
(14, 15, 14, '2x1', 2, 'Gigi geraham berlobang,  gusi bengkak dan bernanah', '2023-02-11'),
(15, 16, 17, '1x1', 1, 'Dioles tipis', '2023-02-11'),
(16, 17, 6, '2x1', 1, 'Di oleh secara tipis dibagian yang gatal', '2023-02-11'),
(17, 18, 7, '2x1', 1, 'Diminum sesudah makan', '2023-02-11'),
(18, 19, 16, '3x1', 2, 'Diminum sebelum makan', '2023-02-11'),
(19, 20, 5, '3x1', 1, 'diminum sebelum makan', '2023-02-11'),
(20, 21, 20, '2x1', 2, 'Diminum sesudah makan', '2023-02-11'),
(21, 22, 13, '1x1', 2, 'Diminum setiap 6 jam sekali', '2023-02-11'),
(22, 23, 9, '2x1', 1, 'Diminum sesudah makan', '2023-02-11'),
(23, 24, 12, '3x1', 2, 'Diminum sesudah makan', '2023-02-11'),
(24, 25, 8, '3x1', 2, 'Diminum setiap 8 jam sekali', '2023-02-11');

--
-- Trigger `pemberian_resep_obat`
--
DELIMITER $$
CREATE TRIGGER `tambahobat` AFTER INSERT ON `pemberian_resep_obat` FOR EACH ROW BEGIN

   UPDATE obat SET stok = stok - NEW.jumlah_obat
   WHERE id_obat = NEW.id_obat;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `no_rawat` varchar(30) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama_penanggung_jawab` varchar(50) NOT NULL,
  `hubungan_dengan_penanggung_jawab` varchar(50) NOT NULL,
  `alamat_penanggung` text NOT NULL,
  `status_pendaftaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `no_rawat`, `tanggal_daftar`, `id_dokter`, `id_poli`, `id_pasien`, `nama_penanggung_jawab`, `hubungan_dengan_penanggung_jawab`, `alamat_penanggung`, `status_pendaftaran`) VALUES
(5, '10-02-2023-005', '2023-02-10', 2, 1, 4, 'Sukardi', 'Orang Tua', 'Jl. Keruing', ''),
(6, '10-02-2023-006', '2023-02-10', 2, 1, 6, 'Muhammad Riswan', 'Orang Tua', 'Jl. Kemuning', ''),
(7, '10-02-2023-007', '2023-02-10', 4, 4, 8, 'Mahmud', 'Orang Tua', 'Jl. Pandu', ''),
(8, '10-02-2023-008', '2023-02-10', 3, 3, 9, 'Aditya', 'Saudara Kandung', 'Jl. Mandiri', ''),
(9, '10-02-2023-009', '2023-02-10', 1, 2, 10, 'Norahman', 'Orang Tua', 'Jl. Pandu', ''),
(10, '10-02-2023-010', '2023-02-10', 4, 4, 11, 'Mahmudah', 'Orang Tua', 'Jl. Sungai Besar', ''),
(11, '10-02-2023-011', '2023-02-10', 3, 3, 13, 'Mahdi', 'Orang Tua', 'Jl. Pandu', ''),
(12, '10-02-2023-012', '2023-02-10', 4, 4, 12, 'Suryani', 'Saudara Kandung', 'Jl. Pandu', ''),
(13, '11-02-2023-013', '2023-02-11', 1, 2, 4, 'Sukardi', 'Orang Tua', 'Jl. Kelurahan Gg.Keruing', ''),
(14, '11-02-2023-014', '2023-02-11', 2, 1, 4, 'Sukardi', 'Orang Tua', 'Jl. Kelurahan Gg. Keruing II', ''),
(15, '11-02-2023-015', '2023-02-11', 4, 4, 12, 'Norahman', 'Saudara Kandung', 'Jl. Kemuning RT.04 RW.04', ''),
(16, '11-02-2023-016', '2023-02-11', 1, 2, 12, 'Norahman', 'Saudara Kandung', 'Jl. Kemuning RT.04 RW.04', ''),
(17, '11-02-2023-017', '2023-02-11', 1, 2, 6, 'Aditya', 'Saudara Kandung', 'Jl. Kemuning', ''),
(18, '11-02-2023-018', '2023-02-11', 1, 2, 10, 'Muhammad Riswan', 'Orang Tua', 'Jl. Pamdu RT.01 RW.01', ''),
(19, '11-02-2023-019', '2023-02-11', 3, 3, 14, 'Muhammad', 'Suami', 'Jl. Keruing 2 RT.05 RW.05', ''),
(20, '11-02-2023-020', '2023-02-11', 3, 3, 15, 'Norahman', 'Suami', 'Jl. Bunga RT.01 RW.01', ''),
(21, '11-02-2023-021', '2023-02-11', 3, 3, 16, 'Aditya', 'Suami', 'Jl. Bunga RT01 RW.01', ''),
(22, '11-02-2023-022', '2023-02-11', 4, 4, 17, 'Bayu', 'Saudara Kandung', 'Jl.Pandu RT.09 RW.09', ''),
(23, '11-02-2023-023', '2023-02-11', 2, 1, 17, 'Suryani', 'Orang Tua', 'Jl. Pandu RT.09 RW.09', ''),
(24, '11-02-2023-024', '2023-02-11', 2, 1, 18, 'Norahman', 'Orang Tua', 'Jl. Kenanga RT.01 RW.01', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_ktp` varchar(18) NOT NULL,
  `nama_pasien` text NOT NULL,
  `no_hp` varchar(22) NOT NULL,
  `level` varchar(20) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(70) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `no_ktp`, `nama_pasien`, `no_hp`, `level`, `date_create`, `email`, `status`) VALUES
(2, 'rinaldi', '$2y$10$AzMPH.bpIO.Xu8RghKBZLuM9e1.EaB0cOeFUK2tqKZzkGGqPvxdwW', '6372040408000001', 'Muhammad Rinaldi', '0895705038835', 'User', '2023-01-16 14:06:56', 'rinaldi@gmail.com', 'TERVERIFIKASI'),
(4, 'Kamal', '$2y$10$kl3jazQSCM2IpL5tpHDSnO7KoK2VNvh78vJj5DE6PZqyRujYXByvy', '6372050807000001', 'Muhammad Kamal', '0895705878552', 'User', '2023-01-16 14:19:17', 'kamal@gmail.com', 'TERVERIFIKASI'),
(5, 'udin', '$2y$10$MI1JvsXhqI30sLBYTMVlvOYbQ3bU3weMtFXGfk3155KpBLFHLqJ8G', '63545687513213', 'Udin', '085577898555', 'User', '2023-02-09 14:22:13', 'udin@gmail.com', 'DITOLAK'),
(6, 'Luthfi', '$2y$10$CAba9xAj8PZ3wT7ztIb88uGqn7Sxjo8sLM.kgU.yYyqE8zM7bMMJ.', '6312564587756459', 'Muhammad Luthfi Maulidin', '081254697815', 'User', '2023-02-09 15:11:54', 'luthfi@gmail.com', 'TERVERIFIKASI'),
(8, 'Novia', '$2y$10$DP47AjHnyu6.XkwguXnC8.GTgFEpHVYUKUH4PcZsVB.1miGSUYRly', '6320002158775632', 'Novia Indriani', '086522236547', 'User', '2023-02-09 15:15:05', 'novia@gmail.com', 'TERVERIFIKASI'),
(9, 'Waini', '$2y$10$QiOzqDIfDYdYPHBxr9fA2Okw2NxiHya1cu8nYQKXRn25WNLcKIClu', '630215789654123', '', '082565455582', 'User', '2023-02-09 15:16:48', 'waini@gmail.com', 'TERVERIFIKASI'),
(10, 'Fikri', '$2y$10$gg.wWfT2NDrWQSVI8Methujp3oVFdXeCT4ln5XZ4l61sAkcDD02Ti', '630222545685421', 'Fikri Anshari', '082564521222', 'User', '2023-02-09 15:18:04', 'fikri@gmail.com', 'TERVERIFIKASI'),
(11, 'Majidi', '$2y$10$5q45bn9JeNKRgeJwBz4XX.HAT4Pwa7j/YNAuDJA2pSjz5c5tOmEji', '6302589645555212', 'Ahmad Abdullah Majidi', '085421365485', 'User', '2023-02-09 15:19:33', 'majidi@gmail.com', 'TERVERIFIKASI'),
(12, 'Sira', '$2y$10$GUrEFtRM2ldSmstA8witWeieAQEC1/BUHw197evQN.qvNsalTr/2y', '6302154698546213', 'Siti Rahmah', '085256547895', 'User', '2023-02-09 15:20:40', 'sira@gmail.com', 'TERVERIFIKASI'),
(14, 'admin', '$2y$10$j.0sflyayGEjGywHT48zs.Qz8LP9h1UZQW2WQ8KsqTYVD1gFWizZy', '', 'Nurdinah', '089531778418', 'Administrator', '2023-02-10 05:35:26', 'admin.puskesmas@gmail.com', 'TERVERIFIKASI'),
(15, 'Awfa', '$2y$10$MFSTpYZtZxnNOPdYTOYR7.CuXsE/pvFhlyfH3FNboa/MR83/fLoNq', '6345556676543212', 'Nor Awfa Azizah', '089545345654', 'User', '2023-02-10 17:59:45', 'awfa@gmail.com', 'TERVERIFIKASI'),
(16, 'Dona', '$2y$10$lxk1WH.Szp4eX0kBqMSWYesWjTMONSlDD/VCfUyMp79VMH16mdiWe', '6309000098887777', 'Dona Sukma Agustiani', '089777877765', 'User', '2023-02-10 18:01:15', 'dona@gmail.com', 'TERVERIFIKASI'),
(17, 'Fia', '$2y$10$fjvtzBogaprSGk4bDLmsTe.hp9FlWRlburLRoet5uLnnqprZxqxD2', '6309889884123334', 'Fia Endriantika', '089877876765', 'User', '2023-02-10 18:02:38', 'fia@gmail.com', 'TERVERIFIKASI'),
(18, 'Roni', '$2y$10$mnlZVNTVwpG9SV9XRiqIq.GaQmRVAWiaguxf.1V2gFEQYCI2Z6EP.', '6398988888987677', 'Roni Setiawan', '098888765432', 'User', '2023-02-10 18:04:10', 'roni@gmail.com', 'TERVERIFIKASI'),
(19, 'Tamimy', '$2y$10$fsjwfQRuam.o6hKJF5Iudu9s96G0zpnhOsHK1QE6fZbB6dObHfXxy', '6309090909888000', 'Muhammad Tamimy', '089333454400', 'User', '2023-02-10 18:05:19', 'tamimy@gmail.com', 'TERVERIFIKASI'),
(20, 'Faisal', '$2y$10$d5mbOjxfibODuQcwwsa0U.VZhmjPl2hiaVSIiNK63nSAvtcmWiZcC', '634565555541112', 'Muhammad Faisal', '089898998812', 'User', '2023-02-10 18:38:23', 'faisal@gmail.com', 'TERVERIFIKASI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(100) NOT NULL,
  `ruang_poli` varchar(100) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`, `ruang_poli`, `jam_mulai`, `jam_selesai`) VALUES
(1, 'POLI GIGI', 'RUANG POLI GIGI', '08:00:00', '11:00:00'),
(2, 'POLI UMUM', 'RUANG POLI UMUM', '08:00:00', '11:00:00'),
(3, 'POLI KIA', 'RUANG POLI KIA', '08:00:00', '11:00:00'),
(4, 'POLI LANSIA', 'RUANG POLI LANSIA', '08:00:00', '11:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poligigi`
--

CREATE TABLE `poligigi` (
  `id_poligigi` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama_tindakan` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL,
  `ditangani_oleh` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_tindakan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poligigi`
--

INSERT INTO `poligigi` (`id_poligigi`, `id_pasien`, `nama_tindakan`, `biaya`, `ditangani_oleh`, `keterangan`, `tgl_tindakan`) VALUES
(1, 4, 'Pemeriksaan gigi', 15000, 'Dokter', 'Sudah dilakukan pemeriksaan pada gigi anak', '2023-02-10'),
(2, 6, 'Pemeriksaan gigi', 15000, 'Dokter dan Petugas', 'sudah dilakukan pemeriksaan dan penambalan pada gi', '2023-02-10'),
(3, 4, 'Pemeriksaan gigi', 10000, 'Dokter', 'Gigi geraham berlobang,  gusi bengkak dan bernanah', '2023-02-11'),
(4, 17, 'Pemeriksaan gigi', 12000, 'Dokter dan Petugas', 'Sering mengunyah es batu menyebabkan gigi berluban', '2023-02-11'),
(5, 18, 'Pemeriksaan gigi', 10000, 'Dokter dan Petugas', 'Gusi bernanah dan menyebar ke gigi lain', '2023-02-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `polikia`
--

CREATE TABLE `polikia` (
  `id_polikia` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama_tindakan` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL,
  `ditangani_oleh` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_tindakan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `polikia`
--

INSERT INTO `polikia` (`id_polikia`, `id_pasien`, `nama_tindakan`, `biaya`, `ditangani_oleh`, `keterangan`, `tgl_tindakan`) VALUES
(4, 9, 'Periksa kandungan', 20000, 'Dokter', 'Periksa keputihan saat hamil', '2023-02-10'),
(6, 13, 'Pemeriksaan Lambung', 12000, 'Dokter', 'Lambung terasa mulas dan keram', '2023-02-10'),
(8, 14, 'Periksa kandungan', 10000, 'Dokter dan Petugas', 'Kekurangan produksi sel darah merah saat kandungan', '2023-02-11'),
(9, 15, 'Periksa kandungan', 10000, 'Dokter', 'Terlalu banyak memakan dan minum makanan yang mani', '2023-02-11'),
(10, 16, 'Periksa kandungan', 10000, 'Dokter dan Petugas', 'Nyeri kepala berlebih dan gangguan fungsi hati', '2023-02-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `polilansia`
--

CREATE TABLE `polilansia` (
  `id_polilansia` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama_tindakan` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL,
  `ditangani_oleh` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_tindakan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `polilansia`
--

INSERT INTO `polilansia` (`id_polilansia`, `id_pasien`, `nama_tindakan`, `biaya`, `ditangani_oleh`, `keterangan`, `tgl_tindakan`) VALUES
(1, 8, 'Pemeriksaan Kaki', 30000, 'Dokter', 'Pasien mengalami pengeroposan pada  tulang belakan', '2023-02-10'),
(2, 11, 'Pemeriksaan Lambung', 10000, 'Dokter', 'Asam Lambung naik menyebabkan mual', '2023-02-10'),
(3, 12, 'Pemeriksaan Darah', 10000, 'Dokter dan Petugas', 'Darah tinggi hipertensi', '2023-02-10'),
(4, 12, 'Pemeriksaan Tangan', 20000, 'Dokter dan Petugas', 'Tangan berlubang dan bernanah', '2023-02-11'),
(5, 17, 'Pemeriksaan Darah', 15000, 'Petugas', 'Terlalu banyak memakan dan minum makanan yang mani', '2023-02-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poliumum`
--

CREATE TABLE `poliumum` (
  `id_poliumum` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama_tindakan` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL,
  `ditangani_oleh` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_tindakan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poliumum`
--

INSERT INTO `poliumum` (`id_poliumum`, `id_pasien`, `nama_tindakan`, `biaya`, `ditangani_oleh`, `keterangan`, `tgl_tindakan`) VALUES
(2, 10, 'Pemeriksaan Kepala', 10000, 'Dokter', 'Demam tinggi dan sakit kepala', '2023-02-10'),
(3, 4, 'Pemeriksaan Lambung', 15000, 'Dokter dan Petugas', 'Perih dibagian ulu hati', '2023-02-11'),
(4, 12, 'Pemeriksaan Kulit', 20000, 'Dokter dan Petugas', 'Terdapat bercak kemerahan dan gatal berlebih', '2023-02-11'),
(5, 10, 'Pemeriksaan Lambung', 10000, 'Dokter', 'Asam lambung dan mual', '2023-02-11'),
(6, 6, 'Pemeriksaan Darah', 20000, 'Dokter dan Petugas', 'Darah rendah', '2023-02-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_tindakan`
--

CREATE TABLE `riwayat_tindakan` (
  `id_riwayat_tindakan` int(11) NOT NULL,
  `nama_tindakan` varchar(100) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `id_diagnosa` int(11) NOT NULL,
  `hasil_periksa` varchar(100) NOT NULL,
  `tanggal_tindakan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_tindakan`
--

INSERT INTO `riwayat_tindakan` (`id_riwayat_tindakan`, `nama_tindakan`, `id_pendaftaran`, `id_diagnosa`, `hasil_periksa`, `tanggal_tindakan`) VALUES
(5, 'Pemeriksaan gigi', 5, 2, 'Gigi geraham berlobang dan gusi bengkak', '2023-02-10'),
(6, 'Pemeriksaan gigi', 6, 2, 'Gusi bengkak dan bernanah', '2023-02-09'),
(8, 'Pemeriksaan bagian belakang', 7, 8, 'Tulang belakang mengalami pengeroposan', '2023-02-10'),
(9, 'Pemeriksaan kandungan', 8, 11, 'Selama hamil merasa keputihan terlalu berlebihan', '2023-02-10'),
(10, 'Pemeriksaan Kepala', 9, 5, 'Demam tinggi dan pusing', '2023-02-10'),
(11, 'Pemeriksaan Lambung', 10, 1, 'Asam Lambung naik beserta mual', '2023-02-10'),
(12, 'Pemeriksaan Anak', 11, 10, 'Perut keram dan mulas berlebihan', '2023-02-10'),
(13, 'Pemeriksaan Darah', 12, 9, 'Darah tinggi dan sakit kepala', '2023-02-10'),
(14, 'Pemeriksaan Lambung', 13, 6, 'Sakit Perut di ulu hati', '2023-02-11'),
(15, 'Pemeriksaan gigi', 14, 2, 'Gigi geraham berlobang,  gusi bengkak dan bernanah', '2023-02-11'),
(16, 'Pemeriksaan Tangan', 15, 1, 'Tangan berlubang dan bernanah', '2023-02-11'),
(17, 'Pemeriksaan Kulit', 16, 4, 'Terdapat bercak kemerahan dan gatal berlebih', '2023-02-11'),
(18, 'Pemeriksaan Lambung', 18, 6, 'Asam lambung dan mual', '2023-02-11'),
(19, 'Pemeriksaan Darah', 17, 7, 'Darah rendah', '2023-02-11'),
(20, 'Periksa kandungan', 19, 7, 'Kekurangan produksi sel darah merah saat kandungan 3 minggu', '2023-02-11'),
(21, 'Periksa kandungan', 20, 1, 'Terlalu banyak memakan dan minum makanan yang manis ', '2023-02-11'),
(22, 'Pemeriksaan Darah', 22, 1, 'Terlalu banyak memakan dan minum makanan yang manis ', '2023-02-11'),
(23, 'Pemeriksaan gigi', 23, 2, 'Sering mengunyah es batu menyebabkan gigi berlubang dan keropos', '2023-02-11'),
(24, 'Pemeriksaan gigi', 24, 13, 'Gusi bernanah dan menyebar ke gigi lain', '2023-02-11'),
(25, 'Periksa kandungan', 21, 12, 'Nyeri kepala berlebih dan gangguan fungsi hati', '2023-02-11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_antrian` (`no_antrian`,`id_pasien`,`id_poli`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`),
  ADD KEY `kode_diagnosa` (`kode_diagnosa`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `no_rekamedis` (`no_rekamedis`,`no_ktp`);

--
-- Indeks untuk tabel `pemberian_resep_obat`
--
ALTER TABLE `pemberian_resep_obat`
  ADD PRIMARY KEY (`id_pemberian_resep_obat`),
  ADD KEY `id_riwayat_tindakan` (`id_riwayat_tindakan`,`id_obat`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `no_rawat` (`no_rawat`,`id_dokter`,`id_poli`,`id_pasien`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `username` (`username`,`no_ktp`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `poligigi`
--
ALTER TABLE `poligigi`
  ADD PRIMARY KEY (`id_poligigi`),
  ADD KEY `id_poli` (`id_pasien`);

--
-- Indeks untuk tabel `polikia`
--
ALTER TABLE `polikia`
  ADD PRIMARY KEY (`id_polikia`),
  ADD KEY `id_poli` (`id_pasien`);

--
-- Indeks untuk tabel `polilansia`
--
ALTER TABLE `polilansia`
  ADD PRIMARY KEY (`id_polilansia`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `poliumum`
--
ALTER TABLE `poliumum`
  ADD PRIMARY KEY (`id_poliumum`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `riwayat_tindakan`
--
ALTER TABLE `riwayat_tindakan`
  ADD PRIMARY KEY (`id_riwayat_tindakan`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`,`id_diagnosa`),
  ADD KEY `id_diagnosa` (`id_diagnosa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pemberian_resep_obat`
--
ALTER TABLE `pemberian_resep_obat`
  MODIFY `id_pemberian_resep_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `poligigi`
--
ALTER TABLE `poligigi`
  MODIFY `id_poligigi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `polikia`
--
ALTER TABLE `polikia`
  MODIFY `id_polikia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `polilansia`
--
ALTER TABLE `polilansia`
  MODIFY `id_polilansia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `poliumum`
--
ALTER TABLE `poliumum`
  MODIFY `id_poliumum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `riwayat_tindakan`
--
ALTER TABLE `riwayat_tindakan`
  MODIFY `id_riwayat_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`),
  ADD CONSTRAINT `antrian_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`);

--
-- Ketidakleluasaan untuk tabel `pemberian_resep_obat`
--
ALTER TABLE `pemberian_resep_obat`
  ADD CONSTRAINT `pemberian_resep_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `pemberian_resep_obat_ibfk_2` FOREIGN KEY (`id_riwayat_tindakan`) REFERENCES `riwayat_tindakan` (`id_riwayat_tindakan`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`);

--
-- Ketidakleluasaan untuk tabel `poligigi`
--
ALTER TABLE `poligigi`
  ADD CONSTRAINT `poligigi_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `polikia`
--
ALTER TABLE `polikia`
  ADD CONSTRAINT `polikia_ibfk_1` FOREIGN KEY (`id_polikia`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `polilansia`
--
ALTER TABLE `polilansia`
  ADD CONSTRAINT `polilansia_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `poliumum`
--
ALTER TABLE `poliumum`
  ADD CONSTRAINT `poliumum_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `riwayat_tindakan`
--
ALTER TABLE `riwayat_tindakan`
  ADD CONSTRAINT `riwayat_tindakan_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`),
  ADD CONSTRAINT `riwayat_tindakan_ibfk_2` FOREIGN KEY (`id_diagnosa`) REFERENCES `diagnosa` (`id_diagnosa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
