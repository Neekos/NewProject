-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3309
-- Время создания: Апр 02 2018 г., 07:11
-- Версия сервера: 5.6.37
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
-- База данных: `my_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'Машины', 0),
(2, 'Мотоциклы', 0),
(3, 'Грузовики', 0),
(4, 'Самолеты', 0),
(5, 'Запчасти', 1),
(6, 'Запчасти', 2),
(7, 'Запчасти', 3),
(8, 'Запчасти', 4),
(9, 'Комплектующие', 1),
(10, 'Комплектующие', 2),
(11, 'Комплектующие', 3),
(12, 'Комплектующие', 4),
(13, 'Комплект № 1', 5),
(14, 'Комплект № 1', 6),
(15, 'Комплект № 1', 7),
(16, 'Комплект № 1', 8),
(17, 'Комплект № 2', 5),
(18, 'Комплект № 3', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `catigories`
--

CREATE TABLE `catigories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catigories`
--

INSERT INTO `catigories` (`id`, `name`, `parent_id`) VALUES
(1, 'Конные прогулки и катание на лошадях', 0),
(2, 'Катание на лошади и пони', 1),
(3, 'Конные прогулки по лесу', 1),
(4, 'Программа для самых маленьких', 0),
(5, 'Индивидуальные занятия по программе \"Без седла\"', 4),
(6, 'Обучение Верховой езде', 0),
(7, 'Пони школа', 6),
(8, 'Базовый курс для начинающих', 6),
(9, 'Специализация', 6),
(10, 'Иппотерапия', 0),
(11, 'Оздоровительная верховая езда', 10),
(12, 'Фотосессии', 0),
(13, 'Аренда животных для фотосессий', 12),
(14, 'Постой лошади, аренда денника', 0),
(15, 'Постой лошади', 14),
(16, 'Услуги бейтора', 0),
(17, 'Мацион', 16),
(18, 'Подготовка молодых лошадей', 16),
(19, 'Подготовка к соревнования', 16),
(20, 'Услуги коневода', 0),
(21, 'Разминка лошадей', 20),
(22, 'Мойка,сушка лошади', 20),
(23, 'Седловка лошади', 20),
(24, 'Услуги коваля', 0),
(25, 'Расчистка копыт', 24),
(26, 'ковка без материала', 24),
(27, 'Ковка с материалом', 24),
(28, 'Прочие услуги', 0),
(29, 'Экскурсия по конюшне', 28),
(30, 'Продажа конского навоза', 28);

-- --------------------------------------------------------

--
-- Структура таблицы `fanswer`
--

CREATE TABLE `fanswer` (
  `question_id` int(4) NOT NULL DEFAULT '0',
  `a_id` int(4) NOT NULL DEFAULT '0',
  `a_name` varchar(65) NOT NULL DEFAULT '',
  `a_email` varchar(65) NOT NULL DEFAULT '',
  `a_answer` longtext NOT NULL,
  `a_datetime` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fanswer`
--

INSERT INTO `fanswer` (`question_id`, `a_id`, `a_name`, `a_email`, `a_answer`, `a_datetime`) VALUES
(0, 1, 'Neek', 'Neek@mail.ru', 'My answer!', '28/02/18 15:46:30'),
(0, 2, 'Neek', 'Neek@mail.ru', 'My answer!', '28/02/18 15:46:53'),
(0, 3, 'Андрей', 'and1997310366@mail.ru', 'Мой ответ !', '28/02/18 16:12:01'),
(3, 1, 'N', 'n', 'n', '12/03/18 19:20:54'),
(2, 1, 'f', 'f', 'f', '12/03/18 19:21:14'),
(5, 1, 'lskdjfl', 'lskgj', 'Ударь его !!', '21/03/18 15:01:09');

-- --------------------------------------------------------

--
-- Структура таблицы `fquestions`
--

