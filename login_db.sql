-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para illustik
CREATE DATABASE IF NOT EXISTS `illustik` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `illustik`;

-- Volcando estructura para tabla illustik.especialidades
CREATE TABLE IF NOT EXISTS `especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_trabajador` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_trabajador` (`id_trabajador`),
  KEY `id_servicio` (`id_servicio`),
  CONSTRAINT `especialidades_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `especialidades_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla illustik.especialidades: ~0 rows (aproximadamente)

-- Volcando estructura para tabla illustik.horarios
CREATE TABLE IF NOT EXISTS `horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_negocio` int(11) NOT NULL,
  `dia` enum('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo') DEFAULT NULL,
  `hora_apertura` time DEFAULT NULL,
  `hora_cierre` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_negocio` (`id_negocio`),
  CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_negocio`) REFERENCES `negocios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla illustik.horarios: ~0 rows (aproximadamente)

-- Volcando estructura para tabla illustik.metodos_pago
CREATE TABLE IF NOT EXISTS `metodos_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla illustik.metodos_pago: ~4 rows (aproximadamente)
INSERT INTO `metodos_pago` (`id`, `nombre`) VALUES
	(1, 'Efectivo'),
	(2, 'Nequi'),
	(3, 'Tarjeta'),
	(4, 'Transferencia');

-- Volcando estructura para tabla illustik.negocios
CREATE TABLE IF NOT EXISTS `negocios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_propietario` int(11) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_propietario` (`id_propietario`),
  CONSTRAINT `negocios_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla illustik.negocios: ~2 rows (aproximadamente)
INSERT INTO `negocios` (`id`, `nombre`, `direccion`, `descripcion`, `id_propietario`, `creado_en`) VALUES
	(2, 'Barbería XYZ', 'Calle 123', 'Barbería de confianza', 2, '2025-04-25 19:53:56'),
	(4, 'Barbería XYZ', 'Calle 123', 'Barbería de confianza', 3, '2025-04-25 19:54:16');

-- Volcando estructura para tabla illustik.reservas
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `telefono_cliente` varchar(20) DEFAULT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  `id_metodo_pago` int(11) DEFAULT NULL,
  `estado` enum('pendiente','confirmada','cancelada','completada') DEFAULT 'pendiente',
  `estado_pago` enum('pendiente','pagado','fallido') DEFAULT 'pendiente',
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_servicio` (`id_servicio`),
  KEY `id_trabajador` (`id_trabajador`),
  KEY `id_metodo_pago` (`id_metodo_pago`),
  CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajadores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodos_pago` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla illustik.reservas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla illustik.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `id_negocio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_negocio` (`id_negocio`),
  CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`id_negocio`) REFERENCES `negocios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla illustik.servicios: ~0 rows (aproximadamente)
INSERT INTO `servicios` (`id`, `nombre`, `descripcion`, `precio`, `duracion`, `id_negocio`) VALUES
	(8, 'Manicura', 'hola', 60000.00, 30, 2);

-- Volcando estructura para tabla illustik.trabajadores
CREATE TABLE IF NOT EXISTS `trabajadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_negocio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_negocio` (`id_negocio`),
  CONSTRAINT `trabajadores_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL,
  CONSTRAINT `trabajadores_ibfk_2` FOREIGN KEY (`id_negocio`) REFERENCES `negocios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla illustik.trabajadores: ~0 rows (aproximadamente)

-- Volcando estructura para tabla illustik.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `creado_en` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla illustik.usuarios: ~1 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `telefono`, `password`, `creado_en`) VALUES
	(2, 'Andrés Esteban Pardo Avila', 'avilaandres765@gmail.com', '3216612123', '$2y$10$rZP/xSOKbJ7ideR1932Vie/940kwrckn4yDCftBD8iFFN58beNaK2', '2025-04-25 17:46:20'),
	(3, 'allison natalia bolivar gomez', 'allisonbolivar@gmail.com', '3545851236', '$2y$10$xOUPgXJ1OKhaiyk9oRdl6e0U3G4ao4z0e.3GGuF7x.MF72OD48l8a', '2025-04-25 19:48:14');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
