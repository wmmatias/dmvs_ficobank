-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dmvs_ficobank
-- ------------------------------------------------------
-- Server version	5.7.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`created_by`),
  KEY `fk_logs_users1_idx` (`created_by`),
  CONSTRAINT `fk_logs_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'admin firstname admin lastname successfully logged out',1,'2022-11-22 18:30:25'),(2,'admin firstname admin lastname successfully logged in',1,'2022-11-22 18:30:30'),(3,'admin firstname admin lastname successfully logged in',1,'2022-11-23 01:53:09'),(4,'admin firstname admin lastname successfully logged out',1,'2022-11-23 10:55:57'),(5,'WILARD MATIAS successfully logged in',42,'2022-11-23 10:56:02'),(6,'WILARD MATIAS successfully logged out',42,'2022-11-23 11:00:47'),(7,'WILARD MATIAS successfully logged in',44,'2022-11-23 11:01:37'),(8,'WILARD MATIAS successfully logged out',44,'2022-11-23 11:01:52'),(9,'admin firstname admin lastname successfully logged in',1,'2022-11-23 11:01:56'),(10,'admin firstname admin lastname successfully logged out',1,'2022-11-23 11:02:50'),(11,'WILARD MATIAS successfully logged in',42,'2022-11-23 11:03:37'),(12,'WILARD MATIAS successfully logged out',42,'2022-11-23 11:03:45'),(13,'WILARD MATIAS successfully logged in',44,'2022-11-23 11:03:50'),(14,'WILARD MATIAS successfully logged out',44,'2022-11-23 11:04:00'),(15,'admin firstname admin lastname successfully logged in',1,'2022-11-23 11:04:05'),(16,'admin firstname admin lastname successfully logged in',1,'2022-11-23 14:25:11'),(17,'Clyde Reese Matias successfully logged out',1,'2022-11-23 16:16:42'),(18,'admin firstname admin lastname successfully logged in',1,'2022-11-24 01:08:03');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-24 16:47:38
