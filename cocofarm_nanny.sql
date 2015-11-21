-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2015 at 02:44 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cocofarm_nanny`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `dist_id` int(11) NOT NULL,
  `dist_name` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
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
-- Table structure for table `invitations`
--

CREATE TABLE IF NOT EXISTS `invitations` (
  `invitation_email` varchar(50) NOT NULL,
  `insert_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`invitation_email`, `insert_date`) VALUES
('asdfasdf@wesdf.nh', '2015-11-08 19:20:15'),
('blabla@abv.bg', '2015-11-08 19:20:18'),
('dimitrova.bibi@gmail.com', '2015-11-09 23:43:54'),
('elp_vr1@yahoo.com', '2015-09-19 20:55:36'),
('elp_vr4@yahoo.com', '2015-09-19 21:08:37'),
('elp_vr@yahoo.com', '2015-09-19 21:08:31'),
('hehenaiphonesaitaizglejdadobre@smth.com', '2015-11-09 12:03:40'),
('ilona.dankovska.stefanova@gmail.com', '2015-11-08 14:59:49'),
('marina.stoyanova09@gmail.com', '2015-11-08 14:53:53'),
('miss_kef@abv.bg', '2015-11-08 19:20:14'),
('miss_kim@abv.bg', '2015-11-08 12:14:03'),
('mivanchev@gmail.com', '2015-11-01 15:19:51'),
('stefanova.magdalena.ivaylova@gmail.com', '2015-11-08 19:14:44'),
('stefanova.magdalena@gmail.com', '2015-11-08 14:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `worker_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `begin_hour` time NOT NULL,
  `end_hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedules`
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `insertdate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `phone`, `email`, `password`, `insertdate`) VALUES
(1, 'Емил Петров', '0886066166', 'elp_vr@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-09-05'),
(2, 'Емил Петров', '0886066166', 'elp_vr1@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-09-05'),
(3, 'Друг Потребител', '0886066168', 'elp_vr2@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-10-27'),
(4, 'jklxdnxdfl', '000000000000000000', 'elp_vr3@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-10-27'),
(5, 'Mihail', '0883469000', 'mivanchev@gmail.com', 'ff8b33735675d5146b6e5b3d9affc22c', '2015-10-27'),
(6, 'Магдалена', '+359889454649', 'stefanova.magdalena@gmail.com', 'c02f76ef705de6ee26426c2cd0b75a48', '2015-11-01'),
(7, 'Биляна Димитрова', '0884257076', 'dimitrova.bibi@gmail.com', 'ba8f717ac99b40998a2cf3bddb6bbaed', '2015-11-03'),
(8, 'Марина Стоянова', '0889884957', 'marina.stoyanova09@gmail.com', '0862316b6ade92133ea660e14d27aaaa', '2015-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE IF NOT EXISTS `workers` (
  `worker_id` int(11) NOT NULL,
  `worker_name` varchar(50) NOT NULL,
  `worker_email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `worker_pass` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`worker_id`, `worker_name`, `worker_email`, `role`, `worker_pass`) VALUES
(1, 'Иванка Иванова', 'mail@mail.com', 'worker', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Михаил Иванчев', 'mivanchev@gmail.com', 'admin', 'ff8b33735675d5146b6e5b3d9affc22c');

-- --------------------------------------------------------

--
-- Table structure for table `worker_details`
--

CREATE TABLE IF NOT EXISTS `worker_details` (
  `student_id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `university` varchar(30) NOT NULL,
  `speciality` varchar(50) NOT NULL,
  `prof_interest` varchar(50) NOT NULL,
  `smoker` varchar(5) NOT NULL,
  `alergies` varchar(50) NOT NULL,
  `alergies_specific` varchar(100) NOT NULL,
  `about` varchar(150) NOT NULL,
  `interests1` varchar(50) NOT NULL,
  `interests2` varchar(50) NOT NULL,
  `interests3` varchar(50) NOT NULL,
  `interests4` varchar(50) NOT NULL,
  `idcard_address` varchar(100) NOT NULL,
  `current_address` varchar(140) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `em_contact_name` varchar(100) NOT NULL,
  `em_telephone` int(15) NOT NULL,
  `em_email` varchar(50) NOT NULL,
  `em_connection` varchar(50) NOT NULL,
  `em_address` varchar(100) NOT NULL,
  `avg_score` int(11) NOT NULL,
  `recommended_by` varchar(50) NOT NULL,
  `recruitment_score` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `worker_details`
--

INSERT INTO `worker_details` (`student_id`, `phone`, `date_of_birth`, `sex`, `university`, `speciality`, `prof_interest`, `smoker`, `alergies`, `alergies_specific`, `about`, `interests1`, `interests2`, `interests3`, `interests4`, `idcard_address`, `current_address`, `address1`, `address2`, `em_contact_name`, `em_telephone`, `em_email`, `em_connection`, `em_address`, `avg_score`, `recommended_by`, `recruitment_score`) VALUES
(1, 123, '2015-11-11', 'female', 'some', 'some', 'sdfa', 'no', 'no', 'no', 'no', 'asdf', 'asdf', 'asdf', 'asdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', 5614564, 'asdfasdf', 'sadfasdf', 'asdfasdf', 5, 'asdfasdf', 6),
(2, 56654, '2015-11-01', 'male', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'yes', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'ffgdg', 'dfgdfg', 'sdfgsdfg', 'sdfgsdfg', 'sdfgsdfg', 'dfsdgfsdgf', 'sdfgsdfg', 667987, 'dfsdfg', 'dfgsdfg', 'asDFGAERG', 4, 'dsfgsdfggf', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`dist_id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD UNIQUE KEY `invite_email` (`invitation_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`worker_id`);

--
-- Indexes for table `worker_details`
--
ALTER TABLE `worker_details`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `worker_details`
--
ALTER TABLE `worker_details`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `worker_details`
--
ALTER TABLE `worker_details`
  ADD CONSTRAINT `worker_details_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `workers` (`worker_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
