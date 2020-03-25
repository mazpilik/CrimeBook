-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 11:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crimebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tiempo` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `idPartida` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id`, `codigo`, `nombre`, `tiempo`, `idPartida`) VALUES
(300001, 12345678, 'equipo01', 35, 200001);

-- --------------------------------------------------------

--
-- Table structure for table `juegos`
--

CREATE TABLE `juegos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descExtendida` varchar(1000) DEFAULT NULL,
  `descBreve` varchar(200) DEFAULT NULL,
  `fechaCreacion` date NOT NULL DEFAULT current_timestamp(),
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `descExtendida`, `descBreve`, `fechaCreacion`, `username`) VALUES
(100001, 'Los Asesinos del Crimebook', 'Una orden de asesinos \r\ntiene en jaque al mundo entero. La Orden de los asesinos del Crimebook. Estos criminales \r\ntienen por costumbre, antes de matar a sus v├¡ctimas, crear un Crimebook. Un libro de \r\nenigmas en cuyo interior se encuentran encriptados los datos de la futura v├¡ctima. \r\n┬┐Est├íis a punto para jugar? Los asesinos del Crimebook es una historia corta y tambi├®n \r\nes un juego en el que deber├®is colaborar con el centro de investigaci├│n de Crimebook \r\ndescifrando enigmas y puzles. De vosotros depende la vida de la v├¡ctima.', 'Un BOOK ESCAPE \r\ndonde vosotros sois los protagonistas. Descifrad los enigmas, de vosotros depende su \r\nvida.', '2020-02-07', 'ivantapia01');

-- --------------------------------------------------------

--
-- Table structure for table `partidas`
--

CREATE TABLE `partidas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fechaCreacion` date NOT NULL DEFAULT current_timestamp(),
  `duracion` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `fechaInicio` date NOT NULL DEFAULT current_timestamp(),
  `idJuego` int(10) UNSIGNED NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partidas`
--

INSERT INTO `partidas` (`id`, `nombre`, `fechaCreacion`, `duracion`, `fechaInicio`, `idJuego`, `username`) VALUES
(200001, 'Los Asesinos del Crimebook 1', '2020-02-07', 60, '2020-02-10', 100001, 'ivantapia01');

-- --------------------------------------------------------

--
-- Table structure for table `pertenencias`
--

CREATE TABLE `pertenencias` (
  `idJuego` int(10) UNSIGNED NOT NULL,
  `idPrueba` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertenencias`
--

INSERT INTO `pertenencias` (`idJuego`, `idPrueba`) VALUES
(100001, 400005),
(100001, 400008);

-- --------------------------------------------------------

--
-- Table structure for table `peticiones`
--

