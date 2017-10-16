-- MySQL dump 10.13  Distrib 5.6.14, for osx10.7 (x86_64)
--
-- Host: localhost    Database: ano
-- ------------------------------------------------------
-- Server version	5.6.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_groups`
--

DROP TABLE IF EXISTS `admin_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_group_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_groups`
--

LOCK TABLES `admin_groups` WRITE;
/*!40000 ALTER TABLE `admin_groups` DISABLE KEYS */;
INSERT INTO `admin_groups` VALUES (1,'#','总经办',1,'2017-04-17 03:44:15','2017-05-01 05:21:45',NULL),(2,'#','商务部',1,'2017-04-17 04:16:18','2017-04-17 04:16:18',NULL),(3,'2','市场部',1,'2017-04-17 04:16:53','2017-04-17 04:16:53',NULL),(4,'2','推广部',1,'2017-04-17 05:29:25','2017-04-17 07:07:16',NULL);
/*!40000 ALTER TABLE `admin_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_priviledges`
--

DROP TABLE IF EXISTS `admin_priviledges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_priviledges` (
  `admin_role_id` int(11) DEFAULT NULL,
  `system_menu_id` int(11) DEFAULT NULL,
  `system_resource_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_priviledges`
--

LOCK TABLES `admin_priviledges` WRITE;
/*!40000 ALTER TABLE `admin_priviledges` DISABLE KEYS */;
INSERT INTO `admin_priviledges` VALUES (2,1,3),(4,2,2),(1,1,3),(1,1,4),(1,1,9),(1,1,16),(1,1,17),(1,1,18),(1,1,19),(1,1,20),(1,2,1),(1,2,2),(1,2,5),(1,2,6),(1,2,7),(1,2,8),(1,2,10),(1,2,11),(1,2,12),(1,2,13),(1,2,14),(1,2,15),(1,3,21),(1,3,22),(1,3,23);
/*!40000 ALTER TABLE `admin_priviledges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role_menu`
--

DROP TABLE IF EXISTS `admin_role_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role_menu` (
  `admin_role_id` int(11) DEFAULT NULL,
  `system_menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (2,1),(4,2),(1,1),(1,2),(1,3);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'超级管理员',1,'2017-05-01 06:55:01','2017-05-03 07:14:23',NULL),(2,'系统管理员',1,'2017-05-01 20:20:42','2017-05-01 20:20:42',NULL),(4,'订单管理员',1,'2017-05-03 06:46:41','2017-05-03 06:46:41',NULL);
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_id` varchar(100) DEFAULT NULL,
  `admin_group_id` varchar(45) DEFAULT NULL,
  `label` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_ip` varchar(12) DEFAULT NULL,
  `remember_token` varchar(200) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'1,2,4',NULL,'熊彪','admin','$2y$10$G3wigEeBmz.hvtGPfs2LGODFzXSjWJYhzoJA4L2g/86yyTecTkoDy',1,'2017-04-14 06:16:38','2017-10-16 07:37:53','2017-10-16 07:37:53',NULL,'127.0.0.1','nRwpQB7oTzr34dPA5nYybF3PJ9Q91d9hIHakntQlG2s3Xlv0kGUVyH47ZHO7',NULL),(2,NULL,NULL,'熊雄','sion','123456',1,'2017-04-14 21:22:47','2017-05-05 09:09:04',NULL,NULL,NULL,NULL,'/upload/admin/avatar/S5pZEIfBLmgLgrISK59DGM1iZH43sohB7aSLBSQj/494043768.jpg'),(3,'1',NULL,'haha','hoho','$2y$10$OwZgUN2u/tV3xYNCDeRLVeiwAds3y6si/BqIjbUe0fP64hlnr0sOC',1,'2017-04-17 18:04:00','2017-05-03 07:12:39',NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,'熊彪','biao','$2y$10$PlbyZUvrupo6CzJDhElLOOoNiYA5UGC/D9ZsNlhJAxd3.kPrF8P9u',1,'2017-05-04 08:13:50','2017-05-04 08:41:58',NULL,NULL,NULL,NULL,NULL),(5,'1',NULL,'熊雄','xiong','$2y$10$5oh65SzMDanjx/txurzOLO3.pPHZlqY8kJ.efNwN0ddXKVUDXdpda',1,'2017-05-04 08:23:04','2017-07-03 17:08:51','2017-07-03 17:07:57',NULL,'127.0.0.1','X4dmJmtE3yQA9SwLGOfvWCm2yNRhbHg0wGEbql0nnuiYRDmH8LyvtDnIh3h0',NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_menus`
--

DROP TABLE IF EXISTS `system_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `icon` varchar(10) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_menus`
--

LOCK TABLES `system_menus` WRITE;
/*!40000 ALTER TABLE `system_menus` DISABLE KEYS */;
INSERT INTO `system_menus` VALUES (1,'系统设置','cog',1,'2017-05-01 08:27:46','2017-05-04 02:49:43',NULL),(2,'管理员设置','user',1,'2017-05-01 17:26:19','2017-05-04 03:05:22',NULL),(3,'Kong管理','flask',1,'2017-05-26 00:29:28','2017-05-26 00:29:28',NULL);
/*!40000 ALTER TABLE `system_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_resources`
--

DROP TABLE IF EXISTS `system_resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_resources` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `is_menu` tinyint(1) DEFAULT NULL,
  `pattern` varchar(100) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `system_menu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_resources`
--

LOCK TABLES `system_resources` WRITE;
/*!40000 ALTER TABLE `system_resources` DISABLE KEYS */;
INSERT INTO `system_resources` VALUES (1,'管理员新增',0,'admin/create','button',1,'2017-05-01 17:58:08','2017-05-04 08:26:43',NULL,2),(2,'管理员修改',0,'admin/edit','button',1,'2017-05-01 18:57:36','2017-05-04 05:00:08',NULL,2),(3,'菜单管理',1,'system/menu','menu',1,'2017-05-03 06:50:09','2017-05-04 05:00:27',NULL,1),(4,'权限操作管理',1,'system/resource','menu',1,'2017-05-04 02:57:54','2017-05-04 05:00:41',NULL,1),(5,'管理员管理',1,'admin','menu',1,'2017-05-04 02:59:50','2017-05-04 02:59:50',NULL,2),(6,'角色管理',1,'admin/role','menu',1,'2017-05-04 05:02:31','2017-05-04 05:02:31',NULL,2),(7,'管理员组管理',1,'admin/group','menu',1,'2017-05-04 05:03:15','2017-05-04 05:03:15',NULL,2),(8,'角色修改',NULL,'admin/role/edit','action',1,'2017-05-04 07:15:07','2017-05-04 07:15:07',NULL,2),(9,'权限操作修改',NULL,'system/resource/edit','action',1,'2017-05-04 08:25:19','2017-05-04 08:25:19',NULL,1),(10,'管理员删除',NULL,'admin/delete','action',1,'2017-05-04 08:27:07','2017-05-04 08:27:07',NULL,2),(11,'角色新增',NULL,'admin/role/create','button',1,'2017-05-04 08:31:02','2017-05-04 08:31:02',NULL,2),(12,'角色删除',NULL,'admin/role/delete','action',1,'2017-05-04 08:31:25','2017-05-04 08:31:25',NULL,2),(13,'管理员组新增',NULL,'admin/group/create','button',1,'2017-05-04 08:32:58','2017-05-04 08:32:58',NULL,2),(14,'管理员组删除',NULL,'admin/group/delete','action',1,'2017-05-04 08:33:18','2017-05-04 08:33:18',NULL,2),(15,'管理员组修改',NULL,'admin/group/edit','action',1,'2017-05-04 08:33:46','2017-05-04 08:33:46',NULL,2),(16,'菜单新增',NULL,'system/menu/create','button',1,'2017-05-04 08:35:15','2017-05-04 08:35:15',NULL,1),(17,'菜单删除',NULL,'system/menu/delete','action',1,'2017-05-04 08:35:53','2017-05-04 08:35:53',NULL,1),(18,'菜单修改',NULL,'system/menu/edit','action',1,'2017-05-04 08:36:16','2017-05-04 08:36:16',NULL,1),(19,'权限操作新增',NULL,'system/resource/create','button',1,'2017-05-04 08:36:59','2017-05-04 08:36:59',NULL,1),(20,'权限操作删除',NULL,'system/resource/delete','action',1,'2017-05-04 08:37:36','2017-05-04 08:37:36',NULL,1),(21,'API',1,'kong/api','menu',1,'2017-05-26 00:31:18','2017-05-26 23:54:26',NULL,3),(22,'使用者',1,'kong/consumer','menu',1,'2017-05-26 00:32:00','2017-05-26 23:54:47',NULL,3),(23,'插件',1,'kong/plugin','menu',1,'2017-05-26 00:32:18','2017-05-26 23:55:01',NULL,3);
/*!40000 ALTER TABLE `system_resources` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-16 23:39:20
