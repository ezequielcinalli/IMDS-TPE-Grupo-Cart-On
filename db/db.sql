CREATE DATABASE imds_tpe;
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2021 a las 01:29:02
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `imds_tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accepted_material`
--

CREATE TABLE `accepted_material` (
  `id` int(11) NOT NULL,
  `material` varchar(50) NOT NULL,
  `deliveryMethod` varchar(50) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `accepted_material`
--

INSERT INTO `accepted_material` (`id`, `material`, `deliveryMethod`, `image`) VALUES
(1, 'Botellas de vidrio', 'Debe estar seco y limpio. Sacar la etiqueta y tapa', 'images/vidrio.jpg'),
(2, 'Cartón', 'Debe estar seco y limpio. Se aceptan de todos los ', 'images/carton.jpg'),
(3, 'Envases de aluminio', 'Debe estar seco y limpio.', 'images/aluminio.jpg'),
(4, 'Envases plásticos', 'Debe estar seco y limpio. Sacar la etiqueta y tapa', 'images/plastico.jpg'),
(5, 'Latas de conserva', 'Debe estar seco y limpio. Sacar la etiqueta si es ', 'images/latas.jpg'),
(6, 'Papel', 'Debe estar seco y limpio. Se aceptan de todos los ', 'images/papel.jpg'),
(7, 'Tetrabrik', 'Debe estar seco y limpio. Sacar la tapa si es que ', 'images/tetra.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retirement_request`
--

CREATE TABLE `retirement_request` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `retirement_time` varchar(50) NOT NULL,
  `volume_materials` varchar(50) NOT NULL,
  `image` int(11) DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accepted_material`
--
ALTER TABLE `accepted_material`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `retirement_request`
--
ALTER TABLE `retirement_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accepted_material`
--
ALTER TABLE `accepted_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `retirement_request`
--
ALTER TABLE `retirement_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;