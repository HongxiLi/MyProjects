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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_board
--

INSERT INTO `c_board` VALUES ( 1, 1, '系统开通', '使用过程中任何问题请私信@admin', 1476414944, 1 );
INSERT INTO `c_board` VALUES ( 2, 6, 'good', '加油', 1476415541, 1 );

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_category
--

INSERT INTO `c_category` VALUES ( 1, '实物类', 1476414552, 1 );
INSERT INTO `c_category` VALUES ( 2, '理论类', 1476414559, 1 );
INSERT INTO `c_category` VALUES ( 3, '程序设计', 1476415185, 1 );

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
INSERT INTO `c_config` VALUES ( 1, '在线论文管理系统', '在线论文管理系统              KEY                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          ', '在线论文管理系统    DESC                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         ', 'All Rights Reserved', '北京第十中学', 'http://www.hello.com', '在线论文管理系统', 15087425462, 'xiaocao@gmail.com', '0571-65896532', '京ICP备A-12584', '在线论文管理系统', 1294, '<h2 style=\'font-size:20px;font-family:\' microsoft=\'\' yahei\',=\'\' arial,=\'\' 宋体,=\'\' verdana,=\'\' geneva,=\'\' helvetica;\'=\'\'>Time Manager<br />\r\n	</h2>', 'Uploads/system/2016-03-09/56e0352295fc4.png', 'Lily', 101280203 );
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_course
--

/*!40000 ALTER TABLE `c_course` DISABLE KEYS */;
INSERT INTO `c_course` VALUES ( 1, '基于PHP的在线论文管理系统', 10, 3, 5, 5, 5, 1, NULL, NULL, NULL, 1476415122, 'VT8546851', 1, 1, 3, 4, 1, '第一周', '第十七周' );
INSERT INTO `c_course` VALUES ( 2, 'PHP地方性站点设计与实现', 10, 13, 5, 3, 2, 1, NULL, NULL, NULL, 1476415697, 'AD557862', 3, 3, 13, 4, 1, '第一周', '第十五周' );
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_database
--

