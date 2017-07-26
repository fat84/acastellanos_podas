# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Base de datos: podas
# Tiempo de Generación: 2017-07-12 01:06:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla ciudad
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ciudad`;

CREATE TABLE `ciudad` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_ciudad` int(11) DEFAULT NULL,
  `nombre_ciudad` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `latitud_ciudad` decimal(12,6) DEFAULT NULL,
  `longitud_ciudad` decimal(12,6) DEFAULT NULL,
  `codigo_departamento` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_departamento` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;

INSERT INTO `ciudad` (`id`, `codigo_ciudad`, `nombre_ciudad`, `latitud_ciudad`, `longitud_ciudad`, `codigo_departamento`, `nombre_departamento`)
VALUES
	(58,54051,'Arboledas',7.666667,-72.750000,'54','Norte de Santander'),
	(108,54099,'Bochalema',7.666667,-72.583333,'54','Norte de Santander'),
	(121,54109,'Bucarasica',8.083333,-73.000000,'54','Norte de Santander'),
	(198,54172,'Chinácota',7.750000,-72.550000,'54','Norte de Santander'),
	(206,54174,'Chitagá',7.166667,-72.583333,'54','Norte de Santander'),
	(240,54206,'Convención',8.833333,-73.200000,'54','Norte de Santander'),
	(259,54223,'Cucutilla',7.500000,-72.750000,'54','Norte de Santander'),
	(270,54128,'Cáchira',7.750000,-73.166667,'54','Norte de Santander'),
	(271,54125,'Cácota',7.250000,-72.583333,'54','Norte de Santander'),
	(277,54001,'Cúcuta',7.883333,-72.505278,'54','Norte de Santander'),
	(286,54239,'Durania',7.750000,-72.633333,'54','Norte de Santander'),
	(292,54245,'El Carmen',8.750000,-73.333333,'54','Norte de Santander'),
	(325,54250,'El Tarra',8.584722,-73.088333,'54','Norte de Santander'),
	(326,54261,'El Zulia',7.935556,-72.605000,'54','Norte de Santander'),
	(378,54313,'Gramalote',7.916667,-72.750000,'54','Norte de Santander'),
	(419,54344,'Hacarí',8.500000,-73.083333,'54','Norte de Santander'),
	(425,54347,'Herrán',7.500000,-72.466667,'54','Norte de Santander'),
	(464,54385,'La Esperanza',8.166667,-72.466667,'54','Norte de Santander'),
	(481,54398,'La Playa',8.250000,-73.166667,'54','Norte de Santander'),
	(498,54377,'Labateca',7.333333,-72.500000,'54','Norte de Santander'),
	(512,54405,'Los Patios',7.838333,-72.513333,'54','Norte de Santander'),
	(514,54418,'Lourdes',7.966667,-72.833333,'54','Norte de Santander'),
	(588,54480,'Mutiscua',7.333333,-72.716667,'54','Norte de Santander'),
	(614,54498,'Ocaña',8.250000,-73.300000,'54','Norte de Santander'),
	(644,54518,'Pamplona',7.378056,-72.652500,'54','Norte de Santander'),
	(645,54520,'Pamplonita',7.500000,-72.583333,'54','Norte de Santander'),
	(716,54553,'Puerto Santander',8.363611,-72.407500,'54','Norte de Santander'),
	(736,54599,'Ragonvalia',7.583333,-72.500000,'54','Norte de Santander'),
	(780,54660,'Salazar',7.800000,-72.833333,'54','Norte de Santander'),
	(801,54670,'San Calixto',8.750000,-73.033333,'54','Norte de Santander'),
	(806,54673,'San Cayetano',7.883333,-72.583333,'54','Norte de Santander'),
	(892,54680,'Santiago',7.916667,-72.666667,'54','Norte de Santander'),
	(900,54720,'Sardinata',8.250000,-72.750000,'54','Norte de Santander'),
	(910,54743,'Silos',7.200000,-72.750000,'54','Norte de Santander'),
	(978,54800,'Teorama',8.750000,-73.166667,'54','Norte de Santander'),
	(985,54810,'Tibú',8.648056,-72.739444,'54','Norte de Santander'),
	(999,54820,'Toledo',7.300000,-72.250000,'54','Norte de Santander'),
	(1058,54871,'Villa Caro',7.916944,-72.976389,'54','Norte de Santander'),
	(1061,54874,'Villa del Rosario',7.833889,-72.474167,'54','Norte de Santander'),
	(1099,54003,'Ábrego',8.000000,-73.200000,'54','Norte de Santander');

/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Volcado de tabla solicitud_arboles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `solicitud_arboles`;

CREATE TABLE `solicitud_arboles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `solicitud_id` int(10) unsigned NOT NULL,
  `especie` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `cantidad` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `altura` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT '',
  `accion_realizar` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `solicitud_arboles` WRITE;
/*!40000 ALTER TABLE `solicitud_arboles` DISABLE KEYS */;

