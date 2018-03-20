-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-12-2017 a las 02:57:44
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lavado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL,
  `provedor` varchar(500) DEFAULT NULL,
  `lote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_producto`, `id_categoria`, `id_imagen`, `id_usuario`, `nombre`, `descripcion`, `cantidad`, `precio`, `fechaCaptura`, `provedor`, `lote`) VALUES
(10, 1, 32, 10, 'lavado basico', 'lavado carroceria', 1, 60, '2017-12-16', NULL, NULL),
(11, 2, 33, 10, 'bujia', 'bujia', 1, 60, '2017-12-16', 'REFAC. Rojas', 50),
(14, 2, 36, 10, 'banda', 'banda', 1, 100, '2017-12-16', 'Castrol', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombreCategoria` varchar(150) NOT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `id_usuario`, `nombreCategoria`, `fechaCaptura`) VALUES
(1, 10, 'autolavado', '2017-12-01'),
(2, 10, 'mecanica', '2017-12-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellido` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(200) DEFAULT NULL,
  `rfc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id_usuario`, `nombre`, `apellido`, `direccion`, `email`, `telefono`, `rfc`) VALUES
(8, 10, 'lari', 'tellez', 'oxxo', 'lari@gmail.com', '124423', 'ENGALAFI'),
(9, 10, 'arturo', 'luis', 'san jose', 'aaaa@', '3344566666', 'jhhhhhhhhhhhhhhhhhhhh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `id_categoria`, `nombre`, `ruta`, `fechaSubida`) VALUES
(14, 4, 'Captura.JPG', '../../archivos/Captura.JPG', '2017-12-01'),
(15, 4, 'Captura.JPG', '../../archivos/Captura.JPG', '2017-12-01'),
(16, 4, 'encerado.JPG', '../../archivos/encerado.JPG', '2017-12-01'),
(17, 5, 'que-aceite-usa-mi-coche_hd_63656.jpg', '../../archivos/que-aceite-usa-mi-coche_hd_63656.jpg', '2017-12-01'),
(19, 5, 'bujia.jpeg', '../../archivos/bujia.jpeg', '2017-12-14'),
(20, 5, 'bujia.jpeg', '../../archivos/bujia.jpeg', '2017-12-14'),
(21, 5, 'bujia.jpeg', '../../archivos/bujia.jpeg', '2017-12-14'),
(22, 5, 'bujia.jpeg', '../../archivos/bujia.jpeg', '2017-12-14'),
(23, 5, 'bujia.jpeg', '../../archivos/bujia.jpeg', '2017-12-14'),
(32, 1, 'Captura.JPG', '../../archivos/Captura.JPG', '2017-12-16'),
(33, 2, 'bujia.jpeg', '../../archivos/bujia.jpeg', '2017-12-16'),
(36, 1, 'banda.jpeg', '../../archivos/banda.jpeg', '2017-12-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombreProvedor` varchar(150) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `id_usuario`, `nombreProvedor`, `direccion`, `telefono`, `fechaCaptura`) VALUES
(1, 10, 'REFAC. Rojas', 'Panamericana 40, Centro, 76800 San Juan del Rio, Qro.', '427 272 3131', '2017-12-13'),
(2, 10, ' Quakerstate', 'Av. Acueducto #20, Col. Parque Industrial Bernardo Quintana, El Marquez, Querataro Qro', '01 (442) 2 21 59 20', '2017-12-12'),
(3, 10, 'Castrol', 'Av Sta Fe 505, Lomas de Santa Fe, Contadero, 01219 Ciudad de Mexico, CDMX', '(55) 55672674', NULL),
(4, 10, 'Grupo GONHER', 'calle Francisco I. Madero,  Heroes, 76010 Santiago de Queretaro, Qro.', '427 747 0589', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` tinytext NOT NULL,
  `fechaCaptura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `password`, `fechaCaptura`) VALUES
(10, 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2017-12-01'),
(11, 'juan', 'perez', 'juanito', '8c31b65bdecdc9f18b695d7318186fd1feed690d', '2017-12-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fechaCompra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_producto`, `id_usuario`, `precio`, `fechaCompra`) VALUES
(1, 0, 3, 10, 60, '2017-12-01'),
(1, 0, 3, 10, 60, '2017-12-01'),
(1, 8, 5, 10, 100, '2017-12-01'),
(2, 8, 4, 11, 100, '2017-12-01'),
(2, 8, 6, 11, 50, '2017-12-01'),
(3, 8, 3, 10, 60, '2017-12-03'),
(3, 8, 3, 10, 60, '2017-12-03'),
(4, 8, 4, 10, 100, '2017-12-03'),
(5, 0, 5, 10, 100, '2017-12-03'),
(6, 8, 5, 10, 100, '2017-12-09'),
(7, 8, 5, 10, 100, '2017-12-09'),
(8, 8, 2, 10, 50, '2017-12-14'),
(9, 0, 4, 10, 100, '2017-12-14'),
(9, 0, 4, 10, 100, '2017-12-14'),
(10, 8, 7, 10, 300, '2017-12-14'),
(11, 8, 1, 10, 50, '2017-12-14'),
(12, 8, 3, 10, 70, '2017-12-14'),
(12, 8, 2, 10, 50, '2017-12-14'),
(13, 8, 9, 10, 50, '2017-12-14'),
(13, 8, 9, 10, 50, '2017-12-14'),
(14, 8, 7, 10, 300, '2017-12-14'),
(15, 8, 1, 10, 50, '2017-12-14'),
(15, 8, 4, 10, 100, '2017-12-14'),
(16, 0, 6, 10, 220, '2017-12-14'),
(17, 0, 6, 10, 220, '2017-12-14'),
(18, 0, 2, 10, 50, '2017-12-15'),
(19, 0, 1, 10, 50, '2017-12-15'),
(20, 8, 2, 10, 50, '2017-12-15'),
(21, 8, 2, 10, 50, '2017-12-15'),
(22, 8, 2, 10, 50, '2017-12-15'),
(23, 8, 7, 10, 300, '2017-12-15'),
(24, 0, 7, 10, 300, '2017-12-15'),
(25, 0, 2, 10, 50, '2017-12-16'),
(26, 0, 6, 10, 220, '2017-12-16'),
(27, 8, 11, 10, 60, '2017-12-16'),
(28, 9, 11, 10, 60, '2017-12-16'),
(29, 8, 11, 10, 60, '2017-12-16'),
(30, 8, 11, 10, 60, '2017-12-16'),
(31, 8, 11, 10, 60, '2017-12-16'),
(32, 9, 11, 10, 60, '2017-12-16'),
(33, 8, 11, 10, 60, '2017-12-16'),
(34, 8, 11, 10, 60, '2017-12-16'),
(34, 8, 11, 10, 60, '2017-12-16'),
(35, 0, 10, 10, 60, '2017-12-16'),
(35, 0, 11, 10, 60, '2017-12-16'),
(36, 9, 14, 10, 100, '2017-12-16'),
(37, 0, 10, 10, 60, '2017-12-16'),
(37, 8, 10, 10, 60, '2017-12-16'),
(38, 0, 10, 10, 60, '2017-12-16'),
(39, 9, 14, 10, 100, '2017-12-17'),
(40, 9, 11, 10, 60, '2017-12-17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_imagen` (`id_imagen`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `articulos_ibfk_2` FOREIGN KEY (`id_imagen`) REFERENCES `imagenes` (`id_imagen`),
  ADD CONSTRAINT `articulos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
