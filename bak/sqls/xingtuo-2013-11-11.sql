-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2013 年 11 月 11 日 03:56
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `xingtuo`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `xt_file`
-- 

CREATE TABLE `xt_file` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '主键',
  `file_address` varchar(40) NOT NULL COMMENT '文件地址',
  `type` tinyint(2) unsigned NOT NULL COMMENT '文件类型：1首页图片，2用户头像',
  `status` tinyint(1) NOT NULL default '0' COMMENT '状态',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `xt_file`
-- 

INSERT INTO `xt_file` VALUES (1, '20130827/52196d734be3f.png', 1, 0);
INSERT INTO `xt_file` VALUES (2, '20130827/52196d73485e2.jpg', 1, 0);
INSERT INTO `xt_file` VALUES (3, '20130829/52196d734ae4f.jpg', 2, 0);
INSERT INTO `xt_file` VALUES (4, '20130829/52196d734be4f.jpg', 2, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `xt_index`
-- 

CREATE TABLE `xt_index` (
  `id` smallint(5) unsigned NOT NULL auto_increment COMMENT '主键',
  `pics` varchar(50) NOT NULL COMMENT '图片',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='主页参数表' AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `xt_index`
-- 

INSERT INTO `xt_index` VALUES (1, '1,2');
INSERT INTO `xt_index` VALUES (2, '1,2');

-- --------------------------------------------------------

-- 
-- 表的结构 `xt_message`
-- 

CREATE TABLE `xt_message` (
  `id` int(11) unsigned NOT NULL auto_increment COMMENT '主键',
  `qid` int(10) unsigned NOT NULL COMMENT '问题id',
  `user_id` int(10) unsigned NOT NULL COMMENT '接收人ID',
  `send_uid` int(10) unsigned NOT NULL COMMENT '发送人id',
  `content` text NOT NULL COMMENT '消息内容',
  `time` int(10) unsigned NOT NULL COMMENT '回复时间',
  `is_read` tinyint(1) unsigned NOT NULL default '1' COMMENT '是否已读:0已读，1未读',
  `status` tinyint(1) NOT NULL default '0' COMMENT '状态：0正常，1删除',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='消息表' AUTO_INCREMENT=14 ;

-- 
-- 导出表中的数据 `xt_message`
-- 

INSERT INTO `xt_message` VALUES (11, 7, 4, 1, '其实都是一样的！', 1380088956, 1, 0);
INSERT INTO `xt_message` VALUES (10, 13, 4, 1, '那就简单介绍一下吧！sdfsdf', 1380088669, 1, 0);
INSERT INTO `xt_message` VALUES (12, 18, 10, 1, '你好 朋友', 1384040543, 1, 0);
INSERT INTO `xt_message` VALUES (13, 17, 10, 1, '你好 朋友你好 朋友你好 朋友你好 朋友你好 朋友你好 朋友你好 朋友你好 朋友你好 朋友', 1384040585, 1, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `xt_news`
-- 

CREATE TABLE `xt_news` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '主键',
  `name` char(100) NOT NULL COMMENT '新闻名',
  `content` text NOT NULL COMMENT '新闻内容',
  `pic_id` int(10) unsigned default NULL COMMENT '产品图片',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL default '0' COMMENT '状态:0正常，-2删除',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品表' AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `xt_news`
-- 

INSERT INTO `xt_news` VALUES (1, '新闻咨询1', '新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1新闻咨询1', NULL, 0, 0);
INSERT INTO `xt_news` VALUES (2, 'aaa1', 'bbbb1', NULL, 1382239252, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `xt_product`
-- 

CREATE TABLE `xt_product` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '主键',
  `name` char(100) NOT NULL COMMENT '产品名',
  `content` text NOT NULL COMMENT '产品内容',
  `pic_id` int(10) unsigned default NULL COMMENT '产品图片',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL default '0' COMMENT '状态:0正常，-2删除',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='产品表' AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `xt_product`
-- 

INSERT INTO `xt_product` VALUES (1, '【华润信托】·熙金1号', '【华润信托】·熙金1号【华润信托】·熙金1号【华润信托】·熙金1号【华润信托】·熙金1号【华润信托】·熙金1号', NULL, 1380988557, -2);
INSERT INTO `xt_product` VALUES (2, '产品名称', '发行机构：\r\nqwewqe\r\n产品期限：\r\nqweqweqw\r\n募集规模：\r\nwerwer\r\n起始资金：\r\nwerwe\r\n产品收益：\r\nrwerwe\r\n产品说明：		\r\nwerwerwerrwerwerewrwerwerwe			', NULL, 1383977888, 0);
INSERT INTO `xt_product` VALUES (3, '测试产品', '发行机构：测试\r\n\r\n产品期限：测试\r\n\r\n募集规模：测试\r\n\r\n起始资金：测试\r\n\r\n产品收益：测试\r\n	\r\n产品说明：测试测试测试测试测试测试测试测试测试测试测试\r\n				', NULL, 1384033618, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `xt_question`
-- 

CREATE TABLE `xt_question` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '主键',
  `user_id` int(10) unsigned NOT NULL COMMENT '提问人',
  `content` text NOT NULL COMMENT '提问内容',
  `time` int(10) unsigned NOT NULL COMMENT '提问时间',
  `is_reply` tinyint(1) unsigned NOT NULL default '1' COMMENT '是否回复：1为未回复，0 已回复',
  `status` tinyint(1) NOT NULL default '0' COMMENT '0正常，-2删除',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- 导出表中的数据 `xt_question`
-- 

INSERT INTO `xt_question` VALUES (2, 2, '请问这个东西怎么吃', 1377522221, 1, -2);
INSERT INTO `xt_question` VALUES (3, 2, '这是什么情况呀？', 1377522607, 1, 0);
INSERT INTO `xt_question` VALUES (4, 2, '这个产品请介绍下', 1377522796, 1, 0);
INSERT INTO `xt_question` VALUES (5, 4, '信托是什么？信托公司是干嘛的？', 1377650319, 1, 0);
INSERT INTO `xt_question` VALUES (6, 4, '收益有10%这么高？银行都没有这麽高可靠吗？', 1377650319, 1, 0);
INSERT INTO `xt_question` VALUES (13, 4, '介绍一下。', 1380077621, 0, 0);
INSERT INTO `xt_question` VALUES (7, 4, '银行和信托公司都可以买，为什么通过您们买？', 1377650319, 0, 0);
INSERT INTO `xt_question` VALUES (14, 10, 'Nihao ', 1384040381, 1, 0);
INSERT INTO `xt_question` VALUES (15, 10, 'Nihao ', 1384040383, 1, 0);
INSERT INTO `xt_question` VALUES (16, 10, 'Nihao ', 1384040383, 1, 0);
INSERT INTO `xt_question` VALUES (17, 10, 'Nihao ', 1384040384, 0, 0);
INSERT INTO `xt_question` VALUES (18, 10, 'Nihao ', 1384040384, 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `xt_users`
-- 

CREATE TABLE `xt_users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `account` char(11) NOT NULL,
  `name` varchar(50) default '' COMMENT '称呢',
  `password` char(32) NOT NULL,
  `last_login_time` int(11) unsigned NOT NULL default '0',
  `last_login_ip` varchar(40) NOT NULL default '0',
  `login_count` smallint(6) unsigned NOT NULL default '0' COMMENT '登陆次数',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL COMMENT '用户类型:0管理员，1普通用户，2客户经理',
  `status` tinyint(1) NOT NULL default '0' COMMENT '0正常、1待审核、-2删除',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表' AUTO_INCREMENT=13 ;

-- 
-- 导出表中的数据 `xt_users`
-- 

INSERT INTO `xt_users` VALUES (1, 'admin', '管理', 'e10adc3949ba59abbe56e057f20f883e', 1384055079, '114.94.57.46', 153, 1376561926, 1376561926, 0, 0);
INSERT INTO `xt_users` VALUES (2, '13761951734', 'wade', 'e10adc3949ba59abbe56e057f20f883e', 1383980732, '192.168.1.100', 13, 1377506459, 1377506459, 1, 0);
INSERT INTO `xt_users` VALUES (3, '18516146011', '', 'e10adc3949ba59abbe56e057f20f883e', 1383987593, '192.168.1.100', 8, 1377590474, 1377590474, 1, 0);
INSERT INTO `xt_users` VALUES (5, '13761951735', '', 'e10adc3949ba59abbe56e057f20f883e', 1383981952, '192.168.1.100', 2, 1377847312, 1377847312, 1, 0);
INSERT INTO `xt_users` VALUES (6, '13761951739', '', 'e10adc3949ba59abbe56e057f20f883e', 1383987613, '192.168.1.100', 1, 1377847970, 1377847970, 1, 0);
INSERT INTO `xt_users` VALUES (7, '13761951738', '', 'e10adc3949ba59abbe56e057f20f883e', 1383978421, '192.168.1.100', 2, 1377852591, 1377852591, 2, 0);
INSERT INTO `xt_users` VALUES (8, '15912345678', '', 'e10adc3949ba59abbe56e057f20f883e', 1377875285, '192.168.1.100', 0, 1377875285, 1377875285, 2, 0);
INSERT INTO `xt_users` VALUES (9, '13787654321', 'JSon', 'e10adc3949ba59abbe56e057f20f883e', 1384059690, '114.94.57.46', 6, 1380980103, 1380980103, 1, 0);
INSERT INTO `xt_users` VALUES (10, '13765432178', 'aaa', 'e10adc3949ba59abbe56e057f20f883e', 1384136370, '180.168.147.18', 22, 1380980296, 1380980296, 2, 0);
INSERT INTO `xt_users` VALUES (11, '13761951123', '', 'e10adc3949ba59abbe56e057f20f883e', 1383978219, '192.168.1.100', 0, 1383978219, 1383978219, 1, 0);
INSERT INTO `xt_users` VALUES (12, 'system', '管理', 'e10adc3949ba59abbe56e057f20f883e', 1384005028, '115.29.165.8', 148, 1376561926, 1376561926, 0, -2);

-- --------------------------------------------------------

-- 
-- 表的结构 `xt_user_info`
-- 

CREATE TABLE `xt_user_info` (
  `id` int(10) unsigned NOT NULL auto_increment COMMENT '主键',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `director_id` int(10) unsigned NOT NULL default '0' COMMENT '隶属客户经理',
  `file_id` int(10) unsigned NOT NULL default '0' COMMENT '用户头像',
  `age` tinyint(3) unsigned default NULL COMMENT '年龄',
  `sex` char(1) default NULL COMMENT '性别',
  `identity` char(20) default NULL COMMENT '身份证件',
  `email` char(50) default NULL COMMENT '邮箱',
  `province` char(10) default NULL COMMENT '省份',
  `city` char(10) default NULL COMMENT '城市',
  `street` varchar(150) default NULL COMMENT '街道地址',
  `interest` char(100) default NULL COMMENT '兴趣爱好',
  `purchase` varchar(100) default NULL COMMENT '已购买的产品',
  `remarks` varchar(500) default NULL COMMENT '客户备注',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户详细资料' AUTO_INCREMENT=16 ;

-- 
-- 导出表中的数据 `xt_user_info`
-- 

INSERT INTO `xt_user_info` VALUES (1, 1, 0, 3, 21, '男', NULL, 'ucdchina@gmail.com', '广东省', '深圳市', '111号', '理财产品', '无', '这是管理员aaeqweqe');
INSERT INTO `xt_user_info` VALUES (2, 2, 0, 4, 21, '男', '', 'lin@qq.com', '上海', '上海市', '陆家嘴', '期货产品', '无', '<u><b>dadasa<strike>sdasdas</strike></b></u>');
INSERT INTO `xt_user_info` VALUES (3, 3, 0, 0, 22, '女', NULL, 'wuzhiyong', '上海', '上海市', '陆家嘴', '暂无', '无', NULL);
INSERT INTO `xt_user_info` VALUES (5, 5, 0, 0, 7, '男', NULL, 'aaaaa@qq.com', 'bbbb', 'ccc', 'ddde', 'eee', 'fff', 'ggggggggg~');
INSERT INTO `xt_user_info` VALUES (6, 100, 0, 0, 6, '女', NULL, '', '', '', '', '', '', '');
INSERT INTO `xt_user_info` VALUES (10, 6, 0, 0, 6, '女', NULL, '12313123@qq.com', '12312312bb', '22222222', '', '', '', '');
INSERT INTO `xt_user_info` VALUES (11, 7, 0, 0, 5, '男', NULL, 'zzz@qq.com', '13123', '2423', '423423', '3245', '234234', '5');
INSERT INTO `xt_user_info` VALUES (12, 8, 0, 0, 7, '女', NULL, '', '', '', '', '', '', '');
INSERT INTO `xt_user_info` VALUES (13, 9, 10, 0, 1, '男', '3424011', '', '', '', '', '', '', '');
INSERT INTO `xt_user_info` VALUES (14, 10, 0, 0, 1, '男', 'sdasdad', '', '', '', '', '', '', '');
INSERT INTO `xt_user_info` VALUES (15, 11, 0, 0, 1, '男', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `xt_verify`
-- 

CREATE TABLE `xt_verify` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `telephone` char(11) NOT NULL COMMENT '手机',
  `verify` char(6) NOT NULL COMMENT '验证码',
  `expired` int(10) unsigned NOT NULL default '0' COMMENT '过期时间',
  `type` tinyint(2) unsigned NOT NULL COMMENT '类型：1注册、2店铺加盟',
  `status` tinyint(1) NOT NULL default '0' COMMENT '0可用，1已使用',
  PRIMARY KEY  (`id`),
  KEY `telephone` (`telephone`),
  KEY `telephone_2` (`telephone`),
  KEY `telephone_3` (`telephone`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- 导出表中的数据 `xt_verify`
-- 

INSERT INTO `xt_verify` VALUES (1, '13761951734', '325448', 1377506666, 1, 1);
INSERT INTO `xt_verify` VALUES (2, '13761951734', '395559', 1377589363, 1, 1);
INSERT INTO `xt_verify` VALUES (3, '18516146011', '426398', 1377590544, 1, 1);
INSERT INTO `xt_verify` VALUES (4, '18516146011', '492224', 1378719367, 1, 0);
INSERT INTO `xt_verify` VALUES (5, '18516146011', '545454', 1378719435, 1, 0);
INSERT INTO `xt_verify` VALUES (6, '18516146011', '226086', 1378719533, 1, 0);
INSERT INTO `xt_verify` VALUES (7, '18516146011', '462089', 1384134962, 1, 0);
