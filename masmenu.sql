-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2018 a las 21:36:51
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `masmenu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `ID` int(11) NOT NULL COMMENT 'campo identificador unico de la categoria del producto',
  `DESCRIPCION` varchar(255) NOT NULL COMMENT 'campo que permite conocer la descripcion de la categoria del producto.',
  `ACTIVO` varchar(1) NOT NULL COMMENT 'campo que permite conocer si la categoria del rproducto se encuentra o no activa',
  `FECHA_CREA` date DEFAULT NULL COMMENT 'campo que permite registrar la fech de creacion del registro',
  `FECHA_MODIFICA` date DEFAULT NULL COMMENT 'campo que permite conocer la fecha de modificacion del registro.',
  `USUARIO_CREA` int(11) DEFAULT NULL COMMENT 'campo que registra el usuario que crea el registro',
  `USUARIO_MOD` int(11) DEFAULT NULL COMMENT 'camp que registra el usuario que realiza una modificacion del registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`ID`, `DESCRIPCION`, `ACTIVO`, `FECHA_CREA`, `FECHA_MODIFICA`, `USUARIO_CREA`, `USUARIO_MOD`) VALUES
(1, 'CATEGORIA 1', 'S', '2017-09-03', NULL, 1, NULL),
(2, 'CATEGORIA 2', 'S', '2017-09-03', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL,
  `PUNTOS` int(11) NOT NULL,
  `ACTIVO` varchar(1) NOT NULL,
  `USUARIO_CREA` int(11) NOT NULL,
  `FECHA_CREA` date NOT NULL,
  `USUARIO_MOD` int(11) NOT NULL,
  `FECHA_MOD` date NOT NULL,
  `PERSONA_ID` int(11) NOT NULL COMMENT 'REGISTRO FORANEO A LA TABLA PERSONA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID`, `PUNTOS`, `ACTIVO`, `USUARIO_CREA`, `FECHA_CREA`, `USUARIO_MOD`, `FECHA_MOD`, `PERSONA_ID`) VALUES
(6, 4, 'N', 1, '2017-10-09', 1, '2017-10-16', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_venta`
--

CREATE TABLE `estado_venta` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `ACTIVO` varchar(1) NOT NULL,
  `FECHA_CREA` date NOT NULL,
  `FECHA_MODIFICA` date NOT NULL,
  `USUARIO_CREA` int(11) NOT NULL,
  `USUARIO_MOD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_pago`
--

CREATE TABLE `medio_pago` (
  `ID` int(11) NOT NULL,
  `DESCRIPCIONM` varchar(255) NOT NULL,
  `ACTIVO` varchar(1) NOT NULL,
  `FECHA_MODIFICA` date NOT NULL,
  `FECHA_CREA` date NOT NULL,
  `USUARIO_CREA` int(11) NOT NULL,
  `USUARIO_MOD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ID` int(11) NOT NULL COMMENT 'identificador unico de la persona',
  `RUT` varchar(15) NOT NULL COMMENT 'campo del rut de la persona.',
  `DV` varchar(1) NOT NULL COMMENT 'campo del digito verificador del rut de la persona',
  `NOMBRES` varchar(255) NOT NULL COMMENT 'campo del nombre de la persona',
  `APELLIDO_PAT` varchar(50) DEFAULT NULL COMMENT 'campo que del apellido paterno la persona',
  `APELLIDO_MAT` varchar(50) DEFAULT NULL COMMENT 'campo del apellido materno de la persona.',
  `ACTIVO` varchar(1) NOT NULL COMMENT 'campo que define si la persona se encuentra activa o no.',
  `FECHA_CREA` date DEFAULT NULL COMMENT 'campo que permite conocer la fecha de creacion de la persona.',
  `FECHA_MODIFICA` date DEFAULT NULL COMMENT 'campo que permite conocer la fecha de modificacion de algun registro de la persona.',
  `USUARIO_CREA` int(11) DEFAULT NULL COMMENT 'campo que registra el usuario que creo el registro.',
  `USUARIO_MOD` int(11) DEFAULT NULL COMMENT 'campo que registra el usuario que modifica datos de la persona'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ID`, `RUT`, `DV`, `NOMBRES`, `APELLIDO_PAT`, `APELLIDO_MAT`, `ACTIVO`, `FECHA_CREA`, `FECHA_MODIFICA`, `USUARIO_CREA`, `USUARIO_MOD`) VALUES
