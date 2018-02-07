-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: tollPlaza
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.17.10.1

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
-- Table structure for table `toll_access`
--

DROP TABLE IF EXISTS `toll_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toll_access` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `toll_id` int(16) DEFAULT NULL,
  `user_id` int(16) DEFAULT NULL,
  `round` tinyint(1) NOT NULL DEFAULT '0',
  `payTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toll_access`
--

LOCK TABLES `toll_access` WRITE;
/*!40000 ALTER TABLE `toll_access` DISABLE KEYS */;
INSERT INTO `toll_access` VALUES (1,11,1,2,'2018-02-07 16:53:48'),(2,11,2,1,'2018-02-07 16:53:54'),(3,11,5,1,'2018-02-07 16:53:58');
/*!40000 ALTER TABLE `toll_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `toll_access_logs`
--

DROP TABLE IF EXISTS `toll_access_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `toll_access_logs` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `toll_id` int(16) NOT NULL,
  `user_id` int(16) NOT NULL,
  `timeOfPass` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `toll_access_logs`
--

LOCK TABLES `toll_access_logs` WRITE;
/*!40000 ALTER TABLE `toll_access_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `toll_access_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tolls`
--

DROP TABLE IF EXISTS `tolls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tolls` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `lat` varchar(15) DEFAULT NULL,
  `lng` varchar(15) DEFAULT NULL,
  `heavy_rate` int(5) DEFAULT NULL,
  `heavy_return_rate` int(5) DEFAULT NULL,
  `medium_rate` int(5) DEFAULT NULL,
  `medium_return_rate` int(5) DEFAULT NULL,
  `light_rate` int(5) DEFAULT NULL,
  `light_return_rate` int(5) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tolls`
--

LOCK TABLES `tolls` WRITE;
/*!40000 ALTER TABLE `tolls` DISABLE KEYS */;
INSERT INTO `tolls` VALUES (1,'bhopal-delhi',NULL,'29.8700','77.8952',500,750,400,600,300,450,'bhopal-delhi','$2y$10$nxiFF1KtpR8x/9/PfK3p9.2uHB/hm73.tekW.ccDxOtGrb7aGozhS','toll'),(2,'bhopal-gwalior',NULL,'29.8700','72.894',500,750,400,600,300,450,'gwalior highway','$2y$10$29L8B1fwFrNYW8adV5Y8lu7CwXhEbhB148zb8zbHtG49SA34NzGN6','toll'),(3,'bhopal-jaipur',NULL,'29.8700','72.894',500,750,400,600,300,450,'jaipur highway','$2y$10$wYxJ3Zb2TepFVFXoVynWo.Q/eWh4JzWvu7DjEgMwIchSZQ3E7RGOO','toll'),(4,'gujrat-delhi',NULL,'29.8700','77.8952',500,750,400,600,300,450,'gujrat highway','$2y$10$Y3HSxzyoZiMgToDsCmnuA.rEX.Uk50Jx5Rs.S93KltfrJE0R2BKrG','toll'),(5,'delhi-bombay',NULL,'29.8700','72.894',500,750,400,600,300,450,'bombay highway','$2y$10$mWQw.aCS6jcdwF/BwFR0OeLnqsXAMuJIzni4MmrYt9w3U/Ws.LGYu','toll'),(6,'haryana-haridwar',NULL,'29.8700','72.894',500,750,400,600,300,450,'haridwar highway','$2y$10$8.11aync/boprg7pHAWlIOHwpOH2S2sfoGJLP2wGWBMf0g2sBQfEG','toll'),(7,'roorkee-hariwdar',NULL,'29.8700','72.894',500,750,400,600,300,450,'roorkee highway','$2y$10$O9/yAOrOM3LGCutli3XEauh8ni8zLZ2PBwXLxXm6Z.81TZQUB/CFa','toll'),(8,'lalitpur-gwahati',NULL,'29.8700','72.894',500,750,400,600,300,450,'gwahati highway','$2y$10$Twayi60pUr5xMl4mw4518OHRYD2Vjftcng9WgBR72a9xec1VWg30i','toll'),(9,'kanpur-roorkee',NULL,'29.8700','72.894',500,750,400,600,300,450,'roorkeehighway','$2y$10$NFDVMKhX10Uiu2V7vwKViOoZ0pyaR5/8zEMINg3MmfryzMGiNDnh6','toll'),(10,'gwalior-mumbai',NULL,'29.8700','77.894',500,750,400,600,300,450,'mumbaihighway','$2y$10$fRHrFHl6xeoLs93fjTncB.1CYhg/cZUIG0ApKgzCnTwP.XejGBTby','toll'),(11,'roorkee-lucknow highway',NULL,'29.8715','77.895',110,200,52,95,24,40,'rklko','$2y$10$atQIWDE1M1z2KKH0fzpFV.b5.P4eY1yF9u6.762VG1RaLzt6ZHss2','toll');
/*!40000 ALTER TABLE `tolls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_logs`
--

DROP TABLE IF EXISTS `user_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_logs` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` int(16) DEFAULT NULL,
  `toll_id` int(16) DEFAULT NULL,
  `payment` int(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logs`
--

LOCK TABLES `user_logs` WRITE;
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `carVariant` varchar(255) DEFAULT NULL,
  `carColor` varchar(255) DEFAULT NULL,
  `licenseNo` varchar(255) DEFAULT NULL,
  `balance` int(6) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `password` varchar(260) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `vehicleNo` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `vehicleSize` varchar(10) DEFAULT NULL,
  `qr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'prashant ahirvar','heavy','black','1234',NULL,'male','user','$2y$10$FUPsFHcrHBLapx8Sq9ifnuSFOGWOn0Su1blKsd2aQ3OIZOsCJTeNG','2013-02-02','9131829188','mp 04 1555','prashant verma',NULL,NULL),(2,'Kshitij Pratap','medium','blue','1234',NULL,'male','user','$2y$10$k.FQBPEhMzREk04ps9hso.fvylToriicbnmBDHRH9pPJsMoa7BGom','2016-12-02','9131829188','mp 04 1555','kshitij0809',NULL,NULL),(3,'kshitijpratapsingh','light','black','46534',NULL,'male','user','$2y$10$glhFTe0HmNMjeke/UT6DNO5QFKLPtaIBRvUpP7xWxeEHycIv3sQjK','1994-12-01','9131829188','mp 04 1557','kshitij pratap',NULL,NULL),(4,'rajat singh','light','blue','1234',NULL,'male','user','$2y$10$dZ1QitpkA2aE7nFjZc/1T.8wfooLkS3MdKTH7e33kwu2Cu4MWyQF.','2021-11-02','9131829188','mp 04 1557','rajat singh',NULL,NULL),(5,'nikhil mehra','light','blue','1234',NULL,'male','user','$2y$10$rCr/hd0CB2F1nC5MlhZgFeJ9FfTGFdGnk5VVcxBPgCF/N5Nn7WQvW','2010-01-01','9131829188','gu 04 1555','nikhil mehra',NULL,NULL),(6,'nikhil mehra','medium','red','1234',NULL,'male','user','$2y$10$feWuJ15ZxdIhgnZsnA2gXelsBJayA5A8GtrWjNHjnEFne7oKjHbA.','2005-02-02','9131829188','ha 09 1995','nikhil mehra singh',NULL,NULL),(7,'kshitij','light','blue','1234',NULL,'male','user','$2y$10$Y0ijHkkn5nVDcte8lTn9AuE2Xmm0dc.gyrIixg1AfxjA4Lqn2ruV6','2016-12-31','9131829188','mp 04 1555','verma',NULL,NULL),(8,'prashant','light','red','547856',NULL,'male','user','$2y$10$44FwwhYBJpH9TYVZs.8fM.y1ZyhSW2gs32KvIZ04bNLE6U/Q9S5je','2017-12-31','9919431223','75869','prashant',NULL,NULL);
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

-- Dump completed on 2018-02-07 22:50:02
