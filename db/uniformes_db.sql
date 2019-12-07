-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2019 a las 06:24:13
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uniformes_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'uniformes', 'hola', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `telefono` int(12) NOT NULL,
  `grado` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellidos`, `telefono`, `grado`, `direccion`, `id_escuela`, `estado`) VALUES
(1, 'jose', 'ruiz', 654321, '2b', 'pie de la cuesta', 1, 0),
(2, 'jorge', 'hernandez', 2465432, '3b', 'delfrmgkm', 4, 0),
(3, 'victor', 'vontreras', 21234, '3b', 'frrereb', 1, 0),
(4, 'jose lus', 'reyes', 54321, '4b', 'corregidora', 4, 1),
(5, 'victor', 'aguas', 2147483647, '4b', 'queretaro mexico', 2, 0),
(6, 'nico', 'reyes', 1123, '2b', 'swd', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL,
  `subtotal` varchar(10) NOT NULL,
  `descuento` varchar(10) NOT NULL,
  `id_comprobante` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `iva` int(11) NOT NULL,
  `total` varchar(11) NOT NULL,
  `numero_documento` varchar(20) NOT NULL,
  `serie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_proveedor`, `fecha`, `id_usuario`, `subtotal`, `descuento`, `id_comprobante`, `id_producto`, `iva`, `total`, `numero_documento`, `serie`) VALUES
(1, 1, '2019-01-01 06:00:00', 1, '2872.00', '0.00', 1, 0, 0, '2872.00', '000077', 1),
(2, 1, '2019-01-17 17:37:40', 1, '232.00', '0.00', 1, 0, 0, '232.00', '000078', 1),
(3, 1, '2019-01-17 21:30:39', 1, '232.00', '0.00', 1, 0, 0, '232.00', '000079', 1),
(4, 1, '2019-01-21 19:59:24', 1, '512.00', '0.00', 2, 0, 82, '593.92', '000038', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id_descuento` int(11) NOT NULL,
  `descuento` int(10) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`id_descuento`, `descuento`, `id_categoria`) VALUES
