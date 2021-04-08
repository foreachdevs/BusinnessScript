-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 08 Nis 2021, 07:53:45
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `foreach`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `usn` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `imgpath` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `administrators`
--

INSERT INTO `administrators` (`id`, `usn`, `pass`, `name`, `imgpath`, `email`) VALUES
(1, 'emrebey', '2ae7ff4bc40ad163335a090fb47e3bea', 'Emre Can Temur', 'https://i.hizliresim.com/3QDyG0.png', 'emrecantemurofficial@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bagislar`
--

DROP TABLE IF EXISTS `bagislar`;
CREATE TABLE IF NOT EXISTS `bagislar` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `adsoyad` varchar(255) NOT NULL,
  `tutar` int(255) NOT NULL,
  `telno` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `bagislar`
--

INSERT INTO `bagislar` (`id`, `adsoyad`, `tutar`, `telno`) VALUES
(1, 'Deneme İsim', 500, '0555 333 66 44'),
(2, '1', 1, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `icerik` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tarih` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`id`, `baslik`, `resim`, `icerik`, `slug`, `tarih`) VALUES
(1, 'Merhaba Dünya !', 'www.google.com/logo.png', 'Merhaba D&uuml;nya bir yazı testidir.', 'hello-world', '2021-04-07'),
(6, 'klhkjhjk', 'kjhjklhkjh', 'hjklkjhkjlhkjlh', 'jhkkjlhlkj', '2021-04-07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

DROP TABLE IF EXISTS `iletisim`;
CREATE TABLE IF NOT EXISTS `iletisim` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `adsoyad` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `konu` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `adsoyad`, `mail`, `baslik`, `konu`) VALUES
(1, 'Ali Salam', 'Deneme', 'Deneme', 'Deneme 2132153435dskldjsflsşdfsd54gsd5g43sd54g53d4g52dfs4g52sdf7gh52fd7g52sdf75gfds5g7dfs58g7ds58gfd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `online`
--

DROP TABLE IF EXISTS `online`;
CREATE TABLE IF NOT EXISTS `online` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `salter` varchar(255) NOT NULL,
  `keywd` varchar(255) NOT NULL,
  `aciklama` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `site`
--

INSERT INTO `site` (`id`, `title`, `tema`, `salter`, `keywd`, `aciklama`) VALUES
(1, 'Deneme Title', '', '', 'deenme,deneme,deneme', 'Deneme 123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
