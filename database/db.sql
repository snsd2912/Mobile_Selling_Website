-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: phone_website
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `branch` (
  `branchid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `des` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`branchid`),
  UNIQUE KEY `branchid_UNIQUE` (`branchid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (1,'Ha Noi',NULL),(2,'Ho Chi Minh',NULL);
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1,27,1,'IPhone 12',4000000,10,0);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  PRIMARY KEY (`categoryid`),
  UNIQUE KEY `categoryid_UNIQUE` (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Smart Phone',0),(2,'IPhone',1),(3,'Samsung',1),(4,'Oppo',1),(5,'Xiaomi',1),(11,'Sony',1),(12,'Earphone',0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `customerid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phonenumber` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`customerid`),
  UNIQUE KEY `customerid_UNIQUE` (`customerid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'marklee','c4ca4238a0b923820dcc509a6f75849b','Mark Lee','Korea','0123456789','marklee@gmail.com'),(14,'sanglv','202cb962ac59075b964b07152d234b70','Lê Văn Sang','Hà Nội','0123456789','lesang407407@gmail.com');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distributors`
--

DROP TABLE IF EXISTS `distributors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distributors` (
  `distributorid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phonenumber` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`distributorid`),
  UNIQUE KEY `distributorid_UNIQUE` (`distributorid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distributors`
--

LOCK TABLES `distributors` WRITE;
/*!40000 ALTER TABLE `distributors` DISABLE KEYS */;
INSERT INTO `distributors` VALUES (1,'Apple Store','apple@apple.com','0123456784','Thailand','',NULL),(4,'Samsung Store','samsung@samsung.com','0456789123','Thailand','',NULL);
/*!40000 ALTER TABLE `distributors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listorder`
--

DROP TABLE IF EXISTS `listorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listorder` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phonenumber` varchar(45) DEFAULT NULL,
  `note` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `ship` int(11) DEFAULT '0',
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listorder`
--

LOCK TABLES `listorder` WRITE;
/*!40000 ALTER TABLE `listorder` DISABLE KEYS */;
INSERT INTO `listorder` VALUES (9,1,'Mark Lee','0123456789','','Korea','2021-05-23 11:04:58',89100000,2),(10,14,'Lê Văn Sang','0123456789','Ship nhanh giúp em ạ','Hà Nội','2021-05-23 12:49:03',3600000,2),(11,14,'Lê Văn Sang','0123456789','Giao trước ngày 1/6 giúp em với ạ','Hà Nội','2021-05-23 12:53:44',16000000,2),(12,1,'Mark Lee','0123456789','','Korea','2021-05-23 13:22:23',19600000,2),(13,1,'Mark Lee','0123456789','','Korea','2021-05-23 13:29:44',16000000,2),(14,14,'Lê Văn Sang','0123456789','','Hà Nội','2021-05-23 15:50:13',10800000,2),(15,14,'Lê Văn Sang','0123456789','','Hà Nội','2021-05-23 22:26:48',3600000,2);
/*!40000 ALTER TABLE `listorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_detail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL,
  `qty` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES (9,27,'IPhone 12','4000000','10','1'),(9,1,'IPhone 13','90000000','5','1'),(10,27,'IPhone 12','4000000','10','1'),(11,28,'IPhone 11','20000000','20','1'),(12,28,'IPhone 11','20000000','20','1'),(12,27,'IPhone 12','4000000','10','1'),(13,28,'IPhone 11','20000000','20','1'),(14,27,'IPhone 12','4000000','10','3'),(15,27,'IPhone 12','4000000','10','1');
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `distributorid` int(11) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `hot` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`productid`),
  UNIQUE KEY `productid_UNIQUE` (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,2,'IPhone 13',90000000,'<p>This is IPhone 13</p>\r\n','1621751556960x0.jpg',1,5,1),(27,1,2,'IPhone 12',4000000,'<p>This is IPhone 12</p>\r\n','1621751594xanhduong_1_d71c88107e5a4a5cadc462f17f4c0e02.jpeg',1,10,1),(28,1,2,'IPhone 11',20000000,'<p>This is IPhone 11</p>\r\n','1621751641iphone-11-den_1592989568.jpg',0,20,1),(29,1,2,'IPhone X',10000000,'<p>This is IPhone X</p>\r\n','1621751666iphone_x_black_master.jpg',0,15,1),(35,4,3,'Samsung Galaxy Note 9',10000000,'','1621751757samsung-galaxy-s9-plus-256gb-viettablet.jpg',0,NULL,1),(37,4,3,'Samsung A7',7250000,'','16217845971206798088.jpg',0,NULL,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`roleid`),
  UNIQUE KEY `roleid_UNIQUE` (`roleid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'admin'),(2,'sale');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `branchid` int(11) DEFAULT '0',
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phonenumber` varchar(10) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `roleid` int(11) DEFAULT '0',
  `active` int(11) DEFAULT '1',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `userid_UNIQUE` (`userid`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `branchid1_idx` (`branchid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'sanglv','c4ca4238a0b923820dcc509a6f75849b','Le Van Sang','1999-12-29',1,'Ha Noi','lesang407407@gmail.com','0377824869','162152822467303688_2278977729022316_1652863351492968448_n.jpg',1,1),(2,1,'seohyun','c4ca4238a0b923820dcc509a6f75849b','Seo Ju Hyun','1999-12-29',1,'Ha Noi','seojuhyun@gmail.com','0377824869','1620661822190803_2.jpg',1,1),(3,1,'taeyeon','c4ca4238a0b923820dcc509a6f75849b','Kim Tae Yeon','1999-12-29',1,'Ha Noi','taeyeon@gmail.com','0377824869','taeyeon.jpg',2,1),(4,1,'sooyoung','c4ca4238a0b923820dcc509a6f75849b','Choi Soo Young','1999-12-29',0,'Ha Noi','sooyoung@gmail.com','0377824869','sooyoung.jpg',2,1),(5,1,'yoona','c4ca4238a0b923820dcc509a6f75849b','Im Yoona','1999-12-29',0,'Ha Noi','yoona@gmail.com','0377824869','yoona.jpg',2,1),(6,2,'hyoyeon','c4ca4238a0b923820dcc509a6f75849b','Kim Hyoyeon','1999-12-29',0,'Ha Noi','hyoyeon@gmail.com','0377824869','hyoyeon.jpg',1,1),(7,2,'sunny','c4ca4238a0b923820dcc509a6f75849b','Lee Soon Kyu','1999-12-29',1,'Ha Noi','sunny@gmail.com','0377824869','sunny.jpg',2,1),(8,2,'yuri','c4ca4238a0b923820dcc509a6f75849b','Kwon Yuri','1999-12-29',1,'Ha Noi','yuri@gmail.com','0377824869','yuri.jpg',2,1),(9,1,'fany','202cb962ac59075b964b07152d234b70','Tiffany Hwang','1999-12-29',0,'Ha Noi','fany@gmail.com','0377824869','1621784711CLU2oyaUcAAAzt7.jpg',1,1),(16,1,'xxx','202cb962ac59075b964b07152d234b70','xxxxx','2021-05-14',0,'Hà Nội','xxx@gmail.com','0123456789','1621756767samsung-galaxy-s9-plus-256gb-viettablet.jpg',1,0),(17,2,'test','c4ca4238a0b923820dcc509a6f75849b','Test','2021-04-29',2,'Korea','test@gmail.com','0123456789','1621784762Dx2e0LAU0AA5z0I.jpg',2,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'phone_website'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-23 23:13:46
