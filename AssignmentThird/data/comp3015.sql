-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `logins`
--

DROP TABLE IF EXISTS `logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logins`
--

LOCK TABLES `logins` WRITE;
/*!40000 ALTER TABLE `logins` DISABLE KEYS */;
INSERT INTO `logins` VALUES (1,'1231231234','admin123','Admin','Admin',NULL,1);
/*!40000 ALTER TABLE `logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `comment` text,
  `priority` int(1) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Gary','Tong','Cras nisl ligula','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac aliquet metus, id congue tortor. Pellentesque blandit ex in bibendum cursus. Phasellus dapibus augue nisl, feugiat scelerisque nisi finibus non. Curabitur hendrerit nisi nec urna sollicitudin, eu ultricies ipsum maximus. Ut ac nibh sit amet turpis malesuada dapibus eget a turpis. Sed gravida ultrices tortor at consequat. Aenean molestie tincidunt orci, dignissim luctus libero ullamcorper et. Pellentesque blandit odio vitae ultricies varius. Aenean laoreet quam lectus, eget convallis sapien dictum sed. Duis nec sodales leo, et sollicitudin arcu. Donec varius risus in ex efficitur, id interdum lorem bibendum. Pellentesque sed eros rhoncus, facilisis urna eget, lobortis nibh.',3,'nyc.jpg','1481808630'),(2,'President','Obama','Another Justo','Duis ut commodo libero. Etiam luctus vestibulum mauris, in scelerisque erat tincidunt sed. Proin elit massa, rutrum ut lacus a, congue mattis turpis. Nunc dui lorem, lobortis sit amet ullamcorper ut, volutpat non metus. Morbi tristique ex eget interdum convallis. Proin et venenatis arcu. Phasellus vitae efficitur neque. Nam leo enim, efficitur in ipsum ut, facilisis egestas urna. In arcu lorem, eleifend vel tortor ac, eleifend fringilla leo.',1,'nyc.jpg   ','1481808630'),(3,'John','Doe','Etiam dolor ipsum','Nunc malesuada sapien et tincidunt sagittis. Nunc luctus purus augue, sed efficitur enim vulputate quis. ',1,' nyc.jpg','1481808630'),(4,'Jane','Doe','A title','Suspendisse id eleifend mi. Nulla mi justo, consequat sed est a, sollicitudin mattis nibh. Suspendisse sodales aliquam lectus a ullamcorper. ',1,NULL,'1481808630'),(5,'Doe',NULL,'A title','Nunc dignissim erat ac aliquet condimentum. Cras nisl ligula, viverra et massa non, vulputate dapibus velit.',1,'nyc.jpg','1481808630'),(6,'Miller',NULL,'ipsum','Cras nec lectus risus. Etiam felis lectus, hendrerit nec est a, vehicula finibus mauris. Phasellus rutrum nibh sit amet tempor consectetur. Nullam mattis, mauris ac iaculis sagittis, felis eros finibus nibh, non feugiat mauris nibh in diam. In euismod massa quam, vel tristique nisi bibendum vel.',1,'nyc.jpg',NULL),(7,'Donald','Trump','A bad person','In commodo odio id ipsum lobortis luctus. Duis vitae metus et lacus imperdiet iaculis non ultrices erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ultricies risus nec sagittis rhoncus. Mauris porta mauris quis magna placerat, ac dapibus arcu consequat. Sed sit amet turpis convallis tortor euismod luctus sit amet eu lorem. Sed at tellus ac arcu mattis molestie. Ut finibus justo et ligula porta elementum. Sed faucibus nisi quis orci cursus, congue iaculis arcu gravida. Nullam sit amet condimentum dolor, ut rhoncus nulla. Nullam eget varius augue, quis viverra felis. Donec varius dolor ut nibh mattis facilisis. Aenean pulvinar, mi ut vulputate sodales, felis ipsum blandit libero, eget tempus velit neque et tortor. Proin laoreet ipsum eu nisl aliquet pulvinar.',1,'nyc.jpg','1481808630'),(8,'Harry','Potter','Wizard','Sed sit amet turpis convallis tortor euismod luctus sit amet eu lorem. Sed at tellus ac arcu mattis molestie. Ut finibus justo et ligula porta el Donec varius dolor ut nibh mattis facilisis. Aenean pulvinar, mi ut vulputate sodales, felis ipsum blandit libero, eget tempus velit neque et tortor. Proin laoreet ipsum eu nisl aliquet pulvinar.',2,'nyc.jpg','1481808630'),(9,'Jane','Smith','Simple','Just a simple sentence.',2,'7e23dbd93ba9f0a206f029cd4adc1bfd.jpg','1488830741');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-25 21:40:53
