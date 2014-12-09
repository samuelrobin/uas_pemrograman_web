-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2014 at 01:28 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `hashed_password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `hashed_password`) VALUES
(4, 'semoga', '$2a$10$Salt22CharacterOrMoreexuq5UU9t0PtU13HUdKZaDD1auSsUhee'),
(5, 'admin', '$2a$10$MWE0M2UyNWM5ZjgyYzEyM.ORpuewHow2hwKxi2gGlnIuPRVs5vA3u');

-- --------------------------------------------------------

--
-- Table structure for table `ask`
--

CREATE TABLE IF NOT EXISTS `ask` (
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `topik` varchar(30) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pasta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ask`
--

INSERT INTO `ask` (`nama`, `email`, `topik`, `pertanyaan`, `pasta`) VALUES
('Darwis', 'asd', 'asd', 'asd', 'asd'),
('Darwis', 'semoga.bisa@Yahoo.com', 'Bau Mulut', 'haaaaaa', 'darley');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `atas` varchar(50) NOT NULL,
  `bawah` varchar(50) NOT NULL,
  `banner` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `atas`, `bawah`, `banner`) VALUES
(1, 'ASD', 'ini contoh', 'adssd', 'images/logo.png'),
(2, 'asd', 'ini contoh', 'alskdjalskdjalsk jdlkajsl', 'images/spit.gif'),
(3, 'apa?', 'ini contoh', 'tolong diganti ya!', 'images/banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `body` text NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `title`, `body`, `gambar`) VALUES
(1, 'test', 'test', 'gambar/2026520-flash.jpg'),
(2, 'gambar dua', 'oy ', 'gambar/logo1.png'),
(3, 'asd', '', 'images/Hydrangeas.jpg'),
(4, 'logo', '', 'images/logoarea.jpg'),
(5, 'asd', '', 'images/aw.JPG'),
(6, 'pepo', '', 'images/logo.png'),
(7, 'asd', '', 'images/miku].gif'),
(8, 'asd', '', 'images/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `position` int(3) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `subject_id`, `menu_name`, `position`, `visible`, `content`) VALUES
(1, 1, 'Bau Mulut', 1, 1, '<b>Mitos Seputar Bau Mulut</b>\r\n\r\nBau mulut atau halitosis terkadang membuat rasa percaya diri kita berkurang. Hal ini membuat takut untuk ngobrol dengan kerabat, atau membuat kita jadi sedikit bicara sehingga terkesan bahwa kita tidak terlalu ?terlibat? dalam percakapan tersebut. Ada beberapa mitos yang harus diketahui seputar bau mulut, seperti:\r\n\r\nBerkumur dengan mouthwash saja cukup untuk mengusir bau mulut.\r\nMungkin cara yang paling sering dilakukan ialah berkumur dengan mouthwash secara rutin, karena dianggap ampuh untuk menghilangkan bau mulut dengan cepat. Obat kumur memang efektif hilangkan bau mulut, namun harus diingat, obat kumur hanya akan menghilangkan bau mulut untuk sementara, karena sifatnya mengurangi plak dan membunuh kuman penyebab bau mulut saat itu saja. Rajinlah menggosok gigi setidaknya 2 kali sehari, setelah itu berkumurlah dengan mouthwash untuk mencegah kuman tumbuh dengan cepat.\r\n\r\nCek bau mulut dengan menghembuskan nafas ke tangan.\r\nIni merupakan pengertian salah. Ketika bernafas, kita tidak menggunakan tenggorokan Anda dengan cara yang sama saat kita berbicara. Ketika berbicara, mulut kita cenderung membawa keluar bau dari bagian belakang mulut yang tidak bisa diketahui hanya dengan bernafas. Selain itu, kita cenderung terbiasa dengan bau mulut kita sendiri, sehingga sulit bagi seseorang untuk mengetahui apakah dia memiliki bau mulut.\r\n\r\nBau mulut bisa hilang dengan menyikat gigi dengan cepat.\r\nKebanyakan orang hanya menyikat gigi selama 30-45 detik. Padahal untuk membersihkan secara menyeluruh, kita butuh minimal dua menit setiap kali menggosok gigi, dan dilakukan sedikitnya dua kali dalam sehari. Kita juga perlu menyikat bagian lidah, rajin membersihkan sela-sela gigi menggunakan benang, ini untuk bantu menghilangkan plak berbahaya dan partikel makanan yang masih tersisa.\r\n\r\nNah setelah membaca artikel diatas, pastikan bahwa kamu telah membersihkan dan merawat gigi dan mulut dengan benar ya. Jika bau mulut tetap berkelanjutan, segera hubungi dokter gigi.'),
(2, 1, 'Gigi Berlubang', 2, 1, '<b>Bagaimana Gigi Berlubang Terbentuk?</b>\r\n\r\nLubang gigi terbentuk ketika bakteri di dalam mulut kita merusak gigi. Lubang gigi yang terbentuk dimulai dari ukuran yang sangat kecil pada email gigi. Bila dibiarkan saja, lubang kecil tersebut akan semakin membesar dan merusak struktur gigi lebih dalam, bahkan dapat mencapai syaraf gigi yang menyebabkan sakit gigi yang parah sampai terasa nyut-nyutan. Sehingga terkadang alternatif perawatan untuk lubang gigi yang dibiarkan membesar dan mengenai seluruh jaringan gigi hanyalah pencabutan gigi karena gigi tersebut sudah tidak tertolong atau tidak dapat dipertahankan. Secara alami kita memiliki ribuan bakteri di dalam mulut kita. Makanan bagi bakteri yang ada di dalam mulut kita adalah gula yang dalam proses pencernaan atau fermentasinya akan menghasilkan asam yang secara kimiawi merusak gigi kita dan menyebabkan lubang gigi.\r\n\r\nPertama, bakteri memakan gula yang kita konsumsi. Kapanpun kita mengonsumsi makanan dan minuman yang mengandung gula akan membuat mulut kita juga penuh dengan gula. Bakteri mengonsumsi gula dan kemudian menghasilkan asam. Asam ini melekat pada permukaan gigi sampai dibersihkan oleh air liur kita atau dibersihkan saat kita menyikat gigi. Jika asam ini dibiarkan saja akan mulai menggerogoti email gigi.\r\n\r\nKumpulan bakteri yang berkembang biak tersebut terkandung di dalam plak gigi. Di mana plak ini mudah untuk dibersihkan atau dihilangkan, baik dengan menyikat gigi atau pun menggunakan benang gigi untuk membersihkan di bagian sela-sela gigi. Bila tidak dibersihkan, plak akan menyerap kalsium dan mineral lain untuk membentuk perlindungan diri dan semakin sulit untuk dibersihkan. Ketika lubang gigi mulai terbentuk, kita mungkin tidak bisa melihatnya secara kasat mata. Jika asam dibiarkan terus berada pada permukaan gigi, ia akan mulai “memakan” permukaan gigi secara besar-besaran. Bakteri akan masuk dan semakin berkembang biak di lubang tersebut dan mengonsumsi lebih banyak gula dan menghasilkan lebih banyak asam. Proses tersebut terus berlanjut sampai merusak dentin bahkan syaraf.\r\n\r\nButuh waktu untuk terbentuk lubang gigi. Perlindungan terbaik untuk melawannya salah satunya adalah dengan membatasi jumlah gula yang kita konsumsi. Bila Anda memakan atau meminum sesuatu yang manis segeralah berkumur dengan air putih. Menyikat gigi lah 2 kali sehari, pagi setelah sarapan dan malam sebelum tidur. Menggunakan benang gigi atau dental floss untuk membersihkan sela-sela gigi dan temui dokter gigi Anda 6 bulan sekali.     '),
(3, 2, 'Toothbrush', 1, 1, '<img src="images/sikat/1.png"></br>Sensitive Expert</br>\r\nManfaat: Sikat gigi Pepsodent Sensitive Expert dengan teknologi bulu sikat <i>Micro Flaggered</i> membuat bulu sikat jadi 3x lebih lembut dibandingkan sikat gigi biasa. Lembut di gusi dan dapat membersihkan gigi secara efektif. Dengan gagang sikat yang lebih besar untuk kenyamanan menyikat gigi.\r\n<img src="images/sikat/2.png"></br>Ultra Reach </br> \r\nManfaat: Pepsodent Vertical Expert, sikat gigi pertama dengan bulu sikat berbentuk kipas, memudahkan penyikatan gigi secara vertikal sesuai rekomendasi dokter gigi. Terbukti secara klinis membersihkan gigi lebih baik*. <i>*) Studi klinis tentang kemampuan menghilangkan plak terhadap 117 subyek dibandingkan dengan sikat gigi berbulu rata.</i></br>\r\n<img src="images/sikat/3.png"></br>Vertical Expert</br>\r\nManfaat: Pepsodent Ultra Reach, sikat gigi pertama dengan inti logam yang terinspirasi dari peralatan dokter gigi, mampu menjangkau gigi paling belakang dengan mudah untuk membersihkan hingga ke sela-sela gigi. Lebih efektif dalam membersihkan plak pada gigi.\r\n'),
(8, 2, 'Tootpaste', 2, 1, '<img src="images/pasta/2.jpg">\r\nExpert Protection - Original\r\nManfaat: Perlindungan total terlengkap dari Pepsodent. Terinspirasi dari saran para ahli atas penggunaan pasta gigi, dental floss dan mouthwash, Pepsodent Expert Protection adalah pasta gigi paling mutakhir dari Pepsodent yang dapat memberikan perlindungan penyeluruh untuk kesehatan mulut keluarga Anda.\r\nFormulasi: Dengan kandungan Microgranules, butiran-butiran halusnya mampu membersihkan hingga ke sela-sela gigi, dan dengan kandungan Zinc-Citrate dapat memberikan perlindungan terhadap bakteri dan plak hingga 24 jam.\r\n\r\n<img src="images/pasta/3.jpg">\r\nExpert Protection - Gentle White\r\nManfaat: Perlindungan total terlengkap dari Pepsodent. Terinspirasi dari saran para ahli atas penggunaan pasta gigi, dental floss dan mouthwash, Pepsodent Expert Protection - Gentle White adalah pasta gigi paling mutakhir dari Pepsodent yang dapat memberikan perlindungan penyeluruh untuk kesehatan mulut keluarga Anda, serta membuat gigi tampak lebih putih alami.\r\n\r\n'),
(11, 12, 'Ask The Dentist', 1, 1, '<form action="ask.php" method="post">\r\n<b>Ask The Dentist</b>\r\nKirimkan pertanyaan Anda kepada dokter gigi kami, dan jawabannya\r\nakan kami kirimkan kepada Anda hari Selasa setiap minggunya.\r\nNAMA :\r\n<input type="text" name="nama" value=""/>\r\nEMAIL :\r\n<input type="text" name="email" value=""/>\r\nTOPIK :\r\n<select name="topik">\r\n	<option value="Bau Mulut">Bau Mulut</option>\r\n	<option value="Gigi Berlubang">Gigi Berlubang</option>\r\n	<option value="Gigi Geraham">Gigi Geraham</option>\r\n	<option value="Gigi Putih">Gigi Putih</option>\r\n	<option value="Gigi Sensitif">Gigi Sensitif</option>\r\n	<option value="Gigi Susu">Gigi Susu</option>\r\n	<option value="Masalah">Masalah Gusi</option>\r\n	<option value="Penyakit Gigi & Mulut">Penyakit Gigi & Mulut</option>\r\n	<option value="Perawatan Mulut">Perawatan Mulut</option>\r\n	<option value="Plak & Karang Gigi">Plak & Karang Gigi</option>\r\n</select>\r\nPERTANYAAN :\r\n<textarea name="pertanyaan" rows="10" cols="40"></textarea></br>\r\nPASTA GIGI YANG DIGUNAKAN :\r\n<input type="text" name="pasta" value=""/>\r\n<input type="submit" name="submit" value="KIRIM" />\r\n</form>');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) NOT NULL,
  `position` int(3) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `menu_name`, `position`, `visible`) VALUES
(1, 'Toothnews', 1, 1),
(2, 'Products', 3, 1),
(12, ' Ask The Dentist', 3, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
