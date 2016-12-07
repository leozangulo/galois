-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-12-2016 a las 09:03:24
-- Versión del servidor: 5.6.32-78.1-log
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inndotco_galois`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance`
--

CREATE TABLE IF NOT EXISTS `avance` (
  `id_avance` int(11) NOT NULL,
  `hora` datetime DEFAULT NULL,
  `idgrupo` varchar(45) DEFAULT NULL,
  `juego_id_juego` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `avance`
--

INSERT INTO `avance` (`id_avance`, `hora`, `idgrupo`, `juego_id_juego`, `estado`) VALUES
(17, '2016-12-06 17:40:49', 'JN05', 1, 1),
(18, '2016-12-06 17:45:54', 'JN05', 2, 1),
(19, '2016-12-06 17:47:06', 'JN05', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE IF NOT EXISTS `juego` (
  `id_juego` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id_juego`, `nombre`) VALUES
(1, 'palabras'),
(2, 'imagen'),
(3, 'preguntas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id_teams` int(11) NOT NULL,
  `name_uno` varchar(45) NOT NULL,
  `name_dos` varchar(45) NOT NULL,
  `name_tres` varchar(45) NOT NULL,
  `name_cuatro` varchar(45) NOT NULL,
  `name_equipo` varchar(45) NOT NULL,
  `token` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `teams`
--

INSERT INTO `teams` (`id_teams`, `name_uno`, `name_dos`, `name_tres`, `name_cuatro`, `name_equipo`, `token`) VALUES
(12, '', '', '', '', '', 'MM18'),
(13, '', '', '', '', '', 'TW94'),
(14, 'Yo', 'Tu ', 'El ', 'Nosotros', 'Aquellos', 'JN05'),
(15, '', '', '', '', '', 'JA63'),
(16, '', '', '', '', '', 'ZX46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avance`
--
ALTER TABLE `avance`
  ADD PRIMARY KEY (`id_avance`), ADD KEY `fk_avance_juego1_idx` (`juego_id_juego`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id_juego`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id_teams`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avance`
--
ALTER TABLE `avance`
  MODIFY `id_avance` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id_teams` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avance`
--
ALTER TABLE `avance`
ADD CONSTRAINT `fk_avance_juego1` FOREIGN KEY (`juego_id_juego`) REFERENCES `juego` (`id_juego`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
