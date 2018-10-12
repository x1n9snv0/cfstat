/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50537
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50537
File Encoding         : 65001

Date: 2014-10-19 00:15:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cfstat_admin
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_admin`;
CREATE TABLE `cfstat_admin` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `admin` varchar(50) NOT NULL DEFAULT '',
  `pwd` varchar(50) NOT NULL DEFAULT '',
  `systitle` varchar(50) NOT NULL,
  `regstate` tinyint(1) NOT NULL DEFAULT '-1',
  `regadmincheck` tinyint(1) NOT NULL DEFAULT '0',
  `styletotal` int(12) NOT NULL DEFAULT '60',
  `lastdeldate` date NOT NULL DEFAULT '2000-01-01',
  `skintype` int(12) NOT NULL DEFAULT '0',
  `skincolor` varchar(50) NOT NULL DEFAULT 'C9DDF0|F3F9FE',
  `smtpport` int(12) NOT NULL DEFAULT '25',
  `smtpaddress` varchar(50) NOT NULL,
  `smtpuser` varchar(50) NOT NULL,
  `smtppassword` varchar(50) NOT NULL,
  `allsearch` text NOT NULL,
  `otherset` text NOT NULL,
  `admincode` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin` (`admin`),
  UNIQUE KEY `admincode` (`admincode`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_admin
-- ----------------------------
INSERT INTO `cfstat_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '乘风多用户PHP统计系统', '-1', '0', '60', '2009-10-18', '1', '#025DA6|#BFDEF8|#333333|#02418a|#FF0000', '25', 'smtp.qq.com', 'a@qq.com', 'b', 'bing.com,q|yodao.com,q/lq|msn.com/live.com,q|yahoo.com/yahoo.cn/yahoo.com.cn,p|soso.com,w|sogou.com,query|zhongsou.com,word/w|google.com/google.cn/g.cn,q|baidu.com/baidu.com.cn/baidu.cn,wd/kw/word', '', '625997dcf606aba9b002664b14a3bd39');

-- ----------------------------
-- Table structure for cfstat_client_day
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_client_day`;
CREATE TABLE `cfstat_client_day` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `adddate` date NOT NULL DEFAULT '0000-00-00',
  `alexacounter` int(12) NOT NULL DEFAULT '1',
  `os1` int(12) NOT NULL DEFAULT '0',
  `os2` int(12) NOT NULL DEFAULT '0',
  `os3` int(12) NOT NULL DEFAULT '0',
  `os4` int(12) NOT NULL DEFAULT '0',
  `os5` int(12) NOT NULL DEFAULT '0',
  `osother` int(12) NOT NULL DEFAULT '0',
  `browser1` int(12) NOT NULL DEFAULT '0',
  `browser2` int(12) NOT NULL DEFAULT '0',
  `browser3` int(12) NOT NULL DEFAULT '0',
  `browser4` int(12) NOT NULL DEFAULT '0',
  `browser5` int(12) NOT NULL DEFAULT '0',
  `browser6` int(12) NOT NULL DEFAULT '0',
  `browser7` int(12) NOT NULL DEFAULT '0',
  `browserother` int(12) NOT NULL DEFAULT '0',
  `screenwidth1` int(12) NOT NULL DEFAULT '0',
  `screenwidth2` int(12) NOT NULL DEFAULT '0',
  `screenwidth3` int(12) NOT NULL DEFAULT '0',
  `screenwidth4` int(12) NOT NULL DEFAULT '0',
  `screenwidth5` int(12) NOT NULL DEFAULT '0',
  `screenwidth6` int(12) NOT NULL DEFAULT '0',
  `screenwidth7` int(12) NOT NULL DEFAULT '0',
  `screenwidth8` int(12) NOT NULL DEFAULT '0',
  `screenwidth9` int(12) NOT NULL DEFAULT '0',
  `screenwidthother` int(12) NOT NULL DEFAULT '0',
  `screenheight1` int(12) NOT NULL DEFAULT '0',
  `screenheight2` int(12) NOT NULL DEFAULT '0',
  `screenheight3` int(12) NOT NULL DEFAULT '0',
  `screenheight4` int(12) NOT NULL DEFAULT '0',
  `screenheight5` int(12) NOT NULL DEFAULT '0',
  `screenheight6` int(12) NOT NULL DEFAULT '0',
  `screenheight7` int(12) NOT NULL DEFAULT '0',
  `screenheight8` int(12) NOT NULL DEFAULT '0',
  `screenheight9` int(12) NOT NULL DEFAULT '0',
  `screenheightother` int(12) NOT NULL DEFAULT '0',
  `screencolordepth1` int(12) NOT NULL DEFAULT '0',
  `screencolordepth2` int(12) NOT NULL DEFAULT '0',
  `screencolordepth3` int(12) NOT NULL DEFAULT '0',
  `screencolordepthother` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`adddate`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_client_day
-- ----------------------------

-- ----------------------------
-- Table structure for cfstat_count_day
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_count_day`;
CREATE TABLE `cfstat_count_day` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `mycounter` int(12) NOT NULL DEFAULT '1',
  `ipcounter` int(12) NOT NULL DEFAULT '1',
  `adddate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`adddate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_count_day
-- ----------------------------

-- ----------------------------
-- Table structure for cfstat_count_hour
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_count_hour`;
CREATE TABLE `cfstat_count_hour` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `mycounter` int(12) NOT NULL DEFAULT '1',
  `ipcounter` int(12) DEFAULT '1',
  `adddate` date DEFAULT '0000-00-00',
  `addhour` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`adddate`,`addhour`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_count_hour
-- ----------------------------

-- ----------------------------
-- Table structure for cfstat_gbook
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_gbook`;
CREATE TABLE `cfstat_gbook` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `contact` text NOT NULL,
  `ly` varchar(255) NOT NULL,
  `currweb` varchar(255) NOT NULL,
  `addtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_gbook
-- ----------------------------

-- ----------------------------
-- Table structure for cfstat_ipaddress
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_ipaddress`;
CREATE TABLE `cfstat_ipaddress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_1` bigint(10) NOT NULL DEFAULT '0',
  `ip_2` bigint(10) NOT NULL DEFAULT '0',
  `area` varchar(255) DEFAULT NULL,
  `area_2` varchar(255) DEFAULT NULL,
  `area_3` varchar(255) DEFAULT NULL,
  `area_4` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip_1` (`ip_1`,`ip_2`)
) ENGINE=MyISAM AUTO_INCREMENT=25319 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_ipaddress
-- ----------------------------

