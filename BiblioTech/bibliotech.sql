-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: bibliotech
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `registro_libro`
--

DROP TABLE IF EXISTS `registro_libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_libro` (
  `id_libro` varchar(20) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `editorial` varchar(100) NOT NULL,
  `anio_publicacion` year(4) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0 CHECK (`stock` >= 0),
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_libro`
--

LOCK TABLES `registro_libro` WRITE;
/*!40000 ALTER TABLE `registro_libro` DISABLE KEYS */;
INSERT INTO `registro_libro` VALUES ('LBR001','Don Quijote de la Mancha','Miguel de Cervantes','Desconocida',0000,10),('LBR002','Cien anios de soledad','Gabriel Garc?a M?rquez','Desconocida',1967,10),('LBR003','1984','George Orwell','Desconocida',1949,10),('LBR004','Orgullo y prejuicio','Jane Austen','Desconocida',0000,10),('LBR005','Crimen y castigo','Fi?dor Dostoyevski','Desconocida',0000,10),('LBR006','Matar a un ruisenor','Harper Lee','Desconocida',1960,10),('LBR007','En busca del tiempo perdido','Marcel Proust','Desconocida',1913,10),('LBR008','Ulises','James Joyce','Desconocida',1922,10),('LBR009','El gran Gatsby','F. Scott Fitzgerald','Desconocida',1925,10),('LBR010','Cumbres borrascosas','Emily Bronte','Desconocida',0000,10);
/*!40000 ALTER TABLE `registro_libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_prestamo`
--

DROP TABLE IF EXISTS `registro_prestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_prestamo` (
  `id_prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `rut_usuario` varchar(12) DEFAULT NULL,
  `id_libro` varchar(20) DEFAULT NULL,
  `fecha_prestamo` date NOT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  PRIMARY KEY (`id_prestamo`),
  KEY `rut_usuario` (`rut_usuario`),
  KEY `id_libro` (`id_libro`),
  CONSTRAINT `registro_prestamo_ibfk_1` FOREIGN KEY (`rut_usuario`) REFERENCES `registro_usuario` (`rut`),
  CONSTRAINT `registro_prestamo_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `registro_libro` (`id_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_prestamo`
--

LOCK TABLES `registro_prestamo` WRITE;
/*!40000 ALTER TABLE `registro_prestamo` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_prestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_usuario`
--

DROP TABLE IF EXISTS `registro_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_usuario` (
  `rut` varchar(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fono` varchar(20) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_usuario`
--

LOCK TABLES `registro_usuario` WRITE;
/*!40000 ALTER TABLE `registro_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-18  0:59:59
