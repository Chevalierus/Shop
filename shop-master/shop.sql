-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 29 2020 г., 11:24
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Футболки'),
(2, 'Штаны'),
(9, 'Куртки'),
(10, 'Шорты'),
(11, 'Перчатки');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `products` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `addres` text NOT NULL,
  `Phone` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `products`, `created_at`, `addres`, `Phone`, `status`) VALUES
(1, 'Имя', '{\"basket\":[\"50\",\"51\",\"48\"]}', '2020-04-16 19:10:25', 'Город', 0, 'Отправлен'),
(2, 'Имя', '{\"basket\":[\"27\",\"48\"]}', '2020-04-16 19:13:41', 'Город', 123456, 'Новый'),
(22, '3', '{\"basket\":[{\"product_id\":\"27\",\"count\":1},{\"product_id\":\"48\",\"count\":1},{\"product_id\":\"49\",\"count\":1}]}', '2020-04-26 18:07:13', '2', 0, 'Новый'),
(24, '28', '{\"basket\":[{\"product_id\":\"27\",\"count\":1},{\"product_id\":\"48\",\"count\":1},{\"product_id\":\"49\",\"count\":1}]}', '2020-04-28 14:39:44', '123', 123, 'Новый'),
(25, '29', '{\"basket\":[{\"product_id\":\"27\",\"count\":1},{\"product_id\":\"48\",\"count\":1},{\"product_id\":\"49\",\"count\":1}]}', '2020-04-28 14:47:20', 'Город', 123456, 'Новый'),
(26, '29', '{\"basket\":[{\"product_id\":\"27\",\"count\":\"12\"},{\"product_id\":\"48\",\"count\":1}]}', '2020-04-28 14:57:40', 'Город', 123456, 'Новый'),
(27, '29', '{\"basket\":[{\"product_id\":\"27\",\"count\":1},{\"product_id\":\"48\",\"count\":1}]}', '2020-04-28 15:00:20', 'Город', 123456, 'Новый'),
(28, '29', '{\"basket\":[{\"product_id\":\"27\",\"count\":\"12\"},{\"product_id\":\"48\",\"count\":1},{\"product_id\":\"49\",\"count\":1}]}', '2020-04-28 15:11:11', 'Город', 123456, 'Новый'),
(29, '29', '{\"basket\":[{\"product_id\":\"27\",\"count\":\"12\"},{\"product_id\":\"48\",\"count\":1},{\"product_id\":\"49\",\"count\":1}]}', '2020-04-28 15:12:08', 'Город', 123456, 'Новый');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descrip` text NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `descrip`, `content`, `category_id`, `image`, `cost`) VALUES
(27, 'Штаны1', 'Одежда', 'Одежда', 2, '', '100'),
(48, 'Броня', 'Не куртка', 'Одежда', 1, '', '70'),
(49, 'Куртка', 'Куртка', 'Одежда', 1, '', '200'),
(50, 'Штаны2', 'Одежда', 'Одежда', 2, '', '440'),
(51, 'Броня', 'Не куртка', 'Одежда', 1, '', '80'),
(52, 'Куртка', 'Куртка', 'Одежда', 1, '', ''),
(53, 'Штаны3', 'Одежда', 'Одежда', 2, '', ''),
(54, 'Куртка', 'Куртка', 'Одежда', 1, '', ''),
(55, 'Штаны4', 'Одежда', 'Одежда', 2, '', ''),
(56, 'Куртка', 'Куртка', 'Одежда', 1, '', ''),
(57, 'Штаны5', 'Одежда', 'Одежда', 2, '', ''),
(58, 'Броня', 'Не куртка', 'Одежда', 1, '', ''),
(59, 'Куртка', 'Куртка', 'Одежда', 1, '', ''),
(60, 'Штаны6', 'Одежда', 'Одежда', 2, '', ''),
(61, 'Броня', 'Не куртка', 'Одежда', 1, '', ''),
(62, 'Куртка', 'Куртка', 'Одежда', 1, '', ''),
(63, 'Штаны7', 'Одежда', 'Одежда', 2, '', ''),
(64, 'Куртка', 'Куртка', 'Одежда', 1, '', ''),
(65, 'Штаны8', 'Одежда', 'Одежда', 2, '', ''),
(66, 'Куртка', 'Куртка', 'Одежда', 1, '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_mail` varchar(255) NOT NULL,
  `veryfied` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `phone`, `mail`, `password`, `confirm_mail`, `veryfied`) VALUES
(39, 'Mark', '', 'qwerty@mail.ru', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'un08swMQqBYmhkkcNZYY', 1),
(40, 'qwerty', '', 'qwerty1@mail.ru', '76d80224611fc919a5d54f0ff9fba446', 'anhlyo32H2ynoCKGWfK3', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
