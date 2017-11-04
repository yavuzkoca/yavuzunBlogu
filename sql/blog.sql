-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Mar 2017, 17:38:12
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `check_like`
--

DROP TABLE IF EXISTS `check_like`;
CREATE TABLE IF NOT EXISTS `check_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_id` int(11) NOT NULL,
  `yazi_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `check_like`
--

INSERT INTO `check_like` (`id`, `kullanici_id`, `yazi_id`) VALUES
(1, 10, 32),
(4, 10, 21),
(5, 10, 18),
(6, 10, 17),
(7, 18, 32),
(8, 18, 21),
(9, 18, 17),
(10, 10, 9),
(11, 10, 33);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `kategori_adi`) VALUES
(1, 'siirler'),
(2, 'hikaye'),
(3, 'masal'),
(4, 'diger'),
(5, 'onerilerim'),
(6, 'fotograflar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(45) NOT NULL,
  `sifresi` text NOT NULL,
  `profil_resmi` text NOT NULL,
  `kayit_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yetki_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=19 ;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `adi`, `sifresi`, `profil_resmi`, `kayit_tarihi`, `yetki_id`) VALUES
(10, 'ghostboy08', '6532565bfe14d5e9c0784398739e3901', '0', '2017-01-29 17:46:17', 3),
(11, 'alitolgafree', 'e807f1fcf82d132f9bb018ca6738a19f', '0', '2017-01-29 17:47:47', 1),
(12, 'alitolga', '61ee74b9a4c2a5318a825c088f7d6cce', '0', '2017-01-30 07:31:33', 1),
(13, 'berkyalabik34', 'e807f1fcf82d132f9bb018ca6738a19f', '0', '2017-02-22 12:45:04', 1),
(17, 'escape123', 'e807f1fcf82d132f9bb018ca6738a19f', '0', '2017-03-16 14:09:19', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `like_table`
--

DROP TABLE IF EXISTS `like_table`;
CREATE TABLE IF NOT EXISTS `like_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `yazi_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `like_table`
--

INSERT INTO `like_table` (`id`, `yazi_id`, `number`) VALUES
(1, 21, 46),
(2, 18, 14),
(3, 17, 12),
(4, 9, 10),
(5, 32, 6),
(6, 35, 0),
(7, 33, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

DROP TABLE IF EXISTS `yazilar`;
CREATE TABLE IF NOT EXISTS `yazilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `alt_baslik` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yazan` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kategori` int(20) NOT NULL,
  `resim` text CHARACTER SET utf8 COLLATE utf8_turkish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci AUTO_INCREMENT=34 ;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`id`, `baslik`, `alt_baslik`, `icerik`, `yazan`, `tarih`, `kategori`, `resim`) VALUES
(9, 'NVIDIA, Oyunculara Watch Dogs 2''yi Hediye Ediyor!', 'NVIDIA GeForce GTX 1080 ve 1070 ile Watch Dogs 2 hediyeli!', 'NVIDIA yeni oyun bundle kampanyasını duyurdu. Gears of War 4 bundle kampanyasını 21 Kasım 2016 tarihinde bitiren NVIDIA, tam 1 gün ara ile yeni oyun bundle kampanyasını başlatarak oyuncular tarafından PC sürümü sabırsızlıkla beklenen Watch Dogs 2 oyununun GeForce GTX 1080 ve 1070 ürünleri ile hediye edileceğini duyurdu.\r\n\r\nBir yandan; Overwatch, Gears of War 4, Paragon, Battlefield 1, Civilization 6, Forza Horizon 3, Titanfall 2 ve şimdi de Watch Dogs 2 bu yıl PC tarafında görsel şölen performansları ile 2016''ya damgasını vururken, diğer tarafta; VR ve 4K teknolojileri, PC''nin ne kadar üstün bir oyun performansı sunduğunu kanıtlar nitelikte.\r\n\r\nWatch Dogs 2 PC sürümü 4K oyun deneyimi avantajı yanısıra adeta bir görsel zenginlik kaynağı. Zira oyun, şu sıralanan NVIDIA GameWorks teknolojilerini içermekte:\r\n\r\nZengin, detaylı ve gerçekçi gölgeler için: HBAO+\r\nDüzgün ve berrak görseller için: TXAA  \r\nDoğru gölgendirme için: HFTS + PCSS\r\nMuhteşem oyun-içi fotoğraflar için: NVIDIA ANSEL\r\nWatch Dogs 2 bundle kampanyası; performansları itibariyle halen rakipsiz konumda olan GeForce GTX 1080 ve 1070 ile güçlendirilen masaüstü ve dizüstü bilgisayarlar için geçerli. Kampanya ile aynı zamanda, Watch Dogs 2 yarışmasını da bugün duyuran NVIDIA, tüm oyun severleri bu eğlenceli ve bol ödüllü yarışmaya katılmaya çağırıyor.   ', 3, '2016-11-24 13:24:12', 4, '0'),
(17, 'Sanat, Tasarım ve Teknoloji...', 'Barış Özcan, Youtube bu alanlarda çalışmalar yaparak fenomenliğini kazanmış düzeyde nadir insanlardan birisidir.', '23.7.1974 İstanbul doğumlu.\r\nM.Ü. Hukuk Fakültesi mezunu.\r\nEvli ve 1 çocuk babası.\r\nAbak.us kreatif medya ajans başkanı.\r\nAbak.us; THY, LC Waikiki, Türk Telekom gibi firmaların video içerik\r\nve sunum ajansı.\r\nApple, Adobe ve LinkedIn gibi uluslararası yazılım firmalarına\r\ndanışmanlık ve sosyal medya hizmeti verdi.\r\nGeçmişte Photoshop, Flash, PDF gibi yazılım ürünlerini geliştiren Adobe’de 6\r\nyıl boyunca Akdeniz Ülkeleri Satış Müdürlüğü yaptı.\r\nTRT, el-Cezire, CNNTürk gibi kanallarda yayınlanan belgeseller\r\nyaptı ve yönetti.\r\nKişisel belgesellerini YouTube’da yapmaya devam ediyor. Sanat, tasarım ve teknoloji hikayelerini 250.000’den fazla kişi 10 milyondan çok kez izledi.\r\nBugüne kadar kurumlarda ve konferanslarda yüzlerce konuşma yaptı.\r\nProfesyonel bir keynote speaker ve TEDx konuşmacısı.\r\nYouTube’un dünya çapında seçtiği 12 değişim elçisinden biri oldu. ', 3, '2016-12-07 22:15:05', 5, 'baris_ozcan.png'),
(18, 'Sessiz Gemi', 'Yahya Kemal Beyatlı''nın o muhteşem eseri...', 'Artık demir almak günü gelmişse zamandan,\r\n  Meçhule giden bir gemi kalkar bu limandan.\r\n  Hiç yolcusu yokmuş gibi sessizce alır yol;\r\n  Sallanmaz o kalkışta ne mendil ne de bir kol.\r\n  Rıhtımda kalanlar bu seyahatten elemli,\r\n  Günlerce siyah ufka bakar gözleri nemli.\r\n  Biçare gönüller! Ne giden son gemidir bu!\r\n  Hicranlı hayatın ne de son matemidir bu!\r\n  Dünyada sevilmiş ve seven nafile bekler;\r\n  Bilmez ki giden sevgililer dönmeyecekler.\r\n  Birçok gidenin her biri memnun ki yerinden,\r\n  Birçok seneler geçti; dönen yok seferinden.', 3, '2016-12-07 22:36:22', 1, 'sessiz_gemi.png'),
(21, 'Atatürk Arboretrumu', '0', '<p>The one''s who don''t see their struggles beneath the water, they jealous of that calm life. However, if they would be contented with given for themselves, Good Mornings don''t imitate good night''s</p>\r\n\r\n<p>Suyun altındaki çırpınışları göremeyenler, o sakin hayatları kıskanır dururlar.. Oysa, kendine verilenle yetinselerdi; Günaydın''lar, iyi geceler''e özenmezdi</p>              ', 3, '2017-03-04 18:41:04', 6, 'DSC_0013_1.JPG'),
(32, 'Güneş Yüzünü Gösterdi!!', '0', 'Güneşi fırsat bilen IEEE Kulübü CS komitesi, haftasonunu Yazılım Maratonu için harcadı. 25 takım toplamda 65 kişinin katıldığı yarışmada birinciliği Pokybird alırken Nelly ikinci oldu. Birinci takıma Mac-Book ödülünün verilmesi yanı sıra çeşitli şirketlerin yaptığı sunumlar, öğrencilerin dikkatini çekti. ', 10, '2017-03-15 23:02:38', 4, 'DSC_0011_2.JPG'),
(33, 'Gece Çekimi', 'Işığın minimum seviyeye ulaştığı gecelerde, kaliteli ve kusursuz bir fotoğraf çekmenin sırları', '<p>Bir fotoğraf makinesinde üç önemli ana unsur bulunur. Bunlar: Shutter Speed(Enstantane), Aperture(Diyafram açıklığı) ve ISO. \n</p> \n<p><h6>Enstantane</h6>Enstantane, makineden içeriye süzülecek olan ışığın kaç saniye boyunca geçeceğini ayarlamaya yarar. Enstantane değerini ne kadar yükseltirseniz(1 saniye, 2 saniye), size o kadar parlak bir kare verir. Unutmadan da söylemek gerekir ki, bu süreyi ne kadar uzatırsanız, fotoğrafın da o kadar bulanık çıkmasını sağlarsınız. Bunun için bir tripod kullanmanızı tavsiye ederim.</p>\n', 10, '2017-03-22 17:08:53', 6, 'DSC_0091_1.JPG');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE IF NOT EXISTS `yorumlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yorum` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yazi_id` int(11) NOT NULL,
  `zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 COLLATE=utf16_turkish_ci AUTO_INCREMENT=86 ;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `kullanici_adi`, `yorum`, `yazi_id`, `zaman`) VALUES
(15, 'Yavuz', 'Gerçekten Kaliteli bir insan..', 17, '2017-01-24 21:00:00'),
(16, 'Yavuz', 'Ve gerçekten işinde iyi..', 17, '2017-01-24 21:00:00'),
(31, 'alitolga', 'güzel şiir', 18, '2017-01-24 21:00:00'),
(53, 'yavuz', 'Teşekkür ederim alitolga :)', 18, '2017-01-24 21:00:00'),
(58, 'yavuz', 'hehehe :)', 18, '2017-01-24 23:48:26'),
(60, 'ghostboy08', 'Harika! ', 21, '2017-02-19 11:36:21'),
(62, 'ghostboy08', 'Selam Dunyalı', 21, '2017-02-22 12:47:27'),
(80, 'ghostboy08', 'Harika bir etkinlikti.\nGuide''lara ayrıca\nteşekkürler..', 32, '2017-03-15 23:07:32'),
(82, 'escape123', 'gerçekten harika bir\netkinlikti. kaçırdığım\niçin çok üzgünüm...', 32, '2017-03-16 14:10:06'),
(83, 'ghostboy08', 'Yazının devamı yakında\nyayımlanacaktır', 33, '2017-03-22 19:22:00'),
(84, '1', 'a', 33, '2017-03-25 15:36:02'),
(85, '1', 'LOL', 33, '2017-03-25 15:45:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
