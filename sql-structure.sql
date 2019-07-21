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
