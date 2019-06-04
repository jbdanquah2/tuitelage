CREATE DATABASE  IF NOT EXISTS `tuitlage` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tuitlage`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tuitlage
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.31-MariaDB

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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `addressId` int(10) NOT NULL AUTO_INCREMENT,
  `line_1` varchar(255) NOT NULL,
  `line_2` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `updatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`addressId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `answerId` int(8) NOT NULL AUTO_INCREMENT,
  `answerValue` varchar(255) NOT NULL,
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `updatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`answerId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (1,'Yes it is!','jon','2019-04-06 22:57:26','jon','2019-04-06 22:57:26'),(2,'I will like to see my Wife and kids','jon','2019-04-06 23:05:37','jon','2019-04-06 23:05:37'),(3,'I will like to see my Wife and kids','jon','2019-04-06 23:40:21','jon','2019-04-06 23:40:21'),(4,'Soprano, Alto, Tenor, Bass','jon','2019-04-06 23:59:28','jon','2019-04-06 23:59:28'),(5,'haha','jon','2019-04-07 00:17:00','jon','2019-04-07 00:17:00'),(6,'haha','jon','2019-04-07 00:18:06','jon','2019-04-07 00:18:06'),(7,'Yes','jon','2019-04-07 00:19:54','jon','2019-04-07 00:19:54'),(8,'Yes','jon','2019-04-07 00:20:14','jon','2019-04-07 00:20:14'),(9,'Nope','jon','2019-04-07 00:21:02','jon','2019-04-07 00:21:02'),(10,'True','jon','2019-04-25 00:40:10','jon','2019-04-25 00:40:10'),(11,'Yes','jon','2019-04-25 00:41:13','jon','2019-04-25 00:41:13'),(12,'True','jon','2019-04-25 00:42:09','jon','2019-04-25 00:42:09'),(13,'Suredly','jon','2019-04-25 00:43:16','jon','2019-04-25 00:43:16'),(14,'True','aziah','2019-04-25 23:00:58','aziah','2019-04-25 23:00:58'),(15,'Yes','aziah','2019-04-25 23:02:15','aziah','2019-04-25 23:02:15'),(16,'Saa','aziah','2019-04-25 23:03:26','aziah','2019-04-25 23:03:26'),(17,'True','ideas','2019-05-03 12:52:08','ideas','2019-05-03 12:52:08'),(18,'true','pp','2019-05-03 13:41:17','pp','2019-05-03 13:41:17'),(19,'true','fx','2019-05-03 13:54:53','fx','2019-05-03 13:54:53');
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_user`
--

