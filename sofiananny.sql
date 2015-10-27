-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Време на генериране: 27 окт 2015 в 12:43
-- Версия на сървъра: 5.5.42-cll
-- Версия на PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `cocofarm_nanny`
--

-- --------------------------------------------------------

--
-- Структура на таблица `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_name` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`dist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

--
-- Схема на данните от таблица `districts`
--

INSERT INTO `districts` (`dist_id`, `dist_name`, `city_id`) VALUES
(1, 'Банишора', 1),
(2, 'Бели брези', 1),
(3, 'Бенковски', 1),
(4, 'Борово', 1),
(5, 'Ботунец', 1),
(6, 'Бояна', 1),
(7, 'Бъкстон', 1),
(8, 'Витоша', 1),
(9, 'Враждебна', 1),
(10, 'Връбница 1', 1),
(11, 'Връбница 2', 1),
(12, 'Гевгелийски', 1),
(13, 'Гео Милев', 1),
(14, 'Горна баня', 1),
(15, 'Горубляне', 1),
(16, 'Гоце Делчев', 1),
(17, 'Градина', 1),
(18, 'Дианабад', 1),
(19, 'Драгалевци', 1),
(20, 'Дружба 1', 1),
(21, 'Дружба 2', 1),
(22, 'Дървеница', 1),
(23, 'Западен парк', 1),
(24, 'Захарна Фабрика', 1),
(25, 'Зона Б-18', 1),
(26, 'Зона Б-19', 1),
(27, 'Зона Б-4', 1),
(28, 'Зона Б-5', 1),
(29, 'Иван Вазов', 1),
(30, 'Изгрев', 1),
(31, 'Изток', 1),
(32, 'Илинден', 1),
(33, 'Илиянци', 1),
(34, 'Камбаните', 1),
(35, 'Карпузица', 1),
(36, 'Княжево', 1),
(37, 'Кокаляне', 1),
(38, 'Красна поляна', 1),
(39, 'Красно село', 1),
(40, 'Кремиковци', 1),
(41, 'Крива Река', 1),
(42, 'Кръстова вада', 1),
(43, 'Лагера', 1),
(44, 'Левски', 1),
(45, 'Лозенец', 1),
(46, 'Люлин 1', 1),
(47, 'Люлин 10', 1),
(48, 'Люлин 2', 1),
(49, 'Люлин 3', 1),
(50, 'Люлин 4', 1),
(51, 'Люлин 5', 1),
(52, 'Люлин 6', 1),
(53, 'Люлин 7', 1),
(54, 'Люлин 8', 1),
(55, 'Люлин 9', 1),
(56, 'Люлин център', 1),
(57, 'Малашевци', 1),
(58, 'Малинова Долина', 1),
(59, 'Мало Бучино', 1),
(60, 'Манастирски ливади', 1),
(61, 'Младост 1', 1),
(62, 'Младост 1А', 1),
(63, 'Младост 2', 1),
(64, 'Младост 3', 1),
(65, 'Младост 4', 1),
(66, 'Модерно предградие', 1),
(67, 'Мусагеница', 1),
(68, 'Надежда 1', 1),
(69, 'Надежда 2', 1),
(70, 'Надежда 3', 1),
(71, 'Надежда 4', 1),
(72, 'Обеля', 1),
(73, 'Обеля 2', 1),
(74, 'Овча купел', 1),
(75, 'Овча купел 1', 1),
(76, 'Овча купел 2', 1),
(77, 'Павлово', 1),
(78, 'Подуяне', 1),
(79, 'Полигона', 1),
(80, 'Разсадника', 1),
(81, 'Редута', 1),
(82, 'Република', 1),
(83, 'Света Троица', 1),
(84, 'Сердика', 1),
(85, 'Сеславци', 1),
(86, 'Симеоново', 1),
(87, 'Славия', 1),
(88, 'Слатина', 1),
(89, 'София парк', 1),
(90, 'Стрелбище', 1),
(91, 'Студентски град', 1),
(92, 'Сухата река', 1),
(93, 'Суходол', 1),
(94, 'Толстой', 1),
(95, 'Требич', 1),
(96, 'Триъгълника', 1),
(97, 'Факултета', 1),
(98, 'Филиповци', 1),
(99, 'Фондови жилища', 1),
(100, 'Хаджи Димитър', 1),
(101, 'Хиподрума', 1),
(102, 'Хладилника', 1),
(103, 'Христо Ботев', 1),
(104, 'Цариградско шосе 7-ми километър', 1),
(105, 'Център', 1),
(106, 'Челопечене', 1),
(107, 'Яворов', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `invitations`
--

CREATE TABLE IF NOT EXISTS `invitations` (
  `invitation_email` varchar(50) NOT NULL,
  `insert_date` datetime NOT NULL,
  UNIQUE KEY `invite_email` (`invitation_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `invitations`
--

INSERT INTO `invitations` (`invitation_email`, `insert_date`) VALUES
('elp_vr1@yahoo.com', '2015-09-19 20:55:36'),
('elp_vr4@yahoo.com', '2015-09-19 21:08:37'),
('elp_vr@yahoo.com', '2015-09-19 21:08:31');

-- --------------------------------------------------------

--
-- Структура на таблица `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `worker_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `begin_hour` time NOT NULL,
  `end_hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `schedules`
--

INSERT INTO `schedules` (`worker_id`, `schedule_date`, `begin_hour`, `end_hour`) VALUES
(1, '2015-09-30', '15:00:00', '19:00:00'),
(1, '2015-10-02', '20:00:00', '24:00:00'),
(1, '2015-10-14', '15:00:00', '20:00:00'),
(1, '2015-11-09', '08:00:00', '12:30:00'),
(1, '2015-11-10', '11:00:00', '15:00:00'),
(1, '2015-11-30', '00:00:00', '07:30:00');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `insertdate` date NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`userid`, `username`, `phone`, `email`, `password`, `insertdate`) VALUES
(1, 'Емил Петров', '0886066166', 'elp_vr@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-09-05'),
(2, 'Емил Петров', '0886066166', 'elp_vr1@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-09-05'),
(3, 'Друг Потребител', '0886066168', 'elp_vr2@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-10-27'),
(4, 'jklxdnxdfl', '000000000000000000', 'elp_vr3@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-10-27');

-- --------------------------------------------------------

--
-- Структура на таблица `workers`
--

CREATE TABLE IF NOT EXISTS `workers` (
  `worker_id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_name` varchar(50) NOT NULL,
  `worker_email` varchar(50) NOT NULL,
  `worker_pass` varchar(32) NOT NULL,
  PRIMARY KEY (`worker_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Схема на данните от таблица `workers`
--

INSERT INTO `workers` (`worker_id`, `worker_name`, `worker_email`, `worker_pass`) VALUES
(1, 'Иванка Иванова', 'mail@mail.com', '81dc9bdb52d04dc20036dbd8313ed055');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
