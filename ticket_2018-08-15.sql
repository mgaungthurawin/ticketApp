# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Database: ticket
# Generation Time: 2018-08-15 04:44:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bookings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL,
  `bus_id` int(10) unsigned NOT NULL,
  `seat_no` int(11) NOT NULL,
  `seat_prefix` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_bus_id_foreign` (`bus_id`),
  KEY `bookings_customer_id_foreign` (`customer_id`),
  CONSTRAINT `bookings_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bookings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;

INSERT INTO `bookings` (`id`, `customer_id`, `bus_id`, `seat_no`, `seat_prefix`, `created_at`, `updated_at`)
VALUES
	(1,1,2,11,'3_4',NULL,NULL),
	(2,1,2,12,'3_5',NULL,NULL),
	(5,2,2,41,'11_1',NULL,NULL),
	(6,2,2,42,'11_2',NULL,NULL),
	(7,2,2,43,'11_3',NULL,NULL),
	(8,2,2,44,'11_4',NULL,NULL),
	(9,2,2,45,'11_5',NULL,NULL),
	(10,2,3,23,'6_4',NULL,NULL),
	(11,2,3,24,'6_5',NULL,NULL),
	(12,2,3,3,'1_4',NULL,NULL),
	(13,2,3,4,'1_5',NULL,NULL),
	(14,2,3,13,'4_1',NULL,NULL),
	(15,2,3,14,'4_2',NULL,NULL),
	(16,2,3,39,'10_4',NULL,NULL),
	(17,2,3,40,'10_5',NULL,NULL),
	(18,2,2,15,'4_4',NULL,NULL),
	(19,2,2,16,'4_5',NULL,NULL),
	(20,2,1,11,'3_4',NULL,NULL),
	(21,2,1,12,'3_5',NULL,NULL);

/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table buses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `buses`;

CREATE TABLE `buses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `buses` WRITE;
/*!40000 ALTER TABLE `buses` DISABLE KEYS */;

INSERT INTO `buses` (`id`, `no`, `type`, `model`, `location`, `created_at`, `updated_at`)
VALUES
	(1,'5G/9973','Tour','Scania','\"1,2\"','2018-08-12 03:29:45','2018-08-12 03:29:45'),
	(2,'4B/1253','Tour','Scania','\"1,4\"','2018-08-12 03:30:34','2018-08-12 03:30:34'),
	(3,'3D/4343','Tour','Scania','\"1,2\"','2018-08-12 03:31:13','2018-08-12 03:31:13'),
	(4,'5G/9974','Tour','Scania','\"1,4\"','2018-08-12 03:31:36','2018-08-12 03:35:21');

/*!40000 ALTER TABLE `buses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table customers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`)
VALUES
	(1,'test','test','test','2018-08-12 11:27:40','2018-08-12 11:27:40'),
	(2,'thura','mgaungthurawin@gmail.com','09403488850','2018-08-12 11:42:44','2018-08-12 11:42:44');

/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Yangon','2018-08-12 03:24:33','2018-08-12 03:24:53'),
	(2,'Mandalay','2018-08-12 03:24:58','2018-08-12 03:24:58'),
	(3,'Pyin Oo Lwin','2018-08-12 03:25:07','2018-08-12 03:25:07'),
	(4,'Nay Pyi Taw','2018-08-12 03:25:14','2018-08-12 03:25:14'),
	(5,'Taung Ngu','2018-08-12 03:25:24','2018-08-12 03:25:24'),
	(6,'Taung Gote','2018-08-12 03:25:33','2018-08-12 03:25:33'),
	(7,'Sit Tway','2018-08-12 03:25:40','2018-08-12 03:25:40'),
	(8,'Maw La Myaing','2018-08-12 03:25:47','2018-08-12 03:25:47'),
	(9,'Yay','2018-08-12 03:25:53','2018-08-12 03:25:53'),
	(10,'Dawai','2018-08-12 03:26:00','2018-08-12 03:26:00'),
	(11,'Myate','2018-08-12 03:26:09','2018-08-12 03:26:09');

/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2018_07_14_035157_create_locations_tables',1),
	(4,'2018_07_14_052458_create_bus_table',1),
	(5,'2018_07_14_090244_create_schedules_tables',1),
	(6,'2018_07_15_055001_create_seat_table',1),
	(7,'2018_07_15_113028_create_customer_table',1),
	(8,'2018_07_15_114757_create_booking_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table schedules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `schedules`;

CREATE TABLE `schedules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bus_id` int(10) unsigned NOT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depature` date NOT NULL,
  `depature_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depature_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival` date NOT NULL,
  `arrival_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedules_bus_id_foreign` (`bus_id`),
  CONSTRAINT `schedules_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;

INSERT INTO `schedules` (`id`, `bus_id`, `period`, `depature`, `depature_date`, `depature_time`, `arrival`, `arrival_date`, `arrival_time`, `created_at`, `updated_at`)
VALUES
	(1,1,'Evening','2018-08-17','08/17/2018','10:18 AM','2018-08-18','08/18/2018','10:18 AM','2018-08-12 03:48:42','2018-08-12 03:48:42'),
	(2,4,'Night','2018-08-18','08/18/2018','10:18 AM','2018-08-19','08/19/2018','10:18 AM','2018-08-12 03:49:03','2018-08-12 03:49:03'),
	(3,2,'Evening','2018-08-20','08/20/2018','10:19 AM','2018-08-21','08/21/2018','10:19 AM','2018-08-12 03:49:20','2018-08-12 03:49:20'),
	(4,3,'Evening','2018-08-22','08/22/2018','10:19 AM','2018-08-23','08/23/2018','10:19 AM','2018-08-12 03:49:38','2018-08-12 03:49:38');

/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table seats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `seats`;

CREATE TABLE `seats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bus_id` int(10) unsigned NOT NULL,
  `seat_no` smallint(6) NOT NULL,
  `allow` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seats_bus_id_foreign` (`bus_id`),
  CONSTRAINT `seats_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `seats` WRITE;
/*!40000 ALTER TABLE `seats` DISABLE KEYS */;

INSERT INTO `seats` (`id`, `bus_id`, `seat_no`, `allow`, `price`, `status`, `created_at`, `updated_at`)
VALUES
	(1,1,44,'12,13,14,15,16,17,18,19,20',10000,1,'2018-08-12 03:44:39','2018-08-12 03:44:39'),
	(2,4,44,'2,4,6,8,10,12,14,16,18,20',10000,1,'2018-08-12 03:45:15','2018-08-12 03:45:15'),
	(3,2,44,'12,13,14,15,16,17,18,19,20',18000,1,'2018-08-12 03:45:36','2018-08-12 03:45:36'),
	(4,3,44,'2,4,6,8,10,12,14,16,18,20',18000,1,'2018-08-12 03:45:53','2018-08-12 03:45:53');

/*!40000 ALTER TABLE `seats` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'thura','mgaungthurawin@gmail.com','$2y$10$sfran8zrcje/DVsdbtriP.0xFYoFjHlYMN7eoTELmN4oAfYMB95Mm',NULL,'2018-08-12 03:23:04','2018-08-12 03:23:04');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
