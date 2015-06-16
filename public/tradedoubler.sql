/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.1.73 : Database - tradedoubler
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tradedoubler` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `tradedoubler`;

/*Table structure for table `accounts` */

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('admin','agent') COLLATE utf8_unicode_ci DEFAULT 'agent',
  `status` int(11) DEFAULT NULL,
  `created_day` int(11) DEFAULT NULL,
  `modified_day` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `accounts` */

insert  into `accounts`(`id`,`name`,`type`,`status`,`created_day`,`modified_day`) values (3,'admin','admin',1,235,23523),(6,'agent1','agent',1,1433716441,1433716441);

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `groups` */

/*Table structure for table `groups_permissions` */

DROP TABLE IF EXISTS `groups_permissions`;

CREATE TABLE `groups_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `groups_permissions` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permissions` */

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `unique_id_ordernumber` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `merchantId` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `programma_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `programa_prepayment_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_of_visit` datetime DEFAULT NULL,
  `time_in_session` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_last_modified` datetime DEFAULT NULL,
  `evento_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `elem_grafico_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `commission` float DEFAULT NULL,
  `epi` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`unique_id_ordernumber`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`unique_id_ordernumber`,`merchantId`,`date`,`programma_name`,`programa_prepayment_status`,`time_of_visit`,`time_in_session`,`time_last_modified`,`evento_name`,`reason`,`site_name`,`elem_grafico_name`,`custom_id`,`status`,`amount`,`commission`,`epi`) values (5,'A9223372035874324773',20126,'2015-04-29 20:20:29','\nHotels.com [IT]','Ok','2015-04-29 20:13:49','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',840,84,'1'),(6,'A9223372035873900776',20126,'2015-04-30 18:06:40','\nHotels.com [IT]','Ok','2015-04-30 17:57:03','Y','2015-05-19 17:47:30','Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'confirmed',44,4.4,'2'),(7,'A9223372035872323399',20126,'2015-05-04 19:06:14','\nHotels.com [IT]','Ok','2015-05-04 18:57:38','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',510,51,'3'),(8,'A9223372035870820788',20126,'2015-05-07 19:20:53','\nHotels.com [IT]','Ok','2015-05-07 19:17:28','Y','2015-05-19 17:39:07','Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'confirmed',390,39,'1'),(9,'A9223372035868233918',20126,'2015-05-13 17:23:11','\nHotels.com [IT]','Ok','2015-05-13 17:19:14','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',6.37,0.64,'2'),(10,'A9223372035867257417',20126,'2015-05-15 17:27:00','\nHotels.com [IT]','Ok','2015-05-15 17:20:00','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',618.91,61.89,'5'),(11,'A9223372035866137913',20126,'2015-05-18 13:14:48','\nHotels.com [IT]','Ok','2015-05-18 13:10:39','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',13.51,1.35,NULL),(12,'A9223372035865655653',20126,'2015-05-19 10:04:47','\nHotels.com [IT]','Ok','2015-05-19 10:02:13','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',6.1,0.61,NULL),(13,'A9223372035865633083',20126,'2015-05-19 11:56:08','\nHotels.com [IT]','Ok','2015-05-19 11:53:13','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',39.99,4,NULL),(14,'A9223372035865510065',20126,'2015-05-19 17:55:33','\nHotels.com [IT]','Ok','2015-05-19 17:53:06','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',56,5.6,NULL),(15,'A9223372035864591164',20126,'2015-05-21 12:11:08','\nHotels.com [IT]','Ok','2015-05-21 12:05:40','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',513.04,51.3,NULL),(16,'A9223372035864579343',20126,'2015-05-21 13:11:27','\nHotels.com [IT]','Ok','2015-05-21 13:05:54','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',602.66,60.27,NULL),(17,'A9223372035862506450',20126,'2015-05-26 12:25:21','\nHotels.com [IT]','Ok','2015-05-26 12:21:48','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',348,34.8,'4'),(200,'A9223372035857186462',20126,'2015-06-06 11:19:35','\nHotels.com [IT]','Ok','2015-06-06 11:13:17','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',865.43,86.54,'5'),(201,'A9223372035856307700',20126,'2015-06-08 17:18:27','\nHotels.com [IT]','Ok','2015-06-08 17:11:56','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia',NULL,'pending',729.6,72.96,'5'),(216,'A9223372035854251892',20126,'2015-06-12 13:27:33','\nHotels.com [IT]','Ok','2015-06-12 13:22:03','Y',NULL,'Hotel ESR','','Viagginvidia','Viagginvidia','invidia','pending',78.75,7.88,'3');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `group_id` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`fullname`,`account_id`,`status`,`group_id`,`point`) values (1,'admin','e10adc3949ba59abbe56e057f20f883e','abc@gmail.com','sdgsd',3,1,NULL,NULL),(2,'agent1','e10adc3949ba59abbe56e057f20f883e','agent1@gmail.com','agent1',6,1,NULL,NULL),(3,'quangtest','e10adc3949ba59abbe56e057f20f883e','abcde@gmail.com','sdsg',6,1,NULL,15);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
