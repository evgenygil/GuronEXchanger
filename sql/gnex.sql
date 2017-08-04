-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 04 2017 г., 16:16
-- Версия сервера: 5.7.16
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gnex`
--

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `id` int(5) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `value` float NOT NULL,
  `bank` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ready` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `transactions`
--

INSERT INTO `transactions` (`id`, `hash`, `currency`, `value`, `bank`, `user`, `timestamp`, `ready`) VALUES
(1, '96439f7634gf974369734f6g', 'CNY', 644.2, 'CNY BANK 1', 'CINAO CINAO CINAO', '2017-07-05 07:00:39', 0),
(2, 'fwyq4g7863f4g9743fg973fg', 'RUB', 25000, 'SBERBANK 1', 'OLEG OLEGOVICH OLEGOV', '2017-07-05 07:01:13', 1),
(3, '1fk3y4fgo143fg0348f6347f43', 'EUR', 3345, 'DEUTCHE BANK', 'MIGEL MIGEL NIGFE', '2017-07-05 07:24:14', 0),
(4, '81746r0134867g09f4373476fg', 'RUB', 644.2, 'CNY BANK 2', 'CINAO CINAO CINAO', '2017-07-05 04:40:39', 1),
(5, 'hbo13i4fb08437f0348f60346f', 'USD', 25000, 'SBERBANK 2', 'OLEG OLEGOVICH OLEGOV', '2017-07-05 05:01:13', 1),
(6, '13bjhkl34fg0843f634f08346f', 'EUR', 3345, 'DEUTCHE BANK 2', 'MIGEL MIGEL NIGFE', '2017-07-05 07:14:14', 0),
(7, '96439f7634gf974369734f6g', 'CNY', 74353, 'BANK IBCCC', 'USER 2', '2017-08-04 06:01:14', 1),
(8, '91726fg9172f4g193gvc913guhy', 'RUB', 18000, 'BANK SBRF', 'ANDREY KONDRASHOV', '2017-08-04 06:02:06', 1),
(9, '1f096g49321yufgo84376fgo8634f', 'RUB', 5000.5, 'BANK SPB', 'ANDREY KONDRASHOV', '2017-08-04 06:02:33', 0),
(10, '02g8n753hg02p875gh02g425g45g54g', 'EUR', 290, 'SEPBANK', 'TIMMY MYAKONIEN', '2017-08-04 06:03:11', 1),
(11, '0h21g74hg0g35798hu3g479021385hg5', 'CNY', 1235, 'GUANGHDONG BK', 'KIT KITFORT', '2017-08-04 06:04:02', 1),
(12, '234579682947852439563', 'CNY', 300, 'SEPBANK', 'EVGENY GIL', '2017-08-04 06:01:14', 0),
(15, '84f3f43555e5a3edb8394202aeab1d98', 'RUB', 3005, 'SEPBANK', 'EVGENY GIL', '2017-08-04 12:46:19', 0),
(16, '769b3b8160922c89718d2697241d7e1e', 'USD', 36664, 'SB', 'EVGENY GIL', '2017-08-04 13:01:57', 0),
(17, '7fc71d7388a6ee9fa3acc02bc2a57e32', 'RUB', 67800, 'SBERBANK', 'EVGENY GIL', '2017-08-04 13:08:09', 0),
(18, 'c9444dc22cd69f0de47a8b37dc0b741e', 'EUR', 455, 'SBERBANK', 'EVGENY GIL', '2017-08-04 13:08:50', 0),
(19, 'b79808565283793c14a22676901ca6cd', 'CNY', 90000, 'SB', 'EVGENY GIL', '2017-08-04 13:09:16', 0),
(20, '25f518782b6448746f5ea5a88bee61bc', 'EUR', 900, 'BANK SAINT PETERSBURG', 'EVGENY GIL', '2017-08-04 13:09:37', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
