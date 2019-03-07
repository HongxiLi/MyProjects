-- ---------------------------------------------------------
-- Database Name: docmgr
-- ---------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES 'utf8' */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='SYSTEM' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


--
-- Table structure for table c_board
--

DROP TABLE IF EXISTS `c_board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_board
--


--
-- Table structure for table c_category
--

DROP TABLE IF EXISTS `c_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_category
--

INSERT INTO `c_category` VALUES ( 1, '实物类', 1476414552, 1 );
INSERT INTO `c_category` VALUES ( 2, '理论类', 1476414559, 1 );

--
-- Table structure for table c_class
--

DROP TABLE IF EXISTS `c_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) DEFAULT NULL,
  `college_id` int(11) DEFAULT NULL,
  `major_id` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_class
--

/*!40000 ALTER TABLE `c_class` DISABLE KEYS */;
INSERT INTO `c_class` VALUES ( 1, '计算机一班', 1, 1, 1475721798, 1 );
INSERT INTO `c_class` VALUES ( 2, '计算机二班', 1, 1, 1475721798, 1 );
INSERT INTO `c_class` VALUES ( 3, '英语一班', 2, 4, 1475721798, 1 );
INSERT INTO `c_class` VALUES ( 4, '英语二班', 2, 4, 1475721798, 1 );
INSERT INTO `c_class` VALUES ( 5, '足球一班', 3, 6, 1475721798, 1 );
INSERT INTO `c_class` VALUES ( 6, '呃呃呃', 2, 4, 1476193740, 0 );
INSERT INTO `c_class` VALUES ( 7, 10086, 1, 1, 1476194293, 0 );
INSERT INTO `c_class` VALUES ( 8, 143254356, 1, 1, 1476194313, 0 );
/*!40000 ALTER TABLE c_class ENABLE KEYS */;

--
-- Table structure for table c_college
--

DROP TABLE IF EXISTS `c_college`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_college` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college_name` varchar(255) DEFAULT NULL,
  `master` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_college
--

/*!40000 ALTER TABLE `c_college` DISABLE KEYS */;
INSERT INTO `c_college` VALUES ( 1, '基础与信息工程学院', NULL, 1475721798, 1 );
INSERT INTO `c_college` VALUES ( 2, '外语学院', NULL, 1475721798, 1 );
INSERT INTO `c_college` VALUES ( 3, '体育学院', NULL, 1475721798, 1 );
INSERT INTO `c_college` VALUES ( 4, 424254, NULL, 1476191416, 0 );
INSERT INTO `c_college` VALUES ( 5, 24120120, NULL, 1476191926, 0 );
INSERT INTO `c_college` VALUES ( 6, 01010, NULL, 1476191947, 0 );
INSERT INTO `c_college` VALUES ( 7, 124234, NULL, 1476191958, 0 );
INSERT INTO `c_college` VALUES ( 8, '', NULL, 1476192063, 0 );
INSERT INTO `c_college` VALUES ( 9, 24242, NULL, 1476192097, 0 );
INSERT INTO `c_college` VALUES ( 10, 01100, NULL, 1476192100, 0 );
INSERT INTO `c_college` VALUES ( 11, '--**', NULL, 1476192336, 0 );
/*!40000 ALTER TABLE c_college ENABLE KEYS */;

--
-- Table structure for table c_config
--

DROP TABLE IF EXISTS `c_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL COMMENT '网站名称',
  `keywords` text,
  `description` text,
  `copyright` text,
  `address` varchar(220) DEFAULT '0',
  `url` varchar(120) DEFAULT NULL,
  `weixin` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT '',
  `icp` varchar(100) DEFAULT NULL,
  `weibo` varchar(250) DEFAULT NULL,
  `count` int(10) DEFAULT '0' COMMENT '点击次数',
  `about` text,
  `logo` varchar(128) DEFAULT NULL,
  `master` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_config
--

