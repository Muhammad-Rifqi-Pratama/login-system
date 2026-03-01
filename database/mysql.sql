/*
SQLyog Community v13.3.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - phpdasar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`phpdasar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `phpdasar`;

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nrp` char(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`id`,`nama`,`nrp`,`email`,`jurusan`,`gambar`) values 
(162,'Zulfa Zuariah','029384723','zulfa@gmail.com','Teknik Sipil','69980f4a90870.jpg'),
(167,'Muhammad Rifqi Pratama','02930291','rifqi@gmail.com','Teknik Informatika','69980fa305226.jpg'),
(168,'Zukip Zuama','029302937','zukip@gmail.com','Teknik Mesin','69980f9a04c52.jpg'),
(169,'Zuma Faqi','029302937','zuma@gmail.com','Teknik Industri','69980f7a76daa.jpg'),
(170,'Zulkip Prazuari','09283745','zulkip@gmail.com','zulkip@gmail.com','69980f569dce2.jpg');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`) values 
(1,'rifqi','$2y$10$I.gO8gmf1rP72ltWrTHxGOITYc0JfTy5jePXDVYKY/FT8CG82WYhe'),
(2,'zulfa','$2y$10$bQSxOAX3Ci/hg28137f3DOyi3pKItjFNzzckoHdfh0u9svZIsfDJe'),
(3,'zukip','$2y$10$/q5dOIdMv5NT.bNecUVyc.2RljspnIgRQFMnhKZgpY6dS3mdyDc1C'),
(5,'rifqi pratama','$2y$10$cHHD9V5ZjCJxKE3noP73T.G78Txc/FUFn/Dfjgu8OKnstO5wObCcm'),
(33,'asas','asasa'),
(41,'dfd','fd'),
(42,'bvb','pppp'),
(43,'ds','dd'),
(44,'dss','ss'),
(45,'dsss','ss');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
