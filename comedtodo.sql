-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2026 a las 22:12:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comedtodo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id` int(11) NOT NULL,
  `idEntidad` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `contacto` varchar(60) NOT NULL,
  `poblacion` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `cp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id`, `idEntidad`, `nombre`, `direccion`, `telefono`, `mail`, `contacto`, `poblacion`, `provincia`, `cp`) VALUES
(1, 1, 'Local principal', 'Paseo Marítimo 12', '952111111', 'pedidos@elpuerto.es', 'Juan López', 'Málaga', 'Málaga', '29016'),
(2, 1, 'Almacén', 'Polígono Guadalhorce 5', '952111112', 'almacen@elpuerto.es', 'Marta Ruiz', 'Málaga', 'Málaga', '29004'),
(3, 2, 'Comedor escolar', 'Calle Larios 3', '952222222', 'comedor@santamaria.es', 'Sor Carmen', 'Málaga', 'Málaga', '29005'),
(4, 3, 'Cocina hotel', 'Avenida del Mar 45', '952333333', 'cocina@costasol.es', 'Pedro García', 'Marbella', 'Málaga', '29601'),
(5, 4, 'Sede central', 'Calle Comercio 8', '954444444', 'info@distandaluzas.es', 'Lucía Fernández', 'Sevilla', 'Sevilla', '41006');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

CREATE TABLE `entidad` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Nif` varchar(9) NOT NULL,
  `esCliente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`id`, `Nombre`, `Nif`, `esCliente`) VALUES
(1, 'Restaurante El Puerto', 'B29123456', 1),
(2, 'Colegio Santa María', 'R29654321', 1),
(3, 'Hotel Costa del Sol', 'A29987654', 1),
(4, 'Distribuciones Andaluzas SL', 'B29111222', 0),
(5, 'Huerta Verde SC', 'J29333444', 0),
(6, 'Panadería La Espiga', 'B29555666', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `idDireccion` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `numero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `idDireccion`, `idProducto`, `fecha`, `numero`) VALUES
(1, 1, 3, '2026-10-01', 'PED-2026-0001'),
(2, 1, 1, '2026-10-01', 'PED-2026-0002'),
(3, 3, 4, '2026-10-05', 'PED-2026-0003'),
(4, 3, 5, '2026-10-05', 'PED-2026-0004'),
(5, 4, 2, '2026-10-12', 'PED-2026-0005'),
(6, 2, 6, '2026-10-20', 'PED-2026-0006'),
(7, 4, 1, '2026-11-02', 'PED-2026-0007');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `idEntidad` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `ingredientes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `idEntidad`, `categoria`, `stock`, `ingredientes`) VALUES
(1, 'Pan de pueblo', 6, 'Panadería', 400, 'Harina de trigo, agua, sal, levadura'),
(2, 'Ensalada mixta', 5, 'Verduras', 40, 'Lechuga, tomate, cebolla, zanahoria, maíz'),
(3, 'Gazpacho andaluz', 4, 'Platos fríos', 60, 'Tomate, pimiento, pepino, ajo, aceite de oliva, vinagre, sal'),
(4, 'Lasaña boloñesa', 4, 'Platos calientes', 35, 'Pasta, carne picada, tomate, bechamel, queso'),
(5, 'Tarta de queso', 6, 'Postres', 25, 'Queso crema, huevo, azúcar, galleta, mantequilla'),
(6, 'Tomates de huerta', 5, 'Verduras', 200, 'Tomate');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkEntidad2` (`idEntidad`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkDireccion` (`idDireccion`),
  ADD KEY `fkProducto` (`idProducto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkEntidad` (`idEntidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `fkEntidad2` FOREIGN KEY (`idEntidad`) REFERENCES `entidad` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fkDireccion` FOREIGN KEY (`idDireccion`) REFERENCES `direccion` (`id`),
  ADD CONSTRAINT `fkProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fkEntidad` FOREIGN KEY (`idEntidad`) REFERENCES `entidad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
