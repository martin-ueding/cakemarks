-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 08. Okt 2013 um 17:54
-- Server Version: 5.5.32-0ubuntu0.13.04.1
-- PHP-Version: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `cakemarks`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cakemarks_bookmarks`
--

DROP TABLE IF EXISTS `cakemarks_bookmarks`;
CREATE TABLE IF NOT EXISTS `cakemarks_bookmarks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `url` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `revisit` int(11) DEFAULT NULL,
  `reading_list` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether this should be read at some point in time.',
  `mobile` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Bookmarks for Webpages' AUTO_INCREMENT=1058 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cakemarks_bookmarks_keywords`
--

DROP TABLE IF EXISTS `cakemarks_bookmarks_keywords`;
CREATE TABLE IF NOT EXISTS `cakemarks_bookmarks_keywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bookmark_id` int(10) unsigned NOT NULL,
  `keyword_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Relates Keywords to the Bookmarks' AUTO_INCREMENT=786 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cakemarks_keywords`
--

DROP TABLE IF EXISTS `cakemarks_keywords`;
CREATE TABLE IF NOT EXISTS `cakemarks_keywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `sticky` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Keywords that describe Bookmarks' AUTO_INCREMENT=198 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cakemarks_quotes`
--

DROP TABLE IF EXISTS `cakemarks_quotes`;
CREATE TABLE IF NOT EXISTS `cakemarks_quotes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `author` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Literal Quotes from People, not related to the Bookmarks' AUTO_INCREMENT=98 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cakemarks_visits`
--

DROP TABLE IF EXISTS `cakemarks_visits`;
CREATE TABLE IF NOT EXISTS `cakemarks_visits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bookmark_id` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Visits of the Webpages the Bookmarks refer to' AUTO_INCREMENT=5134 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
