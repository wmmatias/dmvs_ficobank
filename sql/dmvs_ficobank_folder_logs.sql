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
-- Table structure for table `folder_logs`
--

DROP TABLE IF EXISTS `folder_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `folder_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `folder_id` int(11) NOT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `location` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`folder_id`,`user_id`),
  KEY `fk_folder_logs_folders1_idx` (`folder_id`,`user_id`),
  CONSTRAINT `fk_folder_logs_folders1` FOREIGN KEY (`folder_id`, `user_id`) REFERENCES `folders` (`id`, `user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `folder_logs`
--

LOCK TABLES `folder_logs` WRITE;
/*!40000 ALTER TABLE `folder_logs` DISABLE KEYS */;
INSERT INTO `folder_logs` VALUES (1,32,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 02:20:21','2022-11-23 02:20:21'),(2,34,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 02:36:30','2022-11-23 02:36:30'),(3,36,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 10:00:50','2022-11-23 10:00:50'),(4,36,'Juan Dela Cruz','Front Desk',0,2,1,'2022-11-23 10:00:50','2022-11-23 10:00:50'),(5,36,'admin firstname admin lastname','Admin',1,1,1,'2022-11-23 10:00:50','2022-11-23 10:00:50'),(6,40,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 13:08:57','2022-11-23 13:08:57'),(7,40,'Juan Dela Cruz','Bookeeper',1,1,1,'2022-11-23 16:08:57','2022-11-23 16:08:57'),(8,40,'Wilard Matias','Postman',2,2,1,'2022-11-23 16:10:39','2022-11-23 16:10:39'),(9,40,'Juan Dela Cruz','Bookeeper',0,2,1,'2022-11-23 16:12:28','2022-11-23 16:12:28'),(10,40,'Juan Dela Cruz','Clerk',1,2,1,'2022-11-23 18:38:53','2022-11-23 18:38:53'),(11,40,'Juan Dela Cruz','Postman',0,4,1,'2022-11-23 18:39:21','2022-11-23 18:39:21'),(12,45,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 19:05:51','2022-11-23 19:05:51'),(13,45,'Wilard','Bookeeper',1,1,1,'2022-11-23 19:08:18','2022-11-23 19:08:18'),(14,45,'Juan Dela Cruz','Mail Man',2,2,1,'2022-11-23 19:08:41','2022-11-23 19:08:41'),(15,45,'Juan Dela Cruz','Bookeeper',0,2,1,'2022-11-23 19:08:52','2022-11-23 19:08:52'),(16,47,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 22:57:51','2022-11-23 22:57:51'),(17,48,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 22:58:26','2022-11-23 22:58:26'),(18,49,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 22:59:49','2022-11-23 22:59:49'),(19,52,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 23:07:30','2022-11-23 23:07:30'),(20,53,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 23:11:29','2022-11-23 23:11:29'),(21,54,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 23:12:31','2022-11-23 23:12:31'),(22,55,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 23:15:19','2022-11-23 23:15:19'),(23,57,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 23:22:01','2022-11-23 23:22:01'),(24,58,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 23:23:40','2022-11-23 23:23:40'),(25,63,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 23:29:54','2022-11-23 23:29:54'),(26,64,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 23:32:51','2022-11-23 23:32:51'),(27,65,'admin firstname admin lastname','Admin',0,1,1,'2022-11-23 23:34:50','2022-11-23 23:34:50'),(28,36,'Wilard Matias','Mail Man',2,4,1,'2022-11-23 23:47:41','2022-11-23 23:47:41'),(29,36,'Juan Dela Cruz','Bookeeper',0,4,1,'2022-11-23 23:59:38','2022-11-23 23:59:38'),(30,36,'Juan Dela Cruz','Bookeeper',1,4,1,'2022-11-24 00:01:29','2022-11-24 00:01:29'),(31,36,'Wilard','Mail Man',2,3,1,'2022-11-24 00:02:45','2022-11-24 00:02:45');
/*!40000 ALTER TABLE `folder_logs` ENABLE KEYS */;
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
