-- MySQL dump 10.13  Distrib 5.6.41, for Linux (x86_64)
--
-- Host: localhost    Database: pnpdb
-- ------------------------------------------------------
-- Server version	5.6.41

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
-- Table structure for table `Places`
--

DROP TABLE IF EXISTS `Places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Places` (
  `Username` varchar(255) NOT NULL,
  `StreetNumber` int(11) NOT NULL,
  `StreetName` varchar(255) NOT NULL,
  `ApartmentNumber` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Province` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `PostalCode` varchar(255) NOT NULL,
  `TypeOfSpace` varchar(255) NOT NULL,
  `Desciption` varchar(255) NOT NULL,
  `PricePerNight` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Pets` int(11) NOT NULL,
  `Alcohol` int(11) NOT NULL,
  `Wheelchair` int(11) NOT NULL,
  `Smoking` int(11) NOT NULL,
  `OutdoorAccess` int(11) NOT NULL,
  `Availabilities` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Places`
--

LOCK TABLES `Places` WRITE;
/*!40000 ALTER TABLE `Places` DISABLE KEYS */;
INSERT INTO `Places` VALUES ('jdoe',6817,'43e Av','0','Montreal','Quebec','Canada','H1T2R9','Home','Large Victorian House',100,5,0,1,1,1,1,1),('jdoe',7503,'Rue St Denis','0','Montreal','Quebec','Canada','H2R2E7','Home','3 Floor Apartment Home',400,3,0,0,0,1,0,1),('jdoe',251,'Av Percival','0','Montreal','Quebec','Canada','H4X1T8','Home','Architectural Marvel',250,4,0,1,0,1,0,1),('dgand',7766,'George Street','2','Montreal','Quebec','Canada','H8P1E1','Porch','Big deck on back of apartment',80,4,0,1,0,1,0,1),('dgand',11727,'Rue Notre Dame E','20','Montreal','Quebec','Canada','H1B2X8','Apartment','Top Floor Apartment',34,3,0,0,0,0,0,0),('dgand',5745,'17 Av','1','Montreal','Quebec','Canada','H1X2R7','Apartment','Simple Montreal Apartment',100,5,1,1,1,1,1,1),('dgand',3708,'Rue St Hubert','3','Montreal','Quebec','Canada','H2L4A2','Apartment','Simple Montreal Apartment',100,5,0,1,0,1,0,1),('bilbo',800,'Rue Gagne Lasalle','0','Montreal','Quebec','Canada','H8P3W3','Yard','Big Green Yard with Trees',300,4,1,1,0,1,1,0),('frodo',4430,'St Catherine Ouest','0','Montreal','Quebec','Canada','H3Z3E4','Apartment','Small chill compact apartment',200,3,0,1,0,1,0,0),('frodo',5930,'Rue Hurteau','4','Montreal','Quebec','Canada','H4E2Y2','Basement','Big open basement',100,5,0,1,0,1,0,0),('gandalf',717,'Charron Street','3','Montreal','Quebec','Canada','H8P3T8','Loft','Huge views of Mont Royal',300,5,1,1,1,1,1,0),('gandalf',2630,'St Germain Street','2','Montreal','Quebec','Canada','H1W2V3','Loft','Views of the St Lawrence',500,5,0,0,0,0,1,1),('oprah',6730,'44av','0','Montreal','Quebec','Canada','H1T2P2','Penthouse','Downtown Views',800,4,0,1,1,1,0,1),('oprah',1940,'Jolicouer Street','0','Montreal','Quebec','Canada','H4E4M2','Warehouse','Industry views and lots of concrete',350,4,0,0,0,0,0,1),('oprah',16,'Kenaston Av','0','Montreal','Quebec','Canada','H3R1L8','Rooftop','Skyline view of downtown with a grill',200,4,0,1,0,1,1,0),('oprah',5240,'Randall Av','0','Montreal','Quebec','Canada','H4V2V3','Club','Typical club',1000,5,0,1,0,1,1,0),('catniss',3555,'Edouard-Montpetit','0','Montreal','Quebec','Canada','H3T1K7','Home','Basic Surburban Home',100,3,1,1,1,1,1,1);
/*!40000 ALTER TABLE `Places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `Username` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `NumOfRatings` int(11) NOT NULL,
  `Gender` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Birthdate` int(11) NOT NULL,
  `NumOfPlaces` int(11) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES ('bilbo','Bilbo','Baggins','bobag@shire.com','bilbopass',2147483647,5,50,0,'From Middle Earth',18000101,1),('catniss','Catniss','Everdeen','catniss@hugames.com','catnisspass',2147483647,5,888,1,'From District 13',20500923,1),('dgand','Doug','Anderson','dgand@yahoo.com','dougpass',2147483647,3,12,0,'From space',19961201,4),('frodo','Frodo','Baggins','frodo@shire.com','frodopass',2147483647,2,2,0,'From Middle Earth',18800203,2),('gandalf','Gandalf','Greybeard','gandalf@wizard.com','gandalfpass',2147483647,5,80,0,'From Beyond',12000505,2),('jdoe','Jane','Doe','doe@gmail.com','janepass',2147483647,4,22,1,'From the internet',20010810,3),('oprah','Oprah','Winefry','oprah@winefry.com','oprahpass',2147483647,4,37,1,'From Chicago',19640312,4);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-14  2:57:11
