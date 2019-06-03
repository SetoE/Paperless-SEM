-- phpMiniAdmin dump 1.9.170730
-- Datetime: 2019-03-28 03:43:43
-- Host: 
-- Database: aai_db

/*!40030 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

DROP TABLE IF EXISTS `sem`;
CREATE TABLE `sem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_needed` datetime NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `purchase_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `purchase_received` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` enum('Pending','Complete') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'Pending',
  `date_edited` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_upload` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `sem` DISABLE KEYS */;
INSERT INTO `sem` VALUES ('1','Test','2019-03-27 19:42:31','2019-03-30 00:00:00','Department','','','Pending','2019-03-28 09:17:10','uploads/1_file.pdf');
/*!40000 ALTER TABLE `sem` ENABLE KEYS */;

DROP TABLE IF EXISTS `sem_category`;
CREATE TABLE `sem_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `value` tinyint(1) NOT NULL,
  `sem_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `sem_category` DISABLE KEYS */;
INSERT INTO `sem_category` VALUES ('1','Travel','0','1'),('2','Furn/Eqpt/Fixt','0','1'),('3','Insurance','0','1'),('4','Preventive_Maintenance','0','1'),('5','Repair','0','1'),('6','Software_Licenses','0','1'),('7','Supplies/Materials','1','1'),('8','Uniform/PPE','0','1'),('9','asdasdad','1','1');
/*!40000 ALTER TABLE `sem_category` ENABLE KEYS */;

DROP TABLE IF EXISTS `sem_request`;
CREATE TABLE `sem_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sem_id` int(11) NOT NULL,
  `quantity_with_oum` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `remarks_or_purpose` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `sem_request` DISABLE KEYS */;
INSERT INTO `sem_request` VALUES ('1','1','asdad','asdasda','asdada'),('2','1','asdad','asdad','asd');
/*!40000 ALTER TABLE `sem_request` ENABLE KEYS */;

DROP TABLE IF EXISTS `sem_type`;
CREATE TABLE `sem_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) NOT NULL,
  `value` tinyint(1) NOT NULL,
  `sem_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `sem_type` DISABLE KEYS */;
INSERT INTO `sem_type` VALUES ('1','regular','0','1'),('2','emergency','0','1'),('3','budgeted','1','1'),('4','unbudgeted','0','1');
/*!40000 ALTER TABLE `sem_type` ENABLE KEYS */;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(255) NOT NULL,
  `data` text,
  `ip` varchar(45) DEFAULT NULL,
  `agent` varchar(300) DEFAULT NULL,
  `stamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('cj79bdii87r3gm7ks4mmop1oa2','','192.168.1.7','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.79','1553678115'),('da2mop573insouaqho282o4de7','routeback|s:30:\"/order/1/add/purchase_received\";user|s:5:\"admin\";','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36 OPR/58.0.3135.118','1553736252');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('2','admin','$2y$10$GpwuE/Bjdd5A7L7ZYufDv.kLM5f1Wrc291E/ww25kozN0Hlq20QZq','2019-03-19 08:42:28','Admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;


-- phpMiniAdmin dump end