/*!40000 ALTER TABLE `c_config` DISABLE KEYS */;
INSERT INTO `c_config` VALUES ( 1, '在线论文管理系统', '在线论文管理系统              KEY                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ', '在线论文管理系统    DESC                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         ', 'All Rights Reserved', '北京第十中学', 'http://www.hello.com', '在线论文管理系统', 15087425462, 'xiaocao@gmail.com', '0571-65896532', '京ICP备A-12584', '在线论文管理系统', 1284, '<h2 style=\'font-size:20px;font-family:\' microsoft=\'\' yahei\',=\'\' arial,=\'\' 宋体,=\'\' verdana,=\'\' geneva,=\'\' helvetica;\'=\'\'>Time Manager<br />\r\n	</h2>', 'Uploads/system/2016-03-09/56e0352295fc4.png', 'Lily', 101280203 );
/*!40000 ALTER TABLE c_config ENABLE KEYS */;

--
-- Table structure for table c_course
--

DROP TABLE IF EXISTS `c_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) DEFAULT NULL,
  `score` double DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `max_num` int(11) DEFAULT NULL,
  `the_time1` int(11) DEFAULT NULL,
  `the_time2` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `college` int(11) DEFAULT NULL,
  `major` int(11) DEFAULT NULL,
  `content` text,
  `created` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `start` varchar(255) DEFAULT NULL,
  `ehd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_course
--

/*!40000 ALTER TABLE `c_course` DISABLE KEYS */;
/*!40000 ALTER TABLE c_course ENABLE KEYS */;

--
-- Table structure for table c_database
--

DROP TABLE IF EXISTS `c_database`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_database` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_database
--

/*!40000 ALTER TABLE `c_database` DISABLE KEYS */;
/*!40000 ALTER TABLE c_database ENABLE KEYS */;

--
-- Table structure for table c_log
--

DROP TABLE IF EXISTS `c_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `c` varchar(255) DEFAULT NULL,
  `m` varchar(255) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_log
--

INSERT INTO `c_log` VALUES ( 1, 'IndexController->Index()', 2, 'Index', 'Index', 1476414483, 1 );
INSERT INTO `c_log` VALUES ( 2, 'IndexController->Index()', 1, 'Index', 'Index', 1476414525, 1 );
INSERT INTO `c_log` VALUES ( 3, 'CTController->Index()', 1, 'CT', 'Index', 1476414526, 1 );
INSERT INTO `c_log` VALUES ( 4, 'CTController->SY()', 1, 'CT', 'SY', 1476414528, 1 );
INSERT INTO `c_log` VALUES ( 5, 'CTController->USER()', 1, 'CT', 'USER', 1476414529, 1 );
INSERT INTO `c_log` VALUES ( 6, 'CTController->MAIN()', 1, 'CT', 'MAIN', 1476414534, 1 );
INSERT INTO `c_log` VALUES ( 7, 'CourseCategoryController->Add()', 1, 'CourseCategory', 'Add', 1476414536, 1 );
INSERT INTO `c_log` VALUES ( 8, 'CourseCategoryController->AddCategory()', 1, 'CourseCategory', 'AddCategory', 1476414552, 1 );
INSERT INTO `c_log` VALUES ( 9, 'CTController->MAIN()', 1, 'CT', 'MAIN', 1476414552, 1 );
INSERT INTO `c_log` VALUES ( 10, 'CourseCategoryController->Add()', 1, 'CourseCategory', 'Add', 1476414553, 1 );
INSERT INTO `c_log` VALUES ( 11, 'CourseCategoryController->AddCategory()', 1, 'CourseCategory', 'AddCategory', 1476414559, 1 );
INSERT INTO `c_log` VALUES ( 12, 'CTController->MAIN()', 1, 'CT', 'MAIN', 1476414559, 1 );
INSERT INTO `c_log` VALUES ( 13, 'CTController->MAIN()', 1, 'CT', 'MAIN', 1476414562, 1 );
INSERT INTO `c_log` VALUES ( 14, 'CTController->CR173()', 1, 'CT', 'CR173', 1476414564, 1 );
INSERT INTO `c_log` VALUES ( 15, 'SettingController->Index()', 1, 'Setting', 'Index', 1476414567, 1 );
INSERT INTO `c_log` VALUES ( 16, 'DatabaseController->Index()', 1, 'Database', 'Index', 1476414571, 1 );
INSERT INTO `c_log` VALUES ( 17, 'DatabaseController->Bak()', 1, 'Database', 'Bak', 1476414572, 1 );
INSERT INTO `c_log` VALUES ( 18, 'DatabaseController->Index()', 1, 'Database', 'Index', 1476414572, 1 );
INSERT INTO `c_log` VALUES ( 19, 'IndexController->Index()', 1, 'Index', 'Index', 1476414591, 1 );
INSERT INTO `c_log` VALUES ( 20, 'DatabaseController->Index()', 1, 'Database', 'Index', 1476414593, 1 );
INSERT INTO `c_log` VALUES ( 21, 'DatabaseController->Bak()', 1, 'Database', 'Bak', 1476414595, 1 );

