-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2015 at 07:07 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sisfoskenfi`
--

-- --------------------------------------------------------

--
-- Table structure for table `c_jenis`
--

CREATE TABLE IF NOT EXISTS `c_jenis` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `jenis` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_jenis`
--

INSERT INTO `c_jenis` (`kd`, `jenis`) VALUES
('2cac658a262d7a3b543dcaa8dff95bd6', 'Drama Tragedi'),
('7b6123fd96ac81b6f9bd3065aaa492ee', 'Drama Komedi'),
('bbf5eea724ffd22f6379462d8589caf0', 'Drama Misteri'),
('73853b0be0c5725e7351021c38b3eae2', 'Drama Laga / Action'),
('4275151bd5769c66b291bb9671a2ca2b', 'Melodrama'),
('94bb2c006962087fa4c1b46542f4cbf2', 'Drama Sejarah'),
('56c0bf5b9dd0842ce4d4735541e220bd', 'Dokumenter - Adat Istiadat'),
('50468421d417f7cb6b6f11ba28cb32a7', 'Dokumenter - Tempat Bersejarah'),
('e4322d3f4bd73bf8a8af6f3578a28c7d', 'Dokumenter - Biografi'),
('3f674ee863a1500b0555ccf6e9089111', 'Propaganda - Layanan Masyarakat'),
('8b2572cf7d23ac28e4257d0df77cde9c', 'Propaganda - Layanan Niaga');

-- --------------------------------------------------------

--
-- Table structure for table `c_sasaran`
--

CREATE TABLE IF NOT EXISTS `c_sasaran` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `sasaran` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_sasaran`
--

INSERT INTO `c_sasaran` (`kd`, `sasaran`) VALUES
('280c87f314132e0e5c73e0ec471fcfb1', 'Anak-Anak'),
('c943cb5b846f52ae89ac8be652f27f53', 'Remaja'),
('b3f5fb4dfac57b0400c90ee47408df24', 'Dewasa'),
('cafe033aa44258375e6b5a260c4823d1', 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `c_tema`
--

CREATE TABLE IF NOT EXISTS `c_tema` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `tema` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_tema`
--

INSERT INTO `c_tema` (`kd`, `tema`) VALUES
('60eb0308ac9774cfd8a455f778597669', 'Percintaan'),
('d241278f6b20edd26cf0eefa95184665', 'Rumah Tangga'),
('c4b2fa7362e25f755db697d7ae230698', 'Perselingkuhan'),
('c0f2484e0f1abd36a9c798b4a7bf3de6', 'Pembauran'),
('44c0594610ba80211dc88235b3522719', 'Persahabatan'),
('372af6d969d002f420f0bf6d6672dd5c', 'Kepahlawanan'),
('801dd28a3cfdf22f76df70d52fecce12', 'Petualangan'),
('352750a8e0961c2a6cfaa3cf3f6ecb03', 'Religi');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `passtanya` varchar(255) NOT NULL DEFAULT '',
  `passjawab` varchar(255) NOT NULL DEFAULT '',
  `nama` varchar(50) NOT NULL DEFAULT '',
  `alamat` varchar(255) NOT NULL DEFAULT '',
  `telp` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `postdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`kd`, `username`, `password`, `passtanya`, `passjawab`, `nama`, `alamat`, `telp`, `email`, `postdate`) VALUES
('c82dcb50894f5dd4d02769a9d940c850', 'a', '9804911810c0dd6d53af460e8ef34811', 'a', 'a', 'a', 'a', 'a', 'a', '0000-00-00 00:00:00'),
('dcdd17f7ecf3f7c97a685eed00666a93', 'hajirobe', '9539641c3097bd2d04182600206087ad', 'hajirobe', 'biasawae', 'hajirobe', 'Semarang', '-', 'hajirobe@biasawae.com', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `m_beat`
--

CREATE TABLE IF NOT EXISTS `m_beat` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `beat` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_beat`
--

