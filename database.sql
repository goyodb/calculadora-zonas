-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-10-2023 a las 21:34:22
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `c24_choferes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_zones`
--

DROP TABLE IF EXISTS `tbl_zones`;
CREATE TABLE IF NOT EXISTS `tbl_zones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `zona` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `carro` float NOT NULL,
  `moto` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `tbl_zones`
--

INSERT INTO `tbl_zones` (`id`, `zona`, `carro`, `moto`) VALUES
(1, '23 DE ENERO', 4, 4),
(2, 'AGUA SALUD', 3.5, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
