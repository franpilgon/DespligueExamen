-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2021 a las 11:04:27
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `codigo` int(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `precio` float NOT NULL,
  `albaran` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`codigo`, `descripcion`, `precio`, `albaran`) VALUES
(1, 'pepinillos en aceite', 2, 'pepinillo'),
(2, 'teclado mecanico', 60, 'teclado'),
(3, 'agua', 0.5, 'agua21agua'),
(4, 'usb', 12, 'usb3.2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dni`, `nombre`, `direccion`, `telefono`) VALUES
('111', 'Fran', 'rondaaaa', 1122),
('222', 'Fran', 'ronda', 99999),
('333', 'ert', 'ronda', 234245);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `albaran` varchar(150) NOT NULL,
  `factura` varchar(150) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`albaran`, `factura`, `fecha`, `dni`, `total`) VALUES
('pepinillo', 'precio de las compras', '12/12/12', '111', 16),
('agua21agua', 'Botellas de agua comprada', '10/03/21', '222', 10.5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
