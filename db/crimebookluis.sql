-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-04-2020 a las 16:32:55
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crimebookluis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

DROP TABLE IF EXISTS `equipos`;
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tiempo` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `idPartida` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `equipos_ibfk_1` (`idPartida`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `codigo`, `nombre`, `tiempo`, `idPartida`) VALUES
(1, 1587338211, 'Moco verde', 0, 4),
(2, 1587338500, 'Azkenputs', 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE IF NOT EXISTS `juegos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descExtendida` varchar(1000) DEFAULT NULL,
  `descBreve` varchar(200) DEFAULT NULL,
  `fechaCreacion` date NOT NULL,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `descExtendida`, `descBreve`, `fechaCreacion`, `username`) VALUES
(1, 'Los Asesinos del Crimebook', 'Una orden de asesinos tiene en\r\njaque al mundo entero. La Orden de los asesinos del Crimebook. Estos criminales \r\ntienen por costumbre, antes de matar a sus víctimas, crear un Crimebook. Un \r\nlibro de enigmas en cuyo interior se encuentran encriptados los datos de la \r\nfutura víctima. ¿Estáis a punto para jugar? Los asesinos del Crimebook es una \r\nhistoria corta y también es un juego en el que deberéis colaborar con el centro \r\nde investigación de Crimebook descifrando enigmas y puzles. De vosotros depende \r\nla vida de la víctima.', 'Un BOOK ESCAPE donde vosotros sois los protagonistas. \r\nDescifrad los enigmas, de vosotros depende su vida.', '2020-02-07', 'ivantapia01'),
(3, 'Juego Mikel', 'Descripción extendida juego mikel', 'Descripción breve juego mikel', '2020-04-18', 'ivantapia01'),
(7, 'tercer juego', 'fñaksjfñasdkfj ñaldksfj ñaldkj', 'tarari', '2020-04-19', 'ivantapia01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

DROP TABLE IF EXISTS `partidas`;
CREATE TABLE IF NOT EXISTS `partidas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `duracion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `fechaInicio` date NOT NULL,
  `idJuego` int(10) UNSIGNED NOT NULL,
  `username` varchar(15) NOT NULL,
  `finalizada` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idJuego` (`idJuego`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partidas`
--

INSERT INTO `partidas` (`id`, `nombre`, `fechaCreacion`, `duracion`, `fechaInicio`, `idJuego`, `username`, `finalizada`) VALUES
(4, 'Los Asesinos del Crimebook', '2020-04-19', 4, '2020-04-20', 1, 'ivantapia01', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenencias`
--

DROP TABLE IF EXISTS `pertenencias`;
CREATE TABLE IF NOT EXISTS `pertenencias` (
  `idJuego` int(10) UNSIGNED NOT NULL,
  `idPrueba` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idJuego`,`idPrueba`),
  KEY `idPrueba` (`idPrueba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

DROP TABLE IF EXISTS `peticiones`;
CREATE TABLE IF NOT EXISTS `peticiones` (
  `idEquipo` int(10) UNSIGNED NOT NULL,
  `idPrueba` int(10) UNSIGNED NOT NULL,
  `idPista` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idEquipo`,`idPrueba`,`idPista`),
  KEY `idPrueba` (`idPrueba`,`idPista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

DROP TABLE IF EXISTS `pistas`;
CREATE TABLE IF NOT EXISTS `pistas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idPrueba` int(10) UNSIGNED NOT NULL,
  `texto` varchar(1000) NOT NULL,
  `tiempo` int(10) UNSIGNED DEFAULT NULL,
  `intentos` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idPrueba` (`idPrueba`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

DROP TABLE IF EXISTS `pruebas`;
CREATE TABLE IF NOT EXISTS `pruebas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descExtendida` varchar(1000) DEFAULT NULL,
  `descBreve` varchar(200) DEFAULT NULL,
  `tipo` enum('Prueba normal','Prueba final') NOT NULL,
  `dificultad` enum('Facil','Normal','Dificil') DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `ayudaFinal` varchar(200) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`id`, `nombre`, `descExtendida`, `descBreve`, `tipo`, `dificultad`, `url`, `ayudaFinal`, `username`) VALUES
(10, 'Prueba 1', NULL, NULL, 'Prueba normal', 'Dificil', NULL, NULL, 'ivantapia01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resoluciones`
--

DROP TABLE IF EXISTS `resoluciones`;
CREATE TABLE IF NOT EXISTS `resoluciones` (
  `idPrueba` int(10) UNSIGNED NOT NULL,
  `idEquipo` int(10) UNSIGNED NOT NULL,
  `resuelta` tinyint(1) NOT NULL DEFAULT '0',
  `intentos` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `estrellas` enum('0','1','2','3','4','5') DEFAULT NULL,
  PRIMARY KEY (`idEquipo`,`idPrueba`),
  KEY `idPrueba` (`idPrueba`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idPrueba` int(10) UNSIGNED NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPrueba` (`idPrueba`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `idPrueba`, `respuesta`) VALUES
(4, 10, 'platano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `contrasenya` varchar(30) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `email`, `nombre`, `apellidos`, `contrasenya`) VALUES
('ivantapia01', 'ivantapia@email.cb', 'ivan', 'tapia', '1234abcd');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`idPartida`) REFERENCES `partidas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `juegos_ibfk_1` FOREIGN KEY (`username`) REFERENCES `usuarios` (`username`);

--
-- Filtros para la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `partidas_ibfk_1` FOREIGN KEY (`idJuego`) REFERENCES `juegos` (`id`),
  ADD CONSTRAINT `partidas_ibfk_2` FOREIGN KEY (`username`) REFERENCES `usuarios` (`username`);

--
-- Filtros para la tabla `pertenencias`
--
ALTER TABLE `pertenencias`
  ADD CONSTRAINT `pertenencias_ibfk_1` FOREIGN KEY (`idJuego`) REFERENCES `juegos` (`id`),
  ADD CONSTRAINT `pertenencias_ibfk_2` FOREIGN KEY (`idPrueba`) REFERENCES `pruebas` (`id`);

--
-- Filtros para la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD CONSTRAINT `peticiones_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `peticiones_ibfk_2` FOREIGN KEY (`idPrueba`,`idPista`) REFERENCES `pistas` (`idPrueba`, `id`);

--
-- Filtros para la tabla `pistas`
--
ALTER TABLE `pistas`
  ADD CONSTRAINT `pistas_ibfk_1` FOREIGN KEY (`idPrueba`) REFERENCES `pruebas` (`id`);

--
-- Filtros para la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD CONSTRAINT `pruebas_ibfk_1` FOREIGN KEY (`username`) REFERENCES `usuarios` (`username`);

--
-- Filtros para la tabla `resoluciones`
--
ALTER TABLE `resoluciones`
  ADD CONSTRAINT `resoluciones_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `resoluciones_ibfk_2` FOREIGN KEY (`idPrueba`) REFERENCES `pruebas` (`id`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`idPrueba`) REFERENCES `pruebas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
