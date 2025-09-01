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
-- Table structure for table `prestamos_libros`
--

DROP TABLE IF EXISTS `prestamos_libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestamos_libros` (
  `id_prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `fecha_prestamo` date DEFAULT curdate(),
  `fecha_devolucion` date DEFAULT NULL,
  `devuelto` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id_prestamo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_libro` (`id_libro`),
  CONSTRAINT `prestamos_libros_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `registro_usuarios` (`id_usuario`),
  CONSTRAINT `prestamos_libros_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `registro_libros` (`id_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamos_libros`
--

LOCK TABLES `prestamos_libros` WRITE;
/*!40000 ALTER TABLE `prestamos_libros` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestamos_libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_libros`
--

DROP TABLE IF EXISTS `registro_libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_libros` (
  `id_libro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `editorial` varchar(100) DEFAULT NULL,
  `anio_publicacion` year(4) DEFAULT NULL,
  `stock` int(11) DEFAULT 1,
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_libros`
--

LOCK TABLES `registro_libros` WRITE;
/*!40000 ALTER TABLE `registro_libros` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_usuarios`
--

DROP TABLE IF EXISTS `registro_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `fecha_registro` date DEFAULT curdate(),
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_usuarios`
--

LOCK TABLES `registro_usuarios` WRITE;
/*!40000 ALTER TABLE `registro_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-31 21:55:18
