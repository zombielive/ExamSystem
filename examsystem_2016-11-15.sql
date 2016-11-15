# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 10.0.17-MariaDB)
# Database: examsystem
# Generation Time: 2016-11-15 08:26:09 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table exam
# ------------------------------------------------------------

DROP TABLE IF EXISTS `exam`;

CREATE TABLE `exam` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL COMMENT '考试名称，不能重复',
  `num` int(11) DEFAULT NULL COMMENT '试题数量',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;

INSERT INTO `exam` (`id`, `name`, `num`)
VALUES
	(1,'第一次全国广播体操',7),
	(2,'全国眼保健操大会',10),
	(6,'天下第一武道会',17),
	(9,'广场舞黄金联赛',15);

/*!40000 ALTER TABLE `exam` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table option
# ------------------------------------------------------------

DROP TABLE IF EXISTS `option`;

CREATE TABLE `option` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COMMENT '选项内容',
  `qid` int(11) DEFAULT NULL COMMENT '所属题目id',
  `isans` int(2) DEFAULT NULL COMMENT '是否正确答案',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `option` WRITE;
/*!40000 ALTER TABLE `option` DISABLE KEYS */;

INSERT INTO `option` (`id`, `content`, `qid`, `isans`)
VALUES
	(1,'神通',1,0),
	(2,'那珂',1,1),
	(3,'川内',1,0),
	(16,'岛风',6,0),
	(17,'雪风',6,1),
	(18,'天津风',6,0),
	(19,'初雪',6,0),
	(20,'白雪',6,0),
	(21,'美国',7,0),
	(22,'日本',7,0),
	(23,'中国',7,0),
	(24,'法国',7,0),
	(25,'英国',7,1),
	(26,'意大利',7,0),
	(27,'3',8,0),
	(28,'6',8,0),
	(29,'9',8,1),
	(30,'48',8,0),
	(31,'永井圭',9,1),
	(32,'永井gay',9,0),
	(33,'永井桂',9,0),
	(34,'永井guy',9,0),
	(58,'麋鹿',11,0),
	(59,'驯鹿',11,1),
	(60,'狸猫',11,0),
	(61,'狸子',11,0),
	(62,'你好',12,0),
	(63,'谢谢',12,0),
	(64,'多谢惠顾',12,0),
	(65,'一路顺风',12,1),
	(66,'虫师',13,0),
	(67,'中华小当家',13,0),
	(68,'美食的俘虏',13,0),
	(69,'食戟之灵',13,1),
	(70,'虎',14,0),
	(71,'龙',14,1),
	(72,'狮',14,0),
	(73,'猪',14,0),
	(74,'狼团',15,1),
	(75,'狮团',15,0),
	(76,'饭团',15,0),
	(77,'面团',15,0),
	(78,'LOL',16,0),
	(79,'2333',16,0),
	(80,'Drrr',16,1),
	(81,'Mrrr',16,0),
	(82,'dollars',17,1),
	(83,'pounds',17,0),
	(84,'penis',17,0),
	(85,'colors',17,0),
	(86,'亚马逊',18,0),
	(87,'阿里巴巴',18,1),
	(88,'苏宁',18,0),
	(89,'京东',18,0),
	(90,'eBay',18,0),
	(91,'君の前明',19,0),
	(92,'君の明前',19,0),
	(93,'君の前名',19,0),
	(94,'君の名前',19,1),
	(95,'三年F组',20,0),
	(96,'二年E组',20,0),
	(97,'三年E组',20,1),
	(98,'二年F组',20,0),
	(99,'岛风',21,0),
	(100,'时津风',21,0),
	(101,'晴风',21,1),
	(102,'武藏',21,0),
	(103,'列侬',21,0),
	(104,'药剂师',22,1),
	(105,'图书管理员',22,0),
	(106,'侍女',22,0);

