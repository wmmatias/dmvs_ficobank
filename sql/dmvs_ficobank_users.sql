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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_level` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin firstname','admin lastname','lard0595@gmail.com','admin','161ebd7d45089b3446ee4e0d86dbcf92','0',1,'2022-08-25 00:00:00','2022-08-25 00:00:00'),(42,'WILARD','MATIAS','lard0595@gmail.com','wmmatias','161ebd7d45089b3446ee4e0d86dbcf92','1',NULL,'2022-10-22 03:51:56','2022-10-22 03:51:56'),(44,'WILARD','MATIAS','laasdsssrd0595@gmail.com','wmmatiass','161ebd7d45089b3446ee4e0d86dbcf92','2',NULL,'2022-10-23 04:23:52','2022-10-23 04:23:52'),(45,'juan','dela cruz','lard0595@gmail.com','wmmatiasss','161ebd7d45089b3446ee4e0d86dbcf92','2',NULL,'2022-10-23 05:01:36','2022-10-23 05:01:36'),(46,'WILARD','MATIAS','lard0595@gmail.com','admin123','161ebd7d45089b3446ee4e0d86dbcf92','2',NULL,'2022-11-10 01:06:26','2022-11-10 01:06:26'),(47,'WILARD','MATIAS','lard0595@gmail.com','wmmatiasasssss','e0568dbe5554bc17a877ae08d8846fdd','2',NULL,'2022-11-22 08:17:01','2022-11-22 08:17:01'),(48,'WILARD','MATIAS','lard0595@gmail.com','userasdsss','e0568dbe5554bc17a877ae08d8846fdd','2',NULL,'2022-11-22 08:19:03','2022-11-22 08:19:03'),(49,'Wilard','Matias','lard0595@gmail.com','wmmatiasasdas','e0568dbe5554bc17a877ae08d8846fdd','2',NULL,'2022-11-22 08:34:47','2022-11-22 08:34:47'),(50,'Wilard','Matias','lard0595@gmail.com','wmmatiasa','e0568dbe5554bc17a877ae08d8846fdd','1',NULL,'2022-11-24 01:40:52','2022-11-24 01:40:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-24 16:47:37
