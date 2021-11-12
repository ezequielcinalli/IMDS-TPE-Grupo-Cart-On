-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2021 a las 23:44:42
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.31

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
CREATE DATABASE `imds_tpe` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `imds_tpe`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accepted_material`
--

CREATE TABLE `accepted_material` (
  `id` int(11) NOT NULL,
  `material` varchar(50) NOT NULL,
  `deliveryMethod` varchar(256) NOT NULL,
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
-- Estructura de tabla para la tabla `cartonero`
--

CREATE TABLE `cartonero` (
  `id_cartonero` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cartonero`
--

INSERT INTO `cartonero` (`id_cartonero`, `name`, `lastname`, `email`, `address`, `birthday`) VALUES
(0, 'Ciudadano', 'Buena onda', 'buenaonda@hotmail.com', 'Bolivar 637', '1990-10-01'),
(1, 'David', 'Sevilla', 'theduskdude@gmail.com', 'Azcuenaga 260', '1998-01-10'),
(2, 'Juan', 'Romero', 'reven4n7@hotmail.com', 'Rivadavia 140', '1993-12-10'),
(3, 'Jose', 'Cabello', 'techmagiccc@hotmail.com.ar', 'Liniers 500', '1992-05-05'),
(4, 'Tomas', 'Salas', 'eloscuro410@gmail.com', 'Larrea 412', '1994-12-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_deposit`
--

CREATE TABLE `material_deposit` (
  `id_deposit` int(11) NOT NULL,
  `id_cartonero` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `weight` float NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retirement_request`
--

CREATE TABLE `retirement_request` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `retirement_time` varchar(50) NOT NULL,
  `volume_materials` varchar(50) NOT NULL,
  `image` int(11) DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `creation_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `retirement_request`
--

INSERT INTO `retirement_request` (`id`, `name`, `lastname`, `address`, `phone`, `retirement_time`, `volume_materials`, `image`, `completed`, `creation_date`) VALUES
(2, 'Benjamin', 'Aldaya', 'Calle falsa 123', '2983505724', 'horario1', 'caja', NULL, 0, '2021-11-10'),
(3, 'Benjamin', 'Aldaya', 'Calle falsa 123', '2983505724', 'horario1', 'cajacamioneta', NULL, 0, '2021-11-10'),
(4, 'Benjamin', 'Aldaya', 'Calle falsa 123', '2983505724', 'horario2', 'cajacamioneta', NULL, 0, '2021-11-10'),
(5, 'Benjamin', 'Aldaya', 'Calle falsa 123', '2983505724', 'horario1', 'cajacamioneta', NULL, 0, '2021-11-10'),
(6, 'Benjamin', 'Aldaya', 'Calle falsa 123', '12231231231231', 'horario1', 'caja', NULL, 0, '2021-11-10'),
(7, 'Benjamin', 'Aldaya', 'Calle falsa 123', '123231312231', 'horario1', 'caja', NULL, 0, '2021-11-10'),
(8, 'Benjamin', 'Aldaya', 'Calle falsa 123', '12312323', 'horario1', 'caja', NULL, 0, '2021-11-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accepted_material`
--
ALTER TABLE `accepted_material`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cartonero`
--
ALTER TABLE `cartonero`
  ADD PRIMARY KEY (`id_cartonero`);

--
-- Indices de la tabla `material_deposit`
--
ALTER TABLE `material_deposit`
  ADD PRIMARY KEY (`id_deposit`),
  ADD KEY `FK_material_deposit_cartonero` (`id_cartonero`),
  ADD KEY `id_material` (`id_material`);

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
-- AUTO_INCREMENT de la tabla `cartonero`
--
ALTER TABLE `cartonero`
  MODIFY `id_cartonero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `material_deposit`
--
ALTER TABLE `material_deposit`
  MODIFY `id_deposit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `retirement_request`
--
ALTER TABLE `retirement_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `material_deposit`
--
ALTER TABLE `material_deposit`
  ADD CONSTRAINT `FK_material_deposit_cartonero` FOREIGN KEY (`id_cartonero`) REFERENCES `cartonero` (`id_cartonero`),
  ADD CONSTRAINT `FK_material_deposit_id_material` FOREIGN KEY (`id_material`) REFERENCES `accepted_material` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
