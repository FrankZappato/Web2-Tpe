-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2020 a las 00:28:13
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `loginproject`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'Frank', 'francisco.vaninetti2016@gmail.com', '$2y$10$EH7BmEV5qssNOh5F.gWRO.4SnwgHtXyekzFDGHWuraf07BBK6ixkK'),
(2, 'FrankZappato', 'algo@hotmail.com', '$2y$10$tEddkW7gt2kTksa/4eCUauAu8hmovuA7AV..60d5s1xFoOmTY62R.'),
(3, 'Test', 'test@gmail.com', '$2y$10$mlJFIIpQLb71UG92nq.ptuT4CSa.zRzz0c8bA1lNfLLEu3be1EpRO'),
(4, 'mari', 'mari@hotmail.com', '$2y$10$WnsCfgj1oRpAQjVdd7JTuu/9Jty2fgPUE3p15n63MH9U6FOfiyjeO'),
(5, 'Juan', 'juankapo@hotmail.com', '$2y$10$Za0OW4z2dMeLQc4IY.FDie/uEJD7SfjZzy5z5yrQNr4vYVI9VzpVG'),
(6, 'Marian', 'marian@hotmail.com', '$2y$10$YeTo2jf7CUsPI5/uWjoeTuMofoZwJ2aaSwsrdjOHt/AfeIp7oq9NS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
