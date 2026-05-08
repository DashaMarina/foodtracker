-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 05 2026 г., 07:51
-- Версия сервера: 5.7.39
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `place_id`, `name`, `price`) VALUES
(1, 5, 'Удон с креветками', '850.00'),
(2, 6, 'Лагман', '580.00'),
(3, 7, 'Котлеты из семги', '771.00'),
(4, 7, 'Бульон с мясными пельменями', '483.00'),
(5, 6, 'Кофе', '200.00'),
(6, 8, 'Чай', '150.00'),
(7, 8, 'Мороженное (шарик шоколад)', '300.00'),
(8, 8, 'Мороженное (шарик ваниль)', '280.00'),
(9, 8, 'Мороженное (шарик клубника)', '300.00'),
(10, 9, 'Орео(мороженое)', '260.00'),
(11, 9, 'Смузи (клубника-банан)', '230.00'),
(12, 9, 'Смузи (яблоко-киви)', '230.00'),
(13, 9, 'Куриный сэндвич', '250.00'),
(14, 9, 'Чипсы (150 гр.)', '250.00'),
(15, 9, 'Сухарики (60 гр.)', '60.00'),
(16, 10, 'Борщ с жаренными карасями', '390.00'),
(17, 10, 'Уха рыбацкая', '1400.00'),
(18, 10, 'Стейк из белуги с соусом из мака', '1490.00'),
(19, 10, 'Шашлык из сома', '890.00'),
(20, 10, 'Шашлык из осетра', '1790.00'),
(21, 11, 'Борщ', '520.00'),
(22, 11, 'Уха Астраханская', '785.00'),
(23, 11, 'Рёбра свинные', '1097.00'),
(24, 11, 'Томаты с луком', '514.00'),
(25, 11, 'Блинный торт', '482.00'),
(26, 13, 'Жульен', '403.00'),
(27, 13, 'Цезарь с креветками', '754.00'),
(28, 13, 'Луковый суп-пюре', '338.00'),
(29, 12, 'Пеперони', '990.00'),
(30, 12, 'Долма', '239.00'),
(31, 12, 'Чуду с картошкой', '99.00'),
(32, 12, 'Чечевичный суп', '169.00'),
(33, 14, 'Наполеон', '501.00'),
(34, 14, 'Красный бархат', '507.00'),
(35, 14, 'Томям', '500.00'),
(36, 14, 'Шаурма сырная', '330.00'),
(37, 5, 'Мидии в сливочно-икорном соусе', '840.00'),
(38, 5, 'Креветки темпура', '510.00'),
(39, 5, 'Паста с лососем', '840.00'),
(40, 7, 'Чай облепиха', '309.00');

-- --------------------------------------------------------

--
-- Структура таблицы `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `place_id`) VALUES
(1, 2, 5),
(2, 2, 11),
(3, 2, 13),
(6, 16, 6),
(4, 16, 12),
(5, 16, 14),
(7, 17, 9),
(8, 17, 11),
(9, 17, 13),
(10, 18, 6),
(11, 18, 10),
(12, 18, 14),
(14, 19, 5),
(13, 19, 10),
(17, 20, 7),
(16, 20, 11),
(15, 20, 14),
(19, 21, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `place_id`, `image`) VALUES
(1, 5, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuisine_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `places`
--

INSERT INTO `places` (`id`, `name`, `address`, `cuisine_type`) VALUES
(5, 'Ямато', 'ул. Урицкого, 3', 'Азиатская,Европейская'),
(6, 'Чайхана шоли', 'ул.Урицкого.3/9/12', 'Таджитская'),
(7, 'Акватория', 'улица Пугачёва, 1А', 'Русская, Европейская'),
(8, 'Крем кафе', 'ул.Урицкого, 3', 'Европейская'),
(9, 'Ваще Забей', 'ул.Савушкина, 7А', 'Смешенная'),
(10, 'Щука', 'ул.Лейтенанта Шмидта, 5А', 'Русская, Европейская'),
(11, 'Белуга', 'ул.Фиолетова, 1-3', 'Смешенная'),
(12, 'Puzo', 'ул.Боевая, 25', 'Узбекская, Русская'),
(13, 'Kontrast Provence', 'ул.Бертюльская, 7', 'Европейская, Французкая'),
(14, 'Akula Cofee', 'ул.Кирова,30/1', 'Смешенная');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `rating` int(11) DEFAULT '5',
  `visit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `place_id`, `comment`, `rating`, `visit_date`) VALUES
(2, 2, 5, 'Всё понравилось!!!', 5, '2022-08-01'),
(3, 16, 5, 'Атмосфера отличная и еда вкусная, но пицца не очень', 5, '2026-04-17'),
(4, 17, 6, 'Острая кухня, на любителя...', 5, '2026-04-25'),
(7, 20, 7, 'Очень вкусно!!\r\n', 5, '2026-05-23');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
(1, 'Администратор', 'admin@food.com', '838995', 1),
(2, 'Иван', 'vanka443@gmail.com', '123', 0),
(16, 'Владислав', 'vladick@gmail.com', '654', 0),
(17, 'Марина', 'marinahidirova@gmail.com', '000', 0),
(18, 'Валя', 'valentina@gmail.com', '0009', 0),
(19, 'Карина', '94j@gmail.com', '0909', 0),
(20, 'Надя', 'nadya@gmail.com', '008', 0),
(21, 'Никита', 'er@gmail.com', '7676', 0),
(22, 'Вячеслав', 'sar@gmail.com', '0008', 0),
(23, 'Дмитрий', 'dsa@gmail.com', '7878', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`);

--
-- Индексы таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`place_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place_id` (`place_id`);

--
-- Индексы таблицы `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
