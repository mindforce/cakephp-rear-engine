-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Сер 09 2014 р., 11:33
-- Версія сервера: 5.5.38-0ubuntu0.14.04.1
-- Версія PHP: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `my_app`
--

-- --------------------------------------------------------

--
-- Структура таблиці `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(255) NOT NULL DEFAULT 'App',
  `key` varchar(64) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_index` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Дамп даних таблиці `settings`
--

INSERT INTO `settings` (`id`, `plugin`, `key`, `value`) VALUES
(36, 'RearEngine', 'Cache.default.duration', '300'),
(37, 'RearEngine', 'Cache.default.className', NULL),
(38, 'RearEngine', 'Cache.default.probability', '100'),
(39, 'RearEngine', 'Cache.check', '0'),
(41, 'RearEngine', 'Meta.description', 'My site for any people'),
(42, 'RearEngine', 'Meta.generator', 'RearEngine - helpful plugin for apps bakers'),
(43, 'RearEngine', 'Meta.keywords', 'RearEngine, CakePHP admin, plugin'),
(44, 'RearEngine', 'Meta.robots', 'index, follow'),
(57, 'RearEngine', 'Session.defaults', 'php'),
(58, 'RearEngine', 'Session.timeout', '15'),
(59, 'RearEngine', 'debug', '1'),
(64, 'RearEngine', 'App.theme', ''),
(65, 'RearEngine', 'App.status', '1'),
(67, 'RearEngine', 'App.timezone', '0'),
(68, 'RearEngine', 'Meta.title', 'My Site'),
(69, 'RearEngine', 'App.admin.theme', 'RearEngine');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
