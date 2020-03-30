-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-03-2020 a las 10:47:18
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
-- Base de datos: `crimebook`
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
  KEY `idPartida` (`idPartida`)
) ENGINE=MyISAM AUTO_INCREMENT=300012 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `codigo`, `nombre`, `tiempo`, `idPartida`) VALUES
(300001, 12345678, 'equipo01', 35, 200001),
(300002, 1584885795, 'equipo02', 0, 200001),
(300003, 1584885816, 'equipo03', 0, 200001),
(300009, 1584891331, 'equipo04', 0, 200003);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE IF NOT EXISTS `juegos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descExtendida` varchar(1000) DEFAULT NULL,
  `descBreve` varchar(200) DEFAULT NULL,
  `fechaCreacion` date NOT NULL,
  `username` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `descExtendida`, `descBreve`, `fechaCreacion`, `username`) VALUES
(100001, 'Los Asesinos del Crimebook', 'Una orden de asesinos tiene en\r\njaque al mundo entero. La Orden de los asesinos del Crimebook. Estos criminales \r\ntienen por costumbre, antes de matar a sus víctimas, crear un Crimebook. Un \r\nlibro de enigmas en cuyo interior se encuentran encriptados los datos de la \r\nfutura víctima. ¿Estáis a punto para jugar? Los asesinos del Crimebook es una \r\nhistoria corta y también es un juego en el que deberéis colaborar con el centro \r\nde investigación de Crimebook descifrando enigmas y puzles. De vosotros depende \r\nla vida de la víctima.', 'Un BOOK ESCAPE donde vosotros sois los protagonistas. \r\nDescifrad los enigmas, de vosotros depende su vida.', '2020-02-07', 'ivantapia01');

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
  `finalizada` set('SI','NO') NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `idJuego` (`idJuego`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=200027 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partidas`
--

INSERT INTO `partidas` (`id`, `nombre`, `fechaCreacion`, `duracion`, `fechaInicio`, `idJuego`, `username`, `finalizada`) VALUES
(200001, 'Partida Alevín Duración:60', '2020-02-07', 60, '2020-02-10', 100001, 'ivantapia01', 'SI'),
(200002, 'Partida Senior Duración:15', '2020-03-21', 15, '2020-03-23', 100001, 'ivantapia01', 'NO'),
(200003, 'Partida Cadete Duración:10', '2020-03-22', 10, '2020-03-30', 100001, 'carlos', 'NO');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pertenencias`
--

INSERT INTO `pertenencias` (`idJuego`, `idPrueba`) VALUES
(100001, 400001),
(100001, 400002),
(100001, 400003),
(100001, 400004),
(100001, 400005),
(100001, 400006),
(100001, 400007),
(100001, 400008);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peticiones`
--

INSERT INTO `peticiones` (`idEquipo`, `idPrueba`, `idPista`) VALUES
(300001, 400001, 600001),
(300001, 400001, 600002),
(300001, 400001, 600003),
(300001, 400002, 600001),
(300001, 400002, 600003),
(300001, 400002, 600004),
(300001, 400003, 600001),
(300001, 400004, 600001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

DROP TABLE IF EXISTS `pistas`;
CREATE TABLE IF NOT EXISTS `pistas` (
  `idPrueba` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `texto` varchar(1000) NOT NULL,
  `tiempo` int(10) UNSIGNED DEFAULT NULL,
  `intentos` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idPrueba`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`idPrueba`, `id`, `texto`, `tiempo`, `intentos`) VALUES
