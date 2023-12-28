-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 26 Ara 2023, 20:01:52
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `afiyetolsun`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `user_id` int(11) NOT NULL,
  `ad` varchar(255) DEFAULT NULL,
  `soyad` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kullanici` varchar(40) NOT NULL,
  `sifre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`user_id`, `ad`, `soyad`, `email`, `kullanici`, `sifre`) VALUES
(16, 'irem', 'kochan', 'ireemkochn@gmail.com', 'irem', '$2y$10$UguxSXgl0G.aITmUSl.rBOHt46OSaegneRZL6JJttu4Cp5i3FaZQG'),
(17, 'iro', 'kochan', 'iro@gmail.com', 'iro', '$2y$10$VRoSTlduHZUXOs9WOEhJsO08vyu59NnL.VpIocQlEQv88r8VSEhxW');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE `yorum` (
  `yapan` int(11) NOT NULL,
  `yapilan` int(11) NOT NULL,
  `metin` text NOT NULL,
  `zaman` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yukle`
--

CREATE TABLE `yukle` (
  `user_id` int(11) NOT NULL,
  `yemek` varchar(255) NOT NULL,
  `dosyayolu` varchar(255) NOT NULL,
  `tur` varchar(255) NOT NULL,
  `kimyukledi` varchar(50) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`yapan`,`yapilan`,`zaman`),
  ADD KEY `yapilan` (`yapilan`);

--
-- Tablo için indeksler `yukle`
--
ALTER TABLE `yukle`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `yukle`
--
ALTER TABLE `yukle`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
