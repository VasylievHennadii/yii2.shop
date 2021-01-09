-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 09 2021 г., 16:54
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `title`, `description`, `keywords`) VALUES
(1, 0, 'Branded Foods', 'Branded Foods description', 'Branded Foods keywords'),
(2, 0, 'Households', 'Households description', 'Households keywords'),
(3, 0, 'Veggies & Fruits', 'Veggies & Fruits description', 'Veggies & Fruits keywords'),
(4, 3, 'Vegetables', 'Vegetables description', 'Vegetables keywords'),
(5, 3, 'Fruits', 'Fruits description', 'Fruits keywords'),
(6, 0, 'Kitchen', NULL, NULL),
(7, 0, 'Short Codes', NULL, NULL),
(8, 0, 'Beverages', NULL, NULL),
(9, 8, 'Soft Drinks', NULL, NULL),
(10, 8, 'Juices', NULL, NULL),
(11, 0, 'Pet Food', NULL, NULL),
(12, 0, 'Frozen Foods', NULL, NULL),
(13, 12, 'Frozen Snacks', NULL, NULL),
(14, 12, 'Frozen Nonveg', NULL, NULL),
(15, 0, 'Bread & Bakery', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT 0.00,
  `old_price` decimal(6,2) NOT NULL DEFAULT 0.00,
  `description` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'no-image.png',
  `is_offer` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `content`, `price`, `old_price`, `description`, `keywords`, `img`, `is_offer`) VALUES
(1, 1, 'knorr instant soup (100 gm)', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.00', '0.00', NULL, NULL, '5.png', 1),
(2, 1, 'chings noodles (75 gm)', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '5.00', '8.00', NULL, NULL, '6.png', 0),
(3, 1, 'lahsun sev (150 gm)', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.00', '5.00', NULL, NULL, '7.png', 0),
(4, 1, 'premium bake rusk (300 gm)', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '5.00', '7.00', NULL, NULL, '8.png', 0),
(5, 1, 'fresh spinach (palak)', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2.00', '3.00', NULL, NULL, '9.png', 1),
(6, 5, 'fresh mango dasheri (1 kg)', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '5.00', '8.00', NULL, NULL, '10.png', 0),
(7, 5, 'fresh apple red (1 kg)', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '6.00', '8.00', NULL, NULL, '11.png', 1),
(8, 4, 'fresh broccoli (500 gm)', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '4.00', '6.00', NULL, NULL, '12.png', 0),
(9, 10, 'mixed fruit juice (1 ltr)', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.00', '0.00', NULL, NULL, '13.png', 1),
(10, 10, 'prune juice - sunsweet (1 ltr)', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '4.00', '0.00', NULL, NULL, '14.png', 1),
(11, 9, 'coco cola zero can (330 ml)', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.00', '0.00', NULL, NULL, '15.png', 0),
(12, 9, 'sprite bottle (2 ltr)', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '3.00', '0.00', NULL, NULL, '16.png', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