--
-- Table structure for table c_major
--

DROP TABLE IF EXISTS `c_major`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major_name` varchar(255) DEFAULT NULL,
  `college_id` int(11) DEFAULT NULL,
  `master` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_major
--

INSERT INTO `c_major` VALUES ( 1, '计算机科学', 1, NULL, 1475721798, 1 );
INSERT INTO `c_major` VALUES ( 2, '电子信息工程', 1, NULL, 1475721798, 1 );
INSERT INTO `c_major` VALUES ( 3, '网络工程', 1, NULL, 1475721798, 1 );
INSERT INTO `c_major` VALUES ( 4, '英语专业', 2, NULL, 1475721798, 1 );
INSERT INTO `c_major` VALUES ( 5, '越南语专业', 2, NULL, 1475721798, 1 );
INSERT INTO `c_major` VALUES ( 6, '足球专业', 3, NULL, 1475721798, 1 );
INSERT INTO `c_major` VALUES ( 7, '篮球专业', 3, NULL, 1475721798, 1 );
INSERT INTO `c_major` VALUES ( 8, 224, 1, NULL, 1476192887, 0 );
INSERT INTO `c_major` VALUES ( 9, '.2.2.', 1, NULL, 1476193030, 0 );
INSERT INTO `c_major` VALUES ( 10, 251, 2, NULL, 1476193299, 0 );
INSERT INTO `c_major` VALUES ( 11, 111222, 1, NULL, 1476193417, 0 );

--
-- Table structure for table c_message
--

DROP TABLE IF EXISTS `c_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `message` text,
  `title` varchar(255) DEFAULT NULL,
  `readed` tinyint(4) DEFAULT '0',
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_message
--


--
-- Table structure for table c_notice
--

DROP TABLE IF EXISTS `c_notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_notice
--


--
-- Table structure for table c_room
--

DROP TABLE IF EXISTS `c_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_room
--

INSERT INTO `c_room` VALUES ( 1, '2栋1-1', 1475721798, 1 );
INSERT INTO `c_room` VALUES ( 2, '1栋1-1', 1475721798, 1 );
INSERT INTO `c_room` VALUES ( 3, '1栋1-2', 1475721798, 1 );
INSERT INTO `c_room` VALUES ( 4, '2栋1-2', 1475721798, 1 );
INSERT INTO `c_room` VALUES ( 5, 524520, 1476260919, 0 );
INSERT INTO `c_room` VALUES ( 6, 35352, 1476260992, 1 );

--
-- Table structure for table c_score
--

DROP TABLE IF EXISTS `c_score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL,
  `teacherid` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_score
--


--
-- Table structure for table c_selection
--

DROP TABLE IF EXISTS `c_selection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_selection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `gp` int(11) DEFAULT NULL,
  `step` int(11) DEFAULT '1',
  `week` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created` int(11) DEFAULT NULL,
  `doc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_selection
--


--
-- Table structure for table c_semester
--

