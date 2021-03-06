-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Янв 13 2014 г., 13:12
-- Версия сервера: 5.5.25-log
-- Версия PHP: 5.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `a-locator`
--

-- --------------------------------------------------------

--
-- Структура таблицы `coordinates`
--

CREATE TABLE IF NOT EXISTS `coordinates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `lat` float NOT NULL,
  `lon` float NOT NULL,
  `when` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Структура таблицы `invites`
--

CREATE TABLE IF NOT EXISTS `invites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invite_text` varchar(32) NOT NULL,
  `uid_user` mediumint(8) DEFAULT NULL,
  `uid_invited_user` mediumint(8) DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `invite_text` (`invite_text`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `invites`
--

INSERT INTO `invites` (`id`, `invite_text`, `uid_user`, `uid_invited_user`, `state`) VALUES
(1, 'abc', 2, 19, 0),
(2, 'invite1', 2, 20, 0),
(3, 'invite2', 2, 21, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `position_mode` tinyint(1) NOT NULL DEFAULT '1',
  `hide_period` int(11) NOT NULL DEFAULT '0',
  `userpic` varchar(64) DEFAULT 'default.png',
  `slogan` varchar(200) DEFAULT NULL,
  `hyst` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `meta`
--

INSERT INTO `meta` (`id`, `user_id`, `first_name`, `last_name`, `company`, `phone`, `position_mode`, `hide_period`, `userpic`, `slogan`, `hyst`) VALUES
(1, 1, 'Admin', 'Admnistrator', 'ADMIN', '0', 1, 0, NULL, NULL, 1),
(2, 2, 'Андрей', 'Бобошко', 'Астарта-Киев 1', '+38-096-4648', 0, 32, '3e9e3dc30ca8900533d4e7870c95205a.jpg', 'PM from PL', 0),
(19, 19, NULL, NULL, NULL, NULL, 1, 0, 'default.png', NULL, 1),
(20, 20, NULL, NULL, NULL, NULL, 1, 0, 'default.png', NULL, 1),
(21, 21, NULL, NULL, NULL, NULL, 1, 0, 'default.png', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) unsigned NOT NULL,
  `ip_address` char(16) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
(1, 1, '127.0.0.1', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, 1268889823, 1384116904, 1),
(2, 1, '127.0.0.1', 'An-3', '8467b732b19226eef9e9df005da136b49535dcb1', NULL, 'an-03@yandex.ru', NULL, NULL, NULL, 1383748969, 1389603665, 1),
(19, 2, '127.0.0.1', 'kruglovadasha', '03210729139ed3fa69e283fce343548d97a2f518', NULL, 'kruglovadasha@mail.ru', NULL, NULL, NULL, 1387570283, 1389359169, 1),
(20, 2, '127.0.0.1', 'chuk', 'b8a840360240d37fc264767604ae4f06b42e8ece', NULL, 'chuk@gaidar.com', NULL, NULL, NULL, 1387979960, 1387979995, 1),
(21, 2, '127.0.0.1', 'gek', '38321d551213f3cd4cf55b2220df5c9b954fe6d4', NULL, 'gek@gaidar.com', NULL, NULL, NULL, 1387979981, 1387979981, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
         