/*!40000 ALTER TABLE `c_database` DISABLE KEYS */;
INSERT INTO `c_database` VALUES ( 1, '/database/2016_10_14110955.sql', 1476414595, 1 );
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
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8;
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
INSERT INTO `c_log` VALUES ( 22, 'DatabaseController->Index()', 1, 'Database', 'Index', 1476414595, 1 );
INSERT INTO `c_log` VALUES ( 23, 'LogController->Index()', 1, 'Log', 'Index', 1476414596, 1 );
INSERT INTO `c_log` VALUES ( 24, 'LogController->My()', 1, 'Log', 'My', 1476414600, 1 );
INSERT INTO `c_log` VALUES ( 25, 'LogController->My()', 1, 'Log', 'My', 1476414694, 1 );
INSERT INTO `c_log` VALUES ( 26, 'MessageController->Recevied()', 1, 'Message', 'Recevied', 1476414700, 1 );
INSERT INTO `c_log` VALUES ( 27, 'MessageController->Recevied()', 1, 'Message', 'Recevied', 1476414732, 1 );
INSERT INTO `c_log` VALUES ( 28, 'MessageController->Recevied()', 1, 'Message', 'Recevied', 1476414734, 1 );
INSERT INTO `c_log` VALUES ( 29, 'MessageController->Recevied()', 1, 'Message', 'Recevied', 1476414734, 1 );
INSERT INTO `c_log` VALUES ( 30, 'MessageController->Send()', 1, 'Message', 'Send', 1476414736, 1 );
INSERT INTO `c_log` VALUES ( 31, 'MessageController->AddMsg()', 1, 'Message', 'AddMsg', 1476414786, 1 );
INSERT INTO `c_log` VALUES ( 32, 'MessageController->Sended()', 1, 'Message', 'Sended', 1476414787, 1 );
INSERT INTO `c_log` VALUES ( 33, 'MessageController->View()', 1, 'Message', 'View', 1476414792, 1 );
INSERT INTO `c_log` VALUES ( 34, 'MessageController->Send()', 1, 'Message', 'Send', 1476414795, 1 );
INSERT INTO `c_log` VALUES ( 35, 'DatabaseController->Index()', 1, 'Database', 'Index', 1476414796, 1 );
INSERT INTO `c_log` VALUES ( 36, 'CTController->Index()', 1, 'CT', 'Index', 1476414812, 1 );
INSERT INTO `c_log` VALUES ( 37, 'CTController->SY()', 1, 'CT', 'SY', 1476414813, 1 );
INSERT INTO `c_log` VALUES ( 38, 'NoticeController->Index()', 1, 'Notice', 'Index', 1476414815, 1 );
INSERT INTO `c_log` VALUES ( 39, 'NoticeController->Add()', 1, 'Notice', 'Add', 1476414816, 1 );
INSERT INTO `c_log` VALUES ( 40, 'NoticeController->AddMsg()', 1, 'Notice', 'AddMsg', 1476414900, 1 );
INSERT INTO `c_log` VALUES ( 41, 'NoticeController->Index()', 1, 'Notice', 'Index', 1476414901, 1 );
INSERT INTO `c_log` VALUES ( 42, 'NoticeController->Add()', 1, 'Notice', 'Add', 1476414908, 1 );
INSERT INTO `c_log` VALUES ( 43, 'BoardController->Index()', 1, 'Board', 'Index', 1476414912, 1 );
INSERT INTO `c_log` VALUES ( 44, 'BoardController->Add()', 1, 'Board', 'Add', 1476414914, 1 );
INSERT INTO `c_log` VALUES ( 45, 'BoardController->AddMsg()', 1, 'Board', 'AddMsg', 1476414944, 1 );
INSERT INTO `c_log` VALUES ( 46, 'BoardController->Index()', 1, 'Board', 'Index', 1476414945, 1 );
INSERT INTO `c_log` VALUES ( 47, 'CTController->Index()', 1, 'CT', 'Index', 1476414951, 1 );
INSERT INTO `c_log` VALUES ( 48, 'IndexController->Index()', 3, 'Index', 'Index', 1476414960, 1 );
INSERT INTO `c_log` VALUES ( 49, 'CTController->TM()', 3, 'CT', 'TM', 1476414966, 1 );
INSERT INTO `c_log` VALUES ( 50, 'CourseController->Add()', 3, 'Course', 'Add', 1476414967, 1 );
INSERT INTO `c_log` VALUES ( 51, 'CourseController->UpdateCourse()', 3, 'Course', 'UpdateCourse', 1476415033, 1 );
INSERT INTO `c_log` VALUES ( 52, 'CourseController->UpdateCourse()', 3, 'Course', 'UpdateCourse', 1476415090, 1 );
INSERT INTO `c_log` VALUES ( 53, 'CourseController->UpdateCourse()', 3, 'Course', 'UpdateCourse', 1476415093, 1 );
INSERT INTO `c_log` VALUES ( 54, 'CourseController->Add()', 3, 'Course', 'Add', 1476415099, 1 );
INSERT INTO `c_log` VALUES ( 55, 'CourseController->AddCourse()', 3, 'Course', 'AddCourse', 1476415122, 1 );
INSERT INTO `c_log` VALUES ( 56, 'CourseController->Collection()', 3, 'Course', 'Collection', 1476415122, 1 );
INSERT INTO `c_log` VALUES ( 57, 'CTController->TM()', 3, 'CT', 'TM', 1476415126, 1 );
INSERT INTO `c_log` VALUES ( 58, 'CTController->TM()', 3, 'CT', 'TM', 1476415158, 1 );
INSERT INTO `c_log` VALUES ( 59, 'CTController->TM()', 3, 'CT', 'TM', 1476415160, 1 );
INSERT INTO `c_log` VALUES ( 60, 'CTController->TM()', 3, 'CT', 'TM', 1476415161, 1 );
INSERT INTO `c_log` VALUES ( 61, 'CourseController->Edit()', 3, 'Course', 'Edit', 1476415164, 1 );
INSERT INTO `c_log` VALUES ( 62, 'CourseController->UpdateCourse()', 3, 'Course', 'UpdateCourse', 1476415166, 1 );
INSERT INTO `c_log` VALUES ( 63, 'CTController->TM()', 3, 'CT', 'TM', 1476415168, 1 );
INSERT INTO `c_log` VALUES ( 64, 'IndexController->Index()', 1, 'Index', 'Index', 1476415171, 1 );
INSERT INTO `c_log` VALUES ( 65, 'CTController->MAIN()', 1, 'CT', 'MAIN', 1476415173, 1 );
INSERT INTO `c_log` VALUES ( 66, 'CourseCategoryController->Add()', 1, 'CourseCategory', 'Add', 1476415174, 1 );
INSERT INTO `c_log` VALUES ( 67, 'CourseCategoryController->AddCategory()', 1, 'CourseCategory', 'AddCategory', 1476415185, 1 );
INSERT INTO `c_log` VALUES ( 68, 'CTController->MAIN()', 1, 'CT', 'MAIN', 1476415185, 1 );
INSERT INTO `c_log` VALUES ( 69, 'CTController->USER()', 1, 'CT', 'USER', 1476415188, 1 );
INSERT INTO `c_log` VALUES ( 70, 'CTController->MAIN()', 1, 'CT', 'MAIN', 1476415192, 1 );
INSERT INTO `c_log` VALUES ( 71, 'RoomController->Delete()', 1, 'Room', 'Delete', 1476415196, 1 );
INSERT INTO `c_log` VALUES ( 72, 'CTController->MAIN()', 1, 'CT', 'MAIN', 1476415196, 1 );
INSERT INTO `c_log` VALUES ( 73, 'CTController->Index()', 1, 'CT', 'Index', 1476415197, 1 );
INSERT INTO `c_log` VALUES ( 74, 'CTController->SY()', 1, 'CT', 'SY', 1476415198, 1 );
INSERT INTO `c_log` VALUES ( 75, 'IndexController->Index()', 3, 'Index', 'Index', 1476415204, 1 );
INSERT INTO `c_log` VALUES ( 76, 'CTController->SC()', 3, 'CT', 'SC', 1476415206, 1 );
INSERT INTO `c_log` VALUES ( 77, 'CTController->TM()', 3, 'CT', 'TM', 1476415207, 1 );
INSERT INTO `c_log` VALUES ( 78, 'CTController->SC()', 3, 'CT', 'SC', 1476415208, 1 );
INSERT INTO `c_log` VALUES ( 79, 'ScoreController->ScoreList()', 3, 'Score', 'ScoreList', 1476415212, 1 );
INSERT INTO `c_log` VALUES ( 80, 'ScoreController->Add()', 3, 'Score', 'Add', 1476415215, 1 );
INSERT INTO `c_log` VALUES ( 81, 'MessageController->Sended()', 3, 'Message', 'Sended', 1476415223, 1 );
INSERT INTO `c_log` VALUES ( 82, 'NoticeController->Index()', 3, 'Notice', 'Index', 1476415225, 1 );
INSERT INTO `c_log` VALUES ( 83, 'BoardController->Index()', 3, 'Board', 'Index', 1476415226, 1 );
INSERT INTO `c_log` VALUES ( 84, 'NoticeController->Index()', 3, 'Notice', 'Index', 1476415229, 1 );
INSERT INTO `c_log` VALUES ( 85, 'MessageController->Sended()', 3, 'Message', 'Sended', 1476415229, 1 );
INSERT INTO `c_log` VALUES ( 86, 'MessageController->Send()', 3, 'Message', 'Send', 1476415230, 1 );
INSERT INTO `c_log` VALUES ( 87, 'MessageController->AddMsg()', 3, 'Message', 'AddMsg', 1476415256, 1 );
INSERT INTO `c_log` VALUES ( 88, 'MessageController->Sended()', 3, 'Message', 'Sended', 1476415257, 1 );
INSERT INTO `c_log` VALUES ( 89, 'IndexController->Index()', 2, 'Index', 'Index', 1476415265, 1 );
INSERT INTO `c_log` VALUES ( 90, 'CourseControlController->Collection()', 2, 'CourseControl', 'Collection', 1476415268, 1 );
INSERT INTO `c_log` VALUES ( 91, 'CourseControlController->Select()', 2, 'CourseControl', 'Select', 1476415270, 1 );
INSERT INTO `c_log` VALUES ( 92, 'CourseControlController->Plane()', 2, 'CourseControl', 'Plane', 1476415271, 1 );
INSERT INTO `c_log` VALUES ( 93, 'CourseControlController->Collection()', 2, 'CourseControl', 'Collection', 1476415279, 1 );
INSERT INTO `c_log` VALUES ( 94, 'CourseControlController->Collection()', 2, 'CourseControl', 'Collection', 1476415314, 1 );
INSERT INTO `c_log` VALUES ( 95, 'CourseControlController->My()', 2, 'CourseControl', 'My', 1476415316, 1 );
INSERT INTO `c_log` VALUES ( 96, 'CourseControlController->My()', 2, 'CourseControl', 'My', 1476415316, 1 );
INSERT INTO `c_log` VALUES ( 97, 'CourseControlController->My()', 2, 'CourseControl', 'My', 1476415324, 1 );
INSERT INTO `c_log` VALUES ( 98, 'CourseControlController->Collection()', 2, 'CourseControl', 'Collection', 1476415326, 1 );
INSERT INTO `c_log` VALUES ( 99, 'CourseControlController->My()', 2, 'CourseControl', 'My', 1476415328, 1 );
INSERT INTO `c_log` VALUES ( 100, 'CourseControlController->Collection()', 2, 'CourseControl', 'Collection', 1476415335, 1 );
INSERT INTO `c_log` VALUES ( 101, 'CourseControlController->My()', 2, 'CourseControl', 'My', 1476415338, 1 );
INSERT INTO `c_log` VALUES ( 102, 'CourseControlController->MyScore()', 2, 'CourseControl', 'MyScore', 1476415339, 1 );
INSERT INTO `c_log` VALUES ( 103, 'CourseControlController->Upload()', 2, 'CourseControl', 'Upload', 1476415407, 1 );
INSERT INTO `c_log` VALUES ( 104, 'CourseControlController->Upload()', 2, 'CourseControl', 'Upload', 1476415411, 1 );
INSERT INTO `c_log` VALUES ( 105, 'CourseControlController->MyScore()', 2, 'CourseControl', 'MyScore', 1476415412, 1 );
INSERT INTO `c_log` VALUES ( 106, 'MessageController->Sended()', 2, 'Message', 'Sended', 1476415415, 1 );
INSERT INTO `c_log` VALUES ( 107, 'MessageController->Send()', 2, 'Message', 'Send', 1476415416, 1 );
INSERT INTO `c_log` VALUES ( 108, 'MessageController->AddMsg()', 2, 'Message', 'AddMsg', 1476415440, 1 );
INSERT INTO `c_log` VALUES ( 109, 'MessageController->Sended()', 2, 'Message', 'Sended', 1476415441, 1 );
INSERT INTO `c_log` VALUES ( 110, 'MessageController->View()', 2, 'Message', 'View', 1476415443, 1 );
INSERT INTO `c_log` VALUES ( 111, 'CourseControlController->MyScore()', 2, 'CourseControl', 'MyScore', 1476415445, 1 );
INSERT INTO `c_log` VALUES ( 112, 'CourseControlController->My()', 2, 'CourseControl', 'My', 1476415446, 1 );
INSERT INTO `c_log` VALUES ( 113, 'CourseControlController->Collection()', 2, 'CourseControl', 'Collection', 1476415446, 1 );
INSERT INTO `c_log` VALUES ( 114, 'IndexController->Index()', 6, 'Index', 'Index', 1476415455, 1 );
INSERT INTO `c_log` VALUES ( 115, 'CourseControlController->MyScore()', 6, 'CourseControl', 'MyScore', 1476415456, 1 );
INSERT INTO `c_log` VALUES ( 116, 'CourseControlController->Collection()', 6, 'CourseControl', 'Collection', 1476415457, 1 );
INSERT INTO `c_log` VALUES ( 117, 'CourseControlController->Select()', 6, 'CourseControl', 'Select', 1476415458, 1 );
INSERT INTO `c_log` VALUES ( 118, 'CourseControlController->My()', 6, 'CourseControl', 'My', 1476415459, 1 );
INSERT INTO `c_log` VALUES ( 119, 'CourseControlController->My()', 6, 'CourseControl', 'My', 1476415463, 1 );
INSERT INTO `c_log` VALUES ( 120, 'CourseControlController->MyScore()', 6, 'CourseControl', 'MyScore', 1476415464, 1 );
INSERT INTO `c_log` VALUES ( 121, 'CourseControlController->Upload()', 6, 'CourseControl', 'Upload', 1476415466, 1 );
INSERT INTO `c_log` VALUES ( 122, 'CourseControlController->Upload()', 6, 'CourseControl', 'Upload', 1476415509, 1 );
INSERT INTO `c_log` VALUES ( 123, 'CourseControlController->MyScore()', 6, 'CourseControl', 'MyScore', 1476415510, 1 );
INSERT INTO `c_log` VALUES ( 124, 'CourseControlController->Upload2()', 6, 'CourseControl', 'Upload2', 1476415516, 1 );
INSERT INTO `c_log` VALUES ( 125, 'CourseControlController->My()', 6, 'CourseControl', 'My', 1476415517, 1 );
INSERT INTO `c_log` VALUES ( 126, 'MessageController->Send()', 6, 'Message', 'Send', 1476415518, 1 );
INSERT INTO `c_log` VALUES ( 127, 'MessageController->AddMsg()', 6, 'Message', 'AddMsg', 1476415531, 1 );
INSERT INTO `c_log` VALUES ( 128, 'MessageController->Sended()', 6, 'Message', 'Sended', 1476415532, 1 );
INSERT INTO `c_log` VALUES ( 129, 'BoardController->Index()', 6, 'Board', 'Index', 1476415533, 1 );
INSERT INTO `c_log` VALUES ( 130, 'BoardController->Add()', 6, 'Board', 'Add', 1476415534, 1 );
INSERT INTO `c_log` VALUES ( 131, 'BoardController->AddMsg()', 6, 'Board', 'AddMsg', 1476415540, 1 );
INSERT INTO `c_log` VALUES ( 132, 'BoardController->Index()', 6, 'Board', 'Index', 1476415542, 1 );
INSERT INTO `c_log` VALUES ( 133, 'CourseControlController->Collection()', 6, 'CourseControl', 'Collection', 1476415543, 1 );
INSERT INTO `c_log` VALUES ( 134, 'CourseControlController->My()', 6, 'CourseControl', 'My', 1476415543, 1 );
INSERT INTO `c_log` VALUES ( 135, 'CourseControlController->MyScore()', 6, 'CourseControl', 'MyScore', 1476415544, 1 );
INSERT INTO `c_log` VALUES ( 136, 'CourseControlController->My()', 6, 'CourseControl', 'My', 1476415544, 1 );
INSERT INTO `c_log` VALUES ( 137, 'IndexController->Index()', 3, 'Index', 'Index', 1476415553, 1 );
INSERT INTO `c_log` VALUES ( 138, 'CTController->SC()', 3, 'CT', 'SC', 1476415555, 1 );
INSERT INTO `c_log` VALUES ( 139, 'ScoreController->ScoreList()', 3, 'Score', 'ScoreList', 1476415558, 1 );
INSERT INTO `c_log` VALUES ( 140, 'ScoreController->Add()', 3, 'Score', 'Add', 1476415560, 1 );
INSERT INTO `c_log` VALUES ( 141, 'IndexController->Index()', 3, 'Index', 'Index', 1476415630, 1 );
INSERT INTO `c_log` VALUES ( 142, 'IndexController->Index()', 13, 'Index', 'Index', 1476415653, 1 );
INSERT INTO `c_log` VALUES ( 143, 'CTController->TM()', 13, 'CT', 'TM', 1476415655, 1 );
INSERT INTO `c_log` VALUES ( 144, 'CourseController->Add()', 13, 'Course', 'Add', 1476415655, 1 );
INSERT INTO `c_log` VALUES ( 145, 'CourseController->AddCourse()', 13, 'Course', 'AddCourse', 1476415697, 1 );
INSERT INTO `c_log` VALUES ( 146, 'CTController->TM()', 13, 'CT', 'TM', 1476415697, 1 );
INSERT INTO `c_log` VALUES ( 147, 'ScoreController->Export()', 13, 'Score', 'Export', 1476415701, 1 );
INSERT INTO `c_log` VALUES ( 148, 'ScoreController->Add()', 13, 'Score', 'Add', 1476415702, 1 );
INSERT INTO `c_log` VALUES ( 149, 'CTController->TM()', 13, 'CT', 'TM', 1476415709, 1 );
INSERT INTO `c_log` VALUES ( 150, 'IndexController->Index()', 3, 'Index', 'Index', 1476415717, 1 );
INSERT INTO `c_log` VALUES ( 151, 'CTController->SC()', 3, 'CT', 'SC', 1476415718, 1 );
INSERT INTO `c_log` VALUES ( 152, 'ScoreController->Add()', 3, 'Score', 'Add', 1476415720, 1 );
INSERT INTO `c_log` VALUES ( 153, 'ScoreController->Add()', 3, 'Score', 'Add', 1476415770, 1 );
INSERT INTO `c_log` VALUES ( 154, 'ScoreController->Add()', 3, 'Score', 'Add', 1476415802, 1 );
INSERT INTO `c_log` VALUES ( 155, 'ScoreController->Download()', 3, 'Score', 'Download', 1476415805, 1 );
INSERT INTO `c_log` VALUES ( 156, 'ScoreController->UpdateScore()', 3, 'Score', 'UpdateScore', 1476415849, 1 );
INSERT INTO `c_log` VALUES ( 157, 'ScoreController->ScoreList()', 3, 'Score', 'ScoreList', 1476415850, 1 );
INSERT INTO `c_log` VALUES ( 158, 'CTController->SC()', 3, 'CT', 'SC', 1476415854, 1 );
INSERT INTO `c_log` VALUES ( 159, 'ScoreController->ScoreList()', 3, 'Score', 'ScoreList', 1476415855, 1 );
INSERT INTO `c_log` VALUES ( 160, 'ScoreController->Add()', 3, 'Score', 'Add', 1476415858, 1 );
INSERT INTO `c_log` VALUES ( 161, 'ScoreController->UpdateScore()', 3, 'Score', 'UpdateScore', 1476415868, 1 );
INSERT INTO `c_log` VALUES ( 162, 'ScoreController->ScoreList()', 3, 'Score', 'ScoreList', 1476415869, 1 );
INSERT INTO `c_log` VALUES ( 163, 'CTController->SC()', 3, 'CT', 'SC', 1476415875, 1 );
INSERT INTO `c_log` VALUES ( 164, 'ScoreController->ScoreList()', 3, 'Score', 'ScoreList', 1476415877, 1 );
INSERT INTO `c_log` VALUES ( 165, 'CTController->SC()', 3, 'CT', 'SC', 1476415898, 1 );
INSERT INTO `c_log` VALUES ( 166, 'ScoreController->Add()', 3, 'Score', 'Add', 1476415899, 1 );
INSERT INTO `c_log` VALUES ( 167, 'ScoreController->UpdateScore()', 3, 'Score', 'UpdateScore', 1476415916, 1 );
INSERT INTO `c_log` VALUES ( 168, 'ScoreController->ScoreList()', 3, 'Score', 'ScoreList', 1476415917, 1 );
INSERT INTO `c_log` VALUES ( 169, 'CTController->SC()', 3, 'CT', 'SC', 1476415949, 1 );
INSERT INTO `c_log` VALUES ( 170, 'ScoreController->Add()', 3, 'Score', 'Add', 1476415950, 1 );
INSERT INTO `c_log` VALUES ( 171, 'ScoreController->AddScore()', 3, 'Score', 'AddScore', 1476415955, 1 );
INSERT INTO `c_log` VALUES ( 172, 'ScoreController->ScoreList()', 3, 'Score', 'ScoreList', 1476415956, 1 );
INSERT INTO `c_log` VALUES ( 173, 'CTController->SC()', 3, 'CT', 'SC', 1476415959, 1 );
INSERT INTO `c_log` VALUES ( 174, 'ScoreController->ScoreList()', 3, 'Score', 'ScoreList', 1476415961, 1 );
INSERT INTO `c_log` VALUES ( 175, 'CTController->SC()', 3, 'CT', 'SC', 1476415977, 1 );
INSERT INTO `c_log` VALUES ( 176, 'ScoreController->Add()', 3, 'Score', 'Add', 1476415978, 1 );
INSERT INTO `c_log` VALUES ( 177, 'ScoreController->AddScore()', 3, 'Score', 'AddScore', 1476415982, 1 );
INSERT INTO `c_log` VALUES ( 178, 'ScoreController->ScoreList()', 3, 'Score', 'ScoreList', 1476415984, 1 );
INSERT INTO `c_log` VALUES ( 179, 'ScoreController->ScoreEdit()', 3, 'Score', 'ScoreEdit', 1476415997, 1 );
INSERT INTO `c_log` VALUES ( 180, 'IndexController->Index()', 3, 'Index', 'Index', 1476415998, 1 );
INSERT INTO `c_log` VALUES ( 181, 'CTController->SC()', 3, 'CT', 'SC', 1476415999, 1 );
INSERT INTO `c_log` VALUES ( 182, 'LogController->My()', 3, 'Log', 'My', 1476416000, 1 );
INSERT INTO `c_log` VALUES ( 183, 'CTController->TM()', 3, 'CT', 'TM', 1476416000, 1 );
INSERT INTO `c_log` VALUES ( 184, 'IndexController->Index()', 3, 'Index', 'Index', 1476416010, 1 );
INSERT INTO `c_log` VALUES ( 185, 'IndexController->Index()', 1, 'Index', 'Index', 1476416038, 1 );
INSERT INTO `c_log` VALUES ( 186, 'MessageController->Recevied()', 1, 'Message', 'Recevied', 1476416042, 1 );
INSERT INTO `c_log` VALUES ( 187, 'MessageController->View()', 1, 'Message', 'View', 1476416044, 1 );
INSERT INTO `c_log` VALUES ( 188, 'BoardController->Index()', 1, 'Board', 'Index', 1476416048, 1 );
INSERT INTO `c_log` VALUES ( 189, 'NoticeController->Index()', 1, 'Notice', 'Index', 1476416051, 1 );
INSERT INTO `c_log` VALUES ( 190, 'MessageController->Send()', 1, 'Message', 'Send', 1476416054, 1 );
INSERT INTO `c_log` VALUES ( 191, 'MessageController->Sended()', 1, 'Message', 'Sended', 1476416057, 1 );
INSERT INTO `c_log` VALUES ( 192, 'MessageController->View()', 1, 'Message', 'View', 1476416059, 1 );
INSERT INTO `c_log` VALUES ( 193, 'CTController->Index()', 1, 'CT', 'Index', 1476416062, 1 );
INSERT INTO `c_log` VALUES ( 194, 'CTController->SY()', 1, 'CT', 'SY', 1476416066, 1 );
INSERT INTO `c_log` VALUES ( 195, 'YearController->Delete()', 1, 'Year', 'Delete', 1476416070, 1 );
INSERT INTO `c_log` VALUES ( 196, 'CTController->SY()', 1, 'CT', 'SY', 1476416070, 1 );
INSERT INTO `c_log` VALUES ( 197, 'CTController->USER()', 1, 'CT', 'USER', 1476416074, 1 );
INSERT INTO `c_log` VALUES ( 198, 'StudentController->ImportExcel()', 1, 'Student', 'ImportExcel', 1476416079, 1 );
INSERT INTO `c_log` VALUES ( 199, 'CTController->USER()', 1, 'CT', 'USER', 1476416092, 1 );
INSERT INTO `c_log` VALUES ( 200, 'CTController->MAIN()', 1, 'CT', 'MAIN', 1476416093, 1 );
INSERT INTO `c_log` VALUES ( 201, 'CTController->CR173()', 1, 'CT', 'CR173', 1476416097, 1 );
INSERT INTO `c_log` VALUES ( 202, 'CourseController->Selected()', 1, 'Course', 'Selected', 1476416101, 1 );
INSERT INTO `c_log` VALUES ( 203, 'ScoreController->ScoreList()', 1, 'Score', 'ScoreList', 1476416105, 1 );
INSERT INTO `c_log` VALUES ( 204, 'ScoreController->ScoreEdit()', 1, 'Score', 'ScoreEdit', 1476416116, 1 );
INSERT INTO `c_log` VALUES ( 205, 'SettingController->Index()', 1, 'Setting', 'Index', 1476416119, 1 );
INSERT INTO `c_log` VALUES ( 206, 'DatabaseController->Index()', 1, 'Database', 'Index', 1476416121, 1 );
INSERT INTO `c_log` VALUES ( 207, 'DatabaseController->Bak()', 1, 'Database', 'Bak', 1476416123, 1 );

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_message
--

