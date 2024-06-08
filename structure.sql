CREATE DATABASE  IF NOT EXISTS `abcs_tecnicos` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `abcs_tecnicos`;
-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: abcs_tecnicos
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `administracao`
--

DROP TABLE IF EXISTS `administracao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administracao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rua` varchar(70) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `data_criacao` datetime NOT NULL,
  `url_imagem_usuario` varchar(255) DEFAULT 'sem_foto.jpg',
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  `tentativas_login` int(11) DEFAULT 0,
  `ip_tentativa_login` varchar(255) DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administracao`
--

LOCK TABLES `administracao` WRITE;
/*!40000 ALTER TABLE `administracao` DISABLE KEYS */;
INSERT INTO `administracao` VALUES (1,'Rodrigo','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin@admin.com','$2y$10$tblJuvk.kLWVSrL9UOIL4OZ6KOJi0/ilKQjmBbN2HzpSe75CLIeji',NULL,'0000-00-00 00:00:00','rodrigo.jpg',0,0,NULL,'0000-00-00 00:00:00'),(105,'321231','3.122-13','123213','21132-13','31213','321123','2312',NULL,'123321','rodrigo@gmail.com','','(12) 31231-321','2024-05-10 21:27:49','d4f7c0f2227ff588b41da47e72c62139.png',1,0,NULL,NULL),(106,'123213321','1.233.212-13','213','21321-3','12321','123123','312231',NULL,'213321','admin@admin.com	','',NULL,'2024-05-10 21:28:44','sem_foto.jpg',1,0,NULL,NULL),(107,'12312321','123.123.123-21','213123','12312-3','123123','213213','132123',NULL,'213312132','123123312123','',NULL,'2024-05-10 21:32:10','sem_foto.jpg',0,0,NULL,NULL),(108,'Rodrigo','123.123.211-31','Rua São Geraldo','07131-030','24','Jardim São Paulo','Guarulhos',NULL,'24','rodrigo.focuspublicidade@gmail.com','',NULL,'2024-05-13 14:45:56','sem_foto.jpg',1,0,NULL,NULL),(109,'Rodrigo','350.118.298-80','Rua Rio Novo','07131-020','24','Jardim São Paulo','Guarulhos',NULL,'','kevin@gmail.com','rodrigo12',NULL,'2024-05-13 14:52:33','sem_foto.jpg',1,0,NULL,NULL),(110,'Rodrigo','213.123.123-21','Rua São Geraldo','07131-030','24','Jardim São Paulo','Guarulhos',NULL,'','admin@admin.com21','$2y$10$ishPoapDfqVgHMbpEp5if.IjOzSoWn.0DsCd09dTIM5C2Vhp4wJva',NULL,'2024-05-13 14:53:27','sem_foto.jpg',1,0,NULL,NULL),(111,'Rodrigo','232.112.213-31','Rua São Geraldo','07131-030','24','Jardim São Paulo','Guarulhos',NULL,'','21313123132@gmail.com','$2y$10$Dt.oesfPjV08DaNDftNvt.l3q1Imhf1R6WaAi82av0T9eMBjFVwXq',NULL,'2024-05-13 15:08:46','sem_foto.jpg',1,0,NULL,NULL),(112,'Rodrigo','123.312.312-12','Rua São Geraldo','07131-030','24','Jardim São Paulo','Guarulhos',NULL,'','admin@admin.com22','$2y$10$ngUg4qBarLdMmfuvWvIiquD0.14fZnZaek9mF.SKT4QyeKekhOS2G',NULL,'2024-05-13 15:29:02','sem_foto.jpg',1,0,NULL,NULL),(113,'Rodrigo','214.211.313-21','Rua São Geraldo','07131-030','24','Jardim São Paulo','Guarulhos',NULL,'','admin@admin.com23','$2y$10$WQaGrrHDNPXp3tAWJwnoT.ErADbv2Jgwa.Zo5815.o8c8C6Z9iazm',NULL,'2024-05-13 15:33:01','sem_foto.jpg',1,0,NULL,NULL),(114,'Rodrigo','213.123.312-32','Rua Rio Novo','07131-020','24','Jardim São Paulo','Guarulhos',NULL,'','admin@admin.co2m','$2y$10$k4ChIK9oZmnDRYUCJkgX8e76vNNWLctFcQmVAlGXweHTo3favaotS',NULL,'2024-05-13 15:34:56','sem_foto.jpg',1,0,NULL,NULL),(115,'231213123','132.312.131-33','...','23123-132','24','...','...',NULL,'...','admin@213admin.com','$2y$10$k30/PKDxazQVFRlgr6RsyewPz5S/ScoNPofGqi4XW6D7oZYe1LD22',NULL,'2024-05-13 15:35:46','sem_foto.jpg',1,0,NULL,NULL),(116,'Rodrigo','213.123.221-31','...2','12321-321','24','...','...',NULL,'...','admin@admin.com213123','$2y$10$wuyypuYZ6iprWPvGQVYuBOXX7ePc/4t6i1MH7lr3E292ZbpZfs0xm','(21) 31231-2321','2024-05-13 15:38:16','920cc5b91ab3a8960bf25beb50c56d9a.jpg',0,0,NULL,NULL),(117,'Guilherme','321.012.013-20','Rua São Geraldo','07131-030','24','Jardim São Paulo','Guarulhos',NULL,'','guilherme.focuspublicidade@gmail.com','$2y$10$3H.FhOH5G4amDvuYC9Wd6.DRQRSam6JEDdcIeDSzlCMuEWUWVbmjW',NULL,'2024-05-13 15:42:14','8d0134c384e219f860a8c02aed0cafea.jpg',0,0,NULL,NULL);
/*!40000 ALTER TABLE `administracao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('4gdbg7ttucfqsspihc3kgtd4mkbnn6oi','::1',1715344570,'__ci_last_regenerate|i:1715344570;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('n7bq0fiodcbuhc1kbq7ik2lglak9effh','::1',1715345208,'__ci_last_regenerate|i:1715345208;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('8dkps9qu305pvgbu3ths3mktqh8g6aeo','::1',1715345700,'__ci_last_regenerate|i:1715345700;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('k2ens8t7kf719qnvr3lo6dskqmb4fe5t','::1',1715346012,'__ci_last_regenerate|i:1715346012;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('v5kndua380gjtna856pgu6po18e325hg','::1',1715346143,'__ci_last_regenerate|i:1715346012;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('0ho4i8d2853ai4ok79c1bv7k5g6krgk5','::1',1715346338,'__ci_last_regenerate|i:1715346247;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('o9b9gh7sg1bia8o97mpnk3abn91rhnrh','::1',1715346870,'__ci_last_regenerate|i:1715346870;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('9706hhlkk2olj6jr0lg0g1ra0u3u7c9r','::1',1715347179,'__ci_last_regenerate|i:1715347179;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('q14h04gjccvl7idi39odnia12s2ftrhp','::1',1715348125,'__ci_last_regenerate|i:1715348125;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('bm0cum12q9cis7naqsej34ppbdgdujv6','::1',1715348606,'__ci_last_regenerate|i:1715348606;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('5nnb3r67vn1jv013t7dd2ghr5fbpc6cg','::1',1715348979,'__ci_last_regenerate|i:1715348979;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('jh53nbiesa3f8b0r0248bq5ao6b81tge','::1',1715349514,'__ci_last_regenerate|i:1715349514;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('t66h3e33squba5bffcb3lk7mcj1ni0s7','::1',1715349824,'__ci_last_regenerate|i:1715349824;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('2s16kdqnvl6molmnlvgncdrv5nunk6us','::1',1715352079,'__ci_last_regenerate|i:1715352079;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('ss05ma0rni9tg0anb4e5q757f4gi7lej','::1',1715353072,'__ci_last_regenerate|i:1715353072;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('3dgsdaorsse3c3m50cvdmvugfs8vgjg7','::1',1715356947,'__ci_last_regenerate|i:1715356947;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('rg650i43ko5t8a59mfhsp7il1otakeha','::1',1715357669,'__ci_last_regenerate|i:1715357669;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('o7lb40bm3v5ur80r7gdl6tk3p78uu0t3','::1',1715358336,'__ci_last_regenerate|i:1715358336;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('i6n7oruefrarc2q4o9krhetkkrk0n8ut','::1',1715358663,'__ci_last_regenerate|i:1715358663;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('len9mnumuk3erjplm7ej9mkdra04fhne','::1',1715358965,'__ci_last_regenerate|i:1715358965;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('5f2cinn9svql1r9g1rpqjsqbjiren17q','::1',1715359479,'__ci_last_regenerate|i:1715359479;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('957kp63a4inup4jb791vssf71e5kdjft','::1',1715359801,'__ci_last_regenerate|i:1715359801;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('8m0rk10ja1j7k07gdn99ffkb6hdlh434','::1',1715360315,'__ci_last_regenerate|i:1715360315;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('gs8i45t4gmoo4qdaeukvt05ijsh4cqmg','::1',1715360662,'__ci_last_regenerate|i:1715360662;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('pd0nr1ve6gb6k3rlp3enbg22iaeb0clg','::1',1715360976,'__ci_last_regenerate|i:1715360976;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('5j6n5gvs27f96qnv135r1du0i3te6gv2','::1',1715361334,'__ci_last_regenerate|i:1715361334;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('sspsjc1uds4drqvg88o3re73kh7sltfa','::1',1715361636,'__ci_last_regenerate|i:1715361636;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('nnkm972verkdapre1uorll7imeunripj','::1',1715361954,'__ci_last_regenerate|i:1715361954;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('rvm6tv33ukpm68kb8a9qarknq6acjna3','::1',1715362990,'__ci_last_regenerate|i:1715362990;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;error|s:82:\"Erro ao fazer upload do arquivo, verifique se a extensão do arquivo é permitida.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"old\";}'),('v0v4n2jf6qr12enkv7a8t6hag76ece3b','::1',1715366105,'__ci_last_regenerate|i:1715366105;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;error|s:82:\"Erro ao fazer upload do arquivo, verifique se a extensão do arquivo é permitida.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"old\";}'),('6b92u1tmo4cgetnih1btl7lvos9ee917','::1',1715366418,'__ci_last_regenerate|i:1715366418;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('5nc3u7clns8sprhdq2vijlu4v2rjuce8','::1',1715366758,'__ci_last_regenerate|i:1715366758;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;error|s:82:\"Erro ao fazer upload do arquivo, verifique se a extensão do arquivo é permitida.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"old\";}'),('7h3iirm3lchpfhg6mqcig2ql2oe8h8uh','::1',1715367224,'__ci_last_regenerate|i:1715367224;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;error|s:82:\"Erro ao fazer upload do arquivo, verifique se a extensão do arquivo é permitida.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"new\";}'),('l731mjpfc3qs8djurekppfpnr4r60ud1','::1',1715367557,'__ci_last_regenerate|i:1715367557;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('ee40nn8dhuk6sadaflg2cgntlih96mia','::1',1715368478,'__ci_last_regenerate|i:1715368478;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('4eb06t9u2pprthm3e5ub0t8unalr04pb','::1',1715368909,'__ci_last_regenerate|i:1715368909;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('t4r9lfo50uocj4lrrjmo1rt7knv7r2sb','::1',1715369213,'__ci_last_regenerate|i:1715369213;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('5enj5baued2nvfrsho1vhi967lvapshv','::1',1715369518,'__ci_last_regenerate|i:1715369518;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('491b2bjmuvelpuj5295jhvcls6b2duth','::1',1715369775,'__ci_last_regenerate|i:1715369518;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('ihv6rtjeqmk44922lp21tb1fp9sq58qu','::1',1715604030,'__ci_last_regenerate|i:1715604030;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('85145tfdsn129tgvd7lsoh4ud65njptv','::1',1715604500,'__ci_last_regenerate|i:1715604500;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('2ncvv4nls22lnvur634n62vq34590aq0','::1',1715605171,'__ci_last_regenerate|i:1715605171;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('i3lbthp2mllb1ohl5dulin5ror0hvm7a','::1',1715605592,'__ci_last_regenerate|i:1715605592;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('tks56v36seo0810u3cfbc1cnbi1l79m1','::1',1715605897,'__ci_last_regenerate|i:1715605897;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('ld5jvsnicbhq0r10i1esp7f2nt5mj2ha','::1',1715606217,'__ci_last_regenerate|i:1715606217;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('bmfdt2ghp2t4qf4div4a9fud3sd70sh3','::1',1715606611,'__ci_last_regenerate|i:1715606611;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('1mehdbebdgn3q28b3aq12goa36od0mcu','::1',1715607157,'__ci_last_regenerate|i:1715607157;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;error|s:82:\"Erro ao fazer upload do arquivo, verifique se a extensão do arquivo é permitida.\";__ci_vars|a:1:{s:5:\"error\";s:3:\"new\";}'),('kqgfbrd5kruh2h4iao33v7bhn5f5ho0s','::1',1715607475,'__ci_last_regenerate|i:1715607475;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('ufmhnl0sl9nov9m4kvuggpn4ev89rgv7','::1',1715607803,'__ci_last_regenerate|i:1715607803;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('88cmtno84mdq38ae2s7mgff326660e8k','::1',1715608145,'__ci_last_regenerate|i:1715608145;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('9r148bjnnpdlajq29qneato55c46ob98','::1',1715608518,'__ci_last_regenerate|i:1715608518;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('8thbuhoaguc3si0oiqcckcjbkpfr7ap7','::1',1715609023,'__ci_last_regenerate|i:1715609023;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('rqtrehfmkmcqdbs76i63paqqmrpjecg4','::1',1715609462,'__ci_last_regenerate|i:1715609462;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('in32aa2d09rigs2v29nuec2esg3sacto','::1',1715609810,'__ci_last_regenerate|i:1715609810;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('hmgfb94r3kbgcm0ot7pu4m8kuh96ll86','::1',1715610525,'__ci_last_regenerate|i:1715610525;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('loli7eb78k90ls41d6o5bpcv91q5i93n','::1',1715611324,'__ci_last_regenerate|i:1715611324;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('7kt5vh0q2rp1rhusccsuqlck7iiq3o7c','::1',1715611678,'__ci_last_regenerate|i:1715611678;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('7k1vsn6oa6r1g9kdl538s698h2qo68ek','::1',1715612008,'__ci_last_regenerate|i:1715612008;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('n852mdpgkl76p0bam85qqrspns8m9v9e','::1',1715612318,'__ci_last_regenerate|i:1715612318;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('b6jc9ilvnj6a8hfl84eps0svuf7ejtji','::1',1715616370,'__ci_last_regenerate|i:1715616370;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('os6d5cnsmgfnogrb8cp57vblrr289bvd','::1',1715616724,'__ci_last_regenerate|i:1715616724;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('rj9lbbq2jv2mc04j916pg16moonmppf2','::1',1715617031,'__ci_last_regenerate|i:1715617031;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('dhogtddv0skvhs34l5c5rfvctimrrptb','::1',1715617932,'__ci_last_regenerate|i:1715617932;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;'),('q0h30s16p8qbc5dstvheiskg401p8t95','::1',1715617932,'__ci_last_regenerate|i:1715617932;id|s:1:\"1\";nome|s:7:\"Rodrigo\";email|s:15:\"admin@admin.com\";url_image_user_admin|s:11:\"rodrigo.jpg\";logado|b:1;admin|b:1;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `tarefa` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'Rodrigo','Logou no sistema','2024-04-11','16:36:44','::1'),(2,'Rodrigo','Logou no sistema','2024-04-11','16:36:51','::1'),(3,'Rodrigo','Logou no sistema','2024-04-11','16:37:26','::1'),(4,'Rodrigo','Logou no sistema','2024-04-11','16:42:46','::1'),(5,'Rodrigo','Logou no sistema','2024-04-11','16:43:36','::1'),(6,'Rodrigo','Logou no sistema','2024-04-11','20:28:46','::1'),(7,'Rodrigo','Logou no sistema','2024-04-12','14:40:13','::1'),(8,'Rodrigo','Logou no sistema','2024-04-12','14:40:31','::1'),(9,'Rodrigo','Logou no sistema','2024-04-12','20:06:11','::1'),(10,'Rodrigo','Logou no sistema','2024-04-12','20:37:18','::1'),(11,'Rodrigo','Logou no sistema','2024-04-16','14:06:39','::1'),(12,'Rodrigo','Logou no sistema','2024-04-16','18:47:17','::1'),(13,'Rodrigo','Logou no sistema','2024-04-16','20:53:08','::1'),(14,'Rodrigo','Logou no sistema','2024-04-17','16:21:10','::1'),(15,'Rodrigo','Logou no sistema','2024-04-18','15:17:34','::1'),(16,'Rodrigo','Logou no sistema','2024-04-18','16:40:54','::1'),(17,'Rodrigo','Logou no sistema','2024-04-18','20:40:39','::1'),(18,'Rodrigo','Logou no sistema','2024-04-18','21:04:10','::1'),(19,'Rodrigo','Logou no sistema','2024-04-18','21:04:14','::1'),(20,'Rodrigo','Logou no sistema','2024-04-18','21:04:29','::1'),(21,'Rodrigo','Logou no sistema','2024-04-18','21:04:32','::1'),(22,'Rodrigo','Logou no sistema','2024-05-07','16:12:10','::1'),(23,'Rodrigo','Logou no sistema','2024-05-07','18:44:18','::1'),(24,'Rodrigo','Logou no sistema','2024-05-07','18:44:21','::1'),(25,'Rodrigo','Logou no sistema','2024-05-07','18:44:35','::1'),(26,'Rodrigo','Logou no sistema','2024-05-07','18:44:49','::1'),(27,'Rodrigo','Logou no sistema','2024-05-07','18:45:29','::1'),(28,'Rodrigo','Logou no sistema','2024-05-08','13:29:13','::1'),(29,'Rodrigo','Logou no sistema','2024-05-09','13:35:33','::1'),(30,'Rodrigo','Logou no sistema','2024-05-09','13:42:53','::1'),(31,'Rodrigo','Logou no sistema','2024-05-09','14:15:01','::1'),(32,'Rodrigo','Logou no sistema','2024-05-09','14:21:32','::1'),(33,'Rodrigo','Logou no sistema','2024-05-09','14:24:41','::1'),(34,'Rodrigo','Logou no sistema','2024-05-09','20:56:45','::1'),(35,'Rodrigo','Logou no sistema','2024-05-10','13:50:32','::1'),(36,'Rodrigo','Logou no sistema','2024-05-10','15:03:20','::1'),(37,'Rodrigo','Logou no sistema','2024-05-10','15:05:38','::1'),(38,'Rodrigo','Logou no sistema','2024-05-10','15:07:01','::1'),(39,'Rodrigo','Logou no sistema','2024-05-13','14:34:08','::1'),(40,'Rodrigo','Reativou o administrador ','2024-05-13','16:16:49','::1'),(41,'Rodrigo','Desativou o administrador ','2024-05-13','16:16:53','::1'),(42,'Rodrigo','Desativou o administrador ','2024-05-13','16:17:01','::1'),(43,'Rodrigo','Desativou o administrador ','2024-05-13','16:17:47','::1'),(44,'Rodrigo','Desativou o administrador ','2024-05-13','16:20:54','::1'),(45,'Rodrigo','Desativou o administrador ','2024-05-13','16:21:07','::1'),(46,'Rodrigo','Desativou o administrador Guilherme','2024-05-13','16:28:11','::1'),(47,'Rodrigo','Reativou o administrador Guilherme','2024-05-13','16:28:47','::1'),(48,'Rodrigo','Editou o administrador 321231','2024-05-13','18:16:16','::1'),(49,'Rodrigo','Editou o administrador 321231','2024-05-13','18:16:44','::1'),(50,'Rodrigo','Editou o administrador 321231','2024-05-13','18:16:52','::1'),(51,'Rodrigo','Editou o administrador 321231','2024-05-13','18:16:59','::1'),(52,'Rodrigo','Editou o administrador 321231','2024-05-13','18:17:10','::1'),(53,'Rodrigo','Reativou o administrador Rodrigo','2024-05-13','18:17:56','::1'),(54,'Rodrigo','Editou o administrador Rodrigo','2024-05-13','18:18:05','::1'),(55,'Rodrigo','Reativou o administrador 12312321','2024-05-13','18:32:11','::1');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rua` varchar(70) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `data_criacao` datetime NOT NULL,
  `permissao_id` int(11) NOT NULL,
  `url_imagem_usuario` varchar(255) DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  `tentativas_login` int(11) DEFAULT 0,
  `ip_tentativa_login` varchar(255) DEFAULT NULL,
  `ultimo_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Rodrigo','',NULL,NULL,NULL,NULL,NULL,NULL,'admin@admin.com','$2y$10$tblJuvk.kLWVSrL9UOIL4OZ6KOJi0/ilKQjmBbN2HzpSe75CLIeji',NULL,NULL,'0000-00-00 00:00:00',1,NULL,0,2,'::1','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-14  9:13:04
