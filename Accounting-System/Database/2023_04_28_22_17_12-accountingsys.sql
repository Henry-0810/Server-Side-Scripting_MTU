-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: accountingsys
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `dept_ID` tinyint(3) NOT NULL AUTO_INCREMENT,
  `dept_Name` varchar(30) NOT NULL,
  `dept_Desc` varchar(80) NOT NULL,
  `dept_Bal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`dept_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Finance','Responsible of company\'s assets',19500.00),(2,'Information Technology','Responsible of IT development',800000.00),(3,'Business','Responsible of business plans',1000000.00);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `employee_NO` tinyint(4) NOT NULL AUTO_INCREMENT,
  `employee_Name` varchar(20) NOT NULL,
  `Job` varchar(30) NOT NULL,
  `Age` tinyint(2) NOT NULL,
  `Salary` decimal(8,2) NOT NULL,
  `dept_ID` tinyint(3) NOT NULL,
  PRIMARY KEY (`employee_NO`),
  KEY `dept_ID` (`dept_ID`),
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`dept_ID`) REFERENCES `departments` (`dept_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Henry','Finance Analyst',27,11000.00,1),(2,'Kevin','Data Scientist',26,12000.00,2),(3,'Adrian','Business Analyst',26,8000.00,3),(4,'Jack','Marketing team',22,4500.00,3),(5,'Jason','Marketing team',23,4700.00,3),(6,'Rose','Brand Manager',27,10000.00,3),(7,'Anne','Software Tester',30,7500.00,2),(8,'Phoebe','Sales Manager',27,7500.00,3),(9,'John','Finance Clerk',25,6500.00,1),(10,'Lex','Auditor',34,16000.00,1);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ledgers`
--

DROP TABLE IF EXISTS `ledgers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ledgers` (
  `ledger_ID` tinyint(3) NOT NULL AUTO_INCREMENT,
  `ledger_Particulars` varchar(600) NOT NULL,
  `created_On` datetime NOT NULL,
  `dept_ID` tinyint(3) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `transaction_type` enum('D','C') DEFAULT NULL,
  PRIMARY KEY (`ledger_ID`),
  KEY `dept_ID` (`dept_ID`),
  CONSTRAINT `ledgers_ibfk_1` FOREIGN KEY (`dept_ID`) REFERENCES `departments` (`dept_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ledgers`
--

LOCK TABLES `ledgers` WRITE;
/*!40000 ALTER TABLE `ledgers` DISABLE KEYS */;
INSERT INTO `ledgers` VALUES (1,'Advertisement','2023-04-11 18:00:00',3,750.00,'C'),(2,'Paid 3000 on a laptop','2023-03-27 16:45:00',2,3000.00,'C'),(3,'Test','2023-03-27 18:13:00',1,10000.00,'C'),(4,'Test1','2023-03-29 19:14:00',1,12000.00,'D');
/*!40000 ALTER TABLE `ledgers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-28 22:17:12