INSERT INTO `m_beat` (`kd`, `beat`) VALUES
('978913205bdfe1bcd238f81e28a82010', 'Tersenyum'),
('b5b63a4bddc0b3d7f1dfc2de5a524115', 'Menangis'),
('c305dd67861bec79c3ef74f6674beb5b', 'Marah'),
('53c6850b205bf4b376adcdbf2ee060d5', 'Malu'),
('4ded7b006153318fd6dc11b77247152d', 'Menyesal'),
('243086891bd0b8fce5b432bc11feb8d8', 'Senang'),
('d18aadf4c1962c6a6d506014645d3908', 'Kesal'),
('cb7ce984231a7ed6323326e4b935e018', 'Mencibir'),
('9942e02380aa3e428a12e1db0981fb38', 'Sedih'),
('3b3f33abe39697cd44b7f4da57e36c6d', 'Menunjuk Seseorang'),
('a62efc8c6d5f490d69d1b3912d6b273a', 'Memperagakan'),
('d85a54525f09b47776ebacbde7665499', 'Memotong'),
('3b504f2f0acfbb5bd0534097bac57785', 'Frustasi'),
('a527d46c164c05403bb378ae96758d6d', 'Sangat Marah'),
('7a4998b7251495cd21fe1c6a9d947394', 'Sangat Ramah'),
('a32977376d7b1d75c98aa7d34e34f2d1', 'ke. . .'),
('7c98332e29d5f0515f2eab7b0bcf11e7', 'Menunjuk. . .'),
('cab5d3cd8463a638d7068ab48592d8ff', 'Pelan'),
('cd7816265db73b5c7732d1739e21b47b', 'Cuek'),
('a611e69ba0041c07249219d3294777e0', 'Serius'),
('425fee9339989a9357c1bb04e038bcb3', 'Bernyanyi'),
('e81f2581be9ba1a1c85402243b68649a', 'Kaget'),
('25a68eacfc2e9236e8d70ad2535cfd91', 'Berpikir'),
('40825cdb131f5b3e8acd5798ced21682', 'Memanggil'),
('45d055d6c9fdbd0020ff765f7ca9143f', 'Berbisik'),
('6567146b221fda714a0eb77527806374', 'Mengangguk Setuju'),
('a8ea53b699eb6d93b8375f2ed81fbcfd', 'Teringat Sesuatu'),
('37e1756a2bc354b78dcc0d849d44a3ab', 'Rileks'),
('237e9b81101fa7dd83f061b49a25719f', 'Ragu - ragu bicara'),
('48a30f26f052822e20dbb90d0fe9287a', 'Berteriak'),
('fcb9e31e8bb53eb194734725e6f4d96a', 'Menyapa'),
('bdcba1d8b000785b98af74d77e69643d', 'Tegas'),
('3568c13c985da4acb2aac7a31d83d4ec', 'Tersentak'),
('2e32eacf09bb7c001809d3c42a489aeb', 'Bersahutan');

-- --------------------------------------------------------

--
-- Table structure for table `m_istilah`
--

CREATE TABLE IF NOT EXISTS `m_istilah` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `istilah` varchar(255) NOT NULL DEFAULT '',
  `keterangan` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_istilah`
--

INSERT INTO `m_istilah` (`kd`, `istilah`, `keterangan`) VALUES
('9214edc46e4d12788d93393fa5fbf557', 'Cut (in) to:', 'Perpindahan ke gambar/adegan lain secara langsung.'),
('649b857cc5603f10951b561da6300de7', 'Ext. (Exterior) :', 'Petunjuk adegan yang berlangsung di luar ruang.'),
('3b49b5b28da1f7bc04bf3dce7d3ced19', 'Int. (Intertior) :', 'Petunjuk adegan yang berlangsung didalam ruang.'),
('eadad5d3aa030259ddb803e902b70a86', 'Intercut:', 'Petunjuk adanya beberapa kejadian di beberapa tempat terpisah yang berlangsung dalam waktu bersamaan.'),
('87c5406990aeda6298056d169f9915fa', 'Montage:', 'Petunjuk adanya gabungan beberapa gambar (shots) yang saling berkaitan dan membentuk satu kesatuan ide.'),
('b482d6e9e9d9b751c14c427b17a30c59', 'OS (Off Screen):', 'Suara yang bersumber dari adegan yang sedang berlangsung tapi tak tampak dalam gambar di layar.'),
('db8abe2453cd18184646a72c50d2dc82', 'POV (Point of View):', 'Kamera menunjukkan sudut pandang dari satu karakter.'),
('21dd0e94ef4fd89779e490940deaacc8', 'VO (Voice Over):', 'Suara karakter yangtak bersumber dari adegan yang sedang berlangsung di layar.'),
('3c9f84619b260ae64946b26b0ac4f8bb', 'Dialog', 'Kalimat yang diciptakan oleh penulis skenario, yang nantinya diucapkan oleh seorang aktor. Dialog harus mewakili peran, karakter dan perasaan si tokoh dalam cerita.'),
('5904f54b0ca06443cf265e327318a370', 'Fade Out', 'Transisi gambar dari terang ke gelap dengan cara lambat.'),
('72e6a12a53f9ba62a97f674529464f82', 'Fade In', 'Transisi dari gelap ke terang dengan cara lambat.'),
('a8b36b35f2d1ca3a9d2f4dff859d2cfb', 'Flash Back', 'Cerita yang kembali pada waktu sebelum kejadian berlangsung.'),
('f2b71b2e3a427f8eefb778543b66b967', 'Scene', 'Kata lain dari adegan, yaitu bagian terkecil dari sebuah cerita.'),
('f014c23f0c04b417cca0a74369899e5c', 'Teaser', 'Adegan gebrakan, ditampilkan pada pembukaan atau awal cerita, yang tujuannya memancing penonton untuk menyaksikan kelanjutan cerita dibelakangnya.'),
('21c188a38ce33d38684ac85ca66193bb', 'Beat', 'Suatu penegasan dari perasaan seorang aktor pada suatu keadaan.');

-- --------------------------------------------------------

--
-- Table structure for table `m_lokasi`
--

CREATE TABLE IF NOT EXISTS `m_lokasi` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `lokasi` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_lokasi`
--

