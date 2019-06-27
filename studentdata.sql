/*
SQLyog Community v11.3 (32 bit)
MySQL - 10.1.9-MariaDB : Database - studentdata
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`studentdata` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `studenttable` */

DROP TABLE IF EXISTS `studenttable`;

CREATE TABLE `studenttable` (
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  `batchname` int(99) DEFAULT NULL,
  `name` tinytext,
  `email` varchar(99) DEFAULT NULL,
  `contactnumber` int(99) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `filenames` varchar(99) DEFAULT NULL,
  UNIQUE KEY `slno` (`slno`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `studenttable` */

LOCK TABLES `studenttable` WRITE;

insert  into `studenttable`(`slno`,`batchname`,`name`,`email`,`contactnumber`,`active`,`filenames`) values (31,2017,'asd','1992robsonjohny@gmail.com',3,1,'Penguins.jpg'),(32,2017,'asd','1992robsonjohny@gmail.com',32,1,'Jellyfish.jpg,Lighthouse.jpg'),(33,2017,'asd','daaaa',3,1,'Jellyfish.jpg,Lighthouse.jpg');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