(1, 10, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compras`
--

CREATE TABLE `detalle_compras` (
  `id_detalle` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  `importe` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_compras`
--

INSERT INTO `detalle_compras` (`id_detalle`, `id_producto`, `id_compra`, `id_escuela`, `precio`, `cantidad`, `importe`) VALUES
(1, 10, 2, 3, '20', '1', 20),
(2, 3, 3, 4, '232', '1', 232),
(3, 3, 5, 4, '232', '1', 232),
(4, 4, 6, 4, '300', '1', 300),
(5, 3, 1, 4, '232', '1', 232),
(6, 10, 1, 3, '20', '1', 20),
(7, 4, 1, 4, '300', '1', 300),
(8, 11, 1, 3, '232', '10', 2320),
(9, 3, 2, 4, '232', '1', 232),
(10, 3, 3, 4, '232', '1', 232),
(11, 2, 4, 4, '512', '1', 512);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  `importe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle`, `id_producto`, `id_venta`, `precio`, `cantidad`, `importe`) VALUES
(1, 6, 1, '512', '10', '5120'),
(2, 5, 2, '512', '8', '4096'),
(3, 4, 2, '300', '18', '5400'),
(4, 3, 6, '232', '1', '232'),
(5, 2, 6, '512', '1', '512'),
(6, 1, 7, '200', '1', '200'),
(7, 1, 8, '200', '1', '200'),
(8, 3, 1, '232', '1', '232'),
(9, 2, 2, '512', '1', '512'),
(10, 2, 3, '512', '1', '512'),
(11, 6, 1, '512', '1', '512'),
(12, 2, 2, '512', '1', '512'),
(13, 1, 4, '200', '1', '200'),
(14, 1, 4, '200', '1', '200'),
(15, 2, 5, '512', '1', '512'),
(16, 1, 5, '200', '1', '200'),
(17, 5, 5, '512', '1', '512'),
(18, 4, 6, '300', '2', '600'),
(19, 4, 7, '300', '1', '300'),
(20, 5, 9, '512', '1', '512'),
(21, 7, 14, '21.20', '1', '21.2'),
(22, 7, 15, '21.20', '2', '42.4'),
(23, 7, 15, '21.20', '1', '21.20'),
(24, 7, 16, '21.20', '1', '21.20'),
(25, 5, 17, '512', '1', '512'),
(26, 6, 18, '512', '5', '2560'),
(27, 4, 19, '300', '1', '300'),
(28, 3, 20, '232', '1', '232'),
(29, 10, 21, '20', '2', '40'),
(30, 10, 22, '20', '1', '20'),
(31, 10, 23, '20', '1', '20'),
(32, 10, 23, '20', '1', '20'),
(33, 10, 24, '20', '1', '20'),
(34, 6, 25, '512', '1', '512'),
(35, 6, 26, '512', '1', '512'),
(36, 10, 27, '20', '1', '20'),
(37, 10, 28, '20', '1', '20'),
(38, 10, 29, '20', '1', '20'),
(39, 10, 29, '20', '1', '20'),
(40, 10, 30, '20', '1', '20'),
(41, 10, 31, '20', '1', '20'),
(42, 10, 32, '20', '1', '20'),
(43, 10, 33, '20', '1', '20'),
(44, 10, 34, '20', '1', '20'),
(45, 10, 35, '20', '1', '20'),
(46, 6, 36, '512', '1', '512'),
(47, 6, 37, '512', '1', '512'),
(48, 6, 38, '512', '1', '512'),
(49, 6, 39, '512', '1', '512'),
(50, 6, 40, '512', '1', '512'),
(51, 6, 41, '512', '1', '512'),
(52, 6, 42, '512', '1', '512'),
(53, 6, 43, '512', '1', '512'),
(54, 6, 44, '512', '1', '512'),
(55, 6, 45, '512', '10', '5120'),
(56, 5, 45, '512', '10', '5120'),
(57, 7, 45, '21.20', '1', '21.20'),
(58, 4, 45, '300', '1', '300'),
(59, 10, 45, '20', '1', '20'),
(60, 3, 45, '232', '1', '232'),
(61, 2, 45, '512', '1', '512'),
(62, 1, 45, '200', '1', '200'),
(63, 4, 46, '300', '8', '2400'),
(64, 10, 46, '20', '1', '20'),
(65, 3, 46, '232', '1', '232'),
(66, 1, 46, '200', '1', '200'),
(67, 7, 47, '21.20', '1', '21.20'),
(68, 7, 48, '21.20', '1', '21.20'),
(69, 7, 49, '21.20', '8', '169.6'),
(70, 10, 50, '20', '1', '20'),
(71, 10, 51, '20', '1', '20'),
(72, 10, 52, '20', '1', '20'),
(73, 10, 53, '20', '1', '20'),
(74, 10, 54, '20', '1', '20'),
(75, 10, 55, '20', '1', '20'),
(76, 10, 56, '20', '1', '20'),
(77, 10, 57, '20', '1', '20'),
(78, 3, 58, '232', '1', '232'),
(79, 3, 59, '232', '1', '232'),
(80, 3, 60, '232', '5', '1160'),
(81, 2, 60, '512', '9', '4608'),
(82, 1, 60, '200', '8', '1600'),
(83, 5, 61, '512', '1', '512'),
(84, 11, 63, '232', '1', '232'),
(85, 2, 64, '512', '1', '512'),
(86, 11, 64, '232', '1', '232'),
(87, 11, 66, '232', '1', '232'),
(88, 2, 67, '512', '1', '512'),
(89, 3, 1, '232', '1', '232'),
(90, 2, 2, '512', '1', '512'),
(91, 3, 3, '232', '1', '232'),
(92, 3, 4, '232', '1', '232');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuelas`
--

CREATE TABLE `escuelas` (
  `id_escuela` int(11) NOT NULL,
  `nombre_escuela` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `escuelas`
--

INSERT INTO `escuelas` (`id_escuela`, `nombre_escuela`, `direccion`, `telefono`, `estado`) VALUES
(1, 'uteq', 'queretaro mexico', 76543, 0),
(2, 'uaq', 'cerro de las campanas', 2101616, 0),
(3, 'poli', 'santa rosa', 654321, 0),
(4, 'plan de ayala', 'los olvera', 1234566, 0),
(5, 'uteq', 'pie de la cuesta', 2101616, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `nombre`, `link`) VALUES
(1, 'inicio', 'dashboard'),
(2, 'Inventario', 'inventario'),
(3, 'Ventas', 'ventas'),
(4, 'Compras', 'compras'),
(5, 'Proveedores', 'proveedores'),
(6, 'Nueva compra', 'compras'),
(7, 'Categorías', 'categorias'),
(8, 'Reportes', 'reportes'),
(9, 'Alumnos', 'clientes'),
(10, 'Escuelas', 'escuelas\r\n'),
(11, 'Usuarios', 'usuarios'),
(12, 'Permisos', 'permisos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `read` int(11) DEFAULT NULL,
  `insert` int(11) DEFAULT NULL,
  `update` int(11) DEFAULT NULL,
  `delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `menu_id`, `rol_id`, `read`, `insert`, `update`, `delete`) VALUES
