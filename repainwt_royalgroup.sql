-- MySQL dump 10.13  Distrib 5.7.23-23, for Linux (x86_64)
--
-- Host: localhost    Database: repainwt_royalgroup
-- ------------------------------------------------------
-- Server version	5.7.23-23

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
/*!50717 SELECT COUNT(*) INTO @rocksdb_has_p_s_session_variables FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'performance_schema' AND TABLE_NAME = 'session_variables' */;
/*!50717 SET @rocksdb_get_is_supported = IF (@rocksdb_has_p_s_session_variables, 'SELECT COUNT(*) INTO @rocksdb_is_supported FROM performance_schema.session_variables WHERE VARIABLE_NAME=\'rocksdb_bulk_load\'', 'SELECT 0') */;
/*!50717 PREPARE s FROM @rocksdb_get_is_supported */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;
/*!50717 SET @rocksdb_enable_bulk_load = IF (@rocksdb_is_supported, 'SET SESSION rocksdb_bulk_load = 1', 'SET @rocksdb_dummy_bulk_load = 0') */;
/*!50717 PREPARE s FROM @rocksdb_enable_bulk_load */;
/*!50717 EXECUTE s */;
/*!50717 DEALLOCATE PREPARE s */;

--
-- Current Database: `repainwt_royalgroup`
--


--
-- Table structure for table `add_payment`
--

DROP TABLE IF EXISTS `add_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `add_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 pending 1 for approve 2 for cancel',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add_payment`
--

