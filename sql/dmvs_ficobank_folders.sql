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
-- Table structure for table `folders`
--

DROP TABLE IF EXISTS `folders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `doc_number` varchar(245) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `loan_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `location` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `fk_documents_users1_idx` (`user_id`),
  CONSTRAINT `fk_documents_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `folders`
--

LOCK TABLES `folders` WRITE;
/*!40000 ALTER TABLE `folders` DISABLE KEYS */;
INSERT INTO `folders` VALUES (1,1,'202211221129-19','WILARD MARQUEZ MATIAS',0,0,0,'2022-11-22 23:29:51','2022-11-22 23:29:51'),(2,1,'202211221136-45','Clyde Reese Matias',0,0,0,'2022-11-22 23:36:58','2022-11-22 23:36:58'),(4,1,'202211221144-28','winner matias',1,0,0,'2022-11-22 23:44:43','2022-11-22 23:44:43'),(5,1,'202211221146-55','WILARD MARQUEZ MATIAS',1,0,0,'2022-11-22 23:46:09','2022-11-22 23:46:09'),(8,1,'202211221159-47','Clyde Reese Matias',0,0,0,'2022-11-22 23:59:06','2022-11-22 23:59:06'),(9,1,'202211231217-78','wilard matias',1,0,0,'2022-11-23 00:17:28','2022-11-23 00:17:28'),(15,1,'202211231227-69','wilard matias',1,0,0,'2022-11-23 00:27:45','2022-11-23 00:27:45'),(23,1,'202211231245-54','wilard matias',1,0,0,'2022-11-23 00:45:22','2022-11-23 00:45:22'),(26,1,'20221123135-86','wilard matias',0,0,0,'2022-11-23 01:35:26','2022-11-23 01:35:26'),(32,1,'20221123141-73','Clyde Reese Matias',0,3,1,'2022-11-23 01:41:13','2022-11-23 16:53:35'),(34,1,'20221123235-82','Clyde Reese Matias',0,1,1,'2022-11-23 02:35:38','2022-11-23 17:32:57'),(36,1,'202211231000-24','Wilard Marquez Matias',0,0,4,'2022-11-23 10:00:30','2022-11-23 23:59:38'),(40,1,'20221123108-20','Clyde Reese Matias',2,0,4,'2022-11-23 13:08:50','2022-11-23 18:39:21'),(45,1,'20221123705-19','Wilard Matias',3,0,2,'2022-11-23 19:05:22','2022-11-23 19:08:52'),(46,1,'202211231033-74','Wilard Matias',0,0,0,'2022-11-23 22:33:12','2022-11-23 22:33:12'),(47,1,'202211231056-100','Wilard Matias',0,0,1,'2022-11-23 22:56:22','2022-11-23 22:57:51'),(48,1,'202211231058-53','Wilard Matias',3,0,1,'2022-11-23 22:58:18','2022-11-23 22:58:26'),(49,1,'202211231059-68','Wilard Matias',2,0,1,'2022-11-23 22:59:43','2022-11-23 22:59:49'),(52,1,'202211231107-34','Clyde Reese Matias',1,0,1,'2022-11-23 23:07:15','2022-11-23 23:07:29'),(53,1,'202211231111-35','Wilard Marquez Matias',2,0,1,'2022-11-23 23:11:16','2022-11-23 23:11:29'),(54,1,'202211231112-64','Winner Matias',3,0,1,'2022-11-23 23:12:24','2022-11-23 23:12:31'),(55,1,'202211231115-12','Clyde Reese Matias',0,0,1,'2022-11-23 23:15:03','2022-11-23 23:15:19'),(56,1,'202211231118-43','Clyde Reese Matias',2,0,0,'2022-11-23 23:18:55','2022-11-23 23:18:55'),(57,1,'202211231121-36','Clyde Reese Matias',2,0,1,'2022-11-23 23:21:54','2022-11-23 23:22:01'),(58,1,'202211231123-40','Wilard Matias',1,0,1,'2022-11-23 23:23:29','2022-11-23 23:23:40'),(59,1,'202211231124-13','Wilard Matias',0,0,0,'2022-11-23 23:24:06','2022-11-23 23:24:06'),(60,1,'202211231127-47','Clyde Reese Matias',1,0,0,'2022-11-23 23:27:23','2022-11-23 23:27:23'),(61,1,'202211231127-78','Wilard Matias',0,0,0,'2022-11-23 23:27:37','2022-11-23 23:27:37'),(62,1,'202211231128-59','Wilard Matias',1,0,0,'2022-11-23 23:28:41','2022-11-23 23:28:41'),(63,1,'202211231128-40','Clyde Reese Matias',1,0,1,'2022-11-23 23:28:51','2022-11-23 23:29:54'),(64,1,'202211231132-15','Wilard Matias',3,0,1,'2022-11-23 23:32:43','2022-11-23 23:32:51'),(65,1,'202211231134-36','Wilard Matias',0,0,1,'2022-11-23 23:34:46','2022-11-23 23:34:50');
/*!40000 ALTER TABLE `folders` ENABLE KEYS */;
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