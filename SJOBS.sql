-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2016 a las 16:35:19
-- Versión del servidor: 5.5.50-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `SJOBS`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Business`
--

CREATE TABLE IF NOT EXISTS `Business` (
  `business_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `business_name` varchar(50) NOT NULL,
  `business_email` varchar(50) NOT NULL,
  `busniess_description` varchar(50) NOT NULL,
  `busniess_image` varchar(200) NOT NULL,
  PRIMARY KEY (`business_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Business`
--

INSERT INTO `Business` (`business_id`, `business_name`, `business_email`, `busniess_description`, `busniess_image`) VALUES
(1, 'Sant Josep Obrer', 'sjosec@santjosepobrer.com', 'Colegio donde estudiamos', 'http://www.santjosepobrer.es/Logo_SJS.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Offers`
--

CREATE TABLE IF NOT EXISTS `Offers` (
  `offer_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `offer_title` varchar(50) NOT NULL,
  `offer_description` varchar(250) NOT NULL,
  `publication_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`offer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `password` char(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `Users`
--

INSERT INTO `Users` (`user_id`, `user_name`, `surname`, `user_email`, `password`) VALUES
(1, 'admin', 'SJOBS', 'admin@adminsjobs.es', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'oscar', 'cobo', 'ocobo97@gmail.com', '2dff4fc90e2973f54d62e257480de234bc59e2c4'),
(3, 'fran', 'sarciat', 'fransarciat@gmail.com', 'f35d74c6329fb62741a37206a7cb776a72c8e32d'),
(4, 'adrian', 'valenzuela', 'avgvalenzuela@gmail.com', 'a1b909ec1cc11cce40c28d3640eab600e582f833');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