(400001, 600001, 'Está claro que los símbolos con un número al lado son \r\nllaves. Nos falta saber qué abren', NULL, 2),
(400001, 600002, 'Según el texto cada llave abre algo relacionado con la \r\nluz. ¡Qué se relaciona con la luz?', 20, 1),
(400001, 600003, 'Los faros se relacionan con la luz. ¿Qué faro abre cada\r\nllave?', NULL, 5),
(400001, 600004, 'El número de ventanas de cada faro es diferente. Quizá\r\nnos sirva para saber qué llave abre cada faro...', 20, 4),
(400001, 600005, 'El número de ventanas se corrwsponde con el número de \r\nllave que abre cada faro. Tal vez no todas las llaves sean útiles', NULL, 2),
(400001, 600006, '¡Claro! Tal vez las llaves tachadas no se han de utilizar. \r\nSólo las letras de las llaves sin tachar forman el nombre. ¡En que orden las \r\nponemos?', NULL, 2),
(400001, 600007, 'Podemos probar poniendo las llaves en orden de mayor a \r\nmenor', NULL, 2),
(400002, 600001, '¡Y si algunas de estas enfermedades está puesta para \r\ndespistar?', 40, 1),
(400002, 600003, '¡Fijaros1 Resiguiendo el laberinto hasta la salida por \r\nel camino más corto sólo se pasa por encima de algunas enfermedades. Esas deben \r\nser la buenas', NULL, 2),
(400002, 600004, 'Es necesario saber que medicina corresponde a cada \r\nenfermedad', 40, NULL),
(400002, 600005, 'Si leemos con atención las definiciones de enfermedades \r\nquizá podamos\r\nidentificar cual es cual', NULL, NULL),
(400002, 600006, '¡Decoders1 Mirad atentanente las medicinas. ¡Cada bote \r\ntiene una letra! ¡Qué botes corresponden a las enfermedades que pisamos en el \r\nlaberinto?', 45, 5),
(400002, 600007, 'si pongo esas letras en el orden en el que he pisado las \r\nenfermedades...', 45, 3),
(400002, 600008, 'La leche... Esa es la forma como morirá La Marcha...', NULL, 5),
(400003, 600001, 'Las monedas conectadas por puntos pueden ser una especie \r\nde guía de viaje', 10, 1),
(400003, 600002, 'Tengo una idea: ¡Qué pasa si aplicamos la guía de viaje\r\nal círculo de monedas y luego miramos con que monumento coincide la última moneda?', 15, 2),
(400003, 600003, 'Pero ¿Dónde empieza el viaje? ¡Tengo algún 11 en el círculo \r\nde monedas?', 20, 3),
(400003, 600004, 'A ver, es facíl: ¡Sigamos la guía! Del primer número de la \r\nguía vamos al segundo, del segundo al tercero,...', 25, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

DROP TABLE IF EXISTS `pruebas`;
CREATE TABLE IF NOT EXISTS `pruebas` (
  `id` int(10) UNSIGNED NOT NULL,
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`id`, `nombre`, `descExtendida`, `descBreve`, `tipo`, `dificultad`, `url`, `ayudaFinal`, `username`) VALUES
(400001, 'El Enigma de la Luz', 'Esta es una descripcion muy larga de \r\nla prueba 1 de Los Asesinos del Crimebook. En realidad no contiene nada\r\nde interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar\r\nel campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:\r\nEsta es una descripcion muy larga de la prueba 1 de Los Asesinos del Crimebook. \r\nEn realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar \r\nespacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora \r\nvoy a repetirlo de nuevo:', 'La llave de la luz protege su nombre', 'Prueba normal', 'Facil', 'direccion.dominio/prueba1', NULL, 'ivantapia01'),
(400002, 'El Enigma del Enfermo', 'Esta es una descripcion muy larga de \r\nla prueba 2 de Los Asesinos del Crimebook. En realidad no contiene nada\r\nde interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar\r\nel campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:\r\nEsta es una descripcion muy larga de la prueba 2 de Los Asesinos del Crimebook. \r\nEn realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar \r\nespacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora \r\nvoy a repetirlo de nuevo:', 'Con tanta pastilla tengo claro de que me moriré', 'Prueba normal', 'Facil', 'direccion.dominio/prueba2', NULL, 'ivantapia01'),
(400003, 'El Enigma del Viajero', 'Esta es una descripcion muy larga de \r\nla prueba 3 de Los Asesinos del Crimebook. En realidad no contiene nada\r\nde interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar\r\nel campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:\r\nEsta es una descripcion muy larga de la prueba 3 de Los Asesinos del Crimebook. \r\nEn realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar \r\nespacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora \r\nvoy a repetirlo de nuevo:', 'Si se donde empiezo sabré donde acabo', 'Prueba normal', 'Facil', 'direccion.dominio/prueba3', NULL, 'ivantapia01'),
(400004, 'El Enigma del Cerebro', 'Esta es una descripcion muy larga de \r\nla prueba 4 de Los Asesinos del Crimebook. En realidad no contiene nada\r\nde interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar\r\nel campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:\r\nEsta es una descripcion muy larga de la prueba 4 de Los Asesinos del Crimebook. \r\nEn realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar \r\nespacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora \r\nvoy a repetirlo de nuevo:', 'No hay más viejo que el qué se cree viejo, ya que la edad está en el cerebro', 'Prueba normal', 'Normal', 'direccion.dominio/prueba4', NULL, 'ivantapia01'),
(400005, 'El Enigma de la Gula', 'Esta es una descripcion muy larga de \r\nla prueba 5 de Los Asesinos del Crimebook. En realidad no contiene nada\r\nde interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar\r\nel campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:\r\nEsta es una descripcion muy larga de la prueba 5 de Los Asesinos del Crimebook. \r\nEn realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar \r\nespacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora \r\nvoy a repetirlo de nuevo:', 'El piso y la puerta se esconden detrás de dos trampas X/X', 'Prueba normal', 'Dificil', 'direccion.dominio/prueba5', NULL, 'ivantapia01'),
(400006, 'El Enigma de la Verdad', 'Esta es una descripcion muy larga de \r\nla prueba 6 de Los Asesinos del Crimebook. En realidad no contiene nada\r\nde interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar\r\nel campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:\r\nEsta es una descripcion muy larga de la prueba 6 de Los Asesinos del Crimebook. \r\nEn realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar \r\nespacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora \r\nvoy a repetirlo de nuevo:', '248B42 14 C4113 21 3NCU3N7R42 102 NUM3R02 V3RD4D3R02', 'Prueba normal', 'Normal', 'direccion.dominio/prueba6', NULL, 'ivantapia01'),
(400007, 'El Enigma del Azar', 'Esta es una descripcion muy larga de \r\nla prueba 7 de Los Asesinos del Crimebook. En realidad no contiene nada\r\nde interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar\r\nel campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:\r\nEsta es una descripcion muy larga de la prueba 7 de Los Asesinos del Crimebook. \r\nEn realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar \r\nespacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora \r\nvoy a repetirlo de nuevo:', 'El azar eligió a mi padre y lo escondió en sus posaderas', 'Prueba normal', 'Facil', 'direccion.dominio/prueba7', NULL, 'ivantapia01'),
(400008, 'El Enigma de la Cifra', 'Esta es una descripcion muy larga de \r\nla prueba 8 de Los Asesinos del Crimebook. En realidad no contiene nada\r\nde interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar\r\nel campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:\r\nEsta es una descripcion muy larga de la prueba 8 de Los Asesinos del Crimebook. \r\nEn realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar \r\nespacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora \r\nvoy a repetirlo de nuevo:', 'Sabrás el número dónde está si sabes el valor de las letras', 'Prueba normal', 'Dificil', 'direccion.dominio/prueba8', NULL, 'ivantapia01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resoluciones`
--

DROP TABLE IF EXISTS `resoluciones`;
CREATE TABLE IF NOT EXISTS `resoluciones` (
  `idPrueba` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idEquipo` int(10) UNSIGNED NOT NULL,
  `resuelta` tinyint(1) NOT NULL DEFAULT '0',
  `intentos` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `estrellas` enum('0','1','2','3','4','5') DEFAULT NULL,
  PRIMARY KEY (`idEquipo`,`idPrueba`),
  KEY `idPrueba` (`idPrueba`)
) ENGINE=MyISAM AUTO_INCREMENT=400012 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resoluciones`
--

INSERT INTO `resoluciones` (`idPrueba`, `idEquipo`, `resuelta`, `intentos`, `estrellas`) VALUES
(400001, 300001, 1, 3, NULL),
(400002, 300001, 1, 1, NULL),
(400003, 300001, 1, 4, NULL),
(400004, 300001, 0, 1, NULL),
(400005, 300001, 0, 0, NULL),
(400006, 300001, 0, 0, NULL),
(400007, 300001, 0, 0, NULL),
(400008, 300001, 0, 0, NULL),
(400001, 300002, 1, 5, NULL),
(400002, 300002, 0, 2, NULL),
(400001, 300003, 1, 8, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `idPrueba` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  PRIMARY KEY (`idPrueba`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`idPrueba`, `id`, `respuesta`) VALUES
(400001, 500001, 'Gina'),
(400001, 500002, 'Bomb'),
(400001, 500003, 'New York'),
(400001, 500004, '22'),
(400001, 500005, '6/2'),
(400001, 500006, 'Academy St.'),
(400001, 500007, 'UN'),
(400001, 500008, '132');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `email`, `nombre`, `apellidos`, `contrasenya`) VALUES
('ivantapia01', 'ivantapia@email.cb', 'ivan', 'tapia', '1234abcd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
