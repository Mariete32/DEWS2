-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2020 a las 20:32:56
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videoclub`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PELICULAS`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `anyo` int(11) NOT NULL,
  `duracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `anyo`, `duracion`) VALUES
(1, 'El Padrino', 1972, 175),
(2, 'El Padrino 2', 1974, 200),
(3, 'Senderos de gloria', 1957, 86),
(4, 'Primera plana', 1974, 105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `guardaCredenciales` BOOLEAN NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `guardaCredenciales`) VALUES
(1, 'mario@gmail.com', '123', 'false');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `anyoNacimiento` varchar(4) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id`, `nombre`, `anyoNacimiento`, `pais`) VALUES
(1, 'Marlon Brandon', '1924', 'Estados Unidos'),
(2, 'Al Pacino', '1940', 'Estados Unidos'),
(3, 'Robert Duvall', '1931', 'Estados Unidos'),
(4, 'James Cann', '1940', 'Estados Unidos'),
(5, 'Diane Keaton', '1946', 'Estados Unidos'),
(6, 'Robert de Niro', '1943', 'Estados Unidos'),
(7, 'Kirk Douglas', '1916', 'Estados Unidos'),
(8, 'Ralph Meeker', '1920', 'Estados Unidos'),
(9, 'Adolphe Menjou', '1890', 'Estados Unidos'),
(10, 'Jack Lemmon', '1925', 'Estados Unidos'),
(11, 'Walter Matthau', '1920', 'Estados Unidos'),
(12, 'Susan Sarandon', '1946', 'Estados Unidos');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `anyoNacimiento` varchar(4) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`id`, `nombre`, `anyoNacimiento`, `pais`) VALUES
(1, 'Francis Ford Coppola', '1939', 'Estados Unidos'),
(2, 'Stanley Kubrick', '1928', 'Estados Unidos'),
(3, 'Billy Wilder', '1906', 'Estados Unidos');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PELICULAS_ACTORES`
--

CREATE TABLE `peliculas_actores` (
  `id_pelicula` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `PELICULAS_ACTORES`
--

INSERT INTO `peliculas_actores` (`id_pelicula`, `id_actor`) VALUES
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(2,1),
(2,2),
(2,3),
(2,5),
(2,6),
(3,7),
(3,8),
(3,9);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PELICULAS_directores`
--

CREATE TABLE `peliculas_directores` (
  `id_pelicula` int(11) NOT NULL,
  `id_director` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `PELICULAS_directores`
--

INSERT INTO `peliculas_directores` (`id_pelicula`, `id_director`) VALUES
(1,1),
(2,1),
(3,2),
(4,3);


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY `id` (`id`),
  ADD UNIQUE KEY `titulo` (`titulo`);
  
--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY `id` (`id`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY `id` (`id`);
--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;


--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;