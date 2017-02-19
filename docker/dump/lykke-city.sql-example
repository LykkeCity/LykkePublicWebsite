-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Хост: 10.0.0.18
-- Время создания: Фев 02 2017 г., 18:45
-- Версия сервера: 5.6.16-log
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tl`
--

-- --------------------------------------------------------

--
-- Структура таблицы `asset`
--

CREATE TABLE IF NOT EXISTS `asset` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `show_content` int(11) NOT NULL DEFAULT '1',
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `asset_pair`
--

CREATE TABLE IF NOT EXISTS `asset_pair` (
  `id` int(11) NOT NULL,
  `asset_basic_id` int(11) NOT NULL,
  `asset_quote_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `lykke_user_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  `reply_comment_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `spam` int(11) NOT NULL DEFAULT '0',
  `edited` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `blog_comments_edited_history`
--

CREATE TABLE IF NOT EXISTS `blog_comments_edited_history` (
  `id` int(11) NOT NULL,
  `blog_comments_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  `lykke_user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `blog_comments_subscribe`
--

CREATE TABLE IF NOT EXISTS `blog_comments_subscribe` (
  `id` int(11) NOT NULL,
  `lykke_user_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  `subscribe` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `post_text` text NOT NULL,
  `post_preview_text` text NOT NULL,
  `post_img` varchar(255) DEFAULT NULL,
  `post_datetime` datetime NOT NULL,
  `post_author` int(11) NOT NULL,
  `published` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `lykke_user`
--

CREATE TABLE IF NOT EXISTS `lykke_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `blocked_comment` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `lykke_user_access`
--

CREATE TABLE IF NOT EXISTS `lykke_user_access` (
  `id` int(11) NOT NULL,
  `lykke_user_id` int(11) NOT NULL,
  `admin_panel` int(11) NOT NULL DEFAULT '0',
  `edit_frontent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `site_pages`
--

CREATE TABLE IF NOT EXISTS `site_pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `parent` varchar(25) NOT NULL,
  `datetime` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `route` varchar(255) NOT NULL,
  `published` int(11) NOT NULL,
  `in_menu` int(11) NOT NULL,
  `template` varchar(255) NOT NULL,
  `normal_tpl` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `asset_pair`
--
ALTER TABLE `asset_pair`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_comments_edited_history`
--
ALTER TABLE `blog_comments_edited_history`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_comments_subscribe`
--
ALTER TABLE `blog_comments_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lykke_user`
--
ALTER TABLE `lykke_user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `lykke_user_access`
--
ALTER TABLE `lykke_user_access`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `site_pages`
--
ALTER TABLE `site_pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `asset`
--
ALTER TABLE `asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `asset_pair`
--
ALTER TABLE `asset_pair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT для таблицы `blog_comments_edited_history`
--
ALTER TABLE `blog_comments_edited_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `blog_comments_subscribe`
--
ALTER TABLE `blog_comments_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `lykke_user`
--
ALTER TABLE `lykke_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `lykke_user_access`
--
ALTER TABLE `lykke_user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `site_pages`
--
ALTER TABLE `site_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
