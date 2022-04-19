-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: sistema_servicos
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `anuncios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `preco` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_servico` int DEFAULT NULL,
  `fk_cat_anuncio` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_servico` (`tipo_servico`),
  KEY `fk_cat_anuncio` (`fk_cat_anuncio`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anuncios`
--

LOCK TABLES `anuncios` WRITE;
/*!40000 ALTER TABLE `anuncios` DISABLE KEYS */;
INSERT INTO `anuncios` VALUES (1,'Jardinagem','','ativo',NULL,NULL),(2,'Carros','50,00','inativo',NULL,NULL),(3,'TV','1000','ativo',NULL,NULL),(28,'sdfsdfs','699,66','Inativo',NULL,0),(13,'MICROONDAS','699,66','Ativo',NULL,NULL),(17,'pneu','40,00','Inativo',NULL,NULL),(16,'Pá','108,99','Ativo',NULL,NULL),(19,'motor','6000,00','Inativo',NULL,NULL),(20,'pistao','500,00','Inativo',NULL,NULL),(21,'pistao 2','750,00','Ativo',NULL,NULL),(33,'sdfsdfs','699,66','Ativo',NULL,0),(34,'sdfsdfs','699,66','Ativo',NULL,0),(35,'rdfgdfgd','fdg','Ativo',NULL,0),(36,'rdfgdfgd','fdg','Ativo',NULL,0),(37,'rdfgdfgd','fdg','Inativo',NULL,0),(38,'rdfgdfgd','fdg','Inativo',NULL,0),(42,'rdfgdfgd','fdg','Ativo',NULL,0),(40,'rdfgdfgd','fdg','Inativo',NULL,0),(43,'rdfgdfgd','fdg','Ativo',NULL,0),(44,'e','e','Inativo',NULL,0),(47,'erer','erer','Ativo',NULL,0),(48,'erer','erer','Inativo',NULL,0),(59,'trtr','trtr','Inativo',NULL,0),(60,'update','trtr','Inativo',NULL,0);
/*!40000 ALTER TABLE `anuncios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `area` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_cat_servico` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_cat_servico` (`tipo_cat_servico`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Tecnologia',NULL),(2,'Mecânica',NULL),(3,'Botânica',NULL);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `atividade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

LOCK TABLES `servico` WRITE;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nivel` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `servico_usuario` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `servico_usuario` (`servico_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Geraldo','geg','2e65f2f2fdaf6c699b223c61b1b5ab89','USER',NULL),(2,'Matheus','mat','123','ADM',NULL),(3,'tes','tes','1','USER',NULL),(4,'tes','tes','1','USER',NULL),(5,'tes2','tes2','1','USER',NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-15 12:51:22