/*!40000 ALTER TABLE `option` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table question
# ------------------------------------------------------------

DROP TABLE IF EXISTS `question`;

CREATE TABLE `question` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `stem` text COMMENT '题干',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;

INSERT INTO `question` (`id`, `stem`)
VALUES
	(1,'以下谁是舰队偶像？'),
	(6,'雪亲王的名字是？'),
	(7,'厌战是哪国人？'),
	(8,'Lovelive中缪斯一共有几人？'),
	(9,'亚人的男主叫什么名字'),
	(11,'海贼王中乔巴是什么动物'),
	(12,'法语BON VOYAGE!的意思是'),
	(13,'药王出自哪一部美食动漫'),
	(14,'七大罪中团长的纹章是什么动物'),
	(15,'七大罪op《Seven Deadly Sins》的演唱乐队被称为'),
	(16,'无头骑士异闻录的英文名'),
	(17,'池袋无色帮及其聊天室的名称'),
	(18,'魔笛magi的男主叫什么名字'),
	(19,'你的名字的日文名字'),
	(20,'暗杀教室所在班级'),
	(21,'岬明乃是以下那艘舰的舰长'),
	(22,'赤发白雪姬的职业是');

/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(10) DEFAULT NULL COMMENT '账户',
  `password` varchar(20) DEFAULT NULL COMMENT '密码',
  `group` int(2) DEFAULT NULL COMMENT '用户组，1老师，2学生',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `name`, `password`, `group`)
VALUES
	(1,'admin','admin',1),
	(2,'student','123456',2);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table userans
# ------------------------------------------------------------

DROP TABLE IF EXISTS `userans`;

CREATE TABLE `userans` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '学生id',
  `examid` int(11) DEFAULT NULL COMMENT '考试名称',
  `qid` int(11) DEFAULT NULL COMMENT '试题id',
  `ans` int(11) DEFAULT NULL COMMENT '答案选项id',
  `isright` int(2) DEFAULT NULL COMMENT '是否正确,0,1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `userans` WRITE;
/*!40000 ALTER TABLE `userans` DISABLE KEYS */;

INSERT INTO `userans` (`id`, `uid`, `examid`, `qid`, `ans`, `isright`)
VALUES
	(11,2,2,17,82,1),
	(12,2,2,13,69,1),
	(13,2,2,14,72,0),
	(14,2,2,9,33,0),
	(15,2,2,1,3,0),
	(16,2,2,6,17,1),
	(17,2,2,19,92,0),
	(18,2,2,18,88,0),
	(19,2,2,15,75,0),
	(20,2,2,20,96,0),
	(21,2,6,17,82,1),
	(22,2,6,22,104,1),
	(23,2,6,13,69,1),
	(24,2,6,7,23,0),
	(25,2,6,15,74,1),
	(26,2,6,18,90,0),
	(27,2,6,1,1,0),
	(28,2,6,14,73,0),
	(29,2,6,12,64,0),
	(30,2,6,11,60,0),
	(31,2,6,21,102,0),
	(32,2,6,9,32,0),
	(33,2,6,19,94,1),
	(34,2,6,16,79,0),
	(35,2,6,6,17,1),
	(36,2,6,8,30,0),
	(37,2,6,20,97,1),
	(38,2,1,14,71,1),
	(39,2,1,8,29,1),
	(40,2,1,11,59,1),
	(41,2,1,1,2,1),
	(42,2,1,6,17,1),
	(43,2,1,9,33,0),
	(44,2,1,15,74,1),
	(45,2,9,18,NULL,NULL),
	(46,2,9,20,NULL,NULL),
	(47,2,9,16,NULL,NULL),
	(48,2,9,9,NULL,NULL),
	(49,2,9,11,NULL,NULL),
	(50,2,9,19,NULL,NULL),
	(51,2,9,7,NULL,NULL),
	(52,2,9,13,NULL,NULL),
	(53,2,9,8,NULL,NULL),
	(54,2,9,17,NULL,NULL),
	(55,2,9,6,NULL,NULL),
	(56,2,9,15,NULL,NULL),
	(57,2,9,12,NULL,NULL),
	(58,2,9,22,NULL,NULL),
	(59,2,9,21,NULL,NULL);

/*!40000 ALTER TABLE `userans` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table userexam
# ------------------------------------------------------------

DROP TABLE IF EXISTS `userexam`;

CREATE TABLE `userexam` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '学生id',
  `examid` int(11) DEFAULT NULL COMMENT '考试id',
  `score` double DEFAULT NULL COMMENT '分数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `userexam` WRITE;
/*!40000 ALTER TABLE `userexam` DISABLE KEYS */;

INSERT INTO `userexam` (`id`, `uid`, `examid`, `score`)
VALUES
	(6,2,2,30),
	(7,2,6,41.18),
	(8,2,1,85.71);

/*!40000 ALTER TABLE `userexam` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