(1, '17260285', '1', 'MARIA JOSE', 'RIOSECO', 'TURRA', 'S', '2017-09-03', NULL, NULL, NULL),
(2, '11111111', '1', 'ADMIN', 'ADMIN', 'ADMIN', 'S', '2017-09-03', NULL, NULL, NULL),
(8, '4301515', 'K', 'MAGALY 2', 'MARTINEZ', 'GORMAS', 'S', '2017-10-09', '2017-10-16', 1, 1),
(9, '7703246', '0', 'NESTLE', NULL, NULL, 'S', '2017-10-21', '2017-10-21', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(250) NOT NULL,
  `ABREVIACION` varchar(100) DEFAULT NULL,
  `STOCK` int(11) NOT NULL,
  `TIPO_PRODUCTO_ID` int(11) NOT NULL,
  `ACTIVO` varchar(1) NOT NULL,
  `FECHA_CREA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FECHA_MODIFICA` date NOT NULL,
  `STOCK_MINIMO` int(11) DEFAULT NULL,
  `STOCK_MAXIMO` int(11) DEFAULT NULL,
  `UNIDAD_MEDIDA_ID` int(11) DEFAULT NULL,
  `CATEGORIA_PRODUCTO_ID` int(11) NOT NULL,
  `USUARIO_CREA` int(11) NOT NULL,
  `USUARIO_MOD` int(11) NOT NULL,
  `FECHA_VENCIMIENTO` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='TABLA QUE PERMITE ALMACENAR LOS PRODUCTOS EXISTENTES PARA LA';

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID`, `DESCRIPCION`, `ABREVIACION`, `STOCK`, `TIPO_PRODUCTO_ID`, `ACTIVO`, `FECHA_CREA`, `FECHA_MODIFICA`, `STOCK_MINIMO`, `STOCK_MAXIMO`, `UNIDAD_MEDIDA_ID`, `CATEGORIA_PRODUCTO_ID`, `USUARIO_CREA`, `USUARIO_MOD`, `FECHA_VENCIMIENTO`) VALUES
(13, 'MI PRODUCTO v2', '8777', 1544, 1, 'N', '2017-10-02 03:13:58', '2017-10-02', 2, 2, NULL, 1, 1, 1, '2017-10-30 03:00:00'),
(14, 'PIZZA FAMILIAR', '33444', 15, 2, 'S', '2017-10-30 01:31:45', '2017-10-30', 3, NULL, 1, 2, 1, 1, '2018-02-22 02:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `ACTIVO` varchar(1) NOT NULL,
  `USUARIO_CREA` int(11) NOT NULL,
  `FECHA_CREA` date NOT NULL,
  `USUARIO_MOD` int(11) DEFAULT NULL,
  `FECHA_MOD` date DEFAULT NULL,
  `PERSONA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`ID`, `EMAIL`, `ACTIVO`, `USUARIO_CREA`, `FECHA_CREA`, `USUARIO_MOD`, `FECHA_MOD`, `PERSONA_ID`) VALUES
(1, 'rt.mariajose@gmail.com', 'N', 1, '2017-10-21', 1, '2017-10-21', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_egreso`
--

CREATE TABLE `tipo_egreso` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `ACTIVO` varchar(1) NOT NULL,
  `FECHA_CREA` date NOT NULL,
  `FECHA_MODIFICA` date NOT NULL,
  `USUARIO_CREA` int(11) NOT NULL,
  `USUARIO_MOD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(250) NOT NULL,
  `ACTIVO` varchar(1) NOT NULL,
  `FECHA_CREA` date NOT NULL,
  `FECHA_MODIFICA` date DEFAULT NULL,
  `USUARIO_CREA` int(11) NOT NULL,
  `USUARIO_MOD` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`ID`, `DESCRIPCION`, `ACTIVO`, `FECHA_CREA`, `FECHA_MODIFICA`, `USUARIO_CREA`, `USUARIO_MOD`) VALUES
