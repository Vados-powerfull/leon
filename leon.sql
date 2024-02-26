-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 26 2024 г., 04:20
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
(1, 'info@moswoodwork.ru', '', 'Сообщение с сайта uderev', 'Спасибо, Ваше сообщение успешно отправлено! Мы обязательно свяжемся с Вами!', 'Сообщение не было отправлено. Обратитесь к администратору!', '', 1, '');

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
(2, 'counter', '');

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
(1, 'user', 'nano');

-- --------------------------------------------------------

--
-- Структура таблицы `advantages`
--

CREATE TABLE `advantages` (
  `id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `title` varchar(255) NOT NULL COMMENT 'Заголовок',
  `name` longtext NOT NULL COMMENT 'Текст',
  `img` tinytext NOT NULL COMMENT 'Иконка',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `advantages`
--

INSERT INTO `advantages` (`id`, `num`, `title`, `name`, `img`, `on_moderate`, `ordering`) VALUES
(1, 1, 'Своя техника', '<p><span style=\"color:rgb(34, 34, 34); font-family:raleway; font-size:18px\">У нас свой автопарк, включая тракторы, бульдозеры и коммерческий транспорт</span></p>\r\n', '/public/img/advantages/768405.png', 0, 1),
(2, 2, 'Выгодные цены', '<p>Мы постоянно проводим акции и скидки, чтобы&nbsp;<br />\r\nвы воспользовались лучшим предложением</p>\r\n', '/public/img/advantages/101883.png', 0, 2),
(3, 3, 'Любая точка МО', '<p>Выезжаем&nbsp;<br />\r\nи работаем&nbsp;<br />\r\nв любой точке Подмосковья&nbsp;<br />\r\nбез ночевки&nbsp;<br />\r\nна участке Заказчика</p>\r\n', '/public/img/advantages/77351.png', 0, 3),
(4, 4, 'Масса отзывов', '<p>Большинство Заказчиков отзываются о нас с теплом&nbsp;<br />\r\nи обращаются вновь</p>\r\n', '/public/img/advantages/455478.png', 0, 4),
(5, 5, 'Гарантия качества', '<p>Будьте уверены&nbsp;<br />\r\nв высочайшем качестве работ&nbsp;<br />\r\nи надежности всех действий</p>\r\n', '/public/img/advantages/890415.png', 0, 5),
(6, 0, 'Окончательный расчет', '<p>производится после подписания акта приемки работ</p>\r\n', '/public/img/advantages/948963.png', 0, 6),
(7, 0, 'Порядок', '<p>После завершения работ&nbsp;<br />\r\nмы оставляем участок чистым. После нас не нужно убираться</p>\r\n', '/public/img/advantages/211818.png', 0, 7),
(8, 0, 'Ответственный  бригадир', '<p>Находится на участке&nbsp;<br />\r\nи контролирует весь процесс работы</p>\r\n', '/public/img/advantages/598168.png', 0, 8),
(9, 0, 'Скидка пенсионерам', '<p>Для всех<br />\r\nпенсионеров&nbsp;<br />\r\nскидка &ndash; 10%</p>\r\n', '/public/img/advantages/707146.png', 0, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL COMMENT 'Страница',
  `name` varchar(255) NOT NULL COMMENT 'Наименование',
  `descr` text NOT NULL COMMENT 'Описание',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `btn` varchar(255) NOT NULL COMMENT 'Текст кнопки',
  `btn_href` varchar(255) NOT NULL,
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id`, `page_id`, `name`, `descr`, `img`, `btn`, `btn_href`, `on_moderate`, `ordering`) VALUES
(1, 67, 'Расчистка участков, удаление деревьев и пней любой сложности в Москве и МО!', '', '/public/img/baners/995754.png', 'Рассчитать стоимость', '', 0, 1),
(2, 68, 'Удаление деревьев под ключ', '', '/public/img/baners/495528.png', 'Рассчитать стоимость', '', 0, 1),
(3, 77, 'Вывоз мусора', 'Вывоз мусора', '/public/img/baners/138695.png', 'Рассчитать стоимость', '', 0, 2),
(4, 78, 'Вырубка кустарников', 'Вырубка кустарников', '/public/img/baners/620104.png', 'Рассчитать стоимость', '', 0, 3),
(5, 70, 'Валка деревьев', 'Валка деревьев', '/public/img/baners/997390.png', 'Рассчитать стоимость', '', 1, 4),
(6, 69, 'Спил деревьев', 'Спил деревьев', '/public/img/baners/899413.png', 'Рассчитать стоимость', '', 0, 5),
(7, 79, 'Лечение деревьев', 'Лечение деревьев', '/public/img/baners/960089.png', 'Рассчитать стоимость', '', 0, 6),
(8, 73, 'Кронирование деревьев', 'Кронирование деревьев', '/public/img/baners/694564.png', 'Рассчитать стоимость', '', 0, 7),
(9, 76, 'Обработка от короеда', 'Обработка от короеда', '/public/img/baners/185738.png', 'Рассчитать стоимость', '', 0, 8),
(10, 75, 'Расчистка участка', 'Расчистка участка', '/public/img/baners/926963.png', 'Рассчитать стоимость', '', 0, 9),
(11, 72, 'Удаление пней', 'Удаление пней', '/public/img/baners/438638.png', 'Рассчитать стоимость', '', 0, 10),
(12, 80, 'Укрепление деревьев', 'Укрепление деревьев', '/public/img/baners/121933.png', 'Рассчитать стоимость', '', 0, 11),
(13, 74, 'Корчевание (корчевка) пней', 'Корчевание (корчевка) пней', '', 'Рассчитать стоимость', '', 0, 12);

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
-- Структура таблицы `contacts_settings`
--

