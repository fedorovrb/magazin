-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 10 2017 г., 11:43
-- Версия сервера: 10.1.25-MariaDB
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `magazin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(100) DEFAULT NULL,
  `razdel` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`, `razdel`) VALUES
(35, 'Футболки', 'Летняя одежда'),
(36, 'Куртки', 'Зимняя одежда'),
(37, 'Прочее', 'Зимняя одежда'),
(39, 'За сестричку', 'Не обессудь');

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`id`, `name`, `category`, `description`, `price`) VALUES
(98, 'Ботинки', 'Обувь', 'ботиночки', '2000'),
(104, 'dsa', 'sdasd', 'sadsda', '232332'),
(112, 'фыфыф', 'Ботиночки мои', 'ывфывф', '23000'),
(113, '3223', 'Обувь', 'asdsadsa', '12'),
(114, '1221', 'Обувь', 'asdsda', '12, 200'),
(115, '12', '2323', 'ыфывф\'іввіфіфв\'saas', '23'),
(117, 'dsadsa', 'Обувь', 'sdasdasad', '2323'),
(118, '2323', '', 'dsasdaasddsa', '232, 23'),
(120, 'sdajsadksda', '', 'ыфвлолдыфвоыфв', '122'),
(121, 'ыфввы', '', 'ыфвыф', '12'),
(122, 'ывфвыф', '', 'ывфывыф', '123'),
(123, 'ывфвыф', '', 'ывфывыф', '123'),
(124, '2332as', '', 'asasas', '1221'),
(125, '2332as', '', 'asasas', '1221'),
(127, 'sadsa', '', 'dsasad', '122'),
(131, 'dsadsa', 'assa', 'dsasaddsa', '1213'),
(132, 'АГа', 'Ткань', 'Моий', '123 00'),
(133, 'Хорошо', 'Обувь', 'сичтчстичсичсмчисмпы', '39 000'),
(134, 'jfdhjkdfhjdfjdsh', 'Ткань', 'hsdjsdhjksahdskjhds', '123 000'),
(137, 'fdsdfs', 'Одежда', 'fdafdsdfsdadsa', '2332'),
(138, 'sndsd', 'Ткань', 'dsssdd', '123.12'),
(141, 'азазаз', 'Обувь', 'Игрвыддылва', '20000'),
(142, 'раоввыоыл', 'Обувь', 'ывфрвыфорывфлорывЖ,фыыффы', '1253'),
(143, 'ывфывф', 'Ткань', 'ыфвыф', '1233333'),
(144, 'Molodec', 'Hav', 'assasadsdasdsadsad', '123.00'),
(148, 'Куртка', 'Куртки', 'Курточка', '1234.00'),
(149, 'Куртка', 'вфыыфв', 'ЫФЫФ', '1233.00');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `img` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `img`) VALUES
(1, 'sneg-lyzhniki-zima-pticy.jpg'),
(3, 'Снимок экрана от 2017-11-02 12-25-08.png'),
(4, 'sneg-lyzhniki-zima-pticy.jpg'),
(6, 'zima-sneg-iolki.jpg'),
(7, 'viktoriia-odintsova-viki-odintcova-devushka-model-krasotka-s.jpg'),
(8, 'zima-sneg-iolki.jpg'),
(9, 'Снимок экрана от 2017-12-03 17-45-02.png'),
(10, 'Снимок экрана от 2017-12-05 14-52-26.png'),
(11, 'Снимок экрана от 2017-11-02 12-25-08.png'),
(12, 'Снимок экрана от 2017-11-02 12-25-59.png'),
(13, 'zima-sneg-iolki.jpg'),
(14, 'Снимок экрана от 2017-12-03 17-45-02.png'),
(15, 'Снимок экрана от 2017-11-02 12-25-08.png'),
(16, 'Снимок экрана от 2017-12-05 14-52-26.png');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `id_content` int(11) DEFAULT NULL,
  `img` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `id_content`, `img`) VALUES
