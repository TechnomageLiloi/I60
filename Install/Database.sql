-- MySQL dump 10.13  Distrib 8.0.43, for Linux (x86_64)
--
-- Host: mysql324.1gb.ua    Database: gbua_tm_liloi
-- ------------------------------------------------------
-- Server version	8.4.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `i60_config`
--

DROP TABLE IF EXISTS `i60_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i60_config` (
  `key_config` varchar(100) NOT NULL,
  `data` json NOT NULL,
  PRIMARY KEY (`key_config`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `i60_logs`
--

DROP TABLE IF EXISTS `i60_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i60_logs` (
  `key_log` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ts` timestamp NOT NULL,
  `tags` varchar(1000) NOT NULL,
  `data` json NOT NULL,
  PRIMARY KEY (`key_log`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `i60_epochs`
--

DROP TABLE IF EXISTS `i60_epochs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i60_epochs` (
  `key_epoch` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `status` tinyint unsigned NOT NULL DEFAULT '1',
  `summary` text NOT NULL,
  `start` date NOT NULL,
  `finish` date NOT NULL,
  PRIMARY KEY (`key_epoch`)
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `i60_milestones`
--

DROP TABLE IF EXISTS `i60_milestones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `i60_milestones` (
  `key_milestone` tinyint unsigned NOT NULL,
  `key_epoch` tinyint unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` tinyint unsigned NOT NULL DEFAULT '1',
  `summary` text NOT NULL,
  `start` date NOT NULL,
  `finish` date NOT NULL,
  PRIMARY KEY (`key_milestone`, `key_epoch`),
  FOREIGN KEY (`key_epoch`) REFERENCES `i60_epochs` (`key_epoch`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `i60_quests`
--

CREATE TABLE `i60_quests` (
  `key_quest` tinyint unsigned NOT NULL,
  `key_milestone` tinyint unsigned NOT NULL,
  `key_epoch` tinyint unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` tinyint unsigned NOT NULL DEFAULT '1',
  `type` tinyint unsigned NOT NULL DEFAULT '1',
  `summary` text NOT NULL,
  `data` json NOT NULL,
  PRIMARY KEY (`key_quest`, `key_milestone`, `key_epoch`),
  FOREIGN KEY (`key_milestone`, `key_epoch`) REFERENCES `i60_milestones` (`key_milestone`, `key_epoch`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-10-29  8:59:06