DROP TABLE IF EXISTS `c_semester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_semester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) DEFAULT NULL,
  `sep_half` tinyint(4) DEFAULT '0',
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_semester
--

/*!40000 ALTER TABLE `c_semester` DISABLE KEYS */;
INSERT INTO `c_semester` VALUES ( 1, 2014, 0, 1475721798, 1 );
INSERT INTO `c_semester` VALUES ( 2, 2014, 1, 1475721798, 1 );
INSERT INTO `c_semester` VALUES ( 3, 2016, 0, 1475721798, 1 );
INSERT INTO `c_semester` VALUES ( 4, 2016, 1, 1475721798, 1 );
INSERT INTO `c_semester` VALUES ( 5, 2010, 0, 1476200327, 0 );
INSERT INTO `c_semester` VALUES ( 6, 2010, 1, 1476200376, 0 );
/*!40000 ALTER TABLE c_semester ENABLE KEYS */;

--
-- Table structure for table c_time
--

DROP TABLE IF EXISTS `c_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_time
--

INSERT INTO `c_time` VALUES ( 1, '第一大节', 1 );
INSERT INTO `c_time` VALUES ( 2, '第二大节', 1 );
INSERT INTO `c_time` VALUES ( 3, '第三大节', 1 );
INSERT INTO `c_time` VALUES ( 4, '第四大节', 1 );
INSERT INTO `c_time` VALUES ( 5, '第五大节', 1 );

--
-- Table structure for table c_user
--

DROP TABLE IF EXISTS `c_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `realname` varchar(255) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `birthday` int(11) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT '1' COMMENT '1一般用户，2商品管理员，3管理员',
  `year` int(11) DEFAULT NULL,
  `college` int(11) DEFAULT NULL,
  `major` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `zc` varchar(255) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_user
--

/*!40000 ALTER TABLE `c_user` DISABLE KEYS */;
INSERT INTO `c_user` VALUES ( 1, 'admin', '23261fedd0be3b50006c8c8eeff1505e', NULL, 'YY手机', 1, NULL, 15877536852, NULL, '961903965@qq.com', NULL, 3, NULL, NULL, NULL, NULL, NULL, 1475721798, 1 );
INSERT INTO `c_user` VALUES ( 2, 'stu', '23261fedd0be3b50006c8c8eeff1505e', NULL, '李云忠', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 2, 4, 3, NULL, 1475721798, 1 );
INSERT INTO `c_user` VALUES ( 3, 'tea1', '1fbcb27cb3247a898a26da156c728160', NULL, '张东光', 1, NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, NULL, NULL, '助教', 1475721798, 1 );
INSERT INTO `c_user` VALUES ( 6, 'stu2', '23261fedd0be3b50006c8c8eeff1505e', NULL, '王宝强', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, 4, 3, NULL, 1475721798, 1 );
INSERT INTO `c_user` VALUES ( 13, 'tea2', '23261fedd0be3b50006c8c8eeff1505e', NULL, '王化贞', 1, NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, NULL, NULL, '教授', 1476203375, 0 );
/*!40000 ALTER TABLE c_user ENABLE KEYS */;

--
-- Table structure for table c_week
--

DROP TABLE IF EXISTS `c_week`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_week` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `week_name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_week
--

INSERT INTO `c_week` VALUES ( 1, '星期一', 1 );
INSERT INTO `c_week` VALUES ( 2, '星期二', 1 );
INSERT INTO `c_week` VALUES ( 3, '学期三', 1 );
INSERT INTO `c_week` VALUES ( 4, '星期四', 1 );
INSERT INTO `c_week` VALUES ( 5, '星期五', 1 );
INSERT INTO `c_week` VALUES ( 6, '星期六', 1 );
INSERT INTO `c_week` VALUES ( 7, '星期日', 1 );

--
-- Table structure for table c_year
--

DROP TABLE IF EXISTS `c_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `c_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_year
--

/*!40000 ALTER TABLE `c_year` DISABLE KEYS */;
INSERT INTO `c_year` VALUES ( 1, 2014, 1475721798, 1 );
INSERT INTO `c_year` VALUES ( 2, 2015, 1475721798, 1 );
INSERT INTO `c_year` VALUES ( 3, 2016, 1475721798, 1 );
INSERT INTO `c_year` VALUES ( 4, 'WWW', 1476199759, 0 );
INSERT INTO `c_year` VALUES ( 5, 02020, 1476199806, 0 );
INSERT INTO `c_year` VALUES ( 6, '', 1476365387, 1 );
/*!40000 ALTER TABLE c_year ENABLE KEYS */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
