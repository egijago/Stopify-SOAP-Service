-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: stopify_soap
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB

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
-- Table structure for table `logging`
--

DROP TABLE IF EXISTS `logging`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logging` (
  `id_logging` int(11) NOT NULL AUTO_INCREMENT,
  `api_key` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `end_point` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_logging`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logging`
--

LOCK TABLES `logging` WRITE;
/*!40000 ALTER TABLE `logging` DISABLE KEYS */;
INSERT INTO `logging` VALUES (1,'API_KEY_1','192.168.1.1','/endpoint1','Description for endpoint 1','2023-11-07 05:00:00'),(2,'API_KEY_2','192.168.1.2','/endpoint2','Description for endpoint 2','2023-11-07 05:30:00'),(3,'API_KEY_3','192.168.1.3','/endpoint3','Description for endpoint 3','2023-11-07 06:00:00'),(4,'node-api-key','0:0:0:0:0:0:0:1','{http://payment.services/}processPayment','arg 0 : 1;arg 1 : 2;arg 2 : 5;arg 3 : PHP;arg 4 : 123;arg 5 : 543;arg 6 : 1233;arg 7 : 127;','2023-11-14 13:44:11'),(5,'node-api-key','0:0:0:0:0:0:0:1','{http://payment.services/}getTotalPaymentByIdArtist','arg 0 : 0;','2023-11-14 14:10:26'),(6,'node-api-key','0:0:0:0:0:0:0:1','{http://payment.services/}getTotalPaymentByIdArtist','arg 0 : 0;','2023-11-14 14:15:38'),(7,'node-api-key','0:0:0:0:0:0:0:1','{http://payment.services/}getTotalPaymentByIdArtist','arg 0 : 0;','2023-11-14 14:18:57'),(8,'node-api-key','0:0:0:0:0:0:0:1','{http://payment.services/}getTotalPaymentByIdArtist','arg 0 : 0;','2023-11-14 14:26:09'),(9,'node-api-key','0:0:0:0:0:0:0:1','{http://subscription.services/}confirmSubscription','arg 0 : 12;arg 1 : 12;','2023-11-14 14:27:14'),(10,'node-api-key','0:0:0:0:0:0:0:1','{http://subscription.services/}confirmSubscription','arg 0 : 12;arg 1 : 12;','2023-11-14 14:28:07'),(11,'node-api-key','0:0:0:0:0:0:0:1','{http://subscription.services/}confirmSubscription','arg 0 : 12;arg 1 : 12;','2023-11-14 14:33:15');
/*!40000 ALTER TABLE `logging` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_artist` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `card_owner` varchar(255) NOT NULL,
  `card_exp_month` int(11) NOT NULL,
  `card_exp_year` int(11) NOT NULL,
  `card_cvc` int(11) NOT NULL,
  PRIMARY KEY (`id_payment`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,1,2,5,'PHP','123',543,1233,127);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `id_subscription` int(11) NOT NULL AUTO_INCREMENT,
  `id_artist` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(16) NOT NULL,
  PRIMARY KEY (`id_subscription`),
  UNIQUE KEY `uq_subscription` (`id_artist`,`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-16 20:35:12