(13, 60, 'images/Снимок экрана от 2017-11-02 12-25-08.png'),
(14, 61, 'images/Снимок экрана от 2017-11-02 12-25-08.png'),
(54, 98, 'Снимок экрана от 2017-11-09 13-50-58.png'),
(62, 104, 'Снимок экрана от 2017-11-09 13-50-58.png'),
(75, 112, 'viktoriia-odintsova-viki-odintcova-devushka-model-krasotka-s.jpg'),
(76, 113, 'Снимок экрана от 2017-11-09 13-49-52.png'),
(77, 114, 'Снимок экрана от 2017-11-09 13-40-34.png'),
(78, 115, 'Снимок экрана от 2017-11-02 12-25-59.png'),
(80, 117, 'Снимок экрана от 2017-11-02 12-25-08.png'),
(81, 118, 'Снимок экрана от 2017-11-02 12-25-08.png'),
(82, 118, 'Снимок экрана от 2017-11-09 13-49-52.png'),
(84, 120, 'Снимок экрана от 2017-11-09 13-40-34.png'),
(85, 121, 'Снимок экрана от 2017-11-09 13-49-52.png'),
(86, 122, 'zima-sneg-iolki.jpg'),
(87, 122, 'Снимок экрана от 2017-11-02 12-25-59.png'),
(88, 123, 'zima-sneg-iolki.jpg'),
(89, 123, 'Снимок экрана от 2017-11-02 12-25-59.png'),
(90, 124, 'Снимок экрана от 2017-11-09 13-40-34.png'),
(91, 125, 'Снимок экрана от 2017-11-09 13-40-34.png'),
(93, 127, 'Снимок экрана от 2017-11-02 12-25-08.png'),
(97, 131, 'Снимок экрана от 2017-11-02 12-25-08.png'),
(98, 132, 'Снимок экрана от 2017-11-02 12-25-08.png'),
(99, 133, 'Снимок экрана от 2017-11-02 12-25-08.png'),
(100, 133, 'Снимок экрана от 2017-11-02 12-25-59.png'),
(101, 133, 'Снимок экрана от 2017-11-09 13-40-34.png'),
(102, 134, 'Снимок экрана от 2017-11-09 13-40-34.png'),
(103, 134, 'Снимок экрана от 2017-11-09 13-49-52.png'),
(104, 134, 'Снимок экрана от 2017-11-09 13-50-58.png'),
(105, 134, 'Снимок экрана от 2017-11-09 13-50-58.png'),
(108, 137, 'zima-sneg-iolki.jpg'),
(109, 138, 'Снимок экрана от 2017-11-09 13-49-52.png'),
(110, 138, 'zima-sneg-iolki.jpg'),
(113, 141, 'sneg-lyzhniki-zima-pticy.jpg'),
(114, 141, 'zima-sneg-iolki.jpg'),
(115, 141, 'Снимок экрана от 2017-11-09 13-50-58.png'),
(116, 142, 'sneg-lyzhniki-zima-pticy.jpg'),
(117, 142, 'zima-sneg-iolki.jpg'),
(118, 142, 'Снимок экрана от 2017-11-09 13-50-58.png'),
(119, 143, 'sneg-lyzhniki-zima-pticy.jpg'),
(120, 144, 'zima-sneg-iolki.jpg'),
(124, 148, 'Снимок экрана от 2017-11-09 13-50-58.png'),
(125, 149, 'Снимок экрана от 2017-11-09 13-40-34.png');

-- --------------------------------------------------------

--
-- Структура таблицы `oforml`
--

