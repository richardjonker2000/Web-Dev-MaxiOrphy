-- MySQL dump 10.13  Distrib 5.7.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: maxiorphy
-- ------------------------------------------------------
-- Server version	5.7.26

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
-- Table structure for table `artwork`
--

DROP TABLE IF EXISTS `artwork`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artwork` (
  `ArtworkID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `ReleaseDate` date NOT NULL,
  `Size` varchar(45) NOT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`ArtworkID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artwork`
--

LOCK TABLES `artwork` WRITE;
/*!40000 ALTER TABLE `artwork` DISABLE KEYS */;
INSERT INTO `artwork` (`ArtworkID`, `Name`, `Description`, `ReleaseDate`, `Size`, `price`) VALUES (1,'Twitch Overlay - Danger ','Twitch Overlays and Panles','2020-05-12','1920x1080',NULL),(3,'Scary Totodile','Scary totodile fanart. Sized to fit a smartphone wallpaper.','2020-05-13','1920x1080',5),(4,'G2 Caps Twitch Emotes','Twitch Emotes for G2 Caps, professional league of legend player for G2 Esports. Find them at www.twitch.tv/caps ','2020-05-16','1920x1080',NULL),(5,'Gallade+Lucario','Pokemon Fusion fan art between Gallade and Lucario. It is possible to commission your personalized fusion!','2020-05-16','1920x1080',12),(6,'Twitch Overlays - Sliapmots','Twitch Overlay and Panels for Sliapmots, League of Legend Challanger tier player, go and check them at www.twitch.tv/sliapmots','2020-05-16','1920x1080',NULL),(7,'Snom Emotes','Snom Pokemon themed emotes for Snow Official Discord!','2020-05-30','1920x1080',NULL),(8,'Mikyx Emotes','Twitch Emotes for G2 Mikyx. Find them at twitch.tv/m1kyx ','2020-05-30','1920x1080',NULL),(9,'Rocket Cranny','Animal crossing VS Pokemon fanart commission','2020-05-30','1920x1080',NULL),(10,'TheZilax Emotes','Ekko themed emotes for TheZIlax. Find them at twitch.tv/thezilax','2020-05-30','1920x1080',NULL),(11,'Cyndaquill Fanart','Cyndaquil fanart for a Pokemon Mistery dungeon contest','2020-05-30','1920x1080',NULL),(12,'Bulbasaur & Ralts','Bulbasaur and Ralts lovers commission.','2020-05-30','1920x1080',NULL),(13,'Fortnite Emotes Pack','Fortnite Emotes Pack, get it for your own channel before its gone!','2020-05-30','1920x1080',15),(14,'CsGo Twitch Overlay','Twitch Overlay for FPS games like CsGO','2020-05-30','1920x1080',35),(15,'Wobbuffet Office','Wobbuffet in his office commission art.','2020-05-30','1920x1080',NULL),(16,'IlPrincipePapero Twitch Banner','Twitch banner for IlPrincipePapero.','2020-05-30','1920x1080',NULL);
/*!40000 ALTER TABLE `artwork` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artwork_category`
--

DROP TABLE IF EXISTS `artwork_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artwork_category` (
  `ArtworkID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  PRIMARY KEY (`ArtworkID`,`CategoryID`),
  KEY `fk_Artwork_Category_Artwork1_idx` (`ArtworkID`),
  KEY `fk_Artwork_Category_Category1_idx` (`CategoryID`),
  CONSTRAINT `fk_Artwork_Category_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Artwork_Category_Category1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artwork_category`
--

LOCK TABLES `artwork_category` WRITE;
/*!40000 ALTER TABLE `artwork_category` DISABLE KEYS */;
INSERT INTO `artwork_category` (`ArtworkID`, `CategoryID`) VALUES (1,2),(3,4),(4,1),(5,3),(5,4),(6,2),(7,1),(8,1),(9,4),(10,1),(11,4),(12,4),(13,1),(14,2),(15,4),(16,2);
/*!40000 ALTER TABLE `artwork_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `ArtworkID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`ArtworkID`,`UserID`),
  KEY `fk_Cart_Artwork1_idx` (`ArtworkID`),
  KEY `fk_Cart_User1_idx` (`UserID`),
  CONSTRAINT `fk_Cart_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cart_User1` FOREIGN KEY (`UserID`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Description` varchar(100) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`CategoryID`, `Name`, `Description`) VALUES (1,'Emotes','Personalized Emotes for various platforms'),(2,'Overlays & Panels','Twitch streaming Overlay and Panels'),(3,'Pokemon Fusion','Fan art fusion between 2 pokemon'),(4,'Artworks and Illustrations','Various illustration from commissions to works i did for my self');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commission`
--

DROP TABLE IF EXISTS `commission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commission` (
  `CommissionID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(250) NOT NULL,
  `Status` varchar(45) NOT NULL,
  `Priority` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`CommissionID`),
  KEY `fk_Commission_User1_idx` (`UserID`),
  CONSTRAINT `fk_Commission_User1` FOREIGN KEY (`UserID`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commission`
--

LOCK TABLES `commission` WRITE;
/*!40000 ALTER TABLE `commission` DISABLE KEYS */;
INSERT INTO `commission` (`CommissionID`, `Description`, `Status`, `Priority`, `UserID`) VALUES (3,'I would like some cool pokemon themes emotes','Pending',0,2);
/*!40000 ALTER TABLE `commission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dump`
--

DROP TABLE IF EXISTS `dump`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dump` (
  `C1` text,
  `C2` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dump`
--

LOCK TABLES `dump` WRITE;
/*!40000 ALTER TABLE `dump` DISABLE KEYS */;
INSERT INTO `dump` (`C1`, `C2`) VALUES ('-- MySQL dump 10.13  Distrib 5.7.26',' for Win64 (x86_64)'),('/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS',' UNIQUE_CHECKS=0 */;'),('/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS',' FOREIGN_KEY_CHECKS=0 */;'),('/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE',' SQL_MODE=\'NO_AUTO_VALUE_ON_ZERO\' */;'),('/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES',' SQL_NOTES=0 */;'),('  `ArtworkID` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `Name` varchar(45) NOT NULL',NULL),('  `Description` varchar(1000) NOT NULL',NULL),('  `ReleaseDate` date NOT NULL',NULL),('  `Size` varchar(45) NOT NULL',NULL),('  `price` float DEFAULT NULL',NULL),('  `ArtworkID` int(11) NOT NULL',NULL),('  `CategoryID` int(11) NOT NULL',NULL),('  KEY `fk_Artwork_Category_Artwork1_idx` (`ArtworkID`)',NULL),('  KEY `fk_Artwork_Category_Category1_idx` (`CategoryID`)',NULL),('  CONSTRAINT `fk_Artwork_Category_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION',NULL),('  `ArtworkID` int(11) NOT NULL',NULL),('  `UserID` int(11) NOT NULL',NULL),('  `User_id` int(11) NOT NULL',NULL),('  KEY `fk_Cart_Artwork1_idx` (`ArtworkID`)',NULL),('  KEY `fk_Cart_User1_idx` (`User_id`)',NULL),('  CONSTRAINT `fk_Cart_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION',NULL),('  `CategoryID` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `Name` varchar(45) NOT NULL',NULL),('  `Description` varchar(100) NOT NULL',NULL),('  `CommissionID` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `Description` varchar(250) NOT NULL',NULL),('  `Status` varchar(45) NOT NULL',NULL),('  `Priority` int(11) NOT NULL',NULL),('  `UserID` int(11) NOT NULL',NULL),('  PRIMARY KEY (`CommissionID`)',NULL),('  KEY `fk_Commission_User1_idx` (`UserID`)',NULL),('  `ImageID` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `ImageURL` varchar(100) NOT NULL',NULL),('  `ArtworkID` int(11) NOT NULL',NULL),('  PRIMARY KEY (`ImageID`)',NULL),('  KEY `fk_Images_Artwork1_idx` (`ArtworkID`)',NULL),('  `version` varchar(180) NOT NULL',NULL),('  `apply_time` int(11) DEFAULT NULL',NULL),('  `OrderID` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `DateTime` date NOT NULL',NULL),('  `Status` varchar(45) NOT NULL',NULL),('  `UserID` int(11) NOT NULL',NULL),('  `User_id` int(11) NOT NULL',NULL),('  PRIMARY KEY (`OrderID`)',NULL),('  KEY `fk_Order_User1_idx` (`User_id`)',NULL),('  `OrderID` int(11) NOT NULL',NULL),('  `ArtworkID` int(11) NOT NULL',NULL),('  `Amount` float NOT NULL',NULL),('  KEY `fk_OrderArtwork_Artwork1_idx` (`ArtworkID`)',NULL),('  KEY `fk_OrderArtwork_Order1_idx` (`OrderID`)',NULL),('  CONSTRAINT `fk_OrderArtwork_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION',NULL),('  `id` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `user_id` int(11) NOT NULL',NULL),('  `created_at` timestamp NULL DEFAULT NULL',NULL),('  `updated_at` timestamp NULL DEFAULT NULL',NULL),('  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `timezone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  PRIMARY KEY (`id`)',NULL),('  KEY `profile_user_id` (`user_id`)',NULL),('  `ReviewID` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `Rating` int(11) NOT NULL',NULL),('  `Description` varchar(45) DEFAULT NULL',NULL),('  `CommissionID` int(11) DEFAULT NULL',NULL),('  `ArtworkID` int(11) DEFAULT NULL',NULL),('  `UserID` int(11) NOT NULL',NULL),('  PRIMARY KEY (`ReviewID`)',NULL),('  KEY `fk_Review_Commission1_idx` (`CommissionID`)',NULL),('  KEY `fk_Review_Artwork1_idx` (`ArtworkID`)',NULL),('  KEY `fk_Review_User1_idx` (`UserID`)',NULL),('  CONSTRAINT `fk_Review_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION',NULL),('  CONSTRAINT `fk_Review_Commission1` FOREIGN KEY (`CommissionID`) REFERENCES `commission` (`CommissionID`) ON DELETE NO ACTION ON UPDATE NO ACTION',NULL),('  `id` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL',NULL),('  `created_at` timestamp NULL DEFAULT NULL',NULL),('  `updated_at` timestamp NULL DEFAULT NULL',NULL),('  `can_admin` smallint(6) NOT NULL DEFAULT \'0\'',NULL),('  `id` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `role_id` int(11) NOT NULL',NULL),('  `status` smallint(6) NOT NULL',NULL),('  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `auth_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `logged_in_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `logged_in_at` timestamp NULL DEFAULT NULL',NULL),('  `created_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `created_at` timestamp NULL DEFAULT NULL',NULL),('  `updated_at` timestamp NULL DEFAULT NULL',NULL),('  `banned_at` timestamp NULL DEFAULT NULL',NULL),('  `banned_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  PRIMARY KEY (`id`)',NULL),('  UNIQUE KEY `user_email` (`email`)',NULL),('  UNIQUE KEY `user_username` (`username`)',NULL),('  KEY `user_role_id` (`role_id`)',NULL),('  `id` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `user_id` int(11) NOT NULL',NULL),('  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL',NULL),('  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL',NULL),('  `provider_attributes` text COLLATE utf8_unicode_ci NOT NULL',NULL),('  `created_at` timestamp NULL DEFAULT NULL',NULL),('  `updated_at` timestamp NULL DEFAULT NULL',NULL),('  PRIMARY KEY (`id`)',NULL),('  KEY `user_auth_provider_id` (`provider_id`)',NULL),('  KEY `user_auth_user_id` (`user_id`)',NULL),('  `id` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `user_id` int(11) DEFAULT NULL',NULL),('  `type` smallint(6) NOT NULL',NULL),('  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL',NULL),('  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `created_at` timestamp NULL DEFAULT NULL',NULL),('  `expired_at` timestamp NULL DEFAULT NULL',NULL),('  PRIMARY KEY (`id`)',NULL),('  UNIQUE KEY `user_token_token` (`token`)',NULL),('  KEY `user_token_user_id` (`user_id`)',NULL);
/*!40000 ALTER TABLE `dump` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dump_1`
--

DROP TABLE IF EXISTS `dump_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dump_1` (
  `C1` text,
  `C2` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dump_1`
--

LOCK TABLES `dump_1` WRITE;
/*!40000 ALTER TABLE `dump_1` DISABLE KEYS */;
INSERT INTO `dump_1` (`C1`, `C2`) VALUES ('-- MySQL dump 10.13  Distrib 5.7.26',' for Win64 (x86_64)'),('/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS',' UNIQUE_CHECKS=0 */;'),('/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS',' FOREIGN_KEY_CHECKS=0 */;'),('/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE',' SQL_MODE=\'NO_AUTO_VALUE_ON_ZERO\' */;'),('/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES',' SQL_NOTES=0 */;'),('  `ArtworkID` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `Name` varchar(45) NOT NULL',NULL),('  `Description` varchar(1000) NOT NULL',NULL),('  `ReleaseDate` date NOT NULL',NULL),('  `Size` varchar(45) NOT NULL',NULL),('  `price` float DEFAULT NULL',NULL),('  `ArtworkID` int(11) NOT NULL',NULL),('  `CategoryID` int(11) NOT NULL',NULL),('  KEY `fk_Artwork_Category_Artwork1_idx` (`ArtworkID`)',NULL),('  KEY `fk_Artwork_Category_Category1_idx` (`CategoryID`)',NULL),('  CONSTRAINT `fk_Artwork_Category_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION',NULL),('  `ArtworkID` int(11) NOT NULL',NULL),('  `UserID` int(11) NOT NULL',NULL),('  `User_id` int(11) NOT NULL',NULL),('  KEY `fk_Cart_Artwork1_idx` (`ArtworkID`)',NULL),('  KEY `fk_Cart_User1_idx` (`User_id`)',NULL),('  CONSTRAINT `fk_Cart_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION',NULL),('  `CategoryID` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `Name` varchar(45) NOT NULL',NULL),('  `Description` varchar(100) NOT NULL',NULL),('  `CommissionID` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `Description` varchar(250) NOT NULL',NULL),('  `Status` varchar(45) NOT NULL',NULL),('  `Priority` int(11) NOT NULL',NULL),('  `UserID` int(11) NOT NULL',NULL),('  PRIMARY KEY (`CommissionID`)',NULL),('  KEY `fk_Commission_User1_idx` (`UserID`)',NULL),('  `ImageID` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `ImageURL` varchar(100) NOT NULL',NULL),('  `ArtworkID` int(11) NOT NULL',NULL),('  PRIMARY KEY (`ImageID`)',NULL),('  KEY `fk_Images_Artwork1_idx` (`ArtworkID`)',NULL),('  `version` varchar(180) NOT NULL',NULL),('  `apply_time` int(11) DEFAULT NULL',NULL),('  `OrderID` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `DateTime` date NOT NULL',NULL),('  `Status` varchar(45) NOT NULL',NULL),('  `UserID` int(11) NOT NULL',NULL),('  `User_id` int(11) NOT NULL',NULL),('  PRIMARY KEY (`OrderID`)',NULL),('  KEY `fk_Order_User1_idx` (`User_id`)',NULL),('  `OrderID` int(11) NOT NULL',NULL),('  `ArtworkID` int(11) NOT NULL',NULL),('  `Amount` float NOT NULL',NULL),('  KEY `fk_OrderArtwork_Artwork1_idx` (`ArtworkID`)',NULL),('  KEY `fk_OrderArtwork_Order1_idx` (`OrderID`)',NULL),('  CONSTRAINT `fk_OrderArtwork_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION',NULL),('  `id` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `user_id` int(11) NOT NULL',NULL),('  `created_at` timestamp NULL DEFAULT NULL',NULL),('  `updated_at` timestamp NULL DEFAULT NULL',NULL),('  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `timezone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  PRIMARY KEY (`id`)',NULL),('  KEY `profile_user_id` (`user_id`)',NULL),('  `ReviewID` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `Rating` int(11) NOT NULL',NULL),('  `Description` varchar(45) DEFAULT NULL',NULL),('  `CommissionID` int(11) DEFAULT NULL',NULL),('  `ArtworkID` int(11) DEFAULT NULL',NULL),('  `UserID` int(11) NOT NULL',NULL),('  PRIMARY KEY (`ReviewID`)',NULL),('  KEY `fk_Review_Commission1_idx` (`CommissionID`)',NULL),('  KEY `fk_Review_Artwork1_idx` (`ArtworkID`)',NULL),('  KEY `fk_Review_User1_idx` (`UserID`)',NULL),('  CONSTRAINT `fk_Review_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION',NULL),('  CONSTRAINT `fk_Review_Commission1` FOREIGN KEY (`CommissionID`) REFERENCES `commission` (`CommissionID`) ON DELETE NO ACTION ON UPDATE NO ACTION',NULL),('  `id` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL',NULL),('  `created_at` timestamp NULL DEFAULT NULL',NULL),('  `updated_at` timestamp NULL DEFAULT NULL',NULL),('  `can_admin` smallint(6) NOT NULL DEFAULT \'0\'',NULL),('  `id` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `role_id` int(11) NOT NULL',NULL),('  `status` smallint(6) NOT NULL',NULL),('  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `auth_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `logged_in_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `logged_in_at` timestamp NULL DEFAULT NULL',NULL),('  `created_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `created_at` timestamp NULL DEFAULT NULL',NULL),('  `updated_at` timestamp NULL DEFAULT NULL',NULL),('  `banned_at` timestamp NULL DEFAULT NULL',NULL),('  `banned_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  PRIMARY KEY (`id`)',NULL),('  UNIQUE KEY `user_email` (`email`)',NULL),('  UNIQUE KEY `user_username` (`username`)',NULL),('  KEY `user_role_id` (`role_id`)',NULL),('  `id` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `user_id` int(11) NOT NULL',NULL),('  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL',NULL),('  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL',NULL),('  `provider_attributes` text COLLATE utf8_unicode_ci NOT NULL',NULL),('  `created_at` timestamp NULL DEFAULT NULL',NULL),('  `updated_at` timestamp NULL DEFAULT NULL',NULL),('  PRIMARY KEY (`id`)',NULL),('  KEY `user_auth_provider_id` (`provider_id`)',NULL),('  KEY `user_auth_user_id` (`user_id`)',NULL),('  `id` int(11) NOT NULL AUTO_INCREMENT',NULL),('  `user_id` int(11) DEFAULT NULL',NULL),('  `type` smallint(6) NOT NULL',NULL),('  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL',NULL),('  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL',NULL),('  `created_at` timestamp NULL DEFAULT NULL',NULL),('  `expired_at` timestamp NULL DEFAULT NULL',NULL),('  PRIMARY KEY (`id`)',NULL),('  UNIQUE KEY `user_token_token` (`token`)',NULL),('  KEY `user_token_user_id` (`user_id`)',NULL);
/*!40000 ALTER TABLE `dump_1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `ImageID` int(11) NOT NULL AUTO_INCREMENT,
  `ImageURL` varchar(100) NOT NULL,
  `ArtworkID` int(11) NOT NULL,
  PRIMARY KEY (`ImageID`),
  KEY `fk_Images_Artwork1_idx` (`ArtworkID`),
  CONSTRAINT `fk_Images_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`ImageID`, `ImageURL`, `ArtworkID`) VALUES (1,'../Themes/images/art/Graphics_Set.jpg',1),(2,'../Themes/images/art/PokemonBG.jpg',3),(3,'../Themes/images/art/IgCalsEmotes.jpg',4),(4,'../Themes/images/art/Lucario_+_Gallade.jpg',5),(5,'../Themes/images/art/Graphics_Set (1).jpg',6),(7,'../Themes/images/art/Bulbasaur___Ralts.jpg',12),(8,'../Themes/images/art/Mystery on test.jpeg',11),(9,'../Themes/images/art/Fortunate Emotes.jpg',13),(10,'../Themes/images/art/Fortunate Emotes.jpg',13),(11,'../Themes/images/art/IgMikyx.jpg',8),(12,'../Themes/images/art/RocketCranny.JPG',9),(13,'../Themes/images/art/SnomEmotes.jpg',7),(14,'../Themes/images/art/EkkoEmotes.jpg',10),(15,'../Themes/images/art/CsGo.jpg',14),(16,'../Themes/images/art/CsGo (1).jpg',14),(17,'../Themes/images/art/CsGo (2).jpg',14),(18,'../Themes/images/art/Papero.jpg',16),(19,'../Themes/images/art/Light Background .jpg',15),(20,'../Themes/images/art/Trasparent for merch.png',15),(21,'../Themes/images/art/Dark Background .jpg',15);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES ('m000000_000000_base',1588940751),('m150214_044831_init_user',1588940753);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `DateTime` datetime NOT NULL,
  `Status` varchar(45) NOT NULL,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `fk_Order_User1_idx` (`UserID`),
  CONSTRAINT `fk_Order_User1` FOREIGN KEY (`UserID`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` (`OrderID`, `DateTime`, `Status`, `UserID`) VALUES (6,'2020-05-19 11:28:50','Payment Pending',1),(7,'2020-05-20 15:03:08','Payment Pending',1),(8,'2020-05-22 20:17:14','Payment Pending',2),(9,'2020-05-27 14:10:44','Payment Pending',5),(10,'2020-05-28 18:45:10','Payment Pending',2);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderartwork`
--

DROP TABLE IF EXISTS `orderartwork`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderartwork` (
  `OrderID` int(11) NOT NULL,
  `ArtworkID` int(11) NOT NULL,
  `Amount` float NOT NULL,
  PRIMARY KEY (`OrderID`,`ArtworkID`),
  KEY `fk_OrderArtwork_Artwork1_idx` (`ArtworkID`),
  KEY `fk_OrderArtwork_Order1_idx` (`OrderID`),
  CONSTRAINT `fk_OrderArtwork_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_OrderArtwork_Order1` FOREIGN KEY (`OrderID`) REFERENCES `order` (`OrderID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderartwork`
--

LOCK TABLES `orderartwork` WRITE;
/*!40000 ALTER TABLE `orderartwork` DISABLE KEYS */;
INSERT INTO `orderartwork` (`OrderID`, `ArtworkID`, `Amount`) VALUES (6,3,12),(6,5,12),(7,5,12),(8,3,5),(9,3,5),(10,5,12);
/*!40000 ALTER TABLE `orderartwork` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_user_id` (`user_id`),
  CONSTRAINT `profile_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`id`, `user_id`, `created_at`, `updated_at`, `full_name`, `timezone`) VALUES (1,1,'2020-05-08 11:25:53','2020-05-31 13:34:11','Admin','Pacific/Midway'),(2,2,'2020-05-08 12:07:37','2020-05-16 07:56:48','A Jonker',NULL),(5,5,'2020-05-27 13:08:08','2020-05-27 13:08:08','Anabela Jonker',NULL),(7,7,'2020-05-31 13:28:47','2020-05-31 13:28:47','Richard Jonker',NULL),(8,8,'2020-05-31 13:32:55','2020-05-31 13:32:55','Paolo Cagol',NULL),(9,9,'2020-05-31 13:33:44','2020-05-31 13:33:44','Roshan Poudel',NULL),(10,10,'2020-05-31 13:36:20','2020-05-31 13:36:20','Nathalie',NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL AUTO_INCREMENT,
  `Rating` int(11) NOT NULL,
  `Description` varchar(45) DEFAULT NULL,
  `CommissionID` int(11) DEFAULT NULL,
  `ArtworkID` int(11) DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`ReviewID`),
  KEY `fk_Review_Commission1_idx` (`CommissionID`),
  KEY `fk_Review_Artwork1_idx` (`ArtworkID`),
  KEY `fk_Review_User1_idx` (`UserID`),
  CONSTRAINT `fk_Review_Artwork1` FOREIGN KEY (`ArtworkID`) REFERENCES `artwork` (`ArtworkID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Review_Commission1` FOREIGN KEY (`CommissionID`) REFERENCES `commission` (`CommissionID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Review_User1` FOREIGN KEY (`UserID`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` (`ReviewID`, `Rating`, `Description`, `CommissionID`, `ArtworkID`, `UserID`) VALUES (1,2,'Cool',NULL,3,2),(12,5,'Cool',NULL,3,1),(21,4,'Cool piece of art',NULL,3,5),(22,4,'Very fun Design',NULL,12,8),(23,3,'',NULL,14,2),(24,4,'such a cool fanart!',NULL,11,10),(25,5,'i love fortnite, and these emotes are better',NULL,13,2),(26,5,'',NULL,4,2),(27,5,'Love my Banner',NULL,16,8),(28,4,'',NULL,8,9),(29,5,'How cute is this',NULL,15,9),(30,5,'',NULL,7,10),(31,3,'',NULL,11,10),(32,3,'',NULL,10,8),(33,5,'',NULL,8,1),(34,5,'Nice little art',NULL,9,5),(35,5,'',NULL,5,8),(36,4,'',NULL,1,9),(37,4,'Thanks',3,NULL,2);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_admin` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`, `can_admin`) VALUES (1,'Admin','2020-05-08 11:25:53',NULL,1),(2,'User','2020-05-08 11:25:53',NULL,0);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_at` timestamp NULL DEFAULT NULL,
  `created_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  `banned_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`email`),
  UNIQUE KEY `user_username` (`username`),
  KEY `user_role_id` (`role_id`),
  CONSTRAINT `user_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `role_id`, `status`, `email`, `username`, `password`, `auth_key`, `access_token`, `logged_in_ip`, `logged_in_at`, `created_ip`, `created_at`, `updated_at`, `banned_at`, `banned_reason`) VALUES (1,1,1,'neo@neo.com','neo','$2y$13$dyVw4WkZGkABf2UrGWrhHO4ZmVBv.K4puhOL59Y9jQhIdj63TlV.O','9eG4jF8Pw-OMzLRjZ79rR8AQPFJl9smF','UFMRtCVyH5JY6jPQ_AzW8rgrw3JWrJcG','::1','2020-06-02 15:14:14',NULL,'2020-05-08 11:25:53','2020-05-31 13:34:11',NULL,NULL),(2,2,1,'richardjonker2000alt@gmail.com','test','$2y$13$h5o4eaANzYX9GfamZLTAvubrE/8e0OvbTDPo/YBxKy1ZupVTjVNty','BRQoPx7ZbNgPZ7546svK7mQdw-_z4DQl','2IZULolD4vtABKn-FtwPfe04KartqiQB','::1','2020-06-02 15:19:53','::1','2020-05-08 12:07:37','2020-05-31 13:17:43',NULL,NULL),(5,2,1,'anabelajonker@yahoo.com','belaj','$2y$13$IUH49C3xnNlv7bIcIqEXCudeF0pzEEPsBBdRsRXpdolpRE2s0rIoK','NT5uD_F49NKVZSS94XAAiq91fYMn5d01','YUc-qx-b1O9FeKJmiob7xlWHqir7kp3u','::1','2020-05-27 13:09:44','::1','2020-05-27 13:08:08','2020-05-27 13:08:08',NULL,NULL),(7,2,1,'richardjonker2000@gmail.com','richardjonker','$2y$13$36Q6.L1O1VulwRVbMn2oGun7yjZTEMyP3ibdnwVBNcrTcVbqkYs4i','ynmRqml7SE76B9FIjSRuKk79yKwiVj-t','Nlfq_trcQwi6qls1xTkK7Lstk0OuxUWR',NULL,NULL,'::1','2020-05-31 13:28:47','2020-05-31 13:28:47',NULL,NULL),(8,2,1,'cagol.paolo@gmail.com','paolo','$2y$13$q2OOeg8oSUc7HVuOPLRyke5n3Tc8n0hxJ5SY0UOZlyydRncf0qGGu',NULL,NULL,NULL,NULL,NULL,'2020-05-31 13:32:55','2020-05-31 13:32:55',NULL,NULL),(9,2,1,'pdlroshan@gmail.com','gundruke','$2y$13$gx8qbMikMekuqU1MfsUETufLR0UXfqJfaE4KvUxicyzIuD7wBI77C',NULL,NULL,NULL,NULL,NULL,'2020-05-31 13:33:44','2020-05-31 13:33:44',NULL,NULL),(10,2,1,'nat@gmail.com','joao_nat','$2y$13$efwR9xWyCTsGXEYRMpzuyuVAB4eMUcyrI8s24KiVHGLHKQVaDESVG',NULL,NULL,NULL,NULL,NULL,'2020-05-31 13:36:20','2020-05-31 13:36:20',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_auth`
--

DROP TABLE IF EXISTS `user_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_attributes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_auth_provider_id` (`provider_id`),
  KEY `user_auth_user_id` (`user_id`),
  CONSTRAINT `user_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_auth`
--

LOCK TABLES `user_auth` WRITE;
/*!40000 ALTER TABLE `user_auth` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_token`
--

DROP TABLE IF EXISTS `user_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_token_token` (`token`),
  KEY `user_token_user_id` (`user_id`),
  CONSTRAINT `user_token_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_token`
--

LOCK TABLES `user_token` WRITE;
/*!40000 ALTER TABLE `user_token` DISABLE KEYS */;
INSERT INTO `user_token` (`id`, `user_id`, `type`, `token`, `data`, `created_at`, `expired_at`) VALUES (10,2,2,'kiyizVkvqSxgApMsFbzKo0lR5W9H4NdC',NULL,'2020-05-12 10:10:34',NULL);
/*!40000 ALTER TABLE `user_token` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-02 17:25:51
