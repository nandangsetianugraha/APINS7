-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2020 pada 18.54
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apins7`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `peserta_didik_id` varchar(36) NOT NULL,
  `absensi` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_ptk`
--

CREATE TABLE `absensi_ptk` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `arbain`
--

CREATE TABLE `arbain` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `arbain`
--

INSERT INTO `arbain` (`id`, `nama`) VALUES
(1, 'ARBA\'IN 1'),
(2, 'ARBA\'IN 3'),
(3, 'ARBA\'IN 5'),
(4, 'ARBA\'IN 7'),
(5, 'ARBA\'IN 8'),
(6, 'ARBA\'IN 9'),
(7, 'ARBA\'IN 11'),
(8, 'ARBA\'IN 12'),
(9, 'ARBA\'IN 13'),
(10, 'ARBA\'IN 14'),
(11, 'ARBA\'IN 15'),
(12, 'ARBA\'IN 17'),
(13, 'ARBA\'IN 18'),
(14, 'ARBA\'IN 20'),
(15, 'ARBA\'IN 21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ekskul`
--

CREATE TABLE `data_ekskul` (
  `id` int(11) NOT NULL,
  `peserta_didik_id` varchar(36) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(9) NOT NULL,
  `id_ekskul` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kesehatan`
--

CREATE TABLE `data_kesehatan` (
  `id` int(11) NOT NULL,
  `peserta_didik_id` varchar(36) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(9) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `pendengaran` varchar(100) NOT NULL,
  `penglihatan` varchar(100) NOT NULL,
  `gigi` varchar(100) NOT NULL,
  `lainnya` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_prestasi`
--

CREATE TABLE `data_prestasi` (
  `id` int(11) NOT NULL,
  `peserta_didik_id` varchar(36) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(9) NOT NULL,
  `kesenian` varchar(100) NOT NULL,
  `olahraga` varchar(100) NOT NULL,
  `akademik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id` varchar(20) NOT NULL,
  `id_kecamatan` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id`, `id_kecamatan`, `nama`) VALUES
('3212010007', '3212010', 'Haurkolot'),
('3212010008', '3212010', 'Haurgeulis'),
('3212010009', '3212010', 'Sukajati'),
('3212010010', '3212010', 'Wanakaya'),
('3212010011', '3212010', 'Karangtumaritis'),
('3212010012', '3212010', 'Kertanegara'),
('3212010013', '3212010', 'Cipancuh'),
('3212010014', '3212010', 'Mekarjati'),
('3212010015', '3212010', 'Sidadadi'),
('3212010016', '3212010', 'Sumbermulya'),
('3212011001', '3212011', 'Bantarwaru'),
('3212011002', '3212011', 'Sanca'),
('3212011003', '3212011', 'Mekarjaya'),
('3212011004', '3212011', 'Gantar'),
('3212011005', '3212011', 'Situraja'),
('3212011006', '3212011', 'Baleraja'),
('3212011007', '3212011', 'Mekarwaru'),
('3212020001', '3212020', 'Sukaslamet'),
('3212020002', '3212020', 'Tanjungkerta'),
('3212020003', '3212020', 'Kroya'),
('3212020004', '3212020', 'Sumbon'),
('3212020005', '3212020', 'Sukamelang'),
('3212020006', '3212020', 'Temiyang'),
('3212020007', '3212020', 'Temiyangsari'),
('3212020008', '3212020', 'Jayamulya'),
('3212020009', '3212020', 'Sumberjaya'),
('3212030001', '3212030', 'Kedungdawa'),
('3212030002', '3212030', 'Babakanjaya'),
('3212030003', '3212030', 'Gabuskulon'),
('3212030004', '3212030', 'Sekarmulya'),
('3212030005', '3212030', 'Kedokangabus'),
('3212030006', '3212030', 'Rancamulya'),
('3212030007', '3212030', 'Rancahan'),
('3212030008', '3212030', 'Gabuswetan'),
('3212030009', '3212030', 'Drunten Wetan'),
('3212030010', '3212030', 'Drunten Kulon'),
('3212040003', '3212040', 'Loyang'),
('3212040004', '3212040', 'Amis'),
('3212040005', '3212040', 'Jatisura'),
('3212040006', '3212040', 'Jambak'),
('3212040007', '3212040', 'Cikedung'),
('3212040012', '3212040', 'Cikedung Lor'),
('3212040013', '3212040', 'Mundakjaya'),
('3212041001', '3212041', 'Cikawung'),
('3212041002', '3212041', 'Jatimunggul'),
('3212041003', '3212041', 'Jatimulya'),
('3212041004', '3212041', 'Plosokerep'),
('3212041005', '3212041', 'Rajasinga'),
('3212041006', '3212041', 'Karangasem'),
('3212041007', '3212041', 'Cibereng'),
('3212041008', '3212041', 'Kendayakan'),
('3212041009', '3212041', 'Manggungan'),
('3212050001', '3212050', 'Tunggulpayung'),
('3212050002', '3212050', 'Tugu'),
('3212050003', '3212050', 'Nunuk'),
('3212050004', '3212050', 'Tempel'),
('3212050005', '3212050', 'Pangauban'),
('3212050006', '3212050', 'Telagasari'),
('3212050007', '3212050', 'Langgengsari'),
('3212050008', '3212050', 'Tamansari'),
('3212050009', '3212050', 'Lelea'),
('3212050010', '3212050', 'Cempeh'),
('3212050011', '3212050', 'Tempelkulon'),
('3212060008', '3212060', 'Mulyasari'),
('3212060015', '3212060', 'Bangodua'),
('3212060016', '3212060', 'Beduyut'),
('3212060017', '3212060', 'Karanggetas'),
('3212060018', '3212060', 'Tegalgirang'),
('3212060019', '3212060', 'Wanasari'),
('3212060020', '3212060', 'Malangsari'),
('3212060021', '3212060', 'Rancasari'),
('3212061001', '3212061', 'Bodas'),
('3212061002', '3212061', 'Gadel'),
('3212061003', '3212061', 'Rancajawat'),
('3212061004', '3212061', 'Kerticala'),
('3212061005', '3212061', 'Sukamulya'),
('3212061006', '3212061', 'Karangkerta'),
('3212061007', '3212061', 'Cangko'),
('3212061008', '3212061', 'Pagedangan'),
('3212061009', '3212061', 'Sukaperna'),
('3212061010', '3212061', 'Sukadana'),
('3212061011', '3212061', 'Tukdana'),
('3212061012', '3212061', 'Lajer'),
('3212061013', '3212061', 'Mekarsari'),
('3212070006', '3212070', 'Bangkaloa Ilir'),
('3212070007', '3212070', 'Widasari'),
('3212070008', '3212070', 'Kalensari'),
('3212070010', '3212070', 'Bunder'),
('3212070011', '3212070', 'Ujungaris'),
('3212070012', '3212070', 'Kongsijaya'),
('3212070013', '3212070', 'Ujungjaya'),
('3212070014', '3212070', 'Ujungpendokjaya'),
('3212070015', '3212070', 'Leuwigede'),
('3212070016', '3212070', 'Kasmaran'),
('3212080007', '3212080', 'Tulungagung'),
('3212080008', '3212080', 'Jengkok'),
('3212080009', '3212080', 'Tegalwirangrong'),
('3212080010', '3212080', 'Manguntara'),
('3212080011', '3212080', 'Jambe'),
('3212080012', '3212080', 'Lemahayu'),
('3212080013', '3212080', 'Tenajar Kidul'),
('3212080014', '3212080', 'Kertasemaya'),
('3212080015', '3212080', 'Kliwed'),
('3212080016', '3212080', 'Tenajar'),
('3212080017', '3212080', 'Laranganjambe'),
('3212080018', '3212080', 'Tenajar Lor'),
('3212080019', '3212080', 'Sukawera'),
('3212170001', '3212170', 'Kiajaran Kulon'),
('3212170002', '3212170', 'Kijaran Wetan'),
('3212170003', '3212170', 'Lanjan'),
('3212170004', '3212170', 'Langut'),
('3212170005', '3212170', 'Larangan'),
('3212170006', '3212170', 'Waru'),
('3212170007', '3212170', 'Legok'),
('3212170008', '3212170', 'Bojongslawi'),
('3212170009', '3212170', 'Lohbener'),
('3212170010', '3212170', 'Pamayahan'),
('3212170011', '3212170', 'Sindangkerta'),
('3212170015', '3212170', 'Rambatan Kulon'),
('3212180001', '3212180', 'Ranjeng'),
('3212180002', '3212180', 'Krimun'),
('3212180003', '3212180', 'Puntang'),
('3212180004', '3212180', 'Pegagan'),
('3212180005', '3212180', 'Rajaiyang'),
('3212180006', '3212180', 'Jangga'),
('3212180007', '3212180', 'Jumbleng'),
('3212180008', '3212180', 'Pangkalan'),
('3212180010', '3212180', 'Losarang'),
('3212180011', '3212180', 'Muntur'),
('3212180012', '3212180', 'Santing'),
('3212180013', '3212180', 'Cemara Kulon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deskripsi_k13`
--

CREATE TABLE `deskripsi_k13` (
  `id_raport` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `jns` varchar(5) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `doa`
--

CREATE TABLE `doa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `doa`
--

INSERT INTO `doa` (`id`, `nama`) VALUES
(1, 'AKAN TIDUR'),
(2, 'BANGUN TIDUR'),
(3, 'AKAN MAKAN'),
(4, 'SESUDAH MAKAN'),
(5, 'BERCERMIN'),
(6, 'SESUDAH WUDHU'),
(7, 'MENDOAKAN ORANG TUA'),
(8, 'MENJENGUK ORANG SAKIT'),
(9, 'MASUK MASJID'),
(10, 'KELUAR MASJID'),
(11, 'BELAJAR'),
(12, 'BERBUKA PUASA'),
(13, 'BERPAKAIAN'),
(14, 'MASUK KAMAR MANDI'),
(15, 'KELUAR KAMAR MANDI'),
(16, 'KELUAR RUMAH'),
(17, 'KEBAIKAN DUNIA AKHIRAT'),
(18, 'NAIK KENDARAAN'),
(19, 'BERSIN'),
(20, 'ADA ANGIN KENCANG'),
(21, 'KETIKA MARAH'),
(22, 'KETIKA KAGUM'),
(23, 'SESUDAH ADZAN'),
(24, 'ZIARAH KUBUR'),
(25, 'TURUN HUJAN'),
(26, 'MINTA HUJAN'),
(27, 'TERTIMPA MUSIBAH'),
(28, 'KETIKA MENDENGAR PETIR'),
(29, 'PENUTUP MAJELIS'),
(30, 'MOHON AMPUN'),
(31, 'KALIMAT TAYYIBAH'),
(32, 'MELEPAS PAKAIAN'),
(33, 'PEMBUKA HATI'),
(34, 'SYAYIDUL ISTIGFAR'),
(35, 'DZIKIR PAGI HARI 1'),
(36, 'DZIKIR PAGI HARI 2'),
(37, 'DZIKIR PAGI HARI 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `doa_harian`
--

CREATE TABLE `doa_harian` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `surah` int(11) NOT NULL,
  `nilai` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekskul`
--

CREATE TABLE `ekskul` (
  `id_ekskul` int(11) NOT NULL,
  `nama_ekskul` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ekskul`
--

INSERT INTO `ekskul` (`id_ekskul`, `nama_ekskul`) VALUES
(1, 'Praja Muda Karana (Pramuka)'),
(2, 'Tahfidz'),
(3, 'Dokter Kecil'),
(4, 'Karate'),
(5, 'Drumband'),
(6, 'Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gajipokok`
--

CREATE TABLE `gajipokok` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `insentif` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `tunj_walikelas` int(11) NOT NULL,
  `tunj_kepsek` int(11) NOT NULL,
  `tunj_kehadiran` int(11) NOT NULL,
  `tunj_ekskul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hadits`
--

CREATE TABLE `hadits` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hadits`
--

INSERT INTO `hadits` (`id`, `nama`) VALUES
(1, 'SHALAT'),
(2, 'SABAR DAN PEMAAF'),
(3, 'SENYUM SHADAQAH'),
(4, 'BERKATA BAIK'),
(5, 'SURGA DIBAWAH KAKI IBU'),
(6, 'KEUTAMAAN SALAM'),
(7, 'MEMUTUS SILATURRAHMI'),
(8, 'MASJID RUMAH MUSLIM'),
(9, 'WAJIB MENUNTUT ILMU'),
(10, 'MENUTUP AURAT'),
(11, 'KEBERSIHAN'),
(12, 'BERBUAT BAIK'),
(13, 'JANGAN SUKA MARAH'),
(14, 'ADAB MAKAN'),
(15, 'MALU SEBAGIAN IMAN'),
(16, 'KEUTAMAAN BELAJAR QUR\'AN'),
(17, 'ORANG MULIA'),
(18, 'ALLAH SUKA KEINDAHAN'),
(19, 'LARANGAN SOMBONG'),
(20, 'BERTERIMA KASIH KEPADA SESAMA'),
(21, 'MENCINTAI SAUDARA'),
(22, 'SESAMA MUSLIM BERSAUDARA'),
(23, 'SALING MEMBERI HADIAH'),
(24, 'MEMULIAKAN TAMU'),
(25, 'PENTINGNYA NIAT'),
(26, 'LARANGAN MEMBANGKANG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hadits_arbain`
--

CREATE TABLE `hadits_arbain` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `surah` int(11) NOT NULL,
  `nilai` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hadits_pilihan`
--

CREATE TABLE `hadits_pilihan` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `surah` int(11) NOT NULL,
  `nilai` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari_efektif`
--

CREATE TABLE `hari_efektif` (
  `id_hari` int(11) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tapel` varchar(9) NOT NULL,
  `hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_pegawai`
--

CREATE TABLE `id_pegawai` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `ptk_id` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ijin_ptk`
--

CREATE TABLE `ijin_ptk` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_ptk`
--

CREATE TABLE `jenis_ptk` (
  `jenis_ptk_id` int(11) NOT NULL,
  `jenis_ptk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_ptk`
--

INSERT INTO `jenis_ptk` (`jenis_ptk_id`, `jenis_ptk`) VALUES
(5, 'Tenaga Administrasi'),
(6, 'Guru Inklusi'),
(11, 'Operator Sekolah'),
(13, 'Guru Magang'),
(40, 'Pustakawan'),
(94, 'Guru Bahasa Inggris'),
(95, 'Guru Penjaskes'),
(96, 'Guru Pendidikan Agama'),
(97, 'Guru Pendamping'),
(98, 'Guru Kelas'),
(99, 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jns_mutasi`
--

CREATE TABLE `jns_mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `nama_mutasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jns_mutasi`
--

INSERT INTO `jns_mutasi` (`id_mutasi`, `nama_mutasi`) VALUES
(0, 'Mutasi Keluar'),
(1, 'Aktif'),
(3, 'Dikeluarkan'),
(4, 'Mengundurkan Diri'),
(5, 'Wafat'),
(6, 'Hilang'),
(7, 'Lulus'),
(17, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `juzamma`
--

CREATE TABLE `juzamma` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `juzamma`
--

INSERT INTO `juzamma` (`id`, `nama`) VALUES
(1, 'AL FATIHAH'),
(2, 'AN NAS'),
(3, 'AL FALAQ'),
(4, 'AL IKHLAS'),
(5, 'AL LAHAB'),
(6, 'AN NASR'),
(7, 'AL KAFIRUUN'),
(8, 'AL KAUTSAR'),
(9, 'AL MAUN'),
(10, 'AL QURAISY'),
(11, 'AL FIIL'),
(12, 'AL HUMAZAH'),
(13, 'AL \'ASR'),
(14, 'AT TAKATSUR'),
(15, 'AL QORIAH'),
(16, 'AL ADIYAT'),
(17, 'AL ZALZALAH'),
(18, 'AL BAYINAH'),
(19, 'AL QODR'),
(20, 'AL ALAQ'),
(21, 'AT TIN'),
(22, 'AL INSYIRAH'),
(23, 'AD DHUHA'),
(24, 'AL LAIL'),
(25, 'ASY SYAMS'),
(26, 'AL BALAD'),
(27, 'AL FAJR'),
(28, 'AL GHOSIYAH'),
(29, 'AL A\'LA'),
(30, 'AT TARIQ'),
(31, 'AL BURUUJ'),
(32, 'AL INSYIQOQ'),
(33, 'AL MUTAFFIFIN'),
(34, 'AL INFITAR'),
(35, 'AT TAKWIR'),
(36, 'ABATSA'),
(37, 'AN NAZI\'AT'),
(38, 'AN NABA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kd`
--

CREATE TABLE `kd` (
  `id_kd` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `aspek` int(11) NOT NULL,
  `mapel` int(11) NOT NULL,
  `kd` varchar(10) NOT NULL,
  `nama_kd` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kd`
--

INSERT INTO `kd` (`id_kd`, `kelas`, `aspek`, `mapel`, `kd`, `nama_kd`) VALUES
(6, 1, 3, 3, '3.2', 'memahami kegiatan persiapan menulis permulaan (cara duduk, cara memegang pensil, cara meletakkan buku, jarak antara mata dan buku, pemilihan tempat dengan cahaya yang terang) yang benar'),
(7, 1, 3, 3, '3.3', 'memahami lambang bunyi  vokal dan konsonan  dalam kata bahasa Indonesia atau bahasa daerah'),
(8, 1, 3, 3, '3.4', 'memahami kosakata tentang anggota tubuh dan pancaindra serta perawatannya melalui teks pendek (berupa gambar, tulisan, slogan sederhana, dan/atau syair lagu)'),
(9, 1, 3, 3, '3.5', 'memahami kosakata tentang cara memelihara kesehatan melalui teks pendek (berupa gambar, tulisan, dan slogan sederhana)'),
(10, 1, 3, 3, '3.6', 'memahami kosakata bahasa Indonesia tentang berbagai jenis benda di lingkungan sekitar melalui teks pendek (berupa gambar, slogan sederhana, tulisan, dan/atau syair lagu)'),
(11, 1, 3, 3, '3.7', 'memahami kosakata bahasa Indonesia yang berkaitan dengan peristiwa siang dan malam melalui teks pendek (gambar, tulisan, dan/atau syair lagu)'),
(12, 1, 3, 3, '3.8', 'memahami ungkapan penyampaian terima kasih, permintaan maaf, tolong, dan pemberian pujian, ajakan, pemberitahuan, perintah, dan petunjuk kepada orang lain dengan menggunakan bahasa yang santun secara lisan dan tulisan yang dapat dibantu dengan kosakata bahasa daerah'),
(13, 1, 3, 3, '3.9', 'memahami kosakata dan ungkapan perkenalan diri, keluarga, dan orang-orang di tempat tinggalnya secara lisan dan tulis yang dapat dibantu dengan kosakata bahasa daerah'),
(14, 1, 3, 3, '3.10', 'memahami kosakata hubungan  kekeluargaan melalui gambar/bagan silsilah keluarga dalam bahasa Indonesia atau bahasa daerah'),
(15, 1, 3, 3, '3.11', 'memahami puisi anak/syair lagu (berisi ungkapan kekaguman, kebanggaan, hormat kepada orang tua, kasih sayang, atau persahabatan) yang diperdengarkan dengan tujuan untuk kesenangan'),
(16, 1, 3, 4, '3.1', 'menjelaskan makna bilangan cacah sampai dengan 99 sebagai banyak anggota suatu kumpulan objek'),
(17, 1, 3, 4, '3.2', 'menjelaskan bilangan sampai dua angka dan nilai tempat penyusun lambang bilangan menggunakan kumpulan benda konkret serta cara membacanya'),
(18, 1, 3, 4, '3.3', 'membandingkan dua bilangan sampai dua angka dengan menggunakan kumpulan benda-benda konkret'),
(19, 1, 3, 4, '3.4', 'menjelaskan dan melakukan penjumlahan dan pengurangan bilangan yang melibatkan bilangan cacah sampai dengan 99 dalam kehidupan sehari-hari serta mengaitkan penjumlahan dan pengurangan '),
(20, 1, 3, 4, '3.5', 'mengenal pola bilangan yang berkaitan dengan kumpulan benda/gambar/gerakan atau lainnya'),
(21, 1, 3, 4, '3.6', 'mengenal bangun ruang dan bangun datar dengan menggunakan berbagai benda konkret'),
(22, 1, 3, 4, '3.7', 'mengidentifikasi bangun datar yang dapat disusun membentuk pola pengubinan '),
(23, 1, 3, 4, '3.8', 'mengenal dan menentukan panjang dan berat dengan satuan tidak baku menggunakan benda/situasi konkret'),
(24, 1, 3, 4, '3.9', 'membandingkan panjang, berat, lamanya waktu, dan suhu  menggunakan benda/situasi konkret'),
(25, 1, 3, 7, '3.1', 'mengenal karya ekspresi dua dan tiga dimensi'),
(26, 1, 3, 7, '3.2', 'mengenal elemen musik melalui lagu'),
(27, 1, 3, 7, '3.3', 'mengenal gerak anggota tubuh melalui tari'),
(28, 1, 3, 7, '3.4', 'mengenal bahan alam dalam berkarya'),
(29, 1, 3, 8, '3.1', 'memahami prosedur gerak dasar lokomotor sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam berbagai bentuk permainan sederhana dan/ atau tradisional'),
(30, 1, 3, 8, '3.2', 'memahami prosedur gerak dasar non-lokomotor sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam berbagai bentuk permainan sederhana dan/ atau tradisional'),
(31, 1, 3, 8, '3.3', 'memahami prosedur pola gerak dasar manipulatif sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam berbagai bentuk permainan sederhana dan/ atau tradisional'),
(32, 1, 3, 8, '3.4', 'memahami prosedur  menjaga sikap tubuh (duduk, membaca, berdiri, jalan), dan bergerak secara lentur serta seimbang dalam rangka pembentukan tubuh melalui permainan sederhana dan/atau tradisional'),
(33, 1, 3, 8, '3.5', 'memahami prosedur berbagai gerak dominan  (bertumpu, bergantung, keseimbangan, berpindah/lokomotor, tolakan, putaran, ayunan, melayang, dan mendarat) dalam aktivitas senam lantai'),
(34, 1, 3, 8, '3.6', 'memahami prosedur gerak dasar lokomotor dan non-lokomotor sesuai dengan irama (ketukan) tanpa/dengan musik dalam aktivitas gerak berirama'),
(35, 1, 3, 8, '3.7', 'memahami prosedur berbagai pengenalan  aktivitas air dan menjaga keselamatan diri/orang lain dalam aktivitas air'),
(36, 1, 3, 8, '3.8', 'memahami bagian-bagian tubuh, bagian tubuh yang boleh dan tidak boleh disentuh orang lain, cara menjaga kebersihannya, dan kebersihan pakaian'),
(37, 1, 3, 1, '3.1', 'mengetahui huruf-huruf hijaiyyah dan harakatnya secara lengkap'),
(38, 1, 3, 1, '3.2', 'memahami pesan-pesan pokok Q.S. al-Fatihah dan Q.S. al-Ikhlas'),
(79, 1, 4, 2, '4.1', 'menceritakan gambar pada lambang negara \"Garuda Pancasila\"'),
(80, 1, 4, 2, '4.2', 'melakukan kegiatan sesuai dengan aturan yang berlaku dalam kehidupan sehari-hari di rumah'),
(81, 1, 4, 2, '4.3', 'menceritakan pengalaman kebersamaan dalam keberagaman individu di rumah'),
(82, 1, 4, 2, '4.4', 'menceritakan pengalaman kerjasama dalam keberagaman di rumah'),
(87, 4, 3, 3, '3.1', 'mencermati gagasan pokok dan gagasan pendukung yang diperoleh dari teks lisan, tulis, atau visual'),
(88, 4, 3, 3, '3.2', 'mencermati keterhubungan antargagasan yang didapat dari teks lisan, tulis, atau visual'),
(89, 4, 3, 3, '3.3', 'menggali informasi dari seorang tokoh melalui wawancara menggunakan daftar pertanyaan'),
(90, 4, 3, 3, '3.4', 'membandingkan teks petunjuk penggunaan dua alat yang sama dan berbeda'),
(91, 4, 3, 3, '3.5', 'menguraikan pendapat pribadi tentang isi buku sastra (cerita, dongeng, dan sebagainya)'),
(92, 4, 3, 3, '3.6', 'menggali isi dan amanat puisi yang disajikan secara lisan dan tulis dengan tujuan untuk kesenangan'),
(93, 4, 3, 3, '3.7', 'menggali pengetahuan baru yang terdapat pada teks nonfiksi'),
(94, 4, 3, 3, '3.8', 'membandingkan hal yang sudah diketahui dengan yang baru diketahui dari teks nonfiksi'),
(95, 4, 3, 3, '3.9', 'mencermati tokoh-tokoh yang terdapat pada teks fiksi'),
(98, 4, 3, 4, '3.2', 'menjelaskan berbagai bentuk pecahan (biasa, campuran, desimal, dan persen) dan hubungan di antaranya'),
(100, 4, 3, 4, '3.4', 'menjelaskan faktor dan kelipatan suatu bilangan'),
(102, 4, 3, 4, '3.6', 'menjelaskan dan menentukan faktor persekutuan, faktor persekutuan terbesar (FPB), kelipatan persekutuan, dan kelipatan persekutuan terkecil (KPK) dari dua bilangan berkaitan dengan kehidupan sehari-hari'),
(109, 4, 3, 5, '3.1', 'menganalisis hubungan antara bentuk dan fungsi bagian tubuh pada hewan dan tumbuhan'),
(110, 4, 3, 5, '3.2', 'memahami siklus hidup beberapa jenis makhluk hidup yang ada di lingkungan sekitar dan upaya pelestariannya'),
(111, 4, 3, 5, '3.3', 'memahami macam-macam gaya, antara lain gaya otot, gaya listrik, gaya magnet, gaya gravitasi, dan gaya gesekan'),
(112, 4, 3, 5, '3.4', 'memahami hubungan antara gaya dan gerak'),
(113, 4, 3, 5, '3.5', 'memahami berbagai sumber energi, perubahan bentuk energi, dan sumber energi alternatif (angin, air, matahari, panas bumi, bahan bakar organik, dan nuklir) dalam kehidupan sehari-hari'),
(114, 4, 3, 5, '3.6', 'menerapkan sifat-sifat bunyi dan keterkaitannya dengan indra pendengaran'),
(115, 4, 3, 5, '3.7', 'menerapkan sifat-sifat cahaya dan keterkaitannya dengan indera penglihatan'),
(116, 4, 3, 5, '3.8', 'memahami pentingnya upaya keseimbangan dan pelestarian sumber daya alam di lingkungannya'),
(117, 4, 3, 6, '3.1', 'mengidentifikasi karakteristik ruang dan pemanfaatan sumber daya alam untuk kesejahteraan masyarakat  dari tingkat  kota/kabupaten sampai dengan tingkat provinsi'),
(118, 4, 3, 6, '3.2', 'mengidentifikasi keragaman sosial, ekonomi, budaya, etnis, dan agama di provinsi setempat sebagai identitas bangsa Indonesia '),
(119, 4, 3, 6, '3.3', 'mengidentifikasi kegiatan ekonomi dalam meningkatkan kehidupan masyarakat di bidang pekerjaan, sosial, dan budaya di lingkungan sekitar sampai dengan provinsi'),
(120, 4, 3, 6, '3.4', 'mengidentifikasi kerajaan Hindu, Buddha, dan Islam serta pengaruhnya pada kehidupan masyarakat masa kini di lingkungan daerah setempat'),
(121, 4, 3, 7, '3.1', 'mengetahui gambar dan bentuk tiga dimensi'),
(122, 4, 3, 7, '3.2', 'mengetahui tanda tempo dan tinggi rendah nada'),
(123, 4, 3, 7, '3.3', 'mengetahui gerak tari kreasi daerah'),
(124, 4, 3, 7, '3.4', 'mengetahui karya seni rupa teknik tempel '),
(125, 4, 3, 8, '3.1', 'memahami prosedur variasi gerak dasar lokomotor, non-lokomotor, dan manipulatif sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam permainan bola besar sederhana dan/atau tradisional'),
(126, 4, 3, 8, '3.2', 'memahami prosedur variasi gerak dasar lokomotor, non-lokomotor, dan manipulatif sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam permainan bola kecil sederhana dan/atau tradisional'),
(127, 4, 3, 8, '3.3', 'memahami prosedur variasi gerak dasar  jalan, lari,  lompat, dan lempar melalui permainan/olahraga yang dimodifikasi dan/atau olahraga tradisional'),
(128, 4, 3, 8, '3.4', 'menerapkan prosedur gerak dasar lokomotor dan non-lokomotor untuk membentuk gerak dasar seni beladiri'),
(129, 4, 3, 8, '3.5', 'menganalisis prosedur berbagai aktivitas kebugaran jasmani melalui berbagai bentuk latihan; daya tahan, kekuatan, kecepatan, dan kelincahan  untuk mencapai berat badan ideal'),
(130, 4, 3, 8, '3.6', 'menerapkan prosedur variasi dan kombinasi berbagai pola gerak dominan  (bertumpu, bergantung, keseimbangan, berpindah/lokomotor, tolakan, putaran, ayunan, melayang, dan mendarat) dalam aktivitas senam lantai'),
(131, 4, 3, 8, '3.7', 'menerapkan prosedur variasi gerak dasar  langkah dan ayunan lengan mengikuti irama (ketukan) tanpa/dengan musik dalam aktivitas gerak berirama'),
(132, 4, 3, 8, '3.8', 'memahami prosedur gerak dasar satu gaya renang'),
(133, 4, 3, 8, '3.9', 'memahami jenis cidera dan cara penanggulangannya secara sederhana saat melakukan aktivitas fisik dan dalam kehidupan sehari-hari'),
(134, 4, 3, 8, '3.10', 'menganalisis perilaku terpuji dalam pergaulan sehari-hari (antarteman sebaya, orang yang lebih tua, dan orang yang lebih muda)'),
(135, 4, 3, 1, '3.1', 'memahami makna Q.S. al-Falaq dan Q.S. al-Fil dengan baik dan benar'),
(139, 4, 3, 1, '3.5', 'memahami makna iman kepada Rasul Allah'),
(140, 4, 3, 1, '3.6', 'memahami sikap santun dan menghargai teman, baik di rumah, sekolah, maupun di masyarakat sekitar'),
(143, 4, 3, 1, '3.9', 'memahami makna perilaku jujur dalam kehidupan sehari-hari'),
(144, 4, 3, 1, '3.10', 'memahami makna perilaku amanah dalam kehidupan sehari-hari'),
(145, 4, 3, 1, '3.11', 'memahami makna perilaku hormat dan patuh kepada orangtua dan guru'),
(148, 4, 3, 1, '3.14', 'memahami tata cara bersuci dari hadas kecil  sesuai ketentuan syariâ€™at Islam'),
(150, 4, 3, 1, '3.16', 'memahami kisah keteladanan Nabi Ayyub a.s.'),
(151, 4, 3, 1, '3.17', 'memahami kisah keteladanan Nabi Zulkifli a.s.'),
(152, 4, 3, 1, '3.18', 'memahami kisah keteladanan Nabi Harun a.s.'),
(153, 4, 3, 1, '3.19', 'memahami kisah keteladanan Nabi Musa a.s.'),
(154, 4, 3, 1, '3.20', 'memahami kisah keteladanan Nabi Muhammad saw.'),
(161, 1, 4, 3, '4.1', 'mempraktikkan  kegiatan persiapan membaca permulaan (duduk wajar dan baik, jarak antara mata dan buku, cara memegang buku, cara membalik halaman buku, gerakan mata dari kiri ke kanan, memilih tempat dengan cahaya yang  terang) dengan benar'),
(162, 1, 4, 3, '4.2', 'mempraktikkan kegiatan persiapan menulis permulaan (cara duduk, cara memegang pensil, cara meletakkan buku, jarak antara mata dan buku, gerakan tangan atas-bawah, kiri-kanan, latihan pelenturan gerakan tangan dengan gerakan menulis di udara/pasir/ meja, melemaskan jari dengan mewarnai, menjiplak, menggambar, membuat garis tegak, miring, lurus, dan lengkung, menjiplak berbagai bentuk gambar, lingkaran, dan bentuk huruf di tempat bercahaya terang) dengan benar'),
(163, 1, 4, 3, '4.3', 'melafalkan bunyi vokal dan konsonan dalam kata bahasa Indonesia atau bahasa daerah'),
(164, 1, 4, 3, '4.4', 'menyampaikan penjelasan dengan kosakata yang tepat tentang anggota tubuh dan pancaindra serta perawatannya (berupa gambar dan tulisan) dalam bahasa Indonesia lisan dan tulis'),
(165, 1, 4, 3, '4.5', 'mengemukakan penjelasan dengan kosakata bahasa Indonesia dan pelafalan yang tepat cara memelihara kesehatan'),
(166, 1, 4, 3, '4.6', 'menggunakan kosakata bahasa Indonesia dengan ejaan yang tepat tentang berbagai jenis benda di lingkungan sekitar melalui teks pendek (berupa gambar, slogan sederhana, tulisan, dan/atau syair lagu)'),
(167, 1, 4, 3, '4.7', 'menyampaikan penjelasan dengan kosakata bahasa Indonesia berkaitan dengan peristiwa siang dan malam  melalui teks pendek (gambar, tulisan, dan/atau syair lagu)'),
(168, 1, 4, 3, '4.8', 'mengucapkan ungkapan  terima kasih, permintaan maaf, tolong, dan pemberian pujian, dengan menggunakan bahasa yang santun kepada orang lain  secara lisan dan tulis'),
(169, 1, 4, 3, '4.9', 'menggunakan kosakata dan ungkapan yang tepat untuk perkenalan diri, keluarga, dan orang-orang di tempat tinggalnya secara sderhana dalam bentuk  lisan dan tulis'),
(170, 1, 4, 3, '4.10', 'menggunakan kosakata yang tepat dalam percakapan tentang hubungan kekeluargaan dengan menggunakan bantuan gambar/bagan  silsilah keluarga'),
(171, 1, 4, 3, '4.11', 'melisankan puisi anak /syair lagu (berisi ungkapan kekaguman, kebanggaan, hormat kepada orang tua, kasih sayang, atau persahabatan) sebagai bentuk ungkapan diri'),
(172, 1, 4, 4, '4.1', 'menyajikan bilangan cacah sampai dengan 99 yang bersesuaian dengan banyak anggota kumpulan objek yang disajikan'),
(173, 1, 4, 4, '4.2', 'menuliskan lambang bilangan  sampai dua angka yang menyatakan banyak anggota suatu kumpulan objek dengan ide nilai tempat'),
(174, 1, 4, 4, '4.3', 'mengurutkan bilangan-bilangan sampai dua angka dari bilangan terkecil ke bilangan terbesar atau sebaliknya  dengan menggunakan kumpulan benda-benda konkret'),
(175, 1, 4, 4, '4.4', 'menyelesaikan masalah kehidupan sehari-hari yang berkaitan dengan  penjumlahan dan pengurangan bilangan  yang melibatkan bilangan cacah sampai dengan 99'),
(176, 1, 4, 4, '4.5', 'memprediksi dan membuat pola bilangan yang berkaitan dengan kumpulan benda/gambar/ gerakan atau lainnya'),
(177, 1, 4, 4, '4.6', 'mengklasifikasi bangun ruang dan bangun datar dengan menggunakan berbagai benda konkret'),
(178, 1, 4, 4, '4.7', 'mnyusun bangun-bangun datar untuk membentuk pola pengubinan'),
(179, 1, 4, 4, '4.8', 'melakukan pengukuran panjang dan berat dalam  satuan tidak baku dengan menggunakan benda/situasi konkret'),
(180, 1, 4, 4, '4.9', 'mengurutkan benda/kejadian/ keadaan berdasarkan panjang, berat, lamanya waktu, dan suhu'),
(181, 1, 4, 7, '4.1', 'membuat karya ekspresi dua dan tiga dimensi'),
(182, 1, 4, 7, '4.2', 'menirukan elemen musik melalui lagu'),
(183, 1, 4, 7, '4.3', 'meragakan gerak anggota tubuh melalui tari'),
(184, 1, 4, 7, '4.4', 'membuat karya dari bahan alam'),
(185, 1, 4, 8, '4.1', 'mempraktikkan gerak dasar lokomotor sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam berbagai bentuk permainan sederhana dan/atau tradisional'),
(186, 1, 4, 8, '4.2', 'mempraktikkan gerak dasar non-lokomotor sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam berbagai bentuk permainan sederhana dan/ atau tradisional'),
(187, 1, 4, 8, '4.3', 'mempraktikkan pola gerak dasar manipulatif sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam berbagai bentuk permainan sederhana dan/ atau tradisional'),
(188, 1, 4, 8, '4.4', 'mempraktikkan sikap tubuh (duduk, membaca, berdiri, jalan), dan bergerak secara lentur serta seimbang dalam rangka pembentukan tubuh melalui permainan sederhana dan/atau tradisional'),
(189, 1, 4, 8, '4.5', 'mempraktikkan berbagai pola gerak dominan  (bertumpu, bergantung, keseimbangan, berpindah/lokomotor, tolakan, putaran, ayunan, melayang, dan mendarat) dalam aktivitas senam lantai'),
(190, 1, 4, 8, '4.6', 'mempraktikkan gerak dasar lokomotor dan non-lokomotor sesuai dengan irama (ketukan) tanpa/dengan musik dalam aktivitas gerak berirama'),
(191, 1, 4, 8, '4.7', 'mempraktikkan berbagai pengenalan  aktivitas air dan menjaga keselamatan diri/orang lain dalam aktivitas air'),
(192, 1, 4, 8, '4.8', 'menceritakan bagian-bagian tubuh, bagian tubuh yang boleh dan tidak boleh disentuh orang lain, cara menjaga kebersihannya, dan kebersihan pakaian'),
(193, 4, 4, 2, '4.1', 'menceritakan makna hubungan simbol dengan sila-sila Pancasila sebagai satu kesatuan dalam kehidupan sehari-hari'),
(196, 4, 4, 2, '4.4', 'bekerja sama dalam keberagaman suku bangsa, sosial, dan budaya  dalam  masyarakat'),
(197, 4, 4, 3, '4.1', 'menata informasi yang didapat dari teks berdasarkan keterhubungan antargagasan ke dalam kerangka tulis'),
(198, 4, 4, 3, '4.2', 'menyajikan hasil pencermatan tentang keterhubungan antargagasan ke dalam tulisan'),
(199, 4, 4, 3, '4.3', 'melaporkan hasil wawancara menggunakan kosakata baku dan kalimat efektif dalam bentuk teks tulis'),
(200, 4, 4, 3, '4.4', 'menyajikan teks petunjuk penggunaan alat dalam bentuk teks tulis dan visual menggunakan kosakata baku dan kalimat efektif'),
(201, 4, 4, 3, '4.5', 'mengomunikasikan secara lisan dan tulisan pendapat pribadi tentang isi buku sastra yang dipilih sendiri dan dibaca yang didukung oleh alasan '),
(202, 4, 4, 3, '4.6', 'melisankan puisi hasil karya pribadi dengan lafal, intonasi, dan ekspresi yang tepat sebagai bentuk ungkapan diri'),
(203, 4, 4, 3, '4.7', 'menyampaikan pengetahuan baru dari teks nonfiksi ke dalam tulisan dengan bahasa sendiri'),
(204, 4, 4, 3, '4.8', 'menyampaikan hasil membandingkan pengetahuan lama dengan pengetahuan baru secara tertulis dengan bahasa sendiri dari teks nonfiksi'),
(205, 4, 4, 3, '4.9', 'menyampaikan hasil identifikasi tentang yang ingin diperjuangkan atau dipertentangkan antartokoh pada cerita fiksi'),
(206, 4, 4, 3, '4.10', 'menyajikan cara-cara yang dilakukan oleh tokoh cerita fiksi dalam memperjuangkan atau mempertentangkan hal-hal yang diinginkan'),
(207, 4, 4, 4, '4.1', 'mengidentifikasi  pecahan-pecahan senilai  dengan gambar  dan model konkret'),
(208, 4, 4, 4, '4.2', 'mengidentifikasi berbagai bentuk pecahan (biasa, campuran, desimal, dan persen) dan hubungan di antaranya'),
(209, 4, 4, 4, '4.3', 'menyelesaikan masalah  penaksiran dari jumlah, selisih, hasil kali, dan hasil bagi dua bilangan cacah maupun pecahan'),
(210, 4, 4, 4, '4.4', 'mengidentifikasi faktor dan kelipatan suatu bilangan'),
(211, 4, 4, 4, '4.5', 'mengidentifikasi bilangan prima'),
(212, 4, 4, 4, '4.6', 'menyelesaikan masalah yang berkaitan dengan faktor persekutuan, faktor persekutuan terbesar (FPB), kelipatan persekutuan, dan kelipatan persekutuan terkecil (KPK) dari dua bilangan berkaitan dengan kehidupan sehari-hari'),
(213, 4, 4, 4, '4.7', 'menyelesaikan masalah  pembulatan hasil pengukuran panjang dan berat ke satuan terdekat'),
(214, 4, 4, 4, '4.8', 'mengidentifikasi segibanyak beraturan dan segibanyak tidak beraturan'),
(215, 4, 4, 4, '4.9', 'menyelesaikan masalah berkaitan dengan  keliling dan luas daerah persegi, persegipanjang, dan segitiga'),
(216, 4, 4, 4, '4.10', 'mengidentifikasi hubungan antar garis (sejajar, berpotongan, berhimpit) menggunakan model konkret'),
(217, 4, 4, 4, '4.11', 'membaca data diri siswa dan lingkungannya yang disajikan dalam bentuk diagram batang'),
(218, 4, 4, 4, '4.12', 'mengukur sudut pada bangun datar dalam satuan baku dengan menggunakan busur derajat'),
(219, 4, 4, 5, '4.1', 'menyajikan laporan hasil pengamatan tentang bentuk dan fungsi bagian tubuh hewan dan tumbuhan'),
(220, 4, 4, 5, '4.2', 'membuat skema siklus hidup beberapa jenis mahluk hidup yang ada di lingkungan sekitarnya, dan slogan upaya pelestariannya'),
(221, 4, 4, 5, '4.3', 'mendemonstrasikan manfaat gaya dalam kehidupan sehari-hari, misalnya gaya otot, gaya listrik, gaya magnet, gaya gravitasi, dan gaya gesekan'),
(222, 4, 4, 5, '4.4', 'menyajikan hasil percobaan tentang hubungan antara gaya dan gerak'),
(223, 4, 4, 5, '4.5', 'menyajikan laporan hasil pengamatan dan penelusuran informasi tentang berbagai perubahan bentuk energi'),
(224, 4, 4, 5, '4.6', 'menyajikan laporan hasil  pengamatan dan/atau percobaan tentang sifat-sifat bunyi'),
(225, 4, 4, 5, '4.7', 'menyajikan laporan hasil pengamatan dan/atau percobaan yang memanfaatkan sifat-sifat cahaya'),
(226, 4, 4, 5, '4.8', 'melakukan kegiatan upaya pelestarian sumber daya alam bersama orang-orang di lingkungannya'),
(227, 4, 4, 6, '4.1', 'menyajikan hasil identifikasi karakteristik ruang dan pemanfaatan sumber daya alam untuk kesejahteraan masyarakat  dari tingkat  kota/kabupaten sampai dengan tingkat provinsi'),
(228, 4, 4, 6, '4.2', 'menyajikan hasil identifikasi mengenai keragaman sosial, ekonomi, budaya, etnis, dan agama di provinsi setempat sebagai identitas bangsa Indonesia'),
(229, 4, 4, 6, '4.3', 'menyajikan hasil identifikasi kegiatan ekonomi dalam meningkatkan kehidupan masyarakat di bidang pekerjaan, sosial, dan budaya di lingkungan sekitar sampai dengan provinsi '),
(230, 4, 4, 6, '4.4', 'menyajikan hasil identifikasi kerajaan Hindu, Buddha, dan Islam serta pengaruhnya pada kehidupan masyarakat masa kini di lingkungan daerah setempat'),
(231, 4, 4, 7, '4.1', 'menggambar dan membentuk tiga dimensi'),
(232, 4, 4, 7, '4.2', 'menyanyikan lagu dengan memperhatikan tempo dan tinggi rendah nada '),
(233, 4, 4, 7, '4.3', 'meragakan gerak tari kreasi daerah'),
(234, 4, 4, 7, '4.4', 'membuat karya kolase, montase, aplikasi, dan mozaik '),
(235, 4, 4, 8, '4.1', 'mempraktikkan variasi gerak dasar lokomotor, non-lokomotor, dan manipulatif sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam permainan bola besar sederhana dan/atau tradisional'),
(236, 4, 4, 8, '4.2', 'mempraktikkan variasi gerak dasar lokomotor, non-lokomotor, dan manipulatif sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam permainan bola kecil sederhana dan/atau tradisional'),
(237, 4, 4, 8, '4.3', 'mempraktikkan variasi pola dasar  jalan, lari,  lompat, dan lempar melalui permainan/olahraga yang dimodifikasi dan/atau olahraga tradisional'),
(238, 4, 4, 8, '4.4', 'mempraktikkan gerak dasar lokomotor dan non lokomotor untuk membentuk gerak dasar seni beladiri'),
(239, 4, 4, 8, '4.5', 'mempraktikkan berbagai aktivitas kebugaran jasmani melalui berbagai bentuk latihan; daya tahan, kekuatan, kecepatan, dan kelincahan  untuk mencapai berat badan ideal '),
(240, 4, 4, 8, '4.6', 'mempraktikkan variasi dan kombinasi berbagai pola gerak dominan  (bertumpu, bergantung, keseimbangan, berpindah/ lokomotor, tolakan, putaran, ayunan, melayang, dan mendarat) dalam aktivitas senam lantai'),
(241, 4, 4, 8, '4.7', 'mempraktikkan variasi gerak dasar  langkah dan ayunan lengan mengikuti irama (ketukan) tanpa/dengan musik dalam aktivitas gerak berirama'),
(242, 4, 4, 8, '4.8', 'mempraktikkan gerak dasar satu gaya renang '),
(243, 4, 4, 8, '4.9', 'memaparkan jenis cidera dan cara penanggulangannya secara sederhana saat melakukan aktivitas fisik dan dalam kehidupan sehari-hari'),
(244, 4, 4, 8, '4.10', 'memaparkan perilaku terpuji dalam pergaulan sehari-hari (antarteman sebaya, orang yang lebih tua, dan orang yang lebih muda)'),
(262, 1, 4, 1, '4.1', 'melafalkan huruf-huruf hijaiyyah dan harakatnya secara lengkap'),
(263, 1, 4, 1, '4.2.1', 'melafalkan Q.S. al-Fatihah dan Q.S. al-Ikhlas dengan benar dan jelas'),
(264, 1, 4, 1, '4.2.2', 'menunjukkan hafalan Q.S. al-Fatihah dan Q.S. al-Ikhlas dengan benar dan jelas'),
(318, 4, 4, 1, '4.1.1', 'membaca Q.S. al-Falaq dan Q.S  al-FÄ«l dengan tartil.'),
(319, 4, 4, 1, '4.1.2', 'menulis kalimat-kalimat dalam Q.S. al-Falaq dan Q.S  al-FÄ«l dengan benar.'),
(320, 4, 4, 1, '4.1.3', 'menunjukkan hafalan Q.S. al-Falaq dan Q.S  al-FÄ«l dengan lancar.'),
(324, 4, 4, 1, '4.5', 'mencontohkan makna iman kepada Rasul Allah'),
(325, 4, 4, 1, '4.6', 'mencontohkan sikap santun dan menghargai teman, baik di rumah, sekolah, maupun di masyarakat sekitar'),
(328, 4, 4, 1, '4.9', 'mencontohkan perilaku jujur dalam kehidupan sehari-hari'),
(329, 4, 4, 1, '4.10', 'mencontohkan perilaku amanah dalam kehidupan sehari-hari'),
(330, 4, 4, 1, '4.11', 'mencontohkan perilaku hormat dan patuh kepada orangtua dan guru'),
(333, 4, 4, 1, '4.14', 'mempraktikkan tata cara bersuci dari hadas kecil sesuai ketentuan syariâ€™at Islam'),
(336, 4, 4, 1, '4.16', 'menceritakan kisah keteladan Nabi Ayyub a.s.'),
(337, 4, 4, 1, '4.17', 'menceritakan kisah keteladan Nabi Zulkifli a.s.'),
(338, 4, 4, 1, '4.18', 'menceritakan kisah keteladan Nabi Harun a.s.'),
(339, 4, 4, 1, '4.19', 'menceritakan kisah keteladanan Nabi Musa a.s.'),
(340, 4, 4, 1, '4.20', 'menceritakan kisah keteladanan Nabi Muhammad saw.'),
(348, 2, 3, 2, '3.1', 'Mengidentifikasi hubungan antara simbol dan sila-sila Pancasila dalam lambang negara Garuda Pancasila.'),
(349, 2, 3, 2, '3.2', 'Mengidentifikasi aturan dan tata tertib yang berlaku di sekolah.'),
(350, 2, 3, 2, '3.3', 'Mengidentifikasi jenis-jenis keberagaman karakteristik individu di sekolah.'),
(351, 2, 3, 2, '3.4', 'Memahami makna bersatu dalam keberagaman di rumah dan sekolah.'),
(352, 2, 3, 1, '3.1', 'Mengetahui huruf hijaiyah bersambung sesuai dengan makharijul huruf'),
(373, 5, 3, 1, '3.1', 'memahami makna Qs. at-Tin dan Qs. al-Ma,un dengan baik dan tartil'),
(374, 5, 3, 1, '3.2', 'memahami makna Asmaul Husna; Al-Mumit, Al-Hayy, Al-Qoyyum, dan Al-Ahad'),
(375, 5, 3, 1, '3.4', 'memahami makna diturunkannya kitab-kitab suci melalui rasul-rasul-Nya sebagai implementasi rukun iman'),
(376, 5, 3, 1, '3.10', 'memahami hikmah puasa Ramadhan yang dapat membentuk ahlak mulia'),
(377, 5, 3, 1, '3.3', 'Memahami Nama-nama Rasul Allah dan Rasul Ulul Azmi'),
(378, 5, 3, 2, '3.1', 'Mengidentifikasi nilai-nilai Pancasila dalam Kehidupan sehari-hari'),
(379, 5, 3, 3, '3.1', 'Menentukan Pokok Pikiran dalam teks lisan dan tulis'),
(380, 5, 3, 5, '3.1', 'Menjelaskan alat gerak dan fungsinya pada hewan dan manusia serta cara memelihara kesehatan alat gerak manusia'),
(381, 5, 3, 6, '3.1', 'Mengidentifikasi karakteristik geografis Indonesia sebagai negara  kepulauan / maritim dan agraris serta pengaruhnya terhadap kehidupan ekonomi, sosial, budaya, komunikasi, serta transportasi'),
(382, 5, 3, 7, '3.1', 'Memahami gambar cerita'),
(385, 5, 4, 2, '4.1', 'Menyajikan hasil identifikasi nilai-nilai Pancasila dalam kehidupan sehari-hari'),
(386, 5, 4, 6, '4.1', 'Menyajikan hasil identifikasi karakteristik geografis Indonesia sebagai sebagai negara kepulauan/ maritim dan agraris serta pengaruhnya terhadap kehidupan ekonomi, sosial, budaya, komunikasi serta transportasi.'),
(387, 5, 4, 5, '4.1', 'Membuat model sederhana alat gerak manusia dan hewan'),
(388, 5, 4, 7, '4.1', 'Membuat gambar cerita'),
(389, 5, 4, 3, '4.1', 'Menyajikan hasil identifikasi pokok pikiran dalam teks tulis dan lisan secara lisan, tulis dan visual.'),
(393, 2, 3, 3, '3.4', 'Mengenal kosakata dan konsep tentang lingkungan sehat dan lingkungan tidak sehat di lingkungan sekitar serta cara menjaga kesehatan lingkungan dalam Bahasa Indonesia atau bahasa daerah melalui teks tulis, lisan, dan visual.'),
(394, 2, 3, 4, '3.1', 'Menjelaskan makna bilangan cacah dan menentukan lambangnya berdasarkan nilai tempat dengan menggunakan model konkret serta cara membacanya'),
(395, 2, 3, 4, '3.2', 'Membandingkan dua bilangan cacah'),
(396, 2, 3, 4, '3.3', 'Menjelaskan dan melakukan penjumlahan dan pengurangan bilangan yang melibatkan bilangan cacah sampai dengan 999 dalam kehidupan sehari-hari serta mengaitkan penjumlahan dan pengurangan'),
(397, 2, 3, 4, '3.4', 'Menjelaskan perkalian dan pembagian yang melibatkan bilangan cacah dengan hasil kali sampai dengan 100 dalam kehidupan sehari-hari serta mengaitkan perkalian dan pembagian.'),
(398, 2, 3, 4, '3.5', 'Menjelaskan nilai dan kesetaraan pecahan mata uang.'),
(403, 5, 3, 2, '3.2', 'Memahami hak, kewajiban dan tanggung jawab sebagai warga dalam kehidupan sehari-hari'),
(404, 5, 3, 2, '3.3', 'Menelaah keragaman sosial budaya masyarakat'),
(405, 5, 3, 2, '3.4', 'Menggali manfaat persatuan dan kesatuan untuk membangun kerukunan hidup.'),
(406, 5, 3, 3, '3.2', 'Mengklasifikasi informasi yang didapat dari buku ke dalam aspek: apa, di mana,kapan, siapa, mengapa, dan bagaimana'),
(408, 5, 3, 3, '3.4', 'Menganalisis informasi yang disampaikan paparan iklan dari media cetak atau elektronik'),
(409, 5, 3, 3, '3.6', 'Menggali isi dan amanat pantun yang disajikan secara lisan dan tulis dengan tujuan untuk kesenangan.'),
(410, 5, 3, 3, '3.7', 'Menguraikan konsepkonsep yang saling berkaitan pada teks nonfiksi.'),
(411, 5, 3, 5, '3.2', 'Menjelaskan organ pernapasan dan fungsinya pada hewan dan manusia, serta cara memelihara kesehatan organ pernapasan manusia'),
(412, 5, 3, 5, '3.3', 'Menjelaskan organ pencernaan dan fungsinya pada hewan dan manusia serta cara memelihara kesehatan organ pencernaan manusia'),
(413, 5, 3, 5, '3.4', 'Memahami organ 1 peredaran darah dan fungsinya pada hewan dan manusia serta cara memelihara kesehatan organ peredaran darah manusia.'),
(414, 5, 3, 5, '3.5', 'Menganalisis hubungan antar komponen ekosistem dan jaring-jaring makanan di lingkungan sekitar.'),
(415, 5, 3, 6, '3.2', 'Menganalisis bentuk-bentuk interaksi manusia dengan lingkungan dan pengaruhnya terhadap pembangunan sosial, budaya, dan ekonomi masyarakat Indonesia'),
(416, 2, 3, 7, '3.1', 'Mengenal karya imajinatif dua dan tiga dimensi'),
(417, 2, 3, 7, '3.2', 'Mengenal pola irama sederhana melalui lagu anak-anak'),
(418, 2, 3, 7, '3.3', 'Mengenal gerak keseharian dan alam dalam tari'),
(419, 2, 3, 7, '3.4', 'Mengenal pengolahan bahan alam dan bahan buatan dalam berkarya'),
(421, 2, 3, 8, '3.1', 'Memahami variasi gerak dasar lokomotor sesuai dengan konsep tubuh ,ruang,usaha dan keterhubungan dalam berbagai bentuk permainan sedehana dan atau tradisional'),
(423, 2, 3, 8, '3.2', 'Memahami variasi gerak dasar nonlokomotor sesuai dengan konsep tubuh,ruang,usaha dan keterhubungan dalam berbagai bentuk permainan sederhana dan atau tradisional'),
(425, 5, 4, 2, '4.2', 'Menjalankan hak, kewajiban, dan tanggung jawab sebagai warga masyarakat dalam kehidupan sehari-hari'),
(426, 2, 3, 8, '3.3', 'memahami variasi gerak dasar manipulatif sesuai dengan konsep tubuh,ruang,usaha dan keterhubungan dalam berbagai bentuk permainan sederhana dan atau tradisional'),
(427, 2, 3, 8, '3.4', 'Memahami prosedur bergerak secara seimbang,lentur,dan kuat dalam rangka pengembangan kebugaran jasmani melalui permainan sederhana dan atau tradisional'),
(430, 5, 3, 7, '3.2', 'Memahami tangga nada'),
(431, 5, 3, 7, '3.3', 'Memahami pola lantai dalam kreasi tari daerah'),
(432, 5, 3, 7, '3.4', 'Memahami karya seni rupa daerah'),
(438, 2, 4, 1, '4.1', 'melafalkan huruf hijaiyyah bersambung sesuai dengan makharijul huruf'),
(439, 2, 4, 1, '4.2.1', 'melafalkan Qs. an-Nas dan Qs. al-\'Asr dengan benar dan jelas'),
(440, 2, 4, 1, '4.2.2', 'menunjukan hafalan Qs. an-Nas dan Qs. al-\'Asr dengan benar dan jelas'),
(442, 2, 4, 1, '4.3', 'menunjukan perilaku rajin belajar sebagai implementasi pemahaman makna hadis yang terkait dengan ajaran menuntut ilmu'),
(443, 2, 4, 1, '4.4', 'menunjukan perilaku hidup bersih dan sehat sebagai implementasi pemahaman makna hadis tentang kebersihan dan kesehatan'),
(444, 2, 4, 1, '4.5', 'melafalkan al-Asmaul Husna al-Qudus, as-Salam, dan al-Khaliq'),
(453, 2, 4, 2, '4.1', 'Menjelaskan hubungan gambar pada lambang negara dengan sila-sila pancasila'),
(454, 2, 4, 2, '4.2', 'Menceritakan kegiatan sesuai aturan dan tata tertib yang berlaku disekolah'),
(455, 2, 4, 2, '4.3', 'Mengelompokkan jenis-jenis keberagaman karakteristik individu disekolah'),
(457, 2, 4, 3, '4.1', 'Menirukan ungkapan, ajakan, perintah, penolakan dalam cerita atau lagu anak- anak dengan bahasa yang santun'),
(458, 2, 4, 3, '4.2', 'Melaporkan penggunaan kosakata bahasa indonesia yang tepat atau bahasa daerah hasil pengamatan tentang keberagaman benda berdasarkan bentuk dan wujudnya dalam bentuk teks tulis, lisan dan visual'),
(469, 5, 4, 1, '4.1.1', 'membaca Qs. at-Tin dan Qs. al-Ma\'un dengan tartil'),
(470, 5, 4, 1, '4.1.2', 'menulis kalimat-kalimat dalam Qs. at-Tin dan Qs. al-Ma\'un dengan benar'),
(471, 5, 4, 1, '4.1.3', 'menunjukan hafalan Qs. at-Tin dan Qs. al-Ma\'un dengan lancar'),
(472, 5, 4, 1, '4.2', 'membaca al- Asmaul Husna : al-Mummit, al-Hayy, al-Qayyum, dan al-Ahad dengan jelas dan benar'),
(473, 5, 4, 1, '4.3', 'menunjukan hafalan nama-nama Rasul Allah dan Rasul Ulul \'Azmi'),
(474, 5, 4, 1, '4.4', 'menunjukan makna diturunkannya kitab-kitab suci melalui Rasul-rasulNya sebagai implementasi rukun iman'),
(475, 5, 4, 1, '4.10', 'menunjukan hikmah puasa Ramadhan yang dapat membentuk akhlak mulia'),
(476, 2, 4, 3, '4.3', 'Melaporkan penggunaan kosakata bahasa indonesia yang tepat atau bahasa daerah hasil pengamatan tentang lingkungan geografis,kehidupan ekonomi,sosial dan budaya di lingkungan sekitar dalam bentuk teks tulis,lisan,dan visual'),
(477, 2, 4, 3, '4.4', 'Menyajikan penggunaan kosakata bahasa indonesia yang tepat atau bahasa daerah hasil pengamatan tentang lingkungan sehat di lingkungan lingkungan tidak sehat di lingkungan sekitarserta cara menjaga kesehatan lingkungan dalam bentuk teks tulis,lisan,dan visual'),
(478, 2, 4, 7, '4.1', 'Membuat karya imajinatif dua dan tiga dimensi'),
(479, 2, 4, 7, '4.2', 'Menampilkan pola irama sederhana melalui lagu anakanak'),
(480, 2, 4, 7, '4.3', 'Meragakan gerak keseharian dan alam dalam tari'),
(481, 2, 4, 7, '4.4', 'Membuat hiasan dari bahan alam dan buatan'),
(482, 2, 4, 8, '4.1', 'Mempraktikkan variasi gerak dasar lokomotor sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam berbagai bentuk permainan sederhana dan atau tradisional'),
(483, 2, 4, 8, '4.2', 'Mempraktikkan variasi gerak dasar nonlokomotor sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam berbagai bentuk permainan sederhana dan atau tradisional.'),
(484, 2, 4, 8, '4.3', 'Mempraktikkan variasi gerak dasar manipulatif sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam berbagai bentuk permainan sederhana dan atau tradisional.'),
(485, 2, 4, 8, '4.4', 'Mempraktikkan prosedur bergerak secara seimbang, lentur, dan kuat dalam rangka pengembangan kebugaran jasmani melalui permainan sederhana dan atau tradisional.'),
(486, 2, 4, 4, '4.2', 'Mengurutkan bilanganbilangan dari bilangan terkecil ke bilangan terbesar atau sebaliknya.'),
(487, 2, 4, 4, '4.3', 'Menyelesaikan masalah penjumlahan dan pengurangan bilangan yang melibatkan bilangan 999 dalam kehidupan sehari-hari serta mengaitkan penjumlahan dan pengurangan'),
(488, 2, 4, 4, '4.1', ' Membaca dan menyajikan bilangan cacah dan lambangnya berdasarkan nilai tempat dengan menggunakan model konkret'),
(489, 2, 4, 4, '4.4', 'Menyelesaikan masalah perkalian dan pembagian yang melibatkan bilangan cacah dengan hasil kali sampai dengan 100 dalam kehidupan sehari-hari serta mengaitkan perkalian dan pembagian.'),
(490, 2, 4, 4, '4.5', 'Mengurutkan nilai mata uang serta mendemonstrasikan berbagai kesetaraan pecahan mata uang.'),
(494, 5, 4, 2, '4.3', 'Menyelenggarakan kegiatan yang mendukung keragaman sosial budaya masyarakat'),
(495, 5, 4, 2, '4.4', 'Menyajikan hasil penggalian tentang manfaat persatuan dan kesatuan untuk membangun kerukunan'),
(506, 5, 3, 6, '3.3', 'Menganalisis peran ekonomi dalam upaya menyejahterakan kehidupan masyarakat di bidang sosial dan budaya untuk memperkuat kesatuan dan persatuan bangsa'),
(507, 5, 4, 3, '4.2', 'Menyajikan hasil klasifikasi informasi yang didapat dari buku yang dikelompokkan dalam aspek: apa, di mana, kapan, siapa, mengapa, dan bagaimana menggunakan kosakata baku'),
(508, 5, 4, 3, '4.4', 'Memeragakan kembali informasi yang disampaikan paparan iklan dari media cetak atau elektronik dengan bantuan lisan, tulis, dan visual'),
(509, 5, 4, 3, '4.6', 'Melisankan pantun hasil karya pribadi dengan lafal, intonasi, dan ekspresi yang tepat sebagai bentuk ungkapan diri'),
(510, 5, 4, 3, '4.7', 'Menyajikan konsep-konsep yang saling berkaitan pada teks nonfiksi ke dalam tulisan dengan bahasa sendiri'),
(511, 5, 4, 5, '4.2', 'Membuat model sederhana organ pernapasan manusia\r\n'),
(512, 5, 4, 5, '4.3', 'Menyajikan karya tentang konsep organ dan fungsi pencernaan pada hewan atau manusia\r\n'),
(513, 5, 4, 5, '4.4', 'Menyajikan karya tentang organ peredaran darah pada manusia.\r\n'),
(514, 5, 4, 5, '4.5', 'Membuat karya tentang konsep jaring-jaring makanan dalam suatu ekosistem.\r\n'),
(515, 5, 4, 6, '4.2', 'Menyajikan hasil analisis tentang interaksi manusia dengan lingkungan dan pengaruhnya terhadap pembangunan sosial, budaya dan ekonomi masyarakat Indonesia\r\n'),
(516, 5, 4, 6, '4.3', 'Menyajikan hasil analisis tentang peran ekonomi dalam upaya menyejahterakan kehidupan masyarakat di bidang sosial dan budaya untuk memperkuat kesatuan dan persatuan bangsa\r\n'),
(517, 5, 4, 7, '4.2', 'Menyanyikan lagu-lagu dalam berbagai tangga nada dengan iringan musik\r\n'),
(518, 5, 4, 7, '4.3', 'Mempraktikkan pola lantai pada gerak tari kreasi daerah\r\n'),
(519, 5, 4, 7, '4.4', 'Membuat karya seni rupa daerah\r\n'),
(543, 5, 3, 4, '3.1', 'Menjelaskan dan melakukan penjumlahan dan pengurangan dua pecahan dengan penyebut berbeda'),
(544, 5, 3, 4, '3.2', 'Menjelaskan dan melakukan perkalian dan pembagian pecahan dan desimal'),
(545, 5, 3, 4, '3.3', 'Menjelaskan perbandingan dua besaran yang berbeda (kecepatan sebagai perbandingan jarak dengan waktu, debit sebagai perbandingan volume dengan waktu)'),
(546, 5, 3, 4, '3.4', 'Menjelaskan skala melalui denah.'),
(547, 5, 3, 4, '3.5', 'Menjelaskan dan menentukan volume bangun ruang dengan menggunakan satuan volume (seperti kubus satuan) serta hubungan pangkat tiga dengan akar pangkat '),
(548, 5, 3, 4, '3.6', 'Menjelaskan dan menemukan jaring-jaring bangun ruang sederhana (kubus dan balok)'),
(549, 5, 3, 4, '3.7', 'Menjelaskan data yang berkaitan dengan peserta didik atau lingkungan sekitar serta cara pengumpulannya'),
(550, 5, 3, 4, '3.8', 'Menjelaskan penyajian data yang berkaitan dengan diri peserta didik dan membandingkan dengan data dari lingkungan sekitar dalam bentuk daftar, tabel, diagram gambar (piktogram), diagram batang, atau diagram garis'),
(551, 5, 4, 4, '4.1', 'Menyelesaikan masalah yang berkaitan dengan penjumlahan dan pengurangan dua pecahan dengan penyebut berbeda'),
(552, 5, 4, 4, '4.2', 'Menyelesaikan masalah yang berkaitan dengan perkalian dan pembagian pecahan dan desimal'),
(553, 5, 4, 4, '4.3', 'Menyelesaikan masalah yang berkaitan dengan perbandingan dua besaran (kecepatan, debit)'),
(554, 5, 4, 4, '4.4', 'Menyelesaikan masalah yang berkaitan dengan skala pada denah'),
(555, 5, 4, 4, '4.5', 'Menyelesaikan masalah yang berkaitan dengan volume bangun ruang dengan menggunakan satuan volume (seperti kubus satuan) melibatkan pangkat tiga dan akar pangkat tiga'),
(556, 5, 4, 4, '4.6', 'Membuat jaring-jaring bangun ruang sederhana (kubus dan balok)'),
(557, 5, 4, 4, '4.7', 'Menganalisis data yang berkaitan dengan diri peserta didik atau lingkungan sekitar'),
(558, 5, 4, 4, '4.8', 'Mengorganisasikan dan menyajikan data yang berkaitan dengan diri  peserta didik dan membandingkan dengan data dari lingkungan sekitar dalam bentuk daftar, tabel, diagram gambar (piktogram), diagram batang, atau garis'),
(559, 5, 3, 4, '3.9', 'Menjelaskan dan melakukan operasi hitung bilangan bulat'),
(560, 5, 4, 4, '4.9', 'Menyelesaikan masalah yang berkaitan dengan operasi hitung bilangan bulat'),
(561, 1, 3, 1, '3.3', 'memahami adanya Allah Swt yang Maha Pengasih dan Maha Penyayang'),
(562, 1, 3, 1, '3.4', 'memahami keesaan Allah Swt berdasarkan pengamatan terhadap dirinya dan mahluk ciptaan-Nya yang dijumpai disekitar rumah dan sekolah'),
(563, 1, 3, 1, '3.11', 'memahami tata cara bersuci'),
(564, 1, 3, 1, '3.13', 'memahami kisah keteladanan Nabi Adam as'),
(565, 1, 3, 1, '3.15', 'memahami kisah keteladanan Nabi Nuh as'),
(566, 1, 3, 1, '3.16', 'memahami kisah keteladanan Nabi Hud as'),
(567, 1, 3, 1, '3.17', 'memahami kisah keteladanan Nabi Muhammad Saw'),
(568, 1, 4, 1, '4.3', 'menunjukan bukti-bukti adanya Allah Swt. yang Maha Pengasih dan Maha Penyayang'),
(569, 1, 4, 1, '4.4', 'menunjukan bukti-bukti keesaan Allah Swt berdasarkan pengamatan terhadap dirinya dan mahluk ciptaan-Nya yang dijumpai disekitar rumah dan sekolah'),
(570, 1, 4, 1, '4.11', 'mempraktikan tata cara bersuci '),
(571, 1, 4, 1, '4.13', 'menceritakan kisah keteladanan Nabi Adam as'),
(572, 1, 4, 1, '4.15', 'menceritakan kisah keteladanan Nabi Nuh as'),
(573, 1, 4, 1, '4.16', 'menceritakan kisah keteladanan Nabi Hud as'),
(574, 1, 4, 1, '4.17', 'menceritakan kisah keteladanan Nabi Muhammad Saw'),
(603, 2, 3, 1, '3.2', 'memahami pesan-pesan pokok Qs. an-Nas dan al-\'Asr'),
(604, 2, 3, 1, '3.3', 'memahami hadis-hadis yang terkait dengan anjuran menuntut ilmu'),
(605, 2, 3, 1, '3.4', 'memahami hadis yang terkait dengan perilaku hidup bersih dan sehat'),
(606, 2, 3, 1, '3.5', 'memahami makna Asmaul Husna; al-Quddus, as-Salam, dan al-Kholiq'),
(607, 2, 3, 1, '3.16', 'memahami makna Allah Maha Pengasih dan Maha Penyayang'),
(608, 2, 4, 1, '4.16', 'menunjukan perilaku kasih sayang sebagai implementasi pemahaman dari makna Allah Maha Pengasih dan Maha Penyayang'),
(631, 4, 3, 1, '3.2', 'memahami Allah itu ada melalui pengamatan terhadap mahluk ciptaan-Nya disekitar rumah dan sekolah'),
(634, 5, 3, 8, '3.1', 'Memahami konsep variasi dan kombinas ipola gerak dasar dalam berbagai permainan atau olah raga tradisional bola besar'),
(636, 5, 4, 8, '4.1', 'Mempraktikkan variasi dan kombinasi pola gerak dasar yang dilandasi konsep gerak dalam berbagai permainan dan atau olah raga tradisional bola besar'),
(671, 4, 3, 3, '3.10', 'Membandingkan watak masing-masing tokoh pada teks fiksi	\r\n'),
(685, 4, 3, 1, '3.3', 'memahami makna asmaul husna; al-Bashir, al-Adl, dan al- Azim'),
(720, 4, 3, 4, '3.1', 'Menjelaskan pecahan-pecahan senilai dengan gambar dan model konkret'),
(722, 4, 3, 4, '3.10', 'Menjelaskan hubungan antar garis (sejajar, berpotongan, berhimpit) menggunakan model konkret'),
(723, 4, 3, 4, '3.11', 'Menjelaskan data diri peserta didik dan lingkungannya yang disajikan dalam bentuk diagram batang'),
(724, 4, 3, 4, '3.7', 'Menjelaskan dan melakukan pembulatan hasil pengukuran panjang dan berat ke satuan terdekat'),
(727, 5, 3, 8, '3.2', 'Memahami konsep variasi dan kombinas ipola gerak dasar dalam berbagai permainan atau olah raga tradisional bola kecil'),
(728, 5, 3, 8, '3.3', 'Memahami konsep variasi dan kombinasi pola gerak dasar dalam atletik nomor lompat, dan lempar melalui permainan/olahraga yang dimodifikasi dan atau olahraga tradisional.'),
(729, 5, 3, 8, '3.4', 'Memahami variasi dan kombinasi pola gerak dasar lokomotor dan non lokomotor untuk membentuk gerakan dasar (sikap dan kuda-kuda) olahraga beladiri.'),
(730, 5, 3, 8, '3.5', 'Memahami konsep aktivitas latihan daya tahan jantung dan paru (cardiorespiratory)untuk pengembangan kebugaran jasmani.'),
(731, 5, 3, 8, '3.6', 'Memahami konsep kombinasi pola gerak dominan statis dan dinamis (melompat, menggantung, mengayun, meniti, mendarat) untuk membentuk keterampilan/ teknik dasar senam menggunakan alat.'),
(733, 5, 3, 8, '3.8', 'Memahami konsep salah satu gaya renang dengan koordinasi yang baik dalam aktivitas air.*'),
(736, 5, 3, 8, '3.7', 'Memahami konsep kombinasi gerak dasar langkah dan ayunan lengan bertema budaya daerah dan nasional mengikuti irama (ketukan) tanpa/dengan musik dalam aktivitas gerak ritmik.'),
(738, 5, 4, 8, '4.2', 'Mempraktikkan variasi dan kombinasi pola gerak dasar yang dilandasi konsep gerak dalam berbagai permainan dan atau olahraga tradisional bola kecil. '),
(739, 5, 4, 8, '4.3', 'Mempraktikkan variasi dan kombinasi pola gerak dasar dalam atletik nomor lompat, dan lempar melalui permainan/olahraga yang dimodifikasi dan atau olahraga tradisional'),
(740, 5, 4, 8, '4.7', 'Mempraktikkan kombinas gerak dasar langkah dan ayunan lengan bertema budaya daerah dan nasional mengikuti irama (ketukan) tanpa/dengan musik dalam aktivitas gerak ritmik'),
(741, 5, 4, 8, '4.8', 'Mempraktikkan salah satu gaya renang dengan koordinasi yang baik dalam aktivitas air.* '),
(747, 5, 4, 8, '4.4', 'Mempraktikkan variasi dan kombinasi pola gerak dasar lokomotor dan non lokomotor untuk membentuk gerakan dasar (sikap dan kuda-kuda) olahraga beladiri.'),
(748, 5, 4, 8, '4.5', 'Mempraktikk aktivitas jantung dan paru (cardiorespiratory) untuk pengembangan kebugaran jasmani.'),
(749, 5, 4, 8, '4.6', 'Mempraktikkan kombinasi pola gerak dominan statis dan dinamis (melompat, menggantung, mengayun, meniti, mendarat) untuk membentuk keterampilan/ teknik dasar senam menggunakan alat'),
(757, 4, 3, 2, '3.4', 'memahami berbagai bentuk keberagaman suku, bangsa, sosial, dan budaya di Indonesia yang terikat perasatuan dan kesatuan.'),
(758, 4, 3, 2, '3.2', 'mengidentifikasi pelaksanaan kewajiban dan hak sebagai warga masyarakat dalam kehidupan sehari-hari.'),
(759, 4, 3, 2, '3.1', 'memahami makna hubungan simbol dengan sila-sila pancasila.'),
(760, 4, 4, 2, '4.2', 'menyajikan hasil identifikasi pelaksanaan kewajiban dan hak sebagai warga masyarakat dalam kehidupan sehari-hari.'),
(761, 4, 3, 4, '3.3', 'menjelaskan dan melakukan penaksiran dari jumlah, selisih, hasil kali, dan hasil bagi dua bilangan cacah maupun pecahan dan desimal'),
(762, 4, 3, 4, '3.8', 'Menganalisis sifat-sifat segi banyak beraturan dan segi banyak tidak beraturan'),
(763, 4, 3, 4, '3.9', 'Menjelaskan dan menentukan keliling dan luas  persegi, persegi panjang, dan segitiga, serta hubungan pangkat dua dengan akar pangkat dua'),
(764, 4, 3, 4, '3.12', 'Menjelaskan dan menentukan ukuran sudut pada bangun datar dalam satuan baku dengan menggunakan busur derajat'),
(765, 4, 3, 4, '3.5', 'Menjelaskan bilangan prima'),
(766, 5, 4, 3, '4.3', 'Menyajikan ringkasan teks penjelasan (eksplanasi) dari media cetak atau elektronik dengan menggunakan kosakata baku dan kalimat efektif secara lisan, tulis, dan visual'),
(767, 5, 3, 3, '3.3', 'Meringkas teks penjelasan (eksplanasi) dari media cetak atau elektronik'),
(768, 5, 3, 5, '3.6', 'Menerapkan konsep perpindahan kalor dalam kehidupan sehari-hari'),
(769, 5, 4, 5, '4.6', 'Melaporkan hasil pengamatan tentang perpindahan kalor'),
(770, 5, 3, 3, '3.5', 'Menggali informasi penting dari teks narasi sejarah yang disajikan secara lisan dan tulis menggunakan aspek: apa, di mana, kapan, siapa, mengapa, dan bagaimana'),
(771, 5, 4, 3, '4.5', 'Memaparkan informasi penting dari teks narasi sejarah menggunakan aspek : apa, di mana, kapan, siapa, mengapa, dan bagaimana serta kosakata baku dalam kalimat efektif'),
(772, 5, 4, 5, '4.7', 'Melaporkan hasil percobaan pengaruh kalor pada benda'),
(773, 5, 3, 5, '3.7', 'Menganalisis pengaruh kalor terhadap perubahan suhu dan wujud benda dalam kehidupan sehari-hari'),
(774, 5, 3, 6, '3.4', 'Mengidentifikasi faktor-faktor penting penyebab penjajahan bangsa Indonesia dan upaya bangsa Indonesia dalam mempertahankan kedaulatannya'),
(775, 5, 4, 6, '4.4', 'Menyajikan identifikasi faktor-faktor penting penyebab penjajahan bangsa Indonesia dan upaya bangsa Indonesia dalam mempertahankan kedaulatannya'),
(776, 5, 4, 3, '4.8', 'Menyajikan kembali peristiwa atau tindakan dengan memperhatikan latar cerita yang terdapat pada teks fiksi'),
(777, 5, 3, 3, '3.8', 'Menguraikan urutan peristiwa atau tindakan dengan memperhatikan latar cerita yang terdapat pada teks fiksi'),
(778, 5, 3, 5, '3.8', 'Menganalisis siklus air dan dampaknya pada peristiwa di bumi serta kelangsungan makhluk hidup'),
(779, 5, 4, 5, '4.8', 'Membuat karya tentang skema berdasarkan informasi dari berbagai sumber'),
(780, 5, 4, 5, '4.9', 'Melaporkan hasil pengamatan sifat-sifat campuran dan komponen penyusunnya dalam kehidupan sehari-hari'),
(781, 5, 3, 5, '3.9', 'Mengelompokkan materi dalam kehidupan sehari-hari berdasarkan komponen penyusunnya (zat tunggal dan campuran)'),
(782, 5, 3, 3, '3.9', 'mencermati penggunaan kalimat efektif dan ejaan dalam surat undangan (ulang tahun, kegiatan sekolah, kenaikan kelas, dll)'),
(783, 5, 4, 3, '4.9', 'membuat surat undangan (ulang tahun, kegiatan sekolah, kenaikan kelas, dll) dengan kalimat efektif dan memperhatikan penggunaan ejaan.'),
(784, 5, 3, 8, '3.9', 'Memahami konsep pemeliharaan diri dan orang lain dari penyakit menular dan tidak menular'),
(785, 5, 3, 8, '3.10', 'Memahami bahaya merokok, minuman keras, dan narkotika, zat-zat aditif (NAPZA) dan obat berbahaya lainnya terhadap kesehatan'),
(786, 5, 4, 8, '4.9', 'Menerapkan konsep pemeliharaan diri dan orang lain dari penyakit menular dan tidak menular'),
(787, 5, 4, 8, '4.10', 'Memaparkan bahaya merokok, meminum minuman keras, dan mengonsumsi narkotika, zat-zat aditif (NAPZA) dan obat berbahaya lainnya terhadap kesehatan tubuh'),
(793, 2, 3, 3, '3.5', 'Mencermati puisi anak dalam bahasa indonesian atau bahasa daerah melalui teks tulis dan lisan.'),
(794, 2, 3, 3, '3.6', ' Mencermati ungkapan permintaan maaf dan tolong  melalui teks tentang budaya santun sebagai gambaran sikap hidup rukun  dalam kemajemukan masyarakat indonesia.'),
(795, 2, 4, 3, '4.5', 'Membacakan teks puisi anak tentang alam dan lingkungan dalam bahasa indonesia dengan lafal , intonasi ,dan ekspresi yang tepat sebagai bentuk ungkapan diri.'),
(796, 2, 4, 3, '4.6 ', 'Menyampaikan ungkapan - ungkapan santun (menggunakan kata  \"maaf\" , \"tolong\" ) untuk hidup rukun dalam kemajemukan.'),
(797, 2, 4, 4, '4.6', 'Melakukan pengukuran panjang ( termasuk jarak ) ,berat , dan waktu dalam satuan baku, yang berkaitan dengan kehidupan sehari-hari.'),
(798, 2, 3, 4, '3.6', 'Menjelaskan dan menentukan panjang ( termasuk jarak ) , berat , dan waktu dalam satuan baku , yang berkaitan dengan kehidupan sehari-hari.'),
(799, 2, 3, 8, '3.5 ', 'Memahami variasi berbagai pola gerak dominan ( bertumpu , bergantung ,keseimbangan ,berpindah /lokomotor , tolakan , putaran , ayunan , melayang , dan mendarat ) dalam aktifitas senam lantai.'),
(800, 2, 4, 8, '4.5', 'Mempraktikan variasi berbagai pola gerak dominan (bertumpu , bergantung ,keseimbangan ,berpindah /lokomotor .tolakan , putaran , ayunan ,melayang , dan mendarat ) dalam aktifitas senam lantai.'),
(801, 1, 3, 2, '3.4', 'mengidentifikasi bentuk kerja sama dalam keberagaman di rumah');
INSERT INTO `kd` (`id_kd`, `kelas`, `aspek`, `mapel`, `kd`, `nama_kd`) VALUES
(802, 2, 3, 3, '3.7', 'Mencermati tulisan tegak bersambung dalam cerita dengan memperhatikan penggunaan huruf kapital (awal kalimat,nama bulan dan hari,nama orang )serta mengenal tanda titik pada kalimat berita dan tanda tanya pada kalimat tanya.'),
(803, 2, 4, 3, '4.7', 'Menulis dengan tulisan tegak bersambung menggunakan huruf kapital ( awal kalimat, nama bulan ,hari, dan nama diri )serta tanda titik pada kalimat berita dan tanda tanya pada kalimat tanya dengan benar.'),
(804, 2, 3, 8, '3.6', 'Memahami penggunaan variasi gerak dasar lokomotor dan non lokomotor sesuai dengan irama ( ketukan ) tanpa / dengan musik dalam aktivitas gerak beriama.'),
(805, 2, 4, 8, '4.6', 'Mempraktikkan penggunaan variasi gerak dasar lokomotor dan non lokomotor sesuai dengan irama (ketukan) tanpa / dengan musik dalam aktivitas gerak berirama.'),
(808, 2, 4, 3, '4.8', 'Menceritakan kembali teks dongen binatang (fabel) yang menggambarkan sikap hidup rukun yang telah dibaca secara nyaring sebagai bentuk ungkapan diri.'),
(809, 2, 4, 3, '4.9', 'Menirukan kata sapaan dalam dongeng secara lisan dan tulis.'),
(810, 2, 3, 3, '3.8', 'Menggali informasi dari dongeng binatang (fabel) tentang sikap hidup rukun dari teks lisan dan tulis dengan tujuan untuk kesenangan.'),
(811, 2, 3, 3, '3.9', 'Menentukan kata sapaan dalam dongeng secara lisan dan tulis.'),
(812, 2, 3, 4, '3.7', 'Menjelaskan pecahan 1/2 ,1/3 ,dan 1/4 menggunakan benda-benda konkret dalam kehidupan sehari-hari.'),
(813, 2, 4, 4, '4.7', 'Menyajikan pecahan 1/2 , 1/3 ,dan 1/4 yang bersesuai dengan bagian dari keseluruhan suatu benda konkret dalam kehidupan sehari-hari.'),
(814, 2, 3, 8, '3.7', 'Memahami prosedur penggunaan gerak dasar lokomotor ,non lokomotor dan manipulatif dalam bentuk permainan , dan menjaga keselamatan diri / orang lain dalam aktivitas air.'),
(815, 2, 4, 8, '4.7 ', ' Memperhatikan penggunaan gerak dasar lokomotor,non lokomotor dan manipulatif dalam bentuk permainan dan menjaga keselamatan diri / orang lain dalam aktivitas air.'),
(832, 1, 3, 1, '3.14', 'Memahami kisah keteladanan Nabi Idris a.s'),
(833, 1, 3, 1, '3.7', 'Memahami makna doa sebelum dan sesudah belajar'),
(834, 1, 3, 1, '3.5', 'Memahami makna al-Asmaul husna; ar-Rohman,ar-Rohim, dan al-Malik'),
(835, 1, 3, 1, '3.6', 'Memahami makna dua kalimat syahadat'),
(836, 1, 3, 1, '3.12', 'Mehamami sholat dan kegiatan agama yang dianutnya di sekitar rumahnya melalui pengamatan'),
(837, 1, 3, 1, '3.8', 'Memahami perilaku hormat dan patuh kepada orang tua dan guru'),
(838, 1, 3, 1, '3.10', 'Memahami makna bersyukur, pemaaf, jujur, dan percaya diri'),
(839, 1, 3, 1, '3.9', 'Memahami berkata yang baik, sopan , dan santun'),
(841, 1, 4, 1, '4.14', 'Menceritakan kisah keteladanan Nabi Idris a.s'),
(842, 1, 4, 1, '4.7', 'Melafalkan doa sebelum dan sesudah belajar dengan benar dan jelas'),
(843, 1, 4, 1, '4.5', 'Melafalkan al Asmaul husna; ar-Rohman, ar-Rohim, dan al-Malik'),
(844, 1, 4, 1, '4.6', 'Melafalkan dua kalimat syahadat dengan benar dan jelas'),
(845, 1, 4, 1, '4.12.1', 'Melaksanakan sholat dan kegiatan agama di sekitar rumahnya melalui pengamatan'),
(846, 1, 4, 1, '4.12.2', 'Mencontohkan kegiatan agama di sekitar rumahnya'),
(847, 1, 4, 1, '4.8', 'Mencontohkan perilaku hormat dan patuh kepada orang tua dan guru'),
(848, 1, 4, 1, '4.10', 'Mencontohkan perilaku bersyukur, pemaaf, jujur, dan percaya diri'),
(849, 1, 4, 1, '4.9', 'Mencontohkan cara berkata yang baik, sopan,dan santun '),
(865, 2, 3, 1, '3.9', 'Memahami doa sebelum dan sesudah wudu'),
(866, 2, 3, 1, '3.11', 'Memahami kisah keteladanan Nabi Sholeh a.s'),
(867, 2, 3, 1, '3.12', 'Memahami kisah keteladanan Nabi Luth a.s'),
(868, 2, 3, 1, '3.14', 'Memahami kisah keteladanan Nabi Ya\'kub a.s'),
(869, 2, 3, 1, '3.7', 'Memahami perilaku  kasih sayang kepada sesama'),
(870, 2, 3, 1, '3.10', 'Memahami tata cara sholat dan bacaannya'),
(871, 2, 3, 1, '3.13', 'Memahami kisah keteladanan Nabi Ishaq a.s'),
(872, 2, 4, 1, '4.9', 'Mempraktikan wudu dan doanya dengan tertib dan benar'),
(873, 2, 4, 1, '4.11', 'Menceritakan kisah keteladanan Nabi Sholeh a.s'),
(874, 2, 4, 1, '4.12', 'Menceritakan kisah keteladanan Nabi Luth a.s'),
(875, 2, 4, 1, '4.14', 'Menceritakan kisah keteladanan Nabi Ya\'kub a.s'),
(876, 2, 4, 1, '4.7', 'Mencontohkan perilaku kasih sayang kepada sesama'),
(877, 2, 4, 1, '4.10', 'Mempraktikan sholat dengan tata cara dan bacaan yang benar '),
(878, 2, 4, 1, '4.13', 'Menceritakan kisah keteladanan Nabi Ishaq a.s '),
(891, 4, 3, 1, '3.4', 'memahami makna iman kepada malaikat-malaikat Allah Swt berdasarkan pengamatan terhadap dirinya dan alam sekitar'),
(892, 4, 3, 1, '3.7', 'Memahami sikap rendah hati'),
(893, 4, 3, 1, '3.8', 'Memahami perilaku hemat'),
(894, 4, 3, 1, '3.12', 'Memahami manfaat gemar membaca'),
(895, 4, 3, 1, '3.13', 'Memahami makna sikap pantang menyerah'),
(896, 4, 3, 1, '3.21', 'Memahami kisah keteladanan Wali Songo'),
(898, 4, 4, 1, '4.7', 'Mencontohkan sikap rendah hati'),
(899, 4, 4, 1, '4.8', 'Mencontohkan perilaku hemat'),
(902, 4, 4, 1, '4.21', 'Menceritakan kisah keteladanan Wali Songo'),
(913, 5, 3, 1, '3.11', 'Memahami pelaksanaan sholat tarawih dan tadarus al-Qur\'an '),
(914, 5, 3, 1, '3.17', 'memahami kisah keteladanan Luqman sebagaimana terdapat dalam al-Qur\'an'),
(915, 5, 4, 1, '4.8', 'Mencontohkan sikap sederhana dalam kehidupan sehari-hari'),
(916, 5, 4, 1, '4.9', 'Mencontohkan sikap ikhlas beramal dalam kehidupan sehari-hari'),
(917, 5, 4, 1, '4.11', 'Mempraktikan tata cara sholat tarawih dan tadarus al-Qur\'an'),
(918, 5, 4, 1, '4.17', 'Menceritakan kisah keteladanan Luqman sebagaimana terdapat dalam al-Qur\'an'),
(919, 4, 3, 2, '3.3', 'menjelaskan manfaat keberagaman karakteristik individu dalam kehidupan sehari-hari'),
(922, 2, 4, 2, '4.4', 'Menceritakan pengalaman melakukan kegiatan yang mencerminkan persatuan dalam keberagaman di sekolah.'),
(923, 2, 3, 3, '3.10', 'Mencermati penggunaan huruf kapital (nama Tuhan , nama orang , nama agama ) ,serta tanda titik dan tanda tanya dalam kalimat yang benar.'),
(924, 2, 4, 3, '4.10', 'Menulis teks dengan menggunakan huruf kapital (nama Tuhan , nama agama , nama orang ) , serta tanda titik dan tanda tanya pada akhir kalimat dengan benar.'),
(925, 2, 4, 8, '4.9', 'Menceritakan cara menjaga kebersihan lingkungan (tempat tidur , rumah , kelas ,lingkungan sekolah ) .'),
(926, 2, 3, 8, '3.9', 'Memahami cara menjaga lingkungan ( tempat tidur ,rumah ,kelas ,lingkungan sekolah ,dan lain-lain ).'),
(927, 4, 4, 2, '4.3', 'mengemukakan manfaat keberagaman karakteristik individu dalam kehidupan sehari-hari'),
(930, 4, 3, 1, '3.15', 'memahami makna ibadah sholat'),
(931, 4, 4, 1, '4.15.1', 'menunjukan contoh makna ibadah sholat'),
(932, 4, 4, 1, '4.15.2', 'menceritakan pengalaman melaksanakan sholat di rumah dan masjid lingkungan sekitar rumah'),
(933, 6, 3, 2, '3.1', 'Menganalisis penerapan nilai-nilai Pancasila dalam kehidupan sehari-hari'),
(934, 6, 3, 2, '3.2', 'Menganalisis pelaksanaan kewajiban, hak, dan tanggung jawab sebagai warga negara beserta dampaknya dalam kehidupan sehari-hari'),
(935, 6, 3, 2, '3.3', 'Menelaah keberagaman sosial, budaya, dan ekonomi masyarakat'),
(936, 6, 3, 2, '3.4', 'Menelaah persatuan dan kesatuan terhadap kehidupan berbangsa dan bernegara beserta dampaknya'),
(937, 6, 4, 2, '4.1', 'Menyajikan hasil analisis pelaksanaan nilai-nilai Pancasila dalam kehidupan sehari-hari'),
(938, 6, 4, 2, '4.2', 'Menyajikan hasil analisis pelaksanaan kewajiban, ha, dan tanggung jawab sebagai warga masyarakat beserta dampaknya dalam kehidupan sehari-hari'),
(939, 6, 4, 2, '4.3', 'Mengampanyekan manfaat keanekaragaman sosial, budaya, dan ekonomi'),
(940, 6, 4, 2, '4.4', 'Menyajikan hasil telaah persatuan dan kesatuan terhadap kehidupan berbangsa dan bernegara beserta dampaknya'),
(941, 6, 3, 3, '3.1', 'Menyimpulkan informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca'),
(942, 6, 3, 3, '3.2', 'Menggali isi teks penjelasan (eksplanasi) ilmiah yang didengar dan dibaca'),
(943, 6, 3, 3, '3.3', 'Menggali isi teks pidato yang didengar dan dibaca'),
(944, 6, 3, 3, '3.4', 'Menggali informasi penting dari buku sejarah menggunakan aspek: apa, di mana, kapan, siapa, mengapa, dan bagaimana'),
(945, 6, 3, 3, '3.5', 'Membandingkan karakteristik teks puisi dan teks prosa'),
(946, 6, 3, 3, '3.6', 'Mencermati petunjuk dan isi teks formulir (pendaftaran, kartu anggota, pengiriman uang melalui bank/kantor pos, daftar riwayat hidup, dsb.)'),
(947, 6, 3, 3, '3.7', 'Memperkirakan informasi yang dapat diperoleh dari teks nonfiksi sebelum membaca (hanya berdasarkan membaca judulnya saja)'),
(948, 6, 3, 3, '3.8', 'Menggali informasi yang terdapat pada teks nonfiksi'),
(949, 6, 3, 3, '3.9', 'Menelusuri tuturan dan tindakan tokoh serta penceritaan penulis dalam teks fiksi'),
(950, 6, 3, 3, '3.10', 'Mengaitkan peristiwa yang dialami tokoh dalam cerita fiksi dengan pengalaman pribadi'),
(951, 6, 3, 5, '3.1', 'Membandingkan cara perkembangbiakan tumbuhan dan hewan'),
(952, 6, 3, 5, '3.2', 'Menghubungkan ciri pubertas pada laki-laki dan perempuan dengan kesehatan reproduksi'),
(953, 6, 3, 5, '3.3', 'Menganalisis cara makhluk hidup menyesuaikan diri dengan lingkungan'),
(954, 6, 3, 5, '3.4', 'Mengidentifikasi komponen-komponen listrik dan fungsinya dalam rangkaian listrik sederhana'),
(955, 6, 3, 5, '3.5', 'Mengidentifikasi sifat-sifat magnet dalam kehidupan sehari-hari'),
(956, 6, 3, 5, '3.6', 'Menjelaskan cara menghasilkan, menyalurkan, dan menghemat energi listrik'),
(957, 6, 3, 5, '3.7', 'Menjelaskan sistem tata surya dan karakteristik anggota tata surya'),
(958, 6, 3, 5, '3.8', 'Menjelaskan peristiwa rotasi dan revolusi bumi serta terjadinya gerhana bulan dan gerhana matahari'),
(959, 6, 3, 6, '3.1', 'Mengidentifikasi karakteristik geografis dan kehidupan sosial budaya, ekonomi, politik di wilayah ASEAN. '),
(960, 6, 3, 6, '3.2', 'Menganalisis perubahan sosial budaya dalam rangka modernisasi bangsa Indonesia.'),
(961, 6, 3, 6, '3.3', 'Menganalisis posisi dan peran Indonesia dalam kerja sama di bidang ekonomi, politik, sosial, budaya, teknologi, dan pendidikan dalam lingkup ASEAN.'),
(962, 6, 3, 6, '3.4', 'Memahami makna proklamasi kemerdekaan, upaya mempertahankan kemerdekaan, dan upaya mengembangkan kehidupan kebangsaan yang sejahtera.'),
(963, 6, 3, 7, '3.1', 'memahami reklame'),
(964, 6, 3, 7, '3.2', 'memahami interval nada'),
(965, 6, 3, 7, '3.3', 'memahami penampilan tari kreasi daerah'),
(966, 6, 3, 7, '3.4', 'memahami patung'),
(967, 6, 3, 8, '3.1', 'Memahami variasi dan kombinasi gerak dasar lokomotor, non-lokomotor, dan manipulatif dengan kontrol yang baik dalam permainan bola besar sederhana dan atau tradisional'),
(968, 6, 3, 8, '3.2', 'Memahami variasi dan kombinasi gerak dasar lokomotor, non-lokomotor, dan manipulatif dengan kontrol yang baik dalam permainan bola kecil sederhana dan atau tradisional'),
(969, 6, 3, 8, '3.3', 'Memahami variasi dan kombinasi gerak dasar jalan, lari, lompat, dan lempar dengan kontrol yang baik melalui permainan dan atau olahraga tradisional'),
(970, 6, 3, 8, '3.4', 'Memahami variasi dan kombinasi gerak dasar lokomotor, non lokomotor, dan manipulatif untuk membentuk gerak dasar seni beladiri'),
(973, 3, 3, 2, '3.1', 'Mengidentifikasi hubungan antara simbol dan sila-sila Pancasila dalam lambang negara â€œGaruda Pancasilaâ€'),
(974, 3, 3, 2, '3.2', 'Mengidentifikasi aturan dan tata tertib yang berlaku di sekolah'),
(975, 3, 3, 2, '3.3', 'Mengidentifikasi jenis-jenis keberagaman karakteristik individu di sekolah'),
(976, 3, 3, 2, '3.4', 'Memahami makna bersatu dalam keberagaman di sekolah'),
(977, 3, 4, 2, '4.1', 'Menjelaskan hubungan gambar pada lambang Negara dengan sila-sila Pancasila'),
(978, 3, 4, 2, '4.2', 'Menceritakan kegiatan sesuai aturan dan tata tertib yang berlaku di sekolah'),
(979, 3, 4, 2, '4.3', 'Mengelompokkan jenis-jenis keberagaman karakteristik individu di sekolah'),
(980, 3, 4, 2, '4.4', 'Menceritakan pengalaman melakukan kegiatan yang mencerminkan persatuan dalam keberagaman di sekolah'),
(1142, 2, 3, 1, '3.15', 'Memahami kisah keteladanan Nabi Muhammad Saw'),
(1143, 2, 3, 1, '3.8', 'Memahami sikap kerja sama dan saling tolong menolong'),
(1144, 2, 3, 1, '3.6', 'Memahami makna doa sebelum dan sesudah makan'),
(1145, 2, 4, 1, '4.15', 'Menceritakan kisah keteladanan Nabi Muhammad Saw'),
(1146, 2, 4, 1, '4.8', 'Mencontohkan sikap kerja sama dan saling tolong menolong'),
(1147, 2, 4, 1, '4.6', 'Melafalkan doa sebelum dan sesudah makan'),
(1148, 3, 3, 1, '3.14', 'Memahami kisah keteladanan Nabi Muhammad Saw'),
(1149, 3, 3, 1, '3.2', 'Memahami hadist yang terkait dengan perilaku mandiri, percaya diri, dan bertanggung jawab'),
(1150, 3, 3, 1, '3.1', 'Memahami makna Qs. an-Nashr dan al-Kautsar'),
(1151, 3, 3, 1, '3.3', 'Memahami keesaan Allah yang Maha Pencipta berdasarkan pengamatan terhadap dirinya dan mahluk ciptaan-Nya yang dijumpai disekitar rumah dan sekolah'),
(1152, 3, 3, 1, '3.4', 'Memahami makna asmaul husna; al-Wahhab, al-\'Alim, dan as-Sami\''),
(1153, 3, 3, 1, '3.5', 'Memahami perilaku tawaduk, ikhlas, dan mohon pertolongan'),
(1154, 3, 3, 1, '3.6', 'Memahami sikap peduli terhadap sesama sebagai implementasi pemahaman Qs. al-Kautsar'),
(1155, 3, 3, 1, '3.8', 'Memahami makna sholat sebagai wujud dari pemahaman Qs. al-Kautsar'),
(1156, 3, 3, 1, '3.10', 'Memahami hikmah ibadah sholat melalui pengamatan dan pengalaman  di rumah dan sekolah'),
(1157, 3, 3, 1, '3.11', 'Memahami kisah keteladanan Nabi Yusuf as'),
(1158, 3, 3, 1, '3.12', 'Memahami kisah keteladanan Nabi Syu\'aib as'),
(1159, 3, 4, 1, '4.14', 'Menceritakan kisah keteladanan Nabi Muhammad Saw'),
(1160, 3, 4, 1, '4.2', 'Mencontohkan perilaku mandiri. percaya diri, dan bertanggung jawab sebagai implementasi makna hadist yang terkandung'),
(1161, 3, 4, 1, '4.1.1', 'Membaca kalimat-kalimat dalam Qs. an-Nashr dan al-Kautsar dengan benar'),
(1162, 3, 4, 1, '4.1.2', 'Menulis kalilmat-kalimat dalam Qs. an-Nashr dan al-Kautsar dengan benar'),
(1163, 3, 4, 1, '4.1.3', 'Menunjukan hafalan Qs. an-Nashr dan al-Kautsar dengan lancar'),
(1164, 3, 4, 1, '4.5', 'Mencontohkan perilaku tawaduk, ikhlas, dan mohon pertolongan'),
(1165, 3, 4, 1, '4.6', 'Mencontohkan perilaku peduli terhadap sesama sebagai implementasi pemahaman Qs. al-Kautsar'),
(1166, 3, 4, 1, '4.8', 'Menunjukan contoh makna sholat sebagai wujud dari pemahaman Qs. al- Kautsar'),
(1167, 3, 4, 1, '4.10', 'Menceritakan pengalaman hikmah pelaksanaan ibadah sholat di rumah dan sekolah'),
(1168, 3, 4, 1, '4.11', 'Menceritakan kisah keteladanan Nabi Yusuf as'),
(1169, 3, 4, 1, '4.12', 'Menceritakan kisah keteladanan Nabi Syu\'aib as'),
(1170, 3, 4, 1, '4.3', 'Melakukan pengamatan terhadap diri dan mahluk ciptaan Allah yang dijumpai disekitar rumah dan sekolah sebagai implementasi iman terhadap keesaan Allah Yang Maha Pencipta'),
(1171, 3, 4, 1, '4.4', 'Membaca asmaul husna; al-Wahhab, al \'Alim dan as-Sami\' dengan jelas dan benar'),
(1172, 3, 3, 3, '3.4', 'Mencermati kosakata dalam teks tentang konsep ciri-ciri, kebutuhan (makanan dan tempat hidup), pertumbuhan, dan perkembangan makhluk hidup yang ada di lingkungan setempat yang disajikan dalam bentuk lisan, tulis, visual, dan/atau eksplorasi lingkungan.'),
(1173, 3, 4, 3, '4.4', 'Menyajikan laporan tentang konsep ciri-ciri, kebutuhan (makanan dan tempat hidup), pertumbuhan, dan perkembangan makhluk hidup yang ada di lingkungan setempat secara tertulis menggunakan kosakata baku dalam kalimat efektif.'),
(1174, 3, 3, 4, '3.1', 'Menjelaskan sifat-sifat operasi hitung pada\r\nbilangan cacah.'),
(1175, 3, 4, 4, '4.1', 'Menyelesaikan masalah yang melibatkan\r\npenggunaan sifat-sifat operasi hitung pada bilangan cacah.'),
(1176, 3, 3, 7, '3.1', 'Mengetahui unsur-unsur seni rupa dalam karya\r\ndekoratif.'),
(1177, 3, 3, 7, '3.2', 'Mengetahui bentuk dan variasi pola irama dalam\r\nlagu.'),
(1178, 3, 3, 7, '3.3', 'Mengetahui dinamika gerak tari.'),
(1179, 3, 4, 7, '4.1', 'Membuat karya dekoratif.'),
(1180, 3, 3, 7, '3.4', 'Mengetahui teknik potong, lipat, dan sambung.'),
(1181, 3, 4, 7, '4.2', 'Menampilkan bentuk dan variasi irama melalui lagu.'),
(1182, 3, 4, 7, '4.3', 'Meragakan dinamika gerak tari.'),
(1183, 3, 4, 7, '4.4', 'Membuat karya dengan teknik potong, lipat, dan\r\nsambung.'),
(1184, 3, 3, 8, '3.1', 'Memahami kombinasi gerak dasar lokomotor\r\nsesuai dengan konsep tubuh, ruang, usaha, dan\r\nketerhubungan dalam berbagai bentuk permainan\r\nsederhana dan atau tradisional.'),
(1185, 3, 4, 8, '4.1', 'Mempraktikkan kombinasi gerak dasar lokomotor\r\nsesuai dengan konsep tubuh, ruang, usaha, dan\r\nketerhubungan dalam berbagai bentuk permainan\r\nsederhana dan atau tradisional.'),
(1186, 3, 3, 3, '3.5', 'Menggali informasi tentang cara-cara perawatan tumbuhan dan hewan melalui wawancara dan/atau eksplorasi lingkungan. '),
(1187, 3, 3, 3, '3.8', 'Menguraikan pesan dalam dongeng yang disajikan secara lisan, tulis, dan visual dengan tujuan untuk kesenangan.'),
(1188, 3, 4, 3, '4.5', 'Menyajikan hasil wawancara tentang cara-cara perawatan tumbuhan dan hewan dalam bentuk tulis dan visual menggunakan kosa kata baku dan kalimat efektif '),
(1189, 3, 4, 3, '4.8', 'Memeragakan pesan dalam dongeng sebagai bentuk ungkapan diri menggunakan kosa kata baku dan kalimat efektif .'),
(1190, 3, 3, 4, '3.2', 'Menjelaskan bilangan cacah dan pecahan sederhana (seperti 1/2, 1/3, dan 1/4)   yang disajikan pada garis bilangan .'),
(1191, 3, 4, 4, '4.2', 'Menggunakan penyajian bilangan cacah dan pecahan sederhana (seperti 1/2, 1/3, Â¼ dan ) yang disajikan pada garis bilangan.'),
(1192, 5, 3, 9, '3.1', 'Mengumpulkan informasi dari teks deskripsi tentang wirausaha yang ada dilingkungan sekitar.'),
(1193, 5, 3, 9, '3.2', 'Menggali informasi dalam teks guneman (percakapan) baik guneman biasa maupun badekan (tebak-tebakan) tentang kehidupan sehari-hari dalam bentuk undak-usuk (tingkatan berbahasa) ngoko/bagongan dan atau krama/bebasan.'),
(1194, 5, 3, 9, '3.3', 'Memahami sistematika penulisan surat pribadi berupa undangan dan informasi.'),
(1195, 5, 3, 9, '3.4', 'Mengidentifikasi cerita khas daerah (berupa dongeng satoan (fabel), crita guyon (anekdot), dan babad tentang persahabatan dalam khaanah Indramayu dalam undak-usuk (tingkatan bahasa) ngoko/bagongan dan atau krama/bebasan.'),
(1196, 5, 3, 9, '3.5', 'Mengidentifikasi kata dengan sandangan swara (berupa sandangan suku dan wulu) dalam aksara carakan (hanacaraka).'),
(1197, 5, 3, 9, '3.6', 'Mencermati lagu daerah Indramayu berjenis tembang anyar/kiser gancang.'),
(1198, 5, 3, 9, '3.7', 'Menganalisis informasi yang terkandung dalam teks eksposisi tentang pentingnya menjaga kesehatan.'),
(1199, 5, 3, 9, '3.8', 'Mengidentifikasi teks sastra daerah Indramayu (berupa parikan, guritan/puisi, dan pribahasa/peribahasa) tentang nasihat.'),
(1200, 5, 4, 9, '4.1', 'Menyampaikan informasi secara lisan/tulis tentang wirausaha yang ada dilingkungan sekitar.'),
(1201, 5, 4, 9, '4.2', 'Menyajikan teks guneman (percakapan) baik guneman biasa maupun badekan (tebak-tebakan) tentang kehidupan sehari-hari dalan undakusuk (tingkatan berbahasa) ngoko/bagongan dan atau krama/bebasan.'),
(1202, 5, 4, 9, '4.3', 'Menulis surat pribadi sesuai dengan sistematika penulisan berupa undangan dan informasi.'),
(1203, 5, 4, 9, '4.4', 'Menyajikan cerita khas daerah berupa dongeng satoan (fabel), crita guyon (anekdot), dan babad secara lisan/tulis tentang persahabatan dalam undak-usuk (tingkatan bahasa) ngoko/bagongan dan atau krama/bebasan.'),
(1204, 5, 4, 9, '4.5', 'Menulis kata dengan sandangan swara (berupa suku dan wulu) dalam aksara carakan (hanacaraka).'),
(1205, 5, 4, 9, '4.6', 'Menyajikan teks lagu daerah Indramayu berjenis tembang anyar/kiser gancang secara teks dan lagu.'),
(1206, 5, 4, 9, '4.7', 'Menyusun teks berisi informasi tentang pentingnya menjaga kesehatan.'),
(1207, 5, 4, 9, '4.8', 'Menyampaikan makna/isi teks sastra daerah Indramayu (berupa parikan, guritan/puisi, dan pribahasa/peribahasa) tentang nasihat.'),
(1216, 1, 3, 9, '3.1', 'Memahami teks deskripsi pendek dalam undak-usuk (tingkatan berbahasa ) ngoko/bagongan dan atau krama/bebasan tentang diriku,nama anggota tubuhku, nama bilangan, dan nama warna.'),
(1217, 1, 3, 9, '3.2', 'Memahami teks tembang dolanan ( lagu permainan anak-anak dalam bahasa indramayu ) tentang persahabatan, kesenangan, dan tebak-tebakan.'),
(1218, 1, 3, 9, '3.3', 'Memahami teks narasi pendek (10-15 kalimat ) dalam undak-usuk ( tingkatan berbahasa ) ngoko/bagongang dan atau krama/bebasan tentang kegiatanku sehari-hari (di rumah,di lingkungan sekitar, dan di sekolah ).'),
(1219, 1, 3, 9, '3.4', 'Mengidentifikasi dongeng dari daerah Indramayu,baik berupa dongeng manusia maupun dongeng satoan (fabel ).'),
(1220, 1, 4, 9, '4.1', 'Menuliskan kembali isi teks deskripsi pendek dalam undak-usuk (tingkatan berbahasa) ngoko/bagongan dan atau krama/bebasan tentang diriku, nama anggota tubuhku,nama bilangan dan nama warna.'),
(1221, 1, 4, 9, '4.2', 'Memperagakan tembang dolanan ( lagu permainan anak-anak dalam bahasa Indramayu ) tentang persahabatan, kesenangan, dan tebak-tebakan.'),
(1222, 1, 4, 9, '4.3', 'Menceritakan teks narasi pendek (10-15 kalimat) dalam undak-usuk (tingkatan berbahasa ) ngoko/bagongan dan atau krama/bebasan tentang kegiatanku sehari-hari ( di rumah,di lingkungan sekitar,dan di sekolah ).'),
(1223, 1, 4, 9, '4.4', 'Menceritakan secara sederhana dongeng dari daerah Indramayu,baik dongeng manusia maupun dongen satoan (fabel).'),
(1224, 4, 3, 9, '3.1', 'Memahami teks tembang macapat berupa pupuh pucung sesuai paugeran.'),
(1225, 4, 3, 9, '3.2', 'Mengidentifikasi pokok pikiran teks narasi tentang kepedulian terhadap mahluk hidup dalam undak usuk'),
(1226, 4, 3, 9, '3.3', 'Mencermati teks deskripsi tentang berbagai jenis pekerjaan atau profesi dalam undak usuk'),
(1227, 4, 3, 9, '3.4', 'Mengidentifikasi urutan abjad aksara carakan, ngegena sebagai penghargaan atas jasa aji saka penemu kasara carakan '),
(1228, 4, 3, 9, '3.5', 'Mencermati isi teks poster atau brosur sederhana tentang hemat energi dalam undak usuk '),
(1229, 4, 3, 9, '3.6', 'Mengidentifikasi teks parikan rong wanda dan patang wanda sesuai paugeran tentang indahnya negeriku'),
(1230, 4, 3, 9, '3.7', 'Memahai teks eksposisi tentang makanan has indramayu dalam undak usuk '),
(1231, 4, 3, 9, '3.8', 'Mengidentifikasi unsur intrinsik guritan pada unsur diksi, kata nyata purwakanti, dan amanat'),
(1232, 4, 4, 9, '4.1', 'Menjelaskan kembali paugeran / patokan teks tembang macapat berupa pupuh pucung tentang kebersamaan '),
(1233, 4, 4, 9, '4.2', 'Menulikan pokok pikiran dari teks narasi tentang kepedulian terhadap mahluk hidup dalam undak usuk '),
(1234, 4, 4, 9, '4.3', 'Menulis teks deskripsi tentang berbagai jenis pekerjaan atau profesi dalam undak usuk '),
(1235, 4, 4, 9, '4.4', 'Menulisurutan abjad aksara carakan, nglegena sebagai penghargaan atas jasa aji saka penemu aksara carakan'),
(1236, 4, 4, 9, '4.5', 'Membuat teks poster atau brosur sederhana tentang hemat energi dalam undak usuk '),
(1237, 4, 4, 9, '4.6', 'Membuat teks parikan, rong wanda patang wanda, patang wanda sesuai paugeran tentang indahnya negeriku'),
(1238, 4, 4, 9, '4.7', 'Menulis paragraf tentang makanan khas indramayu dalam undak usuk '),
(1239, 4, 4, 9, '4.8', 'Menyajikan teks guritan yang dilengkapi dengan unsur diksi, katanyata, purwakanti dan amanat'),
(1240, 6, 4, 3, '4.1', 'Menyajikan simpulan secara lisan dan tulis dari teks laporan hasil pengamatan atau  wawancara yang diperkuat oleh bukti'),
(1241, 6, 4, 3, '4.10', 'Menyajikan hasil pengaitan peristiwa yang  dialami tokoh dalam cerita fiksi dengan pengalaman pribadi secara lisan, tulis, dan visual '),
(1242, 6, 4, 3, '4.2', 'Menyajikan hasil penggalian informasi  dari teks penjelasan (eksplanasi) ilmiah secara lisan, tulis, dan visual dengan menggunakan kosakata baku dan kalimat efektif'),
(1243, 6, 4, 3, '4.3', 'Menyampaikan pidato hasil karya pribadi dengan menggunakan kosakata baku dan kalimat efektif sebagai bentuk ungkapan diri '),
(1244, 6, 4, 3, '4.4', 'Memaparkan informasi penting dari buku sejarah secara lisan, tulis, dan visual dengan menggunakan aspek: apa, di mana, kapan, siapa, mengapa, dan bagaimana serta memperhatikan penggunaan kosakata baku dan kalimat efektif'),
(1245, 6, 4, 3, '4.5', 'Mengubah teks puisi ke dalam teks prosa dengan tetap memperhatikan makna isi teks puisi '),
(1246, 6, 4, 3, '4.6', 'Mengisi teks formulir (pendaftaran, kartu anggota, pengiriman uang melalui bank/kantor pos,  daftar riwayat hidup, dll.) sesuai petunjuk pengisiannya'),
(1247, 6, 4, 3, '4.7', 'Menyampaikan kemungkinan informasi yang diperoleh berdasarkan membaca judul teks nonfiksi secara lisan, tulis, dan visual '),
(1248, 6, 4, 3, '4.8', 'Menyampaikan hasil membandingkan informasi yang diharapkan dengan informasi yang diperoleh setelah membaca teks nonfiksi secara lisan, tulis, dan visual '),
(1249, 6, 4, 3, '4.9', 'Menyampaikan penjelasan tentang tuturan dan tindakan tokoh serta penceritaan penulis dalam teks fiksi secara lisan, tulis, dan visual'),
(1250, 6, 3, 4, '3.1', 'Menjelaskan bilangan bulat negatif (termasuk menggunakan garis bilangan)'),
(1251, 6, 3, 4, '3.2', 'Menjelaskan dan melakukan operasi penjumlahan, pengurangan, perkalian, dan pembagian yang melibatkan bilangan bulat negatif'),
(1252, 6, 3, 4, '3.3', 'Menjelaskan dan melakukan operasi hitung campuran yang melibatkan bilangan cacah, pecahan dan/atau desimal dalam berbagai bentuk sesuai urutan operasi'),
(1253, 6, 3, 4, '3.4', 'Menjelaskan titik pusat, jari-jari, diameter, busur, tali busur, tembereng, dan juring'),
(1254, 6, 3, 4, '3.5', 'Menjelaskan taksiran keliling dan luas lingkaran'),
(1255, 6, 3, 4, '3.6', 'Membandingkan prisma, tabung, limas, kerucut, dan bola.'),
(1256, 6, 3, 4, '3.7', 'Menjelaskan bangun ruang yang merupakan gabungan dari beberapa bangun ruang, serta luas permukaan dan volumenya'),
(1257, 6, 3, 4, '3.8', 'Menjelaskan dan membandingkan modus, median, dan mean dari data tunggal untuk menentukan nilai mana yang paling tepat mewakili data'),
(1258, 6, 4, 4, '4.1', 'Menggunakan konsep bilangan bulat negatif (termasuk mengggunakan garis bilangan) untuk menyatakan situasi sehari-hari'),
(1259, 6, 4, 4, '4.2', 'Menyelesaikan masalah yang berkaitan dengan operasi penjumlahan, pengurangan, perkalian, dan pembagian yang melibatkan bilangan bulat negatif dalam kehidupan sehari-hari'),
(1260, 6, 4, 4, '4.3', 'Menyelesaikan masalah yang berkaitan operasi hitung campuran yang melibatkan bilangan cacah, pecahan dan/atau desimal dalam berbagai bentuk sesuai urutan operasi'),
(1261, 6, 4, 4, '4.4', 'Mengidentifikasi titik pusat, jari-jari, diameter, busur, tali busur, tembereng, dan juring'),
(1262, 6, 4, 4, '4.5', 'Menaksir keliling dan luas lingkaran serta menggunakannya untuk menyelesaikan masalah'),
(1263, 6, 4, 4, '4.6', 'Mengidentifikasi prisma, tabung, limas, kerucut, dan bola'),
(1264, 6, 4, 4, '4.7', 'Mengidentifikasi bangun ruang yang merupakan gabungan dari beberapa bangun ruang, serta luas permukaan dan volumenya'),
(1265, 6, 4, 4, '4.8', 'Menyelesaikan masalah yang berkaitan dengan modus, median, dan mean dari data tunggal dalam penyelesaian masalah'),
(1266, 6, 4, 5, '4.1', 'Menyajikan karya tentang perkembangangbiakan tumbuhan'),
(1267, 6, 4, 5, '4.2', 'Menyajikan karya tentang cara menyikapi ciri-ciri pubertas yang dialami'),
(1268, 6, 4, 5, '4.3', 'Menyajikan karya tentang cara makhluk hidup menyesuaikan diri dengan lingkungannya, sebagai hasil penelusuran berbagai sumber'),
(1269, 6, 4, 5, '4.4', 'Melakukan percobaan rangkaian listrik sederhana secara seri dan paralel'),
(1270, 6, 4, 5, '4.5', 'Membuat laporan hasil percobaan tentang sifat-sifat magnet dan penerapannya dalam kehidupan sehari-hari'),
(1271, 6, 4, 5, '4.6', 'Menyajikan karya tentang berbagai cara melakukan penghematan energi dan usulan sumber alternatif energi listrik'),
(1272, 6, 4, 5, '4.7', 'Membuat model sistem tata surya'),
(1273, 6, 4, 5, '4.8', 'Membuat model gerhana bulan dan gerhana matahari'),
(1274, 6, 4, 6, '4.1', 'Menyajikan hasil identifikasi karakteristik geografis dan kehidupan sosial budaya, ekonomi, dan politik di wilayah ASEAN. '),
(1275, 6, 4, 6, '4.2', 'Menyajikan hasil analisis mengenai perubahan sosial budaya dalam rangka modernisasi bangsa Indonesia. '),
(1276, 6, 4, 6, '4.3', 'Menyajikan hasil analisis tentang posisi dan peran Indonesia dalam kerja sama di bidang ekonomi, politik, sosial, budaya, teknologi, dan pendidikan dalam lingkup ASEAN. '),
(1277, 6, 4, 6, '4.4', 'Menyajikan laporan tentang makna proklamasi kemerdekaan, upaya mempertahankan kemerdekaan, dan upaya mengembangkan kehidupan kebangsaan yang sejahtera.'),
(1278, 6, 4, 7, '4.1', 'membuat reklame'),
(1279, 6, 4, 7, '4.2', 'memainkan interval nada melalui lagu dan alat musik'),
(1280, 6, 4, 7, '4.3', 'menampilkan tari kreasi daerah'),
(1281, 6, 4, 7, '4.4', 'membuat patung'),
(1282, 6, 3, 8, '3.5', 'Memahami latihan kebugaran jasmani dan pengukuran tingkat kebugaran jasmani pribadi secara sederhana (contoh: menghitung denyut nadi, menghitung kemampuan melakukan push up, menghitung kelenturan tungkai)'),
(1283, 6, 3, 8, '3.6', 'Memahami rangkaian tiga pola gerak dominan (bertumpu, bergantung, keseimbangan, berpindah/lokomotor, tolakan, putaran, ayunan, melayang, dan mendarat) dengan konsisten, tepat dan terkontrol dalam aktivitas senam'),
(1284, 6, 3, 8, '3.7', 'Memahami penggunaan variasi dan kombinasi gerak dasar rangkaian langkah dan ayunan lengan mengikuti irama (ketukan) tanpa/dengan musik dalam aktivitas gerak berirama'),
(1285, 6, 3, 8, '3.8', 'Memahami keterampilan salah satu gaya renang dan dasar-dasar penyelamatan diri'),
(1286, 6, 3, 8, '3.9', 'Memahami perlunya pemeliharaan kebersihan alat reproduksi'),
(1287, 6, 4, 8, '4.1', 'Mempraktikkan variasi dan kombinasi gerak dasar lokomotor, non-lokomotor, dan manipulatif dengan kontrol yang baik dalam permainan bola besar sederhana dan atau tradisiona'),
(1288, 6, 4, 8, '4.2', 'Mempraktikkan variasi dan kombinasi gerak dasar lokomotor, non-lokomotor, dan manipulatif dengan kontrol yang baik dalam permainan bola kecil sederhana dan atau tradisional'),
(1289, 6, 4, 8, '4.3', 'Mempraktikkan variasi dan kombinasi gerak dasar jalan, lari, lompat, dan lempar dengan kontrol yang baik melalui permainan dan atau olahraga tradisional'),
(1290, 6, 4, 8, '4.4', 'Mempraktikkan variasi dan kombinasi gerak dasar lokomotor, non lokomotor, dan manipulatif untuk membentuk gerak dasar seni beladiri'),
(1291, 6, 4, 8, '4.5', 'Mempratikkan latihan kebugaran jasmani dan pengukuran tingkat kebugaran jasmani pribadi secara sederhana (contoh: menghitung denyut nadi, menghitung kemampuan melakukan push up, menghitung kelenturan tungkai)'),
(1292, 6, 4, 8, '4.6', 'Mempraktikkan rangkaian tiga pola gerak dominan (bertumpu, bergantung, keseimbangan, berpindah/lokomotor, tolakan, putaran, ayunan, melayang, dan mendarat) dengan konsisten, tepat dan terkontrol dalam aktivitas senam'),
(1293, 6, 4, 8, '4.7', 'Mempraktikkan penggunaan variasi dan kombinasi gerak dasar rangkaian langkah dan ayunan lengan mengikuti irama (ketukan) tanpa/dengan musik dalam aktivitas gerak berirama'),
(1294, 6, 4, 8, '4.8', 'Mempraktikkan keterampilan salah satu gaya renang dan dasar-dasar penyelamatan diri'),
(1295, 6, 4, 8, '4.9', 'Memaparkan perlunya pemeliharaan kebersihan alat reproduksi'),
(1296, 6, 3, 9, '3.1', 'Mencermati teks narasi tentang kebanggaan terhadai Indramayu dalam undak - usuk (tingkatan berbahasa) ngoko/bagingan dan atau krama/bebasan'),
(1297, 6, 3, 9, '3.2', 'Menyimak teks lagu daerah (berjenis tembang dolanan, tembang anyar/kiser gancang, dan tembang ,macapat pupuh kinanti) tentang kesatuan dalam perbedaan'),
(1298, 6, 3, 9, '3.3', 'mengidentifikasi kata yang memiliki sandangan suara (berupa sandangan suku, wulu, taling, taling tarung, pepet, dalam aksara tarakan (Hanacaraka).'),
(1299, 6, 3, 9, '3.4', 'mengidentifikasi teks sastra daerah indramayu parikan (Pantun), pribasa, (peribahasa), wangsalan dan guritan (Puisi berbahasa Indramayu)'),
(1300, 6, 3, 9, '3.5', 'memahami teks pidato yang bermuatan unsur-unsur sastra Indramayu berupa parikan (Pantun), Pribasa (Peribahasa), dan wangsalan.'),
(1301, 6, 3, 9, '3.6', 'mengidentifikasi teks deskripsi tentang gegedug/gegeden (tokoh) dalam hasanah Indramayu dalam undak-usuk (tingkatan berbahasa) ngoko/bagongan dan atau krama/bebasan'),
(1302, 6, 3, 9, '3.7', 'mengidentifikasi kata yang memiliki sandangan panyigeg wanda/penanda konsonan mati (berupa layar, cecek, wignyan, dan pangkon) dalam aksara carakan (Hanacaraka).'),
(1303, 6, 3, 9, '3.8', 'Mengidentifikasi cerita khas daerah berupa dongeng satoan (Fabel, cerita guyon (Anekdot), babad, dan cerita wayang secara lisan/tulis dalm undak-usuk (tingkatan berbahasa) ngoko/bagongan dan atau krama/bebasan.'),
(1304, 6, 4, 9, '4.1', 'menulis teks narasi tentang kebanggaan terhadap Indramayu dalam undak-usuk (tingkatan berbahasa) ngoko/bagongan dan atau krama/bebasan.'),
(1305, 6, 4, 9, '4.2', 'menyajikan lagu daerah (berjenis tembang dolanan/tembang anyar/kiser gancang, dan tembang macapat pupuh kinanti) secara teks dan lagu tentang kesatuan dalam perbedaan.'),
(1306, 6, 4, 9, '4.3', 'menulis kata dengan sandangan suku, wuluh, taling tarung, pepet, dan pangkon) dalam aksara carakat (Hanacaraka).'),
(1307, 6, 4, 9, '4.4', 'menyampaikan isi/makna teks sastra daerah indramayu berupa parikan (Pantun), pribasa (peribahasa), wangsalan dan guritan (Puisi berbahasa Indramayu).'),
(1308, 6, 4, 9, '4.5', 'menayjikan teks pidato secara lisan/tulis yang bermuatan unsur-unsur sastra Indramayu berupa parikan (Pantun), pribasa (peribahasa), dan wangsalan.'),
(1309, 6, 4, 9, '4.6', 'menyampaikan hasil identifikasi dari teks narasi tentang gegedug/gegeden (Tokoh) dalam hasanah Indramayu dalm undak-usuk (Tingkatan berbahasa ngoko/bagongan dan atau krama/ bebasan.'),
(1310, 6, 4, 9, '4.7', 'menulis kata yang memiliki sandangan panyiget wanda/penanda konsonan mati (berupa layar, cecek, wignyan, dan pangkon) dalam aksara carakat (Hanacaraka)'),
(1311, 6, 4, 9, '4.8', 'menyajikan cerita khas daerah berupa dongeng satoan (Fabel), cerita guyon (anekdot), babad, dan cerita wayang secara lisan/tulis dalam undak-usuk (tingkatan berbahasa) ngoko/bagongan dan atau krama/bebasan.'),
(1312, 5, 3, 11, '3.1', 'Menjelaskan sikap dan tindakan yang menunjukkan kecermatan dalam menjalankan/melakukan sesuatu, penuh minat dan kehatihatian agar tidak terjadi kesalahan.'),
(1313, 5, 3, 11, '3.2', 'Mengidentifikasi sikap dan perilaku yang mencerminkan adanya kesediaan dan keikhlasan dalam memberikan sesuatu/membantu orang lain tanpa mengharapkan imbalan.'),
(1314, 5, 3, 11, '3.3', 'Menjelaskan cara berfikir dan bertindak dan berwawasan yang menempatkan kepentingan bangsa dan negara diatas kepentingan diri dan kelompoknya.'),
(1315, 5, 3, 11, '3.4. ', 'Menjelaskan sikap dan tindakan yang dapat membangun kesadaran yang bersifat membina, membangun dan memperbaiki sehingga kita tidak tenggelam dalam situasi pesimis dan ketakutan yang tidak beralasan.    '),
(1316, 5, 3, 11, '3.5', 'Menjelaskan cara berfikir dan melakukan sesuatu untuk menghasilkan cara atau hasil baru dari sesuatu yang telah dimiliki. '),
(1317, 5, 3, 11, '3.6', 'Mengidentifikasi tindakan yang menunjukkan pentingnya melakukan kegiatan yang bermanfaat dalam memanfaatkan waktu, tidak berleha-leha dan selalu menaati jadwal. '),
(1318, 5, 3, 11, '3.7', 'Menjelaskan sikap dan tindakan yang mendorong dirinya untuk menghasilkan sesuatu yang berguna bagi masyarakat, mengakui dan menghormati keberhasilan orang lain.'),
(1319, 5, 3, 11, '3.8', 'Menjelaskan sikap dan tindakan yang mau mendengar pendapat orang lain, selalu bermusyawarah dan patuh terhadap keputusan/kesepakatan bersama.'),
(1320, 5, 4, 11, '4.1', 'Menerapkan sikap dan tindakan yang menunjukkan kecermatan dalam menjalankan/melakukan sesuatu, penuh minat dan kehatihatian agar tidak terjadi kesalahan.'),
(1322, 5, 4, 11, '4.2', 'Membiasakan sikap dan perilaku yang mencerminkan adanya kesediaan dan keikhlasan dalam memberikan sesuatu/membantu orang lain tanpa mengharapkan imbalan.'),
(1323, 5, 4, 11, '4.3', 'Membiasakan cara berfikir bertindak dan berwawasan yang menempatkan kepentingan bangsa dan negara diatas kepentingan diri dan kelompoknya.'),
(1324, 5, 4, 11, '4.4', 'Membiasakan sikap dan tindakan yang dapat membangun kesadaran yang bersifat membina, membangun dan memperbaiki sehingga kita tidak tenggelam dalam situasi pesimis dan ketakutan yang tidak beralasan.'),
(1325, 5, 4, 11, '4.5', 'Menerapkan caraberfikir dan melakukan sesuatu untuk menghasilkan cara atau hasil baru dari sesuatu yang telah dimiliki.'),
(1326, 5, 4, 11, '4.6', 'Membiasakan tindakan yang menunjukkan pentingnya melakukan kegiatan kegiatan yang bermanfaat dalam memanfaatkan waktu, tidak berleha-leha dan selalu menaati jadwal.'),
(1327, 5, 4, 11, '4.7', 'Membiasakan sikap dan tindakan yang mendorong dirinya untuk menghasilkan sesuatu yang berguna bagi masyarakat, mengakui dan menghormati keberhasilan orang lain.'),
(1328, 5, 4, 11, '4.8', 'Membiasakan sikap dan tindakan yang mau mendengar pendapat orang lain, selalu bermusyawarah dan patuh terhadap keputusan/kesepakatan bersama.'),
(1329, 1, 3, 10, '3.1', 'Membaca nyaring dengan ucapan dan intonasi yang tepat dan berterima yang melibatkan: kata, frasa, dan kalimat sangat sederhana'),
(1330, 1, 3, 10, '3.2', 'Memahami kalimat dan teks deskriptif bergambar sangat sederhana secara tepat dan berterima'),
(1331, 1, 3, 10, '3.3', 'Merespon dengan mengulang kosakata baru dalam berbagai permainan dengan ucapan lantang'),
(1332, 1, 3, 10, '3.4', 'Merespon dengan melakukan tindakan sesuai instruksi secara berterima'),
(1333, 1, 3, 10, '3.5', 'Memahami kalimat dan teks deskriptif bergambar sangat sederhana secara tepat dan berterima'),
(1334, 1, 4, 10, '4.1', 'Merespon dengan   mengulang kosakata baru dengan ucapan lantang'),
(1335, 1, 4, 10, '4.2', 'Merespon dengan melakukan tindakan sesuai instruksi secara berterima'),
(1336, 1, 4, 10, '4.3', 'Bercakap-cakap untuk meminta/memberi informasi secara berterima yang melibatkan tindak tutur: menanyakan suatu benda dan menanyakan seseorang'),
(1337, 1, 4, 10, '4.4', 'Bercakap-cakap untuk menyertai tindakan secara berterima yang melibatkan tindak tutur: menanyakan kegiatan yang sedang dilakukan seseorang dan menyebutkan ukuran sebuah benda '),
(1338, 1, 4, 10, '4.5', 'Mengeja kosakata bahasa Inggris sangat sederhana secara tepat dan berterima dengan ejaan yang benar '),
(1339, 1, 4, 10, '4.6', 'Menyalin kosakata bahasa Inggris sangat sederhana secara tepat dan berterima'),
(1340, 1, 4, 10, '4.7', 'Menirukan ujaran dalam ungkapan sangat sederhana secara berterima'),
(1341, 1, 4, 10, '4.8', 'Bercakap-cakap untuk meminta/memberi informasi secara berterima yang melibatkan tindak tutur: menyebutkan kepemilikan, menanyakan di mana suatu benda berada, dan menanyakan kegiatan yang sedang dilakukan seseorang'),
(1342, 1, 4, 10, '4.9', 'Membaca nyaring dengan ucapan dan intonasi yang tepat dan berterima yang melibatkan: frasa dan kalimat sangat sederhana'),
(1343, 1, 4, 10, '4.10', 'Menyalin kosakata bahasa Inggris sangat sederhana secara tepat dan berterima dengan ejaan yang benar'),
(1344, 1, 4, 10, '4.11', 'Melengkapi kosakata sangat sederhana secara tepat dan berterima '),
(1345, 2, 3, 10, '3.1', 'Membaca nyaring dengan ucapan dan intonasi yang tepat dan berterima yang melibatkan: kata, frasa, dan kalimat sangat sederhana'),
(1346, 2, 3, 10, '3.2', 'Memahami kalimat dan teks deskriptif bergambar sangat sederhana secara tepat dan berterima'),
(1347, 2, 3, 10, '3.3', 'Merespon dengan mengulang kosakata atau kalimat baru dalam berbagai permainan dengan ucapan lantang'),
(1348, 2, 3, 10, '3.4', 'Merespon dengan melakukan tindakan sesuai instruksi secara berterima'),
(1349, 2, 3, 10, '3.5', 'Memahami kalimat dan teks deskriptif bergambar sangat sederhana secara tepat dan berterima'),
(1350, 2, 4, 10, '4.1', 'Merespon dengan mengulang kosakata atau kalimat baru dengan ucapan lantang'),
(1351, 2, 4, 10, '4.2', 'Merespon dengan melakukan tindakan sesuai instruksi secara berterima'),
(1352, 2, 4, 10, '4.3', 'Bercakap-cakap untuk meminta/memberi informasi secara berterima yang melibatkan tindak tutur: menanyakan suatu benda, menanyakan di mana suatu benda berada, dan menanyakan jumlah benda'),
(1353, 2, 4, 10, '4.4', 'Bercakap-cakap untuk menyertai tindakan secara berterima yang melibatkan tindak tutur: menyebutkan usia dan tanggal lahir serta menyebutkan waktu'),
(1354, 2, 4, 10, '4.5', 'Mengeja kosakata bahasa Inggris sangat sederhana secara tepat dan berterima dengan ejaan yang benar '),
(1355, 2, 4, 10, '4.6', 'Menyalin kosakata bahasa Inggris sangat sederhana secara tepat dan berterima'),
(1356, 2, 4, 10, '4.7', 'Menirukan ujaran dalam ungkapan sangat sederhana secara berterima'),
(1357, 2, 4, 10, '4.8', 'Bercakap-cakap untuk meminta/memberi informasi secara berterima yang melibatkan tindak tutur: menanyakan kemahiran seseorang dalam berbagai permainan, menanyakan di mana suatu benda berada, dan menanyakan jumlah benda'),
(1358, 2, 4, 10, '4.9', 'Membaca nyaring dengan ucapan dan intonasi yang tepat dan berterima yang melibatkan: frasa dan kalimat sangat sederhana'),
(1359, 2, 4, 10, '4.10', 'Menyalin kosakata bahasa Inggris sangat sederhana secara tepat dan berterima dengan ejaan yang benar'),
(1360, 2, 4, 10, '4.11', 'Melengkapi kalimat-kalimat sangat sederhana secara tepat dan berterima '),
(1361, 3, 3, 10, '3.1', 'Membaca nyaring dengan ucapan dan intonasi yang tepat dan berterima yang melibatkan: kata, frasa, dan kalimat sangat sederhana'),
(1362, 3, 3, 10, '3.2', 'Memahami kalimat dan teks deskriptif bergambar sangat sederhana secara tepat dan berterima'),
(1363, 3, 3, 10, '3.3', 'Merespon dengan mengulang kosakata atau kalimat baru dalam berbagai permainan dengan ucapan lantang'),
(1364, 3, 3, 10, '3.4', 'Merespon dengan melakukan tindakan sesuai instruksi secara berterima'),
(1365, 3, 3, 10, '3.5', 'Memahami kalimat dan teks deskriptif bergambar sangat sederhana secara tepat dan berterima'),
(1366, 3, 4, 10, '4.1', 'Merespon dengan mengulang kosakata baru dengan ucapan lantang'),
(1367, 3, 4, 10, '4.2', 'Merespon dengan melakukan tindakan sesuai instruksi secara berterima'),
(1368, 3, 4, 10, '4.3', 'Bercakap-cakap untuk meminta/memberi informasi secara berterima yang melibatkan tindak tutur: memperkenalkan diri, menanyakan kepemilikan, menanyakan kegiatan yang sedang dilakukan seseorang'),
(1369, 3, 4, 10, '4.4', 'Bercakap-cakap untuk meminta/memberi informasi secara berterima yang melibatkan tindak tutur: menyebutkan nama-nama benda, menyebutkan di mana seseorang berada, dan menyebutkan kesukaan dan kepunyaan'),
(1370, 3, 4, 10, '4.5', 'Mengeja kosakata bahasa Inggris sangat sederhana secara tepat dan berterima dengan ejaan yang benar '),
(1371, 3, 4, 10, '4.6', 'Menebalkan kosakata bahasa Inggris sangat sederhana secara tepat dan berterima'),
(1372, 3, 4, 10, '4.7', 'Menirukan ujaran dalam ungkapan sangat sederhana secara berterima'),
(1373, 3, 4, 10, '4.8', 'Bercakap-cakap untuk meminta / memberi informasi secara berterima yang melibatkan tindak tutur: menanyakan permainan yang sedang dilakukan seseorang dan menanyakan keadaan seseorang'),
(1374, 3, 4, 10, '4.9', 'Membaca nyaring dengan ucapan dan intonasi yang tepat dan berterima yang melibatkan: frasa dan kalimat sangat sederhana'),
(1375, 3, 4, 10, '4.10', 'Menyalin kosakata bahasa Inggris sangat sederhana secara tepat dan berterima dengan ejaan yang benar'),
(1376, 3, 4, 10, '4.11', 'Melengkapi kalimat-kalimat sangat sederhana secara tepat dan berterima '),
(1377, 3, 3, 3, '3.1', 'Menggali informasi tentang konsep perubahan wujud benda dalam kehidupan sehari-hari yang disajikan dalam bentuk lisan, tulis, visual, dan/atau eksplorasi lingkungan'),
(1378, 3, 3, 3, '3.2', 'Menggali informasi tentang sumber dan bentuk energi yang disajikan dalam bentuk lisan, tulis, visual, dan/atau eksplorasi lingkungan'),
(1379, 3, 3, 3, '3. 3', 'Menggali informasi tentang perubahan cuaca dan pengaruhnya terhadap kehidupan manusia yang disajikan dalam bentuk lisan, tulis, visual, dan/atau eksplorasi lingkungan'),
(1380, 3, 3, 3, '3.6', 'Mencermati isi teks informasi tentang perkembangan teknologi produksi, komunikasi, dan transportasi di lingkungan setempat'),
(1381, 3, 3, 3, '3.7', 'Mencermati informasi tentang konsep delapan arah mata angin dan pemanfaatannya dalam denah dalam teks lisan, tulis, visual, dan/atau eksplorasi lingkungan'),
(1382, 3, 3, 3, '3.9', 'Mengidentifi-kasi lambang/ simbol (rambu lalu lintas, pramuka, dan lambang negara) beserta artinya dalam teks lisan, tulis, visual, dan/atau eksplorasi lingkungan'),
(1383, 3, 3, 3, '3.10', 'Mencermati ungkapan atau kalimat saran, masukan, dan penyelesaian masalah (sederhana) dalam teks tulis.'),
(1384, 3, 4, 3, '4.1', 'Menyajikan hasil informasi tentang konsep perubahan wujud benda dalam kehidupan sehari-hari dalam bentuk lisan, tulis, dan visual menggunakan kosakata baku dan kalimat efektif'),
(1385, 3, 4, 3, '4.2', 'Menyajikan hasil penggalian informasi tentang konsep sumber dan bentuk energi dalam bentuk tulis dan visual menggunakan kosakata baku dan kalimat efektif'),
(1386, 3, 4, 3, '4.3', 'Menyajikan hasil penggalian informasi tentang konsep perubahan cuaca dan pengaruhnya terhadap kehidupan manusia dalam bentuk tulis menggunakan kosakata baku dan kalimat efektif'),
(1387, 3, 4, 3, '4.6', 'Meringkas informasi tentang perkembangan teknologi produksi, komunikasi, dan transportasi di lingkungan setempat secara tertulis menggunakan kosakata baku dan kalimat efektif'),
(1388, 3, 4, 3, '4.7', 'Menjelaskan konsep delapan arah mata angin dan pemanfaatannya dalam denah dalam bentuk tulis dan visual menggunakan kosakata baku dan kalimat efektif'),
(1389, 3, 4, 3, '4.9', 'Menyajikan hasil identifikasi tentang lambang/simbol (rambu lalu lintas, pramuka, dan lambang negara) beserta artinya dalam bentuk visual dan tulis menggunakan kosakata baku dan kalimat efektif'),
(1390, 3, 4, 3, '4.10', 'Memeragakan ungkapan atau kalimat saran, masukan, dan penyelesaian masalah (sederhana) sebagai bentuk ungkapan diri menggunakan kosakata baku dan kalimat efektif yang dibuat sendiri'),
(1391, 3, 3, 4, '3.3', 'Menyatakan suatu bilangan sebagai jumlah, selisih, hasil kali, atau hasil bagi dua bilangan cacah'),
(1392, 3, 3, 4, '3.4', 'Menggeneralisasi ide pecahan sebagai bagian dari keseluruhan menggunakan benda-benda konkret'),
(1393, 3, 3, 4, '3.5', 'Menjelaskan dan melakukan penjumlahan dan pengurangan pecahan berpenyebut sama'),
(1394, 3, 3, 4, '3.6', 'Menjelaskan dan menentukan lama waktu suatu kejadian berlangsung'),
(1395, 3, 3, 4, '3.7', 'Mendeskripsikan dan menentukan hubungan antar satuan baku untuk panjang, berat, dan waktu yang umumnya digunakan dalam kehidupan sehari-hari'),
(1396, 3, 3, 4, '3.8', 'Menjelaskan dan menentukan luas dan volume dalam satuan tidak baku dengan menggunakan benda konkret'),
(1397, 3, 3, 4, '3.9', 'Menjelaskan simetri lipat dan simetri putar pada bangun datar menggunakan benda konkret'),
(1398, 3, 3, 4, '3.10', 'Menjelaskan dan menentukan keliling bangun datar'),
(1399, 3, 3, 4, '3.11', 'Menjelaskan sudut, jenis sudut (sudut siku-siku, sudut lancip, dan sudut tumpul), dan satuan pengukuran tidak baku'),
(1400, 3, 3, 4, '3.12', 'Menganalisis berbagai bangun datar berdasarkan sifat-sifat yang dimiliki'),
(1401, 3, 3, 4, '3.13', 'Menjelaskan data berkaitan dengan diri peserta didik yang disajikan dalam diagram gambar'),
(1402, 3, 4, 4, '4.3', 'Menilai apakah suatu bilangan dapat dinyatakan sebagai jumlah, selisih, hasil kali, atau hasil bagi dua bilangan cacah'),
(1403, 3, 4, 4, '4.4', 'Menyajikan pecahan sebagai bagian dari keseluruhan menggunakan benda-benda konkret'),
(1404, 3, 4, 4, '4.5', 'Menyelesaikan masalah penjumlahan dan pengurangan pecahan berpenyebut sama'),
(1405, 3, 4, 4, '4.6', 'Menyelesaikan masalah yang berkaitan lama waktu suatu kejadian berlangsung'),
(1406, 3, 4, 4, '4.7', 'Menyelesaikan masalah yang berkaitan dengan hubungan antarsatuan baku untuk panjang, berat, dan waktu yang umumnya digunakan dalam kehidupan sehari-hari'),
(1407, 3, 4, 4, '4.8', 'Menyelesaikan masalah luas dan volume dalam satuan tidak baku dengan menggunakan benda konkret'),
(1408, 3, 4, 4, '4.9', 'Mengidentifikasi simetri lipat dan simetri putar pada bangun datar menggunakan benda konkret'),
(1409, 3, 4, 4, '4.10', 'Menyajikan dan menyelesaikan masalah yang berkaitan dengan keliling bangun datar'),
(1410, 3, 4, 4, '4.11', 'Mengidentifikasi jenis sudut, (sudut siku-siku, sudut lancip, dan sudut tumpul), dan satuan pengukuran tidak baku'),
(1411, 3, 4, 4, '4.12', 'Mengelompokkan berbagai bangun datar berdasarkan sifat-sifat yang dimiliki'),
(1412, 3, 4, 4, '4.13', 'Menyajikan data berkaitan dengan diri peserta didik yang disajikan dalam diagram gambar'),
(1417, 5, 3, 1, '3.5', 'Memahami makna perilaku jujur \r\ndalam kehidupan sehai-hari.'),
(1418, 5, 3, 1, '3.6', 'Memahami makna hormat dan \r\npatuh kepada orang tua dan \r\nguru'),
(1420, 5, 3, 1, '3.13', 'Memahami kisah keteladanan \r\nNabi Sulaiman a.s. '),
(1421, 5, 3, 1, '3.14', 'Memahami kisah keteladanan \r\nNabi Ilyas a.s. '),
(1422, 5, 3, 1, '3.16', 'Memahami kisah keteladanan \r\nNabi Muhammad saw. '),
(1423, 5, 3, 1, '3.12', 'Memahami kisah keteladanan \r\nNabi Daud a.s. '),
(1424, 5, 3, 1, '3.7', 'Memahami makna saling \r\nmenghargai sesama manusia.'),
(1425, 5, 3, 1, '3.8', 'Memahami makna sederhana \r\ndalam kehidupan sehari-hari.'),
(1426, 5, 3, 1, '3.9', 'Memahami makna Ikhlas \r\nberamal dalam kehidupan sehari-\r\nhari.'),
(1427, 5, 4, 1, '4.5', 'Menunjukkan perilaku jujur \r\ndalam kehidupan sehai-hari.'),
(1428, 5, 4, 1, '4.6', 'Mencontohkan perilaku hormat \r\ndan patuh kepada orang tua dan \r\nguru.'),
(1429, 5, 4, 1, '4.7', 'Mencontohkan sikap saling \r\nmenghargai sesama manusia'),
(1430, 5, 4, 1, '4.12', 'Menceritakan kisah keteladanan \r\nNabi Dawud a.s'),
(1431, 5, 4, 1, '4.13', 'Menceritakan kisah keteladanan \r\nNabi Sulaiman a.s.'),
(1432, 5, 4, 1, '4.14', 'Menceritakan kisah keteladanan \r\nNabi Ilyas a.s'),
(1433, 5, 4, 1, '4.15', 'Menceritakan kisah keteladanan \r\nNabi Ilyasaâ€™ a.s'),
(1434, 5, 4, 1, '4.16', 'Menceritakan kisah keteladanan \r\nNabi Muhammad saw'),
(1435, 5, 3, 1, '3.15', 'Memahami kisah keteladanan \r\nNabi Ilyasaâ€™ a.s. '),
(1436, 4, 4, 1, '4.1', 'Melakukan pengamatan terhadap makhluk ciptaan Allah \r\ndi sekitar rumah dan sekolah sebagai upaya mengenal \r\nAllah itu ada'),
(1437, 4, 4, 1, '4.3', 'Membaca Asmaul Husna:\r\nal-Basir, al-â€˜Adl, al-â€˜Azim dan  maknanya. ');
INSERT INTO `kd` (`id_kd`, `kelas`, `aspek`, `mapel`, `kd`, `nama_kd`) VALUES
(1438, 4, 4, 1, '4.2', 'Melakukan pengamatan diri dan alam sekitar sebagai \r\nimplementasi makna iman kepada malaikat-malaikat \r\nAllah. '),
(1442, 6, 3, 1, '3.1', 'Mengetahui makna Q.S. al-KÂ±firÎ¼n dan Q.S. al-Maidah/5:2\r\ndengan benar'),
(1443, 6, 3, 1, '3.2', 'Mengerti makna as-Asmaâ€™ul Husna \r\nal-Muqtadir, al-Muqaddim, al-Baqi.'),
(1444, 6, 3, 1, '3.3', 'Memahami hikmah beriman kepada Hari Akhir \r\nyang dapat membentuk perilaku akhlak mulia'),
(1445, 6, 3, 1, '3.4', 'Memahami hikmah beriman kepada Qadha dan Qadar\r\n yang dapat membentuk perilaku akhlak mulia.'),
(1466, 6, 4, 1, '4.8', 'Menceritakan kisah keteladanan Nabi Yunus a.s.'),
(1467, 6, 4, 1, '4.9', 'Menceritakan kisah keteladanan Nabi Dzakariya \r\na.s'),
(1468, 6, 4, 1, '4.10', 'Menceritakan kisah keteladanan Nabi Yahya a.s.'),
(1469, 6, 4, 1, '4.11', 'Menceritakan kisah keteladanan Nabi Isa.'),
(1470, 6, 4, 1, '4.12', 'Menceritakan kisah keteladanan Nabi \r\nMuhammad saw.'),
(1471, 6, 4, 1, '4.13', 'Menceritakan kisah keteladanan sahabat-sahabat \r\nNabi Muhammad saw'),
(1472, 6, 4, 1, '4.14', 'Menceritakan kisah keteladanan Ashabul Kahfi sebagaimana terdapat dalam Al-Qurâ€™an'),
(1474, 3, 3, 8, '3.2', 'memahami kombinasi gerak dasar non lokomotor sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dalam berbagai bentuk permainan sederhana dan atau tradisional.'),
(1476, 2, 3, 9, '3.1', 'Mencerminkan teks narasi pendek dalam undak - usuk ( tingkatan berbahasa ) ngoko/bagongan dan atau krama/bebasan/tentang kerukunan bersama dirumah , tetangga , kelas dan sekolah.'),
(1477, 2, 3, 9, '3.2', 'Mencermati teks dan lagu tembang dolanan ( lagu permainan anak-anak dalam bahasa indramayu ) tentang permainan dilingkunganku.'),
(1478, 2, 3, 9, '3.3', 'Menggali informasi dari teks narasi pendek ( 10-15 kalimat ) dalam undak -usuk ( tingkatan berbahasa ) ngoko/bagongan dan ataun krama/bebasan tentang tugasku sehari - hari ( belajar mengaji, membantu dirumah, piket dan sekolah ).'),
(1479, 2, 3, 9, '3.4', 'Menyimak tembang macapat berupa pupiuh pucung dari teks tulis,lisan maupun irama lagu tentang sekolahku.'),
(1480, 2, 3, 9, '3.5', 'Menggali informasi dari teks deskripsi tentang hidup bersih dan sehat dalam undak- usuk ( tingkatan berbahasa ) ngoko/ bagongan dan atau krama/bebasan'),
(1481, 2, 3, 9, '3.6', 'Memahami cara membaca teks guritan (puisi bahasa Indramayu) sesuai kriteria pembacaan (vokal, intonasi, dan interpretasi) tentang lingkungan alam sekitar (air, bumi, dan matahari).'),
(1482, 2, 3, 9, '3.7', 'Mengidentifikasi teks deskripsi tentang memelihara hewan dan tumbuhan dalam undak usuk (tingkatan berbahsa) ngoko/bagongan dan atau krama / bebasan.'),
(1483, 2, 3, 9, '3.8', 'Menyimak teks parikan ( pantun dalam bahasa indramayu) tentang keselamatan dirumah dan perjalanan, berupa parikan rong wanda ( pantun 2 baris)'),
(1484, 2, 4, 9, '4.1', 'Menceritakan teks narasi pendek dalam undak usuk ( tingkatan berbahasa) ngoko/bagonggan dan atau krama/ bebasan tentang kerukunan bersama dirumah, tetangga, kelas, dan sekolah.'),
(1485, 2, 4, 9, '4.2', 'Memperagakan tembang dolanan ( lagu permainan anak-anak dalam bahasa indramayu) tentang permainan di lingkunganku.'),
(1486, 2, 4, 9, '4.3', 'Menyampaikan isi teks narasi pendek (10-15 kalimat dalam undak usuk (tingkatan berbahasa) ngoko/ bagongan dan atau krama/ bebasan tentang tugasku sehari-hari (belajar, mengaji, membantu dirumah, piket disekolah).'),
(1487, 2, 4, 9, '4.4', 'Melantunkan tembang macapat berupa pupuh pucung tentang sekolahku.'),
(1488, 2, 4, 9, '4.5', 'Menyajikan informasi dari teks deskripsi dalam undak usuk (tingkatan berbahasa) ngoko/ bagongan dan atau krama/ bebasan.  '),
(1489, 2, 4, 9, '4.6', 'Membaca teks puisi sesuai kriteria pembacaan (vokal, intonasi, dan interpretasi) tentang lingkungan alam sekitar (air, bumi, dan matahari).'),
(1490, 2, 4, 9, '4.7', 'Menyajikan hasil identifikasi deskripsi tentang memelihara hewan dan tumbuhan dalam undak usuk (tingkatan berbahsa) ngoko/bagongan dan atau krama / bebasan.'),
(1491, 2, 4, 9, '4.8', 'Mendemontrasikan pengucapan teks parikan ( pantun dalam bahasa indramayu) tentang keselamatan dirumah dan perjalanan, berupa parikan rong wanda ( pantun 2 baris)'),
(1492, 3, 3, 9, '3.1', 'menjelaskan gambar tentang alam sekitar ((tingkatan berbahasa hewan dan tumbuhan ) dalam unduk-usuk ( tingkatan berbahasa) ngoko/bagongan dan atau krama/bebasan'),
(1493, 3, 3, 9, '3.2', 'mengidentifikasi unsur-un sur latar, tokoh, dan  pesan dalam crita cindek (cerita  pendek)'),
(1494, 3, 4, 9, '4.1', 'menjelaskan  kembali gambar tentang alam sekitar ((tingkatan berbahasa hewan dan tumbuhan ) dalam unduk-usuk (tingkatan berbahasa) ngoko/bagongan dan atau krama/bebasan'),
(1495, 3, 4, 9, '4.2', 'menceritakan kembali unsur-unsur latar, tokoh, dan  pesan dalam crita cindek (cerita  pendek)uk ( tingkatan berbahasa) ngoko/bagongan dan atau krama/bebasan'),
(1496, 3, 3, 9, '3.3', 'menggali informasi sederhana dari teks deskripsi tentang musim dalam undak-usuk  (tingkatan berbahasa)  ngoko/bagongan dan atau krama/bebasan'),
(1497, 3, 4, 9, '4.3', 'menjelaskan informasi sederhana dari teks deskripsi tentang musim dalam undak-usuk  (tingkatan berbahasa)  ngoko/bagongan dan atau krama/bebasan'),
(1498, 3, 3, 9, '3.4', 'menyimak teks cerita daera dongeng   (berupa  dongeng satoan/fabel dan cerita rakyat )  tentang kegotong royongan dalam undak-usuk  (tingkatan bahasa)  ngoko/bagongan dan atau krama/bebasan'),
(1499, 3, 4, 9, '4.4', 'menceritakan isi teks cerita daerah dongeng   (berupa  dongeng satoan/fabel dan cerita rakyat )  tentang kegotong royongan dalam undak-usuk  (tingkatan bahasa)  ngoko/bagongan dan atau krama/bebasan'),
(1500, 1, 3, 11, '3.1', 'Memahami sikap dan tindakan yang menunjukkan sikap hormat kepada guru,orang tua, saudara, dan teman.'),
(1501, 1, 3, 11, '3.2', 'Memahami cara menyediakan waktu untuk membaca berbagai bacaan yang memberikan manfaat bagi dirinya.'),
(1502, 1, 3, 11, '3.3', 'Menjelaskan cara berperilaku serius, teratur, dan sungguh-sungguh dalam mengerjakan sesuatu atau belajar dalam mendapatkan manfaat dari kegiatan tersebut.'),
(1503, 1, 3, 11, '3.4', 'Mendeskripsikan contoh sifat dan tindakan yang menunjukkan perilaku yang sesuai dengan aturan atau tata tertib yang ada di rumah, sekolah, dan masyarakat.'),
(1504, 1, 4, 11, '4.1', 'Menunjukkan sikap dan tindakan yang menunjukkan sikap hormat kepada guru , orang tua, saudara, dan teman.'),
(1505, 1, 4, 11, '4.2', 'Terbiasa mengatur waktu untuk membaca berbagai bacaan yang memberikan manfaat bagi dirinya.'),
(1506, 1, 4, 11, '4.3', 'Membiasakan perilaku serius,  teratur, dan sungguh-sungguh dalam mengerjakan sesuatu atau belajar untuk mendapatkan manfaat dari kegiatan tersebut.'),
(1507, 1, 4, 11, '4.4', 'Membiasakan bersikap dan bertindak yang menunjukkan perilaku sesuai dengan aturan atau tata tertib yang ada di rumah, sekolah, dan masyarakat.'),
(1508, 3, 3, 8, '3.3', 'memahami kombinasi gerak dasar manipulatif sesuai dengan konsep tubuh, ruang, usaha, dan keterhubungan dadisionalau tan atalam berbagai bentuk permainan sederhana d'),
(1510, 3, 3, 8, '3.8', 'memahami bentuk dan manfaat istirahat dan pengisian waktu luang untuk menjaga kesehatan'),
(1511, 3, 3, 8, '3.9', 'memahami perlunya memilih makanan bergizi dan jajanan sehat untuk menjaga kesehatan tubuh'),
(1512, 3, 4, 8, '4.2', 'Mempraktikkan gerak kombinasi gerak dasar non-lokomotor sesuai dengan konsep tubuh,ruang,usaha,dan keterhubungan dalam berbagai bentuk permainan sederhana atau tradisional.'),
(1513, 3, 4, 8, '4.3', 'Mempraktikkan kombinasi gerak dasar manipulatif sesuai dengan konsep tubuh,ruang,usaha,dan keterhubungan dalam berbagai bentuk permainan sederhana dan atau tradisional.'),
(1514, 3, 4, 8, '4.8', 'Menceritakan bentuk dan manfaat istirahat dan pengisian waktu luang untuk menjaga kesehatan.'),
(1515, 3, 4, 8, '4.9', 'Menceritakan perlunya memilih makanan bergizi dan jajanan sehat untuk menjaga kesehatan tubuh.'),
(1516, 4, 3, 12, '3.1', 'Mampu mengoprasikan Program Microsoft Word Dasar, berupa mengenal fungsi menu, pengaturan tata letak halaman dan pembuatan lembar kerja.'),
(1517, 4, 4, 12, '4.1', 'Mampu membuat lembar kerja sederhana seperti mengetik surat, membuat kop surat, membuat karangan narasi pada lembar kerja.'),
(1518, 6, 3, 11, '3.1', 'Menjelaskan tindakan yang selalu memperhitungkan matang-matang keputusan yang akan diambil, meyakini kemampuan diri sendiri dan menjadikan tantangan sebagai jalan untuk keberhasilan.'),
(1519, 6, 3, 11, '3.2', 'Menjelaskan sikap dan tindakan yang menunjukkan pantang menyerah dalam melakukan sesuatu, berkemauan kuat dalam usaha mencapai cita-cita tanpa rasa bosan.'),
(1520, 6, 3, 11, '3.3', 'Menjelaskan cara berpikir , bersikap dan berbuat yang menunjukkan kesetiaan , kepedulian dan penghargaan yang tinggi terhadap bahasa , lingkungan fisik , sosial , budaya , ekonomi dan politik bangsa'),
(1521, 6, 3, 11, '3.4', 'Menjelaskan sikap dan perilaku cara berfikir secara logis yang memandang sesuatu dari segi positifnya baik terhadap dirinya sendiri , orang lain maupun keadaan lingkungannya'),
(1522, 6, 3, 11, '3.5', 'Menjelaskan sikap dan tindakan yang memikirkan hal hal yang perlu dilakukan untuk tujuan jangka panjang yang ditentukan dan memikirkan akibat yang ditimbulkan dari suatu perbuatan sehingga memiliki sikap waspada'),
(1523, 6, 3, 11, '3.6', 'Menjelaskan sikap dan perilaku yang dilakukan sesuai dengan kemampuan , tujuan dan kebutuhan / yang dibutuhkan serta bersikap lugas serta apa adanya'),
(1525, 6, 3, 11, '3.8', 'Menjelaskan sikap dan perilaku yang mendahulukan kepentingan orang lain dari kepentingan pribadi dan menghindari sikap egois dan masabodoh. '),
(1526, 6, 3, 11, '3.7', 'Menjelaskan sikap tindakan kesatria intuk menerima kenyataan, mau menghargai dan menghormati keunggulan orang lain serta jujur mengakuti kelemahan diri'),
(1527, 6, 4, 11, '4.1', 'Menerapkan tindakan yang selalu memperhitungkan secara matang keputusan yang akan diambil, meyakini kemampuan diri sendiri dan menjadikan tantangan sebagai jalan untuk keberhasilan '),
(1528, 6, 4, 11, '4.3', 'Menerapkan cara berpikir, bersikap dan berbuat yang menunjukkan kesetiaan, kepedulian dan penghargaan yang tinggi terhadap bahasa, lingkungan fisik, sosial, budaya, ekonomi, dan politik bangsa'),
(1529, 6, 4, 11, '4.2', 'Menerapkan sikap tindakan yang menunjukkan pantang menyerah dalam melakukan sesuatu, berkemauan kuat dalam usaha mencapai suatu cita cita tanpa rasa bosan'),
(1530, 6, 4, 11, '4.4', 'Menerapkan sikap dan perilaku cara berfikir secara logis yang memandang sesuatu dari segi positifnya baik terhadap dirinya sendiri, orang lain maupun keadaan lingkungannya'),
(1531, 6, 4, 11, '4.5', 'Menerapkan sikap dan tindakan yang memikirkan hal hal yang perlu dilakukan untuk tujuan jangka panjang yang ditentukan dan memikirkan akibat yang ditimbulkan dari suatu perbuatan sehingga memiliki sikap waspada'),
(1532, 6, 4, 11, '4.6', 'Membiasakan sikap dan perilaku yang dilakukan sesuai dengan kemampuan, tujuan dan kebutuhan/ yang dibutuhkan serta bersikap lugas serta apa adanya'),
(1533, 6, 4, 11, '4.7', 'Menerapkan sikap tidan kesatria intuk menerima kenyataan, mau menghargai dan menghormati keunggulan orang lain serta jujur mengakuti kelemahan diri'),
(1534, 6, 4, 11, '4.8', 'Membiasakan sikap dan berperilaku yang mendahulukan kepentingan orang lain dari kepentingan pribadi dan menghindari sikap egois dan masa bodoh'),
(1535, 3, 3, 11, '3.1', 'Menjelaskan sikap , perkataan dan tindakan yang menyebabkan orang lain merasa senang dan aman atas kehadiran dirinya'),
(1536, 3, 3, 11, '3.2', 'Menjelaskan sikap dan tindakan yang mengiklaskan sesuatu perbuatan seorang terhadap dirinya , pemurah dan melapangkan hati untuk orang lain'),
(1537, 3, 3, 11, '3.3', 'Menjelaskan sikap dan perilaku yang menunjukkan kemandirian dalam berfikir dan bertindak serta tidak berubah ubah secara singkat'),
(1538, 3, 3, 11, '3.4', 'Menjelaskan sikap dan tindakan berusaha dengan sepenuh hati dan sekuat tenaga untuk berupaya mendapatkan keinginan pencapaian hasil yang maksimal dalam konteks yang positif'),
(1539, 3, 3, 11, '3.5', 'Memahami sikap tindakan yang selalu berupaya untuk mengetahui lebih mendalam dan meluas dari sesuatu yang dpelajari , dilihat dan didengarnya'),
(1540, 3, 3, 11, '3.6', 'Mengidentifikasi sikap dan perilaku yang menghargai orang lain dengan tulus , tidak meremehkan orang lain dan tidak bersikap sombong'),
(1541, 3, 3, 11, '3.7', 'Mengidentifikasi sikap dan tindakan yang menunjukkan dapat memeriksa dan mengoreksi diri sendiri secara jujur , instropeksi diri dan bertanggungjawab terhadap perkataan dan perbuatan'),
(1542, 3, 3, 11, '3.8', 'Menjelaskan perilaku yang berusaha untuk menepati apa yang telah diucapkan atau dijanjikan , menjaga kepercayaan yang diberikan kepadanya '),
(1543, 3, 4, 11, '4.1', 'menerapkan sikap , perkataan dan tindakan yang menyebabkan orang lain merasa senang dan aman atas kehadiran dirinya'),
(1544, 3, 4, 11, '4.2', 'membiasakan sikap dan tindakan yang mengiklaskan sesuatu perbuatan seorang terhadap dirinya , pemurah dan melapangkan hati untuk orang lain'),
(1545, 3, 4, 11, '4.3', 'membiasakan sikap dan perilaku yang menunjukkan kemandirian dalam berfikir dan bertindak serta tidak berubah ubah secara singkat'),
(1546, 3, 4, 11, '4.4', 'membiasakan sikap dan tindakan berusaha dengan sepenuh hati dan sekuat tenaga untuk berupaya mendapatkan keinginan pencapaian hasil yang maksimal dalam konteks yang positif'),
(1547, 3, 4, 11, '4.5', 'membiasakan sikap tindakan yang selalu berupaya untuk mengetahui lebih mendalam dan meluas dari sesuatu yang dpelajari , dilihat dan didengarnya'),
(1548, 3, 4, 11, '4.6', 'menerapkan sikap dan perilaku yang menghargai orang lain dengan tulus , tidak meremehkan orang lain dan tidak bersikap sombong'),
(1549, 3, 4, 11, '4.7', 'menerapkan sikap dan tindakan yang menunjukkan dapat memeriksa dan mengoreksi diri sendiri secara jujur , instropeksi diri dan bertanggungjawab terhadap perkataan dan perbuatan'),
(1550, 3, 4, 11, '4.8', 'menerapkan perilaku yang berusaha untuk menepati apa yang telah diucapkan atau dijanjikan , menjaga kepercayaan yang diberikan kepadanya '),
(1551, 2, 3, 11, '3.1', 'Menjelaskan sikap dan perilaku yang tulus ( tanpa pamrih ) dalam membantu orang lain'),
(1552, 2, 3, 11, '3.2', 'Mengidentifikasi sikap dan tindakan yang menunjukan ikut merasakan apa yang dirasakan orang lain sehingga menghasilkan tindakan yang tepat'),
(1554, 2, 3, 11, '3.3', 'Menelaah sikap dan perilaku yang menunjukan ketelitian,keseksamaan,penuh minat dan kehati-hatian.'),
(1555, 2, 3, 11, '3.4', 'Memahami sikap dan perilaku yang menunjukan keakraban dalam pergaulan,hormat dalam berkomunikasi,yang dilakukan dengan ketulusan dan prasangka baik.'),
(1556, 2, 3, 11, '3.5', 'Menjelaskan tindakan untuk selalu berusaha atau berjuang dengan sungguh-sungguh dalam mengerjakan sesuatu untuk mencapai suatu tujuan / prestasi tanpa mengenal lelah disertai dengan doa.'),
(1557, 2, 3, 11, '3.6', 'Menjelaskan rindakan yang memperlihatkan rasa senang berbicara,bergaul dan bekerjasama dengan orang lain'),
(1558, 2, 3, 11, '3.7', 'Mengidentifikasi sikap dan tindakan yang menunjukan tidak putus asa dalam menghadapi kesulitan belajar atau pekerjaan'),
(1559, 2, 3, 11, '3.8', 'Menjelaskan sikapndan tindakan yang menunjukan kehati-hatian / pengendalian diri dalam menggunakan atau mengeluarkan uang, barang, tenaga, pikiran atau waktu dalam kehidupan sehari-hari'),
(1560, 2, 4, 11, '4.1', 'Membiasakan sikap dan perilaku yang tulus ( tanapa pamrih ) dalam membantu orang lain'),
(1561, 2, 4, 11, '4.2', 'Membiasakan sikap dan tindakan yang menunjukan ikut merasakan apa yang di rasakan orang lain sehingga menghasilkan tindakan '),
(1562, 2, 4, 11, '4.3', 'Menerapkan sikap dan perilaku yang menunjukan ketelitian, keseksamaan, penuh minat, dan kehati-hatian'),
(1563, 2, 4, 11, '4.4', 'Membiasakan sikap dan perilaku yang menu jukan keakraban dalam pergaulan, hormat, dalam berkomunikasi, yang dilakukan dengan ketulusan dan prasangka baik.'),
(1564, 2, 4, 11, '4.5', 'Membiasakan tindakan untuk selalu berusaha atau berjuang dengan bersungguh-sungguh dalam mengerjakan sesuatu untuk mencapai suatu tujuan / prestasi tanpa mengenal lelah disertai dengan doa.'),
(1565, 2, 4, 11, '4.6', 'Menerapakan tindakan yang memperlihatkan rasa senang berbicara, bergaul, dan bekerja sama dengan orang lain.'),
(1566, 2, 4, 11, '4.7', 'Menerapakan sikap dan tindakan yang menunjukan tidak putus asa dalam menghadapi kesulitan belajar atau pekerjaan'),
(1567, 2, 4, 11, '4.8', 'Membiasakan sikap dan tindakan yang menunjukan kehati-hatian / pengendalian diri dalam menggunakan atau mengeluarkan uang, barang, tenaga, pikiran atau waktu dalam kehidupan sehari - hari.'),
(1576, 4, 3, 11, '3.1', '1.	Menelaah tindakan yang memelihara sikap positif sekalipun berada dalam kesulitan, tidak mau tinggal diam , selalu bergerak dan terus tubuh untuk mencapai hasil yang maksimal'),
(1577, 4, 3, 11, '3.2', '2.	Memahami cara berbuat sesuatu yang sifatnya positif , produktif dan mencoba melakukan pekerjaan inovatif / baru'),
(1578, 4, 3, 11, '3.3', '3.	Menjelaskan cara bersikap dan bertindak sesuai denga pikiran , akal sehat sehingga menghasilkan perilaku yang tepat dan sesuai'),
(1579, 4, 3, 11, '3.4', '4.	Menjelaskan sikap dan tindakan yang menunjukkan mampu menahan diri dari berbagai hal yang dapat merugikan diri sendiri / orang lain dan menyikapinya dengan akal sehat '),
(1580, 4, 3, 11, '3.5', '5.	Menjelaskan sikap dan tindakan yang menunjukkan saling menerima , saling mempercayai , saling menghormati dan menghargai perbedaan perbedaan sebagai titik tolak untuk membina kehidupan sosial dan saling memaknai kebersamaan'),
(1581, 4, 3, 11, '3.6', '6.	Menjelaskan sikap dan perilaku yang selalu ingin mencari kebenaran dari informasi yang didapat dan tidak mudah percaya terhadap informasi yang tidak jelas sumbernya'),
(1582, 4, 3, 11, '3.7', '7.	Menjelaskan cara berfikir , bersikap dan bertindak yang menilai sama hak dan kewajiban dirinya dan orang lain '),
(1583, 4, 3, 11, '3.8', '8.	Menjelaskan sikap tindakan yang menunjukkan mau dan mampu bekerja sama dengan orang lain dan mau membantu orang lain.'),
(1584, 4, 4, 11, '4.1', '1.	Menerapkan tindakan yang memelihara sikap positif sekalipun berada dalam kesulitan, tidak mau tinggal diam , selalu bergerak dan terus tubuh untuk mencapai hasil yang maksimal'),
(1585, 4, 4, 11, '4.2', '2.	Membiasakan cara berbuat sesuatu yang sifatnya positif , produktif dan mencoba melakukan pekerjaan inovatif / baru'),
(1586, 4, 4, 11, '4.3', '3.	Membiasakan cara bersikap dan bertindak sesuai denga pikiran , akal sehat sehingga menghasilkan perilaku yang tepat dan sesuai'),
(1587, 4, 4, 11, '4.4', '4.	Membiasakan sikap dan tindakan yang menunjukkan mampu menahan diri dari berbagai hal yang dapat merugikan diri sendiri / orang lain dan menyikapinya dengan akal sehat'),
(1588, 4, 4, 11, '4.5', '5.	Menerapkan sikap dan tindakan yang menunjukkan saling menerima , saling mempercayai , saling menghormati dan menghargai perbedaan perbedaan sebagai titik tolak untuk membina kehidupan sosial dan saling memaknai kebersamaan'),
(1589, 4, 4, 11, '4.6', '6.	menerapkan sikap dan perilaku yang selalu ingin mencari kebenaran dari informasi yang didapat dan tidak mudah percaya terhadap informasi yang tidak jelas sumbernya'),
(1590, 4, 4, 11, '4.7', '7.	menerapkan cara berfikir , bersikap dan bertindak yang menilai sama hak dan kewajiban dirinya dan orang lain '),
(1591, 4, 4, 11, '4.8', '8.	menerapkan sikap tindakan yang menunjukkan mau dan mampu bekerja sama dengan orang lain dan mau membantu orang lain.'),
(1592, 1, 3, 3, '3.1', 'Menjelaskan kegiatan persiapan membaca permulaan dengan cara yang benar.'),
(1594, 3, 3, 8, '3.4', 'memahami gerak secara seimayabang, lentur, lincah, dan berdaya tahan dalam rangka pengembangan kebugaran jasmani melalui permainan sederhana dan atau tradisional'),
(1595, 3, 3, 8, '3.5', 'memahami kombinasi berbagai pola gerak dominan (bertumpu, bergantung, keseimbangan, berpindah/lokomotor, tolakan, putaran, ayunan, melayang, dan mendarat) dalam aktivitas senam lantai.'),
(1596, 3, 3, 8, '3.6', 'memahami penggunaan kombinasi gerak dasar lokomotor, non-lokomotor dan manipulatif sesuai dengan irama (ketukan) tanpa/ dengan musik dalam aktivitas gerak berirama.'),
(1597, 3, 3, 8, '3.7', 'memahami prosedur gerak dasar menganbang (water trapppen) dan meluncur di air serta menjaga keselamatan diri/ orang lain dalam aktivitas air.'),
(1600, 3, 4, 8, '4.4', 'mempraktikkan bergerak secara seimbang, lentur, lincah, dan berdaya tahan dalam rangka pengembangan kebugaran jasmani melalui permainan sederhana dan atau tra disional.'),
(1601, 3, 4, 8, '4.5', 'mempraktikkan kombinasi berbagai pola gerak dominan (bertumpu, bergantung, keseimbangan, berpindah / lokomotor, tolakan, putaran, ayunan, melayang dan mendarat) dalam aktivitas senam lantai.'),
(1602, 3, 4, 8, '4.6', 'mempraktikan penggunaan kombinasi gerak dasar lokomotor, non-lokomotor dan manipulatif sesuai dengan irama (ketukan) tanpa/dengan musik dalam aktivitas gerak berirama.'),
(1603, 3, 4, 8, '4.7', 'mempraktikan gerak dasar mengambang (water trappen) dan meluncur di air serta menjaga keselamatan diri/orang lain dalam aktivitas air.'),
(1604, 3, 3, 9, '3.5', 'memahami teks lagu tembang dolanan (lagu permaiann anak-anak dalam bahasa indramayu).'),
(1605, 3, 4, 9, '4.5', 'memperagakan tembang dolanan (lagu permaiann anak-anak dalam bahasa indramayu).'),
(1606, 3, 3, 9, '3.6', 'memahami teks narasi tentang persahabatan dirumah, lingkungan tentangga, kelas, dan sekolah dalam undak-usut (tingkatan berbahasa) ngkono/bagongan dan atau krama/bebasan.'),
(1607, 3, 4, 9, '4.6', 'menyusun paragraf (3-kalimat) tentang persahabatan dirumah, lingkungan tentangga, kelas, dan sekolah dalam undak-usut (tingkatan berbahasa) ngkono/bagongan dan atau krama/bebasan.'),
(1608, 3, 3, 9, '3.7', 'memahami teks lagu daerah (berupa tembang anyar/kiser gancang dan tembang pujian/ lagu yang memuji Allah SWT dan Rasul atau ajaran agama islam dalam bahasa indramayu).'),
(1609, 3, 4, 9, '4.7', 'menyajikan teks lagu daerah (berupa tembang anyar/kiser gancang dan tembang pujian/ lagu yang memuji Allah SWT dan Rasul atau ajaran agama islam dalam bahasa indramayu) secara teks maupun lagu.'),
(1610, 1, 3, 9, '3.5', 'memahami teks deskripsi pendek dalam undak usuk ngoko / bagongan dan atau krama/ bebasan tentang pengalamanku,'),
(1611, 1, 3, 9, '3.6', 'Memahami  teks deskripsi pemdek dalam undak usuk tentang lingkungan.'),
(1612, 1, 3, 9, '3.7', 'memahami teks guritan tentang alam sekitar.'),
(1613, 3, 3, 9, '3.8', 'menggali informasi dari teks eksposisi tentang menjaga kelestarian (sungai, hutan, dan laut) dalam undak-usut (tingkatan bahasa) ngoko/bagongan dan atau krama/bebasan.'),
(1614, 1, 3, 9, '3.8', 'mencermati teks guneman dalam undak usuk tentang peristiwa alam.'),
(1615, 3, 4, 9, '4.8', 'meringkas teks eksposisi tentang menjaga kelestarian (sungai, hutan, dan laut) dalam undak-usut (tingkatan bahasa) ngoko/bagongan dan atau krama/bebasan.'),
(1616, 1, 4, 9, '4.5', 'Menceritakan secara sederhana teks deskripsi pendek dalam tingkatan berbahasa tentang pengalamanku.'),
(1617, 1, 4, 9, '4.6', 'Menceritakan isi teks deskripsi pendek dalam tingkatan berbahasa tentang lingkungan.'),
(1618, 1, 4, 9, '4.7', 'Menyampaikan secara lisan/ gambar yang berisi guritan tentang alam sekitar.'),
(1619, 1, 4, 9, '4.8', 'menirukan teks guneman dalam undak usuk tentang peristiwa alam.'),
(1620, 1, 3, 2, '3.5', 'Menjelaskan sikap dan perilaku yang menunjukkan saling menghormati dan mengasihi semua ciptaan tuhan seperti menyayangi diri sendiri berdasarkan hati nurani yang luhur'),
(1621, 1, 3, 2, '3.6', 'Memahami sikap dan tindakan yang menunjukkan kesungguhan , keteraturan dan menahan rasa bosan dalam belajar dan bekerja dan mau belajar dari kesalahan'),
(1622, 1, 3, 2, '3.7', 'Menjelaskan sikap dan berperilaku yang menunjukkan semangat tinggi , giat dan senang dalam belajar / bekerja'),
(1623, 1, 3, 2, '3.8', 'Memahami sikap dan perilaku yang tidak mudah tergantung pada oranglain dalam menyelesaikan tugas tugas'),
(1625, 1, 4, 2, '4.5', 'Membiasakan sikap dan perilaku yang menunjukkan saling menghormati dan mengasihi semua ciptaan tuhan seperti menyayangi diri sendiri berdasarkan hati nurani yang luhur'),
(1626, 1, 4, 2, '4.6', 'menerapkan sikap dan tindakan yang menunjukkan kesungguhan , keteraturan dan menahan rasa bosan dalam belajar dan bekerja dan mau belajar dari kesalahan'),
(1627, 1, 4, 2, '4.7', 'Menerapkan sikap dan berperilaku yang menunjukkan semangat tinggi , giat dan senang dalam belajar / bekerja'),
(1628, 1, 4, 2, '4.8', 'Membiasakan sikap dan perilaku yang tidak mudah tergantung pada oranglain dalam menyelesaikan tugas tugas'),
(1629, 1, 3, 11, '3.5', 'Menjelaskan sikap dan perilaku yang menunjukkan saling menghormati dan mengasihi semua ciptaan tuhan seperti menyayangi diri sendiri berdasarkan hati nurani yang luhur'),
(1630, 1, 3, 11, '3.6', 'Memahami sikap dan tindakan yang menunjukkan kesungguhan , keteraturan dan menahan rasa bosan dalam belajar dan bekerja dan mau belajar dari kesalahan'),
(1631, 1, 3, 11, '3.7', 'Menjelaskan sikap dan berperilaku yang menunjukkan semangat tinggi , giat dan senang dalam belajar / bekerja'),
(1632, 1, 3, 11, '3.8', 'Memahami sikap dan perilaku yang tidak mudah tergantung pada oranglain dalam menyelesaikan tugas tugas'),
(1633, 1, 4, 11, '4.5', 'Membiasakan sikap dan perilaku yang menunjukkan saling menghormati dan mengasihi semua ciptaan tuhan seperti menyayangi diri sendiri berdasarkan hati nurani yang luhur'),
(1634, 1, 4, 11, '4.6', 'Menerapkan sikap dan tindakan yang menunjukkan kesungguhan , keteraturan dan menahan rasa bosan dalam belajar dan bekerja dan mau belajar dari kesalahan'),
(1635, 1, 4, 11, '4.7', 'Menerapkan sikap dan berperilaku yang menunjukkan semangat tinggi , giat dan senang dalam belajar / bekerja'),
(1636, 1, 4, 11, '4.8', 'Membiasakan sikap dan perilaku yang tidak mudah tergantung pada oranglain dalam menyelesaikan tugas tugas'),
(1663, 3, 3, 1, '3.7', 'Memahami sikap bersyukur.'),
(1664, 6, 3, 1, '3.14', 'Memahami kisah keteladanan Ashabul Kahfi sebagaimana\r\nterdapat dalam al-Qurâ€™an'),
(1665, 3, 4, 1, '4.7', 'Mencontohkan sikap bersyukur.'),
(1666, 6, 4, 1, '4.6', 'Menunjukkan sikap toleran dan simpatik terhadap sesama sebagai wujud dari pemahaman Q.S. al-Kafirun'),
(1667, 6, 4, 1, '4.7', 'Menunjukkan hikmah zakat, infaq,dan sedekah sebagai implementasi rukun Islam'),
(1668, 3, 3, 1, '3.9', 'Memahami makna zikir dan doa setelah salat.'),
(1669, 3, 4, 1, '4.9', 'Mempraktikkan tata cara zikir dan doa setelah \r\nsalat secara benar.'),
(1670, 3, 3, 1, '3.13', ' Memahami kisah keteladanan Nabi Ibrahim a.s. \r\ndan Nabi Ismail a.s.'),
(1671, 3, 4, 1, '4.13', 'Menceritakan kisah keteladanan Nabi Ibrahim a.s. \r\ndan Nabi Ismail a.s. '),
(1681, 4, 3, 10, '3.1', 'Memahami grammar'),
(1682, 4, 3, 10, '3.2', 'Memahami teks dan pesan tertulis sangat sederhana'),
(1684, 4, 3, 10, '3.4', 'Memahami percakapan dalam kehidupan sehari-hari.'),
(1685, 4, 4, 10, '4.1', 'Merespon instruksi dengan menggunakan grammar secara tepat'),
(1686, 4, 4, 10, '4.2', 'Membaca nyaring teks dan pesan tertulis sangat sederhana'),
(1689, 4, 4, 10, '4.4', 'Bercakap cakap mengenai percakapan dalam kehidupan sehari-hari.'),
(1691, 5, 3, 10, '3.1', 'Memahami Grammar'),
(1692, 5, 3, 10, '3.2', 'Memahami teks dan pesan tertulis sangat sederhana'),
(1694, 5, 3, 10, '3.4', 'Memahami percakapan dalam kehidupan sehari-hari.'),
(1695, 5, 4, 10, '4.1', 'Merespon Instruksi Dengan Menggunakan Grammar Secara Tepat'),
(1696, 5, 4, 10, '4.2', 'Membaca nyaring teks dan pesan tertulis sangat sederhana'),
(1697, 5, 4, 10, '4.3', 'Menyebutkan kata degrees of comparison, professions, public places, dan preposition of place.'),
(1699, 5, 4, 10, '4.4', 'Bercakap-cakap mengenai percakapan dalam kehidupan sehari-hari.'),
(1700, 6, 3, 10, '3.1', 'Memahami Grammar'),
(1701, 6, 3, 10, '3.2', 'Memahami teks dan pesan tertulis sangat sederhana'),
(1704, 6, 3, 10, '3.5', 'Mendeskripsikan seseorang atau sesuatu dengan kalimat sederhana'),
(1705, 6, 4, 10, '4.1', 'Merespon instruksi dengan menggunakan grammar secara tepat'),
(1707, 6, 4, 10, '4.2', 'Membaca nyaring teks dan pesan singkat sangat sederhana'),
(1708, 6, 4, 10, '4.3', 'Menyebutkan weathers and seasons, animals around us and the description, dan public places.'),
(1709, 6, 4, 10, '4.4', 'Bercakap-cakap mengenai percakapan dalam kehidupan sehari-hari.'),
(1710, 6, 4, 10, '4.5', 'Merespon instruksi dengan mendeskripsikan seseorang /sesuatu dengan kalimat sederhana'),
(1711, 2, 3, 3, '3.1', 'Merinci ungkapan, ajakan, perintah, penolakan yang terdapat dalam teks cerita ataulagu yang menggmbarkan sikap hidup rukun'),
(1712, 2, 3, 3, '3.2', 'Menguraikan kosakata dan konsep tentang keragaman benda berdasarkan bentuk dan wujudnya dalam bahasa Indonesia atau bahasa daerah melalui teks tulis, lisan, visual, dan/ atau eksplorasi lingkungan'),
(1713, 2, 3, 3, '3.3', 'Menentukan kosakata dan konsep tentang lingkungan geografis, kehidupan ekonomi, sosial dan budaya di lingkungan sekitar dalam bahasa Indonesia atau bahasa daerah melalui teks tulis, lisan, visual, dan/ atau eksplorasi lingkungan'),
(1714, 2, 4, 4, '4.8', 'Mengidentifikasi ruas garis dengan menggunakan model konkret bangun datar dan bangun ruang'),
(1715, 2, 4, 4, '4.9', 'Mengklarifikasi bangun datar dan bangun ruang berdasarkan ciri-cirinya'),
(1716, 2, 4, 4, '4.10', 'Memprediksi pola barisan bangun datar dan bangun ruang menggunakan gambar atau benda konkret'),
(1717, 2, 3, 4, '3.8', 'Menjelaskan ruas garis dengan menggunakan model konkret bangun datar dan bangun ruang'),
(1718, 2, 3, 4, '3.9', 'Menjelaskan bangun datar dan bangun ruang berdasarkan ciri-cirinya'),
(1719, 2, 3, 4, '3.10', 'Menjelaskan pola barisan bangun datar dan bangun ruang menggunakan gambar atau benda konkret'),
(1720, 2, 3, 8, '3.8', 'Memahami manfaat pemanasan dan pendinginan, serta berbagai hal yang harus dilakukan dan dihindari sebelum, selama, dan setelah melakukan aktivitas fisik.'),
(1721, 2, 4, 8, '4.8', 'Menceritakan manfaat pemanasan dan pendinginan serta berbagai hal yang harus dilakukan dan dihindari sebelum, selama, dan setelah melakukan aktifitas fisik.'),
(1728, 6, 3, 1, '3.12', 'Memahami kisah Nabi MUhammad SAW.'),
(1729, 6, 3, 1, '3.7', 'Memahami hikmah zakat,infaq dan sedekah sbagai implementasi dari rukun islam.'),
(1730, 6, 3, 1, '3.8', 'memahami kisah keteladanan  nabi yunus a.s.'),
(1731, 6, 3, 1, '3.9', 'memahami kisah keteladanan nabi zakariya a.s.'),
(1732, 6, 3, 1, '3.10', 'memahami kisah keteladanan nabi yahya a.s.'),
(1733, 6, 3, 1, '3.11', 'memahami kisah keteladanan nabi isa a.s.'),
(1734, 6, 3, 1, '3.5', 'memahami perilaku homat dan patuh kepada orangtua,guru dan sesama anggota keluarga\r\n'),
(1735, 6, 3, 1, '3.6', 'memahami sikap toleran dan simpatik terhdap sesama sebagai wujud dari pemahaman Q.S.al-kafirun.'),
(1736, 6, 3, 1, '3.13', 'memahami kisah kteladanan sahabat sahabat nabi muhammad SAW.'),
(1737, 6, 4, 1, '4.1.1', 'Membaca Q.S al-kafirun,Q.S.al-maidah/5:2-3,Q.S. al-hujurat/49:12-13 dengan jelas dan benar'),
(1738, 6, 4, 1, '4.1.2', 'menulis Q.S al-kafirun,Q.S.al-maidah/5:2-3,Q.S. al-hujurat/49:12-13 dengan jelas dan benar'),
(1739, 6, 4, 1, '4.1.3', 'menunjukkan hafalan Q.S al-kafirun,Q.S.al-maidah/5:2-3,Q.S. al-hujurat/49:12-13 dengan jelas dan benar'),
(1740, 6, 4, 1, '4.2', 'membaca asmaul husna as-somad,al muqtadir,al muqqadim,dan al baqi dengan jelas dan benar'),
(1741, 6, 4, 1, '4.3', 'menunjukkan contoh hikmah beriman kepada hari akhir yang dapat  membentuk prilaku akhlak mulia'),
(1742, 6, 4, 1, '4.4', 'menunjukkan hikmah beriman kepada qada dan qadar yang dapat  membentuk prilaku akhlak mulia'),
(1743, 6, 4, 1, '4.5', 'mencontohkan prilaku hormat dan patuh  kepada orangtua,guru,dan sesama anggota keluarga'),
(1744, 5, 3, 10, '3.3', 'Memahami degrees of comparison, professions, public places, dan preposition of place.'),
(1745, 4, 3, 10, '3.3', 'Memahami greetings, days, parts of the house, family tree, dan how much and how many.'),
(1747, 6, 3, 10, '3.3', 'Memahami weathers and seasons, sports, animals around us and the description dan public places.'),
(1748, 4, 4, 10, '4.3', 'Menyebutkan greetings, days, parts of the house, family tree, dan how much and how many'),
(1749, 4, 3, 10, '3.5', 'Memahami Comparative Degre, Particular places, Time dan Weathers, '),
(1751, 4, 3, 10, '3.6', 'Memahami Cardinal Number'),
(1752, 4, 4, 10, '4.5', 'Menyebutkan Particular places, Comparative Degree, Time dan Weathers, '),
(1754, 4, 4, 10, '4.6', 'Menyebutkan Cardinal Number.'),
(1755, 4, 4, 1, '4.4', 'melakukan pengamatan diri dan alam sekitar sebagai implementasi makna iman kepada malaikat-malaikat Allah.'),
(1756, 4, 4, 1, '4.12', 'menunjukkan perilaku gemar membaca.'),
(1757, 4, 4, 1, '4.13', 'menunjukkan sikap pantang menyerah.'),
(1758, 5, 3, 10, '3.5', 'Memahami Habitual Actifities, Preference, dan Quantifier. '),
(1760, 5, 3, 10, '3.6', 'Memahami Cardinal Number'),
(1761, 5, 4, 10, '4.5', 'Menyebutkan Habitual Actifities, Preference, dan Quantifier. '),
(1763, 5, 4, 10, '4.6', 'Menyebutkan Cardinal Number.'),
(1764, 6, 3, 10, '3.7', 'Memahami Synonym/Antonym, Quantifiers, dan Directions.'),
(1765, 6, 3, 10, '3.4', 'Memahami percakapan dalam kehidupan sehari-hari.'),
(1766, 6, 3, 10, '3.6', 'Memahami Cardinal Number.'),
(1767, 6, 4, 10, '4.6', 'Menyebutkan Cardinal Number.'),
(1768, 6, 4, 10, '4.7', 'Merespon Instruksi Dengan Menggunakan Synonym/Antonim, Quantifier dan Direction Secara Tepat.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kd_sosial`
--

CREATE TABLE `kd_sosial` (
  `ids` int(11) NOT NULL,
  `komp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kd_sosial`
--

INSERT INTO `kd_sosial` (`ids`, `komp`) VALUES
(1, 'Jujur'),
(2, 'Disiplin'),
(3, 'Tanggung Jawab'),
(4, 'Santun'),
(5, 'Peduli'),
(6, 'Percaya Diri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kd_spirit`
--

CREATE TABLE `kd_spirit` (
  `ids` int(11) NOT NULL,
  `komp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kd_spirit`
--

INSERT INTO `kd_spirit` (`ids`, `komp`) VALUES
(1, 'Ketaatan Beribadah'),
(2, 'Berdoa sebelum dan sesudah melakukan kegiatan'),
(3, 'Sikap Toleransi dalam beribadah'),
(4, 'Berprilaku Syukur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` char(10) NOT NULL,
  `id_kabupaten` char(10) NOT NULL,
  `nama` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `id_kabupaten`, `nama`) VALUES
('3212010', '3212', ' Haurgeulis'),
('3212011', '3212', ' Gantar'),
('3212020', '3212', ' Kroya'),
('3212030', '3212', ' Gabuswetan'),
('3212040', '3212', ' Cikedung'),
('3212041', '3212', ' Terisi'),
('3212050', '3212', ' Lelea'),
('3212060', '3212', ' Bangodua'),
('3212061', '3212', ' Tukdana'),
('3212070', '3212', ' Widasari'),
('3212080', '3212', ' Kertasemaya'),
('3212081', '3212', ' Sukagumiwang'),
('3212090', '3212', ' Krangkeng'),
('3212100', '3212', ' Karangampel'),
('3212101', '3212', ' Kedokan Bunder'),
('3212110', '3212', ' Juntinyuat'),
('3212120', '3212', ' Sliyeg'),
('3212130', '3212', ' Jatibarang'),
('3212140', '3212', ' Balongan'),
('3212150', '3212', ' Indramayu'),
('3212160', '3212', ' Sindang'),
('3212161', '3212', ' Cantigi'),
('3212162', '3212', ' Pasekan'),
('3212170', '3212', ' Lohbener'),
('3212171', '3212', ' Arahan'),
('3212180', '3212', ' Losarang'),
('3212190', '3212', ' Kandanghaur'),
('3212200', '3212', ' Bongas'),
('3212210', '3212', ' Anjatan'),
('3212220', '3212', ' Sukra'),
('3212221', '3212', ' Patrol');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_keg` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nilai` varchar(1) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kkm`
--

CREATE TABLE `kkm` (
  `id_kkm` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `tapel` varchar(9) NOT NULL,
  `mapel` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kkmku`
--

CREATE TABLE `kkmku` (
  `id_kkm` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `tapel` varchar(9) NOT NULL,
  `mapel` int(11) NOT NULL,
  `kd` varchar(10) NOT NULL,
  `jenis` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_conf` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `maintenis` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `image_login` varchar(50) NOT NULL,
  `versi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_conf`, `tapel`, `semester`, `maintenis`, `nama_sekolah`, `alamat_sekolah`, `image_login`, `versi`) VALUES
(1, '2019/2020', 2, 1, 'SD Islam Al-Jannah', 'Jl. Raya Gabuswetan No. 1 Desa Gabuswetan Kec. Gabuswetan Kab. Indramayu Jawa Barat 45263', 'bg-01.jpg', '7.01b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `kd_mapel` varchar(4) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `kd_mapel`, `nama_mapel`) VALUES
(1, 'PAI', 'Pendidikan Agama Islam'),
(2, 'PKn', 'Pendidikan Kewarganegaraan'),
(3, 'BIN', 'Bahasa Indonesia'),
(4, 'MTK', 'Matematika'),
(5, 'IPA', 'Ilmu Pengetahuan Alam'),
(6, 'IPS', 'Ilmu Pengetahuan Sosial'),
(7, 'SBK', 'Seni Budaya dan Ketrampilan'),
(8, 'PJK', 'Pend. Jasmani Olahraga & Kesehatan'),
(9, 'BID', 'Bahasa Indramayu'),
(10, 'BIG', 'Bahasa Inggris'),
(11, 'PBP', 'Pendidikan Budi Pekerti'),
(12, 'KOM', 'Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajar`
--

CREATE TABLE `mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `tapel` varchar(9) NOT NULL,
  `ptk_id` varchar(36) NOT NULL,
  `rombel` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `id` int(11) NOT NULL,
  `nasabah_id` varchar(10) NOT NULL,
  `user_id` varchar(36) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nats`
--

CREATE TABLE `nats` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `mapel` int(11) NOT NULL,
  `kd` varchar(10) NOT NULL,
  `nilai` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nh`
--

CREATE TABLE `nh` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `mapel` int(11) NOT NULL,
  `tema` varchar(2) NOT NULL,
  `kd` varchar(10) NOT NULL,
  `jns` varchar(5) NOT NULL,
  `nilai` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nh_temp`
--

CREATE TABLE `nh_temp` (
  `id_nh` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `mapel` int(11) NOT NULL,
  `kd` varchar(10) NOT NULL,
  `nph` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nk`
--

CREATE TABLE `nk` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `mapel` int(11) NOT NULL,
  `tema` varchar(2) NOT NULL,
  `kd` varchar(10) NOT NULL,
  `jns` varchar(5) NOT NULL,
  `nilai` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nk_temp`
--

CREATE TABLE `nk_temp` (
  `id_nh` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `mapel` int(11) NOT NULL,
  `kd` varchar(10) NOT NULL,
  `nph` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nso`
--

CREATE TABLE `nso` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `perilaku` varchar(500) NOT NULL,
  `jns` varchar(10) NOT NULL,
  `nilai` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nso_temp`
--

CREATE TABLE `nso_temp` (
  `id_nh` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `jns` varchar(10) NOT NULL,
  `nph` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nsp`
--

CREATE TABLE `nsp` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `perilaku` varchar(500) NOT NULL,
  `jns` varchar(10) NOT NULL,
  `nilai` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nsp_temp`
--

CREATE TABLE `nsp_temp` (
  `id_nh` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `jns` varchar(10) NOT NULL,
  `nph` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nuts`
--

CREATE TABLE `nuts` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `mapel` int(11) NOT NULL,
  `kd` varchar(10) NOT NULL,
  `nilai` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`) VALUES
(1, 'Tidak bekerja'),
(2, 'Nelayan'),
(3, 'Petani'),
(4, 'Peternak'),
(5, 'PNS/TNI/Polri'),
(6, 'Karyawan Swasta'),
(7, 'Pedagang Kecil'),
(8, 'Pedagang Besar'),
(9, 'Wiraswasta'),
(10, 'Wirausaha'),
(11, 'Buruh'),
(12, 'Pensiunan'),
(13, 'Ibu Rumah Tangga'),
(98, 'Sudah Meninggal'),
(99, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemetaan`
--

CREATE TABLE `pemetaan` (
  `id_pemetaan` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `kd_aspek` int(11) NOT NULL,
  `mapel` int(11) NOT NULL,
  `tema` varchar(2) NOT NULL,
  `nama_peta` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nama_pendidikan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES
(0, 'Tidak sekolah'),
(1, 'PAUD'),
(2, 'TK / sederajat'),
(3, 'Putus SD'),
(4, 'SD / sederajat'),
(5, 'SMP / sederajat'),
(6, 'SMA / sederajat'),
(7, 'Paket A'),
(8, 'Paket B'),
(9, 'Paket C'),
(20, 'D1'),
(21, 'D2'),
(22, 'D3'),
(23, 'D4'),
(30, 'S1'),
(35, 'S2'),
(40, 'S3'),
(90, 'Non formal'),
(91, 'Informal'),
(98, '(tidak diisi)'),
(99, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penempatan`
--

CREATE TABLE `penempatan` (
  `id_rombel` int(11) NOT NULL,
  `peserta_didik_id` varchar(36) NOT NULL,
  `nama` varchar(41) DEFAULT NULL,
  `rombel` varchar(2) NOT NULL,
  `tapel` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `ptk_id` varchar(36) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(36) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `level` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`ptk_id`, `username`, `password`, `nama_lengkap`, `level`, `gambar`) VALUES
('009ab849-2cf5-e011-b7ae-9b859d73d4ca', 'admin', 'admin', 'Operator', 11, 'user-default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `potongan_gaji`
--

CREATE TABLE `potongan_gaji` (
  `id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `absen` int(11) NOT NULL,
  `ekskul` int(11) NOT NULL,
  `telat` int(11) NOT NULL,
  `cepat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ptk`
--

CREATE TABLE `ptk` (
  `id` int(11) NOT NULL,
  `ptk_id` varchar(36) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `gelar` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `niy_nigk` varchar(14) DEFAULT NULL,
  `nuptk` varchar(16) DEFAULT NULL,
  `status_kepegawaian_id` int(1) DEFAULT NULL,
  `jenis_ptk_id` int(2) DEFAULT NULL,
  `alamat_jalan` varchar(250) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status_keaktifan_id` int(1) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL DEFAULT 'user',
  `nasabah_id` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `ptk`
--

INSERT INTO `ptk` (`id`, `ptk_id`, `nama`, `gelar`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nik`, `niy_nigk`, `nuptk`, `status_kepegawaian_id`, `jenis_ptk_id`, `alamat_jalan`, `no_hp`, `email`, `status_keaktifan_id`, `gambar`, `nasabah_id`) VALUES
(1, '009ab849-2cf5-e011-b7ae-9b859d73d4ca', 'Operator', '', 'L', 'Indramayu', '1979-05-10', NULL, NULL, NULL, 4, 11, NULL, NULL, NULL, 1, 'user-default.png', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `raport`
--

CREATE TABLE `raport` (
  `id_raport` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `mapel` int(11) NOT NULL,
  `nilai` double(11,2) NOT NULL DEFAULT 0.00,
  `oleh` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `raport_k13`
--

CREATE TABLE `raport_k13` (
  `id_raport` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `mapel` int(11) NOT NULL,
  `jns` varchar(5) NOT NULL,
  `nilai` double(11,2) NOT NULL DEFAULT 0.00,
  `predikat` varchar(1) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` int(11) NOT NULL,
  `nama_rombel` varchar(10) NOT NULL,
  `kurikulum` varchar(50) NOT NULL,
  `tapel` varchar(9) NOT NULL,
  `wali_kelas` varchar(36) NOT NULL,
  `pendamping` varchar(36) NOT NULL,
  `pai` varchar(36) NOT NULL,
  `penjas` varchar(36) NOT NULL,
  `inggris` varchar(36) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `peserta_didik_id` varchar(36) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(9) NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `peserta_didik_id` varchar(36) NOT NULL DEFAULT '',
  `nis` varchar(9) NOT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nama` varchar(41) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `agama` int(11) NOT NULL,
  `pend_sebelum` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nama_ayah` varchar(22) DEFAULT NULL,
  `nama_ibu` varchar(23) DEFAULT NULL,
  `pek_ayah` int(11) NOT NULL,
  `pek_ibu` int(11) NOT NULL,
  `jalan` varchar(100) NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `nasabah_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sk`
--

CREATE TABLE `sk` (
  `id_sk` int(11) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `no_sk` varchar(100) NOT NULL,
  `ptk_id` varchar(50) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `jenis_ptk` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `pengangkat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_kepegawaian`
--

CREATE TABLE `status_kepegawaian` (
  `status_kepegawaian_id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_kepegawaian`
--

INSERT INTO `status_kepegawaian` (`status_kepegawaian_id`, `nama`) VALUES
(1, 'PNS'),
(2, 'PNS Diperbantukan'),
(3, 'PNS Depag'),
(4, 'GTY/PTY'),
(5, 'GTT/PTT Provinsi'),
(6, 'GTT/PTT Kab/Kota'),
(7, 'Guru Bantu Pusat'),
(8, 'Guru Honor Sekolah'),
(9, 'Tenaga Honor Sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subtema`
--

CREATE TABLE `subtema` (
  `id_sub` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tema` varchar(2) NOT NULL,
  `sub` varchar(5) NOT NULL,
  `nama_sub` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surah`
--

CREATE TABLE `surah` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surah`
--

INSERT INTO `surah` (`id`, `nama`) VALUES
(1, 'Al-Baqarah 1-8'),
(2, 'Al-Baqarah 183'),
(3, 'Al-Baqarah 255'),
(4, 'Al-Baqarah 284-286'),
(5, 'Al-Baqarah 153-157'),
(6, 'Luqman 12-19'),
(7, 'Ar-Rahman 1-6'),
(8, 'Ar-Rahman 7-13'),
(9, 'Al-Mu\'minin 1-4'),
(10, 'Al-Mu\'minin 5-9'),
(11, 'Al-Mu\'minin 10-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surah_pilihan`
--

CREATE TABLE `surah_pilihan` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `surah` int(11) NOT NULL,
  `nilai` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
--

CREATE TABLE `tabungan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kode` int(11) NOT NULL,
  `nasabah_id` varchar(10) NOT NULL,
  `masuk` bigint(20) DEFAULT 0,
  `keluar` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahfidz`
--

CREATE TABLE `tahfidz` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `surah` int(11) NOT NULL,
  `nilai` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tapel`
--

CREATE TABLE `tapel` (
  `id_tapel` int(11) NOT NULL,
  `nama_tapel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tapel`
--

INSERT INTO `tapel` (`id_tapel`, `nama_tapel`) VALUES
(1, '2007/2008'),
(2, '2008/2009'),
(3, '2009/2010'),
(4, '2010/2011'),
(5, '2011/2012'),
(6, '2012/2013'),
(7, '2013/2014'),
(8, '2014/2015'),
(9, '2015/2016'),
(10, '2016/2017'),
(11, '2017/2018'),
(12, '2018/2019'),
(13, '2019/2020'),
(14, '2020/2021'),
(15, '2021/2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tema`
--

CREATE TABLE `tema` (
  `id_tema` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `smt` int(11) NOT NULL,
  `tema` varchar(2) NOT NULL,
  `nama_tema` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tema`
--

INSERT INTO `tema` (`id_tema`, `kelas`, `smt`, `tema`, `nama_tema`) VALUES
(2, 1, 1, '2', 'Kegemaranku'),
(3, 1, 1, '3', 'Kegiatanku'),
(4, 1, 1, '4', 'Keluargaku'),
(5, 1, 2, '5', 'Pengalamanku'),
(6, 1, 2, '6', 'Lingkungan Bersih, Sehat, dan Asri'),
(7, 1, 2, '7', 'Benda, Hewan, dan Tanaman di Sekitarku'),
(8, 1, 2, '8', 'Peristiwa Alam'),
(9, 4, 2, '6', 'Cita-citaku'),
(10, 4, 2, '7', 'Indahnya Keragaman di Negeriku'),
(11, 4, 2, '8', 'Daerah Tempat Tinggalku'),
(12, 4, 2, '9', 'Kayanya Negeriku'),
(14, 2, 1, '1', 'Hidup Rukun'),
(15, 2, 1, '2', 'Bermain di Lingkunganku'),
(16, 2, 1, '3', 'Tugasku Sehari-hari'),
(17, 2, 1, '4', 'Hidup bersih dan Sehat'),
(18, 5, 1, '1', 'Organ Gerak Hewan dan Manusia'),
(19, 5, 1, '2', 'Udara Bersih Bagi Kesehatan'),
(20, 5, 1, '3', 'Makanan Sehat'),
(21, 5, 1, '4', 'Sehat Itu Penting'),
(22, 5, 1, '5', 'Ekosistem'),
(23, 4, 1, '1 ', 'Indahnya Kebersamaan'),
(24, 4, 1, '2 ', 'Selalu Berhemat Energi'),
(25, 4, 1, '3', 'Peduli Terhadap Makhluk Hidup'),
(26, 4, 1, '4', 'Berbagai Pekerjaan'),
(27, 4, 1, '5', 'Pahlawanku'),
(33, 5, 2, '6', 'Panas dan Perpindahannya'),
(35, 5, 2, '8', 'Lingkungan Sahabat Kita'),
(36, 5, 2, '9', 'Benda-Benda di Sekitar Kita'),
(37, 5, 2, '7', 'Peristiwa dalam Kehidupan'),
(38, 2, 2, '5', 'Pengalamanku'),
(43, 2, 2, '6', 'Merawat Hewan dan Tumbuhan.'),
(44, 2, 2, '7', 'Kebersamaan'),
(46, 2, 2, '8', 'Menjaga Keselamatan di Rumah dan di Perjalanan'),
(47, 6, 1, '1', 'Selamatkan Makhluk Hidup'),
(48, 6, 1, '2', 'Persatuan dalam Perbedaan'),
(49, 6, 1, '3', 'Tokoh dan Penemuan'),
(50, 6, 1, '4', 'Globalisasi'),
(51, 6, 1, '5', 'Wirausaha'),
(52, 3, 1, '1', 'Pertumbuhan dan Perkembangan Makhluk Hidup'),
(53, 3, 1, '2', 'Menyayangi Tumbuhan dan Hewan'),
(54, 3, 1, '3', 'Benda di Sekitarku'),
(55, 3, 1, '4', 'Kewajiban dan Hakku'),
(57, 3, 2, '5', 'keadaan cuaca'),
(58, 3, 2, '6', 'energi dan perubahannnya'),
(60, 3, 2, '7', 'perkembangan teknologi'),
(61, 3, 2, '8', 'praja muda karana'),
(65, 6, 2, '6', 'Menuju Masyarakat Sejahtera'),
(66, 6, 2, '7', 'Kepemimpinan'),
(67, 6, 2, '8', 'Bumiku'),
(68, 6, 2, '9', 'Menjelajah Angkasa Luar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_pas`
--

CREATE TABLE `temp_pas` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `mapel` int(11) NOT NULL,
  `nilai` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_pts`
--

CREATE TABLE `temp_pts` (
  `idNH` int(11) NOT NULL,
  `id_pd` varchar(36) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `smt` int(11) NOT NULL,
  `tapel` varchar(10) NOT NULL,
  `mapel` int(11) NOT NULL,
  `nilai` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `absensi_ptk`
--
ALTER TABLE `absensi_ptk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `arbain`
--
ALTER TABLE `arbain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_ekskul`
--
ALTER TABLE `data_ekskul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kesehatan`
--
ALTER TABLE `data_kesehatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_prestasi`
--
ALTER TABLE `data_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `deskripsi_k13`
--
ALTER TABLE `deskripsi_k13`
  ADD PRIMARY KEY (`id_raport`);

--
-- Indeks untuk tabel `doa`
--
ALTER TABLE `doa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `doa_harian`
--
ALTER TABLE `doa_harian`
  ADD PRIMARY KEY (`idNH`);

--
-- Indeks untuk tabel `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id_ekskul`);

--
-- Indeks untuk tabel `gajipokok`
--
ALTER TABLE `gajipokok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hadits`
--
ALTER TABLE `hadits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hadits_arbain`
--
ALTER TABLE `hadits_arbain`
  ADD PRIMARY KEY (`idNH`);

--
-- Indeks untuk tabel `hadits_pilihan`
--
ALTER TABLE `hadits_pilihan`
  ADD PRIMARY KEY (`idNH`);

--
-- Indeks untuk tabel `hari_efektif`
--
ALTER TABLE `hari_efektif`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indeks untuk tabel `id_pegawai`
--
ALTER TABLE `id_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ijin_ptk`
--
ALTER TABLE `ijin_ptk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_ptk`
--
ALTER TABLE `jenis_ptk`
  ADD UNIQUE KEY `jenis_ptk_id_2` (`jenis_ptk_id`),
  ADD KEY `jenis_ptk_id` (`jenis_ptk_id`);

--
-- Indeks untuk tabel `jns_mutasi`
--
ALTER TABLE `jns_mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indeks untuk tabel `juzamma`
--
ALTER TABLE `juzamma`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kd`
--
ALTER TABLE `kd`
  ADD PRIMARY KEY (`id_kd`);

--
-- Indeks untuk tabel `kd_sosial`
--
ALTER TABLE `kd_sosial`
  ADD PRIMARY KEY (`ids`);

--
-- Indeks untuk tabel `kd_spirit`
--
ALTER TABLE `kd_spirit`
  ADD PRIMARY KEY (`ids`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_keg`);

--
-- Indeks untuk tabel `kkm`
--
ALTER TABLE `kkm`
  ADD PRIMARY KEY (`id_kkm`);

--
-- Indeks untuk tabel `kkmku`
--
ALTER TABLE `kkmku`
  ADD PRIMARY KEY (`id_kkm`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD UNIQUE KEY `id_conf` (`id_conf`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`id_mengajar`);

--
-- Indeks untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nats`
--
ALTER TABLE `nats`
  ADD PRIMARY KEY (`idNH`);

--
-- Indeks untuk tabel `nh`
--
ALTER TABLE `nh`
  ADD PRIMARY KEY (`idNH`);

--
-- Indeks untuk tabel `nh_temp`
--
ALTER TABLE `nh_temp`
  ADD PRIMARY KEY (`id_nh`);

--
-- Indeks untuk tabel `nk`
--
ALTER TABLE `nk`
  ADD PRIMARY KEY (`idNH`);

--
-- Indeks untuk tabel `nk_temp`
--
ALTER TABLE `nk_temp`
  ADD PRIMARY KEY (`id_nh`);

--
-- Indeks untuk tabel `nso`
--
ALTER TABLE `nso`
  ADD PRIMARY KEY (`idNH`);

--
-- Indeks untuk tabel `nso_temp`
--
ALTER TABLE `nso_temp`
  ADD PRIMARY KEY (`id_nh`);

--
-- Indeks untuk tabel `nsp`
--
ALTER TABLE `nsp`
  ADD PRIMARY KEY (`idNH`);

--
-- Indeks untuk tabel `nsp_temp`
--
ALTER TABLE `nsp_temp`
  ADD PRIMARY KEY (`id_nh`);

--
-- Indeks untuk tabel `nuts`
--
ALTER TABLE `nuts`
  ADD PRIMARY KEY (`idNH`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indeks untuk tabel `pemetaan`
--
ALTER TABLE `pemetaan`
  ADD PRIMARY KEY (`id_pemetaan`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD UNIQUE KEY `id_pendidikan` (`id_pendidikan`);

--
-- Indeks untuk tabel `penempatan`
--
ALTER TABLE `penempatan`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ptk_id`);

--
-- Indeks untuk tabel `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ptk`
--
ALTER TABLE `ptk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ptk_id` (`ptk_id`);

--
-- Indeks untuk tabel `raport`
--
ALTER TABLE `raport`
  ADD PRIMARY KEY (`id_raport`);

--
-- Indeks untuk tabel `raport_k13`
--
ALTER TABLE `raport_k13`
  ADD PRIMARY KEY (`id_raport`);

--
-- Indeks untuk tabel `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `peserta_didik_id` (`peserta_didik_id`);

--
-- Indeks untuk tabel `sk`
--
ALTER TABLE `sk`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indeks untuk tabel `status_kepegawaian`
--
ALTER TABLE `status_kepegawaian`
  ADD UNIQUE KEY `status_kepegawaian_id` (`status_kepegawaian_id`);

--
-- Indeks untuk tabel `subtema`
--
ALTER TABLE `subtema`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indeks untuk tabel `surah`
--
ALTER TABLE `surah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surah_pilihan`
--
ALTER TABLE `surah_pilihan`
  ADD PRIMARY KEY (`idNH`);

--
-- Indeks untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahfidz`
--
ALTER TABLE `tahfidz`
  ADD PRIMARY KEY (`idNH`);

--
-- Indeks untuk tabel `tapel`
--
ALTER TABLE `tapel`
  ADD PRIMARY KEY (`id_tapel`);

--
-- Indeks untuk tabel `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indeks untuk tabel `temp_pas`
--
ALTER TABLE `temp_pas`
  ADD PRIMARY KEY (`idNH`);

--
-- Indeks untuk tabel `temp_pts`
--
ALTER TABLE `temp_pts`
  ADD PRIMARY KEY (`idNH`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `absensi_ptk`
--
ALTER TABLE `absensi_ptk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `arbain`
--
ALTER TABLE `arbain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `data_ekskul`
--
ALTER TABLE `data_ekskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_kesehatan`
--
ALTER TABLE `data_kesehatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_prestasi`
--
ALTER TABLE `data_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `deskripsi_k13`
--
ALTER TABLE `deskripsi_k13`
  MODIFY `id_raport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `doa`
--
ALTER TABLE `doa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `doa_harian`
--
ALTER TABLE `doa_harian`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id_ekskul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `gajipokok`
--
ALTER TABLE `gajipokok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hadits`
--
ALTER TABLE `hadits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `hadits_arbain`
--
ALTER TABLE `hadits_arbain`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hadits_pilihan`
--
ALTER TABLE `hadits_pilihan`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hari_efektif`
--
ALTER TABLE `hari_efektif`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `id_pegawai`
--
ALTER TABLE `id_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ijin_ptk`
--
ALTER TABLE `ijin_ptk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `juzamma`
--
ALTER TABLE `juzamma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `kd`
--
ALTER TABLE `kd`
  MODIFY `id_kd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1769;

--
-- AUTO_INCREMENT untuk tabel `kd_sosial`
--
ALTER TABLE `kd_sosial`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kd_spirit`
--
ALTER TABLE `kd_spirit`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_keg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kkm`
--
ALTER TABLE `kkm`
  MODIFY `id_kkm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kkmku`
--
ALTER TABLE `kkmku`
  MODIFY `id_kkm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nats`
--
ALTER TABLE `nats`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nh`
--
ALTER TABLE `nh`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nh_temp`
--
ALTER TABLE `nh_temp`
  MODIFY `id_nh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nk`
--
ALTER TABLE `nk`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nk_temp`
--
ALTER TABLE `nk_temp`
  MODIFY `id_nh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nso`
--
ALTER TABLE `nso`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nso_temp`
--
ALTER TABLE `nso_temp`
  MODIFY `id_nh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nsp`
--
ALTER TABLE `nsp`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nsp_temp`
--
ALTER TABLE `nsp_temp`
  MODIFY `id_nh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `nuts`
--
ALTER TABLE `nuts`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemetaan`
--
ALTER TABLE `pemetaan`
  MODIFY `id_pemetaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `potongan_gaji`
--
ALTER TABLE `potongan_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ptk`
--
ALTER TABLE `ptk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `raport`
--
ALTER TABLE `raport`
  MODIFY `id_raport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `raport_k13`
--
ALTER TABLE `raport_k13`
  MODIFY `id_raport` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sk`
--
ALTER TABLE `sk`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `subtema`
--
ALTER TABLE `subtema`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surah`
--
ALTER TABLE `surah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `surah_pilihan`
--
ALTER TABLE `surah_pilihan`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tahfidz`
--
ALTER TABLE `tahfidz`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tapel`
--
ALTER TABLE `tapel`
  MODIFY `id_tapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tema`
--
ALTER TABLE `tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `temp_pas`
--
ALTER TABLE `temp_pas`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `temp_pts`
--
ALTER TABLE `temp_pts`
  MODIFY `idNH` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
