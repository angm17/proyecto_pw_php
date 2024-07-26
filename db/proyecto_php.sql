-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2024 a las 00:50:57
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_cab`
--

CREATE TABLE `inventario_cab` (
  `id` int(11) NOT NULL,
  `id_tipo_comprobante` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_almacen` int(11) NOT NULL,
  `subtotal` decimal(19,2) NOT NULL,
  `impuesto` decimal(19,2) NOT NULL,
  `total` decimal(19,2) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_det`
--

CREATE TABLE `inventario_det` (
  `id` int(11) NOT NULL,
  `id_inventario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` decimal(19,4) NOT NULL,
  `costo` decimal(19,4) NOT NULL,
  `subtotal` decimal(19,4) NOT NULL,
  `total` decimal(19,4) NOT NULL,
  `unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `es_kit` tinyint(1) NOT NULL,
  `precio` decimal(19,4) NOT NULL,
  `impuesto` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comprobante`
--

CREATE TABLE `tipo_comprobante` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `tipo` bit(1) DEFAULT NULL COMMENT '1 ingreso. 0 egreso.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `creado_por` int(11) NOT NULL,
  `modificado_por` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `fecha_creado` datetime NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `creado_por` int(11) DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creado_por` (`creado_por`) USING BTREE,
  ADD KEY `modificado_por` (`modificado_por`) USING BTREE;

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creado_por` (`creado_por`) USING BTREE,
  ADD KEY `modificado_por` (`modificado_por`) USING BTREE;

--
-- Indices de la tabla `inventario_cab`
--
ALTER TABLE `inventario_cab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creado_por` (`creado_por`) USING BTREE,
  ADD KEY `id_almacen` (`id_almacen`) USING BTREE,
  ADD KEY `id_tipo_comprobante` (`id_tipo_comprobante`) USING BTREE,
  ADD KEY `modificado_por` (`modificado_por`) USING BTREE;

--
-- Indices de la tabla `inventario_det`
--
ALTER TABLE `inventario_det`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_factura` (`id_inventario`) USING BTREE,
  ADD KEY `id_producto` (`id_producto`) USING BTREE,
  ADD KEY `inventario_det_unidad_FK` (`unidad`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creado_por` (`creado_por`) USING BTREE,
  ADD KEY `id_categoria` (`id_categoria`) USING BTREE,
  ADD KEY `id_unidad` (`id_unidad`) USING BTREE,
  ADD KEY `impuesto` (`impuesto`) USING BTREE,
  ADD KEY `modificado_por` (`modificado_por`) USING BTREE;

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creado_por` (`creado_por`) USING BTREE,
  ADD KEY `modificado_por` (`modificado_por`) USING BTREE;

--
-- Indices de la tabla `tipo_comprobante`
--
ALTER TABLE `tipo_comprobante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creado_por` (`creado_por`) USING BTREE,
  ADD KEY `modificado_por` (`modificado_por`) USING BTREE;

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creado_por` (`creado_por`) USING BTREE,
  ADD KEY `modificado_por` (`modificado_por`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creado_por` (`creado_por`) USING BTREE,
  ADD KEY `modificado_por` (`modificado_por`) USING BTREE;

--
-- Indices de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`) USING BTREE,
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_cab`
--
ALTER TABLE `inventario_cab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_det`
--
ALTER TABLE `inventario_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_comprobante`
--
ALTER TABLE `tipo_comprobante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD CONSTRAINT `categoria_producto_usuario_FK` FOREIGN KEY (`creado_por`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `inventario_cab`
--
ALTER TABLE `inventario_cab`
  ADD CONSTRAINT `inventario_cab_almacen_FK` FOREIGN KEY (`id_almacen`) REFERENCES `almacen` (`id`),
  ADD CONSTRAINT `inventario_cab_tipo_comprobante_FK` FOREIGN KEY (`id_tipo_comprobante`) REFERENCES `tipo_comprobante` (`id`),
  ADD CONSTRAINT `inventario_cab_usuario_FK` FOREIGN KEY (`creado_por`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `inventario_det`
--
ALTER TABLE `inventario_det`
  ADD CONSTRAINT `inventario_det_inventario_cab_FK` FOREIGN KEY (`id_inventario`) REFERENCES `inventario_cab` (`id`),
  ADD CONSTRAINT `inventario_det_unidad_FK` FOREIGN KEY (`unidad`) REFERENCES `unidad` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_categoria_producto_FK` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_producto` (`id`),
  ADD CONSTRAINT `producto_unidad_FK` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `producto_usuario_FK` FOREIGN KEY (`creado_por`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `producto_usuario_FK_1` FOREIGN KEY (`creado_por`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `tipo_comprobante`
--
ALTER TABLE `tipo_comprobante`
  ADD CONSTRAINT `tipo_comprobante_usuario_FK` FOREIGN KEY (`creado_por`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `usuario_rol_rol_FK` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`),
  ADD CONSTRAINT `usuario_rol_usuario_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
