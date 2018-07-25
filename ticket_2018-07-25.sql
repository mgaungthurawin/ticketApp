# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Database: ticket
# Generation Time: 2018-07-25 16:39:51 +0000
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_bus_id_foreign` (`bus_id`),
  KEY `bookings_customer_id_foreign` (`customer_id`),
  CONSTRAINT `bookings_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bookings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `buses` WRITE;
/*!40000 ALTER TABLE `buses` DISABLE KEYS */;

INSERT INTO `buses` (`id`, `no`, `type`, `model`, `location`, `created_at`, `updated_at`)
VALUES
	(1,'5G/1234','Tour','Scania','\"1,2\"','2018-07-15 13:03:26','2018-07-15 13:03:26'),
	(2,'9C/4321','Tour','Scania','\"1,3\"','2018-07-15 13:04:09','2018-07-15 13:04:09'),
	(3,'4C/1223','Tour','Scania','\"1,2,14\"','2018-07-15 13:04:41','2018-07-15 13:04:41'),
	(4,'7G/7654','Tour','Scania','\"1,13\"','2018-07-15 13:05:38','2018-07-15 13:05:38'),
	(5,'1B/9988','Tour','Scania','\"1,11,12\"','2018-07-15 13:06:21','2018-07-15 13:06:21'),
	(6,'1D/2222','Tour','Scania','\"1,3\"','2018-07-17 10:22:08','2018-07-17 10:22:08');

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



# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Yangon','2018-07-15 12:57:54','2018-07-15 12:57:54'),
	(2,'Mandalay','2018-07-15 12:58:01','2018-07-15 12:58:01'),
	(3,'Nay Pyi Taw','2018-07-15 12:58:12','2018-07-15 12:58:12'),
	(4,'Mon Ywar','2018-07-15 12:58:29','2018-07-15 12:58:29'),
	(5,'Sagaing','2018-07-15 12:58:41','2018-07-15 12:58:41'),
	(6,'Maw La Myaing','2018-07-15 12:59:06','2018-07-15 12:59:06'),
	(7,'Yay','2018-07-15 12:59:15','2018-07-15 12:59:15'),
	(8,'Dawai','2018-07-15 12:59:21','2018-07-15 12:59:21'),
	(9,'Myate','2018-07-15 12:59:28','2018-07-15 12:59:28'),
	(10,'Kot Thaung','2018-07-15 12:59:42','2018-07-15 12:59:42'),
	(11,'Taung Gote','2018-07-15 12:59:54','2018-07-15 12:59:54'),
	(12,'Sit Tway','2018-07-15 13:00:07','2018-07-15 13:00:07'),
	(13,'Pa Thain','2018-07-15 13:00:20','2018-07-15 13:00:20'),
	(14,'Pyin Oo Lwin','2018-07-15 13:01:48','2018-07-15 13:01:48'),
	(15,'Dawai',NULL,NULL),
	(16,'Myaung Mya','2018-07-17 10:21:03','2018-07-17 10:21:03');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;

INSERT INTO `schedules` (`id`, `bus_id`, `period`, `depature`, `depature_date`, `depature_time`, `arrival`, `arrival_date`, `arrival_time`, `created_at`, `updated_at`)
VALUES
	(3,3,'Night','2018-07-21','07/21/2018','7:00 PM','2018-07-22','07/22/2018','7:00 AM','2018-07-15 13:09:10','2018-07-15 13:09:10'),
	(4,4,'Night','2018-07-23','07/23/2018','7:00 PM','2018-07-22','07/22/2018','5:00 AM','2018-07-15 13:09:51','2018-07-15 13:09:51'),
	(5,5,'Night','2018-07-23','07/23/2018','7:00 PM','2018-07-24','07/24/2018','5:00 AM','2018-07-15 13:10:25','2018-07-15 13:10:25'),
	(6,6,'Night','2018-07-20','07/20/2018','4:58 PM','2018-07-21','07/21/2018','4:58 PM','2018-07-17 10:26:34','2018-07-17 10:28:36');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `seats` WRITE;
/*!40000 ALTER TABLE `seats` DISABLE KEYS */;

INSERT INTO `seats` (`id`, `bus_id`, `seat_no`, `allow`, `price`, `status`, `created_at`, `updated_at`)
VALUES
	(1,1,44,'12,13,14,15,16,17,18,19,20',18000,1,'2018-07-16 16:00:51','2018-07-16 16:00:51'),
	(2,1,44,'12,13,14,15,16,17,18,19,20',7000,1,'2018-07-17 10:25:25','2018-07-17 10:25:41');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'thura','mgaungthurawin@gmail.com','$2y$10$gD43NNs/w8sRFlgnhLzRQO3yVfoDaRDuz/YuzcifqVdQnSW1ekTtG','nhK8iD1TtByBvijWsgWLlGzrqa92AxDMU9wNbffPlP5BI79QPsDeJJcwgbPG','2018-07-16 09:39:05','2018-07-16 09:39:05'),
	(2,'Aye Nyein','ayenyein@gmail.com','$2y$10$RMo7PGvEwwBxRaZaLPX0H.52oK99FPAP/daUrxY6qoH23bO6LBkJa','HSvfBsajzweYVcfwwWwi3caxepE7NdpiOUUvjAEwbPmWdKYSsBPpSR3ovoA6','2018-07-17 10:41:09','2018-07-17 10:41:09');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