(3, 7, 1, 1, 1, 1, 1),
(5, 7, 3, 1, 0, 0, 0),
(6, 2, 1, 1, 1, 1, 1),
(7, 2, 3, 1, 0, 0, 0),
(8, 3, 1, 1, 1, 1, 1),
(9, 3, 3, 1, 0, 0, 0),
(10, 5, 1, 1, 1, 1, 1),
(12, 5, 3, 1, 0, 0, 0),
(13, 4, 1, 1, 1, 1, 1),
(14, 4, 3, 1, 0, 0, 0),
(15, 8, 1, 1, 1, 1, 1),
(16, 1, 3, 1, 0, 0, 0),
(17, 8, 3, 1, 0, 0, 0),
(18, 9, 1, 1, 1, 1, 1),
(19, 9, 3, 1, 0, 0, 0),
(20, 10, 1, 1, 1, 1, 1),
(21, 10, 3, 1, 0, 0, 0),
(22, 11, 1, 1, 1, 1, 1),
(23, 11, 3, 1, 0, 0, 0),
(24, 12, 1, 1, 1, 1, 1),
(25, 12, 3, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `producto` varchar(30) NOT NULL,
  `talla` varchar(30) NOT NULL,
  `costo` varchar(10) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `stock` int(10) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `baja` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `producto`, `talla`, `costo`, `precio`, `stock`, `id_categoria`, `id_escuela`, `estado`, `baja`) VALUES
(1, 'suéter', '2', '100', '200', 20, 1, 4, 0, ''),
(2, 'suéter', '4', '32', '512', 9, 1, 4, 1, ''),
(3, 'playera polo', '2', '43', '232', 13, 1, 5, 1, ''),
(4, 'chamarra', '2', '100', '300', 12, 1, 4, 0, 'baja por falla1'),
(5, 'batas', 'tela', '', '512', 9, 1, 4, 0, ''),
(6, 'bata platico', '2', '200', '512', 4, 1, 4, 0, ''),
(7, 'calzon', '32', '100', '21.20', 10, 1, 5, 0, ''),
(8, 'falda', '3', '200', '300', 10, 1, 4, 0, ''),
(9, 'short', '12', '100', '200', 24, 1, 1, 0, ''),
(10, 'mochila', '12', '10', '20', 13, 1, 3, 0, 'baja por mala calidad'),
(11, 'uniformes', '2', '200', '232', 10, 1, 3, 1, ''),
(12, 'gorra', '2', '23', '100', 2, 1, 5, 0, 'baja por falta de existencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(40) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int(12) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `apellidos`, `direccion`, `correo`, `telefono`, `estado`, `fecha`) VALUES
(1, 'martin', 'reyes', 'mexico', 'martin@inovatic.com', 2147483647, 1, '2019-01-17 17:37:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`) VALUES
(1, 'superadmin', NULL),
(2, 'admin', NULL),
(3, 'vendedor', 'vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comprobante`
--

CREATE TABLE `tipo_comprobante` (
  `id_comprobante` int(11) NOT NULL,
  `nombre_comprobante` varchar(30) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `iva` int(11) NOT NULL,
  `serie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_comprobante`
--

INSERT INTO `tipo_comprobante` (`id_comprobante`, `nombre_comprobante`, `cantidad`, `iva`, `serie`) VALUES
(1, 'nota', 88, 0, 1),
(2, 'factura', 39, 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(12) NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `privilegio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `correo`, `telefono`, `password`, `privilegio`, `estado`) VALUES
(1, 'martin', 'hernandez', 'martin@inovatic.com.mx', 343, '7c4a8d09ca3762af61e59520943dc26494f8941b', '1', 1),
(2, 'jose', 'hernandez', 'jose@gmail.com', 12344, '7c4a8d09ca3762af61e59520943dc26494f8941b', '3', 1),
(4, 'miguel', 'reyes', 'martin@inovatic.com.mx', 1123, '7c4a8d09ca3762af61e59520943dc26494f8941b', '2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subtotal` varchar(10) NOT NULL,
  `iva` int(11) NOT NULL,
  `descuento` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `id_comprobante` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `num_documento` varchar(30) NOT NULL,
  `serie` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `fecha`, `subtotal`, `iva`, `descuento`, `total`, `id_comprobante`, `id_cliente`, `id_escuela`, `id_usuario`, `num_documento`, `serie`) VALUES
(1, '2018-12-02 05:17:58', '232.00', 0, '0.00', '232.00', 1, 4, 4, 1, '000086', '1'),
(2, '2019-02-15 21:51:11', '512.00', 0, '0.00', '512.00', 1, 6, 5, 1, '000087', '1'),
(3, '2019-02-16 05:10:23', '232.00', 0, '0.00', '232.00', 1, 6, 5, 1, '000088', '1'),
(4, '2019-02-16 19:45:42', '232.00', 37, '0.00', '269.12', 2, 6, 5, 1, '000039', '1');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id_descuento`);

--
-- Indices de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  ADD PRIMARY KEY (`id_escuela`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menus_idx` (`menu_id`),
  ADD KEY `fk_rol_idx` (`rol_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `tipo_comprobante`
--
ALTER TABLE `tipo_comprobante`
  ADD PRIMARY KEY (`id_comprobante`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id_descuento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_comprobante`
--
ALTER TABLE `tipo_comprobante`
  MODIFY `id_comprobante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
