-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 28 Kas 2021, 20:15:23
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `my_shop`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Televizyon'),
(2, 'Bilgisayar'),
(3, 'Kitap'),
(4, 'Ev & Yaşam'),
(5, 'Kulaklık');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` decimal(10,2) NOT NULL,
  `productCategory` int(11) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `productUrl` varchar(524) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `isLive` tinyint(1) NOT NULL DEFAULT 1,
  `entryDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`productID`, `productName`, `productPrice`, `productCategory`, `productImage`, `productUrl`, `stock`, `isLive`, `entryDate`) VALUES
(2, 'JBL Tune 510BT Multi Connect Mikrofonlu Kulaküstü Kablosuz Kulaklık Siyah\n', '399.01', 5, '110000049531149.jpg', 'jbl-tune-510bt-multi-connect-mikrofonlu-kulakustu-kablosuz-kulaklik-siyah', NULL, 1, '2021-11-28 10:27:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_options`
--

CREATE TABLE `product_options` (
  `optionID` int(11) NOT NULL,
  `optionValue` varchar(255) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `product_options`
--

INSERT INTO `product_options` (`optionID`, `optionValue`, `productID`) VALUES
(4, 'Siyah', 2),
(5, 'Mavi', 2),
(6, 'Yeşil', 2),
(7, 'Beyaz', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_slides`
--

CREATE TABLE `product_slides` (
  `slideID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `imagePath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `product_slides`
--

INSERT INTO `product_slides` (`slideID`, `productID`, `imagePath`) VALUES
(1, 2, '110000049531550.jpg'),
(2, 2, '110000049531551.jpg'),
(3, 2, '110000049531552.jpg'),
(4, 2, '110000049531553.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Tablo için indeksler `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`optionID`);

--
-- Tablo için indeksler `product_slides`
--
ALTER TABLE `product_slides`
  ADD PRIMARY KEY (`slideID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `product_options`
--
ALTER TABLE `product_options`
  MODIFY `optionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `product_slides`
--
ALTER TABLE `product_slides`
  MODIFY `slideID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
