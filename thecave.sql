-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2020 a las 18:14:20
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `thecave`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `color`, `category_name`) VALUES
(4, 'red', 'processor'),
(5, 'blue', 'ram'),
(6, 'green', 'cooler'),
(8, 'turquesa', 'hard drive'),
(11, 'black', 'microphone'),
(12, 'celeste', 'mother ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentaries`
--

CREATE TABLE `commentaries` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `from_user` varchar(200) NOT NULL,
  `id_product` int(11) NOT NULL,
  `commentary` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `commentaries`
--

INSERT INTO `commentaries` (`id`, `rating`, `from_user`, `id_product`, `commentary`) VALUES
(1, 4, 'Pepe!', 2, 'Vueeelaaa es genial papa!'),
(2, 3, 'Robertto', 24, 'Maaaaa o meno el micro!'),
(5, 5, 'FrankZappato', 2, 'Zaaaarpado'),
(7, 5, 'FrankZappato', 32, 'VUEEELAAA'),
(9, 5, 'BizzarroX', 6, 'Hasta la casa me enfria!'),
(13, 4, 'CAPO', 6, 'Muy kpo\n'),
(18, 4, 'BizzarroX', 59, 'This is a great ram !');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `from_email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `msg`, `from_email`, `username`) VALUES
(1, 'Esta muy buena la pagina', 'marianssss@esaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', ''),
(2, '1231232asda', 'maria_recipegenius@gmail.com', 'sadads'),
(3, '1231232asda', 'maria_recipegenius@gmail.com', 'sadads'),
(4, '1231232asda', 'maria_recipegenius@gmail.com', 'sadads');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `img_product` varchar(100) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `id_category`, `img_product`, `name_product`, `price`, `details`) VALUES
(2, 4, 'ryzen-7.jpg', 'Procesador', 35.04, 'Estos son los super detalles del ryzen.'),
(6, 6, 'Cooler CPU DeepCool Gammaxx 400S.jpg', 'Cooler CPU DeepCool Gammaxx 400S', 5280, 'Este cooler enfria mas y gasta menos.'),
(7, 6, 'Cooler CPU AZZA Blizzard LCAZ 120R WaterCooler 120mm ARGB.jpg', 'Cooler CPU AZZA Blizzard LCAZ 120R WaterCooler 120mm ARGB', 10680, 'Este es un cooler Blizzard como la compañia imaginate el refund!'),
(19, 4, '2.2GHz Quad-Core Intel Xeon Processor with 10MB Cache--E5-2407.jpg', '2.2GHz Quad-Core Intel Xeon Processor with 10MB Cache--E5-2407', 7000, 'Procesador detallado.'),
(20, 8, 'Seagate 2TB SATA PS4 Compatible Internal Hard Drive.png', 'Seagate 2TB SATA PS4 Compatible Internal Hard Drive', 4500, 'Hard drive compatible con PS4 '),
(24, 11, 'Audio Technica Atr4750 Micrófono Condenser Cuello Ganso Pc.jpg', 'Audio Technica Atr4750 Micrófono Condenser Cuello Ganso Pc', 1400, 'Mic negro cuello largo Technica'),
(32, 5, '5fbc273db6edb.jpg', 'Raaam mod', 5000, 'alta raaaaaam'),
(59, 5, '5fc7cad014775.jpg', 'Ram 8gb', 2350, 'Ram 8 gbs ddr4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `email_user` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_milis` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `purchases`
--

INSERT INTO `purchases` (`id`, `email_user`, `description`, `date_milis`) VALUES
(1, '', 'muchas cosas', 1601500873914),
(2, '', 'maaaaaaas cosas aun,la cantidad es impresionanteee', 123132131231);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(150) NOT NULL,
  `isadmin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `pwd`, `isadmin`, `username`) VALUES
(8, 'francisco.vaninetti2016@gmail.com', '$2y$10$AaKdoRVzbaglBdwx47S03.lwes8q.g224I.Xujb63je2tHxI4wP8e', 1, 'FrankZappato'),
(9, 'carancha@gmail.com', '$2y$10$gizE4Ya4Y3h79j/uw0T/pODZUo982uVgvUVgZQ.Z5mU6R7yGTTiHO', 1, 'Carola'),
(17, 'frank@gmail.com', '$2y$10$A/JhXKiQZVch74cJ2EJ9F.MXqeuLG3lwBfX6FTOivBG188LVywBRq', 0, 'FrankZappato');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `commentaries`
--
ALTER TABLE `commentaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `commentaries`
--
ALTER TABLE `commentaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `commentaries`
--
ALTER TABLE `commentaries`
  ADD CONSTRAINT `commentaries_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
