CREATE DATABASE  IF NOT EXISTS `sudasalf` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sudasalf`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: sudasalf
-- ------------------------------------------------------
-- Server version	5.7.15-log

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(45) DEFAULT 'default_product.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Kitchen','2018-01-09 17:11:08','kitchen.png'),(2,'Household','2018-01-09 17:11:08','household.png'),(3,'Personal Care','2018-01-09 17:11:08','personal.png');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `Location` varchar(45) NOT NULL,
  `Cordinates` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`Location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES ('Cafe309','Cafe+309/@33.6417667,72.988845,146m'),('Concordia1','Concordia+1/@33.6464558,72.9884775,584m'),('Concordia2','Concordia+2+(C2)/@33.6429909,72.9882172,79m'),('Concordia3','NG+Cafe+(C3)/@33.6428695,72.9926188,584m'),('JangoCafe','Jango+Cafe,+NUST/@33.6391121,72.9881112,146m');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'Adnan','abc@nnn.com','Hello everyone','2018-01-07 13:24:36'),(2,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(3,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(4,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(5,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(6,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(7,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(8,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(9,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(10,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(11,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(12,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(13,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(14,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(15,'Adnan','abc@nnn.com','messages','2018-01-07 13:24:36'),(16,'Adnan','hwllo@1234.com','evedas','2018-01-07 13:24:36'),(17,'Adnan','hwllo@1234.com','evedas','2018-01-07 13:24:36'),(18,'Fahad','fahad@gmail.com','My message','2018-01-08 09:42:00'),(19,'qcsca','asc@qw.com','asdcdsjnbdui','2018-01-09 06:39:09'),(20,'adnan','adnan@mail.com','hello every one','2018-01-10 10:38:00');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `Orderid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `Order_Amount` int(11) NOT NULL,
  `Order_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ShopKeeper_email` varchar(45) NOT NULL,
  `Customer_email` varchar(45) NOT NULL,
  PRIMARY KEY (`Orderid`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,1200,'2018-01-10 06:33:48','shop@gmail.com','cos@gmail.com');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(45) DEFAULT 'default_product.jpg',
  `price` float NOT NULL,
  `Location` varchar(45) NOT NULL,
  `summary` varchar(25) DEFAULT NULL,
  `oldprice` float DEFAULT NULL,
  `offer` bit(1) DEFAULT b'0',
  `unit` varchar(10) DEFAULT NULL,
  `rating` float DEFAULT '0.5',
  `counter` int(11) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `subcategory` int(11) DEFAULT NULL,
  `shopkeeper` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prod_shopkeeper_idx` (`shopkeeper`),
  KEY `fk_prod_to_loc_idx` (`Location`),
  CONSTRAINT `fk_prod_to_loc` FOREIGN KEY (`Location`) REFERENCES `location` (`Location`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Orange Juice','Orange juice is the liquid extract of the fruit of the orange tree, produced by squeezing oranges.','orange_juice.png',90.75,'JangoCafe','Full of vitamins',100.12,'','250 ml',0.79,68,'2018-01-09 17:11:10',1,NULL),(2,'Apple Juice','Apple juice is the liquid extract of the fruit of the apple tree, produced by grinding apples.','apple_juice.png',85.75,'JangoCafe','Full of vitamins',100.12,'','250 ml',0.49,72,'2018-01-09 17:11:11',1,NULL),(3,'Grape Juice','Grape juice is the liquid extract of the fruit of the Grape tree, produced by squeezing grapes.','grape_juice.png',70.75,'JangoCafe','Full of vitamins',100.12,'','250 ml',0.9,51,'2018-01-09 17:11:11',1,NULL),(4,'Peach Juice','Peach juice is the liquid extract of the fruit of the peach tree, produced by squeezing peaches.','peach_juice.png',60.75,'JangoCafe','Full of vitamins',100.12,'','250 ml',0.99,49,'2018-01-09 17:11:11',1,NULL),(5,'Oranges','Orange is the fruit of the orange tree','orange.png',20.75,'Concordia3','Full of vitamins',100.12,'','250 g',0.89,65,'2018-01-09 17:11:11',2,NULL),(6,'Apples','Apples is the fruit of the apple tree','apple.png',25.75,'Concordia2','Full of vitamins',100.12,'','250 g',0.89,69,'2018-01-09 17:11:11',2,NULL),(7,'Grape','Grape is the fruit of the grape tree','grape.png',30.75,'Concordia3','Full of vitamins',100.12,'','250 g',0.89,49,'2018-01-09 17:11:12',2,NULL),(8,'Peach','Peach is the fruit of the peach tree','peach.png',20.75,'Concordia2','Full of vitamins',100.12,'','250 g',0.89,47,'2018-01-09 17:11:12',2,NULL),(9,'Lays Salted','Lays Salted is a product of the lays company.','lays_salted.png',20,'Concordia3','Tasty and delicious',30,'','50 g',0.95,47,'2018-01-09 17:11:12',3,NULL),(10,'Lays Masala','Lays Masala is a product of the lays company.','lays_masala.png',20,'Concordia3','Tasty and delicious',30,'','50 g',0.9,50,'2018-01-09 17:11:12',3,NULL),(11,'Lays Pepper','Lays Pepper is a product of the lays company.','lays_pepper.png',20,'Cafe309','Tasty and delicious',30,'\0','50 g',0.65,47,'2018-01-09 17:11:13',3,NULL),(12,'Lays Ketchup','Lays Ketchup Tango is a product of the lays company.','lays_ketchup.png',20,'Cafe309','Tasty and delicious',30,'\0','50 g',0.45,50,'2018-01-09 17:11:13',3,NULL),(13,'Prince chocolate','Prince chocolate is a biscuit by the LU company.','prince_choc.png',15,'Concordia1','Tasty and delicious',30,'','20 g',0.95,51,'2018-01-09 17:11:13',4,NULL),(14,'Rio vanilla','Rio Vanilla is a biscuit by the LU company.','rio_van.png',15,'Cafe309','Tasty and delicious',30,'','20 g',0.65,51,'2018-01-09 17:11:13',4,NULL),(15,'Tuc','Tuc is a biscuit by the LU company.','tuc.png',15,'Cafe309','Tasty and delicious',30,'','20 g',0.75,0,'2018-01-09 17:11:14',4,NULL),(16,'Butterpuff','Butterpuff is a biscuit by the LU company.','butterpuff.png',15,'Concordia1','Tasty and delicious',30,'\0','20 g',0.65,0,'2018-01-09 17:11:14',4,NULL),(17,'Vacuum Cleaner','Aeon Vacuum Cleaner is a state-of-the-art cleaner by the Aeon company.','aeon_vacuum.png',3500,'Concordia1','For day to day usage.',4000,'\0','1 pc',0.9,72,'2018-01-09 17:11:14',5,NULL),(18,'Shimmer Broomstick','Shimmer\'s broomstick is top-notch cleaner by the Aeon company.','shimmer.png',500,'Concordia2','For day to day usage.',600,'\0','1 pc',0.7,7,'2018-01-09 17:11:14',5,NULL),(19,'Dawlance Washing','Dawlance washing machine is a state-of-the-art cleaning machine by the Dawlance company.','dawlance_washing.png',25000,'Concordia1','For day to day usage.',30000,'','1 pc',0.9,50,'2018-01-09 17:11:14',5,NULL),(20,'Surf Excel','Surf Excel is the leading washing powder.','surf_excel.png',120,'Concordia2','For day to day usage.',150,'','1 KG',0.9,48,'2018-01-09 17:11:14',6,NULL),(21,'Ariel','Ariel is a economic washing powder choice.','ariel.png',130,'Concordia2','For day to day usage.',160,'','1 KG',0.92,69,'2018-01-09 17:11:15',6,NULL),(22,'Sun Rise','Sun Rise washing powder is the perfect balance between economy and value.','sun_rise.png',140,'Concordia2','For day to day usage.',170,'\0','1 KG',0.67,48,'2018-01-09 17:11:15',6,NULL),(23,'Bonus','Bonus washing powder is the most economical choice.','bonus.png',150,'Concordia2','For day to day usage.',190,'\0','1 KG',0.76,49,'2018-01-09 17:11:15',6,NULL),(24,'Aeon Knife','Aeon knife is a state-of-the-art knife by the Aeon Company.','aeon_knife.png',320,'Concordia1','For day to day usage.',450,'','1 pc',0.7,70,'2018-01-09 17:11:15',7,NULL),(25,'Aeon Spoon','Aeon Spoon is a state-of-the-art spoon by the Aeon Company.','aeon_spoon.png',170,'Concordia1','For day to day usage.',200,'','1 pc',0.8,70,'2018-01-09 17:11:15',7,NULL),(26,'Crystal Plates','Crystal plates are made from real Crystals. Enjoy your food!','crystal_plates.png',4000,'Concordia1','For day to day usage.',4500,'','6 pc',0.89,47,'2018-01-09 17:11:15',7,NULL),(27,'Dog Food','Most popular dog food by the Woof Company.','dog_food.png',320,'Concordia2','For day to day usage.',450,'','250 g',0.6,4,'2018-01-09 17:11:16',8,NULL),(28,'Cat Food','Most popular cat food by the Woof Company.','cat_food.png',270,'Concordia2','For day to day usage.',350,'','250 g',0.7,51,'2018-01-09 17:11:16',8,NULL),(29,'Bird Food','Most popular bird food by the Woof Company.','bird_food.png',120,'Concordia2','For day to day usage.',160,'','250 g',0.9,4,'2018-01-09 17:11:16',8,NULL),(30,'Vogue Lipstick','Leading make-up brand presents Vogue Lipstick.','cosmetics.png',320,'Concordia1','For day to day usage.',400,'\0','1 pc',0.9,4,'2018-01-09 17:11:16',9,NULL),(31,'Vogue Mascara','Leading make-up brand presents Vogue Mascara.','mascara.png',160,'Concordia1','For day to day usage.',200,'','1 pc',0.7,54,'2018-01-09 17:11:16',9,NULL),(32,'Vogue Make-up Kit','Leading make-up brand presents Vogue Make-up Kit.','makeup_kit.png',3200,'Concordia2','For day to day usage.',4000,'\0','1 pc',0.5,54,'2018-01-09 17:11:17',9,NULL),(33,'H&S Shampoo','Head & Shoulders presents Anti-Dandfruff Shampoo.','head_dandruff.png',180,'Concordia2','For day to day usage.',200,'','250 ml',0.9,56,'2018-01-09 17:11:17',10,NULL),(34,'H&S Anti-Lice Shampoo','Head & Shoulders presents Anti-Lice Shampoo.','head_lice.png',180,'Concordia2','For day to day usage.',200,'','250 ml',0.9,55,'2018-01-09 17:11:17',10,NULL),(35,'Pantene Shampo','Pantene presents Anti-Dandfruff Shampoo.','pantene_dandruff.png',280,'Concordia2','For day to day usage.',300,'','250 ml',0.8,55,'2018-01-09 17:11:18',10,NULL),(36,'Shield ToothBrush','Shield presents anti-yellow toothbrush.','shield_toothbush.png',180,'Concordia1','For day to day usage.',200,'\0','1 pc',0.7,4,'2018-01-09 17:11:18',11,NULL),(37,'Ponds Facewash','Ponds presents whitening face wash.','ponds_facewash.png',200,'Concordia1','For day to day usage.',250,'','250 ml',0.74,51,'2018-01-09 17:11:18',11,NULL),(38,'Vince Facewash','Vince presents facewash for oily solutions.','vince_facewash.png',580,'Concordia1','For day to day usage.',700,'\0','250 ml',0.6,47,'2018-01-09 17:11:18',11,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `counter` int(11) DEFAULT '0',
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(45) DEFAULT 'default_product.jpg',
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategory`
--

LOCK TABLES `subcategory` WRITE;
/*!40000 ALTER TABLE `subcategory` DISABLE KEYS */;
INSERT INTO `subcategory` VALUES (1,'Beverages',1,2,'2018-01-09 17:11:09','beverages.png','A drink or beverage is a liquid intended for human consumption.'),(2,'Fruits & Vegetables',1,2,'2018-01-09 17:11:09','fruits.png','Fruits and veggies for daily use.'),(3,'Snacks',1,2,'2018-01-09 17:11:09','snacks.png','Snacks for daily use.'),(4,'Biscuits & Cakes',1,2,'2018-01-09 17:11:09','biscuits.png','Biscuits for daily use.'),(5,'Cleaning Accessories',2,0,'2018-01-09 17:11:09','cleaning.png','Cleaning Accessories for daily use.'),(6,'Detergents',2,0,'2018-01-09 17:11:10','detergents.png','Detergents for daily use.'),(7,'Serveware',2,0,'2018-01-09 17:11:10','serveware.png','Serveware for daily use.'),(8,'Pet Care',2,0,'2018-01-09 17:11:10','pets.png','Pet Care for daily use.'),(9,'Cosmetics',3,0,'2018-01-09 17:11:10','cosmetics.png','Cosmetics for daily use.'),(10,'Hair Care',3,0,'2018-01-09 17:11:10','haircare.png','Hair care for daily use.'),(11,'Oral & Skin Care',3,0,'2018-01-09 17:11:10','oralcare.png','Oral Care for daily use.');
/*!40000 ALTER TABLE `subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `email` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `type` enum('Customer','Admin','Shopkeeper') DEFAULT NULL,
  `status` enum('Active','Pending','Banned','Inactive') DEFAULT NULL,
  `image` varchar(45) DEFAULT 'deafult.png',
  `bio` varchar(100) DEFAULT 'Hello everyone!',
  `Address` varchar(245) DEFAULT 'SEECS Nust H-12 Islamabad',
  `Contact` varchar(15) DEFAULT '+92-123456789',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('','Ahmad','user123','Customer','Active','deafult.png','','anbdsnmabd','+92-123456789'),('abc@gmail.com','abc','abc','Shopkeeper','Pending','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('admin@gmail.com','Ahmad','user123','Admin','Pending','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('adnan@gmail.com','Adnan','abc123','Shopkeeper','Pending','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('ayesha@gmail.com','Ayesha','abc123','Customer','Active','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('cos143@gmail.com','Ahmad','user123','Customer','Active','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('cos144@gmail.com','Ahmad','user123','Customer','Active','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('cos145@gmail.com','Ahmad','user123','Customer','Active','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('cos146@gmail.com','Ahmad','user123','Customer','Active','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('cos147@gmail.com','Ahmad','user123','Customer','Active','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('cos3@gmail.com','Ahmad','user123','Customer','Active','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('cos4@gmail.com','Ahmad','user123','Customer','Active','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('kiran@gmail.com','Kiran','abc111','Shopkeeper','Pending','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('qw@gmail.com','atahir','123','Shopkeeper','Pending','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('s2@gmail.com','Ahmad','user123','Shopkeeper','Banned','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('s5@gmail.com','Ahmad','user123','Customer','Banned','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('s7@gmail.com','Saleem','user123','Customer','Active','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('shop@gmail.com','Saleem','user123','Shopkeeper','Active','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('user3@gmail.com','Ahmad','user123','Shopkeeper','Active','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789'),('user4@gmail.com','Ahmad','user123','Shopkeeper','Pending','deafult.png','Hello everyone!','SEECS Nust H-12 Islamabad','+92-123456789');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'sudasalf'
--

--
-- Dumping routines for database 'sudasalf'
--
/*!50003 DROP PROCEDURE IF EXISTS `delete_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_user`(IN id VARCHAR(45))
BEGIN
DELETE FROM `sudasalf`.`user` WHERE `email`=id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_all_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_all_user`()
BEGIN
SELECT email, name, type, status, image FROM user;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_cat_by_id` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_cat_by_id`(IN ID INT)
BEGIN
UPDATE subcategory SET counter = counter + 1 WHERE category = ID;

SELECT * FROM subcategory WHERE category = ID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_cat_top` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_cat_top`(IN ID INT, IN count INT)
BEGIN
SELECT * FROM subcategory WHERE category = ID ORDER BY counter DESC LIMIT count;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_latest_products` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_latest_products`(IN count INT)
BEGIN
SELECT * FROM products ORDER BY timestamp DESC LIMIT count;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_like_products` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_like_products`(IN productName VARCHAR(45))
BEGIN

UPDATE products SET counter = counter + 1 WHERE name LIKE CONCAT('%', productName , '%');

SELECT *
FROM (products p JOIN location l on  p.Location = l.Location) WHERE p.name LIKE CONCAT('%', productName , '%');

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_like_products_suggest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_like_products_suggest`(IN productName VARCHAR(45))
BEGIN

UPDATE products SET counter = counter + 1 WHERE name LIKE CONCAT(productName , '%');

SELECT *
FROM (products p JOIN location l on  p.Location = l.Location) WHERE p.name LIKE CONCAT(productName , '%');

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_product_ById` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_product_ById`(IN productID INT)
BEGIN
UPDATE products SET counter = counter + 1 WHERE id = productID;

SELECT *
FROM (products p JOIN location l on  p.Location = l.Location) WHERE id = productID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_product_ByName` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_product_ByName`(IN productName VARCHAR(45))
BEGIN
UPDATE products SET counter = counter + 1 WHERE name= productName;
SELECT *
FROM (products p JOIN location l on  p.Location = l.Location) WHERE p.name= productName;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_product_top_overall` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_product_top_overall`(IN count INT)
BEGIN
SELECT * FROM products ORDER BY counter DESC LIMIT count;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_subcat_by_id` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_subcat_by_id`(IN ID INT)
BEGIN
UPDATE products SET counter = counter + 1 WHERE subcategory = ID;

SELECT * FROM products WHERE subcategory = ID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_subcat_top` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_subcat_top`(IN ID INT,IN count INT)
BEGIN
SELECT * FROM products WHERE subcategory = ID ORDER BY counter DESC LIMIT count;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_subcat_top_overall` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_subcat_top_overall`( IN count INT)
BEGIN
SELECT * FROM subcategory ORDER BY counter DESC LIMIT count;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_top_products` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_top_products`(IN Title VARCHAR(45), IN count INT)
BEGIN
SELECT p.id, p.name, p.description, p.image, p.price, p.Location, p.summary,p.counter,
 p.oldprice, p.offer, p.unit, p.rating,  p.timestamp, l.Cordinates
 FROM products p JOIN subcategory s ON (p.subcategory = s.id) 
JOIN location l ON(p.location = l.location)  
WHERE s.title = Title
ORDER BY p.counter DESC LIMIT count;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `update_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_user`(IN id VARCHAR(45),IN usertype INT,IN userstatus INT )
BEGIN
UPDATE `sudasalf`.`user` SET `type`= usertype , `status`= userstatus WHERE `email`= id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-11 17:00:46
