-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Сер 08 2018 р., 23:08
-- Версія сервера: 5.6.38
-- Версія PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `prices`
--

-- --------------------------------------------------------

--
-- Структура таблиці `graf_1`
--

CREATE TABLE `graf_1` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `graf_2`
--

CREATE TABLE `graf_2` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` int(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `prod`
--

CREATE TABLE `prod` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `parent` int(11) UNSIGNED NOT NULL,
  `price_st` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `prod`
--

INSERT INTO `prod` (`id`, `title`, `parent`, `price_st`) VALUES
(1, 'Школьная форма', 5, 10000),
(5, 'Товары', 0, 0),
(50, 'Шорты', 5, 500);

-- --------------------------------------------------------

--
-- Структура таблиці `variants`
--

CREATE TABLE `variants` (
  `id` int(11) UNSIGNED NOT NULL,
  `title_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `period_from` date NOT NULL,
  `period_to` date NOT NULL DEFAULT '3999-12-31'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `variants`
--

INSERT INTO `variants` (`id`, `title_id`, `title`, `price`, `period_from`, `period_to`) VALUES
(1, 1, 'Школьная форма', 500, '2017-09-01', '2018-09-01'),
(2, 1, 'Школьная форма', 200, '2018-08-01', '2018-09-01'),
(3, 1, 'Школьная форма', 50, '2018-08-06', '3999-12-31'),
(4, 50, 'Шорты', 100, '2018-08-01', '2018-09-01');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `graf_1`
--
ALTER TABLE `graf_1`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `graf_2`
--
ALTER TABLE `graf_2`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `graf_1`
--
ALTER TABLE `graf_1`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `graf_2`
--
ALTER TABLE `graf_2`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `prod`
--
ALTER TABLE `prod`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблиці `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
