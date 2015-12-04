-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-10-2015 a las 09:17:32
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `testts24`
--
CREATE DATABASE IF NOT EXISTS `testcheck` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testcheck`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `cid` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Company ID',
  `name` varchar(255) NOT NULL COMMENT 'Company name',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`cid`, `name`) VALUES
(1, 'Upolski'),
(2, 'Abingdon King Dick Ltd'),
(3, 'Acoustic Design Technology'),
(4, 'Abacus Lighting Ltd'),
(5, 'Frontier Pitts'),
(6, 'Fluid Transfer International Ltd'),
(7, 'Falcon Aviation'),
(8, 'Magnum'),
(9, 'MSI-Defence Systems Ltd'),
(10, 'Moog'),
(11, 'McBraida'),
(12, 'Murata Power Solutions (Celab) Ltd'),
(13, 'Rubb Buildings'),
(14, 'Racks Industries'),
(15, 'Toye, Kenning &amp; Spencer Ltd'),
(16, 'TEK Military Seating'),
(17, 'Techni Measure'),
(18, 'Zircom Data Communications Ltd'),
(19, 'Zero Cases (UK) Ltd'),
(20, 'James Walker RotaBolt Ltd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `cid` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Company ID',
  `c_rate` decimal(10,3) NOT NULL COMMENT 'Current rate',
  `l_rate` decimal(10,3) NOT NULL COMMENT 'Last rate',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `rates`
--

INSERT INTO `rates` (`cid`, `c_rate`, `l_rate`) VALUES
(1, '141.648', '142.753'),
(2, '256.306', '249.735'),
(3, '176.035', '180.701'),
(4, '207.917', '199.757'),
(5, '339.180', '343.957'),
(6, '226.482', '227.995'),
(7, '127.824', '132.252'),
(8, '53.104', '61.281'),
(9, '186.821', '181.219'),
(10, '230.356', '222.043'),
(11, '157.802', '166.285'),
(12, '186.471', '184.839'),
(13, '31.898', '23.653'),
(14, '99.857', '91.986'),
(15, '34.588', '26.436'),
(16, '123.037', '117.877'),
(17, '97.530', '90.670'),
(18, '27.359', '32.858'),
(19, '47.934', '54.003'),
(20, '102.919', '107.424');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
