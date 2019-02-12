-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2019 г., 19:06
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wd04-filmoteka-rodina`
--

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `type` text NOT NULL,
  `year` int(11) NOT NULL,
  `description` text NOT NULL,
  `photo` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`id`, `title`, `type`, `year`, `description`, `photo`) VALUES
(1, 'Окно в Париж', 'комедия', 1987, 'После изрядного подпития обитатели коммуналки открывают окно… в Париж. С этого часа начинаются прогулки по городу грез, а также злоключения французских «гостей» на берегах Невы.', ''),
(35, 'Бегущий по лезвию', 'фантастика', 2018, '', ''),
(47, 'Бегущий по лезвию2', 'фантастика', 2017, '.доопжлгр.', ''),
(48, 'Бегущий по лезвию', 'фантастика', 1988, 'мапгрю мае', ''),
(49, 'фильм2', 'comedy ужасы', 1988, 'ужасы', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
