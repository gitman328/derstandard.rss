-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 21. Juli 2019 um 15:38
-- Server Version: 5.5.60
-- PHP-Version: 5.4.45-0+deb7u14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `standard_rss`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `diestandard`
--

DROP TABLE IF EXISTS `diestandard`;
CREATE TABLE IF NOT EXISTS `diestandard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `diskurs`
--

DROP TABLE IF EXISTS `diskurs`;
CREATE TABLE IF NOT EXISTS `diskurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `gesundheit`
--

DROP TABLE IF EXISTS `gesundheit`;
CREATE TABLE IF NOT EXISTS `gesundheit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `immobilien`
--

DROP TABLE IF EXISTS `immobilien`;
CREATE TABLE IF NOT EXISTS `immobilien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `inland`
--

DROP TABLE IF EXISTS `inland`;
CREATE TABLE IF NOT EXISTS `inland` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `international`
--

DROP TABLE IF EXISTS `international`;
CREATE TABLE IF NOT EXISTS `international` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `karriere`
--

DROP TABLE IF EXISTS `karriere`;
CREATE TABLE IF NOT EXISTS `karriere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kultur`
--

DROP TABLE IF EXISTS `kultur`;
CREATE TABLE IF NOT EXISTS `kultur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lifestyle`
--

DROP TABLE IF EXISTS `lifestyle`;
CREATE TABLE IF NOT EXISTS `lifestyle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `meinung`
--

DROP TABLE IF EXISTS `meinung`;
CREATE TABLE IF NOT EXISTS `meinung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `panorama`
--

DROP TABLE IF EXISTS `panorama`;
CREATE TABLE IF NOT EXISTS `panorama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reisen`
--

DROP TABLE IF EXISTS `reisen`;
CREATE TABLE IF NOT EXISTS `reisen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `top_news`
--

DROP TABLE IF EXISTS `top_news`;
CREATE TABLE IF NOT EXISTS `top_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `web`
--

DROP TABLE IF EXISTS `web`;
CREATE TABLE IF NOT EXISTS `web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wirtschaft`
--

DROP TABLE IF EXISTS `wirtschaft`;
CREATE TABLE IF NOT EXISTS `wirtschaft` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `wissenschaft`
--

DROP TABLE IF EXISTS `wissenschaft`;
CREATE TABLE IF NOT EXISTS `wissenschaft` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `subcat_1` varchar(255) NOT NULL,
  `subcat_2` varchar(255) NOT NULL,
  `subcat_3` varchar(255) NOT NULL,
  `subcat_4` varchar(255) NOT NULL,
  `subcat_5` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pubdate` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `news_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aw_current`
--

DROP TABLE IF EXISTS `aw_current`;
CREATE TABLE IF NOT EXISTS `aw_current` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `temp_u` varchar(255) NOT NULL,
  `dist_u` varchar(255) NOT NULL,
  `speed_u` varchar(255) NOT NULL,
  `pres_u` varchar(255) NOT NULL,
  `prec_u` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `pressure` varchar(255) NOT NULL,
  `temperature` varchar(255) NOT NULL,
  `humidity` varchar(255) NOT NULL,
  `weathertext` varchar(255) NOT NULL,
  `weathericon` varchar(255) NOT NULL,
  `windspeed` varchar(255) NOT NULL,
  `winddirection` varchar(255) NOT NULL,
  `cloudcover` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `aw_current`
--

INSERT INTO `aw_current` (`id`, `temp_u`, `dist_u`, `speed_u`, `pres_u`, `prec_u`, `city`, `country`, `area`, `city_id`, `pressure`, `temperature`, `humidity`, `weathertext`, `weathericon`, `windspeed`, `winddirection`, `cloudcover`, `timestamp`) VALUES
(1, 'C', 'km', 'km/h', 'kPa', 'mm', 'New York City', 'Vereinigte Staaten', 'New York', 349727, '101', '19', '93', 'Schauer', '12', '5', 'N', '100%', 1563888420);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aw_forecast`
--