CREATE TABLE `peticiones` (
  `idEquipo` int(10) UNSIGNED NOT NULL,
  `idPrueba` int(10) UNSIGNED NOT NULL,
  `idPista` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pistas`
--

CREATE TABLE `pistas` (
  `idPrueba` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `texto` varchar(1000) NOT NULL,
  `tiempo` int(10) UNSIGNED DEFAULT NULL,
  `intentos` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pistas`
--

INSERT INTO `pistas` (`idPrueba`, `id`, `texto`, `tiempo`, `intentos`) VALUES
(400005, 600001, '┬┐A que tomos se refiere? Me parece haber visto un libro \ncomo ese', NULL, 1),
(400005, 600002, 'S├¡. Aparec├¡an tres libros como ese en los enigmas \nanteriores. Lo tengo apuntado', NULL, 2),
(400005, 600003, '┬┐S├│lo hemos de sumar los n├║meros que aparecen en los \ntomos? Habla de dos trampas', NULL, 3),
(400005, 600004, 'Una trampa creo que se cual es. No es lo mismo p├íginas \nque hojas', NULL, 4),
(400005, 600005, 'De acuerdo. Una hoja igual a dos p├íginas. ┬┐Pero, y la segunda trampa?', NULL, 5),
(400005, 600006, 'Quiz├í si cogemos unos libros cualquiera, una trilog├¡a y \nla ponemos en orden, lo veamos', NULL, 6),
(400005, 600007, '┬íUala! si lo ponemos en orden fijaros donde est├í la \nprimera p├ígina del primer tomo y la\n├║ltima del tercero', NULL, 7),
(400005, 600008, 'S├│lo cuenta una del primero y una del tercero', NULL, 8),
(400005, 600009, 'Cuidado, la p├ígina del primer tomo y la del tercer tomo \ncuentan como una hoja. Son s├│lo\nlas del segundo tomo las que se han de dividir entre dos', NULL, 9),
(400005, 600010, 'Fijaros en el X/X de la entrada. Los dos primeros n├║meros \nser├ín el piso y el otro la puerta', NULL, 10),
(400008, 600001, 'Esos s├¡mbolos me parece haberlos visto antes.\nEn varios enigmas anteriores', NULL, 1),
(400008, 600002, '┬┐Hacemos una cuadr├¡cula y ponemos todos los simbolos\ny letras en sus respectivos lugares?', NULL, 2),
(400008, 600003, 'Esas letras parecen formar una palabra, ┬┐No?', NULL, 3),
(400008, 600004, '┬íSi! Sudoku. ┬┐Y ahora? ┬┐Resolvemos el sudoku?', NULL, 4),
(400008, 600005, 'Creo que si, hemos de tratarlo como un sudoku.\nPero especial. S├│lo con cuatro numeros: 0,1,2,3', NULL, 5),
(400008, 600006, 'Ya est├í. No era dificil. ┬┐volvemos a poner las\nletras en su sitio para saber que n├║mero es cada letra?', NULL, 6),
(400008, 600007, 'Eso dice el texto, buscar el vaslor de las letras', NULL, 7),
(400008, 600008, '┬┐Ponemos las letras en orden? SUDOKU', NULL, 8),
(400008, 600009, 'Si los ceros no cuentan lo otro debe ser el \nn├║mero de la calle', NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `pruebas`
--

CREATE TABLE `pruebas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descExtendida` varchar(1000) DEFAULT NULL,
  `descBreve` varchar(200) DEFAULT NULL,
  `tipo` enum('Prueba normal','Prueba final') NOT NULL,
  `dificultad` enum('Facil','Normal','Dificil') DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `ayudaFinal` varchar(200) DEFAULT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pruebas`
--

INSERT INTO `pruebas` (`id`, `nombre`, `descExtendida`, `descBreve`, `tipo`, `dificultad`, `url`, `ayudaFinal`, `username`) VALUES
(400005, 'El Enigma de la Gula', 'Esta es una descripcion muy larga de \nla prueba 5 de Los Asesinos del Crimebook. En realidad no contiene nada\nde interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar\nel campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:\nEsta es una descripcion muy larga de la prueba 5 de Los Asesinos del Crimebook. \nEn realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar \nespacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora \nvoy a repetirlo de nuevo:', 'El piso y la puerta se esconden detr├ís de dos trampas X/X', 'Prueba normal', 'Dificil', 'direccion.dominio/prueba5', NULL, 'ivantapia01'),
(400008, 'El Enigma de la Cifra', 'Esta es una descripcion muy larga de \nla prueba 8 de Los Asesinos del Crimebook. En realidad no contiene nada\nde interes. Solo es texto lorem ipsum para rellenar espacio y asi poder testar\nel campo descripcion extendida de las pruebas. Y ahora voy a repetirlo de nuevo:\nEsta es una descripcion muy larga de la prueba 8 de Los Asesinos del Crimebook. \nEn realidad no contiene nada de interes. Solo es texto lorem ipsum para rellenar \nespacio y asi poder testar el campo descripcion extendida de las pruebas. Y ahora \nvoy a repetirlo de nuevo:', 'Sabr├ís el n├║mero d├│nde est├í si sabes el valor de las letras', 'Prueba normal', 'Dificil', 'direccion.dominio/prueba8', NULL, 'ivantapia01');

-- --------------------------------------------------------

--
-- Table structure for table `resoluciones`
--

CREATE TABLE `resoluciones` (
  `idPrueba` int(10) UNSIGNED NOT NULL,
  `idEquipo` int(10) UNSIGNED NOT NULL,
  `resuelta` tinyint(1) NOT NULL DEFAULT 0,
  `intentos` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `estrellas` enum('0','1','2','3','4','5') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resoluciones`
--

INSERT INTO `resoluciones` (`idPrueba`, `idEquipo`, `resuelta`, `intentos`, `estrellas`) VALUES
(400005, 300001, 0, 0, NULL),
(400008, 300001, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `respuestas`
--

CREATE TABLE `respuestas` (
  `idPrueba` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `respuesta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `contrasenya` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`username`, `email`, `nombre`, `apellidos`, `contrasenya`) VALUES
('ivantapia01', 'ivantapia@email.cb', 'ivan', 'tapia', '1234abcd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `idPartida` (`idPartida`);

--
-- Indexes for table `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `idJuego` (`idJuego`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pertenencias`
--
ALTER TABLE `pertenencias`
  ADD PRIMARY KEY (`idJuego`,`idPrueba`),
  ADD KEY `pertenencias_ibfk_2` (`idPrueba`);

--
-- Indexes for table `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`idEquipo`,`idPrueba`,`idPista`),
  ADD KEY `peticiones_ibfk_2` (`idPrueba`,`idPista`);

--
-- Indexes for table `pistas`
--
ALTER TABLE `pistas`
  ADD PRIMARY KEY (`idPrueba`,`id`);

--
-- Indexes for table `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `resoluciones`
--
ALTER TABLE `resoluciones`
  ADD PRIMARY KEY (`idEquipo`,`idPrueba`),
  ADD KEY `resoluciones_ibfk_2` (`idPrueba`);

--
-- Indexes for table `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`idPrueba`,`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`idPartida`) REFERENCES `partidas` (`id`);

--
-- Constraints for table `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `juegos_ibfk_1` FOREIGN KEY (`username`) REFERENCES `usuarios` (`username`);

--
-- Constraints for table `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `partidas_ibfk_1` FOREIGN KEY (`idJuego`) REFERENCES `juegos` (`id`),
  ADD CONSTRAINT `partidas_ibfk_2` FOREIGN KEY (`username`) REFERENCES `usuarios` (`username`);

--
-- Constraints for table `pertenencias`
--
ALTER TABLE `pertenencias`
  ADD CONSTRAINT `pertenencias_ibfk_1` FOREIGN KEY (`idJuego`) REFERENCES `juegos` (`id`),
  ADD CONSTRAINT `pertenencias_ibfk_2` FOREIGN KEY (`idPrueba`) REFERENCES `pruebas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peticiones`
--
ALTER TABLE `peticiones`
  ADD CONSTRAINT `peticiones_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `peticiones_ibfk_2` FOREIGN KEY (`idPrueba`,`idPista`) REFERENCES `pistas` (`idPrueba`, `id`) ON DELETE CASCADE;

--
-- Constraints for table `pistas`
--
ALTER TABLE `pistas`
  ADD CONSTRAINT `pistas_ibfk_1` FOREIGN KEY (`idPrueba`) REFERENCES `pruebas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pruebas`
--
ALTER TABLE `pruebas`
  ADD CONSTRAINT `pruebas_ibfk_1` FOREIGN KEY (`username`) REFERENCES `usuarios` (`username`);

--
-- Constraints for table `resoluciones`
--
ALTER TABLE `resoluciones`
  ADD CONSTRAINT `resoluciones_ibfk_1` FOREIGN KEY (`idEquipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `resoluciones_ibfk_2` FOREIGN KEY (`idPrueba`) REFERENCES `pruebas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`idPrueba`) REFERENCES `pruebas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
