-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 27 2023 г., 11:45
-- Версия сервера: 5.7.33
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fitness_rakhmatullin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id_application` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `coach` int(11) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `application_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `planeworkout`
--

CREATE TABLE `planeworkout` (
  `id_plane` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `coach` int(11) NOT NULL,
  `date_workout` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `title`) VALUES
(1, 'Администратор'),
(2, 'Клиент'),
(3, 'Тренер');

-- --------------------------------------------------------

--
-- Структура таблицы `status_order`
--

CREATE TABLE `status_order` (
  `id_order` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status_order`
--

INSERT INTO `status_order` (`id_order`, `updated_at`, `id_status`) VALUES
(1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `typestraining`
--

CREATE TABLE `typestraining` (
  `id_training` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patronymic` varchar(100) DEFAULT NULL,
  `phone` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `gender` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `awards` varchar(500) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `surname`, `name`, `patronymic`, `phone`, `password`, `birthday`, `photo`, `gender`, `created_at`, `awards`, `role`) VALUES
(1, 'Иванов', 'Иван', 'Иванович', '88005553535', '123456', '2001-01-20', 'trener1.png', 'm', '2023-02-21 09:50:39', '-', 3),
(2, 'Сергеев', 'Сергей', 'Сергеевич', '88005552855', '123456', '2001-01-20', 'trener2.png', 'm', '2023-02-21 09:50:39', '-', 3),
(3, 'Йосифин', 'Урях', 'Хаплинский', '89962936900', '123456', '2001-01-20', 'trener3.png', 'm', '2023-02-21 09:50:39', 'Мастер спорта по кринжу. Профессиональный кринжистон', 3),
(5, 'Рахматуллин', 'Артур', 'Робертович', '89962936902', '123123', '2023-03-10', NULL, 'm', '2023-03-27 11:03:53', NULL, 2),
(6, 'Рахматуллин', 'Артур', 'Робертович', '89962936904', '123123', '2023-03-10', NULL, 'm', '2023-03-27 11:03:11', NULL, 2),
(7, 'Рахматуллин', 'Артур', 'Робертович', '89962936906', '123123', '2023-03-10', NULL, 'm', '2023-03-27 11:03:19', NULL, 2),
(8, 'Зигатуллина', 'Лиана', NULL, '89656934712', '789789', '1995-06-02', 'Без названия.jfif', 'f', '2023-03-27 11:03:47', NULL, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `workout`
--

CREATE TABLE `workout` (
  `id_workout` int(11) NOT NULL,
  `type_workout` varchar(50) NOT NULL,
  `kol_podxodov` int(11) NOT NULL,
  `kol_povtor` int(11) NOT NULL,
  `plane_workout` int(11) NOT NULL,
  `pulse` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id_application`),
  ADD KEY `client` (`client`),
  ADD KEY `coach` (`coach`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `planeworkout`
--
ALTER TABLE `planeworkout`
  ADD PRIMARY KEY (`id_plane`),
  ADD KEY `client` (`client`),
  ADD KEY `coach` (`coach`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `typestraining`
--
ALTER TABLE `typestraining`
  ADD PRIMARY KEY (`id_training`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `u` (`role`);

--
-- Индексы таблицы `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`id_workout`),
  ADD UNIQUE KEY `type_workout` (`type_workout`),
  ADD KEY `plane_workout` (`plane_workout`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id_application` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `planeworkout`
--
ALTER TABLE `planeworkout`
  MODIFY `id_plane` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `typestraining`
--
ALTER TABLE `typestraining`
  MODIFY `id_training` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `workout`
--
ALTER TABLE `workout`
  MODIFY `id_workout` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`coach`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`client`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`id_application`) REFERENCES `status_order` (`id_order`);

--
-- Ограничения внешнего ключа таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `order_status_ibfk_1` FOREIGN KEY (`id`) REFERENCES `status_order` (`id_status`);

--
-- Ограничения внешнего ключа таблицы `planeworkout`
--
ALTER TABLE `planeworkout`
  ADD CONSTRAINT `planeworkout_ibfk_2` FOREIGN KEY (`client`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `planeworkout_ibfk_3` FOREIGN KEY (`coach`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`);

--
-- Ограничения внешнего ключа таблицы `workout`
--
ALTER TABLE `workout`
  ADD CONSTRAINT `workout_ibfk_1` FOREIGN KEY (`plane_workout`) REFERENCES `planeworkout` (`id_plane`),
  ADD CONSTRAINT `workout_ibfk_2` FOREIGN KEY (`id_workout`) REFERENCES `typestraining` (`id_training`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