INSERT INTO `m_lokasi` (`kd`, `lokasi`) VALUES
('f960c19eca9f8f90049379c23d142f54', 'INT.'),
('bde542b6ea38bde0d986ec1c7fe97163', 'EXT.'),
('ac31ff54232153949b25447d065c1daa', 'EXT/INT.');

-- --------------------------------------------------------

--
-- Table structure for table `m_waktu`
--

CREATE TABLE IF NOT EXISTS `m_waktu` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `waktu` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_waktu`
--

INSERT INTO `m_waktu` (`kd`, `waktu`) VALUES
('d7aa9def29e74ee6303fc92fad5c4111', 'PAGI'),
('97a53c7213048c80c38ee28070606b34', 'SIANG'),
('8664ff4cb1245071a12e970713c31901', 'SORE'),
('95074e62ec9e64fba519be58477205f5', 'MALAM'),
('2fad1674a94ad579efa8c2037cf61498', 'TIDAK DIKETAHUI');

-- --------------------------------------------------------

--
-- Table structure for table `skenario`
--

CREATE TABLE IF NOT EXISTS `skenario` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_member` varchar(50) NOT NULL DEFAULT '',
  `judul` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skenario`
--

INSERT INTO `skenario` (`kd`, `kd_member`, `judul`) VALUES
('29e39f7c20fff29f0a770c25ed235ac8', 'dcdd17f7ecf3f7c97a685eed00666a93', 'ENTER Berondong'),
('bb06df696d9eb2b50dd75ad4caf9b7da', 'c82dcb50894f5dd4d02769a9d940c850', 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `skenario_c_jenis`
--

CREATE TABLE IF NOT EXISTS `skenario_c_jenis` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_skenario` varchar(50) NOT NULL DEFAULT '',
  `kd_jenis` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skenario_c_jenis`
--

INSERT INTO `skenario_c_jenis` (`kd`, `kd_skenario`, `kd_jenis`) VALUES
('fa981ce9af51105aab4f1038adbcfd73', '29e39f7c20fff29f0a770c25ed235ac8', '73853b0be0c5725e7351021c38b3eae2'),
('062deb218d7b22775d0a298fe27d54f8', 'bb06df696d9eb2b50dd75ad4caf9b7da', '56c0bf5b9dd0842ce4d4735541e220bd');

-- --------------------------------------------------------

--
-- Table structure for table `skenario_c_sasaran`
--

CREATE TABLE IF NOT EXISTS `skenario_c_sasaran` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_skenario` varchar(50) NOT NULL DEFAULT '',
  `kd_sasaran` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skenario_c_sasaran`
--

INSERT INTO `skenario_c_sasaran` (`kd`, `kd_skenario`, `kd_sasaran`) VALUES
('f6c7ba0ce8bcd79935af2ca06aaeeed8', '29e39f7c20fff29f0a770c25ed235ac8', 'cafe033aa44258375e6b5a260c4823d1'),
('2f585cb6d9914c75c383e15446caa2e6', 'bb06df696d9eb2b50dd75ad4caf9b7da', '280c87f314132e0e5c73e0ec471fcfb1');

-- --------------------------------------------------------

--
-- Table structure for table `skenario_c_tema`
--

CREATE TABLE IF NOT EXISTS `skenario_c_tema` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_skenario` varchar(50) NOT NULL DEFAULT '',
  `kd_tema` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skenario_c_tema`
--

INSERT INTO `skenario_c_tema` (`kd`, `kd_skenario`, `kd_tema`) VALUES
('0b78083bf3a04a09790259a3b519340b', '29e39f7c20fff29f0a770c25ed235ac8', '372af6d969d002f420f0bf6d6672dd5c'),
('f7d17280bf5195181c9bf8afe9a13a6d', 'bb06df696d9eb2b50dd75ad4caf9b7da', '372af6d969d002f420f0bf6d6672dd5c');

-- --------------------------------------------------------

--
-- Table structure for table `skenario_sceneplot`
--

CREATE TABLE IF NOT EXISTS `skenario_sceneplot` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_skenario` varchar(50) NOT NULL DEFAULT '',
  `nomer` varchar(50) NOT NULL DEFAULT '',
  `kd_lokasi` varchar(50) NOT NULL DEFAULT '',
  `tempat` varchar(50) NOT NULL DEFAULT '',
  `kd_waktu` varchar(50) NOT NULL DEFAULT '',
  `plot` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skenario_sceneplot`
--

INSERT INTO `skenario_sceneplot` (`kd`, `kd_skenario`, `nomer`, `kd_lokasi`, `tempat`, `kd_waktu`, `plot`) VALUES
('b9759922c81b67dea98fcb1fb23d6830', '29e39f7c20fff29f0a770c25ed235ac8', '2', 'ac31ff54232153949b25447d065c1daa', 'Rumah ALI', '8664ff4cb1245071a12e970713c31901', 'Mereka berdua berusaha masuk ke rumah ALI yang tidak terkunci.'),
('40fe71a966e576a9d31802adfc3bb6f6', '29e39f7c20fff29f0a770c25ed235ac8', '1', 'bde542b6ea38bde0d986ec1c7fe97163', 'Pasar Sore', '8664ff4cb1245071a12e970713c31901', 'ANDI dan ARIS berlarian. Mereka dikejar oleh POLISI. Susana pasar kacau.');

-- --------------------------------------------------------

--
-- Table structure for table `skenario_scene_deskripsi`
--

CREATE TABLE IF NOT EXISTS `skenario_scene_deskripsi` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_skenario` varchar(50) NOT NULL DEFAULT '',
  `kd_sceneplot` varchar(50) NOT NULL DEFAULT '',
  `nomer` varchar(50) NOT NULL DEFAULT '',
  `deskripsi` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skenario_scene_deskripsi`
--

INSERT INTO `skenario_scene_deskripsi` (`kd`, `kd_skenario`, `kd_sceneplot`, `nomer`, `deskripsi`) VALUES
('728bee8e9ad9d837caee674226a80142', '29e39f7c20fff29f0a770c25ed235ac8', '40fe71a966e576a9d31802adfc3bb6f6', '1', 'ANDI kelelahan, ARI menyadarinya.');

-- --------------------------------------------------------

--
-- Table structure for table `skenario_scene_dialog`
--

CREATE TABLE IF NOT EXISTS `skenario_scene_dialog` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_skenario` varchar(50) NOT NULL DEFAULT '',
  `kd_sceneplot` varchar(50) NOT NULL DEFAULT '',
  `kd_deskripsi` varchar(50) NOT NULL DEFAULT '',
  `nomer` varchar(50) NOT NULL DEFAULT '',
  `pemain` varchar(255) NOT NULL DEFAULT '',
  `dialog` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skenario_scene_dialog`
--

INSERT INTO `skenario_scene_dialog` (`kd`, `kd_skenario`, `kd_sceneplot`, `kd_deskripsi`, `nomer`, `pemain`, `dialog`) VALUES
('4fac14f354cedca867c551e2d64b0f68', '29e39f7c20fff29f0a770c25ed235ac8', '40fe71a966e576a9d31802adfc3bb6f6', '728bee8e9ad9d837caee674226a80142', '3', 'ANDI', 'aduh lega rasanya. masih jauh ya?'),
('18dd98e89842ae9193ead25f18fca931', '29e39f7c20fff29f0a770c25ed235ac8', '40fe71a966e576a9d31802adfc3bb6f6', '728bee8e9ad9d837caee674226a80142', '2', 'ARI', 'Oke. kita berteduh di pohon itu dulu.'),
('236f29bd0c95e7f2b40e5df0c0f37c0c', '29e39f7c20fff29f0a770c25ed235ac8', '40fe71a966e576a9d31802adfc3bb6f6', '728bee8e9ad9d837caee674226a80142', '1', 'ANDI', 'Waduh, lelah banget nih gue. berhenti bentar ya.');

-- --------------------------------------------------------

--
-- Table structure for table `skenario_scene_pemain`
--

CREATE TABLE IF NOT EXISTS `skenario_scene_pemain` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_skenario` varchar(50) NOT NULL DEFAULT '',
  `kd_sceneplot` varchar(50) NOT NULL DEFAULT '',
  `pemain` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skenario_scene_pemain`
--

INSERT INTO `skenario_scene_pemain` (`kd`, `kd_skenario`, `kd_sceneplot`, `pemain`) VALUES
('24817e419a9ebef241cf3206b4f4f92a', '29e39f7c20fff29f0a770c25ed235ac8', '40fe71a966e576a9d31802adfc3bb6f6', 'ANDI, ARI'),
('7760616e7e309e6d2cf2884c910932c8', 'b4873f8e7b69d2f70fa3d54e7ced4aa1', 'f2430de0f492834a4fe53c45d389ff08', 'RAHMAN, INDRO'),
('50abfe55dee2ef8f0224045798e13526', '5de2c9e3743ecb55bca0d8861abcf687', 'a9e9e64d0395ca4a72b0d0dfb6a6ea8a', 'ALI, indra, rohaye');

-- --------------------------------------------------------

--
-- Table structure for table `skenario_set_tempat`
--

CREATE TABLE IF NOT EXISTS `skenario_set_tempat` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_skenario` varchar(50) NOT NULL DEFAULT '',
  `tempat` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skenario_set_tempat`
--

INSERT INTO `skenario_set_tempat` (`kd`, `kd_skenario`, `tempat`) VALUES
('9b4edf0c34becf18ad4269186b7b8dc2', '29e39f7c20fff29f0a770c25ed235ac8', 'jakarta'),
('7b86e8938aa8db4ff850e7ab605ceb89', 'bb06df696d9eb2b50dd75ad4caf9b7da', '-');

-- --------------------------------------------------------

--
-- Table structure for table `skenario_set_waktu`
--

CREATE TABLE IF NOT EXISTS `skenario_set_waktu` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_skenario` varchar(50) NOT NULL DEFAULT '',
  `waktu` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skenario_set_waktu`
--

INSERT INTO `skenario_set_waktu` (`kd`, `kd_skenario`, `waktu`) VALUES
('64d0196384643a8193358a50235f7ca6', '29e39f7c20fff29f0a770c25ed235ac8', 'abad ke-16'),
('39b07192e093b0ef6d2d9e4c305df837', 'bb06df696d9eb2b50dd75ad4caf9b7da', '-');

-- --------------------------------------------------------

--
-- Table structure for table `skenario_sinopsis`
--

CREATE TABLE IF NOT EXISTS `skenario_sinopsis` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_skenario` varchar(50) NOT NULL DEFAULT '',
  `sinopsis` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skenario_sinopsis`
--

INSERT INTO `skenario_sinopsis` (`kd`, `kd_skenario`, `sinopsis`) VALUES
('e8a57af55c7a431887eb58d6d0578397', '29e39f7c20fff29f0a770c25ed235ac8', 'Enaknya berondong bro. .. \r\n\r\napalagi gitu bro. ..'),
('a42e0a90333e6955e15e1fd501e3627a', 'bb06df696d9eb2b50dd75ad4caf9b7da', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `skenario_tokoh`
--

CREATE TABLE IF NOT EXISTS `skenario_tokoh` (
  `kd` varchar(50) NOT NULL DEFAULT '',
  `kd_skenario` varchar(50) NOT NULL DEFAULT '',
  `nama` varchar(255) NOT NULL DEFAULT '',
  `panggilan` varchar(255) NOT NULL DEFAULT '',
  `usia` varchar(255) NOT NULL DEFAULT '',
  `fisik` longtext NOT NULL,
  `psikis` longtext NOT NULL,
  `status` longtext NOT NULL,
  `agama` longtext NOT NULL,
  `profesi` longtext NOT NULL,
  `cirikhusus` longtext NOT NULL,
  `latarbelakang` longtext NOT NULL,
  `peran` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skenario_tokoh`
--

INSERT INTO `skenario_tokoh` (`kd`, `kd_skenario`, `nama`, `panggilan`, `usia`, `fisik`, `psikis`, `status`, `agama`, `profesi`, `cirikhusus`, `latarbelakang`, `peran`) VALUES
('b2a9179e1a7956502126153bfd91a901', '29e39f7c20fff29f0a770c25ed235ac8', 'arian tono', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'),
('70e9087e8afdc3ef1afb0a7b6123cf00', '29e39f7c20fff29f0a770c25ed235ac8', 'sukma aulia', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
