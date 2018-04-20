-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2018 a las 01:19:48
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scraper`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendariopodismo`
--

CREATE TABLE `calendariopodismo` (
  `id` int(5) NOT NULL,
  `referencia` varchar(6) DEFAULT NULL,
  `lugar` varchar(25) DEFAULT NULL,
  `dia` varchar(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `km` varchar(10) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `telefonos` varchar(50) DEFAULT NULL,
  `nota` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calendariopodismo`
--


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calendariopodismo`
--
ALTER TABLE `calendariopodismo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendariopodismo`
--
ALTER TABLE `calendariopodismo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
