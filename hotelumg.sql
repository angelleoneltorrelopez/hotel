CREATE DATABASE  IF NOT EXISTS `hotelumg` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hotelumg`;
-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: hotelumg
-- ------------------------------------------------------
-- Server version	5.5.62-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AuthAssignment`
--

DROP TABLE IF EXISTS `AuthAssignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthAssignment`
--

LOCK TABLES `AuthAssignment` WRITE;
/*!40000 ALTER TABLE `AuthAssignment` DISABLE KEYS */;
INSERT INTO `AuthAssignment` VALUES ('aux_bod','12',NULL,'N;'),('enc_bod','11',NULL,'N;'),('enc_edif','10',NULL,'N;'),('enc_hab','8',NULL,'N;'),('gerente','104',NULL,'N;'),('gerente','3',NULL,'N;'),('gerente','4',NULL,'N;'),('gerente','5',NULL,'N;'),('gerente','51',NULL,'N;'),('jefe_mant','9',NULL,'N;'),('jefe_RRHH','45',NULL,'N;'),('jefe_RRHH','6',NULL,'N;'),('recep','7',NULL,'N;');
/*!40000 ALTER TABLE `AuthAssignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItem`
--

DROP TABLE IF EXISTS `AuthItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItem`
--

LOCK TABLES `AuthItem` WRITE;
/*!40000 ALTER TABLE `AuthItem` DISABLE KEYS */;
INSERT INTO `AuthItem` VALUES ('aux_bod',2,'Auxiliar de Bodega',NULL,'N;'),('enc_bod',2,'Encargado de Bodega',NULL,'N;'),('enc_edif',2,'Encargado del Edificio',NULL,'N;'),('enc_hab',2,'Encargado de Habitaciones',NULL,'N;'),('gerente',2,'Gerente General',NULL,'N;'),('jefe_mant',2,'Jefe de Mantenimiento',NULL,'N;'),('jefe_RRHH',2,'Jefe de Recursos Humanos',NULL,'N;'),('recep',2,'Recepcionista',NULL,'N;');
/*!40000 ALTER TABLE `AuthItem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `AuthItemChild`
--

DROP TABLE IF EXISTS `AuthItemChild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AuthItemChild`
--

LOCK TABLES `AuthItemChild` WRITE;
/*!40000 ALTER TABLE `AuthItemChild` DISABLE KEYS */;
/*!40000 ALTER TABLE `AuthItemChild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_articulo` varchar(45) NOT NULL,
  `codigo_articulo` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` VALUES (1,'Toalla',123,30),(2,'Vasos',15500,5),(12,'Peine',3212,5),(13,'Lápiz',1456,2),(15,'puyazo',1,25),(16,'lomo especial',2,28),(17,'carne molida',3,18),(18,'vistec especial',4,22),(20,'cebollas (libra)',1,2),(21,'esparragos (docena)',2,2),(22,'tomates (libra)',3,3),(23,'papas (libra))',5,3),(24,'aceite Mazola (galon)',6,35),(25,'Arina Gold Medal (25lbs)',12,75),(26,'Macarrones ina (50lbs)',14,115),(27,'Filete',5532,20),(28,'Pan',556,10),(29,'Cepillo',32154,5);
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bodega`
--

DROP TABLE IF EXISTS `bodega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bodega` (
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_articulo`),
  KEY `fk_bodega_id_articulo_idx` (`id_articulo`),
  CONSTRAINT `fk_bodega_id_articulo` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bodega`
--

LOCK TABLES `bodega` WRITE;
/*!40000 ALTER TABLE `bodega` DISABLE KEYS */;
INSERT INTO `bodega` VALUES (1,50),(2,100),(12,3),(13,200),(15,15),(16,10),(17,50),(18,20),(20,5),(21,10),(22,20),(23,0),(24,20),(25,30),(26,0),(27,0),(28,0);
/*!40000 ALTER TABLE `bodega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `empleado` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `horario` int(11) NOT NULL,
  `puesto_trabajo` int(11) NOT NULL,
  `observaciones` longtext,
  `firma_RH` int(11) DEFAULT '0',
  `firma_gerencia` int(11) DEFAULT '0',
  `fechacreacion` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_idx` (`tipo`),
  KEY `fk_horario_idx` (`horario`),
  KEY `fk_puesto_idx` (`puesto_trabajo`),
  KEY `fk_empleado_idx` (`empleado`),
  CONSTRAINT `fk_contratos_empleado` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_horario` FOREIGN KEY (`horario`) REFERENCES `horarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_puesto` FOREIGN KEY (`puesto_trabajo`) REFERENCES `puestos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipo` FOREIGN KEY (`tipo`) REFERENCES `tipo_contrato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
INSERT INTO `contratos` VALUES (1,1,2,'2018-09-11',1,1,'',1,0,NULL),(2,1,2,'2018-10-16',1,1,'',0,0,NULL),(3,2,3,'2018-10-20',1,2,'',0,0,NULL);
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_master`
--

DROP TABLE IF EXISTS `country_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_master` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(64) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'Country name',
  `country_code` char(2) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'Country code',
  `country_code_iso3` char(3) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'Country code 3 character',
  `language` char(3) CHARACTER SET latin1 NOT NULL COMMENT 'Language',
  `currency_name` varchar(50) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Currency name',
  `currency_symbol` char(3) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Currency symbol',
  `currency_rate` decimal(3,3) DEFAULT NULL COMMENT 'Currency rate',
  `is_publish` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Is publish',
  PRIMARY KEY (`id`),
  KEY `IDX_COUNTRIES_NAME` (`country`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_master`
--

LOCK TABLES `country_master` WRITE;
/*!40000 ALTER TABLE `country_master` DISABLE KEYS */;
INSERT INTO `country_master` VALUES (1,'Afghanistan','AF','AFG','','',NULL,NULL,1);
/*!40000 ALTER TABLE `country_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'Cocina'),(2,'Finanza'),(5,'Habitacion 1'),(6,'Habitacion 2');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_compra`
--

DROP TABLE IF EXISTS `detalle_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_compra` (
  `id_detalle_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_ingreso_bodega` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_detalle_compra`),
  KEY `fk_detalle_compra_articulo_idx` (`id_articulo`),
  KEY `fk_detalle_compra_ingreso_bodega_idx` (`id_ingreso_bodega`),
  CONSTRAINT `fk_detalle_compra_articulo` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_compra_ingreso_bodega` FOREIGN KEY (`id_ingreso_bodega`) REFERENCES `ingreso_bodega` (`id_ingreso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compra`
--

LOCK TABLES `detalle_compra` WRITE;
/*!40000 ALTER TABLE `detalle_compra` DISABLE KEYS */;
INSERT INTO `detalle_compra` VALUES (26,1,17,20,50,1000),(31,4,24,20,1,20),(32,1,24,5,4,20),(33,1,24,1,1,1),(34,8,26,2,1,2),(37,8,24,25,20,500),(38,8,25,10,30,300),(39,8,20,5,5,25),(40,8,15,45,15,675),(41,8,22,2.5,20,50),(42,3,1,25,50,1250),(43,3,12,20,3,60),(44,3,13,0.75,200,150),(45,3,2,5,100,500),(46,4,21,5,10,50),(47,8,16,40,10,400),(48,8,18,30,20,600);
/*!40000 ALTER TABLE `detalle_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_resevacion`
--

DROP TABLE IF EXISTS `detalle_resevacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_resevacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reservacion` int(11) NOT NULL,
  `tipo_habitacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detalle_resevacion_id_idx` (`id_reservacion`),
  KEY `fk_detalle_resevacion_tipo_idx` (`tipo_habitacion`),
  CONSTRAINT `fk_detalle_resevacion_id` FOREIGN KEY (`id_reservacion`) REFERENCES `reservaciones` (`id_reservacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_resevacion_tipo` FOREIGN KEY (`tipo_habitacion`) REFERENCES `tipo_habitacion` (`id_tipo_habitacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_resevacion`
--

LOCK TABLES `detalle_resevacion` WRITE;
/*!40000 ALTER TABLE `detalle_resevacion` DISABLE KEYS */;
INSERT INTO `detalle_resevacion` VALUES (206,5,1,5,1500),(207,11,3,1,2000),(210,12,1,1,300),(211,13,1,2,600);
/*!40000 ALTER TABLE `detalle_resevacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_retiro_bodega`
--

DROP TABLE IF EXISTS `detalle_retiro_bodega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_retiro_bodega` (
  `id_detalle_retiro_bodega` int(11) NOT NULL AUTO_INCREMENT,
  `id_retiro_bodega` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_retiro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detalle_retiro_bodega`),
  KEY `fk_detalle_retiro_bodega_id_retiro_idx` (`id_retiro_bodega`),
  CONSTRAINT `fk_detalle_retiro_bodega_1` FOREIGN KEY (`id_retiro_bodega`) REFERENCES `retiro_bodega` (`id_retiro_bodega`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_retiro_bodega`
--

LOCK TABLES `detalle_retiro_bodega` WRITE;
/*!40000 ALTER TABLE `detalle_retiro_bodega` DISABLE KEYS */;
INSERT INTO `detalle_retiro_bodega` VALUES (3,3,24,5,'2018-10-22 00:00:00'),(4,1,24,1,'0000-00-00 00:00:00'),(5,6,26,1,'2018-10-20 00:00:00');
/*!40000 ALTER TABLE `detalle_retiro_bodega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_solicitud_compra`
--

DROP TABLE IF EXISTS `detalle_solicitud_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_solicitud_compra` (
  `id_detalle_solicitud_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_solicitud_compra` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_detalle_solicitud_compra`),
  KEY `fk_detalle_solicitud_compra_id_solicitud_compra_idx` (`id_solicitud_compra`),
  KEY `fk_detalle_solicitud_compra_id_articulo_idx` (`id_articulo`),
  CONSTRAINT `fk_detalle_solicitud_compra_id_articulo` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_solicitud_compra_id_solicitud_compra` FOREIGN KEY (`id_solicitud_compra`) REFERENCES `solicitud_compra` (`id_solicitud_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_solicitud_compra`
--

LOCK TABLES `detalle_solicitud_compra` WRITE;
/*!40000 ALTER TABLE `detalle_solicitud_compra` DISABLE KEYS */;
INSERT INTO `detalle_solicitud_compra` VALUES (5,1,1,1,30),(6,1,1,1,5),(7,2,2,10,50),(8,3,24,15,525),(9,4,17,150,2700),(10,5,18,75,1650),(11,6,15,200,5000),(12,8,2,500,2500),(13,1,24,2,70),(14,1,24,2,70),(15,1,24,5,175),(16,9,13,2,4);
/*!40000 ALTER TABLE `detalle_solicitud_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disponibilidad`
--

DROP TABLE IF EXISTS `disponibilidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disponibilidad` (
  `id_disponibilidad` int(11) NOT NULL,
  `entrada` date NOT NULL,
  `salida` date NOT NULL,
  `tipo_habitacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_disponibilidad`),
  KEY `fk_disponibilidad_1_idx` (`tipo_habitacion`),
  CONSTRAINT `fk_disponibilidad_1` FOREIGN KEY (`tipo_habitacion`) REFERENCES `tipo_habitacion` (`id_tipo_habitacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disponibilidad`
--

LOCK TABLES `disponibilidad` WRITE;
/*!40000 ALTER TABLE `disponibilidad` DISABLE KEYS */;
INSERT INTO `disponibilidad` VALUES (206,'2018-09-13','2018-09-15',1,5),(207,'2018-10-21','2018-10-22',3,1),(210,'2018-10-21','2018-10-22',1,1),(211,'2018-10-21','2018-10-27',1,2);
/*!40000 ALTER TABLE `disponibilidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Melanie Orellana',NULL,'Gualan, Zacapa','1996-01-21',''),(2,'Angel Torre',41506904,'Gualan, Zacapa','1987-08-24',''),(3,'Julio Harrizon',3333389,'Estanzuela-zacapa','2018-09-05',''),(4,'Aníbal López',50450518,'Zona roja','1995-06-15','Cuidado con las tendencias .-'),(6,'Juan Perez',25304512,'Aldea la arenera, Teculutan Zacapa','1990-09-12','');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habitaciones`
--

DROP TABLE IF EXISTS `habitaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `habitaciones` (
  `id_habitacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_habitacion` int(11) NOT NULL,
  `numero` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_habitacion`),
  KEY `fk_tipo_habitaciones_idx` (`tipo_habitacion`),
  CONSTRAINT `fk_tipo_habitaciones` FOREIGN KEY (`tipo_habitacion`) REFERENCES `tipo_habitacion` (`id_tipo_habitacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitaciones`
--

LOCK TABLES `habitaciones` WRITE;
/*!40000 ALTER TABLE `habitaciones` DISABLE KEYS */;
INSERT INTO `habitaciones` VALUES (1,1,10),(2,1,20),(3,2,3),(4,1,4),(5,1,11),(6,2,50),(7,1,25),(8,1,1),(9,1,90),(10,1,5),(11,1,95),(12,1,96),(13,1,97),(14,1,99),(15,1,100),(16,1,101),(17,1,200),(18,1,300),(19,1,401),(20,1,500),(21,1,600),(22,1,700),(23,1,800),(24,1,900),(25,3,1);
/*!40000 ALTER TABLE `habitaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `fin` time NOT NULL,
  `inicio` time NOT NULL,
  `dias_semana` int(11) NOT NULL,
  `horas_semanales` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (1,'Matutino','12:00:00','06:00:00',6,36),(2,'vespertino','22:00:00','16:00:00',6,35),(3,'nocturno (seguridad)','07:00:00','19:00:00',4,48),(4,'turno mañana','16:00:00','07:00:00',6,54),(5,'Turno diurno (seguridad)','19:00:00','07:00:00',4,48),(6,'vaciones','20:00:00','08:00:00',6,72);
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingreso_bodega`
--

DROP TABLE IF EXISTS `ingreso_bodega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingreso_bodega` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `id_solicitud_compra` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `fecha_factura` date NOT NULL,
  `fecha_ingreso` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`id_ingreso`),
  KEY `fk_ingreso_bodega_solicitud_compra_idx` (`id_solicitud_compra`),
  KEY `fk_ingreso_bodega_id_proveeedor_idx` (`id_proveedor`),
  CONSTRAINT `fk_ingreso_bodega_id_proveeedor` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ingreso_bodega_solicitud_compra` FOREIGN KEY (`id_solicitud_compra`) REFERENCES `solicitud_compra` (`id_solicitud_compra`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingreso_bodega`
--

LOCK TABLES `ingreso_bodega` WRITE;
/*!40000 ALTER TABLE `ingreso_bodega` DISABLE KEYS */;
INSERT INTO `ingreso_bodega` VALUES (1,1,1,1,'2018-09-12','2018-09-13 22:29:48',1021),(2,1,1,2,'2018-09-08','2018-09-14 03:36:20',NULL),(3,4,1,7841,'2018-08-28','2018-09-21 10:11:16',1960),(4,6,6,4521,'2018-08-31','2018-09-21 10:29:28',70),(5,9,4,9956,'2018-08-29','2018-09-21 10:35:29',NULL),(7,4,7,5225,'2018-10-12','2018-10-17 04:27:02',NULL),(8,5,2,2147483647,'2018-10-20','2018-10-20 08:47:22',2552);
/*!40000 ALTER TABLE `ingreso_bodega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimiento`
--

DROP TABLE IF EXISTS `mantenimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mantenimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `objeto` varchar(255) NOT NULL,
  `diagnostico` longtext NOT NULL,
  `solucion` longtext NOT NULL,
  `autorizacion_jefe` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_mantimiento_departamento_idx` (`id_departamento`),
  KEY `fk_mantenimiento_empleado_idx` (`id_empleado`),
  CONSTRAINT `fk_mantenimiento_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mantenimiento_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimiento`
--

LOCK TABLES `mantenimiento` WRITE;
/*!40000 ALTER TABLE `mantenimiento` DISABLE KEYS */;
INSERT INTO `mantenimiento` VALUES (1,2,'2018-09-10',1,'tomacorrientes','tomacorrientes quebrados','REMPLAZO DE TOMACORRIENTES',2),(2,1,'2018-09-21',1,'Estractores de olores','El extractor de olores tiene no funciona correctamente','cambiar el extractor de olores del area',1),(3,3,'2018-09-21',1,'Hornilla 2 estufa 1','Hornilla de la estufa numero 1 esta en mal estado','Cambiar base inferior y superior de la hornilla',1),(4,6,'2018-09-21',1,'Drenaje de lavadora tapada','La tuberia de drenaje esta completamente tapada','Destapar tuberia e instalar regilla para evitar acumulacion de solidos en la tuberia',1),(5,2,'2018-09-21',2,'Cambiar switch de lampara ','switch de lampara en mal estado','cambiar switch de la lampara del area de finanzas',1),(6,2,'2018-09-21',5,'lamparas',' lamparas en mal estado en la habitacion 1','cambiar lamparas en mal estado de la habitacion 1',1),(7,2,'2018-09-21',6,'bombillo pasillo externo','bombillo quemado','cambiar bombillo quemado en pasillo de habitacion 2',0),(8,6,'2018-10-20',5,'TOMA CORRIENTE','TOMA CORRIENTE NO ENTREGA VOLTAJE','REVISAR CONEXION Y CAMBIAR DISPOSITIVO',2);
/*!40000 ALTER TABLE `mantenimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(45) NOT NULL,
  `nit_proveedor` int(11) NOT NULL,
  `direccion_proveedor` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,'Farmacia Acevedo',955999,'1 Calle 1-06 Zona 4, Gualan Zacapa',79332578,'2018-09-05 00:00:00'),(2,'Carniceria la Bendicion',30615474,'Colonia el milagro, Teculutan, Zacapa',79320025,'2018-09-21 09:55:39'),(3,'Pollo Rey',41210022,'Colonia villalobos 1,sector  villa nueva',78396629,'2018-09-21 09:58:10'),(4,'Abarroteria Dios Proveera',45207802,'Aldea el Lobo, Gualan, Zacapa',79293966,'2018-09-21 09:59:38'),(5,'Distribuidora de Alimentos S.A.',55668824,'4 calle 2-41 zona 18, Guatemala',78485536,'2018-09-21 10:01:13'),(6,'Distribuidora de verdurex S.A.',78396644,'15 calle A 15-21, Quetzaltenango, Guatemala',79993850,'2018-09-21 10:03:55'),(7,'Carniceria Los Amigos',55257833,'Aldea Santa Cruz Rio Hondo, Zacapa',79395822,'2018-09-21 10:05:09'),(8,'Comercializadora La Provicion',50204578,'5 calle 5-21, San Jorge Zacapa',79395588,'2018-09-21 10:06:54'),(9,'Distribuidora productos de limpieza Prolim',66213314,'Avenida Petapa 15-21 Zona 12, Guatemala',48775522,'2018-09-21 10:09:42'),(10,'Julio',12346986,'Estanzuela,Zacapa',57179050,'2018-09-21 23:25:50');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puestos`
--

DROP TABLE IF EXISTS `puestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puestos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `departamento` int(11) NOT NULL,
  `salario_min` decimal(10,0) NOT NULL,
  `salario_max` decimal(10,0) NOT NULL,
  `bono` decimal(10,0) DEFAULT NULL,
  `descripcion` longtext,
  PRIMARY KEY (`id`),
  KEY `fk_puestos_departamento_idx` (`departamento`),
  CONSTRAINT `fk_puestos_departamento` FOREIGN KEY (`departamento`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestos`
--

LOCK TABLES `puestos` WRITE;
/*!40000 ALTER TABLE `puestos` DISABLE KEYS */;
INSERT INTO `puestos` VALUES (1,'Chef',1,4000,7000,0,''),(2,'jardinero',1,2000,3500,200,'');
/*!40000 ALTER TABLE `puestos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservaciones`
--

DROP TABLE IF EXISTS `reservaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservaciones` (
  `id_reservacion` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_reservacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `nombre_huesped` varchar(255) NOT NULL,
  `correo_huesped` varchar(255) NOT NULL,
  `nacionalidad_huesped` varchar(45) DEFAULT NULL,
  `tel_huesped` int(11) NOT NULL,
  `cantidad_infantes` int(11) DEFAULT NULL,
  `cantidad_adultos` int(11) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_reservacion`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservaciones`
--

LOCK TABLES `reservaciones` WRITE;
/*!40000 ALTER TABLE `reservaciones` DISABLE KEYS */;
INSERT INTO `reservaciones` VALUES (5,'2018-09-13 15:45:00','2018-09-13','2018-09-15','Angel','angeltorrelopezx64hotmail.com','',41506904,NULL,NULL,'1500'),(6,'2018-10-03 05:05:46','2018-10-03','2018-10-05','Melanie','hey@correo.com','',45856544,NULL,NULL,NULL),(7,'2018-10-03 05:07:58','2018-10-05','2018-10-05','prueba','prueba@correo','',45358565,NULL,NULL,NULL),(8,'2018-10-03 05:11:59','2018-10-04','2018-10-13','es','a@e','',2,NULL,NULL,NULL),(10,'2018-10-18 05:28:35','2018-10-18','2018-10-20','orellana','orellana@a.com','',54856245,NULL,NULL,'400'),(11,'2018-10-20 10:09:13','2018-10-21','2018-10-22','julio paz3','julio@hotmail.com','guatemalteco',89980978,1,2,'2000'),(12,'2018-10-20 15:27:00','2018-10-21','2018-10-22','obed monteros','obedmonteros@outlook.com','GT',12345678,0,2,'300'),(13,'2018-10-20 16:11:05','2018-10-21','2018-10-27','Fredy','fredyabel@outlook.com','GT',12345678,0,2,'600');
/*!40000 ALTER TABLE `reservaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retiro_bodega`
--

DROP TABLE IF EXISTS `retiro_bodega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retiro_bodega` (
  `id_retiro_bodega` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `destino` longtext,
  `firma_solicitante` int(11) DEFAULT '0',
  `firma_encargado_almacen` int(11) DEFAULT '0',
  `firma_gerente` int(11) DEFAULT '0',
  PRIMARY KEY (`id_retiro_bodega`),
  KEY `fk_retiro_bodega_empleado_idx` (`id_empleado`),
  CONSTRAINT `fk_retiro_bodega_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retiro_bodega`
--

LOCK TABLES `retiro_bodega` WRITE;
/*!40000 ALTER TABLE `retiro_bodega` DISABLE KEYS */;
INSERT INTO `retiro_bodega` VALUES (1,2,'2018-09-13','habitaciones',0,0,0),(2,2,'2018-09-14','habitaciones',0,0,0),(3,1,'2018-09-21','insumos para las habitaciones del hotel',1,1,1),(4,3,'2018-09-19','Cocina del hotel',1,1,1),(5,2,'2018-09-21','Cocina del Hotel',1,1,1),(6,3,'2018-10-20','Cocina',0,0,0);
/*!40000 ALTER TABLE `retiro_bodega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud_compra`
--

DROP TABLE IF EXISTS `solicitud_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitud_compra` (
  `id_solicitud_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleado` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `total_estimado` float DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `firma_solicitante` int(11) DEFAULT '0',
  `firma_jefe_inmediato` int(11) DEFAULT '0',
  `firma_encargado_almacen` int(11) DEFAULT '0',
  PRIMARY KEY (`id_solicitud_compra`),
  KEY `fk_solicitud_empleado_idx` (`id_empleado`),
  CONSTRAINT `fk_solicitud_compra_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_compra`
--

LOCK TABLES `solicitud_compra` WRITE;
/*!40000 ALTER TABLE `solicitud_compra` DISABLE KEYS */;
INSERT INTO `solicitud_compra` VALUES (1,1,'2018-09-13',350,'2018-09-13 20:45:10',0,0,1),(2,2,'2018-09-13',50,'2018-09-13 23:20:04',0,0,0),(3,2,'2018-09-21',525,'2018-09-21 10:24:53',1,1,1),(4,2,'2018-09-21',2700,'2018-09-21 10:25:59',1,1,1),(5,2,'2018-09-21',1650,'2018-09-21 10:26:44',1,1,1),(6,2,'2018-09-21',5000,'2018-09-21 10:27:40',1,1,1),(7,6,'2018-09-21',NULL,'2018-09-21 16:43:37',0,0,0),(8,1,'2018-09-21',2500,'2018-09-21 16:45:05',1,1,1),(9,2,'2018-10-20',4,'2018-10-20 16:19:05',0,0,1);
/*!40000 ALTER TABLE `solicitud_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud_permiso`
--

DROP TABLE IF EXISTS `solicitud_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitud_permiso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `motivo` longtext NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `cantidad_dias` int(11) DEFAULT NULL,
  `firma_solicitante` int(11) DEFAULT '0',
  `firma_jefe_inmediato` int(11) DEFAULT '0',
  `firma_RH` int(11) DEFAULT '0',
  `firma_gerencia` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_empleado_idx` (`empleado`),
  KEY `empleado_fk_idx` (`empleado`),
  KEY `tipo_fk_idx` (`tipo`),
  CONSTRAINT `fk_permiso_empleado` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tipo_fk` FOREIGN KEY (`tipo`) REFERENCES `tipo_permiso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_permiso`
--

LOCK TABLES `solicitud_permiso` WRITE;
/*!40000 ALTER TABLE `solicitud_permiso` DISABLE KEYS */;
INSERT INTO `solicitud_permiso` VALUES (1,1,2,'2018-09-15','vacaciones','2018-11-01','2018-11-30',30,0,0,2,0),(2,2,1,'2018-09-06','Cita medica','2018-09-07','2018-09-08',NULL,0,0,1,1),(3,2,2,'2018-10-13','lol','2018-10-23','2018-10-31',NULL,0,0,1,0),(4,2,2,'2018-10-20','esto','2018-10-25','2018-10-27',NULL,0,0,2,0),(5,2,2,'2018-10-20','e3','2018-10-21','2018-10-26',5,0,0,0,0),(6,4,1,'2018-10-20','cita medica','2018-10-22','2018-10-24',2,0,0,0,0),(7,3,1,'2018-10-20','cita medica','2018-10-27','2018-10-29',2,0,0,0,0),(8,1,2,'2018-10-20','enfermedad','2018-10-24','2018-10-26',2,0,0,0,0),(9,2,2,'2018-10-20','Dfc','2018-10-26','2018-10-31',5,0,0,0,0),(10,2,2,'2018-10-20','porque si','2018-10-21','2018-10-24',3,0,0,1,1);
/*!40000 ALTER TABLE `solicitud_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud_vacaciones`
--

DROP TABLE IF EXISTS `solicitud_vacaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitud_vacaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empleado` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `dias_totales` int(11) NOT NULL,
  `firma_solicitante` int(11) DEFAULT '0',
  `firma_jefe_inmediato` int(11) DEFAULT '0',
  `firma_RH` int(11) DEFAULT '0',
  `firma_gerencia` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `empledo_fk_idx` (`empleado`),
  CONSTRAINT `fk_vacaciones_empleado` FOREIGN KEY (`empleado`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_vacaciones`
--

LOCK TABLES `solicitud_vacaciones` WRITE;
/*!40000 ALTER TABLE `solicitud_vacaciones` DISABLE KEYS */;
INSERT INTO `solicitud_vacaciones` VALUES (1,1,'2018-10-20','2018-10-23','2018-10-31',8,0,0,1,1),(2,2,'2018-09-13','2018-09-22','2018-09-29',7,0,0,0,0),(3,2,'2018-09-22','2018-10-01','2018-10-02',2,0,0,0,0),(4,2,'2018-10-20','2018-10-21','2018-11-30',40,0,0,0,0),(5,2,'2018-10-20','2018-10-24','2018-11-03',10,0,0,0,0),(6,3,'2018-10-20','2018-10-23','2018-10-31',8,0,0,0,0),(7,2,'2018-10-20','2018-10-21','2018-10-31',10,0,0,0,0);
/*!40000 ALTER TABLE `solicitud_vacaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state_master`
--

DROP TABLE IF EXISTS `state_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state_master` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Country name',
  `country_code` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'Country code',
  `state_code` varchar(32) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'State code',
  `state` varchar(32) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'State',
  `is_publish` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Is publish',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state_master`
--

LOCK TABLES `state_master` WRITE;
/*!40000 ALTER TABLE `state_master` DISABLE KEYS */;
INSERT INTO `state_master` VALUES (1,1,'AF','BDS','Badakhshan',1);
/*!40000 ALTER TABLE `state_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_contrato`
--

DROP TABLE IF EXISTS `tipo_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_contrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_contrato`
--

LOCK TABLES `tipo_contrato` WRITE;
/*!40000 ALTER TABLE `tipo_contrato` DISABLE KEYS */;
INSERT INTO `tipo_contrato` VALUES (1,'Temporal'),(2,'indefinido');
/*!40000 ALTER TABLE `tipo_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_habitacion`
--

DROP TABLE IF EXISTS `tipo_habitacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_habitacion` (
  `id_tipo_habitacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_habitacioncol` varchar(45) NOT NULL,
  `tarifa` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_habitacion`
--

LOCK TABLES `tipo_habitacion` WRITE;
/*!40000 ALTER TABLE `tipo_habitacion` DISABLE KEYS */;
INSERT INTO `tipo_habitacion` VALUES (1,'doble','300.00'),(2,'individual','200.00'),(3,'suite','2000');
/*!40000 ALTER TABLE `tipo_habitacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_permiso`
--

DROP TABLE IF EXISTS `tipo_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_permiso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_permiso`
--

LOCK TABLES `tipo_permiso` WRITE;
/*!40000 ALTER TABLE `tipo_permiso` DISABLE KEYS */;
INSERT INTO `tipo_permiso` VALUES (1,'Remunerado'),(2,'Cuenta a Vacaciones'),(3,'Sin Remuneracion');
/*!40000 ALTER TABLE `tipo_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `email` varchar(90) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empleado_idx` (`id_empleado`),
  CONSTRAINT `fk_usuarios_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (3,'melanie','19eddb45b28bb407d6e904c2a3d75e48c67ef092',1,'','gerente'),(4,'angel','8cb2237d0679ca88db6464eac60da96345513964',2,'angeltorrelopez@hotmail.com','gerente'),(5,'gerente','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1,'','gerente'),(6,'jefe_RRHH','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1,'','jefe_RRHH'),(7,'recep','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1,'','recep'),(8,'enc_hab','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1,'','enc_hab'),(9,'jefe_mant','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1,'','jefe_mant'),(10,'enc_edif','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1,'','enc_edif'),(11,'enc_bod','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1,'','enc_bod'),(12,'aux_bod','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1,'','aux_bod'),(104,'luis','40bd001563085fc35165329ea1ff5c5ecbdbbeef',1,'','gerente');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-14  8:23:54
