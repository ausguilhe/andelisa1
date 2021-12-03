-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.18-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema andelisa
--

CREATE DATABASE IF NOT EXISTS andelisa;
USE andelisa;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorias`
--

/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`,`nome`,`created_at`,`updated_at`) VALUES 
 (1,'Camisa','2021-09-13 16:24:04','2021-11-29 23:48:59'),
 (2,'Sapato','2021-09-13 16:24:04','2021-09-13 16:02:00'),
 (3,'Short','2021-09-13 16:24:53','2021-09-13 16:02:00'),
 (4,'Tenis','2021-09-13 16:24:53','2021-09-13 16:02:00'),
 (6,'Moleton','2021-09-13 16:30:01','2021-09-13 16:03:00'),
 (7,'Meia','2021-09-13 20:18:42','2021-09-13 20:01:00'),
 (8,'Quepe','2021-09-13 20:18:42','2021-09-13 20:18:42'),
 (9,'Calcinha','2021-10-30 01:05:29','2021-10-30 01:05:29'),
 (10,'Farda1','2021-11-18 16:47:21','2021-11-18 17:11:22'),
 (11,'Meias','2021-11-18 16:51:11','2021-11-18 16:51:11'),
 (12,'Faxina','2021-12-02 13:18:50','2021-12-02 13:18:50');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;


--
-- Definition of table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_documento_unique` (`documento`),
  UNIQUE KEY `clientes_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clientes`
--

/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`,`nome`,`documento`,`endereco`,`telefone`,`email`,`created_at`,`updated_at`) VALUES 
 (1,'Augusto Batista',9536866,'Rua C','21970218719','augusto@gmail.com','2021-11-04 00:38:54','2021-11-04 00:38:54'),
 (2,'Rosilene',13131313,'Rua A','2188888888','ramos@hotmail.com','2021-11-04 00:54:02','2021-11-04 00:54:02'),
 (3,'Fabio Lemos',20202020,'Rua Acre, 10','2122224444','fabio@gmail.com','2021-11-18 22:00:49','2021-11-18 22:00:49'),
 (4,'Catharina Spinoza',21214444,'Rua Show, A','2198987777','catharinaspin@gmail.com','2021-11-29 20:13:04','2021-11-29 20:13:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES 
 (1,'2014_10_12_000000_create_users_table',1),
 (2,'2014_10_12_100000_create_password_resets_table',1),
 (3,'2019_08_19_000000_create_failed_jobs_table',1),
 (4,'2019_12_14_000001_create_personal_access_tokens_table',1),
 (5,'2021_09_13_160954_create_categorias_table',1),
 (6,'2021_09_13_164939_create_produtos_table',1),
 (7,'2021_11_03_214518_create_clientes_table',1),
 (8,'2021_11_26_205049_create_vendas_table',1),
 (9,'2021_11_28_233806_produto_vendidos',1);
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
  `codigo_barras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produtos`
--

/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`,`codigo_barras`,`nome`,`descricao`,`categoria_id`,`preco`,`estoque`,`created_at`,`updated_at`) VALUES 
 (1,'2222','Calça Camuflada','Exercito',1,'50.00',9,'2021-11-29 14:11:43','2021-12-02 23:02:38'),
 (2,'1212','Meia longa','Militar',7,'12.00',2,'2021-11-29 14:13:44','2021-12-02 19:51:47'),
 (3,'1313','Meia longa','Ginastica',7,'12.00',8,'2021-12-02 17:10:03','2021-12-02 23:03:24'),
 (4,'121233','Farda verde','Militar',4,'99.00',10,'2021-11-29 20:16:53','2021-11-29 20:16:53'),
 (5,'12345','Meia soquete','Ginastica',7,'19.00',19,'2021-11-29 23:50:49','2021-11-29 23:53:52');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;


--
-- Definition of table `produtos_vendidos`
--

DROP TABLE IF EXISTS `produtos_vendidos`;
CREATE TABLE `produtos_vendidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_venda` bigint(20) unsigned NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_barras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(9,2) NOT NULL,
  `quantidade` decimal(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_vendidos_id_venda_foreign` (`id_venda`),
  CONSTRAINT `produtos_vendidos_id_venda_foreign` FOREIGN KEY (`id_venda`) REFERENCES `vendas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produtos_vendidos`
--

/*!40000 ALTER TABLE `produtos_vendidos` DISABLE KEYS */;
INSERT INTO `produtos_vendidos` (`id`,`id_venda`,`descricao`,`codigo_barras`,`preco`,`quantidade`,`created_at`,`updated_at`) VALUES 
 (4,9,'Militar','2222','20.00','1.00','2021-11-29 20:17:49','2021-11-29 20:17:49'),
 (5,9,'Militar','1212','12.00','1.00','2021-11-29 20:17:49','2021-11-29 20:17:49'),
 (7,11,'Militar','1212','12.00','1.00','2021-11-29 20:39:06','2021-11-29 20:39:06'),
 (8,11,'Esportivo','1313','99.00','1.00','2021-11-29 20:39:07','2021-11-29 20:39:07'),
 (18,16,'Exercito','2222','50.00','1.00','2021-12-02 23:02:38','2021-12-02 23:02:38'),
 (19,17,'Ginastica','1313','12.00','1.00','2021-12-02 23:03:24','2021-12-02 23:03:24');
/*!40000 ALTER TABLE `produtos_vendidos` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,'Augusto Guilherme de Souza','augustobatistapes@gmail.com',NULL,'$2y$10$grbbDEcsk33dAOuc9S5K7OW1MOSjKGPvmAU9GoO7cduHOzGEv.2ay',NULL,'2021-09-20 20:49:35','2021-09-20 20:49:35'),
 (2,'Andre Neves','andreneves@gmail.com',NULL,'1234',NULL,'2021-11-04 15:22:48','2021-11-04 15:40:03'),
 (3,'Catharina Spinoza','catharinaspin@gmail.com',NULL,'$2y$10$IIvCxkduPbwSWvOXb8llSOXFxkQBsuzIvaC66dIllhtb2vFTbaEzO',NULL,'2021-11-29 23:39:07','2021-11-29 23:39:07'),
 (4,'ana lopes','ana@gmail.com',NULL,'2222ggtt',NULL,'2021-11-29 23:48:10','2021-12-02 22:59:32'),
 (5,'Carlos Luis','carlosl@gmail.com',NULL,'$2y$10$gxN52tTwfh/yIhtLe1qdJ..zjl/OONvoXsepPhSFxDlYNETdgNfwm',NULL,'2021-12-02 12:23:10','2021-12-02 12:23:10'),
 (6,'Juan Ortega','juan@gmail.com',NULL,'ju29gui10',NULL,'2021-12-02 14:29:52','2021-12-02 14:29:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE `vendas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendas_id_cliente_foreign` (`id_cliente`),
  CONSTRAINT `vendas_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendas`
--

/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` (`id`,`id_cliente`,`created_at`,`updated_at`) VALUES 
 (9,1,'2021-11-29 20:17:49','2021-11-29 20:17:49'),
 (11,4,'2021-11-29 20:39:06','2021-11-29 20:39:06'),
 (16,1,'2021-12-02 23:02:38','2021-12-02 23:02:38'),
 (17,4,'2021-12-02 23:03:24','2021-12-02 23:03:24');
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
