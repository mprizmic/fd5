-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: fd5
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.21.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `area` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (203,'DENS','Formación docente'),(204,'UCSFD','Unidad de Coordinación');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aviso`
--

DROP TABLE IF EXISTS `aviso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aviso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aviso_fecha_IDX` (`fecha`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aviso`
--

LOCK TABLES `aviso` WRITE;
/*!40000 ALTER TABLE `aviso` DISABLE KEYS */;
INSERT INTO `aviso` VALUES (68,'en desarrollo','2022-01-01',1);
/*!40000 ALTER TABLE `aviso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barrio`
--

DROP TABLE IF EXISTS `barrio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barrio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=345 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barrio`
--

LOCK TABLES `barrio` WRITE;
/*!40000 ALTER TABLE `barrio` DISABLE KEYS */;
INSERT INTO `barrio` VALUES (342,'Palermo','PAL'),(343,'San Telmo','STE'),(344,'Villa Lugano','VLG');
/*!40000 ALTER TABLE `barrio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrera_fd`
--

DROP TABLE IF EXISTS `carrera_fd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrera_fd` (
  `id` int NOT NULL,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `duracion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `actualizado` datetime NOT NULL,
  `creado` datetime NOT NULL,
  `anio_inicio` int DEFAULT NULL,
  `comentario` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrera_fd`
--

LOCK TABLES `carrera_fd` WRITE;
/*!40000 ALTER TABLE `carrera_fd` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrera_fd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comuna`
--

DROP TABLE IF EXISTS `comuna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comuna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1808 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comuna`
--

LOCK TABLES `comuna` WRITE;
/*!40000 ALTER TABLE `comuna` DISABLE KEYS */;
INSERT INTO `comuna` VALUES (1792,1),(1793,2),(1794,3),(1795,4),(1796,5),(1797,6),(1798,7),(1799,8),(1800,9),(1801,10),(1802,11),(1803,12),(1804,13),(1805,14),(1806,15),(1807,16);
/*!40000 ALTER TABLE `comuna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distrito_escolar`
--

DROP TABLE IF EXISTS `distrito_escolar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distrito_escolar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` int DEFAULT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2844 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distrito_escolar`
--

LOCK TABLES `distrito_escolar` WRITE;
/*!40000 ALTER TABLE `distrito_escolar` DISABLE KEYS */;
INSERT INTO `distrito_escolar` VALUES (2828,1,'1'),(2829,2,'2'),(2830,3,'3'),(2831,4,'4'),(2832,5,'5'),(2833,6,'6'),(2834,7,'7'),(2835,8,'8'),(2836,9,'9'),(2837,10,'10'),(2838,11,'11'),(2839,12,'12'),(2840,13,'13'),(2841,14,'14'),(2842,15,'15'),(2843,16,'16');
/*!40000 ALTER TABLE `distrito_escolar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20220221203630','2022-02-21 17:37:07',2600),('DoctrineMigrations\\Version20220221211419','2022-02-21 18:16:01',2952),('DoctrineMigrations\\Version20220222211409','2022-02-22 18:17:50',1676),('DoctrineMigrations\\Version20220224161824','2022-02-24 13:19:00',3421),('DoctrineMigrations\\Version20220224221730','2022-02-24 19:19:10',586),('DoctrineMigrations\\Version20220224223007','2022-02-24 19:30:20',46),('DoctrineMigrations\\Version20220225021843','2022-03-02 17:13:53',785),('DoctrineMigrations\\Version20220330210615','2022-03-30 18:07:25',1400),('DoctrineMigrations\\Version20220330212354','2022-03-30 18:24:27',730),('DoctrineMigrations\\Version20220330215239','2022-03-30 18:53:27',380),('DoctrineMigrations\\Version20220330221145','2022-03-30 19:12:33',4929),('DoctrineMigrations\\Version20220331185147','2022-03-31 15:55:24',1297),('DoctrineMigrations\\Version20220331191548','2022-03-31 16:17:44',5926),('DoctrineMigrations\\Version20220331191945','2022-03-31 16:20:45',3431),('DoctrineMigrations\\Version20220331193817','2022-03-31 16:39:44',47),('DoctrineMigrations\\Version20220331203847','2022-03-31 17:39:24',3507),('DoctrineMigrations\\Version20220331205435','2022-03-31 17:55:01',761),('DoctrineMigrations\\Version20220331210029','2022-03-31 18:00:41',528),('DoctrineMigrations\\Version20220331210907','2022-03-31 18:11:55',3295),('DoctrineMigrations\\Version20220401180313','2022-04-01 15:03:23',5134),('DoctrineMigrations\\Version20220401181742','2022-04-01 15:17:51',1269),('DoctrineMigrations\\Version20220404220747','2022-04-04 19:07:56',5343),('DoctrineMigrations\\Version20220405140748','2022-04-05 11:07:57',648),('DoctrineMigrations\\Version20220405141322','2022-04-05 11:18:32',3450),('DoctrineMigrations\\Version20220405144940','2022-04-05 11:49:56',584),('DoctrineMigrations\\Version20220405145605','2022-04-05 11:56:14',3732),('DoctrineMigrations\\Version20220405190049','2022-04-05 16:01:04',4991),('DoctrineMigrations\\Version20220405191407','2022-04-05 16:21:26',33),('DoctrineMigrations\\Version20220405205457','2022-04-05 17:55:05',886),('DoctrineMigrations\\Version20220407142100','2022-04-07 11:22:30',2666),('DoctrineMigrations\\Version20220407151954','2022-04-07 12:20:10',3970),('DoctrineMigrations\\Version20220407152531','2022-04-07 13:05:35',564),('DoctrineMigrations\\Version20220407161418','2022-04-08 15:15:45',3878),('DoctrineMigrations\\Version20220408181613','2022-04-08 15:16:37',3744),('DoctrineMigrations\\Version20220408195429','2022-04-08 16:57:25',5645),('DoctrineMigrations\\Version20220412205959','2022-04-12 18:02:36',459);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domicilio`
--

DROP TABLE IF EXISTS `domicilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domicilio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `calle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `altura` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal` tinyint(1) DEFAULT NULL,
  `c_postal` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edificio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9B942ED18A652BD6` (`edificio_id`),
  CONSTRAINT `FK_9B942ED18A652BD6` FOREIGN KEY (`edificio_id`) REFERENCES `edificio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=336 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domicilio`
--

LOCK TABLES `domicilio` WRITE;
/*!40000 ALTER TABLE `domicilio` DISABLE KEYS */;
INSERT INTO `domicilio` VALUES (330,'Córdoba, Av.','1951',1,'C1120AAB',338),(331,'Ayacucho','875',0,'C1120AAB',338),(332,'Paraguay','1950',0,'C1121ABD',338),(333,'Riobamba','882',0,'C1116ABB',338),(334,'Bolívar','1235',1,'C1141AAA',340),(335,'Saraza','4241',1,'C1407AAE',341);
/*!40000 ALTER TABLE `domicilio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domicilio_localizacion`
--

DROP TABLE IF EXISTS `domicilio_localizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `domicilio_localizacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `actualizado` datetime DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `principal` tinyint(1) DEFAULT NULL,
  `domicilio_id` int DEFAULT NULL,
  `localizacion_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DABAA005166FC4DD` (`domicilio_id`),
  KEY `IDX_DABAA005C851F487` (`localizacion_id`),
  CONSTRAINT `FK_DABAA005166FC4DD` FOREIGN KEY (`domicilio_id`) REFERENCES `domicilio` (`id`),
  CONSTRAINT `FK_DABAA005C851F487` FOREIGN KEY (`localizacion_id`) REFERENCES `localizacion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domicilio_localizacion`
--

LOCK TABLES `domicilio_localizacion` WRITE;
/*!40000 ALTER TABLE `domicilio_localizacion` DISABLE KEYS */;
INSERT INTO `domicilio_localizacion` VALUES (44,NULL,'2022-04-12 17:22:21',1,330,227),(45,NULL,'2022-04-12 17:22:21',1,335,235);
/*!40000 ALTER TABLE `domicilio_localizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edificio`
--

DROP TABLE IF EXISTS `edificio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `edificio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cui` int DEFAULT NULL,
  `referencia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comuna_id` int DEFAULT NULL,
  `distrito_escolar_id` int DEFAULT NULL,
  `barrio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DED4A4E8989D9B62` (`slug`),
  UNIQUE KEY `UNIQ_DED4A4E8D3F6F824` (`cui`),
  UNIQUE KEY `UNIQ_DED4A4E8C01213D8` (`referencia`),
  KEY `IDX_DED4A4E873AEFE7` (`comuna_id`),
  KEY `IDX_DED4A4E862E97D21` (`distrito_escolar_id`),
  KEY `IDX_DED4A4E8DBA79E2A` (`barrio_id`),
  CONSTRAINT `FK_DED4A4E862E97D21` FOREIGN KEY (`distrito_escolar_id`) REFERENCES `distrito_escolar` (`id`),
  CONSTRAINT `FK_DED4A4E873AEFE7` FOREIGN KEY (`comuna_id`) REFERENCES `comuna` (`id`),
  CONSTRAINT `FK_DED4A4E8DBA79E2A` FOREIGN KEY (`barrio_id`) REFERENCES `barrio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=342 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edificio`
--

LOCK TABLES `edificio` WRITE;
/*!40000 ALTER TABLE `edificio` DISABLE KEYS */;
INSERT INTO `edificio` VALUES (338,1,'Sede ENS 1','sede-ens-1',1792,2828,342),(339,2,'Sede ENS 2','sede-ens-2',1793,2833,NULL),(340,3,'Sede ENS 3 ST','sede-ens-3-st',1794,2831,343),(341,33,'Anexo ENS 3 VL','anexo-ens-3-vl',1805,2831,344);
/*!40000 ALTER TABLE `edificio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `establecimiento`
--

DROP TABLE IF EXISTS `establecimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `establecimiento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cue` varchar(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nombre` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `descripcion` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fecha_creacion` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tiene_cooperadora` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `apodo` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `orden` int DEFAULT NULL,
  `campo_deportes` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `actualizado` datetime DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `tipo_establecimiento_id` int DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `area_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_94A4D17E989D9B62` (`slug`),
  KEY `IDX_94A4D17EE83582FE` (`tipo_establecimiento_id`),
  KEY `IDX_94A4D17EBD0F409C` (`area_id`),
  CONSTRAINT `establecimiento_FK` FOREIGN KEY (`tipo_establecimiento_id`) REFERENCES `tipo_establecimiento` (`id`),
  CONSTRAINT `FK_94A4D17EBD0F409C` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=340 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `establecimiento`
--

LOCK TABLES `establecimiento` WRITE;
/*!40000 ALTER TABLE `establecimiento` DISABLE KEYS */;
INSERT INTO `establecimiento` VALUES (337,'001','ENS 1 Roque Saenz Peña',1,NULL,NULL,NULL,NULL,'ENS 1',1,NULL,NULL,'2022-04-12 17:22:21',114,'ens-1',203),(338,'002','ENS 2 M Acosta',2,NULL,NULL,NULL,NULL,'ENS 2',2,NULL,NULL,'2022-04-12 17:22:21',114,'ens-2',203),(339,'003','ENS 3 Rivadavia',3,NULL,NULL,NULL,'http://ens3.caba.infd.edu.ar/','ENS 3',3,NULL,NULL,'2022-04-12 17:22:21',114,'ens-3',203);
/*!40000 ALTER TABLE `establecimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `establecimiento_edificio`
--

DROP TABLE IF EXISTS `establecimiento_edificio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `establecimiento_edificio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cue_anexo` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `te` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referente_sga` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `establecimiento_id` int DEFAULT NULL,
  `edificio_id` int DEFAULT NULL,
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_37D12C6571B61351` (`establecimiento_id`),
  KEY `IDX_37D12C658A652BD6` (`edificio_id`),
  CONSTRAINT `FK_37D12C6571B61351` FOREIGN KEY (`establecimiento_id`) REFERENCES `establecimiento` (`id`),
  CONSTRAINT `FK_37D12C658A652BD6` FOREIGN KEY (`edificio_id`) REFERENCES `edificio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `establecimiento_edificio`
--

LOCK TABLES `establecimiento_edificio` WRITE;
/*!40000 ALTER TABLE `establecimiento_edificio` DISABLE KEYS */;
INSERT INTO `establecimiento_edificio` VALUES (171,'00','Sede Av. Córdoba',NULL,NULL,NULL,NULL,337,338,NULL),(172,'00','Sede Bolívar',NULL,NULL,'4361-8965',NULL,339,340,'ens3st@bue.edu.ar'),(173,'01','Anexo Villa Lugano',NULL,NULL,'4602-4206',NULL,339,341,'ens3vl@bue.edu.ar');
/*!40000 ALTER TABLE `establecimiento_edificio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localizacion`
--

DROP TABLE IF EXISTS `localizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `localizacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unidad_educativa_id` int NOT NULL,
  `actualizado` datetime DEFAULT NULL,
  `creado` datetime DEFAULT NULL,
  `establecimiento_edificio_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5512F061BF20CF2F` (`unidad_educativa_id`),
  KEY `IDX_5512F061E0B84520` (`establecimiento_edificio_id`),
  CONSTRAINT `FK_5512F061BF20CF2F` FOREIGN KEY (`unidad_educativa_id`) REFERENCES `unidad_educativa` (`id`),
  CONSTRAINT `FK_5512F061E0B84520` FOREIGN KEY (`establecimiento_edificio_id`) REFERENCES `establecimiento_edificio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localizacion`
--

LOCK TABLES `localizacion` WRITE;
/*!40000 ALTER TABLE `localizacion` DISABLE KEYS */;
INSERT INTO `localizacion` VALUES (227,451,NULL,'2022-04-12 17:22:21',171),(228,452,NULL,'2022-04-12 17:22:21',171),(229,453,NULL,'2022-04-12 17:22:21',171),(230,454,NULL,'2022-04-12 17:22:21',171),(231,455,NULL,'2022-04-12 17:22:21',172),(232,456,NULL,'2022-04-12 17:22:21',172),(233,457,NULL,'2022-04-12 17:22:21',172),(234,458,NULL,'2022-04-12 17:22:21',172),(235,458,NULL,'2022-04-12 17:22:21',173);
/*!40000 ALTER TABLE `localizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel`
--

DROP TABLE IF EXISTS `nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nivel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abreviatura` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=401 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel`
--

LOCK TABLES `nivel` WRITE;
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
INSERT INTO `nivel` VALUES (397,'Inicial','Ini',1),(398,'Primario','Pri',2),(399,'Medio','Med',3),(400,'Terciario','Ter',4);
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_establecimiento`
--

DROP TABLE IF EXISTS `tipo_establecimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_establecimiento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `orden` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_establecimiento`
--

LOCK TABLES `tipo_establecimiento` WRITE;
/*!40000 ALTER TABLE `tipo_establecimiento` DISABLE KEYS */;
INSERT INTO `tipo_establecimiento` VALUES (114,'ENS','Escuela Normal Superior',1);
/*!40000 ALTER TABLE `tipo_establecimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_oferta_educativa`
--

DROP TABLE IF EXISTS `tipo_oferta_educativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_oferta_educativa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nivel_id` int NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_846B272ADA3426AE` (`nivel_id`),
  CONSTRAINT `FK_846B272ADA3426AE` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_oferta_educativa`
--

LOCK TABLES `tipo_oferta_educativa` WRITE;
/*!40000 ALTER TABLE `tipo_oferta_educativa` DISABLE KEYS */;
INSERT INTO `tipo_oferta_educativa` VALUES (231,397,'INI','Jardín de infantes'),(232,398,'PRI','Primaria común'),(233,399,'NES','Nueva escuela secundaria'),(234,399,'SDF','Secundaria del futuro'),(235,400,'CARFD','Carrera terciaria de formación docente'),(236,400,'CARFT','Carrera terciaria de formación técnica'),(237,400,'POST','Postítulo');
/*!40000 ALTER TABLE `tipo_oferta_educativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_educativa`
--

DROP TABLE IF EXISTS `unidad_educativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unidad_educativa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actualizado` datetime NOT NULL,
  `creado` datetime DEFAULT NULL,
  `establecimiento_id` int NOT NULL,
  `nivel_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_27515E8071B61351` (`establecimiento_id`),
  KEY `IDX_27515E80DA3426AE` (`nivel_id`),
  CONSTRAINT `FK_27515E8071B61351` FOREIGN KEY (`establecimiento_id`) REFERENCES `establecimiento` (`id`),
  CONSTRAINT `FK_27515E80DA3426AE` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=459 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_educativa`
--

LOCK TABLES `unidad_educativa` WRITE;
/*!40000 ALTER TABLE `unidad_educativa` DISABLE KEYS */;
INSERT INTO `unidad_educativa` VALUES (451,'Inicial de la ENS1','2022-04-12 17:22:21','2022-04-12 17:22:21',337,397),(452,'Primaria de la ENS1','2022-04-12 17:22:21','2022-04-12 17:22:21',337,398),(453,'Media de la ENS1','2022-04-12 17:22:21','2022-04-12 17:22:21',337,399),(454,'Terciario de la ENS1','2022-04-12 17:22:21','2022-04-12 17:22:21',337,400),(455,'Inicial de la ENS3','2022-04-12 17:22:21','2022-04-12 17:22:21',339,397),(456,'Primaria de la ENS3','2022-04-12 17:22:21','2022-04-12 17:22:21',339,398),(457,'Media de la ENS3','2022-04-12 17:22:21','2022-04-12 17:22:21',339,399),(458,'Terciario de la ENS3','2022-04-12 17:22:21','2022-04-12 17:22:21',339,400);
/*!40000 ALTER TABLE `unidad_educativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (135,'marcelo','[\"ROLE_USER\", \"ROLE_SUPER_ADMIN\", \"ROLE_ADMIN\"]','$argon2id$v=19$m=65536,t=4,p=1$v21vMWK5LN1O4jUIevp/Cw$7FXajy0x8C0U/QwETUmhRP9NBhRq+cr1ef2/wWGxrOU','mprizmic@gmail.com'),(136,'otro','[\"ROLE_USER\"]','$argon2id$v=19$m=65536,t=4,p=1$IAkVMfWxkDP+CqNrUms5kg$Q3FoNBJgL9UqilFnnSo3kk7wtKEQOeYYa9uOX/6wHtE','otro@otro.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vecino`
--

DROP TABLE IF EXISTS `vecino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vecino` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `actualizado` datetime NOT NULL,
  `creado` datetime NOT NULL,
  `edificio_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_758D25E08A652BD6` (`edificio_id`),
  CONSTRAINT `FK_758D25E08A652BD6` FOREIGN KEY (`edificio_id`) REFERENCES `edificio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vecino`
--

LOCK TABLES `vecino` WRITE;
/*!40000 ALTER TABLE `vecino` DISABLE KEYS */;
INSERT INTO `vecino` VALUES (181,'Escuela de Comercio Nº 10 Islas Malvinas','2022-04-12 17:22:21','2022-04-12 17:22:21',338),(182,'Liceo 4 R. de E. de San Martín','2022-04-12 17:22:21','2022-04-12 17:22:21',338),(183,'IES 2 - ENS 2','2022-04-12 17:22:21','2022-04-12 17:22:21',339);
/*!40000 ALTER TABLE `vecino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'fd5'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-12 18:07:17
