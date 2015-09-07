-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 07 2015 г., 23:00
-- Версия сервера: 5.5.44-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `univer_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `city_name` varchar(32) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`city_id`, `user_id`, `city_name`) VALUES
(1, 1, 'Brest'),
(2, 2, 'Mogilev'),
(3, 3, 'Minsk'),
(4, 4, 'Grodno');

-- --------------------------------------------------------

--
-- Структура таблицы `educations`
--

CREATE TABLE IF NOT EXISTS `educations` (
  `educ_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_educ` varchar(32) NOT NULL,
  PRIMARY KEY (`educ_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `educations`
--

INSERT INTO `educations` (`educ_id`, `user_id`, `user_educ`) VALUES
(1, 1, ' higher education'),
(2, 2, 'secondary education'),
(3, 3, 'basic education'),
(4, 4, 'secondary special education');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `user_name`) VALUES
(1, 'Suleiman ibn Hottab'),
(2, 'Viktor Petrovich'),
(3, 'Olga Pavlovna'),
(4, 'Raisa Petrovna'),
(10, 'Olga Pavlovna7');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
