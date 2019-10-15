-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.3.16-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para intranet
CREATE DATABASE IF NOT EXISTS `intranet` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `intranet`;

-- Volcando estructura para tabla intranet.elemento
CREATE TABLE IF NOT EXISTS `elemento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_seccion` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechamodificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intranet.elemento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `elemento` DISABLE KEYS */;
INSERT INTO `elemento` (`id`, `id_seccion`, `nombre`, `descripcion`, `estado`, `fechacreacion`, `fechamodificacion`) VALUES
	(1, 1, 'banner-area', 'Elementos del área de banner', 1, '2019-05-27 13:32:12', '2019-05-27 13:32:12');
/*!40000 ALTER TABLE `elemento` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.imagenes
CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_seccion` int(11) NOT NULL,
  `id_elemento` int(11) NOT NULL,
  `url` varchar(250) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechamodificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intranet.imagenes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
INSERT INTO `imagenes` (`id`, `id_seccion`, `id_elemento`, `url`, `descripcion`, `estado`, `fechacreacion`, `fechamodificacion`) VALUES
	(1, 1, 1, './vista/landing/images/ana_banner_2.jpg', 'Imagen principal de cabecera de página', 1, '2019-05-27 14:29:59', '2019-05-27 14:33:23');
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.login_code
CREATE TABLE IF NOT EXISTS `login_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codusuario` varchar(250) NOT NULL,
  `hashcode` varchar(250) NOT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechamodificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intranet.login_code: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `login_code` DISABLE KEYS */;
INSERT INTO `login_code` (`id`, `codusuario`, `hashcode`, `fechacreacion`, `fechamodificacion`) VALUES
	(1, 'admin', '$2y$10$QWST/jWuzw4UwOTQWD2Fr.b/9eKdXbXrllp0UVR.aV7Tn2ZkVKWKC', '2019-05-27 16:13:31', '2019-05-27 16:13:31'),
	(2, 'jperezf', '$2y$10$L5fIvqw.C4C3a.Fpx0Tcf.BWoLbXykfWsu6igIA8PLAqwFZCYSZo6', '2019-05-27 16:13:31', '2019-05-27 16:13:31'),
	(3, 'fherrera', '$2y$10$tFGpM8EI4XT4ejHjY.1BbOIkxRzsTbCAh2oaM3xynsJeyjR1PAL.W', '2019-05-27 16:13:31', '2019-05-27 16:13:31');
/*!40000 ALTER TABLE `login_code` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `ref` varchar(250) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechamodificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intranet.menu: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `nombre`, `ref`, `descripcion`, `estado`, `fechacreacion`, `fechamodificacion`) VALUES
	(1, 'Inicio', 'home-section', 'Página de inicio', 1, '2019-05-27 13:07:38', '2019-05-27 13:07:38'),
	(2, 'Acerca De', 'about-section', 'Sección informativa acerca de la vida de Ana Sayán', 1, '2019-05-27 13:07:38', '2019-05-27 13:07:38'),
	(3, 'Entrenamiento', 'training-section', 'Sección Our Training', 1, '2019-05-27 13:07:38', '2019-05-27 13:07:38'),
	(4, 'Equipo', 'team-section', 'Sección Equipo', 1, '2019-05-27 13:07:38', '2019-05-27 14:45:32'),
	(5, 'Servicios', 'services-section', 'Sección Services', 1, '2019-05-27 13:07:38', '2019-05-27 13:09:10'),
	(6, 'Testimonios', 'testimonials-section', 'Sección Testimonios', 1, '2019-05-27 13:07:38', '2019-05-27 13:07:38'),
	(7, 'Blog', 'blog-section', 'Sección Blog', 1, '2019-05-27 13:07:38', '2019-05-27 13:07:38'),
	(8, 'Contacto', 'contact-section', 'Sección Contacto', 1, '2019-05-27 13:07:38', '2019-05-27 13:07:38');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `nombre1` varchar(150) DEFAULT NULL,
  `nombre2` varchar(150) DEFAULT NULL,
  `apellido1` varchar(150) DEFAULT NULL,
  `apellido2` varchar(150) DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechamodificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intranet.personas: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` (`id`, `idusuario`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `estado`, `fechacreacion`, `fechamodificacion`) VALUES
	(1, 1, 'Administrador', '', '', '', 1, '2019-05-27 16:11:22', '2019-05-27 16:11:22'),
	(2, 2, 'Jaime', 'Arturo', 'Pérez', 'Frias', 1, '2019-05-27 16:11:22', '2019-05-27 16:11:22'),
	(3, 3, 'Elma', 'Flora', 'Herrera', 'Guevara', 1, '2019-05-27 16:11:22', '2019-05-27 16:11:22');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.secciones
CREATE TABLE IF NOT EXISTS `secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `ref` varchar(250) NOT NULL,
  `estado` int(11) DEFAULT 1,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechamodificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intranet.secciones: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `secciones` DISABLE KEYS */;
INSERT INTO `secciones` (`id`, `nombre`, `descripcion`, `ref`, `estado`, `fechacreacion`, `fechamodificacion`) VALUES
	(1, 'banner', 'Sección central de cabecera de página', '', 1, '2019-05-27 13:24:05', '2019-05-27 13:24:05'),
	(2, 'offers', 'Sección ofertas', '', 1, '2019-05-27 13:24:05', '2019-05-27 13:24:05'),
	(3, 'about', 'Sección about', 'about-section', 1, '2019-05-27 13:24:05', '2019-05-27 13:24:05'),
	(4, 'training', 'Sección training', 'training-section', 1, '2019-05-27 13:24:05', '2019-05-27 13:24:05'),
	(5, 'team', 'Sección team', 'team-section', 1, '2019-05-27 13:24:05', '2019-05-27 13:24:05'),
	(6, 'services', 'Sección services', 'services-section', 1, '2019-05-27 13:24:05', '2019-05-27 13:24:05'),
	(7, 'testimonials', 'Sección testimonials', 'testimonials-section', 1, '2019-05-27 13:24:05', '2019-05-27 13:24:05'),
	(8, 'blog', 'Sección blog', 'blog-section', 1, '2019-05-27 13:24:05', '2019-05-27 13:24:05'),
	(9, 'contact', 'Sección contact', 'contact-section', 1, '2019-05-27 13:24:05', '2019-05-27 13:24:05');
/*!40000 ALTER TABLE `secciones` ENABLE KEYS */;

-- Volcando estructura para tabla intranet.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) NOT NULL,
  `codusuario` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fechacreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fechamodificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla intranet.usuarios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `idpersona`, `codusuario`, `estado`, `fechacreacion`, `fechamodificacion`) VALUES
	(1, 1, 'admin', 1, '2019-05-27 16:09:09', '2019-05-27 16:09:09'),
	(2, 2, 'jperezf', 1, '2019-05-27 16:09:09', '2019-05-27 16:11:31'),
	(3, 3, 'fherrera', 1, '2019-05-27 16:09:09', '2019-05-27 16:11:34');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