CREATE TABLE `fquestions` (
  `id` int(4) NOT NULL,
  `topic` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `datetime` varchar(25) NOT NULL DEFAULT '',
  `view` int(4) NOT NULL DEFAULT '0',
  `reply` int(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fquestions`
--

INSERT INTO `fquestions` (`id`, `topic`, `detail`, `name`, `email`, `datetime`, `view`, `reply`) VALUES
(2, 'New new', 'new new', ' new ', 'new@mail.ru', '28/02/18 03:21:27', 10, 1),
(3, 'Как сделать проверку???', 'для повторов !', 'Андрей', 'and1997310366@mail.ru', '28/02/18 04:14:25', 35, 1),
(4, 'NewNewNew', 'NewNewNew', 'NewNewNew', 'NewNewNew@mail.ru', '12/03/18 07:24:16', 22, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `id_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id_post`, `datetime`, `title`, `content`, `photo`, `id_parent`) VALUES
(1, '2018-03-18 16:17:29', 'Санаторий предлагает жилье!!! ', 'Имеются различные виды жилья на любой вкус и цвет!\r\nБогатство климатических зон России, щедрость минеральных источников и другие природные факторы позволяют пользоваться отдыхом и лечением на курортах в любое время года, практически на территории всей нашей страны. И каждый регион имеет свои достижения в области оздоровительного отдыха. Огромное количество санаториев, домов отдыха и пансионатов дают прекрасную возможность пользоваться этими благами без огромных расходов и переплат.', 'file/image.jpg', 0),
(3, '0000-00-00 00:00:00', 'Добрый вечер!', 'Уже вечер, а я сижу за функция по php!', '', 0),
(4, '0000-00-00 00:00:00', 'И еще одна статья', 'Добавлю еще парочку для проверки', '', 0),
(5, '0000-00-00 00:00:00', 'Статья', '1521548609', '', 0),
(6, '0000-00-00 00:00:00', 'Статья', '1521548656', '', 0),
(7, '0000-00-00 00:00:00', 'Статья', '2018-03-20', '', 0),
(9, '0000-00-00 00:00:00', 'Статья', '1521549194', '', 0),
(10, '0000-00-00 00:00:00', 'Статья', '1521549359', '', 0),
(14, '0000-00-00 00:00:00', 'Статья', '56', '', 0),
(15, '0000-00-00 00:00:00', 'Статья', 'gfgf', '', 0),
(16, '0000-00-00 00:00:00', 'Статья', 'Привет', '', 0),
(17, '0000-00-00 00:00:00', 'Статья', 'Новая', '', 0),
(18, '0000-00-00 00:00:00', 'Статья', 'пывапывапвыап', '', 0),
(19, '0000-00-00 00:00:00', 'Статья', 'гшщзгшщзгшщз', '', 0),
(21, '0000-00-00 00:00:00', 'фото', 'фото', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `number_of_lessons` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id`, `title`, `discription`, `number_of_lessons`, `time`, `price`, `parent_id`) VALUES
(3, 'Конные прогулки и катание на лошадях', 'Конные прогулки и катание на лошадях – самая замечательная возможность отдохнуть физически и психологически, организовать свой досуг, насладиться природой и общением с лошадьми. \r\nВ рамках программы нашего клуба вы можете заказать конную прогулку или катание на лошадях:\r\n \r\nкатание на лошади – вы удобно располагаетесь в седле и наслаждаетесь процессом, в то время как опытный инструктор ведет и контролирует лошадь поводьями.\r\n \r\nконная прогулка по  лесу– вы самостоятельно управляете животным в присутствии и под контролем инструктора.\r\n\r\nНаши инструкторы не только отличные наездники и наставники, способные в кратчайшие сроки обучить мастерству управления лошадью, но и превосходные психологи. Под их руководством вы очень быстро наладите контакт с сильным и умным животным, раскрепоститесь, перестанете его бояться, начнете доверять друг другу.\r\n\r\nОплата  за  услугу  производится  за  каждого  человека,   детям,  которые  едут на  одной  лошади  вместе  с  родителем (от 2,5  до  4  лет), скидка 30%;\r\nПо  предварительной  записи у  администратора.\r\n\r\n\r\n', '', '10мин', '300 Руб', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `statti`
--

CREATE TABLE `statti` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statti`
--

INSERT INTO `statti` (`id`, `title`, `text`, `discription`, `parent_id`) VALUES
(1, 'Запчасть 1', 'Текст 1', 'Описание 1', 13),
(2, 'Запчасть 2', 'Текст 2', 'Описание 2', 14),
(3, 'Запчасть 3', 'текст 3', 'Описание 3', 15),
(4, 'Запчасть 4', 'Текст 4', 'Описание 4', 16),
(5, 'Запчасть 5', 'Текст 5', 'Описание 5', 17),
(6, 'Запчасть 6', 'Текст 6', 'Описание6', 18),
(7, 'Запчасть 7', 'Текст 7', 'Описание 7', 13),
(8, 'Запчасть 8', 'Текст 8', 'Описание 8', 14),
(9, 'Запчасть 9', 'Текст 9', 'Описание 9', 15),
(10, 'Запчасть 10', 'Текст 10', 'Описание 10', 16),
(11, 'Запчасть 11', 'Текст 11', 'Описание 11', 17),
(12, 'Запчасть 12', 'Текст 12', 'Описание 12', 18),
(13, 'Запчасть 13', 'Текст 13', 'Описание 13', 13),
(14, 'Запчасть 14', 'Текст 14', 'Описание 14', 14),
(15, 'Запчасть 15', 'Текст 15', 'Описание 15', 15),
(16, 'Запчасть 16', 'Текст 16', 'Описание 16', 16),
(17, 'Запчасть 17', 'Текст 17', 'Описание 17', 17),
(18, 'Запчасть 18', 'Текст 18', 'Описание 18', 18),
(19, 'Запчасть 19', 'Текст 19', 'Описание 19', 13),
(20, 'Запчасть 20', 'Текст 20', 'Описание 20', 14),
(21, 'Запчасть 21', 'Текст 21', 'Описание 21', 15),
(22, 'Запчасть 22', 'Текст 22', 'Описание 22', 16),
(23, 'Запчасть 24', 'Текст 24', 'Описание 24', 17),
(24, 'Запчасть 25', 'Текст 25', 'Описание 25', 18),
(25, 'Запчасть 26', 'Текст 26', 'Описание 26', 13),
(26, 'Запчасть 27', 'Текст 27', 'Описание 27', 14),
(27, 'Запчасть 28', 'Текст 28', 'Описание 28', 15),
(28, 'Запчасть 29', 'Текст 29', 'Описание 29', 16),
(29, 'Запчасть 30', 'Текст 30', 'Описание 30', 17);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name_status`) VALUES
(1, 'Активно'),
(2, 'Неактивно');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `join_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `join_date`) VALUES
(9, 'User', '202cb962ac59075b964b07152d234b70', 'email', '2018-02-13 07:16:58'),
(10, 'User1', '202cb962ac59075b964b07152d234b70', 'k@mai.ru', '2018-03-23 12:11:05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catigories`
--
ALTER TABLE `catigories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fanswer`
--
ALTER TABLE `fanswer`
  ADD KEY `a_id` (`a_id`);

--
-- Индексы таблицы `fquestions`
--
ALTER TABLE `fquestions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statti`
--
ALTER TABLE `statti`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `catigories`
--
ALTER TABLE `catigories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `fquestions`
--
ALTER TABLE `fquestions`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `statti`
--
ALTER TABLE `statti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
