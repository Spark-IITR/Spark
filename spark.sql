-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: spark
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.17.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(527) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(527) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `project` varchar(2047) DEFAULT NULL,
  `image` longblob,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fpriority1` int(11) DEFAULT '0',
  `fpriority2` int(11) DEFAULT '0',
  `fpriority3` int(11) DEFAULT '0',
  `fpriority4` int(11) DEFAULT '0',
  `fpriority5` int(11) DEFAULT '0',
  `adminRemark` varchar(1055) DEFAULT NULL,
  `complaints` varchar(2055) DEFAULT NULL,
  `sparkId` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
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
  `year` varchar(10) DEFAULT NULL,
  `image` longblob,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resume` mediumblob,
  `noc` mediumblob,
  `spriority1` int(11) DEFAULT '0',
  `spriority2` int(11) DEFAULT '0',
  `spriority3` int(11) DEFAULT '0',
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
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

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
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-04  2:38:18
