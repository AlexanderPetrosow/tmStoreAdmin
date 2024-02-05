-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 05 2024 г., 05:42
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tmstore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status_main` int(11) NOT NULL DEFAULT 0,
  `status_category` int(11) NOT NULL DEFAULT 0,
  `status_advert` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `banner`
--

INSERT INTO `banner` (`id`, `name`, `status_main`, `status_category`, `status_advert`, `status`, `image`, `updated_at`, `created_at`) VALUES
(1, 'test', 1, 0, 0, 1, 'banner/65bc8ca565663.png', '2024-02-02 11:33:09', '2024-02-02 11:33:09'),
(2, 'test2', 0, 1, 0, 1, 'banner/65bc8d1cd32c3.png', '2024-02-02 11:35:08', '2024-02-02 11:35:08'),
(5, 'test3', 0, 0, 1, 1, 'banner/65bc957387a35.jpeg', '2024-02-02 12:10:43', '2024-02-02 12:10:43'),
(8, 'test4', 1, 1, 1, 1, 'banner/65bcd46af036e.jpeg', '2024-02-02 16:58:02', '2024-02-02 16:38:44');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `tm_name` text NOT NULL,
  `ru_name` text NOT NULL,
  `icon` text NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `tm_name`, `ru_name`, `icon`, `parent`, `status`, `updated_at`, `created_at`) VALUES
(2, 'Tehnika', 'Техника', 'device-desktop-cog', 0, 1, '2024-01-30 15:27:59', '2024-01-30 12:10:39'),
(3, 'Telefonlar', 'Телефоны', 'device-mobile', 4, 1, '2024-02-03 12:15:54', '2024-01-30 15:21:28'),
(4, 'Eşik', 'Одежда', 'shirt-filled', 0, 1, '2024-01-30 16:17:42', '2024-01-30 16:02:43'),
(5, 'Oýunjak', 'Игрушки', 'tir', 0, 1, '2024-01-30 16:22:50', '2024-01-30 16:07:40'),
(6, 'Analiz', 'Анализ', 'activity', 0, 1, '2024-02-03 12:16:49', '2024-02-03 12:16:49');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `ru_name` text NOT NULL,
  `tm_name` text NOT NULL,
  `district` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `ru_name`, `tm_name`, `district`, `status`, `updated_at`, `created_at`) VALUES
(2, 'Test ru', 'Test tkm', 5, 1, '2024-02-02 09:27:47', '2024-01-31 16:45:33');

-- --------------------------------------------------------

--
-- Структура таблицы `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `ru_name` text NOT NULL,
  `tm_name` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `district`
--

INSERT INTO `district` (`id`, `ru_name`, `tm_name`, `updated_at`, `created_at`) VALUES
(1, 'Ашхабад', 'Aşgabat', '2024-01-31 13:29:56', '2024-01-31 13:29:56'),
(2, 'Ахал', 'Ahal', '2024-01-31 13:29:56', '2024-01-31 13:29:56'),
(3, 'Мары', 'Mary', '2024-01-31 13:29:56', '2024-01-31 13:29:56'),
(4, 'Лебап', 'Lebap', '2024-01-31 13:29:56', '2024-01-31 13:29:56'),
(5, 'Дашогуз', 'Daşoguz', '2024-01-31 13:29:56', '2024-01-31 13:29:56'),
(6, 'Балкан', 'Balkan', '2024-01-31 13:29:56', '2024-01-31 13:29:56');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `status`, `updated_at`, `created_at`) VALUES
(2, 'Admin', '99367777777', 1, '2024-01-30 09:44:53', '2024-01-29 15:07:44'),
(3, 'Ismail', '99367777777', 1, '2024-01-30 09:44:37', '2024-01-30 09:44:37');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `district`
--
ALTER TABLE `district`
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
-- AUTO_INCREMENT для таблицы `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
