-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 26 2020 г., 14:14
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `friends`
--

-- --------------------------------------------------------

--
-- Структура таблицы `enemy`
--

CREATE TABLE `enemy` (
  `id` int(11) NOT NULL,
  `EnemyList` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `FriendsList` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `inderectenemys`
--

CREATE TABLE `inderectenemys` (
  `id` int(11) NOT NULL,
  `EnemyList` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `inderectfrends`
--

CREATE TABLE `inderectfrends` (
  `id` int(11) NOT NULL,
  `FriendsList` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `nameuser`
--

CREATE TABLE `nameuser` (
  `id` int(11) NOT NULL,
  `NameUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(250) NOT NULL,
  `NameUser` int(11) NOT NULL,
  `Friens` int(11) NOT NULL,
  `IndirectFriends` int(11) NOT NULL,
  `Enemys` int(11) NOT NULL,
  `IndirectEnemys` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `enemy`
--
ALTER TABLE `enemy`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `friends`
--
ALTER TABLE `friends`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `inderectenemys`
--
ALTER TABLE `inderectenemys`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `inderectfrends`
--
ALTER TABLE `inderectfrends`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `nameuser`
--
ALTER TABLE `nameuser`
  ADD UNIQUE KEY `NameUser` (`NameUser`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `NameUser` (`NameUser`),
  ADD KEY `Friens` (`Friens`),
  ADD KEY `IndirectFriends` (`IndirectFriends`),
  ADD KEY `Enemys` (`Enemys`),
  ADD KEY `IndirectEnemys` (`IndirectEnemys`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `nameuser`
--
ALTER TABLE `nameuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `enemy`
--
ALTER TABLE `enemy`
  ADD CONSTRAINT `enemy_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`Enemys`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`Friens`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `inderectfrends`
--
ALTER TABLE `inderectfrends`
  ADD CONSTRAINT `inderectfrends_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`IndirectFriends`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`NameUser`) REFERENCES `nameuser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`IndirectEnemys`) REFERENCES `inderectenemys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
