-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 07 Oca 2024, 18:23:05
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `classroom`
--
CREATE DATABASE IF NOT EXISTS `classroom` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `classroom`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `belgesel`
--

DROP TABLE IF EXISTS `belgesel`;
CREATE TABLE `belgesel` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `belgeselaciklama` varchar(255) NOT NULL,
  `belgeseltur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dosyayolu` varchar(255) NOT NULL,
  `kimyukledi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `belgesel`
--

INSERT INTO `belgesel` (`id`, `baslik`, `belgeselaciklama`, `belgeseltur`, `dosyayolu`, `kimyukledi`) VALUES
(1, 'Deneme Yeni', 'çok iyi', 'doga', 'yuklenenler/1703107020foto.jpg', '3'),
(2, 'Deneme Yeni', 'çok iyi', 'doga', 'yuklenenler/1703107118foto.jpg', '3'),
(3, 'Deneme Yeni', 'çok iyi', 'doga', 'yuklenenler/1703107148foto.jpg', '3'),
(4, 'Deneme Yeni', 'çok iyi', 'doga', 'yuklenenler/1703107160foto.jpg', '3'),
(5, 'Belgesel Örnek', 'Çok başarılı', 'insan', 'yuklenenler/1703234876pc4.jpeg', '6'),
(6, 'Evren', 'Çok iyi', 'bilim', 'yuklenenler/1703236723', '6'),
(7, 'Deneme', 'Çok başarılı', 'suc', 'yuklenenler/170332764710 Saniyelik Geri Sayım Sayacı _ Ten Second Countdown Timer.mp4', '6'),
(8, 'Çitalar', 'Bilgilendirici', 'Doğa', 'yuklenenler/1704566285cita.jpg', '7'),
(9, 'Kuşlar', '', '', 'yuklenenler/1704567591_', '7');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

DROP TABLE IF EXISTS `uye`;
CREATE TABLE `uye` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) NOT NULL,
  `soyisim` varchar(255) NOT NULL,
  `kullanici` varchar(255) NOT NULL,
  `eposta` varchar(255) NOT NULL,
  `bolum` varchar(255) DEFAULT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`id`, `isim`, `soyisim`, `kullanici`, `eposta`, `bolum`, `sifre`) VALUES
(1, 'Handan', 'Çalhan', 'handancalhan', 'handancalhan.hc@gmail.com', 'BÖTE', '1234'),
(2, 'Fatma', 'Demir', 'fatmademir', 'fatmademir@gmail.com', 'Fen', '$2y$10$Bt5oQp7zzguNyEZOF5G1vOqlc0hdiXumj99B6CfCFUGwXGSjH/vti'),
(3, 'Ali', 'Aydın', 'ali\'\"aydın', 'aliaydin@gmail.com', 'Tıp', '$2y$10$Lo1qDR8fCBTM.Z3ntcXqQ.PvkqPsaVUlLGQuX1rv6uz1bkU95hyaa'),
(4, 'A\'<br>\"b', 'A\'<br>\"b', 'aaa', 'deneme@gmail.com', 'Resim', '$2y$10$WqMfl5kqZK18SBcp0S/qV.gD37LTyrtWR/1qU8dlzYGl5OitrKW7.'),
(5, 'Selma', 'Aras', 'selmaaras', 'selmaras@gmail.com', 'Diş', '$2y$10$jelGE8dLhKU5iUZOsXZKWO3bmgB38UF9XInMTFJM8sNyt48YR8S5O'),
(6, 'Gamze', 'Akbulut', 'gamzeakbulut', 'gamzeakbulut@gmail.com', 'BÖTE', '$2y$10$ARYgUPg6KzXR35zci4zhMed7hNaoCVZY8h3zJUKyrkzF23L3E3ILy'),
(7, 'Sara', 'Üce', 'sarauce', 'sarauce@gmail.com', 'BÖTE', '$2y$10$oQAEeXwaZ1mudumrgZFYlO89V3czLzek9zaMxeK5RQAygV0muMRza');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

DROP TABLE IF EXISTS `yorum`;
CREATE TABLE `yorum` (
  `id` int(11) NOT NULL,
  `yapan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `yapilan` varchar(255) NOT NULL,
  `metin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `yorum`
--

INSERT INTO `yorum` (`id`, `yapan`, `yapilan`, `metin`) VALUES
(1, '6', '', 'Güzel'),
(2, '6', '', 'Güzel'),
(3, '6', '', 'Güzel'),
(4, '6', '', 'Müthiş'),
(5, '6', '', 'Harika'),
(6, '6', '', 'Ortalama'),
(7, '6', '', 'Fena değil'),
(8, '6', '3', 'İyi'),
(9, '6', '3', 'Good'),
(10, '6', '5', 'Başarılı'),
(11, '6', '3', 'Harika'),
(12, '6', '6', 'Çok iyi'),
(13, '7', '6', '<br>\"2\'');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `belgesel`
--
ALTER TABLE `belgesel`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uye`
--
ALTER TABLE `uye`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `belgesel`
--
ALTER TABLE `belgesel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `uye`
--
ALTER TABLE `uye`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `yorum`
--
ALTER TABLE `yorum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