CREATE TABLE `contacts_settings` (
  `id` int(11) NOT NULL,
  `phone1` varchar(255) NOT NULL COMMENT 'Телефон 1',
  `phone2` varchar(255) NOT NULL COMMENT 'Телефон 2',
  `adres` varchar(255) NOT NULL COMMENT 'Адрес',
  `adres2` varchar(255) NOT NULL COMMENT 'Полный адрес',
  `rezhim` text NOT NULL COMMENT 'Режим работы',
  `vk_href` varchar(255) NOT NULL COMMENT 'Ссылка на группу VK',
  `yt_href` varchar(200) NOT NULL COMMENT 'Ссылка на youtube',
  `email` varchar(255) NOT NULL COMMENT 'Email',
  `mapcode` text NOT NULL COMMENT 'Код карты',
  `mapcode2` text NOT NULL,
  `map` varchar(255) NOT NULL COMMENT 'Ссылка на карту'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts_settings`
--

INSERT INTO `contacts_settings` (`id`, `phone1`, `phone2`, `adres`, `adres2`, `rezhim`, `vk_href`, `yt_href`, `email`, `mapcode`, `mapcode2`, `map`) VALUES
(1, '8 (910) 326-19-56', '8 (910) 326-19-56', 'Белгородский район, 308501', 'Россия, Белгородская обл., Белгородский район, 308501, коттеджный посёлок Лесной, село Шагаровка', '', 'https://vk.com/somelink', '', 'leone_bel@mail.ru', '<iframe src=\"https://yandex.ru/map-widget/v1/?um=constructor%3A319839880f129a0cf550218daf78b352329bdfb15149ba370123c0b534a2463a&source=constructor\" width=\"100%\" height=\"500\" frameborder=\"0\"></iframe>', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `description`
--

CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `title_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Заголовок описания',
  `text_1` text CHARACTER SET utf8 NOT NULL COMMENT 'Текст 1',
  `title_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Маленький заголовок 1',
  `text_2` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'текст 2',
  `title_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'заголовок 3',
  `text_3` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'текст 3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование',
  `descr` text NOT NULL COMMENT 'Описание',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `features`
--

INSERT INTO `features` (`id`, `name`, `descr`, `img`, `on_moderate`, `ordering`) VALUES
(1, 'несем материальную ответственность за Ваше имущество (прописано в договоре)', '', 'public/img/svg/about-svg/1.svg', 0, 1),
(2, 'без обмана <br>\nи наценок', '', 'public/img/svg/about-svg/2.svg', 0, 2),
(3, 'в процессе работы решаем задачи любой сложности и на любой высоте', '', 'public/img/svg/about-svg/3.svg', 0, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `inn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ИНН',
  `ogrn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ОГРН',
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'копирайт',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ссылка на политику конфиденциальности',
  `dogovor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ссылка на договор'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `footer`
--

INSERT INTO `footer` (`id`, `inn`, `ogrn`, `copyright`, `link`, `dogovor`) VALUES
(1, 'ИНН', 'ОГРН', '©Леон, 2023', '#', '#');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование',
  `url` varchar(255) NOT NULL COMMENT 'Ссылка',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `position` int(11) NOT NULL COMMENT 'Расположение',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `url`, `on_moderate`, `position`, `ordering`) VALUES
(12, 'О компании', '/about', 0, 0, 12),
(13, 'Доставка и оплата', '/delivery', 0, 0, 13),
(14, 'Помощь при покупке', '/help', 0, 0, 14),
(15, 'Рецепты', '/recipe', 0, 0, 15),
(16, 'Контакты', '/contacts', 0, 0, 16);

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
-- Структура таблицы `otzyv_img`
--

CREATE TABLE `otzyv_img` (
  `id` int(11) NOT NULL,
  `img` text CHARACTER SET utf8 NOT NULL COMMENT 'путь до картинки',
  `href` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'ссылка на авито',
  `video1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Видео 1',
  `video2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Видео 2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `otzyv_img`
--

INSERT INTO `otzyv_img` (`id`, `img`, `href`, `video1`, `video2`) VALUES
(1, 'public/img/feedback.jpg', '#', 'https://www.youtube.com/embed/H_5dM2Ypd_k?si=TFXk_VbJapI60gKY', 'https://www.youtube.com/embed/H_5dM2Ypd_k?si=TFXk_VbJapI60gKY');

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
(26, 'Error 404', 'Error 404', 'Ошибка 404', 'Ошибка 404', '<p style=\"text-align: center;\"><span style=\"font-size:16px\">Страница не найдена. Вы можете перейти на&nbsp;<a href=\"/\">главную страницу</a>.</span></p>\r\n', '', '404', 1),
(53, 'Услуги', 'Услуги', 'Услуги', 'Услуги', '', '', 'item', 2),
(67, 'Услуги по удалению деревьев, пней, кустарников, расчистка участков', 'Услуги по удалению деревьев, пней, кустарников, расчистка участков', 'Услуги по удалению деревьев, пней, кустарников, расчистка участков', 'Услуги по удалению деревьев, пней, кустарников, расчистка участков', '', '', 'index', 3),
(68, 'Удаление деревьев', 'Удаление деревьев', 'Удаление деревьев', 'Удаление деревьев', '', '', 'udalenie-derevev', 4),
(69, 'Спил деревьев', 'Спил деревьев', 'Спил деревьев', 'Спил деревьев', '', '', 'spil-derevev', 5),
(70, 'Валка деревьев', 'Валка деревьев', 'Валка деревьев', 'Валка деревьев', '', '', 'valka-derevev', 6),
(71, 'Вырубка деревьев', 'Вырубка деревьев', 'Вырубка деревьев', 'Вырубка деревьев', '', '', 'vyrubka-derevev', 7),
(72, 'Удаление пней', 'Удаление пней', 'Удаление пней', 'Удаление пней', '', '', 'udalenie-pney', 8),
(73, 'Кронирование деревьев', 'Кронирование деревьев', 'Кронирование деревьев', 'Кронирование деревьев', '', '', 'kronirovanie-derevev', 9),
(74, 'Корчевание (корчевка) пней', 'Корчевание (корчевка) пней', 'Корчевание (корчевка) пней', 'Корчевание (корчевка) пней', '', '', 'korchevanie-korchevka-pney', 10),
(75, 'Расчистка участка', 'Расчистка участка', 'Расчистка участка', 'Расчистка участка', '', '', 'raschistka-uchastka', 11),
(76, 'Обрабокта от короеда', 'Обрабокта от короеда', 'Обрабокта от короеда', 'Обрабокта от короеда', '', '', 'obrabokta-ot-koroeda', 12),
(77, 'Вывоз мусора', 'Вывоз мусора', 'Вывоз мусора', 'Вывоз мусора', '', '', 'vyvoz-musora', 13),
(78, 'Вырубка кустарников', 'Вырубка кустарников', 'Вырубка кустарников', 'Вырубка кустарников', '', '', 'vyrubka-kustarnikov', 14),
(79, 'Лечение деревьев', 'Лечение деревьев', 'Лечение деревьев', 'Лечение деревьев', '', '', 'lechenie-derevev', 15),
(80, 'Укрепление деревьев', 'Укрепление деревьев', 'Укрепление деревьев', 'Укрепление деревьев', '', '', 'ukreplenie-derevev', 16),
(81, 'Контакты', 'Контакты', 'Контакты', 'Контакты', '', '', 'kontakty', 17),
(82, 'Акции', 'Акции', 'Акции', 'Акции', '<p>Акции</p>\r\n', '', 'aktsii', 18),
(83, 'Цены', 'Цены', 'Цены', 'Цены', '', '', 'tseny', 19),
(84, 'Вакансии', 'Вакансии', 'Вакансии', 'Вакансии', '<p>Вакансии</p>\r\n', '', 'vakansii', 20),
(85, 'Отзывы', 'Отзывы', 'Отзывы', 'Отзывы', '<p>Отзывы</p>\r\n', '', 'otzyvy', 21),
(86, 'Наши работы', 'Наши работы', 'Наши работы', 'Наши работы', '<p>Наши работы</p>\r\n', '', 'nashi-raboty', 22),
(87, 'О компании', 'О компании', 'О компании', 'О компании', '<p>О компании</p>\r\n', '', 'o-kompanii', 23),
(88, 'Блог', 'Блог', 'Блог', 'Блог', '', '', 'blog', 24);

-- --------------------------------------------------------

--
-- Структура таблицы `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `usluga_id` int(11) NOT NULL COMMENT 'Услуга',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `portfolio`
--

INSERT INTO `portfolio` (`id`, `usluga_id`, `img`, `ordering`) VALUES
(1, 1, '/public/img/portfolio/6516.png', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `preview`
--

CREATE TABLE `preview` (
  `id` int(11) NOT NULL DEFAULT '1',
  `title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'Заголовок',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Большой текст',
  `text1` text COLLATE utf8mb4_unicode_ci COMMENT 'Маленький текст'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `preview`
--

INSERT INTO `preview` (`id`, `title`, `text`, `text1`) VALUES
(1, 'Удаление деревьев', 'это команда специалистов отличающееся богатым опытом работы с зелеными насаждениями. Профессиональный уровень подготовки каждого сотрудника подтверждает сертификат европейского уровня.\r\n', 'C момента основания 2011 года, на нашем счету тысячи успешно выполненных проектов как частных заказчиков, так и крупных компаний. Каждый день работы доказывает нам и нашим партнерам, что профессионализм не спрятать \r\nза красивый сайт или слова, его можно только подтвердить качественной работой. \r\n<br>\r\n<br>\r\nМы серьезно относимся к безопасности проведения работ. Работаем только \r\nс оборудованием известны европейских брендов как Petzl и Stihl. Рабочий день начинается с полной проверки оборудования на износ и не исправность. \r\nВедь не зря безопасность, один из принципов работы команды. Наша материально-техническая база позволят решать задачи любого уровня сложности. Мы не просто арбористы, мы общество настоящих профессионалов.');

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
(33, 'adm_m_sort', 'adm_m_news', 'id', 'order_by', 'name', '', 0, 1, 1, 3),
(57, 'uslugi_cats', 'uslugi', 'id', 'cat_id', 'name', '', 0, 1, 1, 4),
(58, 'filtr_cats', 'filtr', 'id', 'filtr_id', 'name', '', 0, 1, 1, 5),
(59, 'filtr', 'portfolio', 'id', 'filtr_id', 'name', '', 0, 1, 1, 6),
(60, 'filtr', 'portfolio', 'id', 'filtr_id_same', 'name', '', 0, 0, 1, 7),
(61, 'filtr', 'portfolio', 'id', 'filtr_id_same2', 'name', '', 0, 0, 1, 8),
(62, 'filtr', 'portfolio', 'id', 'filtr', 'name', '', 1, 0, 0, 9),
(63, 'price_cats', 'price', 'id', 'cat_id', 'name', '', 0, 1, 1, 10),
(64, 'uslugi_cats', 'portfolio', 'id', 'usluga_id', 'name', '', 0, 1, 1, 11),
(65, 'pages', 'banners', 'id', 'page_id', 'page_title', '', 0, 1, 1, 12),
(66, 'pages', 'price_cats', 'id', 'page_id', 'page_title', '', 0, 1, 1, 13);

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
(4, 'Страницы', 'items', 'pages', 8, 'page_title', '', '', '', '', 1),
(8, 'Ссылки', 'items', 'menu', 10, 'name,url', 'position', '', '', '', 1),
(9, 'Позиции', 'pos', 'menu_pos', 10, 'name', '', '', '', '', 2),
(13, 'Слайды', 'slides', 'slider', 16, 'img,title,title2', '', '', '', '', 0),
(37, 'Отзывы', 'items', 'otzyvy', 25, 'otz_title', '', '', '', '', 8),
(35, 'Статьи', 'items', 'news', 24, 'news_title', '', '', '', '', 6),
(56, 'Товар', 'items', 'catalog', 23, 'name', 'cat_id,brand_id', '', '', '', 1),
(33, 'Категории', 'cats', 'catalog_cats', 23, 'name', '', '', '', '', 2),
(38, 'Фотографии', 'items', 'gallary', 26, 'img', 'cat_id', '', '', '', 0),
(39, 'Категории', 'cats', 'gallary_cats', 26, 'name', '', '', '', '', 0),
(40, 'Товары', 'items', 'catalog_tags', 27, 'on_moderate,name', 'cat_id', '', '', '', 0),
(41, 'Преимущества', 'items', 'features', 28, 'name', '', '', '', '', 9),
(61, 'Бренды', 'brands', 'catalog_brands', 23, 'name', '', '', '', '', 26),
(58, 'Новости', 'items', 'news', 36, 'page_title', '', '', '', '', 24),
(60, 'Услуги', 'items', 'uslugi', 37, 'name', '', '', '', '', 1),
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
(85, 'Банеры', 'items', 'banners', 59, 'img,name', 'page_id', '', '', '', 49),
(72, 'Преимущества', 'items', 'features', 45, 'name', '', '', '', '', 37),
(73, 'Преимущества', 'advantages', 'advantages', 46, 'title', '', '', '', '', 1),
(74, 'Дипломы', 'items', 'diplomy', 47, 'img', '', '', '', '', 39),
(75, 'Задачи', 'items', 'tasks', 48, 'name', '', '', '', '', 40),
(76, 'Фильтр', 'items', 'filtr', 49, 'name', 'filtr_id', '', '', '', 41),
(77, 'Категории', 'cats', 'filtr_cats', 49, 'name', '', '', '', '', 42),
(78, 'Фото работ', 'items', 'portfolio', 50, 'img', 'filtr_id', '', '', '', 43),
(79, 'Услуги', 'items', 'price', 51, 'name', 'cat_id', '', '', '', 44),
(80, 'Разделы', 'cats', 'price_cats', 51, 'name,page_id', '', '', '', '', 45),
(81, 'Вопросы-ответы', 'items', 'faq', 52, 'question', '', '', '', '', 46),
(83, 'Меню', 'items', 'menu', 58, 'name', 'position', '', '', '', 47),
(86, 'Статьи', 'Items', 'articles', 61, 'title,text', '', '', '', '', 50);

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
(8, 'Страницы', 'pages', '<i class=\"fa fa-file-o fa-fw\" aria-hidden=\"true\"></i>', 0, '', '', 4),
(29, 'Контакты', 'kontakty', '<i class=\"fa fa-info-circle\" aria-hidden=\"true\"></i>', 1, 'contacts_settings', '', 5),
(51, 'Прайс', 'price', '<i class=\"fa fa-money\" aria-hidden=\"true\"></i>', 0, '', '', 12),
(57, 'О компании', 'footer', '<i class=\"fa fa-info-circle\" aria-hidden=\"true\"></i>', 1, 'footer', '', 7),
(58, 'Меню', 'menu', '<i class=\"fa fa-compass fa-fw\" aria-hidden=\"true\"></i>', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Заголовок',
  `text` longtext CHARACTER SET utf8 NOT NULL COMMENT 'текст',
  `img` tinytext NOT NULL COMMENT 'Изображение',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `text`, `img`, `on_moderate`, `ordering`) VALUES
(1, 'Дерево высохло', '<p>Дерево имеет недостаток или избыток влаги &ndash;древесина гниет. Ствол становится хрупким&nbsp;<br />\r\nи в любой момент может упасть. В подобных случаях рекомендуется спил дерева полностью или частями в зависимости от ситуации.</p>\r\n', '/public/img/otzyvy/86479.jpg', 0, 1),
(4, 'Поваленное \r\nили поврежденное грозой \r\nдерево', '<p>Раздвоенный ствол, сильный наклон по отношению к земле, наличие тяжелых ветвей, трещины и частичное повреждение коры или корневой системы. Работа начинается с проведения диагностики степени повреждения и оценки возможности сохранения дерева на участке.</p>\r\n', '/public/img/otzyvy/277562.jpg', 0, 5),
(5, 'Опасное или неудобное \r\nрасположение', '<p>Из небольшого саженца через несколько лет вырастает высокое дерево. Его крона начинает затенять окно, задевать электрические провода, мешать уборке снега, разрушается целостность почвы вблизи строений. Такое дерево считается опысным и подлежит удалению.</p>\r\n', '/public/img/otzyvy/693427.jpg', 0, 4),
(7, 'Присутствуют дефекты', '<p>Раздвоенный ствол, сильный наклон по отношению к земле, наличие тяжелых ветвей, трещины и частичное повреждение коры или корневой системы. Работа начинается с проведения диагностики степени повреждения и оценки возможности сохранения дерева на участке.</p>\r\n', '/public/img/otzyvy/707902.jpg', 0, 2),
(8, 'Болезнь дерева', '<p>Даже небольшая травма ствола приводит к заболеванию дерева. Срезанная или надломленная ветром часть является излюбленным местом для паразитов. На первоначальной стадии болезнь можно победить, но при сильном повреждении может потребоваться удаление.</p>\r\n', '/public/img/otzyvy/708127.jpg', 0, 3),
(10, 'Очистка территории', '<p>Строительство дома на участке требует открытого пространства. Для расчистки заросших территорий необходимо избавиться от деревьев основательно: спилить ствол и устранить пень. Иногда приходится прибегнуть к помощи экскаватора.</p>\r\n', '/public/img/otzyvy/620976.jpg', 0, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `uslugi`
--

CREATE TABLE `uslugi` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование(sys_name)',
  `seo_dubl` tinyint(1) NOT NULL COMMENT 'Дубль',
  `descr` longtext NOT NULL COMMENT 'Описание',
  `price` varchar(250) NOT NULL COMMENT 'Стоимость',
  `dlit` varchar(250) NOT NULL COMMENT 'Продолжительность процедуры',
  `img` tinytext NOT NULL COMMENT 'Иконка',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `sys_name` varchar(250) NOT NULL COMMENT 'Ссылка',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `uslugi`
--

INSERT INTO `uslugi` (`id`, `name`, `seo_dubl`, `descr`, `price`, `dlit`, `img`, `on_moderate`, `sys_name`, `ordering`) VALUES
(5, 'Удаление деревьев', 0, '<h1>Расчистка участков, удаление деревьев и пней любой сложности в Москве и МО</h1>\r\n', '2 900', '', '/public/img/uslugi/815141.jpg', 0, 'udalenie-derevev', 1),
(38, 'Спил деревьев', 1, '<h1>Спил деревьев</h1>', '', '', '', 0, 'spil-derevev', 4),
(39, 'Валка деревьев', 1, '', '', '', '', 0, 'valka-derevev', 2),
(40, 'Вырубка деревьев', 1, '', '', '', '', 0, 'vyrubka-derevev', 3),
(37, 'Удаление пней', 0, '', '3500', '', '/public/img/uslugi/240938.jpg', 0, 'udalenie-pney', 6),
(41, 'Кронирование деревьев', 0, '', '', '', '', 0, 'kronirovanie-derevev', 5),
(42, 'Корчевание (корчевка) пней', 1, '', '', '', '', 0, 'korchevanie-korchevka-pney', 7),
(43, 'Расчистка участка', 0, '', '', '', '', 0, 'raschistka-uchastka', 8),
(44, 'Обрабокта от короеда', 0, '', '', '', '', 0, 'obrabokta-ot-koroeda', 9),
(45, 'Вывоз мусора', 0, '', '', '', '', 0, 'vyvoz-musora', 10),
(46, 'Вырубка кустарников', 0, '', '', '', '', 0, 'vyrubka-kustarnikov', 11),
(47, 'Лечение деревьев', 0, '', '', '', '', 0, 'lechenie-derevev', 12),
(48, 'Укрепление деревьев', 0, '', '', '', '', 0, 'ukreplenie-derevev', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `uslugi_cats`
--

CREATE TABLE `uslugi_cats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Наименование(sys_name)',
  `descr` longtext NOT NULL COMMENT 'Описание',
  `price` varchar(250) NOT NULL COMMENT 'Стоимость',
  `dlit` varchar(250) NOT NULL COMMENT 'Продолжительность процедуры',
  `img` tinytext NOT NULL COMMENT 'Иконка',
  `on_moderate` tinyint(1) NOT NULL COMMENT 'Скрыть?',
  `sys_name` varchar(250) NOT NULL COMMENT 'Ссылка',
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `uslugi_cats`
--

INSERT INTO `uslugi_cats` (`id`, `name`, `descr`, `price`, `dlit`, `img`, `on_moderate`, `sys_name`, `ordering`) VALUES
(1, 'Удаление деревьев', '', 'от 3000', '', '/public/img/uslugi/320017.jpg', 0, 'udalenie-derevev', 1),
(7, 'Удаление пней', '', '', '', '/public/img/uslugi/181092.jpg', 0, 'udalenie-pney', 3),
(8, 'Кронирование деревьев', '', '', '', '/public/img/uslugi/659706.jpg', 0, 'kronirovanie-derevev', 2),
(9, 'Расчистка участка', '', '', '', '/public/img/uslugi/478517.jpg', 0, 'raschistka-uchastka', 4),
(10, 'Обработка от короеда', '', '', '', '/public/img/uslugi/301193.jpg', 0, 'obrabotka-ot-koroeda', 5),
(11, 'Вывоз мусора', '', '', '', '/public/img/uslugi/823209.jpg', 0, 'vyvoz-musora', 6),
(12, 'Вырубка кустарников', '', '', '', '/public/img/uslugi/606850.jpg', 0, 'vyrubka-kustarnikov', 7),
(13, 'Лечение деревьев', '', '', '', '/public/img/uslugi/665465.jpg', 0, 'lechenie-derevev', 8),
(14, 'Укрепление деревьев', '', '', '', '/public/img/uslugi/999131.jpg', 0, 'ukreplenie-derevev', 9);

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
-- Индексы таблицы `advantages`
--
ALTER TABLE `advantages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `callback`
--
ALTER TABLE `callback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts_settings`
--
ALTER TABLE `contacts_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `otzyv_img`
--
ALTER TABLE `otzyv_img`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `preview`
--
ALTER TABLE `preview`
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
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `uslugi_cats`
--
ALTER TABLE `uslugi_cats`
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
-- AUTO_INCREMENT для таблицы `advantages`
--
ALTER TABLE `advantages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `callback`
--
ALTER TABLE `callback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `contacts_settings`
--
ALTER TABLE `contacts_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT для таблицы `relation`
--
ALTER TABLE `relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `s_modes`
--
ALTER TABLE `s_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT для таблицы `s_modules`
--
ALTER TABLE `s_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `uslugi_cats`
--
ALTER TABLE `uslugi_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
