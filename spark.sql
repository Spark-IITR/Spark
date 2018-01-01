-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: spark
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.17.04.1


--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(527) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `college` varchar(527) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `cgpa` varchar(10) DEFAULT NULL,
  `project` varchar(2047) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `image` longblob,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resume` mediumblob,
  `noc` mediumblob,
  `spriority1` int(11) DEFAULT '0',
  `spriority2` int(11) DEFAULT '0',
  `spriority3` int(11) DEFAULT '0',
  `fpriority1` int(11) DEFAULT '0',
  `fpriority2` int(11) DEFAULT '0',
  `fpriority3` int(11) DEFAULT '0',
  `fpriority4` int(11) DEFAULT '0',
  `fpriority5` int(11) DEFAULT '0',
  `degree` varchar(50) DEFAULT NULL,
  `recommendedFaculty` int(11) DEFAULT NULL,
  `fundingType` varchar(255) DEFAULT NULL,
  `recommendStatus` tinyint(1) DEFAULT '0',
  `spriority4` int(11) DEFAULT '0',
  `spriority5` int(11) DEFAULT '0',
  `adminRemark` varchar(1055) DEFAULT NULL,
  `complaints` varchar(2055) DEFAULT NULL,
  `sparkId` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

UNLOCK TABLES;

-- Dump completed on 2017-12-31 17:26:13