DROP TABLE IF EXISTS `app_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_user` (
  `appUserId` int(11) NOT NULL AUTO_INCREMENT,
  `personId` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `pssword` varchar(100) NOT NULL,
  `userType` char(9) NOT NULL DEFAULT 'admin',
  `userStatus` varchar(8) NOT NULL DEFAULT 'Active',
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `updatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`appUserId`),
  UNIQUE KEY `personId_foreign` (`personId`),
  UNIQUE KEY `unique_username` (`userName`),
  CONSTRAINT `personId` FOREIGN KEY (`personId`) REFERENCES `person` (`personId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_user`
--

LOCK TABLES `app_user` WRITE;
/*!40000 ALTER TABLE `app_user` DISABLE KEYS */;
INSERT INTO `app_user` VALUES (6,10,'jon@gmail.com','123','admin','Active','system','2019-04-26 07:33:06','system','2018-12-27 10:52:53'),(7,11,'alfred@gmail.com','alfred','admin','Active','system','2018-12-28 16:44:29','system','2018-12-27 12:01:59'),(8,12,'jbamba@idscorpgh.com','jeff','admin','Active','system','2018-12-28 16:44:29','system','2018-12-27 12:06:59'),(10,14,'yaw@gmail.com','yaw','admin','Active','system','2018-12-28 16:44:29','system','2018-12-28 11:57:32'),(11,15,'ansong@gmail.com','ansong','admin','Active','system','2018-12-30 22:11:18','system','2018-12-30 22:11:18'),(12,16,'voda@gmail.com','voda','admin','Inactive','system','2019-01-02 22:46:03','system','2019-01-01 11:18:11'),(13,17,'nana@gmail.com','nana','admin','Active','system','2019-01-01 11:52:32','system','2019-01-01 11:52:32'),(14,18,'kojo@gmail.com','kojo','admin','Active','system','2019-01-01 12:11:19','system','2019-01-01 12:11:19'),(15,19,'kansas@gmail.com','kansas','admin','Active','system','2019-01-01 12:13:53','system','2019-01-01 12:13:53'),(16,20,'connie@gmail.com','connie','admin','Active','system','2019-01-01 12:16:07','system','2019-01-01 12:16:07'),(17,21,'pricy@gmail.com','pricy','admin','Active','system','2019-01-10 12:10:53','system','2019-01-10 12:10:53'),(18,22,'kjkkl@gmail.com','123','admin','Active','system','2019-01-10 12:26:02','system','2019-01-10 12:26:02'),(19,23,'yeboah@gmail.com','yeboah','admin','Active','system','2019-01-11 15:56:40','system','2019-01-11 15:56:40'),(26,30,'timmy@gmail.com','timmy','admin','Active','system','2019-01-12 22:56:44','system','2019-01-12 22:56:44'),(27,31,'kk@gmail.com','kk','admin','Active','system','2019-01-29 23:01:14','system','2019-01-29 23:01:14'),(28,32,'grace@gmail.com','123','guest','Active','system','2019-04-05 15:10:55','system','2019-02-14 09:55:03'),(29,33,'pipi@gmail.com','123','guest','Active','system','2019-02-14 22:51:34','system','2019-02-14 22:51:34'),(30,34,'aug@gmail.com','123','guest','Active','system','2019-02-17 21:51:04','system','2019-02-17 21:51:04'),(31,35,'sefa@gmail.com','123','guest','Active','system','2019-02-19 11:09:59','system','2019-02-19 11:09:59'),(32,36,'boat@gmail.com','123','admin','Active','system','2019-02-19 11:12:24','system','2019-02-19 11:12:24'),(33,37,'samuel@gmail.com','123','guest','Active','system','2019-02-21 15:28:18','system','2019-02-21 15:28:18'),(34,38,'sammy@gmail.com','123','admin','Active','system','2019-02-21 15:35:54','system','2019-02-21 15:35:54'),(35,39,'law@gmail.com','123','guest','Active','system','2019-04-05 14:13:45','system','2019-04-05 14:13:45'),(36,40,'andymics@gmail.com','123','employee','Active','law','2019-04-05 14:28:45','law','2019-04-05 14:26:26'),(37,41,'ali@gmail.com','123','employee','Active','jon','2019-04-05 14:49:02','jon','2019-04-05 14:49:02'),(38,42,'mama@gmail.com','123','employee','Active','jon','2019-04-06 20:33:32','jon','2019-04-06 20:33:32'),(39,43,'estee@gmail.com','123','employee','Inactive','jon','2019-05-02 21:56:27','jon','2019-04-06 20:39:56'),(40,44,'estees@gmail.com','123','employee','Active','jon','2019-04-06 20:41:37','jon','2019-04-06 20:41:37'),(41,45,'esteess@gmail.com','123','employee','Active','jon','2019-04-06 20:44:58','jon','2019-04-06 20:44:58'),(42,46,'john@gmail.com','123','admin','Active','system','2019-04-06 21:15:45','system','2019-04-06 21:15:45'),(43,47,'jesse@gmail.com','123','employee','Active','jon','2019-04-08 04:09:24','jon','2019-04-08 04:09:24'),(44,48,'tony@gmail.com','123','employee','Active','jon','2019-04-08 05:03:44','jon','2019-04-08 05:03:44'),(45,54,'akua@gmail.com','123','admin','Active','jon','2019-04-15 23:20:52','jon','2019-04-15 23:17:53'),(46,55,'nhyira@gmail.com','123','employee','Active','jon','2019-04-15 23:20:52','jon','2019-04-15 23:19:17'),(47,56,'duah@gmail.com','123','admin','Active','akua','2019-04-15 23:22:44','akua','2019-04-15 23:22:44'),(48,57,'hust@gmail.com','123','employee','Active','jon','2019-05-02 21:49:29','jon','2019-04-25 01:23:11'),(49,58,'tims@gmail.com','123','employee','Active','jon','2019-04-25 01:24:03','jon','2019-04-25 01:24:03'),(50,59,'jess@gmail.com','123','admin','Active','jon','2019-04-25 01:24:43','jon','2019-04-25 01:24:43'),(51,60,'dans@gmail.com','123','employee','Inactive','jon','2019-05-02 21:44:43','jon','2019-04-25 01:25:18'),(52,61,'si@gmail.com','123','employee','Active','jon','2019-04-25 01:25:53','jon','2019-04-25 01:25:53'),(53,62,'vir@gmail.com','123','employee','Active','jon','2019-04-25 01:27:19','jon','2019-04-25 01:27:19'),(54,63,'simple@gmail.com','123','admin','Active','alfred','2019-04-25 14:33:14','alfred','2019-04-25 14:33:14'),(55,64,'valva@gmail.com','123','employee','Active','alfred','2019-04-25 14:33:54','alfred','2019-04-25 14:33:54'),(56,65,'saps@gmail.com','123','employee','Active','alfred','2019-04-25 14:34:42','alfred','2019-04-25 14:34:42'),(57,66,'tit@gmail.com','123','admin','Active','alfred','2019-04-25 14:35:34','alfred','2019-04-25 14:35:34'),(58,67,'nelson@gmail.com','123','employee','Active','sammy','2019-04-25 14:51:26','sammy','2019-04-25 14:51:26'),(59,68,'koj@gmail.com','123','employee','Active','sammy','2019-04-25 14:51:53','sammy','2019-04-25 14:51:53'),(60,69,'tito@gmail.com','123','employee','Active','sammy','2019-04-25 14:52:23','sammy','2019-04-25 14:52:23'),(61,70,'quam@gmail.com','123','employee','Active','sammy','2019-04-25 14:53:03','sammy','2019-04-25 14:53:03'),(62,71,'aziah@gmail.com','123','admin','Active','system','2019-04-25 15:02:33','system','2019-04-25 15:02:33'),(63,72,'maziah@gmail.com','123','employee','Active','aziah','2019-04-25 22:45:05','aziah','2019-04-25 22:45:05'),(64,73,'eaziah@gmail.com','123','employee','Active','aziah','2019-04-25 22:49:46','aziah','2019-04-25 22:49:46'),(65,74,'taziah@gmail.com','123','employee','Active','aziah','2019-04-25 22:50:25','aziah','2019-04-25 22:50:25'),(66,75,'gaziah@gmail.com','123','employee','Active','aziah','2019-04-25 22:51:51','aziah','2019-04-25 22:51:51'),(67,76,'db@gmail.com','123','admin','Active','system','2019-04-26 14:46:28','system','2019-04-26 14:46:28'),(68,77,'mjordan@gmail.com','123','employee','Active','alfred','2019-05-01 23:13:22','alfred','2019-05-01 23:13:22'),(69,78,'tmensah@gmail.com','123','employee','Active','alfred','2019-05-02 15:35:46','alfred','2019-05-02 15:35:46'),(70,79,'fx@gmail.com','123','admin','Active','system','2019-05-03 12:41:37','system','2019-05-03 12:41:37'),(71,80,'ideas@gmail.com','123','admin','Inactive','system','2019-05-03 13:05:26','system','2019-05-03 12:43:39'),(72,81,'jake@gmail.com','123','admin','Active','system','2019-05-03 13:33:45','system','2019-05-03 13:33:45'),(73,82,'pp@gmail.com','123','admin','Active','system','2019-05-03 13:37:56','system','2019-05-03 13:37:56'),(74,83,'kophi@gmail.com','123','employee','Active','fx','2019-05-03 13:58:14','fx','2019-05-03 13:58:14');
/*!40000 ALTER TABLE `app_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `companyId` int(10) NOT NULL AUTO_INCREMENT,
  `companyName` varchar(255) NOT NULL,
  `companyShortName` varchar(50) DEFAULT NULL,
  `companyEmail` varchar(255) NOT NULL,
  `companyPhone` varchar(20) NOT NULL,
  `companyWebsite` varchar(255) DEFAULT NULL,
  `companyLogo` varchar(255) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'Active',
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `updatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`companyId`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (4,'Moneda Social','Moneda','monedasocial@gmail.com','0245826565','www.monedasocial.com','LOGO_MONEDA-SOCIAL.jpg','Active','system','2018-12-27 10:52:53','system','2019-01-12 09:11:47'),(5,'Dell Technology','T-Dell','tdell@gmail.com','0245014257','www.t-dell.com','canva.webp','Active','system','2018-12-27 12:01:59','system','2019-01-03 13:01:51'),(6,'InfoView Data Solutions','InfoView','info@idscorpgh.com','0213564889','www.idscorpgh.com','','Active','system','2018-12-27 12:06:59','system','2018-12-27 12:06:59'),(7,'jkjkjkj','sdw','kklklk','86787','wewe','','Active','system','2018-12-28 00:16:10','system','2018-12-28 00:16:10'),(8,'JBLOG GROUP OF COMPANIES','JBLOG','jbog@gmail.com','0501546789','www.jblog.com','zentyal.png','Active','system','2018-12-28 11:57:32','system','2019-01-03 10:12:57'),(9,'University of Education, Winneba','UEW-K','uew@gmail.com','0245698963','www.uewk.com','','Active','system','2018-12-30 22:11:18','system','2018-12-30 22:11:18'),(10,'Vodafone Ghana','Vodafone','vodafone@gmail.com','65656556','www.vodafone.com','','Active','system','2019-01-01 11:18:11','system','2019-01-01 11:18:11'),(11,'People\'s Party Corp','PPC','ppc@gmail.com','5656565','www.ppc.com','','Active','system','2019-01-01 11:52:32','system','2019-01-01 11:52:32'),(12,'Chrismas Trees Corp','CTC','ctc@gmail.com','546556','www.ctc.com','','Active','system','2019-01-01 12:11:19','system','2019-01-01 12:11:19'),(13,'Mainland Tech','MT','mt@gmail.com','45656','www.mt.com','','Active','system','2019-01-01 12:13:53','system','2019-01-01 12:13:53'),(14,'Beautiful Tree Temple','BTT','btt@gmail.com','84545454','www.btt.com','','Active','system','2019-01-01 12:16:07','system','2019-01-01 12:16:07'),(15,'KiddyLand Mall','KiddyLand','kiddyland@gmail.com','5548545565','www.kiddyland.com','','Active','system','2019-01-10 12:10:53','system','2019-01-10 12:10:53'),(16,'kjjkjk','kjkj','kklk@gmail.com','44545','lklkl','','Active','system','2019-01-10 12:26:02','system','2019-01-10 12:26:02'),(17,'Frank J Cafe','Gateway ','gateway@gmail.com','6565845','www.gateway.com','','Active','system','2019-01-11 15:56:40','system','2019-01-11 15:56:40'),(23,'MTN Ghana ','MTN','info@mtn.com','0245626568','www.mtn.com','MTN-logo-459AAF9482-seeklogo.com.png','Active','system','2019-01-12 22:56:44','system','2019-01-12 22:56:44'),(24,'Mejkjk','meme','322@gmail.com','23565656','www.mmee.com','googleafricacert.jpg','Active','system','2019-01-29 23:01:14','system','2019-01-29 23:01:14'),(25,'Advent Technology Ltd','Advent','advent@gmail.com','0245052539','www.advent.com','googleafricacert.jpg','Active','system','2019-02-08 13:26:42','system','2019-02-08 13:26:42'),(26,'Tuitelage Ltd','Tuitelage','info@tuitelage.com','0245052539','www.tuitelage.com','logo-tuitelage.jpg','Active','system','2019-02-10 22:38:29','system','2019-02-10 22:38:29'),(27,'S.K COMPANY','S.K','sk@gmail.com','0244846950','www.sk,com','Sales.jpg','Active','system','2019-02-11 17:25:10','system','2019-02-11 17:25:10'),(28,'Albrosoft','ALB','akosaemmanuel45@gmail.com','+233555915911','www.albrosoft.com','googleafricacert.jpg','Active','system','2019-02-11 17:47:57','system','2019-02-11 17:47:57'),(29,'Sefa Company Ltd','SefaCo','sefaco@gmail.com','0245356565','www.sefaco.com','20190214_120137.jpg','Active','system','2019-02-19 11:12:24','system','2019-02-19 11:12:24'),(30,'Sammy & Co Ltd','Sammy & Co Ltd','sammy@gmail.com','02454545','www.smamy.com','Twitter.png','Active','system','2019-02-21 15:35:54','system','2019-02-21 15:35:54'),(31,'LetsLearn.com','LLc','llc@gmail.com','+23665656565','www.letslearn.com','Whatsapp.png','Active','system','2019-04-06 21:15:45','system','2019-04-06 21:15:45'),(32,'SmartKids Foundation','SmartKids','smartkids@gmail.com','23232','www','Twitter.png','Active','system','2019-04-25 15:02:33','system','2019-04-25 15:02:33'),(33,'Tina Pharmacy','Tina','tina@gmail.com','65265656','www.tina.com','IMG-20190225-WA0001.jpg','Active','system','2019-04-26 14:46:28','system','2019-04-26 14:46:28'),(34,'FiberX Solutions Ltd','FX','fiberx@gmail.com','0245052539','www.fiberx.com','Twitter.png','Active','system','2019-05-03 12:41:37','system','2019-05-03 12:41:37'),(35,'Ideas Technology Ltd','Ideas','ideas@gmail.com','0213','www.ideas.com','support3.png','Active','system','2019-05-03 12:43:39','system','2019-05-03 12:43:39'),(36,'Ikoms tEch','Ikoms','ikoms@gmail.com','','www.ikoms.com','googleafricacert.jpg','Active','system','2019-05-03 13:33:45','system','2019-05-03 13:33:45'),(37,'PickPoints ','PickPoints ','pp@gmail.com','1325656','www.pp.com','Sales.jpg','Active','system','2019-05-03 13:37:56','system','2019-05-03 13:37:56');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_address`
--

DROP TABLE IF EXISTS `company_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_address` (
  `companyAddressId` int(10) NOT NULL AUTO_INCREMENT,
  `companyId` int(10) NOT NULL,
  `addressId` int(10) NOT NULL,
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `updatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`companyAddressId`),
  KEY `company_address_fk_idx` (`companyId`),
  KEY `company_address_fk_idx1` (`addressId`),
  CONSTRAINT `address_company_fk` FOREIGN KEY (`addressId`) REFERENCES `address` (`addressId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `company_address_fk` FOREIGN KEY (`companyId`) REFERENCES `company` (`companyId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_address`
--

LOCK TABLES `company_address` WRITE;
/*!40000 ALTER TABLE `company_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_lesson`
--

DROP TABLE IF EXISTS `company_lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_lesson` (
  `companyLessonId` int(10) NOT NULL AUTO_INCREMENT,
  `companyId` int(10) NOT NULL,
  `lessonId` int(10) NOT NULL,
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `updatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`companyLessonId`),
  KEY `company_id_fk_idx` (`companyId`),
  KEY `lesson_company_fk_idx` (`lessonId`),
  CONSTRAINT `company_lesson_fk` FOREIGN KEY (`companyId`) REFERENCES `company` (`companyId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `lesson_company_fk` FOREIGN KEY (`lessonId`) REFERENCES `lesson` (`lessonId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_lesson`
--

LOCK TABLES `company_lesson` WRITE;
/*!40000 ALTER TABLE `company_lesson` DISABLE KEYS */;
INSERT INTO `company_lesson` VALUES (1,5,1,'system','2019-01-01 15:03:16','system','2019-01-01 15:48:07'),(3,8,3,'system','2019-01-01 15:03:16','system','2019-01-01 15:48:07'),(4,8,4,'system','2019-01-01 15:03:16','system','2019-01-01 15:48:07'),(5,26,1,'system','2019-01-02 22:44:52','system','2019-02-19 12:12:41'),(6,26,2,'system','2019-01-02 22:44:52','system','2019-02-19 12:12:41'),(7,26,3,'system','2019-01-02 22:44:52','system','2019-02-19 12:12:41'),(8,26,4,'system','2019-01-02 22:44:52','system','2019-02-19 12:12:41'),(9,26,5,'system','2019-01-02 22:44:52','system','2019-02-19 12:12:41'),(10,26,6,'system','2019-01-02 22:44:52','system','2019-02-19 12:12:41'),(11,4,7,'jon','2019-02-20 15:02:27','jon','2019-02-20 15:02:27'),(12,4,8,'jon','2019-02-20 15:07:54','jon','2019-02-20 15:07:54'),(13,4,9,'jon','2019-04-03 22:20:15','jon','2019-04-03 22:20:15'),(14,4,10,'jon','2019-04-04 05:44:34','jon','2019-04-04 05:44:34'),(15,4,11,'jon','2019-04-05 13:48:01','jon','2019-04-05 13:48:01'),(16,4,12,'jon','2019-04-25 00:37:23','jon','2019-04-25 00:37:23'),(17,32,13,'aziah','2019-04-25 22:56:54','aziah','2019-04-25 22:56:54'),(18,35,14,'ideas','2019-05-03 12:46:18','ideas','2019-05-03 12:46:18'),(19,35,15,'ideas','2019-05-03 12:48:49','ideas','2019-05-03 12:48:49'),(20,37,16,'pp','2019-05-03 13:40:27','pp','2019-05-03 13:40:27'),(21,34,17,'fx','2019-05-03 13:52:48','fx','2019-05-03 13:52:48');
/*!40000 ALTER TABLE `company_lesson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_person`
--

DROP TABLE IF EXISTS `company_person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_person` (
  `companyPersonId` int(10) NOT NULL AUTO_INCREMENT,
  `companyId` int(10) NOT NULL,
  `personId` int(10) NOT NULL,
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `updatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`companyPersonId`),
  KEY `company_person_fk_idx` (`companyId`),
  KEY `person_company_fk_idx` (`personId`),
  CONSTRAINT `company_person_fk` FOREIGN KEY (`companyId`) REFERENCES `company` (`companyId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `person_company_fk` FOREIGN KEY (`personId`) REFERENCES `person` (`personId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_person`
--

LOCK TABLES `company_person` WRITE;
/*!40000 ALTER TABLE `company_person` DISABLE KEYS */;
INSERT INTO `company_person` VALUES (1,4,10,'','2018-12-27 10:52:53','','2018-12-27 10:52:53'),(2,5,11,'','2018-12-27 12:01:59','','2018-12-27 12:01:59'),(3,6,12,'','2018-12-27 12:06:59','','2018-12-27 12:06:59'),(5,26,14,'','2018-12-28 11:57:32','','2019-02-13 09:15:51'),(6,9,15,'','2018-12-30 22:11:18','','2018-12-30 22:11:18'),(7,10,16,'','2019-01-01 11:18:11','','2019-01-01 11:18:11'),(8,11,17,'','2019-01-01 11:52:32','','2019-01-01 11:52:32'),(9,12,18,'','2019-01-01 12:11:19','','2019-01-01 12:11:19'),(10,13,19,'','2019-01-01 12:13:53','','2019-01-01 12:13:53'),(11,14,20,'','2019-01-01 12:16:07','','2019-01-01 12:16:07'),(12,15,21,'system','2019-01-10 12:10:53','system','2019-01-10 12:10:53'),(13,16,22,'system','2019-01-10 12:26:02','system','2019-01-10 12:26:02'),(14,17,23,'system','2019-01-11 15:56:40','system','2019-01-11 15:56:40'),(20,23,30,'system','2019-01-12 22:56:44','system','2019-01-12 22:56:44'),(21,24,31,'system','2019-01-29 23:01:14','system','2019-01-29 23:01:14'),(22,26,32,'system','2019-02-14 09:55:03','system','2019-02-14 09:55:03'),(23,26,33,'system','2019-02-14 22:51:34','system','2019-02-14 22:51:34'),(24,26,34,'system','2019-02-17 21:51:04','system','2019-02-17 21:51:04'),(25,26,35,'system','2019-02-19 11:09:59','system','2019-02-19 11:09:59'),(26,29,36,'system','2019-02-19 11:12:24','system','2019-02-19 11:12:24'),(27,26,37,'system','2019-02-21 15:28:18','system','2019-02-21 15:28:18'),(28,30,38,'system','2019-02-21 15:35:54','system','2019-02-21 15:35:54'),(29,26,39,'system','2019-04-05 14:13:45','system','2019-04-05 14:13:45'),(30,26,40,'system','2019-04-05 14:26:26','system','2019-04-05 14:26:26'),(31,4,41,'system','2019-04-05 14:49:02','system','2019-04-05 14:49:02'),(32,4,42,'system','2019-04-06 20:33:32','system','2019-04-06 20:33:32'),(33,4,43,'system','2019-04-06 20:39:56','system','2019-04-06 20:39:56'),(34,4,44,'system','2019-04-06 20:41:37','system','2019-04-06 20:41:37'),(35,4,45,'system','2019-04-06 20:44:58','system','2019-04-06 20:44:58'),(36,31,46,'system','2019-04-06 21:15:45','system','2019-04-06 21:15:45'),(37,4,47,'system','2019-04-08 04:09:24','system','2019-04-08 04:09:24'),(38,4,48,'system','2019-04-08 05:03:44','system','2019-04-08 05:03:44'),(39,4,54,'system','2019-04-15 23:17:53','system','2019-04-15 23:17:53'),(40,4,55,'system','2019-04-15 23:19:17','system','2019-04-15 23:19:17'),(41,4,56,'system','2019-04-15 23:22:45','system','2019-04-15 23:22:45'),(42,4,57,'system','2019-04-25 01:23:11','system','2019-04-25 01:23:11'),(43,4,58,'system','2019-04-25 01:24:03','system','2019-04-25 01:24:03'),(44,4,59,'system','2019-04-25 01:24:43','system','2019-04-25 01:24:43'),(45,4,60,'system','2019-04-25 01:25:18','system','2019-04-25 01:25:18'),(46,4,61,'system','2019-04-25 01:25:53','system','2019-04-25 01:25:53'),(47,4,62,'system','2019-04-25 01:27:19','system','2019-04-25 01:27:19'),(48,5,63,'system','2019-04-25 14:33:14','system','2019-04-25 14:33:14'),(49,5,64,'system','2019-04-25 14:33:54','system','2019-04-25 14:33:54'),(50,5,65,'system','2019-04-25 14:34:42','system','2019-04-25 14:34:42'),(51,5,66,'system','2019-04-25 14:35:34','system','2019-04-25 14:35:34'),(52,30,67,'system','2019-04-25 14:51:26','system','2019-04-25 14:51:26'),(53,30,68,'system','2019-04-25 14:51:53','system','2019-04-25 14:51:53'),(54,30,69,'system','2019-04-25 14:52:23','system','2019-04-25 14:52:23'),(55,30,70,'system','2019-04-25 14:53:03','system','2019-04-25 14:53:03'),(56,32,71,'system','2019-04-25 15:02:33','system','2019-04-25 15:02:33'),(57,32,72,'system','2019-04-25 22:45:05','system','2019-04-25 22:45:05'),(58,32,73,'system','2019-04-25 22:49:46','system','2019-04-25 22:49:46'),(59,32,74,'system','2019-04-25 22:50:26','system','2019-04-25 22:50:26'),(60,32,75,'system','2019-04-25 22:51:51','system','2019-04-25 22:51:51'),(61,33,76,'system','2019-04-26 14:46:28','system','2019-04-26 14:46:28'),(62,5,77,'system','2019-05-01 23:13:22','system','2019-05-01 23:13:22'),(63,5,78,'system','2019-05-02 15:35:46','system','2019-05-02 15:35:46'),(64,34,79,'system','2019-05-03 12:41:37','system','2019-05-03 12:41:37'),(65,35,80,'system','2019-05-03 12:43:39','system','2019-05-03 12:43:39'),(66,36,81,'system','2019-05-03 13:33:45','system','2019-05-03 13:33:45'),(67,37,82,'system','2019-05-03 13:37:56','system','2019-05-03 13:37:56'),(68,34,83,'system','2019-05-03 13:58:14','system','2019-05-03 13:58:14');
/*!40000 ALTER TABLE `company_person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson` (
  `lessonId` int(10) NOT NULL AUTO_INCREMENT,
  `lessonName` varchar(100) NOT NULL,
  `lessonSummary` varchar(255) NOT NULL,
  `descriptiveImage` varchar(255) DEFAULT NULL,
  `videoOverview` varchar(200) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'Active',
  `createdBy` varchar(50) NOT NULL DEFAULT 'system',
  `createdDateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(50) NOT NULL,
  `UpdatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lessonId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson`
--

LOCK TABLES `lesson` WRITE;
/*!40000 ALTER TABLE `lesson` DISABLE KEYS */;
INSERT INTO `lesson` VALUES (1,'Customer Service Tips','Customer Service is the one department that deals directly with our prcious customers. Start with this free lesson and buld yourself or team for awesome service to your precious customers','support2.png','Two Little Secrets For Better Chord Voicings ( 480 X 854 )_001.mp4','Active','system','2018-11-25 00:35:37','','2019-02-16 20:52:05'),(2,'Sell Anything Anywhere','Sales is the one department that can not be overlooked by any organisation. Start with this free lesson and build yourself to sell out there. tips and tricks from this free lesson. Enjoy!','support3.png','VID-20190102-WA0002_001.mp4','Active','system','2018-11-25 00:36:05','','2019-02-06 23:07:37'),(3,'Agile Development - The Best Parts','Agile development is the most come name in today where Web Aps Development is everywhere and making it big. Get all the important tips and tricks from this free lesson. Enjoy!','tech1.jpg','Fur_Elise.mp4','Active','system','2018-11-25 00:36:45','','2019-02-06 23:07:37'),(4,'Leaders can be made','Leadership is an important skills to aquire. No organisation can thrive without it. Leaders of today affect change, make decisons, guide others, ensures the work is done etc.','Sales.jpg','233546130647_status_675f833f18bf4d5982df260166e2ca53_001.mp4','Active','system','2018-11-28 08:19:57','','2019-02-06 23:07:37'),(5,'Web Developement Tips','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum voluptas, alias, doloremque blanditiis architecto recusandae, ut labore nesciunt eligendi nemo dolorem ducimus enim fuga in. Error vel quod esse iure.','web.png','VID-20181230-WA0007_001.mp4','Active','system','2018-11-29 11:06:04','','2019-02-06 23:07:37'),(6,'Be the Best Employee','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum voluptas, alias, doloremque blanditiis architecto recusandae, ut labore nesciunt eligendi nemo dolorem ducimus enim fuga in. Error vel quod esse iure.','employ.jpg','Two Little Secrets For Better Chord Voicings ( 480 X 854 )_001.mp4','Active','system','2018-11-29 11:06:04','','2019-02-06 23:07:37'),(7,'Oil Harvesting','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, unde, autem. Facere, aliquid, amet. Nostrum animi earum quaerat voluptatibus eum ipsa incidunt sunt molestiae dolore, voluptas suscipit, modi deserunt iusto.\r\n                      ','baseline_devices_other_black_48dp.png','Don Moen - Thank You Lord _ Live Worship Sessions ( 360 X 640 ).mp4','Active','jon','2019-02-20 15:02:27','jon','2019-02-20 15:02:27'),(8,'Facing the Customer',' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, unde, autem. Facere, aliquid, amet. Nostrum animi earum quaerat voluptatibus eum ipsa incidunt sunt molestiae dolore, voluptas suscipit, modi deserunt iusto.\r\n      ','baseline_all_inclusive_black_48dp.png','The One Thing Only 1% of People Do _ TRY IT FOR 21 DAYS and Success Will Come! ( 360 X 640 ).mp4','Active','jon','2019-02-20 15:07:54','jon','2019-02-20 15:07:54'),(9,'Rigging Skills','orem ipsum dolor sit amet, consectetur adipisicing elit. Ab tempore laudantium atque debitis illum provident id, dolore, corporis, nam, nesciunt quis asperiores et! Iusto saepe labore rerum illo neque, cum!','IMG-20190222-WA0005.jpg','- 33_ How To Use Diminished Chords In Your Progression ( 240 X 426 ).mp4','Active','jon','2019-04-03 22:20:14','jon','2019-04-03 22:20:14'),(10,'Rigging Skills 101',' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum voluptates non temporibus odio, repellendus at veritatis soluta maiores! Qui illo deserunt aperiam libero culpa optio exercitationem velit molestias ad expedita.\r\n','googleafricacert.jpg','Don Moen - Thank You Lord _ Live Worship Sessions ( 360 X 640 ).mp4','Active','jon','2019-04-04 05:44:33','jon','2019-04-04 05:44:33'),(11,'Four Part Composition',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor','support2.png','Amazing Grace - piano hymn with lyrics ( 240 X 426 ).mp4','Active','jon','2019-04-05 13:48:01','jon','2019-04-05 13:48:01'),(12,'Mentoring',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor','tech1.jpg','How To Create a _False Ending_ To a Song ( 240 X 426 ).mp4','Active','jon','2019-04-25 00:37:23','jon','2019-04-25 00:37:23'),(13,'Management 101',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor','Sales.jpg','Rowan Atkinson - Interview with Elton John ( 240 X 316 ).mp4','Active','aziah','2019-04-25 22:56:54','aziah','2019-04-25 22:56:54'),(14,'Installation Of CCTV',' ','tech1.jpg','A Habit You Simply MUST Develop ( 360 X 640 ).mp4','Active','ideas','2019-05-03 12:46:17','ideas','2019-05-03 12:46:17'),(15,'Wired Network Installation','                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ','support2.png','Don Moen - Thank You Lord _ Live Worship Sessions ( 360 X 640 ).mp4','Active','ideas','2019-05-03 12:48:49','ideas','2019-05-03 12:48:49'),(16,'lkl','PickPoints  ','tech1.jpg','Rowan Atkinson - Interview with Elton John ( 240 X 316 ).mp4','Active','pp','2019-05-03 13:40:27','pp','2019-05-03 13:40:27'),(17,'Networking Tutorikals',' this is the basic','tech1.jpg','A Habit You Simply MUST Develop ( 360 X 640 ).mp4','Active','fx','2019-05-03 13:52:48','fx','2019-05-03 13:52:48');
/*!40000 ALTER TABLE `lesson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson_topic`
--

DROP TABLE IF EXISTS `lesson_topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson_topic` (
  `lessonTopicId` int(10) NOT NULL AUTO_INCREMENT,
  `lessonId` int(10) NOT NULL,
  `topicId` int(10) NOT NULL,
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `updatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lessonTopicId`),
  KEY `lessonId_idx` (`lessonId`),
  KEY `topic-lessFK_idx` (`topicId`),
  CONSTRAINT `lesson_topic_fk` FOREIGN KEY (`lessonId`) REFERENCES `lesson` (`lessonId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `topic-lessFK` FOREIGN KEY (`topicId`) REFERENCES `topic` (`topicId`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson_topic`
--

LOCK TABLES `lesson_topic` WRITE;
/*!40000 ALTER TABLE `lesson_topic` DISABLE KEYS */;
INSERT INTO `lesson_topic` VALUES (250,1,5,'system','2019-02-19 12:14:38','system','2019-02-19 12:14:38'),(251,1,49,'system','2019-02-19 12:14:38','system','2019-02-19 12:14:38'),(252,1,50,'system','2019-02-19 12:14:38','system','2019-02-19 12:14:38'),(253,1,51,'system','2019-02-19 12:14:38','system','2019-02-19 12:14:38'),(254,2,52,'system','2019-02-19 12:34:00','system','2019-02-19 12:34:00'),(255,2,53,'system','2019-02-19 12:34:00','system','2019-02-19 12:34:00'),(256,7,58,'jon','2019-02-20 15:03:57','jon','2019-02-20 15:03:57'),(257,7,59,'jon','2019-02-20 15:04:25','jon','2019-02-20 15:04:25'),(258,7,60,'jon','2019-02-20 15:04:58','jon','2019-02-20 15:04:58'),(259,7,61,'jon','2019-02-20 15:06:09','jon','2019-02-20 15:06:09'),(260,8,62,'jon','2019-02-20 15:08:52','jon','2019-02-20 15:08:52'),(261,8,63,'jon','2019-02-20 15:09:31','jon','2019-02-20 15:09:31'),(262,11,64,'jon','2019-04-05 13:48:47','jon','2019-04-05 13:48:47'),(263,12,65,'jon','2019-04-25 00:37:59','jon','2019-04-25 00:37:59'),(264,12,66,'jon','2019-04-25 00:38:27','jon','2019-04-25 00:38:27'),(265,13,67,'aziah','2019-04-25 22:58:03','aziah','2019-04-25 22:58:03'),(266,13,68,'aziah','2019-04-25 22:58:47','aziah','2019-04-25 22:58:47'),(267,15,69,'ideas','2019-05-03 12:50:18','ideas','2019-05-03 12:50:18'),(268,15,70,'ideas','2019-05-03 12:50:48','ideas','2019-05-03 12:50:48'),(269,17,71,'fx','2019-05-03 13:53:43','fx','2019-05-03 13:53:43');
/*!40000 ALTER TABLE `lesson_topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `personId` int(7) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `updateBy` varchar(50) NOT NULL DEFAULT 'system',
  `updatedDatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(50) NOT NULL DEFAULT 'system',
  `createdDatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`personId`),
  UNIQUE KEY `unique_email_address` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (10,'Jon',NULL,'Danquah',NULL,'jon@gmail.com',NULL,'system','2018-12-27 10:52:53','system','2018-12-27 10:52:53'),(11,'Aflred',NULL,'Dell',NULL,'alfred@gmail.com',NULL,'system','2018-12-27 12:01:59','system','2018-12-27 12:01:59'),(12,'Jeff',NULL,'Bamba',NULL,'jbamba@idscorpgh.com',NULL,'system','2018-12-27 12:06:59','system','2018-12-27 12:06:59'),(14,'Yaw',NULL,'Preko',NULL,'yaw@gmail.com','sweetheart.jpg','system','2019-02-14 15:40:16','system','2018-12-28 11:57:32'),(15,'Dr. Kofi',NULL,'Ansong',NULL,'ansong@gmail.com',NULL,'system','2018-12-30 22:11:18','system','2018-12-30 22:11:18'),(16,'Fred',NULL,'Voda',NULL,'voda@gmail.com',NULL,'system','2019-01-01 11:18:11','system','2019-01-01 11:18:11'),(17,'Nana',NULL,'Edoum',NULL,'nana@gmail.com',NULL,'system','2019-01-01 11:52:32','system','2019-01-01 11:52:32'),(18,'Kojo',NULL,'Amos',NULL,'kojo@gmail.com',NULL,'system','2019-01-01 12:11:19','system','2019-01-01 12:11:19'),(19,'Kansas',NULL,'Kanny',NULL,'kansas@gmail.com',NULL,'system','2019-01-01 12:13:53','system','2019-01-01 12:13:53'),(20,'Mansa',NULL,'Connie',NULL,'connie@gmail.com',NULL,'system','2019-01-01 12:16:07','system','2019-01-01 12:16:07'),(21,'Pricy',NULL,'Antwi',NULL,'pricy@gmail.com',NULL,'system','2019-01-10 12:10:53','system','2019-01-10 12:10:53'),(22,'klk',NULL,'nj',NULL,'kjkkl@gmail.com',NULL,'system','2019-01-10 12:26:02','system','2019-01-10 12:26:02'),(23,'Sammy',NULL,'Yeboah',NULL,'yeboah@gmail.com',NULL,'system','2019-01-11 15:56:40','system','2019-01-11 15:56:40'),(30,'Timmy ',NULL,'Philips',NULL,'timmy@gmail.com',NULL,'system','2019-01-12 22:56:44','system','2019-01-12 22:56:44'),(31,'KK',NULL,'DOE',NULL,'kk@gmail.com',NULL,'system','2019-01-29 23:01:14','system','2019-01-29 23:01:14'),(32,'Grace',NULL,'Adu',NULL,'grace@gmail.com','jbd.jpg','system','2019-02-14 16:20:52','system','2019-02-14 09:55:03'),(33,'King',NULL,'Pipi',NULL,'pipi@gmail.com','dbj.jpg','system','2019-02-14 22:51:33','system','2019-02-14 22:51:33'),(34,'Augustine',NULL,'Boateng',NULL,'aug@gmail.com','20190214_120137.jpg','system','2019-02-17 21:51:04','system','2019-02-17 21:51:04'),(35,'Sefa',NULL,'Boateng',NULL,'sefa@gmail.com','20190214_120137.jpg','system','2019-02-19 11:09:59','system','2019-02-19 11:09:59'),(36,'George',NULL,'Boat',NULL,'boat@gmail.com',NULL,'system','2019-02-19 11:12:24','system','2019-02-19 11:12:24'),(37,'Nana',NULL,'Samuel',NULL,'samuel@gmail.com','20190214_120137.jpg','system','2019-02-21 15:28:18','system','2019-02-21 15:28:18'),(38,'Sammy',NULL,'Kyenkyenhene',NULL,'sammy@gmail.com',NULL,'system','2019-02-21 15:35:54','system','2019-02-21 15:35:54'),(39,'Lawrence',NULL,'Adu Twum',NULL,'law@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-05 13:13:45','system','2019-04-05 13:13:45'),(40,'Andy',NULL,'Boat',NULL,'andymics@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-05 13:26:26','system','2019-04-05 13:26:26'),(41,'Ali',NULL,'Badiku',NULL,'ali@gmail.com','IMG-20190314-WA0000.jpg','system','2019-04-05 13:49:02','system','2019-04-05 13:49:02'),(42,'Mama',NULL,'Jane',NULL,'mama@gmail.com','dbj.jpg','system','2019-04-06 19:33:32','system','2019-04-06 19:33:32'),(43,'Estee',NULL,'Mama',NULL,'estee@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-06 19:39:56','system','2019-04-06 19:39:56'),(44,'Estees',NULL,'Mamam',NULL,'estees@gmail.com','IMG-20190314-WA0000.jpg','system','2019-04-06 19:41:37','system','2019-04-06 19:41:37'),(45,'Estees1',NULL,'Mamam1',NULL,'esteess@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-06 19:44:58','system','2019-04-06 19:44:58'),(46,'John',NULL,'Doe',NULL,'john@gmail.com',NULL,'system','2019-04-06 20:15:45','system','2019-04-06 20:15:45'),(47,'Jesse',NULL,'Duah',NULL,'jesse@gmail.com','IMG-20190314-WA0000.jpg','system','2019-04-08 04:09:23','system','2019-04-08 04:09:23'),(48,'Tony',NULL,'GGIS',NULL,'tony@gmail.com','IMG-20190314-WA0000.jpg','system','2019-04-08 05:03:44','system','2019-04-08 05:03:44'),(49,'Tina',NULL,'Akua',NULL,'tina@yahoo.com','dbj.jpg','system','2019-04-15 23:00:34','system','2019-04-15 23:00:34'),(54,'Akua',NULL,'Aho)f3',NULL,'akua@gmail.com','dbj.jpg','system','2019-04-15 23:17:53','system','2019-04-15 23:17:53'),(55,'Nhyira',NULL,'DANQUAH-BOATENG',NULL,'nhyira@gmail.com','IMG-20190314-WA0000.jpg','system','2019-04-15 23:19:17','system','2019-04-15 23:19:17'),(56,'Konadu',NULL,'Duah',NULL,'duah@gmail.com','IMG-20190225-WA0001.jpg','system','2019-04-15 23:22:44','system','2019-04-15 23:22:44'),(57,'Enoc',NULL,'Hust',NULL,'hust@gmail.com','dbj.jpg','system','2019-04-25 01:23:11','system','2019-04-25 01:23:11'),(58,'Timothy',NULL,'TIms',NULL,'tims@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 01:24:03','system','2019-04-25 01:24:03'),(59,'Jessica',NULL,'Jess',NULL,'jess@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 01:24:43','system','2019-04-25 01:24:43'),(60,'Frank',NULL,'Dan',NULL,'dans@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 01:25:18','system','2019-04-25 01:25:18'),(61,'Esther',NULL,'Si',NULL,'si@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 01:25:53','system','2019-04-25 01:25:53'),(62,'Virusss',NULL,'Vir',NULL,'vir@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 01:27:19','system','2019-04-25 01:27:19'),(63,'Simple',NULL,'Name',NULL,'simple@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 14:33:14','system','2019-04-25 14:33:14'),(64,'Valva',NULL,'Evans',NULL,'valva@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 14:33:54','system','2019-04-25 14:33:54'),(65,'Estee',NULL,'Saps',NULL,'saps@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 14:34:42','system','2019-04-25 14:34:42'),(66,'Tit',NULL,'tims',NULL,'tit@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 14:35:34','system','2019-04-25 14:35:34'),(67,'Nelson',NULL,'Dua',NULL,'nelson@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 14:51:26','system','2019-04-25 14:51:26'),(68,'Kojo',NULL,'kojo',NULL,'koj@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 14:51:53','system','2019-04-25 14:51:53'),(69,'Tito',NULL,'tito',NULL,'tito@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 14:52:23','system','2019-04-25 14:52:23'),(70,'Quam',NULL,'Quamy',NULL,'quam@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 14:53:03','system','2019-04-25 14:53:03'),(71,'Aziah',NULL,'Yakubu',NULL,'aziah@gmail.com',NULL,'system','2019-04-25 15:02:33','system','2019-04-25 15:02:33'),(72,'Mercy',NULL,'Aziah',NULL,'maziah@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 22:45:05','system','2019-04-25 22:45:05'),(73,'Enoch',NULL,'Aziah',NULL,'eaziah@gmail.com','IMG-20190314-WA0000.jpg','system','2019-04-25 22:49:46','system','2019-04-25 22:49:46'),(74,'Tanko',NULL,'Aziah',NULL,'taziah@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-04-25 22:50:25','system','2019-04-25 22:50:25'),(75,'Georg',NULL,'Aziah',NULL,'gaziah@gmail.com','dbj.jpg','system','2019-04-25 22:51:51','system','2019-04-25 22:51:51'),(76,'Tina',NULL,'DB',NULL,'db@gmail.com',NULL,'system','2019-04-26 14:46:28','system','2019-04-26 14:46:28'),(77,'Michael',NULL,'Jordan',NULL,'mjordan@gmail.com','IMG-20190222-WA0006.jpg','system','2019-05-01 23:13:22','system','2019-05-01 23:13:22'),(78,'Theophilus',NULL,'Mensah',NULL,'tmensah@gmail.com','IMG-20190225-WA0002.jpg','system','2019-05-02 15:35:46','system','2019-05-02 15:35:46'),(79,'Kofi',NULL,'Gyan',NULL,'fx@gmail.com',NULL,'system','2019-05-03 12:41:37','system','2019-05-03 12:41:37'),(80,'Kwaku',NULL,'Manu',NULL,'ideas@gmail.com',NULL,'system','2019-05-03 12:43:39','system','2019-05-03 12:43:39'),(81,'Jake',NULL,'kk',NULL,'jake@gmail.com',NULL,'system','2019-05-03 13:33:45','system','2019-05-03 13:33:45'),(82,'PickPoints ',NULL,'Duah',NULL,'pp@gmail.com',NULL,'system','2019-05-03 13:37:56','system','2019-05-03 13:37:56'),(83,'Kophi',NULL,'d',NULL,'kophi@gmail.com','â€ª+233 24 505 2539â€¬ 20190202_095938.jpg','system','2019-05-03 13:58:14','system','2019-05-03 13:58:14');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `quizId` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  `optionA` varchar(255) NOT NULL,
  `optionB` varchar(255) NOT NULL,
  `optionC` varchar(255) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'Active',
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `udpatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`quizId`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (1,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque aliquid doloremque dolorem laudantium, mollitia maxime nisi adipisci distinctio deleniti incidunt repudiandae eveniet quis voluptas modi vero, quod. Quam, sapiente, veritatis!','Pipes','Rig','Tools','Active','system','2019-02-15 10:05:31','system','2019-02-15 10:05:31'),(2,'Doloremque dolorem laudantium, mollitia maxime nisi adipisci distinctio deleniti incidunt repudiandae eveniet quis voluptas modi vero, quod. Quam, sapiente, veritatis!','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque aliquid doloremque dolorem laudantium, mollitia maxime!','Mangers','Workers','Active','system','2019-02-15 10:06:32','system','2019-02-28 10:46:56'),(3,'Who is a manager?','Able maintain results','Surbordinate','Your boss','Active','system','2019-02-15 10:07:29','system','2019-02-15 10:07:29'),(4,'What is the best programing language to use','Javascript','The one that does the job right','PHP','Active','system','2019-02-15 10:08:18','system','2019-02-15 10:08:18'),(5,'Why is Agile so common these days','Because its slow','Because programmers love it','Because it\'s effective','Active','system','2019-02-15 10:09:29','system','2019-02-15 10:09:29'),(6,'The purpose of RIG is to make oil flow','True','False','None of the above','Active','system','2019-03-28 20:47:42','system','2019-03-28 20:47:42'),(7,' Work ethics is important.','False','True','None of the above','Active','grace','2019-03-29 09:44:40','grace','2019-03-29 09:44:40'),(8,' Work ethics is important.','False','True','None of the above','Active','grace','2019-03-29 09:45:22','grace','2019-03-29 09:45:22'),(9,' Work ethics is important.','False','True','None of the above','Active','grace','2019-03-29 10:10:16','grace','2019-03-29 10:10:16'),(10,' Work ethics is important.','False','True','None of the above','Active','grace','2019-03-29 10:15:21','grace','2019-03-29 10:15:21'),(11,' Which of the following is an example of Agile Development.','XP','Water Fall','SDLC','Active','grace','2019-03-29 10:21:12','grace','2019-03-29 10:21:12'),(12,' You can sell anything if you care enough.','False','True','May Be','Active','grace','2019-03-29 11:26:07','grace','2019-03-29 11:26:07'),(13,' Where are rigs normally located','In the middle of the sea','Near town centers','At the sea shore','Active','jon','2019-04-04 05:46:30','jon','2019-04-04 05:46:30'),(14,' Hey do you like this lesson?','Yes','No','None','Active','jon','2019-04-04 07:47:55','jon','2019-04-04 07:47:55'),(15,' Is lesson is pretty awesome. Isn\'t it?','Yes it is!','No its not koraa!','Daabi da','Active','jon','2019-04-06 22:57:26','jon','2019-04-06 22:57:26'),(16,'Can live on the rig safely for two weeks?','Definitely YES!','Not really!','I will like to see my Wife and kids','Active','jon','2019-04-06 23:05:37','jon','2019-04-06 23:05:37'),(17,'Can live on the rig safely for two weeks?','Definitely YES!','Not really!','I will like to see my Wife and kids','Active','jon','2019-04-06 23:40:21','jon','2019-04-06 23:40:21'),(18,' What are the four main voice parts of harmony?','Alto, tenor, falsetto, Sing','Soprano, Alto, Tenor, Bass','None','Active','jon','2019-04-06 23:59:28','jon','2019-04-06 23:59:28'),(19,' Ok this is just a silly question?',' No','Yes','haha','Active','jon','2019-04-07 00:17:00','jon','2019-04-07 00:17:00'),(20,' Ok this is just a silly question?',' No','Yes','haha','Active','jon','2019-04-07 00:18:06','jon','2019-04-07 00:18:06'),(21,' Facing the customer should be fun. yea?','Yes','No','May be','Active','jon','2019-04-07 00:19:54','jon','2019-04-07 00:19:54'),(22,' Facing the customer should be fun. yea?','Yes','No','May be','Active','jon','2019-04-07 00:20:14','jon','2019-04-07 00:20:14'),(23,' Customers always know what they want.','Nope','hahaha','Yes','Active','jon','2019-04-07 00:21:02','jon','2019-04-07 00:21:02'),(24,' Mentorship should be a requirement in an institution.','True','False','May be','Active','jon','2019-04-25 00:40:10','jon','2019-04-25 00:40:10'),(25,'The mentee should be willing to do the work given by the mentor.','sometimes','Yes','No','Active','jon','2019-04-25 00:41:13','jon','2019-04-25 00:41:13'),(26,'To grow fast in your field, you do not need  a mentor.','False','True','Never','Active','jon','2019-04-25 00:42:09','jon','2019-04-25 00:42:09'),(27,' Meeting face to face with your mentor is advisabnle.','Not at all','Sometimes','Suredly','Active','jon','2019-04-25 00:43:16','jon','2019-04-25 00:43:16'),(28,' Micromanagement makes you a control freak?','False','True','Not really','Active','aziah','2019-04-25 23:00:58','aziah','2019-04-25 23:00:58'),(29,'Proper  Management skills for young managers is important.','Yes','Not really','May be','Active','aziah','2019-04-25 23:02:15','aziah','2019-04-25 23:02:15'),(30,' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n','Hahaha','hihihi','Saa','Active','aziah','2019-04-25 23:03:26','aziah','2019-04-25 23:03:26'),(31,' Internet is a network?','True','False','None','Active','ideas','2019-05-03 12:52:07','ideas','2019-05-03 12:52:07'),(32,'kjkjkjkjk','true','false','none','Active','pp','2019-05-03 13:41:17','pp','2019-05-03 13:41:17'),(33,' Internet is a network','true','false','none','Active','fx','2019-05-03 13:54:53','fx','2019-05-03 13:54:53');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_answer`
--

DROP TABLE IF EXISTS `quiz_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_answer` (
  `quiz_answerId` int(11) NOT NULL AUTO_INCREMENT,
  `quizId` int(8) NOT NULL,
  `answerId` int(8) NOT NULL,
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `updatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`quiz_answerId`),
  KEY `quiz-answerFK_idx` (`quizId`),
  KEY `quiz-answerFK_idx1` (`answerId`),
  CONSTRAINT `answer-quizFK` FOREIGN KEY (`answerId`) REFERENCES `answer` (`answerId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `quiz-answerFK` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`quizId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_answer`
--

LOCK TABLES `quiz_answer` WRITE;
/*!40000 ALTER TABLE `quiz_answer` DISABLE KEYS */;
INSERT INTO `quiz_answer` VALUES (1,15,1,'jon','2019-04-06 22:57:26','jon','2019-04-06 22:57:26'),(2,16,2,'jon','2019-04-06 23:05:37','jon','2019-04-06 23:05:37'),(3,17,3,'jon','2019-04-06 23:40:21','jon','2019-04-06 23:40:21'),(4,18,4,'jon','2019-04-06 23:59:28','jon','2019-04-06 23:59:28'),(5,19,5,'jon','2019-04-07 00:17:00','jon','2019-04-07 00:17:00'),(6,20,6,'jon','2019-04-07 00:18:06','jon','2019-04-07 00:18:06'),(7,21,7,'jon','2019-04-07 00:19:54','jon','2019-04-07 00:19:54'),(8,22,8,'jon','2019-04-07 00:20:14','jon','2019-04-07 00:20:14'),(9,23,9,'jon','2019-04-07 00:21:02','jon','2019-04-07 00:21:02'),(10,24,10,'jon','2019-04-25 00:40:10','jon','2019-04-25 00:40:10'),(11,25,11,'jon','2019-04-25 00:41:13','jon','2019-04-25 00:41:13'),(12,26,12,'jon','2019-04-25 00:42:09','jon','2019-04-25 00:42:09'),(13,27,13,'jon','2019-04-25 00:43:16','jon','2019-04-25 00:43:16'),(14,28,14,'aziah','2019-04-25 23:00:58','aziah','2019-04-25 23:00:58'),(15,29,15,'aziah','2019-04-25 23:02:15','aziah','2019-04-25 23:02:15'),(16,30,16,'aziah','2019-04-25 23:03:26','aziah','2019-04-25 23:03:26'),(17,31,17,'ideas','2019-05-03 12:52:08','ideas','2019-05-03 12:52:08'),(18,32,18,'pp','2019-05-03 13:41:17','pp','2019-05-03 13:41:17'),(19,33,19,'fx','2019-05-03 13:54:53','fx','2019-05-03 13:54:53');
/*!40000 ALTER TABLE `quiz_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_lesson`
--

DROP TABLE IF EXISTS `quiz_lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz_lesson` (
  `quiz_lessonId` int(11) NOT NULL AUTO_INCREMENT,
  `quizId` int(8) NOT NULL,
  `lessonId` int(8) NOT NULL,
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `updatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`quiz_lessonId`),
  KEY `quiz-lessonFK_idx` (`quizId`),
  KEY `quiz-lessonFK_idx1` (`lessonId`),
  CONSTRAINT `lesson-quizFK` FOREIGN KEY (`lessonId`) REFERENCES `lesson` (`lessonId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `quiz-lessonFK` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`quizId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_lesson`
--

LOCK TABLES `quiz_lesson` WRITE;
/*!40000 ALTER TABLE `quiz_lesson` DISABLE KEYS */;
INSERT INTO `quiz_lesson` VALUES (1,1,1,'system','2019-02-15 10:16:11','system','2019-02-15 10:16:11'),(2,1,2,'system','2019-02-15 10:16:11','system','2019-02-15 10:16:11'),(3,1,3,'system','2019-02-15 10:16:11','system','2019-02-15 10:16:11'),(4,1,4,'system','2019-02-15 10:16:11','system','2019-02-15 10:16:11'),(5,1,5,'system','2019-02-15 10:16:11','system','2019-02-15 10:16:11'),(6,1,6,'system','2019-02-15 10:16:11','system','2019-02-15 10:16:11'),(16,2,1,'system','2019-02-15 10:16:13','system','2019-02-15 10:16:13'),(17,2,2,'system','2019-02-15 10:16:13','system','2019-02-15 10:16:13'),(18,2,3,'system','2019-02-15 10:16:13','system','2019-02-15 10:16:13'),(19,2,4,'system','2019-02-15 10:16:13','system','2019-02-15 10:16:13'),(20,2,5,'system','2019-02-15 10:16:13','system','2019-02-15 10:16:13'),(21,2,6,'system','2019-02-15 10:16:13','system','2019-02-15 10:16:13'),(31,3,1,'system','2019-02-15 10:16:16','system','2019-02-15 10:16:16'),(32,3,2,'system','2019-02-15 10:16:16','system','2019-02-15 10:16:16'),(33,3,3,'system','2019-02-15 10:16:16','system','2019-02-15 10:16:16'),(34,3,4,'system','2019-02-15 10:16:16','system','2019-02-15 10:16:16'),(35,3,5,'system','2019-02-15 10:16:16','system','2019-02-15 10:16:16'),(36,3,6,'system','2019-02-15 10:16:16','system','2019-02-15 10:16:16'),(46,4,1,'system','2019-02-15 10:16:20','system','2019-02-15 10:16:20'),(47,4,2,'system','2019-02-15 10:16:20','system','2019-02-15 10:16:20'),(48,4,3,'system','2019-02-15 10:16:20','system','2019-02-15 10:16:20'),(49,4,4,'system','2019-02-15 10:16:20','system','2019-02-15 10:16:20'),(50,4,5,'system','2019-02-15 10:16:20','system','2019-02-15 10:16:20'),(51,4,6,'system','2019-02-15 10:16:20','system','2019-02-15 10:16:20'),(61,5,1,'system','2019-02-15 10:16:23','system','2019-02-15 10:16:23'),(62,5,2,'system','2019-02-15 10:16:23','system','2019-02-15 10:16:23'),(63,5,3,'system','2019-02-15 10:16:23','system','2019-02-15 10:16:23'),(64,5,4,'system','2019-02-15 10:16:23','system','2019-02-15 10:16:23'),(65,5,5,'system','2019-02-15 10:16:23','system','2019-02-15 10:16:23'),(66,5,6,'system','2019-02-15 10:16:23','system','2019-02-15 10:16:23'),(67,6,7,'system','2019-03-28 20:47:42','system','2019-03-28 20:47:42'),(68,10,6,'grace','2019-03-29 10:15:21','grace','2019-03-29 10:15:21'),(69,11,3,'grace','2019-03-29 10:21:12','grace','2019-03-29 10:21:12'),(70,12,2,'grace','2019-03-29 11:26:07','grace','2019-03-29 11:26:07'),(71,13,10,'jon','2019-04-04 05:46:30','jon','2019-04-04 05:46:30'),(72,14,10,'jon','2019-04-04 07:47:55','jon','2019-04-04 07:47:55'),(73,15,10,'jon','2019-04-06 22:57:26','jon','2019-04-06 22:57:26'),(74,16,10,'jon','2019-04-06 23:05:37','jon','2019-04-06 23:05:37'),(75,17,10,'jon','2019-04-06 23:40:21','jon','2019-04-06 23:40:21'),(76,18,11,'jon','2019-04-06 23:59:28','jon','2019-04-06 23:59:28'),(77,19,7,'jon','2019-04-07 00:17:00','jon','2019-04-07 00:17:00'),(78,20,7,'jon','2019-04-07 00:18:06','jon','2019-04-07 00:18:06'),(79,21,8,'jon','2019-04-07 00:19:54','jon','2019-04-07 00:19:54'),(80,22,8,'jon','2019-04-07 00:20:14','jon','2019-04-07 00:20:14'),(81,23,8,'jon','2019-04-07 00:21:02','jon','2019-04-07 00:21:02'),(82,24,12,'jon','2019-04-25 00:40:10','jon','2019-04-25 00:40:10'),(83,25,12,'jon','2019-04-25 00:41:13','jon','2019-04-25 00:41:13'),(84,26,12,'jon','2019-04-25 00:42:09','jon','2019-04-25 00:42:09'),(85,27,12,'jon','2019-04-25 00:43:16','jon','2019-04-25 00:43:16'),(86,28,13,'aziah','2019-04-25 23:00:58','aziah','2019-04-25 23:00:58'),(87,29,13,'aziah','2019-04-25 23:02:15','aziah','2019-04-25 23:02:15'),(88,30,13,'aziah','2019-04-25 23:03:26','aziah','2019-04-25 23:03:26'),(89,31,15,'ideas','2019-05-03 12:52:07','ideas','2019-05-03 12:52:07'),(90,32,16,'pp','2019-05-03 13:41:17','pp','2019-05-03 13:41:17'),(91,33,17,'fx','2019-05-03 13:54:53','fx','2019-05-03 13:54:53');
/*!40000 ALTER TABLE `quiz_lesson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topic`
--

DROP TABLE IF EXISTS `topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topic` (
  `topicId` int(10) NOT NULL AUTO_INCREMENT,
  `topicName` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `videoUrl` varchar(100) DEFAULT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'Active',
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `updatedDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`topicId`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topic`
--

LOCK TABLES `topic` WRITE;
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` VALUES (5,'Emailing','consectetur adipisicing elit. Repudiandae illum cumque sint ducimus ipsa nobis nihil. Est voluptatibus hic minima quos, atque, recusandae modi dignissimos quas tempora ullam fugiat doloremque!','VID-20190102-WA0002_001.mp4','Active','system','2019-01-12 16:19:21','system','2019-01-10 13:05:30'),(49,'Setting Goals','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique nobis quisquam eaque ut iste dicta mollitia, fugiat facere, temporibus nostrum esse consequuntur est nemo ipsa? Vitae eos delectus, at molestias.','Six Minutes to Success - 1 ( 240 X 320 ).mp4','Active','alfred','2019-02-08 13:23:39','alfred','2019-02-08 13:23:39'),(50,'Sending Emails','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique nobis quisquam eaque ut iste dicta mollitia, fugiat facere, temporibus nostrum esse consequuntur est nemo ipsa? Vitae eos delectus, at molestias.                        ','Rowan Atkinson - Interview with Elton John ( 240 X 316 ).mp4','Active','adu','2019-02-08 13:37:10','adu','2019-02-08 13:37:10'),(51,'Greeting a Client','\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur sint recusandae, assumenda minus sed, ipsum nostrum et temporibus reiciendis. Odit earum odio voluptatibus ut dolor ipsa voluptatum aperiam sed beatae!','Six Minutes to Success vid3 ( 360 X 640 ).mp4','Active','adu','2019-02-08 13:41:30','adu','2019-02-08 13:41:30'),(52,'Pitch your product','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci possimus quibusdam tenetur aut perspiciatis laudantium enim voluptas consequuntur quam maxime qui blanditiis vel sed at similique odit, aliquid architecto provident!                        ','Amazing Grace - piano hymn with lyrics ( 240 X 426 ).mp4','Active','adu','2019-02-08 14:44:38','adu','2019-02-08 14:44:38'),(53,'Signing the Deal','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci possimus quibusdam tenetur aut perspiciatis laudantium enim voluptas consequuntur quam maxime qui blanditiis vel sed at similique odit, aliquid architecto provident!','Don Moen - Thank You Lord _ Live Worship Sessions ( 360 X 640 ).mp4','Active','adu','2019-02-19 12:57:58','adu','2019-02-08 14:45:05'),(54,'how to shelve library books','is about ranging the books in order','Six Minutes to Success - 1 ( 240 X 320 ).mp4','Active','sk','2019-02-19 12:57:58','sk','2019-02-11 17:34:35'),(55,'html intro','This will introduce you to html courses','thegig.mp4','Active','akosaemmanuel','2019-02-19 12:57:58','akosaemmanuel','2019-02-11 17:53:58'),(56,'css lesson','This will introduce you to css lesson','Customer Service Training ( 360 X 640 ).mp4','Active','akosaemmanuel','2019-02-11 17:55:01','akosaemmanuel','2019-02-11 17:55:01'),(57,'How to communicate with your team',' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsam, vel veniam velit aut, laborum error corrupti, fuga sapiente magnam possimus, alias. Doloremque aut, sed nam iure accusamus necessitatibus porro.\r\n','A Habit You Simply MUST Develop ( 360 X 640 ).mp4','Active','alfred','2019-02-14 16:05:08','alfred','2019-02-14 16:05:08'),(58,'Tips for Rig','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, unde, autem. Facere, aliquid, amet. Nostrum animi earum quaerat voluptatibus eum ipsa incidunt sunt molestiae dolore, voluptas suscipit, modi deserunt iusto.\r\n      ','Six Minutes To Success   Video 3B   Terror Barrier ( 360 X 640 ).mp4','Active','jon','2019-02-20 15:03:57','jon','2019-02-20 15:03:57'),(59,'Drilling ','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, unde, autem. Facere, aliquid, amet. Nostrum animi earum quaerat voluptatibus eum ipsa incidunt sunt molestiae dolore, voluptas suscipit, modi deserunt iusto.\r\n ','Put God First - Denzel Washington Motivational & Inspiring Commencement Speech ( 144 X 176 ).3gp','Active','jon','2019-02-20 15:04:25','jon','2019-02-20 15:04:25'),(60,'Pipelines','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, unde, autem. Facere, aliquid, amet. Nostrum animi earum quaerat voluptatibus eum ipsa incidunt sunt molestiae dolore, voluptas suscipit, modi deserunt iusto.\r\n                    ','Piano Runs & Fills You Can Add To Your Piano Playing ( 240 X 294 ).mp4','Active','jon','2019-02-20 15:04:58','jon','2019-02-20 15:04:58'),(61,'Pipelines','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, unde, autem. Facere, aliquid, amet. Nostrum animi earum quaerat voluptatibus eum ipsa incidunt sunt molestiae dolore, voluptas suscipit, modi deserunt iusto.\r\n                    ','Piano Runs & Fills You Can Add To Your Piano Playing ( 240 X 294 ).mp4','Active','jon','2019-02-20 15:06:09','jon','2019-02-20 15:06:09'),(62,'Customer First','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, unde, autem. Facere, aliquid, amet. Nostrum animi earum quaerat voluptatibus eum ipsa incidunt sunt molestiae dolore, voluptas suscipit, modi deserunt iusto.\r\n','Dominant 9th Chords_ How and When to Use Them ( 480 X 854 ).mp4','Active','jon','2019-02-20 15:08:52','jon','2019-02-20 15:08:52'),(63,'Managing the Customer','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, unde, autem. Facere, aliquid, amet. Nostrum animi earum quaerat voluptatibus eum ipsa incidunt sunt molestiae dolore, voluptas suscipit, modi deserunt iusto.\r\n','Rowan Atkinson - Interview with Elton John ( 240 X 316 ).mp4','Active','jon','2019-02-20 15:09:31','jon','2019-02-20 15:09:31'),(64,'Basics of Harmony',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n              ','A VERY Cool Chord Progression You Can Play! ( 240 X 360 ).mp4','Active','jon','2019-04-05 13:48:47','jon','2019-04-05 13:48:47'),(65,'The Basics',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  \r\n','Dominant 9th Chords_ How and When to Use Them ( 480 X 854 ).mp4','Active','jon','2019-04-25 00:37:59','jon','2019-04-25 00:37:59'),(66,'Linking up with the Mentee',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  \r\n','piano-free.mp4','Active','jon','2019-04-25 00:38:27','jon','2019-04-25 00:38:27'),(67,'Common Management Phrases',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n','Secrets Of Surprising Chords Part 1 - Chord Substitutions ( 240 X 360 ).mp4','Active','aziah','2019-04-25 22:58:03','aziah','2019-04-25 22:58:03'),(68,'The Boss and The Customer',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n','Six Minutes to Success vid3 ( 360 X 640 ).mp4','Active','aziah','2019-04-25 22:58:47','aziah','2019-04-25 22:58:47'),(69,'IP Addressing','                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n ','10 Best Ideas _ THINK AND GROW RICH _ Napoleon Hill _ Book Summary ( 360 X 640 ).mp4','Active','ideas','2019-05-03 12:50:18','ideas','2019-05-03 12:50:18'),(70,'Network Architechture','                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n ','A Habit You Simply MUST Develop ( 360 X 640 ).mp4','Active','ideas','2019-05-03 12:50:47','ideas','2019-05-03 12:50:47'),(71,' Wireless',' this is wirless','10 Best Ideas _ THINK AND GROW RICH _ Napoleon Hill _ Book Summary ( 360 X 640 ).mp4','Active','fx','2019-05-03 13:53:43','fx','2019-05-03 13:53:43');
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_result`
--

DROP TABLE IF EXISTS `user_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_result` (
  `userResultId` int(10) NOT NULL AUTO_INCREMENT,
  `appUserId` int(10) NOT NULL,
  `lessonId` int(10) NOT NULL,
  `quizId` int(11) NOT NULL,
  `choiceOption` varchar(500) NOT NULL,
  `createdBy` varchar(100) NOT NULL DEFAULT 'system',
  `createdDateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` varchar(100) NOT NULL DEFAULT 'system',
  `updatedDateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`userResultId`),
  UNIQUE KEY `appUserId` (`appUserId`,`quizId`),
  KEY `userid-fk_idx` (`appUserId`),
  KEY `lessonid-fk_idx` (`lessonId`),
  KEY `quizid-fk_idx` (`quizId`),
  CONSTRAINT `lessonid-fk` FOREIGN KEY (`lessonId`) REFERENCES `lesson` (`lessonId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `quizid-fk` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`quizId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `userid-fk` FOREIGN KEY (`appUserId`) REFERENCES `app_user` (`appUserId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_result`
--

LOCK TABLES `user_result` WRITE;
/*!40000 ALTER TABLE `user_result` DISABLE KEYS */;
INSERT INTO `user_result` VALUES (9,6,12,24,'May be','jon','2019-04-28 23:26:50','jon','2019-05-27 22:07:29'),(10,6,12,25,'No','jon','2019-04-28 23:26:50','jon','2019-05-27 22:07:29'),(11,6,12,26,'Never','jon','2019-04-28 23:26:50','jon','2019-05-27 22:07:29'),(12,6,12,27,'Suredly','jon','2019-04-28 23:26:50','jon','2019-05-03 22:03:49'),(17,6,7,19,' No','jon','2019-04-28 23:27:41','jon','2019-05-02 15:40:56'),(18,6,7,20,'haha','jon','2019-04-28 23:27:41','jon','2019-05-02 15:40:56'),(19,6,8,21,'Yes','jon','2019-05-02 15:42:42','jon','2019-05-02 15:42:42'),(20,6,8,22,'No','jon','2019-05-02 15:42:43','jon','2019-05-02 15:42:43'),(21,6,8,23,'Nope','jon','2019-05-02 15:42:43','jon','2019-05-02 15:42:43'),(22,71,15,31,'False','ideas','2019-05-03 12:57:00','ideas','2019-05-03 12:57:25'),(23,73,16,32,'true','pp','2019-05-03 13:41:33','pp','2019-05-03 13:41:33'),(24,70,17,33,'none','fx','2019-05-03 13:55:07','fx','2019-05-12 17:36:08'),(25,6,11,18,'Soprano, Alto, Tenor, Bass','jon','2019-05-23 21:47:54','jon','2019-05-23 21:47:54');
/*!40000 ALTER TABLE `user_result` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-04 20:55:04
