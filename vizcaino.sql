-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2020 a las 09:55:13
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vizcaino`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `nombres` varchar(64) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `correo` varchar(64) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `movil` int(32) DEFAULT NULL,
  `fnacimiento` varchar(64) NOT NULL,
  `genero` varchar(64) NOT NULL,
  `foto` varchar(128) NOT NULL DEFAULT 'public/imgs/fotos/nofoto.png	',
  `rol` varchar(22) NOT NULL DEFAULT 'Usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `correo`, `clave`, `movil`, `fnacimiento`, `genero`, `foto`, `rol`) VALUES
(1, 'stephanea', 'gutiérrez güiza', 'stepha@gmail.com', 'fc1880a73d62130b6023adf63075fa13', 642948876, '1997-01-21', 'Femenino', 'public/imgs/fotos/IMG-20180302-WA0011.jpeg', 'Usuario'),
(2, 'carlos andrés', 'Hernández sierra', 'poli.70811@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 642835695, '1984-10-02', 'Masculino', 'public/imgs/fotos/20180518_090835.jpg', 'Admin-full'),
(3, 'prueba', 'tercera', 'prueba@l.com', 'e10adc3949ba59abbe56e057f20f883e', 555555, '1930-12-31', 'Otro', 'public/imgs/fotos/dani.jpg', 'Usuario'),
(20, 'Probando', 'Probando', 'pruebaexterno@hhh', 'e10adc3949ba59abbe56e057f20f883e', 54697318, '1968-11-24', 'Otro', 'public/imgs/fotos/nofoto.png	', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
