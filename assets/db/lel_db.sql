-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-12-2015 a las 13:38:26
-- Versión del servidor: 5.5.46-0ubuntu0.14.04.2
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lel_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `idalbum` int(11) NOT NULL AUTO_INCREMENT,
  `namealbum` varchar(100) NOT NULL,
  `yearalbum` year(4) NOT NULL,
  PRIMARY KEY (`idalbum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumowners`
--

CREATE TABLE IF NOT EXISTS `albumowners` (
  `ownersid` int(11) NOT NULL AUTO_INCREMENT,
  `oartist` int(11) NOT NULL,
  `oalbum` int(11) NOT NULL,
  `ownersrole` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ownersid`),
  KEY `oartistid` (`oartist`,`oalbum`),
  KEY `oalbum` (`oalbum`),
  KEY `oartist` (`oartist`),
  KEY `oalbum_2` (`oalbum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumsong`
--

CREATE TABLE IF NOT EXISTS `albumsong` (
  `albumsongid` int(11) NOT NULL AUTO_INCREMENT,
  `alsoalbum` int(11) NOT NULL,
  `alsosong` int(11) NOT NULL,
  PRIMARY KEY (`albumsongid`),
  KEY `alsoalbum` (`alsoalbum`,`alsosong`),
  KEY `alsoalbum_2` (`alsoalbum`),
  KEY `alsosong` (`alsosong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artist`
--

CREATE TABLE IF NOT EXISTS `artist` (
  `idartist` int(11) NOT NULL AUTO_INCREMENT,
  `artistname` varchar(150) NOT NULL,
  `realartistname` varchar(100) DEFAULT NULL,
  `startactive` year(4) NOT NULL,
  `endactive` year(4) DEFAULT NULL,
  PRIMARY KEY (`idartist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `idrole` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(30) NOT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`idrole`, `rolename`) VALUES
(1, 'administrator'),
(2, 'asdf'),
(3, 'qwerty');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `idsong` int(11) NOT NULL AUTO_INCREMENT,
  `songname` varchar(50) NOT NULL,
  `songurl` varchar(100) NOT NULL,
  PRIMARY KEY (`idsong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `birthdate` date NOT NULL,
  `role` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  KEY `role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `username`, `password`, `birthdate`, `role`) VALUES
(1, 'Ivan', 'Nolasco', 'asdf@gmail.com', 'master', '1234', '1997-04-02', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albumowners`
--
ALTER TABLE `albumowners`
  ADD CONSTRAINT `albumtoconn` FOREIGN KEY (`oalbum`) REFERENCES `album` (`idalbum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ownerartistconn` FOREIGN KEY (`oartist`) REFERENCES `artist` (`idartist`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `albumsong`
--
ALTER TABLE `albumsong`
  ADD CONSTRAINT `songconn` FOREIGN KEY (`alsosong`) REFERENCES `song` (`idsong`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `albumconn` FOREIGN KEY (`alsoalbum`) REFERENCES `album` (`idalbum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `roleconn` FOREIGN KEY (`role`) REFERENCES `role` (`idrole`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
