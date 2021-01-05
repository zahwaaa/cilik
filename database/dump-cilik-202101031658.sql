-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: cilik
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `article_categories`
--

DROP TABLE IF EXISTS `article_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_categories`
--

LOCK TABLES `article_categories` WRITE;
/*!40000 ALTER TABLE `article_categories` DISABLE KEYS */;
INSERT INTO `article_categories` VALUES (1,'Berita Anak','berita-anak','2021-01-02 16:33:23','2021-01-03 02:43:45'),(2,'Cerita Anak','cerita-anak','2021-01-02 16:33:23','2021-01-03 02:42:48'),(3,'Cerita Bersambung','cerita-bersambung','2021-01-02 16:33:23','2021-01-03 02:42:51'),(4,'Cerita Misteri','cerita-misteri','2021-01-02 16:33:23','2021-01-03 02:42:53'),(5,'Dongeng Anak','dongeng-anak','2021-01-02 16:33:23','2021-01-03 02:42:56'),(6,'Gambar Anak','gambar-anak','2021-01-02 16:33:23','2021-01-03 02:43:00'),(7,'Ide Kreatif Anak','ide-kreatif-anak','2021-01-02 16:33:23','2021-01-03 02:43:03'),(8,'Parenting Indonesia','parenting-indonesia','2021-01-02 16:33:23','2021-01-03 02:43:05'),(9,'Pelajaran Sekolah','pelajaran-sekolah','2021-01-02 16:33:23','2021-01-03 02:43:09'),(10,'Puisi Anak','puisi-anak','2021-01-02 16:33:23','2021-01-03 02:43:11'),(11,'Tugas Sekolah','tugas-sekolah','2021-01-02 16:33:23','2021-01-03 02:43:16');
/*!40000 ALTER TABLE `article_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_statuses`
--

DROP TABLE IF EXISTS `article_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_statuses`
--

LOCK TABLES `article_statuses` WRITE;
/*!40000 ALTER TABLE `article_statuses` DISABLE KEYS */;
INSERT INTO `article_statuses` VALUES (1,'Draft','2021-01-02 16:33:23','2021-01-02 16:33:23'),(2,'Submit for Review','2021-01-02 16:33:23','2021-01-02 16:33:23'),(3,'Published','2021-01-02 16:33:23','2021-01-02 16:33:23'),(4,'Rejected','2021-01-02 16:33:23','2021-01-02 16:33:23'),(5,'Deleted','2021-01-02 16:33:23','2021-01-02 16:33:23');
/*!40000 ALTER TABLE `article_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `article_category_id` bigint(20) unsigned NOT NULL,
  `article_status_id` bigint(20) unsigned DEFAULT NULL,
  `views` bigint(20) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`),
  KEY `articles_article_category_id_foreign` (`article_category_id`),
  KEY `articles_article_status_id_foreign` (`article_status_id`),
  CONSTRAINT `articles_article_category_id_foreign` FOREIGN KEY (`article_category_id`) REFERENCES `article_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `articles_article_status_id_foreign` FOREIGN KEY (`article_status_id`) REFERENCES `article_statuses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Artikel Pertamaku','artikel','<p>Syalala</p>\r\n','team-logo1.png',2,2,3,0,'2021-01-02 16:34:24','2021-01-03 02:19:03'),(2,'Artikel Pertamaku','artikel-1','<p>Syalala</p>\r\n','team-logo1.png',2,1,4,0,'2021-01-02 16:34:24','2021-01-03 02:19:37'),(3,'Artikel Pertamaku','artikel-2','<p>Syalala</p>\r\n','team-logo1.png',2,3,3,0,'2021-01-02 16:34:24','2021-01-02 17:03:51'),(4,'Artikel Pertamaku','artikel-3','<p>Syalala</p>\r\n','team-logo1.png',2,1,3,0,'2021-01-02 16:34:24','2021-01-02 17:03:51'),(5,'Artikel Pertamaku','artikel-4','<p>Syalala</p>\r\n','team-logo1.png',2,2,3,0,'2021-01-02 16:34:24','2021-01-02 17:03:51'),(6,'Artikel Pertamaku','artikel-5','<p>Syalala</p>\r\n','team-logo1.png',2,3,3,0,'2021-01-02 16:34:24','2021-01-02 17:03:51'),(7,'Artikel Pertamaku','artikel-6','<p>Syalala</p>\r\n','team-logo1.png',2,2,3,0,'2021-01-02 16:34:24','2021-01-02 17:03:51');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (1,'Pertama','home-banner1.jpg','https://google.com','2021-01-02 20:33:54','2021-01-02 20:33:54'),(2,'Kedua','home-banner2.jpg','https://google.com','2021-01-02 20:34:23','2021-01-02 20:34:23'),(3,'Ketiga','home-banner3.jpg','https://google.com','2021-01-02 20:34:35','2021-01-02 20:34:35');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2020_12_15_034108_create_roles_table',1),(6,'2020_12_15_034141_add_role_to_users_table',1),(7,'2020_12_15_034735_create_article_categories_table',1),(8,'2020_12_15_040124_create_articles_table',1),(9,'2021_01_02_230810_create_article_statuses_table',1),(10,'2021_01_02_230905_add_status_to_articles_table',1),(11,'2021_01_03_002413_create_product_categories_table',2),(12,'2021_01_03_002651_create_products_table',3),(13,'2021_01_03_013707_create_product_images_table',4),(14,'2021_01_03_014359_create_statuses_table',5),(15,'2021_01_03_014540_add_status_to_products_table',6),(16,'2021_01_03_022008_create_sliders_table',7),(17,'2021_01_03_031032_add_views_to_articles_table',8),(18,'2021_01_03_032952_create_banners_table',9),(19,'2021_01_03_034121_add_thumbnail2_to_products_table',10),(20,'2021_01_03_071036_create_product_buys_table',11),(21,'2021_01_03_071257_create_product_checkouts_table',12),(22,'2021_01_03_082415_add_billing_to_product_checkouts_table',13),(23,'2021_01_03_091021_add_score_to_users_table',14),(24,'2021_01_03_094054_add_slug_to_article_categories_table',15),(25,'2021_01_03_094443_add_slug_to_articles_table',16);
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
-- Table structure for table `product_buys`
--

DROP TABLE IF EXISTS `product_buys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_buys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `harga_satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkout` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `kode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_buys_product_id_foreign` (`product_id`),
  KEY `product_buys_user_id_foreign` (`user_id`),
  CONSTRAINT `product_buys_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_buys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_buys`
--

LOCK TABLES `product_buys` WRITE;
/*!40000 ALTER TABLE `product_buys` DISABLE KEYS */;
INSERT INTO `product_buys` VALUES (8,1,1,'50000','1','50000','1','CIL-1-1609663179','2021-01-03 01:39:08','2021-01-03 01:39:39'),(9,2,1,'50000','3','150000','1','CIL-1-1609663179','2021-01-03 01:39:16','2021-01-03 01:39:39'),(10,1,2,'50000','1','50000','1','CIL-2-1609664392','2021-01-03 01:59:21','2021-01-03 01:59:52'),(11,3,2,'50000','10','500000','1','CIL-2-1609664392','2021-01-03 01:59:32','2021-01-03 01:59:52'),(12,3,2,'50000','7','350000','1','CIL-2-1609664895','2021-01-03 02:08:00','2021-01-03 02:08:15'),(13,2,2,'50000','1','50000','1','CIL-2-1609664954','2021-01-03 02:09:02','2021-01-03 02:09:14');
/*!40000 ALTER TABLE `product_buys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,'Tas','tas','2021-01-02 18:32:59','2021-01-02 18:33:24'),(2,'Hadiah','hadiah','2021-01-02 19:48:06','2021-01-02 19:48:06'),(3,'Kaos','kaos','2021-01-02 19:48:10','2021-01-02 19:48:10');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_checkouts`
--

DROP TABLE IF EXISTS `product_checkouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_checkouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `is_paid` char(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_checkouts_user_id_foreign` (`user_id`),
  CONSTRAINT `product_checkouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_checkouts`
--

LOCK TABLES `product_checkouts` WRITE;
/*!40000 ALTER TABLE `product_checkouts` DISABLE KEYS */;
INSERT INTO `product_checkouts` VALUES (3,'CIL-1-1609663179','200000',1,'0','a','b','aaezha@gmail.com','c','d','e','f','2021-01-03 01:39:39','2021-01-03 01:39:39'),(4,'CIL-2-1609664392','550000',2,'0','q','w','reza@gmail.com','e','r','t','y','2021-01-03 01:59:52','2021-01-03 01:59:52'),(5,'CIL-2-1609664895','350000',2,'0','q','w','reza@nurfachmi.com','e','r','t','y','2021-01-03 02:08:15','2021-01-03 02:08:15'),(6,'CIL-2-1609664954','50000',2,'0','q','w','a@a.com','e','r','t','y','2021-01-03 02:09:14','2021-01-03 02:09:14');
/*!40000 ALTER TABLE `product_checkouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,1,'team-logo4-4338a.png',NULL,NULL),(2,1,'team-logo4-4338a.png',NULL,NULL),(3,1,'team-logo4-4338a.png',NULL,NULL),(4,1,'team-logo4-4338a.png',NULL,NULL),(5,1,'team-logo4-4338a.png',NULL,NULL),(6,1,'team-logo4-4338a.png',NULL,NULL),(7,1,'team-logo4-4338a.png',NULL,NULL),(8,1,'team-logo4-4338a.png',NULL,NULL),(9,1,'team-logo4-4338a.png',NULL,NULL),(10,1,'team-logo4-4338a.png',NULL,NULL),(11,1,'team-logo4-4338a.png',NULL,NULL),(12,1,'team-logo4-4338a.png',NULL,NULL);
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` bigint(20) unsigned NOT NULL,
  `product_category_id` bigint(20) unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_product_category_id_foreign` (`product_category_id`),
  KEY `products_status_id_foreign` (`status_id`),
  CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Tas Tote Kanvas 2','ad 2','Tas Tote mantap','<p>Mantap jiwaaa</p>\r\n','tas, tote','50000','team-logo3.png','p4_hover.jpg',1,1,'tas-tote-kanvas-2','2021-01-02 18:47:56','2021-01-02 20:43:17'),(2,'Tas Tote Kanvas 3','ad 3','Tas Tote mantap','<p>Mantap jiwaaa</p>\r\n','tas, tote','50000','team-logo3.png','p4_hover-0a6d9.jpg',1,2,'tas-tote-kanvas-3','2021-01-02 18:47:56','2021-01-02 20:43:35'),(3,'Tas Tote Kanvas 4','ad4','Tas Tote mantap','<p>Mantap jiwaaa</p>\r\n','tas, tote','50000','team-logo3.png','p4_hover-90510.jpg',1,3,'tas-tote-kanvas-4','2021-01-02 18:47:56','2021-01-02 20:43:48'),(4,'Tas Tote Kanvas 5','ad5','Tas Tote mantap','<p>Mantap jiwaaa</p>\r\n','tas, tote','50000','team-logo3.png','p4_hover-7bd34.jpg',1,1,'tas-tote-kanvas-5','2021-01-02 18:47:56','2021-01-02 20:44:00'),(5,'Tas Tote Kanvas 6','ad6','Tas Tote mantap','<p>Mantap jiwaaa</p>\r\n','tas, tote','50000','team-logo3.png','p4_hover-22997.jpg',1,2,'tas-tote-kanvas-6','2021-01-02 18:47:56','2021-01-02 20:44:11'),(6,'Tas Tote Kanvas 7','ad7','Tas Tote mantap','<p>Mantap jiwaaa</p>\r\n','tas, tote','50000','team-logo3.png','p4_hover-83611.jpg',1,2,'tas-tote-kanvas-7','2021-01-02 18:47:56','2021-01-02 20:44:23'),(7,'Tas Tote Kanvas 8','ad8','Tas Tote mantap','<p>Mantap jiwaaa</p>\r\n','tas, tote','50000','team-logo3.png','p4_hover-776d5.jpg',1,2,'tas-tote-kanvas-8','2021-01-02 18:47:56','2021-01-02 20:45:03'),(8,'Tas Tote Kanvas 9','ad9','Tas Tote mantap','<p>Mantap jiwaaa</p>\r\n','tas, tote','50000','team-logo3.png','p4_hover-2ab68.jpg',1,2,'tas-tote-kanvas-9','2021-01-02 18:47:56','2021-01-02 20:45:13'),(13,'Tas Tote Kanvas','ad','Tas Tote mantap','<p>Mantap jiwaaa</p>\r\n','tas, tote','50000','team-logo3.png','team-logo2-c84a6.png',1,2,'tas-tote-kanvas','2021-01-02 18:47:56','2021-01-02 21:28:16');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','2021-01-02 16:33:23','2021-01-02 16:33:23'),(2,'Member','2021-01-02 16:33:23','2021-01-02 16:33:23');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'Top Brands','New Collections','Lorem ipsum dolor sit amet, consectetur adipisicing elit.','01.jpg','https://twitter.com','Shop Now','2021-01-02 19:28:37','2021-01-02 19:28:47'),(2,'Top Spring','Women Fashion','Lorem ipsum sir dolor amet.','02.jpg','https://google.com/','Register Now','2021-01-02 19:49:54','2021-01-02 19:49:54');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'Aktif',NULL,NULL),(2,'Tidak Aktif',NULL,NULL);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
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
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Sistem','admin@cilik.id','0',1,NULL,'$2y$10$eJLlR4n.dDDgofrYRh4JF.Z8rq4EYYesgXlQQXelvjAG7ydl4.ljC',NULL,NULL,'Xg6L5PEV14krogXFQGJ41qLBez7hwfZYrGUGtJN0ickPrcPNv1vH5TYnfaVs','2021-01-02 16:33:23','2021-01-02 16:33:23'),(2,'Member','Cilik','member@cilik.id','10',2,NULL,'$2y$10$LH22.II3oTbS3Mb08TtrD.g45wUzQ/IdxMb2rrQI.zrBzm2lHMRry',NULL,NULL,'K2Ev5EixFnYaUu1YH5kW2eEMW1QQcG6nzHJYT8kAfDNJIVICTEzE6qJqZJJ3','2021-01-02 16:33:40','2021-01-03 02:19:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cilik'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-03 16:58:18
