-- MySQL dump 10.13  Distrib 5.7.40, for Linux (x86_64)
--
-- Host: localhost    Database: qndxx
-- ------------------------------------------------------
-- Server version	5.7.40-log

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
-- Table structure for table `access_tokens`
--

DROP TABLE IF EXISTS `access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accesstoken` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_tokens`
--

LOCK TABLES `access_tokens` WRITE;
/*!40000 ALTER TABLE `access_tokens` DISABLE KEYS */;
INSERT INTO `access_tokens` VALUES (1,'3EB9A80E-5CC8-4789-8772-A4CD495F5363');
/*!40000 ALTER TABLE `access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch_data`
--

DROP TABLE IF EXISTS `branch_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `memberCnt` int(11) DEFAULT NULL,
  `users` varchar(255) DEFAULT NULL,
  `averageScore` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_data`
--

LOCK TABLES `branch_data` WRITE;
/*!40000 ALTER TABLE `branch_data` DISABLE KEYS */;
INSERT INTO `branch_data` VALUES (1,'111',26,'0',0);
/*!40000 ALTER TABLE `branch_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `captcha`
--

DROP TABLE IF EXISTS `captcha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `captcha` (
  `id` varchar(100) NOT NULL,
  `captcha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `captcha`
--

LOCK TABLES `captcha` WRITE;
/*!40000 ALTER TABLE `captcha` DISABLE KEYS */;
INSERT INTO `captcha` VALUES ('A1D43E40-02A1-41EC-9850-7EDA5D8FF66F','T3T9');
/*!40000 ALTER TABLE `captcha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` varchar(100) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES ('C0001','第八季第一期'),('C0019','第八季第二期'),('C0021','第八季第三期'),('C0027','第八季第四期'),('C0030','第八季第五期'),('C0034','第八季第六期'),('C0035','第八季第七期'),('C0036','第八季第八期'),('C0048','第八季第九期'),('C0050','第八季第十期'),('C0058','学习电子书'),('C0065','第九季五四特辑'),('C0069','第九季第一期'),('C0073','第九季第二期'),('C0081','第九季第三期'),('C0089','第九季第四期'),('C0090','第九季第五期'),('C0119','第九季第六期'),('C0140','第九季第七期'),('C0155','第九季第八期'),('C0167','第九季第九期'),('C0190','“青年大学习”特辑'),('C0192','第九季第十期'),('C0194','第九季第十一期'),('C0195','第九季第十二期'),('C0196','第九季第十三期'),('C0198','第九季合辑'),('C0199','第十季第一期'),('C0200','第十季第二期'),('C0201','第十季第三期'),('C0202','第十季特辑1'),('C0203','第十季第四期'),('C0204','第十季特辑2'),('C0205','第十季第五期'),('C0208','第十季特辑3'),('C0209','浦东开发开放30周年庆祝大会特辑'),('C0215','第十季第六期'),('C0216','第十季第七期'),('C0217','第十季第八期'),('C0218','第十季第九期'),('C0219','第十季第十期'),('C0240','第十一季第一期'),('C0241','第十一季第二期'),('C0245','第十一季第三期'),('C0246','第十一季第四期'),('C0259','第十一季第五期'),('C0260','第十一季第六期'),('C0266','第十一季第七期'),('C0267','第十一季第八期'),('C0268','第十一季第九期'),('C0269','第十一季第十期'),('C0270','第十一季第十一期'),('C0271','第十一季第十二期'),('C0272','第十一季第十三期'),('C0273','第十一季第十四期'),('C0274','第十一季第十五期'),('C0275','第十一季第十六期'),('C0276','第十一季第十七期'),('C0277','第十一季第十八期'),('C0278','第十一季第十九期'),('C0279','第十一季第二十期'),('C0280','第十二季第一期'),('C0281','第十二季第二期'),('C0283','第十二季第三期'),('C0284','第十二季第四期'),('C0285','第十二季第五期'),('C0286','第十二季第六期'),('C0287','第十二季第七期'),('C0288','第十二季第八期'),('C0289','“青年大学习”特辑'),('C0290','第十二季第九期'),('C0291','第十二季第十期'),('C0292','第十二季第十一期'),('C0293','第十二季第十二期'),('C0294','第十二季第十三期'),('C0295','第十二季第十四期'),('C1003','2022年第2期'),('C1004','2022年第3期'),('C1005','2022年第4期'),('C1006','2022年第5期'),('C1007','2022年第6期'),('C1008','2022年第7期'),('C1009','2022年第8期'),('C1010','2022年第9期'),('C1011','2022年第10期'),('C1012','2022年第11期'),('C1013','2022年第12期'),('C1014','2022年特辑'),('C1015','2022年第13期'),('C1016','2022年第14期'),('C1017','2022年第15期'),('C1018',' 2022年第16期'),('C1019','2022年第17期'),('C1035','2022年第18期'),('C1036','2022年第19期'),('C1037','2022年第20期'),('C1038','2022年第21期'),('C1039','2022年第22期'),('C1040','特辑'),('C1043','特辑'),('C1044','2022年第23期'),('C1045','2022年第24期'),('C1046','2022年第25期'),('C1047','2022年第26期'),('C1048','2022年第27期'),('C1049','2022年第28期'),('C1050','2022年第29期'),('C1054','2022年第30期'),('C1055','2022年第31期'),('C1058','2023年第1期'),('C1059','2023年第2期'),('C1060','2023年第3期'),('C1061','2023年第4期'),('C1062','2023年第5期'),('C1063','2023年第6期'),('C1064','2023年第7期'),('C1065','2023年第8期'),('C1066','2023年第9期'),('C1067','2023年第10期'),('C1068','2023年第11期'),('C1069','2023年第12期'),('C1070','2023年第13期'),('C1071','2023年第14期'),('C1072','2023年第15期'),('C10721','特辑2'),('C1073','特辑1'),('C1074','2023年第18期');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time`
--

DROP TABLE IF EXISTS `time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time`
--

LOCK TABLES `time` WRITE;
/*!40000 ALTER TABLE `time` DISABLE KEYS */;
INSERT INTO `time` VALUES (1,'2023-08-16 15:25:22');
/*!40000 ALTER TABLE `time` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time2`
--

DROP TABLE IF EXISTS `time2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time2`
--

LOCK TABLES `time2` WRITE;
/*!40000 ALTER TABLE `time2` DISABLE KEYS */;
INSERT INTO `time2` VALUES (1,'2023-08-16 15:30:26');
/*!40000 ALTER TABLE `time2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wxx`
--

DROP TABLE IF EXISTS `wxx`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wxx` (
  `unit_class` varchar(255) DEFAULT NULL,
  `name_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wxx`
--

LOCK TABLES `wxx` WRITE;
/*!40000 ALTER TABLE `wxx` DISABLE KEYS */;
INSERT INTO `wxx` VALUES ('111','111');
/*!40000 ALTER TABLE `wxx` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'qndxx'
--

--
-- Dumping routines for database 'qndxx'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-16 15:39:23
