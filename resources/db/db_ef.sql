-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 192.168.56.250
-- Tiempo de generación: 08-04-2026 a las 06:45:47
-- Versión del servidor: 12.2.2-MariaDB-ubu2404
-- Versión de PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_ef`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE `multimedia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `ruta_archivo` varchar(250) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `año` date NOT NULL,
  `album` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `multimedia`
--

INSERT INTO `multimedia` (`id`, `titulo`, `tipo`, `ruta_archivo`, `autor`, `año`, `album`) VALUES
(3, 'Traidores', 'audio', 'resources/uploads/audios/', 'Mega R', '2023-03-25', 'Anime Tributo 2'),
(5, 'Adelante, sin rendirte', 'audio', '/live/musica', '4x3', '2001-04-25', '4x3'),
(6, 'Discord', 'video', 'resources/uploads/videos/', 'The living Tombstone', '2020-04-08', 'Pro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `language` varchar(10) DEFAULT 'es',
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `correo`, `created`, `modified`, `password`, `language`, `role`) VALUES
(1, 'rafael', 'amaral', 'rafa@gmail.com', '2026-03-31 13:56:17', '2026-04-03 23:02:24', '$2y$12$Rml3oRWhDPHJnhl5w5fKLOkYeLczhoshutjWLOXNktxzl2ZIEboei', 'es', 'admin'),
(4, 'Test', 'User', 'test@gmail.com', '2026-04-02 05:59:40', '2026-04-02 05:59:40', '$2y$12$M6MIylvOKJE/4hRUwYpZw.5WcqLsoPAUjRFknl7ham/doutz0LFUS', 'es', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `multimedia`
--
ALTER TABLE `multimedia`
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
-- AUTO_INCREMENT de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