INSERT INTO `c_message` VALUES ( 1, 1, 2, '本轮毕业答辩2016年10月15号10:00在7号楼101开始', '请准备论文答辩', 0, 1476414786, 1 );
INSERT INTO `c_message` VALUES ( 2, 3, 2, '论文需要更改', '来教学楼101找我', 0, 1476415256, 1 );
INSERT INTO `c_message` VALUES ( 3, 3, 6, '论文需要更改', '来教学楼101找我', 0, 1476415256, 1 );
INSERT INTO `c_message` VALUES ( 4, 2, 3, '论文已经写好了呢', '老师，我们什么时候交论文给你', 0, 1476415440, 1 );
INSERT INTO `c_message` VALUES ( 5, 6, 1, '呵呵呵', '不错不错。', 1, 1476415531, 1 );
INSERT INTO `c_message` VALUES ( 6, 6, 2, '呵呵呵', '不错不错。', 0, 1476415531, 1 );
INSERT INTO `c_message` VALUES ( 7, 6, 3, '呵呵呵', '不错不错。', 0, 1476415531, 1 );

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_notice
--

INSERT INTO `c_notice` VALUES ( 1, 1, '[重要]毕设论文需要电子和纸质两种', '各位同学，最好提交的论文需要一份电子的和一份纸质的文档，请大家做好准备，祝大家答辩顺利！', 1476414900, 1 );

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
INSERT INTO `c_room` VALUES ( 6, 35352, 1476260992, 0 );

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_score
--

