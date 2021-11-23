-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.21-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema andelisa1
--

CREATE DATABASE IF NOT EXISTS andelisa1;
USE andelisa1;

--
-- Definition of table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorias`
--

/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`,`nome`,`created_at`,`updated_at`) VALUES 
 (1,'Camisa','2021-09-13 16:24:04','2021-09-13 16:02:00'),
 (2,'Sapato','2021-09-13 16:24:04','2021-09-13 16:02:00'),
 (3,'Short','2021-09-13 16:24:53','2021-09-13 16:02:00'),
 (4,'Tenis','2021-09-13 16:24:53','2021-09-13 16:02:00'),
 (5,'Calça','2021-09-13 16:30:01','2021-10-30 00:06:07'),
 (6,'Moleton','2021-09-13 16:30:01','2021-09-13 16:03:00'),
 (7,'Meia','2021-09-13 20:18:42','2021-09-13 20:01:00'),
 (8,'Quepe','2021-09-13 20:18:42','2021-09-13 20:18:42'),
 (9,'Calcinha','2021-10-30 01:05:29','2021-10-30 01:05:29');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;


--
-- Definition of table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` int(13) NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_documento_unique` (`documento`),
  UNIQUE KEY `clientes_telefone_unique` (`telefone`),
  UNIQUE KEY `clientes_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clientes`
--

/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`,`nome`,`documento`,`endereco`,`telefone`,`email`,`created_at`,`updated_at`) VALUES 
 (1,'Augusto Batista',9536866,'Rua C','21970218719','augusto@gmail.com','2021-11-04 00:38:54','2021-11-04 00:38:54'),
 (2,'Rosilene',13131313,'Rua A','2188888888','ramos@hotmail.com','2021-11-04 00:54:02','2021-11-04 00:54:02'),
 (3,'Marcos lopes',90909,'Rua D, 25','2124244848','marcos@email.com','2021-11-22 17:56:48','2021-11-22 17:56:48');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


--
-- Definition of table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;


--
-- Definition of table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES 
 (5,'2021_09_06_200353_create_produtos_table',1),
 (6,'2021_09_13_142938_create_categorias_table',2),
 (8,'2021_09_13_161329_create_produtos_table',4),
 (16,'2014_10_12_000000_create_users_table',5),
 (17,'2014_10_12_100000_create_password_resets_table',5),
 (18,'2019_08_19_000000_create_failed_jobs_table',5),
 (19,'2019_12_14_000001_create_personal_access_tokens_table',5),
 (20,'2021_09_13_160954_create_categorias_table',5),
 (21,'2021_09_13_164939_create_produtos_table',5),
 (22,'2021_10_28_205049_create_vendas_table',6),
 (23,'2021_11_03_214518_create_clientes_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


--
-- Definition of table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


--
-- Definition of table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;


--
-- Definition of table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produtos`
--

/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`,`nome`,`descricao`,`categoria_id`,`created_at`,`updated_at`,`preco`) VALUES 
 (1,'Camisa de gola polo','Camisa',1,'2021-09-13 16:52:12','2021-09-13 16:05:00',NULL),
 (2,'Camisa Regata','Camisa',1,'2021-09-13 16:52:12','2021-09-13 16:05:00',NULL),
 (3,'Sapato tam. 42','Sapato',2,'2021-09-13 16:52:12','2021-11-22 19:32:57','25.00'),
 (4,'Camisa Preta','Camisa',1,'2021-09-13 20:18:42','2021-09-13 20:01:00',NULL),
 (5,'Sapato Tam. 40','Sapato',2,'2021-09-13 20:18:42','2021-11-18 22:54:13','60.00'),
 (7,'Sapatenis','Sapatenis',2,'2021-11-02 14:52:23','2021-11-02 14:53:56','70.00'),
 (8,'Moleton G','Esportivo',6,'2021-11-02 14:54:39','2021-11-02 14:54:39','89.00');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`nome`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,'Augusto Guilherme de Souza','augustobatistapes@gmail.com',NULL,'$2y$10$grbbDEcsk33dAOuc9S5K7OW1MOSjKGPvmAU9GoO7cduHOzGEv.2ay',NULL,'2021-09-20 20:49:35','2021-09-20 20:49:35'),
 (2,'Andre Neves','andreneves@gmail.com',NULL,'1234',NULL,'2021-11-04 15:22:48','2021-11-04 15:40:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE `vendas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `numero_vendas` int(11) NOT NULL,
  `data_criacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_alteracao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_id` bigint(20) unsigned NOT NULL,
  `produto_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendas`
--

/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` (`id`,`numero_vendas`,`data_criacao`,`data_alteracao`,`cliente_id`,`produto_id`) VALUES 
 (1,2,'2021-11-13','2021-11-13',1,1),
 (2,4,'2021-11-13 23:42:40','2021-11-13 23:42:40',2,8),
 (3,4,'2021-11-13 23:42:58','2021-11-13 23:42:58',1,1),
 (4,4,'2021-11-13 23:43:09','2021-11-13 23:43:09',2,2),
 (5,10,'2021-11-14 01:00:32','2021-11-14 01:00:32',1,1),
 (6,2,'2021-11-18 22:25:33','2021-11-18 22:25:33',1,1),
 (7,2,'2021-11-18 22:47:15','2021-11-18 22:47:15',2,7),
 (8,5,'2021-11-22 17:24:42','2021-11-22 17:24:42',2,8);
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