INSERT INTO `solicitud_arboles` (`id`, `solicitud_id`, `especie`, `cantidad`, `altura`, `accion_realizar`, `created_at`, `updated_at`)
VALUES
	(8,8,X'6172626F6C31',X'3132',X'3132',X'54616C61','2017-07-08 22:42:12','2017-07-08 22:42:12'),
	(9,8,X'6172626F6C32',X'3132',X'3132',X'506F6461','2017-07-08 22:42:12','2017-07-08 22:42:12'),
	(10,8,X'6172626F6C33',X'3131',X'3131',X'54726173706C616E746520C3B320526575626963616369C3B36E','2017-07-08 22:42:12','2017-07-08 22:42:12'),
	(11,10,X'3132',X'3132',X'3132',X'54616C61','2017-07-08 23:46:44','2017-07-08 23:46:44'),
	(12,11,X'3132',X'3132',X'3132',X'54616C61','2017-07-08 23:47:14','2017-07-08 23:47:14'),
	(13,12,X'3132',X'3132',X'3132',X'54616C61','2017-07-08 23:47:39','2017-07-08 23:47:39');

/*!40000 ALTER TABLE `solicitud_arboles` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla solicitud_archivo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `solicitud_archivo`;

CREATE TABLE `solicitud_archivo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `solicitud_id` int(11) unsigned DEFAULT NULL,
  `nombre` varchar(500) COLLATE utf8_bin NOT NULL DEFAULT '',
  `ruta` varchar(500) COLLATE utf8_bin DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `solicitud_archivo` WRITE;
/*!40000 ALTER TABLE `solicitud_archivo` DISABLE KEYS */;

INSERT INTO `solicitud_archivo` (`id`, `solicitud_id`, `nombre`, `ruta`, `created_at`, `updated_at`)
VALUES
	(1,12,X'6D652E6A7067',X'313439393535373635395F6D652E6A7067','2017-07-08 23:47:39','2017-07-08 23:47:39'),
	(2,12,X'37353664396437336333633039353765363235326332383535613561656336362E6A7067',X'313439393535373635395F37353664396437336333633039353765363235326332383535613561656336362E6A7067','2017-07-08 23:47:39','2017-07-08 23:47:39');

/*!40000 ALTER TABLE `solicitud_archivo` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla solicitudes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `solicitudes`;

CREATE TABLE `solicitudes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tipo_solicitante` tinyint(1) NOT NULL,
  `no_identificacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_correspondencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calidad_solicitante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad_id` int(10) unsigned NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_predio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `x_cod` double NOT NULL,
  `y_cod` double NOT NULL,
  `ciudad_predio` int(10) unsigned NOT NULL,
  `direccion_predio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barrio_predio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vereda_predio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corregimiento_predio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;

INSERT INTO `solicitudes` (`id`, `razon_social`, `tipo_solicitante`, `no_identificacion`, `direccion_correspondencia`, `calidad_solicitante`, `ciudad_id`, `telefono`, `correo`, `nombre_predio`, `ubicacion`, `x_cod`, `y_cod`, `ciudad_predio`, `direccion_predio`, `barrio_predio`, `vereda_predio`, `corregimiento_predio`, `user_id`, `created_at`, `updated_at`)
VALUES
	(8,'Fabio Enrique Moreno Rangel',0,'1092346440','Calle 17 3-26 Barrio San Luis','Propietario',277,'123912931923','fabiomoreno@outlook.com','alksdnaklsdnaklsdnalskd','Espacio Público',12,12,58,'kandlkansdklandlkanskld','kansldknalksdnalksd','nalksdnalksdn','knalksdnlkasndlka',1,'2017-07-08 22:42:12','2017-07-08 22:42:12'),
	(9,'djbljbljbkjb',0,'879809808','98098092222','Propietario',58,'09890822','fabiomoreno@outlook.com','8098','Espacio Público',989,8098,58,'8098098098098','908098098','9080980','908098098',1,'2017-07-08 23:45:42','2017-07-08 23:45:42'),
	(10,'djbljbljbkjb',0,'879809808','980980922121212121212121212','Propietario',58,'098908222','fabiomoreno@outlook.com','8098','Espacio Público',989,8098,58,'8098098098098','908098098','9080980','908098098',1,'2017-07-08 23:46:44','2017-07-08 23:46:44'),
	(11,'djbljbljbkjb',0,'879809808','980980922121212121212121212','Propietario',58,'098908222','fabiomoreno@outlook.com','8098','Espacio Público',989,8098,58,'8098098098098','908098098','9080980','908098098',1,'2017-07-08 23:47:14','2017-07-08 23:47:14'),
	(12,'djbljbljbkjb',0,'879809808','980980922121212121212121212','Propietario',58,'098908222','fabiomoreno@outlook.com','8098','Espacio Público',989,8098,58,'8098098098098','908098098','9080980','908098098',1,'2017-07-08 23:47:39','2017-07-08 23:47:39');

/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usuario',
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `role`, `enable`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Fabio Enrique Moreno Rangel','fabiomoreno@outlook.com','usuario',1,'$2y$10$tWzMB/Lgml1YbbY9CHXHz.aYVuQjEONvwbfEu0yNCtNMdEJVdt3GW','cuCViS3xX8cH8oRkI37HMTDkuVbOB4W1kRO9JE3FijioXGBN4fxBXrBcWMkO','2017-07-08 20:32:12','2017-07-08 20:32:12'),
	(2,'Andres Castellanos','acastellanos05@misena.edu.co','usuario',1,'$2y$10$1em8DxzqImpklc9oAwFRduvygl73UfKD0kT4fgYC.1CN0/140B3Wm','KrextomwkTZbt61rZZwfvgM9GElMiI1FlE4FBFDi5kEsHPDVpxh1Ty3rTFI2','2017-06-30 02:09:22','2017-06-30 02:09:22');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