INSERT INTO `c_score` VALUES ( 1, 2, 1, NULL, 89, 1476415982, 1 );
INSERT INTO `c_score` VALUES ( 2, 6, 1, NULL, 87, 1476415982, 1 );
INSERT INTO `c_score` VALUES ( 3, NULL, NULL, NULL, NULL, 1476415982, 1 );

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table c_selection
--

INSERT INTO `c_selection` VALUES ( 1, 2, 1, 4, 2, 5, 5, 1, 1476415270, 'Uploads/system/2016-10-14/58004fb362b33.docx' );
INSERT INTO `c_selection` VALUES ( 2, 6, 1, 4, 2, 5, 5, 1, 1476415458, 'Uploads/system/2016-10-14/5800501592b3c.docx' );

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
INSERT INTO `c_user` VALUES ( 1, 'admin', '23261fedd0be3b50006c8c8eeff1505e', NULL, '李斯丹妮', 1, NULL, 15877536852, NULL, '961903965@qq.com', NULL, 3, NULL, NULL, NULL, NULL, NULL, 1475721798, 1 );
INSERT INTO `c_user` VALUES ( 2, 'stu', '23261fedd0be3b50006c8c8eeff1505e', NULL, '李云忠', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 2, 4, 3, NULL, 1475721798, 1 );
INSERT INTO `c_user` VALUES ( 3, 'tea1', '23261fedd0be3b50006c8c8eeff1505e', NULL, '张东光', 1, NULL, NULL, NULL, NULL, NULL, 2, NULL, 3, NULL, NULL, '助教', 1475721798, 1 );
INSERT INTO `c_user` VALUES ( 6, 'stu2', '23261fedd0be3b50006c8c8eeff1505e', NULL, '王宝强', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, 4, 3, NULL, 1475721798, 1 );
INSERT INTO `c_user` VALUES ( 13, 'tea2', '23261fedd0be3b50006c8c8eeff1505e', NULL, '王化贞', 1, NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, NULL, NULL, '教授', 1476203375, 1 );
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
INSERT INTO `c_year` VALUES ( 6, '', 1476365387, 0 );
/*!40000 ALTER TABLE c_year ENABLE KEYS */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