CREATE TABLE `oforml` (
  `number_zakaza` int(11) NOT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `type_deliv` varchar(200) DEFAULT NULL,
  `city_np` varchar(200) DEFAULT NULL,
  `otedel_np` varchar(200) DEFAULT NULL,
  `city_up` varchar(200) DEFAULT NULL,
  `street_up` varchar(200) DEFAULT NULL,
  `house_up` varchar(200) DEFAULT NULL,
  `apart_up` varchar(200) DEFAULT NULL,
  `index_up` varchar(200) DEFAULT NULL,
  `els` varchar(1000) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `oforml`
--

INSERT INTO `oforml` (`number_zakaza`, `surname`, `name`, `phone`, `type_deliv`, `city_np`, `otedel_np`, `city_up`, `street_up`, `house_up`, `apart_up`, `index_up`, `els`, `status`) VALUES
(56, 'Федоровs', 'Фывф', '0950531442', 'Самовывоз', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Обработан'),
(57, 'Леонов', 'Фывф', '0950531442', 'Новая Почта', 'Днеп', '12', NULL, NULL, NULL, NULL, NULL, NULL, 'Обработан'),
(58, 'Фы', 'Фывф', '0950531442', 'Самовывоз', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Обработан'),
(59, 'Фы', 'Фы', '0950531442', 'Самовывоз', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Обработан'),
(60, 'Ad', 'As', '0950531442', 'Самовывоз', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Обработан'),
(61, 'Ad', 'Asas', '0950531442', 'Самовывоз', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Обработан'),
(62, 'Ad', 'As', '0950531442', 'Самовывоз', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Обработан'),
(63, 'Ad', 'Ad', '0950531442', 'Самовывоз', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Обработан'),
(64, 'Никон', 'Итор', '0950531442', 'Укрпочта', NULL, NULL, 'Днпр', 'Калинова', '7', '121', '49000', NULL, 'Обработан'),
(65, 'Фы', 'Фы', '0950531442', 'Самовывоз', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Обработан');

-- --------------------------------------------------------

--
-- Структура таблицы `razdelu`
--

CREATE TABLE `razdelu` (
  `id_category` int(11) NOT NULL,
  `razdel` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `razdelu`
--

INSERT INTO `razdelu` (`id_category`, `razdel`) VALUES
(5, 'Зимняя одежда'),
(6, 'Летняя одежда'),
(7, 'Не обессудь');

-- --------------------------------------------------------

--
-- Структура таблицы `zakazi`
--

CREATE TABLE `zakazi` (
  `id` int(11) NOT NULL,
  `number_zakaza` int(11) NOT NULL,
  `id_zakaza` varchar(200) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `color` varchar(200) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL,
  `kolvo` varchar(200) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `zakazi`
--

INSERT INTO `zakazi` (`id`, `number_zakaza`, `id_zakaza`, `name`, `color`, `size`, `kolvo`, `price`) VALUES
(54, 56, '144', 'Molodec', 'images/zima-sneg-iolki.jpg', 'XS', '1', 123),
(55, 57, '143', 'ывфывф', 'images/sneg-lyzhniki-zima-pticy.jpg', 'XS', '1', 1233330),
(56, 58, '144', 'Molodec', 'images/zima-sneg-iolki.jpg', 'XS', '1', 123),
(57, 59, '149', 'Куртка', 'images/Снимок экрана от 2017-11-09 13-40-34.png', 'XS', '5', 6165),
(58, 59, '148', 'Куртка', 'images/Снимок экрана от 2017-11-09 13-50-58.png', 'XS', '1', 1234),
(59, 60, '144', 'Molodec', 'images/zima-sneg-iolki.jpg', 'XS', '1', 123),
(60, 60, '148', 'Куртка', 'images/Снимок экрана от 2017-11-09 13-50-58.png', 'XS', '3', 3702),
(61, 60, '148', 'Куртка', 'images/Снимок экрана от 2017-11-09 13-50-58.png', 'XS', '2', 2468),
(62, 61, '138', 'sndsd', 'images/zima-sneg-iolki.jpg', 'XS', '1', 123.12),
(63, 62, '149', 'Куртка', 'images/Снимок экрана от 2017-11-09 13-40-34.png', 'XS', '1', 1233),
(64, 63, '149', 'Куртка', 'images/Снимок экрана от 2017-11-09 13-40-34.png', 'XS', '1', 1233),
(65, 64, '148', 'Куртка', 'images/Снимок экрана от 2017-11-09 13-50-58.png', 'XL', '10', 12340),
(66, 64, '149', 'Куртка', 'images/Снимок экрана от 2017-11-09 13-40-34.png', 'XS', '1', 1233),
(67, 64, '143', 'ывфывф', 'images/sneg-lyzhniki-zima-pticy.jpg', 'XS', '1', 1233330),
(68, 65, '149', 'Куртка', 'images/Снимок экрана от 2017-11-09 13-40-34.png', 'XS', '1', 1233);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `oforml`
--
ALTER TABLE `oforml`
  ADD PRIMARY KEY (`number_zakaza`);

--
-- Индексы таблицы `razdelu`
--
ALTER TABLE `razdelu`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `zakazi`
--
ALTER TABLE `zakazi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT для таблицы `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT для таблицы `oforml`
--
ALTER TABLE `oforml`
  MODIFY `number_zakaza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT для таблицы `razdelu`
--
ALTER TABLE `razdelu`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `zakazi`
--
ALTER TABLE `zakazi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
