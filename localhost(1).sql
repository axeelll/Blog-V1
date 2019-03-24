-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `commentaires`;
CREATE DATABASE `commentaires` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `commentaires`;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `articles` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `article` (`id`, `title`, `articles`) VALUES
(20,	'Articles 1',	'Geopolitique'),
(21,	'Articles 2',	'Ecologie'),
(22,	'Articles 3',	'voiture'),
(23,	'Articles 4',	'sqdtrt'),
(24,	'',	''),
(25,	'',	''),
(26,	'vgyhvgy',	'vgyvgyg');

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `commentaires` (`id`, `date`, `content`) VALUES
(14,	'2019-02-21 15:20:32',	'test'),
(15,	'2019-02-25 09:05:16',	'giouio');

DROP TABLE IF EXISTS `like`;
CREATE TABLE `like` (
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `mail` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `name`, `first_name`, `mail`) VALUES
(23,	'errtqert',	'ert',	'qertui'),
(84,	'hgj',	'ghj',	'jghj');

-- 2019-03-15 08:40:46
