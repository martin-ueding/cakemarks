

CREATE TABLE `cakemarks_bookmarks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `url` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `revisit` int(11) DEFAULT NULL,
  `reading_list` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether this should be read at some point in time.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Bookmarks for Webpages';


CREATE TABLE `cakemarks_bookmarks_keywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bookmark_id` int(10) unsigned NOT NULL,
  `keyword_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Relates Keywords to the Bookmarks';


CREATE TABLE `cakemarks_keywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `sticky` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Keywords that describe Bookmarks';


CREATE TABLE `cakemarks_quotes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `author` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Literal Quotes from People, not related to the Bookmarks';


CREATE TABLE `cakemarks_visits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bookmark_id` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Visits of the Webpages the Bookmarks refer to';