-- ----------------------------
-- Table structure for cfstat_ly_day
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_ly_day`;
CREATE TABLE `cfstat_ly_day` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `lyhead` varchar(255) NOT NULL DEFAULT '',
  `mycounter` int(12) NOT NULL DEFAULT '1',
  `ipcounter` int(12) NOT NULL DEFAULT '1',
  `ly` varchar(255) NOT NULL DEFAULT '',
  `adddate` date NOT NULL DEFAULT '0000-00-00',
  `addtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lasttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`lyhead`,`adddate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_ly_day
-- ----------------------------

-- ----------------------------
-- Table structure for cfstat_searchkeyword_day
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_searchkeyword_day`;
CREATE TABLE `cfstat_searchkeyword_day` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `siteflag` varchar(50) NOT NULL DEFAULT '',
  `keyword` varchar(50) NOT NULL DEFAULT '',
  `mycounter` int(12) NOT NULL DEFAULT '1',
  `ipcounter` int(12) NOT NULL DEFAULT '1',
  `adddate` date NOT NULL DEFAULT '0000-00-00',
  `addtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lasttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastly` varchar(255) NOT NULL DEFAULT '',
  `indexcode` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `indexcode` (`indexcode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_searchkeyword_day
-- ----------------------------

-- ----------------------------
-- Table structure for cfstat_search_day
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_search_day`;
CREATE TABLE `cfstat_search_day` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `siteflag` varchar(50) NOT NULL DEFAULT '',
  `mycounter` int(12) NOT NULL DEFAULT '1',
  `ipcounter` int(12) NOT NULL DEFAULT '1',
  `adddate` date NOT NULL DEFAULT '2000-01-01',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`siteflag`,`adddate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_search_day
-- ----------------------------

-- ----------------------------
-- Table structure for cfstat_search_set
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_search_set`;
CREATE TABLE `cfstat_search_set` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `sitedesc` varchar(50) NOT NULL DEFAULT '',
  `siteflag` varchar(50) NOT NULL DEFAULT '',
  `keywordflag` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `siteflag` (`siteflag`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_search_set
-- ----------------------------
INSERT INTO `cfstat_search_set` VALUES ('1', '百度', 'baidu.com', 'wd/kw/word');
INSERT INTO `cfstat_search_set` VALUES ('2', '搜狗', 'sogou.com', 'query');
INSERT INTO `cfstat_search_set` VALUES ('3', '360搜索', 'so.com', 'q');
INSERT INTO `cfstat_search_set` VALUES ('4', 'soso', 'soso.com', 'w');
INSERT INTO `cfstat_search_set` VALUES ('5', '微软必应', 'bing.com', 'q');
INSERT INTO `cfstat_search_set` VALUES ('6', '网易', 'yodao.com', 'q/lq');
INSERT INTO `cfstat_search_set` VALUES ('7', 'google', 'google.com/google.com.hk', 'q');
INSERT INTO `cfstat_search_set` VALUES ('8', '雅虎', 'yahoo.com', 'p');
INSERT INTO `cfstat_search_set` VALUES ('9', 'msn', 'msn.com', 'q');


-- ----------------------------
-- Table structure for cfstat_upfile
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_upfile`;
CREATE TABLE `cfstat_upfile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `filename` varchar(50) NOT NULL,
  `filesizenum` int(11) NOT NULL DEFAULT '0',
  `addtime` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `filename` (`filename`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_upfile
-- ----------------------------
INSERT INTO `cfstat_upfile` VALUES ('10', '', 'sys-img-1248770767.jpg', '21677', '2008-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('11', '', 'sys-img-1248770771.jpg', '16968', '2008-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('12', '', 'sys-img-1248770777.jpg', '15850', '2008-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('13', '', 'sys-img-1248770781.jpg', '21154', '2008-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('14', '', 'sys-img-1248770784.jpg', '18084', '2008-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('15', '', 'sys-img-1248770789.jpg', '18214', '2008-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('16', '', 'sys-img-1248770793.jpg', '16432', '2008-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('17', '', 'sys-img-1248770797.jpg', '17970', '2008-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('20', '', 'sys-img-1248772650.jpg', '11469', '2008-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('21', '', 'sys-img-292684185.jpg', '28000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('22', '', 'sys-img-292684277.jpg', '11000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('23', '', 'sys-img-292684317.jpg', '20000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('24', '', 'sys-img-292684349.jpg', '14000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('25', '', 'sys-img-292684416.jpg', '35000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('26', '', 'sys-img-292684425.jpg', '25000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('27', '', 'sys-img-292684438.jpg', '31000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('28', '', 'sys-img-292684443.jpg', '26000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('29', '', 'sys-img-292684450.jpg', '38000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('30', '', 'sys-img-292684456.jpg', '34000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('31', '', 'sys-img-292684463.jpg', '32000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('32', '', 'sys-img-292684469.jpg', '46000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('33', '', 'sys-img-292684474.jpg', '34000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('34', '', 'sys-img-292684510.jpg', '17000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('35', '', 'sys-img-292684515.jpg', '34000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('36', '', 'sys-img-292684526.jpg', '9000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('37', '', 'sys-img-296129735.jpg', '34000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('38', '', 'sys-img-296129743.jpg', '14000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('39', '', 'sys-img-296129767.jpg', '48000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('40', '', 'sys-img-296129774.jpg', '50000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('41', '', 'sys-img-296129783.jpg', '41000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('42', '', 'sys-img-296129920.jpg', '7000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('43', '', 'sys-img-296129925.jpg', '39000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('44', '', 'sys-img-296129931.jpg', '42000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('45', '', 'sys-img-296129986.jpg', '44000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('46', '', 'sys-img-296130164.jpg', '39000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('47', '', 'sys-img-296130285.jpg', '31000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('48', '', 'sys-img-296130289.jpg', '44000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('49', '', 'sys-img-296130322.jpg', '34000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('50', '', 'sys-img-296130332.jpg', '34000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('51', '', 'sys-img-303338023.jpg', '4000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('52', '', 'sys-img-303338061.jpg', '5000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('53', '', 'sys-img-303338067.jpg', '3000', '2009-01-01 00:00:00');
INSERT INTO `cfstat_upfile` VALUES ('54', '', 'sys-img-303338072.jpg', '4000', '2009-01-01 00:00:00');

-- ----------------------------
-- Table structure for cfstat_user
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_user`;
CREATE TABLE `cfstat_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `pwd` varchar(50) NOT NULL DEFAULT '',
  `pwd_view` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(50) NOT NULL,
  `pagename` varchar(50) NOT NULL DEFAULT '',
  `pageurl` varchar(50) NOT NULL DEFAULT '',
  `showtotal` int(12) NOT NULL DEFAULT '0',
  `realshowtotal` int(12) NOT NULL DEFAULT '0',
  `realiptotal` int(12) NOT NULL DEFAULT '0',
  `adddate` date NOT NULL DEFAULT '2000-01-01',
  `countershow` tinyint(1) NOT NULL DEFAULT '1',
  `style` int(12) NOT NULL DEFAULT '1',
  `imgfilename` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `imgselftext` varchar(2000) NOT NULL DEFAULT '',
  `gbookstate` smallint(1) NOT NULL DEFAULT '-1',
  `userstate` smallint(1) NOT NULL DEFAULT '-1',
  `lasttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `otherset` text NOT NULL,
  `usercode` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `usercode` (`usercode`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_user
-- ----------------------------
INSERT INTO `cfstat_user` VALUES ('1', 'mytest', 'a599d36c4c7a71ddcc1bc7259a15ac3a', 'a599d36c4c7a71ddcc1bc7259a15ac3a', '178575@qq.com', '', '乘风原创程序', 'http://www.qqcf.com', '101538', '136', '21', '2006-06-09', '1', '4', 'default.jpg', '　\r\n　总访问:{imgcounter} \r\n　今天PV:{todaytotal} \r\n　今天IP:{todayiptotal} \r\n　昨天PV:{yesterdaytotal} \r\n　昨天IP:{yesterdayiptotal} \r\n　IP:{ip} ', '-1', '-1', '2009-10-19 14:53:13', '', '3d5fed4ecc0bbee777edee3ee85eae94');

-- ----------------------------
-- Table structure for cfstat_visit_last
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_visit_last`;
CREATE TABLE `cfstat_visit_last` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `myid` int(12) NOT NULL DEFAULT '0',
  `ip` varchar(50) NOT NULL DEFAULT '',
  `pvtotal` int(12) NOT NULL DEFAULT '1',
  `ly` varchar(255) NOT NULL DEFAULT '',
  `webtitle` varchar(255) NOT NULL DEFAULT '',
  `currweb` varchar(255) NOT NULL DEFAULT '',
  `addtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lasttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `screenwidth` int(12) NOT NULL DEFAULT '0',
  `screenheight` int(12) NOT NULL DEFAULT '0',
  `screencolordepth` int(12) NOT NULL DEFAULT '0',
  `ostype` varchar(50) NOT NULL DEFAULT '',
  `browsertype` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `myid` (`username`,`myid`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_visit_last
-- ----------------------------

-- ----------------------------
-- Table structure for cfstat_web_day
-- ----------------------------
DROP TABLE IF EXISTS `cfstat_web_day`;
CREATE TABLE `cfstat_web_day` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `weburl` varchar(255) NOT NULL DEFAULT '',
  `mycounter` int(12) NOT NULL DEFAULT '1',
  `adddate` date NOT NULL DEFAULT '0000-00-00',
  `addtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lasttime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `indexcode` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `indexcode` (`indexcode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cfstat_web_day
-- ----------------------------
