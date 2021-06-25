-- MariaDB dump 10.19  Distrib 10.5.9-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: jobnic
-- ------------------------------------------------------
-- Server version	10.5.9-MariaDB

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
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `row` int(11) NOT NULL AUTO_INCREMENT,
  `jobid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `describe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closed` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stars` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'48868','programming','634044','Test','Test caption','php python','Jun 21, 2021 22:43:33','','150000',NULL,'false','0','0'),(2,'18301','android','634044','Kotlin','we need a kotlin programmer','kotlin android','Jun 21, 2021 23:18:37','Jun 21, 2021 23:18:58','1500000','427617','false','0','0'),(3,'67096','android','634044','android','android','android kotlin','Jun 22, 2021 12:32:39',NULL,'52000',NULL,'true','0','0'),(4,'86348','design','634044','logo designer','a person','photoshop illustrator','Jun 22, 2021 12:33:07',NULL,'1500000',NULL,'true','1','0'),(5,'89072','programming','634044','python','python programmer','python linux','Jun 22, 2021 14:44:11',NULL,'150000',NULL,'true','17','0'),(6,'76730','android','634044','java','a java programmer','200000','Jun 22, 2021 15:34:00',NULL,'Agreement',NULL,'true','0','0'),(7,'33589','backend','634044','php','a person who knows php','php','Jun 22, 2021 15:38:12',NULL,'20000',NULL,'true','2','0'),(8,'76270','costume','634044','Agent in company','Hey I need an agent','office','Jun 22, 2021 23:28:25',NULL,'150000',NULL,'true','0','0'),(9,'68576','backend','427617','a php programmer','Hey we need a php programmer','php','Jun 22, 2021 23:33:23','Jun 22, 2021 23:33:37','150000','634044','false','0','0'),(10,'72445','backend','427617','Job Nic','a person','php','Jun 23, 2021 17:04:50','Jun 23, 2021 17:05:41','1500000','634044','false',NULL,'5');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `row` int(11) NOT NULL AUTO_INCREMENT,
  `msgid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'65543','Amirhossein Mohammadi','meysam@yahoo.com','09014784362','Hi','Jun 25, 2021 12:13:31',NULL);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `row` int(11) NOT NULL AUTO_INCREMENT,
  `id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stars` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`row`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'634044','I am Amit. Any thing else?','Amirhossein','Mohammadi','09014784362','amir@yahoo.com','22834478','GNU_Amir','amirhosseinmohammadi','leonardo_l_larson','BlackIQ','BlackIQ','php-70 laravel-5 python-40','Jun 21, 2021 18:13:03','10','payed','148'),(2,'427617',NULL,'Amirali','Mohammadi','09038450655','ali@yahoo.com','64208816',NULL,NULL,NULL,NULL,NULL,NULL,'Jun 21, 2021 18:14:25','8','payed','0');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-25 16:44:18
