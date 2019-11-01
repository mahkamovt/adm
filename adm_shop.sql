-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 30 2019 г., 11:21
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `adm_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '18', 1550476436),
('admin', '22', 1553851468),
('content manager', '17', 1550476429),
('content manager', '22', 1552556809),
('content manager', '40', 1553850703),
('News-мейкер', '41', 1553852871),
('Poster', '41', 1553852867),
('User', '16', 1550476412),
('User', '22', 1552556810),
('User', '40', 1553850703),
('User', '41', 1553852869),
('Главный администратор', '22', 1553851473),
('Контент менеджер', '22', 1552556813),
('Контент менеджер', '40', 1553850706),
('Обычный пользователь', '22', 1553851473),
('Обычный пользователь', '40', 1553850706);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/admin/*', 2, NULL, NULL, NULL, 1549633164, 1549633164),
('/admin/ordershop/*', 2, NULL, NULL, NULL, 1550575316, 1550575316),
('/admin/product/*', 2, NULL, NULL, NULL, 1550575270, 1550575270),
('/post/*', 2, NULL, NULL, NULL, 1550498030, 1550498030),
('/rbac/*', 2, NULL, NULL, NULL, 1549633226, 1549633226),
('admin', 1, 'Имеет полный доступ ко всему', NULL, NULL, 1550476359, 1550476359),
('content manager', 1, 'Управляет заказами и наполнением сайта', NULL, NULL, 1550476300, 1550498104),
('News-мейкер', 2, 'Может выкладывать новости на сайте', NULL, NULL, 1553852768, 1553852768),
('Poster', 1, NULL, NULL, NULL, 1553852807, 1553852807),
('User', 1, 'Может просматривать сайт', NULL, NULL, 1550476236, 1550498095),
('Главный администратор', 2, 'Управляет пользователями и админ панелью сайта', NULL, NULL, 1550476025, 1550498071),
('Контент менеджер', 2, 'Управляет заказами и новостями на сайте', NULL, NULL, 1550476082, 1553852737),
('Обычный пользователь', 2, 'Обычный просмотр контента сайта', NULL, NULL, 1550475881, 1550498038);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('News-мейкер', '/admin/*'),
('Poster', '/admin/*'),
('Главный администратор', '/admin/*'),
('Контент менеджер', '/admin/*'),
('Главный администратор', '/admin/ordershop/*'),
('Главный администратор', '/admin/product/*'),
('News-мейкер', '/post/*'),
('Poster', '/post/*'),
('Главный администратор', '/post/*'),
('Контент менеджер', '/post/*'),
('Обычный пользователь', '/post/*'),
('Главный администратор', '/rbac/*'),
('admin', 'content manager'),
('Poster', 'News-мейкер'),
('content manager', 'User'),
('admin', 'Главный администратор'),
('content manager', 'Контент менеджер'),
('Poster', 'Обычный пользователь'),
('User', 'Обычный пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `keywords`, `description`) VALUES
(17, 0, 'ADM', 'ADM, одежда, стиль', 'ADM, одежда, стиль'),
(18, 17, 'Футболки', 'ADM, одежда, стиль', 'Спортивная одежда - стиль, который подходит для всех'),
(19, 17, 'Свитшоты', 'ADM, одежда, стиль', 'Спортивная одежда'),
(20, 17, 'Штаны', 'ADM, одежда, стиль', 'Спортивная одежда - стиль, который подходит для всех'),
(21, 0, 'Рюкзаки', 'ADM, одежда, стиль', 'ADM, одежда, стиль'),
(22, 0, 'Спортивная одежда', 'ADM, одежда, стиль', 'Спортивная одежда - стиль, который подходит для всех'),
(23, 17, 'Аксессуары', 'аксессуары', 'аксессуары');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(4, 'Products/Product12/f8e2e5.jpg', 12, 0, 'Product', 'cd68019af4-3', ''),
(5, 'Products/Product12/08289c.jpg', 12, 0, 'Product', '9c757c0a66-4', ''),
(6, 'Products/Product13/20e0ed.jpg', 13, 0, 'Product', '0b9d4c7c75-3', ''),
(7, 'Products/Product1/a76c9f.jpg', 1, 0, 'Product', 'd9bf39e7ce-3', ''),
(8, 'Products/Product1/56dfec.jpg', 1, 0, 'Product', 'e3c6e36216-4', ''),
(9, 'Products/Product1/866f33.jpg', 1, 0, 'Product', '6cbdca7836-5', ''),
(10, 'Products/Product1/c9e05a.jpg', 1, 0, 'Product', '153672a738-6', ''),
(11, 'Products/Product1/5296dd.jpg', 1, 0, 'Product', 'b4aa286b4e-2', ''),
(12, 'Products/Product13/020949.jpg', 13, 0, 'Product', '733869da47-4', ''),
(13, 'Products/Product13/584e5d.jpg', 13, 0, 'Product', '560cd1c8f3-5', ''),
(14, 'Products/Product13/e2b77a.jpg', 13, 0, 'Product', '8c237d7b2c-6', ''),
(15, 'Products/Product13/dc9341.jpg', 13, 0, 'Product', 'b0a063b183-7', ''),
(16, 'Products/Product13/65c0c9.jpg', 13, 0, 'Product', '38e61a547b-2', ''),
(17, 'Products/Product12/5545e8.jpg', 12, 0, 'Product', '5af796c651-2', ''),
(18, 'Products/Product12/16af20.jpg', 12, 0, 'Product', '84ec2625e0-5', ''),
(19, 'Products/Product12/8c8776.jpg', 12, 0, 'Product', 'bc24383ce6-6', ''),
(20, 'Products/Product12/f2431d.jpg', 12, 0, 'Product', '1d044c944c-7', ''),
(21, 'Products/Product12/3561d3.jpg', 12, 0, 'Product', '22cec99b44-8', ''),
(22, 'Products/Product12/2c87a4.jpg', 12, 0, 'Product', '894f4fb580-9', ''),
(23, 'Products/Product12/a468cd.jpg', 12, 0, 'Product', '756d8be838-10', ''),
(24, 'Products/Product15/909ede.png', 15, 1, 'Product', '3f4d5be1a0-1', ''),
(25, 'Products/Product1/b634d6.jpg', 1, 1, 'Product', '11874f723d-1', ''),
(26, 'Products/Product1/d9e37f.jpg', 1, NULL, 'Product', '5d89d826bb-7', ''),
(27, 'Products/Product12/5153bf.jpg', 12, 1, 'Product', '434c743717-1', ''),
(28, 'Products/Product12/57ac52.jpg', 12, NULL, 'Product', '57d32ed6ea-11', ''),
(29, 'Products/Product13/b77b08.jpg', 13, 1, 'Product', 'a3d912790a-1', ''),
(30, 'Products/Product14/18698a.jpg', 14, 1, 'Product', 'e8ad3c2c2e-1', ''),
(31, 'Products/Product16/91205e.jpg', 16, 1, 'Product', 'c563e0bc74-1', ''),
(32, 'Products/Product17/5276ce.jpg', 17, 0, 'Product', '1260c1640a-3', ''),
(33, 'Products/Product17/ae2e9c.jpg', 17, 0, 'Product', 'd9c86ef427-2', ''),
(34, 'Products/Product17/919a1a.jpg', 17, 1, 'Product', 'e84d684e8f-1', ''),
(35, 'Products/Product18/b015f6.jpg', 18, 0, 'Product', 'be87eb8d80-3', ''),
(36, 'Products/Product18/5a7553.jpg', 18, 0, 'Product', 'f954f7dd9b-4', ''),
(37, 'Products/Product18/3c51aa.jpg', 18, 0, 'Product', '1151290c6c-2', ''),
(38, 'Products/Product18/ec9281.jpg', 18, 0, 'Product', 'bff051f7c0-5', ''),
(39, 'Products/Product18/596005.jpg', 18, 0, 'Product', 'a3f465f92a-6', ''),
(40, 'Products/Product18/e60cc3.jpg', 18, 1, 'Product', '87febf7572-1', ''),
(41, 'Products/Product18/0fa9db.jpg', 18, NULL, 'Product', '4188f22f80-7', ''),
(42, 'Products/Product18/82441b.jpg', 18, NULL, 'Product', 'eb4b4bc1ec-8', ''),
(43, 'Products/Product18/e3b76d.jpg', 18, NULL, 'Product', '341c213d35-9', ''),
(44, 'Products/Product18/0b343a.jpg', 18, NULL, 'Product', '1e4f581276-10', ''),
(45, 'Products/Product19/4045b0.jpg', 19, 1, 'Product', 'c9b4ad8641-1', ''),
(46, 'Products/Product19/b025ee.jpg', 19, NULL, 'Product', 'ff49847494-2', ''),
(47, 'Products/Product20/3c5186.png', 20, 0, 'Product', 'e350d700e2-2', ''),
(48, 'Products/Product20/a93f29.png', 20, 1, 'Product', '77fd4b4eb7-1', ''),
(49, 'Products/Product21/39c835.jpg', 21, 1, 'Product', '41a19da5ab-1', ''),
(50, 'Products/Product22/fecb1c.jpg', 22, 0, 'Product', '7d29f439d9-3', ''),
(51, 'Products/Product23/da4b1d.jpg', 23, 0, 'Product', '6e39b1ec61-3', ''),
(52, 'Products/Product24/6a528b.jpg', 24, 0, 'Product', 'dc5f475370-3', ''),
(53, 'Products/Product24/c58c64.png', 24, 0, 'Product', '3f476a9387-2', ''),
(54, 'Products/Product24/b4ac12.png', 24, 0, 'Product', '0a9646664c-4', ''),
(55, 'Products/Product24/ff69b4.png', 24, 0, 'Product', '9638ecfe71-5', ''),
(56, 'Products/Product24/72b2a7.jpg', 24, 1, 'Product', '54ea624731-1', ''),
(57, 'Products/Product24/e8c9e8.jpg', 24, NULL, 'Product', '987f28e99c-6', ''),
(58, 'Products/Product25/9f51ab.png', 25, 0, 'Product', '24372b5eb3-3', ''),
(59, 'Products/Product25/7df802.png', 25, 0, 'Product', '3778114651-4', ''),
(60, 'Products/Product25/0fbe9d.jpg', 25, 0, 'Product', 'a3bd24af88-5', ''),
(61, 'Products/Product25/a66a4d.jpg', 25, 0, 'Product', '9becfe295a-6', ''),
(62, 'Products/Product23/5c49ee.png', 23, 0, 'Product', '7a0e7f659a-2', ''),
(63, 'Products/Product23/37b2fb.jpg', 23, 1, 'Product', 'adc83ba5dc-1', ''),
(64, 'Products/Product26/69db97.jpg', 26, 0, 'Product', '6642133876-3', ''),
(65, 'Products/Product22/c325a0.jpg', 22, 0, 'Product', '25d45b2bab-4', ''),
(66, 'Products/Product22/332289.jpg', 22, 0, 'Product', '735e59f020-5', ''),
(67, 'Products/Product22/74f155.jpg', 22, 0, 'Product', 'c1d5a86ff2-6', ''),
(68, 'Products/Product27/8cde3c.jpg', 27, 0, 'Product', 'cb7319c5cd-2', ''),
(69, 'Products/Product27/213f33.jpg', 27, 0, 'Product', 'e3c63fcf63-3', ''),
(70, 'Products/Product27/d19868.jpg', 27, 0, 'Product', 'c78844d07e-4', ''),
(71, 'Products/Product27/1de8e7.jpg', 27, 0, 'Product', 'e3959c5882-5', ''),
(72, 'Products/Product27/37db75.jpg', 27, 0, 'Product', '91c63a29d0-6', ''),
(73, 'Products/Product28/da202f.jpg', 28, 0, 'Product', '87b391a451-2', ''),
(74, 'Products/Product28/d6632c.jpg', 28, 0, 'Product', '4addb53f59-3', ''),
(75, 'Products/Product28/5bbcd0.jpg', 28, 0, 'Product', 'cb9a0cde1b-4', ''),
(76, 'Products/Product28/bbfa5e.jpg', 28, 0, 'Product', '450c8d1f59-5', ''),
(77, 'Products/Product29/9634d7.jpg', 29, 0, 'Product', '08baf95ef5-3', ''),
(78, 'Products/Product29/694d11.jpg', 29, 0, 'Product', 'f49e06535a-4', ''),
(79, 'Products/Product29/25eb8b.jpg', 29, 0, 'Product', '45ea874b0c-5', ''),
(80, 'Products/Product26/731e4b.jpg', 26, 0, 'Product', '871a0fb76a-4', ''),
(81, 'Products/Product26/32a323.jpg', 26, 0, 'Product', '767225b09d-5', ''),
(82, 'Products/Product26/e5ec55.jpg', 26, 0, 'Product', '46e51ed0c8-6', ''),
(83, 'Products/Product26/09dd09.jpg', 26, 0, 'Product', '0aca338ff6-7', ''),
(84, 'Products/Product26/a9e342.jpg', 26, 0, 'Product', '2743768a2d-8', ''),
(85, 'Products/Product26/8fcb82.jpg', 26, 0, 'Product', '35990df5d6-9', ''),
(86, 'Products/Product30/88ccec.jpg', 30, 0, 'Product', '87806bd392-3', ''),
(87, 'Products/Product31/58ca9c.jpg', 31, 0, 'Product', 'c31d21ba53-2', ''),
(88, 'Products/Product32/f68fa5.jpg', 32, 0, 'Product', '8977b77ec4-2', ''),
(89, 'Products/Product26/e91925.jpg', 26, 0, 'Product', '0bda977afd-2', ''),
(90, 'Products/Product26/03d559.jpg', 26, 1, 'Product', '581677bd62-1', ''),
(91, 'Products/Product33/2df575.jpg', 33, 1, 'Product', 'e5cf3b5409-1', ''),
(92, 'Products/Product34/032990.jpg', 34, 0, 'Product', '35bca72914-2', ''),
(93, 'Products/Product34/0e9355.jpg', 34, 0, 'Product', '7c4cdb8989-3', ''),
(94, 'Products/Product34/8033c2.jpg', 34, 0, 'Product', 'f6a93a6a2d-4', ''),
(95, 'Products/Product35/3093a9.jpg', 35, 0, 'Product', '92c045deef-3', ''),
(96, 'Products/Product35/6f5573.jpg', 35, 0, 'Product', '5282a4e0e6-4', ''),
(97, 'Products/Product35/ef9920.jpg', 35, 0, 'Product', 'b7b494d238-5', ''),
(98, 'Products/Product35/537079.png', 35, 0, 'Product', '792fbb84d4-6', ''),
(99, 'Products/Product36/650e4e.png', 36, 1, 'Product', '488790c48d-1', ''),
(100, 'Products/Product36/4253a6.png', 36, NULL, 'Product', 'a151498b33-2', ''),
(101, 'Products/Product22/f06a6f.png', 22, 0, 'Product', '9af125c94c-2', ''),
(102, 'Products/Product22/6e7f54.png', 22, 0, 'Product', '8bf6f21e87-7', ''),
(103, 'Products/Product22/12f1c3.png', 22, 0, 'Product', '9f24be0fc1-8', ''),
(104, 'Products/Product35/433124.png', 35, 0, 'Product', 'f417c2c885-2', ''),
(105, 'Products/Product35/a4d840.png', 35, 0, 'Product', '4a018d68aa-7', ''),
(106, 'Products/Product35/f00488.png', 35, 0, 'Product', '46500c64d0-8', ''),
(107, 'Products/Product35/5ed42e.png', 35, 0, 'Product', 'b0bbd33bb5-9', ''),
(108, 'Products/Product31/1bd657.png', 31, 1, 'Product', 'efc574ddf3-1', ''),
(109, 'Products/Product22/7f3dc3.png', 22, 1, 'Product', 'd8d9a90453-1', ''),
(110, 'Products/Product29/9850b2.png', 29, 0, 'Product', '628118b0ed-6', ''),
(111, 'Products/Product29/7b0092.png', 29, 0, 'Product', '6a62c0b39c-2', ''),
(112, 'Products/Product29/5270c7.png', 29, 1, 'Product', '14f427a89d-1', ''),
(113, 'Products/Product34/0a8ea5.png', 34, 1, 'Product', '51a09624d0-1', ''),
(114, 'Products/Product34/868662.png', 34, NULL, 'Product', '8906da5c3d-5', ''),
(115, 'Products/Product34/3db466.png', 34, NULL, 'Product', '0cd9ecdf84-6', ''),
(116, 'Products/Product34/bfdf3e.png', 34, NULL, 'Product', '7690428e75-7', ''),
(117, 'Products/Product34/f10d92.png', 34, NULL, 'Product', '9d9b94b8ff-8', ''),
(118, 'Products/Product28/ffc909.png', 28, 1, 'Product', '7154976519-1', ''),
(119, 'Products/Product35/4e3c31.png', 35, 1, 'Product', '072777ddde-1', ''),
(120, 'Products/Product25/e53b84.jpg', 25, 0, 'Product', '1b06a3325a-2', ''),
(121, 'Products/Product25/112d93.png', 25, 0, 'Product', 'ed571e500c-7', ''),
(122, 'Products/Product25/3c5404.jpg', 25, 0, 'Product', '4b9016446c-8', ''),
(123, 'Products/Product25/7fe39f.png', 25, 1, 'Product', 'c49f31e4f6-1', ''),
(124, 'Products/Product30/398c75.png', 30, 0, 'Product', '8c5809e777-2', ''),
(125, 'Products/Product30/8a84e8.png', 30, 1, 'Product', 'dcd2c85d29-1', ''),
(126, 'Products/Product27/292c53.png', 27, 1, 'Product', '16bc64328e-1', ''),
(127, 'Products/Product32/41c1ab.png', 32, 1, 'Product', 'ca4b15c294-1', '');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1548234964),
('m140506_102106_rbac_init', 1549628917),
('m140602_111327_create_menu_table', 1549628906),
('m140622_111540_create_image_table', 1548235100),
('m140622_111545_add_name_to_image_table', 1548235101),
('m160312_050000_create_user', 1549628906),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1549628917),
('m180523_151638_rbac_updates_indexes_without_prefix', 1549628917);

-- --------------------------------------------------------

--
-- Структура таблицы `ordershop`
--

CREATE TABLE `ordershop` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` int(10) NOT NULL,
  `sum` float DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `text` text,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ordershop`
--

INSERT INTO `ordershop` (`id`, `created_at`, `updated_at`, `qty`, `sum`, `status`, `name`, `email`, `phone`, `address`, `text`, `user_id`) VALUES
(65, '2019-02-27 11:42:16', '2019-02-27 11:42:16', 5, 15859, '1', 'Тимур', 'mahkamovt@icloud.com', '899955533321', 'Тула, Ул Маргелова 5б', '444', 22),
(66, '2019-02-27 15:53:44', '2019-02-27 15:53:44', 1, 3690, '0', 'Арсен ', 'arsen@arsen.ru', '89113203434', 'Тула, Ул Маргелова 5б2', 'wewe', 22),
(67, '2019-02-27 15:54:05', '2019-02-27 15:54:05', 1, 3690, '0', 'Иван', 'arsen@arsen.ru', '899955533321', 'Ул. Ивана Бунина 1', '232', 22),
(68, '2019-03-01 14:28:41', '2019-03-01 14:28:41', 1, 1099, '1', 'Ольга Лимина', 'lamalamulama@gmail.com', '79156923163', 'Тула, улица Пушкина, дом колотушкина', 'Клевый сайт спасибо ', NULL),
(69, '2019-03-01 14:34:18', '2019-03-01 14:34:18', 1, 3690, '0', 'test', 'test@test.df', 'test', 'test', 'test@test', 29),
(70, '2019-03-01 14:42:29', '2019-03-01 14:42:29', 3, 11070, '0', 'Ламка', 'arsen@arsen.ru', '89113203434', 'Тула, Ул Маргелова 5б2', 'СПАСИБА', 28),
(71, '2019-03-01 14:55:16', '2019-03-01 14:55:16', 1, 1099, '0', '1', '1', '1', '1', '1', 31),
(72, '2019-03-01 14:59:14', '2019-03-01 14:59:14', 1, 3690, '0', '1', '1', '89113203434', '1', '1', 28),
(73, '2019-03-01 15:01:42', '2019-03-01 15:01:42', 1, 1099, '0', 'Suka', 'suka@sduk.com', '123413493140', 'sddqwe zsd adjdj', 'hi', 31),
(74, '2019-03-01 15:10:19', '2019-03-01 15:10:19', 1, 1099, '0', '1', '1@c.com', 'dsad', 'dasdas', 'das', 31),
(75, '2019-03-03 21:56:07', '2019-03-03 21:56:07', 1, 1099, '0', 'Sasha', 'MAHKAMOVs@icloud.com', '79997838295', 'Djdnxjxn', 'Pidor', 32),
(76, '2019-03-13 08:59:31', '2019-03-13 08:59:31', 5, 21450, '0', 'Ламка', 'neji.n99@mail.ru', '89113203434', 'Тула, Ул Мармеладова 2', 'Пусть курьер напишет в СМС ко скольки привезет заказ.', 28),
(77, '2019-03-13 10:30:18', '2019-03-13 10:30:18', 1, 1099, '0', 'Тимур', 'nk18091997@gmail.com', '89109407844', 'Ул. Маргелова 5б', 'Хочу все с сайта, только чтоб денег не брали', NULL),
(78, '2019-03-13 10:44:29', '2019-03-13 10:44:29', 1, 4690, '0', 'Настя', 'nk18091997@gmail.com', '89109407844', 'Ул. Болотова 68а', 'Написано new,  это правда?', NULL),
(79, '2019-03-13 10:49:38', '2019-03-13 10:49:38', 1, 4690, '0', 'Тимур Махкамов', 'Mahkamovt@icloud.com', '89207538705', 'ЗМР', 'What time would you want us in touch ', 35),
(80, '2019-03-13 10:53:34', '2019-03-13 10:53:34', 1, 4690, '0', 'Настя', 'nk18091997@gmail.com', '89109407844', 'Ул. Болотова 68а', '1 штука', 34),
(81, '2019-03-28 11:09:54', '2019-03-28 11:09:54', 1, 1099, '0', 'Тимур', 'neji.n99@mail.ru', '+7 (999)-999-9999', 'ул святой мамаши д 8', '123213', 28),
(82, '2019-03-28 11:12:20', '2019-03-28 11:12:20', 3, 10479, '0', 'Тимур', 'mahkamovt@icloud.com', '+7 (920)-753-8705', 'Тула, Ул Маргелова 5б', 'qwew', 28),
(83, '2019-04-11 15:44:13', '2019-04-11 15:44:13', 2, 9380, '0', 'Тимур', 'arsen@arsen.ru', '+7 (999)-999-99-99', 'Тула, Ул Маргелова 5б', 'rtrt', 22);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(400) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `qty_item` int(11) NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `img`, `size`, `price`, `qty_item`, `sum_item`) VALUES
(26, 16, 6, 'adiki', '', NULL, 199, 10, 1990),
(27, 17, 3, 'Shirt', '', NULL, 199, 8, 1592),
(28, 18, 3, 'Shirt', '', NULL, 199, 1, 199),
(29, 19, 2, 'Shorty', '', NULL, 199, 11, 2189),
(30, 19, 3, 'Shirt', '', NULL, 199, 112, 22288),
(31, 20, 3, 'Shirt', '', NULL, 199, 1, 199),
(32, 21, 3, 'Shirt', '', NULL, 199, 111, 22089),
(33, 22, 6, 'adiki', '', NULL, 199, 1, 199),
(34, 23, 6, 'adiki', '', NULL, 199, 12, 2388),
(35, 24, 3, 'Shirt', '', NULL, 199, 88, 17512),
(36, 25, 4, 'Shoes', '', NULL, 199, 1, 199),
(37, 26, 7, 'adiki', '', NULL, 199, 567, 112833),
(38, 27, 3, 'Shirt', '', NULL, 199, 1, 199),
(39, 27, 6, 'adiki', '', NULL, 199, 1, 199),
(40, 27, 7, 'adiki', '', NULL, 199, 5, 995),
(41, 28, 1, 'Футболка PANT LOGO TAPE', '', NULL, 3690, 3, 11070),
(42, 29, 21, 'Майка Nike', '', NULL, 3690, 1, 3690),
(43, 29, 22, 'Олимпийка Sportswear Gym Vintage', '', NULL, 3690, 2, 7380),
(44, 30, 21, 'Майка Nike', '', NULL, 3690, 1, 3690),
(45, 41, 22, 'Олимпийка Sportswear Gym Vintage', '', NULL, 3690, 1, 3690),
(46, 43, 22, 'Олимпийка Sportswear Gym Vintage', '', 'XL', 3690, 2, 7380),
(47, 44, 21, 'Майка Nike', '', 'XL', 3690, 7, 25830),
(48, 44, 23, 'Sportswear Gym Vintage', '', 'XL', 4690, 7, 32830),
(49, 44, 22, 'Олимпийка Sportswear Gym Vintage', '', 'M', 3690, 3, 11070),
(50, 45, 26, 'Футболка ADM', '', 'S', 1099, 1, 1099),
(51, 46, 25, 'Брюки спортивные PANT LOGO TAPE', '', 'S', 3690, 1, 3690),
(52, 46, 26, 'Футболка ADM', '', 'XL', 1099, 3, 3297),
(53, 47, 26, 'Футболка ADM', '', 'S', 1099, 1, 1099),
(54, 48, 26, 'Футболка ADM', '', 'S', 1099, 1, 1099),
(55, 49, 26, 'Футболка ADM', '', 'S', 1099, 1, 1099),
(56, 50, 22, 'Олимпийка Sportswear Gym Vintage', '', 'S', 3690, 1, 3690),
(57, 51, 22, 'Олимпийка Sportswear Gym Vintage', '', 'S', 3690, 1, 3690),
(58, 51, 25, 'Брюки спортивные PANT LOGO TAPE', '', 'S', 3690, 1, 3690),
(59, 52, 25, 'Брюки спортивные PANT LOGO TAPE', '', 'S', 3690, 1, 3690),
(60, 52, 22, 'Олимпийка Sportswear Gym Vintage', '', 'S', 3690, 1, 3690),
(61, 53, 26, 'Футболка ADM', '', 'S', 1099, 1, 1099),
(62, 54, 26, 'Футболка ADM', '', 'S', 1099, 1, 1099),
(63, 55, 26, 'Футболка ADM', '', 'S', 1099, 1, 1099),
(64, 56, 22, 'Олимпийка Sportswear Gym Vintage', '', 'S', 3690, 2, 7380),
(65, 57, 26, 'Футболка ADM', '', 'S', 1099, 1, 1099),
(66, 58, 26, 'Футболка ADM', '', 'S', 1099, 5, 5495),
(67, 59, 22, 'Олимпийка Sportswear Gym Vintage', '', 'S', 3690, 4, 14760),
(68, 60, 26, 'Футболка ADM', '', 'S', 1099, 1, 1099),
(69, 60, 25, 'Брюки спортивные PANT LOGO TAPE', '', 'S', 3690, 1, 3690),
(70, 61, 25, 'Брюки спортивные PANT LOGO TAPE', '', 'S', 3690, 1, 3690),
(71, 61, 22, 'Олимпийка Sportswear Gym Vintage', '', 'S', 3690, 7, 25830),
(72, 61, 26, 'Футболка ADM', '', 'S', 1099, 2, 2198),
(73, 62, 25, 'Брюки спортивные PANT LOGO TAPE', '', 'S', 3690, 3, 11070),
(74, 62, 26, 'Футболка ADM', '', 'S', 1099, 4, 4396),
(75, 62, 22, 'Олимпийка Sportswear Gym Vintage', '', 'S', 3690, 4, 14760),
(76, 63, 26, 'Футболка ADM', '/yii2images/images/image-by-item-and-alias?item=Product26&dirtyAlias=0273bb7d20-1_x50.jpg', 'S', 1099, 1, 1099),
(77, 64, 26, 'Футболка ADM', '/yii2images/images/image-by-item-and-alias?item=Product26&dirtyAlias=0273bb7d20-1_x50.jpg', 'S', 1099, 1, 1099),
(78, 65, 26, 'Футболка ADM', '/yii2images/images/image-by-item-and-alias?item=Product26&dirtyAlias=0273bb7d20-1_x200.jpg', 'S', 1099, 1, 1099),
(79, 65, 22, 'Олимпийка Sportswear Gym Vintage', '/yii2images/images/image-by-item-and-alias?item=Product22&dirtyAlias=25df6659f9-1_x200.jpg', 'S', 3690, 1, 3690),
(80, 65, 25, 'Брюки спортивные PANT LOGO TAPE', '/yii2images/images/image-by-item-and-alias?item=Product25&dirtyAlias=92e1d67697-1_x200.png', 'S', 3690, 3, 11070),
(81, 66, 25, 'Брюки спортивные PANT LOGO TAPE', '/yii2images/images/image-by-item-and-alias?item=Product25&dirtyAlias=92e1d67697-1.png', 'S', 3690, 1, 3690),
(82, 67, 25, 'Брюки спортивные PANT LOGO TAPE', '/yii2images/images/image-by-item-and-alias?item=Product25&dirtyAlias=92e1d67697-1.png', 'S', 3690, 1, 3690),
(83, 68, 26, 'Футболка ADM', '/yii2images/images/image-by-item-and-alias?item=Product26&dirtyAlias=0273bb7d20-1.jpg', 'M', 1099, 1, 1099),
(84, 69, 22, 'Олимпийка Sportswear Gym Vintage', '/yii2images/images/image-by-item-and-alias?item=Product22&dirtyAlias=25df6659f9-1.jpg', 'S', 3690, 1, 3690),
(85, 70, 25, 'Брюки спортивные PANT LOGO TAPE', '/yii2images/images/image-by-item-and-alias?item=Product25&dirtyAlias=92e1d67697-1.png', 'XL', 3690, 3, 11070),
(86, 71, 26, 'Футболка ADM', '/yii2images/images/image-by-item-and-alias?item=Product26&dirtyAlias=0273bb7d20-1.jpg', 'S', 1099, 1, 1099),
(87, 72, 22, 'Олимпийка Sportswear Gym Vintage', '/yii2images/images/image-by-item-and-alias?item=Product22&dirtyAlias=25df6659f9-1.jpg', 'S', 3690, 1, 3690),
(88, 73, 26, 'Футболка ADM', '/yii2images/images/image-by-item-and-alias?item=Product26&dirtyAlias=0273bb7d20-1.jpg', 'S', 1099, 1, 1099),
(89, 74, 26, 'Футболка ADM', '/yii2images/images/image-by-item-and-alias?item=Product26&dirtyAlias=0273bb7d20-1.jpg', 'S', 1099, 1, 1099),
(90, 75, 26, 'Футболка ADM', '/yii2images/images/image-by-item-and-alias?item=Product26&dirtyAlias=0273bb7d20-1.jpg', 'S', 1099, 1, 1099),
(91, 76, 29, 'Олимпийка Sportswear Gym Vintage', '/yii2images/images/image-by-item-and-alias?item=Product29&dirtyAlias=2eb3bddece-1.jpg', 'S', 4690, 1, 4690),
(92, 76, 31, 'Футболка Saint 2', '/yii2images/images/image-by-item-and-alias?item=Product31&dirtyAlias=8aba0b4cc4-1.jpg', 'S', 4690, 1, 4690),
(93, 76, 27, 'Футболка PANT LOGO TAPE', '/yii2images/images/image-by-item-and-alias?item=Product27&dirtyAlias=946857616d-1.jpg', 'M', 4690, 1, 4690),
(94, 76, 30, 'Футболка Saint', '/yii2images/images/image-by-item-and-alias?item=Product30&dirtyAlias=6bed765421-1.jpg', 'M', 3690, 1, 3690),
(95, 76, 32, 'Олимпийка Sportswear Gym Vintage', '/yii2images/images/image-by-item-and-alias?item=Product32&dirtyAlias=cddae2f7ca-1.jpg', 'S', 3690, 1, 3690),
(96, 77, 28, 'Платье Sportswear Gym Vintage', '/yii2images/images/image-by-item-and-alias?item=Product28&dirtyAlias=1c58dfbe48-1.jpg', 'S', 1099, 1, 1099),
(97, 78, 31, 'Футболка Saint 2', '/yii2images/images/image-by-item-and-alias?item=Product31&dirtyAlias=8aba0b4cc4-1.jpg', 'S', 4690, 1, 4690),
(98, 79, 31, 'Футболка Saint 2', '/yii2images/images/image-by-item-and-alias?item=Product31&dirtyAlias=8aba0b4cc4-1.jpg', 'S', 4690, 1, 4690),
(99, 80, 29, 'Олимпийка Sportswear Gym Vintage', '/yii2images/images/image-by-item-and-alias?item=Product29&dirtyAlias=2eb3bddece-1.jpg', 'XL', 4690, 1, 4690),
(100, 81, 28, 'Платье Sportswear Gym Vintage', '/yii2images/images/image-by-item-and-alias?item=Product28&dirtyAlias=1c58dfbe48-1.jpg', 'S', 1099, 1, 1099),
(101, 82, 28, 'Платье Sportswear Gym Vintage', '/yii2images/images/image-by-item-and-alias?item=Product28&dirtyAlias=1c58dfbe48-1.jpg', 'S', 1099, 1, 1099),
(102, 82, 34, 'Футболка ADM', '/yii2images/images/image-by-item-and-alias?item=Product34&dirtyAlias=487e81e975-1.jpg', 'S', 4690, 1, 4690),
(103, 82, 31, 'Футболка Saint 2', '/yii2images/images/image-by-item-and-alias?item=Product31&dirtyAlias=8aba0b4cc4-1.jpg', 'S', 4690, 1, 4690),
(104, 83, 31, 'Футболка Saint 2', '/yii2images/images/image-by-item-and-alias?item=Product31&dirtyAlias=8aba0b4cc4-1.jpg', 'S', 4690, 1, 4690),
(105, 83, 27, 'Футболка PANT LOGO TAPE', '/yii2images/images/image-by-item-and-alias?item=Product27&dirtyAlias=946857616d-1.jpg', 'S', 4690, 1, 4690);

-- --------------------------------------------------------

--
-- Структура таблицы `personal`
--

CREATE TABLE `personal` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `anons` text NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(9999) DEFAULT NULL,
  `banner` varchar(9999) DEFAULT NULL,
  `mainimage` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `title`, `anons`, `description`, `user_id`, `image`, `banner`, `mainimage`) VALUES
(8, 'Air Jordan 4 “Flight Nostalgia”: прыжок в ностальгию', 'Air Jordan 4 “Flight Nostalgia”: прыжок в ностальгию', '<p>Разрабатывая силуэт Air Jordan IV, Тинкер Хэтфилд стремился сделать его ещё более подходящим для плавных, ритмичных и&nbsp;грациозных манёвров&nbsp;<a href=\"https://brandshop.ru/news/?filter_tag=%D0%9C%D0%B0%D0%B9%D0%BA%D0%BB%20%D0%94%D0%B6%D0%BE%D1%80%D0%B4%D0%B0%D0%BD\" style=\"padding: 0px; margin: 0px; box-sizing: border-box; outline: none; color: rgb(0, 133, 192); transition: color 0.2s ease 0s; text-decoration-line: none; line-height: 28px; display: inline; cursor: pointer; background-image: linear-gradient(90deg, rgb(74, 175, 211) 0px, rgb(74, 175, 211)); background-repeat: repeat-x; background-size: 100% 1px; background-position: 0px 18px;\" target=\"_blank\">Майкла Джордана.</a>&nbsp;В&nbsp;результате по&nbsp;бокам и&nbsp;спереди появилась запоминающаяся сеточка, а&nbsp;на&nbsp;шнуровке&nbsp;&mdash; &laquo;крылья&raquo;, позволившие точнее фиксировать положение стопы.</p>\r\n<p>Расцветка под названием &laquo;Flight Nostalgia&raquo; никогда ранее не&nbsp;появлялась на&nbsp;моделях&nbsp;<a href=\"https://brandshop.ru/jordan/\" style=\"padding: 0px; margin: 0px; box-sizing: border-box; outline: none; color: rgb(0, 133, 192); transition: color 0.2s ease 0s; text-decoration-line: none; line-height: 28px; display: inline; cursor: pointer; background-image: linear-gradient(90deg, rgb(74, 175, 211) 0px, rgb(74, 175, 211)); background-repeat: repeat-x; background-size: 100% 1px; background-position: 0px 18px;\" target=\"_blank\">Air&nbsp;Jordan</a>. При этом её&nbsp;палитра чрезвычайно схожа с&nbsp;оригинальными моделями 1989 года&nbsp;&mdash; в&nbsp;частности с&nbsp;AJ&nbsp;IV &laquo;Fire Red&raquo;, в&nbsp;которой играл Майкл Джордан. Ностальгический образ формируется благодаря основанию из&nbsp;белой кожи, чёрным деталям и&nbsp;акцентам фирменного красного оттенка &laquo;Bright&nbsp;Crimson&raquo;.</p>\r\n', NULL, '661a90867e846104a81fe799457030c0.jpg', '1f10ca3633190913e82d3f521cf5bfaf.png', '6cc7fbf7e3f0dd177b291b37fcb84b58.jpg'),
(9, 'NIKE ПЕРЕВЫПУСКАЕТ ТЕННИСНУЮ КЛАССИКУ', 'Nike понял, что у них в архивах находится великое множество классных моделей кроссовок...', '<p>Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен &mdash; Grandstand II. Эти теннисные кроссовки отлично впишутся в тренд на олдскульные кроссовки в стиле &lsquo;Dad Shoes&rsquo;. Пара выполнена из кожи однотонной и разбавлена незначительным брендингом на боковине.</p>\r\n\r\n<p>Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен &mdash; Grandstand II. Эти теннисные кроссовки отлично впишутся в тренд на олдскульные кроссовки в стиле &lsquo;Dad Shoes&rsquo;. Пара выполнена из кожи однотонной и разбавлена незначительным брендингом на боковине.</p>\r\n\r\n<p>Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен &mdash; Grandstand II. Эти теннисные кроссовки отлично впишутся в тренд на олдскульные кроссовки в стиле &lsquo;Dad Shoes&rsquo;. Пара выполнена из кожи однотонной и разбавлена незначительным брендингом на боковине.</p>\r\n\r\n<p>Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен &mdash; Grandstand II. Эти теннисные кроссовки отлично впишутся в тренд на олдскульные кроссовки в стиле &lsquo;Dad Shoes&rsquo;. Пара выполнена из кожи однотонной и разбавлена незначительным брендингом на боковине.</p>\r\n\r\n<p>Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен &mdash; Grandstand II. Эти теннисные кроссовки отлично впишутся в тренд на олдскульные кроссовки в стиле &lsquo;Dad Shoes&rsquo;. Пара выполнена из кожи однотонной и разбавлена незначительным брендингом на боковине.</p>\r\n\r\n<p>Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен &mdash; Grandstand II. Эти теннисные кроссовки отлично впишутся в тренд на олдскульные кроссовки в стиле &lsquo;Dad Shoes&rsquo;. Пара выполнена из кожи однотонной и разбавлена незначительным брендингом на боковине.</p>\r\n\r\n<p>Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен &mdash; Grandstand II. Эти теннисные кроссовки отлично впишутся в тренд на олдскульные кроссовки в стиле &lsquo;Dad Shoes&rsquo;. Пара выполнена из кожи однотонной и разбавлена незначительным брендингом на боковине.</p>\r\n\r\n<p>Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен &mdash; Grandstand II. Эти теннисные кроссовки отлично впишутся в тренд на олдскульные кроссовки в стиле &lsquo;Dad Shoes&rsquo;. Пара выполнена из кожи однотонной и разбавлена незначительным брендингом на боковине.</p>\r\n\r\n<p>Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен &mdash; Grandstand II. Эти теннисные кроссовки отлично впишутся в тренд на олдскульные кроссовки в стиле &lsquo;Dad Shoes&rsquo;. Пара выполнена из кожи однотонной и разбавлена незначительным брендингом на боковине.</p>\r\n', NULL, '34a8649aae727a02c2790358ee1034e0.jpg', '63a3b05dbcb70d73ffe72665c3b6d484.jpg', 'e2e434eaa58a2e7cf980bcb92d586ea7.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `lkimg` text NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `price` float NOT NULL,
  `stock_price` float DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `hit` enum('0','1') DEFAULT NULL,
  `new` enum('0','1') DEFAULT NULL,
  `sale` enum('0','1') DEFAULT NULL,
  `img` varchar(255) DEFAULT 'no-image.png',
  `size` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `lkimg`, `name`, `content`, `price`, `stock_price`, `keywords`, `description`, `hit`, `new`, `sale`, `img`, `size`) VALUES
(22, 19, '', 'Sportswear Gym White', '<p>Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен &mdash; Grandstand II.</p>\r\n', 3690, 2466, 'Nike Pro', 'Футболка выполнена из тонкого сетчатого трикотажа. Ткань с технологией Dri-FIT отводит влагу и обеспечивает комфорт. Детали: приталенный крой, плоские швы не натирают кожу.', '1', '1', '0', 'no-image.png', 'S'),
(25, 20, '', 'Брюки спортивные PANT LOGO TAPE', '', 3690, NULL, 'Nike Pro', 'Спортивные брюки выполнены из мягкого хлопкового трикотажа, махровая внутренняя отделка. Детали: зауженный крой, кулиска на талии, боковые карманы.', '1', '1', '0', 'no-image.png', 'S'),
(27, 18, '', 'Футболка PANT LOGO TAPE', '', 4690, 0, 'Nike Pro', 'Футболка женская Nike Pro', '0', '0', '1', 'no-image.png', 'M'),
(28, 18, '', 'Платье Sportswear Gym Vintage', '', 1099, 678, 'Футболка женская Nike Pro', 'Футболка женская Nike Pro', '1', '0', '1', 'no-image.png', 'S'),
(30, 18, '', 'Свитшот Champion', '', 3690, 0, 'Nike Pro', 'Футболка женская Nike Pro', '0', '1', '0', 'no-image.png', 'M'),
(31, 18, '', 'Футболка Saint Two', '', 4690, 0, 'Nike Pro', 'Спортивные брюки выполнены из мягкого хлопкового трикотажа, махровая внутренняя отделка. Детали: зауженный крой, кулиска на талии, боковые карманы.', '1', '1', '0', 'no-image.png', 'S'),
(32, 18, '', 'Олимпийка Sportswear Gym Vintage', '', 3690, 0, 'ADM,  футболка, одежда, мода', 'Футболка выполнена из тонкого сетчатого трикотажа. Ткань с технологией Dri-FIT отводит влагу и обеспечивает комфорт. Детали: приталенный крой, плоские швы не натирают кожу.', '0', '0', '1', 'no-image.png', 'S'),
(33, 21, '', 'Темно-синяя сумка дафл с декоративным кантом и флагом Tommy Hilfiger', '', 9990, 0, 'Nike Pro', 'Футболка выполнена из тонкого сетчатого трикотажа. Ткань с технологией Dri-FIT отводит влагу и обеспечивает комфорт. Детали: приталенный крой, плоские швы не натирают кожу.', '0', '1', '0', 'no-image.png', 'S'),
(34, 18, '', 'Футболка ADM', '', 4690, 0, 'ADM,  футболка, одежда, мода', 'Футболка выполнена из тонкого сетчатого трикотажа. Ткань с технологией Dri-FIT отводит влагу и обеспечивает комфорт. Детали: приталенный крой, плоские швы не натирают кожу.', '1', '1', '0', 'no-image.png', 'S'),
(35, 18, '', 'Skull ADM', '<p>Skull ADM</p>\r\n', 9990, NULL, 'Skull ADM', 'Skull ADM', '1', '1', '0', 'no-image.png', 'M');

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(999) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(999) NOT NULL,
  `button` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `image`, `title`, `description`, `button`) VALUES
(1, 'b42f7d0563ae64410190bba1fffa97c7.gif', 'ADM 1', 'Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен — Grandstand II.', '/category/stock'),
(2, '659a1d481effb254a26625a29340dcfb.gif', 'ADM 2', 'Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен — Grandstand II.', '/adm'),
(6, '99f9ac97195b6e07bf322e8150b09122.gif', 'ADM 4', 'Nike понял, что у них в архивах находится великое множество классных моделей кроссовок, которые сейчас будут очень популярны, поэтому дизайнеры и менеджеры решили переиздать многие из них. Один из самых необычных силуэтов, который будет перевыпущен — Grandstand II.', '/adm/portraits');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobphone` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `mobphone`, `status`, `username`, `email`, `password`, `password_hash`, `auth_key`, `password_reset_token`, `created_at`, `updated_at`) VALUES
(18, '', '', '0', 10, 'main admin', 'main-admin@mail.com', '123456', '$2y$13$6PJ0hSoJi4aPOfb53ZhXbORryu1yWr5slpcUhsYUfK0UWedD9HtGG', 'ULpoF1_zfjTF5TrZHcaCds_6sEH6040F', NULL, 1550475671, 1550475671),
(22, 'Тимур', 'Махкамов', '89207538705', 10, 'Mahkamovt', 'mahkamovt@icloud.com', '123456', '$2y$13$eK/85N3jKE2EJT4gAunhpeQVYB/lgCCcOAkvIgUkJuxe8OU5jlw5i', 'QLTHeHJBklJUvn_WKyLOdGEoxw6_8N6X', NULL, 1550666647, 1550751018),
(28, 'Ольга', 'Лимина', '79156923163', 10, 'Lama', 'lamalamulama@gmail.com', NULL, '$2y$13$UgoLEvQeQ/wRHzn/zzcbY.vQVvxFCAcBcx3TeLKVNnEySb/Ms2ouy', 'J6ikIdmKmbAKp78XJ2fobN-tjNB0hEfI', NULL, 1551439571, 1551439571),
(32, 'Sasha', 'Mahkamov', '79997838296', 10, 'Sasha', 'mahkamovs@icloud.com', NULL, '$2y$13$8oyd2GE2zapJt/qTyXYecuuAKWWmbcVVLj8t111g3EedS7X84lq7y', '5wt1mFInwtX50RVWNdHikA1igQ4_wSeZ', NULL, 1551639278, 1551639278),
(33, 'Vadim', 'Agafonov ', '9997833766', 10, 'Korac', 'Korac1998@mail.ru', NULL, '$2y$13$A52Pr.dL3JsCwBojH0e/z.Zn1uFC0OSIuxnzH2h2h47bvmsurYH9G', 'JUrivC67BlwrOZYShalkh0A8reJ7E-_B', NULL, 1551810443, 1551810443),
(40, 'Тимур', 'Махкамов', '+7 (920)-753-87-05', 10, 'content-manager', 'km@gmail.com', NULL, '$2y$13$1720MY3M4pv8q2n5wQwIsOudo/6N1f/i4fUK78Y7LqHfHR2BjLQLy', 'sgP39L39A_VqhZVz8BE1l7rgTSbTtGU0', NULL, 1553849136, 1553849136),
(41, 'Тимур', 'Махкамов', '+7 (920)-753-87-05', 10, 'post-manager', 'post-manager@icloud.com', NULL, '$2y$13$jXV4usDxWE3jXr4AEOlbKu.yFoHqhf9fDHfeOLHfW6Z9BJ48PnoHq', 'sehg9WBPWNgWEX-xu65aOCWQvivy_FWV', NULL, 1553852012, 1553852012);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `ordershop`
--
ALTER TABLE `ordershop`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`),
  ADD KEY `username_3` (`username`),
  ADD KEY `username_4` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ordershop`
--
ALTER TABLE `ordershop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT для таблицы `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
