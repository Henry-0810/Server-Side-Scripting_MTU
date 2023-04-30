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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Finance','Responsible of company assets',604600.00),(2,'Information Technology','Responsible of IT development',2412000.00),(3,'Business','Responsible of business plans',1100350.00),(4,'Human Resource','helps company to acquire new resource',540000.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'Henry','Finance Analyst',27,11000.00,1),(2,'Kevin','Data Scientist',26,12000.00,2),(3,'Adrian','Business Analyst',26,9000.00,3),(4,'Jack','Marketing team',22,4500.00,3),(5,'Jason','Marketing team',23,4700.00,3),(6,'Rose','Brand Manager',27,10000.00,3),(7,'Anne','Software Tester',30,7500.00,2),(8,'Phoebe','Sales Manager',27,7500.00,3),(9,'John','Finance Clerk',25,6500.00,1),(10,'Lex','Auditor',34,16000.00,1),(11,'Rachel','Business Consultant',21,8000.00,3),(12,'Ross','Scrum Master',21,12000.00,2),(13,'Jackson','Software Engineer',28,8000.00,2),(14,'Chandler','Data Analyst',20,5700.00,2),(15,'Monica','Marketing team',24,5000.00,3),(16,'Joey','Financial Advisor',29,7000.00,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ledgers`
--

LOCK TABLES `ledgers` WRITE;
/*!40000 ALTER TABLE `ledgers` DISABLE KEYS */;
INSERT INTO `ledgers` VALUES (1,'Monthly rent payment','2023-04-01 12:00:00',1,7500.00,'C'),(2,'Government fund','2023-03-25 09:30:00',2,750000.00,'D'),(3,'Bonus to stock brokers','2023-03-15 16:00:00',1,50000.00,'C'),(4,'Client payment received','2023-02-28 14:15:00',3,8000.00,'D'),(5,'Purchase of new equipment','2023-02-15 10:00:00',2,5000.00,'C'),(6,'Travel reimbursement for employee','2023-01-31 13:45:00',1,200.00,'C'),(7,'Client payment received','2023-03-01 17:10:00',2,2500.00,'D'),(8,'Client payment received','2023-04-06 18:40:00',3,4000.00,'D'),(9,'Client payment received','2023-02-07 08:00:00',1,8000.00,'D'),(10,'Purchase of software licenses','2023-04-20 10:30:00',2,15000.00,'C'),(11,'Sales revenue received','2023-04-10 14:00:00',3,50000.00,'D'),(12,'Rental payment for office space','2023-01-05 09:00:00',1,12000.00,'C'),(13,'Purchase of new server equipment','2023-03-20 11:00:00',2,25000.00,'C'),(14,'Client payment received','2023-04-02 16:30:00',3,10000.00,'D'),(15,'Reimbursement for employee training expenses','2023-04-15 13:45:00',1,5000.00,'C'),(16,'Client payment received','2023-03-05 17:10:00',3,3000.00,'D'),(17,'Advertisement','2023-04-11 18:00:00',3,950.00,'C'),(18,'Paid 3000 on a laptop','2023-03-27 16:45:00',2,3000.00,'C'),(19,'Trade stocks','2023-02-27 18:13:00',1,12000.00,'C'),(20,'Monthly Income','2023-04-03 02:19:00',4,90000.00,'D');
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

-- Dump completed on 2023-05-01  0:51:34
