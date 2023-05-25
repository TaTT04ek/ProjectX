-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 05 2023 г., 12:53
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `beton`
--
CREATE DATABASE IF NOT EXISTS `beton` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `beton`;

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `pass`) VALUES
(1, '1212admin1212', 'se1212admin1212se');

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `paid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `user_id`, `product_id`, `paid`) VALUES
(60, 29, 93, 1),
(61, 30, 93, 1),
(62, 30, 97, 1),
(63, 30, 98, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `opisanie` varchar(5000) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `category` varchar(10000) COLLATE utf8mb4_general_ci NOT NULL,
  `img_200x` int NOT NULL,
  `img_600x` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `opisanie`, `price`, `category`, `img_200x`, `img_600x`) VALUES
(91, 'M100', 'Стоимость перевозки, 1м3 - до 10км - 460 руб.', 5250, 'Минимальная доставка 1840 руб', 36, 36),
(92, 'М150', 'Стоимость перевозки, 1м3 - до 20км - 550 руб.\r\n', 5500, 'Минимальная доставка 2200 руб', 91, 91),
(93, 'М200', 'Стоимость перевозки, 1м3 - до 30км - 700 руб.', 5850, 'Минимальная доставка 2800 руб', 92, 92),
(94, 'М250', 'Стоимость перевозки, 1м3 - до 20км - 550 руб.', 6150, 'Минимальная доставка 2800 руб', 93, 93),
(95, 'М300', 'Стоимость перевозки, 1м3 - до 20км - 550 руб.', 6600, 'Минимальная доставка 2800 руб', 94, 94),
(96, 'М350', 'Стоимость перевозки, 1м3 - до 20км - 550 руб.', 6750, 'Минимальная доставка 2800 руб', 95, 95),
(97, 'М400', 'Стоимость перевозки, 1м3 - до 20км - 550 руб.', 7150, 'Минимальная доставка 2800 руб', 96, 96),
(98, 'М450', 'Стоимость перевозки, 1м3 - до 20км - 550 руб.', 7450, 'Минимальная доставка 2800 руб', 97, 97);

-- --------------------------------------------------------

--
-- Структура таблицы `sub`
--

CREATE TABLE `sub` (
  `id` int NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `sub`
--

INSERT INTO `sub` (`id`, `email`) VALUES
(1, 'wewirufa@mailinator.com'),
(2, 'mezuz@mailinator.com');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `text` varchar(3000) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `text`) VALUES
(5, 'Shelly Ewing', 'rohyju@mailinator.com', '89182553602', 'Lorem laborum except');

-- --------------------------------------------------------

--
-- Структура таблицы `usersite`
--

CREATE TABLE `usersite` (
  `id` int NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `usersite`
--

INSERT INTO `usersite` (`id`, `email`, `pass`, `name`) VALUES
(29, 'tyxuqocen@mailinator.com', '$2y$10$XE.UHnWyTizH10HYX9V36uIvciQIxF9wlW.jThAzOKe5bZD5xFD/G', 'Miriam Shaffer'),
(30, 'mebotos@mailinator.com', '$2y$10$yNqmamTqGEZpGEpMMae2DOXaEhdhvtqalGa8uhOIMd/mIBoL0gl8a', 'Anne Barber');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`),
  ADD KEY `product` (`product_id`) USING BTREE;

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usersite`
--
ALTER TABLE `usersite`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT для таблицы `sub`
--
ALTER TABLE `sub`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `usersite`
--
ALTER TABLE `usersite`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usersite` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