DROP TABLE IF EXISTS `aw_forecast`;
CREATE TABLE IF NOT EXISTS `aw_forecast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day_name` varchar(255) NOT NULL,
  `sunrise` varchar(255) NOT NULL,
  `sunset` varchar(255) NOT NULL,
  `shorttext` varchar(255) NOT NULL,
  `weather_icon` varchar(255) NOT NULL,
  `hightemperature_d` varchar(255) NOT NULL,
  `lowtemperature_d` varchar(255) NOT NULL,
  `winddirection_d` varchar(255) NOT NULL,
  `windspeed_d` varchar(255) NOT NULL,
  `rain_d` varchar(255) NOT NULL,
  `snow_d` varchar(255) NOT NULL,
  `ice_d` varchar(255) NOT NULL,
  `winddirection_n` varchar(255) NOT NULL,
  `windspeed_n` varchar(255) NOT NULL,
  `rain_n` varchar(255) NOT NULL,
  `snow_n` varchar(255) NOT NULL,
  `ice_n` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Daten für Tabelle `aw_forecast`
--

INSERT INTO `aw_forecast` (`id`, `day_name`, `sunrise`, `sunset`, `shorttext`, `weather_icon`, `hightemperature_d`, `lowtemperature_d`, `winddirection_d`, `windspeed_d`, `rain_d`, `snow_d`, `ice_d`, `winddirection_n`, `windspeed_n`, `rain_n`, `snow_n`, `ice_n`, `timestamp`) VALUES
(1, 'Dienstag', '05:45', '20:19', 'Einige durchdringende Schauer', '12', '25', '20', 'N', '9', '4.1', '0.00', '0.0', 'NNO', '3', '2.5', '0.00', '0.0', 1563919140),
(2, 'Mittwoch', '05:46', '20:18', 'Wärmer', '03', '27', '19', 'NO', '6', '0.0', '0.00', '0.0', 'W', '3', '0.0', '0.00', '0.0', 1564005540),
(3, 'Donnerstag', '05:47', '20:18', 'Überwiegend sonnig', '02', '28', '21', 'NNW', '3', '0.0', '0.00', '0.0', 'NO', '0', '0.0', '0.00', '0.0', 1564091940),
(4, 'Freitag', '05:48', '20:17', 'Überwiegend sonnig', '02', '29', '22', 'OSO', '1', '0.0', '0.00', '0.0', 'SSW', '1', '0.0', '0.00', '0.0', 1564178340),
(5, 'Samstag', '05:49', '20:16', 'Überwiegend sonnig', '02', '29', '22', 'S', '4', '0.0', '0.00', '0.0', 'SSW', '4', '0.0', '0.00', '0.0', 1564264740),
(6, 'Sonntag', '05:50', '20:15', 'Überwiegend sonnig', '02', '31', '23', 'SW', '6', '0.0', '0.00', '0.0', 'SW', '6', '0.0', '0.00', '0.0', 1564351140),
(7, 'Montag', '05:50', '20:14', 'Phasen mit Wolken und Sonne', '04', '32', '23', 'WSW', '8', '0.0', '0.00', '0.0', 'SW', '6', '0.0', '0.00', '0.0', 1564437540),
(8, 'Dienstag', '05:51', '20:13', 'Teils sonnig', '03', '32', '24', 'SW', '8', '0.0', '0.00', '0.0', 'SW', '6', '1.3', '0.00', '0.0', 1564523940);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(1) NOT NULL,
  `aw_show_cw` int(1) NOT NULL,
  `aw_show_fcw` int(1) NOT NULL,
  `aw_show_startpage` int(1) NOT NULL,
  `aw_fc_days` int(1) NOT NULL,
  `aw_city_id` int(11) NOT NULL DEFAULT '1',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `settings`
--

INSERT INTO `settings` (`id`, `aw_show_cw`, `aw_show_fcw`, `aw_show_startpage`, `aw_fc_days`, `aw_city_id`) VALUES
(1, 1, 1, 0, 7, 349727);