LOCK TABLES `add_payment` WRITE;
/*!40000 ALTER TABLE `add_payment` DISABLE KEYS */;
INSERT INTO `add_payment` (`id`, `user_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES (1,36,10000.00,1,'2023-03-13 17:54:30','2023-03-13 18:16:33'),(2,6,500000.00,1,'2023-03-14 04:57:27','2023-03-14 06:32:44'),(3,5,500000.00,1,'2023-03-14 07:11:32','2023-03-14 07:14:20');
/*!40000 ALTER TABLE `add_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daily_roi`
--

DROP TABLE IF EXISTS `daily_roi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daily_roi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `roi_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_roi`
--

LOCK TABLES `daily_roi` WRITE;
/*!40000 ALTER TABLE `daily_roi` DISABLE KEYS */;
INSERT INTO `daily_roi` (`id`, `user_id`, `roi_amount`, `created_at`, `updated_at`) VALUES (3,1,20.00,'2023-03-11 13:05:40',NULL),(4,2,20.00,'2023-03-11 13:05:40',NULL),(5,3,20.00,'2023-03-11 13:05:40',NULL),(6,4,20.00,'2023-03-11 13:05:40',NULL),(7,5,20.00,'2023-03-11 13:05:40',NULL),(8,6,20.00,'2023-03-11 13:05:40',NULL),(9,36,20.00,'2023-03-11 13:05:40',NULL),(10,1,20.00,'2023-03-12 05:45:04',NULL),(11,2,20.00,'2023-03-12 05:45:04',NULL),(12,3,20.00,'2023-03-12 05:45:04',NULL),(13,4,20.00,'2023-03-12 05:45:04',NULL),(14,5,20.00,'2023-03-12 05:45:04',NULL),(15,6,20.00,'2023-03-12 05:45:04',NULL),(16,36,20.00,'2023-03-12 05:45:04',NULL),(17,1,20.00,'2023-03-13 04:52:07',NULL),(18,2,20.00,'2023-03-13 04:52:07',NULL),(19,3,20.00,'2023-03-13 04:52:07',NULL),(20,4,20.00,'2023-03-13 04:52:07',NULL),(21,5,20.00,'2023-03-13 04:52:07',NULL),(22,6,20.00,'2023-03-13 04:52:07',NULL),(23,36,20.00,'2023-03-13 04:52:07',NULL),(24,1,20.00,'2023-03-14 00:00:03',NULL),(25,2,20.00,'2023-03-14 00:00:03',NULL),(26,3,20.00,'2023-03-14 00:00:03',NULL),(27,4,20.00,'2023-03-14 00:00:03',NULL),(28,5,20.00,'2023-03-14 00:00:03',NULL),(29,6,20.00,'2023-03-14 00:00:03',NULL),(30,36,60.00,'2023-03-14 00:00:03',NULL),(31,1,20.00,'2023-03-15 00:00:03',NULL),(32,2,20.00,'2023-03-15 00:00:03',NULL),(33,3,20.00,'2023-03-15 00:00:03',NULL),(34,4,20.00,'2023-03-15 00:00:03',NULL),(35,5,2020.00,'2023-03-15 00:00:03',NULL),(36,6,2020.00,'2023-03-15 00:00:03',NULL),(37,36,60.00,'2023-03-15 00:00:03',NULL),(38,1,20.00,'2023-03-16 00:00:04',NULL),(39,2,20.00,'2023-03-16 00:00:04',NULL),(40,3,20.00,'2023-03-16 00:00:04',NULL),(41,4,20.00,'2023-03-16 00:00:04',NULL),(42,5,2020.00,'2023-03-16 00:00:04',NULL),(43,6,2020.00,'2023-03-16 00:00:04',NULL),(44,36,60.00,'2023-03-16 00:00:04',NULL),(45,1,20.00,'2023-03-17 00:00:03',NULL),(46,2,20.00,'2023-03-17 00:00:03',NULL),(47,3,20.00,'2023-03-17 00:00:03',NULL),(48,4,20.00,'2023-03-17 00:00:03',NULL),(49,5,2020.00,'2023-03-17 00:00:03',NULL),(50,6,2020.00,'2023-03-17 00:00:03',NULL),(51,36,60.00,'2023-03-17 00:00:03',NULL),(52,1,20.00,'2023-03-18 00:00:03',NULL),(53,2,20.00,'2023-03-18 00:00:03',NULL),(54,3,20.00,'2023-03-18 00:00:03',NULL),(55,4,20.00,'2023-03-18 00:00:03',NULL),(56,5,2020.00,'2023-03-18 00:00:03',NULL),(57,6,2020.00,'2023-03-18 00:00:03',NULL),(58,36,60.00,'2023-03-18 00:00:03',NULL);
/*!40000 ALTER TABLE `daily_roi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `permssion` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` (`id`, `name`, `permssion`, `username`, `password`, `created_at`, `updated_at`) VALUES (1,NULL,'admin','admin','f67b936d9c6a7da2f6365bc87c7d05c1','2021-10-07 17:23:03','2021-10-07 20:41:22');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadharno` bigint(20) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `referal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daily_roi` decimal(7,2) NOT NULL DEFAULT '0.00',
  `total_roi` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_withdraw` decimal(10,2) NOT NULL DEFAULT '0.00',
  `activation_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `user_name`, `email_verified_at`, `password`, `phone`, `aadharno`, `address`, `amount`, `referal_code`, `sponsor`, `daily_roi`, `total_roi`, `total_withdraw`, `activation_date`, `expiration_date`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'Ram','ayodhyanagar@123.com','RYG100',NULL,'$2y$10$A7WTU1cz2Ordvg8xjcSJ5Ohn2juqWC9L.XZj80n3pNM70E6k7K0Ie','7004301456',NULL,NULL,5000.00,'RYG100ZNL',NULL,0.40,160.00,0.00,'2023-03-03','2025-04-03',1,NULL,'2023-03-03 08:56:10','2023-03-18 00:00:03'),(2,'RYG1','ram123@gmail.com','RYG101',NULL,'$2y$10$Gd/gGae6q83f4r.OM6rhcuYEIwltuEb5o3sp/xx4H6oqCOrdRHLCy','7004301456',NULL,NULL,5000.00,'RYG101FLK','RYG100ZNL',0.40,160.00,0.00,'2023-03-03','2025-04-03',1,NULL,'2023-03-03 09:01:35','2023-03-18 00:00:03'),(3,'Ryg2','ram234@gmail.com','RYG102',NULL,'$2y$10$FxwJ4nGGPsisyHNYABBlrO1uiu0kCmb2bVMslNkyLB4ckA3eBg6ny','7004301456',NULL,NULL,5000.00,'RYG102WQL','RYG101FLK',0.40,160.00,0.00,'2023-03-03','2025-04-03',1,NULL,'2023-03-03 09:02:47','2023-03-18 00:00:03'),(4,'Ryg3','ram345@gmail.com','RYG103',NULL,'$2y$10$Wo6Ci0eDpH33x7RaFvDla.9G.JRMSJwwU/PtvwU6Ye1mlGa.XFGnO','7004301456',NULL,NULL,5000.00,'RYG103KCE','RYG102WQL',0.40,160.00,0.00,'2023-03-03','2025-04-03',1,NULL,'2023-03-03 09:04:04','2023-03-18 00:00:03'),(5,'Yogendra','yogendranarayan440@gmail.com','RYG104',NULL,'$2y$10$WqvzWsar7u9.tOkoWfFqhOT7AHWLlisAlZElTL86tEhwtNqesa/OW','9554342625',NULL,NULL,505000.00,'RYG104QIG','RYG103KCE',0.40,8160.00,0.00,'2023-03-03','2025-04-03',1,NULL,'2023-03-03 09:07:10','2023-03-18 00:00:03'),(6,'Vinayak Tiwari','vinayaktiwari522@gmail.com','RYG105',NULL,'$2y$10$IoHFBUG8c824mZOouZmXEukwB.EDYRBvq/nS/7HOZWftbpTuBNu0.','7004301456',NULL,NULL,505000.00,'RYG105QSF','RYG104QIG',0.40,8160.00,80.00,'2023-03-03','2025-04-03',1,NULL,'2023-03-03 09:08:44','2023-03-18 00:00:03'),(7,'Beby','dhrmendra.bauddh786@gmail.com','RYG106',NULL,'$2y$10$c9MVWVSeGS5m7cYBCaw9h.Nr39c5F1CxRSnEePFYZps49bsF1OPde','7565983979',NULL,NULL,100.00,'RYG106WKM','RYG105QSF',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-03 09:47:07','2023-03-03 09:47:07'),(8,'Ramgopal mishra','ramgopalmishra298@gmail.com','RYG107',NULL,'$2y$10$ZvaCKmEt9PJhp/1ihqkx0.4vLklP91.6smAWogb8MQ2RrYmrsNWPu','9554338377',NULL,NULL,5000.00,'RYG107RAB','123456',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-03 10:14:16','2023-03-03 10:14:16'),(9,'Vijay','palv21695@gmail.com','RYG108',NULL,'$2y$10$7MZEOhdXR18mqxHG0ECijOpr.Rb78Fv0JNgGeJ1UmMYAIGEk8jGsW','7905266214',NULL,NULL,5000.00,'RYG108RFH','RYG105QSF',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-03 11:44:24','2023-03-03 11:44:24'),(10,'Swapnil Kumar Pandey','babaprince0723@gmail.com','RYG109',NULL,'$2y$10$ZNWDr45saMI4.EYzVjZi9.WpMVPKzZNxql.xQ5utcdX2D1ofkj0yi','9335270854',NULL,NULL,5000.00,'RYG109THV','RYG105QSF',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-03 11:53:21','2023-03-03 11:53:21'),(11,'Avneesh','avanishk960@gmail.com','RYG110',NULL,'$2y$10$O2PQndD2d2HiKcvXH4TDwe6E18EKzhySilqNJ4wvYpoLF.RHfLFe2','8130945956',NULL,NULL,5000.00,'RYG110RNV','RYG105QSF',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-03 16:01:11','2023-03-03 16:01:11'),(12,'Vikash Kumar Yadav','vy47041@gmail.com','RYG111',NULL,'$2y$10$hOgSaNatoPd2D.MCikThcO7fg2d84YCvKmRfYb1TaRbuFWwmrKwRG','7779816384',NULL,NULL,1.00,'RYG111OFN','RYG105QSF',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-04 04:27:42','2023-03-04 04:27:42'),(13,'Himanshu Dubey','himanshudubey746@gmail.com','RYG112',NULL,'$2y$10$Pq5vKOxpyxv2soq4onTc0O8Rglwto4/haT4i/iubWFTcICFVUj6yC','6393680370',NULL,NULL,10000.00,'RYG112JKE','RYG105QSF',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-04 13:54:32','2023-03-04 13:54:32'),(14,'Shailesh pathak','shaleshsrm469@gmail.com','RYG113',NULL,'$2y$10$HZsKfXAf4qC5.ynQxmsVLuCPFWT7TbRsGzStOrdNJbsFUWIKI2qui','9936120052',NULL,NULL,5000.00,'RYG113PYE','RYG107RAB',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-04 14:55:39','2023-03-04 14:55:39'),(15,'Vivek Kumar panday','VivekPandey272176@gmail.com','RYG114',NULL,'$2y$10$aTzLz3bDY7gsD1KRV.cG6uEfBBLtwQ7SZE8x5dsQK6OGtvU71sQ9O','9984520008',NULL,NULL,5000.00,'RYG114DKH','RYG107RAB',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-05 15:20:07','2023-03-05 15:20:07'),(16,'Sumit Kumar','sumit273403@gmail.com','RYG115',NULL,'$2y$10$EduGZhb26LLoy3py158IOux2Arcc3Oai18xENu5mvXIxBi54oInV6','6387993304',NULL,NULL,5000.00,'RYG115NQU','RYG104QIG',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 08:11:29','2023-03-06 08:11:29'),(17,'Sumit Kumar','sumitk6210@gmail.com','RYG116',NULL,'$2y$10$sgqZKfzQpF8geQKyKpjEJeLWTMu8r6NAnxn4F.v.Aej6RT3gFBO3G','6387993304',NULL,NULL,5000.00,'RYG116ROL','RYG115NQU',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 08:16:53','2023-03-06 08:16:53'),(18,'Ram ashish','ramashish48789@gmail.com','RYG117',NULL,'$2y$10$0SPHHOOvjR3TFyWGBXGQheyNNf3jqhcyQTldVuKWuVBnMdzRxjfM2','7236022925',NULL,NULL,5000.00,'RYG117PTB','RYG116ROL',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 08:34:28','2023-03-06 08:34:28'),(19,'Sumit Kumar','sumit871426@gmail.com','RYG118',NULL,'$2y$10$6Rvg//uqVb/cWJdrs9YrKe/pefOJI1SJoNitHAmimWuOs2WM3P/pi','6387993304',NULL,NULL,5000.00,'RYG118TAQ','RYG115NQU',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 09:01:15','2023-03-06 09:01:15'),(20,'Sumit Kumar','sk940094434@gmail.com','RYG119',NULL,'$2y$10$AcBF5Uhnmm5KWnYQpEeDyuT4QuSfdmfZUSiuXsXjCEf/YtwqqgTjG','6387993304',NULL,NULL,5000.00,'RYG119TAG','RYG115NQU',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 09:03:10','2023-03-06 09:03:11'),(21,'Sumit Kumar','sk839873974648@gmail.com','RYG120',NULL,'$2y$10$gZ2wvVFmybD8HIvP8n9bYuYKIXa9FdVooFpcdKVT0yKVQ9IaWZpYC','6387993304',NULL,NULL,5000.00,'RYG120TCU','RYG115NQU',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 09:06:34','2023-03-06 09:06:34'),(22,'Ram ashish','ashishram89155@gmail.com','RYG121',NULL,'$2y$10$BEUPRKXyLKLNr3AFKIWt3.rGAtLYKWU.AJ5oLx1hfuq5lJYNV71.y','7236022925',NULL,NULL,5000.00,'RYG121RYS','RYG117PTB',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 09:07:17','2023-03-06 09:07:17'),(23,'Sumit Kumar','sumitk09583@gmail.com','RYG122',NULL,'$2y$10$p0RETnynNsTWSeZfhvGp1eww7M2cOx1lrjQeRNyZNZTzoSjX2aYFO','6387993304',NULL,NULL,5000.00,'RYG122QXK','RYG115NQU',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 09:08:25','2023-03-06 09:08:25'),(24,'Ram ashish','ramashish16869@gmail.com','RYG123',NULL,'$2y$10$yhasePrncMfKkxuuzAr07.tVBdjGLBgpJhdWVdPiQDcITdfTZqqh2','7236022925',NULL,NULL,5000.00,'RYG123OYB','RYG117PTB',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 09:12:00','2023-03-06 09:12:00'),(25,'Ram ashish','ramashish17336@gmail.com','RYG124',NULL,'$2y$10$2OU5bXw3I0O8n5FrtvOgguHEWlGyfgtL/b7u89OeJBUV.qSYbJaI.','7236022925',NULL,NULL,5000.00,'RYG124DFI','RYG117PTB',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 09:15:05','2023-03-06 09:15:05'),(26,'Ram ashish','ashishram2191@gmail.com','RYG125',NULL,'$2y$10$TlRv9jNl3yDpFvorQ8nu2ekShUftWhXPW5vgUfizCMeXcbjGAmUE2','7236022925',NULL,NULL,5000.00,'RYG125ODN','RYG117PTB',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 09:18:06','2023-03-06 09:18:06'),(27,'Ram ashish','ashishram43824@gmail.com','RYG126',NULL,'$2y$10$es8fixKTHtJJqJl238srxO6KpHYT1Yox0av6j/PMy9GbhqJXRtIu2','7236022925',NULL,NULL,5000.00,'RYG126VMS','RYG117PTB',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 09:20:43','2023-03-06 09:20:43'),(28,'Shivam Kumar Tiwari','mrshivamtiwari5@gmail.com','RYG127',NULL,'$2y$10$6Rg9vDwGai.C2J.GjxRCCOGQmLu9EU4elz6p0EgfOuHBGn7kCzxiK','9135131392',NULL,NULL,5000.00,'RYG127BSI','RYG105QSF',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 11:56:08','2023-03-06 11:56:08'),(29,'Prabhav Mani Tripathi','prabhavmanivijayipur@gmail.com','RYG128',NULL,'$2y$10$JvsJ52EDhNjn8AB4G0Oz3ecFUToh8Q0YIZ3u17fcWSGV45suXkAv6','7296045456',NULL,NULL,5000.00,'RYG128NXW','RYG127BSi',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 11:58:57','2023-03-06 11:58:57'),(30,'anoop rani singh','spsinghkim@gmail.com','RYG129',NULL,'$2y$10$U4rEvGW2IzLqIMobwPjSIuUmy/oAgiD7lhCs.YkS8FIQfVoySXuXG','9935146869',NULL,NULL,5000.00,'RYG129ZUF','RYG104QIG',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 13:03:36','2023-03-06 13:03:36'),(31,'anoop rani singh','singhsh6969@gmail.com','RYG130',NULL,'$2y$10$lsfY9S5XlcgW8vM4cUvepuvhbRvgHNSE6efaRRoGPZ.xr33cCvnIC','9935146869',NULL,NULL,5000.00,'RYG130KWR','RYG129ZUF',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 13:28:18','2023-03-06 13:28:18'),(32,'anoop rani singh2','s44875110@gmail.com','RYG131',NULL,'$2y$10$/rGyf0PeYLbC0XebRETWkuSoI2woFqSolGFUZlToqsExR3AoqTCzy','9935146869',NULL,NULL,5000.00,'RYG131WEQ','RYG129ZUF',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 13:30:32','2023-03-06 13:30:32'),(33,'anoop rani singh3','6968689sdsd@gmail.com','RYG132',NULL,'$2y$10$cpFR7jZasZggX3qm.BR30uZlgW3zY0TuLPLJIf1Stm4xSpB9D.RU2','9935146869',NULL,NULL,5000.00,'RYG132RVH','RYG129ZUF',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 13:33:22','2023-03-06 13:33:22'),(34,'anoop rani singh4','789669sdsd@gmail.com','RYG133',NULL,'$2y$10$wmUQdHezldutIdCinBpLuuZRom8vUdZNC4bMmB3zEnp8xRmjgvAqu','9935146869',NULL,NULL,5000.00,'RYG133BOD','RYG129ZUF',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 13:36:11','2023-03-06 13:36:11'),(35,'anoop rani singh5','465767shiv@gmail.com','RYG134',NULL,'$2y$10$12.hdNUucXfvmm0SycMiE.JXGi1JrA.U7C1oUI6v74nmoOo6Uj7ee','9935146869',NULL,NULL,5000.00,'RYG134ZKM','RYG129ZUF',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-06 13:38:05','2023-03-06 13:38:05'),(36,'satish singh','singhsatishkumar50@gmail.com','RYG135',NULL,'$2y$10$ZNKdieXui0Cjl/nyY6EYFOuxW3enYPqAs1GpeogM6kLdYEkVoHKA6','8750137055',NULL,NULL,15000.00,'RYG135PKU',NULL,0.40,360.00,15.00,'2023-03-10','2025-04-10',1,NULL,'2023-03-06 17:19:32','2023-03-18 00:00:03'),(37,'Kamlesh kumar','kamleshkuamr937@gmail.com','RYG136',NULL,'$2y$10$wuby83G.EnL.KxD0sSgUCOVsc1PxDM8a2N57tageGrtQqz4vKHsNq','8009273800',NULL,NULL,5000.00,'RYG136TWM','RYG121RYS',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-07 07:12:19','2023-03-07 07:12:19'),(38,'Aditya paswan','adityapaswan1222556086@gmail.com','RYG137',NULL,'$2y$10$krrmCQlXnCPdwwYbOxY9wOWTzRb/G3v9kCtRi3h1IUSJMCO0V02Xy','7317626473',NULL,NULL,5000.00,'RYG137QXJ','RYG136TWM',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-07 07:18:10','2023-03-07 07:18:10'),(39,'Lucky','adityapaswanumar55@gmail.com','RYG138',NULL,'$2y$10$m8M3fujsIO5Wf6n4FlbMw.TLNNAbPnspmhys7Lvx6WqknxTuTMjMO','9651149307',NULL,NULL,5000.00,'RYG138TZC','RYG137QXJ',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-07 09:04:01','2023-03-07 09:04:01'),(40,'Lucky','bikkylucky49@gmail.com','RYG139',NULL,'$2y$10$32ailnFM2KSTp4kKgf8MQ.ORpiBJA4LseG4razjbQiLWvyb26RoyC','9118267053',NULL,NULL,5000.00,'RYG139RST','RYG137QXJ',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-07 09:10:48','2023-03-07 09:10:48'),(41,'Raj ji','adityapswanadityapaswan57@gmail.com','RYG140',NULL,'$2y$10$wxLd/JekHJCfS0OFpq8N0uCrSeBlpQL/4yUse2swEgASyzLcZh2XG','7619123215',NULL,NULL,5000.00,'RYG140LMC','RYG137QXJ',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-07 09:12:14','2023-03-07 09:12:14'),(42,'Amp and mitu','aadityapaswan46@gmail.com','RYG141',NULL,'$2y$10$ICYqbLSYdpnEQTefm4.YoutEVgehDgmgYRkwdb7UsrcDE5fuJZxeG','9519056162',NULL,NULL,5000.00,'RYG141QCX','RYG137QXJ',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-07 09:15:25','2023-03-07 09:15:25'),(43,'Akp baba ji','yadawji467@gmail.com','RYG142',NULL,'$2y$10$TWq.OphU8eyLuFEue0z4HO8cBiGqrGxMoCumNk3uzAlXzwV8oYD82','965149306',NULL,NULL,5000.00,'RYG142RVS','RYG137QXJ',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-07 09:18:10','2023-03-07 09:18:10'),(44,'Shashikala','rkgkp526@gmail.com','RYG143',NULL,'$2y$10$rOR/MnEJSBw7H6aVpuOtiOtG6nlE6FTxkr8LG.RdVGy830QveLiiG','6307445628',NULL,NULL,5000.00,'RYG143UNP','RYG118TAQ',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-07 13:10:25','2023-03-07 13:10:25'),(45,'Priya Shri','priyashri980@gmail.com','RYG144',NULL,'$2y$10$IjT6srrKW2qFcXWYo1CboerxfpPPocjkHYfeeIPYDUeBySVfH42QG','8423487739',NULL,NULL,5000.00,'RYG144TWP','RYG143UNP',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-07 13:53:32','2023-03-07 13:53:32'),(46,'Rakesh Kumar','rkgkp5628@gmail.com','RYG145',NULL,'$2y$10$2pvoAXc8p9rG9PZt7I5.WeBz8.V7n.ZC.YZVh.eokT14WnKB4PJVu','9305527661',NULL,NULL,5000.00,'RYG145ITX','RYG143UNP',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-07 13:55:51','2023-03-07 13:55:51'),(47,'Naman Anand','anandkup13@gmail.com','RYG146',NULL,'$2y$10$J/ALTwJPxHBu6HMixn5UtOuEHMdnMxNRah9dac/cHOX1Yk2AUnijS','9026017852',NULL,NULL,5000.00,'RYG146GDP','RYG143UNP',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-07 13:57:38','2023-03-07 13:57:38'),(48,'Shivangi Shri','srishivangi319@gmail.com','RYG147',NULL,'$2y$10$Sfv//tZ2MGDL81bNBsqhee5IopjAFj4sRtoo70Fe3gfDBiFE55Vta','9026017852',NULL,NULL,5000.00,'RYG147HJG','RYG143UNP',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-07 13:58:46','2023-03-07 13:58:46'),(49,'Kamlesh kumar','kamlesh2025@gmail.com','RYG148',NULL,'$2y$10$DuGAzd89Ly/IAk6MlNM3HeWulpHpPMEKmNTZlYYGSvThPqTYgKTzG','09198028807',NULL,NULL,5000.00,'RYG148XGD','RYG136TWM',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-09 10:43:57','2023-03-09 10:43:57'),(50,'Sumit','sumitgolu496@gmail.com','RYG149',NULL,'$2y$10$YSv3PFDyuhDWUDw7iFKruuDT9NBfD8McOhPMqGN343UawPSc9bXFW','8115633733',NULL,NULL,5000.00,'RYG149LKB','RYG121RYS',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-09 12:32:00','2023-03-09 12:32:00'),(51,'Pawan tiwari','pawankumartripathi7@gmail.com','RYG150',NULL,'$2y$10$5RhZlNEDLZVUwPRB.i1OXueuVkPhvkSPq0VYpqufah/8N/YowFD7a','7388892410',NULL,NULL,5000.00,'RYG150JVR','RYG107RAB',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-13 11:34:24','2023-03-13 11:34:24'),(52,'Raj tiwari','rudra2sep123@gmail.com','RYG151',NULL,'$2y$10$dmhGiAcLFmbgKmTr5k1N.eW4SN8I.E9sUZdviW7u1iM7ipYgt0V7C','6393815495',NULL,NULL,5000.00,'RYG151LKM','RYG107RAB',0.00,0.00,0.00,NULL,NULL,0,NULL,'2023-03-13 14:54:56','2023-03-13 14:54:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdraw`
--

DROP TABLE IF EXISTS `withdraw`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `withdraw_amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 for pending 1 for approved 2 for cancel',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdraw`
--

LOCK TABLES `withdraw` WRITE;
/*!40000 ALTER TABLE `withdraw` DISABLE KEYS */;
INSERT INTO `withdraw` (`id`, `user_id`, `withdraw_amount`, `status`, `created_at`, `updated_at`) VALUES (1,36,15.00,1,'2023-03-11 14:26:55','2023-03-12 05:09:35'),(2,6,80.00,1,'2023-03-14 06:38:14','2023-03-14 06:38:28');
/*!40000 ALTER TABLE `withdraw` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'repainwt_royalgroup'
--

--
-- Dumping routines for database 'repainwt_royalgroup'
--
/*!50112 SET @disable_bulk_load = IF (@is_rocksdb_supported, 'SET SESSION rocksdb_bulk_load = @old_rocksdb_bulk_load', 'SET @dummy_rocksdb_bulk_load = 0') */;
/*!50112 PREPARE s FROM @disable_bulk_load */;
/*!50112 EXECUTE s */;
/*!50112 DEALLOCATE PREPARE s */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-18  1:14:18
