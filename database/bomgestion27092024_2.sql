-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para bomgestion
CREATE DATABASE IF NOT EXISTS `bomgestion` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bomgestion`;

-- Volcando estructura para tabla bomgestion.activos
CREATE TABLE IF NOT EXISTS `activos` (
  `id_activo` int NOT NULL AUTO_INCREMENT,
  `tipo_activo_id` int DEFAULT NULL,
  `codigo_sbn` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `codigo_cbp` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `material` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `marca` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `modelo` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado_conservacion` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dimensiones` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `serie` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `anio` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `de_baja` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_iniuso` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_adquisicion` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `doc_adquisicion` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `doc_ingreso` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_spanish_ci,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_activo`),
  UNIQUE KEY `codigo_sbn` (`codigo_sbn`),
  KEY `tipo_activo_id` (`tipo_activo_id`),
  CONSTRAINT `activos_ibfk_1` FOREIGN KEY (`tipo_activo_id`) REFERENCES `tipos_activos` (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.activos: ~0 rows (aproximadamente)
INSERT INTO `activos` (`id_activo`, `tipo_activo_id`, `codigo_sbn`, `codigo_cbp`, `material`, `marca`, `modelo`, `color`, `estado_conservacion`, `dimensiones`, `serie`, `anio`, `de_baja`, `fecha_iniuso`, `fecha_adquisicion`, `doc_adquisicion`, `doc_ingreso`, `observaciones`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 2, '678200501099', 'CBP-1432', 'CBP-1432', 'FIAT', 'DUCATO', 'ROJO', 'REGULAR', 'S/D', 'ZFA250000-D2329539', '2013', 'OPERATIVO', '2009-04-25', '2014-01-31', 'ACRG 146-2015-CR-GRM', 'MEMO N° 200-2016 CGBVP/DIGO', 'FALTA MANTENIMIENTO.', '2024-09-25 17:16:26', NULL, '1'),
	(2, 4, '882200840658', 'S/CBP', 'S/T', 'INTERSPIRO', 'S/M', 'NEGRO', 'REGULAR', 'S/D', 'S/S', '', 'OPERATIVO', '1998-01-01', '1998-01-01', 'S/DA', 'S/DI', 'S/O', '2024-09-26 12:23:13', '2024-09-26 12:23:36', '1'),
	(3, 11, '536424060303', 'S/CBP', 'S/M', 'HARTWELL MEDICAL', 'S/M', 'VERDE', 'REGULAR', 'S/D', 'S/S', '', 'OPERATIVO', '1900-01-01', '1900-01-01', 'S/DA', 'S/DI', 'S/O', '2024-09-26 12:45:57', NULL, '1');

-- Volcando estructura para tabla bomgestion.administrativos
CREATE TABLE IF NOT EXISTS `administrativos` (
  `id_administrativo` int NOT NULL AUTO_INCREMENT,
  `persona_id` int NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_administrativo`),
  KEY `persona_id` (`persona_id`),
  CONSTRAINT `administrativos_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id_persona`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.administrativos: ~4 rows (aproximadamente)
INSERT INTO `administrativos` (`id_administrativo`, `persona_id`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(8, 66, '2024-08-03 01:22:08', '2024-09-23 23:57:23', '1'),
	(13, 96, '2024-08-25 22:46:04', '2024-09-27 00:01:03', '1'),
	(15, 102, '2024-09-06 01:53:11', '2024-09-23 21:08:19', '1'),
	(17, 104, '2024-09-13 20:10:11', '2024-09-26 13:13:58', '1'),
	(18, 105, '2024-09-23 21:06:23', '2024-09-23 21:06:33', '1'),
	(19, 106, '2024-09-26 13:16:11', NULL, '1');

-- Volcando estructura para tabla bomgestion.autoriza
CREATE TABLE IF NOT EXISTS `autoriza` (
  `id_autoriza` int NOT NULL AUTO_INCREMENT,
  `codigo_aut` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `grado_aut` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nombres_aut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidos_aut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dni_aut` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_autoriza`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.autoriza: ~3 rows (aproximadamente)
INSERT INTO `autoriza` (`id_autoriza`, `codigo_aut`, `grado_aut`, `nombres_aut`, `apellidos_aut`, `dni_aut`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, '21.12-1', 'S/G', 'S/N01', 'S/A01', '777', '2024-09-01 20:26:31', '2024-09-23 18:49:12', '1'),
	(2, 'C.E', 'S/G', 'S/N02', 'S/A02', '777', '2024-09-01 20:29:43', '2024-09-23 18:49:31', '1'),
	(8, '21.11', 'Comandante', 'David', 'Rivera', '777', '2024-09-13 20:17:22', '2024-09-23 18:49:44', '1');

-- Volcando estructura para tabla bomgestion.configuracion_instituciones
CREATE TABLE IF NOT EXISTS `configuracion_instituciones` (
  `id_config_institucion` int NOT NULL AUTO_INCREMENT,
  `cd` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nombre_institucion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `celular` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `correo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_config_institucion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.configuracion_instituciones: ~1 rows (aproximadamente)
INSERT INTO `configuracion_instituciones` (`id_config_institucion`, `cd`, `cia`, `nombre_institucion`, `logo`, `direccion`, `telefono`, `celular`, `correo`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, '21', 'XXI CD MOQUEGUA', 'Brigadier Juan Penaloza Arriaga N 136', '2024-09-10-23-24-57logobomberos-circular.png', 'Tren al Sur Mz.28 Lt.04, Ilo, Moquegua, Perú', '963800478', '946984166', 'companiabomberos@gmail.com', '2023-12-28 20:29:10', '2024-09-16 01:15:14', '1');

-- Volcando estructura para tabla bomgestion.etiquetas
CREATE TABLE IF NOT EXISTS `etiquetas` (
  `id_etiqueta` int NOT NULL AUTO_INCREMENT,
  `activo_id` int DEFAULT NULL,
  `etiqueta_anno` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `codigo_etiqueta` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_etiqueta`),
  KEY `activo_id` (`activo_id`),
  CONSTRAINT `etiquetas_ibfk_1` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`id_activo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.etiquetas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bomgestion.gestiones
CREATE TABLE IF NOT EXISTS `gestiones` (
  `id_gestion` int NOT NULL AUTO_INCREMENT,
  `gestion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_gestion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.gestiones: ~0 rows (aproximadamente)
INSERT INTO `gestiones` (`id_gestion`, `gestion`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 'GESTIÓN 2024', '2023-12-28 20:29:10', NULL, '1');

-- Volcando estructura para tabla bomgestion.historial_ubicaciones
CREATE TABLE IF NOT EXISTS `historial_ubicaciones` (
  `id_historial` int NOT NULL AUTO_INCREMENT,
  `activo_id` int DEFAULT NULL,
  `ubicacion_id` int DEFAULT NULL,
  `fecha_cambio` datetime DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_historial`),
  KEY `activo_id` (`activo_id`),
  KEY `ubicacion_id` (`ubicacion_id`),
  CONSTRAINT `historial_ubicaciones_ibfk_1` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`id_activo`),
  CONSTRAINT `historial_ubicaciones_ibfk_2` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicaciones` (`id_ubicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.historial_ubicaciones: ~2 rows (aproximadamente)
INSERT INTO `historial_ubicaciones` (`id_historial`, `activo_id`, `ubicacion_id`, `fecha_cambio`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 1, 2, '2024-09-25 17:16:26', '2024-09-25 17:16:26', NULL, '1'),
	(2, 1, 1, '2024-09-25 17:36:13', '2024-09-25 17:36:13', NULL, '1'),
	(3, 2, 2, '2024-09-26 12:23:13', '2024-09-26 12:23:13', NULL, '1'),
	(4, 3, 2, '2024-09-26 12:45:57', '2024-09-26 12:45:57', NULL, '1'),
	(5, 2, 5, '2024-09-26 13:02:01', '2024-09-26 13:02:01', NULL, '1'),
	(6, 2, 2, '2024-09-26 13:03:51', '2024-09-26 13:03:51', NULL, '1');

-- Volcando estructura para tabla bomgestion.mando
CREATE TABLE IF NOT EXISTS `mando` (
  `id_mando` int NOT NULL AUTO_INCREMENT,
  `cia_man` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `codigo_man` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `grado_man` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nombres_man` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidos_man` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dni_man` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_mando`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.mando: ~3 rows (aproximadamente)
INSERT INTO `mando` (`id_mando`, `cia_man`, `codigo_man`, `grado_man`, `nombres_man`, `apellidos_man`, `dni_man`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 'S/C', '3.08 A. Rojas', 'S/G', 'Nombres', 'Rojas', '777', '2024-09-02 00:35:48', '2024-09-23 18:42:29', '1'),
	(2, 'S/C', '3.06 Alvarez', 'Teniente', 'Carlos', 'Alavarez', '777', '2024-09-02 00:48:31', '2024-09-23 18:39:17', '1'),
	(7, 'S/C', '3.08 Ian Diaz', 'S/G', 'Ian', 'Diaz', '777', '2024-09-24 00:52:40', NULL, '1'),
	(8, 'S/C', 'S/C', 'S/G', 'S/N', 'S/A', '77777777', '2024-09-26 12:09:34', NULL, '1');

-- Volcando estructura para tabla bomgestion.motivo
CREATE TABLE IF NOT EXISTS `motivo` (
  `id_motivo` int NOT NULL AUTO_INCREMENT,
  `codigo_mot` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion_mot` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_motivo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.motivo: ~5 rows (aproximadamente)
INSERT INTO `motivo` (`id_motivo`, `codigo_mot`, `descripcion_mot`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, '10.38', 'Abastecimiento de Combustible', '2024-09-02 13:40:08', '2024-09-23 19:03:48', '1'),
	(2, '30.30', 'Taller Electrico ', '2024-09-02 13:40:40', '2024-09-02 14:21:50', '1'),
	(3, '10.41', 'Herido por Caida', '2024-09-02 14:17:26', NULL, '1'),
	(4, '20.23', 'Accidente de Transito', '2024-09-02 14:17:41', NULL, '1'),
	(5, '30.30', 'Recarga de balones de Oxigeno', '2024-09-02 14:17:59', NULL, '1');

-- Volcando estructura para tabla bomgestion.movimientos_inventario
CREATE TABLE IF NOT EXISTS `movimientos_inventario` (
  `id_movimiento` int NOT NULL AUTO_INCREMENT,
  `activo_id` int DEFAULT NULL,
  `tipo_movimiento` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `lugar_origen` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `lugar_destino` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_movimiento` date DEFAULT NULL,
  `documento_movimiento` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion_mov` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cantidad_mov` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_movimiento`),
  KEY `activo_id` (`activo_id`),
  CONSTRAINT `movimientos_inventario_ibfk_1` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`id_activo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.movimientos_inventario: ~0 rows (aproximadamente)
INSERT INTO `movimientos_inventario` (`id_movimiento`, `activo_id`, `tipo_movimiento`, `lugar_origen`, `lugar_destino`, `fecha_movimiento`, `documento_movimiento`, `descripcion_mov`, `cantidad_mov`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 1, 'TRASLADO', 'ALMACEN | Piso: 1 | Organo Operativo 136', 'SALA DE MAQUINAS | Piso: 1 | Organo Operativo 136', '2024-09-25', 'DOC M001', 'Se movió a sala de maquinas para revisión.', '1', '2024-09-25 17:36:13', NULL, '1'),
	(2, 2, 'TRASLADO', 'ALMACEN | Piso: 1 | Organo Operativo 136', 'PATIO | Piso: 1 | Organo Operativo 136', '2024-09-26', 'DOC M002', 'Se movió a patio para revisión.', '1', '2024-09-26 13:02:01', NULL, '1'),
	(3, 2, 'DEVOLUCION', 'PATIO | Piso: 1 | Organo Operativo 136', 'ALMACEN | Piso: 1 | Organo Operativo 136', '2024-09-26', 'DOC M003', 'S/O', '1', '2024-09-26 13:03:51', NULL, '1');

-- Volcando estructura para tabla bomgestion.parte
CREATE TABLE IF NOT EXISTS `parte` (
  `id_parte` int NOT NULL AUTO_INCREMENT,
  `cod_parte` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `autoriza_id` int DEFAULT NULL,
  `mando_id` int DEFAULT NULL,
  `administrativo_id` int DEFAULT NULL,
  `motivo_id` int DEFAULT NULL,
  `unidad_vehicular_id` int DEFAULT NULL,
  `mes` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `hora_ingreso` time DEFAULT NULL,
  `km_salida` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `km_ingreso` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion_parte` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `km_recorrido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `horas_recorridas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `abs_combustible` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `observaciones` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_parte`),
  UNIQUE KEY `cod_parte` (`cod_parte`),
  KEY `autoriza_id` (`autoriza_id`),
  KEY `mando_id` (`mando_id`),
  KEY `motivo_id` (`motivo_id`),
  KEY `unidad_id` (`unidad_vehicular_id`),
  KEY `administrativo_id` (`administrativo_id`),
  CONSTRAINT `FK_parte_administrativos` FOREIGN KEY (`administrativo_id`) REFERENCES `administrativos` (`id_administrativo`) ON UPDATE CASCADE,
  CONSTRAINT `FK_parte_autoriza` FOREIGN KEY (`autoriza_id`) REFERENCES `autoriza` (`id_autoriza`) ON UPDATE CASCADE,
  CONSTRAINT `FK_parte_mando` FOREIGN KEY (`mando_id`) REFERENCES `mando` (`id_mando`) ON UPDATE CASCADE,
  CONSTRAINT `FK_parte_motivo` FOREIGN KEY (`motivo_id`) REFERENCES `motivo` (`id_motivo`) ON UPDATE CASCADE,
  CONSTRAINT `FK_parte_unidad_vehicular` FOREIGN KEY (`unidad_vehicular_id`) REFERENCES `unidad_vehicular` (`id_unidad_vehicular`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.parte: ~0 rows (aproximadamente)
INSERT INTO `parte` (`id_parte`, `cod_parte`, `autoriza_id`, `mando_id`, `administrativo_id`, `motivo_id`, `unidad_vehicular_id`, `mes`, `fecha_salida`, `hora_salida`, `fecha_ingreso`, `hora_ingreso`, `km_salida`, `km_ingreso`, `direccion_parte`, `km_recorrido`, `horas_recorridas`, `abs_combustible`, `observaciones`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(21, '19', 1, 8, 8, 2, 1, 'ENERO', '2024-01-06', '11:40:00', '2024-01-06', '12:05:00', '58945', '58952', 'Tren al sur', '7', '0', 'S/A', 'S/O', '2024-09-26 12:10:37', NULL, '1'),
	(22, '33', 2, 1, 17, 3, 1, 'ENERO', '2024-01-13', '08:40:00', '2024-01-13', '09:46:00', '58952', '58962', 'Tren al sur Mz R Lt 1', '10', '0', 'S/AC', 'S/O', '2024-09-26 12:29:41', '2024-09-27 01:06:54', '1');

-- Volcando estructura para tabla bomgestion.permisos
CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` int NOT NULL AUTO_INCREMENT,
  `nombre_url` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.permisos: ~70 rows (aproximadamente)
INSERT INTO `permisos` (`id_permiso`, `nombre_url`, `url`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 'Configuraciones - Institución', '/admin/configuraciones/institucion/index.php', '2024-01-29 07:59:34', '2024-01-29 15:04:54', '1'),
	(2, 'Configuraciones - Institución - Create', '/admin/configuraciones/institucion/create.php', '2024-01-29 08:00:04', '2024-01-29 15:05:02', '1'),
	(9, 'Roles', '/admin/roles/index.php', '2024-01-29 08:09:51', '2024-01-29 15:06:52', '1'),
	(10, 'Roles - Create', '/admin/roles/create.php', '2024-01-29 08:10:03', '2024-01-29 15:06:58', '1'),
	(11, 'Permisos', '/admin/roles/permisos.php', '2024-01-29 08:10:15', '2024-01-29 15:06:34', '1'),
	(12, 'Permisos - create', '/admin/roles/create_permisos.php', '2024-01-29 08:10:55', '2024-01-29 15:06:42', '1'),
	(13, 'Usuarios', '/admin/usuarios/index.php', '2024-01-29 08:11:21', '2024-01-29 15:07:04', '1'),
	(15, 'Administrativos', '/admin/administrativos/index.php', '2024-01-29 08:12:13', '2024-01-29 15:04:33', '1'),
	(16, 'Administrativos - Create', '/admin/administrativos/create.php', '2024-01-29 08:12:44', '2024-01-29 15:04:38', '1'),
	(25, 'Usuarios - Create', '/admin/usuarios/create.php', '2024-01-29 08:51:17', '2024-01-29 15:07:11', '1'),
	(27, 'Principal', '/admin/index.php', '2024-01-29 16:26:13', '2024-01-29 16:26:59', '1'),
	(28, 'Configuración', '/admin/configuraciones/index.php', '2024-01-29 17:38:04', NULL, '1'),
	(29, 'Configuraciones - Institución - Show', '/admin/configuraciones/institucion/show.php', '2024-01-29 17:39:53', NULL, '1'),
	(30, 'Configuraciones - Institución - Update', '/admin/configuraciones/institucion/edit.php', '2024-01-29 17:41:18', NULL, '1'),
	(31, 'Configuración - Gestión', '/admin/configuraciones/gestion/index.php', '2024-01-29 17:42:46', '2024-09-13 23:26:05', '1'),
	(32, 'Configuración - Gestión - Create', '/admin/configuraciones/gestion/create.php', '2024-01-29 17:43:58', '2024-09-13 23:26:17', '1'),
	(33, 'Configuración - Gestión - Show', '/admin/configuraciones/gestion/show.php', '2024-01-29 17:45:04', '2024-09-13 23:26:26', '1'),
	(34, 'Configuración - Gestión - Update', '/admin/configuraciones/gestion/edit.php', '2024-01-29 17:46:17', '2024-09-13 23:26:35', '1'),
	(41, 'Roles - Show', '/admin/roles/show.php', '2024-01-29 18:08:43', NULL, '1'),
	(42, 'Roles - Update', '/admin/roles/edit.php', '2024-01-29 18:09:32', NULL, '1'),
	(43, 'Permisos - Update', '/admin/roles/edit_permiso.php', '2024-01-29 18:11:15', NULL, '1'),
	(44, 'Usuarios - Show', '/admin/usuarios/show.php', '2024-01-29 18:13:01', NULL, '1'),
	(45, 'Usuarios - Update', '/admin/usuarios/edit.php', '2024-01-29 18:13:53', NULL, '1'),
	(46, 'Administrativos - Show', '/admin/administrativos/show.php', '2024-01-29 18:20:25', NULL, '1'),
	(47, 'Administrativos - Update', '/admin/administrativos/edit.php', '2024-01-29 18:21:43', NULL, '1'),
	(59, 'Autoriza', '/admin/personal_autoriza/index.php', '2024-09-01 19:26:56', '2024-09-01 19:28:27', '1'),
	(60, 'Autoriza - Crear', '/admin/personal_autoriza/create.php', '2024-09-01 19:29:43', NULL, '1'),
	(61, 'Autoriza - Editar', '/admin/personal_autoriza/edit.php', '2024-09-01 19:30:10', NULL, '1'),
	(62, 'Autoriza - Ver', '/admin/personal_autoriza/show.php', '2024-09-01 19:30:31', NULL, '1'),
	(63, 'Mando', '/admin/mando/index.php', '2024-09-02 00:19:24', NULL, '1'),
	(64, 'Mando - Ver', '/admin/mando/show.php', '2024-09-02 00:19:57', NULL, '1'),
	(65, 'Mando - Crear', '/admin/mando/create.php', '2024-09-02 00:20:11', NULL, '1'),
	(66, 'Mando - Editar', '/admin/mando/edit.php', '2024-09-02 00:20:29', NULL, '1'),
	(67, 'Motivo', '/admin/motivo/index.php', '2024-09-02 12:44:38', NULL, '1'),
	(68, 'Motivo - Crear', '/admin/motivo/create.php', '2024-09-02 12:44:54', NULL, '1'),
	(69, 'Motivo - Editar', '/admin/motivo/edit.php', '2024-09-02 12:45:07', NULL, '1'),
	(70, 'Motivo - Ver', '/admin/motivo/show.php', '2024-09-02 12:45:19', NULL, '1'),
	(71, 'Unidad Vehicular', '/admin/unidad_vehicular/index.php', '2024-09-02 14:59:44', NULL, '1'),
	(72, 'Unidad Vehicular - Crear', '/admin/unidad_vehicular/create.php', '2024-09-02 15:00:04', NULL, '1'),
	(73, 'Unidad Vehicular - Editar', '/admin/unidad_vehicular/edit.php', '2024-09-02 15:00:19', NULL, '1'),
	(74, 'Unidad Vehicular - Ver', '/admin/unidad_vehicular/show.php', '2024-09-02 15:00:37', NULL, '1'),
	(75, 'Parte', '/admin/parte/index.php', '2024-09-05 23:18:41', NULL, '1'),
	(76, 'Parte - Crear', '/admin/parte/create.php', '2024-09-05 23:19:15', NULL, '1'),
	(77, 'Parte - Ver', '/admin/parte/show.php', '2024-09-05 23:19:38', NULL, '1'),
	(78, 'Parte - Editar', '/admin/parte/edit.php', '2024-09-05 23:19:57', NULL, '1'),
	(79, 'Responsables', '/admin/responsables/index.php', '2024-09-13 23:10:15', NULL, '1'),
	(80, 'Responsables - Crear', '/admin/responsables/create.php', '2024-09-13 23:10:59', NULL, '1'),
	(81, 'Responsables - Editar', '/admin/responsables/edit.php', '2024-09-13 23:11:22', NULL, '1'),
	(82, 'Responsables - Ver', '/admin/responsables/show.php', '2024-09-13 23:11:46', NULL, '1'),
	(83, 'Ubicaciones', '/admin/ubicaciones/index.php', '2024-09-14 11:24:47', NULL, '1'),
	(84, 'Ubicaciones - Crear', '/admin/ubicaciones/create.php', '2024-09-15 23:39:15', NULL, '1'),
	(85, 'Ubicaciones - Editar', '/admin/ubicaciones/edit.php', '2024-09-15 23:39:42', NULL, '1'),
	(86, 'Tipos de Activos', '/admin/tipos_activos/index.php', '2024-09-16 12:19:32', NULL, '1'),
	(87, 'Tipos de Activos - Crear', '/admin/tipos_activos/create.php', '2024-09-16 12:19:50', NULL, '1'),
	(88, 'Tipos de Activos - Editar', '/admin/tipos_activos/edit.php', '2024-09-16 12:20:22', NULL, '1'),
	(89, 'Activos', '/admin/activos/index.php', '2024-09-16 17:55:00', NULL, '1'),
	(90, 'Activos - Crear', '/admin/activos/create.php', '2024-09-16 17:55:20', NULL, '1'),
	(91, 'Activos - Editar', '/admin/activos/edit.php', '2024-09-16 17:55:33', NULL, '1'),
	(92, 'Activos - Ver', '/admin/activos/show.php', '2024-09-16 17:56:21', NULL, '1'),
	(93, 'Etiquetas', '/admin/etiquetas/index.php', '2024-09-17 17:41:55', NULL, '1'),
	(94, 'Etiquetas - Crear', '/admin/etiquetas/create.php', '2024-09-17 17:42:33', NULL, '1'),
	(95, 'Etiquetas - Editar', '/admin/etiquetas/edit.php', '2024-09-17 17:42:49', NULL, '1'),
	(96, 'Movimientos Inventario', '/admin/movimientos_inventarios/index.php', '2024-09-18 00:29:24', NULL, '1'),
	(97, 'Movimientos Inventario - Crear', '/admin/movimientos_inventarios/create.php', '2024-09-18 00:29:42', NULL, '1'),
	(98, 'Movimientos Inventario - Editar', '/admin/movimientos_inventarios/edit.php', '2024-09-18 00:30:03', NULL, '1'),
	(99, 'Movimientos Inventario - Ver', '/admin/movimientos_inventarios/show.php', '2024-09-18 00:30:34', NULL, '1'),
	(100, 'Historial Ubicaciones', '/admin/historial_ubicaciones/index.php', '2024-09-18 16:33:52', NULL, '1'),
	(101, 'Stock x Tipos', '/admin/stock/index.php', '2024-09-18 16:35:42', '2024-09-20 16:33:25', '1'),
	(102, 'Stock x Activos', '/admin/stock/ListaStockActivos.php', '2024-09-20 16:33:14', NULL, '1');

-- Volcando estructura para tabla bomgestion.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `id_persona` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `cod_conductor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `ci` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_nacimiento` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `profesion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `celular` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.personas: ~5 rows (aproximadamente)
INSERT INTO `personas` (`id_persona`, `usuario_id`, `cod_conductor`, `nombres`, `apellidos`, `ci`, `fecha_nacimiento`, `profesion`, `direccion`, `celular`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 1, NULL, 'Freddy Eddy', 'Hilari Michua', '12345678', '10/10/1990', 'LICENCIADO EN EDUCACIÓN', 'Zona Los Pinos Av. Las Rosas Nro 100', '75657007', '2023-12-28 20:29:10', NULL, '1'),
	(66, 70, '246. Roman', 'Roman', 'Acero Oliva', '71062876', '1998-02-28', 'ING. SISTEMAS E INFORMÁTICA', 'Villa Primavera', '987668105', '2024-08-03 01:22:08', '2024-09-23 23:57:23', '1'),
	(96, 110, 'S/CC', 'Acero', 'Dev', '71062876', '1998-02-28', 'Admin', 'General', '951241733', '2024-08-25 22:46:04', '2024-09-27 00:01:03', '1'),
	(102, 117, '3.08 Alvarez', 'Carlos', 'Alavarez Irco', '777', '1111-11-11', 'Sin registro', 'Sin registro', '999', '2024-09-06 01:53:11', '2024-09-23 21:08:19', '1'),
	(104, 119, '10.49 Acero', 'Juan Victor', 'Acero Oliva', '74747474', '2024-09-13', 'Maquinista', 'Las Glorietas Mz15 Lt21', '951258596', '2024-09-13 20:10:11', '2024-09-26 13:13:58', '1'),
	(105, 120, '10.49 J. condori', 'J', 'Condori', '777', '2024-09-23', 'Maquinista', 'Sin registro', '999', '2024-09-23 21:06:23', '2024-09-23 21:06:33', '1'),
	(106, 121, '', 'ALCIDES', 'ZAPANA', '777', '2024-09-26', 'JEFE SERVICIOS', 'Sin registro', '999', '2024-09-26 13:16:11', NULL, '1');

-- Volcando estructura para tabla bomgestion.ppffs
CREATE TABLE IF NOT EXISTS `ppffs` (
  `id_ppff` int NOT NULL AUTO_INCREMENT,
  `estudiante_id` int NOT NULL,
  `nombres_apellidos_ppff` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `ci_ppf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `celular_ppff` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `ocupacion_ppff` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `ref_nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `ref_parentezco` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `ref_celular` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_ppff`),
  KEY `estudiante_id` (`estudiante_id`),
  CONSTRAINT `ppffs_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id_estudiante`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.ppffs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bomgestion.responsables
CREATE TABLE IF NOT EXISTS `responsables` (
  `id_responsable` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cargo` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `contacto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_responsable`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.responsables: ~4 rows (aproximadamente)
INSERT INTO `responsables` (`id_responsable`, `nombres`, `cargo`, `contacto`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 'S/N', 'S/C', '999', '2024-09-13 23:48:10', '2024-09-23 18:33:24', '1'),
	(2, 'RAMOS MEJIA, DANTE IVÁN', 'Sin registro', '999', '2024-09-13 23:59:57', NULL, '1'),
	(3, 'ALVAREZ IRCO, CARLOS', 'Teniente', '951241722', '2024-09-14 01:01:58', '2024-09-14 10:44:08', '1'),
	(4, 'NomPrue', 'Tecnico Operativo', '999', '2024-09-14 10:46:30', '2024-09-25 18:04:22', '1'),
	(10, 'GUTIERREZ VARGAS, VÍCTOR FILIBERTO', 'Teniente', '999', '2024-09-26 12:40:50', NULL, '1');

-- Volcando estructura para tabla bomgestion.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `nombre_rol` (`nombre_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.roles: ~6 rows (aproximadamente)
INSERT INTO `roles` (`id_rol`, `nombre_rol`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 'ADMINISTRADOR', '2024-01-03 16:20:20', NULL, '1'),
	(3, 'SEGUNDO JEFE', '2024-01-03 16:20:20', '2024-09-26 13:09:49', '1'),
	(4, 'JEFE DE MAQUINA', '2024-01-03 16:20:20', '2024-09-26 13:08:30', '1'),
	(5, 'JEFE DE SERVICIOS', '2024-01-03 16:20:20', '2024-09-26 13:08:47', '1'),
	(9, 'CONDUCTOR', '2024-08-30 00:21:39', '2024-09-01 18:11:32', '1');

-- Volcando estructura para tabla bomgestion.roles_permisos
CREATE TABLE IF NOT EXISTS `roles_permisos` (
  `id_rol_permiso` int NOT NULL AUTO_INCREMENT,
  `rol_id` int NOT NULL,
  `permiso_id` int NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_rol_permiso`),
  KEY `rol_id` (`rol_id`),
  KEY `permiso_id` (`permiso_id`),
  CONSTRAINT `roles_permisos_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE,
  CONSTRAINT `roles_permisos_ibfk_2` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id_permiso`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=292 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.roles_permisos: ~85 rows (aproximadamente)
INSERT INTO `roles_permisos` (`id_rol_permiso`, `rol_id`, `permiso_id`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(5, 1, 1, '2024-01-29 12:55:45', NULL, '1'),
	(19, 1, 11, '2024-01-29 12:56:30', NULL, '1'),
	(20, 1, 12, '2024-01-29 12:56:34', NULL, '1'),
	(36, 1, 9, '2024-01-29 12:58:26', NULL, '1'),
	(37, 1, 10, '2024-01-29 12:58:30', NULL, '1'),
	(38, 1, 13, '2024-01-29 12:58:32', NULL, '1'),
	(39, 1, 25, '2024-01-29 12:58:35', NULL, '1'),
	(40, 3, 15, '2024-01-29 12:58:55', NULL, '1'),
	(41, 3, 16, '2024-01-29 12:58:58', NULL, '1'),
	(42, 3, 1, '2024-01-29 12:59:07', NULL, '1'),
	(43, 3, 2, '2024-01-29 12:59:09', NULL, '1'),
	(62, 1, 27, '2024-01-29 16:26:26', NULL, '1'),
	(64, 3, 27, '2024-01-29 16:26:42', NULL, '1'),
	(69, 1, 28, '2024-01-29 17:38:15', NULL, '1'),
	(71, 3, 28, '2024-01-29 17:38:43', NULL, '1'),
	(72, 1, 29, '2024-01-29 17:40:07', NULL, '1'),
	(74, 3, 29, '2024-01-29 17:40:26', NULL, '1'),
	(75, 1, 30, '2024-01-29 17:41:29', NULL, '1'),
	(77, 3, 30, '2024-01-29 17:41:41', NULL, '1'),
	(78, 1, 31, '2024-01-29 17:43:01', NULL, '1'),
	(80, 3, 31, '2024-01-29 17:43:12', NULL, '1'),
	(81, 1, 32, '2024-01-29 17:44:09', NULL, '1'),
	(83, 3, 32, '2024-01-29 17:44:20', NULL, '1'),
	(84, 1, 33, '2024-01-29 17:45:16', NULL, '1'),
	(86, 3, 33, '2024-01-29 17:45:30', NULL, '1'),
	(87, 1, 34, '2024-01-29 17:46:24', NULL, '1'),
	(89, 3, 34, '2024-01-29 17:46:42', NULL, '1'),
	(102, 1, 41, '2024-01-29 18:08:55', NULL, '1'),
	(103, 1, 42, '2024-01-29 18:09:47', NULL, '1'),
	(104, 1, 43, '2024-01-29 18:11:26', NULL, '1'),
	(105, 1, 44, '2024-01-29 18:13:10', NULL, '1'),
	(106, 1, 45, '2024-01-29 18:14:00', NULL, '1'),
	(107, 1, 46, '2024-01-29 18:20:33', NULL, '1'),
	(109, 3, 46, '2024-01-29 18:20:51', NULL, '1'),
	(111, 1, 47, '2024-01-29 18:21:50', NULL, '1'),
	(113, 3, 47, '2024-01-29 18:22:01', NULL, '1'),
	(140, 1, 15, '2024-02-05 15:20:49', NULL, '1'),
	(171, 9, 27, '2024-09-01 18:15:42', NULL, '1'),
	(172, 1, 59, '2024-09-01 19:27:10', NULL, '1'),
	(173, 1, 60, '2024-09-01 19:30:40', NULL, '1'),
	(174, 1, 61, '2024-09-01 19:30:44', NULL, '1'),
	(175, 1, 62, '2024-09-01 19:30:47', NULL, '1'),
	(176, 1, 63, '2024-09-02 00:21:06', NULL, '1'),
	(177, 1, 65, '2024-09-02 00:21:12', NULL, '1'),
	(178, 1, 66, '2024-09-02 00:21:35', NULL, '1'),
	(179, 1, 64, '2024-09-02 00:21:49', NULL, '1'),
	(180, 1, 67, '2024-09-02 12:45:38', NULL, '1'),
	(181, 1, 68, '2024-09-02 12:45:44', NULL, '1'),
	(182, 1, 69, '2024-09-02 12:46:04', NULL, '1'),
	(183, 1, 70, '2024-09-02 12:46:10', NULL, '1'),
	(184, 1, 71, '2024-09-02 15:00:49', NULL, '1'),
	(185, 1, 72, '2024-09-02 15:00:53', NULL, '1'),
	(186, 1, 73, '2024-09-02 15:00:56', NULL, '1'),
	(187, 1, 74, '2024-09-02 15:01:00', NULL, '1'),
	(188, 1, 75, '2024-09-05 23:20:56', NULL, '1'),
	(189, 1, 76, '2024-09-05 23:21:03', NULL, '1'),
	(190, 1, 78, '2024-09-05 23:21:11', NULL, '1'),
	(191, 1, 77, '2024-09-05 23:21:16', NULL, '1'),
	(193, 9, 62, '2024-09-07 13:33:48', NULL, '1'),
	(194, 9, 75, '2024-09-07 13:38:04', NULL, '1'),
	(195, 9, 76, '2024-09-07 13:38:15', NULL, '1'),
	(196, 9, 78, '2024-09-07 13:38:21', NULL, '1'),
	(197, 9, 77, '2024-09-07 13:38:25', NULL, '1'),
	(198, 9, 63, '2024-09-07 13:39:30', NULL, '1'),
	(199, 9, 64, '2024-09-07 13:39:36', NULL, '1'),
	(200, 9, 67, '2024-09-07 13:39:46', NULL, '1'),
	(201, 9, 70, '2024-09-07 13:39:50', NULL, '1'),
	(202, 9, 71, '2024-09-07 13:39:56', NULL, '1'),
	(203, 9, 74, '2024-09-07 13:40:01', NULL, '1'),
	(204, 1, 16, '2024-09-13 20:06:38', NULL, '1'),
	(206, 9, 59, '2024-09-13 20:36:52', NULL, '1'),
	(207, 5, 27, '2024-09-13 23:07:49', NULL, '1'),
	(208, 4, 27, '2024-09-13 23:08:35', NULL, '1'),
	(209, 1, 79, '2024-09-13 23:12:43', NULL, '1'),
	(210, 1, 80, '2024-09-13 23:12:52', NULL, '1'),
	(211, 1, 81, '2024-09-13 23:12:56', NULL, '1'),
	(214, 1, 83, '2024-09-15 23:39:59', NULL, '1'),
	(215, 1, 84, '2024-09-15 23:40:18', NULL, '1'),
	(216, 1, 85, '2024-09-15 23:40:23', NULL, '1'),
	(217, 1, 2, '2024-09-16 00:49:33', NULL, '1'),
	(218, 1, 86, '2024-09-16 12:20:51', NULL, '1'),
	(219, 1, 87, '2024-09-16 12:20:55', NULL, '1'),
	(220, 1, 88, '2024-09-16 12:21:00', NULL, '1'),
	(221, 1, 89, '2024-09-16 17:55:45', NULL, '1'),
	(222, 1, 90, '2024-09-16 17:55:52', NULL, '1'),
	(223, 1, 91, '2024-09-16 17:55:55', NULL, '1'),
	(224, 1, 92, '2024-09-16 17:56:29', NULL, '1'),
	(225, 1, 93, '2024-09-17 17:48:56', NULL, '1'),
	(226, 1, 94, '2024-09-17 17:49:00', NULL, '1'),
	(227, 1, 95, '2024-09-17 17:49:04', NULL, '1'),
	(228, 1, 96, '2024-09-18 00:31:02', NULL, '1'),
	(229, 1, 97, '2024-09-18 00:31:08', NULL, '1'),
	(230, 1, 98, '2024-09-18 00:31:11', NULL, '1'),
	(231, 1, 99, '2024-09-18 00:31:15', NULL, '1'),
	(232, 1, 100, '2024-09-18 16:34:08', NULL, '1'),
	(233, 1, 101, '2024-09-18 16:36:00', NULL, '1'),
	(234, 1, 102, '2024-09-20 16:33:52', NULL, '1'),
	(235, 9, 89, '2024-09-26 13:12:03', NULL, '1'),
	(237, 3, 89, '2024-09-26 23:37:59', NULL, '1'),
	(238, 3, 90, '2024-09-26 23:38:03', NULL, '1'),
	(239, 3, 91, '2024-09-26 23:38:18', NULL, '1'),
	(240, 3, 92, '2024-09-26 23:38:53', NULL, '1'),
	(241, 3, 59, '2024-09-26 23:39:05', NULL, '1'),
	(242, 3, 60, '2024-09-26 23:39:09', NULL, '1'),
	(243, 3, 61, '2024-09-26 23:39:12', NULL, '1'),
	(244, 3, 62, '2024-09-26 23:39:15', NULL, '1'),
	(245, 3, 93, '2024-09-26 23:39:59', NULL, '1'),
	(246, 3, 94, '2024-09-26 23:40:10', NULL, '1'),
	(247, 3, 95, '2024-09-26 23:40:46', NULL, '1'),
	(248, 3, 100, '2024-09-26 23:48:53', NULL, '1'),
	(249, 3, 63, '2024-09-26 23:49:03', NULL, '1'),
	(250, 3, 65, '2024-09-26 23:49:10', NULL, '1'),
	(251, 3, 66, '2024-09-26 23:49:15', NULL, '1'),
	(252, 3, 64, '2024-09-26 23:49:18', NULL, '1'),
	(253, 3, 67, '2024-09-26 23:51:56', NULL, '1'),
	(254, 3, 68, '2024-09-26 23:52:00', NULL, '1'),
	(255, 3, 69, '2024-09-26 23:52:05', NULL, '1'),
	(256, 3, 70, '2024-09-26 23:52:09', NULL, '1'),
	(257, 3, 96, '2024-09-26 23:52:15', NULL, '1'),
	(258, 3, 97, '2024-09-26 23:52:19', NULL, '1'),
	(259, 3, 98, '2024-09-26 23:52:22', NULL, '1'),
	(260, 3, 99, '2024-09-26 23:52:26', NULL, '1'),
	(261, 3, 75, '2024-09-26 23:53:32', NULL, '1'),
	(262, 3, 76, '2024-09-26 23:53:35', NULL, '1'),
	(263, 3, 78, '2024-09-26 23:53:39', NULL, '1'),
	(264, 3, 77, '2024-09-26 23:53:42', NULL, '1'),
	(265, 3, 11, '2024-09-26 23:53:55', NULL, '1'),
	(266, 3, 12, '2024-09-26 23:53:59', NULL, '1'),
	(267, 3, 43, '2024-09-26 23:54:05', NULL, '1'),
	(268, 3, 79, '2024-09-26 23:54:20', NULL, '1'),
	(269, 3, 80, '2024-09-26 23:54:31', NULL, '1'),
	(270, 3, 81, '2024-09-26 23:54:35', NULL, '1'),
	(271, 3, 82, '2024-09-26 23:54:38', NULL, '1'),
	(272, 3, 9, '2024-09-26 23:54:44', NULL, '1'),
	(273, 3, 10, '2024-09-26 23:54:47', NULL, '1'),
	(274, 3, 41, '2024-09-26 23:54:51', NULL, '1'),
	(275, 3, 42, '2024-09-26 23:54:55', NULL, '1'),
	(276, 3, 102, '2024-09-26 23:55:09', NULL, '1'),
	(277, 3, 101, '2024-09-26 23:55:14', NULL, '1'),
	(278, 3, 86, '2024-09-26 23:55:50', NULL, '1'),
	(279, 3, 87, '2024-09-26 23:55:53', NULL, '1'),
	(280, 3, 88, '2024-09-26 23:55:58', NULL, '1'),
	(281, 3, 83, '2024-09-26 23:56:02', NULL, '1'),
	(282, 3, 84, '2024-09-26 23:56:07', NULL, '1'),
	(283, 3, 85, '2024-09-26 23:56:37', NULL, '1'),
	(284, 3, 71, '2024-09-26 23:56:46', NULL, '1'),
	(285, 3, 72, '2024-09-26 23:56:50', NULL, '1'),
	(286, 3, 73, '2024-09-26 23:56:56', NULL, '1'),
	(287, 3, 74, '2024-09-26 23:56:59', NULL, '1'),
	(288, 3, 13, '2024-09-26 23:57:02', NULL, '1'),
	(289, 3, 25, '2024-09-26 23:57:06', NULL, '1'),
	(290, 3, 44, '2024-09-26 23:57:10', NULL, '1'),
	(291, 3, 45, '2024-09-26 23:57:13', NULL, '1');

-- Volcando estructura para tabla bomgestion.stock
CREATE TABLE IF NOT EXISTS `stock` (
  `id_stock` int NOT NULL AUTO_INCREMENT,
  `tipo_activo_id` int DEFAULT NULL,
  `ubicacion_id` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_stock`),
  UNIQUE KEY `tipo_activo_id_ubicacion_id` (`tipo_activo_id`,`ubicacion_id`),
  KEY `ubicacion_id` (`ubicacion_id`),
  KEY `activo_id` (`tipo_activo_id`) USING BTREE,
  CONSTRAINT `FK_stock_tipos_activos` FOREIGN KEY (`tipo_activo_id`) REFERENCES `tipos_activos` (`id_tipo`),
  CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicaciones` (`id_ubicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.stock: ~2 rows (aproximadamente)
INSERT INTO `stock` (`id_stock`, `tipo_activo_id`, `ubicacion_id`, `cantidad`, `fecha_actualizacion`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(25, 2, 2, 0, '2024-09-25 17:36:13', '2024-09-25 17:16:26', NULL, '1'),
	(26, 2, 1, 1, '2024-09-25 17:36:13', '2024-09-25 17:36:13', NULL, '1'),
	(27, 4, 2, 1, '2024-09-26 13:03:51', '2024-09-26 13:03:51', NULL, '1'),
	(28, 11, 2, 1, '2024-09-26 12:45:57', '2024-09-26 12:45:57', NULL, '1'),
	(29, 4, 5, 0, '2024-09-26 13:03:51', '2024-09-26 13:02:01', NULL, '1');

-- Volcando estructura para tabla bomgestion.tipos_activos
CREATE TABLE IF NOT EXISTS `tipos_activos` (
  `id_tipo` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `categoria_tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.tipos_activos: ~8 rows (aproximadamente)
INSERT INTO `tipos_activos` (`id_tipo`, `descripcion`, `categoria_tipo`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 'S/T', 'S/C', '2024-09-16 12:34:02', '2024-09-18 18:51:18', '1'),
	(2, 'Ambulancia', 'Vehículo', '2024-09-16 12:46:26', '2024-09-18 18:51:53', '1'),
	(3, 'Arnes De Aire Autocontenido', 'S/C', '2024-09-16 14:10:46', '2024-09-18 19:12:21', '1'),
	(4, 'Automovil', 'Vehículo', '2024-09-16 14:25:50', '2024-09-18 18:52:03', '1'),
	(5, 'Camarote De Metal', NULL, '2024-09-18 18:39:29', NULL, '1'),
	(6, 'Camilla De Madera', 'Sin categoría', '2024-09-18 18:45:12', NULL, '1'),
	(9, 'Camilla De Metal', 'S/C', '2024-09-18 19:12:39', NULL, '1'),
	(10, 'Camioneta', 'Vehículo', '2024-09-18 22:58:48', NULL, '1'),
	(11, 'Escalera Telescopica', 'HERRAMIENTAS', '2024-09-26 12:34:26', NULL, '1');

-- Volcando estructura para tabla bomgestion.ubicaciones
CREATE TABLE IF NOT EXISTS `ubicaciones` (
  `id_ubicacion` int NOT NULL AUTO_INCREMENT,
  `config_institucion_id` int DEFAULT NULL,
  `responsable_id` int DEFAULT NULL,
  `piso` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dependencia_ubi` varchar(150) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dependencia_area` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_ubicacion`),
  KEY `config_institucion_id` (`config_institucion_id`),
  KEY `responsable_id` (`responsable_id`),
  CONSTRAINT `ubicaciones_ibfk_1` FOREIGN KEY (`config_institucion_id`) REFERENCES `configuracion_instituciones` (`id_config_institucion`),
  CONSTRAINT `ubicaciones_ibfk_2` FOREIGN KEY (`responsable_id`) REFERENCES `responsables` (`id_responsable`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.ubicaciones: ~7 rows (aproximadamente)
INSERT INTO `ubicaciones` (`id_ubicacion`, `config_institucion_id`, `responsable_id`, `piso`, `dependencia_ubi`, `dependencia_area`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 1, 3, '1', 'Organo Operativo 136', 'SALA DE MAQUINAS', '2024-09-14 11:39:32', '2024-09-26 23:58:33', '1'),
	(2, 1, 3, '1', 'Organo Operativo 136', 'ALMACEN', '2024-09-15 00:15:31', '2024-09-19 21:57:23', '1'),
	(3, 1, 2, '4', 'Organo Operativo 136', 'JEFATURA', '2024-09-15 00:16:52', '2024-09-15 02:03:11', '1'),
	(5, 1, 3, '1', 'Organo Operativo 136', 'PATIO', '2024-09-16 00:05:49', '2024-09-21 17:36:15', '1'),
	(8, 1, 3, '1', 'Organo Operativo 136', 'DORMITORIO DAMAS - VARONES', '2024-09-20 11:22:18', '2024-09-20 11:28:25', '1'),
	(9, 1, 3, '1', 'Organo Operativo 136', 'NO ESPECIFICADOS', '2024-09-20 11:23:27', '2024-09-26 12:36:18', '1'),
	(10, 1, 3, '1', 'Organo Operativo 136', 'CENTRO DE ACOPIO', '2024-09-20 12:42:48', NULL, '1'),
	(11, 1, 3, '1', 'Organo Operativo 136', 'COCINA', '2024-09-26 12:38:47', NULL, '1');

-- Volcando estructura para tabla bomgestion.unidad_vehicular
CREATE TABLE IF NOT EXISTS `unidad_vehicular` (
  `id_unidad_vehicular` int NOT NULL AUTO_INCREMENT,
  `activo_id` int DEFAULT NULL,
  `placa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `categoria` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ano_fab` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `numero_motor` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `numero_chasis` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_unidad_vehicular`),
  KEY `activo_id` (`activo_id`),
  CONSTRAINT `FK_unidad_vehicular_activos` FOREIGN KEY (`activo_id`) REFERENCES `activos` (`id_activo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.unidad_vehicular: ~0 rows (aproximadamente)
INSERT INTO `unidad_vehicular` (`id_unidad_vehicular`, `activo_id`, `placa`, `categoria`, `ano_fab`, `numero_motor`, `numero_chasis`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 1, 'EUB-997', 'M2', '2013', 'F1AE0481D', 'ZFA250000-D2329539', '2024-09-25 17:16:26', NULL, '1'),
	(2, 2, 'S/P', 'M1', '', 'S/NM', 'S/NC', '2024-09-26 12:23:13', '2024-09-26 12:23:36', '1');

-- Volcando estructura para tabla bomgestion.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `rol_id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`),
  KEY `rol_id` (`rol_id`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla bomgestion.usuarios: ~6 rows (aproximadamente)
INSERT INTO `usuarios` (`id_usuario`, `rol_id`, `email`, `password`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
	(1, 1, 'admin@admin.com', '$2y$10$2onmGUKD3o2lEpMHYBbrvOHgraltpbEOZ1fdnVHckGdbHWa8Veufe', '2023-12-28 20:29:10', '2024-08-04 23:54:29', '1'),
	(70, 1, 'aceroolivaroman@gmail.com', '$2y$10$4Cu1lNm7HQPS74K.2pwRBepgWhenOIZs1cY7j.pKRyKlM5kXanaF2', '2024-08-03 01:22:08', '2024-09-24 13:23:30', '1'),
	(110, 1, 'acerodev@gmail.com', '$2y$10$.uZFucml4lNvIbMVVf3jh.GmZSBIA/bvzyHPslJ2yioJH/CZTXE.i', '2024-08-25 22:46:04', '2024-09-27 00:01:03', '1'),
	(117, 1, 'carlosalvarez@ejemplo.com', '$2y$10$c0ssDr/NXHNxxprhsb9INeO1bH/wrQLRyo8y3lHSTLf91KXJ7RgX6', '2024-09-06 01:53:11', '2024-09-23 21:08:19', '1'),
	(119, 9, 'juanacero@gmail.com', '$2y$10$SMAr0yRqFcV3msOpABSkYOW7.plhCK3/r.Cyo6Oh/.PpxZVtm12TW', '2024-09-13 20:10:11', '2024-09-26 13:13:58', '1'),
	(120, 9, 'jcondori@ejemplo.com', '$2y$10$EBX96YJ95B4q7kezcg4miOWA84a0aI.5Gqd.0bRd4eGLopNcbScLW', '2024-09-23 21:06:23', '2024-09-23 21:06:33', '1'),
	(121, 5, 'alcideszapana@ejemplo.com', '$2y$10$uxXHMllOGmMFSlaFvTcy3.ptU61DL9Q.8zniylL9tVvA1FYeq74D2', '2024-09-26 13:16:11', NULL, '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