(1, 'MATERIA PRIMA', 'S', '2017-09-02', '0000-00-00', 1, 0),
(2, 'PRODUCCION MAS MENU', 'S', '2017-09-03', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_telefono`
--

CREATE TABLE `tipo_telefono` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `ACTIVO` varchar(1) NOT NULL,
  `FECHA_CREA` date NOT NULL,
  `FECHA_MODIFICA` date NOT NULL,
  `USUARIO_CREA` int(11) NOT NULL,
  `USUARIO_MOD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `ACTIVO` varchar(1) NOT NULL,
  `FECHA_CREA` date NOT NULL,
  `FECHA_MODIFICA` date NOT NULL,
  `USUARIO_CREA` int(11) NOT NULL,
  `USUARIO_MOD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`ID`, `DESCRIPCION`, `ACTIVO`, `FECHA_CREA`, `FECHA_MODIFICA`, `USUARIO_CREA`, `USUARIO_MOD`) VALUES
(1, 'UNIDAD 1', 'S', '2017-10-08', '0000-00-00', 1, 0),
(2, 'UNIDAD 2', 'S', '2017-10-08', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(100) NOT NULL,
  `PERSONA_ID` int(11) NOT NULL,
  `USUARIO` varchar(100) NOT NULL,
  `PASS` varchar(15) NOT NULL,
  `ACTVO` varchar(1) NOT NULL,
  `USUARIO_CREA` int(11) DEFAULT NULL,
  `FECHA_CREA` date NOT NULL,
  `USUARIO_MOD` int(11) DEFAULT NULL,
  `FECHA_MOD` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='TABLA QUE PERMITE EL ALMACENAMIENTO DE LOS USUARIOS.';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `PERSONA_ID`, `USUARIO`, `PASS`, `ACTVO`, `USUARIO_CREA`, `FECHA_CREA`, `USUARIO_MOD`, `FECHA_MOD`) VALUES
(1, 1, 'MRIOSECO', '1234', 'S', NULL, '2017-09-03', NULL, NULL),
(2, 2, 'ADMIN', '1234', 'S', NULL, '2017-09-03', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `ID` int(11) NOT NULL COMMENT 'campo que identifica la venta realizada.',
  `USUARIO_ID` int(11) NOT NULL COMMENT 'campo que registra  el usuario que realizo la venta. El responsable.',
  `CLIENTE_ID` int(11) NOT NULL COMMENT 'campo que registra el cliente a quien se le realizo la venta.',
  `FECHA_VENTA` date NOT NULL COMMENT 'campo que registra a fecha en qu se realio la venta.',
  `PRECIO_TOTAL` int(11) NOT NULL COMMENT 'campo que permite registrar el precio total de la venta.',
  `MEDIO_PAGO_ID` int(11) NOT NULL COMMENT 'campo que permite registrar e medio de pago de la venta',
  `ESTADO_VENTA` int(11) NOT NULL COMMENT 'cmpo que permite registrar el estado en que se encuentra la venta.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_producto`
--

CREATE TABLE `venta_producto` (
  `ID` int(11) NOT NULL COMMENT 'campo identificador de las relaciones ventsa y products que se relizaran.',
  `VENTA_ID` int(11) NOT NULL COMMENT 'campo que registra la venta a la cual pertenece los productos.',
  `PRODUCTO_ID` int(11) NOT NULL COMMENT 'campo que registra los productos que seran vendidos.',
  `ACTIVO` varchar(1) NOT NULL COMMENT 'campo que registra si  el producto - venta se encuentra activo o no.',
  `FECHA_MODIFICA` date NOT NULL COMMENT 'campo que permite registrar la fecha en que se realizouna modificacion .',
  `FECHA_CREA` date NOT NULL COMMENT 'campo que permite registrar la fecha en que se creo el registro entre venta y producto. ',
  `USUARIO_CREA` int(11) NOT NULL COMMENT 'campo que permite registrar el usuario que creo  la relacion entre producto venta.',
  `USUARIO_MOD` int(11) NOT NULL COMMENT 'campo que permite registrar el usuario que modifico  la relacion entre producto venta.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PERSONA_FK` (`PERSONA_ID`);

--
-- Indices de la tabla `estado_venta`
--
ALTER TABLE `estado_venta`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `medio_pago`
--
ALTER TABLE `medio_pago`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_producto_categoria_producto` (`CATEGORIA_PRODUCTO_ID`),
  ADD KEY `FK_producto_unidad_medida` (`UNIDAD_MEDIDA_ID`),
  ADD KEY `FK_producto_tipo_producto` (`TIPO_PRODUCTO_ID`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tipo_egreso`
--
ALTER TABLE `tipo_egreso`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tipo_telefono`
--
ALTER TABLE `tipo_telefono`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MEDIO_PAGO_ID` (`MEDIO_PAGO_ID`),
  ADD KEY `ESTADO_VENTA` (`ESTADO_VENTA`);

--
-- Indices de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_venta_producto_venta` (`VENTA_ID`),
  ADD KEY `FK_venta_producto_producto` (`PRODUCTO_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'campo identificador unico de la categoria del producto', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico de la persona', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_egreso`
--
ALTER TABLE `tipo_egreso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_telefono`
--
ALTER TABLE `tipo_telefono`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'campo que identifica la venta realizada.';
--
-- AUTO_INCREMENT de la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'campo identificador de las relaciones ventsa y products que se relizaran.';
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `PERSONA_FK` FOREIGN KEY (`PERSONA_ID`) REFERENCES `persona` (`ID`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_producto_categoria_producto` FOREIGN KEY (`CATEGORIA_PRODUCTO_ID`) REFERENCES `categoria_producto` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_producto_tipo_producto` FOREIGN KEY (`TIPO_PRODUCTO_ID`) REFERENCES `tipo_producto` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`MEDIO_PAGO_ID`) REFERENCES `medio_pago` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`ESTADO_VENTA`) REFERENCES `estado_venta` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD CONSTRAINT `FK_venta_producto_producto` FOREIGN KEY (`PRODUCTO_ID`) REFERENCES `producto` (`ID`),
  ADD CONSTRAINT `FK_venta_producto_venta` FOREIGN KEY (`VENTA_ID`) REFERENCES `venta` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
