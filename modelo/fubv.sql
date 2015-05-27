-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-05-2015 a las 20:04:31
-- Versión del servidor: 5.6.24-0ubuntu2
-- Versión de PHP: 5.6.4-4ubuntu6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `fubv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
`id` int(11) NOT NULL,
  `comentario` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `id_persona`, `id_tema`) VALUES
(2, 'Me gusta este tema\r\n', 3, 10),
(4, 'Que tal como esta el planeta', 3, 9),
(5, 'Ese tipo esta loco.', 3, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
`id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(3, 'Felix', 'Blanco', 'felix@gmail.com', 'felix'),
(4, 'Jose', 'Rincones', 'jose@gmail.com', 'jose'),
(5, 'Carla', 'Meltroso', 'carla@gmail.com', 'carla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_buen_comentario`
--

CREATE TABLE IF NOT EXISTS `persona_buen_comentario` (
  `id_tema` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_buen_tema`
--

CREATE TABLE IF NOT EXISTS `persona_buen_tema` (
  `id_tema` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `persona_buen_tema`
--

INSERT INTO `persona_buen_tema` (`id_tema`, `id_persona`) VALUES
(8, 3),
(10, 3),
(12, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_mal_comentario`
--

CREATE TABLE IF NOT EXISTS `persona_mal_comentario` (
  `id_tema` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_mal_tema`
--

CREATE TABLE IF NOT EXISTS `persona_mal_tema` (
  `id_tema` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `persona_mal_tema`
--

INSERT INTO `persona_mal_tema` (`id_tema`, `id_persona`) VALUES
(10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
`id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pregunta` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`id`, `titulo`, `pregunta`, `id_persona`) VALUES
(8, 'Â¿Porque mi apellido es asi?', 'Porque mi apellido es asi, ando buscando que no sea de esa manera se escucha muy muy feo', 5),
(9, 'Comer es sano', 'La comida del planeta es sana?', 3),
(10, 'PeloMono', 'QUE es eso?', 4),
(11, 'Otro tema mas que vamos hablar ', 'No se que pregunta podemos hacer el publico', 3),
(12, 'Â¿Porque geraldo lava la ropa?', 'Es una pregunta que tengo porque fernando rosillo quiere aprender de sus tÃ©cnica y como le da pena usar su cuenta me mando a preguntar', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
 ADD PRIMARY KEY (`id`), ADD KEY `id_persona` (`id_persona`), ADD KEY `id_tema` (`id_tema`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `persona_buen_comentario`
--
ALTER TABLE `persona_buen_comentario`
 ADD PRIMARY KEY (`id_tema`,`id_persona`), ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `persona_buen_tema`
--
ALTER TABLE `persona_buen_tema`
 ADD PRIMARY KEY (`id_tema`,`id_persona`), ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `persona_mal_comentario`
--
ALTER TABLE `persona_mal_comentario`
 ADD PRIMARY KEY (`id_tema`,`id_persona`), ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `persona_mal_tema`
--
ALTER TABLE `persona_mal_tema`
 ADD PRIMARY KEY (`id_tema`,`id_persona`), ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `titulo` (`titulo`), ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona_buen_comentario`
--
ALTER TABLE `persona_buen_comentario`
ADD CONSTRAINT `persona_buen_comentario_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `persona_buen_comentario_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona_buen_tema`
--
ALTER TABLE `persona_buen_tema`
ADD CONSTRAINT `persona_buen_tema_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `persona_buen_tema_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona_mal_comentario`
--
ALTER TABLE `persona_mal_comentario`
ADD CONSTRAINT `persona_mal_comentario_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `persona_mal_comentario_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona_mal_tema`
--
ALTER TABLE `persona_mal_tema`
ADD CONSTRAINT `persona_mal_tema_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `tema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `persona_mal_tema_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
ADD CONSTRAINT `tema_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
