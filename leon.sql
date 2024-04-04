-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 04 2024 г., 09:52
-- Версия сервера: 5.6.51
-- Версия PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `leon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adm_m_catalog`
--

CREATE TABLE `adm_m_catalog` (
  `id` int(11) NOT NULL,
  `items_on_page` int(11) NOT NULL COMMENT 'Количество товара на странице',
  `show_pages` tinyint(1) NOT NULL COMMENT 'Постраничная навигация',
  `sys_name` varchar(100) NOT NULL COMMENT 'Системное имя страницы каталога'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `adm_m_catalog`
--

INSERT INTO `adm_m_catalog` (`id`, `items_on_page`, `show_pages`, `sys_name`) VALUES
(1, 12, 1, 'catalog');

-- --------------------------------------------------------

--
-- Структура таблицы `adm_m_feedback`
--

CREATE TABLE `adm_m_feedback` (
  `id` int(11) NOT NULL,
  `send_to` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'Email для отправки',
  `send_from` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mess_title` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'Заголовок письма',
  `mess_send` text CHARACTER SET utf8 NOT NULL COMMENT 'Сообщение об успешной отправке',
  `mess_error` text CHARACTER SET utf8 NOT NULL COMMENT 'Сообщение о неудачной отправке',
  `mess_form` text CHARACTER SET utf8 NOT NULL COMMENT 'Сообщение перед формой',
  `is_captcha` tinyint(1) NOT NULL,
  `sys_name` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'Системное имя страницы обратной связи'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `adm_m_feedback`
--

INSERT INTO `adm_m_feedback` (`id`, `send_to`, `send_from`, `mess_title`, `mess_send`, `mess_error`, `mess_form`, `is_captcha`, `sys_name`) VALUES
(1, 'soa@flowcontrol-russia.com,admin@zonareklamy.ru,gsv@flowcontrol-russia.com', '', 'Сообщение с сайта flowcontrol-russia.com', 'Спасибо, Ваше сообщение успешно отправлено! Мы обязательно свяжемся с Вами!', 'Сообщение не было отправлено. Обратитесь к администратору!', '', 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `adm_m_news`
--

CREATE TABLE `adm_m_news` (
  `id` int(11) NOT NULL,
  `kol_widjet` int(11) NOT NULL COMMENT 'Количество новостей в виджете',
  `kol_arh` int(11) NOT NULL COMMENT 'Количество новостей в архиве',
  `show_date` tinyint(1) NOT NULL COMMENT 'Показывать дату',
  `show_time` tinyint(1) NOT NULL COMMENT 'Показывать время',
  `show_title` tinyint(1) NOT NULL COMMENT 'Показывать заголовок',
  `show_anons` tinyint(1) NOT NULL COMMENT 'Показывать анонс',
  `show_foto` tinyint(1) NOT NULL COMMENT 'Показывать фото',
  `rm_text` varchar(255) NOT NULL COMMENT 'Текст ссылки на новость',
  `show_pages` tinyint(1) NOT NULL COMMENT 'Постраничная навигация в архиве',
  `order_by` int(11) NOT NULL COMMENT 'Сортировать по',
  `sys_name` varchar(255) NOT NULL COMMENT 'Системное имя страницы новостей'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `adm_m_news`
--

INSERT INTO `adm_m_news` (`id`, `kol_widjet`, `kol_arh`, `show_date`, `show_time`, `show_title`, `show_anons`, `show_foto`, `rm_text`, `show_pages`, `order_by`, `sys_name`) VALUES
(1, 4, 6, 1, 0, 0, 0, 0, 'Подробнее', 0, 1, 'statii');

-- --------------------------------------------------------

--
-- Структура таблицы `adm_m_otzyvy`
--

CREATE TABLE `adm_m_otzyvy` (
  `id` int(11) NOT NULL,
  `show_pages` tinyint(1) NOT NULL COMMENT 'Постраничный вывод',
  `per_page` int(11) NOT NULL COMMENT 'Количество отзывов на странице:',
  `sys_name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'Системное имя страницы отзывов'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `adm_m_otzyvy`
--

INSERT INTO `adm_m_otzyvy` (`id`, `show_pages`, `per_page`, `sys_name`) VALUES
(1, 1, 3, 'otzyvy');

-- --------------------------------------------------------

--
-- Структура таблицы `adm_m_sort`
--

CREATE TABLE `adm_m_sort` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `val` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `adm_m_sort`
--

INSERT INTO `adm_m_sort` (`id`, `name`, `val`) VALUES
(1, 'По дате (сперва свежие)', 'date_added DESC'),
(2, 'По дате (сперва старые)', 'date_added'),
(3, 'По алфавиту (от А до Я)', 'art_title'),
(4, 'По алфавиту (от Я до А)', 'art_title DESC');

-- --------------------------------------------------------

--
-- Структура таблицы `adm_site_opt`
--

CREATE TABLE `adm_site_opt` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `val` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `adm_site_opt`
--

INSERT INTO `adm_site_opt` (`id`, `name`, `val`) VALUES
(1, 'fav_path', '/img/fav_icon.ico'),
(2, 'counter', '<!-- Yandex.Metrika counter --> <script type=\"text/javascript\" >    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};    m[i].l=1*new Date();    for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}    k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})    (window, document, \"script\", \"https://mc.yandex.ru/metrika/tag.js\", \"ym\");     ym(96773525, \"init\", {         clickmap:true,         trackLinks:true,         accurateTrackBounce:true,         webvisor:true    }); </script> <noscript><div><img src=\"https://mc.yandex.ru/watch/96773525\" style=\"position:absolute; left:-9999px;\" alt=\"\" /></div></noscript> <!-- /Yandex.Metrika counter -->');

-- --------------------------------------------------------

--
-- Структура таблицы `adm_users`
--

CREATE TABLE `adm_users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `adm_users`
--

INSERT INTO `adm_users` (`id`, `login`, `pass`) VALUES
(1, 'user', 'Azodmin1!');

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование',
  `descr` text NOT NULL COMMENT 'Описание',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `position` int(11) NOT NULL COMMENT 'Позиция баннера',
  `btn_href` varchar(255) NOT NULL COMMENT 'Ссылка',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `name`, `descr`, `img`, `position`, `btn_href`, `on_moderate`, `ordering`) VALUES
(1, 'СВЕЖАЯ ВЫПЕЧКА КАЖДЫЙ ДЕНЬ', 'Порадуйте себя хрустящим хлебом, ароматным печением и нежнейшими тортами', '/public/img/banners/91252.jpg', 1, '', 0, 1),
(3, 'ФЕРМЕРСКИЕ ПРОДУКТЫ БЕЛОГОРЬЯ', 'В ассортименте мясные и молочные продукты и свежая зелень', '/public/img/cards/3.jpg', 2, '', 0, 1),
(4, 'ДОСТАВКА ПРОДУКТОВ ДОМОЙ', 'Наши сотрудники соберут ваш заказ и доставят по указанному Вами адресу', '/public/img/cards/2.jpg', 3, '', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `meta_desc` varchar(250) NOT NULL COMMENT 'Мета-тег описание',
  `meta_key` varchar(250) NOT NULL COMMENT 'Мета-тег ключевые слова',
  `meta_title` varchar(250) NOT NULL COMMENT 'Мета-тег заголовок',
  `page_title` varchar(250) NOT NULL COMMENT 'Заголовок страницы(sys_name)',
  `page_anons` text NOT NULL COMMENT 'Анонс',
  `page_text` longtext NOT NULL COMMENT 'Текст страницы',
  `page_foto` tinytext NOT NULL COMMENT 'Изображение',
  `date_added` date NOT NULL COMMENT 'Дата',
  `sys_name` varchar(250) NOT NULL COMMENT 'Ссылка',
  `on_moderate` tinyint(4) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id`, `meta_desc`, `meta_key`, `meta_title`, `page_title`, `page_anons`, `page_text`, `page_foto`, `date_added`, `sys_name`, `on_moderate`, `ordering`) VALUES
(1, 'В чем причина сминания заборного (всасывающего) фильтра?', 'В чем причина сминания заборного (всасывающего) фильтра?', 'В чем причина сминания заборного (всасывающего) фильтра?', 'В чем причина сминания заборного (всасывающего) фильтра?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit dolores saepe deleniti sequi\r\n                    perspiciatis consequatur, possimus tempora unde provident adipisci dignissimos, voluptate rerum\r\n                    repudiandae. Dolore vel, veritatis, quam voluptatibus adipisci architecto doloribus a provident\r\n                    repellat placeat tempore cupiditate rerum? Rem recusandae tempore esse autem accusantium. Nam earum\r\n                    assumenda praesentium voluptas?', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit dolores saepe deleniti sequi<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; perspiciatis consequatur, possimus tempora unde provident adipisci dignissimos, voluptate rerum<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; repudiandae. Dolore vel, veritatis, quam voluptatibus adipisci architecto doloribus a provident<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; repellat placeat tempore cupiditate rerum? Rem recusandae tempore esse autem accusantium. Nam earum<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; assumenda praesentium voluptas?</p>\r\n', '/public/img/blog/89225.jpg', '0000-00-00', 'v-chem-prichina-sminaniya-zabornogo-vsasyvayuschego-filtra', 0, 1),
(2, 'В чем причина сминания заборного (всасывающего) фильтра?', 'В чем причина сминания заборного (всасывающего) фильтра?', 'В чем причина сминания заборного (всасывающего) фильтра?', 'В чем причина сминания заборного (всасывающего) фильтра?', 'Гидравлическая система в землеройной...', '<p>Гидравлическая система в землеройной...</p>\r\n', '/public/img/blog/987778.jpg', '0000-00-00', 'v-chem-prichina-sminaniya-zabornogo-vsasyvayuschego-filtra1', 0, 2),
(3, 'В чем причина сминания заборного (всасывающего) фильтра?', 'В чем причина сминания заборного (всасывающего) фильтра?', 'В чем причина сминания заборного (всасывающего) фильтра?', 'В чем причина сминания заборного (всасывающего) фильтра?', 'Гидравлическая система в землеройной...', '<p>Гидравлическая система в землеройной...</p>\r\n', '/public/img/blog/185823.jpg', '0000-00-00', 'v-chem-prichina-sminaniya-zabornogo-vsasyvayuschego-filtra2', 0, 3),
(4, 'В чем причина сминания заборного (всасывающего) фильтра?', 'В чем причина сминания заборного (всасывающего) фильтра?', 'В чем причина сминания заборного (всасывающего) фильтра?', 'В чем причина сминания заборного (всасывающего) фильтра?', 'Гидравлическая система в землеройной...', '<p>Гидравлическая система в землеройной...</p>\r\n', '/public/img/blog/498225.jpg', '0000-00-00', 'v-chem-prichina-sminaniya-zabornogo-vsasyvayuschego-filtra3', 0, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `callback`
--

CREATE TABLE `callback` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'Email для отправки сообщений',
  `from` varchar(255) NOT NULL COMMENT 'Email отправителя'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `callback`
--

INSERT INTO `callback` (`id`, `email`, `from`) VALUES
(1, 'working046@gmail.com', 'working046@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование(sys_name)',
  `razdel_id` int(11) NOT NULL COMMENT 'Раздел',
  `cat_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Категория',
  `brand_id` int(11) NOT NULL COMMENT 'Бренд',
  `podcat_id` int(11) NOT NULL COMMENT 'Подкатегория',
  `type_id` int(11) NOT NULL COMMENT 'Способ обработки',
  `country_id` int(11) NOT NULL COMMENT 'Страна',
  `marka_id` int(11) NOT NULL COMMENT 'Марка техники',
  `art` varchar(50) NOT NULL COMMENT 'Артикул',
  `img` tinytext NOT NULL COMMENT 'Фото',
  `tags` text NOT NULL COMMENT 'Введите теги через пробел',
  `price` int(11) NOT NULL COMMENT 'Цена',
  `price2` int(11) NOT NULL COMMENT 'Старая цена',
  `nal_id` int(11) NOT NULL COMMENT 'Наличие',
  `sovmest` varchar(255) NOT NULL COMMENT 'Совместимость',
  `rate` int(11) NOT NULL COMMENT 'Рейтинг',
  `sell` tinyint(1) NOT NULL COMMENT 'Распродажа',
  `new` tinyint(1) NOT NULL COMMENT 'Новинка',
  `pop` tinyint(1) NOT NULL COMMENT 'Рекомендуемое',
  `opisanie` longtext NOT NULL COMMENT 'Описание',
  `haracters` longtext NOT NULL COMMENT 'Характеристики',
  `kak_kupit` longtext NOT NULL COMMENT 'Как купить',
  `opl` longtext NOT NULL COMMENT 'Оплата',
  `dost` longtext NOT NULL COMMENT 'Доставка',
  `nal` longtext NOT NULL COMMENT 'Наличие',
  `otz` longtext NOT NULL COMMENT 'Отзывы',
  `ves` varchar(30) NOT NULL COMMENT 'Вес',
  `discount` varchar(30) NOT NULL COMMENT 'Дискаунт',
  `date_added` date NOT NULL COMMENT 'Дата добавления',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'На модерации',
  `sys_name` varchar(255) NOT NULL COMMENT 'Системное имя',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `razdel_id`, `cat_id`, `brand_id`, `podcat_id`, `type_id`, `country_id`, `marka_id`, `art`, `img`, `tags`, `price`, `price2`, `nal_id`, `sovmest`, `rate`, `sell`, `new`, `pop`, `opisanie`, `haracters`, `kak_kupit`, `opl`, `dost`, `nal`, `otz`, `ves`, `discount`, `date_added`, `on_moderate`, `sys_name`, `ordering`) VALUES
(1, 'Говядина свежая 1 сорт Говядина свежая', 13, 1, 1, 1, 1, 1, 1, 'ST40018AB', '/public/img/items/3.png', '', 4400, 6500, 1, '', 0, 1, 1, 1, '<p>Форель слабосоленая WISH FISH филе-кусок станет удачным вариантом для повседневного обеда, ужина и сервировки праздничного стола. Ее можно подавать в виде нарезки, использовать для приготовления салатов и холодных закусок. Слабосоленая форель отличается нежной текстурой и отменными дегустационными качествами. Она быстро утоляет голод, заряжает энергией и является источником ценных омега-кислот, витаминов и минеральных элементов.</p>\r\n', '<p>Раздел &quot;Характеристики&quot; разработке..</p>\r\n', '', '', '', '', '', '500', '13%', '2024-03-19', 0, 'govyadina-svezhaya-1-sort-govyadina-svezhaya', 0),
(2, 'Свинина свежая 2 сорт Свинина свежая', 13, 2, 2, 2, 2, 2, 1, 'AA90145', '/public/img/items/1.jpg', '', 3320, 4950, 3, '', 0, 1, 1, 1, 'Форель слабосоленая WISH FISH филе-кусок станет удачным вариантом для повседневного обеда, ужина и сервировки праздничного стола. Ее можно подавать в виде нарезки, использовать для приготовления салатов и холодных закусок. Слабосоленая форель отличается нежной текстурой и отменными дегустационными качествами. Она быстро утоляет голод, заряжает энергией и является источником ценных омега-кислот, витаминов и минеральных элементов.', '', '', '', '', '', '', '900', 'Новинка', '2024-03-19', 0, 'svinina-svezhaya-2-sort-svinina-svezhaya', 0),
(3, 'Свинина свежая 3 сорт Свинина черкизово', 13, 3, 3, 3, 1, 4, 1, 'HLX-7817AB', '/public/img/items/3.png', '', 5615, 6200, 2, '', 0, 1, 1, 1, 'Форель слабосоленая WISH FISH филе-кусок станет удачным вариантом для повседневного обеда, ужина и сервировки праздничного стола. Ее можно подавать в виде нарезки, использовать для приготовления салатов и холодных закусок. Слабосоленая форель отличается нежной текстурой и отменными дегустационными качествами. Она быстро утоляет голод, заряжает энергией и является источником ценных омега-кислот, витаминов и минеральных элементов.', '', '', '', '', '', '', '1.536', '39%', '2024-03-19', 0, 'svinina-svezhaya-3-sort-svinina-cherkizovo', 0),
(4, 'Свинина свежая вкусная Свинина черкизово Свинина черкизово', 13, 4, 3, 4, 2, 3, 1, 'HLX-7822AB', '/public/img/items/3.png', '', 9325, 11200, 1, '', 0, 1, 1, 1, 'Форель слабосоленая WISH FISH филе-кусок станет удачным вариантом для повседневного обеда, ужина и сервировки праздничного стола. Ее можно подавать в виде нарезки, использовать для приготовления салатов и холодных закусок. Слабосоленая форель отличается нежной текстурой и отменными дегустационными качествами. Она быстро утоляет голод, заряжает энергией и является источником ценных омега-кислот, витаминов и минеральных элементов.', '', '', '', '', '', '', '2.500', '59%', '2024-03-19', 0, 'svinina-svezhaya-vkusnaya-svinina-cherkizovo-svinina-cherkizovo', 0),
(5, 'Свинина черкизово Свинина черкизово', 13, 1, 1, 1, 1, 2, 1, 'ST40020AB', '/public/img/items/1.jpg', '', 3795, 4400, 2, '', 0, 1, 1, 1, 'Форель слабосоленая WISH FISH филе-кусок станет удачным вариантом для повседневного обеда, ужина и сервировки праздничного стола. Ее можно подавать в виде нарезки, использовать для приготовления салатов и холодных закусок. Слабосоленая форель отличается нежной текстурой и отменными дегустационными качествами. Она быстро утоляет голод, заряжает энергией и является источником ценных омега-кислот, витаминов и минеральных элементов.', '', '', '', '', '', '', '', '11%', '2024-03-19', 0, 'svinina-cherkizovo-svinina-cherkizovo', 0),
(160, 'Бананы', 1, 1, 1, 21, 1, 1, 1, 'ST40020AB', '/public/img/items/1.jpg', '', 3795, 4400, 3, '', 0, 1, 1, 1, 'Форель слабосоленая WISH FISH филе-кусок станет удачным вариантом для повседневного обеда, ужина и сервировки праздничного стола. Ее можно подавать в виде нарезки, использовать для приготовления салатов и холодных закусок. Слабосоленая форель отличается нежной текстурой и отменными дегустационными качествами. Она быстро утоляет голод, заряжает энергией и является источником ценных омега-кислот, витаминов и минеральных элементов.', '', '', '', '', '', '', '', '12%', '2024-03-19', 0, 'banany', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_brands`
--

CREATE TABLE `catalog_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование(sys_name)',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog_brands`
--

INSERT INTO `catalog_brands` (`id`, `name`, `img`, `on_moderate`, `ordering`) VALUES
(1, '365 ДНЕЙ', '', 0, 0),
(2, '5 ОКЕАНОВ', '', 0, 0),
(3, 'AGAMA', '', 0, 0),
(4, 'AQUA PRODUCT', '', 0, 0),
(5, 'BONVIDA', '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_cats`
--

CREATE TABLE `catalog_cats` (
  `id` int(11) NOT NULL,
  `razdel_id` int(11) NOT NULL COMMENT 'Раздел',
  `name` varchar(255) NOT NULL COMMENT 'Наименование(sys_name)',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `sys_name` varchar(255) NOT NULL COMMENT 'Системное имя',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog_cats`
--

INSERT INTO `catalog_cats` (`id`, `razdel_id`, `name`, `img`, `sys_name`, `on_moderate`, `ordering`) VALUES
(1, 13, 'Охлажденная и переработанная рыбная продукция', '/public/img/catalog/891569.png', 'ohlazhdennaya-i-pererabotannaya-rybnaya-produkciya', 0, 1),
(2, 13, 'Замороженная рыба и морепродукты', '/public/img/catalog/852903.png', 'zamorozhennaya-ryba-i-moreprodukty', 0, 2),
(3, 13, 'Готовая рыбная продукция', '/public/img/catalog/630173.png', 'gotovaya-rybnaya-produkciya', 0, 3),
(4, 13, 'Деликатесы из рыбы и морепродуктов', '/public/img/catalog/813235.png', 'delikatesy-iz-ryby-i-moreproduktov', 0, 4),
(5, 1, 'Свежие', '', 'svezhie', 0, 5),
(6, 1, 'Сушеные', '', 'sushenye', 0, 6),
(7, 1, 'Вяленные', '', 'vyalennye', 0, 7),
(8, 1, 'Консервы', '', 'konservy', 0, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_country`
--

CREATE TABLE `catalog_country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование(sys_name)',
  `sys_name` varchar(50) NOT NULL COMMENT 'Системное имя',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog_country`
--

INSERT INTO `catalog_country` (`id`, `name`, `sys_name`, `on_moderate`, `ordering`) VALUES
(1, 'Китай', 'kitay', 0, 0),
(2, 'США', 'ssha', 0, 0),
(3, 'Турция', 'turciya', 0, 0),
(4, 'Германия', 'germaniya', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_marka`
--

CREATE TABLE `catalog_marka` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование(sys_name)',
  `sys_name` varchar(50) NOT NULL COMMENT 'Системное имя',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog_marka`
--

INSERT INTO `catalog_marka` (`id`, `name`, `sys_name`, `on_moderate`, `ordering`) VALUES
(1, 'KIA', 'kia', 0, 1),
(2, 'JCB', 'jcb', 0, 2),
(3, 'Huyndai', 'huyndai', 0, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_nal`
--

CREATE TABLE `catalog_nal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование(sys_name)',
  `class` varchar(50) NOT NULL COMMENT 'Класс',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog_nal`
--

INSERT INTO `catalog_nal` (`id`, `name`, `class`, `ordering`) VALUES
(1, 'Мало', 'less', 1),
(2, 'Много', 'much', 2),
(3, 'Под заказ', 'none', 3),
(4, 'Нет в наличии', 'none', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_podcats`
--

CREATE TABLE `catalog_podcats` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL COMMENT 'Категория',
  `fname` varchar(255) NOT NULL COMMENT 'Полное имя',
  `name` varchar(255) NOT NULL COMMENT 'Наименование(sys_name)',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `sys_name` varchar(255) NOT NULL COMMENT 'Системное имя',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog_podcats`
--

INSERT INTO `catalog_podcats` (`id`, `cat_id`, `fname`, `name`, `img`, `sys_name`, `on_moderate`, `ordering`) VALUES
(1, 1, 'Охлажденная и переработанная рыбная продукция/Белая рыба', 'Белая рыба', '', 'belaya-ryba', 0, 0),
(2, 1, 'Охлажденная и переработанная рыбная продукция/Лососевая рыба', 'Лососевая рыба', '', 'lososevaya-ryba', 0, 0),
(3, 4, 'Деликатесы из рыбы и морепродуктов/Деликатесы из рыбы товар', 'Деликатесы из рыбы товар', '', 'delikatesy-iz-ryby-tovar', 0, 0),
(4, 1, 'Охлажденная и переработанная рыбная продукция/Экзотическая рыба', 'Экзотическая рыба', '', 'ekzoticheskaya-ryba', 0, 0),
(15, 2, 'Замороженная рыба и морепродукты/Лососевая рыба', 'Лососевая рыба', '', 'lososevaya-ryba1', 0, 1),
(16, 2, 'Замороженная рыба и морепродукты/Белая рыба', 'Белая рыба', '', 'belaya-ryba1', 0, 2),
(17, 2, 'Замороженная рыба и морепродукты/Креветки и ракообразные', 'Креветки и ракообразные', '', 'krevetki-i-rakoobraznye', 0, 3),
(9, 3, 'Готовая рыбная продукция/Готовая рыбная продукция товар', 'Готовая рыбная продукция товар', '', 'gotovaya-rybnaya-produkciya-tovar', 0, 0),
(21, 5, 'Бананы', 'Бананы свежие', '', 'banany-svezhie', 0, 7),
(22, 6, 'Грибы', 'Грибы сушеные', '', 'griby-sushenye', 0, 8),
(18, 2, 'Замороженная рыба и морепродукты/Морепродукты', 'Морепродукты', '', 'moreprodukty', 0, 4),
(19, 2, 'Замороженная рыба и морепродукты/Полуфабрикаты из рыбы и морепродуктов', 'Полуфабрикаты из рыбы и морепродуктов', '', 'polufabrikaty-iz-ryby-i-moreproduktov', 0, 5),
(20, 2, 'Замороженная рыба и морепродукты/Продукты из сурими', 'Продукты из сурими', '', 'produkty-iz-surimi', 0, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_razdel`
--

CREATE TABLE `catalog_razdel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование(sys_name)',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `sys_name` varchar(255) NOT NULL COMMENT 'Системное имя',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog_razdel`
--

INSERT INTO `catalog_razdel` (`id`, `name`, `img`, `sys_name`, `on_moderate`, `ordering`) VALUES
(1, 'Овощи, фрукты', '/public/img/products/1.jpg', 'ovoschi-frukty', 0, 1),
(2, 'Крепкий алкоголь, пиво', '/public/img/products/2.jpg', 'krepkiy-alkogol-pivo', 0, 2),
(3, 'Бакалея', '/public/img/catalog/653381.jpg', 'bakaleya', 0, 3),
(4, 'Колбасы, сосиски, нарезки', '/public/img/catalog/683839.jpg', 'kolbasy-sosiski-narezki', 0, 4),
(5, 'Хлеб и выпечка', '/public/img/catalog/198163.jpg', 'hleb-i-vypechka', 0, 5),
(6, 'Мясо и птица', '/public/img/catalog/204612.jpg', 'myaso-i-ptica', 0, 6),
(7, 'Консервы, соленья', '/public/img/catalog/271337.jpg', 'konservy-solenya', 0, 7),
(8, 'Соусы, приправы, специи', '/public/img/catalog/358581.jpg', 'sousy-pripravy-specii', 0, 8),
(9, 'Вода, соки, напитики', '/public/img/catalog/667.jpg', 'voda-soki-napitiki', 0, 9),
(10, 'Молоко, яйца', '/public/img/catalog/21235.jpg', 'moloko-yayca', 0, 10),
(11, 'Сладости', '/public/img/catalog/457218.jpg', 'sladosti', 0, 11),
(12, 'Сыры', '/public/img/catalog/954961.jpg', 'syry', 0, 12),
(13, 'Рыба и морепродукты', '/public/img/catalog/255725.jpg', 'ryba-i-moreprodukty', 0, 13),
(14, 'Чипсы, снеки', '/public/img/catalog/351478.jpg', 'chipsy-sneki', 0, 14),
(15, 'Чай, кофе', '/public/img/catalog/63648.jpg', 'chay-kofe', 0, 15),
(16, 'Бытовая химия', '/public/img/catalog/101735.jpg', 'bytovaya-himiya', 0, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_type`
--

CREATE TABLE `catalog_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование(sys_name)',
  `sys_name` varchar(50) NOT NULL COMMENT 'Системное имя',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog_type`
--

INSERT INTO `catalog_type` (`id`, `name`, `sys_name`, `on_moderate`, `ordering`) VALUES
(1, 'Механический', 'mehanicheskiy', 0, 0),
(2, 'Ручной', 'ruchnoy', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `contacts_settings`
--

CREATE TABLE `contacts_settings` (
  `id` int(11) NOT NULL,
  `phone1` varchar(255) NOT NULL COMMENT 'Телефон 1',
  `phone2` varchar(255) NOT NULL COMMENT 'Телефон 2',
  `address` varchar(255) NOT NULL COMMENT 'Адрес',
  `address2` varchar(255) NOT NULL COMMENT 'Адрес2',
  `rezhim` text NOT NULL COMMENT 'Режим работы',
  `vk_href` varchar(255) NOT NULL COMMENT 'Ссылка на группу VK',
  `email` varchar(255) NOT NULL COMMENT 'Email',
  `mapcode` text NOT NULL COMMENT 'Код карты',
  `mapcode2` text NOT NULL,
  `map` varchar(255) NOT NULL COMMENT 'Ссылка на карту'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts_settings`
--

INSERT INTO `contacts_settings` (`id`, `phone1`, `phone2`, `address`, `address2`, `rezhim`, `vk_href`, `email`, `mapcode`, `mapcode2`, `map`) VALUES
(1, '8 800 101 24 46', '8 (910) 326-19-56', 'г. Курск, ул. Карла Маркса 71 г. ', 'Россия, Белгородская обл., Белгородский район, 308501, коттеджный посёлок Лесной, село Шагаровка', '<b>пн-пт</b> 10-22', 'vk.ru', 'leone_bel@mail.ru', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aab36d2d67bfff185a3def640488a8044cb2c765cdddcf555403921eaa1c5bead&width=100%&height=400&lang=ru_RU&scroll=true\"></script>', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL COMMENT 'Вопрос',
  `answer` text NOT NULL COMMENT 'Ответ',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `on_moderate`, `ordering`) VALUES
(1, 'Могу ли я получить заказ частично?', 'На данный момент у нас нет услуги частичного отказа от заказа при курьере. Но мы быстро и качественно решим любой вопрос. Просто позвоните в контактный центр.', 0, 1),
(2, 'Как можно узнать статус заказа?', 'На данный момент у нас нет услуги частичного отказа от заказа при курьере. Но мы быстро и качественно решим любой вопрос. Просто позвоните в контактный центр.\r\n', 0, 4),
(3, 'Есть ли ограничения по весу заказа?', 'На данный момент у нас нет услуги частичного отказа от заказа при курьере. Но мы быстро и качественно решим любой вопрос. Просто позвоните в контактный центр.\r\n', 0, 2),
(4, 'Можно мне перенести дату доставки?', 'На данный момент у нас нет услуги частичного отказа от заказа при курьере. Но мы быстро и качественно решим любой вопрос. Просто позвоните в контактный центр.\r\n', 0, 5),
(5, 'За какое время курьер предупреждает о доставке?', 'На данный момент у нас нет услуги частичного отказа от заказа при курьере. Но мы быстро и качественно решим любой вопрос. Просто позвоните в контактный центр.\r\n', 0, 3),
(6, 'Если я не смог ответить на звонок курьера, будет ли он перезванивать?', 'На данный момент у нас нет услуги частичного отказа от заказа при курьере. Но мы быстро и качественно решим любой вопрос. Просто позвоните в контактный центр.\r\n', 0, 6),
(7, 'До какого этажа осуществляется доставка продуктов питания на дом, если не работает лифт или его нет?', 'На данный момент у нас нет услуги частичного отказа от заказа при курьере. Но мы быстро и качественно решим любой вопрос. Просто позвоните в контактный центр.\r\n', 0, 7),
(8, 'Можно мне перенести дату доставки?', 'На данный момент у нас нет услуги частичного отказа от заказа при курьере. Но мы быстро и качественно решим любой вопрос. Просто позвоните в контактный центр.\r\n', 0, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `features`
--

INSERT INTO `features` (`id`, `name`, `img`, `on_moderate`, `ordering`) VALUES
(1, 'Сертифицированная продукция', '/public/img/features/237904.svg', 0, 1),
(2, 'Бесплатная доставка в любую точку России', '/public/img/features/334184.svg', 0, 2),
(3, 'Предлагаем низкие цены', '/public/img/features/716759.svg', 0, 3),
(4, 'Отгружаем в день заказа', '/public/img/features/742122.svg', 0, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование',
  `url` varchar(255) NOT NULL COMMENT 'Ссылка',
  `class` varchar(250) NOT NULL COMMENT 'Класс',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `position` int(11) NOT NULL COMMENT 'Расположение',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `url`, `class`, `on_moderate`, `position`, `ordering`) VALUES
(1, 'О компании', '/about', '', 0, 5, 1),
(2, 'Доставка и оплата', '/delivery', '', 0, 5, 2),
(5, 'Рецепты', '/recipe', '', 0, 5, 4),
(6, 'Помощь при покупке', '/help', '', 0, 5, 3),
(19, 'Контакты', '/kontakty', '', 0, 5, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_pos`
--

CREATE TABLE `menu_pos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование',
  `class` varchar(255) NOT NULL COMMENT 'class',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_pos`
--

INSERT INTO `menu_pos` (`id`, `name`, `class`, `ordering`) VALUES
(5, 'Основное меню', 'main', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `meta_desc` varchar(250) NOT NULL COMMENT 'Мета-тег описание',
  `meta_key` varchar(250) NOT NULL COMMENT 'Мета-тег ключевые слова',
  `meta_title` varchar(250) NOT NULL COMMENT 'Мета-тег заголовок',
  `page_title` varchar(250) NOT NULL COMMENT 'Заголовок новости(sys_name)',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `page_text` longtext NOT NULL COMMENT 'Текст новости',
  `news_anons` text NOT NULL COMMENT 'Анонс',
  `date_added` date NOT NULL COMMENT 'Дата добавления',
  `on_main` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'На главной?',
  `sys_name` varchar(250) NOT NULL COMMENT 'Ссылка',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `otzyvy`
--

CREATE TABLE `otzyvy` (
  `id` int(11) NOT NULL,
  `otz_title` varchar(255) NOT NULL COMMENT 'Заголовок',
  `otz_scan` tinytext NOT NULL COMMENT 'Скан отзыва',
  `otz_video` text NOT NULL COMMENT 'Код видео',
  `otz_text` longtext NOT NULL COMMENT 'Текст отзыва',
  `otz_podpis` varchar(255) NOT NULL COMMENT 'Подпись',
  `otz_slider` set('1','','','') NOT NULL COMMENT 'Фотографии',
  `on_main` tinyint(1) NOT NULL COMMENT 'На главной?',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `otzyvy_slider`
--

CREATE TABLE `otzyvy_slider` (
  `id` int(11) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `meta_desc` varchar(250) NOT NULL COMMENT 'Мета-тег описание',
  `meta_key` varchar(250) NOT NULL COMMENT 'Мета-тег ключевые слова',
  `meta_title` varchar(250) NOT NULL COMMENT 'Мета-тег заголовок',
  `page_title` varchar(250) NOT NULL COMMENT 'Заголовок страницы(sys_name)',
  `page_text` longtext NOT NULL COMMENT 'Текст страницы',
  `page_foto` tinytext NOT NULL COMMENT 'Изображение',
  `sys_name` varchar(250) NOT NULL COMMENT 'Ссылка',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `meta_desc`, `meta_key`, `meta_title`, `page_title`, `page_text`, `page_foto`, `sys_name`, `ordering`) VALUES
(4, 'Леон', 'Леон', 'Леон', 'Леон', '<p>Компания ориентирована на постоянное развитие, расширение партнерской сети и увеличение ассортимента товаров. Агрозапчать 46 открыт не только для покупателей, но и для поставщиков, что делает его не просто интернет-магазином, а маркетплейсом.<br />\r\n<br />\r\n<br />\r\nСхема сотрудничества открыта. Здесь не только закупают запчасти на спецтехнику, узлы и комплектующие, но еще и размещают товары на сайте. Используйте эту возможность, чтобы увеличить продажи с минимальными вложениями. И свяжитесь с сотрудниками Агрозапчать 46, если возникли вопросы.</p>\r\n\r\n<h4>Ассортимент товаров</h4>\r\n\r\n<p>В каталоге вы найдете необходимую вам запчасть для двигателей, трансмиссии, электрооборудование, детали для тормозной, гидравлической и топливной системы, элементы кузова, навесное оборудование, расходники и не только.<br />\r\n<br />\r\n<br />\r\nВ Агрозапчать 46 представлены импортные и отечественные бренды &mdash; JCB, Terex, Hitachi, CAT, MST и многие другие. Купить можно детали и комплектующие для строительной техники.</p>\r\n', '', 'index', 2),
(26, 'Error 404', 'Error 404', 'Ошибка 404', 'Ошибка 404', '<p style=\"text-align: center;\"><span style=\"font-size:16px\">Страница не найдена. Вы можете перейти на&nbsp;<a href=\"/\">главную страницу</a>.</span></p>\r\n', '', '404', 1),
(80, 'Поиск', 'Поиск', 'Поиск', 'Поиск', '', '', 'poisk', 21),
(82, 'Избранное', 'Избранное', 'Избранное', 'Избранное', '', '', 'favorites', 23),
(83, 'Корзина', 'Корзина', 'Корзина', 'Корзина', '', '', 'busket', 24),
(84, 'Политика конфиденциальности', 'Политика конфиденциальности', 'Политика конфиденциальности', 'Политика конфиденциальности', '<h1>Политика в отношении обработки персональных данных ООО &laquo;Агроз46&raquo;.</h1>\r\n\r\n<h1 style=\"text-align:center\"><span style=\"font-family:georgia,serif\"><span style=\"font-size:16px\">1. Введение</span></span></h1>\r\n\r\n<p style=\"text-align:justify\">1.1. Важнейшим условием реализации целей деятельности ООО &laquo;Агроз46&raquo;&nbsp; является обеспечение необходимого и достаточного уровня информационной безопасности информации, к которой, в том числе, относятся персональные данные.</p>\r\n\r\n<p style=\"text-align:justify\">1.2. Политика в отношении обработки персональных данных&nbsp; определяет порядок сбора, хранения, передачи и иных видов обработки персональных данных, а также сведения о реализуемых требованиях к защите персональных данных.</p>\r\n\r\n<p style=\"text-align:justify\">1.3. Политика разработана в соответствии с действующим законодательством РФ.</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:rgb(222, 164, 44); font-size:16px\"><span style=\"font-family:georgia,serif\">2. Состав персональных данных и перечень действий с данными</span></span></h2>\r\n\r\n<p style=\"text-align:justify\">2.1. Сведениями, составляющими персональные данные, является любая информация, относящаяся к прямо или косвенно определенному или определяемому физическому лицу (субъекту персональных данных). Детальный перечень персональных данных фиксируется в локальной нормативной документации.</p>\r\n\r\n<p style=\"text-align:justify\">2.2. Все обрабатываемые&nbsp; персональные данные являются конфиденциальной, строго охраняемой информацией в соответствии с законодательством.</p>\r\n\r\n<p style=\"text-align:justify\">2.3. Перечень действий с персональными данными, общее описание используемых оператором способов обработки персональных данных: Сбор, анализ, обобщение, хранение, изменение, дополнение, передача, уничтожение персональных данных. Автоматизированная / Неавтоматизированная / Смешанная обработка персональных данных.</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:rgb(222, 164, 44); font-family:georgia,serif\"><span style=\"font-size:16px\">3. Цели обработки персональных данных</span></span></h2>\r\n\r\n<p style=\"text-align:justify\">3.1. Персональные данные обрабатываются в целях оформления трудовых и иных договорных отношений, кадрового, бухгалтерского, налогового учета, по снованиям, предусмотренным ст.22 Федерального закона от 27.06.2006 №152-ФЗ, 85-90 Трудового кодекса РФ, а также в целях организации и проведения, (в т.ч. с привлечением третьих лиц) программ лояльности, маркетинговых и/или рекламных акций, исследований, опросов и иных мероприятий; исполнения обязательств в рамках договора, оказания любых иных услуг субъектам персональных данных; продвижения услуг и/или товаров на рынке путем осуществления прямых контактов с клиентами&nbsp; с помощью различных средств связи, в т.ч., не ограничиваясь, по телефону, электронной почте, почтовой рассылке, в сети Интернет и т.д.; в иных целях, не противоречащих действующему законодательству.</p>\r\n\r\n<p style=\"text-align:justify\">3.2. ООО &laquo;Агроз46&raquo; в целях надлежащего исполнения своих обязанностей обрабатывает следующие персональные данные, необходимые для надлежащего исполнения договорных обязательств:</p>\r\n\r\n<p style=\"text-align:justify\">&bull; персональные данные работников;</p>\r\n\r\n<p style=\"text-align:justify\">&bull; персональные данные иных физических лиц, в том числе, но, не ограничиваясь, состоящих в договорных, гражданско-правовых отношениях и других отношениях с ООО &laquo;Агроз46&raquo;.</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:rgb(222, 164, 44); font-family:georgia,serif\"><span style=\"font-size:16px\">4. Порядок сбора, хранения, передачи и иных видов обработки персональных данных</span></span></h2>\r\n\r\n<p style=\"text-align:justify\">4.1. Обработка персональных данных, осуществляемая без использования средств автоматизации, осуществляется таким образом, чтобы в отношении каждой категории персональных данных можно было определить места хранения персональных данных (материальных носителей). ООО &laquo;Агроз46&raquo; установлен перечень лиц, осуществляющих обработку персональных данных либо имеющих к ним доступ. Обеспечивается раздельное хранение персональных данных (материальных носителей), обработка которых осуществляется в различных целях.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;ООО &laquo;Агроз46&raquo;&nbsp;обеспечивает сохранность персональных данных и принимает меры, исключающие&nbsp; несанкционированный доступ к персональным данным.</p>\r\n\r\n<p style=\"text-align:justify\">4.2. Обработка персональных данных, осуществляемая с использованием средств автоматизации, проводится при условии выполнения следующих действий:</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;-ООО &laquo;Агроз46&raquo; проводит технические мероприятия, направленные на предотвращение несанкционированного доступа к персональным данным и (или) передачи их лицам, не имеющим права доступа к такой информации;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;-Защитные инструменты настроены на своевременное обнаружение фактов несанкционированного доступа к персональным данным; технические средства автоматизированной обработки персональных данных изолированы в целях недопущения воздействия на них, в результате которого может быть нарушено их функционирование;</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;-ООО &laquo;Агроз46&raquo; производит резервное копирование данных, с тем, чтобы иметь возможность незамедлительного восстановления персональных данных, модифицированных или уничтоженных вследствие несанкционированного доступа к ним; осуществляет постоянный контроль за обеспечением уровня защищенности персональных данных.</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:rgb(222, 164, 44); font-family:georgia,serif\"><span style=\"font-size:16px\">5. Сведения о реализуемых требованиях к защите персональных данных.</span></span></h2>\r\n\r\n<p style=\"text-align:justify\">5.1. ООО &laquo;Агроз46&raquo; проводит следующие мероприятия: -определяет угрозы безопасности персональных данных при их обработке, формирует на их основе модели угроз; осуществляет разработку на основе модели угроз системы защиты персональных данных, обеспечивающей нейтрализацию предполагаемых угроз с использованием методов и способов защиты персональных данных, предусмотренных для соответствующего класса информационных систем; формирует план проведения проверок готовности новых средств защиты информации к использованию с составлением заключений о возможности их эксплуатации;</p>\r\n\r\n<p style=\"text-align:justify\">-осуществляет установку и ввод в эксплуатацию средств защиты информации в соответствии с эксплуатационной и технической документацией; проводит обучение лиц, использующих средства защиты информации, применяемые в информационных системах, правилам работы с ними; осуществляет учет применяемых средств защиты информации, эксплуатационной и технической документации к ним, носителей персональных данных;</p>\r\n\r\n<p style=\"text-align:justify\">-осуществляет учет лиц, допущенных к работе с персональными данными в информационной системе; осуществляет контроль за соблюдением условий использования средств защиты информации, предусмотренных эксплуатационной и технической документацией;</p>\r\n\r\n<p style=\"text-align:justify\">-вправе инициировать разбирательство и составление заключений по фактам несоблюдения условий хранения носителей персональных данных, использования средств защиты информации, которые могут привести к нарушению конфиденциальности персональных данных или другим нарушениям, приводящим к снижению уровня защищенности персональных данных, разработку и принятие мер по предотвращению возможных опасных последствий подобных нарушений;</p>\r\n\r\n<p style=\"text-align:justify\">-имеет описания системы защиты персональных данных.</p>\r\n\r\n<p style=\"text-align:justify\">5.2. Для разработки и осуществления конкретных мероприятий по обеспечению безопасности персональных данных при их обработке в информационной системе ООО &laquo;Агроз46&raquo; назначается ответственное лицо.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;Запросы пользователей информационной системы на получение персональных данных, а также факты предоставления персональных данных по этим запросам регистрируются автоматизированными средствами информационной системы в электронном журнале обращений.</p>\r\n\r\n<p style=\"text-align:justify\">Содержание электронного журнала обращений периодически проверяется соответствующими должностными лицами&nbsp; ООО &laquo;Агроз46&raquo; или уполномоченного лица.</p>\r\n\r\n<p style=\"text-align:justify\">При обнаружении нарушений порядка предоставления персональных данных ООО &laquo;Агроз46&raquo; незамедлительно приостанавливают предоставление персональных данных пользователям информационной системы до выявления причин нарушений и устранения этих причин.</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:rgb(222, 164, 44); font-family:georgia,serif\"><span style=\"font-size:16px\">6. Права и обязанности.</span></span></h2>\r\n\r\n<p style=\"text-align:justify\">6.1. ООО &laquo;Агроз46&raquo; как оператор персональных данных вправе:</p>\r\n\r\n<p style=\"text-align:justify\">&bull; отстаивать свои интересы в суде;</p>\r\n\r\n<p style=\"text-align:justify\">&bull; предоставлять персональные данные субъектов третьим лицам, если это предусмотрено действующим законодательством (налоговые, правоохранительные органы и др.);</p>\r\n\r\n<p style=\"text-align:justify\">&bull; отказывать в предоставлении персональных данных в случаях предусмотренных законодательством;</p>\r\n\r\n<p style=\"text-align:justify\">&bull; использовать персональные данные субъекта без его согласия, в случаях предусмотренных законодательством.</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:rgb(222, 164, 44); font-family:georgia,serif\"><span style=\"font-size:16px\">7. Права и обязанности субъекта персональных данных</span></span></h2>\r\n\r\n<p style=\"text-align:justify\">7.1. Субъект персональных данных имеет право:</p>\r\n\r\n<p style=\"text-align:justify\">&bull; требовать уточнения своих персональных данных, их блокирования или уничтожения в случае, если персональные данные являются неполными, устаревшими, недостоверными, незаконно полученными или не являются необходимыми для заявленной цели обработки, а также принимать предусмотренные законом меры по защите своих прав;</p>\r\n\r\n<p style=\"text-align:justify\">&bull; требовать перечень своих персональных данных, обрабатываемых ООО &laquo;Агроз46&raquo; и источник их получения;</p>\r\n\r\n<p style=\"text-align:justify\">&bull; получать информацию о сроках обработки своих персональных данных, в том числе о сроках их хранения;</p>\r\n\r\n<p style=\"text-align:justify\">&bull; требовать извещения всех лиц, которым ранее были сообщены неверные или неполные его персональные данные, обо всех произведенных в них исключениях, исправлениях или дополнениях;</p>\r\n\r\n<p style=\"text-align:justify\">&bull; обжаловать в уполномоченный орган по защите прав субъектов персональных данных или в судебном порядке неправомерные действия или бездействия при обработке его персональных данных;</p>\r\n\r\n<p style=\"text-align:justify\">&bull; на защиту своих прав и законных интересов, в том числе на возмещение убытков и (или) компенсацию морального вреда в судебном порядке.</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:rgb(222, 164, 44); font-family:georgia,serif\"><span style=\"font-size:16px\">8. Файлы cookie</span></span></h2>\r\n\r\n<p style=\"text-align:justify\">8.1. Файлы cookie представляют собой небольшие текстовые файлы, которые сохраняются на вашем компьютере или мобильном устройстве при посещении сайтов ООО &laquo;Агроз46&raquo;. Для целей данного раздела, термин &quot;cookie&quot; используется в качестве обобщающего термина для понятий &quot;cookie&quot;, &quot;flash cookie&quot; и &quot;веб-маяки&quot;. Эти файлы не занимают много места и автоматически удаляются по истечении срока их действия. Некоторые cookie используются до конца сеанса соединения с Интернетом, другие сохраняются в течение ограниченного периода времени.</p>\r\n\r\n<p style=\"text-align:justify\">8.2. Существуют различные виды cookie и способы их использования. Некоторые из них позволяют просматривать исключительно содержимое веб-сайтов и видеть некоторые их особенности. Отдельные файлы предоставляют ООО &laquo;Агроз46&raquo;&nbsp; возможность получить информацию о характере просмотров, т.е. о проблемах с поиском, помогая нам улучшить механизмы поиска и сделать будущие посещения сайта более эффективными. ООО &laquo;Агроз46&raquo;&nbsp; использует cookie по нескольким причинам. Наиболее важные файлы cookie &ndash; необходимые cookie. Они имеют существенное значение и помогают ориентироваться на сайте и использовать его основные функции, такие как медиа-плагины. При наличии функциональных cookie можно сохранять покупки в корзине, создавать пожелания и сохранять данные о доставке для быстрого оформления заказа. Cookie для оценки производительности и аналитики используются для улучшения работы сайтаООО &laquo;Агроз46&raquo; . Они также применяются для отображения соответствующих предложений. Для этого ООО &laquo;Агроз46&raquo;&nbsp;собирает просматриваемые данные, которые могут быть связаны с уникальным идентификатором и позволяют понять характер взаимодействия клиентов с Компанией. Cookie для взаимодействия используются в процессе взаимодействия с социальными сетями или создания отзывов. Целевые, рекламные файлы cookie и файлы социальных сетей регистрируют ваши предпочтения для отображения соответствующих объявлений за пределами сайта ООО &laquo;Агроз46&raquo;. Также, cookie социальных сетей могут быть использованы для отслеживания активности в области социальных сетей.</p>\r\n\r\n<p style=\"text-align:justify\">8.3. ООО &laquo;Агроз46&raquo;&nbsp; использует файлы cookie для того, чтобы сделать посещение сайта как можно более приятным, а также для рекламных целей. Ниже приведен более подробный обзор видов cookie и причины их использования:</p>\r\n\r\n<p style=\"text-align:justify\">-Необходимые файлы cookie способствуют при навигации по сайту и просмотре некоторых его свойств (например, данный вид cookie помогает сохранить данные о корзине на всех этапах оформления заказа). Эти файлы необходимы для реализации основных функциональных возможностей сайта. Они сохраняются на протяжении сеанса просмотра сайта.</p>\r\n\r\n<p style=\"text-align:justify\">-Функицональные файлы cookie позволяют улучшить пользование ресурсами (например, сохранить данные о покупках и напомнить о них, создать лист ). Такие файлы позволяют анализировать использование сайта, измерять и повышать уровень производительности. Эти файлы могут размещаться нами или третьими лицами от нашего имени (см. условия отказа от получения рекламной рассылки по электронной почте) и сохраняются на протяжении сеанса просмотра.</p>\r\n\r\n<p style=\"text-align:justify\">- Файлы cookie в рекламе и социальных сетях</p>\r\n\r\n<p style=\"text-align:justify\">&bull; помогают сохранить данные о продуктах и предпочтениях клиентов, а также осуществлять маркетинговую деятельность в других направлениях. Эти файлы позволяют обмениваться данными, например, о том, что вам нравится, с рекламодателями, поэтому реклама ООО &laquo;Агроз46&raquo;, которую видит посетитель сайта, может быть более соответствующей вашим предпочтениям (иногда данные файлы называют &quot;целевые cookie-файлы&quot;).</p>\r\n\r\n<p style=\"text-align:justify\">&bull; способствуют Компании в понимании посетителей сайта. Это позволяет продолжать совершенствовать саит, улучшении маркетинговых сообщений, посетителям (иногда данные файлы называют &quot;эксплуатационные файлы cookie&quot;).</p>\r\n\r\n<p style=\"text-align:justify\">&bull; данные файлы используются для анализа мнения, позволяют рекомендовать саит в социальных сетях, отправлять сообщения компании, предоставлять посетителями отзывов другим нашим (потенциальным) клиентам с помощью рейтингов и обзоров продукции (иногда данные файлы называют &quot;файлы cookie для взаимодействия&quot;).</p>\r\n\r\n<p style=\"text-align:justify\">8.4. Что делать, если посетитель сайта не хочет, чтобы использовались файлы cookie? Изменить настройки браузера, чтобы удалить или предотвратить сохранение некоторых файлов cookie на компьютере или мобильном устройстве без согласия посетителя. В разделе &quot;Помощь&quot; браузера посетителя содержится информация о настройке файлов cookie. Посетителю необходимо обратиться к инструкции браузера для того, чтобы узнать больше о том, как скорректировать или изменить настройки браузера с каждого устройства, которые посетитель используете для посещения Сайта.</p>\r\n\r\n<h2 style=\"text-align:justify\"><span style=\"color:rgb(222, 164, 44); font-family:georgia,serif\"><span style=\"font-size:16px\">9. Заключительные положения</span></span></h2>\r\n\r\n<p style=\"text-align:justify\">9.1. Настоящая Политика подлежит при необходимости изменению, дополнению, в т.ч. в случае появления новых законодательных актов и специальных нормативных документов по обработке и защите персональных данных.</p>\r\n\r\n<p style=\"text-align:justify\">9.2. Настоящая Политика является внутренним документом ООО &laquo;Агроз46&raquo;, и подлежит размещению на официальном сайте. В случае изменений, доведение до неограниченного круга лица таких изменений осуществляется посредством размещения на официальном сайте ООО &laquo;Агроз46&raquo; политики с учетом таких изменений.</p>\r\n\r\n<p style=\"text-align:justify\">9.3. Контроль исполнения требований настоящей Политики осуществляется ответственным за обеспечение безопасности персональных данных&nbsp;ООО &laquo;Агроз46&raquo;.</p>\r\n', '', 'politika', 25),
(70, 'Контакты', 'Контакты', 'Контакты', 'Контакты', '<p>&nbsp;</p>\r\n\r\n<p>Тел.: +7-952-496-03-38<br />\r\n8 800 101 24 46<br />\r\nE-mail: agroz46@yandex.ru<br />\r\nРежим работы:<br />\r\nПН-ПТ: 9:00-18:00<br />\r\nСБ: 10:00 - 15:00<br />\r\nВС: выходной<br />\r\nАдрес: Курская обл., г. Курск, ул. Карла Маркса 71 г. Территория АО &quot;ВОЕНТОРГ&quot;<br />\r\n&nbsp;<br />\r\nВАЦАП +7-952-496-03-38</p>\r\n', '', 'kontakty', 11),
(75, 'Ответы на частозадаваемые вопросы', 'Ответы на частозадаваемые вопросы', 'Ответы на частозадаваемые вопросы', 'Ответы на частозадаваемые вопросы', '', '', 'faq', 16),
(67, 'Доставка', 'Доставка', 'Оплата заказа', 'Доставка и оплата', '', '', 'delivery', 8),
(85, 'Помощь при покупке', 'Помощь при покупке', 'Помощь при покупке', 'Помощь при покупке', '', '', 'help', 26),
(86, 'Рецепты', 'Рецепты', 'Рецепты', 'Рецепты', '', '', 'recipe', 27),
(64, 'Каталог', 'Каталог', 'Каталог', 'Каталог', '<p>Широкий ассортимент</p>\r\n', '', 'catalog', 5),
(65, 'О компании', 'О компании', 'О компании', 'Супермаркет Леон', '<h3>Супермаркет «Леон» создан для людей, ценящих свое время и деньги, желающих покупать свежие <br>\r\n            и качественные продукты по низкой цене рядом с домом.\r\n\r\n        </h3>\r\n<p>&laquo;Леон&raquo;, заботясь о своих покупателях, постоянно обновляет ассортимент, размещает товар таким образом, чтобы посетители тратили минимум времени на его поиск.<br />\r\n<br />\r\nКроме того, супермаркет проводит гибкую ценовую политику и предоставляет дополнительные скидки каждую неделю.<br />\r\n<br />\r\nНа нашем интернет-магазине продуктов и товаров для дома &laquo;Леон&raquo; Вы сможете быстро и легко найти необходимые продукты по низким ценам. При необходимости доставим выбранные Вами покупки домой в удобное для Вас время. Совершать покупки теперь легко!</p>\r\n', '', 'about', 6),
(87, 'Личный кабинет', 'Личный кабинет', 'Личный кабинет', 'Личный кабинет', '', '', 'lc', 28);

-- --------------------------------------------------------

--
-- Структура таблицы `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `meta_desc` varchar(250) NOT NULL COMMENT 'Мета-тег описание',
  `meta_key` varchar(250) NOT NULL COMMENT 'Мета-тег ключевые слова',
  `meta_title` varchar(250) NOT NULL COMMENT 'Мета-тег заголовок',
  `page_title` varchar(250) NOT NULL COMMENT 'Заголовок страницы(sys_name)',
  `page_text` longtext NOT NULL COMMENT 'Текст страницы',
  `page_foto` tinytext NOT NULL COMMENT 'Изображение',
  `sys_name` varchar(250) NOT NULL COMMENT 'Ссылка',
  `date_added` date NOT NULL COMMENT 'Дата добавления',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `recipes`
--

INSERT INTO `recipes` (`id`, `meta_desc`, `meta_key`, `meta_title`, `page_title`, `page_text`, `page_foto`, `sys_name`, `date_added`, `ordering`) VALUES
(4, 'Леон', 'Леон', 'Леон', 'ЙОГУРТОВАЯ ПАННАКОТТА С АПЕЛЬСИНОМ И КОКОСОМ', '<p>Соус карри &ndash; это индийский соус, который отлично сочетается с мясом, например, курицей. Из этого мяса и соуса можно приготовить блюдо на сковороде по разным рецептам. В него включают фрукты, овощи, приправы, молоко и другие продукты. ОБЩИЕ ПРИНЦИПЫ ПРИГОТОВЛЕНИЯ БЛЮДА Сначала готовят соус из приправы карри, томатной пасты, кокосового молока, сливок или йогурта на сковороде. После моют курицу, сушат, режут на кусочки, опускают в соус и тушат до готовности. ПОМИМО ОСНОВНЫХ ИНГРЕДИЕНТОВ, В БЛЮДО ДОБАВЛЯЮТ: ананасы; манго; бананы; имбирь, куркуму, жгучий перец;; помидоры, лук, морковь; чеснок, паприку, гарам масала; болгарский перец В качестве гарнира лучше всего подойдёт отварной рис. По желанию, вместо риса можно подать спагетти или овощи. РЕЦЕПТ КЛАССИЧЕСКИЙ НА СКОВОРОДЕ Приготовление классического карри на сковороде потребует 40 мин. Набор продуктов для приготовления мяса в соусе карри: 1,5 кг курицы; 3 ч. л. карри; 200 мл фильтрованной воды; 1 перец чили; 100 г натурального йогурта; 5 зубцов чеснока; 50 г имбиря; 1 ст. л. томатной пасты; 2 ст. л. сладкой паприки; 300 г обычного лука; 30 мл рафинированного масла; 2 ст. л. куркумы; соль по желанию. ПРИГОТОВЛЕНИЕ От шелухи освободить лук, переложить на доску и нарубить мелкими кусочками. В глубокую сковородку перелить масло, отправить на огонь для разогрева. Зачистить от шелухи зубцы чеснока, измельчить, пропустив через пресс либо потерев на маленькой тёрке. Почистить имбирь, удалив кожуру овощечисткой, нарезать произвольными кусочками. В раскалённую сковородку высыпать нашинкованный мелко лук и пассеровать на слабом огне, помешивая лопаткой, чтобы он не пригорел. Когда лук станет мягким, всыпать к нему измельчённый чеснок, имбирь, хорошо перемешать и готовить ещё 5 мин. Сделать пасту. Для этого смешать порошковый карри с томатной пастой, куркумой, сладкой паприкой. Затем помыть стручковый жгучий перец, очистить от семян и мелко порубить ножом. В зажарку на сковороде положить соус, засыпать измельчённый перец чили и тщательно размешать лопаткой. Тушить содержимое сковороде в течение 3 мин. Обмыть курицу в проточной воде, обтереть насухо салфетками, разрубить на некрупные кусочки. Порезанную птицу выложить в сковородку к соусу карри, перемешать и томить на протяжении 5 мин. Когда курица равномерно обжариться со всех сторон, залить её водой, посолить, закрыть крышкой и тушить на умеренном огне в течение 20-25 мин. Во время тушения содержимое сковороды периодически помешивать лопаткой. После снять крышку, положить к мясу натуральный йогурт без добавок, размешать. Тушить блюдо ещё 5 мин. до готовности. Приготовленную курицу в соусе карри распределить по тарелкам, дополнить отварным или жареным рисом, украсить зеленью и вынести на стол.</p>\r\n', '/public/img/recipe/3.jpg', 'leon', '2024-03-12', 2),
(86, 'Леон2', 'Леон2', 'Леон2', 'Леон2', '<p>Компания ориентирована на постоянное развитие, расширение партнерской сети и увеличение ассортимента товаров. Агрозапчать 46 открыт не только для покупателей, но и для поставщиков, что делает его не просто интернет-магазином, а маркетплейсом.<br />\r\n<br />\r\n<br />\r\nСхема сотрудничества открыта. Здесь не только закупают запчасти на спецтехнику, узлы и комплектующие, но еще и размещают товары на сайте. Используйте эту возможность, чтобы увеличить продажи с минимальными вложениями. И свяжитесь с сотрудниками Агрозапчать 46, если возникли вопросы.</p>\r\n\r\n<h4>Ассортимент товаров</h4>\r\n\r\n<p>В каталоге вы найдете необходимую вам запчасть для двигателей, трансмиссии, электрооборудование, детали для тормозной, гидравлической и топливной системы, элементы кузова, навесное оборудование, расходники и не только.<br />\r\n<br />\r\n<br />\r\nВ Агрозапчать 46 представлены импортные и отечественные бренды &mdash; JCB, Terex, Hitachi, CAT, MST и многие другие. Купить можно детали и комплектующие для строительной техники.</p>\r\n', '/public/img/recipe/3.jpg', 'leon2', '0000-00-00', 2),
(88, 'Леон11', 'Леон11', 'Леон11', 'Леон11', '<p>Компания ориентирована на постоянное развитие, расширение партнерской сети и увеличение ассортимента товаров. Агрозапчать 46 открыт не только для покупателей, но и для поставщиков, что делает его не просто интернет-магазином, а маркетплейсом.<br />\r\n<br />\r\n<br />\r\nСхема сотрудничества открыта. Здесь не только закупают запчасти на спецтехнику, узлы и комплектующие, но еще и размещают товары на сайте. Используйте эту возможность, чтобы увеличить продажи с минимальными вложениями. И свяжитесь с сотрудниками Агрозапчать 46, если возникли вопросы.</p>\r\n\r\n<h4>Ассортимент товаров</h4>\r\n\r\n<p>В каталоге вы найдете необходимую вам запчасть для двигателей, трансмиссии, электрооборудование, детали для тормозной, гидравлической и топливной системы, элементы кузова, навесное оборудование, расходники и не только.<br />\r\n<br />\r\n<br />\r\nВ Агрозапчать 46 представлены импортные и отечественные бренды &mdash; JCB, Terex, Hitachi, CAT, MST и многие другие. Купить можно детали и комплектующие для строительной техники.</p>\r\n', '/public/img/recipe/3.jpg', 'leon11', '0000-00-00', 2),
(89, 'Леон222', 'Леон222', 'Леон222', 'Леон222', '<p>Компания ориентирована на постоянное развитие, расширение партнерской сети и увеличение ассортимента товаров. Агрозапчать 46 открыт не только для покупателей, но и для поставщиков, что делает его не просто интернет-магазином, а маркетплейсом.<br />\r\n<br />\r\n<br />\r\nСхема сотрудничества открыта. Здесь не только закупают запчасти на спецтехнику, узлы и комплектующие, но еще и размещают товары на сайте. Используйте эту возможность, чтобы увеличить продажи с минимальными вложениями. И свяжитесь с сотрудниками Агрозапчать 46, если возникли вопросы.</p>\r\n\r\n<h4>Ассортимент товаров</h4>\r\n\r\n<p>В каталоге вы найдете необходимую вам запчасть для двигателей, трансмиссии, электрооборудование, детали для тормозной, гидравлической и топливной системы, элементы кузова, навесное оборудование, расходники и не только.<br />\r\n<br />\r\n<br />\r\nВ Агрозапчать 46 представлены импортные и отечественные бренды &mdash; JCB, Terex, Hitachi, CAT, MST и многие другие. Купить можно детали и комплектующие для строительной техники.</p>\r\n', '/public/img/recipe/3.jpg', 'leon222', '0000-00-00', 2),
(90, 'Леон333', 'Леон2333', 'Леон233', 'Леон233', '<p>Компания ориентирована на постоянное развитие, расширение партнерской сети и увеличение ассортимента товаров. Агрозапчать 46 открыт не только для покупателей, но и для поставщиков, что делает его не просто интернет-магазином, а маркетплейсом.<br />\r\n<br />\r\n<br />\r\nСхема сотрудничества открыта. Здесь не только закупают запчасти на спецтехнику, узлы и комплектующие, но еще и размещают товары на сайте. Используйте эту возможность, чтобы увеличить продажи с минимальными вложениями. И свяжитесь с сотрудниками Агрозапчать 46, если возникли вопросы.</p>\r\n\r\n<h4>Ассортимент товаров</h4>\r\n\r\n<p>В каталоге вы найдете необходимую вам запчасть для двигателей, трансмиссии, электрооборудование, детали для тормозной, гидравлической и топливной системы, элементы кузова, навесное оборудование, расходники и не только.<br />\r\n<br />\r\n<br />\r\nВ Агрозапчать 46 представлены импортные и отечественные бренды &mdash; JCB, Terex, Hitachi, CAT, MST и многие другие. Купить можно детали и комплектующие для строительной техники.</p>\r\n', '/public/img/recipe/3.jpg', 'leon233', '0000-00-00', 2),
(87, 'Леон3', 'Леон23', 'Леон23', 'Леон23', '<p>Компания ориентирована на постоянное развитие, расширение партнерской сети и увеличение ассортимента товаров. Агрозапчать 46 открыт не только для покупателей, но и для поставщиков, что делает его не просто интернет-магазином, а маркетплейсом.<br />\n<br />\n<br />\nСхема сотрудничества открыта. Здесь не только закупают запчасти на спецтехнику, узлы и комплектующие, но еще и размещают товары на сайте. Используйте эту возможность, чтобы увеличить продажи с минимальными вложениями. И свяжитесь с сотрудниками Агрозапчать 46, если возникли вопросы.</p>\n\n<h4>Ассортимент товаров</h4>\n\n<p>В каталоге вы найдете необходимую вам запчасть для двигателей, трансмиссии, электрооборудование, детали для тормозной, гидравлической и топливной системы, элементы кузова, навесное оборудование, расходники и не только.<br />\n<br />\n<br />\nВ Агрозапчать 46 представлены импортные и отечественные бренды &mdash; JCB, Terex, Hitachi, CAT, MST и многие другие. Купить можно детали и комплектующие для строительной техники.</p>\n', '/public/img/recipe/3.jpg', 'leon23', '0000-00-00', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `relation`
--

CREATE TABLE `relation` (
  `id` int(11) NOT NULL,
  `primary_table` varchar(255) NOT NULL COMMENT 'Первичная таблица',
  `foreign_table` varchar(255) NOT NULL COMMENT 'Внешняя таблица',
  `primary_column` varchar(255) NOT NULL COMMENT 'Первичный ключ',
  `foreign_column` varchar(255) NOT NULL COMMENT 'Внешний ключ',
  `display_column` varchar(255) NOT NULL COMMENT 'Столбец для отображения',
  `pole` varchar(255) NOT NULL COMMENT 'Поле сравнения(не для списка)',
  `multi` tinyint(1) NOT NULL COMMENT 'Мультивыбор',
  `zero` tinyint(1) NOT NULL COMMENT 'Обязательный',
  `isselect` tinyint(1) NOT NULL COMMENT 'Тип данных список(select)',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `relation`
--

INSERT INTO `relation` (`id`, `primary_table`, `foreign_table`, `primary_column`, `foreign_column`, `display_column`, `pole`, `multi`, `zero`, `isselect`, `ordering`) VALUES
(1, 's_modules', 's_modes', 'id', 'module_id', 'name', '', 0, 0, 1, 1),
(7, 'menu_pos', 'menu', 'id', 'position', 'name', '', 0, 0, 1, 2),
(33, 'adm_m_sort', 'adm_m_news', 'id', 'order_by', 'name', '', 0, 1, 1, 5),
(31, 'catalog_cats', 'catalog', 'id', 'cat_id', 'name', '', 0, 1, 1, 4),
(52, 'catalog_brands', 'catalog', 'id', 'brand_id', 'name', '', 0, 1, 1, 6),
(53, 'library_cats', 'library', 'id', 'cat_id', 'name', '', 0, 1, 1, 7),
(54, 'aktsenty_cats', 'aktsenty', 'id', 'cat_id', 'name', '', 0, 1, 1, 8),
(55, 'resursy', 'catalog', 'id', 'resurs1', 'name', '', 0, 0, 1, 9),
(56, 'resursy', 'catalog', 'id', 'resurs2', 'name', '', 0, 0, 1, 10),
(57, 'catalog_nal', 'catalog', 'id', 'nal_id', 'name', '', 0, 1, 1, 11),
(58, 'catalog_cats', 'catalog_podcats', 'id', 'cat_id', 'name', '', 0, 1, 1, 12),
(59, 'catalog_podcats', 'catalog', 'id', 'podcat_id', 'fname', '', 0, 1, 1, 13),
(60, 'catalog_type', 'catalog', 'id', 'type_id', 'name', '', 0, 1, 1, 14),
(61, 'catalog_country', 'catalog', 'id', 'country_id', 'name', '', 0, 1, 1, 15),
(62, 'catalog_marka', 'catalog', 'id', 'marka_id', 'name', '', 0, 1, 1, 16),
(63, 'catalog_razdel', 'catalog', 'id', 'razdel_id', 'name', '', 0, 1, 1, 17),
(64, 'catalog_razdel', 'catalog_cats', 'id', 'razdel_id', 'name', '', 0, 1, 1, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование',
  `descr` varchar(255) NOT NULL COMMENT 'Описание',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `s_modes`
--

CREATE TABLE `s_modes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Наименование',
  `action` varchar(100) NOT NULL COMMENT 'Action',
  `dbtable` varchar(100) NOT NULL COMMENT 'Таблица БД',
  `module_id` int(11) NOT NULL COMMENT 'Модуль',
  `showcols` varchar(255) NOT NULL COMMENT 'Отображаемые колонки в списке',
  `groupby` varchar(255) NOT NULL COMMENT 'Группировка списка',
  `joined` varchar(255) NOT NULL COMMENT 'JOIN',
  `filtered` varchar(255) NOT NULL COMMENT 'WHERE (начиная с AND)',
  `sys_name` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `s_modes`
--

INSERT INTO `s_modes` (`id`, `name`, `action`, `dbtable`, `module_id`, `showcols`, `groupby`, `joined`, `filtered`, `sys_name`, `ordering`) VALUES
(4, 'Страницы', 'items', 'pages', 8, 'page_title', '', '', '', '', 0),
(8, 'Ссылки', 'items', 'menu', 10, 'name,url', 'position', '', '', '', 1),
(9, 'Позиции', 'pos', 'menu_pos', 10, 'name', '', '', '', '', 2),
(13, 'Слайды', 'slides', 'slider', 16, 'img,title,title2', '', '', '', '', 0),
(37, 'Отзывы', 'items', 'otzyvy', 25, 'otz_title', '', '', '', '', 8),
(35, 'Статьи', 'items', 'news', 24, 'news_title', '', '', '', '', 6),
(56, 'Товар', 'items', 'catalog', 23, 'img,name', 'cat_id,podcat_id,brand_id', '', '', '', 1),
(33, 'Категории', 'cats', 'catalog_cats', 23, 'name', '', '', '', '', 2),
(38, 'Фотографии', 'items', 'gallary', 26, 'img', 'cat_id', '', '', '', 0),
(39, 'Категории', 'cats', 'gallary_cats', 26, 'name', '', '', '', '', 0),
(40, 'Товары', 'items', 'catalog_tags', 27, 'on_moderate,name', 'cat_id', '', '', '', 0),
(41, 'Преимущества', 'items', 'features', 28, 'name', '', '', '', '', 9),
(61, 'Бренды', 'brands', 'catalog_brands', 23, 'name', '', '', '', '', 3),
(58, 'Новости', 'items', 'news', 36, 'page_title', '', '', '', '', 24),
(60, 'Услуги', 'items', 'uslugi', 37, 'name', '', '', '', '', 25),
(49, 'Вопросы', 'items', 'faq', 30, 'question', '', '', '', '', 16),
(50, 'Циклы', 'items', 'factory', 31, 'name', '', '', '', '', 17),
(51, 'Сотрудники', 'items', 'personal', 32, 'fio,dolzh', '', '', '', '', 18),
(52, 'Как мы работаем', 'items', 'etapy', 33, 'name', '', '', '', '', 19),
(54, 'Акции', 'items', 'stock', 34, 'img,name', '', '', '', '', 20),
(55, 'УТП', 'items', 'utp', 35, 'utp', 'cat_id', '', '', '', 21),
(62, 'Сервисы', 'items', 'servisy', 38, 'name', '', '', '', '', 27),
(63, 'Библиотека', 'items', 'library', 39, 'name', 'cat_id', '', '', '', 28),
(64, 'Разделы', 'cats', 'library_cats', 39, 'name', '', '', '', '', 29),
(65, 'Банеры', 'items', 'banners', 40, 'name', '', '', '', '', 30),
(66, 'Акценты', 'items', 'aktsenty', 41, 'block_title', 'cat_id', '', '', '', 31),
(67, 'Проекты', 'items', 'projects', 42, 'page_title', '', '', '', '', 32),
(68, 'Решения', 'items', 'resheniya', 43, 'page_title', '', '', '', '', 33),
(69, 'Блоки', 'blocks', 'aktsenty_cats', 41, 'name', '', '', '', '', 34),
(70, 'Ресурсы', 'items', 'resursy', 44, 'name', '', '', '', '', 35),
(71, 'Наличие', 'nal', 'catalog_nal', 23, 'name', '', '', '', '', 4),
(72, 'Преимущества', 'items', 'features', 45, 'img,name', '', '', '', '', 37),
(73, 'Статьи', 'items', 'blog', 46, 'img,page_title', '', '', '', '', 38),
(74, 'Подкатегория', 'podcats', 'catalog_podcats', 23, 'name', 'cat_id', '', '', '', 5),
(75, 'Способ обработки', 'type', 'catalog_type', 23, 'name', '', '', '', '', 6),
(76, 'Страна', 'country', 'catalog_country', 23, 'name', '', '', '', '', 7),
(77, 'Марка техники', 'marka', 'catalog_marka', 23, 'name', '', '', '', '', 8),
(78, 'Новости', 'novosti', 'news', 47, 'page_title', '', '', '', '', 43),
(79, 'Раздел', 'razdel', 'catalog_razdel', 23, 'name,img', '', '', '', '', 44),
(80, 'FAQ', 'faq', 'faq', 49, 'question', '', '', '', '', 45),
(81, 'Рецепты', 'recipe', 'recipes', 50, 'page_title', '', '', '', '', 46);

-- --------------------------------------------------------

--
-- Структура таблицы `s_modules`
--

CREATE TABLE `s_modules` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Наименование',
  `action` varchar(100) NOT NULL COMMENT 'Action',
  `icon` varchar(255) NOT NULL COMMENT 'Иконка(font awesome)',
  `settings` tinyint(1) NOT NULL COMMENT 'Настройки',
  `settingsTable` varchar(100) NOT NULL COMMENT 'Таблица настроек',
  `sys_name` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `s_modules`
--

INSERT INTO `s_modules` (`id`, `name`, `action`, `icon`, `settings`, `settingsTable`, `sys_name`, `ordering`) VALUES
(8, 'Страницы', 'pages', '<i class=\"fa fa-file-o fa-fw\" aria-hidden=\"true\"></i>', 0, '', '', 3),
(10, 'Меню', 'menu', '<i class=\"fa fa-compass fa-fw\" aria-hidden=\"true\"></i>', 0, '', '', 5),
(45, 'Преимущества', 'features', '<i class=\"fa fa-cubes\" aria-hidden=\"true\"></i>', 0, '', '', 8),
(20, 'Обратная связь', 'callback', '<i class=\"fa fa-phone\" aria-hidden=\"true\"></i>', 1, 'adm_m_feedback', '', 6),
(23, 'Каталог', 'catalog', '<i class=\"fa fa-th\" aria-hidden=\"true\"></i>', 0, '', '', 1),
(37, 'Услуги', 'uslugi', '<i class=\"fa fa-server\" aria-hidden=\"true\"></i>', 0, '', '', 7),
(29, 'Контакты', 'kontakty', '<i class=\"fa fa-address-card\" aria-hidden=\"true\"></i>', 1, 'contacts_settings', '', 4),
(46, 'Блог', 'blog', '<i class=\"fa fa-rss\" aria-hidden=\"true\"></i>', 0, '', '', 9),
(40, 'Банеры', 'banners', '<i class=\"fa fa-picture-o\" aria-hidden=\"true\"></i>', 0, '', '', 2),
(49, 'FAQ', 'faq', '', 0, '', '', 10),
(50, 'Рецепты', 'recipe', '', 0, '', '', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `uslugi`
--

CREATE TABLE `uslugi` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование(sys_name)',
  `descr` text NOT NULL COMMENT 'Описание',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `url` varchar(250) NOT NULL COMMENT 'Ссылка',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `uslugi`
--

INSERT INTO `uslugi` (`id`, `name`, `descr`, `img`, `on_moderate`, `url`, `ordering`) VALUES
(1, 'Сервисные службы', 'Выполним работу по проведению ТО на спецтехнике\r\n', '/public/img/uslugi/371099.jpg', 0, '/servisnye-sluzhby', 1),
(2, 'Оперативный подбор фильтров', 'Выполним работу по проведению ТО на спецтехнике', '/public/img/uslugi/740040.jpg', 0, '/operativnyy-podbor-filtrov', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `visited`
--

CREATE TABLE `visited` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `msession` varchar(255) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `visited`
--

INSERT INTO `visited` (`id`, `item_id`, `msession`, `date_added`) VALUES
(1, 2, 'hr7ngoljdt3qahg1kvnaa5uauq8e1jh4', '2024-03-19'),
(2, 6, 'hr7ngoljdt3qahg1kvnaa5uauq8e1jh4', '2024-03-19'),
(3, 38, 'hr7ngoljdt3qahg1kvnaa5uauq8e1jh4', '2024-03-19'),
(4, 42, 'hr7ngoljdt3qahg1kvnaa5uauq8e1jh4', '2024-03-19'),
(5, 44, 'hr7ngoljdt3qahg1kvnaa5uauq8e1jh4', '2024-03-19'),
(6, 111, 'hr7ngoljdt3qahg1kvnaa5uauq8e1jh4', '2024-03-19'),
(7, 115, 'hr7ngoljdt3qahg1kvnaa5uauq8e1jh4', '2024-03-19'),
(8, 1, 'hr7ngoljdt3qahg1kvnaa5uauq8e1jh4', '2024-03-19'),
(9, 13, 'hr7ngoljdt3qahg1kvnaa5uauq8e1jh4', '2024-03-19'),
(10, 26, 'hr7ngoljdt3qahg1kvnaa5uauq8e1jh4', '2024-03-22'),
(11, 3, 'hr7ngoljdt3qahg1kvnaa5uauq8e1jh4', '2024-03-22'),
(12, 9, 'hr7ngoljdt3qahg1kvnaa5uauq8e1jh4', '2024-03-22');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adm_m_catalog`
--
ALTER TABLE `adm_m_catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `adm_m_feedback`
--
ALTER TABLE `adm_m_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `adm_m_news`
--
ALTER TABLE `adm_m_news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `adm_m_otzyvy`
--
ALTER TABLE `adm_m_otzyvy`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `adm_m_sort`
--
ALTER TABLE `adm_m_sort`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `adm_site_opt`
--
ALTER TABLE `adm_site_opt`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `adm_users`
--
ALTER TABLE `adm_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `callback`
--
ALTER TABLE `callback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_brands`
--
ALTER TABLE `catalog_brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_cats`
--
ALTER TABLE `catalog_cats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_country`
--
ALTER TABLE `catalog_country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_marka`
--
ALTER TABLE `catalog_marka`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_nal`
--
ALTER TABLE `catalog_nal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_podcats`
--
ALTER TABLE `catalog_podcats`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_razdel`
--
ALTER TABLE `catalog_razdel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_type`
--
ALTER TABLE `catalog_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts_settings`
--
ALTER TABLE `contacts_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_pos`
--
ALTER TABLE `menu_pos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `otzyvy`
--
ALTER TABLE `otzyvy`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `otzyvy_slider`
--
ALTER TABLE `otzyvy_slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `s_modes`
--
ALTER TABLE `s_modes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `s_modules`
--
ALTER TABLE `s_modules`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `visited`
--
ALTER TABLE `visited`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `adm_m_catalog`
--
ALTER TABLE `adm_m_catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `adm_m_feedback`
--
ALTER TABLE `adm_m_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `adm_m_news`
--
ALTER TABLE `adm_m_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `adm_m_otzyvy`
--
ALTER TABLE `adm_m_otzyvy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `adm_m_sort`
--
ALTER TABLE `adm_m_sort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `adm_site_opt`
--
ALTER TABLE `adm_site_opt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `adm_users`
--
ALTER TABLE `adm_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `callback`
--
ALTER TABLE `callback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT для таблицы `catalog_brands`
--
ALTER TABLE `catalog_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `catalog_cats`
--
ALTER TABLE `catalog_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `catalog_country`
--
ALTER TABLE `catalog_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `catalog_marka`
--
ALTER TABLE `catalog_marka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `catalog_nal`
--
ALTER TABLE `catalog_nal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `catalog_podcats`
--
ALTER TABLE `catalog_podcats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `catalog_razdel`
--
ALTER TABLE `catalog_razdel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `catalog_type`
--
ALTER TABLE `catalog_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `contacts_settings`
--
ALTER TABLE `contacts_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `menu_pos`
--
ALTER TABLE `menu_pos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `otzyvy`
--
ALTER TABLE `otzyvy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `otzyvy_slider`
--
ALTER TABLE `otzyvy_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT для таблицы `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT для таблицы `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT для таблицы `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `s_modes`
--
ALTER TABLE `s_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `s_modules`
--
ALTER TABLE `s_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `visited`
--
ALTER TABLE `visited`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
